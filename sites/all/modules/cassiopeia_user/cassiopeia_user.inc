<?php
function cassiopeia_user_agent_point_report_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/page-point-report.tpl.php");
}
function cassiopeia_ticketIssue_call_back() {
    return _cassiopeia_render_theme("module","cassiopeia_user","templates/pages/page-ticket-issue.tpl.php");
}
function cassiopeia_user_manager_customer_delete_page_callback($customer) {
  return _cassiopeia_render_theme('module', 'cassiopeia_user', 'templates/pages/user-manager-customer-delete.tpl.php',array("customer"=>$customer));
}
function cassiopeia_user_manager_customer_edit_page_callback($customer) {
  return _cassiopeia_render_theme('module', 'cassiopeia_user', 'templates/pages/user-manager-customer-edit.tpl.php',array("customer"=>$customer));
}
function cassiopeia_user_issue_call_back() {
  return _cassiopeia_render_theme('module', 'cassiopeia_user', 'templates/pages/user-issue-report.tpl.php');
}
function cassiopeia_user_manager_customer_add_page_callback() {
  return _cassiopeia_render_theme('module', 'cassiopeia_user', 'templates/pages/user-manager-customer-add.tpl.php');
}
function cassiopeia_user_manager_create_booking_page_callback() {
  return _cassiopeia_render_theme('module', 'cassiopeia_user', 'templates/pages/user-create-booking.tpl.php');
}
function cassiopeia_user_manager_gift_page_callback() {
  return _cassiopeia_render_theme('module', 'cassiopeia', 'templates/pages/page-gift.tpl.php');
}
function cassiopeia_user_manager_balance_report_page_callback() {
  return _cassiopeia_render_theme('module', 'cassiopeia', 'templates/user/page-agent-report.tpl.php');
}
function cassiopeia_user_manager_transaction_history_page_callback() {
  return _cassiopeia_render_theme('module', 'cassiopeia', 'templates/admin/page-payment-report.tpl.php');
}
function cassiopeia_user_manager_dashboard_page_callback() {
  return _cassiopeia_render_theme('module', 'cassiopeia_user', 'templates/pages/user-dashboard.tpl.php');
}
function cassiopeia_user_manager_customer_page_callback() {
  return _cassiopeia_render_theme('module', 'cassiopeia_user', 'templates/pages/user-manager-customer.tpl.php');
}
function cassiopeia_user_manager_booking_page_callback() {
  return _cassiopeia_render_theme('module', 'cassiopeia_user', 'templates/pages/user-manager-booking.tpl.php');
}
function cassiopeia_user_manager_notify_callback() {
  return _cassiopeia_render_theme('module', 'cassiopeia', 'templates/admin/page-user-notify.tpl.php');
}
function cassiopeia_user_user_change_password_page($account) {
  return _cassiopeia_render_theme('module', 'cassiopeia_user', 'templates/pages/user_change_password_page.tpl.php', array('account' => $account));
}
function cassiopeia_user_user_topup_page($account) {
  return _cassiopeia_render_theme('module', 'cassiopeia_user', 'templates/pages/user_topup_page.tpl.php', array('account' => $account));
}
function cassiopeia_user_manager_room_booking_page_callback() {
  return _cassiopeia_render_theme('module', 'cassiopeia_user', 'templates/pages/user-manager-room-booking.tpl.php');
}
//function cassiopeia_ticketIssue_call_back() {
//    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/page-manager-ticket-issue.tpl.php");
//}
function cassiopeia_ticketReview_call_back() {
  return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/page-manager-ticket-review.tpl.php");
}