<?php
$custom_class = vc_shortcode_custom_css_class($css);
$style = "";
$style .= "background-color:{$bgcolor};";
?>
<div class="<?php echo esc_attr($custom_class); ?>">
    <canvas id="chartContainer" style="height: 300px; width: 100%;"></canvas>
</div>
<?php //wp_enqueue_script( 'vif_chart_script' ); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script type="text/javascript">
    var ctx = document.getElementById('chartContainer').getContext('2d');
    var chart = new Chart(ctx, {
        type: '<?php echo $type; ?>',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [
                {
                    label: 'Value',
                    borderColor: '#002e52',
                    fill: false,
                    data: [0, 10, 5, 2, 20, 30, 45]
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