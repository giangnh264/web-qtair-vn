<?php
    $data = $variables['data'];
    $airline = "VJ";
    $booking = cassiopeia_get_booking_by_pnr($data->PNRCode);
    $query = db_select("tbl_ticket","tbl_ticket");
    $query->fields("tbl_ticket");
    $query->condition("booking_code",$booking->booking_code);
    $tickets = $query->execute()->fetchAll();
    $htmlContent = "<style>table{width:100%}</style><div data-departure=\"HAN\" data-arrival=\"SGN\" data-segment=\"1\"></div><table><tbody><tr align=\"left\"><th style=\"background:#58585a;color:#ffffff;\">Trạng thái đặt chỗ</th><td>Chưa Thanh Toán<br><span style=\"color:#ED2025;text-decoration:underline;\">Vui lòng thanh toán trước 16:13 20/08/2020 sau thời hạn trên vé sẽ bị hủy</span></td><th style=\"background:#58585a;color:#ffffff;\">Liên lạc:</th><td>+84976868029 (mobile)</td></tr><tr align=\"left\"><th style=\"background:#58585a;color:#ffffff;\">Ngày đặt:</th><td>20/08/2020</td><th style=\"background:#58585a;color:#ffffff;\">Email</th><td>huutrungd1c@gmail.com</td></tr><tr align=\"left\"><th style=\"background:#58585a;color:#ffffff;\">Tên:</th><td>NGUYEN, HUU TRUNG</td></tr></tbody></table><br><table><tbody><tr><th style=\"background:#58585a;color:#ffffff;\">Tên hành khách</th><th style=\"background:#58585a;color:#ffffff;\">Số ghế</th></tr><tr><td><b><span style=\"font-size:25px\">NGUYEN, HUU TRUNG</span></b><br></td><td><table><tbody><tr><td>VJ139 - --</td><td></td></tr></tbody></table></td></tr></tbody></table><br><table cellspacing=\"0px\"><thead><tr><th style=\"background:#58585a;color:#ffffff;\">Chuyến bay</th><th style=\"background:#58585a;color:#ffffff;\">Ngày</th><th style=\"background:#58585a;color:#ffffff;\">Loại vé</th><th style=\"background:#58585a;color:#ffffff;\">Khởi hành</th><th style=\"background:#58585a;color:#ffffff;\">Đến</th></tr></thead><tbody><tr><td>VJ139</td><td>22/08/2020</td><td>Eco</td><td>12:55 - Ha Noi (HAN)</td><td>15:05 - Ho Chi Minh (SGN)</td></tr></tbody></table><br><table cellspacing=\"0px\"><tbody><tr><th style=\"text-align:left;background:#58585a;color:#ffffff;\">Leg</th><th style=\"text-align:left;background:#58585a;color:#ffffff;\">Tên hành khách</th><th style=\"text-align:left;background:#58585a;color:#ffffff;\">Mô tả</th><th style=\"text-align:right;background:#58585a;color:#ffffff;\">Số tiền</th><th style=\"text-align:right;background:#58585a;color:#ffffff;\">Thuế VAT</th><th style=\"text-align:right;background:#58585a;color:#ffffff;\">Cộng</th></tr><tr><td style=\"padding-left:11px\">1</td><td>NGUYEN, HUU TRUNG</td><td>Airport Tax Domestic</td><td style=\"text-align:right;\">100,000 VND</td><td style=\"text-align:right;\">0 VND</td><td style=\"text-align:right;\">100,000 VND</td></tr><tr><td style=\"padding-left:11px\">1</td><td>NGUYEN, HUU TRUNG</td><td>Z_Eco - Eco</td><td style=\"text-align:right;\">399,000 VND</td><td style=\"text-align:right;\">39,900 VND</td><td style=\"text-align:right;\">438,900 VND</td></tr><tr><td style=\"padding-left:11px\">1</td><td>NGUYEN, HUU TRUNG</td><td>Add Ons (0) - Bag 25kgs</td><td style=\"text-align:right;\">235,000 VND</td><td style=\"text-align:right;\">23,500 VND</td><td style=\"text-align:right;\">258,500 VND</td></tr><tr><td style=\"padding-left:11px\">1</td><td>NGUYEN, HUU TRUNG</td><td>Admin Fee Domestic</td><td style=\"text-align:right;\">310,000 VND</td><td style=\"text-align:right;\">31,000 VND</td><td style=\"text-align:right;\">341,000 VND</td></tr><tr><td style=\"padding-left:11px\">1</td><td>NGUYEN, HUU TRUNG</td><td>Airport Security</td><td style=\"text-align:right;\">20,000 VND</td><td style=\"text-align:right;\">0 VND</td><td style=\"text-align:right;\">20,000 VND</td></tr><tr><td colspan=\"3\" style=\"text-align:right;font-weight:bold;\">Tổng cộng</td><td style=\"text-align:right;\">1,064,000 VND</td><td style=\"text-align:right;\">94,400 VND</td><td style=\"text-align:right;\">1,158,400 VND</td></tr></tbody></table><br>";
    $array = explode("<br>",$htmlContent);
    $n = str_replace($array[count($array)-2],"",$htmlContent);
    print($n);
    $DOM = new DOMDocument();
    $DOM->loadHTML($array[count($array)-2]);
    $Header = $DOM->getElementsByTagName('th');
    $Detail = $DOM->getElementsByTagName('td');
    foreach($Header as $NodeHeader)
    {
        $aDataTableHeaderHTML[] = trim($NodeHeader->textContent);
    }
    $i = 0;
    $j = 0;
    foreach($Detail as $sNodeDetail)
    {
        $aDataTableDetailHTML[$j][] = trim($sNodeDetail->textContent);
        $i = $i + 1;
        $j = $i % (count($aDataTableHeaderHTML)) == 0 ? $j + 1 : $j;
    }
    $baggages = array();
    $guest = array();
    $infant = 0;
    $count = 0;
    foreach($aDataTableDetailHTML as $item){
        $guest[$item[1]] = $item[1];
//        print(strpos($item[2],"Add"));
        if(strpos($item[2],"Add Ons")!==false){
            $baggages[$item[1]] = $item;
        }
        if(strpos($item[2],"INFANT")!==false){
            $infant++;
        }
    }
    $total_guest = count($guest)-$infant;
    $total_row = $aDataTableDetailHTML[count($aDataTableDetailHTML)-1];
    $total = str_replace("VND","",$total_row[3]);
    $total = str_replace(",","",$total_row[3]);
    $total = trim($total);
    $fee = 0;
    if(!empty($tickets)){
        foreach($tickets as $ticket){
            $AirlineCode = $ticket->airline;
            $ticket = unserialize($ticket->ticket);
            $endpoint = cassiopeia_get_airport($ticket['EndPoint']);;
            if($endpoint->country_code=="VN"){
                $region_code = "DO";
            }else{
                $region_code = $endpoint->region_code;
            }
            $region_fee = cassiopeia_get_fee_by_airline_and_region($AirlineCode,$region_code);
            if(!empty($region_fee['value'])){
                $fee+=$region_fee['value'];
            }
        }
    }
    $total+=$fee;
