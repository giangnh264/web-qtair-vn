<?php
$node = $variables['node'];
?>
<div class="swiper swiper-container-fade swiper-container-horizontal">
    <div class="swiper-wrapper">
        <div class="swiper-slide"">
            <?php
            if (!empty($node->field_banner['und'][0])) {
                $node_img = (array) $node->field_banner['und'][0];
                $node_img['style_name'] = "style_1900x595";
                $node_img['path'] = $node_img['uri'];
                $node_img = theme('image_style', $node_img);
                print($node_img);
            }
            ?>
        </div>
    </div>
    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
</div>

<div class="page page-detail">
    <div class="page-container container">
        <div class="page-inner">
            <div class="qt-news-detail mt-3">
                <div class="detail-block">
                    <h1 class="heading heading-tertiary clr-gray ff-black">
                        <?php echo $node->title; ?>
                    </h1>
                    <div class="h-line mt-2 mb-2"></div>

                    <div class="detail-block-content paragraph">
                        <?php echo !empty($node->body['und'][0]['value'])?$node->body['und'][0]['value']:""; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>