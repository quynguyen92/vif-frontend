<!doctype html>
<html <?php language_attributes(); ?>>
<?php get_header(); ?>
<body>
<div id="page" class="site">
    <header class="site-header">
        <div class="header-wrap">
            <section class="social">
                <div class="social-container">
                    <div class="social-wrap">
                        <div class="text-right">
                            <a class="social-item" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
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
                            <img src="<?php echo get_template_directory_uri() . '/public/images/logo.jpg' ?>" class="" alt="VIF" height="112">
                        </div>
                        <div class="top-menu-wrap">
                            <ul class="top-menu">
                                <?php $topMenus = wp_get_nav_menu_items('menu-header'); ?>
                                <?php foreach ($topMenus as $item) : ?>
                                    <li><a href="<?php echo $item->url; ?>"><?php echo strtoupper($item->title); ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="top-contact">
                            <div class="contact-container">
                                <div class="contact-wrap">
                                    <a href="tel:8001231234" class="contact-content" role="button"><i class="fa fa-phone" aria-hidden="true"></i><span class="phone-text">(800) 123 1234</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </header>
    <?php get_template_part('app/views/layouts/elements/content') ?>

    <?php get_footer(); ?>
</div>
</body>
</html>
