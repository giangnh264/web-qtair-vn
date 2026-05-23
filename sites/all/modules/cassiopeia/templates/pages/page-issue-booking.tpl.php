<?php
global $user;
//db_delete("tbl_report")->condition("tran_code","PMNRTÉC")->execute();
//db_delete("tbl_issue_report")->condition("PNR","PMNRTÉC")->execute();
//die;
$booking_code = $variables['booking_code'];
//print($booking_code);
cassiopeia_booking_issue_complete($_GET['vnp_TxnRef'],"Thanh toán tài khoản AG");
//drupal_goto("/booking/view/".$booking_code);
?>
