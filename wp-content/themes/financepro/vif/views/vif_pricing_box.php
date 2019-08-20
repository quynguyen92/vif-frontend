<?php
$custom_class = vc_shortcode_custom_css_class($css);
$style = "";
$style .= "background-color:{$bgcolor};";
if (!empty($maxwidth)) {
    $style .= "max-width:{$maxwidth}px;";
}
$price_html = $price;
$price_html .= !empty($unit) ? "<span> /$unit</span>" : '';
?>
<div class="<?php echo esc_attr($custom_class); ?>">
    <a href="<?php echo isset($url) ? esc_url($url) : '#'; ?>">
        <div class="rt-price-table-box" style="<?php echo esc_attr($style); ?>">
            <span><?php echo esc_html($title); ?></span>
            <h4 style="color: <?php echo isset($code_color) ? $code_color : '#002e52'; ?>"><?php echo wp_kses_post($code) ? 'Mã: ' . $code : ''; ?></h4>
            <h3 class="increase"><?php echo $price; ?></h3><span><?php echo wp_kses_post($unit) ? $unit : ''; ?></span>
            <div class="text-center"><span class="number increase">+0,18%</span></div>
        </div>
    </a>
</div>