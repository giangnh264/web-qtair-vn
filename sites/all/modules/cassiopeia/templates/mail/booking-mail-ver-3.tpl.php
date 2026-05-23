<?php
global $user;
if (!empty($user)) {
    $account = user_load($user->uid);
} else {
    $_REQUEST['hidden-time-limit'] = 1;
}
$booking_code = $variables['booking_code'];

$GLOBALS["viewing_booking_code"] = $booking_code;

try {
    $booking = cassiopeia_qt_ticket_booking_load_by_code($booking_code);
    $ContactGender = $booking->contact_Gender;
    $ContactFirstName = $booking->contact_FirstName;
    $ContactLastName = $booking->contact_LastName;
    $ContactPhone = $booking->contact_Phone;
    $ContactEmail = $booking->contact_Email;
} catch (Exception $e) {
    
}
$_PNR = $booking->pnr_code;
$_splitter = explode("-", $_PNR);
$Passengers = $booking->passengers;
$tickets = $booking->tickets;
$B_status = $booking->status;
$total_price = 0;
// Ghi log thông tin $booking vào file .log
$log_file = dirname(__FILE__) . '/booking_mail.log';
$log_message = "[" . date('Y-m-d H:i:s') . "] booking_code: " . $booking_code . " | " . print_r($booking, true) . "\n";
file_put_contents($log_file, $log_message, FILE_APPEND);

