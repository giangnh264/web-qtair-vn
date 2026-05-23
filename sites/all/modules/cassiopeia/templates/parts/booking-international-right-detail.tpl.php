<?php
global $user;
$Domestic_airlines = unserialize(DOMESTIC_AIRLINES);
$region_fee = 0;
$_search = $variables['search_info'];
$point_1 = cassiopeia_get_airport($_search->StartPoint);
$point_2 = cassiopeia_get_airport($_search->EndPoint);

$customFee = $variables['customFee'];
$customFee = str_replace(".","",$customFee);
if(empty($user->uid)){
    $customFee = 130000;
}
$total_price = 0;
$adt_price = 0;
$chd_price = 0;
$inf_price = 0;
$adt = 0;
$chd = 0;
$inf= 0;

$_SESSION['customFee'] = $customFee;

$FlightData = $_SESSION['FlightData'];
$DataSession = $_SESSION['DataSession'];
$FlightGroup = $_SESSION['FlightGroup'];

$GroupSession = $FlightGroup->GroupSession;
$DepartureFlight = $_SESSION['booking']['DepartureFlight'];
_print_r($FlightGroup);
$ReturnFlight = !empty($_SESSION['booking']['ReturnFlight'])?$_SESSION['booking']['ReturnFlight']:"";
$TotalFee = 0;
?>
<?php if(!empty($_SESSION['booking'])): ?>
    <table class="table table-hovered">
            <?php $_fee = 0;
            if($point_1->country_code!="VN" && $point_2->country_code!="VN"){
                $region_code = "SOTO";
            }else{
                if($point_2->country_code=="VN"){
                    $region_code = $point_1->region_code;
                }else{
                    $region_code = $point_2->region_code;
                }
            }
            ?>
            <tr>
                <td><?php print($DepartureFlight->StartPoint); ?> <i class="fa fa-long-arrow-right"></i> <?php print($DepartureFlight->EndPoint); ?></td>
                <td><span class="fa fa-clock-o"></span> <?php print(date("H:i d/m",strtotime($DepartureFlight->StartDate))); ?></td>
                <td><?php cassiopeia_render_airline_logo($DepartureFlight->AirlineCode); ?></td>
            </tr>
            <?php if(!empty($ReturnFlight)): ?>
                <tr>
                    <td><?php print($ReturnFlight->StartPoint); ?> <i class="fa fa-long-arrow-right"></i> <?php print($ReturnFlight->EndPoint); ?></td>
                    <td><span class="fa fa-clock-o"></span> <?php print(date("H:i d/m",strtotime($ReturnFlight->StartDate))); ?></td>
                    <td><?php cassiopeia_render_airline_logo($ReturnFlight->AirlineCode); ?></td>
                </tr>
            <?php endif; ?>
        <?php
        $TotalFee += $DepartureFlight->AgentFee+$DepartureFlight->ServiceFee;
        if(!empty($ReturnFlight)){
            $TotalFee += $ReturnFlight->AgentFee+$ReturnFlight->ServiceFee;
        }
//        _print_r($TotalFee);
        $adt_price = ($FlightGroup->PriceAdult + $TotalFee );
        $chd_price = ($FlightGroup->PriceChild + $TotalFee);
        $inf_price = ($FlightGroup->PriceInfant);
        $total_price += $FlightData->Adult*$adt_price + $FlightData->Children*$chd_price + $FlightData->Infant*$inf_price;
        if(!empty($baggages)){
            foreach($baggages as $baggage){
                $total_price+=$baggage->price;
            }
        }
        ?>
        <tr style="font-weight: bold;">
            <td colspan="2">Tóm tắt giá vé</td>
            <td>Tổng</td>
        </tr>
        <tr>
            <td>Người lớn</td>
            <td><?php print($FlightData->Adult); ?> x <?php print(number_format($adt_price,0,",",".")); ?></td>
            <td><?php print(number_format($FlightData->Adult*$adt_price,0,",",".")); ?> đ</td>
        </tr>
        <?php if($FlightData->Children>0): ?>
            <tr>
                <td>Trẻ em</td>
                <td><?php print($FlightData->Children); ?> x <?php print(number_format($chd_price,0,",",".")); ?></td>
                <td><?php print(number_format($FlightData->Children*$chd_price,0,",",".")); ?> đ</td>
            </tr>
        <?php endif; ?>
        <?php if($FlightData->Infant>0): ?>
            <tr>
                <td>Em bé</td>
                <td><?php print($FlightData->Infant); ?> x <?php print(number_format($inf_price,0,",",".")); ?></td>
                <td><?php print(number_format($FlightData->Infant*$inf_price,0,",",".")); ?> đ</td>
            </tr>
        <?php endif; ?>
        <?php if(!empty($baggages)): ?>
            <?php foreach($baggages as$baggage): ?>
                <?php $weight+=$baggage->value; ?>
                <?php $price+=$baggage->price; ?>
            <?php endforeach; ?>
            <tr>
                <td>Hành lý ký gửi:</td>
                <td><?php print($weight); ?> kg</td>
                <td><?php print(number_format($price,0,",",".")); ?> đ</td>
            </tr>
        <?php endif; ?>
        <tr>
            <td colspan="2">Tổng giá</td>
            <td class="price-1"><?php print(number_format($total_price,0,",",".")); ?> đ</td>
        </tr>
    </table>
<?php endif; ?>
