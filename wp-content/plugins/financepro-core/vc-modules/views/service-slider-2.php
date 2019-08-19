<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'rdtheme-size3';
$args = array(
	'post_type'      => 'fin_service',
	'posts_per_page' => $slider_item_number,
	'orderby'		 => $orderby,
	'order'			 => $order,
);
if ( !empty( $cat ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'fin_service_category',
			'field' => 'term_id',
			'terms' => $cat,
		)
	);
}
$query = new WP_Query( $args );
global $wp_query;
$temp     = $wp_query;
$wp_query = NULL;
$wp_query = $query;
$slider_nav_class = ( $slider_nav == 'true' ) ? ' slider-nav-enabled' : '';
?>
<?php if ( $showtitle == 'true' ){ ?>
	<div class="section-title-content">
		<div class="section-title service-slider-two">
			<h2 class="section-title-holder"><?php echo wp_kses_post( $title );?></h2> 
		</div>
		<div class="clear"></div>
	</div>
<?php } ?>
<div class="rt-service-slider-two owl-wrap rt-owl-nav-1<?php echo esc_attr( $slider_nav_class );?>">		
	<div class="row">		
		<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
			<?php if ( have_posts() ) { ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php
						$id = get_the_ID();
						$content = get_the_content();
						$content = apply_filters( 'the_content', $content );
						$content = wp_trim_words( $content, 10 );
						$thumbnail = false;
						if ( has_post_thumbnail() ){
							$thumbnail = get_the_post_thumbnail( null, $thumb_size );
						}
						else {
							if ( !empty( RDTheme::$options['no_preview_image']['id'] ) ) {
								$thumbnail = wp_get_attachment_image( RDTheme::$options['no_preview_image']['id'], $thumb_size );
							}
							elseif ( !empty( RDTheme::$options['no_preview_image']['url'] ) ) {
								$thumbnail = '<img class="attachment-rdtheme-size5 size-rdtheme-size5 wp-post-image" src="'.RDTHEME_IMG_URL.'noimage_370x270.jpg" alt="'.get_the_title().'">';
							}
						}
					?>
					<div class="rtin-single-feature-slide">
						<div class="rtin-feature-slide-img">
							<a href="<?php the_permalink(); ?>">
								<?php echo wp_kses_post ( $thumbnail ); ?>
							</a>
						</div>
						<div class="rtin-feature-slide-content">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p><?php echo esc_html( $content ); ?></p>
						</div>
					</div>
				
				<?php endwhile;?>
			<?php } else { ?>
				<div class="rtin-single-feature-slide">
					<?php esc_html_e( 'No Service Found' , 'financepro-core' ); ?>
				</div>	
			<?php } ?>
			<?php $wp_query = $temp;?>
		</div>
	</div>
</div>