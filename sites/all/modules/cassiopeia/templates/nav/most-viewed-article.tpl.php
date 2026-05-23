<?php
try{
    $query = db_select("node_counter","node_counter");
    $query->fields("node_counter");
    $query->join("node","tbl_node","tbl_node.nid=node_counter.nid");
    $query->condition("tbl_node.type","article");
    $query->orderBy("totalcount","DESC");
    $query->range(0,6);

    $final_query = db_select($query,"tbl_final");
    $final_query->addExpression("GROUP_CONCAT(tbl_final.nid SEPARATOR ',')",'nids');
    $statistic = $final_query->execute()->fetchObject();
    $nodes = !empty($statistic)?node_load_multiple(explode(",",$statistic->nids)):null;
}catch (Exception $e){

}
?>
<aside class="qt-sidebar-post">
    <div class="qt-sidebar-post-content">
        <div class="qt-sidebar-title">
            <h3
                    class="heading heading-tertiary text-uppercase clr-gray mb-2"
            >
                Đọc nhiều
            </h3>
        </div>
        <div class="qt-sidebar-items">
            <?php if(!empty($nodes)): ?>
                <?php foreach($nodes as $node): ?>
                    <div class="qt-sidebar-item">
                        <?php echo _cassiopeia_render_theme("module","cassiopeia","templates/parts/article-type-4.tpl.php",array("node"=>$node,"image_style"=>"style_110x69")) ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</aside>