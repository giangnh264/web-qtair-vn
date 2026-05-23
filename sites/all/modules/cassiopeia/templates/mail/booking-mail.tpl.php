<?php

$_code = $variables['booking_code'];
$total_price = 0;

$query = db_select("tbl_ticket","tbl_ticket");
$query -> fields("tbl_ticket");
$query -> condition("booking_code",$_code,"=");
$tickets = $query -> execute() -> fetchAll();

$query = db_select("tbl_booking","tbl_booking");
$query -> fields("tbl_booking");
$query -> condition("booking_code",$_code,"=");
$booking = $query->execute()->fetchAssoc();
//print_r($booking);
$booking_detail = unserialize($booking['data']);
$_PNR = explode("-",$booking['pnr_code']);
?>
<!--<pre>-->
<!--    --><?php //print_r($booking_detail); ?>
<!--</pre>-->
<div class="booking-mail" style="background:#f7f7f7;">
    <div style="font-size:13px;padding:10px;max-width:800px; margin:0 auto;">
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
        <h3 style="font-size:14px;font-weight:normal;margin:10px 0;">
            Mã đơn hàng: <span style="color:orange;"><?php print($booking['booking_code']); ?></span>
        </h3>
        <div style="font-size:14px;margin:10px 0;">Tình trạng: <?php print(cassiopeia_get_status($booking['status'])); ?></div>
        <?php if($booking['status']=="OK"): ?>
            <div style="margin:10px 0;margin:8px 0;"><p>Quý khách đã đặt chỗ thành công trên Autic!</p>
                <p>Dưới đây là hướng dẫn thanh toán: <a href="http://autic.vn/huong-dan-thanh-toan/" name="HƯỚNG DẪN THANH TOÁN">http://autic.vn/huong-dan-thanh-toan/</a></p>
            </div>
            <div style="font-size:14px;color:#f44336;margin-bottom:10px;">Vui lòng thanh toán trước <b><?php print(date("H:i",$booking['ExpiryDt'])); ?> ngày <?php print(date("d/m/Y",$booking['ExpiryDt'])); ?></b>, sau thời gian trên Mã đặt chỗ sẽ bị hủy!</div>
        <?php elseif($booking['status']=="FAIL"): ?>
            <div style="margin:10px 0;margin:8px 0;">
                <p>Xin lỗi quý khách đã đặt vé không thể giữ chỗ. Vui lòng liên hệ BOOKER của Autic để được hỗ trợ tại đây: ...</p>
            </div>
        <?php endif; ?>

<!--        <div style="font-size:14px;color:#f44336;margin-bottom:10px;">Vui lòng thanh toán trước <b>15:29 ngày 13/02/2020</b>, sau thời gian trên Mã đặt chỗ sẽ bị hủy!</div>-->

        <?php if(!empty($tickets)): ?>
            <?php
            $adult_fee = 0;
            $child_fee = 0;
            $infant_fee = 0;
            $_index=0;
            ?>
            <?php foreach($tickets as $ticket): $_detail = unserialize($ticket->ticket)['data'];?>
<!--                <pre>-->
<!--                    --><?php // print_r($_detail); ?>
<!--                </pre>-->
                <?php
                $endpoint = cassiopeia_get_airport($_detail->ListFlight[0]->EndPoint);
                if($endpoint->country_code=="VN"){
                    $region_code = "DO";
                }else{
                    $region_code = $endpoint->region_code;
                }
                $region_fee = cassiopeia_get_fee_by_airline_and_region($_detail->Airline,$region_code);
                if(!empty($region_fee)){
                    $_fee = $region_fee['value'];
                }
                $adult_fee += $_fee+ $_detail->FareAdt+$_detail->TaxAdt+$_detail->FeeAdt;
