<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

?>
<div class="search-box-area">
	<div class="search-box">
		<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) );?>">
			<a href="#" class="search-close">x</a>
			<input type="text" name="s" class="search-text" placeholder="<?php esc_attr_e( 'Search Here...', 'financepro' );?>" required>
			<a href="#" class="search-button"><i class="fa fa-search" aria-hidden="true"></i></a>
		</form>
	</div>
</div>