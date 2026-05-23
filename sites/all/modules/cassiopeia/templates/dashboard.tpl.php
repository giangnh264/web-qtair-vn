<?php
drupal_add_js("https://cdn.jsdelivr.net/momentjs/latest/moment.min.js");
drupal_add_js("https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js");
drupal_add_css("https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css");
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/admin-dashboard.js', ['weight' => 1000]);
$today = date("d/m/Y",REQUEST_TIME);
$start = date("d/m/Y",strtotime(date("d-m-Y",REQUEST_TIME)." - 14 days"));
?>
<input type="hidden" id="dateRange" start="<?php echo $start ?>" end="<?php echo $today ?>">
<div class="page-dashboard">
    <div class="rows">
        <div class="item col-md-6">
            <div class="ticket-block">
                <div class="block-title">
                    <h3>Số đơn máy bay</h3>
                    <div class="ticket-date-range data-range-custom">
                        <input type="text" id="ticket-booking-date-range" class="form-control date-range-custom">
                    </div>
                </div>
                <div class="block-chart" style="">

                </div>
            </div>
        </div>
<!--        <div class="item col-md-6">-->
<!--            <div class="ticket-block">-->
<!--                <div class="block-title">-->
<!--                    <h3>Số đơn đặt phòng</h3>-->
<!--                    <div class="ticket-date-range data-range-custom">-->
<!--                        <input type="text" id="room-booking-date-range" class="form-control date-range-custom">-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="block-chart" style="">-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
        <div class="item col-md-6">
            <div class="partner-report-block">
                <div class="block-title">
                    <h3>Báo cáo đại lý</h3>
                    <div class="ticket-date-range data-range-custom">
                        <input type="text" id="partner-report-date-range" class="form-control date-range-custom">
                    </div>
                </div>
                <div class="block-chart">

                </div>
            </div>
        </div>
        <div class="item col-md-12">
            <div class="revenue-report-block">
                <div class="block-title">
                    <h3>Báo cáo doanh thu</h3>
                    <div class="ticket-date-range data-range-custom">
                        <input type="text" id="revenue-report-date-range" class="form-control date-range-custom">
                    </div>
                </div>
                <div class="loading-gif"></div>
                <div class="block-chart">
                    <?php
                    $image_url = image_style_url("style_502x502","public://smQH.png");
                    ?>
                    <img src="<?php echo $image_url; ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
