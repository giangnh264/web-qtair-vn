<?php
function cassiopeia_agent_point_report_callback() {
    echo 123;
//    return "123";
//    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/agent-point-report.tpl.php");
}
function cassiopeia_admin_hotel_rating_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/hotel-rating-page.tpl.php");
}
function cassiopeia_edit_booking_vn_callback() {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/page-manager-edit-booking-vn.tpl.php");
}
function cassiopeia_add_segment_callback() {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/page-manager-add-segment.tpl.php");
}
function cassiopeia_cancel_booking_callback() {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/page-manager-cancel-booking.tpl.php");
}
function cassiopeia_void_report_callback() {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/page-void-report.tpl.php");
}
function cassiopeia_admin_manager_user_role_permission_page($role) {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/admin-manager-user-role-permission-page.tpl.php",array("role"=>$role));
}
function cassiopeia_admin_manager_user_permission_page($account) {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/admin-manager-user-permission-page.tpl.php",array("account"=>$account));
}
function cassiopeia_admin_manager_partners_config() {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/page-manager-partners-config.tpl.php");
}
function cassiopeia_manager_contact_callback() {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/page-manager-contact.tpl.php");
}
function cassiopeia_manager_contact_delete_callback($contact) {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/page-manager-contact-delete.tpl.php",array("contact"=>$contact));
}
function cassiopeia_manager_point_call_back() {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/page-manager-point.tpl.php");
}
function cassiopeia_admin_manager_issue_log() {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/page-issue-log.tpl.php");
}
function cassiopeia_agent_report_call_back() {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/page-agent-report.tpl.php");
}
function cassiopeia_payment_report_call_back() {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/page-payment-report.tpl.php");
}
function cassiopeia_issue_report_call_back() {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/page-issue-report.tpl.php");
}
function cassiopeia_ticketVoid_call_back() {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/page-manager-ticket-void.tpl.php");
}
function cassiopeia_ticketIssue_call_back() {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/page-manager-ticket-issue.tpl.php");
}
function cassiopeia_ticketReview_call_back() {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/page-manager-ticket-review.tpl.php");
}
function cassiopeia_admin_manager_room_booking_edit($booking_code) {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/room-booking-edit.tpl.php",array("booking_code"=>$booking_code));
}
function cassiopeia_admin_manager_add_room_booking() {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/room-add-booking.tpl.php");
}
function cassiopeia_admin_manager_room_booking() {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/room-booking.tpl.php");
}
function cassiopeia_admin_manager_booking() {
    global $user;
//    if($user->uid==1){
        return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/manager-ticket-booking.tpl.php");
//    }else{
//        return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/ticket-booking.tpl.php");
//    }
}
function cassiopeia_admin_manager_partners() {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/partner.tpl.php");
}
function cassiopeia_manager_hotel_callback() {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/hotel.tpl.php");
}
function cassiopeia_admin_tx_hotel_call_back() {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/tx-hotel.tpl.php");
}
function cassiopeia_admin_hotel_tx_area_call_back() {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/hotel-tx-area.tpl.php");
}
function cassiopeia_admin_manager_topup_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/manager-topup-page.tpl.php");
}
function cassiopeia_admin_topup_call_back() {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/topup.tpl.php");
}
function cassiopeia_admin_room_report_call_back() {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/room-report.tpl.php");
}
function cassiopeia_admin_ticket_report_call_back() {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/ticket-report.tpl.php");
}
function cassiopeia_admin_general_report_call_back() {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/general-report.tpl.php");
}
function cassiopeia_room_booking_report_call_back() {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/page-room-booking-report.tpl.php");
}



function cassiopeia_admin_manager_room_price() {
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/room-price.tpl.php");
}
function cassiopeia_admin_manager_room(){
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/room.tpl.php");
}
function cassiopeia_admin_administrator_menu_config(){
    return _cassiopeia_render_theme("module","cassiopeia_admin","templates/pages/menu.tpl.php");
}
function cassiopeia_admin_administrator_page_block() {
  $form = drupal_get_form('cassiopeia_admin_administrator_page_block_add');
  $form_load = drupal_get_form('cassiopeia_admin_administrator_page_block_load_all');
  return render($form) . render($form_load);
}

function cassiopeia_admin_administrator_page_block_edit($block) {
  $form = drupal_get_form('cassiopeia_admin_administrator_page_block_add', $block);
  return render($form);
}

