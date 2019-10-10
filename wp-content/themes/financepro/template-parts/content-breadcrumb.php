<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.6.4
 */

if( function_exists( 'bcn_display') && !is_category() ){
	echo '<div class="redchili-pagination">';
	if ( is_rtl() ) { //@rtl
		bcn_display( false, true, true );
	}
	else {
		bcn_display();
	}	
	echo '</div>';
}