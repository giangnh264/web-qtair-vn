(function ($) {
    $("document").ready(function(e){
        if($(".chosen").length){
            $(".chosen").select2();
        }
        $(".btn-ticket-issue").click(function (e) {
            if(confirm("Bạn có chắc chắn muốn thực hiện XUẤT VÉ không?")){
                $(".loading-block").addClass("active");
                var pnr_code = $("input[name='pnr_code']").val();
                var agent = $("select[name='agent']").val();
                $.ajax({
                    method:"POST",
                    url:"/cassiopeia/ajax",
                    data:{
                        cmd:"ticket-issue",
                        pnr_code:pnr_code,
                        agent:agent,
                    },success:function(result){
                        $(".loading-block").removeClass("active");
                        if(result.response=="OK"){
                            alert("Xuất vé thành công!");
                            location.reload();
                        }else{
                            alert(result.message);
                        }
                        location.reload();
                    }
                });
            }
        });
    });
})(jQuery);