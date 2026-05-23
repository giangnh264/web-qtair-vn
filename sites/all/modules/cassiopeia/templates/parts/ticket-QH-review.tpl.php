<?php 
global $user;
$html = $variables['html'];
//$html = str_replace("VND","",$html);
$flight = $variables['flight'];
$first_row = $variables['first_row'];
$last_row = $variables['last_row'];
$code = $variables['code'];
$booking = cassiopeia_get_booking_by_pnr($code);
//_print_r($code);
//_print_r($booking);
$query = db_select("tbl_ticket","tbl_ticket");
$query->fields("tbl_ticket");
$query->condition("booking_code",$booking->booking_code);
$query->condition("airline","QH");
$tickets = $query->execute()->fetchAll();
$guest_count = 0;
$fee = 0 ;

$guest_count+=$booking->adt;
$guest_count+=$booking->chd;
//_print_r($fee);

$DOM = new DOMDocument();
$DOM->loadHTML($first_row);
$Header = $DOM->getElementsByTagName('th');
$Detail = $DOM->getElementsByTagName('td');
foreach($Header as $NodeHeader)
{
//        _print_r($NodeHeader);
    $aDataTableHeaderHTML[] = trim($NodeHeader->textContent);
}
//    die;
//    print(count($aDataTableHeaderHTML));
$i = 0;
$j = 0;
$aDataTableDetailHTML = array();
foreach($Detail as $sNodeDetail)
{
    $guests[$j][] = trim($sNodeDetail->textContent);
    $i = $i + 1;
    $j = $i % (count($aDataTableHeaderHTML)) == 0 ? $j + 1 : $j;
}
$infant = 0;
foreach($guests as $guest){
    if(strpos("em bé",$guest)!==false){
        $infant++;
    }
}
$DOM = new DOMDocument();
$DOM->loadHTML($flight);
$Header = $DOM->getElementsByTagName('th');
$Detail = $DOM->getElementsByTagName('td');
foreach($Header as $NodeHeader)
{
//        _print_r($NodeHeader);
    $aDataTableHeaderHTML[] = trim($NodeHeader->textContent);
}
//    die;
//    print(count($aDataTableHeaderHTML));
$i = 0;
$j = 0;
$aDataTableDetailHTML = array();
foreach($Detail as $sNodeDetail)
{
    $aDataTableDetailHTML[$j][] = trim($sNodeDetail->textContent);
}
//_print_r($Detail);
//_print_r($aDataTableDetailHTML);
$row = $aDataTableDetailHTML[0];
//_print_r($row);




//_print_r($total);
?>
<!--<table>-->
<!--    --><?php //print($first_row); ?>
<!--</table>-->
<?php $replace_content = "<table style=\"width: 100%\">
    <thead style=\"background: #58585a;color: #FFF;\">
        <th>Chuyến bay</th>
        <th>Điểm đi</th>
        <th>Điểm đến</th>
        <th>Hạng</th>
        <th>Giá vé</th>
        <th>Ngày bay</th>
        <th>Giờ đi</th>
        <th>Giờ đến</th>
    </thead>
    <tbody>";?>
        <?php $index=1; ?>
        <?php foreach($tickets as $ticket): ?>
            <?php
                 $rate= 0;
                $fee= 0;
                $total= 0;
                $AirlineCode = $ticket->airline;
                $ticket = unserialize($ticket->ticket);
                $endpoint = cassiopeia_get_airport($ticket['EndPoint']);
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
                    _print_r($region_fee);
                if(!empty($region_fee['value'])){
                    $fee =$region_fee['value']*$guest_count;
                }
                $query = db_select("tbl_agent_fee", "tbl_agent_fee");
                $query->fields("tbl_agent_fee");
                $query->condition("region", $region_code);
                $query->condition("airline", "QH");
                $agent_all_fee = $query->execute()->fetchObject();
				$query_ag = db_select("tbl_agent_fee", "tbl_agent_fee");
                $query_ag->fields("tbl_agent_fee");
                $query_ag->condition("region", $region_code);
                $query_ag->condition("airline", "QH");
				$query_ag->condition("agent_id", $user->uid);
                $agent_ag_fee = $query_ag->execute()->fetchObject();
                if (!empty($agent_ag_fee)) {
                    $rate = $agent_ag_fee->value;
                } else if (!empty($agent_all_fee)) {
                    $rate = $agent_all_fee->value;
                } else {
                    $rate = 0;
                }
            //$total+=$fee;
                $rate = $rate*$guest_count;
                if($index==1){
                    $price_1 = str_replace("VND","",str_replace(",","",$row[5]));
                    $price_2 = str_replace("VND","",str_replace(",","",$row[6]));
                    $price_3 = str_replace("VND","",str_replace(",","",$row[7]));
                    $total = (int)$price_1+(int)$price_2+(int)$price_3 + $fee;
                }else{
                    $price_1 = str_replace("VND","",str_replace(",","",$row[20]));
                    $price_2 = str_replace("VND","",str_replace(",","",$row[21]));
                    $price_3 = str_replace("VND","",str_replace(",","",$row[22]));
                    $total = (int)$price_1+(int)$price_2+(int)$price_3 + $fee;
                }
//                _print_r(str_replace("VND","",str_replace(",","",$row[5])));
//                _print_r($row);
//                _print_r($fee);
//                _print_r($rate);
//                _print_r($agent_fee);
//                _print_r($total);
//                $total-=$rate;
                $_ticket = unserialize($ticket->ticket);
                $startpoint = cassiopeia_get_airport($ticket['StartPoint']);
                $endpoint = cassiopeia_get_airport($ticket['EndPoint']);
            $replace_content.="<tr>
                <td>".$ticket['ListAvailFlights']['AvailFlight']['FlightNumber']."</td>
                <td>".$startpoint->city."</td>
                <td>".$endpoint->city."</td>
                <td>".$ticket['ListAvailFlights']['AvailFlight']['Class']."</td>
                <td>".number_format($total,0,',','.')." VNĐ</td>
                <td>".date('d/m/Y',strtotime($ticket['StartDate']))."</td>
                <td>".date('H:i',strtotime($ticket['StartDate']))."</td>
                <td>".date('H:i',strtotime($ticket['EndDate']))."</td>
            </tr>";
            ?>
        <?php $index++; endforeach; ?>
<?php $replace_content.= "</tbody>
</table>"; ?>
<?php
$html = str_replace($last_row,$replace_content,$html);
print($html);
?>