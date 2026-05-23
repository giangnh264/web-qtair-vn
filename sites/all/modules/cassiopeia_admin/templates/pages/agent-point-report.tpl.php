<?php
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
if(!empty($arg[5])){
    $caches['date_filter'] = "other";
    $caches['from_date'] = (date('Y-m-01 00:00',strtotime("01-".$arg[5])));
    $caches['to_date'] = (date("Y-m-t 23:59",strtotime("01-".$arg[5])));
}
//_print_r($caches);
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/partner.js', ['weight' => 1000]);
global $user;
try{
//    $sub = db_select("tbl_issue_report","tbl_issue_report");
//    $sub->fields("tbl_issue_report");
//    $sub->orderBy("created","DESC");
//    $sub->addExpression('MAX(tbl_issue_report.created)', 'max_price');
//    $sub->groupBy("agent");
//    $query = db_select("tbl_issue_report","tbl_issue_report");
//    $query->fields("tbl_issue_report");
//    $query->join($sub,"tbl_sub","tbl_sub.max_price=tbl_issue_report.created");
//    $query->condition("tbl_issue_report.created",REQUEST_TIME-86400*90,"<");
//    $result = $query->execute()->fetchAll();
//    if(!empty($result)){
//        foreach($result as $agent){
//            $_agent = user_load($agent->agent);
//            $_agent->field_account_status['und'][0]['tid'] = 14;
//            $_agent->status=0;
//            user_save($_agent);
//        }
//    }

    $query = db_select("users","tbl_user");
    $query -> fields("tbl_user");
    $query -> orderBy("tbl_user.created","DESC");
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
    $or = db_or();
    if(user_has_role(3,$user)){

    }else{
        if(user_has_role(7,$user) || user_has_role(8,$user)|| user_has_role(9,$user)){
//            print_r(123);
            $or->condition("tbl_sale.field_account_sale_target_id",null,"<>");
            $or->condition("tbl_sale.field_account_sale_target_id","","<>");
        }else{
            $or->condition("tbl_sale.field_account_sale_target_id",$user->uid);
            $or->condition("tbl_sale.field_account_sale_target_id",null);
            $or->condition("tbl_sale.field_account_sale_target_id","");
        }
        $query->condition($or);
    }
    if(!empty($caches['date_filter']&& $caches['date_filter']!="all")){
        if($caches['status']==13 || $caches['status']==14){
            switch ($caches['date_filter']){
                case "today" :
                    $query->condition("field_account_updated_date.field_account_updated_date_value",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME)),strtotime(date("d-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
                    break;
                case "yesterday" :
                    $query->condition("field_account_updated_date.field_account_updated_date_value",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME-86400)),strtotime(date("d-m-Y 23:59",REQUEST_TIME-86400))),"BETWEEN");
                    break;
                case "thismonth" :
                    $query->condition("field_account_updated_date.field_account_updated_date_value",array(strtotime(date("01-m-Y 00:00",REQUEST_TIME)),strtotime(date("t-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
                    break;
                case "other":
                    if(!empty($caches['from_date'])){
                        $query->condition("field_account_updated_date.field_account_updated_date_value",strtotime(date("d-m-Y 00:00",strtotime($caches['from_date']))),">=");
                    }
                    if($caches['to_date']){
                        $query->condition("field_account_updated_date.field_account_updated_date_value",strtotime(date("d-m-Y 23:59",strtotime($caches['to_date']))),"<=");
                    }
                    break;
            }
        }else{
            switch ($caches['date_filter']){
                case "today" :
                    $query->condition("tbl_user.created",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME)),strtotime(date("d-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
                    break;
                case "yesterday" :
                    $query->condition("tbl_user.created",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME-86400)),strtotime(date("d-m-Y 23:59",REQUEST_TIME-86400))),"BETWEEN");
                    break;
                case "thismonth" :
                    $query->condition("tbl_user.created",array(strtotime(date("01-m-Y 00:00",REQUEST_TIME)),strtotime(date("t-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
                    break;
                case "other":
                    if(!empty($caches['from_date'])){
                        $query->condition("tbl_user.created",strtotime(date("d-m-Y 00:00",strtotime($caches['from_date']))),">=");
                    }
                    if($caches['to_date']){
                        $query->condition("tbl_user.created",strtotime(date("d-m-Y 23:59",strtotime($caches['to_date']))),"<=");
                    }
                    break;
            }
        }

    }
    if(!empty($caches['code'])){
        $query -> condition("field_account_code.field_account_code_value","%".$caches['code']."%","LIKE");
    }
    if(!empty($caches['transaction_name'])){
        $query -> condition("field_account_transaction_name.field_account_transaction_name_value","%".$caches['transaction_name']."%","LIKE");
    }
    if(!empty($caches['full_name'])){
        $query -> condition("field_account_full_name.field_account_full_name_value","%".$caches['full_name']."%","LIKE");
    }
    if(!empty($caches['tel'])){
        $query -> condition("tbl_user.name","%".$caches['tel']."%","LIKE");
    }
    if(!empty($caches['email'])){
        $query -> condition("tbl_user.mail","%".$caches['email']."%","LIKE");
    }
    if(!empty($caches['status']) && $caches['status']!="all"){
        if($caches['status']==1000){
            $query->join("tbl_issue_report","tbl_issue_report","tbl_issue_report.agent=tbl_user.uid");
            $query->groupBy("tbl_user.uid");
        }elseif($caches['status']==1001){
            $query->join("tbl_room_booking_report","tbl_room_booking_report","tbl_room_booking_report.agent=tbl_user.uid");
            $query->groupBy("tbl_user.uid");
        }else{
            $query->condition("field_account_status.field_account_status_tid",$caches['status']);
        }
    }
    if(!empty($caches['sale']) && $caches['sale']!="all"){
        $query->condition("tbl_sale.field_account_sale_target_id",$caches['sale']);
    }
    if(!empty($caches['source']) && $caches['source']!="all"){
        if($caches['source']==2){
            $query->condition("field_account_source.field_account_source_value",$caches['source']);
        }else{
            $or = db_or();
            $or->condition("field_account_source.field_account_source_value",2,"<>");
            $or->condition("field_account_source.field_account_source_value",null,"=");
            $or->condition("field_account_source.field_account_source_value","","=");
            $query->condition($or);
        }
    }
    $query->orderBy("field_account_updated_date.field_account_updated_date_value","DESC");

    $result  = $query -> execute() -> fetchAll();
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
?>
<div class="page-manager-partners">
    <div class="filter_form">
        <?php
        $cassiopeia_manager_partners_filter_form = drupal_get_form("cassiopeia_manager_partners_filter_form",$caches);
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
                <?php if(cassiopeia_check_permission("cassiopeia_user_permission_partner","p_edit")): ?>
                    <th>Tác vụ</th>
                <?php endif; ?>
                <th>Mã Đại lí</th>
                <th>Tên giao dịch</th>
                <th>Họ tên</th>
                <th>Ngày tạo</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Sale</th>
                <th>Loại đại lý</th>
                <th>Tình trạng</th>
            </tr>
            </thead>
            <tbody>
            <?php if(!empty($result)): ?>
                <?php foreach( $result as $item): $_partner = user_load($item->uid);?>
                    <tr data-key="<?php print($_partner->uid); ?>">
                        <?php if(cassiopeia_check_permission("cassiopeia_user_permission_partner","p_edit")): ?>
                            <td>
                                <a href="/user/<?php print($_partner->uid); ?>/edit"><i class="fa fa-pencil-square-o"></i></a>
                            </td>
                        <?php endif; ?>
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
                            <?php if($_partner->field_account_status['und'][0]['tid']==14 ||  $_partner->field_account_status['und'][0]['tid']==10 || user_has_role(3,$user)): //đăng ký ?>
                                <?php if((empty($_partner->field_account_sale['und']) || $_partner->field_account_sale['und'][0]['target_id'] == $user->uid ) && cassiopeia_partner_edit_access()): ?>
                                    <?php
                                    $vocal = taxonomy_vocabulary_machine_name_load("user_status");
                                    $tx_status = taxonomy_get_tree($vocal->vid,0,1);
                                    ?>
                                    <div>
                                        <span class="text-partner-status partner-status-<?php print($_partner->field_account_status['und'][0]['tid']); ?>"><?php print(taxonomy_term_load($_partner->field_account_status['und'][0]['tid'])->name); ?></span>
                                        <ul>
                                            <?php if(!empty($tx_status)): ?>
                                                <?php foreach($tx_status as $status): ?>
                                                    <li data-partner-id="<?php print($item->uid); ?>" class=" <?php if($_partner->field_account_status['und'][0]['tid']==$status->tid) print("active"); ?>" data-status-tid="<?php print($status->tid); ?>"><?php print($status->name); ?></li>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                <?php else: ?>
                                    <?php
                                    $query = db_select("tbl_issue_report","tbl_issue_report");
                                    $query->fields("tbl_issue_report");
                                    $query->condition("agent",$_partner->uid);
                                    $query->range(0,1);
                                    $ticket_online = $query->execute()->fetchObject();
                                    $query = db_select("tbl_room_booking_report","tbl_room_booking_report");
                                    $query->fields("tbl_room_booking_report");
                                    $query->condition("agent",$_partner->uid);
                                    $query->range(0,1);
                                    $hotel_online = $query->execute()->fetchObject();
                                    ?>
                                    <?php if(!empty($ticket_online)): ?>
                                        <i class="fa fa-ticket partner-status-13"></i>
                                    <?php endif; ?>
                                    <?php if(!empty($hotel_online)): ?>
                                        <i class="fa fa-building-o partner-status-13"></i>
                                    <?php endif; ?>
                                    <!--                                <span class="text-partner-status partner-status---><?php //print($_partner->field_account_status['und'][0]['tid']); ?><!--">--><?php //print(taxonomy_term_load($_partner->field_account_status['und'][0]['tid'])->name); ?><!--</span>-->
                                <?php endif; ?>
                            <?php else: ?>
                                <span class="text-partner-status partner-status-<?php print($_partner->field_account_status['und'][0]['tid']); ?>"><?php print(taxonomy_term_load($_partner->field_account_status['und'][0]['tid'])->name); ?></span>
                            <?php endif; ?>
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


<!-- Modal -->
<!--<div id="modal_create_region" class="modal fade" role="dialog">-->
<!--    <div class="modal-dialog">-->
<!---->
<!--        <!-- Modal content-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <button type="button" class="close" data-dismiss="modal">&times;</button>-->
<!--                <h4 class="modal-title">Cấu hình phí hoa hồng</h4>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                --><?php
//                $cassiopeia_ticket_price_add_form = drupal_get_form("cassiopeia_ticket_price_add_form");
//                if(!empty($cassiopeia_ticket_price_add_form)){
//                    $cassiopeia_ticket_price_add_form = drupal_render($cassiopeia_ticket_price_add_form);
//                    print($cassiopeia_ticket_price_add_form);
//                }
//                ?>
<!--            </div>-->
<!--        </div>-->
<!---->
<!--    </div>-->
<!--</div>-->
<div class="loading-block">
    <div class="loading-block-container">
        <div class="lds-css ng-scope">
            <div class="lds-spin" style="width:100%;height:100%"><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div></div>
        </div>
    </div>
</div>