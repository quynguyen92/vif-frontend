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
    wp_enqueue_style( 'vif-style', get_template_directory_uri() . '/public/css/style.css', array(), wp_get_theme()->get( 'Version' ));
}
add_action( 'wp_enqueue_scripts', 'vif_load_styles' );