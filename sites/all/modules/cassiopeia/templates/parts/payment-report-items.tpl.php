<?php
global $user;
$caches = null;
$datas = !empty($variables['data'])?$variables['data']:null;
$page = isset($datas->page)?$datas->page:1;
$limit = 50;
if(!empty($_SESSION["loadDataFromOtherLink"])){
    $datas = $_SESSION["DataFromOtherLink"];
    unset($_SESSION['loadDataFromOtherLink']);
    unset($_SESSION['DataFromOtherLink']);
}
if(!empty($datas)){
    $caches['tran_kind'] = $datas->tran_kind;
    $caches['PNR'] = $datas->PNR;
    $caches['agent'] = $datas->agent;
    $caches['tran_user'] = $datas->tran_user;
    $caches['content'] = $datas->content;
    $caches['date_filter'] = $datas->date_filter;
    $caches['from_date'] = $datas->from_date;
    $caches['to_date'] = $datas->to_date;
    $caches['export'] = $datas->export;
}
//_print_r($caches);
try{
    $issue_query = db_select("tbl_issue_report","tbl_issue_report");
    $issue_query->fields("tbl_issue_report",array("created","airline","tran_kind","PNR","quantity","partner_price","agent","tran_user","content","balance","date","tran_code"));

    $room_query = db_select("tbl_room_booking_report","tbl_room_booking_report");
    $room_query->fields("tbl_room_booking_report",array("created"));
    $room_query->addField("tbl_room_booking_report","created","airline");
    $room_query->addField("tbl_room_booking_report","tran_kind","tran_kind");
    $room_query->addField("tbl_room_booking_report","created","PNR");
    $room_query->addField("tbl_room_booking_report","created","quantity");
    $room_query->addField("tbl_room_booking_report","partner_price","partner_price");
    $room_query->addField("tbl_room_booking_report","agent","agent");
    $room_query->addField("tbl_room_booking_report","tran_user","tran_user");
    $room_query->addField("tbl_room_booking_report","note","content");
    $room_query->addField("tbl_room_booking_report","balance","balance");
    $room_query->addField("tbl_room_booking_report","created","date");
    $room_query->addField("tbl_room_booking_report","tran_code","tran_code");
    $result = $room_query->execute()->fetchAll();

    $payment_query = db_select("tbl_payment_report","tbl_payment_report");
    $payment_query->fields("tbl_payment_report",array("created"));
    $payment_query->addField("tbl_payment_report","created","airline");
    $payment_query->addField("tbl_payment_report","tran_kind","tran_kind");
    $payment_query->addField("tbl_payment_report","created","PNR");
    $payment_query->addField("tbl_payment_report","created","quantity");
    $payment_query->addField("tbl_payment_report","amount","partner_price");
    $payment_query->addField("tbl_payment_report","agent","agent");
    $payment_query->addField("tbl_payment_report","tran_user","tran_user");
    $payment_query->addField("tbl_payment_report","content","content");
    $payment_query->addField("tbl_payment_report","balance","balance");
    $payment_query->addField("tbl_payment_report","date","date");
    $payment_query->addField("tbl_payment_report","tran_code","tran_code");
    $quer1y = Database::getConnection()
        ->select($issue_query->union($payment_query))
        ->fields(NULL, array("created","airline","tran_kind","PNR","quantity","partner_price","agent","tran_user","content","balance","date","tran_code"));
//        ->orderBy("created","DESC");

    $quer1y = Database::getConnection()
        ->select($quer1y->union($room_query))
        ->fields(NULL, array("created","airline","tran_kind","PNR","quantity","partner_price","agent","tran_user","content","balance","date","tran_code"))
        ->orderBy("created","DESC");
    $quer1y->join("tbl_tran_kind","tbl_tran_kind","tbl_tran_kind.id=tran_kind");
    if(!empty($caches['date_filter']&& $caches['date_filter']!="all")){
        switch ($caches['date_filter']){
            case "today" :
                $quer1y->condition("date",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME)),strtotime(date("d-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
                break;
            case "yesterday" :
                $quer1y->condition("date",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME-86400)),strtotime(date("d-m-Y 23:59",REQUEST_TIME-86400))),"BETWEEN");
                break;
            case "thismonth" :
//                if($user->uid==1){
//                    $quer1y->condition("date",array(strtotime(date("8-m-Y 00:00",REQUEST_TIME)),strtotime(date("t-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
//                }else{
                $quer1y->condition("date",array(strtotime(date("01-m-Y 00:00",REQUEST_TIME)),strtotime(date("t-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
//                }

                break;
            case "other":
                if(!empty($caches['from_date'])){
                    $quer1y->condition("date",strtotime($caches['from_date']),">");
                }
                if($caches['to_date']){
                    $quer1y->condition("date",strtotime($caches['to_date']),"<");
                }
                break;
        }
    }elseif($caches['date_filter']=="other"){
        if(!empty($caches['payment_report_from_date']&& $caches['payment_report_from_date']!="")){
            $quer1y->condition("date",strtotime(date("d-m-Y 00:00",strtotime($caches['payment_report_from_date']))),">=");
        }
        if(!empty($caches['payment_report_to_date']&& $caches['payment_report_to_date']!="")){
            $quer1y->condition("date",strtotime(date("d-m-Y 23:59",strtotime($caches['payment_report_to_date']))),"<=");
        }
    }
    if(!empty($caches['tran_kind']&& $caches['tran_kind']!="all")){
        $quer1y->condition("tran_kind",$caches['tran_kind']);
    }
    if(!empty($caches['PNR']&& $caches['PNR']!="all")){
        $quer1y->condition("PNR",$caches['PNR']);

    }
    if(!empty($caches['content']&& $caches['content']!="")){
        $quer1y->condition("content","%".$caches['content']."%","LIKE");
    }
    if(!empty($caches['tran_user']) && $caches['tran_user']!="all"){
        $quer1y->condition("tran_user",$caches['tran_user']);

    }
    if(cassiopeia_payment_report_accept()){
        if(!empty($caches['agent'])){
            if($caches['agent'] == "offline"){
            }else if($caches['agent']!="all"){
                $quer1y->condition("agent",$caches['agent']);
            }
        }
    }else{
        $quer1y->condition("agent",$user->uid);
    }
    if($user->uid==1){
//        $quer1y->groupBy("agent");
    }
//    _print_r((string)$quer1y);
    $result = $quer1y->execute()->fetchAll();
//    _print_r($result);
    if($caches['export']==1){
//        drupal_add_http_header('Content-Type', 'application/vnd.ms-excel; charset=utf-8');
//        drupal_add_http_header('Content-Disposition', 'attachment; filename=Bookinggolfs.xls');
    }
    ?>

    <?php
    $quer1y->addExpression("SUM(CASE When tbl_tran_kind.type=1 THEN abs(partner_price) Else -abs(partner_price) END)","total_amount");
    $result2 = $quer1y->execute()->fetchObject();
    $total_items = count($result);
//    if($user->uid==1){
    $limit = 150;
//    }
    $offset = $limit * ($page-1);
    if(!empty($result)){
        $result = array_slice($result, $offset, $limit);
    }else{
        $result=null;
    }
    $page_count = ceil($total_items/$limit);
}catch (Exception $e){
    print_r($e);
}
$total_amount = 0;
?>
<table class="table table-responsive report-items table-striped">
    <thead>
    <tr>
        <th class="visible-xs"></th>
        <?php if(user_has_role(3)): ?>
            <th class="hidden-xs">Mã GD</th>
        <?php endif; ?>
        <!--        <th class="hidden-xs" >STT</th>-->
        <th class="hidden-xs" >Ngày tạo</th>
        <th class="" >Ngày thực hiện</th>
        <th>Loại GD</th>
        <th>Mã GD</th>
        <th>Thanh toán</th>
        <th class="hidden-xs">Đại lý</th>
        <th class="hidden-xs">Người xuất</th>
        <th class="hidden-xs">Nội dung</th>
        <?php if(user_has_role(3)||user_has_role(8)||user_has_role(7)||user_has_role(10)): ?>
            <th class="hidden-xs">Số dư</th>
            <th class="hidden-xs"></th>
        <?php endif; ?>
    </tr>
    </thead>
    <tbody>
    <?php if(!empty($result)): $stt=1;?>
        <?php foreach($result as $value): ?>
            <?php
//            $_SESSION['users'][$value->agent] = $value->agent;
            ?>
            <tr></tr>
            <tr data-key="<?php print($value->tran_code);?>" class="desktop-detail-row tr-issue-tran-kind-<?php print($value->tran_kind); ?>">
                <td class="visible-xs"><span class="fa fa-plus"></span></td>
                <?php if(user_has_role(3)): ?>
                    <td  class="hidden-xs"><?php print($value->tran_code); ?></td>
                <?php endif; ?>
                <!--                <td  class="hidden-xs">--><?php //print($stt); ?><!--</td>-->
                <td  class="hidden-xs"><?php print(date("d/m/Y H:i",$value->created)); if($user->uid==1) echo "-".$value->created; ?></td>
                <td  class=""><?php print(date("d/m/Y H:i",$value->date)); ?></td>
                <td class="">
                    <?php
                    $tran_kind = cassiopeia_get_tran_kind_by_id($value->tran_kind);
                    print($tran_kind['name']);
                    ?>
                </td>
                <td class="">
                    <?php print($value->PNR!=$value->created?$value->PNR:""); ?>
                </td>
                <td class="<?php print($tran_kind['type']==1?"plus":"minus"); ?> text-right">
                    <?php
//                    _print_r($value->balance);
                    ?>
                    <?php if($tran_kind['type']==1): ?>
                        <?php print(number_format(abs($value->partner_price),0,",",".")); ?>
                    <?php else: ?>
                        <?php print(number_format(-abs($value->partner_price),0,",",".")); ?>
                    <?php endif; ?>
                </td>
                <td class="hidden-xs">
                    <?php
                    $agent = user_load($value->agent);
                    if(!empty($agent)){
                        print($agent->field_account_code['und'][0]['value']);
                        if(!empty($agent->field_account_transaction_name['und'][0]['value'])){
                            print(" - ");
                            print($agent->field_account_transaction_name['und'][0]['value']);
                        }
                    }
                    //                        ?>
                </td>
                <td class="hidden-xs">
                    <?php
                    $tran_user = user_load($value->tran_user);
                    if(!empty($tran_user)){
                        print(!empty($tran_user->field_account_transaction_name['und'][0]['value'])?$tran_user->field_account_transaction_name['und'][0]['value']:$tran_user->name);
                    }
                    //                        ?>
                </td>
                <td class="hidden-xs"><?php print($value->content); ?></td>
                <?php if(user_has_role(3)||user_has_role(8)||user_has_role(7)||user_has_role(10)): ?>
                    <td class="hidden-xs"><?php print(number_format($value->balance,0,",",".")); ?></td>
                <?php endif; ?>
                <!--                --><?php //if(user_has_role(3) && $value->agent!=174): ?>
                <td class="hidden-xs"><span data-tran-code="<?php print($value->tran_code); ?>" class="btn btn-danger fa fa-trash btn-delete-report"></span></td>
                <!--                --><?php //endif; ?>
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
                                <?php
                                //                                    $tran_kind = cassiopeia_get_tran_kind_by_id($report ['tran_kind']);
                                print($tran_kind['name']);
                                ?>
                            </td>
                        </tr>
                        <tr class="odd new-booking">
                            <th>Code</th>
                            <td style="display: table-cell;">
                                <?php print($value->PNR); ?>
                            </td>
                        </tr>
                        <tr class="odd new-booking">
                            <th>Thanh toán</th>
                            <td style="display: table-cell;">
                                <?php print(number_format(abs($value->partner_price),0,",",".")); ?>
                            </td>
                        </tr>
                        <tr class="odd new-booking">
                            <th>Đại lý</th>
                            <td style="display: table-cell;">
                                <?php
                                if(!empty($agent)){
                                    print($agent->field_account_code['und'][0]['value']);
                                    if(!empty($agent->field_account_transaction_name['und'][0]['value'])){
                                        print(" - ");
                                        print($agent->field_account_transaction_name['und'][0]['value']);
                                    }
                                }
                                ?>
                            </td>
                        </tr>
                        <tr class="odd new-booking">
                            <th>Người xuất</th>
                            <td style="display: table-cell;">
                                <?php
                                if(!empty($tran_user)){
                                    print(!empty($tran_user->field_account_transaction_name['und'][0]['value'])?$tran_user->field_account_transaction_name['und'][0]['value']:$tran_user->name);
                                }
                                ?>
                            </td>
                        </tr>
                        <tr class="odd new-booking">
                            <th>Nội dung</th>
                            <td style="display: table-cell;">
                                <?php print($value->content); ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <?php $stt++; ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <tr class="total-row">
        <td colspan="3"><b>Tổng</b></td>
        <td>Có <span class="color-red"><?php print(number_format($total_items,0,",",".")); ?></span> giao dịch</td>
        <td></td>
        <td class="text-right plus hidden-xs"><?php print(number_format($result2->total_amount,0,",",".")); ?></td>
    </tr>
    </tbody>
</table>
<div class="ajax-pagination">
    <div class="ajax-pagination-container">
        <ul>
            <?php if($page_count<=3): ?>
                <?php for($i=1;$i<=$page_count;$i++): ?>
                    <li><span class="ajax-item <?php if($page==$i) print("active"); ?>" data-page="<?php print($i); ?>"><?php print($i); ?></span></li>
                <?php endfor; ?>
            <?php else: ?>
                <?php if($page<=2): ?>
                    <?php for($i=1;$i<=3;$i++): ?>
                        <li><span class="ajax-item <?php if($page==$i) print("active"); ?>" data-page="<?php print($i); ?>"><?php print($i); ?></span></li>
                    <?php endfor; ?>
                    <li><span class="">...</span></li>
                    <li><span class="ajax-item fa fa-angle-right" data-page="<?php print($page+1); ?>"></span></li>
                    <li><span class="ajax-item fa fa-angle-double-right" data-page="<?php print($page_count); ?>"></span></li>
                <?php else: ?>
                    <?php if($page>=$page_count-1): ?>
                        <li><span class="ajax-item fa fa-angle-double-left" data-page="<?php print(1); ?>"></span></li>
                        <li><span class="ajax-item fa fa-angle-left" data-page="<?php print($page-1); ?>"></span></li>
                        <li><span class="">...</span></li>
                        <?php for($i=$page_count-2;$i<=$page_count;$i++): ?>
                            <li><span class="ajax-item <?php if($page==$i) print("active"); ?>" data-page="<?php print($i); ?>"><?php print($i); ?></span></li>
                        <?php endfor; ?>
                    <?php else: ?>
                        <li><span class="ajax-item fa fa-angle-double-left" data-page="<?php print(1); ?>"></span></li>
                        <li><span class="ajax-item fa fa-angle-left" data-page="<?php print($page-1); ?>"></span></li>
                        <li><span class="">...</span></li>
                        <?php for($i=$page-1;$i<=$page+1;$i++): ?>
                            <li><span class="ajax-item <?php if($page==$i) print("active"); ?>" data-page="<?php print($i); ?>"><?php print($i); ?></span></li>
                        <?php endfor; ?>
                        <li><span class="">...</span></li>
                        <li><span class="ajax-item fa fa-angle-right" data-page="<?php print($page+1); ?>"></span></li>
                        <li><span class="ajax-item fa fa-angle-double-right" data-page="<?php print($page_count); ?>"></span></li>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
        </ul>
    </div>
</div>