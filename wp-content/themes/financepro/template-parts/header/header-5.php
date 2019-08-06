<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args = RDTheme_Helper::nav_menu_args();

// Logo
$rdtheme_dark_logo = empty( RDTheme::$options['logo']['url'] ) ? RDTHEME_IMG_URL . 'logo-dark.png' : RDTheme::$options['logo']['url'];
$rdtheme_light_logo = empty( RDTheme::$options['logo_light']['url'] ) ? RDTHEME_IMG_URL . 'logo-light.png' : RDTheme::$options['logo_light']['url'];
?>
<div id="sticker">
	<div class="site-branding">
		<?php if ( RDTheme::$options['logo_type'] == 'image_type' ) { ?>
			<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $rdtheme_dark_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
			<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $rdtheme_light_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
		<?php } else { ?>
			<a class="rt-text-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo RDTheme::$options['logo_text'];  ?></a>
		<?php } ?>
	</div>
	<?php if ( RDTheme::$options['header_btn_txt'] && RDTheme::$options['header_btn_url'] ): ?>
		<a class="header-menu-btn" href="<?php echo RDTheme::$options['header_btn_url'];?>"><?php echo RDTheme::$options['header_btn_txt'];?></a>
	<?php endif; ?>
	<div id="site-navigation" class="main-navigation">
		<?php wp_nav_menu( $nav_menu_args );?>
	</div>
	<div class="clear"></div>
</div>