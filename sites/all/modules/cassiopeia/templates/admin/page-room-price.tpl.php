<?php
$query = db_select("tbl_room_price","tbl_room_price");
$query->fields("tbl_room_price");
$query->join("field_data_field_hotel","field_hotel","field_hotel.entity_id=tbl_room_price.nid");
$query->orderBy("tbl_room_price.nid","DESC");
$query->orderBy("tbl_room_price.from_date","DESC");
$result = $query->execute()->fetchAll();
?>
<div class="page-admin-manager-room-price">
    <div class="block-buttons">
        <button class="btn btn-success" data-toggle="modal" data-target="#modal_import_room_price">Import excel</button>
        <a href="/admin/manager/hotel/room-price/export" class="btn btn-primary">Tải file mẫu</a>
        <button class="btn btn-danger btn-delete-all-room-price"><i class="fa fa-trash"></i> Xóa tất cả</button>
    </div>
    <div class="block-filter">

    </div>
    <table class="table table-hover table-stripped">
        <thead>
        <tr>
            <th>Index</th>
            <th>Hotel</th>
            <th>Room type</th>
            <th>From</th>
            <th>To</th>
            <th>Price</th>
            <th>Weekend</th>
            <th>Extra bed</th>
            <th>Adult</th>
            <th>Children</th>
            <th>Infant</th>
            <th>Changed</th>
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
</div>
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