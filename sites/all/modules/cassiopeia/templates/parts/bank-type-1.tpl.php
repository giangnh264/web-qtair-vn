<?php
//$image_url = image_style_url($image_style,"public://no-image.png");
$node = $variables['node'];
$image_style = !empty($variables['image_style'])? $variables['image_style'] : 'original';
?>
<div class="bank-item">
    <div class="bank-item-logo">
        <?php
        if (!empty($node->field_image['und'][0])) {
            $node_img = (array) $node->field_image['und'][0];
            $node_img['style_name'] = "original";
            $node_img['path'] = $node_img['uri'];
            $node_img = theme('image_style', $node_img);
            print($node_img);
        }
        ?>
    </div>
    <div class="bank-item-info">
        <?php echo $node->body['und'][0]['value']; ?>
    </div>
</div>