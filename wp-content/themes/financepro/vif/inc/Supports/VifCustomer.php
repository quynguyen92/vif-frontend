<?php

/**
 * Class VifCustomer
 */
class VifCustomer
{
    protected $_token = null;

    protected $_oauthUrl = 'http://54.255.145.206:8080/oauth/token';

    protected $_customerNavUrl = 'http://54.255.145.206:8080/dashboard/get-nav-report';

    public function setToken($token)
    {
        $this->_token = $token;
    }

    public function getToken()
    {
        return $this->_token;
    }

    public function getOAuthUrl()
    {
        return $this->_oauthUrl;
    }

    public function getCustomerNavUrl()
    {
        return $this->_customerNavUrl;
    }

    /**
     * @param $url
     * @param array $params
     * @param string $method
     * @return array|bool|mixed|object
     */
    public function remoteApi($url, $params = array(), $method = 'POST')
    {
        $url = ltrim($url, '\\/');
        $curlSettings = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 2,
            CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
            CURLOPT_PROTOCOLS => CURLPROTO_HTTP | CURLPROTO_HTTPS,
            CURLOPT_REDIR_PROTOCOLS => CURLPROTO_HTTP | CURLPROTO_HTTPS,
            CURLOPT_CONNECTTIMEOUT => 60,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POSTREDIR => CURL_REDIR_POST_ALL,
            CURLOPT_CUSTOMREQUEST => $method,
        );
        if ($method == 'POST') {
            $curlSettings[CURLOPT_POST] = true;
            $curlSettings[CURLOPT_HTTPHEADER] = array(
                'Authorization:Basic dmlmLWNsaWVudDpwYXNzd29yZA==',
                'Accept: application/json',
                'Content-Type:application/x-www-form-urlencoded',
            );
            $curlSettings[CURLOPT_POSTFIELDS] = http_build_query($params);
        }

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

    /**
     * @param array $data
     */
    public function response($data = array())
    {
        if (!empty($data)) {
            foreach ($data as $name => $value) {
                ${$name} = $value;
            }
        }
        require_once get_theme_file_path('/vif/views/vif_customer_nav.php');
        exit;
    }

    /**
     * @param $sessionUser
     * @return WP_User
     */
    public function getCurrentUser($sessionUser)
    {
        $currentUser = wp_get_current_user();
        $currentUser->user_pass = $sessionUser->user_pass;
        return $currentUser;
    }
}