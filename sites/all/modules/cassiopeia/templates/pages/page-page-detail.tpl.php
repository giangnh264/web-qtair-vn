<?php $node = $variables['node']; ?>
<div class="page-article-detail page-page-detail">
    <div class="page-article-detail-container page-container container">
<!--        --><?php //print(_cassiopeia_render_theme("module","cassiopeia","templates/forms/search-fly-form-type-1.tpl.php")); ?>
<!--        <div class="page-inner">-->
            <div class="">
                <div class="node-title">
                    <h1><?php print($node->title); ?></h1>
                </div>
                <div class="node-content">
                    <?php if(!empty($node->body['und'][0]['value'])) print($node->body['und'][0]['value']); ?>
                </div>
            </div>
<!--        </div>-->
    </div>
</div>