<?php
/**
 * @file
 * Agency collection QR. Never changes bookings, balances or payment status.
 */

function cassiopeia_user_payment_qr_booking_allowed($booking, $uid, $now) {
  return $uid > 0 && !empty($booking->uid) && (int) $booking->uid === (int) $uid
    && ($booking->status === 'TICKETED' || ($booking->status === 'OK'
      && !empty($booking->ExpiryDt) && (int) $booking->ExpiryDt > $now));
}

function cassiopeia_user_payment_qr_amount($raw) {
  if (!is_string($raw) || !preg_match('/^[0-9]{1,13}$/D', $raw)) { return FALSE; }
  $amount = ltrim($raw, '0');
  return $amount === '' ? FALSE : $amount;
}

function cassiopeia_user_payment_qr_sale_amount($booking) {
  // Version 2 writers store total fares + baggage + service/agent fees here.
  // The customer card payment flow also consumes book_price, never net price.
  if (empty($booking->book_price) || (int) $booking->version !== 2) { return NULL; }
  $amount = cassiopeia_user_payment_qr_amount(preg_replace('/\.0+$/', '', (string) $booking->book_price));
  return $amount === FALSE ? NULL : $amount;
}

function cassiopeia_user_payment_qr_invoice($value) {
  return in_array($value, array('CHD', 'KHD'), TRUE) ? $value : FALSE;
}

function cassiopeia_user_payment_qr_ascii($value) {
  if (!is_string($value) || !preg_match('//u', $value)) { return ''; }
  $value = str_replace(array('đ', 'Đ'), array('d', 'D'), $value);
  // Drupal sets locale C; iconv alone replaces Vietnamese vowels with '?'.
  if (!function_exists('transliteration_get') && function_exists('module_load_include')) {
    module_load_include('module', 'transliteration');
  }
  $value = function_exists('transliteration_get') ? transliteration_get($value, '?', 'vi')
    : iconv('UTF-8', 'ASCII//TRANSLIT', $value);
  return strtoupper(trim(preg_replace('/\s+/', ' ', $value)));
}

function cassiopeia_user_payment_qr_description($content, $invoice_option) {
  if (cassiopeia_user_payment_qr_invoice($invoice_option) === FALSE) { return FALSE; }
  $content = cassiopeia_user_payment_qr_ascii($content);
  if (!preg_match('/^[A-Z0-9][A-Z0-9 ]{0,49}$/D', $content)) { return FALSE; }

  $has_chd = (bool) preg_match('/\bCHD\b/', $content);
  $has_khd = (bool) preg_match('/\bKHD\b/', $content);
  if ($has_chd && $has_khd) { return FALSE; }
  if ($has_chd && $invoice_option !== 'CHD') { return FALSE; }
  if ($has_khd && $invoice_option !== 'KHD') { return FALSE; }

  if (!$has_chd && !$has_khd) {
    if (preg_match('/\bDL\b/', $content)) {
      $content = preg_replace('/\bDL\b/', $invoice_option . ' DL', $content, 1);
    }
    elseif (preg_match('/\bVMB\b/', $content)) {
      $content = preg_replace('/\bVMB\b/', 'VMB ' . $invoice_option, $content, 1);
    }
    else {
      $content .= ' ' . $invoice_option;
    }
  }

  $content = preg_replace('/\s+/', ' ', trim($content));
  if (strlen($content) > 50 || strlen($content) < 3) { return FALSE; }
  return $content;
}


function cassiopeia_user_payment_qr_account($mode, array $input, array $banks, array $company) {
  if (!in_array($mode, array('company', 'personal'), TRUE)) { return FALSE; }
  $account = $mode === 'company' ? $company : $input;
  foreach (array('bank_bin', 'account_no', 'account_name') as $key) {
    if (!isset($account[$key]) || !is_string($account[$key])) { return FALSE; }
    $account[$key] = trim($account[$key]);
  }
  $account['account_name'] = cassiopeia_user_payment_qr_ascii($account['account_name']);
  if (!preg_match('/^[0-9]{6}$/D', $account['bank_bin']) || !isset($banks[$account['bank_bin']])
    || !preg_match('/^[0-9]{6,19}$/D', $account['account_no'])
    || !preg_match('/^[A-Z0-9][A-Z0-9 ]{4,49}$/D', $account['account_name'])) { return FALSE; }
  return array('bank_bin' => $account['bank_bin'], 'bank_name' => $banks[$account['bank_bin']],
    'account_no' => $account['account_no'], 'account_name' => $account['account_name']);
}

