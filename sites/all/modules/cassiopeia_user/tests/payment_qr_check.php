<?php
/** Run with: php sites/all/modules/cassiopeia_user/tests/payment_qr_check.php */
if (PHP_SAPI !== 'cli') { header('HTTP/1.1 404 Not Found'); exit; }
// Also run with --drupal to exercise its locale C and installed transliteration.
if (in_array('--drupal', $argv, TRUE)) {
  $_SERVER['REMOTE_ADDR'] = '127.0.0.1';
  define('DRUPAL_ROOT', getcwd());
  require DRUPAL_ROOT . '/includes/bootstrap.inc';
  drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
}
require dirname(__DIR__) . '/cassiopeia_user_payment_qr.inc';

function qr_check($ok, $message) {
  if (!$ok) { fwrite(STDERR, 'FAIL: ' . $message . "\n"); exit(1); }
}

$b = (object) array('uid' => 7, 'status' => 'OK', 'ExpiryDt' => 2000, 'version' => 2, 'book_price' => '1500000.00', 'price' => '1200000');
qr_check(cassiopeia_user_payment_qr_booking_allowed($b, 7, 1000), 'own active booking');
qr_check(!cassiopeia_user_payment_qr_booking_allowed($b, 8, 1000), 'other agency denied');
qr_check(!cassiopeia_user_payment_qr_booking_allowed($b, 7, 2000), 'expiry boundary');
$b->ExpiryDt = 0;
qr_check(!cassiopeia_user_payment_qr_booking_allowed($b, 7, 1000), 'missing expiry');
$b->status = 'TICKETED';
qr_check(cassiopeia_user_payment_qr_booking_allowed($b, 7, 3000), 'issued ignores hold expiry');
foreach (array('FAIL', 'CANCELED', 'EXPIRED', 'PAID', 'HOLD') as $status) {
  $b->status = $status;
  qr_check(!cassiopeia_user_payment_qr_booking_allowed($b, 7, 1000), 'disallowed status');
}
qr_check(cassiopeia_user_payment_qr_sale_amount($b) === '1500000', 'sale price not net price');
$b->book_price = NULL;
qr_check(cassiopeia_user_payment_qr_sale_amount($b) === NULL, 'no net fallback');
foreach (array('', '0', '-1000', '1e6', '1000.50', 'abc1000', '10000000000000', array('1000')) as $bad) {
  qr_check(cassiopeia_user_payment_qr_amount($bad) === FALSE, 'invalid amount');
}
qr_check(cassiopeia_user_payment_qr_amount('0001500000') === '1500000', 'canonical amount');
qr_check(cassiopeia_user_payment_qr_amount('9999999999999') === '9999999999999', '13 digits without overflow');
foreach (array('', NULL, 'VAT', array('CHD')) as $bad) {
  qr_check(cassiopeia_user_payment_qr_invoice($bad) === FALSE, 'invalid invoice');
}
foreach (array('CHD', 'KHD') as $option) {
  qr_check(cassiopeia_user_payment_qr_invoice($option) === $option, 'invoice allowed');
  qr_check(cassiopeia_user_payment_qr_description('DL001 VE ABC123', $option) === 'DL001 VE ABC123 ' . $option, 'one invoice token');
}
qr_check(cassiopeia_user_payment_qr_description('Vé Đà Nẵng', 'CHD') === 'VE DA NANG CHD', 'Vietnamese transfer text');
qr_check(cassiopeia_user_payment_qr_ascii('Nguyễn Văn A') === 'NGUYEN VAN A', 'Vietnamese beneficiary name');
qr_check(cassiopeia_user_payment_qr_description('X54BYD CHD DL TENDAILY', 'CHD') === 'X54BYD CHD DL TENDAILY', 'new format with invoice');
qr_check(cassiopeia_user_payment_qr_description('X54BYD KHD DL TENDAILY', 'KHD') === 'X54BYD KHD DL TENDAILY', 'new format without invoice');
qr_check(cassiopeia_user_payment_qr_description('X54BYD DL TENDAILY', 'CHD') === 'X54BYD CHD DL TENDAILY', 'insert before DL with invoice');
qr_check(cassiopeia_user_payment_qr_description('X54BYD DL TENDAILY', 'KHD') === 'X54BYD KHD DL TENDAILY', 'insert before DL without invoice');
qr_check(cassiopeia_user_payment_qr_description('CODE VMB CHD NGUYEN VAN A', 'CHD') === 'CODE VMB CHD NGUYEN VAN A', 'customer format with invoice');
qr_check(cassiopeia_user_payment_qr_description('CODE VMB KHD NGUYEN VAN A', 'KHD') === 'CODE VMB KHD NGUYEN VAN A', 'customer format without invoice');
qr_check(cassiopeia_user_payment_qr_description('CODE VMB NGUYEN VAN A', 'CHD') === 'CODE VMB CHD NGUYEN VAN A', 'customer format insert after VMB');
qr_check(cassiopeia_user_payment_qr_description('CODE VMB CHD NGUYEN VAN A', 'KHD') === FALSE, 'customer format conflicting invoice');
qr_check(cassiopeia_user_payment_qr_description('VE ABC CHD', 'KHD') === FALSE, 'conflicting invoice');
qr_check(cassiopeia_user_payment_qr_description(str_repeat('A', 47), 'CHD') === FALSE, 'no silent truncation');
qr_check(cassiopeia_user_payment_qr_description('<script>', 'CHD') === FALSE, 'invalid description');
$banks = array('970415' => 'VietinBank');
$sorted = cassiopeia_user_payment_qr_order_banks(array('970452' => 'KienLongBank', '970409' => 'BacABank', '970415' => 'VietinBank', '970436' => 'Vietcombank'));
qr_check(array_keys($sorted) === array(970436, 970415, 970409, 970452), 'popular banks first then alphabetical');
$saved_user = (object) array('data' => array('payment_qr_bank' => array('bank_bin' => '970415',
  'account_no' => '00123456789', 'account_name' => 'nguyễn văn a')));
