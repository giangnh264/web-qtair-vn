function getRoomBooking(page) {
    jQuery(".loading-block").addClass("active");
    let date_filter = jQuery(".page-manager-room-booking select[name='date_filter']").val();
    let agent = jQuery(".page-manager-room-booking select[name='agent']").val();
    let checkin = jQuery(".page-manager-room-booking input[name='checkin[date]']").val();
    let tx_area = jQuery(".page-manager-room-booking select[name='tx_area']").val();
    let status = jQuery(".page-manager-room-booking select[name='status']").val();
    let from_date = jQuery(".page-manager-room-booking input[name='from_date[date]']").val();
    let to_date = jQuery(".page-manager-room-booking input[name='to_date[date]']").val();
    let hotel = jQuery(".page-manager-room-booking input[name='hotel']").val();

    var data = {};
    data['date_filter'] = date_filter;
    data['agent'] = agent;
    data['checkin'] = checkin;
    data['tx_area'] = tx_area;
    data['from_date'] = from_date;
    data['to_date'] = to_date;
    // data['booking_code'] = booking_code;
    // data['code'] = code;
    data['status'] = status;
    // data['agent'] = agent;
    data['hotel'] = hotel;

    data['page'] = page;
    console.log(data);
    jQuery.ajax({
        method: "post",
        url: "/cassiopeia/ajax",
        data: {
            cmd: "adminGetRoomBooking",
            data: JSON.stringify(data),
        },
        success: function(result) {
            jQuery(".page-manager-room-booking .result").html(result.html);
            jQuery(".loading-block").removeClass("active");
        }
    });
}

(function($) {
    var date = new Date();
    var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
    var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
    // $('input.date-range-custom').daterangepicker({
    //     "autoApply": true,
    //     "startDate": firstDay,
    //     "endDate": lastDay,
    //     locale: {
    //         format: 'DD/MM/YYYY'
    //     }
    // }, function(start, end, label) {
    //     console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
    // });
    $(document).ready(function() {
        $("input[name='hotel']").change(function(e) {
            getRoomBooking();
        })
        $("input[name='checkin[date]']").change(function(e) {
            getRoomBooking();
        })
        $("input[name='from_date[date]']").change(function(e) {
            getRoomBooking();
        })
        $("input[name='to_date[date]']").change(function(e) {
            getRoomBooking();
        })
        $("select[name='agent']").change(function(e) {
            getRoomBooking();
        })
        $("select[name='tx_area']").change(function(e) {
            getRoomBooking();
        })
        $("select[name='status']").change(function(e) {
            getRoomBooking();
        })
        let val =  $("select[name='date_filter']").val();
        if(val=="other"){
            $(".date-filter-group").addClass("active");
        }
        $("select[name='date_filter']").change(function (e) {
            let _this = $(this);
            let val = _this.val();
            if(val=="other"){
                $(".date-filter-group").addClass("active");
            }else{
                $(".date-filter-group").removeClass("active");
                getRoomBooking();
            }
        });
        $("#modal_booking_update .button button").click(function() {
            var _booking_code = $(this).attr("data-booking-code");
            var _status = $("#modal_booking_update select").val();
            var _note = $("#modal_booking_update textarea").val();
            $.ajax({
                url: "/cassiopeia/ajax",
                method: "POST",
                data: {
                    cmd: "room-booking-update-update",
                    status: _status,
                    note: _note,
                    booking_code: _booking_code,
                },
                success: function(result) {
                    if (result.message == "NOTENOUGH") {
                        alert("Số dư đại lý không đủ!");
                    } else if (result.message == "FAIL") {
                        alert("Đã xảy ra lỗi!");
                    } else {
                        alert("Cập nhật thành công");
                        $(result.status).replaceAll(".page-manager-room-booking td[data-code='" + _booking_code + "']");
                        // $(".page-manager-room-booking td[data-code='"+_booking_code+"']").text(result.status);
                        $("#modal_booking_update").modal("hide");
                    }
                }
            });
        });
        $("body").on("click", ".btn-booking-update", function(e) {
            var _booking_code = $(this).attr("data-booking-code");
            $.ajax({
                url: "/cassiopeia/ajax",
                method: "POST",
                data: {
                    cmd: "room-booking-update-get-detail",
                    booking_code: _booking_code,
                },
                success: function(result) {
                    $("#modal_booking_update .booking-code").text(_booking_code);
                    if (jQuery.trim(result._history) == "") {
                        $("#modal_booking_update .booking-update-history").html("Chưa có cập nhật");
                    } else {
                        $("#modal_booking_update .booking-update-history").html(result._history);
                    }
                    $("#modal_booking_update select").val(result._status);
                    $("#modal_booking_update .button button").attr("data-booking-code", _booking_code);
                    $("#modal_booking_update").modal("show");
                    console.log(result._status);
                }
            });
        });
        $("body").on("click", ".ajax-item", function(e) {
            $("#current-page").attr('data-page', $(this).attr("data-page"));
            var page = $("#current-page").attr('data-page');
            getRoomBooking(page);
            return false;
        })
        getRoomBooking();
        // $(".date-picker").datetimepicker({
        //     format:'d/m/Y',
        //     timepicker:false,
        // });
    });
    Drupal.behaviors.manager_hotel = {
        attach: function() {
            // $("body").on("change",".page-manager-room-booking .change-status",function(){
            //     var _status = $(this).val();
            //     var booking_code = $(this).attr("data-code");
            //     jQuery(".loading-block").addClass("active");
            //     jQuery.ajax({
            //         method:"post",
            //         url:"/cassiopeia/ajax",
            //         data:{
            //             cmd:"changeRoomBookingStatus",
            //             booking_code:booking_code,
            //             status:_status,
            //         },
            //         success:function(result){
            //             jQuery(".loading-block").removeClass("active");
            //             location.reload();
            //         }
            //     });
            // });
            var typingTimer;
            var doneTypingInterval = 150;
            // $(".page-manager-room-booking .filter-form select").change(function(e){
            //     getRoomBooking();
            // });
            $(".page-manager-room-booking .filter-form input.changed").change(function(e) {
                var _this = $(this);
                var key = _this.val().trim();
                if (key.trim() != "") {
                    clearTimeout(typingTimer);
                    typingTimer = setTimeout(getRoomBooking, doneTypingInterval);
                    e.stopPropagation();
                }
            });
            $(".page-manager-room-booking .filter-form input").keyup(function(e) {
                var _this = $(this);
                var key = _this.val().trim();
                clearTimeout(typingTimer);
                typingTimer = setTimeout(getRoomBooking, doneTypingInterval);
                e.stopPropagation();
            });
            $(".page-manager-room-booking .filter-form input").on('keydown', function() {
                clearTimeout(typingTimer);
            });

        }
    };
})(jQuery);