function cassiopeia_user_payment_qr_company() {
  // Fixed recipient requested by Quang Trang; never take these values from the client.
  return array('bank_bin' => '970415', 'account_no' => '119662266688',
    'account_name' => 'CT TNHH DV HANG KHONG QUANG TRANG');
}

function cassiopeia_user_payment_qr_order_banks(array $banks) {
  // UX priority, not a ranking of bank size; remaining banks stay alphabetical.
  $popular = array('970436', '970415', '970418', '970405', '970422', '970407',
    '970416', '970432', '970423', '970403', '970437', '970441', '970426', '970443');
  asort($banks);
  $ordered = array();
  foreach ($popular as $bin) { if (isset($banks[$bin])) { $ordered[$bin] = $banks[$bin]; } }
  return $ordered + $banks;
}

function cassiopeia_user_payment_qr_saved_account($account, array $banks) {
  $saved = isset($account->data['payment_qr_bank']) && is_array($account->data['payment_qr_bank'])
    ? $account->data['payment_qr_bank'] : array();
  return cassiopeia_user_payment_qr_account('personal', $saved, $banks, array());
}

function cassiopeia_user_payment_qr_profile_allowed($account) {
  global $user;
  return !empty($account->roles[4]) && $user->uid > 0
    && ((int) $user->uid === (int) $account->uid || user_access('administer users'));
}

function cassiopeia_user_payment_qr_profile_form(&$form) {
  if (!cassiopeia_user_payment_qr_profile_allowed($form['#user'])) { return; }
  $account = $form['#user'];
  $saved = isset($account->data['payment_qr_bank']) ? $account->data['payment_qr_bank'] : array();
  $form['payment_qr_bank'] = array('#type' => 'fieldset', '#tree' => TRUE, '#weight' => 21,
    '#title' => t('Tài khoản ngân hàng mặc định'),
    '#description' => t('Dùng khi tạo QR thu tiền. Bấm Cập nhật để lưu cùng hồ sơ. Tên chủ tài khoản chưa được xác minh với ngân hàng.'));
  $form['payment_qr_bank']['bank_bin'] = array('#type' => 'select', '#title' => t('Ngân hàng'),
    '#options' => array('' => t('-- Chọn ngân hàng --')) + cassiopeia_user_payment_qr_banks(),
    '#default_value' => isset($saved['bank_bin']) ? $saved['bank_bin'] : '');
  $form['payment_qr_bank']['account_no'] = array('#type' => 'textfield', '#title' => t('Số tài khoản'),
    '#maxlength' => 19, '#attributes' => array('inputmode' => 'numeric'),
    '#default_value' => isset($saved['account_no']) ? $saved['account_no'] : '');
  $form['payment_qr_bank']['account_name'] = array('#type' => 'textfield', '#title' => t('Tên chủ tài khoản'),
    '#maxlength' => 50, '#attributes' => array('class' => array('qr-account-owner'), 'autocapitalize' => 'characters'),
    '#description' => t('Tự chuyển thành CHỮ HOA; lưu không dấu để dùng với VietQR.'),
    '#default_value' => isset($saved['account_name']) ? $saved['account_name'] : '');
  $form['#validate'][] = 'cassiopeia_user_payment_qr_profile_validate';
  $form['actions']['submit']['#value'] = t('Cập nhật');
  drupal_add_js(drupal_get_path('module', 'cassiopeia_user') . '/js/payment-qr.js', array('scope' => 'footer', 'weight' => 100));
}

function cassiopeia_user_payment_qr_profile_validate($form, &$form_state) {
  if (!cassiopeia_user_payment_qr_profile_allowed($form['#user'])) {
    unset($form_state['values']['payment_qr_bank']);
    return;
  }
  $input = isset($form_state['values']['payment_qr_bank']) ? $form_state['values']['payment_qr_bank'] : array();
  $empty = array('bank_bin' => '', 'account_no' => '', 'account_name' => '');
  if ($input === $empty) { return; }
  $bank = is_array($input) ? cassiopeia_user_payment_qr_account('personal', $input, cassiopeia_user_payment_qr_banks(), array()) : FALSE;
  if ($bank === FALSE) {
    form_set_error('payment_qr_bank', t('Nhập đủ ngân hàng, số tài khoản 6–19 chữ số và tên chủ tài khoản hợp lệ (5–50 ký tự).'));
    return;
  }
  // user_profile_form_submit persists data through user_save, preserving other user data.
  $form_state['values']['data'] = $form['#user']->data;
  unset($bank['bank_name']);
  $form_state['values']['data']['payment_qr_bank'] = $bank;
}

