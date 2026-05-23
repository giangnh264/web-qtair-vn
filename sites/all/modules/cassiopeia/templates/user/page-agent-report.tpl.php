<?php
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/agent-report-js.js', ['weight' => 1000]);
global $user;
$cache = null;
$_user = user_load($user->uid);
$num_per_page = 50;
if(!empty($_REQUEST['data'])){
    $cache = $_REQUEST['data'];
    if(!empty($cache['num_per_page'])){
        $num_per_page = $cache['num_per_page'];
    }
}
$cache = isset($_REQUEST['data'])?$_REQUEST['data']:array();
if(empty($cache['date_filter'])){
    $cache['date_filter'] = "thismonth";
}
_print_r($cache);
try{
    $total_query = db_select("users","tbl_user");
    $total_query -> fields("tbl_user");
    $total_query -> join("users_roles","tbl_role","tbl_role.uid = tbl_user.uid");
    $total_query -> condition("tbl_role.rid",4);
    $total_query -> join("field_data_field_account_balance","tbl_balance","tbl_balance.entity_id = tbl_user.uid");
    $total_query -> addExpression("SUM(tbl_balance.field_account_balance_value)","total_balance");
    $result_total_query = $total_query->execute()->fetchObject();
    $total = 0;

//    $query = db_select("users","tbl_user");
//    $query -> fields("tbl_user");
//    $query -> join("users_roles","tbl_role","tbl_role.uid = tbl_user.uid");
//    $query -> condition("tbl_role.rid",4);
//    $query -> leftJoin("field_data_field_account_sale","tbl_sale","tbl_sale.entity_id = tbl_user.uid");
//    $query -> join("field_data_field_account_balance","tbl_balance","tbl_balance.entity_id = tbl_user.uid");
//    $query -> leftJoin("field_data_field_point","tbl_point","tbl_point.entity_id = tbl_user.uid");
//    $query -> leftJoin("field_data_field_used_point","tbl_used_point","tbl_used_point.entity_id = tbl_user.uid");
//    $query -> addExpression("CASE WHEN tbl_used_point.field_used_point_value>0 THEN (tbl_point.field_point_value-tbl_used_point.field_used_point_value) ELSE tbl_point.field_point_value END ","availablePoint");
//    $query->join("field_data_field_account_code","field_account_code","field_account_code.entity_id=tbl_user.uid");
//    $query->condition("tbl_user.uid",$user->uid);
//    $result  = $query -> execute() -> fetchAll();

//    $query->addExpression("SUM(tbl_balance.field_account_balance_value)","total_balance");
//    $query->addExpression("SUM(CASE WHEN tbl_used_point.field_used_point_value>0 THEN (tbl_point.field_point_value-tbl_used_point.field_used_point_value) ELSE tbl_point.field_point_value END)","total_availablePoint");
//    $result2 = $query->execute()->fetchObject();
    $limit = 50;
//    $page = pager_default_initialize(count($result), $limit, 0);
//    $offset = $limit * $page;
//    if(!empty($result)){
//        $result = array_slice($result, $offset, $limit);
//    }else{
//        $result=array();
//    }
//    _print_r($result);
}catch (Exception $e){
    _print_r($e);
}
$_point = !empty($_user->field_point['und'][0]['value'])?$_user->field_point['und'][0]['value']:0;
$_used_point = !empty($_user->field_used_point['und'][0]['value'])?$_user->field_used_point['und'][0]['value']:0;
?>
<div class="page-agent-report">
    <div class="agent-info">
        <div class="agent-info-wrap">
            <h2><?php print(!empty($_user->field_account_transaction_name['und'][0]['value'])?$_user->field_account_transaction_name['und'][0]['value']:$_user->name); ?></h2>
            <div class="agent-code">
                <span for="">Mã đại lý: </span>
                <span class="color-red">
                    <?php print(!empty($_user->field_account_code['und'][0]['value'])?$_user->field_account_code['und'][0]['value']:""); ?>
                </span>
            </div>
            <div class="point">
               <span>Điểm có thể sử dụng: </span>
               <span>
                   <?php print($_point - $_used_point); ?>
                </span>
            </div>
            <div class="balance">
                <span>Tài khoản chính: </span>
                <span class="account-balance"><?php print(number_format($_user->field_account_balance['und'][0]['value'],0,",",".")); ?> đ</span>
            </div>
        </div>
    </div>

    <?php if(user_has_role(4) && !user_has_role(3)&& !user_has_role(5)&& !user_has_role(6)&& !user_has_role(7)&& !user_has_role(8)): ?>
        <?php
        $cassiopeia_room_booking_filter_form = drupal_get_form("cassiopeia_user_agent_filter_form",$cache);
        if($cassiopeia_room_booking_filter_form){
            $cassiopeia_room_booking_filter_form = drupal_render($cassiopeia_room_booking_filter_form);
            echo $cassiopeia_room_booking_filter_form;
        }
        ?>
    <?php endif; ?>

