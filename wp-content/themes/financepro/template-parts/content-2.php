<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$rdtheme_has_entry_meta  = ( ( !has_post_thumbnail() && RDTheme::$options['blog_date'] ) || RDTheme::$options['blog_author_name'] || RDTheme::$options['blog_comment_num'] || RDTheme::$options['blog_cats'] ) ? true : false;

$rdtheme_comments_number = number_format_i18n( get_comments_number() );
$rdtheme_comments_html = $rdtheme_comments_number < 2 ? esc_html__( 'Comment' , 'financepro' ) : esc_html__( 'Comments' , 'financepro' );
$rdtheme_comments_html = '('. $rdtheme_comments_number . ') ' . $rdtheme_comments_html;

$thumbnail = false;
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'col-lg-4 col-md-4 col-sm-4 col-xs-12' ); ?>>
	<div class="blog-layout-2">
		<div class="entry-header">
			<div class="entry-thumbnail-area">
			<a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) { ?>
				<?php the_post_thumbnail( 'rdtheme-size1', ['class' => 'img-responsive'] );?>
			<?php } else {
				if ( !empty( RDTheme::$options['no_preview_image']['id'] ) ) {
					$thumbnail = wp_get_attachment_image( RDTheme::$options['no_preview_image']['id'], $thumb_size );
				}
				elseif ( !empty( RDTheme::$options['no_preview_image']['url'] ) ) {
					$thumbnail = '<img class="attachment-rdtheme-size5 size-rdtheme-size5 wp-post-image" src="'.RDTHEME_IMG_URL.'noimage.jpg" alt="'.get_the_title().'">';
				}
				echo wp_kses_post( $thumbnail );
			} ?></a>
			</div>
			<div class="entry-content">
				<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
				<div class="blog-text">
				<?php 				
				$id = get_the_ID();
				$content = get_the_content();
				$content = apply_filters( 'the_content', $content );
				$content = wp_trim_words( $content, 22 );
				echo wp_kses_post( $content ); ?>
				</div>
			</div>
			<?php if ( $rdtheme_has_entry_meta ) { ?>
			<div class="entry-meta">
				<ul>
					<?php if ( RDTheme::$options['blog_author_name'] ) { ?>
					<li><i class="fa fa-user" aria-hidden="true"></i><?php _e( '<span>By </span>', 'financepro' ) . the_author_posts_link();?></li>
					<?php } ?>
					<?php if ( RDTheme::$options['blog_date'] ) { ?>
						<li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo get_the_time( get_option( 'date_format' ) ); ?></li>
					<?php } if ( RDTheme::$options['blog_cats'] ) { ?>
						<li><i class="fa fa-tag" aria-hidden="true"></i><?php the_category( ', ' );?></li>
					<?php } ?>
				</ul>
			</div>
			<?php } ?>
		</div>
	</div>
</div>