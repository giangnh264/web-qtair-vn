<?php
$hotel = node_load($booking->hotel);
$room = $booking->details[0];
$_room = node_load($room->room);
$ratings = cassiopeia_room_hotel_rating_load($hotel->nid);
$_ratings = $ratings['ratings'];
$tx_area = !empty($hotel->field_tx_area['und'][0]['tid'])?taxonomy_term_load($hotel->field_tx_area['und'][0]['tid']):null;
?>
<div class="box-form-booking">
    <div class="box-form-booking-complete-header mb-3">
        <div class="img-complete d-flex jsc-center mb-2">
            <img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-check.png" alt="">
        </div>
        <div class="title-complete">
            <h3>Gửi yêu cầu đặt phòng thành công </h3>
            <span>Cảm ơn quý khách đã sử dụng dịch vụ tại QTair.
                <?php if($booking->status!=3): ?><br> Chúng tôi đang đặt phòng cho quý khách và liên hệ với quý khách sớm nhất!</span><?php endif; ?>
        </div>
    </div>
    <div class="box-form-booking-complete-body ">
        <!--  -->
        <div class="bg-form-booking mb-3">
            <div class="complete-body-title">
                <span>Thông tin phòng khách sạn </span>
            </div>
            <div class="complete-body-content">
                <div class="info-room-booking line-booking">
                    <h3 class="card-title">
                        <?php echo l($hotel->title,"node/".$hotel->nid,array("class"=>array("title ff-semibold clr-black"),"html"=>TRUE)) ?>
                    </h3>
                    <div class="box-evaluate d-flex alg-center mt-1">
                        <div class="node-ranking">
                            <?php for($i=1;$i<=$hotel->field_hotel_ranking['und'][0]['value'];$i++): ?>
                                <i class="fa fa-star"></i>
                            <?php endfor; ?>
                        </div>
                        <div class="number-evaluate">
                            <span><?php echo $ratings['total_result']->total; ?> đánh giá</span>
                        </div>
                    </div>
                    <div class="convenients">
                        <div class="item-convenients">
                            <img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-location.svg" alt="">
                            <span><?php echo(!empty($hotel->field_address['und'][0]['value'])?$hotel->field_address['und'][0]['value']:""); ?></span>
                        </div>
                    </div>
                </div>
                <div class="date-booking line-booking">
                    <div class="date-booking-item">
                        <span>Ngày nhận phòng</span>
                        <span><?php echo date("d/m/Y",$booking->from_date); ?></span>
                    </div>
                    <div class="date-booking-item">
                        <span>Ngày trả phòng</span>
                        <span><?php echo date("d/m/Y",$booking->to_date); ?></span>
                    </div>
                    <div class="date-booking-item">
                        <span>Số đêm</span>
                        <span><?php echo $room->number_of_night; ?> đêm</span>
                    </div>
                </div>
                <div class="price-booking line-booking">
                    <div class="d-flex alg-center jsc-between">
                        <span>Phòng: <?php echo l($_room->title,"node/".$_room->nid,array("html"=>TRUE)); ?></span>
                        <span> x<?php echo $room->number_of_room; ?></span>
                    </div>
                    <div class="d-flex alg-center jsc-between">
                        <span>Giá tạm tính</span>
                        <span><?php echo number_format($booking->total_price,0,",","."); ?> VNĐ</span>
                    </div>
                    <span>(Đã bao gồm phí dịch vụ)</span>
                </div>
                <?php if(!empty($booking->alefee)): ?>
                    <div class="mt-5px line-booking">
                        <div class="d-flex alg-center jsc-between">
                            <b>Phí thanh toán:</b>
                            <b><?php echo number_format($booking->alefee,0,",","."); ?> VNĐ</b>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="total-booking">
                    <div>
                        <span>Tổng cộng:</span>
                        <span><?php echo number_format($booking->total_price+$booking->alefee,0,",","."); ?> VNĐ</span>
                    </div>
                    <span>(Đã bao gồm thuế VAT)</span>
                </div>
            </div>
        </div>
        <!--  -->
        <div class="bg-form-booking mb-3">
            <div class="complete-body-title">
                <span>Thông tin khách hàng (Người nhận phòng)</span>
            </div>
            <div class="complete-body-content">
                <div class="box-infor-complete">
                    <div class="">
                        <span>Họ tên</span>
                        <span><?php echo $booking->customer_name;?></span>
                    </div>
                    <div class="">
                        <span>Số điện thoại</span>
                        <span><?php echo $booking->customer_tel;?> </span>
                    </div>
                    <div class="">
                        <span>Email</span>
                        <span><?php echo $booking->customer_mail;?></span>
                    </div>
                    <div class="">
                        <span>Địa chỉ</span>
                        <span><?php echo $booking->customer_address;?></span>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->
        <?php if(!empty($booking->uid)): ?>
            <div class="bg-form-booking">
                <div class="complete-body-title">
                    <span>Thông tin liên hệ</span>
                </div>
                <div class="complete-body-content">
                    <div class="box-infor-complete">
                        <div class="">
                            <span>Họ tên</span>
                            <span><?php echo $booking->contactName;?></span>
                        </div>
                        <div class="">
                            <span>Số điện thoại</span>
                            <span><?php echo $booking->contactTel;?> </span>
                        </div>
                        <div class="">
                            <span>Email</span>
                            <span><?php echo $booking->contactEmail;?></span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<div class=""
     style="box-sizing: border-box; margin-bottom: 24px !important; color: rgb(25, 25, 25); font-family: Roboto-Regular; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;">
    <div class=""
         style="box-sizing: border-box; display: flex; margin-bottom: 16px !important; justify-content: center;"><img
                src="https://qtair.vn/sites/all/themes/cassiopeia_theme/img/icons/icon-check.png" alt=""
                style="margin: 0 auto 0 0; display: block; box-sizing: border-box; border: 0px; max-width: 100%;"></div>
    <div class="" style="box-sizing: border-box;">
        <h3 style="box-sizing: border-box; font-family: Roboto-Semibold; font-weight: 500; line-height: 1.1; color: rgb(6, 153, 80); margin-top: 20px; margin-bottom: 10px; font-size: 20px; text-align: center;">
            Gửi y&ecirc;u cầu đặt ph&ograve;ng th&agrave;nh c&ocirc;ng</h3><span
                style="box-sizing: border-box; display: flex; color: rgb(57, 71, 69); line-height: 22px; text-align: center; justify-content: center;">Cảm ơn qu&yacute; kh&aacute;ch đ&atilde; sử dụng dịch vụ tại QTair.<br
                    style="box-sizing: border-box;">Ch&uacute;ng t&ocirc;i đang đặt ph&ograve;ng cho qu&yacute; kh&aacute;ch v&agrave; li&ecirc;n hệ với qu&yacute; kh&aacute;ch sớm nhất!</span>
    </div>
