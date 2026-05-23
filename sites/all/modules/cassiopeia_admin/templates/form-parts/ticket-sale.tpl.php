<?php
$cache = $variables['cache'];
$date_filter = !empty($cache['date_filter'])?$cache['date_filter']:date("m-Y",REQUEST_TIME);
try{
    $query = db_select("tbl_issue_report","tbl_issue_report");
    $query->fields("tbl_issue_report",array("created"));
    $query->addExpression("1","type");
    $query->addField("tbl_issue_report","date","date");
    $query->addField("tbl_issue_report","partner_price","partner_price");
    $query->addField("tbl_issue_report","price","price");
    $query->addField("tbl_issue_report","quantity","quantity");
    $query->addField("tbl_issue_report","agent","agent");

    $query->leftJoin("users","tbl_users","tbl_users.uid=agent");
    $query->leftJoin("field_data_field_account_sale","tbl_sale","tbl_sale.entity_id=agent");
    $query->addField("tbl_sale","field_account_sale_target_id","sale");
    $query->addField("tbl_users","mail","email");
    $query->leftJoin("field_data_field_account_transaction_name","field_account_transaction_name","field_account_transaction_name.entity_id=tbl_sale.field_account_sale_target_id");
    $query->leftJoin("field_data_field_account_code","field_account_code","field_account_code.entity_id=agent");
    $query->addField("field_account_code","field_account_code_value");
    $query->addField("field_account_transaction_name","field_account_transaction_name_value");
    $query->addExpression("SUM(quantity)","total_quantity");
    $query->addExpression("SUM(partner_price)","total_partner_price");
    $query->addExpression("SUM(price)","total_price");
    $query->addExpression("SUM(partner_price - price)","total_revenue");
    $query->groupBy("tbl_sale.field_account_sale_target_id");
    if(!empty($date_filter && $date_filter!="all")){
        $first_day_of_moth = strtotime(date('Y-m-01 00:00',strtotime("01-".$date_filter)));
        $last_day_of_moth = strtotime(date("Y-m-t 23:59",strtotime("01-".$date_filter)));
        $query->condition("date",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
    }
    $finalQuery = db_select($query,"tbl_final_query");
    $finalQuery->fields("tbl_final_query");
    if(!empty($cache['form_state'])){
        $sort_by = $cache['form_state']['sort_by'];
        $sort_direction = $cache['form_state']['sort_direction'];
        if($sort_by=="sale"){
            $finalQuery->orderBy($sort_by,$sort_direction);
        }else{
            $finalQuery->orderBy("CAST(".$sort_by." AS int)",$sort_direction);
        }
    }else{
        $finalQuery->orderBy("sale","ASC");
    }
    $result = $finalQuery->execute()->fetchAll();
    $total_query = db_select($query,"tbl_total");
    $total_query->addExpression("SUM(total_quantity)","total_quantity");
    $total_query->addExpression("SUM(total_partner_price)","total_partner_price");
    $total_query->addExpression("SUM(total_price)","total_price");
    $total_query->addExpression("SUM(total_revenue)","total_revenue");
    $total_result = $total_query->execute()->fetchObject();
//    _print_r($result);
}catch (Exception $e){
    print_r($e);
}
?>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="sale") echo $cache['sort_direction']; ?>" data-sort="sale" class="sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="sale") echo $cache['sort_direction']; ?>">Sale</th>
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
            <th class="money-data"><?php print(number_format($total_result->total_partner_price - $total_result->total_price,0,",",",")); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if(!empty($result)): ?>
            <?php foreach($result as $key => $value):?>
                <tr>
                    <td>
                        <?php
                        print(!empty($value->field_account_transaction_name_value)?$value->field_account_transaction_name_value:"(DỮ LIỆU TEST)");
                        ?>
                    </td>
                    <td><?php print(number_format($value->total_quantity,0,",",".")); ?></td>
                    <td class="money-data"><?php print(number_format($value->total_partner_price,0,",",".")); ?></td>
                    <td class="money-data"><?php print(number_format($value->total_price,0,",",".")); ?></td>
                    <td class="money-data"><?php print(number_format(($value->total_partner_price-$value->total_price),0,",",".")); ?></td>
                </tr>
                <!--                        --><?php //endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>
