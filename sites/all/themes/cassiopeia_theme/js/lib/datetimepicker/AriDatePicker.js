
var AriDatePicker = {
    setup: function (DepartureDate, ReturnDate){
        DepartureDate.datepicker({
            changeMonth: true,
            eventName: 'mouseenter',
            beforeShow: function (input, inst) {
                setTimeout(function () {
                    AriDatePicker.AddCalenderbarStart(DepartureDate, ReturnDate)
                }, 10);
            },
            onChangeMonthYear: function (year, month, inst) {
                setTimeout(function () {
                    AriDatePicker.AddCalenderbarStart(DepartureDate, ReturnDate)
                }, 1);
            },
            dateFormat: 'dd/mm/yy',
            minDate: new Date(),
            ParseFormats: 'dd/mm/yy',
            onSelect: function (dateText, inst) {
                ReturnDate.datepicker("change",{minDate:dateText});
            },
            onClose: function (dateText, inst) {
                ReturnDate.datepicker("change",{minDate:dateText});
                if (!ReturnDate.parents('.search-fly-form-return-date').hasClass('disable')) {
                    ReturnDate.datepicker('show');
                }
            },

        }),
        ReturnDate.datepicker({
            changeMonth: true,
            beforeShow: function (input, inst) {
                setTimeout(function () {
                    AriDatePicker.AddCalenderbarEnd(DepartureDate, ReturnDate)
                }, 10);

            },
            onChangeMonthYear: function (year, month, inst) {
                setTimeout(function () {
                    AriDatePicker.AddCalenderbarEnd(DepartureDate, ReturnDate)
                }, 1);
            },
            dateFormat: 'dd/mm/yy',
            minDate: DepartureDate.val(),
            ParseFormats: 'dd/mm/yy',
            numberOfMonths: [1, 2],
            onSelect: function (dateText, inst) {
            },
            onClose: function (dateText, inst) {
            },
        })
    },
    CalenderbarStartTpl:
        '<div class="calendar-bar-left">\n' +
        '    <div class="calendar-bar--top">{{month}}</div>\n' +
        '    <div class="calendar-bar--mid">\n' +
        '        <div>\n' +
        '            <p class="p1">{{day_in_week}}</p>\n' +
        '        </div>\n' +
        '        <div>\n' +
        '            <p class="p2">{{day_in_month}}</p>\n' +
        '        </div>\n' +
        '        <div>\n' +
        '            <p class="p3">{{lunar_date_day_month}}</p>\n' +
        '            <p class="p4">{{lunar_date_year}}</p>\n' +
        '        </div>\n' +
        '    </div>\n' +
        '    <div class="calendar-bar--bottom">{{year}}</div>\n' +
        '</div>',
    CalenderbarEndTpl:
        '<div class="calendar-bar-right">\n' +
        '    <div class="calendar-bar--top">{{month}}</div>\n' +
        '    <div class="calendar-bar--mid">\n' +
        '        <div>\n' +
        '            <p class="p1">{{day_in_week}}</p>\n' +
        '        </div>\n' +
        '        <div>\n' +
        '            <p class="p2">{{day_in_month}}</p>\n' +
        '        </div>\n' +
        '        <div>\n' +
        '            <p class="p3">{{lunar_date_day_month}}</p>\n' +
        '            <p class="p4">{{lunar_date_year}}</p>\n' +
        '        </div>\n' +
        '    </div>\n' +
        '    <div class="calendar-bar--bottom">{{year}}</div>\n' +
        '</div>',
    FormatDate: function (date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;

        return [year, month, day].join('/');
    },

    AddCalenderbarStart: function (DepartureDate, ReturnDate) {
        jQuery('#ui-datepicker-div > div, #ui-datepicker-div table').wrapAll('<div class="wrap-datepicker-content"/>');
        jQuery('#ui-datepicker-div > .wrap-datepicker-content> div, #ui-datepicker-div >.wrap-datepicker-content >table').wrapAll('<div class="wrap-calender"/>');

        var CalenderbarStartTpl = AriDatePicker.CalenderbarStartTpl;

        var curent_date_string_to_array = (DepartureDate.val()) ? DepartureDate.val().split('/') : null;
        var curent_date = (DepartureDate.val()) ? new Date(curent_date_string_to_array[2], curent_date_string_to_array[1] - 1, curent_date_string_to_array[0]) : new Date();

        var CalenderbarStartData = {
            month: (Drupal && Drupal.settings.language.language == 'vi') ? AriDatePicker.VietNamMonth[curent_date.getMonth()] : AriDatePicker.EnglishMonth[curent_date.getMonth()],
            day_in_week: (Drupal && Drupal.settings.language.language == 'vi') ? AriDatePicker.VietNamDayInWeek[curent_date.getDay()] : AriDatePicker.EnglishDayInWeek[curent_date.getDay()],
            day_in_month: curent_date.getDate(),
            lunar_date_day_month: getLunarDate(curent_date.getDate(), curent_date.getMonth() + 1, curent_date.getFullYear()).day + ' - ' + getLunarDate(curent_date.getDate(), curent_date.getMonth() + 1, curent_date.getFullYear()).month,
            lunar_date_year: (Drupal && Drupal.settings.language.language == 'vi') ? (AriDatePicker.year_canchi['c' + (curent_date.getFullYear() - 3) % 60]) : '',
            year: curent_date.getFullYear(),
        }
        jQuery.each(CalenderbarStartData, function (key, value) {
            CalenderbarStartTpl = CalenderbarStartTpl.replace('{{' + key + '}}', value);
        });
        jQuery('#ui-datepicker-div .wrap-datepicker-content').append(CalenderbarStartTpl);
    },

    AddCalenderbarEnd: function (DepartureDate, ReturnDate) {
        jQuery('#ui-datepicker-div > .ui-datepicker-group.ui-datepicker-group-first , #ui-datepicker-div > .ui-datepicker-group.ui-datepicker-group-last').wrapAll('<div class="wrap-datepicker-content"/>');
        jQuery('#ui-datepicker-div > .wrap-datepicker-content> .ui-datepicker-group.ui-datepicker-group-first, #ui-datepicker-div >.wrap-datepicker-content > .ui-datepicker-group.ui-datepicker-group-last').wrapAll('<div class="wrap-calender wrap-calender-multi"/>');

        var CalenderbarStartTpl = AriDatePicker.CalenderbarStartTpl;
        var CalenderbarStart_date_string_to_array = (DepartureDate.val()) ? DepartureDate.val().split('/') : null;
        var CalenderbarStart_date = (DepartureDate.val()) ? new Date(CalenderbarStart_date_string_to_array[2], CalenderbarStart_date_string_to_array[1] - 1, CalenderbarStart_date_string_to_array[0]) : new Date();
        var CalenderbarStartData = {
            month: (Drupal && Drupal.settings.language.language == 'vi') ? AriDatePicker.VietNamMonth[CalenderbarStart_date.getMonth()] : AriDatePicker.EnglishMonth[CalenderbarStart_date.getMonth()],
            day_in_week: (Drupal && Drupal.settings.language.language == 'vi') ? AriDatePicker.VietNamDayInWeek[CalenderbarStart_date.getDay()] : AriDatePicker.EnglishDayInWeek[CalenderbarStart_date.getDay()],
            day_in_month: CalenderbarStart_date.getDate(),
            lunar_date_day_month: getLunarDate(CalenderbarStart_date.getDate(), CalenderbarStart_date.getMonth() + 1, CalenderbarStart_date.getFullYear()).day + ' - ' + getLunarDate(CalenderbarStart_date.getDate(), CalenderbarStart_date.getMonth() + 1, CalenderbarStart_date.getFullYear()).month,
            lunar_date_year: (Drupal && Drupal.settings.language.language == 'vi') ? (AriDatePicker.year_canchi['c' + (CalenderbarStart_date.getFullYear() - 3) % 60]) : '',
            year: CalenderbarStart_date.getFullYear(),
        }
        jQuery.each(CalenderbarStartData, function (key, value) {
            CalenderbarStartTpl = CalenderbarStartTpl.replace('{{' + key + '}}', value);
        });


        var CalenderbarEndTpl = AriDatePicker.CalenderbarEndTpl;
        var CalenderbarEnd_date_string_to_array = (ReturnDate.val()) ? ReturnDate.val().split('/') : null;
        var CalenderbarEnd_date = (ReturnDate.val()) ? new Date(CalenderbarStart_date_string_to_array[2], CalenderbarStart_date_string_to_array[1] - 1, CalenderbarStart_date_string_to_array[0]) : new Date();
        var CalenderbarEndData = {
            month: (Drupal && Drupal.settings.language.language == 'vi') ? AriDatePicker.VietNamMonth[CalenderbarEnd_date.getMonth()] : AriDatePicker.EnglishMonth[CalenderbarEnd_date.getMonth()],
            day_in_week: (Drupal && Drupal.settings.language.language == 'vi') ? AriDatePicker.VietNamDayInWeek[CalenderbarEnd_date.getDay()] : AriDatePicker.EnglishDayInWeek[CalenderbarEnd_date.getDay()],
            day_in_month: CalenderbarEnd_date.getDate(),
            lunar_date_day_month: getLunarDate(CalenderbarEnd_date.getDate(), CalenderbarEnd_date.getMonth() + 1, CalenderbarEnd_date.getFullYear()).day + ' - ' + getLunarDate(CalenderbarEnd_date.getDate(), CalenderbarEnd_date.getMonth() + 1, CalenderbarEnd_date.getFullYear()).month,
            lunar_date_year: (Drupal && Drupal.settings.language.language == 'vi') ? (AriDatePicker.year_canchi['c' + (CalenderbarEnd_date.getFullYear() - 3) % 60]) : '',
            year: CalenderbarEnd_date.getFullYear(),
        }
        jQuery.each(CalenderbarEndData, function (key, value) {
            CalenderbarEndTpl = CalenderbarEndTpl.replace('{{' + key + '}}', value);
        })

        jQuery('#ui-datepicker-div .wrap-datepicker-content').append(CalenderbarStartTpl);
        jQuery('#ui-datepicker-div .wrap-datepicker-content').append(CalenderbarEndTpl);
    },

    mouseenterDatepickerSingle: function (e) {
        var target = $(this).children('a'); // cache lookup
        var options = target.parents('.datepicker').data('datepicker');
        console.log(target);
        console.log(options);
    },
    mouseenterDatepickerMulti: function (e) {

    },

    year_chi: [
        'Tý',
        'Sửu',
        'Dần',
        'Mạo',
        'Thìn',
        'Tỵ',
        'Ngọ',
        'Mùi',
        'Thân',
        'Dậu',
        'Tuất',
        'Hợi',
    ],
    year_can: [
        'Canh',
        'Tân',
        'Nhâm',
        'Quý',
        'Giáp',
        'Ất',
        'Bính',
        'Đinh',
        'Mậu',
        'Kỷ'
    ],
    year_canchi: {
        'c1': 'Giáp Tý',
        'c2': 'Ất Sửu',
        'c3': 'Bính Dần',
        'c4': 'Đinh Mão',
        'c5': 'Mậu thìn',
        'c6': 'Kỷ Tỵ',
        'c7': 'Canh Ngọ',
        'c8': 'Tân Mùi',
        'c9': 'Nhâm Thân',
        'c10': 'Quý dậu',
        'c11': 'Giáp Tuất',
        'c12': 'Ất Hợi',
        'c13': 'Bính Tý',
        'c14': 'Đinh Sửu',
        'c15': 'Mậu Dần',
        'c16': 'Kỷ Mão',
        'c17': 'Canh Thìn',
        'c18': 'Tân Tỵ',
        'c19': 'Nhâm Ngọ',
        'c20': 'Quý Mùi',
        'c21': 'Giáp Thân',
        'c22': 'Ất Dậu',
        'c23': 'Bính Tuất',
        'c24': 'Đinh Hợi',
        'c25': 'Mậu Tý',
        'c26': 'Kỷ Sửu',
        'c27': 'Canh Dần',
        'c28': 'Tân Mão',
        'c29': 'Nhâm Thìn',
        'c30': 'Quý Tỵ',
        'c31': 'Giáp Ngọ',
        'c32': 'Ất Mùi',
        'c33': 'Bính Thân',
        'c34': 'Đinh Dậu',
        'c35': 'Mậu Tuất',
        'c36': 'Kỷ Hợi',
        'c37': 'Canh Tý',
        'c38': 'Tân Sửu',
        'c39': 'Nhâm Dần',
        'c40': 'Quý Mão',
        'c41': 'Giáp Thìn',
        'c42': 'Ất Tỵ',
        'c43': 'Bính Ngọ',
        'c44': 'Đinh Mùi',
        'c45': 'Mậu Thân',
        'c46': 'Kỷ Dậu',
        'c47': 'Canh Tuất',
        'c48': 'Tân Hợi',
        'c49': 'Nhâm Tý',
        'c50': 'Quý Sửu',
        'c51': 'Giáp Dần',
        'c52': 'Ất Mão',
        'c53': 'Bính Thìn',
        'c54': 'Đinh Tỵ',
        'c55': 'Mậu Ngọ',
        'c56': 'Kỷ Mùi',
        'c57': 'Canh Thân',
        'c58': 'Tân Dậu',
        'c59': 'Nhâm Tuất',
        'c60': 'Quý Hợi',
    },
    EnglishDayInWeek: [
        'Sunday',
        'Monday',
        'Tuesday ',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
    ],
    EnglishMonth: [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December',
    ],
    VietNamDayInWeek: [
        'Chủ nhật',
        'Thứ 2',
        'Thứ 3',
        'Thứ 4',
        'Thứ 5',
        'Thứ 6',
        'Thứ 7',
    ],
    VietNamMonth: [
        'Tháng 1',
        'Tháng 2',
        'Tháng 3',
        'Tháng 4',
        'Tháng 5',
        'Tháng 6',
        'Tháng 7',
        'Tháng 8',
        'Tháng 9',
        'Tháng 10',
        'Tháng 11',
        'Tháng 12',
    ]
};

