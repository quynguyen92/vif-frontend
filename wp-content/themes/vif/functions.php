<?php

if ( ! function_exists( 'vif_setup' ) ) :
	function vif_setup() {
		load_theme_textdomain( 'vif', get_template_directory() . '/languages' );
	}
endif;
add_action( 'after_setup_theme', 'vif_setup' );

function vif_load_styles() {
    wp_enqueue_style( 'vif-bootstrap', get_template_directory_uri() . '/public/lib/bootstrap-4.3.1/css/bootstrap.min.css', array(), wp_get_theme()->get( 'Version' ));
    wp_enqueue_style( 'vif-fontawesome', get_template_directory_uri() . '/public/lib/fontawesome/css/fontawesome.css', array(), wp_get_theme()->get( 'Version' ));
    wp_enqueue_style( 'vif-fontawesome-solid', get_template_directory_uri() . '/public/lib/fontawesome/css/solid.css', array(), wp_get_theme()->get( 'Version' ));
    wp_enqueue_style( 'vif-fontawesome-brands', get_template_directory_uri() . '/public/lib/fontawesome/css/brands.css', array(), wp_get_theme()->get( 'Version' ));
    wp_enqueue_style( 'vif-style', get_template_directory_uri() . '/public/css/main.css', array(), wp_get_theme()->get( 'Version' ));
    // autoload css file
    $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
    switch (true) {
        case empty($uri) || $uri == '/':
            $filename = 'home.css';
            break;
        case !empty($uri):
            $filename = trim($uri, '/') . '.css';
            break;
        default:
            $filename = '';
            break;
    }
    $autoloadFile = get_template_directory() . '/public/css/autoload/' . $filename;
    if (file_exists($autoloadFile)) {
        wp_enqueue_style( 'vif-style-autoload', get_template_directory_uri() . '/public/css/autoload/' . $filename, array(), wp_get_theme()->get( 'Version' ));
    }
}
add_action( 'wp_enqueue_scripts', 'vif_load_styles' );