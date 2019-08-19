<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_VC_Modules' ) ) {

	abstract class RDTheme_VC_Modules {

		public $name;
		public $base;
		public $translate;

		public function __construct() {
			add_action( 'init', array( $this, 'vc_map' ) );
			add_shortcode( $this->base, array( $this, 'shortcode' ) );
		}

		abstract public function fields();
		abstract public function shortcode( $atts, $content );

		public function template( $template, $vars ) {
			extract( $vars );

			$template_name = "/vc-custom-addons/{$template}.php";
			if ( file_exists( STYLESHEETPATH . $template_name ) ) {
				$file = STYLESHEETPATH . $template_name;
			}
			elseif ( file_exists( TEMPLATEPATH . $template_name ) ) {
				$file = TEMPLATEPATH . $template_name;
			}
			else {
				$file = plugin_dir_path( __DIR__ ). "views/{$template}.php";
			}

			ob_start();
			include $file;
			return ob_get_clean();
		}

		public function vc_map() {
			$fields = $this->fields();
			vc_map( 
				array(
					"name" => $this->name,
					"base" => $this->base,
					"class" => "",
					"icon" => plugins_url( 'assets/vc-icon.png', dirname(__FILE__) ),
					"admin_enqueue_css" => plugins_url( 'assets/vc.css', dirname(__FILE__) ),
					"front_enqueue_css" => plugins_url( 'assets/vc.css', dirname(__FILE__) ),
					"controls" => "full",
					"category" => __( 'FinancePro', 'financepro-core'),
					"params" => $fields,
				)
			);
		}
	}	
}