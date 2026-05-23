<?php
//$image_url = image_style_url($image_style,"public://no-image.png");
$node = $variables['node'];
$image_style = !empty($variables['image_style'])? $variables['image_style'] : 'original';
?>
<div class="article-type-4 article-type-6">
    <div class="article-type-4-container">
        <div class="article-image">
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
        <div class="article-info">
            <div class="article-title">
                <?php print(l($node->title,"node/".$node->nid,array("html"=>TRUE))); ?>
            </div>
<!--            <div class="article-created-date">-->
<!--                <i class="fa fa-calendar"></i> --><?php //print(date("d/m/Y",$node->created)); ?>
<!--            </div>-->
            <div class="article-des">
                <?php print(!empty($node->body['und'][0]['summary'])?$node->body['und'][0]['summary']:""); ?>
            </div>
<!--            <div class="button">-->
<!--                --><?php //print(l("Xem chi tiết","node/".$node->nid,array("html"=>TRUE))); ?>
<!--            </div>-->
        </div>
    </div>
</div>