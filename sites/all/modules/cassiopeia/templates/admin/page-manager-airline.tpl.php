<?php
ctools_include('modal');
ctools_modal_add_js();
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/manager-airline.js', ['weight' => 1000]);
drupal_add_js("https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js", ['weight' => 1000]);
drupal_add_css("https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css", ['weight' => 1000]);
if(isset($_REQUEST['airline']) && $_REQUEST['airline']!="all"){
    $airline = cassiopeia_get_airline($_REQUEST['airline']);
    $airlines[] = $airline;
}else{
    $airlines = cassiopeia_get_airlines();
    $limit = 200;
    $page = pager_default_initialize(count($airlines), $limit, 0);
    $offset = $limit * $page;
    if(!empty($airlines)){
        $airlines = array_slice($airlines, $offset, $limit);
    }else{
        $airlines=null;
    }
}
$_airlines = cassiopeia_get_airlines();
$airline_options = array();
$airline_options['all'] = "Tất cả";
$airline_options['VN'] = "Vietnam Airlines";
$airline_options['VJ'] = "VietJet Air";
$airline_options['BL'] = "Pacific Airlines";
$airline_options['QH'] = "Bammboo Airways";
foreach($_airlines as $airline){
    $airline_options[$airline->iata] = $airline->iata." - ".$airline->name;
}
?>
<div class="page-manager-airline">
    <form action="" id="event_registration_excel_form">
        <div>
            <!--            <button class="btn btn-success" type="submit"><i class="fa fa-file-excel-o"></i> Export</button>-->
            <!--            <button type="button" class="btn-airline-update btn btn-primary"> <i class="fa fa-file-excel-o"></i> Import</button>-->
            <button type="button" class="btn-airline-insert btn btn-primary"> <i class="fa fa-plus"></i> Add</button>
            <input type="hidden" name="excel_export" value="1">
        </div>
    </form>
    <form action="">
        <div class="filter-form">
            <div class="airline">
                <label for="airline">Hãng</label>
                <select name="airline" id="" class="chosen form-control">
                    <?php foreach($airline_options as $key => $value): ?>
                        <option <?php if(isset($_REQUEST['airline']) && $_REQUEST['airline']==$key) print("selected"); ?> value="<?php print($key); ?>"><?php print($value); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="buttons">
                <button type="submit" class="btn btn-success btn-filter-issue-report">Lọc</button>
            </div>
        </div>
    </form>
    <table class="table table-hover table-stripped">
        <thead>
        <tr>
            <th>Code</th>
            <th>Hãng</th>
            <th>Kiểu</th>
          <th>Logo</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($airlines as $airline): ?>
            <tr data-code="<?php print($airline->iata); ?>">
                <td class="code"><?php print($airline->iata); ?></td>
                <td class="name"><?php print($airline->name); ?></td>
                <td class="type"><?php print($airline->type); ?></td>
              <td>
                <?php
                if (!empty($airline->fid)) {
                  $logo = file_load($airline->fid);
                  if(!empty($logo)){
                    $node_img = (array)$logo;
                    $node_img['style_name'] = "style_100x100";
                    $node_img['path'] = $node_img['uri'];
                    $node_img['alt'] = !empty($node_img['alt'])?$node_img['alt']:variable_get("site_name");
                    $node_img['title'] = !empty($node_img['title'])?$node_img['title']:variable_get("site_name");
                    $node_img = theme('image_style', $node_img);
                    echo $node_img;
                  }
                }
                ?>
              </td>
                <td>
                  <?php print(l('<span class="fa fa-edit"></span>','admin/manager/airline/'.$airline->iata.'/edit/nojs', array('html'=>true, 'attributes' => array('class' => 'ctools-use-modal btn btn-primary'))));?>
                  <button title="Xóa" class="btn btn-danger btn-delete-airline" data-iata="<?php print($airline->iata); ?>"><span class="fa fa-trash"></span></button></td>
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
<!-- Modal -->
<!--<div id="modal_import_airlines" class="modal fade" role="dialog">-->
<!--    <div class="modal-dialog">-->
<!---->
<!--        <!-- Modal content-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <button type="button" class="close" data-dismiss="modal">&times;</button>-->
<!--                <h4 class="modal-title">Cập nhật hãng hàng không</h4>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                --><?php
//                $cassiopeia_ticket_price_add_form = drupal_get_form("cassipeia_airline_import");
//                if(!empty($cassiopeia_ticket_price_add_form)){
//                    $cassiopeia_ticket_price_add_form = drupal_render($cassiopeia_ticket_price_add_form);
//                    print($cassiopeia_ticket_price_add_form);
//                }
//                ?>
<!--            </div>-->
<!--        </div>-->
<!---->
<!--    </div>-->
<!--</div>-->
<!-- Modal -->
<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cập nhật hãng hàng không</h4>
            </div>
            <div class="modal-body">
                <div class="item">
                    <label for="">Code</label> <input class="form-control" type="text" name="code">
                </div>
                <div class="item">
                    <label for="">Name</label> <input class="form-control" type="text" name="name">
                </div>
                <div class="item">
                    <label for="">Type</label> <input class="form-control" type="text" name="type">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-update"></button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>