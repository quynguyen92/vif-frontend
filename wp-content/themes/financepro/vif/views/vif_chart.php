<?php
$custom_class = vc_shortcode_custom_css_class($css);
$style = "";
$style .= "background-color:{$bgcolor};";
// call api
$response = isset($api_url) ? remoteApi($api_url) : '';
?>
<div class="<?php echo esc_attr($custom_class); ?>">
    <canvas id="chartContainer" style="height: 300px; width: 100%;"></canvas>
</div>
<?php //wp_enqueue_script( 'vif_chart_script' ); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script type="text/javascript">
    var ctx = document.getElementById('chartContainer').getContext('2d');
    var label = [],
        dataChart = [];
    <?php foreach($response as $item) : ?>
    <?php $item = (array)$item;?>
    var dateTmp = '<?php echo $item['key']; ?>';
    label.push(dateTmp.toString());
    dataChart.push(<?php echo $item['value']; ?>);
    <?php endforeach; ?>

    var chart = new Chart(ctx, {
        type: '<?php echo $type; ?>',
        data: {
            labels: label,
            datasets: [
                {
                    label: 'Value',
                    borderColor: '#002e52',
                    fill: false,
                    data: dataChart
                }
            ]
        },
        options: {
            title: {
                display: true,
                text: '<?php echo $title; ?>',
                fontSize: '<?php echo $font_size; ?>',
                fontColor: '<?php echo $title_color; ?>',
            },
            tooltips: {

            }
        }
    });
</script>