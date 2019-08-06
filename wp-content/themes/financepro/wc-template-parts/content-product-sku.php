<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

global $product;?>
<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
	<div class="product_meta">
	<?php esc_html_e( 'SKU:', 'financepro' ); ?> <span class="sku"><?php echo esc_html( $sku = $product->get_sku() ) ? $sku : esc_html( 'N/A', 'financepro' ); ?></span>
	</div>
<?php endif;