function cassiopeia_user_payment_qr_url(array $account, $amount, $description) {
  return 'https://img.vietqr.io/image/' . rawurlencode($account['bank_bin']) . '-'
    . rawurlencode($account['account_no']) . '-qr_only.png?'
    . http_build_query(array('amount' => $amount, 'addInfo' => $description,
      'accountName' => $account['account_name']), '', '&', PHP_QUERY_RFC3986);
}

function cassiopeia_user_payment_qr_fetch($url) {
  $parts = parse_url($url);
  if (empty($parts['scheme']) || $parts['scheme'] !== 'https' || empty($parts['host'])
    || !in_array($parts['host'], array('api.vietqr.io', 'img.vietqr.io'), TRUE)) { return FALSE; }
  $body = '';
  $ch = curl_init($url);
  curl_setopt_array($ch, array(CURLOPT_FOLLOWLOCATION => FALSE, CURLOPT_CONNECTTIMEOUT => 5,
    CURLOPT_TIMEOUT => 15, CURLOPT_SSL_VERIFYPEER => TRUE, CURLOPT_SSL_VERIFYHOST => 2,
    CURLOPT_PROTOCOLS => CURLPROTO_HTTPS,
    CURLOPT_WRITEFUNCTION => function ($handle, $chunk) use (&$body) {
      if (strlen($body) + strlen($chunk) > 1048576) { return 0; }
      $body .= $chunk;
      return strlen($chunk);
    }));
  $ok = curl_exec($ch);
  $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);
  return $ok && $status === 200 ? $body : FALSE;
}

function cassiopeia_user_payment_qr_png($body) {
  if (!is_string($body) || strlen($body) > 1048576 || substr($body, 0, 8) !== "\x89PNG\r\n\x1a\n") { return FALSE; }
  $size = @getimagesizefromstring($body);
  return $size && $size[2] === IMAGETYPE_PNG && $size[0] >= 200 && $size[0] <= 2000
    && $size[1] >= 200 && $size[1] <= 2000;
}

function cassiopeia_user_payment_qr_image($body) {
  if (cassiopeia_user_payment_qr_png($body)) { return $body; }
  // Quick Link can return JPEG bytes even with a .png path and image/png header.
  if (!is_string($body) || strlen($body) > 1048576 || substr($body, 0, 3) !== "\xff\xd8\xff") { return FALSE; }
  $size = @getimagesizefromstring($body);
  if (!$size || $size[2] !== IMAGETYPE_JPEG || $size[0] < 200 || $size[0] > 2000
    || $size[1] < 200 || $size[1] > 2000) { return FALSE; }
  $image = @imagecreatefromstring($body);
  if (!$image) { return FALSE; }
  ob_start();
  imagepng($image);
  $png = ob_get_clean();
  imagedestroy($image);
  return cassiopeia_user_payment_qr_png($png) ? $png : FALSE;
}

function cassiopeia_user_payment_qr_banks() {
  $cached = cache_get('cassiopeia_payment_qr_banks');
  if ($cached && isset($cached->data['banks'], $cached->data['refresh_at']) && $cached->data['refresh_at'] > REQUEST_TIME) {
    return cassiopeia_user_payment_qr_order_banks($cached->data['banks']);
  }
  $data = json_decode(cassiopeia_user_payment_qr_fetch('https://api.vietqr.io/v2/banks'), TRUE);
  $banks = array();
  if (isset($data['code'], $data['data']) && $data['code'] === '00' && is_array($data['data'])) {
    foreach ($data['data'] as $bank) {
      if (isset($bank['bin'], $bank['shortName']) && is_string($bank['bin']) && is_string($bank['shortName'])
        && preg_match('/^[0-9]{6}$/D', $bank['bin']) && $bank['shortName'] !== '') {
        $banks[$bank['bin']] = $bank['shortName'];
      }
    }
  }
  $success = !empty($banks);
  if (!$banks && $cached && !empty($cached->data['banks'])) { $banks = $cached->data['banks']; }
  asort($banks);
  // Keep the last valid public catalog during outages; retry a failed refresh in 5 minutes.
  cache_set('cassiopeia_payment_qr_banks', array('banks' => $banks,
    'refresh_at' => REQUEST_TIME + ($success ? 86400 : 300)));
  return cassiopeia_user_payment_qr_order_banks($banks);
}

