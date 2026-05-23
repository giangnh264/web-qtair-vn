<?php
global $user;
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/ticket-review.js', ['weight' => 1000]);
//_print_r($_REQUEST);
$caches = !empty($_REQUEST['data'])?$_REQUEST['data']:null;
$caches['isReview'] = true;
$caches['redirect'] = "admin/manager/ticketReview";
?>
<!--<div class="manager-links-tabs">-->
<!--    <div class="manager-links-tabs-content">-->
<!--        <ul class="nav">-->
<!--            <li class="ticket-booking">-->
<!--                <a href="../manager/ticketIssue">-->
<!--                    <span>Xuất vé</span>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="room-booking active">-->
<!--                <a href="javascript:;">-->
<!--                    <span>Mở mặt vé</span>-->
<!--                </a>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </div>-->
<!--</div>-->
<div class="page-manager-ticket-review">
    <div class="pnr-form">
        <div class="note" style="color: red;
        font-weight: bold;
        margin-bottom: 10px;">
            Tính năng hỗ trợ kiểm tra lại tình trạng & thông tin chuyến bay!
        </div>
        <?php
            $cassiopeia_open_pnr_form = drupal_get_form("cassiopeia_open_pnr_form",$caches);
            if(!empty($cassiopeia_open_pnr_form)){
                $cassiopeia_open_pnr_form = drupal_render($cassiopeia_open_pnr_form);
                print($cassiopeia_open_pnr_form);
            }
        ?>
    </div>
    <div class="ticket-review-result" style="display: none;">
        <?php if(!empty($_REQUEST['data'])): ?>
            <?php
            $_data = new stdClass();
            $_data->PNRCode = trim($_REQUEST['data']['code']);
            $_data->AirlineCode = $_REQUEST['data']['airline'];
            $result = cassiopeia_meta_api_open_pnr($_data);

            if($_REQUEST['data']['airline']=="VN"){
                $TotalPrice = cassiopeia_maybay_api_openPrice_VNA($_REQUEST['data']['code']);
                $TotalPrice_output = json_decode($TotalPrice, true);
            }
            ?>
            <?php if($_REQUEST['data']['airline']=="VN"): ?>
                <?php if(!empty($result)) print(str_replace("\n","<br>",$result->Data->PNRContent)); ?>
            <?php else: ?>
                <?php if(!empty($result)) print(htmlspecialchars_decode($result->Data->PNRContent)); ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <?php if(!empty($_REQUEST['data'])): ?>
        <div class="ticket-info" data-pnr="<?php print($_REQUEST['data']['code']); ?>" data-airline="<?php print($_REQUEST['data']['airline']); ?>"></div>
    <?php endif; ?>
</div>