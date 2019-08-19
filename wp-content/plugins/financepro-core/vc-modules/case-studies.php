<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_VC_Case_Studies' ) ) {

	class RDTheme_VC_Case_Studies extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "FinancePro: Case Studies", 'financepro-core' );
			$this->base = 'finance-vc-case-studies';
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
			$terms = get_terms( array('taxonomy' => 'fin_case_category') );
			$category_dropdown = array( __( 'All Categories', 'financepro-core' ) => '0' );
			foreach ( $terms as $category ) {
				$category_dropdown[$category->name] = $category->term_id;
			}
			
			$posts = get_posts( array( 'posts_per_page' => -1, 'orderby' => 'title','order' => 'ASC','post_type' => 'fin_case','post_status' => 'publish' ) );
			$posts_dropdown = array();
			foreach ( $posts as $post ) {
				$posts_dropdown[$post->post_title] = $post->ID;
			}
			
			$fields = array(
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Layout", 'financepro-core' ),
					"param_name" => "layout",
					'value' => array(
						__( "Grid 1", 'financepro-core' )  => 'grid1',
						__( "Grid 2", 'financepro-core' )  => 'grid2',
						__( "Grid 3", 'financepro-core' )  => 'grid3',
						__( "Box", 'financepro-core' )   => 'box'
						),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Items Per Page", 'financepro-core' ),
					"param_name" => "grid_item_number",
					"value" => '6',
					'dependency' => array(
						'element' => 'layout',
						'value' => array( 'grid1', 'grid2', 'grid3' ),
						),
					'description' => __( 'Write -1 to show all', 'financepro-core' ),
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
					'dependency' => array(
						'element' => 'layout',
						'value' => array( 'grid1', 'grid2', 'grid3' ),
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
					'dependency' => array(
						'element' => 'layout',
						'value' => array( 'grid1', 'grid2', 'grid3' ),
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Categories", 'financepro-core' ),
					"param_name" => "cat",
					'dependency' => array(
						'element' => 'layout',
						'value' => array( 'grid1', 'grid2', 'grid3' ),
						),
					'value' => $category_dropdown,
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Word count", 'financepro-core' ),
					"param_name" => "count",
					"value" => 15,
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'grid1', 'grid3' ),
						),
					'description' => __( 'Maximum number of words', 'financepro-core' ),
					),					
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Display Read More Button", 'financepro-core' ),
					"param_name" => "show_read_more",
					"value" => array( 
						__( 'Disabled', 'financepro-core' ) => 'false',
						__( 'Enabled', 'financepro-core' )  => 'true',
						),
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'grid1', 'grid3' ),
						),
					"description" => __( "Display Read More Button. Default: Disable", 'financepro-core' ),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "1st item", 'financepro-core' ),
					"param_name" => "item1",
					'value' => $posts_dropdown,
					'dependency' => array(
						'element' => 'layout',
						'value' => array( 'box' ),
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "2nd item", 'financepro-core' ),
					"param_name" => "item2",
					'value' => $posts_dropdown,
					'dependency' => array(
						'element' => 'layout',
						'value' => array( 'box' ),
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "3rd item", 'financepro-core' ),
					"param_name" => "item3",
					'value' => $posts_dropdown,
					'dependency' => array(
						'element' => 'layout',
						'value' => array( 'box' ),
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
					'dependency' => array(
						'element' => 'layout',
						'value' => array( 'grid1', 'grid2', 'grid3' ),
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Desktops > 991px )", 'financepro-core' ),
					"param_name" => "col_md",
					"value" => $this->translate['cols'],
					"std" => "4",
					'dependency' => array(
						'element' => 'layout',
						'value' => array( 'grid1', 'grid2', 'grid3' ),
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Tablets > 767px )", 'financepro-core' ),
					"param_name" => "col_sm",
					"value" => $this->translate['cols'],
					"std" => "6",
					'dependency' => array(
						'element' => 'layout',
						'value' => array( 'grid1', 'grid2', 'grid3' ),
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Phones < 768px )", 'financepro-core' ),
					"param_name" => "col_xs",
					"value" => $this->translate['cols'],
					"std" => "12",
					'dependency' => array(
						'element' => 'layout',
						'value' => array( 'grid1', 'grid2', 'grid3' ),
						),
					),
				);

			return $fields;
		}

		public function shortcode( $atts, $content = '' ){
			extract( shortcode_atts( array(
				'layout'           => 'grid1',
				'grid_item_number' => '6',
				'count'            => 15,
				'show_read_more'   => 'false',
				'cat'      		   => '',
				'order'			   => 'DESC',
				'orderby'		   => '',
				'item1'            => '',
				'item2'            => '',
				'item3'            => '',
				'col_lg'           => '4',
				'col_md'           => '4',
				'col_sm'           => '6',
				'col_xs'           => '12',
				), $atts ) );

				// validation
				$grid_item_number  = intval( $grid_item_number );				
				$item1             = intval( $item1 );
				$item2             = intval( $item2 );
				$item3             = intval( $item3 );
				$col_lg            = esc_attr( $col_lg );
				$col_md            = esc_attr( $col_md );
				$col_sm            = esc_attr( $col_sm );
				$col_xs            = esc_attr( $col_xs );

			switch ( $layout ) {
				case 'box':
				$template = 'case-studies-box';
				break;
				case 'grid3':
				$template = 'case-studies-grid3';
				break;
				case 'grid2':
				$template = 'case-studies-grid2';
				break;
				default:
				$template = 'case-studies-grid1';
				break;
			}

			return $this->template( $template, get_defined_vars() );
		}
	}
}

new RDTheme_VC_Case_Studies;