<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_VC_Tab' ) ) {

	class RDTheme_VC_Tab extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "FinancePro: Tab", 'financepro-core' );
			$this->base = 'finan-vc-tab';
			$this->translate = array(
				'title' => __( "Welcome To Finance", 'financepro-core' ),
			);
			parent::__construct();
		}

		public function fields(){
			$fields = array(
				
				// params group
				array(
					'type' => 'param_group',
					'value' => '',
					'param_name' => 'tabs',
					// Note params is mapped inside param-group:
					'params' => array(
						array(
							'type' => 'textfield',
							'heading' => 'Tab Title',
							'param_name' => 'title',
							"value" => $this->translate['title'],
						),
						array(
							"type" => "dropdown",
							"holder" => "div",
							"class" => "",
							"heading" => __( "Icon Type", 'financepro-core' ),
							"param_name" => "icontype",
							'value' => array( 
								__( 'FlatIcon', 'financepro-core' )     => 'flaticon',
								__( 'FontAwesome', 'financepro-core' )  => 'fontawesome',
								__( 'Custom Image', 'financepro-core' ) => 'image',
								),
							),
						array(
							'type' => 'iconpicker',
							'heading' => __( 'Flaticon', 'financepro-core' ),
							'param_name' => 'icon_flat',
							"value" => 'flaticon-custom-target',
							'settings' => array(
								'emptyIcon' => false,
								'type' => 'flaticon',
								'iconsPerPage' => 160,
								),
							'dependency' => array(
								'element' => 'icontype',
								'value'   => array( 'flaticon' ),
								),
							),
						array(
							'type' => 'iconpicker',
							'heading' => __( 'FontAwesome Icon', 'financepro-core' ),
							'param_name' => 'icon_fa',
							"value" => 'fa fa-bar-chart',
							'settings'      => array(
								'emptyIcon' => false,
								'iconsPerPage' => 160,
								),
							'dependency'  => array(
								'element' => 'icontype',
								'value'   => array( 'fontawesome' ),
								),
							),
						array(
							"type" 		  => "attach_image",
							"holder" 	  => "div",
							"class" 	  => "",
							"heading" 	  => __( "Upload icon image", 'financepro-core' ),
							"param_name"  => "image",
							'dependency'  => array(
								'element' => 'icontype',
								'value'   => array( 'image' ),
								),
							),							
						array(
							"type"        => "textarea",
							"holder" 	  => "div",
							"class" 	  => "",
							"heading" 	  => __( "Content Text", 'financepro-core' ),
							"param_name"  => "content_text",
							"value" 	  => "Intense is an International Financial Planning company with offices in multiple jurisdictions over the world. Working with Intense gives me the ability to advise international expatriates. I am John Doe, a senior advisor for an independently owned financial planning company called Financeco.",
							"rows" 		  => "1",
						)
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
				'tabs'    	   => '',
				'title'        => $this->translate['title'],
				'icontype'     => 'flaticon',
				'icon_flat'    => 'flaticon-custom-target',
				'icon_fa'      => 'fa fa-bar-chart',
				'image'        => '',
				'content_text' => "Intense is an International Financial Planning company with offices in multiple jurisdictions over the world. Working with Intense gives me the ability to advise international expatriates. I am John Doe, a senior advisor for an independently owned financial planning company called Financeco.",
				'css'          => '',
				), $atts ) );
			

			$template = 'tab';

			return $this->template( $template, get_defined_vars() );
		}
	}
}

new RDTheme_VC_Tab;