<?php
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/agent-report-js.js', ['weight' => 1000]);
global $user;
$caches = null;
$num_per_page = 50;
if(!empty($_REQUEST['data'])){
    $caches = $_REQUEST['data'];
    if(!empty($caches['num_per_page'])){
        $num_per_page = $caches['num_per_page'];
    }
}
//_print_r($caches);
try{
    $issue_query = db_select("tbl_issue_report","tbl_issue_report");
    $issue_query->fields("tbl_issue_report",array("created","partner_price","agent"));

    $room_query = db_select("tbl_room_booking_report","tbl_room_booking_report");
    $room_query->fields("tbl_room_booking_report",array("created"));
    $room_query->addField("tbl_room_booking_report","partner_price","partner_price");
    $room_query->addField("tbl_room_booking_report","agent","agent");

    $quer1y = Database::getConnection()
        ->select($issue_query->union($room_query))
        ->fields(NULL, array("created","partner_price","agent"))
        ->orderBy("created","DESC");
    $quer1y->condition("created",array(strtotime(date("01-01-Y",REQUEST_TIME)),strtotime(date("31-12-Y",REQUEST_TIME))),"BETWEEN");
    $quer1y->addExpression("SUM(partner_price)","total_price");
    $quer1y->groupBy("agent");


    $total_query = db_select("users","tbl_user");
    $total_query -> fields("tbl_user");
    $total_query -> join("users_roles","tbl_role","tbl_role.uid = tbl_user.uid");
    $total_query -> condition("tbl_role.rid",4);
    $total_query -> join("field_data_field_account_balance","tbl_balance","tbl_balance.entity_id = tbl_user.uid");
    $total_query -> addExpression("SUM(tbl_balance.field_account_balance_value)","total_balance");
    $result_total_query = $total_query->execute()->fetchObject();

    $total = 0;
    $query = db_select("users","tbl_user");
    $query -> fields("tbl_user");
    $query -> join("users_roles","tbl_role","tbl_role.uid = tbl_user.uid");
    $query -> condition("tbl_role.rid",4);
//    $query->condition("tbl_user.uid",130);
    $query -> leftJoin("field_data_field_account_sale","tbl_sale","tbl_sale.entity_id = tbl_user.uid");
    $query -> join("field_data_field_account_balance","tbl_balance","tbl_balance.entity_id = tbl_user.uid");
    $query->addField("tbl_balance","field_account_balance_value","balance");
    $query -> leftJoin("field_data_field_point","tbl_point","tbl_point.entity_id = tbl_user.uid");
    $query->addField("tbl_point","field_point_value","total_point");
    $query -> leftJoin("field_data_field_used_point","tbl_used_point","tbl_used_point.entity_id = tbl_user.uid");
    $query->addField("tbl_used_point","field_used_point_value","total_used_point");
    $query -> addExpression("CASE WHEN tbl_used_point.field_used_point_value>0 THEN (tbl_point.field_point_value-tbl_used_point.field_used_point_value) ELSE tbl_point.field_point_value END ","availablePoint");

    $query->leftJoin($quer1y,"tbl_rank","tbl_rank.agent=tbl_user.uid");
    $query->addField("tbl_rank","total_price","total_price");
    $query->addExpression("FLOOR(tbl_rank.total_price/1000000)","total_rank_point");
    if(!empty($caches['rank']&& $caches['rank']!="all")){
        switch ($caches['rank']){
            case 500 :
                $query->where('FLOOR(tbl_rank.total_price/1000000)<:rank', array(':rank' => $caches['rank']));
                break;
            case 1000 :
                $query->where('FLOOR(tbl_rank.total_price/1000000)>=:rank1', array(':rank1' => 500));
                $query->where('FLOOR(tbl_rank.total_price/1000000)<:rank2', array(':rank2' => 1000));
                break;
            case 2000 :
                $query->where('FLOOR(tbl_rank.total_price/1000000)<:rank1', array(':rank1' => 2000));
                $query->where('FLOOR(tbl_rank.total_price/1000000)>=:rank2', array(':rank2' => 1000));
                break;
            default:
                $query->where('FLOOR(tbl_rank.total_price/1000000)>=:rank', array(':rank' => 2000));
                break;
        }
    }
    $query->join("field_data_field_account_code","field_account_code","field_account_code.entity_id=tbl_user.uid");
    $query->addField("field_account_code","field_account_code_value","account_code");
    $query->join("field_data_field_account_transaction_name","field_account_transaction_name","field_account_transaction_name.entity_id=tbl_user.uid");
    $query->addField("field_account_transaction_name","field_account_transaction_name_value","account_transaction_name");
    if(!empty($caches['order_by']) && $caches['order_by']!="none"){
        if($caches['order_by']=='balance'){
            $query->orderBy("tbl_balance.field_account_balance_value",$caches['direction']);
        }elseif($caches['order_by']=="point"){
            $query->orderBy("CAST(availablePoint AS SIGNED)",$caches['direction']);
        }elseif($caches['order_by']=='agent_code'){
//            $query->orderBy("field_account_code.field_account_code_value",$caches['direction']);
        }
    }

    if(!empty($caches['code']&& $caches['code']!="all")){
        $query->condition("field_account_code.field_account_code_value","%".$caches['code']."%","LIKE");
    }
    if(!empty($caches['name']&& $caches['name']!="all")){
        $query->condition("field_account_transaction_name.field_account_transaction_name_value","%".$caches['name']."%","LIKE");
    }
    if(!empty($caches['tel']&& $caches['tel']!="all")){
        $query->condition("tbl_user.name","%".$caches['tel']."%","LIKE");
    }
    if(!empty($caches['mail']&& $caches['mail']!="all")){
        $query->condition("tbl_user.mail","%".$caches['mail']."%","LIKE");
    }
    if(isset($caches['status'])&& $caches['status']!="all"){
        $query->condition("tbl_user.status",$caches['status'],"=");
    }
    if(!empty($caches['sale'])&& $caches['sale']!="all"){
        $query->condition("tbl_sale.field_account_sale_target_id",$caches['sale'],"=");
    }
    if(!empty($caches['profit_filter']&& $caches['profit_filter']!="all")){
        switch ($caches['profit_filter']){
            case "morethanZero":
                $query->condition("tbl_balance.field_account_balance_value",0,">");
                break;
            case "lessthanZero":
                $query->condition("tbl_balance.field_account_balance_value",0,"<");
                break;
            case "equalZero":
                $query->condition("tbl_balance.field_account_balance_value",0,"=");
                break;
        }
    }
    $result  = $query -> execute() -> fetchAll();
    $query->addExpression("SUM(tbl_balance.field_account_balance_value)","total_balance");
    $query->addExpression("SUM(tbl_point.field_point_value)","all_total_point");
    $query->addExpression("SUM(tbl_used_point.field_used_point_value)","all_total_used_point");
    $query->addExpression("SUM(CASE WHEN tbl_used_point.field_used_point_value>0 THEN (tbl_point.field_point_value-tbl_used_point.field_used_point_value) ELSE tbl_point.field_point_value END)","total_availablePoint");
    $result2 = $query->execute()->fetchObject();
    $limit = $num_per_page;
    $page = pager_default_initialize(count($result), $limit, 0);
    $offset = $limit * $page;
    if(!empty($result)){
        $result = array_slice($result, $offset, $limit);
    }else{
        $result=array();
    }
//    _print_r($result);
}catch (Exception $e){
    _print_r($e);
}
//_print_r($query);
?>
<div class="page-agent-report">
    <div><button class="btn btn-danger btn-excel-export">Xuất Excel</button></div>
    <div class="block-filter"><style type ="text/css">.form-item-direction, .form-item-order-by {    display: none;}.form-item-num-per-page {    position: relative;}</style>
        <?php
        //        if(cassiopeia_balance_report_accept()){
        $cassiopeia_agent_report_filter_form = drupal_get_form("cassiopeia_agent_report_filter_form",$caches);
        if(!empty($cassiopeia_agent_report_filter_form)){
            $cassiopeia_agent_report_filter_form = drupal_render($cassiopeia_agent_report_filter_form);
            print($cassiopeia_agent_report_filter_form);
        }
        //        }
        ?>
    </div>
    <?php if(user_has_role(4) && !user_has_role(3)&& !user_has_role(5)&& !user_has_role(6)&& !user_has_role(7)&& !user_has_role(8)): ?>
        <div class="filter-block">
            <div class="filter-form">
                <form action="">
                    <div class="from-date">
                        <label for="">Từ ngày</label>
                        <input type="text" name="from_date" class="form-control" autocomplete="off" value="<?php print(date("d-m-Y",REQUEST_TIME-7*86400)); ?>">
                    </div>
                    <div class="to-date">
                        <label for="">Đến ngày</label>
                        <input type="text" name="to_date" class="form-control" autocomplete="off" value="<?php print(date("d-m-Y",REQUEST_TIME)); ?>">
                    </div>
                    <div class="tran_kind">
                        <label for="tran_kind">Loại giao dịch</label>
                        <select name="tran_kind" id="" class="chosen form-control">
                            <?php foreach($tran_kind_options as $key => $value): ?>
                                <option value="<?php print($key); ?>"><?php print($value); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="code">
                        <label for="">CODE</label>
                        <input name="code" type="text" class="form-control">
                    </div>
                    <div class="note">
                        <label for="">Nội dung</label>
                        <input name="content" type="text" class="form-control">
                    </div>
                    <div class="buttons">
                        <button type="submit" class="btn btn-success ">Lọc</button>
                    </div>
                </form>
            </div>
        </div>
    <?php endif; ?>
    <!--    --><?php // if(cassiopeia_balance_report_accept()): ?>
    <div class="total-block">
        <label for="">Tổng số dư:</label> <span class="color-red"><?php print(number_format($result_total_query->total_balance,0,",",".")); ?> đ</span>
    </div>
    <!--    --><?php //endif; ?>
    <div class="table-responsive">
        <table class="table  table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th class="hidden"></th>
                <th class="<?php if($caches['order_by']=="agent_code") print($caches['direction']); ?>" data-sort="agent_code">Mã</th>
                <th>Tên Đại Lý</th>
                <th class="">Điện thoại</th>
                <th class="">Email</th>
                <th class="">Hoạt động</th>
                <th class="<?php if($caches['order_by']=="balance") print($caches['direction']); ?>" data-sort="balance">Số dư</th>
                <th class="<?php if($caches['order_by']=="point") print($caches['direction']); ?> " data-sort="point">Tích điểm</th>
                <th class="">Hạng</th>
            </tr>
            </thead>
            <tbody>
            <?php if(!empty($result)): ?>
                <?php foreach($result as $value): ?>
                    <!--                    --><?php
