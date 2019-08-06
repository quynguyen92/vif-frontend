<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
?>
<div class="col-sm-4 col-md-3 col-xs-12">
	<aside class="sidebar-widget-area">
		<?php		
		if ( is_singular('fin_case') ) {	
			if ( is_active_sidebar( 'sidebar-case-study' ) ) {
				dynamic_sidebar( 'sidebar-case-study' );
			}
		} else if ( is_singular('fin_service') ) {
			if ( is_active_sidebar( 'sidebar-service' ) ) {
				dynamic_sidebar( 'sidebar-service' );
			}
		} else {
			if ( is_active_sidebar( 'sidebar' ) ) {
			dynamic_sidebar( 'sidebar' );
			}
		}
		?>
	</aside>
</div>