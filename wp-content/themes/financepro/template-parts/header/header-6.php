<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args   = RDTheme_Helper::nav_menu_args();

// Logo
$rdtheme_dark_logo = empty( RDTheme::$options['logo']['url'] ) ? RDTHEME_IMG_URL . 'logo-dark.png' : RDTheme::$options['logo']['url'];
$rdtheme_light_logo = empty( RDTheme::$options['logo_light']['url'] ) ? RDTHEME_IMG_URL . 'logo-light.png' : RDTheme::$options['logo_light']['url'];

$rdtheme_logo_col_num = (int) RDTheme::$options['logo_width'];

$rdtheme_logo_class = "col-sm-{$rdtheme_logo_col_num} col-xs-12";
$rdtheme_header_right_class = 'col-sm-'. ( 12 - $rdtheme_logo_col_num ) . ' col-xs-12';

// Icon
$rdtheme_has_icons = false;
if (  RDTheme::$options['search_icon'] ||
	( RDTheme::$options['cart_icon'] && class_exists( 'WC_Widget_Cart' ) ) ||
	( RDTheme::$options['vertical_menu_icon'] && has_nav_menu( 'topright' ) ) ) {
	$rdtheme_has_icons = true;
}
?>
<div class="container masthead-container" id="sticker">
	<div class="row header-firstrow">
		<div class="<?php echo esc_attr( $rdtheme_logo_class );?>">
			<div class="site-branding">
				<?php if ( RDTheme::$options['logo_type'] == 'image_type' ) { ?>
					<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $rdtheme_dark_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
					<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $rdtheme_light_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
				<?php } else { ?>
					<a class="rt-text-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo RDTheme::$options['logo_text'];  ?></a>
				<?php } ?>
			</div>
		</div>
		<div class="<?php echo esc_attr( $rdtheme_header_right_class );?>">
			<?php if ( $rdtheme_has_icons ): ?>
				<?php get_template_part( 'template-parts/header/icon', 'area' );?>
			<?php endif; ?>
			<ul class="header-address">
				<?php if ( RDTheme::$options['phone'] ): ?>
					<li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:<?php echo esc_attr( RDTheme::$options['phone'] );?>"><?php echo esc_html( RDTheme::$options['phone'] );?></a><span><?php $header_hotline_txt = RDTheme::$options['header_hotline_txt'];
						if ( !empty( $header_hotline_txt ) ){ echo esc_html( $header_hotline_txt ); } else { esc_html_e( 'Hotline', 'financepro' ); } ?></span></li>
				<?php endif; ?>
				<?php if ( RDTheme::$options['address'] ): ?>
					<li><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo wp_kses_post( RDTheme::$options['address'] );?><span><?php $header_location_txt = RDTheme::$options['header_location_txt']; if ( !empty( $header_location_txt ) ){ echo esc_html( $header_location_txt ); } else { esc_html_e( 'Location', 'financepro' ); } ?></span></li>
				<?php endif; ?>
				<?php if ( RDTheme::$options['hour'] ): ?>
					<li><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo esc_html( RDTheme::$options['hour'] );?><span><?php $header_officehour_txt = RDTheme::$options['header_officehour_txt']; if ( !empty( $header_officehour_txt ) ){ echo esc_html( $header_officehour_txt ); } else { esc_html_e( 'Office Hour', 'financepro' ); } ?></span></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
	
	<div id="site-navigation" class="main-navigation">
		<div class="nav-area clearfix">
			<?php wp_nav_menu( $nav_menu_args );?>
			<?php if ( !empty(RDTheme::$options['header_btn_txt']) ) { ?>
			<div class="header-cta"><a href="<?php echo RDTheme::$options['header_btn_url'];?>"><?php echo RDTheme::$options['header_btn_txt'];?></a></div>
			<?php } ?>
			
		</div>
	</div>
	
</div>