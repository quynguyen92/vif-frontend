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

$query = new WP_Query( $args );
global $wp_query;
$temp     = $wp_query;
$wp_query = NULL;
$wp_query = $query;
$slider_dots_class = ( $slider_dots == 'true' ) ? ' slider-dot-enabled' : '';
if ( empty($title_color) ) {
	$title_color = RDTheme::$options['primary_color'];
}

?>
<div class="rt-testimonial-one">
	<div class="rt-vc-testimonial rt-owl-dot-1 owl-wrap rt-owl-nav-3 <?php echo esc_attr( $slider_dots_class );?>">		
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
		<?php if ( have_posts() ) { ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<?php
				$id = get_the_ID();
				$rc_testimonial_designation = get_post_meta( $id, 'fin_tes_designation', true );
				$content = get_the_content();
			?>
			<div class="rtin-single-testimonial">
				<div class="rtin-testimo-content">
					<i class="fa fa-quote-left" aria-hidden="true"></i>
					<div class="rtin-item-content" style="color:<?php echo esc_attr( $text_color ); ?>" ><?php echo esc_html( $content ); ?></div>
				</div>
				<div class="rtin-testimo-info">
					<div class="rtin-testimo-img">
						<?php
							if ( has_post_thumbnail() ){
								the_post_thumbnail( $thumb_size ,  array( 'class' => 'img-circle' )  );
							}
						?>
					</div>
					<div class="rtin-testimo-title">
						<h3 style="color:<?php echo esc_attr( $title_color ); ?>"><?php the_title(); ?></h3>
						<?php if ( !empty ( $rc_testimonial_designation ) ) { ?>
						<span class="position" style="color:<?php echo esc_attr ( $designation_color ); ?>"><?php echo esc_html( $rc_testimonial_designation ); ?></span>
						<?php } ?>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
		<?php } else { ?>
			<?php esc_html_e( 'No Testimonial Found' , 'financepro-core' ); ?>
		<?php } ?>
		<?php $wp_query = $temp;?>
		</div>
	</div>
</div>