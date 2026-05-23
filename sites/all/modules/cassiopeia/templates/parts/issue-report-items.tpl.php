<?php
global $user;
//print(ISADMIN);
$caches = null;
$datas = !empty($variables['data'])?$variables['data']:null;
$page = isset($datas->page)?$datas->page:1;
$limit = 50;
if(!empty($datas)){
    $caches['content'] = $datas->content;
    $caches['date_filter'] = $datas->date_filter;
    $caches['from_date'] = $datas->from_date;
    $caches['to_date'] = $datas->to_date;
    $caches['airline'] = $datas->airline;
    $caches['tran_kind'] = $datas->tran_kind;
    $caches['profit_filter'] = $datas->profit_filter;
    $caches['PNR'] = $datas->PNR;
    $caches['content'] = $datas->content;
    $caches['agent'] = !empty($datas->agent)?$datas->agent:null;
    $caches['tran_user'] = $datas->tran_user;
}
try{
    $query = db_select("tbl_issue_report","tbl_issue_report");
    $query -> fields("tbl_issue_report");
    $query->join("tbl_tran_kind","tbl_tran_kind","tbl_tran_kind.id=tbl_issue_report.tran_kind");
    $query2 = db_select("tbl_issue_report","tbl_issue_report");
    $query2 -> fields("tbl_issue_report");
    $query2->join("tbl_tran_kind","tbl_tran_kind","tbl_tran_kind.id=tbl_issue_report.tran_kind");
    $query2 -> addExpression("SUM(partner_price)","total_partner_price");
    $query2 -> addExpression("SUM(quantity)","total_quantity");
    $query2 -> addExpression("SUM(price)","total_price");
    $query2 -> addExpression("SUM(partner_price-price)","total_revenue");
    $query2 -> addExpression("COUNT(partner_price)","total_items");
    if(!empty($caches)){
//        _print_r($datas);
        if(!empty($datas->date_filter&& $datas->date_filter!="all")){
            switch ($datas->date_filter){
                case "today" :
                    $query2->condition("date",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME)),strtotime(date("d-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
                    $query->condition("date",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME)),strtotime(date("d-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
                    break;
                case "yesterday" :
                    $query2->condition("date",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME-86400)),strtotime(date("d-m-Y 23:59",REQUEST_TIME-86400))),"BETWEEN");
                    $query->condition("date",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME-86400)),strtotime(date("d-m-Y 23:59",REQUEST_TIME-86400))),"BETWEEN");
                    break;
                case "thismonth" :
                    $query2->condition("date",array(strtotime(date("01-m-Y 00:00",REQUEST_TIME)),strtotime(date("t-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
                    $query->condition("date",array(strtotime(date("01-m-Y 00:00",REQUEST_TIME)),strtotime(date("t-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
                    break;
                case "other":
                    if(!empty($datas->from_date)){
                        $query2->condition("date",strtotime(date("d-m-Y 00:00",strtotime($datas->from_date))),">=");
                        $query->condition("date",strtotime(date("d-m-Y 00:00",strtotime($datas->from_date))),">=");
                    }
                    if($datas->to_date){
                        $query2->condition("date",strtotime(date("d-m-Y 23:59",strtotime($datas->to_date))),"<=");
                        $query->condition("date",strtotime(date("d-m-Y 23:59",strtotime($datas->to_date))),"<=");
                    }
                    break;
            }
        }
        if(!empty($caches['airline'] && $caches['airline']!="all")){
            $query->condition("airline",$caches['airline']);
            $query2->condition("airline",$caches['airline']);
        }
        if(!empty($caches['tran_kind']&& $caches['tran_kind']!="all")){
            $query->condition("tran_kind",$caches['tran_kind']);
            $query2->condition("tran_kind",$caches['tran_kind']);
        }
        if(!empty($caches['profit_filter']&& $caches['profit_filter']!="all")){
            switch ($datas->profit_filter){
                case "morethanZero":
                    $query->condition("revenue",0,">");
                    $query2->condition("revenue",0,">");
                    break;
                case "lessthanZero":
                    $query->condition("revenue",0,"<");
                    $query2->condition("revenue",0,"<");
                    break;
                case "equalZero":
                    $query->condition("revenue",0,"=");
                    $query2->condition("revenue",0,"=");
                    break;
            }
        }
        if(!empty($caches['PNR'])){
            $query->condition("PNR",$caches['PNR']);
            $query2->condition("PNR",$caches['PNR']);
        }
        if(!empty($caches['content']&& $caches['content']!="all")){
            $query->condition("content","%".$caches['content']."%","LIKE");
            $query2->condition("content","%".$caches['content']."%","LIKE");
        }
        if(!empty($caches['agent']) && $caches['agent']!="all"){
            $query->condition("agent",$caches['agent']);
            $query2->condition("agent",$caches['agent']);
        }
        if(!empty($caches['tran_user']) && $caches['tran_user']!="all"){
            $query->condition("tran_user",$caches['tran_user']);
            $query2->condition("tran_user",$caches['tran_user']);
        }
    }
    if(!cassiopeia_issue_report_accept()){
//        print_r(123);
        $query2->condition("agent",$user->uid);
        $query->condition("agent",$user->uid);
    }
//    print_r(123);
    $query->orderBy("created","DESC");
//    $query->groupBy("agent");
    $result = $query -> execute() -> fetchAll();
    $result2 = $query2->execute()->fetchObject();
    $total_items = count($result);
    $page_count = ceil($total_items/$limit);
    $start = ($page-1)*$limit;
    $query->range($start,$limit);
    $_new_result = $query->execute()->fetchAll();
//    _print_r($_new_result);
}catch (Exception $e){
    _print_r($e);
}

?>
<table class="table table-responsive report-items table-hover c-table">
    <thead>
    <tr>
        <th class="visible-xs"></th>
        <th data-sort="created" class="">Ngày thực hiện</th>
        <th data-sort="airline" class="hidden-xs">Hãng</th>
        <th data-sort="tran_kind" class="">Loại GD</th>
        <th data-sort="code">Code</th>
        <th data-sort="quantity" class="hidden-xs">SL</th>
        <th data-sort="partner_price" class="">Doanh thu</th>
        <?php if(cassiopeia_issue_report_accept()): ?>
            <th data-sort="price" class="hidden-xs">Giá vốn</th>
            <th data-sort="revenue" class="hidden-xs">Lợi nhuận</th>
        <?php endif; ?>

        <th data-sort="agent" class="hidden-xs">Đại lý</th>
        <?php if(cassiopeia_issue_report_accept()): ?>
            <th>Sale</th>
            <th data-sort="tran_user" class="hidden-xs">Người xuất</th>
        <?php endif; ?>
        <th>Khách bay</th>
        <th data-sort="content" class="hidden-xs">Nội dung</th>
        <!--        <th></th>-->
        <?php if(user_has_role(3)): ?>
            <!--            <th data-sort="balance" class="hidden-xs">Số dư</th>-->
        <?php endif; ?>

    </tr>
    </thead>
    <?php if(!empty($_new_result)): ?>
        <?php foreach($_new_result as $value): ?>
            <?php $booking = cassiopeia_qt_ticket_booking_load_by_PNR($value->PNR,$value->airline); ?>
            <tr></tr>
            <tr data-key="<?php print($value->id);?>" class="desktop-detail-row tr-issue-tran-kind-<?php print($value->tran_kind); ?>">
                <!--                <td>--><?php //print($value->tran_code); ?><!--</td>-->
                <td class="visible-xs"><span class="fa fa-plus"></span></td>
                <td class=""><?php print(date("d/m/Y H:i",$value->date));  ?></td>
                <!--                <td class="">--><?php //print(date("d/m/Y H:i",$value->created)); ?><!--</td>-->
                <td class="hidden-xs">
                    <?php
                    $airline = cassiopeia_get_airline($value->airline);
                    if(!empty($airline)){
                        print($airline->iata);
                    }
                    ?>
                </td>
                <td class="">
                    <?php
                    $tran_kind = cassiopeia_get_tran_kind_by_id($value->tran_kind);
                    if(!empty($tran_kind)){
                        print($tran_kind['name']);
                    }
                    ?>
                </td>
                <td class="PNR"><?php print($value->PNR); ?></td>
                <td class="hidden-xs" >
                    <?php print($value->quantity); ?>
                </td>

                <td class=" text-right" >
                    <?php print(number_format($value->partner_price,0,",",".")); ?>
                </td>
                <?php if(cassiopeia_issue_report_accept()): ?>
                    <td class="hidden-xs text-right" >
                        <?php print(number_format($value->price,0,",",".")); ?>
                    </td>
                    <td class="hidden-xs text-right revenue" >
                        <?php print(number_format($value->revenue,0,",",".")); ?>
                    </td>
                <?php endif; ?>

                <td class="hidden-xs">
                    <?php
                    $agent = user_load($value->agent);
                    ?>
                    <?php if(!empty($agent)): ?>
                        <?php  print($agent->field_account_code['und'][0]['value']); ?>
                        <span class="hidden-xs">
                        <?php
                        if(!empty($agent->field_account_transaction_name['und'][0]['value'])){
                            print(" - ");
                            print($agent->field_account_transaction_name['und'][0]['value']);
                        }
                        ?>
                        </span>
                    <?php endif; ?>
                </td>
                <?php if(cassiopeia_issue_report_accept()): ?>
                    <td class="hidden-xs">
                        <?php if(!empty($agent)): ?>
                            <?php
                            $sale = !empty($agent->field_account_sale['und'][0]['target_id'])?user_load($agent->field_account_sale['und'][0]['target_id']):null;
                            ?>
                            <?php if(!empty($sale)): ?>
                                <!--                            --><?php // print($sale->field_account_code['und'][0]['value']); ?>
                                <!--                            <span class="hidden-xs">-->
                                <!--                        --><?php
                                if(!empty($sale->field_account_transaction_name['und'][0]['value'])){
//                            print(" - ");
                                    print($sale->field_account_transaction_name['und'][0]['value']);
                                }
                                ?>
                                </span>
                            <?php endif; ?>
                        <?php endif; ?>
                    </td>
                    <td class="hidden-xs">
                        <?php
                        $tran_user = user_load($value->tran_user);
//                        _print_r($tran_user);
                        if(!empty($tran_user)){
                            print(!empty($tran_user->field_account_transaction_name['und'][0]['value'])?$tran_user->field_account_transaction_name['und'][0]['value']:$tran_user->name);
                        }
                        ?>
                    </td>
                <?php endif; ?>
                <td>
                    <?php if(!empty($booking)): ?>
                        <div><?php echo $booking->passengers[0]->FirstName." ".$booking->passengers[0]->LastName; ?></div>
                    <?php endif; ?>
                </td>
                <td class="hidden-xs">
                    <?php print($value->content); ?>
                </td>
                <!--                --><?php //if(user_has_role(3)): ?>
                <!--                    <td class="hidden-xs">--><?php //print($value->balance); ?><!--</td>-->
                <!--                --><?php //endif; ?>
            </tr>

            <tr data-key="<?php print($value->id);?>"  class="mobile-detail-row visible-xs">
                <td colspan="5">
                    <table class="footable-details table table-bordered datatable booking-table">
                        <tbody>
                        <tr class="odd new-booking">
                            <th>
                                <span>Ngày thực hiện</span>
                            </th>
                            <td style="display: table-cell;" colspan="">
                                <?php print(date("d/m/Y H:i",$value->created)); ?>
                            </td>
                        </tr>
                        <tr class="odd new-booking">
                            <th>
                                <span>Hãng</span>
                            </th>
                            <td style="display: table-cell;">
                                <?php
                                $airline = cassiopeia_get_airline($value->airline);
                                if(!empty($airline)){
                                    print($airline->iata);
                                }
                                ?>
                            </td>
                        </tr>
                        <tr class="odd new-booking">
                            <th>
                                <span>Loại GD</span>
                            </th>
                            <td style="display: table-cell;">
                                <?php
                                $tran_kind = cassiopeia_get_tran_kind_by_id($value->tran_kind);
                                if(!empty($tran_kind)){
                                    print($tran_kind['name']);
                                }

                                ?>
                            </td>
                        </tr>
                        <tr class="odd new-booking">
                            <th>PNR	</th>
                            <td style="display: table-cell;">
                                <?php print($value->PNR); ?>
                            </td>
                        </tr>
                        <tr class="odd new-booking">
                            <th><span>SL</span></th>
                            <td style="display: table-cell;">
                                <?php print($value->quantity); ?>
                            </td>
                        </tr>
                        <tr class="odd new-booking">
                            <th>
                                <span>Giá AG</span>
                            </th>
                            <td style="display: table-cell;">
                                <?php if($tran_kind['type']==1) print("-"); ?>
                                <?php print(number_format($value->partner_price,0,",",".")); ?>
                            </td>
                        </tr>
                        <tr class="odd new-booking">
                            <th>
                                <span>Đại lý</span>
                            </th>
                            <td style="display: table-cell;">
                                <?php
                                $agent = user_load($value->agent);
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
                            <th>
                                <span>Người xuất</span>
                            </th>
                            <td style="display: table-cell;">
                                <?php
                                $tran_user = user_load($value->tran_user);
                                if(!empty($tran_user)){
                                    print(!empty($tran_user->field_account_transaction_name['und'][0]['value'])?$tran_user->field_account_transaction_name['und'][0]['value']:$tran_user->name);
                                }
                                ?>
                            </td>
                        </tr>
                        <tr class="odd new-booking">
                            <th>
                                <span>Nội dung</span>
                            </th>
                            <td style="display: table-cell;">
                                <?php print($value->content); ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr class="total-row hidden-xs">
            <td colspan="2"><b>Tổng</b></td>
            <td colspan="1">Có <span class="color-red"><?php print(number_format($result2->total_items,0,",",".")); ?></span> giao dịch</td>
            <td class="text-right" colspan="2"><?php print(number_format($result2->total_quantity,0,",",".")); ?> vé</td>			<td class="text-right plus"><?php print(number_format($result2->total_partner_price,0,",",".")); ?></td>
            <td class="text-right plus">
                <?php if(cassiopeia_issue_report_accept()): ?>

                <?php print(number_format($result2->total_price,0,",",".")); ?></td>
            <?php endif; ?>
            <td colspan="5" class="text-left plus">
                <?php if(cassiopeia_issue_report_accept()): ?>
                    <?php print(number_format($result2->total_revenue,0,",",".")); ?>
                <?php endif; ?>
            </td>
        </tr>
    <?php endif; ?>
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