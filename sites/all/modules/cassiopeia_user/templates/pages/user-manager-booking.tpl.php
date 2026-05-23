<?php
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/booking.js', ['weight' => 1000]);  
global $user;
$_conditions = array();
if(!empty($_REQUEST['data'])){
    $_conditions = $_REQUEST['data'];
    if(!empty($_conditions['uncheck'][1]) && $_conditions['uncheck'][1]==1){
        $_conditions = array();
    }
}
if(empty($_conditions['date_filter'])){
    $_conditions['date_filter'] = "today";
}
if(!empty($_REQUEST['tel'])){
    $_conditions['tel'] = $_REQUEST['tel'];
}
$_conditions['redirect'] = "user/manager/booking";
$is_agent = false;
if(user_has_role(4,$user) || user_has_role(6,$user)){
    $is_agent = true;
}
?>
<?php
try{
    $query = db_select("tbl_booking","tbl_booking");
    $query -> fields("tbl_booking",array("id"));
    $query->condition("tbl_booking.uid",$user->uid);
    if(!empty($_conditions['date_filter']&& $_conditions['date_filter']!="all")){
        switch ($_conditions['date_filter']){
            case "today" :
                $query->condition("tbl_booking.created",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME)),strtotime(date("d-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
                break;
            case "yesterday" :
                $query->condition("tbl_booking.created",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME-86400)),strtotime(date("d-m-Y 23:59",REQUEST_TIME-86400))),"BETWEEN");
                break;
            case "thismonth" :
                $query->condition("tbl_booking.created",array(strtotime(date("01-m-Y 00:00",REQUEST_TIME)),strtotime(date("t-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
                break;
            case "other":
                if(!empty($_conditions['from_date'])){
                    $query->condition("tbl_booking.created",strtotime(date("d-m-Y 00:00",strtotime($_conditions['from_date']))),">=");
                }
                if($_conditions['to_date']){
                    $query->condition("tbl_booking.created",strtotime(date("d-m-Y 23:59",strtotime($_conditions['to_date']))),"<=");
                }
                break;
        }
    }
    if(!empty($_conditions['booking_code'])){
        $query -> condition("tbl_booking.booking_code",$_conditions['booking_code'],"=");
    }
    if(!empty($_conditions['pnr_code'])){
        $query -> condition("tbl_booking.pnr_code",$_conditions['pnr_code'],"=");
    }
    if(!empty($_conditions['itinerary']) && $_conditions['itinerary']!="all"){
        $query -> condition("tbl_booking.trip_type",$_conditions['itinerary'],"=");
    }
    if(!empty($_conditions['airline'])){
        $query -> condition("tbl_booking.airline","%".$_conditions['airline']."%","LIKE");
    }
    if(!empty($_conditions['start_point'])){
        $query -> condition("tbl_booking.start_point","%".$_conditions['start_point']."%","LIKE");
    }
    if(!empty($_conditions['end_point'])){
        $query -> condition("tbl_booking.end_point","%".$_conditions['end_point']."%","LIKE");
    }
    if(!empty($_conditions['departure_date'])){
        $query -> condition("tbl_booking.departure_date",date("dmY",strtotime($_conditions['departure_date'])),"=");
    }
    if(!empty($_conditions['full_name']) || !empty($_conditions['email'])|| !empty($_conditions['tel'])){
        $query->join("tbl_customer","tbl_customer","tbl_customer.booking_code=tbl_booking.booking_code");
        $query->addField("tbl_customer","Email","Email");
        $query->addField("tbl_customer","LastName","CustomerLastName");
        $query->addField("tbl_customer","FullName","FullName");
        $query->addField("tbl_customer","Phone","CustomerPhone");
        if(!empty($_conditions['email'])){
            $query -> condition("tbl_customer.Email","%".trim($_conditions['email'])."%","LIKE");
        }
        if(!empty($_conditions['tel'])){
            $query -> condition("tbl_customer.Phone","%".trim($_conditions['tel'])."%","LIKE");
        }
        if(!empty($_conditions['full_name'])){
            $query -> condition("tbl_customer.FullName","%".trim($_conditions['full_name'])."%","LIKE");
        }
    }


    if(!empty($_conditions['status']) && $_conditions['status']!="all"){
        $query -> condition("tbl_booking.status",$_conditions['status'],"=");
    }
    if(!empty($_conditions['agent']) && $_conditions['agent']!="all"){
        $query -> condition("tbl_booking.uid",$_conditions['agent'],"=");
    }
    $query -> orderBy("tbl_booking.created","DESC");
    $query -> groupBy("tbl_booking.booking_code");
    $bookings = $query->execute()->fetchAll();

    $limit = !empty($_conditions['item_per_page'])?$_conditions['item_per_page']:50;
    $page = pager_default_initialize(count($bookings), $limit, 0);
    $offset = $limit * $page;
    if(!empty($bookings)){
        $bookings = array_slice($bookings, $offset, $limit);
    }else{
        $bookings=null;
    }
}catch (Exception $e){
    print_r($e);
}
?>
<div class="qt-user-title mb-3">
    <h2 class="heading caption text-uppercase clr-dark">
        Danh sách đặt chỗ
    </h2>
</div>

<div class="qt-user-filter">
    <?php
    $cassiopeia_booking_filter_form  = drupal_get_form("cassiopeia_booking_filter_form",$_conditions);
    if(!empty($cassiopeia_booking_filter_form)){
        $cassiopeia_booking_filter_form = drupal_render($cassiopeia_booking_filter_form);
        print($cassiopeia_booking_filter_form);
    }
    ?>
</div>

<div class="qt-user-table">
    <?php if(!empty($bookings)): ?>
        <?php foreach($bookings as $booking): ?>
            <?php $booking = cassiopeia_qt_ticket_booking_load($booking->id); ?>
            <?php
            $tickets = $booking->tickets;
            ?>
            <div class="table-wrapper mb-2">
                <table class="qt-ticket-face">
                    <tr>
                        <td colspan="4">
                            <div class="qt-ticket-face-term">
                                Thời hạn thanh toán: <?php echo !empty($booking->ExpiryDt)?date("H:i d/m/Y",$booking->ExpiryDt):""; ?>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td rowspan="2">
                            <div class="qt-ticket-face-price">
                                <p>Tổng tiền thanh toán</p>
                                <b><?php echo number_format($booking->price,0,",","."); ?> đ</b>
<!--                                <a class="btn bg-secondary clr-white ff-medium radius-36 mt-2" href="/booking/view/--><?php //echo $booking->booking_code; ?><!--">Xem chi tiết</a>-->
                                <span data-version="2" data-booking-code="<?php echo $booking->booking_code; ?>" class="btn-booking-mail btn btn-warning btn bg-secondary clr-white ff-medium radius-36 mt-2" title="Gửi mail">Xem chi tiết</span>
                            </div>
                        </td>
                    </tr>
                    <?php foreach($tickets as $ticket): ?>
                        <?php $airline  = cassiopeia_get_airline($ticket->AirlineCode); ?>
                        <tr class="qt-ticket-face-info">
                            <td>
                                <div class="qt-ticket-face-type">
                                    <?php cassiopeia_render_airline_logo($ticket->AirlineCode); ?>
                                    <span class="clr-gray-light"> <?php echo $airline->name; ?></span>
                                    <b class="ff-bold"><?php echo $ticket->FlightNumber; ?> - <?php echo cassiopeia_qt_airline_class_load($ticket->AirlineCode,$ticket->Class); ?></b>
                                </div>
                            </td>
                            <td>
                            <span class="ff-medium clr-gray-light"><?php echo _cassiopeia_get_day_off_week($ticket->StartDate); ?>, <?php echo date("d/m/Y",$ticket->StartDate); ?></span>
                                <div class="qt-ticket-face-schedule">
                                    <div>
                                        <b><?php echo $ticket->StartPoint; ?></b>
                                        <span><?php echo date("H:i",$ticket->StartDate); ?></span>
                                    </div>

                                    <div>
                                        <i class="fa-light fa-arrow-right"></i>
                                        <span><?php  echo(floor($ticket->Duration/60)."h ".($ticket->Duration%60)."p"); ?></span>
                                    </div>

                                    <div>
                                        <div>
                                            <b><?php echo $ticket->EndPoint; ?></b>
                                            <span><?php echo date("H:i",$ticket->EndDate); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="qt-ticket-face-list">
                                    <ul class="custom-nav">
                                        <li>
                                            <p>
                                                Trạng thái:
                                                <b class="clr-success"><?php echo cassiopeia_get_status($booking->status); ?></b>
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Mã đơn hàng:
                                                <b class="clr-dark"><?php echo $booking->booking_code; ?></b>
                                            </p>
                                        </li>
                                        <?php if(count($tickets)>1): ?>
                                            <li>
                                                <p>
                                                    Mã đặt chỗ chiều <?php echo $ticket->leg==0?"đi":"về"; ?>:
                                                    <b class="clr-dark"><?php echo $ticket->pnr_code; ?></b>
                                                </p>
                                            </li>
                                        <?php else: ?>
                                            <li>
                                                <p>
                                                    Mã đặt chỗ:
                                                    <b class="clr-dark"><?php echo $ticket->pnr_code; ?></b>
                                                </p>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<script>
    (function ($) {
        $(document).ready(function (e) {
            $(".btn-booking-mail").click(function(){
                var _booking_code = $(this).attr("data-booking-code");
                var DO = $(this).attr("data-DO");
                $.ajax({
                    url:"/cassiopeia/ajax",
                    method:"POST",
                    data:{
                        cmd : "booking-get-mail",
                        booking_code : _booking_code,
                        DO : DO,
                    },
                    success:function(result){
                        $("#modal_booking_mail .block-container").html(result._html);
                        $(".btn-send-mail").attr("data-booking-code",_booking_code);
                        $(".btn-send-mail").attr("data-DO",DO);
                        $("#modal_booking_mail").modal("show");
                    }
                });
            });
            $("#modal_booking_mail .btn-send-mail").click(function(e){
                $(".loading-block").addClass("active");
                var _mail = $(".delivery-mail").val();
                // var _html =  $("#modal_booking_mail .block-container").html();
                var _booking_code = $(this).attr("data-booking-code");
                var _version = $(this).attr("data-version");
                $.ajax({
                    url:"/cassiopeia/ajax",
                    method:"POST",
                    data:{
                        cmd : "booking-send-mail",
                        _mail : _mail,
                        booking_code : _booking_code,
                        version : _version,
                    },
                    success:function(result){
                        $(".loading-block").removeClass("active");
                    }
                });
            });
        });
    })(jQuery);
</script>
<div id="modal_booking_mail" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Gửi mail</h4>
            </div>
            <div class="modal-body">
                <div class="block-container">

                </div>
            </div>
            <div class="modal-footer">
                <input  type="text" class="form-control delivery-mail"> <button class="btn btn-success btn-send-mail">Gửi mail</button>
            </div>
        </div>

    </div>
</div>