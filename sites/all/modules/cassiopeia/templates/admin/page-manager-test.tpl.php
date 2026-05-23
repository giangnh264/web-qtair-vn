<?php
global $user;

drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/payment-report-js.js', ['weight' => 1000]);
drupal_add_js("https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js", ['weight' => 1000]);
drupal_add_css("https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css", ['weight' => 1000]);
$caches = null;
if(!empty($_REQUEST['data'])){
    $caches = $_REQUEST['data'];
}
$month_options = array();
for($i=REQUEST_TIME-(12*30*86400);$i<=REQUEST_TIME;$i+=86400*30){
    $month_options[date("m-Y",$i)] = date("m/Y",$i);
}
$query = db_select("tbl_tran_kind","tbl_tran_kind");
$query -> fields("tbl_tran_kind");
//$query -> condition("kind","payment");
$result = $query -> execute() -> fetchAll();
$tran_kind_options = array();
$tran_kind_options['all'] = "Tất cả";
if(!empty($result)){
    foreach($result as $value){
        $tran_kind_options[$value->id] = $value->name;
    }
}
try{
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
//                            _print_r($result);
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
try{
    $query = db_select("users","tbl_user");
    $query -> fields("tbl_user");
    $query -> join("users_roles","tbl_role","tbl_role.uid = tbl_user.uid");
//    $query -> condition("tbl_role.rid",array(3,5,7,8),"IN");
    $query -> leftJoin("field_data_field_account_sale","tbl_sale","tbl_sale.entity_id = tbl_user.uid");
    $query->join("field_data_field_account_transaction_name","field_account_transaction_name","field_account_transaction_name.entity_id=tbl_user.uid");
    $query->join("field_data_field_account_code","field_account_code","field_account_code.entity_id=tbl_user.uid");
    $query->addField("field_account_code","field_account_code_value","field_account_code_value");
    $query->addField("field_account_transaction_name","field_account_transaction_name_value","field_account_transaction_name_value");
    $query->orderBy("field_account_transaction_name.field_account_transaction_name_value","ASC");
    $result  = $query -> execute() -> fetchAll();
}catch (Exception $e){
    print_r($e);
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
?>
    <div class="page-payment-report">
        <div class="block-container">
            <div class="block-add-button">
                <a href="#" class="btn btn-primary btn-plus btn-add-report"><i class="fa fa-plus"></i> Thêm mới</a>
            </div>
            <div class="add-block">
                <?php if(user_has_role(3) || user_has_role(7)|| user_has_role(8)): ?>
                    <div class="visible-xs btn-primary"data-toggle="collapse" data-target="#add-form">
                        <span class="">Thêm mới thanh toán <span class="fa fa-plus"></span></span>
                    </div>
                    <div class="add-form collapse" id="add-form" >
                        <div class="agent">
                            <label for="">Đại lý</label>
                            <select name="agent" id="" class="form-control chosen">
                                <?php foreach($agent_options as $key => $value): ?>
                                    <option value="<?php print($key); ?>"><?php print($value); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="amount">
                            <label for="">Số tiền</label>
                            <input name="amount" type="text" class="form-control required number_format">
                        </div>
                        <div class="tran_kind">
                            <label for="tran_kind">Loại giao dịch</label>
                            <select name="tran_kind" id="" class="chosen form-control">
                                <?php
                                $query = db_select("tbl_tran_kind","tbl_tran_kind");
                                $query -> fields("tbl_tran_kind");
                                $query -> condition("kind","payment");
                                $result = $query -> execute() -> fetchAll();
                                $tran_kind_options = array();
                                //                            $tran_kind_options['all'] = "Tất cả";
                                if(!empty($result)){
                                    foreach($result as $value){
                                        $tran_kind_options[$value->id] = $value->name;
                                    }
                                }
                                ?>
                                <?php foreach($tran_kind_options as $key => $value): ?>
                                    <option value="<?php print($key); ?>"><?php print($value); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="note">
                            <label for="">Nội dung</label>
                            <input name="content" type="text" class="form-control">
                        </div>
                        <div class="date">
                            <label for="">Ngày thực hiện</label>
                            <input name="date" type="text" class="form-control" autocomplete="off" value="<?php print(date("d-m-Y H:i",REQUEST_TIME)); ?>">
                        </div>
                        <div class="buttons">
                            <button class="btn btn-primary btn-add-payment-report">Thêm mới</button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div>
                <?php if(user_has_role(3)): ?>
                    <button class="btn btn-primary btn-update-report">Cập nhật</button>
                <?php endif; ?>
                <button class="btn btn-excel-export"><i class="fa fa-upload"></i> Xuất Excel</button>
            </div>
            <div class="filter-block">
                <div class="visible-xs btn-primary"data-toggle="collapse" data-target="#filter-form">
                    <span class="">Lọc báo cáo <span class="fa fa-filter"></span></span>
                </div>
                <div class="filter-form collapse" id="filter-form">
                    <div class="date">
                        <label for="">Theo ngày</label>
                        <select name="date_filter" id="" class="form-control chosen">
                            <option value="all">Tất cả</option>
                            <option selected value="today">Trong ngày</option>
                            <option value="yesterday">Hôm qua</option>
                            <option  value="thismonth">Trong tháng</option>
                            <option value="other">Theo ngày</option>
                        </select>
                    </div>
                    <div class="tran_kind">
                        <label for="tran_kind">Loại giao dịch</label>
                        <select name="tran_kind" id="" class="chosen form-control">
                            <?php foreach($tran_kind_options as $key => $value): ?>
                                <option value="<?php print($key); ?>"><?php print($value); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <?php if(user_has_role(3) || user_has_role(7)|| user_has_role(5)|| user_has_role(8)): ?>
                        <div class="agent">
                            <label for="">Đại lý</label>
                            <select name="agent" id="" class="form-control chosen">
                                <?php foreach($agent_options as $key => $value): ?>
                                    <option value="<?php print($key); ?>"><?php print($value); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>
                    <div class="tran_user">
                        <label for="">Người xuất</label>
                        <select name="tran_user" id="" class="form-control chosen">
                            <?php foreach($tran_user_options as $key => $value): ?>
                                <option value="<?php print($key); ?>"><?php print($value); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="code">
                        <label for="">Code</label>
                        <input name="code" type="text" class="form-control">
                    </div>
                    <div class="note">
                        <label for="">Nội dung</label>
                        <input name="content" type="text" class="form-control">
                    </div>
                    <div class="from-date">
                        <label for="">Từ ngày</label>
                        <input type="text" name="from_date" class="form-control" autocomplete="off" value="">
                    </div>
                    <div class="to-date">
                        <label for="">Đến ngày</label>
                        <input type="text" name="to_date" class="form-control" autocomplete="off">
                    </div>
                    <div class="hidden">
                        <input type="checkbox" name="export" value="0">
                    </div>
                    <div class="buttons">
                        <button class="btn btn-success btn-filter-payment-report">Lọc</button>
                    </div>
                </div>
            </div>

            <div class="items block-items">
            </div>
            <span id="current-page" data-page="1"></span>
        </div>
    </div>


    <!--<input id="" type="text" name="f" class="form-control" autocomplete="off" value="">-->
<?php if(user_has_role(3)): ?>
    <div id="modalUpdateReport" class="" role="dialog">
        <div class="block-dialog">
            <!-- Modal content-->
            <div class="block-content">
                <div class="block-header">
                    <span type="button" class="close" data-dismiss="block">&times;</span>
                    <h4 class="block-title">Cập nhật báo cáo</h4>
                </div>
                <div class="block-body">
                    <div class="item">
                        <label for="">Đại lý</label>
                        <select name="agent" id="" class="form-control chosen">
                            <?php foreach($agent_options as $key => $value): ?>
                                <option value="<?php print($key); ?>"><?php print($value); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="item">
                        <label for="">Mã giao dịch</label>
                        <input name="tran_code" type="text" class="form-control" placeholder="Để trống nếu cập nhật toàn bộ báo cáo của đại lý này">
                    </div>
                </div>
                <div class="block-footer">
                    <button class="btn btn-primary">Xác nhận</button>
                </div>
            </div>

        </div>
    </div>
<?php endif; ?>