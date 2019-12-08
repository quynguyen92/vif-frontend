<?php
add_role('customer', __('Customer'), array(
        'read' => false,
        'edit_posts' => false,
        'edit_theme_options' => false
    )
);
$currentUser = wp_get_current_user();
if (in_array('customer', $currentUser->roles)) {
    add_action('admin_menu', 'vif_menu_pages');
}

function vif_menu_pages()
{
    add_menu_page('NAV', 'Customer NAV', 'read', 'customer_nav', 'customer_nav', 'dashicons-money');
}

function customer_nav()
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
        'data' => $response[0],
        'currentUser' => $currentUser
    ]);
}