//                    $agent = user_load($value->uid);
//                    $userPoint = !empty($agent->field_used_point['und'][0]['value'])?$agent->field_used_point['und'][0]['value']:0;
//                    $totalPoint = !empty($agent->field_point['und'][0]['value'])?$agent->field_point['und'][0]['value']:0;
//                    $availablePoint = $totalPoint - $userPoint;
//                    $rank = cassiopeia_get_agent_rank($agent);
//                    ?>
                    <tr data-key="<?php print($value->uid);?>" class="desktop-detail-row">
                        <td class="hidden"><span class="fa fa-plus"></span></td>
                        <td><a href="javascript:;" class="agent_code" data-agent-code="<?php print($value->uid);?>"><?php echo $value->account_code; ?></a></td>
                        <td><?php echo $value->account_transaction_name; ?></td>
                        <td class=""><?php echo($value->name); ?></td>
                        <td class=""><?php echo($value->mail); ?></td>
                        <td class="">
                            <?php
                            if($value->status==0){
                                print("<i class=\"fa fa-ban\"></i>");
                            }else{
                                print("<i class=\"fa fa-check\"></i>");
                            }
                            ?>
                        </td>
                        <td><?php print(number_format($value->balance,0,",",".")); ?></td>
                        <td class=""  ><?php
                            echo($value->total_point - $value->total_used_point);
                            ?></td>
                        <td class="">
                            <?php
                            $rank = "Thành viên";
                            if ($value->total_rank_point < 500) {

                            } else if ($value->total_rank_point < 1000) {
                                $rank = "Bạc";
                            } else if ($value->total_rank_point < 2000) {
                                $rank = "Vàng";
                            } else {
                                $rank = "Kim cương";
                            }
                            echo $rank;
                            ?>
                        </td>
                    </tr>
                    <tr data-key="<?php print($value->uid);?>"  class="mobile-detail-row" hidden>
                        <td colspan="4">
                            <table class="footable-details table table-bordered datatable booking-table">
                                <tbody>
                                <tr class="odd new-booking">
                                    <th>Mã</th>
                                    <td style="display: table-cell;">
                                        <?php print(!empty($agent->field_account_code['und'][0]['value'])?$agent->field_account_code['und'][0]['value']:""); ?>
                                    </td>
                                </tr>
                                <tr class="odd new-booking">
                                    <th>Tên Đại Lý</th>
                                    <td style="display: table-cell;">
                                        <?php print(!empty($agent->field_account_transaction_name['und'][0]['value'])?$agent->field_account_transaction_name['und'][0]['value']:""); ?>
                                    </td>
                                </tr>
                                <tr class="odd new-booking">
                                    <th>Điện thoại</th>
                                    <td style="display: table-cell;">
                                        <?php print($agent->name); ?>
                                    </td>
                                </tr>
                                <tr class="odd new-booking">
                                    <th>Email</th>
                                    <td style="display: table-cell;">
                                        <?php print($agent->mail); ?>
                                    </td>
                                </tr>
                                <tr class="odd new-booking">
                                    <th>Hoạt động</th>
                                    <td style="display: table-cell;">
                                        <?php
                                        if($agent->status==0){
                                            print("<i class=\"fa fa-ban\"></i>");
                                        }else{
                                            print("<i class=\"fa fa-check\"></i>");
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr class="odd new-booking">
                                    <th>Số dư</th>
                                    <td style="display: table-cell;">
                                        <?php print(number_format($agent->field_account_balance['und'][0]['value'],0,",",".")); ?>
                                    </td>
                                </tr>							<tr class="odd new-booking">                                <th>Tích điểm</th>                                <td style="display: table-cell;">                                    <?php print($totalPoint - $userPoint);?>                                </td>                            </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <?php $total+= $agent->field_account_balance['und'][0]['value']; ?>
                <?php endforeach; ?>
                <tr>                    
                    <td colspan="6" class="text-right">Tổng</td>
                    <td colspan=""><?php  print(number_format($result2->total_balance,0,",",".")); ?></td>
                    <td colspan=""><?php  print(number_format($result2->total_availablePoint,0,",",".")); ?></td>
                    <!-- <td colspan="1">Tổng</td>
                    <td colspan=""><?php  print(number_format($result2->total_balance,0,",",".")); ?></td>
                    <td colspan="4"><?php  print(number_format($result2->total_availablePoint,0,",",".")); ?></td>
                    <td colspan="4"><?php  print(number_format($result2->all_total_point - $result2->all_total_used_point,0,",",".")); ?></td> -->
                </tr>
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
    <?php // print($total); ?>
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
        $caches = null;
        if(!empty($_REQUEST['data'])){
            $caches = $_REQUEST['data'];
        }
        try{
            $issue_query = db_select("tbl_issue_report","tbl_issue_report");
            $issue_query->fields("tbl_issue_report",array("date","airline","tran_kind","PNR","quantity","partner_price","agent","tran_user","content","balance"));
            $issue_query->condition("tbl_issue_report.agent",$user->uid);
            $payment_query = db_select("tbl_payment_report","tbl_payment_report");
            $payment_query->condition("tbl_payment_report.agent",$user->uid);
            $payment_query->fields("tbl_payment_report",array("date"));
            $payment_query->addField("tbl_payment_report","created","airline");
            $payment_query->addField("tbl_payment_report","tran_kind","tran_kind");
            $payment_query->addField("tbl_payment_report","created","PNR");
            $payment_query->addField("tbl_payment_report","created","quantity");
            $payment_query->addField("tbl_payment_report","amount","partner_price");
            $payment_query->addField("tbl_payment_report","agent","agent");
            $payment_query->addField("tbl_payment_report","tran_user","tran_user");
            $payment_query->addField("tbl_payment_report","content","content");
            $payment_query->addField("tbl_payment_report","balance","balance");
            $query = Database::getConnection()
                ->select($issue_query->union($payment_query))
                ->fields(NULL, array("date","airline","tran_kind","PNR","quantity","partner_price","agent","tran_user","content","balance"))
                ->orderBy("date","DESC");
//    $query->condition("tbl_issue_report.created",array(strtotime(date("01-m-Y 00:00",REQUEST_TIME)),strtotime(date("t-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
            $result = $query->execute()->fetchAll();
        }catch (Exception $e){
            print_r($e);
        }
        ?>
        <table class="table table-responsive report-items">
            <thead>
            <tr>
                <th class="">Ngày thực hiện</th>
                <th>Loại GD</th>
                <th>Mã GD</th>
                <th>Thanh toán</th>
                <th class="hidden-xs">Nội dung</th>
                <th class="hidden-xs">Số dư</th>
            </tr>
            </thead>
            <?php if(!empty($result)): ?>
                <?php foreach($result as $value): ?>
                    <tr>
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
                    <tr class="footable-detail-row visible-xs">
                        <td colspan="4">
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
    <?php endif; ?>
</div>
