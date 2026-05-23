<?php
// báo cáo doanh thu bán vé
$date = $variables['date'];
$splitter = explode("-",$date);
$start_date = date("d-m-Y 00:00:00",strtotime(str_replace("/","-",trim($splitter[0]))));
$end_date = date("d-m-Y 23:59:59",strtotime(str_replace("/","-",trim($splitter[1]))));
$FromDateTimestamp = strtotime($start_date);
$ToDateTimestamp = strtotime($end_date);
$lineData = array();
$ValueX = array();
$dataSetRevenueTicket = array();
$sub_query = db_select("tbl_issue_report","tbl_issue_report");
$sub_query->fields("tbl_issue_report");
$sub_query->condition("tbl_issue_report.date",array(strtotime($start_date),strtotime($end_date)),"BETWEEN");
$sub_query->addExpression("DATE_FORMAT(FROM_UNIXTIME(tbl_issue_report.date), '%d/%m') ","cr");
$query = db_select($sub_query,"tbl_sub");
$query->fields("tbl_sub");
$query->addExpression("SUM(revenue)","total_revenue");
$query->groupBy("cr");
$result = $query->execute()->fetchAll();

foreach((array)$result as $item){
    $lineData[$item->cr] = $item->total_revenue;
}
$current = 0;
for($i=$FromDateTimestamp;$i<=$ToDateTimestamp;$i+=86400){
    array_push($ValueX,date('d/m',$i));
    if(!empty($lineData[date('d/m',$i)])){
        $dataSetRevenueTicket[] = $lineData[date('d/m',$i)];
    }else{
        $dataSetRevenueTicket[] = $current;
    }
//    _print_r($lineData[date('d/m',$i)]);
}
//_print_r($result);
//_print_r($lineData);
//_print_r($dataSetRevenueTicket);
?>

<?php
// báo cáo doanh thu đặt phòng
$lineData = array();
//                    $ValueX = array();
$dataSetRevenueRoom = array();
$sub_query = db_select("tbl_room_booking_report","tbl_room_booking_report");
$sub_query->fields("tbl_room_booking_report");
$sub_query->condition("tbl_room_booking_report.created",array(strtotime($start_date),strtotime($end_date)),"BETWEEN");
$sub_query->addExpression("DATE_FORMAT(FROM_UNIXTIME(tbl_room_booking_report.created), '%e %b %Y') ","cr");
$query = db_select($sub_query,"tbl_sub");
$query->fields("tbl_sub");
$query->addExpression("SUM(revenue)","total_revenue");
$query->groupBy("cr");
$result = $query->execute()->fetchAll();
foreach((array)$result as $item){
    $lineData[strtotime($item->cr." 00:00:00")] = $item->total_revenue;
}
$current = 0;
for($i=$FromDateTimestamp;$i<=$ToDateTimestamp;$i+=86400){
//                        array_push($ValueX,date('d/m',$i));
    if(!empty($lineData[$i])){
        $dataSetRevenueRoom[] = $lineData[$i];
    }else{
        $dataSetRevenueRoom[] = $current;
    }
}
$image_url = image_style_url("style_502x502","public://smQH.png");
?>
<img src="<?php echo $image_url; ?>" alt="">
<canvas style="width: 100%;height: 100%;" id="revenueReportChart" data-valuex='<?php echo json_encode($ValueX); ?>' data-ticket='<?php echo json_encode($dataSetRevenueTicket); ?>' data-room='<?php echo json_encode($dataSetRevenueRoom); ?>' ></canvas>
<script>
    let revenueReportxValues = jQuery("#revenueReportChart").attr("data-valuex");
    let $dataSetRevenueTicket = jQuery("#revenueReportChart").attr("data-ticket");
    // let $dataSetRevenueRoom = jQuery("#revenueReportChart").attr("data-room");

    let _revenueReportChart = document.getElementById('revenueReportChart');
    let revenueReportChart = new Chart(_revenueReportChart, {
        type: 'scatter',
        data: {
            labels: JSON.parse(revenueReportxValues),
            datasets: [
                {
                    type: 'bar',
                    label: 'Đã bán vé',
                    data: JSON.parse($dataSetRevenueTicket),
                    fill: false,
                    borderColor: '#2BD22B',
                    backgroundColor: '#2BD22B'
                },
                // {
                //     type: 'bar',
                //     label: 'Đã bán phòng',
                //     data: JSON.parse($dataSetRevenueRoom),
                //     fill: false,
                //     borderColor: '#00AAFF',
                //     backgroundColor: '#00AAFF'
                // },
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
                    position: 'bottom',
                    align: 'end',

                }
            },
            // maintainAspectRatio:false
        }
    })
</script>