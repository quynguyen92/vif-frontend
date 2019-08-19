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
$slider_dots_class = ( $slider_dots == 'true' ) ? ' slider-dot-enabled' : '';
?>
<div class="rt-service-slider-five owl-wrap rt-owl-nav-3 <?php echo esc_attr( $slider_dots_class );?>">
	<?php if ( $showtitle == 'true' ){ ?>
	<div class="section-title-content">
		<div class="section-title">
			<h2 class="section-title-holder" style="color:<?php echo esc_attr( $section_title_color ); ?>;"><?php echo wp_kses_post( $title );?></h2>
		</div>
		<div class="owl-custom-nav owl-nav">
			<div class="owl-prev"><i class="fa fa-angle-left"></i></div><div class="owl-next"><i class="fa fa-angle-right"></i></div>
		</div>
		<div class="owl-custom-nav-bar"></div>
		<div class="clear"></div>
	</div>
	<?php } ?>
	<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
	<?php if ( $query->have_posts() ) { ?>
		<?php while ( $query->have_posts() ) : $query->the_post();?>
			<?php
				$id = get_the_ID();
				$thumbnail = false;
				if ( has_post_thumbnail() ){
					$thumbnail = get_the_post_thumbnail( null, $thumb_size, array( 'class' => 'img-responsive' ) );
				}
				else {
					if ( !empty( RDTheme::$options['no_preview_image']['url'] ) ) {
						$thumbnail = '<img class="img-responsive attachment-rdtheme-size5 size-rdtheme-size5 wp-post-image" src="'.RDTHEME_IMG_URL.'noimage_370X270.jpg" alt="'.get_the_title().'">';
					}
				}

				$comments_count = wp_count_comments( $id );
				$message =  $comments_count->approved ;
			?>			
			<div class="rtin-single-service">
				<a href="<?php the_permalink(); ?>"><?php echo wp_kses_post( $thumbnail ); ?></a>
				<div class="overley"><a href="<?php the_permalink(); ?>"><i class="fa fa-plus" aria-hidden="true"></i></a></div>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			</div>			
		<?php endwhile;?>
	<?php } else { ?>
		<div class="rtin-single-post">
			<?php esc_html_e( 'No Service Found' , 'financepro-core' ); ?>
		</div>
	<?php } ?>
	<?php wp_reset_postdata();?>
	</div>
</div>