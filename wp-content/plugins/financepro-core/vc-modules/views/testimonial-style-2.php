<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'rdtheme-size8';

$args = array(
	'post_type'      => 'fin_testimonial',
	'posts_per_page' => $slider_item_number,
	'orderby'		 => $orderby,
	'order'			 => $order,
	);
	
if ( !empty( $cat ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'fin_testimonial_category',
			'field'    => 'term_id',
			'terms'    => $cat,
		)
	);
}

if ( empty($title_color) ) {
	$title_color = RDTheme::$options['primary_color'];
}
$query = new WP_Query( $args );
global $wp_query;
$temp     = $wp_query;
$wp_query = NULL;
$wp_query = $query;
$slider_nav_class = ( $slider_nav == 'true' ) ? ' slider-nav-enabled' : '';
?>
<div class="rt-testimonial-two rt-owl-dot-1 owl-wrap rt-owl-nav-1 <?php echo esc_attr( $slider_nav_class );?>">
	<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $owl_data );?>">	
		<?php if ( have_posts() ) { ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<?php
				$id = get_the_ID();
				$rc_testimonial_designation = get_post_meta( $id, 'fin_tes_designation', true );
				$content = get_the_content();	
			?>					
			<div class="rtin-single-testimonial">
				<div class="rtin-testimo-info">
					<div class="rtin-testimo-img">								
						<?php if ( has_post_thumbnail() ){ the_post_thumbnail( $thumb_size ,  array( 'class' => 'img-circle' )  ); } ?>
					</div>							
					<div class="rtin-testimo-title">
						<h3 style="color:<?php echo esc_attr( $title_color ); ?>"><?php the_title(); ?> - 
						<?php if ( !empty ( $rc_testimonial_designation ) ) { ?>
						<span class="position" style="color:<?php echo esc_attr ( $designation_color ); ?>"><?php echo esc_html( $rc_testimonial_designation ); ?></span>
						<?php } ?>
						</h3>
					</div>
				</div>
				<div class="rtin-testimo-content">
					<div class="rtin-item-content" style="color:<?php echo esc_attr( $text_color ); ?>" ><?php echo esc_html( $content ); ?></div>
				</div>
			</div>
			<?php endwhile; ?>
		<?php } else { ?>
			<?php esc_html_e( 'No Testimonial Found' , 'financepro-core' ); ?>
		<?php } ?>
		<?php $wp_query = $temp;?>		
	 </div>	 
</div>