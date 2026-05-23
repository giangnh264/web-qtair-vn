<?php
//drupal_add_js(drupal_get_path('module', 'cassiopeia_user') . '/js/user-manager-customer.js', ['weight' => 10000000]);
global $user;
$cache = !empty($_REQUEST['data'])?$_REQUEST['data']:array();
try{
    $query = db_select("tbl_customer","tbl_customer");
    $query->fields("tbl_customer");
    if(!empty($cache['name'])){
        $or = db_or();
        $or->condition("tbl_customer.name","%".$cache['name']."%","LIKE");
        $or->condition("tbl_customer.tel","%".$cache['name']."%","LIKE");
        $or->condition("tbl_customer.QH","%".$cache['name']."%","LIKE");
        $or->condition("tbl_customer.VN","%".$cache['name']."%","LIKE");
        $or->condition("tbl_customer.note","%".$cache['name']."%","LIKE");
        $query->condition($or);
    }
    if(!empty($cache['tel'])){
        $query->condition("tbl_customer.Phone","%".$cache['tel']."%","LIKE");
    }
    if(!empty($cache['code'])){
        $or = db_or();
        $or->condition("tbl_customer.QH","%".$cache['code']."%","LIKE");
        $or->condition("tbl_customer.VN","%".$cache['code']."%","LIKE");
        $query->condition($or);
    }
    if(!empty($cache['note'])){
        $query->condition("tbl_customer.note","%".$cache['note']."%","LIKE");
    }
    $query->orderBy("tbl_customer.created","DESC");
    if(user_has_role(3) || user_has_role(8) || user_has_role(5)|| user_has_role(7)){
        $query->join("users_roles","tbl_role","tbl_role.uid=tbl_customer.uid");
        if($cache->type=="other"){
            $query->condition("tbl_role.rid",array(3,8,5,7),"NOT IN");
        }else{
            $query->groupBy("tbl_customer.id");
            $query->condition("tbl_role.rid",array(3,8,5,7),"IN");
        }
    }else{
        $query->condition("uid",$user->uid);
    }
    $result = $query->execute()->fetchAll();
}catch (Exception $e){
    print_r($e);
}
?>

<!--cassiopeia_user_customer_form-->
<div class="qt-user-title mb-3">
    <h2 class="heading caption text-uppercase clr-dark">
        Danh sách khách hàng
    </h2>
</div>
<div class="add-block">
    <a href="/user/manager/customer/add?destination=user/manager/customer" class="btn btn-primary">Thêm mới</a>
</div>
<div class="qt-user-filter">
    <?php
    $cassiopeia_manager_customer_filter_form = drupal_get_form("cassiopeia_user_customer_filter_form",$cache);
    if(!empty($cassiopeia_manager_customer_filter_form)){
        $cassiopeia_manager_customer_filter_form = drupal_render($cassiopeia_manager_customer_filter_form);
        echo $cassiopeia_manager_customer_filter_form;
    }
    ?>
</div>

<div class="qt-user-table">
    <!-- Table : style can be found in sass/components/_table.scss -->
    <div class="table-wrapper">
        <div class="table-responsive">
            <table class="table table-custom">
                <thead>
                <tr>
                    <th>Họ tên</th>
                    <th>Số điện thoại</th>
                    <th>Mã KHTX</th>
                    <th>Ghi chú</th>
                    <th width="150px">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                    <?php if(!empty($result)): ?>
                        <?php foreach($result as $item): ?>
                            <tr>
                                <td><?php echo $item->name; ?></td>
                                <td><?php echo $item->tel; ?></td>
                                <td>
                                    <div>VN: <?php echo $item->VN; ?></div>
                                    <div>QH: <?php echo $item->QH; ?></div>
                                </td>
                                <td><?php echo $item->note; ?></td>
                                <td>
                                    <a title="Sửa" href="/user/manager/customer/<?php echo $item->id; ?>/edit?destination=user/manager/customer" class=""><i class="fa fa-edit text-primary"></i></a>
                                    <a title="Xóa" href="/user/manager/customer/<?php echo $item->id; ?>/delete?destination=user/manager/customer" class=""><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.Table  -->
</div>