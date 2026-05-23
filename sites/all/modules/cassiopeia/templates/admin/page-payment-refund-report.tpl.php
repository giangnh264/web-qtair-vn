<?php
$query = db_select("tbl_report","tbl_report");
$query -> fields("tbl_report");
$result = $query -> execute() -> fetchAll();
function cassiopeia_get_khoan_muc_by_id($id){
    $query = db_select("tbl_khoan_muc","tbl_khoan_muc");
    $query -> fields("tbl_khoan_muc");
    $query -> condition("id",$id);
    $result = $query -> execute() -> fetchAssoc();
    return $result;
}
try{
    $query = db_select("tbl_report","tbl_report");
    $query -> fields("tbl_report");
    $query ->addExpression('SUM(tbl_report.money)', 'tong_thu');
    $query -> join("tbl_khoan_muc","tbl_khoan_muc","tbl_khoan_muc.id = tbl_report.khoan_muc");
    $query -> condition("tbl_khoan_muc.kind",1);
    $query -> groupBy("tbl_khoan_muc.kind");
    $tong_thu = $query->execute()->fetchAssoc();

    $query = db_select("tbl_report","tbl_report");
    $query -> fields("tbl_report");
    $query ->addExpression('SUM(tbl_report.money)', 'tong_chi');
    $query -> join("tbl_khoan_muc","tbl_khoan_muc","tbl_khoan_muc.id = tbl_report.khoan_muc");
    $query -> condition("tbl_khoan_muc.kind",2);
    $query -> groupBy("tbl_khoan_muc.kind");
    $tong_chi = $query->execute()->fetchAssoc();
//    _print_r($tong_thu);
}catch (Exception $e){
    print_r($e);
}
?>
<div class="page-payment-report">
    <div class="block-container">
        <div class="buttons">
            <button class="btn btn-primary btn-add-payment-report">Thêm mới</button>
        </div>
        <div class="items">
            <table class="table table-responsive general">
                <tbody>
                <tr>
                    <td>Tổng thu : <?php print(number_format($tong_thu['tong_thu'],0,",",".")); ?> đ</td>
                    <td>Dư đầu kì : 0 đ</td>
                </tr>
                <tr>
                    <td>Tổng chi : <?php print(number_format($tong_chi['tong_chi'],0,",",".")); ?> đ</td>
                    <td>Dư hiện tại: <?php print(number_format($tong_thu['tong_thu']-$tong_chi['tong_chi'],0,",",".")); ?> đ</td>
                </tr>
                </tbody>
            </table>
            <table class="table table-responsive report-items">
                <thead>
                <tr>
                    <th>Ngày thực hiện</th>
                    <th>Mã GD</th>
                    <th>Số tiền</th>
                    <th>Nội dung</th>
                    <th>Phân loại</th>
                    <th>Đại lí</th>
                    <th>Người GD</th>
                    <th>Tình trạng</th>
                </tr>
                </thead>
                <?php if(!empty($result)): ?>
                    <?php foreach($result as $value): ?>
                        <tr>
                            <td><?php print(date("d/m/Y H:i",$value->created)); ?></td>
                            <td><?php print($value->tran_code); ?></td>
                            <td><?php print(number_format($value->money,0,",",".")); ?></td>
                            <td><?php print($value->content); ?></td>
                            <td><?php print(cassiopeia_get_khoan_muc_by_id($value->khoan_muc)['name']); ?></td>
                            <td>
                                <?php
                                $agent = user_load($value->agent);
                                if(!empty($agent)){
                                    print(!empty($agent->field_account_transaction_name['und'][0]['value'])?$agent->field_account_transaction_name['und'][0]['value']:"");
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $tran_user = user_load($value->tran_user);
                                if(!empty($tran_user)){
                                    print(!empty($tran_user->field_account_transaction_name['und'][0]['value'])?$tran_user->field_account_transaction_name['und'][0]['value']:"");
                                }
                                ?>
                            </td>
                            <td>
                                <?php if($value->status==0): ?>
                                    <button class="btn btn-update-payment-report" data-id="<?php print($value->id); ?>">Sử dụng</button>
                                <?php else: ?>
                                    Đã GD
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
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
                <h4 class="modal-title">Thêm mới báo cáo thanh toán</h4>
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