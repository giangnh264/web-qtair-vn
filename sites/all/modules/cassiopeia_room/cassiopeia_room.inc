<?php
function cassiopeia_room_booking_alepay_cancel_page_callback(){
    $booking = cassiopeia_room_booking_load_by_transactionCode($_REQUEST['transactionCode']);
    if(!empty($booking)){
        $booking->errorCode = $_REQUEST['errorCode'];
        $booking->status=4;
        cassiopeia_room_booking_save($booking);
    }
    drupal_set_message("Giao dịch đã bị hủy!");
    drupal_goto("hotel");
}
function cassiopeia_room_booking_alepay_complete_page_callback(){
    global $user;
    $booking = cassiopeia_room_booking_load_by_transactionCode($_REQUEST['transactionCode']);
    if(!empty($booking)){
        $booking->errorCode = $_REQUEST['errorCode'];
        $transaction = new stdClass();
        $transaction->uid = 0;
        $transaction->errorCode = $_REQUEST['errorCode'];
        $transaction->transactionCode = $_REQUEST['transactionCode'];
        $transaction->cancel = $_REQUEST['cancel'];
        $transaction->reference_type = 2;
        $transaction->reference = $booking->code;
        cassiopeia_qt_alepay_transaction_save($transaction);
        if($_REQUEST['errorCode']==000){
            $booking->status=3;
            $_agent = user_load($booking->uid);
            try{
                $balance = $_agent->field_account_balance['und'][0]['value'];
                $balance-=$booking->partner_price;
                db_insert("tbl_room_booking_report")->fields(array(
                    "created"   => REQUEST_TIME,
                    "booking_code"   => $booking->code,
                    "hotel"   => $booking->hotel,
                    "guest"   => $booking->guest,
                    "night"   => $booking->total_night,
                    "price"   => $booking->net_price,
                    "partner_price"   => $booking->partner_price,
                    "revenue"   => $booking->partner_price-$booking->net_price,
                    "agent"   => $booking->uid,
                    "tran_user"   => $_agent->uid,
                    "tran_kind"   => 15,
                    "tran_code"   => REQUEST_TIME,
                    "balance"   => $balance,
                    "quantity_night"   => $booking->total_quantity_night,
                    "category"         => "room_booking",
                    "note"         => "Thanh toán Alepay ".$_REQUEST['transactionCode'],
                ))->execute();
                db_insert("tbl_report")->fields(array(
                    "created"           => REQUEST_TIME,
                    "tran_code"         => REQUEST_TIME,
                    "type"         => "room_booking",
                ))->execute();
                $query = db_select("tbl_issue_report","tbl_issue_report");
                $query->fields("tbl_issue_report");
                $query->condition("agent",$booking->uid);
                $query->condition("date",strtotime(date("d-m-Y 00:00",strtotime("01-09-2020"))),">=");
                $query->addExpression("SUM(partner_price)","total");
                $query->groupBy("agent");
                $result = $query->execute()->fetchObject();
                $query1 = db_select("tbl_room_booking_report","tbl_room_booking_report");
                $query1->fields("tbl_room_booking_report");
                $query1->condition("agent",$booking->uid);
                $query1->addExpression("SUM(partner_price)","total");
                $query1->groupBy("agent");
                $result1 = $query1->execute()->fetchObject();
                $total = $result->total;
                if(!empty($result1)){
                    $total+=$result1->total;
                }
                $point = ceil($total/1000000);
                $_agent->field_point['und'][0]['value'] = $point;
                $_agent->field_account_balance['und'][0]['value'] = $balance;
                if($_agent->field_account_status['und'][0]['tid']==22){ //tiềm năng
                    $_agent->field_account_status['und'][0]['tid'] = 13;
                    $_agent->field_account_updated_date['und'][0]['value'] = REQUEST_TIME;
                }
                user_save($_agent);
            }catch (Exception $e){

            }
        }
        cassiopeia_room_booking_save($booking);
        drupal_goto("dat-phong/hoan-tat/".$booking->code);
    }
}
function cassiopeia_room_booking_update_page_callback(){
    $cassiopeia_room_booking_update_form = drupal_get_form("cassiopeia_room_booking_update_form");
    if(!empty($cassiopeia_room_booking_update_form)){
        $cassiopeia_room_booking_update_form = drupal_render($cassiopeia_room_booking_update_form);
        return $cassiopeia_room_booking_update_form;
    }
}