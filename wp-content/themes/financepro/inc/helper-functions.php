<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_Helper' ) ) {
	
	class RDTheme_Helper {

		public static function pagination() {

			if( is_singular() )
				return;

			global $wp_query;

			/** Stop execution if there's only 1 page */
			if( $wp_query->max_num_pages <= 1 )
				return;

			$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
			$max   = intval( $wp_query->max_num_pages );

			/**	Add current page to the array */
			if ( $paged >= 1 )
				$links[] = $paged;

			/**	Add the pages around the current page to the array */
			if ( $paged >= 3 ) {
				$links[] = $paged - 1;
				$links[] = $paged - 2;
			}

			if ( ( $paged + 2 ) <= $max ) {
				$links[] = $paged + 2;
				$links[] = $paged + 1;
			}
			include RDTHEME_VIEW_DIR . 'pagination.php';
		}


		public static function comments_callback( $comment, $args, $depth ){
			include RDTHEME_VIEW_DIR . 'comments-callback.php';
		}

		public static function hex2rgb($hex) {
			$hex = str_replace("#", "", $hex);
			if(strlen($hex) == 3) {
				$r = hexdec(substr($hex,0,1).substr($hex,0,1));
				$g = hexdec(substr($hex,1,1).substr($hex,1,1));
				$b = hexdec(substr($hex,2,1).substr($hex,2,1));
			} else {
				$r = hexdec(substr($hex,0,2));
				$g = hexdec(substr($hex,2,2));
				$b = hexdec(substr($hex,4,2));
			}
			$rgb = "$r, $g, $b";
			return $rgb;
		}

		public static function filter_social( $args ){
			return ( $args['url'] != '' );
		}
		
		public static function fonts_url(){
			$fonts_url = '';
			if ( 'off' !== _x( 'on', 'Google fonts - Open Sans and Poppins : on or off', 'financepro' ) ) {
				$fonts_url = add_query_arg( 'family', urlencode( 'Open Sans:400,600,700|Roboto:400,500,700' ), "//fonts.googleapis.com/css" );
			} 
			return $fonts_url;
		}
		
		//@rtl
		public static function maybe_rtl( $css ){
			if ( is_rtl() ) {
				return RDTHEME_AUTORTL_URL . $css;
			}
			else {
				return RDTHEME_CSS_URL . $css;
			}
		}
		
		public static function socials(){
			$rdtheme_socials = array(
				'social_facebook' => array(
					'icon' => 'fa-facebook',
					'url'  => RDTheme::$options['social_facebook'],
				),
				'social_twitter' => array(
					'icon' => 'fa-twitter',
					'url'  => RDTheme::$options['social_twitter'],
				),
				'social_gplus' => array(
					'icon' => 'fa-google-plus',
					'url'  => RDTheme::$options['social_gplus'],
				),
				'social_linkedin' => array(
					'icon' => 'fa-linkedin',
					'url'  => RDTheme::$options['social_linkedin'],
				),
				'social_youtube' => array(
					'icon' => 'fa-youtube',
					'url'  => RDTheme::$options['social_youtube'],
				),
				'social_pinterest' => array(
					'icon' => 'fa-pinterest',
					'url'  => RDTheme::$options['social_pinterest'],
				),
				'social_instagram' => array(
					'icon' => 'fa-instagram',
					'url'  => RDTheme::$options['social_instagram'],
				),
				'social_skype' => array(
					'icon' => 'fa-skype',
					'url'  => RDTheme::$options['social_skype'],
				),
				'social_rss' => array(
					'icon' => 'fa-rss',
					'url'  => RDTheme::$options['social_rss'],
				),
			);
			return array_filter( $rdtheme_socials, array( 'RDTheme_Helper' , 'filter_social' ) );
		}

		public static function nav_menu_args(){
			$rdtheme_pagemenu = false;
			if ( ( is_single() || is_page() ) ) {
				$rdtheme_menuid = get_post_meta( get_the_id(), 'financepro_page_menu', true );
				if ( !empty( $rdtheme_menuid ) && $rdtheme_menuid != 'default' ) {
					$rdtheme_pagemenu = $rdtheme_menuid;
				}
			}
			if ( $rdtheme_pagemenu ) {
				$nav_menu_args = array( 'menu' => $rdtheme_pagemenu,'container' => 'nav' );
			}
			else {
				$nav_menu_args = array( 'theme_location' => 'primary','container' => 'nav' );
			}
			return $nav_menu_args;		
		}
				
		public static function has_footer(){
			if ( !RDTheme::$options['footer_area'] ) {
				return false;
			}
			$footer_column = RDTheme::$options['footer_column'];
			for ( $i = 1; $i <= $footer_column; $i++ ) {
				if ( is_active_sidebar( 'footer-'. $i ) ) {
					return true;
				}
			}
			return false;
		}

		public static function create_dynamic_css_file( $file ){
			global $wp_filesystem;
			if ( empty( $wp_filesystem ) ) {
				require_once ( ABSPATH . '/wp-admin/includes/file.php' );
				WP_Filesystem();
			}

			$dynamic_css = '';
			ob_start();
			include RDTHEME_INC_DIR . 'variable-style.php';
			include RDTHEME_INC_DIR . 'variable-style-vc.php';
			$dynamic_css .= ob_get_clean();
			//$dynamic_css .= wp_kses_post( RDTheme::$options['custom_css'] ); // custom css
			$dynamic_css = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '   ', '    ' ), ' ', $dynamic_css ); // remove spaces and minify
			$dynamic_css = '/* This file is auto generated based on theme options. DO NOT MODIFY THIS FILE */'. PHP_EOL . $dynamic_css;
			$wp_filesystem->put_contents( $file, $dynamic_css, FS_CHMOD_FILE );
		}

		public static function dynamic_internal_style(){
			ob_start();
			include RDTHEME_INC_DIR . 'variable-style.php';
			include RDTHEME_INC_DIR . 'variable-style-vc.php';
			$dynamic_css  = ob_get_clean();
			//$dynamic_css .= wp_kses_post( RDTheme::$options['custom_css'] ); // custom css
			wp_register_style( 'financepro-dynamic', false );
			wp_enqueue_style( 'financepro-dynamic' );
			wp_add_inline_style( 'financepro-dynamic', $dynamic_css );	
		}
	}
}