<?php
echo drupal_render_children($form);
?>
<?php
try{
    $page = $form['page']['#value'];
    $num_per_page = 50;
    $start = ($page-1)*$num_per_page;
    $caches = $form['#caches'];

    $issue_query = db_select("tbl_issue_report","tbl_issue_report");
    $issue_query->fields("tbl_issue_report",array("created"));
    $issue_query->addExpression("1","type");
    $issue_query->addField("tbl_issue_report","date","date");
    $issue_query->addField("tbl_issue_report","partner_price","partner_price");
    $issue_query->addField("tbl_issue_report","price","price");
    $issue_query->addField("tbl_issue_report","quantity","quantity");
    $issue_query->addField("tbl_issue_report","agent","agent");

    $room_query = db_select("tbl_room_booking_report","tbl_room_booking_report");
    $room_query->fields("tbl_room_booking_report",array("created"));
    $room_query->addExpression("2","type");
    $room_query->addField("tbl_room_booking_report","created","date");
    $room_query->addField("tbl_room_booking_report","partner_price","partner_price");
    $room_query->addField("tbl_room_booking_report","price","price");
    $room_query->addField("tbl_room_booking_report","night","quantity");
    $room_query->addField("tbl_room_booking_report","agent","agent");
    $query = Database::getConnection()
        ->select($issue_query->union($room_query))
        ->fields(NULL, array("date","type","partner_price","price","quantity","agent"));
    $query->join("users","tbl_users","tbl_users.uid=agent");
    $query->leftJoin("field_data_field_account_sale","tbl_sale","tbl_sale.entity_id=agent");
    $query->addField("tbl_sale","field_account_sale_target_id","sale");
    $query->addField("tbl_users","mail","email");
    $query->leftJoin("field_data_field_account_transaction_name","field_account_transaction_name","field_account_transaction_name.entity_id=agent");
    $query->leftJoin("field_data_field_account_code","field_account_code","field_account_code.entity_id=agent");
    $query->addField("field_account_code","field_account_code_value");
    $query->addField("field_account_transaction_name","field_account_transaction_name_value");
    $query->addExpression("SUM(quantity)","total_quantity");
    $query->addExpression("SUM(partner_price)","total_partner_price");
    $query->addExpression("SUM(price)","total_price");
    $query->addExpression("SUM(partner_price - price)","total_revenue");

    if(!empty($caches['order_by']) && $caches['order_by']!="none"){
        switch ($caches['order_by']){
            case "agent_code" :
                $query->orderBy("field_account_code.field_account_code_value",$caches['direction']);
                break;
            case "transaction_name" :
                $query->orderBy("field_account_transaction_name.field_account_transaction_name_value",$caches['direction']);
                break;
            case "quantity" :
                $query->orderBy("total_quantity",$caches['direction']);
                break;
            case "partner_price" :
                $query->orderBy("total_partner_price",$caches['direction']);
                break;
            case "revenue" :
                $query->orderBy("total_revenue",$caches['direction']);
                break;
        }
    }else{
//                $query->orderBy("field_account_transaction_name.field_account_transaction_name_value",$caches['direction']);
    }
    if(!empty($caches['agent'])&& $caches['agent']!="all"){
        $query->condition("agent",$caches['agent']);
    }
    if(!empty($caches['date_filter'] && $caches['date_filter']!="all")){
        $first_day_of_moth = strtotime(date('Y-m-01 00:00',strtotime("01-".$caches['date_filter'])));
        $last_day_of_moth = strtotime(date("Y-m-t 23:59",strtotime("01-".$caches['date_filter'])));
        $query->condition("date",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
    }
    if(!empty($caches['sale']) && $caches['sale']!="all"){
        $query->condition("tbl_sale.field_account_sale_target_id",$caches['sale'],"=");
    }
    if(!user_has_role(3) && user_has_role(5)){
        $query->condition("tbl_sale.field_account_sale_target_id",$user->uid);
    }
    $total_result = $query->execute()->fetchObject();
    $query->groupBy("agent");
    $final_query = db_select($query,"tbl_final");
    $final_query->fields("tbl_final");
    if(!empty($form['#form_state'])){
        $sort_by = $form['#form_state']['sort_by'];
        $sort_direction = $form['#form_state']['sort_direction'];
        if($sort_by=="field_account_code_value"||$sort_by=="field_account_transaction_name_value"||$sort_by=="email"||$sort_by=="date"){
            $final_query->orderBy($sort_by,$sort_direction);
        }else{
            $final_query->orderBy("CAST(".$sort_by." AS int)",$sort_direction);
        }
    }else{
        $final_query->orderBy("field_account_code_value","ASC");
    }
    $count_result_AG = $final_query->execute()->fetchAll();
    $total_count = count($count_result_AG   );
    $final_query->range($start,$num_per_page);
    $result_AG = $final_query->execute()->fetchAll();

}catch (Exception $e){
    print_r($e);
}


$page_count = ceil($total_count/$num_per_page);
//_print_r($page_count);
$stt=1;
?>

<div class="total-count">
    Tổng số: <b><?php print($total_count); ?></b>
</div>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>STT</th>
            <th data-direction="<?php if(!empty($form['sort_by']['#value'])&&$form['sort_by']['#value']=="field_account_code_value") echo $form['sort_direction']['#value']; ?>" data-sort="field_account_code_value" class="sort_able <?php if(!empty($form['sort_by']['#value'])&&$form['sort_by']['#value']=="field_account_code_value") echo $form['sort_direction']['#value']; ?>">Mã đại lý</th>
            <th data-direction="<?php if(!empty($form['sort_by']['#value'])&&$form['sort_by']['#value']=="field_account_transaction_name_value") echo $form['sort_direction']['#value']; ?>" data-sort="field_account_transaction_name_value" class="sort_able <?php if(!empty($form['sort_by']['#value'])&&$form['sort_by']['#value']=="field_account_transaction_name_value") echo $form['sort_direction']['#value']; ?>">Tên giao dịch</th>
            <th data-direction="<?php if(!empty($form['sort_by']['#value'])&&$form['sort_by']['#value']=="email") echo $form['sort_direction']['#value']; ?>" data-sort="email" class="sort_able <?php if(!empty($form['sort_by']['#value'])&&$form['sort_by']['#value']=="email") echo $form['sort_direction']['#value']; ?>">Email</th>
            <th data-direction="<?php if(!empty($form['sort_by']['#value'])&&$form['sort_by']['#value']=="total_quantity") echo $form['sort_direction']['#value']; ?>" data-sort="total_quantity" class="sort_able <?php if(!empty($form['sort_by']['#value'])&&$form['sort_by']['#value']=="total_quantity") echo $form['sort_direction']['#value']; ?>">Số lượng</th>
            <th data-direction="<?php if(!empty($form['sort_by']['#value'])&&$form['sort_by']['#value']=="total_partner_price") echo $form['sort_direction']['#value']; ?>" data-sort="total_partner_price" class="money-data sort_able <?php if(!empty($form['sort_by']['#value'])&&$form['sort_by']['#value']=="total_partner_price") echo $form['sort_direction']['#value']; ?>">Doanh thu</th>
            <th data-direction="<?php if(!empty($form['sort_by']['#value'])&&$form['sort_by']['#value']=="total_price") echo $form['sort_direction']['#value']; ?>" data-sort="total_price" class="money-data sort_able <?php if(!empty($form['sort_by']['#value'])&&$form['sort_by']['#value']=="total_price") echo $form['sort_direction']['#value']; ?>">Giá vốn</th>
            <th data-direction="<?php if(!empty($form['sort_by']['#value'])&&$form['sort_by']['#value']=="total_revenue") echo $form['sort_direction']['#value']; ?>" data-sort="total_revenue" class="money-data sort_able <?php if(!empty($form['sort_by']['#value'])&&$form['sort_by']['#value']=="total_revenue") echo $form['sort_direction']['#value']; ?>">Lợi nhuận</th>
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