<?php
/**
 * AjaxResponse Class
 *
 *
 * @package WP_LOGO_SHOWCASE
 * @since 1.0
 * @author RadiusTheme
 */

if(!class_exists('rtWLSAjaxResponse')):

    class rtWLSAjaxResponse
    {
        function __construct(){
            add_action(	'wp_ajax_rtWLSSettings', array($this, 'rtWLSSaveSettings'));
            add_action( 'wp_ajax_wlsShortCodeList', array($this, 'shortCodeList'));
        }

        /**
         *  Update settings option
         */
        function rtWLSSaveSettings(){
            global $rtWLS;
            $msg = null;
            $error = true;
            if($rtWLS->verifyNonce()){
                unset($_REQUEST['action']);
                unset($_REQUEST[$rtWLS->nonceId()]);
                unset($_REQUEST['_wp_http_referer']);
                $value = array();
                $fields = $rtWLS->allSettingsFields();
                foreach($fields as $field){
                    $type = $fields['type'];
                    $rValue = (!empty($_REQUEST[$field['name']]) ? $_REQUEST[$field['name']] : null);
                    if( $type == 'custom_css'){
                        $value[$field['name']] = wp_filter_nohtml_kses($rValue);
                    } else if($type == 'text' || $type == 'number' || $type == 'select' || $type == 'checkbox'|| $type == 'radio'){
                        $value[$field['name']] = sanitize_text_field($rValue);
                    } else if( $type == 'url'){
                        $value[$field['name']] = esc_url($rValue);
                    } else if( $type == 'textarea' ){
                        $value[$field['name']] = wp_kses_post($rValue);
                    } else if( $type == 'colorpicker' ){
                        $value[$field['name']] = $this->sanitize_hex_color($rValue);
                    } else {
                        $value[$field['name']] = sanitize_text_field($rValue);
                    }
                }

                update_option( $rtWLS->options['settings'], $value);
                $error = true;
                $msg =__('Settings successfully updated', 'wp-logo-showcase');
            }else{

                    $msg = __('Security Error !!', 'wp-logo-showcase');
            }
            wp_send_json( array(
                'error'=> $error,
                'msg' => $msg
            ) );
            die();
        }

        /**
         *  Short code list for editor
         */
        function shortCodeList(){
            global $rtWLS;
            $html = null;
            $scQ = new WP_Query( array('post_type' => $rtWLS->shortCodePT, 'order_by' => 'title', 'order' => 'DESC', 'post_status' => 'publish', 'posts_per_page' => -1) );
            if ( $scQ->have_posts() ) {

                $html .= "<div class='mce-container mce-form'>";
                $html .= "<div class='mce-container-body'>";
                $html .= '<label class="mce-widget mce-label" style="padding: 20px;font-weight: bold;" for="scid">'.__('Select Short code', 'wp-logo-showcase').'</label>';
                $html .= "<select name='id' id='scid' style='width: 150px;margin: 15px;'>";
                $html .= "<option value=''>".__('Default', 'wp-logo-showcase')."</option>";
                while ( $scQ->have_posts() ) {
                    $scQ->the_post();
                    $html .="<option value='".get_the_ID()."'>".get_the_title()."</option>";
                }
                $html .= "</select>";
                $html .= "</div>";
                $html .= "</div>";
            }else{
                $html .= "<div>".__('No shortcode found.','wp-logo-showcase')."</div>";
            }
            echo $html;
            die();
        }
    }

endif;