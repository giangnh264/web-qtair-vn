<?php

/**
 * @file
 * Generates the agency ticket PDF attachment.
 */

function cassiopeia_agency_ticket_pdf_enabled($agent) {
    return !empty($agent->field_agent_ticket_pdf['und'][0]['value']);
}

function cassiopeia_agency_ticket_pdf_airline_config($airline_code) {
    $airline_code = strtoupper(trim((string) $airline_code));
    $configs = array(
        'VN' => array(
            'display_code' => 'VNA',
            'name' => 'Vietnam Airlines',
            'color' => '#006885',
            'header' => 1,
            'icon' => 1,
        ),
        'VJ' => array(
            'display_code' => 'VJ',
            'name' => 'Vietjet',
            'color' => '#db2427',
            'header' => 2,
            'icon' => 2,
        ),
        'QH' => array(
            'display_code' => 'QH',
            'name' => 'Bamboo Airways',
            'color' => '#3fa034',
            'header' => 3,
            'icon' => 3,
        ),
        'SPA' => array(
            'display_code' => 'SPA',
            'name' => 'Sun PhuQuoc Airways',
            'color' => '#d0181e',
            'header' => 4,
            'icon' => 4,
        ),
        'VU' => array(
            'display_code' => 'VU',
            'name' => 'Vietravel Airlines',
            'color' => '#0368b3',
            'header' => 5,
            'icon' => 5,
        ),
    );

    if (isset($configs[$airline_code])) {
        $configs[$airline_code]['input_code'] = $airline_code;
        $configs[$airline_code]['fallback'] = FALSE;
        return $configs[$airline_code];
    }

    return array(
        'input_code' => $airline_code,
        'display_code' => $airline_code,
        'name' => $airline_code !== '' ? $airline_code : 'Hãng hàng không',
        'color' => '#1d5f4d',
        'header' => 0,
        'icon' => 0,
        'fallback' => TRUE,
    );
}

function cassiopeia_agency_ticket_pdf_qr_payload($airline_code, $pnr_code, array $passengers) {
    $config = cassiopeia_agency_ticket_pdf_airline_config($airline_code);
    $names = array();

    foreach ($passengers as $passenger) {
        $last_name = cassiopeia_agency_ticket_pdf_normalize_text(
            cassiopeia_agency_ticket_pdf_value($passenger, array('LastName', 'last_name'))
        );
        $first_name = cassiopeia_agency_ticket_pdf_normalize_text(
            cassiopeia_agency_ticket_pdf_value($passenger, array('FirstName', 'first_name'))
        );
        $name = trim($last_name . ' ' . $first_name);
        if ($name !== '') {
            $names[] = $name;
        }
    }

    return $config['display_code'] . ' | ' . trim((string) $pnr_code) . ' | ' . implode(', ', $names);
}

function cassiopeia_agency_ticket_pdf_passenger_display_name($passenger) {
    $first_name = cassiopeia_agency_ticket_pdf_value($passenger, array('FirstName', 'first_name'));
    $last_name = cassiopeia_agency_ticket_pdf_value($passenger, array('LastName', 'last_name'));

    if ($first_name !== '' && $last_name !== '') {
        return $first_name . ', ' . $last_name;
    }

    return $first_name !== '' ? $first_name : $last_name;
}

