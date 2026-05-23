<?php
drupal_add_css("//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css");
drupal_add_js("https://code.jquery.com/ui/1.13.1/jquery-ui.js");
drupal_add_js(drupal_get_path("module","cassiopeia_admin")."/templates/js/custom.js");
$cache = !empty($_REQUEST['data'])?$_REQUEST['data']:array();
$conditions = array();
//$conditions['field_weight'] = array(
//    "type"      => "fieldOrderBy",
//    "column"    => "value",
//    "direction" => "ASC"
//);
$conditions['created'] = array(
    "type"      => "propertyOrderBy",
    "direction" => "DESC"
);
if(!empty($cache['hotel'])){
    $conditions['field_hotel'] = array(
        "type"      => "fieldCondition",
        "key"       => "nid",
        "value"     => $cache['hotel'],
        "condition" => "="
    );
}
$nodes = cassiopeia_get_items_by_conditions($conditions,"room","node");
$limit = 25;
$page = pager_default_initialize(count($nodes), $limit, 0);
$offset = $limit * $page;
if(!empty($nodes)){
    $nodes = array_slice($nodes, $offset, $limit);
}else{
    $nodes=null;
}
?>
<?php if(cassiopeia_check_permission("cassiopeia_user_permission_room","p_add")): ?>
    <div class="add">
        <a href="/node/add/room?destination=admin/manager/room" class="btn btn-primary">Thêm mới</a>
    </div>
<?php endif; ?>
<div class="filter-form">
    <?php
        $cassiopeia_room_filter_form = drupal_get_form("cassiopeia_room_filter_form",$cache);
        if(!empty($cassiopeia_room_filter_form)){
            $cassiopeia_room_filter_form = drupal_render($cassiopeia_room_filter_form);
            echo $cassiopeia_room_filter_form;
        }
    ?>
</div>
<div class="table-responsive">
    <table class="table table-hover table-stripped">
        <thead>
            <tr>
                <th></th>
                <th>Room ID</th>
                <th>Ảnh đại diện</th>
                <th>Hạng phòng</th>
                <th>Ẩn/Hiện</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody class="sortable">
            <?php foreach((array)$nodes as $node): ?>
                <tr data-nid="<?php echo $node->nid; ?>">
                    <td width="30px">
                        <i class="fa fa-arrows custom-dragging"></i>
                    </td>
                    <td><?php echo $node->nid; ?></td>
                    <td>
                        <?php
                        if (!empty($node->field_image['und'][0])) {
                            $node_img = (array) $node->field_image['und'][0];
                            $node_img['style_name'] = "thumbnail";
                            $node_img['path'] = $node_img['uri'];
                            $node_img = theme('image_style', $node_img);
                            echo(l($node_img, 'node/'.$node->nid, array('html'=>TRUE)));
                        }
                        ?>
                    </td>
                    <td>
                        <?php echo(l($node->title, 'node/'.$node->nid, array('html'=>TRUE))); ?>
                    </td>
                    <td>
                        <?php if(cassiopeia_check_permission("cassiopeia_user_permission_hotel","p_edit")): ?>
                            <input type="checkbox" class="room_status" <?php echo($node->status==1?"checked":""); ?>  value="<?php echo($node->nid); ?>">
                        <?php else: ?>
                            <input type="checkbox" readonly disabled <?php echo($node->status==1?"checked":""); ?>  value="<?php echo($node->nid); ?>">
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if(cassiopeia_check_permission("cassiopeia_user_permission_room","p_edit")): ?>
                            <a href="/node/<?php echo $node->nid; ?>/edit?destination=admin/manager/room" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-success" title="clone" href="/node/<?php echo($node->nid); ?>/clone/confirm?destination=admin/manager/room"><i class="fa fa-clone"></i></a>
                        <?php endif; ?>
                        <?php if(cassiopeia_check_permission("cassiopeia_user_permission_room","p_delete")): ?>
                            <a href="/node/<?php echo $node->nid; ?>/delete?destination=admin/manager/room" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- paging-->
<div class="page">
    <div class="cassiopeia-pagination">
        <div class="cassiopeia-pagination-container">
            <?php print (theme('pager',  array('tags' => array('«','‹','','›','»'))));?>
        </div>
    </div>
</div>
<!--e: paging-->