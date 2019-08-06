<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

global $post;
$rdtheme_time_html_2 = apply_filters( 'rdtheme_single_time_no_thumb', get_the_time( 'd M, Y' ) );
$terms = wp_get_post_terms( get_the_ID(), 'fin_service_category');
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'case-single-detail' ); ?>>			
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="entry-thumbnail">
			<?php the_post_thumbnail( 'rdtheme-size1', array( 'class' => 'img-responsive' ) ); ?>
		</div>
	<?php } ?>
	<div class="item-content">
		<?php the_content();?>
	</div>
</div>