
// console.log(Drupal.settings);
(function ($) {
    $(document).ready(function () {
        $(".open-destination").click(function(e){
            var _id = e.target.id;
            $("#input_id").val(_id);
            $("#modal_destination").css("display","flex");
            $("#modal_destination").css("align-items","center");
            $("#modal_destination").modal("show");
        });
        $(".sub-search ul li a").click(function(e){
            var _code = $(this).attr("airportcode");
            var _id = $("#input_id").val();
            console.log(_id);
            $("#"+_id).attr('data-value',_code);
            $("#"+_id).text($(this).text());
            $("#modal_destination").modal("hide");
        });
        jQuery('.date-time-picker').datetimepicker({
            format:'d/m/Y H:i',
            step:1,
        });
        $("#modal_airline .list-of-airine ul li").click(function(e){
            var _code = $(this).attr("data-iata");
            var _name = $(this).text();
            var _id = $("#input_id").val();
            $("#"+_id).attr('data-value',_code);
            $("#"+_id).text(_name+" - ("+_code+")");
            $("#modal_airline").modal("hide");
        });
        $(".span-airline").click(function(e){
            $("#modal_airline input").val("");
            $("#modal_airline .list-of-airine ul li").addClass("name-active");
            var _id = e.target.id;
            $("#input_id").val(_id);
            $("#modal_airline").modal("show");
            $("#modal_airline").css("display","flex");
            $("#modal_airline").css("align-items","center");
        });
        $("#modal_airline input").keyup(function(e){
            var _value = $(this).val();
            $("#modal_airline .list-of-airine ul li").removeClass("iata-active");
            $("#modal_airline .list-of-airine ul li").removeClass("name-active");
            $("#modal_airline .list-of-airine ul li").each(function(e){
                var _this = $(this);
                var _data_iata = $(this).attr("data-iata");
                var _data_name = $(this).text();
                if(_data_iata.toLowerCase().indexOf(_value.toLowerCase()) != -1){
                    _this.addClass("iata-active");
                }
                if(_data_name.toLowerCase().indexOf(_value.toLowerCase()) != -1){
                    _this.addClass("name-active");
                }
            });
        });
        $(".customer-block select").change(function(e){
            var _adt = $(".customer-block select[name='ADT']").val();
            var _chd = $(".customer-block select[name='CHD']").val();
            var _inf = $(".customer-block select[name='INF']").val();
            var _data_adt = [];
            var _data_chd = [];
            var _data_inf = [];
            var _data = {};
            $(".customer-adt").each(function(e){
                var _this = $(this);
                var _temp = {};
                _temp['gender'] = _this.find(".info-gender select").val();
                _temp['first_name'] = _this.find(".info-first-name input").val();
                _temp['last_name'] = _this.find(".info-last-name input").val();
                _data_adt.push(_temp);
            });
            $(".customer-chd").each(function(e){
                var _this = $(this);
                var _temp = {};
                _temp['gender'] = _this.find(".info-gender select").val();
                _temp['first_name'] = _this.find(".info-first-name input").val();
                _temp['last_name'] = _this.find(".info-last-name input").val();
                _data_chd.push(_temp);
            });
            $(".customer-inf").each(function(e){
                var _this = $(this);
                var _temp = {};
                _temp['gender'] = _this.find(".info-gender select").val();
                _temp['first_name'] = _this.find(".info-first-name input").val();
                _temp['last_name'] = _this.find(".info-last-name input").val();
                _data_inf.push(_temp);
            });
            _data['adt'] = _data_adt;
            _data['chd'] = _data_chd;
            _data['inf'] = _data_inf;
            $.ajax({
                method:"POST",
                url:"/cassiopeia/ajax",
                data:{
                    cmd :"admin-booking-create-customer",
                    adt : _adt,
                    chd : _chd,
                    inf : _inf,
                    data : JSON.stringify(_data),
                },success:function(result){
                    $(".customer-block .customer-info").html(result.html);
                }
            });
        });
    });
})(jQuery);

var sub_search_suggest_timer = 0;

function delay(callback, ms) {
    var timer = 0;
    return function () {
        var context = this, args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function () {
            callback.apply(context, args);
        }, ms || 0);
    };
}

