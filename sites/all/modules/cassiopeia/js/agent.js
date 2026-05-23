(function ($) {
    $("document").ready(function(e){
        $(".page-user-notify .item").click(function(e){
            var _this = $(this);
            $(this).toggleClass("active");
            if($(this).hasClass("unread")){
                var id = $(this).attr("data-id");
                $.ajax({
                    method:"POST",
                    url:"/cassiopeia/ajax",
                    data:{
                        cmd:"notify-update-status",
                        id:id,
                    },success:function(result){
                        _this.find("img").hide();
                    }
                });
            }
        });
    });
})(jQuery);