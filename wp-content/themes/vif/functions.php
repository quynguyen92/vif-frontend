<?php

if ( ! function_exists( 'vif_setup' ) ) :
	function vif_setup() {
		load_theme_textdomain( 'vif', get_template_directory() . '/languages' );
	}
endif;
add_action( 'after_setup_theme', 'vif_setup' );

function vif_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer', 'vif' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'vif' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'vif_widgets_init' );

function vif_load_styles() {
    wp_enqueue_style( 'vif-bootstrap', get_template_directory_uri() . '/public/lib/bootstrap-4.3.1/css/bootstrap.min.css', array(), wp_get_theme()->get( 'Version' ));
    wp_enqueue_style( 'vif-fontawesome', get_template_directory_uri() . '/public/lib/fontawesome/css/fontawesome.css', array(), wp_get_theme()->get( 'Version' ));
    wp_enqueue_style( 'vif-fontawesome-solid', get_template_directory_uri() . '/public/lib/fontawesome/css/solid.css', array(), wp_get_theme()->get( 'Version' ));
    wp_enqueue_style( 'vif-fontawesome-brands', get_template_directory_uri() . '/public/lib/fontawesome/css/brands.css', array(), wp_get_theme()->get( 'Version' ));
    wp_enqueue_style( 'vif-style', get_template_directory_uri() . '/public/css/style.css', array(), wp_get_theme()->get( 'Version' ));
}
add_action( 'get_header', 'vif_load_styles' );