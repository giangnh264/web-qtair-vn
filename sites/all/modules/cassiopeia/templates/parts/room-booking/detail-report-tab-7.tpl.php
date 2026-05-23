
<?php
$date_filter = !empty($_REQUEST['date_filter'])?$_REQUEST['date_filter']:"today";
$caches['date_filter'] = $date_filter;
try {
    $query = db_select("tbl_tran_kind","tbl_tran_kind");
    $query->fields("tbl_tran_kind");
    $tran_kinds = $query->execute()->fetchAll();
}catch (Exception $e){

}
$index=1;
$total = 0;
?>
<form id="detail-report-tab-7-form" action="" method="get">
   <div class="row">
       <div class="form-item col-sm-2">
           <label for="">Chọn tháng</label>
           <select name="date_filter" id="" class="form-control">
               <option <?php if($caches['date_filter']=="all") print("selected"); ?> value="all">Tất cả</option>
               <option <?php if($caches['date_filter']=="today") print("selected"); ?> value="today">Trong ngày</option>
               <option <?php if($caches['date_filter']=="yesterday") print("selected"); ?> value="yesterday">Hôm qua</option>
               <option <?php if($caches['date_filter']=="thismonth") print("selected"); ?> value="thismonth">Trong tháng</option>
               <option <?php if($caches['date_filter']=="other") print("selected"); ?> value="other">Theo ngày</option>
           </select>
       </div>
       <div class="date-picker from-date col-sm-2">
           <label for="">Từ ngày</label>
           <input type="text" name="from_date" class="form-control" autocomplete="off" value="<?php print(isset($_REQUEST['from_date'])?$_REQUEST['from_date']:""); ?>">
       </div>
       <div class="date-picker to-date col-sm-2">
           <label for="">Đến ngày</label>
           <input type="text" name="to_date" class="form-control" autocomplete="off" value="<?php print(isset($_REQUEST['to_date'])?$_REQUEST['to_date']:""); ?>">
       </div>
   </div>
</form>
<div class="table-responsive">
    <table class="table hover stripped" style="width:50%">
        <thead>
        <tr>
            <th>STT</th>
            <th>Loại</th>
            <th width="20%">Số tiền</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($tran_kinds as $tran_kind): ?>
            <?php
            $result = null;
            if($tran_kind->kind=="issue"){
//                    _print_r($tran_kind);
                $query = db_select("tbl_issue_report","tbl_issue_report");
                $query->fields("tbl_issue_report");
                $query->condition("tbl_issue_report.tran_kind",$tran_kind->id);
                $query->join("users","tbl_users","tbl_users.uid=tbl_issue_report.agent");
                $query->join("field_data_field_account_sale","tbl_sale","tbl_sale.entity_id=tbl_issue_report.agent");
                $query->addExpression("SUM(tbl_issue_report.partner_price)","total_amount");
                $query->groupBy("tbl_issue_report.tran_kind");
                if(!empty($caches['date_filter'] && $caches['date_filter']!="all")){
                    if($caches['date_filter']!='other'){
                        switch ($caches['date_filter']){
                            case "today" :
                                $first_day_of_moth = strtotime(date('Y-m-d 00:00',REQUEST_TIME));
                                $last_day_of_moth = strtotime(date("Y-m-d 23:59",REQUEST_TIME));
                                $query->condition("tbl_issue_report.date",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
                                break;
                            case "yesterday" :
                                $first_day_of_moth = strtotime(date('Y-m-d 00:00',REQUEST_TIME-86400));
                                $last_day_of_moth = strtotime(date("Y-m-d 23:59",REQUEST_TIME-86400));
                                $query->condition("tbl_issue_report.date",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
                                break;
                            case "thismonth" :
                                $first_day_of_moth = strtotime(date('Y-m-01 00:00',REQUEST_TIME));
                                $last_day_of_moth = strtotime(date("Y-m-t 23:59",REQUEST_TIME));
                                $query->condition("tbl_issue_report.date",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
                                break;
                        }
                    }else{
                        $first_day_of_moth = strtotime(date('Y-m-d 00:00',strtotime($_REQUEST['from_date'])));
                        $last_day_of_moth = strtotime(date("Y-m-d 23:59",strtotime($_REQUEST['to_date'])));
                        $query->condition("tbl_issue_report.date",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
                    }

                }
                $result = $query->execute()->fetchObject();
            }elseif($tran_kind->kind=="payment"){
                $query = db_select("tbl_payment_report","tbl_payment_report");
                $query->fields("tbl_payment_report");
                $query->condition("tbl_payment_report.tran_kind",$tran_kind->id);
                $query->addExpression("SUM(tbl_payment_report.amount)","total_amount");
                $query->groupBy("tbl_payment_report.tran_kind");
                if(!empty($caches['date_filter'] && $caches['date_filter']!="all")){
                    if($caches['date_filter']!='other'){
                        switch ($caches['date_filter']){
                            case "today" :
                                $first_day_of_moth = strtotime(date('Y-m-d 00:00',REQUEST_TIME));
                                $last_day_of_moth = strtotime(date("Y-m-d 23:59",REQUEST_TIME));
                                $query->condition("tbl_payment_report.date",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
                                break;
                            case "yesterday" :
                                $first_day_of_moth = strtotime(date('Y-m-d 00:00',REQUEST_TIME-86400));
                                $last_day_of_moth = strtotime(date("Y-m-d 23:59",REQUEST_TIME-86400));
                                $query->condition("tbl_payment_report.date",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
                                break;
                            case "thismonth" :
                                $first_day_of_moth = strtotime(date('Y-m-01 00:00',REQUEST_TIME));
                                $last_day_of_moth = strtotime(date("Y-m-t 23:59",REQUEST_TIME));
                                $query->condition("tbl_payment_report.date",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
                                break;
                        }
                    }else{
                        $first_day_of_moth = strtotime(date('Y-m-d 00:00',strtotime($_REQUEST['from_date'])));
                        $last_day_of_moth = strtotime(date("Y-m-d 23:59",strtotime($_REQUEST['to_date'])));
                        $query->condition("tbl_payment_report.date",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
                    }

                }
                $result = $query->execute()->fetchObject();
            }

            ?>
            <tr>
                <td><?php print($index); ?></td>
                <td><?php print($tran_kind->name); ?></td>
                <?php if($tran_kind->type==1): ?>
                    <?php if(!empty($result)) $total+=$result->total_amount; ?>
                    <td class="<?php print($tran_kind->type==1?"plus":"minus"); ?> text-right hidden-xs"><?php if(!empty($result)) print(number_format(abs($result->total_amount    ),0,",",",")); ?></td>
                <?php else: ?>
                    <?php if(!empty($result)) $total-=$result->total_amount; ?>
                    <td class="<?php print($tran_kind->type==1?"plus":"minus"); ?> text-right hidden-xs"><?php if(!empty($result)) print("- ".number_format(abs($result->total_amount    ),0,",",",")); ?></td>
                <?php endif; ?>
            </tr>
            <?php $index++; ?>
        <?php endforeach; ?>
        <tr>
            <td colspan="2">Tổng</td>
            <td class="text-right" style="font-weight: bold;"><?php print(number_format($total,0,",",",")); ?></td>
        </tr>
        </tbody>
    </table>
</div>
