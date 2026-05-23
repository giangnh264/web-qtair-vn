<?php
$query = db_select("tbl_tran_kind","tbl_tran_kind");
$query -> fields("tbl_tran_kind");
$result = $query -> execute() -> fetchAll();
?>
<div class="page-payment-report">
    <div class="block-container">
        <div class="buttons">
            <button class="btn btn-primary btn-add-tran-kind">Thêm mới</button>
        </div>
        <div class="items">
            <table class="table table-responsive report-items">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Kiểu</th>
                    <th>Báo cáo</th>
                    <th></th>
                </tr>
                </thead>
                <?php if(!empty($result)): ?>
                    <?php $index=1; ?>
                    <?php foreach($result as $value): ?>
                        <tr>
                            <td><?php print($index); ?></td>
                            <td><?php print($value->name); ?></td>
                            <td>
                                <?php print($value->type==1?"Cộng tiền":"Trừ tiền"); ?>
                            </td>
                            <td>
                                <?php
                                    switch ($value->kind){
                                        case "payment" : print("Thanh toán");break;
                                        case "issue" : print("Xuất vé");break;
                                        case "room" : print("Đặt phòng");break;
                                    }
                                ?>
                            </td>
                            <td>
                                <span data-id="<?php print($value->id); ?>" data-name="<?php print($value->name); ?>" data-type="<?php print($value->type); ?>" data-kind="<?php print($value->kind); ?>" class="btn btn-primary btn-edit-tran-kind">Sửa</span>
                                <span data-id="<?php print($value->id); ?>" data-name="<?php print($value->name); ?>" class="btn btn-danger btn-delete-tran-kind">Xóa</span>
                            </td>
                        </tr>
                        <?php $index++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>

<div id="modal_tran_kind" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm mới loại giao dịch</h4>
            </div>
            <div class="modal-body">
                <?php
                $cassiopeia_add_tran_kind_form = drupal_get_form("cassiopeia_add_tran_kind_form");
                if(!empty($cassiopeia_add_tran_kind_form)){
                    $cassiopeia_add_tran_kind_form = drupal_render($cassiopeia_add_tran_kind_form);
                    print($cassiopeia_add_tran_kind_form);
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div id="modal_delete_tran_kind" class="modal modal-delete fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Xóa loại giao dịch</h4>
            </div>
            <div class="modal-body">
                <div class="confirm"></div>
                <?php
                $cassiopeia_delete_tran_kind_form = drupal_get_form("cassiopeia_delete_tran_kind_form");
                if(!empty($cassiopeia_delete_tran_kind_form)){
                    $cassiopeia_delete_tran_kind_form = drupal_render($cassiopeia_delete_tran_kind_form);
                    print($cassiopeia_delete_tran_kind_form);
                }
                ?>
            </div>
        </div>
    </div>
</div>