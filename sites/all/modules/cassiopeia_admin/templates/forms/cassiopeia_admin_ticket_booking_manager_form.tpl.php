<?php
global $user;
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/booking.js', ['weight' => 1000]);
drupal_add_js(drupal_get_path("module","cassiopeia_admin")."/templates/js/pagination.js");


$cache = $form['#cache'];
$page = $form['page']['#value'];
$num_per_page = 50;
$start = ($page - 1) * $num_per_page;


$is_agent = false;
if(user_has_role(4,$user) || user_has_role(6,$user)){
    $is_agent = true;
}
?>
<?php

try{
    $query = db_select("tbl_booking","tbl_booking");
    $query -> fields("tbl_booking",array("id","pnr_code","created","status","version","airline","trip_type","changed","price","ExpiryDt","data","book_price","uid","DO"));

    if(!cassiopeia_booking_manager_accept()){
        $query->condition("tbl_user.uid",$user->uid);
    }
    if(!empty($cache['date_filter']&& $cache['date_filter']!="all")){
//        _print_r($cache['date_filter']);
        switch ($cache['date_filter']){
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
//                _print_r($form['from_date']['#value']['date']);
                if(!empty($form['from_date']['#value']['date'])){
                    $query->condition("tbl_booking.created",strtotime(date("d-m-Y 00:00",strtotime($form['from_date']['#value']['date']))),">=");
                }
                if($form['to_date']['#value']['date']){
                    $query->condition("tbl_booking.created",strtotime(date("d-m-Y 23:59",strtotime($form['to_date']['#value']['date']))),"<=");
                }
                break;
        }
    }
    if(!empty($cache['booking_code'])){
        $query -> condition("tbl_booking.booking_code",$cache['booking_code'],"=");
    }
    if(!empty($cache['pnr_code'])){
        $query -> condition("tbl_booking.pnr_code",$cache['pnr_code'],"=");
    }
    if(!empty($cache['itinerary']) && $cache['itinerary']!="all"){
        $query -> condition("tbl_booking.trip_type",$cache['itinerary'],"=");
    }
    if(!empty($cache['airline'])){
        $query -> condition("tbl_booking.airline","%".trim($cache['airline'])."%",'LIKE');
    }
    if(!empty($cache['start_point'])){
        $query -> condition("tbl_booking.start_point","%".$cache['start_point']."%","LIKE");
    }
    if(!empty($cache['end_point'])){
        $query -> condition("tbl_booking.end_point","%".$cache['end_point']."%","LIKE");
    }
    if(!empty($cache['departure_date'])){
        $query -> condition("tbl_booking.departure_date",date("dmY",strtotime($cache['departure_date'])),"=");
    }
    if(!empty($cache['full_name']) || !empty($cache['email'])|| !empty($cache['tel'])){
        $query->join("tbl_customer","tbl_customer","tbl_customer.booking_code=tbl_booking.booking_code");
        $query->addField("tbl_customer","FirstName","CustomerFirstName");
        $query->addField("tbl_customer","LastName","CustomerLastName");
        $query->addField("tbl_customer","Phone","CustomerPhone");
        if(!empty($cache['email'])){
            $query -> condition("tbl_customer.Email","%".trim($cache['email'])."%","LIKE");
        }
        if(!empty($cache['tel'])){
            $query -> condition("tbl_customer.Phone","%".trim($cache['tel'])."%","LIKE");
        }
        $query -> condition("tbl_customer.FullName","%".trim($cache['full_name'])."%","LIKE");
    }


    if(!empty($cache['status']) && $cache['status']!="all"){
        $query -> condition("tbl_booking.status",$cache['status'],"=");
    }
    if(!empty($cache['agent']) && $cache['agent']!="all"){
        $query -> condition("tbl_booking.uid",$cache['agent'],"=");
    }
    $query -> orderBy("tbl_booking.created","DESC");
    $query -> groupBy("tbl_booking.booking_code");
    $count = $query->execute()->fetchAll();
    $total_count = count($count);
    $query->range($start,$num_per_page);
    $bookings = $query->execute()->fetchAll();
    $page_count = ceil($total_count/$num_per_page);
}catch (Exception $e){
    print_r($e);
}
?>
<div class="filter-form">
    <?php
    echo drupal_render_children($form);
    ?>
    <div class="from-date">

    </div>
