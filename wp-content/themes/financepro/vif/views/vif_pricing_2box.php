<?php
$custom_class = vc_shortcode_custom_css_class($css);
// box 1
$style = "";
$style .= "background-color:{$bgcolor};";
// box 2
$style2 = "";
$style2 .= "background-color:{$bgcolor2};";
// call api get price of VIFAST
$response = isset($api_url) ? remoteApi($api_url) : '';
$nearestPrice = is_array($response) ? (array)$response[0] : [];
$lastPrice = is_array($response) ? (array)$response[1] : [];
$vifastPrice = empty($nearestPrice) ? '' : $nearestPrice['value'];
$change = !empty($nearestPrice) && !empty($lastPrice) ? (($vifastPrice - $lastPrice['value']) / $lastPrice['value'] * 100) : '';
// call api get price of VISAFE
$response = isset($api_url2) ? remoteApi($api_url2) : '';
$nearestPrice = is_array($response) ? (array)$response[0] : [];
$lastPrice = is_array($response) ? (array)$response[1] : [];
$visafePrice = empty($nearestPrice) ? '' : $nearestPrice['value'];
$change2 = !empty($nearestPrice) && !empty($lastPrice) ? (($visafePrice - $lastPrice['value']) / $lastPrice['value'] * 100) : '';
?>
<div class="vc_row wpb_row vc_row-fluid vc_row-o-equal-height vc_row-flex">
    <div class="wpb_column vc_column_container vc_col-sm-6 text-center <?php echo esc_attr($custom_class); ?>">
        <a href="<?php echo isset($url) ? esc_url($url) : '#'; ?>" style="width: 100%">
            <div class="rt-price-table-box rt-price-table-box-custom price-box-left" style="<?php echo esc_attr($style); ?>">
                <h3 style="font-size: 40px;color: <?php echo isset($code_color) ? $code_color : '#002e52'; ?>"><?php echo wp_kses_post($code) ? $code : ''; ?></h3>
                <h3 style="margin: 0;font-size: 30px" class="<?php echo $change > 0 ? 'increase' : ($change < 0 ? 'decrease' : 'balance') ?>"><?php echo number_format($vifastPrice, 0, ',', '.'); ?></h3>
                <div class="text-center"><span class="number <?php echo $change > 0 ? 'increase' : ($change < 0 ? 'decrease' : 'balance') ?>"><?php if($change) : ?><span class="fa fa-arrow-<?php echo $change > 0 ? 'up' : 'down' ?>">&nbsp;</span><?php endif; ?><?php echo round($change <= 0 ? -$change : $change, 2); ?>%</span></div>
            </div>
        </a>
    </div>
    <div class="wpb_column vc_column_container vc_col-sm-6 text-center <?php echo esc_attr($custom_class); ?>">
        <a href="<?php echo isset($url2) ? esc_url($url2) : '#'; ?>" style="width: 100%">
            <div class="rt-price-table-box rt-price-table-box-custom price-box-right" style="<?php echo esc_attr($style); ?>">
                <h3 style="font-size: 40px;color: <?php echo isset($code_color) ? $code_color : '#002e52'; ?>"><?php echo wp_kses_post($code2) ? $code2 : ''; ?></h3>
                <h3 style="margin: 0;font-size: 30px" class="increase">Liên Hệ<?php echo $visafePrice ? number_format($visafePrice, 0, ',', '.') : ''; ?></h3>
                <div class="text-center"><span class="number <?php echo $change2 > 0 ? 'increase' : 'decrease' ?>"><?php if($change2) : ?><span class="fa fa-arrow-<?php echo $change2 > 0 ? 'up' : 'down' ?>">&nbsp;</span><?php endif; ?><?php echo $change2 ? (round($change2 <= 0 ? -$change2 : $change2, 2) . '%') : ''; ?></span></div>
            </div>
        </a>
    </div>
</div>