function cassiopeia_user_payment_qr_load($id) {
  global $user;
  if (!is_string($id) || !preg_match('/^[1-9][0-9]{0,9}$/D', $id)) { return FALSE; }
  $b = db_select('tbl_booking', 'b')->fields('b')->condition('b.id', $id)
    ->condition('b.uid', $user->uid)->execute()->fetchObject();
  if (!cassiopeia_user_payment_qr_booking_allowed($b, $user->uid, time())) { return FALSE; }
  $b->tickets = cassiopeia_qt_ticket_load_by_bid($b->id);
  $b->passengers = cassiopeia_qt_passenger_load_by_bid($b->id);
  return $b;
}

function cassiopeia_user_payment_qr_summary($b) {
  $pnrs = $names = $flights = array();
  foreach ((array) $b->tickets as $ticket) {
    if (!empty($ticket->pnr_code)) { $pnrs[] = $ticket->pnr_code; }
    $flights[] = $ticket->FlightNumber . ': ' . $ticket->StartPoint . ' - ' . $ticket->EndPoint
      . (!empty($ticket->StartDate) ? ' | ' . date('d/m/Y H:i', $ticket->StartDate) : '');
  }
  foreach ((array) $b->passengers as $p) { $names[] = trim($p->FirstName . ' ' . $p->LastName); }
  $pnr_list = array_values(array_unique(array_filter($pnrs)));
  $ticket_code = !empty($pnr_list) ? implode(' ', $pnr_list) : $b->booking_code;
  $first_passenger = !empty($names) ? $names[0] : '';
  return array('booking_id' => (string) $b->id, 'booking_code' => $b->booking_code,
    'ticket_code' => $ticket_code, 'pnrs' => implode(', ', $pnr_list), 'status' => $b->status,
    'expires_at' => $b->status === 'OK' ? date('H:i d/m/Y', $b->ExpiryDt) : '',
    'passenger_name' => $first_passenger, 'passenger_summary' => implode(', ', $names),
    'itinerary_summary' => implode("\n", $flights),
    'sale_amount' => cassiopeia_user_payment_qr_sale_amount($b), 'currency' => 'VND');
}

function cassiopeia_user_payment_qr_no_cache() {
  drupal_page_is_cacheable(FALSE);
  drupal_add_http_header('Cache-Control', 'private, no-store');
}

function cassiopeia_user_payment_qr_error($message, $status = '400 Bad Request') {
  drupal_add_http_header('Status', $status);
  return array('error' => $message);
}

function cassiopeia_user_payment_qr_search() {
  global $user;
  cassiopeia_user_payment_qr_no_cache();
  if ($_SERVER['REQUEST_METHOD'] !== 'GET') { return cassiopeia_user_payment_qr_error('Phương thức không hợp lệ.', '405 Method Not Allowed'); }
  // Drupal reserves q for its internal route, including clean URLs.
  $q = isset($_GET['keyword']) ? $_GET['keyword'] : '';
  $status = isset($_GET['status']) ? $_GET['status'] : '';
  $page = isset($_GET['page']) ? $_GET['page'] : '1';
  if (!is_string($q) || strlen($q) > 150 || !in_array($status, array('', 'OK', 'TICKETED'), TRUE)
    || !is_string($page) || !preg_match('/^[1-9][0-9]{0,2}$/D', $page)) {
    return cassiopeia_user_payment_qr_error('Bộ lọc tìm kiếm không hợp lệ.');
  }
  try {
    $query = db_select('tbl_booking', 'b')->fields('b', array('id'))->condition('b.uid', $user->uid);
    $query->condition(db_or()->condition('b.status', 'TICKETED')->condition(db_and()
      ->condition('b.status', 'OK')->condition('b.ExpiryDt', time(), '>')));
    if ($status !== '') { $query->condition('b.status', $status); }
    if (trim($q) !== '') {
      $like = '%' . db_like(trim($q)) . '%';
      $tickets = db_select('tbl_ticket', 't')->fields('t', array('bid'))->condition('t.pnr_code', $like, 'LIKE');
      $passengers = db_select('tbl_passenger', 'p')->fields('p', array('bid'));
      $passengers->where("CONCAT(p.FirstName, ' ', p.LastName) LIKE :qr_name", array(':qr_name' => $like));
      $query->condition(db_or()->condition('b.booking_code', $like, 'LIKE')
        ->condition('b.id', $tickets, 'IN')->condition('b.id', $passengers, 'IN'));
    }
    $ids = $query->orderBy('b.created', 'DESC')->orderBy('b.id', 'DESC')->range(((int) $page - 1) * 20, 21)->execute()->fetchCol();
    $items = array();
    foreach (array_slice($ids, 0, 20) as $id) {
      $b = cassiopeia_user_payment_qr_load((string) $id);
      if ($b) { $items[] = cassiopeia_user_payment_qr_summary($b); }
    }
    return array('items' => $items, 'has_more' => count($ids) > 20);
  }
  catch (Exception $e) {
    watchdog('payment_qr', 'Không thể đọc danh sách vé QR.', array(), WATCHDOG_ERROR);
    return cassiopeia_user_payment_qr_error('Không thể tải vé. Vui lòng thử lại.', '500 Internal Server Error');
  }
}

