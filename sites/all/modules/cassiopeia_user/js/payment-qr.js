(function ($) {
  'use strict';
  $(function () {
    $('.qr-account-owner').on('input blur', function () {
      var start = this.selectionStart, end = this.selectionEnd;
      this.value = this.value.toUpperCase();
      this.setSelectionRange(start, end);
    });
    var root = $('.qt-payment-qr'), config = Drupal.settings.paymentQr;
    if (!root.length || !config) { return; }
    var draftVersion = 0;
    var snapshot = null, summaryText = '', preparing = false;
    var canvas = document.getElementById('qr-canvas');
    function message(text) { $('#qr-message').text(text); }
    function money(raw) {
      raw = $.trim(raw);
      if (/^[1-9]\d{0,2}(?:\.\d{3})+$/.test(raw)) { raw = raw.replace(/\./g, ''); }
      return /^\d{1,13}$/.test(raw) ? raw.replace(/^0+/, '') : '';
    }
    function formatMoney(raw) { return String(raw).replace(/\B(?=(\d{3})+(?!\d))/g, '.'); }
    function ascii(text) {
      text = text.replace(/đ/g, 'd').replace(/Đ/g, 'D');
      if (text.normalize) { text = text.normalize('NFD').replace(/[\u0300-\u036f]/g, ''); }
      return $.trim(text).replace(/\s+/g, ' ').toUpperCase();
    }
    function getCurrentCode() {
      return $.trim($('#qr-pnr').val());
    }
    function getCurrentCustomer() {
      var rawName = ascii($('#qr-passenger').val());
      return rawName.split(',')[0].trim();
    }
    function formatContent(code, invoice, mode, customer) {
      if (!mode) {
        mode = $('input[name=mode]:checked').val() || 'company';
      }
      code = ascii(code || '').replace(/[^A-Z0-9 ]/g, '');
      var parts = [];
      if (code) { parts.push(code); }

      if (mode === 'company') {
        // Tài khoản Quang Trang: [CODE] [CHD|KHD] DL [TENDAILY]
        if (invoice) { parts.push(invoice); }
        parts.push('DL');
        var agency = config.agencyName || config.agencyCode || '';
        if (agency) { parts.push(agency); }
      } else {
        // Tài khoản nhận tiền của đại lý (khách hàng thanh toán): [CODE] VMB [CHD|KHD] [TENKHACHHANG]
        parts.push('VMB');
        if (invoice) { parts.push(invoice); }
        if (!customer) {
          customer = getCurrentCustomer();
        }
        customer = ascii(customer || '').replace(/[^A-Z0-9 ]/g, '');
        if (customer) { parts.push(customer); }
      }
      return parts.join(' ').replace(/\s+/g, ' ').slice(0, 50);
    }
    function syncInvoiceToContent(invoice) {
      var current = ascii($('#qr-content').val());
      if (!current) {
        $('#qr-content').val(formatContent(getCurrentCode(), invoice));
        return;
      }
      if (/\b(?:CHD|KHD)\b/.test(current)) {
        if (invoice) {
          current = current.replace(/\b(?:CHD|KHD)\b/, invoice);
        } else {
          current = current.replace(/\b(?:CHD|KHD)\b\s*/, '');
        }
      } else if (invoice) {
        if (/\bDL\b/.test(current)) {
          current = current.replace(/\bDL\b/, invoice + ' DL');
        } else if (/\bVMB\b/.test(current)) {
          current = current.replace(/\bVMB\b/, 'VMB ' + invoice);
        } else {
          current = current + ' ' + invoice;
        }
      }
      $('#qr-content').val(current.replace(/\s+/g, ' ').slice(0, 50));
    }
    function updateDescription() {
      var base = ascii($('#qr-content').val()), invoice = $('#qr-invoice').val();
      if (!base) {
        $('#qr-final-description').text('—');
      } else if (!invoice) {
        $('#qr-final-description').text(base + ' · Chưa chọn hóa đơn (CHD/KHD)');
      } else {
        $('#qr-final-description').text(base);
      }
    }
    function setHidden(target, hidden) {
      var $el = $(target);
      $el.prop('hidden', !!hidden);
      if (hidden) {
        $el.attr('hidden', 'hidden');
      } else {
        $el.removeAttr('hidden');
      }
      return $el;
    }
    function invalidate() {
      draftVersion += 1;
      snapshot = null;
      summaryText = '';
      $('.qr-export').prop('disabled', true);
      setHidden('#qr-canvas, #qr-copy-fallback', true);
      root.find('.qr-manual-save').remove();
      setHidden('#qr-empty', false);
      $('#qr-preview-state').text('Cần tạo QR');
      updateDescription();
    }
    function modeFields() {
      var mode = $('input[name=mode]:checked').val(), personal = mode === 'personal';
      setHidden('#qr-personal', !personal);
      setHidden('#qr-company', mode !== 'company');
      setHidden('#qr-saved', mode !== 'saved');
      $('#qr-bank, #qr-account, #qr-owner').prop('required', personal).prop('disabled', !personal);
    }
    function fillBooking(item) {
      if (!item) { return; }
      if (item.passenger_name || item.passenger_summary) {
        var pName = item.passenger_name || item.passenger_summary.split(',')[0].trim();
        $('#qr-passenger').val(pName);
      }
      var code = item.ticket_code || item.pnrs || item.booking_code || '';
      if (code) {
        code = code.replace(/[^A-Z0-9]/gi, '').slice(0, 6).toUpperCase();
        $('#qr-pnr').val(code);
      }
      if (item.sale_amount) {
        $('#qr-amount').val(formatMoney(item.sale_amount));
      }
      $('#qr-content').val(formatContent(code, $('#qr-invoice').val(), null, $('#qr-passenger').val()));
      updateDescription();
    }
    $('#qr-pnr').on('input blur', function () {
      var start = this.selectionStart, end = this.selectionEnd;
      this.value = this.value.toUpperCase().replace(/[^A-Z0-9]/g, '').slice(0, 6);
      if (this.setSelectionRange) {
        this.setSelectionRange(Math.min(start, 6), Math.min(end, 6));
      }
      $('#qr-content').val(formatContent(this.value, $('#qr-invoice').val(), null, getCurrentCustomer()));
      updateDescription();
    });
    $('#qr-passenger').on('input', function () {
      if ($('input[name=mode]:checked').val() !== 'company') {
        $('#qr-content').val(formatContent(getCurrentCode(), $('#qr-invoice').val(), null, this.value));
        updateDescription();
      }
    });
    $('#qr-invoice').on('change', function () {
      syncInvoiceToContent(this.value);
      updateDescription();
    });
    $('input[name=mode]').on('change', function () {
      modeFields();
      var code = getCurrentCode();
      $('#qr-content').val(formatContent(code, $('#qr-invoice').val(), this.value));
      updateDescription();
    });
    $('#qr-form').on('input change', 'input[name], select[name], textarea[name]', invalidate);
    var amountPrevious = '';
    $('#qr-amount').on('focus', function () { amountPrevious = this.value; });
    $('#qr-amount').on('input blur', function (event) {
      var type = event.originalEvent && event.originalEvent.inputType;
      // Regroup existing separators when typing/deleting; validate pasted amounts as a whole.
      var editing = money(amountPrevious) && ((type === 'insertText' && /^\d+$/.test(event.originalEvent.data))
        || (type && type.indexOf('delete') === 0));
      var raw = money(editing ? this.value.replace(/\./g, '') : this.value);
      amountPrevious = this.value;
      if (!raw) { return; }
      var rightDigits = this.value.slice(this.selectionStart).replace(/\D/g, '').length;
      this.value = formatMoney(raw);
      amountPrevious = this.value;
      var caret = this.value.length;
      while (caret > 0 && rightDigits > 0) { if (/\d/.test(this.value.charAt(--caret))) { rightDigits--; } }
      if (event.type === 'input') { this.setSelectionRange(caret, caret); }
    });
    function makeSummary(data) {
      var t = data.ticket_summary, a = data.recipient;
      return ['THÔNG TIN THANH TOÁN', 'Mã đặt chỗ: ' + [t.booking_code, t.pnrs].filter(Boolean).join(' / '),
        'Hành khách: ' + t.passenger_summary, t.itinerary_summary,
        'Số tiền: ' + formatMoney(data.amount) + ' VND', 'Ngân hàng: ' + a.bank_name,
        'Số tài khoản: ' + a.account_no, 'Chủ tài khoản: ' + a.account_name,
        'Hóa đơn: ' + data.invoice_label, 'Nội dung: ' + data.description,
        t.expires_at ? 'Hạn giữ chỗ: ' + t.expires_at + ' (QR không tự hết hạn)' : ''].filter(Boolean).join('\n');
    }
    function drawCard(data, image) {
      canvas.width = 800;
      var ctx = canvas.getContext('2d'), lines = [], t = data.ticket_summary, a = data.recipient;
      ctx.font = '22px Arial';
      function wrap(text) {
        String(text).split('\n').forEach(function (paragraph) {
          var line = '';
          // Split long identifiers as well as words, so no customer information is clipped.
          Array.from(paragraph).forEach(function (char) {
            if (ctx.measureText(line + char).width > 696) { lines.push(line); line = char; }
            else { line += char; }
          });
          if (line) { lines.push(line); }
        });
      }
      wrap('Nội dung: ' + data.description);
      wrap('Hóa đơn: ' + data.invoice_label);
      wrap('Mã đặt chỗ: ' + [t.booking_code, t.pnrs].filter(Boolean).join(' / '));
      wrap('Hành khách: ' + t.passenger_summary);
      if (t.itinerary_summary) { wrap(t.itinerary_summary); }
      if (t.expires_at) { wrap('Hạn giữ chỗ: ' + t.expires_at + ' · QR không tự hết hạn'); }
      if (t.status === 'manual') { wrap('Thông tin vé do đại lý cung cấp'); }
      canvas.height = 850 + lines.length * 34;
      ctx.fillStyle = '#ffffff'; ctx.fillRect(0, 0, canvas.width, canvas.height);
      ctx.fillStyle = '#176454'; ctx.fillRect(0, 0, 800, 10);
      ctx.textAlign = 'center'; ctx.font = 'bold 28px Arial';
      ctx.fillText('THÔNG TIN THANH TOÁN', 400, 60);
      ctx.font = 'bold 44px Arial'; ctx.fillText(formatMoney(data.amount) + ' VND', 400, 125);
      ctx.fillStyle = '#33483e'; ctx.font = '22px Arial'; ctx.fillText(a.bank_name, 400, 172);
      ctx.font = 'bold 28px Arial'; ctx.fillText(a.account_no, 400, 211);
      ctx.font = '22px Arial';
      var ownerSize = 22;
      while (ctx.measureText(a.account_name).width > 700 && ownerSize > 14) { ctx.font = (--ownerSize) + 'px Arial'; }
      ctx.fillText(a.account_name, 400, 247);
      ctx.drawImage(image, 160, 272, 480, 480);
      ctx.fillStyle = '#176454'; ctx.font = '20px Arial'; ctx.fillText('QUÉT ĐỂ CHUYỂN KHOẢN', 400, 790);
      ctx.textAlign = 'left'; ctx.fillStyle = '#33483e'; ctx.font = '22px Arial';
      lines.forEach(function (line, index) { ctx.fillText(line, 52, 839 + index * 34); });
    }
    $('#qr-form').on('submit', function (event) {
      event.preventDefault();
      if (preparing) { return; }
      var passenger = $.trim($('#qr-passenger').val());
      if (!passenger) { message('Vui lòng nhập tên hành khách / người thanh toán.'); $('#qr-passenger').focus(); return; }
      var pnr = $.trim($('#qr-pnr').val()).toUpperCase().replace(/[^A-Z0-9]/g, '');
      if (pnr.length > 6) {
        message('Mã đặt chỗ tối đa 6 ký tự.');
        $('#qr-pnr').focus();
        return;
      }
      var amount = money($('#qr-amount').val());
      if (!amount) { message('Nhập số tiền VND nguyên dương, tối đa 13 chữ số.'); $('#qr-amount').focus(); return; }
      var invoice = $('#qr-invoice').val();
      if (!invoice) {
        message('Vui lòng chọn thông tin lấy hóa đơn.');
        $('#qr-invoice').focus();
        return;
      }
      var base = ascii($('#qr-content').val());
      if (!/^[A-Z0-9][A-Z0-9 ]{2,49}$/.test(base)) {
        message('Nội dung chuyển khoản từ 3 đến 50 ký tự chữ, số và khoảng trắng.');
        $('#qr-content').focus();
        return;
      }
      if (!/\b(?:CHD|KHD)\b/.test(base)) {
        syncInvoiceToContent(invoice);
        base = ascii($('#qr-content').val());
      }
      invalidate();
      var version = draftVersion, input = {token: config.token, source: 'manual', booking_id: '', amount: amount,
        mode: $('input[name=mode]:checked').val(), invoice_option: $('#qr-invoice').val(), base_content: base,
        bank_bin: $('#qr-bank').val(), account_no: $('#qr-account').val(), account_name: $('#qr-owner').val(),
        passenger: passenger, pnr: pnr, itinerary: ''};
      preparing = true; $('#qr-generate').prop('disabled', true).text('Đang tạo QR…'); message('Đang tạo QR, vui lòng đợi.');
      $.ajax({url: config.prepareUrl, method: 'POST', dataType: 'json', data: input}).done(function (result) {
        if (version !== draftVersion) { message('Thông tin đã thay đổi. Vui lòng tạo lại QR.'); return; }
        if (!result.snapshot || !result.png_data_uri) { message(result.error || 'Không nhận được QR hợp lệ.'); return; }
        var image = new Image();
        image.onload = function () {
          if (version !== draftVersion) { return; }
          try { drawCard(result.snapshot, image); }
          catch (e) { message('Không thể dựng ảnh thanh toán. Vui lòng thử lại.'); return; }
          snapshot = result.snapshot; summaryText = makeSummary(snapshot);
          $('#qr-final-description').text(snapshot.description);
          setHidden('#qr-canvas', false);
          setHidden('#qr-empty', true);
          $('#qr-preview-state').text('Sẵn sàng tải'); $('.qr-export').prop('disabled', false);
          message('Đã tạo QR. Kiểm tra thông tin trên ảnh trước khi gửi khách.');
        };
        image.onerror = function () { if (version === draftVersion) { message('Không đọc được ảnh QR. Vui lòng tạo lại.'); } };
        image.src = result.png_data_uri;
      }).fail(function (xhr) {
        if (version === draftVersion) { message(xhr.responseJSON && xhr.responseJSON.error ? xhr.responseJSON.error : 'Không thể tạo QR. Vui lòng thử lại hoặc tải lại trang.'); }
      }).always(function () { preparing = false; $('#qr-generate').prop('disabled', false).text('Tạo mã QR'); });
    });
    $('#qr-copy').on('click', function () {
      if (!snapshot) { return; }
      var version = draftVersion, text = summaryText;
      function fallback() {
        if (version !== draftVersion) { return; }
        setHidden('#qr-copy-fallback', false).val(text).focus().select();
        message('Chọn và sao chép nội dung trong ô bên dưới ảnh.');
      }
      if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(text).then(function () { if (version === draftVersion) { message('Đã sao chép thông tin thanh toán.'); } }, fallback);
      } else { fallback(); }
    });
    $('#qr-download').on('click', function () {
      if (!snapshot) { return; }
      var version = draftVersion;
      if (!canvas.toBlob || !('download' in document.createElement('a'))) {
        var image = $('<img>').attr('src', canvas.toDataURL('image/png')).attr('alt', 'Ảnh QR để lưu thủ công');
        root.find('.qr-manual-save').remove(); image.addClass('qr-manual-save').css('width', '100%').appendTo(root);
        message('Nhấn giữ hoặc bấm chuột phải trên ảnh cuối trang để lưu.'); return;
      }
      canvas.toBlob(function (blob) {
        if (version !== draftVersion || !snapshot) { return; }
        if (!blob) { message('Không thể xuất ảnh. Vui lòng thử lại.'); return; }
        var url = URL.createObjectURL(blob), link = document.createElement('a');
        link.href = url; link.download = 'QR-thanh-toan-' + snapshot.invoice_option + '.png';
        document.body.appendChild(link); link.click(); document.body.removeChild(link);
        setTimeout(function () { URL.revokeObjectURL(url); }, 1000);
      }, 'image/png');
    });
    modeFields();
    if (config.selected) { fillBooking(config.selected); }
    updateDescription();
  });
})(jQuery);