function cassiopeia_agency_ticket_pdf_build_context($booking, $airline_code, $agent) {
    $tickets = !empty($booking->tickets) && is_array($booking->tickets) ? $booking->tickets : array();
    $passengers = !empty($booking->passengers) && is_array($booking->passengers) ? $booking->passengers : array();
    $airline_code = strtoupper(trim((string) $airline_code));

    if ($airline_code === '' && !empty($tickets[0]->AirlineCode)) {
        $airline_code = strtoupper(trim($tickets[0]->AirlineCode));
    }

    $config = cassiopeia_agency_ticket_pdf_airline_config($airline_code);
    $context = array(
        'pnr_code' => !empty($booking->pnr_code) ? $booking->pnr_code : '',
        'status' => cassiopeia_agency_ticket_pdf_status_label($booking),
        'airline' => $config,
        'qr_payload' => cassiopeia_agency_ticket_pdf_qr_payload($airline_code, !empty($booking->pnr_code) ? $booking->pnr_code : '', $passengers),
        'passengers' => array(),
        'flights' => array(),
        'agency' => array(
            'name' => cassiopeia_agency_ticket_pdf_user_field($agent, 'field_account_transaction_name'),
            'address' => cassiopeia_agency_ticket_pdf_user_field($agent, 'field_address'),
            'phone' => !empty($agent->name) ? $agent->name : '',
            'email' => !empty($agent->mail) ? $agent->mail : '',
        ),
    );

    foreach ($passengers as $passenger) {
        $name = cassiopeia_agency_ticket_pdf_passenger_display_name($passenger);
        $ticket_number = cassiopeia_agency_ticket_pdf_value($passenger, array('TicketNumber', 'ticket_number', 'TKT', 'ticket'));
        $seat = cassiopeia_agency_ticket_pdf_value($passenger, array('Seat', 'seat', 'SeatNumber', 'seat_number'));
        $baggage = cassiopeia_agency_ticket_pdf_baggage($passenger, $tickets);

        if ($name !== '' || $ticket_number !== '' || $seat !== '' || $baggage !== '') {
            $context['passengers'][] = array(
                'name' => $name,
                'ticket_number' => $ticket_number,
                'seat' => $seat,
                'baggage' => $baggage,
            );
        }
    }

    foreach ($tickets as $ticket) {
        $ticket_airline_code = !empty($ticket->AirlineCode) ? strtoupper(trim($ticket->AirlineCode)) : $airline_code;
        $ticket_airline = cassiopeia_agency_ticket_pdf_airline_config($ticket_airline_code);
        $start = cassiopeia_agency_ticket_pdf_airport($ticket, 'StartPoint');
        $end = cassiopeia_agency_ticket_pdf_airport($ticket, 'EndPoint');
        $start_timestamp = cassiopeia_agency_ticket_pdf_timestamp(!empty($ticket->StartDate) ? $ticket->StartDate : '');
        $end_timestamp = cassiopeia_agency_ticket_pdf_timestamp(!empty($ticket->EndDate) ? $ticket->EndDate : '');

        $context['flights'][] = array(
            'airline_name' => $ticket_airline['name'],
            'airline_code' => $ticket_airline['display_code'],
            'color' => $ticket_airline['color'],
            'flight_number' => !empty($ticket->FlightNumber) ? $ticket->FlightNumber : '',
            'class' => !empty($ticket->Class) ? $ticket->Class : '',
            'start_city' => $start['city'],
            'start_code' => $start['code'],
            'start_date' => $start_timestamp ? date('d/m/Y', $start_timestamp) : '',
            'start_time' => $start_timestamp ? date('H:i', $start_timestamp) : '',
            'end_city' => $end['city'],
            'end_code' => $end['code'],
            'end_date' => $end_timestamp ? date('d/m/Y', $end_timestamp) : '',
            'end_time' => $end_timestamp ? date('H:i', $end_timestamp) : '',
            'duration' => cassiopeia_agency_ticket_pdf_duration($start_timestamp, $end_timestamp),
        );
    }

    return $context;
}

