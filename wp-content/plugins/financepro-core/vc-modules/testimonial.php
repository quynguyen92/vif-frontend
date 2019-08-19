<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_VC_Testimonial' ) ) {

	class RDTheme_VC_Testimonial extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "FinancePro: Testimonial", 'financepro-core' );
			$this->base = 'finance-vc-testimonial';
			$this->translate = array(
				'title'    => __( "What Our Client’s Say", 'financepro-core' ),
				'cols' => array( 
					__( '1 col', 'financepro-core' ) => '12',
					__( '2 col', 'financepro-core' ) => '6',
					__( '3 col', 'financepro-core' ) => '4',
					__( '4 col', 'financepro-core' ) => '3',
					__( '6 col', 'financepro-core' ) => '2',
				),
			);
			parent::__construct();
		}
		
		public function load_scripts(){	
			wp_enqueue_style( 'owl-carousel' );
			wp_enqueue_style( 'owl-theme-default' );
			wp_enqueue_script( 'owl-carousel' );	
		}

		public function fields(){
			
			$terms = get_terms( array('taxonomy' => 'fin_testimonial_category') );
			$category_dropdown = array( __( 'All Categories', 'financepro-core' ) => '0' );
			foreach ( $terms as $category ) {
				$category_dropdown[$category->name] = $category->term_id;
			}

			$fields = array(
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Slider Style", 'financepro-core' ),
					"param_name" => "slider_style",
					"value" => array( 
						__('Style 1', 'financepro-core') => 'style1',
						__('Style 2', 'financepro-core') => 'style2',
						__('Style 3', 'financepro-core') => 'style3',
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Section Title Display", 'financepro-core' ),
					"param_name" => "showtitle",
					"value" => array( 
						__( "Enabled", "financepro-core" )  => 'true',
						__( "Disabled", "financepro-core" ) => 'false',
						),
						'dependency'  => array(
							'element' => 'slider_style',
							'value'   => array( 'style1' ),
						),
					"description" => __( "Show Title of this section. Default: Show", 'financepro-core' ),
					),
				array(
					"type"		  => "textfield",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Section Title", 'financepro-core' ),
					"param_name"  => "title",
					"value"       => $this->translate['title'],
					'dependency' => array(
						'element' => 'showtitle',
						'value'   => array( 'true' ),
						),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Section Title Color", "financepro-core" ),
					"param_name" => "section_title_color",
					"value" => '#222222',
					'dependency' => array(
						'element' => 'showtitle',
						'value'   => array( 'true' ),
						),
				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Title color", "financepro-core" ),
					"param_name" => "title_color",
					"value" => '',
				),		
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Designation color", "financepro-core" ),
					"param_name" => "designation_color",
					"value" => '#444444',
				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Text color", "financepro-core" ),
					"param_name" => "text_color",
					"value" => '#444444',
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Total number of items", 'financepro-core' ),
					"param_name" => "slider_item_number",
					"value" => "6",
					'description' => __( 'Write -1 to show all', 'financepro-core' ),
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Categories", 'financepro-core' ),
					"param_name" => "cat",
					'value' => $category_dropdown,
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Post Display Order", 'financepro-core' ),
					"param_name" => "order",
					'value' => array(
						__( "Descending", 'financepro-core' )  => 'DESC',
						__( "Ascending", 'financepro-core' )  => 'ASC',
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Order By", 'financepro-core' ),
					"param_name" => "orderby",
					'value' => array(
						__( "None", 'financepro-core' )  => '',
						__( "Name", 'financepro-core' )  => 'title',
						__( "ID", 'financepro-core' )    => 'ID',
						__( "Date", 'financepro-core' )  => 'date',
						__( "Menu Order", 'financepro-core' )  => 'menu_order',
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Navigation Dots", 'financepro-core' ),
					"param_name" => "slider_dots",
					"value" => array(
						__( 'Disabled', 'financepro-core' ) => 'false',
						__( 'Enabled', 'financepro-core' )  => 'true',
						),
					"description" => __( "Enable or disable navigation dots. Default: Disable", 'financepro-core' ),
					"group" => __( "Slider Options", 'financepro-core' ),
					'dependency'  => array(
						'element' => 'slider_style',
						'value'   => array( 'style1' ),
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Autoplay", 'financepro-core' ),
					"param_name" => "slider_autoplay",
					"value" => array( 
						__( "Enabled", "financepro-core" )  => 'true',
						__( "Disabled", "financepro-core" ) => 'false',
					),
					"description" => __( "Enabled or disabled autoplay. Default: Enabled", 'financepro-core' ),
					"group" => __( "Slider Options", 'financepro-core' ),
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Stop on Hover", 'financepro-core' ),
					"param_name" => "slider_stop_on_hover",
					"value" => array( 
						__( "Enabled", "financepro-core" )  => 'true',
						__( "Disabled", "financepro-core" ) => 'false',
					),
					'dependency' => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
					),
					"description" => __( "Stop autoplay on mouse hover. Default: Enabled", 'financepro-core' ),
					"group" => __( "Slider Options", 'financepro-core' ),
				),
				array(
					"type" 		  => "dropdown",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Autoplay Interval", 'financepro-core' ),
					"param_name"  => "slider_interval",
					"value" 	  => array( 
						__( "5 Seconds", "financepro-core" )  => '5000',
						__( "4 Seconds", "financepro-core" )  => '4000',
						__( "3 Seconds", "financepro-core" )  => '3000',
						__( "2 Seconds", "financepro-core" )  => '4000',
						__( "1 Seconds", "financepro-core" )  => '1000',
					),
					'dependency'  => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
					),
					"description" => __( "Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds", 'financepro-core' ),
					"group" 	  => __( "Slider Options", 'financepro-core' ),
				),
				array(
					"type"		  => "textfield",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Autoplay Slide Speed", 'financepro-core' ),
					"param_name"  => "slider_autoplay_speed",
					"value" 	  => 200,
					'dependency'  => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
					),
					"description" => __( "Slide speed in milliseconds. Default: 200", 'financepro-core' ),
					"group" 	  => __( "Slider Options", 'financepro-core' ),
				),	
				array(
					"type" 		 => "dropdown",
					"holder" 	 => "div",
					"class" 	 => "",
					"heading" 	 => __( "Loop", 'financepro-core' ),
					"param_name" => "slider_loop",
					"value" 	 => array( 
						__( "Enabled", "financepro-core" )  => 'true',
						__( "Disabled", "financepro-core" ) => 'false',
					),
					"description"=> __( "Loop to first item. Default: Enabled", 'financepro-core' ),
					"group" 	 => __( "Slider Options", 'financepro-core' ),
				),
			);

			return $fields;
		}

		public function shortcode( $atts, $content = '' ){
			extract( shortcode_atts( array(
				'slider_style'          => 'style1',
				'showtitle'             => 'true',
				'section_title_color'   => '#222222',
				'title'     			=> $this->translate['title'],
				'title_color'		    => '',
				'designation_color'     => '#444444',				
				'text_color'  	        => '#444444',
				'slider_item_number'    => '6',
				'cat'    				=> '',
				'order'			   		=> 'DESC',
				'orderby'		   		=> '',
				'slider_nav'           	=> 'false',
				'slider_dots'           => 'false',
				'slider_autoplay'       => 'true',
				'slider_stop_on_hover'  => 'true',
				'slider_interval'       => '5000',
				'slider_autoplay_speed' => '200',
				'slider_loop'           => 'true',
				), $atts ) );

			$slider_item_number = intval( $slider_item_number );

			$owl_data = array( 
				'nav'                => ( $slider_nav === 'true' ) ? true : false,
				'navText'            => array( "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ),
				'dots'               => ( $slider_dots === 'false' ) ? false : true,
				'autoplay'           => ( $slider_autoplay === 'true' ) ? true : false,
				'autoplayTimeout'    => $slider_interval,
				'autoplaySpeed'      => $slider_autoplay_speed,
				'autoplayHoverPause' => ( $slider_stop_on_hover === 'true' ) ? true : false,
				'loop'               => ( $slider_loop === 'true' ) ? true : false,
				'margin'             => 20,
				'responsive'         => array(
					'0'    => array( 'items' => 1 ),
					'480'  => array( 'items' => 2 ),
					'768'  => array( 'items' => 2 ),
					'992'  => array( 'items' => 2 ),
					'1200' => array( 'items' => 2 ),
				)
			);
						
			switch ( $slider_style ) {
				case 'style3':
				$owl_data['responsive'] = array( 
					'0'    => array( 'items' => 1 ),
					'480'  => array( 'items' => 2 ),
					'768'  => array( 'items' => 2 ),
					'992'  => array( 'items' => 2 ),
					'1200' => array( 'items' => 2 ),
				);
				$owl_data['dots'] = true;
				$template = 'testimonial-style-3';
				break;
				case 'style2':
				$owl_data['responsive'] = array( '0' => array( 'items' => 1 ) );
				$template = 'testimonial-style-2';
				break;
				default:
					$owl_data['responsive'] = array( 
						'0'    => array( 'items' => 1 ),
						'480'  => array( 'items' => 2 ),
						'768'  => array( 'items' => 2 ),
						'992'  => array( 'items' => 2 ),
						'1200' => array( 'items' => 2 ),
					);
					$template = 'testimonial-style-1';
				break;
			}			
			
			$owl_data = json_encode( $owl_data );
			$this->load_scripts();			

			return $this->template( $template, get_defined_vars() );
		}
	}
}

new RDTheme_VC_Testimonial;