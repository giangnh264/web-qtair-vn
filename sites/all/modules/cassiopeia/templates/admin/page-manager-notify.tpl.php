<?php

global $user;
$query = db_select("tbl_notify","tbl_notify");
$query->fields("tbl_notify");
$result = $query->execute()->fetchAll();
//_print_r($result);
?>
<div class="page-manager-notify">
    <div class="add-block">
        <button class="btn btn-primary btn-add-notify">Thêm mới</button>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Thao tác</th>
                <th>Ngày tạo</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>URL</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($result)): ?>
                <?php foreach($result as $value): ?>
                    <tr>
                        <td>
                            <span data-id="<?php print($value->id); ?>" class="fa fa-trash btn btn-danger btn-delete-notify" title="Xóa thông báo"></span>
                        </td>
                        <td><?php print(date("d/m/Y H:i",$value->created)); ?></td>
                        <td><?php print($value->title); ?></td>
                        <td><?php print($value->content); ?></td>
                        <td><?php print($value->url); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<div id="modal_add_notify" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm mới thông báo</h4>
            </div>
            <div class="modal-body">
                <?php
                $cassiopeia_add_payment_report_form = drupal_get_form("cassiopeia_add_notify_form");
                if(!empty($cassiopeia_add_payment_report_form)){
                    $cassiopeia_add_payment_report_form = drupal_render($cassiopeia_add_payment_report_form);
                    print($cassiopeia_add_payment_report_form);
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div id="modal_delete_notify" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Xóa thông báo</h4>
            </div>
            <div class="modal-body">
                <?php
                $cassiopeia_add_payment_report_form = drupal_get_form("cassiopeia_delete_notify_form");
                if(!empty($cassiopeia_add_payment_report_form)){
                    $cassiopeia_add_payment_report_form = drupal_render($cassiopeia_add_payment_report_form);
                    print($cassiopeia_add_payment_report_form);
                }
                ?>
            </div>
        </div>
    </div>
</div>