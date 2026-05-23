<?php
//$term = $variables['term'];
//$articles = cassiopeia_get_nodes_by_category("article",$term);
//$limit = 6;
//$page = pager_default_initialize(count($articles), $limit, 0);
//$offset = $limit * $page;
//if(!empty($articles)){
//    $articles = array_slice($articles, $offset, $limit);
//}else{
//    $articles=null;
//}
//print_r($term);
?>
<div class="page-tx-article">
<!--    <div class="page-banner">-->
<!--        <div class="banner-image">-->
<!--            --><?php
//            $_fid = variable_get("cassiopeia_config_site_banner_ticket_article");
//            $banner = null;
//            if(!empty($_fid)){
//                $banner = file_load($_fid);
//            }
//            if (!empty($banner)) {
//                $node_img = (array) $banner;
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
<!--                    <h1>Vé máy bay</h1>-->
<!--                </div>-->
<!--                <div class="banner-description">-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="container search-flight-block">-->
<!--        --><?php //print(_cassiopeia_render_theme("module","cassiopeia","templates/forms/search-fly-form-type-1.tpl.php")); ?>
<!--    </div>-->
    <div class="page-tx-article-container container pb-0">
        <div class="row">
            <div class="left-block col-md-8">
                <?php
                $vocal = taxonomy_vocabulary_machine_name_load("tx_ticket_article");
                $tx_ticket_articles = taxonomy_get_tree($vocal->vid,0,1);
                ?>
                <?php if(!empty($tx_ticket_articles)): ?>
                    <?php foreach($tx_ticket_articles as $tx_ticket_article): ?>
                        <?php $nodes = cassiopeia_get_nodes_by_category("ticket_article",$tx_ticket_article,5); ?>
                        <?php $index=1; ?>
                        <?php if(!empty($nodes)): ?>
                            <div class="block-title row">
                                <h2><?php print(l($tx_ticket_article->name,"taxonomy/term/".$tx_ticket_article->tid,array("html"=>TRUE))); ?></h2>
                            </div>
                            <div class="tx-item row">
                                <?php foreach($nodes as $node): ?>
                                <?php if($index==1): ?>
                                <div class="col-md-6">
                                    <?php print(_cassiopeia_render_theme("module","cassiopeia","templates/parts/article-type-6.tpl.php",array("node"=>$node,"image_style"=>"style_343x200"))); ?>
                                </div>
                                <div class="col-md-6">
                                    <?php else: ?>
                                        <?php print(_cassiopeia_render_theme("module","cassiopeia","templates/parts/article-type-5.tpl.php",array("node"=>$node,"image_style"=>"style_343x200"))); ?>
                                    <?php endif; ?>
                                    <?php $index++; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="right-block col-md-4 custom-nav-bar">
                <div class="custom-nav-bar-banner mb-30 pt-30">
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
</div>
