<?php drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/booking-payment.js', ['weight' => 10000000]); ?>
<?php
$cassiopeia_ticket_booking_form = drupal_get_form("cassiopeia_ticket_booking_form");
if(!empty($cassiopeia_ticket_booking_form)){
    $cassiopeia_ticket_booking_form = drupal_render($cassiopeia_ticket_booking_form);
    echo $cassiopeia_ticket_booking_form;
}
?>