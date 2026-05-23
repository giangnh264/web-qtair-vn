<?php
$caches = null;
if(!empty($_REQUEST['data'])){
    $caches = $_REQUEST['data'];
}
try{
    $sub_query = db_select("tbl_report","tbl_report");
    $sub_query->fields("tbl_report");
    $sub_query->orderBy("created","DESC");
    $sub_query->leftJoin("tbl_issue_report","tbl_issue_report","tbl_issue_report.tran_code=tbl_report.tran_code");
    $sub_query->addField("tbl_issue_report","tran_kind","tbl_issue_report_tran_kind");
    $sub_query->addField("tbl_issue_report","tran_user","tbl_issue_report_tran_user");
    $sub_query->addField("tbl_issue_report","agent","tbl_issue_report_agent");
    $sub_query->addField("tbl_issue_report","PNR","tbl_issue_report_PNR");
    $sub_query->leftJoin("tbl_payment_report","tbl_payment_report","tbl_payment_report.tran_code=tbl_report.tran_code");
    $sub_query->addField("tbl_payment_report","tran_kind","tbl_payment_report_tran_kind");
    $sub_query->addField("tbl_payment_report","amount","tbl_payment_report_amount");
    $sub_query->addField("tbl_payment_report","tran_user","tbl_payment_report_tran_user");
    $sub_query->addField("tbl_payment_report","agent","tbl_payment_report_agent");

    $query = db_select("tbl_report","tbl_report");
    $query->fields("tbl_report");
    $query->join($sub_query,"tbl_sub","tbl_sub.tran_code=tbl_report.tran_code");
    $query->fields("tbl_sub");
    if(!empty($caches['tran_kind']&& $caches['tran_kind']!="all")){
        $or = db_or();
        $or->condition("tbl_sub.tbl_issue_report_tran_kind",$caches['tran_kind']);
        $or->condition("tbl_sub.tbl_payment_report_tran_kind",$caches['tran_kind']);
        $query->condition($or);
    }
    if(!empty($caches['PNR']&& $caches['PNR']!="all")){
        $or = db_or();
        $or->condition("tbl_sub.tbl_issue_report_PNR",$caches['PNR']);
        $or->condition("tbl_report.tran_code",$caches['PNR']);
        $query->condition($or);
    }
    if(!empty($caches['agent']&& $caches['agent']!="all")){
        $or = db_or();
        $or->condition("tbl_sub.tbl_issue_report_agent",$caches['agent']);
        $or->condition("tbl_sub.tbl_payment_report_agent",$caches['agent']);
        $query->condition($or);
    }
    $result = $query->execute()->fetchAll();
}catch (Exception $e){
    print($e);
}

_print_r($result);
//die;
?>
<div class="block-filter">
    <?php
        $cassiopeia_filter_transaction_report_form  = drupal_get_form("cassiopeia_filter_transaction_report_form",$caches);
        if(!empty($cassiopeia_filter_transaction_report_form)){
            $cassiopeia_filter_transaction_report_form  = drupal_render($cassiopeia_filter_transaction_report_form);
            print($cassiopeia_filter_transaction_report_form);
        }
    ?>
</div>
<table class="table table-responsive">
    <thead>
        <tr>
            <th>Ngày thực hiện</th>
            <th>Loại GD</th>
            <th>PNR</th>
            <th>Giá CTV</th>
<!--            <th>Số dư toài khoản</th>-->
            <th>Người thực hiện</th>
            <th>Mã CTV</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($result)): ?>
            <?php foreach($result as $value): ?>
                <?php
                    $tran_code = $value->tran_code;
                    switch($value->type){
                        case "refund" :
                            $report = cassiopeia_get_refund_detail_by_code($value->tran_code);
                            break;
                        case "payment" :
                            $report = cassiopeia_get_payment_report_detail_by_code($value->tran_code);
                            break;
                        case "issue" :
                            $report = cassiopeia_get_issue_report_detail_by_code($value->tran_code);
                            $partner_price = $report['partner_price'];
                            $tran_code = $report['PNR'];
                            break;
                    }
//                    _print_r($report);
                ?>
                <tr>
                    <td><?php print(date("d/m/Y",$value->created)); ?></td>
                    <td>
                        <?php
                            $tran_kind = cassiopeia_get_tran_kind_by_id($report['tran_kind']);
                            print($tran_kind['name']);
                        ?>
                    </td>
                    <td>
                        <?php print($tran_code); ?>
                    </td>
                    <td>
                        <?php print(number_format($partner_price,0,",",".")); ?>
                    </td>
                    <td>
                        <?php
                        $tran_user = user_load($report['tran_user']);
                        if(!empty($tran_user)){
                            print($tran_user->name);
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $agent = user_load($report['agent']);
                        if(!empty($agent)){
                            print($agent->field_account_code['und'][0]['value']);
                        }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>