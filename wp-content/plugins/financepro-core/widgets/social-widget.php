<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

class RDTheme_Social_Widget extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
			'classname' => 'rt_footer_social_widget',
			'description' => esc_html__( 'FinancePro: Social Widget' , 'financepro-core' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'rt-about-social', __( 'FinancePro: Social' , 'financepro-core' ), $widget_ops );
		$this->alt_option_name = 'financepro_about_widget';
	}

	public function widget( $args, $instance ){
		echo wp_kses_post( $args['before_widget'] );
		if ( ! empty( $instance['title'] ) ) {
			echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title', esc_html( $instance['title'] ) ) . wp_kses_post( $args['after_title'] );
		}
		?>
		<?php if ( !empty($instance['image_uri']) ) { ?>
		<a class="footer-widget-logo" href="<?php echo esc_url( $instance['image_url'] ); ?>"><img class="img-responsive" src="<?php echo esc_url( $instance['image_uri'] ); ?>" alt="logo"></a>
		<?php } ?>
		<div class="footer-about">
			<p><?php if( !empty( $instance['description'] ) ) echo esc_html( $instance['description'] ); ?></p>
		</div>
		<ul class="footer-social">
			<?php
			if( !empty( $instance['facebook'] ) ){
				?><li><a href="<?php echo esc_url( $instance['facebook'] ); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li><?php
			}
			if( !empty( $instance['twitter'] ) ){
				?><li><a href="<?php echo esc_url( $instance['twitter'] ); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li><?php
			}
			if( !empty( $instance['gplus'] ) ){
				?><li><a href="<?php echo esc_url( $instance['gplus'] ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li><?php
			}
			if( !empty( $instance['linkedin'] ) ){
				?><li><a href="<?php echo esc_url( $instance['linkedin'] ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li><?php
			}
			if( !empty( $instance['pinterest'] ) ){
				?><li><a href="<?php echo esc_url( $instance['pinterest'] ); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li><?php
			}
			if( !empty( $instance['rss'] ) ){
				?><li><a href="<?php echo esc_url( $instance['rss'] ); ?>" target="_blank"><i class="fa fa-rss"></i></a></li><?php
			}
			if( !empty( $instance['instagram'] ) ){
				?><li><a href="<?php echo esc_url( $instance['instagram'] ); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li><?php
			}
			?>
		</ul>

		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ){
		$instance                  = array();
		$instance['title']         = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['image_uri']     = ( ! empty( $new_instance['image_uri'] ) ) ? sanitize_text_field( $new_instance['image_uri'] ) : '';
		$instance['image_url']     = ( ! empty( $new_instance['image_url'] ) ) ? sanitize_text_field( $new_instance['image_url'] ) : '';
		$instance['description']   = ( ! empty( $new_instance['description'] ) ) ? wp_kses_post( $new_instance['description'] ) : '';
		$instance['facebook']      = ( ! empty( $new_instance['facebook'] ) ) ? sanitize_text_field( $new_instance['facebook'] ) : '';
		$instance['twitter']       = ( ! empty( $new_instance['twitter'] ) ) ? sanitize_text_field( $new_instance['twitter'] ) : '';
		$instance['gplus']         = ( ! empty( $new_instance['gplus'] ) ) ? sanitize_text_field( $new_instance['gplus'] ) : '';
		$instance['linkedin']      = ( ! empty( $new_instance['linkedin'] ) ) ? sanitize_text_field( $new_instance['linkedin'] ) : '';
		$instance['pinterest']     = ( ! empty( $new_instance['pinterest'] ) ) ? sanitize_text_field( $new_instance['pinterest'] ) : '';
		$instance['rss']           = ( ! empty( $new_instance['rss'] ) ) ? sanitize_text_field( $new_instance['rss'] ) : '';
		$instance['instagram']     = ( ! empty( $new_instance['instagram'] ) ) ? sanitize_text_field( $new_instance['instagram'] ) : '';
		return $instance;
	}

	public function form( $instance ){
		$defaults = array(
			'title'       => esc_html__( 'About Company' , 'financepro-core' ),
			'image_uri'   => '',
			'image_url'   => '',
			'description' => '',
			'facebook'    => '',
			'twitter'     => '',
			'gplus'       => '',
			'linkedin'    => '',
			'pinterest'   => '',
			'rss'         => '', 
			'instagram'   => '',
			);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'title'        => array(
				'label'    => esc_html__( 'Title', 'financepro-core' ),
				'type'     => 'text',
				),
			'image_uri'    => array(
				'label'    => esc_html__( 'Image URL', 'financepro-core' ),
				'type'     => 'text',
				),
			'image_url'    => array(
				'label'    => esc_html__( 'Image File Link', 'financepro-core' ),
				'type'     => 'text',
				),
			'description'  => array(
				'label'    => esc_html__( 'Description', 'financepro-core' ),
				'type'     => 'textarea',
				),
			'facebook'     => array(
				'label'    => esc_html__( 'Facebook URL', 'financepro-core' ),
				'type'     => 'url',
				),
			'twitter'      => array(
				'label'    => esc_html__( 'Twitter URL', 'financepro-core' ),
				'type'     => 'url',
				),
			'gplus'        => array(
				'label'    => esc_html__( 'Google Plus URL', 'financepro-core' ),
				'type'     => 'url',
				),
			'linkedin'     => array(
				'label'    => esc_html__( 'Button URL', 'financepro-core' ),
				'type'     => 'url',
				),
			'pinterest'    => array(
				'label'    => esc_html__( 'Pinterest URL', 'financepro-core' ),
				'type'     => 'url',
				),
			'rss'          => array(
				'label'    => esc_html__( 'Rss Feed URL', 'financepro-core' ),
				'type'     => 'url',
				),
			'instagram'    => array(
				'label'    => esc_html__( 'Instagram URL', 'financepro-core' ),
				'type'     => 'url',
				),
			);
		
		RT_Widget_Fields::display( $fields, $instance, $this );
	}	
}