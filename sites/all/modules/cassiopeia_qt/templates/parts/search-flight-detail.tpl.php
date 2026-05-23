<?php
$Flight = $variables['Flight'];
$FareOption = $variables['FareOption'];
$StartPoint = cassiopeia_get_airport($Flight->StartPoint);
$EndPoint = cassiopeia_get_airport($Flight->EndPoint);
$AdultPrice = $FareOption->PriceAdult+$FareOption->FeeAdult+$FareOption->TaxAdult;
$ChildrenPrice = $FareOption->PriceChild+$FareOption->FeeChild+$FareOption->TaxChild;
$InfantPrice = $FareOption->PriceInfant+$FareOption->FeeInfant+$FareOption->TaxInfant;
?>

<table class="table table-hovered">
    <tr>
        <td></td>
        <td><?php echo $StartPoint->city; ?></td>
        <td><?php echo "Chuyến bay: ".$Flight->FlightNumber; ?></td>
        <td><?php echo $EndPoint->city; ?></td>
        <td></td>
    </tr>
    <tr>
        <td><?php cassiopeia_render_airline_logo($Flight->AirlineCode); ?></td>
        <td><?php echo $StartPoint->name; ?></td>
        <td><i class="fa fa-long-arrow-right"></i></td>
        <td><?php echo $EndPoint->name; ?></td>
        <td></td>
    </tr>
    <tr>
        <td><?php echo date("H:i d/m/Y",strtotime($Flight->StartDate)); ?></td>
        <td><?php echo (floor($Flight->Duration / 60) . "h " . ($Flight->Duration % 60) . "p"); ?></td>
        <td><?php echo date("H:i d/m/Y",strtotime($Flight->EndDate)); ?></td>
        <td></td>
        <td></td>
    </tr>
</table>
<?php
$Adult = $_SESSION[strtoupper(trim($PNR)).'-count_adult'];
$Children = $_SESSION[strtoupper(trim($PNR)).'-count_children'];
$Infant = $_SESSION[strtoupper(trim($PNR)).'-count_infant'];
$Total = $Adult*$AdultPrice+$Children*$ChildrenPrice+$Infant*$InfantPrice;
//    if(!empty($form['#ChoseFlightSession'])&&$form['#ChoseFlightSession']==$Flight->FlightSession) $TotalPrice = $Total;
?>
<table class="table table-hovered">
    <thead>
    <tr>
        <th>Hành khách</th>
        <th>Số người</th>
        <th>Giá vé</th>
        <th>Tổng giá vé</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Người lớn</td>
        <td><?php echo $Adult; ?></td>
        <td><span class="color-orange"><?php echo number_format($AdultPrice,0,",","."); ?></span> VNĐ</td>
        <td><span class="color-orange"><?php echo number_format($Adult*$AdultPrice,0,",","."); ?></span> VNĐ</td>
    </tr>
    <?php if(!empty($Children)): ?>
        <tr>
            <td>Trẻ em</td>
            <td><?php echo $Children; ?></td>
            <td><span class="color-orange"><?php echo number_format($ChildrenPrice,0,",","."); ?></span> VNĐ</td>
            <td><span class="color-orange"><?php echo number_format($Children*$ChildrenPrice,0,",","."); ?></span> VNĐ</td>
        </tr>
    <?php endif; ?>
    <?php if(!empty($Infant)): ?>
        <tr>
            <td>Em bé</td>
            <td><?php echo $Infant; ?></td>
            <td><span class="color-orange"><?php echo number_format($InfantPrice,0,",","."); ?></span> VNĐ</td>
            <td><span class="color-orange"><?php echo number_format($Infant*$InfantPrice,0,",","."); ?></span> VNĐ</td>
        </tr>
    <?php endif; ?>
    <tr>
        <td>Tổng tiền</td>
        <td></td>
        <td></td>
        <td><b><span class="color-orange"><?php echo number_format($Total,0,",","."); ?></span> VNĐ</b></td>
    </tr>
    </tbody>
</table>
