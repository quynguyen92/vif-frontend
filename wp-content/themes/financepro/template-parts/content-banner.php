<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
	$rdtheme_title = woocommerce_page_title( false );
}
elseif ( is_404() ) {
	$rdtheme_title = RDTheme::$options['error_title'];
}
elseif ( is_search() ) {
	$rdtheme_title = __( 'Search Results for : ', 'financepro' ) . get_search_query();
}
elseif ( is_home() ) {
	if ( get_option( 'page_for_posts' ) ) {
		$rdtheme_title = get_the_title( get_option( 'page_for_posts' ) );
	}
	else {
		$rdtheme_title = apply_filters( 'financepro_blog_title', esc_html__( 'All Posts', 'financepro' ) );
	}
}
elseif ( is_archive() ) {
	$rdtheme_title = get_the_archive_title();
}
else{
	$rdtheme_title = get_the_title();
}

if ( RDTheme::$bgtype == 'bgcolor' ) {
	$rdtheme_bg = RDTheme::$bgcolor;
} else {
	$rdtheme_bg = 'url(' . RDTheme::$bgimg . ') no-repeat scroll center center / cover';
}

?>
<?php if ( RDTheme::$has_banner == '1' || RDTheme::$has_banner == 'on' ): ?>
	<div class="entry-banner" style="background:<?php echo esc_html( $rdtheme_bg ); ?>">
		<div class="container">
			<div class="entry-banner-content">
				<h1 class="entry-title"><?php echo wp_kses_post( $rdtheme_title );?></h1>
				<?php if ( RDTheme::$has_breadcrumb == '1' || RDTheme::$has_breadcrumb == 'on' ): ?>
					<?php get_template_part( 'template-parts/content', 'breadcrumb' );?>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endif; ?>