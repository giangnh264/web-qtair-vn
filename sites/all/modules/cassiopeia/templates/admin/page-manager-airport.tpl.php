<?php
    drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/manager-airport.js', ['weight' => 1000]);
    $query = db_select("tbl_airports","tbl_airports");
    $query -> fields("tbl_airports");
    $caches = array();
    _print_r($_REQUEST['data']);
    if(!empty($_REQUEST['data'])){
        $caches['code'] = $_REQUEST['data']['code'];
        $caches['name'] = $_REQUEST['data']['name'];
        $caches['city'] = $_REQUEST['data']['city'];
        $caches['country'] = $_REQUEST['data']['country'];
        $caches['city_code'] = $_REQUEST['data']['city_code'];
        if(!empty($caches['code'])){
            $query -> condition("code","%".$caches['code']."%","LIKE");
        }
        if(!empty($caches['name'])){
            $or = db_or();
            $or -> condition("name","%".$caches['name']."%","LIKE");
//            $or -> condition("name_vi","%".$caches['name']."%","LIKE");
            $query->condition($or);
        }
        if(!empty($caches['city_code'])){
//            $or = db_or();[
            print($caches['city_code']);
            $query -> condition("city_code",$caches['city_code'],"=");
//            $or -> condition("name_vi","%".$caches['name']."%","LIKE");
//            $query->condition($or);
        }
        if(!empty($caches['city'])){
            $or = db_or();
            $or -> condition("city","%".$caches['city']."%","LIKE");
//            $or -> condition("city_vi","%".$caches['city_vi']."%","LIKE");
            $query->condition($or);
        }
        if(!empty($caches['country'])){
            $or = db_or();
            $or -> condition("country","%".$caches['country']."%","LIKE");
//            $or -> condition("country_vi","%".$caches['country_vi']."%","LIKE");
            $query->condition($or);
        }
    }
    $result = $query -> execute() -> fetchAll();
    $limit = 20;
    $page = pager_default_initialize(count($result), $limit, 0);
    $offset = $limit * $page;
    if(!empty($result)){
        $_result = array_slice($result, $offset, $limit);
    }else{
        $_result=null;
    }
if(!empty($_REQUEST['excel_export']) || !empty($_REQUEST['excel_sample'])){
    drupal_add_http_header('Content-Type', 'application/vnd.ms-excel; charset=utf-8');
    drupal_add_http_header('Content-Disposition', 'attachment; filename='."file_".REQUEST_TIME.".xls");
    $xls = '';
    $_table_header  = array("STT","Code","Name",'City','City code','Country','Country Code','Region_En',"Region Code");
    $_table_rows = array();
    //fetching the field values
    $stt = 1;
    if(!empty($_REQUEST['excel_export'])){
        foreach($result as $key => $value) {
            $_table_row = array();
            $_table_row[] =  $stt;
            $_table_row[] =  $value->code;
            $_table_row[] =  $value->name;
//            $_table_row[] =  $value->name_vi;
            $_table_row[] =  $value->city;
//            $_table_row[] =  $value->city_vi;
            $_table_row[] =  $value->city_code;
            $_table_row[] =  $value->country;
//            $_table_row[] =  $value->country_vi;
            $_table_row[] =  $value->country_code;
            $_table_row[] =  $value->region;
//            $_table_row[] =  $value->country_vi;
//            $_table_row[] =  $value->region_vi;
            $_table_rows[] = $_table_row;
            $stt++;
        }
    }else{
        for($i=0;$i<50;$i++){
            $_table_row = array();
            $_table_row[] =  $stt;
            $_table_row[] =  "";
            $_table_row[] =  "";
            $_table_row[] =  "";
            $_table_row[] =  "";
            $_table_row[] =  "";
            $_table_row[] =  "";
//            $_table_row[] =  "";
//            $_table_row[] =  "";
//            $_table_row[] =  "";
//            $_table_row[] =  "";
//            $_table_row[] =  "";
            $_table_row[] =  "";
            $_table_rows[] = $_table_row;
            $stt++;
        }
    }

    $xls .= '<table border="1">';

    $xls .= '<thead>';
    $xls .= '<tr>';
    foreach ($_table_header as $key => $value) {
        $xls .= '<th style="width: 100px;">'.$value.'</th>';
    }
    $xls .= '</tr>';
    $xls .= '</thead>';

    $xls .= '<tbody>';
    if(!empty($_table_rows)){
        foreach ($_table_rows as $key => $value) {
            $_row = '';
            foreach ($value as $_key => $_value) {
                $_row .= '<td>'.$_value.'</td>';
            }
            $xls .= '<tr>'.$_row.'</tr>';
        }
    }
    $xls .= '</tbody>';

    $xls .= '</table>';

    print($xls);
    drupal_exit();
}
?>
<div class="admin-manager-airports">
    <div class="page-container">
        <div class="page-button">
            <form action="" id="event_registration_excel_form">
                <div>
                    <button class="btn btn-success" type="submit"><i class="fa fa-file-excel-o"></i> Export</button>
                    <button type="button" class="btn-airport-update btn btn-primary"> <i class="fa fa-file-excel-o"></i> Import</button>
                    <button type="button" class="btn-airport-insert btn btn-primary"> <i class="fa fa-plus"></i> Add</button>
                    <input type="hidden" name="excel_export" value="1">
                </div>
            </form>
            <form action="" id="event_registration_excel_form">
                <div>
                    <button class="btn btn-success" type="submit"><i class="fa fa-file-excel-o"></i> Tải file mẫu</button>
                    <input type="hidden" name="excel_sample" value="1">
                </div>
            </form>
        </div>
        <div class="filter-form">
            <?php
            $cassiopeia_airport_filter_form = drupal_get_form("cassiopeia_airport_filter_form",$caches);
            if(!empty($cassiopeia_airport_filter_form)){
                $cassiopeia_airport_filter_form = drupal_render($cassiopeia_airport_filter_form);
                print($cassiopeia_airport_filter_form);
            }
            ?>
        </div>
        <table class="table table-hovered">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Icao</th>
                    <th>City code</th>
                    <th>Country code</th>
                    <th>Region Code</th>
                    <th>

                    </th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($_result)): ?>
                    <?php foreach($_result as $item): ?>
                        <tr>
                            <td><?php print($item->code); ?></td>
                            <td><?php print($item->name); ?></td>
                            <td><?php print($item->city); ?></td>
                            <td><?php print($item->state); ?></td>
                            <td><?php print($item->country); ?></td>
                            <td><?php print($item->icao); ?></td>
                            <td><?php print($item->city_code); ?></td>
                            <td><?php print($item->country_code); ?></td>
                            <td><?php print($item->region_code); ?></td>
                            <td><span class="fa fa-edit btn btn-edit-airport" data-code="<?php print($item->code); ?>"></span></td>
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

<!-- Modal -->
<div id="modal_insert_airports" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm mới sân bay</h4>
            </div>
            <div class="modal-body">
                <?php
                $cassiopeia_ticket_price_add_form = drupal_get_form("cassiopeia_airport_add_form");
                if(!empty($cassiopeia_ticket_price_add_form)){
                    $cassiopeia_ticket_price_add_form = drupal_render($cassiopeia_ticket_price_add_form);
                    print($cassiopeia_ticket_price_add_form);
                }
                ?>
            </div>
        </div>

    </div>
</div>
