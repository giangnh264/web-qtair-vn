<?php // Đã bán vé
$date = $variables['date'];
$splitter = explode("-",$date);
$start_date = date("d-m-Y 00:00:00",strtotime(str_replace("/","-",trim($splitter[0]))));
$end_date = date("d-m-Y 23:59:59",strtotime(str_replace("/","-",trim($splitter[1]))));
$FromDateTimestamp = strtotime($start_date);
$ToDateTimestamp = strtotime($end_date);
$ValueX = array();
$lineData = array();
$dataSetIssue = array();
$current = 0;
for($i=$FromDateTimestamp;$i<=$ToDateTimestamp;$i+=86400){
//    array_push($ValueX,date('d/m',$i));
    try{
        $sub_query = db_select("tbl_issue_report","tbl_issue_report");
        $sub_query->fields("tbl_issue_report");
        $sub_query->groupBy("tbl_issue_report.agent");
        $sub_query->condition("tbl_issue_report.date",array($i,$i+86399),"BETWEEN");
        $sub_query->addExpression("DATE_FORMAT(FROM_UNIXTIME(tbl_issue_report.date), '%e %b %Y') ","cr");
        $query = db_select($sub_query,"tbl_sub");
        $query->fields("tbl_sub");
        $query->addExpression("COUNT(id)","total_agent");
//                            $query->groupBy("cr");
        $result = $query ->execute()->fetchObject();
//                            _print_r($result);
    }catch (Exception $e){
        _print_r($e);
    }
    if(!empty($result->total_agent)){
        $dataSetIssue[] = $result->total_agent;
    }else{
        $dataSetIssue[] = $current;
    }
}
?>

<?php // Đã bán phòng
//                    $start_date = date("d-m-Y 00:00:00",strtotime("08-01-2022"));
//                    $end_date = date("d-m-Y 23:59:59",strtotime("08-01-2022"));
$dataSetRoom = array();
$current = 0;
for($i=$FromDateTimestamp;$i<=$ToDateTimestamp;$i+=86400){
    try{
        $sub_query = db_select("tbl_room_booking_report","tbl_room_booking_report");
        $sub_query->fields("tbl_room_booking_report");
        $sub_query->groupBy("tbl_room_booking_report.agent");
        $sub_query->condition("tbl_room_booking_report.created",array($i,$i+86399),"BETWEEN");
        $sub_query->addExpression("DATE_FORMAT(FROM_UNIXTIME(tbl_room_booking_report.created), '%e %b %Y') ","cr");
        $query = db_select($sub_query,"tbl_sub");
        $query->fields("tbl_sub");
        $query->addExpression("COUNT(id)","total_agent");
        $query->groupBy("cr");
        $result = $query ->execute()->fetchObject();
//                            _print_r($result);
    }catch (Exception $e){
        _print_r($e);
    }
    if(!empty($result->total_agent)){
        $dataSetRoom[] = $result->total_agent;
    }else{
        $dataSetRoom[] = $current;
    }
}
?>
<?php //Tiềm năng
$r_query = db_select("users_roles","tbl_role");
$r_query->fields("tbl_role");
$r_query->condition("rid",4);

$sub_query = db_select("users","tbl_user");
$sub_query->fields("tbl_user");
$sub_query->join($r_query,"tbl_role","tbl_role.uid=tbl_user.uid");
$sub_query->join("field_data_field_account_status","field_account_status","field_account_status.entity_id=tbl_user.uid");
$sub_query->condition("field_account_status.field_account_status_tid",22);
$sub_query->condition("tbl_user.created",array(strtotime($start_date),strtotime($end_date)),"BETWEEN");
$sub_query->addExpression("DATE_FORMAT(FROM_UNIXTIME(tbl_user.created), '%e %b %Y') ","cr");
$query = db_select($sub_query,"tbl_sub");
$query->fields("tbl_sub");
$query->addExpression("COUNT(uid)","total_user");
$query->groupBy("cr");
$result = $query ->execute()->fetchAll();
//                    _print_r($result);
$lineData = array();
$dataSetTiemNang = array();
foreach((array)$result as $item){
    $lineData[strtotime($item->cr." 00:00:00")] = $item->total_user;
}
//                    $FromDateTimestamp = strtotime($start_date);
//                    $ToDateTimestamp = strtotime($end_date);
$current = 0;
for($i=$FromDateTimestamp;$i<=$ToDateTimestamp;$i+=86400){
//    array_push($ValueX,date('d/m',$i));
    if(!empty($lineData[$i])){
        $dataSetTiemNang[] = $lineData[$i];
    }else{
        $dataSetTiemNang[] = $current;
    }
}
?>

