<?php
function cassiopeia_ticket_booking_update_page_callback(){
    $cassiopeia_ticket_booking_update_form = drupal_get_form("cassiopeia_ticket_booking_update_form");
    if(!empty($cassiopeia_ticket_booking_update_form)){
        $cassiopeia_ticket_booking_update_form = drupal_render($cassiopeia_ticket_booking_update_form);
        return $cassiopeia_ticket_booking_update_form;
    }
}
function cassiopeia_ticket_issue_page_callback(){
    return _cassiopeia_render_theme('module', 'cassiopeia_ticket', 'templates/admin/page-ticket-issue.tpl.php');
}
function cassiopeia_ticket_booking_alepay_cancel_page_callback(){
    $booking = cassiopeia_qt_ticket_booking_load_by_transactionCode($_REQUEST['transactionCode']);
    if(!empty($booking)){
        $booking->errorCode = $_REQUEST['errorCode'];
        $booking->status="FAIL";
        cassiopeia_qt_ticket_booking_save($booking);
    }
    drupal_set_message("Giao dịch đã bị hủy!");
    drupal_goto("hotel");
}
function cassiopeia_ticket_booking_alepay_complete_page_callback(){
    $_booking = cassiopeia_qt_ticket_booking_load_by_transactionCode($_REQUEST['transactionCode']);
    $transaction = cassiopeia_qt_alepay_transaction_load($_REQUEST['transactionCode']);
    if(empty($transaction)){
        if(!empty($_booking)&&$_booking->status!=="TICKETED"){
            $_booking->errorCode = $_REQUEST['errorCode'];
            $transaction = new stdClass();
            $transaction->uid = 0;
            $transaction->errorCode = $_REQUEST['errorCode'];
            $transaction->transactionCode = $_REQUEST['transactionCode'];
            $transaction->cancel = $_REQUEST['cancel'];
            $transaction->reference_type = 1;
            $transaction->reference = $_booking->booking_code;
            cassiopeia_qt_alepay_transaction_save($transaction);
            if($_REQUEST['errorCode']==000){
                $Departure = $_booking->tickets[0];
                $Return = !empty($_booking->tickets[1])?$_booking->tickets[1]:null;
                if(count($_booking->tickets)==1||$Departure->pnr_code==$Return->pnr_code){
                    $query = db_select("tbl_issue_report","tbl_issue_report");
                    $query->fields("tbl_issue_report");
                    $query->condition("PNR",$_booking->tickets[0]->pnr_code);
                    $check = $query->execute()->fetchAll();
                    if(empty($check)){
                        $total_service_fee = 0;
                        $total_service_fee+=$_booking->tickets[0]->service_fee*($_booking->adt+$_booking->chd);
                        if(!empty($Return)){
                            $total_service_fee*=2;
                        }
                        $_log = new stdClass();
                        $_log->uid = 0;
                        $_log->pnr_code = $_booking->tickets[0]->pnr_code;
                        $_log->booking_code = $_booking->booking_code;
                        $_log->status = "PENDING";
                        $_log->error_code = "";
                        $_log->message = "Thực hiện xuất vé";
                        $_log->booking_image = "";
                        $_log->note = "";
                        $_log->issue_type = 3;

                        $dataResponseFromMeta = "dataResponseFromMeta";
                        $_data = new stdClass();
                        $_data->PNRCode = $_booking->tickets[0]->pnr_code;
                        $_data->AirlineCode = $_booking->tickets[0]->AirlineCode;

                        $issue_response = cassiopeia_meta_api_issue($_data);
//                    $issue_response = new stdClass();
//                    $issue_response->Code=0;
                        $dataResponseFromMeta = serialize($issue_response);
                        if ($issue_response->Code==0 || $issue_response->Code== "0") { // xuất thành công
                            $insertData = new stdClass();
                            $insertData->partner_price = $_booking->price;
                            $insertData->price = $_booking->price - $total_service_fee;
                            $insertData->agent = 0;
                            $insertData->tran_kind = 4;
                            $insertData->quantity = $_booking->adt + $_booking->chd;
                            $insertData->PNR = $_booking->tickets[0]->pnr_code;
                            $insertData->date = REQUEST_TIME;
                            $insertData->airline = $_booking->tickets[0]->AirlineCode;
                            $insertData->content = "Thanh toán Alepay " .$_REQUEST['transactionCode'];
                            $insertData->booking_code = $_booking->booking_code;
                            $insertData->booking = $_booking;
                            cassiopeia_create_issue_report($insertData);

                            $sendMailData = array();
                            $sendMailData['PNRCode'] = $_data->PNRCode;
                            $sendMailData['AirlineCode'] = $_data->AirlineCode;
                            $sendMailData['Language'] = "VN";
                            $sendMailData['Emails'] = $_booking->contact_Email;
                            $sendmail = cassiopeia_qt_meta_SendMail($sendMailData);

                            $_log->message = "Xuất vé sau khi thanh toán Alepay";
                            $_booking->status = "TICKETED";
                        }else{
                            $_booking->status = "TICKET_FAIL";
                        }
                        $_log->status = $issue_response->Code;
                        $_log->note = serialize($dataResponseFromMeta);
                        cassiopeia_ticket_issue_log_save($_log);
                        $saved = cassiopeia_qt_ticket_booking_save($_booking);
                    }
                }else{
                    foreach($_booking->tickets as $key => $ticket){
                        $query = db_select("tbl_issue_report","tbl_issue_report");
                        $query->fields("tbl_issue_report");
                        $query->condition("PNR",$ticket->pnr_code);
                        $check = $query->execute()->fetchAll();
                        if(empty($check)){
                            $total_service_fee = 0;
                            $total_service_fee+=$ticket->service_fee*($_booking->adt+$_booking->chd);

                            $_log = new stdClass();
                            $_log->uid = 0;
                            $_log->pnr_code = $ticket->pnr_code;
                            $_log->booking_code = $_booking->booking_code;
                            $_log->status = "PENDING";
                            $_log->error_code = "";
                            $_log->message = "Thực hiện xuất vé RT";
                            $_log->booking_image = "";
                            $_log->note = "";
                            $_log->issue_type = 3;

                            $dataResponseFromMeta = "dataResponseFromMeta";
                            $_data = new stdClass();
                            $_data->PNRCode = $ticket->pnr_code;
                            $_data->AirlineCode = $ticket->AirlineCode;

                            $issue_response = cassiopeia_meta_api_issue($_data);
//                    $issue_response = new stdClass();
//                    $issue_response->Code=0;
                            $dataResponseFromMeta = serialize($issue_response);
                            if ($issue_response->Code==0 || $issue_response->Code== "0") { // xuất thành công
                                $insertData = new stdClass();
                                $insertData->partner_price = $ticket->TotalPrice+$total_service_fee;
                                $insertData->price = $ticket->TotalPrice;
                                $insertData->agent = 0;
                                $insertData->tran_kind = 4;
                                $insertData->quantity = $_booking->adt + $_booking->chd;
                                $insertData->PNR = $ticket->pnr_code;
                                $insertData->date = REQUEST_TIME;
                                $insertData->airline = $ticket->AirlineCode;
                                $insertData->content = "Thanh toán Alepay " . $_booking->booking_code;
                                $insertData->booking = $_booking;
                                cassiopeia_create_issue_report($insertData);
                                $sendMailData = array();
                                $sendMailData['PNRCode'] = $_data->PNRCode;
                                $sendMailData['AirlineCode'] = $_data->AirlineCode;
                                $sendMailData['Language'] = "VN";
                                $sendMailData['Emails'] = $_booking->contact_Email;
                                $sendmail = cassiopeia_qt_meta_SendMail($sendMailData);
                                $_log->message = "Xuất vé sau khi thanh toán Alepay RT";
                                $_booking->status = "TICKETED";
                            }else{
                                $_booking->status = "TICKET_FAIL";
                            }
                            $_log->status = $issue_response->Code;
                            $_log->note = serialize($dataResponseFromMeta);
                            cassiopeia_ticket_issue_log_save($_log);
                        }
                    }
                    $saved = cassiopeia_qt_ticket_booking_save($_booking);
                }

            }
//        cassiopeia_room_booking_save($booking);
        }
    }
    drupal_goto("booking/view/".$_booking->booking_code);
}