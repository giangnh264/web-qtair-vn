<?php
global $user;
$html = !empty($variables['html'])?$variables['html']:"";
$tableArr = !empty($variables['tableArr'])?$variables['tableArr']:"";
$last_row = !empty($variables['last_row'])?$variables['last_row']:"";
$itinerary_row = !empty($variables['itinerary_row'])?$variables['itinerary_row']:"";
$silver_rank_fee = 0;
if(!empty($user->uid)){
	$issue_query = db_select("tbl_issue_report","tbl_issue_report");
	$issue_query->fields("tbl_issue_report",array("created","partner_price","agent"));

	$room_query = db_select("tbl_room_booking_report","tbl_room_booking_report");
	$room_query->fields("tbl_room_booking_report",array("created"));
	$room_query->addField("tbl_room_booking_report","partner_price","partner_price");
	$room_query->addField("tbl_room_booking_report","agent","agent");
	$quer1y = Database::getConnection()
		->select($issue_query->union($room_query))
		->fields(NULL, array("created","partner_price","agent"))
		->orderBy("created","DESC");
	$quer1y->condition("created",array(strtotime(date("01-01-Y",REQUEST_TIME)),strtotime(date("31-12-Y",REQUEST_TIME))),"BETWEEN");
	$quer1y->addExpression("SUM(partner_price)","total_price");
	$quer1y->groupBy("agent");
	$quer1y->condition("agent",$user->uid);
	$_rank  = $quer1y -> execute() -> fetchObject();
	if(empty($_rank)||$_rank->total_price/1000000<500){
		$silver_rank_fee = variable_get("silver_rank_fee");
	}
}
	
$code = $variables['code'];
$airline = "VJ";
if(!empty($itinerary_row)){
    $ItineraryHTML = [];
    $DOM = new DOMDocument();
    $DOM->loadHTML($itinerary_row);
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
        $ItineraryHTML[$j][] = trim($sNodeDetail->textContent);
        $i = $i + 1;
        $j = $i % (count($aDataTableHeaderHTML)) == 0 ? $j + 1 : $j;
    }
    $_StartPoint = $_EndPoint = "";
    if(!empty($ItineraryHTML)){
        $_Itinerary = $ItineraryHTML[0];
        $_Start = $_Itinerary[3];
        $_End = $_Itinerary[4];
        $temp = explode("(",$_Start);
        $temp = $temp[1];
        $temp = explode(")",$temp);
        $_StartPoint = $temp[0];
        $temp = explode("(",$_End);
        $temp = $temp[1];
        $temp = explode(")",$temp);
        $_EndPoint = $temp[0];
    }


    $startpoint = cassiopeia_get_airport($_StartPoint);
    $endpoint = cassiopeia_get_airport($_EndPoint);
//_print_r($startpoint);
    $aDataTableDetailHTML = [];
    $aDataTableHeaderHTML = [];
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
//_print_r($aDataTableDetailHTML);
    foreach($aDataTableDetailHTML as $item){
        $guest[$item[1]] = $item[1];
        if(strpos($item[2],"Add Ons")!==false){
            $baggages[$item[1]] = $item;
        }
        if(strpos($item[2],"INFANT")!==false){
            $infant++;
        }
    }
    $remove = array_pop($guest);
    $TotalAdult = count($guest) - $infant;
    $total_row = $aDataTableDetailHTML[count($aDataTableDetailHTML)-1];
    $total = str_replace("VND","",$total_row[3]);
    $total = str_replace(",","",$total_row[3]);
    $total = trim($total);
    $total_fee = 0;
    $total_rate= 0;
    $totalBaggage = 0;
    $total+=$total_fee;
    $new_row = "";
    $_SESSION[$code +'-count_leg'] = count($ItineraryHTML);
    $_SESSION[$code +'-count_adult'] = $TotalAdult*count($ItineraryHTML);
    $_SESSION[$code +'-total_price'] = $total;
    $_SESSION[$code +'-Airline'] = $airline;
    $_SESSION[$code +'-PNR'] = $code;
	$_SESSION[$code +'-total_silver_rank_fee'] = $silver_rank_fee*($TotalAdult)*count($ItineraryHTML);
}


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
        if($startpoint->country_code=="VN"&&$endpoint->country_code=="VN"){
            $query = db_select("tbl_bagage","tbl_bagage");
            $query->fields("tbl_bagage");
            $query->condition("airline",$airline    );
            $query->condition("weight",$weight);
            $result = $query->execute()->fetchObject();
            $total -= (float)$amount;
            $total += $result->amount;
            $amount = $result->amount;
        }
        $new_row.="<tr>
                <td style=\"padding:0px;\">".$baggage[0]."></td>
                <td style=\"padding:0px;\">".$baggage[1]."></td>
                <td style=\"padding:0px;\">".$baggage[2]."></td>
                <td style=\"padding:0px;text-align: right;\">".number_format($amount,0,',','.')." VNĐ</td>
            </tr>";
        ?>
    <?php endforeach; ?>
    <?php $new_row.="</tbody>"; ?>
<?php endif; ?>
<div class="block-title">
    <h2>Thông tin đặt chỗ: <?php print($code); ?></h2>
</div>
<?php
$guestHTML = "<table>";
$guestHTML .= "<thead style=\"background:#58585a;color:white;\">
        <th style=\"padding:0px;\">Tên khách</th>
        </thead>
        <tbody>";

?>
<?php if(!empty($guest)): ?>
    <?php foreach($guest as $value): ?>
        <?php
        $guestHTML.="<tr>
                <td style=\"padding:5px;\">".$value."</td>
            </tr>";
        $guestHTML .= "</<table>";
        ?>
    <?php endforeach; ?>
<?php endif; ?>

<?php
if(!empty($html) && !empty($tableArr)){
    $html = str_replace($last_row,$new_row,$html);
    $html = str_replace($tableArr[count($tableArr)-3],$guestHTML,$html);
}
print($html);
?>
<!--<?php
$_booking  = cassiopeia_get_booking_by_pnr($code);
if(!empty($_booking)){
	 $_SESSION[$code.'-total_price'] = $total;
	 $_SESSION['total_silver_rank_fee'] = $silver_rank_fee*($TotalAdult)*count($ItineraryHTML);
}
?>-->
<?php if(!empty($total)): ?>
    <table class="table">
        <tbody>
        <tr>
            <td><b>Tổng cộng:</b></td>
            <td colspan="2" class="text-right"><span style="font-weight: bold;font-size: 14px;" class="color-red "><?php print(number_format($total,0,",",".")); ?> VNĐ.</span></td>
        </tr>
		<?php if($silver_rank_fee > 0) : ?>
		<tr>
            <td colspan="3" class="text-right"><span style="font-weight: 300;font-size: 14px;" class="color-red "><i>Phí dịch vụ xuất vé VJ: <?php print(number_format($silver_rank_fee,0,",",".")); ?> VNĐ/vé</i></span></td>
        </tr>
		<?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>


