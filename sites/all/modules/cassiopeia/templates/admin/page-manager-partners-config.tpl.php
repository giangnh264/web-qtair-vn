<?php
//print(date("d/m/Y",1582237800));

drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/partner.js', ['weight' => 1000]);
//try{
//    db_insert("tbl_ticket_price_type")->fields(array(
//        "name"  => "Phí xuất web",
//    ))->execute();
//}catch (Exception $e){
//
//}
$caches = array();
if(!empty($_REQUEST['data'])){
    $caches = $_REQUEST['data'];
}
//print_r($caches);
try{
    $query = db_select("tbl_agent_fee","tbl_agent_fee");
    $query -> fields("tbl_agent_fee");
    $query -> join("tbl_region","tbl_region","tbl_region.code = tbl_agent_fee.region");
    $query -> addField("tbl_region","name","region_name");
    $query -> join("tbl_airline_","tbl_airline_","tbl_airline_.code = tbl_agent_fee.airline");
    $query -> addField("tbl_airline_","name","airline_name");
    $result = $query -> execute() -> fetchAll();
}catch ( Exception $e){
    print_r($e);
}
//print_r($result);
?>
<div class="page-manager-ticket">
    <div class="page-container">
        <div>
            <button class="btn-create btn btn-primary">Thêm Mới</button>
            <!--            <button class="btn-airport-update btn btn-success">Nhập</button>-->
        </div>
        <div class="agent-profile-form">
        </div>
        <table class="table table-hovered">
            <thead>
            <tr>
                <th>Tác vụ</th>
                <th>Phân nhóm</th>
                <th>Loại hành trình</th>
                <th>Phí hoa hồng</th>
                <th>Đại lý</th>
            </tr>
            </thead>
            <tbody>
            <?php if(!empty($result)): ?>
                <?php foreach($result as $item): ?>
                    <tr>
                        <td>
                            <button data-id="<?php print($item->id); ?>" class="btn btn-ticket-price-edit"><span class="glyphicon glyphicon-edit" title="Sửa"></span></button>
                            <button data-id="<?php print($item->id); ?>" class="btn  btn-agent-fee-delete"><span class="glyphicon glyphicon-trash" title="Xóa"></span></button>
                        </td>
                        <td><?php print($item->airline); ?></td>
                        <td><?php print($item->region); ?></td>
                        <td><?php print(number_format($item->value,0,",",".")); ?></td>
                        <td>
                            <?php
                                if($item->agent_id==0){
                                        print("Tất cả");
                                }else{
                                    $agent = user_load($item->agent_id);
                                    $transaction_name = !empty($agent->field_account_transaction_name['und'][0]['value'])?$agent->field_account_transaction_name['und'][0]['value']:"";
                                    $account_code = !empty($agent->field_account_code['und'][0]['value'])?$agent->field_account_code['und'][0]['value']:"";
                                        $agent_name = $account_code." - ".$transaction_name;
                                    print($agent_name);
                                }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div id="modal_create_region" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cấu hình phí hoa hồng</h4>
            </div>
            <div class="modal-body">
                <?php
                $cassiopeia_ticket_price_add_form = drupal_get_form("cassiopeia_agent_price_add_form");
                if(!empty($cassiopeia_ticket_price_add_form)){
                    $cassiopeia_ticket_price_add_form = drupal_render($cassiopeia_ticket_price_add_form);
                    print($cassiopeia_ticket_price_add_form);
                }
                ?>
            </div>
        </div>

    </div>
</div>