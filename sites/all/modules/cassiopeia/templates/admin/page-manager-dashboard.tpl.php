<?php
global $user;
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
    <div class="qt-user-info">
        <p>
            <b class="clr-black ff-bold text-uppercase"
            >Xin chào! Hoàng Anh Lâm</b
            >
        </p>

        <p>
            Mã đại lý:
            <b class="clr-dark">MA001</b>
        </p>

        <p>
            Tài khoản chính:
            <b class="clr-danger ff-bold">1.720.000 VNĐ</b>
        </p>
    </div>

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
            <div class="table-responsive">
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
                    <tbody>
                    <tr>
                        <td
                                data-title="Ngày thực hiện"
                                class="text-center"
                        >
                            14:41 29/01/2022
                        </td>
                        <td data-title="Hãng">
                            <b class="ff-medium">Vietnam Airlines</b>
                        </td>
                        <td
                                data-title="Loại giao dịch"
                                class="text-center"
                        >
                            Xuất vé
                        </td>
                        <td data-title="Code" class="text-center">
                            9JBDTY
                        </td>
                        <td data-title="Số lượng" class="text-center">
                            <b class="ff-medium">10</b>
                        </td>
                        <td data-title="Giá đại lý" class="text-right">
                            1.750.000 VNĐ
                        </td>
                        <td data-title="Người xuất" class="text-right">
                            THI XUAN LE
                        </td>
                        <td data-title="Nội dung" class="text-right">
                            API issue
                        </td>
                    </tr>

                    <tr>
                        <td
                                data-title="Ngày thực hiện"
                                class="text-center"
                        >
                            14:41 29/01/2022
                        </td>
                        <td data-title="Hãng">
                            <b class="ff-medium">Vietnam Airlines</b>
                        </td>
                        <td
                                data-title="Loại giao dịch"
                                class="text-center"
                        >
                            Xuất vé
                        </td>
                        <td data-title="Code" class="text-center">
                            9JBDTY
                        </td>
                        <td data-title="Số lượng" class="text-center">
                            <b class="ff-medium">10</b>
                        </td>
                        <td data-title="Giá đại lý" class="text-right">
                            1.750.000 VNĐ
                        </td>
                        <td data-title="Người xuất" class="text-right">
                            THI XUAN LE
                        </td>
                        <td data-title="Nội dung" class="text-right">
                            API issue
                        </td>
                    </tr>

                    <tr>
                        <td
                                data-title="Ngày thực hiện"
                                class="text-center"
                        >
                            14:41 29/01/2022
                        </td>
                        <td data-title="Hãng">
                            <b class="ff-medium">Vietnam Airlines</b>
                        </td>
                        <td
                                data-title="Loại giao dịch"
                                class="text-center"
                        >
                            Xuất vé
                        </td>
                        <td data-title="Code" class="text-center">
                            9JBDTY
                        </td>
                        <td data-title="Số lượng" class="text-center">
                            <b class="ff-medium">10</b>
                        </td>
                        <td data-title="Giá đại lý" class="text-right">
                            1.750.000 VNĐ
                        </td>
                        <td data-title="Người xuất" class="text-right">
                            THI XUAN LE
                        </td>
                        <td data-title="Nội dung" class="text-right">
                            API issue
                        </td>
                    </tr>

                    <tr>
                        <td
                                data-title="Ngày thực hiện"
                                class="text-center"
                        >
                            14:41 29/01/2022
                        </td>
                        <td data-title="Hãng">
                            <b class="ff-medium">Vietnam Airlines</b>
                        </td>
                        <td
                                data-title="Loại giao dịch"
                                class="text-center"
                        >
                            Xuất vé
                        </td>
                        <td data-title="Code" class="text-center">
                            9JBDTY
                        </td>
                        <td data-title="Số lượng" class="text-center">
                            <b class="ff-medium">10</b>
                        </td>
                        <td data-title="Giá đại lý" class="text-right">
                            1.750.000 VNĐ
                        </td>
                        <td data-title="Người xuất" class="text-right">
                            THI XUAN LE
                        </td>
                        <td data-title="Nội dung" class="text-right">
                            API issue
                        </td>
                    </tr>

                    <tr>
                        <td
                                data-title="Ngày thực hiện"
                                class="text-center"
                        >
                            14:41 29/01/2022
                        </td>
                        <td data-title="Hãng">
                            <b class="ff-medium">Vietnam Airlines</b>
                        </td>
                        <td
                                data-title="Loại giao dịch"
                                class="text-center"
                        >
                            Xuất vé
                        </td>
                        <td data-title="Code" class="text-center">
                            9JBDTY
                        </td>
                        <td data-title="Số lượng" class="text-center">
                            <b class="ff-medium">10</b>
                        </td>
                        <td data-title="Giá đại lý" class="text-right">
                            1.750.000 VNĐ
                        </td>
                        <td data-title="Người xuất" class="text-right">
                            THI XUAN LE
                        </td>
                        <td data-title="Nội dung" class="text-right">
                            API issue
                        </td>
                    </tr>

                    <tr>
                        <td
                                data-title="Ngày thực hiện"
                                class="text-center"
                        >
                            14:41 29/01/2022
                        </td>
                        <td data-title="Hãng">
                            <b class="ff-medium">Vietnam Airlines</b>
                        </td>
                        <td
                                data-title="Loại giao dịch"
                                class="text-center"
                        >
                            Xuất vé
                        </td>
                        <td data-title="Code" class="text-center">
                            9JBDTY
                        </td>
                        <td data-title="Số lượng" class="text-center">
                            <b class="ff-medium">10</b>
                        </td>
                        <td data-title="Giá đại lý" class="text-right">
                            1.750.000 VNĐ
                        </td>
                        <td data-title="Người xuất" class="text-right">
                            THI XUAN LE
                        </td>
                        <td data-title="Nội dung" class="text-right">
                            API issue
                        </td>
                    </tr>

                    <tr class="statistical">
                        <td colspan="2">
                            <b class="ff-bold">Tổng cộng</b>
                        </td>
                        <td colspan="2">
                            <b class="ff-bold">41 loại giao dịch</b>
                        </td>
                        <td colspan="2">
                            <b class="ff-bold">100 vé</b>
                        </td>
                        <td colspan="3">
                            <b class="ff-bold">20.000.000 VNĐ</b>
                        </td>
                    </tr>
                    </tbody>

                    <tfoot>
                    <tr>
                        <td colspan="5"></td>
                        <td colspan="2">
                            <div class="table-record-show">
                                <div class="select-row-table">
                                    <b class="ff-medium">Số hàng mỗi trang: </b>
                                    <select class="row-showed">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                    </select>
                                </div>
                                <p class="ml-2 ff-medium">1-10 of 276</p>
                            </div>
                        </td>
                        <td>
                            <div class="table-pagination">
                                <button class="btn next-record">
                                    <i class="fa-light fa-angle-left"></i>
                                </button>
                                <button class="btn prev-record">
                                    <i class="fa-light fa-angle-right"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    </tfoot>
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
<!--<div class="page-payment-report page-issue-report">-->
<!--    <div class="block-container">-->
<!--        <div class="block-title">-->
<!--            <div class="agent-info">-->
<!--                <div class="agent-info-wrap">-->
<!--                    <h2>--><?php //print(!empty($_user->field_account_transaction_name['und'][0]['value'])?$_user->field_account_transaction_name['und'][0]['value']:$_user->name); ?><!--</h2>-->
<!--                    <div class="agent-code">-->
<!--                        <label for="">Mã đại lý: </label> <span class="color-red">--><?php //print(!empty($_user->field_account_code['und'][0]['value'])?$_user->field_account_code['und'][0]['value']:""); ?><!--</span>-->
<!--                    </div>-->
<!--                    <div class="point">-->
<!--                        Điểm có thể sử dụng : <span class="account-point c-green">--><?php //print($_point - $_used_point); ?><!--</span>-->
<!--                    </div>-->
<!--                    <div class="group-balance" style="display: inline-flex;">-->
<!--                        <div class="add-balance" style=" ">-->
<!--                            Tài khoản chính : <span class="account-balance">--><?php //print(number_format($_user->field_account_balance['und'][0]['value'],0,",",".")); ?><!-- đ</span>-->
<!--                        </div>-->
<!--                        <div class="add-balance" style="margin-left: 50px;">-->
<!--                            <a href="/user/--><?php //echo $user->uid ?><!--/add-topup?destination=user/--><?php //echo $user->uid; ?><!--/topup" class="btn btn-primary">Nạp tiền</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="block-year">-->
<!--                        <form action="">-->
<!--                            Theo năm <select name="year" id="" class="form-control" onchange="this.form.submit()">-->
<!--                                --><?php //for($i=2019;$i<=date("Y",REQUEST_TIME);$i++): ?>
<!--                                    <option --><?php //if($selectedYear==$i) echo "selected"; ?><!-- value="--><?php //echo $i; ?><!--">--><?php //echo $i; ?><!--</option>-->
<!--                                --><?php //endfor; ?>
<!--                            </select>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="button-block">-->
<!--                <a href="/user/--><?php //print($user->uid); ?><!--/edit"><span class="fa fa-edit"></span> Cập nhật thông tin</a>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="block-general">-->
<!--            <div>-->
<!--                <div>Tổng doanh thu</div>-->
<!--                <p>--><?php //print(number_format($TotalTicketRevenue+$TotalRoomRevenue,0,",",".")); ?><!--<span>vnd</span></p>-->
<!--            </div>-->
<!--            <div>-->
<!--                <div>Doanh thu vé máy bay</div>-->
<!--                <p>--><?php // print(number_format($TotalTicketRevenue,0,",",".")); ?><!--<span>vnd</span></p>-->
<!--            </div>-->
<!--            <div>-->
<!--                <div>Doanh thu đặt phòng</div>-->
<!--                <p>--><?php //print(number_format($TotalRoomRevenue,0,",",".")); ?><!--<span>vnd</span></p>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="manager-links-tabs">-->
<!--            <div class="manager-links-tabs-content">-->
<!--                <ul class="nav" id="managerTab" role="tablist">-->
<!--                    <li class="ticket-booking --><?php //if($tab=="ticket") echo "active"; ?><!--" id="ticket-tab" >-->
<!--                        <a href="/user/manager/dashboard?tab=ticket&year=--><?php //echo $selectedYear ?><!--">-->
<!--                            <span class="icon"><img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-23.png" alt=""></span>-->
<!--                            <span>Vé máy bay</span>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="room-booking  --><?php //if($tab=="room") echo "active"; ?><!--" id="room-tab" >-->
<!--                        <a href="/user/manager/dashboard?tab=room&year=--><?php //echo $selectedYear ?><!--">-->
<!--                            <span class="icon"><img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-24.png" alt=""></span>-->
<!--                            <span>Đặt phòng</span>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="tab-content" id="myTabContent">-->
<!--            --><?php //if($tab=="room"): ?>
<!--                <div class="tab-pane fade show active in" id="manager-ticket" role="tabpanel" aria-labelledby="ticket-tab">-->
<!--                    --><?php
//                    //db_update("tbl_room_booking")->fields(array("tran_user"=>1))->condition("code","KS1613705130")->execute();
//                    drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/manager-room-booking-report.js', ['weight' => 1000]);
//                    drupal_add_js("https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js", ['weight' => 1000]);
//                    drupal_add_css("https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css", ['weight' => 1000]);
//                    ?>
<!--                    <div class="page-manager-room-booking-report">-->
<!--                        <!--                        <div class="filter-form" >-->-->
<!--                        <form action="">-->
<!--                            --><?php
//                            $cassiopeia_room_booking_report_filter_form = drupal_get_form("cassiopeia_room_booking_report_filter_form",array());
//                            if(!empty($cassiopeia_room_booking_report_filter_form)){
//                                $cassiopeia_room_booking_report_filter_form = drupal_render_children($cassiopeia_room_booking_report_filter_form);
//                                echo $cassiopeia_room_booking_report_filter_form;
//                            }
//                            ?>
<!--                        </form>-->
<!--                        <!--                        </div>-->-->
<!--                        <div class="table-responsive">-->
<!--                            <table class="table table-hovered table-stripped">-->
<!--                                <thead>-->
<!--                                <tr>-->
<!--                                    <th>Ngày thực hiện</th>-->
<!--                                    <th>Loại giao dịch</th>-->
<!--                                    <th>Mã GD</th>-->
<!--                                    <th>CODE</th>-->
<!--                                    <th>Tên khách sạn</th>-->
<!--                                    <th>Số khách</th>-->
<!--                                    <th>Số đêm</th>-->
<!--                                    <th>Giá bán</th>-->
<!--                                    --><?php //if(user_has_role(3)): ?>
<!--                                        <th>Giá vốn</th>-->
<!--                                        <th>Doanh thu</th>-->
<!--                                    --><?php //endif; ?>
<!--                                    <th>Đại lý</th>-->
<!--                                    <th>Người thực hiện</th>-->
<!--                                    <th>Nội dung</th>-->
<!--                                </tr>-->
<!--                                </thead>-->
<!--                                <tbody class="result">-->
<!---->
<!--                                </tbody>-->
<!--                            </table>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            --><?php //else: ?>
<!--                <div class="tab-pane fade show active in" id="manager-ticket" role="tabpanel" aria-labelledby="ticket-tab">-->
<!--                    <div class="filter-block">-->
<!--                        --><?php
//                        $cassiopeia_user_dashboard_ticket_filter_form = drupal_get_form("cassiopeia_isue_report_filter_form");
//                        if(!empty($cassiopeia_user_dashboard_ticket_filter_form)){
//                            echo drupal_render($cassiopeia_user_dashboard_ticket_filter_form);
//                        }
//                        ?>
<!---->
<!--                    </div>-->
<!--                    <div class="items block-items">-->
<!---->
<!--                    </div>-->
<!--                </div>-->
<!--            --><?php //endif; ?>
<!--        </div>-->
<!--    </div>-->
<!--</div>-->