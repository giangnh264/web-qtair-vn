<?php
global $user;
//db_delete("tbl_log")->execute();
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/manager-log.js', ['weight' => 1000]);
$cache = array();
if(!empty($_REQUEST['data'])){
    $cache = $_REQUEST['data'];
}
if(empty($cache['cassiopeia_manager_log_filter_form_from_date'])){
    $cache['cassiopeia_manager_log_filter_form_from_date'] = date("Y-m-d 00:00",REQUEST_TIME);
}
if(empty($cache['cassiopeia_manager_log_filter_form_to_date'])){
    $cache['cassiopeia_manager_log_filter_form_to_date'] = date("Y-m-d 00:00",REQUEST_TIME);
}
//_print_r($cache);
try{
    $query = db_select("tbl_log","tbl_log");
    $query->fields("tbl_log");
    if(!empty($cache['cassiopeia_manager_log_filter_form_from_date'])){
        $query->condition("created",strtotime(date("d-m-Y 00:00",strtotime($cache['cassiopeia_manager_log_filter_form_from_date']))),">=");
    }
    if(!empty($cache['cassiopeia_manager_log_filter_form_to_date'])){
        $query->condition("created",strtotime(date("d-m-Y 23:59",strtotime($cache['cassiopeia_manager_log_filter_form_to_date']))),"<=");
    }
    if(!empty($cache['cassiopeia_manager_log_filter_form_user'])){
        $query->condition("uid",user_load_by_name($cache['cassiopeia_manager_log_filter_form_user'])->uid);
    }
    if(!empty($cache['cassiopeia_manager_log_filter_form_request'])){
        $query->condition("request_url","%".$cache['cassiopeia_manager_log_filter_form_request']."%","LIKE");
    }
    if(!empty($cache['cassiopeia_manager_log_filter_form_itinerary'])){
        $query->condition("value","%".$cache['cassiopeia_manager_log_filter_form_itinerary']."%","LIKE");
    }
    if(!empty($cache['cassiopeia_manager_log_filter_form_booking_code'])){
        $query->condition("booking_code","%".$cache['cassiopeia_manager_log_filter_form_booking_code']."%","LIKE");
    }
    if($user->uid==1){
//        $query->condition("value","%xóa%","LIKE");
//        $query->condition("request_url","%Issue%","LIKE");
    }
    $query->orderBy("created","DESC");
//    $query->range(0,100);
    $result = $query->execute()->fetchAll();
    $row_count = count($result);
//    $limit = 100;
//    $page = pager_default_initialize(count($result), $limit, 0);
//    $offset = $limit * $page;
//    if(!empty($result)){
//        $result = array_slice($result, $offset, $limit);
//    }else{
//        $result=null;
//    }
//    _print_r(unserialize(array_values($result)[0]->data));
}catch (Exception $e){
    print_r($e);
}
//_print_r(json_decode("    {\"booking_code\":\"VE1640665380\",\"Contact\":{\"Gender\":true,\"FirstName\":\"PHAM\",\"LastName\":\" NHAT QUYEN\",\"Phone\":\"0397612376\",\"Email\":\"Lule200470@gmail.com\",\"Address\":\"\"},\"AirlineCode\":\"VJ\",\"ItineraryType\":1,\"DepartureAirportCode\":\"VCL\",\"DestinationAirportCode\":\"SGN\",\"DepartureDate\":\"28\/12\/2021\",\"ReturnDate\":\"\",\"Adult\":\"1\",\"Children\":\"0\",\"Infant\":\"0\",\"DepartureSelectValue\":\"1,E1_ECO,O\",\"ReturnSelectValue\":\"\",\"DepartureFlightNumber\":\"VJ375\",\"ReturnFlightNumber\":\"\",\"ListPassengers\":[{\"Index\":0,\"FirstName\":\"NGUYEN\",\"LastName\":\"TAM\",\"Type\":\"ADT\",\"Gender\":\"1\",\"Birthday\":\"1995-03-06T00:00:00\",\"BaggageDeparture\":\"\",\"BaggageReturn\":\"\"}],\"TotalPriceDepart\":\"355730\",\"TotalPriceReturn\":0}"));
//_print_r($result);
?>
<div class="page-manager-log">
    <div class="page-container">
        <div class="filter-block">
            <?php
                $cassiopeia_manager_log_filter_form = drupal_get_form("cassiopeia_manager_log_filter_form",$cache);
                if(!empty($cassiopeia_manager_log_filter_form)){
                    $cassiopeia_manager_log_filter_form = drupal_render($cassiopeia_manager_log_filter_form);
                    print($cassiopeia_manager_log_filter_form);
                }
            ?>
        </div>
        <div class="row-count">
            Số bản ghi : <?php print(number_format($row_count,0,",",".")); ?>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Mã đặt chỗ</th>
                    <th>Ngày tạo</th>
                    <th>Người tạo</th>
                    <th>URL</th>
                    <th>Xem chi tiết</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($result)): ?>
                    <?php foreach($result as $item): ?>
                        <tr>
                            <td><?php print($item->booking_code); ?></td>
                            <td><?php print(date("d/m/Y H:i",$item->created)); ?></td>
                            <td><?php print(!empty(user_load($item->uid))?user_load($item->uid)->name:""); ?></td>
                            <td><?php print($item->request_url); ?></td>
                            <td><button class="btn btn-primary btn-view-log-detail" data-id="<?php print($item->id); ?>"><span class="fa fa-eye"></span></button></td>
<!--                            <td>--><?php //print($item->data); ?><!--</td>-->
<!--                            <td>--><?php //_print_r(unserialize($item->response)); ?><!--</td>-->
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
        <!--e: paging-->
    </div>
</div>


<div id="getGiftModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>