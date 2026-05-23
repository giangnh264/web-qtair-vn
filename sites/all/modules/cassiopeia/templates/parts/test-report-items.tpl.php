<?php
global $user;
$caches = null;
$datas = !empty($variables['data'])?$variables['data']:null;
$page = isset($datas->page)?$datas->page:1;
$limit = 50;
if(!empty($datas)){
    $caches['tran_kind'] = $datas->tran_kind;
    $caches['PNR'] = $datas->PNR;
    $caches['agent'] = $datas->agent;
    $caches['tran_user'] = $datas->tran_user;
    $caches['content'] = $datas->content;
    $caches['date_filter'] = $datas->date_filter;
    $caches['from_date'] = $datas->from_date;
    $caches['to_date'] = $datas->to_date;
}
try{
    $issue_query = db_select("tbl_issue_report","tbl_issue_report");
    $issue_query->fields("tbl_issue_report",array("created","airline","tran_kind","PNR","quantity","partner_price","agent","tran_user","content","balance","date"));
//    $query->condition("tbl_issue_report.agent",$user->uid);
    $payment_query = db_select("tbl_payment_report","tbl_payment_report");
//    $payment_query->condition("tbl_payment_report.agent",$user->uid);
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
    $query = Database::getConnection()
        ->select($issue_query->union($payment_query))
        ->fields(NULL, array("created","airline","tran_kind","PNR","quantity","partner_price","agent","tran_user","content","balance","date"))
        ->orderBy("date","DESC");

//    _print_r($result);
//    die;
//    $query->union($payment_query,"UNION ALL");
//    $query = db_select("tbl_report","tbl_report");
//    $query->fields("tbl_report");
//    $query->join($sub_query,"tbl_sub","tbl_sub.tran_code=tbl_report.tran_code");
//    $query->fields("tbl_sub");
//    $query->orderBy("created","DESC");
//    _print_r($caches);
    if(!empty($caches['date_filter']&& $caches['date_filter']!="all")){
        switch ($caches['date_filter']){
            case "today" :
                $query->condition("date",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME)),strtotime(date("d-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
//                $result = $query->execute()->fetchAll();
//                _print_r($result);
//                $payment_query->condition("tbl_payment_report.created",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME)),strtotime(date("d-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
                break;
            case "yesterday" :
                $query->condition("date",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME-86400)),strtotime(date("d-m-Y 23:59",REQUEST_TIME-86400))),"BETWEEN");
//                $payment_query->condition("tbl_payment_report.created",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME-86400)),strtotime(date("d-m-Y 23:59",REQUEST_TIME-86400))),"BETWEEN");
                break;
            case "thismonth" :
                $query->condition("date",array(strtotime(date("01-m-Y 00:00",REQUEST_TIME)),strtotime(date("t-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
//                $payment_query->condition("tbl_payment_report.created",array(strtotime(date("01-m-Y 00:00",REQUEST_TIME)),strtotime(date("t-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
                break;
            case "other":
                if(!empty($caches['from_date'])){
                    $query->condition("date",strtotime($caches['from_date']),">");
//                    $payment_query->condition("tbl_payment_report.created",strtotime($caches['from_date']),">");
                }
                if($caches['to_date']){
                    $query->condition("date",strtotime($caches['to_date']),"<");
//                   $payment_query->condition("tbl_payment_report.created",strtotime($caches['to_date']),"<");
                }
                break;
        }
    }elseif($caches['date_filter']=="other"){
        if(!empty($caches['payment_report_from_date']&& $caches['payment_report_from_date']!="")){
            $query->condition("created",strtotime(date("d-m-Y 00:00",strtotime($caches['payment_report_from_date']))),">=");
        }
        if(!empty($caches['payment_report_to_date']&& $caches['payment_report_to_date']!="")){
            $query->condition("created",strtotime(date("d-m-Y 23:59",strtotime($caches['payment_report_to_date']))),"<=");
        }
    }
//    _print_r($caches);
    if(!empty($caches['tran_kind']&& $caches['tran_kind']!="all")){
        $query->condition("tran_kind",$caches['tran_kind']);
    }
    if(!empty($caches['PNR']&& $caches['PNR']!="all")){
        $query->condition("PNR",$caches['PNR']);

    }
    if(!empty($caches['content']&& $caches['content']!="")){
        $query->condition("content","%".$caches['content']."%","LIKE");
    }
    if(!empty($caches['tran_user']) && $caches['tran_user']!="all"){
        $query->condition("tran_user",$caches['tran_user']);

    }
    if(cassiopeia_payment_report_accept()){
        if(!empty($caches['agent']&& $caches['agent']!="all")){
            $query->condition("agent",$caches['agent']);
        }
    }else{
        $query->condition("agent",$user->uid);
    }
//    $query->range(0,50);
    $result = $query->execute()->fetchAll();
    $total_items = count($result);
    $limit = 50;
//    $page = pager_default_initialize(count($result), $limit, 0);
    $offset = $limit * ($page-1);
    if(!empty($result)){
        $result = array_slice($result, $offset, $limit);
    }else{
        $result=null;
    }

    $page_count = ceil($total_items/$limit);
//    $start = ($page-1)*$limit;
//    $query->range($start,$limit);
//    print(count($result));
//    _print_r($result);

}catch (Exception $e){
    print_r($e);
}
?>
<table class="table table-responsive report-items">
    <thead>
    <tr>
        <th class="hidden-xs" >STT</th>
        <th class="hidden-xs" >Ngày thực hiện</th>
        <!--            <th class="hidden-xs" >Ngày nộp tiền</th>-->
        <th>Loại GD</th>
        <th>Mã GD</th>
        <th>Thanh toán</th>
        <th>Đại lý</th>
        <th class="hidden-xs">Người xuất</th>
        <th class="hidden-xs">Nội dung</th>
        <?php if(user_has_role(3)): ?>
            <td>Số dư</td>
        <?php endif; ?>
    </tr>
    </thead>
    <tbody>
    <?php if(!empty($result)): $stt=1;?>
        <?php foreach($result as $value): ?>
            <tr>
                <td  class="hidden-xs"><?php print($stt); ?></td>
                <td  class="hidden-xs"><?php print(date("d/m/Y H:i",$value->date)); ?></td>
                <td class="hidden-xs">
                    <?php
                    $tran_kind = cassiopeia_get_tran_kind_by_id($value->tran_kind);
                    print($tran_kind['name']);
                    ?>
                </td>
                <td class="hidden-xs">
                    <?php print($value->PNR!=$value->created?$value->PNR:""); ?>
                </td>
                <td class="<?php print($tran_kind['type']==1?"plus":"minus"); ?> text-right hidden-xs">
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
                <?php if(user_has_role(3)): ?>
                    <td><?php print(number_format($value->balance,0,",",".")); ?></td>
                <?php endif; ?>
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
                                <?php
                                //                                    $tran_kind = cassiopeia_get_tran_kind_by_id($report ['tran_kind']);
                                print($tran_kind['name']);
                                ?>
                            </td>
                        </tr>
                        <tr class="odd new-booking">
                            <th>Mã GD</th>
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