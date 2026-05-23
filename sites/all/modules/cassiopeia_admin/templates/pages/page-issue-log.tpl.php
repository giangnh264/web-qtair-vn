<?php
$cache = isset($_REQUEST['data'])?$_REQUEST['data']:array();
if(empty($cache['date_filter'])){
    $cache['date_filter'] = "today";
}
$query = db_select("cassiopeia_ticket_issue_log","cassiopeia_ticket_issue_log");
$query->fields("cassiopeia_ticket_issue_log");
$query->orderBy("cassiopeia_ticket_issue_log.created","DESC");
$query->orderBy("cassiopeia_ticket_issue_log.id","DESC");
$query->leftJoin("users","tbl_user","tbl_user.uid=cassiopeia_ticket_issue_log.uid");
$query->leftJoin("field_data_field_account_transaction_name","field_account_transaction_name","field_account_transaction_name.entity_id=tbl_user.uid");
$query->leftJoin("field_data_field_account_code","field_account_code","field_account_code.entity_id=tbl_user.uid");
$query->addField("field_account_code","field_account_code_value","field_account_code_value");
$query->addField("field_account_transaction_name","field_account_transaction_name_value","field_account_transaction_name_value");
if(!empty($cache['date_filter']&& $cache['date_filter']!="all")){
    switch ($cache['date_filter']){
        case "today" :
            $query->condition("cassiopeia_ticket_issue_log.created",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME)),strtotime(date("d-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
            break;
        case "yesterday" :
            $query->condition("cassiopeia_ticket_issue_log.created",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME-86400)),strtotime(date("d-m-Y 23:59",REQUEST_TIME-86400))),"BETWEEN");
            break;
        case "thismonth" :
            $query->condition("cassiopeia_ticket_issue_log.created",array(strtotime(date("01-m-Y 00:00",REQUEST_TIME)),strtotime(date("t-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
            break;
        case "other":
            if(!empty($cache['from_date'])){
                $query->condition("cassiopeia_ticket_issue_log.created",strtotime(date("d-m-Y 00:00",strtotime($cache['from_date']))),">=");
            }
            if($cache['to_date']){
                $query->condition("cassiopeia_ticket_issue_log.created",strtotime(date("d-m-Y 23:59",strtotime($cache['to_date']))),"<=");
            }
            break;
    }
}
if(!empty($cache['tran_user']) && $cache['tran_user']!="all"){
    $query -> condition("cassiopeia_ticket_issue_log.uid",$cache['tran_user'],"=");
}
if(!empty($cache['booking_code'])){
    $query -> condition("cassiopeia_ticket_issue_log.booking_code",$cache['booking_code'],"=");
}
if(!empty($cache['pnr_code'])){
    $query -> condition("cassiopeia_ticket_issue_log.pnr_code",$cache['pnr_code'],"=");
}
if(!empty($cache['status']) && $cache['status']!="all"){
    if($cache['issue_type']==1){
        $query -> condition("cassiopeia_ticket_issue_log.status",$cache['status'],"=");
    }else{
        $query -> condition("cassiopeia_ticket_issue_log.status",$cache['status'],"<>");
    }

}
if(!empty($cache['issue_type']) && $cache['issue_type']!="all"){
    if($cache['issue_type']==2){
        $query -> condition("cassiopeia_ticket_issue_log.issue_type",$cache['issue_type'],"=");
    }else{
        $or = db_or();
        $or->where("cassiopeia_ticket_issue_log.issue_type is null");
        $or -> condition("cassiopeia_ticket_issue_log.issue_type","","=");
        $query->condition($or);
    }
}
$result = $query->execute()->fetchAll();
_print_r($result);
$limit = 50;
$page = pager_default_initialize(count($result), $limit, 0);
$offset = $limit * $page;
if(!empty($result)){
    $result = array_slice($result, $offset, $limit);
}else{
    $result=null;
}
?>
<div class="page-issue-log">
    <div class="filter-block">
        <?php
        $cassiopeia_issue_log_filter_form = drupal_get_form("cassiopeia_issue_log_filter_form",$cache);
        echo drupal_render($cassiopeia_issue_log_filter_form);
        ?>
    </div>
    <table class="table table-hover table-stripped">
        <thead>
        <tr>
            <th>Ngày xuất</th>
            <th>Người xuất</th>
            <th>Mã giao dịch</th>
            <th>PNR</th>
            <th>Kiểu xuất</th>
            <th>Tình trạng</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach((array)$result as $value): ?>
            <tr>
                <td><?php echo date("d-m-Y H:i:s",$value->created); ?></td>
                <td>
                    <?php
                    $transaction_name = !empty($value->field_account_transaction_name_value)?$value->field_account_transaction_name_value:"";
                    $account_code = !empty($value->field_account_code_value)?$value->field_account_code_value:"";
                    echo $account_code." - ".$transaction_name;
                    ?>
                </td>
                <td><?php echo $value->booking_code; ?></td>
                <td><?php echo $value->pnr_code; ?></td>
                <td><?php echo $value->issue_type==2?"Xuất ngay":"Xuất thường"; ?></td>
                <td><?php echo $value->status==='0'?"OK":$value->status; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <!-- paging-->
    <div class="page">
        <div class="cassiopeia-pagination">
            <div class="cassiopeia-pagination-container">
                <?php print (theme('pager',  array('tags' => array('«','‹','','›','»'))));?>
            </div>
        </div>
    </div>
    <!--e: paging-->
</div>