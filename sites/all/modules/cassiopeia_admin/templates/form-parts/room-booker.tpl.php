<?php
$cache = $variables['cache'];
$date_filter = !empty($cache['date_filter'])?$cache['date_filter']:date("m-Y",REQUEST_TIME);
$page = $cache['page']['#value'];
$num_per_page = 50;
$start = ($page - 1) * $num_per_page;
try{
    $query = db_select("tbl_room_booking_report","tbl_room_booking_report");
    $query->fields("tbl_room_booking_report",array("created"));
    $query->addExpression("1","type");
    $query->addField("tbl_room_booking_report","created","date");
    $query->addField("tbl_room_booking_report","partner_price","partner_price");
    $query->addField("tbl_room_booking_report","price","price");
    $query->addField("tbl_room_booking_report","quantity_night","quantity_night");
//    $query->addField("tbl_room_booking_report","quantity_night","quantity");
    $query->addField("tbl_room_booking_report","tran_user","tran_user");
//    $result = $query->execute()->fetchAll();
//    _print_r($result);
    $query->leftJoin("users","tbl_user","tbl_user.uid=tran_user");
//    $query->leftJoin("field_data_field_account_sale","tbl_user","tbl_user.entity_id=tran_user");
//    $query->addField("tbl_user","field_account_sale_target_id","sale");
//    $query->addField("tbl_user","mail","email");
    $query->leftJoin("field_data_field_account_transaction_name","field_account_transaction_name","field_account_transaction_name.entity_id=tbl_user.uid");
    $query->leftJoin("field_data_field_account_code","field_account_code","field_account_code.entity_id=tran_user");
    $query->addField("field_account_code","field_account_code_value");
    $query->addField("field_account_transaction_name","field_account_transaction_name_value");
    $query->addExpression("SUM(quantity_night)","total_quantity");
    $query->addExpression("SUM(partner_price)","total_partner_price");
    $query->addExpression("SUM(price)","total_price");
    $query->addExpression("SUM(partner_price - price)","total_revenue");
    $query->groupBy("tbl_user.uid");
    if(!empty($date_filter && $date_filter!="all")){
        $first_day_of_moth = strtotime(date('Y-m-01 00:00',strtotime("01-".$date_filter)));
        $last_day_of_moth = strtotime(date("Y-m-t 23:59",strtotime("01-".$date_filter)));
        $query->condition("tbl_room_booking_report.created",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
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
    $total_count = count($result);
    $finalQuery->range($start, $num_per_page);
    $result = $finalQuery->execute()->fetchAll();
    $total_query = db_select($query,"tbl_total");
    $total_query->addExpression("SUM(total_quantity)","total_quantity");
    $total_query->addExpression("SUM(total_partner_price)","total_partner_price");
    $total_query->addExpression("SUM(total_price)","total_price");
    $total_query->addExpression("SUM(total_revenue)","total_revenue");
    $total_result = $total_query->execute()->fetchObject();
    $page_count = ceil($total_count/$num_per_page);
//    _print_r(($result));
}catch (Exception $e){
    print_r($e);
}
?>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="field_account_code_value") echo $cache['sort_direction']; ?>" data-sort="field_account_code_value" class="sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="field_account_code_value") echo $cache['sort_direction']; ?>">Booker</th>
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
                        echo(!empty($value->field_account_code_value)?$value->field_account_code_value:"(DỮ LIỆU TEST)"); echo " - "; echo(!empty($value->field_account_transaction_name_value)?$value->field_account_transaction_name_value:"(DỮ LIỆU TEST)");
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

<div class="ajax-pagination">
    <div class="ajax-pagination-container">
        <ul>
            <?php for($i=1;$i<=$page_count;$i++): ?>
                <li><span class="ajax-item <?php if($page==$i) print("active"); ?>" data-page="<?php print($i); ?>"><?php print($i); ?></span></li>
            <?php endfor; ?>
        </ul>
    </div>
</div>