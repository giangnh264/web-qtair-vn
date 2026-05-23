<div class="container" id="printContent">
    <?php
    global $user;
    if(!empty($user)){
        $account = user_load($user->uid);
    }else{
        $_REQUEST['hidden-time-limit'] = 1;
    }
//    _print_r($booking);
    $booking_code = $variables['booking_code'];
    try{
        $booking = cassiopeia_qt_ticket_booking_load_by_code($booking_code);
        _print_r($booking);
        $ContactGender = $booking->contact_Gender;
        $ContactFirstName   =  $booking->contact_FirstName;
        $ContactLastName    =  $booking->contact_LastName;
        $ContactPhone       =  $booking->contact_Phone;
        $ContactEmail       =  $booking->contact_Email ;
    }catch (Exception $e){
    _print_r($e);
    }
    $_PNR = $booking->pnr_code;
    $_splitter = explode("-",$_PNR);
    $Passengers = $booking->passengers;
    $tickets = $booking->tickets;

    $B_status = $booking->status;
//    foreach($tickets as $_t){
//        if($_t->status=="OK"){
//            $B_status = "OK";
//            break;
//        }elseif($_t->status=="FAIL"){
//            $B_status="FAIL";
//            break;
//        }
//    }
//  _print_r(123);
    $total_price = 0;
    ?>



    <div class="booking-view" style="
    /*width: 980px;*/
    margin: auto;
    margin-bottom: 30px;
">
        <?php if ($booking->status == "OK"): ?>
            <?php if (!empty($booking->ExpiryDt) && isset($_REQUEST['hidden-time-limit'])): ?>
                <div style="font-size:14px;color:#f44336;margin-bottom:10px;"><?php echo t("Please pay in advance <b>:date_time</b> after the above time Reservation code will be canceled", array(":date_time" => date('H:i - d/m/Y', $booking->ExpiryDt))); ?> </div>
            <?php endif; ?>
        <?php endif; ?>
        <?php if(!empty($account)): ?>
            <div class="mt-30">
                <h4><?php echo t("Ticket office"); ?> <b><?php echo !empty($account->field_account_transaction_name['und'][0]['value'])?$account->field_account_transaction_name['und'][0]['value']:$account->field_account_full_name['und'][0]['value']; ?> - <?php echo $account->name; ?></b></h4>
            </div>
        <?php endif; ?>
        <div style="
    box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
    margin-bottom: 20px;
">
            <div style="background-color: #1d5f4d;
    font-size: 18px;
    color: #faa90d;
    text-transform: uppercase;
    font-weight: bold;
    border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
    padding: 10px 20px;">Thông tin vé điện tử
            </div>
            <div class="box-1" style="
    padding: 18px;
">
                <div style="
    display: flex;
">
                    <div style="
    width: 36%;
    border: solid thin #1d5f4d;
    border-radius: 3px;
    padding: 20px 10px;
    margin-bottom: 15px;
    border-left: solid 5px #1d5f4d;
">
                        <div>
                        <span style="
    font-weight: bold;
">Mã đặt chỗ</span>
                        </div>
                        <?php foreach (explode("-", $booking->pnr_code) as $PNR): ?>
                            <div class="pnr-code" style="
    text-align: center;
    font-weight: bold;
    font-size: 40px;
    color: #f8a70d;
    margin-top: 15px;
"><?php echo $PNR; ?></div>
                        <?php endforeach; ?>
                    </div>
                    <div class="" style="width: 64%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 10px;">
                        <?php foreach ($tickets as $ticket): ?>
                            <?php $airline = cassiopeia_get_airline($ticket->AirlineCode); ?>
                            <div>
                                <?php
                                $num = $ticket->FlightNumber;
                                if (strpos($num, 'VN') !== false) {
                                    $new_num = str_replace("VN", "", $num);
                                    $_length = strlen($new_num);
                                    if ($_length == 4 && (strpos((string)$num, "VN4") !== false || strpos((string)$num, "VN6") !== false)) {
                                        ?>
                                        <img style="width: 240px;"
                                             src="/sites/all/themes/cassiopeia_theme/img/icons/logo-pacific-airlines.jpg"
                                             alt="">
                                        <?php
                                    } else {
                                        if ($_length == 4 && (strpos((string)$num, "VN8") !== false)) {
                                            ?>
                                            <img style=""
                                                 src="/sites/all/themes/cassiopeia_theme/img/icons/vasco_logo_1.jpg" alt="">
                                            <?php
                                        } else {
                                            cassiopeia_render_airline_logo($airline->iata, "240px");
                                        }
                                    }

                                } else {
                                    cassiopeia_render_airline_logo($airline->iata, "240px");
                                }
                                ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="table-responsive">
                    <table style="
    width: 100%;
