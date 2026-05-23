<?php _print_r($DepartureFlight); ?>
<?php if(!empty( $form['#ChoseDepatureFlight'])): _print_r($form['#DepartureFlights']); ?>
    <table class="table table-hovered">
        <?php foreach($_SESSION['booking'] as $key => $value): ?>
            <?php if(!empty($value)): ?>
                <?php
                $_fee = 0;
                $Flight = $value['Flight'];
                $AirlineCode = $Flight->AirlineCode;
                $num = $Flight->FlightNumber;
                if (strpos($num, 'VN') !== false) {
                    $new_num = str_replace("VN","",$num);
                    $_length = strlen($new_num);
                    if($_length==4 && (strpos((string)$num,"VN4")!==false || strpos((string)$num,"VN6")!==false)){
                        $AirlineCode = "JQ";
                    }
                }
                $FlightSession = $Flight->FlightSession;
                $FlightDetail = $Flight->FlightDetail;
                ?>
                <tr>
                    <td><?php print($Flight->StartPoint); ?> <i class="fa fa-long-arrow-right"></i> <?php print($Flight->EndPoint); ?></td>
                    <td><span class="fa fa-clock-o"></span> <?php print(date("H:i d/m",strtotime($Flight->StartDate))); ?></td>
                    <td><?php cassiopeia_render_airline_logo($AirlineCode); ?></td>
                </tr>
                <?php
                $endpoint = cassiopeia_get_airport($Flight->EndPoint);
                $TotalAgentRate+=$customFee;
                $TotalAgentRate+=$_SESSION['silver_rank_fee'];
                $raw_fee = $FlightDetail->PriceAdult;
                $adt_price += $FlightDetail->PriceAdult + $FlightDetail->FeeAdult + $FlightDetail->TaxAdult+ $customFee+$_SESSION['silver_rank_fee'];
                if($chd>0){
                    $chd_price += $FlightDetail->PriceChild + $FlightDetail->FeeChild + $FlightDetail->TaxChild+ $customFee+$_SESSION['silver_rank_fee'];
                }
                if($inf>0){
                    $inf_price += $FlightDetail->PriceInfant + $FlightDetail->FeeInfant + $FlightDetail->TaxInfant;
                }
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
        $_SESSION['TotalPrice'] = $total_price;
        $_SESSION['TotalAgentRate'] = $TotalAgentRate;
        $_SESSION['customFee'] = $customFee;
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
        </tr>
    </table>
<?php endif; ?>