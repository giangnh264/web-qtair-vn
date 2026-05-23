<?php
if(empty($_REQUEST['nid'])){
    drupal_goto("hotel");
}
$room = node_load($_REQUEST['nid']);
$hotel = node_load($room->field_hotel['und'][0]['nid']);
$tx_area = !empty($hotel->field_tx_area['und'][0]['tid'])?taxonomy_term_load($hotel->field_tx_area['und'][0]['tid']):null;
?>
<div class="page-room-booking">
    <div class="page-room-booking-container container">
        <div class="page-room-booking-inner">
            <!-- breadcrumb -->
            <div class="breadcrumb-container">
                <div class="page-top-block">
                    <div class="step">
                        <div class="step-1 active">
                            Trang chủ
                        </div>
                        <div class="step-2">
                           <?php echo l($tx_area->name,"taxonomy/term/".$tx_area->tid,array("html"=>TRUE)); ?>
                        </div>
                        <div class="step-3">
                            <?php echo l($hotel->title,"node/".$hotel->nid,array("html"=>TRUE)); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- oder-step -->
            <div class="oder-step-by-step">
                <div class="oder-step-by-step-container">
                    <div class="order-step step-1">
                        <label for="">
                            <span><i class="fa-solid fa-check"></i></span>
                            Chọn phòng
                        </label>
                    </div>
                    <div class="order-step step-2 active">
                        <label for="">
                            <span>2</span>
                            Thanh toán 
                        </label>
                    </div>
                    <div class="order-step step-3">
                        <label for="">
                            <span>3</span>
                            Hoàn tất
                        </label>
                    </div>
                </div>
            </div>
            <!-- room-booking -->
            <div class="block-room-booking">
                <div class="block-room-booking-content">
                    <?php
                    $cassiopeia_room_room_booking_form = drupal_get_form("cassiopeia_room_room_booking_form",array("room"=>$room,"hotel"=>$hotel,"tx_area"=>$tx_area,'data'=>$_REQUEST));
                    if(!empty($cassiopeia_room_room_booking_form)){
                        $cassiopeia_room_room_booking_form = drupal_render($cassiopeia_room_room_booking_form);
                        echo $cassiopeia_room_room_booking_form;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>