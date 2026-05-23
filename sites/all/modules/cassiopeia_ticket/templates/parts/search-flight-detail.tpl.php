<?php
$custom_fee = $variables['custom_fee'];
$Flight = $variables['Flight'];
$FareOption = $variables['FareOption'];
$StartPoint = cassiopeia_get_airport($Flight->StartPoint);
$EndPoint = cassiopeia_get_airport($Flight->EndPoint);

$FeeAdult       = $FareOption->FeeAdult+$FareOption->TaxAdult;
$FeeChild       = $FareOption->FeeChild+$FareOption->TaxChild;
$FeeInfant      = $FareOption->FeeInfant+$FareOption->TaxInfant;

$PriceAdult = $FareOption->PriceAdult+$custom_fee;
$PriceChildren = $FareOption->PriceChildren+$custom_fee;
$PriceInfant = $FareOption->PriceInfant+$custom_fee;

?>

<div class="block-container">
    <?php
    $AvailFlights = $Flight->ListSegment;
    ?>
    <?php foreach($AvailFlights as $AvailFlight): ?>
        <div class="row">
            <div class="airline-icon col-md-3">
                <?php cassiopeia_render_airline_logo($Flight->AirlineCode); ?>
            </div>
            <div class="detail-departure col-md-3">
                <div><?php if(!empty($StartPoint)) print($StartPoint->city); print("(".$AvailFlight->StartPoint.")"); ?></div>
                <div><?php cassiopeia_render_airport_name($StartPoint);  ?></div>
                <div>Cất cánh: <?php print(date("H:i",strtotime($AvailFlight->StartDate))); ?> </div>
                <div>Ngày: <?php print(date("d/m/Y",strtotime($AvailFlight->StartDate))); ?> </div>
            </div>
            <div class="detail-return col-md-3">
                <div><?php if(!empty($EndPoint)) print($EndPoint->city); print("(".$AvailFlight->EndPoint.")"); ?></div>
                <div><?php cassiopeia_render_airport_name($EndPoint);  ?></div>
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
    //    _print_r($FareOption);
    $Total+=($PriceAdult+$FeeAdult)*$Adult+($PriceChildren+$FeeChild)*$Children+($PriceInfant+$FeeInfant)*$Infant;
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
                    <td><?php echo $Adult; ?></td>
                    <td><?php echo number_format($PriceAdult,0,",","."); ?></td>
                    <td><?php echo number_format($FeeAdult,0,",","."); ?></td>
                    <td><?php echo number_format(($PriceAdult+$FeeAdult)*$Adult,0,",","."); ?></td>
                </tr>
                <?php if(!empty($Flight->Children)): ?>
                    <tr>
                        <td>Trẻ em</td>
                        <td><?php echo $Children; ?></td>
                        <td><?php echo number_format($PriceChild,0,",","."); ?></td>
                        <td><?php echo number_format($FeeChild,0,",","."); ?></td>
                        <td><?php echo number_format($Children*($PriceChild+$FeeChild),0,",","."); ?></td>
                    </tr>
                <?php endif; ?>
                <?php if(!empty($Flight->Infant)): ?>
                    <tr>
                        <td>Trẻ em</td>
                        <td><?php echo $Infant; ?></td>
                        <td><?php echo number_format($PriceInfant,0,",","."); ?></td>
                        <td><?php echo number_format($FeeInfant,0,",","."); ?></td>
                        <td><?php echo number_format($Infant*($PriceInfant+$FeeInfant),0,",","."); ?></td>
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
