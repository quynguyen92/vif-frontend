<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_VC_Team_Grid' ) ) {

	class RDTheme_VC_Team_Grid extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "FinancePro: Team Grid", 'financepro-core' );
			$this->base = 'finance-vc-team-grid';
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
			$terms = get_terms( array('taxonomy' => 'fin_team_category') );
			$category_dropdown = array( __( 'All Categories', 'financepro-core' ) => '0' );
			foreach ( $terms as $category ) {
				$category_dropdown[$category->name] = $category->term_id;
			}

			$fields = array(
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Layout", 'financepro-core' ),
					"param_name" => "layout",
					'value' => array(
						__( "Style 1", 'financepro-core' )  => 'grid1',
						__( "Style 2", 'financepro-core' )  => 'grid2',
						__( "Style 3", 'financepro-core' )  => 'grid3',
						),
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
					"heading" => __( "Designation Display", 'financepro-core' ),
					"param_name" => "designation_display",
					'value' => array(
						__( "Enabled", 'financepro-core' )  => 'true',
						__( "Disabled", 'financepro-core' )  => 'false',
						),
					),
				array(
					"type" 		  => "textfield",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __( "Word count", 'financepro-core' ),
					"param_name"  => "content_limit",
					"value" 	  => '18',
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'grid2' , 'grid3' ),
						),
					'description' => __( 'Maximum number of words', 'financepro-core' ),
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
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Items Per Page", 'financepro-core' ),
					"param_name" => "grid_item_number",
					"value" => '6',
					'description' => __( 'Write -1 to show all', 'financepro-core' ),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Pagination Display", 'financepro-core' ),
					"param_name" => "show_pagination",
					"value" => array(
						__( "Enabled", 'financepro-core' )  => 'true',
						__( "Disabled", 'financepro-core' ) => 'false',
						),
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'grid2' ),
						),						
					),					
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Desktops > 1199px )", 'financepro-core' ),
					"param_name" => "col_lg",
					"value" => $this->translate['cols'],
					"std" => "4",
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Desktops > 991px )", 'financepro-core' ),
					"param_name" => "col_md",
					"value" => $this->translate['cols'],
					"std" => "4",
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Tablets > 767px )", 'financepro-core' ),
					"param_name" => "col_sm",
					"value" => $this->translate['cols'],
					"std" => "6",
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Phones < 768px )", 'financepro-core' ),
					"param_name" => "col_xs",
					"value" => $this->translate['cols'],
					"std" => "12",
					),
				);

			return $fields;
		}

		public function shortcode( $atts, $content = '' ){
			extract( shortcode_atts( array(
				'layout'               => 'grid1',
				'cat'                  => '',
				'order'				   => 'DESC',
				'orderby'			   => '',
				'designation_display'  => 'true',
				'grid_item_number'     => '6',
				'show_pagination'      => 'true',
				'content_limit'        => '12',
				'col_lg'               => '4',
				'col_md'               => '4',
				'col_sm'               => '6',
				'col_xs'               => '12',
				), $atts ) );

			// validation
			$grid_item_number      = intval( $grid_item_number );
			$content_limit         = intval( $content_limit );
			$col_lg                = esc_attr( $col_lg );
			$col_md                = esc_attr( $col_md );
			$col_sm                = esc_attr( $col_sm );
			$col_xs                = esc_attr( $col_xs );

			switch ( $layout ) {
				case 'grid3':
				$template = 'team-grid3';
				break;
				case 'grid2':
				$template = 'team-grid2';
				break;
				default:
				$template = 'team-grid1';
				break;
			}

			return $this->template( $template, get_defined_vars() );
		}
	}
}

new RDTheme_VC_Team_Grid;