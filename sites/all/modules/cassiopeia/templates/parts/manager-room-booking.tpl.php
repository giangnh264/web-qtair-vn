<?php
global $user;
$arg = arg();
//print_r($arg);
//die;
$data = $variables['data'];
$page = isset($data->page)?$data->page:1;
$date_range = $data->date_range;
$splitter = explode("-",$date_range);
$start_date = trim(str_replace("/","-",$splitter[0]));
$end_date = trim(str_replace("/","-",$splitter[1]));
$sub_query = db_select("cassiopeia_room_booking","cassiopeia_room_booking");
$sub_query->fields("cassiopeia_room_booking");
$sub_query->join("cassiopeia_room_booking_detail","cassiopeia_room_booking_detail","cassiopeia_room_booking_detail.code=cassiopeia_room_booking.code");
$sub_query->addExpression("cassiopeia_room_booking_detail.number_of_room","number_of_quantity");
$sub_query->addExpression("cassiopeia_room_booking_detail.number_of_night","number_of_night");

$query = db_select($sub_query,"tbl_query");
$query->fields("tbl_query");
$query->addField("tbl_query","uid","tbl_query_uid");
if(!empty($data->date_filter&& $data->date_filter!="all")){
    switch ($data->date_filter){
        case "today" :
            $query->condition("tbl_query.created",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME)),strtotime(date("d-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
            break;
        case "yesterday" :
            $query->condition("tbl_query.created",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME-86400)),strtotime(date("d-m-Y 23:59",REQUEST_TIME-86400))),"BETWEEN");
            break;
        case "thismonth" :
            $query->condition("tbl_query.created",array(strtotime(date("01-m-Y 00:00",REQUEST_TIME)),strtotime(date("t-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
            break;
        case "other":
            if(!empty($data->from_date)){
                $query->condition("tbl_query.created",strtotime(date("d-m-Y 00:00",strtotime($data->from_date))),">=");
            }
            if($data->to_date){
                $query->condition("tbl_query.created",strtotime(date("d-m-Y 23:59",strtotime($data->to_date))),"<=");
            }
            break;
    }
}

if(!empty($data->tx_area) && $data->tx_area!="_none"){
    $squery = db_select("taxonomy_term_data","tbl_term");
    $squery->fields("tbl_term");
    $squery->condition("tbl_term.tid",$data->tx_area);

    $query->join("node","tbl_hotel","tbl_hotel.nid=tbl_query.hotel");
    $query->join("field_data_field_tx_area","field_tx_area","field_tx_area.entity_id=tbl_hotel.nid");
    $query->join($squery,"tbl_term","tbl_term.tid=field_tx_area.field_tx_area_tid");
}
if(isset($data->status)&&$data->status!="all"){
    if($data->status == 5 || $data->status == "5"){
        $query->condition("tbl_query.from_date",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME+86400)),strtotime(date("d-m-Y 23:59",REQUEST_TIME+86400))),"BETWEEN");
    }elseif($data->status == 6 || $data->status == "6"){
        $query->condition("tbl_query.to_date",strtotime(date("d-m-Y 23:59",REQUEST_TIME)),"<=");
        $query->condition("tbl_query.status",4,"<>");
    }else{
        $query->condition("tbl_query.status",$data->status);
    }
}
if($data->agent!="all" && !empty($data->agent)){
    $query->condition("tbl_query.uid",$data->agent);
}
if(!empty($data->checkin)){
    $query->condition("tbl_query.from_date",array(strtotime(date("d-m-Y 00:00",strtotime($data->checkin))),strtotime(date("d-m-Y 23:59",strtotime($data->checkin)))),"BETWEEN");
}
if(!empty($data->hotel)){
    $query->join("node","tbl_hotel","tbl_hotel.nid=tbl_query.hotel");
    $query->condition("tbl_hotel.title","%".$data->hotel."%","LIKE");
}
$query->groupBy("tbl_query.code");
$query->orderBy("tbl_query.created","DESC");
$query->addExpression("SUM(tbl_query.number_of_quantity)","quantity");
$query->addExpression("SUM(tbl_query.number_of_night)","night");
//$query->leftJoin("");

