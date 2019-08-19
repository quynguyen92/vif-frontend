<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$custom_class = vc_shortcode_custom_css_class( $css );
$col_class = '';
if ( !empty ( $image ) ) {
	$col_class = 'col-lg-7 col-md-7 col-sm-7 col-xs-12';	
} else {
	$col_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad-top';
}
?>
<div class="<?php echo esc_attr( $custom_class );?>">
	<div class="rt-about-one">
		<div class="row">
			<?php if ( !empty ( $image ) ) { ?>
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
				<div class="rtin-about-image">
					<?php echo wp_get_attachment_image( $image, 'full' ); ?>
				</div>
			</div>
			<?php } ?>
			<div class="<?php echo esc_attr( $col_class ); ?>">
				<div class="rtin-about-content-center">
					<div class="rtin-about-content">
						<h2 style="color:<?php echo esc_attr( $title_color ); ?>"><?php echo wp_kses_post( $title ); ?></h2>
						<div><?php echo wp_kses_post( $content );?></div>
						<h3 class="about-name"><?php echo esc_html( $name );?></h3>
						<h4><?php echo esc_html( $designation );?></h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>