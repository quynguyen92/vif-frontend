<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RT_Postmeta' ) ) {
	return;
}

$Postmeta = RT_Postmeta::getInstance();

/*-------------------------------------
#. Page Settings
---------------------------------------*/
$nav_menus = wp_get_nav_menus( array( 'fields' => 'id=>name' ) );
$nav_menus = array( 'default' => __( 'Default', 'financepro-core' ) ) + $nav_menus;

$Postmeta->add_meta_box( 'page_settings', __( 'Layout Settings', 'financepro-core' ), array( 'page', 'post', 'fin_service', 'fin_testimonial' , 'fin_case', 'fin_team' , 'fin_portfolio' ), '', '', 'high', array(
	'fields' => array(
		'financepro_layout' => array(
			'label'   => __( 'Layout', 'financepro-core' ),
			'type'    => 'select',
			'options' => array(
				'default'       => __( 'Default', 'financepro-core' ),
				'full-width'    => __( 'Full Width', 'financepro-core' ),
				'left-sidebar'  => __( 'Left Sidebar', 'financepro-core' ),
				'right-sidebar' => __( 'Right Sidebar', 'financepro-core' ),
				),
			'default'  => 'default',
			),
		'financepro_page_menu' => array(
			'label'    => __( 'Main Menu', 'financepro-core' ),
			'type'     => 'select',
			'options'  => $nav_menus,
			'default'  => 'default',
			),
		'financepro_tr_header' => array(
			'label'    	  => __( 'Transparent Header', 'financepro-core' ),
			'type'     	  => 'select',
			'options'  	  => array(
				'default' => __( 'Default', 'financepro-core' ),
				'on'      => __( 'Enabled', 'financepro-core' ),
				'off'     => __( 'Disabled', 'financepro-core' ),
				),
			'default'  => 'default',
			),
		'financepro_top_bar' => array(
			'label' 	  => __( 'Top Bar', 'financepro-core' ),
			'type'  	  => 'select',
			'options' => array(
				'default' => __( 'Default', 'financepro-core' ),
				'on'      => __( 'Enabled', 'financepro-core' ),
				'off'     => __( 'Disabled', 'financepro-core' ),
				),
			'default'  	  => 'default',
			),
		'financepro_top_bar_style' => array(
			'label' 	=> __( 'Top Bar Layout', 'financepro-core' ),
			'type'  	=> 'select',
			'options'	=> array(
				'default' => __( 'Default', 'financepro-core' ),
				'1'       => __( 'Layout 1', 'financepro-core' ),
				'2'       => __( 'Layout 2', 'financepro-core' ),
				'3'       => __( 'Layout 3', 'financepro-core' ),
				'4'       => __( 'Layout 4', 'financepro-core' ),
				),
			'default'   => 'default',
			),
		'financepro_header' => array(
			'label'   => __( 'Header Layout', 'financepro-core' ),
			'type'    => 'select',
			'options' => array(
				'default' => __( 'Default', 'financepro-core' ),
				'1'       => __( 'Layout 1', 'financepro-core' ),
				'2'       => __( 'Layout 2', 'financepro-core' ),
				'3'       => __( 'Layout 3', 'financepro-core' ),
				'4'       => __( 'Layout 4', 'financepro-core' ),
				'5'       => __( 'Layout 5', 'financepro-core' ),
				'6'       => __( 'Layout 6', 'financepro-core' ),
				'7'       => __( 'Layout 7', 'financepro-core' ),
				),
			'default'  => 'default',
			),
		'financepro_top_padding' => array(
			'label'   => __( 'Content Padding Top', 'financepro-core' ),
			'type'    => 'select',
			'options' => array(
				'default' => __( 'Default', 'financepro-core' ),
				'0px'     => '0px',
				'10px'    => '10px',
				'20px'    => '20px',
				'30px'    => '30px',
				'40px'    => '40px',
				'50px'    => '50px',
				'60px'    => '60px',
				'70px'    => '70px',
				'80px'    => '80px',
				'90px'    => '90px',
				'100px'   => '100px',
				),
			'default'  => 'default',
			),
		'financepro_bottom_padding' => array(
			'label'   => __( 'Content Padding Bottom', 'financepro-core' ),
			'type'    => 'select',
			'options' => array(
				'default' => __( 'Default', 'financepro-core' ),
				'0px'     => '0px',
				'10px'    => '10px',
				'20px'    => '20px',
				'30px'    => '30px',
				'40px'    => '40px',
				'50px'    => '50px',
				'60px'    => '60px',
				'70px'    => '70px',
				'80px'    => '80px',
				'90px'    => '90px',
				'100px'   => '100px',
				),
			'default'  => 'default',
			),
		'financepro_banner' => array(
			'label'   => __( 'Banner', 'financepro-core' ),
			'type'    => 'select',
			'options' => array(
				'default' => __( 'Default', 'financepro-core' ),
				'on'	  => __( 'Enabled', 'financepro-core' ),
				'off'	  => __( 'Disabled', 'financepro-core' ),
				),
			'default'  => 'default',
			),
		'financepro_breadcrumb' => array(
			'label'   => __( 'Breadcrumb', 'financepro-core' ),
			'type'    => 'select',
			'options' => array(
				'default' => __( 'Default', 'financepro-core' ),
				'on'      => __( 'Enabled', 'financepro-core' ),
				'off'	  => __( 'Disabled', 'financepro-core' ),
				),
			'default'  => 'default',
			),
		'financepro_banner_type' => array(
			'label' => __( 'Banner Background Type', 'financepro-core' ),
			'type'  => 'select',
			'options' => array(
				'default' => __( 'Default', 'financepro-core' ),
				'bgimg'    => __( 'Background Image', 'financepro-core' ),
				'bgcolor'  => __( 'Background Color', 'financepro-core' ),
				),
			'default' => 'default',
			),
		'financepro_banner_bgimg' => array(
			'label' => __( 'Banner Background Image', 'financepro-core' ),
			'type'  => 'image',
			'desc'  => __( 'If not selected, default will be used', 'financepro-core' ),
			),
		'financepro_banner_bgcolor' => array(
			'label' => __( 'Banner Background Color', 'financepro-core' ),
			'type'  => 'color_picker',
			'desc'  => __( 'If not selected, default will be used', 'financepro-core' ),
			),
		),
	) );

