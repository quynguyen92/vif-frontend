<?php
/**
 * sidebar in admin area - plugin settings page.
 *
 * @uses at settings_page.php
 *
 */

if (!defined('ABSPATH')) exit;
include(HTCC_PLUGIN_DIR . 'admin/contact_page.php');
$table = new MobileMonkey_Contacts_List_Table();
$table->prepare_items();
!isset($_SESSION['current']) ? $_SESSION['current'] = 'tab-1' : $_SESSION['current'];
$_SESSION['tab']['tab1'] = true;
$current = str_replace('-', "", $_SESSION['current']);
foreach ($_SESSION['tab'] as $key => $value) {
	if ($value) {
		$$key = 'done';
	} else {
		$$key = '';
	}
}
$$current .= ' current';
?>
<div class="step-wrapper">
    <div class="tab_header">
        <ul class="tabs_wrapper">
            <li class="tab-link <?php echo $tab1 ?>" data-tab="tab-1">
                <span class="tab_number">1</span>
                <span class="tab_header">Setup</span>
            </li>
            <li class="tab-link <?php echo $tab2 ?>" data-tab="tab-2">
                <span class="tab_number">2</span>
                <span class="tab_header">Customize</span>
            </li>
            <li class="tab-link <?php echo $tab3 ?>" data-tab="tab-3">
                <span class="tab_number">3</span>
                <span class="tab_header">Leads</span>
                <span class="tab_contacts__count"><?php echo $table->totalItems ?></span>
            </li>
            <li class="tab-link <?php echo $tab4 ?>" data-tab="tab-4">
                <span class="tab_header">Your Subscription</span>
            </li>

        </ul>
        <div class="list_tabs__button">
            <ul class="list_tabs"></ul>
        </div>
    </div>
	<?php
	$mm_only ? $state = 'none' : $state = 'block';
	!$mm_only ? $mm = 'none' : $mm = 'block'; ?>
    <div id="tab-1" class="tab-content <?php echo $tab1 ?> setup_section">
        <div class="tab-content__wrapper">
            <div class="mm_only_block" style="display: <?php echo $mm ?>">
                <h6><?php _e('Changes were made to your chatbot in MobileMonkey, so the settings in WordPress are no longer up-to-date. Please go to MobileMonkey to continue making changes, or reset your chatbot in WordPress.', 'wp-chatbot') ?></h6>
                <div class="but__wrap">
                    <a target="_blank" rel="noopener noreferrer"
                       href='https://app.mobilemonkey.com/chatbot-editor/<?php echo $connected_page['id'] ?>/configure/chatbot'
                       class="go_mm"><?php _e('Go to MobileMonkey') ?></a>
                </div>
            </div>
            <form method="post" action="options.php" style="display: <?php echo $state ?>">
				<?php
				settings_fields('htcc_as_setting_group');
				do_settings_sections('htcc-as-setting-section');
				?>

				<?php submit_button('Save Changes'); ?>
            </form>
			<?php
			$fb_connected_area_active_page_settings = [
				'connected_page' => $connected_page
			];
			HT_CC::view('ht-cc-admin-form-bottom-connect', $fb_connected_area_active_page_settings); ?>
        </div>
    </div>
    <div id="tab-2" class="tab-content customize_section <?php echo $tab2 ?>">
        <div class="tab-content__wrapper">
            <h1><?php _e('Customize') ?></h1>
            <form method="post" action="options.php">
				<?php
				settings_fields('htcc_custom_setting_group');
				do_settings_sections('wp-custom-settings-section');
				?>
				<?php submit_button('Save Changes'); ?>
            </form>

        </div>
    </div>
    <div id="tab-3" class="tab-content contact_tab <?php echo $tab3 ?>">
        <h1><?php _e('Leads') ?></h1>

        <div class="contact_head__wrap">
            <h4><?php
				$text = $table->totalItems > 1 ? 'Leads' : 'Lead';
				if ($table->totalItems == 0) {
					$table->totalItems = '';
					$text = "No Leads ";
				}
				echo $table->totalItems
				?> <p><?php _e($text) ?><?php _e(' generated') ?></p></h4>
            <?php
            ?>
            <div class="download__wrap">
                <a id="csv" href="" style="pointer-events:<?php $subscribe_info?_e('all'):_e('none')?> "><i class="fa fa-download" aria-hidden="true"></i><?php _e("Download Leads");?></a>
                <div class="pro_button__wrapper" style="display: none">
                    <a href="#" class="pro_button__link">
                        <div class="pro_button">
                            <div class="pro_button__content">
                                <p><?php _e('Upgrade to unlock this feature') ?></p>
								<h3><?php _e('Get <b>50% off</b> when you upgrade today.') ?></h3>
                            </div>
                            <div class="pro_button__action">
                                <span class="pro_button_action__text"><?php _e('Upgrade') ?></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="table__wrap">
			<?php
			$table->display();
			?>
        </div>
        <div class="customization_button__wrapper">
            <a target="_blank" rel="noopener noreferrer" href="https://app.mobilemonkey.com/chatbot-editor/<?php echo $connected_page['bot_id']?>/bot-builder" class="customization_button__link">
                <div class="customization_button">
                    <div class="customization_button__content">More chatbot customization in <span class="customization_button__image"></span> MobileMonkey</div>
                    <div class="customization_button__action">
                        <span class="button_action__text">LEt's go</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div id="tab-4" class="tab-content subscribe_section <?php echo $tab4 ?>">
        <div class="tab-content__wrapper">
			<?php
			$plan = json_decode(json_encode($wp_plan_info), True);
			$fb_subscribe_info = [
                'account' => $account_info,
                'subscribe_info' => $subscribe_info,
                'message_statistic' => $message_statistic,
				'page' => [
                    'page_name'=>$page_info['pageName'],
                    'since'=>$page_info['connected_at'],
                    'is_wp' =>$page_info['is_wp_subscribe'],
				],
				'plan' => $wp_plan_info
			];
			HT_CC::view('ht-cc-admin-fb-subscription', $fb_subscribe_info); ?>
        </div>
    </div>
    <div id="to_pro" class="modal">
        <div class="modal_close">X</div>
        <div class="upgrade__wrapper">
            <div class="upgrade__content">
                <h4><?php _e('Are you sure that you want to disconnect this page?') ?></h4>
                <p><?php _e('Disconnecting will disable all chatbots on your Facebook page and remove the chat widget from your website.') ?></p>
            </div>
            <div class="upgrade__button">
                <a class="button-close-modal blues" href="#"><?php _e('Cancel') ?></a>
                <a href="<?php echo $connected_page['path']; ?>" id="disconnect"
                   class="button-lazy-load reds"><?php _e('Disconnect') ?>
                    <div class="lazyload"></div>
                </a>


            </div>
        </div>
    </div>
    <div id="cancel" class="modal">
        <div class="modal_close">X</div>
        <div class="cancel__wrapper">
            <div class="cancel__content">
                <h4><?php _e('Are you sure  you want to deactivate this subscription?') ?></h4>
                <p><?php _e('You will lose access to all Pro features once this subscription expires.') ?></p>
            </div>
            <div class="cancel__button">
                <a class="button-close-modal blues" href="#"><?php _e('Cancel') ?></a>
                <a href="#" id="cancel_sub"
                   class="button-lazy-load reds"><?php _e('Deactivate anyway') ?>
                    <div class="lazyload"></div>
                </a>


            </div>
        </div>
    </div>
    <div id="unsaved_option" class="modal">
        <div class="modal_close">X</div>
        <div class="unsaved__wrapper">
            <div class="unsaved__content">
                <h4><?php _e('Do you want to save your changes?') ?></h4>
            </div>
            <div class="unsaved__button">
                <a class="blues save_change button-lazy-load" href="#"><?php _e('Save') ?>
                    <div class="lazyload"></div>
                </a>
                <a href="#" id="discard_button" class="reds button-lazy-load"><?php _e('Discard') ?></a>
            </div>
        </div>
    </div>
	<div class="modal-overlays" id="modal-overlay">
	</div>
    <div id="pro_option" class="modal">
        <div class="modal_close"><i class="fa fa-times" aria-hidden="true"></i></div>
        <div class="mm__wrapper">
            <form class="checkout-form" id="checkout-form">
                <input type="hidden" data-recurly="token" name="recurly-token">
                <div class="billing-modal-header">
                    <div class="billing-modal-header__logo">
                        <div class="logo"></div>
                        <span><?php _e('MobileMonkey') ?></span></div>
                    <div class="billing-modal-header__plan-name">WP-CHATBOT PRO</div>
                    <div class="billing-modal-header__plan-price">
                        <h4>$<?php _e(round(number_format(($plan['unit_amount_in_cents'] /100), 2, '.', ' ')/12))?><b>/month</b></h4>
                        <p class="billed"><?php _e("billed annually")?></p>
                        <div class="discount">
                            <p class="disc_cross"><?php _e('<b>$8/</b>month') ?></p>
                            <p><?php _e('Save 50% today') ?></p>
                        </div>
                    </div>

                    <div class="billing-page-details">
                        <div class="billing-page-details__left-section">
                            <div class="billing-page-details__middle">
                                <div class="billing-page-details__name">
                                    <?php _e($connected_page['name']) ?>
                                </div>
                                <div class="billing-page-details__sends-text">
                                </div>
                            </div>
                        </div>
                        <div class="billing-page-details__check-circle">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="billing-modal-body">
                    <?php
                    if ($account_info){
                    ?>
                    <div class="billing_info_wrap">
                        <div class="payment_info">
                            <div class="payment_info_text"><?php _e('Payment Information')?></div>
                            <div class="billed_with"><?php _e('Billed with')?>: XXXX-XXXX-XXXX-<?php _e($account_info->last_card_numbers)?></div>
                        </div>
                    </div>
                    <?php
					}else{?>
                        <label for="email"><?php _e('EMAIL') ?></label>
                        <input type="email" id="email" required>
                        <div class="name__wrap">
                            <div class="firstname__wrap">
                                <label for="firstname"><?php _e('FIRST NAME') ?></label>
                                <input type="text" id="firstname" data-recurly="first_name" required>
                            </div>
                            <div class="lastname__wrap">
                                <label for="lastname"><?php _e('LAST NAME') ?></label>
                                <input type="text" id="lastname" data-recurly="last_name" required>
                            </div>
                        </div>
                        <label for="country"><?php _e('COUNTRY')?></label>
                        <select name="country" id="country" data-recurly="country" required>
                            <option value="US">US</option>
                            <option value="AD">AD</option>
                            <option value="AE">AE</option>
                        </select>
                        <label for="card_number"><?php _e('CARD INFO') ?></label>
                        <div class="card__wrap">
                            <div id="card_number" data-recurly="card" name="card"></div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
                <div class="billing-modal-footer">
					<?php
					if (!$account_info){
					?>
                    <div class="term__wrap">
                        <input type="checkbox" required>
                        <span class="terms-label"><?php _e('I have read and accept the ') ?> <b><a href="https://mobilemonkey.com/privacy-policy"><?php _e('Privacy Policy ') ?></a></b><?php _e('and ') ?> <b><a href="https://mobilemonkey.com/master-service-agreement"><?php _e('Terms of Service') ?></a></b></span>
                    </div>
						<?php
					}
					?>
                    <div id="errors"></div>
                    <button id="pay_plan" class="oranges">Confirm
                        <div class="lazyload"></div>
                    </button>
                </div>

            </form>
        </div>
    </div>
    <div class="modal-overlays" id="modal-overlay">
    </div>

</div>
