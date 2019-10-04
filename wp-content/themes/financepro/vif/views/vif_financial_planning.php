<div class="financial-planning">
    <div class="wrap">
        <div class="vc_row vc_row-fluid section-title-content">
            <div class="section-title">
                <h2 class="section-title-holder" style="color:<?php echo esc_attr($title_color); ?>;font-size: <?php echo esc_attr($font_size); ?>px"><?php echo wp_kses_post( $title );?></h2>
            </div>
            <div class="clear"></div>
        </div>
        <div class="vc_row vc_row-fluid">
            <div class="vc_row vc_row-fluid">
                <div class="wpb_column vc_column_container vc_col-sm-3 padding10">
                    Số tiền đầu tư mỗi tháng
                </div>
                <div class="wpb_column vc_column_container vc_col-sm-4 padding10">
                    <input value="2000000" name="price" type="text" style=" border: 1px solid #ccc; 1px;" class="form-control">
                </div>
                <div class="wpb_column vc_column_container vc_col-sm-5 padding10">
                    <span>&nbsp;&nbsp;&nbsp;VND</span>
                </div>
            </div>
            <div class="vc_row vc_row-fluid">
                <div class="wpb_column vc_column_container vc_col-sm-3 padding10">
                    Thời gian bạn định đầu tư
                </div>
                <div class="wpb_column vc_column_container vc_col-sm-4 padding10">
                    <select class="form-control" name="year" id="">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
                <div class="wpb_column vc_column_container vc_col-sm-5 padding10">
                    <span>&nbsp;&nbsp;&nbsp;Năm</span>
                </div>
            </div>
            <div class="vc_row vc_row-fluid">
                <div class="wpb_column vc_column_container vc_col-sm-3 padding10">
                    Tăng trưởng NAV của quỹ
                </div>
                <div class="wpb_column vc_column_container vc_col-sm-4 padding10">
                    <input value="20" name="profit" type="text" class="form-control" style=" border: 1px solid #ccc; 1px;">
                </div>
                <div class="wpb_column vc_column_container vc_col-sm-5 padding10">
                    <span>&nbsp;&nbsp;&nbsp;%</span>
                </div>
            </div>
            <br>
            <div class="vc_row vc_row-fluid">
                <div class="wpb_column vc_column_container vc_col-sm-3 padding10">
                    <span>&nbsp;</span>
                </div>
                <div class="wpb_column vc_column_container vc_col-sm-4 padding10">
                    <button type="button" class="btn btn-danger" id="show-result">Xem kết quả</button>
                </div>
                <div class="wpb_column vc_column_container vc_col-sm-5 padding10">
                    <span>&nbsp;</span>
                </div>
            </div>
        </div>
        <br>
        <div class="vc_row vc_row-fluid">
            <table class="financial-result small border-bold hide">
                <thead>
                <tr>
                    <th class="text-center">Năm</th>
                    <th class="text-center">Số tiền đầu tư mỗi tháng</th>
                    <th class="text-center">Lãi suất thực nhận trong năm</th>
                    <th class="text-center">Tổng giá trị đầu tư tích lũy</th>
                </tr>
                </thead>
                <tbody class="financial-table">
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="loader" class="hide"></div>
<div id="overlay" class="hide"></div>
<script src="<?php echo get_template_directory_uri() . '/vif/assets/js/jquery-1.12.4.min.js' ?>"></script>
<script type="application/javascript">
    $(document).ready(function () {
        $('#show-result').click(function () {
            var investAmountPerMonth = $('input[name="price"]').val(),
                investYear = $('select[name="year"]').val(),
                interestRate = $('input[name="profit"]').val();

            if (isNaN(investAmountPerMonth) || investAmountPerMonth <= 0 || isNaN(investYear) || investYear <= 0 || isNaN(interestRate) || interestRate <= 0) {
                $('.financial-table').empty();
                $('.financial-result').addClass('hide');
                hideLoading();
                return false;
            }
            showLoading();
            setTimeout(function () {
                calculate(investAmountPerMonth, investYear, interestRate);
                hideLoading();
            }, 1000);
        });
    });

    function calculate(investAmountPerMonth, investYear, interestRate) {
        if (isNaN(investAmountPerMonth) || investAmountPerMonth <= 0 || isNaN(investYear) || investYear <= 0 || isNaN(interestRate) || interestRate <= 0) {
            $('.financial-table').empty();
            $('.financial-result').addClass('hide');
            hideLoading();
            return false;
        }
        var html = '', tmpValue = investAmountPerMonth;
        for (var year = 1; year <= investYear; year++) {
            for (var month = 1; month <= 12; month++) {
                tmpValue = parseFloat(tmpValue) + (tmpValue * interestRate * 0.7 / 12 / 100) + parseFloat(investAmountPerMonth);
            }
            html += '<tr>' +
                '<td align="center">' + year + '</td>' +
                '<td align="center">' + number_format(investAmountPerMonth) + '</td>' +
                '<td align="center">' + interestRate * 0.7 + '%</td>' +
                '<td align="center">' + number_format(tmpValue) + '</td>' +
                '</tr>';
        }
        $('.financial-table').empty().append(html);
        $('.financial-result').removeClass('hide');
    }

    function number_format(number) {
        return Number(number).toFixed(0).replace(/./g, function (c, i, a) {
            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
        })
    }

    function showLoading() {
        $('#loader').removeClass('hide');
        $('#overlay').removeClass('hide');
    }

    function hideLoading() {
        $('#loader').addClass('hide');
        $('#overlay').addClass('hide');
    }
</script>