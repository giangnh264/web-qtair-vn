    <?php
drupal_add_js(drupal_get_path("module","cassiopeia_admin")."/templates/js/topup.js");
global $user;
$cache = isset($_REQUEST['data'])?$_REQUEST['data']:array();
if(empty($cache['date_filter'])){
    $cache['date_filter'] = "all";
}
if(empty($cache['statuscondition'])){
    $cache['statuscondition'] = 0;
}
$cache['redirect'] = "/admin/manager/topup";
$cache['admin'] = true;
try{
    $tran_user_query = db_select("users","tbl_user");
    $tran_user_query->fields("tbl_user",array("uid"));
    $tran_user_query->join("field_data_field_account_transaction_name", "field_account_transaction_name", "field_account_transaction_name.entity_id=tbl_user.uid");
    $tran_user_query->join("field_data_field_account_code", "field_account_code", "field_account_code.entity_id=tbl_user.uid");
    $tran_user_query->addField("field_account_transaction_name", "field_account_transaction_name_value", "tran_user_transaction_name");
    $tran_user_query->addField("field_account_code", "field_account_code_value", "tran_user_code");

    $query = db_select("tbl_top_up_request","tbl_top_up_request");
    $query->fields("tbl_top_up_request");
    $query->addField("tbl_top_up_request","status","request_status");
    $query->orderBy("tbl_top_up_request.created","DESC");
    $query->join("node","tbl_node","tbl_node.nid=tbl_top_up_request.bank");
    $query->addField("tbl_node","title","bank_title");
    $query->leftJoin("field_data_field_code","field_code","field_code.entity_id=tbl_node.nid");
    $query->addField("field_code","field_code_value","bank_code");
    $query->join("field_data_field_account_transaction_name", "field_account_transaction_name", "field_account_transaction_name.entity_id=tbl_top_up_request.uid");
    $query->join("field_data_field_account_code", "field_account_code", "field_account_code.entity_id=tbl_top_up_request.uid");
    $query->addField("field_account_transaction_name", "field_account_transaction_name_value", "agent_transaction_name");
    $query->addField("field_account_code", "field_account_code_value", "agent_code");
    $query->leftJoin($tran_user_query,"tbl_tran_user","tbl_tran_user.uid=tbl_top_up_request.tran_user");
    $query->fields("tbl_tran_user");
    if(!empty($cache['date_filter']&& $cache['date_filter']!="all")){
        switch ($cache['date_filter']){
            case "today" :
                $query->condition("tbl_top_up_request.created",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME)),strtotime(date("d-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
                break;
            case "yesterday" :
                $query->condition("tbl_top_up_request.created",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME-86400)),strtotime(date("d-m-Y 23:59",REQUEST_TIME-86400))),"BETWEEN");
                break;
            case "thismonth" :
                $query->condition("tbl_top_up_request.created",array(strtotime(date("01-m-Y 00:00",REQUEST_TIME)),strtotime(date("t-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
                break;
            case "other":
                if(!empty($cache['from_date'])){
                    $query->condition("tbl_top_up_request.created",strtotime(date("d-m-Y 00:00",strtotime($cache['from_date']))),">=");
                }
                if($cache['to_date']){
                    $query->condition("tbl_top_up_request.created",strtotime(date("d-m-Y 23:59",strtotime($cache['to_date']))),"<=");
                }
                break;
        }
    }

    if(!empty($cache['bank'])&&$cache['bank']!="all"){
        $query->condition("tbl_top_up_request.bank",$cache['bank']);
    }

    if(!empty($cache['tran_user'])&&$cache['tran_user']!="all"){
        $query->condition("tbl_top_up_request.tran_user",$cache['tran_user']);
    }

    if(isset($cache['statuscondition']) && $cache['statuscondition'] != "0"){
		if($cache['statuscondition'] != "all"){
			$query->condition("tbl_top_up_request.status",$cache['statuscondition']);
		}
    }
	else{
		$query->condition("tbl_top_up_request.status",0);
	}
    if(isset($cache['agent'])&&$cache['agent']!="all"){
        $query->condition("tbl_top_up_request.uid",$cache['agent']);
    }

    $result = $query->execute()->fetchAll();
	$limit = 50;
	$page = pager_default_initialize(count($result), $limit, 0);
	$offset = $limit * $page;
	if(!empty($result)){
		$result = array_slice($result, $offset, $limit);
	}else{
		$result=null;
	}
//    _print_r($result);
}catch (Exception $e){
    _print_r($e);
}
?>
<div class="filter-form"  id="topup-page">
    <?php
        $cassiopeia_admin_topup_filter_form = drupal_get_form("cassiopeia_admin_topup_filter_form",$cache);
        echo drupal_render($cassiopeia_admin_topup_filter_form);
    ?>
    <button type="button" id="actRejectList" class="btn btn-danger">Từ Chối</button>
</div>
<table class="table table-hover table-stripped topup">
    <thead>
    <tr>
        <th><input type="checkbox" class="cbxAllItems" id="inpcbxAllItems"></th>
        <th>Ngày tạo</th>
        <th>Đại lý</th>
        <th>Số tiền</th>
        <th>Ngân hàng</th>
		<th>Nội dung</th>
        <th>Người duyệt</th>
        <th>Tình trạng</th>
<!--        <th>Tác vụ</th>-->
    </tr>
    </thead>
    <tbody>
    <?php if(!empty($result)): ?>
        <?php foreach($result as $value): ?>
            <tr data-id="<?php echo $value->id; ?>">
                <?php if($value->status==0): ?>
                    <td><input type="checkbox" class="cbxItem" data-id="<?php echo $value->id; ?>"></td>
                <?php else: ?>
                    <td><input type="checkbox" class="cbxItemDisabled" data-id="<?php echo $value->id; ?>" disabled></td>
                <?php endif; ?>
                <td><?php echo date("d/m/Y H:i",$value->created); ?></td>
                <td>
                   <?php echo $value->agent_code . " - " . $value->agent_transaction_name; ?>
                </td>
                <td><?php echo number_format($value->amount,0,",","."); ?></td>
                <td><?php echo $value->bank_title; ?></td>
				<td><?php echo htmlspecialchars($value->note); ?></td>
                <td class="tran_user">
                    <?php if(!empty($value->tran_user)) echo $value->tran_user_code." - ".$value->tran_user_transaction_name; ?>
                </td>
                <td class="topup-status-<?php echo $value->request_status; ?> status">
                    <?php if($value->request_status==0): ?>
                        <?php if(cassiopeia_check_permission("cassiopeia_user_permission_topup","p_edit")): ?>
                            <select name="status" id="" class="form-control" data-id="<?php echo $value->id; ?>" data-original-value="<?php echo $value->request_status; ?>">
                                <option value="0">Đề nghị</option>
                                <option value="1">Duyệt</option>
                                <option value="2">Từ chối</option>
                            </select>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php
                        switch ($value->request_status){
                            case 0 : echo "Đề nghị"; break;
                            case 1 : echo "Đã duyệt"; break;
                            case 2 : echo "Từ chối"; break;
                        }
                        ?>
                        <?php if($value->status ==1 && (user_has_role(7) || user_has_role(3))): ?>
                            <span data-id="<?php echo $value->id; ?>" data-value="2" class="btn btn-danger btn-reject-topup" title="Hủy"><i class="fa fa-times"></i></span>
                        <?php endif;?>
                    <?php endif; ?>
                </td>
<!--                <td class="actions">-->
<!--                    --><?php //if($value->status==0): ?>
<!--                        <span data-id="--><?php //echo $value->id; ?><!--" data-value="1" class="btn btn-success btn-update-topup-status" title="Xác nhận"><i class="fa fa-check"></i></span>-->
<!--                        <span data-id="--><?php //echo $value->id; ?><!--" data-value="2" class="btn btn-danger btn-Reject-topup" title="Hủy"><i class="fa fa-times"></i></span>-->
<!--                    --><?php //endif; ?>
<!--                </td>-->
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
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

<div id="modalRejectTopup" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Từ chối yêu cầu topup</h4>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control hidden" id="inpDataIdRejectToup">
                <input type="radio" class="hidden" id="inpDataIdReprocess">
                <textarea class="form-control" id="FormControlTextareaRejectTopup" rows="3" placeholder="Lý do từ chối..."></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnRejectTopup" class="btn btn-danger">Xác Nhận Từ Chối</button>
                <button type="button" class="btn btn-secondary close" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>