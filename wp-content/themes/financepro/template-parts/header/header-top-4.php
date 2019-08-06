<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$rdtheme_socials = RDTheme_Helper::socials();
?>
<div id="tophead" class="header-top-bar align-items-center">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="tophead-contact">
					<?php if ( is_active_sidebar( 'top4-left' ) ) dynamic_sidebar( 'top4-left' );?>
				</div>
				<div class="tophead-right">
					<?php if ( is_active_sidebar( 'top4-right' ) ) dynamic_sidebar( 'top4-right' );?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>