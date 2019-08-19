<?php
/**
 * WLS Preview Class
 *
 * This will generate the layout preview when user like to change the property to generate the shortCode
 *
 * @package WP_LOGO_SHOWCASE
 * @since 1.0
 * @author RadiusTheme
 */

if ( ! class_exists( 'rtWLSPreview' ) ):

	class rtWLSPreview {
		function __construct() {
			add_action( 'wp_ajax_loadWlsPreview', array( $this, 'loadWlsPreview' ) );
		}

		/**
		 * Preview rendering
		 *
		 */
		function loadWlsPreview() {
			global $rtWLS;
			$msg   = $data = null;
			$error = true;
			if ( $rtWLS->verifyNonce() ) {
				$error  = false;
				$scMeta = $_REQUEST;
				$layout = ( isset( $_REQUEST['wls_layout'] ) ? $_REQUEST['wls_layout'] : 'grid-layout' );
				if ( ! in_array( $layout, array_keys( $rtWLS->scLayout() ) ) ) {
					$layout = 'grid-layout';
				}

				$isIsotope  = preg_match( '/isotope/', $layout );
				$isCarousel = preg_match( '/carousel/', $layout );

				$col       = ( isset( $_REQUEST['wls_column'] ) ? intval( $_REQUEST['wls_column'] ) : 4 );
				$colDesk   = ( isset( $scMeta['wls_desktop_column'] ) ? intval( $scMeta['wls_desktop_column'] ) : 4 );
				$colDeskSlider   = isset( $scMeta['wls_desktop_slider'] ) ? intval( $scMeta['wls_desktop_slider'] ) : null ;
				$colTab    = ( isset( $scMeta['wls_tab_column'] ) ? intval( $scMeta['wls_tab_column'] ) : 2 );
				$colMobile = ( isset( $scMeta['wls_mobile_column'] ) ? intval( $scMeta['wls_mobile_column'] ) : 1 );
				if ( ! in_array( $col, array_keys( $rtWLS->scColumns() ) ) ) {
					$col = 4;
				}
				if ( ! in_array( $colDesk, array_keys( $rtWLS->scColumns() ) ) ) {
					$colDesk = 4;
				}
				if ( ! in_array( $colTab, array_keys( $rtWLS->scColumns() ) ) ) {
					$colTab = 2;
				}
				if ( ! in_array( $colMobile, array_keys( $rtWLS->scColumns() ) ) ) {
					$colMobile = 1;
				}
				$arg['linkType'] = ( isset( $_REQUEST['wls_link_type'] ) ? $_REQUEST['wls_link_type'] : "new_window" );


				/* Argument create */
				$args              = array();
				$itemIdsArgs       = array();
				$args['post_type'] = $rtWLS->post_type;

				// Common filter
				/* post__in */
				$post__in = ( isset( $_REQUEST['wls_post__in'] ) ? $_REQUEST['wls_post__in'] : null );
				if ( $post__in ) {
					$post__in         = explode( ',', $post__in );
					$args['post__in'] = $post__in;
				}
				/* post__not_in */
				$post__not_in = ( isset( $_REQUEST['wls_post__not_in'] ) ? $_REQUEST['wls_post__not_in'] : null );
				if ( $post__not_in ) {
					$post__not_in         = explode( ',', $post__not_in );
					$args['post__not_in'] = $post__not_in;
				}

				/* LIMIT */
				$limit                  = ( ! empty( $scMeta['wls_limit'][0] ) ? ( $scMeta['wls_limit'][0] === '-1' ? 10000000 : (int) $scMeta['wls_limit'][0] ) : 10000000 );
				$args['posts_per_page'] = $limit;

				// Taxonomy
				$taxQ = array();
				$cats = ( ! empty( $_REQUEST['wls_categories'] ) ? $_REQUEST['wls_categories'] : array() );
				if ( ! empty( $cats ) ) {
					$taxQ[] = array(
						'taxonomy' => $rtWLS->taxonomy['category'],
						'field'    => 'term_id',
						'terms'    => $cats
					);
				}

				if ( ! empty( $taxQ ) ) {
					$args['tax_query'] = $itemIdsArgs['tax_query'] = $taxQ;
				}

				// Order
				$order_by = ( ! empty( $_REQUEST['wls_order_by'] ) ? $_REQUEST['wls_order_by'] : null );
				$order    = ( ! empty( $_REQUEST['wls_order'] ) ? $_REQUEST['wls_order'] : null );
				if ( $order ) {
					$args['order'] = $order;
				}
				if ( $order_by ) {
					$args['orderby'] = $order_by;
				}

				$containerDataAttr = " data-desktop-col='{$colDesk}'  data-tab-col='{$colTab}'  data-mobile-col='{$colMobile}'";
				$deskItem          = $colDesk;
				$tabItem           = $colTab;
				$mobileItem        = $colMobile;
				$colDesk           = $colDesk == 5 ? '24' : round( 12 / $colDesk );
				$colTab            = $colTab == 5 ? '24' : round( 12 / $colTab );
				$colMobile         = $colMobile == 5 ? '24' : round( 12 / $colMobile );
				if ( $isCarousel ) {
					//$colDesk = $colTab = $colMobile = 12;
				}
				$arg['grid']       = "rt-col-md-{$colDesk} rt-col-sm-{$colTab} rt-col-xs-{$colMobile}";
				$arg['class']      = 'equal-height';
				$arg['styleClass'] = null;
				if ( ! empty( $_REQUEST['wls_tooltip'] ) ) {
					$arg['styleClass'] .= ' wls-tooltip';
				}
				if ( ! empty( $_REQUEST['wls_box_highlight'] ) ) {
					$arg['styleClass'] .= ' wls-boxhighlight';
				}

				if ( ! empty( $_REQUEST['wls_grayscale'] ) ) {
					$arg['styleClass'] .= ' wls-grayscale';
				}

				if ( $isIsotope ) {
					$arg['class'] .= ' isotope-item';
				}

				$arg['items'] = ! empty( $_REQUEST['_wls_items'] ) ? $_REQUEST['_wls_items'] : array();

				$logoQuery = new WP_Query( $args );
				if ( $logoQuery->have_posts() ) {
					$data      .= $this->layoutStyle( $_REQUEST );
					$settings  = get_option( $rtWLS->options['settings'] );
					$imgReSize = ( ! empty( $settings['image_resize'] ) ? true : false );
					$imgSize   = array();
					if ( $imgReSize ) {
						$imgSize['width']  = isset( $settings['image_width'] ) ? (int) ( $settings['image_width'] ) : 180;
						$imgSize['height'] = isset( $settings['image_height'] ) ? (int) ( $settings['image_height'] ) : 90;
						$imgSize['crop']   = isset( $settings['image_crop'] ) ? ( $settings['image_crop'] ? true : false ) : false;
					}
					if ( $isIsotope ) {
						$terms = get_terms( $rtWLS->taxonomy['category'], array(
							'hide_empty' => true,
						) );
						$data  .= '<div id="wls-iso-button" class="button-group filter-button-group option-set">
											<button data-filter="*" class="selected">' . __( 'Show all',
								'wp-logo-showcase' ) . '</button>';
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
							foreach ( $terms as $term ) {
								if ( empty( $cats ) ) {
									$data .= "<button data-filter='.{$term->slug}'>" . $term->name . "</button>";
								} else {
									if ( in_array( $term->term_id, $cats ) ) {
										$data .= "<button data-filter='.{$term->slug}'>" . $term->name . "</button>";
									}
								}
							}
						}
						$data .= '</div>';

						$data .= '<div class="wls-isotope" id="wls-isotope">';
					}
					$carouselDir = null;
					if ( $isCarousel ) {
						$slidesToShow   = ( ! empty( $_REQUEST['wls_carousel_slidesToShow'] ) ? (int) $_REQUEST['wls_carousel_slidesToShow'] : 3 );
						$slidesToScroll = ( ! empty( $_REQUEST['wls_carousel_slidesToScroll'] ) ? (int) $_REQUEST['wls_carousel_slidesToScroll'] : 3 );
						$speed          = ( ! empty( $_REQUEST['wls_carousel_speed'] ) ? (int) $_REQUEST['wls_carousel_speed'] : 2000 );
						$options        = array();
						if ( ! empty( $_REQUEST['wls_carousel_options'] ) && is_array( $_REQUEST['wls_carousel_options'] ) ) {
							$options = $_REQUEST['wls_carousel_options'];
						}
						$deskItem = $colDeskSlider ? $colDeskSlider : $deskItem;
						$carouselAttribute = "data-slick='{
                                \"slidesToShow\": {$deskItem},
		                        \"slidesToShowTab\": {$tabItem},
		                        \"slidesToShowMobile\": {$mobileItem},
                                \"slidesToScroll\": {$slidesToScroll},
                                \"speed\": {$speed},
                                \"dots\": " . ( in_array( 'dots', $options ) ? 'true' : 'false' ) . ",
                                \"arrows\": " . ( in_array( 'arrows', $options ) ? 'true' : 'false' ) . ",
                                \"infinite\": " . ( in_array( 'infinite', $options ) ? 'true' : 'false' ) . ",
                                \"lazyLoad\": " . ( in_array( 'lazyLoad',
								$options ) ? '"progressive"' : '"ondemand"' ) . ",
                                \"pauseOnHover\": " . ( in_array( 'pauseOnHover', $options ) ? 'true' : 'false' ) . ",
                                \"autoplay\": " . ( in_array( 'autoplay', $options ) ? 'true' : 'false' ) . ",
                                \"centerMode\": " . ( in_array( 'centerMode', $options ) ? 'true' : 'false' ) . ",
                                \"adaptiveHeight\": " . ( in_array( 'adaptiveHeight', $options ) ? 'true' : 'false' ) . ",
                                \"rtl\": " . ( in_array( 'rtl', $options ) ? 'true' : 'false' ) . "
                                }'";
						$carouselDir       = ( in_array( 'rtl', $options ) ? ' dir="rtl"' : null );
						$data              .= "<div id='wpls-carousel' {$carouselAttribute} {$carouselDir}>";
					}
					while ( $logoQuery->have_posts() ) : $logoQuery->the_post();
						/* Argument for single member */
						$arg['pID']         = $pID = get_the_ID();
						$arg['title']       = get_the_title();
						$arg['url']         = get_post_meta( $pID, '_wls_site_url', true );
						$arg['description'] = get_post_meta( $pID, '_wls_logo_description', true );
						$arg['alt_text']    = get_post_meta( $pID, '_wls_logo_alt_text', true );
						$arg['img_src']     = get_post_meta( $pID, '_wls_logo_img_url', true );
						if ( empty( $arg['img_src'] ) ) {
							if ( has_post_thumbnail() ) {
								$img            = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
								$arg['img_src'] = $img[0];
								if ( $imgReSize && ! empty( $imgSize ) ) {
									$c       = ( ! empty( $imgSize['crop'] ) ? true : false );
									$cropImg = $rtWLS->rtImageReSize( $img[0], $imgSize['width'], $imgSize['height'],
										$c );
									if ( $cropImg ) {
										$arg['img_src'] = $cropImg;
									}
								}
							}
						}
						if ( ! empty( $arg['img_src'] ) ) {
							$data .= $rtWLS->render( 'layouts/' . $layout, $arg, true );
						}
					endwhile;
					wp_reset_postdata();

					if ( $isIsotope || $isCarousel ) {
						$data .= "</div>";
					}

					$data .= "<script>(function($){wlsLoadLayout()})(jQuery);</script>";
				}


			} else {
				$msg = __( 'Security Error !!', 'wp-services-showcase' );
			}

			wp_send_json( array(
				'error' => $error,
				'msg'   => $msg,
				'data'  => $data
			) );
			die();

		}

		/**
		 * Will add the inline css
		 *
		 * @param $scMeta
		 *
		 * @return null|string
		 */
		function layoutStyle( $scMeta ) {
			$css = null;
			$css .= "<style>";
			if ( ! empty( $scMeta['wls_primary_color'][0] ) ) {
				$css .= ".single-logo.wls-tooltip .rt-tooltip, .single-logo.wls-tooltip .rt-tooltip-bottom:after{";
				$css .= "background-color : {$scMeta['wls_primary_color']};";
				$css .= "}";
			}
			if ( ! empty( $scMeta['wls_button_bg_color'] ) ) {
				$css .= "#wls-sc-preview .filter-button-group button{";
				$css .= "background-color : {$scMeta['wls_button_bg_color']}";
				$css .= "}";

				$css .= "#wls-sc-preview .slick-prev:before,#wls-sc-preview .slick-next:before, #wls-sc-preview .slick-dots li button:before{";
				$css .= "color : {$scMeta['wls_button_bg_color']}";
				$css .= "}";
			}
			if ( ! empty( $scMeta['wls_button_bg_hover_color'] ) ) {
				$css .= "#wls-sc-preview .filter-button-group button:hover, #wls-sc-preview .owl-theme .owl-controls .owl-buttons div:hover{";
				$css .= "background-color : {$scMeta['wls_button_bg_hover_color']};";
				$css .= "}";
				$css .= "#wls-sc-preview .slick-prev:hover:before, #wls-sc-preview .slick-next:hover:before, #wls-sc-preview .slick-dots li button:hover:before{";
				$css .= "color : {$scMeta['wls_button_bg_hover_color']}";
				$css .= "}";
			}
			if ( ! empty( $scMeta['wls_button_bg_active_color'] ) ) {
				$css .= "#wls-sc-preview .filter-button-group button.selected,#wls-sc-preview .owl-theme .owl-controls .owl-page.active span{";
				$css .= "background-color : {$scMeta['wls_button_bg_active_color']};";
				$css .= "}";
				$css .= "#wls-sc-preview .slick-dots li.slick-active button:before{";
				$css .= "color : {$scMeta['wls_button_bg_active_color']}";
				$css .= "}";
			}
			if ( ! empty( $scMeta['wls_button_text_color'] ) ) {
				$css .= "#wls-sc-preview .filter-button-group button,#wls-sc-preview .owl-theme .owl-controls .owl-buttons div{";
				$css .= "color : {$scMeta['wls_button_text_color']};";
				$css .= "}";
				$css .= "#wls-sc-preview .slick-prev:before, #wls-sc-preview .slick-next:before {";
				$css .= "background-color : {$scMeta['wls_button_text_color']}";
				$css .= "}";
			}
			if ( ! empty( $scMeta['_wls_style_title'] ) ) {
				$css .= "#wls-sc-preview .single-logo h2,#wls-sc-preview .single-logo h2 a{";
				if ( ! empty( $scMeta['_wls_style_title']['align'] ) ) {
					$css .= "text-align : {$scMeta['_wls_style_title']['align']};";
				}
				if ( ! empty( $scMeta['_wls_style_title']['color'] ) ) {
					$css .= "color : {$scMeta['_wls_style_title']['color']};";
				}
				if ( ! empty( $scMeta['_wls_style_title']['size'] ) ) {
					$css .= "font-size : {$scMeta['_wls_style_title']['size']}px;";
				}
				$css .= "}";

			}
			if ( ! empty( $scMeta['_wls_style_description'] ) ) {
				$css .= "#wls-sc-preview .single-logo .logo-description *{";
				if ( ! empty( $scMeta['_wls_style_description']['align'] ) ) {
					$css .= "text-align : {$scMeta['_wls_style_description']['align']};";
				}
				if ( ! empty( $scMeta['_wls_style_description']['color'] ) ) {
					$css .= "color : {$scMeta['_wls_style_description']['color']};";
				}
				if ( ! empty( $scMeta['_wls_style_description']['size'] ) ) {
					$css .= "font-size : {$scMeta['_wls_style_description']['size']}px;";
				}
				$css .= "}";

			}

			/* gutter */
			if ( ! empty( $scMeta['wls_gutter'] ) && $gutter = absint( $scMeta['wls_gutter'] ) ) {
				$css .= "#wls-sc-preview [class*='rt-col-'] {";
				$css .= "padding-left : {$gutter}px;";
				$css .= "padding-right : {$gutter}px;";
				$css .= "}";
				$css .= "#wls-sc-preview .rt-row{";
				$css .= "margin-left : -{$gutter}px;";
				$css .= "margin-right : -{$gutter}px;";
				$css .= "}";
			}

			$css .= "</style>";

			return $css;
		}
	}
endif;