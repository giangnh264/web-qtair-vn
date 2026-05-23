<?php

?>
<div class="form-detail-hotel">
    <div class="itinerary">
        <div class="search-fly-form-departure-date">
            <div class="input-fn">
                <label for="">Nhận phòng</label>
                <?php echo drupal_render($form['check-in']); ?>
                <i class="fa-light fa-calendar-lines"></i>
            </div>
        </div>
        <div class="search-fly-number-night">
            <div class="input-fn">
                <label for="">Số đêm</label>
                <?php echo drupal_render($form['night_count']); ?>
                <!--                        <input id="number_of_night" name="number_of_night" type="number" class="form-control number_of_night" value="--><?php //echo $nights; ?><!--" placeholder="Số đêm">-->
                <i class="fa-light fa-timer"></i>
            </div>
        </div>
        <div class="search-fly-form-departure-date">
            <div class="input-fn">
                <label for="">Trả phòng</label>
                <?php echo drupal_render($form['check-out']); ?>
                <i class="fa-light fa-calendar-lines"></i>
            </div>
        </div>
        <div class="search-customer-quantity">
            <label for="">Số khách</label>
            <div class="text">
                <span class="fa-light fa-user mr-1"></span> <span class="guest-count"><?php echo $_SESSION['hotel-search']['adult']; ?>&nbsp;</span> Khách
            </div>
            <div class="extend-block">
                <div class="adult item quantity-change" data-min="1">
                    <div>
                        <?php echo drupal_render($form['adult']); ?> Người lớn
                    </div>
                    <div class=" d-flex">
                        <i class="fa fa-minus"></i><i class="fa fa-plus"></i>
                    </div>
                </div>
                <div class="children item quantity-change" data-min="0">
                    <div>
                        <?php echo drupal_render($form['children']); ?> Trẻ em
                    </div>
                    <div class=" d-flex"><i class="fa fa-minus"></i><i class="fa fa-plus"></i></div>
                </div>
            </div>
        </div>
        <div class="search-room-quantity">
            <label for="">Số phòng</label>
            <div class="text">
                <span class="fa-regular fa-bed-empty mr-1"></span>
                <div class="room item quantity-change" data-min="1">
                    <?php echo drupal_render($form['room_count']); ?>
                    <div class=" d-flex"><i class="fa fa-minus"></i><i class="fa fa-plus"></i></div>
                </div>
            </div>
        </div>
        <div class="search-fly-form-actions clearfix">
            <button type="submit" class="btn btn-default">Xem giá</button><br>
        </div>
    </div>
