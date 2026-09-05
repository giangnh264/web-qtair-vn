<?php
$company = $variables['company'];
$banks = $variables['banks'];
$saved = !empty($variables['saved']) ? $variables['saved'] : FALSE;
?>
<div class="qt-payment-qr">
  <header class="qr-heading">
    <div><p class="qr-eyebrow">TIỆN ÍCH ĐẠI LÝ</p><h2>Tạo QR thu tiền</h2>
    <p>Nhập thông tin vé, người nhận và tạo ảnh VietQR gửi khách thanh toán.</p></div>
    <a href="<?php echo check_plain(url('user/manager/booking')); ?>">Về danh sách đơn hàng</a>
  </header>
  <div id="qr-message" class="qr-message" role="status" aria-live="polite"><?php echo check_plain($variables['initial_error']); ?></div>
  <div class="qr-layout">
    <form id="qr-form" class="qr-panel" autocomplete="off">
      <section>
        <h3><span>1</span> Thông tin vé</h3>
        <fieldset class="qr-choices"><legend>Nguồn thông tin</legend>
          <label><input type="radio" name="source" value="booking" checked> Chọn vé trong hệ thống</label>
          <label><input type="radio" name="source" value="manual"> Nhập thủ công</label>
        </fieldset>
        <div id="qr-booking-fields">
          <p class="qr-hint" style="color:#176454;font-weight:600;background:#e8f4f0;padding:10px 12px;border-radius:6px;margin:0 0 14px;">📌 Danh sách vé đã đặt chỗ còn thời gian và vé đã xuất trong vòng 24h.</p>
          <label for="qr-search">Tìm vé</label>
          <input id="qr-search" type="search" maxlength="150" placeholder="PNR, mã đơn hoặc tên hành khách">
          <div id="qr-results" class="qr-results" aria-live="polite"></div>
          <div class="qr-pagination"><button type="button" id="qr-prev" disabled>Trước</button><span id="qr-page">Trang 1</span><button type="button" id="qr-next" disabled>Sau</button></div>
          <div id="qr-selected" class="qr-selected" hidden>
            <div class="qr-result-header">
              <strong id="qr-selected-code"></strong>
              <span class="qr-done-badge"><svg viewBox="0 0 20 20" fill="currentColor" width="16" height="16"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg> Đã chọn</span>
            </div>
            <p id="qr-selected-names"></p>
            <p id="qr-selected-flights"></p>
            <small id="qr-selected-expiry"></small>
          </div>
        </div>
        <div id="qr-manual-fields" hidden>
          <label for="qr-passenger">Hành khách / người thanh toán <span style="color:#c00;">*</span></label>
          <input id="qr-passenger" name="passenger" maxlength="300" placeholder="Ví dụ: NGUYEN VAN A">
          <label for="qr-pnr">Mã đặt chỗ</label>
          <input id="qr-pnr" name="pnr" maxlength="6" autocapitalize="characters" placeholder="Ví dụ: ABC123">
          <p class="qr-hint">Nhập thông tin hành khách và mã đặt chỗ để tự động tạo nội dung chuyển khoản.</p>
        </div>
      </section>
      <section>
        <h3><span>2</span> Tài khoản nhận tiền</h3>
        <fieldset class="qr-choices"><legend>Người nhận tiền</legend>
          <label><input type="radio" name="mode" value="company" <?php echo $company ? 'checked' : 'disabled'; ?>> Tài khoản Quang Trang</label>
          <?php if ($saved): ?><label><input type="radio" name="mode" value="saved" <?php echo !$company ? 'checked' : ''; ?>> Tài khoản mặc định của đại lý</label><?php endif; ?>
          <label><input type="radio" name="mode" value="personal" <?php echo !$company && !$saved ? 'checked' : ''; ?>> Thêm tài khoản khác cho lần này</label>
        </fieldset>
        <?php if (!$company): ?><p class="qr-hint">Chưa tải được thông tin ngân hàng Quang Trang. Vui lòng tải lại trang sau ít phút.</p><?php endif; ?>
        <div id="qr-company" class="qr-selected" <?php echo !$company ? 'hidden' : ''; ?>>
          <?php if ($company): ?><strong><?php echo check_plain($company['account_name']); ?></strong><p><?php echo check_plain($company['bank_name'] . ' · ' . $company['account_no']); ?></p><?php endif; ?>
        </div>
        <?php if ($saved): ?><div id="qr-saved" class="qr-selected" hidden>
          <strong><?php echo check_plain($saved['account_name']); ?></strong>
          <p><?php echo check_plain($saved['bank_name'] . ' · ' . $saved['account_no']); ?></p>
        </div><?php endif; ?>
        <?php $edit_url = !empty($profile_url) ? $profile_url : (!empty($variables['profile_url']) ? $variables['profile_url'] : url('user/' . $GLOBALS['user']->uid . '/edit')); ?>
        <p class="qr-hint"><a href="<?php echo check_plain($edit_url); ?>" target="_blank" rel="noopener noreferrer" class="qr-profile-link"><?php echo $saved ? '👉 Chỉnh sửa tài khoản mặc định trong hồ sơ' : '👉 Nhập và lưu tài khoản mặc định trong hồ sơ'; ?> (mở tab mới)</a></p>
        <div id="qr-personal" <?php echo $company || $saved ? 'hidden' : ''; ?>>
          <label for="qr-bank">Ngân hàng</label><select id="qr-bank" name="bank_bin"><option value="">-- Chọn ngân hàng --</option><?php foreach ($banks as $bin => $name): ?><option value="<?php echo check_plain($bin); ?>"><?php echo check_plain($name); ?></option><?php endforeach; ?></select>
          <?php if (!$banks): ?><p class="qr-hint">Chưa tải được danh sách ngân hàng. Vui lòng tải lại trang sau ít phút.</p><?php endif; ?>
          <div class="qr-row"><div><label for="qr-account">Số tài khoản</label><input id="qr-account" name="account_no" inputmode="numeric" maxlength="19"></div>
          <div><label for="qr-owner">Tên chủ tài khoản</label><input id="qr-owner" class="qr-account-owner" name="account_name" maxlength="50" autocapitalize="characters"></div></div>
          <p class="qr-hint">Tên chủ tài khoản tự chuyển thành CHỮ HOA, chưa xác minh với ngân hàng. Tài khoản này chỉ dùng cho lần tạo QR, không thay đổi tài khoản mặc định.</p>
        </div>
      </section>
      <section>
        <h3><span>3</span> Nội dung thu tiền</h3>
        <div class="qr-row"><div><label for="qr-amount">Số tiền cần thu (VND)</label><input id="qr-amount" name="amount" inputmode="numeric" maxlength="17" required placeholder="Ví dụ: 1.500.000"></div>
        <div><label for="qr-invoice">Lấy hóa đơn</label><select id="qr-invoice" name="invoice_option" required><option value="">-- Chọn hóa đơn --</option><option value="CHD">Có hóa đơn</option><option value="KHD">Không hóa đơn</option></select></div></div>
        <p id="qr-sale" class="qr-hint">Chọn vé để lấy giá bán tham chiếu.</p>
        <button type="button" id="qr-reset-price" class="qr-link-button" disabled>Lấy lại giá bán gốc</button>
        <label for="qr-content">Nội dung chuyển khoản</label><input id="qr-content" name="base_content" maxlength="50" required placeholder="Ví dụ: CODE CHD DL TENDAILY hoặc CODE VMB CHD NGUYEN VAN A">
        <p class="qr-hint">Tối đa 50 ký tự. Quang Trang: [Mã vé] [CHD/KHD] DL [Tên đại lý]. Khách chuyển: [Mã vé] VMB [CHD/KHD] [Tên khách].</p>
        <p class="qr-final-content">Nội dung cuối: <strong id="qr-final-description">—</strong></p>
        <p class="qr-hint">Số tiền có thể chỉnh để thu cọc hoặc thu phần còn lại. Tạo QR không thay đổi giá vé, số dư hay trạng thái thanh toán.</p>
        <button type="submit" id="qr-generate" class="qr-primary">Tạo mã QR</button>
      </section>
    </form>
    <aside class="qr-preview-panel" aria-label="Xem trước thông tin thanh toán">
      <div class="qr-preview-heading"><h3>Ảnh gửi khách</h3><span id="qr-preview-state">Chưa tạo QR</span></div>
      <div id="qr-empty" class="qr-empty"><span aria-hidden="true">▦</span><strong>QR thanh toán sẽ hiển thị tại đây</strong><p>Kiểm tra số tiền, người nhận và hóa đơn trước khi tạo.</p></div>
      <canvas id="qr-canvas" hidden aria-label="Thẻ QR thanh toán"></canvas>
      <div class="qr-export-actions"><button type="button" id="qr-download" class="qr-export" disabled>Tải ảnh thanh toán</button><button type="button" id="qr-copy" class="qr-export" disabled>Sao chép thông tin</button></div>
      <textarea id="qr-copy-fallback" rows="9" readonly hidden aria-label="Chọn và sao chép thông tin thanh toán"></textarea>
      <p class="qr-hint">QR phục vụ chuyển khoản. Chọn “Có hóa đơn” không đồng nghĩa hóa đơn đã được phát hành.</p>
    </aside>
  </div>
</div>
