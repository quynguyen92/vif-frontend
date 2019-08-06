<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

?>
<div class="product-thumb-area">
	<?php
	global $product;
	woocommerce_show_product_loop_sale_flash();
	woocommerce_template_loop_product_thumbnail();
	?>
	<?php if ( RDTheme::$options['wc_product_hover'] ): ?>
		<div class="overlay"></div>
		<div class="product-info">
			<ul>
				<?php if ( function_exists( 'YITH_WCQV_Frontend' ) && RDTheme::$options['wc_quickview_icon'] ): ?>
					<li><a href="" class="yith-wcqv-button" data-product_id="<?php echo esc_attr( $product->get_id() );?>"><i class="fa fa-search"></i></a></li>
				<?php endif; ?>
				<?php if ( class_exists( 'YITH_WCWL_Shortcode' ) && RDTheme::$options['wc_wishlist_icon'] ): ?>
					<?php
					$args = array(
						'browse_wishlist_text' => '<i class="fa fa-check"></i>',
						'already_in_wishslist_text' => '',
						'product_added_text' => '',
						'icon' => 'fa-heart-o',
						'label' => '',
						'link_classes' => 'add_to_wishlist single_add_to_wishlist alt wishlist-icon',
					);
					?>
					<li><?php echo YITH_WCWL_Shortcode::add_to_wishlist( $args );?></li>
				<?php endif; ?>
			</ul>
		</div>
	<?php endif; ?>
</div>