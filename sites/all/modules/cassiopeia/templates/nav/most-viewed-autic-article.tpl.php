<div class="nav-block block-most-viewed-articles">
    <?php
    global $language;
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
    $conditions['language'] = array(
        "type"      => "propertyCondition",
        "value"     => $language->language,
        "condition" => "=",
    );
    $conditions['field_most_view'] = array(
        "type"      => "fieldCondition",
        "key"       => "value",
        "value"     => 1,
        "condition" => "=",
    );
    $conditions['range'] = array(
        "type"      => "range",
        "start"     => 0,
        "limit"     => 5,
    );
    $articles = cassiopeia_get_items_by_conditions($conditions,"autic_family","node");
    ?>
    <div class="block-inner">
        <div class="block-title">
            <h2><?php print(t("Xem nhiều nhất")); ?></h2>
        </div>
        <div class="block-content">
            <?php if(!empty($articles)): ?>
                <?php foreach($articles as $article): ?>
                    <div class="block-item">
                        <?php print(_cassiopeia_render_theme("module","cassiopeia","templates/parts/article-type-3.tpl.php",array("node"=>$article,"image_style"=>"style_120x76"))); ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>