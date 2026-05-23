(function ($) {
    $("document").ready(function(e){
        $(".btn-view-log-detail").click(function (e) {
            var id = $(this).attr("data-id");
            $.ajax({
                method:"POST",
                url:"/cassiopeia/ajax",
                data:{
                    cmd:"get_log_detail",
                    id:id,
                },success:function(result){
                    $(".loading-block").removeClass("active");
                    $("#getGiftModal .modal-body").html(result.html);
                    $("#getGiftModal").modal("show");
                }
            });
        });
    });
})(jQuery);