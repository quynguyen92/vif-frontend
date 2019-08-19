<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RT_Posts' ) ) {
	return;
}
$post_types = array(		
	'fin_service'      => array(
		'title'        => __( 'Service', 'financepro-core' ),
		'plural_title' => __( 'Services', 'financepro-core' ),
		'menu_icon'    => 'dashicons-chart-pie',
		'rewrite'      => RDTheme::$options['service_slug'],		
		'supports'	   => array ( 'title', 'thumbnail', 'editor', 'page-attributes' ),
		),
	'fin_case'     => array(
		'title'        => __( 'Case Study', 'financepro-core' ),
		'plural_title' => __( 'Case Studies', 'financepro-core' ),
		'menu_icon'    => 'dashicons-book',
		'rewrite'      => RDTheme::$options['case_slug'],		
		'supports'	   => array ( 'title', 'thumbnail', 'editor', 'page-attributes' ),
		),
	'fin_team'     	   => array(
		'title'        => __( 'Team Member', 'financepro-core' ),
		'plural_title' => __( 'Team Members', 'financepro-core' ),
		'menu_icon'    => 'dashicons-businessman',
		'labels_override'     => array(
			'menu_name'  => __( 'Team', 'financepro-core' ),
			),
		'rewrite'      => RDTheme::$options['team_slug'],		
		'supports'	   => array ( 'title', 'thumbnail', 'editor', 'page-attributes' ),
		),
	'fin_portfolio'    => array(
		'title'        => __( 'Portfolio', 'financepro-core' ),
		'plural_title' => __( 'Portfolio', 'financepro-core' ),
		'menu_icon'    => 'dashicons-portfolio',
		'rewrite'      => RDTheme::$options['portfolio_slug'],		
		'supports'	   => array ( 'title', 'thumbnail', 'editor', 'page-attributes' ),
		),
	'fin_testimonial'  => array(
		'title'        => __( 'Testimonial', 'financepro-core' ),
		'plural_title' => __( 'Testimonials', 'financepro-core' ),
		'menu_icon'    => 'dashicons-awards',
		'rewrite'      => false,
		),	
	);

$taxonomies = array(
	'fin_service_category' => array(
		'title'        	   => __( 'Service Category', 'financepro-core' ),
		'plural_title' 	   => __( 'Service Categories', 'financepro-core' ),
		'post_types'   	   => 'fin_service',
		),
	'fin_case_category' => array(
		'title'        => __( 'Case Study Category', 'financepro-core' ),
		'plural_title' => __( 'Case Categories', 'financepro-core' ),
		'post_types'   => 'fin_case',
		),
	'fin_portfolio_category'     => array(
		'title'        => __( 'Portfolio Category', 'financepro-core' ),
		'plural_title' => __( 'Portfolio Categories', 'financepro-core' ),
		'post_types'   => 'fin_portfolio',
		),
	'fin_team_category'     => array(
		'title'        => __( 'Team Category', 'financepro-core' ),
		'plural_title' => __( 'Team Categories', 'financepro-core' ),
		'post_types'   => 'fin_team',
		),
	'fin_testimonial_category'     => array(
		'title'        => __( 'Testimonial Category', 'financepro-core' ),
		'plural_title' => __( 'Testimonial Categories', 'financepro-core' ),
		'post_types'   => 'fin_testimonial',
		),
	);

$Posts = RT_Posts::getInstance();
$Posts->add_post_types( $post_types );
$Posts->add_taxonomies( $taxonomies );