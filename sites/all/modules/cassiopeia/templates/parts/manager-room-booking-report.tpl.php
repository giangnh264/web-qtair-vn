<?php
global $user;
$data = $variables['data'];
$page = isset($data->page)?$data->page:1;

$tbl_room_booking_detail_query = db_select("tbl_room_booking_detail","tbl_room_booking_detail");
$tbl_room_booking_detail_query->fields("tbl_room_booking_detail",array("code"));
$tbl_room_booking_detail_query->addExpression("MAX(tbl_room_booking_detail.from_date)","check_in");
$tbl_room_booking_detail_query->addExpression("MAX(tbl_room_booking_detail.to_date)","check_out");
$tbl_room_booking_detail_query->groupBy("code");

$query = db_select("tbl_room_booking_report","tbl_room_booking_report");
$query->fields("tbl_room_booking_report");
$query->orderBy("tbl_room_booking_report.created","DESC");
$query->leftJoin($tbl_room_booking_detail_query,"tbl_room_booking_detail","tbl_room_booking_detail.code=tbl_room_booking_report.booking_code");
$query->fields("tbl_room_booking_detail");
if(!empty($data->date_filter&& $data->date_filter!="all")){
    switch ($data->date_filter){
        case "today" :
            $query->condition("tbl_room_booking_report.created",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME)),strtotime(date("d-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
            break;
        case "yesterday" :
            $query->condition("tbl_room_booking_report.created",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME-86400)),strtotime(date("d-m-Y 23:59",REQUEST_TIME-86400))),"BETWEEN");
            break;
        case "thismonth" :
            $query->condition("tbl_room_booking_report.created",array(strtotime(date("01-m-Y 00:00:00",REQUEST_TIME)),strtotime(date("t-m-Y 23:59:59",REQUEST_TIME))),"BETWEEN");
            break;
        case "other":
            if(!empty($data->from_date)){
                $query->condition("tbl_room_booking_report.created",strtotime(date("d-m-Y 00:00",strtotime($data->from_date))),">=");
            }
            if($data->to_date){
                $query->condition("tbl_room_booking_report.created",strtotime(date("d-m-Y 23:59",strtotime($data->to_date))),"<=");
            }
            break;
    }
}
if(!empty($data->booking_code)){
    $query->condition("tbl_room_booking_report.booking_code","%".trim($data->booking_code)."%","LIKE");
}
if(!empty($data->hotel)){
    $query->join("node","tbl_hotel","tbl_hotel.nid=tbl_room_booking_report.hotel");
    $query->condition("tbl_hotel.title","%".$data->hotel."%","LIKE");
}
if($data->agent!="all"){
    $query->condition("tbl_room_booking_report.agent",$data->agent);
}
if($data->tran_user!="all"){
    $query->condition("tbl_room_booking_report.tran_user",$data->tran_user);
}
if(!empty($data->month)){
    $query->condition("tbl_room_booking_report.created",array(strtotime("01-".$data->month),strtotime(date("t-m-Y",strtotime("20-".$data->month)))),"BETWEEN");
}
if(!cassiopeia_room_booking_report_accept()){
    $query->condition("agent",$user->uid);
}
//$query->addExpression("SUM()");
$total = $query->execute()->fetchAll();
//_print_r($total);
$limit=100;
$start = ($page-1)*$limit;
$query->range($start,$limit);
$result=$query->execute()->fetchAll();
//_print_r($result);
$total_items = count($total);
$page_count = ceil($total_items/$limit);
$TotalNight = 0;
$TotalPrice = 0;
$TotalCost = 0;
$TotalRevenue = 0;
?>
<?php if(!empty($result)): ?>
    <?php foreach($result as $item): ?>
        <?php
//    _print_r($item);
        $hotel = node_load($item->hotel);
        $agent = !empty($item->agent)?user_load($item->agent):null;
        $tran_user = !empty($item->tran_user)?user_load($item->tran_user):null;
        $sale = !empty($agent->field_account_sale['und'][0]['target_id'])?user_load($agent->field_account_sale['und'][0]['target_id']):null;
        $total_price = $item->extraBed+$item->VAT+$item->room_price+$item->surcharge_children;
        $TotalNight+=$item->quantity_night;
        $TotalPrice+=$item->partner_price;
        $TotalRevenue+=$item->revenue;
        $TotalCost+=$item->price;
        ?>
        <tr>
            <td><?php echo(date("d/m/Y",$item->created)); ?></td>
            <td>
                <?php
                $tran_kind = cassiopeia_get_tran_kind_by_id($item->tran_kind);
                if(!empty($tran_kind)){
                    print($tran_kind['name']);
                }
                ?>
            </td>
            <td><?php echo($item->booking_code); ?></td>
            <td><?php echo($item->room_code); ?></td>
            <td><?php echo($hotel->title); ?></td>
            <td><?php echo !empty($item->check_in)?date("d-m-Y",$item->check_in):""; ?></td>
            <td class="text-center"><?php echo($item->quantity_night); ?></td>
            <td> <?php echo(number_format($item->partner_price,0,",",".")); ?></td>
            <?php if(user_has_role(3) || user_has_role(10)): ?>
                <td> <?php echo(number_format($item->price,0,",",".")); ?></td>
                <td>
                    <?php echo(number_format($item->revenue,0,",",".")); ?>
                </td>
            <?php endif; ?>

            <td>
                <?php echo(!empty($agent)?$agent->field_account_code['und'][0]['value']." - ".$agent->field_account_transaction_name['und'][0]['value']:$agent->mail); ?>
            </td>
            <td>
                <?php echo(!empty($tran_user)?$tran_user->field_account_transaction_name['und'][0]['value']:"2"); ?>
            </td>
            <td>
                <?php echo !empty($item->note)?$item->note:""; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="7"><b>Tổng số đêm</b></td>
        <td><b><?php echo $TotalNight ?></b></td>
        <td  colspan="2"><b><?php echo number_format($TotalPrice,0,',','.') ?></b></td>
        <?php if(user_has_role(3) || user_has_role(10)): ?>
            <td><b><?php echo number_format($TotalCost,0,',','.') ?></b></td>
            <td><b><?php echo number_format($TotalRevenue,0,',','.') ?></b></td>
        <?php endif; ?>
    </tr>
<?php endif; ?>
