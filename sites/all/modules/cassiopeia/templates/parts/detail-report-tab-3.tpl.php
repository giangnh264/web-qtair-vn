<?php
global $user;
$caches = null;
$num_per_page = 50;
if(!empty($_REQUEST['data'])){
    $caches = $_REQUEST['data'];
    if(!empty($caches['num_per_page'])){
        $num_per_page = $caches['num_per_page'];
    }
}
if(empty($caches['date_filter'])){
    $caches['date_filter'] = date("m-Y",REQUEST_TIME);
}
if(empty($caches['order_by'])){
    $caches['order_by'] = "agent_code";
}

if(empty($caches['direction'])){
    $caches['direction'] = "ASC";
}
?>
<div id="tab-3" class=" <?php if(!empty($arg[3]) && $arg[3]=="tab-3") print("in active"); if(user_has_role(5)) print("in active"); ?>">
    <div class="filter-block">
        <?php
        $cassiopeia_detail_report_tab_3_filter_form = drupal_get_form("cassiopeia_detail_report_tab_3_filter_form",$caches);
        if(!empty($cassiopeia_detail_report_tab_3_filter_form)){
            $cassiopeia_detail_report_tab_3_filter_form = drupal_render($cassiopeia_detail_report_tab_3_filter_form);
            print($cassiopeia_detail_report_tab_3_filter_form);
        }
        try{
            $query = db_select("tbl_issue_report","tbl_issue_report");
            $query->fields("tbl_issue_report");
            $query->join("users","tbl_users","tbl_users.uid=tbl_issue_report.agent");
            $query->leftJoin("field_data_field_account_sale","tbl_sale","tbl_sale.entity_id=tbl_issue_report.agent");
            $query->addField("tbl_sale","field_account_sale_target_id","sale");
            $query->addField("tbl_users","mail","email");
            $query->leftJoin("field_data_field_account_transaction_name","field_account_transaction_name","field_account_transaction_name.entity_id=tbl_issue_report.agent");
            $query->leftJoin("field_data_field_account_code","field_account_code","field_account_code.entity_id=tbl_issue_report.agent");
            $query->addField("field_account_code","field_account_code_value");
            $query->addField("field_account_transaction_name","field_account_transaction_name_value");
            $query->addExpression("SUM(tbl_issue_report.quantity)","total_quantity");
            $query->addExpression("SUM(tbl_issue_report.partner_price)","total_partner_price");
            $query->addExpression("SUM(tbl_issue_report.price)","total_price");
            $query->addExpression("SUM(tbl_issue_report.partner_price - price)","total_revenue");

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
                $query->condition("tbl_issue_report.date",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
            }
            if(!empty($caches['sale']) && $caches['sale']!="all"){
                $query->condition("tbl_sale.field_account_sale_target_id",$caches['sale'],"=");
            }
            if(!user_has_role(3) && user_has_role(5)){
                $query->condition("tbl_sale.field_account_sale_target_id",$user->uid);
            }
            $total_result = $query->execute()->fetchObject();
            $query->groupBy("tbl_issue_report.agent");
            $result_AG = $query->execute()->fetchAll();

        }catch (Exception $e){
            print_r($e);
        }

        $total_count = count($result_AG);
        $limit = $num_per_page;
        $page = pager_default_initialize(count($result_AG), $limit, 0);
        $offset = $limit * $page;
        if(!empty($result_AG)){
            $result_AG = array_slice($result_AG, $offset, $limit);
        }else{
            $result_AG=null;
        }
        $stt=1;
        ?>
    </div>
    <div class="total-count">
        Tổng số: <b><?php print($total_count); ?></b>
    </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>STT</th>
                <th class="<?php if($caches['order_by']=="agent_code") print($caches['direction']); ?>" data-sort="agent_code" >Mã đại lý</th>
                <th class="<?php if($caches['order_by']=="transaction_name") print($caches['direction']); ?>" data-sort="transaction_name" >Tên giao dịch</th>
                <th class="<?php if($caches['order_by']=="email") print($caches['direction']); ?>" data-sort="transaction_name" >Email</th>
                <th class="<?php if($caches['order_by']=="quantity") print($caches['direction']); ?>" data-sort="quantity" >Số lượng</th>
                <th class="<?php if($caches['order_by']=="partner_price") print($caches['direction']); ?>" data-sort="partner_price" >Giá AG</th>
                <th class="<?php if($caches['order_by']=="price") print($caches['direction']); ?>" data-sort="price" >Giá vốn</th>
                <th class="<?php if($caches['order_by']=="revenue") print($caches['direction']); ?>" data-sort="revenue" >Doanh thu</th>
            </tr>
            <tr>
                <th colspan="4">Tổng</th>
                <th><?php print(number_format($total_result->total_quantity,0,",",",")); ?></th>
                <th><?php print(number_format($total_result->total_partner_price,0,",",",")); ?></th>
                <th><?php print(number_format($total_result->total_price,0,",",",")); ?></th>
                <th><?php print(number_format($total_result->total_partner_price - $total_result->total_price,0,",",",")); ?></th>
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
                        <td><?php print(number_format($value->total_partner_price,0,",",".")); ?></td>
                        <td><?php print(number_format($value->total_price,0,",",".")); ?></td>
                        <td><?php print(number_format(($value->total_partner_price-$value->total_price),0,",",".")); ?></td>
                    </tr>
                    <?php $stt++; ?>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
    <!-- paging-->
    <div class="page">
        <div class="cassiopeia-pagination">
            <div class="cassiopeia-pagination-container">
                <?php print (theme('pager',  array('tags' => array('«','‹','','›','»'))));?>
            </div>
        </div>
    </div>
    <!--e: paging-->
</div>