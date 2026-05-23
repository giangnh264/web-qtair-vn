<?php include(drupal_get_path('module', 'cassiopeia') . '/templates/vnpay/config.inc'); ?>
<?php
_print_r($_GET);
$vnp_SecureHash = $_GET['vnp_SecureHash'];
$inputData = array();
foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
    }
}
unset($inputData['vnp_SecureHashType']);
unset($inputData['vnp_SecureHash']);
ksort($inputData);
$i = 0;
$hashData = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashData = $hashData . '&' . $key . "=" . $value;
    } else {
        $hashData = $hashData . $key . "=" . $value;
        $i = 1;
    }
}

//$secureHash = md5($vnp_HashSecret . $hashData);
$secureHash = hash('sha256',$vnp_HashSecret . $hashData);
?>
<?php
if ($secureHash == $vnp_SecureHash) {
    if ($_GET['vnp_ResponseCode'] == '00') {
        cassiopeia_booking_issue_complete($_GET['vnp_TxnRef'],"Thanh toán trực tuyến");
    } else {
       drupal_set_message("Giao dịch không thành công, vui lòng liên hệ với Booker để được hỗ trợ!");
       drupal_goto("/");
    }
} else {
//    cassiopeia_booking_issue_complete($_GET['vnp_TxnRef']);
}
?>