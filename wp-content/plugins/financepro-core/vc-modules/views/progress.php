<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
$custom_class = vc_shortcode_custom_css_class( $css );
$progressbars = vc_param_group_parse_atts($progress_bars);
$count1 = 1;
?>
<div class="<?php echo esc_attr( $custom_class );?>">
	<?php if ( $progressbars ) { ?>
	<div class="rt-progress-bar-1">
        <div class="skill">
		<?php
			foreach ( $progressbars as $key => $tab ) {
			if ( !empty ($tab["bar_color"]) ) {
				$bar_style =  'background:'. $tab["bar_color"];
			} else {
				$bar_style = '';
			}
		?>
		<div class="progress">
			<div class="lead" style="color:<?php echo esc_attr ( $tab["title_color"] );  ?>;"><?php echo esc_html( $tab["title"] ); ?></div>
			<div class="progress-bar wow fadeInLeft" data-progress="<?php echo esc_html( $tab["bar_number"] ); ?>%" style="width: <?php echo esc_html( $tab["bar_number"] ); ?>%; <?php echo esc_attr( $bar_style ); ?>;" data-wow-duration="1.5s" data-wow-delay="1.2s"> <span><?php echo esc_html( $tab["bar_number"] ); ?>%</span></div>
		</div>
		<?php $count1++; } ?>
		</div>
    </div>
	<?php } else { ?>
		<?php esc_html_e ( 'Please insert some data' , 'financepro-core' ); ?>
	<?php } ?>
</div>