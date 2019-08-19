<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$custom_class = vc_shortcode_custom_css_class( $css );
$tabs = vc_param_group_parse_atts($tabs);
$count1 = 1;
$count2 = 1;
$today = date('YmdHis');
if( !empty ( $tabs ) ) {
	foreach($tabs as $key => $tab){
		$tabs[$key]['uid'] = rand(0, $today);	
	}
}
?>
<div class="<?php echo esc_attr( $custom_class );?>">
	<?php if ( $tabs ) { ?>
		<div class="tabbable rt-tab-style">
			<ul class="nav nav-tabs">
			<?php foreach ( $tabs as $key => $tab ) { ?>
				<li class="<?php if ( $count1 == 1 ){ echo esc_attr( 'active' ); } ?>">
					<a href="#sec-<?php echo $tab['uid']; ?>" data-toggle="tab"><?php if ( $tab['icontype'] == 'image' ) { ?>
							<?php echo wp_get_attachment_image( $tab['image'], 'rdtheme-size8' , true ); ?>
						<?php } else { ?>
						<?php
							$icon  = ( $tab['icontype'] == 'flaticon' ) ? $tab['icon_flat'] : $tab['icon_fa'];
							if ( $tab['icontype'] == 'flaticon' ) {
								vc_icon_element_fonts_enqueue( $icon );
							}
						?><i class="<?php echo esc_attr( $icon );?>" aria-hidden="true"></i><?php } 
							if ( !empty( $tab["title"] ) ) {
								echo esc_html( $tab["title"] );
							} else {
								echo esc_html( 'Insert Title' , 'financepro-core' );
							}
						?>
						</a>
				</li>
			<?php $count1++; } ?>
			</ul>
			<div class="tab-content">
			<?php foreach ($tabs as $key => $tab) { ?>
				<div class="tab-pane <?php if ( $count2 == 1 ){ echo esc_attr( 'active' ); } ?>" id="sec-<?php echo $tab['uid'] ; ?>">
					<h2><?php
							if ( !empty( $tab["title"] ) ) {
								echo esc_html( $tab["title"] );
							} else {
								echo esc_html( 'Insert Title' , 'financepro-core' );
							}
						?></h2><?php
							if ( !empty( $tab['content_text'] ) ) {
								echo wp_kses_post( $tab['content_text'] );
							} else {
								echo esc_html( 'Insert Content' , 'financepro-core' );
							}
						?></div>
			<?php $count2++; } ?>
			</div>
		</div>
	<?php  } else { ?>
		<?php esc_html_e ( 'Please insert some data' , 'financepro-core' ); ?>
	<?php } ?>
</div>