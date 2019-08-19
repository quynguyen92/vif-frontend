<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( ! defined( 'RT_VC_FLATICON_ASSETS' ) ) {
	define( 'RT_VC_FLATICON_ASSETS',  FINANCEPRO_CORE_BASE_URL . 'vc-flaticon/assets/' );
}
if ( ! defined( 'RT_VC_FLATICON_VERSION' ) ) {
	define( 'RT_VC_FLATICON_VERSION',  FINANCEPRO_CORE );
}

// Register Flaticon CSS
add_action( 'init', 'rt_register_flaticons' );
function rt_register_flaticons(){
	wp_register_style( 'rt-flaticon-finance', RT_VC_FLATICON_ASSETS . 'flaticon-finance.min.css', array(), RT_VC_FLATICON_VERSION );
	wp_register_style( 'rt-flaticon-sam',     RT_VC_FLATICON_ASSETS . 'flaticon-sam.min.css', array(), RT_VC_FLATICON_VERSION );
	wp_register_style( 'rt-flaticon-custom',  RT_VC_FLATICON_ASSETS . 'flaticon-custom.min.css', array(), RT_VC_FLATICON_VERSION );
	do_action( 'rt_vc_flaticon_registers',    RT_VC_FLATICON_VERSION );
}

// Enqueue Flaticon CSS in VC Editor Mode
add_action( 'vc_backend_editor_enqueue_js_css', 'rt_enqueue_flaticon_in_editor' );
add_action( 'vc_frontend_editor_enqueue_js_css', 'rt_enqueue_flaticon_in_editor' );
function rt_enqueue_flaticon_in_editor() {
	wp_enqueue_style( 'rt-flaticon-finance' );
	wp_enqueue_style( 'rt-flaticon-sam' );
	wp_enqueue_style( 'rt-flaticon-custom' );
	do_action( 'rt_vc_flaticon_enqueues');
}

// Enqueue Flaticon CSS in frontend
add_action( 'vc_enqueue_font_icon_element', 'rt_enqueue_flaticon_in_shortcode' );
function rt_enqueue_flaticon_in_shortcode( $font ){
	// remove substring after 2nd occurrence of '-'
	$newstr = substr( $font, 0, strpos( $font, '-', strpos( $font, '-' ) +1 ) );
	$newstr = 'rt-' . $newstr;
	// enqueue
	if ( wp_style_is( $newstr, 'registered' ) ) {
		wp_enqueue_style( $newstr );
	}
}

// Flaticon fields
add_filter( 'vc_iconpicker-type-flaticon', 'rt_flaticons_array' );
function rt_flaticons_array( $icons ) {
	require 'flaticon-sam.php';
	require 'flaticon-finance.php';
	require 'flaticon-custom.php';
	$flaticons = array(
		__( 'FinancePro', 'financepro-core' )         => $flaticons_finance,
		__( 'Seo and Marketing', 'financepro-core' )  => $flaticons_sam,
		__( 'Miscellaneous', 'financepro-core' )      => $flaticons_custom,
	);
	$flaticons = apply_filters( 'rt_vc_flaticon_fields', $flaticons );
	return array_merge( $icons, $flaticons );
}