function cassiopeia_admin_administrator_page_block_add($form, &$form_state) {
  drupal_add_js(drupal_get_path('module', 'cassiopeia_admin') . '/cassiopeia_admin.js');
  if (!empty($form_state['build_info']['args'][0])) {
    $form['#block'] = $form_state['build_info']['args'][0];
  }
  $form['taoblock'] = array(
    '#type' => 'fieldset',
    '#title' => 'Tạo khối',
  );
  $form['taoblock']['name'] = array(
    '#type' => 'textfield',
    '#title' => 'Tên khối',
    '#required' => TRUE,
    '#default_value' => empty($form['#block']) ? '' : $form['#block']->name,
  );
  $form['taoblock']['icon'] = array(
    '#type' => 'textfield',
    '#title' => 'Icon',
    '#prefix' => '<div id="select-icon">',
    '#suffix' => '<div id="icon-demo"><i class="fa ' . (empty($form['#block']) ? '' : 'customer-icon-' . $form['#block']->icon) . '"></i></div></div>',
    '#required' => TRUE,
    '#default_value' => empty($form['#block']) ? '' : $form['#block']->icon,
  );
  $form['taoblock']['position'] = array(
    '#type' => 'textfield',
    '#title' => 'Vị trí',
    '#required' => TRUE,
    '#default_value' => empty($form['#block']) ? 0 : $form['#block']->position,
  );
  $form['taoblock']['submit'] = array(
    '#type' => 'submit',
    '#value' => empty($form['#block']) ? 'Tạo mới' : 'Cập nhật'
  );
  return $form;
}

function cassiopeia_admin_administrator_page_block_add_validate($form, &$form_state) {
  if (!is_numeric($form_state['values']['position'])) {
    form_set_error('position', 'Vị trí phải là một số nguyên');
  }
}

function cassiopeia_admin_administrator_page_block_add_submit($form, &$form_state) {
  if (empty($form['#block'])) {
    _cassiopeia_admin_block_add(trim($form_state['values']['name']), trim($form_state['values']['icon']), $form_state['values']['position']);
    drupal_set_message('Đã thêm mới khối ' . $form_state['values']['name']);
  }
  else {
    _cassiopeia_admin_block_edit($form['#block'], $form_state['values']);
    drupal_set_message('Đã cập nhật khối ' . $form_state['values']['name']);
    $form_state['redirect'] = 'admin/cassiopeia/administrator/block';
  }
}

function cassiopeia_admin_administrator_page_block_load_all() {
  $sql = "SELECT id, name, icon, position FROM cassiopeia_admin_block ORDER BY position ASC";
  $result = db_query($sql)->fetchAll();
  $rows = array();
  $form['blocks'] = array();
  $form['#tree'] = TRUE;
  $weight_delta = round(count($result) / 2);
  foreach ($result as $item) {
    $form['blocks'][$item->id]['name'] = array(
      '#type' => 'markup',
      '#markup' => $item->name,
    );
    $form['blocks'][$item->id]['icon'] = array(
      '#type' => 'markup',
      '#markup' => theme('cassiopeia_admin_administrator_icon', array('icon' => $item->icon)),
    );
    $form['blocks'][$item->id]['position'] = array(
      '#type' => 'weight',
      '#default_value' => $item->position,
      '#delta' => $weight_delta,
      '#title_display' => 'invisible',
      '#attributes' => array('class' => array('block-weight')),
    );
    $form['blocks'][$item->id]['delete'] = array(
      '#type' => 'link',
      '#title' => 'Xóa',
      '#href' => 'admin/cassiopeia/administrator/block/' . $item->id . '/delete',
    );
    $form['blocks'][$item->id]['edit'] = array(
      '#type' => 'link',
      '#title' => 'Sửa',
      '#href' => 'admin/cassiopeia/administrator/block/' . $item->id . '/edit',
    );
    $form['blocks'][$item->id]['items'] = array(
      '#type' => 'link',
      '#title' => 'Danh sách',
      '#href' => 'admin/cassiopeia/administrator/block/' . $item->id . '/items',
    );
  }
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => 'Lưu thay đổi',
  );
  return $form;
}

function cassiopeia_admin_administrator_page_block_load_all_submit($form, &$form_state) {
  foreach ($form_state['values']['blocks'] as $key => $val) {
    if (is_numeric($key)) {
      _cassiopeia_admin_block_position_update($key, $val);
    }
  }
}

function cassiopeia_admin_administrator_page_block_delete($block) {
  $form = drupal_get_form('cassiopeia_admin_administrator_page_block_delete_form', $block);
  return render($form);
}

