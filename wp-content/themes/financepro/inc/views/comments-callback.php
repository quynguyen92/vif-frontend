<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';?>
<<?php echo esc_html( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $args['has_children'] ? 'parent main-comments' : 'main-comments', $comment ); ?>>
<div id="respond-<?php comment_ID(); ?>" class="each-comment">
	<?php if ( get_option( 'show_avatars' ) ): ?>
		<div class="pull-left imgholder">
			<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'], "", false, array( 'class'=>'media-object' ) ); ?>
		</div>				
	<?php endif; ?>
	<div class="media-body comments-body">
		<div class="comment-meta">
			<span class="comment-author-name"><?php echo get_comment_author_link( $comment );?></span>
			<span class="comment-time"><?php printf( __( '%1$s @ %2$s', 'financepro' ), get_comment_date( '', $comment ), get_comment_time() );?></span>			
			<?php
			comment_reply_link( array_merge( $args, array(
				'add_below' => 'respond',
				'depth'     => $depth,
				'max_depth' => $args['max_depth'],
				'before'    => '<div class="replay-area">',
				'after'     => '</div>'
				) ) );
			?>
		</div>
		
		<div class="clear mb20"></div>
		<div class="comment-text">
			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'financepro' ); ?></p>
			<?php endif; ?>
			<?php comment_text(); ?>
		</div>			
	</div>
	<div class="clear"></div>
</div>