function cassiopeia_agency_ticket_pdf_attachment($booking, $airline_code, $agent) {
    if (empty($booking)) {
        throw new Exception('Booking data is unavailable.');
    }

    cassiopeia_agency_ticket_pdf_load_dependencies();
    // mPDF 6.1 may switch the runtime timezone to Europe/London when date.timezone is empty.
    ini_set('date.timezone', 'Asia/Ho_Chi_Minh');
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $context = cassiopeia_agency_ticket_pdf_build_context($booking, $airline_code, $agent);
    $context['logo_data_uri'] = cassiopeia_agency_ticket_pdf_asset_data_uri(
        DRUPAL_ROOT . '/sites/all/themes/cassiopeia_theme/img/ticket-view-logo.png'
    );
    $context['banner_data_uri'] = '';
    $context['icon_data_uri'] = '';

    if (empty($context['airline']['fallback'])) {
        $context['banner_data_uri'] = cassiopeia_agency_ticket_pdf_asset_data_uri(
            drupal_get_path('module', 'cassiopeia') . '/templates/mail/agency-ticket-pdf/assets/banner/header-' .
            sprintf('%02d', $context['airline']['header']) . '.jpg'
        );
        $context['icon_data_uri'] = cassiopeia_agency_ticket_pdf_asset_data_uri(
            drupal_get_path('module', 'cassiopeia') . '/templates/mail/agency-ticket-pdf/assets/icon/airline-' .
            sprintf('%02d', $context['airline']['icon']) . '.png'
        );
    }

    $context['qr_data_uri'] = cassiopeia_agency_ticket_pdf_qr_data_uri($context['qr_payload']);
    $html = theme_render_template(
        drupal_get_path('module', 'cassiopeia') . '/templates/mail/agency-ticket-pdf.tpl.php',
        array('context' => $context)
    );

    $temp_dir = cassiopeia_agency_ticket_pdf_temp_dir();
    if (!defined('_MPDF_TEMP_PATH')) {
        define('_MPDF_TEMP_PATH', rtrim($temp_dir, '/') . '/');
    }
    $mpdf = new mPDF('utf-8', 'A4', 0, 'dejavusans', 15, 15, 16, 16, 9, 9, 'P');
    $mpdf->SetTitle('Ve dai ly ' . $context['pnr_code']);
    if ((int) ini_get('pcre.backtrack_limit') < 10000000) {
        ini_set('pcre.backtrack_limit', '10000000');
    }
    $mpdf->WriteHTML($html);
    $pdf_bytes = $mpdf->Output('', 'S');

    if (empty($pdf_bytes)) {
        throw new Exception('PDF renderer returned empty output.');
    }

    return array(
        'filecontent' => $pdf_bytes,
        'filename' => 've-' . cassiopeia_agency_ticket_pdf_safe_filename($context['pnr_code']) . '.pdf',
        'filemime' => 'application/pdf',
    );
}

function cassiopeia_agency_ticket_pdf_load_dependencies() {
    static $loaded = FALSE;
    if ($loaded) {
        return;
    }

    $temp_dir = cassiopeia_agency_ticket_pdf_temp_dir();
    if (!defined('_MPDF_TEMP_PATH')) {
        define('_MPDF_TEMP_PATH', rtrim($temp_dir, '/') . '/');
    }

    $autoloaders = array(
        '/opt/qtair-pdf/vendor/autoload.php',
        DRUPAL_ROOT . '/sites/all/libraries/qtair-pdf/vendor/autoload.php',
    );
    foreach ($autoloaders as $autoloader) {
        if (is_readable($autoloader)) {
            require_once $autoloader;
            break;
        }
    }

    if (!class_exists('mPDF') || !class_exists('BaconQrCode\\Writer')) {
        throw new Exception('PDF runtime dependencies are unavailable.');
    }
    $loaded = TRUE;
}

function cassiopeia_agency_ticket_pdf_qr_data_uri($payload) {
    $renderer = new \BaconQrCode\Renderer\Image\Png();
    $renderer->setWidth(400);
    $renderer->setHeight(400);
    $writer = new \BaconQrCode\Writer($renderer);
    $png = $writer->writeString($payload);
    return 'data:image/png;base64,' . base64_encode($png);
}

