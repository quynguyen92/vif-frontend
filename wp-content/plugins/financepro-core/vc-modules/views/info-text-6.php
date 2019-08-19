<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$heading = $wrapper_css = $icon_css = $title_css = $content_css = $icon_holder_style = '';

$class = vc_shortcode_custom_css_class( $css );
$class .= " {$layout}";

if ( $icon_border === 'true' ) {
    $class .= ' icon-bordered';
}
if ( $bgcolor != '' ) {
     $class       .= ' has-bg';
     $wrapper_css .= 'background-color: '. $bgcolor . ';';
}

$heading   .= !empty( $url ) ? '<a href="' . $url . '">' : '';
$heading   .= $title;
$heading   .= !empty( $url ) ? '</a>' : '';


if ( $size != '' ) {
    $size       = (int) $size;
    $icon_css  .= "font-size: {$size}px;";
}
if ( $spacing_top != '' ) {
    $title_css .= "margin-top: {$spacing_top}px;";
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
<div class="<?php echo esc_attr( $class );?>" style="<?php echo esc_attr( $wrapper_css );?>" data-color="<?php echo esc_attr( $color );?>" data-hover="<?php echo esc_attr( $hovercolor );?>">
	<div class="rt-infobox-6">
		<div class="rtin-info-icon" style="background-color:<?php echo esc_attr( $icon_bgcolor_6 ); ?>">
			<i class="<?php echo esc_attr( $icon );?>" aria-hidden="true" style="<?php echo esc_attr( $icon_css ); ?>"></i>
		</div>
		<div class="rtin-info-content">
			<h3 style="<?php echo esc_attr( $title_css ); ?>"><?php echo wp_kses_post( $heading ); ?></h3>
			<p style="<?php echo esc_attr( $content_css );?>"><?php echo wp_kses_post( $content ); ?></p>
		</div>
	</div>
</div>
<div class="clear"></div>