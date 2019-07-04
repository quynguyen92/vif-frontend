<footer id="colophon" class="footer">
    <div class="elementor-inner">
        <div class="elementor-section-wrap">
            <section class="elementor-element element-section">
                <div class="element-container">
                    <div class="elementor-row">
                        <div class="elementor-element elementor-col-25">
                            <div class="elementor-column-wrap elementor-element-populated elementor-element-populated-custom">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-widget-heading">
                                        <div class="elementor-widget-container">
                                            <h2 class="elementor-heading-title elementor-size-default">ABOUT</h2>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-widget-text-editor">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-text-editor elementor-clearfix">
                                                <p>Be informed
                                                    with the hottest news from all over the world! We monitor
                                                    what is happening every day and every minute. Read and enjoy
                                                    our articles and news and explore this world with
                                                    Worldmap!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-col-25">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-widget-heading">
                                        <div class="elementor-widget-container">
                                            <h2 class="elementor-heading-title elementor-size-default">CATEGORIES</h2>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-widget-icon-list">
                                        <div class="elementor-widget-container">
                                            <ul class="elementor-icon-list-items">
                                                <?php $topMenus = wp_get_nav_menu_items('menu-header'); ?>
                                                <?php foreach ($topMenus as $item) : ?>
                                                    <li class="elementor-icon-list-item">
                                                        <a href="<?php echo $item->url; ?>">
                                                            <span class="elementor-icon-list-icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                                            <span class="elementor-icon-list-text"><?php echo strtoupper($item->title); ?></span>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-col-25">
                            <div class="elementor-column-wrap elementor-element-populated-custom">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-widget-heading">
                                        <div class="elementor-widget-container">
                                            <h2 class="elementor-heading-title elementor-size-default">RECENT POSTS</h2>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-widget-jet-posts">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-jet-posts jet-elements">
                                                <div class="jet-posts col-row disable-cols-gap disable-rows-gap">
                                                    <div class="jet-posts__item col-desk-1">
                                                        <div class="jet-posts__inner-box">
                                                            <div class="jet-posts__inner-content">
                                                                <h4 class="entry-title"><a href="https://ld-wp.template-help.com/wordpress_prod-23276/v1/lorem-ipsum-dolor-sit/">LOREM IPSUM DOLOR SIT</a></h4>
                                                                <div class="post-meta">
                                                                    <span class="post__date post-meta__item"><a href="https://ld-wp.template-help.com/wordpress_prod-23276/v1/2019/04/05/" class="post__date-link"><time datetime="2019-04-05T10:12:55+00:00" title="2019-04-05T10:12:55+00:00">April 5, 2019</time></a></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="jet-posts__item col-desk-1">
                                                        <div class="jet-posts__inner-box">
                                                            <div class="jet-posts__inner-content">
                                                                <h4 class="entry-title"><a href="https://ld-wp.template-help.com/wordpress_prod-23276/v1/etiam-commodo-convallis/">ETIAM COMMODO CONVALLIS</a></h4>
                                                                <div class="post-meta">
                                                                    <span class="post__date post-meta__item"><a href="https://ld-wp.template-help.com/wordpress_prod-23276/v1/2019/04/05/" class="post__date-link"><time datetime="2019-04-05T10:12:02+00:00" title="2019-04-05T10:12:02+00:00">April 5, 2019</time></a></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-col-25">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-widget-heading">
                                        <div class="elementor-widget-container">
                                            <h2 class="elementor-heading-title elementor-size-default">FOLLOW US</h2>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-widget-social-icons">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-social-icons-wrapper">
                                                <a class="social-item" href="https://www.facebook.com/VIFVIETNAM" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                                <a class="social-item" href="https://instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                                                <a class="social-item" href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="elementor-element element-section copyright">
                <div class="element-container">
                    <div class="elementor-row">
                        <div class="elementor-element elementor-col-50">
                            <div class="elementor-column-wrap elementor-element-populated-custom">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-widget elementor-widget-jet-logo">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-jet-logo jet-blocks">
                                                <div class="jet-logo jet-logo-type-image jet-logo-display-block">
                                                    <a href="/" class="jet-logo__link"><img src="<?php echo get_template_directory_uri() . '/public/images/logo.png' ?>" alt="VIF" height="80"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-col-50">
                            <div class="elementor-column-wrap elementor-element-populated-custom">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-widget elementor-widget-text-editor">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-text-editor elementor-text-editor-custom elementor-clearfix">© 2019 VIF Co., JSC. All rights reserved.</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</footer>
