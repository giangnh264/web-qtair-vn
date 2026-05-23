<?php
$cache = $variables['cache'];
$date_filter = !empty($cache['date_filter'])?$cache['date_filter']:date("m-Y",REQUEST_TIME);
$areas_filter = !empty($cache['areas_filter'])?$cache['areas_filter']:"all";
$page = $cache['page']['#value'];
$num_per_page = 50;
$start = ($page - 1) * $num_per_page;
try{
    $hotel_query = db_select("node","tbl_node");
    $hotel_query->condition("tbl_node.type","hotel");
    $hotel_query->fields("tbl_node",array("title"));


    $room_report_query = db_select("tbl_room_booking_report","tbl_room_booking_report");
    $room_report_query->fields("tbl_room_booking_report");
    if(!empty($date_filter && $date_filter!="all")){
        $first_day_of_moth = strtotime(date('Y-m-01 00:00:00',strtotime("01-".$date_filter)));
        $last_day_of_moth = strtotime(date("Y-m-t 23:59:59",strtotime("01-".$date_filter)));
        $room_report_query->condition("tbl_room_booking_report.created",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
    }
    if(!empty($areas_filter && $areas_filter!="all")){
        $hotel_query->join("field_data_field_tx_area","field_tx_area","field_tx_area.entity_id=tbl_node.nid");
        $hotel_query->condition("field_tx_area.field_tx_area_tid",$areas_filter);
    }
    $room_report_query->addExpression("SUM(tbl_room_booking_report.quantity_night)","total_quantity");
    $room_report_query->addExpression("SUM(tbl_room_booking_report.partner_price)","total_partner_price");
    $room_report_query->addExpression("SUM(tbl_room_booking_report.price)","total_price");
    $room_report_query->addExpression("SUM(tbl_room_booking_report.partner_price-tbl_room_booking_report.price)","total_revenue");
    $room_report_query->groupBy("tbl_room_booking_report.hotel");

    $hotel_query->leftJoin($room_report_query,"tbl_room_query","tbl_room_query.hotel=tbl_node.nid");
    $hotel_query->fields("tbl_room_query");
    $finalQuery = db_select($hotel_query,"tbl_final_query");
    $finalQuery->condition("tbl_final_query.quantity_night",0,">");
    $finalQuery->fields("tbl_final_query");
    if(!empty($cache['form_state'])){
        $sort_by = $cache['form_state']['sort_by'];
        $sort_direction = $cache['form_state']['sort_direction'];
        if($sort_by=="title"){
            $finalQuery->orderBy("tbl_final_query.title",$sort_direction);
        }else{
            $finalQuery->orderBy("CAST(".$sort_by." AS int)",$sort_direction);
        }
    }else{
        $finalQuery->orderBy("title","ASC");
    }
    $result = $finalQuery->execute()->fetchAll();
    $total_count = count($result);
    $finalQuery->range($start, $num_per_page);
    $result = $finalQuery->execute()->fetchAll();
    $total_query = db_select($hotel_query,"tbl_total");
    $total_query->condition("tbl_total.quantity_night",0,">");
    $total_query->addExpression("SUM(total_quantity)","total_quantity");
    $total_query->addExpression("SUM(total_partner_price)","total_partner_price");
    $total_query->addExpression("SUM(total_price)","total_price");
    $total_query->addExpression("SUM(total_revenue)","total_revenue");
    $total_result = $total_query->execute()->fetchObject();
    $page_count = ceil($total_count/$num_per_page);
    //_print_r($total_result);
}catch (Exception $e){

}
?>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="title") echo $cache['sort_direction']; ?>" data-sort="title" class="sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="title") echo $cache['sort_direction']; ?>">Khách sạn</th>
            <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_quantity") echo $cache['sort_direction']; ?>" data-sort="total_quantity" class="sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_quantity") echo $cache['sort_direction']; ?>">Số lượng</th>
            <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_partner_price") echo $cache['sort_direction']; ?>" data-sort="total_partner_price" class="money-data sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_partner_price") echo $cache['sort_direction']; ?>">Doanh thu</th>
            <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_price") echo $cache['sort_direction']; ?>" data-sort="total_price" class="money-data sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_price") echo $cache['sort_direction']; ?>">Giá vốn</th>
            <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_revenue") echo $cache['sort_direction']; ?>" data-sort="total_revenue" class="money-data sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_revenue") echo $cache['sort_direction']; ?>">Lợi nhuận</th>
        </tr>
        <tr>
            <th>Tổng</th>
            <th><?php print(number_format($total_result->total_quantity,0,",",",")); ?></th>
            <th class="money-data"><?php print(number_format($total_result->total_partner_price,0,",",",")); ?></th>
            <th class="money-data"><?php print(number_format($total_result->total_price,0,",",",")); ?></th>
            <th class="money-data"><?php print(number_format($total_result->total_revenue,0,",",",")); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if(!empty($result)): ?>
            <?php foreach($result as $key => $value): ?>
                <tr>
                    <td><?php print($value->title); ?></td>
                    <td><?php print(number_format($value->total_quantity,0,",",".")); ?></td>
                    <td class="money-data"><?php print(number_format($value->total_partner_price,0,",",".")); ?></td>
                    <td class="money-data"><?php print(number_format($value->total_price,0,",",".")); ?></td>
                    <td class="money-data"><?php print(number_format($value->total_revenue,0,",",".")); ?></td>
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