<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$custom_class = vc_shortcode_custom_css_class( $css );
if ( $button_style == 'style1' ) { 
	$btn_style = 'ghost-btn';
} else {
	$btn_style = 'btn-default-big';
}
?>
<div class="<?php echo esc_attr( $custom_class );?>">	
	<div class="rt-text-with-btn" style="text-align:<?php echo esc_attr ( $section_align ); ?>">
		<h2 style="font-size:<?php echo esc_attr( $title_font_size ); ?>px;color:<?php echo esc_attr( $title_color ); ?>"><?php echo wp_kses_post( $title ) ; ?></h2>
		<div style="color:<?php echo esc_attr( $content_color ); ?>"><?php echo wp_kses_post( $content );?></div>
		<?php if ( !empty ( $button_text ) ) { ?>
		<a class="<?php echo esc_attr ( $btn_style ); ?>" href="<?php echo esc_attr( $button_url ); ?>"><?php echo esc_html( $button_text ); ?><i class="fa fa-angle-right"></i></a>
		<?php } ?>
	</div>	
</div>