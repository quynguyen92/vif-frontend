<?php
/*
Plugin Name: WP Chatbot
Plugin URI:  https://mobilemonkey.com/wp-chatbot/
Description: Add Messenger to your website, Chatbot or live Chat using Facebook Messenger
Version:     4.1.5
Author:      MobileMonkey
Author URI:  https://mobilemonkey.com/wp-chatbot/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wp-chatbot
*/


if ( ! defined( 'ABSPATH' ) ) exit;


// Version - define HTCC_VERSION
if ( ! defined( 'HTCC_VERSION' ) ) {
	define( 'HTCC_VERSION', '4.1.5' );
}


/**
 * if premium set to true
 * and change add suffix to name, version
 * for wp.org - remove the pro folders
 */
if ( ! defined( 'HTCC_PRO' ) ) {
	define( 'HTCC_PRO', 'false' );
}

// define HTCC_PLUGIN_FILE
if ( ! defined( 'HTCC_PLUGIN_FILE' ) ) {
	define( 'HTCC_PLUGIN_FILE', __FILE__ );
}

// include main file
require_once 'inc/class-ht-cc.php';

// create instance for the main file - HT_CC
function ht_cc() {
	return HT_CC::instance();
}

ht_cc();