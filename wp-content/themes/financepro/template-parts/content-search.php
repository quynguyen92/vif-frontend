<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-layout-1' ); ?>>
	<div class="entry-header">
		<div class="entry-content">
			<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
			<?php the_excerpt();?>
		</div>
	</div>
</div>