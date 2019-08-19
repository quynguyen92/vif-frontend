<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
add_action( 'widgets_init', 'rdtheme_widgets_init' );
function rdtheme_widgets_init() {
	// Register Custom Widgets
	register_widget( 'RDTheme_Address_Widget' );
	register_widget( 'RDTheme_Social_Widget' );
	register_widget( 'RDTheme_Slide_Widget' );
}