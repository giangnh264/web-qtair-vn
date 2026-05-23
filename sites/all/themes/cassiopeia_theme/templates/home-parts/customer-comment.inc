<?php
$conditions = array();
$conditions['status'] = array(
    "type"      => "propertyCondition",
    "value"     => 1,
    "condition" => "=",
);
$conditions['created'] = array(
    "type"      => "propertyOrderBy",
    "direction" => "DESC",
);
$comments = cassiopeia_get_items_by_conditions($conditions,"customer_comment","node");
?>
<?php if(!empty($comments)): ?>
    <div class="customer-comment">
        <div class="block-container container">
            <div class="block-title">
                <h2 class="title-type-1"><?php print(t("What do customer say about Autic.vn")); ?></h2>
            </div>
            <div class="customer-comment-slider owl-theme owl-carousel">
                <?php foreach($comments as $comment): ?>
                    <div class="slider-item">
                        <div class="comment-group">
                            <div class="comment-image">
                                <?php
                                if (!empty($comment->field_image['und'][0])) {
                                    $node_img = (array) $comment->field_image['und'][0];
                                    $node_img['style_name'] = "style_75x75";
                                    $node_img['path'] = $node_img['uri'];
                                    $node_img = theme('image_style', $node_img);
                                    print($node_img);
                                }
                                ?>
                            </div>
                            <div class="comment-title">
                                <?php print($comment->title); ?>
                            </div>
                        </div>
                        <div class="comment-content">
                            <div>
                                <?php if(!empty($comment->body['und'][0]['value'])) print($comment->body['und'][0]['value']); ?>
                            </div>
                        </div>
<!--                        <div class="comment-rating">-->
<!--                            --><?php //for($i=0;$i<$comment->field_rating_score['und'][0]['value'];$i++): ?>
<!--                                <span class="fa fa-star"></span>-->
<!--                            --><?php //endfor; ?>
<!--                            --><?php //if($comment->field_rating_score['und'][0]['value'] < 5): ?>
<!--                                --><?php //for($i=0;$i<5-$comment->field_rating_score['und'][0]['value'];$i++): ?>
<!--                                    <span class="fa fa-star-o"></span>-->
<!--                                --><?php //endfor; ?>
<!--                            --><?php //endif; ?>
<!--                        </div>-->
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