</div>
<?php
$conditions = array();
$conditions['status'] = array(
    "type" => "propertyCondition",
    "value" => 1,
    "condition" => "=",
);
$conditions['field_weight']  = array(
    "type"      => "fieldOrderBy",
    "column"    => "value",
    "direction" => "ASC",
);
//                                                                if (!empty($nid)) {
$conditions['field_hotel'] = array(
    "type" => "fieldCondition",
    "key" => "nid",
    "value" => $node->nid,
    "condition" => "=",
);
//                                                                }
$rooms = cassiopeia_get_items_by_conditions($conditions, "room", "node");
foreach ($rooms as & $row) {
    $room_price = getMinPriceByHotelRoomByDate(date("d-m-Y",$check_in),date("d-m-Y",$check_out),$row->nid,$node->nid);
    $row -> room_price = !empty($room_price)?$room_price:null;
}
usort($rooms, 'hotelSortByPrice');
//                                                _print_r($rooms);
?>
<?php if(!empty($rooms)): ?>
    <div class="room-hotel">
        <?php foreach($rooms as $room): ?>
            <?php $room_price = $room->room_price; ?>
            <div class="item">
                <div class="hotel-type-1">
                    <div class="node-container d-flex">
                        <div class="node-image">
                            <?php if(!empty($room->field_image['und'])): ?>
                                <?php
                                $image_url = null;
                                if (!empty($room->field_image['und'][0])) {
                                    $node_img = (array) $room->field_image['und'][0];
                                    $image_url = image_style_url("original",$room->field_image['und'][0]['uri']);
                                    $node_img['style_name'] = "style_264x206";
                                    $node_img['path'] = $node_img['uri'];
                                    $node_img = theme('image_style', $node_img);
                                }
                                ?>
                                <a class="fancy-<?php print($room->nid); ?>" href="<?php print($image_url); ?>" data-fancybox="images" rel="group-<?php print($room->nid); ?>">
                                    <?php print($node_img); ?>
                                </a>
                            <?php
                            $images = $room->field_image['und'];
                            if(!empty($images) && count($images)>1){
                            $_index=1;
                            foreach($images as $image){
                            if($_index<=1){
                            $_index++;
                            continue;
                            ?>
                                <a class="fancy-<?php print($room->nid); ?>" href="<?php print($image_url); ?>" data-fancybox="images" rel="group-<?php print($room->nid); ?>">
                                </a>
                                <?php
                            }else{
                                $image_url = image_style_url("original",$image['uri']);
                                ?>
                                <a class="fancy-<?php print($room->nid); ?>" href="<?php print($image_url); ?>" data-fancybox="images" rel="group-<?php print($room->nid); ?>">
                                </a>
                            <?php
                            }
                            $_index++;
                            }
                            }
                            ?>
                                <script>
                                    jQuery(document).ready(function(){
                                        jQuery('a.fancy-<?php print($room->nid); ?>').fancybox({
                                            margin : [44,0,22,0],
                                            thumbs : {
                                                autoStart : true,
                                                axis      : 'x'
                                            }
                                        });
                                    });
                                </script>
                            <?php endif; ?>
                        </div>
                        <div class="node-info">
                            <div class="box-info">
                                <h3 class="card-title">
                                    <span class="title ff-semibold clr-black"><?php echo $room->title; ?></span>
                                </h3>
                                <div class="detail-hotel-link d-flex alg-center mt-1">
                                    <a href="#" data-toggle="modal" data-target="#room-detail-<?php echo $room->nid; ?>">
                                        <span>Chi tiết phòng</span>
                                        <span>
                                                                                    <i class="fa-regular fa-arrow-right"></i>
                                                                                </span>
                                    </a>
                                </div>
                                <div class="convenients">
                                    <div class="item-convenients">
                                        <img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-house.svg" alt="">
                                        <span><?php echo(!empty($room->field_acreage['und'][0]['value'])?$room->field_acreage['und'][0]['value']:""); ?> m<sup>2</sup></span>
                                    </div>
                                    <div class="item-convenients">
                                        <img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-user.svg" alt="">
                                        <span><?php echo(!empty($room->field_people['und'][0]['value'])?$room->field_people['und'][0]['value']:""); ?></span>
                                    </div>
                                    <div class="item-convenients">
                                        <img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-sea.svg" alt="">
                                        <span><?php echo(!empty($room->field_direction['und'][0]['value'])?$room->field_direction['und'][0]['value']:""); ?></span>
                                    </div>
                                    <div class="item-convenients">
                                        <img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-bed.svg" alt="">
                                        <span><?php echo(!empty($room->field_bed['und'][0]['value'])?$room->field_bed['und'][0]['value']:""); ?></span>
                                    </div>

                                </div>
                                <?php $room_promotions = !empty($room->field_room_promotion['und'])?_cassiopeia_load_collections($room->field_room_promotion['und']):null;?>
                                <?php if(!empty($room_promotions)): ?>
                                    <div class="service">
                                        <?php foreach($room_promotions as $room_promotion):  ?>
                                            <div class="service-item">
                                                                                                <span>
                                                                                                    <i class="fa-solid fa-check"></i>
                                                                                                </span>
                                                <span><?php echo(!empty($room_promotion->field_fc_promotion_content['und'][0]['value'])?$room_promotion->field_fc_promotion_content['und'][0]['value']:""); ?></span>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="node-price-right">
                                <div class="quantity-room d-flex alg-center">
                                    <span class="mr-1">Số phòng </span>
                                    <div class="inp-price d-flex quantity-change" data-min="1">
                                        <i class="fa fa-minus"></i>
                                        <input aria-label="quantity" class="input-qty room-quantity" min="1" max="10" name="" type="number" value="1" data-price="<?php echo $price*$nights; ?>" data-original-price="<?php echo $original_price*$nights; ?>" data-night="<?php echo $nights; ?>">
                                        <i class="fa fa-plus"></i>
                                    </div>
                                </div>
                                <?php if(!empty($room_price)&&!empty($room_price->price)&&$room_price->original_price!=$room_price->price): ?>
                                    <div class="discount">
                                        <span>-<?php echo round(((($room_price->original_price-$room_price->price)/$room_price->original_price))*100) ?>%</span>
                                        <span class="original-price"><?php echo number_format($room_price->original_price*$nights,0,",","."); ?> VNĐ</span>
                                    </div>
                                <?php endif; ?>
                                <div class="price d-flex">
                                    <b class="mr-5">Tổng tiền:</b> <span class=""><?php echo number_format($room_price->price*$nights,0,",","."); ?> VNĐ</span>
                                </div>
                                <div class="room-unit">
                                    /1 phòng/<?php echo $nights; ?> đêm
                                </div>
                                <div class="">
                                    <button class="btn-book btn bg-secondary clr-white text ff-bold radius-36 mt-4" data-room="<?php echo $room->nid; ?>">Đặt ngay</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Trigger the modal with a button -->
            <!--                                                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#room-detail---><?php //echo $room->id; ?><!--">Open Modal</button>-->

            <!-- Modal -->
            <div id="room-detail-<?php echo $room->nid; ?>" class="modal fade" role="dialog">
                <div class="modal-dialog modal-giant">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="owl-theme owl-carousel owl-single">
                                        <?php if(!empty($room->field_images['und'])): ?>
                                            <?php foreach($room->field_images['und'] as $image): ?>
                                                <div class="item">
                                                    <?php
                                                    $image_url = null;
                                                    if (!empty($image)) {
                                                        $node_img = (array) $image;
                                                        $node_img['style_name'] = "style_1131x636";
                                                        $node_img['path'] = $node_img['uri'];
                                                        $node_img = theme('image_style', $node_img);
                                                        echo $node_img;
                                                    }
                                                    ?>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="block-container">
                                        <div class="block-title">
                                            <h4 class="title ff-semibold clr-black"><?php echo $room->title; ?></h4>
                                        </div>
                                        <div>
                                            <div class="">
                                                <div class="mb-10">
                                                    <img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-house.svg" alt="">
                                                    <span>Diện tích: <?php echo(!empty($room->field_acreage['und'][0]['value'])?$room->field_acreage['und'][0]['value']:""); ?> m<sup>2</sup></span>
                                                </div>
                                                <div class="mb-10">
                                                    <img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-user.svg" alt="">
                                                    <span>Tối đa: <?php echo(!empty($room->field_people['und'][0]['value'])?$room->field_people['und'][0]['value']:""); ?></span>
                                                </div>
                                                <div class="mb-10">
                                                    <img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-sea.svg" alt="">
                                                    <span><?php echo(!empty($room->field_direction['und'][0]['value'])?$room->field_direction['und'][0]['value']:""); ?></span>
                                                </div>
                                                <div class="mb-10">
                                                    <img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-bed.svg" alt="">
                                                    <span><?php echo(!empty($room->field_bed['und'][0]['value'])?$room->field_bed['und'][0]['value']:""); ?></span>
                                                </div>

                                            </div>
                                            <div>
                                                <div class="block-title">
                                                    <h4 class="title ff-semibold clr-black">Tiện ích của phòng</h4>
                                                </div>
                                                <div>
                                                    <?php if(!empty($room->field_room_facility['und'])): ?>
                                                        <?php foreach($room->field_room_facility['und'] as $facility): ?>
                                                            <div><i class="fa fa-check"></i> <?php $_facility = node_load($facility['nid']); echo $_facility->title; ?></div>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>