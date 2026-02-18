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
 * Obtiene cotizaciones reales desde Yahoo Finance con caché de 6 horas.
 * Fallback a valores estáticos si la API no responde.
 *
 * @return array  [ ['sym' => 'AAPL', 'chg' => '+1.24%', 'pos' => true], ... ]
 */
function aiship_get_tickers() {
    $cached = get_transient( 'aiship_tickers' );
    if ( $cached !== false ) {
        return $cached;
    }

    // Yahoo Finance acepta múltiples símbolos en una sola petición (sin API key)
    $symbols = [ 'AAPL', 'MSFT', 'NVDA', 'GOOGL', 'META', 'AMZN', 'TSLA', 'JPM', 'BAC', 'GS', 'BRK-B', 'V' ];
    $url     = 'https://query1.finance.yahoo.com/v7/finance/quote?symbols=' . implode( ',', $symbols );

    $response = wp_remote_get( $url, [
        'timeout' => 8,
        'headers' => [
            'User-Agent' => 'Mozilla/5.0 (compatible; AIShip/1.0)',
        ],
    ] );

    if ( is_wp_error( $response ) || wp_remote_retrieve_response_code( $response ) !== 200 ) {
        return aiship_tickers_fallback();
    }

    $body    = json_decode( wp_remote_retrieve_body( $response ), true );
    $results = $body['quoteResponse']['result'] ?? [];

    if ( empty( $results ) ) {
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
        return aiship_tickers_fallback();
    }

    set_transient( 'aiship_tickers', $tickers, 6 * HOUR_IN_SECONDS );
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
