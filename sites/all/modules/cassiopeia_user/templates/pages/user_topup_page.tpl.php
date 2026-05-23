<?php
global $user;
$cache = isset($_REQUEST['data'])?$_REQUEST['data']:array();
if(empty($cache['date_filter'])){
    $cache['date_filter'] = "thismonth";
}
$cache['redirect'] = "/user/".$user->uid."/topup";
try{
    $tran_user_query = db_select("users","tbl_user");
    $tran_user_query->addField("tbl_user","uid","uid");
    $tran_user_query->join("field_data_field_account_transaction_name", "field_account_transaction_name", "field_account_transaction_name.entity_id=tbl_user.uid");
    $tran_user_query->join("field_data_field_account_code", "field_account_code", "field_account_code.entity_id=tbl_user.uid");
    $tran_user_query->addField("field_account_transaction_name", "field_account_transaction_name_value", "agent_transaction_name");
    $tran_user_query->addField("field_account_code", "field_account_code_value", "agent_code");


    $query = db_select("tbl_user_topup","tbl_user_topup");
    $query->fields("tbl_user_topup");
    $query->condition("tbl_user_topup.uid",$user->uid);
    $query->orderBy("tbl_user_topup.created","DESC");
    $query->join("node","tbl_node","tbl_node.nid=tbl_user_topup.bank");
    $query->addField("tbl_node","title","bank_title");
    $query->leftJoin("field_data_field_code","field_code","field_code.entity_id=tbl_node.nid");
    $query->addField("field_code","field_code_value","bank_code");
    $query->leftJoin($tran_user_query,"tbl_tran_user","tbl_tran_user.uid=tbl_user_topup.tran_user");
    $query->fields("tbl_tran_user");

    if(!empty($cache['date_filter']&& $cache['date_filter']!="all")){
        switch ($cache['date_filter']){
            case "today" :
                $query->condition("tbl_user_topup.created",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME)),strtotime(date("d-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
                break;
            case "yesterday" :
                $query->condition("tbl_user_topup.created",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME-86400)),strtotime(date("d-m-Y 23:59",REQUEST_TIME-86400))),"BETWEEN");
                break;
            case "thismonth" :
                $query->condition("tbl_user_topup.created",array(strtotime(date("01-m-Y 00:00",REQUEST_TIME)),strtotime(date("t-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
                break;
            case "other":
                if(!empty($cache['from_date'])){
                    $query->condition("tbl_user_topup.created",strtotime(date("d-m-Y 00:00",strtotime($cache['from_date']))),">=");
                }
                if($cache['to_date']){
                    $query->condition("tbl_user_topup.created",strtotime(date("d-m-Y 23:59",strtotime($cache['to_date']))),"<=");
                }
                break;
        }
    }

    if(!empty($cache['bank'])&&$cache['bank']!="all"){
        $query->condition("tbl_user_topup.bank",$cache['bank']);
    }

    if(!empty($cache['tran_user'])&&$cache['tran_user']!="all"){
        $query->condition("tbl_user_topup.tran_user",$cache['tran_user']);
    }

    if(isset($cache['status'])&&$cache['status']!="all"){
        $query->condition("tbl_user_topup.status",$cache['status']);
    }
	
    $result = $query->execute()->fetchAll();
//    print_r(count($result));
}catch (Exception $e){
    _print_r($e);
}
?>
<div class="add-block" style="margin-bottom: 20px;">
    <a href="/user/<?php echo $user->uid ?>/add-topup?destination=user/<?php echo $user->uid; ?>/topup" class="btn btn-primary">Nạp tiền</a>
</div>
<div class="filter-block">
    <?php
    $cassiopeia_admin_topup_filter_form = drupal_get_form("cassiopeia_admin_topup_filter_form",$cache);
    echo drupal_render($cassiopeia_admin_topup_filter_form);
    ?>
</div>
<table class="table table-hover table-stripped">
    <thead>
        <tr>
            <th>Ngày tạo</th>
            <th>Số tiền</th>
            <th>Ngân hàng</th>
            <th>Nội dung</th>
            <th>Ghi chú</th>
            <th>Tình trạng</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($result)): ?>
            <?php foreach($result as $value): ?>
                <tr>
                    <td><?php echo date("d/m/Y H:i",$value->created); ?></td>
                    <td><?php echo number_format($value->amount,0,",","."); ?></td>
                    <td><?php echo $value->bank_code; ?></td>
                    <td>
                        <?php echo htmlspecialchars($value->note); ?>
                    </td>
                    <td>
                        <?php echo $value->tran_user_note; ?>
                    </td>
                    <td class="topup-status-<?php echo $value->status; ?>">
                        <span>
                            <?php
                            switch ($value->status){
                                case 0 : echo "Đề nghị"; break;
                                case 1 : echo "Đã duyệt"; break;
                                case 2 : echo "Từ chối"; break;
                            }
                            ?>
                        </span>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>