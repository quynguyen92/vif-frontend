<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$custom_class = vc_shortcode_custom_css_class( $css );
?>
<div class="<?php echo esc_attr( $custom_class );?>">
	<div class="rt-contact-info">
		<?php if ( !empty( $title ) ){ ?>
			<h2 style="color:<?php echo esc_attr( $title_color );?>;"><?php echo esc_html( $title );?></h2>
		<?php } if ( !empty( $description ) ) {?>
			<p style="color:<?php echo esc_attr( $description_color );?>;"><?php echo wp_kses_post( $description );?></p>
		<?php } ?>		
		<ul>
			<?php 
			if( !empty( $address ) ){
				?><li><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo wp_kses_post( $address ); ?></li><?php
			}  
			if( !empty(  $phone ) ){
				?><li><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:<?php echo esc_attr( $phone ); ?>"><?php echo esc_html( $phone );?></a></li><?php
			}   
			if( !empty( $email ) ){
				?><li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:<?php echo esc_attr( $email );?>"><?php echo esc_html( $email );?></a></li><?php
			}  
			if( !empty( $fax ) ){
				?><li><i class="fa fa-fax" aria-hidden="true"></i> <?php echo esc_html( $fax );?></li><?php
			}   
			?>
		</ul>
	</div>
</div>