<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_VC_Text_With_Image' ) ) {
		
	class RDTheme_VC_Text_With_Image extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "FinancePro: Text with Image", 'financepro-core' );
			$this->base = 'finance-vc-text-with-image';
			$this->translate = array(
				'title'   	    => __( 'About Finance Wordpress Theme', 'financepro-core' ),
				'data_content'  => __( "Bimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley.the industry standard dummy text eveunknown. Bimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley.the industry standard dummy text eveunknown.", 'financepro-core' ),
			);
			parent::__construct();
		}

		public function fields(){
			$fields = array(
				array(
					"type"		  => "dropdown",
					"holder"	  => "div",
					"class" 	  => "tet",
					"heading" 	  => __( "Image Alignment", 'financepro-core' ),
					"param_name"  => "layout",
					'value' 	  => array(
						'Right'   => 'style2',
						'Left' 	  => 'style1',
						)
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
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'style2' ),
						),
					),					
				array(
					"type" 		 => "textarea_html",
					"holder" 	 => "div",
					"class" 	 => "",
					"heading" 	 => __( "Content", 'financepro-core' ),
					"param_name" => "content",
					"value" 	 =>  __( 'Bimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley.the industry standard dummy text eveunknown. Bimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley.the industry standard dummy text eveunknown.' , 'financepro-core' ),
					"rows"		 => "1",
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
				'layout' 			  => 'style2',
				'image'      		  => '',
				'title'      		  => $this->translate['title'],
				'title_color' 		  => '#000000',				
				'css'             	  => '',
				), $atts ) );			
			
			switch ( $layout ) {
				case 'style2':
					$template = 'text-with-image-view-2';
				break;	
				default:
					$template = 'text-with-image-view-1';
				break;
			}

			return $this->template( $template, get_defined_vars() );
			
		}
	}
}

new RDTheme_VC_Text_With_Image;