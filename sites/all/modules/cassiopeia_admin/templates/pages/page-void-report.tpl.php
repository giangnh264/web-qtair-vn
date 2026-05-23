<?php
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/void-report-js.js', ['weight' => 1000]);
drupal_add_js("https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js", ['weight' => 1000]);
drupal_add_css("https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css", ['weight' => 1000]);
global $user;
try{


    try{
        $query = db_select("users","tbl_user");
        $query -> fields("tbl_user");
        $query -> join("users_roles","tbl_role","tbl_role.uid = tbl_user.uid");
        $query -> condition("tbl_role.rid",array(3,4,5,7),"IN");
        $query -> leftJoin("field_data_field_account_sale","tbl_sale","tbl_sale.entity_id = tbl_user.uid");
        $query->join("field_data_field_account_transaction_name","field_account_transaction_name","field_account_transaction_name.entity_id=tbl_user.uid");
        $query->join("field_data_field_account_code","field_account_code","field_account_code.entity_id=tbl_user.uid");
        $query->addField("field_account_code","field_account_code_value","field_account_code_value");
        $query->addField("field_account_transaction_name","field_account_transaction_name_value","field_account_transaction_name_value");
        $query->orderBy("field_account_transaction_name.field_account_transaction_name_value","ASC");
        $result  = $query -> execute() -> fetchAll();
    }catch (Exception $e){
        print_r($e);
    }
    $tran_user_options = array();
    $tran_user_options['all'] = "Chọn người xuất";
    if(!empty($result)){
        foreach($result as $value){
            $transaction_name = !empty($value->field_account_transaction_name_value)?$value->field_account_transaction_name_value:"";
            $account_code = !empty($value->field_account_code_value)?$value->field_account_code_value:"";
            $tran_user_options[$value->uid] = $transaction_name;
        }
    }
}catch (Exception $e){
    _print_r($e);
}
?>
<div class="page-void-report">
    <div class="page-container">
        <div class="filter-block">
            <div class="filter-form">
                <div class="tran_user">
                    <label for="">Người xuất</label>
                    <select name="tran_user" id="" class="form-control chosen">
                        <?php foreach($tran_user_options as $key => $value): ?>
                            <option value="<?php print($key); ?>"><?php print($value); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="code">
                    <label for="">CODE</label>
                    <input name="code" type="text" class="form-control">
                </div>
                <div class="date">
                    <label for="">Theo ngày</label>
                    <select name="date_filter" id="" class="form-control chosen">
                        <option value="all">Tất cả</option>
                        <option selected value="today">Trong ngày</option>
                        <option value="yesterday">Hôm qua</option>
                        <option  value="thismonth">Trong tháng</option>
                        <option value="other">Theo ngày</option>
                    </select>
                </div>
                <div class="from-date">
                    <label for="">Từ ngày</label>
                    <input type="text" name="from_date" class="form-control" autocomplete="off" value="">
                </div>
                <div class="to-date">
                    <label for="">Đến ngày</label>
                    <input type="text" name="to_date" class="form-control" autocomplete="off">
                </div>
                <div class="buttons">
                    <button class="btn btn-success btn-filter-payment-report">Lọc</button>
                </div>
            </div>
        </div>
        <div class="items block-items">

        </div>
    </div>
</div>

<span id="current-page" data-page="1"></span>