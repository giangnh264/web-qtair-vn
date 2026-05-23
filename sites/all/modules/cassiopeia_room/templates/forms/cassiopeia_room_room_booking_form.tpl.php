<?php
//_print_r($_REQUEST);
$room = $form['#room'];
$hotel = $form['#hotel'];
$tx_area = $form['#tx_area'];
$ratings = cassiopeia_room_hotel_rating_load($hotel->nid);
$_ratings = $ratings['ratings'];
$room_price = $form['#room_price'];
$total_price = $form['#total_price'];
?>
<div class="form-booking">
    <div class="row">
        <div class="col-md-8">
            <!--  -->
            <div class="box-form-booking mb-3">
                <div class="box-form-booking-header d-flex alg-center mb-3">
                    <img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-booking-user.png" alt="">
                    <h3>Thông tin khách hàng</h3>
                </div>
                <div class="box-form-booking-body bg-form-booking form-qt">
                    <div class="row">
                        <div class="col-md-12 col-md-qt mb-3">
                            <?php echo drupal_render($form['customer']['full_name']); ?>
                        </div>
                        <div class="col-md-5 col-md-qt mb-3">
                            <?php echo drupal_render($form['customer']['tel']); ?>
                        </div>
                        <div class="col-md-7 col-md-qt mb-3">
                            <?php echo drupal_render($form['customer']['mail']); ?>
                        </div>
                        <div class="col-md-5 col-md-qt mb-3">
                            <?php echo drupal_render($form['customer']['province']); ?>
                        </div>
                        <div class="col-md-7 col-md-qt mb-3">
                            <?php echo drupal_render($form['customer']['address']); ?>
                        </div>
                        <div class="col-md-12 col-md-qt mb-3">
                            <?php echo drupal_render($form['customer']['note']); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <?php if(!empty($form['contact'])): ?>
                <div class="box-form-booking mb-3">
                    <div class="box-form-booking-header d-flex alg-center mb-3">
                        <img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-booking-user.png" alt="">
                        <h3>Thông tin liên hệ</h3>
                    </div>
                    <div class="box-form-booking-body bg-form-booking form-qt">
                        <div class="row">
                            <div class="col-md-12 col-md-qt mb-3">
                                <?php echo drupal_render($form['contact']['full_name']); ?>
                            </div>
                            <div class="col-md-5 col-md-qt mb-3">
                                <?php echo drupal_render($form['contact']['tel']); ?>
                            </div>
                            <div class="col-md-7 col-md-qt mb-3">
                                <?php echo drupal_render($form['contact']['mail']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <!--  -->
            <div class="box-form-booking">
                <div class="box-form-booking-header d-flex alg-center mb-3">
                    <img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-booking-pay.png" alt="">
                    <h3>Hình thức thanh toán</h3>
                </div>
                <div class="box-form-booking-body">
                    <?php echo drupal_render($form['payment']['method']); ?>
                    <span>* Bằng việc chọn thanh toán, tôi xác nhận đã đọc và đồng ý với Điều khoản và Điều kiện của QTair</span>
                </div>
            </div>
            <!--  -->
            <div class="btn-booking form-qt-btn d-flex jsc-center mt-3">
                <?php echo drupal_render($form['submit']); ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="infor-room-booking">
                <div class="infor-room-booking-header">
                                        <span>
                                            <i class="fa-light fa-bed-front"></i>
                                        </span>
                    <span>Thông tin phòng</span>
                </div>
                <div class="infor-room-booking-content">
                    <div class="img-room-booking">
                        <?php
                        if (!empty($hotel->field_image['und'][0])) {
                            $node_img = (array) $hotel->field_image['und'][0];
                            $node_img['style_name'] = "style_320x250";
                            $node_img['path'] = $node_img['uri'];
                            $node_img = theme('image_style', $node_img);
                            echo l($node_img,"node/".$hotel->nid,array("html"=>TRUE));
                        }
                        ?>
                    </div>
                    <div class="info-room-booking line-booking">
                        <h3 class="card-title">
                            <?php
                            echo l($hotel->title,"node/".$hotel->nid,array("html"=>TRUE));
                            ?>
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
                            <span><?php echo $_REQUEST['check-in']; ?></span>
                        </div>
                        <div class="date-booking-item">
                            <span>Ngày trả phòng</span>
                            <span><?php echo $_REQUEST['check-out']; ?></span>
                        </div>
                        <div class="date-booking-item">
                            <span>Số đêm</span>
                            <span><?php echo $_REQUEST['number_of_night'] ?> đêm</span>
                        </div>
                    </div>
                    <div class="price-booking">
                        <div class="d-flex alg-center jsc-between">
                            <span><?php echo $room->title; ?></span>
                            <span> x<?php echo $_REQUEST['quantity']; ?></span>
                        </div>
                        <div class="d-flex alg-center jsc-between">
                            <span>Giá tạm tính</span>
                            <span><?php echo number_format($form['#total_price'],0,",","."); ?> VNĐ</span>
                        </div>
                        <span>(Đã bao gồm phí dịch vụ)</span>
                    </div>
                    <?php if(!empty($form['#alefee'])): ?>
                        <div class="mt-5px">
                            <div class="d-flex alg-center jsc-between">
                                <b>Phí thanh toán:</b>
                                <b><?php echo number_format($form['#alefee'],0,",","."); ?> VNĐ</b>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="discount-booking d-flex alg-center jsc-between line-booking">
                        <?php if(!empty($form['promotion'])): ?>
                            <span>Mã khuyến mại </span>
                            <input type="text" name="" id="" placeholder="Nhập mã khuyến mại">
                        <?php endif; ?>
                    </div>
                    <div class="total-booking">
                        <div>
                            <span>Tổng cộng:</span>
                            <span><?php echo number_format($form['#total_price']+$form['#alefee'],0,",","."); ?> VNĐ</span>
                        </div>
                        <span>(Đã bao gồm thuế VAT)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div id="modalTopup" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Nạp tiền vào ví Quang Trang</h4>
            </div>
            <div class="modal-body">
                <div>
                    <?php echo drupal_render($form['bank']); ?>
                </div>
                <div class="d-flex justify-center">
                    <?php echo drupal_render($form['topup']); ?>
                </div>
            </div>
        </div>

    </div>
</div>
<?php echo drupal_render_children($form); ?>

