<?php
try {
    $cache = $variables['cache'];
    $date_filter = !empty($cache['date_filter'])?$cache['date_filter']:date("m-Y",REQUEST_TIME);
    $page = $cache['page']['#value'];
    $num_per_page = 50;
    $start = ($page - 1) * $num_per_page;


    $query = db_select("tbl_room_booking_report", "tbl_room_booking_report");
    $query->fields("tbl_room_booking_report", array("created","agent"));
    $query->addExpression("1", "type");
//    $query->addExpression("SUM(quantity)", "total_quantity");
    $query->addExpression("SUM(night)", "total_night");
    $query->addExpression("SUM(partner_price)", "total_partner_price");
    $query->addExpression("SUM(price)", "total_price");
    $query->addExpression("SUM(partner_price - price)", "total_revenue");
    $query->addExpression("SUM(quantity_night)", "total_quantity");
    if (!empty($date_filter && $date_filter != "all")) {
        $first_day_of_moth = strtotime(date('Y-m-01 00:00:00', strtotime("01-" . $date_filter)));
        $last_day_of_moth = strtotime(date("Y-m-t 23:59:59", strtotime("01-" . $date_filter)));
        $query->condition("tbl_room_booking_report.created", array($first_day_of_moth, $last_day_of_moth), "BETWEEN");
    }
    $query->groupBy("tbl_room_booking_report.agent");
    $query->leftJoin("users","tbl_user","tbl_user.uid=tbl_room_booking_report.agent");
    $query->leftJoin("field_data_field_account_sale", "tbl_sale", "tbl_sale.entity_id=tbl_user.uid");
    $query->addField("tbl_sale", "field_account_sale_target_id", "sale");
    $query->addField("tbl_user", "mail", "email");
    $query->leftJoin("field_data_field_account_transaction_name", "field_account_transaction_name", "field_account_transaction_name.entity_id=tbl_user.uid");
    $query->leftJoin("field_data_field_account_code", "field_account_code", "field_account_code.entity_id=tbl_user.uid");
    $query->addField("field_account_code", "field_account_code_value");
    $query->addField("field_account_transaction_name", "field_account_transaction_name_value");

    if (!empty($cache['agent']) && $cache['agent'] != "all") {
        $query->condition("agent", $cache['agent']);
    }

    if (!empty($cache['sale']) && $cache['sale'] != "all") {
        $query->condition("tbl_sale.field_account_sale_target_id", $cache['sale'], "=");
    }
    if (!user_has_role(3) && user_has_role(5)) {
        $query->condition("tbl_sale.field_account_sale_target_id", $user->uid);
    }

    $final_query = db_select($query, "tbl_final");
    $final_query->fields("tbl_final");
    if(!empty($cache['form_state'])){
        $sort_by = $cache['form_state']['sort_by'];
        $sort_direction = $cache['form_state']['sort_direction'];
        if($sort_by=="field_account_code_value"||$sort_by=="field_account_transaction_name_value"||$sort_by=="mail"){
            $final_query->orderBy($sort_by, $sort_direction);
        }else{
            $final_query->orderBy("CAST(".$sort_by." AS int)",$sort_direction);
        }
    }else{
        $final_query->orderBy("field_account_code_value","ASC");
    }
    $count_result_AG = $final_query->execute()->fetchAll();
    $total_count = count($count_result_AG);
    $final_query->range($start, $num_per_page);
    $result_AG = $final_query->execute()->fetchAll();
//    _print_r($result_AG);
    $total_query = db_select($query,"tbl_total");
//    $total_query->addExpression("SUM(total)","total");
    $total_query->addExpression("SUM(total_quantity)","total_quantity");
    $total_query->addExpression("SUM(total_partner_price)","total_partner_price");
    $total_query->addExpression("SUM(total_price)","total_price");
    $total_query->addExpression("SUM(total_revenue)","total_revenue");
    $total_result = $total_query->execute()->fetchObject();
    $page_count = ceil($total_count/$num_per_page);
}catch (Exception $e){
    _print_r($e);
}
$stt=$start+1;
?>

<div class="total-count">
    Tổng số: <b><?php print($total_count); ?></b>
</div>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>STT</th>
            <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="field_account_code_value") echo $cache['sort_direction']; ?>" data-sort="field_account_code_value" class="sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="field_account_code_value") echo $cache['sort_direction']; ?>">Mã đại lý</th>
            <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="field_account_transaction_name_value") echo $cache['sort_direction']; ?>" data-sort="field_account_transaction_name_value" class="sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="field_account_transaction_name_value") echo $cache['sort_direction']; ?>">Tên giao dịch</th>
            <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="email") echo $cache['sort_direction']; ?>" data-sort="email" class="sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="email") echo $cache['sort_direction']; ?>">Email</th>
            <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_quantity") echo $cache['sort_direction']; ?>" data-sort="total_quantity" class="sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_quantity") echo $cache['sort_direction']; ?>">Số lượng</th>
            <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_partner_price") echo $cache['sort_direction']; ?>" data-sort="total_partner_price" class="money-data sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_partner_price") echo $cache['sort_direction']; ?>">Doanh thu</th>
            <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_price") echo $cache['sort_direction']; ?>" data-sort="total_price" class="money-data sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_price") echo $cache['sort_direction']; ?>">Giá vốn</th>
            <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_revenue") echo $cache['sort_direction']; ?>" data-sort="total_revenue" class="money-data sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_revenue") echo $cache['sort_direction']; ?>">Lợi nhuận</th>
        </tr>
        <tr>
            <th colspan="4">Tổng</th>
            <th><?php print(number_format($total_result->total_quantity,0,",",",")); ?></th>
            <th class="money-data"><?php print(number_format($total_result->total_partner_price,0,",",",")); ?></th>
            <th class="money-data"><?php print(number_format($total_result->total_price,0,",",",")); ?></th>
            <th class="money-data"><?php print(number_format($total_result->total_partner_price - $total_result->total_price,0,",",",")); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if(!empty($result_AG)): ?>
            <?php foreach($result_AG as $key => $value): ?>
                <!--                --><?php //_print_r($value); ?>
                <tr>
                    <td><?php print($stt); ?></td>
                    <td>
                        <?php
                        if(!empty($value->field_account_code_value)) print($value->field_account_code_value);
                        ?>
                    </td>
                    <td>
                        <?php
                        if(!empty($value->field_account_transaction_name_value)) print($value->field_account_transaction_name_value);
                        ?>
                    </td>
                    <td><?php print($value->email); ?></td>
                    <td><?php print(number_format($value->total_quantity,0,",",".")); ?></td>
                    <td class="money-data"><?php print(number_format($value->total_partner_price,0,",",".")); ?></td>
                    <td class="money-data"><?php print(number_format($value->total_price,0,",",".")); ?></td>
                    <td class="money-data"><?php print(number_format(($value->total_partner_price-$value->total_price),0,",",".")); ?></td>
                </tr>
                <?php $stt++; ?>
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