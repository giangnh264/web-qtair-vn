<?php
drupal_add_js(drupal_get_path("module","cassiopeia_admin")."/templates/js/sort.js");
$cache = !empty($_REQUEST['data'])?$_REQUEST['data']:array();
if(empty($cache['sort_by'])){
    $cache['sort_by'] = "date";
}
$month = !empty($cache['month'])?$cache['month']:"all";
$cache['year'] = !empty($cache['year'])?$cache['year']:date("Y",REQUEST_TIME);
$cache['month'] = $month;
$cache['redirect'] = "admin/manager/report/general/revenue";
try{
    $issue_query = db_select("tbl_issue_report","tbl_issue_report");
    $issue_query->fields("tbl_issue_report",array("created"));
    $issue_query->addExpression("1","type");
    $issue_query->addField("tbl_issue_report","date","date");
    $issue_query->addField("tbl_issue_report","partner_price","partner_price");
    $issue_query->addField("tbl_issue_report","price","price");
    $issue_query->addField("tbl_issue_report","quantity","quantity");

    $room_query = db_select("tbl_room_booking_report","tbl_room_booking_report");
    $room_query->fields("tbl_room_booking_report",array("created"));
    $room_query->addExpression("2","type");
    $room_query->addField("tbl_room_booking_report","created","date");
    $room_query->addField("tbl_room_booking_report","partner_price","partner_price");
    $room_query->addField("tbl_room_booking_report","price","price");
    $room_query->addField("tbl_room_booking_report","quantity_night","quantity");
    $query = Database::getConnection()
        ->select($issue_query->union($room_query))
        ->fields(NULL, array("date","type","partner_price","price"));

//    if(!empty($date_filter && $date_filter!="all")){
//        $first_day_of_moth = strtotime(date('Y-m-01 00:00:00',strtotime("01-".$date_filter)));
//        $last_day_of_moth = strtotime(date("Y-m-t 23:59:59",strtotime("01-".$date_filter)));
//        $query->condition("date",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
//
//    }
    if($cache['month']=="all"){ // thống kê theo tháng
        $first_day_of_moth = strtotime(date('Y-01-01 00:00:00',strtotime("01-01-".$cache['year'])));
        $last_day_of_moth = strtotime(date("Y-12-31 23:59:59",strtotime("01-01-".$cache['year'])));
        $query ->condition("date",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
    }else{ // thống kê theo ngày
        $first_day_of_moth = strtotime(date('Y-m-01 00:00:00',strtotime("01-".$month."-".$cache['year'])));
        $last_day_of_moth = strtotime(date("Y-m-t 23:59:59",strtotime("01-".$month."-".$cache['year'])));
        $query ->condition("date",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
    }
    $query->addExpression("SUM(CASE  WHEN type=1 THEN partner_price ELSE 0 END)","total_ticket_partner_price");
    $query->addExpression("SUM(CASE  WHEN type=2 THEN partner_price ELSE 0 END)","total_room_partner_price");

    $query->addExpression("SUM(CASE  WHEN type=1 THEN price ELSE 0 END)","total_ticket_price");
    $query->addExpression("SUM(CASE  WHEN type=2 THEN price ELSE 0 END)","total_room_price");

    $query->addExpression("SUM(CASE  WHEN type=1 THEN partner_price-price ELSE 0 END)","total_ticket_revenue");
    $query->addExpression("SUM(CASE  WHEN type=2 THEN partner_price-price ELSE 0 END)","total_room_revenue");

    $query->addExpression("SUM(CASE  WHEN type=1 THEN quantity ELSE 0 END)","total_ticket_quantity");
    $query->addExpression("SUM(CASE  WHEN type=2 THEN quantity ELSE 0 END)","total_room_quantity");

    $query->addExpression("SUM(partner_price)","total_partner_price");
    $query->addExpression("SUM(price)","total_price");
    $query->addExpression("SUM(quantity)","total_quantity");
    $query->addExpression("SUM(partner_price-price)","total_revenue");
    $result = $query->execute()->fetchObject();


}catch (Exception $e){
    _print_r($e);
}
//_print_r($daily_items);
?>
<div class="filter">
    <?php
    $cassiopeia_detail_report_tab_1_filter_form = drupal_get_form("cassiopeia_general_revenue_report_filter_form",$cache);
    if(!empty($cassiopeia_detail_report_tab_1_filter_form)){
        $cassiopeia_detail_report_tab_1_filter_form = drupal_render($cassiopeia_detail_report_tab_1_filter_form);
        print($cassiopeia_detail_report_tab_1_filter_form);
    }
    ?>
</div>
<table class="table table-hover table-stripped">
    <thead>
    <tr>
        <th></th>
        <th class="money-data">Tổng cộng</th>
        <th class="money-data">Vé máy bay</th>
        <th class="money-data">Đặt phòng</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td>Doanh thu</td>
            <td class="money-data"><?php echo number_format($result->total_partner_price,0,",","."); ?></td>
            <td class="money-data"><?php echo number_format($result->total_ticket_partner_price,0,",","."); ?></td>
            <td class="money-data"><?php echo number_format($result->total_room_partner_price,0,",","."); ?></td>
        </tr>
        <tr>
            <td>Giá vốn</td>
            <td class="money-data"><?php echo number_format($result->total_price,0,",","."); ?></td>
            <td class="money-data"><?php echo number_format($result->total_ticket_price,0,",","."); ?></td>
            <td class="money-data"><?php echo number_format($result->total_room_price,0,",","."); ?></td>
        </tr>
        <tr>
            <td>Lợi nhuận</td>
            <td class="money-data"><?php echo number_format($result->total_revenue,0,",","."); ?></td>
            <td class="money-data"><?php echo number_format($result->total_ticket_revenue,0,",","."); ?></td>
            <td class="money-data"><?php echo number_format($result->total_room_revenue,0,",","."); ?></td>
        </tr>
        <tr>
            <td>Đơn vị</td>
            <td class="money-data"></td>
            <td class="money-data"><?php echo number_format($result->total_ticket_quantity,0,",","."); ?></td>
            <td class="money-data"><?php echo number_format($result->total_room_quantity,0,",","."); ?></td>
        </tr>
        <tr>
            <td>Biên Lợi nhuận</td>
            <td class="money-data"><?php if(!empty($result->total_partner_price)) echo round($result->total_revenue*100/$result->total_partner_price,2); ?>%</td>
            <td class="money-data"><?php if(!empty($result->total_ticket_partner_price)) echo round($result->total_ticket_revenue*100/$result->total_ticket_partner_price,2); ?>%</td>
            <td class="money-data"><?php if(!empty($result->total_room_partner_price)) echo round($result->total_room_revenue*100/$result->total_room_partner_price,2); ?>%</td>
        </tr>
    </tbody>
</table>
<?php
//$cassiopeia_test_ajax_form = drupal_get_form("cassiopeia_admin_general_report_revenue_form_theme",$cache);
//echo drupal_render($cassiopeia_test_ajax_form);
?>
<?php
$cache['sort_options'] = array(
    'date'                  => "Ngày",
    'total_quantity'        => "Số lượng",
    'total_partner_price'   => "Doanh thu",
    'total_price'           => "Giá vốn",
    'total_revenue'         => "Lợi nhuận",
);
$cache['form_part'] = "general_revenue";
$cassiopeia_admin_report_ajax_form = drupal_get_form("cassiopeia_admin_report_ajax_form",$cache);
echo drupal_render($cassiopeia_admin_report_ajax_form);
?>
