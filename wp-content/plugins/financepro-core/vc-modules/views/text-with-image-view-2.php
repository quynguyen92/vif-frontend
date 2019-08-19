<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$custom_class = vc_shortcode_custom_css_class( $css );
?>
<div class="<?php echo esc_attr( $custom_class );?>">
	<div class="rt-text-with-image">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="rtin-text-part">
					<?php if ( !empty ( $title ) ) { ?>
					<h2 style="color:<?php echo esc_attr( $title_color ); ?>"><?php echo esc_html( $title ) ; ?></h2>
					<?php } ?>
					<?php echo wp_kses_post( $content );?>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<?php echo wp_get_attachment_image( $image, 'full' )?>
			</div>
		</div>
	</div>
</div>