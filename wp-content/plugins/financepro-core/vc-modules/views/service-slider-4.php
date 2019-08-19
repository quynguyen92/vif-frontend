<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'rdtheme-size2';
$style = "";
if ( !empty( $bgcolor ) ) {
	$style .= "background-color:{$bgcolor};";
}
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
$slider_dot_class = ( $slider_dots == 'true' ) ? ' slider-dot-enabled' : '';
?>
<div class="rt-service-slider-four owl-wrap rt-owl-nav-2<?php echo esc_attr( $slider_nav_class );?><?php echo esc_attr( $slider_dot_class );?>">
	<div class="row">
		<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
			<?php if ( have_posts() ) { ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php
					$id = get_the_ID();
					$content = get_the_content();
					$content = apply_filters( 'the_content', $content );
					$content = wp_trim_words( $content, 15 );
					$service_icon  = get_post_meta( $id, 'fn_service_icon', true );
				?>
				<div class="no-pad">
					<div class="rt-service-layout-6" style="<?php echo esc_attr( $style );?>" data-bgcolor="<?php echo esc_attr( $bgcolor );?>" data-bghover="<?php echo esc_attr( $bghover );?>">
						<div class="rtin-icon-holder">
							<?php if ( !empty ( $service_icon ) ) { ?>
							<i class="fa <?php echo esc_attr( $service_icon ); ?>"></i>
							<?php } else { ?>
							<i class="fa fa-handshake-o" aria-hidden="true"></i>
							<?php } ?>
						</div>
						<div class="rtin-item-content">
							<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
							<p><?php echo esc_html( $content ); ?></p>
						</div>
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