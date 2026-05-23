(function ($) {
    $("document").ready(function(e){
       var html = $(".result").html();
       var flight = $(".flights").html();
       var first_row = $(".result table#guestTable").html();
       var last_row = $(".result table:last-child").html();
       console.log(first_row);
        $.ajax({
            method:"POST",
            url:"/cassiopeia/ajax",
            data:{
                cmd:"get-ticket-QH",
                html:html,
                flight:flight,
                first_row:first_row,
                last_row:last_row,
            },success:function(result){
                $(".loading-block").removeClass("active");
                $(".result").html(result.html);
            }
        });
    });
})(jQuery);