<?php
drupal_session_start();

function cassiopeia_vn_adult_identity_fields($adult, $today = NULL, $departure_date = NULL) {
    $birthday = trim(isset($adult->birth_day) ? $adult->birth_day : '');
    $number = trim(isset($adult->cccd_number) ? $adult->cccd_number : '');
    $expiry = trim(isset($adult->cccd_expiry) ? $adult->cccd_expiry : '');

    $birthday_date = DateTime::createFromFormat('!d/m/Y', $birthday);
    if (!$birthday_date || $birthday_date->format('d/m/Y') !== $birthday) {
        throw new InvalidArgumentException('Ngày sinh không hợp lệ.');
    }
    if (!preg_match('/^[0-9]{1,12}$/', $number)) {
        throw new InvalidArgumentException('Số CCCD chỉ được nhập số và tối đa 12 ký tự.');
    }
    $expiry_date = DateTime::createFromFormat('!d/m/Y', $expiry);
    if (!$expiry_date || $expiry_date->format('d/m/Y') !== $expiry) {
        throw new InvalidArgumentException('Ngày hết hạn CCCD không hợp lệ.');
    }

    $today_date = $today === NULL ? new DateTime('today') : DateTime::createFromFormat('!d/m/Y', $today);
    if (!$today_date || $expiry_date < $today_date) {
        throw new InvalidArgumentException('CCCD đã hết hạn.');
    }
    if ($departure_date !== NULL) {
        $departure = DateTime::createFromFormat('!d/m/Y', $departure_date);
        if (!$departure || $birthday_date >= $departure || $birthday_date->diff($departure)->y < 12) {
            throw new InvalidArgumentException('Hành khách người lớn phải đủ 12 tuổi vào ngày khởi hành.');
        }
    }

    return array(
        'Birthday' => $birthday,
        'PassportNumber' => $number,
        'PassportExpiryDate' => $expiry,
    );
}

function cassiopeia_room_booking_complete_page_callback($booking) {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/page-hotel-room-booking-complete.tpl.php",array("booking"=>$booking));
}
function cassiopeia_room_booking_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/page-hotel-room-booking.tpl.php");
}
function cassiopeia_agent_profession_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/agent-profession.tpl.php");
}
function cassiopeia_booking_payment_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/page-booking-payment.tpl.php");
}
function cassiopeia_init_vnpay_page_callback($booking_code) {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/page-init-vnpay-booking.tpl.php",array("booking_code"=>$booking_code));
}
function cassiopeia_booking_issue_page_callback($booking_code) {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/page-issue-booking.tpl.php",array("booking_code"=>$booking_code));
}
function cassiopeia_booking_view_page_callback($booking_code) {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/page-view-booking.tpl.php",array("booking_code"=>$booking_code));
}

//function cassiopeia_detail_report_tab_1_call_back() {
////    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/detail-report/page-detail-report-tab-1.tpl.php");
////}
////function cassiopeia_detail_report_tab_2_call_back() {
////    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/detail-report/page-detail-report-tab-2.tpl.php");
////}
////function cassiopeia_detail_report_tab_3_call_back() {
////    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/detail-report/page-detail-report-tab-3.tpl.php");
////}
////function cassiopeia_detail_report_tab_4_call_back() {
////    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/detail-report/page-detail-report-tab-4.tpl.php");
////}
////function cassiopeia_detail_report_tab_5_call_back() {
////    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/detail-report/page-detail-report-tab-5.tpl.php");
////}


function cassiopeia_combo_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/page-combo.tpl.php");
}
function cassiopeia_admin_manager_addf_room_booking() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/page-add-room-booking.tpl.php");
}
function cassiopeia_hotel_room_booking_complete_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/page-hotel-room-booking-complete.tpl.php");
}
function cassiopeia_admin_manager_room_booking_fee() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/page-manager-room-booking-fee.tpl.php");
}

function cassiopeia_admin_manager_room() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/page-manager-hotel-room.tpl.php");
}



function cassiopeia_hotel_room_booking_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/page-hotel-room-booking.tpl.php");
}
function cassiopeia_hotel_search_page_callback() {
    if(!empty($_REQUEST['khu-vuc'])){
        $term = taxonomy_term_load($_REQUEST['khu-vuc']);
        return _cassiopeia_render_theme("module","cassiopeia","templates/pages/page-hotel-search.tpl.php",array("term"=>$term));
    }else{
        drupal_goto("hotel");
    }
}
function cassiopeia_hotel_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/page-hotel.tpl.php");
}
function cassiopeia_combo_dulich_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/S01 - Combo du lịch.html");
}
function cassiopeia_dao_tao_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/daotao.html");
}
function cassiopeia_landing_page_Partner_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/Partner.html");
}
function cassiopeia_ve_quoc_te_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/vequocte.html");
}
function cassiopeia_pao_sapa_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/pao_sapa.html");
}
function cassiopeia_tuyen_dung_tts_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/Tuyen-dung-TTS.html");
}
function cassiopeia_tuyen_dung_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/Tuyển dụng nhân sự.html");
}

function cassiopeia_baggage_manager_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/page-manager-baggage.tpl.php");
}


function cassiopeia_admin_test_call_back() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/page-manager-test.tpl.php");
}
function cassiopeia_manager_log_call_back() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/page-manager-log.tpl.php");
}
function cassiopeia_all_promotion_article_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/terms/page-all-promotion-article.tpl.php");
}
function cassiopeia_all_ticket_article_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/terms/page-all-ticket-article.tpl.php");
}
function cassiopeia_autic_family_article_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/terms/page-autic-family-article.tpl.php");
}
function cassiopeia_booking_vnpay_return_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/page-booking-vnpay-return.tpl.php");
}
function cassiopeia_booking_vnpay_init_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/page-booking-vnpay-init.tpl.php");
}
function cassiopeia_handbook_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/terms/page-tx-handbook.tpl.php");
}
function cassiopeia_manager_notify_call_back() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/page-manager-notify.tpl.php");
}
function cassiopeia_point_report_call_back() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/page-point-report.tpl.php");
}

function cassiopeia_detail_report_call_back() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/page-detail-report.tpl.php");
}
function cassiopeia_detail_room_booking_report_call_back() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/page-detail-room-booking-report.tpl.php");
}
function cassiopeia_transaction_report_call_back() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/page-transaction-report.tpl.php");
}




function cassiopeia_report_general_call_back() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/page-general-report.tpl.php");
}

function cassiopeia_transaction_kind_call_back() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/page-manager-transaction-kind.tpl.php");
}
function cassiopeia_banks_call_back() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/page-manager-banks.tpl.php");
}
function cassiopeia_payment_refund_report_call_back() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/page-payment-refund-report.tpl.php");
}
function cassiopeia_search_month_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/page-search-month.tpl.php");
}
function cassiopeia_add_booking() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/page-add-booking.tpl.php");
}
function cassiopeia_ticket_issue_detail_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/page-ticket-issue-detail.tpl.php");
}
function cassiopeia_khoan_muc_call_back() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/page-khoan-muc.tpl.php");
}
function cassiopeia_ticket_issue_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/page-ticket-issue.tpl.php");
}
function cassiopeia_booking_detailpage_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/page-booking-detail.tpl.php");
}
function cassiopeia_agent_password_reset_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/page-agent-password-reset.tpl.php");
}
function cassiopeia_agent_login_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/page-agent-login.tpl.php");
}
function cassiopeia_agent_register_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/page-agent-register.tpl.php");
}

function cassiopeia_admin_manager_airline() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/page-manager-airline.tpl.php");
}
function cassiopeia_admin_manager_airports() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/page-manager-airport.tpl.php");
}
function cassiopeia_admin_manager_partners_config() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/page-manager-partners-config.tpl.php");
}
function cassiopeia_admin_manager_ticket() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/page-manager-ticket.tpl.php");
}
function cassiopeia_admin_manager_customer() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/admin/page-manager-customer.tpl.php");
}

function cassiopeia_prebooking_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/page-prebooking.tpl.php");
}
function cassiopeia_flight_search_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/page-flight-search.tpl.php");
}
function cassiopeia_shopping_cart_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/page-shopping-cart.tpl.php");
}
function cassiopeia_home_page_callback() {
    return '';
}
function cassiopeia_admin_manager_order_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/page-admin-manager-order.tpl.php");
}
function cassiopeia_dev_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/pages/dev.tpl.php");
}
function cassiopeia_dashboard_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/dashboard.tpl.php");
}
function cassiopeia_test_page_callback() {
    return _cassiopeia_render_theme("module","cassiopeia","templates/test.tpl.php");
}


function cassiopeia_dev_config_form() {
    $form = array();
    $form['cassiopeia_dev_config_form_login_method'] = array(
        '#type' => "fieldset",
        '#title' => t('Đăng nhập'),
        '#collapsible' => TRUE,
        '#collapsed' => FALSE,
    );
    $form['cassiopeia_dev_config_form_login_method']['cassiopeia_dev_config_login_method'] = array(
        '#type' => 'checkboxes',
        '#options' => drupal_map_assoc(
            array(
                0 => t('User name'),
                1 => t('Email'),
                2 => t('Both'),
            )
        ),
        '#title' => t('Đăng nhập bằng?'),

    );
    return system_settings_form($form);
}
function cassiopeia_trai_nghiem_va_tiet_kiem_form() {
    $form = array();
    $form['cassiopeia_trai_nghiem_va_tiet_kiem_form_title'] = array(
        '#type' => "textfield",
        '#title' => t("Tiêu đề khối"),
        "#default_value" => variable_get('cassiopeia_trai_nghiem_va_tiet_kiem_form_title', ''),
    );
    $form['cassiopeia_trai_nghiem_va_tiet_kiem_form_des'] = array(
        '#type' => "textarea",
        '#title' => 'Mô tả',
        '#resizable' => TRUE,
        "#default_value" => variable_get('cassiopeia_trai_nghiem_va_tiet_kiem_form_des', ''),
    );
    $form['cassiopeia_trai_nghiem_va_tiet_kiem_form_background'] = array(
        '#type' => "managed_file",
        "#title" => 'Background',
        '#default_value' => variable_get('cassiopeia_trai_nghiem_va_tiet_kiem_form_background',""),
        '#upload_location' => 'public://',
    );
    $form['#submit'][] = 'cassiopeia_trai_nghiem_va_tiet_kiem_form_submit';
    return system_settings_form($form);

}

