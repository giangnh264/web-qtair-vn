(function ($) {
    //var _airlines = new Array("VN"); //,"VJ","VU","QH"
    function render_flights(i,airline,itinerary){
        var session_key = $("#session_key").val();
        $.ajax({
            method: "post",
            url:"/cassiopeia/ajax",
            data: {
                cmd : "render_flight",
                i : i,
                airline : airline,
                itinerary : itinerary,
                session_key : session_key,
            },
            success:function(result){
                console.log(result);
                if(itinerary==="DepartureFlights"){
                    $(".page-flight-search .departure-flight-block .block-result").append(result.html);
                }else{
                    $(".page-flight-search .return-flight-block .block-result").append(result.html);
                }
            }
        });
    }
    function get_flights(){
        $(".flights .flight-blocks").removeClass("chosen");
        $(".btn-choose").attr("dta-chosen",0);
        $(".loading-block").addClass("active");
        var data = {};
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
        if(ReturnDate!="" &&ReturnDate!=null){
            data['ItineraryType'] = 2;
            data['ReturnDate'] = ReturnDate;
        }
        $.ajax({
            method: "post",
            url:"/cassiopeia/ajax",
            data: {
                //cmd : "get_domestic_flights",
                cmd : "get_domestic_flights_meta",
                session_key : session_key,
                data : JSON.stringify(data),
            },
            success:function(result){                
                $(".loading-block").removeClass("active");
                console.log(result)
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
                $(".page-flight-search .departure-flight-block .block-result").append(result.html_departure);
                if(result.html_return!=""){
                    $(".page-flight-search .return-flight-block .block-result").append(result.html_return);
                }
                // }
                $(".page-flight-search .block-filter").html(result.block_filter);
                // $(".page-flight-search #search-fly-form").addClass("active");
                $(".filter-block.flight-block-2 div>div[data-sort='price']").click();
            }
        });
    }
    function get_min_flights(){
        $(".loading-block").addClass("active");
        var data = {};
        var list_flight = {};
        data['Adt'] = $("span.flight-info").attr("data-Adt");
        data['Chd'] = $("span.flight-info").attr("data-Chd");
        data['Inf'] = $("span.flight-info").attr("data-Inf");
        list_flight['StartPoint']  =    $("span.flight-info").attr("data-StartPoint");
        list_flight['EndPoint']    =    $("span.flight-info").attr("data-EndPoint");
        list_flight['DepartDate']  =    $("span.flight-info").attr("data-DepartDate");
        list_flight['Airline']     =    "";
        data['FlightRequest'] = list_flight;
        $.ajax({
            method: "post",
            url:"/cassiopeia/ajax",
            data: {
                cmd : "get_min_flights",
                data : JSON.stringify(data),
            },
            success:function(result){
                $(".page-flight-search .flights .block-items").html(result.html);
                $(".page-flight-search .block-filter").html(result.block_filter);
                $(".loading-block").removeClass("active");
                $(".page-flight-search #search-fly-form").addClass("active");
            }
        });
    }
    function sort_by_price() {
        points.sort(function(a, b){return a-b});
        document.getElementById("list-of-flight").innerHTML = points;
    }
    $(document).ready(function(e){
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
        $("body").on("change", ".page-booking-content-left-items:first-child input.full_name", function(e) {
            let contact_name = $(".contact-full-name input").val();
            if (contact_name.trim() === "") {
                $(".contact-full-name input").val($(this).val());
            }
        });
        $("body").on("click", ".page-flight-search .flights .item .price span ul li", function(e) {
            let FareOptionSession = $(this).attr("data-FareOptionSession");
            let _this = $(this);
            let _parent = $(".page-flight-search .flights .item .price span").has(_this);
            let text_price = _this.text().split(":");
            if (text_price.hasOwnProperty(1)) {
                _parent.find("span").text(text_price[1].trim());
            } else {
                _parent.find("span").text(_this.text());
            }
            var _airline = _this.attr("data-airline");
            var _class = _this.attr("data-class");
            $(".flight-item").has($(this)).attr("data-FareOptionSession", FareOptionSession);
            $(".flight-item").has($(this)).attr("data-full-price", _this.attr("data-value").replaceAll(".", ""));
            let _btn = $(".flight-item").has($(this)).find(".btn-view-detail");
            // _btn.attr("data-class",_class);
            // _btn.attr("selectvalue",SelectValue);
            // console.log("FareOptionSession",FareOptionSession)
            $.ajax({
                method: "post",
                url: "/cassiopeia/ajax",
                data: {
                    cmd: "get_fare_rules",
                    airline: _airline,
                    class: _class,
                },
                success: function(result) {
                    $(".page-flight-search .flights .item .detail").removeClass("active");
                    $(".page-flight-search .flights .item").has(_this).find(".detail .fare-rules").html(result.html);

                    // $(".page-flight-search .flights .item").has(_this).find(".detail").addClass("active");
                }
            });
        });
        $("body").on("click", ".page-flight-search .flights .item .price span span.active", function(e) {
            e.stopPropagation();
            let customFee = $(".flight-info").attr("data-customFee");
            $(".page-flight-search .flights .item .price span ul").removeClass("active");
            let _this = $(this);
            let _parent = _this.parent();
            var data = $(this).attr("data");
            let Flight = $(".flight-item").has(_this);
            let FlightSession = Flight.attr("data-FlightSession");
            let FareOptionSession = Flight.attr("data-FareOptionSession");
            let Itinerary = Flight.attr("data-Itinerary");
            var airline = $(this).attr("airline");
            let session_key = $("#session_key").val();
            if (_parent.find("ul").hasClass("active")) {
                _parent.find("ul").removeClass("active");
            } else {
                $.ajax({
                    method: "post",
                    url: "/cassiopeia/ajax",
                    data: {
                        cmd: "getFLightClass",
                        FlightSession: FlightSession,
                        FareOptionSession: FareOptionSession,
                        session_key: session_key,
                        Itinerary: Itinerary,
                        customFee: customFee,
                    },
                    success: function(result) {
                        _parent.find("ul").html(result.html);
                        _parent.find("ul").addClass("active");
                        $(".page-flight-search .flights .item .detail").removeClass("active");
                    }
                });
            }
        });
        $("body").click(function(e) {
            $(".page-flight-search .flights .item .price span ul").removeClass("active");
        });
        $("body").on("click", ".btn-payment-method", function(e) {
            var _flag = true;
            $(".page-booking-content-left-items .page-booking-content-left-item input.required").each(function(e) {
                var _this = $(this);
                if (jQuery.trim(_this.val()) == "") {
                    alert("Bạn đang điền bị thiếu thông tin!!");
                    _this.focus();
                    _this.addClass("border-red");
                    _flag = false;
                    return false;
                }
            });
            if (_flag == false) {
                return false;
            }
            $(".loading-block").addClass("active");
            var _contact_full_name = $(".page-booking-content-left-items .page-booking-content-left-item.contact-full-name input").val();
            var _contact_tel = $(".page-booking-content-left-items .page-booking-content-left-item.contact-tel input").val();
            var _contact_email = $(".page-booking-content-left-items .page-booking-content-left-item.contact-email input").val();
            var _contact = {};
            _contact['full_name'] = _contact_full_name;
            _contact['tel'] = _contact_tel;
            _contact['email'] = _contact_email;
            var _Adt = [];
            var _Chd = [];
            var _Inf = [];
            $(".page-booking-content-left-items.block-adults").each(function(e) {
                var _this = $(this);
                var _temp = {};
                var _full_name = _this.find(".full-name input.full_name").val();
                var khtx_QH = _this.find(".full-name input[name='khtx_QH']").val();
                var khtx_VN = _this.find(".full-name input[name='khtx_VN']").val();
                var cid = _this.find(".full-name input[name='cid']").val();
                var _gender = _this.find(".unisex input:checked").val();
              var _birth_day = _this.find(".date-of-birth input.adult").val();
                var _baggages = {};
                _this.find("select[name='select-baggage']").each(function() {
                    if ($(this).val() != 0) {
                        let temp = {};
                        var _Itinerary = $(this).attr("data-Itinerary");
                        var _baggage = $(this).val();
                        temp['id'] = _baggage;
                        _baggages[_Itinerary] = temp;
                    }
                });
                _temp['full_name'] = _full_name;
                _temp['khtx_QH'] = khtx_QH;
                _temp['cid'] = cid;
                _temp['khtx_VN'] = khtx_VN;
                _temp['gender'] = _gender;
              _temp['birth_day'] = _birth_day;
                _temp['baggages'] = _baggages;
                _Adt.push(_temp);
            });
            // console.log(_Adt);
            // return false;
            if ($(".page-booking-content-left-items.block-children").length) {
                $(".page-booking-content-left-items.block-children").each(function(e) {
                    var _this = $(this);
                    var _temp = {};
                    var _full_name = _this.find(".full-name input.full_name").val();
                    var khtx_QH = _this.find(".full-name input[name='khtx_QH']").val();
                    var khtx_VN = _this.find(".full-name input[name='khtx_VN']").val();
                    var cid = _this.find(".full-name input[name='cid']").val();
                    var _gender = _this.find(".unisex input:checked").val();
                    var _birth_day = _this.find(".date-of-birth input.children").val();
                    var _baggages = {};
                    _this.find("select[name='select-baggage']").each(function() {
                        if ($(this).val() != 0) {
                            let temp = {};
                            var _Itinerary = $(this).attr("data-Itinerary");
                            var _baggage = $(this).val();
                            temp['id'] = _baggage;
                            _baggages[_Itinerary] = temp;
                        }
                    });
                    _temp['full_name'] = _full_name;
                    _temp['khtx_QH'] = khtx_QH;
                    _temp['cid'] = cid;
                    _temp['khtx_VN'] = khtx_VN;
                    _temp['birth_day'] = _birth_day;
                    _temp['gender'] = _gender;
                    _temp['baggages'] = _baggages;
                    _Chd.push(_temp);
                });
            }
            if ($(".page-booking-content-left-items.block-infants").length) {
                $(".page-booking-content-left-items.block-infants").each(function(e) {
                    var _this = $(this);
                    var _temp = {};
                    var _full_name = _this.find(".full-name input.full_name").val();
                    var cid = _this.find(".full-name input[name='cid']").val();
                    var _gender = _this.find(".unisex input:checked").val();
                    var _birth_day = _this.find(".date-of-birth input.infant").val();
                    _temp['full_name'] = _full_name;
                    _temp['cid'] = cid;
                    _temp['birth_day'] = _birth_day;
                    _temp['gender'] = _gender;
                    _Inf.push(_temp);
                });
            }
            let note;
            let company_name;
            let tax_number;
            let company_address;
            let company_mail;
            var payment = $("input.payment").val();
            let additional = {};
            if ($("#note").is(":checked")) {
                note = $("textarea[name='note']").val();
                additional['note'] = note;
            }
            if ($("#bill").is(":checked")) {
                company_name = $("input[name='company_name']").val();
                tax_number = $("input[name='tax_number']").val();
                company_address = $("input[name='company_address']").val();
                company_mail = $("input[name='company_mail']").val();

                additional['company_name'] = company_name;
                additional['tax_number'] = tax_number;
                additional['company_address'] = company_address;
                additional['company_mail'] = company_mail;
            }
            $.ajax({
                method: "post",
                url: "/cassiopeia/ajax",
                data: {
                    cmd: "booking_payment",
                    _Adt: JSON.stringify(_Adt),
                    _Chd: JSON.stringify(_Chd),
                    _Inf: JSON.stringify(_Inf),
                    additional: JSON.stringify(additional),
                    _contact: JSON.stringify(_contact),
                    payment: payment
                },
                success: function(result) {
                    location.href = "/booking/payment";
                }
            });
        });
        $("body").on("click",".page-flight-search .btn-payment",function(e){
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
            // console.log(_Adt);
            // return false;
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
            var payment = $("input.payment").val();
            if(payment==5){
                let isAllowIssueNow = true;
                let firstAirline = [];
                firstAirline.push($(".flight-item.item.chosen").attr("data-airline"));
                console.log("firstAirline Array: ", firstAirline);
                $(".flight-item.item.chosen").each(function(e){
                    if(!firstAirline.includes($(this).attr("data-airline"))) {isAllowIssueNow = false;}
                    console.log("firstAirline Array: ", firstAirline);
                });
                if(isAllowIssueNow){
                    if(firstAirline.includes("VN")){
                        alert("Hiện tại chưa triển khai chức năng xuất ngay đối với vé VN. Vui lòng thực hiện đặt chỗ");
                    }else{
                        if(confirm("Vui lòng kiểm tra thông tin booking & đảm bảo số dư tài khoản trước khi xuất vé!")){
                            $(".loading-block").addClass("active");
                            $.ajax({
                                method: "post",
                                url:"/cassiopeia/ajax",
                                data: {
                                    cmd         : "booking_submit_meta",
                                    _Adt        : JSON.stringify(_Adt),
                                    _Chd        : JSON.stringify(_Chd),
                                    _Inf        : JSON.stringify(_Inf),
                                    _contact    : JSON.stringify(_contact),
                                    payment     : payment
                                },
                                success:function(result){
                                    if(result.status === "OK"){
                                        $(".page-flight-search .page-top-block .step>div").removeClass("active");
                                        $(".page-flight-search .page-top-block .step>div.step-3").addClass("active");
                                        location.href=result.return_url;
                                    }else{
                                        alert(result.message);
                                    }
                                    $(".loading-block").removeClass("active");
                                }
                            });
                        }else{$(".loading-block").removeClass("active");}                        
                    }
                }else{
                    alert("Vui lòng chọn chiều đi và chiều về cùng hãng");
                    $(".loading-block").removeClass("active");
                }
                // $(".loading-block").removeClass("active");
            }else{
                $.ajax({
                    method: "post",
                    url:"/cassiopeia/ajax",
                    data: {
                        cmd         : "booking_submit_meta",
                        _Adt        : JSON.stringify(_Adt),
                        _Chd        : JSON.stringify(_Chd),
                        _Inf        : JSON.stringify(_Inf),
                        _contact    : JSON.stringify(_contact),
                        payment     : payment
                    },
                    success:function(result){
                        if(result.status === "OK"){
                            $(".page-flight-search .page-top-block .step>div").removeClass("active");
                            $(".page-flight-search .page-top-block .step>div.step-3").addClass("active");
                            // location.href=result.return_url;
                        }else{
                            alert(result.message);
                        }
                        $(".loading-block").removeClass("active");
                    }
                });
            }
        });

        if($(".flight-info").attr("data-radio")=="MOST_CHEAP"){
            get_min_flights();
        }else{
            get_flights();
            // $.each(_airlines,function(index,value){
            //     get_flights(value);
            // });
        }
        $("body").on("change",".baggage-item select",function(){
            let customFee = $("span.flight-info").attr("data-customFee");
            var _baggages = [];
            $(".baggage-item select").each(function(e){
                if($(this).val()!=0){
                    var temp = {};
                    temp['value'] = $(this).val();
                    temp['price'] = $(this).find("option:selected").attr("data-price");
                    _baggages.push(temp);
                }
            });

            $.ajax({
                method: "post",
                url:"/cassiopeia/ajax",
                data: {
                    cmd : "add_baggage",
                    customFee : customFee, 
                    baggages : JSON.stringify(_baggages),
                },
                success:function(result){
                    $(".search-flight-block-filter.your-flight .block-items").html(result.right_detail);
                }
            });
        });
        // $("body").on("click",".filter-block.flight-block-2 div:last-child .sort-price .fa-caret-up",function(e){
        //     var _this = $(this);
        //     var _data_block = $(this).attr("data-block");
        //     var result =  $("."+_data_block+" .list-of-flight .block-result .item").sort(function (a, b) {
        //         var contentA =parseInt( $(a).data('full-price'));
        //         var contentB =parseInt( $(b).data('full-price'));
        //         return (contentA < contentB) ? -1 : (contentA > contentB) ? 1 : 0;
        //     });
        //     $("."+_data_block+" .list-of-flight .block-result").html(result);
        // });
        // $("body").on("click",".filter-block.flight-block-2 div:last-child .sort-price .fa-caret-down",function(e){
        //     var _this = $(this);
        //     var _data_block = $(this).attr("data-block");
        //     var result =  $("."+_data_block+" .list-of-flight .block-result .item").sort(function (a, b) {
        //
        //         var contentA =parseInt( $(a).data('full-price'));
        //         var contentB =parseInt( $(b).data('full-price'));
        //         return (contentA > contentB) ? -1 : (contentA < contentB) ? 1 : 0;
        //     });
        //
        //     $("."+_data_block+" .list-of-flight .block-result").html(result);
        // });
        // $("body").on("click",".filter-block.flight-block-2 div:last-child .sort-time .fa-caret-up",function(e){
        //     var _data_block = $(this).attr("data-block");
        //     var result =  $("."+_data_block+" .list-of-flight .item").sort(function (a, b) {
        //
        //         var contentA =parseInt( $(a).data('startdate'));
        //         var contentB =parseInt( $(b).data('startdate'));
        //         return (contentA < contentB) ? -1 : (contentA > contentB) ? 1 : 0;
        //     });
        //
        //     $("."+_data_block+" .list-of-flight .block-result").html(result);
        // });
        // $("body").on("click",".filter-block.flight-block-2 div:last-child .sort-time .fa-caret-down",function(e){
        //     var _data_block = $(this).attr("data-block");
        //     var result =  $("."+_data_block+" .list-of-flight .item").sort(function (a, b) {
        //
        //         var contentA =parseInt( $(a).data('startdate'));
        //         var contentB =parseInt( $(b).data('startdate'));
        //         return (contentA > contentB) ? -1 : (contentA < contentB) ? 1 : 0;
        //     });
        //
        //     $("."+_data_block+" .list-of-flight .block-result").html(result);
        // });
        $(".filter-block.flight-block-2 div>div").click(function(e) {
            $(".filter-block.flight-block-2 div>div").removeClass("active");
            let _this = $(this);
            _this.addClass("active");
            let sort = _this.attr("data-sort");
            let direction = _this.attr("data-direction");
            let key = "full-price";
            switch (sort) {
                case "price":
                    key = "full-price";
                    break;
                case "start-time":
                    key = "startdate";
                    break;
                case "end-time":
                    key = "enddate";
                    break;
                case "duration":
                    key = "duration";
                    break;
                case "airline":
                    key = "airline";
                    break;
            }

            if (direction == "ASC") {
                var _data_block = $(this).attr("data-block");
                var result = $("." + _data_block + " .list-of-flight .block-result .item").sort(function(a, b) {
                    if (sort == "airline") {
                        console.log(123123123);
                        var contentA = ($(a).data(key));
                        var contentB = ($(b).data(key));
                        console.log("contentA", contentA);
                    } else {
                        var contentA = parseInt($(a).data(key));
                        var contentB = parseInt($(b).data(key));
                    }

                    return (contentA > contentB) ? -1 : (contentA < contentB) ? 1 : 0;
                });
                $("." + _data_block + " .list-of-flight .block-result").html(result);
                _this.attr("data-direction", "DESC");
            } else {
                var _data_block = $(this).attr("data-block");
                var result = $("." + _data_block + " .list-of-flight .block-result .item").sort(function(a, b) {
                    if (sort == "airline") {
                        var contentA = ($(a).data(key));
                        var contentB = ($(b).data(key));
                    } else {
                        var contentA = parseInt($(a).data(key));
                        var contentB = parseInt($(b).data(key));
                    }
                    return (contentA < contentB) ? -1 : (contentA > contentB) ? 1 : 0;
                });
                $("." + _data_block + " .list-of-flight .block-result").html(result);
                _this.attr("data-direction", "ASC");
            }
        });
        $("body").on("click",".btn-choose",function(e){
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
                $(".flight-item").has($(this)).find(".price span span").removeClass("active");
            }else{
                $(".flights .flight-blocks").has(_this).removeClass("chosen");
                $(".flights .flight-blocks .flight-item").has(_this).removeClass("chosen");
                _this.text("Chọn vé");
                _this.removeClass("chosen");
                _this.attr("data-chosen","0");
                var _key = "booking_un_choose_flight";
                $(".search-flight-block-filter.your-flight").removeClass("active");
                $(".flight-item").has($(this)).find(".price span span").addClass("active");
            }
            var Itinerary = $(".flight-item").has($(this)).attr("data-Itinerary");
            var FlightNumber = $(".flight-item").has($(this)).attr("data-FlightNumber");
            var Airline = $(".flight-item").has($(this)).attr("data-Airline");
            var  FlightSession = $(".flight-item").has($(this)).attr("data-FlightSession");
            var  FareOptionSession = $(".flight-item").has($(this)).attr("data-FareOptionSession");
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
                    FlightSession: FlightSession,
                    FareOptionSession: FareOptionSession,
                    customFee: customFee,
                },
                success:function(result){
                    if(result.ready==0){
                        $(".page-flight-search .page-top-block .step>div").removeClass("active");
                        $(".page-flight-search .page-top-block .step>div.step-1").addClass("active");
                        $(".itinerary .itinerary-container").html("");
                        $(".search-flight-block-filter").addClass("active");
                        $(".search-flight-block-filter.your-flight").removeClass("active");

                    }else{
                        console.log(result);
                        $(".page-flight-search .page-top-block .step>div").removeClass("active");
                        $(".page-flight-search .page-top-block .step>div.step-2").addClass("active");
                        $(".itinerary .itinerary-container").html(result.booking_form);
                        $(".search-flight-block-filter").removeClass("active");
                        if(result.right_detail.trim()!=""){
                            // $(".search-flight-block-filter.your-flight .block-items").html(result.right_detail);
                            $(".search-flight-block-filter.your-flight .block-items").html(result.right_detail);
                            $(".search-flight-block-filter.your-flight").addClass("active");
                        }
                        $(".price .tax-fee").css("display","block");
                        $(".price .non-tax-fee").css("display","none");

                        // $.ajax({
                        //     method: "post",
                        //     url:"/cassiopeia/ajax",
                        //     data: {
                        //         cmd : "flight_verify",
                        //         _flight_type : _flight_type,
                        //         _session_key : _session_key,
                        //         // data:(_data),
                        //         // _session:_session,
                        //     },
                        //     success:function(result){
                        //         if(result.check==0){
                        //             alert("Thông tin chuyến bay đã thay đổi!");
                        //             location.reload();
                        //         }
                        //     }
                        // });
                    }

                }
            });
        });
        $("body").on("click",".departure-flight-block .flight-block-3.calendar-block .block-content .block-body>div",function(e){
            $(".departure-flight-block .flight-block-3.calendar-block .block-content .block-body>div").removeClass("active");
            $(this).addClass("active");
            var _this = $(this);
            var _parent = $(".calendar-block").has($(this));
            var _date = _this.attr("data-date");
            $("#search-fly-form input[name='DepartureDate-0']").val(_date);
            $(".search-fly-form-actions button[type=\"submit\"]").click();

        });
        $("body").on("click",".return-flight-block .flight-block-3.calendar-block .block-content .block-body>div",function(e){
            if($(this).hasClass("invalid-date")){
                return false;
            }
            $(".return-flight-block .flight-block-3.calendar-block .block-content .block-body>div").removeClass("active");
            $(this).addClass("active");
            var _this = $(this);
            var _parent = $(".calendar-block").has($(this));
            var _date = _this.attr("data-date");
            $("#search-fly-form input[name='ReturnDate-0']").val(_date);
            $(".search-fly-form-actions button[type=\"submit\"]").click();
        });
        $("body").on("click",".btn-price-detail",function(e){
            var _index = $(this).attr("data-item-index");
            $(".price-detail[data-item-index="+_index+"]").toggleClass("active");
        });
        $("body").on("change",".page-flight-search .departure-block .block-items.Airlines input",function(e){
            $(".page-flight-search .flights .departure-block .item").addClass("inactive");
            var _array = new Array();
            var _value = $(this).val();
            if(_value=="all"){
                if($(this).is(":checked")){
                    $(".page-flight-search .departure-block .block-items.Airlines input").prop('checked', true);
                }else{
                    $(".page-flight-search .departure-block .block-items.Airlines input").prop('checked', false);
                }
            }
            $(".page-flight-search .departure-block .block-items.Airlines input").each(function (e) {
                if($(this).is(":checked")){
                    _array.push($(this).val());
                }
            });
            if(_array.length){
                for(var i=0;i<_array.length;i++){
                    var _value = _array[i];
                    $(".page-flight-search .flights .departure-block  .item[data-airline='"+_value+"']").removeClass("inactive");
                }
            }
        });
        $("body").on("click",".page-flight-search .return-block .block-items.Airlines input",function(e){
            $(".page-flight-search .flights .return-block .item").addClass("inactive");
            var _array = new Array();
            var _value = $(this).val();
            if(_value=="all"){
                if($(this).is(":checked")){
                    $(".page-flight-search .return-block .block-items.Airlines input").prop('checked', true);
                }else{
                    $(".page-flight-search .return-block .block-items.Airlines input").prop('checked', false);
                }
            }
            $(".page-flight-search .return-block .block-items.Airlines input").each(function (e) {
                if($(this).is(":checked")){
                    _array.push($(this).val());
                }
            });
            if(_array.length){
                for(var i=0;i<_array.length;i++){
                    var _value = _array[i];
                    $(".page-flight-search .flights .return-block  .item[data-airline='"+_value+"']").removeClass("inactive");
                }
            }
        });
        $("body").on("click",".page-flight-search .block-items.GroupClass input",function(e){
            $(".page-flight-search .flights .item").addClass("group-inactive");
            var _array = new Array();
            var _value = $(this).val();
            if(_value=="all"){
                if($(this).is(":checked")){
                    $(".page-flight-search .block-items.GroupClass input").not($(this)).prop('checked', true);
                }else{
                }
            }
            $(".page-flight-search .block-items.GroupClass input").each(function (e) {
                if($(this).is(":checked")){
                    _array.push($(this).val());
                }
            });
            if(_array.length){
                for(var i=0;i<_array.length;i++){
                    var _value = _array[i];
                    $(".page-flight-search .flights .item[data-class='"+_value+"']").removeClass("group-inactive");
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
        $("body").on("click", ".btn-view-detail", function(e) {
            var _index = $(this).attr("data-index");
            var _this = $(this);
            let data = $(this).attr("data");
            let Flight = $(".flight-item").has(_this);
            let FlightSession = Flight.attr("data-FlightSession");
            let FareOptionSession = Flight.attr("data-FareOptionSession");
            let Itinerary = Flight.attr("data-Itinerary");
            let session_key = $("#session_key").val();
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
                        FlightSession: FlightSession,
                        FareOptionSession: FareOptionSession,
                        Itinerary: Itinerary,
                        session_key: session_key,
                    },
                    success: function(result) {
                        $(".page-flight-search .flights .item").has(_this).find(".detail").html(result.html);
                        $(".page-flight-search .flights .item").has(_this).find(".detail").addClass("active");
                    }
                });
            }
        });
        // $("body").on("click",".btn-view-detail",function(e){
        //     var _index = $(this).attr("data-index");
        //     var _this = $(this);
        //     if( $(".page-flight-search .flights .item").has(_this).find(".detail").hasClass("active")){
        //         $(".page-flight-search .flights .item").has(_this).find(".detail").removeClass("active");
        //     }else{
        //         var _airline = _this.attr("data-airline");
        //         var _class = _this.attr("data-class");
        //         $.ajax({
        //             method: "post",
        //             url:"/cassiopeia/ajax",
        //             data: {
        //                 cmd : "get_fare_rules",
        //                 airline : _airline,
        //                 class : _class,
        //             },
        //             success:function(result){
        //                 $(".page-flight-search .flights .item .detail").removeClass("active");
        //                 $(".page-flight-search .flights .item").has(_this).find(".detail .fare-rules").html(result.html);
        //                 $(".page-flight-search .flights .item").has(_this).find(".detail").addClass("active");
        //             }
        //         });
        //     }
        // });
        $("body").on("click",".page-flight-search .flights .item .between>div.flight-number",function(e){
            // $(this).parent().find(".btn-view-detail").click();
        });
        // $("body").on("click",".domestic-search #list-of-flight .btn-view-detail",function(e){
        //     var _index = $(this).attr("data-index");
        //     var _this = $(this);
        //     if( $(".page-flight-search .flights .flight-item").has(_this).find(".detail").hasClass("active")){
        //         $(".page-flight-search .flights .flight-item").has(_this).find(".detail").removeClass("active");
        //         $(".page-flight-search .flights .flight-item").has(_this).find(".detail .fare-rules").html("");
        //     }else{
        //         $(".page-flight-search .flights .flight-item").has(_this).find(".detail").toggleClass("active");
        //     }
        // });
        $("body").on("change", ".page-flight-search input.full_name", function(e) {
            let parent = $("._item").has($(this));
            parent.find("input[name='cid']").val("");
            $(".khtx").removeClass("active");
        });
        $("body").on("click", ".page-flight-search #cassiopeia-user-customer-form button[type='submit']", function(e) {
            let name = $(".page-flight-search #cassiopeia-user-customer-form input[name='name']").val();
            let mail = $(".page-flight-search #cassiopeia-user-customer-form input[name='mail']").val();
            let tel = $(".page-flight-search #cassiopeia-user-customer-form input[name='tel']").val();
            let gender = $(".page-flight-search #cassiopeia-user-customer-form select[name='gender']").val();
            let birthday = $(".page-flight-search #cassiopeia-user-customer-form input[name='birthday']").val();
            let VN = $(".page-flight-search #cassiopeia-user-customer-form input[name='VN']").val();
            let VJ = $(".page-flight-search #cassiopeia-user-customer-form input[name='VJ']").val();
            let QH = $(".page-flight-search #cassiopeia-user-customer-form input[name='QH']").val();
            let VU = $(".page-flight-search #cassiopeia-user-customer-form input[name='VU']").val();

            $.ajax({
                method: "post",
                url: "/cassiopeia/ajax",
                data: {
                    cmd: "createContact",
                    name: name,
                    mail: mail,
                    tel: tel,
                    gender: gender,
                    birthday: birthday,
                    VN: VN,
                    // VJ: VJ,
                    QH: QH,
                    // VU: VU,
                },
                success: function(result) {
                    $.ajax({
                        method: "post",
                        url: "/cassiopeia/ajax",
                        data: {
                            cmd: "get_contacts",
                        },
                        success: function(result) {
                            $(".contacts .block-container").html(result.html);
                            $("#modalCustomer").modal("hide");
                        }
                    });
                }
            });
            return false;
        });
        $("body").on("click", ".page-flight-search .contacts .btn-add-contact", function(e) {
            $("#modalCustomer").modal("show");
            $("#myModal .modal-title").text("Thêm mới khách hàng");
            return false;
        });
        $("body").on("click", ".page-flight-search .contacts .btn-close", function(e) {
            $(".contacts").removeClass("active");
            return false;
        });
        $("body").on("click", ".page-flight-search .contacts ul li", function(e) {
            let _this = $(this);
            let id = _this.attr("data-id");
            let parent = $("._item").has($(this));
            parent.find("input[name='cid']").val(id);
            parent.find("input.full_name").val(_this.attr("data-fullName"));
            if (_this.attr("data-VN") !== undefined) {
                parent.find(".VN input").val(_this.attr("data-VN"));
            }
            // if(_this.attr("data-VJ")!==undefined){
            //     parent.find(".VJ").text("Mã KHTX: "+_this.attr("data-VJ"));
            // }
            if (_this.attr("data-QH") !== undefined) {
                parent.find(".QH input").val(_this.attr("data-QH"));
            }
            // parent.find("").
            if(_this.attr("data-gender")!==""){
                parent.find(".unisex input[value=" + _this.attr("data-gender") + "]").prop("checked", "true");
            }
            // if(_this.attr("data-VU")!==undefined){
            //     parent.find(".VU").text("Mã KHTX: "+_this.attr("data-VU"));
            // }
            // if(_this.attr("data-VU")!==undefined && _this.attr("data-VU")!=""){
            parent.find(".date-of-birth input").val(_this.attr("data-birthday"));
            // }
            $(".contacts").removeClass("active");
            $(".khtx").addClass("active");
            $('body').removeClass('no-scroll');
            return false;

        });
        $("body").on("keyup", ".page-flight-search .contacts .customers>div input", function(e) {
            $(".page-flight-search .contacts ul li").addClass("inactive");
            let a = $(this).val();
            $(".page-flight-search .contacts ul li").each(function(e) {
                let b = $(this).text();
                if (b.toLowerCase().indexOf(a.toLowerCase()) != -1) {
                    $(this).removeClass("inactive");
                }
                // console.log("b",b);
            });
        });
        $("body").on("click", ".page-booking-content-left-items .page-booking-content-left-item.full-name img", function(e) {
            let parent = $("._item").has($(this));
            $.ajax({
                method: "post",
                url: "/cassiopeia/ajax",
                data: {
                    cmd: "get_contacts",
                },
                success: function(result) {
                    parent.find(".contacts .block-container").html(result.html);
                    parent.find(".contacts").addClass("active");
                    $('body').addClass('no-scroll');
                }
            });
        });
        $('body').on('click', '.page-flight-search .contacts .btn-close', function() {
            $('body').removeClass('no-scroll');
            $('.page-flight-search .contacts').removeClass('active');
        });
    });

})(jQuery);
