<?php
/**
 * template for options page
 * @uses HTCC_Admin::settings_page
 * @since 1.0.0
 */

if (!defined('ABSPATH')) exit;
$options = get_option('htcc_options');
?>

<!-- style="display: flex; flex-wrap: wrap;" -->

<div class="wrap">
    <div class="row mobile_wrap">
        <div class="col s12 m9 x9 options">
            <div class="mobilemonkey-logo"></div>
            <h6 class="options-subtitle"><?php _e('WP-Chatbot is ') ?><a href="https://mobilemonkey.com/" target="_blank"><?php _e('powered by MobileMonkey') ?></a><?php _e(': an Official Facebook Messenger Solutions Provider Partner') ?></h6>
			<?php
			$options = get_option('htcc_options');
			$options_as = get_option('htcc_as_options');
			$options_custom = get_option('htcc_custom_options');
			$api = $this->getApi();
			$this->api->logoutMobilemonkey();
			$token = $this->api->connectMobileMonkey();
			$internal =  get_option('mobilemonkey_active_page_id');
			$update = false;
			if ($token) {
				$reset = FALSE;
				if ($this->api->connectPage() || $this->api->disconnectPage()) {
					$reset = TRUE;
				}
				$pages = $this->api->getPages();
				$activePage = $this->api->getActivePage($reset);
				if ($activePage) {
					if ($activePage['bot_id']){
						$mm_state = $this->api->mmOnlyCheck($this->fb_page_id);
						if ( isset($_REQUEST['settings-updated']) && $_REQUEST['settings-updated']){
						    $update = true;
							$current_language = $this->api->getLanguage($activePage['remote_id']);
							if (!empty($options_custom['fb_sdk_lang']) && $options_custom['fb_sdk_lang'] !== $current_language) {
								$this->api->updateLanguage($options_custom['fb_sdk_lang'], $activePage['remote_id']);
							}
							if ($mm_state){
								echo "<style>.settings-error{display: none}</style>";
                            }
						}
						if (!$mm_state){
							$current_welcome_message = $this->api->getWelcomeMessage($activePage['remote_id']);
							if ($options_as['fb_welcome_message'] !== $current_welcome_message && isset($options_as['fb_welcome_message'])) {
								$this->api->updateWelcomeMessage($options_as['fb_welcome_message'], $activePage['remote_id']);
							}
						}else {
							delete_option('htcc_as_options');
						}
						$this->api->setWidgets($options_as,$activePage['remote_id'],$update);
						$this->api->setCustomChatSettings($activePage['remote_id'],$options_custom,$update);
					}else {
						echo "<style>.settings-error{display: none}</style>";
						$this->api->renderNotice('<p class="bot_disabled">Your chatbot has been disabled in MobileMonkey. Please reactivate it before making additional edits. Go <a target="_blank" rel="noopener noreferrer" href="https://app.mobilemonkey.com/chatbot-editor/">here</a> to reactivate your chatbot</p>');

					}
					$this->api->getSubscribeInfo();
					$is_pro = $this->api->GetCurrentSubscription()? true : false;
					$fb_connected_area_active_page_settings = [
						'connected_page' => $activePage,
                        'is_pro' => $is_pro
					];
					$page_subscribe_info = [
                        'page_info'=> $this->api->getPageInfo(),
					    'account_info'=> $this->api->getAccountInfo(),
					    'subscribe_info'=> $this->api->getCurrentSubscription(),
					    'wp_plan_info'=> $this->api->getWpPlan(),
					    'message_statistic'=> $this->api->getMessageStatistic(),
                        'connected_page' => $activePage,
                        'mm_only' => $mm_state
                    ];
					HT_CC::view('ht-cc-admin-fb-button-connected', $fb_connected_area_active_page_settings);
					HT_CC::view('ht-cc-admin-settings-form',$page_subscribe_info);

				} else {
					if ($internal){
						echo "<style>.settings-error{display: none}</style>";
						$this->api->renderNotice('Your Facebook page has been disconnected in MobileMonkey. Please connect to a page to reactivate your chatbot.');
					}
					$fb_connected_area_pages_settings = [
						'pages' => $pages,
						'logout_path' => add_query_arg([
							'page' => HTCC_PLUGIN_MAIN_MENU,
							'logout' => true,
						], admin_url('admin.php')),
					];
					HT_CC::view('ht-cc-admin-fb-button-select-page', $fb_connected_area_pages_settings);
				}

			} else {

				HT_CC::view('ht-cc-admin-fb-button-not-connected', [
					'options' => $options,
					'path' => $this->getApi()->connectLink(),
				]);
			}

			?>

</div>

<div class="col s12 m3 x3 ht-cc-admin-sidebar">
	<?php include_once 'commons/ht-cc-admin-sidebar.php'; ?>
</div>
</div>


</div>