<?php
drupal_add_css("//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css");
drupal_add_js("https://code.jquery.com/ui/1.13.1/jquery-ui.js");
drupal_add_js(drupal_get_path("module","cassiopeia_admin")."/js/hotel-tx-area.js");
$conditions = array();
$conditions['weight'] = array(
    "type"      => "propertyOrderBy",
    "direction" => "ASC"
);
$tx_areas = cassiopeia_get_items_by_conditions($conditions,"tx_area","taxonomy_term");
//_print_r($tx_areas);
?>
<div class="add-form" style="margin-bottom: 30px;">
    <?php if(cassiopeia_check_permission("cassiopeia_user_permission_hotel_tx_area","p_add")): ?>
        <a href="/admin/structure/taxonomy/tx_area/add?destination=admin/manager/hotel-tx-area" class="btn btn-primary">Thêm mới</a>
    <?php endif; ?>
</div>
<table class="table table-hover table-stripped">
    <thead>
        <tr>
            <?php if(cassiopeia_check_permission("cassiopeia_user_permission_hotel_tx_area","p_edit")): ?>
                <th width="50px"></th>
            <?php endif; ?>
            <th>Tên</th>
            <th width="100px">Thao tác</th>
        </tr>
    </thead>
    <tbody class="sortable">
        <?php foreach((array)$tx_areas as $tx_area): ?>
            <tr data-tid="<?php echo $tx_area->tid; ?>">
                <?php if(cassiopeia_check_permission("cassiopeia_user_permission_hotel_tx_area","p_edit")): ?>
                    <td class="tx-weight" data-tid="<?php echo $tx_area->tid; ?>"><i class="fa fa-arrows"></i></td>
                <?php endif; ?>
                <td><?php echo l($tx_area->name,"taxonomy/term/".$tx_area->tid,array("html"=>TRUE)); ?></td>
                <td>
                    <?php if(cassiopeia_check_permission("cassiopeia_user_permission_hotel_tx_area","p_edit")): ?>
                        <a href="/taxonomy/term/<?php echo $tx_area->tid; ?>/edit?destination=admin/manager/hotel-tx-area" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                    <?php endif; ?>
                    <?php if(cassiopeia_check_permission("cassiopeia_user_permission_hotel_tx_area","p_delete")): ?>
                        <a href="/taxonomy/term/<?php echo $tx_area->tid; ?>/delete?destination=admin/manager/hotel-tx-area" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
