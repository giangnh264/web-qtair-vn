<?php
$featured_nodes = cassiopeia_featured_nodes("autic_family_article", 5);
$autic_family = taxonomy_term_load(87);
$autic_news = taxonomy_term_load(88);
?>

<div class="page-tx-article page-autic-family">
    <div class="page-featured-nodes">
        <?php if (!empty($featured_nodes)) : ?>
            <div class="container">
                <div class="block-inner row">
                    <?php $index = 1; ?>
                    <?php foreach ($featured_nodes as $featured_node) : ?>
                        <?php if ($index == 1) : ?>
                            <div class="col-md-6 first-item">
                                <?php print(_cassiopeia_render_theme("module", "cassiopeia", "templates/parts/autic-family/article-type-6.tpl.php", array("node" => $featured_node, "image_style" => "style_570x400"))); ?>
                            </div>
                            <div class="col-md-6 other-item">
                                <div class="row">
                                <?php else : ?>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <?php print(_cassiopeia_render_theme("module", "cassiopeia", "templates/parts/article-type-4.tpl.php", array("node" => $featured_node, "image_style" => "style_270x185"))); ?>
                                    </div>
                                <?php endif; ?>
                                <?php $index++; ?>
                            <?php endforeach; ?>
                                </div>
                            </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="page-tx-article-container pb-0">
        <div class="block-tx-autic-family pd-y-48">
            <div class="container">
                <div class="block-title">
                    <h3><?php echo $autic_family->name; ?> <?php echo l("Xem tất cả", "taxonomy/term/" . $autic_family->tid, array("html" => TRUE)); ?></h3>
                </div>
                <div class="block-content">
                    <?php $nodes = (array)cassiopeia_get_nodes_by_category("autic_family_article", $autic_family, 8); ?>
                    <div class="slider-3 owl-carousel owl-theme">
                        <?php foreach ($nodes as $node) : ?>
                            <div class="item">
                                <?php print(_cassiopeia_render_theme("module", "cassiopeia", "templates/parts/autic-family/article-type-7.tpl.php", array("node" => $node, "image_style" => "style_338x223"))); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <!--        <div class="pd-y-48 bg-gray autic-family-new">-->
        <!--            <div class="container">-->
        <!--                <div class="row">-->
        <!--                    <div class="left-block col-md-8">-->
        <!--                        --><?php //$nodes = cassiopeia_get_nodes_by_category("autic_family_article",$autic_news,5);  
                                        ?>
        <!--                        <div class="block-title">-->
        <!--                            <h3>--><?php //echo $autic_news->name; 
                                                ?>
        <!-- --><?php //echo l("Xem tất cả","taxonomy/term/".$autic_news->tid,array("html"=>TRUE)); 
                ?>
        <!--</h3>-->
        <!--                        </div>-->
        <!--                        <div class="block-sub-nav">-->
        <!--                            --><?php //$children = taxonomy_get_children($autic_news->tid); 
                                            ?>
        <!--                            <ul>-->
        <!--                                --><?php //if(!empty($children)): 
                                                ?>
        <!--                                    --><?php //foreach($children as $child):
                                                    ?>
        <!--                                        <li>--><?php //echo l($child->name,"taxonomy/term/".$child->tid,array("html"=>TRUE)); 
                                                            ?>
        <!--</li>-->
        <!--                                    --><?php //endforeach; 
                                                    ?>
        <!--                                --><?php //endif; 
                                                ?>
        <!--                            </ul>-->
        <!--                        </div>-->
        <!--                        <div class="block-content">-->
        <!--                            --><?php //foreach($nodes as $node): 
                                            ?>
        <!--                                --><?php //print(_cassiopeia_render_theme("module","cassiopeia","templates/parts/autic-family/article-type-8.tpl.php",array("node"=>$node,"image_style"=>"style_310x181"))); 
                                                ?>
        <!--                            --><?php //endforeach; 
                                            ?>
        <!--                        </div>-->
        <!--                        <div class="block-view-all">-->
        <!--                            --><?php //echo l("Xem tất cả","taxonomy/term/".$autic_news->tid,array("html"=>TRUE)); 
                                            ?>
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="right-block col-md-4 custom-nav-bar">-->
        <!--                        <div class="custom-nav-bar-banner mb-30">-->
        <!--                            <a href="#">-->
        <!--                                <img src="/sites/all/themes/cassiopeia_theme/img/family-sibar-banner.png" alt="">-->
        <!--                            </a>-->
        <!--                        </div>-->
        <!--                        <!-- --><?php //print(_cassiopeia_render_theme("module","cassiopeia","templates/nav/article-search.tpl.php")); 
                                            ?>
        <!-- -->
        <!--                        --><?php //print(_cassiopeia_render_theme("module","cassiopeia","templates/nav/tx-article.tpl.php")); 
                                        ?>
        <!--                        --><?php //print(_cassiopeia_render_theme("module","cassiopeia","templates/nav/most-viewed-article.tpl.php")); 
                                        ?>
        <!--                        --><?php //print(_cassiopeia_render_theme("module","cassiopeia","templates/nav/promotion-article.tpl.php")); 
                                        ?>
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <div class="container">
            <div class="block-other-terms pt-48">
                <?php
                $array = array(87, 88);
                $conditions = array();
                $conditions['weight'] = array(
                    "type"      => "propertyOrderBy",
                    "direction" => "DESC"
                );
                $tx_articles = (array)cassiopeia_get_items_by_conditions($conditions, "tx_autic_family", "taxonomy_term");
                ?>
                <?php foreach ($tx_articles as $tx_article) : ?>
                    <div class="block-tx-autic-family">
                        <div class="block-title">
                            <h3><?php echo $tx_article->name; ?> <?php echo l("Xem tất cả", "taxonomy/term/" . $tx_article->tid, array("html" => TRUE)); ?></h3>
                        </div>
                        <div class="block-content">
                            <?php $nodes = (array)cassiopeia_get_nodes_by_category("autic_family_article", $tx_article, 4); ?>
                            <div class="items row">
                                <?php foreach ($nodes as $node) : ?>
                                    <div class="item col-md-6">
                                        <?php print(_cassiopeia_render_theme("module", "cassiopeia", "templates/parts/autic-family/article-type-8.tpl.php", array("node" => $node, "image_style" => "style_254x162"))); ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>