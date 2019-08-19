<?php
if ( ! class_exists( 'rtWLS' ) ) {

	class rtWLS {
		public $options;
		public $post_type;
		public $shortCodePT;
		public $taxonomy;
		public $assetsUrl;

		function __construct() {

			$this->options         = array(
				'settings'          => 'rt_wls_settings',
				'version'           => RT_WLS_PLUGIN_VERSION,
				'installed_version' => 'rt_wls_current_version'
			);
			$this->defaultSettings = array(
				'custom_css' => null
			);

			$this->post_type       = "wlshowcase";
			$this->shortCodePT     = $this->post_type . "sc";
			$this->taxonomy        = array(
				'category' => $this->post_type . '_category'
			);
			$this->libPath         = dirname( __FILE__ );
			$this->modelsPath      = $this->libPath . '/models/';
			$this->controllersPath = $this->libPath . '/controllers/';
			$this->widgetsPath     = $this->libPath . '/widgets/';
			$this->viewsPath       = $this->libPath . '/views/';
			$this->assetsUrl       = RT_WLS_PLUGIN_URL . '/assets/';

			$this->rtLoadModel( $this->modelsPath );
			$this->rtLoadController( $this->controllersPath );

		}

		/**
		 * Load Model class
		 *
		 * @param $dir
		 */
		function rtLoadModel( $dir ) {
			if ( ! file_exists( $dir ) ) {
				return;
			}
			foreach ( scandir( $dir ) as $item ) {
				if ( preg_match( "/.php$/i", $item ) ) {
					require_once( $dir . $item );
				}
			}
		}

		/**
		 * Load all Controller class
		 *
		 * @param $dir
		 */
		function rtLoadController( $dir ) {
			if ( ! file_exists( $dir ) ) {
				return;
			}
			$classes = array();
			foreach ( scandir( $dir ) as $item ) {
				if ( preg_match( "/.php$/i", $item ) ) {
					require_once( $dir . $item );
					$className = str_replace( ".php", "", $item );
					$classes[] = new $className;
				}
			}
			if ( $classes ) {
				foreach ( $classes as $class ) {
					$this->objects[] = $class;
				}
			}
		}

		/**
		 * Load all widget class
		 *
		 * @param $dir
		 */
		function loadWidget( $dir ) {
			if ( ! file_exists( $dir ) ) {
				return;
			}
			foreach ( scandir( $dir ) as $item ) {
				if ( preg_match( "/.php$/i", $item ) ) {
					require_once( $dir . $item );
					$class = str_replace( ".php", "", $item );
					if ( method_exists( $class, 'register_widget' ) ) {
						$caller = new $class;
						$caller->register_widget();
					} else {
						register_widget( $class );
					}
				}
			}
		}

		function render( $viewName, $args = array(), $return = false ) {
			global $rtWLS;
			$path     = str_replace( ".", "/", $viewName );
			$viewPath = $rtWLS->viewsPath . $path . '.php';
			if ( ! file_exists( $viewPath ) ) {
				return;
			}
			if ( $args ) {
				extract( $args );
			}
			if ( $return ) {
				ob_start();
				include $viewPath;

				return ob_get_clean();
			}
			include $viewPath;
		}


		/**
		 * Dynamically call any  method from models class
		 * by pluginFramework instance
		 */
		function __call( $name, $args ) {
			if ( ! is_array( $this->objects ) ) {
				return;
			}
			foreach ( $this->objects as $object ) {
				if ( method_exists( $object, $name ) ) {
					$count = count( $args );
					if ( $count == 0 ) {
						return $object->$name();
					} elseif ( $count == 1 ) {
						return $object->$name( $args[0] );
					} elseif ( $count == 2 ) {
						return $object->$name( $args[0], $args[1] );
					} elseif ( $count == 3 ) {
						return $object->$name( $args[0], $args[1], $args[2] );
					} elseif ( $count == 4 ) {
						return $object->$name( $args[0], $args[1], $args[2], $args[3] );
					} elseif ( $count == 5 ) {
						return $object->$name( $args[0], $args[1], $args[2], $args[3], $args[4] );
					} elseif ( $count == 6 ) {
						return $object->$name( $args[0], $args[1], $args[2], $args[3], $args[4], $args[5] );
					}
				}
			}
		}
	}

	global $rtWLS;
	if ( ! is_object( $rtWLS ) ) {
		$rtWLS = new rtWLS;
	}
}
