<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_VC_Text_With_Button' ) ) {
		
	class RDTheme_VC_Text_With_Button extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "FinancePro: Text with Button", 'financepro-core' );
			$this->base = 'finance-vc-text-with-button';
			$this->translate = array(
				'title'   	    => __( 'You can design your own site', 'financepro-core' ),
				'button_text'   => __( 'READ MORE', 'financepro-core' ),
			);
			parent::__construct();
		}

		public function fields(){
			$fields = array(
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Alignment", 'financepro-core' ),
					"param_name" => "section_align",
					"value" => array( 
						__('Center', 'financepro-core') => 'center',
						__('Left', 'financepro-core')   => 'left',
						__('Right', 'financepro-core')  => 'right',
						),
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
					"value" 	  => '#222222',
					),
				array(
					"type"        => "textfield",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Title Font Size", 'financepro-core' ),
					"param_name"  => "title_font_size",
					"value" 	  => '36',
				),
				array(
					"type" 		 => "textarea_html",
					"holder" 	 => "div",
					"class" 	 => "",
					"heading" 	 => __( "Content", 'financepro-core' ),
					"param_name" => "content",
					"value" 	 =>  __( "Mimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five cent into electronining essentially unchanged." , 'financepro-core' ),
					"rows"		 => "1",
					),					
				array(
					"type" 		  => "colorpicker",
					"class" 	  => "",
					"heading" 	  => __( "Content color", "financepro-core" ),
					"param_name"  => "content_color",
					"value" 	  => '#222222',
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Button Style", 'financepro-core' ),
					"param_name" => "button_style",
					"value" => array( 
						__('Light Background', 'financepro-core') => 'style1',
						__('Dark Background', 'financepro-core') => 'style2',
						),
					),
				array(
					"type"        => "textfield",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Button Text", 'financepro-core' ),
					"param_name"  => "button_text",
					"value" 	  => $this->translate['button_text'],
				),
				array(
					"type"        => "textfield",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Button URL", 'financepro-core' ),
					"param_name"  => "button_url",
					"value" 	  => '#',
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
				'title'      		=> $this->translate['title'] ,
				'title_color' 		=> '#222222',
				'title_font_size' 	=> '36',
				'content_color' 	=> '#222222',
				'button_text' 	    => $this->translate['button_text'],
				'button_url' 	    => '#',
				'button_style' 	    => 'style1',
				'section_align' 	=> 'center',
				'css'             	=> '',
				), $atts ) );			
			//validation			
			$title_font_size      = intval( $title_font_size );
			
			$template = 'text-with-button';

			return $this->template( $template, get_defined_vars() );
			
		}
	}
}

new RDTheme_VC_Text_With_Button;