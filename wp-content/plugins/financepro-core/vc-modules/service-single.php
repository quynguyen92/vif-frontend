<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_VC_Service_Single' ) ) {

	class RDTheme_VC_Service_Single extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "FinancePro: Single Service", 'financepro-core' );
			$this->base = 'finance-vc-service-single';
			$this->translate = array(
				'cols'   => array( 
					__( '1 col', 'financepro-core' ) => '12',
					__( '2 col', 'financepro-core' ) => '6',
					__( '3 col', 'financepro-core' ) => '4',
					__( '4 col', 'financepro-core' ) => '3',
					__( '6 col', 'financepro-core' ) => '2',
				),
			);
			parent::__construct();
		}

		public function fields(){
			$args = array(
				'post_type'   => 'fin_service',
				'post_status' => 'publish',
			);

			$posts_array = get_posts( $args );

			if( !empty( $posts_array ) ){
				foreach ( $posts_array as $post ) {
					$post_dropdown[$post->post_title] = $post->ID;					
				}
				$this->service_id = $posts_array[0]->ID;
			}
			else {
				$post_dropdown = $this->service_id = '';
			}

			$fields = array(
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Service", 'financepro-core' ),
					"param_name" => "id",
					'value' => $post_dropdown,
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
				'id'   => $this->service_id,
				'css'  => '',
				), $atts ) );

			$template = 'service-single';

			return $this->template( $template, get_defined_vars() );
		}
	}
}

new RDTheme_VC_Service_Single;