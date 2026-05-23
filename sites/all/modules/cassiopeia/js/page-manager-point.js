(function ($) {
    $("document").ready(function(e){
        $(".btn-update-point").click(function (e) {
            if(confirm("Xử lý yêu cầu này?")){
                var id = $(this).attr("data-id");
                $.ajax({
                    method:"POST",
                    url:"/cassiopeia/ajax",
                    data:{
                        cmd:"manager-update-point",
                        id:id,
                    },success:function(result){
                        $(".loading-block").removeClass("active");
                        if(result.response=="FAIL"){
                            alert(result.message);
                        }else{
                            alert("Thao tác thành công");
                            location.reload();
                        }
                    }
                });
            }
        });
    });
})(jQuery);