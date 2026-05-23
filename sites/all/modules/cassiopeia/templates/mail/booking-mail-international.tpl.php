<div class="container">
    <?php
    global $user;
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

    }
    $_PNR = $booking->pnr_code;
    $_splitter = explode("-",$_PNR);
    $Passengers = $booking->passengers;
    $tickets = $booking->tickets;

    $B_status = "OK";
    foreach($tickets as $_t){
        if($_t->status=="OK"){
            $B_status = "OK";
            break;
        }elseif($_t->status=="FAIL"){
            $B_status="FAIL";
            break;
        }
    }
    $total_price = 0;
    ?>

    <div class="booking-view" style="/*width: 70%;margin:auto;*/">
        <div clook="page-container">
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

            <h2 style="text-align:center;font-size:16px; margin:10px 0 0 0;font-weight: bold;">THÔNG TIN ĐẶT VÉ VÀ XÁC NHẬN HÀNH TRÌNH</h2>
            <div clook="block-content">
                <div clook="booking-code">
                    <label for="">Mã đơn hàng:</label>
                    <span style="color:orange;"><?php print($booking_code); ?></span>
                </div>
                <div class="booking-code ">
                    <label for="">Mã đặt chỗ:</label>
                    <span class="pnr-code" ><?php print($booking->pnr_code); ?></span>
                </div>
                <div clook="booking-code">
                    <label for="">Tình trạng:</label>
                    <span class="booking-status <?php print($booking->status); ?>">
