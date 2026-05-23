(function ($) {
    function removevnmese(str) {
        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
        str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
        str = str.replace(/đ/g, "d");
        str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
        str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
        str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
        str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
        str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
        str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
        str = str.replace(/Đ/g, "D");
        return str;
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
        $("body").on("change",".noVnmese",function(e){
          $(this).val(removevnmese($(this).val()));
        });
        var IDLE_TIMEOUT = 120; //seconds
        var _idleSecondsTimer = null;
        var _idleSecondsCounter = 0;

        document.onclick = function() {
            _idleSecondsCounter = 0;
        };

        document.onmousemove = function() {
            _idleSecondsCounter = 0;
        };

        document.onkeypress = function() {
            _idleSecondsCounter = 0;
        };

        _idleSecondsTimer = window.setInterval(CheckIdleTime, 1000);

        function CheckIdleTime() {
            _idleSecondsCounter++;
            var oPanel = document.getElementById("SecondsUntilExpire");
            if (oPanel)
                oPanel.innerHTML = (IDLE_TIMEOUT - _idleSecondsCounter) + "";
            if (_idleSecondsCounter >= IDLE_TIMEOUT) {
                window.clearInterval(_idleSecondsTimer);
                // alert("Phiên tìm kiếm đã hết hạn, vui lòng tìm kiếm lại!");
                $(".expired-searching").addClass("active");
            }
        }
        $(".expired-searching .block-container>div:last-child button").click(function(e){
           location.reload();
        });
        $("body").on("click",".page-booking-content-left-payment-container ul.nav-tabs > li > a",function(e){
            var _payment = $(this).attr("data-payment");
            $("input.payment").val(_payment);
            console.log( _payment);
        });
        $("body").on("click","#modal_custom_login .modal_content .modal_header .close",function(e){
           $("#modal_custom_login").removeClass("active");
           location.reload();
        });
        $("body").on("change",".page-booking-content-left-payment .payment-item input",function(e){
           $(".page-booking-content-left-payment .payment-item").removeClass("active");
            $(".page-booking-content-left-payment .payment-item").has($(this)).addClass("active");
        });
        $("body").on("change",".search-flight-block-filter .tax-fee input",function(e){
           var _value  = $(this).val();
           if(_value=="non-tax-fee"){
               $(".price .tax-fee").css("display","none");
               $(".price .non-tax-fee").css("display","block");
           }else{
               $(".price .tax-fee").css("display","block");
               $(".price .non-tax-fee").css("display","none");
           }
        });
        $("body").on("click","#cassiopeia-custom-user-login-form button[type=submit]",function(e){
            var agent_code = $("input[name='agent_code']").val();
            var username = $("input[name='username']").val();
            var password = $("input[name='password']").val();
            var array = new Array();
            array.push(agent_code);
            array.push(username);
            array.push((password));
            $.ajax({
                method:"post",
                url:"/cassiopeia/ajax",
                data:{
                    cmd:"custom_login",
                    data:JSON.stringify(array),
                },
                success:function(result){
                    if(result.status=="OK"){
                        alert(result.message);
                       location.reload();
                    }else{
                        alert(result.message);
                    }
                }
            });
            return false;
        });

        $("body").on("click",".page-booking-content-left-payment-responsive ul li a",function(e){
            $(".page-booking-content-left-payment-responsive ul").removeClass("active");
        });

        $("body").on("click",".page-booking-content-left-payment-responsive>p",function(e){
            $(".page-booking-content-left-payment-responsive ul").addClass("active");
        });
        $("body").on("click",".page-booking-content-left-payment-responsive ul li a",function(e){
            var text = $(this).text();
            $(".page-booking-content-left-payment-responsive p > span").text(text);
        });



        $("body").on("click",".page-flight-search .flight-button button",function(e){
            var data = {};
            var list_flights = {};
            var ReturnDate = $("span.flight-info").attr("data-ReturnDate");
            list_flights['Adt'] = $("span.flight-info").attr("data-Adt");
            list_flights['Chd'] = $("span.flight-info").attr("data-Chd");
            list_flights['Inf'] = $("span.flight-info").attr("data-Inf");
            list_flights['StartPoint']  =    $("span.flight-info").attr("data-StartPoint");
            list_flights['EndPoint']    =    $("span.flight-info").attr("data-EndPoint");
            list_flights['DepartDate']  =    $("span.flight-info").attr("data-DepartDate");
            list_flights['ReturnDate']  =    ReturnDate;
            $.ajax({
                method: "post",
                url:"/cassiopeia/ajax",
                data: {
                    cmd : "pre_booking",
                    search_data : JSON.stringify(list_flights),
                },
                success:function(result){
                    location.href = "/prebooking";
                }
            });
        });
        $("body").on("click",".page-booking-content-left-payment-item-title",function(e){
            $(this).siblings(".page-booking-content-left-payment-item-content").addClass("active");
        });
    });
})(jQuery);
