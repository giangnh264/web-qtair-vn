<?php
$cache = $variables['cache'];
$date_filter = !empty($cache['date_filter'])?$cache['date_filter']:date("m-Y",REQUEST_TIME);
try{
    $issue_report_query = db_select("tbl_issue_report","tbl_issue_report");
    $issue_report_query->fields("tbl_issue_report");
//    $issue_report_query->join("users","tbl_users","tbl_users.uid=tbl_issue_report.agent");
//    $issue_report_query->leftJoin("field_data_field_account_sale","tbl_sale","tbl_sale.entity_id=tbl_issue_report.agent");
//    $issue_report_query->addField("tbl_sale","field_account_sale_target_id","sale");
    if(!empty($date_filter && $date_filter!="all")){
        $first_day_of_moth = strtotime(date('Y-m-01 00:00:00',strtotime("01-".$date_filter)));
        $last_day_of_moth = strtotime(date("Y-m-t 23:59:59",strtotime("01-".$date_filter)));
        $issue_report_query->condition("tbl_issue_report.date",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
    }
    $issue_report_query->addExpression("SUM(tbl_issue_report.quantity)","total_quantity");
    $issue_report_query->addExpression("SUM(tbl_issue_report.partner_price)","total_partner_price");
    $issue_report_query->addExpression("SUM(tbl_issue_report.price)","total_price");
    $issue_report_query->addExpression("SUM(tbl_issue_report.partner_price-tbl_issue_report.price)","total_revenue");
    $issue_report_query->groupBy("tbl_issue_report.airline");

    $finalQuery = db_select($issue_report_query,"tbl_final_query");
    $finalQuery->fields("tbl_final_query");
    if(!empty($cache['form_state'])){
        $sort_by = $cache['form_state']['sort_by'];
        $sort_direction = $cache['form_state']['sort_direction'];
        if($sort_by=="airline"){
            $finalQuery->orderBy("tbl_final_query.airline",$sort_direction);
        }else{
            $finalQuery->orderBy("CAST(".$sort_by." AS int)",$sort_direction);
        }
    }else{
        $finalQuery->orderBy("airline","ASC");
    }
    $result = $finalQuery->execute()->fetchAll();
    $total_query = db_select($issue_report_query,"tbl_total");
    $total_query->addExpression("SUM(total_quantity)","total_quantity");
    $total_query->addExpression("SUM(total_partner_price)","total_partner_price");
    $total_query->addExpression("SUM(total_price)","total_price");
    $total_query->addExpression("SUM(total_revenue)","total_revenue");
    $total_result = $total_query->execute()->fetchObject();
}catch (Exception $e){

}
?>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="airline") echo $cache['sort_direction']; ?>" data-sort="airline" class="sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="airline") echo $cache['sort_direction']; ?>">Hãng</th>
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
                    <td><?php print($value->airline); ?></td>
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
