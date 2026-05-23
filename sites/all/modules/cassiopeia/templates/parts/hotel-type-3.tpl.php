<?php
//$image_url = image_style_url($image_style,"public://no-image.png");
$hotel = $variables['hotel'];
$node = node_load($hotel->nid);
//_print_r($_SESSION['booking_room']['start_date']);
$image_style = !empty($variables['image_style'])? $variables['image_style'] : 'original';
//$price = getMinPriceByHotelByDate(  $_SESSION['booking_room']['start_date'],  $_SESSION['booking_room']['end_date'],$node->nid);
//_print_r($price);
?>
<div class="hotel-type-1">
    <div class="node-container">
        <div class="node-image">
            <?php
            if (!empty($node->field_image['und'][0])) {
                $node_img = (array) $node->field_image['und'][0];
                $node_img['style_name'] = $image_style;
                $node_img['path'] = $node_img['uri'];
                $node_img = theme('image_style', $node_img);
                print(l($node_img, 'node/'.$node->nid, array('html'=>TRUE)));
            }
            ?>
        </div>
        <div class="node-info">
            <div class="node-title">
                <?php print(l($node->title, 'node/'.$node->nid, array('html'=>TRUE))); ?>
            </div>
            <div class="node-ranking">
                <?php for($i=1;$i<=$node->field_hotel_ranking['und'][0]['value'];$i++): ?>
                    <i class="fa fa-star"></i>
                <?php endfor; ?>
            </div>
            <div class="node-address">
                <img src="/sites/all/themes/cassiopeia_theme/img/hotel/icon-location.jpg" alt=""> <?php echo(!empty($node->field_address['und'][0]['value'])?$node->field_address['und'][0]['value']:""); ?>
            </div>
            <div class="node-convenient">
                <?php if(!empty($node->field_convenient['und'])): ?>
                    <?php
                    $show = array_slice($node->field_convenient['und'],0,2);
                    $other = array_slice($node->field_convenient['und'],2);
                    ?>
                    <?php foreach($show as $item): ?>
                        <span>
                            <img src="/sites/all/themes/cassiopeia_theme/img/hotel/icon-check.png" alt=""> <?php echo(node_load($item['nid'])->title); ?>
                        </span>
                    <?php endforeach; ?>
                    <?php if(!empty($other)): ?>
                        <span>
                             +<?php echo(count($other)); ?> tiện ích
                        </span>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <div class="node-price">
                <div>
                    <?php if(!empty($hotel->_price)): ?>
                        Giá chỉ từ: <span class="price"><?php echo(number_format($hotel->_price,0,",",".")); ?> đ</span>
                    <?php endif; ?>
                </div>
                <div class="buttons">
                    <?php echo(l("Xem chi tiết","node/".$node->nid,array("html"=>TRUE))); ?>
                </div>
            </div>
        </div>
    </div>
</div>