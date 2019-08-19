<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$btn_class = 'rdtheme-button-5';
$class  = vc_shortcode_custom_css_class( $css );
$class .= empty( $subtitle ) ? ' rt-no-sub': ' rt-has-sub';
?>
<div class="rt-cta <?php echo esc_attr( $class );?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<div class="rtin-cta-left  waste-time-content">
					<h3><?php echo esc_html( $title );?></h3>
					<?php if ( !empty( $subtitle ) ) { ?>
					<p><?php echo esc_html( $subtitle );?></p>
					<?php } ?> 
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="rtin-cta-right waste-time-button">
					<?php if ( !empty ( $buttontext ) ) { ?>
					<a class="<?php echo esc_attr( $btn_class );?>" href="<?php echo esc_html( $buttonurl );?>"><?php echo esc_html( $buttontext );?></a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>