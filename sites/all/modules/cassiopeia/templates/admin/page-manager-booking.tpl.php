<?php
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
$is_agent = false;
if(user_has_role(4,$user) || user_has_role(6,$user)){
    $is_agent = true;
}
?>
    <div class="page-admin-manager-booking">
        <?php
        drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/booking.js', ['weight' => 1000]);
        try{
            $sup_query = db_select("tbl_ticket","tbl_ticket");
            $sup_query->fields("tbl_ticket",array("booking_code"));
            $sup_query->addField("tbl_ticket","type","ticket_type");
            $sup_query->addField("tbl_ticket","ticket","tickets");
            $sup_query->addExpression("GROUP_CONCAT(tbl_ticket.StartDate SEPARATOR '||')","StartDates");
            $sup_query -> groupBy("tbl_ticket.booking_code");

            $query = db_select("tbl_booking","tbl_booking");
            $query -> fields("tbl_booking",array("booking_code","pnr_code","created","status","version","airline","trip_type","changed","price","ExpiryDt","data","book_price"));
            $query -> join($sup_query,"tbl_ticket","tbl_ticket.booking_code = tbl_booking.booking_code");
            $query->fields("tbl_ticket");
            $query->join("users","tbl_user","tbl_user.uid=tbl_booking.uid");
            $query->leftJoin("field_data_field_account_transaction_name","field_account_transaction_name","field_account_transaction_name.entity_id=tbl_user.uid");
            $query->leftJoin("field_data_field_account_code","field_account_code","field_account_code.entity_id=tbl_user.uid");
            $query->addField("field_account_transaction_name","field_account_transaction_name_value","agent_transaction_name");
            $query->addField("field_account_code","field_account_code_value","agent_code");
            if(!cassiopeia_booking_manager_accept()){
                $query->condition("tbl_user.uid",$user->uid);
            }
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
            $booking = $query->execute()->fetchAll();
            $limit = !empty($_conditions['item_per_page'])?$_conditions['item_per_page']:50;
            $page = pager_default_initialize(count($booking), $limit, 0);
            $offset = $limit * $page;
            if(!empty($booking)){
                $booking = array_slice($booking, $offset, $limit);
            }else{
                $booking=null;
            }
        }catch (Exception $e){
            print_r($e);
        }
        ?>
        <div class="manager-links-tabs">
            <div class="manager-links-tabs-content">
                <ul class="nav">
                    <li class="ticket-booking active">
                        <a href="javascript:;">
                            <span class="icon"><img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-23.png" alt=""></span>
                            <span>Vé máy bay</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="filter-form">
            <?php
            $cassiopeia_booking_filter_form  = drupal_get_form("cassiopeia_booking_filter_form",$_conditions);
            if(!empty($cassiopeia_booking_filter_form)){
                $cassiopeia_booking_filter_form = drupal_render($cassiopeia_booking_filter_form);
                print($cassiopeia_booking_filter_form);
            }
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
                <?php if(!empty($booking)): ?>
                    <?php foreach($booking as $item): ?>
                        <tr class="hidden"></tr>
                        <tr data-key="<?php print($item->booking_code);?>" class="desktop-detail-row <?php print($item->status); ?>"  data-booking-code="<?php print($item->booking_code); ?>">
                            <td class="visible-xs">
                                <i class="fa fa-plus"></i>
                            </td>
                            <td class="hidden-xs"></td>
                            <td>

                                <?php if(cassiopeia_booking_manager_accept()): ?>
                                    <span type="button" data-booking-code="<?php print($item->booking_code); ?>" class="btn-booking-update btn btn-primary" title="Cập nhật"><i class="fa fa-pencil-square-o"></i></span>
                                <?php endif; ?>
                                <span type="button" data-version="<?php print($item->version); ?>" data-booking-code="<?php print($item->booking_code); ?>" class="btn-booking-mail btn btn-warning" title="Gửi mail"><i class="fa fa-envelope-o"></i></span>

                            </td>
                            <td class="hidden-xs" >
                                <?php print($item->booking_code); ?>
                            </td>
                            <td class="bold"><?php print($item->pnr_code); ?></td>
                            <td class="booking-status <?php print($item->status); ?> ">
                                <?php print(cassiopeia_get_booking_status($item->status)); ?>
                            </td>
                            <td class="hidden-xs"><?php print(date("d/m/Y - H:i",$item->created)); ?></td>

                            <td class="hidden-xs <?php print($item->ExpiryDt<=REQUEST_TIME+3600?"color-red":""); ?>">
                                <?php
                                //                        print($item->status);
                                if($item->status!="FAIL"){
                                    if(!empty($item->ExpiryDt))  print(date("d/m/Y - H:i",$item->ExpiryDt));
                                }
                                ?>
                            </td>
                            <td class=""><?php print($item->airline); ?></td>
                            <td class="hidden-xs"><?php print($item->trip_type); ?></td>
                            <td class="hidden-xs">
                                <?php
                                $temp = $item->StartDates;
                                $StartDates = explode("||",$temp);
                                ?>
                                <?php $flightData = unserialize($item->data);?>
                                <div class="departure">
                                    <?php print(date("d/m - H:i",strtotime($StartDates[0]))); ?> <?php print(!empty($flightData->DepartureFlights)?$flightData->DepartureFlights->DepartureAirportCode:"----"); ?> - <?php if(!empty($flightData->DepartureFlights)) print($flightData->DepartureFlights->DestinationAirportCode); ?>
                                </div>
                                <?php if(!empty($StartDates[1])): ?>
                                    <div class="return">
                                        <?php print(date("d/m - H:i",strtotime($StartDates[1]))); ?> <?php print($flightData->ReturnFlights->DestinationAirportCode); ?> - <?php print($flightData->ReturnFlights->DepartureAirportCode); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <?php  if(cassiopeia_booking_manager_accept()): ?>
                                <td class="hidden-xs">
                                    <?php print($item->agent_code." - ".$item->agent_transaction_name); ?>
                                </td>
                            <?php endif; ?>
                            <td class=" bold text-right">
                                <?php if($item->changed==1 && (user_has_role(3) || user_has_role(7))): ?>
                                    <i class="fa fa-info-circle color-red" title="Giá mới: <?php print(number_format($item->book_price,0,",",".")); ?>"></i>
                                <?php endif; ?>
                                <?php  print(number_format($item->price,0,",",".")); ?>

                            </td>
                        </tr>
                        <tr data-key="<?php print($item->booking_code);?>"  class="mobile-detail-row">
                            <td colspan="6">
                                <table class="footable-details table table-bordered datatable booking-table ">
                                    <tbody>
                                    <tr class="odd new-booking">
                                        <th>Tác vụ</th>
                                        <td style="display: table-cell;">
                                            <!--                        <button data-booking-code="--><?php //print($item->booking_code); ?><!--" class="btn-create-receipts btn btn-info" title="Tạo phiếu thu"><i class="fa fa-floppy-o"></i></button>-->
                                            <?php if(cassiopeia_booking_manager_accept()): ?>
                                                <button data-booking-code="<?php print($item->booking_code); ?>" class="btn-booking-update btn btn-primary" title="Cập nhật"><i class="fa fa-pencil-square-o"></i></button>
                                            <?php endif; ?>
                                            <button data-version="<?php print($item->version); ?>" data-booking-code="<?php print($item->booking_code); ?>" class="btn-booking-mail btn btn-warning" title="Gửi mail"><i class="fa fa-envelope-o"></i></button>
                                            <!--                        <a href="/--><?php //print(!$is_agent?"admin":"user"); ?><!--/manager/booking/detail?booking_code=--><?php //print($item->booking_code) ?><!--"><span class="fa fa-eye"></span></a>-->
                                        </td>
                                    </tr>
                                    <tr class="odd new-booking">
                                        <th>Mã giao dịch</th>
                                        <td style="display: table-cell;">
                                            <?php print($item->booking_code); ?>
                                        </td>
                                    </tr>
                                    <tr class="odd new-booking">
                                        <th>CODE</th>
                                        <td style="display: table-cell;">
                                            <?php print($item->pnr_code); ?>
                                        </td>
                                    </tr>
                                    <tr class="odd new-booking">
                                        <th>Tình trạng</th>
                                        <td style="display: table-cell;">
                                            <?php print(cassiopeia_get_booking_status($item->status)); ?>
                                        </td>
                                    </tr>
                                    <tr class="odd new-booking">
                                        <th>Ngày đặt</th>
                                        <td style="display: table-cell;">
                                            <?php print(date("d/m/Y - H:i",$item->created)); ?>
                                        </td>
                                    </tr>
                                    <tr class="odd new-booking">
                                        <th>Ngày hết hạn</th>
                                        <td style="display: table-cell;">
                                            <?php
                                            //                                    print($item->status);
                                            if($item->status!="FAIL"){
                                                if(!empty($item->ExpiryDt)) print(date("d/m/Y - H:i",$item->ExpiryDt));
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="odd new-booking">
                                        <th>Hãng</th>
                                        <td style="display: table-cell;">
                                            <?php print($item->airline); ?>
                                        </td>
                                    </tr>
                                    <tr class="odd new-booking">
                                        <th>Hành trình</th>
                                        <td style="display: table-cell;">
                                            <?php print($item->trip_type); ?>
                                        </td>
                                    </tr>
                                    <tr class="odd new-booking">
                                        <th>Lịch trình</th>
                                        <td style="display: table-cell;">
                                            <?php if($item->version !=2): ?>
                                                <?php if(!empty($tickets)): ?>
                                                    <?php foreach($tickets as $ticket): ?>
                                                        <?php
                                                        if($ticket->type==1){
                                                            $flight = unserialize($ticket->ticket);
                                                        }else{
                                                            $flight = unserialize($ticket->ticket)['data']->ListFlight[0];
                                                        }
                                                        ?>
                                                        <div>
                                                            <?php print(date("d/m - H:i",strtotime($flight->StartDate))); ?> <?php print($flight->StartPoint); ?> - <?php print($flight->EndPoint); ?>
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if(!empty($tickets)): ?>
                                                    <?php foreach($tickets as $ticket): ?>
                                                        <?php
                                                        $Flight = unserialize($ticket->ticket);
                                                        ?>
                                                        <div>
                                                            <?php print(date("d/m - H:i",strtotime($Flight['StartDate']))); ?> <?php print($Flight['StartPoint']); ?> - <?php print($Flight['EndPoint']); ?>
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr class="odd new-booking">
                                        <th>Đại lý</th>
                                        <td style="display: table-cell;">
                                            <?php print($item->agent_code." - ".$item->agent_transaction_name); ?>
                                        </td>
                                    </tr>
                                    <tr class="odd new-booking">
                                        <th>Giá bán</th>
                                        <td style="display: table-cell;">
                                            <?php print(number_format($item->price,0,",",".")); ?>
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
        <!-- paging-->
        <div class="page">
            <div class="cassiopeia-pagination">
                <div class="cassiopeia-pagination-container">
                    <?php print (theme('pager',  array('tags' => array('«','‹','','›','»'))));?>
                </div>
            </div>
        </div>
        <!--e: paging-->
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
    </div>

<?php
$arg = arg();

?>
<?php if(count($arg)==4): ?>
    <?php
    $receipt_id = $arg['3'];
    $query = db_select("tbl_receipts","tbl_receipts");
    $query -> fields("tbl_receipts");
    $query -> condition("id",$receipt_id,"=");
    $result  = $query -> execute() -> fetchAssoc();
    ?>
    <?php if(!empty($result)): ?>
        <div class="receipt-review">
            <div class="block-container">
                <div class="block-title">
                    <h4>Phiếu thu đã được lập</h4>
                    <a href="/admin/manager/booking" class="close">&times;</a>
                </div>
                <div class="block-inner">
                    <div id="print_content" class="modal-body" style="margin-bottom: 30px;height: 50%;">
                        <table style="width: 100%;">
                            <tbody><tr>
                                <td style="width: 30%; vertical-align: top; font-size: 11px">
                                    <span id="content_lblCompanyName">AUTIC.VN</span><br>
                                    <span id="content_lblCompanyAddress">HA NOI</span>
                                </td>
                                <td style="width: 40%; text-align: center; vertical-align: top">
                                    <span style="font-size: 22px; font-weight: bold">PHIẾU THU</span><br>
                                    <span style="font-size: 12px; font-style: italic">
                                                <span id="content_lblDatetime"><?php print("Ngày "); print(date("d",$result['paid_date'])); ?><?php print(" tháng "); print(date("m",$result['paid_date'])); ?><?php print(" năm "); print(date("Y",$result['paid_date'])); ?></span></span>
                                </td>
                                <td style="width: 30%; vertical-align: top; font-size: 12px">Quyển số:<br>
                                    Số:
                                    <span id="content_lblNumbOfReceipt">AUT2171320-0</span><br>
                                    NỢ:<br>
                                    CÓ:
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div style="font-size: 14px; margin-top: 20px">
                            <table style="width: 100%; table-layout: auto; line-height: 10px; margin: 5px">
                                <tbody><tr>
                                    <td style="width: 1%; white-space: nowrap">Họ, tên người nộp tiền:</td>
                                    <td style="width: 99%">
                                        <div style="border-bottom: 1px dotted black;">
                                            <span id="content_lblPayBy"><?php print($result['payer']); ?></span>
                                        </div>
                                    </td>
                                </tr>
                                </tbody></table>

                            <table style="width: 100%; table-layout: auto; line-height: 10px; margin: 5px">
                                <tbody><tr>
                                    <td style="width: 1%; white-space: nowrap">Địa chỉ:</td>
                                    <td style="width: 99%">
                                        <div style="border-bottom: 1px dotted black;">
                                            <span id="content_lblAddress"><?php print($result['address']); ?></span>
                                        </div>
                                    </td>
                                </tr>
                                </tbody></table>

                            <table style="width: 100%; table-layout: auto; line-height: 10px; margin: 5px">
                                <tbody><tr>
                                    <td style="width: 1%; white-space: nowrap">Lý do thu:</td>
                                    <td style="width: 99%">
                                        <div style="border-bottom: 1px dotted black;">
                                            <span id="content_lblReason"><?php print($result['reason']); ?></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div style="border-bottom: 1px dotted black; margin-top: 7px">
                                            &nbsp;
                                        </div>
                                    </td>
                                </tr>
                                </tbody></table>

                            <table style="width: 100%; table-layout: auto; line-height: 10px; margin: 5px">
                                <tbody><tr>
                                    <td style="width: 1%; white-space: nowrap">Số tiền:</td>
                                    <td style="width: 99%; white-space: nowrap">
                                        <div style="border-bottom: 1px dotted black; padding-right: 100px">
                                            <span id="content_lblMoney"><?php print(number_format($result['price'],0,",",".")); ?> VNĐ</span>
                                        </div>
                                    </td>
                                </tr>

                                </tbody></table>

                            <table style="width: 100%; table-layout: auto; line-height: 10px; margin: 5px">
                                <tbody><tr>
                                    <td style="width: 1%; white-space: nowrap">Viết bằng chữ:</td>
                                    <td style="width: 99%">
                                        <div style="border-bottom: 1px dotted black;">
                                            <span id="content_lblMoneyByCharactors"><?php print($result['price_in_words']); ?></span>
                                        </div>
                                    </td>
                                </tr>
                                </tbody></table>
                        </div>
                        <div style="margin-top: 30px; height: 120px; font-size: 14px">
                            <table style="width: 100%">
                                <tbody><tr>
                                    <td style="width: 33%; text-align: center">
                                        <strong>Người lập phiếu</strong>
                                    </td>
                                    <td style="width: 33%; text-align: center">
                                        <strong>Người thu tiền</strong>
                                    </td>
                                    <td style="width: 33%; text-align: center">
                                        <strong>Người nộp tiền</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 33%; text-align: center">(Ký, họ tên)</td>
                                    <td style="width: 33%; text-align: center">(Ký, họ tên)</td>
                                    <td style="width: 33%; text-align: center">(Ký, họ tên)</td>
                                </tr>
                                <tr>
                                    <td style="width: 33%; text-align: center">&nbsp;</td>
                                    <td style="width: 33%; text-align: center">&nbsp;</td>
                                    <td style="width: 33%; text-align: center">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="width: 33%; text-align: center">&nbsp;</td>
                                    <td style="width: 33%; text-align: center">&nbsp;</td>
                                    <td style="width: 33%; text-align: center">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="width: 33%; text-align: center">&nbsp;</td>
                                    <td style="width: 33%; text-align: center">&nbsp;</td>
                                    <td style="width: 33%; text-align: center">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="width: 33%; text-align: center">
                                        <span id="content_lblCreatedBy"><?php print($result['user_created']); ?></span>
                                    </td>
                                    <td style="width: 33%; text-align: center">
                                        <span id="content_lblReceiveBy"><?php print($result['cashier']); ?></span></td>
                                    <td style="width: 33%; text-align: center">
                                        <span id="content_lblPayBySignature"><?php print($result['payer']); ?></span></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <p></p>
                        <p></p>
                        <p></p>
                        <p></p>
                        <p></p>
                        <p></p>
                        <p></p>
                        <p></p>
                    </div>

                    <div class="buttons">
                        <button class="btn btn-primary">In phiếu thu</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>