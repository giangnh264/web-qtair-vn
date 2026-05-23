<?php
$cache = $variables['cache'];
//_print_r($cache);
$month = !empty($cache['month'])?$cache['month']:"all";
$year = !empty($cache['year'])?$cache['year']:date("m",REQUEST_TIME);
try{
    $issue_query = db_select("tbl_issue_report","tbl_issue_report");
    $issue_query->fields("tbl_issue_report",array("created"));
    $issue_query->addExpression("1","type");
    $issue_query->addField("tbl_issue_report","date","date");
    $issue_query->addField("tbl_issue_report","partner_price","partner_price");
    $issue_query->addField("tbl_issue_report","price","price");
    $issue_query->addField("tbl_issue_report","quantity","quantity");

    $room_query = db_select("tbl_room_booking_report","tbl_room_booking_report");
    $room_query->fields("tbl_room_booking_report",array("created"));
    $room_query->addExpression("2","type");
    $room_query->addField("tbl_room_booking_report","created","date");
    $room_query->addField("tbl_room_booking_report","partner_price","partner_price");
    $room_query->addField("tbl_room_booking_report","price","price");
    $room_query->addField("tbl_room_booking_report","quantity_night","quantity");
    $daily_sub_query = Database::getConnection()
        ->select($issue_query->union($room_query))
        ->fields(NULL, array("date","type","partner_price","price","quantity"));
//    if(!empty($date_filter && $date_filter!="all")){
//        $first_day_of_moth = strtotime(date('Y-m-01 00:00:00',strtotime("01-".$date_filter)));
//        $last_day_of_moth = strtotime(date("Y-m-t 23:59:59",strtotime("01-".$date_filter)));
//        $daily_sub_query ->condition("date",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
//    }
    if($month=="all"){ // thống kê theo tháng
        $first_day_of_moth = strtotime(date('Y-01-01 00:00:00',strtotime("01-01-".$year)));
        $last_day_of_moth = strtotime(date("Y-12-31 23:59:59",strtotime("01-01-".$year)));
        $daily_sub_query ->condition("date",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
        $daily_sub_query->addExpression("DATE_FORMAT(FROM_UNIXTIME(date), '%m') ","cr");
    }else{ // thống kê theo ngày
        $first_day_of_moth = strtotime(date('Y-m-01 00:00:00',strtotime("01-".$month."-".$year)));
        $last_day_of_moth = strtotime(date("Y-m-t 23:59:59",strtotime("01-".$month."-".$year)));
        $daily_sub_query ->condition("date",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
        $daily_sub_query->addExpression("DATE_FORMAT(FROM_UNIXTIME(date), '%d-%m-%Y') ","cr");
    }
    $daily_query = db_select($daily_sub_query,"tbl_daily_query");
    $daily_query->fields("tbl_daily_query");
    $daily_query->groupBy("cr");
    $daily_query->addExpression("SUM(tbl_daily_query.partner_price)","total_partner_price");
    $daily_query->addExpression("SUM(tbl_daily_query.price)","total_price");
    $daily_query->addExpression("SUM(tbl_daily_query.partner_price-tbl_daily_query.price)","total_revenue");
    $daily_query->addExpression("SUM(tbl_daily_query.quantity)","total_quantity");

    $finalQuery = db_select($daily_query,"tbl_final_query");
    $finalQuery->fields("tbl_final_query");
    if(!empty($cache['form_state'])){
        $sort_by = $cache['form_state']['sort_by'];
        $sort_direction = $cache['form_state']['sort_direction'];
        if($sort_by=="date"){
            if($month=="all"){
                $finalQuery->orderBy("cr",$sort_direction);
            }else{
                $finalQuery->orderBy($sort_by,$sort_direction);
            }
        }else{
            $finalQuery->orderBy("CAST(".$sort_by." AS int)",$sort_direction);
        }
    }else{
        $finalQuery->orderBy("cr","ASC");
    }
    $result_daily = $finalQuery->execute()->fetchAll();
    $daily_items = [];
    if(!empty($result_daily)){
        foreach($result_daily as $value){
            $daily_items[$value->cr] = $value;
        }
    }
//    if($month=="all"){ // thống kê theo tháng
//        for($i=1;$i<=12;$i++){
//            $item = !empty($daily_items[date("m",strtotime("01-".$i."-".$year))])?$daily_items[date("m",strtotime("01-".$i."-".$year))]:null;
//            if(empty($item)){
//                $daily_items[date("m",strtotime("01-".$i."-".$year))] = array();
//            }
//        }
//    }else{ // thống kê theo ngày
//        for($i=1;$i<=date('t',strtotime("01-".$month."-".$year));$i++){
//            $item = !empty($daily_items[date("d-m-Y",strtotime("01-".$month."-".$year))])?$daily_items[date("d-m-Y",strtotime("01-".$month."-".$year))]:null;
//            if(empty($item)){
//                $daily_items[date("d-m-Y",strtotime("01-".$month."-".$year))] = array();
//            }
//        }
//    }
}catch (Exception $e){
    _print_r($e);
}
$test = 0;
?>
<table class="table table-hover table-stripped">
    <thead>
    <tr>
        <?php if($month=="all"): ?>
            <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="date") echo $cache['sort_direction']; ?>" data-sort="date" class="sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="date") echo $cache['sort_direction']; ?>">Tháng</th>
        <?php else: ?>
            <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="date") echo $cache['sort_direction']; ?>" data-sort="date" class="sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="date") echo $cache['sort_direction']; ?>">Ngày</th>
        <?php endif; ?>
        <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_quantity") echo $cache['sort_direction']; ?>" data-sort="total_quantity" class="sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_quantity") echo $cache['sort_direction']; ?>">Số lượng</th>
        <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_partner_price") echo $cache['sort_direction']; ?>" data-sort="total_partner_price" class="money-data sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_partner_price") echo $cache['sort_direction']; ?>">Doanh thu</th>
        <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_price") echo $cache['sort_direction']; ?>" data-sort="total_price" class="money-data sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_price") echo $cache['sort_direction']; ?>">Giá vốn</th>
        <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_revenue") echo $cache['sort_direction']; ?>" data-sort="total_revenue" class="money-data sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_revenue") echo $cache['sort_direction']; ?>">Lợi nhuận</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($daily_items as $key => $daily_item): ?>
        <?php //$test+=!empty($daily_item)?$daily_item->total_partner_price:0; ?>
        <tr>
            <td><?php echo $month=="all"?$key."-".$year:$key; ?></td>
            <td><?php echo !empty($daily_item)?number_format($daily_item->total_quantity,0,",","."):0; ?></td>
            <td class="money-data"><?php echo !empty($daily_item)?number_format($daily_item->total_partner_price,0,",","."):0; ?></td>
            <td class="money-data"><?php echo !empty($daily_item)?number_format($daily_item->total_price,0,",","."):0; ?></td>
            <td class="money-data"><?php echo !empty($daily_item)?number_format($daily_item->total_revenue,0,",","."):0; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>