<!--                    --><?php //if(!empty($user->uid)): ?>
                        <?php
                        if($B_status=="TICKETED"){
                            echo "Xuất vé thành công, chúc quý khách có chuyến bay tốt đẹp!";
                        }else{
                            echo cassiopeia_get_booking_status($B_status);
                        }
                        ?>
                        <!--                    --><?php //else: ?>
                        <!--                        Nhân viên --><?php //echo SITE_NAME; ?><!-- đang xử lý và liên hệ quý khách sớm nhất có thể. Cảm ơn quý khách đã sử dụng --><?php //echo SITE_NAME; ?>
                        <!--                    --><?php //endif; ?>
                </span>
                </div>
                <?php if($booking->status=="OK"): ?>
                    <?php if(!empty($booking->ExpiryDt)): ?>
                        <div style="font-size:14px;color:#f44336;margin-bottom:10px;">Vui lòng thanh toán trước <b><?php print(date("H:i",$booking->ExpiryDt)); ?> ngày <?php print(date("d/m/Y",$booking->ExpiryDt)); ?></b>, sau thời gian trên Mã đặt chỗ sẽ bị hủy!</div>
                    <?php endif; ?>
                <?php elseif($booking->status=="FAIL"): ?>
                    <!--                        <div style="margin:10px 0;margin:8px 0;color:red;">-->
                    <!--                            <p>Xin lỗi quý khách đã đặt vé không thể giữ chỗ. Vui lòng liên hệ BOOKER của --><?php // ?><!-- để được hỗ trợ !</p>-->
                    <!--                        </div>-->
                <?php endif; ?>
                <div clook="tickets">
                    <?php if(!empty($tickets)): ?>
                        <?php
                        $_fee = 0;


                        $index=0;
                        $__airlines = array();
                        $fee = 0;
                        $Leg = 0;
                        $TotalFee = 0;
                        ?>
                        <?php foreach($tickets as $ticket): ?>
                            <?php
                            $adult_fee = 0;
                            $child_fee = 0;
                            $infant_fee = 0;
                            $adult_fee += $ticket->PriceAdult+ $ticket->FeeAdult+ $ticket->TaxAdult;
                            $child_fee += $ticket->PriceChild+ $ticket->FeeChild+ $ticket->TaxChild;
                            $infant_fee += $ticket->PriceInfant+ $ticket->FeeInfant+ $ticket->TaxInfant;
                            $_class = $ticket->Class;
                            $FlightNumber = $ticket->FlightNumber;
                            $TotalFee+=$ticket->service_fee;
                            $TotalFee+=$ticket->agent_fee;
                            $child_fee+=$ticket->service_fee;
                            $child_fee+=$ticket->agent_fee;
                            $infant_fee+=$ticket->infant_fee;
                            $finalClass = $_class;

                            $Leg++;
                            ?>
                            <?php $airline = cassiopeia_get_airline($ticket->AirlineCode); ?>
                            <div clook="flight table-responsive" style="width:100%;">
                                <table clook="table" style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th colspan="6" style="    background: #E2E2E2;border-bottom: 3px solid #f3f3f3;text-align: left;padding: 8px;">
                                            <div clook="ticket-head-block">
                                                <div clook="pnr-code">
                                                    <div style="color: #0089ff;">
                                                        <?php
                                                        if(!empty($user->uid)){
                                                            echo "Mã đặt chỗ: ";
                                                            if(!empty($ticket->pnr_code)){
                                                                echo $ticket->pnr_code;
                                                            }else{
                                                                if($ticket->status!=="OK"){
                                                                    echo "<span style='color:red;'>Đặt lỗi</span>";
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div>
                                                    <?php
                                                    $startpoint = cassiopeia_get_airport($ticket->StartPoint);
                                                    if(!empty($startpoint)) print($startpoint->city); print("(".$ticket->StartPoint.")");
                                                    ?>
                                                    →
                                                    <?php
                                                    $endpoint = cassiopeia_get_airport($ticket->EndPoint);
                                                    if(!empty($endpoint)) print($endpoint->city); print("(".$ticket->EndPoint.")");
                                                    ?>
                                                    - <?php print(date("d/m/Y",$ticket->StartDate)); ?>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td style="padding:3px;white-space: nowrap">Chuyến bay</td>
                                        <td style="padding:3px;text-align: right;">Điểm đi</td>
                                        <td></td>
                                        <td style="padding:3px">Điểm đến</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:3px" width="20%">
                                            <div style="padding:3px;">
                                                <b><?php if(!empty($airline)) print($airline->name); ?></b>
                                            </div>
                                            <div >
                                                <?php
                                                $num = $ticket->FlightNumber;
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
                                                            cassiopeia_render_airline_logo($airline->iata);
                                                        }
                                                    }

                                                }else{
                                                    cassiopeia_render_airline_logo($airline->iata);
                                                }
                                                ?>
                                            </div>
                                            <div style="padding:3px">
                                                <?php print($FlightNumber); ?>
                                            </div>
                                        </td>
                                        <td style="" width="20%" align="right">
                                            <div style="padding:3px">
                                                <?php print($ticket->StartPoint); ?> <?php  print(date("H:i",$ticket->StartDate)); ?>
                                            </div>
                                            <div style="padding:3px;white-space: nowrap;">
                                                <?php print($startpoint->name); ?>
                                            </div>
                                            <div style="padding:3px">
                                                <?php print(date("d/m/Y",$ticket->StartDate)); ?>
                                            </div>
                                            <div style="padding:3px">
                                                Hạng chỗ
                                            </div>
                                            <!--                                            <div style="padding:3px">-->
                                            <!--                                                Số hiệu chuyến bbay-->
                                            <!--                                            </div>-->
                                        </td>
                                        <td style="padding:3px" width="10%" align="center">
                                            <?php if($Leg==1): ?>
                                                <i class="fa-solid fa-plane-departure"></i>
                                            <?php else: ?>
                                                <i class="fa-solid fa-plane-arrival"></i>
                                            <?php endif; ?>
                                            <div style="padding:3px;white-space: nowrap;">
                                                <?php print(floor($ticket->Duration/60)."h ".($ticket->Duration%60)."p"); ?>
                                            </div>
                                        </td>
                                        <td style="" width="20%" colspan="2">
                                            <div style="padding:3px">
                                                <?php print($ticket->EndPoint); ?> <?php  print(date("H:i",$ticket->EndDate)); ?>
                                            </div>
                                            <div style="padding:3px;white-space: nowrap;">
                                                <?php print($endpoint->name); ?>
                                            </div>
                                            <div style="padding:3px">
                                                <?php  print(date("d/m/Y",$ticket->EndDate)); ?>
                                            </div>
                                            <div style="padding:3px">
                                                <?php echo $finalClass; ?>
                                            </div>
                                            <!--                                            <div>-->
                                            <!---->
                                            <!--                                            </div>-->
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <?php $index++; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <table clook="table ticket-detail" style="width: 100%;">
                        <thead>
                        <tr>
                            <th colspan="4" style="    background: #E2E2E2;padding: 5px;margin-top: 10px;">Chi tiết giá vé</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="padding:3px; width: 20%;">STT</td>
                            <td style="padding:3px; width: 20%; text-align: right;">Hành khách</td>
                            <td style="padding:3px; padding-left: 10%; width: 30%;">Ngày sinh</td>
                            <td style="padding:3px; width: 30%;">Giá vé ( đ )</td>
                        </tr>
                        <?php $hasBaggage = FALSE; ?>
                        <?php if(!empty($Passengers)):?>
                            <?php $index=1; ?>
                            <?php foreach ($Passengers as $key => $Passenger):?>
                                <?php
                                $customer = !empty($customers[$key])?$customers[$key]:null;
                                $stt=1;
                                switch($Passenger->Type){
                                    case "ADT": $price = $adult_fee+$TotalFee; break;
                                    case "CHD": $price = $child_fee+$TotalFee; break;
                                    case "INF": $price = $infant_fee; break;
                                }
                                $total_price+=$price;
