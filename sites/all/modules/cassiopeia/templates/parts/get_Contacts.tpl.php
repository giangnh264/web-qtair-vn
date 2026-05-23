<?php
global $user;
$query = db_select("tbl_customer","tbl_customer");
$query->fields("tbl_customer");
$query->orderBy("tbl_customer.created","DESC");
if(user_has_role(4)){
    $query->condition("tbl_customer.uid",$user->uid);
}else{
    $query->join("users_roles","tbl_role","tbl_role.uid=tbl_customer.uid");
    $query->condition("tbl_role.rid",array(3,8),"IN");
}
$result = $query->execute()->fetchAll();
//_print_r($result);
?>
<div class="customers">
    <div>
        <input type="text" placeholder="Nhập tên khách hàng">
    </div>
    <ul>
        <?php if(!empty($result)): ?>
            <?php foreach($result as $item): ?>
                <li title="<?php echo $item->note; ?>" data-gender="<?php echo $item->gender; ?>" data-id="<?php echo $item->id; ?>" data-birthday="<?php if(!empty($item->birthday)) echo date("d/m/Y",$item->birthday); ?>" data-VN="<?php echo $item->VN; ?>" data-QH="<?php echo $item->QH; ?>" data-fullName="<?php echo $item->name; ?>"><?php echo $item->name; ?> <span class="Phone"><?php echo $item->QH ?> <?php echo $item->VN ?></span></li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</div>

