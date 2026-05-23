<?php
// booking
$date = $variables['date'];
$splitter = explode("-",$date);
$lineData = array();
$dataTicket = array();
$ValueX = array();
$start_date = date("d-m-Y 00:00:00",strtotime(str_replace("/","-",trim($splitter[0]))));
$end_date = date("d-m-Y 23:59:59",strtotime(str_replace("/","-",trim($splitter[1]))));
$sub_query = db_select("tbl_booking","tbl_booking");
$sub_query->fields("tbl_booking");
$sub_query->condition("tbl_booking.created",array(strtotime($start_date),strtotime($end_date)),"BETWEEN");
$sub_query->addExpression("DATE_FORMAT(FROM_UNIXTIME(tbl_booking.created), '%e %b %Y') ","cr");
$query = db_select($sub_query,"tbl_sub");
$query->fields("tbl_sub");
$query->addExpression("COUNT(booking_code)","total_booking");
$query->groupBy("cr");
$result = $query->execute()->fetchAll();
foreach((array)$result as $item){
    $lineData[strtotime($item->cr." 00:00:00")] = $item->total_booking;
}
$FromDateTimestamp = strtotime($start_date);
$ToDateTimestamp = strtotime($end_date);
$current = 0;
for($i=$FromDateTimestamp;$i<=$ToDateTimestamp;$i+=86400){
    array_push($ValueX,date('d/m',$i));
    if(!empty($lineData[$i])){
        $dataTicket[] = $lineData[$i];
    }else{
        $dataTicket[] = $current;
    }
}
// issue
$lineData = array();
$dataIssue = array();
$sub_query = db_select("tbl_issue_report","tbl_issue_report");
$sub_query->fields("tbl_issue_report");
$sub_query->condition("tbl_issue_report.created",array(strtotime($start_date),strtotime($end_date)),"BETWEEN");
$sub_query->addExpression("DATE_FORMAT(FROM_UNIXTIME(tbl_issue_report.date), '%e %b %Y') ","cr");
$query = db_select($sub_query,"tbl_sub");
$query->fields("tbl_sub");
$query->addExpression("COUNT(partner_price)","total_issue");
$query->groupBy("cr");
$result = $query->execute()->fetchAll();
foreach((array)$result as $item){
    $lineData[strtotime($item->cr." 00:00:00")] = $item->total_issue;
}
$current = 0;
for($i=$FromDateTimestamp;$i<=$ToDateTimestamp;$i+=86400){
    if(!empty($lineData[$i])){
        $dataIssue[] = $lineData[$i];
    }else{
        $dataIssue[] = $current;
    }
}
?>
<canvas style="width: 100%" id="ticketChart" data-valuex='<?php echo json_encode($ValueX); ?>' data-ticket='<?php echo json_encode($dataTicket); ?>' data-issue='<?php echo json_encode($dataIssue); ?>' ></canvas>
<script>
    var ticketxValues = jQuery("#ticketChart").attr("data-valuex");
    var ticketDataSet = jQuery("#ticketChart").attr("data-ticket");
    var issueDataSet = jQuery("#ticketChart").attr("data-issue");
    console.log("ticketDataSet",ticketDataSet);
    let _ticketChart = document.getElementById('ticketChart');
    let ticketChart = new Chart(_ticketChart, {
        type: 'line',
        data: {
            labels: JSON.parse(ticketxValues),
            datasets: [
                {
                    label: 'Đặt chỗ',
                    data: JSON.parse(ticketDataSet),
                    fill: false,
                    borderColor: '#00AAFF',
                    backgroundColor:'#00AAFF'
                },
                {
                    label: 'Xuất vé',
                    data: JSON.parse(issueDataSet),
                    fill: false,
                    borderColor: '#2BD22B',
                    backgroundColor:'#2BD22B',
                    width:'10'
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: true,
                    maxWidth: 5,
                    position:'bottom',
                    align:'end',

                }
            }
        }
    });
</script>