function cassiopeia_admin_administrator_page_block_delete_form($form, &$form_state) {
  if (empty($form_state['build_info']['args'][0])) {
    return;
  }
  $form['#block'] = $form_state['build_info']['args'][0];
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => 'Xóa',
    '#prefix' => '<p>Thao tác này không thể phục hồi.</p>',
    '#suffix' => '&nbsp;&nbsp;' . l('Quay lại', 'admin/cassiopeia/administrator/block')
  );
  return $form;
}

function cassiopeia_admin_administrator_page_block_delete_form_submit($form, &$form_state) {
  if (empty($form['#block'])) {
    return;
  }
  db_delete('cassiopeia_admin_block')
    ->condition('id', $form['#block']->id)
    ->execute();
  $form_state['redirect'] = 'admin/cassiopeia/administrator/block';
  drupal_set_message('Đã xóa ' . $form['#block']->name);
}

function cassiopeia_admin_administrator_page_block_items($block) {
  $form_item = drupal_get_form('cassiopeia_admin_administrator_page_block_add_items', $block);
  $form = drupal_get_form('cassiopeia_admin_administrator_page_block_load_items', $block);
  return render($form_item) . render($form);
}

function cassiopeia_admin_administrator_page_block_items_edit($block, $item) {
  $form_item = drupal_get_form('cassiopeia_admin_administrator_page_block_add_items', $block, $item);
  return render($form_item);
}

function cassiopeia_admin_administrator_page_block_add_items($form, &$form_state) {
  drupal_add_js(drupal_get_path('module', 'cassiopeia_admin') . '/cassiopeia_admin.js');
  if (!empty($form_state['build_info']['args'][0])) {
    $form['#block'] = $form_state['build_info']['args'][0];
  }
  if (!empty($form_state['build_info']['args'][1])) {
    $form['#items'] = $form_state['build_info']['args'][1];
  }
  $form['taoitems'] = array(
    '#type' => 'fieldset',
    '#title' => 'Tạo biểu tượng',
  );
  $form['taoitems']['name'] = array(
    '#type' => 'textfield',
    '#title' => 'Tên biểu tượng',
    '#required' => TRUE,
    '#default_value' => empty($form['#items']) ? '' : $form['#items']->name,
  );
  $form['taoitems']['link'] = array(
    '#type' => 'textfield',
    '#title' => 'Đường dẫn',
    '#required' => TRUE,
    '#default_value' => empty($form['#items']) ? '' : $form['#items']->link,
  );
  $form['taoitems']['icon'] = array(
    '#type' => 'textfield',
    '#title' => 'Icon',
    '#prefix' => '<div id="select-icon">',
    '#suffix' => '<div id="icon-demo"><i class="fa ' . (empty($form['#items']) ? '' : 'customer-icon-' . $form['#items']->icon) . '"></i></div></div>',
    '#required' => TRUE,
    '#default_value' => empty($form['#items']) ? '' : $form['#items']->icon,
  );
  $form['taoitems']['position'] = array(
    '#type' => 'textfield',
    '#title' => 'Vị trí',
    '#required' => TRUE,
    '#default_value' => empty($form['#items']) ? 0 : $form['#items']->position,
  );
  $form['taoitems']['submit'] = array(
    '#type' => 'submit',
    '#value' => empty($form['#items']) ? 'Tạo mới' : 'Cập nhật'
  );
  return $form;
}

function cassiopeia_admin_administrator_page_block_add_items_validate($form, &$form_state) {
  if (!is_numeric($form_state['values']['position'])) {
    form_set_error('position', 'Vị trí phải là một số nguyên');
  }
  if (!drupal_valid_path($form_state['values']['link'])) {
    form_set_error('link', 'Đường dẫn không chính xác');
  }
}

function cassiopeia_admin_administrator_page_block_add_items_submit($form, &$form_state) {
  if (empty($form['#items'])) {
    _cassiopeia_admin_block_items_add($form['#block']->id, trim($form_state['values']['name']), $form_state['values']['link'], $form_state['values']['icon'], $form_state['values']['position']);
    drupal_set_message('Đã thêm mới biểu tượng ' . $form_state['values']['name']);
  }
  else {
    _cassiopeia_admin_block_items_edit($form['#items'], $form_state['values']);
    drupal_set_message('Đã cập nhật biểu tượng ' . $form_state['values']['name']);
    $form_state['redirect'] = 'admin/cassiopeia/administrator/block/' . $form['#block']->id . '/items';
  }
}

