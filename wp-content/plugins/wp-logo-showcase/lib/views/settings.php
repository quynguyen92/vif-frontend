<?php global $rtWLS; ?>

<div class="wrap">
    <div id="upf-icon-edit-pages" class="icon32 icon32-posts-page"><br /></div>
    <h2><?php _e('Wp Logo Showcases Settings', 'wp-services-showcase'); ?></h2>
    <h3><?php _e('General settings', 'wp-services-showcase');?>
        <a style="margin-left: 15px; font-size: 15px;" href="https://radiustheme.com/setup-configure-wp-logo-showcase-wordpress/" target="_blank"><?php _e('Documentation',  'wp-services-showcase') ?></a>
    </h3>

    <div class="rt-setting-wrapper">
        <div class="rt-response"></div>
        <form id="rt-wls-settings-form" onsubmit="rtWLSSettings(this); return false;">

            <div class="rt-tab-container">
                <ul class="rt-tab-nav">
                    <li><a href="#s-wls-general"><?php _e('General Settings', 'wp-services-showcase' );?></a></li>
                    <li><a href="#s-wls-custom-css"><?php _e('Custom CSS', 'wp-services-showcase' );?></a></li>
                </ul>
                <div id="s-wls-general" class="rt-setting-holder rt-tab-content">
                    <?php echo $rtWLS->rtFieldGenerator($rtWLS->rtWLSGeneralSettings(), true); ?>
                </div>
                <div id="s-wls-custom-css" class="rt-setting-holder rt-tab-content">
                    <?php echo $rtWLS->rtFieldGenerator($rtWLS->rtWLSCustomCss(), true); ?>
                </div>
            </div>

            <p class="submit"><input type="submit" name="submit" class="button button-primary rtSaveButton" value="Save Changes"></p>

            <?php wp_nonce_field( $rtWLS->nonceText(), $rtWLS->nonceId() ); ?>
        </form>

        <div class="rt-response"></div>
    </div>

    <div class="rt-help">
        <p style="font-weight: bold"><?php _e('Short Code', 'wp-services-showcase' );?> :</p>
        <code>[logo-showcase id="581" title="Partner logo list"]</code><br>
        <p><?php _e('id = short code id (1,2,3,4)', 'wp-services-showcase' );?></p>
        <p><?php _e('title = Shot code title (Not recommended)', 'wp-services-showcase' );?></p>
        <p class="rt-help-link"><a class="button-primary" href="http://demo.radiustheme.com/wordpress/wplogoshowcase/" target="_blank"><?php _e('Demo', 'wp-services-showcase' );?></a> <a class="button-primary" href="https://radiustheme.com/setup-configure-wp-logo-showcase-wordpress/" target="_blank"><?php _e('Documentation', 'wp-services-showcase' );?></a> </p>
    </div>


</div>