function cassiopeia_agency_ticket_pdf_temp_dir() {
    if (is_dir('/opt/qtair-pdf/tmp') && is_writable('/opt/qtair-pdf/tmp')) {
        return '/opt/qtair-pdf/tmp';
    }
    return function_exists('file_directory_temp') ? file_directory_temp() : sys_get_temp_dir();
}

function cassiopeia_agency_ticket_pdf_asset_data_uri($path) {
    if (strpos($path, '/') !== 0) {
        $path = DRUPAL_ROOT . '/' . $path;
    }
    if (!is_readable($path)) {
        throw new Exception('PDF asset is unavailable.');
    }
    $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
    $mime = $extension === 'png' ? 'image/png' : ($extension === 'jpg' || $extension === 'jpeg' ? 'image/jpeg' : 'application/octet-stream');
    return 'data:' . $mime . ';base64,' . base64_encode(file_get_contents($path));
}

function cassiopeia_agency_ticket_pdf_normalize_text($text) {
    $text = trim((string) $text);
    if ($text === '') {
        return '';
    }
    if (function_exists('transliteration_get')) {
        $text = transliteration_get($text, '', NULL);
    }
    elseif (function_exists('iconv')) {
        $text = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $text);
    }
    $text = strtoupper($text);
    $text = preg_replace('/[^A-Z0-9]+/', ' ', $text);
    return trim(preg_replace('/\s+/', ' ', $text));
}

function cassiopeia_agency_ticket_pdf_value($object, array $properties) {
    foreach ($properties as $property) {
        if (is_object($object) && isset($object->{$property}) && $object->{$property} !== '') {
            return trim((string) $object->{$property});
        }
        if (is_array($object) && isset($object[$property]) && $object[$property] !== '') {
            return trim((string) $object[$property]);
        }
    }
    return '';
}

function cassiopeia_agency_ticket_pdf_user_field($account, $field_name) {
    return !empty($account->{$field_name}['und'][0]['value']) ? $account->{$field_name}['und'][0]['value'] : '';
}

function cassiopeia_agency_ticket_pdf_status_label($booking) {
    $status = !empty($booking->status) ? strtoupper(trim($booking->status)) : '';
    if ($status === 'TICKETED') {
        return 'ĐÃ THANH TOÁN';
    }
    return 'CHƯA THANH TOÁN';
}

function cassiopeia_agency_ticket_pdf_airport($ticket, $property) {
    $code = !empty($ticket->{$property}) ? $ticket->{$property} : '';
    $airport = NULL;
    if ($code !== '' && function_exists('cassiopeia_get_airport')) {
        try {
            $airport = cassiopeia_get_airport($code);
        }
        catch (Exception $e) {
            $airport = NULL;
        }
    }
    return array(
        'city' => !empty($airport->city) ? $airport->city : $code,
        'code' => !empty($airport->code) ? $airport->code : $code,
    );
}

function cassiopeia_agency_ticket_pdf_timestamp($value) {
    if ($value === '' || $value === NULL) {
        return 0;
    }
    return is_numeric($value) ? (int) $value : (int) strtotime($value);
}

function cassiopeia_agency_ticket_pdf_duration($start, $end) {
    if (!$start || !$end || $end < $start) {
        return '';
    }
    $minutes = (int) round(($end - $start) / 60);
    return floor($minutes / 60) . ' giờ ' . ($minutes % 60) . ' phút';
}