//                _print_r($_detail);
                $child_fee += $_fee+ $_detail->FareChd+$_detail->TaxChd+$_detail->FeeChd;
                $infant_fee += $_detail->FareInf+$_detail->TaxInf+$_detail->FeeInf;
               $airline = cassiopeia_get_airline($_detail->Airline);

               ?>
                <?php foreach($_detail->ListFlight as $flight): ?>
                    <table width="100%" style="background: #E2E2E2;border-bottom: 3px solid #f3f3f3;">
                        <tbody><tr>
                            <td valign="middle" style="width: 100px; padding: 5px ">Mã đặt chỗ<br><b style="color:#2173F3;"><?php print($_PNR[$_index]);?></b></td>
                            <td style="padding:5px;">
                            <span style="font-size:14px;font-weight:bold;"><b>
                                <?php
                                $startpoint = cassiopeia_get_airport($flight->StartPoint);
                                if(!empty($startpoint)) print($startpoint->city); print("(".$flight->StartPoint.")");
                                //                                print_r($startpoint);
                                ?>
                                    →
                                    <?php
                                    $endpoint = cassiopeia_get_airport($flight->EndPoint);
                                    if(!empty($endpoint)) print($endpoint->city); print("(".$flight->EndPoint.")");
                                    ?></b></span>
                                <br><span style="color:#888;"><?php print(date("d/m/Y",strtotime($flight->StartDate))); ?></span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#FFF;font-size:13px;">
                        <thead>
                        <tr>
                            <td style="padding:5px 0px 5px 5px;border-bottom: 3px solid #f3f3f3;">Chuyến bay</td>
                            <td width="35%" align="right" style="padding:5px 0px 5px 0px;border-bottom: 3px solid #f3f3f3;">Xuất phát</td>
                            <td width="15%" style="padding:5px 0px 5px 0px;border-bottom: 3px solid #f3f3f3;"></td>
                            <td width="35%" style="padding:5px 5px 5px 0px;border-bottom: 3px solid #f3f3f3;">Điểm đến</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="4" style="padding: 5px 5px 0 5px;">
                                <b>
                                    <?php
                                    if(!empty($airline)) print($airline->name); ?>
                                </b>
                                <b style="float:right;">Hạng
                                    <?php
//                                    _print_r($flight);
                                    if($flight->Airline=="VN"){
                                        print($flight->ListSegment[0]->Class);
                                    }else{
                                        print($flight->GroupClass);
                                    }
                                    ?>
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:0 0 5px 3px;">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td style="width: 100px;"><?php cassiopeia_render_airline_logo($airline->iata); ?> <strong style="font-size:14px;"><?php print($flight->FlightNumber); ?></strong></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td style="padding:0 0 5px 0;" align="right"><strong style="font-size:15px;"><?php  print(date("H:i",strtotime($flight->StartDate))); ?></strong><br><?php if(!empty($startpoint)) print($startpoint->city); ?><br><small>(<b><?php print($flight->StartPoint); ?></b>)</small><?php print($startpoint->name); ?><br><small><?php  print(date("d/m/Y",strtotime($flight->StartDate))); ?></small><br></td>
                            <td style="padding:0 0 5px 0;" align="center" valign="middle"><img src="http://cpbeta.maybay.net/dist/img/plane.png" width="15" height="15"><br><?php print(floor($flight->Duration/60)."h ".($flight->Duration%60)."p"); ?></td>
                            <td style="padding:0 0 5px 0;"><strong style="font-size:15px;"><?php  print(date("H:i",strtotime($flight->EndDate))); ?></strong><br><?php if(!empty($endpoint)) print($endpoint->city); ?><br><?php if(!empty($endpoint)) print($endpoint->city); ?><small>(<b><?php print($flight->EndPoint); ?></b>)</small><br><small><?php  print(date("d/m/Y",strtotime($flight->EndDate))); ?></small><br></td>
                        </tr>
                        </tbody>
                    </table>

                <?php endforeach; ?>
                <?php $_index++; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <div style="background: #E2E2E2;padding:5px;margin-top:10px;">
            <b>Chi Tiết Giá Vé</b>
        </div>
        <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#FFF;">
            <thead>
            <tr>
                <th align="left" style="padding:5px 0px 5px 5px;border-bottom: 3px solid #f3f3f3;font-weight:normal;">STT</th>
                <th align="left" style="padding:5px 0px 5px 0px;border-bottom: 3px solid #f3f3f3;font-weight:normal;">Hành khách</th>
                <th align="left" style="padding:5px 0px 5px 0px;border-bottom: 3px solid #f3f3f3;font-weight:normal;">Ngày sinh</th>
                <th align="right" style="padding:5px 5px 5px 0px;border-bottom: 3px solid #f3f3f3;font-weight:normal;">Giá vé (VND)</th>
            </tr>
            </thead>
            <tbody>
                <?php $hasBaggage = FALSE; ?>
                <?php if(!empty($booking_detail->ListPassenger)): ?>
                    <?php $index=1; ?>
                    <?php foreach ($booking_detail->ListPassenger as $flight_value => $item):?>
                        <?php $stt=1; ?>
                        <?php foreach($item as $key => $guest):?>
                            <?php if($index==1): ?>
                                <?php
                                switch($guest['Type']){
                                    case "ADT": $price = $adult_fee; break;
                                    case "CHD": $price = $child_fee; break;
                                    case "INF": $price = $infant_fee; break;
                                }
                                $total_price+=$price;
