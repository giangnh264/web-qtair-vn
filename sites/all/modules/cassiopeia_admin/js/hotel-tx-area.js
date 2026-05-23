function cassiopeia_update_weight(){
    let list = [];
    jQuery( ".sortable tr" ).each(function (e) {
        let _this = jQuery(this);
        let id = _this.attr("data-tid");
        list.push(id);
    });
    jQuery.ajax({
        method: "post",
        url: "/cassiopeia_admin/ajax",
        data: {
            cmd: "hotel_tx_area_update_weight",
            list:list,
        },
        success: function(result) {

        }
    });
}
(function ($) {
    $("document").ready(function(e){
        $( ".sortable" ).sortable({
            revert: true,
            stop: function( event, ui ) {
                cassiopeia_update_weight();
            }
        });
        // $.ajax({
        //     method:"POST",
        //     url:"/cassiopeia/ajax",
        //     data:{
        //         cmd:"get-ticket-VJ-review",
        //         airline:airline,
        //         code:code,
        //         itinerary_row:tableArr[tableArr.length-2],
        //         tableArr:JSON.stringify(tableArr),
        //         last_row:last_row,
        //         html:html,
        //     },success:function(result){
        //         $(".loading-block").removeClass("active");
        //         $(".ticket-review-result").show();
        //         $(".ticket-review-result").html(result.html);
        //         if(result.TotalPrice>0){
        //             $(".page-manager-ticket-issue").addClass("active");
        //         }else{
        //             $(".page-manager-ticket-issue").html("");
        //         }
        //     }
        // });
    });
})(jQuery);