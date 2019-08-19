<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$heading = $wrapper_css = $icon_css = $title_css = $content_css = $icon_holder_style = '';

$class = vc_shortcode_custom_css_class( $css );
$class .= " {$layout}";

$heading   .= !empty( $url ) ? '<a style="color:' . $title_color . ' ;" href="' . $url . '">' : '';
$heading   .= $title;
$heading   .= !empty( $url ) ? '</a>' : '';

if ( $color != '' ) {
	$icon_css  .= "color: {$color};";
}
if ( $size != '' ) {
    $size       = (int) $size;
    $icon_css  .= "font-size: {$size}px;";
}
if ( $icon_padding != '' ) {
	$icon_padding = (int) $icon_padding;
	$icon_css    .= "padding: {$icon_padding}px;";
}
if ( $spacing_bottom != '' ) {
    $title_css .= "margin-bottom: {$spacing_bottom}px;";
}
if ( $title_size != '' ) {
    $title_size   = (int) $title_size;
    $title_css   .= "font-size: {$title_size}px;";
}
if ( $content_size != '' ) {
    $content_size = (int) $content_size;
    $content_css .= "font-size: {$content_size}px;";
}
if ( $width != '' ) {
    $width        = (int) $width;
    $wrapper_css .= 'max-width: '. $width . 'px;';
}
if ( empty($hovercolor) ) {
	$hovercolor = RDTheme::$options['primary_color'];
}
if ( empty($title_hover_color) ) {
	$title_hover_color = RDTheme::$options['primary_color'];
}
?>
<div class="rt-infobox-9 <?php echo esc_attr( $class );?>" style="<?php echo esc_attr( $wrapper_css );?>" data-color="<?php echo esc_attr( $color );?>" data-hover="<?php echo esc_attr( $hovercolor );?>" data-title-color="<?php echo esc_attr( $title_color );?>" data-title-hover="<?php echo esc_attr( $title_hover_color );?>">
	<div>
		<div class="media">
			<div class="media-left">
				<div class="rtin-info-icon <?php echo ( $icon_style == 'squire' ) ? '' : ' rounded' ;?>">
					<?php if ( $icontype == 'image' ): ?>
						<?php echo wp_get_attachment_image( $image, array( $size, $size ), true ); ?>
					<?php else: ?>
						<i class="<?php echo esc_attr( $icon );?>" aria-hidden="true" style="<?php echo esc_attr( $icon_css ); ?>"></i>
					<?php endif; ?>
				</div>
			</div>
			<div class="media-body">
				<h3 class="media-heading" style="<?php if ( empty( $url ) ) { echo 'color:' . esc_attr( $title_color ); } ?><?php echo esc_attr( $title_css );?>"><?php echo wp_kses_post( $heading ); ?></h3>
				<span style="<?php if ( !empty( $title_color ) ) { echo 'background:' . $title_color ; } ?>"></span>
			</div>
		</div>
		<div class="clear"></div>
		<p class="mb0" style="<?php echo esc_attr( $content_css );?>"><?php echo wp_kses_post( $content ); ?></p>
	</div>
</div>