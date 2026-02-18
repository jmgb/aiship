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


/*
 * ============================================================
 * YAHOO FINANCE — DESCARTADO (ver motivo abajo)
 * ============================================================
 *
 * Se intentó obtener cotizaciones en tiempo real de Yahoo Finance
 * por dos vías. Ninguna es viable:
 *
 * VÍA 1 — PHP server-side (wp_remote_get)
 *   Yahoo Finance exige desde 2024 un token "crumb" vinculado a una
 *   cookie de sesión del navegador. El servidor de Hostinger recibe
 *   una página de consentimiento GDPR en lugar de la página normal,
 *   por lo que las cookies que devuelve no contienen el token A3 de
 *   sesión válido. Resultado: HTTP 401 en cada intento.
 *   La librería yfinance de Python resuelve esto internamente con un
 *   cookie jar persistente, pero replicarlo en PHP no es fiable.
 *
 * VÍA 2 — JavaScript client-side (fetch desde el navegador)
 *   Los endpoints query1/query2.finance.yahoo.com no incluyen la
 *   cabecera Access-Control-Allow-Origin. El navegador bloquea la
 *   petición por política CORS antes de que llegue al servidor.
 *   Ninguna librería JS de Yahoo Finance funciona en browser;
 *   todas requieren Node.js (server-side). Resultado: CORS error.
 *
 * ALTERNATIVA RECOMENDADA: Finnhub (finnhub.io)
 *   - API oficial, gratuita (60 req/min en free tier)
 *   - Sin problemas de CORS ni crumb: solo un token en la URL
 *   - Para activarla: registrarse en finnhub.io, obtener API key,
 *     definir en wp-config.php:
 *       define( 'AISHIP_FINNHUB_KEY', 'tu_api_key' );
 *     y reescribir aiship_get_tickers() usando su endpoint:
 *       https://finnhub.io/api/v1/quote?symbol=AAPL&token=KEY
 * ============================================================
 */

/**
 * Devuelve los tickers del ticker bar.
 * Por ahora usa valores estáticos (ver comentario Yahoo Finance arriba).
 *
 * @return array  [ ['sym' => 'AAPL', 'chg' => '+1.24%', 'pos' => true], ... ]
 */
function aiship_get_tickers() {
    $GLOBALS['aiship_ticker_source'] = 'fallback';
    return aiship_tickers_fallback();
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
