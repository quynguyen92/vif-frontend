<?php
/**
 * WLS Options Class
 *
 *
 * @package WP_LOGO_SHOWCASE
 * @since 1.0
 * @author RadiusTheme
 */

if ( ! class_exists( 'rtWLSOptions' ) ):

	class rtWLSOptions {

		/**
		 * Generate Getting field option
		 * @return array
		 */
		function rtWLSGeneralSettings() {
			global $rtWLS;
			$settings = get_option( $rtWLS->options['settings'] );

			return array(
				'image_resize' => array(
					'type'  => 'checkbox',
					'name'  => 'image_resize',
					'id'    => 'wls_image_resize',
					'label' => __( 'Enable Image Re-Size', 'wp-services-showcase' ),
					'value' => isset( $settings['image_resize'] ) ? trim( $settings['image_resize'] ) : null
				),
				'image_width'  => array(
					'type'        => 'number',
					'name'        => 'image_width',
					'id'          => "wls_image_width",
					'label'       => __( "Image Width", 'wp-services-showcase' ),
					'holderClass' => 'hidden',
					'default'     => 250,
					'holderID'    => 'wls_image_width_holder',
					'value'       => isset( $settings['image_width'] ) ? (int) ( $settings['image_width'] ) : null
				),
				'image_height' => array(
					'type'        => 'number',
					'name'        => 'image_height',
					'id'          => "wls_image_height",
					'label'       => __( "Image Height", 'wp-services-showcase' ),
					'holderClass' => 'hidden',
					'default'     => 190,
					'holderID'    => 'wls_image_height_holder',
					'value'       => isset( $settings['image_height'] ) ? (int) ( $settings['image_height'] ) : null
				),
				'image_crop'   => array(
					'type'        => 'select',
					'name'        => 'image_crop',
					'id'          => "image_crop",
					'label'       => __( "Image Crop", 'wp-services-showcase' ),
					'class'       => "rt-select2",
					'holderID'    => 'wls_image_crop_holder',
					'holderClass' => 'hidden',
					'options'     => array( false => "Soft Crop", true => "Hard Crop" ),
					'value'       => isset( $settings['image_crop'] ) ? (int) ( $settings['image_crop'] ) : null
				),
			);

		}

		/**
		 * Generate Custom css Field for setting page
		 * @return array
		 */
		function rtWLSCustomCss() {
			global $rtWLS;
			$settings = get_option( $rtWLS->options['settings'] );

			return array(
				'custom_css' => array(
					'type'        => 'custom_css',
					'name'        => 'custom_css',
					'id'          => 'custom-css',
					'holderClass' => 'full',
					'value'       => isset( $settings['custom_css'] ) ? trim( $settings['custom_css'] ) : null,
				),
			);
		}

		/**
		 * Layout array
		 *
		 * @return array
		 */
		function scLayout() {
			return array(
				'grid-layout'     => __( 'Grid Layout', 'wp-services-showcase' ),
				'carousel-layout' => __( 'Carousel Layout', 'wp-services-showcase' ),
				'isotope-layout'  => __( 'Isotope Layout', 'wp-services-showcase' ),
			);
		}

		/**
		 * Layout item list
		 *
		 * @return array
		 */
		function scLayoutItems() {
			return array(
				'title'       => __( "Title", 'wp-services-showcase' ),
				'logo'        => __( "Logo", 'wp-services-showcase' ),
				'description' => __( "Description", 'wp-services-showcase' )
			);
		}


		/**
		 * Style field
		 *
		 * @return array
		 */
		function scStyleItems() {
			$items = $this->scLayoutItems();
			unset( $items['logo'] );

			return $items;
		}

		/**
		 * Align options
		 *
		 * @return array
		 */
		function scWlsAlign() {
			return array(
				'left'   => __( "Left", 'wp-services-showcase' ),
				'center' => __( "Center", 'wp-services-showcase' ),
				'right'  => __( "Right", 'wp-services-showcase' ),
			);
		}

		/**
		 * FontSize Options
		 * @return array
		 */
		function scWlsFontSize() {

			$size = array();

			for ( $i = 14; $i <= 60; $i ++ ) {
				$size[ $i ] = "{$i} px";
			}

			return $size;
		}

		/**
		 * Order By Options
		 *
		 * @return array
		 */
		function scOrderBy() {
			return array(
				'menu_order' => __( "Menu Order", 'wp-services-showcase' ),
				'title'      => __( "Name", 'wp-services-showcase' ),
				'date'       => __( "Date", 'wp-services-showcase' ),
				'rand'       => __( "Random order", 'wp-services-showcase' ),
			);
		}

		/**
		 * Order Options
		 *
		 * @return array
		 */
		function scOrder() {
			return array(
				'ASC'  => __( "Ascending", 'wp-services-showcase' ),
				'DESC' => __( "Descending", 'wp-services-showcase' ),
			);
		}

		/**
		 * Style field options
		 *
		 * @return array
		 */
		function scStyleFields() {
			return array(
				'primary_color'          => array(
					'type'  => 'colorpicker',
					'name'  => 'wls_primary_color',
					'label' => __( 'Primary color', 'wp-services-showcase' ),
				),
				'button_bg_color'        => array(
					'type'  => 'colorpicker',
					'name'  => 'wls_button_bg_color',
					'label' => __( 'Button background color', 'wp-services-showcase' ),
				),
				'button_bg_hover_color'  => array(
					'type'  => 'colorpicker',
					'name'  => 'wls_button_bg_hover_color',
					'label' => __( 'Button background color on hover', 'wp-services-showcase' ),
				),
				'button_bg_active_color' => array(
					'type'  => 'colorpicker',
					'name'  => 'wls_button_bg_active_color',
					'label' => __( 'Button background color on active', 'wp-services-showcase' ),
				),
				'button_text_color'      => array(
					'type'  => 'colorpicker',
					'name'  => 'wls_button_text_color',
					'label' => __( 'Button text color', 'wp-services-showcase' ),
				),
				'gutter'                 => array(
					'type'        => 'number',
					'name'        => 'wls_gutter',
					'label'       => __( 'Gutter / Padding', 'wp-services-showcase' ),
					'description' => "Unit will be pixel, No need to give any unit. Only integer value will be valid.<br> Leave it blank for default"
				),
			);
		}


		/**
		 * Column Options
		 *
		 * @return array
		 */
		function scColumns() {
			return array(
				1 => __( "1 Column", 'wp-services-showcase' ),
				2 => __( "2 Column", 'wp-services-showcase' ),
				3 => __( "3 Column", 'wp-services-showcase' ),
				4 => __( "4 Column", 'wp-services-showcase' ),
				5 => __( "5 Column", 'wp-services-showcase' ),
				6 => __( "6 Column", 'wp-services-showcase' ),
			);
		}

		/**
		 * Link type options
		 *
		 * @return array
		 */
		function scLinkTypes() {
			return array(
				'new_window' => __( "Open in new window", 'wp-services-showcase' ),
				'self'       => __( "Open in same window", 'wp-services-showcase' ),
				'no_link'    => __( "No link", 'wp-services-showcase' ),
			);
		}

		/**
		 * Filter Options
		 *
		 * @return array
		 */
		function scFilterMetaFields() {
			global $rtWLS;

			return array(
				'wls_post__in'     => array(
					"name"        => "wls_post__in",
					"label"       => __( "Include only", 'wp-services-showcase' ),
					"type"        => "text",
					"class"       => "full",
					"description" => __( 'List of post IDs to show (comma-separated values, for example: 1,2,3)',
						'wp-services-showcase' )
				),
				'wls_post__not_in' => array(
					"name"        => "wls_post__not_in",
					"label"       => __( "Exclude", 'wp-services-showcase' ),
					"type"        => "text",
					"class"       => "full",
					"description" => __( 'List of post IDs to show (comma-separated values, for example: 1,2,3)',
						'wp-services-showcase' )
				),
				'wls_limit'        => array(
					"name"        => "wls_limit",
					"label"       => __( "Limit", 'wp-services-showcase' ),
					"type"        => "number",
					"class"       => "full",
					"description" => __( 'The number of posts to show. Set empty to show all found posts.',
						'wp-services-showcase' )
				),
				'wls_categories'   => array(
					"name"        => "wls_categories",
					"label"       => __( "Categories", 'wp-services-showcase' ),
					"type"        => "select",
					"class"       => "rt-select2",
					"id"          => "wls_categories",
					"multiple"    => true,
					"description" => __( 'Select the category you want to filter, Leave it blank for All category',
						'wp-services-showcase' ),
					"options"     => $rtWLS->getAllWlsCategoryList()
				),
				'wls_order_by'     => array(
					"name"    => "wls_order_by",
					"label"   => __( "Order By", 'wp-services-showcase' ),
					"type"    => "select",
					"class"   => "rt-select2",
					"default" => "date",
					"options" => $this->scOrderBy()
				),
				'wls_order'        => array(
					"name"      => "wls_order",
					"label"     => __( "Order", 'wp-services-showcase' ),
					"type"      => "radio",
					"class"     => "rt-select2",
					"options"   => $this->scOrder(),
					"default"   => "DESC",
					"alignment" => "vertical",
				),
			);
		}

		/**
		 * ShortCode Layout Options
		 *
		 * @return array
		 */
		function scLayoutMetaFields() {
			global $rtWLS;

			return array(
				'wls_layout'                  => array(
					'name'    => 'wls_layout',
					'type'    => 'select',
					'id'      => 'wls_layout',
					'label'   => __( 'Layout', 'wp-services-showcase' ),
					'class'   => 'rt-select2',
					'options' => $this->scLayout()
				),
				'wls_desktop_column'          => array(
					'name'        => 'wls_desktop_column',
					'type'        => 'select',
					'label'       => __( 'Desktop column', 'wp-services-showcase' ),
					'id'          => 'wls_desktop_column',
					"holderClass" => "wls_column_options_holder",
					'class'       => 'rt-select2',
					'default'     => 4,
					'options'     => $this->scColumns()
				),
				'wls_tab_column'              => array(
					'name'        => 'wls_tab_column',
					'type'        => 'select',
					'label'       => __( 'Tab column', 'wp-services-showcase' ),
					'id'          => 'wls_tab_column',
					"holderClass" => "wls_column_options_holder",
					'class'       => 'rt-select2',
					'default'     => 2,
					'options'     => $this->scColumns()
				),
				'wls_mobile_column'           => array(
					'name'        => 'wls_mobile_column',
					'type'        => 'select',
					'label'       => __( 'Mobile column', 'wp-services-showcase' ),
					'id'          => 'wls_mobile_column',
					"holderClass" => "wls_column_options_holder",
					'class'       => 'rt-select2',
					'default'     => 1,
					'options'     => $this->scColumns()
				),
				'wls_desktop_slider'          => array(
					'name'        => 'wls_desktop_slider',
					'type'        => 'number',
					'label'       => __( 'Desktop slider number', 'wp-services-showcase' ),
					'id'          => 'wls_desktop_slider',
					"holderClass" => "hidden wls_carousel_options_holder",
					"description" => __( 'If you want more that 6 item then set it.', 'wp-services-showcase' ),
				),
				'wls_carousel_slidesToScroll' => array(
					"name"        => "wls_carousel_slidesToScroll",
					"label"       => __( "Slides To Scroll", 'wp-services-showcase' ),
					"holderClass" => "hidden wls_carousel_options_holder",
					"type"        => "number",
					'default'     => 3,
					"description" => __( 'Number of logo to to scroll, Recommended > same as  slides to show',
						'wp-services-showcase' ),
				),
				'wls_carousel_speed'          => array(
					"name"        => "wls_carousel_speed",
					"label"       => __( "Speed", 'wp-services-showcase' ),
					"holderClass" => "hidden wls_carousel_options_holder",
					"type"        => "number",
					'default'     => 2000,
					"description" => __( 'Auto play Speed in milliseconds', 'wp-services-showcase' ),
				),
				'wls_carousel_options'        => array(
					"name"        => "wls_carousel_options",
					"label"       => __( "Carousel Options", 'wp-services-showcase' ),
					"holderClass" => "hidden wls_carousel_options_holder",
					"type"        => "checkbox",
					"multiple"    => true,
					"alignment"   => "vertical",
					"options"     => $rtWLS->carouselProperty(),
					"default"     => array( 'autoplay', 'arrows', 'dots', 'responsive', 'infinite' ),
				),
				'wls_tooltip'                 => array(
					'name'   => 'wls_tooltip',
					'type'   => 'checkbox',
					'label'  => __( 'ToolTip', 'wp-services-showcase' ),
					'option' => 'Enable',
					'id'     => 'wls_tooltip'
				),
				'wls_box_highlight'           => array(
					'name'   => 'wls_box_highlight',
					'type'   => 'checkbox',
					'label'  => __( 'Box Highlight', 'wp-services-showcase' ),
					'option' => 'Enable',
					'id'     => 'wls_box_highlight'
				),
				'wls_grayscale'               => array(
					'name'   => 'wls_grayscale',
					'type'   => 'checkbox',
					'label'  => __( 'Grayscale', 'wp-services-showcase' ),
					'option' => 'Enable',
					'id'     => 'wls_grayscale'
				),
				'wls_link_type'               => array(
					'name'    => 'wls_link_type',
					'type'    => 'select',
					'label'   => __( 'Link Type', 'wp-services-showcase' ),
					'id'      => 'wls_link_type',
					'class'   => 'rt-select2',
					'options' => $this->scLinkTypes()
				)
			);
		}


		/**
		 * Carousel Property
		 *
		 * @return array
		 */
		function carouselProperty() {
			return array(
				'autoplay'       => __( 'Auto Play', 'wp-services-showcase' ),
				'arrows'         => __( 'Arrow nav button', 'wp-services-showcase' ),
				'dots'           => __( 'Dots', 'wp-services-showcase' ),
				'pauseOnHover'   => __( 'Pause on hover', 'wp-services-showcase' ),
				'adaptiveHeight' => __( 'Adaptive height', 'wp-services-showcase' ),
				'lazyLoad'       => __( 'Lazy Load (progressive)', 'wp-services-showcase' ),
				'infinite'       => __( 'Infinite loop', 'wp-services-showcase' ),
				'centerMode'     => __( 'Center mode', 'wp-services-showcase' ),
				'rtl'            => __( 'Right to Left', 'wp-services-showcase' )
			);
		}

		/**
		 * Custom Meta field for logo post type
		 *
		 * @return array
		 */
		function rtLogoMetaFields() {
			return array(
				'site_url'         => array(
					'type'        => 'url',
					'name'        => '_wls_site_url',
					'label'       => __( 'Client website URL', 'wp-logo-showcase' ),
					'placeholder' => __( "Client URL e.g: http://example.com", 'wp-logo-showcase' ),
					'description' => "Link to open when image is clicked (if links are active)"
				),
				'logo_description' => array(
					'type'        => 'textarea',
					'name'        => '_wls_logo_description',
					'class'       => 'rt-textarea',
					'esc_html'    => true,
					'label'       => __( 'Logo Description', 'wp-logo-showcase' ),
					'placeholder' => __( "Logo description", 'wp-services-showcase' )
				),
				'logo_img_url'     => array(
					'type'        => 'url',
					'name'        => '_wls_logo_img_url',
					'label'       => __( 'Custom Image URL', 'wp-logo-showcase' ),
					'placeholder' => __( "This will dominate over featured image", 'wp-services-showcase' ),
					'description' => __( "If you don't want to use an image from your media gallery, you can set an URL for your image here.",
						'wp-services-showcase' )
				),
				'logo_alt_text'    => array(
					'type'        => 'text',
					'name'        => '_wls_logo_alt_text',
					'label'       => __( 'Alternate Text', 'wp-logo-showcase' ),
					'placeholder' => __( "Alt for url and image", 'wp-services-showcase' )
				),
			);
		}
	}

endif;
