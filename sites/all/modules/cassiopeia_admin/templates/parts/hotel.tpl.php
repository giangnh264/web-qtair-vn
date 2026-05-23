<?php

$data = $variables['data'];
$page = isset($data->page)?$data->page:1;
$conditions = array();
$query = db_select("node","tbl_node");
$query->fields("tbl_node");
$query->condition("tbl_node.type","hotel");
$query->orderBy("tbl_node.created","DESC");
if(!empty($data->user) && $data->user!="all"){
    $query->join("node_revision","node_revision","node_revision.nid = tbl_node.nid");
    $query->condition("node_revision.uid",$data->user);
}
if(!empty($data->tx_area&&$data->tx_area!="all")){
    $query->join("field_data_field_tx_area","field_tx_area","field_tx_area.entity_id=tbl_node.nid");
    $query->condition("field_tx_area.field_tx_area_tid",$data->tx_area);
}
if(!empty($data->title)){
    $query->condition("tbl_node.title","%".$data->title."%","LIKE");
}
if( $data->status!="all"){
    $query->condition("tbl_node.status",$data->status,"=");
}
if(!empty($data->code)){
    $query->join("field_data_field_code","field_code","field_code.entity_id = tbl_node.nid");
    $query->condition("field_code.field_code_value","%".$data->code."%","LIKE");
}
if(!empty($data->ranking)){
    $query->join("field_data_field_hotel_ranking","field_hotel_ranking","field_hotel_ranking.entity_id = tbl_node.nid");
    $query->condition("field_hotel_ranking.field_hotel_ranking_value",$data->ranking,"=");
}
if(!empty($data->changed)){
    $query->condition("tbl_node.changed",array(strtotime(date("d-m-Y 0:0:0",strtotime(str_replace("/","-",$data->changed)))),strtotime(date("d-m-Y 23:59",strtotime(str_replace("/","-",$data->changed))))),"BETWEEN");
}
$total = $query->execute()->fetchAll();
$limit=20;
$start = ($page-1)*$limit;
$query->range($start,$limit);
$hotels=$query->execute()->fetchAll();
$total_items = count($total);
$page_count = ceil($total_items/$limit);

?>
<?php if(!empty($hotels)): ?>
    <?php foreach($hotels as $hotel): $hotel=node_load($hotel->nid);?>
        <?php $revision = !empty(user_load($hotel->revision_uid))?user_load($hotel->revision_uid):null; ?>
        <tr>
            <td><?php echo(!empty($hotel->field_code['und'][0]['value'])?$hotel->field_code['und'][0]['value']:""); ?></td>
            <td><?php echo($hotel->title); ?></td>
            <td><?php echo($hotel->field_hotel_ranking['und'][0]['value']); ?></td>
            <td><?php echo(!empty($revision->field_account_transaction_name['und'][0]['value'])?$revision->field_account_transaction_name['und'][0]['value']:$revision->name); ?></td>
            <td><?php echo(date("d/m/Y",$hotel->changed)); ?></td>
            <td>
                <?php if(cassiopeia_check_permission("cassiopeia_user_permission_hotel","p_edit")): ?>
                    <input type="checkbox" class="hotel_status" <?php echo($hotel->status==1?"checked":""); ?>  value="<?php echo($hotel->nid); ?>">
                <?php else: ?>
                    <input type="checkbox" readonly disabled <?php echo($hotel->status==1?"checked":""); ?>  value="<?php echo($hotel->nid); ?>">
                <?php endif; ?>
            </td>
            <td><input type="number" value="<?php echo($hotel->field_weight['und'][0]['value']); ?>" class="form-control"></td>
            <td>
                <?php if(cassiopeia_check_permission("cassiopeia_user_permission_hotel","p_edit")): ?>
                    <a href="/node/<?php echo($hotel->nid); ?>/edit?destination=admin/manager/hotel"><i class="fa fa-edit"></i></a>
                    <a href="/node/<?php echo($hotel->nid); ?>/clone/confirm?destination=admin/manager/hotel"><i class="fa fa-clone"></i></a>
                <?php endif; ?>
                <?php if(cassiopeia_check_permission("cassiopeia_user_permission_hotel","p_delete")): ?>
                    <a href="/node/<?php echo($hotel->nid); ?>/delete?destination=admin/manager/hotel"><i class="fa fa-trash"></i></a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
<?php endif; ?>
<tr>
    <td colspan="8">
        <div class="ajax-pagination">
            <div class="ajax-pagination-container">
                <ul>
                    <?php if($page_count<=3): ?>
                        <?php for($i=1;$i<=$page_count;$i++): ?>
                            <li><span class="ajax-item <?php if($page==$i) print("active"); ?>" data-page="<?php print($i); ?>"><?php print($i); ?></span></li>
                        <?php endfor; ?>
                    <?php else: ?>
                        <?php if($page<=2): ?>
                            <?php for($i=1;$i<=3;$i++): ?>
                                <li><span class="ajax-item <?php if($page==$i) print("active"); ?>" data-page="<?php print($i); ?>"><?php print($i); ?></span></li>
                            <?php endfor; ?>
                            <li><span class="">...</span></li>
                            <li><span class="ajax-item fa fa-angle-right" data-page="<?php print($page+1); ?>"></span></li>
                            <li><span class="ajax-item fa fa-angle-double-right" data-page="<?php print($page_count); ?>"></span></li>
                        <?php else: ?>
                            <?php if($page>=$page_count-1): ?>
                                <li><span class="ajax-item fa fa-angle-double-left" data-page="<?php print(1); ?>"></span></li>
                                <li><span class="ajax-item fa fa-angle-left" data-page="<?php print($page-1); ?>"></span></li>
                                <li><span class="">...</span></li>
                                <?php for($i=$page_count-2;$i<=$page_count;$i++): ?>
                                    <li><span class="ajax-item <?php if($page==$i) print("active"); ?>" data-page="<?php print($i); ?>"><?php print($i); ?></span></li>
                                <?php endfor; ?>
                            <?php else: ?>
                                <li><span class="ajax-item fa fa-angle-double-left" data-page="<?php print(1); ?>"></span></li>
                                <li><span class="ajax-item fa fa-angle-left" data-page="<?php print($page-1); ?>"></span></li>
                                <li><span class="">...</span></li>
                                <?php for($i=$page-1;$i<=$page+1;$i++): ?>
                                    <li><span class="ajax-item <?php if($page==$i) print("active"); ?>" data-page="<?php print($i); ?>"><?php print($i); ?></span></li>
                                <?php endfor; ?>
                                <li><span class="">...</span></li>
                                <li><span class="ajax-item fa fa-angle-right" data-page="<?php print($page+1); ?>"></span></li>
                                <li><span class="ajax-item fa fa-angle-double-right" data-page="<?php print($page_count); ?>"></span></li>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </td>
</tr>