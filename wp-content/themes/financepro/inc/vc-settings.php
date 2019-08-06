<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( ! defined( 'WPB_VC_VERSION' ) ) {
	return;
}

// Setup VC as part of a theme
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme();
}