function cassiopeia_admin_administrator_page_block_load_items($form, &$form_state) {
  $form['#block'] = $form_state['build_info']['args'][0];
  $sql = "SELECT id, name, link, icon, position FROM cassiopeia_admin_items WHERE bid = :bid ORDER BY position ASC";
  $result = db_query($sql, array(':bid' => $form['#block']->id))->fetchAll();
  $rows = array();
  $form['items'] = array();
  $form['#tree'] = TRUE;
  $weight_delta = round(count($result) / 2);
  foreach ($result as $item) {
    $form['items'][$item->id]['name'] = array(
      '#type' => 'markup',
      '#markup' => $item->name,
    );
    $form['items'][$item->id]['link'] = array(
      '#type' => 'markup',
      '#markup' => $item->link,
    );
    $form['items'][$item->id]['icon'] = array(
      '#type' => 'markup',
      '#markup' => theme('cassiopeia_admin_administrator_icon', array('icon' => $item->icon)),
    );
    $form['items'][$item->id]['position'] = array(
      '#type' => 'weight',
      '#default_value' => $item->position,
      '#delta' => $weight_delta,
      '#title_display' => 'invisible',
      '#attributes' => array('class' => array('items-weight')),
    );
    $form['items'][$item->id]['delete'] = array(
      '#type' => 'link',
      '#title' => 'Xóa',
      '#href' => 'admin/cassiopeia/administrator/block/' . $form['#block']->id . '/items/' . $item->id . '/delete',
    );
    $form['items'][$item->id]['edit'] = array(
      '#type' => 'link',
      '#title' => 'Sửa',
      '#href' => 'admin/cassiopeia/administrator/block/' . $form['#block']->id . '/items/' . $item->id . '/edit',
    );
  }
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => 'Lưu thay đổi',
  );
  return $form;
}

function cassiopeia_admin_administrator_page_block_load_items_submit($form, &$form_state) {
  foreach ($form_state['values']['items'] as $key => $val) {
    if (is_numeric($key)) {
      _cassiopeia_admin_block_items_position_update($key, $val);
    }
  }
}

function cassiopeia_admin_administrator_page_block_items_delete($block, $item) {
  $form = drupal_get_form('cassiopeia_admin_administrator_page_block_items_delete_form', $block, $item);
  return render($form);
}

function cassiopeia_admin_administrator_page_block_items_delete_form($form, &$form_state) {
  if (empty($form_state['build_info']['args'][0]) && empty($form_state['build_info']['args'][1])) {
    return;
  }
  $form['#block'] = $form_state['build_info']['args'][0];
  $form['#item'] = $form_state['build_info']['args'][1];
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => 'Xóa',
    '#prefix' => '<p>Thao tác này không thể phục hồi.</p>',
    '#suffix' => '&nbsp;&nbsp;' . l('Quay lại', 'admin/cassiopeia/administrator/block/' . $form['#block']->id . '/items')
  );
  return $form;
}

function cassiopeia_admin_administrator_page_block_items_delete_form_submit($form, &$form_state) {
  if (empty($form_state['build_info']['args'][0]) && empty($form_state['build_info']['args'][1])) {
    return;
  }
  $form['#block'] = $form_state['build_info']['args'][0];
  $form['#item'] = $form_state['build_info']['args'][1];
  if (empty($form['#block'])) {
    return;
  }
  db_delete('cassiopeia_admin_items')
    ->condition('id', $form['#item']->id)
    ->execute();
  $form_state['redirect'] = 'admin/cassiopeia/administrator/block/' . $form['#block']->id . '/items';
  drupal_set_message('Đã xóa ' . $form['#item']->name);
}

