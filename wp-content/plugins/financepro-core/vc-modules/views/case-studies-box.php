<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.6
 */

$thumb_size = 'rdtheme-size2';
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
	'post_type'      => 'fin_case',
	'posts_per_page' => 3,
	'post__in'       => array( $item1, $item2, $item3 ),
	'orderby'        => 'post__in',
);

$query = new WP_Query( $args );
$col_class = "col-lg-$col_lg col-md-$col_md col-sm-$col_sm col-xs-$col_xs";

// Pagination fix
global $wp_query;
$temp     = $wp_query;
$wp_query = NULL;
$wp_query = $query;

$count=0;

?>
<div class="rt-case-studies-box">

	<?php if ( have_posts() ) { ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<?php			
			$count++;
			$content = get_the_content();
			$content = apply_filters( 'the_content', $content );
			$content = wp_trim_words( $content, 20 );
			$thumbnail = false;
			if ( has_post_thumbnail() ){
				$thumbnail = get_the_post_thumbnail( null, $thumb_size , array( 'class' => 'imgs-responsive' ) );
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
		
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="rtin-case-item">
				
				<?php if ( $count == 2 ) { ?>
				<div class="rtin-item-image rtin-item-image-mobile">
					<?php echo wp_kses_post( $thumbnail ); ?>
				</div>
				<?php } ?>
				
				<?php if ( $count == 1 || $count == 3 ) { ?>
				<div class="rtin-item-image">
					<?php echo wp_kses_post( $thumbnail ); ?>
				</div>
				<?php } ?>		
				
				<div class="<?php if ( $count == 1 || $count == 3 ) { ?> rtin-item-content-bottom<?php } else { ?> rtin-item-content-top<?php } ?>">
					<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<p><?php echo esc_html($content); ?></p>
				</div>
				
				<?php if ( $count == 2 ) { ?>
				<div class="rtin-item-image rtin-item-image-desktop">
					<?php echo wp_kses_post( $thumbnail ); ?>
				</div>
				<?php } ?>
				
			</div>
		</div>
		<?php endwhile; ?>
		<?php if ( $layout == 'box' ) { ?>
			<div class="mt20 col-sm-12 col-xs-12 pagination-wrapper"><?php RDTheme_Helper::pagination();?></div>
		<?php } ?>
	<?php } else { ?>
		<div class="<?php echo esc_attr( $col_class ); ?>">
			<?php esc_html_e( 'No Case Studies Found' , 'financepro-core' ); ?>
		</div>	
	<?php } ?>
	<?php $wp_query = $temp;?>
</div>