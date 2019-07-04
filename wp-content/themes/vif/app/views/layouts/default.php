<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php echo get_the_title(); ?></title>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.jpg"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="profile" href="https://gmpg.org/xfn/11"/>
    <?php wp_head(); ?>
</head>
<body>
<div id="page" class="site">
    <?php get_header(); ?>
    <div id="content" class="site-content ">
        <div class="elementor-inner">
            <div class="element-section-wrap">
            <?php
            $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
            switch (true) {
                case empty($uri) || $uri == '/':
                    get_template_part('app/views/home/index');
                    break;
                case !empty($uri) && file_exists(TEMPLATEPATH . '/app/views/' . trim($uri, '/') . '/index.php'):
                    get_template_part('app/views/' . trim($uri, '/') . '/index');
                    break;
                default:
                    get_template_part('app/views/errors/404');
                    break;
            } ?>
            </div>
        </div>
    </div>
    <?php get_footer(); ?>
</div>
</body>
</html>