</div>
<p class="c-red ff-italic fs-12">* Đây chỉ là Danh sách đặt chỗ mang tính tham khảo. Tình trạng xuất vé có thể chưa đúng như báo cáo xuất vé. Đại lý cần xem lại thông tin vé dể biết chắc chắn tình trạng chỗ.</p>
<div class="table-responsive">
    <table class="table table-hover c-table">
        <thead>
        <tr>
            <th colspan="2" width="60px">Tác vụ</th>
            <th class="hidden-xs">Mã giao dịch</th>
            <th>CODE</th>
            <th class="">Tình trạng</th>
            <th class="hidden-xs">Ngày đặt</th>
            <th class="hidden-xs">Ngày hết hạn</th>
            <th class="">Hãng</th>
            <th class="hidden-xs">Hành trình</th>
            <th class="hidden-xs">Lịch trình</th>
            <?php  if(cassiopeia_booking_manager_accept()): ?>
                <th class="hidden-xs">Đại lý</th>
            <?php endif; ?>
            <th class="">Giá bán</th>
        </tr>
        </thead>
        <tbody>
        <?php if(!empty($bookings)): ?>
            <?php foreach($bookings as $item): ?>
                <?php $booking = cassiopeia_qt_ticket_booking_load($item->id);?>
                <?php
//            _print_r($booking);
                $agent = user_load($item->uid);
                $agent_code = !empty($agent->field_account_code['und'][0]['value'])?$agent->field_account_code['und'][0]['value']:"";
                $agent_transaction_name = !empty($agent->field_account_transaction_name['und'][0]['value'])?$agent->field_account_transaction_name['und'][0]['value']:"";
                ?>
                <tr class="hidden"></tr>
                <tr data-key="<?php print($booking->booking_code);?>" class="desktop-detail-row <?php print($booking->status); ?>"  data-booking-code="<?php print($booking->booking_code); ?>">
                    <td class="visible-xs">
                        <i class="fa fa-plus"></i>
                    </td>
                    <td class="hidden-xs"></td>
                    <td>

                        <?php if(cassiopeia_booking_manager_accept()): ?>
                            <span data-booking-code="<?php print($booking->booking_code); ?>" class="btn-booking-update btn btn-primary" title="Cập nhật"><i class="fa fa-pencil-square-o"></i></span>
                        <?php endif; ?>
                        <span data-version="<?php print($booking->version); ?>" data-booking-code="<?php print($booking->booking_code); ?>" class="btn-booking-mail btn btn-warning" title="Gửi mail"><i class="fa fa-envelope-o"></i></span>

                    </td>
                    <td class="hidden-xs" >
                        <?php print($booking->booking_code); ?>
                    </td>
                    <td class="bold"><?php echo $booking->pnr_code; ?></td>
                    <td class="booking-status <?php print($booking->status); ?> ">
                        <?php print(cassiopeia_get_booking_status($booking->status)); ?>
                    </td>
                    <td class="hidden-xs"><?php print(date("d/m/Y - H:i",$booking->created)); ?></td>

                    <td class="hidden-xs <?php print($booking->ExpiryDt<=REQUEST_TIME+3600?"color-red":""); ?>">
                        <?php
                        if($booking->status!="FAIL"){
                            if(!empty($booking->ExpiryDt))  echo(date("d/m/Y - H:i",$booking->ExpiryDt));
                        }
                        ?>
                    </td>
                    <td class=""><?php echo $booking->airline;?></td>
                    <td class="hidden-xs"><?php print($booking->trip_type); ?></td>
                    <td class="hidden-xs">
<!--                        --><?php //if($booking->DO==1): ?>
                            <?php foreach($booking->tickets as $ticket):?>
                                <div class="<?php echo strtolower($ticket->Itinerary); ?>">
                                    <?php echo date("d/m/Y H:i",$ticket->StartDate); ?> <?php echo $ticket->StartPoint; ?> - <?php echo $ticket->EndPoint; ?>
                                </div>
                            <?php endforeach; ?>
<!--                        --><?php //else: ?>