(function ($) {
    $(document).ready(function () {

        $(document).on('mouseenter', '.ui-datepicker-calendar td', function (e) {
            var _this = $(this);

            if (!_this.hasClass('ui-state-disabled')) {
                var parent_all = _this.parents('#ui-datepicker-div');

                var data_day = _this.find('.ui-state-default').text();
                var data_month = _this.attr('data-month');
                var data_year = _this.attr('data-year');

                var date_select = new Date(data_year, data_month, data_day);

                var update_state = 0;

                if (parent_all.find('.calendar-bar-right').length > 0) {
                    update_state = 1;
                }

                $data_update = {
                    'calendar-bar--top': (Drupal && Drupal.settings.language.language == 'vi') ? AriDatePicker.VietNamMonth[date_select.getMonth()] : AriDatePicker.EnglishMonth[date_select.getMonth()],
                    'p1': (Drupal && Drupal.settings.language.language == 'vi') ? AriDatePicker.VietNamDayInWeek[date_select.getDay()] : AriDatePicker.EnglishDayInWeek[date_select.getDay()],
                    'p2': date_select.getDate(),
                    'p3': getLunarDate(date_select.getDate(), date_select.getMonth() + 1, date_select.getFullYear()).day + ' - ' + getLunarDate(date_select.getDate(), date_select.getMonth() + 1, date_select.getFullYear()).month,
                    'p4': (Drupal && Drupal.settings.language.language == 'vi') ? (AriDatePicker.year_canchi['c' + (date_select.getFullYear() - 3) % 60]) : '',
                    'calendar-bar--bottom': data_year,
                }

                if (update_state == 0) {
                    $data_element_update = {
                        'calendar-bar--top': '.calendar-bar-left .calendar-bar--top',
                        'p1': '.calendar-bar-left .p1',
                        'p2': '.calendar-bar-left .p2',
                        'p3': '.calendar-bar-left .p3',
                        'p4': '.calendar-bar-left .p4',
                        'calendar-bar--bottom': '.calendar-bar-left .calendar-bar--bottom',
                    }
                } else {
                    $data_element_update = {
                        'calendar-bar--top': '.calendar-bar-right .calendar-bar--top',
                        'p1': '.calendar-bar-right .p1',
                        'p2': '.calendar-bar-right .p2',
                        'p3': '.calendar-bar-right .p3',
                        'p4': '.calendar-bar-right .p4',
                        'calendar-bar--bottom': '.calendar-bar-right .calendar-bar--bottom',
                    }
                }

                $.each($data_element_update, function (key, value) {
                    $(value).html($data_update[key]);
                });
            }
        })

    });
})(jQuery);