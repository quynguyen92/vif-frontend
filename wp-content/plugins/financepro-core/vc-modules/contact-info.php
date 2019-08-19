<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_VC_Contact_info' ) ) {

	class RDTheme_VC_Contact_info extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "FinancePro: Contact Info", 'financepro-core' );
			$this->base = 'finan-vc-contact-info';
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
					"type" => "textarea",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Description", 'financepro-core' ),
					"param_name" => "description",
					"value" => "Rimply dummy text of the printing and typesetting industry.Ipsum has been the industry's standard dummy text ever since thwhen an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leaplectronicRimply dummy text of the printing.",
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
					"heading" => __( "Description color", "financepro-core" ),
					"param_name" => "description_color",
					"value" => '#222222',
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Address", 'financepro-core' ),
					"param_name" => "address",
					"value" => "1PO Box Collins Street West, Australia",					
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Phone", 'financepro-core' ),
					"param_name" => "phone",
					"value" => "+0123456789",
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Email", 'financepro-core' ),
					"param_name" => "email",
					"value" => "info@example.com",
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Fax", 'financepro-core' ),
					"param_name" => "fax",
					"value" => "+0123456789",
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
				'title'           	   => $this->translate['title'],
				'description'  		   => "Rimply dummy text of the printing and typesetting industry.Ipsum has been the industry's standard dummy text ever since thwhen an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leaplectronicRimply dummy text of the printing.",		
				'title_color'     	   => '#222222',
				'description_color'    => '#222222',
				'address' 		  	   => '1PO Box Collins Street West, Australia',
				'phone'   		  	   => '+0123456789',
				'email'   		  	   => 'info@example.com',
				'fax'     		  	   => '+0123456789',
				'css'             	   => '',
				), $atts ) );

			$template = 'contact-info';

			return $this->template( $template, get_defined_vars() );
		}
	}
}

new RDTheme_VC_Contact_info;