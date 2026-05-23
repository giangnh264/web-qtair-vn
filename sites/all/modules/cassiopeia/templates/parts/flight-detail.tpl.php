<?php
$Flight = $variables['Flight'];
$FareOptionSession = $variables['FareOptionSession'];
$FlightResult = $variables['FlightResult'];
$FlightDetail = cassiopeia_meta_FareOptionSession_load($Flight,$FareOptionSession);
$conditions = array();
$conditions['field_airline'] = array(
    "type"      => "fieldCondition",
    "key"       => "value",
    "value"     => $Flight->AirlineCode,
    "condition" => "=",
);
$conditions['field_ticket_class'] = array(
    "type"      => "fieldCondition",
    "key"       => "value",
    "value"     => $FlightDetail->Class,
    "condition" => "=",
);
$rules = cassiopeia_get_items_by_conditions($conditions,"ticket_rule","node");
//print_r($airline);
//_print_r($rules);
//$FlightDetail = cassiopeia_get_flight_by_select_value((array)$data,$SelectValue);
//_print_r($FlightDetail);
$PriceAdult     = $FlightDetail->PriceAdult;
$PriceChild     = $FlightDetail->PriceChild;
$PriceInfant    = $FlightDetail->PriceInfant;
$FeeAdult       = $FlightDetail->FeeAdult+$FlightDetail->TaxAdult;
$FeeChild       = $FlightDetail->FeeChild+$FlightDetail->TaxChild;
$FeeInfant      = $FlightDetail->FeeInfant+$FlightDetail->TaxInfant;
$agent_fee = cassiopeia_user_agent_fee_load_by_class($Flight->AirlineCode,$FlightDetail->Class);
$service_fee = cassiopeia_user_service_fee_load_by_class($Flight->AirlineCode,$FlightDetail->Class);
$show_fee = 0;
$Total = 0;
$PriceAdult+=$agent_fee['fee'];
$PriceAdult+=$service_fee['fee'];
$PriceChild+=$agent_fee['fee'];
$PriceChild+=$service_fee['fee'];
$PriceInfant+=$agent_fee['infant'];
$PriceInfant+=$service_fee['infant'];
//_print_r($FlightResult);
?>
<div class="block-container">
    <?php
    $AvailFlights = $Flight->ListSegment;
    ?>
    <?php foreach($AvailFlights as $AvailFlight): ?>
        <?php
//    _print_r($AvailFlight);
        $_startpoint = cassiopeia_get_airport($AvailFlight->StartPoint);
        $_endpoint = cassiopeia_get_airport($AvailFlight->EndPoint);
        ?>
        <div class="row">
            <div class="airline-icon col-md-3">
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
                            cassiopeia_render_airline_logo($Flight->AirlineCode);
                        }
                    }

                }else{
                    cassiopeia_render_airline_logo($Flight->AirlineCode);
                }
                ?>
            </div>
            <div class="detail-departure col-md-3">
                <div><?php if(!empty($_startpoint)) print($_startpoint->city); print("(".$AvailFlight->StartPoint.")"); ?></div>
                <div><?php cassiopeia_render_airport_name($_startpoint);  ?></div>
                <div>Cất cánh: <?php print(date("H:i",strtotime($AvailFlight->StartDate))); ?> </div>
                <div>Ngày: <?php print(date("d/m/Y",strtotime($AvailFlight->StartDate))); ?> </div>
            </div>
            <div class="detail-return col-md-3">
                <div><?php if(!empty($_endpoint)) print($_endpoint->city); print("(".$AvailFlight->EndPoint.")"); ?></div>
                <div><?php cassiopeia_render_airport_name($_endpoint);  ?></div>
                <div>Hạ cánh: <?php print(date("H:i",strtotime($AvailFlight->EndDate))); ?> </div>
                <div>Ngày: <?php print(date("d/m/Y",strtotime($AvailFlight->EndDate))); ?> </div>
            </div>
            <div class="detail-end-point col-md-3">
                <div>Chuyến bay: <?php print($AvailFlight->FlightNumber) ?></div>
                <div>Giờ bay: <?php  print(floor($AvailFlight->FlightTime/60)."h ".($AvailFlight->FlightTime%60)."p"); ?></div>
                <div>Máy bay: <?php echo !empty($AvailFlight->Plane)?$AvailFlight->Plane:""; ?></div>
            </div>
        </div>


    <?php endforeach; ?>
    <?php
    //    _print_r($FlightDetail);
    $Total+=($PriceAdult+$FeeAdult)*$FlightResult->Adult+($FeeChild+$PriceChild)*$FlightResult->Children+($FeeInfant+$PriceInfant)*$FlightResult->Infant;
    ?>
    <div class="price-detail">
        <!--            <div class="block-title">-->
        <!--                Chi tiết giá vé-->
        <!--            </div>-->
        <div class="block-container ">
            <table class="table table-hover table-stripped">
                <thead>
                <tr>
                    <th>Hành khách</th>
                    <th>Số lượng</th>
                    <th>Giá vé</th>
                    <th>Thuế và phí</th>
                    <th>Tổng tiền</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Người lớn</td>
                    <td><?php echo $FlightResult->Adult; ?></td>
                    <td><?php echo number_format($PriceAdult,0,",","."); ?></td>
                    <td><?php echo number_format($FeeAdult,0,",","."); ?></td>
                    <td><?php echo number_format(($PriceAdult+$FeeAdult)*$FlightResult->Adult,0,",","."); ?></td>
                </tr>
                <?php if(!empty($FlightResult->Children)): ?>
                    <tr>
                        <td>Trẻ em</td>
                        <td><?php echo $FlightResult->Children; ?></td>
                        <td><?php echo number_format($PriceChild,0,",","."); ?></td>
                        <td><?php echo number_format($FeeChild,0,",","."); ?></td>
                        <td><?php echo number_format(($FeeChild+$PriceChild)*$FlightResult->Children,0,",","."); ?></td>
                    </tr>
                <?php endif; ?>
                <?php if(!empty($FlightResult->Infant)): ?>
                    <tr>
                        <td>Trẻ em</td>
                        <td><?php echo $FlightResult->Infant; ?></td>
                        <td><?php echo number_format($PriceInfant,0,",","."); ?></td>
                        <td><?php echo number_format($FeeInfant,0,",","."); ?></td>
                        <td><?php echo number_format(($FeeInfant+$PriceInfant)*$FlightResult->Infant,0,",","."); ?></td>
                    </tr>
                <?php endif; ?>
                <tr style="font-weight: bold">
                    <td colspan="4">Tổng tiền</td>
                    <td><?php echo number_format($Total,0,",","."); ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="fare-rules">
        <?php if(!empty(($rules))): ?>
            <span>Điều kiện vé</span>
            <div>
                <?php foreach($rules as $value): ?>
                    <div class="block-content">
                        <?php if(!empty($value->body['und'][0]['value'])) print($value->body['und'][0]['value']); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
