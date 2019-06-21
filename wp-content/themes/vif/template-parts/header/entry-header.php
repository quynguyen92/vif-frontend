<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

$discussion = ! is_page() && vif_can_show_post_thumbnail() ? vif_get_discussion_data() : null; ?>

<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

<?php if ( ! is_page() ) : ?>
<div class="entry-meta">
	<?php vif_posted_by(); ?>
	<?php vif_posted_on(); ?>
	<span class="comment-count">
		<?php
		if ( ! empty( $discussion ) ) {
			vif_discussion_avatars_list( $discussion->authors );
		}
		?>
		<?php vif_comment_count(); ?>
	</span>
	<?php
	// Edit post link.
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'twentynineteen' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">' . vif_get_icon_svg( 'edit', 16 ),
			'</span>'
		);
	?>
</div><!-- .entry-meta -->
<?php endif; ?>
