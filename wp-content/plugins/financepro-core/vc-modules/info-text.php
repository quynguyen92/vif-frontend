<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_VC_Info_Text' ) ) {

	class RDTheme_VC_Info_Text extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "FinancePro: Info Text", 'financepro-core' );
			$this->base = 'finance-vc-infotext';
			$this->translate = array(
				'title' => __( "I am title", 'financepro-core' ),
				'button_text' => __( "Read More", 'financepro-core' ),
			);
			parent::__construct();
		}

		public function fields(){
			$fields = array(
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Layout", 'financepro-core' ),
					"param_name" => "layout",
					'value' => array( 
						__( 'Layout 1', 'financepro-core' ) => 'layout1',
						__( 'Layout 2', 'financepro-core' ) => 'layout2',
						__( 'Layout 3', 'financepro-core' ) => 'layout3',
						__( 'Layout 4', 'financepro-core' ) => 'layout4',
						__( 'Layout 5', 'financepro-core' ) => 'layout5',
						__( 'Layout 6', 'financepro-core' ) => 'layout6',
						__( 'Layout 7', 'financepro-core' ) => 'layout7',
						__( 'Layout 8', 'financepro-core' ) => 'layout8',
						__( 'Layout 9 - Dark Background', 'financepro-core' ) => 'layout9',
						),
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
					'settings' => array(
						'emptyIcon' => false,
						'iconsPerPage' => 160,
						),
					'dependency' => array(
						'element' => 'icontype',
						'value'   => array( 'fontawesome' ),
						),
					),
				array(
					"type" => "attach_image",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Upload icon image", 'financepro-core' ),
					"param_name" => "image",
					'dependency' => array(
						'element' => 'icontype',
						'value'   => array( 'image' ),
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Icon style", 'financepro-core' ),
					"param_name" => "icon_style",
					'value' => array( 
						__( 'Rounded', 'financepro-core' )    => 'rounded',
						__( 'Squire', 'financepro-core' )     => 'squire',
					),
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'layout3' ),
					),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Icon border", 'financepro-core' ),
					"param_name" => "icon_border",
					"value" => array( 
						__( "Disabled", 'financepro-core' ) => 'false',
						__( "Enabled", 'financepro-core' )  => 'true',
					),
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'layout3' ),
					),
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Icon color", 'financepro-core' ),
					"param_name" => "color",
					"value" => "#cb011b",
					'dependency' => array(
						'element' => 'icontype',
						'value'   => array( 'flaticon', 'fontawesome' ),
						),
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'layout1', 'layout2', 'layout3', 'layout4', 'layout8', 'layout9' ),
						),
					),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Icon Background color", 'financepro-core' ),
					"param_name" => "icon_bgcolor",
					"value" => "",
					'dependency' => array(
						'element' => 'icontype',
						'value'   => array( 'flaticon', 'fontawesome' ),
						),
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'layout1', 'layout3', 'layout4' ),
						),
					),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Icon Background color", 'financepro-core' ),
					"param_name" => "icon_bgcolor_6",
					"value" => "",
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'layout6' ),
						),
					),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Mouseover color", 'financepro-core' ),
					"param_name" => "hovercolor",
					"value" => "",
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'layout5' ),
						),
					),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Background color", 'financepro-core' ),
					"param_name" => "bgcolor",
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'layout1', 'layout3', 'layout4', 'layout7' ),
						),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Icon size", 'financepro-core' ),
					"param_name" => "size",
					'description' => __( 'Icon size in px eg. 30', 'financepro-core' ),
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'layout1', 'layout2', 'layout3', 'layout4', 'layout7' ),
						),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Icon padding", 'financepro-core' ),
					"param_name" => "icon_padding",
					'description' => __( "Icon padding in px eg. 15. Doesn't work on custom image" , 'financepro-core' ),
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'layout1', 'layout3', 'layout4' ),
						),
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
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Title color", 'financepro-core' ),
					"param_name" => "title_color",
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'layout1', 'layout3', 'layout4', 'layout9' ),
						),
					"value" => "#222222",
					),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Title Hover Color", 'financepro-core' ),
					"param_name" => "title_hover_color",
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'layout1', 'layout3', 'layout4', ),
						),
					"value" => "",
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Title URL", 'financepro-core' ),
					"param_name" => "url",
					'description' => __( "keep this field empty if you don't want the title linkable", 'financepro-core' ),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Title Font Size", 'financepro-core' ),
					"param_name" => "title_size",
					'description' => __( 'Title font size in px. eg 20. If not defined, default h3 font size will be used', 'financepro-core' ),
					),
				array(
					"type" => "textarea_html",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Content", 'financepro-core' ),
					"param_name" => "content",
					"value" => __( 'I am Info Text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.' ),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Content Font Size", 'financepro-core' ),
					"param_name" => "content_size",
					'description' => __( 'Content font size in px eg. 15. If not defined, default body font size will be used', 'financepro-core' ),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Content Width", 'financepro-core' ),
					"param_name" => "width",
					'description' => __( "Content maximum width in px eg 360. Keep this field empty if you want full width", 'financepro-core' ),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Spacing Before Title", 'financepro-core' ),
					"param_name" => "spacing_top",
					"description" => __( "Spacing between icon and title in px eg. 25", 'financepro-core' ),
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'layout2', 'layout3', 'layout4', 'layout6', 'layout7' ),
						),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Spacing After Title", 'financepro-core' ),
					"param_name" => "spacing_bottom",
					"description" => __( "Spacing between title and content in px eg. 12", 'financepro-core' ),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Display Button", 'financepro-core' ),
					"param_name" => "display_button",
					"value" => array( 
						__( "Enabled", 'financepro-core' )  => 'true',
						__( "Disabled", 'financepro-core' ) => 'false',
					),
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'layout7' ),
					),
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Button Text", 'financepro-core' ),
					"param_name" => "button_text",
					"value" => $this->translate['button_text'],
					'dependency' => array(
						'element' => 'display_button',
						'value'   => array( 'true' ),
					),
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Button URL", 'financepro-core' ),
					"param_name" => "button_url",
					'dependency' => array(
						'element' => 'display_button',
						'value'   => array( 'true' ),
					),
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
				'layout'         	=> 'layout1',
				'icontype'       	=> 'flaticon',
				'icon_flat'      	=> 'flaticon-custom-target',
				'icon_fa'        	=> 'fa fa-bar-chart',
				'color'          	=> '',
				'icon_bgcolor'   	=> '',
				'icon_bgcolor_6'    => '#f4f4f4',
				'hovercolor'     	=> '',
				'bgcolor'        	=> '',
				'image'          	=> '',
				'icon_style'     	=> 'rounded',
				'icon_border'    	=> 'false',
				'size'           	=> '',
				'icon_padding'   	=> '',
				'title'          	=> $this->translate['title'],
				'title_color'    	=> '#222222',
				'title_hover_color' => '',
				'url'            	=> '',
				'title_size'     	=> '',
				'content_size'   	=> '',
				'width'          	=> '',
				'spacing_top'    	=> '',
				'spacing_bottom' 	=> '',
				'display_button' 	=> 'true',
				'button_text' 		=> $this->translate['button_text'],
				'button_url' 		=> '',
				'css'            	=> '',
				), $atts ) );

			// validation
			$icon  = ( $icontype == 'flaticon' ) ? $icon_flat : $icon_fa;

			if ( $icontype == 'flaticon' ) {
				vc_icon_element_fonts_enqueue( $icon );
			}			
						
			switch ( $layout ) {
				case 'layout9':
					$template = 'info-text-9';
				break;
				case 'layout8':
					$template = 'info-text-8';
				break;
				case 'layout7':
					$template = 'info-text-7';
				break;
				case 'layout6':
					$template = 'info-text-6';
				break;
				case 'layout5':
					$template = 'info-text-5';
				break;
				case 'layout3':
					$template = 'info-text-3';
				break;
				case 'layout2':
					$template = 'info-text-2';
				break;	
				default:
					$template = 'info-text';
				break;
			}

			return $this->template( $template, get_defined_vars() );
		}
	}
}

new RDTheme_VC_Info_Text;