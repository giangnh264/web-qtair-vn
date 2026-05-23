<?php
global $user;
$caches = null;
if(!empty($_REQUEST['data'])) {
    $caches = $_REQUEST['data'];
}
_print_r($caches);
$date_filter = !empty($_REQUEST['date_filter'])?$_REQUEST['date_filter']:date("m-Y",REQUEST_TIME);
$cache['date_filter'] = $date_filter;
$cassiopeia_detail_report_tab_3_filter_form = drupal_get_form("cassiopeia_detail_report_tab_4_filter_form",$caches);
if(!empty($cassiopeia_detail_report_tab_3_filter_form)){
    $cassiopeia_detail_report_tab_3_filter_form = drupal_render($cassiopeia_detail_report_tab_3_filter_form);
    print($cassiopeia_detail_report_tab_3_filter_form);
}
try{
    $query = db_select("tbl_room_booking_report","tbl_room_booking_report");
    $query->fields("tbl_room_booking_report");
    $query->leftJoin("users","tbl_users","tbl_users.uid=tbl_room_booking_report.agent");
    $query->leftJoin("field_data_field_account_sale","tbl_sale","tbl_sale.entity_id=tbl_room_booking_report.agent");
    $query->addField("tbl_sale","field_account_sale_target_id","sale");
    $query->addField("tbl_users","mail","email");
    $query->leftJoin("field_data_field_account_transaction_name","field_account_transaction_name","field_account_transaction_name.entity_id=tbl_sale.field_account_sale_target_id");
    $query->leftJoin("field_data_field_account_code","field_account_code","field_account_code.entity_id=tbl_room_booking_report.agent");
    $query->addField("field_account_code","field_account_code_value");
    $query->addField("field_account_transaction_name","field_account_transaction_name_value");
    $query->addExpression("SUM(tbl_room_booking_report.quantity)","total_quantity");
    $query->addExpression("SUM(tbl_room_booking_report.partner_price)","total_partner_price");
    $query->addExpression("SUM(tbl_room_booking_report.price)","total_price");
    $query->addExpression("SUM(tbl_room_booking_report.partner_price - price)","total_revenue");
    if(!empty($date_filter && $date_filter!="all")){
        $first_day_of_moth = strtotime(date('Y-m-01 00:00',strtotime("01-".$date_filter)));
        $last_day_of_moth = strtotime(date("Y-m-t 23:59",strtotime("01-".$date_filter)));
        $query->condition("tbl_room_booking_report.created",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
    }
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
            case "price" :
                $query->orderBy("total_price",$caches['direction']);
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
    $total_result = $query->execute()->fetchObject();
    $query->groupBy("sale");
    $result = $query->execute()->fetchAll();
//    _print_r($result);
}catch (Exception $e){
    print_r($e);
}

?>
<div id="tab-4" class="">
    <div class="filter-block">
        <?php
        $cassiopeia_detail_report_tab_2_filter_form = drupal_get_form("cassiopeia_select_month_form",$cache);
        if(!empty($cassiopeia_detail_report_tab_2_filter_form)){
            $cassiopeia_detail_report_tab_2_filter_form = drupal_render($cassiopeia_detail_report_tab_2_filter_form);
            print($cassiopeia_detail_report_tab_2_filter_form);
        }
        ?>
    </div>
   <div class="table-responsive">
       <table class="table table-hover">
           <thead>
           <tr>
               <th>Sale</th>
               <th class="<?php if($caches['order_by']=="quantity") print($caches['direction']); ?>" data-sort="quantity">Số lượng</th>
               <th class="<?php if($caches['order_by']=="partner_price") print($caches['direction']); ?>" data-sort="partner_price" >Giá AG</th>
               <th class="<?php if($caches['order_by']=="price") print($caches['direction']); ?>" data-sort="price" >Giá vốn</th>
               <th class="<?php if($caches['order_by']=="revenue") print($caches['direction']); ?>" data-sort="revenue" >Doanh thu</th>
           </tr>
           <tr>
               <th>Tổng</th>
               <th><?php print(number_format($total_result->total_quantity,0,",",",")); ?></th>
               <th><?php print(number_format($total_result->total_partner_price,0,",",",")); ?></th>
               <th><?php print(number_format($total_result->total_price,0,",",",")); ?></th>
               <th><?php print(number_format($total_result->total_partner_price - $total_result->total_price,0,",",",")); ?></th>
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
                       <td><?php print(number_format($value->total_partner_price,0,",",".")); ?></td>
                       <td><?php print(number_format($value->total_price,0,",",".")); ?></td>
                       <td><?php print(number_format(($value->total_partner_price-$value->total_price),0,",",".")); ?></td>
                   </tr>
                   <!--                        --><?php //endif; ?>
               <?php endforeach; ?>
           <?php endif; ?>
           </tbody>
       </table>
   </div>
</div>