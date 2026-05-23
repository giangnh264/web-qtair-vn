<?php
$_node = !empty($variables['node'])?$variables['node']:null;
$vocal = taxonomy_vocabulary_machine_name_load("tx_handbook");
$terms = taxonomy_get_tree($vocal->vid,0,1);
$conditions = array();
$conditions['status'] = array(
    "type"      => "propertyCondition",
    "value"     => 1,
    "condition" => "=",
);
$conditions['created'] = array(
    "type"      => "propertyOrderBy",
    "direction" => "DESC",
);
$conditions['range'] = array(
    "type"      => "range",
    "start"     => 0,
    "limit"     => 1,
);
//if(empty($_node)){
    $__node = array_values(cassiopeia_get_items_by_conditions($conditions,"handbook","node"))[0];
//}
?>
<div class="tx-handbook">
    <div class="page-container container">
        <div class="row">
            <div class="col-xs-12 col-md-4 left-block">
                <div class="block-inner">
                    <h3 class="tx-handbook-title">Cẩm nang</h3>
                    <?php if(!empty($terms)): $index=1; ?>
                        <ul class="tx-handbook">
                            <?php foreach($terms as $term): ?>
                                <?php
                                try{
                                    $nodes = cassiopeia_get_nodes_by_category("handbook",$term);
                                }catch (Exception $e){
                                    print_r($e);
                                }
                                ?>
                                <?php if(!empty($_node->field_tx_handbook['und'][0]['tid'])): ?>
                                    <li class="<?php if($_node->field_tx_handbook['und'][0]['tid']==$term->tid) print("active"); ?>">
                                <?php else: ?>
                                    <li class="">
                                <?php endif; ?>
                                <span><?php print($term->name); ?></span>
                                <?php if(!empty($nodes)): ?>
                                    <ul class="tx-handbook-sub">
                                        <?php foreach($nodes as $node): ?>
                                            <?php if($index==1) $first_node = $node; ?>
                                            <?php if(!empty($_node)): $first_node = $_node; ?>
                                                <li class="<?php print($node->nid==$_node->nid?"active":""); ?>"><?php print(l($node->title,"node/".$node->nid,array("html"=>TRUE))); ?></li>
                                            <?php else: ?>
                                                <li class=""><?php print(l($node->title,"node/".$node->nid,array("html"=>TRUE))); ?></li>
                                            <?php endif; ?>
                                            <?php $index++; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xs-12 col-md-8 right-block">
<!--                --><?php //$nodes = cassiopeia_get_nodes_by_category("handbook"); ?>
<!--                --><?php //if(!empty($nodes)): ?>

                        <div class="tab-content">
<!--                        --><?php //$index=1; ?>
<!--                        --><?php //foreach($terms as $term): ?>
<!--                            --><?php
//                            try{
//                                $nodes = cassiopeia_get_nodes_by_category("handbook",$term);
//                            }catch (Exception $e){
//                                print_r($e);
//                            }
//                            ?>
<!--                            --><?php //foreach($nodes as $node): ?>
<!--                                <div id="tab---><?php //print($node->nid); ?><!--" class="tab-pane fade --><?php //print($index==1?"in active":""); ?><!--">-->
                                    <?php
                                    if(!empty($_node)){
                                        print(!empty($_node->body['und'][0]['value'])?$_node->body['und'][0]['value']:"");
                                    }else{
                                        print(!empty($__node->body['und'][0]['value'])?$__node->body['und'][0]['value']:"");
                                    }

                                    ?>
<!--                                </div>-->
<!--                                --><?php //$index++; ?>
<!--                            --><?php //endforeach; ?>
<!--                        --><?php //endforeach; ?>
                        </div>
            </div>
        </div>
    </div>
</div>