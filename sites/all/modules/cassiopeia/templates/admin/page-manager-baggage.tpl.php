<?php
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/manager-baggage.js', ['weight' => 1000]);
$query = db_select("tbl_bagage","tbl_bagage");
$query->fields("tbl_bagage");
$result = $query->execute()->fetchAll();
?>
<div class="page-manager-baggage">
    <div class="buttons">
        <button class="btn btn-primary btn-add-baggage">Thêm mới</button>
    </div>
    <table class="table table-hover table-stripped">
        <thead>
            <tr>
                <th></th>
                <th>Airline</th>
                <th>Weight</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($result)): ?>
                <?php foreach($result as $item): ?>
                    <tr>
                        <td>
                            <button data-id="<?php print($item->id); ?>" data-airline="<?php print($item->airline); ?>" data-weight="<?php print($item->weight); ?>" data-price="<?php print($item->amount); ?>" class="btn-edit-baggage"><span class="fa fa-edit"></span></button>
                            <button data-id="<?php print($item->id); ?>" class="btn-delete-baggage"><span class="fa fa-trash "></span></button>
                        </td>
                        <td><?php print($item->airline); ?></td>
                        <td><?php print($item->weight); ?></td>
                        <td><?php print($item->amount); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<!-- Modal -->
<div id="modal_baggage" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <?php
                $cassiopeia_ticket_price_add_form = drupal_get_form("cassiopeia_baggage_form");
                if(!empty($cassiopeia_ticket_price_add_form)){
                    $cassiopeia_ticket_price_add_form = drupal_render($cassiopeia_ticket_price_add_form);
                    print($cassiopeia_ticket_price_add_form);
                }
                ?>
            </div>
        </div>

    </div>
</div>