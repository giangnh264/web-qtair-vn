<?php
//$image_url = image_style_url($image_style,"public://no-image.png");
$node = $variables['node'];
$image_style = !empty($variables['image_style']) ? $variables['image_style'] : 'original';
?>

<div class="card card-type-3 no-shadow">
    <div class="card-img">
        <?php
        if (!empty($node->field_image['und'][0])) {
            $node_img = (array) $node->field_image['und'][0];
            $node_img['style_name'] = $image_style;
            $node_img['path'] = $node_img['uri'];
            $node_img = theme('image_style', $node_img);
            print(l($node_img, 'node/' . $node->nid, array('html' => TRUE)));
        }
        ?>
    </div>
    <div class="card-info">
        <h3 class="card-title">
            <?php print(l($node->title, "node/" . $node->nid, array("html" => TRUE, "attributes" => array("class" => array("title ff-semibold clr-black"))))); ?>
        </h3>

        <div class="calendar mt-2">
            <img src="/sites/all/themes/cassiopeia_theme/img/icons/calendar.svg" class="img-responsive icon" alt="" />
            <span><?php echo date("d/m/Y", $node->created); ?></span>
        </div>

        <div class="card-synop mt-2">
            <div class="paragraph">
                <?php echo !empty($node->body['und'][0]['summary']) ? $node->body['und'][0]['summary'] : ""; ?>
            </div>
        </div>
        <?php print(l("Xem chi tiết &rarr;", "node/" . $node->nid, array("html" => TRUE, "attributes" => array("class" => array("d-block clr-dark mt-2"))))); ?>
    </div>
</div>