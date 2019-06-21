<?php
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

if ( ! function_exists( 'vif_setup' ) ) :
	function vif_setup() {
		load_theme_textdomain( 'vif', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );
		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'vif' ),
				'footer' => __( 'Footer Menu', 'vif' ),
				'social' => __( 'Social Links Menu', 'vif' ),
			)
		);
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 190,
				'width'       => 190,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-styles' );
		add_editor_style( 'style-editor.css' );
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'vif' ),
					'shortName' => __( 'S', 'vif' ),
					'size'      => 19.5,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'vif' ),
					'shortName' => __( 'M', 'vif' ),
					'size'      => 22,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'vif' ),
					'shortName' => __( 'L', 'vif' ),
					'size'      => 36.5,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'vif' ),
					'shortName' => __( 'XL', 'vif' ),
					'size'      => 49.5,
					'slug'      => 'huge',
				),
			)
		);
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Primary', 'vif' ),
					'slug'  => 'primary',
					'color' => vif_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 33 ),
				),
				array(
					'name'  => __( 'Secondary', 'vif' ),
					'slug'  => 'secondary',
					'color' => vif_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 23 ),
				),
				array(
					'name'  => __( 'Dark Gray', 'vif' ),
					'slug'  => 'dark-gray',
					'color' => '#111',
				),
				array(
					'name'  => __( 'Light Gray', 'vif' ),
					'slug'  => 'light-gray',
					'color' => '#767676',
				),
				array(
					'name'  => __( 'White', 'vif' ),
					'slug'  => 'white',
					'color' => '#FFF',
				),
			)
		);
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'vif_setup' );

function vif_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer', 'vif' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'vif' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'vif_widgets_init' );

function vif_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'vif_content_width', 640 );
}
add_action( 'after_setup_theme', 'vif_content_width', 0 );

function vif_scripts() {
	wp_enqueue_style( 'vif-style', get_stylesheet_directory_uri() . '/frontend.min.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_style_add_data( 'vif-style', 'rtl', 'replace' );
	if ( has_nav_menu( 'menu-1' ) ) {
		wp_enqueue_script( 'vif-priority-menu', get_theme_file_uri( '/js/priority-menu.js' ), array(), '1.1', true );
		wp_enqueue_script( 'vif-touch-navigation', get_theme_file_uri( '/js/touch-keyboard-navigation.js' ), array(), '1.1', true );
	}
	wp_enqueue_style( 'vif-print-style', get_template_directory_uri() . '/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vif_scripts' );

function vif_skip_link_focus_fix() {
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'vif_skip_link_focus_fix' );

function vif_editor_customizer_styles() {
	wp_enqueue_style( 'vif-editor-customizer-styles', get_theme_file_uri( '/style-editor-customizer.css' ), false, '1.1', 'all' );
	if ( 'custom' === get_theme_mod( 'primary_color' ) ) {
		require_once get_parent_theme_file_path( '/inc/color-patterns.php' );
		wp_add_inline_style( 'vif-editor-customizer-styles', vif_custom_colors_css() );
	}
}
add_action( 'enqueue_block_editor_assets', 'vif_editor_customizer_styles' );

function vif_colors_css_wrap() {
	if ( ( ! is_customize_preview() && 'default' === get_theme_mod( 'primary_color', 'default' ) ) || is_admin() ) {
		return;
	}
	require_once get_parent_theme_file_path( '/inc/color-patterns.php' );
	$primary_color = 199;
	if ( 'default' !== get_theme_mod( 'primary_color', 'default' ) ) {
		$primary_color = get_theme_mod( 'primary_color_hue', 199 );
	} ?>
	<style type="text/css" id="custom-theme-colors" <?php echo is_customize_preview() ? 'data-hue="' . absint( $primary_color ) . '"' : ''; ?>>
		<?php echo vif_custom_colors_css(); ?>
	</style>
	<?php
}
add_action( 'wp_head', 'vif_colors_css_wrap' );

require get_template_directory() . '/classes/class-vif-svg-icons.php';

require get_template_directory() . '/classes/class-vif-walker-comment.php';

require get_template_directory() . '/inc/template-functions.php';

require get_template_directory() . '/inc/icon-functions.php';

require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/customizer.php';
