<?php
global $user;
global $base_url;
$id = $variables['id'];
$query = db_select("tbl_qa_notify","tbl_qa_notify");
$query->fields("tbl_qa_notify");
$query->condition("id",$id);
$qa_notify = $query->execute()->fethObect();
$node = node_load($qa_notify->nid);
if($node->type=="article"){
    $type = "bài viết";
//                                    $query->condition("tbl_node.type","article");
}else{
    $type = "câu hỏi";
//                                    $query->condition("tbl_node.type","qa");
}
$pieces = explode(" ", $node->title);
$first_part = implode(" ", array_splice($pieces, 0, 5));
?>
<a href="<?php echo($base_url); ?>/<?php echo(drupal_get_path_alias("node/".$qa_notify->nid)); ?>"><b>
        <?php echo(!empty(user_load($qa_notify->from_uid))?user_load($qa_notify->from_uid)->name:""); ?></b> <?php echo($qa_notify->text); ?> <b>

        <?php
        if($qa_notify->to_uid==$user->uid){
            echo("bạn");
        }else{
            echo(!empty(user_load($qa_notify->to_uid))?user_load($qa_notify->uid)->name:"");
        }
        ?>
    </b>
    trong <?php echo($type); ?> <?php echo($first_part."..."); ?>
</a>
<?php //die; ?>