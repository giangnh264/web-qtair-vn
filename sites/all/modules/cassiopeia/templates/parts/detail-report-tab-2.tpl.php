<?php
global $user;
$date_filter = !empty($_REQUEST['date_filter'])?$_REQUEST['date_filter']:date("m-Y",REQUEST_TIME);
$cache['date_filter'] = $date_filter;
?>
<div id="tab-2" class="">
    <div class="filter-block">
        <?php
        $cassiopeia_detail_report_tab_2_filter_form = drupal_get_form("cassiopeia_select_month_form",$cache);
        if(!empty($cassiopeia_detail_report_tab_2_filter_form)){
            $cassiopeia_detail_report_tab_2_filter_form = drupal_render($cassiopeia_detail_report_tab_2_filter_form);
            print($cassiopeia_detail_report_tab_2_filter_form);
        }
        try{
            $query = db_select("tbl_issue_report","tbl_issue_report");
            $query->fields("tbl_issue_report");
            $query->join("users","tbl_users","tbl_users.uid=tbl_issue_report.agent");
            $query->leftJoin("field_data_field_account_sale","tbl_sale","tbl_sale.entity_id=tbl_issue_report.agent");
            $query->addField("tbl_sale","field_account_sale_target_id","sale");
            if(!empty($date_filter && $date_filter!="all")){
                $first_day_of_moth = strtotime(date('Y-m-01 00:00',strtotime("01-".$date_filter)));
                $last_day_of_moth = strtotime(date("Y-m-t 23:59",strtotime("01-".$date_filter)));
                $query->condition("tbl_issue_report.date",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
            }
            $result = $query->execute()->fetchAll();

            $total_partner_price_airline = 0;
            $total_price_airline = 0;
            $revenue_airline = 0;
            $quantity_airline = 0;
            $total_balance_airline = 0;
            $airline_airline = array();
            $partners_airline = array();
            $sales_airline = array();
            $tran_users_airline = array();
            if(!empty($result)){
                foreach($result as $value){
                    if(user_has_role(5)){
                        if($value->sale!=$user->uid){
                            continue;
                        }
                    }
                    $total_partner_price_airline+=$value->partner_price;
                    $total_price_airline+=$value->price;
                    $quantity_airline+=$value->quantity;

                    if(!empty($airline_airline[$value->airline]['quantity'])){
                        $airline_airline[$value->airline]['quantity']+=$value->quantity;
                        $airline_airline[$value->airline]['partner_price']+=$value->partner_price;
                        $airline_airline[$value->airline]['price']+=$value->price;
                    }else{
                        $airline_airline[$value->airline]['quantity']=$value->quantity;
                        $airline_airline[$value->airline]['partner_price']=$value->partner_price;
                        $airline_airline[$value->airline]['price']=$value->price;
                    }
                }
                $revenue_airline = ($total_partner_price_airline-$total_price_airline);
            }
        }catch (Exception $e){
            print_r($e);
        }
        ?>
    </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Hãng</th>
                <th>Số lượng</th>
                <th>Giá AG</th>
                <th>Giá vốn</th>
                <th>Doanh thu</th>
            </tr>
            <tr>
                <th>Tổng</th>
                <th><?php print(number_format($quantity_airline,0,",",",")); ?></th>
                <th><?php print(number_format($total_partner_price_airline,0,",",",")); ?></th>
                <th><?php print(number_format($total_price_airline,0,",",",")); ?></th>
                <th><?php print(number_format($revenue_airline,0,",",",")); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php if(!empty($airline_airline)): ?>
                <?php foreach($airline_airline as $key => $value): ?>
                    <tr>
                        <td><?php print($key); ?></td>
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