<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args   = RDTheme_Helper::nav_menu_args();
?>
<div class="container masthead-container" id="sticker">
	<div id="site-navigation" class="main-navigation">
		<?php wp_nav_menu( $nav_menu_args );?>
	</div>
	<?php get_template_part( 'template-parts/header/icon', 'area' );?>
	<div class="clear"></div>
</div>