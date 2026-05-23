
function getRoomBookingReport(page){
    jQuery(".loading-block").addClass("active");
    let agent = jQuery(".page-manager-room-booking-report select[name='agent']").val();
    let date_filter = jQuery(".page-manager-room-booking-report select[name='date_filter']").val();
    let tran_user = jQuery(".page-manager-room-booking-report select[name='tran_user']").val();
    let booking_code = jQuery(".page-manager-room-booking-report input[name='booking_code']").val();
    let hotel = jQuery(".page-manager-room-booking-report input[name='hotel']").val();
    let from_date = jQuery(".page-manager-room-booking-report input[name='from_date[date]']").val();
    let to_date = jQuery(".page-manager-room-booking-report input[name='to_date[date]']").val();
    let data = {};
    data['agent'] = agent;
    data['booking_code'] = booking_code;
    data['date_filter'] = date_filter;
    data['tran_user'] = tran_user;
    // data['status'] = status;
    // data['agent'] = agent;
    data['hotel'] = hotel;
    data['from_date'] = from_date;
    data['to_date'] = to_date;

    data['page'] = page;
    console.log(data);
    jQuery.ajax({
        method:"post",
        url:"/cassiopeia/ajax",
        data:{
            cmd:"adminGetRoomBookingReport",
            data:JSON.stringify(data),
        },
        success:function(result){
            jQuery(".page-manager-room-booking-report .result").html(result.html);
            jQuery(".loading-block").removeClass("active");
        }
    });
}

(function ($) {
    function cassiopeia_add_room_report(){
        // var hotel         = $(".add-form select[name='hotel']").val();
        var tran_kind       = $("#cassiopeia-room-booking-report-add-form select[name='tran_kind']").val();
        var code            = $("#cassiopeia-room-booking-report-add-form input[name='code']").val();
        var partner_price   = $("#cassiopeia-room-booking-report-add-form input[name='partner_price']").val();
        var price           = $("#cassiopeia-room-booking-report-add-form input[name='price']").val();
        var agent           = $("#cassiopeia-room-booking-report-add-form select[name='agent']").val();
        var content         = $("#cassiopeia-room-booking-report-add-form input[name='content']").val();
        var date            = $("#cassiopeia-room-booking-report-add-form input[name='tran_date[date]']").val();
        if(code.trim()===""){
            alert("Bạn chưa nhập code");
            $(".add-form input[name='code']").focus();
            return false;
        }
        if(agent=="all"){
            alert("Bạn chưa chọn đại lý");
            $(".add-form select[name='agent']").click();
            return false;
        }
        $(".loading-block").addClass("active");
        var _data = {};
        // _data['airline'] = airline;
        _data['tran_kind'] = tran_kind;
        _data['booking_code'] = code;
        // _data['quantity'] = quantity;
        _data['partner_price'] = partner_price;
        _data['price'] = price;
        _data['date'] = date;
        _data['agent'] = agent;
        _data['note'] = content;
        $.ajax({
            method:"POST",
            url:"/cassiopeia_admin/ajax",
            data:{
                cmd:"add_room_booking_report",
                _data:JSON.stringify(_data),
            },success:function(result){
                $(".loading-block").removeClass("active");
                // $(".add-form input[name='PNR']").val('');
                // $(".add-form input[name='quantity']").val(0);
                // $(".add-form input[name='partner_price']").val(0);
                // $(".add-form select[name='agent']").val();
                // $(".add-form input[name='content']").val('');
                getRoomBookingReport();
            }
        });
    }
    $(document).ready(function () {
        $("#cassiopeia-room-booking-report-add-form button").click(function(e){
            cassiopeia_add_room_report();
            return false;
        });
        $(".add-form input").keyup(function(e){
            if(e.keyCode==13){
                cassiopeia_add_room_report();
            }
        });
        $("body").on("click",".ajax-item",function(e){
            $("#current-page").attr('data-page',$(this).attr("data-page"));
            var page = $("#current-page").attr('data-page');
            getRoomBookingReport(page);
            return false;
        })
        getRoomBookingReport();
        $(".date-picker").datetimepicker({
            format:'d/m/Y',
            timepicker:false,
        });
    });
    Drupal.behaviors.manager_hotel = {
        attach: function () {
            var typingTimer;
            var doneTypingInterval = 150;
            $(".filter-form button").click(function (e) {
                getRoomBookingReport();
                return false;
            });
            // $("input[name='from_date[date]']").change(function (e) {
            //     getRoomBookingReport();
            // })
            // $("input[name='to_date[date]']").change(function (e) {
            //     getRoomBookingReport();
            // })
            $(".page-manager-room-booking-report .filter-form select").change(function(e){
                // getRoomBookingReport();
            });
            $("select[name='date_filter']").change(function (e) {
                let _this = $(this);
                let val = _this.val();
                if(val=="other"){
                    $(".date-filter-group").addClass("active");
                }else{
                    $(".date-filter-group").removeClass("active");
                }
            });
            $(".page-manager-room-booking-report .filter-form input.changed").change(function(e){
                var _this = $(this);
                var key = _this.val().trim();
                if(key.trim()!=""){
                    clearTimeout(typingTimer);
                    typingTimer = setTimeout(getRoomBookingReport, doneTypingInterval);
                    e.stopPropagation();
                }
            });
            $(".page-manager-room-booking-report .filter-form input").keyup(function(e){
                var _this = $(this);
                var key = _this.val().trim();
                clearTimeout(typingTimer);
                typingTimer = setTimeout(getRoomBookingReport, doneTypingInterval);
                e.stopPropagation();
            });
            $(".page-manager-room-booking-report .filter-form input").on('keydown', function () {
                clearTimeout(typingTimer);
            });

        }
    };
})(jQuery);