<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_VC_About' ) ) {
		
	class RDTheme_VC_About extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "FinancePro: About", 'financepro-core' );
			$this->base = 'finance-vc-about';
			$this->translate = array(
				'title'   		=> __( 'About Finance Wordpress Theme', 'financepro-core' ),
				'buttontext' 	=> __( 'Read More', 'financepro-core' ),
			);
			parent::__construct();
		}

		public function fields(){
			$fields = array(
				array(
					"type"		  => "dropdown",
					"holder"	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Image Alignment", 'financepro-core' ),
					"param_name"  => "layout",
					'value' 	  => array( 
						'Left'  => 'style1',
						'Right' => 'style2'		
						),
					),
				array(
					"type"		  => "attach_image",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Image", 'financepro-core' ),
					"param_name"  => "image",
				),
				array(
					"type"        => "textfield",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Title", 'financepro-core' ),
					"param_name"  => "title",
					"value" 	  => $this->translate['title'],
					"rows" 		  => "1",
				),			
				array(
					"type" 		  => "colorpicker",
					"class" 	  => "",
					"heading" 	  => __( "Title color", "financepro-core" ),
					"param_name"  => "title_color",
					"value" 	  => '#000000',
					),
				array(
					"type" 		 => "textarea_html",
					"holder" 	 => "div",
					"class" 	 => "",
					"heading" 	 => __( "Content", 'financepro-core' ),
					"param_name" => "content",
					"value" 	 =>  __( 'Intense is an International Financial Planning company with offices in multiple jurisdictions over the world. Working with Intense gives me the ability to advise international expatriates. I am John Doe, a senior advisor for an independently owned financial planning company called Financeco.' ),
					"rows"		 => "1",
					),
				array(
					"type" 		  => "textfield",
					"holder" 	  => "div",
					"class"		  => "",
					"heading" 	  => __( "Name", 'financepro-core' ),
					"param_name"  => "name",
					"value" 	  => "",
				),
				array(
					"type" 		  => "textfield",
					"holder" 	  => "div",
					"class"		  => "",
					"heading" 	  => __( "Designation", 'financepro-core' ),
					"param_name"  => "designation",
					"value" 	  => "",
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
				'layout' 		=> 'style1',
				'image'      	=> '',
				'title'      	=> $this->translate['title'],
				'title_color' 	=> '#000000',
				'name' 		  	=> '',
				'designation'   => '',				
				'css'           => '',
				), $atts ) );			
			
			switch ( $layout ) {
				case 'style2':
					$template = 'about-view-2';
				break;	
				default:
					$template = 'about-view-1';
				break;
			}

			return $this->template( $template, get_defined_vars() );
			
		}
	}
}

new RDTheme_VC_About;