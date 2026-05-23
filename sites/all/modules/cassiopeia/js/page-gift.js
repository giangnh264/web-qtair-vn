(function ($) {
    $("document").ready(function(e){
        $(".gift-type-1").click(function (e) {
            console.log(123);
            var nid = $(this).attr("data-nid");
            $.ajax({
                method:"POST",
                url:"/cassiopeia/ajax",
                data:{
                    cmd:"get_gift_info",
                    nid:nid,
                },success:function(result){
                    $(".loading-block").removeClass("active");
                    $("#getGiftModal .modal-body").html(result.html);
                    $("#getGiftModal").modal("show");
                }
            });
        });
        $("body").on("click",".node-gift .btn-get-gift",function () {
            if(confirm("Bạn có muốn đổi quà tặng này?")){
                var _this = $(this);
                var quantity = _this.parent().find("input").val();
                var nid = $(this).attr("data-nid");
                $.ajax({
                    method:"POST",
                    url:"/cassiopeia/ajax",
                    data:{
                        cmd:"agent-get-gift",
                        nid:nid,
                        quantity:quantity,
                    },success:function(result){
                        $(".loading-block").removeClass("active");
                        if(result.response=="FAIL"){
                            alert(result.message);
                        }else{
                            alert("Đổi điểm thành công");
                            location.reload();
                        }
                    }
                });
            }
        });
    });
})(jQuery);