//                                _print_r($total_price);
                                ?>
<!--                                <pre>-->
<!--                                    --><?php //print_r($guest); ?>
<!--                                </pre>-->
                                <tr>
                                    <td style="padding: 5px 0px 5px 5px; "><?php print($stt); ?></td><td><?php print($guest['FirstName']); ?> <?php print($guest['LastName']); ?></td>
                                    <td>
                                        <?php if(!empty($guest['Birthday'])): ?>
                                            <?php print(substr($guest['Birthday'],0,2)); ?>/<?php print(substr($guest['Birthday'],2,2)); ?>/<?php print(substr($guest['Birthday'],4)); ?>
                                        <?php endif; ?>
                                    </td>
                                    <td align="right" style="padding: 5px 5px 5px 0px; "><?php print(number_format($price,0,",",".")); ?></td>
                                </tr>
                                <?php
                                if(!empty($guest['ListBaggage'])){
                                    $hasBaggage = TRUE;
                                    $baggages[$guest['Index']]['leg_0'] = $guest;
                                }
                                ?>
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
                    <td colspan="4" align="right" style="padding:5px;">
                        <b><?php print(number_format($total_price,0,",",".")); ?></b>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php if(!empty($baggages)): ?>
            <div style="background: #E2E2E2;padding:5px;margin-top:10px;">
                <b>Hành lý ký gửi</b>
            </div>
            <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#FFF;">
                <thead>
                <tr>
                    <th align="left" style="padding:5px 0px 5px 5px;border-bottom: 3px solid #f3f3f3;font-weight:normal;">STT</th>
                    <th align="left" style="padding:5px 0px 5px 0px;border-bottom: 3px solid #f3f3f3;font-weight:normal;">Hành khách</th>
                    <th align="left" style="padding:5px 0px 5px 0px;border-bottom: 3px solid #f3f3f3;font-weight:normal;">Dịch vụ</th>
                    <th align="right" style="padding:5px 5px 5px 0px;border-bottom: 3px solid #f3f3f3;font-weight:normal;">Phí (VND)</th>
                </tr>
                </thead>
                <tbody>
                    <?php if(!empty($baggages)):?>
                        <?php $stt=1; ?>
                        <?php $total_baggage_price=0; ?>
                        <?php foreach($baggages as $baggage): ?>
                            <?php $total_price+=$baggage['leg_0']['ListBaggage'][0]['Price']; ?>
                            <?php $total_baggage_price+=$baggage['leg_0']['ListBaggage'][0]['Price']; ?>
                            <tr>
                                <td rowspan="2" style="   padding: 5px 0px 5px 5px;"><?php print($stt); ?></td>
                                <td rowspan="2"><?php print($baggage['leg_0']['FirstName']); ?> <?php print($baggage['leg_0']['LastName']); ?></td>
                                <td>Chuyến đi, hành lý ký gửi <?php print($baggage['leg_0']['ListBaggage'][0]['Value']); ?>kg</td>
                                <td><?php print(number_format($baggage['leg_0']['ListBaggage'][0]['Price'],0,",",".")); ?></td>
                            </tr>
                            <?php if(!empty($baggage['leg_1'])): ?>
                                <tr>
                                    <td>Chuyến về, hành lý ký gửi <?php print($baggage['leg_1']['ListBaggage'][0]['Value']); ?>kg</td>
                                    <td><?php print(number_format($baggage['leg_1']['ListBaggage'][0]['Price'],0,",",".")); ?></td>
                                </tr>
                                <?php $total_price+=$baggage['leg_1']['ListBaggage'][0]['Price']; ?>
                                <?php $total_baggage_price+=$baggage['leg_1']['ListBaggage'][0]['Price']; ?>
                            <?php endif; ?>
                            <?php $stt++; ?>
                        <?php endforeach; ?>
    <!--                    <pre>-->
    <!--                        --><?php //print_r($baggages); ?>
    <!--                    </pre>-->
                    <?php endif; ?>
                    <tr>
                        <td colspan="4" align="right" style="padding:5px;">
                            <b><?php print(number_format($total_baggage_price,0,",",".")); ?></b>
                        </td>
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

        <div style="text-align:right;font-weight:bold;background-color:#FFF;padding:5px;margin-top:2px;">
            Tổng giá: <span style="color:orange;"><?php print(number_format($total_price,0,",",".")); ?></span>
        </div>
        <div style="background: #E2E2E2;padding:5px;margin-top:10px;"><b>Thông Tin Thanh Toán </b></div><div style="background:#fff;padding:5px;"><p><span style="width:130px;display:inline-block;">Hình thức thanh toán:</span><b> Chuyển khoản</b></p></div>
        <div style="background: #E2E2E2;padding:5px;margin-top:10px;">
            <b>Thông Tin Liên Hệ</b>
        </div>
        <table style="width:100%;background-color:#FFF" cellpadding="0" cellspacing="0">
            <tbody>
            <tr>
                <td style="padding:5px;" width="150px">Họ tên:</td>
                <td style="padding:5px;">
                    <b><?php print($booking_detail->Contact['Gender']==1?"Ông":"Bà"); ?> <?php print($booking_detail->Contact['FirstName']); ?> <?php print($booking_detail->Contact['LastName']); ?></b>
                </td>
            </tr>
            <tr>
                <td style="padding:5px;" width="150px">Số điện thoại:</td>
                <td style="padding:5px;"><b><?php print($booking_detail->Contact['Phone']); ?></b></td>
            </tr>
            <tr>
                <td style="padding:5px;" width="150px">Email:</td>
                <td style="padding:5px;"><b><?php print($booking_detail->Contact['Email']); ?></b></td>
            </tr>
            <tr>
                <td style="padding:5px;" width="150px">Yêu cầu đặc biệt:</td>
                <td style="padding:5px;"><b></b></td>
            </tr>
            </tbody>
        </table>
        <?php if(!empty($tickets)): ?>
        <?php $index=1; ?>
        <?php foreach($tickets as $ticket): ?>
            <?php
                $_detail = unserialize($ticket->ticket);
                $_rules = unserialize($ticket->rules);
                $airline = cassiopeia_get_airline($_detail['data']->Airline);
