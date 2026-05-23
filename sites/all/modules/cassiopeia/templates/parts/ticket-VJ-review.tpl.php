<?php
$html = $variables['html'];
//_print_r($html);
$last_row = $variables['last_row'];global $user;

$code = $variables['code'];
//_print_r($code);
$airline = "VJ";
$booking = cassiopeia_get_booking_by_pnr($code);
//_print_r($booking);
if(!empty($booking)){
    $query = db_select("tbl_ticket","tbl_ticket");
    $query->fields("tbl_ticket");
    $query->condition("booking_code",$booking->booking_code);
    $query->condition("airline","VJ");
    $tickets = $query->execute()->fetchAll();
}
$DOM = new DOMDocument();
$DOM->loadHTML($last_row);
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
_print_r($aDataTableDetailHTML);
foreach($aDataTableDetailHTML as $item){
    $guest[$item[1]] = $item[1];
    if(strpos($item[2],"Add Ons")!==false){
        $baggages[$item[1]] = $item;
    }
    if(strpos($item[2],"INFANT")!==false){
        $infant++;
    }
}
$TotalAdult = count($guest) - $infant;
$total_guest = $booking->adt+$booking->chd;
$total_row = $aDataTableDetailHTML[count($aDataTableDetailHTML)-1];
//_print_r($total_row);
$total = str_replace("VND","",$total_row[3]);
$total = str_replace(",","",$total_row[3]);
$total = trim($total);

$total_fee = 0;
$total_rate= 0;
//_print_r($tickets);
$totalBaggage = 0;
if(!empty($tickets)){
    foreach($tickets as $ticket){
        $totalBaggage+=$ticket->Baggage;
        $rate = 0;
        $fee = 0;
        $AirlineCode = $ticket->airline;
        $ticket = unserialize($ticket->ticket);
        $endpoint = cassiopeia_get_airport($ticket['EndPoint']);;
        $startpoint = cassiopeia_get_airport($ticket['StartPoint']);;
        if($startpoint->country_code!="VN" && $endpoint->country_code!="VN"){
            $region_code = "SOTO";
        }else{
            if($endpoint->country_code=="VN"){
                $region_code = "DO";
            }else{
                $region_code = $endpoint->region_code;
            }
        }
        $region_fee = cassiopeia_get_fee_by_airline_and_region($AirlineCode,$region_code);
//        _print_r($region_fee);
        if(!empty($region_fee['value'])){
            $fee =$region_fee['value'];
        }
        $fee*=$total_guest;
        $total_fee+=$fee;
        $query = db_select("tbl_agent_fee", "tbl_agent_fee");
		$query->fields("tbl_agent_fee");
		$query->condition("region", $region_code);
		$query->condition("airline", "VJ");
		$agent_all_fee = $query->execute()->fetchObject();
		$query_ag = db_select("tbl_agent_fee", "tbl_agent_fee");
		$query_ag->fields("tbl_agent_fee");
		$query_ag->condition("region", $region_code);
		$query_ag->condition("airline", "VJ");
		$query_ag->condition("agent_id", $user->uid);
		$agent_ag_fee = $query_ag->execute()->fetchObject();
        if (!empty($agent_ag_fee)) {
			$rate = $agent_ag_fee->value;
		} else if (!empty($agent_all_fee)) {
			$rate = $agent_all_fee->value;
		} else {
			$rate = 0;
		}
        $rate = $total_guest*$rate;
        $total_rate+=$rate;
    }
}
//_print_r($region_code);
//_print_r($total);
//_print_r($total_fee);
//_print_r($total_rate);


$total+=$total_fee;
//$total-=$total_rate;
$new_row = "";
?>
<?php if(!empty($baggages)): ?>
    <?php $new_row .= "<thead style=\"background:#58585a;color:white;\">
        <th style=\"padding:0px;\">Leg</th>
        <th style=\"padding:0px;\">Tên hành khách</th>
        <th style=\"padding:0px;\">Mô tả</th>
        <th style=\"padding:0px;\">Giá tiền</th>
        </thead>
        <tbody>"; ?>
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
        $new_row.="<tr>
                <td style=\"padding:0px;\">".$baggage[0]."></td>
                <td style=\"padding:0px;\">".$baggage[1]."></td>
                <td style=\"padding:0px;\">".$baggage[2]."></td>
                <td style=\"padding:0px;text-align: right;\">".number_format($result->amount,0,',','.')." VNĐ</td>
            </tr>";
        ?>
    <?php endforeach; ?>
    <?php $new_row.="</tbody>"; ?>
<?php endif; ?>
<div class="block-title">
    <h2>Thông tin đặt chỗ: <?php print($code); ?></h2>
</div>
<?php
$html = str_replace($last_row,$new_row,$html);
print($html);
?>
<table class="table">
    <tbody>
    <tr>
        <td><b>Tổng cộng:</b></td>
        <td colspan="2" class="text-right"><span style="font-weight: bold;font-size: 14px;" class="color-red "><?php print(number_format($total,0,",",".")); ?> VNĐ</span></td>
    </tr>
    </tbody>
</table>

