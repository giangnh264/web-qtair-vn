<?php
global $user;
$cache = null;
if(!empty($_REQUEST['data'])) {
    $cache = $_REQUEST['data'];
}
$cache['redirect'] = "admin/manager/report/general/sale";
$cache['sort_by'] = "sale";
$cache['direction'] = "ASC";
?>
<div id="tab-4" class="">
    <div class="filter-block">
        <?php
        $cassiopeia_detail_report_tab_2_filter_form = drupal_get_form("cassiopeia_general_report_filter_form",$cache);
        if(!empty($cassiopeia_detail_report_tab_2_filter_form)){
            $cassiopeia_detail_report_tab_2_filter_form = drupal_render($cassiopeia_detail_report_tab_2_filter_form);
            print($cassiopeia_detail_report_tab_2_filter_form);
        }
        ?>
    </div>
    <?php
    $cache['sort_options'] = array(
        'sale'                  => "Sale",
        'total_quantity'        => "Số lượng",
        'total_partner_price'   => "Doanh thu",
        'total_price'           => "Giá vốn",
        'total_revenue'         => "Lợi nhuận",
    );
    $cache['form_part'] = "general_sale";
    $cassiopeia_admin_report_ajax_form = drupal_get_form("cassiopeia_admin_report_ajax_form",$cache);
    echo drupal_render($cassiopeia_admin_report_ajax_form);
    ?>
</div>