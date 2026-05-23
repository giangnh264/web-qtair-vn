<?php
//db_update("tbl_room_booking")->fields(array("tran_user"=>1))->condition("code","KS1613705130")->execute();
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/manager-room-booking-report.js', ['weight' => 1000]);
drupal_add_js("https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js", ['weight' => 1000]);
drupal_add_css("https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css", ['weight' => 1000]);
?>
<div class="page-manager-room-booking-report">
    <div class="filter-form" >
        <?php
        $cassiopeia_room_booking_report_filter_form = drupal_get_form("cassiopeia_room_booking_report_filter_form",array());
        if(!empty($cassiopeia_room_booking_report_filter_form)){
            $cassiopeia_room_booking_report_filter_form = drupal_render_children($cassiopeia_room_booking_report_filter_form);
            echo $cassiopeia_room_booking_report_filter_form;
        }
        ?>
    </div>
    <?php if(user_has_role(3) || user_has_role(7)|| user_has_role(8) || user_has_role(10)): ?>
        <div class="add-block">
            <div class="visible-xs btn-primary"data-toggle="collapse" data-target="#add-form">
                <span class="">Thêm mới báo cáo <span class="fa fa-plus"></span></span>
            </div>
<!--            <div class="add-form" id="add-form" >-->
                <?php
                $cassiopeia_room_booking_report_add_form = drupal_get_form("cassiopeia_room_booking_report_add_form");
                if(!empty($cassiopeia_room_booking_report_add_form)){
                    echo drupal_render($cassiopeia_room_booking_report_add_form);
                }
                ?>
<!--            </div>-->
        </div>
    <?php endif; ?>
    <div class="table-responsive">
        <table class="table table-hovered table-stripped">
            <thead>
                <tr>
                    <th width="110px">Ngày thực hiện</th>
                    <th width="110px">Loại giao dịch</th>
                    <th>Mã GD</th>
                    <th width="100px">CODE</th>
                    <th>Tên khách sạn</th>
                    <th width="100px">Check in</th>
<!--                    <th>Số khách</th>-->
                    <th width="40px">Số đêm phòng</th>
                    <th>Giá bán</th>
                    <?php if(user_has_role(3) || user_has_role(10)): ?>
                        <th>Giá vốn</th>
                        <th>Lợi nhuận</th>
                    <?php endif; ?>
                    <th>Đại lý</th>
                    <th>Người thực hiện</th>
                    <th>Nội dung</th>
                </tr>
            </thead>
            <tbody class="result">
    
            </tbody>
        </table>
    </div>
</div>