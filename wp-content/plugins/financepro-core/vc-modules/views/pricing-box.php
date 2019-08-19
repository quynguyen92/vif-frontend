<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$custom_class = vc_shortcode_custom_css_class( $css );

$style = "";
$style .= "background-color:{$bgcolor};";
if ( !empty( $maxwidth ) ) {
	$style .= "max-width:{$maxwidth}px;";
}
$price_html  = $price;
$price_html .= !empty( $unit ) ? "<span> /$unit</span>": '';
?>
<div class="<?php echo esc_attr( $custom_class );?>">		
	<div class="rt-price-table-box" style="<?php echo esc_attr( $style );?>">
		<span><?php echo esc_html( $title );?></span>
		<h3><?php echo wp_kses_post( $price_html );?></h3>
		<ul>
		<?php foreach ( $features as $feature ): ?>
			<li><?php echo esc_html( $feature );?></li>
		<?php endforeach; ?>
		</ul>
		<?php if ( !empty ( $btntext ) ) { ?>
		<div class="rtin-price-button">
			<a class="btn-price-button" href="<?php echo esc_url( $btnurl );?>"><?php echo esc_html( $btntext );?></a>		
		</div>
		<?php } ?>
	</div>			
</div>