<?php
//print(date("d/m/Y",1582237800));
//db_insert("tbl_region")->fields(array(
//        "code"    => "SOTO",
//        "name"    => "SOTO",
//        "name_vi"    => "SOTO",
//))->execute();
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/manager-ticket.js', ['weight' => 1000]);
try{
    db_insert("tbl_ticket_price_type")->fields(array(
        "name"  => "Phí xuất web",
    ))->execute();
}catch (Exception $e){

}
$caches = array();
if(!empty($_REQUEST['data'])){
    $caches = $_REQUEST['data'];
}
//print_r($caches);
try{
    $query = db_select("tbl_price_board","tbl_price_board");
    $query -> fields("tbl_price_board");
    $query -> join("tbl_region","tbl_region","tbl_region.code = tbl_price_board.region");
    $query -> addField("tbl_region","name","region_name");
    $query -> join("tbl_airline_","tbl_airline_","tbl_airline_.code = tbl_price_board.airline");
    $query -> addField("tbl_airline_","name","airline_name");
    if(!empty($caches['airline']) && $caches['airline']!="all"){
        $query -> condition("tbl_airline_.code","%".$caches['airline']."%","LIKE");
    }
    if(!empty($caches['region']) && $caches['region']!="all"){
        $query -> condition("tbl_region.code","%".$caches['region']."%","LIKE");
    }
    if(!empty($caches['price'])){
        $query -> condition("tbl_price_board.value",$caches['price']);
    }
    $result = $query -> execute() -> fetchAll();
    foreach($result as $item){
        if($item->airline=="VN"){
            db_update("tbl_price_board")->fields(array(
                "type"  => "VNA",
            ))->condition("airline",$item->airline)->execute();
        }
//else{
//            db_update("tbl_price_board")->fields(array(
//                "type"  => $item->airline,
//            ))->condition("airline",$item->airline)->execute();
//        }
    }
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
        <div class="filter-form">
            <?php
                $cassiopeia_ticket_manager_filter_form = drupal_get_form("cassiopeia_ticket_manager_filter_form",$caches);
                if(!empty($cassiopeia_ticket_manager_filter_form)){
                    $cassiopeia_ticket_manager_filter_form = drupal_render($cassiopeia_ticket_manager_filter_form);
                    print($cassiopeia_ticket_manager_filter_form);
                }
            ?>
        </div>
        <table class="table table-hovered">
            <thead>
                <tr>
                    <th>Tác vụ</th>
                    <th>Hãng</th>
                    <th>Phân Nhóm</th>
                    <th>Loại Hành Trình</th>
                    <th>Phí Dịch Vụ</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($result)): ?>
                    <?php foreach($result as $item): ?>
                        <tr>
                            <td>
                                <button data-id="<?php print($item->id); ?>" class="btn-ticket-price-edit"><span class="glyphicon glyphicon-edit" title="Sửa"></span></button>
                                <button data-id="<?php print($item->id); ?>" class="btn-ticket-price-delete"><span class="glyphicon glyphicon-trash" title="Sửa"></span></button>
                            </td>
                            <td><?php print($item->airline); ?></td>
                            <td><?php print($item->type); ?></td>
                            <td><?php print($item->region); ?></td>
                            <td><?php print(number_format($item->value,0,",",".")); ?></td>
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
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <?php
                    $cassiopeia_ticket_price_add_form = drupal_get_form("cassiopeia_ticket_price_add_form");
                    if(!empty($cassiopeia_ticket_price_add_form)){
                        $cassiopeia_ticket_price_add_form = drupal_render($cassiopeia_ticket_price_add_form);
                        print($cassiopeia_ticket_price_add_form);
                    }
                ?>
            </div>
        </div>

    </div>
</div>

<!-- Modal -->
<div id="modal_import_airports" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cập nhật sân bay</h4>
            </div>
            <div class="modal-body">
                <?php
                    $cassiopeia_ticket_price_add_form = drupal_get_form("cassipeia_airport_region_import");
                    if(!empty($cassiopeia_ticket_price_add_form)){
                        $cassiopeia_ticket_price_add_form = drupal_render($cassiopeia_ticket_price_add_form);
                        print($cassiopeia_ticket_price_add_form);
                    }
                ?>
            </div>
        </div>

    </div>
</div>