//                print_r($_rules);
            ?>
                <div style="background: #E2E2E2;padding:5px;margin-top:10px;"><b> Điều kiện vé  <?php if(count($_detail->ListFlight)==1) print("chiều ".$index==1?"đi":"về"); ?> - <?php print($airline->name); ?> (Hạng <?php print($_detail['data']->ListFlight[0]->FareClass); ?>): <?php
                        $startpoint = cassiopeia_get_airport($_detail['data']->ListFlight[0]->StartPoint);
                        if(!empty($startpoint)) print($startpoint->city); print("(".$_detail['data']->ListFlight[0]->StartPoint.")");
                        //                                print_r($startpoint);
                        print(count($_detail->ListFlight)==1?"<i class=\"fa fa-long-arrow-right\"></i>":"<i class=\"fa fa-arrows-h\"></i>");
                        $endpoint = cassiopeia_get_airport($_detail['data']->ListFlight[0]->EndPoint);
                        if(!empty($endpoint)) print($endpoint->city); print("(".$_detail['data']->ListFlight[0]->EndPoint.")");
                        ?></b></div>
                <div style="background:#fff;padding:5px;"><h5></h5><p></p>
                    <?php print($_rules->ListFareRules[0]->ListRulesGroup[0]->ListRulesText[0]); ?>
                    <p></p>
                </div>
                <?php $index++; ?>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>