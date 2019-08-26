<?php
$custom_class = vc_shortcode_custom_css_class($css);
// box 1
$style = "";
$style .= "background-color:{$bgcolor};";
$price_html = $price;
$price_html .= !empty($unit) ? "<span> /$unit</span>" : '';
// box 2
$style2 = "";
$style2 .= "background-color:{$bgcolor2};";
$price_html2 = $price2;
$price_html2 .= !empty($unit2) ? "<span> /$unit2</span>" : '';
// call api
$response = isset($api_url) ? remoteApi($api_url) : '';
$nearestPrice = (array)$response[0];
$lastPrice = (array)$response[1];
$vifastPrice = $nearestPrice['value'];
$change = ($vifastPrice - $lastPrice['value']) / $lastPrice['value'] * 100;
?>
<div class="vc_row wpb_row vc_row-fluid vc_row-o-equal-height vc_row-flex">
    <div class="wpb_column vc_column_container vc_col-sm-6 text-center <?php echo esc_attr($custom_class); ?>">
        <a href="<?php echo isset($url) ? esc_url($url) : '#'; ?>" style="width: 100%">
            <div class="rt-price-table-box rt-price-table-box-custom" style="<?php echo esc_attr($style); ?>">
                <span><?php echo esc_html($title); ?></span>
                <h4 style="color: <?php echo isset($code_color) ? $code_color : '#002e52'; ?>"><?php echo wp_kses_post($code) ? 'Mã: ' . $code : ''; ?></h4>
                <h3 class="<?php echo $change > 0 ? 'increase' : 'decrease' ?>"><?php echo number_format($vifastPrice, 0, ',', '.'); ?></h3>
                <div class="text-center"><span class="number <?php echo $change > 0 ? 'increase' : 'decrease' ?>"><span class="fa fa-arrow-<?php echo $change > 0 ? 'up' : 'down' ?>">&nbsp;</span><?php echo round($change <= 0 ? -$change : $change, 2); ?>%</span></div>
                <br><span>Tại ngày <?php echo date('d-m-Y'); ?></span>
            </div>
        </a>
    </div>
    <div class="wpb_column vc_column_container vc_col-sm-6 text-center <?php echo esc_attr($custom_class); ?>">
        <a href="<?php echo isset($url2) ? esc_url($url2) : '#'; ?>" style="width: 100%">
            <div class="rt-price-table-box rt-price-table-box-custom" style="<?php echo esc_attr($style); ?>">
                <span><?php echo esc_html($title2); ?></span>
                <h4 style="color: <?php echo isset($code_color) ? $code_color : '#002e52'; ?>"><?php echo wp_kses_post($code2) ? 'Mã: ' . $code2 : ''; ?></h4>
                <h3 class="increase"><?php echo $price2; ?></h3><span><?php echo wp_kses_post($unit2) ? $unit2 : ''; ?></span>
                <div class="text-center"><span class="number increase"></span></div>
            </div>
        </a>
    </div>
</div>