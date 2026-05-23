(function ($) {
    var _airlines = new Array("VN","VJ","QH");
    var count = 0;
    function get_international_flights(airline){
        $(".flights .flight-blocks").removeClass("chosen");
        $(".btn-choose").attr("dta-chosen",0);
        $(".loading-block").addClass("active");
        var data = {};
        var list_flights = {};
        var array = [];
        var session_key = $("#session_key").val();
        var ReturnDate = $("span.flight-info").attr("data-ReturnDate");
        data['StartPoint']    = $("span.flight-info").attr("data-StartPoint");
        data['EndPoint']  = $("span.flight-info").attr("data-EndPoint");
        data['DepartureDate']           = $("span.flight-info").attr("data-DepartDate");
        data['ReturnDate']              = "";
        data['ItineraryType']           = 1;
        data['Adult']                   = $("span.flight-info").attr("data-Adt");
        data['Children']                = $("span.flight-info").attr("data-Chd");
        data['Infant']                  = $("span.flight-info").attr("data-Inf");
        data['customFee']                  = $("span.flight-info").attr("data-customFee");
        data['AirlineCode']             = airline;
        if(ReturnDate!="" &&ReturnDate!=null){
            data['ItineraryType'] = 2;
            data['ReturnDate'] = ReturnDate;
        }
        $.ajax({
            method: "post",
            url:"/cassiopeia/ajax",
            data: {
                cmd : "get_international_flights_meta",
                session_key : session_key,
                data : JSON.stringify(data),
            },
            success:function(result){
                if(result.response=="OK"){
                    $(".page-flight-search .international-search .block-result").html(result.html);
                }
                $(".page-flight-search .block-filter").html(result.block_filter);
                $(".loading-block").removeClass("active");
                $(".page-flight-search #search-fly-form").addClass("active");
                // $("i[data-block='departure-flight-block'].fa-caret-up").click();
                $( ".filter-block.flight-block-2 div:last-child .sort-price .fa-caret-up" ).trigger( "click" );
            }
        });
    }
    function get_flights(airline){

        $(".flights .flight-blocks").removeClass("chosen");
        $(".btn-choose").attr("dta-chosen",0);
        $(".loading-block").addClass("active");
        var data = {};
        var array = [];
        var session_key = $("#session_key").val();
        var ReturnDate = $("span.flight-info").attr("data-ReturnDate");
        data['DepartureAirportCode']    = $("span.flight-info").attr("data-StartPoint");
        data['DestinationAirportCode']  = $("span.flight-info").attr("data-EndPoint");
        data['DepartureDate']           = $("span.flight-info").attr("data-DepartDate");
        data['ReturnDate']              = "";
        data['ItineraryType']           = 1;
        data['Adult']                   = $("span.flight-info").attr("data-Adt");
        data['Children']                = $("span.flight-info").attr("data-Chd");
        data['Infant']                  = $("span.flight-info").attr("data-Inf");
        data['customFee']                  = $("span.flight-info").attr("data-customFee");
        data['AirlineCode']             = airline;
        if(ReturnDate!="" &&ReturnDate!=null){
            data['ItineraryType'] = 2;
            data['ReturnDate'] = ReturnDate;
        }
        $.ajax({
            method: "post",
            url:"/cassiopeia/ajax",
            data: {
                cmd : "get_domestic_flights",
                session_key : session_key,
                data : JSON.stringify(data),
            },
            success:function(result){
                count ++;
                if(count==4){
                    count=0;
                    $.ajax({
                        method: "post",
                        url:"/cassiopeia/ajax",
                        data: {
                            cmd : "get_airlines_flights",
                            session_key : session_key,
                        },
                        success:function(result){
                            $(".page-flight-search .block-filter").html(result.block_filter);
                        }
                    });
                }
                if(result.Total_Departure>0){
                    $(".block-DO-result-departure-head").html(result.block_result_DO_departure_head);
                }
                if(result.Total_Return>0){
                    $(".block-DO-result-return-head").html(result.block_result_DO_return_head);
                }

                $(".page-flight-search .departure-flight-block .block-DO-result").append(result.html_departure);
                if(result.html_return!=""){
                    $(".page-flight-search .return-flight-block .block-DO-result").append(result.html_return);
                }
                // }
                $(".page-flight-search .block-filter").html(result.block_filter);
                // $(".loading-block").removeClass("active");
                $(".page-flight-search #search-fly-form").addClass("active");

            }
        });
    }
    function sort_by_price() {
        points.sort(function(a, b){return a-b});
        document.getElementById("list-of-flight").innerHTML = points;
    }
    $(document).ready(function(e){
        // $.each(_airlines,function(index,value){
            // get_flights(value);
        // });
        $("body").on("click",".search-flight-sort .close-form-sort",function (e) {
            $(".search-flight-sort").removeClass("_show");
        });
        $(".quick-button-search-flight-sort").click(function (e) {
           $(".search-flight-sort").addClass("_show");
        });
        $(".page-search-form .close").click(function (e) {
           $(".page-search-form").removeClass("_show");
        });
        $(".quick-button-search-form").click(function (e) {
           $(".page-search-form").addClass("_show");
        });
        $("body").on("click",".block-DO-result .btn-choose",function(e){
            let customFee = $(this).attr("data-custom-fee");
            var _session_key = $("#session_key").val();
            $('html, body').animate({
                scrollTop: $(".page-flight-search .block-items").offset().top - 200
            }, 500);
            var _index = $(this).attr("data-item-index");
            var _flight_type = $("#flight_type").val();
            var _this = $(this);
            if(_this.attr("data-chosen")==0){
                $(".flights .flight-blocks").has(_this).addClass("chosen");
                $(".flight-item").has($(this)).addClass("chosen");
                _this.text("Thay đổi");
                _this.addClass("chosen");
                _this.attr("data-chosen","1");
                var _key = "booking_choose_flight";

            }else{
                $(".flights .flight-blocks").has(_this).removeClass("chosen");
                $(".flights .flight-blocks .flight-item").has(_this).removeClass("chosen");
                _this.text("Chọn vé");
                _this.removeClass("chosen");
                _this.attr("data-chosen","0");
                var _key = "booking_un_choose_flight";
                $(".search-flight-block-filter.your-flight").removeClass("active");
            }
            var Itinerary = $(".flight-item").has($(this)).attr("data-Itinerary");
            var FlightNumber = $(".flight-item").has($(this)).attr("data-FlightNumber");
            var Airline = $(".flight-item").has($(this)).attr("data-Airline");
            var SelectValue = $(".flight-item").has($(this)).attr("SelectValue");
            $.ajax({
                method: "post",
                url:"/cassiopeia/ajax",
                data: {
                    cmd : _key,
                    _flight_type : _flight_type,
                    Itinerary:Itinerary,
                    FlightNumber:FlightNumber,
                    Airline:Airline,
                    _session_key:_session_key,
                    SelectValue:SelectValue,
                    customFee:customFee,
                    kind:"INTERNATIONAL",
                },
                success:function(result){
                    if(result.ready==0){
                        $(".page-flight-search .page-top-block .step>div").removeClass("active");
                        $(".page-flight-search .page-top-block .step>div.step-1").addClass("active");
                        $(".itinerary .itinerary-container").html("");
                        $(".search-flight-block-filter").addClass("active");
                        $(".search-flight-block-filter.your-flight").removeClass("active");
                    }else{
                        $(".page-flight-search .page-top-block .step>div").removeClass("active");
                        $(".page-flight-search .page-top-block .step>div.step-2").addClass("active");
                        $(".itinerary .itinerary-container").html(result.booking_form);
                        $(".search-flight-block-filter").removeClass("active");
                        if(result.right_detail.trim()!=""){
                            $(".search-flight-block-filter.your-flight .block-items").html(result.right_detail);
                            $(".search-flight-block-filter.your-flight").addClass("active");
                        }
                        $(".price .tax-fee").css("display","block");
                        $(".price .non-tax-fee").css("display","none");
                    }
                    if(result.count_booking>0){
                        $(".block-result").hide();
                    }else{
                        $(".block-result").show();
                    }
                }
            });
        });
        $("body").on("click",".page-flight-search .btn-payment",function(e){
            let cmd = "booking_international_submit";
            if($(this).hasClass("INTERNATIONAL")){
                cmd = "booking_submit";
            }
            var _flag = true;
            $(".page-booking-content-left-items .page-booking-content-left-item input.required").each(function(e){
                var _this = $(this);
                if(jQuery.trim(_this.val())==""){
                    alert("Bạn phải diền mục này !");
                    _this.focus();
                    _flag = false;
                    return false;
                }
            });
            if(_flag==false){
                return false;
            }
            $(".loading-block").addClass("active");
            var _contact_full_name     = $(".page-booking-content-left-items .page-booking-content-left-item.contact-full-name input").val();
            var _contact_tel            = $(".page-booking-content-left-items .page-booking-content-left-item.contact-tel input").val();
            var _contact_email          = $(".page-booking-content-left-items .page-booking-content-left-item.contact-email input").val();
            var _contact = {};
            _contact['full_name']  = _contact_full_name;
            _contact['tel']         = _contact_tel;
            _contact['email']       = _contact_email;
            var _Adt = [];
            var _Chd = [];
            var _Inf = [];
            $(".page-booking-content-left-items.block-adults").each(function(e){
                var _this = $(this);
                var _temp = {};
                var _full_name = _this.find(".full-name input.full_name").val();
                var _gender = _this.find(".unisex input:checked").val();
                var _baggages = {};
                _this.find("select[name='select-baggage']").each(function(){
                    if($(this).val()!=0){
                        let temp = {};
                        var _Itinerary = $(this).attr("data-Itinerary");
                        var _baggage = $(this).val();
                        temp['id'] = _baggage;
                        _baggages[_Itinerary] = temp;
                    }
                });
                _temp['full_name'] = _full_name;
                _temp['gender'] = _gender;
                _temp['baggages'] = _baggages;
                _Adt.push(_temp);
            });
            if($(".page-booking-content-left-items.block-children").length){
                $(".page-booking-content-left-items.block-children").each(function(e){
                    var _this = $(this);
                    var _temp = {};
                    var _full_name = _this.find(".full-name input.full_name").val();
                    var _gender = _this.find(".unisex input:checked").val();
                    var _birth_day = _this.find(".date-of-birth input.children").val();
                    var _baggages = {};
                    _this.find("select[name='select-baggage']").each(function(){
                        if($(this).val()!=0){
                            let temp = {};
                            var _Itinerary = $(this).attr("data-Itinerary");
                            var _baggage = $(this).val();
                            temp['id'] = _baggage;
                            _baggages[_Itinerary] = temp;
                        }
                    });
                    _temp['full_name'] = _full_name;
                    _temp['birth_day'] = _birth_day;
                    _temp['gender'] = _gender;
                    _temp['baggages'] = _baggages;
                    _Chd.push(_temp);
                });
            }
            if($(".page-booking-content-left-items.block-infants").length){
                $(".page-booking-content-left-items.block-infants").each(function(e){
                    var _this = $(this);
                    var _temp = {};
                    var _full_name = _this.find(".full-name input.full_name").val();
                    var _gender = _this.find(".unisex input:checked").val();
                    var _birth_day = _this.find(".date-of-birth input.infant").val();
                    _temp['full_name'] = _full_name;
                    _temp['birth_day'] = _birth_day;
                    _temp['gender'] = _gender;
                    _Inf.push(_temp);
                });
            }

            $.ajax({
                method: "post",
                url:"/cassiopeia/ajax",
                data: {
                    cmd         : cmd,
                    type        : 1,
                    _Adt        : JSON.stringify(_Adt),
                    _Chd        : JSON.stringify(_Chd),
                    _Inf        : JSON.stringify(_Inf),
                    _contact    : JSON.stringify(_contact),
                },
                success:function(result){
                    if(result.status == "OK"){
                        $(".page-flight-search .page-top-block .step>div").removeClass("active");
                        $(".page-flight-search .page-top-block .step>div.step-3").addClass("active");
                        location.href=result.return_url;
                    }else{
                        alert(result.message);
                    }
                    $(".loading-block").removeClass("active");
                }
            });
        });

        if($(".flight-info").attr("data-radio")=="MOST_CHEAP"){
            get_min_flights();
        }else{
            get_international_flights();
        }
        $("body").on("click",".filter-block.flight-block-2 div:last-child .sort-price .fa-caret-up",function(e){
            var _this = $(this);
            console.log(_this);
            var _data_block = $(this).attr("data-block");
            var result =  $("."+_data_block+" .list-of-flight .block-result .flight-item").sort(function (a, b) {
                var contentA =parseInt( $(a).data('full-price'));
                var contentB =parseInt( $(b).data('full-price'));
                return (contentA < contentB) ? -1 : (contentA > contentB) ? 1 : 0;
            });
            $("."+_data_block+" .list-of-flight .block-result").html(result);
        });
        $("body").on("click",".filter-block.flight-block-2 div:last-child .sort-price .fa-caret-down",function(e){
            var _this = $(this);
            var _data_block = $(this).attr("data-block");
            var result =  $("."+_data_block+" .list-of-flight .block-result .flight-item").sort(function (a, b) {

                var contentA =parseInt( $(a).data('full-price'));
                var contentB =parseInt( $(b).data('full-price'));
                return (contentA > contentB) ? -1 : (contentA < contentB) ? 1 : 0;
            });

            $("."+_data_block+" .list-of-flight .block-result").html(result);
        });
        $("body").on("click",".filter-block.flight-block-2 div:last-child .sort-time .fa-caret-up",function(e){
            var _data_block = $(this).attr("data-block");
            var result =  $("."+_data_block+" .list-of-flight .flight-item").sort(function (a, b) {

                var contentA =parseInt( $(a).data('startdate'));
                var contentB =parseInt( $(b).data('startdate'));
                return (contentA < contentB) ? -1 : (contentA > contentB) ? 1 : 0;
            });

            $("."+_data_block+" .list-of-flight .block-result").html(result);
        });
        $("body").on("click",".filter-block.flight-block-2 div:last-child .sort-time .fa-caret-down",function(e){
            var _data_block = $(this).attr("data-block");
            var result =  $("."+_data_block+" .list-of-flight .flight-item").sort(function (a, b) {

                var contentA =parseInt( $(a).data('startdate'));
                var contentB =parseInt( $(b).data('startdate'));
                return (contentA > contentB) ? -1 : (contentA < contentB) ? 1 : 0;
            });

            $("."+_data_block+" .list-of-flight .block-result").html(result);
        });
        $("body").on("click",".block-result .btn-choose",function(e){
            let customFee = $(this).attr("data-custom-fee");
            $('html, body').animate({
                scrollTop: $(".page-flight-search .block-items").offset().top - 200
            }, 500);
            var _index = $(this).attr("data-item-index");
            var _flight_type = $("#flight_type").val();
            var _this = $(this);
            if(_this.attr("data-chosen")==0){
                $(".flights .flight-blocks").has(_this).addClass("chosen");
                $(".flight-item").has($(this)).addClass("chosen");
                _this.text("Thay đổi");
                _this.addClass("chosen");
                _this.attr("data-chosen","1");
                var _key = "booking_choose_international_flight";
                $(".block-DO").hide();
            }else{
                $(".flights .flight-blocks").has(_this).removeClass("chosen");
                $(".flight-item").has($(this)).removeClass("chosen");
                _this.text("Chọn vé");
                _this.removeClass("chosen");
                _this.attr("data-chosen","0");
                var _key = "booking_un_choose_international_flight";
                $(".search-flight-block-filter.your-flight").removeClass("active");
                $(".block-DO").show();
            }
            var GroupSession = _this.attr("data-GroupSession");
            var DepartureFlightSession = 0;
            var ReturnFlightSession = 0;
            $(".flight-item").has(_this).find(".radio-departure-flight").each(function(e){
                if($(this).is(":checked")){
                    DepartureFlightSession = $(this).attr("data-FlightSession");
                }
            });
            $(".flight-item").has(_this).find(".radio-return-flight").each(function(e){
                if($(this).is(":checked")){
                    ReturnFlightSession = $(this).attr("data-FlightSession");
                }
            });
            // console.log(FlightDepartureIndex);
            var session_key = $("#session_key").val();
            $.ajax({
                method: "post",
                url:"/cassiopeia/ajax",
                data: {
                    cmd : _key,
                    session_key:session_key,
                    customFee:customFee,
                    GroupSession:GroupSession,
                    DepartureFlightSession:DepartureFlightSession,
                    ReturnFlightSession:ReturnFlightSession,
                },
                success:function(result){
                    if(result.ready==0){
                        $(".page-flight-search .page-top-block .step>div").removeClass("active");
                        $(".page-flight-search .page-top-block .step>div.step-1").addClass("active");
                        $(".itinerary .itinerary-container").html("");
                        $(".search-flight-block-filter").addClass("active");
                        $(".search-flight-block-filter.your-flight").removeClass("active");
                    }else{
                        $(".page-flight-search .page-top-block .step>div").removeClass("active");
                        $(".page-flight-search .page-top-block .step>div.step-2").addClass("active");
                        $(".itinerary .itinerary-container").html(result.booking_form);
                        $(".search-flight-block-filter").removeClass("active");
                        if(result.right_detail!=""){
                            $(".search-flight-block-filter.your-flight .block-items").html(result.right_detail);
                            $(".search-flight-block-filter.your-flight").addClass("active");
                        }
                        $(".price .tax-fee").css("display","block");
                        $(".price .non-tax-fee").css("display","none");
                    }
                }
            });
        });
        $("body").on("click", ".block-DO-result .btn-view-detail", function(e) {
            var _index = $(this).attr("data-index");
            var _this = $(this);
            let data = $(this).attr("data");
            var SelectValue = $(".flight-item").has($(this)).attr("SelectValue");
            if ($(".page-flight-search .flights .item").has(_this).find(".detail").hasClass("active")) {
                $(".page-flight-search .flights .item").has(_this).find(".detail").removeClass("active");
            } else {
                var _airline = _this.attr("data-airline");
                var _class = _this.attr("data-class");
                $.ajax({
                    method: "post",
                    url: "/cassiopeia/ajax",
                    data: {
                        cmd: "getFlightDetail",
                        SelectValue: SelectValue,
                        data: data,
                        airline: _airline,
                        class: _class,
                    },
                    success: function(result) {
                        $(".page-flight-search .flights .item").has(_this).find(".detail").html(result.html);
                        $(".page-flight-search .flights .item").has(_this).find(".detail").addClass("active");
                    }
                });
            }
        });
        $("body").on("change",".page-flight-search .international-search .flights .item .item-body .check input",function(e){
            var _this = $(this);
            var _element = $(".page-flight-search .international-search .flights .item .item-body").has(_this);
            $(".page-flight-search .international-search #list-of-flight .flight-item .item").has(_element).find(".item-body").removeClass("chosen");
            // $(".page-flight-search .international-search .flights .item .item-body").has($(this)).removeClass("chosen");
            _element.addClass("chosen")
        })
        $("body").on("click",".page-flight-search .international-search .flights .item .item-body .btn-view-detail",function(){
            var _this = $(this);
            var _element = $(".page-flight-search .international-search .flights .item .item-body").has(_this);
            if(_element.hasClass("active")){
                _element.removeClass("active");
            }else{
                $(".page-flight-search .international-search .flights .item .item-body").removeClass("active");
                _element.addClass("active")
            }
        });
        $("body").on("click",".flight-block-3.calendar-block .block-content .block-body>div",function(e){
            $(".flight-block-3.calendar-block .block-content .block-body>div").removeClass("active");
            $(this).addClass("active");
            var _this = $(this);
            var _date = _this.attr("data-date");
            // console.log(_date);
            // return false;
            $("#search-fly-form input[name='DepartureDate-0']").val(_date);
            $(".page-flight-search .block-result").html("");
            // get_international_flights();
            $(".search-fly-form-actions button[type=\"submit\"]").click();

        });
        $("body").on("click",".btn-price-detail",function(e){
            var _this = $(this);
            $(".flight-item").has(_this).find(".price-detail").toggleClass("active");
        });
        $("body").on("click",".page-flight-search .block-items.Airlines input",function(e){
            $(".page-flight-search .flights .flight-item").addClass("inactive");
            var _array = new Array();
            var _value = $(this).val();
            if(_value=="all"){
                if($(this).is(":checked")){
                    $(".page-flight-search .block-items.Airlines input").prop('checked', true);
                }else{
                    $(".page-flight-search .block-items.Airlines input").prop('checked', false);
                }
            }
            $(".page-flight-search .block-items.Airlines input").each(function (e) {
                if($(this).is(":checked")){
                    _array.push($(this).val());
                }
            });
            if(_array.length){
                for(var i=0;i<_array.length;i++){
                    var _value = _array[i];
                    $(".page-flight-search .flights .flight-item").each(function(e){
                        var _airline = $(this).attr("data-idata");
                        if(_airline.indexOf(_value) != -1){
                            $(this).removeClass("inactive");
                        }
                    });
                }
            }
        });
        $("body").on("click",".page-flight-search .block-items.StopNum input",function(e){
            $(".page-flight-search .flights .flight-item").addClass("inactive");
            var _array = new Array();
            var _value = $(this).val();
            if(_value=="all"){
                if($(this).is(":checked")){
                    $(".page-flight-search .block-items.StopNum input").prop('checked', true);
                }else{
                    $(".page-flight-search .block-items.StopNum input").prop('checked', false);
                }
            }
            $(".page-flight-search .block-items.StopNum input").each(function (e) {
                if($(this).is(":checked")){
                    _array.push($(this).val());
                }
            });
            // console.log(_array);
            if(_array.length){
                for(var i=0;i<_array.length;i++){
                    var _value = _array[i];
                    $(".page-flight-search .flights .flight-item .item-body").each(function(e){
                        var _airline = $(this).attr("data-Stops");
                        console.log(_airline);
                        if(_airline.indexOf(_value) != -1){
                            console.log("ff");
                            $(".page-flight-search .flights .flight-item").has($(this)).removeClass("inactive");
                            // $(this).removeClass("inactive");
                        }
                    });
                }
            }
        });

        $("body").on("click",".btn-get-rules",function(e){
            var _index = $(this).attr("data-item-index");
            if($(".flight-rules[data-index='"+_index+"']").hasClass("active")){
                $(".flight-rules[data-index='"+_index+"']").removeClass("active");
            }else{
                $(".flight-rules[data-index='"+_index+"']").toggleClass("active");
                var _this = $(this);
                var _data_Session = $(this).attr("data-Session");
                var _data_FareDataId = $(this).attr("data-FareDataId");
                var _FlightValue = new Array();
                var _flightvalue = {};
                $(".flight-item[data-item-index='"+_index+"'] .radio-flight").each(function(e){
                    if($(this).is(":checked")){
                        _FlightValue.push($(this).val());
                    }
                });
                var _data_FlightValue = $(this).attr("data-FlightValue");
                $.ajax({
                    method: "post",
                    url:"/cassiopeia/ajax",
                    data: {
                        cmd : "get_fare_rules",
                        Session : _data_Session,
                        FareDataId : _data_FareDataId,
                        FlightValue : JSON.stringify(_FlightValue),
                    },
                    success:function(result){
                        $(".flight-rules[data-item-index='"+_index+"']").addClass("active");
                        $(".flight-rules[data-item-index='"+_index+"']").html(result.html);
                    }
                });
            }
        });
    });

})(jQuery);