//                                _print_r($total_price);
                                ?>
                                <tr>
                                    <td style="padding:3px; width: 20%;"><?php print($index); ?></td>
                                    <td style="text-transform: uppercase;padding:3px; text-align: right; width: 20%;">
                                        <?php print($Passenger->FirstName); ?> <?php print($Passenger->LastName); ?>
                                        <div>
                                            <div><?php if(!empty($customer->VN_CODE)) echo $customer->VN_CODE." - VN"; ?></div>
                                            <div><?php if(!empty($customer->QH_CODE)) echo $customer->QH_CODE." - QH"; ?></div>
                                        </div>
                                    </td>
                                    <td style="padding:3px; padding-left: 10%; width: 30%;">
                                        <?php if($Passenger->Type=="INF" || $Passenger->Type=="CHD"): ?>
                                            <?php print(date("d/m/Y",$Passenger->Birthday)); ?>
                                        <?php endif; ?>
                                    </td>
                                    <td style="padding:3px; width: 30%;">
                                        <?php print(number_format($price,0,",",".").'vnđ'); ?>
                                    </td>
                                </tr>
                                <?php $index++; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <!--                        <tr>-->
                        <!--                            <td style="padding:3px" colspan="3"></td>-->
                        <!--                            <td style="padding:3px">--><?php //print(number_format($total_price,0,",",".")); ?><!--</td>-->
                        <!--                        </tr>-->
                        <tr>
                            <td colspan="4" style="background: #E2E2E2;padding: 5px;margin-top: 10px;font-weight: bold;">
                                Hành lý ký gửi
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:3px; width: 20%;">STT</td>
                            <td style="padding:3px; text-align: right; width: 20%;">Hành khách</td>
                            <td style="padding:3px; padding-left: 10%; width: 30%;">Dịch vụ</td>
                            <td style="padding:3px; width: 30%;">Phí (đ)</td>
                        </tr>
                        <?php $stt=1; ?>
                        <?php $total_baggage_price=0; ?>
                        <?php foreach($Passengers as $Passenger):  ?>
                            <?php if(!empty($Passenger->BaggageDeparture)): ?>
                                <?php $baggage = cassiopeia_get_baggage_by_weight_and_airline($Passenger->BaggageDeparture,$tickets[0]->AirlineCode); ?>
                                <tr>
                                    <td style="padding:3px; width: 20%;"><?php print($stt); ?></td>
                                    <td style="padding:3px; text-align: right; width: 20%;"><?php print($Passenger->FirstName.$Passenger->LastName); ?></td>
                                    <td style="padding:3px; padding-left: 10%; width: 30%;">Chuyến đi, hành lý ký gửi <?php print($baggage->weight); ?>kg</td>
                                    <td style="padding:3px; width: 30%;"><?php print(number_format($baggage->amount,0,",",".").'vnđ'); ?></td>
                                </tr>
                                <?php $total_price+=$baggage->amount; ?>
                                <?php $total_baggage_price+=$baggage->amount; ?>
                                <?php $stt++; ?>
                            <?php endif; ?>
                            <?php if(!empty($Passenger->BaggageReturn)): ?>
                                <?php $baggage = cassiopeia_get_baggage_by_weight_and_airline($Passenger->BaggageReturn,$tickets[1]->AirlineCode); ?>
                                <tr>
                                    <td style="padding:3px; width: 20%;"><?php print($stt); ?></td>
                                    <td style="padding:3px; text-align: right; width: 20%;"><?php print($Passenger->FirstName.$Passenger->LastName); ?></td>
                                    <td style="padding:3px; padding-left: 10%; width: 30%;">Chuyến về, hành lý ký gửi <?php print($baggage->weight); ?>kg</td>
                                    <td style="padding:3px; width: 30%;"><?php print(number_format($baggage->amount,0,",",".").'vnđ'); ?></td>
                                </tr>
                                <?php $total_price+=$baggage->amount; ?>
                                <?php $total_baggage_price+=$baggage->amount; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <tr>
                            <td style="padding:3px; width: 20%;"></td>
                            <td style="padding:3px; width: 20%;"></td>
                            <td style="padding:3px; width: 30%;"></td>
                            <td style="padding:3px; width: 30%;"><?php print(number_format($total_baggage_price,0,",",".")); ?></td>
                        </tr>
                        <tr>
                            <th style="text-align: left;padding:3px; width: 70%;" colspan="3">Tổng tiền:</th>
                            <th style="padding:3px"><?php print(number_format($total_price,0,",",".")); ?> vnđ</th>
                        </tr>
                        </tbody>
                    </table>
                    <table clook="table ticket-detail" style="width: 100%;">
                        <tbody>
                        <tr>
                            <th colspan="2" style="background: #E2E2E2;padding: 5px;margin-top: 10px;">Thông tin liên hệ</th>
                        </tr>
                        <tr>
                            <td style="padding:3px;white-space: nowrap; width: 20%;">Họ Tên:</td>
                            <td style="text-transform: uppercase;">
                                <?php print($ContactGender==1?"Ông":"Bà"); ?> <?php print($ContactFirstName); ?> <?php print($ContactLastName); ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:3px;white-space: nowrap; width: 20%;">Số điện thoại:</td>
                            <td><?php print($ContactPhone); ?></td>
                        </tr>
                        <tr>
                            <td style="padding:3px;white-space: nowrap; width: 20%;">Email:</td>
                            <td><?php print($ContactEmail); ?></td>
                        </tr>
                        <?php if(!empty($booking->bill_tax_number)): ?>
                            <tr>
                                <th colspan="2" style="background: #E2E2E2;padding: 5px;margin-top: 10px;">Thông tin xuất hóa đơn</th>
                            </tr>
                            <tr>
                                <td style="padding:3px;white-space: nowrap; width: 20%;">Tên công ty:</td>
                                <td style="text-transform: uppercase"><?php echo $booking->bill_company; ?></td>
                            </tr>
                            <tr>
                                <td style="padding:3px;white-space: nowrap; width: 20%;">Mã số thuế:</td>
                                <td><?php echo $booking->bill_tax_number; ?></td>
                            </tr>
                            <tr>
                                <td style="padding:3px;white-space: nowrap; width: 20%;">Địa chỉ đăng ký kinh doanh:</td>
                                <td><?php echo $booking->bill_address; ?></td>
                            </tr>
                            <tr>
                                <td style="padding:3px;white-space: nowrap; width: 20%;">Email nhận hoá đơn:</td>
                                <td><?php echo $booking->bill_mail; ?></td>
                            </tr>
                        <?php endif; ?>
                        <tr>
                            <th colspan="2" style="background: #E2E2E2;padding: 5px;margin-top: 10px;">Hình thức thanh toán:</th>
                        </tr>
                        <?php if(!empty($booking->payment_method)): ?>

                        <?php endif; ?>
                        <tr>
                            <td style="padding:3px;font-weight: bold;color: #1f9186;" colspan="4">
                                <?php
                                switch ($booking->payment_method){
                                    case GIU_CHO : echo "Đặt giữ chỗ"; break;
                                    case CHUYEN_KHOAN : echo "Chuyển khoản"; break;
                                    case TIEN_MAT : echo "Thanh toán tiền mặt tại văn phòng của Quang Trang";break;
                                    case BAYNET_CREDIT : echo "Thanh toán qua ví Quang Trang Credit";break;
                                }
                                ?>
                            </td>
                        </tr>
                        <?php if(empty($user->uid)): ?>
                            <?php  $items = (array)cassiopeia_get_items_by_conditions(array(), "bank_info", "node"); ?>

                            <tr>
                                <td colspan="4">
                                    <div>
                                        <div style="padding:3px;color:red;">Bạn vui lòng chuyển khoản theo thông tin dưới đây :</div>
                                        <?php foreach ($items as $bank) : ?>
                                            <div style="padding:3px;padding: 3px;border-bottom: solid thin #80808038;   padding-bottom: 5px;   margin-bottom: 5px;">
                                                <p><span for="">Ngân hàng:</span> <b><?php echo $bank->title; ?></b></p>
                                                <p>Chủ tài khoản: <strong><?php echo !empty($bank->field_bank_account_name['und'][0]['value'])?$bank->field_bank_account_name['und'][0]['value']:""; ?></strong></p>
                                                <p>Số tài khoản: <strong><?php echo !empty($bank->field_bank_account_no['und'][0]['value'])?$bank->field_bank_account_no['und'][0]['value']:""; ?></strong></p>
                                                <p>Chi nhánh: <strong><?php echo !empty($bank->field_bank_account_branch['und'][0]['value'])?$bank->field_bank_account_branch['und'][0]['value']:""; ?></strong></p>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--    --><?php //if(empty($variables['auto'])): ?>
    <!--        <div class="" style="display: flex;">-->
    <!--            <input style="border: solid thin #80808042;-->
    <!--    border-right: 0px;-->
    <!--    padding-left: 10px;" type="text" f="form-control" name="mail" placeholder="Email"> <button style="    height: 38px;-->
    <!--    background: #ff5115;-->
    <!--    color: white;-->
    <!--    border: none;-->
    <!--    width: 38px;" class="btn btn-success btn-send-mail-finish">Gửi</button>-->
    <!--        </div>-->
    <!--    --><?php //endif; ?>
    <?php //die; ?>
</div>