">
                        <thead>
                        <tr style="
    background-color: #1d5f4d;
    color: #faa90d;
    text-transform: uppercase;
">
                            <th style="
    padding: 10px 5px;
">TT
                            </th>
                            <th style="
    padding: 10px 5px;
">Hành khách
                            </th>
                            <th style="
    padding: 10px 5px;
">Hành lý/Số vé
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $hasBaggage = FALSE; ?>
                        <?php if (!empty($Passengers)): ?>
                            <?php $index = 1; ?>
                            <?php foreach ($Passengers as $key => $Passenger): ?>
                                <?php
                                $customer = !empty($customers[$key]) ? $customers[$key] : null;
                                $stt = 1;
                                switch ($Passenger->Type) {
                                    case "ADT":
                                        $price = $adult_fee;
                                        break;
                                    case "CHD":
                                        $price = $child_fee;
                                        break;
                                    case "INF":
                                        $price = $infant_fee;
                                        break;
                                }
                                $total_price += $price;
                                ?>

                                <?php
                                $title = "";
                                if ($Passenger->Type == "INF" || $Passenger->Type == "CHD") {
                                    if ($Passenger->Gender == 1) {
                                        $title = "Bé trai";
                                    } else {
                                        $title = "Bé gái";
                                    }
                                } else {
                                    if ($Passenger->Gender == 1) {
                                        $title = "Ông";
                                    } else {
                                        $title = "Bà";
                                    }
                                }

                                ?>
                                <tr style="
    padding-top: 10px;
    border-bottom: solid thin #80808038;
">
                                    <td style="
    padding: 10px 5px;
    width: 15px;
"><?php echo $index; ?>.
                                    </td>
                                    <td style="
    padding: 10px 5px;
    font-weight: bold;
">(<?php echo $title; ?>) <?php print($Passenger->FirstName); ?> <?php print($Passenger->LastName); ?>
                                    </td>
                                    <td style="
    padding: 10px 5px;
    font-weight: bold;
">
                                        <?php if (!empty($Passenger->BaggageDeparture)): ?>
                                            <?php echo $start_point->code; ?>-<?php echo $end_point->code; ?>: <?php echo $Passenger->BaggageDeparture; ?>KG ký gửi
                                        <?php endif; ?>
                                        <?php if (!empty($Passenger->BaggageDeparture)): ?>
                                            <?php echo $end_point->code; ?>-<?php echo $start_point->code; ?>: <?php echo $Passenger->BaggageDeparture; ?>KG ký gửi
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php $index++; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div style="
    box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
    padding: 10px;
">
            <div>
            <span style="
    color: #1d5f4d!important;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 18px;
">Thông tin chuyến bay</span>
            </div>
            <?php if (!empty($tickets)): ?>
                <?php
                $_fee = 0;
                $adult_fee = 0;
                $child_fee = 0;
                $infant_fee = 0;

                $index = 0;
                $__airlines = array();
                $fee = 0;
                $Leg = 0;
                ?>
                <?php foreach ($tickets as $ticket): ?>
                    <?php
                    $adult_fee = $ticket->PriceAdult + $ticket->FeeAdult + $ticket->TaxAdult;
                    $child_fee = $ticket->PriceChild + $ticket->FeeChild + $ticket->TaxChild;
                    $infant_fee = $ticket->PriceInfant + $ticket->FeeInfant + $ticket->TaxInfant;
                    $_class = $ticket->Class;
                    $FlightNumber = $ticket->FlightNumber;
                    $adult_fee += $ticket->agent_fee;
                    //                            if(empty($booking->uid)){
                    $adult_fee += $ticket->service_fee;
                    $child_fee += $ticket->service_fee;
                    //                            }
                    $child_fee += $ticket->agent_fee;
                    $infant_fee += $ticket->infant_fee;
                    $finalClass = $_class;

                    $Leg++;
                    $StartPoint = cassiopeia_get_airport($ticket->StartPoint);
                    $EndPoint = cassiopeia_get_airport($ticket->EndPoint);
                    ?>
                    <?php $airline = cassiopeia_get_airline($ticket->AirlineCode); ?>
                    <div style="
    font-weight: 700;
    height: auto;
    line-height: 25px;
    padding-left: 10px;
    margin-top: 5px;
    vertical-align: middle;
    border-radius: 6px 6px 0 0;
    text-align: center;
    background: #1d5f4d;
    color: #faa90d;
    padding: 5px;
