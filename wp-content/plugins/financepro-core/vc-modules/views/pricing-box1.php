<?php
$custom_class = vc_shortcode_custom_css_class( $css );

$style = "";
if ( !empty( $maxwidth ) ) {
	$style .= "max-width:{$maxwidth}px;";
}
if ( !empty( $bgcolor ) ) {
	$style .= "background-color:{$bgcolor};";
}

$price_html  = $price;
$price_html .= !empty( $unit ) ? " <br><div class='price-unit'>/ $unit</div>": '';
?>
<div class="<?php echo esc_attr( $custom_class );?>">
	<div class="rt-price-table-box1" style="<?php echo esc_attr( $style );?>" data-bgcolor="<?php echo esc_attr( $bgcolor );?>" data-bghover="<?php echo esc_attr( $bghover );?>">
		<span><?php echo esc_html( $title );?></span>
		<div class="price-holder"><?php echo wp_kses_post( $price_html );?></div>
		<div class="price-table-service">
			<?php foreach ( $features as $feature ){ ?>
				<div class="price-feature"><?php echo esc_html( $feature );?></div>
			<?php } ?>
		</div>
		<a href="<?php echo esc_url( $btnurl );?>" class="pricetable-btn"><?php echo esc_html( $btntext );?></a>
	</div>
</div>