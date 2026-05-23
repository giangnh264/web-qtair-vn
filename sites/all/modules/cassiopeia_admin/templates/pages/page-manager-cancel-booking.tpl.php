<?php
global $user;
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/ticket-review.js', ['weight' => 1000]);
//_print_r($_REQUEST);
$caches = !empty($_REQUEST['data'])?$_REQUEST['data']:null;
$caches['isReview'] = true;
?>
<div class="manager-links-tabs">
    <div class="manager-links-tabs-content">
        <ul class="nav">
            <li class="ticket-booking active">
                <a href="#">
                    <span>Hủy đặt chỗ</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="page-manager-ticket-review">
    <div class="pnr-form">
        <div class="note" style="color: red;
        font-weight: bold;
        margin-bottom: 10px;">
            Tính năng hủy hành trình VNA
        </div>
        <?php
        $cassiopeia_open_pnr_form = drupal_get_form("cassiopeia_cancel_booking_form",$caches);
        if(!empty($cassiopeia_open_pnr_form)){
            $cassiopeia_open_pnr_form = drupal_render($cassiopeia_open_pnr_form);
            print($cassiopeia_open_pnr_form);
        }
        ?>
    </div>
</div>