function cassiopeia_user_payment_qr_page() {
  global $user;
  cassiopeia_user_payment_qr_no_cache();
  $selected = NULL;
  $initial_error = '';
  if (isset($_GET['booking_id'])) {
    $b = cassiopeia_user_payment_qr_load($_GET['booking_id']);
    if ($b) { $selected = cassiopeia_user_payment_qr_summary($b); }
    else { $initial_error = 'Không tìm thấy vé đủ điều kiện. Vui lòng chọn lại.'; }
  }
  $banks = cassiopeia_user_payment_qr_banks();
  $company = cassiopeia_user_payment_qr_account('company', array(), $banks, cassiopeia_user_payment_qr_company());
  $agency = user_load($user->uid, TRUE);
  $saved = cassiopeia_user_payment_qr_saved_account($agency, $banks);
  $agency_code = !empty($agency->field_account_code['und'][0]['value'])
    ? $agency->field_account_code['und'][0]['value'] : 'DL' . $user->uid;
  $agency_code = preg_replace('/[^A-Z0-9]/', '', cassiopeia_user_payment_qr_ascii($agency_code));
  $agency_name = !empty($agency->field_account_transaction_name['und'][0]['value'])
    ? $agency->field_account_transaction_name['und'][0]['value']
    : (!empty($agency->field_account_full_name['und'][0]['value'])
      ? $agency->field_account_full_name['und'][0]['value'] : $agency->name);
  $agency_name = preg_replace('/[^A-Z0-9 ]/', '', cassiopeia_user_payment_qr_ascii($agency_name));
  $path = drupal_get_path('module', 'cassiopeia_user');
  drupal_add_css($path . '/css/payment-qr.css');
  drupal_add_js($path . '/js/payment-qr.js', array('scope' => 'footer', 'weight' => 100));
  drupal_add_js(array('paymentQr' => array('searchUrl' => url('user/manager/payment-qr/search'),
    'prepareUrl' => url('user/manager/payment-qr/prepare'), 'token' => drupal_get_token('payment-qr'),
    'selected' => $selected, 'agencyCode' => $agency_code, 'agencyName' => $agency_name)), 'setting');
  return _cassiopeia_render_theme('module', 'cassiopeia_user', 'templates/pages/user-payment-qr.tpl.php',
    array('banks' => $banks, 'company' => $company, 'saved' => $saved,
      'profile_url' => url('user/' . $user->uid . '/edit'), 'initial_error' => $initial_error));
}

