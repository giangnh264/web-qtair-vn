<?php $nodes = (array)cassiopeia_get_nodes_by_category("autic_family_article",$term);
$limit = 12;
$page = pager_default_initialize(count($nodes), $limit, 0);
$offset = $limit * $page;
if(!empty($nodes)){
    $nodes = array_slice($nodes, $offset, $limit);
}else{
    $nodes=null;
}
?>
<div class="page-tx-autic-family page-tx-article">

    <div class="page-container container">
        <div class="block-title">
            <h2><?php echo $term->name ?></h2>
        </div>
        <div class="row">
            <?php foreach($nodes as $node): ?>
                <div class="col-md-4">
                    <?php print(_cassiopeia_render_theme("module","cassiopeia","templates/parts/autic-family/article-type-7.tpl.php",array("node"=>$node,"image_style"=>"style_338x223"))); ?>
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
    </div>
</div>
