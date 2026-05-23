<?php
$booking_code = $variables['booking_code'];
//print($booking_code);
?>
<?php

$_code = $booking_code;

$query = db_select("tbl_ticket","tbl_ticket");
$query -> fields("tbl_ticket");
$query -> condition("booking_code",$_code,"=");
$tickets = $query -> execute() -> fetchAll();

$query = db_select("tbl_booking","tbl_booking");
$query -> fields("tbl_booking");
$query -> condition("booking_code",$_code,"=");
$booking = $query->execute()->fetchAssoc();
//_print_r(json_decode(unserialize($booking['booking'])[0]));
if($booking['changed']==1){
    $booking['pnr_code'] = "";
}
$booking_detail = unserialize($booking['data']);
$point_1 = cassiopeia_get_airport($booking_detail->ListFlight[0]['StartPoint']);
$point_2 = cassiopeia_get_airport($booking_detail->ListFlight[0]['EndPoint']);
//_print_r(unserialize($tickets[0]->ticket));
//_print_r($point_1);
//foreach (unserialize($booking['booking']) as $item){
//    _print_r(json_decode($item));
//}
$_PNR = $booking['pnr_code'];
$_splitter = explode("-",$_PNR);
?>
<!--Kiểm tả quyền-->

<!--end-->

<div class="booking-view">
    <div class="page-container">
        <p><b>
                <?php
                if(!empty(variable_get("cassiopeia_config_site_logo"))){
                    $logo_home = file_load(variable_get("cassiopeia_config_site_logo"));
                    $node_img = (array) $logo_home;
                    $node_img['style_name'] = "style_width_80";
                    $node_img['path'] = $node_img['uri'];
                    $node_img = theme('image_style', $node_img);
                    print(l($node_img, '/', array('html'=>TRUE)));
                }
                ?>
            </b></p>

        <h2 style="text-align:center;font-size:16px; margin:10px 0 0 0;">THÔNG TIN ĐẶT VÉ VÀ XÁC NHẬN HÀNH TRÌNH</h2>
        <div class="block-content">
            <div class="booking-code">
                <label for="">Mã đơn hàng:</label>
                <span style="color:orange;"><?php print($booking_code); ?></span>
            </div>
            <div class="booking-code ">
                <label for="">Mã đặt chỗ:</label>
                <span class="pnr-code" ><?php print($booking['pnr_code']); ?></span>
            </div>
            <div class="booking-code">
                <label for="">Tình trạng:</label>
                <span class="booking-status <?php print($booking['status']); ?>"><?php print(cassiopeia_get_status($booking['status'])); ?></span>
            </div>

            <?php if($booking['status']=="OK"): ?>
                <div style="margin:10px 0;margin:8px 0;"><p>Quý khách đã đặt chỗ thành công trên Autic!</p>
                    <p>Dưới đây là hướng dẫn thanh toán: <a href="http://autic.vn/huong-dan-thanh-toan/" name="HƯỚNG DẪN THANH TOÁN">http://autic.vn/huong-dan-thanh-toan/</a></p>
                </div>
                <div style="font-size:14px;color:#f44336;margin-bottom:10px;">Vui lòng thanh toán trước <b><?php print(date("H:i",$booking['ExpiryDt'])); ?> ngày <?php print(date("d/m/Y",$booking['ExpiryDt'])); ?></b>, sau thời gian trên Mã đặt chỗ sẽ bị hủy!</div>
            <?php elseif($booking['status']=="FAIL"): ?>
                <div style="margin:10px 0;margin:8px 0;color:red;">
                    <p>Xin lỗi quý khách đã đặt vé không thể giữ chỗ. Vui lòng liên hệ BOOKER của Autic để được hỗ trợ !</p>
                </div>
            <?php endif; ?>
            <div class="tickets">
                <?php if(!empty($tickets)): ?>
                    <?php
                    $_fee = 0;
                    $adult_fee = 0;
                    $child_fee = 0;
                    $infant_fee = 0;
                    $total_price = 0;
                    $index=0;
                    $__airlines = array();
                    ?>
                    <?php foreach($tickets as $ticket): ?>
                        <?php
                        $flights = array();
                        if($ticket->type==1){
                            $_detail = unserialize($ticket->ticket);
                            $package = unserialize($ticket->package);
                            $endpoint = cassiopeia_get_airport($_detail->EndPoint);
                            if($point_1->country_code!="VN" && $point_2->country_code!="VN"){
                                $region_code = "SOTO";
                            }else{
                                $region_code = $point_2->region_code;
                            }
                            $region_fee = cassiopeia_get_fee_by_airline_and_region($_detail->Airline,$region_code);
                            if(!empty($region_fee)){
                                $_fee =$region_fee['value'];
                            }
                            $adult_fee += $_fee+$package->FareAdt+$package->TaxAdt+$package->FeeAdt;
                            $child_fee += $_fee+$package->FareChd+$package->TaxChd+$package->FeeChd;
                            $infant_fee +=$package->FareInf+$package->TaxInf+$package->FeeInf;
                            $flights[] = $_detail;
                        }else{
                            $_detail = unserialize($ticket->ticket)['data'];
                            $endpoint = cassiopeia_get_airport($_detail->ListFlight[0]->EndPoint);
                            if($endpoint->country_code=="VN"){
                                $region_code = "DO";
                            }else{
                                $region_code = $endpoint->region_code;
                            }
                            $__airlines[$index] = $_detail->Airline;
                            $region_fee = cassiopeia_get_fee_by_airline_and_region($_detail->Airline,$region_code);
                            if(!empty($region_fee)){
                                $_fee =$region_fee['value'];
                            }
                            $adult_fee += $_fee+ $_detail->FareAdt+$_detail->TaxAdt+$_detail->FeeAdt;
                            $child_fee += $_fee+ $_detail->FareChd+$_detail->TaxChd+$_detail->FeeChd;
                            $infant_fee += $_detail->FareInf+$_detail->TaxInf+$_detail->FeeInf;
                            $flights = $_detail->ListFlight;
                        }

