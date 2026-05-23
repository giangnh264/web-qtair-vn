(function ($) {
    var previous;
    $("#edit-booking-status").on('focus', function () {
        // Store the current value on focus and on change
        previous = this.value;
    }).change(function() {
        let changeStatus = $(this).val();
        let currentObject = $(this);
        if(changeStatus ==3){
            let agentID = $("#agentID").val();
            let balance = $(".partnerPrice").val();
            $.ajax({
                method:"POST",
                url:"/cassiopeia/ajax",
                data:{
                    cmd:"check-available-balance",
                    agentId:agentID,
                    partnerPriceRequest: balance.replaceAll(".","")
                },success:function(result){
                    if (result.message == "FAIL") {
                        alert("Số dư đại ký không đủ, không thể chuyển sang tình trạng đã chốt!");
                        $(currentObject).val(previous);
                    }else{
                        previous = $(this).val();
                    }
                }
            });
        }else{
            previous = $(this).val();
        }
    });
})(jQuery);