$saved_bank = cassiopeia_user_payment_qr_saved_account($saved_user, $banks);
qr_check($saved_bank['account_name'] === 'NGUYEN VAN A' && $saved_bank['account_no'] === '00123456789', 'saved recipient normalized');
qr_check(cassiopeia_user_payment_qr_saved_account((object) array('data' => array()), $banks) === FALSE, 'no saved recipient fallback');
$fixed = cassiopeia_user_payment_qr_company();
qr_check($fixed === array('bank_bin' => '970415', 'account_no' => '119662266688',
  'account_name' => 'CT TNHH DV HANG KHONG QUANG TRANG'), 'fixed Quang Trang recipient');
$fixed_account = cassiopeia_user_payment_qr_account('company', array('account_no' => '999999'), $banks, $fixed);
qr_check($fixed_account !== FALSE && $fixed_account['account_no'] === '119662266688', 'fixed company selectable and ignores client');
qr_check(strpos(cassiopeia_user_payment_qr_url($fixed_account, '1500000', 'DEMO KHD'),
  '/970415-119662266688-qr_only.png?') !== FALSE, 'fixed recipient reaches QR');
if (in_array('--drupal', $argv, TRUE)) {
  $catalog = cassiopeia_user_payment_qr_banks();
  $recipient = cassiopeia_user_payment_qr_account('company', array(), $catalog, $fixed);
  qr_check($recipient !== FALSE && $recipient['bank_name'] === 'VietinBank', 'VietinBank in runtime catalog');
  $html = _cassiopeia_render_theme('module', 'cassiopeia_user', 'templates/pages/user-payment-qr.tpl.php',
    array('banks' => $catalog, 'company' => $recipient, 'initial_error' => ''));
  qr_check(strpos($html, 'name="mode" value="company" checked') !== FALSE
    && strpos($html, '119662266688') !== FALSE
    && strpos($html, 'CT TNHH DV HANG KHONG QUANG TRANG') !== FALSE, 'rendered company option enabled with fixed recipient');
}
$company = array('bank_bin' => '970415', 'account_no' => '00123456789', 'account_name' => 'QUANG TRANG');
$input = array('bank_bin' => '970415', 'account_no' => '00987654321', 'account_name' => 'Nguyễn Văn A');
$a = cassiopeia_user_payment_qr_account('company', $input, $banks, $company);
qr_check($a['account_no'] === '00123456789', 'company ignores client override');
qr_check(cassiopeia_user_payment_qr_account('company', $input, $banks, array()) === FALSE, 'missing company config');
qr_check(cassiopeia_user_payment_qr_account('other', $input, $banks, $company) === FALSE, 'unknown mode');
foreach (array('company', 'personal') as $mode) {
  $account = cassiopeia_user_payment_qr_account($mode, $input, $banks, $company);
  qr_check($account !== FALSE && substr($account['account_no'], 0, 2) === '00', 'leading zero preserved');
  foreach (array('CHD', 'KHD') as $invoice) {
    $description = cassiopeia_user_payment_qr_description('DL001 VE ABC123', $invoice);
    $url = cassiopeia_user_payment_qr_url($account, '1500000', $description);
    parse_str(parse_url($url, PHP_URL_QUERY), $query);
    qr_check(parse_url($url, PHP_URL_HOST) === 'img.vietqr.io', 'fixed provider');
    qr_check($query['amount'] === '1500000' && $query['addInfo'] === $description, 'both modes and invoices reach QR');
  }
}
$input['bank_bin'] = '999999';
qr_check(cassiopeia_user_payment_qr_account('personal', $input, $banks, $company) === FALSE, 'unknown bank');
qr_check(cassiopeia_user_payment_qr_png('<html>bad gateway</html>') === FALSE, 'non PNG rejected');
qr_check(cassiopeia_user_payment_qr_image('<html>bad gateway</html>') === FALSE, 'HTML rejected');
$image = imagecreatetruecolor(480, 480);
ob_start(); imagejpeg($image); $jpeg = ob_get_clean(); imagedestroy($image);
$normalized = cassiopeia_user_payment_qr_image($jpeg);
qr_check(cassiopeia_user_payment_qr_png($normalized), 'JPEG provider response normalized to PNG');
qr_check(cassiopeia_user_payment_qr_image(str_repeat('x', 1048577)) === FALSE, 'oversized response rejected');

