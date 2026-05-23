<?php
//$image_url = image_style_url($image_style,"public://no-image.png");
$node = $variables['node'];
$image_style = !empty($variables['image_style'])? $variables['image_style'] : 'original';


?>
<div class="hotel-type-2">
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
            <div class="convenients">
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
            <div class="div node-price">
                <?php $price = getMinPriceByHotel($node->nid); ?>
                <div>
                    Giá chỉ từ: <span><?php echo(!empty($price)?number_format($price->price,0,",","."):""); ?> đ</span>
                </div>
                <div class="buttons">
                    <?php print(l("Đặt ngay", 'node/'.$node->nid, array('html'=>TRUE))); ?>
                </div>
            </div>
        </div>
    </div>
</div>