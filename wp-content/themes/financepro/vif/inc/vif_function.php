<?php
autoLoadVifFunction();
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

/**
 * Autoload files in "vif" directory
 */
function autoLoadVifFunction()
{
    include plugin_dir_path(__DIR__) . 'core' . DIRECTORY_SEPARATOR . 'vif_custom_page.php';
    autoload(RDTHEME_BASE_DIR . 'vif' . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR);
}

function autoload($dir)
{
    if ($handle = opendir($dir)) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                if (is_dir($dir . $entry)) {
                    autoload($dir . $entry . DIRECTORY_SEPARATOR);
                } else {
                    require_once $dir . $entry;
                }
            }
        }
        closedir($handle);
    }
}

function array_get($array = array(), $key = null, $default = null)
{
    return isset($array[$key]) ? $array[$key] : $default;
}