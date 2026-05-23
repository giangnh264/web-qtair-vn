<?php
//db_delete("tbl_report")->condition("id",6)->execute();
//db_delete("tbl_payment_report")->condition("id",3)->execute();
$query = db_select("tbl_bank","tbl_bank");
$query -> fields("tbl_bank");
$banks = $query -> execute() -> fetchAll();
try{

    $query = db_select("tbl_payment_report","tbl_payment_report");
    $query -> fields("tbl_payment_report");
    $query ->addExpression('SUM(tbl_payment_report.amount)', 'tong_thu');
    $query -> join("tbl_khoan_muc","tbl_khoan_muc","tbl_khoan_muc.id = tbl_payment_report.khoan_muc");
    $query -> condition("tbl_khoan_muc.kind",1);
    $query -> groupBy("tbl_khoan_muc.kind");
    $tong_thu = $query->execute()->fetchAssoc();

    $query = db_select("tbl_payment_report","tbl_payment_report");
    $query -> fields("tbl_payment_report");
    $query ->addExpression('SUM(tbl_payment_report.amount)', 'tong_chi');
    $query -> join("tbl_khoan_muc","tbl_khoan_muc","tbl_khoan_muc.id = tbl_payment_report.khoan_muc");
    $query -> condition("tbl_khoan_muc.kind",2);
    $query -> groupBy("tbl_khoan_muc.kind");
    $tong_chi = $query->execute()->fetchAssoc();

    $query = db_select("tbl_report","tbl_report");
    $query -> fields("tbl_report");
    $query -> orderBy("created","DESC");
//    $query->leftJoin("tbl_payment_report","tbl_payment_report","tbl_payment_report.tran_code = tbl_report.tran_code");
//    $query->addField("tbl_payment_report","tran_code","tran_code");
//    $query->leftJoin("tbl_refund_report","tbl_refund_report","tbl_refund_report.tran_code = tbl_report.tran_code");
//    $query->addField("tbl_refund_report","tran_code","tran_code");
    $result = $query->execute()->fetchAll();
    _print_r($result);
}catch (Exception $e){
    print_r($e);
}

?>
<div class="page-payment-report">
    <div class="block-container">
        <div class="buttons">
            <button class="btn btn-primary btn-add-payment-report">Thêm mới</button>
            <button class="btn btn-warning btn-add-refund-report">Hoàn tiền</button>
        </div>
        <div class="items">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Ngày thực hiện</th>
                        <th>Loại GD</th>
                        <th>Mã GD</th>
                        <th>Số tiền</th>
                        <th>Người GD</th>
                        <th>Nội dung</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($result)): ?>
                        <?php foreach($result as $value): ?>
                            <?php
                                switch($value->type){
                                    case "refund" :
                                        $report = cassiopeia_get_refund_detail_by_code($value->tran_code);
                                        break;
                                    case "payment" :
                                        $report = cassiopeia_get_payment_report_detail_by_code($value->tran_code);
                                        break;
                                }
                            $tran_kind = cassiopeia_get_tran_kind_by_id($report['tran_kind']);
                            $amount = $report['amount'];
                            $tran_user = user_load($report['tran_user']);
                            ?>
                            <tr>
                                <td><?php print(date("d/m/Y H:i",$value->created)); ?></td>
                                <td><?php print($tran_kind['name']); ?></td>
                                <td><?php print($value->tran_code); ?></td>
                                <td><?php print(number_format($amount,0,",",".")); ?></td>
                                <td><?php print($tran_user->name); ?></td>
                                <td></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="modal_payment_report" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm mới thanh toán</h4>
            </div>
            <div class="modal-body">
                <?php
                $cassiopeia_add_payment_report_form = drupal_get_form("cassiopeia_add_payment_report_form");
                if(!empty($cassiopeia_add_payment_report_form)){
                    $cassiopeia_add_payment_report_form = drupal_render($cassiopeia_add_payment_report_form);
                    print($cassiopeia_add_payment_report_form);
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div id="modal_payment_report_update_status" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Xác nhận sử dụng khoản này</h4>
            </div>
            <div class="modal-body">
                <!--                <div class="confirm"></div>-->
                <?php
                $cassiopeia_update_payment_report_form = drupal_get_form("cassiopeia_update_payment_report_form");
                if(!empty($cassiopeia_update_payment_report_form)){
                    $cassiopeia_update_payment_report_form = drupal_render($cassiopeia_update_payment_report_form);
                    print($cassiopeia_update_payment_report_form);
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div id="modal_refund_report" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm mới hoàn tiền</h4>
            </div>
            <div class="modal-body">
                <?php
                $cassiopeia_add_payment_report_form = drupal_get_form("cassiopeia_add_refund_report_form");
                if(!empty($cassiopeia_add_payment_report_form)){
                    $cassiopeia_add_payment_report_form = drupal_render($cassiopeia_add_payment_report_form);
                    print($cassiopeia_add_payment_report_form);
                }
                ?>
            </div>
        </div>
    </div>
</div>