$tbl_tran_user_query = db_select("users","tbl_tran_user");
$tbl_tran_user_query->fields("tbl_tran_user",array("uid"));
$tbl_tran_user_query->join("field_data_field_account_code","field_account_code","field_account_code.entity_id=tbl_tran_user.uid");
$tbl_tran_user_query->join("field_data_field_account_transaction_name","field_account_transaction_name","field_account_transaction_name.entity_id=tbl_tran_user.uid");
$tbl_tran_user_query->addField("field_account_transaction_name","field_account_transaction_name_value","tran_user_transaction_name");
$tbl_tran_user_query->addField("field_account_code","field_account_code_value","tran_user_account_code");

$query->leftJoin($tbl_tran_user_query,"tbl_tran_user","tbl_tran_user.uid=tbl_query.tran_user");
$query->fields("tbl_tran_user",array("tran_user_account_code","tran_user_transaction_name"));

//$query->addExpression("SUM(cassiopeia_room_booking_detail.number_of_night)","number_of_night");
if(!cassiopeia_room_booking_manager_accept()){
    $query->condition("tbl_query.uid",$user->uid);
}
//print(date("d-m-Y",strtotime(date("t-m-Y",strtotime("20-".$data->month)))));
$total = $query->execute()->fetchAll();
//_print_r($total);
$limit=100;
$start = ($page-1)*$limit;
$query->range($start,$limit);
$result=$query->execute()->fetchAll();
$total_items = count($total);
$page_count = ceil($total_items/$limit);
//_print_r($result);
?>
<?php if(!empty($result)): ?>
    <?php foreach($result as $item): ?>
        <?php
        $booking = cassiopeia_room_booking_load_by_code($item->code);
        $hotel = node_load($item->hotel);
        $agent = !empty($item->tbl_query_uid)?user_load($item->tbl_query_uid):null;
//        _print_r($agent);
        $sale = !empty($agent->field_account_sale['und'][0]['target_id'])?user_load($agent->field_account_sale['und'][0]['target_id']):null;
        $total_price = $item->extraBed+$item->room_price+$item->surcharge_children+$item->surcharge_adult+$item->surcharge_weekend;
        $status = $item->status;
//        if(date('d/m/Y') == date('d/m/Y', $booking->from_date -86400) && $booking->status != 4){
//            $status = 5;
//        }elseif (strtotime(date('Ymd')) >=$booking->from_date && $booking->status != 4){
//            $status = 6;
//        }else{ $status = $booking->status;}
//        $transaction = cassiopeia_qt_alepay_transaction_load($booking->transactionCode);
        ?>
        <tr>
            <?php if(cassiopeia_check_permission("cassiopeia_user_permission_room_booking","p_edit")): ?>
                <td class="">
<!--                    <a title="Sửa đơn hàng" class="btn btn-primary" href="/admin/manager/room/booking/edit/--><?php //echo($item->code); ?><!--"><i class="fa fa-edit"></i></a>-->

                    <button data-booking-code="<?php print($item->code); ?>" class="btn-booking-update btn btn-success" title="Cập nhật tình trạng"><i class="fa fa-check-square-o"></i></button>
                </td>
            <?php endif; ?>
            <td class=""><?php echo($item->code); ?></td>
            <td class=""><?php echo($item->transactionCode); ?></td>
            <td class=""><?php echo date("d/m/Y H:i",$item->created); ?></td>
            <td class="room-booking-<?php echo($status); ?> room-booking-status text-center" data-code="<?php echo $item->code; ?>">
                <span>
                    <?php
                    switch ($status){
                        case 1: echo "Đặt chỗ" ;break;
                        case 2: echo "Báo giá" ;break;
                        case 3: echo "Đã chốt" ;break;
                        case 4: echo "Thất bại" ;break;
                        case 5: echo "Sắp đi" ;break;
                        case 6: echo "Đã đi" ;break;
                    }
                    ?>
                </span>
            </td>
            <td>
                <div><?php echo($hotel->title); ?></div>

            </td>
            <td>
                <div><?php echo(date("d/m/Y",$item->from_date)); ?></div>
            </td>
            <td style="font-family: OPENSANS_SEMIBOLD;" class="text-center">
                <?php echo($item->quantity); ?>
            </td>
            <td style="font-family: OPENSANS_SEMIBOLD;" class="text-center">
                <?php echo($item->night); ?>
            </td>

            <?php if(cassiopeia_hotel_manager_accept()): ?>
                <td>
                    <?php  print($agent->field_account_code['und'][0]['value']); ?>
                    <?php
                    if(!empty($agent->field_account_transaction_name['und'][0]['value'])){
                        print(" - ");
                        print($agent->field_account_transaction_name['und'][0]['value']);
                    }
                    ?>
                </td>
            <?php endif; ?>