</div>
<div class=""
     style="box-sizing: border-box; color: rgb(25, 25, 25); font-family: Roboto-Regular; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;">
    <div class=""
         style="box-sizing: border-box; margin-bottom: 24px !important; padding: 24px; background: rgb(255, 255, 255); border: 1px solid rgb(235, 240, 239); box-shadow: rgba(0, 0, 0, 0.08) 0px 4px 8px; border-radius: 8px;">
        <div class=""
             style="box-sizing: border-box; font-family: Roboto-Medium; font-size: 18px; color: rgb(57, 71, 69); margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid rgb(235, 240, 239);">
            <span style="box-sizing: border-box;">Th&ocirc;ng tin ph&ograve;ng kh&aacute;ch sạn</span></div>
        <div class="" style="box-sizing: border-box;">
            <div class=""
                 style="box-sizing: border-box; margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid rgb(235, 240, 239);">
                <h3 class=""
                    style="box-sizing: border-box; font-family: inherit; font-weight: 500; line-height: 1.1; color: inherit; margin-top: 12px; margin-bottom: 10px; font-size: 24px;">
                    <br></h3>
                <div class=""
                     style="box-sizing: border-box; display: flex; margin-top: 8px !important; align-items: center;">
                    <div class=""
                         style="box-sizing: border-box; position: relative; padding-right: 20px; display: flex; gap: 6px; color: rgb(255, 173, 31) !important;">
                        <br></div>
                    <div class="" style="box-sizing: border-box; color: rgb(113, 122, 120);"><span
                                style="box-sizing: border-box;">0 đ&aacute;nh gi&aacute;</span></div>
                </div>
                <div class=""
                     style="box-sizing: border-box; margin-top: 12px; display: flex; flex-wrap: wrap; gap: 4px 16px;">
                    <div class=""
                         style="box-sizing: border-box; display: flex; align-items: start; gap: 8px; color: rgb(57, 71, 69);">
                        <img src="https://qtair.vn/sites/all/themes/cassiopeia_theme/img/icons/icon-location.svg" alt=""
                             style="margin: 0 auto 0 0; display: block; box-sizing: border-box; border: 0px; max-width: 100%; width: unset !important;">
                    </div>
                </div>
            </div>
            <div class=""
                 style="box-sizing: border-box; margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid rgb(235, 240, 239); display: flex; flex-direction: column; gap: 5.5px;">
                <div class=""
                     style="box-sizing: border-box; display: flex; justify-content: space-between; line-height: 21px; color: rgb(90, 102, 99);">
                    <span style="box-sizing: border-box;">Ng&agrave;y nhận ph&ograve;ng</span><span
                            style="box-sizing: border-box; color: rgb(0, 38, 32);">13/05/2023</span></div>
                <div class=""
                     style="box-sizing: border-box; display: flex; justify-content: space-between; line-height: 21px; color: rgb(90, 102, 99);">
                    <span style="box-sizing: border-box;">Ng&agrave;y trả ph&ograve;ng</span><span
                            style="box-sizing: border-box; color: rgb(0, 38, 32);">16/05/2023</span></div>
                <div class=""
                     style="box-sizing: border-box; display: flex; justify-content: space-between; line-height: 21px; color: rgb(90, 102, 99);">
                    <span style="box-sizing: border-box;">Số đ&ecirc;m</span><span
                            style="box-sizing: border-box; color: rgb(0, 38, 32);">3 đ&ecirc;m</span></div>
            </div>
            <div class=""
                 style="box-sizing: border-box; margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid rgb(235, 240, 239);">
                <div class=""
                     style="box-sizing: border-box; display: flex; align-items: center; justify-content: space-between; margin-bottom: 4px; font-family: Roboto-Semibold; line-height: 21px; color: rgb(0, 38, 32);">
                    <span style="box-sizing: border-box; width: 390px; font-family: Roboto-Bold; font-size: 16px; line-height: 21px; color: rgb(6, 153, 80);">Ph&ograve;ng:</span><span
                            style="box-sizing: border-box;">x2</span></div>
                <div class=""
                     style="box-sizing: border-box; display: flex; align-items: center; justify-content: space-between; font-family: Roboto-Semibold; line-height: 24px; color: rgb(57, 71, 69);">
                    <span style="box-sizing: border-box;">Gi&aacute; tạm t&iacute;nh</span><span
                            style="box-sizing: border-box;">1.700.000 VNĐ</span></div>
                <span style="box-sizing: border-box; color: rgb(90, 102, 99);">(Đ&atilde; bao gồm ph&iacute; dịch vụ)</span>
            </div>
            <div class="total-booking" style="box-sizing: border-box;">
                <div style="box-sizing: border-box; font-family: Roboto-Semibold; font-size: 16px; line-height: 24px; color: rgb(57, 71, 69); display: flex; justify-content: space-between; align-items: center;">
                    <span style="box-sizing: border-box;">Tổng cộng:</span><span
                            style="box-sizing: border-box; font-family: Roboto-Bold; font-size: 20px; color: rgb(6, 153, 80);">1.700.000 VNĐ</span>
                </div>
                <span style="box-sizing: border-box;">(Đ&atilde; bao gồm thuế VAT)</span>
            </div>
        </div>
    </div>
    <div class=""
         style="box-sizing: border-box; margin-bottom: 24px !important; padding: 24px; background: rgb(255, 255, 255); border: 1px solid rgb(235, 240, 239); box-shadow: rgba(0, 0, 0, 0.08) 0px 4px 8px; border-radius: 8px;">
        <div class=""
             style="box-sizing: border-box; font-family: Roboto-Medium; font-size: 18px; color: rgb(57, 71, 69); margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid rgb(235, 240, 239);">
            <span style="box-sizing: border-box;">Th&ocirc;ng tin kh&aacute;ch h&agrave;ng (Người nhận ph&ograve;ng)</span>
        </div>
        <div class="" style="box-sizing: border-box;">
            <div class=""
                 style="box-sizing: border-box; display: grid; grid-template-columns: repeat(2, 1fr); row-gap: 15px;">
                <div class=""
                     style="box-sizing: border-box; font-size: 12px; line-height: 18px; color: rgb(90, 102, 99); display: flex; flex-direction: column;">
                    <span style="box-sizing: border-box;">Họ t&ecirc;n</span><span
                            style="box-sizing: border-box; font-family: Roboto-Medium; font-size: 14px; line-height: 21px; color: rgb(57, 71, 69);">qQq</span>
                </div>
                <div class=""
                     style="box-sizing: border-box; font-size: 12px; line-height: 18px; color: rgb(90, 102, 99); display: flex; flex-direction: column;">
                    <span style="box-sizing: border-box;">Số điện thoại</span><span
                            style="box-sizing: border-box; font-family: Roboto-Medium; font-size: 14px; line-height: 21px; color: rgb(57, 71, 69);">Q</span>
                </div>
                <div class=""
                     style="box-sizing: border-box; font-size: 12px; line-height: 18px; color: rgb(90, 102, 99); display: flex; flex-direction: column;">
                    <span style="box-sizing: border-box;">Email</span><span
                            style="box-sizing: border-box; font-family: Roboto-Medium; font-size: 14px; line-height: 21px; color: rgb(57, 71, 69);">Q</span>
                </div>
                <div class=""
                     style="box-sizing: border-box; font-size: 12px; line-height: 18px; color: rgb(90, 102, 99); display: flex; flex-direction: column;">
                    <span style="box-sizing: border-box;">Địa chỉ</span><span
                            style="box-sizing: border-box; font-family: Roboto-Medium; font-size: 14px; line-height: 21px; color: rgb(57, 71, 69);">Q</span>
                </div>
            </div>
        </div>
    </div>
    <div class=""
         style="box-sizing: border-box; padding: 24px; background: rgb(255, 255, 255); border: 1px solid rgb(235, 240, 239); box-shadow: rgba(0, 0, 0, 0.08) 0px 4px 8px; border-radius: 8px;">
        <div class=""
             style="box-sizing: border-box; font-family: Roboto-Medium; font-size: 18px; color: rgb(57, 71, 69); margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid rgb(235, 240, 239);">
            <span style="box-sizing: border-box;">Th&ocirc;ng tin li&ecirc;n hệ</span></div>
        <div class="" style="box-sizing: border-box;">
            <div class=""
                 style="box-sizing: border-box; display: grid; grid-template-columns: repeat(2, 1fr); row-gap: 15px;">
                <div class=""
                     style="box-sizing: border-box; font-size: 12px; line-height: 18px; color: rgb(90, 102, 99); display: flex; flex-direction: column;">
                    <span style="box-sizing: border-box;">Họ t&ecirc;n</span><span
                            style="box-sizing: border-box; font-family: Roboto-Medium; font-size: 14px; line-height: 21px; color: rgb(57, 71, 69);">IT01</span>
                </div>
                <div class=""
                     style="box-sizing: border-box; font-size: 12px; line-height: 18px; color: rgb(90, 102, 99); display: flex; flex-direction: column;">
                    <span style="box-sizing: border-box;">Số điện thoại</span><span
                            style="box-sizing: border-box; font-family: Roboto-Medium; font-size: 14px; line-height: 21px; color: rgb(57, 71, 69);">administrator</span>
                </div>
                <div class=""
                     style="box-sizing: border-box; font-size: 12px; line-height: 18px; color: rgb(90, 102, 99); display: flex; flex-direction: column;">
                    <span style="box-sizing: border-box;">Email</span><span
                            style="box-sizing: border-box; font-family: Roboto-Medium; font-size: 14px; line-height: 21px; color: rgb(57, 71, 69);">huutrungdc@mail.com</span>
                </div>
            </div>
        </div>
    </div>
</div>