?>
<div class="container" id="printContent">
    <div _class="" style="width: 100%; max-width: 1600px; margin: 0 auto;font-family: K2D-Light;">
        <div _class="email-header"
             style="color: #1a5f4d; font-weight: bold; font-size: 24px; padding-top: 10px; padding-bottom: 10px"
             align="center">THÔNG TIN ĐẶT VÉ & XÁC NHẬN HÀNH TRÌNH
        </div>
        <?php if (!empty($account)): ?>
            <div _class="email-header" style="color: #1a5f4d; font-size: 16px; padding-bottom: 10px" align="center">ĐẠI
                LÝ VÉ MÁY BAY:
                <B><?php echo!empty($account->field_account_transaction_name['und'][0]['value']) ? strtoupper($account->field_account_transaction_name['und'][0]['value']) : strtoupper($account->field_account_full_name['und'][0]['value']); ?></B>
                - ĐIỆN THOẠI: <B><?php echo strtoupper($account->name); ?></B></div>
        <?php endif; ?>
        <div _class="page-container" style="padding-bottom: 30px">
            <div _class="block-content 123">
                <div class="mail-top"
                     style="width: 100%;display: block;position: relative;padding-left: 16px;padding-right: 16px;">
                    <div _class="block-inner" style="padding:15px 0px;">
                        <div _class="booking-code"
                             style="display: flex;align-items: center;font-size: 16px;max-width: 296px;">
                            <label for="" style="margin-right: 16px;display: inline-block;white-space: nowrap;">Mã đơn
                                hàng:</label>
                            <b style="text-align: right;display: inline-block;width: 100%; color: #1a5f4d; font-weight: bold"><?php echo $booking->booking_code; ?></b>
                        </div>
                        <div _class="booking-code"
                             style="display: flex;align-items: center;font-size: 16px; max-width: 296px;">
                            <label for="" style="margin-right: 16px;display: inline-block; white-space: nowrap;">Mã đặt
                                chỗ:</label>
                            <b _class="pnr-code"
                               style="text-align: right; display: inline-block; width: 100%; color: #1a5f4d; font-weight: bold"><?php echo $booking->pnr_code; ?></b>
                        </div>
                        <div _class="booking-code"
                             style="display: flex;align-items: center;font-size: 16px;max-width: 296px;">
                            <label for="" style="margin-right: 16px;display: inline-block;white-space: nowrap;">Tình
                                trạng:</label>
                            <?php
                            $style = "";
                            switch ($booking->status) {
                                case "OK" :
                                    $style .= "color: green;";
                                    break;
                                case "FAIL" :
                                    $style .= "color: red   ;";
                                    break;
                                case "TICKETED" :
                                    $style .= "color: #25997b;";
                                    break;
                                case "EXPIRED" :
                                    $style .= "color: red;";
                                    break;
                            }
                            ?>
                            <b _class="booking-status TICKETED"
                               style="text-align: right;display: inline-block;width: 100%;text-transform: uppercase;<?php echo $style; ?>;"><?php echo(cassiopeia_get_status($booking->status)); ?></b>
                        </div>
                       
                        <div>
                            <div style="margin:10px 0;margin:2px 0;color:red; font-size: 16px">
                                <?php if ($booking->status == "OK"): ?>
                                    <?php if (!empty($booking->ExpiryDt)): ?>
                                        <?php if (!empty($booking->ExpiryDt) && isset($_REQUEST['hidden-time-limit'])): ?>
                                            <div style="font-size:14px;color:#f44336;margin-bottom:10px;">Vui lòng thanh
                                                toán trước <b><?php print(date("H:i", $booking->ExpiryDt)); ?>
                                                    ngày <?php print(date("d/m/Y", $booking->ExpiryDt)); ?></b>, sau
                                                thời
                                                gian trên Mã đặt chỗ sẽ bị hủy!
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php elseif ($booking->status == "PENDING"): ?>

                                <?php elseif ($booking->status == "FAIL"): ?>
                                    <div>Xin lỗi quý khách, mã đã đặt vé không thể giữ chỗ. Vui lòng liên hệ Hotline <b>19009116</b> của
                                        QTair để được hỗ trợ!
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="flight-info">
                    <div _class="flight table-responsive" style="min-width: 0.1%;;display: block;width: 100%;">
                        <table lass="table ticket-detail"
                               style="width: 100%; border-collapse: collapse; font-size: 16px">
                            <thead>
                                <tr>
                                    <th colspan="7" _class="tickets-title"
                                        style="color: #1d5f4d; font-size: 18px; text-transform: uppercase; padding: 8px 0px;font-weight: bold; border-bottom: solid medium #1d5f4d;">
                                        Thông tin chuyến bay
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
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
                                    $adult_fee += $ticket->PriceAdult + $ticket->FeeAdult + $ticket->TaxAdult;
                                    $child_fee += $ticket->PriceChild + $ticket->FeeChild + $ticket->TaxChild;
                                    $infant_fee += $ticket->PriceInfant + $ticket->FeeInfant + $ticket->TaxInfant;
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
                                    <?php
                                    $style = "";
                                    switch ($ticket->status) {
                                        case "OK" :
                                            $style .= "color: black;";
                                            break;
                                        case "FAIL" :
                                            $style .= "color: red   ;";
                                            break;
                                        case "TICKETED" :
                                            $style .= "color: #25997b;";
                                            break;
                                        case "EXPIRED" :
                                            $style .= "color: red;";
                                            break;
                                    }
                                    ?>
                                    <tr>
                                        <td style="white-space: nowrap; padding: 5px 16px;width: 20%;">Mã đặt chỗ</td>
                                        <td style="white-space: nowrap; padding: 0px 16px;width: 35%; <?php echo $style; ?>">
                                            <b style="text-transform: uppercase;">
    <?php
    if ($ticket->status == "OK" || $ticket->status == "TICKETED") {
        echo $ticket->pnr_code;
    } else {
        echo(cassiopeia_get_status($booking->status));
    }
    ?>
                                            </b>
                                        </td>
                                        <td width="10%" class="hidden-xs"></td>
                                        <td style="width:35%;"></td>
                                    </tr>
                                    <tr>
                                        <td style="white-space: nowrap; padding: 5px 16px; ">
    <?php
    $num = $ticket->FlightNumber;
    if (strpos($num, 'VN') !== false) {
        $new_num = str_replace("VN", "", $num);
        $_length = strlen($new_num);
        if ($_length == 4 && (strpos((string) $num, "VN4") !== false || strpos((string) $num, "VN6") !== false)) {
            ?>
                                                    <img style="width: 80px;"
                                                         src="/sites/all/themes/cassiopeia_theme/img/icons/logo-pacific-airlines.jpg"
                                                         alt="">
            <?php
        } else {
            if ($_length == 4 && (strpos((string) $num, "VN8") !== false)) {
                ?>
                                                        <img style=""
                                                             src="/sites/all/themes/cassiopeia_theme/img/icons/vasco_logo_1.jpg"
                                                             alt="">
                <?php
            } else {
                cassiopeia_render_airline_logo($airline->iata, "80px");
            }
        }
    } else {
        cassiopeia_render_airline_logo($airline->iata, "80px");
    }
    ?>
                                        </td>
                                        <td style="white-space: nowrap; padding: 0px 16px;font-family: K2D,sans-serif;">
                                                 <?php echo $StartPoint->code; ?> </td>
                                        <td rowspan="3" class="hidden-xs">
                                            <i class="fa-sharp fa-solid <?php echo $Leg == 1 ? "fa-plane-departure" : "fa-plane-arrival"; ?>"
                                               style="color: #1d5f4d;font-size: 20px;"></i>
                                        </td>
                                        <td style="white-space: nowrap; padding: 0px 16px;">
    <?php echo $EndPoint->code; ?> </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px 16px">
                                            <b><?php echo $ticket->FlightNumber; ?></b>
                                        </td>
                                        <td style="padding: 0px 16px">
                                            <div _class="start-time">
                                                <b><?php echo date("H:i d/m/Y", $ticket->StartDate); ?></b>
                                            </div>
                                        </td>
                                        <td style="padding: 0px 16px">
                                            <div _class="start-time">
                                                <b><?php echo date("H:i d/m/Y", $ticket->EndDate); ?></b>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="border-bottom: solid thin #80808029">
                                        <td style="padding: 5px 16px;font-size: 14px">
    <?php echo $ticket->Class; ?> </td>
                                        <td style="padding: 0px 16px">
                                            <div style="max-width: 200px;display: block;font-size: 15px;">
                                            <?php if (!empty($StartPoint)) echo $StartPoint->name; ?> </div>
                                        </td>
                                        <td style="padding: 0px 16px">
                                            <div style="max-width: 200px;display: block;font-size: 15px;">
    <?php if (!empty($EndPoint)) echo $EndPoint->name; ?> </div>
                                        </td>
                                    </tr>
                                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div _class="flight table-responsive"
                         style="min-width: 0.1%;/*overflow-x: auto;*/display: block;width: 100%;">
                        <table lass="table ticket-detail"
                               style="width: 100%; border-collapse: collapse; font-size: 16px">
                            <thead>
                                <tr>
                                    <th colspan="4" _class="tickets-title"
                                        style="color: #1d5f4d; font-size: 18px; text-transform: uppercase; padding: 8px 0px;font-weight: bold; border-bottom: solid medium #1d5f4d;">
                                        Thông tin hành khách
                                    </th>
                                </tr>
                                <tr>
                                    <th style="padding: 16px 8px;background-color: #da9827; color:#FFFFFF;text-transform: uppercase;text-align: left;vertical-align: middle;">
                                        Hành khách
                                    </th>
                                    <th style="padding: 16px 8px;background-color: #da9827; color:#FFFFFF;text-transform: uppercase;text-align: left;vertical-align: middle;">
                                        Ngày sinh
                                    </th>
                                    <th style="padding: 16px 8px;background-color: #da9827; color:#FFFFFF;text-transform: uppercase;text-align: left; vertical-align: middle;">
                                        Hành lý tiêu chuẩn
                                    </th>
                                    <th style="padding: 16px 8px;background-color: #da9827; color:#FFFFFF;text-transform: uppercase;text-align: left; vertical-align: middle;">
                                        Ký gửi mua thêm
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
<?php if (!empty($Passengers)): ?>
    <?php $index = 1; ?>
                                    <?php
                                    $TotalAdult = 0;
                                    $TotalChildren = 0;
                                    $TotalInfant = 0;
                                    $Baggages = [];
                                    ?>
                                    <?php foreach ($Passengers as $Passenger): ?>
                                        <?php
                                        $BaggageDeparture = array();
                                        $BaggageReturn = array();
                                        $stt = 1;
                                        $guest_type = "Người lớn";
                                        switch ($Passenger->Type) {
                                            case "ADT":
                                                $guest_type = "Người lớn";
                                                $price = $adult_fee;
                                                $TotalAdult++;
                                                break;
                                            case "CHD":
                                                $guest_type = "Trẻ em";
                                                $price = $child_fee;
                                                $TotalChildren++;
                                                break;
                                            case "INF":
                                                $guest_type = "Em bé";
                                                $price = $infant_fee;
                                                $TotalInfant++;
                                                break;
                                        }
                                        $total_price += $price;
                                        ?>
                                        <tr>
                                            <td style="text-transform: uppercase; padding: 8px">
                                        <?php print($Passenger->FirstName); ?> <?php print($Passenger->LastName); ?>
                                            </td>
                                            <td style="padding: 8px">
                                                <?php if ($Passenger->Type == "INF" || $Passenger->Type == "CHD"): ?>
            <?php print(date("d/m/Y", $Passenger->Birthday)); ?> (<?php echo $guest_type; ?>)
                                                <?php else: ?>
                                                    <!--                                            --><?php //echo $guest_type; ?>
                                                <?php endif; ?>
                                            </td>
                                            <td style="padding: 8px">Theo điều kiện vé</td>
                                            <td style="padding: 8px">
        <?php
        if (!empty($tickets[1])) {
            $DataBaggage = "0Kg - 0Kg";
            if (!empty($Passenger->BaggageReturn)) {
                $BaggageReturn = cassiopeia_get_baggage_by_weight_and_airline($Passenger->BaggageReturn, $tickets[1]->AirlineCode);
                if (!empty($Passenger->BaggageDeparture)) {
                    $BaggageDeparture = cassiopeia_get_baggage_by_weight_and_airline($Passenger->BaggageDeparture, $tickets[0]->AirlineCode);
                    $DataBaggage = $BaggageDeparture->weight . "Kg" . " - " . $BaggageReturn->weight . "Kg";
                } else {
                    $DataBaggage = "0Kg" . " - " . $BaggageReturn->weight . "Kg";
                }
            } else {
                if (!empty($Passenger->BaggageDeparture)) {
                    $BaggageDeparture = cassiopeia_get_baggage_by_weight_and_airline($Passenger->BaggageDeparture, $tickets[0]->AirlineCode);
                    $DataBaggage = $BaggageDeparture->weight . "Kg" . " - " . "0Kg";
                }
            }
        } else {
            $DataBaggage = "0Kg";
            if (!empty($Passenger->BaggageDeparture)) {
                $BaggageDeparture = cassiopeia_get_baggage_by_weight_and_airline($Passenger->BaggageDeparture, $tickets[0]->AirlineCode);
                $DataBaggage = $BaggageDeparture->weight . "Kg";
            }
        }
        echo $DataBaggage;
        ?>
                                                <?php
                                                $temp = [];
                                                $temp['price'] = 0;
                                                if (!empty($BaggageDeparture)) {
                                                    $temp['price'] += $BaggageDeparture->amount;
                                                }
                                                if (!empty($BaggageReturn)) {
                                                    $temp['price'] += $BaggageReturn->amount;
                                                }
                                                $total_price += $temp['price'];
                                                if (!empty($temp['price'])) {
                                                    $Baggages[$index] = $temp;
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                                <?php $index++; ?>
                                            <?php endforeach; ?>
<?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                                <?php if (!isset($_REQUEST['hidden-price'])): ?>
                        <div _class="flight table-responsive" style="
                             min-width: 0.1%;
                             /*overflow-x: auto;*/
                             display: block;
                             width: 100%;
                             ">
                            <table _class="table" style="width: 100%; border-collapse: collapse; font-size: 16px">
                                <thead>
                                    <tr>
                                        <th colspan="4" _class="tickets-title"
                                            style="color: #1d5f4d; font-size: 18px; text-transform: uppercase; padding: 8px 0px;font-weight: bold; border-bottom: solid medium #1d5f4d;">
                                            Giá vé
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="
                                            padding: 16px 8px;
                                            background-color: #da9827; color:#FFFFFF;
                                            text-transform: uppercase;
                                            text-align: left;
                                            vertical-align: middle;
                                            ">
                                            Dịch vụ
                                        </th>
                                        <th style="
                                            padding: 16px 8px;
                                            background-color: #da9827; color:#FFFFFF;
                                            text-transform: uppercase;
                                            text-align: center;
                                            vertical-align: middle;
                                            ">
                                            Đơn giá
                                        </th>
                                        <th style="
                                            padding: 16px 8px;
                                            background-color: #da9827; color:#FFFFFF;
                                            text-transform: uppercase;
                                            text-align: center;
                                            vertical-align: middle;
                                            ">
                                            Số lượng
                                        </th>
                                        <th style="
                                            padding: 16px 8px;
                                            background-color: #da9827; color:#FFFFFF;
                                            text-transform: uppercase;
                                            text-align: right;
                                            vertical-align: middle;
                                            ">
                                            Thành tiền
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
    <?php if (!empty($TotalAdult)): ?>
                                        <tr>
                                            <th scope="row"
                                                style="text-align: left;padding: 8px;vertical-align: middle;font-weight: 600;">
                                                Người lớn
                                            </th>
                                            <td style="padding: 8px; text-align: center"><?php echo number_format($adult_fee, 0, ",", "."); ?>
                                                đ
                                            </td>
                                            <td style="padding: 8px; text-align: center"><?php echo $TotalAdult; ?></td>
                                            <td style="padding: 8px; text-align: right"><?php echo number_format($TotalAdult * $adult_fee, 0, ",", ".") ?>
                                                đ
                                            </td>
                                        </tr>
    <?php endif; ?>
    <?php if (!empty($TotalChildren)): ?>
                                        <tr style="border-top: solid thin #d9d9d9;">
                                            <th scope="row"
                                                style="text-align: left;padding: 8px;vertical-align: middle;font-weight: 600;">
                                                Trẻ em
                                            </th>
                                            <td style="padding: 8px; text-align: center"><?php echo number_format($child_fee, 0, ",", "."); ?>
                                                đ
                                            </td>
                                            <td style="padding: 8px; text-align: center"><?php echo $TotalChildren; ?></td>
                                            <td style="padding: 8px; text-align: right"><?php echo number_format($TotalChildren * $child_fee, 0, ",", ".") ?>
                                                đ
                                            </td>
                                        </tr>
    <?php endif; ?>
    <?php if (!empty($TotalInfant)): ?>
                                        <tr style="border-top: solid thin #d9d9d9;">
                                            <th scope="row"
                                                style="text-align: left;padding: 8px;vertical-align: middle;font-weight: 600;">
                                                Em bé
                                            </th>
                                            <td style="padding: 8px; text-align: center"><?php echo number_format($infant_fee, 0, ",", "."); ?>
                                                đ
                                            </td>
                                            <td style="padding: 8px; text-align: center"><?php echo $TotalInfant; ?></td>
                                            <td style="padding: 8px; text-align: right"><?php echo number_format($TotalInfant * $infant_fee, 0, ",", ".") ?>
                                                đ
                                            </td>
                                        </tr>
    <?php endif; ?>
    <?php if (!empty($Baggages)): $stt = 1; ?>
        <?php foreach ($Baggages as $key => $_baggage): ?>
                                            <tr style="border-top: solid thin #d9d9d9;">
                                                <th scope="row" style="
                                                    text-align: left;
                                                    padding: 8px;
                                                    vertical-align: middle;
                                                    font-weight: 600;
                                                    ">
                                                    Hành lý khách <?php echo $key; ?>
                                                </th>
                                                <td style="padding: 8px; text-align: center"><?php echo number_format($_baggage['price'], 0, ",", ".") ?>
                                                    đ
                                                </td>
                                                <td style="padding: 8px; text-align: center">1</td>
                                                <td style="padding: 8px; text-align: right"><?php echo number_format($_baggage['price'], 0, ",", ".") ?>
                                                    đ
                                                </td>
                                            </tr>
            <?php $stt++;
        endforeach; ?>
    <?php endif; ?>
                                    <tr>
                                        <td colspan="5"
                                            style="padding: 8px;text-align: right; border-top: solid thin #f5a731; font-size: 16px">
                                            <div>
                                                <span>Tổng tiền: </span>
                                                <b><?php echo number_format($total_price, 0, ",", "."); ?> đ</b>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
<?php endif; ?>


                    <table _class="table" style="width: 100%; border-collapse: collapse; font-size: 14px">
                        <tbody>
                            <tr>
                                <th colspan="2" _class="tickets-title"
                                    style="color: #1d5f4d; font-size: 18px; text-transform: uppercase; padding: 8px 0px;font-weight: bold; border-bottom: solid medium #1d5f4d;">
                                    Quý khách xin lưu ý
                                </th>
                            </tr>
                            <tr>
                                <td style="padding: 16px 8px; border-top: solid thin #1d5f4d; line-height: 2; font-size: 16px;">

                                    - Quý khách vui lòng tới sân bay trước 90 phút đối với chuyến bay nội địa, và trước 3
                                    tiếng cho chuyến bay quốc tế để làm thủ tục check-in, quầy thủ tục sẽ kết thúc trước 60
                                    phút so với giờ khởi hành chuyến bay. Quý khách sẽ mất tiền vé nếu không thực hiện đúng
                                    quy định làm thủ tục check-in.<br>
                                    - Giấy tờ tùy thân: CMND (không quá 15 năm), Giấy phép lái xe, Hộ chiếu (passport), thẻ
                                    Đảng viên,…<br>
                                    - Đối với trẻ em dưới 14 tuổi phải có Giấy khai sinh bản gốc hoặc bản sao y trích
                                    lục.<br>
                                    - Đối với trẻ em trên 14 tuổi chưa làm giấy CMND thì sử dụng giấy xác nhận nhân thân có
                                    giá trị trong vòng 30 ngày.<br>
                                    - Đối với trẻ sơ sinh: Nếu chưa có giấy khai sinh thì sử dụng giấy chứng sinh có giá trị
                                    trong vòng 30 ngày.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div _class="flight table-responsive" style="
                         min-width: 0.1%;
                         /*overflow-x: auto;*/
                         display: block;
                         width: 100%;
                         ">
                        <table _class="table" style="width: 100%; border-collapse: collapse; font-size: 16px">
                            <thead>
                                <tr>
                                    <th colspan="4" _class="tickets-title"
                                        style="color: #1d5f4d; font-size: 18px; text-transform: uppercase; padding: 8px 0px;font-weight: bold; border-bottom: solid medium #1d5f4d;">
                                        Thông tin liên hệ
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom: solid thin #80808029">
                                    <td style="padding: 12px 8px; text-align: left;width: 40%;">
                                        Đại lý bán vé:
                                    </td>
                                    <td style="padding: 12px 8px; text-align: left;font-weight: bold;">
<?php echo $booking->contact_FirstName . " " . $booking->contact_LastName; ?>
                                    </td>
                                </tr>
                                <tr style="border-bottom: solid thin #80808029">
                                    <td style="padding: 12px 8px; text-align: left;width: 40%;">
                                        Số điện thoại:
                                    </td>
                                    <td style="padding: 12px 8px; text-align: left">
<?php echo $booking->contact_Phone; ?>
                                    </td>
                                </tr>
                                <tr style="border-bottom: solid thin #80808029">
                                    <td style="padding: 12px 8px; text-align: left;width: 40%;">
                                        Email:
                                    </td>
                                    <td style="padding: 12px 8px; text-align: left">
<?php echo $booking->contact_Email; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div _class="email-header" style="width: 100%; height: max-content" align="center">
            <img src="/sites/all/themes/cassiopeia_theme/img/ticket-view-logo.png" alt="" style="max-width: 200px">
        </div>
        <div _class="email-header"
             style="color: #1a5f4d; font-weight: bold; font-size: 15px; padding-top: 10px; padding-bottom: 10px;  letter-spacing: 3px"
             align="center">www.qtair.vn | 1900.9116
        </div>
    </div>
</div>
<style>
    b {
        font-weight: bold;
        font-family: K2D-Light;
    }
    .footer {
        display: none;
    }
    body {
        line-height: 1.42857143 !important;
    }
</style>