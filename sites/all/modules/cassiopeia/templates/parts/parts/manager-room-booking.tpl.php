<?php
$query = db_select("tbl_room_booking","tbl_room_booking");
$query->fields("tbl_room_booking");
$query->join("tbl_room_booking_detail","tbl_room_booking_detail","tbl_room_booking_detail.code=tbl_room_booking.code");
$query->groupBy("tbl_room_booking.code");
$query->addExpression("SUM(tbl_room_booking_detail.number_of_room)","number_of_room");
$result = $query->execute()->fetchAll();
?>
<?php if(!empty($result)): ?>
    <?php foreach($result as $item): ?>
        <?php
        $hotel = node_load($item->hotel);
        $agent = !empty($item->uid)?user_load($item->uid):null;
        $sale = !empty($agent->field_account_sale['und'][0]['target_id'])?user_load($agent->field_account_sale['und'][0]['target_id']):null;
        $total_price = $item->extraBed+$item->VAT+$item->room_price+$item->surcharge_children;
        ?>
        <tr>
            <td><a class="btn btn-primary" href="/admin/manager/room/booking/edit/<?php echo($item->code); ?>"><i class="fa fa-edit"></i></a></td>
            <td><?php echo($item->code); ?></td>
            <td></td>
            <td></td>
            <td><?php echo(date("d/m/Y",$item->created)); ?></td>
            <td>
                <div><?php echo($hotel->title); ?></div>
                <div><?php echo(date("d/m/Y",$item->from_date)); ?>(Check in)</div>
            </td>
            <td><?php echo($item->number_of_room); ?></td>
            <td>

            </td>
            <td>
                <?php echo(!empty($agent)?$agent->field_account_transaction_name['und'][0]['value']:""); ?>
            </td>
            <td>
                <?php echo(!empty($sale)?$agent->field_account_transaction_name['und'][0]['value']:""); ?>
            </td>
            <td>
                <?php echo(number_format($total_price,0,",",".")); ?>
            </td>
        </tr>
    <?php endforeach; ?>
<?php endif; ?>