?>

<?php if(!empty($baggages)): ?>
<table class="table ">
    <thead style="background:#58585a;color:white;">
        <th style="padding:0px;">Leg</th>
        <th style="padding:0px;">Tên hành khách</th>
        <th style="padding:0px;">Mô tả</th>
        <th style="padding:0px;">Giá tiền1</th>
    </thead>
    <tbody>
        <?php foreach($baggages as $baggage): ?>
            <?php
                $amount = $baggage[5];
                $temp = $baggage[2];
                $splitter = explode("Bag",$temp);
                $weight = trim(str_replace("kgs","",$splitter[1]));
                $amount = trim(str_replace("VND","",$amount));
                $amount = trim(str_replace(",","",$amount));
                $query = db_select("tbl_bagage","tbl_bagage");
                $query->fields("tbl_bagage");
                $query->condition("airline",$airline    );
                $query->condition("weight",$weight);
                $result = $query->execute()->fetchObject();
                $total -= (float)$amount;
                $total += $result->amount;
            ?>
            <tr>
                <td style="padding:0px;"><?php print($baggage[0]); ?></td>
                <td style="padding:0px;"><?php print($baggage[1]); ?></td>
                <td style="padding:0px;"><?php print($baggage[2]); ?></td>
                <td style="padding:0px;text-align: right;"><?php print(number_format($result->amount,0,",",".")); ?> VNĐ</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>
<table class="table">
    <tbody>
        <tr>
            <td><b>Tổng công:</b></td>
            <td colspan="2" class="text-right"><span style="font-weight: bold;font-size: 14px;" class="color-red "><?php print(number_format($total,0,",",".")); ?> VNĐ</span></td>
        </tr>
    </tbody>
</table>

