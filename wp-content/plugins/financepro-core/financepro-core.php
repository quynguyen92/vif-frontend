<?php
/*
Plugin Name: FinancePro Core
Plugin URI: http://radiustheme.com
Description: FinancePro Core Plugin for Finance Theme
Version: 1.6.1
Author: RadiusTheme
Author URI: http://radiustheme.com
*/

define( 'FINANCEPRO_CORE_UPDATE_1', true );
define( 'FINANCEPRO_CORE', ( WP_DEBUG ) ? time() : '1.5' );
define( 'FINANCEPRO_CORE_BASE_URL', plugin_dir_url( __FILE__ ) );

// Text Domain
add_action( 'plugins_loaded', 'financepro_core_load_textdomain' );
if ( !function_exists( 'financepro_core_load_textdomain' ) ) {
	function financepro_core_load_textdomain() {
		load_plugin_textdomain( 'financepro-core' , false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
	}
}

add_action( 'after_setup_theme', 'layerslider_init' );
function layerslider_init() {

	if( function_exists( 'layerslider_set_as_theme' ) ) {
		layerslider_set_as_theme();
	}

	if( function_exists( 'layerslider_hide_promotions' ) ) {
		layerslider_hide_promotions();
	}

	add_action( 'admin_init', 'layerslider_disable_plugin_notice' ); // Remove LayerSlider purchase notice from plugins page

	fix_layerslider_tgm_compability(); // Fix issue of Layerslider update via TGM
}

function layerslider_disable_plugin_notice() {
	if ( defined( 'LS_PLUGIN_BASE' ) ) {
		remove_action( 'after_plugin_row_' . LS_PLUGIN_BASE, 'layerslider_plugins_purchase_notice', 10, 3 );
	}
}
function fix_layerslider_tgm_compability(){
	if ( !is_admin() || !apply_filters( 'gymedge_disable_layerslider_autoupdate', true ) || get_option( 'layerslider-authorized-site' ) ) return;

	global $LS_AutoUpdate;
	if ( isset( $LS_AutoUpdate ) && defined( 'LS_ROOT_FILE' ) ) {
		remove_filter( 'pre_set_site_transient_update_plugins', array( $LS_AutoUpdate, 'set_update_transient' ) );
		remove_filter( 'plugins_api', array( $LS_AutoUpdate, 'set_updates_api_results'), 10, 3 );
		remove_filter( 'upgrader_pre_download', array( $LS_AutoUpdate, 'pre_download_filter' ), 10, 4 );
		remove_filter( 'in_plugin_update_message-'.plugin_basename( LS_ROOT_FILE ), array( $LS_AutoUpdate, 'update_message' ) );
		remove_filter( 'wp_ajax_layerslider_authorize_site', array( $LS_AutoUpdate, 'handleActivation' ) );
		remove_filter( 'wp_ajax_layerslider_deauthorize_site', array( $LS_AutoUpdate, 'handleDeactivation' ) );
	}
}


// Widgets
require_once 'widgets/widget-settings.php';
require_once 'widgets/address-widget.php';
require_once 'widgets/social-widget.php';
require_once 'widgets/slider-widget.php';
require_once 'widgets/search-widget.php'; // override default

// Post types
add_action( 'after_setup_theme', 'financepro_core_post_types', 15 );
if ( !function_exists( 'financepro_core_post_types' ) ) {
	function financepro_core_post_types(){
		if ( !defined( 'FINANCEPRO_VERSION' ) || ! defined( 'RT_FRAMEWORK_VERSION' ) ) {
			return;
		}
		require_once 'post-types.php';
		require_once 'post-meta.php';
	}
}

// Visual composer
add_action( 'after_setup_theme', 'financepro_core_vc_modules', 20 );
if ( !function_exists( 'financepro_core_vc_modules' ) ) {
	function financepro_core_vc_modules(){
		if ( !defined( 'FINANCEPRO_VERSION' ) || ! defined( 'WPB_VC_VERSION' ) || ! defined( 'RT_FRAMEWORK_VERSION' ) ) {
			return;
		}

		require_once 'vc-flaticon/vc-flaticon.php';
		
		$modules = array( 'inc/abstruct', 'title', 'info-text', 'post', 'case-studies', 'case-studies-slider', 'service', 'service-grid', 'service-single', 'team', 'team-grid', 'testimonial', 'portfolio-grid', 'portfolio-isotope', 'portfolio-slider', 'fin-cta', 'tab', 'counter', 'pricing-box', 'text-with-image', 'text-with-button', 'text-with-video', 'about', 'contact-info' , 'progress-bar' );
		foreach ( $modules as $module ) {
			require_once 'vc-modules/' . $module. '.php';
		}
	}
}

// Demo Importer settings
require_once 'demo-importer.php';