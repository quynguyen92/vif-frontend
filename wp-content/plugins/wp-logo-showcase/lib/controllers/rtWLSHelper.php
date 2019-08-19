<?php
/**
 * Helper Class
 *
 *
 * @package WP_LOGO_SHOWCASE
 * @since 1.0
 * @author RadiusTheme
 */

if(!class_exists('rtWLSHelper')):

    class rtWLSHelper
    {
        /**
         * Nonce verify upon activity
         * @return bool
         */
        function verifyNonce(){
            global $rtWLS;
            $nonce      = isset($_REQUEST[$this->nonceId()]) ? $_REQUEST[$this->nonceId()] : null;
            $nonceText  = $rtWLS->nonceText();
            if( !wp_verify_nonce( $nonce, $nonceText ) ) return false;
            return true;
        }

        /**
         * Generate nonce text
         * @return string
         */
        function nonceText(){
            return "rt_wls_nonce_secret";
        }

        /**
         * Nonce Id generation
         *
         * @return string
         */
        function nonceId(){
            return "rt_wls_nonce";
        }

        /**
         * Generate meta field name array()
         *
         * @return array
         */
        function rtLogoMetaNames(){
            global $rtWLS;
            $fields = array();
            $fieldsA = $rtWLS->rtLogoMetaFields();
            foreach($fieldsA as $field){
                $fields[] = $field;
            }
            return $fields;
        }

        /**
         *
         * Call the Image resize model for resize function
         *
         * @param $url
         * @param null $width
         * @param null $height
         * @param null $crop
         * @param bool|true $single
         * @param bool|false $upscale
         * @return array|bool|string
         * @throws Exception
         * @throws Rt_Exception
         */
        function rtImageReSize($url, $width = null, $height = null, $crop = null, $single = true, $upscale = false){
                $rtResize = new rtWLSResizer();
                return $rtResize->process( $url, $width, $height, $crop, $single, $upscale );
        }

        /**
         * Generate ShortCode List for Visual Composer
         * @return array
         */
        function getWlsShortCodeListForVC(){
            global $rtWLS;
            $scList = array();
            $scListQ = get_posts( array(
                'post_type' => $rtWLS->shortCodePT,
                'order_by' => 'title',
                'order' => 'DESC',
                'post_status' => 'publish',
                'posts_per_page' => -1) );
            if ( !empty($scListQ) ) {
                foreach ($scListQ as $sc ) {
                    $scList[$sc->post_title] = $sc->ID;
                }
            }

            return $scList;

        }

        /**
         * Generate ShortCode List
         * @return array
         */
        function getWlsShortCodeList(){
            global $rtWLS;
            $scList = array();
            $scListQ = get_posts( array(
                'post_type' => $rtWLS->shortCodePT,
                'order_by' => 'title',
                'order' => 'DESC',
                'post_status' => 'publish',
                'posts_per_page' => -1) );
            if ( !empty($scListQ) ) {
                foreach ($scListQ as $sc ) {
                    $scList[$sc->ID] = $sc->post_title;
                }
            }

            return $scList;

        }


        /**
         * Generate MetaField Name list for shortCode Page
         *
         * @return array
         */
        function wlsScMetaNames(){
            global $rtWLS;
            $fields = array();
            $fieldsA = array_merge($rtWLS->scLayoutMetaFields(), $rtWLS->scFilterMetaFields(), $rtWLS->scStyleFields());
            foreach($fieldsA as $field){
                $fields[] = $field;
            }
            array_push($fields, array('name' =>'_wls_items', 'type'=>"checkbox", "multiple"  => true ));
            return $fields;
        }

        function rtFieldGenerator($fields = array(), $multi = false){
            $html = null;
            if(is_array($fields) && !empty($fields)) {
                $rtField = new rtWLSField();
                if ($multi) {
                    foreach ($fields as $field) {
                        $html .= $rtField->Field($field);
                    }
                } else {
                    $html .= $rtField->Field($fields);
                }
            }

            return $html;
        }

        /**
         * Sanitize field value
         * @param array $field
         * @param null $value
         * @return array|null
         * @internal param $value
         */
        function sanitize($field = array(), $value = null){
            $newValue = null;
            if (is_array($field)) {
                $type = (!empty($field['type']) ? $field['type'] : 'text');
                if (empty($field['multiple'])) {

                    if ( $type == 'text' || $type == 'number' || $type == 'select' || $type == 'checkbox'|| $type == 'radio') {
                        $newValue = sanitize_text_field($value);
                    } else if( $type == 'url'){
                        $newValue = esc_url($value);
                    } else if( $type == 'textarea' ){
                        $newValue = wp_kses_post($value);
                    } else if( $type == 'colorpicker' ){
                        $newValue = $this->sanitize_hex_color($value);
                    } else {
                        $newValue = sanitize_text_field($value);
                    }

                }else{
                    $newValue = array();
                    if(!empty($value)){
                        if(is_array($value)){
                            foreach($value as $val){
                                $newValue[] = sanitize_text_field($val);
                            }
                        }else{
                            $newValue[] = sanitize_text_field($value);
                        }
                    }
                }
            }
            return $newValue;
        }

        function sanitize_hex_color( $color ) {
            if ( '' === $color )
                return '';

            // 3 or 6 hex digits, or the empty string.
            if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
                return $color;
        }


        /**
         * Get the Logo list from the custom post type
         *
         * @return array
         */
        function getLogoList(){
            global $rtWLS;
            $logos = array();
            $logosA = get_posts( array(
                'post_type' => $rtWLS->post_type,
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => 'title',
                'order' => 'ASC'
            ) );
            if ( !empty($logosA) ) {
                foreach($logosA as $logo){
                    $logos[$logo->ID] = $logo->post_title;
                }
            }

            return $logos;
        }

        /**
         *  Get all Category list
         * @return array
         */
        function getAllWlsCategoryList(){
            global $rtWLS;
            $terms = array();
            $tList = get_terms( array($rtWLS->taxonomy['category']), array('hide_empty' => 0));
            if(is_array($tList) && !empty($tList) && empty($tList['errors'])){
                foreach($tList as $term){
                    $terms[$term->term_id] =$term->name;
                }
            }
            return $terms;
        }

        function allSettingsFields(){
            $fields = array();
            global $rtWLS;
            $fields = array_merge($rtWLS->rtWLSGeneralSettings(),$rtWLS->rtWLSCustomCss());
            return $fields;
        }
    }

endif;