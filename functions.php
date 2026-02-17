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
