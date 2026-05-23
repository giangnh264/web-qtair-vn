<?php
global $user;

$cache = array();
if(!empty($_REQUEST['data'])){
    $cache = $_REQUEST['data'];
    if(!empty($cache['uncheck'][1]) && $cache['uncheck'][1]==1){
        $cache = array();
    }
}
if(empty($cache['date_filter'])){
    $cache['date_filter'] = "today";
}
if(!empty($_REQUEST['tel'])){
    $cache['tel'] = $_REQUEST['tel'];
}
$cache['page'] = 0;
?>
    <div class="page-admin-manager-booking">
        <div class="manager-links-tabs">
            <div class="manager-links-tabs-content">
                <ul class="nav">
                    <li class="ticket-booking active">
                        <a href="javascript:;">
                            <span class="icon"><img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-23.png" alt=""></span>
                            <span>Vé máy bay</span>
                        </a>
                    </li>
<!--                    <li class="room-booking">-->
<!--                        <a href="/user/manager/room-booking">-->
<!--                            <span class="icon"><img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-24.png" alt=""></span>-->
<!--                            <span>Đặt phòng</span>-->
<!--                        </a>-->
<!--                    </li>-->
                </ul>
            </div>
        </div>
        <div class="page-container">
            <?php
            $cassiopeia_booking_filter_form  = drupal_get_form("cassiopeia_admin_ticket_booking_manager_form",$cache);
            if(!empty($cassiopeia_booking_filter_form)){
                $cassiopeia_booking_filter_form = drupal_render($cassiopeia_booking_filter_form);
                print($cassiopeia_booking_filter_form);
            }
            ?>
        </div>
    </div>
