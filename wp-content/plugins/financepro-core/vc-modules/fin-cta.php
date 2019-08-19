<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_VC_Call_To_Action' ) ) {

	class RDTheme_VC_Call_To_Action extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "FinancePro: Call to Action", 'financepro-core' );
			$this->base = 'finan-vc-call-to-action';
			$this->translate = array(
				'title' => __( "Waste No More Time", 'financepro-core' ),
				'subtitle' => __( "Buy the latest finance wordpress theme and be grow with us", 'financepro-core' ),
				'buttontext' => __( "Buy Theme", 'financepro-core' ),
			);
			parent::__construct();
		}

		public function fields(){
			$fields = array(
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Title", 'financepro-core' ),
					"param_name" => "title",
					"value" => $this->translate['title'],
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Subtitle", 'financepro-core' ),
					"param_name" => "subtitle",
					"value" => $this->translate['subtitle'],
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Button Text", 'financepro-core' ),
					"param_name" => "buttontext",
					"value" => $this->translate['buttontext'],
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Button URL", 'financepro-core' ),
					"param_name" => "buttonurl",
					"value" => '#',
				),
				array(
					'type' => 'css_editor',
					'heading' => __( 'Css', 'financepro-core' ),
					'param_name' => 'css',
					'group' => __( 'Design options', 'financepro-core' )
				),
			);
			return $fields;
		}

		public function shortcode( $atts, $content = '' ){
			extract( shortcode_atts( array(
				'title'      => $this->translate['title'],
				'subtitle'   => $this->translate['subtitle'],
				'buttontext' => $this->translate['buttontext'],
				'buttonurl'  => '#',
				'css'        => '',
				), $atts ) );

			$template = 'fin-cta';

			return $this->template( $template, get_defined_vars() );
		}
	}
}

new RDTheme_VC_Call_To_Action;