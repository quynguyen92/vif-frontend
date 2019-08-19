<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_VC_Counter' ) ) {

	class RDTheme_VC_Counter extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "FinancePro: Counter", 'financepro-core' );
			$this->base = 'finance-vc-counter';
			$this->translate = array(
				'title'   => __( "HAPPY CLIENTS", 'financepro-core' ),
			);
			parent::__construct();
		}

		public function load_scripts(){
			wp_enqueue_script( 'rt-waypoints' );
			wp_enqueue_script( 'counterup' );
		}

		public function fields(){
			$fields = array(
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Counter color", "financepro-core" ),
					"param_name" => "counter_color",
					"value" => '',
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Title color", "financepro-core" ),
					"param_name" => "title_color",
					"value" => '',
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Counter Font Size", 'financepro-core' ),
					"param_name" => "icon_size",
					'description' => __( 'Icon size in px eg. 20', 'financepro-core' ),
					'value' => '40',
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Counter Number", 'financepro-core' ),
					"param_name" => "counter_number",
					"value" => '5780',
					'description' => __( 'Number to count eg. 5780', 'financepro-core' ),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Counter Speed", 'financepro-core' ),
					"param_name" => "counter_speed",
					"value" => '3000',
					'description' => __( 'The total duration of the count animation in milisecond eg. 5000', 'financepro-core' ),
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Counter Steps", 'financepro-core' ),
					"param_name" => "counter_steps",
					"value" => '10',
					'description' => __( 'Counter steps eg. 10', 'financepro-core' ),
				),
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
					"heading" => __( "Counter Text Size", 'financepro-core' ),
					"param_name" => "title_size",
					'description' => __( 'Counter Text size in px eg. 20', 'financepro-core' ),
					'value' => '18',
					),
				array(
					'type' => 'css_editor',
					'heading' => __( 'Css', 'financepro-core' ),
					'param_name' => 'css',
					'group' => __( 'Design options', 'financepro-core' ),
					),
				);
			return $fields;
		}
		
		public function shortcode( $atts, $content = '' ){
			extract( shortcode_atts( array(
				'counter_color'	       => '',
				'title_color'	       => '',
				'icon_size'            => '40',
				'counter_number'       => '5780',
				'counter_speed'        => '3000',
				'counter_steps'        => '10',
				'title'			       => $this->translate['title'],
				'title_size'           => '18',
				'css'                  => '',
				), $atts ) );

			// validation
			$counter_speed   = intval( $counter_speed );
			$counter_steps   = intval( $counter_steps );

			$number          = intval( $counter_number );
			$text            = explode( $number, $counter_number );
			$counter_number  = $number;
		
			$this->load_scripts();

			$template = 'counter';

			return $this->template( $template, get_defined_vars() );
		}
	}
}

new RDTheme_VC_Counter;