/*-------------------------------------
#. Team
---------------------------------------*/
$team_socials = array(
	'facebook' => array(
		'label' => __( 'Facebook', 'financepro-core' ),
		'type'  => 'text',
		'icon'  => 'fa-facebook',
		'color' => '#3b5998',
		),
	'twitter' => array(
		'label' => __( 'Twitter', 'financepro-core' ),
		'type'  => 'text',
		'icon'  => 'fa-twitter',
		'color' => '#1da1f2',
		),
	'linkedin' => array(
		'label' => __( 'Linkedin', 'financepro-core' ),
		'type'  => 'text',
		'icon'  => 'fa-linkedin',
		'color' => '#006fa6',
		),
	'gplus' => array(
		'label' => __( 'Google Plus', 'financepro-core' ),
		'type'  => 'text',
		'icon'  => 'fa-google-plus',
		'color' => '#dd4f43',
		),
	'skype' => array(
		'label' => __( 'Skype', 'financepro-core' ),
		'type'  => 'text',
		'icon'  => 'fa-skype',
		'color' => '#02B4EB',
		),
	'youtube' => array(
		'label' => __( 'Youtube', 'financepro-core' ),
		'type'  => 'text',
		'icon'  => 'fa-youtube-play',
		'color' => '#DD2C28',
		),
	'pinterest' => array(
		'label' => __( 'Pinterest', 'financepro-core' ),
		'type'  => 'text',
		'icon'  => 'fa-pinterest-p',
		'color' => '#CB1F27',
		),
	'instagram' => array(
		'label' => __( 'Instagram', 'financepro-core' ),
		'type'  => 'text',
		'icon'  => 'fa-instagram',
		'color' => '#AA3DB2',
		),
	'github' => array(
		'label' => __( 'Github', 'financepro-core' ),
		'type'  => 'text',
		'icon'  => 'fa-github',
		'color' => '#111',
		),
	'stackoverflow' => array(
		'label' => __( 'Stackoverflow', 'financepro-core' ),
		'type'  => 'text',
		'icon'  => 'fa-stack-overflow',
		'color' => '#F48024',
		),
	);

