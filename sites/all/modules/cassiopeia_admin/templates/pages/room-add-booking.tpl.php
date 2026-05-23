
<div class="page-manager-edit-room-booking">
    <?php
    $cassiopeia__room_booking_form = drupal_get_form("cassiopeia_room_booking_form",array(),$admin=true);
    $cassiopeia__room_booking_form = drupal_render($cassiopeia__room_booking_form);
    print($cassiopeia__room_booking_form);
    ?>
</div>
