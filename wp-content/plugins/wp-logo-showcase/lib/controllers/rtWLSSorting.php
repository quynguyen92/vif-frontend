<?php
/**
 * Sorting Class
 *
 * Drag and drop sorting up on menu order
 *
 * @package WP_LOGO_SHOWCASE
 * @since 1.0
 * @author RadiusTheme
 */

if(!class_exists('rtWLSSorting')){

    class rtWLSSorting{

        function __construct() {
            add_action('admin_init', array($this, 'refresh'));
            add_action('wp_ajax_wls-logo-update-menu-order', array($this, 'wls_logo_update_menu_order'));
            add_action('pre_get_posts', array($this, 'wls_pre_get_posts'));
        }


        /**
         * pre_get_posts Query update for $rtWLS->post_type
         * @param $wp_query
         */
        function wls_pre_get_posts($wp_query) {
            global $rtWLS;
            if (is_admin()) {
                if (isset($wp_query->query['post_type']) && !isset($_GET['orderby']) && $wp_query->query['post_type'] == $rtWLS->post_type && $wp_query->is_main_query()) {
                    $wp_query->set('orderby', 'menu_order');
                    $wp_query->set('order', 'ASC');
                }
            }
        }


        /**
         * Update menu order for $rtWLS->post_type
         * @return bool
         */
        function wls_logo_update_menu_order() {
            global $wpdb;
            $data = (!empty($_POST['post']) ? $_POST['post'] : array());
            if (!is_array($data))
                return false;

            $id_arr = array();
            foreach ($data as $position => $id) {
                    $id_arr[] = $id;
            }

            $menu_order_arr = array();
            foreach ($id_arr as $key => $id) {
                $results = $wpdb->get_results("SELECT menu_order FROM $wpdb->posts WHERE ID = " . intval($id));
                foreach ($results as $result) {
                    $menu_order_arr[] = $result->menu_order;
                }
            }


            sort($menu_order_arr);

            foreach ($data as $position => $id) {
                    $wpdb->update($wpdb->posts, array('menu_order' => $menu_order_arr[$position]), array('ID' => intval($id)));
            }

            die();
        }


        /**
         * Refresh database for  $rtWLS->post_type
         *
         */
        function refresh() {
            global $wpdb, $rtWLS;
            $results = $wpdb->get_results("
            SELECT ID
            FROM $wpdb->posts
            WHERE post_type = '" . $rtWLS->post_type . "' AND post_status IN ('publish', 'pending', 'draft', 'private', 'future')
            ORDER BY menu_order ASC
        ");
            foreach ($results as $key => $result) {
                $wpdb->update($wpdb->posts, array('menu_order' => $key + 1), array('ID' => $result->ID));
            }
        }

    }

}