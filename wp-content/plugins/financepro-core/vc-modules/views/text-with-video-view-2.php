<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$custom_class = vc_shortcode_custom_css_class( $css );
$video_w = 500;
$video_h = $video_w / 1.61;
global $wp_embed;
?>
<div class="<?php echo esc_attr( $custom_class );?>">
	<div class="rt-text-with-video">
		<div class="row">
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
				<div class="rtin-video-content">				
					<?php echo $wp_embed->run_shortcode('[embed width="' . $video_w . '" height="' . $video_h . '" ]' . $link . '[/embed]'); ?>
				</div>
			</div>
			<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
				<div class="rtin-text-content">
				<?php if ( !empty ( $sm_title ) ) { ?>
					<span style="color:<?php echo esc_attr ( $sm_title_color ); ?>"><?php echo esc_html ( $sm_title ); ?></span>
				<?php } ?>
				<?php if ( !empty ( $lg_title ) ) { ?>
					<h2 class="rtin-title-bar" style="color:<?php echo esc_attr ( $lg_title_color ); ?>"><?php echo esc_html ( $lg_title ); ?></h2>
				<?php } ?>								
				</div>
				<?php echo wp_kses_post ( $content ); ?>
			</div>
		</div>
	</div>
</div>