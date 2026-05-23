<?php
global $user;
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/ticket-review.js', ['weight' => 1000]);
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/ticket-issue.js', ['weight' => 1000]);
drupal_add_js("https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js", ['weight' => 1000]);
drupal_add_css("https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css", ['weight' => 1000]);
$caches = !empty($_REQUEST['data'])?$_REQUEST['data']:null;
$caches['redirect'] = "admin/manager/add-segment";
$caches['isReview'] = false;
$flagVN = true;
$_total_price = 0;
$_SESSION[strtoupper(trim($_REQUEST['data']['code'])).'-count_leg'] = null;
$_SESSION[strtoupper(trim($_REQUEST['data']['code'])).'-count_adult'] = null;
$_SESSION[strtoupper(trim($_REQUEST['data']['code'])).'-total_price'] = null;
$_SESSION[strtoupper(trim($_REQUEST['data']['code'])).'-Airline'] = null;
$_SESSION[strtoupper(trim($_REQUEST['data']['code'])).'-PNR'] = null;
?>
    <style type="text/css">
        button#edit-submit span {
            display: none;
        }
    </style>
<!--    <div class="manager-links-tabs">-->
<!--        <div class="manager-links-tabs-content">-->
<!--            <ul class="nav">-->
<!--                <li class="ticket-booking active">-->
<!--                    <a href="javascript:;">-->
<!--                        <span>Nghiệp vụ đặt chỗ VN</span>-->
<!--                    </a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->
    <div class="page-manager-edit-booking-vn">
        <div class="pnr-form">
            <?php
            $cassiopeia_open_pnr_form = drupal_get_form("cassiopeia_qt_edit_booking_vn_form",$caches);
            if(!empty($cassiopeia_open_pnr_form)){
                $cassiopeia_open_pnr_form = drupal_render($cassiopeia_open_pnr_form);
                print($cassiopeia_open_pnr_form);
            }
            ?>
        </div>
    </div>
<?php if(!empty($_REQUEST['data'])): ?>
    <div class="search-flight-form">
        <?php
        $cassiopeia_qt_search_flight_form = drupal_get_form("cassiopeia_qt_search_flight_form",strtoupper(trim($_REQUEST['data']['code'])));
        if(!empty($cassiopeia_qt_search_flight_form )){
            $cassiopeia_qt_search_flight_form = drupal_render($cassiopeia_qt_search_flight_form);
            echo $cassiopeia_qt_search_flight_form;
        }
        ?>
    </div>
<?php endif; ?>