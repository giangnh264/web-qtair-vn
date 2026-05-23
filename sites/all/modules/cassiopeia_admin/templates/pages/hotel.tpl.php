<?php
drupal_add_js(drupal_get_path('module', 'cassiopeia_admin') . '/js/hotel.js', ['weight' => 1000]);
drupal_add_js("https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js", ['weight' => 1000]);
drupal_add_css("https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css", ['weight' => 1000]);
global $user;
?>
<div class="page-manager-hotel">
    <span id="current-page" data-page="1"></span>
    <?php if(cassiopeia_check_permission("cassiopeia_user_permission_hotel","p_add")): ?>
        <div style="margin-bottom: 20px;">
            <a href="/node/add/hotel?destination=admin/manager/hotel" class="btn btn-primary"><i class="fa fa-plus"> Thêm mới</i></a>
        </div>
    <?php endif; ?>

    <div class="filter-block">
        <?php
        $v = taxonomy_vocabulary_machine_name_load("tx_area");
        $tx_areas = taxonomy_get_tree($v->vid,0,1);
        ?>
        <div class="item">
            <label for="">Khu vực</label>
            <select name="tx_area" id="" class="chosen form-control">
                <?php if(!empty($tx_areas)): ?>
                    <option value="all">Tất cả</option>
                    <?php foreach($tx_areas as $tx_area): ?>
                        <option value="<?php echo($tx_area->tid); ?>"><?php echo($tx_area->name); ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
    </div>
    <table class="table table-hover table-stripped">
        <thead>
        <tr>
            <th>Mã sản phẩm</th>
            <th>Tên khách sạn</th>
            <th>Tiêu chuẩn</th>
            <th>Người cập nhật</th>
            <th>Ngày cập nhật</th>
            <th>Tình trạng</th>
            <th>Ưu tiên</th>
            <th>Công việc</th>
        </tr>
        <tr class="filter">
            <th><input type="text" class="form-control code"></th>
            <th><input type="text" class="form-control title"></th>
            <th><input type="text" class="form-control ranking"></th>
            <th>
                <?php
                $query = db_select("users","tbl_user");
                $query -> fields("tbl_user");
                $query -> join("users_roles","tbl_role","tbl_role.uid = tbl_user.uid");
                $query -> condition("tbl_role.rid",5);
                $query->join("field_data_field_account_transaction_name","field_account_transaction_name","field_account_transaction_name.entity_id=tbl_user.uid");
                $query->join("field_data_field_account_code","field_account_code","field_account_code.entity_id=tbl_user.uid");
                $query->addField("field_account_transaction_name","field_account_transaction_name_value","agent_transaction_name");
                $query->addField("field_account_code","field_account_code_value","agent_code");
                $result  = $query -> execute() -> fetchAll();
                ?>
                <select name="" id="" class="user form-control chosen">
                    <?php if(!empty($result)): ?>
                        <?php foreach($result as $sale): ?>
                            <option value="all">Tất cả</option>
                            <option value="<?php echo($sale->uid); ?>"><?php echo($sale->agent_transaction_name); ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </th>
            <th><input type="text" class="form-control changed date-picker"></th>
            <th>
                <select  name="" id="" class="status form-control">
                    <option value="all">Tất cả</option>
                    <option value="0">Ẩn</option>
                    <option value="1">Hiện</option>
                </select>
            </th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody class="result">

        </tbody>
    </table>

</div>
