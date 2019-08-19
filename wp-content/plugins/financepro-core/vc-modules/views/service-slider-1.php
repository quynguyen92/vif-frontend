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

$slider_dots_class = ( $slider_dots == 'true' ) ? ' slider-dot-enabled' : '';
?>
<div class="rt-service-slider-one owl-wrap rt-owl-nav-3 <?php echo esc_attr( $slider_dots_class );?>">	
	<?php if ( $showtitle == 'true' ){ ?>
		<div class="section-title-content">			
			<div class="section-title">
				<h2 class="section-title-holder"><?php echo wp_kses_post( $title );?></h2>
			</div>			
			<div class="owl-custom-nav owl-nav">
				<div class="owl-prev"><i class="fa fa-angle-left"></i></div><div class="owl-next"><i class="fa fa-angle-right"></i></div>
			</div>
			<div class="owl-custom-nav-bar"></div>
			<div class="clear"></div>
		</div>
	<?php } ?>
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
						$thumbnail = '<img class="attachment-rdtheme-size5 size-rdtheme-size5 wp-post-image" src="'.RDTHEME_IMG_URL.'noimage_370X270.jpg" alt="'.get_the_title().'">';
					}
				}
			?>
			<div class="rtin-single-feature-slide">
				<div class="rtin-feature-slide-img">
					<a href="<?php the_permalink(); ?>">
						<?php echo wp_kses_post( $thumbnail ); ?>
					</a>
				</div>
				<div class="rtin-feature-slide-content">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p><?php echo esc_html($content); ?></p>
					<a class="button btn-flat" href="<?php the_permalink(); ?>"><?php esc_html_e( 'READ MORE' , 'financepro-core' ); ?><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
					<a class="feature-icon" href="<?php the_permalink(); ?>">
						<i class="fa fa-chevron-circle-up" aria-hidden="true"></i>
						<i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
					</a>
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