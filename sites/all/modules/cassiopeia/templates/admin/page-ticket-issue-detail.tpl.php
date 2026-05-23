<?php
global $user;
//    db_update("tbl_booking")->fields(array("pnr_code"=>"123123"))->condition("booking_code","AUT1583998029")->execute();

    $issue = array();
    if(!empty($_REQUEST['pnr_code'])){
        try{
//            $query = db_select("tbl_booking","tbl_issue");
//            $query -> fields("tbl_issue");
//            $bookings = $query -> execute() -> fetchAll();
//            print_r($bookings);

            $query = db_select("tbl_issue","tbl_issue");
            $query -> fields("tbl_issue");
            $query -> join("tbl_booking","tbl_booking","tbl_booking.booking_code = tbl_issue.booking_code");
            $query -> fields("tbl_booking");
            $query -> join("tbl_ticket","tbl_ticket","tbl_ticket.booking_code = tbl_issue.booking_code");
            $query -> fields("tbl_ticket");
            $query -> addField("tbl_issue","status","issue_status");
            $query -> addField("tbl_booking","created","booking_created");
            $query -> addField("tbl_booking","uid","user_booking_id");
            $query -> addField("tbl_issue","created","issue_created");
            $query -> condition("tbl_issue.pnr_code",$_REQUEST['pnr_code']);
            $issue = $query -> execute() -> fetchAssoc();
        }catch (Exception $e){
            print_r($e);
        }
    }
    if(!empty($issue)){
        $ticket = unserialize($issue['ticket']);
        $partner = user_load($issue['user_booking_id']);
        $booker = user_load($issue['booker']);
//        print_r($ticket);
    }
?>
<!--<pre>-->
<!--    --><?php //print_r($issue); ?>
<!--    --><?php //print_r($ticket); ?>
<!--</pre>-->
<div class="page-issue-detail">
    <div class="header-block">
        <form action="">
            <input name="pnr_code" type="text" placeholder="PNR khác"> <button type="submit"><span class="fa fa-search"></span> </button>
        </form>
        <div>
            <button><i class="fa fa-pencil-square-o"></i></button>
            <button><i class="fa fa-envelope-o"></i></button>
            <button><i class="fa fa-eye"></i></button>
        </div>
    </div>
    <div class="block-content">
        <div class="left-block">
            <div class="item">
                <label for="">Mã giao dịch: </label>
                <span><?php print(!empty($issue['booking_code'])?$issue['booking_code']:""); ?></span>
            </div>
            <div class="item">
                <label for="">Mã CTV:</label>
                <span><?php print(!empty($partner->field_account_code['und'][0]['value'])?$partner->field_account_code['und'][0]['value']:""); ?></span>
            </div>
            <div class="item">
                <label for="">Họ tên CTV:</label>
                <span><?php print(!empty($partner->field_account_full_name['und'][0]['value'])?$partner->field_account_full_name['und'][0]['value']:""); ?></span>
            </div>
            <div class="item">
                <label for="">Số điện thoại:</label>
               <span><?php print($partner->name); ?></span>
            </div>
            <div class="item">
                <label for="">Email:</label>
               <span><?php print($partner->mail); ?></span>
            </div>
            <div class="item">
                <label for="">Ghi Chú:</label>
               <span></span>
            </div>
        </div>
        <div class="right-block">
            <div class="item">
                <label for="">PNR:</label>
               <span><?php print(!empty($issue['pnr_code'])?$issue['pnr_code']:""); ?></span>
            </div>
            <div class="item">
                <label for="">Trạng thái vé:</label>
               <span><?php print(!empty($issue['issue_status'])?$issue['issue_status']:""); ?></span>
            </div>
            <div class="item">
                <label for="">Ngày book:</label>
               <span><?php print(!empty($issue['booking_created'])?date("d/m/Y H:i",$issue['booking_created']):""); ?></span>
            </div>
            <div class="item">
                <label for="">Ngày hết hạn:</label>
               <span><?php print(!empty($issue['ExpiryDt'])?date("d/m/Y H:i",$issue['ExpiryDt']):""); ?></span>
            </div>
            <div class="item">
                <label for="">Ngày xuất vé:</label>
               <span><?php print(!empty($issue['issue_created'])?date("d/m/Y H:i",$issue['ExpiryDt']):""); ?></span>
            </div>
            <div class="item">
                <label for="">Booker:</label>
                <span><?php print(!empty($booker->field_account_full_name['und'][0]['value'])?$booker->field_account_full_name['und'][0]['value']:""); ?></span>
            </div>
        </div>
    </div>
    <div class="itinerary">
        <table class="table table-hovered">
            <thead>
                <th>TT</th>
                <th>PNR</th>
                <th>TKT Num</th>
                <th>Logo</th>
                <th>Số hiệu</th>
                <th>Hạng vé</th>
                <th>Từ</th>
                <th>Đến</th>
                <th>Thời gian đi</th>
                <th>Thời gian đến</th>
                <th>Sửa hành trình</th>
            </thead>
            <tbody>
                <?php
                    $_query = db_select("tbl_issue_detail","tbl_issue_detail");
                    $_query -> fields("tbl_issue_detail");
                    $_query -> condition("pnr_code",$issue['pnr_code']);
                    $issues = $_query -> execute() -> fetchAll();
                ?>
                <?php if(!empty($issues)): $stt=1;?>
                    <?php foreach($issues as $issue): ?>
                        <tr>
                            <td><?php print($stt); ?></td>
                            <td><?php print($issue->pnr_code); ?></td>
                            <td><?php print($issue->ticket_number); ?></td>
                            <td><?php print($issue->pnr_code); ?></td>
                            <td><?php print($issue->pnr_code); ?></td>
                            <td><?php print($issue->pnr_code); ?></td>
                            <td><?php print($issue->pnr_code); ?></td>
                            <td><?php print($issue->pnr_code); ?></td>
                            <td><?php print($issue->pnr_code); ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php $stt++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="customer-service">
        <table class="table table-hovered">
            <thead>
                <th>TT</th>
                <th>Logo</th>
                <th>Họ tên</th>
                <th>Loại GD</th>
                <th>SL</th>
                <th>Giá bán</th>
                <th>Giá CTV</th>
                <th>Giá gốc</th>
                <th>Điểm thưởng</th>
                <th>Phiếu thu</th>
                <th>Sửa thông tin</th>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>