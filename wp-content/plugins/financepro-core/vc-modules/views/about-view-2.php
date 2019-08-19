<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$custom_class = vc_shortcode_custom_css_class( $css );
?>
<div class="<?php echo esc_attr( $custom_class );?>">
	<div class="rt-about-one">
		<div class="row">
			<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
				<div class="rtin-about-content-center">
					<div class="rtin-about-content">
						<h2><?php echo wp_kses_post( $title ); ?></h2>
						<?php echo wp_kses_post( $content ); ?>
						<h3 class="about-name"><?php echo esc_html( $name ); ?></h3>
						<h4><?php echo esc_html( $designation ); ?></h4>
					</div>
				</div>
			</div>
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
				<div class="rtin-about-image">
					<?php echo wp_get_attachment_image( $image, 'full' ); ?>
				</div>
			</div>
		</div>
	</div>
</div>