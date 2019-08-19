<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'rdtheme-size6';
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
	'post_type'      => 'fin_portfolio',
	'posts_per_page' => $grid_item_number,
	'paged'          => $paged,
	'orderby'		 => $orderby,
	'order'			 => $order,
);

if ( !empty( $cat ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'fin_portfolio_category',
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
$wp_query   = NULL;
$wp_query   = $query;
?>
<div class="rt-portfolio-layout-3">
	<div class="row auto-clear">
	<?php if ( have_posts() ) { ?>
		<?php while ( have_posts() ) : the_post();?>
			<?php
				$thumbnail = false;
				if ( has_post_thumbnail() ){
					$thumbnail = get_the_post_thumbnail( null, $thumb_size , array( 'class' => 'img-responsive' ) );
				}
				else {
					if ( !empty( RDTheme::$options['no_preview_image']['id'] ) ) {
						$thumbnail = wp_get_attachment_image( RDTheme::$options['no_preview_image']['id'], $thumb_size );
					}
					elseif ( !empty( RDTheme::$options['no_preview_image']['url'] ) ) {
						$thumbnail = '<img class="attachment-rdtheme-size5 size-rdtheme-size5 wp-post-image" src="'.RDTHEME_IMG_URL.'noimage.jpg" alt="'.get_the_title().'">';
					}
				}
			?>
			<div class="<?php echo esc_attr( $col_class );?>">
				<div class="rtin-single-item">
					<div class="rtin-item-image">
						<?php echo wp_kses_post( $thumbnail ); ?>
						<div class="overlay">
							<a class="rtin-plus-icon" href="<?php the_permalink();?>"><i class="fa fa-plus" aria-hidden="true"></i></a>
						</div>
					</div>
					<div class="rtin-item-content">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
					</div>
				</div>
			</div>
			<?php endwhile;?>			
			<?php if ( $show_pagination == 'true' ) { ?>
			<div class="mt20 col-sm-12 col-xs-12 pagination-wrapper"><?php RDTheme_Helper::pagination();?></div>
			<?php } ?>		
		<?php } else { ?>
			<div class="<?php echo esc_attr( $col_class ); ?>">
				<?php esc_html_e( 'No Portfolio Found' , 'financepro-core' ); ?>
			</div>
		<?php } ?>
		<?php $wp_query = $temp;?>
	</div>
</div>