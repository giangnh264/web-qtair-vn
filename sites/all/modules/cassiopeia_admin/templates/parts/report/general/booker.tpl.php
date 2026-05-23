<?php
global $user;
$date_filter = !empty($_REQUEST['date_filter'])?$_REQUEST['date_filter']:date("m-Y",REQUEST_TIME);
$cache['date_filter'] = $date_filter;
try{
//    $query = db_select("tbl_issue_report","tbl_issue_report");
//    $query->fields("tbl_issue_report");
    $issue_query = db_select("tbl_issue_report","tbl_issue_report");
    $issue_query->fields("tbl_issue_report",array("created"));
    $issue_query->addExpression("1","type");
    $issue_query->addField("tbl_issue_report","date","date");
    $issue_query->addField("tbl_issue_report","partner_price","partner_price");
    $issue_query->addField("tbl_issue_report","price","price");
    $issue_query->addField("tbl_issue_report","quantity","quantity");
    $issue_query->addField("tbl_issue_report","agent","agent");
    $issue_query->addField("tbl_issue_report","tran_user","tran_user");

    $room_query = db_select("tbl_room_booking_report","tbl_room_booking_report");
    $room_query->fields("tbl_room_booking_report",array("created"));
    $room_query->addExpression("2","type");
    $room_query->addField("tbl_room_booking_report","created","date");
    $room_query->addField("tbl_room_booking_report","partner_price","partner_price");
    $room_query->addField("tbl_room_booking_report","price","price");
    $room_query->addField("tbl_room_booking_report","night","quantity");
    $room_query->addField("tbl_room_booking_report","agent","agent");
    $room_query->addField("tbl_room_booking_report","tran_user","tran_user");
    $query = Database::getConnection()
        ->select($issue_query->union($room_query))
        ->fields(NULL, array("date","type","partner_price","price","quantity","agent","tran_user"));
    $query->join("users","tbl_users","tbl_users.uid=agent");
    $query->leftJoin("field_data_field_account_sale","tbl_sale","tbl_sale.entity_id=agent");
    if(!empty($date_filter && $date_filter!="all")){
        $first_day_of_moth = strtotime(date('Y-m-01 00:00',strtotime("01-".$date_filter)));
        $last_day_of_moth = strtotime(date("Y-m-t 23:59",strtotime("01-".$date_filter)));
        $query->condition("date",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
    }
    $query->addField("tbl_sale","field_account_sale_target_id","sale");
    $result = $query->execute()->fetchAll();
}catch (Exception $e){
    print_r($e);
}
//_print_r($result);
//die;

$total_partner_price = 0;
$total_price = 0;
$revenue = 0;
$quantity = 0;
$total_balance = 0;
$airline = array();
$partners = array();
$sales = array();
$tran_users = array();
if(!empty($result)){
    foreach($result as $value){
        if(user_has_role(5)){
            if($value->sale!=$user->uid){
                continue;
            }
        }
        $total_partner_price+=$value->partner_price;
        $total_price+=$value->price;
        $quantity+=$value->quantity;

        if(!empty($tran_users[$value->tran_user]['quantity'])){
            $tran_users[$value->tran_user]['quantity']+=$value->quantity;
            $tran_users[$value->tran_user]['partner_price']+=$value->partner_price;
            $tran_users[$value->tran_user]['price']+=$value->price;
        }else{
            $tran_users[$value->tran_user]['quantity']=$value->quantity;
            $tran_users[$value->tran_user]['partner_price']=$value->partner_price;
            $tran_users[$value->tran_user]['price']=$value->price;
        }

    }
    $revenue = ($total_partner_price-$total_price);
}
//_print_r($tran_users);
//$limit = 50;
//$page = pager_default_initialize(count($tran_users), $limit, 0);
//$offset = $limit * $page;
//if(!empty($tran_users)){
//    $tran_users = array_slice($tran_users, $offset, $limit);
//}else{
//    $tran_users=null;
//}
?>
<?php if(user_has_role(3) || user_has_role(7)|| user_has_role(8)): ?>
    <div id="tab-5" class="">
        <?php
        $cassiopeia_detail_report_tab_2_filter_form = drupal_get_form("cassiopeia_select_month_form",$cache);
        if(!empty($cassiopeia_detail_report_tab_2_filter_form)){
            $cassiopeia_detail_report_tab_2_filter_form = drupal_render($cassiopeia_detail_report_tab_2_filter_form);
            print($cassiopeia_detail_report_tab_2_filter_form);
        }
        ?>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Booker</th>
                    <th>Số lượng</th>
                    <th>Giá AG</th>
                    <th>Giá vốn</th>
                    <th>Doanh thu</th>
                </tr>
                <tr>
                    <th>Tổng</th>
                    <th><?php print(number_format($quantity,0,",",",")); ?></th>
                    <th><?php print(number_format($total_partner_price,0,",",",")); ?></th>
                    <th><?php print(number_format($total_price,0,",",",")); ?></th>
                    <th><?php print(number_format($revenue,0,",",",")); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($tran_users)): ?>
                    <?php foreach($tran_users as $key => $value): ?>
                        <?php  $tran_user = user_load($key); ?>
                        <tr>
                            <td>
                                <?php

                                if(!empty($tran_user)){
                                    $account_code = !empty($tran_user->field_account_code['und'][0]['value'])?$tran_user->field_account_code['und'][0]['value']:"";
                                    $account_transaction_name = !empty($tran_user->field_account_transaction_name['und'][0]['value'])?$tran_user->field_account_transaction_name['und'][0]['value']:"";
                                    print($account_transaction_name);
                                }
                                ?>
                            </td>
                            <td><?php print(number_format($value['quantity'],0,",",".")); ?></td>
                            <td><?php print(number_format($value['partner_price'],0,",",".")); ?></td>
                            <td><?php print(number_format($value['price'],0,",",".")); ?></td>
                            <td><?php print(number_format(($value['partner_price']-$value['price']),0,",",".")); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
            <!-- paging-->
<!--            <div class="page">-->
<!--                <div class="cassiopeia-pagination">-->
<!--                    <div class="cassiopeia-pagination-container">-->
<!--                        --><?php //print (theme('pager',  array('tags' => array('«','‹','','›','»'))));?>
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <!--e: paging-->
        </div>
    </div>
<?php endif; ?>