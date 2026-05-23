<?php
// booking
$date = $variables['date'];
$splitter = explode("-",$date);
$start_date = date("d-m-Y 00:00:00",strtotime(str_replace("/","-",trim($splitter[0]))));
$end_date = date("d-m-Y 23:59:59",strtotime(str_replace("/","-",trim($splitter[1]))));
$lineData = array();
$dataTicket = array();
$ValueX = array();
$sub_query = db_select("tbl_room_booking","tbl_room_booking");
$sub_query->fields("tbl_room_booking");
$sub_query->condition("tbl_room_booking.created",array(strtotime($start_date),strtotime($end_date)),"BETWEEN");
$sub_query->addExpression("DATE_FORMAT(FROM_UNIXTIME(tbl_room_booking.created), '%e %b %Y') ","cr");
$query = db_select($sub_query,"tbl_sub");
$query->fields("tbl_sub");
$query->addExpression("COUNT(id)","tbl_room_booking");
$query->groupBy("cr");
$result = $query->execute()->fetchAll();
foreach((array)$result as $item){
    $lineData[strtotime($item->cr." 00:00:00")] = $item->tbl_room_booking;
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
$sub_query = db_select("tbl_room_booking_report","tbl_room_booking_report");
$sub_query->fields("tbl_room_booking_report");
$sub_query->condition("tbl_room_booking_report.created",array(strtotime($start_date),strtotime($end_date)),"BETWEEN");
$sub_query->addExpression("DATE_FORMAT(FROM_UNIXTIME(tbl_room_booking_report.created), '%e %b %Y') ","cr");
$query = db_select($sub_query,"tbl_sub");
$query->fields("tbl_sub");
$query->addExpression("COUNT(id)","total_issue");
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
<canvas style="width: 100%" id="roomChart" data-valuex='<?php echo json_encode($ValueX); ?>' data-ticket='<?php echo json_encode($dataTicket); ?>' data-issue='<?php echo json_encode($dataIssue); ?>' ></canvas>
<script>
    let roomxValues = jQuery("#roomChart").attr("data-valuex");
    let roomDataSet = jQuery("#roomChart").attr("data-ticket");
    let roomIssueDataSet = jQuery("#roomChart").attr("data-issue");
    let _roomChart = document.getElementById('roomChart');
    let roomChart = new Chart(_roomChart, {
        type: 'line',
        data: {
            labels: JSON.parse(roomxValues),
            datasets: [
                {
                    label: 'Đã đặt',
                    data: JSON.parse(roomDataSet),
                    fill: false,
                    borderColor: '#00AAFF',
                    backgroundColor:'#00AAFF'
                },
                {
                    label: 'Đã xuất',
                    data: JSON.parse(roomIssueDataSet),
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