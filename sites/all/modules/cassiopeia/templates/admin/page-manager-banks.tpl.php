<?php
$query = db_select("tbl_bank","tbl_bank");
$query -> fields("tbl_bank");
$result = $query -> execute() -> fetchAll();
?>
<div class="page-payment-report">
    <div class="block-container">
        <div class="buttons">
            <button class="btn btn-primary btn-add-bank">Thêm mới</button>
        </div>
        <div class="items">
            <div class="title">
                <h3>Danh sách ngân hàng</h3>
            </div>
            <table class="table table-responsive report-items">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã</th>
                    <th>Ngân hàng</th>
                    <th></th>
                </tr>
                </thead>
                <?php if(!empty($result)): ?>
                    <?php $index=1; ?>
                    <?php foreach($result as $value): ?>
                        <tr>
                            <td><?php print($index); ?></td>
                            <td><?php print($value->code); ?></td>
                            <td><?php print($value->name); ?></td>
                            <td>
                                <span data-id="<?php print($value->id); ?>" data-code="<?php print($value->code); ?>" data-name="<?php print($value->name); ?>" class="btn btn-primary btn-edit-bank">Sửa</span>
                                <span data-id="<?php print($value->id); ?>" data-name="<?php print($value->name); ?>" class="btn btn-danger btn-delete-bank">Xóa</span>
                            </td>
                        </tr>
                        <?php $index++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>

<div id="modal_bank" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm mới ngân hàng</h4>
            </div>
            <div class="modal-body">
                <?php
                $cassiopeia_add_bank_form = drupal_get_form("cassiopeia_add_bank_form");
                if(!empty($cassiopeia_add_bank_form)){
                    $cassiopeia_add_bank_form = drupal_render($cassiopeia_add_bank_form);
                    print($cassiopeia_add_bank_form);
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div id="modal_delete_bank" class="modal modal-delete fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Xóa ngân hàng</h4>
            </div>
            <div class="modal-body">
                <div class="confirm"></div>
                <?php
                $cassiopeia_delete_bank_form = drupal_get_form("cassiopeia_delete_bank_form");
                if(!empty($cassiopeia_delete_bank_form)){
                    $cassiopeia_delete_bank_form = drupal_render($cassiopeia_delete_bank_form);
                    print($cassiopeia_delete_bank_form);
                }
                ?>
            </div>
        </div>
    </div>
</div>