<!--        --><?php //if(!empty($result)): ?>
<!--    <table class="table table-responsive table-hover table-bordered">-->
<!--        <thead class="thead-dark">-->
<!--        <tr>-->
<!--            <th class="" data-sort="agent_code">Mã</th>-->
<!--            <th>Tên Đại Lý</th>-->
<!--            <th class="hidden-xs">Điện thoại</th>-->
<!--            <th class="hidden-xs">Email</th>-->
<!--            <th class="hidden-xs">Hoạt động</th>-->
<!--            <th class="" data-sort="balance">Số dư</th>-->
<!--            <th class=" hidden-xs" data-sort="point">Tích điểm</th>-->
<!--            <th class="hidden-xs">Hạng</th>-->
<!--        </tr>-->
<!--        </thead>-->
<!--        <tbody>-->
<!--            --><?php //foreach($result as $value): ?>
<!--                --><?php
//                $agent = user_load($value->uid);
//                $userPoint = !empty($agent->field_used_point['und'][0]['value'])?$agent->field_used_point['und'][0]['value']:0;
//                $totalPoint = !empty($agent->field_point['und'][0]['value'])?$agent->field_point['und'][0]['value']:0;
//                $availablePoint = $totalPoint - $userPoint;
//                $rank = cassiopeia_get_agent_rank($agent);
//                ?>
<!--                <tr>-->
<!--                    <td>--><?php //print(!empty($agent->field_account_code['und'][0]['value'])?$agent->field_account_code['und'][0]['value']:""); ?><!--</td>-->
<!--                    <td>--><?php //print(!empty($agent->field_account_transaction_name['und'][0]['value'])?$agent->field_account_transaction_name['und'][0]['value']:""); ?><!--</td>-->
<!--                    <td class="hidden-xs">--><?php //print($agent->name); ?><!--</td>-->
<!--                    <td class="hidden-xs">--><?php //print($agent->mail); ?><!--</td>-->
<!--                    <td class="hidden-xs">-->
<!--                        --><?php
//                        if($agent->status==0){
//                            print("<i class=\"fa fa-ban\"></i>");
//                        }else{
//                            print("<i class=\"fa fa-check\"></i>");
//                        }
//                        ?>
<!--                    </td>-->
<!--                    <td>--><?php //print(number_format($agent->field_account_balance['und'][0]['value'],0,",",".")); ?><!--</td>-->
<!--                    <td class="hidden-xs">--><?php
//                        print($totalPoint - $userPoint);
//                        ?><!--</td>-->
<!--                    <td class="hidden-xs">--><?php //print($rank); ?><!--</td>-->
<!--                </tr>-->
<!--                <tr class="footable-detail-row visible-xs">-->
<!--                    <td colspan="3">-->
<!--                        <table class="footable-details table table-bordered datatable booking-table">-->
<!--                            <tbody>-->
<!--                            <tr class="odd new-booking">-->
<!--                                <th>Mã</th>-->
<!--                                <td style="display: table-cell;">-->
<!--                                    --><?php //print(!empty($agent->field_account_code['und'][0]['value'])?$agent->field_account_code['und'][0]['value']:""); ?>
<!--                                </td>-->
<!--                            </tr>-->
<!--                            <tr class="odd new-booking">-->
<!--                                <th>Tên Đại Lý</th>-->
<!--                                <td style="display: table-cell;">-->
<!--                                    --><?php //print(!empty($agent->field_account_transaction_name['und'][0]['value'])?$agent->field_account_transaction_name['und'][0]['value']:""); ?>
<!--                                </td>-->
<!--                            </tr>-->
<!--                            <tr class="odd new-booking">-->
<!--                                <th>Điện thoại</th>-->
<!--                                <td style="display: table-cell;">-->
<!--                                    --><?php //print($agent->name); ?>
<!--                                </td>-->
<!--                            </tr>-->
<!--                            <tr class="odd new-booking">-->
<!--                                <th>Email</th>-->
<!--                                <td style="display: table-cell;">-->
<!--                                    --><?php //print($agent->mail); ?>
<!--                                </td>-->
<!--                            </tr>-->
<!--                            <tr class="odd new-booking">-->
<!--                                <th>Hoạt động</th>-->
<!--                                <td style="display: table-cell;">-->
<!--                                    --><?php
//                                    if($agent->status==0){
//                                        print("<i class=\"fa fa-ban\"></i>");
//                                    }else{
//                                        print("<i class=\"fa fa-check\"></i>");
//                                    }
//                                    ?>
<!--                                </td>-->
<!--                            </tr>-->
<!--                            <tr class="odd new-booking">-->
<!--                                <th>Số dư</th>-->
<!--                                <td style="display: table-cell;">-->
<!--                                    --><?php //print(number_format($agent->field_account_balance['und'][0]['value'],0,",",".")); ?>
<!--                                </td>-->
<!--                            </tr>-->
<!--                            </tbody>-->
<!--                        </table>-->
<!--                    </td>-->
<!--                </tr>-->
<!--                --><?php //$total+= $agent->field_account_balance['und'][0]['value']; ?>
<!--            --><?php //endforeach; ?>
<!--            <tr>-->
<!--                <td colspan="1">Tổng</td>-->
<!--                <td colspan="">--><?php // print(number_format($result2->total_balance,0,",",".")); ?><!--</td>-->
<!--                <td colspan="">--><?php // print(number_format($result2->total_availablePoint,0,",",".")); ?><!--</td>-->
<!--            </tr>-->
<!--        --><?php //endif; ?>
<!--        </tbody>-->
<!--    </table>-->
<!--    <!-- paging-->
<!--    <div class="page">-->
<!--        <div class="cassiopeia-pagination">-->
<!--            <div class="cassiopeia-pagination-container">-->
<!--                --><?php //print (theme('pager',  array('tags' => array('«','‹','','›','»'))));?>
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <!--e: paging-->
<!--    --><?php //// print($total); ?>
    <?php if(user_has_role(4) && !user_has_role(3)&& !user_has_role(5)&& !user_has_role(6)&& !user_has_role(7)&& !user_has_role(8)): ?>
        <?php
        global $user;
        $query = db_select("tbl_tran_kind","tbl_tran_kind");
        $query -> fields("tbl_tran_kind");
        $query -> condition("kind","issue");
        $result = $query -> execute() -> fetchAll();
        $tran_kind_options = array();
        $tran_kind_options['all'] = "Tất cả";
        if(!empty($result)){
            foreach($result as $value){
                $tran_kind_options[$value->id] = $value->name;
            }
        }