//                        _print_r($flights);
                        ?>
                        <?php $airline = cassiopeia_get_airline($_detail->Airline); ?>
                        <?php foreach($flights as $flight): ?>
                            <div class="flight table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th colspan="6" style="    background: #E2E2E2;border-bottom: 3px solid #f3f3f3;">
                                            <div class="ticket-head-block">
                                                <div class="pnr-code">
                                                    <div>Mã đặt chỗ</div>
                                                    <div>
                                                        <?php
                                                        if(!empty(($__airlines[1]))){
                                                            if($__airlines[1]==$__airlines[0]){
//                                                                   print(123);
                                                                print(!empty($_splitter[0])?$_splitter[0]:"");
                                                            }else{
                                                                print(!empty($_splitter[$index])?$_splitter[$index]:"");
                                                            }
                                                        }else{
                                                            print(!empty($_splitter[$index])?$_splitter[$index]:"");
                                                        }

                                                        ?>
                                                    </div>
                                                </div>
                                                <div>
                                                    <?php
                                                    $startpoint = cassiopeia_get_airport($flight->StartPoint);
                                                    if(!empty($startpoint)) print($startpoint->city); print("(".$flight->StartPoint.")");
                                                    ?>
                                                    →
                                                    <?php
                                                    $endpoint = cassiopeia_get_airport($flight->EndPoint);
                                                    if(!empty($endpoint)) print($endpoint->city); print("(".$flight->EndPoint.")");
                                                    ?>
                                                    - <?php print(date("d/m/Y",strtotime($flight->StartDate))); ?>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="hidden-xs">
                                        <td>Chuyến bay</td>
                                        <td colspan="1" align="right">Xuất phát</td>
                                        <td></td>
                                        <td colspan="3">Điểm đến</td>
                                    </tr>
                                    <tr class="hidden-xs">
                                        <td colspan="5"><b><?php if(!empty($airline)) print($airline->name); ?></b></td>
                                        <td colspan="1" width="30%"><b>Hạng <?php print($flight->GroupClass); ?></b></td>
                                    </tr>
                                    <tr class="hidden-xs">
                                        <td width="20%">
                                            <div class="airline-logo">
                                                <?php cassiopeia_render_airline_logo($airline->iata); ?>
                                            </div>
                                            <div class="airline-flight-number">
                                                <?php print($flight->FlightNumber); ?>
                                            </div>
                                        </td>
                                        <td width="20%" align="right">
                                            <div class="start-time">
                                                <?php  print(date("H:i",strtotime($flight->StartDate))); ?>
                                            </div>
                                            <div class="point">
                                                <?php print($flight->StartPoint); ?>
                                            </div>
                                            <div class="airport">
                                                <?php print($startpoint->name); ?>
                                            </div>
                                            <div class="start-date">
                                                <?php  print(date("d/m/Y",strtotime($flight->StartDate))); ?>
                                            </div>
                                        </td>
                                        <td width="10%" align="center">
                                            <img src="http://cpbeta.maybay.net/dist/img/plane.png" width="15" height="15">
                                            <div class="duration">
                                                <?php print(floor($flight->Duration/60)."h ".($flight->Duration%60)."p"); ?>
                                            </div>
                                        </td>
                                        <td width="20%" colspan="2">
                                            <div class="start-time">
                                                <?php  print(date("H:i",strtotime($flight->EndDate))); ?>
                                                <!--                                                    --><?php //print($flight->StartPoint); ?>
                                                <!--                                                    --><?php //print($startpoint->name); ?>
                                                <!--                                                    --><?php // print(date("d/m/Y",strtotime($flight->StartDate))); ?>
                                            </div>
                                            <div class="point">
                                                <?php print($flight->EndPoint); ?>
                                            </div>
                                            <div class="airport">
                                                <?php print($endpoint->name); ?>
                                            </div>
                                            <div class="start-date">
                                                <?php  print(date("d/m/Y",strtotime($flight->EndDate))); ?>
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr class="footable-detail-row visible-xs" style="">
                                        <td width="40%" align="right">
                                            <div class="start-time">
                                                <?php  print(date("H:i",strtotime($flight->StartDate))); ?>
                                            </div>
                                            <div class="point">
                                                <?php print($flight->StartPoint); ?>
                                            </div>
                                            <div class="airport">
                                                <?php print($startpoint->name); ?>
                                            </div>
                                            <div class="start-date">
                                                <?php  print(date("d/m/Y",strtotime($flight->StartDate))); ?>
                                            </div>
                                        </td>
                                        <td width="20%" align="center">
                                            <div class="airline-logo">
                                                <?php cassiopeia_render_airline_logo($airline->iata); ?>
                                            </div>
                                            <div class="airline-flight-number">
                                                <?php print($flight->FlightNumber); ?>
                                            </div>
                                            <div class="duration">
                                                <?php print(floor($flight->Duration/60)."h ".($flight->Duration%60)."p"); ?>
                                            </div>
                                        </td>
                                        <td width="40%">
                                            <div class="start-time">
                                                <?php  print(date("H:i",strtotime($flight->EndDate))); ?>
                                                <!--                                                    --><?php //print($flight->StartPoint); ?>
                                                <!--                                                    --><?php //print($startpoint->name); ?>
                                                <!--                                                    --><?php // print(date("d/m/Y",strtotime($flight->StartDate))); ?>
                                            </div>
                                            <div class="point">
                                                <?php print($flight->EndPoint); ?>
                                            </div>
                                            <div class="airport">
                                                <?php print($endpoint->name); ?>
                                            </div>
                                            <div class="start-date">
                                                <?php  print(date("d/m/Y",strtotime($flight->EndDate))); ?>
                                            </div>
                                        </td>
                                        <!--                                            <td colspan="3">-->
                                        <!--                                                <table class="footable-details table table-bordered datatable booking-table">-->
                                        <!--                                                    <tbody>-->
                                        <!--                                                        <tr class="odd new-booking">-->
                                        <!--                                                        <th>Logo</th>-->
                                        <!--                                                        <td style="display: table-cell;">-->
                                        <!--                                                            --><?php //cassiopeia_render_airline_logo($airline->iata); ?>
                                        <!--                                                        </td>-->
                                        <!--                                                    </tr>-->
                                        <!--                                                        <tr class="odd new-booking">-->
                                        <!--                                                        <th>Xuất phát</th>-->
                                        <!--                                                        <td style="display: table-cell;">-->
                                        <!--                                                            <div class="start-time">-->
                                        <!--                                                                --><?php // print(date("H:i",strtotime($flight->StartDate))); ?>
                                        <!--                                                            </div>-->
                                        <!--                                                            <div class="point">-->
                                        <!--                                                                --><?php //print($flight->StartPoint); ?>
                                        <!--                                                            </div>-->
                                        <!--                                                            <div class="airport">-->
                                        <!--                                                                --><?php //print($startpoint->name); ?>
                                        <!--                                                            </div>-->
                                        <!--                                                            <div class="start-date">-->
                                        <!--                                                                --><?php // print(date("d/m/Y",strtotime($flight->StartDate))); ?>
                                        <!--                                                            </div>-->
                                        <!--                                                        </td>-->
                                        <!--                                                    </tr>-->
                                        <!--                                                        <tr class="odd new-booking">-->
                                        <!--                                                        <th>Thời gian</th>-->
                                        <!--                                                        <td style="display: table-cell;">-->
                                        <!--                                                            --><?php //print(floor($flight->Duration/60)."h ".($flight->Duration%60)."p"); ?>
                                        <!--                                                        </td>-->
                                        <!--                                                    </tr>-->
                                        <!--                                                        <tr class="odd new-booking">-->
                                        <!--                                                            <th>Điểm đến</th>-->
                                        <!--                                                            <td style="display: table-cell;">-->
                                        <!--                                                            <div class="start-time">-->
                                        <!--                                                                --><?php // print(date("H:i",strtotime($flight->EndDate))); ?>
                                        <!--                                                                --><?php //print($flight->StartPoint); ?>
                                        <!--                                                                --><?php //print($startpoint->name); ?>
                                        <!--                                                                --><?php // print(date("d/m/Y",strtotime($flight->StartDate))); ?>
                                        <!--                                                            </div>-->
                                        <!--                                                            <div class="point">-->
                                        <!--                                                                --><?php //print($flight->EndPoint); ?>
                                        <!--                                                            </div>-->
                                        <!--                                                            <div class="airport">-->
                                        <!--                                                                --><?php //print($endpoint->name); ?>
                                        <!--                                                            </div>-->
                                        <!--                                                            <div class="start-date">-->
                                        <!--                                                                --><?php // print(date("d/m/Y",strtotime($flight->EndDate))); ?>
                                        <!--                                                            </div>-->
                                        <!--                                                        </td>-->
                                        <!--                                                        </tr>-->
                                        <!--                                                    </tbody>-->
                                        <!--                                                </table>-->
                                        <!--                                            </td>-->
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        <?php endforeach; ?>
                        <?php $index++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
                <table class="table ticket-detail">
                    <thead>
                    <tr>
                        <th colspan="4" style="    background: #E2E2E2;padding: 5px;margin-top: 10px;">Chi tiết giá vé</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>STT</td>
                        <td>Hành khách</td>
                        <td>Ngày sinh</td>
                        <td>Giá vé ( đ )</td>
                    </tr>
                    <?php $hasBaggage = FALSE; ?>
                    <?php if(!empty($booking_detail->ListPassenger)):?>
                        <?php $index=1; ?>
                        <?php foreach ($booking_detail->ListPassenger as $flight_value => $item):?>
                            <?php $stt=1; ?>
                            <?php foreach($item as $key => $guest): ?>
                                <?php if($index==1): ?>
                                    <?php
                                    if(!empty($guest['ListBaggage'])){
                                        $hasBaggage = TRUE;
                                        $baggages[$guest['Index']]['leg_0'] = $guest;
                                    }
                                    switch($guest['Type']){
                                        case "ADT": $price = $adult_fee; break;
                                        case "CHD": $price = $child_fee; break;
                                        case "INF": $price = $infant_fee; break;
                                    }
                                    $total_price+=$price;
                                    ?>
                                    <tr>
                                        <td><?php print($stt); ?></td>
                                        <td style="text-transform: uppercase"><?php print($guest['FirstName']); ?> <?php print($guest['LastName']); ?></td>
                                        <td>
                                            <?php if(!empty($guest['Birthday'])): ?>
                                                <?php print(substr($guest['Birthday'],0,2)); ?>/<?php print(substr($guest['Birthday'],2,2)); ?>/<?php print(substr($guest['Birthday'],4)); ?>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php print(number_format($price,0,",",".")); ?>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php
                                    if(!empty($guest['ListBaggage'])){
                                        $hasBaggage = TRUE;
                                        $baggages[$guest['Index']]['leg_1'] = $guest;
                                    }
                                    ?>
                                <?php endif; ?>
                                <?php $stt++; ?>
                            <?php endforeach; ?>
                            <?php $index++; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <tr>
                        <td colspan="3"></td>
                        <td><?php print(number_format($total_price,0,",",".")); ?></td>
                    </tr>
                    </tbody>
                </table>

                <?php if(!empty($baggages)): ?>
                    <table class="table">
                        <thead>
                        <tr>
                            <th colspan="4" style="    background: #E2E2E2;padding: 5px;margin-top: 10px;">Hành lý gửi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>STT</td>
                            <td>Hành khách</td>
                            <td>Dịch vụ</td>
                            <td>Phí (đ)</td>
                        </tr>
                        <?php if(!empty($baggages)):?>
                            <?php $stt=1; ?>
                            <?php $total_baggage_price=0; ?>
                            <?php foreach($baggages as $baggage): ?>
                                <?php if(!empty($baggage['leg_0'])): ?>
                                    <tr>
                                        <td><?php print($stt); ?></td>
                                        <td><?php print($baggage['leg_0']['FirstName'].$baggage['leg_0']['LastName']); ?></td>
                                        <td>Chuyến đi, hành lý ký gửi <?php print($baggage['leg_0']['ListBaggage'][0]['Value']); ?>kg</td>
                                        <td><?php print(number_format($baggage['leg_0']['ListBaggage'][0]['Price'],0,",",".")); ?></td>
                                    </tr>
                                    <?php  $total_price+=$baggage['leg_0']['ListBaggage'][0]['Price']; ?>
                                    <?php $total_baggage_price+=$baggage['leg_0']['ListBaggage'][0]['Price']; ?>
                                <?php endif; ?>
                                <?php if(!empty($baggage['leg_1'])): ?>
                                    <tr>
                                        <td><?php print($stt); ?></td>
                                        <td><?php print($baggage['leg_1']['FirstName'].$baggage['leg_1']['LastName']); ?></td>
                                        <td>Chuyến về, hành lý ký gửi <?php print($baggage['leg_1']['ListBaggage'][0]['Value']); ?>kg</td>
                                        <td><?php print(number_format($baggage['leg_1']['ListBaggage'][0]['Price'],0,",",".")); ?></td>
                                    </tr>
                                    <?php $total_price+=$baggage['leg_1']['ListBaggage'][0]['Price']; ?>
                                    <?php $total_baggage_price+=$baggage['leg_1']['ListBaggage'][0]['Price']; ?>
                                <?php endif; ?>
                                <?php $stt++; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php print(number_format($total_baggage_price,0,",",".")); ?></td>
                        </tr>
                        </tbody>
                    </table>
                <?php endif; ?>
                 <table class="table totalPrice">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th style="text-align: right;">Tổng tiền:</th>
                        <th ><?php print(number_format($total_price,0,",",".")); ?> vnđ</th>
                    </tr>
                    </thead>
                </table>
                <table class="table">
                    <thead>
                    <tr>
                        <th colspan="2" style="    background: #E2E2E2;padding: 5px;margin-top: 10px;">Thông tin liên hệ</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Họ Tên:</td>
                        <td style="text-transform: uppercase"><?php print($booking_detail->Contact['Gender']==1?"Ông":"Bà"); ?> <?php print($booking_detail->Contact['FirstName']); ?> <?php print($booking_detail->Contact['LastName']); ?></td>
                    </tr>
                    <tr>
                        <td>Số điện thoại:</td>
                        <td><?php print($booking_detail->Contact['Phone']); ?></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><?php print($booking_detail->Contact['Email']); ?></td>
                    </tr>
                    <tr>
                        <td>Yêu cầu đặc biệt:</td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
                <?php if(!empty($tickets)): ?>
                    <?php $index=1; ?>
                    <?php foreach($tickets as $ticket): ?>
                        <?php
                        $flights = array();
                        if($ticket->type==1){
                            $_detail = unserialize($ticket->ticket);
                            $flights[] = $_detail;
                        }else{
                            $_detail = unserialize($ticket->ticket)['data'];
                            $flights = $_detail->ListFlight;
                        }

                        $_rules = unserialize($ticket->rules);
