<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

?>
<section class="no-results not-found">
	<h2 class="page-title"><?php esc_html_e( 'Nothing Found', 'financepro' ); ?></h2>
	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>', 'financepro' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
		<?php elseif ( is_search() ) : ?>
			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'financepro' ); ?></p>
			<?php get_search_form(); ?>
		<?php else : ?>
			<p><?php _e( "It seems we can't find what you're looking for. Perhaps searching can help.", 'financepro' ); ?></p>
			<?php get_search_form(); ?>
		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->