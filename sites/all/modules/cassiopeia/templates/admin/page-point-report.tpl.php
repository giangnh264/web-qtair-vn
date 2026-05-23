<?php
global $theme,$user;
//drupal_add_js(drupal_get_path("module","cassiopeia")."/js/manager-partner.js");
$caches = array();
$arg = arg();
$caches['sale'] = !empty($arg[3])?$arg[3]:null;
$caches['status'] = !empty($arg[4])?$arg[4]:'all';
$caches['date_filter'] = "all";
if(!empty($_REQUEST['data'])){
    $caches = $_REQUEST['data'];
    if(!empty($caches['uncheck'][1]) && $caches['uncheck'][1]==1){
        $caches = array();
    }
}
if(empty($caches['month'])){
    $caches['month'] = date("m",REQUEST_TIME);
}
if(empty($caches['year'])){
    $caches['year'] = date("Y",REQUEST_TIME);
}
if(!empty($arg[5])){
    $caches['date_filter'] = "other";
    $caches['from_date'] = (date('Y-m-01 00:00',strtotime("01-".$arg[5])));
    $caches['to_date'] = (date("Y-m-t 23:59",strtotime("01-".$arg[5])));
}
//_print_r($caches);
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/partner.js', ['weight' => 1000]);
global $user;
try{
    $query = db_select("users","tbl_user");
    $query -> fields("tbl_user");

    $query -> join("users_roles","tbl_role","tbl_role.uid = tbl_user.uid");
    $query -> condition("tbl_role.rid",4);
    $query -> leftJoin("field_data_field_account_sale","tbl_sale","tbl_sale.entity_id = tbl_user.uid");
    $query -> leftJoin("field_data_field_account_code","field_account_code","field_account_code.entity_id = tbl_user.uid");
    $query -> leftJoin("field_data_field_account_transaction_name","field_account_transaction_name","field_account_transaction_name.entity_id = tbl_user.uid");
    $query -> leftJoin("field_data_field_account_full_name","field_account_full_name","field_account_full_name.entity_id = tbl_user.uid");
    $query -> leftJoin("field_data_field_account_status","field_account_status","field_account_status.entity_id = tbl_user.uid");
    $query -> leftJoin("field_data_field_account_updated_date","field_account_updated_date","field_account_updated_date.entity_id = tbl_user.uid");
    $query -> leftJoin("field_data_field_account_source","field_account_source","field_account_source.entity_id = tbl_user.uid");
    $query->addField("field_account_source","field_account_source_value","field_account_source_value");
    if(!empty($caches['agent'])&&$caches['agent']!="all"){
        $query -> condition("tbl_user.uid",$caches['agent']);
    }
    if($theme=="cassiopeia_theme"){
        $query -> condition("tbl_user.uid",$user->uid);
    }
    $query->orderBy("field_account_updated_date.field_account_updated_date_value","DESC");

    if ($caches['sort_direction']&&$caches['sort_direction']!="_none") {
        $cassiopeia_report_issue_query = db_select("tbl_issue_report", "tbl_issue_report");
        $cassiopeia_report_issue_query->fields("tbl_issue_report");
        $cassiopeia_report_issue_query->groupBy("tbl_issue_report.agent");
        $cassiopeia_report_issue_query->addExpression("SUM(partner_price)", "total_revenue");
        $cassiopeia_report_issue_query->condition("tbl_issue_report.date", [
            strtotime(date("01-m-Y 00:00:00", strtotime("01-".$caches['month']."-".$caches['year']))),
            strtotime(date("t-m-Y 23:59:59", strtotime("01-".$caches['month']."-".$caches['year']))),
        ], "BETWEEN");

        $query->leftJoin($cassiopeia_report_issue_query, "tbl_issue_report", "tbl_issue_report.agent=tbl_user.uid");
        $query->addExpression("CASE WHEN tbl_issue_report.total_revenue!=0 THEN tbl_issue_report.total_revenue ELSE 0 END", "total_issue_revenue");

        $cassiopeia_report_room_booking_query = db_select("tbl_room_booking_report", "tbl_room_booking_report");
        $cassiopeia_report_room_booking_query->fields("tbl_room_booking_report");
        $cassiopeia_report_room_booking_query->groupBy("tbl_room_booking_report.agent");
        $cassiopeia_report_room_booking_query->addExpression("SUM(partner_price)", "total_revenue");
        $cassiopeia_report_room_booking_query->condition("tbl_room_booking_report.created", [
            strtotime(date("01-m-Y", REQUEST_TIME)),
            strtotime(date("t-m-Y", REQUEST_TIME)),
        ], "BETWEEN");

        $query->leftJoin($cassiopeia_report_room_booking_query, "tbl_room_booking_report", "tbl_room_booking_report.agent=tbl_user.uid");
        $query->addExpression("CASE WHEN tbl_room_booking_report.total_revenue!=0 THEN tbl_room_booking_report.total_revenue ELSE 0 END", "total_room_revenue");
    }
    $query = db_select($query, "tbl_final");
    $query->fields("tbl_final");
    if ($caches['sort_direction']&&$caches['sort_direction']!="_none") {
        $query->addExpression("(tbl_final.total_issue_revenue+tbl_final.total_room_revenue)", "total_revenue");
        $query = db_select($query, "tbl_final");
        $query->fields("tbl_final");
        $query->orderBy("tbl_final.total_revenue", $caches['sort_direction']);
    }else{
        $query -> orderBy("tbl_final.created","DESC");
    }
    $result  = $query -> execute() -> fetchAll();
//    _print_r($result);
    $count = count($result);
    $limit = !empty($caches['item_per_page'])?$caches['item_per_page']:50;
    $page = pager_default_initialize(count($result), $limit, 0);
    $offset = $limit * $page;
    if(!empty($result)){
        $result = array_slice($result, $offset, $limit);
    }else{
        $result=array();
    }
//    _print_r(count($result));
//    _print_r($result);
    $caches['count'] = count($result);
    $caches['offset'] = $offset;
    $caches['total'] = $count;

    $sub = db_select("users_roles","tbl_role");
    $sub->fields("tbl_role");
    $sub->condition("rid",5);
    $role = $sub->execute()->fetchObject();
    $query = db_select("users","tbl_user");
    $query -> fields("tbl_user");
    $query -> join("users_roles","tbl_role","tbl_role.uid = tbl_user.uid");
    $query -> condition("tbl_role.rid",$role->rid);
    $query -> leftJoin("field_data_field_account_code","field_account_code","field_account_code.entity_id = tbl_user.uid");
    $query -> leftJoin("field_data_field_account_transaction_name","field_account_transaction_name","field_account_transaction_name.entity_id = tbl_user.uid");
    $query->addField("field_account_transaction_name","field_account_transaction_name_value","field_account_transaction_name");
    $sales = $query->execute()->fetchAll();

}catch (Exception $e){
    print_r($e);
}
$caches['redirect'] = current_path();
?>
<div class="page-manager-partners">
    <div class="filter_form">
        <?php
        $cassiopeia_manager_partners_filter_form = drupal_get_form("cassiopeia_admin_point_report_filter_form",$caches);
        if(!empty($cassiopeia_manager_partners_filter_form)){
            $cassiopeia_manager_partners_filter_form = drupal_render($cassiopeia_manager_partners_filter_form);
            print($cassiopeia_manager_partners_filter_form);
        }
        ?>
    </div>
    <div class="table-responsive">
        <table class="table table-hover custom-table-1">
            <thead>
            <tr>
                <th>Mã Đại lí</th>
                <th>Tên giao dịch</th>
                <th>Họ tên</th>
                <th>Ngày tạo</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Sale</th>
                <th>Loại đại lý</th>
                <th>Tích điểm tháng</th>
            </tr>
            </thead>
            <tbody>
            <?php if(!empty($result)): ?>
                <?php foreach( $result as $item): $_partner = user_load($item->uid);?>
                    <tr data-key="<?php print($_partner->uid); ?>">
                        <td><?php if(!empty($_partner->field_account_code['und'][0]['value'])) print($_partner->field_account_code['und'][0]['value']); ?></td>
                        <td><?php if(!empty($_partner->field_account_transaction_name['und'][0]['value'])) print(($_partner->field_account_transaction_name['und'][0]['value'])); ?></td>
                        <td><?php if(!empty($_partner->field_account_full_name['und'][0]['value'])) print(($_partner->field_account_full_name['und'][0]['value'])); ?></td>
                        <td><?php print(date("d/m/Y",$_partner->created)); ?></td>
                        <td><?php if(!empty($_partner->name)) print($_partner->name); ?></td>
                        <td><?php print(strtolower($_partner->mail)); ?></td>
                        <td>
                            <?php
                            if(!empty($_partner->field_account_sale['und'])){
                                $sale = user_load($_partner->field_account_sale['und'][0]['target_id']);
                                if(!empty($sale->field_account_transaction_name['und'])) print($sale->field_account_transaction_name['und'][0]['value']);
                            };
                            ?>
                        </td>
                        <td>
                            <?php
                            $tx_rank = !empty($_partner->field_tx_rank['und'][0]['tid'])?taxonomy_term_load($_partner->field_tx_rank['und'][0]['tid']):null;
                            echo !empty($tx_rank)?$tx_rank->name:"";
                            ?>
                        </td>
                        <td class="td-partner-status bold">
                            <?php
                            try{
                                $query = db_select("tbl_issue_report","tbl_issue_report");
                                $query->fields("tbl_issue_report");
                                $query->condition("agent",$_partner->uid);
                                $query->condition("tbl_issue_report.date", [
                                    strtotime(date("01-m-Y 00:00:00", strtotime("01-".$caches['month']."-".$caches['year']))),
                                    strtotime(date("t-m-Y 23:59:59", strtotime("01-".$caches['month']."-".$caches['year']))),
                                ], "BETWEEN");
                                $query->addExpression("SUM(tbl_issue_report.partner_price)", "total_price");
                                $ticket_result = $query->execute()->fetchObject();

                                $query = db_select("tbl_room_booking_report","tbl_room_booking_report");
                                $query->fields("tbl_room_booking_report");
                                $query->condition("agent",$_partner->uid);
                                $query->condition("tbl_room_booking_report.created", [
                                    strtotime(date("01-m-Y", REQUEST_TIME)),
                                    strtotime(date("t-m-Y", REQUEST_TIME)),
                                ], "BETWEEN");
                                $query->addExpression("SUM(tbl_room_booking_report.partner_price)", "total_price");
                                $room_result = $query->execute()->fetchObject();
                                $total_revenue = !empty($ticket_result)?$ticket_result->total_price:0;
                                $total_revenue += !empty($room_result)?$room_result->total_price:0;
                                $Point = floor($total_revenue / 1000000);
                                echo number_format($Point,0,",",".");
                            }catch (Exception $e){

                            }
                            ?>
                        </td>
                    </tr>
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



<div class="loading-block">
    <div class="loading-block-container">
        <div class="lds-css ng-scope">
            <div class="lds-spin" style="width:100%;height:100%"><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div></div>
        </div>
    </div>
</div>