//        $cache = null;
//        $cache = isset($_REQUEST)?$_REQUEST:null;
        $startDate = date("d-m-Y",REQUEST_TIME-7*86400);
        $endDate = date("d-m-Y",REQUEST_TIME);
//        if(!empty($_REQUEST)){
//            $cache = $_REQUEST;
//            $startDate = $cache['from_date'];
//            $endDate = $cache['to_date'];
            $code = !empty($cache['code'])?$cache['code']:"";
            $content = !empty($cache['content'])?$cache['content']:"";
//        }
        try{
            $room_query = db_select("tbl_room_booking_report","tbl_room_booking_report");
            $room_query->addField("tbl_room_booking_report","created","date");
            $room_query->addField("tbl_room_booking_report","created","created");
            $room_query->addField("tbl_room_booking_report","tran_kind","tran_kind");
            $room_query->addField("tbl_room_booking_report","created","PNR");
            $room_query->addField("tbl_room_booking_report","created","quantity");
            $room_query->addField("tbl_room_booking_report","partner_price","partner_price");
            $room_query->addField("tbl_room_booking_report","agent","agent");
            $room_query->addField("tbl_room_booking_report","tran_user","tran_user");
            $room_query->addField("tbl_room_booking_report","created","content");
            $room_query->addField("tbl_room_booking_report","balance","balance");
            $room_query->addField("tbl_room_booking_report","tran_code","tran_code");
            $room_query->condition("tbl_room_booking_report.agent",$user->uid);

            $issue_query = db_select("tbl_issue_report","tbl_issue_report");
            $issue_query->fields("tbl_issue_report",array("date","created","tran_kind","PNR","quantity","partner_price","agent","tran_user","content","balance","tran_code"));
            $issue_query->condition("tbl_issue_report.agent",$user->uid);
            $payment_query = db_select("tbl_payment_report","tbl_payment_report");
            $payment_query->condition("tbl_payment_report.agent",$user->uid);
            $payment_query->fields("tbl_payment_report",array("date"));
            $payment_query->addField("tbl_payment_report","created","created");
            $payment_query->addField("tbl_payment_report","tran_kind","tran_kind");
            $payment_query->addField("tbl_payment_report","created","PNR");
            $payment_query->addField("tbl_payment_report","created","quantity");
            $payment_query->addField("tbl_payment_report","amount","partner_price");
            $payment_query->addField("tbl_payment_report","agent","agent");
            $payment_query->addField("tbl_payment_report","tran_user","tran_user");
            $payment_query->addField("tbl_payment_report","content","content");
            $payment_query->addField("tbl_payment_report","balance","balance");
            $payment_query->addField("tbl_payment_report","tran_code","tran_code");
            $query = Database::getConnection()
                ->select($issue_query->union($payment_query))
                ->fields(NULL, array("date","created","tran_kind","PNR","quantity","partner_price","agent","tran_user","content","balance","tran_code"));
//                ->orderBy("date","DESC");
            $query = Database::getConnection()
                ->select($query->union($room_query))
                ->fields(NULL, array("date","created","tran_kind","PNR","quantity","partner_price","agent","tran_user","content","balance","tran_code"))
                ->orderBy("created","DESC");
            if(!empty($cache['date_filter']&& $cache['date_filter']!="all")){
                switch ($cache['date_filter']){
                    case "today" :
                        $query->condition("date",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME)),strtotime(date("d-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
                        break;
                    case "yesterday" :
                        $query->condition("date",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME-86400)),strtotime(date("d-m-Y 23:59",REQUEST_TIME-86400))),"BETWEEN");
                        break;
                    case "thismonth" :
                        $query->condition("date",array(strtotime(date("01-m-Y 00:00",REQUEST_TIME)),strtotime(date("t-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
                        break;
                    case "other":
                        if(!empty($cache['from_date'])){
                            $query->condition("date",strtotime(date("d-m-Y 00:00",strtotime($cache['from_date']))),">=");
                        }
                        if($data->to_date){
                            $query->condition("date",strtotime(date("d-m-Y 23:59",strtotime($cache['to_date']))),"<=");
                        }
                        break;
                }
            }
//            if(!empty($startDate)){
//                $query->condition("date",strtotime($startDate),">=");
//            }
//            if(!empty($endDate)){
//                $query->condition("date",strtotime($endDate),"<=");
//            }
            if(!empty($code)){
                $query->condition("PNR","%".$code."%","LIKE");
            }
            if(!empty($content)){
                $query->condition("content","%".$content."%","LIKE");
            }
            if(!empty($cache['tran_kind'])&&$cache['tran_kind']!="all"){
                $query->condition("tran_kind",$cache['tran_kind']);
            }
            if(!empty($cache['tran_user'])&&$cache['tran_user']!="all"){
                $query->condition("tran_user",$cache['tran_user']);
            }
            $result = $query->execute()->fetchAll();
        }catch (Exception $e){
            print_r($e);
        }
        ?>
        <div class="table-responsive">
            <table class="table table-responsive c-table report-items">
                <thead>
                <tr>
                    <th class="visible-xs"></th>
                    <th colspan="" class="">Ngày thực hiện</th>
                    <th>Loại giao dịch</th>
                    <th>Mã giao dịch</th>
                    <th>Thanh toán</th>
                    <th class="hidden-xs">Nội dung</th>
                    <th class="hidden-xs">Số dư</th>
                </tr>
                </thead>
                <?php if(!empty($result)): ?>
                    <?php foreach($result as $value): ?>
                        <tr data-key="<?php print($value->tran_code);?>" class="desktop-detail-row">
                            <td class="visible-xs">
                                <i class="fa fa-plus"></i>
                            </td>
                            <td class=""><?php print(date("d/m/Y H:i",$value->date)); ?></td>
                            <td>
                                <?php
                                $tran_kind = cassiopeia_get_tran_kind_by_id($value->tran_kind);
                                print($tran_kind['name']);
                                ?>
                            </td>
                            <td>
                                <?php if($value->PNR!=$value->created) print($value->PNR); ?>
                            </td>
                            <td class="<?php print($tran_kind['type']==1?"plus":"minus"); ?> text-right ">
                                <?php if($tran_kind['type']==1): ?>
                                    <?php print(number_format(abs($value->partner_price),0,",",".")); ?>
                                <?php else: ?>
                                    <?php print(number_format(-abs($value->partner_price),0,",",".")); ?>
                                <?php endif; ?>
                            </td>
                            <td class="hidden-xs"><?php print($value->content); ?></td>
                            <td class="hidden-xs text-right"><?php print(number_format($value->balance)); ?></td>
                        </tr>
                        <tr data-key="<?php print($value->tran_code);?>"  class="mobile-detail-row">
                            <td colspan="5">
                                <table class="footable-details table table-bordered datatable booking-table">
                                    <tbody>
                                    <tr class="odd new-booking">
                                        <th>Ngày thực hiện</th>
                                        <td style="display: table-cell;">
                                            <?php print(date("d/m/Y H:i",$value->date)); ?>
                                        </td>
                                    </tr>
                                    <tr class="odd new-booking">
                                        <th>Loại GD</th>
                                        <td style="display: table-cell;">
                                            <?
                                            print($tran_kind['name']);
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="odd new-booking">
                                        <th>Mã GD</th>
                                        <td style="display: table-cell;">
                                            <?php if($value->PNR!=$value->created) print($value->PNR); ?>
                                        </td>
                                    </tr>
                                    <tr class="odd new-booking">
                                        <th>Thanh toán</th>
                                        <td style="display: table-cell;">
                                            <?php print(number_format($value->partner_price,0,",",".")); ?>
                                        </td>
                                    </tr>
                                    <tr class="odd new-booking">
                                        <th>Nội dung</th>
                                        <td style="display: table-cell;">
                                            <?php print($value->content); ?>
                                        </td>
                                    </tr>
                                    <tr class="odd new-booking">
                                        <th>Số dư</th>
                                        <td style="display: table-cell;">
                                            <?php print(number_format($value->balance)); ?>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </div>
    <?php endif; ?>
</div>
