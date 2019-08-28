<?php
require_once RDTHEME_BASE_DIR . 'vif/inc/vif_post_list.php';
require_once RDTHEME_BASE_DIR . 'vif/inc/vif_pricing_box.php';
require_once RDTHEME_BASE_DIR . 'vif/inc/vif_pricing_2box.php';
require_once RDTHEME_BASE_DIR . 'vif/inc/vif_chart.php';
require_once RDTHEME_BASE_DIR . 'vif/inc/vif_about.php';

if (!function_exists('remoteApi')) {
    /**
     * @param $url
     * @param array $params
     * @return array|bool|mixed|object
     */
    function remoteApi($url, $params = array())
    {
        $url = ltrim($url, '\\/');
        $curlSettings = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 2,
            CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
            CURLOPT_PROTOCOLS => CURLPROTO_HTTP | CURLPROTO_HTTPS,
            CURLOPT_CONNECTTIMEOUT => 60,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POSTREDIR => CURL_REDIR_POST_ALL,
            CURLOPT_CUSTOMREQUEST => 'GET'
        );

        $curl = curl_init($url);
        curl_setopt_array($curl, $curlSettings);
        $response = curl_exec($curl);

        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($status != 200) {
            return false;
        }

        curl_close($curl);

        return json_decode($response);
    }
}