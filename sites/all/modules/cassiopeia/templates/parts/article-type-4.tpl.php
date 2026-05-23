<?php
//$image_url = image_style_url($image_style,"public://no-image.png");
$node = $variables['node'];
$image_style = !empty($variables['image_style'])? $variables['image_style'] : 'original';
?>
<div class="card card-type-4">
    <div class="card-img">
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
    <div class="card-info">
        <h3 class="card-title">
            <?php echo(l($node->title,"node/".$node->nid,array("html"=>TRUE))); ?>
        </h3>
        <div class="card-utils">
            <div class="calendar">
                <img
                        src="/sites/all/themes/cassiopeia_theme/img/icons/calendar.svg"
                        class="img-responsive icon"
                        alt=""
                />
                <span><?php print(date("d/m/Y",$node->created)); ?></span>
            </div>
        </div>
    </div>
</div>