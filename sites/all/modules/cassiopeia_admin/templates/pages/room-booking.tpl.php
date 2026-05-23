<?php
$cache = isset($_REQUEST['data'])?$_REQUEST['data']:array();
if(empty($cache['date_filter'])){
    $cache['date_filter'] = "thismonth";
}
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/manager-room-booking.js', ['weight' => 1000]);
drupal_add_js("https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js", ['weight' => 1000]);
drupal_add_css("https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css", ['weight' => 1000]);
drupal_add_js("https://cdn.jsdelivr.net/momentjs/latest/moment.min.js");
drupal_add_js("https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js");
drupal_add_css("https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css");
//db_delete("tbl_room_booking")->execute();
//db_delete("tbl_room_booking_detail")->execute();
ctools_include('modal');
ctools_modal_add_js();
$month_options = array();
for($i=REQUEST_TIME-(12*30*86400);$i<=REQUEST_TIME;$i+=86400*30){
    $month_options[date("m-Y",$i)] = date("m/Y",$i);
}
?>
<div class="page-manager-room-booking">
    <div>
        <a href="/admin/manager/room/booking/add-booking" class="btn btn-primary btn-plus" style="margin-bottom: 20px"><i class="fa fa-plus"></i> Thêm mới</a>
    </div>
    <div class="page-manager-room-booking-container">
        <div class="filter-form" >
            <?php
            $cassiopeia_room_booking_filter_form = drupal_get_form("cassiopeia_room_booking_filter_form",$cache);
            if($cassiopeia_room_booking_filter_form){
                $cassiopeia_room_booking_filter_form = drupal_render_children($cassiopeia_room_booking_filter_form);
                echo $cassiopeia_room_booking_filter_form;
            }
            ?>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-stripped">
                <thead>
                <tr>
                    <th width="7%">Tác vụ</th>
                    <th>Mã đơn hàng</th>
                    <th>Mã GD Alepay</th>
                    <th>Ngày tạo</th>
                    <th>Tình trạng</th>
                    <th>Khách sạn</th>
                    <th>Check in</th>
                    <th width="80px">Số phòng</th>
                    <th width="80px">Số đêm</th>
                    <th>Đại lý</th>
                    <!--                    <th>Ngày cập nhật</th>-->
                    <th>Người thực hiện</th>
                    <th class="text-right">Giá tiền bán</th>
                    <th class="text-right">Phí Alepay</th>
                    <th class="text-right">Tổng tiền</th>
                </tr>
                </thead>
                <tbody class="result">

                </tbody>
            </table>
        </div>
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
                    <!--                    <select name="" id="" class="form-control change-status" data-code="">-->
                    <option value="1">Đặt chỗ</option>
                    <option value="2">Báo giá</option>
                    <option value="3">Đã chốt</option>
                    <option value="4">Thất bại</option>
                    <!--                    </select>-->
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
<span id="current-page" data-page="1"></span>
