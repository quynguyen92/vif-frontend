<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_VC_Text_With_Video' ) ) {
		
	class RDTheme_VC_Text_With_Video extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "FinancePro: Text with Video", 'financepro-core' );
			$this->base = 'finance-vc-text-with-video';
			$this->translate = array(
				'sm_title'   	    => __( 'Since 1996', 'financepro-core' ),
				'lg_title'   	    => __( 'Our Company History', 'financepro-core' ),
			);
			parent::__construct();
		}

		public function fields(){
			$fields = array(
				array(
					"type"		  => "dropdown",
					"holder"	  => "div",
					"class" 	  => "tet",
					"heading" 	  => __( "Layout", 'financepro-core' ),
					"param_name"  => "layout",
					'value' 	  => array( 
						'Video Right' => 'style1',
						'Video Left'  => 'style2'
						)
					),					
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Small Title", 'financepro-core' ),
					"param_name" => "sm_title",
					"value" => $this->translate['sm_title'],
					),
				array(
					"type" 		  => "colorpicker",
					"class" 	  => "",
					"heading" 	  => __( "Small Title Color", "financepro-core" ),
					"param_name"  => "sm_title_color",
					"value" 	  => '#000000',
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Main Title", 'financepro-core' ),
					"param_name" => "lg_title",
					"value" => $this->translate['lg_title'],
					),
				array(
					"type" 		  => "colorpicker",
					"class" 	  => "",
					"heading" 	  => __( "Main Title Color", "financepro-core" ),
					"param_name"  => "lg_title_color",
					"value" 	  => '#000000',
					),
				array(
					'type' => 'textfield',
					'heading' => __( 'Video link', 'financepro-core' ),
					'param_name' => 'link',
					'value' => 'https://vimeo.com/51589652',
					'admin_label' => true,
					'description' => sprintf( __( 'Enter link to video (Note: read more about available formats at WordPress <a href="%s" target="_blank">codex page</a>).', 'financepro-core' ), 'http://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F' ),
				),
				array(
					"type" 		 => "textarea_html",
					"holder" 	 => "div",
					"class" 	 => "",
					"heading" 	 => __( "Content", 'financepro-core' ),
					"param_name" => "content",
					"value" 	 =>  __( 'Rimply dummy text of the printing and typesetting istrykorem Ipsum hasbeen daand scrambled.make a type specimen book. Lorem ipsum dolor sit ameen uer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dol agna aliquam erat volutpat. Ut wisi enim ad minim veniamnostrud exerci ullamcorper suscipit ut aliquip exea.<br>scrambled.make a type specimen book. Lorem ipsum dolor sit ameen uer adipiscing elit, sed diam nonummy nibh euismod' , 'financepro-core' ),
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
				'layout' 			  => 'style1',
				'sm_title' 			  => $this->translate['sm_title'],
				'sm_title_color'      => '#000000',
				'lg_title'      	  => $this->translate['lg_title'],
				'lg_title_color'      => '#000000',			
				'link'                => 'https://vimeo.com/51589652',			
				'css'             	  => '',
				), $atts ) );			
			
			switch ( $layout ) {
				case 'style2':
					$template = 'text-with-video-view-2';
				break;	
				default:
					$template = 'text-with-video-view-1';
				break;
			}

			return $this->template( $template, get_defined_vars() );
			
		}
	}
}

new RDTheme_VC_Text_With_Video;