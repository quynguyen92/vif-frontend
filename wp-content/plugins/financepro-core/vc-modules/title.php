<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_VC_Title' ) ) {

	class RDTheme_VC_Title extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "FinancePro: Section Title", 'financepro-core' );
			$this->base = 'finan-vc-title';
			$this->translate = array(
				'title' => __( "Welcome To Finance", 'financepro-core' ),
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
					"heading" => __( "Title Font Size", 'financepro-core' ),
					"param_name" => "title_font_size",
					"value" => '36',
				),
				array(
					"type" => "textarea",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Subtitle", 'financepro-core' ),
					"param_name" => "subtitle",
					"value" => "Tmply dummy text of the printing and typesetting industry. Lorem Ipsum has been theindustry's standard dummy text ever since the 1500s, when an unknown printer took.",
				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Title color", "financepro-core" ),
					"param_name" => "title_color",
					"value" => '#222222',
				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Subtitle color", "financepro-core" ),
					"param_name" => "subtitle_color",
					"value" => '#444444',
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Alignment", 'financepro-core' ),
					"param_name" => "title_align",
					'value' => array(
						__( "Center", 'financepro-core' ) => 'center',
						__( "Left", 'financepro-core' )   => 'left',
						__( "Right", 'financepro-core' )  => 'right',
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Section Width", 'financepro-core' ),
					"param_name" => "section_width",
					'value' => array(
						__( "100%", 'financepro-core' )  => '100',
						__( "90%", 'financepro-core' )   => '90',
						__( "80%", 'financepro-core' )   => '80',
						__( "70%", 'financepro-core' )   => '70',
						__( "65%", 'financepro-core' )   => '65',
						__( "60%", 'financepro-core' )   => '60',
						__( "50%", 'financepro-core' )   => '50',
						__( "40%", 'financepro-core' )   => '40',
						__( "30%", 'financepro-core' )   => '30',
						__( "20%", 'financepro-core' )   => '20',
						__( "10%", 'financepro-core' )   => '10',
						),
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
				'title'           => $this->translate['title'],
				'subtitle'        => "Tmply dummy text of the printing and typesetting industry. Lorem Ipsum has been theindustry's standard dummy text ever since the 1500s, when an unknown printer took.",		
				'title_color'     => '#222222',
				'title_font_size' => '36',
				'title_align'     => 'center',				
				'subtitle_color'  => '#444444',
				'section_width'   => '100',
				'css'             => '',
				), $atts ) );
				
			$title_font_size = intval( $title_font_size );
			$section_width   = intval( $section_width );
			
			$template = 'title';

			return $this->template( $template, get_defined_vars() );
		}
	}
}

new RDTheme_VC_Title;