<?php
$term = $variables['term'];
$articles = cassiopeia_get_nodes_by_category("article",$term);
?>

<div class="page-tx-custom-1-article">
    <div class="page-container container">
        <div class="page-title"><h1><?php print($term->name); ?></h1></div>
        <div class="page-inner">
            <?php if(!empty($articles)): ?>
                <ul class="nav nav-pills">
                    <?php $index=1; ?>
                    <?php foreach($articles as $article): ?>
                        <li class="<?php print($index==1?"active":""); ?>"><a data-toggle="pill" href="#tab-<?php print($article->nid); ?>"><?php print($article->title); ?></a></li>
                        <?php $index++; ?>
                    <?php endforeach; ?>
                </ul>

                <div class="tab-content">
                    <?php $index=1; ?>
                    <?php foreach($articles as $article): ?>
                        <div id="tab-<?php print($article->nid); ?>" class="tab-pane fade <?php print($index==1?"in active":""); ?>">
                            <?php print(!empty($article->body['und'][0]['value'])?$article->body['und'][0]['value']:""); ?>
                        </div>
                        <?php $index++; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
