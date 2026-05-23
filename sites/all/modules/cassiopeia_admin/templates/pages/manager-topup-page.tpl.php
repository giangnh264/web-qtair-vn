<?php
$cache = !empty($_REQUEST['data'])?$_REQUEST['data']:array();
$query = db_select("tbl_topup","tbl");
$query->fields("tbl");
$query->orderBy("created","DESC");
$result = $query->execute()->fetchAll();
?>
<div class="add-block mb-16">
    <a href="/admin/manager/top-up/add?destination=admin/manager/top-up" class="btn btn-primary">Thêm mới</a>
</div>
<div class="custom-filter-block">
    <?php
        $filter_form = drupal_get_form("cassiopeia_admin_manager_top_up_filter_form",$cache);
        if(!empty($filter_form)){
            $filter_form = drupal_render($filter_form);
            echo $filter_form;
        }
    ?>
</div>
<table class="table table-hover table-stripped">
    <thead>
        <tr>
            <th>Ngày tạo</th>
            <th>Người tạo</th>
            <th>Tài khoản</th>
            <th>Số tiền</th>
            <th>Ghi chú</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($result)): ?>
            <?php foreach($result as $item): ?>
                <?php $agent = user_load($item->agent); ?>
                <?php $tran_user = user_load($item->user); ?>
                <tr>
                    <td><?php echo date("d/m/Y",$item->created); ?></td>
                    <td><?php echo !empty($tran_user->field_account_full_name['und'][0]['value'])?$tran_user->field_account_full_name['und'][0]['value']:$tran_user->name; ?></td>
                    <td><?php echo !empty($agent->field_account_transaction_name['und'][0]['value'])?$agent->field_account_transaction_name['und'][0]['value']:$agent->name; ?></td>
                    <td><?php echo number_format($item->value,0,",","."); ?></td>
                    <td><?php echo $item->note; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>