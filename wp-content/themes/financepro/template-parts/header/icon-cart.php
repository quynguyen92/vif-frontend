<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

?>
<div class="cart-icon-area">
	<a href="<?php echo esc_url( wc_get_cart_url() );?>"><i class="fa fa-shopping-cart"></i><span class="cart-icon-num"><?php echo WC()->cart->get_cart_contents_count();?></span></a>
	<div class="cart-icon-products">
		<?php the_widget( 'WC_Widget_Cart' ); ?>
	</div>
</div>