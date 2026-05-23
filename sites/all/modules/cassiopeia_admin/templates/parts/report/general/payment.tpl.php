<?php
$cache = !empty($_REQUEST['data'])?$_REQUEST['data']:array();
$date_filter = !empty($cache['date_filter'])?$cache['date_filter']:date("m-Y",REQUEST_TIME);
$cache['date_filter'] = $date_filter;
$cache['redirect'] = "admin/manager/report/general/payment";
try {
    $query = db_select("tbl_tran_kind","tbl_tran_kind");
    $query->fields("tbl_tran_kind");
    $tran_kinds = $query->execute()->fetchAll();
}catch (Exception $e){

}
$index=1;
$total = 0;
?>
<div class="filter">
    <?php
    $cassiopeia_detail_report_tab_1_filter_form = drupal_get_form("cassiopeia_general_report_filter_form",$cache);
    if(!empty($cassiopeia_detail_report_tab_1_filter_form)){
        $cassiopeia_detail_report_tab_1_filter_form = drupal_render($cassiopeia_detail_report_tab_1_filter_form);
        print($cassiopeia_detail_report_tab_1_filter_form);
    }
    ?>
</div>
<div class="table-responsive">
    <table class="table hover stripped" >
        <thead>
        <tr>
            <th>STT</th>
            <th>Loại</th>
            <th width="20%" class="text-right">Số tiền</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($tran_kinds as $tran_kind): ?>
            <?php
            $result = null;
            if($tran_kind->kind=="issue"){
//                    _print_r($tran_kind);
                $query = db_select("tbl_issue_report","tbl_issue_report");
                $query->fields("tbl_issue_report");
                $query->condition("tbl_issue_report.tran_kind",$tran_kind->id);
                $query->join("users","tbl_users","tbl_users.uid=tbl_issue_report.agent");
                $query->join("field_data_field_account_sale","tbl_sale","tbl_sale.entity_id=tbl_issue_report.agent");
                $query->addExpression("SUM(tbl_issue_report.partner_price)","total_amount");
                $query->groupBy("tbl_issue_report.tran_kind");
                if(!empty($date_filter && $date_filter!="all")){
                    $first_day_of_moth = strtotime(date('Y-m-01 00:00:00',strtotime("01-".$date_filter)));
                    $last_day_of_moth = strtotime(date("Y-m-t 23:59:59",strtotime("01-".$date_filter)));
                    $query->condition("tbl_issue_report.date",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
                }
                $result = $query->execute()->fetchObject();
            }elseif($tran_kind->kind=="payment"){
                $query = db_select("tbl_payment_report","tbl_payment_report");
                $query->fields("tbl_payment_report");
                $query->condition("tbl_payment_report.tran_kind",$tran_kind->id);
                $query->addExpression("SUM(tbl_payment_report.amount)","total_amount");
                $query->groupBy("tbl_payment_report.tran_kind");
                if(!empty($date_filter && $date_filter!="all")){
                    $first_day_of_moth = strtotime(date('Y-m-01 00:00:00',strtotime("01-".$date_filter)));
                    $last_day_of_moth = strtotime(date("Y-m-t 23:59:59",strtotime("01-".$date_filter)));
                    $query->condition("tbl_payment_report.date",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
                }
                $result = $query->execute()->fetchObject();
            }

            ?>
            <tr>
                <td><?php print($index); ?></td>
                <td><?php print($tran_kind->name); ?></td>
                <?php if($tran_kind->type==1): ?>
                    <?php if(!empty($result)) $total+=$result->total_amount; ?>
                    <td class="<?php print($tran_kind->type==1?"plus":"minus"); ?> text-right hidden-xs"><?php if(!empty($result)) print(number_format(abs($result->total_amount    ),0,",",",")); ?></td>
                <?php else: ?>
                    <?php if(!empty($result)) $total-=$result->total_amount; ?>
                    <td class="<?php print($tran_kind->type==1?"plus":"minus"); ?> text-right hidden-xs"><?php if(!empty($result)) print("- ".number_format(abs($result->total_amount    ),0,",",",")); ?></td>
                <?php endif; ?>
            </tr>
            <?php $index++; ?>
        <?php endforeach; ?>
        <tr>
            <td colspan="2">Tổng</td>
            <td class="text-right" style="font-weight: bold;"><?php print(number_format($total,0,",",",")); ?></td>
        </tr>
        </tbody>
    </table>
</div>
