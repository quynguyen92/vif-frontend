<?php
add_role('customer', __('Customer'), array(
        'read' => true
    )
);
add_action('load-profile.php', function () {
    if (current_user_can('customer'))
        exit(wp_safe_redirect(admin_url()));
});

function showCustomerNav()
{
    $sessionUser = isset($_SESSION['current_user']) ? $_SESSION['current_user'] : new WP_User();

    // Get token Api
    // URL: http://54.255.145.206:8080/oauth/token
    // Method: POST
    // Headers:
    //      Authorization: Basic xxxxxx
    //      Accept: application/json
    //      Content-Type: application/x-www-form-urlencoded
    // Params:
    //      username: abcxyz
    //      password: defghj
    //      grant_type: password
    $customer = new VifCustomer();
    $currentUser = $customer->getCurrentUser($sessionUser);
    $auth = $customer->remoteApi($customer->getOAuthUrl(), array(
        'username' => $currentUser->user_login,
        'password' => $currentUser->user_pass,
        'grant_type' => 'password',
    ));
    if ($auth === false) {
        $customer->response();
    }
    // save token
    $customer->setToken(array_get((array)$auth, 'access_token'));

    // GET customer NAV with token
    // URL: http://54.255.145.206:8080/dashboard/get-nav-report?customerId=AAA&access_token=BBBB
    // Method: GET
    $params = array(
        'customerId' => $currentUser->customer_id,
        'access_token' => $customer->getToken()
    );
    $response = $customer->remoteApi($customer->getCustomerNavUrl() . '?' . http_build_query($params), array(), 'GET');

    $customer->response([
        'data' => array_get($response, 0),
        'currentUser' => $currentUser
    ]);
}