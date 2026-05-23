(function ($) {
    function PrintElem(elem)
    {
        var mywindow = window.open('', 'PRINT', 'height=400,width=600');

        mywindow.document.write('<html><head>');
        mywindow.document.write('</head><body >');
        // mywindow.document.write('<h1>' + document.title  + '</h1>');
        mywindow.document.write(document.getElementById(elem).innerHTML);
        mywindow.document.write(document.getElementById(elem).innerHTML);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10*/

        mywindow.print();
        mywindow.close();

        return true;
    }
    $(document).ready(function(e){
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
                $("form").submit();
            }
        });

        $(".receipt-review .block-container .buttons button").click(function(){
            var _element = $("#print_content").html();
            PrintElem("print_content");
        });
        $(".btn-create-receipts").click(function(e){
            var _booking_code = $(this).attr("data-booking-code");
            $.ajax({
                url:"/cassiopeia/ajax",
                method:"POST",
                data:{
                    cmd : "booking-get-receipts",
                    booking_code : _booking_code,
                },
                success:function(result){
                    $("#modal_receipts_form .form-item-payer input").val(result.payer);
                    $("#modal_receipts_form .form-item-price input").val(result.price);
                    $("#modal_receipts_form .form-item-price-in-words input").val(result.price_in_words);
                    $("#modal_receipts_form .form-item-user input").val(result.user_created);
                    $("#modal_receipts_form").modal("show");
                }
            });
        });
        $("#modal_booking_mail .btn-send-mail").click(function(e){
            $(".loading-block").addClass("active");
            var _mail = $(".delivery-mail").val();
            // var _html =  $("#modal_booking_mail .block-container").html();
            var _booking_code = $(this).attr("data-booking-code");
            var _version = $(this).attr("data-version");
            $.ajax({
                url:"/cassiopeia/ajax",
                method:"POST",
                data:{
                    cmd : "booking-send-mail",
                    _mail : _mail,
                    booking_code : _booking_code,
                    version : _version,
                },
                success:function(result){
                    $(".loading-block").removeClass("active");
                }
            });
        });
        $(".btn-booking-mail").click(function(){
            var _booking_code = $(this).attr("data-booking-code");
            var DO = $(this).attr("data-DO");
            $.ajax({
                url:"/cassiopeia/ajax",
                method:"POST",
                data:{
                    cmd : "booking-get-mail",
                    booking_code : _booking_code,
                    DO : DO,
                },
                success:function(result){
                    $("#modal_booking_mail .block-container").html(result._html);
                    $(".btn-send-mail").attr("data-booking-code",_booking_code);
                    $(".btn-send-mail").attr("data-DO",DO);
                    $("#modal_booking_mail").modal("show");
                }
            });
        });
        $(".btn-booking-update").click(function(e){
            var _booking_code = $(this).attr("data-booking-code");
            $.ajax({
                url:"/cassiopeia/ajax",
                method:"POST",
                data:{
                    cmd : "booking-update-get-detail",
                    booking_code : _booking_code,
                },
                success:function(result){
                    $("#modal_booking_update .booking-code").text(_booking_code);
                    if(jQuery.trim(result._history)==""){
                        $("#modal_booking_update .booking-update-history").html("Chưa có cập nhật");
                    }else{
                        $("#modal_booking_update .booking-update-history").html(result._history);
                    }
                    $("#modal_booking_update select").val(result._status);
                    $("#modal_booking_update .button button").attr("data-booking-code",_booking_code);
                    $("#modal_booking_update").modal("show");
                    console.log(result._status);
                }
            });
        });
        $("#modal_booking_update .button button").click(function(){
            var _booking_code = $(this).attr("data-booking-code");
            var _status = $("#modal_booking_update select").val();
            var _note = $("#modal_booking_update textarea").val();
            $.ajax({
                url:"/cassiopeia/ajax",
                method:"POST",
                data:{
                    cmd : "booking-update-update",
                    status : _status,
                    note : _note,
                    booking_code : _booking_code,
                },
                success:function(result){
                    if(result.message=="FAIL"){
                        alert("Đã xảy ra lỗi!");
                    }else{
                        alert("Cập nhật thành công");
                        $(".page-admin-manager-booking tr[data-booking-code='"+_booking_code+"'] td.booking-status").text(result.status);
                        $("#modal_booking_update").modal("hide");
                    }
                }
            });
        });
    });
})(jQuery);