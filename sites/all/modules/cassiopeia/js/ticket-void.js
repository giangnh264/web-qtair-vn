(function ($) {
    $("document").ready(function(e){
       $(".btn-ticket-void").click(function (e) {
            if(confirm("Bạn có chắc chắn muốn thực hiện VOID VÉ không?")){
                $(".loading-block").addClass("active");                
                var pnr_code = $("input[name='pnr_code']").val();
                let checkboxTickets = document.querySelectorAll('input.cbxItemTickets:checked');
                let arrayListTicketNumbers = [];
                let arrayListTicketIndexs = [];
                let totalPrice =0;
                checkboxTickets.forEach(item => {
                    arrayListTicketNumbers.push($(item).attr("data-id"));
                    arrayListTicketIndexs.push($(item).attr("data-index"));
                    totalPrice += parseFloat($(item).attr("data-price"));
                });
                $.ajax({
                    method:"POST",
                    url:"/cassiopeia/ajax",
                    data:{
                        cmd:"ticket-void",
                        pnr_code:pnr_code,
                        listTicketNumbers: arrayListTicketNumbers,
                        listTicketIndexs :arrayListTicketIndexs,
                        totalPrice:totalPrice
                    },success:function(result){
                        $(".loading-block").removeClass("active");
                        if(result.response == "OK"){
                            if(confirm("Void vé thành công!")){
                                location.reload();
                            }
                        }else{
                            alert(result.message);
                        }
                    }
                });
            }
       });
    });
})(jQuery);