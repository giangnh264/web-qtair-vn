<?php global $user;?>
<div class="manager-links-tabs">
    <div class="manager-links-tabs-content">
        <ul class="nav">
            <li class="ticket-booking active">
                <a href="javascript:;">
                    <span>Xuất vé</span>
                </a>
            </li>
<!--            <li class="room-booking">-->
<!--                <a href="../manager/ticketReview">-->
<!--                    <span>Mở mặt vé</span>-->
<!--                </a>-->
<!--            </li>-->
        </ul>
    </div>
</div>
<div class="page-manager-ticket-review">
    <?php
    $cassiopeia_open_pnr_form = drupal_get_form("cassiopeia_ticket_issue_form");
    if(!empty($cassiopeia_open_pnr_form)){
        $cassiopeia_open_pnr_form = drupal_render($cassiopeia_open_pnr_form);
        print($cassiopeia_open_pnr_form);
    }
    ?>
</div>
