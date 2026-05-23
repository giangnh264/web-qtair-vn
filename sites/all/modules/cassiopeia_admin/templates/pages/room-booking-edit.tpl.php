<?php
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/checkAvailableBalance.js', ['weight' => 1000]);
$booking_code = $variables['booking_code'];
try{
    $query = db_select("tbl_room_booking","tbl_room_booking");
    $query->fields("tbl_room_booking");
    $query->condition("tbl_room_booking.code",$booking_code);
    $result = $query->execute()->fetchObject();
//    _print_r($result);
    $query = db_select("tbl_room_booking_detail","tbl_room_booking_detail");
    $query->fields("tbl_room_booking_detail");
    $query->condition("tbl_room_booking_detail.code",$booking_code);
    $result_details = $query->execute()->fetchAll();
//    _print_r($result_details);
}catch (Exception $e){
//    _print_r($e);
}
$data = new stdClass();
$data->start_date = date("d-m-Y",$result->from_date);
$data->end_date = date("d-m-Y",$result->to_date);
$_SESSION['booking_room']['start_date'] = $data->start_date;
$_SESSION['booking_room']['end_date'] = $data->end_date;
$data->hotel = $result->hotel;
$rooms = array();
$index=0;
if(!empty($result_details)){
    foreach($result_details as $detail){
        $rooms[$detail->room] = $detail->number_of_room;
        $data->room[$index]['nid'] = $detail->room;
        $data->room[$index]['quantity'] = $detail->number_of_room;
        $data->room[$index]['adult'] = $detail->adult;
        $data->room[$index]['children'] = $detail->children;
        $data->room[$index]['from_date'] = date("Y-m-d",$detail->from_date);
        $data->room[$index]['to_date'] = date("Y-m-d",$detail->to_date);
        $data->room[$index]['extraBed'] = $detail->extraBed;
        if(!empty($detail->children_age)){
            $temp = explode(",",$detail->children_age);
            for($i=1;$i<count($temp);$i++){
                $data->room[$index]['children_age'][] = $temp[$i];
            }
        }
        $index++;
    }
}
//_print_r($result);
$data->status = $result->status;
$data->booking_code = $booking_code;
$data->orderCustomerFullName = $result->customer_name;
$data->orderContactFullName = $result->contactName;
$data->orderContactTel = $result->contactTel;
$data->orderContactEmail = $result->contactEmail;
$data->VAT = $result->VAT;
$data->extraBed = $result->extraBed;
$data->surcharge_children = $result->surcharge_children;
$data->surcharge_adult = $result->surcharge_adult;
$data->surcharge_weekend = $result->surcharge_weekend;
$data->partner_price = !empty($result->partner_price)?$result->partner_price:0;
$data->net_price = !empty($result->net_price)?$result->net_price:0;
$data->room_code = !empty($result->room_code)?$result->room_code:"";
$data->net_price = !empty($result->net_price)?$result->net_price:0;
$data->note = !empty($result->note)?$result->note:"";

?>
<div class="page-manager-edit-room-booking">
    <input class="hidden" id="agentID" value = "<?php echo (!empty($result->uid) ? $result->uid : -1) ?>">
    <?php
    $cassiopeia__room_booking_form = drupal_get_form("cassiopeia_room_booking_form",$data,true);
    $cassiopeia__room_booking_form = drupal_render($cassiopeia__room_booking_form);
    print($cassiopeia__room_booking_form);
    ?>
</div>
