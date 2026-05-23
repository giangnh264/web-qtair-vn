<?php
//phpinfo();
//die;
//define('DRUPAL_ROOT', getcwd());
//require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
//drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
//require_once DRUPAL_ROOT . '/includes/password.inc';
//global $user;
//$user = user_load(1);
//
//$newhash = user_hash_password('trungnh@qtair.vn');
//$user->pass = $newhash;
//user_save($user);

$sendMailData = array();
$sendMailData['PNRCode'] = "6FZBV5";
$sendMailData['AirlineCode'] = "QH";
$sendMailData['Language'] = "VN";
$sendMailData['Emails'] = "huutrungdc@gmail.com";
//$sendmail = cassiopeia_qt_meta_SendMail($sendMailData);
//_print_r($sendmail);
//echo 1233;
die;
//$user = user_load(18586);
//try{
//  $query = db_select("tbl_issue","tbl_issue");
//  $query->fields("tbl_issue");
//  $query->orderBy("created","DESC");
//  $result = $query->execute()->fetchAll();
//  _print_r($result);
//}catch (Exception $e){
//  _print_r($e);
//}
$log = new stdClass();
$log->uid = !empty($user->uid) ? $user->uid : 0;
$log->created = REQUEST_TIME;
$log->changed = REQUEST_TIME;
$log->function = "test";
$log->client_ip = get_client_ip();
//cassiopeia_ticket_meta_request_log($log);
//$query = db_select("cassiopeia_ticket_meta_request_log","cassiopeia_ticket_meta_request_log");
//$query->fields("cassiopeia_ticket_meta_request_log");
//$query->addExpression("COUNT(id)","COUNT");
////$query->condition("tid",0);
//$result = $query->execute()->fetchObject();
//print_r(($result));
//?>