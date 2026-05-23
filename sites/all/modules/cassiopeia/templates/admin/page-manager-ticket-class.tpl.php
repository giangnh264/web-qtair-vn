<?php
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/ticket-class-manager.js', ['weight' => 1000]);
$query = db_select("tbl_ticket_class","tbl_ticket_class");
$query->fields("tbl_ticket_class");

$result = $query->execute()->fetchAll();
?>
<div class="page-ticket-class">
    <div class="buttons">
        <button class="btn btn-primary btn-add-ticket-class">Thêm mới</button>
    </div>
    <div class="block-items">
        <table class="table table-hover table-stripped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Ngày tạo</th>
                    <th>Hãng</th>
                    <th>Hạng chỗ</th>
                </tr>
            </thead>
            <?php if(!empty($result)): $index=1;?>
                <tbody>
                    <?php foreach($result as $item): ?>
                        <tr>
                            <td><?php print($index); ?></td>
                            <td><?php print(date("d/m/Y",$item->created)); ?></td>
                            <td><?php print($item->airline); ?></td>
                            <td><?php print($item->class); ?></td>
                        </tr>
                        <?php $index++; ?>
                    <?php endforeach; ?>
                </tbody>
            <?php endif; ?>
        </table>
    </div>
</div>
<!-- Modal -->
<div id="modal_add_ticket_class" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <?php
                $cassiopeia_ticket_price_add_form = drupal_get_form("cassiopeia_ticket_class_add_form");
                if(!empty($cassiopeia_ticket_price_add_form)){
                    $cassiopeia_ticket_price_add_form = drupal_render($cassiopeia_ticket_price_add_form);
                    print($cassiopeia_ticket_price_add_form);
                }
                ?>
            </div>
        </div>

    </div>
</div>