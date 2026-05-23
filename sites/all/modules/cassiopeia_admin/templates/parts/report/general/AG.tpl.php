<?php
drupal_add_js(drupal_get_path("module","cassiopeia_admin")."/templates/js/sort.js");
drupal_add_js(drupal_get_path("module","cassiopeia_admin")."/templates/js/pagination.js");
global $user;
$caches = null;
$num_per_page = 50;
if(!empty($_REQUEST['data'])){
    $caches = $_REQUEST['data'];
    if(!empty($caches['num_per_page'])){
        $num_per_page = $caches['num_per_page'];
    }
}
if(empty($caches['sort_by'])){
    $caches['sort_by'] = "field_account_code_value";
}
if(empty($caches['date_filter'])){
    $caches['date_filter'] = date("m-Y",REQUEST_TIME);
}
if(empty($caches['order_by'])){
    $caches['order_by'] = "agent_code";
}

if(empty($caches['direction'])){
    $caches['direction'] = "ASC";
}
$caches['redirect'] = "admin/manager/report/general/AG";

?>
<div id="tab-3" class=" <?php if(!empty($arg[3]) && $arg[3]=="tab-3") print("in active"); if(user_has_role(5)) print("in active"); ?>">
    <div class="filter-block">
        <?php
        $cassiopeia_detail_report_tab_3_filter_form = drupal_get_form("cassiopeia_admin_report_AG_filter_form",$caches);
        if(!empty($cassiopeia_detail_report_tab_3_filter_form)){
            $cassiopeia_detail_report_tab_3_filter_form = drupal_render($cassiopeia_detail_report_tab_3_filter_form);
            print($cassiopeia_detail_report_tab_3_filter_form);
        }

        ?>
    </div>
    <?php
    $cassiopeia_admin_general_report_agent_form = drupal_get_form("cassiopeia_admin_general_report_agent_form",$caches);
    echo drupal_render($cassiopeia_admin_general_report_agent_form);
    ?>

</div>