function cassiopeia_admin_ajax_page(){
    global $user;
    $data = array();
    $data['message'] = '';
    $data['success'] = 0;
    if (isset($_POST['cmd'])) {
        switch ($_POST['cmd']) {
            case "hotel-ratings-status-change":
                $ids = json_decode($_REQUEST['ids']);
                $status = $_REQUEST['status'];
                try{
                    db_update("cassiopeia_room_hotel_rating")->fields(array("status"=>1))->condition("id",$ids,"IN")->execute();
                    $data['message'] = "Cập nhật thành công!";
                }catch (Exception $e){
                    $data['message'] = "Đã xảy ra lỗi!";
                }
                break;
            case "hotel-rating-status-change":
                $id = $_REQUEST['id'];
                $status = $_REQUEST['status'];
                try{
                    db_update("cassiopeia_room_hotel_rating")->fields(array("status"=>$status))->condition("id",$id)->execute();
                    $data['response'] = "Cập nhật thành công!";
                }catch (Exception $e){
                    $data['response'] = "Đã xảy ra lỗi!";
                }
                break;
            case "changeHotelStatus":
                if(cassiopeia_check_permission("cassiopeia_user_permission_hotel","p_edit")){
                    $hid = $_REQUEST['hid'];
                    $status = $_REQUEST['status'];
                    $hotel = node_load($hid);
                    $hotel->status = $status;
                    node_save($hotel);
                }
                break;
            case "adminGetHotels":
                $_data = $_REQUEST['data'];
                $_data = json_decode($_data);
                $data['html'] = $data['html'] = _cassiopeia_render_theme("module","cassiopeia_admin","templates/parts/hotel.tpl.php",array("data"=>$_data));
                break;
            case "hotel_tx_area_update_weight":
                $list = $_REQUEST['list'];
                _print_r($list);
                $weight = -20;
                foreach($list as $tid){
                    $tx_area = taxonomy_term_load($tid);
                    $tx_area->weight = $weight;
                    taxonomy_term_save($tx_area);
                    $weight++;
                }
                $data['message'] = "123";
                break;
            case "add_room_booking_report":
                $_data = json_decode($_REQUEST['_data']);
                $booking_code =  $_data->booking_code;
                $booking = cassiopeia_get_room_booking_detail_by_code($booking_code);
                if(!empty($booking)){
                    $room_code = !empty($booking)?$booking->room_code:"";
                    $hotel = !empty($booking)?$booking->hotel:0;
                    $tran_code = "KS".REQUEST_TIME;
                    $_agent = user_load($_data->agent);
                    $balance = !empty($_agent->field_account_balance['und'][0]['value'])?$_agent->field_account_balance['und'][0]['value']:0;
                    $partner_price = str_replace(".","",$_data->partner_price);
                    $partner_price = str_replace(",","",$partner_price);

                    $price = str_replace(".","",$_data->price);
                    $price = str_replace(",","",$price);
                    $balance-=(float)$partner_price;
//                    _print_r($balance);
//                    die;
                    $db_transaction = db_transaction();
                    try{
                        db_insert("tbl_room_booking_report")->fields(array(
                            "created"   => REQUEST_TIME,
                            "booking_code"   => $booking_code,
                            "hotel"   => $hotel,
//                        "guest"   => $booking->guest,
//                        "night"   => $diff->format("%a"),
                            "price"   => $price,
                            "partner_price"   => $partner_price,
                            "revenue"   => $partner_price-$price,
                            "agent"   => $_data->agent,
                            "room_code"   => $room_code,
                            "tran_user"   => $user->uid,
                            "tran_kind"   => $_data->tran_kind,
                            "note"   => $_data->note,
                            "tran_code"   => $tran_code,
                            "balance"   => $balance,
                            "category"         => "room_booking",
                        ))->execute();
                        db_insert("tbl_report")->fields(array(
                            "created"           => REQUEST_TIME,
                            "tran_code"         => $tran_code,
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
                        $point = floor($total/1000000);
                        $_agent->field_point['und'][0]['value'] = $point;
                        $_agent->field_account_balance['und'][0]['value'] = $balance;
                        if($_agent->field_account_status['und'][0]['tid']==22){ //tiềm năng
                            $_agent->field_account_status['und'][0]['tid'] = 13;
                            $_agent->field_account_updated_date['und'][0]['value'] = REQUEST_TIME;
                        }
                        user_save($_agent);
                        $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/issue-report-items.tpl.php");
                    }catch (Exception $e){
                        _print_r($e);
                        $db_transaction->rollback();
                    }
                }else{
                    $data['message'] = "Không tìm thấy booking!";
                }

                break;
            case "update_weight":
                $list = $_REQUEST['list'];
                $weight = -20;
                foreach($list as $nid){
                    $_node = node_load($nid);
                    $_node->field_weight['und'][0]['value'] = $weight;
                    $_node->update_weight = true;
                    node_save($_node);
                    $weight++;
                }
                break;
            case "changeRoomStatus":
                if(cassiopeia_check_permission("cassiopeia_user_permission_hotel","p_edit")){
                    $rid = $_REQUEST['roomId'];
                    $status = $_REQUEST['status'];
                    db_update("node")->fields(array(
                      "status"            => $status,
                      ))->condition("nid",$room->nid)->execute();
                }
                break;
        }
    }
    return $data;
}
