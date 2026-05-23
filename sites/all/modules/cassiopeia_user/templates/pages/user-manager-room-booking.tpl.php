<?php
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/manager-room-booking.js', ['weight' => 1000]);
drupal_add_js("https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js", ['weight' => 1000]);
drupal_add_css("https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css", ['weight' => 1000]);
//db_delete("tbl_room_booking")->execute();
//db_delete("tbl_room_booking_detail")->execute();
$cache = isset($_REQUEST['data'])?$_REQUEST['data']:array();
if(empty($cache['date_filter'])){
    $cache['date_filter'] = "thismonth";
}
$month_options = array();
for($i=REQUEST_TIME-(12*30*86400);$i<=REQUEST_TIME;$i+=86400*30){
    $month_options[date("m-Y",$i)] = date("m/Y",$i);
}
?>
<div class="manager-links-tabs">
    <div class="manager-links-tabs-content">
        <ul class="nav">
            <li class="ticket-booking">
                <a href="/user/manager/booking">
                    <span class="icon"><img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-23.png" alt=""></span>
                    <span>Vé máy bay</span>
                </a>
            </li>
            <li class="room-booking active">
                <a href="javascript:;">
                    <span class="icon"><img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-24.png" alt=""></span>
                    <span>Đặt phòng</span>
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="page-manager-room-booking">
    <div class="filter-form">
        <?php
        $cassiopeia_room_booking_filter_form = drupal_get_form("cassiopeia_room_booking_filter_form",$cache);
        if($cassiopeia_room_booking_filter_form){
            $cassiopeia_room_booking_filter_form = drupal_render_children($cassiopeia_room_booking_filter_form);
            echo $cassiopeia_room_booking_filter_form;
        }
        ?>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-stripped c-table">
            <thead>
            <tr>
                <?php if(user_has_role(3) || user_has_role(7)|| user_has_role(10)): ?>
                    <th>Tác vụ</th>
                <?php endif; ?>
                <th>Mã đơn hàng</th>
                <th>Ngày tạo</th>
                <th width="7%" >Tình trạng</th>
                <th>Dịch vụ</th>
                <th>Check in</th>
                <th>Số phòng</th>
                <th width="80px">Số đêm</th>
               <th>Đại lý</th>
                <?php if( cassiopeia_hotel_manager_accept()): ?>
                    <th>Sale</th>
                <?php endif; ?>
                <th class="text-right">Giá tiền bán</th>
            </tr>
            </thead>
            <tbody class="result">


            </tbody>
        </table>
    </div>
</div>

<div id="modal_booking_update" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Cập nhật giao dịch : <span class="booking-code"></span></h4>
            </div>
            <div class="modal-body">
                <select name="booking-status" id="content_ddlUp_Status" class="form-control update-status">
                    <option value="OK">Đặt giữ chỗ</option>
                    <option value="FAIL">Đặt chỗ lỗi</option>
                    <option value="PAID">Đã thanh toán</option>
                    <option value="HOLD">Chờ xuất vé</option>
                    <option value="TICKETED">Xuất vé</option>
                    <option value="CANCELED">Hủy đặt chỗ</option>
                </select>
                <div class="booking-update-history">

                </div>
                <textarea name="booking-update-note" id="" cols="30" rows="1" placeholder="Nhập nội dung"></textarea>
                <div class="button">
                    <button data-booking-code="" class="btn btn-primary">Cập nhật</button>
                </div>
            </div>
        </div>

    </div>
</div>