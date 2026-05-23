(function($) {
    function send_booking() {
        $(".loading-block").addClass("active");
        let payment = $("input[name='payment']:checked").val();
        let bank = $("input[name='bank']:checked").val();

        $.ajax({
            method: "post",
            url: "/cassiopeia/ajax",
            data: {
                cmd: "booking_submit_meta",
                payment: payment,
                bank: bank
            },
            success: function(result) {
                if (result.status === "OK") {
                    $(".page-flight-search .page-top-block .step>div").removeClass("active");
                    $(".page-flight-search .page-top-block .step>div.step-3").addClass("active");
                    location.href = result.return_url;
                } else {
                    alert(result.message);
                }
                $(".loading-block").removeClass("active");
            },
            error: function() {
                alert("Đã xảy ra lỗi trong quá trình đặt vé, vui lòng thử lại sau!");
            },

            timeout: 120000 // sets timeout to 3 seconds
        });
    }
    $(document).ready(function (e) {
        $("body").on("click", ".booking-payment .btn-payment", function(e) {
            let payment = $("input[name='payment']:checked").val();

            if (payment == 3) {
                $.ajax({
                    method: "post",
                    url: "/cassiopeia/ajax",
                    data: {
                        cmd: "checkBalance",
                    },
                    success: function(result) {
                        if (result.response == "OK") {
                            send_booking();
                        } else {
                            $("#modalTopUp").modal("show");
                        }
                    }
                });
            } else {
                send_booking();
            }
        });
        $(".btn-top-up-request").click(function (e) {
            let bank = $("#modalTopUp input[name='bank']:checked").val();
            console.log("bank",bank);
            $.ajax({
                url:"/cassiopeia/ajax",
                method:"POST",
                data:{
                    cmd : "user-top-up-request",
                    bank : bank,
                },
                success:function(result){
                    $("#modalTopUp").modal("hide");
                    alert(result.message);
                }
            });
        });
    });
})(jQuery);