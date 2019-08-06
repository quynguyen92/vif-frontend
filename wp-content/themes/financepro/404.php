<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$rdtheme_error_img = empty( RDTheme::$options['error_bodybanner']['url'] ) ? RDTHEME_IMG_URL . '404.png' : RDTheme::$options['error_bodybanner']['url'];
?>
<?php get_header();?>
<div id="primary" class="content-area error-page-area">
	<div class="container">
		<div class="error-page">
			<img src="<?php echo esc_url($rdtheme_error_img);?>" alt="<?php echo _e( '404', 'financepro' );?>">
			<h3><?php echo esc_html( RDTheme::$options['error_text1'] );?></h3>
			<p><?php echo wp_kses_post( RDTheme::$options['error_text2'] );?></p>
			<a class="error-page-btn" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo esc_html( RDTheme::$options['error_buttontext'] );?></a>
		</div>
	</div>
</div>
<?php get_footer(); ?>