"><span style="text-transform: uppercase;"><?php echo(_cassiopeia_get_day_off_week($ticket->StartDate)); ?></span>
                        | <?php echo date("d/m/Y", $ticket->StartDate) ?> | <?php echo $StartPoint->city; ?>
                        - <?php echo $EndPoint->city; ?>
                    </div>
                    <div style="
    display: flex;
    border: solid thin #1d5f4d;
    margin-bottom: 20px;
">
                        <div style="
    width: 33.33%;
    padding: 5px 10px;
    border-right: solid 3px #1d5f4d;
">
                            <div style="
    font-weight: bold;
    border-bottom: solid thin #1d5f4d;
    padding-bottom: 1px;
    margin-bottom: 5px;
    /* border-right: solid 3px #1d5f4d; */
"><?php echo $StartPoint->city; ?> (<?php echo $StartPoint->code; ?>)
                            </div>
                            <div><b>Cất cánh: <?php echo date("H:i", $ticket->StartDate); ?></b></div>
                            <div><?php echo date("d/m/Y", $ticket->StartDate); ?>
                                (<?php echo(_cassiopeia_get_day_off_week($ticket->StartDate)); ?>)
                            </div>
                        </div>
                        <div style="
    width: 33.33%;
    padding: 5px 10px;
    border-right: solid 3px #1d5f4d;
">
                            <div style="
    font-weight: bold;
    border-bottom: solid thin #1d5f4d;
    padding-bottom: 1px;
    margin-bottom: 5px;
    /* border-right: solid 3px #1d5f4d; */
"><?php echo $EndPoint->city; ?> (<?php echo $EndPoint->code; ?>)
                            </div>
                            <div><b>Hạ cánh: <?php echo date("H:i", $ticket->EndDate); ?></b></div>
                            <div><?php echo date("d/m/Y", $ticket->EndDate); ?>
                                (<?php echo(_cassiopeia_get_day_off_week($ticket->EndDate)); ?>)
                            </div>
                        </div>
                        <div style="
    width: 33.33%;
">
                            <div style="
    padding: 3px 10px;
">Hãng vận chuyển
                                <div>
                                    <?php
                                    $num = $ticket->FlightNumber;
                                    if (strpos($num, 'VN') !== false) {
                                        $new_num = str_replace("VN", "", $num);
                                        $_length = strlen($new_num);
                                        if ($_length == 4 && (strpos((string)$num, "VN4") !== false || strpos((string)$num, "VN6") !== false)) {
                                            ?>
                                            <img style=""
                                                 src="/sites/all/themes/cassiopeia_theme/img/icons/logo-pacific-airlines.jpg"
                                                 alt="">
                                            <?php
                                        } else {
                                            if ($_length == 4 && (strpos((string)$num, "VN8") !== false)) {
                                                ?>
                                                <img style=""
                                                     src="/sites/all/themes/cassiopeia_theme/img/icons/vasco_logo_1.jpg"
                                                     alt="">
                                                <?php
                                            } else {
                                                cassiopeia_render_airline_logo($airline->iata);
                                            }
                                        }

                                    } else {
                                        cassiopeia_render_airline_logo($airline->iata);
                                    }
                                    ?>
                                </div>
                            </div>
                            <div style="
    padding: 3px 10px;
