<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'rdtheme-size7';
if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
}
elseif ( get_query_var('page') ) {
	$paged = get_query_var('page');
}
else {
	$paged = 1;
}

$args = array(
	'post_type'      => 'fin_service',
	'posts_per_page' => $grid_item_number,
	'paged'          => $paged,
	'orderby'		 => $orderby,
	'order'			 => $order,
);

if ( !empty( $cat ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'fin_service_category',
			'field'    => 'term_id',
			'terms'    => $cat,
		)
	);
}
$query = new WP_Query( $args );
$col_class = "col-lg-$col_lg col-md-$col_md col-sm-$col_sm col-xs-$col_xs";

// Pagination fix
global $wp_query;
$temp     = $wp_query;
$wp_query = NULL;
$wp_query = $query;
?>
<div class="rt-service-layout-4 row auto-clear">
	<?php if ( have_posts() ) { ?>
		<?php while ( have_posts() ) : the_post();?>
		<?php
			$id = get_the_ID();
			$content = get_the_content();
			$content = apply_filters( 'the_content', $content );
			$content = wp_trim_words( $content, $count );
			$service_link  = get_post_meta( $id, 'fn_service_link', true );
			$thumbnail = false;
			if ( has_post_thumbnail() ){
				$thumbnail = get_the_post_thumbnail( null, $thumb_size , array( 'class' => 'img-responsive' ) );
			}
			else {
				if ( !empty( RDTheme::$options['no_preview_image']['id'] ) ) {
					$thumbnail = wp_get_attachment_image( RDTheme::$options['no_preview_image']['id'], $thumb_size );
				}
				elseif ( !empty( RDTheme::$options['no_preview_image']['url'] ) ) {
					$thumbnail = '<img class="attachment-rdtheme-size5 size-rdtheme-size5 wp-post-image" src="'.RDTHEME_IMG_URL.'noimage_400X265.jpg" alt="'.get_the_title().'">';
				}
			}
		?>
		<div class="<?php echo esc_attr( $col_class ); ?>">
			<div class="rtin-single-item">
				<div class="rtin-item-image">
					<a href="<?php the_permalink();?>"><?php echo wp_kses_post( $thumbnail ); ?></a>
				</div>
				<div class="rtin-item-content">
					<?php if( empty( $service_link ) ) { ?>
					<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<?php } else { ?>
					<h3><a href="<?php echo esc_attr( $service_link );?>"><?php the_title();?></a></h3>
					<?php } ?>
					<p><?php echo esc_html($content); ?></p>
				</div>
			</div>
		</div>
		<?php endwhile;?>
		<div class="mt20 col-sm-12 col-xs-12 pagination-wrapper"><?php RDTheme_Helper::pagination();?></div>
		<?php wp_reset_postdata();?>
	<?php } else { ?>
		<div class="<?php echo esc_attr( $col_class ); ?>">
			<?php esc_html_e( 'No Service Found' , 'financepro-core' ); ?>
		</div>	
	<?php } ?>
	<?php $wp_query = $temp;?>
</div>