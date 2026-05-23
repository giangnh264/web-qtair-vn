<?php
$data = new stdClass();
$data->start_date = $_SESSION['booking_room']['start_date'] = date("d-m-Y",REQUEST_TIME);
$data->end_date = $_SESSION['booking_room']['end_date'] = date("d-m-Y",strtotime(date("d-m-Y",REQUEST_TIME)." + 1 day"));
$cassiopeia__room_booking_form = drupal_get_form("cassiopeia_room_booking_form",$data);
$cassiopeia__room_booking_form = drupal_render($cassiopeia__room_booking_form);
print($cassiopeia__room_booking_form);
?>