$team_socials = apply_filters( 'team_socials', $team_socials );

RDTheme::$team_social_fields = $team_socials;

$Postmeta->add_meta_box( 'team_settings', __( 'Team Member Settings', 'financepro-core' ), array( 'fin_team' ), '', '', 'high', array(
	'fields' => array(
		'fin_team_designation' => array(
			'label' => __( 'Designation', 'financepro-core' ),
			'type'  => 'text',
			),
		'fin_team_phone' => array(
			'label' => __( 'Phone Number', 'financepro-core' ),
			'type'  => 'text',
			),
		'fin_team_email' => array(
			'label' => __( 'Email', 'financepro-core' ),
			'type'  => 'text',
			),
		'fin_team_socials_header' => array(
			'label' => __( 'Socials', 'financepro-core' ),
			'type'  => 'header',
			'desc'  => __( 'Put your social links here', 'financepro-core' ),
			),
		'fin_team_socials' => array(
			'type'  => 'group',
			'value'  => $team_socials
			),
		)
	)
);

$Postmeta->add_meta_box( 'team_skills', __( 'Team Skills', 'financepro-core' ), array( 'fin_team' ), '', '', 'high', array(
	'fields' => array(
		'fin_team_skill' => array(
			'type'  => 'repeater',
			'button' => __( 'Add New Skill', 'financepro-core' ),
			'value'  => array(
				'skill_name' => array(
					'label' => __( 'Skill Name', 'financepro-core' ),
					'type'  => 'text',
					'desc'  => __( 'eg. Investment', 'financepro-core' ),
					),
				'skill_value' => array(
					'label' => __( 'Skill Percentage (%)', 'financepro-core' ),
					'type'  => 'text',
					'desc'  => __( 'eg. 75', 'financepro-core' ),
					),				
				'skill_bar_color' => array(
					'label' => __( 'Skill Bar Color', 'financepro-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, default will be used', 'financepro-core' ),
					),
				)
			),
		)
	)
);

/*-------------------------------------
#. Testimonial
---------------------------------------*/
$Postmeta->add_meta_box( 'testimonial_info', __( 'Testimonial Info', 'financepro-core' ), array( 'fin_testimonial' ), '', '', 'high', array(
	'fields' => array(
		'fin_tes_designation' => array(
			'label' => __( 'Designation', 'financepro-core' ),
			'type'  => 'text',
			),
		)
	)
);

/*-------------------------------------
#. Service
---------------------------------------*/
$Postmeta->add_meta_box( 'service_icon', __( 'Service icon', 'financepro-core' ), array( 'fin_service' ), '', '', 'high', array(
	'fields' => array(
		'fn_service_icon' => array(
			'label' => __( 'Fontawesome Icon', 'financepro-core' ),
			'type'  => 'text',
			'desc'  => __( 'Please write the Fontawesome Icon Class name here. Like : " fa-pencil-square-o "', 'financepro-core' ),
			),
		'fn_service_link' => array(
			'label' => __( 'Custom Link', 'financepro-core' ),
			'type'  => 'text',
			'desc'  => __( 'Write the custom link here fot this post.', 'financepro-core' ),
			),
		)
	)
);