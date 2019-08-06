<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$rdtheme_has_entry_meta  = ( ( !has_post_thumbnail() && RDTheme::$options['blog_date'] ) || RDTheme::$options['blog_author_name'] || RDTheme::$options['blog_comment_num'] || RDTheme::$options['blog_cats'] ) ? true : false;
$rdtheme_time_html       = sprintf( '%s<span>%s</span><span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );
$rdtheme_time_html       = apply_filters( 'rdtheme_single_time', $rdtheme_time_html );
$rdtheme_time_html_2     = apply_filters( 'rdtheme_single_time_no_thumb', get_the_time( get_option( 'date_format' ) ) );

$rdtheme_comments_number = number_format_i18n( get_comments_number() );
$rdtheme_comments_html = $rdtheme_comments_number < 2 ? esc_html__( 'Comment' , 'financepro' ) : esc_html__( 'Comments' , 'financepro' );
$rdtheme_comments_html = '('. $rdtheme_comments_number . ') ' . $rdtheme_comments_html;
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-layout-1' ); ?>>
	<div class="entry-header">
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="entry-thumbnail-area">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'rdtheme-size1' , ['class' => 'img-responsive'] ); ?></a>
				<?php if ( RDTheme::$options['blog_date'] ) { ?>
					<div class="post-date1">
						<?php echo wp_kses_post( $rdtheme_time_html );?>
					</div>
				<?php } ?>
			</div>
		<?php } ?>
		<div class="entry-content">
			<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
				<?php if ( $rdtheme_has_entry_meta ) { ?>
					<div class="entry-meta">
						<ul>
							<?php if ( RDTheme::$options['blog_author_name'] ): ?>
								<li><i class="fa fa-user" aria-hidden="true"></i><span><?php esc_html_e( 'By ', 'financepro' ) . the_author_posts_link();?></span></li>
							<?php endif; ?>
							<?php if ( !has_post_thumbnail() && RDTheme::$options['blog_date'] ): ?>
								<li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo wp_kses_post( $rdtheme_time_html_2 );?></li>
							<?php endif; ?>
							<?php if ( RDTheme::$options['blog_cats'] ): ?>
								<li><i class="fa fa-tags" aria-hidden="true"></i><?php the_category( ', ' );?></li>
							<?php endif; ?>
							<?php if ( RDTheme::$options['blog_comment_num'] ): ?>
								<li><i class="fa fa-comments-o" aria-hidden="true"></i><?php echo esc_html( $rdtheme_comments_html );?></li>
							<?php endif; ?>
						</ul>			
					</div>			
				<?php } ?>	
			<?php the_excerpt();?>
			<a class="rdtheme-button-7" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'financepro' ); ?><i class="fa fa-angle-right" aria-hidden="true"></i></a>
		</div>
	</div>
</div>