">Chuyến bay: <?php echo $ticket->FlightNumber; ?>
                            </div>
                            <!--                        <div style="-->
                            <!--    padding: 3px 10px;-->
                            <!--">Máy bay: 321-->
                            <!--                        </div>-->
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if (!isset($_REQUEST['hidden-price'])): ?>
                <?php if (!empty($tickets)): ?>
                    <?php
                    $_fee = 0;
                    $adult_fee = 0;
                    $child_fee = 0;
                    $infant_fee = 0;

                    $index = 0;
                    $__airlines = array();
                    $fee = 0;
                    $Leg = 0;
                    ?>

                    <?php foreach ($tickets as $ticket): ?>
                        <?php
                        $adult_fee = $ticket->PriceAdult;
                        $child_fee = $ticket->PriceChild;
                        $infant_fee = $ticket->PriceInfant;
                        $_class = $ticket->Class;
                        $FlightNumber = $ticket->FlightNumber;
                        $adult_fee += $ticket->agent_fee;
                        //                            if(empty($booking->uid)){
                        $adult_fee += $ticket->service_fee;
                        $child_fee += $ticket->service_fee;
                        //                            }
                        $child_fee += $ticket->agent_fee;
                        $infant_fee += $ticket->infant_fee;
                        $finalClass = $_class;

                        $Leg++;
                        $StartPoint = cassiopeia_get_airport($ticket->StartPoint);
                        $EndPoint = cassiopeia_get_airport($ticket->EndPoint);
                        ?>
                        <div class="table-responsive">
                            <table style="
    width: 100%;
    border: solid thin #1d5f4d;
    margin-bottom: 20px;
">
                                <thead>
                                <tr>
                                    <th colspan="4" style="
    color: #faa90d;
    background: #1d5f4d;
    padding: 5px 7px;
    font-weight: unset;
">Giá vé <?php echo $StartPoint->code; ?> - <?php echo $EndPoint->code; ?>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr style="
    border-bottom: solid thin #80808045;
">
                                    <td style="
    width: 25%;
    text-align: right;
    padding: 5px;
    font-weight: bold;
">Hành khách
                                    </td>
                                    <td style="
    width: 25%;
    text-align: right;
    padding: 5px;
    font-weight: bold;
">Giá vé
                                    </td>
                                    <td style="
    width: 25%;
    text-align: right;
    padding: 5px;
    font-weight: bold;
">Thuế &amp; Phí
                                    </td>
                                    <td style="
    width: 25%;
    text-align: right;
    padding: 5px;
    font-weight: bold;
">Tổng
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: right;padding:5px;"><?php echo $booking->adt; ?> Người lớn</td>
                                    <td style="text-align: right;padding:5px;"><?php echo number_format($adult_fee, 0, ",", "."); ?></td>
                                    <td style="text-align: right;padding:5px;"><?php echo number_format($ticket->FeeAdult + $ticket->TaxAdult, 0, ",", "."); ?></td>
                                    <td style="text-align: right;padding:5px;"><?php echo number_format(($ticket->FeeAdult + $ticket->TaxAdult + $adult_fee) * $booking->adt, 0, ",", "."); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="4" style="
    text-align: right;
    font-weight: bold;
    padding: 5px;
">Tổng: <?php echo number_format($booking->price, 0, ",", "."); ?> VNĐ
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endif; ?>


            <div>
                <div style="
    border-top: solid thin #1d5f4d29;
    padding-top: 20px;
">
                <span style="
    color: #1d5f4d!important;
    font-weight: bold;
    position: relative;
    margin-bottom: 10px;
    display: flex;
">QUÝ KHÁCH XIN LƯU Ý</span>
                </div>
                <div>
                   <?php
                   $cassiopeia_config_booking_mail_note = variable_get('cassiopeia_config_booking_mail_note', array(
                       'value' => '',
                       'format' => 'full_html'
                   ));
                   if(!empty($cassiopeia_config_booking_mail_note['value'])){
                       echo $cassiopeia_config_booking_mail_note['value'];
                   }
                   ?>
                </div>
            </div>
        </div>
    </div>
    
    <?php 
    if (!empty($booking->bill_tax_number)) {
    ?>
    <div class="bill">
        <div>
            <div class="row">
                <div class="col-md-6">
                    <label for="">Tên công ty: <?php echo $booking->bill_company; ?></label>
                </div>
                <div class="col-md-6">
                    <label for="">Mã số thuế:<?php echo $booking->bill_tax_number; ?></label>
                </div>
                <div class="col-md-6">
                    <label for="">Địa chỉ đăng ký kinh doanh: <?php echo $booking->bill_address; ?></label>
                </div>
                <div class="col-md-6">
                    <label for="">Email nhận hóa đơn: <?php echo $booking->bill_mail; ?></label>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    
</div>