// Opt-in local integration: all fixture writes roll back; no real user is edited.
if (in_array('--profile-storage', $argv, TRUE) && in_array('--drupal', $argv, TRUE)) {
  module_load_include('inc', 'user', 'user.pages');
  $transaction = db_transaction();
  $original_user = $user;
  $uid = db_next_id(db_query('SELECT MAX(uid) FROM {users}')->fetchField());
  db_insert('users')->fields(array('uid' => $uid, 'name' => 'qr-storage-check-' . uniqid(), 'status' => 1,
    'created' => REQUEST_TIME, 'data' => serialize(array('unrelated' => 'preserve'))))->execute();
  db_insert('users_roles')->fields(array('uid' => $uid, 'rid' => 4))->execute();
  $user = user_load($uid, TRUE);
  $form = drupal_get_form('user_profile_form', $user);
  qr_check(isset($form['payment_qr_bank']), 'owner can edit bank');
  $state = array('user' => clone $user, 'values' => array('payment_qr_bank' => array(
    'bank_bin' => '970415', 'account_no' => '00123456789', 'account_name' => 'nguyễn văn a')));
  cassiopeia_user_payment_qr_profile_validate($form, $state);
  qr_check(!form_get_errors(), 'valid bank accepted');
  user_profile_form_submit($form, $state);
  $reloaded = user_load($uid, TRUE);
  $saved = cassiopeia_user_payment_qr_saved_account($reloaded, cassiopeia_user_payment_qr_banks());
  qr_check($saved['account_name'] === 'NGUYEN VAN A' && $saved['account_no'] === '00123456789'
    && $reloaded->data['unrelated'] === 'preserve', 'core profile submit persists bank and preserves other data');
  $state = array('user' => clone $reloaded, 'values' => array('payment_qr_bank' => array(
    'bank_bin' => '970436', 'account_no' => '00987654321', 'account_name' => 'tran van b')));
  $form['#user'] = $reloaded;
  cassiopeia_user_payment_qr_profile_validate($form, $state);
  user_profile_form_submit($form, $state);
  $updated = user_load($uid, TRUE);
  qr_check($updated->data['payment_qr_bank']['account_name'] === 'TRAN VAN B'
    && $updated->data['payment_qr_bank']['bank_bin'] === '970436', 'update replaces default');
  $preview = cassiopeia_user_payment_qr_page();
  qr_check(strpos($preview, 'value="saved"') !== FALSE && strpos($preview, 'TRAN VAN B') !== FALSE
    && strpos($preview, '00987654321') !== FALSE, 'QR page displays saved account');
  if (in_array('--provider', $argv, TRUE)) {
    $_SERVER['REQUEST_METHOD'] = 'POST';
    $_POST = array('token' => drupal_get_token('payment-qr'), 'source' => 'manual', 'mode' => 'saved',
      'amount' => '10000', 'invoice_option' => 'KHD', 'base_content' => 'QR DEMO', 'passenger' => 'QR DEMO',
      'bank_bin' => '970415', 'account_no' => '999999999', 'account_name' => 'WRONG ACCOUNT');
    $result = cassiopeia_user_payment_qr_prepare();
    qr_check(isset($result['snapshot']) && $result['snapshot']['recipient']['account_no'] === '00987654321'
      && $result['snapshot']['recipient']['bank_bin'] === '970436', 'saved mode ignores client recipient');
    $_POST['mode'] = 'personal';
    $result = cassiopeia_user_payment_qr_prepare();
    qr_check(isset($result['snapshot']) && $result['snapshot']['recipient']['account_no'] === '999999999'
      && user_load($uid, TRUE)->data['payment_qr_bank']['account_no'] === '00987654321', 'one-off QR never overwrites default');
  }
  $state['values']['payment_qr_bank']['account_no'] = '-1000';
  cassiopeia_user_payment_qr_profile_validate($form, $state);
  qr_check((bool) form_get_errors(), 'invalid bank rejected');
  form_clear_error();
  $user = (object) array('uid' => $uid + 1, 'roles' => array(2 => 'authenticated user', 4 => 'Đại lí'));
  qr_check(!cassiopeia_user_payment_qr_profile_allowed($updated), 'other agency cannot update bank');
  $transaction->rollback();
  $user = $original_user;
  qr_check(!db_query('SELECT uid FROM {users} WHERE uid = :uid', array(':uid' => $uid))->fetchField(), 'fixture rolled back');
  echo "PASS: profile bank save/update, validation and ownership (rolled back)\n";
}
echo "PASS: agency payment QR\n";
