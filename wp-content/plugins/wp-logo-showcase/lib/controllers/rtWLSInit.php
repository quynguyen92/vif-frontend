<?php
/**
 * Wp service showcase plugin initiate Class
 *
 *
 * @package WP_LOGO_SHOWCASE
 * @since 1.0
 * @author RadiusTheme
 */

if(!class_exists('rtWLSInit')):
	class rtWLSInit
	{

		/**
		 *	Plugin Init Construct
         */
		function __construct()
		{
			add_action('init', array($this, 'init'), 1);
			add_action( 'widgets_init', array($this, 'initWidget'));
			add_action( 'plugins_loaded', array($this,'wls_load_text_domain') );
			register_activation_hook(RT_WLS_PLUGIN_ACTIVE_FILE_NAME, array($this, 'activate'));
			register_deactivation_hook(RT_WLS_PLUGIN_ACTIVE_FILE_NAME, array($this, 'deactivate'));
			add_action('wp_enqueue_scripts',	array($this, 'enqueue_scripts'));
			add_filter('body_class', array($this, 'wls_browser_body_class'));
		}
		function wls_browser_body_class($classes) {
			global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
			if($is_lynx) $classes[] = 'wls_lynx';
			elseif($is_gecko) $classes[] = 'wls_gecko';
			elseif($is_opera) $classes[] = 'wls_opera';
			elseif($is_NS4) $classes[] = 'wls_ns4';
			elseif($is_safari) $classes[] = 'wls_safari';
			elseif($is_chrome) $classes[] = 'wls_chrome';
			elseif($is_IE) {
				$classes[] = 'wls_ie';
				if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
					$classes[] = 'ie'.$browser_version[1];
			} else $classes[] = 'wls_unknown';
			if($is_iphone) $classes[] = 'wls_iphone';
			if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
				$classes[] = 'wls_osx';
			} elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
				$classes[] = 'wls_linux';
			} elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
				$classes[] = 'wls_windows';
			}
			return $classes;
		}
		function initWidget(){
			global $rtWLS;
			$rtWLS->loadWidget( $rtWLS->widgetsPath );
		}


		/**
		 *	Initiate all required registration for post type and category and the style and script
		 *	Init @hock for plugin init
         */
		function init()
		{
			// Create logo post type
			$labels = array(
				'name' => __( 'Logos', 'wp-logo-showcase' ),
				'singular_name' => __( 'Logo', 'wp-logo-showcase' ),
				'add_new' => __( 'Add New Logo' , 'wp-logo-showcase' ),
				'menu_name'	=> __( 'Logo Showcase', 'wp-logo-showcase' ),
				'all_items' => __( 'All Logos' , 'wp-logo-showcase'),
				'add_new_item' => __( 'Add New Logo' , 'wp-logo-showcase' ),
				'edit_item' =>  __( 'Edit Logo' , 'wp-logo-showcase' ),
				'new_item' => __( 'New Logo' , 'wp-logo-showcase' ),
				'view_item' => __('View Logo', 'wp-logo-showcase'),
				'search_items' => __('Search Logos', 'wp-logo-showcase'),
				'not_found' =>  __('No Logos found', 'wp-logo-showcase'),
				'not_found_in_trash' => __('No Logos found in Trash', 'wp-logo-showcase'),
			);

			global $rtWLS;

			register_post_type( $rtWLS->post_type, array(
				'labels' => $labels,
				'public' => true,
				'show_ui' => true,
				'_builtin' =>  false,
				'capability_type' => 'page',
				'hierarchical' => false,
				'menu_icon' 		=> 	$rtWLS->assetsUrl .'images/menu-icon.png',
				'rewrite' => true,
				'query_var' => false,
				'supports' => array(
					'title', 'thumbnail','page-attributes'
				),
				'show_in_menu'	=> true
			));

			$category_labels = array(
				'name'                       => _x( 'Category', 'wp-logo-showcase' ),
				'singular_name'              => _x( 'Category', 'wp-logo-showcase' ),
				'menu_name'                  => __( 'Categories', 'wp-logo-showcase' ),
				'all_items'                  => __( 'All Category', 'wp-logo-showcase' ),
				'parent_item'                => __( 'Parent Category', 'wp-logo-showcase' ),
				'parent_item_colon'          => __( 'Parent Category', 'wp-logo-showcase' ),
				'new_item_name'              => __( 'New Category Name', 'wp-logo-showcase' ),
				'add_new_item'               => __( 'Add New Category', 'wp-logo-showcase' ),
				'edit_item'                  => __( 'Edit Category', 'wp-logo-showcase' ),
				'update_item'                => __( 'Update Category', 'wp-logo-showcase' ),
				'view_item'                  => __( 'View Category', 'wp-logo-showcase' ),
				'separate_items_with_commas' => __( 'Separate Categories with commas', 'wp-logo-showcase' ),
				'add_or_remove_items'        => __( 'Add or remove Categories', 'wp-logo-showcase' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'wp-logo-showcase' ),
				'popular_items'              => __( 'Popular Categories', 'wp-logo-showcase' ),
				'search_items'               => __( 'Search Categories', 'wp-logo-showcase' ),
				'not_found'                  => __( 'Not Found', 'wp-logo-showcase' ),
			);
			$category_args = array(
				'labels'                     => $category_labels,
				'hierarchical'               => true,
				'public'                     => true,
				'show_ui'                    => true,
				'show_admin_column'          => true,
				'show_in_nav_menus'          => true,
				'show_tagcloud'              => true,
			);

			register_taxonomy( $rtWLS->taxonomy['category'], array( $rtWLS->post_type ), $category_args );

			$sc_args = array(
				'label'               => __( 'Shortcode', 'wp-logo-showcase' ),
				'description'         => __( 'Wp logo showcase Shortcode generator', 'wp-logo-showcase' ),
				'labels'              => array(
					'all_items'           =>__('Shortcode Generator', 'wp-logo-showcase' ),
					'menu_name'	          =>__('Shortcode', 'wp-logo-showcase' ),
					'singular_name'       =>__('Shortcode', 'wp-logo-showcase' ),
					'edit_item'           =>__('Edit Shortcode', 'wp-logo-showcase' ),
					'new_item'            =>__('New Shortcode', 'wp-logo-showcase' ),
					'view_item'           =>__('View Shortcode', 'wp-logo-showcase' ),
					'search_items'        =>__('Shortcode Locations', 'wp-logo-showcase' ),
					'not_found'	          =>__('No Shortcode found.', 'wp-logo-showcase' ),
					'not_found_in_trash'  =>__('No Shortcode found in trash.', 'wp-logo-showcase' )
				),
				'supports'            => array( 'title'),
				'public'              => false,
				'rewrite'				=> false,
				'show_ui'             => true,
				'show_in_menu'        => 'edit.php?post_type='.$rtWLS->post_type,
				'show_in_admin_bar'   => true,
				'show_in_nav_menus'   => true,
				'can_export'          => true,
				'has_archive'         => false,
				'exclude_from_search' => false,
				'publicly_queryable'  => false,
				'capability_type'     => 'page',
			);
			register_post_type( $rtWLS->shortCodePT, $sc_args );



			// register all required style and script for this plugin
			$scripts = array();
			$styles = array();

			$scripts[] = array(
				'handle'	=> 'rt-actual-height-js',
				'src'		=> $rtWLS->assetsUrl . "vendor/jquery.actual.min.js",
				'deps'		=> array('jquery'),
				'footer' => true
			);

			$scripts[] = array(
				'handle'	=> 'rt-slick',
				'src'		=> $rtWLS->assetsUrl . "vendor/slick.min.js",
				'deps'		=> array('jquery'),
				'footer' => true
			);
			$scripts[] = array(
				'handle'	=> 'rt-images-load',
				'src'		=> $rtWLS->assetsUrl . "vendor/imagesloaded.pkgd.min.js",
				'deps'		=> array('jquery'),
				'footer' => true
			);
			$scripts[] = array(
				'handle'	=> 'rt-isotope',
				'src'		=> $rtWLS->assetsUrl . "vendor/isotope.pkgd.min.js",
				'deps'		=> array('jquery','rt-images-load'),
				'footer' => true
			);
			$scripts[] = array(
				'handle'	=> 'rt-wls',
				'src'		=> $rtWLS->assetsUrl . "js/wplogoshowcase.js",
				'deps'		=> array('jquery'),
				'footer' => true
			);

			$styles['rt-wls'] = $rtWLS->assetsUrl . 'css/wplogoshowcase.css';
			if(is_admin()) {
				$scripts[] = array(
					'handle' => 'ace_code_highlighter_js',
					'src' => $rtWLS->assetsUrl . "vendor/ace/ace.js",
					'deps' => null,
					'footer' => true
				);
				$scripts[] = array(
					'handle' => 'ace_mode_js',
					'src' => $rtWLS->assetsUrl . "vendor/ace/mode-css.js",
					'deps' => array('ace_code_highlighter_js'),
					'footer' => true
				);

				$scripts[] = array(
					'handle' => 'wls-sortable',
					'src' => $rtWLS->assetsUrl . "js/wls-sortable.js",
					'deps' => array('jquery'),
					'footer' => true
				);


				$scripts[] = array(
					'handle' => 'rt-select2',
					'src' => $rtWLS->assetsUrl . "vendor/select2/select2.min.js",
					'deps' => array('jquery'),
					'footer' => false
				);

				$scripts[] = array(
					'handle' => 'rt-wls-admin',
					'src' => $rtWLS->assetsUrl . "js/wls-admin.js",
					'deps' => array('jquery'),
					'footer' => true
				);
				$styles['rt-select2'] = $rtWLS->assetsUrl . 'vendor/select2/select2.min.css';
				$styles['rt-wls-preview'] = $rtWLS->assetsUrl . 'css/wls-preview.css';
				$styles['rt-wls-admin'] = $rtWLS->assetsUrl . 'css/wls-admin.css';
			}


			foreach( $scripts as $script )
			{
				wp_register_script( $script['handle'], $script['src'], $script['deps'], $rtWLS->options['version'], $script['footer'] );
			}
			foreach( $styles as $k => $v )
			{
				wp_register_style( $k, $v, false, $rtWLS->options['version'] );
			}

			// admin only
			if( is_admin() )
			{
				add_action('admin_menu', array($this,'admin_menu'));
			}
		}

		/**
		 *	Create admin menu for logo showcase
         */
		function admin_menu()
		{
			global $rtWLS;
			add_submenu_page( 'edit.php?post_type='.$rtWLS->post_type, __('Settings', 'wp-services-showcase'), __('Settings', 'wp-services-showcase'), 'administrator', 'wls_settings', array($this, 'rt_wls_settings') );
		}

		function rt_wls_settings(){
			global $rtWLS;
			$rtWLS->render('settings');
		}


		/**
		 *	Register text domain for WLS
         */
		public function wls_load_text_domain() {
			load_plugin_textdomain( 'wp-services-showcase', FALSE, RT_WLS_PLUGIN_LANGUAGE_PATH);
		}

		/**
		 *	Run when plugin in activated
         */
		function activate(){
			$this->insertDefaultData();
		}

		function deactivate(){
			// Not thing to now
		}

		/**
		 *	Insert some default data on plugin activation
         */
		private function insertDefaultData()
		{
			global $rtWLS;
			update_option($rtWLS->options['installed_version'],$rtWLS->options['version']);
			if(!get_option($rtWLS->options['settings'])){
				update_option( $rtWLS->options['settings'], $rtWLS->defaultSettings);
			}
		}

		/**
		 *	Include default style for front end
         */
		function enqueue_scripts(){
			wp_enqueue_style('rt-wls');
			wp_enqueue_style('rt-wls-ie');
			wp_style_add_data( 'rt-wls-ie', 'conditional', 'IE' );
		}
	}
endif;