function fake_departure_click (element) {
    var parent =  jQuery(element).parents('div.itinerary');
    jQuery('#sub-departure-'+parent.attr('itinerary')).show();

}

function fake_destination_click (element) {
    var parent =  jQuery(element).parents('div.itinerary');
    jQuery('#sub-destination-'+parent.attr('itinerary')).show();
};


function sub_search_mouseup (element) {
    return false;
}

function sub_destination_domestic_click(element) {
    var parent =  jQuery(element).parents('div.itinerary');
    var text = jQuery('b', jQuery(element)).text();
    var code = jQuery(element).attr('airportcode');
    var TextCode = text + ' (' + code + ')';
    jQuery('#destination-'+parent.attr('itinerary')).val(code);
    jQuery('#sub-destination-'+parent.attr('itinerary')).fadeOut();
    jQuery('#fake-destination-' +parent.attr('itinerary')+ ' >  div').html(TextCode)
}

function sub_departure_domestic_click(element) {
    var parent =  jQuery(element).parents('div.itinerary');
    var text = jQuery('b', jQuery(element)).text();
    var code = jQuery(element).attr('airportcode');
    var TextCode = text + ' (' + code + ')';
    jQuery('#departure-'+parent.attr('itinerary')).val(code);
    jQuery('#sub-departure-'+parent.attr('itinerary')).fadeOut();
    jQuery('#fake-departure-' +parent.attr('itinerary')+ ' >  div').html(TextCode)
    jQuery(".search-fly-form-destination .input-fn>.fake-input-text").click();
}


function search_departure_keyup (element,event) {
    var element = jQuery(element);
    var parent = element.parents('div.itinerary');
    var timer = 0;
    clearTimeout(sub_search_suggest_timer);
    sub_search_suggest_timer = setTimeout(function () {
        var key = null;
        if (event.which != null) {
            key = event.which;
        } else {
            key = event.keyCode;
        }
        if (element.val().trim() != '' && key != 40 && key != 39 && key != 38 && key != 37 && element.val().length > 1) {
            var search = element.val();
            callAjaxSearchAirport(search, '.itinerary[itinerary="'+parent.attr('itinerary')+'"] ul.result.departure');
        }
    }, 500);

}

function search_destination_keyup (element,event) {
    var element = jQuery(element);
    var parent = element.parents('div.itinerary');

    clearTimeout(sub_search_suggest_timer);
    sub_search_suggest_timer = setTimeout(function () {
        var key = null;
        if (event.which != null) {
            key = event.which;
        } else {
            key = event.keyCode;
        }
        if (element.val().trim() != '' && key != 40 && key != 39 && key != 38 && key != 37 && element.val().length > 1) {
            var search = element.val();
            callAjaxSearchAirport(search, '.itinerary[itinerary="'+parent.attr('itinerary')+'"] ul.result.destination');
        }
    }, 500);

}


function callAjaxSearchAirport(search, location) {
    jQuery.ajax({
        method: "POST",
        url: "/airports/autosuggestflight",
        data: {'key': search},
        beforeSend: function () {
            jQuery(location).html('');
            jQuery('.loading').show();
        },
        complete: function () {
            jQuery('.loading').hide();
        },
        success: function (data) {
            var html = "";

            if (location.includes('ul.result.destination')) {
                jQuery.each(data, function (i, item) {
                    if (item.city) {
                        html += "<li><a onclick=\"sub_destination_domestic_click(this)\" airportcode=\"" + item.code + "\"><b>" + item.name + "</b> <span>(" + item.code + ")</span> </a><p>" + item.city + ' - ' + item.country + "</p></li>";
                    } else {
                        html += "<li><a onclick=\"sub_destination_domestic_click(this)\" airportcode=\"" + item.code + "\"><b>" + item.name + "</b> <span>(" + item.code + ")</span> </a><p>" + item.country + "</p></li>";
                    }
                });
            } else  {
                jQuery.each(data, function (i, item) {
                    if (item.city) {
                        html += "<li><a onclick=\"sub_departure_domestic_click(this)\" airportcode=\"" + item.code + "\"><b>" + item.name + "</b> <span>(" + item.code + ")</span> </a><p>" + item.city + ' - ' + item.country + "</p></li>";
                    } else {
                        html += "<li><a onclick=\"sub_departure_domestic_click(this)\" airportcode=\"" + item.code + "\"><b>" + item.name + "</b> <span>(" + item.code + ")</span> </a><p>" + item.country + "</p></li>";
                    }
                });
            }

            jQuery(location).append(html);

        },
        error: function (data) {
            var li = '<li>Can not find!</li>';
            jQuery('.result').append(li);
        }
    });
}