function cassiopeia_agency_ticket_pdf_baggage($passenger, array $tickets) {
    $departure = cassiopeia_agency_ticket_pdf_value($passenger, array('BaggageDeparture', 'baggage_departure'));
    $return = cassiopeia_agency_ticket_pdf_value($passenger, array('BaggageReturn', 'baggage_return'));
    $values = array();
    if (cassiopeia_agency_ticket_pdf_baggage_value_present($departure)) {
        $values[] = cassiopeia_agency_ticket_pdf_baggage_label($departure, !empty($tickets[0]->AirlineCode) ? $tickets[0]->AirlineCode : '');
    }
    elseif (!empty($tickets[0])) {
        $default = cassiopeia_agency_ticket_pdf_default_baggage($tickets[0]);
        if ($default !== '') {
            $values[] = $default;
        }
    }

    if (cassiopeia_agency_ticket_pdf_baggage_value_present($return)) {
        $return_index = count($tickets) > 1 ? 1 : 0;
        $values[] = cassiopeia_agency_ticket_pdf_baggage_label($return, !empty($tickets[$return_index]->AirlineCode) ? $tickets[$return_index]->AirlineCode : '');
    }
    elseif (count($tickets) > 1 && !empty($tickets[1])) {
        $default = cassiopeia_agency_ticket_pdf_default_baggage($tickets[1]);
        if ($default !== '') {
            $values[] = $default;
        }
    }

    return implode(' - ', array_filter($values));
}

function cassiopeia_agency_ticket_pdf_baggage_value_present($value) {
    $value = strtoupper(trim((string) $value));
    return $value !== '' && $value !== '0' && $value !== '0KG';
}

function cassiopeia_agency_ticket_pdf_default_baggage($ticket) {
    $airline_code = strtoupper(trim(cassiopeia_agency_ticket_pdf_value($ticket, array('AirlineCode', 'airline_code'))));
    $fare = cassiopeia_agency_ticket_pdf_normalize_text(
        cassiopeia_agency_ticket_pdf_value($ticket, array('Class', 'class', 'FareOption', 'FareOptionCode', 'FareBasis', 'Cabin'))
    );
    $fare = str_replace(' ', '', $fare);

    switch ($airline_code) {
        case 'VN':
            if (in_array($fare, array('I', 'D', 'C', 'J'), TRUE) || strpos($fare, 'BUSINESS') !== FALSE) {
                return '18Kg xách tay + 32Kg ký gửi';
            }
            if (in_array($fare, array('E', 'T', 'R', 'N', 'Q', 'L', 'K', 'H', 'S', 'M', 'B'), TRUE) || strpos($fare, 'ECONOMY') !== FALSE) {
                return '12Kg xách tay + 23Kg ký gửi';
            }
            break;

        case 'VJ':
            if (in_array($fare, array('ECO', 'ECONOMY'), TRUE)) {
                return '7Kg xách tay';
            }
            if ($fare === 'DELUXE') {
                return '7Kg xách tay + 20Kg ký gửi';
            }
            if (in_array($fare, array('SKYBOSS', 'BUSINESS'), TRUE)) {
                return '10Kg xách tay + 30Kg ký gửi';
            }
            break;

        case 'QH':
            if (in_array($fare, array('ECONOMYSAVERMAX', 'ECONOMYSMART'), TRUE)) {
                return '7Kg xách tay';
            }
            if ($fare === 'ECONOMYSMARTFLEX') {
                return '7Kg xách tay + 20Kg ký gửi';
            }
            if (in_array($fare, array('BUSINESSSMART', 'BUSINESSSFLEX'), TRUE)) {
                return '7Kg xách tay + 40Kg ký gửi';
            }
            break;

        case 'VU':
            return '7Kg xách tay';
    }

    return 'Theo điều kiện vé';
}

function cassiopeia_agency_ticket_pdf_baggage_label($value, $airline_code) {
    if (function_exists('cassiopeia_get_baggage_by_weight_and_airline')) {
        try {
            $baggage = cassiopeia_get_baggage_by_weight_and_airline($value, $airline_code);
            if (!empty($baggage->weight)) {
                return $baggage->weight . 'Kg';
            }
        }
        catch (Exception $e) {
        }
    }
    return (string) $value;
}

function cassiopeia_agency_ticket_pdf_safe_filename($value) {
    $value = cassiopeia_agency_ticket_pdf_normalize_text($value);
    $value = preg_replace('/[^A-Z0-9_-]+/', '-', $value);
    return trim($value, '-_') !== '' ? trim($value, '-_') : 'ticket';
}
