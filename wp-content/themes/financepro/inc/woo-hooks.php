<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

/* Theme supports for WooCommerce */
add_action('after_setup_theme', 'rdtheme_wc_support');
/* Header cart count number */
add_filter( 'woocommerce_add_to_cart_fragments', 'rdtheme_header_cart_count' );

/* Breadcrumb */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

/* Modify responsive smallscreen size */
add_filter( 'woocommerce_style_smallscreen_breakpoint', 'rdtheme_smallscreen_breakpoint' );

/* Shop hide default page title */
add_filter( 'woocommerce_show_page_title', 'rdtheme_wc_hide_page_title' );

/* Shop products per page */
add_filter( 'loop_shop_per_page', 'rdtheme_wc_loop_shop_per_page' );

/* Shop/Archive Wrapper */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
add_action( 'woocommerce_before_main_content', 'rdtheme_wc_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'rdtheme_wc_wrapper_end', 10 );

/* Shop top tab */
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
add_action( 'woocommerce_before_shop_loop', 'rdtheme_wc_shop_topbar', 20 );

/* Shop loop */
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

add_action( 'woocommerce_shop_loop_item_title', 'rdtheme_wc_loop_product_title', 10 );
add_filter( 'loop_shop_columns', 'rdtheme_wc_loop_shop_columns' );
add_action( 'woocommerce_before_shop_loop_item_title', 'rdtheme_wc_shop_thumb_area', 11 );
add_action( 'woocommerce_before_shop_loop_item_title', 'rdtheme_wc_shop_info_wrap_start', 12 );
add_action( 'woocommerce_after_shop_loop_item_title', 'rdtheme_wc_shop_add_description', 12 );
add_action( 'woocommerce_after_shop_loop_item', 'rdtheme_wc_shop_info_wrap_end', 12 );

/* Single Product */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

add_action( 'woocommerce_single_product_summary', 'rdtheme_wc_render_sku', 15 );
add_action( 'woocommerce_single_product_summary', 'rdtheme_wc_render_meta', 40 );
add_action( 'init', 'rdtheme_wc_show_or_hide_related_products' );


// Hide product data tabs
add_filter( 'woocommerce_product_tabs', 'rdtheme_wc_hide_product_data_tab' );
add_filter( 'woocommerce_product_review_comment_form_args', 'rdtheme_wc_product_review_form' );


/* Cart */
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals', 10 );
add_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals' );

add_action( 'init', 'rdtheme_wc_show_or_hide_cross_sells' );

// Yith Quickview
if ( function_exists( 'YITH_WCQV_Frontend' ) ) {
	remove_action( 'woocommerce_after_shop_loop_item', array( YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 15 );
	remove_action( 'yith_wcwl_table_after_product_name', array( YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 15 );
}