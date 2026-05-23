<?php
$Flight = $variables['node'];
$AirlineCode = $variables['brand'];
$_startpoint = cassiopeia_get_airport($Flight->StartPoint);
$_endpoint = cassiopeia_get_airport($Flight->EndPoint);
?>
<div class="flight-ticket-item">
    <div class="flight-ticket-item-info">
        <h3>
            <?php
            if (!empty($_startpoint)) print($_startpoint->city);
            ?>
            &rarr;
            <?php
            if (!empty($_endpoint)) print($_endpoint->city);
            ?>
        </h3>
        <div class="flight-ticket-item-time">
            <div>
                <span>Thời gian:</span>
                <span><?php print(date("d/m/Y", strtotime($Flight->StartDate))); ?> &rarr; <?php print(date("d/m/Y", strtotime($Flight->EndDate))); ?></span>
            </div>
            <div>
                <span>Giờ bay:</span>
                <span><?php print(date("H:i", strtotime($Flight->StartDate))); ?> &rarr; <?php print(date("H:i", strtotime($Flight->EndDate))); ?></span>
            </div>
        </div>
    </div>
    <div class="flight-ticket-item-brand">
        <?php
        $num = $Flight->FlightNumber;
        if (strpos($num, 'VN') !== false) {
            $new_num = str_replace("VN","",$num);
            $_length = strlen($new_num);
            if($_length==4 && (strpos((string)$num,"VN4")!==false || strpos((string)$num,"VN6")!==false)){
                ?>
                <img style="" src="/sites/all/themes/cassiopeia_theme/img/icons/logo-pacific-airlines.jpg" alt="">
                <?php
            }else{
                if($_length==4 && (strpos((string)$num,"VN8")!==false)){
                    ?>
                    <img style="" src="/sites/all/themes/cassiopeia_theme/img/icons/vasco_logo_1.jpg" alt="">
                    <?php
                }else{
                    cassiopeia_render_airline_logo($AirlineCode);
                }
            }

        }else{
            cassiopeia_render_airline_logo($AirlineCode);
        }
        ?>
    </div>
</div>