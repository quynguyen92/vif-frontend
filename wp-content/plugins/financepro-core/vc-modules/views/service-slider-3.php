<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'rdtheme-size2';
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
<div class="rt-service-slider-three">
	<div class="row">
		<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
			<?php if ( have_posts() ) { ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php
						$id = get_the_ID();
						$thumbnail = false;
						if ( has_post_thumbnail() ){
							$thumbnail = get_the_post_thumbnail( null, $thumb_size );
						}
						else {
							if ( !empty( RDTheme::$options['no_preview_image']['id'] ) ) {
								$thumbnail = wp_get_attachment_image( RDTheme::$options['no_preview_image']['id'], $thumb_size );
							}
							elseif ( !empty( RDTheme::$options['no_preview_image']['url'] ) ) {
								$thumbnail = '<img class="attachment-rdtheme-size5 size-rdtheme-size5 wp-post-image" src="'.RDTHEME_IMG_URL.'noimage_370x522.jpg" alt="'.get_the_title().'">';
							}
						}
					?>
					<a href="<?php the_permalink(); ?>" class="rtin-single-feature-slide ">
						<div class="rtin-feature-item">
							<?php echo wp_kses_post($thumbnail); ?>
							<h3><?php the_title(); ?></h3>
						</div>
					</a>
				<?php endwhile;?>
			<?php } else { ?>
				<div class="rtin-single-feature-slide">
					<?php esc_html_e( 'No Service Found' , 'financepro-core' ); ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>