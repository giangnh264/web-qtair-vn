<?php


/**
 * Implements hook_init().
 */

$GLOBALS['weather'] =  array(
    0 => array(
        'code' => 0,
        'description' =>'tornado',
        'icon' => 'wi-tornado',
    ),
    1 => array(
        'code' => 1,
        'description' =>'tropical storm',
        'icon' => 'wi-thunderstorm',
    ),
    2 => array(
        'code' => 0,
        'description' =>'hurricane',
        'icon' => 'wi-hurricane',
    ),
    3 => array(
        'code' => 0,
        'description' =>'severe thunderstorms',
        'icon' => 'wi-thunderstorm',
    ),
    4 => array(
        'code' => 0,
        'description' =>'thunderstorms',
        'icon' => 'wi-thunderstorm',
    ),
    5 => array(
        'code' => 0,
        'description' =>'mixed rain and snow',
        'icon' => 'wi-snow',
    ),
    6 => array(
        'code' => 0,
        'description' =>'mixed rain and sleet',
        'icon' => 'wi-sleet',
    ),
    7 => array(
        'code' => 0,
        'description' =>'mixed snow and sleet',
        'icon' => 'wi-sleet',
    ),
    8 => array(
        'code' => 0,
        'description' =>'freezing drizzle',
        'icon' => 'wi-rain',
    ),
    9 => array(
        'code' => 0,
        'description' =>'drizzle',
        'icon' => 'wi-rain',
    ),
    10 => array(
        'code' => 0,
        'description' =>'freezing rain',
        'icon' => 'wi-rain',
    ),
    11 => array(
        'code' => 0,
        'description' =>'showers',
        'icon' => 'wi-showers',
    ),
    12 => array(
        'code' => 0,
        'description' =>'showers',
        'icon' => 'wi-showers',
    ),
    13 => array(
        'code' => 0,
        'description' =>'snow flurries',
        'icon' => 'wi-snow',
    ),
    14 => array(
        'code' => 0,
        'description' =>'light snow showers',
        'icon' => 'wi-showers',
    ),
    15=> array(
        'code' => 0,
        'description' =>'blowing snow',
        'icon' => 'wi-snow',
    ),
    16 => array(
        'code' => 0,
        'description' =>'snow',
        'icon' => 'wi-snow',
    ),
    17 => array(
        'code' => 0,
        'description' =>'hail',
        'icon' => 'wi-hail',
    ),
    18 => array(
        'code' => 0,
        'description' =>'sleet',
        'icon' => 'wi-sleet',
    ),
    19 => array(
        'code' => 0,
        'description' =>'dust',
        'icon' => 'wi-dust',
    ),
    20 => array(
        'code' => 0,
        'description' =>'foggy',
        'icon' => 'wi-fog',
    ),
    21 => array(
        'code' => 0,
        'description' =>'haze',
        'icon' => 'wi-day-haze',
    ),
    22 => array(
        'code' => 0,
        'description' =>'smoky',
        'icon' => 'wi-fog',
    ),
    23 => array(
        'code' => 0,
        'description' =>'blustery',
        'icon' => 'wi-cloudy-windy',
    ),
    24 => array(
        'code' => 0,
        'description' =>'windy',
        'icon' => 'wi-windy',
    ),
    25 => array(
        'code' => 0,
        'description' =>'cold',
        'icon' => 'wi-snowflake-cold',
    ),
    26 => array(
        'code' => 0,
        'description' =>'cloudy',
        'icon' => 'wi-cloudy',
    ),
    27 => array(
        'code' => 0,
        'description' =>'mostly cloudy (night)',
        'icon' => 'wi-night-partly-cloudy',
    ),
    28 => array(
        'code' => 0,
        'description' =>'mostly cloudy (day)',
        'icon' => 'wi-cloudy',
    ),
    29 => array(
        'code' => 0,
        'description' =>'partly cloudy (night)',
        'icon' => 'wi-cloudy',
    ),
    30 => array(
        'code' => 0,
        'description' =>'partly cloudy (day)',
        'icon' => 'wi-cloudy',
    ),
    31 => array(
        'code' => 0,
        'description' =>'clear',
        'icon' => 'wi-night-clear',
    ),
    32 => array(
        'code' => 0,
        'description' =>'sunny',
        'icon' => 'wi-day-sunny',
    ),
    33 => array(
        'code' => 0,
        'description' =>'fair (night)',
        'icon' => '',
    ),
    34 => array(
        'code' => 0,
        'description' =>'day-sunny-overcast',
        'icon' => 'wi-day-sunny-overcast',
    ),
    35 => array(
        'code' => 0,
        'description' =>'mixed rain and hail',
        'icon' => 'wi-hail',
    ),
    36 => array(
        'code' => 0,
        'description' =>'hot',
        'icon' => 'wi-hot',
    ),
    37 => array(
        'code' => 0,
        'description' =>'isolated thunderstorms',
        'icon' => 'wi-thunderstorm',
    ),
    38 => array(
        'code' => 0,
        'description' =>'scattered thunderstorms',
        'icon' => 'wi-thunderstorm',
    ),
    39 => array(
        'code' => 0,
        'description' =>'scattered thunderstorms',
        'icon' => 'wi-thunderstorm',
    ),
    40 => array(
        'code' => 0,
        'description' =>'scattered showers',
        'icon' => 'wi-showers',
    ),
    41 => array(
        'code' => 0,
        'description' =>'heavy snow',
        'icon' => 'wi-showers',
    ),
    42 => array(
        'code' => 0,
        'description' =>'scattered snow showers',
        'icon' => 'wi-showers',
    ),
    43 => array(
        'code' => 0,
        'description' =>'heavy snow',
        'icon' => 'wi-showers',
    ),
    44 => array(
        'code' => 0,
        'description' =>'partly cloudy',
        'icon' => 'wi-cloudy',
    ),
    45 => array(
        'code' => 0,
        'description' =>'thundershowers',
        'icon' => 'wi-storm-showers',
    ),
    46 => array(
        'code' => 0,
        'description' =>'snow showers',
        'icon' => 'wi-showers',
    ),
    47 => array(
        'code' => 0,
        'description' =>'isolated thundershowers',
        'icon' => 'wi-storm-showers',
    ),
);

function cassiopeia_init() {
    drupal_add_css(drupal_get_path('module', 'cassiopeia') . '/js/libs/iziToast/iziToast.min.css');
    drupal_add_css(drupal_get_path('module', 'cassiopeia') . '/js/libs/jquery-confirm/jquery-confirm.min.css');
    drupal_add_js( drupal_get_path('module', 'cassiopeia') . '/js/libs/iziToast/iziToast.min.js');
    drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/libs/jquery-confirm/jquery-confirm.min.js');
}

//function cassiopeia_nodejs_handlers_info() {
//  return array(
//    drupal_get_path('module', 'cassiopeia') . '/js/libs/iziToast/iziToast.min.js',
//    drupal_get_path('module', 'cassiopeia') . '/js/libs/jquery-confirm/jquery-confirm.min.js',
//    drupal_get_path('module', 'cassiopeia') . '/js/nodejs.js',
//  );
//}


/**
 * Implements hook_menu().
 */
function cassiopeia_menu() {
    $items = array();
    // upgrade
    $items['event/report/%event_id'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_event_report_page_callback',
        'title' => t('Event Report'),
        'page arguments' => array(2),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['event/manager/member/delete/%event_id'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_event_member_manager_delete_page_callback',
        'title' => t('Event Member Delete'),
        'page arguments' => array(4),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['event/manager/member/excel/%event_id'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_event_member_manager_excel_page_callback',
        'title' => t('Event Member Export'),
        'page arguments' => array(4),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['event/manager/member/view/%event_id'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_event_member_manager_view_page_callback',
        'title' => t('Event Member View'),
        'page arguments' => array(4),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['event/manager/member/edit/%event_id'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_event_member_manager_edit_page_callback',
        'title' => t('Event Member Edit'),
        'page arguments' => array(4),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['event/manager/registration/edit/%event_id'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_event_registration_manager_edit_page_callback',
        'title' => t('Event Registration Edit'),
        'page arguments' => array(4),
        'access arguments' => array('access content'),
        'theme callback' => '_cassiopeia_switch_theme_',
        'file' => 'cassiopeia.inc',
    );
    $items['event/manager/events'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_event_events_manager_page_callback',
        'title' => t('Event Manager'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['event/manager/member'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_event_member_manager_page_callback',
        'title' => t('Event Members'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['event/member/add'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_event_member_add_page_callback',
        'title' => t('Add members'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['event/manager/registration'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_event_registration_manager_page_callback',
        'title' => t('Event Registration'),
        'access arguments' => array('access content'),
        'theme callback' => '_cassiopeia_switch_theme_',
        'file' => 'cassiopeia.inc',
    );
    $items['payment/booking/domestic'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_vnptpayment_init_page_callback',
        'title' => t('Hot deals'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['golf/events/search'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_golf_events_search_page_callback',
        'title' => t('Golf events'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['golf/events/sort-by-price'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_golf_events_sort_by_price_page_callback',
        'title' => t('Golf events'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['golf/events/location'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_golf_events_location_page_callback',
        'title' => t('Golf events'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['golf/events/calendar'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_golf_events_calendar_page_callback',
        'title' => t('Golf events'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['golf/events/login'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_golf_events_login_page_callback',
        'title' => t('User Login'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['golf/events/list'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_golf_events_list_page_callback',
        'title' => t('Golf events'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['golf/events'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_golf_events_page_callback',
        'title' => t('Golf events'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['vnptpayment/confirm'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_vnptpayment_confirm_page_callback',
        'title' => t('Hot deals'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['vnptpayment/complete'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_vnptpayment_complete_page_callback',
        'title' => t('Payment Complete'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['vnptpayment/cancel'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_vnptpayment_cancel_page_callback',
        'title' => t('Payment Cancel'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['hot-deals'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_hot_deals_page_callback',
        'title' => t('Hot deals'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );

    $items['upgrade/home'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_new_home_page_callback',
        'title' => t('Contact'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    //end

    $items['member-benefits'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_member_benefits_page_callback',
        'title' => t('Member benefits'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['contact'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_contact_page_callback',
        'title' => t('Contact'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['member-registration-complete'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'member_register_payment_complete',
        'title' => t('Hoàn tất'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['booking/golf/payment/online/complete'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_booking_golf_payment_complete_page_callback',
        'title' => t('Hoàn tất'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['user/register/payment'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_register_payment_page_callback',
        'title' => t('Payment'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['dangkythe'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_dangkythe',
        'title' => t('Payment'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['alegolfmember'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_dangkythe',
        'title' => t('Payment'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['developer/trung'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_trung_test_page_callback',
        'title' => t('Home'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['event/account/register'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_event_account_register_callback',
        'title' => t('Register'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['account/register'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_account_register_callback',
        'title' => t('Register'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['tour-search'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_tour_search_page_callback',
        'title' => t('Tìm kiếm'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['home'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_home_page_callback',
        'title' => t('Home'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['admin/manager/restore-teetime'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_restore_teetime_callback',
        'title' => t('Restore Teetimes'),
        'access callback' => 'cassiopeia_dashboard_restore_teetime_accept',
        'access arguments' => array('cassiopeia module'),
//        'access arguments' => array('cassiopeia customers'),
        'file' => 'cassiopeia.inc',
        'theme callback'=> '_cassiopeia_admin_theme'
    );
    $items['admin/manager/hotdeals/create'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_hotdeal_create_page',
        'title' => t('Tạo nhiều hotdeals'),
        'access arguments' => array('cassiopeia module'),
        'file' => 'cassiopeia.inc',
        'theme callback'=> '_cassiopeia_admin_theme'
    );
    $items['admin/manager/hotdeal/config'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_hotdeal_config_page_callback',
        'title' => t('Cấu hình hotdeal'),
        'access arguments' => array('cassiopeia module'),
        'file' => 'cassiopeia.inc',
        'theme callback'=> '_cassiopeia_admin_theme'
    );
    $items['admin/manager/golf/comment'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_golf_comment_page_callback',
        'title' => t('Nhận xét sân golf'),
        'access arguments' => array('cassiopeia module'),
//        'access arguments' => array('cassiopeia customers'),
        'file' => 'cassiopeia.inc',
        'theme callback'=> '_cassiopeia_admin_theme'
    );
    $items['admin/manager/promotion/edit/%promotion_code'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_promotion_code_edit_callback',
        'title' => t('Sửa mã giảm giá'),
        'access arguments' => array('cassiopeia module'),
        'page arguments' => array(4),
        'file' => 'cassiopeia.inc',
        'theme callback'=> '_cassiopeia_admin_theme'
    );
    $items['admin/manager/promotion/delete/%promotion_code'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_promotion_code_delete_callback',
        'title' => t('Xóa mã giảm giá'),
        'access arguments' => array('cassiopeia module'),
        'page arguments' => array(4),
        'file' => 'cassiopeia.inc',
        'theme callback'=> '_cassiopeia_admin_theme'
    );
    $items['admin/cassiopeia/event/config'] = array(
        'type' => MENU_NORMAL_ITEM,
        'title' => t("Event Config"),
        'page callback' => array('drupal_get_form'),
        'page arguments' => array('cassiopeia_event_config_form'),
        'access arguments' => array('cassiopeia module'),
        'file' => 'cassiopeia.inc',
    );
    $items['admin/cassiopeia/hotdeal/banner/config'] = array(
        'type' => MENU_NORMAL_ITEM,
        'title' => t('Banner trang hotdeals'),
        'page callback' => array('drupal_get_form'),
        'page arguments' => array('cassiopeia_hotdeal_banner_config_form'),
        'access arguments' => array('cassiopeia module'),
        'file' => 'cassiopeia.inc',
    );
    $items['admin/manager/payment/config'] = array(
        'type' => MENU_NORMAL_ITEM,
        'title' => t('Thanh toán'),
        'page callback' => array('drupal_get_form'),
        'page arguments' => array('cassiopeia_payment_config_form'),
        'access arguments' => array('cassiopeia module'),
        'file' => 'cassiopeia.inc',
    );
    $items['admin/manage/promotion_group'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_promotion_group_page_callback',
        'title' => t('Nhóm mã giảm giá'),
        'access callback' => 'cassiopeia_dashboard_customer_accep',
//        'access arguments' => array('cassiopeia customers'),
        'file' => 'cassiopeia.inc',
        'theme callback'=> '_cassiopeia_admin_theme'
    );
    $items['admin/manager/membership/extension'] = array(
        'type' => MENU_NORMAL_ITEM,
        'title' => t('Đăng ký gia hạn hội viên'),
        'page callback' => 'cassiopeia_membership_extension_callback',
        'access arguments' => array('cassiopeia module'),
        'file' => 'cassiopeia.inc',
    );
    $items['admin/manage/promotion_group/edit/%promotion_group_code'] = array(
        'type' => MENU_NORMAL_ITEM,
        'title' => t('Sửa nhóm mã giảm giá'),
        'page arguments' => array(4),
        'page callback' => 'cassiopeia_edit_promotion_group_form',
        'access arguments' => array('cassiopeia module'),
        'file' => 'cassiopeia.inc',
    );
    $items['admin/manage/promotion_group/delete/%promotion_group_code'] = array(
        'type' => MENU_NORMAL_ITEM,
        'title' => t('Xóa nhóm mã giảm giá'),
        'page arguments' => array(4),
        'page callback' => 'cassiopeia_delete_promotion_group_form',
        'access arguments' => array('cassiopeia module'),
        'file' => 'cassiopeia.inc',
    );
//    $items['tag/%term_id'] = array(
//        'type' => MENU_CALLBACK,
//        'page callback' => 'cassiopeia_tag_page_callback',
//        'title' => t('Tags'),
//        'page arguments' => array(1),
//        'access arguments' => array('access content'),
//        'file' => 'cassiopeia.inc',
//    );
    $items['user/agency/login'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_user_admin_login_page_callback',
        'title' => t('Agency'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['user/admin/login'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_user_admin_login_page_callback',
        'title' => t('Admin'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
//    $items['introduction'] = array(
//        'type' => MENU_CALLBACK,
//        'page callback' => 'cassiopeia_introduction_page_callback',
//        'title' => t('Introduction'),
//        'access arguments' => array('access content'),
//        'file' => 'cassiopeia.inc',
//    );
    $items['user/booking/reminder'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_golf_booking_reminder_page_callback',
        'title' => t('Notification'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['user/friends/list'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_list_of_friend_page_callback',
        'title' => t('Friends'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['search'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_search_result_page_callback',
        'title' => t('Search result'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['quick-search'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_quick_search_form_callback',
        'title' => t('Search result'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['tour-booking'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_tour_booking_callback',
        'page arguments' => array(2),
        'title' => t('Tour Booking'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['golf-tour'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_golf_tours_page_callback',
        'title' => t('Golf tour'),
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );

    $items['dashboard'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_dashboard_page_callback',
        'title' => t('Dashboard'),
        'access callback' => 'cassiopeia_dashboard_accep',
        'file' => 'cassiopeia.inc',
        'theme callback'=> '_cassiopeia_admin_theme'
    );
    $items['manager/utility'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_manager_utility_page_callback',
        'title' => t('Utility'),
        'access callback' => 'cassiopeia_manager_add_utilitie_accep',
        'file' => 'cassiopeia.inc',
        'theme callback'=> '_cassiopeia_admin_theme'
    );
    $items['admin/manager/backup/delete'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_manager_delete_backup_callback',
        'title' => t('Delete backup'),
        'access callback' => 'cassiopeia_dashboard_accep',
        'file' => 'cassiopeia.inc',
        'theme callback'=> '_cassiopeia_admin_theme'
    );
    $items['admin/manager/customer'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_customer_manager_page_callback',
        'title' => t('Khách hàng'),
        'access callback' => 'cassiopeia_dashboard_customer_accep',
//        'access arguments' => array('cassiopeia customers'),
        'file' => 'cassiopeia.inc',
        'theme callback'=> '_cassiopeia_admin_theme'
    );
    $items['admin/manager/promotion_code'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_manage_promotion_code_page_callback',
        'title' => t('Promotion code'),
        'access callback' => 'cassiopeia_dashboard_accep',
        'file' => 'cassiopeia.inc',
        'theme callback'=> '_cassiopeia_admin_theme'
    );
    $items['admin/config/cassiopeia/pop-up'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_pop_up_config_page',
        'title' => t('Pop-up'),
        'access callback' => 'cassiopeia_dashboard_accep',
        'file' => 'cassiopeia.inc',
        'theme callback'=> '_cassiopeia_admin_theme'
    );
    $items['admin/config/cassiopeia'] = array(
        'title' => 'Cassiopeia',
        'description' => 'Cassiopeia tools.',
        'page callback' => 'system_admin_menu_block_page',
        'access arguments' => array('cassiopeia module'),
        'file' => 'system.admin.inc',
        'file path' => drupal_get_path('module', 'system'),
    );

    $items['admin/manager/golf/comment/delete/%golf_comment_id'] = array(
        'type' => MENU_NORMAL_ITEM,
        'title' => t('Hoàn thành'),
        'page arguments' => array(5),
        'page callback' => 'cassiopeia_admin_golf_comment_delete_form',
        'access arguments' => array('cassiopeia module'),
        'file' => 'cassiopeia.inc',
    );
    $items['admin/manager/membership/extension/finish/%membership'] = array(
        'type' => MENU_NORMAL_ITEM,
        'title' => t('Hoàn thành'),
        'page arguments' => array(5),
        'page callback' => 'cassiopeia_admin_membership_extension_finish_form',
        'access arguments' => array('cassiopeia module'),
        'file' => 'cassiopeia.inc',
    );
    $items['admin/manager/membership/extension/cancel/%membership'] = array(
        'type' => MENU_NORMAL_ITEM,
        'title' => t('Hủy yêu cầu'),
        'page arguments' => array(5),
        'page callback' => 'cassiopeia_admin_membership_extension_cancel_form',
        'access arguments' => array('cassiopeia module'),
        'file' => 'cassiopeia.inc',
    );
    $items['admin/config/mail_form'] = array(
        'type' => MENU_NORMAL_ITEM,
        'title' => t('Cấu hình gửi mail'),
        'page callback' => array('drupal_get_form'),
        'page arguments' => array('cassiopeia_mail_config_form'),
        'access arguments' => array('cassiopeia module'),
        'file' => 'cassiopeia.inc',
    );
    $items['admin/config/cassiopeia/general'] = array(
        'type' => MENU_NORMAL_ITEM,
        'title' => t('General configuration'),
        'page callback' => array('drupal_get_form'),
        'page arguments' => array('cassiopeia_config_form'),
        'access arguments' => array('cassiopeia module'),
        'file' => 'cassiopeia.inc',
    );
    $items['admin/config/cassiopeia/contact'] = array(
        'type' => MENU_NORMAL_ITEM,
        'title' => t('Contact page configuration'),
        'page callback' => array('drupal_get_form'),
        'page arguments' => array('cassiopeia_contact_config_form'),
        'access arguments' => array('cassiopeia module'),
        'file' => 'cassiopeia.inc',
    );
    $items['admin/config/cassiopeia/introduction_config'] = array(
        'type' => MENU_NORMAL_ITEM,
        'title' => t('Introduction page configuration'),
        'page callback' => array('drupal_get_form'),
        'page arguments' => array('cassiopeia_introduction_config_form'),
        'access arguments' => array('cassiopeia module'),
        'file' => 'cassiopeia.inc',
    );


    $items['admin/config/cassiopeia/create-promotion-cards'] = array(
        'type' => MENU_NORMAL_ITEM,
        'title' =>'Tạo thẻ giảm giá',
        'page callback' => array('drupal_get_form'),
        'page arguments' => array('cassiopeia_create_promotion_cards_form'),
        'access arguments' => array('cassiopeia module'),
    );


    $items['admin/manager/namespace'] = array(
        'type' => MENU_NORMAL_ITEM,
        'title' => t('Namespace'),
        'page callback' => 'cassiopeia_admin_manager_namespace_page',
        'access arguments' => array('cassiopeia module'),
        'file' => 'cassiopeia.inc',
    );


    $items['manager/add/golf-booking'] = array(
        'type' => MENU_NORMAL_ITEM,
        'title' => 'Thêm mới booking',
        'page callback' => 'cassiopeia_golf_add_booking_page',
        'access callback' => 'cassiopeia_manager_add_golf_booking_accep',
        'file' => 'cassiopeia.inc',
    );

    $items['manager/edit/golf-booking/%golf_booking'] = array(
        'type' => MENU_NORMAL_ITEM,
        'title' => 'Cập nhật booking',
        'page callback' => 'cassiopeia_golf_edit_booking_page',
        'page arguments' => array(3),
        'access arguments' => array(3),
        'access callback' => 'cassiopeia_manager_edit_golf_booking_accep',
        'file' => 'cassiopeia.inc',
    );
    $items['manager/change/golf-booking/%golf_booking'] = array(
        'type' => MENU_NORMAL_ITEM,
        'title' => 'Thay đổi đơn hàng',
        'page callback' => 'cassiopeia_golf_change_booking_page',
        'page arguments' => array(3),
        'access callback' => 'cassiopeia_manager_accep',
        'file' => 'cassiopeia.inc',
    );

    $items['admin/manager/namespace/add'] = array(
        'type' => MENU_NORMAL_ITEM,
        'title' => t('Namespace'),
        'page callback' => array('drupal_get_form'),
        'page arguments' => array('cassiopeia_namespace_add_form'),
        'access arguments' => array('cassiopeia module'),
    );

    $items['vnpay'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_vnpay_page',
        'delivery callback' => 'drupal_json_output',
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );
    $items['cassiopeia/ajax'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_ajax_page',
        'delivery callback' => 'drupal_json_output',
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );

    $items['cassiopeia/test'] = array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_test_page',
        'access arguments' => array('access content'),
        'file' => 'cassiopeia.inc',
    );

    $items['manager'] = array(
        'type' => MENU_NORMAL_ITEM,
        'title' => t('Manager'),
        'access callback' => 'cassiopeia_manager_accep',
        'theme callback'=> '_cassiopeia_admin_theme'
    );

    $items['manager/add-tea-times']= array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_add_tea_times_page_callback',
        'title' => t('Add tee times'),
        'access callback' => 'cassiopeia_manager_accep',
        'file' => 'cassiopeia.inc',
    );
    $items['manager/remove-tea-times']= array(
        'type' => MENU_CALLBACK,
        'page callback' => 'cassiopeia_remove_tea_times_page_callback',
        'title' => t('Remove tee times'),
        'access callback' => 'cassiopeia_manager_accep',
        'file' => 'cassiopeia.inc',
    );

    $items['manager/tea-times'] = array(
        'type' => MENU_CALLBACK,
        'title' => 'Danh sách tee times',
        'page callback' => 'cassiopeia_manager_tea_times_page',
        'access callback' => 'cassiopeia_manager_tee_time_accep',
        'file' => 'cassiopeia.inc',
    );
    $items['admin/manager/report/daily'] = array(
        'type' => MENU_CALLBACK,
        'title' => t('Daily report'),
        'page callback' => 'cassiopeia_daily_report_page',
        'access callback' => 'cassiopeia_manager_daily_report_accep',
        'file' => 'cassiopeia.inc',
        'theme callback'=> '_cassiopeia_admin_theme'
    );

    $items['manager/tea-time-details'] = array(
        'type' => MENU_CALLBACK,
        'title' => 'Danh sách tee times',
        'page callback' => 'cassiopeia_manager_tea_time_details_page',
        'access callback' => 'cassiopeia_manager_accep',
        'file' => 'cassiopeia.inc',
    );

    $items['manager/golfs'] = array(
        'type' => MENU_CALLBACK,
        'title' => 'Danh sách sân/zone',
        'page callback' => 'cassiopeia_manager_golfs_page',
        'access callback' => 'cassiopeia_manager_accep',
        'file' => 'cassiopeia.inc',
    );

    $items['golf/booking/complete/%booking_code'] = array(
        'type' => MENU_CALLBACK,
        'title' => 'Booking complete',
        'page callback' => 'cassiopeia_golf_booking_page_complete',
        'access arguments' => array('access content'),
        'page arguments' => array(3),
        'file' => 'cassiopeia.inc',
    );
    $items['booking/event/%event_id'] = array(
        'type' => MENU_CALLBACK,
        'title' => 'Booking complete',
        'page callback' => 'cassiopeia_booking_event_page',
        'access arguments' => array('access content'),
        'page arguments' => array(2),
        'file' => 'cassiopeia.inc',
    );
    $items['golf/booking/%booking_code'] = array(
        'type' => MENU_CALLBACK,
        'title' => 'Booking',
        'page callback' => 'cassiopeia_golf_booking_page',
        'access arguments' => array('access content'),
        'page arguments' => array(2),
        'file' => 'cassiopeia.inc',
    );
    $items['booking/golf/%session_golf_booking'] = array(
        'type' => MENU_CALLBACK,
        'title' => 'Booking',
        'page callback' => 'cassiopeia_booking_golfs_page',
        'access arguments' => array('access content'),
        'page arguments' => array(2),
        'file' => 'cassiopeia.inc',
    );
    $items['booking/golf/%session_golf_booking_complete/complete'] = array(
        'type' => MENU_CALLBACK,
        'title' => 'Booking',
        'page callback' => 'cassiopeia_booking_golfs_complete_page',
        'access arguments' => array('access content'),
        'page arguments' => array(2),
        'file' => 'cassiopeia.inc',
    );

    $items['manager/booking/golf_bookings'] = array(
        'type' => MENU_CALLBACK,
        'title' => 'Golf booking',
        'page callback' => 'cassiopeia_manager_golf_bookings_page',
        'access arguments' => array('access content'),
        'access callback' => 'cassiopeia_manager_golf_bookings_access',
        'page arguments' => array(2),
        'file' => 'cassiopeia.inc',
    );
    $items['manager/booking/tour_bookings'] = array(
        'type' => MENU_CALLBACK,
        'title' => 'Tour Booking',
        'page callback' => 'cassiopeia_manager_tour_bookings_page',
        'access callback' => 'manage_tour_booking_accept',
//        'page arguments' => array(2),
        'file' => 'cassiopeia.inc',
    );
    $items['admin/tour-booking/edit/%tour_booking_code'] = array(
        'type' => MENU_CALLBACK,
        'title' => 'Sửa đơn hàng đặt tour',
        'page arguments' => array(3),
        'access arguments' => array(3),
        'page callback' => 'cassiopeia_manager_tour_booking_edit_page',
        'access callback' => 'tour_booking_edit_accept',
        'file' => 'cassiopeia.inc',
    );

    $items['manager/golf/add/utilitie'] = array(
        'type' => MENU_CALLBACK,
        'title' => 'Thêm mới tiên ích',
        'page callback' => array('drupal_get_form'),
        'page arguments' => array('cassiopeia_golf_add_utilitie_form'),
        'access callback' => 'cassiopeia_manager_add_utilitie_accep',
        'theme callback'=> '_cassiopeia_admin_theme'
    );

    $items['manager/golf/utility/delete/%golf_utilitie'] = array(
        'type' => MENU_CALLBACK,
        'title' => 'Xóa tiện ích',
        'page callback' => array('cassiopeia_golf_utility_delete_page'),
        'page arguments' => array(4),
        'access callback' => 'cassiopeia_manager_ultility_accept',
        'access arguments' => array(4),
        'file' => 'cassiopeia.inc',
    );
    $items['manager/golf/utilitie/edit/%golf_utilitie'] = array(
        'type' => MENU_CALLBACK,
        'title' => 'Sửa tiện ích',
        'page callback' => array('cassiopeia_golf_utilitie_edit_page'),
        'page arguments' => array(4),
        'access callback' => 'cassiopeia_manager_ultility_accept',
        'access arguments' => array(4),
        'file' => 'cassiopeia.inc',
    );

    $items['manager/autocomplete/user'] = array(
        'type' => MENU_CALLBACK,
        'title' => 'Autocomplete usser',
        'page callback' => 'cassiopeia_admin_autocomplete_complete_user',
        'access callback' => 'cassiopeia_manager_accep',
    );
    $items['manager/autocomplete/search_golf_key'] = array(
        'type' => MENU_CALLBACK,
        'title' => 'Autocomplete usser',
        'page callback' => 'cassiopeia_admin_autocomplete_complete_search_golf_key',
        'access arguments' => array('access content'),
    );

    $items['admin/change-user-score'] = array(
        'title' => 'Quản lý điểm thưởng',
        'page callback' => array('drupal_get_form'),
        'page arguments' => array('cassiopeia_change_user_score_form'),
        'access arguments' => array('cassiopeia module'),

    );
    $items['admin/payment/booking/config'] = array(
        'title' => 'Nội dung VietinBank',
        'page callback' => array('drupal_get_form'),
        'page arguments' => array('cassiopeia_payment_booking_config_form'),
        'access arguments' => array('cassiopeia module'),
        'file' => 'cassiopeia.inc',
    );
    $items['admin/member/benefit'] = array(
        'title' => 'Quyền lợi hội viên',
        'page callback' => array('drupal_get_form'),
        'page arguments' => array('cassiopeia_member_benefit_config_form'),
        'access arguments' => array('cassiopeia module'),
        'file' => 'cassiopeia.inc',
    );
    $items['admin/cassiopeia/button/event'] = array(
        'title' => 'Nút Event nổi bật',
        'page callback' => array('drupal_get_form'),
        'page arguments' => array('cassiopeia_btn_event_config_form'),
        'access arguments' => array('cassiopeia module'),
        'file' => 'cassiopeia.inc',
    );
    $items['admin/manager/import_tea_times'] = array(
        'type' => MENU_NORMAL_ITEM,
        'title' => 'import tee times',
        'page callback' => array('drupal_get_form'),
        'page arguments' => array('cassiopeia_import_update_tea_times_excell_form'),
        'access arguments' => array('cassiopeia module'),
    );
    return $items;
}
function booking_code_load($booking_code){
    return $booking_code;
}
function event_id_load($event_id){
    return $event_id;
}
function promotion_code_load($code){
    return $code;
}
function golf_comment_id_load($id){
    $query = db_select("tbl_rating_comment","tbl_rating_comment");
    $query -> fields("tbl_rating_comment");
    $query -> condition("id",$id,"=");
    $result = $query -> execute() -> fetchAssoc();
    return $result;
}
function membership_load($id){
    $query = db_select("tbl_membership_extension","tbl_membership_extension");
    $query -> fields("tbl_membership_extension");
    $query -> condition("id",$id,"=");
    $result = $query -> execute() -> fetchAssoc();
    return $result;
}
function manage_tour_booking_accept(){
    global $user;
//    print_r($user);die;
    $access = false;
    if(user_has_role(3,$user) || user_has_role(6,$user)){
        $access = true;
    }elseif(user_has_role(7,$user) && (user_access("edit tour booking") || user_access("delete tour booking"))){
        $access = true;
    }
    return $access;


}

function cassiopeia_manager_tee_time_accep(){
//    print(1);die;
    global $user;

    $access = FALSE;
    if(user_has_role(3, $user) ||  user_has_role(6, $user)) {
        $access = TRUE;
    }elseif (user_has_role(4, $user)) {
        $_user = user_load($user->uid);
        $golfs = cassiopeia_get_golfs_by_condition(array('condition'=> array('status'=>array('value'=>1, 'operator'=>"="))));
        if (!empty($_user->field_namespace['und'][0]['value'])) {
            foreach ($golfs as $key => $value) {
                if (!empty($value->field_namespace['und'][0]['value']) && ($value->field_namespace['und'][0]['value'] == $_user->field_namespace['und'][0]['value'])) {
                    $access = TRUE;
                    break;
                }
            }
        }

    }elseif (user_has_role(5, $user)) {
        $_user = user_load($user->uid);
        $golfs = cassiopeia_get_golfs_by_condition(array('condition'=> array('status'=>array('value'=>1, 'operator'=>"="))));

        if (!empty($_user->field_namespace['und'][0]['value'])) {
            foreach ($golfs as $key => $value) {

                if (!empty($value->field_namespace['und'][0]['value']) && ($value->field_namespace['und'][0]['value'] == $_user->field_namespace['und'][0]['value']) && user_access('create new tee time of golf '.$value->nid)) {

                    $access = TRUE;
                    break;
                }
            }
        }
    }

    return $access;
}
function tour_booking_edit_accept(){
    global $user;
    $access = false;
    if(user_has_role(3,$user) || user_has_role(6,$user)){
        $access = true;
    }elseif(user_has_role(7,$user) && user_access("edit tour booking")){
        $access = true;
    }
    return $access;
}
function tour_booking_delete_accept(){
    global $user;
    $access = false;
    if(user_has_role(3,$user) || user_has_role(6,$user)){
        $access = true;
    }elseif(user_has_role(7,$user) && user_access("delete tour booking")){
        $access = true;
    }
    return $access;
}
function cassiopeia_dashboard_restore_teetime_accept(){
    global $user;
    $access = false;
    if(user_has_role(3,$user) || user_has_role(4,$user) || user_has_role(6,$user)){
        $access = true;
    }
    return $access;
}
function cassiopeia_dashboard_customer_accep(){
    global $user;
    $access = false;
    if(user_has_role(3,$user) || user_has_role(4,$user) || user_has_role(6,$user)){
        $access = true;
    }else{
        if(user_has_role(7,$user) || user_has_role(5,$user)){
            if(user_access("customers",$user)){
                $access = true;
            }
        }
    }
    return $access;
}
function cassiopeia_manager_daily_report_accep(){
    global $user;
    $access = false;
    if(user_has_role(3,$user) || user_has_role(4,$user) || user_has_role(6,$user)){
        $access = true;
    }else{
        if(user_has_role(7,$user) || user_has_role(5,$user)){
            if(user_access("reports",$user)){
                $access = true;
            }
        }
    }
    return $access;
}
function cassiopeia_manager_utility_accep(){
    global $user;
    $access = FALSE;
    if(user_has_role(3, $user) || user_has_role(7, $user) || user_has_role(6, $user)) {
        $access = TRUE;
    }elseif (user_has_role(4, $user)) {
        $access = TRUE;
    }elseif (user_has_role(5, $user)) {
        $_user = user_load($user->uid);
        $golfs = cassiopeia_get_golfs_by_condition(array('condition'=> array('status'=>array('value'=>1, 'operator'=>"="))));
        foreach ($golfs as $golf_key => $golf_value) {
            if (!empty($golf_value->field_namespace['und'][0]['value']) && ($golf_value->field_namespace['und'][0]['value'] == $_user->field_namespace['und'][0]['value']) && user_access('create sevice of namespaces '.$golf_value->nid)) {
                $access = TRUE;
            }
        }
    }
    return $access;
}

function cassiopeia_manager_add_utilitie_accep () {
    global $user;
    $access = FALSE;
    if(user_has_role(3, $user) || user_has_role(7, $user) || user_has_role(6, $user)) {
        $access = TRUE;
    }elseif (user_has_role(4, $user)) {
        $access = TRUE;
    }elseif (user_has_role(5, $user)) {
        $_user = user_load($user->uid);
        $namespaces = _cassiopeia_get_all_namespace ();
        foreach ($namespaces as $namespace_key => $namespace_value) {
            if (!empty($namespace_value->id) && ($namespace_value->id == $_user->field_namespace['und'][0]['value']) && user_access('create sevice of namespaces '.$namespace_value->id)) {
                $access = TRUE;
            }
        }
    }
    return $access;
}

function cassiopeia_manager_add_golf_booking_accep() {
    global $user;
    $access = FALSE;
    if(user_has_role(3, $user) || user_has_role(7, $user) || user_has_role(6, $user)) {
        $access = TRUE;
    }elseif (user_has_role(4, $user)) {
        $access = TRUE;
    }elseif (user_has_role(5, $user)) {
        $_user = user_load($user->uid);
        $golfs = cassiopeia_get_golfs_by_condition(array('condition'=> array('status'=>array('value'=>1, 'operator'=>"="))));
        foreach ($golfs as $golf_key => $golf_value) {
            if (!empty($golf_value->field_namespace['und'][0]['value']) && ($golf_value->field_namespace['und'][0]['value'] == $_user->field_namespace['und'][0]['value']) && user_access('create booking of golf '.$golf_value->nid)) {
                $access = TRUE;
            }
        }
    }
    return $access;

}

function cassiopeia_manager_edit_golf_booking_accep ($booking = null) {
    global $user;
    $access = FALSE;
    if(user_has_role(3, $user) || user_has_role(7, $user) || user_has_role(6, $user)) {
        $access = TRUE;
    }elseif (user_has_role(4, $user)) {
        $_user = user_load($user->uid);
        if(!empty($booking->golfId) && !empty($_user->field_namespace['und'][0]['value'])) {
            $golf = node_load($booking->golfId);
            if (!empty($golf->nid)) {
                if (!empty($golf->field_namespace['und'][0]['value']) && ($golf->field_namespace['und'][0]['value'] == $_user->field_namespace['und'][0]['value'])) {
                    $access = TRUE;
                }
            }
        }
    }elseif (user_has_role(5, $user)) {
        $_user = user_load($user->uid);
        if(!empty($booking->golfId) && !empty($_user->field_namespace['und'][0]['value'])) {
            $golf = node_load($booking->golfId);
            if (!empty($golf->nid)) {
                if (!empty($golf->field_namespace['und'][0]['value']) && ($golf->field_namespace['und'][0]['value'] == $_user->field_namespace['und'][0]['value']) && user_access('edit booking of golf '.$golf->nid)) {
                    $access = TRUE;
                }
            }
        }
    }
    return $access;
}


function cassiopeia_manager_golf_bookings_access() {
    global $user;

    $access = FALSE;
    if(user_has_role(3, $user) || user_has_role(7, $user) || user_has_role(6, $user)) {
        $access = TRUE;
    }elseif (user_has_role(4, $user)) {
        $_user = user_load($user->uid);
        $golfs = cassiopeia_get_golfs_by_condition(array('condition'=> array('status'=>array('value'=>1, 'operator'=>"="))));
        if (!empty($_user->field_namespace['und'][0]['value'])) {
            foreach ($golfs as $key => $value) {
                if (!empty($value->field_namespace['und'][0]['value']) && ($value->field_namespace['und'][0]['value'] == $_user->field_namespace['und'][0]['value'])) {
                    $access = TRUE;
                    break;
                }
            }
        }

    }elseif (user_has_role(5, $user)) {
        $_user = user_load($user->uid);
        $golfs = cassiopeia_get_golfs_by_condition(array('condition'=> array('status'=>array('value'=>1, 'operator'=>"="))));

        if (!empty($_user->field_namespace['und'][0]['value'])) {
            foreach ($golfs as $key => $value) {

                if (!empty($value->field_namespace['und'][0]['value']) && ($value->field_namespace['und'][0]['value'] == $_user->field_namespace['und'][0]['value']) && user_access('view booking of golf '.$value->nid)) {

                    $access = TRUE;
                    break;
                }
            }
        }
    }

    return $access;
}

function golf_booking_load($golf_booking){
    $booking = cassiopeia_get_golf_booking_by_code($golf_booking);
    return $booking;
}
function promotion_group_code_load($code){
//    print($code);
    $query = db_select("promotion","tbl_promotion");
    $query -> fields("tbl_promotion");
    $query -> groupBy("tbl_promotion.created");
    $query -> condition("tbl_promotion.created",$code,"=");
    $result = $query -> execute() -> fetchAssoc();
    return $result;
}
function tour_booking_code_load($code){
    return $code;
}

function cassiopeia_admin_autocomplete_complete_user ($string) {
    $matches = array();
    $query = db_select("users","users");
    $query->fields('users', array('uid','name', 'mail','status'));
    $query->join('field_data_field_account_full_name', 'field_data_field_account_full_name', 'field_data_field_account_full_name.entity_id = users.uid');
    $query->fields('field_data_field_account_full_name');
    $query->join('field_data_field_account_phone', 'field_data_field_account_phone', 'field_data_field_account_phone.entity_id = users.uid');
    $query->fields('field_data_field_account_phone');
    $query->where('CONCAT(users.name,users.mail,field_data_field_account_full_name.field_account_full_name_value,field_data_field_account_phone.field_account_phone_value) LIKE :string', array(':string'=>'%'.$string.'%'));
    $res = $query->execute()->fetchAll();
    foreach ($res as $key => $value) {
        $matches[check_plain($value->field_account_full_name_value) . ' - ' .check_plain($value->mail). ' - ' .check_plain($value->field_account_phone_value).' - [uid:'.$value->uid.']'] =  _cassiopeia_render_theme('module', 'cassiopeia', 'templates/pages/cassiopeia_autocomplete_complete_user_item.tpl.php', array('user'=>$value));
    }
    drupal_json_output($matches);
}
function cassiopeia_admin_autocomplete_complete_search_golf_key ($string) {
    $matches = array();
    $query = db_select("node","ctype_golf");
    $query->condition("type","ctype_golf");
    $query->fields('ctype_golf', array("title","nid"));
    $query->join('field_data_field_ctype_golf_address', "field_address","field_address.entity_id = ctype_golf.nid");
    $query->join('field_data_field_tx_area', "field_tx_area","field_tx_area.entity_id = ctype_golf.nid");
    $query->fields('field_tx_area', array("field_tx_area_tid"));
    $query->join('taxonomy_term_data', "taxonomy_term_data","field_tx_area.field_tx_area_tid = taxonomy_term_data.tid");
    $query->fields('taxonomy_term_data', array("name"));
//    $query->addExpression('CONCAT(ctype_golf.title,field_address.field_ctype_golf_address_value)', 'search_key');
    $query->where('CONCAT(ctype_golf.title,field_address.field_ctype_golf_address_value,taxonomy_term_data.name) LIKE :string', array(':string'=>'%'.$string.'%'));
//    print((string)$query))
    $query -> groupBy("ctype_golf.nid");
    $res = $query->execute()->fetchAll();
    $result = "";
    foreach ($res as $key => $value) {
        $golf = node_load($value->nid);
        $matches[$value->title] =  _cassiopeia_render_theme("module","cassiopeia","templates/pages/cassiopeia_autocomplete_complete_search_golf_item.tpl.php",array("golf"=>$golf));
        $result.= _cassiopeia_render_theme("module","cassiopeia","templates/pages/cassiopeia_autocomplete_complete_search_golf_item.tpl.php",array("golf"=>$golf));;
    }
    if(empty($matches)){
        $matches[''] = "Không có kết quả phù hợp";
    }
    return $result;
}


function golf_utilitie_load($utilitie) {
    if(is_object($utilitie)) {
        return $utilitie;
    }else {
        return cassiopeia_get_golf_utility_by_id($utilitie);
    }
}

function session_golf_booking_load($session) {
    $data = null;
    if(!empty($_SESSION['booking_golf'][$session])) {
        $data = $_SESSION['booking_golf'][$session];
        $data['key'] = $session;
    }
    return $data;
}

function session_golf_booking_complete_load($session) {
    $data = null;
    if(!empty($_SESSION['booking_golf_complete'][$session])) {
        $data = $_SESSION['booking_golf_complete'][$session];
        $data['key'] = $session;
    }
    return $data;
}

/**
 * Implements hook_permission().
 */

function cassiopeia_permission() {
    return array(
        'cassiopeia module' => array(
            'title' => t('cassiopeia module'),
            'description' => t('Access for Cassiopeia module'),
        ),
    );
}

function _cassiopeia_admin_theme_() {
    $arg = arg();
    $node = node_load($arg[1]);
    if ($node->type == 'ctype_tea_time') {
        return 'cassiopeia_admin_theme';
    }
}
function _cassiopeia_switch_theme_() {
    global $user;
//    print_r($user);
//    die;
//    $arg = arg();
//    $node = node_load($arg[1]);
    if(user_has_role(58,$user) && !user_has_role(3,$user)){
        return 'cassiopeia_theme';
    }else{
        return 'cassiopeia_admin_theme';
    }
}

function _cassiopeia_admin_theme() {
    return 'cassiopeia_admin_theme';
}

function cassiopeia_dashboard_accep () {
    if (user_has_role(5) || user_has_role(4) || user_has_role(3) || user_has_role(6) || user_has_role(7)) {
        return TRUE;
    }else {
        return FALSE;
    }
}

function cassiopeia_manager_accep () {
    if (user_has_role(5) || user_has_role(4) || user_has_role(3) || user_has_role(6) || user_has_role(7)) {
        return TRUE;
    }else {
        return FALSE;
    }
}
function _cassiopeia_create_event_access () {
    global $user;
    if (user_has_role(58,$user)) {
        return TRUE;
    }else {
        return FALSE;
    }
}
function _cassiopeia_update_event_access ($node,$_user) {
    global $user;
//    print_r($user);
//    die;
    if (user_has_role(58,$user)) {
        if($user->uid == $node->uid){
            return TRUE;
        }else{
            return FALSE;
        }
    }else {
        return FALSE;
    }
}


function cassiopeia_payment_accep () {
    global $user;
    if (!empty($user->uid)) {
        return TRUE;
    }else {
        return FALSE;
    }
}

//todo new version
// =----- alter -------------

/**
 * Implements hook_menu_alter().
 */
function cassiopeia_menu_alter(&$items) {
    global $user;
    $items['taxonomy/term/%taxonomy_term']['page callback'] = '_cassiopeia_tvi_render_term_view';
    $items['taxonomy/term/%taxonomy_term']['page arguments'] = array(2);
    $items['node/%node']['page callback'] = '_cassiopeia_node_render_view';
    $items['node/%node']['theme callback'] = '_cassiopeia_admin_theme_';
    $items['node/%node/edit']['theme callback'] = '_cassiopeia_switch_theme_';
    $items['node/%node/edit']['access callback'] = '_cassiopeia_node_access';
    $items['admin/people']['access callback'] = array('_cassiopeia_admin_people_role');
    $items['admin/people/people']['access callback'] = array('_cassiopeia_admin_people_role');
    node_type_cache_reset();
    foreach (node_type_get_types() as $type) {
//      print_r($type);die;
        $type_url_str = str_replace('_', '-', $type->type);
        $items['node/add/' . $type_url_str]['access callback'] = '_cassiopeia_node_access';
        if($type->type=="event"){
            $items['node/add/' . $type_url_str]['theme callback'] = '_cassiopeia_switch_theme_';
        }else{
            $items['node/add/' . $type_url_str]['theme callback'] = '_cassiopeia_admin_theme';
        }
    }
    $items['node/%node/delete']['access callback'] ='_cassiopeia_node_access';
    $items['node/%node/clone/%clone_token']['theme callback'] = '_cassiopeia_admin_theme';

}
function _cassiopeia_admin_people_role(){
    global  $user;
    $access = false;
    if(user_has_role(3,$user) || user_has_role(6,$user)){
        $access = true;
    }
    return $access;
}
function _cassiopeia_node_access($op, $node = null, $account = NULL) {
    if (empty($account)) {
        $account = $GLOBALS['user'];
    }
    $access = node_access($op, $node, $account);
    $type = is_object($node) ? $node->type : $node;
//  print($op);
//  die;
    if(!empty($account->uid) && $access) {

        $user = user_load($account->uid);
        if ($type == 'ctype_golf') {
            switch ($op) {
                case 'create':
                    return _cassiopeia_create_ctype_golf_access($node,$user);
                    break;
                case 'update':
                    return  _cassiopeia_update_ctype_golf_access($node,$user);
                    break;
                case 'delete':
                    return _cassiopeia_delete_ctype_golf_access($node,$user);
                    break;
            }
        }

        if ($type == 'ctype_tea_time') {
            switch ($op) {
                case 'create':

                    return _cassiopeia_create_ctype_tea_time_access($node,$user);
                    break;
                case 'update':
                    return _cassiopeia_update_ctype_tea_time_access($node,$user);
                    break;
                case 'delete':
                    return _cassiopeia_delete_ctype_tea_time_access($node,$user);
                    break;
            }
        }

    }else {
        if ($type == 'event') {
            global $user;
//          print($op);
//          die;
            switch ($op) {
                case 'create':
                    return _cassiopeia_create_event_access($node,$user);
                    break;
                case 'update':
                    return  _cassiopeia_update_event_access($node,$user);
                    break;
                case 'delete':
                    return _cassiopeia_delete_ctype_golf_access($node,$user);
                    break;
            }
        }
        if ($op == 'view') {
            return TRUE;
        }else {
            return FALSE;
        }
    }
    return $access;
}


function _cassiopeia_create_ctype_golf_access ($node,$user) {
    if (user_has_role(3, $user) || user_has_role(6,$user)) {
        return TRUE;
    }elseif(user_has_role(4)) {
        return TRUE;
    }else {
        return FALSE;
    }
}

function _cassiopeia_update_ctype_golf_access ($node, $user) {
//    print_r($user->roles);die;
    if (user_has_role(3, $user) || user_has_role(6,$user)) {
        return TRUE;
    }elseif(user_has_role(4)) {
        if (!empty($node->field_namespace['und'][0]['value']) && !empty($user->field_namespace['und'][0]['value']) && $node->field_namespace['und'][0]['value'] == $user->field_namespace['und'][0]['value'] ) {
            return TRUE;
        }
    }else {
        return FALSE;
    }
}

function _cassiopeia_delete_ctype_golf_access ($node,$user) {
    if (user_has_role(3, $user) || user_has_role(6,$user)) {
        return TRUE;
    }elseif(user_has_role(4)) {
        if (!empty($node->field_namespace['und'][0]['value']) && !empty($user->field_namespace['und'][0]['value']) && $node->field_namespace['und'][0]['value'] == $user->field_namespace['und'][0]['value'] ) {
            return TRUE;
        }
    }else {
        return FALSE;
    }
}

function _cassiopeia_create_ctype_tea_time_access ($node,$user) {
    if (user_has_role(3, $user) || user_has_role(6,$user)) {
        return TRUE;
    }elseif(user_has_role(6)) {
        return TRUE;
    }elseif(user_has_role(4)) {
        return TRUE;
    }elseif(user_has_role(5)) {
        $access = FALSE;
        $_user = user_load($user->uid);
        $golfs = cassiopeia_get_golfs_by_condition(array('condition'=> array('status'=>array('value'=>1, 'operator'=>"="))));
        if (!empty($_user->field_namespace['und'][0]['value'])) {
            foreach ($golfs as $key => $value) {
//              print_r($value);
                if (!empty($value->field_namespace['und'][0]['value']) && ($value->field_namespace['und'][0]['value'] == $_user->field_namespace['und'][0]['value'])) {
                    $access = TRUE;
                    break;
                }
            }
        }
        return $access;
    }else {
        return FALSE;
    }
}

function _cassiopeia_update_ctype_tea_time_access ($node,$user) {
    if (user_has_role(3, $user) || user_has_role(6,$user)) {
        return TRUE;
    }elseif(user_has_role(6)) {
        return TRUE;
    }elseif(user_has_role(4)) {
        if (!empty($node->field_c_t_t_parent['und'][0]['nid'])) {
            $parent = node_load($node->field_c_t_t_parent['und'][0]['nid']);
            if (!empty($parent->field_namespace['und'][0]['value']) && !empty($user->field_namespace['und'][0]['value']) && $user->field_namespace['und'][0]['value'] == $parent->field_namespace['und'][0]['value']) {
                return TRUE;
            }else {
                return FALSE;
            }
        }else {
            return FALSE;
        }
    }elseif(user_has_role(5,$user)) {
        if (!empty($node->field_c_t_t_parent['und'][0]['nid'])) {
            $parent = node_load($node->field_c_t_t_parent['und'][0]['nid']);
            if (!empty($parent->field_namespace['und'][0]['value']) && !empty($user->field_namespace['und'][0]['value']) && $user->field_namespace['und'][0]['value'] == $parent->field_namespace['und'][0]['value']) {
                return TRUE;
            }else {
                return FALSE;
            }
        }else {
            return FALSE;
        }
    }else {
        return FALSE;
    }
}

function _cassiopeia_delete_ctype_tea_time_access ($node,$user) {
    if (user_has_role(3, $user) || user_has_role(6,$user)) {
        return TRUE;
    }elseif(user_has_role(6)) {
        return TRUE;
    }elseif(user_has_role(4)) {
        if (!empty($node->field_c_t_t_parent['und'][0]['nid'])) {
            $parent = node_load($node->field_c_t_t_parent['und'][0]['nid']);
            if (!empty($parent->field_namespace['und'][0]['value']) && !empty($user->field_namespace['und'][0]['value']) && $user->field_namespace['und'][0]['value'] == $parent->field_namespace['und'][0]['value']) {
                return TRUE;
            }else {
                return FALSE;
            }
        }else {
            return FALSE;
        }
    }elseif(user_has_role(5)) {
        if (!empty($node->field_c_t_t_parent['und'][0]['nid'])) {
            $parent = node_load($node->field_c_t_t_parent['und'][0]['nid']);
            if (!empty($parent->field_namespace['und'][0]['value']) && !empty($user->field_namespace['und'][0]['value']) && $user->field_namespace['und'][0]['value'] == $parent->field_namespace['und'][0]['value']) {
                return TRUE;
            }else {
                return FALSE;
            }
        }else {
            return FALSE;
        }
    }else {
        return FALSE;
    }
}


function cassiopeia_get_users_by_namespace ($namespace) {

    $users = array();

    $query = new EntityFieldQuery();
    $query->entityCondition('entity_type', 'user')
        ->fieldCondition('field_namespace', 'value', $namespace, '=');
    $results = $query->execute();

    if (!empty($results['user'])) {
        $uids = array_keys($results['user']);
        $users = user_load_multiple($uids);
    }
    return $users;
}

//todo end new version

/**
 * Implements hook_node_access().
 */
//function cassiopeia_node_access($node, $op, $account) {
//    if(!empty($account->uid)) {
//        $user = user_load($account->uid);
//        if ($node == 'ctype_golf') {
//            switch ($op) {
//                case 'create':
//                    if (user_has_role(3, $user) || user_has_role(4,$user)) {
//                        return NODE_ACCESS_ALLOW;
//                    }
//                    break;
//                case 'update':
//                    if (user_has_role(3, $user) || user_has_role(4,$user)) {
//                        return NODE_ACCESS_ALLOW;
//                    }
//                    break;
//                case 'delete':
//                    if (user_has_role(3, $user) || user_has_role(4,$user)) {
//                        return NODE_ACCESS_ALLOW;
//                    }
//                case 'view':
//                    return NODE_ACCESS_ALLOW;
//                    break;
//            }
//        }
//        if ($node == 'ctype_tea_time') {
//            switch ($op) {
//                case 'create':
//                    if (user_has_role(3, $user) || user_has_role(4,$user) || user_has_role(5,$user)) {
//                        return NODE_ACCESS_ALLOW;
//                    }
//                    break;
//                case 'update':
//                    if (user_has_role(3, $user) || user_has_role(4,$user) || user_has_role(5,$user)) {
//                        return NODE_ACCESS_ALLOW;
//                    }
//                    break;
//                case 'delete':
//                    if (user_has_role(3, $user) || user_has_role(4,$user) || user_has_role(5,$user)) {
//                        return NODE_ACCESS_ALLOW;
//                    }
//                    break;
//            }
//        }
//
//    }else {
//        if ($op == 'view') {
//            return NODE_ACCESS_ALLOW;
//        }else {
//            return NODE_ACCESS_DENY;
//        }
//
//    }
//    return NODE_ACCESS_IGNORE;
//}




/**
 * Implements hook_variable_info().
 */

function cassiopeia_variable_info($options) {
    $variables['cassiopeia_config_introduction_title'] = array(
        'type' => 'array',
        'title' => t('VAR INTRODUCTION PAGE TITLE', array(), $options),
        'default' => array('*' => 0),
//    'description' => t('VAR DESCRIPTION', array(), $options),
        'required' => TRUE,
        'localize' => TRUE,
        'group' => 'GROUP_NAME',
    );
    $variables['cassiopeia_contact_config_form_content'] = array(
        'type' => 'string',
        'title' => t('Contact page config'),
        'default' => '',
        'required' => TRUE,
        'localize' => TRUE,

    );

    return $variables;

}


// =----- End alter -------------

function _cassiopeia_node_render_view($node) {
    global $user;
    if (is_object($node)) {
        $nid = $node->nid;
    }
    else {
        $node = node_load($node);
    }
    if (module_exists('metatag')) {
        metatag_entity_view($node, 'node', 'full', NULL);
    }
    if ($node->type == 'ctype_golf') {
//        if(user_has_role(3,$user)){
        return _cassiopeia_render_theme('module', 'cassiopeia', 'templates/upgrade/page-golf-detail.tpl.php', array('node' => $node));
//        }else{
//            return _cassiopeia_render_theme('module', 'cassiopeia', 'templates/nodes/ctype_golf.tpl.php', array('node' => $node));
//        }
    }

    //  ------- develop by Trung -----------
    if ($node->type == 'article') {
        if($node->field_article_tx['und'][0]['tid']==66 || $node->field_article_tx['und'][0]['tid']==115){
            return _cassiopeia_render_theme('module', 'cassiopeia', 'templates/nodes/article-type-1.tpl.php', array('node' => $node));
        }else{
            return _cassiopeia_render_theme('module', 'cassiopeia', 'templates/nodes/article.tpl.php', array('node' => $node));
        }
    }
    if ($node->type == 'ctype_tour') {
        return _cassiopeia_render_theme('module', 'cassiopeia', 'templates/nodes/ctype_golf_tour.tpl.php', array('node' => $node));
    }
    if ($node->type == 'page') {
        return _cassiopeia_render_theme('module', 'cassiopeia', 'templates/pages/cassiopeia_introduction_page_callback.tpl.php', array('node' => $node));
    }
    if ($node->type == 'event') {
        return _cassiopeia_render_theme('module', 'cassiopeia', 'templates/upgrade/page-event-detail.tpl.php', array('node' => $node));
    }

    //  ------- end develop by Trung -----------

    return node_page_view($node);
}


function _cassiopeia_tvi_render_term_view($term, $depth = NULL) {

    if (is_object($term)) {
        $tid = $term->tid;
    }
    else {
        $term = taxonomy_term_load($term);
    }
    if (module_exists('metatag')) {
        metatag_entity_view($term, 'taxonomy_term', 'full', NULL);
    }
    if ($term->vocabulary_machine_name == 'tx_article') {
//        if($term->tid == 6){
        return _cassiopeia_render_theme('module', 'cassiopeia', 'templates/terms/tx_article.tpl.php', array('term' => $term));
//        }
    }
    if ($term->vocabulary_machine_name == 'tags') {
//        if($term->tid == 6){
        return _cassiopeia_render_theme('module', 'cassiopeia', 'templates/terms/article-tags.tpl.php', array('term' => $term));
//        }
    }
    if ($term->vocabulary_machine_name == 'tx_area') {
        return _cassiopeia_render_theme('module', 'cassiopeia', 'templates/terms/tx_area.tpl.php', array('term' => $term));
    }
    if ($term->vocabulary_machine_name == 'tx_tour') {
        return _cassiopeia_render_theme('module', 'cassiopeia', 'templates/terms/tx_tour.tpl.php', array('term' => $term));
    }

    module_load_include('inc', 'taxonomy', 'taxonomy.pages');
    return taxonomy_term_page($term);
}


function cassiopeia_theme($existing, $type, $theme, $path) {
    $themes = array(
        'cassiopeia_table_drag_components' => array(
            'render element' => 'element'
        ),
        'cassiopeia_hotdeals_create_form' => array(
            'render element' => 'form',
            'template' => 'cassiopeia_hotdeals_create_form',
            'path' => drupal_get_path('module', 'cassiopeia') . '/templates/forms'
        ),
        'cassiopeia_hotdeal_filter_form' => array(
            'render element' => 'form',
            'template' => 'cassiopeia_hotdeal_filter_form',
            'path' => drupal_get_path('module', 'cassiopeia') . '/templates/forms'
        ),
        'cassiopeia_ctype_golf_node_form' => array(
            'render element' => 'form',
            'template' => 'cassiopeia_ctype_golf_node_form',
            'path' => drupal_get_path('module', 'cassiopeia') . '/templates/forms'
        ),
        'cassiopeia_create_event_node_form' => array(
            'render element' => 'form',
            'template' => 'cassiopeia_create_event_node_form',
            'path' => drupal_get_path('module', 'cassiopeia') . '/templates/forms'
        ),
        'cassiopeia_add_tea_times_form' => array(
            'render element' => 'form',
            'template' => 'cassiopeia_add_tea_times_form',
            'path' => drupal_get_path('module', 'cassiopeia') . '/templates/forms'
        ),
        'cassiopeia_search_tea_times_from' => array(
            'render element' => 'form',
            'template' => 'cassiopeia_search_tea_times_from',
            'path' => drupal_get_path('module', 'cassiopeia') . '/templates/forms'
        ),
        'cassiopeia_search_tea_time_details_from' => array(
            'render element' => 'form',
            'template' => 'cassiopeia_search_tea_time_details_from',
            'path' => drupal_get_path('module', 'cassiopeia') . '/templates/forms'
        ),

        'cassiopeia_remove_tea_times_form' => array(
            'render element' => 'form',
            'template' => 'cassiopeia_remove_tea_times_form',
            'path' => drupal_get_path('module', 'cassiopeia') . '/templates/forms'
        ),

        'cassiopeia_search_golfs_from' => array(
            'render element' => 'form',
            'template' => 'cassiopeia_search_golfs_from',
            'path' => drupal_get_path('module', 'cassiopeia') . '/templates/forms'
        ),
        'cassiopeia_golf_booking_payment_form' => array(
            'render element' => 'form',
            'template' => 'cassiopeia_golf_booking_payment_form',
            'path' => drupal_get_path('module', 'cassiopeia') . '/templates/forms'
        ),
        'cassiopeia_fixed_search_form_theme' => array(
            'render element' => 'form',
            'template' => 'cassiopeia_fixed_search_form_theme',
            'path' => drupal_get_path('module', 'cassiopeia') . '/templates/forms'
        ),

        'cassiopeia_search_golf_bookings_from' => array(
            'render element' => 'form',
            'template' => 'cassiopeia_search_golf_bookings_from',
            'path' => drupal_get_path('module', 'cassiopeia') . '/templates/forms'
        ),


        'cassiopeia_admin_golf_booking_payment_form' => array(
            'render element' => 'form',
            'template' => 'cassiopeia_admin_golf_booking_payment_form',
            'path' => drupal_get_path('module', 'cassiopeia') . '/templates/forms'
        ),
        'cassiopeia_admin_golf_booking_change_form' => array(
            'render element' => 'form',
            'template' => 'cassiopeia_admin_golf_booking_change_form',
            'path' => drupal_get_path('module', 'cassiopeia') . '/templates/forms'
        ),

        'cassiopeia_golf_edit_booking_form' => array(
            'render element' => 'form',
            'template' => 'cassiopeia_golf_edit_booking_form',
            'path' => drupal_get_path('module', 'cassiopeia') . '/templates/forms'
        ),
        'cassiopeia_tour_booking_form' => array(
            'render element' => 'form',
            'template' => 'cassiopeia_tour_booking_form',
            'path' => drupal_get_path('module', 'cassiopeia') . '/templates/forms'
        ),
        'cassiopeia_tour_booking_form_edit' => array(
            'render element' => 'form',
            'template' => 'cassiopeia_tour_booking_form_edit',
            'path' => drupal_get_path('module', 'cassiopeia') . '/templates/forms'
        ),
        'cassiopeia_register_form_theme' => array(
            'render element' => 'form',
            'template' => 'cassiopeia_register_form',
            'path' => drupal_get_path('module', 'cassiopeia') . '/templates/forms'
        ),

//




    );
    return $themes;
}

function theme_cassiopeia_table_drag_components($vars) {
    $element = $vars['element'];

    drupal_add_tabledrag($vars['element']['#id'] . '-table', 'order', 'sibling', 'item-row-weight');

    $header = array(
        'label' => t('label'),
        'weight' => t('Weight'),
    );

    $rows = array();
    foreach (element_children($element) as $key) {
        $row = array();
        $row['data'] = array();
        foreach ($header as $fieldname => $title) {
            $row['data'][] = drupal_render($element[$key][$fieldname]);
            $row['class'] = array('draggable');
        }
        $rows[] = $row;
    }

    return theme('table', array(
        'header' => $header,
        'rows' => $rows,
        'attributes' => array('id' => $vars['element']['#id'] . '-table'),
    ));
}

function cassiopeia_page_build(&$page) {
    global $user, $theme_key;
    if ( (user_has_role(3) || user_has_role(4) || user_has_role(5) ||user_has_role(6) ||user_has_role(7) ) && $theme_key == 'cassiopeia_theme') {
        $page['page_bottom']['c3s_admin_menu'] = array(
            '#markup' => '<div style="position: fixed; top: 40%; left: 10px; background: #ccc; border-radius: 5px; padding: 5px; z-index: 9999;">'.l('Quản trị', 'dashboard').'</div>'
        );
    }
}


// ----- api ------
function cassiopeia_get_nodes($type = array(), $language = NULL, $range = NULL) {
    $_nodes_query = new EntityFieldQuery();
    $_nodes_query_result = NULL;
    if (is_array($type)) {
        $_nodes_query_result = $_nodes_query
            ->entityCondition('entity_type', 'node')
            ->propertyCondition('type', $type, 'IN');

    }
    else {
        $_nodes_query_result = $_nodes_query
            ->entityCondition('entity_type', 'node')
            ->propertyCondition('type', $type, '=');
    }

    if ($language && is_string($language) && $language != 'all') {
        $_nodes_query->propertyCondition('language', $language, '=');
    }

    if ($range && is_array($range) && !empty($range['start']) && is_numeric($range['start']) && !empty($range['end']) && is_numeric($range['end'])) {
        $_nodes_query->range($range['start'], $range['end']);
    }

    $_nodes_query_result = $_nodes_query->execute();

    return $_nodes_query_result;
}




// ----- api core ------

function _cassiopeia_views_display($view_name, $display_id, $arg = array()) {
    $view = views_get_view($view_name);
    $output = "";
    if (!empty($view)) {
        $output = $view->execute_display($display_id, $arg);
        if (is_array($output)) {
            $output = $output['content'];
        }
        if (!$output && !count($view->result)) {
            $output = "";
        }
    }
    return $output;
}

function _cassiopeia_render_theme($type, $name, $path, $variables = array()) {
    $path_temp = drupal_get_path($type, $name);
    return theme_render_template($path_temp . "/" . $path, $variables);
}

function _cassiopeia_get_day_off_week($timestamp) {
    $_output = "";
    switch (date('N', $timestamp)) {
        case '1':
            $_output = t('Monday');
            break;
        case '2':
            $_output = t('Tuesday');
            break;
        case '3':
            $_output = t('Wednesday');
            break;
        case '4':
            $_output = t('Thursday');
            break;
        case '5':
            $_output = t('Friday');
            break;
        case '6':
            $_output = t('Saturday');
            break;
        case '7':
            $_output = t('Sunday');
            break;
    }
    return $_output;
}

function _cassiopeia_convert_time_ago($timestamp) {
    $_output = "";
    $day = $timestamp / (60 * 60 * 24);
    if ($day >= 365) {
        $_output = floor($day % 365) . ' năm trước';
    }
    elseif ($day >= 30 && $day < 365) {
        $_output = floor($day % 30) . ' tháng trước';
    }
    elseif ($day >= 1 && $day < 30) {
        $_output = floor($day % 30) . ' ngày trước';
    }
    elseif ($day > 0 && $day < 1) {
        if ($day * 24 >= 1) {
            $_output = floor($day * 24) . ' giờ trước';
        }
        elseif ($day * 24 * 60 > 1) {
            $_output = floor($day * 24 * 60) . ' phút trước';
        }
        else {
            $_output = floor($day * 24 * 60 * 60) . ' giây trước';
        }
    }
    return $_output;
}

function _cassiopeia_get_variable($name, $default) {
    global $language;
    $_variable_query = db_select('cassiopeia_variable', 'cv');
    $_variable_query->fields('cv');
    $_variable_query->condition('cv.name', $name, '=');
    $_variable_query->join('cassiopeia_variable_store', 'cvt', ' cv.name = cvt.name');
    $_variable_query->fields('cvt');
    $_variable_query->condition('cvt.language', $language->language, '=');
    $_variable_query = $_variable_query->execute();
    $_variable_query_result = $_variable_query->fetchAssoc();
    if (!empty($_variable_query_result)) {
        return unserialize($_variable_query_result['value']);
    }
    else {
        return $default;
    }
}

function _cassiopeia_set_variable($name, $value) {
    global $language;
    db_merge('cassiopeia_variable')
        ->key(array('name' => $name))
        ->fields(array('name' => $name))
        ->execute();
    db_merge('cassiopeia_variable_store')
        ->key(array('name' => $name, 'language' => $language->language))
        ->fields(array('value' => serialize($value)))
        ->execute();
}

function _cassiopeia_del_variable($name) {
    db_delete('cassiopeia_variable')
        ->condition('name', $name)
        ->execute();
    db_delete('cassiopeia_variable_store')
        ->condition('name', $name)
        ->execute();
}


function _cassiopeia_load_collections ($collections) {
    $_collection_ids = array();
    foreach ($collections as $_key => $_value) {
        $_collection_ids[] =  $_value['value'];
    }
    $_collection = entity_load('field_collection_item', $_collection_ids);
    return $_collection;
}

function cassiopeia_namespace_edit_form ($form, $form_state, $namespaceId) {
    $form = array();
    return $form;
}

function cassiopeia_namespace_add_form ($form, $form_state) {
    $form = array();
    $form['title'] = array(
        '#type' => 'textfield',
        '#title' => t('Title'),
        '#size' => 120,
        '#maxlength' => 254,
        '#required' => TRUE,
    );
    $form['submit'] = array('#type' => 'submit', '#value' => t('Import'));
    return $form;
}

function cassiopeia_namespace_add_form_submit($form, $form_state) {
    try {
        $nid = db_insert('namespace') // Table name no longer needs {}
        ->fields(array(
            'title' => $form_state['values']['title'],
            'status' => 1,
            'created' => REQUEST_TIME,
        ))
            ->execute();
        drupal_set_message('Thêm mới namespace '. $form_state['values']['title']);
    }catch (Exception $e) {
        drupal_set_message('Hệ thống bận vui lòng quay lại sau ít phut', 'error');
    }
}

function _cassiopeia_get_all_namespace () {
    $result = db_select('namespace', 'namespace')
        ->fields('namespace')
        ->orderBy("title","ASC")
        ->execute()
        ->fetchAll();
    return $result;
}

function _cassiopeia_get_namespace ($namespace) {
    $result = db_select('namespace', 'namespace')
        ->fields('namespace')
        ->condition('id', $namespace)
        ->execute()
        ->fetchObject();
    return $result;

}

function cassiopeia_form_event_node_form_alter (&$form, &$form_state) {
    global $user;
//    print_r($form);
    if(user_has_role(58,$user)){
        $form['#theme'][] = 'cassiopeia_create_event_node_form';
    }
    $query = db_select("tbl_event_member","tbl_event_member");
    $query -> fields("tbl_event_member");
//    $query -> condition("user_id",$user->uid,"=");
    $result = $query -> execute() -> fetchAll();
    $options = array();
    $options[-1] = "Chọn đối tượng";
    if(!empty($result)){
        foreach($result as $item){
            $options[$item->id] = $item->name;
        }
    }
//    print_r($result);
    $form['field_event_date']['und'][0]["#theme_wrappers"] = array();
    $form['field_event_expired_date']['und'][0]["#theme_wrappers"] = array();
    if(!empty($options)){
//        $form['field_event_target']['und'][0]['value']['#multiple'] = true;
        $form['field_event_target']['und'][0]['value']['#options'] = $options;
        unset($form['field_event_target']['und'][0]['value']['#size']);
        $form['field_event_target']['und'][0]['value']['#type'] = "select";
    }

    $provinces = cassiopeia_country_get_provinces();
    $province_options = array();
    foreach ($provinces as $province) {
        $province_options[$province->code] = $province->name;
    }
    $form['field_event_province']['und'][0]["#theme_wrappers"] = array();
    if(!empty($province_options)){
//        $form['field_event_target']['und'][0]['value']['#multiple'] = true;
        $form['field_event_province']['und'][0]['value']['#options'] = $province_options;
        $form['field_event_province']['und'][0]['value']['#prefix'] = '<div id="receiver-province-wrrap">';
        $form['field_event_province']['und'][0]['value']['#suffix'] = '</div>';
        $form['field_event_province']['und'][0]['value']['#ajax'] = array(
            'callback' => 'cassiopeia_wms_customer_customer_form_province_ajax_callback',
            'wrapper' => 'district-wrrap',
            'method' => 'replace',
            'effect' => 'fade',
            'progress' => array('type' => 'none'),

        );
        unset($form['field_event_province']['und'][0]['value']['#size']);
        $form['field_event_province']['und'][0]['value']['#type'] = "select";
    }

    $districts = array();
//    if(!empty($form_state['values'])){
//        print_r($form_state['values']);
//    }
    if (!empty($form_state['values']['field_event_province'])) {
//        print(1);
        $districts = cassiopeia_country_get_district_by_code($form_state['values']['field_event_province']['und'][0]['value'],'province');
    }else {
        if (!empty($provinces[array_key_first($provinces)])) {
            $districts = cassiopeia_country_get_district_by_code($provinces[array_key_first($provinces)]->code,'province');
        }
    }

    $district_options = array();
    foreach ($districts as $district) {
        $district_options[$district->code] = $district->name;
    }
//    $form['field_event_district']['und'][0]["#theme_wrappers"] = array();
    if(!empty($district_options)){
//        $form['field_event_target']['und'][0]['value']['#multiple'] = true;
        $form['field_event_district']['und'][0]['value']['#options'] = $district_options;
        unset($form['field_event_district']['und'][0]['value']['#size']);
        $form['field_event_district']['und'][0]['value']['#prefix'] = '<div id="district-wrrap">';
        $form['field_event_district']['und'][0]['value']['#suffix'] = '</div>';
        $form['field_event_district']['und'][0]['value']['#type'] = "select";
        $form['field_event_district']['und'][0]['value']['#chosen'] = TRUE;
        $form['field_event_target']['und'][0]['value']['#chosen'] = TRUE;

    }
    $form['#submit'][] = "cassiopeia_form_event_node_form_alter_submit";
}
function cassiopeia_wms_customer_customer_form_province_ajax_callback($form,&$form_state){
//    print_r($form['field_event_district']);
    return $form['field_event_district'];
}
function cassiopeia_form_event_node_form_alter_submit (&$form, &$form_state) {
//    print_r($form_state['values']);
//    die;
    $string = "";
//    if(!empty($form_state['values']['field_event_target']['und'][0]['value'])){
//        $index=1;
//        foreach($form_state['values']['field_event_target']['und'][0]['value'] as $item){
//            if($index){
//                $string.=$item;
//            }else{
//                $string.=",".$item;
//            }
//
//        }
//    }
    $form_state['values']['field_event_target']['und'][0]['value'] = $string;
    $arg = arg();
    if($arg[1]=="add"){
        $form_state['values']['status'] = 0;
    }
//     print($form_state['values']['field_event_target']['und'][0]['value'] );
//     die;
}
function cassiopeia_form_ctype_golf_node_form_alter (&$form, &$form_state) {

    global $user;

//    if (!empty($form['#node']->field_ctype_golf_lat['und'][0]['value']) && !empty($form['#node']->field_ctype_golf_lng['und'][0]['value'])) {
//        drupal_add_js(array(
//            'ctype_golf' => $form['#node'],
//        ),'setting');
//    }
//
//    drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/ctype_golf_form.js', array('weight' => 1000));
//    drupal_add_js('https://maps.googleapis.com/maps/api/js?key=AIzaSyA_ZhEKj6HJnaQeKNKFRq-vXteC2l9XksA&libraries=places&callback=initMap', array('type' => 'external', "async"=>"async", "defer"=>"defer", 'weight' => 1001));

    $form['field_image']['und'][0]['#description'] = '';
    $form['field_image']['und'][0]['#disable_upload_button'] = TRUE;

    $form['field_ctype_golf_logo']['und'][0]['#description'] = '';
    $form['field_ctype_golf_logo']['und'][0]['#disable_upload_button'] = TRUE;

    $form['field_ctype_golf_baner']['und'][0]['#description'] = '';
    $form['field_ctype_golf_baner']['und'][0]['#disable_upload_button'] = TRUE;
    $form['field_ctype_golf_images']['und'][0]['#description'] = '';


    $field_ctype_golf_hole_option = array();
    foreach (_cassiopeia_get_all_hole() as $key => $value) {
        $field_ctype_golf_hole_option[$value->hole] = t($value->title);
    }

    $form['field_ctype_golf_hole']['und'][0]['value']['#type'] = "select";
    $form['field_ctype_golf_hole']['und'][0]['value']['#options'] = $field_ctype_golf_hole_option;
    unset($form['field_ctype_golf_hole']['und'][0]['value']['#size']);

    if (user_has_role(3) || user_has_role(6)) {
        unset($form['field_namespace']['und'][0]['value']['#size']);
        $form['field_namespace']['und'][0]['value']['#title'] = 'Namespace';
        $form['field_namespace']['und'][0]['value']['#type'] = 'select';
        $form['field_namespace']['und'][0]['value']['#ajax'] = array(
            'callback' => 'cassiopeia_admin_golf_node_form_ajax_callback',
            'wrapper' => '_field_ctype_golf_utility_',
            'method' => 'replace',
            'effect' => 'fade',
        );
        $namespaces  = _cassiopeia_get_all_namespace();
        $namespace_options = array();
        if ($namespaces) {
            foreach ($namespaces as $namespace_key => $namespace_value) {
                $namespace_options[$namespace_value->id] = $namespace_value->title;
            }
        };
        $form['field_namespace']['und'][0]['value']['#options'] = $namespace_options;
        $form['status'] = $form['options']['status'];
        $form['status']['#title'] = 'Tình trạng';
        $form['status']['#type'] =  'radios';
        $form['status']['#options'] =  array(0=> 'Ngừng Hoạt động',1=>'Hoạt động');
        unset($form['options']['status']);
        $form['field_tx_area']['und']['#required'] = TRUE;
        $form['field_ctype_golf_favorite']['#access'] = TRUE;

    }else {
        $form['field_namespace']['#access'] = FALSE;
        $form['field_tx_area']['und']['#required'] = TRUE;
        $form['field_tx_area']['#access'] = TRUE;
        $form['field_ctype_golf_favorite']['#access'] = FALSE;
    }

    $_field_ctype_golf_utility_default_value = array();

    if(!empty($form['#node']->field_ctype_utility['und'])) {
        foreach ($form['#node']->field_ctype_utility['und'] as $key => $value) {
            $_field_ctype_golf_utility_default_value[] = $value['value'];
        }
    }

    $_field_ctype_golf_utility_options = array();
//  todo  cassiopeia_get_golf_utilitys change cassiopeia_get_golf_utilitys_bynamespace (with ajax)
//    $namespace=!empty($form_state['values']);
//    print_r($form_state['values']);

    if(!empty($form_state['values']['field_namespace']['und'][0])) {
        $test = cassiopeia_get_golf_utilitys_bynamespace($form_state['values']['field_namespace']['und'][0]['value']);
        foreach (cassiopeia_get_golf_utilitys_bynamespace($form_state['values']['field_namespace']['und'][0]['value']) as $key => $value) {
            $_field_ctype_golf_utility_options[$value->id] = $value->title;
        }
    }else {
//        print(123);
        if(!empty($form['#node'])) {
            $_node = (object)$form['#node'];
            $_user = user_load($user->uid);
//            print_r($_node);
//          print_r($_user);
//          $test = cassiopeia_get_golf_utilitys_bynamespace($_node->field_namespace['und'][0]['value']);
            foreach (cassiopeia_get_golf_utilitys_bynamespace($_node->field_namespace['und'][0]['value']) as $key => $value) {
                $_field_ctype_golf_utility_options[$value->id] = $value->title;
            }
        }
    }

//    print_r($test);

    $form['_field_ctype_golf_utility'] =  array(
        '#type' => 'select',
        '#title' => 'Tiện ích',
        '#options' => $_field_ctype_golf_utility_options,
        '#multiple' => TRUE,
        '#chosen' =>TRUE,
        '#default_value' => $_field_ctype_golf_utility_default_value,
        '#prefix' => '<div id="_field_ctype_golf_utility_">',
        '#suffix' => '</div>',
    );

    $form['#theme'][] = 'cassiopeia_ctype_golf_node_form';
    $form['#submit'][] = "_cassiopeia_form_ctype_golf_node_form_alter_submit";

}
function cassiopeia_admin_golf_node_form_ajax_callback($form,&$form_state){
    return $form['_field_ctype_golf_utility'];
}

function _cassiopeia_form_ctype_golf_node_form_alter_submit (&$form, &$form_state) {
    global $user;
    $form_state['values']['field_ctype_utility']['und'] = array();
    foreach ($form_state['values']['_field_ctype_golf_utility'] as $key => $value) {
        $form_state['values']['field_ctype_utility']['und'][] =  array(
            'value' => $value,
            'weight' => $key,
        );
    }
    if(empty($form_state['values']['field_namespace']['und'][0]['value'])){
//        print(1);die;
        $form_state['values']['field_namespace']['und'][0]['value'] = user_load($user->uid)->field_namespace['und'][0]['value'];
    }
//    var_dump($form['#node']);
//    die;
//    var_dump($form_state['values']);die;
    if(empty($form['#node']->nid)){
        if(!user_has_role(3,$user)){
            $query = db_insert("tbl_notify");
            $query -> fields(array(
                'title' => t('Tạo sân'),
                'from_uid' => 3,
                'to_uid' => -1,
                'created' => REQUEST_TIME,
                'status' => 0,
                'message_vi' => "Quản lý sân ".$user->name." đã thêm mới sân '".$form_state['values']['title']."'",
            ));
            $query->execute();
        };
    }else{
        if(!user_has_role(3,$user)){
            $query = db_insert("tbl_notify");
            $query -> fields(array(
                'title' => t('Cập nhật sân'),
                'from_uid' => 3,
                'to_uid' => -1,
                'created' => REQUEST_TIME,
                'status' => 0,
                'message_vi' => "Quản lý sân ".$user->name." đã cập nhật sân '".$form_state['values']['title']."'",
            ));
            $query->execute();
        };
    }

}

function cassiopeia_form_taxonomy_form_term_alter(&$form, &$form_state) {
//    var_dump($form['#term']['vocabulary_machine_name']);die;
    if (!empty($form['#term'])) {
//      && !empty($form['#term']['vocabulary_machine_name'])
//      && $form['#term']['vocabulary_machine_name'] == 'tx_area'
        $_term = (object)$form['#term'];
        if(!empty($_term->vocabulary_machine_name) && $_term->vocabulary_machine_name == 'tx_area'){
            if (!empty($_term->field_tx_area_lng['und'][0]['value']) && !empty($_term->field_tx_area_lat['und'][0]['value'])) {
                drupal_add_js(array(
                    'tx_area_term' => $form['#term'],
                ),'setting');
            }
            drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/tx_area_form.js', array('weight' => 1000));
            drupal_add_js('https://maps.googleapis.com/maps/api/js?key=AIzaSyCuJV0EMrK7f4i9EVokc-o8D5AUBiaDTWY&libraries=places&callback=initMap', array('type' => 'external', "async"=>"async", "defer"=>"defer", 'weight' => 1001));
            $form['gmap'] = array(
                '#type' => 'item',
                '#markup' => '<div><div class="form-group"><label for="address">Khu vực</label> <input class="form-control" id="address"></input></div>  <div class="form-group"><div id="gmap"></div></div> <div id="infowindow-content">
      <img src="" width="16" height="16" id="place-icon">
      <span id="place-name"  class="title"></span><br>
      <span id="place-address"></span>
      </div></div>',
            );
        }
    }
    if (!empty($form['menu'])) {
        $form['menu']['#weight']  = 100;
    }
}

function _cassiopeia_get_all_hole() {
    $holes = db_select('golf_holes', 'golf_holes')
        ->fields('golf_holes')
        ->orderBy('wiehgt')
        ->execute()
        ->fetchAll();
    return $holes;
}
function _cassiopeia_get_available_hole($golf_id) {
    $holes = _cassiopeia_get_all_hole();
//    var_dump($holes);
    $hole_s = array();
    if(!empty($holes)){
        foreach($holes as $value){
            $condition = array();

            $condition['condition']['field_c_t_t_parent'] = $golf_id;

            $condition['condition']['field_c_t_t_sh'] = array();
            $condition['condition']['field_c_t_t_sh']['value'] = REQUEST_TIME;
            $condition['condition']['field_c_t_t_sh']['operator'] =  '>=';

//
            $condition['condition']['field_c_t_t_hole'] = array();
            $condition['condition']['field_c_t_t_hole']['value'] = $value->hole;
            $condition['condition']['field_c_t_t_hole']['operator'] =  '=';

            $condition['condition']['status'] = array();
            $condition['condition']['status']['value'] = 1;
            $condition['condition']['status']['operator'] =  '=';
            $tee_times = _cassiopeia_get_tea_time_details_by_condition($condition);
            if(!empty($tee_times)){
                $hole_s[] = $value;
            }
        }
    }

    return $hole_s;
}

function cassiopeia_form_ctype_tea_time_node_form_alter (&$form, &$form_state) {
    global $user;
    $_user = user_load($user->uid);
    $form['title']['#type'] = 'hidden';
    if (empty($form['title']['#default_value'])) {
        $form['title']['#default_value'] = 'Golf';
    }
    $golfs = cassiopeia_get_all_golf();
    $first_child = null;
    $index=1;
    if(!empty($golfs)){
        foreach ($golfs as $key => $value) {
            if($index==1){
                $first_child = $value;
            }
            $golf_options[$value->nid] = $value->title;
            $index++;
        }
    }
    $form['field_c_t_t_parent']['und']['#options'] = $golf_options;
    $form['field_c_t_t_parent']['und']['#ajax'] = array(
        'callback' => 'cassiopeia_add_one_tee_time_ajax',
        'wrapper' => '_field_c_t_t_hole_wrap_',
        'method' => 'replace',
        'effect' => 'fade',
        'progress' => array('type' => 'default'),
    );

    $form['field_c_t_t_hole']['#prefix'] = '<div id="_field_c_t_t_hole_wrap_" class="form-group">';
    $form['field_c_t_t_hole']['#suffix'] = '</div>';

    $field_c_t_t_hole_option = array();
//print_r($form['#node']);
    if (!empty($form_state['values']['field_c_t_t_parent']['und'][0]['nid'])) {
        $parent = node_load($form_state['values']['field_c_t_t_parent']['und'][0]['nid']);
        if (!empty($parent)) {
            foreach ( _cassiopeia_get_all_hole () as $key => $value ) {
//                if (!empty($parent->field_ctype_golf_hole['und'][0]['value']) && $parent->field_ctype_golf_hole['und'][0]['value'] >= $value->hole) {
                $field_c_t_t_hole_option[$value->hole] = $value->title;
//                }
            }
        }
    }elseif (!empty($first_child)) {
        foreach ( _cassiopeia_get_all_hole () as $key => $value ) {
//                if (!empty($first_child->field_ctype_golf_hole['und'][0]['value']) && $first_child->field_ctype_golf_hole['und'][0]['value'] >= $value->hole) {
            $field_c_t_t_hole_option[$value->hole] = $value->title;
//                }
        }
    }
//    print_r($field_c_t_t_hole_option);
    unset($form['field_c_t_t_hole']['und'][0]['value']['#size']);
    $form['field_c_t_t_hole']['und'][0]['value']['#type'] =  'select';
    $form['field_c_t_t_hole']['und'][0]['value']['#options'] =  $field_c_t_t_hole_option;


    unset($form['field_c_t_t_type']['und'][0]['value']['#size']);
    $form['field_c_t_t_type']['und'][0]['value']['#type'] =  'select';
    $form['field_c_t_t_type']['und'][0]['value']['#options'] =   cassiopeia_get_tea_time_types();

//  $form['field_c_t_t_sh']['und'][0]['value']['#title'] = '';
//  $form['field_c_t_t_sh']['und'][0]['value']['#type'] = 'date_popup';
//  $form['field_c_t_t_sh']['und'][0]['value']['#date_format'] =  'H:i';
//  $form['field_c_t_t_sh']['und'][0]['value']['#timepicker'] = 'timepicker';
//  $form['field_c_t_t_sh']['und'][0]['value']['#default_value'] = !empty($form['field_c_t_t_sh']['und'][0]['value']['#default_value'])?date('Y-m-d H:i:s',(int)$form['field_c_t_t_sh']['und'][0]['value']['#default_value']):'';
//  $form['field_c_t_t_sh']['und'][0]['value']['#timepicker_options'] = array(
//    'rows' => 4,
//    'hours'=> array(
//      'starts'=> 0,
//      'ends'=> 23
//    ),
//    'showCloseButton' => FALSE,
//    'closeButtonText' => t('Close'),
//    'hourText'=> 'Giờ',
//    'minuteText' => 'Phút',
//    'showMinutes' => TRUE,
//  );


    $form['_field_c_t_t_sh'] = array(
        '#title' => '',
        '#type' => 'date_popup',
        '#date_format' => 'H:i',
        '#timepicker' => 'timepicker',
        '#default_value'=> !empty($form['field_c_t_t_sh']['und'][0]['value']['#default_value'])?date('Y-m-d H:i:s',(int)$form['field_c_t_t_sh']['und'][0]['value']['#default_value']):'',
        '#timepicker_options' => array(
            'rows' => 4,
            'hours'=> array(
                'starts'=> 0,
                'ends'=> 23
            ),
            'showCloseButton' => FALSE,
            'closeButtonText' => t('Close'),
            'hourText'=> 'Giờ',
            'minuteText' => 'Phút',
            'showMinutes' => TRUE,
        ),
        '#weight' =>  $form['field_c_t_t_sh']['#weight'],
        '#required' => TRUE,
    );

    $form['_field_c_t_t_sh']['#prefix'] = '<div class="form-group">';
    $form['_field_c_t_t_sh']['#suffix'] = '</div>';

    $form['field_c_t_t_sh']['#prefix'] = '<div style="opacity: 0; width: 0px; height: 0px; overflow: hidden;">';
    $form['field_c_t_t_sh']['#suffix'] = '</div>';
    $form['field_c_t_t_sh']['#required'] = FALSE;
    $form['field_c_t_t_sh']['und']['#required'] = FALSE;
    $form['field_c_t_t_sh']['und'][0]['#required'] = FALSE;
    $form['field_c_t_t_sh']['und'][0]['value']['#required'] = FALSE;



    $_field_c_t_t_utility_options = array();
    if (!empty($form_state['values']['field_c_t_t_parent']['und'][0]['nid'])) {
        $parent = node_load($form_state['values']['field_c_t_t_parent']['und'][0]['nid']);

        if(!empty($parent->field_ctype_utility['und'])) {
            foreach ($parent->field_ctype_utility['und'] as $key => $value) {
                $utility = cassiopeia_get_golf_utility_by_id($value['value']);
                if(!empty($utility)) {
                    $_field_c_t_t_utility_options[$value['value']] = $utility->title;
                }

            }
        }
    }else {
        if(!empty($form['#node']->field_c_t_t_parent['und'][0]['nid'])) {
            $parent = node_load($form['#node']->field_c_t_t_parent['und'][0]['nid']);
            if(!empty($parent->field_ctype_utility['und'])) {
                foreach ($parent->field_ctype_utility['und'] as $key => $value) {
                    $utility = cassiopeia_get_golf_utility_by_id($value['value']);
                    if(!empty($utility)) {
                        $_field_c_t_t_utility_options[$value['value']] = $utility->title;
                    }

                }
            }
        }
    }

    $_field_c_t_t_utility_default_value = array();
    if(!empty($form['#node']->field_c_t_t_utility['und'])) {
        foreach ($form['#node']->field_c_t_t_utility['und'] as $key => $value) {
            $_field_c_t_t_utility_default_value[] = $value['value'];

//      todo
        }
    }

    $form['_field_c_t_t_utility'] =  array(
        '#type' => 'select',
        '#title' => 'Tiện ích',
        '#options' => $_field_c_t_t_utility_options,
        '#multiple' => TRUE,
        '#chosen' =>TRUE,
        '#default_value' => $_field_c_t_t_utility_default_value,
        '#weight' =>$form['field_c_t_t_utility']['#weight'],
        '#prefix' => '<div id="_field_c_t_t_utility_wrap_" class="form-group">',
        '#suffix' => '</div>'

    );

    $form['field_c_t_t_utility']['#prefix'] = '<div style="opacity: 0; width: 0px; height: 0px; overflow: hidden;">';
    $form['field_c_t_t_utility']['#suffix'] = '</div>';

    $form['actions']['#weight'] = 1000;

    $form['status'] = $form['options']['status'];
    $form['status']['#weight'] =$form['actions']['#weight'] -1;
    $form['status']['#title'] = 'Tình trạng';
    $form['status']['#type'] =  'radios';
    $form['status']['#options'] =  array(0=> 'Ngừng Hoạt động',1=>'Hoạt động');

    $form['additional_settings']['#access'] = FALSE;


    $form['#validate'][] = '_cassiopeia_form_ctype_tea_time_node_form_alter_validate';
    $form['#submit'][] = "_cassiopeia_form_ctype_tea_time_node_form_alter_submit";

}

function _cassiopeia_form_ctype_tea_time_node_form_alter_validate(&$form, &$form_state) {

}

function _cassiopeia_form_ctype_tea_time_node_form_alter_submit (&$form, &$form_state) {
    $golf = node_load($form_state['values']['field_c_t_t_parent']['und'][0]['nid']);
    $form_state['values']['title'] = $golf->title;
    $_sMinutes = minutes_from_time($form_state['values']['_field_c_t_t_sh']);
    $form_state['values']['field_c_t_t_sh']['und'][0]['value'] = (string)strtotime('+'.$_sMinutes.' minutes', strtotime($form_state['values']['field_c_t_t_date']['und'][0]['value']));
    $form_state['values']['field_c_t_t_utility']['und'] = array();
    foreach ($form_state['values']['_field_c_t_t_utility'] as $key => $value) {
        $form_state['values']['field_c_t_t_utility']['und'][] =  array(
            'value' => (string)$value,
            'weight' => $key,
        );
    }
}


function cassiopeia_form_ctype_tea_time_node_form_parent_ajax_callback ($form, $form_state) {
//  return $form['field_c_t_t_hole'];

    $commands[] = ajax_command_replace('#_field_c_t_t_hole_wrap_', drupal_render($form['field_c_t_t_hole']));
    $commands[] = ajax_command_replace("#_field_c_t_t_utility_wrap_", drupal_render($form['_field_c_t_t_utility']));
    return array('#type' => 'ajax', '#commands' => $commands);
}

function cassiopeia_form_ctype_tea_time_node_form_date_ajax_callback ($form, $form_state) {
    return $form['wrap_hour'];
}


function cassiopeia_remove_tea_times_form ($form, &$form_state) {
    $form = array();
    $golf_options = array();
    $golf = null;

    if (!empty($form_state['values']['golf'])) {
        $golf = node_load($form_state['values']['golf']);
    }

    foreach (cassiopeia_get_all_golf() as $key => $value) {
        $golf_options[$value->nid] = $value->title;
    }

    $_utility_options = array();
    if(!empty($golf->field_ctype_utility['und'])) {
        foreach ($golf->field_ctype_utility['und'] as $key => $value) {
            $_utility_options[$value['value']] = $value['value'];
        }
    }

    $form['golf'] = array(
        '#type' => 'select',
        '#title' => t('Tên sân'),
        '#options' => $golf_options,
        "#empty_option"=>t('- Tên sân -'),
        '#required' => TRUE,
        '#chosen' => TRUE,
    );

    $form['sDate'] = array(
        '#type' => 'date_popup',
        '#default_value' => REQUEST_TIME,
        '#date_type' => DATE_DATETIME,
        '#date_timezone' => date_default_timezone(),
        '#date_format' => 'm/d/Y',
        '#date_increment' => 1,
        '#date_year_range' => '-3:+3',
        '#required' => TRUE,
    );

    $form['eDate'] = array(
        '#type' => 'date_popup',
        '#default_value' => REQUEST_TIME,
        '#date_type' => DATE_DATETIME,
        '#date_timezone' => date_default_timezone(),
        '#date_format' => 'm/d/Y',
        '#date_increment' => 1,
        '#date_year_range' => '-3:+3',
        '#required' => TRUE,
    );


    $form['types'] = array(
        '#type' => 'select',
        '#title' => 'Khung giờ',
        '#options' => cassiopeia_get_tea_time_types(),
        '#multiple' => TRUE,
        '#chosen'=>TRUE
    );

    $hole_options = array();
    foreach (_cassiopeia_get_all_hole() as $_key  => $_value) {
        $hole_options[$_value->hole] = $_value->title;
    }

    $form['holes'] = array(
        '#type' => 'select',
        '#title' => t('Hole'),
        '#options' => $hole_options,
        '#multiple' => TRUE,
        '#chosen'=>TRUE
    );

    $form['#theme'][] = 'cassiopeia_remove_tea_times_form';

    $form['submit'] = array('#type' => 'submit', '#value' => 'Lưu');


    drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/cassiopeia_remove_tea_times_form.js');
    drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/libs/jquery-confirm/jquery-confirm.min.js');
    drupal_add_css(drupal_get_path('module', 'cassiopeia') . '/js/libs/jquery-confirm/jquery-confirm.min.css');

    return $form;
}

function cassiopeia_remove_tea_times_form_validate($form, &$form_state) {
    if (strtotime($form_state['values']['sDate']) > strtotime($form_state['values']['eDate'])) {
        form_set_error('eDate', 'Thời gian kết thúc phải lơn hơn thời gian bắt đầu.');
    }
}

function cassiopeia_remove_tea_times_form_submit($form, &$form_state) {
    $condition = array();
    $condition['condition'] = array();
    $condition['condition']['field_c_t_t_parent'] = $form_state['values']['golf'];
    if (!empty($form_state['values']['sDate']) && !empty($form_state['values']['eDate'])) {
        if ($form_state['values']['sDate'] != $form_state['values']['eDate']) {
            $condition['condition']['date'] = array();
            $condition['condition']['date']['value'] = array(date('Y-m-d H:i:s', strtotime($form_state['values']['sDate'] )), date('Y-m-d H:i:s', strtotime($form_state['values']['eDate'] )));
            $condition['condition']['date']['operator'] = 'BETWEEN';
        }else {
            $condition['condition']['date'] = array();
            $condition['condition']['date']['value'] = date('Y-m-d H:i:s', strtotime($form_state['values']['sDate'] ));
            $condition['condition']['date']['operator'] = '=';
        }
    }

    if (!empty($form_state['values']['types'])) {
        $condition['condition']['field_c_t_t_type'] = array();
        $condition['condition']['field_c_t_t_type']['value'] = $form_state['values']['types'];
        $condition['condition']['field_c_t_t_type']['operator'] = 'IN';
    }

    if (!empty($form_state['values']['holes'])) {
        $condition['condition']['field_c_t_t_hole'] = array();
        $condition['condition']['field_c_t_t_hole']['value'] = $form_state['values']['holes'];
        $condition['condition']['field_c_t_t_hole']['operator'] = 'IN';
    }


    $tea_times = cassiopeia_get_tea_times_by_condition($condition);


//    $db_transaction = db_transaction();
    try {
        $count = 1;
        if (!empty($tea_times) && count($tea_times)>0) {
            foreach ($tea_times as $key => $value) {
                if (empty($value->field_c_t_t_player['und'][0]['value'])) {
                    $check = db_select("golf_booking_tea_time");
                    $check -> fields("golf_booking_tea_time");
                    $check -> condition("tea_time_id",$value->nid,"=");
                    $result = $check -> execute() -> fetchAssoc();
                    if(empty($result)){
                        node_delete($value->nid);
                        $count++;
                    }
                }
            }
            drupal_set_message('Xóa thành công ' .$count.' tee times.');
        }
    }catch (Exception $e) {
//        $db_transaction->rollback();
        drupal_set_message('Hệ thống đang bận vui long quay lại sau it phút.');
    }
}


function cassiopeia_add_tea_times_form ($form, &$form_state) {

    $form = array();
    $golf_options = array();
    $golf = null;
    if (!empty($form_state['values']['golf'])) {
        $golf = node_load($form_state['values']['golf']);
    }

    foreach (cassiopeia_get_all_golf() as $key => $value) {
        $golf_options[$value->nid] = $value->title;
    }

    $_utility_options = array();
    if(!empty($golf->field_ctype_utility['und'])) {
        foreach ($golf->field_ctype_utility['und'] as $key => $value) {
            $utility = cassiopeia_get_golf_utility_by_id($value['value']);
            if(!empty($utility)) {
                $_utility_options[$value['value']] = $utility->title;
            }
        }
    }

    $form['golf'] = array(
        '#type' => 'select',
        '#title' => t('Tên sân'),
        '#options' => $golf_options,
        "#empty_option"=>t('- Tên sân -'),
        '#required' => TRUE,
        '#chosen' => TRUE,
        '#ajax' => array(
            'callback' => 'cassiopeia_add_teatime_ajax_callback',
            'wrapper' => 'teaTimesContainer',
            'method' => 'replace',
            'effect' => 'fade',
            'progress' => array('type' => 'default'),
        ),
    );


    $form['sDate'] = array(
        '#type' => 'date_popup',
        '#default_value' => REQUEST_TIME,
        '#date_type' => DATE_DATETIME,
        '#date_timezone' => date_default_timezone(),
        '#date_format' => 'm/d/Y',
        '#date_increment' => 1,
        '#date_year_range' => '-3:+3',
        '#required' => TRUE,
    );

    $form['eDate'] = array(
        '#type' => 'date_popup',
        '#default_value' => REQUEST_TIME,
        '#date_type' => DATE_DATETIME,
        '#date_timezone' => date_default_timezone(),
        '#date_format' => 'm/d/Y',
        '#date_increment' => 1,
        '#date_year_range' => '-3:+3',
        '#required' => TRUE,
    );


    $form['teaTimeSpace'] = array(
        '#type' => 'textfield',
        '#title' => t('Khoảng thời gian (phút)'),
        '#attributes' => array(
            ' type' => 'number', // insert space before attribute name :)
        ),
        '#required' => TRUE,
    );

    $holes = array();
    if (!empty($golf)) {
        foreach ( _cassiopeia_get_all_hole () as $key => $value ) {
            if (!empty($golf->field_ctype_golf_hole['und'][0]['value']) && $golf->field_ctype_golf_hole['und'][0]['value'] >= $value->hole) {
                $holes[] = $value;
            }

        }
    }

    $form['teaTimes'] = array(
        '#type' => 'container',
        '#prefix' => '<div id="teaTimesContainer">',
        '#suffix' => '</div>',
    );

    $form_state['holes'] = $holes;

    if(!empty($holes)) {

        $dow = array(
            0 => "Thứ 2",
            1 => "Thứ 3",
            2 => "Thứ 4",
            3 => "Thứ 5",
            4 => "Thứ 6",
            5 => "Thứ 7",
            6 => "Chủ nhật",
        );

        $form_state['dows'] = $dow;

        foreach ($holes as $key =>$value) {
            $form['teaTimes']['hole'.$value->hole] = array(
                '#type' => 'fieldset',
                '#title' => $value->hole." hố",
                '#collapsible' => TRUE,
                '#collapsed' => FALSE,
            );
            foreach ($dow as $i =>$v) {
                $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)] = array(
                    '#type' => 'container',
                    '#prefix' => '<div id="teaTimeItem_'.$value->hole.'_'.($i+1).'" class="teaTimeItem"><label style="display: block;">'.$v.'</label>',
                    '#suffix' => '</div>',
                );

                $form_state['hole'.$value->hole.'_dow'.($i+1).'_index'] = isset($form_state['hole'.$value->hole.'_dow'.($i+1).'_index']) ? $form_state['hole'.$value->hole.'_dow'.($i+1).'_index'] : array();
//                print_r($form_state['hole'.$value->hole.'_dow'.($i+1).'_index']);
                foreach ($form_state['hole'.$value->hole.'_dow'.($i+1).'_index'] as $_j => $_jvalue) {

                    $form_state['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_types'] =  isset($form_state['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_types'])? $form_state['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_types']: cassiopeia_get_tea_time_types();

                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue] = array(
                        '#type' => 'container',
                        '#attributes' => array(
                            'class' => array('teaTimeChildItem'),
                        )
                    );
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_sH'] = array(
                        '#required' => TRUE,
                        '#title'=> '',
                        '#type'=> 'date_popup',
                        '#date_format' => 'H:i',
                        '#timepicker' => 'timepicker',
                        '#timepicker_options' => array(
                            'rows' => 4,
                            'hours'=> array(
                                'starts'=> 0,
                                'ends'=> 23
                            ),
                            'showCloseButton' => FALSE,
                            'closeButtonText' => t('Close'),
                            'hourText'=> 'Giờ',
                            'minuteText' => 'Phút',
                            'showMinutes' => TRUE,
                        ),
                    );
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_eH'] = array(
                        '#required' => TRUE,
                        '#title'=> '',
                        '#type'=> 'date_popup',
                        '#date_format' => 'H:i',
                        '#timepicker' => 'timepicker',
                        '#timepicker_options' => array(
                            'rows' => 4,
                            'hours'=> array(
                                'starts'=> 0,
                                'ends'=> 23
                            ),
                            'showCloseButton' => FALSE,
                            'closeButtonText' => t('Close'),
                            'hourText'=> 'Giờ',
                            'minuteText' => 'Phút',
                            'showMinutes' => TRUE,
                        ),
                    );
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_price_clone'] = array(
                        '#type' => 'textfield',
                        '#title' => 'Giá',
                        '#required' => TRUE,
                        '#attributes' => array("class"=>array("hidden")),
                        '#default_value' => 1,
                        "#theme_wrappers" => array(),
//                        '#attributes' => array("class"=>array("input-currency")),
                    );
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_price'] = array(
                        '#type' => 'textfield',
                        '#title' => 'Giá sân',
                        '#required' => TRUE,

//                        "#theme_wrappers" => array()
                    );

                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_aprice_clone'] = array(
                        '#type' => 'textfield',

                        '#required' => TRUE,
                        '#default_value' => 1,
                        '#attributes' => array("class"=>array("hidden")),
                        "#theme_wrappers" => array(),
//                        '#attributes' => array("class"=>array("input-currency")),
                    );
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_aprice'] = array(
                        '#type' => 'textfield',
                        '#title' => 'Giá Alegolf',
                        '#required' => FALSE,

//                        "#theme_wrappers" => array()
                    );

                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_minPlayer'] = array(
                        '#type' => 'textfield',
                        '#title' => 'SL tối thiểu',
                        '#attributes' => array(
                            ' type' => 'number', // insert space before attribute name :)
                        ),
                        '#required' => TRUE,
                        '#default_value' => !empty($form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_minPlayer'])?$form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_minPlayer']:1,
                    );
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_maxPlayer'] = array(
                        '#type' => 'textfield',
                        '#title' => 'SL tối đa',
                        '#attributes' => array(
                            ' type' => 'number',
                        ),
                        '#required' => TRUE,
                        '#default_value' => !empty($form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_maxPlayer'])?$form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_maxPlayer']:4,
                    );
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_type'] = array(
                        '#type' => 'select',
                        '#title' => 'Khung giờ',
                        '#options' => $form_state['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_types'],
                    );
//                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_good_price']  = array(
//                        '#type'          => 'checkbox',
//                        '#default_value' => 0,
//                        '#title'         => t(''),
//                        '#attributes' => array("class"=>array("hidden")),
//                    );
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_live']  = array(
                        '#type'          => 'checkbox',
                        '#default_value' => 0,
                        '#title'         => t(''),
                        '#attributes' => array("class"=>array("hidden")),
                    );
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_options'] = array(
                        '#type' => 'checkboxes',
                        '#title' => '',
                        '#options' => $_utility_options,
                        '#attributes' => array("class"=>array("hidden")),
                    );

                    foreach (language_list('enabled')[1] as $lan_key => $lan_value) {
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_'.$lan_key.'_eoptions'] = array(
                            '#type' => 'text_format',
                            '#title' => 'Mở rộng ('.$lan_key.')',
                            '#format' => 'mod_html',
                            '#rows' => 5,
                        );
                    }

//                    todo
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_remove'] = array(
                        '#type' => 'submit',
                        '#submit' => array('cassiopeia_remove_childteatime_remove_one'),
//            '#text' => '<span class="fa fa-times"></span>',
                        '#text' => '<span class="icon glyphicon glyphicon-trash" aria-hidden="true"></span>',
                        '#value' =>'hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_remove',
                        '#attributes' => array(
                            'class' => array('close teaTimeChildItemRemove'), // insert space before attribute name :)
                        ),
                        '#ajax' => array(
                            'callback' => 'cassiopeia_remove_childteatime_ajax_callback',
                            //                          'wrapper' => 'hole_'.$value->hole.'_dow'.($i+1).'_addMore_wrapper',
//              'wrapper' => 'teaTimeItem_'.$value->hole.'_'.($i+1),
                            'wrapper' => 'teaTimesContainer',
                            'method' => 'replace',
                            'effect' => 'fade',
                        ),
                    );
                }

                $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['hole'.$value->hole.'_dow'.($i+1).'_addMore_wrapper'] = array(
                    '#markup' => '<div id="'.'hole'.$value->hole.'_dow'.($i+1).'_addMore_wrapper'.'"></div>'
                );
                $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['hole'.$value->hole.'_dow'.($i+1).'_addMore'] = array(
                    '#type' => 'submit',
                    '#submit' => array('cassiopeia_add_childteatime_add_one'),
                    '#value' => 'hole'.$value->hole.'_dow'.($i+1).'_addMore',
                    '#text' => '<span class="icon glyphicon glyphicon-plus" aria-hidden="true"></span> ',
                    '#attributes' => array(
                        'class' => array('btn close teaTimeAddMore'),
                        'type' => 'button',
                    ),
                    '#ajax' => array(
                        'callback' => 'cassiopeia_add_childteatime_ajax_callback',
                        'wrapper' => 'teaTimesContainer',
                        'method' => 'replace',
                        'effect' => 'fade',
                    ),
                );
            }


        }
    }

    $form['#theme'][] = 'cassiopeia_add_tea_times_form';
    if(!empty($form_state['values']['golf'])){
        $form['teaTimes']['backup_data'] = array(

            '#type' =>
                'checkbox',

            '#title' => t('Lưu cache'),
        );
        $form['teaTimes']['copy_data'] = array(

            '#type' =>
                'checkbox',

            '#title' => t('Copy tee time'),
//            '#attributes' => array("class"=>array("hidden"))
        );
    }

    $form['teaTimes']['submit'] = array(
        '#type' => 'submit',
        '#value' => 'Lưu',

    );


    return $form;
}
function cassiopeia_add_tea_times_form_from_copy ($form, &$form_state,$data) {
    $form = array();
    $golf_options = array();
    $golf = null;
//    $data = unserialize($backup['data']);
    $_utility_options = array();
    $golf = node_load($data['form_state']['golf']);
    if(!empty($golf->field_ctype_utility['und'])) {
        foreach ($golf->field_ctype_utility['und'] as $key => $value) {
            $utility = cassiopeia_get_golf_utility_by_id($value['value']);
            if(!empty($utility)) {
                $_utility_options[$value['value']] = $utility->title;
            }
        }
    }
    $golf_options[$golf->nid] = $golf -> title;
    $form['golf'] = array(
        '#type' => 'select',
        '#title' => t('Tên sân'),
        '#options' => $golf_options,
        "#empty_option"=>t('- Tên sân -'),
        '#default_value' => $golf->nid,
        '#required' => TRUE,
        '#chosen' => TRUE,
        '#ajax' => array(
            'callback' => 'cassiopeia_add_teatime_ajax_callback',
            'wrapper' => 'teaTimesContainer',
            'method' => 'replace',
            'effect' => 'fade',
            'progress' => array('type' => 'default'),
        ),
    );


    $form['sDate'] = array(
        '#type' => 'date_popup',
        '#default_value' => date('Y-m-d H:i:s', strtotime($data['form_state']['sDate'])),
        '#date_type' => DATE_DATETIME,
        '#date_timezone' => date_default_timezone(),
        '#date_format' => 'm/d/Y',
        '#date_increment' => 1,
        '#date_year_range' => '-3:+3',
        '#required' => TRUE,
    );
//    $form['sDate']['#default_value'] = '1992/01/01';
    $form['eDate'] = array(
        '#type' => 'date_popup',
        '#default_value' => date('Y-m-d H:i:s', strtotime($data['form_state']['eDate'])),
        '#date_type' => DATE_DATETIME,
        '#date_timezone' => date_default_timezone(),
        '#date_format' => 'm/d/Y',
        '#date_increment' => 1,
        '#date_year_range' => '-3:+3',
        '#required' => TRUE,
    );


    $form['teaTimeSpace'] = array(
        '#type' => 'textfield',
        '#title' => t('Khoảng thời gian'),
        '#attributes' => array(
            ' type' => 'number', // insert space before attribute name :)
        ),
        '#required' => TRUE,
        '#default_value' => $data['form_state']['teaTimeSpace'],
    );

    $holes = array();
    if (!empty($golf)) {
        foreach ( _cassiopeia_get_all_hole () as $key => $value ) {
            if (!empty($golf->field_ctype_golf_hole['und'][0]['value']) && $golf->field_ctype_golf_hole['und'][0]['value'] >= $value->hole) {
                $holes[] = $value;
            }

        }
    }

    $form['teaTimes'] = array(
        '#type' => 'container',
        '#prefix' => '<div id="teaTimesContainer">',
        '#suffix' => '</div>',
    );

    $form_state['holes'] = $holes;

    if(!empty($holes)) {

        $dow = array(
            0 => "Thứ 2",
            1 => "Thứ 3",
            2 => "Thứ 4",
            3 => "Thứ 5",
            4 => "Thứ 6",
            5 => "Thứ 7",
            6 => "Chủ nhật",
        );

        $form_state['dows'] = $dow;

        foreach ($holes as $key =>$value) {
            $form['teaTimes']['hole'.$value->hole] = array(
                '#type' => 'fieldset',
                '#title' => $value->hole." hố",
                '#collapsible' => TRUE,
                '#collapsed' => FALSE,
            );
            foreach ($dow as $i =>$v) {
                $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)] = array(
                    '#type' => 'container',
                    '#prefix' => '<div id="teaTimeItem_'.$value->hole.'_'.($i+1).'" class="teaTimeItem"><label style="display: block;">'.$v.'</label>',
                    '#suffix' => '</div>',
                );
                if(!empty($data['hole_'.$value->hole]['dows_'.($i+1)])){
                    $data_index = array();
                    for($__i=0;$__i<count($data['hole_'.$value->hole]['dows_'.($i+1)]);$__i++){
                        $data_index[] = $__i;
                    }
                    $form_state['hole'.$value->hole.'_dow'.($i+1).'_index'] = isset($form_state['hole'.$value->hole.'_dow'.($i+1).'_index']) ? $form_state['hole'.$value->hole.'_dow'.($i+1).'_index'] :$data_index;
                }else{
                    $form_state['hole'.$value->hole.'_dow'.($i+1).'_index'] = isset($form_state['hole'.$value->hole.'_dow'.($i+1).'_index']) ? $form_state['hole'.$value->hole.'_dow'.($i+1).'_index'] : array();
                }

                foreach ($form_state['hole'.$value->hole.'_dow'.($i+1).'_index'] as $_j => $_jvalue) {

                    $form_state['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_types'] =  isset($form_state['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_types'])? $form_state['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_types']: cassiopeia_get_tea_time_types();
//                    $form_state['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_types'] =     cassiopeia_get_tea_time_types();

                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue] = array(
                        '#type' => 'container',
                        '#attributes' => array(
                            'class' => array('teaTimeChildItem'),
                        )
                    );
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_sH'] = array(
                        '#required' => TRUE,
                        '#title'=> '',
                        '#type'=> 'date_popup',
                        '#date_format' => 'H:i',
                        '#timepicker' => 'timepicker',
                        '#timepicker_options' => array(
                            'rows' => 4,
                            'hours'=> array(
                                'starts'=> 0,
                                'ends'=> 23
                            ),
                            'showCloseButton' => FALSE,
                            'closeButtonText' => t('Close'),
                            'hourText'=> 'Giờ',
                            'minuteText' => 'Phút',
                            'showMinutes' => TRUE,
                        ),
                    );
                    if(!empty($form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_sH'])){
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_sH']['#default_value'] = $form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_sH'];
                    }else{
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_sH']['#default_value'] = date("Y-m-d H:i",strtotime($data['hole_'.$value->hole]['dows_'.($i+1)][$_jvalue]['sH']));
                    }
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_eH'] = array(
                        '#required' => TRUE,
                        '#title'=> '',
                        '#type'=> 'date_popup',
                        '#date_format' => 'H:i',
                        '#timepicker' => 'timepicker',
                        '#timepicker_options' => array(
                            'rows' => 4,
                            'hours'=> array(
                                'starts'=> 0,
                                'ends'=> 23
                            ),
                            'showCloseButton' => FALSE,
                            'closeButtonText' => t('Close'),
                            'hourText'=> 'Giờ',
                            'minuteText' => 'Phút',
                            'showMinutes' => TRUE,
                        ),
                    );
                    if(!empty($form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_eH'])){
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_eH']['#default_value'] = $form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_eH'];
                    }else{
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_eH']['#default_value'] = date("Y-m-d H:i",strtotime($data['hole_'.$value->hole]['dows_'.($i+1)][$_jvalue]['eH']));
                    }
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_price_clone'] = array(
                        '#type' => 'textfield',
                        '#title' => 'Giá',
                        '#required' => TRUE,
                        '#attributes' => array("class"=>array("hidden")),
                        '#default_value' => 1,
                        "#theme_wrappers" => array(),
//                        '#attributes' => array("class"=>array("input-currency")),
                    );

                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_price'] = array(
                        '#type' => 'textfield',
                        '#title' => 'Giá sân',
                        '#required' => TRUE,
//                        "#theme_wrappers" => array()
                    );
                    if(!empty($form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_price'])){
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_price']['#default_value'] = $form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_price'];
                    }else{
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_price']['#default_value'] = $data['hole_'.$value->hole]['dows_'.($i+1)][$_jvalue]['price'];
                    }
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_aprice_clone'] = array(
                        '#type' => 'textfield',

                        '#required' => TRUE,
                        '#default_value' => 1,
                        '#attributes' => array("class"=>array("hidden")),
                        "#theme_wrappers" => array(),
//                        '#attributes' => array("class"=>array("input-currency")),
                    );
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_aprice'] = array(
                        '#type' => 'textfield',
                        '#title' => 'Giá Alegolf',
                        '#required' => TRUE,

//                        "#theme_wrappers" => array()
                    );
                    if(!empty($form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_aprice'])){
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_aprice']['#default_value'] = $form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_aprice'];
                    }else{
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_aprice']['#default_value'] = $data['hole_'.$value->hole]['dows_'.($i+1)][$_jvalue]['aprice'];
                    }
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_minPlayer'] = array(
                        '#type' => 'textfield',
                        '#title' => 'SL tối thiểu',
                        '#attributes' => array(
                            ' type' => 'number', // insert space before attribute name :)
                        ),
                        '#required' => TRUE,
                        '#default_value' => !empty($form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_minPlayer'])?$form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_minPlayer']:1,
                    );
                    if(!empty($form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_minPlayer'])){
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_minPlayer']['#default_value'] = $form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_minPlayer'];
                    }else{
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_minPlayer']['#default_value'] = $data['hole_'.$value->hole]['dows_'.($i+1)][$_jvalue]['minPlayer'];
                    }
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_maxPlayer'] = array(
                        '#type' => 'textfield',
                        '#title' => 'SL tối đa',
                        '#attributes' => array(
                            ' type' => 'number',
                        ),
                        '#required' => TRUE,
                        '#default_value' => !empty($form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_maxPlayer'])?$form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_maxPlayer']:4,
                    );
                    if(!empty($form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_maxPlayer'])){
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_maxPlayer']['#default_value'] = $form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_maxPlayer'];
                    }else{
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_maxPlayer']['#default_value'] = $data['hole_'.$value->hole]['dows_'.($i+1)][$_jvalue]['maxPlayer'];
                    }
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_type'] = array(
                        '#type' => 'select',
                        '#title' => 'Khung giờ',
                        '#options' => $form_state['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_types'],
                    );
                    if(!empty($form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_type'])){
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_type']['#default_value'] = $form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_type'];
                    }else{
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_type']['#default_value'] = $data['hole_'.$value->hole]['dows_'.($i+1)][$_jvalue]['type'];
                    }
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_live']  = array(
                        '#type'          => 'checkbox',
//                        '#default_value' => 0,
                        '#title'         => t(''),
                        '#attributes' => array("class"=>array("hidden")),
                    );
                    if(!empty($form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_live'])){
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_live']['#default_value'] = $form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_live'];
                    }else{
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_live']['#default_value'] = $data['hole_'.$value->hole]['dows_'.($i+1)][$_jvalue]['live'];
                    }
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_options'] = array(
                        '#type' => 'checkboxes',
                        '#title' => '',
                        '#options' => $_utility_options,
                        '#attributes' => array("class"=>array("hidden")),
                    );

                    foreach (language_list('enabled')[1] as $lan_key => $lan_value) {
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_'.$lan_key.'_eoptions'] = array(
                            '#type' => 'text_format',
                            '#title' => 'Mở rộng ('.$lan_key.')',
                            '#format' => 'mod_html',
                            '#rows' => 5,
                        );
                        if(!empty($form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_'.$lan_key.'_eoptions'])){
                            $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_'.$lan_key.'_eoptions']['#default_value'] = $form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_'.$lan_key.'_eoptions'];
                        }else{
                            $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_'.$lan_key.'_eoptions']['#default_value'] = $data['hole_'.$value->hole]['dows_'.($i+1)][$_jvalue]['eutilitys'][$lan_key][0]['value'];
                        }
                    }

                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_remove'] = array(
                        '#type' => 'submit',
                        '#submit' => array('cassiopeia_remove_childteatime_remove_one'),
//            '#text' => '<span class="fa fa-times"></span>',
                        '#text' => '<span class="icon glyphicon glyphicon-trash" aria-hidden="true"></span>',
                        '#value' =>'hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_remove',
                        '#attributes' => array(
                            'class' => array('close teaTimeChildItemRemove'), // insert space before attribute name :)
                        ),
                        '#ajax' => array(
                            'callback' => 'cassiopeia_remove_childteatime_ajax_callback',
                            //                          'wrapper' => 'hole_'.$value->hole.'_dow'.($i+1).'_addMore_wrapper',
//              'wrapper' => 'teaTimeItem_'.$value->hole.'_'.($i+1),
                            'wrapper' => 'teaTimesContainer',
                            'method' => 'replace',
                            'effect' => 'fade',
                        ),
                    );
                }

                $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['hole'.$value->hole.'_dow'.($i+1).'_addMore_wrapper'] = array(
                    '#markup' => '<div id="'.'hole'.$value->hole.'_dow'.($i+1).'_addMore_wrapper'.'"></div>'
                );
                $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['hole'.$value->hole.'_dow'.($i+1).'_addMore'] = array(
                    '#type' => 'submit',
                    '#submit' => array('cassiopeia_add_childteatime_add_one'),
                    '#value' => 'hole'.$value->hole.'_dow'.($i+1).'_addMore',
//          '#text' => '<span class="fa fa-plus"></span>',
//                    '#title' => "Thêm khung giờ",
                    '#text' => '<span class="icon glyphicon glyphicon-plus" aria-hidden="true"></span> ',
                    '#attributes' => array(
                        'class' => array('btn close teaTimeAddMore'),
                        'type' => 'button',
                    ),
                    '#ajax' => array(
                        'callback' => 'cassiopeia_add_childteatime_ajax_callback',
//                          'wrapper' => 'hole_'.$value->hole.'_dow'.($i+1).'_addMore_wrapper',
//            'wrapper' => 'teaTimeItem_'.$value->hole.'_'.($i+1),
                        'wrapper' => 'teaTimesContainer',
                        'method' => 'replace',
                        'effect' => 'fade',
                    ),
                );
            }


        }
    }

    $form['#theme'][] = 'cassiopeia_add_tea_times_form';
//    if(!empty($form_state['values']['golf'])){
    $form['teaTimes']['backup_data'] = array(

        '#type' =>
            'checkbox',

        '#title' => t('Lưu cache'),
    );
//    }
    $form['submit'] = array('#type' => 'submit', '#value' => 'Lưu');
    $form['restore'] = array(

        '#type'     => 'button',

        '#value' => t('Lấy dữ liệu cũ'),

        '#weight' => 19,
        '#ajax' => array(
            'callback' => 'ajax_get_backup_data',
            'wrapper' => 'teaTimesContainer',
            'method' => 'replace',
            'effect' => 'fade',
            'progress' => array('type' => 'default'),
        ),
    );

    return $form;
}
function cassiopeia_add_tea_times_form_from_copy_submit ($form, &$form_state) {
    global $user;
    $datas = cassiopeia_add_tea_times_get_data($form_state);

    $operations = array();

    $_s_date = strtotime($datas['sDate']);
    $_e_date = strtotime($datas['eDate']);
    $_ranger_date = floor (abs($_s_date - $_e_date)/(60*60*24));


    $_list_day_mondays = array();
    $_list_day_tuesdays = array();
    $_list_day_wednesdays = array();
    $_list_day_thursdays = array();
    $_list_day_fridays = array();
    $_list_day_saturdays = array();
    $_list_day_sundays = array();


    for ($i =0 ; $i <= $_ranger_date; $i++) {
        $_date =  strtotime("+".$i." day",$_s_date );
        if (isWeekend($_date) == 0) {
            $_list_day_sundays[] = $_date;
        }
        elseif (isWeekend($_date) == 1) {
            $_list_day_mondays[] = $_date;
        }
        elseif (isWeekend($_date) == 2) {
            $_list_day_tuesdays[] = $_date;
        }
        elseif (isWeekend($_date) == 3) {
            $_list_day_wednesdays[] = $_date;
        }
        elseif (isWeekend($_date) == 4) {
            $_list_day_thursdays[] = $_date;
        }
        elseif (isWeekend($_date) == 5) {
            $_list_day_fridays[] = $_date;
        }
        elseif (isWeekend($_date) == 6) {
            $_list_day_saturdays[] = $_date;
        }
    }

    $golf = node_load($datas['golf']);
    $backup = array();
//    print_r($datas['values']);
    foreach ($datas['values'] as $key => $value) {
        foreach ($value['dows'] as $_key => $_value) {
            if(!empty($_value['values'])){
                $backup['hole_'.$value['hole']->hole]['dows_'.$_value['dow']['key']] = $_value['values'];
            }
            if ($_value['dow']['key'] == 1) {
                foreach ($_list_day_mondays as $_list_day_mondays_key => $_list_day_mondays_value) {
                    foreach ($_value['values'] as $__key => $__value) {
                        $_ranger_hour = floor((strtotime("+".minutes_from_time($__value['eH'])." minutes",$_list_day_mondays_value)  - strtotime("+".minutes_from_time($__value['sH'])." minutes",$_list_day_mondays_value))/(60*$datas['space']));
                        for ($i = 0; $i<= $_ranger_hour; $i++) {
                            $_sMinutes = minutes_from_time($__value['sH']) + $i*$datas['space'];
                            $time = array(
                                'title'=>$golf->title,
                                'c_t_t_type' => $__value['type'],
                                'live' => $__value['live'],
                                'c_t_t_hole' => $value['hole']->hole,
                                'c_t_t_sh' => strtotime("+".$_sMinutes." minutes",$_list_day_mondays_value),
                                'field_c_t_t_parent' => $datas['golf'],
                                'field_c_t_t_price' => $__value['price'],
                                'field_c_t_t_a_price' => $__value['aprice'],
                                'field_c_t_t_min_player' => $__value['minPlayer'],
                                'field_c_t_t_max_player' => $__value['maxPlayer'],
                                'field_c_t_t_date' => $_list_day_mondays_value
                            );

                            if (!empty($__value['utilitys'])) {
                                $time['field_c_t_t_utility'] = $__value['utilitys'];
                            }

                            if (!empty($__value['eutilitys'])) {
                                $time['field_c_t_t_e_utility'] = $__value['eutilitys'];
                            }

                            $operations[] = array('_batch_cassiopeia_add_tea_time', array($time));
                        }
                    }
                }
            }
            elseif ($_value['dow']['key'] == 2) {
                foreach ($_list_day_tuesdays as $_list_day_tuesdays_key => $_list_day_tuesdays_value) {
                    foreach ($_value['values'] as $__key => $__value) {

                        $_ranger_hour = floor((strtotime("+".minutes_from_time($__value['eH'])." minutes",$_list_day_tuesdays_value)  - strtotime("+".minutes_from_time($__value['sH'])." minutes",$_list_day_tuesdays_value))/(60*$datas['space']));
                        for ($i = 0; $i<= $_ranger_hour; $i++) {
                            $_sMinutes = minutes_from_time($__value['sH']) + $i*$datas['space'];
                            $time = array(
                                'title'=>$golf->title,
                                'c_t_t_type' => $__value['type'],
                                'live' => $__value['live'],
                                'c_t_t_hole' => $value['hole']->hole,
                                'c_t_t_sh' => strtotime("+".$_sMinutes." minutes",$_list_day_tuesdays_value),
                                'field_c_t_t_parent' => $datas['golf'],
                                'field_c_t_t_price' => $__value['price'],
                                'field_c_t_t_a_price' => $__value['aprice'],
                                'field_c_t_t_min_player' => $__value['minPlayer'],
                                'field_c_t_t_max_player' => $__value['maxPlayer'],
                                'field_c_t_t_date' => $_list_day_tuesdays_value
                            );

                            if (!empty($__value['utilitys'])) {
                                $time['field_c_t_t_utility'] = $__value['utilitys'];
                            }

                            if (!empty($__value['eutilitys'])) {
                                $time['field_c_t_t_e_utility'] = $__value['eutilitys'];
                            }

                            $operations[] = array('_batch_cassiopeia_add_tea_time', array($time));
                        }

                    }

                }
            }
            elseif ($_value['dow']['key'] == 3) {
                foreach ($_list_day_wednesdays as $_list_day_wednesdays_key => $_list_day_wednesdays_value) {
                    foreach ($_value['values'] as $__key => $__value) {

                        $_ranger_hour = floor((strtotime("+".minutes_from_time($__value['eH'])." minutes",$_list_day_wednesdays_value)  - strtotime("+".minutes_from_time($__value['sH'])." minutes",$_list_day_wednesdays_value))/(60*$datas['space']));
                        for ($i = 0; $i<= $_ranger_hour; $i++) {
                            $_sMinutes = minutes_from_time($__value['sH']) + $i*$datas['space'];
                            $time = array(
                                'title'=>$golf->title,
                                'c_t_t_type' => $__value['type'],
                                'live' => $__value['live'],
                                'c_t_t_hole' => $value['hole']->hole,
                                'c_t_t_sh' => strtotime("+".$_sMinutes." minutes",$_list_day_wednesdays_value),
                                'field_c_t_t_parent' => $datas['golf'],
                                'field_c_t_t_price' => $__value['price'],
                                'field_c_t_t_a_price' => $__value['aprice'],
                                'field_c_t_t_min_player' => $__value['minPlayer'],
                                'field_c_t_t_max_player' => $__value['maxPlayer'],
                                'field_c_t_t_date' => $_list_day_wednesdays_value
                            );
                            if (!empty($__value['utilitys'])) {
                                $time['field_c_t_t_utility'] = $__value['utilitys'];
                            }
                            if (!empty($__value['eutilitys'])) {
                                $time['field_c_t_t_e_utility'] = $__value['eutilitys'];
                            }

                            $operations[] = array('_batch_cassiopeia_add_tea_time', array($time));
                        }

                    }

                }
            }
            elseif ($_value['dow']['key'] == 4) {
                foreach ($_list_day_thursdays as $_list_day_thursdays_key => $_list_day_thursdays_value) {
                    foreach ($_value['values'] as $__key => $__value) {

                        $_ranger_hour = floor((strtotime("+".minutes_from_time($__value['eH'])." minutes",$_list_day_thursdays_value)  - strtotime("+".minutes_from_time($__value['sH'])." minutes",$_list_day_thursdays_value))/(60*$datas['space']));
                        for ($i = 0; $i<= $_ranger_hour; $i++) {
                            $_sMinutes = minutes_from_time($__value['sH']) + $i*$datas['space'];
                            $time = array(
                                'title'=>$golf->title,
                                'c_t_t_type' => $__value['type'],
                                'live' => $__value['live'],
                                'c_t_t_hole' => $value['hole']->hole,
                                'c_t_t_sh' => strtotime("+".$_sMinutes." minutes",$_list_day_thursdays_value),
                                'field_c_t_t_parent' => $datas['golf'],
                                'field_c_t_t_price' => $__value['price'],
                                'field_c_t_t_a_price' => $__value['aprice'],
                                'field_c_t_t_min_player' => $__value['minPlayer'],
                                'field_c_t_t_max_player' => $__value['maxPlayer'],
                                'field_c_t_t_date' => $_list_day_thursdays_value
                            );
                            if (!empty($__value['utilitys'])) {
                                $time['field_c_t_t_utility'] = $__value['utilitys'];
                            }

                            if (!empty($__value['eutilitys'])) {
                                $time['field_c_t_t_e_utility'] = $__value['eutilitys'];
                            }
                            $operations[] = array('_batch_cassiopeia_add_tea_time', array($time));
                        }

                    }

                }
            }
            elseif ($_value['dow']['key'] == 5) {
                foreach ($_list_day_fridays as $_list_day_fridays_key => $_list_day_fridays_value) {
                    foreach ($_value['values'] as $__key => $__value) {

                        $_ranger_hour = floor((strtotime("+".minutes_from_time($__value['eH'])." minutes",$_list_day_fridays_value)  - strtotime("+".minutes_from_time($__value['sH'])." minutes",$_list_day_fridays_value))/(60*$datas['space']));
                        for ($i = 0; $i<= $_ranger_hour; $i++) {
                            $_sMinutes = minutes_from_time($__value['sH']) + $i*$datas['space'];
                            $time = array(
                                'title'=>$golf->title,
                                'c_t_t_type' => $__value['type'],
                                'live' => $__value['live'],
                                'c_t_t_hole' => $value['hole']->hole,
                                'c_t_t_sh' => strtotime("+".$_sMinutes." minutes",$_list_day_fridays_value),
                                'field_c_t_t_parent' => $datas['golf'],
                                'field_c_t_t_price' => $__value['price'],
                                'field_c_t_t_a_price' => $__value['aprice'],
                                'field_c_t_t_min_player' => $__value['minPlayer'],
                                'field_c_t_t_max_player' => $__value['maxPlayer'],
                                'field_c_t_t_date' => $_list_day_fridays_value
                            );
                            if (!empty($__value['utilitys'])) {
                                $time['field_c_t_t_utility'] = $__value['utilitys'];
                            }

                            if (!empty($__value['eutilitys'])) {
                                $time['field_c_t_t_e_utility'] = $__value['eutilitys'];
                            }
                            $operations[] = array('_batch_cassiopeia_add_tea_time', array($time));
                        }

                    }

                }
            }
            elseif ($_value['dow']['key'] == 6) {
                foreach ($_list_day_saturdays as $_list_day_saturdays_key => $_list_day_saturdays_value) {
                    foreach ($_value['values'] as $__key => $__value) {

                        $_ranger_hour = floor((strtotime("+".minutes_from_time($__value['eH'])." minutes",$_list_day_saturdays_value)  - strtotime("+".minutes_from_time($__value['sH'])." minutes",$_list_day_saturdays_value))/(60*$datas['space']));
                        for ($i = 0; $i<= $_ranger_hour; $i++) {
                            $_sMinutes = minutes_from_time($__value['sH']) + $i*$datas['space'];
                            $time = array(
                                'title'=>$golf->title,
                                'c_t_t_type' => $__value['type'],
                                'live' => $__value['live'],
                                'c_t_t_hole' => $value['hole']->hole,
                                'c_t_t_sh' => strtotime("+".$_sMinutes." minutes",$_list_day_saturdays_value),
                                'field_c_t_t_parent' => $datas['golf'],
                                'field_c_t_t_price' => $__value['price'],
                                'field_c_t_t_a_price' => $__value['aprice'],
                                'field_c_t_t_min_player' => $__value['minPlayer'],
                                'field_c_t_t_max_player' => $__value['maxPlayer'],
                                'field_c_t_t_date' => $_list_day_saturdays_value
                            );
                            if (!empty($__value['utilitys'])) {
                                $time['field_c_t_t_utility'] = $__value['utilitys'];
                            }
                            if (!empty($__value['eutilitys'])) {
                                $time['field_c_t_t_e_utility'] = $__value['eutilitys'];
                            }
                            $operations[] = array('_batch_cassiopeia_add_tea_time', array($time));
                        }

                    }

                }
            }
            elseif ($_value['dow']['key'] == 7) {
//                print_r($_value['values']);
                foreach ($_list_day_sundays as $_list_day_sundays_key => $_list_day_sundays_value) {
                    foreach ($_value['values'] as $__key => $__value) {
//                        print(1);
                        $_ranger_hour = floor((strtotime("+".minutes_from_time($__value['eH'])." minutes",$_list_day_sundays_value)  - strtotime("+".minutes_from_time($__value['sH'])." minutes",$_list_day_sundays_value))/(60*$datas['space']));
                        for ($i = 0; $i<= $_ranger_hour; $i++) {
                            $_sMinutes = minutes_from_time($__value['sH']) + $i*$datas['space'];
                            $time = array(
                                'title'=>$golf->title,
                                'c_t_t_type' => $__value['type'],
                                'live' => $__value['live'],
                                'c_t_t_hole' => $value['hole']->hole,
                                'c_t_t_sh' => strtotime("+".$_sMinutes." minutes",$_list_day_sundays_value),
                                'field_c_t_t_parent' => $datas['golf'],
                                'field_c_t_t_price' => $__value['price'],
                                'field_c_t_t_a_price' => $__value['aprice'],
                                'field_c_t_t_min_player' => $__value['minPlayer'],
                                'field_c_t_t_max_player' => $__value['maxPlayer'],
                                'field_c_t_t_date' => $_list_day_sundays_value
                            );
                            if (!empty($__value['utilitys'])) {
                                $time['field_c_t_t_utility'] = $__value['utilitys'];
                            }
                            if (!empty($__value['eutilitys'])) {
                                $time['field_c_t_t_e_utility'] = $__value['eutilitys'];
                            }
                            $operations[] = array('_batch_cassiopeia_add_tea_time', array($time));
//                            print(date("d/m/Y H:i",$time['c_t_t_sh'])."<>");
                        }
                    }
//                    die;
                }
//                    print($_value['dow']['key']);
            }
        }
    }

//    die;
    if (count($operations) > 1092) {
        drupal_set_message('Dữ liệu hiện tại là ' . count($operations) . ' quá lớn hơn 1092 vui lòng chọn lại', 'error');
    }else {

        $batch = array(
            'title' => t('create tee time data'),
            'operations' => $operations,
            'progress_message' => t('Create @current out of @total.'),
            'error_message' => t('Error!'),
            'finished' => '_batch_cassiopeia_add_tea_time_finished',
        );
//        print_r($form_state['values']);die;
        if($form_state['values']['backup_data']==1){
            try{
                db_insert("backup_teetime_create")
                    ->fields(array(
                        'uid'       => $user->uid,
                        'title'     => "Sân: ".$golf->title,
                        "created"   => REQUEST_TIME,
                        "data"      => serialize($backup),
                        'golf_id'   => $golf->nid,
                        'user' => user_load($user->uid)->name,
                        'start_date' => strtotime($form_state['values']['sDate']),
                        'end_date' => strtotime($form_state['values']['eDate']),
                        'teaTimeSpace' => (int)$form_state['values']['teaTimeSpace']
                    ))->execute();
            }catch (Exception $e){
                print($e);
            }
        }
//        die;
        batch_set($batch);
    }



}
function cassiopeia_add_tea_times_form_from_cache ($form, &$form_state,$backup) {
    $form = array();
    $golf_options = array();
    $golf = null;
    $data = unserialize($backup['data']);
    $_utility_options = array();
    $golf = node_load($backup['golf_id']);
    if(!empty($golf->field_ctype_utility['und'])) {
        foreach ($golf->field_ctype_utility['und'] as $key => $value) {
            $utility = cassiopeia_get_golf_utility_by_id($value['value']);
            if(!empty($utility)) {
                $_utility_options[$value['value']] = $utility->title;
            }
        }
    }
    $form['#backup_id'] = $backup['id'];
    $golf_options[$golf->nid] = $golf -> title;
    $form['golf'] = array(
        '#type' => 'select',
        '#title' => t('Tên sân'),
        '#options' => $golf_options,
        '#default_value' => $golf->nid,
//        "#empty_option"=>t('- Tên sân -'),
        '#required' => TRUE,
//        '#chosen' => TRUE,
//        '#ajax' => array(
//            'callback' => 'cassiopeia_add_teatime_ajax_callback',
//            'wrapper' => 'teaTimesContainer',
//            'method' => 'replace',
//            'effect' => 'fade',
//            'progress' => array('type' => 'default'),
//        ),
    );


    $form['sDate'] = array(
        '#type' => 'date_popup',
        '#default_value' => date('Y-m-d H:i:s', $backup['start_date']),
        '#date_type' => DATE_DATETIME,
        '#date_timezone' => date_default_timezone(),
        '#date_format' => 'm/d/Y',
        '#date_increment' => 1,
        '#date_year_range' => '-3:+3',
        '#required' => TRUE,
    );
//    $form['sDate']['#default_value'] = '1992/01/01';
    $form['eDate'] = array(
        '#type' => 'date_popup',
        '#default_value' => date('Y-m-d H:i:s', $backup['end_date']),
        '#date_type' => DATE_DATETIME,
        '#date_timezone' => date_default_timezone(),
        '#date_format' => 'm/d/Y',
        '#date_increment' => 1,
        '#date_year_range' => '-3:+3',
        '#required' => TRUE,
    );


    $form['teaTimeSpace'] = array(
        '#type' => 'textfield',
        '#title' => t('Khoảng thời gian'),
        '#attributes' => array(
            ' type' => 'number', // insert space before attribute name :)
        ),
        '#required' => TRUE,
        '#default_value' => $backup['teaTimeSpace'],
    );

    $holes = array();
    if (!empty($golf)) {
        foreach ( _cassiopeia_get_all_hole () as $key => $value ) {
            if (!empty($golf->field_ctype_golf_hole['und'][0]['value']) && $golf->field_ctype_golf_hole['und'][0]['value'] >= $value->hole) {
                $holes[] = $value;
            }

        }
    }

    $form['teaTimes'] = array(
        '#type' => 'container',
        '#prefix' => '<div id="teaTimesContainer">',
        '#suffix' => '</div>',
    );

    $form_state['holes'] = $holes;

    if(!empty($holes)) {

        $dow = array(
            0 => "Thứ 2",
            1 => "Thứ 3",
            2 => "Thứ 4",
            3 => "Thứ 5",
            4 => "Thứ 6",
            5 => "Thứ 7",
            6 => "Chủ nhật",
        );

        $form_state['dows'] = $dow;

        foreach ($holes as $key =>$value) {
            $form['teaTimes']['hole'.$value->hole] = array(
                '#type' => 'fieldset',
                '#title' => $value->hole." hố",
                '#collapsible' => TRUE,
                '#collapsed' => FALSE,
            );
            foreach ($dow as $i =>$v) {
                $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)] = array(
                    '#type' => 'container',
                    '#prefix' => '<div id="teaTimeItem_'.$value->hole.'_'.($i+1).'" class="teaTimeItem"><label style="display: block;">'.$v.'</label>',
                    '#suffix' => '</div>',
                );
                if(!empty($data['hole_'.$value->hole]['dows_'.($i+1)])){
                    $data_index = array();
                    for($__i=0;$__i<count($data['hole_'.$value->hole]['dows_'.($i+1)]);$__i++){
                        $data_index[] = $__i;
                    }
                    $form_state['hole'.$value->hole.'_dow'.($i+1).'_index'] = isset($form_state['hole'.$value->hole.'_dow'.($i+1).'_index']) ? $form_state['hole'.$value->hole.'_dow'.($i+1).'_index'] :$data_index;
                }else{
                    $form_state['hole'.$value->hole.'_dow'.($i+1).'_index'] = isset($form_state['hole'.$value->hole.'_dow'.($i+1).'_index']) ? $form_state['hole'.$value->hole.'_dow'.($i+1).'_index'] : array();
                }

                foreach ($form_state['hole'.$value->hole.'_dow'.($i+1).'_index'] as $_j => $_jvalue) {

                    $form_state['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_types'] =  isset($form_state['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_types'])? $form_state['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_types']: cassiopeia_get_tea_time_types();
//                    $form_state['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_types'] =     cassiopeia_get_tea_time_types();

                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue] = array(
                        '#type' => 'container',
                        '#attributes' => array(
                            'class' => array('teaTimeChildItem'),
                        )
                    );
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_sH'] = array(
                        '#required' => TRUE,
                        '#title'=> '',
                        '#type'=> 'date_popup',
                        '#date_format' => 'H:i',
                        '#timepicker' => 'timepicker',
                        '#timepicker_options' => array(
                            'rows' => 4,
                            'hours'=> array(
                                'starts'=> 0,
                                'ends'=> 23
                            ),
                            'showCloseButton' => FALSE,
                            'closeButtonText' => t('Close'),
                            'hourText'=> 'Giờ',
                            'minuteText' => 'Phút',
                            'showMinutes' => TRUE,
                        ),
                    );
                    if(!empty($form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_sH'])){
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_sH']['#default_value'] = $form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_sH'];
                    }else{
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_sH']['#default_value'] = date("Y-m-d H:i",strtotime($data['hole_'.$value->hole]['dows_'.($i+1)][$_jvalue]['sH']));
                    }
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_eH'] = array(
                        '#required' => TRUE,
                        '#title'=> '',
                        '#type'=> 'date_popup',
                        '#date_format' => 'H:i',
                        '#timepicker' => 'timepicker',
                        '#timepicker_options' => array(
                            'rows' => 4,
                            'hours'=> array(
                                'starts'=> 0,
                                'ends'=> 23
                            ),
                            'showCloseButton' => FALSE,
                            'closeButtonText' => t('Close'),
                            'hourText'=> 'Giờ',
                            'minuteText' => 'Phút',
                            'showMinutes' => TRUE,
                        ),
                    );
                    if(!empty($form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_eH'])){
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_eH']['#default_value'] = $form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_eH'];
                    }else{
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_eH']['#default_value'] = date("Y-m-d H:i",strtotime($data['hole_'.$value->hole]['dows_'.($i+1)][$_jvalue]['eH']));
                    }
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_price_clone'] = array(
                        '#type' => 'textfield',
                        '#title' => 'Giá',
                        '#required' => TRUE,
                        '#attributes' => array("class"=>array("hidden")),
                        '#default_value' => 1,
                        "#theme_wrappers" => array(),
//                        '#attributes' => array("class"=>array("input-currency")),
                    );

                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_price'] = array(
                        '#type' => 'textfield',
                        '#title' => 'Giá sân',
                        '#required' => TRUE,
//                        "#theme_wrappers" => array()
                    );
                    if(!empty($form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_price'])){
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_price']['#default_value'] = $form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_price'];
                    }else{
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_price']['#default_value'] = $data['hole_'.$value->hole]['dows_'.($i+1)][$_jvalue]['price'];
                    }
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_aprice_clone'] = array(
                        '#type' => 'textfield',

                        '#required' => TRUE,
                        '#default_value' => 1,
                        '#attributes' => array("class"=>array("hidden")),
                        "#theme_wrappers" => array(),
//                        '#attributes' => array("class"=>array("input-currency")),
                    );
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_aprice'] = array(
                        '#type' => 'textfield',
                        '#title' => 'Giá Alegolf',
                        '#required' => TRUE,

//                        "#theme_wrappers" => array()
                    );
                    if(!empty($form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_aprice'])){
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_aprice']['#default_value'] = $form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_aprice'];
                    }else{
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_aprice']['#default_value'] = $data['hole_'.$value->hole]['dows_'.($i+1)][$_jvalue]['aprice'];
                    }
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_minPlayer'] = array(
                        '#type' => 'textfield',
                        '#title' => 'SL tối thiểu',
                        '#attributes' => array(
                            ' type' => 'number', // insert space before attribute name :)
                        ),
                        '#required' => TRUE,
                        '#default_value' => !empty($form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_minPlayer'])?$form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_minPlayer']:1,
                    );
                    if(!empty($form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_minPlayer'])){
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_minPlayer']['#default_value'] = $form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_minPlayer'];
                    }else{
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_minPlayer']['#default_value'] = $data['hole_'.$value->hole]['dows_'.($i+1)][$_jvalue]['minPlayer'];
                    }
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_maxPlayer'] = array(
                        '#type' => 'textfield',
                        '#title' => 'SL tối đa',
                        '#attributes' => array(
                            ' type' => 'number',
                        ),
                        '#required' => TRUE,
                        '#default_value' => !empty($form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_maxPlayer'])?$form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_maxPlayer']:4,
                    );
                    if(!empty($form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_maxPlayer'])){
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_maxPlayer']['#default_value'] = $form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_maxPlayer'];
                    }else{
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_maxPlayer']['#default_value'] = $data['hole_'.$value->hole]['dows_'.($i+1)][$_jvalue]['maxPlayer'];
                    }
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_type'] = array(
                        '#type' => 'select',
                        '#title' => 'Khung giờ',
                        '#options' => $form_state['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_types'],
                    );
                    if(!empty($form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_type'])){
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_type']['#default_value'] = $form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_type'];
                    }else{
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_type']['#default_value'] = $data['hole_'.$value->hole]['dows_'.($i+1)][$_jvalue]['type'];
                    }
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_live']  = array(
                        '#type'          => 'checkbox',
                        '#default_value' => 0,
                        '#title'         => t('Live'),
                        '#attributes' => array("class"=>array("hidden")),
                    );
                    if(!empty($form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_type'])){
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_live']['#default_value'] = $form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_live'];
                    }else{
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_live']['#default_value'] = $data['hole_'.$value->hole]['dows_'.($i+1)][$_jvalue]['live'];
                    }
                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_options'] = array(
                        '#type' => 'checkboxes',
                        '#title' => '',
                        '#options' => $_utility_options,
                        '#attributes' => array("class"=>array("hidden")),
                    );

                    foreach (language_list('enabled')[1] as $lan_key => $lan_value) {
                        $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_'.$lan_key.'_eoptions'] = array(
                            '#type' => 'text_format',
                            '#title' => 'Mở rộng ('.$lan_key.')',
                            '#format' => 'mod_html',
                            '#rows' => 5,
                        );
                        if(!empty($form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_'.$lan_key.'_eoptions'])){
                            $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_'.$lan_key.'_eoptions']['#default_value'] = $form_state['values']['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_'.$lan_key.'_eoptions'];
                        }else{
                            $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_'.$lan_key.'_eoptions']['#default_value'] = $data['hole_'.$value->hole]['dows_'.($i+1)][$_jvalue]['eutilitys'][$lan_key][0]['value'];
                        }
                    }

                    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['teaTimeChildItem'.$_jvalue]['hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_remove'] = array(
                        '#type' => 'submit',
                        '#submit' => array('cassiopeia_remove_childteatime_remove_one'),
//            '#text' => '<span class="fa fa-times"></span>',
                        '#text' => '<span class="icon glyphicon glyphicon-trash" aria-hidden="true"></span>',
                        '#value' =>'hole'.$value->hole.'_dow'.($i+1).'_childitem'.$_jvalue.'_remove',
                        '#attributes' => array(
                            'class' => array('close teaTimeChildItemRemove'), // insert space before attribute name :)
                        ),
                        '#ajax' => array(
                            'callback' => 'cassiopeia_remove_childteatime_ajax_callback',
                            //                          'wrapper' => 'hole_'.$value->hole.'_dow'.($i+1).'_addMore_wrapper',
//              'wrapper' => 'teaTimeItem_'.$value->hole.'_'.($i+1),
                            'wrapper' => 'teaTimesContainer',
                            'method' => 'replace',
                            'effect' => 'fade',
                        ),
                    );
                }

                $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['hole'.$value->hole.'_dow'.($i+1).'_addMore_wrapper'] = array(
                    '#markup' => '<div id="'.'hole'.$value->hole.'_dow'.($i+1).'_addMore_wrapper'.'"></div>'
                );
                $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['hole'.$value->hole.'_dow'.($i+1).'_addMore'] = array(
                    '#type' => 'submit',
                    '#submit' => array('cassiopeia_add_childteatime_add_one'),
                    '#value' => 'hole'.$value->hole.'_dow'.($i+1).'_addMore',
//          '#text' => '<span class="fa fa-plus"></span>',
//                    '#title' => "Thêm khung giờ",
                    '#text' => '<span class="icon glyphicon glyphicon-plus" aria-hidden="true"></span> ',
                    '#attributes' => array(
                        'class' => array('btn close teaTimeAddMore'),
                        'type' => 'button',
                    ),
                    '#ajax' => array(
                        'callback' => 'cassiopeia_add_childteatime_ajax_callback',
//                          'wrapper' => 'hole_'.$value->hole.'_dow'.($i+1).'_addMore_wrapper',
//            'wrapper' => 'teaTimeItem_'.$value->hole.'_'.($i+1),
                        'wrapper' => 'teaTimesContainer',
                        'method' => 'replace',
                        'effect' => 'fade',
                    ),
                );
            }


        }
    }
    $form['teaTimes']['backup_data'] = array(

        '#type' =>
            'checkbox',

        '#title' => t('Cập nhật cache'),
    );
    $form['#theme'][] = 'cassiopeia_add_tea_times_form';
    $form['submit'] = array('#type' => 'submit', '#value' => 'Lưu');
    $form['restore'] = array(

        '#type'     => 'button',

        '#value' => t('Lấy dữ liệu cũ'),

        '#weight' => 19,
        '#ajax' => array(
            'callback' => 'ajax_get_backup_data',
            'wrapper' => 'teaTimesContainer',
            'method' => 'replace',
            'effect' => 'fade',
            'progress' => array('type' => 'default'),
        ),
    );

    return $form;
}
function ajax_get_backup_data($form, $form_state) {
//    $form_state['values']['backup'] = 1;
//    print_r($form_state);die;
    $_SESSION['get_backup'] = 1;
//    form_set_value($form['backup'],array('und' => array(0 => array('value' => 1))),$form_state);
//    $form_state['rebuild'] = TRUE;
    return $form['teaTimes'];
}

function cassiopeia_add_teatime_ajax_callback ($form, &$form_state) {
    return $form['teaTimes'];
}
function cassiopeia_add_one_tee_time_ajax ($form, &$form_state) {
    return $form['field_c_t_t_hole'];
}

function cassiopeia_add_childteatime_ajax_callback ($form, &$form_state) {
    $teaTimeType = cassiopeia_get_tea_time_types();
    $hole = null;
    $dow = null;
    if(!empty($form_state['values']['op'])) {
        $ar = explode('_',$form_state['values']['op']);
        if (!empty($ar) && count($ar) == 3) {
            $hole = str_replace('hole','', $ar[0]);
            $dow = str_replace('dow','', $ar[1]);
        }

    }
    drupal_get_messages();
    if ($hole && $dow && count($teaTimeType) >= count($form_state['hole'.$hole.'_dow'.$dow.'_index'])) {
        return $form['teaTimes'];
    }
}

function cassiopeia_add_childteatime_add_one(&$form, &$form_state) {
    $teaTimeType = cassiopeia_get_tea_time_types();
    $hole = null;
    $dow = null;

    if(!empty($form_state['values']['op'])) {
        $ar = explode('_',$form_state['values']['op']);
        if (!empty($ar) && count($ar) == 3) {
            $hole = str_replace('hole','', $ar[0]);
            $dow = str_replace('dow','', $ar[1]);
        }
    }

    if ($hole && $dow  && count($teaTimeType) > count($form_state['hole'.$hole.'_dow'.$dow.'_index'])) {
        $form_state['hole'.$hole.'_dow'.$dow.'_index'][] = count($form_state['hole'.$hole.'_dow'.$dow.'_index']) > 0 ? max($form_state['hole'.$hole.'_dow'.$dow.'_index']) + 1 : 0;
        foreach ($form_state['hole'.$hole.'_dow'.$dow.'_index'] as $i => $ivalue) {
            $tea_time_type_options = array();
            $tea_time_types = cassiopeia_get_tea_time_types();
            foreach ($form_state['hole'.$hole.'_dow'.$dow.'_index'] as $j => $jvalue) {
                if (!empty($form_state['values']['hole'.$hole.'_dow'.$dow.'_childitem'.$jvalue.'_type'])) {
                    if($jvalue == $ivalue) {
                        $tea_time_type_options[$form_state['values']['hole'.$hole.'_dow'.$dow.'_childitem'.$jvalue.'_type']] = $tea_time_types[$form_state['values']['hole'.$hole.'_dow'.$dow.'_childitem'.$jvalue.'_type']];
                    }
                    unset($tea_time_types[$form_state['values']['hole'.$hole.'_dow'.$dow.'_childitem'.$jvalue.'_type']]);
                }
            }
            if ($ivalue == (max($form_state['hole'.$hole.'_dow'.$dow.'_index']))) {
                $form_state['hole'.$hole.'_dow'.$dow.'_childitem'.$i.'_types'] = $tea_time_types;
            }else {
                $form_state['hole'.$hole.'_dow'.$dow.'_childitem'.$i.'_types'] = $tea_time_type_options;
            }
        }

        drupal_get_messages();
        $form_state['rebuild'] = TRUE;
//        print_r($form_state);
    }
}

function cassiopeia_remove_childteatime_ajax_callback($form, &$form_state) {
    $teaTimeType = cassiopeia_get_tea_time_types();
    $delta_remove = !empty($form_state['values']['op'])?$form_state['values']['op']:null;
    $delta_remove_array = !empty($delta_remove)?explode('_',$delta_remove): null;
    $hole = null;
    $dow = null;
    $childIndex = null;
//    print_r($delta_remove_array);
//    die;
    if(!empty($delta_remove_array)) {
        if (!empty($delta_remove_array) && count($delta_remove_array) == 4) {
            $hole = str_replace('hole','', $delta_remove_array[0]);
            $dow = str_replace('dow','', $delta_remove_array[1]);
            $childIndex = str_replace('childitem','', $delta_remove_array[2]);
        }
    }

//    print_r('$hole:'.$hole . '; $dow:'.$dow.'; $childIndex:'.$childIndex);
    if($hole &&  $dow && $childIndex >= 0 ) {
//        print(1);die;
        drupal_get_messages();
        return $form['teaTimes'];
    }
}
function cassiopeia_remove_childteatime_remove_one(&$form, &$form_state) {

    $delta_remove = !empty($form_state['values']['op'])?$form_state['values']['op']:null;
    $delta_remove_array = !empty($delta_remove)?explode('_',$delta_remove): null;
    $hole = null;
    $dow = null;
    $childIndex = null;
    if(!empty($delta_remove_array)) {
        if (!empty($delta_remove_array) && count($delta_remove_array) == 4) {
            $hole = str_replace('hole','', $delta_remove_array[0]);
            $dow = str_replace('dow','', $delta_remove_array[1]);
            $childIndex = str_replace('childitem','', $delta_remove_array[2]);
        }
    }

    drupal_get_messages();

    if($hole &&  $dow && $childIndex >=0) {

        unset($form_state['hole'.$hole.'_dow'.$dow.'_index'][$childIndex]);
        unset($form_state['hole'.$hole.'_dow'.$dow.'_childitem'.$childIndex.'_types'] );
        $form_state['rebuild'] = TRUE;
    }
}

function cassiopeia_add_tea_times_form_from_cache_submit ($form, &$form_state) {

    global $user;
    $datas = cassiopeia_add_tea_times_get_data($form_state);


    $operations = array();

    $_s_date = strtotime($datas['sDate']);
    $_e_date = strtotime($datas['eDate']);
    $_ranger_date = floor (abs($_s_date - $_e_date)/(60*60*24));


    $_list_day_mondays = array();
    $_list_day_tuesdays = array();
    $_list_day_wednesdays = array();
    $_list_day_thursdays = array();
    $_list_day_fridays = array();
    $_list_day_saturdays = array();
    $_list_day_sundays = array();


    for ($i =0 ; $i <= $_ranger_date; $i++) {
        $_date =  strtotime("+".$i." day",$_s_date );
        if (isWeekend($_date) == 0) {
            $_list_day_sundays[] = $_date;
        }
        elseif (isWeekend($_date) == 1) {
            $_list_day_mondays[] = $_date;
        }
        elseif (isWeekend($_date) == 2) {
            $_list_day_tuesdays[] = $_date;
        }
        elseif (isWeekend($_date) == 3) {
            $_list_day_wednesdays[] = $_date;
        }
        elseif (isWeekend($_date) == 4) {
            $_list_day_thursdays[] = $_date;
        }
        elseif (isWeekend($_date) == 5) {
            $_list_day_fridays[] = $_date;
        }
        elseif (isWeekend($_date) == 6) {
            $_list_day_saturdays[] = $_date;
        }
    }

    $golf = node_load($datas['golf']);
    $backup = array();

//    var_dump($datas);die;
    foreach ($datas['values'] as $key => $value) {
//        print_r($value);
//        $backup['hole_'.$value]['hole'] = $value['hole']->hole;
        foreach ($value['dows'] as $_key => $_value) {
            if(!empty($_value['values'])){
                $backup['hole_'.$value['hole']->hole]['dows_'.$_value['dow']['key']] = $_value['values'];
            }
            if ($_value['dow']['key'] == 1) {
                foreach ($_list_day_mondays as $_list_day_mondays_key => $_list_day_mondays_value) {
                    foreach ($_value['values'] as $__key => $__value) {
                        $_ranger_hour = floor((strtotime("+".minutes_from_time($__value['eH'])." minutes",$_list_day_mondays_value)  - strtotime("+".minutes_from_time($__value['sH'])." minutes",$_list_day_mondays_value))/(60*$datas['space']));
                        for ($i = 0; $i<= $_ranger_hour; $i++) {
                            $_sMinutes = minutes_from_time($__value['sH']) + $i*$datas['space'];
                            $time = array(
                                'title'=>$golf->title,
                                'c_t_t_type' => $__value['type'],
                                'live' => $__value['live'],
                                'c_t_t_hole' => $value['hole']->hole,
                                'c_t_t_sh' => strtotime("+".$_sMinutes." minutes",$_list_day_mondays_value),
                                'field_c_t_t_parent' => $datas['golf'],
                                'field_c_t_t_price' => $__value['price'],
                                'field_c_t_t_a_price' => $__value['aprice'],
                                'field_c_t_t_min_player' => $__value['minPlayer'],
                                'field_c_t_t_max_player' => $__value['maxPlayer'],
                                'field_c_t_t_date' => $_list_day_mondays_value
                            );

                            if (!empty($__value['utilitys'])) {
                                $time['field_c_t_t_utility'] = $__value['utilitys'];
                            }

                            if (!empty($__value['eutilitys'])) {
                                $time['field_c_t_t_e_utility'] = $__value['eutilitys'];
                            }

                            $operations[] = array('_batch_cassiopeia_add_tea_time', array($time));
                        }
                    }
                }
            }
            elseif ($_value['dow']['key'] == 2) {
                foreach ($_list_day_tuesdays as $_list_day_tuesdays_key => $_list_day_tuesdays_value) {
                    foreach ($_value['values'] as $__key => $__value) {

                        $_ranger_hour = floor((strtotime("+".minutes_from_time($__value['eH'])." minutes",$_list_day_tuesdays_value)  - strtotime("+".minutes_from_time($__value['sH'])." minutes",$_list_day_tuesdays_value))/(60*$datas['space']));
                        for ($i = 0; $i<= $_ranger_hour; $i++) {
                            $_sMinutes = minutes_from_time($__value['sH']) + $i*$datas['space'];
                            $time = array(
                                'title'=>$golf->title,
                                'c_t_t_type' => $__value['type'],
                                'live' => $__value['live'],
                                'c_t_t_hole' => $value['hole']->hole,
                                'c_t_t_sh' => strtotime("+".$_sMinutes." minutes",$_list_day_tuesdays_value),
                                'field_c_t_t_parent' => $datas['golf'],
                                'field_c_t_t_price' => $__value['price'],
                                'field_c_t_t_a_price' => $__value['aprice'],
                                'field_c_t_t_min_player' => $__value['minPlayer'],
                                'field_c_t_t_max_player' => $__value['maxPlayer'],
                                'field_c_t_t_date' => $_list_day_tuesdays_value
                            );

                            if (!empty($__value['utilitys'])) {
                                $time['field_c_t_t_utility'] = $__value['utilitys'];
                            }

                            if (!empty($__value['eutilitys'])) {
                                $time['field_c_t_t_e_utility'] = $__value['eutilitys'];
                            }

                            $operations[] = array('_batch_cassiopeia_add_tea_time', array($time));
                        }

                    }

                }
            }
            elseif ($_value['dow']['key'] == 3) {
                foreach ($_list_day_wednesdays as $_list_day_wednesdays_key => $_list_day_wednesdays_value) {
                    foreach ($_value['values'] as $__key => $__value) {

                        $_ranger_hour = floor((strtotime("+".minutes_from_time($__value['eH'])." minutes",$_list_day_wednesdays_value)  - strtotime("+".minutes_from_time($__value['sH'])." minutes",$_list_day_wednesdays_value))/(60*$datas['space']));
                        for ($i = 0; $i<= $_ranger_hour; $i++) {
                            $_sMinutes = minutes_from_time($__value['sH']) + $i*$datas['space'];
                            $time = array(
                                'title'=>$golf->title,
                                'c_t_t_type' => $__value['type'],
                                'live' => $__value['live'],
                                'c_t_t_hole' => $value['hole']->hole,
                                'c_t_t_sh' => strtotime("+".$_sMinutes." minutes",$_list_day_wednesdays_value),
                                'field_c_t_t_parent' => $datas['golf'],
                                'field_c_t_t_price' => $__value['price'],
                                'field_c_t_t_a_price' => $__value['aprice'],
                                'field_c_t_t_min_player' => $__value['minPlayer'],
                                'field_c_t_t_max_player' => $__value['maxPlayer'],
                                'field_c_t_t_date' => $_list_day_wednesdays_value
                            );
                            if (!empty($__value['utilitys'])) {
                                $time['field_c_t_t_utility'] = $__value['utilitys'];
                            }
                            if (!empty($__value['eutilitys'])) {
                                $time['field_c_t_t_e_utility'] = $__value['eutilitys'];
                            }

                            $operations[] = array('_batch_cassiopeia_add_tea_time', array($time));
                        }

                    }

                }
            }
            elseif ($_value['dow']['key'] == 4) {
                foreach ($_list_day_thursdays as $_list_day_thursdays_key => $_list_day_thursdays_value) {
                    foreach ($_value['values'] as $__key => $__value) {

                        $_ranger_hour = floor((strtotime("+".minutes_from_time($__value['eH'])." minutes",$_list_day_thursdays_value)  - strtotime("+".minutes_from_time($__value['sH'])." minutes",$_list_day_thursdays_value))/(60*$datas['space']));
                        for ($i = 0; $i<= $_ranger_hour; $i++) {
                            $_sMinutes = minutes_from_time($__value['sH']) + $i*$datas['space'];
                            $time = array(
                                'title'=>$golf->title,
                                'c_t_t_type' => $__value['type'],
                                'live' => $__value['live'],
                                'c_t_t_hole' => $value['hole']->hole,
                                'c_t_t_sh' => strtotime("+".$_sMinutes." minutes",$_list_day_thursdays_value),
                                'field_c_t_t_parent' => $datas['golf'],
                                'field_c_t_t_price' => $__value['price'],
                                'field_c_t_t_a_price' => $__value['aprice'],
                                'field_c_t_t_min_player' => $__value['minPlayer'],
                                'field_c_t_t_max_player' => $__value['maxPlayer'],
                                'field_c_t_t_date' => $_list_day_thursdays_value
                            );
                            if (!empty($__value['utilitys'])) {
                                $time['field_c_t_t_utility'] = $__value['utilitys'];
                            }

                            if (!empty($__value['eutilitys'])) {
                                $time['field_c_t_t_e_utility'] = $__value['eutilitys'];
                            }
                            $operations[] = array('_batch_cassiopeia_add_tea_time', array($time));
                        }

                    }

                }
            }
            elseif ($_value['dow']['key'] == 5) {
                foreach ($_list_day_fridays as $_list_day_fridays_key => $_list_day_fridays_value) {
                    foreach ($_value['values'] as $__key => $__value) {

                        $_ranger_hour = floor((strtotime("+".minutes_from_time($__value['eH'])." minutes",$_list_day_fridays_value)  - strtotime("+".minutes_from_time($__value['sH'])." minutes",$_list_day_fridays_value))/(60*$datas['space']));
                        for ($i = 0; $i<= $_ranger_hour; $i++) {
                            $_sMinutes = minutes_from_time($__value['sH']) + $i*$datas['space'];
                            $time = array(
                                'title'=>$golf->title,
                                'c_t_t_type' => $__value['type'],
                                'live' => $__value['live'],
                                'c_t_t_hole' => $value['hole']->hole,
                                'c_t_t_sh' => strtotime("+".$_sMinutes." minutes",$_list_day_fridays_value),
                                'field_c_t_t_parent' => $datas['golf'],
                                'field_c_t_t_price' => $__value['price'],
                                'field_c_t_t_a_price' => $__value['aprice'],
                                'field_c_t_t_min_player' => $__value['minPlayer'],
                                'field_c_t_t_max_player' => $__value['maxPlayer'],
                                'field_c_t_t_date' => $_list_day_fridays_value
                            );
                            if (!empty($__value['utilitys'])) {
                                $time['field_c_t_t_utility'] = $__value['utilitys'];
                            }

                            if (!empty($__value['eutilitys'])) {
                                $time['field_c_t_t_e_utility'] = $__value['eutilitys'];
                            }
                            $operations[] = array('_batch_cassiopeia_add_tea_time', array($time));
                        }

                    }

                }
            }
            elseif ($_value['dow']['key'] == 6) {
                foreach ($_list_day_saturdays as $_list_day_saturdays_key => $_list_day_saturdays_value) {
                    foreach ($_value['values'] as $__key => $__value) {

                        $_ranger_hour = floor((strtotime("+".minutes_from_time($__value['eH'])." minutes",$_list_day_saturdays_value)  - strtotime("+".minutes_from_time($__value['sH'])." minutes",$_list_day_saturdays_value))/(60*$datas['space']));
                        for ($i = 0; $i<= $_ranger_hour; $i++) {
                            $_sMinutes = minutes_from_time($__value['sH']) + $i*$datas['space'];
                            $time = array(
                                'title'=>$golf->title,
                                'c_t_t_type' => $__value['type'],
                                'live' => $__value['live'],
                                'c_t_t_hole' => $value['hole']->hole,
                                'c_t_t_sh' => strtotime("+".$_sMinutes." minutes",$_list_day_saturdays_value),
                                'field_c_t_t_parent' => $datas['golf'],
                                'field_c_t_t_price' => $__value['price'],
                                'field_c_t_t_a_price' => $__value['aprice'],
                                'field_c_t_t_min_player' => $__value['minPlayer'],
                                'field_c_t_t_max_player' => $__value['maxPlayer'],
                                'field_c_t_t_date' => $_list_day_saturdays_value
                            );
                            if (!empty($__value['utilitys'])) {
                                $time['field_c_t_t_utility'] = $__value['utilitys'];
                            }
                            if (!empty($__value['eutilitys'])) {
                                $time['field_c_t_t_e_utility'] = $__value['eutilitys'];
                            }
                            $operations[] = array('_batch_cassiopeia_add_tea_time', array($time));
                        }

                    }

                }
            }
            elseif ($_value['dow']['key'] == 7) {
                foreach ($_list_day_sundays as $_list_day_sundays_key => $_list_day_sundays_value) {
                    foreach ($_value['values'] as $__key => $__value) {

                        $_ranger_hour = floor((strtotime("+".minutes_from_time($__value['eH'])." minutes",$_list_day_sundays_value)  - strtotime("+".minutes_from_time($__value['sH'])." minutes",$_list_day_sundays_value))/(60*$datas['space']));
                        for ($i = 0; $i<= $_ranger_hour; $i++) {
                            $_sMinutes = minutes_from_time($__value['sH']) + $i*$datas['space'];
                            $time = array(
                                'title'=>$golf->title,
                                'c_t_t_type' => $__value['type'],
                                'live' => $__value['live'],
                                'c_t_t_hole' => $value['hole']->hole,
                                'c_t_t_sh' => strtotime("+".$_sMinutes." minutes",$_list_day_sundays_value),
                                'field_c_t_t_parent' => $datas['golf'],
                                'field_c_t_t_price' => $__value['price'],
                                'field_c_t_t_a_price' => $__value['aprice'],
                                'field_c_t_t_min_player' => $__value['minPlayer'],
                                'field_c_t_t_max_player' => $__value['maxPlayer'],
                                'field_c_t_t_date' => $_list_day_sundays_value
                            );
                            if (!empty($__value['utilitys'])) {
                                $time['field_c_t_t_utility'] = $__value['utilitys'];
                            }
                            if (!empty($__value['eutilitys'])) {
                                $time['field_c_t_t_e_utility'] = $__value['eutilitys'];
                            }
                            $operations[] = array('_batch_cassiopeia_add_tea_time', array($time));
                        }

                    }

                }
            }
        }
    }

    if (count($operations) > 1092) {
        drupal_set_message('Dữ liệu hiện tại là ' . count($operations) . ' quá lớn hơn 1092 vui lòng chọn lại', 'error');
    }else {
        if($form_state['values']['backup_data']==1){
            try{
                db_update("backup_teetime_create")->fields(array(
                    "data"  => serialize($backup),
                ))->condition("id",$form['#backup_id'],"=")->execute();
                drupal_set_message("Cập nhật backup thành công!");
                $form_state['redirect'] = "/admin/manager/backup_teetime";
            }catch (Exception $e){
                print($e);
            }
        }else{
            $batch = array(
                'title' => t('create tee time data'),
                'operations' => $operations,
                'progress_message' => t('Create @current out of @total.'),
                'error_message' => t('Error!'),
                'finished' => '_batch_cassiopeia_add_tea_time_finished',
            );
            batch_set($batch);
            $form_state['redirect'] = "/manager/tea-times";
        }
    }

}
function cassiopeia_add_tea_times_form_submit ($form, &$form_state) {
    global $user;
    $datas = cassiopeia_add_tea_times_get_data($form_state);

    if(!empty($form_state['values']['copy_data'] && $form_state['values']['copy_data'] == 1)){
        $copy = array();
        foreach ($datas['values'] as $key => $value) {
            foreach ($value['dows'] as $_key => $_value) {
                if (!empty($_value['values'])) {
                    $copy['hole_' . $value['hole']->hole]['dows_' . '1'] = $_value['values'];
                    $copy['hole_' . $value['hole']->hole]['dows_' . '2'] = $_value['values'];
                    $copy['hole_' . $value['hole']->hole]['dows_' . '3'] = $_value['values'];
                    $copy['hole_' . $value['hole']->hole]['dows_' . '4'] = $_value['values'];
                    $copy['hole_' . $value['hole']->hole]['dows_' . '5'] = $_value['values'];
                    $copy['hole_' . $value['hole']->hole]['dows_' . '6'] = $_value['values'];
                    $copy['hole_' . $value['hole']->hole]['dows_' . '7'] = $_value['values'];
                }
            }
        }
        $copy['form_state'] = $form_state['values'];
        $_SESSION['copy']['data'] = $copy;
        drupal_goto("/manager/add-tea-times/copy");
    }

    $operations = array();

    $_s_date = strtotime($datas['sDate']);
    $_e_date = strtotime($datas['eDate']);
    $_ranger_date = floor (abs($_s_date - $_e_date)/(60*60*24));
//    print($_ranger_date);die;

    $_list_day_mondays = array();
    $_list_day_tuesdays = array();
    $_list_day_wednesdays = array();
    $_list_day_thursdays = array();
    $_list_day_fridays = array();
    $_list_day_saturdays = array();
    $_list_day_sundays = array();


    for ($i =0 ; $i <= $_ranger_date; $i++) {
        $_date =  strtotime("+".$i." day",$_s_date );
        if (isWeekend($_date) == 0) {
            $_list_day_sundays[] = $_date;
        }
        elseif (isWeekend($_date) == 1) {
            $_list_day_mondays[] = $_date;
        }
        elseif (isWeekend($_date) == 2) {
            $_list_day_tuesdays[] = $_date;
        }
        elseif (isWeekend($_date) == 3) {
            $_list_day_wednesdays[] = $_date;
        }
        elseif (isWeekend($_date) == 4) {
            $_list_day_thursdays[] = $_date;
        }
        elseif (isWeekend($_date) == 5) {
            $_list_day_fridays[] = $_date;
        }
        elseif (isWeekend($_date) == 6) {
            $_list_day_saturdays[] = $_date;
        }
    }

    $golf = node_load($datas['golf']);
    $backup = array();

    foreach ($datas['values'] as $key => $value) {
        foreach ($value['dows'] as $_key => $_value) {
            if(!empty($_value['values'])){
                $backup['hole_'.$value['hole']->hole]['dows_'.$_value['dow']['key']] = $_value['values'];
            }
            if ($_value['dow']['key'] == 1) {
                foreach ($_list_day_mondays as $_list_day_mondays_key => $_list_day_mondays_value) {
                    foreach ($_value['values'] as $__key => $__value) {
                        $_ranger_hour = floor((strtotime("+".minutes_from_time($__value['eH'])." minutes",$_list_day_mondays_value)  - strtotime("+".minutes_from_time($__value['sH'])." minutes",$_list_day_mondays_value))/(60*$datas['space']));

                        for ($i = 0; $i<= $_ranger_hour; $i++) {
                            $_sMinutes = minutes_from_time($__value['sH']) + $i*$datas['space'];
                            $time = array(
                                'title'=>$golf->title,
                                'c_t_t_type' => $__value['type'],
                                'live' => $__value['live'],
                                'c_t_t_hole' => $value['hole']->hole,
                                'c_t_t_sh' => strtotime("+".$_sMinutes." minutes",$_list_day_mondays_value),
                                'field_c_t_t_parent' => $datas['golf'],
                                'field_c_t_t_price' => $__value['price'],
                                'field_c_t_t_a_price' => $__value['aprice'],
                                'field_c_t_t_min_player' => $__value['minPlayer'],
                                'field_c_t_t_max_player' => $__value['maxPlayer'],
                                'field_c_t_t_date' => $_list_day_mondays_value
                            );

                            if (!empty($__value['utilitys'])) {
                                $time['field_c_t_t_utility'] = $__value['utilitys'];
                            }

                            if (!empty($__value['eutilitys'])) {
                                $time['field_c_t_t_e_utility'] = $__value['eutilitys'];
                            }

                            $operations[] = array('_batch_cassiopeia_add_tea_time', array($time));
                        }
                    }
                }
            }
            elseif ($_value['dow']['key'] == 2) {
                foreach ($_list_day_tuesdays as $_list_day_tuesdays_key => $_list_day_tuesdays_value) {
                    foreach ($_value['values'] as $__key => $__value) {

                        $_ranger_hour = floor((strtotime("+".minutes_from_time($__value['eH'])." minutes",$_list_day_tuesdays_value)  - strtotime("+".minutes_from_time($__value['sH'])." minutes",$_list_day_tuesdays_value))/(60*$datas['space']));
                        for ($i = 0; $i<= $_ranger_hour; $i++) {
                            $_sMinutes = minutes_from_time($__value['sH']) + $i*$datas['space'];
                            $time = array(
                                'title'=>$golf->title,
                                'c_t_t_type' => $__value['type'],
                                'live' => $__value['live'],
                                'c_t_t_hole' => $value['hole']->hole,
                                'c_t_t_sh' => strtotime("+".$_sMinutes." minutes",$_list_day_tuesdays_value),
                                'field_c_t_t_parent' => $datas['golf'],
                                'field_c_t_t_price' => $__value['price'],
                                'field_c_t_t_a_price' => $__value['aprice'],
                                'field_c_t_t_min_player' => $__value['minPlayer'],
                                'field_c_t_t_max_player' => $__value['maxPlayer'],
                                'field_c_t_t_date' => $_list_day_tuesdays_value
                            );

                            if (!empty($__value['utilitys'])) {
                                $time['field_c_t_t_utility'] = $__value['utilitys'];
                            }

                            if (!empty($__value['eutilitys'])) {
                                $time['field_c_t_t_e_utility'] = $__value['eutilitys'];
                            }

                            $operations[] = array('_batch_cassiopeia_add_tea_time', array($time));
                        }

                    }

                }
            }
            elseif ($_value['dow']['key'] == 3) {
                foreach ($_list_day_wednesdays as $_list_day_wednesdays_key => $_list_day_wednesdays_value) {
                    foreach ($_value['values'] as $__key => $__value) {

                        $_ranger_hour = floor((strtotime("+".minutes_from_time($__value['eH'])." minutes",$_list_day_wednesdays_value)  - strtotime("+".minutes_from_time($__value['sH'])." minutes",$_list_day_wednesdays_value))/(60*$datas['space']));
                        for ($i = 0; $i<= $_ranger_hour; $i++) {
                            $_sMinutes = minutes_from_time($__value['sH']) + $i*$datas['space'];
                            $time = array(
                                'title'=>$golf->title,
                                'c_t_t_type' => $__value['type'],
                                'live' => $__value['live'],
                                'c_t_t_hole' => $value['hole']->hole,
                                'c_t_t_sh' => strtotime("+".$_sMinutes." minutes",$_list_day_wednesdays_value),
                                'field_c_t_t_parent' => $datas['golf'],
                                'field_c_t_t_price' => $__value['price'],
                                'field_c_t_t_a_price' => $__value['aprice'],
                                'field_c_t_t_min_player' => $__value['minPlayer'],
                                'field_c_t_t_max_player' => $__value['maxPlayer'],
                                'field_c_t_t_date' => $_list_day_wednesdays_value
                            );
                            if (!empty($__value['utilitys'])) {
                                $time['field_c_t_t_utility'] = $__value['utilitys'];
                            }
                            if (!empty($__value['eutilitys'])) {
                                $time['field_c_t_t_e_utility'] = $__value['eutilitys'];
                            }

                            $operations[] = array('_batch_cassiopeia_add_tea_time', array($time));
                        }

                    }

                }
            }
            elseif ($_value['dow']['key'] == 4) {
                foreach ($_list_day_thursdays as $_list_day_thursdays_key => $_list_day_thursdays_value) {
                    foreach ($_value['values'] as $__key => $__value) {

                        $_ranger_hour = floor((strtotime("+".minutes_from_time($__value['eH'])." minutes",$_list_day_thursdays_value)  - strtotime("+".minutes_from_time($__value['sH'])." minutes",$_list_day_thursdays_value))/(60*$datas['space']));
//                        print(date("d/m/Y H:i",strtotime("+".minutes_from_time($__value['eH'])." minutes",$_list_day_thursdays_value)));
//                        print("<br>");
////                        print(date("d/m/Y H:i",strtotime("+".minutes_from_time($__value['sH'])." minutes",$_list_day_thursdays_value)));
//                        print($_ranger_hour);
//                        die;
                        for ($i = 0; $i<= $_ranger_hour; $i++) {
                            $_sMinutes = minutes_from_time($__value['sH']) + $i*$datas['space'];
                            $time = array(
                                'title'=>$golf->title,
                                'c_t_t_type' => $__value['type'],
                                'live' => $__value['live'],
                                'c_t_t_hole' => $value['hole']->hole,
                                'c_t_t_sh' => strtotime("+".$_sMinutes." minutes",$_list_day_thursdays_value),
                                'field_c_t_t_parent' => $datas['golf'],
                                'field_c_t_t_price' => $__value['price'],
                                'field_c_t_t_a_price' => $__value['aprice'],
                                'field_c_t_t_min_player' => $__value['minPlayer'],
                                'field_c_t_t_max_player' => $__value['maxPlayer'],
                                'field_c_t_t_date' => $_list_day_thursdays_value
                            );
                            if (!empty($__value['utilitys'])) {
                                $time['field_c_t_t_utility'] = $__value['utilitys'];
                            }

                            if (!empty($__value['eutilitys'])) {
                                $time['field_c_t_t_e_utility'] = $__value['eutilitys'];
                            }
                            $operations[] = array('_batch_cassiopeia_add_tea_time', array($time));
                        }

                    }

                }
            }
            elseif ($_value['dow']['key'] == 5) {
                foreach ($_list_day_fridays as $_list_day_fridays_key => $_list_day_fridays_value) {
                    foreach ($_value['values'] as $__key => $__value) {

                        $_ranger_hour = floor((strtotime("+".minutes_from_time($__value['eH'])." minutes",$_list_day_fridays_value)  - strtotime("+".minutes_from_time($__value['sH'])." minutes",$_list_day_fridays_value))/(60*$datas['space']));
                        for ($i = 0; $i<= $_ranger_hour; $i++) {
                            $_sMinutes = minutes_from_time($__value['sH']) + $i*$datas['space'];
                            $time = array(
                                'title'=>$golf->title,
                                'c_t_t_type' => $__value['type'],
                                'live' => $__value['live'],
                                'c_t_t_hole' => $value['hole']->hole,
                                'c_t_t_sh' => strtotime("+".$_sMinutes." minutes",$_list_day_fridays_value),
                                'field_c_t_t_parent' => $datas['golf'],
                                'field_c_t_t_price' => $__value['price'],
                                'field_c_t_t_a_price' => $__value['aprice'],
                                'field_c_t_t_min_player' => $__value['minPlayer'],
                                'field_c_t_t_max_player' => $__value['maxPlayer'],
                                'field_c_t_t_date' => $_list_day_fridays_value
                            );
//                            print(date("d/m/Y H:i",$time['c_t_t_sh']));
//                            print("-");
                            if (!empty($__value['utilitys'])) {
                                $time['field_c_t_t_utility'] = $__value['utilitys'];
                            }

                            if (!empty($__value['eutilitys'])) {
                                $time['field_c_t_t_e_utility'] = $__value['eutilitys'];
                            }
                            $operations[] = array('_batch_cassiopeia_add_tea_time', array($time));
                        }
//                        die;

                    }

                }
            }
            elseif ($_value['dow']['key'] == 6) {
                foreach ($_list_day_saturdays as $_list_day_saturdays_key => $_list_day_saturdays_value) {
                    foreach ($_value['values'] as $__key => $__value) {

                        $_ranger_hour = floor((strtotime("+".minutes_from_time($__value['eH'])." minutes",$_list_day_saturdays_value)  - strtotime("+".minutes_from_time($__value['sH'])." minutes",$_list_day_saturdays_value))/(60*$datas['space']));
                        for ($i = 0; $i<= $_ranger_hour; $i++) {
                            $_sMinutes = minutes_from_time($__value['sH']) + $i*$datas['space'];
                            $time = array(
                                'title'=>$golf->title,
                                'c_t_t_type' => $__value['type'],
                                'live' => $__value['live'],
                                'c_t_t_hole' => $value['hole']->hole,
                                'c_t_t_sh' => strtotime("+".$_sMinutes." minutes",$_list_day_saturdays_value),
                                'field_c_t_t_parent' => $datas['golf'],
                                'field_c_t_t_price' => $__value['price'],
                                'field_c_t_t_a_price' => $__value['aprice'],
                                'field_c_t_t_min_player' => $__value['minPlayer'],
                                'field_c_t_t_max_player' => $__value['maxPlayer'],
                                'field_c_t_t_date' => $_list_day_saturdays_value
                            );
                            if (!empty($__value['utilitys'])) {
                                $time['field_c_t_t_utility'] = $__value['utilitys'];
                            }
                            if (!empty($__value['eutilitys'])) {
                                $time['field_c_t_t_e_utility'] = $__value['eutilitys'];
                            }
                            $operations[] = array('_batch_cassiopeia_add_tea_time', array($time));
                            print(date("d/m/Y H:i",$time['c_t_t_sh'])."/");
                        }
//                    die;
                    }

                }
            }
            elseif ($_value['dow']['key'] == 7) {
                foreach ($_list_day_sundays as $_list_day_sundays_key => $_list_day_sundays_value) {
                    foreach ($_value['values'] as $__key => $__value) {

                        $_ranger_hour = floor((strtotime("+".minutes_from_time($__value['eH'])." minutes",$_list_day_sundays_value)  - strtotime("+".minutes_from_time($__value['sH'])." minutes",$_list_day_sundays_value))/(60*$datas['space']));
                        for ($i = 0; $i<= $_ranger_hour; $i++) {
                            $_sMinutes = minutes_from_time($__value['sH']) + $i*$datas['space'];
                            $time = array(
                                'title'=>$golf->title,
                                'c_t_t_type' => $__value['type'],
                                'live' => $__value['live'],
                                'c_t_t_hole' => $value['hole']->hole,
                                'c_t_t_sh' => strtotime("+".$_sMinutes." minutes",$_list_day_sundays_value),
                                'field_c_t_t_parent' => $datas['golf'],
                                'field_c_t_t_price' => $__value['price'],
                                'field_c_t_t_a_price' => $__value['aprice'],
                                'field_c_t_t_min_player' => $__value['minPlayer'],
                                'field_c_t_t_max_player' => $__value['maxPlayer'],
                                'field_c_t_t_date' => $_list_day_sundays_value
                            );
                            if (!empty($__value['utilitys'])) {
                                $time['field_c_t_t_utility'] = $__value['utilitys'];
                            }
                            if (!empty($__value['eutilitys'])) {
                                $time['field_c_t_t_e_utility'] = $__value['eutilitys'];
                            }
                            $operations[] = array('_batch_cassiopeia_add_tea_time', array($time));
                        }

                    }

                }
            }
        }
    }


    if (count($operations) > 1092) {
        drupal_set_message('Dữ liệu hiện tại là ' . count($operations) . ' quá lớn hơn 1092 vui lòng chọn lại', 'error');
    }else {

        $batch = array(
            'title' => t('create tee time data'),
            'operations' => $operations,
            'progress_message' => t('Create @current out of @total.'),
            'error_message' => t('Error!'),
            'finished' => '_batch_cassiopeia_add_tea_time_finished',
        );
//        print_r($form_state['values']);die;
        if($form_state['values']['backup_data']==1){
            try{

                db_insert("backup_teetime_create")
                    ->fields(array(
                        'uid'       => $user->uid,
                        'title'     => "Sân: ".$golf->title,
                        "created"   => REQUEST_TIME,
                        "data"      => serialize($backup),
                        'golf_id'   => $golf->nid,
                        'user' => user_load($user->uid)->name,
                        'start_date' => strtotime($form_state['values']['sDate']),
                        'end_date' => strtotime($form_state['values']['eDate']),
                        'teaTimeSpace' => (int)$form_state['values']['teaTimeSpace']
                    ))->execute();
            }catch (Exception $e){
                print($e);
            }
        }
//        die;
        batch_set($batch);
    }



}

function isWeekend($date) {
    $weekDay = date('w', $date);
    return $weekDay;
}

function minutes_from_time($time) {
    $list = explode(':', $time);
    $minutes = 0;
    if (!empty($list[0])) {
        $minutes = $minutes + 60 *$list[0];
    }
    if (!empty($list[1])) {
        $minutes = $minutes + $list[1];
    }
    return $minutes;
}

function time_from_seconds($seconds) {
    $h = floor($seconds / 3600);
    $m = floor(($seconds % 3600) / 60);
    $s = $seconds - ($h * 3600) - ($m * 60);
    return sprintf('%02d:%02d:%02d', $h, $m, $s);
}

function _batch_cassiopeia_add_tea_time ($time,&$context) {
    global $user;
    global $language;
    $node = new stdClass();
    $node->type = 'ctype_tea_time';
    node_object_prepare($node);
    $node->title = $time['title'];
    $node->language = $language->language;
    $node->user = $user->uid;

//    if(user_has_role(3, $user) || user_has_role(6, $user)) {
//      $node->status = 1;
//    }else {
//      $node->status = 0;
//    }

    $node->status = 1;

    $node->field_c_t_t_parent['und'][0]['nid'] = $time['field_c_t_t_parent'];
    $node->field_c_t_t_hole['und'][0]['value'] = $time['c_t_t_hole'];
    $node->field_c_t_t_type['und'][0]['value'] = $time['c_t_t_type'];
    $node->field_c_t_t_live['und'][0]['value'] = $time['live'];
    $node->field_c_t_t_sh['und'][0]['value'] = $time['c_t_t_sh'];
    $node->field_c_t_t_price['und'][0]['value'] = $time['field_c_t_t_price'];
    $node->field_c_t_t_a_price['und'][0]['value'] = $time['field_c_t_t_a_price'];
    $node->field_c_t_t_min_player['und'][0]['value'] = $time['field_c_t_t_min_player'];
    $node->field_c_t_t_max_player['und'][0]['value'] = $time['field_c_t_t_max_player'];
    $node->field_c_t_t_date['und'][0]['value'] = date( 'Y-m-d H:i:s', (int)$time['field_c_t_t_date']);

    if(!empty($time['field_c_t_t_utility']) && is_array($time['field_c_t_t_utility']) && count($time['field_c_t_t_utility']) > 0) {
        foreach ($time['field_c_t_t_utility'] as $key =>  $value) {
            $node->field_c_t_t_utility['und'][] = array('value'=> (string)$value);
        }
    }

    if(!empty($time['field_c_t_t_e_utility'])) {
        $node->field_c_t_t_e_utility = $time['field_c_t_t_e_utility'];
    }

    $handler = entity_translation_get_handler('node', $node);

    foreach (language_list('enabled')[1] as $lan_key => $lan_value) {
        if($lan_value->language != $language->language) {
            $translation = array(
                'translate' => 0,
                'status' => 1,
                'language' => $lan_value->language,
                'source' => $node->language,
            );
            $handler->setTranslation($translation, $node);
        }
    }

    node_save($node);
    $context['results']['created'][]  = $node;
}


function _batch_cassiopeia_add_tea_time_finished($success, $results, $operations) {
    if(!empty($results['created'])) {
        $_created = cassiopeia_create_tea_times_excell($results['created']);
        if (!empty($_created)) {
            $admins =  assiopeia_get_users_with_role(3);
            foreach ($admins as $admin_key => $admin_value) {
                $query = db_insert("tbl_notify");
                $query -> fields(array(
                    'title' => t('Tạo nhiều tee times')."Sân ".$_created['golf']->title." tạo nhiều tee times chi tiết file excel ". l($_created['name'], file_create_url($_created['uri'])),
                    'from_uid' => 1,
                    'to_uid' => $admin_value->uid,
                    'created' => REQUEST_TIME,
                    'status' => 0,
                    'message_en' => $_created['golf']->title." create multiple tee times excel file details " .l($_created['name'], file_create_url($_created['uri'])),
                    'message_vi' => "Sân ".$_created['golf']->title." tạo nhiều tee times chi tiết file excel ". l($_created['name'], file_create_url($_created['uri'])),
                ));
                $query->execute();
            }
        }
    }

    drupal_set_message('Tạo tee time thành công');
}

function cassiopeia_add_tea_times_get_data ($form_state) {
    $datas = array();
    $datas['space'] = $form_state['values']['teaTimeSpace'];
    $datas['golf'] = $form_state['values']['golf'];
    $datas['sDate'] = $form_state['values']['sDate'];
    $datas['eDate'] = $form_state['values']['eDate'];
    $datas['holes'] = $form_state['holes'];
    $datas['dows'] = $form_state['dows'];
    $datas['values'] = array();
    foreach ($form_state['holes'] as $hole_key => $hole_value) {
        $tmp = array();
        $tmp['hole'] = $hole_value;
        $tmp['dows'] = array();
        foreach ($form_state['dows'] as $dow_key => $dow_value) {
            $_tmp = array();
            $_tmp['dow'] = array('key'=>$dow_key+1, 'value'=>$dow_value);
            $_tmp['values'] = array();
            foreach($form_state['hole'.$hole_value->hole.'_'.'dow'.($dow_key+1).'_index'] as $i) {


                if (
                    !empty($form_state['values']['hole'.$hole_value->hole.'_dow'.($dow_key+1).'_childitem'.$i.'_sH'])&&
                    !empty($form_state['values']['hole'.$hole_value->hole.'_dow'.($dow_key+1).'_childitem'.$i.'_eH'])&&
                    !empty($form_state['values']['hole'.$hole_value->hole.'_dow'.($dow_key+1).'_childitem'.$i.'_price'])&&
                    !empty($form_state['values']['hole'.$hole_value->hole.'_dow'.($dow_key+1).'_childitem'.$i.'_aprice'])&&
                    !empty($form_state['values']['hole'.$hole_value->hole.'_dow'.($dow_key+1).'_childitem'.$i.'_minPlayer'])&&
                    !empty($form_state['values']['hole'.$hole_value->hole.'_dow'.($dow_key+1).'_childitem'.$i.'_maxPlayer'])&&
                    !empty($form_state['values']['hole'.$hole_value->hole.'_dow'.($dow_key+1).'_childitem'.$i.'_type'])
                ) {
                    $__tmp = array(
                        'type'=>$form_state['values']['hole'.$hole_value->hole.'_dow'.($dow_key+1).'_childitem'.$i.'_type'],
                        'live'=>$form_state['values']['hole'.$hole_value->hole.'_dow'.($dow_key+1).'_childitem'.$i.'_live'],
                        'sH' =>$form_state['values']['hole'.$hole_value->hole.'_dow'.($dow_key+1).'_childitem'.$i.'_sH'],
                        'eH' =>$form_state['values']['hole'.$hole_value->hole.'_dow'.($dow_key+1).'_childitem'.$i.'_eH'],
                        'price' => $form_state['values']['hole'.$hole_value->hole.'_dow'.($dow_key+1).'_childitem'.$i.'_price'],
                        'aprice' => $form_state['values']['hole'.$hole_value->hole.'_dow'.($dow_key+1).'_childitem'.$i.'_aprice'],
                        'minPlayer'=> $form_state['values']['hole'.$hole_value->hole.'_dow'.($dow_key+1).'_childitem'.$i.'_minPlayer'],
                        'maxPlayer' => $form_state['values']['hole'.$hole_value->hole.'_dow'.($dow_key+1).'_childitem'.$i.'_maxPlayer'],
                        'utilitys' => !empty($form_state['values']['hole'.$hole_value->hole.'_dow'.($dow_key+1).'_childitem'.$i.'_options'])?$form_state['values']['hole'.$hole_value->hole.'_dow'.($dow_key+1).'_childitem'.$i.'_options']:array(),
                        'eutilitys' => array(),
                    );

                    foreach (language_list('enabled')[1] as $lan_key => $lan_value) {
                        if (!empty($form_state['values']['hole'.$hole_value->hole.'_dow'.($dow_key+1).'_childitem'.$i.'_'.$lan_key.'_eoptions'])) {
                            $__tmp['eutilitys'][$lan_key][0] = $form_state['values']['hole'.$hole_value->hole.'_dow'.($dow_key+1).'_childitem'.$i.'_'.$lan_key.'_eoptions'];
                        }
                    }

                    $_tmp['values'][] = $__tmp;
                }

            }
            $tmp['dows'][$dow_key] = $_tmp;
        }
        $datas['values'][] = $tmp;
    }
    return $datas;
}

function cassiopeia_get_all_golf () {

    global $user;
    $_user = user_load($user->uid);
    $golfs = array();

    if ($_user->uid > 0) {

        if (user_has_role(3, $_user) || user_has_role(6, $_user)) {
            $golfs_query = new EntityFieldQuery();
            $golfs_query
                ->entityCondition('entity_type', 'node')
                ->propertyCondition('type', 'ctype_golf', '=')
                ->propertyOrderBy("title","ASC");
            $golfs_query_result = $golfs_query->execute();
            $golfIds = array();
            if (!empty($golfs_query_result['node'])) {
                foreach ($golfs_query_result['node'] as $key => $value) {
                    $golfIds[] = $value->nid;
                }
            }
            $golfs = node_load_multiple($golfIds);
        }else {
            $golfs_query = new EntityFieldQuery();
            $golfs_query
                ->entityCondition('entity_type', 'node')
                ->propertyCondition('type', 'ctype_golf', '=')
                ->fieldCondition('field_namespace', 'value', $_user->field_namespace['und'][0]['value'], '=');
            $golfs_query_result = $golfs_query->execute();
            $golfIds = array();
            if (!empty($golfs_query_result['node'])) {
                foreach ($golfs_query_result['node'] as $key => $value) {
                    $golfIds[] = $value->nid;
                }
            }
            $golfs = node_load_multiple($golfIds);
        }

    }

    return $golfs;
}

function cassiopeia_get_tea_time ($nid) {
    global $user;
    $_user = user_load($user->uid);
    $result = null;
    $tea_time = null;
    $namespace = null;
    $result = node_load($nid);
    if (!empty($result->type) && $result->type == "ctype_tea_time" && !empty($result->field_c_t_t_parent['und'][0]['nid'])) {
        $parent  = node_load($result->field_c_t_t_parent['und'][0]['nid']);
        if (!empty($parent) && !empty($parent->type) && $parent->type == "ctype_golf" && !empty($parent->field_namespace['und'][0]['value'])) {
            $namespace = $parent->field_namespace['und'][0]['value'];
        }
    }

    if(user_has_role(3, $user) || user_has_role(6, $user)) {
        if ($namespace) {
            $tea_time = $result;
            $tea_time->namespace = _cassiopeia_get_namespace($namespace);
        }
    }elseif (user_has_role(4, $user) || user_has_role(5, $user)) {
        if ($namespace && !empty($_user->field_namespace['und'][0]['value']) && $namespace == $_user->field_namespace['und'][0]['value']) {
            $tea_time = $result;
            $tea_time->namespace = _cassiopeia_get_namespace($namespace);
        }
    }
    return $tea_time;
}

function cassiopeia_glof_get_tea_time_by_day ($golf,$date="") {
    global $user;

    $result = array();
    $tea_times =  array();

    $sub_query = db_select('node', 'ctype_golf');
    $sub_query->addField('ctype_golf', 'nid', 'ctype_golf_nid');
    $sub_query->join('field_data_field_namespace', 'ctype_golf_field_data_field_namespace', 'ctype_golf_field_data_field_namespace.entity_id = ctype_golf.nid');
    $sub_query->addField('ctype_golf_field_data_field_namespace', 'field_namespace_value', 'ctype_golf_field_namespace_value');
    $sub_query->condition('ctype_golf_field_data_field_namespace.entity_type', 'node');
    $sub_query->condition('ctype_golf.type', 'ctype_golf');

    $query = db_select('node', 'ctype_tea_time');
    $query->fields('ctype_tea_time');
    $query->join('field_data_field_c_t_t_parent', 'field_data_field_c_t_t_parent', 'field_data_field_c_t_t_parent.entity_id = ctype_tea_time.nid');
    $query->fields('field_data_field_c_t_t_parent', array('field_c_t_t_parent_nid'));
    $query->join($sub_query, 'ctype_golf', 'ctype_golf.ctype_golf_nid = field_data_field_c_t_t_parent.field_c_t_t_parent_nid');
    $query->fields('ctype_golf');
    $query->join('field_data_field_c_t_t_sh', 'field_data_field_c_t_t_sh', 'field_data_field_c_t_t_sh.entity_id = ctype_tea_time.nid');
    $query->fields('field_data_field_c_t_t_sh');
    $query->join('field_data_field_c_t_t_date', 'field_data_field_c_t_t_date', 'field_data_field_c_t_t_date.entity_id = ctype_tea_time.nid');
    $query->fields('field_data_field_c_t_t_date');



    $query->condition('ctype_golf.ctype_golf_field_namespace_value', $golf->field_namespace['und'][0]['value']);
    $query->condition('ctype_tea_time.type', 'ctype_tea_time');

    if($date!='all'){
        if(!empty($date)){
            $query->condition('field_data_field_c_t_t_sh.field_c_t_t_sh_value', array(strtotime(date('Y/m/d', strtotime($date))),strtotime('+1 days' . date('Y/m/d', strtotime($date)))), 'BETWEEN');
        }else{
            $query->condition('field_data_field_c_t_t_sh.field_c_t_t_sh_value', array(strtotime(date('Y/m/d', REQUEST_TIME)),strtotime('+1 days' . date('Y/m/d', REQUEST_TIME))), 'BETWEEN');
        }
    }else {
        $query->condition("field_data_field_c_t_t_sh.field_c_t_t_sh_value",REQUEST_TIME,">=");
    }

    $query->condition('ctype_tea_time.status', 1);


    $result = $query->execute()->fetchAll();

    if (!empty($result)) {
        $tea_time_nids = array();
        foreach ($result as $key => $value) {
            $tea_time_nids[] = $value->nid;
        }
        $_tea_times = node_load_multiple($tea_time_nids);

        foreach ($_tea_times as $key => $value) {
            $tea_times[] = $value;
        }
        foreach ($tea_times as $key => $value) {
            $tea_times[$key]->namespace = _cassiopeia_get_namespace($result[$key]->ctype_golf_field_namespace_value);
        }

    }



    return $tea_times;
}

function cassiopeia_get_tea_times ($namespace = null) {
    global $user;

    $result = array();
    $tea_times =  array();

    $_user = user_load($user->uid);
    if(user_has_role(3, $user) || user_has_role(6, $user)) {

        $sub_query = db_select('node', 'ctype_golf');
        $sub_query->addField('ctype_golf', 'nid', 'ctype_golf_nid');
        $sub_query->join('field_data_field_namespace', 'ctype_golf_field_data_field_namespace', 'ctype_golf_field_data_field_namespace.entity_id = ctype_golf.nid');
        $sub_query->addField('ctype_golf_field_data_field_namespace', 'field_namespace_value', 'ctype_golf_field_namespace_value');
        $sub_query->condition('ctype_golf_field_data_field_namespace.entity_type', 'node');
        $sub_query->condition('ctype_golf.type', 'ctype_golf');

        $query = db_select('node', 'ctype_tea_time');
        $query->fields('ctype_tea_time');
        $query->join('field_data_field_c_t_t_parent', 'field_data_field_c_t_t_parent', 'field_data_field_c_t_t_parent.entity_id = ctype_tea_time.nid');
        $query->fields('field_data_field_c_t_t_parent', array('field_c_t_t_parent_nid'));
        $query->join($sub_query, 'ctype_golf', 'ctype_golf.ctype_golf_nid = field_data_field_c_t_t_parent.field_c_t_t_parent_nid');
        $query->fields('ctype_golf');

        if ($namespace) {
            $query->condition('ctype_golf.ctype_golf_field_namespace_value', $namespace);
        }

        $query->condition('ctype_tea_time.type', 'ctype_tea_time');
        $query->condition('ctype_tea_time.status', 1);
        $result = $query->execute()->fetchAll();


    }elseif (user_has_role(4, $user) || user_has_role(5, $user) ) {
        if (!empty($_user->field_namespace['und'][0]['value'])) {
            $sub_query = db_select('node', 'ctype_golf');
            $sub_query->addField('ctype_golf', 'nid', 'ctype_golf_nid');
            $sub_query->join('field_data_field_namespace', 'ctype_golf_field_data_field_namespace', 'ctype_golf_field_data_field_namespace.entity_id = ctype_golf.nid');
            $sub_query->addField('ctype_golf_field_data_field_namespace', 'field_namespace_value', 'ctype_golf_field_namespace_value');
            $sub_query->condition('ctype_golf_field_data_field_namespace.entity_type', 'node');
            $sub_query->condition('ctype_golf.type', 'ctype_golf');

            $query = db_select('node', 'ctype_tea_time');
            $query->fields('ctype_tea_time');
            $query->join('field_data_field_c_t_t_parent', 'field_data_field_c_t_t_parent', 'field_data_field_c_t_t_parent.entity_id = ctype_tea_time.nid');
            $query->fields('field_data_field_c_t_t_parent', array('field_c_t_t_parent_nid'));
            $query->join($sub_query, 'ctype_golf', 'ctype_golf.ctype_golf_nid = field_data_field_c_t_t_parent.field_c_t_t_parent_nid');
            $query->fields('ctype_golf');
            $query->condition('ctype_golf.ctype_golf_field_namespace_value', $_user->field_namespace['und'][0]['value']);
            $query->condition('ctype_tea_time.type', 'ctype_tea_time');
            $query->condition('ctype_tea_time.status', 1);

            $result = $query->execute()->fetchAll();
        }
    }

    if (!empty($result)) {
        $tea_time_nids = array();
        foreach ($result as $key => $value) {
            $tea_time_nids[] = $value->nid;
        }
        $_tea_times = node_load_multiple($tea_time_nids);

        foreach ($_tea_times as $key => $value) {
            $tea_times[] = $value;
        }
        foreach ($tea_times as $key => $value) {
            $tea_times[$key]->namespace = _cassiopeia_get_namespace($result[$key]->ctype_golf_field_namespace_value);
        }

    }

    return $tea_times;
}


function cassiopeia_glof_get_min_max_tea_time_by_day($golf,$date="") {
    $min = 0;
    $max = 0;
    $max_alegolf_price = 0;
    $min_alegolf_price = 0;
    $max_price = 0;
    $min_price = 0;
    $percent = 0;

    try {


        $query = db_select('node', 'ctype_tea_time');
        $query->fields('ctype_tea_time');
        $query->join('field_data_field_c_t_t_parent', 'field_data_field_c_t_t_parent', 'field_data_field_c_t_t_parent.entity_id = ctype_tea_time.nid');
        $query->fields('field_data_field_c_t_t_parent', array('field_c_t_t_parent_nid'));
        $query->join('field_data_field_c_t_t_sh', 'field_data_field_c_t_t_sh', 'field_data_field_c_t_t_sh.entity_id = ctype_tea_time.nid');
        $query->fields('field_data_field_c_t_t_sh');
        $query->join('field_data_field_c_t_t_date', 'field_data_field_c_t_t_date', 'field_data_field_c_t_t_date.entity_id = ctype_tea_time.nid');
        $query->fields('field_data_field_c_t_t_date');


        $query->join('field_data_field_c_t_t_price', 'field_data_field_c_t_t_price', 'field_data_field_c_t_t_price.entity_id = ctype_tea_time.nid');
        $query->fields('field_data_field_c_t_t_price');

        $query->join('field_data_field_c_t_t_a_price', 'field_data_field_c_t_t_a_price', 'field_data_field_c_t_t_a_price.entity_id = ctype_tea_time.nid');
        $query->fields('field_data_field_c_t_t_a_price');



        $query->condition('field_data_field_c_t_t_parent.field_c_t_t_parent_nid', $golf->nid);
        $query->condition('ctype_tea_time.type', 'ctype_tea_time');

        if($date!='all'){
            if(!empty($date)){
                $query->condition('field_data_field_c_t_t_sh.field_c_t_t_sh_value', array(strtotime(date('Y/m/d', strtotime($date))),strtotime('+1 days' . date('Y/m/d', strtotime($date)))), 'BETWEEN');
            }else{
                $query->condition('field_data_field_c_t_t_sh.field_c_t_t_sh_value', array(strtotime(date('Y/m/d', REQUEST_TIME)),strtotime('+1 days' . date('Y/m/d', REQUEST_TIME))), 'BETWEEN');
            }
        }else {
            $query->condition("field_data_field_c_t_t_sh.field_c_t_t_sh_value",REQUEST_TIME,">=");
        }

        $query->condition('ctype_tea_time.status', 1);

        $query->addExpression('MAX(field_data_field_c_t_t_a_price.field_c_t_t_a_price_value)', 'max_alegolf_price');
        $query->addExpression('MAX(field_data_field_c_t_t_price.field_c_t_t_price_value)', 'max_price');

        $query->addExpression('MIN(field_data_field_c_t_t_a_price.field_c_t_t_a_price_value)', 'min_alegolf_price');
        $query->addExpression('MIN(field_data_field_c_t_t_price.field_c_t_t_price_value)', 'min_price');


        $query->addExpression('MAX((field_data_field_c_t_t_price.field_c_t_t_price_value - field_data_field_c_t_t_price.field_c_t_t_price_value)*100/field_data_field_c_t_t_price.field_c_t_t_price_value)', 'max_percent');
        $query->groupBy('field_data_field_c_t_t_parent.field_c_t_t_parent_nid');
        $result = $query->execute()->fetchAll();

        if (!empty($result[0]->max_alegolf_price)) {
            $max_alegolf_price = $result[0]->max_alegolf_price;
        };
        if (!empty($result[0]->max_price)) {
            $max_price = $result[0]->max_price;
        };
        if (!empty($result[0]->min_alegolf_price)) {
            $min_alegolf_price = $result[0]->min_alegolf_price;
        };

        if (!empty($result[0]->min_price) && $result[0]->min_price> 0) {
            $min_price =  $result[0]->min_price;
        };


        $min = $min_alegolf_price;
        $max = $max_alegolf_price;


    }catch (Exception $e) {
        return array('min'=>$min, 'max'=>$max, 'min_price'=>$min_price,'max_price'=>$max_price, "max_alegolf_price"=>$max_alegolf_price,"min_alegolf_price"=>$min_alegolf_price, 'percent'=>$percent);
    }

    return array('min'=>$min, 'max'=>$max,'min_price'=>$min_price,'max_price'=>$max_price, "max_alegolf_price"=>$max_alegolf_price,"min_alegolf_price"=>$min_alegolf_price, 'percent'=>$percent);
}

function cassiopeia_glof_get_min_max_tea_time($tea_times) {
//    print_r($tea_times);
    $min = 0;
    $max = 0;
    $min_golf = 0;
    $max_golf = 0;
    $percent = 0;
    $golf_price = 0;
    foreach ($tea_times as $tea_time_key => $tea_time_value) {
        if ($tea_time_key == 0) {
            $min = $tea_time_value->field_c_t_t_a_price['und'][0]['value'];
            $min_golf = $tea_time_value->field_c_t_t_price['und'][0]['value'];
            $golf_price = $tea_time_value->field_c_t_t_price['und'][0]['value'];
        }
        if ($tea_time_value->field_c_t_t_price['und'][0]['value'] > $max_golf) {
            $max_golf = $tea_time_value->field_c_t_t_price['und'][0]['value'];
        }
        if ($tea_time_value->field_c_t_t_price['und'][0]['value'] < $min_golf) {
            $min_golf = $tea_time_value->field_c_t_t_price['und'][0]['value'];
        }

        if ($tea_time_value->field_c_t_t_a_price['und'][0]['value'] > $max) {
            $max = $tea_time_value->field_c_t_t_a_price['und'][0]['value'];
        }
        if ($tea_time_value->field_c_t_t_a_price['und'][0]['value'] < $min) {
            $min = $tea_time_value->field_c_t_t_a_price['und'][0]['value'];
            $golf_price = $tea_time_value->field_c_t_t_price['und'][0]['value'];
        }
        $_percent = (($tea_time_value->field_c_t_t_price['und'][0]['value'] - $tea_time_value->field_c_t_t_a_price['und'][0]['value']) * 100/ $tea_time_value->field_c_t_t_price['und'][0]['value']);
        if($_percent > $percent) {
            $percent = $_percent;
        }
    }
    if($min_golf<$min){
        $min = $min_golf;
    }
    if($max_golf<$max){
        $max = $max_golf;
    }
//    print($min_golf);
//    var_dump($tea_times);
    return array('min'=>$min, 'max'=>$max, 'percent'=>$percent,"golf_min_price"=>$golf_price);
}

function cassiopeia_get_golfs_by_condition($options = array(),$access = null) {
    global $user;

    $result = array();
    $golfs =  array();
    $_user = user_load($user->uid);

    try {
        if(user_has_role(3, $user) || user_has_role(7, $user)|| user_has_role(6, $user)) {

            $query = db_select('node', 'ctype_golf');
            $query->fields('ctype_golf');

            $query->join('field_data_field_namespace', 'field_data_field_namespace', 'field_data_field_namespace.entity_id = ctype_golf.nid');
            $query->fields('field_data_field_namespace');
            $query->condition('field_data_field_namespace.entity_type', 'node');

            $query->join('field_data_field_tx_area', 'field_data_field_tx_area', 'field_data_field_tx_area.entity_id = ctype_golf.nid');
            $query->fields('field_data_field_tx_area');
            $query->condition('field_data_field_tx_area.entity_type', 'node');


            $query->join('field_data_field_ctype_golf_hole', 'field_data_field_ctype_golf_hole', 'field_data_field_ctype_golf_hole.entity_id = ctype_golf.nid');
            $query->fields('field_data_field_ctype_golf_hole');
            $query->condition('field_data_field_ctype_golf_hole.entity_type', 'node');

            $query->condition('ctype_golf.type', 'ctype_golf');

            if (!empty($options['condition']['title'])) {
                $query->condition('ctype_golf.title', $options['condition']['title']['value'],$options['condition']['title']['operator'] );
            }

            if (!empty($options['condition']['namespace']) && ($options['condition']['namespace']['value'] != 'all')) {
                $query->condition('field_data_field_namespace.field_namespace_value', $options['condition']['namespace']['value'],$options['condition']['namespace']['operator'] );
            }

            if (!empty($options['condition']['area']) && ($options['condition']['area']['value'] != 'all')  ) {
                $query->condition('field_data_field_tx_area.field_tx_area_tid', $options['condition']['area']['value'],$options['condition']['area']['operator'] );
            }

            if (!empty($options['condition']['status']) && $options['condition']['status']['value'] != 'none') {
                $query->condition('ctype_golf.status', $options['condition']['status']['value'],$options['condition']['status']['operator'] );
            }

            if (!empty($options['condition']['hole']) && ($options['condition']['hole']['value'] != 'all')) {
                $query->condition('field_data_field_ctype_golf_hole.field_ctype_golf_hole_value', $options['condition']['hole']['value'], $options['condition']['hole']['operator']);
            }

            $query->orderBy("ctype_golf.created","DESC");
            $result = $query->execute()->fetchAll();
            if (!empty($result)) {
                $_golf_nids = array();
                foreach ($result as $key => $value) {
                    $_golf_nids[] = $value->nid;
                }
                $_golfs = node_load_multiple($_golf_nids);

                foreach ($_golfs as $key => $value) {
                    $golfs[] = $value;
                }
            }

        }elseif (user_has_role(4, $user) ) {

            if (!empty($_user->field_namespace['und'][0]['value'])) {

                $query = db_select('node', 'ctype_golf');
                $query->fields('ctype_golf');

                $query->join('field_data_field_namespace', 'field_data_field_namespace', 'field_data_field_namespace.entity_id = ctype_golf.nid');
                $query->fields('field_data_field_namespace');
                $query->condition('field_data_field_namespace.entity_type', 'node');
                $query->condition('field_data_field_namespace.field_namespace_value', $_user->field_namespace['und'][0]['value']);

                $query->join('field_data_field_tx_area', 'field_data_field_tx_area', 'field_data_field_tx_area.entity_id = ctype_golf.nid');
                $query->fields('field_data_field_tx_area');
                $query->condition('field_data_field_tx_area.entity_type', 'node');


                $query->join('field_data_field_ctype_golf_hole', 'field_data_field_ctype_golf_hole', 'field_data_field_ctype_golf_hole.entity_id = ctype_golf.nid');
                $query->fields('field_data_field_ctype_golf_hole');
                $query->condition('field_data_field_ctype_golf_hole.entity_type', 'node');

                $query->condition('ctype_golf.type', 'ctype_golf');

                if (!empty($options['condition']['title'])) {
                    $query->condition('ctype_golf.title', $options['condition']['title']['value'],$options['condition']['title']['operator'] );
                }

                if (!empty($options['condition']['area']) && ($options['condition']['area']['value'] != 'all')  ) {
                    $query->condition('field_data_field_tx_area.field_tx_area_tid', $options['condition']['area']['value'],$options['condition']['area']['operator'] );
                }

                if (!empty($options['condition']['status']) && $options['condition']['status']['value'] != 'none') {
                    $query->condition('ctype_golf.status', $options['condition']['status']['value'],$options['condition']['status']['operator'] );
                }

                if (!empty($options['condition']['hole']) && ($options['condition']['hole']['value'] != 'all')) {
                    $query->condition('field_data_field_ctype_golf_hole.field_ctype_golf_hole_value', $options['condition']['hole']['value'], $options['condition']['hole']['operator']);
                }
                $query->orderBy("ctype_golf.created","DESC");
                $result = $query->execute()->fetchAll();
                if (!empty($result)) {
                    $_golf_nids = array();
                    foreach ($result as $key => $value) {
                        $_golf_nids[] = $value->nid;
                    }
                    $_golfs = node_load_multiple($_golf_nids);

                    foreach ($_golfs as $key => $value) {
                        $golfs[] = $value;
                    }
                }
            }
        }elseif (user_has_role(5, $user) ) {
            if (!empty($_user->field_namespace['und'][0]['value'])) {
                $query = db_select('node', 'ctype_golf');
                $query->fields('ctype_golf');

                $query->join('field_data_field_namespace', 'field_data_field_namespace', 'field_data_field_namespace.entity_id = ctype_golf.nid');
                $query->fields('field_data_field_namespace');
                $query->condition('field_data_field_namespace.entity_type', 'node');
                $query->condition('field_data_field_namespace.field_namespace_value', $_user->field_namespace['und'][0]['value']);

                $query->join('field_data_field_tx_area', 'field_data_field_tx_area', 'field_data_field_tx_area.entity_id = ctype_golf.nid');
                $query->fields('field_data_field_tx_area');
                $query->condition('field_data_field_tx_area.entity_type', 'node');


                $query->join('field_data_field_ctype_golf_hole', 'field_data_field_ctype_golf_hole', 'field_data_field_ctype_golf_hole.entity_id = ctype_golf.nid');
                $query->fields('field_data_field_ctype_golf_hole');
                $query->condition('field_data_field_ctype_golf_hole.entity_type', 'node');

                $query->condition('ctype_golf.type', 'ctype_golf');

                if (!empty($options['condition']['title'])) {
                    $query->condition('ctype_golf.title', $options['condition']['title']['value'],$options['condition']['title']['operator'] );
                }

                if (!empty($options['condition']['area']) && ($options['condition']['area']['value'] != 'all')  ) {
                    $query->condition('field_data_field_tx_area.field_tx_area_tid', $options['condition']['area']['value'],$options['condition']['area']['operator'] );
                }

                if (!empty($options['condition']['status']) && $options['condition']['status']['value'] != 'none') {
                    $query->condition('ctype_golf.status', $options['condition']['status']['value'],$options['condition']['status']['operator'] );
                }

                if (!empty($options['condition']['hole']) && ($options['condition']['hole']['value'] != 'all')) {
                    $query->condition('field_data_field_ctype_golf_hole.field_ctype_golf_hole_value', $options['condition']['hole']['value'], $options['condition']['hole']['operator']);
                }
                $query->orderBy("ctype_golf.created","DESC");
                $result = $query->execute()->fetchAll();
                if (!empty($result)) {
                    $_golf_nids = array();
                    foreach ($result as $key => $value) {
                        $_golf_nids[] = $value->nid;
                    }
                    $_golfs = node_load_multiple($_golf_nids);


                    foreach ($_golfs as $key => $value) {
//                  if(!empty($access)){
//                      $access = str_replace("%id",$value->nid,$access);
//                      if (user_access($access)) {
////                          $golfs[] = $value;
//                      }
//                  }
                        if (user_access('view booking of golf '.$value->nid) || user_access('create new tee time of golf '.$value->nid)) {
                            $golfs[] = $value;
                        }
                    }
                }
            }
        }


    }catch (Exception $e) {

    }
    return $golfs;
}


function cassiopeia_get_tea_times_by_condition($options = array()) {

    global $user;

    $result = array();
    $tea_times =  array();
    $_user = user_load($user->uid);
//    print_r($options);
    try {
        if(user_has_role(3, $user) || user_has_role(6, $user)) {

            $sub_query = db_select('node', 'ctype_golf');
            $sub_query->addField('ctype_golf', 'nid', 'ctype_golf_nid');
            $sub_query->join('field_data_field_namespace', 'ctype_golf_field_data_field_namespace', 'ctype_golf_field_data_field_namespace.entity_id = ctype_golf.nid');
            $sub_query->addField('ctype_golf_field_data_field_namespace', 'field_namespace_value', 'ctype_golf_field_namespace_value');
            $sub_query->condition('ctype_golf_field_data_field_namespace.entity_type', 'node');
            $sub_query->condition('ctype_golf.type', 'ctype_golf');

            $query = db_select('node', 'ctype_tea_time');
            $query->fields('ctype_tea_time');
            $query->join('field_data_field_c_t_t_parent', 'field_data_field_c_t_t_parent', 'field_data_field_c_t_t_parent.entity_id = ctype_tea_time.nid');
            $query->fields('field_data_field_c_t_t_parent', array('field_c_t_t_parent_nid'));

            $query->join($sub_query, 'ctype_golf', 'ctype_golf.ctype_golf_nid = field_data_field_c_t_t_parent.field_c_t_t_parent_nid');
            $query->fields('ctype_golf');

            $query->join('field_data_field_c_t_t_type', 'field_data_field_c_t_t_type', 'field_data_field_c_t_t_type.entity_id = ctype_tea_time.nid');
            $query->fields('field_data_field_c_t_t_type', array('field_c_t_t_type_value'));

            $query->join('field_data_field_c_t_t_date', 'field_data_field_c_t_t_date', 'field_data_field_c_t_t_date.entity_id = ctype_tea_time.nid');
            $query->fields('field_data_field_c_t_t_date', array('field_c_t_t_date_value'));

            $query->join('field_data_field_c_t_t_sh', 'field_data_field_c_t_t_sh', 'field_data_field_c_t_t_sh.entity_id = ctype_tea_time.nid');
            $query->fields('field_data_field_c_t_t_sh', array('field_c_t_t_sh_value'));

            $query->join('field_data_field_c_t_t_hole', 'field_data_field_c_t_t_hole', 'field_data_field_c_t_t_hole.entity_id = ctype_tea_time.nid');
            $query->fields('field_data_field_c_t_t_hole', array('field_c_t_t_hole_value'));

            $query->condition('ctype_tea_time.type', 'ctype_tea_time');

            if (isset($options['condition']['status']) && $options['condition']['status']['value'] != 'none') {
                $query->condition('ctype_tea_time.status', $options['condition']['status']['value'],$options['condition']['status']['operator'] );
            }
//            if (isset($options['condition']['range'])) {
//                $query->range($options['condition']['range']['start'],$options['condition']['range']['limit']);
//            }
            $query->range(0,1000);
//            $query->extend('PagerDefault');
//            $query->limit(30);
            if (!empty($options['condition']['field_c_t_t_parent'])) {
                $query->condition('field_data_field_c_t_t_parent.field_c_t_t_parent_nid', $options['condition']['field_c_t_t_parent']);
            }


            if (!empty($options['condition']['field_c_t_t_type'])) {
                $query->condition('field_data_field_c_t_t_type.field_c_t_t_type_value', $options['condition']['field_c_t_t_type']['value'], $options['condition']['field_c_t_t_type']['operator']);
            }

            if (!empty($options['condition']['date'])) {
                $query->condition('field_data_field_c_t_t_date.field_c_t_t_date_value',$options['condition']['date']['value'], $options['condition']['date']['operator']);
            }

            if(!empty($options['condition']['field_c_t_t_hole'])) {
                $query->condition('field_data_field_c_t_t_hole.field_c_t_t_hole_value', $options['condition']['field_c_t_t_hole']['value'],$options['condition']['field_c_t_t_hole']['operator']);
            }

            if(!empty($options['order']['field_c_t_t_date'])) {
                $query->orderBy('field_data_field_c_t_t_date.field_c_t_t_date_value', $options['order']['field_c_t_t_date']);
            }
            if(!empty($options['order']['field_c_t_t_date'])) {
                $query->orderBy('field_data_field_c_t_t_date.field_c_t_t_date_value', $options['order']['field_c_t_t_date']);
            }
            if(!empty($options['order']['field_c_t_t_sh'])) {
                $query->orderBy('field_data_field_c_t_t_sh.field_c_t_t_sh_value', $options['order']['field_c_t_t_sh']);
            }

            $result = $query->execute()->fetchAll();
//            print(count($result));
//            die;


        }elseif (user_has_role(4, $user) || user_has_role(5, $user) ) {
            if (!empty($_user->field_namespace['und'][0]['value'])) {
                $sub_query = db_select('node', 'ctype_golf');
                $sub_query->addField('ctype_golf', 'nid', 'ctype_golf_nid');
                $sub_query->join('field_data_field_namespace', 'ctype_golf_field_data_field_namespace', 'ctype_golf_field_data_field_namespace.entity_id = ctype_golf.nid');
                $sub_query->addField('ctype_golf_field_data_field_namespace', 'field_namespace_value', 'ctype_golf_field_namespace_value');
                $sub_query->condition('ctype_golf_field_data_field_namespace.entity_type', 'node');
                $sub_query->condition('ctype_golf.type', 'ctype_golf');

                $query = db_select('node', 'ctype_tea_time');
                $query->fields('ctype_tea_time');
                $query->join('field_data_field_c_t_t_parent', 'field_data_field_c_t_t_parent', 'field_data_field_c_t_t_parent.entity_id = ctype_tea_time.nid');
                $query->fields('field_data_field_c_t_t_parent', array('field_c_t_t_parent_nid'));
                $query->join($sub_query, 'ctype_golf', 'ctype_golf.ctype_golf_nid = field_data_field_c_t_t_parent.field_c_t_t_parent_nid');
                $query->fields('ctype_golf');

                $query->join('field_data_field_c_t_t_type', 'field_data_field_c_t_t_type', 'field_data_field_c_t_t_type.entity_id = ctype_tea_time.nid');
                $query->fields('field_data_field_c_t_t_type', array('field_c_t_t_type_value'));

                $query->join('field_data_field_c_t_t_date', 'field_data_field_c_t_t_date', 'field_data_field_c_t_t_date.entity_id = ctype_tea_time.nid');
                $query->fields('field_data_field_c_t_t_date', array('field_c_t_t_date_value'));


                $query->join('field_data_field_c_t_t_sh', 'field_data_field_c_t_t_sh', 'field_data_field_c_t_t_sh.entity_id = ctype_tea_time.nid');
                $query->fields('field_data_field_c_t_t_sh', array('field_c_t_t_sh_value'));


                $query->join('field_data_field_c_t_t_hole', 'field_data_field_c_t_t_hole', 'field_data_field_c_t_t_hole.entity_id = ctype_tea_time.nid');
                $query->fields('field_data_field_c_t_t_hole', array('field_c_t_t_hole_value'));

                $query->condition('ctype_golf.ctype_golf_field_namespace_value', $_user->field_namespace['und'][0]['value']);
                $query->condition('ctype_tea_time.type', 'ctype_tea_time');


                if (isset($options['condition']['status']) && $options['condition']['status']['value'] != 'none') {
                    $query->condition('ctype_tea_time.status', $options['condition']['status']['value'],$options['condition']['status']['operator'] );
                }

                if (!empty($options['condition']['field_c_t_t_parent'])) {
                    $query->condition('field_data_field_c_t_t_parent.field_c_t_t_parent_nid', $options['condition']['field_c_t_t_parent']);
                }

                if (!empty($options['condition']['field_c_t_t_type'])) {
                    $query->condition('field_data_field_c_t_t_parent.field_c_t_t_parent_nid', $options['condition']['field_c_t_t_parent']);
                }

                if (!empty($options['condition']['date'])) {
                    $query->condition('field_data_field_c_t_t_date.field_c_t_t_date_value',$options['condition']['date']['value'], $options['condition']['date']['operator']);
                }

                if(!empty($options['condition']['field_c_t_t_hole'])) {
                    $query->condition('field_data_field_c_t_t_hole.field_c_t_t_hole_value', $options['condition']['field_c_t_t_hole']['value'],$options['condition']['field_c_t_t_hole']['operator']);
                }

                if(!empty($options['order']['field_c_t_t_date'])) {
                    $query->orderBy('field_data_field_c_t_t_date.field_c_t_t_date_value', $options['order']['field_c_t_t_date']);
                }
                if(!empty($options['order']['field_c_t_t_sh'])) {
                    $query->orderBy('field_data_field_c_t_t_sh.field_c_t_t_sh_value', $options['order']['field_c_t_t_sh']);
                }
                $result = $query->execute()->fetchAll();
            }
        }

        if (!empty($result)) {
            $tea_time_nids = array();
            foreach ($result as $key => $value) {
                $tea_time_nids[] = $value->nid;
            }
            $_tea_times = node_load_multiple($tea_time_nids);

            foreach ($_tea_times as $key => $value) {
                $tea_times[] = $value;
            }
            foreach ($tea_times as $key => $value) {
                $tea_times[$key]->namespace = _cassiopeia_get_namespace($result[$key]->ctype_golf_field_namespace_value);
            }

        }
    }catch (Exception $e) {

    }

    return $tea_times;
}

function cassiopeia_get_tea_time_details_by_condition ($options = array()) {
    global $user;

    $result = array();
    $tea_times =  array();
    $_user = user_load($user->uid);

    try {
        if(user_has_role(3, $user) || user_has_role(6, $user)) {

            $sub_query = db_select('node', 'ctype_golf');
            $sub_query->addField('ctype_golf', 'nid', 'ctype_golf_nid');
            $sub_query->join('field_data_field_namespace', 'ctype_golf_field_data_field_namespace', 'ctype_golf_field_data_field_namespace.entity_id = ctype_golf.nid');
            $sub_query->addField('ctype_golf_field_data_field_namespace', 'field_namespace_value', 'ctype_golf_field_namespace_value');
            $sub_query->condition('ctype_golf_field_data_field_namespace.entity_type', 'node');
            $sub_query->condition('ctype_golf.type', 'ctype_golf');

            $query = db_select('node', 'ctype_tea_time');
            $query->fields('ctype_tea_time');
            $query->join('field_data_field_c_t_t_parent', 'field_data_field_c_t_t_parent', 'field_data_field_c_t_t_parent.entity_id = ctype_tea_time.nid');
            $query->fields('field_data_field_c_t_t_parent', array('field_c_t_t_parent_nid'));

            $query->join($sub_query, 'ctype_golf', 'ctype_golf.ctype_golf_nid = field_data_field_c_t_t_parent.field_c_t_t_parent_nid');
            $query->fields('ctype_golf');

            $query->join('field_data_field_c_t_t_type', 'field_data_field_c_t_t_type', 'field_data_field_c_t_t_type.entity_id = ctype_tea_time.nid');
            $query->fields('field_data_field_c_t_t_type', array('field_c_t_t_type_value'));
            //
            $query->join('field_data_field_c_t_t_date', 'field_data_field_c_t_t_date', 'field_data_field_c_t_t_date.entity_id = ctype_tea_time.nid');
            $query->fields('field_data_field_c_t_t_date', array('field_c_t_t_date_value'));

            $query->join('field_data_field_c_t_t_sh', 'field_data_field_c_t_t_sh', 'field_data_field_c_t_t_sh.entity_id = ctype_tea_time.nid');
            $query->fields('field_data_field_c_t_t_sh', array('field_c_t_t_sh_value'));

            $query->join('field_data_field_c_t_t_hole', 'field_data_field_c_t_t_hole', 'field_data_field_c_t_t_hole.entity_id = ctype_tea_time.nid');
            $query->fields('field_data_field_c_t_t_hole', array('field_c_t_t_hole_value'));


            $query->join('field_data_field_c_t_t_max_player', 'field_data_field_c_t_t_max_player', 'field_data_field_c_t_t_max_player.entity_id = ctype_tea_time.nid');
            $query->fields('field_data_field_c_t_t_max_player', array('field_c_t_t_max_player_value'));

            $query->join('field_data_field_c_t_t_player', 'field_data_field_c_t_t_player', 'field_data_field_c_t_t_player.entity_id = ctype_tea_time.nid');
            $query->fields('field_data_field_c_t_t_player', array('field_c_t_t_player_value'));


//      $query->addExpression('field_data_field_c_t_t_max_player.field_c_t_t_max_player_value - field_data_field_c_t_t_player.field_c_t_t_player_value', 'slot_available');


            $query->condition('ctype_tea_time.type', 'ctype_tea_time');

            if (isset($options['condition']['status']) && $options['condition']['status']['value'] != 'none') {
                $query->condition('ctype_tea_time.status', $options['condition']['status']['value'], $options['condition']['status']['operator']);
            }


            if (!empty($options['condition']['field_c_t_t_parent'])) {
                $query->condition('field_data_field_c_t_t_parent.field_c_t_t_parent_nid', $options['condition']['field_c_t_t_parent']);
            }

            if (!empty($options['condition']['date'])) {
                $query->condition('field_data_field_c_t_t_date.field_c_t_t_date_value',$options['condition']['date']['value'], $options['condition']['date']['operator']);
            }else {
                $query->condition('field_data_field_c_t_t_date.field_c_t_t_date_value',date('Y-m-d H:i:s', strtotime(date('Y-m-d',REQUEST_TIME))));
            }

            if (!empty($options['condition']['field_c_t_t_hole'])) {
                $query->condition('field_data_field_c_t_t_hole.field_c_t_t_hole_value', $options['condition']['field_c_t_t_hole']['value'], $options['condition']['field_c_t_t_hole']['operator']);
            }

            if (!empty($options['condition']['field_c_t_t_player'])) {
                $query->condition('field_data_field_c_t_t_player.field_c_t_t_player_value', $options['condition']['field_c_t_t_player']['value'], $options['condition']['field_c_t_t_player']['operator']);
            }

            if (!empty($options['condition']['field_c_t_t_max_player'])) {
                $query->condition('field_data_field_c_t_t_max_player.field_c_t_t_max_player_value', $options['condition']['field_c_t_t_max_player']['value'], $options['condition']['field_c_t_t_max_player']['operator']);
            }

            if (!empty($options['condition']['slot_available'])) {
                $query->where('(field_data_field_c_t_t_max_player.field_c_t_t_max_player_value - field_data_field_c_t_t_player.field_c_t_t_player_value) '.$options['condition']['slot_available']['operator'].' '.$options['condition']['slot_available']['value']);
            }

            if(!empty($options['order']['field_c_t_t_sh'])) {
                $query->orderBy('field_data_field_c_t_t_sh.field_c_t_t_sh_value', $options['order']['field_c_t_t_sh']);
            }

            $result = $query->execute()->fetchAll();

        }elseif (user_has_role(4, $user) || user_has_role(5, $user) ) {
            if (!empty($_user->field_namespace['und'][0]['value'])) {
                $sub_query = db_select('node', 'ctype_golf');
                $sub_query->addField('ctype_golf', 'nid', 'ctype_golf_nid');
                $sub_query->join('field_data_field_namespace', 'ctype_golf_field_data_field_namespace', 'ctype_golf_field_data_field_namespace.entity_id = ctype_golf.nid');
                $sub_query->addField('ctype_golf_field_data_field_namespace', 'field_namespace_value', 'ctype_golf_field_namespace_value');
                $sub_query->condition('ctype_golf_field_data_field_namespace.entity_type', 'node');
                $sub_query->condition('ctype_golf.type', 'ctype_golf');

                $query = db_select('node', 'ctype_tea_time');
                $query->fields('ctype_tea_time');
                $query->join('field_data_field_c_t_t_parent', 'field_data_field_c_t_t_parent', 'field_data_field_c_t_t_parent.entity_id = ctype_tea_time.nid');
                $query->fields('field_data_field_c_t_t_parent', array('field_c_t_t_parent_nid'));
                $query->join($sub_query, 'ctype_golf', 'ctype_golf.ctype_golf_nid = field_data_field_c_t_t_parent.field_c_t_t_parent_nid');
                $query->fields('ctype_golf');

                $query->join('field_data_field_c_t_t_type', 'field_data_field_c_t_t_type', 'field_data_field_c_t_t_type.entity_id = ctype_tea_time.nid');
                $query->fields('field_data_field_c_t_t_type', array('field_c_t_t_type_value'));

                $query->join('field_data_field_c_t_t_date', 'field_data_field_c_t_t_date', 'field_data_field_c_t_t_date.entity_id = ctype_tea_time.nid');
                $query->fields('field_data_field_c_t_t_date', array('field_c_t_t_date_value'));


                $query->join('field_data_field_c_t_t_sh', 'field_data_field_c_t_t_sh', 'field_data_field_c_t_t_sh.entity_id = ctype_tea_time.nid');
                $query->fields('field_data_field_c_t_t_sh', array('field_c_t_t_sh_value'));


                $query->join('field_data_field_c_t_t_hole', 'field_data_field_c_t_t_hole', 'field_data_field_c_t_t_hole.entity_id = ctype_tea_time.nid');
                $query->fields('field_data_field_c_t_t_hole', array('field_c_t_t_hole_value'));


                $query->join('field_data_field_c_t_t_max_player', 'field_data_field_c_t_t_max_player', 'field_data_field_c_t_t_max_player.entity_id = ctype_tea_time.nid');
                $query->fields('field_data_field_c_t_t_max_player', array('field_c_t_t_max_player_value'));

                $query->join('field_data_field_c_t_t_player', 'field_data_field_c_t_t_player', 'field_data_field_c_t_t_player.entity_id = ctype_tea_time.nid');
                $query->fields('field_data_field_c_t_t_player', array('field_c_t_t_player_value'));


                $query->condition('ctype_golf.ctype_golf_field_namespace_value', $_user->field_namespace['und'][0]['value']);
                $query->condition('ctype_tea_time.type', 'ctype_tea_time');



                if (isset($options['condition']['status']) && $options['condition']['status']['value'] != 'none') {
                    $query->condition('ctype_tea_time.status', $options['condition']['status']['value'], $options['condition']['status']['operator']);
                }

                if (!empty($options['condition']['field_c_t_t_parent'])) {
                    $query->condition('field_data_field_c_t_t_parent.field_c_t_t_parent_nid', $options['condition']['field_c_t_t_parent']);
                }

                if (!empty($options['condition']['date'])) {
                    $query->condition('field_data_field_c_t_t_date.field_c_t_t_date_value',$options['condition']['date']['value'], $options['condition']['date']['operator']);
                }else {
                    $query->condition('field_data_field_c_t_t_date.field_c_t_t_date_value',date('Y-m-d H:i:s', strtotime(date('Y-m-d',REQUEST_TIME))));
                }

                if (!empty($options['condition']['field_c_t_t_hole'])) {
                    $query->condition('field_data_field_c_t_t_hole.field_c_t_t_hole_value', $options['condition']['field_c_t_t_hole']['value'], $options['condition']['field_c_t_t_hole']['operator']);
                }

                if (!empty($options['condition']['field_c_t_t_player'])) {
                    $query->condition('field_data_field_c_t_t_player.field_c_t_t_player_value', $options['condition']['field_c_t_t_player']['value'], $options['condition']['field_c_t_t_player']['operator']);
                }

                if (!empty($options['condition']['field_c_t_t_max_player'])) {
                    $query->condition('field_data_field_c_t_t_max_player.field_c_t_t_max_player_value', $options['condition']['field_c_t_t_max_player']['value'], $options['condition']['field_c_t_t_max_player']['operator']);
                }


                if (!empty($options['condition']['slot_available'])) {
                    $query->where('(field_data_field_c_t_t_max_player.field_c_t_t_max_player_value - field_data_field_c_t_t_player.field_c_t_t_player_value) '.$options['condition']['slot_available']['operator'].' '.$options['condition']['slot_available']['value']);
                }


                if(!empty($options['order']['field_c_t_t_sh'])) {
                    $query->orderBy('field_data_field_c_t_t_sh.field_c_t_t_sh_value', $options['order']['field_c_t_t_sh']);
                }


                $result = $query->execute()->fetchAll();
            }
        }



        if (!empty($result)) {
            $tea_time_nids = array();
            foreach ($result as $key => $value) {
                $tea_time_nids[] = $value->nid;
            }
            $_tea_times = node_load_multiple($tea_time_nids);

            foreach ($_tea_times as $key => $value) {
                $tea_times[] = $value;
            }
            foreach ($tea_times as $key => $value) {
                $tea_times[$key]->namespace = _cassiopeia_get_namespace($result[$key]->ctype_golf_field_namespace_value);
            }

        }
    }catch (Exception $e) {

    }

    return $tea_times;
}

function _cassiopeia_get_tea_time_details_by_condition ($options = array()) {
    global $user;

    $result = array();
    $tea_times =  array();
    $_user = user_load($user->uid);

    try {

        $sub_query = db_select('node', 'ctype_golf');
        $sub_query->addField('ctype_golf', 'nid', 'ctype_golf_nid');
        $sub_query->addField('ctype_golf', 'title', 'ctype_golf_title');
        $sub_query->join('field_data_field_namespace', 'ctype_golf_field_data_field_namespace', 'ctype_golf_field_data_field_namespace.entity_id = ctype_golf.nid');
        $sub_query->addField('ctype_golf_field_data_field_namespace', 'field_namespace_value', 'ctype_golf_field_namespace_value');
        $sub_query->condition('ctype_golf_field_data_field_namespace.entity_type', 'node');
        $sub_query->condition('ctype_golf.type', 'ctype_golf');

        $query = db_select('node', 'ctype_tea_time');
        $query->fields('ctype_tea_time');
        $query->join('field_data_field_c_t_t_parent', 'field_data_field_c_t_t_parent', 'field_data_field_c_t_t_parent.entity_id = ctype_tea_time.nid');
        $query->fields('field_data_field_c_t_t_parent', array('field_c_t_t_parent_nid'));

        $query->join('field_data_field_c_t_t_e_good_price', 'field_data_field_c_t_t_e_good_price', 'field_data_field_c_t_t_e_good_price.entity_id = ctype_tea_time.nid');
        $query->fields('field_data_field_c_t_t_e_good_price', array('field_c_t_t_e_good_price_value'));

        $query->join($sub_query, 'ctype_golf', 'ctype_golf.ctype_golf_nid = field_data_field_c_t_t_parent.field_c_t_t_parent_nid');
        $query->fields('ctype_golf');
//      $query->addField('field_data_field_c_t_t_type', 'entity_id', 'field_data_field_c_t_t_type_id');
        $query->join('field_data_field_c_t_t_type', 'field_data_field_c_t_t_type', 'field_data_field_c_t_t_type.entity_id = ctype_tea_time.nid');
        $query->fields('field_data_field_c_t_t_type', array('field_c_t_t_type_value'));
        //
        $query->join('field_data_field_c_t_t_date', 'field_data_field_c_t_t_date', 'field_data_field_c_t_t_date.entity_id = ctype_tea_time.nid');
        $query->fields('field_data_field_c_t_t_date', array('field_c_t_t_date_value'));

        $query->join('field_data_field_c_t_t_sh', 'field_data_field_c_t_t_sh', 'field_data_field_c_t_t_sh.entity_id = ctype_tea_time.nid');
        $query->fields('field_data_field_c_t_t_sh', array('field_c_t_t_sh_value'));

        $query->join('field_data_field_c_t_t_hole', 'field_data_field_c_t_t_hole', 'field_data_field_c_t_t_hole.entity_id = ctype_tea_time.nid');
        $query->fields('field_data_field_c_t_t_hole', array('field_c_t_t_hole_value'));


        $query->join('field_data_field_c_t_t_max_player', 'field_data_field_c_t_t_max_player', 'field_data_field_c_t_t_max_player.entity_id = ctype_tea_time.nid');
        $query->fields('field_data_field_c_t_t_max_player', array('field_c_t_t_max_player_value'));

        $query->join('field_data_field_c_t_t_player', 'field_data_field_c_t_t_player', 'field_data_field_c_t_t_player.entity_id = ctype_tea_time.nid');
        $query->fields('field_data_field_c_t_t_player', array('field_c_t_t_player_value'));

        $query->join("field_data_field_tx_area","field_tx_area","field_tx_area.entity_id = ctype_golf.ctype_golf_nid");
        $query->fields("field_tx_area",array("field_tx_area_tid"));

        $query->join("taxonomy_term_data","taxonomy_term_data","taxonomy_term_data.tid = field_tx_area.field_tx_area_tid");
        $query->fields("taxonomy_term_data",array("name"));


        $query->join("golf_holes","golf_holes","golf_holes.hole = field_data_field_c_t_t_hole.field_c_t_t_hole_value");
//        $query->join("golf_holes","golf_holes","golf_holes.hole = ctype_tea_time.")
        $query->condition('ctype_tea_time.type', 'ctype_tea_time');

        if (isset($options['condition']['good_time'])) {
            $query->condition('field_data_field_c_t_t_e_good_price.field_c_t_t_e_good_price_value', $options['condition']['good_time']['value'], $options['condition']['good_time']['operator']);
        }
        if (isset($options['condition']['status']) && $options['condition']['status']['value'] != 'none') {
            $query->condition('ctype_tea_time.status', $options['condition']['status']['value'], $options['condition']['status']['operator']);
        }
        if (isset($options['condition']['ctype_golf_title'])) {
            $query->condition('ctype_golf.ctype_golf_title', $options['condition']['ctype_golf_title']['value'], $options['condition']['ctype_golf_title']['operator']);
        }
        if (isset($options['condition']['field_data_field_c_t_t_type'])) {
            $query->condition('field_data_field_c_t_t_type.field_c_t_t_type_value', $options['condition']['field_data_field_c_t_t_type']['value'], $options['condition']['field_data_field_c_t_t_type']['operator']);
        }
        if (isset($options['condition']['search_golf_key'])) {
            $query->groupBy('ctype_golf.ctype_golf_nid');
        }
        if (!empty($options['condition']['field_c_t_t_parent'])) {
            $query->condition('field_data_field_c_t_t_parent.field_c_t_t_parent_nid', $options['condition']['field_c_t_t_parent']);
        }

        if (!empty($options['condition']['date'])) {
            $query->condition('field_data_field_c_t_t_date.field_c_t_t_date_value',$options['condition']['date']['value'], $options['condition']['date']['operator']);
        }else {
            $query->condition('field_data_field_c_t_t_date.field_c_t_t_date_value',date('Y-m-d H:i:s', strtotime(date('Y-m-d',REQUEST_TIME))), ">=");
        }

        if (!empty($options['condition']['field_c_t_t_sh'])) {
            $query->condition('field_data_field_c_t_t_sh.field_c_t_t_sh_value',$options['condition']['field_c_t_t_sh']['value'], $options['condition']['field_c_t_t_sh']['operator']);
        }

        if (!empty($options['condition']['field_c_t_t_hole'])) {
            $query->condition('field_data_field_c_t_t_hole.field_c_t_t_hole_value', $options['condition']['field_c_t_t_hole']['value'], $options['condition']['field_c_t_t_hole']['operator']);
        }

        if (!empty($options['condition']['field_c_t_t_player'])) {
            $query->condition('field_data_field_c_t_t_player.field_c_t_t_player_value', $options['condition']['field_c_t_t_player']['value'], $options['condition']['field_c_t_t_player']['operator']);
        }

        if (!empty($options['condition']['field_c_t_t_max_player'])) {
            $query->condition('field_data_field_c_t_t_max_player.field_c_t_t_max_player_value', $options['condition']['field_c_t_t_max_player']['value'], $options['condition']['field_c_t_t_max_player']['operator']);
        }

        if (!empty($options['condition']['slot_available'])) {
            $query->where('(field_data_field_c_t_t_max_player.field_c_t_t_max_player_value - field_data_field_c_t_t_player.field_c_t_t_player_value) '.$options['condition']['slot_available']['operator'].' '.$options['condition']['slot_available']['value']);
        }
        $query->join('field_data_field_ctype_golf_address', "field_address","field_address.entity_id = ctype_golf.ctype_golf_nid");
        if(!empty($options['condition']['golf_search_key'])){
            $query->where("CONCAT(ctype_golf.ctype_golf_title,field_address.field_ctype_golf_address_value,taxonomy_term_data.name) LIKE :string",array(":string"=>"%".$options['condition']['golf_search_key']['value']."%"));
        }
        if(!empty($options['order']['field_c_t_t_date'])) {

            $query->orderBy('field_data_field_c_t_t_date.field_c_t_t_date_value', $options['order']['field_c_t_t_date']);
        }
        if(!empty($options['order']['field_c_t_t_sh'])) {
            $query->orderBy('field_data_field_c_t_t_sh.field_c_t_t_sh_value', $options['order']['field_c_t_t_sh']);
        }

        $result = $query->execute()->fetchAll();
//

        if (!empty($result)) {
            $tea_time_nids = array();
            foreach ($result as $key => $value) {
                $tea_time_nids[] = $value->nid;
            }
            $_tea_times = node_load_multiple($tea_time_nids);

            foreach ($_tea_times as $key => $value) {
                $tea_times[] = $value;
            }
            foreach ($tea_times as $key => $value) {
                $tea_times[$key]->namespace = _cassiopeia_get_namespace($result[$key]->ctype_golf_field_namespace_value);
            }

        }
    }catch (Exception $e) {
//        print($e);
    }

    return $tea_times;
}

function cassiopeia_date_popup_process_alter(&$element, &$form_state, $context) {

//        print_r($element);
    if(!empty($context['form']['#form_id']) &&  $context['form']['#form_id'] == 'cassiopeia_add_tea_times_form') {
        if (strpos($element['#name'], '_sH') !== false) {

            $element['time']['#title'] = 'Bắt đầu lúc';
        }
        if (strpos($element['#name'], '_eH') !== false) {
            $element['time']['#title'] = 'Kêt thúc lúc';
        }
    }
    if(!empty($context['form']['#form_id']) &&  $context['form']['#form_id'] == 'cassiopeia_add_tea_times_form_from_cache') {
        if (strpos($element['#name'], '_sH') !== false) {

            $element['time']['#title'] = 'Bắt đầu lúc';
        }
        if (strpos($element['#name'], '_eH') !== false) {
            $element['time']['#title'] = 'Kêt thúc lúc';
        }
    }

//    print($element['#name']);
    if ($element['#name'] == 'field_event_expired_date[und][0][value]') {
//        print(123);
        $element['date']['#title'] = '';
        $element['time']['#title'] = '';
    }
    if ($element['#name'] == 'field_event_date[und][0][value]') {
//        print(123);
        $element['date']['#title'] = t("Thời gian");
        $element['time']['#title'] = '';
    }
    if ($element['#name'] == 'date_1') {
        $element['date']['#title'] = t("To");
        $element['time']['#title'] = '';
    }
    if ($element['#name'] == 'date_2') {
        $element['date']['#title'] = t("To");
        $element['time']['#title'] = '';
    }
    if ($element['#name'] == 'sDate') {
        $element['date']['#title'] = t("From");
        $element['time']['#title'] = '';

    }

    if ($element['#name'] == 'cassiopeia_event_manager_filter_form_date') {
        $element['date']['#title'] = t("Thời gian");
//        $element['time']['#title'] = t("Time");
    }
    if ($element['#name'] == 'eDate') {
        $element['date']['#title'] = t("To");
        $element['time']['#title'] = t("Time");
    }
    if ($element['#name'] == 'start_date') {
        $element['date']['#title'] = t("Check-in");
        $element['date']['#required'] = true;
//    $element['time']['#title'] = 'Thời gian';
    }
    if ($element['#name'] == 'end_date') {
        $element['date']['#title'] = t("Check-out");
//    $element['time']['#title'] = 'Thời gian';
        $element['date']['#required'] = true;
    }

    if ($element['#name'] == 'field_c_t_t_sh[und][0][value]') {
        $element['date']['#title'] = '';
        $element['time']['#title'] = 'Bắt đầu';
    }
    if ($element['#name'] == 'cassiopeia_daily_report_filter_form_start_time') {
        $element['date']['#title'] = t('From');
//        $element['time']['#title'] = 'Bắt đầu';
    }
    if ($element['#name'] == 'cassiopeia_daily_report_filter_form_end_time') {
        $element['date']['#title'] = t('To');
//        $element['time']['#title'] = 'Bắt đầu';
    }
    if ($element['#name'] == 'cassiopeia_customer_filter_form_start_time') {
        $element['date']['#title'] = 'Từ ngày';
//        $element['time']['#title'] = 'Bắt đầu';
    }
    if ($element['#name'] == 'cassiopeia_customer_filter_form_end_time') {
        $element['date']['#title'] = 'Đến ngày';
//        $element['time']['#title'] = 'Bắt đầu';
    }
    if ($element['#name'] == 'cassiopeia_golf_booking_filter_form_start_time') {
        $element['date']['#title'] = 'Từ ngày';
//        $element['time']['#title'] = 'Bắt đầu';
    }
    if ($element['#name'] == 'cassiopeia_golf_booking_filter_form_end_time') {
        $element['date']['#title'] = 'Đến ngày';
//        $element['time']['#title'] = 'Bắt đầu';
    }
    if ($element['#name'] == 'booking_tour_start_time') {
        $element['date']['#title'] = 'Từ ngày';
//        $element['time']['#title'] = 'Bắt đầu';
    }
    if ($element['#name'] == 'booking_tour_end_time') {
        $element['date']['#title'] = 'Đến ngày';
//        $element['time']['#title'] = 'Bắt đầu';
    }

    if($element['#name']='date' && !empty($context['form']['#form_id']) &&  $context['form']['#form_id'] == 'cassiopeia_search_tea_time_details_from') {
        $element['date']['#title'] = 'Ngày';
    }
    if(!empty($element['date']['#name']) && $element['date']['#name'] == 'fixed_form_search_date[date]') {
        $element['date']['#title'] = '<i class="fa fa-table" aria-hidden="true"></i> ';
        $element['date']['#required'] = FALSE;
        $element['date']['#description'] = '';
    }



    $element['date']['#description'] = '';
    $element['date']['#attributes']['autocomplete'] = 'off';
    $element['time']['#attributes']['autocomplete'] = 'off';
}

function cassiopeia_get_tea_time_types (){
    global $language;
    $vid = taxonomy_vocabulary_machine_name_load("time_frame");
    $terms = taxonomy_get_tree($vid->vid, 0, $depth = 1);
//    $terms = taxonomy_get_tree($vid->vid);
    $types = array();
    if(!empty($terms)){
        foreach($terms as $key => $value){
            $types[$value->tid] = $value->name;
        }
    }
//    $types = array(1=>'Sáng', 2=>'Chiều', 3=> 'Đèn');
    return $types;
}


function cassiopeia_search_tea_times_from ($form, &$form_state, $cache = null) {
    global $user;

    $form = array();

    $golf_options = array();
    $golf = null;

    if (!empty($form_state['values']['golf'])) {
        $golf = node_load($form_state['values']['golf']);
    }

    $golf_options[] = 'Tất cả';

    foreach (cassiopeia_get_all_golf() as $key => $value) {
        $golf_options[$value->nid] = $value->title;
    }

    $form['golf'] = array(
        '#type' => 'select',
        '#title' => 'Sân / Zone',
        '#options' => $golf_options,
        '#chosen' => TRUE,
    );

    if(!empty($cache['golf'])) {
        $form['golf']['#default_value'] = $cache['golf'];
    }

    $form['sDate'] = array(
        '#type' => 'date_popup',
        '#default_value' => REQUEST_TIME,
        '#date_type' => DATE_DATETIME,
        '#date_timezone' => date_default_timezone(),
        '#date_format' => 'm/d/Y',
        '#date_increment' => 1,
        '#date_year_range' => '-3:+3',
        '#required' => TRUE,
    );

    if(!empty($cache['sDate'])) {
        $form['sDate']['#default_value'] = $cache['sDate'];
    }else {
        $form['sDate']['#default_value'] = date('Y-m-d H:i:s', REQUEST_TIME);
    }

    $form['eDate'] = array(
        '#type' => 'date_popup',
        '#default_value' => REQUEST_TIME,
        '#date_type' => DATE_DATETIME,
        '#date_timezone' => date_default_timezone(),
        '#date_format' => 'm/d/Y',
        '#date_increment' => 1,
        '#date_year_range' => '-3:+3',
        '#required' => TRUE,
    );
    if(!empty($cache['eDate'])) {
        $form['eDate']['#default_value'] = $cache['eDate'];
    }else {
        $form['eDate']['#default_value'] = date('Y-m-d H:i:s', REQUEST_TIME);
    }

    $field_ctype_golf_hole_option = array();
    $field_ctype_golf_hole_option[] =  '-- Tất cả --';
    foreach (_cassiopeia_get_all_hole() as $key => $value) {
        $field_ctype_golf_hole_option[$value->hole] = t($value->title);
    }
    $form['hole'] = array(
        '#type' => 'select',
        '#title' => t('Hole'),
        '#options' =>$field_ctype_golf_hole_option
    );
    if(!empty($cache['hole'])) {
        $form['hole']['#default_value'] = $cache['hole'];
    }
    $type_options = array();
    $type_options[0] = 'Tất cả';
    foreach (cassiopeia_get_tea_time_types() as $key => $value) {
        $type_options[$key] = $value;
    }
    $form['type'] = array(
        '#type' => 'select',
        '#title' => 'Khung giờ',
        '#options' => $type_options,
    );
    if(!empty($cache['type'])) {
        $form['type']['#default_value'] = $cache['type'];
    }

    $status_options = array();
    $status_options['none'] = 'Tất cả';
    $status_options[0] = 'Ngừng hoạt động';
    $status_options[1] = 'Hoạt động';

    $form['status'] = array(
        '#type' => 'select',
        '#title' => 'Trạng thái',
        '#options' => $status_options,
    );
    if(isset($cache['status'])) {
        $form['status']['#default_value'] = $cache['status'];
    }

    $form['#theme'][] = 'cassiopeia_search_tea_times_from';
    $form['submit'] = array('#type' => 'submit', '#value' => 'Tìm kiếm');
    return $form;
}

function cassiopeia_search_tea_times_from_submit ($form, $form_state) {
    drupal_goto('manager/tea-times',
        array(
            'query'=>array(
                'golf'=>$form_state['values']['golf'],
                'sDate'=>$form_state['values']['sDate'],
                'eDate'=>$form_state['values']['eDate'],
                'hole'=>$form_state['values']['hole'],
                'type'=>$form_state['values']['type'],
                'status'=>$form_state['values']['status'],
            )
        )
    );
}

function cassiopeia_search_tea_time_details_from ($form, &$form_state, $cache = null) {
    global $user;

    $form = array();

    $golf_options = array();
    $golf = null;

    if (!empty($form_state['values']['golf'])) {
        $golf = node_load($form_state['values']['golf']);
    }
    foreach (cassiopeia_get_all_golf() as $key => $value) {
        $golf_options[$value->nid] = $value->title;
    }

    $form['golf'] = array(
        '#type' => 'select',
        '#title' => 'Sân / Zone',
        '#options' => $golf_options,
        '#chosen' => TRUE,

    );

    if(!empty($cache['golf'])) {
        $form['golf']['#default_value'] = $cache['golf'];
    }

    $form['date'] = array(
        '#type' => 'date_popup',
        '#default_value' => REQUEST_TIME,
        '#date_type' => DATE_DATETIME,
        '#date_timezone' => date_default_timezone(),
        '#date_format' => 'm/d/Y',
        '#date_increment' => 1,
        '#date_year_range' => '-3:+3',
        '#required' => TRUE,
    );
    if(!empty($cache['date'])) {
        $form['date']['#default_value'] = $cache['date'];
    }else {
        $form['date']['#default_value'] = date('Y-m-d 0:0:00', REQUEST_TIME);
    }



    $field_ctype_golf_hole_option = array();
    $field_ctype_golf_hole_option[] =  '-- Tất cả --';
    foreach (_cassiopeia_get_all_hole() as $key => $value) {
        $field_ctype_golf_hole_option[$value->hole] = t($value->title);
    }
    $form['hole'] = array(
        '#type' => 'select',
        '#title' => t('Hole'),
        '#options' =>$field_ctype_golf_hole_option
    );
    if(!empty($cache['hole'])) {
        $form['hole']['#default_value'] = $cache['hole'];
    }

    $status_options = array();
    $status_options['none'] = 'Tất cả';
    $status_options[0] = 'Ngừng hoạt động';
    $status_options[1] = 'Hoạt động';

    $form['status'] = array(
        '#type' => 'select',
        '#title' => 'Trạng thái',
        '#options' => $status_options,
    );
    if(isset($cache['status'])) {
        $form['status']['#default_value'] = $cache['status'];
    }

    $form['#theme'][] = 'cassiopeia_search_tea_time_details_from';
    $form['submit'] = array('#type' => 'submit', '#value' => 'Tìm kiếm');
    return $form;
}

function cassiopeia_search_tea_time_details_from_submit ($form, $form_state) {
    drupal_goto('manager/tea-time-details',
        array(
            'query'=>array(
                'golf'=>$form_state['values']['golf'],
                'date'=>$form_state['values']['date'],
                'hole'=> $form_state['values']['hole'],
                'status'=>$form_state['values']['status'],
            )
        )
    );
}


function cassiopeia_search_golfs_from ($form, &$form_state, $cache = null) {

    global $user;

    $form['title'] = array(
        '#type' => 'textfield',
        '#title' => 'Sân / Zone',
    );
    if(!empty($cache['title'])) {
        $form['title']['#default_value'] = $cache['title'];
    }


    if(user_has_role(3,$user) || user_has_role(6, $user)) {
        $field_ctype_golf_namespace_options = array();
        $field_ctype_golf_namespace_options['all'] = '---- Tất cả ----';
        foreach (_cassiopeia_get_all_namespace() as $key => $value) {
            $field_ctype_golf_namespace_options[$value->id] = $value->title;
        }
        $form['namespace'] = array(
            '#type' => 'select',
            '#title' => 'Namespace',
            '#options' =>$field_ctype_golf_namespace_options
        );
        if(!empty($cache['namespace'])) {
            $form['namespace']['#default_value'] = $cache['namespace'];
        }
    }


    $vocabulary = taxonomy_vocabulary_machine_name_load('tx_area');
    $terms = entity_load('taxonomy_term', FALSE, array('vid' => $vocabulary->vid));


    $field_ctype_golf_area_options = array();
    $field_ctype_golf_area_options['all'] = '---- Tất cả ----';
    foreach ($terms as $key => $value) {
        $field_ctype_golf_area_options[$value->tid] = $value->name;
    }


    $form['area'] = array(
        '#type' => 'select',
        '#title' => 'Khu vưc',
        '#options' =>$field_ctype_golf_area_options
    );
    if(!empty($cache['area'])) {
        $form['area']['#default_value'] = $cache['area'];
    }



    $field_ctype_golf_hole_option = array();
    $field_ctype_golf_hole_option['all'] =  '-- Tất cả --';
    foreach (_cassiopeia_get_all_hole() as $key => $value) {
        $field_ctype_golf_hole_option[$value->hole] = t($value->title);
    }
    $form['hole'] = array(
        '#type' => 'select',
        '#title' => t('Hole'),
        '#options' =>$field_ctype_golf_hole_option
    );
    if(!empty($cache['hole'])) {
        $form['hole']['#default_value'] = $cache['hole'];
    }


    $status_options = array();
    $status_options['none'] = 'Tất cả';
    $status_options[0] = 'Ngừng hoạt động';
    $status_options[1] = 'Hoạt động';

    $form['status'] = array(
        '#type' => 'select',
        '#title' => 'Trạng thái',
        '#options' => $status_options,
    );
    if(isset($cache['status'])) {
        $form['status']['#default_value'] = $cache['status'];
    }


    $form['#theme'][] = 'cassiopeia_search_golfs_from';
    $form['submit'] = array('#type' => 'submit', '#value' => 'Tìm kiếm', '#attributes'=>array('class'=>array('btn btn-success')));
    return $form;

    return $form;
}


function cassiopeia_search_golfs_from_submit($form, &$form_state) {
    global $user;

    if(user_has_role(3,$user) || user_has_role(6, $user)) {
        drupal_goto('manager/golfs',
            array(
                'query'=>array(
                    'title'=>$form_state['values']['title'],
                    'namespace'=>$form_state['values']['namespace'],
                    'area'=>$form_state['values']['area'],
                    'hole'=>$form_state['values']['hole'],
                    'status'=>$form_state['values']['status'],
                )
            )
        );
    }else {
        drupal_goto('manager/golfs',
            array(
                'query'=>array(
                    'title'=>$form_state['values']['title'],
                    'area'=>$form_state['values']['area'],
                    'hole'=>$form_state['values']['hole'],
                    'status'=>$form_state['values']['status'],
                )
            )
        );
    }

}


function rad ($x) {
    return $x * pi() / 180;
};
function _cassiopeia_calculate_distance($point_from, $point_to) {
    $kmdistance = 0;
    try {
        $R = 6378137; // Earth’s mean radius in meter
        $dLat = rad($point_from['lat'] - $point_to['lat']);
        $dLong = rad($point_from['lng'] - $point_to['lng']);
        $a = sin($dLat / 2) * sin($dLat / 2) + cos(rad($point_from['lat'])) * cos(rad($point_from['lat'])) * sin($dLong / 2) * sin($dLong / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $kmdistance = $R * $c;
    }
    catch (Exception $e) {

    }
    return $kmdistance;
}

function  cassiopeia_calculate_distance($point_from, $point_to){
    $kmdistance = 0;
    try {
//        $url = 'https://maps.googleapis.com/maps/api/directions/json?origin=' . $point_from['lat'] . ',' . $point_from['lng'] . '&destination=' . $point_to['lat'] . ',' . $point_to['lng'] . '&key=AIzaSyCuJV0EMrK7f4i9EVokc-o8D5AUBiaDTWY';
//
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//        $response = curl_exec($ch);
//        curl_close($ch);
//        $data = json_decode($response, true);
//
//        if ($data['status'] == "OK") {
//            if (!empty($data['routes'][0]['legs'][0]['distance']['value'])) {
//                $kmdistance = $data['routes'][0]['legs'][0]['distance']['value'];
//            }
//            else {
//                $kmdistance = _cassiopeia_calculate_distance($point_from, $point_to);
//            }
//        }
//        else {
//            $kmdistance = _cassiopeia_calculate_distance($point_from, $point_to);
//        }
        $kmdistance = _cassiopeia_calculate_distance($point_from, $point_to);

    }catch (Exception $e) {

        $kmdistance = _cassiopeia_calculate_distance($point_from, $point_to);
        throw $e;
    }
    return $kmdistance;
}


function cassiopeia_get_all_golf_by_place () {
    global $language;
//    print_r($language);
    $golf_by_place = array();
    $vocabulary_tx_area = taxonomy_vocabulary_machine_name_load('tx_area');
//    $tx_area_terms = entity_load('taxonomy_term', FALSE, array('vid' => $vocabulary_tx_area->vid));
    $tx_area_terms = taxonomy_get_tree_by_lang($vocabulary_tx_area->vid, 0, $depth = 1,FALSE,$language->language);
//    print_r($tx_area_terms);
//    print(123);
    foreach ( $tx_area_terms as $tx_area_term_key => $tx_area_term_values) {
        $tx_area_term_values = taxonomy_term_load($tx_area_term_values->tid);
        $golf_by_place[$tx_area_term_values->tid] = array();

        $golf_by_place[$tx_area_term_values->tid]['place'] = $tx_area_term_values;
        $golf_by_place[$tx_area_term_values->tid]['golfs'] = array();
        $children = taxonomy_get_children($tx_area_term_values->tid);
        $tids = array();
        $tids[] = $tx_area_term_values->tid;
        if(!empty($children)){
            foreach($children as $child){
                $tids[] = $child->tid;
            }
        }
        $query = new EntityFieldQuery();
        $query->entityCondition('entity_type', 'node')
            ->entityCondition('bundle', 'ctype_golf')
            ->fieldCondition('field_tx_area', 'tid', $tids,"IN");
        $result = $query->execute();

        if (!empty($result['node'])) {
            $golf_nids = array_keys($result['node']);
            $golfs = entity_load('node', $golf_nids);
            $golf_by_place[$tx_area_term_values->tid]['golfs'] = $golfs;
        }

    }
//    print_r($golf_by_place);
    return $golf_by_place;
}

function cassiopeia_get_weather_icon ($code) {
    return $GLOBALS['weather'][$code];
}

function buildBaseString($baseURI, $method, $params) {
    $r = array();
    ksort($params);
    foreach($params as $key => $value) {
        $r[] = "$key=" . rawurlencode($value);
    }
    return $method . "&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
}
function buildAuthorizationHeader($oauth) {
    $r = 'Authorization: OAuth ';
    $values = array();
    foreach($oauth as $key=>$value) {
        $values[] = "$key=\"" . rawurlencode($value) . "\"";
    }
    $r .= implode(', ', $values);
    return $r;
}


function cassiopeia_get_weather($lat,$lng) {
    $result = null;

    try{
        $url = 'https://weather-ydn-yql.media.yahoo.com/forecastrss';
        $app_id = '8C1xeC44';
        $consumer_key = 'dj0yJmk9ZFIxak1FOEtZdlJpJnM9Y29uc3VtZXJzZWNyZXQmc3Y9MCZ4PTc1';
        $consumer_secret = '789f0a36c5a208654a42f8a3ed0c1011af8de334';
        $query = array(
            'lat'=>$lat,
            'lon' => $lng,
            'format' => 'json',
        );
        $oauth = array(
            'oauth_consumer_key' => $consumer_key,
            'oauth_nonce' => uniqid(mt_rand(1, 1000)),
            'oauth_signature_method' => 'HMAC-SHA1',
            'oauth_timestamp' => time(),
            'oauth_version' => '1.0'
        );
        $base_info = buildBaseString($url, 'GET', array_merge($query, $oauth));
        $composite_key = rawurlencode($consumer_secret) . '&';
        $oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
        $oauth['oauth_signature'] = $oauth_signature;
        $header = array(
            buildAuthorizationHeader($oauth),
            'Yahoo-App-Id: ' . $app_id
        );
        $options = array(
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_HEADER => false,
            CURLOPT_URL => $url . '?' . http_build_query($query),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false
        );
        $ch = curl_init();
        curl_setopt_array($ch, $options);
        $response = curl_exec($ch);
        curl_close($ch);
        $result =  json_decode($response);
    }catch (Exception $e) {
        $result = $e;
    }
    return $result;

}




function cassiopeia_get_golf_utilitys_bynamespace($namespace = 0) {
//    global
    $query = db_select('utilities');
    $query->fields('utilities');

    $query->condition('namespace', array(0,$namespace),'IN');
    $result = $query->execute()->fetchAll();
//  print_r($result);die;
    return $result;
}
function cassiopeia_get_utilities_by_namespace($namespace) {
    $query = db_select('utilities');
    $query->fields('utilities');
    $query->condition('namespace', array($namespace),'IN');
    $result = $query->execute()->fetchAll();
    return $result;
}


function cassiopeia_get_golf_utilitys() {
    global  $user;
    $_user_ = user_load($user->uid);
    $result = null;
    if(user_has_role(3, $_user_) || user_has_role(6, $user)) {
        $query = db_select('utilities');
        $query->fields('utilities');
        $result = $query->execute()->fetchAll();
    }else {
        if ( (user_has_role(4, $_user_) || user_has_role(5, $_user_)) && !empty($_user_->field_namespace['und'][0]['value'])) {
            $query = db_select('utilities');
            $query->fields('utilities');
            $query->condition('namespace', array(0,user_load($user->uid)->field_namespace['und'][0]['value']),'IN');
            $result = $query->execute()->fetchAll();
        }
    }
    return $result;
}

function cassiopeia_node_get_golf_utilitys() {
    global  $user;
    $_user_ = user_load($user->uid);
    $result = null;
    $query = db_select('utilities');
    $query->fields('utilities');
    $result = $query->execute()->fetchAll();
    return $result;
}


function cassiopeia_get_golf_utility_by_id ($id) {

    global  $user;
    $_user_ = user_load($user->uid);

    $result = null;
    if(user_has_role(3, $_user_) || user_has_role(6, $_user_)) {
        $query = db_select('utilities')
            ->fields('utilities')
            ->condition('id', $id, '=');
        $result = $query->execute()->fetchObject();
    }else {
        if ((user_has_role(4, $_user_) || user_has_role(5, $_user_)) && !empty($_user_->field_namespace['und'][0]['value'])) {
            $query = db_select('utilities')
                ->fields('utilities')
                ->condition('namespace', array(0, $_user_->field_namespace['und'][0]['value']),'IN')
                ->condition('id', $id, '=');
            $result = $query->execute()->fetchObject();
        }else{
            $query = db_select('utilities')
                ->fields('utilities')
//              ->condition('namespace', array(0, $_user_->field_namespace['und'][0]['value']),'IN')
                ->condition('id', $id, '=');
            $result = $query->execute()->fetchObject();
        }
    }
    return $result;
}

function cassiopeia_get_golf_nears ($node, $range = 10) {
    $lat = $node->field_ctype_golf_lat['und'][0]['value'];
    $lng = $node->field_ctype_golf_lng['und'][0]['value'];
    $golf_nears = array();
    $golf_near_nids = array();

    $glof_query = db_select('node', 'node');
    $glof_query->fields('node');

    $glof_query->join('field_data_field_ctype_golf_lat', 'field_data_field_ctype_golf_lat', 'field_data_field_ctype_golf_lat.entity_id = node.nid');
    $glof_query->fields('field_data_field_ctype_golf_lat');

    $glof_query->join('field_data_field_ctype_golf_lng', 'field_data_field_ctype_golf_lng', 'field_data_field_ctype_golf_lng.entity_id = node.nid');
    $glof_query->fields('field_data_field_ctype_golf_lng');

    $glof_query->addExpression('6378137 * 2 * ATAN2(SQRT(SIN(RADIANS(:lat - field_data_field_ctype_golf_lat.field_ctype_golf_lat_value) / 2) * SIN(RADIANS(:lat - field_data_field_ctype_golf_lat.field_ctype_golf_lat_value) / 2) + COS(RADIANS(:lat)) * COS(RADIANS(:lat)) * SIN(RADIANS(:lng - field_data_field_ctype_golf_lng.field_ctype_golf_lng_value) / 2) * SIN(RADIANS(:lng - field_data_field_ctype_golf_lng.field_ctype_golf_lng_value) / 2)), SQRT(1 - SIN(RADIANS(:lat - field_data_field_ctype_golf_lat.field_ctype_golf_lat_value) / 2) * SIN(RADIANS(:lat - field_data_field_ctype_golf_lat.field_ctype_golf_lat_value) / 2) + COS(RADIANS(:lat)) * COS(RADIANS(:lat)) * SIN(RADIANS(:lng - field_data_field_ctype_golf_lng.field_ctype_golf_lng_value) / 2) * SIN(RADIANS(:lng - field_data_field_ctype_golf_lng.field_ctype_golf_lng_value) / 2)))', 'kilometer', [
        ':lat' => $lat,
        ':lng' => $lng
    ]);

    $glof_query->where('(6378137 * 2 * ATAN2(SQRT(SIN(RADIANS(:lat - field_data_field_ctype_golf_lat.field_ctype_golf_lat_value) / 2) * SIN(RADIANS(:lat - field_data_field_ctype_golf_lat.field_ctype_golf_lat_value) / 2) + COS(RADIANS(:lat)) * COS(RADIANS(:lat)) * SIN(RADIANS(:lng - field_data_field_ctype_golf_lng.field_ctype_golf_lng_value) / 2) * SIN(RADIANS(:lng - field_data_field_ctype_golf_lng.field_ctype_golf_lng_value) / 2)), SQRT(1 - SIN(RADIANS(:lat - field_data_field_ctype_golf_lat.field_ctype_golf_lat_value) / 2) * SIN(RADIANS(:lat - field_data_field_ctype_golf_lat.field_ctype_golf_lat_value) / 2) + COS(RADIANS(:lat)) * COS(RADIANS(:lat)) * SIN(RADIANS(:lng - field_data_field_ctype_golf_lng.field_ctype_golf_lng_value) / 2) * SIN(RADIANS(:lng - field_data_field_ctype_golf_lng.field_ctype_golf_lng_value) / 2)))) <50000',  [
        ':lat' => $lat,
        ':lng' => $lng
    ]);

    $glof_query->condition('node.nid', $node->nid , '!=');
    $glof_query->orderBy('kilometer', 'ASC');
    $glof_query->range(0, $range);
    $glof_query_result = $glof_query->execute()->fetchAll();
    foreach ($glof_query_result as $key => $value) {
        $golf_near_nids[] = $value->nid;
    }

    if (!empty($golf_near_nids)) {
        $golf_nears =  node_load_multiple($golf_near_nids);
    }

    return $golf_nears;
}
function cassiopeia_get_plance_nears ($plance, $range = 10) {
    $lat = $plance->field_tx_area_lat['und'][0]['value'];
    $lng = $plance->field_tx_area_lng['und'][0]['value'];

    $plance_nears = array();
    $plance_near_tids = array();

    $plance_query = db_select('taxonomy_term_data', 'taxonomy_term_data');
    $plance_query->fields('taxonomy_term_data');

    $plance_query->join('field_data_field_tx_area_lat', 'field_data_field_tx_area_lat', 'field_data_field_tx_area_lat.entity_id = taxonomy_term_data.tid');
    $plance_query->fields('field_data_field_tx_area_lat');

    $plance_query->join('field_data_field_tx_area_lng', 'field_data_field_tx_area_lng', 'field_data_field_tx_area_lng.entity_id = taxonomy_term_data.tid');
    $plance_query->fields('field_data_field_tx_area_lng');

    $plance_query->addExpression('6378137 * 2 * ATAN2(SQRT(SIN(RADIANS(:lat - field_data_field_tx_area_lat.field_tx_area_lat_value) / 2) * SIN(RADIANS(:lat - field_data_field_tx_area_lat.field_tx_area_lat_value) / 2) + COS(RADIANS(:lat)) * COS(RADIANS(:lat)) * SIN(RADIANS(:lng - field_data_field_tx_area_lng.field_tx_area_lng_value) / 2) * SIN(RADIANS(:lng - field_data_field_tx_area_lng.field_tx_area_lng_value) / 2)), SQRT(1 - SIN(RADIANS(:lat - field_data_field_tx_area_lat.field_tx_area_lat_value) / 2) * SIN(RADIANS(:lat - field_data_field_tx_area_lat.field_tx_area_lat_value) / 2) + COS(RADIANS(:lat)) * COS(RADIANS(:lat)) * SIN(RADIANS(:lng - field_data_field_tx_area_lng.field_tx_area_lng_value) / 2) * SIN(RADIANS(:lng - field_data_field_tx_area_lng.field_tx_area_lng_value) / 2)))', 'kilometer', [
        ':lat' => $lat,
        ':lng' => $lng
    ]);

    $plance_query->condition('taxonomy_term_data.tid', $plance->tid , '!=');
    $plance_query->orderBy('kilometer', 'ASC');
    $plance_query->range(0, $range);
    $plance_query_result = $plance_query->execute()->fetchAll();
    foreach ($plance_query_result as $key => $value) {
        $plance_near_tids[] = $value->tid;
    }

    if (!empty($plance_near_tids)) {
        $plance_nears =  taxonomy_term_load_multiple($plance_near_tids);
    }
    return $plance_nears;
}

function cassiopeia_get_glolf_plance_nears ($plance, $range = 10) {
    $lat = $plance->field_tx_area_lat['und'][0]['value'];
    $lng = $plance->field_tx_area_lng['und'][0]['value'];

    $glolf_not_in_ids = taxonomy_select_nodes($plance->tid);

    $golf_nears = array();
    $golf_near_nids = array();

    try{
        $glof_query = db_select('node', 'node');
        $glof_query->fields('node');

        $glof_query->join('field_data_field_ctype_golf_lat', 'field_data_field_ctype_golf_lat', 'field_data_field_ctype_golf_lat.entity_id = node.nid');
        $glof_query->fields('field_data_field_ctype_golf_lat');

        $glof_query->join('field_data_field_ctype_golf_lng', 'field_data_field_ctype_golf_lng', 'field_data_field_ctype_golf_lng.entity_id = node.nid');
        $glof_query->fields('field_data_field_ctype_golf_lng');

        $glof_query -> join("field_data_field_tx_area","field_data_field_tx_area","field_data_field_tx_area.entity_id = node.nid");
        $glof_query->condition("field_data_field_tx_area.field_tx_area_tid",$plance->tid,"<>");

        $glof_query->addExpression('6378137 * 2 * ATAN2(SQRT(SIN(RADIANS(:lat - field_data_field_ctype_golf_lat.field_ctype_golf_lat_value) / 2) * SIN(RADIANS(:lat - field_data_field_ctype_golf_lat.field_ctype_golf_lat_value) / 2) + COS(RADIANS(:lat)) * COS(RADIANS(:lat)) * SIN(RADIANS(:lng - field_data_field_ctype_golf_lng.field_ctype_golf_lng_value) / 2) * SIN(RADIANS(:lng - field_data_field_ctype_golf_lng.field_ctype_golf_lng_value) / 2)), SQRT(1 - SIN(RADIANS(:lat - field_data_field_ctype_golf_lat.field_ctype_golf_lat_value) / 2) * SIN(RADIANS(:lat - field_data_field_ctype_golf_lat.field_ctype_golf_lat_value) / 2) + COS(RADIANS(:lat)) * COS(RADIANS(:lat)) * SIN(RADIANS(:lng - field_data_field_ctype_golf_lng.field_ctype_golf_lng_value) / 2) * SIN(RADIANS(:lng - field_data_field_ctype_golf_lng.field_ctype_golf_lng_value) / 2)))', 'kilometer', [
            ':lat' => $lat,
            ':lng' => $lng
        ]);

        if (!empty($glolf_not_in_ids)) {
            $glof_query->condition('node.nid', $glolf_not_in_ids , 'NOT IN');
        }

        $glof_query->orderBy('kilometer', 'ASC');
        $glof_query->range(0, $range);
        $glof_query_result = $glof_query->execute()->fetchAll();


    }catch (Exception $e){
        print_r($e);
    }
    foreach ($glof_query_result as $key => $value) {
        $golf_near_nids[] = $value->nid;
    }

    if (!empty($golf_near_nids)) {
        $golf_nears =  node_load_multiple($golf_near_nids);
    }

    return $golf_nears;
}
function _cassiopeia_get_glolf_by_distance_ ($plance, $range = 10) {
    global $language;

    $children_ids = array();
    $children_ids[]  = $plance->tid;
    $children = taxonomy_get_children($plance->tid);
    if(!empty($children)){
        foreach($children as $value){
            $children_ids[] = $value->tid;
        }
    }

    $golf_nears = array();
    $golf_near_nids = array();

    try{

        $sub_query = db_select('field_data_field_tx_area', 'field_tx_area');
        $sub_query->fields('field_tx_area');
        $sub_query-> join("field_data_field_tx_area_lat","field_tx_area_lat","field_tx_area_lat.entity_id = field_tx_area.field_tx_area_tid");
        $sub_query->fields('field_tx_area_lat', array('field_tx_area_lat_value'));
        $sub_query-> join("field_data_field_tx_area_lng","field_tx_area_lng","field_tx_area_lng.entity_id = field_tx_area.field_tx_area_tid");
        $sub_query->fields('field_tx_area_lng', array('field_tx_area_lng_value'));
        $sub_query->condition('field_tx_area.language', $language->language);

        $glof_query = db_select('node', 'node');
        $glof_query->fields('node');

        $glof_query->join('field_data_field_ctype_golf_lat', 'field_data_field_ctype_golf_lat', 'field_data_field_ctype_golf_lat.entity_id = node.nid');
        $glof_query->fields('field_data_field_ctype_golf_lat');

        $glof_query->join('field_data_field_ctype_golf_lng', 'field_data_field_ctype_golf_lng', 'field_data_field_ctype_golf_lng.entity_id = node.nid');
        $glof_query->fields('field_data_field_ctype_golf_lng');

        $glof_query -> join($sub_query, 'field_data_field_tx_area',"field_data_field_tx_area.entity_id = node.nid");
        $glof_query->fields('field_data_field_tx_area', array('field_tx_area_lat_value', 'field_tx_area_lng_value'));
        $glof_query->condition("field_data_field_tx_area.field_tx_area_tid",$children_ids,"IN");

        $glof_query->addExpression('6378137 * 2 * ATAN2(SQRT(SIN(RADIANS(field_data_field_tx_area.field_tx_area_lat_value - field_data_field_ctype_golf_lat.field_ctype_golf_lat_value) / 2) * SIN(RADIANS(field_data_field_tx_area.field_tx_area_lat_value - field_data_field_ctype_golf_lat.field_ctype_golf_lat_value) / 2) + COS(RADIANS(field_data_field_tx_area.field_tx_area_lat_value)) * COS(RADIANS(field_data_field_tx_area.field_tx_area_lat_value)) * SIN(RADIANS(field_data_field_tx_area.field_tx_area_lng_value - field_data_field_ctype_golf_lng.field_ctype_golf_lng_value) / 2) * SIN(RADIANS(field_data_field_tx_area.field_tx_area_lng_value - field_data_field_ctype_golf_lng.field_ctype_golf_lng_value) / 2)), SQRT(1 - SIN(RADIANS(field_data_field_tx_area.field_tx_area_lat_value - field_data_field_ctype_golf_lat.field_ctype_golf_lat_value) / 2) * SIN(RADIANS(field_data_field_tx_area.field_tx_area_lat_value - field_data_field_ctype_golf_lat.field_ctype_golf_lat_value) / 2) + COS(RADIANS(field_data_field_tx_area.field_tx_area_lat_value)) * COS(RADIANS(field_data_field_tx_area.field_tx_area_lat_value)) * SIN(RADIANS(field_data_field_tx_area.field_tx_area_lng_value - field_data_field_ctype_golf_lng.field_ctype_golf_lng_value) / 2) * SIN(RADIANS(field_data_field_tx_area.field_tx_area_lng_value - field_data_field_ctype_golf_lng.field_ctype_golf_lng_value) / 2)))', 'kilometer');

        $glof_query->orderBy('kilometer', 'ASC');
//        $glof_query->range(0, $range);
        $glof_query_result = $glof_query->execute()->fetchAll();
    }catch (Exception $e){
    }
    foreach ($glof_query_result as $key => $value) {
        $golf_near_nids[] = $value->nid;
    }

    if (!empty($golf_near_nids)) {
        $golf_nears =  node_load_multiple($golf_near_nids);
    }
    return $golf_nears;
}

function cassiopeiaget_golf_soft_by_price ($term){
    $golfs = array();
    $children_ids = array();
    $children_ids[]  = $term->tid;
    $children = taxonomy_get_children($term->tid);
    if(!empty($children)){
        foreach($children as $value){
            $children_ids[] = $value->tid;
        }
    }
    $query = db_select("node","node");
    $query -> condition("type","ctype_tea_time");
    $golf_conditions = array();
    $golf_conditions['created'] = array(
        "type" => "propertyOrderBy",
        "direction" => "DESC",
    );
    $golf_conditions['status'] = array(
        "type" => "propertyCondition",
        "value" => 1,
        "condition" => "=",
    );
    $golf_conditions['field_tx_area'] = array(
        "type" => "fieldCondition",

    );

//    $_times_by_day_  =  cassiopeia_glof_get_tea_time_by_day($node);
//    $min_max_price_time_by_day = cassiopeia_glof_get_min_max_tea_time($_times_by_day_);
//
//    $query = new EntityFieldQuery();
//    $query->entityCondition('entity_type', 'node')
//        ->entityCondition('bundle', 'ctype_golf')
//        ->fieldCondition('field_tx_area', 'tid',$children_ids,"IN")
//        ->propertyOrderBy("created","DESC") ;
//    $result = $query->execute();

    if (!empty($result['node'])) {
        $golf_nids = array_keys($result['node']);
        $golfs = entity_load('node', $golf_nids);
    }

    return $golfs;
}
function cassiopeia_get_glolf ($term){
    $golfs = array();
    $children_ids = array();
    $children_ids[]  = $term->tid;
    $children = taxonomy_get_children($term->tid);
    if(!empty($children)){
        foreach($children as $value){
            $children_ids[] = $value->tid;
        }
    }
    $query = new EntityFieldQuery();
    $query->entityCondition('entity_type', 'node')
        ->entityCondition('bundle', 'ctype_golf')
        ->fieldCondition('field_tx_area', 'tid',$children_ids,"IN")
        ->propertyOrderBy("created","DESC") ;
    $result = $query->execute();

    if (!empty($result['node'])) {
        $golf_nids = array_keys($result['node']);
        $golfs = entity_load('node', $golf_nids);
    }

    return $golfs;
}

//todo price


function cassiopeia_get_glolf_by_price ($term,$date='') {
    $golfs = array();
    $children_ids = array();
    $children_ids[]  = $term->tid;
    $children = taxonomy_get_children($term->tid);
    if(!empty($children)){
        foreach($children as $value){
            $children_ids[] = $value->tid;
        }
    }

    try {
        $query_sub = db_select('node', 'ctype_tea_time');
        $query_sub->fields('ctype_tea_time', array('nid'));
        $query_sub->join('field_data_field_c_t_t_parent', 'field_data_field_c_t_t_parent', 'field_data_field_c_t_t_parent.entity_id = ctype_tea_time.nid');
        $query_sub->fields('field_data_field_c_t_t_parent', array('field_c_t_t_parent_nid'));
        $query_sub->join('field_data_field_c_t_t_sh', 'field_data_field_c_t_t_sh', 'field_data_field_c_t_t_sh.entity_id = ctype_tea_time.nid');
        $query_sub->fields('field_data_field_c_t_t_sh', array('field_c_t_t_sh_value'));
        $query_sub->join('field_data_field_c_t_t_date', 'field_data_field_c_t_t_date', 'field_data_field_c_t_t_date.entity_id = ctype_tea_time.nid');
        $query_sub->fields('field_data_field_c_t_t_date', array('field_c_t_t_date_value'));
        $query_sub->join('field_data_field_c_t_t_price', 'field_data_field_c_t_t_price', 'field_data_field_c_t_t_price.entity_id = ctype_tea_time.nid');
        $query_sub->fields('field_data_field_c_t_t_price', array('field_c_t_t_price_value'));
        $query_sub->join('field_data_field_c_t_t_a_price', 'field_data_field_c_t_t_a_price', 'field_data_field_c_t_t_a_price.entity_id = ctype_tea_time.nid');
        $query_sub->fields('field_data_field_c_t_t_a_price', array('field_c_t_t_a_price_value'));
        $query_sub->condition('ctype_tea_time.type', 'ctype_tea_time');

        if($date!='all'){
            if(!empty($date)){
                $query_sub->condition('field_data_field_c_t_t_sh.field_c_t_t_sh_value', array(strtotime(date('Y/m/d', strtotime($date))),strtotime('+1 days' . date('Y/m/d', strtotime($date)))), 'BETWEEN');
            }else{
                $query_sub->condition('field_data_field_c_t_t_sh.field_c_t_t_sh_value', array(strtotime(date('Y/m/d', REQUEST_TIME)),strtotime('+1 days' . date('Y/m/d', REQUEST_TIME))), 'BETWEEN');
            }
        }else {
            $query_sub->condition("field_data_field_c_t_t_sh.field_c_t_t_sh_value",REQUEST_TIME,">=");
        }

        //    $query_sub->condition('field_data_field_c_t_t_parent.field_c_t_t_parent_nid', 'ctype_golf.nid');
        $query_sub->condition('ctype_tea_time.status', 1);
        $query_sub->addExpression('MAX(field_data_field_c_t_t_a_price.field_c_t_t_a_price_value)', 'max_alegolf_price');
        $query_sub->addExpression('MAX(field_data_field_c_t_t_price.field_c_t_t_price_value)', 'max_price');
        $query_sub->addExpression('MIN(field_data_field_c_t_t_a_price.field_c_t_t_a_price_value)', 'min_alegolf_price');
        $query_sub->addExpression('MIN(field_data_field_c_t_t_price.field_c_t_t_price_value)', 'min_price');
        $query_sub->addExpression('MAX((field_data_field_c_t_t_price.field_c_t_t_price_value - field_data_field_c_t_t_price.field_c_t_t_price_value)*100/field_data_field_c_t_t_price.field_c_t_t_price_value)', 'max_percent');
        $query_sub->groupBy('field_data_field_c_t_t_parent.field_c_t_t_parent_nid');


        $query = db_select('node', 'ctype_golf');
        $query->fields('ctype_golf');
        $query->join('field_data_field_tx_area', 'field_tx_area', 'field_tx_area.entity_id = ctype_golf.nid');
        $query->fields('field_tx_area', array('field_tx_area_tid'));
        $query->leftJoin($query_sub, 'ctype_tea_time', 'ctype_tea_time.field_c_t_t_parent_nid = ctype_golf.nid');
        $query->fields('ctype_tea_time', array('field_c_t_t_parent_nid', 'max_alegolf_price', 'min_alegolf_price', 'max_price', 'min_price'));
        $query->condition("ctype_golf.type",'ctype_golf');
        $query->condition("ctype_golf.status",1);
        $query->condition("field_tx_area.field_tx_area_tid",$children_ids,"IN");
        $query->orderBy('CAST(ctype_tea_time.min_alegolf_price AS SIGNED)', 'ASC');
        $query->orderBy('CAST(ctype_tea_time.max_alegolf_price AS SIGNED)', 'ASC');

        $result = $query->execute()->fetchAll();


        if (!empty($result)) {
            $golf_nids = array();
            foreach ($result as $value) {
                $golfs[] = node_load($value->nid);
            }

        }


    }catch (Exception $e) {

    }

    return $golfs;
}


function cassiopeia_get_glolf_by_rank ($term) {
    $golfs = array();
    $children_ids = array();
    $children_ids[]  = $term->tid;
    $children = taxonomy_get_children($term->tid);
    if(!empty($children)){
        foreach($children as $value){
            $children_ids[] = $value->tid;
        }
    }
    try{
        $query = db_select("tbl_score","tbl_score");;
        $query-> fields("tbl_score");
        $query -> addExpression("AVG(score)","_average");
        $query-> groupBy("tbl_score.nid");
        $query->orderBy("_average","DESC");
        $query2 = db_select("node","tbl_golf");
        $query2 -> addField("tbl_golf","nid","golf_id");
        $query2 -> condition("type","ctype_golf");
        $query2 -> condition("status",1);
        $query2 -> join("field_data_field_tx_area","field_data_field_tx_area","field_data_field_tx_area.entity_id = tbl_golf.nid");
        $query2 -> fields("field_data_field_tx_area");
        $query2 -> condition("field_data_field_tx_area.field_tx_area_tid",$children_ids,"IN");
        $query -> join($query2,"tbl_golf_alias","tbl_score.nid = tbl_golf_alias.golf_id");
        $query -> fields("tbl_golf_alias");
//            $result2 = $query2->execute()->fetchAll();
//            print_r((string)$query);
        $result = $query->execute()->fetchAll();
//            var_dump($result);
    }catch(Exception $e){
//        print($e);
    }

    if(!empty($result)){
        foreach ($result as $result_key => $result_value) {
            $golf_nids[] = $result_value->nid;
        }
    }

    if (!empty($golf_nids)) {
        $golfs = entity_load('node', $golf_nids);
    }
    $_items = array();
    $__items = array();
    if(!empty($golfs)){
        foreach($golfs as $golf){
            if (!empty($golf->field_ctype_golf_live['und'][0]['value'])) {
                $_items[] = $golf;
            } else {
                $__items[] = $golf;
            }
        }
    }
    return array_merge($_items,$__items);

}
function cassiopeia_get_glolf_by_search ($term) {
//    die;
    $golfs = array();
    $golf_nids = array();
    $result = array();
    $children_ids = array();
    $children_ids[]  = $term->tid;
    $children = taxonomy_get_children($term->tid);
    if(!empty($children)){
        foreach($children as $value){
            $children_ids[] = $value->tid;
        }
    }
    try{
        $query = db_select("tbl_golf_search_record")
            -> fields("tbl_golf_search_record",array("golf_id"))
            -> orderBy("count","DESC");
        $query -> join("field_data_field_tx_area","field_data_field_tx_area","field_data_field_tx_area.entity_id = tbl_golf_search_record.golf_id");
        $query -> join("field_data_field_ctype_golf_live","field_data_field_ctype_golf_live","field_data_field_ctype_golf_live.entity_id = tbl_golf_search_record.golf_id");
        $query -> orderBy("field_data_field_ctype_golf_live.field_ctype_golf_live_value","DESC");
        $query ->  fields("field_data_field_tx_area");
        $query -> condition("field_data_field_tx_area.field_tx_area_tid",$children_ids,"IN");
//       $query -> join("node","node.nid=tbl_golf_search_record.golf_id","tbl_node");
//       $query -> condition("tbl_node.type","ctype_golf","=");
//       $query -> condition("tbl_node.status",1,"=");
        $result = $query -> execute() -> fetchAll();
    }catch(Exception $e){
//        print($e);
    }
//    var_dump($result);die;
    foreach ($result as $result_key => $result_value) {
        $golf_nids[] = $result_value->golf_id;
    }
    if (!empty($golf_nids)) {
        $golfs = entity_load('node', $golf_nids);
    }
    $_items = array();
    $__items = array();
    if(!empty($golfs)){
        foreach($golfs as $golf){
            if (!empty($golf->field_ctype_golf_live['und'][0]['value'])) {
                $_items[] = $golf;
            } else {
                $__items[] = $golf;
            }
        }
    }
    return array_merge($_items,$__items);
}
function cassiopeia_get_glolf_by_distance ($plance) {

    $lat = $plance->field_tx_area_lat['und'][0]['value'];
    $lng = $plance->field_tx_area_lng['und'][0]['value'];

    $golfs = array();
    $golf_nids = array();
    $children_ids = array();
    $children_ids[]  = $plance->tid;
    $children = taxonomy_get_children($plance->tid);
    if(!empty($children)){
        foreach($children as $value){
            $children_ids[] = $value->tid;
        }
    }
//    print_r($children_ids);
    try {
        $query = db_select('node', 'ctype_golf');
        $query->fields('ctype_golf');

        $query->join('field_data_field_ctype_golf_lat', 'field_data_field_ctype_golf_lat', 'field_data_field_ctype_golf_lat.entity_id = ctype_golf.nid');
        $query->fields('field_data_field_ctype_golf_lat');
        $query -> join("field_data_field_tx_area","field_data_field_tx_area","field_data_field_tx_area.entity_id = ctype_golf.nid");
        $query->join('field_data_field_ctype_golf_lng', 'field_data_field_ctype_golf_lng', 'field_data_field_ctype_golf_lng.entity_id = ctype_golf.nid');
        $query->fields('field_data_field_ctype_golf_lat');
        $query->condition("field_data_field_tx_area.field_tx_area_tid",$children_ids,"IN");
        $query->addExpression('6378137 * 2 * ATAN2(SQRT(SIN(RADIANS(:lat - field_data_field_ctype_golf_lat.field_ctype_golf_lat_value) / 2) * SIN(RADIANS(:lat - field_data_field_ctype_golf_lat.field_ctype_golf_lat_value) / 2) + COS(RADIANS(:lat)) * COS(RADIANS(:lat)) * SIN(RADIANS(:lng - field_data_field_ctype_golf_lng.field_ctype_golf_lng_value) / 2) * SIN(RADIANS(:lng - field_data_field_ctype_golf_lng.field_ctype_golf_lng_value) / 2)), SQRT(1 - SIN(RADIANS(:lat - field_data_field_ctype_golf_lat.field_ctype_golf_lat_value) / 2) * SIN(RADIANS(:lat - field_data_field_ctype_golf_lat.field_ctype_golf_lat_value) / 2) + COS(RADIANS(:lat)) * COS(RADIANS(:lat)) * SIN(RADIANS(:lng - field_data_field_ctype_golf_lng.field_ctype_golf_lng_value) / 2) * SIN(RADIANS(:lng - field_data_field_ctype_golf_lng.field_ctype_golf_lng_value) / 2)))', 'kilometer', [
            ':lat' => $lat,
            ':lng' => $lng
        ]);

        $query->condition('ctype_golf.type', 'ctype_golf');
        $query->condition('ctype_golf.status', 1);

        $query->orderBy('kilometer', 'ASC');
        $result = $query->execute()->fetchAll();

        foreach ($result as $result_key => $result_value) {
            $golf_nids[] = $result_value->nid;
        }
    }catch (Exception $e) {
//        print_r($e);
    }

    if (!empty($golf_nids)) {
        $golfs = entity_load('node', $golf_nids);
    }
    $_items = array();
    $__items = array();
    if(!empty($golfs)){
        foreach($golfs as $golf){
            if (!empty($golf->field_ctype_golf_live['und'][0]['value'])) {
                $_items[] = $golf;
            } else {
                $__items[] = $golf;
            }
        }
    }
    return array_merge($_items,$__items);
}


function cassiopeia_golf_booking_form ($form, &$form_state, $node,$args=array()) {
    global $language;

    $form['#attached']['js'][] =  drupal_get_path('module', 'cassiopeia') . '/js/booking-golf-form.js';

    $form_state['golf'] = $node;
    $_total_price = 0;
    $total_price = 0;

    $_times_by_day_  =  cassiopeia_glof_get_tea_time_by_day($node);
    $min_max_price_time_by_day = cassiopeia_glof_get_min_max_tea_time($_times_by_day_);

    if(empty($form_state['book_tea_times'])) {
        $form_state['book_tea_times'][] = 0;
    }

    $form['booking_form'] = array(
        '#type' => 'container',
        '#prefix' => '<div id="booking-golf-form">',
        '#suffix' => '</div>',
    );


    $form['booking_form']['booking_header'] = array(
        '#type' => 'container',
        '#attributes' => array(
            'class' => array('booking_header'),
        ),
    );


    $form['booking_form']['booking_header'][] = array(
        '#markup' => '<div class="price-list"><span class="price-list-number-1"><span class="text">'.t("Price:&nbsp;").'</span>'.number_format($min_max_price_time_by_day['min'], 0, ',', '.').' đ </span><span class="price-list-number-1">&nbsp;-&nbsp;</span><span class="price-list-number-1">'.number_format($min_max_price_time_by_day['max'], 0, ',', '.').' đ / '.'</span><span class="text">'.t('person').'</span></div>',
    );


    $form['booking_form']['booking_body'] = array(
        '#type' => 'container',
    );

//    print_r($form_state['book_tea_times']);
    foreach ($form_state['book_tea_times'] as $key => $value) {
        if(!empty($form_state['values']['tee_time_delete_'.$value]) && $form_state['values']['tee_time_delete_'.$value]==1){
            unset($form_state['book_tea_times'][$value]);
            continue;
        }
        $form['booking_form']['booking_body']['tea_time_'.($value)] = array(
            '#type' => 'container',
            '#prefix' => '<div id="booking-tea-time-'.($value).'-wrap" class="booking-tea-time-wrap">',
            '#suffix' => '</div>',
            '#attributes' => array(
                'class' => array('booking-tea-time-item'),
            ),
        );

        $form['booking_form']['booking_body']['tea_time_'.($value)]['group-1'] = array(
            '#type' => 'container',
            '#attributes' => array(
                'class' => array('group-1'),
            ),
        );

        $form['booking_form']['booking_body'] ['tea_time_'.($value)]['group-1']['pic_up_date_'.($value)] = array(
            '#type' => 'date_popup',
            '#default_value' => date('Y-m-d H:i:s', !empty($args['date'])?$args['date']:REQUEST_TIME),
            '#date_timezone' => date_default_timezone(),
            '#date_format' => 'd-m-Y',
            '#date_increment' => 1,
            '#date_year_range' => '0:+3',
            '#description' => '',
            '#datepicker_options' => array(
                'minDate' => "0"
            ),
            '#prefix' => '<div class="tea-time-field-item pic-up-date-field">',
            '#suffix' => '</div>',
            '#required' => TRUE,
            '#ajax' => array(
                'callback' => 'cassiopeia_golf_booking_form_ajax_callback',
                'wrapper' => 'booking-golf-form',
                'method' => 'replace',
                'effect' => 'fade',
            ),
        );

        $number_people_options = array(0=>t("Choose"),1=>'1', 2=>'2', 3=>'3', 4=>'4');
//        print_r($form_state['values']);
        if (!empty($form_state['values']['pic_up_time_'.($value)])) {
            $number_people_options = array();
            $tea_time = node_load($form_state['values']['pic_up_time_' . ($value)]);
//            print_r($tea_time);
            $number_player_ = $tea_time->field_c_t_t_player['und'][0]['value'];
            $min_player = $tea_time->field_c_t_t_min_player['und'][0]['value'];
            $max_player = $tea_time->field_c_t_t_max_player['und'][0]['value'];
            $slots = $max_player - $number_player_;
            for($i=$min_player;$i<=$slots;$i++){
                $number_people_options[$i] = $i;
            }
        }
        $form['booking_form']['booking_body'] ['tea_time_'.($value)]['group-1']['number_people_'.($value)] = array(
            '#title'=> t('Player'),
            '#type' => 'select',
            '#options' => $number_people_options,
            '#prefix' => '<div class="tea-time-field-item number-people-field">',
            '#suffix' => '</div>',
            '#default_value' => 0,
            '#required' => TRUE,
            '#ajax' => array(
                'callback' => 'cassiopeia_golf_booking_form_ajax_callback',
                'wrapper' => 'booking-golf-form',
                'method' => 'replace',
                'effect' => 'fade',
            ),
        );

        $number_hole_options = array();
        foreach ( _cassiopeia_get_available_hole ($node->nid) as $hole_key => $hole_value ) {
            if (!empty($node->field_ctype_golf_hole['und'][0]['value']) && $node->field_ctype_golf_hole['und'][0]['value'] >= $hole_value->hole) {
                $number_hole_options[$hole_value->hole] = $hole_value->hole;
            }
        }
        if(!empty($number_hole_options)){

        }else{
            $number_hole_options[0] = 18;
        }
        $form['booking_form']['booking_body'] ['tea_time_'.($value)]['group-1']['number_hole_'.($value)] = array(
            '#title'=> t('Hole'),
            '#type' => 'select',
            '#options' => $number_hole_options,
            '#prefix' => '<div class="tea-time-field-item number-hole-field">',
            '#suffix' => '</div>',
            '#required' => TRUE,
            '#default_value' => (array_key_exists(18, $number_hole_options))?18:array_values($number_hole_options)[0],
            '#ajax' => array(
                'callback' => 'cassiopeia_golf_booking_form_ajax_callback',
                'wrapper' => 'booking-golf-form',
                'method' => 'replace',
                'effect' => 'fade',
            ),
        );

        $pic_up_time_options = array();

        $condition = array();

        $condition['condition']['field_c_t_t_parent'] = $node->nid;

        $condition['condition']['date'] = array();
        $condition['condition']['date']['value'] = !empty($form_state['values']['pic_up_date_'.($value)])?$form_state['values']['pic_up_date_'.($value)]:date('Y-m-d', $args['date']);
        $condition['condition']['date']['operator'] =  '=';

        $good_times_conditions['condition']['field_c_t_t_parent'] = $node->nid;

        $good_times_conditions['condition']['date'] = array();
        $good_times_conditions['condition']['date']['value'] = !empty($form_state['values']['pic_up_date_'.($value)])?$form_state['values']['pic_up_date_'.($value)]:date('Y-m-d', REQUEST_TIME);
        $good_times_conditions['condition']['date']['operator'] =  '=';

        $good_times_conditions['condition']['good_time'] = array();
        $good_times_conditions['condition']['good_time']['value'] = 1;
        $good_times_conditions['condition']['good_time']['operator'] = "=";
        $good_times_conditions['condition']['field_c_t_t_hole'] = array();
        $good_times_conditions['condition']['field_c_t_t_hole']['value'] = !empty($form_state['values']['number_hole_'.($value)])?$form_state['values']['number_hole_'.($value)]:($form['booking_form']['booking_body'] ['tea_time_'.($value)]['group-1']['number_hole_'.($value)]['#default_value']);
        $good_times_conditions['condition']['field_c_t_t_hole']['operator'] =  '=';
        $good_times = _cassiopeia_get_tea_time_details_by_condition($good_times_conditions);
        $condition['condition']['field_c_t_t_sh'] = array();
        $condition['condition']['field_c_t_t_sh']['value'] = REQUEST_TIME;
        $condition['condition']['field_c_t_t_sh']['operator'] =  '>=';


        $condition['condition']['field_c_t_t_hole'] = array();
        $condition['condition']['field_c_t_t_hole']['value'] = !empty($form_state['values']['number_hole_'.($value)])?$form_state['values']['number_hole_'.($value)]:($form['booking_form']['booking_body'] ['tea_time_'.($value)]['group-1']['number_hole_'.($value)]['#default_value']);
        $condition['condition']['field_c_t_t_hole']['operator'] =  '=';


        $condition['condition']['slot_available'] = array();
        $condition['condition']['slot_available']['value'] = !empty($form_state['values']['number_people_'.($value)])?$form_state['values']['number_people_'.($value)]:1;
        $condition['condition']['slot_available']['operator'] =  '>=';


        $condition['condition']['status'] = array();
        $condition['condition']['status']['value'] = 1;
        $condition['condition']['status']['operator'] =  '=';





        $condition['order'] = array(
            'field_c_t_t_date' => 'DESC',
            'field_c_t_t_sh' => 'ASC'
        );

//todo
        $price = 0;
        $tea_times = array();
        $result =  _cassiopeia_get_tea_time_details_by_condition($condition);
//        var_dump($result);

        $data = cassiopeia_golf_booking_form_to_data($form_state);
        foreach ($form_state['book_tea_times'] as $_key => $_value) {
            if ($_value == $value) {
                unset($data[$_value]);
            }
        }

        $ressult_option= array();
        foreach ($result as $result_key => $result_value) {
            $check = TRUE;
            foreach ($data as $data_key => $data_value ) {
                if ($result_value->nid == $data_value['pic_up_time']) {
                    $check = FALSE;
                }
            }
            if($check) {
                $ressult_option[] = $result_value;
            }

            if (!empty($tea_times[$result_value->field_c_t_t_type['und'][0]['value']])) {
                if ($check) {
                    $tea_times[$result_value->field_c_t_t_type['und'][0]['value']]['values'][] = $result_value;
                }

            }else {
                $tea_times[$result_value->field_c_t_t_type['und'][0]['value']] = array();
                $time_frame = taxonomy_term_load($result_value->field_c_t_t_type['und'][0]['value']);
                $tea_times[$result_value->field_c_t_t_type['und'][0]['value']]['name'] = $time_frame->name;
                $tea_times[$result_value->field_c_t_t_type['und'][0]['value']]['values'] =  array();
                if ($check) {
                    $tea_times[$result_value->field_c_t_t_type['und'][0]['value']]['values'][] =  $result_value;
                }
            }
        }
        $pic_up_time_options = array();
        $check_ = 1;
        $first_tee_time = null;
        foreach ($tea_times as $tea_time_key => $tea_time_value) {
            $pic_up_time_options[$tea_time_value['name']] = array();
            foreach ($tea_time_value['values'] as $tea_time_value_key => $tea_time_value_value) {
                if($check_==1){
                    $first_tee_time = $tea_time_value_value;
                }
                $min_player = $tea_time_value_value->field_c_t_t_min_player['und'][0]['value'];
                $max_player = $tea_time_value_value->field_c_t_t_max_player['und'][0]['value'];
                $number_player_ = $tea_time_value_value->field_c_t_t_player['und'][0]['value'];
                if($min_player > $max_player - $number_player_){
                    continue;
                }
                if($tea_time_value_value->field_c_t_t_price['und'][0]['value']<$tea_time_value_value->field_c_t_t_a_price['und'][0]['value']){
                    $pic_up_time_options[$tea_time_value['name']][$tea_time_value_value->nid] = date('H:i', (int)$tea_time_value_value->field_c_t_t_sh['und'][0]['value']) .' - '. number_format((int)$tea_time_value_value->field_c_t_t_price['und'][0]['value'], 0, ',','.').'đ';
                }else{
                    $pic_up_time_options[$tea_time_value['name']][$tea_time_value_value->nid] = date('H:i', (int)$tea_time_value_value->field_c_t_t_sh['und'][0]['value']) .' - '. number_format((int)$tea_time_value_value->field_c_t_t_a_price['und'][0]['value'], 0, ',','.').'đ';
                }
                $check_ ++ ;
            }
        }
//        }
        $form['booking_form']['booking_body'] ['tea_time_'.($value)]['group-1']['pic_up_time_'.($value)] = array(
            '#title'=> t('Time'),
            '#type' => 'select',
            '#options' => $pic_up_time_options,
            '#prefix' => '<div class="tea-time-field-item pic-up-time-field">',
            '#suffix' => '</div>',
            '#element_validate'=> array('booking_form_pic_up_time_validate'),
            '#required' => TRUE,
            '#ajax' => array(
                'callback' => 'cassiopeia_golf_booking_form_ajax_callback',
                'wrapper' => 'booking-golf-form',
                'method' => 'replace',
                'effect' => 'fade',
            ),
        );
        $form['booking_form']['booking_body'] ['tea_time_'.($value)]['group-1']['tee_time_delete_'.($value)] = array(
            '#type' => 'checkbox',
            '#title' => t(''),
            '#attributes'   => array("class"=>array("tee-time-remove hidden")),
            '#prefix'   => "<label class='btn-remove-tee-time' for='edit-tee-time-delete-".$value."'><span class='glyphicon glyphicon-trash '></span></label>",
            '#suffix'   => "",
            '#ajax' => array(
                'callback' => 'cassiopeia_golf_booking_form_ajax_callback',
                'wrapper' => 'booking-golf-form',
                'method' => 'replace',
                'effect' => 'fade',
            ),
        );
        if(!empty($good_times)){
            $text = "";
            foreach($good_times as $_val){
                $text .= "<span>".date("H:i",$_val->field_c_t_t_sh['und'][0]['value'])."</span>";
            }
            $form['booking_form']['booking_body']['tea_time_'.($value)]['group-good-time'] = array(
                '#type' => 'container',
                '#prefix' => '<div id="good-time-wrap" class="booking-tea-time-wrap"><label>'.t("Best price: ").'</label> &nbsp;'.$text,
                '#suffix' => '</div>',
                '#attributes' => array(
                    'class' => array('group-good-time'),
                ),
            );
        }

        if(!empty($ressult_option)) {
            $form['booking_form']['booking_body']['tea_time_'.($value)]['group-1']['pic_up_time_'.($value)]['#default_value'] = array_values($ressult_option)[0]->nid;
        }

        if(!empty($form_state['values']['pic_up_time_'.($value)])){
            foreach ($ressult_option as $ressult_option_key =>$ressult_option_value) {
                if($ressult_option_value->nid == $form_state['values']['pic_up_time_'.($value)]){
                    if($ressult_option_value->field_c_t_t_price['und'][0]['value'] < $ressult_option_value->field_c_t_t_a_price['und'][0]['value']){
                        $_price = $ressult_option_value->field_c_t_t_price['und'][0]['value'];
                    }else{
                        $_price = $ressult_option_value->field_c_t_t_a_price['und'][0]['value'];
                    }
                    if(!empty($form_state['values']['number_people_'.($value)])){
                        $price = $form_state['values']['number_people_'.($value)] * $_price;
                    }else {
                        $price = $_price;
                    }
                }
            }
        }else {
//            if(!empty($ressult_option)) {
//                if(array_values($ressult_option)[0]->field_c_t_t_price['und'][0]['value']<array_values($ressult_option)[0]->field_c_t_t_a_price['und'][0]['value']){
//                    $price = array_values($ressult_option)[0]->field_c_t_t_price['und'][0]['value'];
//                }else{
//                    $price = array_values($ressult_option)[0]->field_c_t_t_a_price['und'][0]['value'];
//                }
//            }
            $price = 0;
        }

        $total_price = $total_price + $price;
//        print($_total_price);
        if (!empty($form_state['values']['pic_up_time_'.($value)])) {
            $tea_time = node_load($form_state['values']['pic_up_time_'.($value)]);
            $first_tee_time = $tea_time;
            $golf = node_load($tea_time->field_c_t_t_parent['und'][0]['nid']);


            $form['booking_form']['booking_body']['tea_time_'.($value)]['group-2'] = array(
                '#type' => 'container',
                '#attributes' => array(
                    'class' => array('group-2'),
                ),
            );

            $form['booking_form']['booking_body']['tea_time_'.($value)]['group-2']['tea_time_utility_add_more_'.$value] = array(
                '#type' => 'item',
                '#markup' => '<a class="tea_time_utility_add_more" href="#utilitys_'.$value.'"><span class="icon glyphicon glyphicon-plus" ></span>'.t("Rentals & Add-ons").'</a>',
            );


            $form['booking_form']['booking_body']['tea_time_'.($value)]['group-2']['utilitys-selected'] = array(
                '#type' => 'container',
                '#attributes' => array(
                    'class' => array('utilitys-selected'),
                ),
            );

            if(!empty($golf->field_ctype_utility['und'])) {
//                print(1);die;
                foreach ($golf->field_ctype_utility['und'] as $utility_key => $utility_value) {
                    if (!empty($form_state['values']['utility_'.$value.'_'.$utility_value['value']])) {
                        $utility = cassiopeia_get_golf_utility_by_id($utility_value['value']);
                        if(!empty($utility)) {
                            $total_price = $total_price + $form_state['values']['utility_' . $value . '_' . $utility_value['value']] * $utility->price;
                            $form['booking_form']['booking_body']['tea_time_' . ($value)]['group-2']['utilitys-selected']['utility-selected-' . $utility_value['value']] = [
                                '#type' => 'item',
                                '#markup' => '<div class="utility-selected-item"> <span>x' . $form_state['values']['utility_' . $value . '_' . $utility_value['value']] . ' ' . $utility->title . '</span> <span>' . number_format($form_state['values']['utility_' . $value . '_' . $utility_value['value']] * $utility->price, 0, ',', '.') . 'đ</span> </div>',
                            ];
                        }
                    }
                }

                $form['booking_form']['booking_body']['tea_time_'.($value)]['group-2']['utilitys'] = array(
                    '#type' => 'container',
                    '#attributes' => array(
                        'class' => array('utilitys'),
                    ),
                    '#prefix' => '<div class="dialog-utilitys" id="utilitys_'.$value.'"><div class="dialog-utilitys-container"><div class="dialog-utilitys-header-block"><div class="dialog-utilitys-title">'.t('Rentals & Add-Ons').'</div><div class="form-group tea-time-utility-item tea-time-utility-item-tb-header"><div class="tea-time-utility-item-label">'.t('Utility item').'</div><div class="tea-time-utility-item-choi">'.t('Quantity').'</div> </div></div><a class="close-utilitys" href="#utilitys_'.$value.'"><span>x</span></a>',
                    '#suffix' => '<div class="btn-close-form"><a class="btn close-utilitys" href="#utilitys_'.$value.'"><span>'.t('Done').'</span></a></div></div>'
                );

                foreach ($golf->field_ctype_utility['und'] as $utility_key => $utility_value) {
                    $utility = cassiopeia_get_golf_utility_by_id($utility_value['value']);
                    if(!empty($utility)) {

                        $form['booking_form']['booking_body']['tea_time_' . ($value)]['group-2']['utilitys']['utility_' . $value . '_' . $utility->id] = [
                            '#type' => 'textfield',
                            '#size' => 60,
                            '#maxlength' => 128,
                            '#prefix' => '<div class="form-group tea-time-utility-item"> <div class="tea-time-utility-item-label"><span>' . $utility->title . '</span><span>(' . number_format($utility->price, 0, ',', '.') . 'đ)</span></div><div class="tea-time-utility-item-choi"><span class="qty-dec" data-id="' . 'utility_' . $value . '_' . $utility->id . '"><i class="fa fa-minus"></i></span> <span class="input-number" data-id="' . 'utility_' . $value . '_' . $utility->id . '">',
                            '#suffix' => '</span> <span class="qty-inc" data-id="' . 'utility_' . $value . '_' . $utility->id . '"><i class="fa fa-plus"></i></span> </div></div>',
                            '#attributes' => ['readonly' => TRUE],
                            '#default_value' => 0,
                        ];
                    }
                }

            }
            if(!empty($tea_time->field_c_t_t_utility['und']) || !empty($tea_time->field_c_t_t_e_utility[$language->language][0]['value'])) {
                $form['booking_form']['booking_body']['tea_time_'.($value)]['group-3'] = array(
                    '#type' => 'container',
                    '#prefix' => '<div class="group-3"> <label>Giá bao gồm/ Ghi chú:</label> <div>',
                    '#suffix' => '</div></div>',
                );
                $default_utilities_makeup = '<div class="row">';

                if(!empty($tea_time->field_c_t_t_e_utility[$language->language][0]['value'])) {
                    $default_utilities_makeup .= '<div class="col-md-12">'.$tea_time->field_c_t_t_e_utility[$language->language][0]['value'].'</div>';
                }
                $default_utilities_makeup .= '</div>';

                $form['booking_form']['booking_body']['tea_time_'.($value)]['group-3']['default-utilities'] = array(
                    '#markup'=>$default_utilities_makeup
                );
            }


        }elseif (!empty($form['booking_form']['booking_body']['tea_time_'.($value)]['group-1']['pic_up_time_'.($value)]['#default_value'])){

            $tea_time = node_load($form['booking_form']['booking_body']['tea_time_'.($value)]['group-1']['pic_up_time_'.($value)]['#default_value']);
            $golf = node_load($tea_time->field_c_t_t_parent['und'][0]['nid']);

            $form['booking_form']['booking_body']['tea_time_'.($value)]['group-2'] = array(
                '#type' => 'container',
                '#attributes' => array(
                    'class' => array('group-2'),
                ),
            );

            $form['booking_form']['booking_body']['tea_time_'.($value)]['group-2']['tea_time_utility_add_more_'.$value] = array(
                '#type' => 'item',
                '#markup' => '<a class="tea_time_utility_add_more" href="#utilitys_'.$value.'"><span class="icon glyphicon glyphicon-plus" ></span>'.t("Rentals & Add-ons").'</a>',
            );

            $form['booking_form']['booking_body']['tea_time_'.($value)]['group-2']['utilitys'] = array(
                '#type' => 'container',
                '#attributes' => array(
                    'class' => array('utilitys'),
                ),
                '#prefix' => '<div class="dialog-utilitys" id="utilitys_'.$value.'"><div class="dialog-utilitys-header-block"><div class="dialog-utilitys-title">'.t('Add utility').'</div><div class="form-group tea-time-utility-item tea-time-utility-item-tb-header"><div class="tea-time-utility-item-label">'.t('Utility item').'</div><div class="tea-time-utility-item-choi">'.t('Quantity').'</div> </div></div><a class="close-utilitys" href="#utilitys_'.$value.'"><span>x</span></a>',
                '#suffix' => '<div class="btn-close-form"><a class="btn close-utilitys" href="#utilitys_'.$value.'"><span>'.t('Done').'</span></a></div></div>'
            );


            if(!empty($golf->field_ctype_utility['und'])) {
                foreach ($golf->field_ctype_utility['und'] as $utility_key => $utility_value) {
                    $utility = cassiopeia_get_golf_utility_by_id($utility_value['value']);

                    if(!empty($utility)) {
                        $form['booking_form']['booking_body']['tea_time_' . ($value)]['group-2']['utilitys']['utility_' . $value . '_' . $utility->id] = [
                            '#type' => 'textfield',
                            '#size' => 60,
                            '#maxlength' => 128,
                            '#prefix' => '<div class="form-group tea-time-utility-item"> <div class="tea-time-utility-item-label"><span>' . $utility->title . '</span><span>(' . number_format($utility->price, 0, ',', '.') . 'đ)</span></div><div class="tea-time-utility-item-choi"><span class="qty-dec" data-id="' . 'utility_' . $value . '_' . $utility->id . '"><i class="fa fa-minus"></i></span> <span class="input-number" data-id="' . 'utility_' . $value . '_' . $utility->id . '">',
                            '#suffix' => '</span> <span class="qty-inc" data-id="' . 'utility_' . $value . '_' . $utility->id . '"><i class="fa fa-plus"></i></span> </div></div>',
                            '#default_value' => 0,
                            '#attributes' => ['readonly' => TRUE]
                        ];
                    }
                }
            }


            if(!empty($tea_time->field_c_t_t_utility['und']) || !empty($tea_time->field_c_t_t_e_utility[$language->language][0]['value'])){

                $form['booking_form']['booking_body']['tea_time_'.($value)]['group-3'] = array(
                    '#type' => 'container',
                    '#prefix' => '<div class="group-3"> <label>'.t("Price includes").':</label> <div>',
                    '#suffix' => '</div></div>',
                );

                $default_utilities_makeup = '<div class="row">';

                if(!empty($tea_time->field_c_t_t_e_utility[$language->language][0]['value'])) {
                    $default_utilities_makeup .= '<div class="col-md-12">'.$tea_time->field_c_t_t_e_utility[$language->language][0]['value'].'</div>';
                }


                $default_utilities_makeup .= '</div>';

                $form['booking_form']['booking_body']['tea_time_'.($value)]['group-3']['default-utilities'] = array(
                    '#markup'=>$default_utilities_makeup
                );
            }

        }


    }

    $form['booking_form']['booking_body']['tea_time_add_more'] = array(
        '#type' => 'submit',
        '#submit' => array('cassiopeia_golf_booking_form_add_more'),
        '#value' => 'tea_time_add_more',
        '#text' => t('Add tee times'),
        '#attributes' => array(
            'class' => array('btn btn-default'),
            'type' => 'button',
        ),
        '#prefix' => '<div class="add-more-field">',
        '#suffix' => '</div>',

        '#ajax' => array(
            'callback' => 'cassiopeia_golf_booking_form_ajax_callback',
            'wrapper' => 'booking-golf-form',
            'method' => 'replace',
            'effect' => 'fade',
        ),

    );

    $form['booking_form']['booking_footer'] = array(
        '#type' => 'container',
    );

    $form['booking_form']['booking_footer']['addutilitys'] = array(
        '#type' => 'button',
        '#value' => t('Add utility'),
        '#attributes' => array('class' => array('addutilitys')),
        '#prefix' => '<div class="wrrap-addutilitys" style="display: block; overflow: hidden; opacity: 0; width: 0px; height: 0px;">',
        '#suffix' => '</div>',
        '#ajax' => array(
            'callback' => 'cassiopeia_golf_booking_form_ajax_callback',
            'wrapper' => 'booking-golf-form',
            'method' => 'replace',
            'effect' => 'fade',
        ),
    );

    $form['booking_form']['booking_footer']['total-price-and-policy'] = array(
        '#type' => 'container',
        '#attributes'=>array('class'=>array('form-group')),
        '#prefix' => '<div class="form-group total-price-and-policy">',
        '#suffix' => '</div>',
    );
    $_cassiopeia_config_golf_booking_form_value = variable_get('cassiopeia_config_golf_booking_form_value', array(
        'value' => '',
        'format' => 'full_html'
    ));
//    print_r($node);

    $today = getdate();
    $text_cancel = "";
//    print_r($first_tee_time);
    if(!empty($first_tee_time)){
        if($today['wday'] == 6 || $today['wday'] == 7){
            if(!empty($node->field_ctype_golf_cancel_normal['und'][0]['value'])){
                $cancel_value = $node->field_ctype_golf_cancel_normal['und'][0]['value'];
                $time = $first_tee_time->field_c_t_t_sh['und'][0]['value'] + $cancel_value*3600;
                $date_time = date("H:i d/m/Y",$time);
                $text_cancel = str_replace("#time",$date_time,$_cassiopeia_config_golf_booking_form_value['value']);
            }
        }else{
            if(!empty($node->field_ctype_golf_cancel_weekend['und'][0]['value'])){
                $cancel_value = $node->field_ctype_golf_cancel_weekend['und'][0]['value'];
                $time = $first_tee_time->field_c_t_t_date['und'][0]['value'];
                $time = $first_tee_time->field_c_t_t_sh['und'][0]['value'] + $cancel_value*3600;
                $date_time = date("H:i d/m/Y",$time);

                $text_cancel = str_replace("#time","<span style='color: #84c530;'>".$date_time."</span>",$_cassiopeia_config_golf_booking_form_value['value']);
            }
        }
    }

    if(!empty($node->field_ctype_golf_fcancell['vi'][0]['value'])){
        $text = $node->field_ctype_golf_fcancell['vi'][0]['value'];
    }else{
        $text="";
    }
    $form['booking_form']['booking_footer']['total-price-and-policy']['policy'] = array(
        '#type' => 'item',
        '#markup' => '<a href="#" >'.$text_cancel.'<span class="icon"></span></span></a>',
//        '#prefix' => '<div class="booking-policy">',
//        '#suffix' => '</div>',
//        '#description' => $text_cancel,
    );

    $form['booking_form']['booking_footer']['total-price-and-policy']['total-price'] = array(
        '#type' => 'item',
        '#markup' => number_format($total_price, 0,'.', ',').'đ',
        '#prefix' => '<div class="booking-total-price">',
        '#suffix' => '</div>',
    );

    $form['booking_form']['booking_footer']['submit'] = array(
        '#type' => 'submit',
        '#value' => 'Lưu',
        '#text' =>'<span>'.t('Continue booking').'</span>',
    );
    return  $form;
}

function booking_form_pic_up_time_validate($element, &$form_state) {
    $value = $element['#value'];
    $count = 0;
    $data  = cassiopeia_golf_booking_form_to_data($form_state);
    foreach ($data as $_key => $_value) {
        if ($value == $_value['pic_up_time']) {
            $count = $count+1;
        }
    }
    if($count > 1) {
        form_set_error($element['#name'], 'Error');
    }
    drupal_get_messages();
}

function cassiopeia_golf_booking_form_ajax_callback ($form, &$form_state) {
    return $form['booking_form'];
}

function cassiopeia_golf_booking_form_add_more($form, &$form_state) {
    $form_state['book_tea_times'][] = count($form_state['book_tea_times']) > 0 ? max($form_state['book_tea_times']) + 1 : 0;
    $form_state['rebuild'] = TRUE;
}

function cassiopeia_golf_booking_request_mail($golf){

}
function cassiopeia_golf_booking_form_submit ($form, &$form_state) {
    $data = array(
        'golf' => $form_state['golf'],
        'booking' => cassiopeia_golf_booking_form_to_data($form_state)
    );
    $session = 'bg'.REQUEST_TIME;
    $_SESSION['booking_golf'][$session] = $data;
    $_SESSION['booking_golf']['key'] = $session;
    drupal_goto('booking/golf/'.$session);

}

function cassiopeia_golf_booking_form_to_data($form_state) {
    $list = $form_state['book_tea_times'];
    $data = array();
    foreach ($list as $list_key => $list_value) {
        if (empty($data[$list_value]) && !empty($form_state['values']['pic_up_date_'.$list_value]) && !empty($form_state['values']['number_people_'.$list_value]) && !empty($form_state['values']['number_hole_'.$list_value]) && !empty($form_state['values']['pic_up_time_'.$list_value])) {

            $tmp = array(
                'pic_up_date'=>$form_state['values']['pic_up_date_'.$list_value],
                'number_people'=>$form_state['values']['number_people_'.$list_value],
                'number_hole'=>$form_state['values']['number_hole_'.$list_value],
                'pic_up_time'=>$form_state['values']['pic_up_time_'.$list_value],
                'utilitys' =>array()
            );

            foreach ($form_state['values'] as $form_state_key => $form_state_value) {
                if (strpos($form_state_key, 'utility_'.$list_value.'_') !== false && !empty($form_state_value)) {
                    $utility_string_array = explode('_',$form_state_key);
                    $tmp['utilitys'][] = array(
                        'utility' => end($utility_string_array),
                        'quantity' => $form_state_value
                    );
                }
            }

            $data[$list_value] =  $tmp;
        }
    }

    return $data;
}


function cassiopeia_golf_payment_booking_form ($form, &$form_state, $payment) {

    drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/cassiopeia_golf_payment_booking_form.js');

    global $user;

    $price_payment_free = variable_get('payment_free');
    $price_payment_free_vietinbank_signature = variable_get('payment_fee_vietinbank_signature');
    $price_payment_free_card = variable_get('payment_fee_card');


    $form = array();
    $form['#payment'] = $payment;

    $form['#total_price'] = 0;
    $form['#promotion_price'] = 0;

    $form['#prefix'] = '<div id="golf-payment-booking-form">';
    $form['#suffix'] = '</div>';

    if (!empty($user->uid)) {
        $_user = user_load($user->uid);
        $form['contact_full_name'] = array(
            '#type' => 'textfield',
            '#size' => 60,
            '#maxlength' => 128,
            '#default_value' => $_user->field_account_full_name['und'][0]['value'],
            '#required' => FALSE,
            '#attributes' =>array('placeholder' => '','readonly' => 'readonly')
        );
        $form['contact_phone'] = array(
            '#type' => 'textfield',
            '#size' => 60,
            '#maxlength' => 128,
            '#required' => FALSE,
            '#default_value' => $_user->field_account_phone['und'][0]['value'],
            '#attributes' =>array('placeholder' => 'Số điện thoại','readonly' => 'readonly')
        );

        $form['contact_email'] = array(
            '#type' => 'textfield',
            '#size' => 60,
            '#maxlength' => 128,
            '#required' => FALSE,
            '#default_value' => $_user->mail,
            '#attributes' =>array('placeholder' => 'Email','readonly' => 'readonly')
        );

        $form['contact_address'] = array(
            '#type' => 'textfield',
            '#size' => 60,
            '#maxlength' => 128,
            '#required' => FALSE,
            '#default_value' => $_user->field_account_address['und'][0]['value'],
            '#attributes' =>array('placeholder' => 'Địa chỉ','readonly' => 'readonly')
        );
//        $form['contact_city'] = array(
//            '#type' => 'textfield',
//            '#size' => 60,
//            '#maxlength' => 128,
//            '#required' => FALSE,
//            '#default_value' => $_user->field_account_city['und'][0]['value'],
//            '#attributes' =>array('placeholder' => '','readonly' => 'readonly')
//        );
//
//        $form['contact_country'] = array(
//            '#type' => 'textfield',
//            '#size' => 60,
//            '#maxlength' => 128,
//            '#required' => FALSE,
//            '#default_value' => $_user->field_account_country['und'][0]['value'],
//            '#attributes' =>array('placeholder' => '','readonly' => 'readonly')
//        );
    }else {
        $form['contact_last_name'] = array(
            '#type' => 'textfield',
            '#size' => 60,
            '#maxlength' => 128,
            '#required' => false,
            '#attributes' =>array('placeholder' => 'Họ *',"class"=>array("required-field"))
        );
        $form['contact_firt_name'] = array(
            '#type' => 'textfield',
            '#size' => 60,
            '#maxlength' => 128,
            '#required' => false,
            '#attributes' =>array('placeholder' => 'Tên *',"class"=>array("required-field"))
        );

        $form['contact_phone'] = array(
            '#type' => 'textfield',
            '#size' => 60,
            '#maxlength' => 128,
            '#required' => false,
            '#attributes' =>array('placeholder' => 'Số điện thoại *',"class"=>array("required-field"))
        );

        $form['contact_email'] = array(
            '#type' => 'textfield',
            '#size' => 60,
            '#maxlength' => 128,
            '#required' => false,
            '#attributes' =>array('placeholder' => 'Email *',"class"=>array("required-field"))
        );

        $form['contact_address'] = array(
            '#type' => 'textfield',
            '#size' => 60,
            '#maxlength' => 128,
            '#required' => FALSE,
            '#attributes' =>array('placeholder' => 'Địa chỉ')
        );

        $form['contact_city'] = array(
            '#type' => 'textfield',
            '#size' => 60,
            '#maxlength' => 128,
            '#required' => FALSE,
            '#attributes' =>array('placeholder' => 'Thành phố')
        );

        $form['contact_country'] = array(
            '#type' => 'textfield',
            '#size' => 60,
            '#maxlength' => 128,
            '#required' => FALSE,
            '#attributes' =>array('placeholder' => 'Quốc gia')
        );

    }

    foreach ($payment['booking'] as $booking_key  =>$booking_value ) {
        for ($i = 0; $i < $booking_value['number_people']; $i++ ) {
            $form['people_name_'.$booking_key.'_'.$i] =  array(
                '#type' => 'textfield',
                '#size' => 60,
                '#maxlength' => 128,
                '#required' => false,
                '#attributes' =>array('placeholder' => 'Họ tên *', 'class'=>array('people-name required-field'), 'data-id'=>$booking_key.'_'.$i,"autocomplete"=>"off")
            );

            $form['people_email_'.$booking_key.'_'.$i] =  array(
                '#type' => 'textfield',
                '#size' => 60,
                '#maxlength' => 128,
                '#required' => FALSE,
                '#attributes' =>array('placeholder' => 'Email', 'class'=>array('people-email '),'data-id'=>$booking_key.'_'.$i)
            );

            $form['people_phonenumber_'.$booking_key.'_'.$i] =  array(
                '#type' => 'textfield',
                '#size' => 60,
                '#maxlength' => 128,
                '#required' => FALSE,
                '#element_validate' => array('_cassiopeia_check_number'),
                '#attributes' =>array('placeholder' => 'Số điện thoại', 'class'=>array('people-phonenumber '),'data-id'=>$booking_key.'_'.$i)
            );
            $form['#member'.$booking_key.'_'.$i] = 0;
        }
    }

    $form['invoice'] = array(
        '#title'=> 'Yêu cầu xuất hóa đơn',
        '#type' => 'checkbox',
        '#checkmark' =>TRUE
    );
    $_cassiopeia_config_introduction_content = variable_get('cassiopeia_payment_booking_config_form__content', array(
        'value' => '',
        'format' => 'full_html'
    ));
    if(!empty($_cassiopeia_config_introduction_content['value'])){
        $form['vietinbank'] = array(
            '#title'=> $_cassiopeia_config_introduction_content['value'],
            '#type' => 'checkbox',
            '#checkmark' =>TRUE
        );
    }


    $form['promotion'] = array(
        '#type' => 'textfield',
        '#size' => 60,
        '#maxlength' => 128,
        '#attributes' => array("placeholder"=>array(t('Enter promotion code'))),
        '#ajax' => array(
            'callback' => 'cassiopeia_golf_payment_booking_form_ajax_callback',
            'wrapper' => 'golf-payment-booking-form',
            'method' => 'replace',
            'effect' => 'fade',
        ),
    );


    foreach ($form['#payment']['booking'] as $booking_key  =>$booking_value){
        $form['#payment']['booking'][$booking_key]['number_member'] = array();
    }
//    var_dump($form_state['values']);
    $member_checked = array();
    $_checked = false;
    foreach ($form['#payment']['booking'] as $booking_key  =>$booking_value) {
//        print_r($member_checked);
        $tea_time = node_load($booking_value['pic_up_time']);
        if($tea_time->field_c_t_t_price['und'][0]['value'] < $tea_time->field_c_t_t_a_price['und'][0]['value']){
            $_price = $tea_time->field_c_t_t_price['und'][0]['value'];
        }else{
            $_price = $tea_time->field_c_t_t_a_price['und'][0]['value'];
        }
        $form['#total_price']  = $form['#total_price']  + $_price*$booking_value['number_people'];
        $form['#total_price']  = $form['#total_price']  + $price_payment_free*$booking_value['number_people'];
        $check_tel = array();
        for ($i = 0; $i < $booking_value['number_people']; $i++ ) {
            if(in_array($form_state['values']['people_phonenumber_'.$booking_key.'_'.$i],$check_tel)){
                continue;
            }
            if(!empty($form_state['values']['people_name_'.$booking_key.'_'.$i]) && !empty($form_state['values']['people_phonenumber_'.$booking_key.'_'.$i])) {
                $__user = user_load_by_mail($form_state['values']['people_email_'.$booking_key.'_'.$i]);
                if(!empty($__user) && user_has_role(9,$__user)){
                    $memeber = cassiopeia_get_check_user_is_member( $form_state['values']['people_email_'.$booking_key.'_'.$i], $form_state['values']['people_phonenumber_'.$booking_key.'_'.$i]);
                    if(!empty($memeber)) {
                        array_push($check_tel,$form_state['values']['people_phonenumber_'.$booking_key.'_'.$i]);
//                    $member_checked[][$booking_key]['tel'] = $form_state['values']['people_phonenumber_'.$booking_key.'_'.$i];
                        $form['#member'.$booking_key.'_'.$i] = 1;
                        $form['#payment']['booking'][$booking_key]['number_member'][] = $memeber;
                        $form['#total_price']  = $form['#total_price']  - $price_payment_free;
                    }else{
//                    print(2);
                    }
                }

            }
//            print_r($check_tel);
        }

        foreach ($booking_value['utilitys'] as  $utility_key => $utility_value) {
            $utility =  cassiopeia_get_golf_utility_by_id($utility_value['utility']);
            if(!empty($utility)) {
                $form['#total_price']  = $form['#total_price']  + $utility->price * $utility_value['quantity'];
            }

        }

    }


    if(!empty($form_state['values']['payment_method']) && $form_state['values']['payment_method'] >1) {
        $form['#_payment_card'] = TRUE;
        $form['#total_price'] =  $form['#total_price'] + $price_payment_free_card;
    }else {
        $form['#_payment_card'] = FALSE;
    }

    if (!empty($form_state['values']['promotion'])) {
        $promotion =  cassiopeia_get_promotion_card_by_code($form_state['values']['promotion'],1,$form['#payment']['golf']->nid);
        if(!empty($promotion) && $promotion->status ==0) {
            if ($promotion->amount_type == 0) {
                $form['#promotion_price'] = $promotion->amount;
            }else {
                $form['#promotion_price'] = $promotion->amount*$form['#total_price']/100;
            }
        }
    }

    if($form['#total_price'] >= $form['#promotion_price']) {
        $form['#total_price'] = $form['#total_price'] - $form['#promotion_price'];
    }else {
        $form['#total_price'] = 0;
    }

    $form['payment_method'] = array(
        '#type' => 'radios',
        '#options' => array(1=>'Chuyển khoản', 2=>'Thanh toán nội địa', 3=>'Thanh toán bằng thẻ visa'),
        '#default_value'=>1,
        '#required' => TRUE,
        '#ajax' => array(
            'callback' => 'cassiopeia_golf_payment_booking_form_ajax_callback',
            'wrapper' => 'golf-payment-booking-form',
            'method' => 'replace',
            'effect' => 'fade',
        ),
    );

    $form['check_member'] = array(
        '#type' => 'button',
        '#value' => 'Kiểm tra member',
        '#ajax' => array(
            'callback' => 'cassiopeia_golf_payment_booking_form_ajax_callback',
            'wrapper' => 'golf-payment-booking-form',
            'method' => 'replace',
            'effect' => 'fade',
        ),
        '#attributes' => array('class'=>array('check_member')),
    );

    $form['submit'] = array(
        '#type' => 'submit',
        '#value' => t('Continue'),
    );

    $form['#theme'][] = 'cassiopeia_golf_booking_payment_form';

    return $form;
}

function cassiopeia_golf_payment_booking_form_ajax_callback($form, &$form_state) {
    return $form;
}
function _cassiopeia_check_number($element, &$form_state) {
//    print(1);
//    print_r($element);
//    if (!empty($element['#value']) && !is_numeric($element['#value'])) {
//        form_set_error($element['#name'], "Số điện thoại không hợp lệ");
//    }
//    if(!is_numeric($element)) {
//        form_set_error($element, 'Số điện thoại không hợp lệ', 'error');
//    }
}
function cassiopeia_back_up_customer($data){
//    print($data['namespace']);die;
    $conditions = array();
    $conditions['email'] = array();
    $conditions['email']['value'] = $data['mail'];
    $conditions['email']['operator'] = "=";
    $conditions['tel'] = array();
    $conditions['tel']['value'] = $data['tel'];
    $conditions['tel']['operator'] = "=";
    $conditions['namespace'] = array();
    $conditions['namespace']['value'] = $data['namespace'];
    $conditions['namespace']['operator'] = "=";
    $customer = cassiopeia_get_customer_by_conditions($conditions);
    if(empty($customer)){
        db_insert("tbl_customer")
            -> fields(array(
                "code" => "customer_code_".$data['tel'],
                "name" => $data['name'],
                "tel" => $data['tel'],
                "email" => $data['mail'],
                "created" => REQUEST_TIME,
                "updated" => 0,
                "status" => 1,
                "namespace" => $data['namespace'],
            ))->execute();
    }else{
        $customer = $customer[0];

        db_update("tbl_customer")
            ->fields(array(
                "updated" => REQUEST_TIME,
            ))->condition("id",$customer->id)->execute();
    }
}
function cassiopeia_get_customer_by_conditions($conditions = array()){
    global $user;
    $query = db_select("tbl_customer","tbl_customer");
    $query->fields("tbl_customer");
    if(!empty($conditions['email'])){
        $query->condition("email",$conditions['email']['value'],$conditions['email']['operator']);
    }
    if(!empty($conditions['tel'])){
        $query->condition("tel",$conditions['tel']['value'],$conditions['tel']['operator']);
    }
    if(!empty($conditions['namespace'])){
        $query->condition("namespace",$conditions['namespace']['value'],$conditions['namespace']['operator']);
    }
    if(!empty($conditions['filter'])){
        if($conditions['filter']['option']=="new_member"){
            $now = getdate();
            if(!empty($conditions['filter']['filter']['today'])){
                $first_time = strtotime(($now['mday'])."-".$now['mon']."-".$now['year']);
                $last_time = strtotime('+24 hour'.($now['mday'])."-".$now['mon']."-".$now['year']);
                $query->condition('tbl_customer.created', array($first_time,$last_time), 'BETWEEN');
            }
            if(!empty($conditions['filter']['cassiopeia_customer_select']['value'])){
                $wday = $now['wday'];
                $f = $wday - 1;
                $l = 7 - $wday;
                switch($conditions['filter']['cassiopeia_customer_select']['value']){
                    case 8 :
                        $first_time = strtotime(($now['mday'])."-".$now['mon']."-".$now['year']);
                        $last_time = strtotime('+24 hour'.($now['mday'])."-".$now['mon']."-".$now['year']);
                        $query->condition('tbl_customer.created', array($first_time,$last_time), 'BETWEEN');
                        break;
                    case 1 :
                        $first_date_of_week = strtotime('-'.$f.' day'.($now['mday'])."-".$now['mon']."-".$now['year']);
                        $last_date_of_week = strtotime('+'.$l.' day'.($now['mday'])."-".$now['mon']."-".$now['year']);
                        $query -> condition("tbl_customer.created",array($first_date_of_week,$last_date_of_week),"BETWEEN");
                        break;
                    case 2 :
                        $first_date_of_week = strtotime('-'.($f+7).' day'.($now['mday'])."-".$now['mon']."-".$now['year']);
                        $last_date_of_week = strtotime('+'.($l-7).' day'.($now['mday'])."-".$now['mon']."-".$now['year']);
                        $query -> condition("tbl_customer.created",array($first_date_of_week,$last_date_of_week),"BETWEEN");
                        break;
                    case 3 :
                        $first_date_of_month = strtotime("1"."-".$now['mon']."-".$now['year']);
                        $last_date_of_month = strtotime("+1 month 1"."-".$now['mon']."-".$now['year']);
                        $query -> condition("tbl_customer.created",array($first_date_of_month,$last_date_of_month),"BETWEEN");
                        break;
                    case 4 :
                        $first_date_of_month = strtotime("-1 month 1"."-".$now['mon']."-".$now['year']);
                        $last_date_of_month = strtotime("1"."-".$now['mon']."-".$now['year']);
                        $query -> condition("tbl_customer.created",array($first_date_of_month,$last_date_of_month),"BETWEEN");
//                        print($last_date_of_month);
                        break;
                    case 5 :
                        if($now['mon']<=3){
                            $first_date_of_month = strtotime("01-01-".$now['year']);
                            $last_date_of_month = strtotime("31-03-".$now['year']);
                        }else if($now['mon'] <= 6){
                            $first_date_of_month = strtotime("01-04-".$now['year']);
                            $last_date_of_month = strtotime("30-06-".$now['year']);
                        }else if($now['mon'] <= 9){
                            $first_date_of_month = strtotime("01-07-".$now['year']);
                            $last_date_of_month = strtotime("30-09-".$now['year']);
                        }else{
                            $first_date_of_month = strtotime("01-10-".$now['year']);
                            $last_date_of_month = strtotime("31-12-".$now['year']);
                        }
                        $query -> condition("tbl_customer.created",array($first_date_of_month,$last_date_of_month),"BETWEEN");
                        break;
                    case 6 :
                        if($now['mon']<=3){
                            $first_date_of_month = strtotime("01-10-".$now['year']);
                            $last_date_of_month = strtotime("31-12-".$now['year']);


                        }else if($now['mon'] <= 6){
                            $first_date_of_month = strtotime("01-01-".$now['year']);
                            $last_date_of_month = strtotime("31-03-".$now['year']);


                        }else if($now['mon'] <= 9){
                            $first_date_of_month = strtotime("01-04-".$now['year']);
                            $last_date_of_month = strtotime("30-06-".$now['year']);


                        }else{
                            $first_date_of_month = strtotime("01-07-".$now['year']);
                            $last_date_of_month = strtotime("30-09-".$now['year']);
                        }
                        $query -> condition("tbl_customer.created",array($first_date_of_month,$last_date_of_month),"BETWEEN");
                        break;
                }
            }
            if(!empty($conditions['filter']['cassiopeia_customer_filter_form_start_time']['value']) && !is_array($conditions['filter']['cassiopeia_customer_filter_form_start_time']['value'])){
                $query -> condition("tbl_customer.created",strtotime($conditions['filter']['cassiopeia_customer_filter_form_start_time']['value']),">=");
            }
            if(!empty($conditions['filter']['cassiopeia_customer_filter_form_end_time']['value']) && !is_array($conditions['filter']['cassiopeia_customer_filter_form_end_time']['value'])){
                $query -> condition("tbl_customer.created",strtotime($conditions['filter']['cassiopeia_customer_filter_form_end_time']['value']),"<=");
            }
        }else{
            if($conditions['filter']['option']=="old_member"){
                $now = getdate();
                $first_time = strtotime(($now['mday'])."-".$now['mon']."-".$now['year']);

                if(!empty($conditions['filter']['filter']['today'])){
                    $first_time = strtotime(($now['mday'])."-".$now['mon']."-".$now['year']);
                    $query->condition("tbl_customer.created",$first_time,"<=");
                    $last_time = strtotime('+24 hour'.($now['mday'])."-".$now['mon']."-".$now['year']);
                    $query->condition('tbl_customer.updated', array($first_time,$last_time), 'BETWEEN');
                }
                if(!empty($conditions['filter']['cassiopeia_customer_select']['value'])){
                    $wday = $now['wday'];
                    $f = $wday - 1;
                    $l = 7 - $wday;
                    switch($conditions['filter']['cassiopeia_customer_select']['value']){
                        case 8 :
                            $first_time = strtotime(($now['mday'])."-".$now['mon']."-".$now['year']);
                            $query->condition("tbl_customer.created",$first_time,"<=");
                            $last_time = strtotime('+24 hour'.($now['mday'])."-".$now['mon']."-".$now['year']);
                            $query->condition('tbl_customer.updated', array($first_time,$last_time), 'BETWEEN');
                            break;
                        case 1 :
                            $first_date_of_week = strtotime('-'.$f.' day'.($now['mday'])."-".$now['mon']."-".$now['year']);
                            $last_date_of_week = strtotime('+'.$l.' day'.($now['mday'])."-".$now['mon']."-".$now['year']);
                            $query -> condition("tbl_customer.updated",array($first_date_of_week,$last_date_of_week),"BETWEEN");
                            $query->condition("tbl_customer.created",$first_date_of_week,"<=");
                            break;
                        case 2 :
                            $first_date_of_week = strtotime('-'.($f+7).' day'.($now['mday'])."-".$now['mon']."-".$now['year']);
                            $last_date_of_week = strtotime('+'.($l-7).' day'.($now['mday'])."-".$now['mon']."-".$now['year']);
                            $query -> condition("tbl_customer.updated",array($first_date_of_week,$last_date_of_week),"BETWEEN");
                            $query->condition("tbl_customer.created",$first_date_of_week,"<=");
                            break;
                        case 3 :
                            $first_date_of_month = strtotime("1"."-".$now['mon']."-".$now['year']);
                            $last_date_of_month = strtotime("+1 month 1"."-".$now['mon']."-".$now['year']);
                            $query -> condition("tbl_customer.updated",array($first_date_of_month,$last_date_of_month),"BETWEEN");
                            $query->condition("tbl_customer.created",$first_date_of_month,"<=");
                            break;
                        case 4 :
                            $first_date_of_month = strtotime("-2 month 1"."-".$now['mon']."-".$now['year']);
                            $last_date_of_month = strtotime("-1 month 1"."-".$now['mon']."-".$now['year']);
                            $query -> condition("tbl_customer.updated",array($first_date_of_month,$last_date_of_month),"BETWEEN");
                            $query->condition("tbl_customer.created",$first_date_of_month,"<=");
                            break;
                        case 5 :
                            if($now['mon']<=3){
                                $first_date_of_month = strtotime("01-01-".$now['year']);
                                $last_date_of_month = strtotime("31-03-".$now['year']);
                            }else if($now['mon'] <= 6){
                                $first_date_of_month = strtotime("01-04-".$now['year']);
                                $last_date_of_month = strtotime("30-06-".$now['year']);
                            }else if($now['mon'] <= 9){
                                $first_date_of_month = strtotime("01-07-".$now['year']);
                                $last_date_of_month = strtotime("30-09-".$now['year']);
                            }else{
                                $first_date_of_month = strtotime("01-10-".$now['year']);
                                $last_date_of_month = strtotime("31-12-".$now['year']);
                            }
                            $query -> condition("tbl_customer.updated",array($first_date_of_month,$last_date_of_month),"BETWEEN");
                            $query->condition("tbl_customer.created",$first_date_of_month,"<=");
                            break;
                        case 6 :
                            if($now['mon']<=3){
                                $first_date_of_month = strtotime("01-10-".($now['year']-1));
                                $last_date_of_month = strtotime("31-12-".($now['year']-1));


                            }else if($now['mon'] <= 6){
                                $first_date_of_month = strtotime("01-01-".$now['year']);
                                $last_date_of_month = strtotime("31-03-".$now['year']);


                            }else if($now['mon'] <= 9){
                                $first_date_of_month = strtotime("01-04-".$now['year']);
                                $last_date_of_month = strtotime("30-06-".$now['year']);


                            }else{
                                $first_date_of_month = strtotime("01-07-".$now['year']);
                                $last_date_of_month = strtotime("30-09-".$now['year']);
                            }
                            $query -> condition("tbl_customer.updated",array($first_date_of_month,$last_date_of_month),"BETWEEN");
                            $query->condition("tbl_customer.created",$first_date_of_month,"<=");

                            break;
                    }
                }
                if(!empty($conditions['filter']['cassiopeia_customer_filter_form_start_time']['value']) && !is_array($conditions['filter']['cassiopeia_customer_filter_form_start_time']['value'])){
                    $query -> condition("tbl_customer.updated",strtotime($conditions['filter']['cassiopeia_customer_filter_form_start_time']['value']),">=");
                    $query->condition("tbl_customer.created",strtotime($conditions['filter']['cassiopeia_customer_filter_form_start_time']['value']),"<=");
                }
                if(!empty($conditions['filter']['cassiopeia_customer_filter_form_end_time']['value']) && !is_array($conditions['filter']['cassiopeia_customer_filter_form_end_time']['value'])){
                    $query -> condition("tbl_customer.updated",strtotime($conditions['filter']['cassiopeia_customer_filter_form_end_time']['value']),"<=");
                }

            }
        }
        $query->groupBy("tbl_customer.code");
    }
    if(!empty($user->uid)){

        if (user_has_role(3, $user) || user_has_role(6, $user)){
        }else if(user_has_role(4, $user) || user_has_role(5, $user)){
            $_user = user_load($user->uid);
//            print($_user->field_namespace['und'][0]['value']);
            $query->condition('tbl_customer.namespace', $_user->field_namespace['und'][0]['value'], '=');
        }
    }
    $result = $query->execute()->fetchAll();
    return $result;
}
function get_the_date(){
    $now = getdate();
    $first_date_of_week = $now['mday'] - ($now['wday']-1)." - ".$now['mon'];
    $last_date_of_week = $now['mday'] + (7 - $now['wday']);
    print($first_date_of_week);
    print($last_date_of_week);
}

function cassiopeia_send_to_get_fly($data){
    $products = array();
    $_date = getdate();
    $wday = $_date['wday'];
    if($wday<6){
        $_OO = "NT";
    }else{
        $_OO = "CT";
    }
    foreach( $data['booking']['tea_times'] as $key => $value){
        $_hole = $value['tea_time']->field_c_t_t_hole['und'][0]['value'];
        $_golf = node_load( $value['tea_time']->field_c_t_t_parent['und'][0]['nid']);
        if($_hole==18 || !empty($_golf->field_exception['und'][0]['value'])){
            $_OO_hole = "";
        }else{
            $_OO_hole = "-".$_hole."h";
        }
        $products[] = array(
            "product_code" => !empty($data['golf']->field_golf_code['und'][0]['value'])?$data['golf']->field_golf_code['und'][0]['value']."-".$_OO.$_OO_hole:"",
            "product_name" => $data['golf']->title,
            "quantity" => count($value['players']),
            "price" => !empty($value['tea_time']->field_c_t_t_a_price['und'][0]['value'])?$value['tea_time']->field_c_t_t_a_price['und'][0]['value']:0,
        );
    }
    $_account = cassiopeia_getfly_get_account_by_phone($data['booking']['contact']['contact_phone']);
    $postData_order = array(
        "order_info" => array(
            "order_code" => $data['booking']['order_code'],
            "account_code" => $_account['records'][0]['account_code'],
            "account_name" => $data['booking']['contact']['contact_name'],
            "account_address" => $data['booking']['contact']['contact_address'],
            "account_phone" => $data['booking']['contact']['contact_phone'],
            "account_email" => $data['booking']['contact']['contact_mail'],
            "order_date" =>  date("d/m/Y",REQUEST_TIME),
            "amount" => $data['booking']['totals'],
            "discount_amount" => $data['booking']['promotion_amount'],
        ),
        "products" =>  $products,
    );
    cassiopeia_getfly_post_campaigns ($postData_order,"order");
}
function cassiopeia_send_customer_to_get_fly($data){
    $booking_code = $data->booking_code;
    $promotion_code = $data->promotion_code;
    $golfers = $data->golfers;
    $splitter = explode("-",$booking_code);
    $golf_id = $splitter[1];
    $golf = node_load($golf_id);
    $products = array();
    $_date = getdate();
    $wday = $_date['wday'];
    if($wday<6){
        $_OO = "NT";
    }else{
        $_OO = "CT";
    }
    $total_cost = 0;
    $_time = 0;
    foreach( $data->booking['tee-times'] as $key => $value){
//        print($key);
        $tee = node_load($key);

        if($_time==0){
            $_time = $tee->field_c_t_t_sh['und'][0]['value'];
        }else{
            if($_time < $tee->field_c_t_t_sh['und'][0]['value']){
                $_time = $tee->field_c_t_t_sh['und'][0]['value'];
            };
        }
        $total_tee_price = 0;
        $golfer_count = 0;
        if($tee->field_c_t_t_price['und'][0]['value'] < $tee->field_c_t_t_a_price['und'][0]['value']){
            $_price = $tee->field_c_t_t_price['und'][0]['value'];
        }else{
            $_price = $tee->field_c_t_t_a_price['und'][0]['value'];
        }
        $check = 0;
        foreach($data->golfers->$key as $datum): ?>
            <?php
            $golfer_count+=1;
            $booking_fee = 100000;
            $check = cassiopeia_get_check_user_is_member($datum->mail,$datum->tel);
            if(!empty($check)){
                $booking_fee = 0;
            }
            $total_tee_price += $_price + $booking_fee;
            ?>
        <?php endforeach;
        $_hole = $tee->field_c_t_t_hole['und'][0]['value'];
        $_golf = node_load( $tee->field_c_t_t_parent['und'][0]['nid']);
        if($_hole==18 || !empty($_golf->field_exception['und'][0]['value'])){
            $_OO_hole = "";
        }else{
            $_OO_hole = "-".$_hole."h";
        }
        $products[] = array(
            "product_code" => !empty($golf->field_golf_code['und'][0]['value'])?$golf->field_golf_code['und'][0]['value']."-".$_OO.$_OO_hole:"",
            "product_name" => $golf->title,
            "quantity" => $golfer_count,
            "price" => !empty($tee->field_c_t_t_a_price['und'][0]['value'])?$tee->field_c_t_t_a_price['und'][0]['value']:0,
        );
        $total_cost += $total_tee_price;
    }
//    print(date("d/m/Y",$_time));die;
    $_account = cassiopeia_getfly_get_account_by_phone( $data->customer['tel']);
    $promotion =  cassiopeia_get_promotion_card_by_code($data->promotion_code,1,$golf_id);
    if(!empty($promotion)){
        switch($promotion->amount_type){
            case 0:
                $_value = $promotion -> amount;
                break;
            case 1:
                $_value = ($promotion -> amount)*$total_cost;
                break;
        }
        $total_cost -= $_value;
    }
//    print($total_cost);die;
    if(!empty($_account)){
        $postData_order = array(
            "order_info" => array(
                "order_code" => $data->order_code,
                "account_code" => $_account['records'][0]['account_code'],
                "account_name" => $data->customer['name'],
                "account_address" => "",
                "account_phone" => $data->customer['tel'],
                "account_email" => $data->customer['mail'],
                "order_date" =>  date("d/m/Y",$_time),
                "amount" => $total_cost,
                "discount_amount" =>$_value,
            ),
            "products" =>  $products,
        );
    }else{
        $postData_order = array(
            "order_info" => array(
                "order_code" => $data->order_code,
//                "account_code" => $_account['records'][0]['account_code'],
                "account_name" => $data->customer['name'],
                "account_address" => "",
                "account_phone" => $data->customer['tel'],
                "account_email" => $data->customer['mail'],
                "order_date" =>  date("d/m/Y",$_time),
                "amount" => $total_cost,
                "discount_amount" =>$_value,
            ),
            "products" =>  $products,
        );
    }

//    print_r($postData_order);die;
    cassiopeia_getfly_post_campaigns ($postData_order,"order");
}
function cassiopeia_get_fly_create_account($data){
    $postData = array(
        'account' => array(
            "account_name" => $data['register']['contact_name'],
            "phone_office"=>  $data['register']['contact_phone'],
            "email"=> $data['register']['contact_mail'],
//            "account_code" => "alegolf_".$data['register']['contact_phone'],
            "billing_address_street"=> "",
            "account_type"=> 1,
//            "gender" => 1,
        ),
        "contacts"=> array(
            array(
                "first_name"=> "",
                "email"=> "",
                "phone_mobile"=> "",
            )
        ),
        "referer" => array(
            "utm_source" =>  "https://getfly.vn",
            "utm_campaign" => "GetflyWebsite"
        )
    );
    cassiopeia_getfly_post_campaigns ($postData);
}
//function cassiopeia_golf_payment_booking_form_submit($form, &$form_state) {
////    print_r($form['#payment']);die;
//   $flag=false;
//    global $user;
//    $price_payment_free = variable_get('payment_free');
//    $price_payment_free_vietinbank_signature = variable_get('payment_fee_vietinbank_signature');
//    $price_payment_free_card = variable_get('payment_fee_card');
//
//    $error = '';
//    $validate = TRUE;
//
//    $data = array();
//    $data['golf'] =  $form['#payment']['golf'];
//    $data['booking'] = array(
//        'tea_times' => array(),
//        'promotion'=>  !empty($form_state['values']['promotion'])?cassiopeia_get_promotion_card_by_code($form_state['values']['promotion']):null,
//        'payment_method' => $form_state['values']['payment_method'],
//        'payment_option' => null,
//        'promotion_amount' => !empty($form['#promotion_price'])?$form['#promotion_price']:0,
//        'booking_fee'=>0,
//        'card_transaction_fee'=>($form_state['values']['payment_method'] > 1) ? $price_payment_free_card: 0,
//        'invoice' => !empty($form_state['values']['invoice']) ? $form_state['values']['invoice']:0,
//        'vietinbank' => !empty($form_state['values']['vietinbank']) ? $form_state['values']['vietinbank']:0,
//        'contact' => array(
//            'contact_name' => '',
//            'contact_mail' => '',
//            'contact_phone' => '',
//            'contact_address' => '',
//        ),
//        'totals' => $form['#total_price'],
//        'created' => REQUEST_TIME,
//    );
//
//    if (!empty($user->uid)) {
//        $_user = user_load($user->uid);
//        $data['booking']['contact']['contact_name'] = $_user->field_account_full_name['und'][0]['value'];
//        $data['booking']['contact']['contact_mail'] = $_user->mail;
//        $data['booking']['contact']['contact_phone'] = $_user->field_account_phone['und'][0]['value'];
//        $data['booking']['contact']['contact_address'] = $_user->field_account_address['und'][0]['value'];
//    }else {
//        $data['booking']['contact']['contact_name'] = $form_state['values']['contact_firt_name'] . ' ' .$form_state['values']['contact_last_name'];
//        $data['booking']['contact']['contact_mail'] = $form_state['values']['contact_email'];
//        $data['booking']['contact']['contact_phone'] = $form_state['values']['contact_phone'];
//        $data['booking']['contact']['contact_address'] = $form_state['values']['contact_address'] .' '. $form_state['values']['contact_city'] .' '. $form_state['values']['contact_country'];
//    }
//
//    foreach ($form['#payment']['booking'] as $booking_key  =>$booking_value ) {
//        $tmp = array();
//        $tmp['tea_time'] = node_load($booking_value['pic_up_time']);
//        $max_slot = $tmp['tea_time']->field_c_t_t_max_player['und'][0]['value'];
//        $booked_slot = $tmp['tea_time']->field_c_t_t_player['und'][0]['value'];
//        if($max_slot-$booked_slot < $booking_value['number_people']){
//            $flag = true;
//        }
//        $tmp['players'] = array();
//        $tmp['utilities'] = array();
//        $data['booking']['tea_times'][] =  $tmp;
//    }
//    if($flag){
//        drupal_set_message( variable_get('cassiopeia_config_message_form_het_slot'));
//        drupal_goto("/");
//        return;
//    }
//    else{
//        $member_checked = array();
//        $_checked = false;
//        foreach ($form['#payment']['booking'] as $booking_key  =>$booking_value ) {
//            $check_tel = array();
//            for ($i = 0; $i < $booking_value['number_people']; $i++ ) {
//                $data['booking']['tea_times'][$booking_key]['players'][$i] = array();
//                $data['booking']['tea_times'][$booking_key]['players'][$i]['player_full_name'] =  $form_state['values']['people_name_'.$booking_key.'_'.$i];
//                $data['booking']['tea_times'][$booking_key]['players'][$i]['player_email'] =  $form_state['values']['people_email_'.$booking_key.'_'.$i];
//                $data['booking']['tea_times'][$booking_key]['players'][$i]['player_phonenumber'] =  $form_state['values']['people_phonenumber_'.$booking_key.'_'.$i];
//                if($check_tel == $form_state['values']['people_phonenumber_'.$booking_key.'_'.$i]){
//                    continue;
//                }
//                $memeber = cassiopeia_get_check_user_is_member( $form_state['values']['people_email_'.$booking_key.'_'.$i], $form_state['values']['people_phonenumber_'.$booking_key.'_'.$i]);
//                if(!empty($memeber)) {
//                    array_push($check_tel,$form_state['values']['people_phonenumber_'.$booking_key.'_'.$i]);
////                    $member_checked[]['tel'] = $data['booking']['tea_times'][$booking_key]['players'][$i]['player_phonenumber'];
//                    $data['booking']['tea_times'][$booking_key]['players'][$i]['player_uid'] = $memeber->uid;
//                }
////                print_r($memeber);
////            }
//            }
//            $data['booking']['booking_fee'] = $data['booking']['booking_fee'] +  $price_payment_free* ($booking_value['number_people'] - count($booking_value['number_member'])) ;
//
//            foreach ($booking_value['utilitys'] as $utility_key => $utility_value) {
//                $utility =  cassiopeia_get_golf_utility_by_id($utility_value['utility']);
//                if(!empty($utility)) {
//                    $data['booking']['tea_times'][$booking_key]['utilities'][] = array(
//                        'utility' => $utility,
//                        'quantity' => $utility_value['quantity'],
//                        'price' => $utility->price
//                    );
//                }
//
//            }
//
//        }
////    var_dump($data['golf']);die;
//        foreach ($data['booking']['tea_times'] as $key => $value) {
//            if (((int)$value['tea_time']->field_c_t_t_player['und'][0]['value'] + count($value['players'])) > (int)$value['tea_time']->field_c_t_t_max_player['und'][0]['value']) {
//                $validate =  FALSE;
//                $error .= 'Tee time '. date('d/m/Y H:i', $value['tea_time']->field_c_t_t_sh['und'][0]['value']) . ' đã đủ người chơi. </br>';
//            }
//        }
//
//        if($validate) {
//
//            $transaction = db_transaction();
//            try {
//                $customer = array();
//                $customer['name'] = $data['booking']['contact']['contact_name'];
//                $customer['tel'] = $data['booking']['contact']['contact_phone'];
//                $customer['mail'] = $data['booking']['contact']['contact_mail'];
//                $customer['namespace'] =  $data['golf']->field_namespace['und'][0]['value'];
//                cassiopeia_back_up_customer($customer);
//
//                $query = db_select('golf_booking', 'golf_booking')
//                    ->fields('golf_booking')
//                    ->execute();
//                $num = $query->rowCount();
//                $today = getdate();
//                if($today['year']==2020){
//                    $part1 = 20;
//                }else{
//                    $part1 = str_replace("20","",$today['year']);
//                }
//                $_query = db_select("tbl_generator_code","tbl_generator_code");
//                $_query -> fields("tbl_generator_code");
//                $_query -> condition("id",2302);
//                $_query -> range(0,1);
//                $_result = $_query->execute()->fetchAssoc();
//                if(!empty($_result)){
//                    $code = $_result['code']+1;
//                    db_update("tbl_generator_code")->condition("id",2302)->fields(array("code"=>$code))->execute();
//                }else{
//                    $code = 210319;
//                    db_insert("tbl_generator_code")->fields(
//                        array(
//                            "id"    =>2302,
//                            "code"  => $code,
//                        )
//                    )->execute();
//                }
//                $code = 'DH'.$part1.$code;
//                $data['booking']['order_code'] = $code;
//                $site_mail = variable_get("site_mail");
//                $cassiopeia_config_mail_form_tee_times_mail = variable_get("cassiopeia_config_mail_form_tee_times_mail");
////            print_r($data);die;
//                $body[] = _cassiopeia_render_theme("module","cassiopeia","templates/nodes/golf_booking_mail_template.tpl.php",array("data"=>$data));
//                $headers['From'] = $headers['Sender'] = $headers['Return-Path'] = $site_mail;
//                $headers['MIME-Version'] = '1.0';
//                $headers['Content-Type'] = 'text/html; charset=UTF-8; format=flowed; delsp=yes';
//                $params = array(
//                    'body' => $body,
//                    'subject' => variable_get("cassiopeia_config_golf_booking_mail_form_mail_title")." - ".$code,
//                    'headers' => $headers,
//                );
//                foreach ($form['#payment']['booking'] as $booking_key  =>$booking_value ) {
//                    for ($i = 0; $i < $booking_value['number_people']; $i++ ) {
//                        if($form_state['values']['people_email_'.$booking_key.'_'.$i]==$form_state['values']['contact_email']){
//                            continue;
//                        }
//                        drupal_mail('cassiopeia', 'golf_booking_request_mail', $form_state['values']['people_email_'.$booking_key.'_'.$i], language_default(), $params);
//                    }
//                }
//                drupal_mail('cassiopeia', 'golf_booking_request_mail', $form_state['values']['contact_email'], language_default(), $params);
//                drupal_mail('cassiopeia', 'golf_booking_request_mail', $site_mail, language_default(), $params);
//
//
//
//
//                cassiopeia_send_to_get_fly($data);
//                $message = 'Khách hàng: '.$data['booking']['contact']['contact_name'].' đã đặt tee time  tại '.$data['golf']->title."<a href='/manager/edit/golf-booking/".$code."'>Xem chi tiết</a>";
////            $message = "Khách hàng".$data['booking']['contact']['contact_name'].' đã đặt tee time  tại '.$data['golf']->title;
//                try{
//                    $query = db_insert("tbl_notify");
//                    $query -> fields(array(
//                        'title' => 'Thông báo đặt tee time',
//                        'from_uid' => 3,
//                        'to_uid' => -1,
//                        'namespace' => $data['golf']->field_namespace['und'][0]['value'],
//                        'created' => REQUEST_TIME,
//                        'status' => 0,
//                        'message_vi' => $message,
//                        'message_en' => $message,
//                    ));
//                    $query->execute();
//                }catch(Exception $e){
//                    print($e);
//                }
//                db_insert('golf_booking') // Table name no longer needs {}
//                ->fields(array(
//                    'code' => $code,
//                    'uid' => !empty($user->uid)?$user->uid:0,
//                    'contact_name' => $data['booking']['contact']['contact_name'] ,
//                    'contact_mail' => $data['booking']['contact']['contact_mail'] ,
//                    'contact_phone' => $data['booking']['contact']['contact_phone'] ,
//                    'contact_address' => $data['booking']['contact']['contact_address'] ,
//                    'payment_method' => $data['booking']['payment_method'],
//                    'payment_option' => $data['booking']['payment_option'],
//                    'golfId' => $data['golf']->nid,
//                    'booking_fee' => $data['booking']['booking_fee'],
//                    'card_transaction_fee' => $data['booking']['card_transaction_fee'],
//                    'promotion_code' => !empty($data['booking']['promotion']->code)?$data['booking']['promotion']->code:'',
//                    'promotion_price' => $data['booking']['promotion_amount'],
//                    'invoice' => $data['booking']['invoice'],
//                    'totals' => $data['booking']['totals'],
//                    'status' => 1,
//                    'created' => REQUEST_TIME,
//                ))
//                    ->execute();
//
//                foreach ($data['booking']['tea_times'] as $key => $value) {
//                    $tea_time_utilitie = '';
//
//                    if(!empty($value['tea_time']->field_c_t_t_utility['und'])) {
//                        foreach ($value['tea_time']->field_c_t_t_utility['und'] as $field_c_t_t_utility_key => $field_c_t_t_utility_value) {
//                            $tea_time_utilitie = $tea_time_utilitie . ',' .$field_c_t_t_utility_value;
//                            if (!empty($tea_time_utilitie)) {
//                                $tea_time_utilitie = $tea_time_utilitie . ',' .$field_c_t_t_utility_value;
//                            }else {
//                                $tea_time_utilitie = $field_c_t_t_utility_value;
//                            }
//                        }
//
//                    }
//
//                    $tea_time_id = db_insert('golf_booking_tea_time') // Table name no longer needs {}
//                    ->fields(array(
//                        'code' => $code,
//                        'tea_time_price' => $value['tea_time']->field_c_t_t_a_price['und'][0]['value'],
//                        'tea_time_start' => $value['tea_time']->field_c_t_t_sh['und'][0]['value'],
//                        'tea_time_date' => strtotime ($value['tea_time']->field_c_t_t_date['und'][0]['value']),
//                        'tea_time_id' => $value['tea_time']->nid,
//                        'tea_time_utilitie' => $tea_time_utilitie,
//                        'tea_time_hole' => $value['tea_time']->field_c_t_t_hole['und'][0]['value'],
//                    ))
//                        ->execute();
////                -----------------
//                    foreach ($value['players'] as $_player_key => $_player_value) {
//                        db_insert('golf_booking_player') // Table name no longer needs {}
//                        ->fields(array(
//                            'player_full_name' => $_player_value['player_full_name'] ,
//                            'player_email' => $_player_value['player_email'],
//                            'player_phone_number' => $_player_value['player_phonenumber'],
//                            'player_uid' => !empty($_player_value['player_uid'])?$_player_value['player_uid']:0,
//                            'teaTimeId' => $tea_time_id
//                        ))
//                            ->execute();
//                    }
//
//                    foreach ($value['utilities'] as $_utilitie_key => $_utilitie_value) {
//                        db_insert('golf_booking_utilitie') // Table name no longer needs {}
//                        ->fields(array(
//                            'utilitie_price' => $_utilitie_value['price'],
//                            'utilitie_name' => $_utilitie_value['utility']->title,
//                            'quantity'=>$_utilitie_value['quantity'],
//                            'teaTimeId' => $tea_time_id
//                        ))
//                            ->execute();
//                    }
//                }
//
//                foreach ($data['booking']['tea_times'] as $key => $value) {
//                    $tea_time = $value['tea_time'];
//                    $tea_time->field_c_t_t_player['und'][0]['value'] = (int)$tea_time->field_c_t_t_player['und'][0]['value'] + count($value['players']);
//                    node_save($tea_time);
//                }
//                $data['code'] = $code;
//                $booking_golf_complete_key = $code;
//                $_SESSION['booking_golf_complete'][$booking_golf_complete_key] = $data;
//                drupal_goto('booking/golf/'.$booking_golf_complete_key.'/complete');
//
//            }catch (Exception $e) {
//                $transaction->rollback();
////                drupal_set_message('Hệ thống đang bận vui lòng quay lại sau ít phút', 'error');
//                drupal_set_message((string)$e, 'error');
//                drupal_goto(drupal_get_path_alias('node/'.$data['golf']->nid));
//            }
//
//        }else {
//            drupal_set_message($error, 'error');
//            drupal_goto(drupal_get_path_alias('node/'.$data['golf']->nid));
//        }
//    }
//
//
//    unset($_SESSION['booking_golf'][$form['#payment']['key']]);
//}
function cassiopeia_golf_payment_booking_form_submit($form, &$form_state) {

    $flag=false;
    global $user;
    $price_payment_free = variable_get('payment_free');
    $price_payment_free_vietinbank_signature = variable_get('payment_fee_vietinbank_signature');
    $price_payment_free_card = variable_get('payment_fee_card');

    $error = '';
    $validate = TRUE;

    $data = array();
    $data['golf'] =  $form['#payment']['golf'];
    $data['booking'] = array(
        'tea_times' => array(),
        'promotion'=>  !empty($form_state['values']['promotion'])?cassiopeia_get_promotion_card_by_code($form_state['values']['promotion'],1,$data['golf']->nid):null,
        'payment_method' => $form_state['values']['payment_method'],
        'payment_option' => null,
        'promotion_amount' => !empty($form['#promotion_price'])?$form['#promotion_price']:0,
        'booking_fee'=>0,
        'card_transaction_fee'=>($form_state['values']['payment_method'] > 1) ? $price_payment_free_card: 0,
        'invoice' => !empty($form_state['values']['invoice']) ? $form_state['values']['invoice']:0,
        'vietinbank' => !empty($form_state['values']['vietinbank']) ? $form_state['values']['vietinbank']:0,
        'contact' => array(
            'contact_name' => '',
            'contact_mail' => '',
            'contact_phone' => '',
            'contact_address' => '',
            'contact_province' => '',
            'contact_country' => '',
        ),
        'totals' => $form['#total_price'],
        'created' => REQUEST_TIME,
    );
//    $promotion = cassiopeia_get_promotion_card_by_code($form_state['values']['promotion'],1,$data['golf']->nid);
//                    print_r($promotion);die;
    if (!empty($user->uid)) {
        $_user = user_load($user->uid);
        $data['booking']['contact']['contact_name'] = $_user->field_account_full_name['und'][0]['value'];
        $data['booking']['contact']['contact_mail'] = $_user->mail;
        $data['booking']['contact']['contact_phone'] = $_user->field_account_phone['und'][0]['value'];
        $data['booking']['contact']['contact_address'] = $_user->field_account_address['und'][0]['value'];
        $data['booking']['contact']['contact_province'] = $_user->field_account_province['und'][0]['value'];
        $data['booking']['contact']['contact_country'] = $_user->field_account_country['und'][0]['value'];
    }else {
        $data['booking']['contact']['contact_name'] = $form_state['values']['contact_firt_name'] . ' ' .$form_state['values']['contact_last_name'];
        $data['booking']['contact']['contact_mail'] = $form_state['values']['contact_email'];
        $data['booking']['contact']['contact_phone'] = $form_state['values']['contact_phone'];
        $data['booking']['contact']['contact_address'] = $form_state['values']['contact_address'] .' '. $form_state['values']['contact_city'] .' '. $form_state['values']['contact_country'];
        $data['booking']['contact']['contact_province'] = $form_state['values']['contact_city'];
        $data['booking']['contact']['contact_country'] = $form_state['values']['contact_country'];
    }

    foreach ($form['#payment']['booking'] as $booking_key  =>$booking_value ) {


        $tmp = array();
        $tmp['tea_time'] = node_load($booking_value['pic_up_time'],null, TRUE);


        $max_slot = $tmp['tea_time']->field_c_t_t_max_player['und'][0]['value'];
        $booked_slot = !empty($tmp['tea_time']->field_c_t_t_player['und'][0]['value'])?$tmp['tea_time']->field_c_t_t_player['und'][0]['value']:0;


        if($max_slot-$booked_slot < $booking_value['number_people']){
            $flag = true;
        }

        $tmp['players'] = array();
        $tmp['utilities'] = array();
        $data['booking']['tea_times'][] =  $tmp;
    }

    if($flag){
        drupal_set_message( variable_get('cassiopeia_config_message_form_het_slot'));
        drupal_goto("/");
    }else{
        $member_checked = array();
        $_checked = false;
        foreach ($form['#payment']['booking'] as $booking_key  =>$booking_value ) {
            $check_tel = array();
            for ($i = 0; $i < $booking_value['number_people']; $i++ ) {
                $data['booking']['tea_times'][$booking_key]['players'][$i] = array();
                $data['booking']['tea_times'][$booking_key]['players'][$i]['player_full_name'] =  $form_state['values']['people_name_'.$booking_key.'_'.$i];
                $data['booking']['tea_times'][$booking_key]['players'][$i]['player_email'] =  $form_state['values']['people_email_'.$booking_key.'_'.$i];
                $data['booking']['tea_times'][$booking_key]['players'][$i]['player_phonenumber'] =  $form_state['values']['people_phonenumber_'.$booking_key.'_'.$i];
                if($check_tel == $form_state['values']['people_phonenumber_'.$booking_key.'_'.$i]){
                    continue;
                }
                $memeber = cassiopeia_get_check_user_is_member( $form_state['values']['people_email_'.$booking_key.'_'.$i], $form_state['values']['people_phonenumber_'.$booking_key.'_'.$i]);
                if(!empty($memeber)) {
                    array_push($check_tel,$form_state['values']['people_phonenumber_'.$booking_key.'_'.$i]);
//                    $member_checked[]['tel'] = $data['booking']['tea_times'][$booking_key]['players'][$i]['player_phonenumber'];
                    $data['booking']['tea_times'][$booking_key]['players'][$i]['player_uid'] = $memeber->uid;
                }
//                print_r($memeber);
//            }
            }
            $data['booking']['booking_fee'] = $data['booking']['booking_fee'] +  $price_payment_free* ($booking_value['number_people'] - count($booking_value['number_member'])) ;

            foreach ($booking_value['utilitys'] as $utility_key => $utility_value) {
                $utility =  cassiopeia_get_golf_utility_by_id($utility_value['utility']);
                if(!empty($utility)) {
                    $data['booking']['tea_times'][$booking_key]['utilities'][] = array(
                        'utility' => $utility,
                        'quantity' => $utility_value['quantity'],
                        'price' => $utility->price
                    );
                }

            }

        }
//    var_dump($data['golf']);die;
        foreach ($data['booking']['tea_times'] as $key => $value) {
            if (((int)$value['tea_time']->field_c_t_t_player['und'][0]['value'] + count($value['players'])) > (int)($value['tea_time']->field_c_t_t_max_player['und'][0]['value'])) {
                $validate =  FALSE;
                $error .= 'Tee time '. date('d/m/Y H:i', $value['tea_time']->field_c_t_t_sh['und'][0]['value']) . ' đã đủ người chơi. </br>';
            }
        }

        if($validate) {

            $transaction = db_transaction();
            try {

                $_check_ = false;
                foreach ($data['booking']['tea_times'] as $key => $value) {
                    $_tmp_ = node_load($value['tea_time']->nid,null, TRUE);
                    $max_slot = $_tmp_->field_c_t_t_max_player['und'][0]['value'];
                    $booked_slot = !empty($_tmp_->field_c_t_t_player['und'][0]['value'])?$_tmp_->field_c_t_t_player['und'][0]['value']:0;
                    if($max_slot-$booked_slot < count($value['players'])){
                        $_check_ = true;
                    }
                }
                if($_check_){
                    drupal_set_message( variable_get('cassiopeia_config_message_form_het_slot'));
                    $transaction->rollback();
                    drupal_goto("/");
                }else{
                    $customer = array();
                    $customer['name'] = $data['booking']['contact']['contact_name'];
                    $customer['tel'] = $data['booking']['contact']['contact_phone'];
                    $customer['mail'] = $data['booking']['contact']['contact_mail'];
                    $customer['namespace'] =  $data['golf']->field_namespace['und'][0]['value'];
                    cassiopeia_back_up_customer($customer);

                    $query = db_select('golf_booking', 'golf_booking')
                        ->fields('golf_booking')
                        ->execute();
                    $num = $query->rowCount();
                    $today = getdate();
                    if($today['year']==2020){
                        $part1 = 20;
                    }else{
                        $part1 = str_replace("20","",$today['year']);
                    }
                    $_query = db_select("tbl_generator_code","tbl_generator_code");
                    $_query -> fields("tbl_generator_code");
                    $_query -> condition("id",2302);
                    $_query -> range(0,1);
                    $_result = $_query->execute()->fetchAssoc();
                    if(!empty($_result)){
                        $code = $_result['code']+1;
                        db_update("tbl_generator_code")->condition("id",2302)->fields(array("code"=>$code))->execute();
                    }else{
                        $code = 210319;
                        db_insert("tbl_generator_code")->fields(
                            array(
                                "id"    =>2302,
                                "code"  => $code,
                            )
                        )->execute();
                    }
                    $code = 'DH'.$part1.$code;
//                    $code = 'DH'.REQUEST_TIME.$code;
                    $_query = db_select("tbl_generator_code","tbl_generator_code");
                    $_query -> fields("tbl_generator_code");
                    $_query -> condition("id",1000);
                    $_query -> range(0,1);
                    $_result = $_query->execute()->fetchAssoc();
                    if(!empty($_result)){
                        $code = $_result['code']+1;
                        db_update("tbl_generator_code")->condition("id",1000)->fields(array("code"=>$code))->execute();
                    }else{
                        $code = 10000;
                        db_insert("tbl_generator_code")->fields(
                            array(
                                "id"    =>1000,
                                "code"  => $code,
                            )
                        )->execute();
                    }
                    $code = "DA".$code;
                    $data['booking']['order_code'] = $code;
                    $site_mail = variable_get("site_mail");
                    $cassiopeia_config_mail_form_tee_times_mail = variable_get("cassiopeia_config_mail_form_tee_times_mail");
                    $body[] = _cassiopeia_render_theme("module","cassiopeia","templates/nodes/golf_booking_mail_template.tpl.php",array("data"=>$data));
                    $headers['From'] = $headers['Sender'] = $headers['Return-Path'] = $site_mail;
                    $headers['MIME-Version'] = '1.0';
                    $headers['Content-Type'] = 'text/html; charset=UTF-8; format=flowed; delsp=yes';
                    $params = array(
                        'body'      => $body,
                        'subject'   => variable_get("cassiopeia_config_golf_booking_mail_form_mail_title")." - ".$code,
                        'headers'   => $headers,
                        'code'      => $code,
                    );

                    foreach ($form['#payment']['booking'] as $booking_key  =>$booking_value ) {
                        for ($i = 0; $i < $booking_value['number_people']; $i++ ) {
                            if($form_state['values']['people_email_'.$booking_key.'_'.$i]==$form_state['values']['contact_email']){
                                continue;
                            }
                            drupal_mail('cassiopeia', 'golf_booking_request_mail', $form_state['values']['people_email_'.$booking_key.'_'.$i], language_default(), $params);
                        }
                    }
                    if(!empty($data['golf']->field_ctype_golf_email['und'][0]['value'])){
                        if(empty($data['golf']->field_ctype_golf_live['und'][0]['value'])){
                            $body1 = array();
                            $body1[] = _cassiopeia_render_theme("module","cassiopeia","templates/nodes/golf_booking_mail_template_for_golf_manager.tpl.php",array("data"=>$data));
                            $headers['From'] = $headers['Sender'] = $headers['Return-Path'] = $site_mail;
                            $headers['MIME-Version'] = '1.0';
                            $headers['Content-Type'] = 'text/html; charset=UTF-8; format=flowed; delsp=yes';
                            $params1 = array(
                                'body'      => $body1,
                                'subject'   => variable_get("cassiopeia_config_golf_booking_mail_form_mail_title")." - ".$code,
                                'headers'   => $headers,
                                'code'      => $code,
                            );
                            drupal_mail('cassiopeia', 'golf_booking_for_admin_request_mail', $data['golf']->field_ctype_golf_email['und'][0]['value'], language_default(), $params1);
//                            drupal_mail('cassiopeia', 'golf_booking_for_admin_request_mail', "huutrung230292@gmail.com", language_default(), $params1);
                        }
                    }
                    drupal_mail('cassiopeia', 'golf_booking_for_customer_request_mail', $form_state['values']['contact_email'], language_default(), $params);
                    drupal_mail('cassiopeia', 'golf_booking_for_admin_request_mail', variable_get("cassiopeia_config_mail_form_tee_times_mail"), language_default(), $params);
//                drupal_mail('cassiopeia', 'golf_booking_for_admin_request_mail', "huutrung230292@gmail.com", language_default(), $params);


                    cassiopeia_send_to_get_fly($data);
                    $message = 'Khách hàng: '.$data['booking']['contact']['contact_name'].' đã đặt tee time  tại '.$data['golf']->title."<a href='/manager/edit/golf-booking/".$code."'>Xem chi tiết</a>";
                    $message = "Khách hàng".$data['booking']['contact']['contact_name'].' đã đặt tee time  tại '.$data['golf']->title;
                    $query = db_insert("tbl_notify");
                    $query -> fields(array(
                        'title' => 'Thông báo đặt tee time ('.$message.")",
                        'from_uid' => 3,
                        'to_uid' => -1,
                        'namespace' => $data['golf']->field_namespace['und'][0]['value'],
                        'created' => REQUEST_TIME,
                        'status' => 0,
                        'message_vi' => $message,
                        'message_en' => $message,
                    ));
                    $query->execute();
                    db_insert('golf_booking') // Table name no longer needs {}
                    ->fields(array(
                        'code' => $code,
                        'uid' => !empty($user->uid)?$user->uid:0,
                        'contact_name' => $data['booking']['contact']['contact_name'] ,
                        'contact_mail' => $data['booking']['contact']['contact_mail'] ,
                        'contact_phone' => $data['booking']['contact']['contact_phone'] ,
                        'contact_address' => $data['booking']['contact']['contact_address'] ,
                        'payment_method' => $data['booking']['payment_method'],
                        'payment_option' => $data['booking']['payment_option'],
                        'golfId' => $data['golf']->nid,
                        'booking_fee' => $data['booking']['booking_fee'],
                        'card_transaction_fee' => $data['booking']['card_transaction_fee'],
                        'promotion_code' => !empty($data['booking']['promotion']->code)?$data['booking']['promotion']->code:'',
                        'promotion_price' => $data['booking']['promotion_amount'],
                        'invoice' => $data['booking']['invoice'],
                        'totals' => $data['booking']['totals'],
                        'status' => 1,
                        'created' => REQUEST_TIME,
                    ))
                        ->execute();

                    foreach ($data['booking']['tea_times'] as $key => $value) {
                        $tea_time_utilitie = '';

                        if(!empty($value['tea_time']->field_c_t_t_utility['und'])) {
                            foreach ($value['tea_time']->field_c_t_t_utility['und'] as $field_c_t_t_utility_key => $field_c_t_t_utility_value) {
                                $tea_time_utilitie = $tea_time_utilitie . ',' .$field_c_t_t_utility_value;
                                if (!empty($tea_time_utilitie)) {
                                    $tea_time_utilitie = $tea_time_utilitie . ',' .$field_c_t_t_utility_value;
                                }else {
                                    $tea_time_utilitie = $field_c_t_t_utility_value;
                                }
                            }

                        }
                        if($value['tea_time']->field_c_t_t_price['und'][0]['value'] < $value['tea_time']->field_c_t_t_a_price['und'][0]['value']){
                            $_price = $value['tea_time']->field_c_t_t_price['und'][0]['value'];
                        }else{
                            $_price = $value['tea_time']->field_c_t_t_a_price['und'][0]['value'];
                        }
                        $tea_time_id = db_insert('golf_booking_tea_time') // Table name no longer needs {}
                        ->fields(array(
                            'code' => $code,
                            'tea_time_price' => $_price,
                            'tea_time_start' => $value['tea_time']->field_c_t_t_sh['und'][0]['value'],
                            'tea_time_date' => strtotime ($value['tea_time']->field_c_t_t_date['und'][0]['value']),
                            'tea_time_id' => $value['tea_time']->nid,
                            'tea_time_utilitie' => $tea_time_utilitie,
                            'tea_time_hole' => $value['tea_time']->field_c_t_t_hole['und'][0]['value'],
                        ))
                            ->execute();
//                -----------------
                        foreach ($value['players'] as $_player_key => $_player_value) {
                            db_insert('golf_booking_player') // Table name no longer needs {}
                            ->fields(array(
                                'player_full_name' => $_player_value['player_full_name'] ,
                                'player_email' => $_player_value['player_email'],
                                'player_phone_number' => $_player_value['player_phonenumber'],
                                'player_uid' => !empty($_player_value['player_uid'])?$_player_value['player_uid']:0,
                                'teaTimeId' => $tea_time_id
                            ))
                                ->execute();
                        }

                        foreach ($value['utilities'] as $_utilitie_key => $_utilitie_value) {
                            db_insert('golf_booking_utilitie') // Table name no longer needs {}
                            ->fields(array(
                                'utilitie_price' => $_utilitie_value['price'],
                                'utilitie_name' => $_utilitie_value['utility']->title,
                                'quantity'=>$_utilitie_value['quantity'],
                                'teaTimeId' => $tea_time_id
                            ))
                                ->execute();
                        }
                    }
                    if(!empty($data['golf']->field_ctype_golf_live['und'][0]['value'])){
                        foreach ($data['booking']['tea_times'] as $key => $value) {
                            $tea_time = $value['tea_time'];
                            $tea_time->field_c_t_t_player['und'][0]['value'] = (int)(!empty($tea_time->field_c_t_t_player['und'][0]['value'])?$tea_time->field_c_t_t_player['und'][0]['value']:0) + count($value['players']);
                            node_save($tea_time);
                        }
                    }
                    $data['code'] = $code;
                    $booking_golf_complete_key = $code;
                    $_SESSION['booking_golf_complete'][$booking_golf_complete_key] = $data;

                    $promotion = cassiopeia_get_promotion_card_by_code($form_state['values']['promotion'],1,$data['golf']->nid);
                    if(!empty($promotion)){
                        if($promotion->kind_2==1){
                            db_update("promotion")->fields(array(
                                "status" => 1,
                            ))->condition("code",$promotion->code,"=")->execute();
                        }
                    }

                    drupal_goto('booking/golf/'.$booking_golf_complete_key.'/complete');
                }



            }catch (Exception $e) {
                print_r('e1' .(string)($e));
                $transaction->rollback();
                drupal_set_message('Hệ thống đang bận vui lòng quay lại sau ít phút', 'error');
                drupal_goto(drupal_get_path_alias('node/'.$data['golf']->nid));
            }


        }else {
            drupal_set_message($error, 'error');
            drupal_goto(drupal_get_path_alias('node/'.$data['golf']->nid));
        }

    }


    unset($_SESSION['booking_golf'][$form['#payment']['key']]);
}

function  cassiopeia_get_check_user_is_member ($mail, $phone) {
    $matches = array();
    $query = db_select("users","users");
    $query->fields('users', array('uid','name', 'mail','status'));
    $query->join('field_data_field_account_full_name', 'field_data_field_account_full_name', 'field_data_field_account_full_name.entity_id = users.uid');
    $query->fields('field_data_field_account_full_name');
    $query->join('field_data_field_account_phone', 'field_data_field_account_phone', 'field_data_field_account_phone.entity_id = users.uid');
    $query->fields('field_data_field_account_phone');
//    $query->condition('field_data_field_account_full_name.field_account_full_name_value',$name, '=');
    $query->condition('field_data_field_account_phone.field_account_phone_value',$phone, '=');
    $query->condition('mail',$mail, '=');
    $res = $query->execute()->fetchObject();
//    print_r($res);
//    die;
    if(empty($res)){
        return null;
    }
    if(!user_has_role(9,user_load($res->uid))){
        $res = null;
    }
    return $res;
}

function cassiopeia_get_promotion_cards(){
    $_cards = null;
    try {
        $_card_query = db_select('promotion', 'promotion')
            ->fields('promotion')
            ->execute()
            ->fetchAll();
        $_cards = $_card_query;
    } catch (Exception $e) {
        throw $e;
    }
    return $_cards;
};
function cassiopeia_get_promotion_card_by_code ($code,$kind=1,$golf_id=null) {
    $_card = null;
    try {
//        $delete = db_delete("promotion")->execute();
        $_card_query = db_select('promotion', 'promotion')
            ->fields('promotion')
            ->condition('code',(string)$code,'=')
            ->condition('kind',$kind)
            ->execute()
            ->fetchObject();
        $_card = $_card_query;
//        print_r($golf_id);
//        die;
        if(!empty($golf_id) && !empty($_card)){
            $flag = false;
            $array = unserialize($_card->golf);
            if(!in_array($golf_id,$array,true)){
                $_card=null;
            }
        }
    } catch (Exception $e) {

    }
//    print_r($_card);
//    die;
    return $_card;
}

function cassiopeia_generate_integer_code($size = 13){
    $str  = '';
    $chars  = '0123456789';
    $_chars  = '123456789';
    for ($i = 0; $i < $size; $i++) {
        if($i == 0) {
            $str .= $_chars[rand(0,strlen($_chars) - 1)];
        }else {
            $str .= $chars[rand( 0, strlen($chars) - 1)];
        }
    }
    return $str;
};

function cassiopeia_create_promotion_cards_form ($form, &$form_state) {
    $form = array();

//    $form['type'] = array(
//        '#type' => 'textfield',
//        '#title' =>'Loại thẻ',
//        '#required' => TRUE,
//    );

    $form['amount'] = array(
        '#type' => 'textfield',
        '#title' =>'Mệnh giá',
        '#required' => TRUE,
    );


    $form['amount_type'] = array(
        '#type' => 'select',
        '#title' =>'Kiểu (% hoặc tiền mặt)',
        '#options' => array(
            0 => 'Tiền mặt',
            1 => 'Phần trăm',
        ),
        '#required' => TRUE,
    );
    $form['kind'] = array(
        '#type' => 'select',
        '#title' =>'Áp dụng cho',
        '#options' => array(
            1 => 'Đặt sân',
            2 => 'Đặt tour',
            3 => 'Đăng ký hội viên',
        ),
        '#default_value'=> 1,
        '#required' => TRUE,
    );
    $form['kind_2'] = array(
        '#type' => 'select',
        '#title' =>'Số lần sử dụng',
        '#options' => array(
            1 => '1 lần',
            0 => 'Nhiều lần',
        ),
        '#default_value'=> 1,
        '#required' => TRUE,
    );
    foreach (cassiopeia_get_all_golf() as $key => $value) {
        $golf_options[$value->nid] = $value->title;
    }
    $form['golf'] = array(
        '#type'         => 'select',
        '#title'        => "Sân golf",
        '#multiple'     => 11,
        '#options'      => $golf_options,
        '#attributes'   => array("class"=>array("golf-select")),
    );
//    serialize(
    $form['expired'] = array(
        '#type'=>'textfield',
        '#title'=>'Thời hạn',
        '#default_value'=> 360,
        '#description' => 'Thời hạn  tính bằng ngày',
        '#required' => TRUE,
    );

    $form['quantity'] = array(
        '#type' => 'textfield',
        '#title' =>'Số lượng',
        '#required' => TRUE,
    );

    $form['submit'] = array(
        '#type' => 'submit',
        '#value' => 'Tạo',
    );

    return $form;

}


function cassiopeia_create_promotion_cards_form_validate($form, &$form_state) {

    if(!is_numeric($form_state['values']['amount'])) {
        form_set_error('amount', 'Mệnh giá thẻ không hợp lệ');
    }else {
        if($form_state['values']['amount'] <0) {
            form_set_error('amount', 'Mệnh giá thẻ phải > 0');
        }
    }
    if(!is_numeric($form_state['values']['quantity'])) {
        form_set_error('quantity', 'Số lượng thẻ không hợp lệ');
    }else{
        if ((float)$form_state['values']['quantity']/(int)$form_state['values']['quantity'] != 1) {
            form_set_error('quantity', 'Số lượng thẻ là số nguyên dương và > 0');
        }
        if ((float)$form_state['values']['quantity']<= 0) {
            form_set_error('quantity', 'Số lượng thẻ là số nguyên dương và > 0');
        }
    }

}


function cassiopeia_create_promotion_cards_form_submit($form, &$form_state) {

//    print_r($form_state['values']['golf']);die;
    $_card_data = cassiopeia_get_promotion_cards();

    $_card_data_card_series = array();
    $_card_data_card_codes = array();

    foreach ($_card_data as $_card_data_key =>$_card_data_value) {
        $_card_data_card_series[] =  $_card_data_value->serie;
        $_card_data_card_codes[] = $_card_data_value->code;
    }

    $_cards = array();

    for ($i = 0; $i< $form_state['values']['quantity'] ; $i++) {
        $_code = cassiopeia_generate_integer_code(13);
        while (in_array($_code, $_card_data_card_codes)) {
            $_code = cassiopeia_generate_integer_code(13);
        }
        $_card_data_card_codes[] = $_code;
        $_card = array(
            'serie'         => 0,
            'code'          => $_code,
//            'type'          => $form_state['values']['type'],
            'amount'        => $form_state['values']['amount'],
            'kind'          => $form_state['values']['kind'],
            'kind_2'          => $form_state['values']['kind_2'],
            'amount_type'   => $form_state['values']['amount_type'],
            'golf'          => serialize($form_state['values']['golf']),
            'status'        =>0,
            'used'          =>0,
            'created'       => REQUEST_TIME  ,
            'expired'       => strtotime('+'.$form_state['values']['expired'].' day', REQUEST_TIME),
        );

        $_cards[] = $_card;
    }
    for ($i = 0; $i< $form_state['values']['quantity'] ; $i++) {
        $_serie = cassiopeia_generate_integer_code(11);
        while (in_array($_serie, $_card_data_card_series)) {
            $_serie = cassiopeia_generate_integer_code(11);
        }
        $_card_data_card_series[] = $_serie;
        $_cards[$i]['serie'] = $_serie;
    }



    try {
        $query = db_insert('promotion')->fields(array(
            'serie',
            'code',
            'amount',
            'kind',
            'kind_2',
            'amount_type',
            'golf',
            'status',
            'used',
            'created',
            'expired',
//            'type',
        ));
        foreach ($_cards as $record) {
            $query->values($record);
        }
        $query->execute();
        drupal_set_message('Tạo thẻ thành công!');

    }catch (Exception $e) {
        throw  $e;
        drupal_set_message('Hệ thống đang bận vui lòng quay lại sau ít phút!');
    }

}

function cassiopeia_get_golf_booking($condition = array()) {
    global $user;
    $result = array();
    try {
        $ctype_tea_times_sub_query = db_select("node","tbl_ctype_tea_time");
        $ctype_tea_times_sub_query->fields("tbl_ctype_tea_time",array("nid"));
        $ctype_tea_times_sub_query->condition("type","ctype_tea_time");
        $ctype_tea_times_sub_query->join("field_data_field_c_t_t_sh","field_data_field_c_t_t_sh","field_data_field_c_t_t_sh.entity_id=tbl_ctype_tea_time.nid");
        $ctype_tea_times_sub_query->addField("field_data_field_c_t_t_sh","field_c_t_t_sh_value","field_c_t_t_sh");

        $golf_booking_golf_sub_query  = db_select('node', 'golf');
        $golf_booking_golf_sub_query->fields('golf');
        $golf_booking_golf_sub_query->join('field_data_field_namespace', 'namespace', 'namespace.entity_id = golf.nid');
        $golf_booking_golf_sub_query->addField('namespace', 'field_namespace_value ', 'namespace_id');

        $golf_booking_player_sub_query  = db_select('golf_booking_player');
        $golf_booking_player_sub_query->fields('golf_booking_player', array('teaTimeId'));
        $golf_booking_player_sub_query->addExpression('GROUP_CONCAT(golf_booking_player.id)', 'playerIds');
        $golf_booking_player_sub_query->addExpression('COUNT(golf_booking_player.id)', 'playerCount');
        $golf_booking_player_sub_query->addExpression('GROUP_CONCAT(golf_booking_player.player_full_name)', 'playerNames');
        $golf_booking_player_sub_query->addExpression('GROUP_CONCAT(golf_booking_player.player_email)', 'playerEmails');
        $golf_booking_player_sub_query->addExpression('GROUP_CONCAT(golf_booking_player.player_phone_number)', 'playerPhonenumbers');
        $golf_booking_player_sub_query->groupBy('golf_booking_player.teaTimeId');

        $golf_booking_golf_utilitie_sub_query  = db_select('golf_booking_utilitie');
        $golf_booking_golf_utilitie_sub_query->fields('golf_booking_utilitie', array('teaTimeId'));
        $golf_booking_golf_utilitie_sub_query->addExpression('GROUP_CONCAT(golf_booking_utilitie.id)', 'utilitieIds');
        $golf_booking_golf_utilitie_sub_query->addExpression('COUNT(golf_booking_utilitie.id)', 'utilitieCount');
        $golf_booking_golf_utilitie_sub_query->addExpression('GROUP_CONCAT(golf_booking_utilitie.utilitie_name)', 'utilitieNames');
        $golf_booking_golf_utilitie_sub_query->addExpression('GROUP_CONCAT(golf_booking_utilitie.utilitie_price)', 'utilitiePrices');
        $golf_booking_golf_utilitie_sub_query->groupBy('golf_booking_utilitie.teaTimeId');

        $golf_booking_tea_time_sub_query  = db_select('golf_booking_tea_time');
        $golf_booking_tea_time_sub_query->fields('golf_booking_tea_time',array('code', 'id','tea_time_id'));
        $golf_booking_tea_time_sub_query->leftJoin($golf_booking_player_sub_query, 'golf_booking_player', 'golf_booking_player.teaTimeId = golf_booking_tea_time.id');
        $golf_booking_tea_time_sub_query->fields('golf_booking_player',array('playerNames', 'playerEmails', 'playerPhonenumbers', 'playerIds', 'playerCount'));
        $golf_booking_tea_time_sub_query->leftJoin($golf_booking_golf_utilitie_sub_query, 'golf_booking_utilitie', 'golf_booking_utilitie.teaTimeId = golf_booking_tea_time.id');
        $golf_booking_tea_time_sub_query->fields('golf_booking_utilitie',array('utilitieNames', 'utilitiePrices', 'utilitieIds', 'utilitieCount'));
        $golf_booking_tea_time_sub_query->groupBy('golf_booking_tea_time.id');


        $query = db_select('golf_booking');
        $query->fields('golf_booking');
        $query->join($golf_booking_tea_time_sub_query, 'tea_times', 'tea_times.code = golf_booking.code');
        $query->join($golf_booking_golf_sub_query, 'golf', 'golf.nid = golf_booking.golfId');
        $query->join($ctype_tea_times_sub_query, 'ctype_tea_time', 'ctype_tea_time.nid = tea_times.tea_time_id');
        $query->addField('golf', 'nid', 'golf_nid');
        $query->addField('golf', 'title', 'golf_title');
        $query->addField('golf', 'namespace_id', 'namespace_id');
        $query->addExpression('GROUP_CONCAT(tea_times.id)', '_teaTimeIds');
        $query->addExpression('GROUP_CONCAT(tea_times.playerIds )', '_playerIds');
        $query->addExpression('GROUP_CONCAT(tea_times.playerCount )', '_playerCount');
        $query->addExpression('GROUP_CONCAT(tea_times.playerNames )', '_playerNames');
        $query->addExpression('GROUP_CONCAT(tea_times.playerEmails )', '_playerEmails');
        $query->addExpression('GROUP_CONCAT(tea_times.playerPhonenumbers )', '_playerPhonenumbers');
        $query->addExpression('GROUP_CONCAT(tea_times.utilitieIds )', '_utilitieIds');
        $query->addExpression('GROUP_CONCAT(tea_times.utilitieCount )', '_utilitieCount');
        $query->addExpression('GROUP_CONCAT(tea_times.utilitieNames )', '_utilitieNames');
        $query->addExpression('GROUP_CONCAT(tea_times.utilitiePrices)', '_utilitiePrices');

        if (!empty($condition['condition']['has_promotion']) &&$condition['condition']['has_promotion']['value']==1 ) {
            $query->condition('golf_booking.promotion_price', 0, ">");
        }
        if (!empty($condition['condition']['has_promotion']) &&$condition['condition']['has_promotion']['value']==2 ) {
            $query->condition('golf_booking.promotion_price', 0, "<=");
        }
        if(!empty($user->uid)){
            if (user_has_role(3, $user) || user_has_role(6, $user)){
                if (!empty($condition['condition']['namespace']) && $condition['condition']['namespace']['value'] != 'all') {
                    $query->condition('namespace_id', $condition['condition']['namespace']['value'], $condition['condition']['namespace']['operator']);
                }
            }else if(user_has_role(4, $user) || user_has_role(5, $user)){
                $_user = user_load($user->uid);
                $query->condition('namespace_id', $_user->field_namespace['und'][0]['value'], '=');
            }
        }



        if (!empty($condition['condition']['code']) && $condition['condition']['code']['value'] != 'all') {
//            print(1);die;
            $query->condition('golf_booking.code', $condition['condition']['code']['value'], $condition['condition']['code']['operator']);
        }
        if (!empty($condition['condition']['golf']) && $condition['condition']['golf']['value'] != 'all') {
//            print(1);die;
            $query->condition('golf_booking.golfId', $condition['condition']['golf']['value'], $condition['condition']['golf']['operator']);
        }

        if (!empty($condition['condition']['contact_name_mail_tel'])) {
//            $query->where("CONCAT(golf_booking.contact_name,golf_booking.contact_mail,golf_booking.contact_phone)");
            $query->where('CONCAT(golf_booking.contact_name,golf_booking.contact_mail,golf_booking.contact_phone) LIKE :string',array(":string"=>$condition['condition']['contact_name_mail_tel']['value']));
        }
        if (!empty($condition['condition']['contact_name']) && $condition['condition']['contact_name']['value'] != 'all') {
            $query->condition('golf_booking.contact_name', $condition['condition']['contact_name']['value'], $condition['condition']['contact_name']['operator']);
        }
        if (!empty($condition['condition']['contact_mail']) && $condition['condition']['contact_mail']['value'] != 'all') {
            $query->condition('golf_booking.contact_mail', $condition['condition']['contact_mail']['value'], $condition['condition']['contact_mail']['operator']);
        }
        if (!empty($condition['condition']['contact_phone']) && $condition['condition']['contact_phone']['value'] != 'all') {
            $query->condition('golf_booking.contact_phone', $condition['condition']['contact_phone']['value'], $condition['condition']['contact_phone']['operator']);
        }
        if (!empty($condition['condition']['payment_method']) && $condition['condition']['payment_method']['value'] != 'all') {
            $query->condition('golf_booking.payment_method', $condition['condition']['payment_method']['value'], $condition['condition']['payment_method']['operator']);
        }
        if (!empty($condition['condition']['created']) && $condition['condition']['created']['value'] != 'all') {
            $query->condition('golf_booking.created', $condition['condition']['created']['value'], $condition['condition']['created']['operator']);
        }
        if (!empty($condition['condition']['status']) && $condition['condition']['status']['value'] != 'all') {
            $query->condition('golf_booking.status', $condition['condition']['status']['value'], $condition['condition']['status']['operator']);
        }
        if (!empty($condition['condition']['status1'])) {
            $query->condition('golf_booking.status', $condition['condition']['status1']['value'], $condition['condition']['status1']['operator']);
        }

        if (!empty($condition['condition']['uid'])) {
            $query->condition('golf_booking.uid', $condition['condition']['uid']['value'], $condition['condition']['uid']['operator']);
        }
        if (!empty($condition['condition']['cassiopeia_daily_report_filter_form_start_time'])) {
            $query->condition('golf_booking.created', $condition['condition']['cassiopeia_daily_report_filter_form_start_time']['value'], $condition['condition']['cassiopeia_daily_report_filter_form_start_time']['operator']);
        }
        if (!empty($condition['condition']['cassiopeia_daily_report_filter_form_end_time'])) {
            $query->condition('golf_booking.created', $condition['condition']['cassiopeia_daily_report_filter_form_end_time']['value'], $condition['condition']['cassiopeia_daily_report_filter_form_end_time']['operator']);
        }
        if (!empty($condition['condition']['remind-time'])) {
            print((date('d/m/Y H:i',$condition['condition']['remind-time']['value'])));
//            print(strtotime(date('H:i',REQUEST_TIME)));
            $query->addField("ctype_tea_time","field_c_t_t_sh","field_c_t_t_sh");
            $query->addExpression('ctype_tea_time.field_c_t_t_sh-:REQUEST_TIME','timediff',array(":REQUEST_TIME"=>date('H:i',REQUEST_TIME)));
            $query->where('ctype_tea_time.field_c_t_t_sh-:REQUEST_TIME<=:REMIND_TIME',array(":REQUEST_TIME"=>strtotime(date('H:i',REQUEST_TIME)),":REMIND_TIME"=>$condition['condition']['remind-time']['value']));
            $query->where('ctype_tea_time.field_c_t_t_sh-:REQUEST_TIME>0');
//            print("aaaaaaaaaaaa");
        }
        $query->groupBy('golf_booking.code');

        if(!empty($condition['order']['created'])) {
            $query->orderBy('golf_booking.created', $condition['order']['created']);
        }
//        print($condition['condition']['cassiopeia_booking_filter_select']['value']);
        if(!empty($condition['condition']['cassiopeia_booking_filter_select'])){
//            $now = getdate();
//            $wday = $now['wday'];
//            $f = $wday - 1;
//            $l = 7 - $wday;
////            print($condition['condition']['cassiopeia_booking_filter_select']['value']);
//            switch($condition['condition']['cassiopeia_booking_filter_select']['value']){
//                case 1 :
//                    $first_date_of_week = strtotime('-'.$f.' day'.($now['mday'])."-".$now['mon']."-".$now['year']);
//                    $last_date_of_week = strtotime('+'.$l.' day'.($now['mday'])."-".$now['mon']."-".$now['year']);
//                    $query -> condition("golf_booking.created",array($first_date_of_week,$last_date_of_week),"BETWEEN");
//                    break;
//                case 2 :
//                    $first_date_of_week = strtotime('-'.($f+7).' day'.($now['mday'])."-".$now['mon']."-".$now['year']);
//                    $last_date_of_week = strtotime('+'.($l-7).' day'.($now['mday'])."-".$now['mon']."-".$now['year']);
//                    $query -> condition("golf_booking.created",array($first_date_of_week,$last_date_of_week),"BETWEEN");
////                        print(date("d/m/Y",$last_date_of_week));
//                    break;
//                case 3 :
//                    $first_date_of_month = strtotime("1"."-".$now['mon']."-".$now['year']);
//                    $last_date_of_month = strtotime("+1 month 1"."-".$now['mon']."-".$now['year']);
//                    $query -> condition("golf_booking.created",array($first_date_of_month,$last_date_of_month),"BETWEEN");
//                    break;
//                case 4 :
//                    $first_date_of_month = strtotime("-2 month 1"."-".$now['mon']."-".$now['year']);
//                    $last_date_of_month = strtotime("-1 month 1"."-".$now['mon']."-".$now['year']);
//                    $query -> condition("golf_booking.created",array($first_date_of_month,$last_date_of_month),"BETWEEN");
////                    print(date("d/m/Y",$first_date_of_month));
////                    print(date("d/m/Y",$last_date_of_month));
////                    die;
////                    print($last_date_of_month);
//                    break;
//                case 5 :
//                    if($now['mon']<=3){
//                        $first_date_of_month = strtotime("01-01-".$now['year']);
//                        $last_date_of_month = strtotime("31-03-".$now['year']);
//                    }else if($now['mon'] <= 6){
//                        $first_date_of_month = strtotime("01-04-".$now['year']);
//                        $last_date_of_month = strtotime("30-06-".$now['year']);
//                    }else if($now['mon'] <= 9){
//                        $first_date_of_month = strtotime("01-07-".$now['year']);
//                        $last_date_of_month = strtotime("30-09-".$now['year']);
//                    }else{
//                        $first_date_of_month = strtotime("01-10-".$now['year']);
//                        $last_date_of_month = strtotime("31-12-".$now['year']);
//                    }
//                    $query -> condition("golf_booking.created",array($first_date_of_month,$last_date_of_month),"BETWEEN");
//                    break;
//                case 6 :
//                    if($now['mon']<=3){
//                        $first_date_of_month = strtotime("01-10-".($now['year']-1));
//                        $last_date_of_month = strtotime("31-12-".($now['year']-1));
//
//
//                    }else if($now['mon'] <= 6){
//                        $first_date_of_month = strtotime("01-01-".$now['year']);
//                        $last_date_of_month = strtotime("31-03-".$now['year']);
//
//
//                    }else if($now['mon'] <= 9){
//                        $first_date_of_month = strtotime("01-04-".$now['year']);
//                        $last_date_of_month = strtotime("30-06-".$now['year']);
//
//
//                    }else{
//                        $first_date_of_month = strtotime("01-07-".$now['year']);
//                        $last_date_of_month = strtotime("30-09-".$now['year']);
//                    }
//                    $query -> condition("golf_booking.created",array($first_date_of_month,$last_date_of_month),"BETWEEN");
//                    break;
//            }
        }
//        if(!empty($condition['condition']['cassiopeia_golf_booking_filter_form_start_time']['value'])){
//            $query -> condition("golf_booking.created",strtotime($condition['condition']['cassiopeia_golf_booking_filter_form_start_time']['value']),">=");
//        }
//        if(!empty($condition['condition']['cassiopeia_golf_booking_filter_form_end_time']['value'])){
//            $query -> condition("golf_booking.created",strtotime($condition['condition']['cassiopeia_golf_booking_filter_form_end_time']['value']),"<=");
//        }
//        print((string)$query);
        $result = $query->execute()->fetchAll();
//        var_dump($result);
    }catch (Exception $e) {
        print_r($e);
    }
    return $result;

}
function cassiopeia_customer_filter_form ($form, &$form_state, $cache = array()) {
    $namespace_options['all'] = "Chọn";
    $namespace_options['8'] = "Trong ngày";
    $namespace_options['1'] = "Tuần này";
    $namespace_options['2'] = "Tuần trước";
    $namespace_options['3'] = "Tháng này";
    $namespace_options['4'] = "Tháng trước";
    $namespace_options['5'] = "Quý này";
    $namespace_options['6'] = "Quý trước";
    $namespace_options['7'] = "Lọc theo khoảng thời gian";
    $form['cassiopeia_customer_select'] = array(
        '#type' => 'select',
        '#title' => t('Lọc theo khoảng'),
        '#options' =>$namespace_options,
        '#default_value' => '8',
    );
    if (!empty($cache['cassiopeia_customer_select'])) {
        $form['cassiopeia_customer_select']['#default_value'] = $cache['cassiopeia_customer_select'];
    }else{
        $form['cassiopeia_customer_select']['#default_value'] = date("d/m/Y",REQUEST_TIME);
    }
    $form['cassiopeia_customer_filter_form_start_time'] = array(
        '#type' => 'date_popup',
        '#date_format' => 'd-m-Y',
        '#date_year_range' => '-50:50',
        '#required' => FALSE,
        '#default_value' => REQUEST_TIME,
        '#attributes' => array("placeholder"=>date("d/m/Y",REQUEST_TIME),'autocomplete' =>'off'),
    );
    if (!empty($cache['cassiopeia_customer_filter_form_start_time'])) {
        $form['cassiopeia_customer_filter_form_start_time']['#default_value'] = $cache['cassiopeia_customer_filter_form_start_time'];
    }else{
        $form['cassiopeia_customer_filter_form_start_time']['#default_value'] = date("d/m/Y",REQUEST_TIME);
    }
    $form['cassiopeia_customer_filter_form_end_time'] = array(
        '#type' => 'date_popup',
        '#date_format' => 'd-m-Y',
        '#date_year_range' => '-50:50',
        '#required' => FALSE,
        '#default_value' => REQUEST_TIME,
        '#attributes' => array("placeholder"=>date("d/m/Y",REQUEST_TIME),'autocomplete' =>'off'),
    );
    if (!empty($cache['cassiopeia_customer_filter_form_end_time'])) {
        $form['cassiopeia_customer_filter_form_end_time']['#default_value'] = $cache['cassiopeia_customer_filter_form_end_time'];
    }
    $form['submit'] = array('#type' => 'submit', '#value' => t('Filter'), '#attributes'=>array('class'=>array('btn btn-success')));
    return $form;
}
function cassiopeia_customer_filter_form_submit($form,&$form_state){
//    var_dump($form_state['values']);die;
    drupal_goto('admin/manager/customer',
        array(
            'query'=>array(
                'cassiopeia_customer_select'=>$form_state['values']['cassiopeia_customer_select'],
                'cassiopeia_customer_filter_form_start_time'=>$form_state['values']['cassiopeia_customer_filter_form_start_time'],
                'cassiopeia_customer_filter_form_end_time'=> $form_state['values']['cassiopeia_customer_filter_form_end_time'],
            )
        )
    );
}
function cassiopeia_daily_report_filter_form ($form, &$form_state, $cache = array()) {
    global $user;
    if (user_has_role(3) || user_has_role(6, $user)) {
        $namespace_options = array();
        $namespace_options['all'] = '----- Tất cả ------';
        foreach (_cassiopeia_get_all_namespace() as $key => $value) {
            $namespace_options[$value->id] = $value->title;
        }

        $form['namespace'] = array(
            '#type' => 'select',
            '#title' => t('Namespace'),
            '#options' =>$namespace_options
        );
        if(!empty($cache['namespace'])) {
            $form['namespace']['#default_value'] = $cache['namespace'];
        }
    }

    $form['cassiopeia_daily_report_filter_form_start_time'] = array(
        '#type' => 'date_popup',
        '#date_format' => 'd-m-Y',
        '#date_year_range' => '-50:50',
        '#required' => FALSE,
        '#attributes' => array("placeholder"=>date("d/m/Y",REQUEST_TIME),'autocomplete' =>'off'),
    );
    if (!empty($cache['cassiopeia_daily_report_filter_form_start_time'])) {
        $form['cassiopeia_daily_report_filter_form_start_time']['#default_value'] = $cache['cassiopeia_daily_report_filter_form_start_time'];
    }else{
        $form['cassiopeia_daily_report_filter_form_start_time']['#default_value'] = date("d/m/Y",REQUEST_TIME);
    }
    $form['cassiopeia_daily_report_filter_form_end_time'] = array(
        '#type' => 'date_popup',
        '#date_format' => 'd-m-Y',
        '#date_year_range' => '-50:50',
        '#required' => FALSE,
        '#attributes' => array("placeholder"=>date("d/m/Y",REQUEST_TIME),'autocomplete' =>'off'),
    );
    if (!empty($cache['cassiopeia_daily_report_filter_form_end_time'])) {
        $form['cassiopeia_daily_report_filter_form_end_time']['#default_value'] = $cache['cassiopeia_daily_report_filter_form_end_time'];
    }
    $form['submit'] = array('#type' => 'submit', '#value' => t('Filter'), '#attributes'=>array('class'=>array('btn btn-success')));
    return $form;
}
function cassiopeia_daily_report_filter_form_submit($form,&$form_state){
//    var_dump($form_state['values']);die;
    drupal_goto('admin/manager/report/daily',
        array(
            'query'=>array(
                'namespace'=>$form_state['values']['namespace'],
                'cassiopeia_daily_report_filter_form_start_time'=>$form_state['values']['cassiopeia_daily_report_filter_form_start_time'],
                'cassiopeia_daily_report_filter_form_end_time'=> $form_state['values']['cassiopeia_daily_report_filter_form_end_time'],
            )
        )
    );
}
function cassiopeia_get_golf_tours($conditions = array()){
    $conditions['status'] = array(
        "type" => "propertyCondition",
        "value" => 1,
        "condition" => "=",
    );
    $conditions['created'] = array(
        "type" => "propertyOrderBy",
        "direction" => "DESC",
    );
    $golf_tours = cassiopeia_get_items_by_conditions($conditions,"ctype_tour","node");
    return $golf_tours;
}
function cassiopeia_golf_tour_booking_by_conditions($options = array()){
    try{
        $query = db_select("tbl_golf_tour_booking","tbl_golf_tour_booking");
        $query->fields('tbl_golf_tour_booking');
        $query->join("node","tbl_golf_tour","tbl_golf_tour.nid=tbl_golf_tour_booking.golf_tour_id");
        $query->condition("tbl_golf_tour.type","ctype_tour");
        $query->addField("tbl_golf_tour","title","tbl_golf_tour_title");
//        $query->join("tbl_status","tbl_status","tbl_status.id=tbl_golf_tour_booking.status");
//        $query->addField("tbl_status","description","tbl_status_des");

        if (isset($options['condition']['code']) && $options['condition']['code']['value'] != 'none') {
            $query->condition('tbl_golf_tour_booking.code', $options['condition']['code']['value'], $options['condition']['code']['operator']);
        }
        if (isset($options['condition']['start_date']) && $options['condition']['start_date']['value'] != 'none') {
            $query->condition('tbl_golf_tour_booking.start_date', $options['condition']['start_date']['value'], $options['condition']['start_date']['operator']);
        }
//        ro
        if (isset($options['condition']['golf_tour']) && $options['condition']['golf_tour']['value']!='all') {
            $query->condition('tbl_golf_tour_booking.golf_tour_id', $options['condition']['golf_tour']['value'], $options['condition']['golf_tour']['operator']);
        }
        if (isset($options['condition']['date_1'])) {
            $query->condition('tbl_golf_tour_booking.start_date', $options['condition']['date_1']['value'], $options['condition']['date_1']['operator']);
        }
        if (isset($options['condition']['date_2'])) {
            $query->condition('tbl_golf_tour_booking.start_date', $options['condition']['date_2']['value'], $options['condition']['date_2']['operator']);
        }
        if (isset($options['condition']['created'])) {
            $query->condition('tbl_golf_tour_booking.created', $options['condition']['created']['value'], "BETWEEN");
        }
        if (isset($options['condition']['created'])) {
            $query->condition('tbl_golf_tour_booking.created', $options['condition']['created']['value'], $options['condition']['created']['operator']);
        }
        if (isset($options['condition']['status']) && $options['condition']['status']['value']!="all") {
            $query->condition('tbl_golf_tour_booking.status', $options['condition']['status']['value'], $options['condition']['status']['operator']);
        }
        if (isset($options['condition']['promotion_code'])) {
            $query->condition("tbl_golf_tour_booking.promotion_code",$options['condition']['status']['value'],"LIKE");
        }
        if (isset($options['condition']['name_mail_tel'])) {
            $query->where('CONCAT(tbl_golf_tour_booking.contact_name,tbl_golf_tour_booking.contact_mail,tbl_golf_tour_booking.contact_phone) LIKE :string',array(":string"=>$options['condition']['name_mail_tel']['value']));
        }
//        print_r($options);
        if (isset($options['condition']['date_time']) && $options['condition']['date_time']['value']!="all") {
//            print(1);die;
            $flag = false;
            $now = getdate();
            $wday = $now['wday'];
            $f = $wday - 1;
            $l = 7 - $wday;
            switch($options['condition']['date_time']['value']){
                case 1 :
                    $first_date_of_week = strtotime('-'.$f.' day'.($now['mday'])."-".$now['mon']."-".$now['year']);
                    $last_date_of_week = strtotime('+'.$l.' day'.($now['mday'])."-".$now['mon']."-".$now['year']);
                    $query->condition('tbl_golf_tour_booking.start_date', array($first_date_of_week,$last_date_of_week), "BETWEEN");
                    break;
                case 2 :
                    $first_date_of_week = strtotime('-'.($f+7).' day'.($now['mday'])."-".$now['mon']."-".$now['year']);
                    $last_date_of_week = strtotime('+'.($l-7).' day'.($now['mday'])."-".$now['mon']."-".$now['year']);
                    $query->condition('tbl_golf_tour_booking.start_date', array($first_date_of_week,$last_date_of_week), "BETWEEN");
                    break;
                case 3 :
                    $first_date_of_month = strtotime("1"."-".$now['mon']."-".$now['year']);
                    $last_date_of_month = strtotime("+1 month 1"."-".$now['mon']."-".$now['year']);
                    $query->condition('tbl_golf_tour_booking.start_date', array($first_date_of_month,$last_date_of_month), "BETWEEN");
                    break;
                case 4 :
                    $first_date_of_month = strtotime("-1 month 1"."-".$now['mon']."-".$now['year']);
                    $last_date_of_month = strtotime("-1 day 1"."-".$now['mon']."-".$now['year']);
                    $query->condition('tbl_golf_tour_booking.start_date', array($first_date_of_month,$last_date_of_month), "BETWEEN");
                    break;
                case 5 :
                    if($now['mon']<=3){
                        $first_date_of_month = strtotime("01-01-".$now['year']);
                        $last_date_of_month = strtotime("31-03-".$now['year']);
                    }else if($now['mon'] <= 6){
                        $first_date_of_month = strtotime("01-04-".$now['year']);
                        $last_date_of_month = strtotime("30-06-".$now['year']);
                    }else if($now['mon'] <= 9){
                        $first_date_of_month = strtotime("01-07-".$now['year']);
                        $last_date_of_month = strtotime("30-09-".$now['year']);
                    }else{
                        $first_date_of_month = strtotime("01-10-".$now['year']);
                        $last_date_of_month = strtotime("31-12-".$now['year']);
                    }
                    $query->condition('tbl_golf_tour_booking.start_date', array($first_date_of_month,$last_date_of_month), "BETWEEN");
                    break;
                case 6 :
                    if($now['mon']<=3){
                        $first_date_of_month = strtotime("01-10-".($now['year']-1));
                        $last_date_of_month = strtotime("31-12-".($now['year']-1));


                    }else if($now['mon'] <= 6){
                        $first_date_of_month = strtotime("01-01-".$now['year']);
                        $last_date_of_month = strtotime("31-03-".$now['year']);


                    }else if($now['mon'] <= 9){
                        $first_date_of_month = strtotime("01-04-".$now['year']);
                        $last_date_of_month = strtotime("30-06-".$now['year']);


                    }else{
                        $first_date_of_month = strtotime("01-07-".$now['year']);
                        $last_date_of_month = strtotime("30-09-".$now['year']);
                    }
                    $query->condition('tbl_golf_tour_booking.start_date', array($first_date_of_month,$last_date_of_month), "BETWEEN");
                    break;
            }
            if (isset($options['condition']['booking_tour_start_time'])) {
                print(date("d/m/Y H:i",$options['condition']['booking_tour_start_time']['value']));
                print(date("d/m/Y H:i",$options['condition']['booking_tour_end_time']['value']));
                $query->condition('tbl_golf_tour_booking.start_date', $options['condition']['booking_tour_start_time']['value'], ">=");
            }
            if (isset($options['condition']['booking_tour_end_time'])) {
                $query->condition('tbl_golf_tour_booking.start_date', $options['condition']['booking_tour_end_time']['value']+24*3600, "<=");
            }
        }

        $query -> orderBy("tbl_golf_tour_booking.created","DESC");
//        print((string)$query);
        $result = $query->execute()->fetchAll();
        return $result;
    }catch(Exception $e){
        throw $e;
    }
}
function cassiopeia_golf_tour_booking_edit_form($form,&$form_state){

    $status_options = array();
    $status_options['all'] = '---- Any ----';
    $status_options[0] = 'Đã hủy';
    $status_options[1] = 'Đang chờ';
    $status_options[3] = 'Xác nhận';
    $status_options[2] = 'Hoàn thành';

    $form['status'] = array(
        '#type' => 'select',
        '#title' => t('Status'),
        '#options' => $status_options,
    );
    $form['code'] = array(
        '#type' => 'textfield',
        '#title' => t('Mã đơn hàng'),
//        '#attributes' => array("class"=>array("hidden")),
    );
    $form['Ghi chú'] = array(
        '#title'
        => t('Note'),

        '#type' => 'textarea',

    );
    $form['#attributes'] = array("class"=>array("golf-tour-booking-form"));
    $form['submit'] = array('#type' => 'submit', '#value' => 'Cập nhật', '#attributes'=>array('class'=>array('btn btn-success')));
    return $form;
}
//function cassiopeia_golf_tour_booking_edit_form_submit($form, &$form_state){
//    $temps = array();
//    foreach($form_state['values'] as $key => $value){
//        if(isset($form_state['values'][$key])){
//            $temps[$key] = $value;
//        }
//    }
//    if(empty($temps['note'])){
//       $temps['note'] = "";
//    }
//    $query = db_update('tbl_golf_tour_booking') // Table name no longer needs {}
//    ->fields(array(
//        'status' =>$temps['status'],
//        'note' =>$temps['note'],
//    ))
//        ->condition('code', $temps['code'])
//        ->execute();
//}
function cassiopeia_golf_tour_booking_filter_form ($form, &$form_state, $cache = null) {
    global $user;


    $options = array();
    $options['all'] = t('All');
    $golf_tours = cassiopeia_get_golf_tours();
    if(!empty($golf_tours)){
        foreach($golf_tours as $key => $value){
            $options[$value->nid] = t($value->title);
        }
    }
    $form['golf_tour'] = array(
        '#type' => 'select',
        '#title' => 'Golf tour',
        '#options' => $options,
    );
    if(!empty($cache['golf_tour'])) {
        $form['golf_tour']['#default_value'] = $cache['golf_tour'];
    }

    $form['code'] = array(
        '#type' => 'textfield',
        '#title' => 'Mã đơn hàng',
    );
    if(!empty($cache['code'])) {
        $form['code']['#default_value'] = $cache['code'];
    }
    $form['name_mail_tel'] = array(
        '#type' => 'textfield',
        '#title' => 'Tên, Email, Số điện thoại',
    );
    if(!empty($cache['name_mail_tel'])) {
        $form['name_mail_tel']['#default_value'] = $cache['name_mail_tel'];
    }
    $form['promotion_code'] = array(
        '#type' => 'textfield',
        '#title' => 'Khuyến mại',
    );
    if(!empty($cache['promotion_code'])) {
        $form['promotion_code']['#default_value'] = $cache['promotion_code'];
    }
    $status_options = array();
    $status_options['all'] = '---- Tất cả ----';
    $status_options[0] = 'Đã hủy';
    $status_options[1] = 'Đang chờ';
    $status_options[3] = 'Xác nhận';
    $status_options[2] = 'Hoàn tất';

    $form['status'] = array(
        '#type' => 'select',
        '#title' => 'Trạng thái',
        '#options' => $status_options,
    );


    if(isset($cache['status'])) {
        $form['status']['#default_value'] = $cache['status'];
    }
    $_select['all'] = "Chọn";
    $_select['1'] = "Tuần này";
    $_select['2'] = "Tuần trước";
    $_select['3'] = "Tháng này";
    $_select['4'] = "Tháng trước";
    $_select['5'] = "Quý này";
    $_select['6'] = "Quý trước";
    $_select['7'] = "Lọc theo khoảng thời gian";
    $form['date_time'] = array(
        '#type' => 'select',
        '#title' => t('Lọc theo khoảng'),
        '#options' =>$_select
    );
    if(isset($cache['date_time'])) {
        $form['date_time']['#default_value'] = $cache['date_time'];
    }
    $form['booking_tour_start_time'] = array(
        '#type' => 'date_popup',
        '#date_format' => 'd-m-Y',
        '#date_year_range' => '-50:50',
        '#required' => FALSE,
        '#attributes' => array("placeholder"=>date("d/m/Y",REQUEST_TIME),'autocomplete' =>'off'),
    );
    if (!empty($cache['booking_tour_start_time'])) {
        $form['booking_tour_start_time']['#default_value'] = $cache['booking_tour_start_time'];
    }
    $form['booking_tour_end_time'] = array(
        '#type' => 'date_popup',
        '#date_format' => 'd-m-Y',
        '#date_year_range' => '-50:50',
        '#required' => FALSE,
        '#attributes' => array("placeholder"=>date("d/m/Y",REQUEST_TIME),'autocomplete' =>'off'),
    );
    if (!empty($cache['booking_tour_end_time'])) {
        $form['booking_tour_end_time']['#default_value'] = $cache['booking_tour_end_time'];
    }
    $form['submit'] = array('#type' => 'submit', '#value' => 'Tìm kiếm', '#attributes'=>array('class'=>array('btn btn-success')));
    return $form;
}
function cassiopeia_golf_tour_booking_filter_form_submit($form, &$form_state) {
    drupal_goto('manager/booking/tour_bookings',
        array(
            'query'=>array(
                'code'=>$form_state['values']['code'],
                'name_mail_tel'=> $form_state['values']['name_mail_tel'],
                'promotion_code'=> $form_state['values']['promotion_code'],
                'booking_tour_start_time' => $form_state['values']['booking_tour_start_time'],
                'booking_tour_end_time' => $form_state['values']['booking_tour_end_time'],
                'status'=>$form_state['values']['status'],
                'golf_tour'=>$form_state['values']['golf_tour'],
                'date_time'=>$form_state['values']['date_time'],
            )
        )
    );
}
function cassiopeia_search_golf_bookings_from_customer_page ($form, &$form_state, $cache = array()) {
    global $user;
    if (!empty($user) && (user_has_role(3) || user_has_role(4) || user_has_role(6) || user_has_role(7))) {

        if (user_has_role(3)) {
            $namespace_options = array();
            $namespace_options['all'] = '----- Tất cả ------';
            foreach (_cassiopeia_get_all_namespace() as $key => $value) {
                $namespace_options[$value->id] = $value->title;
            }

            $form['namespace'] = array(
                '#type' => 'select',
                '#title' => 'Namespace',
                '#options' =>$namespace_options
            );
            if(!empty($cache['namespace'])) {
                $form['namespace']['#default_value'] = $cache['namespace'];
            }
        }

        $form['code'] = array(
            '#type' => 'textfield',
            '#title' => 'Mã hóa đơn',
        );
        if(!empty($cache['code'])) {
            $form['code']['#default_value'] = $cache['code'];
        }

        $golf_options = array();
        $golf_options['all'] = '----- Tất cả -----';
        foreach ( cassiopeia_get_golfs_by_condition(array('condition'=> array('status'=>array('value'=>1, 'operator'=>"=")))) as $key => $value) {
            $golf_options[$value->nid] = $value->title;
        }

        $form['golf'] = array(
            '#type' => 'select',
            '#title' => 'Sân/Zone',
            '#options' =>$golf_options
        );

        if(!empty($cache['golf'])) {
            $form['golf']['#default_value'] = $cache['golf'];
        }

        $form['contact_name_mail_tel'] = array(
            '#type' => 'textfield',
            '#title' => 'Tên, email, số điện thoại',
        );

        if(!empty($cache['contact_name_mail_tel'])) {
            $form['contact_name_mail_tel']['#default_value'] = $cache['contact_name_mail_tel'];
        }
//        $form['contact_name'] = array(
//            '#type' => 'textfield',
//            '#title' => 'Contact name',
//        );
//
//        if(!empty($cache['contact_name'])) {
//            $form['contact_name']['#default_value'] = $cache['contact_name'];
//        }
//
//        $form['contact_mail'] = array(
//            '#type' => 'textfield',
//            '#title' => 'Contact mail',
//        );
//
//        if(!empty($cache['contact_mail'])) {
//            $form['contact_mail']['#default_value'] = $cache['contact_mail'];
//        }
//
//        $form['contact_phone'] = array(
//            '#type' => 'textfield',
//            '#title' => 'Contact phone',
//        );
//
//        if(!empty($cache['contact_phone'])) {
//            $form['contact_phone']['#default_value'] = $cache['contact_phone'];
//        }

        $payment_method_options = array(
            'all' => '-- Tất cả --',
            1=>'Chuyển khoản',
            2=>'Thanh toán nội địa',
            3=>'Thanh toán visa'
        );

        $form['payment_method'] = array(
            '#type' => 'select',
            '#title' => 'Hình thức thanh toán',
            '#options' =>$payment_method_options
        );

        if(!empty($cache['payment_method'])) {
            $form['payment_method']['#default_value'] = $cache['payment_method'];
        }


        $field_ctype_golf_hole_option = array();
        $field_ctype_golf_hole_option[] =  '-- Tất cả --';
        foreach (_cassiopeia_get_all_hole() as $key => $value) {
            $field_ctype_golf_hole_option[$value->hole] = t($value->title);
        }

        $form['hole'] = array(
            '#type' => 'select',
            '#title' => t('Hole'),
            '#options' =>$field_ctype_golf_hole_option
        );
        if(!empty($cache['hole'])) {
            $form['hole']['#default_value'] = $cache['hole'];
        }


        $form['created'] = array(
            '#type' => 'date_popup',
            '#date_format' => 'd/m/Y',
            '#date_year_range' => '-50:50',
            '#required' => FALSE,
            '#attributes' => array("placeholder"=>"Ngày chơi",'autocomplete' =>'off'),
        );

        if (!empty($cache['created'])) {
            $form['created']['#default_value'] = $cache['created'];
        }

        $status_options = array();
        $status_options['all'] = '---- Tất cả ----';
        $status_options[0] = 'Hủy';
        $status_options[1] = 'Chờ';
        $status_options[2] = 'Đã thanh toán';

        $form['has_promotion'] = array(
            '#type' => 'select',
            '#title' => 'Khuyến mại',
            '#options' => array(
                "0" => "Tất cả",
                "1" => "Có khuyến mại",
                "2" => "Không khuyến mại",
            ),
        );


        if(isset($cache['has_promotion'])) {
            $form['has_promotion']['#default_value'] = $cache['has_promotion'];
        }

        $form['status'] = array(
            '#type' => 'select',
            '#title' => 'Trạng thái',
            '#options' => $status_options,
        );
        $_select['all'] = "Chọn";
        $_select['1'] = "Tuần này";
        $_select['2'] = "Tuần trước";
        $_select['3'] = "Tháng này";
        $_select['4'] = "Tháng trước";
        $_select['5'] = "Quý này";
        $_select['6'] = "Quý trước";
        $_select['7'] = "Lọc theo khoảng thời gian";
        $form['cassiopeia_booking_filter_select'] = array(
            '#type' => 'select',
            '#title' => t('Lọc theo khoảng'),
            '#options' =>$_select
        );

        if(isset($cache['status'])) {
            $form['status']['#default_value'] = $cache['status'];
        }
        if(isset($cache['cassiopeia_booking_filter_select'])) {
            $form['cassiopeia_booking_filter_select']['#default_value'] = $cache['cassiopeia_booking_filter_select'];
        }
        $form['cassiopeia_golf_booking_filter_form_start_time'] = array(
            '#type' => 'date_popup',
            '#date_format' => 'd-m-Y',
            '#date_year_range' => '-50:50',
            '#required' => FALSE,
            '#attributes' => array("placeholder"=>date("d/m/Y",REQUEST_TIME),'autocomplete' =>'off'),
        );
        if (!empty($cache['cassiopeia_golf_booking_filter_form_start_time'])) {
            $form['cassiopeia_golf_booking_filter_form_start_time']['#default_value'] = $cache['cassiopeia_golf_booking_filter_form_start_time'];
        }
        $form['cassiopeia_golf_booking_filter_form_end_time'] = array(
            '#type' => 'date_popup',
            '#date_format' => 'd-m-Y',
            '#date_year_range' => '-50:50',
            '#required' => FALSE,
            '#attributes' => array("placeholder"=>date("d/m/Y",REQUEST_TIME),'autocomplete' =>'off'),
        );
        if (!empty($cache['cassiopeia_golf_booking_filter_form_end_time'])) {
            $form['cassiopeia_golf_booking_filter_form_end_time']['#default_value'] = $cache['cassiopeia_golf_booking_filter_form_end_time'];
        }
        $form['#theme'][] = 'cassiopeia_search_golf_bookings_from';
        $form['submit'] = array('#type' => 'submit', '#value' => 'Tìm kiếm', '#attributes'=>array('class'=>array('btn btn-success')));
    }
    return $form;
}
function cassiopeia_search_golf_bookings_from ($form, &$form_state, $cache = array()) {
    global $user;
    if (!empty($user) && (user_has_role(3) || user_has_role(4) || user_has_role(6) || user_has_role(7))) {

        if (user_has_role(3) || user_has_role(6) || user_has_role(7)) {
            $namespace_options = array();
            $namespace_options['all'] = '----- Tất cả ------';
            foreach (_cassiopeia_get_all_namespace() as $key => $value) {
                $namespace_options[$value->id] = $value->title;
            }

            $form['namespace'] = array(
                '#type' => 'select',
                '#title' => 'Namespace',
                '#options' =>$namespace_options
            );
            if(!empty($cache['namespace'])) {
                $form['namespace']['#default_value'] = $cache['namespace'];
            }
        }

        $form['code'] = array(
            '#type' => 'textfield',
            '#title' => 'Mã hóa đơn',
        );
        if(!empty($cache['code'])) {
            $form['code']['#default_value'] = $cache['code'];
        }

        $golf_options = array();
        $golf_options['all'] = '----- Tất cả -----';
        foreach ( cassiopeia_get_golfs_by_condition(array('condition'=> array('status'=>array('value'=>1, 'operator'=>"=")))) as $key => $value) {
            $golf_options[$value->nid] = $value->title;
        }

        $form['golf'] = array(
            '#type' => 'select',
            '#title' => 'Sân/Zone',
            '#options' =>$golf_options
        );

        if(!empty($cache['golf'])) {
            $form['golf']['#default_value'] = $cache['golf'];
        }

        $form['contact_name_mail_tel'] = array(
            '#type' => 'textfield',
            '#title' => 'Tên, email, số điện thoại',
        );

        if(!empty($cache['contact_name_mail_tel'])) {
            $form['contact_name_mail_tel']['#default_value'] = $cache['contact_name_mail_tel'];
        }
//        $form['contact_name'] = array(
//            '#type' => 'textfield',
//            '#title' => 'Contact name',
//        );
//
//        if(!empty($cache['contact_name'])) {
//            $form['contact_name']['#default_value'] = $cache['contact_name'];
//        }
//
//        $form['contact_mail'] = array(
//            '#type' => 'textfield',
//            '#title' => 'Contact mail',
//        );
//
//        if(!empty($cache['contact_mail'])) {
//            $form['contact_mail']['#default_value'] = $cache['contact_mail'];
//        }
//
//        $form['contact_phone'] = array(
//            '#type' => 'textfield',
//            '#title' => 'Contact phone',
//        );
//
//        if(!empty($cache['contact_phone'])) {
//            $form['contact_phone']['#default_value'] = $cache['contact_phone'];
//        }

        $payment_method_options = array(
            'all' => '-- Tất cả --',
            1=>'Chuyển khoản',
            2=>'Thanh toán nội địa',
            3=>'Thanh toán visa'
        );

        $form['payment_method'] = array(
            '#type' => 'select',
            '#title' => 'Hình thức thanh toán',
            '#options' =>$payment_method_options
        );

        if(!empty($cache['payment_method'])) {
            $form['payment_method']['#default_value'] = $cache['payment_method'];
        }


        $field_ctype_golf_hole_option = array();
        $field_ctype_golf_hole_option[] =  '-- Tất cả --';
        foreach (_cassiopeia_get_all_hole() as $key => $value) {
            $field_ctype_golf_hole_option[$value->hole] = t($value->title);
        }

        $form['hole'] = array(
            '#type' => 'select',
            '#title' => t('Hole'),
            '#options' =>$field_ctype_golf_hole_option
        );
        if(!empty($cache['hole'])) {
            $form['hole']['#default_value'] = $cache['hole'];
        }


        $form['created'] = array(
            '#type' => 'date_popup',
            '#date_format' => 'd/m/Y',
            '#date_year_range' => '-50:50',
            '#required' => FALSE,
            '#attributes' => array("placeholder"=>"Ngày chơi",'autocomplete' =>'off'),
        );

        if (!empty($cache['created'])) {
            $form['created']['#default_value'] = $cache['created'];
        }

        $status_options = array();
        $status_options['all'] = '---- Tất cả ----';
        $status_options[0] = 'Hủy';
        $status_options[1] = 'Chờ';
        $status_options[2] = 'Đã thanh toán';

        $form['has_promotion'] = array(
            '#type' => 'select',
            '#title' => 'Khuyến mại',
            '#options' => array(
                "0" => "Tất cả",
                "1" => "Có khuyến mại",
                "2" => "Không khuyến mại",
            ),
        );


        if(isset($cache['has_promotion'])) {
            $form['has_promotion']['#default_value'] = $cache['has_promotion'];
        }

        $form['status'] = array(
            '#type' => 'select',
            '#title' => 'Trạng thái',
            '#options' => $status_options,
        );
        $_select['all'] = "Chọn";
        $_select['1'] = "Tuần này";
        $_select['2'] = "Tuần trước";
        $_select['3'] = "Tháng này";
        $_select['4'] = "Tháng trước";
        $_select['5'] = "Quý này";
        $_select['6'] = "Quý trước";
        $_select['7'] = "Lọc theo khoảng thời gian";
        $form['cassiopeia_booking_filter_select'] = array(
            '#type' => 'select',
            '#title' => t('Lọc theo khoảng'),
            '#options' =>$_select
        );

        if(isset($cache['status'])) {
            $form['status']['#default_value'] = $cache['status'];
        }
        if(isset($cache['cassiopeia_booking_filter_select'])) {
            $form['cassiopeia_booking_filter_select']['#default_value'] = $cache['cassiopeia_booking_filter_select'];
        }
        $form['cassiopeia_golf_booking_filter_form_start_time'] = array(
            '#type' => 'date_popup',
            '#date_format' => 'd-m-Y',
            '#date_year_range' => '-50:50',
            '#required' => FALSE,
            '#attributes' => array("placeholder"=>date("d/m/Y",REQUEST_TIME),'autocomplete' =>'off'),
        );
        if (!empty($cache['cassiopeia_golf_booking_filter_form_start_time'])) {
            $form['cassiopeia_golf_booking_filter_form_start_time']['#default_value'] = $cache['cassiopeia_golf_booking_filter_form_start_time'];
        }
        $form['cassiopeia_golf_booking_filter_form_end_time'] = array(
            '#type' => 'date_popup',
            '#date_format' => 'd-m-Y',
            '#date_year_range' => '-50:50',
            '#required' => FALSE,
            '#attributes' => array("placeholder"=>date("d/m/Y",REQUEST_TIME),'autocomplete' =>'off'),
        );
        if (!empty($cache['cassiopeia_golf_booking_filter_form_end_time'])) {
            $form['cassiopeia_golf_booking_filter_form_end_time']['#default_value'] = $cache['cassiopeia_golf_booking_filter_form_end_time'];
        }
        $form['#theme'][] = 'cassiopeia_search_golf_bookings_from';
        $form['submit'] = array('#type' => 'submit', '#value' => 'Tìm kiếm', '#attributes'=>array('class'=>array('btn btn-success')));
    }
    return $form;
}

function cassiopeia_search_golf_bookings_from_customer_page_submit($form, &$form_state) {
    global  $user;

    if (user_has_role(3, $user) || user_has_role(6, $user) || user_has_role(7, $user)) {
        drupal_goto('admin/manager/customer',
            array(
                'query'=>array(
                    'namespace'=>$form_state['values']['namespace'],
                    'code'=>$form_state['values']['code'],
                    'golf'=> $form_state['values']['golf'],
                    'contact_name_mail_tel'=>$form_state['values']['contact_name_mail_tel'],
//                    'contact_name'=>$form_state['values']['contact_name'],
//                    'contact_mail'=>$form_state['values']['contact_mail'],
//                    'contact_phone'=>$form_state['values']['contact_phone'],
                    'payment_method'=>$form_state['values']['payment_method'],
                    'hole'=>$form_state['values']['hole'],
                    'created' => $form_state['values']['created'],
                    'status'=>$form_state['values']['status'],
                    'has_promotion'=>$form_state['values']['has_promotion'],
                    'cassiopeia_booking_filter_select'=>$form_state['values']['cassiopeia_booking_filter_select'],
                    'cassiopeia_golf_booking_filter_form_start_time'=>$form_state['values']['cassiopeia_golf_booking_filter_form_start_time'],
                    'cassiopeia_golf_booking_filter_form_end_time'=>$form_state['values']['cassiopeia_golf_booking_filter_form_end_time'],
                )
            )
        );
    }else {
        drupal_goto('admin/manager/customer',
            array(
                'query'=>array(
                    'code'=>$form_state['values']['code'],
                    'golf'=> $form_state['values']['golf'],
                    'contact_name_mail_tel'=>$form_state['values']['contact_name_mail_tel'],
//                    'contact_name'=>$form_state['values']['contact_name'],
//                    'contact_mail'=>$form_state['values']['contact_mail'],
//                    'contact_phone'=>$form_state['values']['contact_phone'],
                    'payment_method'=>$form_state['values']['payment_method'],
                    'hole'=>$form_state['values']['hole'],
                    'created' => $form_state['values']['created'],
                    'status'=>$form_state['values']['status'],
                )
            )
        );
    }
}
function cassiopeia_search_golf_bookings_from_submit($form, &$form_state) {
    global  $user;

    if (user_has_role(3, $user) || user_has_role(6, $user) || user_has_role(7, $user)) {
        drupal_goto('manager/booking/golf_bookings',
            array(
                'query'=>array(
                    'namespace'=>$form_state['values']['namespace'],
                    'code'=>$form_state['values']['code'],
                    'golf'=> $form_state['values']['golf'],
                    'contact_name_mail_tel'=>$form_state['values']['contact_name_mail_tel'],
//                    'contact_name'=>$form_state['values']['contact_name'],
//                    'contact_mail'=>$form_state['values']['contact_mail'],
//                    'contact_phone'=>$form_state['values']['contact_phone'],
                    'payment_method'=>$form_state['values']['payment_method'],
                    'hole'=>$form_state['values']['hole'],
                    'created' => $form_state['values']['created'],
                    'status'=>$form_state['values']['status'],
                    'has_promotion'=>$form_state['values']['has_promotion'],
                    'cassiopeia_booking_filter_select'=>$form_state['values']['cassiopeia_booking_filter_select'],
                    'cassiopeia_golf_booking_filter_form_start_time'=>$form_state['values']['cassiopeia_golf_booking_filter_form_start_time'],
                    'cassiopeia_golf_booking_filter_form_end_time'=>$form_state['values']['cassiopeia_golf_booking_filter_form_end_time'],
                )
            )
        );
    }else {
        drupal_goto('manager/booking/golf_bookings',
            array(
                'query'=>array(
                    'code'=>$form_state['values']['code'],
                    'golf'=> $form_state['values']['golf'],
                    'contact_name_mail_tel'=>$form_state['values']['contact_name_mail_tel'],
//                    'contact_name'=>$form_state['values']['contact_name'],
//                    'contact_mail'=>$form_state['values']['contact_mail'],
//                    'contact_phone'=>$form_state['values']['contact_phone'],
                    'payment_method'=>$form_state['values']['payment_method'],
                    'hole'=>$form_state['values']['hole'],
                    'created' => $form_state['values']['created'],
                    'status'=>$form_state['values']['status'],
                )
            )
        );
    }
}


function cassiopeia_get_golf_booking_by_code($code){
    $query = db_select('golf_booking');
    $query->fields('golf_booking');
    $query->condition('golf_booking.code', $code, '=');
    $result = $query->execute()->fetchObject();


    if(!empty($result)) {
        $result->tea_times = array();

        $_golf_booking_tea_time_query = db_select('golf_booking_tea_time');
        $_golf_booking_tea_time_query->fields('golf_booking_tea_time');
        $_golf_booking_tea_time_query->condition('golf_booking_tea_time.code', $code, '=');
        $result->tea_times = $_golf_booking_tea_time_query->execute()->fetchAll();


        foreach ($result->tea_times as $key => $value) {
            $result->tea_times[$key]->players = array();
            $_golf_booking_player_query = db_select('golf_booking_player');
            $_golf_booking_player_query->fields('golf_booking_player');
            $_golf_booking_player_query->condition('golf_booking_player.teaTimeId', $value->id, '=');
            $result->tea_times[$key]->players = $_golf_booking_player_query->execute()->fetchAll();
        }

        foreach ($result->tea_times as $key => $value) {
            $result->tea_times[$key]->utilities = array();

            $_golf_booking_utilitie_query = db_select('golf_booking_utilitie');
            $_golf_booking_utilitie_query->fields('golf_booking_utilitie');
            $_golf_booking_utilitie_query->condition('golf_booking_utilitie.teaTimeId', $value->id, '=');
            $result->tea_times[$key]->utilities = $_golf_booking_utilitie_query->execute()->fetchAll();
        }

    }


    return $result;
}


function cassiopeia_golf_add_utilitie_form ($form, $form_state) {
    global $user;

    $form = array();
    $form['title'] = array(
        '#type' => 'textfield',
        '#title' => 'Tiêu đề',
        '#size' => 60,
        '#maxlength' => 128,
        '#required' => TRUE,
    );

    if (user_has_role(3) || user_has_role(6) || user_has_role(7)) {
        $namespace_options = array();
        $namespace_options[0] = 'Tất cả';
        foreach (_cassiopeia_get_all_namespace() as $key => $value) {
            $namespace_options[$value->id] = $value->title;
        }

        $form['namespace'] = array(
            '#type' => 'select',
            '#title' => 'Namespace',
            '#options' =>  $namespace_options,
            '#required' => TRUE,
        );

    }

    $form['price'] = array(
        '#type' => 'textfield',
        '#title' => 'Giá',
        '#size' => 60,
        '#maxlength' => 128,
        '#required' => TRUE,
    );

    $form['icon_container'] = array(
        '#type' => 'container',
        '#attributes'=>array('class'=>array('form-group'))
    );

    $form['icon_container']['icon'] = array(
        '#title' => 'icon',
        '#type' => 'managed_file',
        '#upload_location' => 'public://golf/utilities/icons/',
        '#required' => TRUE,
        '#prefix' => '<div class="form-group">',
        '#suffix' => '</div>',
        '#attributes'=>array('class'=>array('form-group'))
    );

    $form['submit'] = array('#type' => 'submit', '#value' => 'Tạo', '#attributes'=>array('class'=>array('btn btn-success')), '#prefix' => '<div class="form-group">', '#suffix' => '</div>',);
    return $form;
}

function cassiopeia_golf_add_utilitie_form_validate($form, $form_state) {
    if(!is_numeric($form_state['values']['price'])) {
        form_set_error('price', 'Giá không hợp lệ', 'error');
    }
}
function cassiopeia_golf_add_utilitie_form_submit($form, $form_state) {
    global $user;
    $_user  = user_load($user->uid);
    $fid = $form_state['values']['icon'];
    $file = file_load($fid);
    $file->status = FILE_STATUS_PERMANENT;
    file_save($file);

    if (user_has_role(3) || user_has_role(6)) {
        $utilitieId = db_insert('utilities') // Table name no longer needs {}
        ->fields(array(
            'title' => $form_state['values']['title'],
            'price' => $form_state['values']['price'],
            'icon' => $file->fid,
            'uid' => $user->uid,
            'namespace' => $form_state['values']['namespace'],
            'created' => REQUEST_TIME,
        ))
            ->execute();
    }else {
        $utilitieId = db_insert('utilities') // Table name no longer needs {}
        ->fields(array(
            'title' => $form_state['values']['title'],
            'price' => $form_state['values']['price'],
            'icon' => $file->fid,
            'uid' => $user->uid,
            'namespace' => $_user->field_namespace['und'][0]['value'],
            'created' => REQUEST_TIME,
        ))
            ->execute();
    }


}

function cassiopeia_golf_add_utility_delete_form($form, &$form_state, $utilitie = null) {
    $form = array();
    $form_state['utility'] = $utilitie;
    $form['submit'] = array(
        '#type'     => 'submit',
        '#value'    => t('Thực hiện'),
        '#attributes' => array("class"=>array("btn btn-primary")),
        '#prefix'   => "",
        '#suffix'   => "<a href='/manager/utility' class='btn btn-default'>Quay lại</a>",
    );
    return $form;
}

function cassiopeia_golf_add_utilitie_edit_form ($form, &$form_state, $utilitie = null) {
    $form = array();

    $form_state['utilitie'] = $utilitie;
//    print_r($utilitie);
    if(!empty($utilitie)) {
        $form['title'] = array(
            '#type' => 'textfield',
            '#title' => 'Tiêu đề',
            '#size' => 60,
            '#maxlength' => 128,
            '#required' => TRUE,
            '#default_value' => $utilitie->title,
        );

        $form['price'] = array(
            '#type' => 'textfield',
            '#title' => 'Giá',
            '#size' => 60,
            '#maxlength' => 128,
            '#required' => TRUE,
            '#default_value' => $utilitie->price,
        );

        if (user_has_role(3) || user_has_role(6)) {
            $namespace_options = array();
            $namespace_options[0] = 'Tất cả';
            foreach (_cassiopeia_get_all_namespace() as $key => $value) {
                $namespace_options[$value->id] = $value->title;
            }

            $form['namespace'] = array(
                '#type' => 'select',
                '#title' => 'Namespace',
                '#options' =>  $namespace_options,
                '#required' => TRUE,
                '#default_value' => $utilitie->namespace
            );
        }


        $form['icon_container'] = array(
            '#type' => 'container',
            '#attributes'=>array('class'=>array('form-group'))
        );

        $form['icon_container']['icon'] = array(
            '#title' => 'icon',
            '#type' => 'managed_file',
            '#upload_location' => 'public://golf/utilities/icons/',
            '#required' => TRUE,
            '#attributes'=>array('class'=>array('form-group'))
        );


        if (!empty($form_state['utilitie']->icon)) {
            $form['icon_container']['icon']['#default_value'] = $form_state['utilitie']->icon;
        }

        $form['submit'] = array('#type' => 'submit', '#value' => 'Cập nhật', '#attributes'=>array('class'=>array('btn btn-success')), '#prefix' => '<div class="form-group">', '#suffix' => '</div>',);
    }

    return $form;
}
function cassiopeia_golf_add_utility_delete_form_submit($form, &$form_state) {
    global $user;
    db_delete("utilities")->condition("id",$form_state['utility']->id,"=")->execute();
    drupal_set_message("Đã xóa thành công!");
    $form_state['redirect'] = "/manager/utility";
}
function cassiopeia_golf_add_utilitie_edit_form_validate($form, &$form_state) {
    if(!is_numeric($form_state['values']['price'])) {
        form_set_error('price', 'Giá không hợp lệ', 'error');
    }
}
function cassiopeia_golf_add_utilitie_edit_form_submit($form, &$form_state) {

    global $user;
    if ($form_state['utilitie']->icon != $form_state['values']['icon']) {
        $fid = $form_state['values']['icon'];
        $file = file_load($fid);
        $file->status = FILE_STATUS_PERMANENT;
        file_save($file);
        file_usage_add($file, 'cassiopeia', 'utilitie', $user->uid);


        global $user;
        db_update('utilities') // Table name no longer needs {}
        ->fields(array(
            'title' => $form_state['values']['title'],
            'price' => $form_state['values']['price'],
            'namespace' => !empty($form_state['values']['namespace'])?$form_state['values']['namespace']:$form_state['utilitie']->namespace,
            'icon' => $file->fid,
        ))
            ->condition('id', $form_state['utilitie']->id, '=')
            ->execute();
    }else {
        db_update('utilities') // Table name no longer needs {}
        ->fields(array(
            'title' => $form_state['values']['title'],
            'price' => $form_state['values']['price'],
            'namespace' => !empty($form_state['values']['namespace'])?$form_state['values']['namespace']:$form_state['utilitie']->namespace,
        ))
            ->condition('id', $form_state['utilitie']->id, '=')
            ->execute();
    }
    $form_state['redirect'] = "/manager/utility";
}



function cassiopeia_golf_booking_change_form ($form, &$form_state,$booking) {
    global $language;
    global $user;
    $form['#booking__'] = $booking;
//    print_r($booking);
    $teatime = node_load($booking->tea_times[0]->tea_time_id);
    $_user = user_load($user->uid);
    drupal_add_library('system', 'ui.datepicker');

    $new_golf = FALSE;

    $form = array();
    $form['#data'] = array();

    $form['#prefix'] = '<div id="admin-golf-payment-booking-form">';
    $form['#suffix'] = '</div>';

    $form['#promotion_price'] = 0;

    $golfs = cassiopeia_get_golfs_by_condition(array('condition'=> array('status'=>array('value'=>1, 'operator'=>"="))));
    $golf_options = array();

    foreach ($golfs as $key => $value) {
        $golf_options[$value->nid] = $value->title;
    }

    $form['golf'] = array(
        '#type' => 'select',
        '#title' => 'Sân / zone',
        '#options' => $golf_options,
        '#required' => TRUE,
        '#ajax' => array(
            'callback' => 'cassiopeia_admin_golf_bookings_from_ajax_callback',
            'wrapper' => 'admin-golf-payment-booking-form',
            'method' => 'replace',
            'effect' => 'fade',
        ),
    );


    if (empty($form_state['#data'])) {
        $form_state['#data'] = array();
    }

    if (!empty($form_state['values']['golf'])) {
        if (!empty($form_state['#data']['golf'])) {
            if((int)$form_state['#data']['golf']->nid != (int)$form_state['values']['golf']) {
                $new_golf = TRUE;
                $form_state['#data']['golf'] = node_load($form_state['values']['golf']);
            }
        }else {
            $new_golf = TRUE;
            $form_state['#data']['golf'] = node_load($form_state['values']['golf']);
        }

    }elseif(!empty($teatime)) {

        $golf = node_load($teatime->field_c_t_t_parent['und'][0]['nid']);
        $form['golf']['#default_value'] = $golf->nid;
        $form_state['#data']['golf'] = $golf;

    }
    $form['#data'] = $form_state['#data'];
//    $form['#booking'] = $form_state['#booking'];



    if(!empty($form_state['values']['golf'])) {
        if ($new_golf == TRUE) {
            $form_state['book_tea_times'] =  array();
            $form_state['book_tea_times'][] = 0;
        }else {
            if(empty($form_state['book_tea_times'])) {
                $form_state['book_tea_times'] =  array();
                $form_state['book_tea_times'][] = 0;
            }
        }

        $form['tea_times'] = array(
            '#type' => 'container',
        );

        foreach ($form_state['book_tea_times'] as $key => $value) {

            $form['tea_times']['tea_time_'.($value)] = array(
                '#type' => 'container',
                '#attributes' =>array('class'=> array('form-group edit-tea-time'))
            );

            $form['tea_times']['tea_time_'.($value)]['tea_time_container'] = array(
                '#type' => 'container',
                '#attributes' => array(
                    'class' => array('booking-tea-time-item'),
                ),
            );


            $form['tea_times']['tea_time_'.($value)]['tea_time_container']['pic_up_date_'.($value)] = array(
                '#type' => 'date_popup',
                '#default_value' => date('Y-m-d H:i:s', REQUEST_TIME),
                '#date_timezone' => date_default_timezone(),
                '#date_format' => 'd-m-Y',
                '#date_increment' => 1,
                '#date_year_range' => '0:+3',
//        '#datepicker_options' => array(
//          'minDate' => "0"
//        ),
                '#prefix' => '<div class="tea-time-field-item pic-up-date-field">',
                '#suffix' => '</div>',
                '#required' => TRUE,
                '#ajax' => array(
                    'callback' => 'cassiopeia_admin_golf_bookings_from_ajax_callback',
                    'wrapper' => 'admin-golf-payment-booking-form',
                    'method' => 'replace',
                    'effect' => 'fade',
                ),
            );

            $number_people_options = array(0=>"Chọn",1=>'1', 2=>'2', 3=>'3', 4=>'4');
//            if (!empty($form_state['values']['pic_up_time_'.($value)])) {
//                $number_people_options = array();
//                $tea_time = node_load($form_state['values']['pic_up_time_' . ($value)]);
//                $number_player_ = $tea_time->field_c_t_t_player['und'][0]['value'];
//                $min_player = $tea_time->field_c_t_t_min_player['und'][0]['value'];
//                $max_player = $tea_time->field_c_t_t_max_player['und'][0]['value'];
//                $slots = $max_player - $number_player_;
//                for($i=$min_player;$i<=$slots;$i++){
//                    $number_people_options[$i] = $i;
//                }
//            }
            $form['tea_times']['tea_time_'.($value)]['tea_time_container']['number_people_'.($value)] = array(
                '#title'=> t('Player'),
                '#type' => 'select',
                '#options' => $number_people_options,
                '#prefix' => '<div class="tea-time-field-item number-people-field">',
                '#suffix' => '</div>',
                '#default_value' => 0,
                '#required' => TRUE,
                '#ajax' => array(
                    'callback' => 'cassiopeia_admin_golf_bookings_from_ajax_callback',
                    'wrapper' => 'admin-golf-payment-booking-form',
                    'method' => 'replace',
                    'effect' => 'fade',
                ),
            );

            $number_people_options = array();
            $number_hole_options = array();
            foreach ( _cassiopeia_get_all_hole () as $hole_key => $hole_value ) {
                if (!empty($form['#data']['golf']->field_ctype_golf_hole['und'][0]['value']) && $form['#data']['golf'] ->field_ctype_golf_hole['und'][0]['value'] >= $hole_value->hole) {
                    $number_hole_options[$hole_value->hole] = $hole_value->hole;
                }
            }

            $form['tea_times']['tea_time_'.($value)]['tea_time_container']['number_hole_'.($value)] = array(
                '#title'=> t('Hole'),
                '#type' => 'select',
                '#options' => $number_hole_options,
                '#prefix' => '<div class="tea-time-field-item number-hole-field">',
                '#suffix' => '</div>',
                '#required' => TRUE,
                '#ajax' => array(
                    'callback' => 'cassiopeia_admin_golf_bookings_from_ajax_callback',
                    'wrapper' => 'admin-golf-payment-booking-form',
                    'method' => 'replace',
                    'effect' => 'fade',
                ),
            );



            $pic_up_time_options = array();


            if(!empty($form_state['values']['pic_up_date_'.($value)]) && !empty($form_state['values']['number_hole_'.($value)]) && !empty($form_state['values']['number_people_'.($value)])) {
                $condition = array();

                $condition['condition']['field_c_t_t_parent'] = $form['#data']['golf']->nid;

                $condition['condition']['date'] = array();
                $condition['condition']['date']['value'] = !empty($form_state['values']['pic_up_date_'.($value)])?$form_state['values']['pic_up_date_'.($value)]:date('Y-m-d', REQUEST_TIME);
                $condition['condition']['date']['operator'] =  '=';


                $condition['condition']['field_c_t_t_hole'] = array();
                $condition['condition']['field_c_t_t_hole']['value'] = !empty($form_state['values']['number_hole_'.($value)])?$form_state['values']['number_hole_'.($value)]:array_values($number_hole_options)[0];
                $condition['condition']['field_c_t_t_hole']['operator'] =  '=';


//                $condition['condition']['slot_available'] = array();
//                $condition['condition']['slot_available']['value'] = !empty($form_state['values']['number_people_'.($value)])?$form_state['values']['number_people_'.($value)]:1;
//                $condition['condition']['slot_available']['operator'] =  '>=';


                $condition['condition']['status'] = array();
                $condition['condition']['status']['value'] = 1;
                $condition['condition']['status']['operator'] =  '=';

                $condition['order'] = array(
                    'field_c_t_t_date' => 'DESC',
                    'field_c_t_t_sh' => 'ASC'
                );

                $tea_times = array();
                $result =  _cassiopeia_get_tea_time_details_by_condition($condition);

                $data = cassiopeia_golf_booking_form_to_data($form_state);
                foreach ($form_state['book_tea_times'] as $_key => $_value) {
                    if ($_value == $value) {
                        unset($data[$_value]);
                    }
                }

                $ressult_option= array();
                foreach ($result as $result_key => $result_value) {
                    $check = TRUE;
                    foreach ($data as $data_key => $data_value ) {
                        if ($result_value->nid == $data_value['pic_up_time']) {
                            $check = FALSE;
                        }
                    }
                    if($check) {
                        $ressult_option[] = $result_value;
                    }

                    if (!empty($tea_times[$result_value->field_c_t_t_type['und'][0]['value']])) {
                        if ($check) {
                            $tea_times[$result_value->field_c_t_t_type['und'][0]['value']]['values'][] = $result_value;
                        }

                    }else {
                        $tea_times[$result_value->field_c_t_t_type['und'][0]['value']] = array();
                        $time_frame = taxonomy_term_load($result_value->field_c_t_t_type['und'][0]['value']);
                        $tea_times[$result_value->field_c_t_t_type['und'][0]['value']]['name'] = $time_frame->name;
                        $tea_times[$result_value->field_c_t_t_type['und'][0]['value']]['values'] =  array();
                        if ($check) {
                            $tea_times[$result_value->field_c_t_t_type['und'][0]['value']]['values'][] =  $result_value;
                        }
                    }

                }
                foreach ($tea_times as $tea_time_key => $tea_time_value) {
                    $pic_up_time_options[$tea_time_value['name']] = array();
                    foreach ($tea_time_value['values'] as $tea_time_value_key => $tea_time_value_value) {
                        if(user_has_role(4,$_user)){
                            $pic_up_time_options[$tea_time_value['name']][$tea_time_value_value->nid] = date('H:i', (int)$tea_time_value_value->field_c_t_t_sh['und'][0]['value']) ;
                        }else{
                            if($tea_time_value_value->field_c_t_t_price['und'][0]['value'] < $tea_time_value_value->field_c_t_t_a_price['und'][0]['value']){
                                $_price = $tea_time_value_value->field_c_t_t_price['und'][0]['value'];
                            }else{
                                $_price = $tea_time_value_value->field_c_t_t_a_price['und'][0]['value'];
                            }
                            $pic_up_time_options[$tea_time_value['name']][$tea_time_value_value->nid] = date('H:i', (int)$tea_time_value_value->field_c_t_t_sh['und'][0]['value']) .' - '. number_format($_price, 0, ',','.').'đ';
                        }

                    }
                }
            }


            $form['tea_times']['tea_time_'.($value)]['tea_time_container']['pic_up_time_'.($value)] = array(
                '#title'=> t('Time'),
                '#type' => 'select',
                '#options' => $pic_up_time_options,
                '#prefix' => '<div class="tea-time-field-item pic-up-time-field">',
                '#suffix' => '</div>',
                '#element_validate'=> array('booking_form_pic_up_time_validate'),
                '#required' => TRUE,
                '#ajax' => array(
                    'callback' => 'cassiopeia_admin_golf_bookings_from_ajax_callback',
                    'wrapper' => 'admin-golf-payment-booking-form',
                    'method' => 'replace',
                    'effect' => 'fade',
                ),
            );

            if(!empty($form_state['values']['pic_up_time_'.($value)])) {
                $tea_time = node_load($form_state['values']['pic_up_time_'.($value)]);
                if (!empty($tea_time->field_c_t_t_utility['und']) || !empty($tea_time->field_c_t_t_e_utility[$language->language][0]['value'])) {

                    $form['tea_times']['tea_time_'.($value)]['default_utilities'] = array(
                        '#type' => 'container',
                        '#prefix' => '<div class="form-group"> <label>Giá bao gồm</label> <div class="row">',
                        '#suffix' => '</div></div>',
                        '#attributes' =>array('class'=> array('form-group'))
                    );

                    if (!empty($tea_time->field_c_t_t_utility['und'])){
                        foreach ($tea_time->field_c_t_t_utility['und'] as $default_utilitie_key => $default_utilitie_value) {
                            $utilitie = cassiopeia_get_golf_utility_by_id($default_utilitie_value['value']);
                            if(!empty($utilitie)) {
                                $form['tea_times']['tea_time_'.($value)]['default_utilities']['default_utilitie_'.$value.'_'.$default_utilitie_key] = array(
                                    '#markup' => '<div class="col-md-6 form-group">- '.$utilitie->title.'</div>',
                                );
                            }

                        }
                    }

                    if (!empty($tea_time->field_c_t_t_e_utility[$language->language][0]['value'])) {
                        $form['tea_times']['tea_time_'.($value)]['default_utilities']['default_eutilitie_'.$value] = array(
                            '#markup' => '<div class="col-md-6 form-group">'.$tea_time->field_c_t_t_e_utility[$language->language][0]['value'].'</div>',
                        );
                    }

                }
            }



            $form['tea_times']['tea_time_'.($value)]['players'] = array(
                '#type' => 'container',
                '#attributes' =>array('class'=> array('form-group'))
            );

            for ($player_i =0; $player_i < $form_state['values']['number_people_'.($value)]; $player_i++) {

                $form['tea_times']['tea_time_'.($value)]['players']['player-item'.$player_i] = array(
                    '#type' => 'container',
                    '#prefix' => '<div class="form-group"> <label>Người chơi '.($player_i +1).'</label> <div>',
                    '#suffix' => '</div></div>',
                    '#attributes' =>array('class'=> array('form-group'))
                );

                $form['tea_times']['tea_time_'.($value)]['players']['player-item'.$player_i]['player_name_'.$value.'_'.$player_i.'_autocomplete'] = array(
                    '#type' => 'textfield',
                    '#size' => 60,
                    '#maxlength' => 128,
                    '#attributes' =>array('placeholder' => 'Tìm kiếm user'),
                    '#autocomplete_path' => 'manager/autocomplete/user',
                    '#ajax' => array(
                        'callback' => 'cassiopeia_admin_golf_bookings_from_ajax_callback',
                        'wrapper' => 'admin-golf-payment-booking-form',
                        'method' => 'replace',
                        'effect' => 'fade',
                    ),
                );

                if(!empty($form_state['values']['player_name_'.$value.'_'.$player_i.'_autocomplete'])) {
                }else {
                    $form['tea_times']['tea_time_'.($value)]['players']['player-item'.$player_i]['player_name_'.$value.'_'.$player_i] = array(
                        '#type' => 'textfield',
                        '#size' => 60,
                        '#maxlength' => 128,
                        '#required' => TRUE,
                        '#attributes' =>array('placeholder' => 'Họ tên')
                    );
                    $form['tea_times']['tea_time_'.($value)]['players']['player-item'.$player_i]['player_mail_'.$value.'_'.$player_i] = array(
                        '#type' => 'textfield',
                        '#size' => 60,
                        '#maxlength' => 128,
//<!--'#required' => TRUE,-->
                        '#attributes' =>array('placeholder' => 'Email')
                    );
                    $form['tea_times']['tea_time_'.($value)]['players']['player-item'.$player_i]['player_phone_'.$value.'_'.$player_i] = array(
                        '#type' => 'textfield',
                        '#size' => 60,
                        '#maxlength' => 128,
//<!--'#required' => TRUE,-->
                        '#attributes' =>array('placeholder' => 'Số điện thoại')
                    );
                }


            }

            $form['tea_times']['tea_time_'.($value)]['extend_utilities'] = array(
                '#type' => 'container',
                '#prefix' => '<div class="edit-extend-utilities"> <label>'.t("Add utility").'</label><div>',
                '#suffix' => '</div></div>',
            );

            foreach ($form_state['#data']['golf']->field_ctype_utility['und'] as $tea_time_extend_utilitie_key => $tea_time_extend_utilitie_value) {
                $utilitie = cassiopeia_get_golf_utility_by_id($tea_time_extend_utilitie_value['value']);
                if(!empty($utilitie)) {
                    $form['tea_times']['tea_time_'.($value)]['extend_utilities']['extend_utiliti_'.$value.'_'.$tea_time_extend_utilitie_value['value']] = array(
                        '#title' =>$utilitie->title,
                        '#type' => 'textfield',
                        '#maxlength' => 128,
                        '#attributes' =>array('placeholder' => 'số lượng')
                    );
                }
            }
        }

        $form['tea_times']['tea_time_add_more'] = array(
            '#type' => 'submit',
            '#submit' => array('cassiopeia_admin_golf_bookings_from_add_more'),
            '#value' => 'tea_time_add_more',
            '#text' => t('Add tee times'),
            '#attributes' => array(
                'class' => array('btn btn-default'),
                'type' => 'button',
            ),
            '#prefix' => '<div class="add-more-field">',
            '#suffix' => '</div>',

            '#ajax' => array(
                'callback' => 'cassiopeia_admin_golf_bookings_from_ajax_callback',
                'wrapper' => 'admin-golf-payment-booking-form',
                'method' => 'replace',
                'effect' => 'fade',
            ),
        );
    }
    elseif(!empty($teatime)) {
//    todo
        $form_state['book_tea_times'] =  array();
        foreach ($booking->tea_times as $key => $tea_time){
            $form_state['book_tea_times'][] = $key;
        }


        $form['tea_times'] = array(
            '#type' => 'container',
        );

        foreach ($form_state['book_tea_times'] as $key => $value) {
            $teatime = node_load($booking->tea_times[$value]->tea_time_id);
            $form['tea_times']['tea_time_'.($value)] = array(
                '#type' => 'container',
                '#attributes' =>array('class'=> array('form-group edit-tea-time'))
            );

            $form['tea_times']['tea_time_'.($value)]['tea_time_container'] = array(
                '#type' => 'container',
                '#attributes' => array(
                    'class' => array('booking-tea-time-item'),
                ),
            );

            $form['tea_times']['tea_time_'.($value)]['tea_time_container']['pic_up_date_'.($value)] = array(
                '#type' => 'date_popup',
                '#default_value' => $teatime->field_c_t_t_date['und'][0]['value'],
                '#date_timezone' => date_default_timezone(),
                '#date_format' => 'd-m-Y',
                '#date_increment' => 1,
                '#date_year_range' => '0:+3',
                '#prefix' => '<div class="tea-time-field-item pic-up-date-field">',
                '#suffix' => '</div>',
                '#required' => TRUE,
                '#ajax' => array(
                    'callback' => 'cassiopeia_admin_golf_bookings_from_ajax_callback',
                    'wrapper' => 'admin-golf-payment-booking-form',
                    'method' => 'replace',
                    'effect' => 'fade',
                ),
            );

            $number_people_options = array(1=>'1', 2=>'2', 3=>'3', 4=>'4');
            $form['tea_times']['tea_time_'.($value)]['tea_time_container']['number_people_'.($value)] = array(
                '#title'=> t('Player'),
                '#type' => 'select',
                '#options' => $number_people_options,
                '#prefix' => '<div class="tea-time-field-item number-people-field">',
                '#suffix' => '</div>',
                '#default_value' => count($booking->tea_times[$value]->players),
                '#required' => TRUE,
                '#ajax' => array(
                    'callback' => 'cassiopeia_admin_golf_bookings_from_ajax_callback',
                    'wrapper' => 'admin-golf-payment-booking-form',
                    'method' => 'replace',
                    'effect' => 'fade',
                ),
            );

            $number_hole_options = array();
            foreach ( _cassiopeia_get_all_hole () as $hole_key => $hole_value ) {
                if (!empty($form['#data']['golf']->field_ctype_golf_hole['und'][0]['value']) && $form['#data']['golf'] ->field_ctype_golf_hole['und'][0]['value'] >= $hole_value->hole) {
                    $number_hole_options[$hole_value->hole] = $hole_value->hole;
                }
            }

            $form['tea_times']['tea_time_'.($value)]['tea_time_container']['number_hole_'.($value)] = array(
                '#title'=> t('Hole'),
                '#type' => 'select',
                '#options' => $number_hole_options,
                '#prefix' => '<div class="tea-time-field-item number-hole-field">',
                '#suffix' => '</div>',
                '#default_value' => $teatime->field_c_t_t_hole['und'][0]['value'],
                '#required' => TRUE,
                '#ajax' => array(
                    'callback' => 'cassiopeia_admin_golf_bookings_from_ajax_callback',
                    'wrapper' => 'admin-golf-payment-booking-form',
                    'method' => 'replace',
                    'effect' => 'fade',
                ),
            );



            $pic_up_time_options = array();

            $condition = array();

            $condition['condition']['field_c_t_t_parent'] = $form['#data']['golf']->nid;

            $condition['condition']['date'] = array();
            $condition['condition']['date']['value'] = $teatime->field_c_t_t_date['und'][0]['value'];
            $condition['condition']['date']['operator'] =  '=';


            $condition['condition']['field_c_t_t_hole'] = array();
            $condition['condition']['field_c_t_t_hole']['value'] = $teatime->field_c_t_t_hole['und'][0]['value'];
            $condition['condition']['field_c_t_t_hole']['operator'] =  '=';


//            $condition['condition']['slot_available'] = array();
//            $condition['condition']['slot_available']['value'] = 1;
//            $condition['condition']['slot_available']['operator'] =  '>=';


            $condition['condition']['status'] = array();
            $condition['condition']['status']['value'] = 1;
            $condition['condition']['status']['operator'] =  '=';

            $condition['order'] = array(
                'field_c_t_t_date' => 'DESC',
                'field_c_t_t_sh' => 'ASC'
            );

            $tea_times = array();
            $result =  _cassiopeia_get_tea_time_details_by_condition($condition);

            $data = cassiopeia_golf_booking_form_to_data($form_state);
            foreach ($form_state['book_tea_times'] as $_key => $_value) {
                if ($_value == $value) {
                    unset($data[$_value]);
                }
            }

            $ressult_option= array();
            foreach ($result as $result_key => $result_value) {
                $check = TRUE;
                foreach ($data as $data_key => $data_value ) {
                    if ($result_value->nid == $data_value['pic_up_time']) {
                        $check = FALSE;
                    }
                }
                if($check) {
                    $ressult_option[] = $result_value;
                }

                if (!empty($tea_times[$result_value->field_c_t_t_type['und'][0]['value']])) {
                    if ($check) {
                        $tea_times[$result_value->field_c_t_t_type['und'][0]['value']]['values'][] = $result_value;
                    }

                }else {
                    $tea_times[$result_value->field_c_t_t_type['und'][0]['value']] = array();
                    $time_frame = taxonomy_term_load($result_value->field_c_t_t_type['und'][0]['value']);
                    $tea_times[$result_value->field_c_t_t_type['und'][0]['value']]['name'] = $time_frame->name;
                    $tea_times[$result_value->field_c_t_t_type['und'][0]['value']]['values'] =  array();
                    if ($check) {
                        $tea_times[$result_value->field_c_t_t_type['und'][0]['value']]['values'][] =  $result_value;
                    }
                }

            }
            foreach ($tea_times as $tea_time_key => $tea_time_value) {
                $pic_up_time_options[$tea_time_value['name']] = array();
                foreach ($tea_time_value['values'] as $tea_time_value_key => $tea_time_value_value) {
                    if(user_has_role(4,$_user)){
                        $pic_up_time_options[$tea_time_value['name']][$tea_time_value_value->nid] = date('H:i', (int)$tea_time_value_value->field_c_t_t_sh['und'][0]['value']);
                    }else{
                        if($tea_time_value_value->field_c_t_t_price['und'][0]['value'] < $tea_time_value_value->field_c_t_t_a_price['und'][0]['value']){
                            $_price = $tea_time_value_value->field_c_t_t_price['und'][0]['value'];
                        }else{
                            $_price = $tea_time_value_value->field_c_t_t_a_price['und'][0]['value'];
                        }
                        $pic_up_time_options[$tea_time_value['name']][$tea_time_value_value->nid] = date('H:i', (int)$tea_time_value_value->field_c_t_t_sh['und'][0]['value']) .' - '. number_format($_price, 0, ',','.').'đ';
                    }

                }
            }


            $form['tea_times']['tea_time_'.($value)]['tea_time_container']['pic_up_time_'.($value)] = array(
                '#title'=> 'Khung giờ',
                '#type' => 'select',
                '#options' => $pic_up_time_options,
                '#prefix' => '<div class="tea-time-field-item pic-up-time-field">',
                '#suffix' => '</div>',
                '#element_validate'=> array('booking_form_pic_up_time_validate'),
                '#required' => TRUE,
                '#default_value' => $teatime->nid,
                '#ajax' => array(
                    'callback' => 'cassiopeia_admin_golf_bookings_from_ajax_callback',
                    'wrapper' => 'admin-golf-payment-booking-form',
                    'method' => 'replace',
                    'effect' => 'fade',
                ),
            );

            if (!empty($teatime->field_c_t_t_utility['und']) || !empty($teatime->field_c_t_t_e_utility[$language->language][0]['value'])) {

                $form['tea_times']['tea_time_'.($value)]['default_utilities'] = array(
                    '#type' => 'container',
                    '#prefix' => '<div class="form-group"> <label>Giá bao gồm</label> <div class="row">',
                    '#suffix' => '</div></div>',
                    '#attributes' =>array('class'=> array('form-group'))
                );

                if(!empty($teatime->field_c_t_t_utility['und'])) {
                    foreach ($teatime->field_c_t_t_utility['und'] as $default_utilitie_key => $default_utilitie_value) {
                        $utilitie = cassiopeia_get_golf_utility_by_id($default_utilitie_value['value']);
                        if(!empty($utilitie)) {
                            $form['tea_times']['tea_time_'.($value)]['default_utilities']['default_utilitie_'.$value.'_'.$default_utilitie_key] = array(
                                '#markup' => '<div class="col-md-6 form-group">- '.$utilitie->title.'</div>',
                            );
                        }

                    }
                }

                if(!empty($teatime->field_c_t_t_e_utility[$language->language][0]['value'])) {
                    $form['tea_times']['tea_time_'.($value)]['default_utilities']['default_eutilitie_'.$value] = array(
                        '#markup' => '<div class="col-md-12 form-group">'.$teatime->field_c_t_t_e_utility[$language->language][0]['value'].'</div>',
                    );
                }

            }



            $form['tea_times']['tea_time_'.($value)]['players'] = array(
                '#type' => 'container',
                '#attributes' =>array('class'=> array('form-group'))
            );
//            print_r($booking);
            for ($player_i =0; $player_i < count($booking->tea_times[$value]->players); $player_i++) {

                $form['tea_times']['tea_time_'.($value)]['players']['player-item'.$player_i] = array(
                    '#type' => 'container',
                    '#prefix' => '<div class="form-group"> <label>Người chơi '.($player_i +1).'</label> <div>',
                    '#suffix' => '</div></div>',
                    '#attributes' =>array('class'=> array('form-group'))
                );

                $form['tea_times']['tea_time_'.($value)]['players']['player-item'.$player_i]['player_name_'.$value.'_'.$player_i.'_autocomplete'] = array(
                    '#type' => 'textfield',
                    '#size' => 60,
                    '#maxlength' => 128,
                    '#attributes' =>array('placeholder' => 'Tìm kiếm user'),
                    '#autocomplete_path' => 'manager/autocomplete/user',
                    '#ajax' => array(
                        'callback' => 'cassiopeia_admin_golf_bookings_from_ajax_callback',
                        'wrapper' => 'admin-golf-payment-booking-form',
                        'method' => 'replace',
                        'effect' => 'fade',
                    ),
                );

                if(!empty($form_state['values']['player_name_'.$value.'_'.$player_i.'_autocomplete'])) {

                }else {
                    $form['tea_times']['tea_time_'.($value)]['players']['player-item'.$player_i]['player_name_'.$value.'_'.$player_i] = array(
                        '#type' => 'textfield',
                        '#size' => 60,
                        '#maxlength' => 128,
                        '#required' => TRUE,
                        '#attributes' =>array('placeholder' => 'Họ tên'),
                        '#default_value' => $booking->tea_times[$value]->players[$player_i]->player_full_name
                    );
                    $form['tea_times']['tea_time_'.($value)]['players']['player-item'.$player_i]['player_mail_'.$value.'_'.$player_i] = array(
                        '#type' => 'textfield',
                        '#size' => 60,
                        '#maxlength' => 128,
//<!--'#required' => TRUE,-->
                        '#attributes' =>array('placeholder' => 'Email'),
                        '#default_value' => $booking->tea_times[$value]->players[$player_i]->player_email
                    );
                    $form['tea_times']['tea_time_'.($value)]['players']['player-item'.$player_i]['player_phone_'.$value.'_'.$player_i] = array(
                        '#type' => 'textfield',
                        '#size' => 60,
                        '#maxlength' => 128,
//<!--'#required' => TRUE,-->
                        '#attributes' =>array('placeholder' => 'Số điện thoại'),
                        '#default_value' => $booking->tea_times[$value]->players[$player_i]->player_phone_number
                    );
                }


            }
            if(!empty($form_state['#data']['golf']->field_ctype_utility['und'])){
                $form['tea_times']['tea_time_'.($value)]['extend_utilities'] = array(
                    '#type' => 'container',
                    '#prefix' => '<div class="edit-extend-utilities"> <label>'.t("Add utility").'</label><div>',
                    '#suffix' => '</div></div>',
                );

                foreach ($form_state['#data']['golf']->field_ctype_utility['und'] as $tea_time_extend_utilitie_key => $tea_time_extend_utilitie_value) {
                    $utilitie = cassiopeia_get_golf_utility_by_id($tea_time_extend_utilitie_value['value']);
                    if (!empty($utilitie)) {
                        $form['tea_times']['tea_time_'.($value)]['extend_utilities']['extend_utiliti_'.$value.'_'.$tea_time_extend_utilitie_value['value']] = array(
                            '#title' =>$utilitie->title,
                            '#type' => 'textfield',
                            '#maxlength' => 128,
                            '#attributes' =>array('placeholder' => 'số lượng'),
                            '#default_value' => empty($booking->tea_times[$value]->utilities[$tea_time_extend_utilitie_key]->quantity)?"":$booking->tea_times[$value]->utilities[$tea_time_extend_utilitie_key]->quantity,
                        );
                    }

                }
            }

        }

        $form['tea_times']['tea_time_add_more'] = array(
            '#type' => 'submit',
            '#submit' => array('cassiopeia_admin_golf_bookings_from_add_more'),
            '#value' => 'tea_time_add_more',
            '#text' => t('Add tee times'),
            '#attributes' => array(
                'class' => array('btn btn-default'),
                'type' => 'button',
            ),
            '#prefix' => '<div class="add-more-field">',
            '#suffix' => '</div>',

            '#ajax' => array(
                'callback' => 'cassiopeia_admin_golf_bookings_from_ajax_callback',
                'wrapper' => 'admin-golf-payment-booking-form',
                'method' => 'replace',
                'effect' => 'fade',
            ),
        );

    }

    $form['invoice'] = array(
        '#title'=> 'Yêu cầu xuất hóa đơn',
        '#type' => 'checkbox',
        '#checkmark' =>TRUE,
        '#default_value' => empty($booking->invoice)?"":$booking->invoice,
    );

    $form['vietinbank'] = array(
        '#title'=> 'Vietinbank Signature  - Hoàn 500,000 đ',
        '#type' => 'checkbox',
        '#checkmark' =>TRUE
    );

    $form['promotion'] = array(
        '#type' => 'textfield',
        '#size' => 60,
        '#maxlength' => 128,
        '#ajax' => array(
            'callback' => 'cassiopeia_admin_golf_bookings_from_ajax_callback',
            'wrapper' => 'admin-golf-payment-booking-form',
            'method' => 'replace',
            'effect' => 'fade',
        ),
        '#title' => 'Mã giảm giá',
        '#default_value' => empty($booking->promotion_code)?"":$booking->promotion_code
    );
    $form['booking__code'] = array(
        '#type' => 'textfield',
        '#size' => 60,
        '#maxlength' => 128,
        '#title' => 'code',
        '#default_value' => empty($booking->code)?"":$booking->code
    );

    $form['submit'] = array(
        '#type' => 'submit',
        '#value' => 'Sửa đơn hàng',
    );
    $form['#theme'][] = 'cassiopeia_admin_golf_booking_change_form';
    return $form;
}

function cassiopeia_golf_booking_change_form_submit($form,&$form_state){
    {
        $booking = cassiopeia_get_golf_booking_by_code($form_state['values']['booking__code']);
        foreach($booking->tea_times as $value){
            $tee = node_load($value->tea_time_id);
            $tee->field_c_t_t_player['und'][0]['value'] = (int)$tee->field_c_t_t_player['und'][0]['value'] - count($value->players);
            node_save($tee);
        }
//        var_dump($booking);die;
        $contact_user = null;
        global $user;
        $_user = user_load($user->uid);
        $price_payment_free = variable_get('payment_free');
        $price_payment_free_vietinbank_signature = variable_get('payment_fee_vietinbank_signature');
        $price_payment_free_card = variable_get('payment_fee_card');
        $data = array();
        $data['golf'] =  $form_state['#data']['golf'];
//        print_r($booking);
//        db_update("promotion")->fields(array("status"=>0))->condition("code","4563460663325","=")->execute();
//        die;
        $promotion = null;
        if(!empty($booking->promotion_code)){
            if(!empty($form_state['values']['promotion']) && $booking->promotion_code!=$form_state['values']['promotion']) {
                $promotion =  cassiopeia_get_promotion_card_by_code($form_state['values']['promotion'],1,$data['golf']->nid);
                if(!empty($promotion)){
                    if ($promotion->status != 0) {
                        $promotion = null;
                    }
                    db_update("promotion")->fields(array("status"=>1))->condition("code",$promotion->code,"=")->execute();
                }
//                print($form_state['values']['promotion']."/");
//                print($booking->promotion_code);die;
                db_update("promotion")->fields(array("status"=>0))->condition("code",$booking->promotion_code,"=")->execute();
//                die;
            }else{
                $promotion = $booking->promotion_code;
            }

        }else{
            if(!empty($form_state['values']['promotion'])) {
                $promotion =  cassiopeia_get_promotion_card_by_code($form_state['values']['promotion'],1,$data['golf']->nid);
                if(!empty($promotion)){
                    if ($promotion->status != 0) {
                        $promotion = null;
                    }
                }

            }
        }






        $data['booking'] = array(
            'tea_times' => array(),
            'promotion'=>  $promotion,
            'payment_method' => 1,
            'payment_option' => null,
            'promotion_amount' => 0,
            'booking_fee'=>0,
            'card_transaction_fee'=>0,
            'invoice' => !empty($form_state['values']['invoice']) ? $form_state['values']['invoice']:0,
            'contact' => array(
                'contact_name' => '',
                'contact_mail' => '',
                'contact_phone' => '',
                'contact_address' => '',
            ),
            'totals' => 0,
            'created' => REQUEST_TIME,
        );

        foreach ($form_state['book_tea_times'] as $key => $value) {
            $tmp = array();
            $tmp['tea_time'] = node_load($form_state['values']['pic_up_time_'.$value]);
            $tmp['players'] = array();
            $tmp['utilities'] = array();
            $data['booking']['tea_times'][$value] =  $tmp;
        }

        foreach ($form_state['book_tea_times'] as $key => $value) {
            if(user_has_role(4,$_user)){
                $data['booking']['totals'] = $data['booking']['totals']  + $form_state['values']['number_people_'.$value]*$data['booking']['tea_times'][$value]['tea_time']->field_c_t_t_price['und'][0]['value'];
            }else{
                $data['booking']['totals'] = $data['booking']['totals']  + $form_state['values']['number_people_'.$value]*$data['booking']['tea_times'][$value]['tea_time']->field_c_t_t_a_price['und'][0]['value'];
            }

            $players = $form_state['values']['number_people_'.$value];
            for ($i = 0; $i < $form_state['values']['number_people_'.$value]; $i++ ) {
                $data['booking']['tea_times'][$value]['players'][$i] = array();

                if (!empty($form_state['values']['player_name_'.$value.'_'.$i.'_autocomplete'])) {
                    $matches = null;
                    preg_match('/\[uid:(.*)\]/', $form_state['values']['player_name_'.$value.'_'.$i.'_autocomplete'], $matches);
                    if(isset($matches[1]) && is_numeric($matches[1])) {
                        $players = $players -1;
                        $_player = user_load($matches[1]);
                        $data['booking']['tea_times'][$value]['players'][$i]['player_full_name'] =  $_player->field_account_full_name['und'][0]['value'];
                        $data['booking']['tea_times'][$value]['players'][$i]['player_email'] =  $_player->mail;
                        $data['booking']['tea_times'][$value]['players'][$i]['player_phonenumber'] =  $_player->field_account_phone['und'][0]['value'];
                    }
                }else {
                    $data['booking']['tea_times'][$value]['players'][$i]['player_full_name'] =  $form_state['values']['player_name_'.$value.'_'.$i];
                    $data['booking']['tea_times'][$value]['players'][$i]['player_email'] =  $form_state['values']['player_mail_'.$value.'_'.$i];
                    $data['booking']['tea_times'][$value]['players'][$i]['player_phonenumber'] =  $form_state['values']['player_phone_'.$value.'_'.$i];
                }
            }

            $data['booking']['booking_fee'] = $data['booking']['booking_fee'] +  $players*$price_payment_free;
            if(!empty($data['golf']->field_ctype_utility['und'])){
                foreach ($data['golf']->field_ctype_utility['und'] as $utility_key => $utility_value) {
                    if(!empty($form_state['values']['extend_utiliti_'.$value.'_'.$utility_value['value']])) {
                        $utility =  cassiopeia_get_golf_utility_by_id($utility_value['value']);

                        if(!empty($utility)) {
                            $data['booking']['tea_times'][$value]['utilities'][] = array(
                                'utility' => $utility,
                                'quantity' => $form_state['values']['extend_utiliti_'.$value.'_'.$utility_value['value']],
                                'price' => $utility->price
                            );
                            $data['booking']['totals']  = $data['booking']['totals']  + $utility->price*$form_state['values']['extend_utiliti_'.$value.'_'.$utility_value['value']];
                        }

                    }

                }
            }

        }

        if(!empty($promotion) ) {
            if($promotion->status == 0){
                if ($promotion->amount_type == 0) {
                    $data['booking']['promotion_amount'] = $promotion->amount;
                }else {
                    $data['booking']['promotion_amount'] =  $promotion->amount*$data['booking']['totals']/100;
                }
            }
        }

        $data['booking']['totals'] = $data['booking']['totals'] + $data['booking']['booking_fee'] - $data['booking']['promotion_amount'] ;

        $validate = TRUE;
        $error = '';
//        print_r($data);die;
        foreach ($data['booking']['tea_times'] as $key => $value) {
            if (((int)$value['tea_time']->field_c_t_t_player['und'][0]['value'] + count($value['players'])) > (int)$value['tea_time']->field_c_t_t_max_player['und'][0]['value']) {
                $validate =  FALSE;
                $error .= 'Tee time '. date('d/m/Y H:i', $value['tea_time']->field_c_t_t_sh['und'][0]['value']) . ' đã đủ người chơi. </br>';
            }
        }

        if($validate) {

            $transaction = db_transaction();
            try {

                $query = db_select('golf_booking', 'golf_booking')
                    ->fields('golf_booking')
                    ->execute();
                $num = $query->rowCount();

                $code = $form_state['values']['booking__code'];

                db_update('golf_booking') // Table name no longer needs {}
                ->fields(array(
//                    'code' => $code,
//                    'uid' => !empty($contact_user->uid)?$contact_user->uid:0,
//                    'contact_name' => $data['booking']['contact']['contact_name'] ,
//                    'contact_mail' => $data['booking']['contact']['contact_mail'] ,
//                    'contact_phone' => $data['booking']['contact']['contact_phone'] ,
//                    'contact_address' => $data['booking']['contact']['contact_address'] ,
                    'payment_method' => $data['booking']['payment_method'],
                    'payment_option' => $data['booking']['payment_option'],
                    'golfId' => $data['golf']->nid,
                    'booking_fee' => $data['booking']['booking_fee'],
                    'card_transaction_fee' => $data['booking']['card_transaction_fee'],
                    'promotion_code' => !empty($data['booking']['promotion']->code)?$data['booking']['promotion']->code:'',
                    'promotion_price' => $data['booking']['promotion_amount'],
                    'invoice' => $data['booking']['invoice'],
                    'totals' => $data['booking']['totals'],
                    'status' => 1,
                    'created' => REQUEST_TIME,
                ))->condition("code",$code)
                    ->execute();

                foreach ($data['booking']['tea_times'] as $key => $value) {
//                        print_r($value['tea_time']);die;

                    if(!empty($booking->tea_times[$key]->id)){
                        db_delete('golf_booking_player') // Table name no longer needs {}
                        ->condition("teaTimeId",$booking->tea_times[$key]->id)
                            ->execute();
                    }
                    $tea_time_utilitie = '';
                    if(!empty($value['tea_time']->field_c_t_t_utility['und'])) {
                        foreach ($value['tea_time']->field_c_t_t_utility['und'] as $field_c_t_t_utility_key => $field_c_t_t_utility_value) {
                            if (!empty($tea_time_utilitie)) {
                                $tea_time_utilitie = $tea_time_utilitie . ',' .$field_c_t_t_utility_value['value'];
                            }else {
                                $tea_time_utilitie = $field_c_t_t_utility_value['value'];
                            }
                        }

                    }
                    if(user_has_role(4,$_user)){
                        $b_price = $value['tea_time']->field_c_t_t_price['und'][0]['value'];
                    }else{
                        if($value['tea_time']->field_c_t_t_price['und'][0]['value'] < $value['tea_time']->field_c_t_t_a_price['und'][0]['value']){
                            $_price = $value['tea_time']->field_c_t_t_price['und'][0]['value'];
                        }else{
                            $_price = $value['tea_time']->field_c_t_t_a_price['und'][0]['value'];
                        }
                        $b_price = $_price;
                    }
                    if(!empty($booking->tea_times[$key]->id)){
                        $result = db_update('golf_booking_tea_time') // Table name no longer needs {}
                        ->fields(array(
//                        'code' => $code,
                            'tea_time_price' => $b_price,
                            'tea_time_start' => $value['tea_time']->field_c_t_t_sh['und'][0]['value'],
                            'tea_time_date' => strtotime ($value['tea_time']->field_c_t_t_date['und'][0]['value']),
                            'tea_time_id' => $value['tea_time']->nid,
                            'tea_time_utilitie' => $tea_time_utilitie,
                            'tea_time_hole' => $value['tea_time']->field_c_t_t_hole['und'][0]['value'],
                        ))->condition("id",$booking->tea_times[$key]->id)
                            ->execute();
                        foreach ($value['players'] as $_player_key => $_player_value) {
//                            if(!empty($booking->tea_times[$key]->players[$_player_key]->id)){
//                                db_update('golf_booking_player') // Table name no longer needs {}
//                                ->fields(array(
//                                    'player_full_name' => $_player_value['player_full_name'] ,
//                                    'player_email' => $_player_value['player_email'],
//                                    'player_phone_number' => $_player_value['player_phonenumber'],
//                                    'player_uid' => !empty($_player_value['player_uid'])?$_player_value['player_uid']:0,
////                            'teaTimeId' => $tea_time_id
//                                ))->condition("id",$booking->tea_times[$key]->players[$_player_key]->id)
//                                    ->execute();
//                            }else{
                            db_insert('golf_booking_player') // Table name no longer needs {}
                            ->fields(array(
                                'player_full_name' => $_player_value['player_full_name'] ,
                                'player_email' => $_player_value['player_email'],
                                'player_phone_number' => $_player_value['player_phonenumber'],
                                'player_uid' => !empty($_player_value['player_uid'])?$_player_value['player_uid']:0,
                                'teaTimeId' => $booking->tea_times[$key]->id
                            ))
                                ->execute();
//                            }
                        }
                        foreach ($value['utilities'] as $_utilitie_key => $_utilitie_value) {
                            if(!empty($booking->tea_times[$key]->utilities[$_utilitie_key]->id)){
                                db_update('golf_booking_utilitie') // Table name no longer needs {}
                                ->fields(array(
                                    'utilitie_price' => $_utilitie_value['price'],
                                    'utilitie_name' => $_utilitie_value['utility']->title,
                                    'quantity'=>$_utilitie_value['quantity'],
//                            'teaTimeId' => $tea_time_id
                                ))->condition("id",$booking->tea_times[$key]->utilities[$_utilitie_key]->id)
                                    ->execute();
                            }else{
                                db_insert('golf_booking_utilitie') // Table name no longer needs {}
                                ->fields(array(
                                    'utilitie_price' => $_utilitie_value['price'],
                                    'utilitie_name' => $_utilitie_value['utility']->title,
                                    'quantity'=>$_utilitie_value['quantity'],
                                    'teaTimeId' => $booking->tea_times[$key]->id
                                ))
                                    ->execute();
                            }

                        }
                    }else{
                        $tea_time_id = db_insert('golf_booking_tea_time') // Table name no longer needs {}
                        ->fields(array(
                            'code' => $code,
                            'tea_time_price' => $b_price,
                            'tea_time_start' => $value['tea_time']->field_c_t_t_sh['und'][0]['value'],
                            'tea_time_date' => strtotime ($value['tea_time']->field_c_t_t_date['und'][0]['value']),
                            'tea_time_id' => $value['tea_time']->nid,
                            'tea_time_utilitie' => $tea_time_utilitie,
                            'tea_time_hole' => $value['tea_time']->field_c_t_t_hole['und'][0]['value'],
                        ))
                            ->execute();
                        foreach ($value['players'] as $_player_key => $_player_value) {
//                            if(!empty($booking->tea_times[$key]->players[$_player_key]->id)){
//                                db_update('golf_booking_player') // Table name no longer needs {}
//                                ->fields(array(
//                                    'player_full_name' => $_player_value['player_full_name'] ,
//                                    'player_email' => $_player_value['player_email'],
//                                    'player_phone_number' => $_player_value['player_phonenumber'],
//                                    'player_uid' => !empty($_player_value['player_uid'])?$_player_value['player_uid']:0,
////                            'teaTimeId' => $tea_time_id
//                                ))->condition("id",$booking->tea_times[$key]->players[$_player_key]->id)
//                                    ->execute();
//                            }else{
                            db_insert('golf_booking_player') // Table name no longer needs {}
                            ->fields(array(
                                'player_full_name' => $_player_value['player_full_name'] ,
                                'player_email' => $_player_value['player_email'],
                                'player_phone_number' => $_player_value['player_phonenumber'],
                                'player_uid' => !empty($_player_value['player_uid'])?$_player_value['player_uid']:0,
                                'teaTimeId' => $tea_time_id
                            ))
                                ->execute();
//                            }
                        }
                        foreach ($value['utilities'] as $_utilitie_key => $_utilitie_value) {
                            if(!empty($booking->tea_times[$key]->utilities[$_utilitie_key]->id)){
                                db_update('golf_booking_utilitie') // Table name no longer needs {}
                                ->fields(array(
                                    'utilitie_price' => $_utilitie_value['price'],
                                    'utilitie_name' => $_utilitie_value['utility']->title,
                                    'quantity'=>$_utilitie_value['quantity'],
//                            'teaTimeId' => $tea_time_id
                                ))->condition("id",$booking->tea_times[$key]->utilities[$_utilitie_key]->id)
                                    ->execute();
                            }else{
                                db_insert('golf_booking_utilitie') // Table name no longer needs {}
                                ->fields(array(
                                    'utilitie_price' => $_utilitie_value['price'],
                                    'utilitie_name' => $_utilitie_value['utility']->title,
                                    'quantity'=>$_utilitie_value['quantity'],
                                    'teaTimeId' => $tea_time_id
                                ))
                                    ->execute();
                            }

                        }
                    }





                }

                foreach ($data['booking']['tea_times'] as $key => $value) {
                    $tea_time = $value['tea_time'];
                    $tea_time->field_c_t_t_player['und'][0]['value'] = (int)$tea_time->field_c_t_t_player['und'][0]['value'] + count($value['players']);
                    node_save($tea_time);
                }

                if(!empty($data['booking']['promotion']) && $data['booking']['promotion']->status == 0){
                    db_update('promotion')
                        ->fields(array(
                            'status' => 1,
                        ))
                        ->condition('code', $data['booking']['promotion']->code, '=')
                        ->execute();
                }
                $data['code'] = $code;
                $data['contact'] = $booking;
                $site_mail = variable_get("site_mail");
                $booking_golf_complete_key = $code;
                $body[] = _cassiopeia_render_theme("module","cassiopeia","templates/nodes/golf_change_booking_mail_template.tpl.php",array("data"=>$data));
                $headers['From'] = $headers['Sender'] = $headers['Return-Path'] = $site_mail;
                $headers['MIME-Version'] = '1.0';
                $headers['Content-Type'] = 'text/html; charset=UTF-8; format=flowed; delsp=yes';
                $params = array(
                    'body' => $body,
                    'subject' => "Đơn hàng Alegolf có mã ".$code." đã được thay đổi",
                    'headers' => $headers,
                );
                drupal_mail('cassiopeia', 'golf_booking_request_mail', $data['contact']->contact_mail, language_default(), $params);
                drupal_goto('manager/booking/golf_bookings');

            }catch (Exception $e) {
                $transaction->rollback();
                drupal_set_message('Hệ thống đang bận vui lòng quay lại sau ít phút', 'error');
                drupal_goto('manager/booking/golf_bookings');
            }

        }else {
            drupal_set_message($error, 'error');
            drupal_goto('manager/tea-times');
        }

    }
}
function cassiopeia_admin_golf_bookings_from ($form, &$form_state, $teatime = null) {
//    print_r($teatime);
    global $language;
    global $user;
    $_user = user_load($user->uid);
    drupal_add_library('system', 'ui.datepicker');

    $new_golf = FALSE;

    $form = array();
    $form['#data'] = array();

    $form['#prefix'] = '<div id="admin-golf-payment-booking-form">';
    $form['#suffix'] = '</div>';

    $form['#promotion_price'] = 0;



    $form['contact'] = array(
        '#type' => 'container',
        '#attributes' =>array('class'=> array('form-group')),
//    '#prefix' => '<div class="form-group"> <label>Thông tin liên hệ</label> <div>',
//    '#suffix' => '</div></div>',
    );


    $form['contact']['contact_autocomplete'] = array(
        '#type' => 'textfield',
        '#title' => 'Tìm khách hàng',
        '#size' => 60,
        '#maxlength' => 128,
//    '#required' => TRUE,
        '#attributes' =>array('placeholder' => 'Tìm kiếm user'),
        '#autocomplete_path' => 'manager/autocomplete/user',
        '#ajax' => array(
            'callback' => 'cassiopeia_admin_golf_bookings_from_ajax_callback',
            'wrapper' => 'admin-golf-payment-booking-form',
            'method' => 'replace',
            'effect' => 'fade',
        ),

    );

    if (empty($form_state['values']['contact_autocomplete'])) {
        $form['contact']['contact_last_name'] = array(
            '#type' => 'textfield',
            '#size' => 60,
            '#maxlength' => 128,
            '#required' => TRUE,
            '#attributes' =>array('placeholder' => 'Họ'),
            '#title' => 'Họ',
        );

        $form['contact']['contact_firt_name'] = array(
            '#type' => 'textfield',
            '#size' => 60,
            '#maxlength' => 128,
            '#required' => TRUE,
            '#attributes' =>array('placeholder' => 'Tên'),
            '#title' => 'Tên',
        );

        $form['contact']['contact_phone'] = array(
            '#type' => 'textfield',
            '#size' => 60,
            '#maxlength' => 128,
            '#required' => TRUE,
            '#attributes' =>array('placeholder' => 'Số điện thoại'),
            '#title' => 'Số điện thoại',
        );

        $form['contact']['contact_email'] = array(
            '#type' => 'textfield',
            '#size' => 60,
            '#maxlength' => 128,
            '#required' => TRUE,
            '#attributes' =>array('placeholder' => 'Email'),
            '#title' => 'Email',
        );

        $form['contact']['contact_address'] = array(
            '#type' => 'textfield',
            '#size' => 60,
            '#maxlength' => 128,
            '#required' => TRUE,
            '#attributes' =>array('placeholder' => 'Địa chỉ'),
            '#title' => 'Địa chỉ',
        );

        $form['contact']['contact_city'] = array(
            '#type' => 'textfield',
            '#size' => 60,
            '#maxlength' => 128,
            '#required' => TRUE,
            '#attributes' =>array('placeholder' => 'Thành phố'),
            '#title' => 'Thành phố',
        );

        $form['contact']['contact_country'] = array(
            '#type' => 'textfield',
            '#size' => 60,
            '#maxlength' => 128,
            '#required' => TRUE,
            '#attributes' =>array('placeholder' => 'Quốc gia'),
            '#title' => 'Quốc gia',
        );
    }

    $golfs = cassiopeia_get_golfs_by_condition(array('condition'=> array('status'=>array('value'=>1, 'operator'=>"="))));
    $golf_options = array();

    foreach ($golfs as $key => $value) {
        $golf_options[$value->nid] = $value->title;
    }

    $form['golf'] = array(
        '#type' => 'select',
        '#title' => 'Sân / zone',
        '#options' => $golf_options,
        '#required' => TRUE,
        '#ajax' => array(
            'callback' => 'cassiopeia_admin_golf_bookings_from_ajax_callback',
            'wrapper' => 'admin-golf-payment-booking-form',
            'method' => 'replace',
            'effect' => 'fade',
        ),
    );


    if (empty($form_state['#data'])) {
        $form_state['#data'] = array();
    }

    if (!empty($form_state['values']['golf'])) {
        if (!empty($form_state['#data']['golf'])) {
            if((int)$form_state['#data']['golf']->nid != (int)$form_state['values']['golf']) {
                $new_golf = TRUE;
                $form_state['#data']['golf'] = node_load($form_state['values']['golf']);
            }
        }else {
            $new_golf = TRUE;
            $form_state['#data']['golf'] = node_load($form_state['values']['golf']);
        }

    }elseif(!empty($teatime)) {

        $golf = node_load($teatime->field_c_t_t_parent['und'][0]['nid']);
        $form['golf']['#default_value'] = $golf->nid;
        $form_state['#data']['golf'] = $golf;

    }
    $form['#data'] = $form_state['#data'];



    if(!empty($form_state['values']['golf'])) {
        if ($new_golf == TRUE) {
            $form_state['book_tea_times'] =  array();
            $form_state['book_tea_times'][] = 0;
        }else {
            if(empty($form_state['book_tea_times'])) {
                $form_state['book_tea_times'] =  array();
                $form_state['book_tea_times'][] = 0;
            }
        }

        $form['tea_times'] = array(
            '#type' => 'container',
        );

        foreach ($form_state['book_tea_times'] as $key => $value) {

            $form['tea_times']['tea_time_'.($value)] = array(
                '#type' => 'container',
                '#attributes' =>array('class'=> array('form-group edit-tea-time'))
            );

            $form['tea_times']['tea_time_'.($value)]['tea_time_container'] = array(
                '#type' => 'container',
                '#attributes' => array(
                    'class' => array('booking-tea-time-item'),
                ),
            );


            $form['tea_times']['tea_time_'.($value)]['tea_time_container']['pic_up_date_'.($value)] = array(
                '#type' => 'date_popup',
                '#default_value' => date('Y-m-d H:i:s', REQUEST_TIME),
                '#date_timezone' => date_default_timezone(),
                '#date_format' => 'd-m-Y',
                '#date_increment' => 1,
                '#date_year_range' => '0:+3',
                //        '#datepicker_options' => array(
                //          'minDate' => "0"
                //        ),
                '#prefix' => '<div class="tea-time-field-item pic-up-date-field">',
                '#suffix' => '</div>',
                '#required' => TRUE,
                '#ajax' => array(
                    'callback' => 'cassiopeia_admin_golf_bookings_from_ajax_callback',
                    'wrapper' => 'admin-golf-payment-booking-form',
                    'method' => 'replace',
                    'effect' => 'fade',
                ),
            );

            $number_people_options = array(0=>"Chọn",1=>'1', 2=>'2', 3=>'3', 4=>'4');
            if (!empty($form_state['values']['pic_up_time_'.($value)])) {
                $number_people_options = array();
                $tea_time = node_load($form_state['values']['pic_up_time_' . ($value)]);
                $number_player_ = $tea_time->field_c_t_t_player['und'][0]['value'];
                $min_player = $tea_time->field_c_t_t_min_player['und'][0]['value'];
                $max_player = $tea_time->field_c_t_t_max_player['und'][0]['value'];
                $slots = $max_player - $number_player_;
                for($i=$min_player;$i<=$slots;$i++){
                    $number_people_options[$i] = $i;
                }
            }
            $form['tea_times']['tea_time_'.($value)]['tea_time_container']['number_people_'.($value)] = array(
                '#title'=> t('Player'),
                '#type' => 'select',
                '#options' => $number_people_options,
                '#prefix' => '<div class="tea-time-field-item number-people-field">',
                '#suffix' => '</div>',
                '#default_value' => 0,
                '#required' => TRUE,
                '#ajax' => array(
                    'callback' => 'cassiopeia_admin_golf_bookings_from_ajax_callback',
                    'wrapper' => 'admin-golf-payment-booking-form',
                    'method' => 'replace',
                    'effect' => 'fade',
                ),
            );

            $number_people_options = array();
            $number_hole_options = array();
            foreach ( _cassiopeia_get_all_hole () as $hole_key => $hole_value ) {
                if (!empty($form['#data']['golf']->field_ctype_golf_hole['und'][0]['value']) && $form['#data']['golf'] ->field_ctype_golf_hole['und'][0]['value'] >= $hole_value->hole) {
                    $number_hole_options[$hole_value->hole] = $hole_value->hole;
                }
            }

            $form['tea_times']['tea_time_'.($value)]['tea_time_container']['number_hole_'.($value)] = array(
                '#title'=> t('Hole'),
                '#type' => 'select',
                '#options' => $number_hole_options,
                '#prefix' => '<div class="tea-time-field-item number-hole-field">',
                '#suffix' => '</div>',
                '#required' => TRUE,
                '#ajax' => array(
                    'callback' => 'cassiopeia_admin_golf_bookings_from_ajax_callback',
                    'wrapper' => 'admin-golf-payment-booking-form',
                    'method' => 'replace',
                    'effect' => 'fade',
                ),
            );



            $pic_up_time_options = array();


            if(!empty($form_state['values']['pic_up_date_'.($value)]) && !empty($form_state['values']['number_hole_'.($value)]) && !empty($form_state['values']['number_people_'.($value)])) {
                $condition = array();

                $condition['condition']['field_c_t_t_parent'] = $form['#data']['golf']->nid;

                $condition['condition']['date'] = array();
                $condition['condition']['date']['value'] = !empty($form_state['values']['pic_up_date_'.($value)])?$form_state['values']['pic_up_date_'.($value)]:date('Y-m-d', REQUEST_TIME);
                $condition['condition']['date']['operator'] =  '=';


                $condition['condition']['field_c_t_t_hole'] = array();
                $condition['condition']['field_c_t_t_hole']['value'] = !empty($form_state['values']['number_hole_'.($value)])?$form_state['values']['number_hole_'.($value)]:array_values($number_hole_options)[0];
                $condition['condition']['field_c_t_t_hole']['operator'] =  '=';


                $condition['condition']['slot_available'] = array();
                $condition['condition']['slot_available']['value'] = !empty($form_state['values']['number_people_'.($value)])?$form_state['values']['number_people_'.($value)]:1;
                $condition['condition']['slot_available']['operator'] =  '>=';


                $condition['condition']['status'] = array();
                $condition['condition']['status']['value'] = 1;
                $condition['condition']['status']['operator'] =  '=';

                $condition['order'] = array(
                    'field_c_t_t_date' => 'DESC',
                    'field_c_t_t_sh' => 'ASC'
                );

                $tea_times = array();
                $result =  _cassiopeia_get_tea_time_details_by_condition($condition);

                $data = cassiopeia_golf_booking_form_to_data($form_state);
                foreach ($form_state['book_tea_times'] as $_key => $_value) {
                    if ($_value == $value) {
                        unset($data[$_value]);
                    }
                }

                $ressult_option= array();
                foreach ($result as $result_key => $result_value) {
                    $check = TRUE;
                    foreach ($data as $data_key => $data_value ) {
                        if ($result_value->nid == $data_value['pic_up_time']) {
                            $check = FALSE;
                        }
                    }
                    if($check) {
                        $ressult_option[] = $result_value;
                    }

                    if (!empty($tea_times[$result_value->field_c_t_t_type['und'][0]['value']])) {
                        if ($check) {
                            $tea_times[$result_value->field_c_t_t_type['und'][0]['value']]['values'][] = $result_value;
                        }

                    }else {
                        $tea_times[$result_value->field_c_t_t_type['und'][0]['value']] = array();
                        $time_frame = taxonomy_term_load($result_value->field_c_t_t_type['und'][0]['value']);
                        $tea_times[$result_value->field_c_t_t_type['und'][0]['value']]['name'] = $time_frame->name;
                        $tea_times[$result_value->field_c_t_t_type['und'][0]['value']]['values'] =  array();
                        if ($check) {
                            $tea_times[$result_value->field_c_t_t_type['und'][0]['value']]['values'][] =  $result_value;
                        }
                    }

                }
                foreach ($tea_times as $tea_time_key => $tea_time_value) {
                    $pic_up_time_options[$tea_time_value['name']] = array();
                    foreach ($tea_time_value['values'] as $tea_time_value_key => $tea_time_value_value) {
                        if(user_has_role(4,$_user)){
                            $pic_up_time_options[$tea_time_value['name']][$tea_time_value_value->nid] = date('H:i', (int)$tea_time_value_value->field_c_t_t_sh['und'][0]['value']) ;
                        }else{
                            $pic_up_time_options[$tea_time_value['name']][$tea_time_value_value->nid] = date('H:i', (int)$tea_time_value_value->field_c_t_t_sh['und'][0]['value']) .' - '. number_format($tea_time_value_value->field_c_t_t_a_price['und'][0]['value'], 0, ',','.').'đ';
                        }

                    }
                }
            }


            $form['tea_times']['tea_time_'.($value)]['tea_time_container']['pic_up_time_'.($value)] = array(
                '#title'=> t('Time'),
                '#type' => 'select',
                '#options' => $pic_up_time_options,
                '#prefix' => '<div class="tea-time-field-item pic-up-time-field">',
                '#suffix' => '</div>',
                '#element_validate'=> array('booking_form_pic_up_time_validate'),
                '#required' => TRUE,
                '#ajax' => array(
                    'callback' => 'cassiopeia_admin_golf_bookings_from_ajax_callback',
                    'wrapper' => 'admin-golf-payment-booking-form',
                    'method' => 'replace',
                    'effect' => 'fade',
                ),
            );

            if(!empty($form_state['values']['pic_up_time_'.($value)])) {
                $tea_time = node_load($form_state['values']['pic_up_time_'.($value)]);
                if (!empty($tea_time->field_c_t_t_utility['und']) || !empty($tea_time->field_c_t_t_e_utility[$language->language][0]['value'])) {

                    $form['tea_times']['tea_time_'.($value)]['default_utilities'] = array(
                        '#type' => 'container',
                        '#prefix' => '<div class="form-group"> <label>Giá bao gồm</label> <div class="row">',
                        '#suffix' => '</div></div>',
                        '#attributes' =>array('class'=> array('form-group'))
                    );

                    if (!empty($tea_time->field_c_t_t_utility['und'])){
                        foreach ($tea_time->field_c_t_t_utility['und'] as $default_utilitie_key => $default_utilitie_value) {
                            $utilitie = cassiopeia_get_golf_utility_by_id($default_utilitie_value['value']);
                            if(!empty($utilitie)) {
                                $form['tea_times']['tea_time_'.($value)]['default_utilities']['default_utilitie_'.$value.'_'.$default_utilitie_key] = array(
                                    '#markup' => '<div class="col-md-6 form-group">- '.$utilitie->title.'</div>',
                                );
                            }

                        }
                    }

                    if (!empty($tea_time->field_c_t_t_e_utility[$language->language][0]['value'])) {
                        $form['tea_times']['tea_time_'.($value)]['default_utilities']['default_eutilitie_'.$value] = array(
                            '#markup' => '<div class="col-md-6 form-group">'.$tea_time->field_c_t_t_e_utility[$language->language][0]['value'].'</div>',
                        );
                    }

                }
            }



            $form['tea_times']['tea_time_'.($value)]['players'] = array(
                '#type' => 'container',
                '#attributes' =>array('class'=> array('form-group'))
            );

            for ($player_i =0; $player_i < $form_state['values']['number_people_'.($value)]; $player_i++) {

                $form['tea_times']['tea_time_'.($value)]['players']['player-item'.$player_i] = array(
                    '#type' => 'container',
                    '#prefix' => '<div class="form-group"> <label>Người chơi '.($player_i +1).'</label> <div>',
                    '#suffix' => '</div></div>',
                    '#attributes' =>array('class'=> array('form-group'))
                );

                $form['tea_times']['tea_time_'.($value)]['players']['player-item'.$player_i]['player_name_'.$value.'_'.$player_i.'_autocomplete'] = array(
                    '#type' => 'textfield',
                    '#size' => 60,
                    '#maxlength' => 128,
                    '#attributes' =>array('placeholder' => 'Tìm kiếm user'),
                    '#autocomplete_path' => 'manager/autocomplete/user',
                    '#ajax' => array(
                        'callback' => 'cassiopeia_admin_golf_bookings_from_ajax_callback',
                        'wrapper' => 'admin-golf-payment-booking-form',
                        'method' => 'replace',
                        'effect' => 'fade',
                    ),
                );

                if(!empty($form_state['values']['player_name_'.$value.'_'.$player_i.'_autocomplete'])) {
                }else {
                    $form['tea_times']['tea_time_'.($value)]['players']['player-item'.$player_i]['player_name_'.$value.'_'.$player_i] = array(
                        '#type' => 'textfield',
                        '#size' => 60,
                        '#maxlength' => 128,
                        '#required' => TRUE,
                        '#attributes' =>array('placeholder' => 'Họ tên')
                    );
                    $form['tea_times']['tea_time_'.($value)]['players']['player-item'.$player_i]['player_mail_'.$value.'_'.$player_i] = array(
                        '#type' => 'textfield',
                        '#size' => 60,
                        '#maxlength' => 128,
                        '#required' => TRUE,
                        '#attributes' =>array('placeholder' => 'Email')
                    );
                    $form['tea_times']['tea_time_'.($value)]['players']['player-item'.$player_i]['player_phone_'.$value.'_'.$player_i] = array(
                        '#type' => 'textfield',
                        '#size' => 60,
                        '#maxlength' => 128,
                        '#required' => TRUE,
                        '#attributes' =>array('placeholder' => 'Số điện thoại')
                    );
                }


            }

            $form['tea_times']['tea_time_'.($value)]['extend_utilities'] = array(
                '#type' => 'container',
                '#prefix' => '<div class="edit-extend-utilities"> <label>'.t("Add utility").'</label><div>',
                '#suffix' => '</div></div>',
            );

            foreach ($form_state['#data']['golf']->field_ctype_utility['und'] as $tea_time_extend_utilitie_key => $tea_time_extend_utilitie_value) {
                $utilitie = cassiopeia_get_golf_utility_by_id($tea_time_extend_utilitie_value['value']);
                if(!empty($utilitie)) {
                    $form['tea_times']['tea_time_'.($value)]['extend_utilities']['extend_utiliti_'.$value.'_'.$tea_time_extend_utilitie_value['value']] = array(
                        '#title' =>$utilitie->title,
                        '#type' => 'textfield',
                        '#maxlength' => 128,
                        '#attributes' =>array('placeholder' => 'số lượng')
                    );
                }
            }
        }

        $form['tea_times']['tea_time_add_more'] = array(
            '#type' => 'submit',
            '#submit' => array('cassiopeia_admin_golf_bookings_from_add_more'),
            '#value' => 'tea_time_add_more',
            '#text' => t('Add tee times'),
            '#attributes' => array(
                'class' => array('btn btn-default'),
                'type' => 'button',
            ),
            '#prefix' => '<div class="add-more-field">',
            '#suffix' => '</div>',

            '#ajax' => array(
                'callback' => 'cassiopeia_admin_golf_bookings_from_ajax_callback',
                'wrapper' => 'admin-golf-payment-booking-form',
                'method' => 'replace',
                'effect' => 'fade',
            ),
        );
    }
    elseif(!empty($teatime)) {
//    todo
        $form_state['book_tea_times'] =  array();
        $form_state['book_tea_times'][] = 0;

        $form['tea_times'] = array(
            '#type' => 'container',
        );

        foreach ($form_state['book_tea_times'] as $key => $value) {

            $form['tea_times']['tea_time_'.($value)] = array(
                '#type' => 'container',
                '#attributes' =>array('class'=> array('form-group edit-tea-time'))
            );

            $form['tea_times']['tea_time_'.($value)]['tea_time_container'] = array(
                '#type' => 'container',
                '#attributes' => array(
                    'class' => array('booking-tea-time-item'),
                ),
            );

            $form['tea_times']['tea_time_'.($value)]['tea_time_container']['pic_up_date_'.($value)] = array(
                '#type' => 'date_popup',
                '#default_value' => $teatime->field_c_t_t_date['und'][0]['value'],
                '#date_timezone' => date_default_timezone(),
                '#date_format' => 'd-m-Y',
                '#date_increment' => 1,
                '#date_year_range' => '0:+3',
                '#prefix' => '<div class="tea-time-field-item pic-up-date-field">',
                '#suffix' => '</div>',
                '#required' => TRUE,
                '#ajax' => array(
                    'callback' => 'cassiopeia_admin_golf_bookings_from_ajax_callback',
                    'wrapper' => 'admin-golf-payment-booking-form',
                    'method' => 'replace',
                    'effect' => 'fade',
                ),
            );

            $number_people_options = array(1=>'1', 2=>'2', 3=>'3', 4=>'4');
            if (!empty($teatime)) {
//                print_r($teatime);
                $number_people_options = array();
//                $tea_time = node_load($form_state['values']['pic_up_time_' . ($value)]);
                $number_player_ = $teatime->field_c_t_t_player['und'][0]['value'];
                $min_player = $teatime->field_c_t_t_min_player['und'][0]['value'];
                $max_player = $teatime->field_c_t_t_max_player['und'][0]['value'];
                $slots = $max_player - $number_player_;
                for($i=$min_player;$i<=$slots;$i++){
                    $number_people_options[$i] = $i;
                }
            }
            $form['tea_times']['tea_time_'.($value)]['tea_time_container']['number_people_'.($value)] = array(
                '#title'=> t('Player'),
                '#type' => 'select',
                '#options' => $number_people_options,
                '#prefix' => '<div class="tea-time-field-item number-people-field">',
                '#suffix' => '</div>',
                '#default_value' => 1,
                '#required' => TRUE,
                '#ajax' => array(
                    'callback' => 'cassiopeia_admin_golf_bookings_from_ajax_callback',
                    'wrapper' => 'admin-golf-payment-booking-form',
                    'method' => 'replace',
                    'effect' => 'fade',
                ),
            );

            $number_hole_options = array();
            foreach ( _cassiopeia_get_all_hole () as $hole_key => $hole_value ) {
                if (!empty($form['#data']['golf']->field_ctype_golf_hole['und'][0]['value']) && $form['#data']['golf'] ->field_ctype_golf_hole['und'][0]['value'] >= $hole_value->hole) {
                    $number_hole_options[$hole_value->hole] = $hole_value->hole;
                }
            }

            $form['tea_times']['tea_time_'.($value)]['tea_time_container']['number_hole_'.($value)] = array(
                '#title'=> t('Hole'),
                '#type' => 'select',
                '#options' => $number_hole_options,
                '#prefix' => '<div class="tea-time-field-item number-hole-field">',
                '#suffix' => '</div>',
                '#default_value' => $teatime->field_c_t_t_hole['und'][0]['value'],
                '#required' => TRUE,
                '#ajax' => array(
                    'callback' => 'cassiopeia_admin_golf_bookings_from_ajax_callback',
                    'wrapper' => 'admin-golf-payment-booking-form',
                    'method' => 'replace',
                    'effect' => 'fade',
                ),
            );



            $pic_up_time_options = array();

            $condition = array();

            $condition['condition']['field_c_t_t_parent'] = $form['#data']['golf']->nid;

            $condition['condition']['date'] = array();
            $condition['condition']['date']['value'] = $teatime->field_c_t_t_date['und'][0]['value'];
            $condition['condition']['date']['operator'] =  '=';


            $condition['condition']['field_c_t_t_hole'] = array();
            $condition['condition']['field_c_t_t_hole']['value'] = $teatime->field_c_t_t_hole['und'][0]['value'];
            $condition['condition']['field_c_t_t_hole']['operator'] =  '=';


            $condition['condition']['slot_available'] = array();
            $condition['condition']['slot_available']['value'] = 1;
            $condition['condition']['slot_available']['operator'] =  '>=';


            $condition['condition']['status'] = array();
            $condition['condition']['status']['value'] = 1;
            $condition['condition']['status']['operator'] =  '=';

            $condition['order'] = array(
                'field_c_t_t_date' => 'DESC',
                'field_c_t_t_sh' => 'ASC'
            );

            $tea_times = array();
            $result =  _cassiopeia_get_tea_time_details_by_condition($condition);

            $data = cassiopeia_golf_booking_form_to_data($form_state);
            foreach ($form_state['book_tea_times'] as $_key => $_value) {
                if ($_value == $value) {
                    unset($data[$_value]);
                }
            }

            $ressult_option= array();
            foreach ($result as $result_key => $result_value) {
                $check = TRUE;
                foreach ($data as $data_key => $data_value ) {
                    if ($result_value->nid == $data_value['pic_up_time']) {
                        $check = FALSE;
                    }
                }
                if($check) {
                    $ressult_option[] = $result_value;
                }

                if (!empty($tea_times[$result_value->field_c_t_t_type['und'][0]['value']])) {
                    if ($check) {
                        $tea_times[$result_value->field_c_t_t_type['und'][0]['value']]['values'][] = $result_value;
                    }

                }else {
                    $tea_times[$result_value->field_c_t_t_type['und'][0]['value']] = array();
                    $time_frame = taxonomy_term_load($result_value->field_c_t_t_type['und'][0]['value']);
                    $tea_times[$result_value->field_c_t_t_type['und'][0]['value']]['name'] = $time_frame->name;
                    $tea_times[$result_value->field_c_t_t_type['und'][0]['value']]['values'] =  array();
                    if ($check) {
                        $tea_times[$result_value->field_c_t_t_type['und'][0]['value']]['values'][] =  $result_value;
                    }
                }

            }
            foreach ($tea_times as $tea_time_key => $tea_time_value) {
                $pic_up_time_options[$tea_time_value['name']] = array();
                foreach ($tea_time_value['values'] as $tea_time_value_key => $tea_time_value_value) {
                    if(user_has_role(4,$_user)){
                        $pic_up_time_options[$tea_time_value['name']][$tea_time_value_value->nid] = date('H:i', (int)$tea_time_value_value->field_c_t_t_sh['und'][0]['value']);
                    }else{
                        $pic_up_time_options[$tea_time_value['name']][$tea_time_value_value->nid] = date('H:i', (int)$tea_time_value_value->field_c_t_t_sh['und'][0]['value']) .' - '. number_format($tea_time_value_value->field_c_t_t_a_price['und'][0]['value'], 0, ',','.').'đ';
                    }

                }
            }


            $form['tea_times']['tea_time_'.($value)]['tea_time_container']['pic_up_time_'.($value)] = array(
                '#title'=> 'Khung giờ',
                '#type' => 'select',
                '#options' => $pic_up_time_options,
                '#prefix' => '<div class="tea-time-field-item pic-up-time-field">',
                '#suffix' => '</div>',
                '#element_validate'=> array('booking_form_pic_up_time_validate'),
                '#required' => TRUE,
                '#default_value' => $teatime->nid,
                '#ajax' => array(
                    'callback' => 'cassiopeia_admin_golf_bookings_from_ajax_callback',
                    'wrapper' => 'admin-golf-payment-booking-form',
                    'method' => 'replace',
                    'effect' => 'fade',
                ),
            );

            if (!empty($teatime->field_c_t_t_utility['und']) || !empty($teatime->field_c_t_t_e_utility[$language->language][0]['value'])) {

                $form['tea_times']['tea_time_'.($value)]['default_utilities'] = array(
                    '#type' => 'container',
                    '#prefix' => '<div class="form-group"> <label>Giá bao gồm</label> <div class="row">',
                    '#suffix' => '</div></div>',
                    '#attributes' =>array('class'=> array('form-group'))
                );

                if(!empty($teatime->field_c_t_t_utility['und'])) {
                    foreach ($teatime->field_c_t_t_utility['und'] as $default_utilitie_key => $default_utilitie_value) {
                        $utilitie = cassiopeia_get_golf_utility_by_id($default_utilitie_value['value']);
                        if(!empty($utilitie)) {
                            $form['tea_times']['tea_time_'.($value)]['default_utilities']['default_utilitie_'.$value.'_'.$default_utilitie_key] = array(
                                '#markup' => '<div class="col-md-6 form-group">- '.$utilitie->title.'</div>',
                            );
                        }

                    }
                }

                if(!empty($teatime->field_c_t_t_e_utility[$language->language][0]['value'])) {
                    $form['tea_times']['tea_time_'.($value)]['default_utilities']['default_eutilitie_'.$value] = array(
                        '#markup' => '<div class="col-md-12 form-group">'.$teatime->field_c_t_t_e_utility[$language->language][0]['value'].'</div>',
                    );
                }

            }



            $form['tea_times']['tea_time_'.($value)]['players'] = array(
                '#type' => 'container',
                '#attributes' =>array('class'=> array('form-group'))
            );

            for ($player_i =0; $player_i < 1; $player_i++) {

                $form['tea_times']['tea_time_'.($value)]['players']['player-item'.$player_i] = array(
                    '#type' => 'container',
                    '#prefix' => '<div class="form-group"> <label>Người chơi '.($player_i +1).'</label> <div>',
                    '#suffix' => '</div></div>',
                    '#attributes' =>array('class'=> array('form-group'))
                );

                $form['tea_times']['tea_time_'.($value)]['players']['player-item'.$player_i]['player_name_'.$value.'_'.$player_i.'_autocomplete'] = array(
                    '#type' => 'textfield',
                    '#size' => 60,
                    '#maxlength' => 128,
                    '#attributes' =>array('placeholder' => 'Tìm kiếm user'),
                    '#autocomplete_path' => 'manager/autocomplete/user',
                    '#ajax' => array(
                        'callback' => 'cassiopeia_admin_golf_bookings_from_ajax_callback',
                        'wrapper' => 'admin-golf-payment-booking-form',
                        'method' => 'replace',
                        'effect' => 'fade',
                    ),
                );

                if(!empty($form_state['values']['player_name_'.$value.'_'.$player_i.'_autocomplete'])) {
                }else {
                    $form['tea_times']['tea_time_'.($value)]['players']['player-item'.$player_i]['player_name_'.$value.'_'.$player_i] = array(
                        '#type' => 'textfield',
                        '#size' => 60,
                        '#maxlength' => 128,
                        '#required' => TRUE,
                        '#attributes' =>array('placeholder' => 'Họ tên')
                    );
                    $form['tea_times']['tea_time_'.($value)]['players']['player-item'.$player_i]['player_mail_'.$value.'_'.$player_i] = array(
                        '#type' => 'textfield',
                        '#size' => 60,
                        '#maxlength' => 128,
                        '#required' => TRUE,
                        '#attributes' =>array('placeholder' => 'Email')
                    );
                    $form['tea_times']['tea_time_'.($value)]['players']['player-item'.$player_i]['player_phone_'.$value.'_'.$player_i] = array(
                        '#type' => 'textfield',
                        '#size' => 60,
                        '#maxlength' => 128,
                        '#required' => TRUE,
                        '#attributes' =>array('placeholder' => 'Số điện thoại')
                    );
                }


            }
            if(!empty($form_state['#data']['golf']->field_ctype_utility['und'])){
                $form['tea_times']['tea_time_'.($value)]['extend_utilities'] = array(
                    '#type' => 'container',
                    '#prefix' => '<div class="edit-extend-utilities"> <label>'.t("Add utility").'</label><div>',
                    '#suffix' => '</div></div>',
                );

                foreach ($form_state['#data']['golf']->field_ctype_utility['und'] as $tea_time_extend_utilitie_key => $tea_time_extend_utilitie_value) {
                    $utilitie = cassiopeia_get_golf_utility_by_id($tea_time_extend_utilitie_value['value']);
                    if (!empty($utilitie)) {
                        $form['tea_times']['tea_time_'.($value)]['extend_utilities']['extend_utiliti_'.$value.'_'.$tea_time_extend_utilitie_value['value']] = array(
                            '#title' =>$utilitie->title,
                            '#type' => 'textfield',
                            '#maxlength' => 128,
                            '#attributes' =>array('placeholder' => 'số lượng')
                        );
                    }

                }
            }

        }

        $form['tea_times']['tea_time_add_more'] = array(
            '#type' => 'submit',
            '#submit' => array('cassiopeia_admin_golf_bookings_from_add_more'),
            '#value' => 'tea_time_add_more',
            '#text' => t('Add tee times'),
            '#attributes' => array(
                'class' => array('btn btn-default'),
                'type' => 'button',
            ),
            '#prefix' => '<div class="add-more-field">',
            '#suffix' => '</div>',

            '#ajax' => array(
                'callback' => 'cassiopeia_admin_golf_bookings_from_ajax_callback',
                'wrapper' => 'admin-golf-payment-booking-form',
                'method' => 'replace',
                'effect' => 'fade',
            ),
        );

    }

    $form['invoice'] = array(
        '#title'=> 'Yêu cầu xuất hóa đơn',
        '#type' => 'checkbox',
        '#checkmark' =>TRUE
    );

    $form['vietinbank'] = array(
        '#title'=> 'Vietinbank Signature  - Hoàn 500,000 đ',
        '#type' => 'checkbox',
        '#checkmark' =>TRUE
    );

    $form['promotion'] = array(
        '#type' => 'textfield',
        '#size' => 60,
        '#maxlength' => 128,
        '#ajax' => array(
            'callback' => 'cassiopeia_admin_golf_bookings_from_ajax_callback',
            'wrapper' => 'admin-golf-payment-booking-form',
            'method' => 'replace',
            'effect' => 'fade',
        ),
        '#title' => 'Mã giảm giá'
    );

    $form['submit'] = array(
        '#type' => 'submit',
        '#value' => 'Tạo đơn hàng',
    );
    $form['#theme'][] = 'cassiopeia_admin_golf_booking_payment_form';
    return $form;
}

function cassiopeia_admin_golf_bookings_from_validate ($form, &$form_state) {
    if(!empty($form_state['values']['contact_autocomplete'])) {
        $matches = null;
        preg_match('/\[uid:(.*)\]/', $form_state['values']['contact_autocomplete'], $matches);
        if(isset($matches[1]) && is_numeric($matches[1])) {
            $_player = user_load($matches[1]);
            if(empty($_player)) {
                form_set_error('contact_autocomplete', 'Không hợp lệ.');
            }
        }else {
            form_set_error('contact_autocomplete', 'Không hợp lệ.');
        }
    }

    foreach ($form_state['book_tea_times'] as $key => $value) {
        for ($i = 0; $i < $form_state['values']['number_people_'.$value]; $i++ ) {
            if (!empty($form_state['values']['player_name_'.$value.'_'.$i.'_autocomplete'])) {
                $matches = null;
                preg_match('/\[uid:(.*)\]/', $form_state['values']['player_name_'.$value.'_'.$i.'_autocomplete'], $matches);
                if(isset($matches[1]) && is_numeric($matches[1])) {
                    $_player = user_load($matches[1]);
                    if(empty($_player)) {
                        form_set_error('player_name_'.$value.'_'.$i.'_autocomplete', 'Không hợp lệ.');
                    }
                }else {
                    form_set_error('player_name_'.$value.'_'.$i.'_autocomplete', 'Không hợp lệ.');
                }
            }
        }
    }

}

function cassiopeia_admin_golf_bookings_from_ajax_callback($form, &$form_state) {

    if(!empty($form_state['values']['contact_autocomplete'])) {
        $form_state['values']['contact_autocomplete'] = '';
    }
    $form_state['rebuild'] = TRUE;
    return $form;
}


function  cassiopeia_admin_golf_bookings_from_add_more($form, &$form_state) {
    $form_state['book_tea_times'][] = count($form_state['book_tea_times']) > 0 ? max($form_state['book_tea_times']) + 1 : 0;
    $form_state['rebuild'] = TRUE;
}

function cassiopeia_admin_golf_bookings_from_submit($form, &$form_state) {
//    var_dump($form_state['values']);die;
    $contact_user = null;
    global $user;
    $_user = user_load($user->uid);
    $price_payment_free = variable_get('payment_free');
    $price_payment_free_vietinbank_signature = variable_get('payment_fee_vietinbank_signature');
    $price_payment_free_card = variable_get('payment_fee_card');
    $data = array();
    $data['golf'] =  $form_state['#data']['golf'];
    $promotion = null;
    if(!empty($form_state['values']['promotion'])) {
        $promotion =  cassiopeia_get_promotion_card_by_code($form_state['values']['promotion'],1,$data['golf']->nid);
        if ($promotion->status != 0) {
            $promotion = null;
        }
    }





    $data['booking'] = array(
        'tea_times' => array(),
        'promotion'=>  $promotion,
        'payment_method' => 1,
        'payment_option' => null,
        'promotion_amount' => 0,
        'booking_fee'=>0,
        'card_transaction_fee'=>0,
        'invoice' => !empty($form_state['values']['invoice']) ? $form_state['values']['invoice']:0,
        'contact' => array(
            'contact_name' => '',
            'contact_mail' => '',
            'contact_phone' => '',
            'contact_address' => '',
        ),
        'totals' => 0,
        'created' => REQUEST_TIME,
    );



    if(!empty($form_state['values']['contact_autocomplete'])) {
        $matches = null;
        preg_match('/\[uid:(.*)\]/', $form_state['values']['contact_autocomplete'], $matches);
        if(isset($matches[1]) && is_numeric($matches[1])) {
            $_player = user_load($matches[1]);
            $contact_user = $_player;
            $data['booking']['contact']['contact_name'] =  $_player->field_account_full_name['und'][0]['value'];
            $data['booking']['contact']['contact_mail'] =  $_player->mail;
            $data['booking']['contact']['contact_phone'] =  $_player->field_account_phone['und'][0]['value'];
            $data['booking']['contact']['contact_address'] =  !empty($_player->field_account_address['und'][0]['value'])?$_player->field_account_address['und'][0]['value']:'';
        }
    }else {
        $data['booking']['contact']['contact_name'] =  $form_state['values']['contact_firt_name']. ' ' .$form_state['values']['contact_last_name'] ;
        $data['booking']['contact']['contact_mail'] =   $form_state['values']['contact_email'];
        $data['booking']['contact']['contact_phone'] =  $form_state['values']['contact_phone'];
        $data['booking']['contact']['contact_address'] =  $form_state['values']['contact_address'] . ' ' . $form_state['values']['contact_country'];
    }

    foreach ($form_state['book_tea_times'] as $key => $value) {
        $tmp = array();
        $tmp['tea_time'] = node_load($form_state['values']['pic_up_time_'.$value]);
        $tmp['players'] = array();
        $tmp['utilities'] = array();
        $data['booking']['tea_times'][$value] =  $tmp;
    }

    foreach ($form_state['book_tea_times'] as $key => $value) {
//        print_r($data['booking']['tea_times'][$value]['tea_time']);die;
        if(user_has_role(4,$_user)){
            $data['booking']['totals'] = $data['booking']['totals']  + $form_state['values']['number_people_'.$value]*$data['booking']['tea_times'][$value]['tea_time']->field_c_t_t_price['und'][0]['value'];
        }else{
            $data['booking']['totals'] = $data['booking']['totals']  + $form_state['values']['number_people_'.$value]*$data['booking']['tea_times'][$value]['tea_time']->field_c_t_t_a_price['und'][0]['value'];
        }

        $players = $form_state['values']['number_people_'.$value];
        for ($i = 0; $i < $form_state['values']['number_people_'.$value]; $i++ ) {
            $data['booking']['tea_times'][$value]['players'][$i] = array();

            if (!empty($form_state['values']['player_name_'.$value.'_'.$i.'_autocomplete'])) {
                $matches = null;
                preg_match('/\[uid:(.*)\]/', $form_state['values']['player_name_'.$value.'_'.$i.'_autocomplete'], $matches);
                if(isset($matches[1]) && is_numeric($matches[1])) {
                    $players = $players -1;
                    $_player = user_load($matches[1]);
                    $data['booking']['tea_times'][$value]['players'][$i]['player_full_name'] =  $_player->field_account_full_name['und'][0]['value'];
                    $data['booking']['tea_times'][$value]['players'][$i]['player_email'] =  $_player->mail;
                    $data['booking']['tea_times'][$value]['players'][$i]['player_phonenumber'] =  $_player->field_account_phone['und'][0]['value'];
                }
            }else {
                $data['booking']['tea_times'][$value]['players'][$i]['player_full_name'] =  $form_state['values']['player_name_'.$value.'_'.$i];
                $data['booking']['tea_times'][$value]['players'][$i]['player_email'] =  $form_state['values']['player_mail_'.$value.'_'.$i];
                $data['booking']['tea_times'][$value]['players'][$i]['player_phonenumber'] =  $form_state['values']['player_phone_'.$value.'_'.$i];
            }
        }

        $data['booking']['booking_fee'] = $data['booking']['booking_fee'] +  $players*$price_payment_free;
        if(!empty($data['golf']->field_ctype_utility['und'])){
            foreach ($data['golf']->field_ctype_utility['und'] as $utility_key => $utility_value) {
                if(!empty($form_state['values']['extend_utiliti_'.$value.'_'.$utility_value['value']])) {
                    $utility =  cassiopeia_get_golf_utility_by_id($utility_value['value']);

                    if(!empty($utility)) {
                        $data['booking']['tea_times'][$value]['utilities'][] = array(
                            'utility' => $utility,
                            'quantity' => $form_state['values']['extend_utiliti_'.$value.'_'.$utility_value['value']],
                            'price' => $utility->price
                        );
                        $data['booking']['totals']  = $data['booking']['totals']  + $utility->price*$form_state['values']['extend_utiliti_'.$value.'_'.$utility_value['value']];
                    }

                }

            }
        }

    }

    if(!empty($promotion) &&  $promotion->status == 0) {
        if ($promotion->amount_type == 0) {
            $data['booking']['promotion_amount'] = $promotion->amount;
        }else {
            $data['booking']['promotion_amount'] =  $promotion->amount*$data['booking']['totals']/100;
        }

    }

    $data['booking']['totals'] = $data['booking']['totals'] + $data['booking']['booking_fee'] - $data['booking']['promotion_amount'] ;

    $validate = TRUE;
    $error = '';
    foreach ($data['booking']['tea_times'] as $key => $value) {
        if (((int)$value['tea_time']->field_c_t_t_player['und'][0]['value'] + count($value['players'])) > (int)$value['tea_time']->field_c_t_t_max_player['und'][0]['value']) {
            $validate =  FALSE;
            $error .= 'Tee time '. date('d/m/Y H:i', $value['tea_time']->field_c_t_t_sh['und'][0]['value']) . ' đã đủ người chơi. </br>';
        }
    }

    if($validate) {

        $transaction = db_transaction();
        try {

            $query = db_select('golf_booking', 'golf_booking')
                ->fields('golf_booking')
                ->execute();
            $num = $query->rowCount();
            $today = getdate();
            $part1 = str_replace("20","",$today['year']);
            $code = 'DH'.$part1.($num+1).$today['minutes'].$today['seconds'];
            $_query = db_select("tbl_generator_code","tbl_generator_code");
            $_query -> fields("tbl_generator_code");
            $_query -> condition("id",1000);
            $_query -> range(0,1);
            $_result = $_query->execute()->fetchAssoc();
            if(!empty($_result)){
                $code = $_result['code']+1;
                db_update("tbl_generator_code")->condition("id",1000)->fields(array("code"=>$code))->execute();
            }else{
                $code = 10000;
                db_insert("tbl_generator_code")->fields(
                    array(
                        "id"    =>1000,
                        "code"  => $code,
                    )
                )->execute();
            }
            $code = "DA".$code;
            db_insert('golf_booking') // Table name no longer needs {}
            ->fields(array(
                'code' => $code,
                'uid' => !empty($contact_user->uid)?$contact_user->uid:0,
                'contact_name' => $data['booking']['contact']['contact_name'] ,
                'contact_mail' => $data['booking']['contact']['contact_mail'] ,
                'contact_phone' => $data['booking']['contact']['contact_phone'] ,
                'contact_address' => $data['booking']['contact']['contact_address'] ,
                'payment_method' => $data['booking']['payment_method'],
                'payment_option' => $data['booking']['payment_option'],
                'golfId' => $data['golf']->nid,
                'booking_fee' => $data['booking']['booking_fee'],
                'card_transaction_fee' => $data['booking']['card_transaction_fee'],
                'promotion_code' => !empty($data['booking']['promotion']->code)?$data['booking']['promotion']->code:'',
                'promotion_price' => $data['booking']['promotion_amount'],
                'invoice' => $data['booking']['invoice'],
                'totals' => $data['booking']['totals'],
                'status' => 1,
                'created' => REQUEST_TIME,
            ))
                ->execute();

            foreach ($data['booking']['tea_times'] as $key => $value) {
                $tea_time_utilitie = '';

                if(!empty($value['tea_time']->field_c_t_t_utility['und'])) {
                    foreach ($value['tea_time']->field_c_t_t_utility['und'] as $field_c_t_t_utility_key => $field_c_t_t_utility_value) {
                        if (!empty($tea_time_utilitie)) {
                            $tea_time_utilitie = $tea_time_utilitie . ',' .$field_c_t_t_utility_value['value'];
                        }else {
                            $tea_time_utilitie = $field_c_t_t_utility_value['value'];
                        }
                    }

                }
                if(user_has_role(4,$_user)){
                    $b_price = $value['tea_time']->field_c_t_t_price['und'][0]['value'];
                }else{
                    $b_price = $value['tea_time']->field_c_t_t_a_price['und'][0]['value'];
                }
                $tea_time_id = db_insert('golf_booking_tea_time') // Table name no longer needs {}
                ->fields(array(
                    'code' => $code,
                    'tea_time_price' => $b_price,
                    'tea_time_start' => $value['tea_time']->field_c_t_t_sh['und'][0]['value'],
                    'tea_time_date' => strtotime ($value['tea_time']->field_c_t_t_date['und'][0]['value']),
                    'tea_time_id' => $value['tea_time']->nid,
                    'tea_time_utilitie' => $tea_time_utilitie,
                    'tea_time_hole' => $value['tea_time']->field_c_t_t_hole['und'][0]['value'],
                ))
                    ->execute();

                foreach ($value['players'] as $_player_key => $_player_value) {
                    db_insert('golf_booking_player') // Table name no longer needs {}
                    ->fields(array(
                        'player_full_name' => $_player_value['player_full_name'] ,
                        'player_email' => $_player_value['player_email'],
                        'player_phone_number' => $_player_value['player_phonenumber'],
                        'player_uid' => !empty($_player_value['player_uid'])?$_player_value['player_uid']:0,
                        'teaTimeId' => $tea_time_id
                    ))
                        ->execute();
                }

                foreach ($value['utilities'] as $_utilitie_key => $_utilitie_value) {
                    db_insert('golf_booking_utilitie') // Table name no longer needs {}
                    ->fields(array(
                        'utilitie_price' => $_utilitie_value['price'],
                        'utilitie_name' => $_utilitie_value['utility']->title,
                        'quantity'=>$_utilitie_value['quantity'],
                        'teaTimeId' => $tea_time_id
                    ))
                        ->execute();
                }
            }

            foreach ($data['booking']['tea_times'] as $key => $value) {
                $tea_time = $value['tea_time'];
                $tea_time->field_c_t_t_player['und'][0]['value'] = (int)$tea_time->field_c_t_t_player['und'][0]['value'] + count($value['players']);
                node_save($tea_time);
            }

            if(!empty($data['booking']['promotion']) && $data['booking']['promotion']->status == 0){
                db_update('promotion')
                    ->fields(array(
                        'status' => 1,
                    ))
                    ->condition('code', $data['booking']['promotion']->code, '=')
                    ->execute();
            }
            $data['code'] = $code;
            $booking_golf_complete_key = $code;
            drupal_goto('manager/booking/golf_bookings');

        }catch (Exception $e) {
            $transaction->rollback();
            drupal_set_message('Hệ thống đang bận vui lòng quay lại sau ít phút', 'error');
            drupal_goto('manager/booking/golf_bookings');
        }

    }else {
        drupal_set_message($error, 'error');
        drupal_goto('manager/tea-times');
    }

}
//0828967244

function cassiopeia_golf_edit_booking_form($form, &$form_state , $booking) {
    $form = array();
    $form['#booking'] = $booking;
    if($form['#booking']->status == 1 || $form['#booking']->status == 2) {
        $form['booking_status'] = array(
            '#type' => 'select',
            '#title' => 'Trạng thái',
            '#options' => array(
                0 => 'Hủy',
                1 => 'Chờ',
                2 => 'Đã thanh toán'
            ),
            '#default_value' => $form['#booking']->status,
        );
    }else {
        $form['booking_status'] = array(
            '#type' => 'select',
            '#title' => 'Trạng thái',
            '#options' => array(
                0 => 'Hủy',
                1 => 'Chờ',
                2 => 'Đã thanh toán'
            ),
            '#default_value' => $form['#booking']->status,
            '#attributes' =>array('readonly'=>TRUE)
        );
    }

    $form['submit'] = array('#type' => 'submit', '#value' => 'Cập nhật', '#attributes'=>array('class'=>array('btn btn-success')));
    $form['#theme'][] = 'cassiopeia_golf_edit_booking_form';
    return $form;
}

function cassiopeia_golf_edit_booking_form_submit($form, &$form_state) {
    global  $user;
    switch ($form['#booking']->status){
        case 0:
            $_status = "Hủy";
            break;
        case 1 :
            $_status = "Đang chờ";
            break;
        default:  $_status = "Hoàn thành"; break;
    }
    switch ($form_state['values']['booking_status']){
        case 0:
            $_status_2 = "Hủy";
            break;
        case 1 :
            $_status_2 = "Đang chờ";
            break;
        default:  $_status_2 = "Hoàn thành";
            break;
    }
//    print_r($form['#booking']);die;
    $_golf = node_load($form['#booking']->golfId);
    if($form['#booking']->status != 10){
        if ((int)$form_state['values']['booking_status'] == 0 ) { //  hủy
            $tee_times = $form['#booking']->tea_times;
            if($form['#booking']->status ==1){ // chờ -> hủy
                if(!empty($_golf->field_ctype_golf_live['und'][0]['value'])){ // live
                    foreach($tee_times as $tee_time){
                        $tee = node_load($tee_time->tea_time_id);
                        $tee->field_c_t_t_player['und'][0]['value'] = (int)$tee->field_c_t_t_player['und'][0]['value'] - count($tee_time->players);
                        node_save($tee);
                    }
                }
            }else{ // hoàn thành -> hủy
                foreach($tee_times as $tee_time){
                    $tee = node_load($tee_time->tea_time_id);
                    $tee->field_c_t_t_player['und'][0]['value'] = (int)$tee->field_c_t_t_player['und'][0]['value'] - count($tee_time->players);
                    node_save($tee);
                }
            }
            try{
                $cassiopeia_config_mail_form_booking_golf_cancel_content = variable_get('cassiopeia_config_mail_form_booking_golf_cancel_content', array(
                    'value' => '',
                    'format' => 'full_html'
                ));
                if(!empty($cassiopeia_config_mail_form_booking_golf_cancel_content['value'])){
                    $content = $cassiopeia_config_mail_form_booking_golf_cancel_content['value'];
                    $content = str_replace("#name",$form['#booking']->contact_name,$content);
                }else{
                    $content = "";
                }
                $cassiopeia_config_mail_form_booking_golf_cancel_end_content = variable_get('cassiopeia_config_mail_form_booking_golf_cancel_end_content', array(
                    'value' => '',
                    'format' => 'full_html'
                ));
                if(!empty($cassiopeia_config_mail_form_booking_golf_cancel_end_content['value'])){
                    $content2 = $cassiopeia_config_mail_form_booking_golf_cancel_end_content['value'];
                    $content2 = str_replace("#name",$form['#booking']->contact_name,$content2);
                }else{
                    $content2 = "";
                }
                $site_mail = variable_get("site_mail");
                $mail_title = variable_get("cassiopeia_config_mail_form_booking_golf_cancel_admin_title");
                $mail_title = str_replace("#code",$form['#booking']->code,$mail_title);
//                $body[] = $content;
                $additional_content = "Đơn hàng số ".$form['#booking']->code."đã bị hủy do quá thời gian thanh toán .";
                $body[] = _cassiopeia_render_theme("module","cassiopeia","templates/nodes/golf_cancel_template.tpl.php",array("data"=>$form['#booking'],"additional_content"=>$content,"additional_content2"=>$content2));;
                $headers['From'] = $headers['Sender'] = $headers['Return-Path'] = $site_mail;
                $headers['MIME-Version'] = '1.0';
                $headers['Content-Type'] = 'text/html; charset=UTF-8; format=flowed; delsp=yes';
                $players = "";
                foreach($form['#booking']->tea_times as $tee_time){
                    foreach($tee_time ->players as $player){
                        if(!empty($player->player_email)){
                            $players .= ",".$player->player_email;
                        }
                    }
                }
                $params = array(
                    'body' => $body,
                    'subject' => $mail_title,
                    'headers' => $headers,
                    'players' => $players,
                );
                $cassiopeia_config_mail_form_tee_times_mail = variable_get("cassiopeia_config_mail_form_tee_times_mail");
                if(!empty($form['#booking']->promotion_code)){
                    db_update("promotion")->fields(array("status"=>0))->condition("code",$form['#booking']->promotion_code,"=")->execute();
                }
                drupal_mail('cassiopeia', 'golf-booking-mail', $form['#booking']->contact_mail, language_default(), $params);
                drupal_mail('cassiopeia', 'discount-registration', $cassiopeia_config_mail_form_tee_times_mail, language_default(), $params);
//                drupal_mail('cassiopeia', 'discount-registration', "huutrung230292@gmail.com", language_default(), $params);
            }catch(Exception $e){
//                print($e);
            }
        }else if((int)$form_state['values']['booking_status'] == 1){ // chờ
            if($form['#booking']->status ==0){ // hủy->chờ
                if(!empty($form['#booking']->promotion_code)){
                    db_update("promotion")->fields(array("status"=>1))->condition("code",$form['#booking']->promotion_code,"=")->execute();
                }
                $tee_times = $form['#booking']->tea_times;
                if(!empty($_golf->field_ctype_golf_live['und'][0]['value'])){
                    foreach($tee_times as $tee_time){
                        $tee = node_load($tee_time->tea_time_id);
                        $tee->field_c_t_t_player['und'][0]['value'] = (int)$tee->field_c_t_t_player['und'][0]['value'] + count($tee_time->players);
                        node_save($tee);
                    }
                }
            }else{ // hoàn thành -> chờ
                if(empty($_golf->field_ctype_golf_live['und'][0]['value']) || $_golf->field_ctype_golf_live['und'][0]['value']!=1 ){ // không live
                    $tee_times = $form['#booking']->tea_times;
                    foreach($tee_times as $tee_time){
                        $tee = node_load($tee_time->tea_time_id);
                        $tee->field_c_t_t_player['und'][0]['value'] = (int)$tee->field_c_t_t_player['und'][0]['value'] - count($tee_time->players);
                        node_save($tee);
                    }
                }
            }

        }elseif((int)$form_state['values']['booking_status'] != $form['#booking']->status){ //hoàn thành
            if(!empty($form['#booking']->uid) && $user->uid != $form['#booking']->uid){
                if(!empty($form['#booking']->promotion_code)){
                    db_update("promotion")->fields(array("status"=>1))->condition("code",$form['#booking']->promotion_code,"=")->execute();
                }
                $__user = user_load($form['#booking']->uid);
                if(user_has_role(9,$__user)){
                    $score = (int)($form['#booking']->totals/100000);

                    if (!empty($__user->field_account_score['und'][0]['value']) ) {
                        $__user->field_account_score['und'][0]['value'] = (int)$__user->field_account_score['und'][0]['value'] +$score;
                    }else {
                        $__user->field_account_score['und'][0]['value'] = (int)$__user->field_account_score['und'][0]['value'] +$score;
                    }
                    user_save($__user);
                    drupal_set_message('Cập nhật đơn hàng '. $form['#booking']->code . ' Thành công tài khoản '.$__user->mail.' được cộng thêm '.$score.' điểm thưởng.', 'status');
                }else{
                    drupal_set_message('Cập nhật đơn hàng '. $form['#booking']->code . ' Thành công.', 'status');
                }

            }else{
                drupal_set_message('Cập nhật đơn hàng '. $form['#booking']->code . ' Thành công.', 'status');
            }
            $cassiopeia_config_mail_form_booking_golf_confirm_content = variable_get('cassiopeia_config_mail_form_booking_golf_confirm_content', array(
                'value' => '',
                'format' => 'full_html'
            ));
            if(!empty($cassiopeia_config_mail_form_booking_golf_confirm_content['value'])){
                $content = $cassiopeia_config_mail_form_booking_golf_confirm_content['value'];
            }else{
                $content = "";
            }
            $cassiopeia_config_mail_form_booking_golf_confirm_end_content = variable_get('cassiopeia_config_mail_form_booking_golf_confirm_end_content', array(
                'value' => '',
                'format' => 'full_html'
            ));
            if(!empty($cassiopeia_config_mail_form_booking_golf_confirm_end_content['value'])){
                $content2 = $cassiopeia_config_mail_form_booking_golf_confirm_end_content['value'];
            }else{
                $content2 = "";
            }
            $site_mail = variable_get("site_mail");
            $tour_mail = variable_get("cassiopeia_config_mail_form_tour_mail");
            $mail_title = variable_get("cassiopeia_config_mail_form_booking_golf_confirm_title");
            $mail_title = str_replace("#code",$form['#booking']->code,$mail_title);
            $body[] = _cassiopeia_render_theme("module","cassiopeia","templates/nodes/golf_cancel_template.tpl.php",array("data"=>$form['#booking'],"additional_content"=>$content,"additional_content2"=>$content2));;
            $headers['From'] = $headers['Sender'] = $headers['Return-Path'] = $site_mail;
            $headers['MIME-Version'] = '1.0';
            $headers['Content-Type'] = 'text/html; charset=UTF-8; format=flowed; delsp=yes';
            $players = "";
            foreach($form['#booking']->tea_times as $tee_time){
                foreach($tee_time ->players as $player){
                    if(!empty($player->player_email)){
                        $players .= ",".$player->player_email;
                    }
                }
            }
            $params = array(
                'body' => $body,
                'subject' => $mail_title,
                'headers' => $headers,
                'players' => $players,
            );
            $cassiopeia_config_mail_form_tee_times_mail = variable_get("cassiopeia_config_mail_form_tee_times_mail");
            drupal_mail('cassiopeia', 'golf-booking-mail', $form['#booking']->contact_mail, language_default(), $params);
            drupal_mail('cassiopeia', 'discount-registration', $cassiopeia_config_mail_form_tee_times_mail, language_default(), $params);
            if($form['#booking']->status ==0){ //hủy -> thành công
                $tee_times = $form['#booking']->tea_times;
                foreach($tee_times as $tee_time){
                    $tee = node_load($tee_time->tea_time_id);
                    $tee->field_c_t_t_player['und'][0]['value'] = (int)$tee->field_c_t_t_player['und'][0]['value'] + count($tee_time->players);
                    node_save($tee);
                }
            }else{ // chờ -> thành công
                if(empty($_golf->field_ctype_golf_live['und'][0]['value']) || $_golf->field_ctype_golf_live['und'][0]['value']!=1 ){ // không live
                    $tee_times = $form['#booking']->tea_times;
                    foreach($tee_times as $tee_time){
                        $tee = node_load($tee_time->tea_time_id);
                        $tee->field_c_t_t_player['und'][0]['value'] = (int)$tee->field_c_t_t_player['und'][0]['value'] + count($tee_time->players);
                        node_save($tee);
                    }
                }
            }
        }
        $updated = db_update('golf_booking')
            ->fields(array('status' => $form_state['values']['booking_status'],))
            ->condition ('code', $form['#booking']->code, '=')
            ->execute();
        $query = db_insert("tbl_notify");
        $query -> fields(array(
            'title' => t('Cập nhật đơn hàng'),
            'from_uid' => 3,
            'to_uid' => -1,
            'created' => REQUEST_TIME,
            'status' => 0,
            'message_vi' => 'Đơn hàng có mã '.$form['#booking']->code.' đã được '.$user->name.' cập nhật trạng thái từ '.$_status.' thành '.$_status_2."<a href='/manager/edit/golf-booking/".$form['#booking']->code."'>Xem chi tiết</a>",
        ));
        $query->execute();
        drupal_set_message('Cập nhật đơn hàng '. $form['#booking']->code . ' Thành công.', 'status');
        $form_state['redirect'] = 'manager/booking/golf_bookings';

    }else{
        drupal_set_message("Đơn hàng đã bị hủy, không thể thay đổi trạng thái");
    }
};


function cassiopeia_change_user_score_form($form, &$form_state) {
    $form =  array();

    $form['user']= array(
        '#type' => 'textfield',
        '#title' => 'Tài khoản',
        '#size' => 60,
        '#maxlength' => 128,
        '#required' => TRUE,
        '#attributes' =>array('placeholder' => 'Tìm kiếm user'),
        '#autocomplete_path' => 'manager/autocomplete/user',
    );

    $form['change_score_type']= array(
        '#type' => 'select',
        '#title' => 'Kiểu',
        '#options' => array(
            0 => 'Trừ điểm',
            1 => 'Cộng điểm',
        ),
        '#required' => TRUE,
    );

    $form['score']= array(
        '#type' => 'textfield',
        '#title' => 'Điểm',
        '#size' => 60,
        '#maxlength' => 128,
        '#required' => TRUE,
    );

//todo

    $form['submit'] = array('#type' => 'submit', '#value' => 'Lưu', '#attributes'=>array('class'=>array('btn btn-success')));
    return $form;
}

function cassiopeia_change_user_score_form_validate($form, &$form_state) {
    if(!empty($form_state['values']['user'])) {
        $matches = null;
        preg_match('/\[uid:(.*)\]/', $form_state['values']['user'], $matches);
        if(isset($matches[1]) && is_numeric($matches[1])) {
            $_player = user_load($matches[1]);
            if(empty($_player)) {
                form_set_error('user', 'User không hợp lệ.');
            }
        }else {
            form_set_error('user', 'User không hợp lệ.');
        }
    }

    if(!empty($form_state['values']['score'])) {
        if(!is_numeric($form_state['values']['score'])) {
            form_set_error('score', 'Điểm không hợp lệ.');
        }
    }

}

function cassiopeia_change_user_score_form_submit($form, &$form_state){

    try {
        $user = null;
        $matches = null;
        preg_match('/\[uid:(.*)\]/', $form_state['values']['user'], $matches);
        if(isset($matches[1]) && is_numeric($matches[1])) {
            $user = user_load($matches[1]);
        }
        if (!empty($user->uid)) {
            if($form_state['values']['change_score_type'] == 0) {
                if (!empty($user->field_account_score['und'][0]['value'])) {
                    $score = $user->field_account_score['und'][0]['value'] - $form_state['values']['score'];
                    if ($score >= 0) {
                        $user->field_account_score['und'][0]['value']  = $score;
                    }else {
                        $user->field_account_score['und'][0]['value']  = 0;
                    }
                }else {
                    $user->field_account_score['und'][0]['value']  = 0;
                }
            }elseif ($form_state['values']['change_score_type'] == 1) {
                if (!empty($user->field_account_score['und'][0]['value'])) {
                    $user->field_account_score['und'][0]['value'] = $user->field_account_score['und'][0]['value'] + $form_state['values']['score'];
                }else {
                    $user->field_account_score['und'][0]['value']  = $form_state['values']['score'];
                }
            }
            user_save($user);
            drupal_set_message('Thao tác thành công, điểm thưởng của user '. $user->mail .' là '.$user->field_account_score['und'][0]['value']. '.');
        }
    }catch (Exception $e) {
        drupal_set_message('Hệ thống đang bận vui lòng quay lại sau ít phút.');
    }




};

//----------------- develop by Trung ------------------

function cassiopeia_tour_booking_form($form,&$form_state,$golf_tour){
    global $user;
    $_user = empty($user->uid)?null:user_load($user->uid);
    $form = array();
    $form['#golf_tour'] = $golf_tour;
    $form['contact_full_name'] = array(
        '#title' => t('Full name:'),
        '#type' => 'textfield',
        '#size' => 60,
        '#maxlength' => 128,
        '#required' => TRUE,
        '#default_value' => empty($_user->field_account_full_name['und'][0]['value'])?'':$_user->field_account_full_name['und'][0]['value'],

    );
    $form['contact_email'] = array(
        '#title' => t('Email:'),
        '#type' => 'textfield',
        '#size' => 60,
        '#maxlength' => 128,
        '#required' => TRUE,
        '#default_value' => empty($_user->mail)?'':$_user->mail,

    );
    $form['contact_tel'] = array(
        '#title' => t('Phone number:'),
        '#type' => 'textfield',
        '#size' => 60,
        '#maxlength' => 128,
        '#required' => TRUE,
        '#default_value' => empty($_user->field_account_phone['und'][0]['value'])?'':$_user->field_account_phone['und'][0]['value'],

    );
    $form['contact_area'] = array(
        '#title' => t('City:'),
        '#type' => 'textfield',
        '#size' => 60,
        '#maxlength' => 128,
        '#required' => true,
//        '#default_value' => 'Việt nam',
    );
    $form['contact_country'] = array(
        '#title' => t('Nationnality:'),
        '#type' => 'textfield',
        '#size' => 60,
        '#maxlength' => 128,
        '#required' => true,
        '#default_value' => 'Việt nam',
//        '#attributes' =>array('placeholder' => 'Email','readonly' => 'readonly')
    );
    $form['contact_address'] = array(
        '#title' => t('Address:'),
        '#type' => 'textfield',
        '#size' => 60,
        '#maxlength' => 128,
        '#required' => false,
        '#default_value' => empty($_user->field_account_address['und'][0]['value'])?'':$_user->field_account_address['und'][0]['value'],
//        '#attributes' =>array('placeholder' => 'Email','readonly' => 'readonly')
    );
//    $form['contact_gender'] = array(
//        '#type' => 'radios',
//        '#title' => t('Giới tính:'),
//        '#default_value' => 1,
//        '#options' => array(1=>"Nam",0=>"Nữ"),
////        '#description' => t('When a poll is closed, visitors can no longer vote for it.'),
////        '#access' => $admin,
//    );
    $form['start_date'] = array(
        '#type' => 'date_popup',
        '#default_value' => REQUEST_TIME,
        '#date_type' => DATE_DATETIME,
        '#date_timezone' => date_default_timezone(),
        '#date_format' => 'm/d/Y',
        '#date_increment' => 1,
        '#date_year_range' => '-3:+3',
        '#required' => TRUE,
    );
    $form['end_date'] = array(
        '#type' => 'date_popup',
        '#default_value' => REQUEST_TIME,
        '#date_type' => DATE_DATETIME,
        '#date_timezone' => date_default_timezone(),
        '#date_format' => 'm/d/Y',
        '#date_increment' => 1,
        '#date_year_range' => '-3:+3',
        '#required' => TRUE,
    );
    $form['contact_player'] = array(
        '#type' => 'textfield',
        '#title' => t('Golfer:'),
        '#required' => TRUE,
        '#attributes' => array("placeholder"=>t("Number of golfer")),
//        '#description' => t('Set this to <em>Yes</em> if you would like this category to be selected by default.'),
    );
    $form['contact_non_player'] = array(
        '#type' => 'textfield',
        '#title' => t('Non-Golfer:'),
        '#required' => TRUE,
        '#attributes' => array("placeholder"=>t("Number of non-golfer")),
//        '#default_value' => $category['selected'],
//        '#description' => t('Set this to <em>Yes</em> if you would like this category to be selected by default.'),
    );
    $form['contact_children'] = array(
        '#type' => 'textfield',
        '#title' => t('Children:'),
        '#attributes' => array("placeholder"=>t("Number of children")),
//        '#default_value' => $category['selected'],
//        '#description' => t('Set this to <em>Yes</em> if you would like this category to be selected by default.'),
    );
    $form['contact_round'] = array(
        '#title' => t('Rounds of golf / golfer:'),
        '#type' => 'textfield',
        '#size' => 60,
        '#maxlength' => 128,
        '#required' => false,
//        '#default_value' => $_user->mail,
//        '#attributes' =>array('placeholder' => 'Email','readonly' => 'readonly')
    );
    $form['promotion_code'] = array(
        '#title' => t('Promotion code:'),
        '#type' => 'textfield',
        '#size' => 60,
        '#maxlength' => 128,
        '#required' => FALSE,
        '#element_validate'=> array('tour_booking_check_promotion_code'),
//        '#default_value' => $_user->mail,
//        '#attributes' =>array('placeholder' => 'Email','readonly' => 'readonly')
    );
//    $arg = $variables['arg'];
//    $form['golf_tour_id'] = array(
//        '#title' => t(''),
//        '#type' => 'textfield',
//        '#size' => 60,
//        '#maxlength' => 128,
//        '#required' => TRUE,
//        '#default_value' => $_array['golf_tour_id'],
////        '#attributes' =>array('placeholder' => 'Email','readonly' => 'readonly')
//    );
//    $form['golf_tour_cost'] = array(
//        '#title' => t(''),
//        '#type' => 'textfield',
//        '#size' => 60,
//        '#maxlength' => 128,
//        '#required' => TRUE,
//        '#default_value' => $_array['golf_tour_price'],
////        '#attributes' =>array('placeholder' => 'Email','readonly' => 'readonly')
//    );
    $form['submit'] = array('#type' => 'submit', '#value' => t('Book this tour'));
    $form['#theme'][] = 'cassiopeia_tour_booking_form';
    return $form;
}
function cassiopeia_tour_booking_edit_form($form,&$form_state,$golf_tour,$booking){
    global $user;
//    print_r($booking);
    $_user = empty($user->uid)?null:user_load($user->uid);
    $form = array();
    $form['#golf_tour'] = $golf_tour;
    $form['#booking'] = $booking;
    $form['contact_full_name'] = array(
        '#title' => t('Họ tên:'),
        '#type' => 'textfield',
        '#size' => 60,
        '#maxlength' => 128,
        '#required' => TRUE,
        '#default_value' => empty($booking->contact_name)?'':$booking->contact_name,

    );
    $form['contact_email'] = array(
        '#title' => t('Email:'),
        '#type' => 'textfield',
        '#size' => 60,
        '#maxlength' => 128,
        '#required' => TRUE,
        '#default_value' => empty($booking->contact_mail)?'':$booking->contact_mail,

    );
    $form['contact_tel'] = array(
        '#title' => t('Số điện thoại:'),
        '#type' => 'textfield',
        '#size' => 60,
        '#maxlength' => 128,
        '#required' => TRUE,
        '#default_value' => empty($booking->contact_phone)?'':$booking->contact_phone,

    );
    $vocal = taxonomy_vocabulary_machine_name_load("tx_area",0,1);
    $tx_areas = taxonomy_get_tree($vocal->vid);
    $options = array();
    $option_attrs = array();
    foreach($tx_areas as $key => $value){
//        $options[$value->tid] = $value->name;
        $children = taxonomy_get_children($value->tid);
        if(!empty($children)){
            foreach($children as $child){
                $options[$child->tid] = $child->name;
            }
        }
    }
    $form['contact_area'] = array(
        '#type' => 'textfield',
        '#size' => 60,
        '#maxlength' => 128,
        '#title' => t('Tỉnh / TP'),
        '#required' => TRUE,
        '#default_value' => $booking->contact_province,
//        '#description' => t('Set this to <em>Yes</em> if you would like this category to be selected by default.'),
    );
    $form['booking_status'] = array(
        '#type' => 'select',
        '#title' => t('Trạng thái đơn hàng'),
        '#options' => array(
            "0"     => "Đã hủy",
            "1"     => "Đang chờ",
            "3"     => "Xác nhận",
            "2"     => "Hoàn thành",
        ),
        '#required' => TRUE,
        '#default_value' => $booking->status,
//        '#description' => t('Set this to <em>Yes</em> if you would like this category to be selected by default.'),
    );
    $form['contact_address'] = array(
        '#title' => t('Địa chỉ'),
        '#type' => 'textfield',
        '#size' => 60,
        '#maxlength' => 128,
        '#required' => false,
        '#default_value' => empty($booking->contact_address)?'':$booking->contact_address,
//        '#attributes' =>array('placeholder' => 'Email','readonly' => 'readonly')
    );
    $form['contact_gender'] = array(
        '#type' => 'hiđ',
        '#title' => t('Giới tính:'),
        '#default_value' => empty($booking->gender)?1:$booking->gender,
        '#options' => array(1=>"Nam",0=>"Nữ"),
//        '#description' => t('When a poll is closed, visitors can no longer vote for it.'),
//        '#access' => $admin,
    );
    $form['start_date'] = array(
        '#type' => 'date_popup',
        '#default_value' => date("Y-m-d H:i",$booking->start_date),
        '#date_type' => DATE_DATETIME,
        '#date_timezone' => date_default_timezone(),
        '#date_format' => 'm/d/Y',
        '#date_increment' => 1,
        '#date_year_range' => '-3:+3',
        '#required' => TRUE,
    );
    $form['end_date'] = array(
        '#type' => 'date_popup',
        '#default_value' => date("Y-m-d H:i",$booking->end_date),
        '#date_type' => DATE_DATETIME,
        '#date_timezone' => date_default_timezone(),
        '#date_format' => 'm/d/Y',
        '#date_increment' => 1,
        '#date_year_range' => '-3:+3',
        '#required' => TRUE,
    );
    $form['contact_player'] = array(
        '#type' => 'textfield',
        '#title' => t('Golfer:'),
        '#attributes' => array("placeholder"=>"Nhập số Golfer"),
        '#default_value' => $booking->player,
//        '#description' => t('Set this to <em>Yes</em> if you would like this category to be selected by default.'),
    );
    $form['contact_non_player'] = array(
        '#type' => 'textfield',
        '#title' => t('Non-Golfer:'),
        '#attributes' => array("placeholder"=>"Nhập số Non-Golfer"),
        '#default_value' => $booking->people_dont_play,
//        '#default_value' => $category['selected'],
//        '#description' => t('Set this to <em>Yes</em> if you would like this category to be selected by default.'),
    );
    $form['contact_children'] = array(
        '#type' => 'textfield',
        '#title' => t('Trẻ em:'),
        '#attributes' => array("placeholder"=>"Nhập số trẻ em"),
        '#default_value' => $booking->children,
//        '#default_value' => $category['selected'],
//        '#description' => t('Set this to <em>Yes</em> if you would like this category to be selected by default.'),
    );
    $form['contact_round'] = array(
        '#title' => t('Số vòng mong muốn/ golfer:'),
        '#type' => 'textfield',
        '#size' => 60,
        '#maxlength' => 128,
        '#required' => false,
        '#default_value' => $booking->round,
//        '#default_value' => $_user->mail,
//        '#attributes' =>array('placeholder' => 'Email','readonly' => 'readonly')
    );
    $form['promotion_code'] = array(
        '#title' => t('Promotion code:'),
        '#type' => 'textfield',
        '#size' => 60,
        '#maxlength' => 128,
        '#required' => FALSE,
        '#element_validate'=> array('tour_booking_check_promotion_code'),
        '#default_value' => empty($booking->promotion_code)?"":$booking->promotion_code,
        '#attributes'   => array("data-nid"=>$golf_tour->nid),
    );
    $form['new_price'] = array(
        '#title' => t('Giá tiền:'),
        '#type' => 'textfield',
        '#size' => 60,
        '#maxlength' => 128,
        '#required' => true,
//        '#element_validate' => array('check_is_number'),
        '#default_value' => $booking->total_cost,
    );
    $form['note'] = array(
        '#title' => t('Ghi chú:'),
        '#type' => 'textarea',
//        '#size' => 60,
//        '#maxlength' => 128,
        '#default_value' => $booking->note,
        '#required' => FALSE,
    );
    $form['submit'] = array('#type' => 'submit', '#value' => t('Cập nhật'));
    $form['#theme'][] = 'cassiopeia_tour_booking_form_edit';
    return $form;
}
//function check_is_number($element, &$form_state) {
//    print($element['#value']);die;
//    print_r(is_numeric($element['#value']));die;
//    if(!is_numeric($element['#value'])){
//        form_set_error($element, t('Error on these elements!'));
//    }
//}
function tour_booking_check_promotion_code($form,&$form_state){
//    $promotion = cassiopeia_get_promotion_card_by_code($form_state['values']['promotion_code'],2);
//    if(empty($promotion)){
//        drupal_set_message("asdf");
//        form_set_error("promotion_code",t("Promotion code is not exists or has expired"));
//    }
}
function cassiopeia_tour_booking_form_submit($form,&$form_state){
    global $user;

    $golf_tour = $form['#golf_tour'];
    $promotion = cassiopeia_get_promotion_card_by_code($form_state['values']['promotion_code'],2);
    $promotion_value = 0;

    $total_cost = !empty($golf_tour->field_ctype_tour_pprice['und'][0]['value'])?$golf_tour->field_ctype_tour_pprice['und'][0]['value']:$golf_tour->field_ctype_tour_price['und'][0]['value'];
    if(!empty($promotion) && $promotion->status ==0) {
        if ($promotion->amount_type == 0) {
            $promotion_value = $promotion->amount;
        }else {
            $promotion_value = $promotion->amount*$total_cost/100;
        }
    }
    $total_cost-=$promotion_value;

    $booking = array();
    foreach($form_state['values'] as $key => $value){
        if(isset($form_state['values'][$key])){
            $booking[$key] = $value;
//            print($key);
        }
    }
    $booking['created'] = REQUEST_TIME;
    $booking['status'] = 0;
    try{
        $query = db_select('tbl_golf_tour_booking', 'tbl_golf_tour_booking')
            ->fields('tbl_golf_tour_booking')
            ->execute();
        $num = $query->rowCount();

        $today = getdate();
        if($today['year']==2020){
            $part1 = 20;
        }else{
            $part1 = str_replace("20","",$today['year']);
        }
        $_query = db_select("tbl_generator_code","tbl_generator_code");
        $_query -> fields("tbl_generator_code");
        $_query -> condition("id",2302);
        $_query -> range(0,1);
        $_result = $_query->execute()->fetchAssoc();
        if(!empty($_result)){
            $code = $_result['code']+1;
            db_update("tbl_generator_code")->condition("id",2302)->fields(array("code"=>$code))->execute();
        }else{
            $code = 210319;
            db_insert("tbl_generator_code")->fields(
                array(
                    "id"    =>2302,
                    "code"  => $code,
                )
            )->execute();
        }
        $code = 'DH'.$code;

        $promotion_code = empty($form_state['values']['promotion_code'])?"":$form_state['values']['promotion_code'];
        $result = db_insert('tbl_golf_tour_booking') // Table name no longer needs {}
        ->fields(array(
            'code' => $code,
            'uid' => $user->uid,
            'contact_name' => $booking['contact_full_name'],
            'contact_mail' => $booking['contact_email'],
            'contact_phone' => $booking['contact_tel'],
            'contact_address' => $booking['contact_address'],
            'contact_province' => $booking['contact_area'],
            'contact_country' => $booking['contact_country'],
            'golf_tour_id' => $golf_tour->nid,
            'created' => $booking['created'],
            'total_cost' => $total_cost,
            'status' => 1,
            'start_date' => strtotime($booking['start_date']),
            'end_date' => strtotime($booking['end_date']),
            'player' => $booking['contact_player'],
            'people_dont_play' => $booking['contact_non_player'],
            'children' => !empty($booking['contact_children'])?$booking['contact_children']:0,
            'round' => !empty($booking['contact_round'])?$booking['contact_round']:null,
//            'gender' => $booking['contact_gender'],
            'promotion_code' => $promotion_code,
        ))
            ->execute();
        $tour_booking = array(
            'code' => $code,
            'tour' => $golf_tour,
            'contact_name' => $booking['contact_full_name'],
            'contact_mail' => $booking['contact_email'],
            'contact_phone' => $booking['contact_tel'],
            'contact_address' => $booking['contact_address'],
            'contact_province' => $booking['contact_area'],
            'golf_tour_id' => $golf_tour->nid,
            'created' => $booking['created'],
            'total_cost' => $total_cost,
            'status' => 1,
            'start_date' => strtotime($booking['start_date']),
            'end_date' => strtotime($booking['end_date']),
            'player' => $booking['contact_player'],
            'people_dont_play' => $booking['contact_non_player'],
            'children' => $booking['contact_children'],
            'round' => $booking['contact_round'],
//            'gender' => $booking['contact_gender'],
            'promotion_code' => $promotion_code,
        );
        $site_mail = variable_get("site_mail");
        $tour_mail = variable_get("cassiopeia_config_mail_form_tour_mail");
        $subject  = variable_get("cassiopeia_config_mail_form_booking_tour_title");
        $subject = str_replace("#code",$code,$subject);
        $content1 = variable_get('cassiopeia_config_mail_form_booking_tour_content_1', array(
            'value'  => '',
            'format' => 'full_html'
        ));
        $content1 = str_replace("#name",$booking['contact_full_name'],$content1);
        $content3 = variable_get('cassiopeia_config_mail_form_booking_tour_content_3', array(
            'value'  => '',
            'format' => 'full_html'
        ));
        $content2 = variable_get('cassiopeia_config_mail_form_booking_tour_content_2', array(
            'value'  => '',
            'format' => 'full_html'
        ));
        $body[] = _cassiopeia_render_theme("module","cassiopeia","templates/nodes/tour_booking_mail_template.tpl.php",array("tour_booking"=>$tour_booking,"content1"=>$content1['value'],"content2"=>$content2['value'],"content3"=>$content3['value']));
        $headers['From'] = $headers['Sender'] = $headers['Return-Path'] = $site_mail;
        $headers['MIME-Version'] = '1.0';
        $headers['Content-Type'] = 'text/html; charset=UTF-8; format=flowed; delsp=yes';
        $params = array(
            'body' => $body,
            'subject' => $subject,
            'headers' => $headers,
        );
        drupal_mail('cassiopeia', 'discount-registration', $tour_mail, language_default(), $params);
        drupal_mail('cassiopeia', 'discount-registration', $tour_booking['contact_mail'], language_default(), $params);
        $data = array();
        $data['booking']['contact']['contact_name'] = $booking['contact_full_name'];
        $data['booking']['contact']['contact_phone'] = $booking['contact_tel'];
        $data['booking']['contact']['contact_mail'] = $booking['contact_email'];
        $data['booking']['contact']['contact_address'] = $booking['contact_address'];
        $data['booking']['totals'] = $total_cost;
        $data['booking']['order_code'] = $code;
        $data['tour'] = $golf_tour;
        $_check = null;
        $_check = cassiopeia_getfly_get_account_by_phone($data['booking']['contact']['contact_phone']);
        cassiopeia_send_tour_to_get_fly($data,$_check);
        $query = db_insert("tbl_notify");
        $query -> fields(array(
            'title' => t('Đặt tour')."Khách hàng ".$booking['contact_full_name']." vừa đặt tour ".$golf_tour->title.". Mã đơn hàng: ".$code,
            'from_uid' => 3,
            'to_uid' => -1,
            'created' => REQUEST_TIME,
            'status' => 0,
            'message_vi' => "Khách hàng ".$booking['contact_full_name']." vừa đặt tour ".$golf_tour->title.". Mã đơn hàng: ".$code,
        ));
        $query->execute();
        if(!empty($promotion)){
            db_update("promotion")->fields(array(
                "status" => 1,
            ))->condition("code",$promotion->code,"=")->execute();
        }
        drupal_set_message("Bạn đã đặt Tour thành công, chúng tôi sẽ liên hệ lại trong thời gian sớm nhất!");
        drupal_goto("/");
    }catch(Exception $e){
        var_dump($e);
        die;
//        throw $e;
    }

}
function cassiopeia_send_tour_to_get_fly($data,$_account=null){
    if(empty($_account)){
        $postData = array(
            'account' => array(
                "account_name" => $data['booking']['contact']['contact_name'],
                "phone_office"=>  $data['booking']['contact']['contact_phone'],
                "email"=> $data['booking']['contact']['contact_mail'],
//            "account_code" => "alegolf_".$data['booking']['contact']['contact_phone'],
                "billing_address_street"=> "",
                "account_type"=> 1,
//            "gender" => 1,
            ),
            "contacts"=> array(
                array(
                    "first_name"=> "",
                    "email"=> "",
                    "phone_mobile"=> "",
                )
            ),
            "referer" => array(
                "utm_source" =>  "https://getfly.vn",
                "utm_campaign" => "GetflyWebsite"
            )
        );
    }
    $products[] =array(
        "product_code" => "Alegolf_tour_".$data['tour']->nid,
        "product_name" => $data['tour']->title,
        "quantity" => 1,
        "price" => !empty($data['tour']->field_ctype_tour_pprice['und'][0]['value'])?$data['tour']->field_ctype_tour_pprice['und'][0]['value']:$data['tour']->field_ctype_tour_price['und'][0]['value'],
//            "cash_discount" => "",
//                "product_sale_off" => 10,
//                "cash_discount" => "1000" ,
    );
    if(!empty($_account)){
        $postData_order = array(
            "order_info" => array(
                "order_code" => $data['booking']['order_code'],
                "account_code" => $_account['records'][0]['account_code'],
                "account_name" => $data['booking']['contact']['contact_name'],
                "account_address" => $data['booking']['contact']['contact_address'],
                "account_phone" => $data['booking']['contact']['contact_phone'],
                "account_email" => $data['booking']['contact']['contact_mail'],
                "order_date" =>  date("d/m/Y",REQUEST_TIME),
                "amount" => $data['booking']['totals'],
//            "discount_amount" => $data['booking']['promotion_amount'],
            ),
            "products" => $products
        );
    }else{
        $postData_order = array(
            "order_info" => array(
                "order_code" => $data['booking']['order_code'],
                "account_name" => $data['booking']['contact']['contact_name'],
                "account_address" => $data['booking']['contact']['contact_address'],
                "account_phone" => $data['booking']['contact']['contact_phone'],
                "account_email" => $data['booking']['contact']['contact_mail'],
                "order_date" =>  date("d/m/Y",REQUEST_TIME),
                "amount" => $data['booking']['totals'],
//            "discount_amount" => $data['booking']['promotion_amount'],
            ),
            "products" => $products
        );
    }

    cassiopeia_getfly_post_campaigns ($postData_order,"order");
    if(empty($_account)){
        cassiopeia_getfly_post_campaigns ($postData);
    }
}
function cassiopeia_tour_booking_edit_form_submit($form,&$form_state){
    global $user;
//    print_r($form_state['values']);die;
    if(is_numeric($form_state['values']['new_price'])){
        $golf_tour = $form['#golf_tour'];
        $booking_tour = $form['#booking'];
        $promotion = cassiopeia_get_promotion_card_by_code($form_state['values']['promotion_code'],2);
        $promotion_value = 0;

        $total_cost = !empty($golf_tour->field_ctype_tour_pprice['und'][0]['value'])?$golf_tour->field_ctype_tour_pprice['und'][0]['value']:$golf_tour->field_ctype_tour_price['und'][0]['value'];
        if(!empty($promotion) && $promotion->status ==0) {
            if ($promotion->amount_type == 0) {
                $promotion_value = $promotion->amount;
            }else {
                $promotion_value = $promotion->amount*$total_cost/100;
            }
        }
        $total_cost-=$promotion_value;

        $booking = array();
        foreach($form_state['values'] as $key => $value){
            if(isset($form_state['values'][$key])){
                $booking[$key] = $value;
            }
        }
        $tour_booking = array(
            'code' => $booking_tour->code,
            'tour' => $golf_tour,
            'contact_name' => $booking['contact_full_name'],
            'contact_mail' => $booking['contact_email'],
            'contact_phone' => $booking['contact_tel'],
            'contact_address' => $booking['contact_address'],
            'contact_province' => $booking['contact_area'],
            'golf_tour_id' => $golf_tour->nid,
//        'created' => $booking['created'],
            'total_cost' => $booking['new_price'],
//        'status' => 1,
            'start_date' => strtotime($booking['start_date']),
            'end_date' => strtotime($booking['end_date']),
            'player' => $booking['contact_player'],
            'people_dont_play' => $booking['contact_non_player'],
            'children' => $booking['contact_children'],
            'round' => $booking['contact_round'],
//            'gender' => $booking['contact_gender'],
            'promotion_code' => $booking['promotion_code'],
        );
//    print($golf_tour->status);
//    print(" --- ");
//    print($booking['booking_status']);
//    die;
//    switch($booking['booking_status']){
//        case 0 : break;
//        case 0 : break;
//        case 0 : break;
//    }
        try{
            if($golf_tour->status != $booking['booking_status'] && $booking['booking_status']!=1){
                $button = false;
                switch ($booking['booking_status']){
                    case 0 : // hủy
                        if(!empty($booking_tour->promotion_code)){
                            db_update("promotion")->fields(array("status"=>0))->condition("code",$booking_tour->promotion_code,"=")->execute();
                        }
                        $subject  = variable_get("cassiopeia_config_mail_form_booking_tour_cancel_title");
                        $content1 = variable_get('cassiopeia_config_mail_form_booking_tour_cancel_content_1', array(
                            'value'  => '',
                            'format' => 'full_html'
                        ));
                        $content1 = str_replace("#name",$booking['contact_full_name'],$content1);
                        $content3 = variable_get('cassiopeia_config_mail_form_booking_tour_cancel_content_3', array(
                            'value'  => '',
                            'format' => 'full_html'
                        ));
                        break;
                    case 1 : // chờ

                        $subject = "Đơn hàng đặt tour đang chờ";
                        break;
                    case 2 : // hoàn thành
                        $subject  = variable_get("cassiopeia_config_mail_form_booking_tour_success_title");
                        $content1 = variable_get('cassiopeia_config_mail_form_booking_tour_success_content_1', array(
                            'value'  => '',
                            'format' => 'full_html'
                        ));
                        $content1 = str_replace("#name",$booking['contact_full_name'],$content1);
                        $content3 = variable_get('cassiopeia_config_mail_form_booking_tour_success_content_3', array(
                            'value'  => '',
                            'format' => 'full_html'
                        ));
                        break;
                    case 3 : // xác nhận đơn hàng
                        $subject  = variable_get("cassiopeia_config_mail_form_booking_tour_confirm_title");
                        $content1 = variable_get('cassiopeia_config_mail_form_booking_tour_confirm_content_1', array(
                            'value'  => '',
                            'format' => 'full_html'
                        ));
                        $content1 = str_replace("#name",$booking['contact_full_name'],$content1);
                        $content3 = variable_get('cassiopeia_config_mail_form_booking_tour_confirm_content_3', array(
                            'value'  => '',
                            'format' => 'full_html'
                        ));
                        $button = true;
                        break;
                }
                if($booking['booking_status']!=1){
                    $subject = str_replace("#code",$booking_tour->code,$subject);
                    $site_mail = variable_get("site_mail");
                    $tour_mail = variable_get("cassiopeia_config_mail_form_tour_mail");
                    $body[] = _cassiopeia_render_theme("module","cassiopeia","templates/nodes/tour_booking_mail_template.tpl.php",array("tour_booking"=>$tour_booking,"content1"=>$content1['value'],"content2"=>"","content3"=>$content3['value'],"button"=>$button));
                    $headers['From'] = $headers['Sender'] = $headers['Return-Path'] = $site_mail;
                    $headers['MIME-Version'] = '1.0';
                    $headers['Content-Type'] = 'text/html; charset=UTF-8; format=flowed; delsp=yes';
                    $params = array(
                        'body' => $body,
                        'subject' => $subject,
                        'headers' => $headers,
                    );
                    drupal_mail('cassiopeia', 'discount-registration', $tour_mail, language_default(), $params);
                    drupal_mail('cassiopeia', 'discount-registration', $booking['contact_email'], language_default(), $params);
                }
            }
            if($booking['booking_status']!=0 && $golf_tour->status==0){
                if(!empty($booking_tour->promotion_code)){
                    db_update("promotion")->fields(array("status"=>1))->condition("code",$booking_tour->promotion_code,"=")->execute();
                }
            }
            if($booking_tour->promotion_code != $form_state['values']['promotion_code']){
                db_update("promotion")->fields(array("status"=>0))->condition("code",$booking_tour->promotion_code,"=")->execute();
                db_update("promotion")->fields(array("status"=>1))->condition("code",$form_state['values']['promotion_code'],"=")->execute();
            }
            $promotion_code = empty($form_state['values']['promotion_code'])?"":$form_state['values']['promotion_code'];
            $result = db_update('tbl_golf_tour_booking') // Table name no longer needs {}
            ->fields(array(
                'contact_name' => $booking['contact_full_name'],
                'contact_mail' => $booking['contact_email'],
                'contact_phone' => $booking['contact_tel'],
                'contact_address' => $booking['contact_address'],
                'contact_province' => $booking['contact_area'],
                'total_cost' => $booking["new_price"],
                'note' => $booking["note"],
                'start_date' => strtotime($booking['start_date']),
                'end_date' => strtotime($booking['end_date']),
                'status' => $booking['booking_status'],
                'player' => $booking['contact_player'],
                'people_dont_play' => $booking['contact_non_player'],
                'children' => !empty($booking['contact_children'])?$booking['contact_children']:0,
                'round' => !empty($booking['contact_round'])?$booking['contact_round']:null,
//            'gender' => $booking['contact_gender'],
                'promotion_code' => $promotion_code,
            ))->condition("code","%".$booking_tour->code."%","LIKE")
                ->execute();

            drupal_set_message("Cập nhật đơn hàng thành công!");
            drupal_goto("/manager/booking/tour_bookings");
        }catch(Exception $e){
            var_dump($e);
            throw $e;
        }
    }


}

function cassiopeia_get_items_by_conditions ($conditions = array(),$bundles,$entity_type) {
    $nodes = array();
    try {
        $query = new EntityFieldQuery();
        $query->entityCondition('entity_type', $entity_type)
            ->entityCondition('bundle', $bundles);
        if (!empty($conditions) && is_array($conditions)) {
            foreach ($conditions as $condition_key => $condition_value) {
                if ($condition_value['type'] == 'propertyCondition') {
                    $query->propertyCondition($condition_key, $condition_value['value'],$condition_value['condition']);
                }elseif ($condition_value['type'] == 'fieldCondition') {
                    $query->fieldCondition($condition_key, $condition_value['key'], $condition_value['value'], $condition_value['condition']);
                }
                elseif ($condition_value['type'] == 'propertyOrderBy') {
                    $query->propertyOrderBy($condition_key, $condition_value['direction']);
                }
                elseif ($condition_value['type'] == 'fieldOrderBy') {
                    $query->fieldOrderBy($condition_key, $condition_value['column'], $condition_value['direction']);
                }
                elseif ($condition_value['type'] == 'range' && isset($condition_value['start']) && isset($condition_value['limit'])) {
                    $query->range($condition_value['start'], $condition_value['limit']);
                }
            }
        }
//        print((string)$query);
        $result = $query->execute();
        //        var_dump($result);die;
        if($entity_type=="node"){
            if (isset($result['node'])) {
                $node_nids = array_keys($result['node']);
                $nodes = entity_load('node', $node_nids);
            }
        }else if($entity_type=="taxonomy_term"){
            if($result['taxonomy_term']){
                $term_tids = array_keys($result['taxonomy_term']);

                $terms = taxonomy_term_load_multiple($term_tids);
                return $terms;
            }
        }
    }catch (Exception $e) {
        throw $e;
    }

    return $nodes;
}
function cassiopeia_get_rate_detail($nid){
    global $language;
    $sub_query = db_select("tbl_score","tbl_score_1");
    $sub_query->addField("tbl_score_1","uid","tbl_score_uid");
    $sub_query->addExpression('COUNT(tbl_score_1.uid)', 'uid_count');
    $sub_query->where('tbl_score_1.nid=:nid',array(":nid"=>$nid));
    $sub_query->groupBy('tbl_score_1.uid');
//    $result = $sub_query->execute()->fetchAll();
//    print_r($result);

    $query = db_select("tbl_score","tbl_score_2");
    $query->fields("tbl_score_2");
    $query->join($sub_query, 'tbl_score_a', 'tbl_score_a.tbl_score_uid = tbl_score_2.uid');
    $query->addExpression('SUM(tbl_score_2.score)', 'score_');
    $query->addExpression('COUNT(tbl_score_2.score)', 'count_');
    $query->join("tbl_rating_type", 'tbl_rating_type', 'tbl_rating_type.id = tbl_score_2.type');
    $query ->addField("tbl_rating_type","rating_name","rating_name");
    $query->where('tbl_score_a.uid_count>5');
    $query->groupBy('tbl_score_2.type');
    $result = $query->execute()->fetchAll();
//    print_r($result);
//    print_r((string)$query);
    return $result;
}
function cassiopeia_get_rate($nid){
    global  $language;
    $result = db_query('SELECT * FROM(SELECT n.uid,count(n.score) as number,sum(n.score) as total FROM {tbl_score} n WHERE n.nid = :nid  GROUP BY n.uid) as tbl where tbl.number>5',array(':nid'=>$nid));
    $result = $result->fetchAll();
//  var_dump($result);
    $average = 0;
    $score = 10;
    $customer_id="";
    if(!empty($result)){
        foreach($result as $key => $value){
            $total = $value->total;
            $temp = $total/$value->number;
            $average+=$temp;
//      print($average);
//        var_dump($value);
        }
        $score = round($average/count($result),1);
    }

    //<6đ là bình thường
    //6+ là tạm đc
    //7+ là tốt
    //8+ là rất tốt
    //8,5+ là tuyệt vời
    //9+ là tuyệt hảo
    //9,5+ là xuất sắc
    $rate = "";
    if($score<6){
        $rate = t('Normal');
    }else if($score<7){
        $rate = t('Pretty well');
    }else if($score<8){
        $rate = t('Good');
    }else if($score<8.5){
        $rate = t('Very good');
    }else if($score<9){
        $rate = t('Great');
    }else if($score<9.5){
        $rate = t('Wonderful');
    }else {
        $rate = t('Excellent');
    }
    if(count($result)<1){
        $rate="Chưa đánh giá";
    }
    $array = array();
    $array["score"] = $score;
    $array["rate"] = $rate;
    $array["total_rate"] = count($result);
    return $array;
}
//function cassiopeia_get_comment($nid){
//    global $language;
//
//    $result = db_query('SELECT * FROM(SELECT n.uid,count(n.score) as number,sum(n.score) as total FROM {tbl_score} n WHERE n.nid = :nid  GROUP BY n.uid) as tbl inner join {tbl_rating_comment} as tbl2 on tbl.uid = tbl2.uid where tbl.number>5',array(':nid'=>$nid));
//    $result = $result->fetchAll();
////    var_dump($result);
//    return $result;
//}
function cassiopeia_get_comment($nid){
    global $language;
    $sub_query = db_select("tbl_score","tbl_score_1");
    $sub_query->addField("tbl_score_1","uid","tbl_score_uid");
    $sub_query->addExpression('COUNT(tbl_score_1.uid)', 'uid_count');
    $sub_query->addExpression('COUNT(tbl_score_1.score)', 'number_');
    $sub_query->addExpression('SUM(tbl_score_1.score)', 'total_');
    $sub_query->where('tbl_score_1.nid=:nid',array(":nid"=>$nid));
    $sub_query->groupBy('tbl_score_1.uid');
//    $result = $sub_query->execute()->fetchAll();
//    print_r($result);

    $query = db_select("tbl_rating_comment","tbl_rating_comment");
    $query->fields("tbl_rating_comment");

//    $query->fields("tbl_score");
    $query->join($sub_query, 'tbl_score', 'tbl_score.tbl_score_uid = tbl_rating_comment.uid');
    $query->addField("tbl_score","number_","number");
    $query->addField("tbl_score","total_","total");
    $query->where('tbl_score.uid_count>5');
    $query->condition("tbl_rating_comment.nid",$nid);
    $result = $query->execute()->fetchAll();
//    print_r($result);
//    print_r((string)$query);
    return $result;
}
function cassiopeia_fixed_search_form($form,&$form_state){
    $form = array();
    global  $language;
    $search_key = !empty($_REQUEST['data']['fixed-form-search-key'])?$_REQUEST['data']['fixed-form-search-key']:"";
    $form['fixed-form-search-key'] = array(

        '#type' => 'textfield',

        '#size' => 60,

        '#maxlength' => 128,

        '#title' => "<i class=\"fa fa-map-marker\" aria-hidden=\"true\"></i>",

        '#attributes' => array("placeholder"=>t('Where do you want to play golf?'),"autocomplete"=>"off"),
//        '#autocomplete_path' => 'manager/autocomplete/search_golf_key',
        '#default_value' => $search_key,
//        '#theme_wrappers' => array(),
    );
    $search_date = !empty($_REQUEST['data']['fixed_form_search_date'])?$_REQUEST['data']['fixed_form_search_date']:"";
    $form['fixed_form_search_date'] = array(
        '#type' => 'date_popup',
        '#date_format' => 'd/m/Y',
        '#date_year_range' => '-50:0',
//        '#title' => "Ngày sinh: ",
        '#required' => FALSE,
        '#attributes' => array("placeholder"=>t('Date'),'autocomplete' =>'off'),
//        '#theme_wrappers' => array(),
        '#datepicker_options' => array(
//            'maxDate' => '+0', // not more than current date
            'minDate' => '0' // not more than given date
        ),
        '#default_value' => $search_date,
    );
    $tee_time_types = array(

    );
    $tee_time_types[-1] = t("Select");
    $_tee_time_types_vid = taxonomy_vocabulary_machine_name_load("time_frame");
    $__terms = taxonomy_get_tree($_tee_time_types_vid->vid,0,1);
    if(!empty($__terms)){
        foreach($__terms as $value){
            $tee_time_types[$value->tid] = $value->name;
        }
    }
    $search_session = !empty($_REQUEST['data']['fixed_form_search_session'])?$_REQUEST['data']['fixed_form_search_session']:-1;
    $form['fixed_form_search_session'] = array(
        '#type' => 'select',
        '#title' => '',
        '#options' => $tee_time_types,
        '#theme_wrappers' => array(),
        '#default_value' => $search_session,
//        '#description' => t('Set this to <em>Yes</em> if you would like this category to be selected by default.'),
    );
    $form['submit'] = array('#type' => 'submit', '#value' => "<span class='fa fa-search'></span><span>".t("Search")."</span>");
    $form['#attributes'] = array("class"=>array("form-search-fixed"));
    $form['#theme'][] = "cassiopeia_fixed_search_form_theme";
    return $form;
}
function cassiopeia_fixed_search_form_submit($form,&$form_state){
//    print_r($form_state['values']);
//    die;
//    $options = array(
//        'query' => array(
//            'data' => $form_state['values'],
//        )
//    );
    $form_state['redirect'] = array('/search');
}

//-------------- end ----------------
function cassiopeia_get_user_bookings ($condition = array()) {
    global $user;
    try {
        if(user_has_role(3,$user) || user_has_role(6,$user) || user_has_role(7,$user)){
            $golf_tour_booking = db_select('tbl_golf_tour_booking', 'gtb');
            $golf_tour_booking->fields('gtb', array('contact_name', 'contact_mail',   'contact_phone', 'contact_address', 'created'));

            $golf_tour_booking->groupBy('gtb.contact_mail');
            $golf_booking = db_select('golf_booking', 'gb');
            $golf_booking->fields('gb', array('contact_name', 'contact_mail', 'contact_phone', 'contact_address', 'created'));

            $query = Database::getConnection()
                ->select($golf_tour_booking->union($golf_booking))
                ->fields(NULL, array('contact_name', 'contact_mail',   'contact_phone', 'contact_address', 'created'))
                ->groupBy('contact_mail')
                ->orderBy('created','DESC');
            $query->addExpression('COUNT(contact_mail)', '_total_');

            if(!empty($condition['condition']['contact_name']['value']) && !empty($condition['condition']['contact_name']['operator'])) {
                $query->condition('contact_name',$condition['contact_name']['value'], $condition['contact_name']['operator']);
            }
            if(!empty($condition['condition']['contact_mail']['value']) && !empty($condition['condition']['contact_mail']['operator'])) {
                $query->condition('contact_mail',$condition['condition']['contact_mail']['value'], $condition['condition']['contact_mail']['operator']);
            }

            if(!empty($condition['condition']['contact_phone']['value']) && !empty($condition['condition']['contact_phone']['operator'])) {
                $query->condition('contact_phone',$condition['condition']['contact_phone']['value'], $condition['condition']['contact_phone']['operator']);
            }
            if(!empty($condition['condition']['contact_address']['value']) && !empty($condition['condition']['contact_address']['operator'])) {
                $query->condition('contact_address',$condition['condition']['contact_address']['value'], $condition['condition']['contact_address']['operator']);
            }

            $result = $query->execute()->fetchAll();
            return $result;
        }elseif(user_has_role(4,$user) || user_has_role(5,$user)){
            $_user = user_load($user->uid);
            $namespace = !empty($_user->field_namespace['und'][0]['value'])?$_user->field_namespace['und'][0]['value']:null;
            if($namespace){
                $sub_query_1 = db_select('node', 'ctype_golf');
                $sub_query_1->addField('ctype_golf', 'nid', 'ctype_golf_nid');
                $sub_query_1->join('field_data_field_namespace', 'ctype_golf_field_data_field_namespace', 'ctype_golf_field_data_field_namespace.entity_id = ctype_golf.nid');
                $sub_query_1->addField('ctype_golf_field_data_field_namespace', 'field_namespace_value', 'ctype_golf_field_namespace_value');
                $sub_query_1->condition('ctype_golf_field_data_field_namespace.entity_type', 'node');
                $sub_query_1->condition('ctype_golf.type', 'ctype_golf');

                $sub_query_2 = db_select('node', 'ctype_tea_time');
                $sub_query_2->fields('ctype_tea_time');
                $sub_query_2->join('field_data_field_c_t_t_parent', 'field_data_field_c_t_t_parent', 'field_data_field_c_t_t_parent.entity_id = ctype_tea_time.nid');
                $sub_query_2->fields('field_data_field_c_t_t_parent', array('field_c_t_t_parent_nid'));
                $sub_query_2->join($sub_query_1,"ctype_golf","ctype_golf.ctype_golf_nid = field_data_field_c_t_t_parent.field_c_t_t_parent_nid");
                $sub_query_2->fields("ctype_golf");

                $sub_query_3 = db_select("golf_booking_tea_time","golf_booking_tea_time");
                $sub_query_3->addField("golf_booking_tea_time","code","golf_booking_tea_time_code");
                $sub_query_3->join($sub_query_2,"ctype_tea_time","ctype_tea_time.nid = golf_booking_tea_time.tea_time_id");
                $sub_query_3->fields("ctype_tea_time");

                $query = db_select('golf_booking', 'golf_booking');
                $query->fields('golf_booking', array('contact_name', 'contact_mail', 'contact_phone', 'contact_address', 'created'));
                $query -> join($sub_query_3,"golf_booking_tea_time","golf_booking_tea_time.golf_booking_tea_time_code = golf_booking.code");
                $query->fields("golf_booking_tea_time");
                $query->condition("golf_booking_tea_time.ctype_golf_field_namespace_value",$namespace,"=");
                $query->groupBy('contact_mail');
                $query->addExpression('COUNT(contact_mail)', '_total_');

                if(!empty($condition['condition']['contact_name']['value']) && !empty($condition['condition']['contact_name']['operator'])) {
                    $query->condition('contact_name',$condition['contact_name']['value'], $condition['contact_name']['operator']);
                }
                if(!empty($condition['condition']['contact_mail']['value']) && !empty($condition['condition']['contact_mail']['operator'])) {
                    $query->condition('contact_mail',$condition['condition']['contact_mail']['value'], $condition['condition']['contact_mail']['operator']);
                }

                if(!empty($condition['condition']['contact_phone']['value']) && !empty($condition['condition']['contact_phone']['operator'])) {
                    $query->condition('contact_phone',$condition['condition']['contact_phone']['value'], $condition['condition']['contact_phone']['operator']);
                }
                if(!empty($condition['condition']['contact_address']['value']) && !empty($condition['condition']['contact_address']['operator'])) {
                    $query->condition('contact_address',$condition['condition']['contact_address']['value'], $condition['condition']['contact_address']['operator']);
                }

                $result = $query->execute()->fetchAll();
                return $result;
            }else{
                return null;
            }
        }
    }catch (Exception $e) {
        print_r($e);
        return null;
    }
}
function cassiopeia_check_favorite($nid){
    global $user;
    try{
        $query = db_select("tbl_favorite_golf","tbl_favorite_golf");
        $query->fields("tbl_favorite_golf");
        $query->condition("tbl_favorite_golf.nid",$nid,"=");
        $query->condition("tbl_favorite_golf.uid",$user->uid,"=");
        $result = $query->execute()->fetchAll();
        if(!empty($result)){
            return true;
        }else{
            return false;
        }
    }catch (Exception $e){
        return false;
    }
}
function cassiopeia_daily_report(){
    global $user;
    $_user = user_load($user->uid);
    $namespace = $_user->field_namespace['und'][0]['value'];
//    $query = db_select("ctype_golf")
}
function cassiopeia_golf_reminder_mail_to_customer(){
    global $user;
//    var_dump($user);
    $time = '1 hour';
    $conditions['condition']['remind-time']['value'] = 3600;
    $items = cassiopeia_get_golf_booking($conditions);
//    var_dump($items);
    if(!empty($items)){
        foreach($items as $key => $value){
//            var_dump($value);
            if($value->reminder!=1){
                $site_mail = variable_get("site_mail");
                $node = array();
                $node['customer_name'] = $value->contact_name;
                $node['start_time'] = date("H:i",$value->field_c_t_t_sh);
                $node['golf'] = $value->golf_title;
                $body[] = _cassiopeia_render_theme("module","cassiopeia","templates/nodes/golf_reminder_mail_template.tpl.php",array("node"=>$node));
                $headers['From'] = $headers['Sender'] = $headers['Return-Path'] = $site_mail;
                $headers['MIME-Version'] = '1.0';
                $headers['Content-Type'] = 'text/html; charset=UTF-8; format=flowed; delsp=yes';
                $params = array(
                    'body' => $body,
                    'subject' => "Alegolf remind",
                    'headers' => $headers,
                );
                if( drupal_mail('cassiopeia', 'discount-registration', $value->contact_mail, language_default(), $params)){
                    $query = db_update('golf_booking') // Table name no longer needs {}
                    ->fields(array(
                        'reminder' => 1,
                    ))
                        ->condition('code', $value->code)
                        ->execute();
                }
                if(!empty($value->uid)){
                    $query = db_insert("tbl_notify");
                    $query -> fields(array(
                        'title' => t('Upcoming golf game'),
                        'from_uid' => 3,
                        'to_uid' => $value->uid,
                        'created' => REQUEST_TIME,
                        'status' => 0,
                        'message_en' => "You have a golf game on ".date("d/m/Y",$value->field_c_t_t_sh)." takes place at ".$value->golf_title,
                        'message_vi' => "Bạn có một trận golf vào lúc ".date("d/m/Y",$value->field_c_t_t_sh).t(" tại ").$value->golf_title,
                    ));
                    $query->execute();
                }
            }
        }
    }
//    die;
}
function  cassiopeia_cron(){
    $pop_up_conditions = array();
    $pop_up_conditions['status'] = array(
        "type"      => "propertyCondition",
        "value"     => 1,
        "condition" => "=",
    );
    $popups = cassiopeia_get_items_by_conditions($pop_up_conditions,"pop_up","node");
    if(!empty($popups)){
        foreach($popups as $key => $value){
            if(empty($value->field_popup_pos1['und'][0]['value'])){
                $value->field_popup_pos1['und'][0]['value'] = REQUEST_TIME;
                node_save($value);
            }else{
                $schedule = $value->field_popup_random_schedule['und'][0]['value'];
                if(REQUEST_TIME - $value->field_popup_pos1['und'][0]['value'] >= $schedule){
                    $new_index = rand(0,count($value->field_popup_image['und'])-1);
                    $value->field_popup_index['und'][0]['value'] = $new_index;
                    $value->field_popup_pos1['und'][0]['value'] = REQUEST_TIME;
                    node_save($value);
                }
            }
        }
    }
    cassiopeia_golf_reminder_mail_to_customer();
    cassiopeia_check_account();
    cassiopeia_auto_cancel_booking();
    cassiopeia_check_promotion_card();
}
function cassiopeia_check_promotion_card(){
    $query = db_select("promotion","tbl_promotion");
    $query -> fields("tbl_promotion");
    $query -> condition("status",0,"=");
    $result = $query -> execute() -> fetchAll();
    if(!empty($result)){
        foreach($result as $item){
            if($item->expired < REQUEST_TIME){
                db_update("promotion") -> condition("code",$item->code,"=") -> fields(array("status"=>2)) -> execute();
            }
        }
    }
//    return $result;
}
function cassiopeia_check_account(){
//    die;
    $users = entity_load('user');
    foreach($users as $user){
        $_user = user_load($user->uid);
        if(!empty($_user->field_account_expiration_date['und'][0]['value']) && strtotime($_user->field_account_expiration_date['und'][0]['value'])<REQUEST_TIME && user_has_role(9,$_user)){
            $edit = array(
                'field_account_actived_date' => array(
                    'und' => array(
                        0 => array(
                            'value' => 0,
                        ),
                    ),
                ),
                'status' => 0,
            );
            user_save($_user, $edit);
            $query = db_select("tbl_mail_sent","tbl_mail_sent");
            $query -> fields("tbl_mail_sent");
            $query -> condition("type",1,"=");
            $query -> condition("uid",$_user->uid,"=");
            $result = $query -> execute() -> fetchAssoc();
//            print_r($_user);die;
            if(!empty($result)){
                if($result->updated==0){
                    if($result->created + 604800 >= REQUEST_TIME){
                        $site_mail = variable_get("site_mail");
                        $body[] = "Tài khoản của quý khách trên website Alegolf đã hết hạn hội viên, quý khách vui lòng liên hệ Hotline 19002093 để được hỗ trợ kỹ thuật";
                        $headers['From'] = $headers['Sender'] = $headers['Return-Path'] = $site_mail;
                        $headers['MIME-Version'] = '1.0';
                        $headers['Content-Type'] = 'text/html; charset=UTF-8; format=flowed; delsp=yes';
                        $params = array(
                            'body' => $body,
                            'subject' => "Thông báo hết hạn hội viên Alegolf",
                            'headers' => $headers,
                        );
                        if(drupal_mail('cassiopeia', 'discount-registration', $_user->mail, language_default(), $params)){}
                    }
                }else{
                    if($result->updated + 604800 > REQUEST_TIME && $result->created +2592000 <= REQUEST_TIME){
                        $site_mail = variable_get("site_mail");
                        $body[] = "Tài khoản của quý khách trên website Alegolf đã hết hạn hội viên, quý khách vui lòng liên hệ Hotline 19002093 để được hỗ trợ kỹ thuật";
                        $headers['From'] = $headers['Sender'] = $headers['Return-Path'] = $site_mail;
                        $headers['MIME-Version'] = '1.0';
                        $headers['Content-Type'] = 'text/html; charset=UTF-8; format=flowed; delsp=yes';
                        $params = array(
                            'body' => $body,
                            'subject' => "Thông báo hết hạn hội viên Alegolf",
                            'headers' => $headers,
                        );
                        if(drupal_mail('cassiopeia', 'discount-registration', $_user->mail, language_default(), $params)){}
                    }
                }
            }else{
                $site_mail = variable_get("site_mail");
                $body[] = "Tài khoản của quý khách trên website Alegolf đã hết hạn hội viên, quý khách vui lòng liên hệ Hotline 19002093 để được hỗ trợ kỹ thuật";
                $headers['From'] = $headers['Sender'] = $headers['Return-Path'] = $site_mail;
                $headers['MIME-Version'] = '1.0';
                $headers['Content-Type'] = 'text/html; charset=UTF-8; format=flowed; delsp=yes';
                $params = array(
                    'body' => $body,
                    'subject' => "Thông báo hết hạn hội viên Alegolf",
                    'headers' => $headers,
                );
                if(drupal_mail('cassiopeia', 'discount-registration', $_user->mail, language_default(), $params)){}
                db_insert("tbl_mail_sent")->fields(array(
                    "uid"       => $_user->uid,
                    "type"      => 1,
                    "created"   => REQUEST_TIME,
                    "updated"   => 0,
                ))->execute();
            }
        }
    }
}
function cassiopeia_mail($key, &$message, $params)
{
//    print($key);die;
    switch ($key) {
        case 'discount-registration':
            $message['subject'] = $params['subject'];
            $message['body'] = $params['body'];
            $message['headers'] = $params['headers'];
            break;
        case 'golf_booking_request_mail':
            $message['subject'] = $params['subject'];
            $message['body'] = $params['body'];
            $message['headers'] = $params['headers'];
            break;
        case 'golf_booking_for_admin_request_mail':
            $message['subject'] = str_replace("#code",$params['code'],variable_get("cassiopeia_config_mail_form_booking_golf_admin_title"));
            $message['body'] = $params['body'];
            $message['headers'] = $params['headers'];
            break;
        case 'golf_booking_for_customer_request_mail':
            $message['subject'] = str_replace("#code",$params['code'],variable_get("cassiopeia_config_mail_form_booking_golf_customer_title"));
            $message['body'] = $params['body'];
            $message['headers'] = $params['headers'];
            break;
        case 'golf-booking-mail':

            $message['subject'] = $params['subject'];
            $message['body'] = $params['body'];
            $message['headers'] = $params['headers'];
            $message['headers']['Cc'] = $params['players'];
            break;
    }
}
function cassiopeia_get_golf_booking_reminder($conditions = array()){
    global $user;
//    var_dump($conditions);
//    die;
    try{
        $_user = user_load($user->uid);

        $query_1 = db_select("tbl_notify","tbl_notify_1");
        $query_1 -> fields("tbl_notify_1");
        $query_1->condition("to_uid",$user->uid,"=");
//       $query_1->condition('tbl_notify_1.status',$conditions['condition']['status']['value'], $conditions['condition']['status']['operator']);
        $query_2="";

        if(user_has_role(3,$user) || user_has_role(4,$user)){
            $query_2 = db_select("tbl_notify","tbl_notify_2");
            $query_2 -> fields("tbl_notify_2");
            $query_2->condition("tbl_notify_2.namespace",$_user->field_namespace['und'][0]['value'],"=");
            $query_1->union($query_2);
        }
        if(user_has_role(3,$user)){
            $query_3 = db_select("tbl_notify","tbl_notify_3");
            $query_3 -> fields("tbl_notify_3");
            $query_3->condition("tbl_notify_3.to_uid",-1,"=");
            $query_1->union($query_3);
        }
        if(!empty($conditions['condition']['status'])){
//            print(1);die;
//           print_r($conditions['condition']['status']);
//           die;
            $query_1->condition('tbl_notify_1.status',$conditions['condition']['status']['value'], $conditions['condition']['status']['operator']);
            if(!empty($query_2)){
                $query_2->condition('tbl_notify_2.status',$conditions['condition']['status']['value'], $conditions['condition']['status']['operator']);
            }
            if(!empty($query_3)) {
                $query_3->condition('tbl_notify_3.status',$conditions['condition']['status']['value'], $conditions['condition']['status']['operator']);
            }
        }

        if(!empty($query_3)) {
            $query_3->orderBy("created","DESC");
        }
//        print((string)$query_1);
        $result = $query_1->execute()->fetchAll();
        return $result;
    }catch(Exception $e){
        print_r($e);
    }
}

function cassiopeia_getfly_get_account_by_phone($phone){
    $postData = array();
    $domain = "https://alegolf.getflycrm.com";
    $x_api_key = "uoeSkeOCH1M3dxAkJl5ZmJ2nDBYVYp";
    $data = array();
    $method = "GET";

    if (!empty($domain)) {

        $url = $domain.'/api/v3/accounts?q='.$phone;

        $ch = curl_init('');

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'X-API-KEY: '.$x_api_key,
            'Content-Type: application/json',
        ));

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        $response = curl_exec($ch);

        if($response === FALSE){
            die(curl_error($ch));
        }else {
            $data = $response;
        }
    }
    return json_decode($data, TRUE);
}
function cassiopeia_getfly_get_account($postData){
    $domain = "https://alegolf.getflycrm.com";
    $x_api_key = "uoeSkeOCH1M3dxAkJl5ZmJ2nDBYVYp";
    $data = array();
    $method = "GET";

    if (!empty($domain)) {

        $url = $domain.'/api/v3/accounts?q=0988311066';

        $ch = curl_init('');

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'X-API-KEY: '.$x_api_key,
            'Content-Type: application/json',
        ));

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        $response = curl_exec($ch);

        if($response === FALSE){
            die(curl_error($ch));
        }else {
            $data = $response;
        }
    }
    return json_decode($data, TRUE);
}
function cassiopeia_getfly_post_campaigns($postData,$key="account")
{

    $domain = "https://alegolf.getflycrm.com";
    $x_api_key = "uoeSkeOCH1M3dxAkJl5ZmJ2nDBYVYp";
    $data = array();
    $method = "POST";
    if (!empty($domain)) {
        switch($key){
            case "order":
                $url = $domain.'/api/v3/orders/';
                break;
            case "get_accounts":
                $url = $domain.'/api/v3/accounts/?limit=200';
                $method = "GET";
                break;
            default:
                $url = $domain.'/api/v3/account/';
                break;
        }
//        $url = $domain.'/api/v3/account/';
        $ch = curl_init('');

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'X-API-KEY: '.$x_api_key,
            'Content-Type: application/json',

        ));

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        $response = curl_exec($ch);

        if($response === FALSE){
            die(curl_error($ch));
        }else {
            $data = $response;
        }
    }
//    print_r(json_decode($data, TRUE));
//    die;
    return json_decode($data, TRUE);
}
function cassiopeia_add_namespace_form($form,&$form_state){

    $form['namespace_id'] = array(

        '#type' => 'textfield',

        '#size' => 60,

        '#maxlength' => 128,

        '#title' => "",
        '#attributes' => array("class"=>array("hidden")),

    );
    $form['namespace'] = array(

        '#type' => 'textfield',

        '#size' => 60,

        '#maxlength' => 128,

        '#title' => "Namespace",

    );

    $form['status'] = array(
        '#type' => 'select',
        '#title' => 'Trạng thái',
        '#options' => array(
            1 => t('Công bố'),
            0 => t('Không công bố'),
        ),

    );
    $form['submit'] = array('#type' => 'submit', '#value' => t(" Thêm mới"));
    $form['#attributes'] = array("class"=>array("form-namespace"));
    return $form;
}
function cassiopeia_add_namespace_form_submit($form,&$form_state){
    if(!empty($form_state['values']['namespace'])){
        $namespace = $form_state['values']['namespace'];
    }
    if(!empty($form_state['values']['status'])){
        $status = $form_state['values']['status'];
    }
    if(!empty($form_state['values']['namespace_id'])){
        try{
            db_update('namespace')
                ->fields(array(
                    'title' => $form_state['values']['namespace'],
                    'status' => $form_state['values']['status'],
                ))
                ->condition('id',$form_state['values']['namespace_id'] )
                ->execute();
            drupal_set_message('Đã cập nhật namespace '. $form_state['values']['namespace']);
        }catch(Exception $e){
            drupal_set_message('Hệ thống bận vui lòng quay lại sau ít phut', 'error');
        }
    }else{
        if(!empty($namespace) && !empty($status)){
            try {
                $nid = db_insert('namespace') // Table name no longer needs {}
                ->fields(array(
                    'title' => $form_state['values']['namespace'],
                    'status' => $status,
                    'created' => REQUEST_TIME,
                ))
                    ->execute();
                drupal_set_message('Thêm mới namespace '. $form_state['values']['namespace']);
            }catch (Exception $e) {
                drupal_set_message('Hệ thống bận vui lòng quay lại sau ít phut', 'error');
            }
        }
    }
}

function cassiopeia_contact_form($form,&$form_state){
    $form = array();
    $form['contact-fullname'] = array(

        '#type' => 'textfield',

        '#size' => 60,

        '#maxlength' => 128,

//        '#required' => TRUE,

        '#attributes' => array("placeholder"=>t('Full name'),),
        '#prefix' => "<div class='input-group-prepend'><span class=\"icon\"><i class=\"fa fa-user\"></i></span>",
        '#suffix' => "</div>",
        '#theme_wrappers' => array(),
    );

    $form['contact-phone'] = array(

        '#type' => 'textfield',

        '#size' => 60,

        '#maxlength' => 128,

//        '#required' => TRUE,

        '#attributes' => array("placeholder"=> t('Tel'),),
        '#prefix' => "<div class='input-group-prepend'><span class=\"icon\"><i class=\"fa fa-phone\"></i></span>",
        '#suffix' => "</div>",
        '#theme_wrappers' => array(),
    );
    $form['contact-address'] = array(

        '#type' => 'textfield',

        '#size' => 60,

        '#maxlength' => 128,

//        '#required' => TRUE,

        '#attributes' => array("placeholder"=> t('Address'),),
        '#prefix' => "<div class='input-group-prepend'><span class=\"icon\"><i class=\"fa fa-home\"></i></span>",
        '#suffix' => "</div>",
        '#theme_wrappers' => array(),
    );
    $form['contact-mail'] = array(

        '#type' => 'textfield',

        '#size' => 60,

        '#maxlength' => 128,

//        '#required' => TRUE,

        '#attributes' => array("placeholder"=>"Email",),
        '#prefix' => "<div class='input-group-prepend'><span class=\"icon\"><i class=\"fa fa-envelope\"></i></span>",
        '#suffix' => "</div>",
        '#theme_wrappers' => array(),
    );
    $form['contact-message'] = array(

        '#type' => 'textarea',

        '#size' => 60,

        '#maxlength' => 128,

//        '#required' => TRUE,

        '#attributes' => array("placeholder"=> t('Message'),),

        '#theme_wrappers' => array(),
        '#prefix' => "<div class='input-group-prepend t-message'>",
        '#suffix' => "</div>",
    );
    $form["contact-submit"] = array(
        "#type" => "submit",

        "#value" => t('Send'),

        "#attributes" => array("class" => array("")),

        '#prefix' => "<div class='input-group-prepend'>",
        '#suffix' => "</div>",
    );
    return $form;
}

function cassiopeia_contact_form_submit($form,&$form_state){
    $contact_data = array();
    if (!empty($form_state['values']['contact-fullname']) && !(empty($form_state['values']['contact-mail'])) && !empty($form_state['values']['contact-phone']) && !empty($form_state['values']['contact-address'])) {
        $contact_data['fullname'] = $form_state['values']['contact-fullname'];
        $contact_data['email'] = $form_state['values']['contact-mail'];
        $contact_data['phone'] = $form_state['values']['contact-phone'];
        $contact_data['address'] = $form_state['values']['contact-address'];
        if (!empty($form_state['values']['contact-message'])) {
            $contact_data['message'] = $form_state['values']['contact-message'];
        }else {
            $contact_data['message'] = '';
        }
        $contact_data['created'] = REQUEST_TIME;
        $contact_data['status'] = 0;
    }
    if (!empty($contact_data)) {
        try {
            $node = new stdClass();
//            $node->title = $contact_data['full_name'];c
            $node->type = "contact";
            $node->uid = 1;

            $node->title = $contact_data['fullname'];
            $node->field_contact_email['und'][0]['value'] = $contact_data['email'];
            $node->field_contact_phone['und'][0]['value'] = $contact_data['phone'];
            $node->field_contact_address['und'][0]['value'] = $contact_data['address'];
            $node->field_contact_message['und'][0]['value'] = $contact_data['message'];
            $node->status = 1;

            $node = node_submit($node);
            node_save($node);
            drupal_set_message('Cảm ơn quý khách, chúng tôi sẽ liên hệ với quý khách trong thời gian sớm nhất.');

        }catch ( Exception $e) {
            drupal_set_message('Hệ thống đang bận vui lòng quay lại sau it phút.');
            throw ($e);
        }
    }else {
        drupal_set_message('Vui lòng điền đầy đủ thông tin.');
    }
}

function cassiopeia_create_tea_times_excell($tea_times) {
    module_load_include('inc', 'phpexcel');
    $data = array();
    $headers = array("id","Sân",'Số hố','Khung giờ','Giờ chơi',"Giá sân", "Giá ALEGOLF", 'Trạng thái');
    $parent = null;
    foreach ($tea_times as $key => $tea_time) {
        $parent  = node_load($tea_time->field_c_t_t_parent['und'][0]['nid']);
        $tea_time_type = '';
        $time_frame = taxonomy_term_load($tea_time->field_c_t_t_type['und'][0]['value']);
        $tea_time_type = $time_frame->name;


        $data[] = array(
            $tea_time->nid,
            $parent->title,
            $tea_time->field_c_t_t_hole['und'][0]['value'],
            $tea_time_type,
            date('d/m/Y H:i',$tea_time->field_c_t_t_sh['und'][0]['value']),
            $tea_time->field_c_t_t_a_price['und'][0]['value'],
            $tea_time->field_c_t_t_a_price['und'][0]['value'],
            $tea_time->status);
    }


    // Store the file in sites/default/files
    $dir = file_stream_wrapper_get_instance_by_uri('public://')->realpath();
    $filename =  'export_'.date('d_m_Y_H_i', REQUEST_TIME).'.xls';
    $path = "$dir/$filename";

    // Use the .xls format
    $options = array('format' => 'xls');

    $result = phpexcel_export($headers, $data, $path, $options);
    if ($result == PHPEXCEL_SUCCESS) {
        // notify to admin
        drupal_set_message(t("Ok"));
        return array('name'=>$filename,'uri'=>'public://'.$filename,'golf'=>$parent);
    }
    else {
        drupal_set_message($result, 'error');
        return null;
    }
}

function cassiopeia_import_update_tea_times_excell_form($form , $form_state) {
    $form['excell_file'] = array(
        '#title' => 'Excell file',
        '#type'  => 'file',
        '#description' => ($max_size = parse_size(ini_get('upload_max_filesize'))) ? t('Due to server restrictions, the <strong>maximum upload file size is !max_size</strong>. Files that exceed this size will be disregarded.', array('!max_size' => format_size($max_size))) : '',
    );

    $form['submit'] = array(
        '#type' => 'submit',
        '#value' => t('Commence Import'),
    );

    return $form ;
}

function cassiopeia_import_update_tea_times_excell_form_validate(&$form, &$form_state) {
    $validators = array(
        'file_validate_extensions' => array( 'xls' ),
    );
    if ($file = file_save_upload('excell_file', $validators, "public://", FILE_EXISTS_REPLACE) ) {
        $form_state['values']['excell_file'] = $file;
    }
    else {
        form_set_error('excell_file', 'Kiểm tra lại file upload, chi chấp nhận file .xls');
    }

}

function cassiopeia_import_update_tea_times_excell_form_submit(&$form, &$form_state) {

    module_load_include('inc', 'phpexcel');
    $data_import = phpexcel_import($form_state['values']['excell_file']->destination, FALSE);
    $operations = array();
    if (!empty($data_import[0])) {
        foreach ($data_import[0] as $key => $value) {
            $tea_time = node_load($value[0]);
            if (!empty($tea_time->type) && $tea_time->type == 'ctype_tea_time') {
                $tea_time->field_c_t_t_a_price['und'][0]['value'] = !empty($value[6])?$value[6]:0;
                $tea_time->status = !empty($value[7])?$value[7]:0;
                $operations[] = array('_batch_cassiopeia_import_update_tea_times_excell', array($tea_time));
            }
        }
    }
    if (!empty($operations)) {
        $batch = array(
            'title' => t('create update time data'),
            'operations' => $operations,
            'progress_message' => t('Update @current out of @total.'),
            'error_message' => t('Error!'),
            'finished' => '_batch_cassiopeia_import_update_tea_times_excell_finished',
        );
        batch_set($batch);
    }
}


function _batch_cassiopeia_import_update_tea_times_excell ($time,&$context) {
    node_save($time);
    $context['results']['updated'][]  = $time;
}

function _batch_cassiopeia_import_update_tea_times_excell_finished($success, $results, $operations) {
    drupal_set_message('Cập nhật thành công.');
}
function cassiopeia_friend_filter_form ($form, &$form_state, $cache = array()) {
    $form['name_mail_tel'] = array(
        '#type' => 'textfield',
        '#title' => t('Quý khách vui lòng nhập số điện thoại hoặc email của bạn cùng chơi/Hội viên Alegolf'),
    );
    if(!empty($cache['name_mail_tel'])) {
        $form['name_mail_tel']['#default_value'] = $cache['name_mail_tel'];
    }
    $form['submit'] = array(
        '#type' => 'submit',
        '#value' => t('Search'),
    );
    return $form;
}
function cassiopeia_friend_filter_form_submit ($form, &$form_state) {
    drupal_goto('user/friends/list',
        array(
            'query'=>array(
                'name_mail_tel'=>$form_state['values']['name_mail_tel'],
            )
        )
    );
}
function cassiopeia_get_user_by_condition($conditions = array()){
    try{
        $query = db_select("users","users");
        $query->fields('users', array('uid','name', 'mail','status'));
        $query->join('field_data_field_account_full_name', 'field_data_field_account_full_name', 'field_data_field_account_full_name.entity_id = users.uid');
        $query->fields('field_data_field_account_full_name');
        $query->join('field_data_field_account_phone', 'field_data_field_account_phone', 'field_data_field_account_phone.entity_id = users.uid');
        $query->fields('field_data_field_account_phone');
        if(!empty($conditions['condition']['name_mail_tel']['value'])) {
            $query->where("users.mail = :string or field_data_field_account_phone.field_account_phone_value = :string", array(':string'=>$conditions['condition']['name_mail_tel']['value']));
        }else{
            $query->where("users.mail = :string or field_data_field_account_phone.field_account_phone_value = :string", array(':string'=>'123128372198úihfđóiủoeỉuoi'));
        }
        if(!empty($conditions['condition']['friends'])) {
            $query->where('users.uid NOT IN (:arr)', array(':arr'=>$conditions['condition']['friends']));
        }
        $res = $query->execute()->fetchAll();
        return $res;
    }catch(Exception $e){
        print_r($e);
    }
}



function assiopeia_get_users_with_role($role, $active_user = TRUE) {
    $users = array();
    $rid = 0;
    if (is_int($role)) {
        $rid = $role;
    }
    else {
        if ($role_obj = user_role_load_by_name($role)) {
            $rid = $role_obj->rid;
        }
    }
    if ($rid) {
        $uids = db_select('users_roles', 'ur')
            ->fields('ur', array('uid'))
            ->condition('ur.rid', $rid)
            ->execute()->fetchCol();
        if (!empty($uids)) {
            $query = new EntityFieldQuery();
            $query->entityCondition('entity_type', 'user')
                ->propertyCondition('uid', $uids, 'IN');
            if ($active_user) {
                $query->propertyCondition('status', 1);
            }
            $entities = $query->execute();
            if (!empty($entities)) {
                $users = user_load_multiple(array_keys($entities['user']));
            }
        }
    }

    return $users;
}

function cassiopeia_finish_booking_form($form,&$form_state,$temp){
    $form = array();
    $form['#temp'] = $temp;
    $form['submit'] = array(
        '#type' => 'submit',
        '#value' => t('Confirm'),
    );
    return $form;
}
function cassiopeia_finish_booking_form_submit($form,&$form_state){
//    $temp = $form['#temp'];
//    $message_vi = "Khách hàng ".$temp['booking']['contact_name']." đã xác nhận thanh toán đơn hàng ".$temp['booking']['code']."<div class='button '><button data-code='".$temp['booking']['code']."' class='btn-booking-finish-confirm btn btn-success'>Xác nhận</button><a class='btn btn-info' href='/manager/edit/golf-booking/".$temp['booking']['code']."'>Xem chi tiết</a></div>";
//    $message_en = "Khách hàng ".$temp['booking']['contact_name']." đã xác nhận thanh toán hàng ".$temp['booking']['code'];
//    $query = db_insert("tbl_notify");
//    $query -> fields(array(
//        'title' => 'Thông báo hoàn tất đặt tee time',
//        'from_uid' => 3,
////        'to_uid' => $user->uid,
//        'namespace' => $temp['booking']['namespace'],
//        'created' => REQUEST_TIME,
//        'status' => 0,
//        'message_vi' => $message_vi,
//        'message_en' => $message_en,
//    ));
//    $query->execute();
    drupal_set_message("Cảm ơn bạn đã đặt tee time, chúng tôi sẽ liên hệ lại trong thời gian sớm nhất!");
    $form_state['redirect'] = "/";
//    die;
}

function cassiopeia_manager_ultility_accept($utility){
    global  $user;
    $_user_ = user_load($user->uid);
    if(!is_object($utility)){
        $utility = cassiopeia_get_golf_utility_by_id($utility);
    }
    if(!empty($utility->id)){
        if (user_has_role(3) || user_has_role(6)) {
            return TRUE;
        }elseif ((user_has_role(4)) && !empty($_user_->field_namespace['und'][0]['value']) && ($_user_->field_namespace['und'][0]['value'] ==  $utility->namespace) ){
            return TRUE;
        }
        elseif ((user_has_role(5)) && !empty($_user_->field_namespace['und'][0]['value']) && ($_user_->field_namespace['und'][0]['value'] ==  $utility->namespace) ){
            return TRUE;
        }
        else {
            return FALSE;
        }
    }else{
        return FALSE;
    }
}
function cassiopeia_quick_search_form($form,&$form_state){
    $input_value = isset($_REQUEST['data']['input-field'])?$_REQUEST['data']['input-field']:"";
    $form = array();
    $form['input-field'] = array(
        '#type' => 'textfield',
        '#title' => '',
        '#default_value' => $input_value,
    );
    $form['submit'] = array(
        '#type' => 'submit',
        '#value' => "<span class='fa fa-search'></span>",
    );
    return $form;
}
function cassiopeia_quick_search_form_submit($form,&$form_state){
    $options = array(
        'query' => array(
            'data' => $form_state['values'],
        )
    );
    $form_state['redirect'] = array('/quick-search', $options);
}
function cassiopeia_delete_backup_form($form,&$form_state,$backup){
    $form = array();
    $form['backup'] = array(
        '#type' => 'value',
        '#value' => $backup,
    );

    return confirm_form(
        $form,
        t('Are you sure you want to delete this item?'),
        'admin/manager/backup',
        t('This action cannot be undone.'),
        t('Delete'),
        t('Cancel')
    );

    return $form;
}
function cassiopeia_delete_backup_form_submit($form,&$form_state){
    var_dump($form_state['values']);
    $backup = $form_state['values']['backup'];
//    die;
    global $user;
    if($user->uid == $backup['uid']){
        db_delete("backup_teetime_create")
            -> condition("id",$backup['id'],"=")
            -> execute();
        $form_state['redirect'] = "admin/manager/backup_teetime";
    }else{
        drupal_goto("/");
    }
//    die;
}
function cassiopeia_promotion_filter_form($form,&$form_state,$cache=array()){
    $form = array();
    $_code = empty($cache['code'])?"":$cache['code'];
    $form['code'] = array(

        '#type' => 'textfield',

        '#title' => "Mã giảm giá",

        '#default_value' => $_code,

        '#size' => 60,

        '#maxlength' => 128,

//        '#required' => TRUE,

    );

    $form['code_type'] = array(

        '#type' => 'textfield',

        '#title' => "Loại mã",

        '#default_value' => $cache['code_type'],

        '#size' => 60,

        '#maxlength' => 128,

//        '#required' => TRUE,

    );

    $form['amount_type'] = array(
        '#type' => 'select',
        '#title' => 'Kiểu giảm giá',
        '#options' => array(
            -1 => t('Tất cả'),
            0 => t('Giảm theo tiền mặt'),
            1 => t('Giảm theo %'),
        ),
        '#default_value' => $cache['amount_type'],
//        '#description' => t('Set this to <em>Yes</em> if you would like this category to be selected by default.'),
    );
    $form['kind'] = array(
        '#type' => 'select',
        '#title' => 'Áp dụng cho',
        '#options' => array(
            -1 => t('Tất cả'),
            1 => t('Đặt sân'),
            2 => t('Đặt tour'),
            3 => t('Đăng ký hội viên'),
        ),
        '#default_value' => $cache['kind'],
    );
    $form['kind_2'] = array(
        '#type' => 'select',
        '#title' => 'Số lần dùng',
        '#options' => array(
            -1 => t('Tất cả'),
            1 => t('1 lần'),
            0 => t('n lần'),
        ),
        '#default_value' => $cache['kind_2'],
    );
    $form['status'] = array(
        '#type' => 'select',
        '#title' => 'Tình trạng',
        '#options' => array(
            -1 => t('Tất cả'),
            0 => t('Còn hạn'),
            1 => t('Hết hạn'),
        ),
    );
    $form['submit'] = array('#type' => 'submit', '#value' => t('Lọc'));
    return $form;
}
function cassiopeia_promotion_filter_form_submit($form,&$form_state){
    $options = array(
        'query' => array(
            'data' => $form_state['values'],
        )
    );
    $form_state['redirect'] = array('/admin/manager/promotion_code', $options);
}
function cassiopeia_promotion_group_filter_form($form,&$form_state,$cache=array()){
    $form = array();
    $_code = empty($cache['code'])?"":$cache['code'];

    $form['code_type'] = array(

        '#type' => 'textfield',

        '#title' => "Loại mã",

        '#default_value' => $cache['code_type'],

        '#size' => 60,

        '#maxlength' => 128,

//        '#required' => TRUE,

    );

    $form['amount_type'] = array(
        '#type' => 'select',
        '#title' => 'Kiểu giảm giá',
        '#options' => array(
            -1 => t('Tất cả'),
            0 => t('Giảm theo tiền mặt'),
            1 => t('Giảm theo %'),
        ),
        '#default_value' => $cache['amount_type'],
//        '#description' => t('Set this to <em>Yes</em> if you would like this category to be selected by default.'),
    );
    $form['kind'] = array(
        '#type' => 'select',
        '#title' => 'Áp dụng cho',
        '#options' => array(
            -1 => t('Tất cả'),
            1 => t('Đặt sân'),
            2 => t('Đặt tour'),
            3 => t('Đăng ký hội viên'),
        ),
        '#default_value' => $cache['kind'],
//        '#default_value' => $category['selected'],
//        '#description' => t('Set this to <em>Yes</em> if you would like this category to be selected by default.'),
    );
    $form['submit'] = array('#type' => 'submit', '#value' => t('Lọc'));
    return $form;
}
function cassiopeia_promotion_group_filter_form_submit($form,&$form_state){
    $options = array(
        'query' => array(
            'data' => $form_state['values'],
        )
    );
    $form_state['redirect'] = array('/admin/manage/promotion_group', $options);
}
function cassiopeia_auto_cancel_booking(){
    $condition['condition']['status'] = array();
    $condition['condition']['status']['value'] = 1;
    $condition['condition']['status']['operator'] = '=';
    $golf_bookings = cassiopeia_get_golf_booking($condition);
    if(!empty($golf_bookings)) {
        $stt=1;
        foreach ($golf_bookings as $booking) {
            $__booking = cassiopeia_get_golf_booking_by_code($booking->code);
//        print_r($__booking);die;
            $tee_times = $__booking->tea_times;
            if (REQUEST_TIME - $booking->created >  30*60) {

                $stt++;
                try{
                    foreach($tee_times as $tee_time){
                        $tee = node_load($tee_time->tea_time_id);
                        $tee->field_c_t_t_player['und'][0]['value'] = (int)$tee->field_c_t_t_player['und'][0]['value'] - count($tee_time->players);
                        node_save($tee);
                    }
                    $cassiopeia_config_mail_form_booking_golf_cancel_content = variable_get('cassiopeia_config_mail_form_booking_golf_cancel_content', array(
                        'value' => '',
                        'format' => 'full_html'
                    ));
                    if(!empty($cassiopeia_config_mail_form_booking_golf_cancel_content['value'])){
                        $content = $cassiopeia_config_mail_form_booking_golf_cancel_content['value'];
                    }else{
                        $content = "";
                    }
                    $cassiopeia_config_mail_form_booking_golf_cancel_end_content = variable_get('cassiopeia_config_mail_form_booking_golf_cancel_end_content', array(
                        'value' => '',
                        'format' => 'full_html'
                    ));
                    if(!empty($cassiopeia_config_mail_form_booking_golf_cancel_end_content['value'])){
                        $content2 = $cassiopeia_config_mail_form_booking_golf_cancel_end_content['value'];
                    }else{
                        $content2 = "";
                    }
                    $site_mail = variable_get("site_mail");
                    $mail_title = variable_get("cassiopeia_config_mail_form_booking_golf_cancel_auto_title");
                    $mail_title = str_replace("#code",$booking->code,$mail_title);
                    $site_mail = variable_get("site_mail");
                    $tour_mail = variable_get("cassiopeia_config_mail_form_tour_mail");
                    $body = array();
                    $additional_content = "Đơn hàng số ".$__booking->code." đã bị hủy do quá thời gian thanh toán.";
                    $body[] = _cassiopeia_render_theme("module","cassiopeia","templates/nodes/golf_cancel_template.tpl.php",array("data"=>$__booking,"additional_content"=>$content,"additional_content2"=>$content2));
                    $headers['From'] = $headers['Sender'] = $headers['Return-Path'] = $site_mail;
                    $headers['MIME-Version'] = '1.0';
                    $headers['Content-Type'] = 'text/html; charset=UTF-8; format=flowed; delsp=yes';
                    $params = array(
                        'body' => $body,
                        'subject' =>$mail_title,
                        'headers' => $headers,
                    );
                    drupal_mail('cassiopeia', 'discount-registration', $booking->contact_mail, language_default(), $params);
                }catch(Exception $e){
                    print($e);
                }
                $updated = db_update('golf_booking')
                    ->fields(array('status' => 0,))
                    ->condition ('code',$booking->code, '=')
                    ->execute();
//                break;
            }else{
                continue;
            }
        }
    }else{
//    print(1);
    }
}
function cassiopeia_search_tour_form($form,&$form_state){
    global $language;
    $form = array();
    $search_key = !empty($_REQUEST['data']['title'])?$_REQUEST['data']['title']:"";
    $form['title'] = array(

        '#type' => 'textfield',

        '#title' => t(''),

        '#default_value' => $search_key,

        '#size' => 60,

        '#maxlength' => 128,

        '#required' => false,

        '#attributes' => array("placeholder"=>t("Where do you want to go?"))
    );
    $vocal = taxonomy_vocabulary_machine_name_load("tx_tour");
    $tour_category_lv1 = taxonomy_get_tree_by_lang($vocal->vid,0,1,FALSE,$language->language);
    $tx_tour_options = array();
    $tx_tour_option_attrs = array();
    $tx_tour_options['all'] = t("Select");
    if(!empty($tour_category_lv1)){
        foreach($tour_category_lv1 as $lv1_item_value){
            $tx_tour_options[$lv1_item_value->tid] = $lv1_item_value->name;
            $children = taxonomy_get_children($lv1_item_value->tid);
            if(!empty($children)){
                foreach($children as $child){
                    $tx_tour_options[$child->tid] = "- ".$child->name;
                }
            }
        }
    }
    $tx = !empty($_REQUEST['data']['tx_tour'])?$_REQUEST['data']['tx_tour']:"";
    $form['tx_tour'] = array(
        '#type' => 'select',
//        '#title' => t('Selected'),
        '#options' => $tx_tour_options,
        '#default_value' => $tx,
//        '#description' => t('Set this to <em>Yes</em> if you would like this category to be selected by default.'),
    );
    $form['submit'] = array('#type' => 'submit', '#value' => '<span class="fa fa-search"></span> '.t('Search'));
    return $form;
}
function cassiopeia_search_tour_form_submit($form,&$form_state){
    $options = array(
        'query' => array(
            'data' => $form_state['values'],
        )
    );
    $form_state['redirect'] = array('/tour-search', $options);
}
function cassiopeia_news_letter_subscribe_form($form,&$form_state){
    $form = array();
    $form['email'] = array(
        '#type'         => 'textfield',
        '#title'        => t(''),
        '#size'         => 60,
        '#maxlength'    => 128,
        '#required'     => true,
        '#attributes'   => array("placeholder"=>t("Enter your email")),
    );
    $form['submit'] = array(
        '#type' => 'submit',
        '#value' => '<span class="fa fa-envelope-o"></span>'
    );
    return $form;
}
function cassiopeia_news_letter_subscribe_form_validate($form, &$form_state) {
//    print_r($form);die;
    // YOUR CUSTOM VALIDATION CODE GOES HERE
    if (!valid_email_address($form['email']['#value'])) {
        form_set_error('submitted][email_address', t('The email address appears to be invalid.'));
    }
}

function cassiopeia_news_letter_subscribe_form_submit($form,&$form_state){
    if(!empty($form_state['values']['email'])){
        $node = new stdClass();
//            $node->title = $contact_data['full_name'];
        $node->type = "news_letter_subscribe";
        $node->uid = 1;

        $node->title = $form_state['values']['email'];
        $node->status = 1;
        $node->created = REQUEST_TIME;

        $node = node_submit($node);
        node_save($node);
        drupal_set_message(t("Cảm ơn bạn đã đăng ký!"));
    }
}

function cassiopeia_promotion_edit_form ($form, &$form_state,$promotion_group) {
    $form = array();
    $form['#promotion_group'] = $promotion_group;
    $form['type'] = array(
        '#type' => 'textfield',
        '#title' =>'Loại thẻ',
        '#required' => TRUE,
        '#default_value' => $promotion_group['type'],
    );

    $form['amount'] = array(
        '#type' => 'textfield',
        '#title' =>'Mệnh giá',
        '#required' => TRUE,
        '#default_value' => $promotion_group['amount'],
    );


    $form['amount_type'] = array(
        '#type' => 'select',
        '#title' =>'Kiểu (% hoặc tiền mặt)',
        '#options' => array(
            0 => 'Tiền mặt',
            1 => 'Phần trăm',
        ),
        '#required' => TRUE,
        '#default_value' => $promotion_group['amount_type'],
    );
    $form['kind'] = array(
        '#type' => 'select',
        '#title' =>'Áp dụng cho',
        '#options' => array(
            1 => 'Đặt sân',
            2 => 'Đặt tour',
        ),
        '#default_value' => $promotion_group['kind'],
        '#required' => TRUE,
    );
    foreach (cassiopeia_get_all_golf() as $key => $value) {
        $golf_options[$value->nid] = $value->title;
    }
    $form['golf'] = array(
        '#type'         => 'select',
        '#title'        => "Sân golf",
        '#multiple'     => 11,
        '#options'      => $golf_options,
        '#attributes'   => array("class"=>array("golf-select")),
        '#default_value' => unserialize($promotion_group['golf']),
    );
//    serialize(
    $form['expired'] = array(
        '#type'=>'textfield',
        '#title'=>'Thời hạn',
//        '#default_value'=> ($promotion_group['expired']-$promotion_group['created'])/(60*60*24),
        '#description' => 'Thời hạn  tính bằng ngày',
        '#required' => TRUE,
    );

    $form['submit'] = array(
        '#type' => 'submit',
        '#value' => 'Tạo',
    );

    return $form;

}
function cassiopeia_promotion_edit_form_submit($form,&$form_state){
//    print_r($form_state['values']);
//    die;
//    print_r($form['#promotion_group']);
//    die;
    try{
        db_update("promotion")->fields(
            array(
                "type"          => $form_state['values']['type'],
                "amount"        => $form_state['values']['amount'],
                "amount_type"   => $form_state['values']['amount_type'],
                "kind"          => $form_state['values']['kind'],
                "golf"          => serialize($form_state['values']['golf']),
                "status"        => 0,
                "expired"       => $form['#promotion_group']['created']+$form_state['values']['expired']*24*3600,
            )
        )
            ->condition("status",1,"<>")
            ->condition("created",$form['#promotion_group']['created'],"=")
            ->execute();
    }catch (Exception $e){

    }
}
function cassiopeia_register_form($form,&$form_state){
    $form = array();
    $form['fullname'] = array(
        '#title'           => "Họ và tên",
        '#type'            => 'textfield',
        '#size'            => 60,
        '#maxlength'       => 128,
        '#required'        => TRUE,
        '#attributes'      => array("placeholder"=>"Nhập họ và tên")
    );
    $form['email'] = array(
        '#title'           => "Email",
        '#type'            => 'textfield',
        '#size'            => 60,
        '#maxlength'       => 128,
        '#required'        => TRUE,
        '#attributes'      => array("placeholder"=>"Nhập email")
    );
    $form['tel'] = array(
        '#title'           => "Số điện thoại",
        '#type'            => 'textfield',
        '#size'            => 60,
        '#maxlength'       => 128,
        '#required'        => TRUE,
        '#attributes'      => array("placeholder"=>"Nhập số điện thoại")
    );
    $form['password'] = array(
        '#title'           => "Mật khẩu",
        '#type'            => 'password',
        '#maxlength'       => 64,
        '#size'            => 15,
        '#required'        => TRUE,
        '#attributes'      => array("placeholder"=>"Mật khẩu"),
    );
    $form['r-password'] = array(
        '#title'           => "Xác nhận mật khẩu",
        '#type'            => 'password',
        '#size'            => 60,
        '#maxlength'       => 128,
        '#required'        => TRUE,
        '#attributes'      => array("placeholder"=>"Xác nhận mật khẩu")
    );
    $form['#theme'] = "cassiopeia_register_form_theme";
    $form['register_button'] = array(
        '#type'            => 'submit',
        '#value'           => t('Đăng ký'),
        '#weight'          => 19,
        '#prefix'          => "<div class='form-button'>",
        '#suffix'          => "</div>",
    );
    return $form;
}
function cassiopeia_register_form_submit($form,&$form_state){
    print_r($form_state['values']);
    $_user = user_load_by_mail($form_state['values']['email']);
    if(!empty($_user->uid)){
        drupal_set_message("Tên đăng nhập đã được sử dụng!");
    }else{
        $new_user = array(
            'name' => $form_state['values']['email'],
            'pass' => $form_state['values']['password'],
            'mail' =>$form_state['values']['email'],
//            'init' => $email,
            'field_account_fullname' => array(LANGUAGE_NONE => array(array('value' => $form_state['values']['fullname']))),
            'field_account_tel' => array(LANGUAGE_NONE => array(array('value' => $form_state['values']['tel']))),
            'status' => 1,
            'access' => REQUEST_TIME,
        );
        $account = user_save(null, $new_user);
        $uid = $_user = user_load_by_name($form_state['values']['email']);
        $account = array('uid' => $uid->uid);
        user_login_submit(array(), $account);
    }
//    die;
}

function cassioepia_article_import_form($form , $form_state) {
    $form['excell_file'] = array(
        '#title'        => 'Excel file',
        '#type'         => 'file',
        '#description'  => ($max_size = parse_size(ini_get('upload_max_filesize'))) ? t('Due to server restrictions, the <strong>maximum upload file size is !max_size</strong>. Files that exceed this size will be disregarded.', array('!max_size' => format_size($max_size))) : '',
    );
    $form['submit'] = array(
        '#type'         => 'submit',
        '#value'        => t('Commence Import'),
    );
    return $form ;
}
function cassioepia_article_import_form_validate(&$form, &$form_state) {
    $validators = array(
        'file_validate_extensions' => array( 'xls' ),
    );
    if ($file = file_save_upload('excell_file', $validators, "public://", FILE_EXISTS_REPLACE) ) {
        $form_state['values']['excell_file'] = $file;
    }
    else {
        form_set_error('excell_file', 'Kiểm tra lại file upload, chi chấp nhận file .xls');
    }

}
function cassioepia_article_import_form_submit(&$form, &$form_state) {
    module_load_include('inc', 'phpexcel');
    $data_import = phpexcel_import($form_state['values']['excell_file']->destination, FALSE);
    if (!empty($data_import[0])) {
        foreach ($data_import[0] as $key => $value) {
            if($key===0){
                continue;
            }
            $node = new stdClass();
            $node->type = "article";
            $node->language = "vi";
            $node->uid = 1;
            $node->title = $value[0];
            $node->field_article_tx['und'][0]['tid'] = 123;
            $node->body['und'][0]['summary'] = htmlspecialchars_decode($value[4]);
            $node->body['und'][0]['value'] = htmlspecialchars_decode( $value[3]);
            $node->status = 1;

            $arr = explode("/",$value[1]);
            $file_temp = file_get_contents($value[1]);
            $file_temp = file_save_data($file_temp,'public://'.$arr[count($arr)-1]);
            $file_temp->status = 1;
            $node->field_image['und'][0] = (array)$file_temp;
            $node = node_submit($node);
            $node->created = date('U',$value[5]);
            node_save($node);
//            die;
        }
    }
}
function cassiopeia_event_member_delete_form($form , $form_state,$event_id=null) {
    global $user;
    $form['#event_id'] = $event_id;
    if(!empty($form['#event_id'])){
        $query = db_select("tbl_event_member","tbl_event_member");
        $query -> fields("tbl_event_member");
        $query -> condition("user_id",$user->uid,"=");
        $query -> condition("id",$form['#event_id'],"=");
        $result = $query -> execute() -> fetchAssoc();
    }
    $form['name'] = array(
        '#type' => 'textfield',
        '#title' => t('Tên nhóm đối tượng'),
        '#size' => 60,
        '#maxlength' => 128,
        '#required' => False,
        '#attributes'   => array("disabled"=>"disabled"),
        '#default_value'    => !empty($result)?$result['name']:"",
    );
    $form['price'] = array(
        '#type' => 'textfield',
        '#title' => t('Giá áp dụng'),
        '#size' => 60,
        '#maxlength' => 128,
        '#required' => False,
        '#default_value'    => !empty($result)?$result['price']:"",
        '#attributes'   => array("disabled"=>"disabled"),
    );
    $form['submit'] = array(
        '#type'         => 'submit',
        '#value'        => t('Delete'),
    );
    return $form ;
}
function cassiopeia_event_member_delete_form_submit($form,&$form_state){
    global $user;
    try{
        db_delete("tbl_event_member")->condition("id",$form['#event_id'],"=")->condition("user_id",$user->uid,"=")->execute();
        db_delete("tbl_event_member_detail")->condition("event_member_id",$form['#event_id'],"=")->execute();
    }catch (Exception $e){

    }
    drupal_set_message("Xóa thành công!");
    drupal_goto("/event/manager/member");
}
function cassiopeia_event_member_import_form($form , $form_state,$event_id=null) {
    global $user;
    $form['#event_id'] = $event_id;
    if(!empty($form['#event_id'])){
        $query = db_select("tbl_event_member","tbl_event_member");
        $query -> fields("tbl_event_member");
        $query -> condition("user_id",$user->uid,"=");
        $query -> condition("id",$form['#event_id'],"=");
        $result = $query -> execute() -> fetchAssoc();
    }
    $form['name'] = array(
        '#type' => 'textfield',
        '#title' => t('Tên nhóm đối tượng'),
        '#size' => 60,
        '#maxlength' => 128,
        '#required' => TRUE,
        '#default_value'    => !empty($result)?$result['name']:"",
    );
    $form['price'] = array(
        '#type' => 'textfield',
        '#title' => t('Giá áp dụng'),
        '#size' => 60,
        '#maxlength' => 128,
        '#required' => TRUE,
        '#default_value'    => !empty($result)?$result['price']:"",
    );

    $form['excell_file'] = array(
        '#title'        => 'Excel file',
        '#type'         => 'file',
        '#description'  => ($max_size = parse_size(ini_get('upload_max_filesize'))) ? t('Due to server restrictions, the <strong>maximum upload file size is !max_size</strong>. Files that exceed this size will be disregarded.', array('!max_size' => format_size($max_size))) : '',
    );
    $form['submit'] = array(
        '#type'         => 'submit',
        '#value'        => t('Import'),
    );
    return $form ;
}

function cassiopeia_event_member_import_form_validate(&$form, &$form_state) {
    $validators = array(
        'file_validate_extensions' => array( 'xls' ),
    );
    if ($file = file_save_upload('excell_file', $validators, "public://", FILE_EXISTS_REPLACE) ) {
        $form_state['values']['excell_file'] = $file;
    }
    else {
        form_set_error('excell_file', 'Kiểm tra lại file upload, chi chấp nhận file .xls');
    }

}
function cassiopeia_event_member_import_form_submit(&$form, &$form_state) {
    global $user;
    if(!empty($form['#event_id'])){
        $query = db_select("tbl_event_member","tbl_event_member");
        $query -> fields("tbl_event_member");
        $query -> condition("user_id",$user->uid,"=");
        $query -> condition("id",$form['#event_id'],"=");
        $result = $query -> execute() -> fetchAssoc();
        if(!empty($result)){
            db_delete("tbl_event_member")->condition("id",$form['#event_id'],"=")->condition("user_id",$user->uid,"=")->execute();
            db_delete("tbl_event_member_detail")->condition("event_member_id",$form['#event_id'],"=")->execute();
        }
    }
    $id = db_insert("tbl_event_member")->fields(array(
        "user_id"   => $user->uid,
        "price"     => $form_state['values']['price'],
        "name"     => $form_state['values']['name'],
    ))->execute();
    module_load_include('inc', 'phpexcel');
    $data_import = phpexcel_import($form_state['values']['excell_file']->destination, FALSE);
    if (!empty($data_import[0])) {
        foreach ($data_import[0] as $key => $value) {
            if($key===0){
                continue;
            }
            db_insert("tbl_event_member_detail")->fields(array(
                "event_member_id"   => $id,
                "code"              => $value[0],
                "full_name"         => $value[1],
                "email"             => $value[2],
            ))->execute();
        }
    }
}
function cassiopeia_promotion_code_import_form($form , $form_state) {
    $form['excel_file'] = array(
        '#title'        => 'Excel file',
        '#type'         => 'file',
        '#description'  => ($max_size = parse_size(ini_get('upload_max_filesize'))) ? t('Due to server restrictions, the <strong>maximum upload file size is !max_size</strong>. Files that exceed this size will be disregarded.', array('!max_size' => format_size($max_size))) : '',
    );
    $form['submit'] = array(
        '#type'         => 'submit',
        '#value'        => t('Import'),
    );
    return $form ;
}
function cassiopeia_promotion_code_import_form_validate(&$form, &$form_state) {
    $validators = array(
        'file_validate_extensions' => array( 'xls' ),
    );
    if ($file = file_save_upload('excel_file', $validators, "public://", FILE_EXISTS_REPLACE) ) {
        $form_state['values']['excel_file'] = $file;
    }
    else {
        form_set_error('excel_file', 'Kiểm tra lại file upload, chi chấp nhận file .xls');
    }

}

function cassiopeia_promotion_code_import_form_submit(&$form, &$form_state) {
    module_load_include('inc', 'phpexcel');
    $data_import = phpexcel_import($form_state['values']['excel_file']->destination, FALSE);
    if (!empty($data_import[0])) {
        foreach ($data_import[0] as $key => $value) {
            if($key<=1){
                continue;
            }
//            print_r($value);
//            die;
            $_code = $value[0];
            $_golf = $value[6];
            $_array = array();
            if(!empty($_golf)){
                $_splitter = explode(",",$_golf);
                if(!empty($_splitter)){
                    for($_i = 0; $_i<count($_splitter);$_i++){
                        $_array[trim($_splitter[$_i])] = trim($_splitter[$_i]);
                    }
                }
            }
//            if(!empty($_array)){
            $_array = serialize($_array);
//            }
            $query = db_select("promotion","tbl_promotion");
            $query -> condition("code",$_code,"=");
            $query->fields("tbl_promotion");
            $result = $query->execute()->fetchAll();
            if(empty($result)){
                try{
                    db_insert("promotion")->fields(array(
                        "code"      => $_code,
                        "status"    => 0,
                        "created"   => REQUEST_TIME,
                        "amount"    => $value[4],
                        "expired"   => REQUEST_TIME + $value[5]*60*60*24,
                        "kind"      => $value[1],
                        "amount_type"   => $value[2],
                        "kind_2"        => $value[3],
                        "golf"        => $_array,
                    ))->execute();
                }catch (Exception $e){
                    print_r($e);
                    die;
                }

            }
        }
    }
}
function cassiopeia_change_avatar_form($form,&$form_state){
    $form = array();
    $form['avatar'] = array(
        '#title' => t('Image'),
        '#type' => 'managed_file',
        '#upload_location' => 'public://avatar/',
    );
    $form['submit'] = array(
        '#type'     => 'submit',
        '#value'    => t('Update'),
        '#prefix'   => "<div class='button'>",
        '#suffix'   => "</div>",
    );
    return $form;
}
function cassiopeia_change_avatar_form_submit($form,&$form_state){
    global $user;
    if(!empty($user->uid)){
        $existingUser = user_load($user->uid);
        // Load the file via file.fid.
        $file = file_load($form_state['values']['avatar']);
        // Change status to permanent.
        $file->status = FILE_STATUS_PERMANENT;
        // Save.
        file_save($file);
//        print_r($file);
//        die;
        $existingUser->picture = $file;
        user_save($existingUser);
    }
}
function cassiopeia_membership_extension_form($form,&$form_state){
    $form = array();
    $form['submit'] = array(
        '#type'     => 'submit',
        '#value'    => t('Register'),
        '#attributes' => array("class"=>array("btn btn-primary")),
        '#prefix'   => "<div class='button'>",
        '#suffix'   => "</div>",
    );
    return $form;
}
function cassiopeia_membership_extension_form_submit($form,&$form_state){
    global $user;
    $query = db_select("tbl_membership_extension","tbl_membership_extension");
    $query -> fields("tbl_membership_extension");
    $query -> condition("uid",$user->uid,"=");
    $query -> condition("status",0,"=");
    $result = $query->execute()->fetchAll();
    if(!empty($result)){
        drupal_set_message("Bạn đã gửi đăng ký gia hạn rồi, vui lòng đợi phản hồi từ chúng tôi!");
    }else{

        $query = db_insert("tbl_notify");
        $query -> fields(array(
            'title' => "Hội viên ".$user->name." đăng ký gia hạn",
            'from_uid' => 3,
            'to_uid' => -1,
//            'namespace' => $golf->field_namespace['und'][0]['value'],
            'created' => REQUEST_TIME,
            'status' => 0,
            'message_vi' => "Hội viên ".$user->name." đăng ký gia hạn",
            'message_en' => "Hội viên ".$user->name." đăng ký gia hạn",
        ));
        $query->execute();

        db_insert("tbl_membership_extension")->fields(array(
            "uid"    => $user->uid,
            "user_name"    => $user->name,
            "status" => 0,
            "created"=> REQUEST_TIME,
        ))->execute();
        $site_mail = variable_get("site_mail");
        $body[] = "Hội viên ".$user->name." đăng ký gia hạn";
        $headers['From'] = $headers['Sender'] = $headers['Return-Path'] = $site_mail;
        $headers['MIME-Version'] = '1.0';
        $headers['Content-Type'] = 'text/html; charset=UTF-8; format=flowed; delsp=yes';
        $params = array(
            'body' => $body,
            'subject' => "Đăng ký gia hạn hội viên",
            'headers' => $headers,
        );
        drupal_mail('cassiopeia', 'golf_booking_request_mail', "members@alegolf.com", language_default(), $params);
        drupal_set_message("Gửi đăng ký gia hạn thành công, xin vui lòng thanh toán để hoàn tất!");
        $form_state['redirect'] = "user/".$user->uid."/membership/extension/payment";
    }

}

function cassiopeia_membership_extension_finish_form($form,&$form_state,$result){
    $form = array();
    drupal_set_title("Gia hạn hội viên cho ".user_load($result['uid'])->name);
    $form['#result'] = $result;
    $form['submit'] = array(
        '#type'     => 'submit',
        '#value'    => t('Chấp nhận'),
        '#attributes' => array("class"=>array("btn btn-primary")),
        '#prefix'   => "",
        '#suffix'   => "<a href='/admin/manager/membership/extension' class='btn btn-default'>Quay lại</a>",
    );
    return $form;
}
function cassiopeia_membership_extension_finish_form_submit($form,&$form_state){
    $result = $form['#result'];
    try{

        db_update("tbl_membership_extension")->condition("id",$result['id'],"=")->fields(array("status"=>1))->execute();
        $_user = user_load($result['uid']);
//        print($_user->field_account_expiration_date['und'][0]['value']);die;
        $_user->field_account_expiration_date['und'][0]['value'] = date("Y-m-d H:i:s",strtotime($_user->field_account_expiration_date['und'][0]['value']) + 365*24*60*60);
        user_save($_user);
        drupal_set_message("Gia hạn thành công cho hội viên ".user_load($result['uid'])->name."!");
        $form_state['redirect'] = "/admin/manager/membership/extension";
    }catch (Exception $e){
        print_r($e);
//        die;
        drupal_set_message("Hệ thống đang bận, vui lòng thử lại sau!");
    }
}
function cassiopeia_membership_extension_cancel_form($form,&$form_state,$result){
    $form = array();
    drupal_set_title("Hủy gia hạn hội viên cho ".user_load($result['uid'])->name);
    $form['#result'] = $result;
    $form['submit'] = array(
        '#type'     => 'submit',
        '#value'    => t('Thực hiện'),
        '#attributes' => array("class"=>array("btn btn-primary")),
        '#prefix'   => "",
        '#suffix'   => "<a href='/admin/manager/membership/extension' class='btn btn-default'>Quay lại</a>",
    );
    return $form;
}
function cassiopeia_membership_extension_cancel_form_submit($form,&$form_state){
    $result = $form['#result'];
    try{

        db_update("tbl_membership_extension")->condition("id",$result['id'],"=")->fields(array("status"=>2))->execute();
//        $_user = user_load($result['uid']);
//        print($_user->field_account_expiration_date['und'][0]['value']);die;
//        $_user->field_account_expiration_date['und'][0]['value'] = date("Y-m-d H:i:s",strtotime($_user->field_account_expiration_date['und'][0]['value']) + 365*24*60*60);
//        user_save($_user);
        drupal_set_message("Thao tác thành công");
        $form_state['redirect'] = "/admin/manager/membership/extension";
    }catch (Exception $e){
        print_r($e);
//        die;
        drupal_set_message("Hệ thống đang bận, vui lòng thử lại sau!");
    }
}
function cassiopeia_golf_comment_delete_form($form,&$form_state,$result){
    $form = array();
    $__user = user_load($result['uid']);
    if(!empty($__user)){
        drupal_set_title("Xóa bình luận này?");
    }else{
        drupal_set_title("Xóa bình luận này?");
    }

    $form['#result'] = $result;
    $form['submit'] = array(
        '#type'     => 'submit',
        '#value'    => t('Thực hiện'),
        '#attributes' => array("class"=>array("btn btn-primary")),
        '#prefix'   => "",
        '#suffix'   => "<a href='/admin/manager/golf/comment' class='btn btn-default'>Quay lại</a>",
    );
    return $form;
}
function cassiopeia_golf_comment_delete_form_submit($form,&$form_state){
    $result = $form['#result'];
    try{
        db_delete("tbl_rating_comment")->condition("id",$form['#result']['id'],"=")->execute();
        $form_state['redirect'] = "/admin/manager/golf/comment";
    }catch (Exception $e){
        print_r($e);
//        die;
        drupal_set_message("Hệ thống đang bận, vui lòng thử lại sau!");
    }
}
function taxonomy_get_tree_by_lang($vid, $parent = 0, $max_depth = NULL, $load_entities = FALSE,$lang) {
//    print($lang."123");die;
    $children = &drupal_static(__FUNCTION__, array());
    $parents = &drupal_static(__FUNCTION__ . ':parents', array());
    $terms = &drupal_static(__FUNCTION__ . ':terms', array());

    // We cache trees, so it's not CPU-intensive to call taxonomy_get_tree() on a
    // term and its children, too.
    if (!isset($children[$vid])) {
        $children[$vid] = array();
        $parents[$vid] = array();
        $terms[$vid] = array();

        $query = db_select('taxonomy_term_data', 't');
        $query->join('taxonomy_term_hierarchy', 'h', 'h.tid = t.tid');
        $result = $query
            ->addTag('translatable')
            ->addTag('taxonomy_term_access')
            ->fields('t')
            ->fields('h', array('parent'))
            ->condition('t.vid', $vid)
            ->condition('t.language', $lang)
            ->orderBy('t.weight')
            ->orderBy('t.name')
            ->execute();

        foreach ($result as $term) {
            $children[$vid][$term->parent][] = $term->tid;
            $parents[$vid][$term->tid][] = $term->parent;
            $terms[$vid][$term->tid] = $term;
        }
    }

    // Load full entities, if necessary. The entity controller statically
    // caches the results.
    if ($load_entities) {
        $term_entities = taxonomy_term_load_multiple(array_keys($terms[$vid]));
    }

    $max_depth = (!isset($max_depth)) ? count($children[$vid]) : $max_depth;
    $tree = array();

    // Keeps track of the parents we have to process, the last entry is used
    // for the next processing step.
    $process_parents = array();
    $process_parents[] = $parent;

    // Loops over the parent terms and adds its children to the tree array.
    // Uses a loop instead of a recursion, because it's more efficient.
    while (count($process_parents)) {
        $parent = array_pop($process_parents);
        // The number of parents determines the current depth.
        $depth = count($process_parents);
        if ($max_depth > $depth && !empty($children[$vid][$parent])) {
            $has_children = FALSE;
            $child = current($children[$vid][$parent]);
            do {
                if (empty($child)) {
                    break;
                }
                $term = $load_entities ? $term_entities[$child] : $terms[$vid][$child];
                if (isset($parents[$vid][$term->tid])) {
                    // Clone the term so that the depth attribute remains correct
                    // in the event of multiple parents.
                    $term = clone $term;
                }
                $term->depth = $depth;
                unset($term->parent);
                $term->parents = $parents[$vid][$term->tid];
                $tree[] = $term;
                if (!empty($children[$vid][$term->tid])) {
                    $has_children = TRUE;

                    // We have to continue with this parent later.
                    $process_parents[] = $parent;
                    // Use the current term as parent for the next iteration.
                    $process_parents[] = $term->tid;

                    // Reset pointers for child lists because we step in there more often
                    // with multi parents.
                    reset($children[$vid][$term->tid]);
                    // Move pointer so that we get the correct term the next time.
                    next($children[$vid][$parent]);
                    break;
                }
            } while ($child = next($children[$vid][$parent]));

            if (!$has_children) {
                // We processed all terms in this hierarchy-level, reset pointer
                // so that this function works the next time it gets called.
                reset($children[$vid][$parent]);
            }
        }
    }

    return $tree;
}

function sign ($params) {
    return signData(buildDataToSign($params), SECRET_KEY);
}
function signData($data, $secretKey) {
    return base64_encode(hash_hmac('sha256', $data, $secretKey, true));
}
function buildDataToSign($params) {
    $signedFieldNames = explode(",",$params["signed_field_names"]);
    foreach ($signedFieldNames as $field) {
        $dataToSign[] = $field . "=" . $params[$field];
    }
    return commaSeparate($dataToSign);
}
function commaSeparate ($dataToSign) {
    return implode(",",$dataToSign);
}
function cassiopeia_card_type_form($form,&$form_state,$session=array()){
    $form = array();
    $form['#session'] = $session;
    $form['card_type'] = array(
        '#type' => 'select',
        '#title' => t('Selected'),
        '#options' => array(
            '001' => t('Visa'),
            '002' => t('Mastercard'),
        ),
    );
    $form['card_number'] = array(
        '#type' => 'textfield',
        '#title' => t('Card number'),
        '#size' => 60,
        '#maxlength' => 128,
        '#required' => TRUE,
    );
    $form['card_expiry_date'] = array(
        '#type' => 'textfield',
        '#title' => t('Expiry date'),
        '#size' => 60,
        '#maxlength' => 128,
        '#required' => TRUE,
    );
    $form['signature'] = array(
        '#type' => 'textfield',
        '#title' => t('Expiry date'),
        '#size' => 60,
        '#maxlength' => 128,
//        '#required' => TRUE,
    );
    $form['submit'] = array(
        '#type'     => 'submit',
        '#value'    => t('Test'),
//        '#attributes' => array("class"=>array("btn btn-primary")),
//        '#prefix'   => "",
//        '#suffix'   => "<a href='/admin/manager/golf/comment' class='btn btn-default'>Quay lại</a>",
    );
    return $form;
}
function cassiopeia_card_type_form_submit($form,&$form_state){
//    drupal_set_message("asdf");
//    print(1445566677);exit();
    global $user;
    global $language;
    $_user = user_load($user->uid);
    $session = $form['#session'];
    $contact_name = $session['booking']['contact']['contact_name'];
    $contact_mail = $session['booking']['contact']['contact_mail'];
    $contact_phone = $session['booking']['contact']['contact_phone'];
    $contact_address = $session['booking']['contact']['contact_address'];
    $total = $session['booking']['totals'];
    $order_code = $session['booking']['order_code'];

    $params = array();
    $params['access_key'] = ACCESS_KEY;
    $params['profile_id'] = PROFILE_ID;
    $params['transaction_uuid'] = uniqid();
    $params['signed_field_names'] = signed_field_names;
    $params['unsigned_field_names'] = unsigned_field_names;
    $params['signed_date_time'] = gmdate("Y-m-d\TH:i:s\Z");
    $params['locale'] = $language->language;
    $params['transaction_type'] = transaction_type;
    $params['reference_number'] = $order_code;
    $params['amount'] = $total;
    $params['currency'] = "VND";
    $params['payment_method'] = "card";
    $params['bill_to_forename'] = $contact_name;
    $params['bill_to_surname'] = "";
    $params['bill_to_email'] = $contact_mail;
    $params['bill_to_phone'] = $contact_phone;
    $params['bill_to_address_line1'] = $contact_address;
    $params['bill_to_address_city'] = "";
    $params['bill_to_address_state'] = "";
    $params['bill_to_address_country'] = "";
    $params['bill_to_address_postal_code'] = "";
//    $options =  array(
//        'method' => "post",
//        'headers' => array('Content-Length' => 1024),
//        'data' => array(
//            'access_key' => $params['access_key'],
//            'profile_id' => $params['profile_id'],
//            'transaction_uuid' => $params['transaction_uuid'],
//            'signed_field_names' => $params['signed_field_names'],
//            'unsigned_field_names' => $params['unsigned_field_names'],
//            'signed_date_time' => $params['signed_date_time'],
//            'locale' => $params['locale'],
//            'transaction_type' => $params['transaction_type'],
//            'reference_number' => $params['reference_number'],
//            'bill_to_forename' => $params['bill_to_forename'],
//            'bill_to_surname' => $params['bill_to_surname'],
//            'bill_to_email' => $params['bill_to_email'],
//            'bill_to_phone' => $params['bill_to_phone'],
//            'bill_to_address_line1' => $params['bill_to_address_line1'],
//            'bill_to_address_city' => $params['bill_to_address_city'],
//            'bill_to_address_state' => $params['bill_to_address_state'],
//            'bill_to_address_country' => $params['bill_to_address_country'],
//            'bill_to_address_postal_code' => $params['bill_to_address_postal_code'],
//            'card_type' => $form_state['values']['card_type'],
//            'card_number' => $form_state['values']['card_number'],
//            'card_expiry_date' => $form_state['values']['card_expiry_date'],
//            'signature' => sign($params),
//        )
//    );
//    $result = drupal_http_request("https://testsecureacceptance.cybersource.com/silent/pay",$options);
//    print_r($result);
//    die;
    $data = array(
        'access_key' => $params['access_key'],
        'profile_id' => $params['profile_id'],
        'transaction_uuid' => $params['transaction_uuid'],
        'signed_field_names' => $params['signed_field_names'],
        'unsigned_field_names' => $params['unsigned_field_names'],
        'signed_date_time' => $params['signed_date_time'],
        'locale' => $params['locale'],
        'transaction_type' => $params['transaction_type'],
        'reference_number' => $params['reference_number'],
        'bill_to_forename' => $params['bill_to_forename'],
        'bill_to_surname' => $params['bill_to_surname'],
        'bill_to_email' => $params['bill_to_email'],
        'bill_to_phone' => $params['bill_to_phone'],
        'bill_to_address_line1' => $params['bill_to_address_line1'],
        'bill_to_address_city' => $params['bill_to_address_city'],
        'bill_to_address_state' => $params['bill_to_address_state'],
        'bill_to_address_country' => $params['bill_to_address_country'],
        'bill_to_address_postal_code' => $params['bill_to_address_postal_code'],
        'card_type' => $form_state['values']['card_type'],
        'card_number' => $form_state['values']['card_number'],
        'card_expiry_date' => $form_state['values']['card_expiry_date'],
        'signature' => sign($params),
    );
//    header("POST /silent/pay HTTP/1.1" );
//    header("Host: https://testsecureacceptance.cybersource.com" );
////    header("location: https://testsecureacceptance.cybersource.com/silent/pay");
//    header("Content-Type : application/x-www-form-urlencoded");
//    header($data);

//    $data = array();
//    $data = http_build_query($data);
    $data = urlencode("name=123");

    header('Location: https://testsecureacceptance.cybersource.com/silent/pay');
    header("Content-type: application/x-www-form-urlencoded; charset=UTF-8" );
    header("Content-length: " . strlen($data)  );
    header("Connection: close" );
    header($data);


    drupal_exit();
//    die;
}
function cassiopeia_promotion_code_edit_form($form,&$form_state,$item){
    $form = array();
    $form['#item'] = $item;
//    print_r($item);
    $form['code'] = array(
        '#type' => 'textfield',
        '#title' => t('Code'),
        '#default_value' => $item['code'],
        '#size' => 60,
        '#maxlength' => 128,
        '#required' => TRUE,
        '#readonly' => TRUE,
    );
    $form['amount'] = array(
        '#type' => 'textfield',
        '#title' =>'Mệnh giá',
        '#required' => TRUE,
        '#default_value' => $item['amount'],
    );


    $form['amount_type'] = array(
        '#type' => 'select',
        '#title' =>'Kiểu (% hoặc tiền mặt)',
        '#options' => array(
            0 => 'Tiền mặt',
            1 => 'Phần trăm',
        ),
        '#required' => TRUE,
        '#default_value' => $item['amount_type'],
    );
    $form['kind'] = array(
        '#type' => 'select',
        '#title' =>'Áp dụng cho',
        '#options' => array(
            1 => 'Đặt sân',
            2 => 'Đặt tour',
        ),
        '#default_value' => $item['kind'],
        '#required' => TRUE,
    );
    foreach (cassiopeia_get_all_golf() as $key => $value) {
        $golf_options[$value->nid] = $value->title;
    }
    $form['golf'] = array(
        '#type'         => 'select',
        '#title'        => "Sân golf",
        '#multiple'     => 11,
        '#options'      => $golf_options,
        '#attributes'   => array("class"=>array("golf-select")),
        '#default_value' => unserialize($item['golf']),
    );
    $form['kind_2'] = array(
        '#type' => 'select',
        '#title' =>'Số lần sử dụng',
        '#options' => array(
            1 => '1 lần',
            0 => 'Nhiều lần',
        ),
        '#default_value' => $item['kind_2'],
        '#required' => TRUE,
    );
//    serialize(
    $form['expired'] = array(
        '#type'=>'textfield',
        '#title'=>'Thời hạn',
        '#default_value'=> ($item['expired']-$item['created'])/(60*60*24),
        '#description' => 'Thời hạn  tính bằng ngày',
        '#required' => TRUE,

    );

    $form['submit'] = array(
        '#type' => 'submit',
        '#value' => 'Sửa',
    );
    return $form;
}
function cassiopeia_promotion_code_edit_form_submit($form,&$form_state){
    try{
        db_update("promotion")->fields(
            array(
//                "type"          => $form_state['values']['type'],
                "amount"        => $form_state['values']['amount'],
                "amount_type"   => $form_state['values']['amount_type'],
                "kind"          => $form_state['values']['kind'],
                "kind_2"          => $form_state['values']['kind_2'],
                "golf"          => serialize($form_state['values']['golf']),
                "expired"       => $form['#item']['created']+$form_state['values']['expired']*24*3600,
            )
        )
            ->condition("status",1,"<>")
            ->condition("code",$form['#item']['code'],"=")
            ->execute();
        drupal_set_message("Sửa thành công");
        drupal_goto("/admin/manager/promotion_code");
    }catch (Exception $e){
        print_r($e);
    }
}
function cassiopeia_promotion_code_delete_form($form,&$form_state,$item){
    $form = array();
    $form['#item'] = $item;
    $form['button'] = array(
        '#type'            => 'submit',
        '#value'           => t('Xác nhận'),
        '#weight'          => 19,
        '#prefix'          => "<div class='form-button'>",
        '#suffix'          => "<a class='btn btn-default' href='/admin/manager/promotion_code'>".t("Cancel")."</a></div>",
    );
    return $form;
}
function cassiopeia_promotion_code_delete_form_submit($form,&$form_state){
    try{
        db_delete("promotion")->condition("code",$form['#item']['code'],"=")->execute();
        drupal_set_message("Xóa thành công");
        drupal_goto("/admin/manager/promotion_code");
    }catch (Exception $e){
        print_r($e);
    }
}
function cassiopeia_get_hotdeal_teetimes($node){
    $conditions = array();
    $conditions['status'] = array(
        "type"      => "propertyCondition",
        "value"     => 1,
        "condition" => "=",
    );
    $conditions['created'] = array(
        "type"      => "propertyOrderBy",
        "direction" => "DESC",
    );
    $conditions['field_hot_deal'] = array(
        "type"      => "fieldCondition",
        "key"       => "value",
        "value"     => 1,
        "condition" => "=",
    );
    $conditions['field_c_t_t_parent'] = array(
        "type"      => "fieldCondition",
        "key"       => "nid",
        "value"     => $node->nid,
        "condition" => "=",
    );

    $nodes = cassiopeia_get_items_by_conditions($conditions,"ctype_tea_time","node");
    return $nodes;
}

function cassiopeia_get_sih_nodes($type="article",$limit=null){
    global $language;
    $conditions = array();
    $conditions['status'] = array(
        "type"      => "propertyCondition",
        "value"     => 1,
        "condition" => "=",
    );
    $conditions['created'] = array(
        "type"      => "propertyOrderBy",
        "direction" => "DESC",
    );
    $conditions['language'] = array(
        "type"      => "propertyCondition",
        "value"     => $language->language,
        "condition" => "=",
    );
    $conditions['field_article_sih'] = array(
        "type"      => "fieldCondition",
        "key"       => "value",
        "value"     => 1,
        "condition" => "=",
    );
    if(!empty($limit)){
        $conditions['range'] = array(
            "type"      => "range",
            "start"     => 0,
            "limit"     => $limit,
        );
    }
    $items = cassiopeia_get_items_by_conditions($conditions,$type,"node");
    return $items;
}

function cassiopeia_get_tee_times_by_conditions($conditions){
    $golfs = array();
    $query = db_select("node","tbl_teetime");
    $query -> fields("tbl_teetime");
    $query -> condition("type","ctype_tea_time");
    $query -> join("field_data_ field_c_t_t_date","tbl_date","tbl_date.entity_id = tbl_teetime.nid");
    $query -> join("field_data_field_c_t_t_sh","tbl_time","tbl_time.entity_id = tbl_teetime.nid");
    $query -> join("field_data_field_teetime_live","tbl_live","tbl_live.entity_id = tbl_teetime.nid");
    $query -> condition("tbl_time.field_c_t_t_sh_value",REQUEST_TIME,">=");
    $query -> fields("tbl_time");
    $query -> fields("tbl_live");
    $query -> join("field_data_field_c_t_t_hole","tbl_hole","tbl_hole.entity_id = tbl_teetime.nid");
    $query -> fields("tbl_hole");
    $query -> join("field_data_field_c_t_t_max_player","tbl_max_player","tbl_max_player.entity_id = tbl_teetime.nid");
    $query -> fields("tbl_max_player");
    $query -> join("field_data_field_c_t_t_player","tbl_player","tbl_player.entity_id = tbl_teetime.nid");
    $query -> fields("tbl_player");
    $query -> join("field_data_field_c_t_t_a_price","tbl_price","tbl_price.entity_id = tbl_teetime.nid");
    $query -> join("field_data_field_c_t_t_price","tbl_golf_price","tbl_golf_price.entity_id = tbl_teetime.nid");
    if(!empty($conditions['from-price']['value'])){
        $query -> condition("tbl_price.field_c_t_t_a_price_value",$conditions['from-price']['value'],">=");
    }
    if(!empty($conditions['to-price']['value'])){
        $query -> condition("tbl_price.field_c_t_t_a_price_value",$conditions['to-price']['value'],"<=");
    }
    if(!empty($conditions['hole']['value'])){
        $query -> condition("tbl_hole.field_c_t_t_hole_value",$conditions['hole']['value'],"=");
    }
    if(!empty($conditions['hotdeal']['value'])){
        $query -> join("field_data_field_hot_deal","tbl_hotdeal","tbl_hotdeal.entity_id = tbl_teetime.nid");
    }
    if(!empty($conditions['date']['value'])){
        $query -> condition("tbl_date.field_c_t_t_date_value",$conditions['date']['value'],"=");
    }
    if(!empty($conditions['from-time']['value'])){
        $query -> condition("tbl_time.field_c_t_t_sh_value",$conditions['from-time']['value'],">=");
    }
    if(!empty($conditions['to-time']['value'])){
        $query -> condition("tbl_time.field_c_t_t_sh_value",$conditions['to-time']['value'],"<=");
    }
    if(!empty($conditions['from-date']['value'])){
        $query -> condition("tbl_date.field_c_t_t_date_value",$conditions['from-date']['value'],">=");
    }
    if(!empty($conditions['to-date']['value'])){
        $query -> condition("tbl_date.field_c_t_t_date_value",$conditions['to-date']['value'],"<=");
    }
    if(!empty($conditions['golf']['value'])){
        $query -> join("field_data_field_c_t_t_parent","tbl_parent","tbl_parent.entity_id = tbl_teetime.nid");
        $query -> condition("tbl_parent.field_c_t_t_parent_nid",$conditions['golf']['value'],"=");
    }
    if(!empty($conditions['time-frame']['value'])){
        $query -> join("field_data_field_c_t_t_type","tbl_time_frame","tbl_time_frame.entity_id = tbl_teetime.nid");
        $query -> condition("tbl_time_frame.field_c_t_t_type_value",$conditions['time-frame']['value'],"=");
        $query -> fields("tbl_time_frame");
    }
    $query -> fields("tbl_price");
    $query -> fields("tbl_golf_price");
    $query -> fields("tbl_parent");
    $golfs = $query -> execute() ->fetchAll();
    return $golfs;
}
function cassiopeia_golf_booking_submit($data){
    global $user;
    $data = json_decode($data);
    $booking_code = $data->booking_code;
    $golfers = $data->golfers;
    $splitter = explode("-",$booking_code);
    $golf_id = $splitter[1];
    $golf = node_load($golf_id);
    $booking = $_SESSION['cart'][$booking_code];
    $data->booking = $booking;
    $total_cost = 0;
//    print_r($golfers);die;
    $transaction = db_transaction();
    try {
        $_check_ = false;
//        print_r($data->booking['tee-times']);
        foreach ($data->booking['tee-times'] as $key => $value) {
//            print_r($value);
            $_tmp_ = node_load($key,null, TRUE);
            $max_slot = $_tmp_->field_c_t_t_max_player['und'][0]['value'];
            $booked_slot = !empty($_tmp_->field_c_t_t_player['und'][0]['value'])?$_tmp_->field_c_t_t_player['und'][0]['value']:0;
            if($max_slot-$booked_slot < count($value['golfers'])){
                $_check_ = true;
            }
            $tee = node_load($key);
//            print_r($tee);
//            break;
            $total_tee_price = 0;
            if ($tee->field_c_t_t_price['und'][0]['value'] < $tee->field_c_t_t_a_price['und'][0]['value']) {
                $_price = $tee->field_c_t_t_price['und'][0]['value'];
            } else {
                $_price = $tee->field_c_t_t_a_price['und'][0]['value'];
            }
//                print_r($data->golfers->$key);
            $check = 0;
            foreach ($data->golfers->$key as $datum){
                $booking_fee = 100000;
                $check = cassiopeia_get_check_user_is_member($datum->mail, $datum->tel);
                if (!empty($check)) {
                    $booking_fee = 0;
                }
                $total_tee_price += $_price + $booking_fee;
//                print($total_tee_price);die;
            }
            $total_cost += $total_tee_price;
        }
//        print($total_cost);
//        die;
        if($_check_){
            drupal_set_message( variable_get('cassiopeia_config_message_form_het_slot'));
            $transaction->rollback();
            drupal_goto("/");
        }else{
            $customer = array();
            foreach($golfers as $golfer){
                foreach($golfer as $item){
                    $customer['name'] = $item->full_name;
                    $customer['tel'] = $item->tel;
                    $customer['mail'] = $item->mail;
                    $customer['namespace'] =  $golf->field_namespace['und'][0]['value'];
                    break;
                }
                break;
            }

            cassiopeia_back_up_customer($customer);
            $data->customer = $customer;
            $_query = db_select("tbl_generator_code","tbl_generator_code");
            $_query -> fields("tbl_generator_code");
            $_query -> condition("id",1000);
            $_query -> range(0,1);
            $_result = $_query->execute()->fetchAssoc();
            if(!empty($_result)){
                $code = $_result['code']+1;
                db_update("tbl_generator_code")->condition("id",1000)->fields(array("code"=>$code))->execute();
            }else{
                $code = 10000;
                db_insert("tbl_generator_code")->fields(
                    array(
                        "id"    =>1000,
                        "code"  => $code,
                    )
                )->execute();
            }
            $code = "DA".$code;
            $data->order_code = $code;
            $site_mail = variable_get("site_mail");
            $cassiopeia_config_mail_form_tee_times_mail = variable_get("cassiopeia_config_mail_form_tee_times_mail");
            $body[] = _cassiopeia_render_theme("module","cassiopeia","templates/upgrade/mail/golf_booking_mail_template.tpl.php",array("data"=>$data));
            $headers['From'] = $headers['Sender'] = $headers['Return-Path'] = $site_mail;
            $headers['MIME-Version'] = '1.0';
            $headers['Content-Type'] = 'text/html; charset=UTF-8; format=flowed; delsp=yes';
            $params = array(
                'body'      => $body,
                'subject'   => variable_get("cassiopeia_config_golf_booking_mail_form_mail_title")." - ".$code,
                'headers'   => $headers,
                'code'      => $code,
            );
            foreach($golfers as $golfer){
                foreach($golfer as $item){
                    drupal_mail('cassiopeia', 'golf_booking_request_mail', $item->mail, language_default(), $params);
                }
            }
//            if(!empty($data['golf']->field_ctype_golf_email['und'][0]['value'])){
//                if(empty($data['golf']->field_ctype_golf_live['und'][0]['value'])){
//                    $body1 = array();
//                    $body1[] = _cassiopeia_render_theme("module","cassiopeia","templates/nodes/golf_booking_mail_template_for_golf_manager.tpl.php",array("data"=>$data));
//                    $headers['From'] = $headers['Sender'] = $headers['Return-Path'] = $site_mail;
//                    $headers['MIME-Version'] = '1.0';
//                    $headers['Content-Type'] = 'text/html; charset=UTF-8; format=flowed; delsp=yes';
//                    $params1 = array(
//                        'body'      => $body1,
//                        'subject'   => variable_get("cassiopeia_config_golf_booking_mail_form_mail_title")." - ".$code,
//                        'headers'   => $headers,
//                        'code'      => $code,
//                    );
//                    drupal_mail('cassiopeia', 'golf_booking_for_admin_request_mail', $data['golf']->field_ctype_golf_email['und'][0]['value'], language_default(), $params1);
//                }
//            }
//            drupal_mail('cassiopeia', 'golf_booking_for_customer_request_mail', $form_state['values']['contact_email'], language_default(), $params);
            drupal_mail('cassiopeia', 'golf_booking_for_admin_request_mail', variable_get("cassiopeia_config_mail_form_tee_times_mail"), language_default(), $params);

            cassiopeia_send_customer_to_get_fly($data);

            $message = 'Khách hàng: '.$customer['name'].' đã đặt tee time  tại '.$golf->title."<a href='/manager/edit/golf-booking/".$code."'>Xem chi tiết</a>";
            $message = "Khách hàng".$customer['name'].' đã đặt tee time  tại '.$golf->title;
            $query = db_insert("tbl_notify");
            $query -> fields(array(
                'title' => 'Thông báo đặt tee time ('.$message.")",
                'from_uid' => 3,
                'to_uid' => -1,
                'namespace' => $golf->field_namespace['und'][0]['value'],
                'created' => REQUEST_TIME,
                'status' => 0,
                'message_vi' => $message,
                'message_en' => $message,
            ));
            $query->execute();
//            $total_cost = 0;

//            print("trung");
//            die;


            $promotion =  cassiopeia_get_promotion_card_by_code($data->promotion_code,1,$golf_id);
            if(!empty($promotion)){
                switch($promotion->amount_type){
                    case 0:
                        $_value = $promotion -> amount;
                        break;
                    case 1:
                        $_value = ($promotion -> amount)*$total_cost;
                        break;
                }
                $total_cost -= $_value;
            }

            db_insert('golf_booking') // Table name no longer needs {}
            ->fields(array(
                'code' => $code,
                'uid' => !empty($user->uid)?$user->uid:0,
                'contact_name' => $customer['name'] ,
                'contact_mail' => $customer['mail'] ,
                'contact_phone' => $customer['tel'] ,
                'contact_address' => "" ,
                'payment_method' => 1,
                'payment_option' => NULL,
                'golfId' => $golf->nid,
                'booking_fee' => 0,
                'card_transaction_fee' => null,
                'promotion_code' => !empty($data->promotion_code)?$data->promotion_code:'',
                'promotion_price' => $_value,
//                'invoice' => null,
                'totals' => $total_cost,
                'status' => 1,
                'created' => REQUEST_TIME,
            ))
                ->execute();

            foreach ($data->booking['tee-times'] as $key => $value) {
                $tea_time_utilitie = '';
                $tee = node_load($key);
//                if(!empty($value['tea_time']->field_c_t_t_utility['und'])) {
//                    foreach ($value['tea_time']->field_c_t_t_utility['und'] as $field_c_t_t_utility_key => $field_c_t_t_utility_value) {
//                        $tea_time_utilitie = $tea_time_utilitie . ',' .$field_c_t_t_utility_value;
//                        if (!empty($tea_time_utilitie)) {
//                            $tea_time_utilitie = $tea_time_utilitie . ',' .$field_c_t_t_utility_value;
//                        }else {
//                            $tea_time_utilitie = $field_c_t_t_utility_value;
//                        }
//                    }
//
//                }
                if($tee->field_c_t_t_price['und'][0]['value'] < $tee->field_c_t_t_a_price['und'][0]['value']){
                    $_price = $tee->field_c_t_t_price['und'][0]['value'];
                }else{
                    $_price = $tee->field_c_t_t_a_price['und'][0]['value'];
                }
                try{
                    $tea_time_id = db_insert('golf_booking_tea_time') // Table name no longer needs {}
                    ->fields(array(
                        'code' => $code,
                        'tea_time_price' => $_price,
                        'tea_time_start' => $tee->field_c_t_t_sh['und'][0]['value'],
                        'tea_time_date' => strtotime ($tee->field_c_t_t_date['und'][0]['value']),
                        'tea_time_id' => $tee->nid,
                        'tea_time_utilitie' => $tea_time_utilitie,
                        'tea_time_hole' => $tee->field_c_t_t_hole['und'][0]['value'],
                    ))
                        ->execute();
                }catch (Exception $e){
                    print_r($e);
                    die;
                }
//                -----------------
                foreach($data->golfers->$key as $datum){
                    db_insert('golf_booking_player') // Table name no longer needs {}
                    ->fields(array(
                        'player_full_name' => $datum->full_name ,
                        'player_email' => $datum->mail,
                        'player_phone_number' => $datum->tel,
//                        'player_uid' => !empty($_player_value['player_uid'])?$_player_value['player_uid']:0,
                        'teaTimeId' => $tea_time_id
                    ))
                        ->execute();
                }

//                foreach ($value['utilities'] as $_utilitie_key => $_utilitie_value) {
//                    db_insert('golf_booking_utilitie') // Table name no longer needs {}
//                    ->fields(array(
//                        'utilitie_price' => $_utilitie_value['price'],
//                        'utilitie_name' => $_utilitie_value['utility']->title,
//                        'quantity'=>$_utilitie_value['quantity'],
//                        'teaTimeId' => $tea_time_id
//                    ))
//                        ->execute();
//                }
            }
//            if(!empty($golf->field_ctype_golf_live['und'][0]['value'])){
//                foreach ($data['booking']['tea_times'] as $key => $value) {
//                    $tea_time = $tee;
//                    $tea_time->field_c_t_t_player['und'][0]['value'] = (int)(!empty($tea_time->field_c_t_t_player['und'][0]['value'])?$tea_time->field_c_t_t_player['und'][0]['value']:0) + count($value['players']);
//                    node_save($tea_time);
//                }
//            }
//            $data['code'] = $code;
//            $booking_golf_complete_key = $code;
//            $_SESSION['booking_golf_complete'][$booking_golf_complete_key] = $data;

            $promotion = cassiopeia_get_promotion_card_by_code($data->promotion_code,1,$golf->nid);
            if(!empty($promotion)){
                if($promotion->kind_2==1){
                    db_update("promotion")->fields(array(
                        "status" => 1,
                    ))->condition("code",$promotion->code,"=")->execute();
                }
            }
            $data->created = REQUEST_TIME;
            $data->total_cost = $total_cost;
            $_SESSION['booking'][$booking_code] = $data;
            return '/golf/booking/complete/'.$booking_code;
        }

    }catch (Exception $e) {
        print_r('e1' .(string)($e));
        $transaction->rollback();
        drupal_set_message('Hệ thống đang bận vui lòng quay lại sau ít phút', 'error');
        drupal_goto(drupal_get_path_alias('node/'.$golf->nid));
    }
}
function cassiopeia_get_hotdeal_golfs_by_conditions($conditions){
    try{
        $day = date('w');
        $week_start = date("Y-m-d 23:59:59", strtotime('-'.$day.' days'));
        $Current = Date('N');
        $DaysToSunday = 7 - $Current;
        $DaysToFriday = 5 - $Current;
        $DaysFromMonday = $Current - 1;
        $Sunday = Date('Y-m-d 23:59:59', StrToTime("+ {$DaysToSunday} Days"));
        if($DaysToFriday<0){
            $Friday = Date('Y-m-d', REQUEST_TIME);
        }else{
            $Friday = Date('Y-m-d 23:59:59', StrToTime("+ {$DaysToFriday} Days"));
        }
        $golfs = array();

        $sub_query = db_select("node","tbl_golf");
        $sub_query -> addField("tbl_golf","nid","tbl_golf_nid");

        $sub_query -> condition("type","ctype_golf");
        $sub_query -> join("field_data_field_tx_area","tbl_area","tbl_area.entity_id = tbl_golf.nid");
        $sub_query -> fields("tbl_area");
        $sub_query -> join('taxonomy_term_data', "taxonomy_term_data","tbl_area.field_tx_area_tid = taxonomy_term_data.tid");
        $sub_query -> addField('taxonomy_term_data', "tid","tbl_area_tid");

        $query = db_select("node","tbl_teetime");
        $query -> fields("tbl_teetime");
        $query -> condition("type","ctype_tea_time");
        $query -> join("field_data_ field_c_t_t_date","tbl_date","tbl_date.entity_id = tbl_teetime.nid");
        $query -> join("field_data_field_c_t_t_sh","tbl_time","tbl_time.entity_id = tbl_teetime.nid");
        $query -> fields("tbl_time");
        $query -> join("field_data_field_hot_deal","tbl_hotdeal","tbl_hotdeal.entity_id = tbl_teetime.nid");

        $query -> join("field_data_field_c_t_t_parent","tbl_parent","tbl_parent.entity_id = tbl_teetime.nid");
        $query -> join("field_data_field_c_t_t_a_price","tbl_price","tbl_price.entity_id = tbl_teetime.nid");
        $query -> join("field_data_field_c_t_t_price","tbl_golf_price","tbl_golf_price.entity_id = tbl_teetime.nid");
        $query -> join("field_data_field_c_t_t_player","tbl_player","tbl_player.entity_id = tbl_teetime.nid");
        $query -> join("field_data_field_c_t_t_max_player","tbl_max_player","tbl_max_player.entity_id = tbl_teetime.nid");
        $query -> fields("tbl_date");
        $query -> fields("tbl_player");
        $query -> fields("tbl_max_player");
        $query -> fields("tbl_price");
        $query -> fields("tbl_golf_price");

        if(!empty($conditions['group_by_tee_id'])){
//            print("--");
//            die;
            $query -> groupBy("tbl_teetime.nid");
        }
//        $query -> groupBy("tbl_teetime.nid"); //check
        $query -> fields("tbl_parent");
        $query -> condition("tbl_hotdeal.field_hot_deal_value",1,"=");

        $query -> join($sub_query,"tbl_sub","tbl_sub.tbl_golf_nid = tbl_parent.field_c_t_t_parent_nid");
        $query -> fields("tbl_sub");
        if(!empty($conditions['location'])){
            $query -> condition("tbl_sub.tbl_area_tid",$conditions['location'],"IN");
        }
        if(!empty($conditions['group_by_golf_id'])){
//            $query -> condition("tbl_time.field_c_t_t_sh_value",array($week_start,strtotime($Friday)),"BETWEEN");
            $query -> groupBy("tbl_parent.field_c_t_t_parent_nid");
        }
        if(!empty($conditions['sort'])){
            switch($conditions['sort']){
                case 1 :
                    $query -> orderBy("tbl_price.field_c_t_t_a_price_value","ASC");
                    break;
                case 2 :
                    $query -> orderBy("tbl_time.field_c_t_t_sh_value","ASC");
                    break;
                case 3 :
                    $query -> join("field_data_field_best_deal","tbl_bestdeal","tbl_bestdeal.entity_id = tbl_teetime.nid");
                    $query -> condition("tbl_bestdeal.field_best_deal_value",1,"=");
                    break;
                case 4 :
                    break;
            }
        }
        if(!empty($conditions['date'])){
//            print( $conditions['date']);
            $query -> condition("tbl_date.field_c_t_t_date_value",date("Y-m-d 0:0:0",strtotime($conditions['date'])),"=");
        }
        if(!empty($conditions['list_id'])){
            $query -> condition("tbl_parent.field_c_t_t_parent_nid",$conditions['list_id'],"NOT IN");
        }
        if(!empty($conditions['golf_id'])){
            $query -> condition("tbl_parent.field_c_t_t_parent_nid",$conditions['golf_id'],"=");
        }
        if(!empty($conditions['limit'])){
            $query -> range(0,$conditions['limit']);
        }
        if(!empty($conditions['weekday'])){
            if(!empty($conditions['next_week'])){
                $query -> condition("tbl_time.field_c_t_t_sh_value",array(strtotime($week_start." +7 days"),strtotime($Friday." +7 days")),"BETWEEN");
            }else{
                $query -> condition("tbl_time.field_c_t_t_sh_value",array(REQUEST_TIME,strtotime($Friday)),"BETWEEN");
            }
        }
        if(!empty($conditions['out'])){
            $query -> condition("tbl_time.field_c_t_t_sh_value",array(strtotime($week_start),strtotime($Friday)),"BETWEEN");
        }
        if(!empty($conditions['weekend'])){
            if(!empty($conditions['next_week'])){
                $query -> condition("tbl_time.field_c_t_t_sh_value",array(strtotime($Friday." +7 days"),strtotime($Sunday." +7 days")),"BETWEEN");
            }else{
//                print(2);
                $query -> condition("tbl_time.field_c_t_t_sh_value",array(strtotime($Friday),strtotime($Sunday)),"BETWEEN");
            }
        }
        if(!empty($conditions['detail'])){
            $query -> condition("tbl_time.field_c_t_t_sh_value",REQUEST_TIME,">=");
        }
        $golfs = $query -> execute() ->fetchAll();
    }catch (Exception $e){
        print_r($e);
    }
//    print(strtotime($Friday) - REQUEST_TIME);
//    print(REQUEST_TIME);
//    print("<br>");
//    print(date("d/m/Y H:i",1574395440));
//    print("<br>");
//    print(strtotime($Friday));
    return $golfs;
}
function cassiopeia_hotdeal_filter_form($form,&$form_state,$caches= array()){

    $form['location'] = array(
        '#type' => 'textfield',
        '#title' => t('Location'),
        '#default_value' => !empty($caches['location'])?$caches['location']:"",
        '#size' => 60,
        '#maxlength' => 128,
//        '#prefix'   => "<div><span class='fa fa-location-arrow'></span>",
//        '#suffix'   => "</div>",
        '#attributes' => array("hidden"=> "hidden"),
    );
//    $form['location'] = array(
//        '#type' => 'select',
//        '#title' => t('Selected'),
//        '#options' => $tids,
////        '#attributes' => array("hidden"=> "hidden"),
//        '#default_value' => !empty($caches['sort'])?$caches['sort']:0,
//    );
    $form['date'] = array(
        '#default_value' => !empty($caches['date'])?date("Y-m-d H:i",strtotime($caches['date'])):date("Y-m-d H:i",REQUEST_TIME),
        '#type' => 'date_popup',
        '#date_format' => 'd-m-Y',
        '#date_year_range' => '-50:0',
//        '#title' => "Ngày sinh: ",
        '#required' => FALSE,
        '#attributes' => array("placeholder"=>t('Date'),'autocomplete' =>'off'),
//        '#theme_wrappers' => array(),
        '#datepicker_options' => array(
//            'maxDate' => '+0', // not more than current date
            'minDate' => '0' // not more than given date
        ),
    );
    $form['sort'] = array(
        '#type' => 'select',
        '#title' => t('Selected'),
        '#options' => array(
//            0 => t('Un sort'),
            1 => t('Lowest Price'),
            2 => t('Earliest'),
//            3 => t('Best Deals'),
        ),
//        '#attributes' => array("hidden"=> "hidden"),
        '#default_value' => !empty($caches['sort'])?$caches['sort']:0,
    );
    $form['#theme'] = "cassiopeia_hotdeal_filter_form";
    $form['submit'] = array('#type' => 'submit', '#value' => "<span>".t("Search")."</span>");
    return $form;
}
function cassiopeia_hotdeal_filter_form_submit($form,&$form_state){
//    die;
    $options = array(
        'query' => array(
            'data' => $form_state['values'],
        )
    );
    $form_state['redirect'] = array('/hot-deals', $options);
}
function cassiopeia_golf_detail_date_form($form,&$form_state,$caches= array()){
    $form['date'] = array(
        '#default_value' => !empty($caches['date'])?date("Y-m-d H:i",strtotime($caches['date'])):date("Y-m-d H:i",REQUEST_TIME),
        '#type' => 'date_popup',
        '#date_format' => 'd-m-Y',
        '#date_year_range' => '-50:0',
//        '#title' => "Ngày sinh: ",
        '#required' => FALSE,
        '#attributes' => array("placeholder"=>t('Date'),'autocomplete' =>'off'),
//        '#theme_wrappers' => array(),
        '#datepicker_options' => array(
//            'maxDate' => '+0', // not more than current date
            'minDate' => '0' // not more than given date
        ),
    );
    return $form;
}
//function cassiopeia_golf_detail_date_form_submit($form,&$form_state){
////    die;
//    $options = array(
//        'query' => array(
//            'data' => $form_state['values'],
//        )
//    );
//    $form_state['redirect'] = array('/hot-deals', $options);
//}
function cassiopeia_get_weather_by_golf($golf){
    $url = 'https://weather-ydn-yql.media.yahoo.com/forecastrss';
    $app_id = '7nMuyw76';
    $consumer_key = 'dj0yJmk9VWRNdkVLeDJuUm9NJmQ9WVdrOU4yNU5kWGwzTnpZbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmc3Y9MCZ4PWEy';
    $consumer_secret = '0a9c8d3f52c4ce34c5336deda9c3e8c4d02c5461';
    $point_from  = array();
//    print($golf->field_ctype_golf_lat['und'][0]['value']);
//    print($golf->field_ctype_golf_lng['und'][0]['value']);
    if(!empty($golf->field_ctype_golf_lat['und'][0]['value']) && !empty($golf->field_ctype_golf_lng['und'][0]['value'])){
        $point_from = array(
            'lat'=>$golf->field_ctype_golf_lat['und'][0]['value'],
            'lng' =>$golf->field_ctype_golf_lng['und'][0]['value']
        );
    }
    if(!empty($point_from)){
//        print("??");
        $query = array(
//            'location' => 'hanoi,vn',
            'format' => 'json',
            'lat' => $point_from['lat'],
            'lon' => $point_from['lng'],
        );
    }else{
        $query = array(
            'location' => 'ha noi, vn',
            'format' => 'json',
//        'lat' => $golf->field_ctype_golf_lat['und'][0]['value'],
//        'lon' => $golf->field_ctype_golf_lon['und'][0]['value'],
        );
    }
    $oauth = array(
        'oauth_consumer_key' => $consumer_key,
        'oauth_nonce' => uniqid(mt_rand(1, 1000)),
        'oauth_signature_method' => 'HMAC-SHA1',
        'oauth_timestamp' => time(),
        'oauth_version' => '1.0'
    );
    $base_info = buildBaseString($url, 'GET', array_merge($query, $oauth));
    $composite_key = rawurlencode($consumer_secret) . '&';
    $oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
    $oauth['oauth_signature'] = $oauth_signature;
    $header = array(
        buildAuthorizationHeader($oauth),
        'X-Yahoo-App-Id: ' . $app_id
    );
    $options = array(
        CURLOPT_HTTPHEADER => $header,
        CURLOPT_HEADER => false,
        CURLOPT_URL => $url . '?' . http_build_query($query),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false
    );
    $ch = curl_init();
    curl_setopt_array($ch, $options);
    $response = curl_exec($ch);
    curl_close($ch);
//    print_r($response);
    $return_data = json_decode($response);
    return $return_data;
//    print_r($return_data);
//    die;
}
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
function cassiopeia_get_weekday($day){
    switch($day){
        case "Mon" :
            return t("Monday");
            break;
        case "Tue" :
            return t("Tuesday");
            break;
        case "Wed" :
            return t("Wednesday");
            break;
        case "Thu" :
            return t("Thursday");
            break;
        case "Fri" :
            return t("Friday");
            break;
        case "Sat" :
            return t("Saturday");
            break;
        case "Sun" :
            return t("Sunday");
            break;
    }
}
function cassiopeia_get_month($mon){
    switch($mon){
        case "Jan" :
            return t("January");
            break;
        case "Feb" :
            return t("February");
            break;
        case "Mar" :
            return t("March");
            break;
        case "Apr" :
            return t("April");
            break;
        case "May" :
            return t("May");
            break;
        case "Jun" :
            return t("June");
            break;
        case "Jul" :
            return t("July");
            break;
        case "Aug" :
            return t("August");
            break;
        case "Sep" :
            return t("September");
            break;
        case "Oct" :
            return t("October");
            break;
        case "Nov" :
            return t("November");
            break;
        case "Dec" :
            return t("December");
            break;
    }
}

function cassiopeia_hotdeals_create_form($form,&$form_state,$caches= array()){
    $conditions = array();
    $conditions['status'] = array(
        "type"      => "propertyCondition",
        "value"     => 1,
        "condition" => "=",
    );
    $conditions['created'] = array(
        "type"      => "propertyOrderBy",
        "direction" => "DESC",
    );
    $golfs = cassiopeia_get_items_by_conditions($conditions,"ctype_golf","node");
    $golf_items = array();
    if(!empty($golfs)){
        foreach($golfs as $golf){
            $golf_items[$golf->nid] = $golf->title;
        }
    }
    $form['teaTimes'] = array(
        '#type' => 'container',
        '#prefix' => '<div id="teaTimesContainer">',
        '#suffix' => '</div>',
    );
    $form['teaTimes']['hole'.$value->hole]['dow'.($i+1)]['hole'.$value->hole.'_dow'.($i+1).'_addMore'] = array(
        '#type' => 'submit',
        '#submit' => array('cassiopeia_add_childteatime_add_one'),
        '#value' => 'hole'.$value->hole.'_dow'.($i+1).'_addMore',
        '#text' => '<span class="icon glyphicon glyphicon-plus" aria-hidden="true"></span> ',
        '#attributes' => array(
            'class' => array('btn close teaTimeAddMore'),
            'type' => 'button',
        ),
        '#ajax' => array(
            'callback' => 'cassiopeia_add_childteatime_ajax_callback',
            'wrapper' => 'teaTimesContainer',
            'method' => 'replace',
            'effect' => 'fade',
        ),
    );




    $form['hotdeals_golf'] = array(
        '#type' => 'select',
        '#title' => t('Selected'),
        '#options' => $golf_items,
//        '#default_value' => $category['selected'],
//        '#description' => t('Set this to <em>Yes</em> if you would like this category to be selected by default.'),
    );
    $form['hotdeals_from_date'] = array(
        '#default_value' => !empty($caches['date'])?date("Y-m-d H:i",strtotime($caches['date'])):date("Y-m-d H:i",REQUEST_TIME),
        '#type' => 'date_popup',
        '#date_format' => 'd-m-Y',
        '#date_year_range' => '-50:0',
        '#required' => FALSE,
        '#attributes' => array("placeholder"=>t('Date'),'autocomplete' =>'off'),
        '#datepicker_options' => array(
            'minDate' => '0' // not more than given date
        ),
    );
    $form['hotdeals_to_date'] = array(
        '#default_value' => !empty($caches['date'])?date("Y-m-d H:i",strtotime($caches['date'])):date("Y-m-d H:i",REQUEST_TIME),
        '#type' => 'date_popup',
        '#date_format' => 'd-m-Y',
        '#date_year_range' => '-50:0',
        '#required' => FALSE,
        '#attributes' => array("placeholder"=>t('Date'),'autocomplete' =>'off'),
        '#datepicker_options' => array(
            'minDate' => '0' // not more than given date
        ),
    );
    $form['hotdeals_to_time'] = array(
        '#title' => '',
        '#type' => 'date_popup',
        '#date_format' => 'H:i',
        '#timepicker' => 'timepicker',
//        '#default_value'=> !empty($form['field_c_t_t_sh']['und'][0]['value']['#default_value'])?date('Y-m-d H:i:s',(int)$form['field_c_t_t_sh']['und'][0]['value']['#default_value']):'',
        '#timepicker_options' => array(
            'rows' => 4,
            'hours'=> array(
                'starts'=> 0,
                'ends'=> 23
            ),
            'showCloseButton' => FALSE,
            'closeButtonText' => t('Close'),
            'hourText'=> 'Giờ',
            'minuteText' => 'Phút',
            'showMinutes' => TRUE,
        ),
//        '#weight' =>  $form['field_c_t_t_sh']['#weight'],
        '#required' => TRUE,
    );

    $form['#theme'] = "cassiopeia_hotdeals_create_form";
    return $form;
}


function cassioepia_event_member_import_form($form , $form_state) {
    $form['excell_file'] = array(
        '#title'        => 'Excel file',
        '#type'         => 'file',
        '#description'  => ($max_size = parse_size(ini_get('upload_max_filesize'))) ? t('Due to server restrictions, the <strong>maximum upload file size is !max_size</strong>. Files that exceed this size will be disregarded.', array('!max_size' => format_size($max_size))) : '',
    );
    $form['submit'] = array(
        '#type'         => 'submit',
        '#value'        => t('Commence Import'),
    );
    return $form ;
}
function cassioepia_event_member_import_form_validate(&$form, &$form_state) {
    $validators = array(
        'file_validate_extensions' => array( 'xls' ),
    );
    if ($file = file_save_upload('excell_file', $validators, "public://", FILE_EXISTS_REPLACE) ) {
        $form_state['values']['excell_file'] = $file;
    }
    else {
        form_set_error('excell_file', 'Kiểm tra lại file upload, chi chấp nhận file .xls');
    }

}
function cassioepia_event_member_import_form_submit(&$form, &$form_state) {
    module_load_include('inc', 'phpexcel');
    $data_import = phpexcel_import($form_state['values']['excell_file']->destination, FALSE);
    if (!empty($data_import[0])) {
        foreach ($data_import[0] as $key => $value) {
            if($key===0){
                continue;
            }
            $node = new stdClass();
            $node->type = "article";
            $node->language = "vi";
            $node->uid = 1;
            $node->title = $value[0];
            $node->field_article_tx['und'][0]['tid'] = 123;
            $node->body['und'][0]['summary'] = htmlspecialchars_decode($value[4]);
            $node->body['und'][0]['value'] = htmlspecialchars_decode( $value[3]);
            $node->status = 1;

            $arr = explode("/",$value[1]);
            $file_temp = file_get_contents($value[1]);
            $file_temp = file_save_data($file_temp,'public://'.$arr[count($arr)-1]);
            $file_temp->status = 1;
            $node->field_image['und'][0] = (array)$file_temp;
            $node = node_submit($node);
            $node->created = date('U',$value[5]);
            node_save($node);
//            die;
        }
    }
}
function cassiopeia_booking_event_submit($data,$event_id){
//    print_r($data->member);die;
    if(!empty($data->member)){
        foreach($data->member as $value){
            try{
                db_insert("tbl_event_register")->fields(array(
                    "full_name"     => !empty($value->name)?$value->name:"",
                    "gender"        => !empty($value->gender)?$value->gender:0,
                    "tel"           => !empty($value->tel)?$value->tel:"",
                    "email"         => !empty($value->mail)?$value->mail:"",
                    "handicap"      => !empty($value->handicap)?$value->handicap:0,
                    "size"          => !empty($value->size)?$value->size:"",
                    "promotion_code"=> !empty($value->promotion)?$value->promotion:"",
//                    "code"          => !empty($value->name)?$value->name:"",
                    "payment_type"  => !empty($value->method)?$value->method:0,
                    "event_id"      => $event_id,
                    "group_code"    => REQUEST_TIME,
                    "target"        => !empty($value->target)?$value->target:0,
                ))->execute();
            }catch (Exception $e){
                throw $e;
            }
        }
        drupal_set_message("Cảm ơn bạn đã tin tưởng và sử dụng dịch vụ của chúng tôi. Chúng tôi sẽ liên hệ lại trong thời gian sớm nhất!");
    }
}

function cassiopeia_event_manager_filter_form($form,&$form_state,$caches = array()){
    $form = array();
    $conditions['status'] = array(
        "type"      => "propertyCondition",
        "value"     => 1,
        "condition" => "=",
    );
    $conditions['created'] = array(
        "type"      => "propertyOrderBy",
        "direction" => "DESC",
    );
    $golfs = cassiopeia_get_items_by_conditions($conditions,"ctype_golf","node");
    $nids = array();
    $nids['all'] = "Tất cả";
    if(!empty($golfs)){
        foreach($golfs as $golf){
            $nids[$golf->nid] = $golf->title;
        }
    }
    $form['cassiopeia_event_manager_filter_form_golf'] = array(
        '#type' => 'select',
        '#title' => t('Golf'),
        '#options' => $nids,
        '#default_value' => !empty($caches['golf'])?$caches['golf']:'all',
    );
    $form['cassiopeia_event_manager_filter_form_date'] = array(
        '#type' => 'date_popup',
        '#default_value' => !empty($caches['date'])?date("Y-m-d H:i",strtotime($caches['date'])):null,
        '#date_type' => DATE_DATETIME,
        '#date_timezone' => date_default_timezone(),
        '#date_format' => 'm/d/Y',
        '#date_increment' => 1,
        '#date_year_range' => '-3:+3',
//        '#required' => TRUE,
    );
    $form['submit'] = array('#type' => 'submit', '#value' => 'Lọc');
    return $form;
}
function cassiopeia_event_manager_filter_form_submit($form,&$form_state){
    $options = array(
        'query' => array(
            'data' => $form_state['values'],
        )
    );
    $form_state['redirect'] = array('/event/manager/events', $options);
}
function cassiopeia_event_export($tea_times) {
    module_load_include('inc', 'phpexcel');
    $data = array();
    $headers = array("id","Sân",'Số hố','Khung giờ','Giờ chơi',"Giá sân", "Giá ALEGOLF", 'Trạng thái');
    $parent = null;
    foreach ($tea_times as $key => $tea_time) {
        $parent  = node_load($tea_time->field_c_t_t_parent['und'][0]['nid']);
        $tea_time_type = '';
        $time_frame = taxonomy_term_load($tea_time->field_c_t_t_type['und'][0]['value']);
        $tea_time_type = $time_frame->name;
        $data[] = array(
            $tea_time->nid,
            $parent->title,
            $tea_time->field_c_t_t_hole['und'][0]['value'],
            $tea_time_type,
            date('d/m/Y H:i',$tea_time->field_c_t_t_sh['und'][0]['value']),
            $tea_time->field_c_t_t_a_price['und'][0]['value'],
            $tea_time->field_c_t_t_a_price['und'][0]['value'],
            $tea_time->status);
    }


    // Store the file in sites/default/files
    $dir = file_stream_wrapper_get_instance_by_uri('public://')->realpath();
    $filename =  'export_'.date('d_m_Y_H_i', REQUEST_TIME).'.xls';
    $path = "$dir/$filename";

    // Use the .xls format
    $options = array('format' => 'xls');

    $result = phpexcel_export($headers, $data, $path, $options);
    if ($result == PHPEXCEL_SUCCESS) {
        // notify to admin
        drupal_set_message(t("Ok"));
        return array('name'=>$filename,'uri'=>'public://'.$filename,'golf'=>$parent);
    }
    else {
        drupal_set_message($result, 'error');
        return null;
    }
}
function cassiopeia_event_registration_export($result){
    module_load_include('inc', 'phpexcel');
    $data = array();
    $headers = array("Họ tên","Giới tính",'Số điện thoại','Email','Handicap',"Đối tượng", "Size", 'Mã giảm giá');
    $parent = null;
    foreach ($result as $key => $value) {
        $data[] = array(
            $value->full_name,
            $value->gender,
            $value->tel,
            $value->email,
            $value->handicap,
            $value->target,
            $value->size,
            $value->promotion_code,
        );
    }


    // Store the file in sites/default/files
    $dir = file_stream_wrapper_get_instance_by_uri('public://')->realpath();
    $filename =  'export_'.date('d_m_Y_H_i', REQUEST_TIME).'.xls';
    $path = "$dir/$filename";
//    print($path);
    // Use the .xls format
    $options = array('format' => 'xls');

    $result = phpexcel_export($headers, $data, $path, $options);
//    print_r($result);
    if ($result == PHPEXCEL_SUCCESS) {
//         notify to admin
        drupal_set_message(t("Ok"));
        return array('name'=>$filename,'uri'=>'public://'.$filename,'golf'=>$parent);
    }
    else {
        drupal_set_message($result, 'error');
        return null;
    }
}

function cassiopeia_event_report_filter($form,&$form_state,$caches){
    $form['#event_id'] = $caches['event_id'];
    $form['cassiopeia_event_report_filter_start'] = array(
        '#type' => 'date_popup',
        '#date_format' => 'd-m-Y',
        '#date_year_range' => '-50:50',
        '#required' => FALSE,
        '#default_value' => REQUEST_TIME,
        '#attributes' => array("placeholder"=>date("d/m/Y",REQUEST_TIME),'autocomplete' =>'off'),
    );
    $form['cassiopeia_event_report_filter_end'] = array(
        '#type' => 'date_popup',
        '#date_format' => 'd-m-Y',
        '#date_year_range' => '-50:50',
        '#required' => FALSE,
        '#default_value' => REQUEST_TIME,
        '#attributes' => array("placeholder"=>date("d/m/Y",REQUEST_TIME),'autocomplete' =>'off'),
    );
    $form['submit'] = array('#type' => 'submit', '#value' => t('Filter'));
    return $form;
}
function cassiopeia_event_report_filter_submit($form,&$form_state){
    $options = array(
        'query' => array(
            'data' => $form_state['values'],
        )
    );
    $form_state['redirect'] = array('/event/report/'.$form['#event_id'], $options);
}
