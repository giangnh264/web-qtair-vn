<?php
global $user;
if(!empty($variables['baggages'])){
    $baggages = $variables['baggages'];
}
$info           = $variables['info'];
$weight = 0;
$price = 0;
$total_price = 0;
$adt_price = 0;
$chd_price = 0;
$inf_price = 0;
$adt = $_SESSION['SearchInfo']->Adult;
$chd = $_SESSION['SearchInfo']->Children;
$inf= $_SESSION['SearchInfo']->Infant;
$AgentRate = 0;
$TotalAgentRate = 0;
$TotalServiceFee = 0;
//print_r($_SESSION['booking']);
?>
<?php if(!empty($_SESSION['booking'])): ?>
    <table class="table table-hovered">
        <?php foreach($_SESSION['booking'] as $key => $value): ?>
            <?php if(!empty($value)): ?>
                <?php
                $_fee = 0;
                $Flight = $value['Flight'];
                $AirlineCode = $Flight->AirlineCode;
                $FlightDetail = $Flight->FlightDetail;
                ?>
                <tr>
                    <td><?php print($Flight->StartPoint); ?> <i class="fa fa-long-arrow-right"></i> <?php print($Flight->EndPoint); ?></td>
                    <td><span class="fa fa-clock-o"></span> <?php print(date("H:i d/m",strtotime($Flight->StartDate))); ?></td>
                    <td>
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
                    </td>
                </tr>
                <?php
                $raw_fee = $FlightDetail->PriceAdult;
                $adt_price += cassiopeia_qt_price_fix($FlightDetail->PriceAdult) + cassiopeia_qt_price_fix($FlightDetail->FeeAdult) + cassiopeia_qt_price_fix($FlightDetail->TaxAdult) + cassiopeia_qt_price_fix($FlightDetail->AgentFee);
//                if(empty($user->uid)){
                    $adt_price+=cassiopeia_qt_price_fix($FlightDetail->ServiceFee);
//                }
                $TotalServiceFee+=cassiopeia_qt_price_fix($FlightDetail->AgentFee);
                if($chd>0){
                    $chd_price += cassiopeia_qt_price_fix($FlightDetail->PriceChild) + cassiopeia_qt_price_fix($FlightDetail->FeeChild) + cassiopeia_qt_price_fix($FlightDetail->TaxChild) + cassiopeia_qt_price_fix($FlightDetail->AgentFee);
//                    if(empty($user->uid)){
                        $chd_price+=cassiopeia_qt_price_fix($FlightDetail->ServiceFee);
//                    }
                    $TotalServiceFee+=cassiopeia_qt_price_fix($FlightDetail->AgentFee);
                }
                if($inf>0){
                    $inf_price += cassiopeia_qt_price_fix($FlightDetail->PriceInfant) + cassiopeia_qt_price_fix($FlightDetail->FeeInfant) + cassiopeia_qt_price_fix($FlightDetail->TaxInfant) +  cassiopeia_qt_price_fix($FlightDetail->AgentInfantFee);
                    if(empty($user->uid)){
                        $inf_price += cassiopeia_qt_price_fix($FlightDetail->ServiceInfantFee);
                    }
                }
                $adt_price = cassiopeia_qt_price_fix($adt_price);
                $chd_price = cassiopeia_qt_price_fix($chd_price);
                $inf_price = cassiopeia_qt_price_fix($inf_price);
                ?>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php
        $total_price += $adt_price*$adt + $chd_price*$chd + $inf_price*$inf;
        $TotalAgentRate = $TotalAgentRate*($adt+$chd);
        if(!empty($baggages)){
            foreach($baggages as $baggage){
                $total_price+=$baggage->price;
            }
        }
//        _print_r($TotaServiceFee);
        $_SESSION['TotalPrice'] = $total_price;
        $_SESSION['TotalServiceFee'] = $TotalServiceFee;
        ?>
        <tr style="font-weight: bold;">
            <td colspan="2">Tóm tắt giá vé</td>
            <td>Tổng</td>
        </tr>
        <tr>
            <td>Người lớn</td>
            <td><?php print($adt); ?> x <?php print(number_format($adt_price,0,",",".")); ?></td>
            <td><?php print(number_format($adt*$adt_price,0,",",".")); ?> đ</td>
        </tr>
        <?php if($chd>0): ?>
            <tr>
                <td>Trẻ em</td>
                <td><?php print($chd); ?> x <?php print(number_format($chd_price,0,",",".")); ?></td>
                <td><?php print(number_format($chd*$chd_price,0,",",".")); ?> đ</td>
            </tr>
        <?php endif; ?>
        <?php if($inf>0): ?>
            <tr>
                <td>Em bé</td>
                <td><?php print($inf); ?> x <?php print(number_format($inf_price,0,",",".")); ?></td>
                <td><?php print(number_format($inf*$inf_price,0,",",".")); ?> đ</td>
            </tr>
        <?php endif; ?>
        <?php if(!empty($baggages)): ?>
            <?php foreach($baggages as$baggage): ?>
                <?php $weight+=cassiopeia_get_baggage_by_id($baggage->value)->weight; ?>
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
            <!--            <td class="price-1">--><?php //print(number_format($TotalAgentRate,0,",",".")); ?><!-- đ</td>-->
        </tr>
    </table>
<?php endif; ?>
