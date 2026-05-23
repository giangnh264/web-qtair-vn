<?php
$text = $variables['text'];
//print($text);
$query = db_select("tbl_airports","tbl_airports");
$query -> fields("tbl_airports");
$db_or = db_or();
$db_or -> condition("code","%".$text."%","LIKE");
//$db_or -> condition("name","%".$text."%","LIKE");
//$db_or -> condition("name_vi","%".$text."%","LIKE");
$query -> condition($db_or);
$result = $query -> execute() -> fetchAll();
?>
<?php if(!empty($result)): ?>
    <?php foreach($result as $value): ?>
        <li data-code = "<?php print($value->code); ?>" data-text="<?php print($value->name); ?>"><span><?php print($value->name); ?> (<?php print($value->code); ?>)</span></li>
    <?php endforeach; ?>
<?php endif; ?>