(function ($) {
    $(document).ready(function () {
        var radioValue = $("#search-fly-form input[name='TripType']:checked").val();
        if (radioValue == 'OW') {
            $('#search-fly-form .search-fly-form-return-date').css('display', 'none');
            $('#search-fly-form .search-fly-form-add-more').css('display', 'none');
            $('#search-fly-form .search-fly-form-return-date input').val("");
            if (jQuery('#itinerarys > div.itinerary').length > 1) {
                jQuery('#itinerarys > div.itinerary').each(function (index, element) {
                    var element = jQuery(element);
                    if (parseInt(element.attr('itinerary')) > 0) {
                        element.remove();
                    }
                });
                $('#itinerarys .itinerary[itinerary="0"] .search-fly-form-add-more button').prop('disabled', false);
            }
        }
        $("#search-fly-form .search-fly-form-passenger select").change(function(){
            var _customer = parseInt($("#Adults").val()) + parseInt($("#Childrens").val()) + parseInt($("#Infants").val());
            $(".search-fly-guest .text span:last-child").text(_customer);
        });
        $("body").click(function(){
            $(".search-fly-guest .search-fly-form-passenger").removeClass("active");
        });
        $(".search-fly-guest .search-fly-form-passenger").click(function(e){
            e.stopPropagation();
        });
        var itinerary_tpl = $('#itinerarys div.itinerary[itinerary="0"]').clone();

        $('.itinerary-block').each(function (index, element) {
            // var element = $(element);
            // var itinerary = element.attr('itinerary');
            // AriDatePicker.setup($('#DepartureDate-'+itinerary), $('#ReturnDate-'+itinerary));
        });

        $('#search-fly-form input[name="TripType"]').change(function (e) {
            var radioValue = $("#search-fly-form input[name='TripType']:checked").val();
            if (radioValue == 'OW') {
                $('#search-fly-form .search-fly-form-return-date').css('display', 'none');
                $('#search-fly-form .search-fly-form-add-more').css('display', 'none');
                $('#search-fly-form .search-fly-form-return-date input').val("");
                if(jQuery('#itinerarys > div.itinerary').length >1) {
                    jQuery('#itinerarys > div.itinerary').each(function (index, element) {
                        var element = jQuery(element);
                        if (parseInt(element.attr('itinerary')) > 0) {
                            element.remove();
                        }
                    });
                    $('#itinerarys .itinerary[itinerary="0"] .search-fly-form-add-more button').prop('disabled', false);
                }


            }else if(radioValue =='RT')  {

                $('#search-fly-form .search-fly-form-return-date').css('display', 'block');
                $('#search-fly-form .search-fly-form-add-more').css('display', 'none');
                if(jQuery('#itinerarys > div.itinerary').length >1) {
                    jQuery('#itinerarys > div.itinerary').each(function (index, element) {
                        var element = jQuery(element);
                        if (parseInt(element.attr('itinerary')) > 0) {
                            element.remove();
                        }
                    });
                    $('#itinerarys .itinerary[itinerary="0"] .search-fly-form-add-more button').prop('disabled', false);
                }

            } else if(radioValue =='MS')  {
                $('#search-fly-form .search-fly-form-add-more').css('display', 'block');
                $('#search-fly-form .search-fly-form-return-date').css('display', 'none');
                if($('#itinerarys .itinerary').length >1) {
                    $('#itinerarys .itinerary[itinerary="0"] .search-fly-form-add-more button').prop('disabled', true);
                }else  {
                    $('#itinerarys .itinerary[itinerary="0"] .search-fly-form-add-more button').prop('disabled', false);
                }

            }
        });


        $(document).mouseup(function (e) {
            if ($(e.target).parents(".sub-search").length == 0) {
                // $(".sub-search").hide();
            }
        });


        function search_fly_form_add_more_control_button_remove(e) {
            var _this = jQuery(this);
            var parent = _this.parents('div.itinerary');
            if (parseInt(parent.attr('itinerary'))!= 0) {
                parent.remove();
                if (jQuery('#itinerarys > div.itinerary').length ==1) {
                    $('#itinerarys .itinerary[itinerary="0"] .search-fly-form-add-more button').prop('disabled', false);
                }
            }
        }

        $('#search-fly-form .search-fly-form-add-more-control-button-remove').click(search_fly_form_add_more_control_button_remove);

        function search_fly_form_add_more_click (e) {
            var data_key = 0;
            jQuery('#itinerarys > div.itinerary').each(function (index, element) {
                var element = jQuery(element);
                if (parseInt(element.attr('itinerary')) > data_key) {
                    data_key = parseInt(element.attr('itinerary'));
                }
            });
            data_key = data_key+1;
            if (data_key > 0) {
                var itinerary = itinerary_tpl.get(0).outerHTML;
                var itinerary_data = {
                    'itinerary="0"': 'itinerary="'+data_key+'"',
                    'fake-departure-0': 'fake-departure-'+data_key,
                    'departure-0': 'departure-'+data_key,
                    'DepartureCode-0':  'DepartureCode-'+data_key,
                    'sub-departure-0': 'sub-departure-'+data_key,
                    'search-departure-0': 'search-departure-'+data_key,
                    'fake-destination-0': 'fake-destination-'+data_key,
                    'destination-0': 'destination-'+data_key,
                    'DestinationCode-0': 'DestinationCode-'+data_key,
                    'sub-destination-0': 'sub-destination-'+data_key,
                    'search-destination-0': 'search-destination-'+data_key,
                    'DepartureDate-0': 'DepartureDate-'+data_key,
                    'ReturnDate-0': 'ReturnDate-'+data_key,
                }

                jQuery.each(itinerary_data,function (key, value) {
                    itinerary = itinerary.replace(new RegExp(key, 'g'),value);
                })
                itinerary = jQuery(itinerary);

                $('#itinerarys .itinerary[itinerary="0"] .search-fly-form-add-more button').prop('disabled', true);

                itinerary.find('.search-fly-form-add-more').css('display', 'block');
                itinerary.find('.search-fly-form-return-date').css('display', 'none');

                itinerary.find('.search-fly-form-add-more-control-button-add').click(search_fly_form_add_more_click);
                itinerary.find('.search-fly-form-add-more-control-button-remove').click(search_fly_form_add_more_control_button_remove);



                $('#itinerarys').append(itinerary);
                AriDatePicker.setup($('#DepartureDate-'+data_key), $('#ReturnDate-'+data_key));
            }


            return false;
        }

        $('#search-fly-form .search-fly-form-add-more-control-button-add').click(search_fly_form_add_more_click);


        $("#search-fly-form").submit(function (event) {
            var _this = $(this);
            var data_key = {};

            jQuery('#itinerarys > div.itinerary').each(function (index, element) {
                var element = $(element);
                data_key[element.attr('itinerary')] =  element.attr('itinerary');
            });
            var form_data = _this.serializeArray();

            var post_data = {
                'cmd': 'airports_geturl',
                'TripType': '',
                'segmens': [],
                'Adults': 0,
                'Childrens': 0,
                'Infants': 0
            }

            $.each(data_key, function (key, value) {
                var segmen = {
                    'DepartureCode': '',
                    'DestinationCode': '',
                    'DepartureDate': '',
                    'ReturnDate': '',
                }
                $.each(form_data, function (i, item) {
                    if (item.name == 'DepartureCode-'+value) {
                        segmen.DepartureCode = item.value
                    }
                    if (item.name == 'DestinationCode-'+value) {
                        segmen.DestinationCode = item.value
                    }
                    if (item.name == 'DepartureDate-'+value) {
                        segmen.DepartureDate = item.value
                    }
                    if (item.name == 'ReturnDate-'+value) {
                        segmen.ReturnDate = item.value
                    }
                });

                post_data['segmens'].push(segmen);

            });

            $.each(form_data, function (i, item) {
                if (item.name == 'TripType') {
                    post_data['TripType'] = item.value
                }
                if (item.name == 'Adults') {
                    post_data['Adults'] = item.value
                }
                if (item.name == 'Childrens') {
                    post_data['Childrens'] = item.value
                }
                if (item.name == 'Infants') {
                    post_data['Infants'] = item.value
                }
            });



            var error_text = '';


            if (post_data.TripType == 'OW') {
                if (post_data['segmens'][0]['DepartureCode'] == '') {
                    error_text = error_text + '<p>'+Drupal.t('Departure not validate.')+'</p>';
                }
                if (post_data['segmens'][0]['DestinationCode'] == '') {
                    error_text = error_text + '<p>'+ Drupal.t('DestinationCode not validate.')+'</p>';
                }
                if (post_data['segmens'][0]['DepartureDate'] == '') {
                    error_text = error_text + '<p>'+ Drupal.t('Departure date not validate.')+'</p>';
                }
            }else if(post_data.TripType  == "RT") {
                if (post_data['segmens'][0]['DepartureCode'] == '') {
                    error_text = error_text + '<p>'+Drupal.t('Departure not validate.')+'</p>';
                }
                if (post_data['segmens'][0]['DestinationCode'] == '') {
                    error_text = error_text + '<p>'+ Drupal.t('DestinationCode not validate.')+'</p>';
                }
                if (post_data['segmens'][0]['DepartureDate'] == '') {
                    error_text = error_text + '<p>'+ Drupal.t('Departure date not validate.')+'</p>';
                }
                if (post_data['segmens'][0]['ReturnDate'] == '') {
                    error_text = error_text + '<p>'+ Drupal.t('ReturnDate date not validate.')+'</p>';
                }

                var _dateParts1 = post_data['segmens'][0]['DepartureDate'].split("/");
                var _dateParts2 = post_data['segmens'][0]['ReturnDate'].split("/");
                var _dateObject1 = new Date(+_dateParts1[2], _dateParts1[1] - 1, +_dateParts1[0]);
                var _dateObject2 = new Date(+_dateParts2[2], _dateParts2[1] - 1, +_dateParts2[0]);
                if (_dateObject1.getTime() > _dateObject2.getTime()) {
                    error_text = error_text + '<p>'+ Drupal.t('Departure Date must be greater than or equal to Return Date.')+'</p>';
                }

            }else if(post_data.TripType  == "MS") {

                var _dateParts = [];

                $.each(post_data['segmens'], function (i, item) {
                    if (item['DepartureCode'] == '') {
                        error_text = error_text + '<p>'+Drupal.t('Departure not validate.')+'</p>';
                    }
                    if (item['DestinationCode'] == '') {
                        error_text = error_text + '<p>'+ Drupal.t('DestinationCode not validate.')+'</p>';
                    }
                    if (item['DepartureDate'] == '') {
                        error_text = error_text + '<p>'+ Drupal.t('Departure date not validate.')+'</p>';
                    }
                });

                $.each(post_data['segmens'], function (i, item) {
                    var _dateParts1 = item['DepartureDate'].split("/");
                    var _dateObject1 = new Date(+_dateParts1[2], _dateParts1[1] - 1, +_dateParts1[0]);
                    _dateParts.push(_dateObject1);
                });


                var CurentDatePart = _dateParts[0];

                $.each(_dateParts, function (i, item) {
                    if (item.getTime() < CurentDatePart.getTime()) {
                        error_text = error_text + '<p>'+ Drupal.t('The previous  Departure Date must be smaller than or equal to following Departure Date.')+'</p>';
                    }
                    CurentDatePart = item;
                });


            }

            if (error_text != '') {
                console.log(error_text);
            } else {
                $("#search-fly-form").submit();
                // $.ajax({
                //     method: "POST",
                //     url: '/' + Drupal.settings.pathPrefix + "cassiopeia/ajax",
                //     data: post_data,
                //     beforeSend: function () {
                //         $('.loading').show();
                //     },
                //     complete: function () {
                //         $('.loading').hide();
                //     },
                //     success: function (data) {
                //         if (data.success) {
                //             window.location.href = data.message;
                //         }
                //         console.log(data);
                //     },
                //     error: function (data) {
                //         console.log(data);
                //     }
                // });
            }
            event.preventDefault();
        });
    });
})(jQuery);