<!--            <td>--><?php //echo !empty($item->updated)?date("d-m-Y H:i",$item->updated):""; ?><!--</td>-->
            <td><?php echo !empty($item->tran_user_transaction_name)?$item->tran_user_account_code." <br> ".$item->tran_user_transaction_name:""; ?></td>
            <td style="text-align: right; font-family: OPENSANS_SEMIBOLD;">
                <?php echo(number_format($item->partner_price,0,",",".")); ?>
            </td>
            <td style="text-align: right; font-family: OPENSANS_SEMIBOLD;">
                <?php echo(number_format($item->alefee,0,",",".")); ?>
            </td>
            <td style="text-align: right; font-family: OPENSANS_SEMIBOLD;">
                <?php echo(number_format($item->partner_price+$item->alefee,0,",",".")); ?>
            </td>
        </tr>
    <?php endforeach; ?>
<tr>
    <td>
        <div class="ajax-pagination">
            <div class="ajax-pagination-container">
                <ul>
                    <?php if($page_count<=3): ?>
                        <?php for($i=1;$i<=$page_count;$i++): ?>
                            <li><span class="ajax-item <?php if($page==$i) print("active"); ?>" data-page="<?php print($i); ?>"><?php print($i); ?></span></li>
                        <?php endfor; ?>
                    <?php else: ?>
                        <?php if($page<=2): ?>
                            <?php for($i=1;$i<=3;$i++): ?>
                                <li><span class="ajax-item <?php if($page==$i) print("active"); ?>" data-page="<?php print($i); ?>"><?php print($i); ?></span></li>
                            <?php endfor; ?>
                            <li><span class="">...</span></li>
                            <li><span class="ajax-item fa fa-angle-right" data-page="<?php print($page+1); ?>"></span></li>
                            <li><span class="ajax-item fa fa-angle-double-right" data-page="<?php print($page_count); ?>"></span></li>
                        <?php else: ?>
                            <?php if($page>=$page_count-1): ?>
                                <li><span class="ajax-item fa fa-angle-double-left" data-page="<?php print(1); ?>"></span></li>
                                <li><span class="ajax-item fa fa-angle-left" data-page="<?php print($page-1); ?>"></span></li>
                                <li><span class="">...</span></li>
                                <?php for($i=$page_count-2;$i<=$page_count;$i++): ?>
                                    <li><span class="ajax-item <?php if($page==$i) print("active"); ?>" data-page="<?php print($i); ?>"><?php print($i); ?></span></li>
                                <?php endfor; ?>
                            <?php else: ?>
                                <li><span class="ajax-item fa fa-angle-double-left" data-page="<?php print(1); ?>"></span></li>
                                <li><span class="ajax-item fa fa-angle-left" data-page="<?php print($page-1); ?>"></span></li>
                                <li><span class="">...</span></li>
                                <?php for($i=$page-1;$i<=$page+1;$i++): ?>
                                    <li><span class="ajax-item <?php if($page==$i) print("active"); ?>" data-page="<?php print($i); ?>"><?php print($i); ?></span></li>
                                <?php endfor; ?>
                                <li><span class="">...</span></li>
                                <li><span class="ajax-item fa fa-angle-right" data-page="<?php print($page+1); ?>"></span></li>
                                <li><span class="ajax-item fa fa-angle-double-right" data-page="<?php print($page_count); ?>"></span></li>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </td>
</tr>
<?php endif; ?>

