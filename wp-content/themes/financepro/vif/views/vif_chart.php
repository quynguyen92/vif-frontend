<?php
$custom_class = vc_shortcode_custom_css_class($css);
$style = "";
$style .= "background-color:{$bgcolor};";
// call api
$response = isset($api_url) ? remoteApi($api_url) : '';
?>
<div class="chart-tab" style="margin-bottom: 20px">
    <button type="button" class="tab-button active" data-tab="#tab1">NAV</button>
    <button type="button" class="tab-button" data-tab="#tab2">VIFAST - VnIndex</button>
</div>
<div id="tab1" class="tab-content <?php echo esc_attr($custom_class); ?>">
    <canvas id="chartContainer" style="height: 300px; width: 100%;"></canvas>
</div>
<div id="tab2" class="tab-content">
    <canvas id="VifVnIndexChart" style="height: 300px; width: 100%;"></canvas>
</div>
<?php
$vnIndex = remoteApi('http://54.255.145.206:8080/public/getVnStockHistory');
$vnIndexRe = [];
foreach ($vnIndex as $item) {
    $item = (array)$item;
    $timeUpdate = explode('/', $item['timeUpdate']);
    $timeUpdate = $timeUpdate[1] . '-' . $timeUpdate[0] . '-01';
    if (strtotime('2018-10-01') <= strtotime($timeUpdate)) {
        $vnIndexRe[] = $item['lastPrice'] * 10.5;
    }
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#tab2').addClass('hide');
        $('.tab-button').click(function () {
            var tabId = $(this).attr('data-tab');
            $('.tab-content').addClass('hide');
            $(tabId).removeClass('hide');
            $('.tab-button').removeClass('active');
            $(this).addClass('active')
        });
    });
    var ctx = document.getElementById('chartContainer').getContext('2d');
    var ctxVifVnIndex = document.getElementById('VifVnIndexChart').getContext('2d');
    var label = [],
        dataChart = [],
        dataVnIndex = [];
    <?php foreach($response as $item) : ?>
    <?php $item = (array)$item;?>
    var dateTmp = '<?php echo $item['key']; ?>';
    label.push(dateTmp.toString());
    dataChart.push(<?php echo $item['value']; ?>);
    <?php endforeach; ?>

    <?php foreach($vnIndexRe as $vnIndexPoint) : ?>
    dataVnIndex.push(<?php echo $vnIndexPoint; ?>);
    <?php endforeach; ?>

    var chart = new Chart(ctx, {
        type: '<?php echo $type; ?>',
        data: {
            labels: label,
            datasets: [
                {
                    label: 'NAV',
                    borderColor: '#ffae5f',
                    fill: false,
                    data: dataChart
                }
            ]
        },
        options: {
            title: {
                display: true,
                text: '<?php echo $title; ?>',
                fontSize: '<?php echo isset($font_size) ? $font_size : '22'; ?>',
                fontColor: '<?php echo isset($title_color) ? $title_color : ''; ?>',
            },
            tooltips: {
                callbacks: {
                    label: function (tooltipItem, data) {
                        return 'VIFAST: ' + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function (c, i, a) {
                            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                        }) + ' VND';
                    }
                }
            }
        }
    });

    var chartVifVnIndex = new Chart(ctxVifVnIndex, {
        type: '<?php echo $type; ?>',
        data: {
            labels: label,
            datasets: [
                {
                    label: 'VIFAST',
                    borderColor: '#ffae5f',
                    fill: false,
                    data: dataChart
                },
                {
                    label: 'Vn-Index',
                    borderColor: '#137fff',
                    fill: false,
                    data: dataVnIndex
                }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Biểu đồ tương quan giữa VIFAST và Vn-Index',
                fontSize: '<?php echo $font_size; ?>',
                fontColor: '<?php echo $title_color; ?>',
            },
            scales: {
                yAxes: [{
                    display: false
                }]
            },
            tooltips: {
                callbacks: {
                    label: function (tooltipItem, data) {
                        var datasetIdx = tooltipItem.datasetIndex,
                            isVif = data.datasets[datasetIdx].label === 'VIFAST',
                            price = isVif ? tooltipItem.yLabel : (tooltipItem.yLabel / 10.5);

                        return (isVif ? 'VIFAST: ' : 'Vn-Index: ') + Number(price).toFixed(isVif ? 0 : 2).replace(/./g, function (c, i, a) {
                            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                        }) + (isVif ? ' VND' : '');
                    }
                }
            }
        }
    });
</script>