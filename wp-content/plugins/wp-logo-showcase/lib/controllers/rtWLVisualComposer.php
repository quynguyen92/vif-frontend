<?php
/**
 * Helper Visual Composer compatibility Class
 *
 * This will generate the meta field for ShortCode generator post type
 *
 * @package WP_LOGO_SHOWCASE
 * @since 1.0
 * @author RadiusTheme
 */

if(!class_exists('rtWLVisualComposer')):

    class rtWLVisualComposer{

        function __construct() {
            add_action( 'vc_before_init', array(&$this,'wls_VC_initial') );
        }

        /**
         *  Add the functionality for visual composer
         */
        function wls_VC_initial(){
            global $rtWLS;
            vc_map( array(
                "name" => __("Logo Showcase", "wp-logo-showcase"),
                "base" => "logo-showcase",
                "icon"  => $rtWLS->assetsUrl .'images/icon-vc.png',
                "category" => __( "Content", "wp-logo-showcase"),
                "params" => array(
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "wpls-vc-wrapper",
                        'admin_label' => true,
                        "heading" => __("Select a shortcode" , "wp-logo-showcase"),
                        "param_name" => "id",
                        "value" => $rtWLS->getWlsShortCodeListForVC(),
                        "description" => __("Select a shortcode for displaying logo showcase", "wp-logo-showcase")
                    )
                )
            ) );
        }

    }

endif;