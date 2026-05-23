<?php
global $user;
$arg = arg();
$tab = isset($_REQUEST['tab'])?$_REQUEST['tab']:"ticket";
$selectedYear = isset($_REQUEST['year'])?$_REQUEST['year']:date("Y",REQUEST_TIME);
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/user-manager-ticket-dashboard.js', ['weight' => 1000]);
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/issue-report-js.js', ['weight' => 1000]);
drupal_add_js("https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js", ['weight' => 1000]);
drupal_add_css("https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css", ['weight' => 1000]);

$_user = user_load($user->uid);
$caches = null;
$datas = null;
if(!empty($_REQUEST['data'])){
    $caches = $_REQUEST['data'];
}

try{
    $query = db_select("tbl_issue_report","tbl_issue_report");
    $query -> fields("tbl_issue_report");
    $query->condition("agent",$user->uid);
    $query->condition("tbl_issue_report.date",array(strtotime("01-01-".$selectedYear),strtotime("31-12-".$selectedYear)),"BETWEEN");
    $query->groupBy("agent");
    $query->addExpression("SUM(partner_price)","total_price");
    $query->addExpression("SUM(quantity)","total_quantity");
    $query->addExpression("SUM(revenue)","total_revenue");
    $query->orderBy("created","DESC");
    $resultTotal = $query -> execute() -> fetchObject();
//
    $query = db_select("tbl_room_booking_report","tbl_room_booking_report");
    $query -> fields("tbl_room_booking_report");
    $query->condition("agent",$user->uid);
    $query->groupBy("agent");
    $query->addExpression("SUM(partner_price)","total_price");
    $query->condition("tbl_room_booking_report.created",array(strtotime("01-01-".$selectedYear),strtotime("31-12-".$selectedYear)),"BETWEEN");
    $query->addExpression("SUM(revenue)","total_revenue");
    $query->orderBy("created","DESC");
    $resultBookingTotal = $query -> execute() -> fetchObject();

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
//    print_r($result);
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
$tran_user_options = array();
$tran_user_options['all'] = "Chọn người xuất";
if(!empty($result)){
    foreach($result as $value){
        $transaction_name = !empty($value->field_account_transaction_name_value)?$value->field_account_transaction_name_value:"";
        $account_code = !empty($value->field_account_code_value)?$value->field_account_code_value:"";
        $tran_user_options[$value->uid] = $transaction_name;
    }
}
$_point = !empty($_user->field_point['und'][0]['value'])?$_user->field_point['und'][0]['value']:0;
$_used_point = !empty($_user->field_used_point['und'][0]['value'])?$_user->field_used_point['und'][0]['value']:0;
$TotalTicketRevenue = !empty($resultTotal->total_price)?$resultTotal->total_price:0;
$TotalRoomRevenue = !empty($resultBookingTotal->total_price)?$resultBookingTotal->total_price:0;
?>

<div class="page-user-dashboard">
    <?php if($arg[2]=="dashboard"): ?>
        <div class="qt-user-info">
            <p>
                <b class="clr-black ff-bold text-uppercase"
                >Xin chào! <?php echo !empty($_user->field_account_full_name['und'])?$_user->field_account_full_name['und'][0]['value']:$_user->name; ?></b
                >
            </p>

            <p>
                Mã đại lý:
                <b class="clr-dark"><?php echo !empty($_user->field_account_code['und'])?$_user->field_account_code['und'][0]['value']:$_user->name; ?></b>
            </p>

            <p>
                Tài khoản chính:
                <b class="clr-danger ff-bold"><?php echo !empty($_user->field_account_balance['und'])?number_format($_user->field_account_balance['und'][0]['value'],0,",","."):0; ?> VNĐ</b>
            </p>
        </div>
    <?php endif; ?>
    <div class="filter-block">
        <?php
        $cassiopeia_user_dashboard_ticket_filter_form = drupal_get_form("cassiopeia_isue_report_filter_form");
        if(!empty($cassiopeia_user_dashboard_ticket_filter_form)){
            echo drupal_render($cassiopeia_user_dashboard_ticket_filter_form);
        }
        ?>

    </div>
    <div class="items block-items">

    </div>

    <div class="qt-user-table">
        <!-- Table : style can be found in sass/components/_table.scss -->
        <div class="table-wrapper">
            <div class="table-responsive result">
                <table class="table table-custom">
                    <thead>
                    <tr>
                        <th
                                data-title="Người thực hiện"
                                class="text-center"
                        >
                            Người thực hiện
                        </th>
                        <th data-title="Hãng">Hãng</th>

                        <th
                                data-title="Loại giao dịch"
                                class="text-center"
                        >
                            Loại giao dịch
                        </th>

                        <th data-title="Code" class="text-center">
                            Code
                        </th>

                        <th data-title="Số lượng" class="text-center">
                            Số lượng
                        </th>

                        <th data-title="Giá đại lý" class="text-right">
                            Giá đại lý
                        </th>

                        <th data-title="Người xuất" class="text-right">
                            Người xuất
                        </th>

                        <th data-title="nội dung" class="text-right">
                            Nội dung
                        </th>
                    </tr>
                    </thead>

                </table>
            </div>
        </div>
        <!-- /.Table  -->
    </div>
</div>
<span id="current-page" data-page="1"></span>
<script>
    jQuery("document").ready(function(e){
        jQuery('.chosen').select2();
    });
</script>