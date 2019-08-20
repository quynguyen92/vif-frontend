<?php
$args = array(
    'posts_per_page' => $total_number_post,
    'ignore_sticky_posts' => 1,
    'cat' => $cat,
    'orderby' => $orderby,
    'order' => $order,
);

$query = new WP_Query($args);
// Pagination fix
global $wp_query;
$temp = $wp_query;
$wp_query = NULL;
$wp_query = $query;
?>
<div class="features-news">
    <div class="wrap">
        <?php if ($showtitle) : ?>
            <div class="section-title-content">
                <div class="section-title">
                    <h2 class="section-title-holder" style="color:<?php echo esc_attr($section_title_color); ?>;font-size: <?php echo esc_attr($font_size); ?>"><?php echo wp_kses_post( $title );?></h2>
                </div>
                <div class="owl-custom-nav-bar"></div>
                <div class="clear"></div>
            </div>
        <?php endif; ?>

        <div class="owl-carousel owl-carousel-news owl-theme owl-loaded">
            <div class="owl-stage-outer">
                <div class="owl-stage">
                    <div class="owl-item active">
                        <div>
                            <ul class="list-news">
                                <?php if (have_posts()) : ?>
                                    <?php while ( have_posts() ) : the_post();?>
                                        <li class="latest">
                                            <div class="rtin-single-post">
                                                <div class="rtin-item-info">
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endwhile;?>
                                <?php else: ?>
                                    <div class="rtin-single-post">
                                        <?php esc_html_e( 'No Post Found' , '' ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php $wp_query = $temp; wp_reset_postdata(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>