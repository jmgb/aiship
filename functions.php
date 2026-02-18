<?php
/**
 * AIShip Child Theme — functions.php
 */

add_action( 'wp_enqueue_scripts', function () {

    // Estilos del child theme (style.css)
    wp_enqueue_style(
        'aiship-child-style',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get( 'Version' )
    );

    // CSS personalizado (assets/css/custom.css)
    $css_path = get_stylesheet_directory() . '/assets/css/custom.css';
    if ( file_exists( $css_path ) ) {
        wp_enqueue_style(
            'aiship-child-custom',
            get_stylesheet_directory_uri() . '/assets/css/custom.css',
            [ 'aiship-child-style' ],
            filemtime( $css_path )
        );
    }

    // JS personalizado (assets/js/app.js)
    $js_path = get_stylesheet_directory() . '/assets/js/app.js';
    if ( file_exists( $js_path ) ) {
        wp_enqueue_script(
            'aiship-child-app',
            get_stylesheet_directory_uri() . '/assets/js/app.js',
            [],
            filemtime( $js_path ),
            true
        );
    }

} );


/**
 * Obtiene cookie + crumb de Yahoo Finance (necesarios desde 2024 para autenticar requests).
 * El crumb se cachea 1 hora; las cookies de sesión que lo acompañan también.
 *
 * Flujo idéntico al que usa la librería yfinance de Python internamente:
 *   1. GET finance.yahoo.com  → Set-Cookie headers
 *   2. GET getcrumb con esa cookie → string corto (el crumb)
 *   3. Pasar crumb + cookie a la llamada de quotes
 *
 * @return array|null  [ 'crumb' => '...', 'cookie' => '...' ]  o null si falla
 */
function aiship_yf_get_crumb_data() {
    $cached = get_transient( 'aiship_yf_crumb' );
    if ( $cached ) {
        return $cached;
    }

    $ua = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36';

    // Paso 1 — visitar Yahoo Finance para obtener las cookies de sesión
    $r1 = wp_remote_get( 'https://finance.yahoo.com/', [
        'timeout'     => 12,
        'redirection' => 5,
        'headers'     => [
            'User-Agent'      => $ua,
            'Accept'          => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
            'Accept-Language' => 'en-US,en;q=0.9',
        ],
    ] );

    if ( is_wp_error( $r1 ) ) {
        return null;
    }

    // Extraer cookies: wp_remote_retrieve_header devuelve string o array según el transport
    $raw_cookies = wp_remote_retrieve_header( $r1, 'set-cookie' );
    $cookie_pairs = [];
    foreach ( (array) $raw_cookies as $c ) {
        $kv = explode( ';', $c )[0]; // solo "nombre=valor", sin flags
        if ( strpos( $kv, '=' ) !== false ) {
            $cookie_pairs[] = trim( $kv );
        }
    }
    $cookie_str = implode( '; ', $cookie_pairs );

    if ( empty( $cookie_str ) ) {
        return null;
    }

    // Paso 2 — obtener el crumb usando las cookies
    $r2 = wp_remote_get( 'https://query2.finance.yahoo.com/v1/test/getcrumb', [
        'timeout' => 8,
        'headers' => [
            'User-Agent' => $ua,
            'Cookie'     => $cookie_str,
            'Accept'     => 'text/plain',
        ],
    ] );

    if ( is_wp_error( $r2 ) || wp_remote_retrieve_response_code( $r2 ) !== 200 ) {
        return null;
    }

    $crumb = trim( wp_remote_retrieve_body( $r2 ) );
    if ( strlen( $crumb ) < 3 ) {
        return null;
    }

    $data = [ 'crumb' => $crumb, 'cookie' => $cookie_str ];
    set_transient( 'aiship_yf_crumb', $data, HOUR_IN_SECONDS );
    return $data;
}


/**
 * Obtiene cotizaciones reales desde Yahoo Finance con caché de 6 horas.
 * Usa autenticación crumb+cookie (igual que yfinance de Python).
 * Fallback a valores estáticos si la API no responde.
 *
 * @return array  [ ['sym' => 'AAPL', 'chg' => '+1.24%', 'pos' => true], ... ]
 */
