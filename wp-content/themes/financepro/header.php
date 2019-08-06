<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php do_action( 'wp_body_open' ); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'financepro' ); ?></a>
		<header id="masthead" class="site-header">
		<div id="header-<?php echo esc_attr( RDTheme::$header_style ); ?>" class="header-area header-fixed " style="top: 0px;">
			<?php
				if ( RDTheme::$top_bar == 1 || RDTheme::$top_bar == 'on' ){
					get_template_part( 'template-parts/header/header-top', RDTheme::$top_bar_style );
				}
				get_template_part( 'template-parts/header/header', RDTheme::$header_style );
			?>
			</div>
		</header>
		<div id="meanmenu"></div>
		<div id="header-area-space"></div>
		<div id="content" class="site-content">
			<?php get_template_part('template-parts/content', 'banner');?>