//                        _print_r($_rules);
                        $airline = cassiopeia_get_airline($_detail->Airline);
                        ?>
                        <?php  if($ticket->type==1): ?>
                            <?php if(!empty($_rules)): ?>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>
                                            Điều kiện vé
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            Vui lòng liên hệ bộ phận Booker để được hỗ trợ!
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <?php break; endif; ?>
                        <?php else: ?>
                            <?php if(!empty($_rules)): ?>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>
                                            Điều kiện vé  <?php if(count($flights)==1) print("chiều ".$index==1?"đi":"về"); ?> - <?php print($airline->name); ?> (Hạng <?php print($flights[0]->FareClass); ?>): <?php
                                            $startpoint = cassiopeia_get_airport($flights[0]->StartPoint);
                                            if(!empty($startpoint)) print($startpoint->city); print("(".$flights[0]->StartPoint.")");
                                            print(count($flights)==1?"<i class=\"fa fa-long-arrow-right\"></i>":"<i class=\"fa fa-arrows-h\"></i>");
                                            $endpoint = cassiopeia_get_airport($flights[0]->EndPoint);
                                            if(!empty($endpoint)) print($endpoint->city); print("(".$flights[0]->EndPoint.")");
                                            ?>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <?php print(!empty($_rules->ListFareRules[0]->ListRulesGroup[0]->ListRulesText[0])?$_rules->ListFareRules[0]->ListRulesGroup[0]->ListRulesText[0]:""); ?>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php $index++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<!--    <div class="go-back">-->
<!--        <a href="/" class="btn">Trang chủ ></a>-->
<!--    </div>-->
</div>