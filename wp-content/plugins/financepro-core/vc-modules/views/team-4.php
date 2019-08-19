<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'rdtheme-size5';
$args = array(
	'post_type'      => 'fin_team',
	'posts_per_page' => $slider_item_number,
	'orderby'		 => $orderby,
	'order'			 => $order,
);
if ( !empty( $cat ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'fin_team_category',
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
<div class="rt-team-slider-four owl-wrap rt-owl-nav-1 owl-wrap<?php echo esc_attr( $slider_nav_class );?>">
	<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
	<?php if ( have_posts() ) { ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php
				$id = get_the_ID();
				$team_designation = get_post_meta( $id, 'fin_team_designation', true );
				$thumbnail = false;
				if ( has_post_thumbnail() ){
					$thumbnail = get_the_post_thumbnail( null, $thumb_size , array( 'class' => 'img-responsive' ) );
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
			<div class="rtin-single-team">
				<div class="item-image"><a href="<?php the_permalink(); ?>"><?php echo wp_kses_post( $thumbnail ); ?></a></div>
				<div class="rtin-item-content">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<?php if ( $designation_display == 'true' ){ ?>
						<span class="position"><?php echo esc_html( $team_designation ); ?></span>
					<?php } ?>
				</div>
			</div>
			<?php endwhile;?>
		<?php } else { ?>
			<div class="rtin-single-team">
				<?php esc_html_e( 'No Team Found' , 'financepro-core' ); ?>
			</div>
		<?php } ?>
		<?php $wp_query = $temp;?>
	</div>
</div>