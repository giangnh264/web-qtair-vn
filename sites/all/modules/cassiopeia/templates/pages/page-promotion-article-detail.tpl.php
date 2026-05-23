<?php $node = $variables['node']; ?>
<div class="page-article-detail">
    <div class="page-article-detail-container page-container container">
<!--        --><?php //print(_cassiopeia_render_theme("module","cassiopeia","templates/forms/search-fly-form-type-1.tpl.php")); ?>
        <div class="page-inner row">
            <div class="left-block col-md-8">
                <div class="node-title">
                    <h1><?php print($node->title); ?></h1>
                </div>
                <div class="node-created">
                    <span class="fa fa-calendar"></span> <?php print(date("d/m/Y",$node->created)); ?>
                </div>
                <div class="node-content">
                    <?php if(!empty($node->body['und'][0]['value'])) print($node->body['und'][0]['value']); ?>
                </div>
            </div>
            <div class="right-block col-md-4 custom-nav-bar">
                <div class="custom-nav-bar-banner mb-30">
                    <a href="#">
                        <img src="/sites/all/themes/cassiopeia_theme/img/family-sibar-banner.png" alt="">
                    </a>
                </div>
                <!-- <?php print(_cassiopeia_render_theme("module","cassiopeia","templates/nav/article-search.tpl.php")); ?> -->
                <?php print(_cassiopeia_render_theme("module","cassiopeia","templates/nav/tx-autic-article.tpl.php")); ?>
                <?php print(_cassiopeia_render_theme("module","cassiopeia","templates/nav/most-viewed-autic-article.tpl.php")); ?>
<!--                --><?php //print(_cassiopeia_render_theme("module","cassiopeia","templates/nav/related-to-article.tpl.php",array("node"=>$node))); ?>
                <?php print(_cassiopeia_render_theme("module","cassiopeia","templates/nav/promotion-article.tpl.php")); ?>
            </div>
        </div>
    </div>
</div>