<!--                        --><?php //endif; ?>
                    </td>
                    <?php  if(cassiopeia_booking_manager_accept()): ?>
                        <td class="hidden-xs">
                            <?php echo $agent_code." - ".$agent_transaction_name; ?>
                        </td>
                    <?php endif; ?>
                    <td class=" bold text-right">
                        <?php if($booking->changed==1 && (user_has_role(3) || user_has_role(7))): ?>
                            <i class="fa fa-info-circle color-red" title="Giá mới: <?php print(number_format($booking->book_price,0,",",".")); ?>"></i>
                        <?php endif; ?>
                        <?php  print(number_format($booking->price,0,",",".")); ?>

                    </td>
                </tr>
                <tr data-key="<?php print($booking->booking_code);?>"  class="mobile-detail-row">
                    <td colspan="6">
                        <table class="footable-details table table-bordered datatable booking-table ">
                            <tbody>
                            <tr class="odd new-booking">
                                <th>Tác vụ</th>
                                <td style="display: table-cell;">
                                    <!--                        <button data-booking-code="--><?php //print($booking->booking_code); ?><!--" class="btn-create-receipts btn btn-info" title="Tạo phiếu thu"><i class="fa fa-floppy-o"></i></button>-->
                                    <?php if(cassiopeia_booking_manager_accept()): ?>
                                        <button data-booking-code="<?php print($booking->booking_code); ?>" class="btn-booking-update btn btn-primary" title="Cập nhật"><i class="fa fa-pencil-square-o"></i></button>
                                    <?php endif; ?>
                                    <button data-DO="<?php print($booking->DO); ?>" data-booking-code="<?php print($booking->booking_code); ?>" class="btn-booking-mail btn btn-warning" title="Gửi mail"><i class="fa fa-envelope-o"></i></button>
                                    <!--                        <a href="/--><?php //print(!$is_agent?"admin":"user"); ?><!--/manager/booking/detail?booking_code=--><?php //print($booking->booking_code) ?><!--"><span class="fa fa-eye"></span></a>-->
                                </td>
                            </tr>
                            <tr class="odd new-booking">
                                <th>Mã giao dịch</th>
                                <td style="display: table-cell;">
                                    <?php print($booking->booking_code); ?>
                                </td>
                            </tr>
                            <tr class="odd new-booking">
                                <th>CODE</th>
                                <td style="display: table-cell;">
                                    <?php print($booking->pnr_code); ?>
                                </td>
                            </tr>
                            <tr class="odd new-booking">
                                <th>Tình trạng</th>
                                <td style="display: table-cell;">
                                    <?php print(cassiopeia_get_booking_status($booking->status)); ?>
                                </td>
                            </tr>
                            <tr class="odd new-booking">
                                <th>Ngày đặt</th>
                                <td style="display: table-cell;">
                                    <?php print(date("d/m/Y - H:i",$booking->created)); ?>
                                </td>
                            </tr>
                            <tr class="odd new-booking">
                                <th>Ngày hết hạn</th>
                                <td style="display: table-cell;">
                                    <?php
                                    //                                    print($booking->status);
                                    if($booking->status!="FAIL"){
                                        if(!empty($booking->ExpiryDt)) print(date("d/m/Y - H:i",$booking->ExpiryDt));
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr class="odd new-booking">
                                <th>Hãng</th>
                                <td style="display: table-cell;">
                                    <?php print($booking->airline); ?>
                                </td>
                            </tr>
                            <tr class="odd new-booking">
                                <th>Hành trình</th>
                                <td style="display: table-cell;">
                                    <?php print($booking->trip_type); ?>
                                </td>
                            </tr>
                            <tr class="odd new-booking">
                                <th>Lịch trình</th>
                                <td style="display: table-cell;">
                                    <!--                                            --><?php //if($item->version !=2): ?>
                                    <!--                                                --><?php //if(!empty($tickets)): ?>
                                    <!--                                                    --><?php //foreach($tickets as $ticket): ?>
                                    <!--                                                        --><?php
                                    //                                                        if($ticket->type==1){
                                    //                                                            $flight = unserialize($ticket->ticket);
                                    //                                                        }else{
                                    //                                                            $flight = unserialize($ticket->ticket)['data']->ListFlight[0];
                                    //                                                        }
                                    //                                                        ?>
                                    <!--                                                        <div>-->
                                    <!--                                                            --><?php //print(date("d/m - H:i",strtotime($flight->StartDate))); ?><!-- --><?php //print($flight->StartPoint); ?><!-- - --><?php //print($flight->EndPoint); ?>
                                    <!--                                                        </div>-->
                                    <!--                                                    --><?php //endforeach; ?>
                                    <!--                                                --><?php //endif; ?>
                                    <!--                                            --><?php //else: ?>
                                    <!--                                                --><?php //if(!empty($tickets)): ?>
                                    <!--                                                    --><?php //foreach($tickets as $ticket): ?>
                                    <!--                                                        --><?php
                                    //                                                        $Flight = unserialize($ticket->ticket);
                                    //                                                        ?>
                                    <!--                                                        <div>-->
                                    <!--                                                            --><?php //print(date("d/m - H:i",strtotime($Flight['StartDate']))); ?><!-- --><?php //print($Flight['StartPoint']); ?><!-- - --><?php //print($Flight['EndPoint']); ?>
                                    <!--                                                        </div>-->
                                    <!--                                                    --><?php //endforeach; ?>
                                    <!--                                                --><?php //endif; ?>
                                    <!--                                            --><?php //endif; ?>
                                </td>
                            </tr>
                            <tr class="odd new-booking">
                                <th>Đại lý</th>
                                <td style="display: table-cell;">
                                    <?php print($booking->agent_code." - ".$booking->agent_transaction_name); ?>
                                </td>
                            </tr>
                            <tr class="odd new-booking">
                                <th>Giá bán</th>
                                <td style="display: table-cell;">
                                    <?php print(number_format($booking->price,0,",",".")); ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>
<div class="ajax-pagination">
    <div class="ajax-pagination-container">
        <ul>
            <?php for($i=1;$i<=$page_count;$i++): ?>
                <li><span class="ajax-item <?php if($page==$i) print("active"); ?>" data-page="<?php print($i); ?>"><?php print($i); ?></span></li>
            <?php endfor; ?>
        </ul>
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