function cassiopeia_user_payment_qr_prepare() {
  global $user;
  cassiopeia_user_payment_qr_no_cache();
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') { return cassiopeia_user_payment_qr_error('Phương thức không hợp lệ.', '405 Method Not Allowed'); }
  if (!isset($_POST['token']) || !is_string($_POST['token']) || !drupal_valid_token($_POST['token'], 'payment-qr')) {
    return cassiopeia_user_payment_qr_error('Phiên làm việc không hợp lệ. Vui lòng tải lại trang.', '403 Forbidden');
  }
  $input = array();
  foreach (array('source', 'booking_id', 'mode', 'bank_bin', 'account_no', 'account_name', 'amount',
    'invoice_option', 'base_content', 'passenger', 'pnr', 'itinerary') as $key) {
    $input[$key] = isset($_POST[$key]) ? $_POST[$key] : '';
    if (!is_string($input[$key]) || strlen($input[$key]) > 2000) {
      return cassiopeia_user_payment_qr_error('Dữ liệu nhập không hợp lệ.');
    }
  }
  $amount = cassiopeia_user_payment_qr_amount($input['amount']);
  $invoice = cassiopeia_user_payment_qr_invoice($input['invoice_option']);
  $description = cassiopeia_user_payment_qr_description($input['base_content'], $invoice);
  if ($amount === FALSE) { return cassiopeia_user_payment_qr_error('Nhập số tiền VND nguyên dương, tối đa 13 chữ số.'); }
  if ($invoice === FALSE) { return cassiopeia_user_payment_qr_error('Vui lòng chọn thông tin lấy hóa đơn.'); }
  if ($description === FALSE) { return cassiopeia_user_payment_qr_error('Nội dung chuyển khoản từ 3 đến 50 ký tự chữ, số và khoảng trắng.'); }
  if (!in_array($input['source'], array('booking', 'manual'), TRUE)) { return cassiopeia_user_payment_qr_error('Nguồn vé không hợp lệ.'); }
  try {
    if ($input['source'] === 'booking') {
      $b = cassiopeia_user_payment_qr_load($input['booking_id']);
      if (!$b) { return cassiopeia_user_payment_qr_error('Không tìm thấy vé đủ điều kiện. Vui lòng chọn lại.', '404 Not Found'); }
      $ticket = cassiopeia_user_payment_qr_summary($b);
    }
    else {
      if (trim($input['passenger']) === '' || !preg_match('//u', $input['passenger'] . $input['pnr'] . $input['itinerary'])
        || mb_strlen($input['passenger'], 'UTF-8') > 300 || mb_strlen($input['pnr'], 'UTF-8') > 6
        || mb_strlen($input['itinerary'], 'UTF-8') > 800) {
        return cassiopeia_user_payment_qr_error('Nhập tên hành khách (tối đa 300 ký tự); mã đặt chỗ tối đa 6 ký tự.');
      }
      $ticket = array('booking_code' => '', 'ticket_code' => trim($input['pnr']), 'pnrs' => trim($input['pnr']), 'passenger_summary' => trim($input['passenger']),
        'itinerary_summary' => trim($input['itinerary']), 'expires_at' => '', 'status' => 'manual');
    }
    $banks = cassiopeia_user_payment_qr_banks();
    $account = $input['mode'] === 'saved'
      ? cassiopeia_user_payment_qr_saved_account(user_load($user->uid, TRUE), $banks)
      : cassiopeia_user_payment_qr_account($input['mode'], $input, $banks, cassiopeia_user_payment_qr_company());
    if ($account === FALSE) { return cassiopeia_user_payment_qr_error('Kiểm tra ngân hàng, số tài khoản (6–19 chữ số), tên chủ tài khoản (5–50 ký tự) hoặc cấu hình Quang Trang.'); }
    if (!flood_is_allowed('payment_qr', 10, 60, (string) $user->uid)) {
      return cassiopeia_user_payment_qr_error('Bạn đã tạo nhiều QR. Vui lòng thử lại sau một phút.', '429 Too Many Requests');
    }
    flood_register_event('payment_qr', 60, (string) $user->uid);
    $body = cassiopeia_user_payment_qr_image(cassiopeia_user_payment_qr_fetch(cassiopeia_user_payment_qr_url($account, $amount, $description)));
    if ($body === FALSE) {
      watchdog('payment_qr', 'Không tải được ảnh VietQR hợp lệ.', array(), WATCHDOG_WARNING);
      return cassiopeia_user_payment_qr_error('Không tải được QR từ ngân hàng. Vui lòng thử lại.', '502 Bad Gateway');
    }
    // A held booking may expire while the provider is responding.
    if ($input['source'] === 'booking' && !cassiopeia_user_payment_qr_load($input['booking_id'])) {
      return cassiopeia_user_payment_qr_error('Vé không còn đủ điều kiện. Vui lòng chọn lại.', '409 Conflict');
    }
    return array('png_data_uri' => 'data:image/png;base64,' . base64_encode($body),
      'snapshot' => array('amount' => $amount, 'recipient' => $account, 'description' => $description,
        'invoice_option' => $invoice, 'invoice_label' => $invoice === 'CHD' ? 'Có hóa đơn' : 'Không hóa đơn',
        'ticket_summary' => $ticket));
  }
  catch (Exception $e) {
    watchdog('payment_qr', 'Không thể chuẩn bị QR thanh toán.', array(), WATCHDOG_ERROR);
    return cassiopeia_user_payment_qr_error('Không thể tạo QR. Vui lòng thử lại.', '500 Internal Server Error');
  }
}
