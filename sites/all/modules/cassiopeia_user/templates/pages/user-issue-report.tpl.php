<?php
//db_delete("tbl_report")->execute();
//db_delete("tbl_payment_report")->execute();
//db_delete("tbl_issue_report")->execute();
//db_delete("tbl_refund_report")->execute();
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/issue-report-js.js', ['weight' => 1000]);
drupal_add_js("https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js", ['weight' => 1000]);
drupal_add_css("https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css", ['weight' => 1000]);
$caches = null;
if(!empty($_REQUEST['data'])){
    $caches = $_REQUEST['data'];
}
$month_options = array();
for($i=REQUEST_TIME-(12*30*86400);$i<=REQUEST_TIME;$i+=86400*30){
    $month_options[date("m-Y",$i)] = date("m/Y",$i);
}
$airlines = cassiopeia_get_airlines();
$airline_options = array();
$airline_options['all'] = "Tất cả";
$airline_options['VN'] = "Vietnam Airlines";
$airline_options['VJ'] = "VietJet Air";
$airline_options['BL'] = "Pacific Airlines";
$airline_options['QH'] = "Bammboo Airways";
foreach($airlines as $airline){
    $airline_options[$airline->iata] = $airline->iata." - ".$airline->name;
}
$query = db_select("tbl_tran_kind","tbl_tran_kind");
$query -> fields("tbl_tran_kind");
$query -> condition("kind","issue");
$result = $query -> execute() -> fetchAll();
$tran_kind_options = array();
$tran_kind_options['all'] = "Tất cả";
if(!empty($result)){
    foreach($result as $value){
        $tran_kind_options[$value->id] = $value->name;
    }
}
try{
    $query = db_select("users","tbl_user");
    $query -> fields("tbl_user");
    $query -> join("users_roles","tbl_role","tbl_role.uid = tbl_user.uid");
    $query -> condition("tbl_role.rid",4);
    $query -> leftJoin("field_data_field_account_sale","tbl_sale","tbl_sale.entity_id = tbl_user.uid");
    $query->join("field_data_field_account_transaction_name","field_account_transaction_name","field_account_transaction_name.entity_id=tbl_user.uid");
    $query->join("field_data_field_account_code","field_account_code","field_account_code.entity_id=tbl_user.uid");
    $query->addField("field_account_code","field_account_code_value","field_account_code_value");
    $query->addField("field_account_transaction_name","field_account_transaction_name_value","field_account_transaction_name_value");
    $result  = $query -> execute() -> fetchAll();
}catch (Exception $e){
    print_r($e);
}
$agent_options = array();
$agent_options['all'] = "Chọn Đại lý";
if(!empty($result)){
    foreach($result as $value){
        $transaction_name = !empty($value->field_account_transaction_name_value)?$value->field_account_transaction_name_value:"";
        $account_code = !empty($value->field_account_code_value)?$value->field_account_code_value:"";
        $agent_options[$value->uid] = $account_code." - ".$transaction_name;
    }
}

try{
    $query = db_select("users","tbl_user");
    $query -> fields("tbl_user");
    $query -> join("users_roles","tbl_role","tbl_role.uid = tbl_user.uid");
//    $query -> condition("tbl_role.rid",array(3,5,7),"IN");
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
?>
<div class="page-payment-report page-issue-report">
    <div class="block-container">
        <?php if(cassiopeia_issue_report_accept()): ?>
            <div><button class="btn btn-danger btn-excel-export">Xuất Excel</button></div>
        <?php endif; ?>
        <div class="filter-block">
            <div class="visible-xs btn-primary"data-toggle="collapse" data-target="#filter-form">
                <span class="">Lọc báo cáo <span class="fa fa-filter"></span></span>
            </div>
            <?php
            $cassiopeia_user_dashboard_ticket_filter_form = drupal_get_form("cassiopeia_isue_report_filter_form");
            if(!empty($cassiopeia_user_dashboard_ticket_filter_form)){
                echo drupal_render($cassiopeia_user_dashboard_ticket_filter_form);
            }
            ?>
        </div>
        <div class="items block-items">

        </div>
        <span id="current-page" data-page="1"></span>
    </div>
</div>

