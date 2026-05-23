<?php
drupal_add_js("https://code.jquery.com/ui/1.12.1/jquery-ui.js");
drupal_add_css("https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css");

drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/hotel-search.js', ['weight' => 10000000]);
$currentTerm = !empty($variables['term'])?$variables['term']:null;
?>
<?php
//    $_SESSION['booking_room'] = null;
    if(!empty($_REQUEST['khu-vuc'])){
        $area = taxonomy_term_load($_REQUEST['khu-vuc']);
    }
    if(!empty($currentTerm)){
        $area = $currentTerm;
    }
    $_date = !empty($_REQUEST['date'])?$_REQUEST['date']:date("d/m/Y",REQUEST_TIME)."-".date("d/m/Y",REQUEST_TIME+86400);
    $temp = explode("-",$_date);
    $_SESSION['booking_room']['start_date'] = date("d-m-Y",strtotime(str_replace("/","-",trim($temp[0]))));
    $_SESSION['booking_room']['end_date'] = date("d-m-Y",strtotime(str_replace("/","-",trim($temp[1]))));
    $_SESSION['booking_room']['room_count'] = !empty($_REQUEST['room'])?$_REQUEST['room']:1;
    $_SESSION['booking_room']['adult'] = !empty($_REQUEST['adult'])?$_REQUEST['adult']:2;
    $_SESSION['booking_room']['children'] = !empty($_REQUEST['children'])?$_REQUEST['children']:0;
    $_SESSION['booking_room']['tx_area'] = !empty($area)?$area:0;
?>
<div class="page-hotel-search <?php if(!empty($currentTerm)) echo "page-tx-area"; ?>">
    <div class="page-hotel-filter">
        <span id="current-page" data-page="1"></span>
        <div class="btn-filter-mb">
            <div class="hotel-search-mb">
                <button>
                    <i class="fa fa-search"></i>
                    Tìm kiếm
                </button>
            </div>
            <div class="mb-filter-hotel">
                <button type="button" class="filter-hotel-mb">
                    <i class="fa fa-filter"></i>Bộ lọc
                </button>
            </div>
        </div>
        <div class="bg-white">
            <div class="container">
                
                <?php print(_cassiopeia_render_theme("module","cassiopeia","templates/forms/hotel-search-form.tpl.php",array("term"=>$currentTerm))); ?>
            </div>
        </div>
        <?php
            $cassiopeia_hotel_search_form = drupal_get_form("cassiopeia_room_hotel_search_page_form",array("tx_area"=>$currentTerm));
            if(!empty($cassiopeia_hotel_search_form)){
                $cassiopeia_hotel_search_form = drupal_render($cassiopeia_hotel_search_form);
                echo $cassiopeia_hotel_search_form;
            }
        ?>
    </div>
</div>