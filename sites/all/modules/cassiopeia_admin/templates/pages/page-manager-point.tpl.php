<?php
global $user;
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/page-manager-point.js', ['weight' => 1000]);
$caches = null;
if (!empty($_REQUEST['data'])) {
    $caches = $_REQUEST['data'];
}
try {
    $query = db_select("tbl_point", "tbl_point");
    $query->fields("tbl_point");
    $query->orderBy("tbl_point.created","DESC");
    $query->join("field_data_field_account_code", "field_account_code", "field_account_code.entity_id=tbl_point.uid");
    $query->join("field_data_field_account_transaction_name", "field_transaction_name", "field_transaction_name.entity_id=tbl_point.uid");
    $query->addField("field_transaction_name", "field_account_transaction_name_value", "transaction_name");
    $query->addField("field_account_code", "field_account_code_value", "account_code");
    if (!empty($caches['code'] && $caches['code'] != "all")) {
        $query->condition("field_account_code.field_account_code_value", "%" . $caches['code'] . "%", "LIKE");
    }
    if (!empty($caches['name'] && $caches['name'] != "all")) {
        $query->condition("field_transaction_name.field_account_transaction_name_value", "%" . $caches['name'] . "%", "LIKE");
    }
    if (!empty($caches['gift'] && $caches['gift'] != "all")) {
        $query->join("node","tbl_node","tbl_point.nid=tbl_node.nid");
        $query->condition("tbl_node.title", "%" . $caches['gift'] . "%", "LIKE");
    }

    if (!empty($caches['date_filter'] && $caches['date_filter'] != "all")) {
        switch ($caches['date_filter']) {
            case "today" :
                $query->condition("tbl_point.created", array(strtotime(date("d-m-Y 00:00", REQUEST_TIME)), strtotime(date("d-m-Y 23:59", REQUEST_TIME))), "BETWEEN");
                break;
            case "yesterday" :
                $query->condition("tbl_point.created", array(strtotime(date("d-m-Y 00:00", REQUEST_TIME - 86400)), strtotime(date("d-m-Y 23:59", REQUEST_TIME - 86400))), "BETWEEN");
                break;
            case "thismonth" :
                $query->condition("tbl_point.created", array(strtotime(date("01-m-Y 00:00", REQUEST_TIME)), strtotime(date("t-m-Y 23:59", REQUEST_TIME))), "BETWEEN");
                break;
            case "other":
                if (!empty($caches['from_date'])) {
                    $query->condition("tbl_point.created", strtotime(date("d-m-Y 00:00", strtotime($caches['from_date']))), ">=");
                }
                if ($caches['to_date']) {
                    $query->condition("tbl_point.created", strtotime(date("d-m-Y 23:59", strtotime($caches['to_date']))), "<=");
                }
                break;
        }
    }

    $result = $query->execute()->fetchAll();
    $limit = 50;
    $page = pager_default_initialize(count($result), $limit, 0);
    $offset = $limit * $page;
    if (!empty($result)) {
        $result = array_slice($result, $offset, $limit);
    } else {
        $result = null;
    }
} catch (Exception $E) {
    _print_r($E);
}
$Total = 0;
?>
<div class="page-manager-gift">
    <div class="block-filter">
        <style type="text/css">
            .block-filter > form > div {
                display: flex;
                align-items: flex-end;
            }

            .form-item {
                max-width: 200px;
                float: left;
                margin-right: 10px;
            }

            .form-submit {
                margin-bottom: 15px;
            }
        </style>
        <?php
        //            _print_r($query);
//        if (cassiopeia_balance_report_accept()) {
            $cassiopeia_manager_point_filter_form = drupal_get_form("cassiopeia_manager_point_filter_form", $caches);
            if (!empty($cassiopeia_manager_point_filter_form)) {
                $cassiopeia_manager_point_filter_form = drupal_render($cassiopeia_manager_point_filter_form);
                print($cassiopeia_manager_point_filter_form);
            }
//        }
        ?>
    </div>
    <table class="table table-hover table-stripped">
        <thead>
        <th>Ngày đề nghị</th>
        <th>Đại lý</th>
        <th>Quà tặng</th>
        <th>Điểm</th>
        <th>Số lượng</th>
        <th class="text-right">Tổng tiền (đ)</th>
        <th>Tình trạng</th>
        <th>Thao tác</th>
        </thead>
        <tbody>
        <?php if (!empty($result)): $stt = 1; ?>
            <?php foreach ($result as $item): ?>
                <?php $Total += ($item->amount * $item->quantity); ?>
                <tr>
                    <td><?php print(date("d/m/Y H:i", $item->created)); ?></td>
                    <td><?php print($item->account_code . " - " . $item->transaction_name); ?></td>
                    <td><?php echo(!empty(node_load($item->nid)) ? node_load($item->nid)->title : ""); ?></td>
                    <td><?php echo($item->point); ?></td>
                    <td><?php echo($item->quantity); ?></td>
                    <td class="text-right"><?php echo(number_format($item->amount * $item->quantity, 0, ",", ".")); ?></td>
                    <td>
                        <?php
                        switch ($item->status) {
                            case 0 :
                                echo("Chưa xử lý");
                                break;
                            case 1 :
                                echo("Đã xử lý");
                                break;
                            case 2 :
                                echo("Đã hủy");
                                break;
                        }
                        ?>
                    </td>
                    <td>
                        <?php if ($item->status == 0): ?>
                            <button data-id="<?php print($item->id) ?>" class="btn btn-primary btn-update-point">Xử lý
                            </button>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php $stt++; endforeach; ?>
        <?php endif; ?>
        <tr>
            <td colspan="5"><b>Tổng tiền (VNĐ)</b></td>
            <td class="text-right"><b><?php echo number_format($Total, 0, ",", "."); ?></b></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>
    <!-- paging-->
    <div class="page">
        <div class="cassiopeia-pagination">
            <div class="cassiopeia-pagination-container">
                <?php print (theme('pager', array('tags' => array('«', '‹', '', '›', '»')))); ?>
            </div>
        </div>
    </div>
    <!--e: paging-->
</div>