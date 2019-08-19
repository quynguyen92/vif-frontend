<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_VC_Progress_Bar' ) ) {

	class RDTheme_VC_Progress_Bar extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "FinancePro: Progress Bar", 'financepro-core' );
			$this->base = 'finan-vc-progress-bar';
			$this->translate = array(
				'title' => __( "Income Invest", 'financepro-core' ),
			);
			parent::__construct();
		}

		public function fields(){
			$fields = array(				
				// params group
				array(
					'type' => 'param_group',
					'value' => '',
					'param_name' => 'progress_bars',
					// Note params is mapped inside param-group:
					'params' => array(
						array(
							'type' => 'textfield',
							'heading' => 'Bar Title',
							'param_name' => 'title',
							"value" => $this->translate['title'],
						),
						array(
							'type' => 'textfield',
							'heading' => 'Number',
							'param_name' => 'bar_number',
							"value" => 80,
						),
						array(
							"type" => "colorpicker",
							"class" => "",
							"heading" => __( "Title Color", "miakolegal-core" ),
							"param_name" => "title_color",
							"value" => '#222222',
						),
						array(
							"type" => "colorpicker",
							"class" => "",
							"heading" => __( "Bar Color", "financepro-core" ),
							"param_name" => "bar_color",
							"value" => '',
						),
					)
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
				'progress_bars' => '',
				'title'         => $this->translate['title'],
				'bar_number'    => 80,
				'title_color'   => '#222222',
				'bar_color'     => '',				
				'css'           => '',
				), $atts ) );
			
			wp_enqueue_script( 'wow-js' );
			$template = 'progress';

			return $this->template( $template, get_defined_vars() );
		}
	}
}

new RDTheme_VC_Progress_Bar;