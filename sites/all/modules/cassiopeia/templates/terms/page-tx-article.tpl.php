<?php
$term = $variables['term'];
$articles = cassiopeia_get_nodes_by_category("article",$term);
$limit = 9;
$page = pager_default_initialize(count($articles), $limit, 0);
$offset = $limit * $page;
if(!empty($articles)){
    $articles = array_slice($articles, $offset, $limit);
}else{
    $articles=null;
}
?>
<div class="banner page-slider">
    <div class="swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <?php
                if (!empty($term->field_banner['und'][0])) {
                    $node_img = (array) $term->field_banner['und'][0];
                    $node_img['style_name'] = "style_1900x595";
                    $node_img['path'] = $node_img['uri'];
                    $node_img = theme('image_style', $node_img);
                    print($node_img);
                }
                ?>
            </div>
        </div>
    </div>
    <div class="slide-text">
        <div class="tpl-1">
            <h3><?php echo $term->name; ?></h3>
            <ul>
                <li>
                    <a href="/">Trang chủ</a>
                </li>
                <li>
                    <span>/</span>
                </li>
                <li>
                    <a href="#"><?php echo $term->name; ?></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="page page-blog">
    <div class="page-container container">
        <div class="page-inner">
            <div class="row">
                <?php if(!empty($articles)): ?>
                    <?php foreach($articles as $article): ?>
                        <div class="col-xs-12 col-sm-6 col-md-4 mb-4">
                            <?php echo _cassiopeia_render_theme("module","cassiopeia","templates/parts/article-type-3.tpl.php",array("node"=>$article,"image_style"=>"style_360x240")); ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
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
        </div>
    </div>
</div>
