<?php
$term = $variables['term'];
$articles = cassiopeia_get_nodes_by_category("ticket_article",$term);
$limit = 6;
$page = pager_default_initialize(count($articles), $limit, 0);
$offset = $limit * $page;
if(!empty($articles)){
    $articles = array_slice($articles, $offset, $limit);
}else{
    $articles=null;
}
//print_r($term);
?>
<div class="page-tx-article">
<!--    <div class="page-banner">-->
<!--        <div class="banner-image">-->
<!--            --><?php
//            if (!empty($term->field_banner['und'][0])) {
//                $node_img = (array) $term->field_banner['und'][0];
//                $node_img['style_name'] = "style_1440x450";
//                $node_img['path'] = $node_img['uri'];
//                $node_img = theme('image_style', $node_img);
//                print($node_img);
//            }
//            ?>
<!--        </div>-->
<!--        <div class="banner-text">-->
<!--            <div class="banner-text-container">-->
<!--                <div class="banner-title">-->
<!--                    <h1>--><?php //print($term->name); ?><!--</h1>-->
<!--                </div>-->
<!--                <div class="banner-description">-->
<!--                    <span>--><?php //if(!empty($term->description)) print($term->description); ?><!--</span>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="container search-flight-block">-->
<!--        --><?php //print(_cassiopeia_render_theme("module","cassiopeia","templates/forms/search-fly-form-type-1.tpl.php")); ?>
<!--    </div>-->
    <div class="page-tx-article-container container">
        <div class="left-block col-md-8">
            <?php if(!empty($articles)): ?>
                <div class="block-items">
                    <?php foreach($articles as $article): ?>
                        <div class="block-item">
                            <?php print(_cassiopeia_render_theme("module","cassiopeia","templates/parts/article-type-2.tpl.php",array("node"=>$article,"image_style"=>"style_274x221"))); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- paging-->
                <div class="page">
                    <div class="cassiopeia-pagination">
                        <div class="cassiopeia-pagination-container">
                            <?php print (theme('pager',  array('tags' => array('«','‹','','›','»'))));?>
                        </div>
                    </div>
                </div>
                <!--e: paging-->
            <?php endif; ?>
        </div>
        <div class="right-block col-md-4 custom-nav-bar">
            <div class="custom-nav-bar-banner mb-30">
                <a href="#">
                    <img src="/sites/all/themes/cassiopeia_theme/img/family-sibar-banner.png" alt="">
                </a>
            </div>
            <!-- <?php print(_cassiopeia_render_theme("module","cassiopeia","templates/nav/article-search.tpl.php")); ?> -->
            <?php print(_cassiopeia_render_theme("module","cassiopeia","templates/nav/tx-article.tpl.php")); ?>
            <?php print(_cassiopeia_render_theme("module","cassiopeia","templates/nav/most-viewed-article.tpl.php")); ?>
            <!--            --><?php //print(_cassiopeia_render_theme("module","cassiopeia","templates/nav/related-to-article.tpl.php")); ?>
            <?php print(_cassiopeia_render_theme("module","cassiopeia","templates/nav/promotion-article.tpl.php")); ?>
        </div>
    </div>
</div>
