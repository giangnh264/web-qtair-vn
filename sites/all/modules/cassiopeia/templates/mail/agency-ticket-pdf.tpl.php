<?php

/**
 * @var array $context
 */
$context = !empty($context) && is_array($context) ? $context : array();
$airline = !empty($context['airline']) ? $context['airline'] : array();
$color = !empty($airline['color']) ? $airline['color'] : '#1d5f4d';
$pnr_code = !empty($context['pnr_code']) ? (string) $context['pnr_code'] : '';
$pnr_badge_width = max(102, strlen($pnr_code) * 12 + 30);
$qr_size = 60;
$flight_icon_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 512 512"><path fill="' . $color . '" d="M512 297.287V362.789C512 373.414 501.812 381.102 491.594 378.164L320 329.133V400.01L377.594 443.197C381.625 446.229 384 450.979 384 456.01V496.012C384 506.418 374.219 514.043 364.125 511.512L256 480.012L147.875 511.512C137.781 514.043 128 506.418 128 496.012V456.01C128 450.979 130.375 446.229 134.406 443.197L192 400.01V329.133L20.391 378.164C10.172 381.102 0 373.414 0 362.789V297.287C0 292.162 3.609 285.943 8.062 283.381L192 178.285V96.002C192 60.658 220.656 0 256 0S320 60.658 320 96.002V178.285L503.938 283.412C508.922 286.256 512 291.568 512 297.287Z"/></svg>';
$flight_icon_data_uri = 'data:image/svg+xml;base64,' . base64_encode($flight_icon_svg);
$esc = function ($value) {
    return check_plain((string) $value);
};
?>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <style>
        * { box-sizing: border-box; }
        body { font-family: dejavusans, sans-serif; color: #333333; background: #f0f2f5; font-size: 11px; line-height: 1.45; }
        .container { width: 100%; background: #ffffff; padding: 24px; }
        .banner { margin: -24px -24px 22px -24px; border-bottom: 2px solid <?php print $color; ?>; }
        .banner img { width: 100%; height: auto; display: block; }
        .booking-table, .flight-layout, .footer-layout, .bottom-meta { width: 100%; border-collapse: collapse; }
        .booking-table { margin-bottom: 0; }
        .booking-table td { vertical-align: middle; padding: 0; }
        .booking-info { vertical-align: top !important; }
        .booking-heading { font-size: 22px; font-weight: bold; line-height: 1.2; margin: 0 0 15px; }
        .booking-code-status { width: auto; border-collapse: separate; border-spacing: 0; }
        .booking-code-status td { vertical-align: middle; white-space: nowrap; }
        .booking-code-badge-cell { padding: 0 !important; }
        .booking-code-badge-svg { display: block; height: 39px; }
        .booking-status-gap { width: 15px; }
        .booking-status { color: <?php print $color; ?>; font-size: 16px; font-weight: bold; line-height: 1.2; }
        .qr { width: 70px; text-align: right; vertical-align: top !important; }
        .qr img { display: block; width: <?php print $qr_size; ?>px !important; height: <?php print $qr_size; ?>px !important; max-width: <?php print $qr_size; ?>px; max-height: <?php print $qr_size; ?>px; margin-left: auto; }
        .section-title { color: #333333; font-size: 16px; font-weight: bold; margin: 20px 0 10px; }
        .data-table { width: 100%; border-collapse: collapse; border: 1px solid <?php print $color; ?>; margin-bottom: 18px; }
        .data-table th { background: <?php print $color; ?>; color: #ffffff; text-align: left; padding: 9px 10px; font-weight: bold; }
        .data-table td { background: #ffffff; padding: 9px 10px; border-bottom: 1px solid #e0e0e0; vertical-align: top; }
        .data-table tr:last-child td { border-bottom: 0; }
        .flight-card { border: 1px solid <?php print $color; ?>; margin-bottom: 18px; page-break-inside: avoid; }
        .flight-header { background: <?php print $color; ?>; color: #ffffff; padding: 9px 12px; }
        .flight-header-table { width: 100%; border-collapse: collapse; color: #ffffff; }
        .flight-header-table td { vertical-align: middle; color: #ffffff; }
        .airline-icon { width: 25px; height: 25px; vertical-align: middle; margin-right: 6px; }
        .flight-airline { font-weight: bold; }
        .flight-body { background: #f5f9f8; padding: 16px 10px; }
        .flight-point { width: 32%; text-align: center; vertical-align: top; }
        .flight-point .date { font-size: 11px; margin-bottom: 4px; }
        .flight-point .city { color: <?php print $color; ?>; font-size: 17px; font-weight: bold; margin-bottom: 3px; }
        .flight-point .airport { color: #666666; font-size: 10px; margin-bottom: 6px; }
        .flight-point .time { font-weight: bold; }
        .flight-path { width: 36%; text-align: center; vertical-align: middle; color: <?php print $color; ?>; }
        .flight-path-table { width: 100%; border-collapse: collapse; }
        .flight-path-table td { padding: 0; vertical-align: middle; }
        .path-line-cell { width: 40%; height: 1px; border-top: 2px dashed #d1c098; }
        .path-icon-cell { width: 20%; text-align: center; }
        .path-icon { width: 28px; height: 28px; display: block; }
        .duration-row td { padding-top: 8px; text-align: center; }
        .duration-pill { display: table; margin: 0 auto; background: #e2ece9; color: <?php print $color; ?>; border-radius: 12px; padding: 3px 9px; font-size: 10px; white-space: nowrap; }
        .notes { margin: 8px 0 18px; color: #666666; }
        .notes-title { color: #666666; font-size: 14px; font-weight: bold; margin-bottom: 7px; }
        .info-icon { display: inline-block; width: 16px; height: 16px; vertical-align: -3px; margin-right: 4px; }
        .notes ul { margin: 0; padding-left: 20px; }
        .notes li { margin-bottom: 4px; }
        .footer { background: <?php print $color; ?>; color: #ffffff; padding: 14px 18px; border-radius: 6px; page-break-inside: avoid; }
        .footer-layout td { color: #ffffff; vertical-align: top; }
        .company-name { font-size: 14px; font-weight: bold; text-transform: uppercase; margin-bottom: 5px; }
        .contact { text-align: right; font-size: 11px; }
        .contact div { margin-bottom: 3px; }
        .bottom-meta { color: #999999; font-size: 9px; border-top: 1px solid #e0e0e0; margin-top: 12px; padding-top: 8px; }
        .bottom-meta td { vertical-align: top; }
        .right { text-align: right; }
    </style>
</head>
<body>
<div class="container">
    <div class="banner">
        <?php if (!empty($context['banner_data_uri'])): ?>
            <img src="<?php print $context['banner_data_uri']; ?>" alt="<?php print $esc(!empty($airline['name']) ? $airline['name'] : 'QTair'); ?>">
        <?php else: ?>
            <div style="height: 40px; background: <?php print $color; ?>;"></div>
        <?php endif; ?>
    </div>

    <table class="booking-table">
        <tr>
            <td class="booking-info">
                <div class="booking-heading">MÃ ĐẶT CHỖ</div>
                <table class="booking-code-status">
                    <tr>
                        <td class="booking-code-badge-cell">
                            <svg class="booking-code-badge-svg" width="<?php print $pnr_badge_width; ?>" height="39" viewBox="0 0 <?php print $pnr_badge_width; ?> 39" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <rect x="0" y="0" width="<?php print $pnr_badge_width; ?>" height="39" rx="6" fill="#dc9d1f"/>
                                <text x="15" y="25" fill="#ffffff" font-family="DejaVu Sans" font-size="18" font-weight="bold" letter-spacing="1"><?php print $esc($pnr_code); ?></text>
                            </svg>
                        </td>
                        <td class="booking-status-gap"></td>
                        <td class="booking-status">• <?php print $esc(!empty($context['status']) ? $context['status'] : ''); ?></td>
                    </tr>
                </table>
            </td>
            <td class="qr">
                <?php if (!empty($context['qr_data_uri'])): ?>
                    <img src="<?php print $context['qr_data_uri']; ?>" width="<?php print $qr_size; ?>" height="<?php print $qr_size; ?>" style="display:block;width:<?php print $qr_size; ?>px;height:<?php print $qr_size; ?>px;" alt="QR Code">
                <?php endif; ?>
            </td>
        </tr>
    </table>

    <?php if (!empty($context['passengers'])): ?>
        <div class="section-title">Thông tin hành khách</div>
        <table class="data-table">
            <thead>
            <tr>
                <th style="width: 8%;">Stt</th>
                <th style="width: 52%;">Tên hành khách</th>
                <th style="width: 40%;">Hành lý</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($context['passengers'] as $index => $passenger): ?>
                <tr>
                    <td><?php print sprintf('%02d', $index + 1); ?></td>
                    <td>
                        <strong><?php print $esc($passenger['name']); ?></strong>
                        <?php if (!empty($passenger['ticket_number'])): ?><br><span style="font-size: 10px;">TKT - <?php print $esc($passenger['ticket_number']); ?></span><?php endif; ?>
                    </td>
                    <td><?php print $esc($passenger['baggage']); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <?php if (!empty($context['flights'])): ?>
        <div class="section-title">Thông tin chuyến bay</div>
        <?php foreach ($context['flights'] as $flight): ?>
            <div class="flight-card">
                <div class="flight-header">
                    <table class="flight-header-table">
                        <tr>
                            <td>
                                <?php if (!empty($context['icon_data_uri'])): ?><img class="airline-icon" src="<?php print $context['icon_data_uri']; ?>" alt=""><?php endif; ?>
                                <span class="flight-airline"><?php print $esc($flight['airline_name']); ?></span>
                            </td>
                            <td class="right">
                                Chuyến bay: <?php print $esc($flight['flight_number']); ?><?php if ($flight['class'] !== ''): ?> • <?php print $esc($flight['class']); ?><?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="flight-body">
                    <table class="flight-layout">
                        <tr>
                            <td class="flight-point">
                                <div class="date"><?php print $esc($flight['start_date']); ?></div>
                                <div class="city"><?php print $esc($flight['start_city']); ?></div>
                                <div class="airport"><?php print $esc($flight['start_code']); ?></div>
                                <div class="time">Khởi hành: <?php print $esc($flight['start_time']); ?></div>
                            </td>
                            <td class="flight-path">
                                <table class="flight-path-table">
                                    <tr>
                                        <td class="path-line-cell"></td>
                                        <td class="path-icon-cell">
                                            <img class="path-icon" src="<?php print $flight_icon_data_uri; ?>" alt="">
                                        </td>
                                        <td class="path-line-cell"></td>
                                    </tr>
                                    <?php if ($flight['duration'] !== ''): ?>
                                        <tr class="duration-row">
                                            <td colspan="3"><div class="duration-pill"><?php print $esc($flight['duration']); ?></div></td>
                                        </tr>
                                    <?php endif; ?>
                                </table>
                            </td>
                            <td class="flight-point">
                                <div class="date"><?php print $esc($flight['end_date']); ?></div>
                                <div class="city"><?php print $esc($flight['end_city']); ?></div>
                                <div class="airport"><?php print $esc($flight['end_code']); ?></div>
                                <div class="time">Hạ cánh: <?php print $esc($flight['end_time']); ?></div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <div class="notes">
        <div class="notes-title">
            <svg class="info-icon" viewBox="0 0 24 24" aria-hidden="true">
                <path fill="#666666" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
            </svg>
            Lưu ý
        </div>
        <ul>
            <li>Quý khách vui lòng tới sân bay trước 90 phút chuyến bay nội địa, và 180 phút cho chuyến bay quốc tế để làm thủ tục check-in.</li>
            <li>Giấy tờ tuỳ thân: CCCD (còn hạn), Hộ Chiếu (passport), Thẻ Đảng,...</li>
            <li>Với trẻ em dưới 14 tuổi phải có Giấy Khai Sinh bản gốc hoặc bản sao y trích lục.</li>
            <li>Với trẻ em trên 14 tuổi chưa làm giấy CCCD thì sử dụng giấy xác nhận nhân thân có giá trị trong vòng 30 ngày.</li>
            <li>Với trẻ sơ sinh: Nếu chưa có giấy khai sinh thì sử dụng giấy chứng sinh có giá trị trong vòng 30 ngày.</li>
        </ul>
    </div>

    <?php if (!empty($context['agency']['name']) || !empty($context['agency']['address']) || !empty($context['agency']['phone']) || !empty($context['agency']['email'])): ?>
        <div class="footer">
            <table class="footer-layout">
                <tr>
                    <td>
                        <?php if (!empty($context['agency']['name'])): ?><div class="company-name"><?php print $esc($context['agency']['name']); ?></div><?php endif; ?>
                        <?php if (!empty($context['agency']['address'])): ?><div><strong>Địa chỉ:</strong> <?php print $esc($context['agency']['address']); ?></div><?php endif; ?>
                    </td>
                    <td class="contact">
                        <?php if (!empty($context['agency']['phone'])): ?><div><strong>Điện thoại:</strong> <?php print $esc($context['agency']['phone']); ?></div><?php endif; ?>
                        <?php if (!empty($context['agency']['email'])): ?><div><strong>Email:</strong> <?php print $esc($context['agency']['email']); ?></div><?php endif; ?>
                    </td>
                </tr>
            </table>
        </div>
    <?php endif; ?>

    <table class="bottom-meta">
        <tr>
            <td><?php print $esc($context['pnr_code']); ?></td>
            <td class="right"><?php print date('H:i d/m/Y'); ?><br>Trang 1 / 1</td>
        </tr>
    </table>
</div>
</body>
</html>
