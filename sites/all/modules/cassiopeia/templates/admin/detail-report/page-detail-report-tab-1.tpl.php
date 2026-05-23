<?php
$date_filter = !empty($variables['date_filter'])?$variables['date_filter']:null;
$cache['date_filter'] = $date_filter;
?>
<div id="tab-1" class="">
    <div class="filter-block">
        <?php

        $cassiopeia_detail_report_tab_1_filter_form = drupal_get_form("cassiopeia_select_month_form",$cache);
        if(!empty($cassiopeia_detail_report_tab_1_filter_form)){
            $cassiopeia_detail_report_tab_1_filter_form = drupal_render($cassiopeia_detail_report_tab_1_filter_form);
            print($cassiopeia_detail_report_tab_1_filter_form);
        }
        try{
            $query = db_select("tbl_issue_report","tbl_issue_report");
            $query->fields("tbl_issue_report");
            $query->join("users","tbl_users","tbl_users.uid=tbl_issue_report.agent");
            $query->join("field_data_field_account_sale","tbl_sale","tbl_sale.entity_id=tbl_issue_report.agent");
            $query->addField("tbl_sale","field_account_sale_target_id","sale");
            if(!empty($date_filter && $date_filter!="all")){
                $first_day_of_moth = strtotime(date('Y-m-01 00:00:00',strtotime("01-".$date_filter)));
                $last_day_of_moth = strtotime(date("Y-m-t 23:59:59",strtotime("01-".$date_filter)));
                $query->condition("tbl_issue_report.created",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
            }
            $tab_1_result = $query->execute()->fetchAll();
        }catch (Exception $e){
            print_r($e);
        }
        //_print_r($result);
        $tab1_total_partner_price = 0;
        $tab1_total_price = 0;
        $tab1_revenue = 0;
        $tab1_quantity = 0;
        $total_balance = 0;
        if(!empty($tab_1_result)){
            foreach($tab_1_result as $value){
                $tab1_total_partner_price+=$value->partner_price;
                $tab1_total_price+=$value->price;
                $tab1_quantity+=$value->quantity;
            }
            $tab1_revenue = ($tab1_total_partner_price-$tab1_total_price);
        }
        ?>
    </div>
    <table class="table table-hover">
        <tbody>
        <tr>
            <td width="200px">Tổng giá AG</td>
            <td><?php print(number_format($tab1_total_partner_price,0,",",",")); ?></td>
        </tr>
        <tr>
            <td>Tổng giá vốn</td>
            <td><?php print(number_format($tab1_total_price,0,",",",")); ?></td>
        </tr>
        <tr>
            <td>Doanh thu</td>
            <td><?php print(number_format($tab1_revenue,0,",",",")); ?></td>
        </tr>
        <tr>
            <td>Tổng số vé</td>
            <td><?php print($tab1_quantity); ?></td>
        </tr>
        </tbody>
    </table>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Ngày</th>
            <th>Số lượng</th>
            <th>Giá AG</th>
            <th>Giá vốn</th>
            <th>Doanh thu</th>
        </tr>
        </thead>
        <tbody>
        <?php for($i=1;$i<=date("t", strtotime("01-".$date_filter));$i++): ?>
            <?php
            $_result = null;
            try{
                _print_r(array(strtotime($i.date("-m-Y 00:00:00",strtotime("01-".$date_filter))),strtotime($i.date("-m-Y 23:59:59",strtotime("01-".$date_filter)))));
                $query = db_select("tbl_issue_report","tbl_issue_report");
                $query->fields("tbl_issue_report");
                $query->join("users","tbl_users","tbl_users.uid=tbl_issue_report.agent");
                $query->join("field_data_field_account_sale","tbl_sale","tbl_sale.entity_id=tbl_issue_report.agent");
                $query->addField("tbl_sale","field_account_sale_target_id","sale");
                $query->condition("tbl_issue_report.created",array(strtotime($i.date("-m-Y 00:00:00",strtotime("01-".$date_filter))),strtotime($i.date("-m-Y 23:59:59",strtotime("01-".$date_filter)))),"BETWEEN");
                $_result = $query->execute()->fetchAll();
                $temp_quantity = 0;
                $temp_total_partner_price = 0;
                $temp_total_price = 0;
                if(!empty($_result)){
                    foreach($_result as $value){
                        $temp_quantity+=$value->quantity;
                        $temp_total_partner_price+=$value->partner_price;
                        $temp_total_price+=$value->price;
                    }
                }
            }catch (Exception $e){
                throw($e);
//                            die;
            }
            ?>
            <tr>
                <td><?php print($i.date("-m-Y",strtotime("01-".$date_filter))); ?></td>
                <td>
                    <?php print($temp_quantity); ?>
                </td>
                <td><?php print(number_format($temp_total_partner_price,0,",",".")); ?></td>
                <td><?php print(number_format($temp_total_price,0,",",".")); ?></td>
                <td><?php print(number_format($temp_total_partner_price - $temp_total_price,0,",",".")); ?></td>
            </tr>
        <?php endfor; ?>
        </tbody>
    </table>
</div>