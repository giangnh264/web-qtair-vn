<?php
global $user;
$date_filter = !empty($_REQUEST['date_filter'])?$_REQUEST['date_filter']:date("m-Y",REQUEST_TIME);
$cache['date_filter'] = $date_filter;
try{
    $query = db_select("tbl_room_booking_report","tbl_room_booking_report");
    $query->fields("tbl_room_booking_report");
    $query->join("users","tbl_users","tbl_users.uid=tbl_room_booking_report.agent");
    $query->leftJoin("field_data_field_account_sale","tbl_sale","tbl_sale.entity_id=tbl_room_booking_report.agent");
    if(!empty($date_filter && $date_filter!="all")){
        $first_day_of_moth = strtotime(date('Y-m-01 00:00',strtotime("01-".$date_filter)));
        $last_day_of_moth = strtotime(date("Y-m-t 23:59",strtotime("01-".$date_filter)));
        $query->condition("tbl_room_booking_report.created",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
    }
    $query->addField("tbl_sale","field_account_sale_target_id","sale");
    $result = $query->execute()->fetchAll();
}catch (Exception $e){
    print_r($e);
}


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
    </div>
</div>
<?php endif; ?>