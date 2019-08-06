<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 2.1
 */
 
$rdtheme_theme_data = wp_get_theme( get_template() );

if ( function_exists('vc_is_inline') && vc_is_inline() ) {
	define( 'FINANCEPRO_VERSION', time() );
}
else {
	define( 'FINANCEPRO_VERSION', ( WP_DEBUG ) ? time() : $rdtheme_theme_data->get( 'Version' ) );
}
 
define( 'RDTHEME_AUTHOR_URI', $rdtheme_theme_data->get( 'AuthorURI' ) );
define( 'RDTHEME_PREFIX', 'financepro' );
// DIR
define( 'RDTHEME_BASE_DIR',    get_template_directory(). '/' );
define( 'RDTHEME_INC_DIR',     RDTHEME_BASE_DIR . 'inc/' );
define( 'RDTHEME_VIEW_DIR',    RDTHEME_INC_DIR . 'views/' );
define( 'RDTHEME_LIB_DIR',     RDTHEME_BASE_DIR . 'lib/' );
define( 'RDTHEME_WID_DIR',     RDTHEME_INC_DIR . 'widgets/' );
define( 'RDTHEME_PLUGINS_DIR', RDTHEME_INC_DIR . 'plugins/' );
define( 'RDTHEME_ASSETS_DIR',  RDTHEME_BASE_DIR . 'assets/' );
define( 'RDTHEME_CSS_DIR',     RDTHEME_ASSETS_DIR . 'css/' );
define( 'RDTHEME_JS_DIR',      RDTHEME_ASSETS_DIR . 'js/' );

// URL
define( 'RDTHEME_BASE_URL',    get_template_directory_uri(). '/' );
define( 'RDTHEME_ASSETS_URL',  RDTHEME_BASE_URL . 'assets/' );
define( 'RDTHEME_CSS_URL',     RDTHEME_ASSETS_URL . 'css/' );
define( 'RDTHEME_AUTORTL_URL', RDTHEME_ASSETS_URL . 'css-auto-rtl/' ); //@rtl
define( 'RDTHEME_JS_URL',      RDTHEME_ASSETS_URL . 'js/' );
define( 'RDTHEME_IMG_URL',     RDTHEME_ASSETS_URL . 'img/' );
define( 'RDTHEME_LIB_URL',     RDTHEME_BASE_URL . 'lib/' );

// Includes
require_once RDTHEME_INC_DIR . 'redux-config.php';
require_once RDTHEME_INC_DIR . 'rdtheme.php';
require_once RDTHEME_INC_DIR . 'helper-functions.php';
require_once RDTHEME_INC_DIR . 'general.php';
require_once RDTHEME_INC_DIR . 'scripts.php';
require_once RDTHEME_INC_DIR . 'template-vars.php';
require_once RDTHEME_INC_DIR . 'vc-settings.php';
require_once RDTHEME_INC_DIR . 'sidebar-generator.php';

// WooCommerce
if ( class_exists( 'WooCommerce' ) ) {
	require_once RDTHEME_INC_DIR . 'woo-functions.php';
	require_once RDTHEME_INC_DIR . 'woo-hooks.php';
}

// TGM Plugin Activation
require_once RDTHEME_LIB_DIR . 'class-tgm-plugin-activation.php';
require_once RDTHEME_INC_DIR . 'tgm-config.php';


add_editor_style( 'style-editor.css' );

// Widgets fallback
if ( function_exists( 'financepro_core_load_textdomain' ) && !defined( 'FINANCEPRO_CORE_UPDATE_1' ) ) {
	add_action( 'admin_notices', 'financepro_widgets_fallback_notice' );
}

function financepro_widgets_fallback_notice() {
	$notice = '<div class="error"><p>' . sprintf( __( "Please update plugin <b><i>FinancePro Core</b></i> to the latest version otherwise some functionalities will not work properly. You can update it from <a href='%s'>here</a>", 'financepro' ), menu_page_url( 'financepro-install-plugins', false ) ) . '</p></div>';
	echo wp_kses_post( $notice );
}