function cassiopeia_update_weight(){
    let list = [];
    jQuery( ".sortable tr" ).each(function (e) {
        let _this = jQuery(this);
        let nid = _this.attr("data-nid");
        list.push(nid);
    });
    jQuery.ajax({
        method: "post",
        url: "/cassiopeia_admin/ajax",
        data: {
            cmd: "update_weight",
            list:list,
        },
        success: function(result) {

        }
    });
}
(function($) {
    $(document).ready(function() {
        $( ".sortable" ).sortable({
            revert: true,
            stop: function( event, ui ) {
                cassiopeia_update_weight();
            }
        });
        $( "ul, li" ).disableSelection();
        $("body").on("change",".room_status",function (e) {
            var status = 0;
            var roomId = $(this).val();
            if($(this).is(":checked")){
                status = 1;
            }
            jQuery(".loading-block").addClass("active");
            jQuery.ajax({
                method:"post",
                url:"/cassiopeia_admin/ajax",
                data:{
                    cmd:"changeRoomStatus",
                    status:status,
                    roomId:roomId,
                },
                success:function(result){
                    jQuery(".loading-block").removeClass("active");
                }
            });
        });
    });
})(jQuery);