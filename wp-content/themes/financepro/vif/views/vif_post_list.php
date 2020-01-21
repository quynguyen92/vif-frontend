<?php
$category = get_category($cat);
$perPage = isset($total_number_post) && $total_number_post > 0 ? $total_number_post : 8;
$slide = 0;
$total = $category->category_count;;
?>
<div class="features-news owl-wrap">
    <div class="wrap">
        <?php if (isset($showtitle) && $showtitle) : ?>
            <div class="section-title-content">
                <div class="section-title">
                    <h2 class="section-title-holder" style="color:<?php echo isset($section_title_color) ? esc_attr($section_title_color) : ''; ?>;font-size: <?php echo isset($font_size) ? esc_attr($font_size) : 20; ?>px"><?php echo wp_kses_post( $title );?></h2>
                </div>
                <div class="clear"></div>
            </div>
        <?php endif; ?>
        <div class="owl-carousel owl-theme owl-loaded">
            <?php while($slide <= $total) : ?>
                <?php global $post; ?>
                <?php $args = array(
                    'numberposts' => $perPage,
                    'category' => $cat,
                    'offset' => $slide,
                    'orderby' => $orderby,
                    'order' => $order,
                );
                $postList = get_posts($args); ?>
                <div class="item">
                    <ul class="list-news">
                        <?php if ($postList) : ?>
                            <?php foreach ($postList as $post) : ?>
                                <?php setup_postdata($post); ?>
                                <li class="latest">
                                    <div class="rtin-single-post">
                                        <div class="rtin-item-info">
                                            <a href="<?php the_permalink(); ?>" style="font-size: <?php echo isset($text_font_size) ? $text_font_size : 20; ?>px"><?php the_title(); ?></a>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach;?>
                        <?php endif; ?>
                        <?php $slide += $perPage; ?>
                        <?php wp_reset_postdata(); ?>
                    </ul>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<script type="application/javascript">
    $(document).ready(function () {
        $('.owl-carousel').owlCarousel({
            loop: false,
            nav: true,
            navText: ["<i class=\"fa fa-angle-left\"></i>", "<i class=\"fa fa-angle-right\"></i>"],
            dots: false,
            items: 1
        })
    });
</script>