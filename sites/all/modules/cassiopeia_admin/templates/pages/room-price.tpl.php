<?php
$query = db_select("cassiopeia_room_room_price","tbl_room_price");
$query->fields("tbl_room_price");
$query->join("field_data_field_hotel","field_hotel","field_hotel.entity_id=tbl_room_price.nid");
$query->orderBy("tbl_room_price.nid","DESC");
$query->orderBy("tbl_room_price.from_date","DESC");
$result = $query->execute()->fetchAll();
$limit = 50;
$page = pager_default_initialize(count($result), $limit, 0);
$offset = $limit * $page;
if(!empty($result)){
    $result = array_slice($result, $offset, $limit);
}else{
    $result=null;
}
?>
<div class="page-admin-manager-room-price">
    <div class="block-buttons">
        <?php if(cassiopeia_check_permission("cassiopeia_user_permission_room_price","p_add")): ?>
            <button class="btn btn-success" data-toggle="modal" data-target="#modal_import_room_price">Import excel</button>
            <a href="/admin/manager/hotel/room-price/export" class="btn btn-primary">Tải file mẫu</a>
        <?php endif; ?>
        <?php if(cassiopeia_check_permission("cassiopeia_user_permission_room_price","p_delete")): ?>
            <button class="btn btn-danger btn-delete-all-room-price"><i class="fa fa-trash"></i> Xóa tất cả</button>
        <?php endif; ?>
    </div>
    <div class="block-filter">

    </div>
    <table class="table table-hover table-stripped">
        <thead>
        <tr>
            <th>STT</th>
            <th>Khách sạn</th>
            <th>Phòng</th>
            <th>Từ ngày</th>
            <th>Đến ngày</th>
            <th>Giá bán</th>
            <th>Giá gốc</th>
            <th>Cuối tuần</th>
            <th>Giường phụ</th>
            <th>Người lớn</th>
            <th>Trẻ em</th>
            <th>Em bé</th>
            <th>Cập nhật</th>
        </tr>
        </thead>
        <tbody>
        <?php if(!empty($result)): $stt=1;?>
            <?php foreach($result as $item): ?>
                <?php $room = node_load($item->nid); ?>
                <?php $hotel = node_load($room->field_hotel['und'][0]['nid']); ?>
                <tr>
                    <td><?php echo($stt); ?></td>
                    <td><?php echo($hotel->title); ?></td>
                    <td><?php echo($room->title); ?></td>
                    <td><?php echo(date("d/m/Y",$item->from_date)); ?></td>
                    <td><?php echo(date("d/m/Y",$item->to_date)); ?></td>
                    <td><?php echo(number_format($item->price,0,",",".")); ?></td>
                    <td><?php echo(number_format($item->original_price,0,",",".")); ?></td>
                    <td><?php echo(number_format($item->weekend,0,",",".")); ?></td>
                    <td><?php echo(number_format($item->extra_bed,0,",",".")); ?></td>
                    <td><?php echo(number_format($item->adult,0,",",".")); ?></td>
                    <td><?php echo(number_format($item->children,0,",",".")); ?></td>
                    <td><?php echo(number_format($item->infant,0,",",".")); ?></td>
                    <td><?php echo(date("d/m/Y",$item->created)); ?></td>
                </tr>
                <?php $stt++; endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
    <!-- paging-->
    <div class="page">
        <div class="cassiopeia-pagination">
            <div class="cassiopeia-pagination-container">
                <?php print (theme('pager',  array('tags' => array('«','‹','','›','»'))));?>
            </div>
        </div>
    </div>
    <!--e: paging-->
</div>
<?php if(cassiopeia_check_permission("cassiopeia_user_permission_room_price","p_add")): ?>
    <!-- Modal -->
    <div id="modal_import_room_price" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cập nhật giá phòng</h4>
                </div>
                <div class="modal-body">
                    <?php
                    $cassiopeia_ticket_price_add_form = drupal_get_form("cassiopeia_room_price_import");
                    if(!empty($cassiopeia_ticket_price_add_form)){
                        $cassiopeia_ticket_price_add_form = drupal_render($cassiopeia_ticket_price_add_form);
                        print($cassiopeia_ticket_price_add_form);
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
<?php endif; ?>
