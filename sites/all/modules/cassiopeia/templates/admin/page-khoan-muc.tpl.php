<?php
$query = db_select("tbl_khoan_muc","tbl_khoan_muc");
$query -> fields("tbl_khoan_muc");
$khoanmuc = $query -> execute() -> fetchAll();
?>
<div class="khoan-muc">
    <div>
        <button class="btn btn-primary btn-add-khoan-muc">Thêm mới</button>
    </div>
    <div class="block-container">
        <table class="table table-hovered">
            <thead>
            <tr>
                <th>STT</th>
                <th>Mã</th>
                <th>Khoản mục</th>
                <th>Loại</th>
            </tr>
            </thead>
            <tbody>
                <?php $index=1; ?>
                <?php if(!empty($khoanmuc)): ?>
                    <?php foreach($khoanmuc as $value): ?>
                        <tr>
                            <td><?php print($index); ?></td>
                            <td><?php print($value->code); ?></td>
                            <td><?php print($value->name); ?></td>
                            <td>
                                <?php if($value->kind==1): ?>
                                    Thu
                                <?php elseif($value->kind==2): ?>
                                    Chi
                                <?php else: ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <span data-kind="<?php print(!empty($value->kind)?$value->kind:1); ?>" data-id="<?php print($value->id); ?>" data-code="<?php print($value->code); ?>" data-name="<?php print($value->name); ?>" class="btn btn-primary btn-edit-khoan-muc">Sửa</span>
                                <span data-id="<?php print($value->id); ?>" data-name="<?php print($value->name); ?>" class="btn btn-danger btn-delete-khoan-muc">Xóa</span>
                            </td>
                        </tr>
                        <?php $index++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div id="modal_khoan_muc" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <?php
                $cassiopeia_khoan_muc_form = drupal_get_form("cassiopeia_khoan_muc_form");
                if(!empty($cassiopeia_khoan_muc_form)){
                    $cassiopeia_khoan_muc_form = drupal_render($cassiopeia_khoan_muc_form);
                    print($cassiopeia_khoan_muc_form);
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div id="modal_delete_khoan_muc" class="modal modal-delete fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Xóa khoản mục</h4>
            </div>
            <div class="modal-body">
                <div class="confirm"></div>
                <?php
                $cassiopeia_delete_khoan_muc_form = drupal_get_form("cassiopeia_delete_khoan_muc_form");
                if(!empty($cassiopeia_delete_khoan_muc_form)){
                    $cassiopeia_delete_khoan_muc_form = drupal_render($cassiopeia_delete_khoan_muc_form);
                    print($cassiopeia_delete_khoan_muc_form);
                }
                ?>
            </div>
        </div>
    </div>
</div>