function aiship_get_tickers() {
    $cached = get_transient( 'aiship_tickers' );
    if ( $cached !== false ) {
        $age_min = isset( $cached['at'] ) ? round( ( time() - $cached['at'] ) / 60 ) : '?';
        $GLOBALS['aiship_ticker_source'] = 'cache|' . $age_min;
        return $cached['tickers'] ?? $cached;
    }

    $symbols    = [ 'AAPL', 'MSFT', 'NVDA', 'GOOGL', 'META', 'AMZN', 'TSLA', 'JPM', 'BAC', 'GS', 'BRK-B', 'V' ];
    $crumb_data = aiship_yf_get_crumb_data();

    // Construir URL y headers con o sin crumb
    $url  = 'https://query2.finance.yahoo.com/v7/finance/quote?symbols=' . implode( ',', $symbols );
    $args = [
        'timeout' => 10,
        'headers' => [
            'User-Agent'      => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 Chrome/121.0.0.0',
            'Accept'          => 'application/json',
            'Accept-Language' => 'en-US,en;q=0.9',
        ],
    ];

    if ( $crumb_data ) {
        $url .= '&crumb=' . rawurlencode( $crumb_data['crumb'] );
        $args['headers']['Cookie'] = $crumb_data['cookie'];
    }

    $response = wp_remote_get( $url, $args );

    if ( is_wp_error( $response ) ) {
        $GLOBALS['aiship_ticker_source'] = 'fallback|wp_error:' . $response->get_error_code();
        return aiship_tickers_fallback();
    }

    $code = wp_remote_retrieve_response_code( $response );
    if ( $code !== 200 ) {
        // Si el crumb expiró (401/404), limpiamos el transient para regenerarlo en la próxima carga
        if ( in_array( $code, [ 401, 403, 404 ], true ) ) {
            delete_transient( 'aiship_yf_crumb' );
        }
        $GLOBALS['aiship_ticker_source'] = 'fallback|http:' . $code;
        return aiship_tickers_fallback();
    }

    $body    = json_decode( wp_remote_retrieve_body( $response ), true );
    $results = $body['quoteResponse']['result'] ?? [];

    if ( empty( $results ) ) {
        $GLOBALS['aiship_ticker_source'] = 'fallback|empty_response';
        return aiship_tickers_fallback();
    }

    $tickers = [];
    foreach ( $results as $quote ) {
        $chg_pct     = $quote['regularMarketChangePercent'] ?? 0;
        $sym_raw     = $quote['symbol'] ?? '';
        $sym_display = str_replace( '-', '.', $sym_raw ); // BRK-B → BRK.B
        $pos         = $chg_pct >= 0;
        $sign        = $pos ? '+' : '';

        $tickers[] = [
            'sym' => $sym_display,
            'chg' => $sign . number_format( $chg_pct, 2 ) . '%',
            'pos' => $pos,
        ];
    }

    if ( empty( $tickers ) ) {
        $GLOBALS['aiship_ticker_source'] = 'fallback|parse_error';
        return aiship_tickers_fallback();
    }

    set_transient( 'aiship_tickers', [ 'tickers' => $tickers, 'at' => time() ], 6 * HOUR_IN_SECONDS );
    $GLOBALS['aiship_ticker_source'] = 'api';
    return $tickers;
}

/**
 * Valores estáticos usados si Yahoo Finance no responde.
 *
 * @return array
 */
function aiship_tickers_fallback() {
    return [
        [ 'sym' => 'AAPL',  'chg' => '+1.24%',  'pos' => true  ],
        [ 'sym' => 'MSFT',  'chg' => '+0.87%',  'pos' => true  ],
        [ 'sym' => 'NVDA',  'chg' => '+3.41%',  'pos' => true  ],
        [ 'sym' => 'GOOGL', 'chg' => '-0.53%',  'pos' => false ],
        [ 'sym' => 'META',  'chg' => '+2.18%',  'pos' => true  ],
        [ 'sym' => 'AMZN',  'chg' => '+0.66%',  'pos' => true  ],
        [ 'sym' => 'TSLA',  'chg' => '-1.92%',  'pos' => false ],
        [ 'sym' => 'JPM',   'chg' => '+0.44%',  'pos' => true  ],
        [ 'sym' => 'BAC',   'chg' => '-0.31%',  'pos' => false ],
        [ 'sym' => 'GS',    'chg' => '+1.07%',  'pos' => true  ],
        [ 'sym' => 'BRK.B', 'chg' => '+0.29%',  'pos' => true  ],
        [ 'sym' => 'V',     'chg' => '+0.73%',  'pos' => true  ],
    ];
}
