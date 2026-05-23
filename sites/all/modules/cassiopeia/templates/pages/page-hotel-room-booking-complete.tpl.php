<?php
if(empty($booking)){
    drupal_goto("hotel");
}
$hotel = node_load($booking->hotel);
$tx_area = !empty($hotel->field_tx_area['und'][0]['tid'])?taxonomy_term_load($hotel->field_tx_area['und'][0]['tid']):null;

?>
<div class="page-hotel-room-booking-complete">
    <div class="page-room-booking-complete-container container">
        <div class="page-room-booking-complete-inner">
            <!-- breadcrumb -->
            <div class="breadcrumb-container">
                <div class="page-top-block">
                    <div class="step">
                        <div class="step-1 active">
                            <a href="/">Trang chủ</a>
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
                    <div class="order-step step-2">
                        <label for="">
                            <span><i class="fa-solid fa-check"></i></span>
                            Thanh toán 
                        </label>
                    </div>
                    <div class="order-step step-3 active">
                        <label for="">
                            <span>3</span>
                            Hoàn tất
                        </label>
                    </div>
                </div>
            </div>
            <!-- room-booking-complete -->
            <div class="block-room-booking-complete">
                <div class="block-room-booking-complete-content">
                    <!--  -->
                    <?php echo _cassiopeia_render_theme("module","cassiopeia","templates/mail/room-booking-mail.tpl.php",array("booking"=>$booking)); ?>
                    <!--  -->
                    <div class="btn-booking form-qt-btn d-flex jsc-center mt-3">
                        <a href="/">Quay về trang chủ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>