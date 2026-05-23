<?php $node = $variables['node']; ?>

<div class="node-gift">
    <div class="node-title">
        <h2><?php echo($node->title); ?></h2>
    </div>
    <div class="block-top">
        <div class="row">
            <div class="col-md-6">
                <?php
                if (!empty($node->field_image['und'][0])) {
                    $node_img = (array) $node->field_image['und'][0];
                    $node_img['style_name'] = "style_371x251";
                    $node_img['path'] = $node_img['uri'];
                    $node_img = theme('image_style', $node_img);
                    print($node_img);
                }
                ?>
            </div>
            <div class="col-md-6">
                <div class="node-title">
                    <?php echo($node->title); ?>
                </div>
                <div class="node-point">
                    <?php echo($node->field_gift_point['und'][0]['value']); ?> điểm
                </div>
                <div class="node-button">
                    <input type="number" min="1" value="1"> <button class="btn-get-gift" data-nid="<?php echo($node->nid); ?>">Đổi quà</button>
                </div>
            </div>
        </div>
    </div>
    <div class="block-2">
        <div class="block-title">
            Chi tiết quà tặng
        </div>
        <div class="block-inner">
            <?php if(!empty($node->body['und'][0]['value'])) print($node->body['und'][0]['value']); ?>
        </div>
    </div>
</div>
