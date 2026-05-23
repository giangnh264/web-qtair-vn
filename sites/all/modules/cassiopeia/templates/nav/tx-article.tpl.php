<?php
$vocal = taxonomy_vocabulary_machine_name_load("tx_article");
$tx_articles = taxonomy_get_tree($vocal->vid,0,1);
?>
<div class="nav-block block-article-category-menu">
    <div class="block-inner">
        <div class="block-title">
            <h2><?php print(t("Bạn quan tâm chủ đề nào ?")); ?></h2>
        </div>
        <div class="block-content">
            <ul class="tx">
                <?php if(!empty($tx_articles)): ?>
                    <?php foreach($tx_articles as $article): ?>
                        <li class=""><?php print(l($article->name,"taxonomy/term/".$article->tid,array("html"=>TRUE))); ?></li>
                    <?php endforeach; ?>
                <?php endif; ?>
                <li class=""><a href="/cam-nang">Cẩm nang</a></li>
            </ul>
        </div>
    </div>
</div>