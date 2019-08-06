<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

// Layout class
if ( RDTheme::$layout == 'full-width' ) {
	$rdtheme_layout_class = 'col-sm-12 col-xs-12';
}
else{
	$rdtheme_layout_class = 'col-sm-8 col-md-9 col-xs-12';
}
$rdtheme_is_post_archive = is_home() || ( is_archive() && get_post_type() == 'post' ) ? true : false;
?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<?php
			if ( RDTheme::$layout == 'left-sidebar' ) {
				get_sidebar();
			}
			?>
			<div class="<?php echo esc_attr( $rdtheme_layout_class );?>">
				<main id="main" class="site-main">
					<?php if ( have_posts() ) { ?>
						<?php
						if ( $rdtheme_is_post_archive && RDTheme::$options['blog_style'] == 'style3' ) {
							echo '<div class="blog-layout-3">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-3', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( $rdtheme_is_post_archive && RDTheme::$options['blog_style'] == 'style2' ) {
							echo '<div class="auto-clear">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-2', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( $rdtheme_is_post_archive && RDTheme::$options['blog_style'] == 'style1' ) {
							echo '<div class="auto-clear">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
							echo '</div>';
						}
						else{
							while ( have_posts() ) : the_post();
							echo 
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
						}
						?>
						<?php RDTheme_Helper::pagination();?>
					<?php } else {?>
						<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php } ?>
				</main>					
			</div>
			<?php
			if ( RDTheme::$layout == 'right-sidebar' ) {
				get_sidebar();
			}
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>