<?php
global $user;
$cache = null;
$num_per_page = 50;
if(!empty($_REQUEST['data'])){
    $cache = $_REQUEST['data'];
    if(!empty($cache['num_per_page'])){
        $num_per_page = $cache['num_per_page'];
    }
}
if(empty($cache['date_filter'])){
    $cache['date_filter'] = date("m-Y",REQUEST_TIME);
}
if(empty($cache['order_by'])){
    $cache['order_by'] = "agent_code";
}

if(empty($cache['direction'])){
    $cache['direction'] = "ASC";
}
$cache['redirect'] = "admin/manager/report/room/AG";

?>
<div id="tab-3" class=" <?php if(!empty($arg[3]) && $arg[3]=="tab-3") print("in active"); if(user_has_role(5)) print("in active"); ?>">
    <div class="filter-block">
        <?php
        $cassiopeia_detail_report_tab_3_filter_form = drupal_get_form("cassiopeia_admin_report_AG_filter_form",$cache);
        if(!empty($cassiopeia_detail_report_tab_3_filter_form)){
            $cassiopeia_detail_report_tab_3_filter_form = drupal_render($cassiopeia_detail_report_tab_3_filter_form);
            print($cassiopeia_detail_report_tab_3_filter_form);
        }

        $stt=1;
        ?>
    </div>
    <?php
    $cache['sort_by'] = "field_account_code_value";
    $cache['direction'] = "ASC";
    $cache['sort_options'] = array(
        'field_account_code_value'                  => "Mã đại lý",
        'field_account_transaction_name_value'                  => "Tên giao dịch",
        'email'                  => "Email",
        'total_quantity'                  => "Số lượng",
        'total_partner_price'                  => "Doanh thu",
        'total_price'                  => "Giá vốn",
        'total_revenue'                  => "Lợi nhuận",
    );
    $cache['form_part'] = "room_AG";
    $cassiopeia_admin_report_ajax_form = drupal_get_form("cassiopeia_admin_report_ajax_form",$cache);
    echo drupal_render($cassiopeia_admin_report_ajax_form);
    ?>
</div>