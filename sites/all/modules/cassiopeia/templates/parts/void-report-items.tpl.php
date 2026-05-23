<?php
$datas = !empty($variables['data'])?$variables['data']:null;
$page = isset($datas->page)?$datas->page:1;
if(!empty($datas)){
    $caches['tran_kind'] = $datas->tran_kind;
    $caches['PNR'] = $datas->PNR;
    $caches['agent'] = $datas->agent;
    $caches['tran_user'] = $datas->tran_user;
    $caches['content'] = $datas->content;
    $caches['date_filter'] = $datas->date_filter;
    $caches['from_date'] = $datas->from_date;
    $caches['to_date'] = $datas->to_date;
}
$query = db_select("tbl_ticket_void","tbl_ticket_void");
$query->fields("tbl_ticket_void");
$query->join("field_data_field_account_transaction_name","field_account_transaction_name","field_account_transaction_name.entity_id=tbl_ticket_void.tran_user");
$query->addField("field_account_transaction_name","field_account_transaction_name_value","transaction_name");
if(!empty($caches['tran_user']) && $caches['tran_user']!="all"){
    $query->condition("tran_user",$caches['tran_user']);

}
if(!empty($caches['PNR']&& $caches['PNR']!="all")){
    $query->condition("pnr_code",$caches['PNR']);

}
if(!empty($caches['date_filter']&& $caches['date_filter']!="all")){
    switch ($caches['date_filter']){
        case "today" :
            $query->condition("created",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME)),strtotime(date("d-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
            break;
        case "yesterday" :
            $query->condition("created",array(strtotime(date("d-m-Y 00:00",REQUEST_TIME-86400)),strtotime(date("d-m-Y 23:59",REQUEST_TIME-86400))),"BETWEEN");
            break;
        case "thismonth" :
            $query->condition("created",array(strtotime(date("01-m-Y 00:00",REQUEST_TIME)),strtotime(date("t-m-Y 23:59",REQUEST_TIME))),"BETWEEN");
            break;
        case "other":
            if(!empty($caches['from_date'])){
                $query->condition("created",strtotime($caches['from_date']),">");
            }
            if($caches['to_date']){
                $query->condition("created",strtotime($caches['to_date']),"<");
            }
            break;
    }
}elseif($caches['date_filter']=="other"){
    if(!empty($caches['payment_report_from_date']&& $caches['payment_report_from_date']!="")){
        $query->condition("created",strtotime(date("d-m-Y 00:00",strtotime($caches['payment_report_from_date']))),">=");
    }
    if(!empty($caches['payment_report_to_date']&& $caches['payment_report_to_date']!="")){
        $query->condition("created",strtotime(date("d-m-Y 23:59",strtotime($caches['payment_report_to_date']))),"<=");
    }
}
$query->orderBy("created","DESC");
$result = $query->execute()->fetchAll();
$total_items = count($result);
$limit = 50;
$offset = $limit * ($page-1);
if(!empty($result)){
    $result = array_slice($result, $offset, $limit);
}else{
    $result=null;
}

$page_count = ceil($total_items/$limit);
?>
<table class="table table-hover table-stripped">
    <thead>
    <tr>
        <th>Ngày thực hiện</th>
        <th>PNR CODE</th>
        <th>Người thực hiện</th>
        <th> Trạng thái</th>
    </tr>
    </thead>
    <tbody>
    <?php if(!empty($result)): ?>
        <?php foreach($result as $value): ?>
            <tr>
                <td><?php print(date("d/m/Y H:i",$value->created)); ?></td>
                <td><?php echo($value->pnr_code); ?></td>
                <td><?php echo($value->transaction_name);    ?></td>
                <td><?php echo($value->status);    ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>
<div class="ajax-pagination">
    <div class="ajax-pagination-container">
        <ul>
            <?php if($page_count<=3): ?>
                <?php for($i=1;$i<=$page_count;$i++): ?>
                    <li><span class="ajax-item <?php if($page==$i) print("active"); ?>" data-page="<?php print($i); ?>"><?php print($i); ?></span></li>
                <?php endfor; ?>
            <?php else: ?>
                <?php if($page<=2): ?>
                    <?php for($i=1;$i<=3;$i++): ?>
                        <li><span class="ajax-item <?php if($page==$i) print("active"); ?>" data-page="<?php print($i); ?>"><?php print($i); ?></span></li>
                    <?php endfor; ?>
                    <li><span class="">...</span></li>
                    <li><span class="ajax-item fa fa-angle-right" data-page="<?php print($page+1); ?>"></span></li>
                    <li><span class="ajax-item fa fa-angle-double-right" data-page="<?php print($page_count); ?>"></span></li>
                <?php else: ?>
                    <?php if($page>=$page_count-1): ?>
                        <li><span class="ajax-item fa fa-angle-double-left" data-page="<?php print(1); ?>"></span></li>
                        <li><span class="ajax-item fa fa-angle-left" data-page="<?php print($page-1); ?>"></span></li>
                        <li><span class="">...</span></li>
                        <?php for($i=$page_count-2;$i<=$page_count;$i++): ?>
                            <li><span class="ajax-item <?php if($page==$i) print("active"); ?>" data-page="<?php print($i); ?>"><?php print($i); ?></span></li>
                        <?php endfor; ?>
                    <?php else: ?>
                        <li><span class="ajax-item fa fa-angle-double-left" data-page="<?php print(1); ?>"></span></li>
                        <li><span class="ajax-item fa fa-angle-left" data-page="<?php print($page-1); ?>"></span></li>
                        <li><span class="">...</span></li>
                        <?php for($i=$page-1;$i<=$page+1;$i++): ?>
                            <li><span class="ajax-item <?php if($page==$i) print("active"); ?>" data-page="<?php print($i); ?>"><?php print($i); ?></span></li>
                        <?php endfor; ?>
                        <li><span class="">...</span></li>
                        <li><span class="ajax-item fa fa-angle-right" data-page="<?php print($page+1); ?>"></span></li>
                        <li><span class="ajax-item fa fa-angle-double-right" data-page="<?php print($page_count); ?>"></span></li>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
        </ul>
    </div>
</div>