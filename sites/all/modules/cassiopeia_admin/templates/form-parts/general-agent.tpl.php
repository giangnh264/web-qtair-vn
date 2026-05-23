<?php
$cache = $variables['cache'];
$date_filter = !empty($cache['date_filter'])?$cache['date_filter']:date("m-Y",REQUEST_TIME);
//_print_r($cache);
try{
    $dangky_query = db_select("users","tbl_dangky");
    $dangky_query->join("users_roles","tbl_role","tbl_role.uid = tbl_dangky.uid");
    $dangky_query->condition("tbl_role.rid",4);
    $dangky_query->leftJoin("field_data_field_account_status","field_account_status","field_account_status.entity_id = tbl_dangky.uid");
    $dangky_query->leftJoin("field_data_field_account_sale","tbl_sale","tbl_sale.entity_id = tbl_dangky.uid");
    $dangky_query->fields("tbl_sale",array("field_account_sale_target_id"));
    $dangky_query->orderBy("tbl_dangky.created","DESC");
    $dangky_query->condition("field_account_status.field_account_status_tid",10);
    if(!empty($date_filter && $date_filter!="all")){
        $first_day_of_moth = strtotime(date('Y-m-01 00:00',strtotime("01-".$date_filter)));
        $last_day_of_moth = strtotime(date("Y-m-t 23:59",strtotime("01-".$date_filter)));
        $dangky_query->condition("tbl_dangky.created",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
    }
    $dangky_query->addExpression("COUNT(tbl_dangky.uid)","count_dangky");
    $dangky_query->groupBy("tbl_sale.field_account_sale_target_id");

    $tiemnang_query = db_select("users","tbl_tiemnang");
    $tiemnang_query->addField("tbl_tiemnang","uid","agent_id");
    $tiemnang_query -> join("users_roles","tbl_role","tbl_role.uid = tbl_tiemnang.uid");
    $tiemnang_query -> condition("tbl_role.rid",4);
    $tiemnang_query -> leftJoin("field_data_field_account_status","field_account_status","field_account_status.entity_id = tbl_tiemnang.uid");
    $tiemnang_query -> join("field_data_field_account_sale","tbl_sale","tbl_sale.entity_id = tbl_tiemnang.uid");
    $tiemnang_query->fields("tbl_sale",array("field_account_sale_target_id"));
    $tiemnang_query->fields("tbl_tiemnang");
    $tiemnang_query->orderBy("tbl_tiemnang.created","DESC");
    $tiemnang_query->condition("field_account_status.field_account_status_tid",22);
    if(!empty($date_filter && $date_filter!="all")){
        $first_day_of_moth = strtotime(date('Y-m-01 00:00',strtotime("01-".$date_filter)));
        $last_day_of_moth = strtotime(date("Y-m-t 23:59",strtotime("01-".$date_filter)));
        $tiemnang_query->condition("tbl_tiemnang.created",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
    }
    $tiemnang_query->addExpression("COUNT(tbl_tiemnang.uid)","count_tiemnang");
    $tiemnang_query->groupBy("tbl_sale.field_account_sale_target_id");

    $daban_query = db_select("users","tbl_daban");
    $daban_query->addField("tbl_daban","uid","agent_id");
    $daban_query->join("users_roles","tbl_role","tbl_role.uid = tbl_daban.uid");
    $daban_query->condition("tbl_role.rid",4);
    $daban_query->leftJoin("field_data_field_account_status","field_account_status","field_account_status.entity_id = tbl_daban.uid");
    $daban_query->leftJoin("field_data_field_account_updated_date","field_account_updated_date","field_account_updated_date.entity_id = tbl_daban.uid");
    $daban_query->join("field_data_field_account_sale","tbl_sale","tbl_sale.entity_id = tbl_daban.uid");
    $daban_query->fields("tbl_sale",array("field_account_sale_target_id"));
    $daban_query->fields("tbl_daban");
    $daban_query->orderBy("field_account_updated_date.field_account_updated_date_value","DESC");
    $daban_query->condition("field_account_status.field_account_status_tid",13);
    if(!empty($date_filter && $date_filter!="all")){
        $first_day_of_moth = strtotime(date('Y-m-01 00:00',strtotime("01-".$date_filter)));
        $last_day_of_moth = strtotime(date("Y-m-t 23:59",strtotime("01-".$date_filter)));
        $daban_query->condition("field_account_updated_date.field_account_updated_date_value",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
    }
    $daban_query->addExpression("COUNT(tbl_daban.uid)","count_daban");
    $daban_query->groupBy("tbl_sale.field_account_sale_target_id");

    $nghiban_query = db_select("users","tbl_nghiban");
    $nghiban_query->addField("tbl_nghiban","uid","agent_id");
    $nghiban_query -> join("users_roles","tbl_role","tbl_role.uid = tbl_nghiban.uid");
    $nghiban_query -> condition("tbl_role.rid",4);
    $nghiban_query -> leftJoin("field_data_field_account_status","field_account_status","field_account_status.entity_id = tbl_nghiban.uid");
    $nghiban_query->fields("field_account_status");
    $nghiban_query -> join("field_data_field_account_sale","tbl_sale","tbl_sale.entity_id = tbl_nghiban.uid");
    $nghiban_query->fields("tbl_sale",array("field_account_sale_target_id"));
    $nghiban_query->orderBy("tbl_nghiban.created","DESC");
    if(!empty($date_filter && $date_filter!="all")){
        $first_day_of_moth = strtotime(date('Y-m-01 00:00',strtotime("01-".$date_filter)));
        $last_day_of_moth = strtotime(date("Y-m-t 23:59",strtotime("01-".$date_filter)));
        $nghiban_query->condition("tbl_nghiban.created",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
    }
    $nghiban_query->condition("field_account_status.field_account_status_tid",14);
    $nghiban_query->addExpression("COUNT(tbl_nghiban.uid)","count_nghiban");
    $nghiban_query->groupBy("tbl_sale.field_account_sale_target_id");

    $tbl_issue_report_query = db_select("tbl_issue_report","tbl_issue_report");
    $tbl_issue_report_query->fields("tbl_issue_report");
    if(!empty($date_filter && $date_filter!="all")){
        $first_day_of_moth = strtotime(date('Y-m-01 00:00',strtotime("01-".$date_filter)));
        $last_day_of_moth = strtotime(date("Y-m-t 23:59",strtotime("01-".$date_filter)));
        $tbl_issue_report_query->condition("tbl_issue_report.date",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
    }
    $tbl_issue_report_query->groupBy("tbl_issue_report.agent");

    $hoatdong_query = db_select("users","tbl_hoatdong");
    $hoatdong_query->addField("tbl_hoatdong","uid","agent_id");
    $hoatdong_query -> join("users_roles","tbl_role","tbl_role.uid = tbl_hoatdong.uid");
    $hoatdong_query -> condition("tbl_role.rid",4);
    $hoatdong_query -> join("field_data_field_account_sale","tbl_sale","tbl_sale.entity_id = tbl_hoatdong.uid");
    $hoatdong_query->fields("tbl_sale",array("field_account_sale_target_id"));
    $hoatdong_query->join($tbl_issue_report_query,"tbl_issue_report","tbl_issue_report.agent=tbl_hoatdong.uid");
    $hoatdong_query->orderBy("tbl_hoatdong.created","DESC");

    $hoatdong_query->addExpression("COUNT(tbl_hoatdong.uid)","count_hoatdong");
    $hoatdong_query->groupBy("tbl_sale.field_account_sale_target_id");

    $query = db_select("users","tbl_sale");
    $query->fields("tbl_sale");
    $query -> join("users_roles","tbl_role","tbl_role.uid = tbl_sale.uid");
    $query -> condition("tbl_role.rid",5);

    $query->leftJoin($tiemnang_query,"tbl_tiemnang","tbl_tiemnang.field_account_sale_target_id=tbl_sale.uid");
    $query->addField("tbl_tiemnang","count_tiemnang","total_tiemnang");

    $query->leftJoin($daban_query,"tbl_daban","tbl_daban.field_account_sale_target_id=tbl_sale.uid");
    $query->addField("tbl_daban","count_daban","total_daban");

    $query->leftJoin($nghiban_query,"tbl_nghiban","tbl_nghiban.field_account_sale_target_id=tbl_sale.uid");
    $query->addField("tbl_nghiban","count_nghiban","total_nghiban");

    $query->leftJoin($hoatdong_query,"tbl_hoatdong","tbl_hoatdong.field_account_sale_target_id=tbl_sale.uid");
    $query->addField("tbl_hoatdong","count_hoatdong","total_hoatdong");

    $query->leftJoin($dangky_query,"tbl_dangky","tbl_dangky.field_account_sale_target_id=tbl_sale.uid");
    $query->addField("tbl_dangky","count_dangky","total_dangky");
    if(!empty($cache['form_state'])){
        $sort_by = $cache['form_state']['sort_by'];
        $sort_direction = $cache['form_state']['sort_direction'];
        if($sort_by=="sale"){
            $query->orderBy("tbl_sale.uid","ASC");
        }else{
            $query->orderBy("CAST(".$sort_by." AS int)",$sort_direction);
        }
    }else{
        $query->orderBy("total_hoatdong","DESC");
    }

    $result = $query -> execute() -> fetchAll();
    $total_query = db_select($query,"tbl_total");
    $total_query->addExpression("SUM(total_dangky)","dangky");
    $total_query->addExpression("SUM(total_hoatdong)","hoatdong");
    $total_query->addExpression("SUM(total_tiemnang)","tiemnang");
    $total_query->addExpression("SUM(total_daban)","daban");
    $total_query->addExpression("SUM(total_nghiban)","nghiban");
    $total_result = $total_query->execute()->fetchObject();
}catch (Exception $e){
    print_r($e);
}
?>

<table class="table table-hover">
    <thead>
    <tr>
        <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="sale") echo $cache['sort_direction']; ?>" data-sort="sale" class="sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="sale") echo $cache['sort_direction']; ?>">SALE</th>
        <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_dangky") echo $cache['sort_direction']; ?>" data-sort="total_dangky" class="sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_dangky") echo $cache['sort_direction']; ?>">Đăng kí</th>
        <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_tiemnang") echo $cache['sort_direction']; ?>" data-sort="total_tiemnang" class="sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_tiemnang") echo $cache['sort_direction']; ?>">Tiềm năng</th>
        <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_daban") echo $cache['sort_direction']; ?>" data-sort="total_daban" class="sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_daban") echo $cache['sort_direction']; ?>">Đã bán</th>
        <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_nghiban") echo $cache['sort_direction']; ?>" data-sort="total_nghiban" class="sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_nghiban") echo $cache['sort_direction']; ?>">Nghỉ bán</th>
        <th data-direction="<?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_hoatdong") echo $cache['sort_direction']; ?>" data-sort="total_hoatdong" class="sort_able <?php if(!empty($cache['sort_by'])&&$cache['sort_by']=="total_hoatdong") echo $cache['sort_direction']; ?>">Hoạt động</th>
    </tr>
    <tr>
        <th>Tổng</th>
        <th><?php echo number_format($total_result->dangky,0,",","."); ?></th>
        <th><?php echo number_format($total_result->tiemnang,0,",","."); ?></th>
        <th><?php echo number_format($total_result->daban,0,",","."); ?></th>
        <th><?php echo number_format($total_result->nghiban,0,",","."); ?></th>
        <th><?php echo number_format($total_result->hoatdong,0,",","."); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php if(!empty($result)): $hoatdong=0; ?>
        <?php foreach($result as $uid => $value):  $sale = user_load($value->uid);?>
            <?php $hoatdong+=$value->total_hoatdong; ?>
            <tr>
                <td colspan="1">
                    <?php print(!empty($sale->field_account_transaction_name['und'][0]['value'])?$sale->field_account_transaction_name['und'][0]['value']:"");?>
                </td>
                <td><?php echo !empty($value->total_dangky)?$value->total_dangky:0; ?></td>
                <td><a href="/admin/manager/partners/<?php print($sale->uid); ?>/22/<?php echo($date_filter); ?>"><?php echo !empty($value->total_tiemnang)?$value->total_tiemnang:0; ?></a></td>
                <td><a href="/admin/manager/partners/<?php print($sale->uid); ?>/13/<?php echo($date_filter); ?>"><?php echo !empty($value->total_daban)?$value->total_daban:0; ?></a></td>
                <td><a href="/admin/manager/partners/<?php print($sale->uid); ?>/14/<?php echo($date_filter); ?>"><?php echo !empty($value->total_nghiban)?$value->total_nghiban:0; ?></a></td>
                <td><?php echo !empty($value->total_hoatdong)?$value->total_hoatdong:0; ?></td>
            </tr>
        <?php endforeach; ?>

    <?php endif; ?>
    </tbody>
</table>