function cassiopeia_trai_nghiem_va_tiet_kiem_form_submit($form,&$form_state)
{
    global $langcode;
    if (isset($form_state['values']['cassiopeia_trai_nghiem_va_tiet_kiem_form_background'])) {
        $file = file_load($form_state['values']['cassiopeia_trai_nghiem_va_tiet_kiem_form_background']);
        if ($file) {
            $file->status = FILE_STATUS_PERMANENT;
            file_save($file);
            file_usage_add($file, 'cassiopeia', 'cassiopeia_trai_nghiem_va_tiet_kiem_form_background' . $langcode, $file->fid);
            variable_set('cassiopeia_trai_nghiem_va_tiet_kiem_form_background', $file->fid, $langcode);
        }
    } else {
        variable_del('cassiopeia_trai_nghiem_va_tiet_kiem_form_background', 0, $langcode);
    }
}
function cassiopeia_config_form() {

    $form = array();
    // Site inforemation
    $form['cassiopeia_config_site'] = array(
        '#type' => "fieldset",
        '#title' => t('Website information'),
        '#collapsible' => TRUE,
        '#collapsed' => FALSE,
    );

    $form['cassiopeia_config_site']['site_name'] = array(
        '#type' => "textfield",
        '#title' => t('Website name'),
        "#default_value" => variable_get('site_name', ''),
    );

    $form['cassiopeia_config_site']['site_mail'] = array(
        '#type' => "textfield",
        '#title' => t('Website Email'),
        "#default_value" => variable_get('site_mail', ''),
    );
    $form['cassiopeia_config_site']['site_address'] = array(
        '#type' => "textfield",
        '#title' => t('Website Address'),
        "#default_value" => variable_get('site_address', ''),
    );
    $form['cassiopeia_config_site']['site_tel'] = array(
        '#type' => "textfield",
        '#title' => t('Website Tel'),
        "#default_value" => variable_get('site_tel', ''),
    );

    $form['cassiopeia_config_site']['hotline'] = array(
        '#type' => "textfield",
        '#title' => t('Hotline'),
        "#default_value" => variable_get('hotline', ''),
    );
    $form['cassiopeia_config_site']['brach_address_1'] = array(
        '#type' => "textfield",
        '#title' => t('Địa chỉ cơ sở 1'),
        "#default_value" => variable_get('brach_address_1', ''),
    );
    $form['cassiopeia_config_site']['brach_address_2'] = array(
        '#type' => "textfield",
        '#title' => t('Địa chỉ cơ sở 2'),
        "#default_value" => variable_get('brach_address_2', ''),
    );
    $form['cassiopeia_config_site']['brach_address_3'] = array(
        '#type' => "textfield",
        '#title' => t('Địa chỉ cơ sở 3'),
        "#default_value" => variable_get('brach_address_3', ''),
    );
    $form['cassiopeia_config_site']['brach_address_4'] = array(
        '#type' => "textfield",
        '#title' => t('Địa chỉ cơ sở 4'),
        "#default_value" => variable_get('brach_address_4', ''),
    );
    $form['cassiopeia_config_site']['cassiopeia_config_site_logo_home'] = array(
        '#type' => "managed_file",
        "#title" => 'Logo Trang chủ',
        '#default_value' => variable_get('cassiopeia_config_site_logo_home',""),
        '#upload_location' => 'public://',
    );
    $form['cassiopeia_config_site']['cassiopeia_config_site_logo'] = array(
        '#type' => "managed_file",
        "#title" => 'Logo Site',
        '#default_value' => variable_get('cassiopeia_config_site_logo',""),
        '#upload_location' => 'public://',
    );
    $form['cassiopeia_config_site']['cassiopeia_config_img_popup'] = array(
        '#type' => "managed_file",
        "#title" => 'Popup Image',
        '#default_value' => variable_get('cassiopeia_config_img_popup',""),
        '#upload_location' => 'public://',
    );
    $form['cassiopeia_config_site']['link_popup'] = array(
        '#type' => "textfield",
        '#title' => t('Link Popup'),
        "#default_value" => variable_get('link_popup', ''),
    );
    $form['cassiopeia_config_site_banner'] = array(
        '#type' => "fieldset",
        '#title' => 'Banner trang',
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $form['cassiopeia_config_site_banner']['cassiopeia_config_site_banner_promotion_article'] = array(
        '#type' => "managed_file",
        "#title" => 'Trang khuyến mại',
        '#default_value' => variable_get('cassiopeia_config_site_banner_promotion_article',""),
        '#upload_location' => 'public://',
    );
    $form['cassiopeia_config_site_banner']['cassiopeia_config_site_banner_ticket_article'] = array(
        '#type' => "managed_file",
        "#title" => 'Trang vé máy bay',
        '#default_value' => variable_get('cassiopeia_config_site_banner_ticket_article',""),
        '#upload_location' => 'public://',
    );

    $form['cassiopeia_config_mail_template'] = array(
        '#type' => "fieldset",
        '#title' => 'Mail Templates',
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $cassiopeia_config_mail_template_send_account = variable_get('cassiopeia_config_mail_template_send_account', array(
        'value' => '',
        'format' => 'full_html'
    ));
    $form['cassiopeia_config_mail_template']['cassiopeia_config_mail_template_send_account'] = array(
        '#type' => "text_format",
        '#title' => 'Cấp tài khoản Đại Lý',
        '#resizable' => TRUE,
        '#format' => 'full_html',
        "#default_value" => $cassiopeia_config_mail_template_send_account['value'],
        '#description'  => "#name: tên giao dịch,#code : mã đại lý, #tel : số điện thoại đăng nhập, #pass : mật khẩu",
    );
    $form['cassiopeia_config_home_introduction'] = array(
        '#type' => "fieldset",
        '#title' => 'Khối giới thiệu trang chủ',
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $form['cassiopeia_config_home_introduction']['cassiopeia_config_home_introduction_left_image'] = array(
        '#type' => "managed_file",
        "#title" => 'Icon',
        '#default_value' => variable_get('cassiopeia_config_home_introduction_left_image',""),
        '#upload_location' => 'public://',
    );
    $form['cassiopeia_config_home_introduction']['cassiopeia_config_home_introduction_group_1'] = array(
        '#type' => "fieldset",
        '#title' => 'Nhóm 1',
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $form['cassiopeia_config_home_introduction']['cassiopeia_config_home_introduction_group_1']['cassiopeia_config_home_introduction_group_1_icon'] = array(
        '#type' => "managed_file",
        "#title" => 'Icon',
        '#default_value' => variable_get('cassiopeia_config_home_introduction_group_1_icon',""),
        '#upload_location' => 'public://',
    );
    $form['cassiopeia_config_home_introduction']['cassiopeia_config_home_introduction_group_1']['cassiopeia_config_home_introduction_group_1_title'] = array(
        '#type' => "textfield",
        '#title' => t('Tiêu đề'),
        "#default_value" => variable_get('cassiopeia_config_home_introduction_group_1_title', ''),
    );
    $form['cassiopeia_config_home_introduction']['cassiopeia_config_home_introduction_group_1']['cassiopeia_config_home_introduction_group_1_des'] = array(
        '#type' => "textarea",
        '#title' => 'Mô tả',
        '#resizable' => TRUE,
        "#default_value" => variable_get('cassiopeia_config_home_introduction_group_1_des', ''),
    );

    $form['cassiopeia_config_home_introduction']['cassiopeia_config_home_introduction_group_2'] = array(
        '#type' => "fieldset",
        '#title' => 'Nhóm 2',
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $form['cassiopeia_config_home_introduction']['cassiopeia_config_home_introduction_group_2']['cassiopeia_config_home_introduction_group_2_icon'] = array(
        '#type' => "managed_file",
        "#title" => 'Icon',
        '#default_value' => variable_get('cassiopeia_config_home_introduction_group_2_icon',""),
        '#upload_location' => 'public://',
    );
    $form['cassiopeia_config_home_introduction']['cassiopeia_config_home_introduction_group_2']['cassiopeia_config_home_introduction_group_2_title'] = array(
        '#type' => "textfield",
        '#title' => t('Tiêu đề'),
        "#default_value" => variable_get('cassiopeia_config_home_introduction_group_2_title', ''),
    );
    $form['cassiopeia_config_home_introduction']['cassiopeia_config_home_introduction_group_2']['cassiopeia_config_home_introduction_group_2_des'] = array(
        '#type' => "textarea",
        '#title' => 'Mô tả',
        '#resizable' => TRUE,
        "#default_value" => variable_get('cassiopeia_config_home_introduction_group_1_des', ''),
    );

    $form['cassiopeia_config_room_booking'] = array(
        '#type' => "fieldset",
        '#title' => 'Đặt phòng khách sạn',
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $cassiopeia_config_room_booking_content = variable_get('cassiopeia_config_room_booking_content', array(
        'value' => '',
        'format' => 'full_html'
    ));
    $form['cassiopeia_config_room_booking']['cassiopeia_config_room_booking_content'] = array(
        '#type' => "text_format",
        '#title' => 'Thông tin hỗ trợ đặt phòng',
        '#resizable' => TRUE,
        '#format' => 'full_html',
        "#default_value" => $cassiopeia_config_room_booking_content['value'],
    );
    $form['cassiopeia_config_booking'] = array(
        '#type' => "fieldset",
        '#title' => 'Đặt chỗ',
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $form['cassiopeia_config_booking']['cassiopeia_config_booking_promo_alert'] = array(
        '#type' => "textfield",
        '#title' => t('Cảnh báo vé khuyến mãi'),
        "#default_value" => variable_get('cassiopeia_config_booking_promo_alert', ''),
    );
    $cassiopeia_config_booking_mail_note = variable_get('cassiopeia_config_booking_mail_note', array(
        'value' => '',
        'format' => 'full_html'
    ));
    $form['cassiopeia_config_booking']['cassiopeia_config_booking_mail_note'] = array(
        '#type' => "text_format",
        '#title' => 'Ghi chú mặt vé',
        '#resizable' => TRUE,
        '#format' => 'full_html',
        "#default_value" => $cassiopeia_config_booking_mail_note['value'],
    );

    $form['cassiopeia_config_banking'] = array(
        '#type' => "fieldset",
        '#title' => 'Tài khoản ngân hàng',
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $_banking = variable_get('bank_info', array(
        'value' => '',
        'format' => 'full_html'
    ));
    $form['cassiopeia_config_banking']['bank_info'] = array(
        '#type' => "text_format",
        '#title' => 'Nội dung',
        '#resizable' => TRUE,
        '#format' => 'full_html',
        "#default_value" => $_banking['value'],
    );
    $_banking = variable_get('vietinbank_tutorial', array(
        'value' => '',
        'format' => 'full_html'
    ));
    $form['cassiopeia_config_banking']['vietinbank_tutorial'] = array(
        '#type' => "text_format",
        '#title' => 'Hướng dẫn chuyển khoản Vietinbank',
        '#resizable' => TRUE,
        '#format' => 'full_html',
        "#default_value" => $_banking['value'],
    );
    $form['cassiopeia_config_social'] = array(
        '#type' => "fieldset",
        '#title' => 'Social',
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );

//  todo
    $form['cassiopeia_config_social']['youtobe_url'] = array(
        '#type' => "textfield",
        "#title" => t('Youtobe ') . ' ' . t('link'),
        "#default_value" => variable_get('youtobe_url', ''),
    );

    $form['cassiopeia_config_social']['facebook_url'] = array(
        '#type' => "textfield",
        "#title" => t('Facebook') . ' ' . t('link'),
        "#default_value" => variable_get('facebook_url', ''),
    );

//    $form['cassiopeia_config_social']['twitter_url'] = array(
//        '#type' => "textfield",
//        "#title" => t('Twitter ') . ' ' . t('link'),
//        "#default_value" => variable_get('twitter_url', ''),
//    );
//
//    $form['cassiopeia_config_social']['google_plus_url'] = array(
//        '#type' => "textfield",
//        "#title" => t('Google Plus ') . ' ' . t('link'),
//        "#default_value" => variable_get('google_plus_url', ''),
//    );

    $form['cassiopeia_config_social']['instagram_url'] = array(
        '#type' => "textfield",
        "#title" => t('Instagram') . ' ' . t('link'),
        "#default_value" => variable_get('instagram_url', ''),
    );

//    $form['cassiopeia_config_social']['pinterest_url'] = array(
//        '#type' => "textfield",
//        "#title" => 'Instagram' . ' ' . t('link'),
//        "#default_value" => variable_get('pinterest_url', ''),
//    );


    $form['cassiopeia_config_social']['facebook_page'] = array(
        '#type' => "textarea",
        '#title' => 'Facebook page',
        '#resizable' => TRUE,
        "#default_value" => variable_get('facebook_page', ''),
    );

//  todo

    $form['cassiopeia_config_terms_of_service'] = array(
        '#type' => "fieldset",
        '#title' => 'Điều khoản và điểu kiện sử dụng dịch vụ',
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $cassiopeia_config_terms_of_service_content = variable_get('cassiopeia_config_terms_of_service_content', array(
        'value' => '',
        'format' => 'full_html'
    ));

    $form['cassiopeia_config_terms_of_service']['cassiopeia_config_terms_of_service_content'] = array(
        '#type' => "text_format",
        '#title' => 'Nội dung',
        '#resizable' => TRUE,
        '#format' => 'full_html',
        "#default_value" => $cassiopeia_config_terms_of_service_content['value'],
    );
    $form['cassiopeia_config_benefits'] = array(
        '#type' => "fieldset",
        '#title' => 'Chỉ dành cho thành viên '.ucfirst(SITE_DOMAIN),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $form['cassiopeia_config_benefits']['cassiopeia_config_benefits_group_1'] = array(
        '#type' => "fieldset",
        '#title' => t('Group 1'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $form['cassiopeia_config_benefits']['cassiopeia_config_benefits_group_1']['cassiopeia_config_benefits_group_1_icon'] = array(
        '#type' => "managed_file",
        "#title" => 'Icon',
        '#default_value' => variable_get('cassiopeia_config_benefits_group_1_icon',""),
        '#upload_location' => 'public://',
    );
    $form['cassiopeia_config_benefits']['cassiopeia_config_benefits_group_1']['cassiopeia_config_benefits_group_1_title'] = array(
        '#type' => "textfield",
        '#title' => t('Title'),
        "#default_value" => variable_get('cassiopeia_config_benefits_group_1_title', ''),
    );
    $form['cassiopeia_config_benefits']['cassiopeia_config_benefits_group_1']['cassiopeia_config_benefits_group_1_des'] = array(
        '#type' => 'textarea',
        '#title' => t('Description'),
        "#default_value" => variable_get('cassiopeia_config_benefits_group_1_des', ''),
    );
    $form['cassiopeia_config_benefits']['cassiopeia_config_benefits_group_2'] = array(
        '#type' => "fieldset",
        '#title' => t('Group 2'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $form['cassiopeia_config_benefits']['cassiopeia_config_benefits_group_2']['cassiopeia_config_benefits_group_2_icon'] = array(
        '#type' => "managed_file",
        "#title" => 'Icon',
        '#default_value' => variable_get('cassiopeia_config_benefits_group_2_icon',""),
        '#upload_location' => 'public://',
    );
    $form['cassiopeia_config_benefits']['cassiopeia_config_benefits_group_2']['cassiopeia_config_benefits_group_2_title'] = array(
        '#type' => "textfield",
        '#title' => t('Title'),
        "#default_value" => variable_get('cassiopeia_config_benefits_group_2_title', ''),
    );
    $form['cassiopeia_config_benefits']['cassiopeia_config_benefits_group_2']['cassiopeia_config_benefits_group_2_des'] = array(
        '#type' => 'textarea',
        '#title' => t('Description'),
        "#default_value" => variable_get('cassiopeia_config_benefits_group_2_des', ''),
    );
    $form['cassiopeia_config_benefits']['cassiopeia_config_benefits_group_3'] = array(
        '#type' => "fieldset",
        '#title' => t('Group 3'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $form['cassiopeia_config_benefits']['cassiopeia_config_benefits_group_3']['cassiopeia_config_benefits_group_3_icon'] = array(
        '#type' => "managed_file",
        "#title" => 'Icon',
        '#default_value' => variable_get('cassiopeia_config_benefits_group_3_icon',""),
        '#upload_location' => 'public://',
    );
    $form['cassiopeia_config_benefits']['cassiopeia_config_benefits_group_3']['cassiopeia_config_benefits_group_3_title'] = array(
        '#type' => "textfield",
        '#title' => t('Title'),
        "#default_value" => variable_get('cassiopeia_config_benefits_group_3_title', ''),
    );
    $form['cassiopeia_config_benefits']['cassiopeia_config_benefits_group_3']['cassiopeia_config_benefits_group_3_des'] = array(
        '#type' => 'textarea',
        '#title' => t('Description'),
        "#default_value" => variable_get('cassiopeia_config_benefits_group_3_des', ''),
    );
    $form['cassiopeia_config_benefits']['cassiopeia_config_benefits_group_4'] = array(
        '#type' => "fieldset",
        '#title' => t('Group 4'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $form['cassiopeia_config_benefits']['cassiopeia_config_benefits_group_4']['cassiopeia_config_benefits_group_4_icon'] = array(
        '#type' => "managed_file",
        "#title" => 'Icon',
        '#default_value' => variable_get('cassiopeia_config_benefits_group_4_icon',""),
        '#upload_location' => 'public://',
    );
    $form['cassiopeia_config_benefits']['cassiopeia_config_benefits_group_4']['cassiopeia_config_benefits_group_4_title'] = array(
        '#type' => "textfield",
        '#title' => t('Title'),
        "#default_value" => variable_get('cassiopeia_config_benefits_group_4_title', ''),
    );
    $form['cassiopeia_config_benefits']['cassiopeia_config_benefits_group_4']['cassiopeia_config_benefits_group_4_des'] = array(
        '#type' => 'textarea',
        '#title' => t('Description'),
        "#default_value" => variable_get('cassiopeia_config_benefits_group_4_des', ''),
    );



    $form['cassiopeia_config_footer'] = array(
        '#type' => "fieldset",
        '#title' => 'Footer',
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $form['cassiopeia_config_footer']['cassiopeia_config_footer_logo'] = array(
        '#type' => "managed_file",
        "#title" => 'Footer Logo',
        '#default_value' => variable_get('cassiopeia_config_footer_logo',""),
        '#upload_location' => 'public://',
    );
    $_footer = variable_get('footer', array(
        'value' => '',
        'format' => 'full_html'
    ));

    $form['cassiopeia_config_footer']['footer'] = array(
        '#type' => "text_format",
        '#title' => 'Footer',
        '#resizable' => TRUE,
        '#format' => 'full_html',
        "#default_value" => $_footer['value'],
    );


    $form['cassiopeia_config_copyright'] = array(
        '#type' => "fieldset",
        '#title' => t('Copyright'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );

    $_copyright = variable_get('copyright', array(
        'value' => '',
        'format' => 'full_html'
    ));
    $form['cassiopeia_config_copyright']['copyright'] = array(
        '#type' => "text_format",
        '#title' => t('Copyright'),
        '#format' => 'full_html',
        "#default_value" => $_copyright['value'],
    );


    $form['cassiopeia_config_script'] = array(
        '#type' => "fieldset",
        '#title' => 'Scripts',
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );

    $form['cassiopeia_config_script']['header_script'] = array(
        '#type' => "textarea",
        '#title' => t('Page header'),
        '#resizable' => TRUE,
        "#default_value" => variable_get('header_script', ''),
    );
    $form['cassiopeia_config_script']['footer_script'] = array(
        '#type' => "textarea",
        '#title' => t('Page footer'),
        '#resizable' => TRUE,
        "#default_value" => variable_get('footer_script', ''),
    );
    $form['#submit'][] = 'cassiopeia_config_form_submit';
    return system_settings_form($form);

}

function cassiopeia_config_form_submit($form,&$form_state){
    global $langcode;
    if (isset($form_state['values']['cassiopeia_config_site_banner_ticket_article'])) {
        $file = file_load($form_state['values']['cassiopeia_config_site_banner_ticket_article']);
        if ($file) {
            $file->status = FILE_STATUS_PERMANENT;
            file_save($file);
            file_usage_add($file, 'cassiopeia', 'cassiopeia_config_site_banner_ticket_article'.$langcode, $file->fid);
            variable_set('cassiopeia_config_site_banner_ticket_article', $file->fid, $langcode);
        }
    }
    else {
        variable_del('cassiopeia_config_site_banner_ticket_article', 0,$langcode);
    }
    if (isset($form_state['values']['cassiopeia_config_site_banner_promotion_article'])) {
        $file = file_load($form_state['values']['cassiopeia_config_site_banner_promotion_article']);
        if ($file) {
            $file->status = FILE_STATUS_PERMANENT;
            file_save($file);
            file_usage_add($file, 'cassiopeia', 'cassiopeia_config_site_banner_promotion_article'.$langcode, $file->fid);
            variable_set('cassiopeia_config_site_banner_promotion_article', $file->fid, $langcode);
        }
    }
    else {
        variable_del('cassiopeia_config_site_banner_promotion_article', 0,$langcode);
    }
    if (isset($form_state['values']['cassiopeia_config_home_introduction_left_image'])) {
        $file = file_load($form_state['values']['cassiopeia_config_home_introduction_left_image']);
        if ($file) {
            $file->status = FILE_STATUS_PERMANENT;
            file_save($file);
            file_usage_add($file, 'cassiopeia', 'cassiopeia_config_home_introduction_left_image'.$langcode, $file->fid);
            variable_set('cassiopeia_config_home_introduction_left_image', $file->fid, $langcode);
        }
    }
    else {
        variable_del('cassiopeia_config_home_introduction_left_image', 0,$langcode);
    }
    if (isset($form_state['values']['cassiopeia_config_home_introduction_group_1_icon'])) {
        $file = file_load($form_state['values']['cassiopeia_config_home_introduction_group_1_icon']);
        if ($file) {
            $file->status = FILE_STATUS_PERMANENT;
            file_save($file);
            file_usage_add($file, 'cassiopeia', 'cassiopeia_config_home_introduction_group_1_icon'.$langcode, $file->fid);
            variable_set('cassiopeia_config_home_introduction_group_1_icon', $file->fid, $langcode);
        }
    }
    else {
        variable_del('cassiopeia_config_home_introduction_group_1_icon', 0,$langcode);
    }
    if (isset($form_state['values']['cassiopeia_config_home_introduction_group_2_icon'])) {
        $file = file_load($form_state['values']['cassiopeia_config_home_introduction_group_2_icon']);
        if ($file) {
            $file->status = FILE_STATUS_PERMANENT;
            file_save($file);
            file_usage_add($file, 'cassiopeia', 'cassiopeia_config_home_introduction_group_2_icon'.$langcode, $file->fid);
            variable_set('cassiopeia_config_home_introduction_group_2_icon', $file->fid, $langcode);
        }
    }
    else {
        variable_del('cassiopeia_config_home_introduction_group_2_icon', 0,$langcode);
    }

    if (isset($form_state['values']['cassiopeia_config_footer_logo'])) {
        $file = file_load($form_state['values']['cassiopeia_config_footer_logo']);
        if ($file) {
            $file->status = FILE_STATUS_PERMANENT;
            file_save($file);
            file_usage_add($file, 'cassiopeia', 'cassiopeia_config_footer_logo'.$langcode, $file->fid);
            variable_set('cassiopeia_config_footer_logo', $file->fid, $langcode);
        }
    }
    else {
        variable_del('cassiopeia_config_footer_logo', 0,$langcode);
    }
    if (isset($form_state['values']['cassiopeia_config_benefits_group_1_icon'])) {
        $file = file_load($form_state['values']['cassiopeia_config_benefits_group_1_icon']);
        if ($file) {
            $file->status = FILE_STATUS_PERMANENT;
            file_save($file);
            file_usage_add($file, 'cassiopeia', 'cassiopeia_config_benefits_group_1_icon'.$langcode, $file->fid);
            variable_set('cassiopeia_config_benefits_group_1_icon', $file->fid, $langcode);
        }
    }
    else {
        variable_del('cassiopeia_config_benefits_group_1_icon', 0,$langcode);
    }

    if (isset($form_state['values']['cassiopeia_config_benefits_group_2_icon'])) {
        $file = file_load($form_state['values']['cassiopeia_config_benefits_group_2_icon']);
        if ($file) {
            $file->status = FILE_STATUS_PERMANENT;
            file_save($file);
            file_usage_add($file, 'cassiopeia', 'cassiopeia_config_benefits_group_2_icon'.$langcode, $file->fid);
            variable_set('cassiopeia_config_benefits_group_2_icon', $file->fid, $langcode);
        }
    }
    else {
        variable_del('cassiopeia_config_benefits_group_2_icon', 0,$langcode);
    }
    if (isset($form_state['values']['cassiopeia_config_benefits_group_3_icon'])) {
        $file = file_load($form_state['values']['cassiopeia_config_benefits_group_3_icon']);
        if ($file) {
            $file->status = FILE_STATUS_PERMANENT;
            file_save($file);
            file_usage_add($file, 'cassiopeia', 'cassiopeia_config_benefits_group_3_icon'.$langcode, $file->fid);
            variable_set('cassiopeia_config_benefits_group_3_icon', $file->fid, $langcode);
        }
    }
    else {
        variable_del('cassiopeia_config_benefits_group_3_icon', 0,$langcode);
    }
    if (isset($form_state['values']['cassiopeia_config_benefits_group_4_icon'])) {
        $file = file_load($form_state['values']['cassiopeia_config_benefits_group_4_icon']);
        if ($file) {
            $file->status = FILE_STATUS_PERMANENT;
            file_save($file);
            file_usage_add($file, 'cassiopeia', 'cassiopeia_config_benefits_group_4_icon'.$langcode, $file->fid);
            variable_set('cassiopeia_config_benefits_group_4_icon', $file->fid, $langcode);
        }
    }
    else {
        variable_del('cassiopeia_config_benefits_group_4_icon', 0,$langcode);
    }
    if (isset($form_state['values']['cassiopeia_config_site_logo'])) {
        $file = file_load($form_state['values']['cassiopeia_config_site_logo']);
        if ($file) {
            $file->status = FILE_STATUS_PERMANENT;
            file_save($file);
            file_usage_add($file, 'cassiopeia', 'cassiopeia_config_site_logo'.$langcode, $file->fid);
            variable_set('cassiopeia_config_site_logo', $file->fid, $langcode);
        }
    }
    else {
        variable_del('cassiopeia_config_site_logo', 0,$langcode);
    }
    if (isset($form_state['values']['cassiopeia_config_img_popup'])) {
        $file = file_load($form_state['values']['cassiopeia_config_img_popup']);
        if ($file) {
            $file->status = FILE_STATUS_PERMANENT;
            file_save($file);
            file_usage_add($file, 'cassiopeia', 'cassiopeia_config_img_popup'.$langcode, $file->fid);
            variable_set('cassiopeia_config_img_popup', $file->fid, $langcode);
        }
    }
    else {
        variable_del('cassiopeia_config_img_popup', 0,$langcode);
    }
    if (isset($form_state['values']['cassiopeia_config_site_logo_home'])) {
        $file = file_load($form_state['values']['cassiopeia_config_site_logo_home']);
        if ($file) {
            $file->status = FILE_STATUS_PERMANENT;
            file_save($file);
            file_usage_add($file, 'cassiopeia', 'cassiopeia_config_site_logo_home'.$langcode, $file->fid);
            variable_set('cassiopeia_config_site_logo_home', $file->fid, $langcode);
        }
    }
    else {
        variable_del('cassiopeia_config_site_logo_home', 0,$langcode);
    }
}


function cassiopeia_ajax_page() {
    global $user;
    $data = array();
    $data['message'] = '';
    $data['success'] = 0;
    if (isset($_POST['cmd'])) {
        switch ($_POST['cmd']) {
            case "createContact":
                $customer = new stdClass();
                $customer->name = !empty($_REQUEST['name'])?$_REQUEST['name']:"";
                $customer->tel = !empty($_REQUEST['tel'])?$_REQUEST['tel']:"";
                $customer->mail = !empty($_REQUEST['mail'])?$_REQUEST['mail']:"";
                $customer->gender = !empty($_REQUEST['gender'])?$_REQUEST['gender']:"";
                $customer->VN = !empty($_REQUEST['VN'])?$_REQUEST['VN']:"";
                $customer->QH = !empty($_REQUEST['QH'])?$_REQUEST['QH']:"";
                $customer->birthday = !empty($_REQUEST['birthday'])?strtotime(str_replace("/","-",$_REQUEST['birthday'])):0;
                $customer = cassiopeia_qt_customer_save($customer);
                break;
            case "checkBalance":
                $_user = user_load($user->uid);
                $total = $_SESSION['total_ag_price'];
                if($total>$_user->field_account_balance['und'][0]['value']){
                    $data['response'] = "FAIL";
                    $data['message'] = "";
                }else{
                    $data['response'] = "OK";
                }
                break;
            case "user-top-up-request":
                $bank = $_REQUEST['bank'];
                try{
                    $query = db_select("tbl_top_up_request","tbl_top_up_request");
                    $query->fields("tbl_top_up_request");
                    $query->range(0,1);
                    $query->orderBy("created","DESC");
                    $last = $query->execute()->fetchObject();
                    if(!empty($last)){
                        $code_number = str_replace("T","",$last->code);
                        $code_number++;
                    }else{
                        $code_number = "100000";
                    }
                    $code = "T".$code_number;
                    $s = new stdClass();
                    $s->uid = $user->uid;
                    $s->created = REQUEST_TIME;
                    $s->bank = $bank;
                    $s->code = $code;
                    $s->payment = 1;
                    $s->status = 0;
                    drupal_write_record("tbl_top_up_request",$s);

                    $data['message'] = ucfirst(SITE_DOMAIN)." đã tiếp nhận thông tin, chúng tôi sẽ phản hồi trong thời gian sớm nhất!";
                }catch (Exception $e){
                    print_r($e);
                    $data['message'] = "Đã xảy ra lỗi, vui lòng thử lại sau!";
                }
                break;
            case "delete_customer":
                $id = $_REQUEST['id'];
                $access = false;
                if(user_has_role(3)){
                    $access = true;
                }else{
                    $query = db_select("tbl_customer","tbl_customer");
                    $query->fields("tbl_customer");
                    $query->condition("id",$id);
                    $result = $query->execute()->fetchObject();
                    if(!empty($result)){
                        if($result->uid==$user->uid){
                            $access = true;
                        }
                    }
                }
                if($access){
                    try{
                        db_delete("tbl_customer")->condition("id",$id)->execute();
                        $data['message'] = "Xóa thành công";;
                    }catch (Exception $e){
                        $data['message'] = "Đã xảy ra lỗi, vui lòng liên hệ với người quản trị!";;
                    }
                }else{
                    $data['message'] = "Bạn không có quyền xóa khách hàng này!";;
                }

                break;
            case "get-customer-detail":
                $id = $_REQUEST['id'];
                $query = db_select("tbl_customer","tbl_customer");
                $query->fields("tbl_customer");
                $query->condition("id",$id);
                $result = $query->execute()->fetchObject();
                if($user->uid == $result->uid || user_has_role(3)){
                    $data['access']=true;
                }
                if(!empty($result->birthday)){
                    $result->birthday = date("d-m-Y",$result->birthday);
                }else{
                    $result->birthday = "";
                }
                $data['response'] = $result;
                break;
            case "load-customer":
                $_data = json_decode($_REQUEST['data']);
                $cache = $_data;
                try{
                    $query = db_select("tbl_customer","tbl_customer");
                    $query->fields("tbl_customer");
                    if(!empty($cache->name)){
                        $or = db_or();
                        $or->condition("tbl_customer.name","%".$cache->name."%","LIKE");
                        $or->condition("tbl_customer.tel","%".$cache->name."%","LIKE");
                        $or->condition("tbl_customer.QH","%".$cache->name."%","LIKE");
                        $or->condition("tbl_customer.VN","%".$cache->name."%","LIKE");
                        $or->condition("tbl_customer.note","%".$cache->name."%","LIKE");
                        $query->condition($or);
                    }
                    if(!empty($cache->tel)){
                        $query->condition("tbl_customer.Phone","%".$cache->tel."%","LIKE");
                    }
                    if(!empty($cache->code)){
                        $or = db_or();
                        $or->condition("tbl_customer.QH","%".$cache->code."%","LIKE");
                        $or->condition("tbl_customer.VN","%".$cache->code."%","LIKE");
                        $query->condition($or);
                    }
                    if(!empty($cache->note)){
                        $query->condition("tbl_customer.note","%".$cache->note."%","LIKE");
                    }
                    $query->orderBy("tbl_customer.created","DESC");
                    if(user_has_role(3) || user_has_role(8) || user_has_role(5)|| user_has_role(7)){
                        $query->join("users_roles","tbl_role","tbl_role.uid=tbl_customer.uid");
                        if($cache->type=="other"){
                            $query->condition("tbl_role.rid",array(3,8,5,7),"NOT IN");
                        }else{
                            $query->groupBy("tbl_customer.id");
                            $query->condition("tbl_role.rid",array(3,8,5,7),"IN");
                        }
                    }else{
                        $query->condition("uid",$user->uid);
                    }
                    $result = $query->execute()->fetchAll();
                }catch (Exception $e){
                    print_r($e);
                }
                $data['html'] = _cassiopeia_render_theme("module","cassiopeia_user","templates/parts/customer.tpl.php",array("result"=>$result));
                break;
            case "get_contacts":
                $data['html'] =  _cassiopeia_render_theme("module","cassiopeia","templates/parts/get_Contacts.tpl.php");
                break;
            case "get-reject-topup-form";
                $id = $_REQUEST['id'];
                $detail = $_REQUEST['detail'];
                $btnReprocess = $_REQUEST['btnReprocess'];
                $query = db_select("tbl_top_up_request","tbl_top_up_request");
                $query->fields("tbl_top_up_request");
                $query->condition("id",array(explode(';', $id)));
                $result = $query->execute()->fetchAll();
                if(cassiopeia_check_permission("cassiopeia_user_permission_topup","p_edit")){
                    $message ="";
                    try{
                        $indexItem = 0;
                        $indexItemDone = 0;
                        foreach($result as $item){
                            $queryCheckStatus = $item ->status;
                            if($queryCheckStatus ==0 || ($btnReprocess && $item->status ==1)){
                                db_update("tbl_top_up_request")->fields(array(
                                    "tran_user"         => $user->uid,
                                    "status"            => 2,
                                    "tran_user_note"    => $detail
                                    ))->condition("id",$item->id)->execute();
                                $indexItemDone += 1;
                            }else{
                                $_agent = user_load($item->uid);
                                $message .= $_user->field_account_code['und'][0]['value'];
                                if($indexItem > 1 && ($indexItem <= count($result) - 1 )){
                                    $message .=";";
                                }
                            }
                            $indexItem++;
                        } 
                        if($indexItemDone == count($result)) {
                            $data['message'] = "Đã xử lý từ chối giao dịch!";
                        }else{
                            $data['message'] = "Giao dịch đã được xử lý trước đó: ".$message;
                        }      
                        $_user = user_load($user->uid);   
                        $data['tran_user'] = $_user->field_account_code['und'][0]['value']." - ".$_user->field_account_transaction_name['und'][0]['value'];             
                    }catch (Exception $e){
                        $data['message'] = "Cập nhật thất bại!";
                    }
                }
                break;
            case "update-topup-status";
                $id = $_REQUEST['id'];
                $status = $_REQUEST['status'];
                $request = cassiopeia_qt_top_up_request_load($id);
                if(cassiopeia_check_permission("cassiopeia_user_permission_topup","p_edit")){
                    try{
						$queryCheckStatus = $request ->status;
						if($queryCheckStatus ==0){
							db_update("tbl_top_up_request")->fields(array(
                            "tran_user"         => $user->uid,
                            "status"            => $status
							))->condition("id",$id)->execute();

							if($status==1){
								$_agent = user_load($request->uid);
								$balance = !empty($_agent->field_account_balance['und'][0]['value'])?$_agent->field_account_balance['und'][0]['value']:0;
								$tran_kind = cassiopeia_get_tran_kind_by_id(1);
								$flag = true;
								$amount = str_replace(".","",$request->amount);
								if($tran_kind['type']==1){ //cộng tiền
									$balance += $amount;
								}else{ //trừ tiền
									$balance -= $amount;
								}
								$_agent->field_account_balance['und'][0]['value'] = $balance;
								user_save($_agent);
                                $report = new stdClass();
                                $report->created = REQUEST_TIME;
                                $report->date = REQUEST_TIME;
                                $report->amount = !empty($amount)?$amount:0;
                                $report->content = "TOPUP ".$request->bank->title." ".number_format($amount,0,",",".");
                                $report->agent = $_agent->uid;
                                $report->tran_kind = 1;
                                $report->uid = $user->uid;
                                $report->balance = $balance;
                                $report->category = "payment";
                                cassiopeia_qt_payment_report_save($report);
                                db_insert("tbl_topup")->fields(array(
                                    "user" => $user->uid,
                                    "agent" => $_agent->uid,
                                    "value" => !empty($amount)?$amount:0,
                                    "created" => REQUEST_TIME,
                                    "note" => $report->content,
                                ))->execute();
							}

							$data['message'] = "Cập nhật thành công!";
						}else{
							$data['message'] = "Giao dịch đã được xử lý!";
						}

                    }catch (Exception $e){
                        _print_r($e);
                        $data['message'] = "Cập nhật thất bại!";
                    }
                }
                break;
            case "manager-change-sale":
                if(user_has_role(3)){
                    $uid = $_REQUEST['uid'];
                    $sale = $_REQUEST['sale'];
                    $_partner = user_load($uid);
                    $_partner->field_account_sale['und'][0]['target_id'] = $sale;
                    user_save($_partner);
                    $data['message'] = "Cập nhật thành công!";
                }else{
                    $data['message'] = "Bạn không có quyền thực hiện thao tác này!";
                }
                break;
            case "getFLightClass":
                $Itinerary = $_REQUEST['Itinerary'];
                $FareOptionSession = $_REQUEST['FareOptionSession'];
                $_session_key = $_REQUEST['session_key'];
                $FlightSession = $_REQUEST['FlightSession'];
                $query = db_select("tbl_session","tbl_session");
                $query -> fields("tbl_session");
                $query -> condition("id",$_session_key,"=");
                $query -> condition("client_ip",$_SESSION['QT-CLIENT-IP'],"=");
                $check = $query -> execute()->fetchObject();
                $result = unserialize($check->value);
                $FlightResult = $result->Data;
                $Flight = $FlightResult->$Itinerary->$FlightSession;

                $_options = array();
                $text = "";
                $classes = array();
                foreach($Flight->FareOptions as $fareOption){
                    $raw_fee = $fareOption->PriceAdult;
                    $show_fee = cassiopeia_qt_price_fix($fareOption->FeeAdult) + cassiopeia_qt_price_fix($fareOption->TaxAdult) + cassiopeia_qt_price_fix($fareOption->PriceAdult);
                    $agent_fee = cassiopeia_user_agent_fee_load_by_class($Flight->AirlineCode,$fareOption->Class);
                    $service_fee = cassiopeia_user_service_fee_load_by_class($Flight->AirlineCode,$fareOption->Class);
//                    _print_r($agent_fee);
//                    _print_r($service_fee);
                    $show_fee+=$agent_fee['fee'];
                    $show_fee+=$service_fee['fee'];
                    $show_fee = cassiopeia_qt_price_fix($show_fee);
                    if(!empty($fareOption->SeatsAvailable)){
                        $SeatsRemaining = " (".$fareOption->SeatsAvailable.")";
                    }
                    $text.="<li data-value='".number_format($show_fee,0,",",".")."' data-class='".$fareOption->Class."' data-FareOptionSession='".$fareOption->FareOptionSession."'>".$fareOption->Class.": ".number_format($show_fee,0,",","."). " đ".$SeatsRemaining."</li>";
                }
                $data['html'] = $text;
                break;
            case "getDashboardReport":
                $date_range = $_REQUEST['date'];
                $option = $_REQUEST['option'];
                switch ($option){
                    case "ticket-booking-date-range" :
                        $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/dashboard-report/ticket-booking.tpl.php",array("date"=>$date_range,"option"=>$option));
                        break;
                    case "room-booking-date-range" :
                        $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/dashboard-report/room-booking.tpl.php",array("date"=>$date_range,"option"=>$option));
                        break;
                    case "partner-report-date-range" :
                        $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/dashboard-report/partner-report.tpl.php",array("date"=>$date_range,"option"=>$option));
                        break;
                    case "revenue-report-date-range" :
                        $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/dashboard-report/revenue-report.tpl.php",array("date"=>$date_range,"option"=>$option));
                        break;
                }
                break;

            case "delete_all_room_price":
                if(cassiopeia_check_permission("cassiopeia_user_permission_room_price","p_delete")){
                    db_delete("tbl_room_price")->execute();
                }
                break;
            case "changeRoomBookingStatus":
                if(cassiopeia_room_booking_manager_accept()){
                    $status = $_REQUEST['status'];
                    $booking_code = $_REQUEST['booking_code'];
                    $query = db_select("tbl_room_booking","tbl_room_booking");
                    $query->fields("tbl_room_booking");
                    $query->join("tbl_room_booking_detail","tbl_room_booking_detail","tbl_room_booking_detail.code=tbl_room_booking.code");
                    $query->addExpression("SUM(tbl_room_booking_detail.adult)","guest");
                    $query->condition("tbl_room_booking.code",$booking_code);
                    $booking = $query->execute()->fetchObject();
                    db_update("tbl_room_booking")->fields(array(
                        "status"=>$_REQUEST['status'],
                        "tran_user"=>$user->uid,
                    ))->condition("code",$booking_code)->execute();
                    if($status==3){
                        $q = db_select("tbl_room_booking_detail","tbl_room_booking_detail");
                        $q->fields("tbl_room_booking_detail");
                        $q->condition("tbl_room_booking_detail.code",$booking_code);
                        $details = $q->execute()->fetchAll();
                        $_room_price = 0;
                        $partner_price = 0;
//                    print_r($details);
                        if(!empty($details)){
                            foreach($details as $detail){
                                $room_prices = (unserialize($detail->room_price));
//                                print_r($room_prices);
                                if(!empty($room_prices)){
                                    foreach($room_prices as $room_price){
                                        $q = db_select("tbl_room_booking_fee","tbl_room_booking_fee");
                                        $q->fields("tbl_room_booking_fee");
                                        $q->condition("tbl_room_booking_fee.from_price",$room_price->price,"<=");
                                        $q->condition("tbl_room_booking_fee.to_price",$room_price->price,">=");
                                        $fee = $q->execute()->fetchObject();
                                        if(!empty($fee)){
                                            $_room_price = $_room_price + $room_price->price + $fee->value;
                                        }else{
                                            $_room_price = $_room_price + $room_price->price;
                                        }
                                        if($room_price->price<1750000){
                                            $partner_price = $partner_price +$_room_price-50000;
                                        }else{
                                            $partner_price = $partner_price + $_room_price-100000;
                                        }
                                    }
                                }
                                $_room_price*=$detail->number_of_room;
                                $partner_price*=$detail->number_of_room;
                            }
                        }
                        $date1=date_create(date("Y-m-d",$booking->from_date));
                        $date2=date_create(date("Y-m-d",$booking->to_date));
                        $diff=date_diff($date1,$date2);
                        $db_transaction = db_transaction();
                        $_agent = user_load($booking->uid);
                        $balance = !empty($_agent->field_account_balance['und'][0]['value'])?$_agent->field_account_balance['und'][0]['value']:0;
                        $balance-=$partner_price;
                        $tran_code = "KS".REQUEST_TIME;
                        try{
                            db_insert("tbl_room_booking_report")->fields(array(
                                "created"   => REQUEST_TIME,
                                "booking_code"   => $booking->code,
                                "hotel"   => $booking->hotel,
                                "guest"   => $booking->guest,
                                "night"   => $diff->format("%a"),
                                "price"   => $_room_price,
                                "partner_price"   => $partner_price,
                                "revenue"   => $_room_price-$partner_price,
                                "agent"   => $booking->uid,
                                "tran_user"   => $user->uid,
                                "tran_kind"   => 15,
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
                            $point = ceil($total/1000000);
                            $_agent->field_point['und'][0]['value'] = $point;
                            $_agent->field_account_balance['und'][0]['value'] = $balance;
                            if($_agent->field_account_status['und'][0]['tid']==22){ //tiềm năng
                                $_agent->field_account_status['und'][0]['tid'] = 13;
                                $_agent->field_account_updated_date['und'][0]['value'] = REQUEST_TIME;
                            }
                            user_save($_agent);
                        }catch (Exception $e){
                            $db_transaction->rollback();
                        }
                    }


                }
                break;
            case "booking_room":
                $_data = $_REQUEST['data'];
//                print_r($_data);
                $_SESSION['booking_room']['room'] = $_data;
                $_SESSION['booking_room']['hotel'] = $_REQUEST['hotel'];
                $data['status'] = "OK";
                break;
            case "get_hotels_by_tx_area":
                $_data = $_REQUEST['data'];
                $_data = json_decode($_data);
                $page = isset($_data->page)?$_data->page:1;
                $limit = 10;
                $start = ($page-1)*$limit;
                $query = db_select("node","tbl_node");
                $query->fields("tbl_node");

                $query->condition("tbl_node.type","hotel");
                $query->condition("tbl_node.status",1);
                $query->join("field_data_field_hotel","field_hotel","field_hotel.field_hotel_nid=tbl_node.nid");
                $query->leftJoin("tbl_room_price","tbl_room_price","field_hotel.entity_id=tbl_room_price.nid");
                if(!empty($_data->fromPrice)){
                    $query->condition("tbl_room_price.price",array($_data->fromPrice,$_data->toPrice),"BETWEEN");
                }

                $query->join("field_data_field_hotel_ranking","field_hotel_ranking","field_hotel_ranking.entity_id=tbl_node.nid");
                $query->fields("field_hotel_ranking",array("field_hotel_ranking_value"));
                if(!empty($_data->name)){
                    $query->condition("tbl_node.title","%".$_data->name."%","LIKE");
                }
                if(!empty($_data->ranking)){
                    $query->condition("field_hotel_ranking.field_hotel_ranking_value",$_data->ranking,"IN");
                }
                if(!empty($_data->tx_area)){
                    $query->join("field_data_field_tx_area","field_tx_area","field_tx_area.entity_id=tbl_node.nid");
                    $query->condition("field_tx_area.field_tx_area_tid",$_data->tx_area);
                }
                if(!empty($_data->tx_hotel)){
                    $query->join("field_data_field_tx_hotel","field_tx_hotel","field_tx_hotel.entity_id=tbl_node.nid");
                    $query->condition("field_tx_hotel.field_tx_hotel_tid",$_data->tx_hotel,"IN");
                }
                if(!empty($_data->convenient)){
                    $query->join("field_data_field_convenient","field_convenient","field_convenient.entity_id=tbl_node.nid");
                    $query->condition("field_convenient.field_convenient_nid",$_data->convenient,"IN");
                }
                $query->orderBy("tbl_room_price.price","ASC");
                $query->addExpression("MIN(tbl_room_price.price)","_price");

                $query->groupBy("tbl_node.nid");
                $query2 = db_select($query,"tbl_temp");
                $query2->fields("tbl_temp");
                if(!empty($_data->sort)){
                    switch ($_data->sort){
                        case "price" :
                            $query2->orderBy("tbl_temp._price","ASC");
                            break;
                        case "ranking" :
                            $query2->orderBy("field_hotel_ranking_value",$_data->sort_direction);
                            break;
                        case "popular" :break;
                    }
                }

                $total = $query2->execute()->fetchAll();
                $total_items = count($total);
                $page_count = ceil($total_items/$limit);
                $query2->range($start,$limit);
                $result = $query2->execute()->fetchAll();
                $data['Total'] = $total_items;
                $data['html'] = $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/hotels-by-tx-area.tpl.php",array("page_count"=>$page_count,"result"=>$result,"page"=>$page));
                break;
            case "getHotels":
                $_data = $_REQUEST['data'];
                $_data = json_decode($_data);
                $page = isset($_data->page)?$_data->page:1;
                $limit = 10;
                $start = ($page-1)*$limit;
                $query = db_select("node","tbl_node");
                $query->fields("tbl_node");
                $query->condition("tbl_node.status",1);
                $query->condition("tbl_node.type","hotel");
                $query->join("field_data_field_hotel","field_hotel","field_hotel.field_hotel_nid=tbl_node.nid");
                $query->leftJoin("tbl_room_price","tbl_room_price","field_hotel.entity_id=tbl_room_price.nid");
                if(!empty($_data->fromPrice)){
                    $query->condition("tbl_room_price.price",array($_data->fromPrice,$_data->toPrice),"BETWEEN");
                }
                $date_range = $_data->date_range;
                $from_date = str_replace("/","-",trim(explode("-",$date_range)[0]));
                $to_date = str_replace("/","-",trim(explode("-",$date_range)[1]));
                $or = db_or();
                $or->condition("tbl_room_price.from_date",array(strtotime($from_date),strtotime($to_date)),"BETWEEN");
                $or->condition("tbl_room_price.to_date",array(strtotime($from_date),strtotime($to_date)),"BETWEEN");
                $and = db_and();
                $and->condition("tbl_room_price.from_date",strtotime($from_date),"<=");
                $and->condition("tbl_room_price.to_date",strtotime($to_date),">=");
                $or->condition($and);
                $query->condition($or);
                $query->join("field_data_field_hotel_ranking","field_hotel_ranking","field_hotel_ranking.entity_id=tbl_node.nid");
//                if(!empty($_data->name)){
//                    $query->condition("tbl_node.title","%".$_data->name."%","LIKE");
//                }
//                if(!empty($_data->ranking)){
//                    $query->condition("field_hotel_ranking.field_hotel_ranking_value",$_data->ranking,"IN");
//                }
//                if(!empty($_data->tx_area)){
//                    $query->join("field_data_field_tx_area","field_tx_area","field_tx_area.entity_id=tbl_node.nid");
//                    $query->condition("field_tx_area.field_tx_area_tid",$_data->tx_area);
//                }
//                if(!empty($_data->tx_hotel)){
//                    $query->join("field_data_field_tx_hotel","field_tx_hotel","field_tx_hotel.entity_id=tbl_node.nid");
//                    $query->condition("field_tx_hotel.field_tx_hotel_tid",$_data->tx_hotel,"IN");
//                }
//                if(!empty($_data->convenient)){
//                    $query->join("field_data_field_convenient","field_convenient","field_convenient.entity_id=tbl_node.nid");
//                    $query->condition("field_convenient.field_convenient_nid",$_data->convenient,"IN");
//                }
                $query->orderBy("tbl_room_price.price","ASC");
                $query->addExpression("MIN(tbl_room_price.price)","_price");
//
                $query->groupBy("tbl_node.nid");
                $query2 = db_select($query,"tbl_temp");
                $query2->fields("tbl_temp");
                if(!empty($_data->sort)){
                    switch ($_data->sort){
                        case "price" :
                            $query2->orderBy("tbl_temp._price","ASC");
                            break;
                        case "ranking" :
                            $query2->orderBy("field_hotel_ranking.field_hotel_ranking_value",$_data->sort_direction);
                            break;
                        case "popular" :break;
                    }
                }

                $total = $query2->execute()->fetchAll();
                $total_items = count($total);
                $page_count = ceil($total_items/$limit);
                $query2->range($start,$limit);
                $result = $query2->execute()->fetchAll();
                $data['Total'] = $total_items;
                $data['html'] = $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/search-hotel.tpl.php",array("page_count"=>$page_count,"result"=>$result,"page"=>$page));
                break;
            case "adminGetRoomBookingReport":
                $_data = $_REQUEST['data'];
                $_data = json_decode($_data);
                $data['html'] = $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/manager-room-booking-report.tpl.php",array("data"=>$_data));
                break;
            case "adminGetRoomBooking":
                $_data = $_REQUEST['data'];
                $_data = json_decode($_data);
                $data['html'] = $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/manager-room-booking.tpl.php",array("data"=>$_data));
                break;
            case "adminGetHotelRooms":
                $_data = $_REQUEST['data'];
                $_data = json_decode($_data);
                $data['html'] = $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/manager-hotel-room.tpl.php",array("data"=>$_data));
                break;

            case "delete_airline":
                $code = $_REQUEST['code'];
                try{
                    db_delete("tbl_airlines")->condition("iata",$code)->execute();
                    $data['response'] = "OK";
                    $data['message'] = "Xóa thành công";
                }catch ( Exception $e){
                    $data['response'] = "FAIL";
                    $data['message'] = "Xóa thất bại, vui lòng liên hệ bộ phận kỹ thuật!";
                }
                break;
            case "update_airline":
                $code = $_REQUEST['code'];
                $name = $_REQUEST['name'];
                $type = $_REQUEST['type'];
                $airline = cassiopeia_get_airline($code);
                if(!empty($airline)){
                    try{
                        db_update("tbl_airlines")->fields(array(
                            "name"  => $name,
                            "type"  => $type,
                        ))->condition("iata",$code)->execute();
                        $data['response'] = "OK";
                        $data['message'] = "Cập nhật thành công";
                    }catch (Exception $e){
                        $data['response'] = "FAIL";
                        $data['message'] = "Cập nhật thất bại, vui lòng liên hệ bộ phận kỹ thuật!";
                    }
                }else{
                    try{
                        db_insert("tbl_airlines")->fields(array(
                            "name"  => $name,
                            "type"  => $type,
                            "iata"  => $code,
                        ))->execute();
                        $data['response'] = "OK";
                        $data['message'] = "Thêm mới thành công";
                    }catch (Exception $E){
                        $data['response'] = "FAIL";
                        $data['message'] = "Thêm mới thất bại, vui lòng liên hệ bộ phận kỹ thuật!";
                    }
                }
                break;
            case "get_airline_by_code":
                $code = $_REQUEST['code'];
                $airline = cassiopeia_get_airline($code);
                $data['airline'] = ($airline);
                break;
            case "get_log_detail":
                $id = $_REQUEST['id'];

                $query = db_select("tbl_log","tbl_log");
                $query->fields("tbl_log");
                $query->condition("id",$id);
                $result = $query->execute()->fetchObject();
//                print_r($result);
                $data['html'] = $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/log-detail.tpl.php",array("log"=>$result));
                break;
            case "get_gift_info":
                $id = $_REQUEST['nid'];
                $gift = node_load($id);
//                print_r($gift);
                $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/node-gift.tpl.php",array("node"=>$gift));
                break;
            case "manager-update-point":
                $id = $_REQUEST['id'];
                try{
                    $query = db_select("tbl_point","tbl_point");
                    $query->fields("tbl_point");
                    $query->condition("id",$id);
                    $result = $query->execute()->fetchObject();
                    $gift = node_load($result->nid);

                    $_user = user_load($result->uid);
                    if(!empty($gift->field_point_refund['und'][0]['value'])){
                        $status = 1;
                        $balance = $_user->field_account_balance['und'][0]['value'] + $gift->field_gift_money['und'][0]['value'];
                        db_insert("tbl_payment_report")->fields(array(
                            "created"           => REQUEST_TIME,
                            "date"              => REQUEST_TIME,
                            "tran_code"         => REQUEST_TIME,
                            "amount"            => !empty($gift->field_gift_money['und'][0]['value'])?$gift->field_gift_money['und'][0]['value']:0,
                            "content"           => "Tích điểm đổi quà",
                            "agent"             => $result->uid,
                            "tran_kind"         => 14,
                            "tran_user"         => $user->uid,
                            "balance"           => $balance,
                            "status"            => 1, // chưa sử dụng
                            "category"          => "payment",
                        ))->execute();
                        db_insert("tbl_report")->fields(array(
                            "created"           => REQUEST_TIME,
                            "tran_code"         => REQUEST_TIME,
                            "type"              => "payment",
                        ))->execute();
                        $_user->field_account_balance['und'][0]['value']+=$gift->field_gift_money['und'][0]['value'];
                        user_save($_user);
                    }
                    db_update("tbl_point")->fields(array("status"=>1))->condition("id",$id)->execute();
                    $data['response'] = "OK";
                }catch (Exception $e){
                    $data['message'] = "Đã xảy ra lỗi, vui lòng liên hệ bộ phận booker để được hỗ trợ!";
                    $data['response'] = "FAIL";
                }
                break;
            case "agent-get-gift":
                $status = 0;
                $quantity = $_REQUEST['quantity'];
                $nid = $_REQUEST['nid'];
                $_user = user_load($user->uid);
                $availablePoint = $_user->field_point['und'][0]['value']-$_user->field_used_point['und'][0]['value'];
                $gift = node_load($nid);
                if($_user->field_account_balance['und'][0]['value']<1){
                    $data['message'] = "Tài khoản đại lý đang bị âm, vui lòng nạp tiền để được đổi quà!";
                    $data['response'] = "FAIL";
                }else{
                    if($gift->field_gift_point['und'][0]['value']*$quantity>$availablePoint){
                        $data['message'] = "Bạn không đủ điểm để đổi quà tặng này!";
                        $data['response'] = "FAIL";
                    }else{
                        try{
                            if(!empty($gift->field_point_refund['und'][0]['value'])){
                                $status = 1;
                                $balance = $_user->field_account_balance['und'][0]['value'] + ($gift->field_gift_money['und'][0]['value']*$quantity);
                                db_insert("tbl_payment_report")->fields(array(
                                    "created"           => REQUEST_TIME,
                                    "date"              =>     REQUEST_TIME,
                                    "tran_code"         => REQUEST_TIME,
                                    "amount"            => !empty($gift->field_gift_money['und'][0]['value'])?($gift->field_gift_money['und'][0]['value']*$quantity):0,
                                    "content"           => "Tích điểm đổi quà",
                                    "agent"             => $user->uid,
                                    "tran_kind"         => 14,
                                    "tran_user"         => $user->uid,
                                    "balance"           => $balance,
                                    "status"            => 0, // chưa sử dụng
                                    "category"          => "payment",
                                ))->execute();
                                db_insert("tbl_report")->fields(array(
                                    "created"           => REQUEST_TIME,
                                    "tran_code"         => REQUEST_TIME,
                                    "type"         => "payment",
                                ))->execute();
                                $_user->field_account_balance['und'][0]['value']+=($gift->field_gift_money['und'][0]['value']*$quantity);
                            }
                            db_insert("tbl_point")->fields(array(
                                "created"       => REQUEST_TIME,
                                "nid"           => $nid,
                                "point"         => $gift->field_gift_point['und'][0]['value'],
                                "amount"        => $gift->field_gift_money['und'][0]['value'],
                                "status"        => $status,
                                "uid"           => $user->uid,
                                "quantity"      => $quantity,
                            ))->execute();
                            $_user->field_used_point['und'][0]['value'] += $gift->field_gift_point['und'][0]['value']*$quantity;
                            user_save($_user);
                        }catch (Exception $e){
                            print_r($e);
                            $data['message'] = "Đã xảy ra lỗi, vui lòng liên hệ bộ phận booker để được hỗ trợ!";
                            $data['response'] = "FAIL";
                        }
                    }
                }
                break;
            case "ticket-issue":
                if(cassiopeia_user_issue_ticket_access()){
                    $pnr_code = $_REQUEST['pnr_code'];
                    $agent = $_REQUEST['agent'];
                    $response = cassiopeia_issue($pnr_code,$agent);
                    if($response['flag']){
                        $data['response'] = "OK";
                    }else{
                        $data['response'] = "FAILED";
                    }
                    $data['message'] = $response['message'];
                }

                break;
            case "ticket-void":
                $pnr_code = trim($_REQUEST['pnr_code']);
                $query = db_select("tbl_ticket_void","tbl_ticket_void");
                $query->fields("tbl_ticket_void");
                $query->condition("pnr_code",$pnr_code);
                $check = $query->execute()->fetchObject();
                if(!empty($check)){
                    $data['message'] = "Vé này đã void!!";
                    $data['response'] = "FAILED";
                }else{                    
                    $listTicketNumbers = $_REQUEST['listTicketNumbers'];
                    $listTicketIndexs = $_REQUEST['listTicketIndexs'];
                    $totalPrice = $_REQUEST['totalPrice'];
                    $_data = new stdClass();
                    $_data->PNRCode = $pnr_code;
                    $_data->TicketIndexs = $listTicketIndexs;	
                    $_data->VoidTickets = $listTicketNumbers;	
                    $_data->TotalPrice = $totalPrice;	
                    $response = cassiopeia_meta_api_VoidPNRByListTicketNumber($_data);
                    if(!empty($response) && $response->Code =="0"){
                        $data['response'] = "OK";
                        try{
                            db_insert("tbl_ticket_void")->fields(array(
                                "pnr_code"      => $pnr_code,
                                "tran_user"     => $user->uid,                                
                                "uid"       => $user->uid,
                                "created"   => REQUEST_TIME,
                                "status"    => "OK",
                                "message"    => serialize($response->Message),
                            ))->execute();
                        }catch (Exception $e){

                        }
                    }else{
                        db_insert("tbl_ticket_void")->fields(array(
                            "pnr_code"      => $pnr_code,
                            "tran_user"     => $user->uid,                                
                            "uid"       => $user->uid,
                            "created"   => REQUEST_TIME,
                            "status"    => "FAIL",
                            "message"    => serialize($response->Message),
                        ))->execute();
                        $data['message'] = "Đã xảy ra lỗi, vui lòng liên hệ bộ phận booker để được hỗ trợ!";
                        $data['response'] = "FAILED";
                    }
                }
                break;
            case "update-report":
                $agent = $_REQUEST['agent'];
                $tran_code = $_REQUEST['tran_code'];
                $_data = new stdClass();
                $_data->startTime = "";
                if(!empty($tran_code)){
                    $query = db_select("tbl_report","tbl_report");
                    $query->fields("tbl_report");
                    $query->condition("tran_code",$tran_code);
                    $result = $query->execute()->fetchObject();

                    $_data->startTime = $result->created;
                }

                $_data->agent = $agent;
//                _print_r($_data);
                cassiopeia_fix_report($_data);
                break;
            case "delete-report":
                if(user_has_role(3)){
                    $tran_code = $_REQUEST['tran_code'];
                    $query = db_select("tbl_report","tbl_report");
                    $query->fields("tbl_report");
                    $query->condition("tran_code",$tran_code);
                    $report = $query->execute()->fetchObject();
                    if($report->type=="issue"){
                        $table = "tbl_issue_report";
                    }elseif($report->type=="room_booking"){
                        $table = "tbl_room_booking_report";
                    }else{
                        $table = "tbl_payment_report";
                    }
                    if(cassiopeia_delete_report($tran_code,$table)){

                        $data['response'] = "OK";
                    };
                }
                break;
            case "get-ticket-QH":
                $TotalAdult = isset($_REQUEST['TotalAdult'])?$_REQUEST['TotalAdult']:"";
                $TotalLeg   = isset($_REQUEST['TotalLeg'])?$_REQUEST['TotalLeg']:"";
                $code       = trim($_REQUEST['code']);
                $_html      = $_REQUEST['html'];
                $_flight    = isset($_REQUEST['flight'])?$_REQUEST['flight']:"";
                $_first_row = isset($_REQUEST['first_row'])?$_REQUEST['first_row']:"";
                $_last_row  = isset($_REQUEST['last_row'])?$_REQUEST['last_row']:"";
                $flights = $_REQUEST['flights'];
                $ItineraryArray = [];
                foreach($flights as $__flight){
                    $DOM = new DOMDocument();
                    $DOM->loadHTML($__flight);
                    $Detail = $DOM->getElementsByTagName('td');
                    $temp = [];
                    foreach($Detail as $sNodeDetail) {
                        $temp[] = trim($sNodeDetail->textContent);
                    }
                    $ItineraryArray[] = $temp;
                }
                $html = $_html;
                $flight = $_flight;
                $first_row = $_first_row;
                $last_row = $_last_row;
                $booking = cassiopeia_qt_ticket_booking_load_by_PNR($code,"QH");

                if(!empty($booking)){

                    $tickets = $booking->tickets;
                    $guest_count = 0;
                    $fee = 0 ;
                    $guest_count+=$booking->adt;
                    $guest_count+=$booking->chd;
                }
                $TotalPrice = 0;
                if(!empty($first_row)){
                    $DOM = new DOMDocument();
                    $DOM->loadHTML($first_row);
                    $Header = $DOM->getElementsByTagName('th');
                    $Detail = $DOM->getElementsByTagName('td');
                    foreach($Header as $NodeHeader)
                    {
                        $aDataTableHeaderHTML[] = trim($NodeHeader->textContent);
                    }
                    $i = 0;
                    $j = 0;
                    $aDataTableDetailHTML = array();
                    foreach($Detail as $sNodeDetail)
                    {
                        $guests[$j][] = trim($sNodeDetail->textContent);
                        $i = $i + 1;
                        $j = $i % (count($aDataTableHeaderHTML)) == 0 ? $j + 1 : $j;
                    }
                    $infant = 0;
                    foreach($guests as $guest){
                        if(strpos("em bé",$guest)!==false){
                            $infant++;
                        }
                    }
                }
                $aDataTableHeaderHTML = array();
                foreach($ItineraryArray as $item){
                    $price = cleanAmount($item[5]) + cleanAmount($item[6]) + cleanAmount($item[7]);
                    $TotalPrice+=$price;
                }
                $_SESSION[strtoupper(trim($code)).'-count_leg'] = $TotalLeg;
                $_SESSION[strtoupper(trim($code)).'-count_adult'] = $TotalAdult;
                $_SESSION[strtoupper(trim($code)).'-PNR'] = $code;
                $_SESSION[strtoupper(trim($code)).'-Airline'] = "QH";
                $data['TotalPrice'] = $TotalPrice;
                if(!empty($booking)){
                    $TotalPrice+= $booking->silverFee;
                }
                $_SESSION[strtoupper(trim($code)).'-total_price'] = $TotalPrice;
                $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/ticket-QH-review-ver-2.tpl.php",array("html"=>$html,"TotalPrice"=>$TotalPrice));
                break;
            case "delete_baggage":
                $id = $_REQUEST['_id'];
                if(user_has_role(3)){
                    try{
                        db_delete("tbl_bagage")->condition("id",$id)->execute();
                    }catch (Exception $E){

                    }
                }
                break;
            case "get-ticket-VU-review":
                $airline = $_REQUEST['airline'];
                $code = trim($_REQUEST['code']);
                $html = $_REQUEST['html'];
                $last_row = $_REQUEST['last_row'];
                $airline = isset($_REQUEST['airline'])?$_REQUEST['airline']:"";
                $tableArr = isset($_REQUEST['tableArr'])?json_decode($_REQUEST['tableArr']):array();
                $code = isset($_REQUEST['code'])?trim($_REQUEST['code']):"";
                $html = isset($_REQUEST['html'])?$_REQUEST['html']:"";
                $last_row = isset($_REQUEST['last_row'])?$_REQUEST['last_row']:"";
                $itinerary_row = isset($_REQUEST['flights'])?$_REQUEST['flights']:"";
                $airline = "VJ";
                $total = 0;
                if(!empty($itinerary_row)){
                    $ItineraryHTML = [];
                    $DOM = new DOMDocument();
                    $DOM->loadHTML($itinerary_row);
                    $Header = $DOM->getElementsByTagName('th');
                    $Detail = $DOM->getElementsByTagName('td');
                    foreach($Header as $NodeHeader)
                    {
                        $aDataTableHeaderHTML[] = trim($NodeHeader->textContent);
                    }
                    $i = 0;
                    $j = 0;
                    foreach($Detail as $sNodeDetail)
                    {
                        $ItineraryHTML[$j][] = trim($sNodeDetail->textContent);
                        $i = $i + 1;
                        $j = $i % (count($aDataTableHeaderHTML)) == 0 ? $j + 1 : $j;
                    }
                    $aDataTableDetailHTML = [];
                    $aDataTableHeaderHTML = [];
                    $DOM = new DOMDocument();
                    $DOM->loadHTML($last_row);
                    $Header = $DOM->getElementsByTagName('th');
                    $Detail = $DOM->getElementsByTagName('td');
                    foreach($Header as $NodeHeader)
                    {
                        $aDataTableHeaderHTML[] = trim($NodeHeader->textContent);
                    }
                    $i = 0;
                    $j = 0;
                    foreach($Detail as $sNodeDetail)
                    {
                        $aDataTableDetailHTML[$j][] = trim($sNodeDetail->textContent);
                        $i = $i + 1;
                        $j = $i % (count($aDataTableHeaderHTML)) == 0 ? $j + 1 : $j;
                    }
                    $baggages = array();
                    $guest = array();
                    $infant = 0;
                    $count = 0;
                    foreach($aDataTableDetailHTML as $item){
                        $guest[$item[1]] = $item[1];
                        if(strpos($item[2],"Add Ons")!==false){
                            $baggages[$item[1]] = $item;
                        }
                        if(strpos($item[2],"INFANT")!==false){
                            $infant++;
                        }
                    }
                    $remove = array_pop($guest);
                    $TotalAdult = count($guest) - $infant;
                    $total_row = $aDataTableDetailHTML[count($aDataTableDetailHTML)-1];
                    $total = str_replace("VND","",$total_row[1]);
                    $total = str_replace(",","",$total_row[1]);
                    $total = trim($total);
                    $total_fee = 0;
                    $total_rate= 0;
                    $totalBaggage = 0;
                    $total+=$total_fee;
                    $new_row = "";
                    $_SESSION[strtoupper(trim($code)).'-count_leg'] = count($ItineraryHTML);
                    $_SESSION[strtoupper(trim($code)).'-count_adult'] = $TotalAdult;
                    $_SESSION[strtoupper(trim($code)).'-total_price'] = $total;
                    $_SESSION[strtoupper(trim($code)).'-Airline'] = $airline;
                    $_SESSION[strtoupper(trim($code)).'-PNR'] = $code;
                }
                $data['TotalPrice'] = $total;
                $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/ticket-VU-review.tpl.php",array("html"=>$html,"last_row"=>$last_row,"itinerary_row"=>$itinerary_row,"tableArr"=>$tableArr,"code"=>$code,"airline"=>$airline));
                break;
            case "get-ticket-VJ-review":
                $airline = isset($_REQUEST['airline'])?$_REQUEST['airline']:"";
                $tableArr = isset($_REQUEST['tableArr'])?json_decode($_REQUEST['tableArr']):array();
                $code = isset($_REQUEST['code'])?trim($_REQUEST['code']):"";
                $html = isset($_REQUEST['html'])?$_REQUEST['html']:"";
                $last_row = isset($_REQUEST['last_row'])?$_REQUEST['last_row']:"";
                $itinerary_row = isset($_REQUEST['itinerary_row'])?$_REQUEST['itinerary_row']:"";
                $airline = "VJ";
                $total = 0;
                if(!empty($itinerary_row)){
                    $ItineraryHTML = [];
                    $DOM = new DOMDocument();
                    $DOM->loadHTML($itinerary_row);
                    $Header = $DOM->getElementsByTagName('th');
                    $Detail = $DOM->getElementsByTagName('td');
                    foreach($Header as $NodeHeader)
                    {
                        $aDataTableHeaderHTML[] = trim($NodeHeader->textContent);
                    }
                    $i = 0;
                    $j = 0;
                    foreach($Detail as $sNodeDetail)
                    {
                        $ItineraryHTML[$j][] = trim($sNodeDetail->textContent);
                        $i = $i + 1;
                        $j = $i % (count($aDataTableHeaderHTML)) == 0 ? $j + 1 : $j;
                    }
                    $_Itinerary = $ItineraryHTML[0];
                    $_Start = $_Itinerary[3];
                    $_End = $_Itinerary[4];
                    $temp = explode("(",$_Start);
                    $temp = $temp[1];
                    $temp = explode(")",$temp);
                    $_StartPoint = $temp[0];
                    $temp = explode("(",$_End);
                    $temp = $temp[1];
                    $temp = explode(")",$temp);
                    $_EndPoint = $temp[0];


                    $aDataTableDetailHTML = [];
                    $aDataTableHeaderHTML = [];
                    $DOM = new DOMDocument();
                    $DOM->loadHTML($last_row);
                    $Header = $DOM->getElementsByTagName('th');
                    $Detail = $DOM->getElementsByTagName('td');
                    foreach($Header as $NodeHeader)
                    {
                        $aDataTableHeaderHTML[] = trim($NodeHeader->textContent);
                    }
                    $i = 0;
                    $j = 0;
                    foreach($Detail as $sNodeDetail)
                    {
                        $aDataTableDetailHTML[$j][] = trim($sNodeDetail->textContent);
                        $i = $i + 1;
                        $j = $i % (count($aDataTableHeaderHTML)) == 0 ? $j + 1 : $j;
                    }
                    $baggages = array();
                    $guest = array();
                    $infant = 0;
                    $count = 0;
                    foreach($aDataTableDetailHTML as $item){
                        $guest[$item[1]] = $item[1];
                        if(strpos($item[2],"Add Ons")!==false){
                            $baggages[$item[1]] = $item;
                        }
                        if(strpos($item[2],"INFANT")!==false){
                            $infant++;
                        }
                    }
                    $remove = array_pop($guest);
                    $TotalAdult = count($guest) - $infant;
                    $total_row = $aDataTableDetailHTML[count($aDataTableDetailHTML)-1];
                    $total = str_replace("VND","",$total_row[3]);
                    $total = str_replace(",","",$total_row[3]);
                    $total = trim($total);
                    $total_fee = 0;
                    $total_rate= 0;
                    $totalBaggage = 0;
                    $total+=$total_fee;
                    $new_row = "";
                    $_SESSION[strtoupper(trim($code)).'-count_leg'] = count($ItineraryHTML);
                    $_SESSION[strtoupper(trim($code)).'-count_adult'] = $TotalAdult;
                    $_SESSION[strtoupper(trim($code)).'-total_price'] = $total;
                    $_SESSION[strtoupper(trim($code)).'-Airline'] = $airline;
                    $_SESSION[strtoupper(trim($code)).'-PNR'] = $code;
                }
                $data['TotalPrice'] = $total;

                $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/ticket-VJ-review-ver-2.tpl.php",array("html"=>$html,"last_row"=>$last_row,"itinerary_row"=>$itinerary_row,"tableArr"=>$tableArr,"code"=>$code,"airline"=>$airline));
                break;
            case "get-detail-report-tab":
                $tab_id = $_REQUEST['tab_id'];
                $date_filter = !empty($_REQUEST['date_filter'])?$_REQUEST['date_filter']:"";
//            print($tab_id);
                switch ($tab_id){
                    case "tab-1" :
                        $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/detail-report-tab-1.tpl.php",array("date_filter"=>$date_filter));
                        break;
                    case "tab-2" :
                        $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/detail-report-tab-2.tpl.php",array("date_filter"=>$date_filter));
                        break;
                    case "tab-3" :
                        $agent = !empty($_REQUEST['agent'])?$_REQUEST['agent']:"all";
                        $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/detail-report-tab-3.tpl.php",array("date_filter"=>$date_filter,"agent"=>$agent));
                        break;
                    case "tab-4" : break;
                    case "tab-5" : break;
                    case "tab-6" : break;
                }
                break;
            case "add-paymnent-report":
                $_data = json_decode($_REQUEST['_data']);
//                _print_r($_data);
//                die;
                try{
                    $_agent = user_load($_data->agent);
                    $balance = !empty($_agent->field_account_balance['und'][0]['value'])?$_agent->field_account_balance['und'][0]['value']:0;
                    $tran_kind = cassiopeia_get_tran_kind_by_id($_data->tran_kind);
                    $flag = true;
                    $amount = str_replace(".","",$_data->amount);
                    if($tran_kind['type']==1){ //cộng tiền
                        $balance += $amount;
                    }else{ //trừ tiền
                        $balance -= $amount;
                    }
                    $_agent->field_account_balance['und'][0]['value'] = $balance;
                    user_save($_agent);
                    $id = db_insert("tbl_payment_report")->fields(array(
                        "created"           => REQUEST_TIME,
                        "date"           => !empty($_data->date)?strtotime($_data->date):REQUEST_TIME,
                        "tran_code"         => REQUEST_TIME,
                        "amount"             => !empty($amount)?$amount:"",
                        "content"           => !empty($_data->content)?$_data->content:"",
                        "agent"             => !empty($_data->agent)?$_data->agent:0,
                        "tran_kind"             => !empty($_data->tran_kind)?$_data->tran_kind:"",
                        "tran_user"         => $user->uid,
                        "balance"         => $balance,
                        "status"            => 0, // chưa sử dụng
                        "category"         => "payment",
                    ))->execute();
                    db_insert("tbl_report")->fields(array(
                        "created"           => REQUEST_TIME,
                        "tran_code"         => REQUEST_TIME,
                        "type"         => "payment",
                    ))->execute();
                    db_insert("tbl_log")->fields(array(
                        "created"   => REQUEST_TIME,
                        "uid"   => $user->uid,
                        "value"   => "Thêm báo cáo",
                        "booking_code"   => REQUEST_TIME,
                    ))->execute();
                    $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/payment-report-item.tpl.php",array("id"=>$id));
                }catch (Exception $e){
//                    print_r($e);
//                    die;
                }
                break;
            case "add-issue-report":
                $_data = json_decode($_REQUEST['_data']);
                $partner_price = !empty($_data->partner_price)?str_replace(".","",$_data->partner_price):0;
                $price = !empty($_data->price)?str_replace(".","",$_data->price):0;
                $insertData = new stdClass();
                $insertData->partner_price = $partner_price;
                $insertData->price = $price;
                $insertData->agent = $_data->agent;
                $insertData->tran_kind = $_data->tran_kind;
                $insertData->quantity = $_data->quantity;
                $insertData->PNR = $_data->PNR;
                $insertData->date = strtotime($_data->date);
                $insertData->airline = $_data->airline;
                $insertData->content = $_data->content;

                cassiopeia_create_issue_report($insertData);
//                $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/issue-report-items.tpl.php");
                break;
            case "load-void-report":
                $_data = json_decode($_REQUEST['_data']);
                $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/void-report-items.tpl.php",array("data"=>$_data));
                break;
            case "load-payment-report":
                $_data = json_decode($_REQUEST['_data']);
                if($user->uid==-1){
                    $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/test.tpl.php",array("data"=>$_data));
                }else{
                    $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/payment-report-items.tpl.php",array("data"=>$_data));
                }
                break;                
            case "redirect-link-with-data":
                $_data = json_decode($_REQUEST['_data']);
                $loadDataFromOtherLink = $_REQUEST['loadDataFromOtherLink'];
                $_SESSION["DataFromOtherLink"] = json_decode($_REQUEST['_data']);
                $_SESSION["loadDataFromOtherLink"] = $_REQUEST['loadDataFromOtherLink'];
                break;
            case "load-issue-report":
                $_data = json_decode($_REQUEST['_data']);
                $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/issue-report-items.tpl.php",array("data"=>$_data));
                break;
            case "load-test-report":
                $_data = json_decode($_REQUEST['_data']);
                $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/test-report-items.tpl.php",array("data"=>$_data));
                break;
            case "get_airport_by_code":
                $code = $_REQUEST['code'];
                $airport = cassiopeia_get_airport($code);
                $data['airport'] = $airport;
                break;
            case "notify-update-status":
                $id = $_REQUEST['id'];
                $notify = node_load($id);
                $array = array();
                $flag = true;
                if(!empty($notify)){
                    $agents = $notify->field_read['und'];
                    if(!empty($agents)){
                        foreach($agents as $item){
                            if($item['value'] == $user->uid){
                                $flag = true;
                            }
                        }
                    }
//                print_r($agents);
                    if($flag){
                        $notify->field_read['und'][]['value'] = $user->uid;
                        node_save($notify);
                    }
                }
                break;
            case "get_issue_report_by_id":
                $id = $_REQUEST['id'];
                $query = db_select("tbl_issue_report","tbl_issue_report");
                $query->fields("tbl_issue_report");
                $query->condition("id",$id);
                $result = $query->execute()->fetchObject();
                $data['object'] = $result;
                break;
            case "number_format":
                $_value = $_REQUEST['value'];
                $_value = str_replace(".","",$_value);
                $data['value'] = number_format($_value,0,",",".");
                break;
            case "add_issue_report": // trash
                $airline = !empty($_REQUEST['airline'])?$_REQUEST['airline']:"";
                $tran_kind = !empty($_REQUEST['tran_kind'])?$_REQUEST['tran_kind']:"";
                $PNR = !empty($_REQUEST['PNR'])?$_REQUEST['PNR']:"";
                $quantity = !empty($_REQUEST['quantity'])?$_REQUEST['quantity']:"";
                $partner_price = !empty($_REQUEST['partner_price'])?$_REQUEST['partner_price']:"";
                $price = !empty($_REQUEST['price'])?$_REQUEST['price']:"";
                $agent = !empty($_REQUEST['agent'])?$_REQUEST['agent']:"";
                try{
                    $query = db_select("tbl_issue_report","tbl_issue_report");
                    $query->fields("tbl_issue_report");
                    $query->range(0,1);
                    $query->orderBy("id","DESC");
                    $last = $query->execute()->fetchAssoc();
                    if(!empty($last)){
                        $temp = str_replace("ISSUE","",$last['tran_code']);
                        $tran_code = "ISSUE".date("m",REQUEST_TIME).($temp+1);
                    }else{
                        $tran_code = "ISSUE".date("m",REQUEST_TIME)."0001";
                    }
                    $_agent = user_load($agent);
                    $balance = !empty($_agent->field_account_balance['und'][0]['value'])?$_agent->field_account_balance['und'][0]['value']:0;
                    $tran_kind = cassiopeia_get_tran_kind_by_id($tran_kind);
                    $flag = true;
                    if($tran_kind['type']==1){ //cộng tiền
                        $balance += $quantity*$partner_price;
                    }else{ //trừ tiền
                        if($balance<$partner_price){
                            drupal_set_message("Số dư khả dụng không đủ!");
                            $flag = false;
                        }else{
                            $balance -= $quantity*$partner_price;
                        }
                    }
                    if($flag==true){
//                        $query = db_select("tbl_issue_report","tbl_issue_report");
//                        $query->fields("tbl_issue_report");
//                        $query->condition("agent",55);
//                        $query->addExpression("SUM(partner_price)","total");
//                        $query->groupBy("agent");
//                        $result = $query->execute()->fetchObject();
//                        $total = $result->total;
//                        $point = ceil($total/1000000);
//                        $_agent->field_point['und'][0]['value'] = $point;
                        $_agent->field_account_balance['und'][0]['value'] = $balance;
                        user_save($_agent);
                        db_insert("tbl_issue_report")->fields(array(
                            "created"           => REQUEST_TIME,
                            "tran_code"         => $tran_code,
                            "airline"             => $airline,
                            "tran_kind"             => !empty($tran_kind['id'])?$tran_kind['id']:"",
                            "PNR"             => !empty($PNR)?$PNR:"",
                            "quantity"             => !empty($quantity)?$quantity:0,
                            "partner_price"             => !empty($partner_price)?$partner_price:0,
                            "price"             => !empty($price)?$price:0,
                            "revenue"             => $quantity*($partner_price-$price),
                            "agent"             => !empty($agent)?$agent:"",
                            "tran_user"         => $user->uid,
                            "balance"         => $balance,
                            "category"         => "issue",
                        ))->execute();
                        db_insert("tbl_report")->fields(array(
                            "created"           => REQUEST_TIME,
                            "type"         => "issue",
                            "tran_code"         => $tran_code,
                        ))->execute();
                        $data['status'] = "OK";
                        $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/issue-report-items.tpl.php");
                    }
                }catch (Exception $e){
                    print_r($e);
                    die;
                }
                break;
            case "autosugguest_destination":
                $text = $_REQUEST['text'];
                $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/list-of-destination.tpl.php",array("text"=>$text));
                break;
            case "flight-search-get-calendar":
                $_date = $_REQUEST['date'];
                $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/flight-search-calendar.tpl.php",array("date"=>$_date));
                break;
            case "agent-login":
                $_data = json_decode($_REQUEST['data']);
                if(user_authenticate($_data->username, $_data->password))
                {
                    $query = db_select("users","tbl_user");
                    $query -> fields("tbl_user");
                    $query -> join("field_data_field_account_code","tbl_account_code","tbl_account_code.entity_id = tbl_user.uid");
                    $query -> condition("tbl_account_code.field_account_code_value",$_data->agentcode);
                    $query -> condition("tbl_user.name",$_data->username);
                    $result = $query -> execute() -> fetchAssoc();
                    if(!empty($result)){
                        $user_obj = user_load_by_name($_data->username);
                        $form_state = array();
                        $form_state['uid'] = $user_obj->uid;
                        user_login_submit(array(), $form_state);
                        $data['response'] = "OK";
                        drupal_set_message("Đăng nhập thành công!");
                    }else{
                        $data['response'] = "FAIL";
                    }
                }
                else
                {
                    $data['response'] = "FAIL";
                }
                break;
            case "admin-booking-create-customer":
                $_adt = $_REQUEST['adt'];
                $_chd = $_REQUEST['chd'];
                $_inf = $_REQUEST['inf'];
                $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/create-customer.tpl.php",array("adt"=>$_adt,"chd"=>$_chd,"inf"=>$_inf));
                break;
            case "custom_login":
                $_account = json_decode($_REQUEST['data']);
                if(user_authenticate($_account[1], $_account[2]))
                {
                    $query = db_select("users","tbl_user");
                    $query -> fields("tbl_user");
                    $query -> join("field_data_field_account_code","tbl_account_code","tbl_account_code.entity_id = tbl_user.uid");
                    $query -> condition("tbl_account_code.field_account_code_value",$_account[0]);
                    $query -> condition("tbl_user.name",$_account[1]);
                    $result = $query -> execute() -> fetchAssoc();
                    if(!empty($result)){
                        $user_obj = user_load_by_name($_account[1]);
                        if($user_obj->status==1){
                            $form_state = array();
                            $form_state['uid'] = $user_obj->uid;
                            user_login_submit(array(), $form_state);
                            $data['status'] = "OK";
                            $data['message'] = "Đăng nhập thành công";
//                            $data['block_login'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/block-login.tpl.php",array("user"=>$user_obj->uid));
//                            $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/booking-itinerary.tpl.php");
//                            $data['booking_form'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/booking-form.tpl.php");
                        }else{
                            $data['status'] = "FAILED";
                            $data['message'] = "Tài khoản đã bị khóa, vui lòng liên hệ với bộ phận Booker!";
                        }
                    }else{
                        $data['status'] = "FAILED";
                        $data['message'] = "Không tìm thấy tài khoản phù hợp!";
                    }
                }
                else
                {
                    $data['status'] = "FAILED";
                    $data['message'] = "Không tìm thấy tài khoản phù hợp!";
                }
                break;
            case "partner-change-status":
                if(cassiopeia_qt_partner_change_status_accept()){
                    $_uid = $_REQUEST['_uid'];
                    $_status = $_REQUEST['_status'];
                    $query = db_select("users","tbl_user");
                    $query -> fields("tbl_user");
                    $query -> condition("uid",$_uid);
                    $_partner = $query -> execute() -> fetchAssoc();
                    if(!empty($_partner['uid'])){
                        $_partner = user_load($_partner['uid']);
                        if(!empty($_partner->field_account_sale['und'][0]['target_id']) && $_partner->field_account_sale['und'][0]['target_id'] != $user->uid){
                            $data['message'] = "Đã có nhân viên sale phụ trách khách hàng này!";
                            $data['response'] = "FAIL";
                        }else{
                            try{
                                $_partner->field_account_status['und'][0]['tid'] = $_status;
                                if(($_status==22 || $_status==13) ){
                                    require_once DRUPAL_ROOT . '/' . variable_get('password_inc', 'includes/password.inc');
                                    $_partner->field_account_sale['und'][0]['target_id'] = $user->uid;
                                    $pass = "123456";
                                    $_partner->pass = user_hash_password($pass);
                                    $code = "QT";
                                    for($i=1;$i < 6 - strlen((string)$_partner->uid);$i++){
                                        $code .= "0";
                                    }
                                    $code.=$_partner->uid;
                                    $_partner->field_account_code['und'][0]['value'] = $code;
                                    cassiopeia_send_account_to_agent($_partner,$pass);
                                }
                                if($_status==22 || $_status==13){
                                    $_partner->status = 1;
                                }else{
                                    $_partner->status = 0;
                                }
                                $_partner->field_account_updated_date['und'][0]['value'] = REQUEST_TIME;
                                user_save($_partner);

                                $data['message'] = "Cập nhật thành công!";
                                $data['response'] = "OK";
                            }catch (Exception $e){
                                $data['message'] = "Đã xảy ra lỗi, vui lòng liên hệ với người quản trị!";
                                $data['response'] = "FAIL";
                            }
                        }
                    }
                    $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/partner.tpl.php",array("partner"=>$_partner));
                }else{
                    $data['message'] = "Tài khoản không có quyền thực hiện chức năng này!!";
                    $data['response'] = "FAIL";
                }
                break;
            case "delete_ticket_price":
                $_id = $_REQUEST['_id'];
                try{
                    db_delete("tbl_price_board")->condition("id",$_id)->execute();
                }catch (Exception $e){

                }
                break;
            case "delete_agent_fee":
                $_id = $_REQUEST['_id'];
                try{
                    db_delete("tbl_agent_fee")->condition("id",$_id)->execute();
                }catch (Exception $e){

                }
                break;
            case "get_ticket_price_detail":
                $_id = $_REQUEST['_id'];
                $query = db_select("tbl_price_board","tbl_price_board");
                $query -> fields("tbl_price_board");
                $query -> condition("id",$_id);
                $result = $query -> execute() -> fetchAssoc();
                $data['response'] = $result;
                break;
            case "delete_agent_fee":
                $_id = $_REQUEST['_id'];
                try{
                    db_delete("tbl_price_board")->condition("id",$_id)->execute();
                }catch (Exception $e){

                }
                break;
            case "get_agent_fee_detail":
                $_id = $_REQUEST['_id'];
                $query = db_select("tbl_agent_fee","tbl_agent_fee");
                $query -> fields("tbl_agent_fee");
                $query -> condition("id",$_id);
                $result = $query -> execute() -> fetchAssoc();
                $data['response'] = $result;
                break;
            case "booking-get-receipts":
                $booking_code = $_REQUEST['booking_code'];
                $query = db_select("tbl_booking","tbl_booking");
                $query -> fields("tbl_booking");
                $query -> join("tbl_customer","tbl_customer","tbl_customer.booking_code = tbl_booking.booking_code");
                $query -> fields("tbl_customer");
                $query -> condition(".tbl_booking.booking_code",$booking_code,"=");
                $booking = $query->execute()->fetchAssoc();
                $data['payer'] = $booking['FullName'];
                $data['price'] = $booking['price'];
                $data['price_in_words'] = convert_number_to_words($booking['price']);
                $data['user_created'] = $user->name;
                break;
            case "booking-send-mail" :
                $_mail = $_REQUEST['_mail'];
                $booking_code = $_REQUEST['booking_code'];
                $version = $_REQUEST['version'];
                $site_mail = "";
                $booking = cassiopeia_get_booking_detail_by_code(trim($booking_code));
                if($booking['DO'] ==1){
                    $body[] = _cassiopeia_render_theme("module","cassiopeia","templates/mail/booking-mail-ver-2.tpl.php",array("booking_code"=>$booking['booking_code']));
                }else{
                    $body[] = _cassiopeia_render_theme("module","cassiopeia","templates/mail/booking-mail-international.tpl.php",array("booking_code"=>$booking['booking_code']));
                }                
                $headers['From'] = $headers['Sender'] = $headers['Return-Path'] = "";
                $headers['MIME-Version'] = '1.0';
                $headers['Content-Type'] = 'text/html; charset=UTF-8; format=flowed; delsp=yes';
                $params = array(
                    'body'      => $body,
                    'subject'   => "Booking ".ucfirst(SITE_DOMAIN),
                    'headers'   => $headers,
                );
                if(drupal_mail('cassiopeia', 'custom_key',$_mail, language_default(), $params)){};
                break;
            case "booking-get-mail" :
                $DO = isset($_REQUEST['DO'])?$_REQUEST['DO']:1;
                $_code = $_REQUEST['booking_code'];
                $version = $_REQUEST['version'];
                $booking = cassiopeia_get_booking_detail_by_code(trim($_code));
                if($booking['DO'] ==1){
                    $data['_html'] = _cassiopeia_render_theme("module","cassiopeia","templates/mail/booking-mail-ver-2.tpl.php",array("booking_code"=>$booking['booking_code']));
                }else{
                    $data['_html'] = _cassiopeia_render_theme("module","cassiopeia","templates/mail/booking-mail-international.tpl.php",array("booking_code"=>$booking['booking_code']));
                }
                break;
            
            case "check-available-balance":
                $_partnerPriceRequest = $_REQUEST['partnerPriceRequest'];
                $_agentId = $_REQUEST['agentId'];
                $_agent = user_load($_agentId);
                $balance = !empty($_agent->field_account_balance['und'][0]['value'])?$_agent->field_account_balance['und'][0]['value']:0;
                if($balance >= $_partnerPriceRequest){
                    $data['message'] = "OK";
                }else{
                    $data['message'] = "FAIL";
                }
                break;
            case "room-booking-update-update":
                $_status = $_REQUEST['status'];
                $_note = $_REQUEST['note'];
                $_code = $_REQUEST['booking_code'];
//                $booking = cassiopeia_get_room_booking_detail_by_code($_code);

                $sub_query = db_select("cassiopeia_room_booking","cassiopeia_room_booking");
                $sub_query->fields("cassiopeia_room_booking");
                $sub_query->join("cassiopeia_room_booking_detail","cassiopeia_room_booking_detail","cassiopeia_room_booking_detail.code=cassiopeia_room_booking.code");
                $sub_query->addExpression("cassiopeia_room_booking_detail.number_of_room","number_of_quantity");
                $sub_query->addExpression("cassiopeia_room_booking_detail.number_of_night","number_of_night");
                $sub_query->addExpression("cassiopeia_room_booking_detail.number_of_night*cassiopeia_room_booking_detail.number_of_room","quantity_night");
                $sub_query->condition("cassiopeia_room_booking.code",$_code);
                $query = db_select($sub_query,"tbl_query");
                $query->fields("tbl_query");
                $query->groupBy("tbl_query.code");
                $query->orderBy("tbl_query.created","DESC");
                $query->addExpression("SUM(tbl_query.number_of_quantity)","quantity");
                $query->addExpression("SUM(tbl_query.number_of_night)","night");
                $query->addExpression("SUM(tbl_query.quantity_night)","total_quantity_night");
                $booking = $query->execute()->fetchObject();

                switch ($_status){
                    case 1:
                        $_statusText="Đặt chỗ";
                        $_statusCode="DATCHO";
                        break;
                    case 2:
                        $_statusText="Báo giá";
                        $_statusCode="BAOGIA";
                        break;
                    case 3:
                        $_statusText="Đã chốt";
                        $_statusCode="DACHOT";
                        break;
                    case 4:
                        $_statusText="Thất bại";
                        $_statusCode="THATBAI";
                        break;
                }
                if($booking->status!=$_status){
                    $_history = $booking->history;
                    try{
                        if($_status==3){
                            $NetPrice = $booking->net_price;
                            $PartnerPrice = $booking->partner_price;
                            $date1=date_create(date("Y-m-d",$booking->from_date));
                            $date2=date_create(date("Y-m-d",$booking->to_date));
                            $diff=date_diff($date1,$date2);
                            $db_transaction = db_transaction();
                            $_agent = user_load($booking->uid);
                            $balance = !empty($_agent->field_account_balance['und'][0]['value'])?$_agent->field_account_balance['und'][0]['value']:0;
                            $tran_code = "KS".REQUEST_TIME;
                            if($balance >= $PartnerPrice){
                                $balance-=$PartnerPrice;
                                $_history .= "Status : ".$_statusText." - ".date("d/m/Y H:i")." Updated by ".$user->name."<br>";
                                try{
                                    db_insert("tbl_room_booking_report")->fields(array(
                                        "created"   => REQUEST_TIME,
                                        "booking_code"   => $booking->code,
                                        "hotel"   => $booking->hotel,
                                        "guest"   => $booking->guest,
                                        "quantity"   => $booking->quantity,
                                        "night"   => $booking->night,
                                        "price"   => $NetPrice,
                                        "partner_price"   => $PartnerPrice,
                                        "revenue"   => $PartnerPrice-$NetPrice,
                                        "agent"   => $booking->uid,
                                        "tran_user"   => $user->uid,
                                        "tran_kind"   => 15,
                                        "quantity_night"           => $booking->total_quantity_night,
                                        "tran_code"   => $tran_code,
                                        "balance"   => $balance,
                                        "room_code"   => $booking->room_code,
                                        "quantity_night"   => $booking->quantity*$booking->night,
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
                                }catch (Exception $e){
                                    _print_r($e);
                                    $db_transaction->rollback();
                                }
                                $data['message'] = "OK";

                            }else{
                                $data['message'] = "NOTENOUGH";
                            }
                        }else{

                        }
                        $_history .= "Status : ".$_statusText." - ".date("d/m/Y H:i")." Updated by ".$user->name."<br>";
                        db_update("cassiopeia_room_booking")->fields(array(
                            "status"        => $_status,
                            "note"        => $_note,
                            "history"        => $_history,
                        ))->condition("code",$_code,"=")->execute();
                        $data['message'] = "OK";
                    }catch (Exception $e){
                        $data['message'] = "FAIL";
                    }
                }
                $data['status'] = "<td data-code='".$booking->code."' class='room-booking-".$_status."' >".$_statusText."</td>";
                $data['statusCode'] = $_statusCode;
                break;
            case "booking-update-update" :
                $_status = $_REQUEST['status'];
                $_note = $_REQUEST['note'];
                $_code = $_REQUEST['booking_code'];
                $booking = cassiopeia_get_booking_detail_by_code($_code);
                if($booking->status!=$_status){
                    $_history = $booking['history'];
                    $_history .= "Status : ".$_status." - ".date("d/m/Y H:i")." Updated by ".$user->name."<br>";
//                print($_history);
//                die;
                    try{
                        db_update("tbl_booking")->fields(array(
                            "status"        => $_status,
                            "note"        => $_note,
                            "history"        => $_history,
                        ))->condition("booking_code",$_code,"=")->execute();
                    }catch (Exception $e){
                        $data['message'] = "FAIL";
                    }
                }
                $data['message'] = "OK";
                $data['status'] = cassiopeia_get_booking_status($_status);
                break;
            case "room-booking-update-get-detail" :
                $_code = $_REQUEST['booking_code'];
                $booking = cassiopeia_room_booking_load_by_code($_code);
                $data['_status'] = $booking->status;
                $data['_history'] = $booking->history;
                break;
            case "booking-update-get-detail" :
                $_code = $_REQUEST['booking_code'];
                $booking = cassiopeia_get_booking_detail_by_code($_code);
                $data['_status'] = $booking['status'];
                $data['_history'] = $booking['history'];
                break;
            case "booking_international_submit" :
                $Domestic_airlines = unserialize(DOMESTIC_AIRLINES);
                $VN_TRIP = false;
                $_contact   = json_decode($_REQUEST['_contact']);
                $_Adt       = json_decode($_REQUEST['_Adt']);
                $_Chd       = json_decode($_REQUEST['_Chd']);
                $_Inf       = json_decode($_REQUEST['_Inf']);
                $_data      = new stdClass();
                $_array     = explode(" ",$_contact->full_name);
                $_contact_first_name = $_array[0];
                $_contact_last_name = str_replace($_contact_first_name,"",$_contact->full_name);

                $_data->ContactInfo = array(
                    "Gender"            => 1,
                    "FirstName"         => vn_to_str($_contact_first_name),
                    "LastName"          => vn_to_str($_contact_last_name),
                    "Phone"             => $_contact->tel,
                    "Email"             => $_contact->email,
                    "Address"           => "",
                );
                $stt = 0;
                $booking_code = "VE".REQUEST_TIME;
                $total_price=0;
                $Booking = $_SESSION['booking'];

                $FlightData = $_SESSION['FlightData'];
                $DataSession = $_SESSION['DataSession'];
                $FlightGroup = $_SESSION['FlightGroup'];
                $GroupSession = $FlightGroup->GroupSession;
                $DepartureFlight = $_SESSION['booking']['DepartureFlight'];
                $ReturnFlight = !empty($_SESSION['booking']['ReturnFlight'])?$_SESSION['booking']['ReturnFlight']:"";

                $CustomFee = !empty($_SESSION['customFee'])?$_SESSION['customFee']:0;

                $_data->DataSession = $DataSession;
                $_data->GroupSession = $GroupSession;
                $_data->DepartureFlightSession = $DepartureFlight->FlightSession;
                $_data->ReturnFlightSession = !empty($ReturnFlight->FlightSession)?$ReturnFlight->FlightSession:"";

                $_search = $_SESSION['data-search'];
                $Point_1 = cassiopeia_get_airport($_search['DepartureCode-0']);
                $Point_2 = cassiopeia_get_airport($_search['DestinationCode-0']);
                if($Point_1->country_code!="VN" && $Point_2->country_code!="VN"){
                    $Point_1_code = "SOTO";
                }else{
                    if($Point_2->country_code=="VN"){
                        $Point_1_code = $Point_1->region_code;
                    }else{
                        $Point_1_code = $Point_2->region_code;
                    }
                }
                if($Point_1->country_code!="VN" && $Point_2->country_code!="VN"){
                    $Point_2_code = "SOTO";
                }else{
                    if($Point_1->country_code=="VN"){
                        $Point_2_code = $Point_2->region_code;
                    }else{
                        $Point_2_code = $Point_1->region_code;
                    }
                }
                $RT = !empty($ReturnFlight)?true:false;
                $dataAirline = $DepartureFlight->AirlineCode;
                if(!empty($ReturnFlight)){
                    if(in_array($ReturnFlight->AirlineCode,$Domestic_airlines)&&in_array($DepartureFlight->AirlineCode,$Domestic_airlines)){
                        $Point_1_value['value'] = $CustomFee;
                        $Point_2_value['value'] = $CustomFee;
                    }else{
                        $Point_1_value = cassiopeia_get_fee_by_airline_and_region($DepartureFlight->AirlineCode,$Point_1_code);
                        $Point_2_value = cassiopeia_get_fee_by_airline_and_region($ReturnFlight->AirlineCode,$Point_2_code);
                    }
                    if($dataAirline != $ReturnFlight->AirlineCode){
                        $dataAirline .= "-".$ReturnFlight->AirlineCode;
                    }
                }else{
                    if(!in_array($DepartureFlight->AirlineCode,$Domestic_airlines)){
                        $Point_1_value = cassiopeia_get_fee_by_airline_and_region($DepartureFlight->AirlineCode,$Point_1_code);
                    }else{
                        $Point_1_value['value'] = $CustomFee;
                    }
                }
                $Point_1_fee = !empty($Point_1_value['value'])?$Point_1_value['value']:0;
                $Point_2_fee = !empty($Point_2_value['value'])?$Point_2_value['value']:0;
                if($RT!=true){
                    $Point_2_fee = 0;
                }
                $requiresVnIdentity = $DepartureFlight->AirlineCode === 'VN'
                    || (!empty($ReturnFlight) && $ReturnFlight->AirlineCode === 'VN');
                $vnAdultIdentity = array();
                if ($requiresVnIdentity) {
                    try {
                        foreach ($_Adt as $adultIndex => $adult) {
                            $vnAdultIdentity[$adultIndex] = cassiopeia_vn_adult_identity_fields(
                                $adult,
                                date('d/m/Y'),
                                date('d/m/Y', strtotime($DepartureFlight->StartDate))
                            );
                        }
                    }
                    catch (InvalidArgumentException $exception) {
                        $data['status'] = 'FAIL';
                        $data['message'] = 'Hành khách người lớn ' . ($adultIndex + 1) . ': ' . $exception->getMessage();
                        break;
                    }
                }
                if(!empty($_SESSION['booking'])){
                    //UPDATE PRICE!!!
                    if (!empty($_data->DepartureFlightSession) && $DepartureFlight->AirlineCode == 'VN') {
                        $FlightPricingParams = array(
                            "DataSession"  => $_data->DataSession,
                            "GroupSession"  => $_data->GroupSession,
                            "DepartureFlightSession"      => $_data->DepartureFlightSession,
                            //"ReturnFlightSession"      => $_data->ReturnFlightSession
                        );
                        if (!empty($_data->ReturnFlightSession)) {
                           $FlightPricingParams = array(
                               "DataSession"  => $_data->DataSession,
                               "GroupSession"  => $_data->GroupSession,
                               "DepartureFlightSession"      => $_data->DepartureFlightSession,
                               "ReturnFlightSession"      => $_data->ReturnFlightSession
                           );
                        }
                        //var_dump($FlightPricingParams);
                        $updated_1way_price = cassiopeia_meta_api_FlightPricing($FlightPricingParams);
                        //var_dump($updated_1way_price); exit;
                        $logfile = $_SERVER['DOCUMENT_ROOT'] . '/air_log_3527243.txt';
                        // Open the file to get existing content
                        $current = file_put_contents($logfile, PHP_EOL . date('d/m/Y h:i:s a', time()) . ': ' . var_export($FlightGroup, true) . PHP_EOL . var_export($updated_1way_price, true) . PHP_EOL . '-------------------' . PHP_EOL, FILE_APPEND);
                        
                        
                        if (isset($updated_1way_price->Data)) {
                            $FlightGroup->PriceAdult = $updated_1way_price->Data->PriceAdult;
                            $FlightGroup->PriceChild = $updated_1way_price->Data->PriceChild;
                            $FlightGroup->PriceInfant = $updated_1way_price->Data->PriceInfant;
                            $FlightGroup->TotalPrice = $updated_1way_price->Data->TotalPrice;
                        }
                    }
                    
                    if (!empty($_Adt)) {
                        foreach ($_Adt as $adultIndex => $item) {
                            $_array = explode(" ", $item->full_name);
                            $_first_name = $_array[0];
                            $_last_name = "";
                            for ($i = 1; $i <= count($_array); $i++) {
                                if(!empty($_array[$i])){
                                    $_last_name .= " " . $_array[$i];
                                }
                            }
                            $_last_name = trim($_last_name);
//                            $_Baggage_Return = !empty()
                            $passenger = array(
                                "Index"             => $stt,
                                "FirstName"         => vn_to_str($_first_name),
                                "LastName"          => vn_to_str($_last_name),
                                "Phone"             => $_contact->tel,
                                "Email"             => $_contact->email,
                                "Type"              => "ADT",
                                "Gender"            => $item->gender,
                                "Birthday"          => "16/05/1995",
                                "BaggageDeparture"  => "",
                                "BaggageReturn"     => "",
                                "PassportExpiryDate"=> "",
                                "PassportIssueCountry"=> "",
                                "PassportNumber"=> "",
                            );
                            if ($requiresVnIdentity) {
                                $passenger = array_merge($passenger, $vnAdultIdentity[$adultIndex]);
                            }
                            $_data->ListPassengers[] = $passenger;
                            $stt++;
                            $total_price += !empty($baggageDeparture)?$baggageDeparture->amount:0; // hành lý chiều đi
                            $total_price += !empty($baggageReturn)?$baggageReturn->amount:0; // hành lý chiều về
                            $total_price += $FlightGroup->PriceAdult+ cassiopeia_qt_price_fix($DepartureFlight->AgentFee)+ cassiopeia_qt_price_fix($DepartureFlight->ServiceFee); // thuế phí
                            if(!empty($ReturnFlight->FlightSession)){
                                $total_price +=cassiopeia_qt_price_fix($ReturnFlight->AgentFee)+ cassiopeia_qt_price_fix($ReturnFlight->ServiceFee); // thuế phí
                            }
                        }
                    }
                    if (!empty($_Chd)) {
                        foreach ($_Chd as $item) {
                            if(!empty(($item->baggages->ReturnFlights->id))){
                                $baggageReturn = cassiopeia_get_baggage_by_id($item->baggages->ReturnFlights->id);
                            }
                            if(!empty(($item->baggages->DepartureFlights->id))){
                                $baggageDeparture = cassiopeia_get_baggage_by_id($item->baggages->DepartureFlights->id);
                            }
                            $_array = explode(" ", $item->full_name);
                            $_first_name = $_array[0];
                            $_last_name = "";
                            for ($i = 1; $i <= count($_array); $i++) {
                                $_last_name .= " " . $_array[$i];
                            }
                            $_last_name = trim($_last_name);
                            $_data->ListPassengers[] = array(
                                "Index" => $stt,
                                "FirstName" => vn_to_str($_first_name),
                                "LastName" => vn_to_str($_last_name),
                                "Phone"             => $_contact->tel,
                                "Email"             => $_contact->email,
                                "Type" => "CHD",
                                "Gender" => $item->gender,
                                "Birthday" => date("d/m/Y",strtotime(str_replace("/", "-", $item->birth_day))),
                                "BaggageDeparture"  => "",
                                "BaggageReturn"     => "",
                            );
                            $stt++;
                            $total_price += !empty($baggageDeparture)?$baggageDeparture->amount:0; // hành lý chiều đi
                            $total_price += !empty($baggageReturn)?$baggageReturn->amount:0;; // hành lý chiều về
                            $total_price += $FlightGroup->PriceChild+ cassiopeia_qt_price_fix($DepartureFlightDetail->AgentFee)+ cassiopeia_qt_price_fix($DepartureFlightDetail->ServiceFee); // thuế phí
                            if(!empty($ReturnFlight->FlightSession)){
                                $total_price +=cassiopeia_qt_price_fix($ReturnFlight->AgentFee)+ cassiopeia_qt_price_fix($ReturnFlight->ServiceFee); // thuế phí
                            }; // thuế phí

                        }
                    }
                    if (!empty($_Inf)) {
                        foreach ($_Inf as $item) {
                            $_array = explode(" ", $item->full_name);
                            $_first_name = $_array[0];
                            $_last_name = "";
                            for ($i = 1; $i <= count($_array); $i++) {
                                $_last_name .= " " . $_array[$i];
                            }
                            $_last_name = trim($_last_name);
                            $_data->ListPassengers[] = array(
                                "Index" => $stt,
                                "FirstName" => vn_to_str($_first_name),
                                "LastName" => vn_to_str($_last_name),
                                "Type" => "INF",
                                "Gender" => $item->gender,
                                "Birthday" => date("d/m/Y",strtotime(str_replace("/", "-", $item->birth_day))),
                                "BaggageDeparture" => "",
                                "BaggageReturn" => "",
                            );
                            $stt++;
                            $total_price += $FlightGroup->PriceInfant; // thuế phí
                        }
                    }
//                    _print_r($ReturnFlight);
//                    _print_r($total_price);
//                    die;
                    $_search = $_SESSION['data-search'];
                    $booking = cassiopeia_meta_api_international_booking($_data);
                    $PNR_CODE = "";
                    $Booking_Status = 0;
                    if($booking->Code==0){
                        $PNR_CODE = $PNR_DEPARTURE = $booking->Data->DepartureCode;
                        $DepartureFlight->PNR = $PNR_CODE;
                        $TransactionCode = $booking->Data->TransactionCode;
                        if(!empty($ReturnFlight)){
                            if($PNR_CODE != $booking->Data->ReturnCode){
                                $ReturnFlight->PNR = $booking->Data->ReturnCode;
                                $PNR_CODE.= " - ".$booking->Data->ReturnCode;
                            }
                            $PNR_RETURN = $booking->Data->ReturnCode;
                        }
                        $Booking_Status = 1;
                    }
                    $_SESSION['booking']['DepartureFlight'] = $DepartureFlight;
                    $_SESSION['booking']['ReturnFlight'] = $ReturnFlight;
                    $Booking_Status = $Booking_Status==1?"OK":"FAIL";
                    $Booking_Airline = $DepartureFlight->AirlineCode;
                    $Trip_type = "OW";
                    if(!empty($ReturnFlight)){
                        $Booking_Airline .=" - ".$ReturnFlight->AirlineCode;
                        $Trip_type = "RT";
                    }
                    $db_transaction = db_transaction();
                    try {
                        $fbooking = new stdClass();
                        $fbooking->uid = !empty($user->uid)?$user->uid:"";
                        $fbooking->contact_Gender = $_data->ContactInfo['Gender'];
                        $fbooking->contact_FirstName = $_data->ContactInfo['FirstName'];
                        $fbooking->contact_LastName = $_data->ContactInfo['LastName'];
                        $fbooking->contact_Phone = $_data->ContactInfo['Phone'];
                        $fbooking->contact_Email = $_data->ContactInfo['Email'];
                        $fbooking->created = REQUEST_TIME;
                        $fbooking->changed = REQUEST_TIME;
                        $fbooking->booking_code = $booking_code;
                        $fbooking->pnr_code = $PNR_CODE;
                        $fbooking->airline = $Booking_Airline;
                        $fbooking->price = $total_price;
                        $fbooking->book_price = $total_price;
                        $fbooking->agent_code = "";
                        $fbooking->booking_name = "";
                        $fbooking->status = $Booking_Status;
                        $fbooking->adt = count($_Adt);
                        $fbooking->chd = count($_Chd);
                        $fbooking->inf = count($_Inf);
                        $fbooking->payment_method = $_payment_method;
                        $fbooking->ExpiryDt = !empty($Expired_Date)?$Expired_Date:0;
                        $fbooking->trip_type = $Trip_type;
                        $fbooking->version = 2;
                        $fbooking->booking = serialize($booking);
                        $fbooking->start_point      = !empty($DepartureFlight->StartPoint)?$DepartureFlight->StartPoint:"";
                        $fbooking->end_point        = !empty($DepartureFlight->EndPoint)?$DepartureFlight->EndPoint:"";
                        $fbooking->departure_date   = !empty($DepartureFlight->StartDate)?strtotime($DepartureFlight->StartDate):"";
                        $fbooking->return_date      = !empty($ReturnFlight->StartDate)?strtotime($ReturnFlight->StartDate):"";
                        $fbooking->DO               = 0;
                        $fbooking->additional = !empty($_SESSION['additional']->note)?$_SESSION['additional']->note:"";
                        $fbooking->bill_company = !empty($_SESSION['additional']->company_name)?$_SESSION['additional']->company_name:"";
                        $fbooking->bill_tax_number = !empty($_SESSION['additional']->tax_number)?$_SESSION['additional']->tax_number:"";
                        $fbooking->bill_address = !empty($_SESSION['additional']->company_address)?$_SESSION['additional']->company_address:"";
                        $fbooking->bill_mail = !empty($_SESSION['additional']->company_mail)?$_SESSION['additional']->company_mail:"";
                        $fbooking->bank = $_REQUEST['bank']?$_REQUEST['bank']:0;
                        if(!empty($_data->ListPassengers)){
                            foreach($_data->ListPassengers as $Passenger){
                                $passenger = new stdClass();
                                $passenger->Email = "";
                                $passenger->Phone = "";
                                $passenger->passenger_index = $Passenger['Index'];
                                $passenger->FirstName = $Passenger['FirstName'];
                                $passenger->LastName = $Passenger['LastName'];
                                $passenger->Type = $Passenger['Type'];
                                $passenger->Gender = $Passenger['Gender'];
                                $passenger->Birthday = !empty($Passenger['Birthday'])?strtotime(str_replace("/", "-", $Passenger['Birthday'])):0;
                                $passenger->BaggageDeparture = $Passenger['BaggageDeparture'];
                                $passenger->BaggageReturn = $Passenger['BaggageReturn'];
                                $passenger->uid = $user->uid;
                                $passenger->created = REQUEST_TIME;
                                $passenger->changed = REQUEST_TIME;
                                $fbooking->passengers[] = $passenger;
                            }
                        }
                        foreach ($_SESSION['booking'] as $Itinerary => $Booking) {
                            $FlightDetail = $Booking;
                            if(!empty($Booking->FlightSession)){
                                $ticket = new stdClass();
                                $ticket->status = $Booking->status;
//                                $ticket->TransactionCode = !empty($Booking['TransactionCode'])?$Booking['TransactionCode']:"";
                                $ticket->type = 0; // nội địa
                                $ticket->StartPoint = $Booking->StartPoint;
                                $ticket->EndPoint = $Booking->EndPoint;;
                                $ticket->FlightNumber = $Booking->FlightNumber;;
                                $ticket->AirlineCode = $Booking->AirlineCode;;
                                $ticket->StartDate = strtotime($Booking->StartDate);;
                                $ticket->EndDate = strtotime($Booking->EndDate);;
                                $ticket->Stops = $Booking->Stops;;
                                $ticket->Duration = $Booking->Duration;;
                                $ticket->FlightSession = $Booking->FlightSession;;
                                $ticket->pnr_code = $Booking->PNR;;
                                $ticket->Itinerary = $Itinerary;
                                $ticket->FareOptionSession = $FlightDetail->FareOptionSession;
                                $ticket->Class = $FlightDetail->Class;
                                $ticket->PriceAdult     = cassiopeia_qt_price_fix($FlightGroup->PriceAdult);
                                $ticket->PriceChild     = cassiopeia_qt_price_fix($FlightGroup->PriceChild);
                                $ticket->PriceInfant    = cassiopeia_qt_price_fix($FlightGroup->PriceInfant);
                                $ticket->FeeAdult       = cassiopeia_qt_price_fix($FlightGroup->FeeAdult);
                                $ticket->FeeChild       = cassiopeia_qt_price_fix($FlightGroup->FeeChild);
                                $ticket->FeeInfant      = cassiopeia_qt_price_fix($FlightGroup->FeeInfant);
                                $ticket->TaxAdult       = cassiopeia_qt_price_fix($FlightGroup->TaxAdult);
                                $ticket->TaxChild       = cassiopeia_qt_price_fix($FlightGroup->TaxChild);
                                $ticket->TaxInfant      = cassiopeia_qt_price_fix($FlightGroup->TaxInfant);
                                $ticket->TotalPrice     = cassiopeia_qt_price_fix($FlightGroup->TotalPrice);
                                $ticket->ServiceFee     = cassiopeia_qt_price_fix($FlightGroup->ServiceFee);
                                $ticket->IssueFee       = cassiopeia_qt_price_fix($FlightGroup->IssueFee);
                                $ticket->LastTkDate     = strtotime($FlightDetail->LastTkDate);
                                $ticket->SeatsAvailable = $FlightDetail->SeatsAvailable;
                                $ticket->leg = $Itinerary=="DepartureFlights"?0:1;
                                $ticket->service_fee = $FlightDetail->ServiceFee;
                                $ticket->agent_fee = $FlightDetail->AgentFee;
                                $ticket->infant_fee = $FlightDetail->AgentInfantFee;
                                $ticket->service_infant_fee = $FlightDetail->ServiceInfantFee;
                                $ticket->uid = $user->uid;
                                $ticket->created = REQUEST_TIME;
                                $ticket->changed = REQUEST_TIME;
                                $fbooking->tickets[] = $ticket;
                            }
                        }
                        $saved = cassiopeia_qt_ticket_booking_save($fbooking);
                        cassiopeia_meta_api_ReleaseDataSession($FlightData->DataSession);
                        $data['return_url'] = "/booking/view/" . $booking_code;
                        $data['status'] = "OK";
                    } catch (Exception $e) {
                        print_r($e);
                        $data['status'] = "FAIL";
                        $data['message'] = "Đã xảy ra lỗi, vui lòng liên hệ với người quản trị.";
                        $db_transaction->rollback();
                    }
                }

                break;
            case "booking_payment":
                $_payment_method = $_REQUEST['payment'];
                $_contact   = json_decode($_REQUEST['_contact']);
                $additional   = json_decode($_REQUEST['additional']);
                $_Adt       = json_decode($_REQUEST['_Adt']);
                $_Chd       = json_decode($_REQUEST['_Chd']);
                $_Inf       = json_decode($_REQUEST['_Inf']);
                $_SESSION['booking_payment']['payment_method'] = $_payment_method;
                $_SESSION['booking_payment']['contact'] = $_contact;
                $_SESSION['booking_payment']['adt'] = $_Adt;
                $_SESSION['booking_payment']['chd'] = $_Chd;
                $_SESSION['booking_payment']['inf'] = $_Inf;
                $_SESSION['contacts'] = $_contact;
                $_SESSION['additional'] = $additional;
                break;
            case "booking_submit_meta" :
                $type = isset($_REQUEST['type'])?$_REQUEST['type']:2;
                $message = "Phiên làm việc đã hết hạn!";
                $Flag = true;
                if(empty($_SESSION['booking'])){
                    $Flag = false;
                    $data['status'] = "FAIL";
                    $data['message'] = $message;
                }else{
                    $DataSession = $_SESSION['DataSession'];
                    $_agent = user_load($user->uid);
                    $_payment_method = $_REQUEST['payment'];
                    $RT = false; // khứ hồi cùng hãng
                    $_contact   = $_SESSION['booking_payment']['contact'];
                    $_Adt       = $_SESSION['booking_payment']['adt'];
                    $_Chd       = $_SESSION['booking_payment']['chd'];
                    $_Inf       = $_SESSION['booking_payment']['inf'];
                    $_array = explode(" ",$_contact->full_name);
                    $_contact_first_name = $_array[0];
                    $_contact_last_name = str_replace($_contact_first_name,"",$_contact->full_name);
                    $backup = new stdClass();
                    $PNR_CODE = "";
                    $Bookings = null;
                    $Booking_Airline = "";
                    $stt = 0;
                    $Booking_Status = 0;
                    $bookings = array();
                    $booking_code = "VE".REQUEST_TIME;
                    $_tickets = array();
                    $_sess = "";
                    $total_fee = 0;
                    $total_price=0;
                    $TotalNetPrice=0;
                    $TotalPartnerPrice=0;
                    $TotalPax=0;
                    $total_book_price=0;
                    $DepartureFlight = $_SESSION['booking']['DepartureFlights']['Flight'];
                    $ReturnFlight = !empty($_SESSION['booking']['ReturnFlights']['Flight'])?$_SESSION['booking']['ReturnFlights']['Flight']:null;
                    $DepartureFlightDetail = $DepartureFlight->FlightDetail;
                    $ReturnFlightDetail = !empty($ReturnFlight)?$ReturnFlight->FlightDetail:null;

                    $TotalPriceDepart = 0;
                    $TotalPriceReturn = 0;
                    $Expired_Date = 0;

                    $requiresVnIdentity = $DepartureFlight->AirlineCode === 'VN'
                        || (!empty($ReturnFlight) && $ReturnFlight->AirlineCode === 'VN');
                    $vnAdultIdentity = array();
                    if ($requiresVnIdentity) {
                        try {
                            foreach ($_Adt as $adultIndex => $adult) {
                                $vnAdultIdentity[$adultIndex] = cassiopeia_vn_adult_identity_fields(
                                    $adult,
                                    date('d/m/Y'),
                                    date('d/m/Y', strtotime($DepartureFlight->StartDate))
                                );
                            }
                        }
                        catch (InvalidArgumentException $exception) {
                            $data['status'] = 'FAIL';
                            $data['message'] = 'Hành khách người lớn ' . ($adultIndex + 1) . ': ' . $exception->getMessage();
                            break;
                        }
                    }

                    if(!empty($_SESSION['booking'])) {
                        $_data = new stdClass();
                        $_data->booking_code = $booking_code;
                        $_data->ContactInfo = array(
                            "Gender"            => 1,
                            "FirstName"         => vn_to_str($_contact_first_name),
                            "LastName"          => vn_to_str($_contact_last_name),
                            "Phone"             => $_contact->tel,
                            "Email"             => "",
                            "Address"           => "",
                        );

                        $Content = "XN ".$DepartureFlight->StartPoint.$DepartureFlight->EndPoint." ".date("d/m/Y", strtotime($DepartureFlight->StartDate));
                        $_data->DataSession = $DataSession;

                        $_data->DepartureFlightSession = $DepartureFlightDetail->FareOptionSession;
                        $_data->ReturnFlightSession = !empty($ReturnFlightDetail)?$ReturnFlightDetail->FareOptionSession:"";
                        $totalDepartureBaggageFee = 0;
                        $totalReturnBaggageFee = 0;
                        $guest_index = 1;
                        $guest_mail = "";
                        if (!empty($_Adt)) {
                            foreach ($_Adt as $adultIndex => $item) {
                                $baggageReturn = null;
                                $baggageDeparture = null;
                                if(!empty($item->baggages->ReturnFlights)&&!empty($item->baggages->ReturnFlights->id)){
                                    $baggageReturn = cassiopeia_get_baggage_by_id($item->baggages->ReturnFlights->id);
                                }
                                if(!empty($item->baggages->DepartureFlights)&&!empty(($item->baggages->DepartureFlights->id))){
                                    $baggageDeparture = cassiopeia_get_baggage_by_id($item->baggages->DepartureFlights->id);
                                }
                                $_array = explode(" ", $item->full_name);
                                $_first_name = $_array[0];
                                $_last_name = "";
                                for ($i = 1; $i <= count($_array); $i++) {
                                    if(!empty($_array[$i])){
                                        $_last_name .= " " . $_array[$i];
                                    }
                                }
                                $_last_name = trim($_last_name);
                                if(!empty($user->uid)){
                                    $guest_mail = $_contact->email;
                                }
                                $passenger = array(
                                    "Email" => "",
                                    "Phone" => $_contact->tel,
                                    "Index" => $stt,
                                    "FirstName" => vn_to_str($_first_name),
                                    "LastName" => vn_to_str($_last_name),
                                    "Type" => "ADT",
                                    "Gender" => $item->gender,
                                    "Birthday" => "16/05/1992",
                                    "BaggageDeparture"  => !empty($baggageDeparture)?$baggageDeparture->weight:0,
                                    "BaggageReturn"     => !empty($baggageReturn)?$baggageReturn->weight:0,
                                );
                                if ($requiresVnIdentity) {
                                    $passenger = array_merge($passenger, $vnAdultIdentity[$adultIndex]);
                                }
                                $_data->ListPassengers[] = $passenger;

                                $stt++;
                                $total_price += !empty($baggageDeparture)?$baggageDeparture->amount:0; // hành lý chiều đi
                                $totalDepartureBaggageFee += !empty($baggageDeparture)?$baggageDeparture->amount:0; // hành lý chiều đi
                                $total_price += cassiopeia_qt_price_fix($DepartureFlightDetail->PriceAdult) + cassiopeia_qt_price_fix($DepartureFlightDetail->FeeAdult) + cassiopeia_qt_price_fix($DepartureFlightDetail->TaxAdult) + cassiopeia_qt_price_fix($DepartureFlightDetail->AgentFee)+ cassiopeia_qt_price_fix($DepartureFlightDetail->ServiceFee);
                                $TotalPartnerPrice += cassiopeia_qt_price_fix($DepartureFlightDetail->PriceAdult) + cassiopeia_qt_price_fix($DepartureFlightDetail->FeeAdult) + cassiopeia_qt_price_fix($DepartureFlightDetail->TaxAdult)+ cassiopeia_qt_price_fix($DepartureFlightDetail->ServiceFee); //chỉ cộng phí dịch vụ
                                $TotalPartnerPrice += !empty($baggageDeparture)?$baggageDeparture->amount:0; // hành lý chiều đi
                                $TotalPax++;
                                if(!empty($ReturnFlightDetail)){
                                    $total_price += !empty($baggageReturn)?$baggageReturn->amount:0; // hành lý chiều về
                                    $totalReturnBaggageFee += !empty($baggageReturn)?$baggageReturn->amount:0; // hành lý chiều về
                                    $total_price += cassiopeia_qt_price_fix($ReturnFlightDetail->PriceAdult) + cassiopeia_qt_price_fix($ReturnFlightDetail->FeeAdult) + cassiopeia_qt_price_fix($ReturnFlightDetail->TaxAdult) + cassiopeia_qt_price_fix($ReturnFlightDetail->AgentFee)+ cassiopeia_qt_price_fix($ReturnFlightDetail->ServiceFee); // thuế phí
                                    $TotalPartnerPrice += cassiopeia_qt_price_fix($ReturnFlightDetail->PriceAdult) + cassiopeia_qt_price_fix($ReturnFlightDetail->FeeAdult) + cassiopeia_qt_price_fix($ReturnFlightDetail->TaxAdult)+ cassiopeia_qt_price_fix($ReturnFlightDetail->ServiceFee); // chỉ cộng phí dịch vụ
                                    $TotalPartnerPrice += !empty($baggageReturn)?$baggageReturn->amount:0; // hành lý chiều về
                                    $TotalNetPrice += cassiopeia_qt_price_fix($ReturnFlightDetail->PriceAdult) + cassiopeia_qt_price_fix($ReturnFlightDetail->FeeAdult) + cassiopeia_qt_price_fix($ReturnFlightDetail->TaxAdult); // thuế phí
                                    $TotalNetPrice += !empty($baggageReturn)?$baggageReturn->amount:0; // hành lý chiều về
                                    $TotalPax++;
                                }
                                $TotalNetPrice += !empty($baggageDeparture)?$baggageDeparture->amount:0; // hành lý chiều đi
                                $TotalNetPrice += cassiopeia_qt_price_fix($DepartureFlightDetail->PriceAdult) + cassiopeia_qt_price_fix($DepartureFlightDetail->FeeAdult) + cassiopeia_qt_price_fix($DepartureFlightDetail->TaxAdult); // thuế phí
                                $guest_index++;
                            }
                        }
                        if (!empty($_Chd)) {
                            foreach ($_Chd as $item) {
                                $baggageReturn = null;
                                $baggageDeparture = null;
                                if(!empty($item->baggages->ReturnFlights)&&!empty(($item->baggages->ReturnFlights->id))){
                                    $baggageReturn = cassiopeia_get_baggage_by_id($item->baggages->ReturnFlights->id);
                                }
                                if(!empty($item->baggages->DepartureFlights)&&!empty(($item->baggages->DepartureFlights->id))){
                                    $baggageDeparture = cassiopeia_get_baggage_by_id($item->baggages->DepartureFlights->id);
                                }
                                $_array = explode(" ", $item->full_name);
                                $_first_name = $_array[0];
                                $_last_name = "";
                                for ($i = 1; $i <= count($_array); $i++) {
                                    $_last_name .= " " . $_array[$i];
                                }
                                $_last_name = trim($_last_name);
                                $_data->ListPassengers[] = array(
                                    "Email" => "",
                                    "Phone" => $_contact->tel,
                                    "Index" => $stt,
                                    "FirstName" => vn_to_str($_first_name),
                                    "LastName" => vn_to_str($_last_name),
                                    "Type" => "CHD",
                                    "Gender" => $item->gender,
                                    "Birthday" => date("d/m/Y",strtotime(str_replace("/", "-", $item->birth_day))),
                                    "BaggageDeparture"  => !empty($baggageDeparture)?$baggageDeparture->weight:0,
                                    "BaggageReturn"     => !empty($baggageReturn)?$baggageReturn->weight:0,
                                );
                                $stt++;
                                $total_price += !empty($baggageDeparture)?$baggageDeparture->amount:0; // hành lý chiều đi
                                $totalDepartureBaggageFee += !empty($baggageDeparture)?$baggageDeparture->amount:0; // hành lý chiều đi
                                $total_price += cassiopeia_qt_price_fix($DepartureFlightDetail->PriceChild) + cassiopeia_qt_price_fix($DepartureFlightDetail->FeeChild) + cassiopeia_qt_price_fix($DepartureFlightDetail->TaxChild) + cassiopeia_qt_price_fix($DepartureFlightDetail->AgentFee)+ cassiopeia_qt_price_fix($DepartureFlightDetail->ServiceFee); // thuế phí
                                $TotalPartnerPrice += cassiopeia_qt_price_fix($DepartureFlightDetail->PriceChild) + cassiopeia_qt_price_fix($DepartureFlightDetail->FeeChild) + cassiopeia_qt_price_fix($DepartureFlightDetail->TaxChild) +  cassiopeia_qt_price_fix($DepartureFlightDetail->ServiceFee); // chỉ cộng phí dịch vụ
                                $TotalPartnerPrice += !empty($baggageDeparture)?$baggageDeparture->amount:0; // hành lý chiều đi
                                $TotalPax++;
                                //
                                if(!empty($ReturnFlightDetail)){
                                    $total_price += !empty($baggageReturn)?$baggageReturn->amount:0;; // hành lý chiều về
                                    $totalReturnBaggageFee += !empty($baggageReturn)?$baggageReturn->amount:0;; // hành lý chiều về
                                    $total_price += cassiopeia_qt_price_fix($ReturnFlightDetail->PriceChild) + cassiopeia_qt_price_fix($ReturnFlightDetail->FeeChild) + cassiopeia_qt_price_fix($ReturnFlightDetail->TaxChild) + cassiopeia_qt_price_fix($ReturnFlightDetail->AgentFee)+ cassiopeia_qt_price_fix($ReturnFlightDetail->ServiceFee); // thuế phí
                                    $TotalPartnerPrice += cassiopeia_qt_price_fix($ReturnFlightDetail->PriceChild) + cassiopeia_qt_price_fix($ReturnFlightDetail->FeeChild) + cassiopeia_qt_price_fix($ReturnFlightDetail->TaxChild) +  cassiopeia_qt_price_fix($ReturnFlightDetail->ServiceFee); // chỉ cộng phí dịch vụ
                                    $TotalPartnerPrice += !empty($baggageReturn)?$baggageReturn->amount:0; // hành lý chiều về
                                    $TotalNetPrice += !empty($baggageReturn)?$baggageReturn->amount:0; // hành lý chiều về
                                    $TotalNetPrice += cassiopeia_qt_price_fix($ReturnFlightDetail->PriceChild) + cassiopeia_qt_price_fix($ReturnFlightDetail->FeeChild) + cassiopeia_qt_price_fix($ReturnFlightDetail->TaxChild); // thuế phí
                                    $TotalPax++;
                                }

                                $TotalNetPrice += !empty($baggageDeparture)?$baggageDeparture->amount:0; // hành lý chiều đi
                                $TotalNetPrice += cassiopeia_qt_price_fix($DepartureFlightDetail->PriceChild) + cassiopeia_qt_price_fix($DepartureFlightDetail->FeeChild) + cassiopeia_qt_price_fix($DepartureFlightDetail->TaxChild); // thuế phí
                            }
                        }
                        if (!empty($_Inf)) {
                            foreach ($_Inf as $item) {
                                $_array = explode(" ", $item->full_name);
                                $_first_name = $_array[0];
                                $_last_name = "";
                                for ($i = 1; $i <= count($_array); $i++) {
                                    $_last_name .= " " . $_array[$i];
                                }
                                $_last_name = trim($_last_name);
                                $_data->ListPassengers[] = array(
                                    "Index" => $stt,
                                    "FirstName" => vn_to_str($_first_name),
                                    "LastName" => vn_to_str($_last_name),
                                    "Type" => "INF",
                                    "Gender" => $item->gender,
                                    "Birthday" => date("d/m/Y",strtotime(str_replace("/", "-", $item->birth_day))),
                                    "BaggageDeparture" => "",
                                    "BaggageReturn" => "",
                                );
                                $stt++;
                                $total_price += cassiopeia_qt_price_fix($DepartureFlightDetail->PriceInfant) + cassiopeia_qt_price_fix($DepartureFlightDetail->FeeInfant) + cassiopeia_qt_price_fix($DepartureFlightDetail->TaxInfant) + cassiopeia_qt_price_fix($DepartureFlightDetail->AgentInfantFee)+ cassiopeia_qt_price_fix($DepartureFlightDetail->ServiceInfantFee); // thuế phí
                                $TotalPartnerPrice += cassiopeia_qt_price_fix($DepartureFlightDetail->PriceInfant) + cassiopeia_qt_price_fix($DepartureFlightDetail->FeeInfant) + cassiopeia_qt_price_fix($DepartureFlightDetail->TaxInfant) + cassiopeia_qt_price_fix($DepartureFlightDetail->ServiceInfantFee); // thuế phí
                                $TotalNetPrice += cassiopeia_qt_price_fix($DepartureFlightDetail->PriceInfant) + cassiopeia_qt_price_fix($DepartureFlightDetail->FeeInfant) + cassiopeia_qt_price_fix($DepartureFlightDetail->TaxInfant); // thuế phí
                                if(!empty($ReturnFlightDetail)){
                                    $total_price += cassiopeia_qt_price_fix($ReturnFlightDetail->PriceInfant) + cassiopeia_qt_price_fix($ReturnFlightDetail->FeeInfant) + cassiopeia_qt_price_fix($ReturnFlightDetail->TaxInfant) + cassiopeia_qt_price_fix($ReturnFlightDetail->AgentInfantFee) + cassiopeia_qt_price_fix($ReturnFlightDetail->ServiceInfantFee); // thuế phí
                                    $TotalPartnerPrice += cassiopeia_qt_price_fix($ReturnFlightDetail->PriceInfant) + cassiopeia_qt_price_fix($ReturnFlightDetail->FeeInfant) + cassiopeia_qt_price_fix($ReturnFlightDetail->TaxInfant)  + cassiopeia_qt_price_fix($ReturnFlightDetail->ServiceInfantFee); // thuế phí
                                    $TotalNetPrice += cassiopeia_qt_price_fix($ReturnFlightDetail->PriceInfant) + cassiopeia_qt_price_fix($ReturnFlightDetail->FeeInfant) + cassiopeia_qt_price_fix($ReturnFlightDetail->TaxInfant); // thuế phí
                                }
                            }
                        }
//                        print_r($TotalNetPrice);
//                        print_r($TotalPartnerPrice);
//                        print_r($_agent);
//                        die;
                        $Booking_Airline = $DepartureFlight->AirlineCode;
                        if(!empty($ReturnFlight)){
                            $ReturnFlight->Baggage = $totalReturnBaggageFee;
                            if($Booking_Airline!=$ReturnFlight->AirlineCode){
                                $Booking_Airline .=" - ".$ReturnFlight->AirlineCode;
                            }
                        }
                        $DepartureFlight->Baggage = $totalDepartureBaggageFee;
                        $Expired_Date = $DepartureFlightsExpired_Date = cassiopeia_get_flight_time_limit($DepartureFlight->AirlineCode,$DepartureFlight->StartDate,$DepartureFlightDetail->Class,"","","");
                        $ReturnFlightsExpired_Date = cassiopeia_get_flight_time_limit($ReturnFlight->AirlineCode,$ReturnFlight->StartDate,$ReturnFlightDetail->Class,"","","");
                        if($DepartureFlightsExpired_Date>0 && $ReturnFlightsExpired_Date>0){
                            $Expired_Date = $DepartureFlightsExpired_Date<$ReturnFlightsExpired_Date?$DepartureFlightsExpired_Date:$ReturnFlightsExpired_Date;

                        }
						$PNR_CODE ='';
//                        print_r($_payment_method);
//                        die;
                        if($_payment_method==3){
                            // todo
                            $issue_log = new stdClass();
                            $issue_log->uid = $user->uid;
                            $issue_log->created = REQUEST_TIME;
                            $issue_log->bid = "";
                            $issue_log->booking_code = $booking_code;
                            $issue_log->pnr_code = "";
                            $issue_log->issue_type = 2;
                            $issue_log->status = 10;
                            $issue_log->message = "Thực hiện xuất ngay";
                            drupal_write_record("tbl_issue",$issue_log);
                            if(user_has_role(3)) { // admin
                                $booking = cassiopeia_meta_api_issue_reservation($_data); // hàm đặt vé xuất ngay
                                $DepartureFlight->PNR = $booking->Code==0?$booking->Data->DepartureCode:"";
                                $DepartureFlight->status  = $booking->Code==0?"TICKETED":"PENDING";
                                $PNR_CODE = $booking->Data->DepartureCode;
                                if(!empty($ReturnFlight)){
                                    $ReturnFlight->status = $DepartureFlight->status;
                                    $ReturnFlight->PNR = $booking->Data->ReturnCode;
                                }
                                if(!empty($ReturnFlight) && ($PNR_CODE != $booking->Data->ReturnCode)){
                                    $PNR_CODE.=" - ".$booking->Data->ReturnCode;
                                }
                                $issue_log = new stdClass();
                                $issue_log->uid = $user->uid;
                                $issue_log->created = REQUEST_TIME;
                                $issue_log->booking_image = serialize($booking);
                                $issue_log->bid = "";
                                $issue_log->booking_code = $booking_code;
                                $issue_log->pnr_code = $PNR_CODE;
                                $issue_log->issue_type = 2;
                                $issue_log->status = !empty($booking)?$booking->Code:"error";
                                $issue_log->message = "Xuất ngay";
                                drupal_write_record("tbl_issue",$issue_log);
                            }else{
                                if($_agent->field_account_balance['und'][0]['value']<$TotalPartnerPrice){ // Không đủ tiền thanh toán
                                    $Flag = false;
                                    $message = "Số dư không đủ, vui lòng nạp thêm tiền và thử lại sau";
                                }else{
                                    try{
                                        $booking = cassiopeia_meta_api_issue_reservation($_data); // hàm đặt vé xuất ngay
                                        $DepartureFlight->PNR = $booking->Code==0?$booking->Data->DepartureCode:"";
                                        $DepartureFlight->status  = $booking->Code==0?"TICKETED":"PENDING";
                                        $PNR_CODE = $booking->Data->DepartureCode;
                                        if(!empty($ReturnFlight)){
                                            $ReturnFlight->status = $DepartureFlight->status;
                                            $ReturnFlight->PNR = $booking->Data->ReturnCode;
                                        }
                                        if(!empty($ReturnFlight) && ($PNR_CODE != $booking->Data->ReturnCode)){
                                            $PNR_CODE.=" - ".$booking->Data->ReturnCode;
                                        }
//                                        print_r(13);
//                                        die;
                                        $issue_log = new stdClass();
                                        $issue_log->uid = $user->uid;
                                        $issue_log->created = REQUEST_TIME;
                                        $issue_log->booking_image = serialize($booking);
                                        $issue_log->bid = "";
                                        $issue_log->booking_code = $booking_code;
                                        $issue_log->pnr_code = $PNR_CODE;
                                        $issue_log->issue_type = 2;
                                        $issue_log->status = !empty($booking)?$booking->Code:"error";
                                        $issue_log->message = "Xuất ngay";
                                        drupal_write_record("tbl_issue",$issue_log);

                                        $_agent = user_load($user->uid);


                                        if($booking->Code==0){
                                            $insertData = new stdClass();
                                            $insertData->partner_price = $TotalPartnerPrice;
                                            $insertData->price = $TotalNetPrice;
                                            $insertData->agent = $user->uid;
                                            $insertData->tran_kind = 4;
                                            $insertData->quantity = $TotalPax;;
                                            $insertData->PNR = $PNR_CODE;
                                            $insertData->date = strtotime(date("Y-m-d h:i:sa"));
                                            $insertData->airline = $Booking_Airline;
                                            $insertData->content = $Content;
                                            $insertData->booking = $booking;
                                            $insertData->booking_code = $booking_code;
                                            cassiopeia_create_issue_report($insertData);
                                        }
                                    }catch (Exception $e){

                                    }
                                }
                            }
                        }else{ // đặt vé thông thường
                            $booking = cassiopeia_meta_api_booking($_data);
                            if (!empty($booking)) {
                                $DepartureFlight->PNR = $booking->Code==0?$booking->Data->DepartureCode:"";
                                $ReturnFlight->PNR = $booking->Data->ReturnCode;
                                $DepartureFlight->status = $ReturnFlight->status = $booking->Code==0?"OK":"FAIL";
                                $DepartureFlight->TransactionCode = $ReturnFlight->TransactionCode = $booking->Data->TransactionCode;
                                $PNR_CODE = $booking->Data->DepartureCode;
                                if($booking->Code==0){
                                    if(!empty($user->uid)){
//                                        print_r(123);
                                        $sendMailData = array();
                                        $sendMailData['PNRCode'] = $PNR_CODE;
                                        $sendMailData['AirlineCode'] = $DepartureFlight->AirlineCode;
                                        $sendMailData['Language'] = "VN";
                                        $sendMailData['Emails'] = $_contact->email;
                                        $sendmail = cassiopeia_qt_meta_SendMail($sendMailData);
                                    }
                                }
                                if(!empty($ReturnFlightDetail) && ($PNR_CODE != $booking->Data->ReturnCode)&&$ReturnFlight->AirlineCode!=$DepartureFlight->AirlineCode){
                                    if($PNR_CODE!=$booking->Data->ReturnCode){
                                        if(!empty($user->uid)){
                                            $sendMailData = new stdClass();
                                            $sendMailData->PNRCode = $booking->Data->ReturnCode;
                                            $sendMailData->AirlineCode = $ReturnFlight->AirlineCode;
                                            $sendMailData->Language = "VN";
                                            $sendMailData->Emails = $_contact->email;
                                            cassiopeia_qt_meta_SendMail($sendMailData);
                                        }
                                        $PNR_CODE.=" - ".$booking->Data->ReturnCode;
                                    }
                                }
                            }
                        }
                        $Bookings[] = $booking;
                        $Trip_type = !empty($ReturnFlight)?"RT":"OW";
                    }
                    if($Trip_type==="OW"){
                        $_SESSION['booking']['ReturnFlights'] = null;
                        unset($_SESSION['booking']['ReturnFlights']);
                    }
                    $_SESSION['booking']['DepartureFlights']['Flight'] = $DepartureFlight;
                    $_SESSION['booking']['ReturnFlights']['Flight'] = $ReturnFlight;
                    if($Flag && !empty($_SESSION['booking'])){
                        $db_transaction = db_transaction();

                        $Booking_Status = $DepartureFlight->status;
                        if(!empty($ReturnFlight->status)){
                            if($DepartureFlight->status != $ReturnFlight->status){
                                if($DepartureFlight->status!="OK" || $ReturnFlight->status!="OK"){
                                    $Booking_Status = "FAIL";
                                }
                            }
                        }
                        $fbooking = new stdClass();
                        $fbooking->uid = !empty($user->uid)?$user->uid:"";
                        $fbooking->contact_Gender = $_data->ContactInfo['Gender'];
                        $fbooking->contact_FirstName = $_data->ContactInfo['FirstName'];
                        $fbooking->contact_LastName = $_data->ContactInfo['LastName'];
                        $fbooking->contact_Phone = $_data->ContactInfo['Phone'];
                        $fbooking->contact_Email = $_contact->email;
                        $fbooking->created = REQUEST_TIME;
                        $fbooking->changed = REQUEST_TIME;
                        $fbooking->booking_code = $booking_code;
                        $fbooking->pnr_code = $PNR_CODE;
                        $fbooking->airline = $Booking_Airline;
                        $fbooking->price = $total_price;
                        $fbooking->price = $TotalNetPrice;
                        $fbooking->book_price = $total_price;
                        $fbooking->agent_code = "";
                        $fbooking->booking_name = "";
                        $fbooking->status = $Booking_Status;
                        $fbooking->adt = count($_Adt);
                        $fbooking->chd = count($_Chd);
                        $fbooking->inf = count($_Inf);
                        $fbooking->payment_method = $_payment_method;
                        $fbooking->ExpiryDt = !empty($Expired_Date)?$Expired_Date:0;
                        $fbooking->trip_type = $Trip_type;
                        $fbooking->version = 2;
                        $fbooking->booking = serialize($Bookings);
                        $fbooking->data = serialize($_data);
                        $fbooking->start_point      = !empty($DepartureFlight->StartPoint)?$DepartureFlight->StartPoint:"";
                        $fbooking->end_point        = !empty($DepartureFlight->EndPoint)?$DepartureFlight->EndPoint:"";
                        $fbooking->departure_date   = !empty($DepartureFlight->StartDate)?strtotime($DepartureFlight->StartDate):"";
                        $fbooking->return_date      = !empty($ReturnFlight->StartDate)?strtotime($ReturnFlight->StartDate):"";
                        $fbooking->DO               = 1;
                        $fbooking->additional = !empty($_SESSION['additional']->note)?$_SESSION['additional']->note:"";
                        $fbooking->bill_company = !empty($_SESSION['additional']->company_name)?$_SESSION['additional']->company_name:"";
                        $fbooking->bill_tax_number = !empty($_SESSION['additional']->tax_number)?$_SESSION['additional']->tax_number:"";
                        $fbooking->bill_address = !empty($_SESSION['additional']->company_address)?$_SESSION['additional']->company_address:"";
                        $fbooking->bill_mail = !empty($_SESSION['additional']->company_mail)?$_SESSION['additional']->company_mail:"";
                        $fbooking->bank = $_REQUEST['bank']?$_REQUEST['bank']:0;
                        if(!empty($_data->ListPassengers)){
                            foreach($_data->ListPassengers as $Passenger){
                                $passenger = new stdClass();
                                $passenger->Email = "";
                                $passenger->Phone = "";
                                $passenger->passenger_index = $Passenger['Index'];
                                $passenger->FirstName = $Passenger['FirstName'];
                                $passenger->LastName = $Passenger['LastName'];
                                $passenger->Type = $Passenger['Type'];
                                $passenger->Gender = $Passenger['Gender'];
                                $passenger->Birthday = !empty($Passenger['Birthday'])?strtotime(str_replace("/", "-", $Passenger['Birthday'])):0;
                                $passenger->BaggageDeparture = $Passenger['BaggageDeparture'];
                                $passenger->BaggageReturn = $Passenger['BaggageReturn'];
                                $passenger->uid = $user->uid;
                                $passenger->created = REQUEST_TIME;
                                $passenger->changed = REQUEST_TIME;
                                $fbooking->passengers[] = $passenger;
                            }
                        }
                        foreach ($_SESSION['booking'] as $Itinerary => $Booking) {
                            $FlightDetail = $Booking['Flight']->FlightDetail;
                            if(!empty($Booking['Flight']->FlightSession)){
                                $ticket = new stdClass();
                                $ticket->status = $Booking['Flight']->status;
                                $ticket->TransactionCode = !empty($Booking['TransactionCode'])?$Booking['TransactionCode']:"";
                                $ticket->type = 0; // nội địa
                                $ticket->StartPoint = $Booking['Flight']->StartPoint;
                                $ticket->EndPoint = $Booking['Flight']->EndPoint;;
                                $ticket->FlightNumber = $Booking['Flight']->FlightNumber;;
                                $ticket->AirlineCode = $Booking['Flight']->AirlineCode;;
                                $ticket->StartDate = strtotime($Booking['Flight']->StartDate);;
                                $ticket->EndDate = strtotime($Booking['Flight']->EndDate);;
                                $ticket->Stops = $Booking['Flight']->Stops;;
                                $ticket->Duration = $Booking['Flight']->Duration;;
                                $ticket->FlightSession = $Booking['Flight']->FlightSession;;
                                $ticket->pnr_code = $Booking['Flight']->PNR;;
                                $ticket->Itinerary = $Itinerary;
                                $ticket->FareOptionSession = $FlightDetail->FareOptionSession;
                                $ticket->Class = $FlightDetail->Class;
                                $ticket->PriceAdult     = cassiopeia_qt_price_fix($FlightDetail->PriceAdult);
                                $ticket->PriceChild     = cassiopeia_qt_price_fix($FlightDetail->PriceChild);
                                $ticket->PriceInfant    = cassiopeia_qt_price_fix($FlightDetail->PriceInfant);
                                $ticket->FeeAdult       = cassiopeia_qt_price_fix($FlightDetail->FeeAdult);
                                $ticket->FeeChild       = cassiopeia_qt_price_fix($FlightDetail->FeeChild);
                                $ticket->FeeInfant      = cassiopeia_qt_price_fix($FlightDetail->FeeInfant);
                                $ticket->TaxAdult       = cassiopeia_qt_price_fix($FlightDetail->TaxAdult);
                                $ticket->TaxChild       = cassiopeia_qt_price_fix($FlightDetail->TaxChild);
                                $ticket->TaxInfant      = cassiopeia_qt_price_fix($FlightDetail->TaxInfant);
                                $ticket->TotalPrice     = cassiopeia_qt_price_fix($FlightDetail->TotalPrice);
                                $ticket->ServiceFee     = cassiopeia_qt_price_fix($FlightDetail->ServiceFee);
                                $ticket->IssueFee       = cassiopeia_qt_price_fix($FlightDetail->IssueFee);
                                $ticket->LastTkDate     = strtotime($FlightDetail->LastTkDate);
                                $ticket->SeatsAvailable = $FlightDetail->SeatsAvailable;
                                $ticket->leg = $Itinerary=="DepartureFlights"?0:1;
                                $ticket->service_fee = $FlightDetail->ServiceFee;
                                $ticket->agent_fee = $FlightDetail->AgentFee;
                                $ticket->infant_fee = $FlightDetail->AgentInfantFee;
                                $ticket->service_infant_fee = $FlightDetail->ServiceInfantFee;
                                $ticket->uid = $user->uid;
                                $ticket->created = REQUEST_TIME;
                                $ticket->changed = REQUEST_TIME;
                                $fbooking->tickets[] = $ticket;
                            }
                        }


                        try {
                            $_SESSION['booking_issue'] = $booking;
                            cassiopeia_meta_api_ReleaseDataSession($DataSession); // giải phóng phiên tìm kiếm

//                            if ($_payment_method == 3) {
//                                $_agent = user_load(55);
//                                $balance = !empty($_agent->field_account_balance['und'][0]['value']) ? $_agent->field_account_balance['und'][0]['value'] : 0;
//                                $balance -= $total_price;
//                                $_agent->field_account_balance['und'][0]['value'] = $balance;
//                                user_save($_agent);
//                                $data['return_url'] = "booking/vnpay/init?order_id=" . $booking_code . "&amount=" . $total_price . "&order_desc='Thanh toán booking ".ucfirst(SITE_DOMAIN)."'";
//                                $data['status'] = "OK";
//                            } else {
//                                $data['return_url'] = "/booking/view/" . $booking_code;
//                                $data['status'] = "OK";
//                            }
//                            print_r($fbooking);


                            if($_payment_method==6){
                                $result = cassiopeia_ticket_alepay_request_payment($fbooking);
                                $fbooking->transactionCode = $result->transactionCode;
                                $fbooking->errorCode = $result->errorCode;
                                if($result->code=="000"){
                                    $data['return_url'] = $result->checkoutUrl;
                                }else{
                                    $data['return_url'] = "/booking/view/" . $booking_code;
                                    $data['status'] = "OK";
                                }

                                $data['status'] = "OK";
                            }else{
								//cassiopeia_send_booking_mail($booking_code,$_data->ContactInfo['Email'],$fbooking->DO);
								cassiopeia_send_booking_mail($booking_code,variable_get("site_mail"),$fbooking->DO);
                                $data['return_url'] = "/booking/view/" . $booking_code;
                                $data['status'] = "OK";
                            }

                            $saved = cassiopeia_qt_ticket_booking_save($fbooking);
                        } catch (Exception $e) {
                            print_r($e);
                            $data['status'] = "FAIL";
                            $data['message'] = "Đã xảy ra lỗi, vui lòng liên hệ với người quản trị.";
                            $db_transaction->rollback();
                        }

                    }else{
                        $data['status'] = "FAIL";
                        $data['message'] = $message;
                    }
                }
                break;
            case "booking_submit" :
                $type = isset($_REQUEST['type'])?$_REQUEST['type']:2;
                $message = "Phiên làm việc đã hết hạn!";
                $Flag = true;
                if(empty($_SESSION['booking'])){
                    $Flag = false;
                    $data['status'] = "FAIL";
                    $data['message'] = $message;
                }else{
                    $FlightData = $_SESSION['FlightData'];
                    $_agent = user_load($user->uid);
                    $_payment_method = $_REQUEST['payment'];
                    $RT = false; // khứ hồi cùng hãng
                    $_contact   = json_decode($_REQUEST['_contact']);
                    $_Adt       = json_decode($_REQUEST['_Adt']);
                    $_Chd       = json_decode($_REQUEST['_Chd']);
                    $_Inf       = json_decode($_REQUEST['_Inf']);
                    $_array = explode(" ",$_contact->full_name);
                    $_contact_first_name = $_array[0];
                    $_contact_last_name = str_replace($_contact_first_name,"",$_contact->full_name);
                    $backup = new stdClass();
                    $PNR_CODE = "";
                    $Bookings = null;
                    $Booking_Airline = "";
                    $stt = 0;
                    $Booking_Status = 0;
                    $bookings = array();
                    $booking_code = "VE".REQUEST_TIME;
                    $_tickets = array();
                    $_sess = "";
                    $total_fee = 0;
                    $total_price=0;
                    $TotalNetPrice=0;
                    $total_book_price=0;
                    $DepartureFlightDetail = cassiopeia_meta_FareOptionSession_load($_SESSION['booking']['DepartureFlights']['Flight'],$_SESSION['booking']['DepartureFlights']['FareOptionSession']);
                    $ReturnFlightDetail = !empty($_SESSION['booking']['ReturnFlights'])?cassiopeia_meta_FareOptionSession_load($_SESSION['booking']['ReturnFlights']['Flight'],$_SESSION['booking']['ReturnFlights']['FareOptionSession']):null;
                    $Point_1 = cassiopeia_get_airport($_SESSION['booking']['DepartureFlights']['Flight']->StartPoint);
                    $Point_2 = !empty($_SESSION['booking']['ReturnFlights']['Flight'])?cassiopeia_get_airport($_SESSION['booking']['ReturnFlights']['Flight']->StartPoint):null;
                    if($Point_1->country_code=="VN"){
                        $Point_1_code = "DO";
                    }else{
                        $Point_1_code = $Point_1->region_code;
                    }
                    if(!empty($Point_2)&&$Point_2->country_code=="VN"){
                        $Point_2_code = "DO";
                    }else{
                        $Point_2_code = $Point_2->region_code;
                    }
                    $Point_1_value = cassiopeia_get_fee_by_airline_and_region($_SESSION['booking']['DepartureFlights']['Flight']->AirlineCode,$Point_1_code);
                    $Point_1_fee = !empty($Point_1_value['value'])?$Point_1_value['value']:0;
                    $Point_2_value = cassiopeia_get_fee_by_airline_and_region($_SESSION['booking']['ReturnFlights']['Flight']->AirlineCode,$Point_2_code);
                    $Point_2_fee = !empty($Point_2_value['value'])?$Point_2_value['value']:0;

                    $TotalPriceDepart = 0;
                    $TotalPriceReturn = 0;
                    $Expired_Date = 0;
                    $TotalPrice = ($_SESSION['TotalPrice']);
                    $TotalAgentRate = ($_SESSION['TotalAgentRate']);
                    $TotalAgentPrice = $TotalPrice-$TotalAgentRate;
                    $CustomFee = $_SESSION['customFee'];
                    if(!empty($_SESSION['booking'])) {
                        if (!empty($_SESSION['booking']['ReturnFlights']) && ($_SESSION['booking']['ReturnFlights']['Flight']->AirlineCode == $_SESSION['booking']['DepartureFlights']['Flight']->AirlineCode)) {
                            $RT = true;
                        }
                        if ($RT) {
                            $_data = new stdClass();
                            $_data->booking_code = $booking_code;
                            $_data->ContactInfo = array(
                                "Gender"            => 1,
                                "FirstName"         => vn_to_str($_contact_first_name),
                                "LastName"          => vn_to_str($_contact_last_name),
                                "Phone"             => $_contact->tel,
                                "Email"             => $_contact->email,
                                "Address"           => "",
                            );
                            $Content = "XN ".$_SESSION['booking']['DepartureFlights']['Flight']->StartPoint.$_SESSION['booking']['DepartureFlights']['Flight']->EndPoint." ".date("d/m/Y", strtotime($_SESSION['booking']['DepartureFlights']['Flight']->StartDate));
                            $_data->DataSession = $FlightData->Data->DataSession;
                            $_data->DepartureFlightSession = $_SESSION['booking']['DepartureFlights']['FareOptionSession'];
                            $_data->ReturnFlightSession = $_SESSION['booking']['ReturnFlights']['FareOptionSession'];
                            $totalDepartureBaggageFee = 0;
                            $totalReturnBaggageFee = 0;

                            if (!empty($_Adt)) {
                                foreach ($_Adt as $item) {
                                    $baggageReturn = null;
                                    $baggageDeparture = null;
                                    if(!empty($item->baggages->ReturnFlights)&&!empty($item->baggages->ReturnFlights->id)){
                                        $baggageReturn = cassiopeia_get_baggage_by_id($item->baggages->ReturnFlights->id);
                                    }
                                    if(!empty($item->baggages->DepartureFlights)&&!empty(($item->baggages->DepartureFlights->id))){
                                        $baggageDeparture = cassiopeia_get_baggage_by_id($item->baggages->DepartureFlights->id);
                                    }
                                    $_array = explode(" ", $item->full_name);
                                    $_first_name = $_array[0];
                                    $_last_name = "";
                                    for ($i = 1; $i <= count($_array); $i++) {
                                        $_last_name .= " " . $_array[$i];
                                    }
                                    $_last_name = trim($_last_name);
//                                    _print_r($_data);
//                                    die;
                                    $_data->ListPassengers[] = array(
                                        "Index" => $stt,
                                        "FirstName" => vn_to_str($_first_name),
                                        "LastName" => vn_to_str($_last_name),
                                        "Type" => "ADT",
                                        "Gender" => $item->gender,
                                        "Birthday" => "01/01/1995",
                                        "BaggageDeparture" => !empty(cassiopeia_get_baggage_by_id($item->baggages->DepartureFlights))?cassiopeia_get_baggage_by_id($item->baggages->DepartureFlights->id)->weight:"",
                                        "BaggageReturn" => !empty(cassiopeia_get_baggage_by_id($item->baggages->ReturnFlights))?cassiopeia_get_baggage_by_id($item->baggages->ReturnFlights->id)->weight:"",
                                    );

                                    $stt++;
                                    $total_price += !empty($baggageDeparture)?$baggageDeparture->amount:0; // hành lý chiều đi
                                    $totalDepartureBaggageFee += !empty($baggageDeparture)?$baggageDeparture->amount:0; // hành lý chiều đi
                                    $total_price += $CustomFee; // Thu phí chiều đi
                                    $total_price += $_SESSION['silver_rank_fee']; // Thu phí chiều đi
                                    $total_price += $DepartureFlightDetail->PriceAdult + $DepartureFlightDetail->FeeAdult + $DepartureFlightDetail->TaxAdult; // thuế phí
                                    //
                                    $total_price += !empty($baggageReturn)?$baggageReturn->amount:0; // hành lý chiều về
                                    $totalReturnBaggageFee += !empty($baggageReturn)?$baggageReturn->amount:0; // hành lý chiều về
                                    $total_price += $CustomFee; // Thu phí chiều về
                                    $total_price += $_SESSION['silver_rank_fee']; // Thu phí chiều về
                                    $total_price += $ReturnFlightDetail->PriceAdult + $ReturnFlightDetail->FeeAdult + $ReturnFlightDetail->TaxAdult; // thuế phí


                                    $TotalNetPrice += !empty($baggageDeparture)?$baggageDeparture->amount:0; // hành lý chiều đi
                                    $TotalNetPrice += !empty($baggageReturn)?$baggageReturn->amount:0; // hành lý chiều về
                                    $TotalNetPrice += $DepartureFlightDetail->PriceAdult + $DepartureFlightDetail->FeeAdult + $DepartureFlightDetail->TaxAdult; // thuế phí
                                    $TotalNetPrice += $ReturnFlightDetail->PriceAdult + $ReturnFlightDetail->FeeAdult + $ReturnFlightDetail->TaxAdult; // thuế phí
                                }
                            }
//                            _print_r($_data);
//                            die;
                            if (!empty($_Chd)) {
                                foreach ($_Chd as $item) {
                                    $baggageReturn = null;
                                    $baggageDeparture = null;
                                    if(!empty($item->baggages->ReturnFlights)&&!empty(($item->baggages->ReturnFlights->id))){
                                        $baggageReturn = cassiopeia_get_baggage_by_id($item->baggages->ReturnFlights->id);
                                    }
                                    if(!empty($item->baggages->DepartureFlights)&&!empty(($item->baggages->DepartureFlights->id))){
                                        $baggageDeparture = cassiopeia_get_baggage_by_id($item->baggages->DepartureFlights->id);
                                    }
                                    $_array = explode(" ", $item->full_name);
                                    $_first_name = $_array[0];
                                    $_last_name = "";
                                    for ($i = 1; $i <= count($_array); $i++) {
                                        $_last_name .= " " . $_array[$i];
                                    }
                                    $_last_name = trim($_last_name);
                                    $_data->ListPassengers[] = array(
                                        "Index" => $stt,
                                        "FirstName" => vn_to_str($_first_name),
                                        "LastName" => vn_to_str($_last_name),
                                        "Type" => "CHD",
                                        "Gender" => $item->gender,
                                        "Birthday" => date("Y-m-d",strtotime(str_replace("/", "-", $item->birth_day)))."T".date("H:i:s",strtotime(str_replace("/", "-", $item->birth_day))),
                                        "BaggageDeparture" => !empty(cassiopeia_get_baggage_by_id($item->baggages->DepartureFlights))?cassiopeia_get_baggage_by_id($item->baggages->DepartureFlights->id)->weight:"",
                                        "BaggageReturn" => !empty(cassiopeia_get_baggage_by_id($item->baggages->ReturnFlights))?cassiopeia_get_baggage_by_id($item->baggages->ReturnFlights->id)->weight:"",
                                    );
                                    $stt++;
                                    $total_price += !empty($baggageDeparture)?$baggageDeparture->amount:0; // hành lý chiều đi
                                    $totalDepartureBaggageFee += !empty($baggageDeparture)?$baggageDeparture->amount:0; // hành lý chiều đi
                                    $total_price += $CustomFee; // Thu phí chiều đi
                                    $total_price += $_SESSION['silver_rank_fee']; // Thu phí chiều đi
                                    $total_price += $DepartureFlightDetail->PriceChild + $DepartureFlightDetail->FeeChild + $DepartureFlightDetail->TaxChild; // thuế phí
                                    //
                                    $total_price += !empty($baggageReturn)?$baggageReturn->amount:0;; // hành lý chiều về
                                    $totalReturnBaggageFee += !empty($baggageReturn)?$baggageReturn->amount:0;; // hành lý chiều về
                                    $total_price += $CustomFee; // Thu phí chiều về
                                    $total_price += $_SESSION['silver_rank_fee']; // Thu phí chiều về
                                    $total_price += $ReturnFlightDetail->PriceChild + $ReturnFlightDetail->FeeChild + $ReturnFlightDetail->TaxChild; // thuế phí

                                    $TotalNetPrice += !empty($baggageDeparture)?$baggageDeparture->amount:0; // hành lý chiều đi
                                    $TotalNetPrice += !empty($baggageReturn)?$baggageReturn->amount:0; // hành lý chiều về
                                    $TotalNetPrice += $DepartureFlightDetail->PriceChild + $DepartureFlightDetail->FeeChild + $DepartureFlightDetail->TaxChild; // thuế phí
                                    $TotalNetPrice += $ReturnFlightDetail->PriceChild + $ReturnFlightDetail->FeeChild + $ReturnFlightDetail->TaxChild; // thuế phí
                                }
                            }
                            if (!empty($_Inf)) {
                                foreach ($_Inf as $item) {
                                    $_array = explode(" ", $item->full_name);
                                    $_first_name = $_array[0];
                                    $_last_name = "";
                                    for ($i = 1; $i <= count($_array); $i++) {
                                        $_last_name .= " " . $_array[$i];
                                    }
                                    $_last_name = trim($_last_name);
                                    $_data->ListPassengers[] = array(
                                        "Index" => $stt,
                                        "FirstName" => vn_to_str($_first_name),
                                        "LastName" => vn_to_str($_last_name),
                                        "Type" => "INF",
                                        "Gender" => $item->gender,
                                        "Birthday" => date("Y-m-d",strtotime(str_replace("/", "-", $item->birth_day)))."T".date("H:i:s",strtotime(str_replace("/", "-", $item->birth_day))),
                                        "BaggageDeparture" => "",
                                        "BaggageReturn" => "",
                                    );
                                    $stt++;
                                    $total_price += $DepartureFlightDetail->PriceInfant + $DepartureFlightDetail->FeeInfant + $DepartureFlightDetail->TaxInfant; // thuế phí
                                    $total_price += $ReturnFlightDetail->PriceInfant + $ReturnFlightDetail->FeeInfant + $ReturnFlightDetail->TaxInfant; // thuế phí

                                    $TotalNetPrice += $DepartureFlightDetail->PriceInfant + $DepartureFlightDetail->FeeInfant + $DepartureFlightDetail->TaxInfant; // thuế phí
                                    $TotalNetPrice += $ReturnFlightDetail->PriceInfant + $ReturnFlightDetail->FeeInfant + $ReturnFlightDetail->TaxInfant; // thuế phí
                                }
                            }
                            $_SESSION['booking']['ReturnFlights']['Baggage'] = $totalReturnBaggageFee;
                            $_SESSION['booking']['DepartureFlights']['Baggage'] = $totalDepartureBaggageFee;
//                            $_data->TotalPriceDepart = $DepartureFlights['TotalPrice'];
//                            $_data->TotalPriceReturn = $ReturnFlights['TotalPrice'];
                            $Booking_Airline = $_SESSION['booking']['ReturnFlights']['Flight']->AirlineCode;
                            $DepartureFlightsExpired_Date = cassiopeia_get_flight_time_limit($Booking_Airline,$DepartureFlightDetail->StartDate,$DepartureFlightDetail->Class,"","","");
                            $ReturnFlightsExpired_Date = cassiopeia_get_flight_time_limit($Booking_Airline,$ReturnFlightDetail->StartDate,$DepartureFlightDetail->Class,"","","");
                            if($DepartureFlightsExpired_Date>0 && $ReturnFlightsExpired_Date>0){
                                $Expired_Date = $DepartureFlightsExpired_Date<$ReturnFlightsExpired_Date?$DepartureFlightsExpired_Date:$ReturnFlightsExpired_Date;

                            }
                            if($_payment_method==5){
                                $PartnerPrice = $total_price-$TotalAgentRate;
                                if(user_has_role(3) || user_has_role(8)){ // admin hoặc booker
                                    if($Booking_Airline=="VN"){ // VN không hỗ trợ xuất vé ngay nên phải đặt trước rồi dùng hàm xuất vé
                                        $booking = cassiopeia_maybay_api_booking($_data); // đặt thường
                                        if (!empty($booking) && $booking->status==1) { // đặt thành công
                                            $issue_response = cassiopeia_issue($booking->value,0); // gọi hàm xuất vé
                                            if($issue_response['flag']){
                                                $Booking_Status = "TICKETED";
                                            }else{
                                                $Booking_Status = "TICKET_FAIL";
                                            }
                                            $_SESSION['booking']['DepartureFlights']['status'] = $_SESSION['booking']['ReturnFlights']['status'] = $Booking_Status;
                                            $_SESSION['booking']['DepartureFlights']['PNR'] = $_SESSION['booking']['ReturnFlights']['PNR'] = $booking->value;
                                        }else{ // đặt lỗi
                                            $_SESSION['booking']['ReturnFlights']['status'] = $_SESSION['booking']['DepartureFlights']['status'] = "FAIL";
                                        }
                                    }else{
                                        $booking = cassiopeia_maybay_api_issue_booking($_data); // hàm đặt vé xuất ngay
                                        $_SESSION['booking']['DepartureFlights']['status'] = $_SESSION['booking']['ReturnFlights']['status'] = $booking->status==true?"TICKETED":"PENDING";
                                        $_SESSION['booking']['DepartureFlights']['PNR'] = $_SESSION['booking']['ReturnFlights']['PNR'] = !empty($booking->value)?$booking->value:"";
                                        // chưa rõ kết quả trả về là gì
                                        try {
                                            db_insert("tbl_issue")->fields(array(
                                                "pnr_code" => $booking->value,
                                                "status" => !empty($result)?$result->status:"error",
                                                "booking_code" => $booking_code,
                                                "created" => REQUEST_TIME,
                                                "uid" => $user->uid,
                                                "note"  => "NOW issue"
                                            ))->execute();

                                        } catch (Exception $e) {

                                        }
                                    }
                                }elseif(user_has_role(4)){ // đại lý
//                                _print_r($PartnerPrice);
//                                _print_r($_agent);
                                    if($_agent->field_account_balance['und'][0]['value']<$PartnerPrice){ // Không đủ tiền thanh toán
                                        $Flag = false;
                                        $message = "Số dư không đủ, vui lòng nạp thêm tiền và thử lại sau";
                                    }else{
                                        $_agent->field_account_balance['und'][0]['value']-=$PartnerPrice;
                                        user_save($_agent);
                                        if($Booking_Airline=="VN"){ // VN không hỗ trợ xuất vé ngay nên phải đặt trước rồi dùng hàm xuất vé
                                            $booking = cassiopeia_maybay_api_booking($_data); // đặt thường
                                            if (!empty($booking) && $booking->status==1) { // đặt thành công
//                                            $issue_response = cassiopeia_issue($booking->value,0); // gọi hàm xuất vé
//                                            if($issue_response['flag']){
//                                                $Booking_Status = "TICKETED";
//                                            }else{
                                                $Booking_Status = "TICKET_FAIL";
//                                            }
                                                $_SESSION['booking']['DepartureFlights']['status'] = $_SESSION['booking']['ReturnFlights']['status'] = $Booking_Status;
                                                $_SESSION['booking']['DepartureFlights']['PNR'] = $_SESSION['booking']['ReturnFlights']['PNR'] = $booking->value;
                                            }else{ // đặt lỗi
                                                $_SESSION['booking']['ReturnFlights']['status'] = $_SESSION['booking']['DepartureFlights']['status'] = "FAIL";
                                            }
                                        }else{
                                            $booking = cassiopeia_maybay_api_issue_booking($_data); // hàm đặt vé xuất ngay
                                            $_SESSION['booking']['DepartureFlights']['status'] = $_SESSION['booking']['ReturnFlights']['status'] = $booking->status==true?"TICKETED":"PENDING";
                                            $_SESSION['booking']['DepartureFlights']['PNR'] = $_SESSION['booking']['ReturnFlights']['PNR'] = !empty($booking->value)?$booking->value:"";
                                            // chưa rõ kết quả trả về là gì
                                            try {
                                                db_insert("tbl_issue")->fields(array(
                                                    "pnr_code" => $booking->value,
                                                    "status" => !empty($result)?$result->status:"error",
                                                    "booking_code" => $booking_code,
                                                    "created" => REQUEST_TIME,
                                                    "uid" => $user->uid,
                                                    "note"  => "NOW issue"
                                                ))->execute();

                                            } catch (Exception $e) {

                                            }
                                        }
                                        try{
                                            $query = db_select("tbl_issue_report", "tbl_issue_report");
                                            $query->fields("tbl_issue_report");
                                            $query->range(0, 1);
                                            $query->orderBy("id", "DESC");
                                            $last = $query->execute()->fetchAssoc();
                                            if (!empty($last)) {
                                                $temp = str_replace("ISSUE_", "", $last['tran_code']);
                                                $tran_code = "ISSUE_" . ($temp + 1);
                                            } else {
                                                $tran_code = "ISSUE_" . date("m", REQUEST_TIME) . "0001";
                                            }
                                            $balance = !empty($_agent->field_account_balance['und'][0]['value']) ? $_agent->field_account_balance['und'][0]['value'] : 0;
                                            db_insert("tbl_issue_report")->fields(array(
                                                "booking_code" => $booking_code,
                                                "created" => REQUEST_TIME,
                                                "date" => REQUEST_TIME,
                                                "tran_code" => $tran_code,
                                                "airline" => $Booking_Airline,
                                                "tran_kind" => 4,
                                                "PNR" => $booking->value,
                                                "quantity" => 2*(count($_Adt) + count($_Chd)),
                                                "partner_price" => $PartnerPrice,
                                                "price" => $TotalNetPrice,
                                                "revenue" => $PartnerPrice - $TotalNetPrice,
                                                "agent" => $user->uid,
                                                "content" => $Content,
                                                "tran_user" => $user->uid,
                                                "balance" => $balance,
                                                "category" => "issue",
                                            ))
                                                ->execute();
                                            db_insert("tbl_report")->fields(array(
                                                "created" => REQUEST_TIME,
                                                "date" => REQUEST_TIME,
                                                "type" => "issue",
                                                "tran_code" => $tran_code,
                                            ))
                                                ->execute();
                                        }catch (Exception $e){

                                        }
                                    }
                                }

                            }else{ // đặt vé thông thường
//                                $booking = cassiopeia_meta_api_booking($_data); // gọi hàm đặt vé
                                $booking = cassiopeia_meta_api_booking($_data);
                                $_SESSION['booking']['DepartureFlights']['PNR'] = $booking->Code==0?$booking->Data->DepartureCode:"";
                                $_SESSION['booking']['ReturnFlights']['status'] = $_SESSION['booking']['DepartureFlights']['status'] = $booking->Code==0?"OK":"FAIL";
                                $_SESSION['booking']['ReturnFlights']['PNR'] = $_SESSION['booking']['DepartureFlights']['PNR'] = $booking->Code==0?$booking->Data->DepartureCode:"";
                                $_SESSION['booking']['ReturnFlights']['TransactionCode'] = $_SESSION['booking']['DepartureFlights']['TransactionCode'] = $booking->Data->TransactionCode;
                            }
                            if($user->uid==1){
//                                _print_r($booking);
//                                die;
                            }
                            $Bookings[] = $booking;
                            if (!empty($booking)) {
                                $PNR_CODE = $booking->Data->DepartureCode;
                            }
                            $backup->DepartureFlights = (object)cassiopeia_array_clone((array)$_data);
                            $backup->DepartureFlights->Flight = $_SESSION['booking']['DepartureFlights']['Flight'];
                            $backup->DepartureFlights->FareOptionSession = $_SESSION['booking']['DepartureFlights']['FareOptionSession'];
                            $_temp = $_data->DepartureFlightSession;
                            $_data->DepartureFlightSession = $_data->ReturnFlightSession;
                            $_data->ReturnFlightSession = $_temp;
                            $backup->ReturnFlights = (object)cassiopeia_array_clone((array)$_data);
                            $backup->ReturnFlights->Flight = $_SESSION['booking']['ReturnFlights']['Flight'];
                            $backup->ReturnFlights->FareOptionSession = $_SESSION['booking']['ReturnFlights']['FareOptionSession'];
                            $Trip_type = "RT";

                        } else {
                            if($_payment_method==5){ // xuất ngay
                                if(user_has_role(4) && !user_has_role(3) && !user_has_role(8)){ // đại lý
                                    if($_agent->field_account_balance['und'][0]['value']<$TotalAgentPrice){ // Không đủ tiền thanh toán
                                        $Flag = false;
                                        $message = "Số dư không đủ, vui lòng nạp thêm tiền và thử lại sau";
                                    }else{ // thanh toán trước khi xuất
                                        $_agent->field_account_balance['und'][0]['value']-=$TotalAgentPrice;
                                        user_save($_agent);
                                    }
                                }
                            }
                            if($Flag){
                                $total_price = 0;
                                $DepartureFlightsExpired_Date = 0;
                                $leg = 0;
                                $Booking_Airline="";
                                $PNR_CODE="";
                                $Booking_Status=0;
                                $totalDepartureBaggageFee = 0;
                                $totalReturnBaggageFee = 0;
                                foreach($_SESSION['booking'] as $Itinerary => $Booking){
                                    $TotalItineraryPrice = 0;
                                    $TotalItineraryNetPrice = 0;
                                    $Flight = $Booking['Flight'];
                                    $FlightDetail = cassiopeia_meta_FareOptionSession_load($Booking['Flight'],$Booking['FareOptionSession']);
//                                    _print_r($FlightDetail);
                                    if(!empty($Flight)){
                                        $endpoint = cassiopeia_get_airport($Flight->EndPoint);
                                        if($endpoint->country_code=="VN"){
                                            $endpoint_code = "DO";
                                        }else{
                                            $endpoint_code = $Point_1->region_code;
                                        }
                                        $Point_1_value = cassiopeia_get_fee_by_airline_and_region($Booking['Flight']->AirlineCode,$endpoint_code);
                                        $Point_1_fee = !empty($Point_1_value['value'])?$Point_1_value['value']:0;
                                        $AgentRate = cassiopeia_get_agent_rate($Booking['Flight']->AirlineCode,$endpoint_code,$user->uid);
                                        $_data = new stdClass();
                                        $_data->booking_code = $booking_code;
                                        $_data->ContactInfo = array(
                                            "Gender"            => 1,
                                            "FirstName"         => vn_to_str($_contact_first_name),
                                            "LastName"          => vn_to_str($_contact_last_name),
                                            "Phone"             => $_contact->tel,
                                            "Email"             => $_contact->email,
                                            "Address"           => "",
                                        );
                                        $Content = "XN ".$Flight->StartPoint.$Flight->EndPoint." ".date("d/m/Y", strtotime($Flight->StartDate));

                                        $_data->DataSession = $FlightData->Data->DataSession;
                                        $_data->DepartureFlightSession = $Booking['FareOptionSession'];
                                        $_data->ReturnFlightSession = "";
                                        if (!empty($_Adt)) {
                                            foreach ($_Adt as $item) {
                                                $_baggage = null;
                                                $baggageReturn = null;
                                                $baggageDeparture = null;
                                                if(!empty($item->baggages->ReturnFlights)&&!empty($item->baggages->ReturnFlights->id)){
                                                    $baggageReturn = cassiopeia_get_baggage_by_id($item->baggages->ReturnFlights->id);
                                                }
                                                if(!empty($item->baggages->DepartureFlights)&&!empty($item->baggages->DepartureFlights->id)){
                                                    $baggageDeparture = cassiopeia_get_baggage_by_id($item->baggages->DepartureFlights->id);
                                                }
                                                if(!empty($baggageDeparture)&&$Itinerary=="DepartureFlights"){
                                                    $total_price += $baggageDeparture->amount;
                                                    $totalDepartureBaggageFee += $baggageDeparture->amount;
                                                    $_baggage = $baggageDeparture;
                                                }
                                                if(!empty($baggageReturn)&&$Itinerary=="ReturnFlights"){
                                                    $total_price += $baggageReturn->amount;
                                                    $totalReturnBaggageFee += $baggageReturn->amount;
                                                    $_baggage = $baggageReturn;
                                                }
                                                $_array = explode(" ", $item->full_name);
                                                $_first_name = $_array[0];
                                                $_last_name = "";
                                                for ($i = 1; $i <= count($_array); $i++) {
                                                    $_last_name .= " " . $_array[$i];
                                                }
                                                $_last_name = trim($_last_name);
                                                $_data->ListPassengers[] = array(
                                                    "Index" => $stt,
                                                    "FirstName" => vn_to_str($_first_name),
                                                    "LastName" => vn_to_str($_last_name),
                                                    "Type" => "ADT",
                                                    "Gender" => $item->gender,
                                                    "Birthday" => "01/01/1995",
                                                    "BaggageDeparture" => !empty($_baggage)?$_baggage->weight:"",
                                                    "BaggageReturn" => "",
                                                );
                                                $stt++;

                                                $total_price += $_SESSION['silver_rank_fee']; // Thu phí chiều đi
                                                $total_price += $CustomFee; // Thu phí chiều đi
                                                $total_price += $FlightDetail->PriceAdult + $FlightDetail->FeeAdult + $FlightDetail->TaxAdult; // thuế phí
                                                $TotalItineraryPrice += $_SESSION['silver_rank_fee']; // Thu phí chiều đi
                                                $TotalItineraryPrice += $CustomFee; // Thu phí chiều đi
                                                $TotalItineraryPrice += $FlightDetail->PriceAdult + $FlightDetail->FeeAdult + $FlightDetail->TaxAdult; // thuế phí
                                                $TotalItineraryNetPrice += $FlightDetail->PriceAdult + $FlightDetail->FeeAdult + $FlightDetail->TaxAdult; // thuế phí
                                            }
                                        }
                                        if (!empty($_Chd)) {
                                            foreach ($_Chd as $item) {
                                                $_baggage = null;
                                                $baggageReturn = null;
                                                $baggageDeparture = null;
                                                if(!empty($item->baggages->ReturnFlights)&&!empty($item->baggages->ReturnFlights->id)){
                                                    $baggageReturn = cassiopeia_get_baggage_by_id($item->baggages->ReturnFlights->id);

                                                }
                                                if(!empty($item->baggages->DepartureFlights)&&!empty($item->baggages->DepartureFlights->id)){
                                                    $baggageDeparture = cassiopeia_get_baggage_by_id($item->baggages->DepartureFlights->id);
                                                }
                                                if(!empty($baggageDeparture)&&$Itinerary=="DepartureFlights"){
                                                    $_baggage = $baggageDeparture;
                                                    $total_price += $baggageDeparture->amount;
                                                    $totalDepartureBaggageFee += $baggageDeparture->amount;
                                                }
                                                if(!empty($baggageReturn)&&$Itinerary=="ReturnFlights"){
                                                    $_baggage = $baggageReturn;
                                                    $total_price += $baggageReturn->amount;
                                                    $totalReturnBaggageFee += $baggageReturn->amount;
                                                }
                                                $_array = explode(" ", $item->full_name);
                                                $_first_name = $_array[0];
                                                $_last_name = "";
                                                for ($i = 1; $i <= count($_array); $i++) {
                                                    $_last_name .= " " . $_array[$i];
                                                }
                                                $_last_name = trim($_last_name);
                                                $_data->ListPassengers[] = array(
                                                    "Index" => $stt,
                                                    "FirstName" => vn_to_str($_first_name),
                                                    "LastName" => vn_to_str($_last_name),
                                                    "Type" => "CHD",
                                                    "Gender" => $item->gender,
                                                    "Birthday" => date("d/m/Y",strtotime(str_replace("/", "-", $item->birth_day)))."T".date("H:i:s",strtotime(str_replace("/", "-", $item->birth_day))),
                                                    "BaggageDeparture" => !empty($_baggage)?$_baggage->weight:"",
                                                    "BaggageReturn" => "",
                                                );
                                                $stt++;

                                                $total_price += $_SESSION['silver_rank_fee']; // Thu phí chiều đi
                                                $total_price += $CustomFee; // Thu phí chiều đi
                                                $total_price += $FlightDetail->PriceChild + $FlightDetail->FeeChild + $FlightDetail->TaxChild; // thuế phí
                                                $TotalItineraryPrice += $CustomFee; // Thu phí chiều đi
                                                $TotalItineraryPrice += $_SESSION['silver_rank_fee']; // Thu phí chiều đi
                                                $TotalItineraryPrice += $FlightDetail->PriceChild + $FlightDetail->FeeChild + $FlightDetail->TaxChild; // thuế phí
                                                $TotalItineraryNetPrice += $FlightDetail->PriceChild + $FlightDetail->FeeChild + $FlightDetail->TaxChild; // thuế phí
                                            }
                                        }
                                        if (!empty($_Inf)) {
                                            foreach ($_Inf as $item) {
                                                $baggage = null;
                                                $_array = explode(" ", $item->full_name);
                                                $_first_name = $_array[0];
                                                $_last_name = "";
                                                for ($i = 1; $i <= count($_array); $i++) {
                                                    $_last_name .= " " . $_array[$i];
                                                }
                                                $_last_name = trim($_last_name);
                                                $_data->ListPassengers[] = array(
                                                    "Index" => $stt,
                                                    "FirstName" => vn_to_str($_first_name),
                                                    "LastName" => vn_to_str($_last_name),
                                                    "Type" => "INF",
                                                    "Gender" => $item->gender,
                                                    "Birthday" => date("d/m/Y",strtotime(str_replace("/", "-", $item->birth_day)))."T".date("H:i:s",strtotime(str_replace("/", "-", $item->birth_day))),
                                                    "BaggageDeparture" => "",
                                                    "BaggageReturn" => "",
                                                );
                                                $stt++;
                                                $total_price += $FlightDetail->PriceInfant + $FlightDetail->FeeInfant + $FlightDetail->TaxInfant; // thuế phí
                                                $TotalItineraryPrice += $FlightDetail->PriceInfant + $FlightDetail->FeeInfant + $FlightDetail->TaxInfant; // thuế phí
                                                $TotalItineraryNetPrice += $FlightDetail->PriceInfant + $FlightDetail->FeeInfant + $FlightDetail->TaxInfant; // thuế phí
                                            }
                                        }

                                        $TotalItineraryPartnerPrice = $TotalItineraryPrice-$AgentRate;
                                        $_SESSION['booking']['ReturnFlights']['Baggage'] = $totalReturnBaggageFee;
                                        $_SESSION['booking']['DepartureFlights']['Baggage'] = $totalDepartureBaggageFee;
//                                        $_data->TotalPriceDepart = $Flight['TotalPrice'];
//                                        $_data->TotalPriceReturn = 0;
//                                        _print_r($_data);
//                                        die;
                                        if($Itinerary=="DepartureFlights"){
                                            $Booking_Airline = !empty($Booking_Airline)?$Booking['Flight']->AirlineCode."-".$Booking_Airline:$Booking['Flight']->AirlineCode;
                                            $DepartureFlightsExpired_Date = cassiopeia_get_flight_time_limit($Booking['Flight']->AirlineCode,$Flight->StartDate,$FlightDetail->Class,"","","");

                                            if((user_has_role(3) || user_has_role(8) || user_has_role(4))&& $_payment_method==5){
                                                if($Booking_Airline=="VN"){ // VN không hỗ trợ xuất vé ngay nên phải đặt trước rồi dùng hàm xuất vé
                                                    $booking = cassiopeia_maybay_api_booking($_data); // đặt thường

                                                    if (!empty($booking) && $booking->status==1) { // đặt thành công
//                                                        $issue_response = cassiopeia_issue($booking->value,0); // gọi hàm xuất vé
//                                                        if($issue_response['flag']){
//                                                            $Booking_Status = "TICKETED";
//                                                        }else{
                                                        $Booking_Status = "TICKET_FAIL";
//                                                        }
                                                        $_SESSION['booking']['DepartureFlights']['status']  = $Booking_Status;
                                                        $_SESSION['booking']['DepartureFlights']['PNR'] = $booking->value;
                                                    }else{ // đặt lỗi
                                                        $_SESSION['booking']['DepartureFlights']['status'] = "FAIL";
                                                    }
                                                }else{
                                                    $booking = cassiopeia_maybay_api_issue_booking($_data); // hàm đặt vé xuất ngay
                                                    $_SESSION['booking']['DepartureFlights']['status'] = $booking->status==true?"TICKETED":"PENDING";
                                                    $_SESSION['booking']['DepartureFlights']['PNR'] = !empty($booking->value)?$booking->value:"";
                                                    // chưa rõ kết quả trả về là gì
                                                    try {
                                                        db_insert("tbl_issue")->fields(array(
                                                            "pnr_code" => $booking->value,
                                                            "status" => !empty($result)?$result->status:"error",
                                                            "booking_code" => $booking_code,
                                                            "created" => REQUEST_TIME,
                                                            "uid" => $user->uid,
                                                            "note"  => "NOW issue"
                                                        ))->execute();

                                                    } catch (Exception $e) {

                                                    }
                                                }
                                                try{
                                                    $query = db_select("tbl_issue_report", "tbl_issue_report");
                                                    $query->fields("tbl_issue_report");
                                                    $query->range(0, 1);
                                                    $query->orderBy("id", "DESC");
                                                    $last = $query->execute()->fetchAssoc();
                                                    if (!empty($last)) {
                                                        $temp = str_replace("ISSUE_", "", $last['tran_code']);
                                                        $tran_code = "ISSUE_" . ($temp + 1);
                                                    } else {
                                                        $tran_code = "ISSUE_" . date("m", REQUEST_TIME) . "0001";
                                                    }
                                                    $balance = !empty($_agent->field_account_balance['und'][0]['value']) ? $_agent->field_account_balance['und'][0]['value'] : 0;
                                                    db_insert("tbl_issue_report")->fields(array(
                                                        "booking_code" => $booking_code,
                                                        "created" => REQUEST_TIME,
                                                        "date" => REQUEST_TIME,
                                                        "tran_code" => $tran_code,
                                                        "airline" => $Booking_Airline,
                                                        "tran_kind" => 4,
                                                        "PNR" => $booking->value,
                                                        "quantity" => (count($_Adt) + count($_Chd)),
                                                        "partner_price" => $TotalItineraryPartnerPrice,
                                                        "price" => $TotalItineraryNetPrice,
                                                        "revenue" => $TotalItineraryPartnerPrice - $TotalItineraryNetPrice,
                                                        "agent" => $user->uid,
                                                        "content" => $Content,
                                                        "tran_user" => $user->uid,
                                                        "balance" => $balance,
                                                        "category" => "issue",
                                                    ))
                                                        ->execute();
                                                    db_insert("tbl_report")->fields(array(
                                                        "created" => REQUEST_TIME,
                                                        "date" => REQUEST_TIME,
                                                        "type" => "issue",
                                                        "tran_code" => $tran_code,
                                                    ))
                                                        ->execute();
                                                }catch (Exception $e){

                                                }
                                            }else{
                                                if(($DepartureFlightsExpired_Date>0)){
//                                                    _print_r(333);
//                                                    die;
                                                    $booking = cassiopeia_meta_api_booking($_data);
//                                                    _print_r($booking);
//                                                    die;
                                                    $_SESSION['booking']['DepartureFlights']['status'] = $booking->Code!=0?"FAIL":"OK";
//                                                    _print_r( $_SESSION['booking']['DepartureFlights']);
//                                                    die;
                                                    $_SESSION['booking']['DepartureFlights']['PNR'] = $booking->Code==0?$booking->Data->DepartureCode:"";
                                                    $_SESSION['booking']['DepartureFlights']['TransactionCode'] = $booking->Data->TransactionCode;
                                                }else{
                                                    $PNR_CODE = " ";
                                                }
                                            }
                                            if(!empty($booking)){
                                                $PNR_CODE = !empty($PNR_CODE)?$booking->Data->DepartureCode."-".$PNR_CODE:$booking->Data->DepartureCode;
                                            }
                                            $Expired_Date = $DepartureFlightsExpired_Date;
                                        }else{
                                            $Booking_Airline = !empty($Booking_Airline)?$Booking_Airline."-".$Booking['Flight']->AirlineCode:$Booking['Flight']->AirlineCode;
                                            $ReturnFlightsExpired_Date = cassiopeia_get_flight_time_limit($Booking['Flight']->AirlineCode,$Flight->StartDate,$FlightDetail->Class,"","","");
//                                            _print_r($ReturnFlightsExpired_Date);
//                                            die;
                                            if((user_has_role(3) || user_has_role(8) || user_has_role(4))&& $_payment_method==5){
                                                if($Booking_Airline=="VN"){ // VN không hỗ trợ xuất vé ngay nên phải đặt trước rồi dùng hàm xuất vé
                                                    $booking = cassiopeia_maybay_api_booking($_data); // đặt thường
                                                    if (!empty($booking) && $booking->status==1) { // đặt thành công
//                                                        $issue_response = cassiopeia_issue($booking->value,0); // gọi hàm xuất vé
//                                                        if($issue_response['flag']){
//                                                            $Booking_Status = "TICKETED";
//                                                        }else{
                                                        $Booking_Status = "TICKET_FAIL";
//                                                        }
                                                        $_SESSION['booking']['ReturnFlights']['status'] = $Booking_Status;
                                                        $_SESSION['booking']['ReturnFlights']['PNR'] = $booking->value;
                                                    }else{ // đặt lỗi
                                                        $_SESSION['booking']['ReturnFlights']['status']= "FAIL";
                                                    }
                                                }else{
                                                    $booking = cassiopeia_maybay_api_issue_booking($_data); // hàm đặt vé xuất ngay
                                                    $_SESSION['booking']['ReturnFlights']['status'] = $booking->Code==0?"TICKETED":"PENDING";
                                                    $_SESSION['booking']['ReturnFlights']['PNR'] = $booking->Code==0?$booking->Data->DepartureCode:"";
                                                    // chưa rõ kết quả trả về là gì
                                                    try {
                                                        db_insert("tbl_issue")->fields(array(
                                                            "pnr_code" => $booking->value,
                                                            "status" => !empty($result)?$result->status:"error",
															"error_code" => '',
                                                            "booking_code" => $booking_code,
                                                            "created" => REQUEST_TIME,
                                                            "uid" => $user->uid,
                                                            "note"  => "NOW issue"
                                                        ))->execute();

                                                    } catch (Exception $e) {

                                                    }
                                                }
                                                try{
                                                    $query = db_select("tbl_issue_report", "tbl_issue_report");
                                                    $query->fields("tbl_issue_report");
                                                    $query->range(0, 1);
                                                    $query->orderBy("id", "DESC");
                                                    $last = $query->execute()->fetchAssoc();
                                                    if (!empty($last)) {
                                                        $temp = str_replace("ISSUE_", "", $last['tran_code']);
                                                        $tran_code = "ISSUE_" . ($temp + 1);
                                                    } else {
                                                        $tran_code = "ISSUE_" . date("m", REQUEST_TIME) . "0001";
                                                    }
                                                    $balance = !empty($_agent->field_account_balance['und'][0]['value']) ? $_agent->field_account_balance['und'][0]['value'] : 0;
                                                    db_insert("tbl_issue_report")->fields(array(
                                                        "booking_code" => $booking_code,
                                                        "created" => REQUEST_TIME,
                                                        "date" => REQUEST_TIME,
                                                        "tran_code" => $tran_code,
                                                        "airline" => $Booking_Airline,
                                                        "tran_kind" => 4,
                                                        "PNR" => $booking->value,
                                                        "quantity" => (count($_Adt) + count($_Chd)),
                                                        "partner_price" => $TotalItineraryPartnerPrice,
                                                        "price" => $TotalItineraryNetPrice,
                                                        "revenue" => $TotalItineraryPartnerPrice - $TotalItineraryNetPrice,
                                                        "agent" => $user->uid,
                                                        "content" => $Content,
                                                        "tran_user" => $user->uid,
                                                        "balance" => $balance,
                                                        "category" => "issue",
                                                    ))
                                                        ->execute();
                                                    db_insert("tbl_report")->fields(array(
                                                        "created" => REQUEST_TIME,
                                                        "date" => REQUEST_TIME,
                                                        "type" => "issue",
                                                        "tran_code" => $tran_code,
                                                    ))
                                                        ->execute();
                                                }catch (Exception $e){

                                                }
                                            }else{
                                                if(($ReturnFlightsExpired_Date>0)){
                                                    $booking = cassiopeia_meta_api_booking($_data);
//                                                    _print_r($booking);
//                                                    die;
                                                    $_SESSION['booking']['ReturnFlights']['status'] = $booking->Code==0?"OK":"FAIL";
                                                    $_SESSION['booking']['ReturnFlights']['PNR'] = $booking->Code==0?$booking->Data->DepartureCode:"";
                                                    $_SESSION['booking']['ReturnFlights']['TransactionCode'] = $booking->Data->TransactionCode;
                                                }else{

                                                }
                                            }
                                            if(!empty($booking)){
                                                $_SESSION['booking']['ReturnFlights']['PNR'] = $booking->Data->DepartureCode;
												if($PNR_CODE != $booking->Data->DepartureCode){												
													$PNR_CODE = $PNR_CODE."-".$booking->Data->DepartureCode;
												}
                                            }else{
//                                        $Booking_Status = 0;
                                            }
                                            if($DepartureFlightsExpired_Date !="" || $ReturnFlightsExpired_Date !=""){
                                                $Expired_Date = $DepartureFlightsExpired_Date<$ReturnFlightsExpired_Date?$DepartureFlightsExpired_Date:$ReturnFlightsExpired_Date;
                                            }else{
//                                    $Booking_Status = 0;
                                            }
                                        }
                                        if($booking->status!=1){
                                            $Booking_Status = 0;
                                        }
//                                        _print_r($booking);
                                        $Bookings[] = $booking;
                                        $backup->$Itinerary = $_data;
                                        $backup->$Itinerary->Flight = $Booking['Flight'];
                                        $backup->$Itinerary->FareOptionSession = $Booking['FareOptionSession'];
                                        $leg++;
                                    }

                                }
                                $Trip_type = $leg==1?"OW":"RT";
                            }
                        }
                    }
//                    _print_r("Bookings");
//                    _print_r($Bookings);
//                    die;

                    if($Trip_type==="OW"){
                        $_SESSION['booking']['ReturnFlights'] = null;
                        unset($_SESSION['booking']['ReturnFlights']);

                    }
                    if($Flag && !empty($_SESSION['booking'])){
                        $db_transaction = db_transaction();

                        $Booking_Status = $_SESSION['booking']['DepartureFlights']['status'];
                        if(!empty($_SESSION['booking']['ReturnFlights']['status'])){
                            if($_SESSION['booking']['DepartureFlights']['status']!=$_SESSION['booking']['ReturnFlights']['status']){
                                if($_SESSION['booking']['DepartureFlights']['status']!="OK" || $_SESSION['booking']['ReturnFlights']['status']!="OK"){
                                    $Booking_Status = "FAIL";
                                }
                            }
                        }
//                    if($user->uid==1 && $_payment_method==5){
//                        $_agent->field_account_balance['und'][0]['value'] -= $total_price;
//                        user_save($_agent);
//                    }
                        try {
//                        if($user->uid==1){
//                            $total_price = 20000;
//                        }
//                            _print_r($_SESSION['booking']['DepartureFlights']);
//                            die;
                            db_insert("tbl_booking")->fields(array(
                                "booking_code"      => $booking_code,
                                "pnr_code"          => $PNR_CODE,
                                "created"           => REQUEST_TIME,
                                "airline"           => $Booking_Airline,
                                "price"             => $total_price,
                                "book_price"        => $total_price,
                                "changed"           => 0,
                                "agent_code"        => "",
                                "booking_name"      => "",
                                "uid"               => $user->uid,
                                "status"            => $Booking_Status,
                                "adt"               => count($_Adt),
                                "chd"               => count($_Chd),
                                "payment_method"    => $_payment_method,
                                "inf"               => count($_Inf),
                                "ExpiryDt"          => !empty($Expired_Date)?$Expired_Date:0,
                                "trip_type"         => $Trip_type,
                                "version"           => 2,
                                "data"              => serialize($backup),
                                "booking"           => serialize($Bookings),
                                "start_point"       => !empty($_SESSION['booking']['DepartureFlights']['Flight']->StartPoint)?$_SESSION['booking']['DepartureFlights']['Flight']->StartPoint:"",
                                "end_point"         => !empty($_SESSION['booking']['DepartureFlights']['Flight']->EndPoint)?$_SESSION['booking']['DepartureFlights']['Flight']->EndPoint:"",
                                "departure_date"    => !empty($_SESSION['booking']['DepartureFlights']['Flight']->StartDate)?$_SESSION['booking']['DepartureFlights']['Flight']->StartDate:"",
                                "return_date"       => !empty($_SESSION['booking']['ReturnFlights']['Flight']->StartDate)?$_SESSION['booking']['ReturnFlights']['Flight']->StartDate:"",
                                "DO"                => 1,
                                "customFee"         => !empty($_SESSION['customFee'])?$_SESSION['customFee']:0,
                                "silverFee"         => !empty($_SESSION['silver_rank_fee'])?$_SESSION['silver_rank_fee']:0,
                            ))
                                ->execute();

//                    db_insert("tbl_customer")->fields(array(
//                        "FirstName"     => $_data->Contact['FirstName'],
//                        "LastName"      => $_data->Contact['LastName'],
//                        "FullName"      => $_data->Contact['FirstName'] . " " . $_data->Contact['LastName'],
//                        "Phone"         => $_data->Contact['Phone'],
//                        "Email"         => $_data->Contact['Email'],
//                        "Sex"           => $_data->Contact['Gender'],
//                        "booking_code"  => $booking_code,
//                        "agent"         => $user->uid,
//                    ))->execute();
//                    _print_r($_SESSION['booking'] );
//                    die;
                            foreach ($_SESSION['booking'] as $Booking) {
                                _print_r($Booking);
                                _print_r($Booking['PNR']);
//                                die;
                                $FlightDetail = cassiopeia_meta_FareOptionSession_load($Booking['Flight'],$Booking['FareOptionSession']);
                                if(!empty($Booking['Flight'])){
                                    db_insert("tbl_ticket")->fields(array(
                                        "booking_code" => $booking_code,
                                        "ticket" => serialize($Booking['Flight']),
                                        "PNR"   => !empty($Booking['PNR'])?$Booking['PNR']:"",
                                        "TransactionCode"   => !empty($Booking['TransactionCode'])?$Booking['TransactionCode']:"",
                                        "FareOptionSession"   => !empty($Booking['FareOptionSession'])?$Booking['FareOptionSession']:"",
                                        "status"   => !empty($Booking['status'])?$Booking['status']:"",
                                        "Baggage"   => !empty($Booking['Baggage'])?$Booking['Baggage']:0,
                                        "airline"   => $Booking['Flight']->AirlineCode,
                                        "StartDate"   => $Booking['Flight']->StartDate,
                                        "EndDate"   => $Booking['Flight']->EndDate,
                                        "type" => $type,
                                    ))->execute();
                                }
                            }
                            $_SESSION['booking_issue'] = $booking;
                            if($Booking_Status=="OK"){
                                cassiopeia_send_booking_mail($booking_code,$_data->Contact['Email'], false);
                            }
                            if ($_payment_method == 3) {
                                $_agent = user_load(55);
                                $balance = !empty($_agent->field_account_balance['und'][0]['value']) ? $_agent->field_account_balance['und'][0]['value'] : 0;
                                $balance -= $total_price;
                                $_agent->field_account_balance['und'][0]['value'] = $balance;
                                user_save($_agent);
                                $data['return_url'] = "booking/vnpay/init?order_id=" . $booking_code . "&amount=" . $total_price . "&order_desc='Thanh toán booking ".ucfirst(SITE_DOMAIN)."'";
//                        $data['return_url'] = "/booking/issue/".$booking_code;
                                $data['status'] = "OK";
                            } else {
//                            if($user->uid==1){
//                                die;
//                            }
                                $data['return_url'] = "/booking/view/" . $booking_code;
                                $data['status'] = "OK";
                            }

                        } catch (Exception $e) {
                            print_r($e);
                            $data['status'] = "FAIL";
                            $data['message'] = "Đã xảy ra lỗi, vui lòng liên hệ với người quản trị.";
                            $db_transaction->rollback();
                        }
                    }else{
                        $data['status'] = "FAIL";
                        $data['message'] = $message;
                    }
                }


                break;
            case "add_baggage" :
                $customFee = $_REQUEST['customFee'];
                $_bagggages = json_decode($_REQUEST['baggages']);
                $data['right_detail'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/search-flight-right-detail.tpl.php",array("baggages"=>$_bagggages,"customFee"=>$customFee));
                break;
            case "flight_verify" :
                $flag = 1;
                $Session = $_REQUEST['_session'];
                $_session_key = $_REQUEST['_session_key'];
                foreach($_SESSION['booking'] as $item){
//                    print_r($item);
                    $_data_check = array();
                    $_data_check['Session'] = $Session;
                    $_data_check['FareDataId'] = $item['data']->FareDataId;
                    $_data_check['ListFlight'][] = array(
                        "FlightValue"=>$item['data']->ListFlight[0]->FlightValue
                    );
                    $check = json_decode(cassiopeia_verify_flight($_data_check));
                    if($check->ListFareStatus[0]->Status==false){
                        $flag = 0;
                        db_delete('tbl_airline_session',"id",$_session_key)->execute();
                        db_delete('tbl_session',"id",$_session_key)->execute();
                        break;
                    }
                }
                $data['check'] = $flag;
                break;
            case "booking_choose_international_flight" :
                try{
                    $_SESSION['booking'] = null;
                    $GroupSession = $_REQUEST['GroupSession'];
                    $DepartureFlightSession = $_REQUEST['DepartureFlightSession'];
                    $ReturnFlightSession = $_REQUEST['ReturnFlightSession'];
                    $session_key = $_REQUEST['session_key'];
                    $customFee = $_REQUEST['customFee'];
                    $query = db_select("tbl_session","tbl_session");
                    $query -> fields("tbl_session");
                    $query -> condition("id",$session_key,"=");
                    $query -> condition("airline","INTERNATIONAL","=");
                    $query -> condition("client_ip",$_SESSION['QT-CLIENT-IP'],"=");
                    $check = $query -> execute()->fetchObject();
                    $search_info = json_decode(unserialize($check->data)['data']);
                    $result = unserialize($check->value);
                    $_SESSION['FlightData'] = $result->Data;
                    $_SESSION['DataSession'] = $result->Data->DataSession;
                    $_SESSION['FlightGroup'] = $result->Data->FlightGroups->$GroupSession;

                    $DepartureFlight = $result->Data->FlightGroups->$GroupSession->DepartureFlights->$DepartureFlightSession;
                    $ReturnFlight = !empty($ReturnFlightSession)?$result->Data->FlightGroups->$GroupSession->ReturnFlights->$ReturnFlightSession:null;

                    $agent_fee = cassiopeia_user_agent_fee_load_by_class($DepartureFlight->AirlineCode,$DepartureFlight->ListSegment[0]->Class);
//                    _print_r($agent_fee);
                    $service_fee = cassiopeia_user_service_fee_load_by_class($DepartureFlight->AirlineCode,$DepartureFlight->ListSegment[0]->Class);
                    $DepartureFlight->ServiceFee = $service_fee['international_fee'];
                    $DepartureFlight->AgentFee = $agent_fee['international_fee'];
                    $DepartureFlight->AgentInfantFee = $agent_fee['infant'];
                    $DepartureFlight->ServiceInfantFee = $service_fee['infant'];

                    $_SESSION['booking']['DepartureFlight'] = $DepartureFlight;

                    if(!empty($ReturnFlight)){
                        $agent_fee = cassiopeia_user_agent_fee_load_by_class($ReturnFlight->AirlineCode,$ReturnFlight->ListSegment[0]->Class);
                        $service_fee = cassiopeia_user_service_fee_load_by_class($ReturnFlight->AirlineCode,$ReturnFlight->ListSegment[0]->Class);
                        $ReturnFlight->ServiceFee = $service_fee['international_fee'];
                        $ReturnFlight->AgentFee = $agent_fee['international_fee'];
                        $ReturnFlight->AgentInfantFee = $agent_fee['infant'];
                        $ReturnFlight->ServiceInfantFee = $service_fee['infant'];
                        $_SESSION['booking']['ReturnFlight'] = $ReturnFlight;
                    }

                    $data['ready'] = 1;
//                    $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/booking-itinerary.tpl.php");
                    $data['booking_form'] = _cassiopeia_render_theme("module","cassiopeia","templates/forms/booking-form-international.tpl.php",array("search_info"=>$search_info));
                    $data['right_detail'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/booking-international-right-detail.tpl.php",array("search_info"=>$search_info,"customFee"=>$customFee));
                    if(empty($user->uid)){
                        $data['logined'] = 0;
                    }
                }catch (Exception $e){
                    print_r($e);
                }
                break;
            case "booking_choose_flight" :
                $_flight_type = $_REQUEST['_flight_type'];
                $customFee = $_REQUEST['customFee'];
                $kind = isset($_REQUEST['kind'])?$_REQUEST['kind']:"";
                $Session = isset($_REQUEST['_session'])?$_REQUEST['_session']:null;
                $Itinerary = $_REQUEST['Itinerary'];
                $FlightNumber = $_REQUEST['FlightNumber'];
                $Airline = $_REQUEST['Airline'];
                $FareOptionSession = $_REQUEST['FareOptionSession'];
                $_session_key = $_REQUEST['_session_key'];
                $FlightSession = $_REQUEST['FlightSession'];
                $query = db_select("tbl_session","tbl_session");
                $query -> fields("tbl_session");
                $query -> condition("id",$_session_key,"=");
                $query -> condition("client_ip",$_SESSION['QT-CLIENT-IP'],"=");
                $check = $query -> execute()->fetchObject();
                $result = unserialize($check->value);
                $FlightResult = $result->Data;
//                print_r($result);
//                die;
                $Flight = $FlightResult->$Itinerary->$FlightSession;
                $search_info = json_decode(unserialize($check->data)['data']);
                $FlightDetail = cassiopeia_meta_FareOptionSession_load($Flight,$FareOptionSession);
                $agent_fee = cassiopeia_user_agent_fee_load_by_class($Flight->AirlineCode,$FlightDetail->Class);
                $service_fee = cassiopeia_user_service_fee_load_by_class($Flight->AirlineCode,$FlightDetail->Class);
                $FlightDetail->ServiceFee = $service_fee['fee'];
                $FlightDetail->AgentFee = $agent_fee['fee'];
                $FlightDetail->AgentInfantFee = $agent_fee['infant'];
                $FlightDetail->ServiceInfantFee = $service_fee['infant'];
                $Flight->FlightDetail = $FlightDetail;
                unset($Flight->FareOptions);
                $_SESSION['booking'][$Itinerary]['Flight'] = $Flight;
                $_SESSION['SearchInfo'] = $search_info;
                $_SESSION['DataSession'] = $result->Data->DataSession;
                $data['error'] = "";
                if(count($_SESSION['booking']) == $_flight_type){
                    $data['ready'] = 1;
                    $data['booking_form'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/booking-form.tpl.php",array("search_info"=>$search_info,"flight_type"=>$_flight_type,"session"=>$Session,"kind"=>$kind));
                    $data['right_detail'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/search-flight-right-detail.tpl.php",array("info"=>$search_info));
                }else{
                    $data['ready'] = 0;
                }
                if(empty($user->uid)){
                    $data['logined'] = 0;
                }
                $data['count_booking'] = count($_SESSION['booking']);
                break;
            case "booking_un_choose_international_flight" :
                $_SESSION['booking'] = null;
                $data['ready'] = 0;
                break;
            case "booking_un_choose_flight" :
                $Itinerary = $_REQUEST['Itinerary'];
                $temp = array();
                if(!empty($_SESSION['booking'])){
                    foreach($_SESSION['booking'] as $key => $item){
                        if($key != $Itinerary){
                            $temp[$key] = $item;
                        }
                    }
                    $_SESSION['booking'] = $temp;
                }
                $data['count_booking'] = count($_SESSION['booking']);
                $data['ready'] = 0;
//                $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/booking-itinerary.tpl.php");
                break;
            case "pre_booking" :
                $search_data = json_decode($_REQUEST['search_data']);
                $_SESSION['search_data'] = $search_data;
                break;
            case "getFlightDetail" :
                $Itinerary = $_REQUEST['Itinerary'];
                $FareOptionSession = $_REQUEST['FareOptionSession'];
                $_session_key = $_REQUEST['session_key'];
                $FlightSession = $_REQUEST['FlightSession'];
                $query = db_select("tbl_session","tbl_session");
                $query -> fields("tbl_session");
                $query -> condition("id",$_session_key,"=");
                $query -> condition("client_ip",$_SESSION['QT-CLIENT-IP'],"=");
                $check = $query -> execute()->fetchObject();
                $result = unserialize($check->value);
                $FlightResult = $result->Data;
                $Flight = $FlightResult->$Itinerary->$FlightSession;
                $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/flight-detail.tpl.php",array("FlightResult"=>$FlightResult,"Flight"=>$Flight,"FareOptionSession"=>$FareOptionSession));
                break;
            case "get_fare_rules" :
                $_airline = $_REQUEST['airline'];
                $_class = $_REQUEST['class'];
                $conditions = array();
                $conditions['field_airline'] = array(
                    "type"      => "fieldCondition",
                    "key"       => "value",
                    "value"     => $_airline,
                    "condition" => "=",
                );
                $conditions['field_ticket_class'] = array(
                    "type"      => "fieldCondition",
                    "key"       => "value",
                    "value"     => $_class,
                    "condition" => "=",
                );
                $rules = cassiopeia_get_items_by_conditions($conditions,"ticket_rule","node");
                $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/flight-fare-rules.tpl.php",array("rules"=>$rules));
                break;
            case "get_search_month" :
                $_data = json_decode($_REQUEST['data']);
                $result = (cassiopeia_search_month($_data));
                $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/flight-search-month.tpl.php",array("data"=>($result),"info"=>$_data));
                break;
            case "get_airlines_flights" :
                $session_key = $_REQUEST['session_key'];
                $data['block_filter'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/search-flight-filter-DO.tpl.php",array("session_key"=>$session_key));
                break;
            case "get_domestic_flights" :
                global $user;
                $departures = null;
                $returns = null;
                $session_key = $_REQUEST['session_key'];
                $datas = json_decode($_REQUEST['data']);
                $query = db_select("tbl_session","tbl_session");
                $query -> fields("tbl_session");
                $query -> condition("id",$session_key,"=");
                $query -> condition("airline",$datas->AirlineCode,"=");
                $query -> condition("uid",$user->uid,"=");
                $check = $query -> execute()->fetchObject();
//                $check = null;
                if(empty($check)){
                    $result = convert_xml_to_array(cassiopeia_maybay_flight_search_by_airline($datas));
//                    _print_r($result);
                    if(!empty($result['soapBody']['Lcc_SearchFlightAllClassByAirlineV2Response']['Lcc_SearchFlightAllClassByAirlineV2Result'])){
                        $search_result = $result['soapBody']['Lcc_SearchFlightAllClassByAirlineV2Response']['Lcc_SearchFlightAllClassByAirlineV2Result'];
                        $FlightData = $search_result['FlightData'];
                        if(!empty($FlightData)){
                            $DepartureFlights = array();
                            if(empty($FlightData['DepartureFlights']['FlightFare'][0])){
                                if(!empty($FlightData['DepartureFlights']['FlightFare'])){
                                    $Flight = $FlightData['DepartureFlights']['FlightFare'];
                                    $DepartureFlights[$Flight['ListAvailFlights']['AvailFlight']['FlightNumber']][] = $Flight;
                                }
                            }else{
                                foreach($FlightData['DepartureFlights']['FlightFare'] as $Flight){
                                    $DepartureFlights[$Flight['ListAvailFlights']['AvailFlight']['FlightNumber']][] = $Flight;
                                }
                            }
                            $ReturnFlights = array();
                            if(empty($FlightData['ReturnFlights']['FlightFare'][0])){
                                if(!empty($FlightData['ReturnFlights']['FlightFare'])){
                                    $Flight = $FlightData['ReturnFlights']['FlightFare'];
                                    $ReturnFlights[$Flight['ListAvailFlights']['AvailFlight']['FlightNumber']][] = $Flight;
                                }
                            }else{
                                foreach($FlightData['ReturnFlights']['FlightFare'] as $Flight){
                                    $ReturnFlights[$Flight['ListAvailFlights']['AvailFlight']['FlightNumber']][] = $Flight;
                                }
                            }

                            $Flights['DepartureFlights'] = $DepartureFlights;
                            $Flights['ReturnFlights'] = $ReturnFlights;
                        }
                        $_data = array(
                            "data"=>$_REQUEST['data'],
                            "airline"=> $FlightData['AirlineCode'],
                        );
                        try{
                            if(empty($check)){
                                db_insert("tbl_session")->fields(array(
                                    "id"    => $session_key,
                                    "airline"    => $datas->AirlineCode,
                                    "value"     => serialize($Flights),
                                    "data"     =>serialize($_data),
                                    "created"     => REQUEST_TIME,
                                    "uid"     => $user->uid,
                                ))->execute();
                                $departures = $Flights['DepartureFlights'];
                                $returns = $Flights['ReturnFlights'];
                            }
                            if(!empty($departures)){
                                db_insert("tbl_airline_session")->fields(array(
                                    "id"            => $session_key,
                                    "leg"           => 0,
                                    "created"       => REQUEST_TIME,
                                    "airline"       => $FlightData['AirlineCode'],
                                    "uid"           => $user->uid,
                                ))->execute();
                            }
                            if(!empty($returns)){
                                db_insert("tbl_airline_session")->fields(array(
                                    "id"            => $session_key,
                                    "leg"           => 1,
                                    "created"       => REQUEST_TIME,
                                    "airline"       => $FlightData['AirlineCode'],
                                    "uid"           => $user->uid,
                                ))->execute();
                            }
                        }catch (Exception $e){
                            print_r($e);
                        }
                    }
                }else{
                    $Flights = unserialize($check->value);
                    $departures = $Flights['DepartureFlights'];
                    $returns = $Flights['ReturnFlights'];
                    $data['cache'] = 1;
                }
                $point_1 = cassiopeia_get_airport($datas->DepartureAirportCode);
                $point_2 = cassiopeia_get_airport($datas->DestinationAirportCode);
                $data['Total_Departure'] = count($departures);
                $data['Total_Return'] = count($returns);
                $data['block_result_DO_departure_head'] = $point_1->city.' <i class="fa fa-long-arrow-right"></i>'.$point_2->city;
                $data['block_result_DO_return_head'] = $point_2->city.' <i class="fa fa-long-arrow-right"></i>'.$point_1->city;
                $data['html_departure'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/flight-search-data-DO.tpl.php",array("items"=>$departures,"info"=>$datas,"itinerary"=>"DepartureFlights","Airline"=>$datas->AirlineCode));
                $data['html_return'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/flight-search-data-DO.tpl.php",array("items"=>$returns,"info"=>$datas,"itinerary"=>"ReturnFlights","Airline"=>$datas->AirlineCode));
                $data['block_filter'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/search-flight-filter-DO.tpl.php",array("session_key"=>$session_key));
                break;
            case "get_domestic_flights_meta" :
                global $user;
                if(!empty($_SESSION['QT-CLIENT-IP'])){
                    $departures = array();
                    $returns = array();
                    $session_key = $_REQUEST['session_key'];
                    $datas = json_decode($_REQUEST['data']);

                    $query = db_select("tbl_session","tbl_session");
                    $query -> fields("tbl_session");
                    $query -> condition("id",$session_key,"=");
                    $query -> condition("client_ip",$_SESSION['QT-CLIENT-IP'],"=");
                    $check = $query -> execute()->fetchObject();

//                    if(empty($check)){
                        $result = cassiopeia_meta_ExtDOMSearchFlights($datas);

//                    print_r($result);
                        if($result->Code == 0){
                            $FlightResult = $result->Data;
                            $_data = array(
                                "data"=>$_REQUEST['data'],
                                "airline"=> $FlightResult->DataSession,
                            );

                            try{
                                if(true){
                                    db_insert("tbl_session")->fields(array(
                                        "id"        => $session_key,
                                        "value"     => serialize($result),
                                        "data"      => serialize($_data),
                                        "created"   => REQUEST_TIME,
                                        "client_ip"       => $_SESSION['QT-CLIENT-IP'],
                                    ))->execute();
                                    $departures = $FlightResult->DepartureFlights;
                                    $returns = $FlightResult->ReturnFlights;
                                }
                                if(!empty($departures)){
                                    $DepartureAirlines = array();
                                    foreach($departures as $departure){
                                        $DepartureAirlines[$departure->AirlineCode] = $departure->AirlineCode;
                                    }
                                    $query = db_insert("tbl_airline_session")->fields(array("id","leg","created","airline","client_ip"));
                                    foreach($DepartureAirlines as $DepartureAirline){
                                        $query->values(array($session_key,0,REQUEST_TIME,$DepartureAirline,$_SESSION['QT-CLIENT-IP']));
                                    }
                                    $query->execute();
                                }
                                if(!empty($returns)){
                                    $ReturnAirlines = array();
                                    foreach($returns as $return){
                                        $ReturnAirlines[$return->AirlineCode] = $return->AirlineCode;
                                    }
                                    $query = db_insert("tbl_airline_session")->fields(array("id","leg","created","airline","client_ip"));
                                    foreach($ReturnAirlines as $ReturnAirline){
                                        $query->values(array($session_key,1,REQUEST_TIME,$ReturnAirline,$_SESSION['QT-CLIENT-IP']));
                                    }
                                    $query->execute();
                                }
                            }catch (Exception $e){
                                _print_r($e);
                                die;
                            }
                        }
//                    }else{
//                        $result = unserialize($check->value);
//                        $FlightResult = $result->Data;
//                        $departures = $FlightResult->DepartureFlights;
//                        $returns = $FlightResult->ReturnFlights;
//                        $data['cache'] = 1;
//                    }
                    $point_1 = cassiopeia_get_airport($datas->StartPoint);
                    $point_2 = cassiopeia_get_airport($datas->EndPoint);
                    $data['Total_Departure'] = count((array)$departures);
                    $data['Total_Return'] = count((array)$returns);
                    $data['block_result_DO_departure_head'] = $point_1->city.' <i class="fa fa-long-arrow-right"></i>'.$point_2->city;
                    $data['block_result_DO_return_head'] = $point_2->city.' <i class="fa fa-long-arrow-right"></i>'.$point_1->city;
                    $data['html_departure'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/flight-search-data-DO_meta.tpl.php",array("items"=>$departures,"info"=>$datas,"itinerary"=>"DepartureFlights"));
                    $data['html_return'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/flight-search-data-DO_meta.tpl.php",array("items"=>$returns,"info"=>$datas,"itinerary"=>"ReturnFlights"));
                    $data['block_filter'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/search-flight-filter-DO.tpl.php",array("session_key"=>$session_key));
                }
                break;
            case "get_international_flights_meta" :
                $session_key = $_REQUEST['session_key'];
                $datas = json_decode($_REQUEST['data']);
                $query = db_select("tbl_session","tbl_session");
                $query -> fields("tbl_session");
                $query -> condition("id",$session_key,"=");
                $query -> condition("airline","INTERNATIONAL","=");
                $query->condition("client_ip", $_SESSION['QT-CLIENT-IP']);
                $check = $query -> execute()->fetchObject();
                $FlightData = array();
                if(empty($check)){
                    try{
                        $result = cassiopeia_meta_api_INTSearchFlights($datas);

                        if(!empty($result->Data)){
                            $FlightData = $result->Data;
                            $_data = array(
                                "data"=>$_REQUEST['data'],
                                "airline"=> "INTERNATIONAL",
                            );
                            if(empty($check)){
                                db_insert("tbl_session")->fields(array(
                                    "id"            => $session_key,
                                    "airline"       => "INTERNATIONAL",
                                    "value"         => serialize($result),
                                    "data"          => serialize($_data),
                                    "created"       => REQUEST_TIME,
                                    "client_ip"           => $_SESSION['QT-CLIENT-IP'],
                                ))->execute();
                                $Airlines = array();
                                $_SESSION['Stops'] = array();
                                foreach($result->Data->FlightGroups as $GroupSession => $flightGroup){
                                    if(empty($Airlines)||!in_array($flightGroup->PlatingCarrier,$Airlines)){
                                        $Airlines[] = $flightGroup->PlatingCarrier;
                                        db_insert("tbl_airline_session")->fields(array(
                                            "id"            => $session_key,
                                            "leg"           => 0,
                                            "created"       => REQUEST_TIME,
                                            "airline"       => $flightGroup->PlatingCarrier,
                                            "client_ip"           => $_SESSION['QT-CLIENT-IP'],
                                        ))->execute();
                                    }
                                    foreach($flightGroup->DepartureFlights as $departureFlight){
                                        if(empty($_SESSION['Stops'])||!in_array($departureFlight->Stops,$_SESSION['Stops'])){
                                            $_SESSION['Stops'][$departureFlight->Stops] = $departureFlight->Stops;
                                        }
                                    }
                                }
                            }
                        }
                    }catch (Exception $e){

                    }
                }else{
                    $result = unserialize($check->value);
//                    $FlightData = $result->Data;
                    $data['cache'] = 1;
                }

                $data['response'] = "OK";
                $data['block_filter'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/search-flight-block-filter.tpl.php",array("session_key"=>$session_key));
                $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/flight-search-table.tpl.php",array("data"=>$result,"info"=>$datas));
                break;
            case "get_international_flights" :
                $session_key = $_REQUEST['session_key'];
                $datas = json_decode($_REQUEST['data']);
                $query = db_select("tbl_session","tbl_session");
                $query -> fields("tbl_session");
                $query -> condition("id",$session_key,"=");
                $query -> condition("airline","INTERNATIONAL","=");
                $query -> condition("uid",$user->uid,"=");
                $check = $query -> execute()->fetchObject();
                $FlightData = array();
//                print_r($check);
                if(empty($check)){
                    try{
//                        db_insert("tbl_log")->fields(array(
//                            "created"       => REQUEST_TIME,
//                            "uid"           => $user->uid,
//                            "request_url"   => "get_international_flights",
//                            "value"=> $session_key,
//                        ))->execute();
                        $result = convert_xml_to_array(cassiopeia_maybay_flight_search($datas));
                        if(!empty($result['soapBody']['Gds_SearchFlightV2Response']['Gds_SearchFlightV2Result'])){
                            $search_result = $result['soapBody']['Gds_SearchFlightV2Response']['Gds_SearchFlightV2Result'];
//                            print_r()
                            $FlightData = $search_result['FareData'];
                            $_data = array(
                                "data"=>$_REQUEST['data'],
                                "airline"=> "INTERNATIONAL",
                            );
                            if(empty($check)){
                                db_insert("tbl_session")->fields(array(
                                    "id"    => $session_key,
                                    "airline"    => "INTERNATIONAL",
                                    "value"     => serialize($FlightData),
                                    "data"     =>serialize($_data),
                                    "created"     => REQUEST_TIME,
                                    "uid"     => $user->uid,
                                ))->execute();
//                                print_r($FlightData);
//                                $departures = $FlightData['DepartureFlights'];
//                                $returns = $FlightData['ReturnFlights'];
//                                if(!empty($departures)){
                                db_insert("tbl_airline_session")->fields(array(
                                    "id"    => $session_key,
                                    "leg"    => 0,
                                    "created"    => REQUEST_TIME,
                                    "airline"    => $FlightData['AirlineCode'],
                                    "uid"     => $user->uid,
                                ))->execute();
//                                }
//                                if(!empty($returns)){
                                db_insert("tbl_airline_session")->fields(array(
                                    "id"    => $session_key,
                                    "leg"    => 1,
                                    "created"    => REQUEST_TIME,
                                    "airline"    => $FlightData['AirlineCode'],
                                    "uid"     => $user->uid,
                                ))->execute();
//                                }
                            }
                        }
                    }catch (Exception $e){

                    }
                }else{
                    $FlightData = unserialize($check->value);
                    $data['cache'] = 1;
                }

//            }else{
                $data['response'] = "OK";
//            }
//
//                $datas->AirlineCode = "VJ";
//                $VJ_result = convert_xml_to_array(cassiopeia_maybay_flight_search_by_airline($datas));
//                if(!empty($VJ_result['soapBody']['Lcc_SearchFlightAllClassByAirlineV2Response']['Lcc_SearchFlightAllClassByAirlineV2Result'])){
//                    $search_result = $VJ_result['soapBody']['Lcc_SearchFlightAllClassByAirlineV2Response']['Lcc_SearchFlightAllClassByAirlineV2Result'];
//                    $VJFlightData = $search_result['FlightData'];
//                    if(!empty($VJFlightData)){
//                        $DepartureFlights = array();
//                        if(empty($VJFlightData['DepartureFlights']['FlightFare'][0])){
//                            if(!empty($VJFlightData['DepartureFlights']['FlightFare'])){
//                                $Flight = $VJFlightData['DepartureFlights']['FlightFare'];
//                                $DepartureFlights[$Flight['ListAvailFlights']['AvailFlight']['FlightNumber']][] = $Flight;
//                            }
//                        }else{
//                            foreach($VJFlightData['DepartureFlights']['FlightFare'] as $Flight){
//                                $DepartureFlights[$Flight['ListAvailFlights']['AvailFlight']['FlightNumber']][] = $Flight;
//                            }
//                        }
//                        $ReturnFlights = array();
//                        if(empty($VJFlightData['ReturnFlights']['FlightFare'][0])){
//                            if(!empty($VJFlightData['ReturnFlights']['FlightFare'])){
//                                $Flight = $VJFlightData['ReturnFlights']['FlightFare'];
//                                $ReturnFlights[$Flight['ListAvailFlights']['AvailFlight']['FlightNumber']][] = $Flight;
//                            }
//                        }else{
//                            foreach($VJFlightData['ReturnFlights']['FlightFare'] as $Flight){
//                                $ReturnFlights[$Flight['ListAvailFlights']['AvailFlight']['FlightNumber']][] = $Flight;
//                            }
//                        }
//
//                        $VJFlights['DepartureFlights'] = $DepartureFlights;
//                        $VJFlights['ReturnFlights'] = $ReturnFlights;
//                    }
//                    $_data = array(
//                        "data"=>$_REQUEST['data'],
//                        "airline"=> $VJFlightData['AirlineCode'],
//                    );
//                    try{
//                        if(empty($check)){
//                            db_insert("tbl_session")->fields(array(
//                                "id"    => $session_key,
//                                "airline"    => $datas->AirlineCode,
//                                "value"     => serialize($VJFlights),
//                                "data"     =>serialize($_data),
//                                "created"     => REQUEST_TIME,
//                                "uid"     => $user->uid,
//                            ))->execute();
//                            $departures = $VJFlights['DepartureFlights'];
//                            $returns = $VJFlights['ReturnFlights'];
//                            if(!empty($departures)){
//                                db_insert("tbl_airline_session")->fields(array(
//                                    "id"            => $session_key,
//                                    "leg"           => 0,
//                                    "created"       => REQUEST_TIME,
//                                    "airline"       => $VJFlightData['AirlineCode'],
//                                    "uid"           => $user->uid,
//                                ))->execute();
//                            }
//                            if(!empty($returns)){
//                                db_insert("tbl_airline_session")->fields(array(
//                                    "id"            => $session_key,
//                                    "leg"           => 1,
//                                    "created"       => REQUEST_TIME,
//                                    "airline"       => $VJFlightData['AirlineCode'],
//                                    "uid"           => $user->uid,
//                                ))->execute();
//                            }
//                        }
//                    }catch (Exception $e){
//                        print_r($e);
//                    }
//
//                }
//            _print_r($FlightData);
                $data['block_filter'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/search-flight-block-filter.tpl.php",array("session_key"=>$session_key));
                $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/flight-search-table.tpl.php",array("data"=>$FlightData,"info"=>$datas));
//                _print_r($VJFlightData);
                break;
            case "render_flight" :
                $itinerary = $_REQUEST['itinerary'];
                $session_key = $_REQUEST['session_key'];
                $airline = $_REQUEST['airline'];
                $page = $_REQUEST['i'];
                $query = db_select("tbl_session","tbl_session");
                $query -> fields("tbl_session");
                $query -> condition("id",$session_key,"=");
                $query -> condition("airline",$airline,"=");
                $check = $query -> execute()->fetchObject();
//            print_r($check);
                $FlightData = unserialize($check->value);
                if($itinerary=="DepartureFlights"){
                    $items = $FlightData['DepartureFlights'];
                }else{
                    $items = $FlightData['ReturnFlights'];
                }
                $items = $items['FlightFare'];
                $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/flight-search-data-DO.tpl.php",array("items"=>$items,"info"=>unserialize($check->data),"departure"=>1,"Airline"=>$airline,"itinerary"=>$itinerary,"page"=>$page));
                break;

            case "get_min_flights" :
                $datas = json_decode($_REQUEST['data']);
                $DO = true;
                foreach($datas->lightFlight as $data_){
                    $startpoint = cassiopeia_get_airport($data_->StartPoint);
                    $endpoint = cassiopeia_get_airport($data_->EndPoint);
                    if($startpoint->country_code!="VN" || $endpoint->country_code!="VN"){
                        $DO = false;
                        break;
                    }
                }
                $result = cassiopeia_min_flight_search($datas);
                $airlines['all'] = "Tất cả";
                $fareclass['all'] = "Tất cả";
                foreach(json_decode($result)->ListFareData as $item){
                    $airlines[$item->ListFlight[0]->Airline] = cassiopeia_get_airline($item->ListFlight[0]->Airline)->name;
                    $fareclass[$item->ListFlight[0]->GroupClass] = $item->ListFlight[0]->FareClass;
                }
                $data['block_filter'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/search-flight-block-filter.tpl.php",array("airlines"=>$airlines,"GroupClass"=>$fareclass));
                if(!$DO){
                    $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/flight-search-table.tpl.php",array("data"=>json_decode($result),"info"=>$datas));
                }else{
                    $data['html'] = _cassiopeia_render_theme("module","cassiopeia","templates/parts/flight-search-table-DO.tpl.php",array("data"=>json_decode($result),"info"=>$datas));
                }
                break;
            case "add-to-cart":
                $product_id = $_REQUEST['product_id'];
                if(empty($_SESSION['cart'])){
                    $product = array();
                    $product['id'] = $product_id;
                    $product['quantity'] = 1;
                    $_SESSION['cart'][] = $product;
                    $data['check'] = 1;
                }else{
                    $data['check'] = 2;
                    $flag = false;
                    $cart = array();
                    $product = array();
                    $product['id'] = $product_id;
                    $product['quantity'] = 1;
                    foreach($_SESSION['cart'] as $item){
                        if($item['id'] == $product_id){
                            $item['quantity'] += 1;
                            $cart[] = $item;
                            $flag=true;
                        }else{
                            $cart[] = $item;
                        }
                    }
                    if($flag==false){
                        $cart[] = $product;
                    }
//                $data['cart'] = $flag;
                    $_SESSION['cart'] = $cart;
                }
                break;
            case 'airports_geturl':
                global $base_url;
                global $language;

                $data_post = $_POST;
                $validate = '';

                if (empty($data_post['TripType'])) {
                    $validate = '<p>'. t('TripType not validate.') .'</p>';
                }else {
                    if(empty($_POST['Adults'])) {
                        $validate = '<p>'. t('Adults not validate.') .'</p>';
                        if(empty($_POST['Childrens'])) {
                            $_POST['Childrens'] = 0;
                        }
                        if(empty($_POST['Infants'])) {
                            $_POST['Infants'] = 0;
                        }
                    }elseif(empty($data_post['segmens']) || !is_array($data_post['segmens'])) {
                        $validate = $validate .  '<p>'.t('Departure , Destination , Departure date, Return date not validate').'</p>';
                    }else {
                        if ($data_post['TripType'] == 'OW') {

                            if ($data_post['segmens'][0]['DepartureCode'] == '') {
                                $validate = $validate .'<p>'.t('Departure not validate.').'</p>';
                            }
                            if ($data_post['segmens'][0]['DestinationCode'] == '') {
                                $validate = $validate . '<p>'. t('DestinationCode not validate.').'</p>';
                            }
                            if ($data_post['segmens'][0]['DepartureDate'] == '') {
                                $validate = $validate . '<p>'. t('Departure date not validate.').'</p>';
                            }
                        }elseif ($data_post['TripType'] == 'RT') {

                            if (empty($data_post['segmens'][0]['DepartureCode'])) {
                                $validate = $validate .'<p>'.t('Departure not validate.').'</p>';
                            }
                            if (empty($data_post['segmens'][0]['DestinationCode'])) {
                                $validate = $validate . '<p>'. t('DestinationCode not validate.').'</p>';
                            }

                            if (!empty($data_post['segmens'][0]['DepartureCode']) && !empty($data_post['segmens'][0]['DestinationCode'])  && ($data_post['segmens'][0]['DepartureCode'] == $data_post['segmens'][0]['DestinationCode'])) {
                                $validate = $validate . '<p>'. t('Departure and Destination must not overlap.').'</p>';
                            }

                            if (empty($data_post['segmens'][0]['DepartureDate'])) {
                                $validate = $validate . '<p>'. t('Departure date not validate.').'</p>';
                            }
                            if (empty($data_post['segmens'][0]['ReturnDate'])) {
                                $validate = $validate . '<p>' .t('Return date not validate.') .'</p>';
                            }

                            if (!empty($data_post['segmens'][0]['DepartureDate']) && !empty($data_post['segmens'][0]['ReturnDate'])) {
                                $_dateParts1 = DateTime::createFromFormat('d/m/Y', $data_post['segmens'][0]['DepartureDate']);
                                $_dateParts2 = DateTime::createFromFormat('d/m/Y', $data_post['segmens'][0]['ReturnDate']);
                                if (strtotime($_dateParts1->format('Y-m-d')) > strtotime($_dateParts2->format('Y-m-d'))) {
                                    $validate = $validate . '<p>' .t('Departure Date must be greater than or equal to Return Date.') .'</p>';
                                }
                            }

                        }elseif ($data_post['TripType'] == 'MS') {
                            $_dateParts = array();

                            foreach ($data_post['segmens'] as $segmen) {
                                if (empty($segmen['DepartureCode'])) {
                                    $validate = $validate . '<p>'.t('Departure not validate.').'</p>';
                                }
                                if (empty($segmen['DestinationCode'])) {
                                    $validate = $validate . '<p>'.t('DestinationCode not validate.').'</p>';
                                }
                            }

                            foreach ($data_post['segmens'] as $segmen) {
                                if (empty($segmen['DepartureDate'])) {
                                    $validate = $validate . '<p>'.t('Departure date not validate.').'</p>';
                                }
                            }

                            foreach ($data_post['segmens'] as $segmen) {
                                if(!empty($segmen['DepartureDate'])) {
                                    $_dateParts[] = DateTime::createFromFormat('d/m/Y', $segmen['DepartureDate']);
                                }
                            }

                            if (!empty($_dateParts)) {
                                $CurentDatePart = $_dateParts[0];
                                foreach ($_dateParts as $_datePart) {
                                    if (strtotime($_datePart->format('Y-m-d')) < strtotime($CurentDatePart->format('Y-m-d'))) {
                                        $validate = $validate . '<p>'.t('The previous  Departure Date must be smaller than or equal to following Departure Date.').'</p>';
                                    }
                                    $CurentDatePart = $_datePart;
                                }
                            }
                        }
                    }
                }

                if (!empty($validate)) {
                    $data['success'] = 0;
                    $data['message'] = $validate;
                }else{
                    $data['success'] = 1;
                    $interior_airs = cassiopeia_get_airports(array('conditions'=>array('country'=>array('value'=> 'Vietnam', 'operator'=>'='))));
                    $interior_air_codes = array();
                    foreach ($interior_airs as $interior_air_key => $interior_air_value) {
                        $interior_air_codes[] = $interior_air_value->code;
                    }

                    $interior = true;
                    if ($data_post['TripType'] == 'OW') {
                        if (!in_array($data_post['segmens'][0]['DepartureCode'], $interior_air_codes) || !in_array($data_post['segmens'][0]['DestinationCode'], $interior_air_codes)) {
                            $interior = false;
                        }
                    }elseif ($data_post['TripType'] == 'RT') {
                        if (!in_array($data_post['segmens'][0]['DepartureCode'], $interior_air_codes) || !in_array($data_post['segmens'][0]['DestinationCode'], $interior_air_codes)) {
                            $interior = false;
                        }
                    }elseif ($data_post['TripType'] == 'MS') {
                        foreach ($data_post['segmens'] as $segmen) {
                            if (!in_array($segmen['DepartureCode'], $interior_air_codes) || !in_array($segmen['DestinationCode'], $interior_air_codes)) {
                                $interior = false;
                            }
                        }
                    }

                    if ($interior) {
                        if ($data_post['TripType'] == 'OW') {
                            $DepartureDate = DateTime::createFromFormat('d/m/Y', $data_post['segmens'][0]['DepartureDate']);
                            $data['message'] = $base_url.'/'.$language->language.'/search/flys/interior?Request='.$data_post['segmens'][0]['DepartureCode'].$data_post['segmens'][0]['DestinationCode'].$DepartureDate->format('dmY').'-'.$_POST['Adults'].'-'.$_POST['Childrens'].'-'.$_POST['Infants'];
                        }elseif ($data_post['TripType'] == 'RT') {
                            $DepartureDate = DateTime::createFromFormat('d/m/Y', $data_post['segmens'][0]['DepartureDate']);
                            $ReturnDate = DateTime::createFromFormat('d/m/Y', $data_post['segmens'][0]['ReturnDate']);
                            $data['message'] = $base_url.'/'.$language->language.'/search/flys/interior?Request='.$data_post['segmens'][0]['DepartureCode'].$data_post['segmens'][0]['DestinationCode'].$DepartureDate->format('dmY').'-'.$data_post['segmens'][0]['DestinationCode'].$data_post['segmens'][0]['DepartureCode'].$ReturnDate->format('dmY').'-'.$_POST['Adults'].'-'.$_POST['Childrens'].'-'.$_POST['Infants'];
                        }
                        else {
                            $data['message'] = $base_url.'/'.$language->language.'/search/flys/interior?Request=';
                            foreach ($data_post['segmens'] as $segmen) {
                                $DepartureDate = DateTime::createFromFormat('d/m/Y', $segmen['DepartureDate']);
                                $data['message'] = $data['message'] . $segmen['DepartureCode'].$segmen['DestinationCode'].$DepartureDate->format('dmY').'-';
                            }
                            $data['message'] = $data['message'] .$_POST['Adults'].'-'.$_POST['Childrens'].'-'.$_POST['Infants'];
                        }
                    }else {
                        if ($data_post['TripType'] == 'OW') {
                            $DepartureDate = DateTime::createFromFormat('d/m/Y', $data_post['segmens'][0]['DepartureDate']);
                            $data['message'] = $base_url.'/'.$language->language.'/search/flys/international?Request='.$data_post['segmens'][0]['DepartureCode'].$data_post['segmens'][0]['DestinationCode'].$DepartureDate->format('dmY').'-'.$_POST['Adults'].'-'.$_POST['Childrens'].'-'.$_POST['Infants'];
                        }elseif ($data_post['TripType'] == 'RT') {
                            $DepartureDate = DateTime::createFromFormat('d/m/Y', $data_post['segmens'][0]['DepartureDate']);
                            $ReturnDate = DateTime::createFromFormat('d/m/Y', $data_post['segmens'][0]['ReturnDate']);
                            $data['message'] = $base_url.'/'.$language->language.'/search/flys/international?Request='.$data_post['segmens'][0]['DepartureCode'].$data_post['segmens'][0]['DestinationCode'].$DepartureDate->format('dmY').'-'.$data_post['segmens'][0]['DestinationCode'].$data_post['segmens'][0]['DepartureCode'].$ReturnDate->format('dmY').'-'.$_POST['Adults'].'-'.$_POST['Childrens'].'-'.$_POST['Infants'];
                        }
                        else {
                            $data['message'] = $base_url.'/'.$language->language.'/search/flys/international?Request=';
                            foreach ($data_post['segmens'] as $segmen) {
                                $DepartureDate = DateTime::createFromFormat('d/m/Y', $segmen['DepartureDate']);
                                $data['message'] = $data['message'] . $segmen['DepartureCode'].$segmen['DestinationCode'].$DepartureDate->format('dmY').'-';
                            }
                            $data['message'] = $data['message'] .$_POST['Adults'].'-'.$_POST['Childrens'].'-'.$_POST['Infants'];
                        }
                    }

                }
                break;
            case 'popup_status':
                $_SESSION['popup_stt'] = "OFF";
                $data['response'] = "OK";
                break;
        }
    }
    return $data;
}
function cassiopeia_get_agent_rate($airline,$region_code,$agent_id){
    $query = db_select("tbl_agent_fee", "tbl_agent_fee");
    $query->fields("tbl_agent_fee");
    $query->condition("airline", $airline);
    $query->condition("region", $region_code);
    $query->condition("agent_id", $agent_id);
    $agent_fee = $query->execute()->fetchObject();
    if (!empty($agent_fee)) {

    } else {
        $query = db_select("tbl_agent_fee", "tbl_agent_fee");
        $query->fields("tbl_agent_fee");
        $query->condition("airline", $airline);
        $query->condition("region", $region_code);
        $agent_fee = $query->execute()->fetchObject();
    }
    if (!empty($agent_fee)) {
        $rate = $agent_fee->value;
    } else {
        $rate = 0;
    }
    return $rate;
}

function cassiopeia_agent_ajax_autocomplete_callback () {
    global $user;
    $string = isset($_REQUEST['string'])?trim($_REQUEST['string']):"";
    $matches = array();
    try {
        $query = db_select("users", "tbl_user");
        $query->fields("tbl_user");
        $query->join("users_roles", "tbl_role", "tbl_role.uid = tbl_user.uid");
        $query->condition("tbl_role.rid", 4);
        $query->join("field_data_field_account_transaction_name", "field_account_transaction_name", "field_account_transaction_name.entity_id=tbl_user.uid");
        $query->join("field_data_field_account_code", "field_account_code", "field_account_code.entity_id=tbl_user.uid");
        $query->addField("field_account_transaction_name", "field_account_transaction_name_value", "agent_transaction_name");
        $query->addField("field_account_code", "field_account_code_value", "agent_code");
        if(!empty($string)){
            $or = db_or();
            $or->condition("field_account_transaction_name.field_account_transaction_name_value","%".$string."%","LIKE");
            $or->condition("field_account_code.field_account_code_value","%".$string."%","LIKE");
            $or->condition("tbl_user.name","%".$string."%","LIKE");
            $query->condition($or);
        }
        $query->range(0,50);
        $result = $query->execute()->fetchAll();
        foreach ($result as $row) {
            $matches[] = array('id'=>$row->uid, 'name'=> $row->agent_transaction_name, 'code'=>$row->agent_code, 'value'=>$row->uid);
        }
    }catch (Exception $e) {

    }
    drupal_json_output($matches);
}
