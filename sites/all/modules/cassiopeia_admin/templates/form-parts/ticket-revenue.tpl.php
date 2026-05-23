<?php
$cache = $variables['cache'];
$date_filter = !empty($cache['date_filter'])?$cache['date_filter']:date("m-Y",REQUEST_TIME);
try{
    $daily_sub_query = db_select("tbl_issue_report","tbl_issue_report");
    $daily_sub_query->fields("tbl_issue_report",array("created"));
    $daily_sub_query->addExpression("1","type");
    $daily_sub_query->addField("tbl_issue_report","date","date");
    $daily_sub_query->addField("tbl_issue_report","partner_price","partner_price");
    $daily_sub_query->addField("tbl_issue_report","price","price");
    $daily_sub_query->addField("tbl_issue_report","quantity","quantity");


    if(!empty($date_filter && $date_filter!="all")){
        $first_day_of_moth = strtotime(date('Y-m-01 00:00:00',strtotime("01-".$date_filter)));
        $last_day_of_moth = strtotime(date("Y-m-t 23:59:59",strtotime("01-".$date_filter)));
        $daily_sub_query ->condition("date",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
    }

    $daily_sub_query->addExpression("DATE_FORMAT(FROM_UNIXTIME(date), '%d-%m-%Y') ","cr");

    $daily_query = db_select($daily_sub_query,"tbl_daily_query");
    $daily_query->fields("tbl_daily_query");
    $daily_query->groupBy("cr");
    $daily_query->addExpression("SUM(tbl_daily_query.quantity)","total_quantity");
    $daily_query->addExpression("SUM(tbl_daily_query.partner_price)","total_partner_price");
    $daily_query->addExpression("SUM(tbl_daily_query.price)","total_price");
    $daily_query->addExpression("SUM(tbl_daily_query.partner_price-tbl_daily_query.price)","total_revenue");

    $finalQuery = db_select($daily_query,"tbl_final_query");
    $finalQuery->fields("tbl_final_query");
    if(!empty($cache['form_state'])){
        $sort_by = $cache['form_state']['sort_by'];
        $sort_direction = $cache['form_state']['sort_direction'];
        if($sort_by=="sale"){
            $finalQuery->orderBy("tbl_sale.uid","ASC");
        }else{
            $finalQuery->orderBy("CAST(".$sort_by." AS int)",$sort_direction);
        }
    }else{
        $finalQuery->orderBy("date","ASC");
    }
    $result_daily = $finalQuery->execute()->fetchAll();
//    _print_r($result_daily);
    $total_query = db_select($finalQuery,"tbl_total");
    $total_query->addExpression("SUM(total_quantity)","TotalQuantity");
    $total_query->addExpression("SUM(total_partner_price)","TotalPartnerPrice");
    $total_query->addExpression("SUM(total_price)","TotalPrice");
    $total_query->addExpression("SUM(total_revenue)","TotalRevenue");
    $TotalResult = $total_query->execute()->fetchObject();
    $daily_items = [];
    if(!empty($result_daily)){
        foreach($result_daily as $value){
            $daily_items[$value->cr] = $value;
        }
    }
}catch (Exception $e){
    print_r($e);
}

?>
<table class="table table-hover">
    <tbody>
    <tr>
        <td width="200px">Tổng doanh thu</td>
        <td class="money-data"><?php print(number_format($TotalResult->TotalPartnerPrice,0,",",",")); ?></td>
        <td style="width: 65%;"></td>
    </tr>
    <tr>
        <td>Tổng giá vốn</td>
        <td class="money-data"><?php print(number_format($TotalResult->TotalPrice,0,",",",")); ?></td>
        <td style="width: 65%;"></td>
    </tr>
    <tr>
        <td>Lợi nhuận</td>
        <td class="money-data"><?php print(number_format($TotalResult->TotalRevenue,0,",",",")); ?></td>
        <td style="width: 65%;"></td>
    </tr>
    <tr>
        <td>Tổng số vé</td>
        <td class="money-data"><?php print($TotalResult->TotalQuantity); ?></td>
        <td style="width: 65%;"></td>
    </tr>
    </tbody>
</table>
<table class="table table-hover table-stripped">
    <thead>
    <tr>
        <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="date") echo $cache['sort_direction']; ?>" data-sort="date" class="sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="date") echo $cache['sort_direction']; ?>">Ngày</th>
        <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_quantity") echo $cache['sort_direction']; ?>" data-sort="total_quantity" class="sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_quantity") echo $cache['sort_direction']; ?>">Số lượng</th>
        <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_partner_price") echo $cache['sort_direction']; ?>" data-sort="total_partner_price" class="money-data sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_partner_price") echo $cache['sort_direction']; ?>">Doanh thu</th>
        <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_price") echo $cache['sort_direction']; ?>" data-sort="total_price" class="money-data sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_price") echo $cache['sort_direction']; ?>">Giá vốn</th>
        <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_revenue") echo $cache['sort_direction']; ?>" data-sort="total_revenue" class="money-data sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_revenue") echo $cache['sort_direction']; ?>">Lợi nhuận</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($daily_items as $key => $daily_item): ?>
        <tr>
            <td><?php echo $key; ?></td>
            <td><?php echo !empty($daily_item)?number_format($daily_item->total_quantity,0,",","."):0; ?></td>
            <td class="money-data"><?php echo !empty($daily_item)?number_format($daily_item->total_partner_price,0,",","."):0; ?></td>
            <td class="money-data"><?php echo !empty($daily_item)?number_format($daily_item->total_price,0,",","."):0; ?></td>
            <td class="money-data"><?php echo !empty($daily_item)?number_format($daily_item->total_revenue,0,",","."):0; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>