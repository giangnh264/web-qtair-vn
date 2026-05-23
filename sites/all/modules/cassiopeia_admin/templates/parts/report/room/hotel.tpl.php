<?php
global $user;
$cache = !empty($_REQUEST['data'])?$_REQUEST['data']:array();
$date_filter = !empty($cache['date_filter'])?$cache['date_filter']:date("m-Y",REQUEST_TIME);
$cache['date_filter'] = $date_filter;
$cache['redirect'] = "admin/manager/report/room/hotel";
?>
<div id="tab-2" class="">
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
    $cache['sort_by'] = "title";
    $cache['direction'] = "DESC";
    $cache['sort_options'] = array(
        'title'                  => "Khách sạn",
        'total_quantity'                  => "Số lượng",
        'total_partner_price'          => "Doanh thu",
        'total_price'        => "Giá vốn",
        'total_revenue'           => "Lợi nhuận",
    );
    $cache['form_part'] = "room_hotel";
    $cassiopeia_admin_report_ajax_form = drupal_get_form("cassiopeia_admin_report_ajax_form",$cache);
    echo drupal_render($cassiopeia_admin_report_ajax_form);
    ?>
</div>