<?php //Tổng đăng ký
$r_query = db_select("users_roles","tbl_role");
$r_query->fields("tbl_role");
$r_query->condition("rid",4);

$sub_query = db_select("users","tbl_user");
$sub_query->fields("tbl_user");
$sub_query->join($r_query,"tbl_role","tbl_role.uid=tbl_user.uid");
$sub_query->join("field_data_field_account_status","field_account_status","field_account_status.entity_id=tbl_user.uid");
$sub_query->condition("tbl_user.created",array(strtotime($start_date),strtotime($end_date)),"BETWEEN");
$sub_query->addExpression("DATE_FORMAT(FROM_UNIXTIME(tbl_user.created), '%e %b %Y') ","cr");
$query = db_select($sub_query,"tbl_sub");
$query->fields("tbl_sub");
$query->addExpression("COUNT(uid)","total_user");
$query->groupBy("cr");
$result = $query ->execute()->fetchAll();
//                    _print_r($result);
$lineData = array();
$dataSetUser = array();
foreach((array)$result as $item){
    $lineData[strtotime($item->cr." 00:00:00")] = $item->total_user;
}
//                    $FromDateTimestamp = strtotime($start_date);
//                    $ToDateTimestamp = strtotime($end_date);
$current = 0;
for($i=$FromDateTimestamp;$i<=$ToDateTimestamp;$i+=86400){
    array_push($ValueX,date('d/m',$i));
    if(!empty($lineData[$i])){
        $dataSetUser[] = $lineData[$i];
    }else{
        $dataSetUser[] = $current;
    }
}
$image_url = image_style_url("style_1065x532","public://smQH.png");

?>
<!--<img src="--><?php //echo $image_url; ?><!--" alt="">-->
<canvas style="width: 100%" id="partnerReportChart" data-valuex='<?php echo json_encode($ValueX); ?>' data-set-issue='<?php echo json_encode($dataSetIssue); ?>' data-set-room='<?php echo json_encode($dataSetRoom); ?>' data-set-tiem-nang='<?php echo json_encode($dataSetTiemNang) ?>'data-set-user='<?php echo json_encode($dataSetUser) ?>' ></canvas>
<script>
    let partnerReportxValues = jQuery("#partnerReportChart").attr("data-valuex");
    let partnerReportIssueDataSet = jQuery("#partnerReportChart").attr("data-set-issue");
    // let partnerReportRoomDataSet = jQuery("#partnerReportChart").attr("data-set-room");
    // let partnerReportTiemNangDataSet = jQuery("#partnerReportChart").attr("data-set-tiem-nang");
    let partnerReportUserDataSet = jQuery("#partnerReportChart").attr("data-set-user");

    let _partnerReportChart = document.getElementById('partnerReportChart');
    let partnerReport = new Chart(_partnerReportChart, {
        type: 'scatter',
        data: {
            labels: JSON.parse(partnerReportxValues),
            datasets: [
                {
                    type: 'bar',
                    label: 'Đã bán vé',
                    data: JSON.parse(partnerReportIssueDataSet),
                    fill: false,
                    borderColor: '#2BD22B',
                    backgroundColor: '#2BD22B'
                },
                // {
                //     type: 'bar',
                //     label: 'Đã bán phòng',
                //     data: JSON.parse(partnerReportRoomDataSet),
                //     fill: false,
                //     borderColor: '#00AAFF',
                //     backgroundColor: '#00AAFF'
                // },
                // {
                //     type: 'line',
                //     label: 'Tiềm năng',
                //     data: JSON.parse(partnerReportTiemNangDataSet),
                //     fill: false,
                //     borderColor: 'grey',
                //     backgroundColor: 'grey'
                // },
                {
                    type: 'line',
                    label: 'Tổng đăng ký',
                    data: JSON.parse(partnerReportUserDataSet),
                    fill: false,
                    borderColor: '#FDC018',
                    backgroundColor: '#FDC018'
                },
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
            }
        }
    });
</script>