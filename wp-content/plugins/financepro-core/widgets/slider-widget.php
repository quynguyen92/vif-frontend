<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

Class RDTheme_Slide_Widget extends WP_Widget {
	
	public function __construct() {
		$widget_ops = array(
			'classname' => 'rt_slider_widget',
			'description' => esc_html__( 'FinancePro: Slider Widget' , 'financepro-core' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'rt-slider-widget', esc_html__( 'FinancePro: Slider' , 'financepro-core' ), $widget_ops );
		$this->alt_option_name = 'rt_slider_widget';
		add_action( 'wp_enqueue_scripts', array($this, 'add_scripts') , 13 );
	}
	protected $scripts = array();
	public function add_scripts(){
		wp_enqueue_style( 'owl-carousel' );		
		wp_enqueue_style( 'owl-theme-default' );
		wp_enqueue_script( 'owl-carousel-js' );
	}
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
		
		$args['before_title']='<h3 class="widgettitle">';
		$args['after_title']='</h3>';
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Recent Posts' , 'financepro-core' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number )
			$number = 5;
		$result = new WP_Query( apply_filters( 'widget_posts_args', array(		
			'post_type'      	  => 'fin_testimonial',
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) ) );
			
		if ($result->have_posts()) {
			
			$owl_data = array( 
				'nav'                => true,
				'navText'            => array( "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ),
				'dots'               => true,
				'autoplay'           => true,
				'autoplayTimeout'    => 2000,
				'autoplaySpeed'      => 2000,
				'autoplayHoverPause' => true,
				'loop'               => true,
				'responsive'         => array(
					'0'    => array( 'items' => 1 ),
					'480'  => array( 'items' => 1 ),
					'768'  => array( 'items' => 1 ),
					'992'  => array( 'items' => 1 ),
					'1200' => array( 'items' => 1 ),
				)
			);
			$owl_data = json_encode( $owl_data );
		?>
		<?php echo wp_kses_post($args['before_widget']); ?>
		<?php if ( $title ) {
			echo wp_kses_post($args['before_title']) . $title . wp_kses_post($args['after_title']);
		} ?>
		<div class="rt-slider-sidebar">
			<div class="owl-theme owl-carousel rt-owl-carousel rt-owl-nav-4" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
				<?php while ( $result->have_posts() ) : $result->the_post();					
					$id = get_the_ID();
					$content = get_the_content();
					$content = apply_filters( 'the_content', $content );
					$content = wp_trim_words( $content, 15 );
					$thumb_size = 'rdtheme-size8';
					$thumbnail = false;
					if ( has_post_thumbnail() ){
						$thumbnail = get_the_post_thumbnail( null, $thumb_size , array( 'class' => 'img-circle' ) );
					}
					else {
						if ( !empty( RDTheme::$options['no_preview_image']['id'] ) ) {
							$thumbnail = wp_get_attachment_image( RDTheme::$options['no_preview_image']['id'], $thumb_size );
						}
						elseif ( !empty( RDTheme::$options['no_preview_image']['url'] ) ) {
							$thumbnail = '<img class="img-circle attachment-rdtheme-size5 size-rdtheme-size5 wp-post-image" src="'.RDTHEME_IMG_URL.'noimage_500X360_size5.jpg" alt="'.get_the_title().'">';
						}
					}
					$rc_testimonial_designation = get_post_meta( $id, 'fin_tes_designation', true );
				?>
					<div class="rt-single-slide">
						<div class="testimo-content"><?php echo wp_kses_post( $content ); ?></div>
						<div class="testimo-info">
							<div class="testimo-img"><?php echo wp_kses_post( $thumbnail ); ?></div>
							<div class="testimo-title">
								<h3><?php the_title(); ?></h3>												
								<?php if ( !empty ( $rc_testimonial_designation ) ) { ?>
								<span class="position"><?php echo esc_html( $rc_testimonial_designation ); ?></span>
								<?php } ?>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>	
		<?php echo wp_kses_post($args['after_widget']);
		wp_reset_postdata();
		}
	}
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		return $instance;
	}

	public function form( $instance ){
		$defaults = array(
			'title'      => esc_html__( 'Testimonial' , 'financepro-core' ),
			'number'     => '5',
			'show_date'  => true,
			);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'title'      => array(
				'label'  => esc_html__( 'Title', 'financepro-core' ),
				'type'   => 'text',
				),
			'number'     => array(
				'label'  => esc_html__( 'Number of posts to show', 'financepro-core' ),
				'type'   => 'number',
				),
			);
		
		RT_Widget_Fields::display( $fields, $instance, $this );
	}	
}