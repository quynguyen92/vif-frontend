<header class="site-header">
    <div class="header-wrap">
        <section class="social">
            <div class="social-container">
                <div class="social-wrap">
                    <div class="text-right">
                        <a class="social-item" href="https://www.facebook.com/VIFVIETNAM" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a class="social-item" href="https://instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a class="social-item" href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <section class="navigation-top">
            <div class="navigation-container">
                <div class="navigation-wrap">
                    <div class="top-logo">
                        <img src="<?php echo get_template_directory_uri() . '/public/images/logo.png' ?>" class="" alt="VIF" height="80">
                    </div>
                    <div class="top-menu-wrap">
                        <ul class="top-menu">
                            <?php $topMenus = wp_get_nav_menu_items('menu-header'); ?>
                            <?php if (!empty($topMenus)): ?>
                                <?php foreach ($topMenus as $item) : ?>
                                    <li><a href="<?php echo $item->url; ?>"><?php echo strtoupper($item->title); ?></a>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="top-contact">
                        <div class="contact-container">
                            <div class="contact-wrap">
                                <a href="tel:8001231234" class="contact-content" role="button"><i class="fa fa-phone" aria-hidden="true"></i><span class="phone-text">(+84) 966 905 320</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</header>