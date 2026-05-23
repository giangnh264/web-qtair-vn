(function ($) {
    $("document").ready(function(e){
        if($("select[name='date_filter']").val()=="other"){
            $(".container-inline-date").addClass("active");
        }
        $(".filter_form select[name='date_filter']").change(function(e) {
            var val = $(this).val();
            if (val == "other") {
                $(".container-inline-date").addClass("active");
                return false;
            } else {
                $("#cassiopeia-manager-partners-filter-form").submit();
                $(".container-inline-date").removeClass("active");
            }
        });
        $("body").on("click","td.td-partner-status>div .text-partner-status",function(e){
            $("td.td-partner-status>div ul").removeClass("active");
            $(this).siblings("ul").toggleClass("active");
            e.stopPropagation();
        });
        $("body").click(function(e){
            $("td.td-partner-status>div ul").removeClass("active");
        });
        $(".btn-create").click(function(){
            $("#cassiopeia-agent-price-add-form select[name='agent']").val(0);
            $("#cassiopeia-agent-price-add-form #edit-airline").val('VN');
            $("#cassiopeia-agent-price-add-form #edit-region").val("DO");
            $("#cassiopeia-agent-price-add-form input[name='price']").val(0);
            $("#modal_create_region").css("display","flex");
            $("#modal_create_region").css("align-items","center");
            $("#modal_create_region").modal("show");
        });
        $("body").on("click","td.td-partner-status>div ul li",function(){
            $(".loading-block").addClass("active");
            var _status = $(this).attr("data-status-tid");
            var _uid = $(this).attr("data-partner-id");
            $.ajax({
                method:"POST",
                url:"/cassiopeia/ajax",
                data:{
                    cmd:"partner-change-status",
                    _uid:_uid,
                    _status:_status,

                },success:function(result){
                    alert(result.message);
                    $(".loading-block").removeClass("active");
                    $("td.td-partner-status>div ul").removeClass("active");
                    $(".page-manager-partners tr[data-key="+_uid+"]").html(result.html);
                }
            });
        });
        $(".page-manager-partners select[name='partner-status']").change(function(e){

        });
        $(".btn-ticket-price-delete").click(function(e){
            var _id = $(this).attr("data-id");
            if(confirm("Bạn có chắc chắn muốn xóa?")){
                $.ajax({
                    method: "POST",
                    url:"/cassiopeia/ajax",
                    data:{
                        cmd : "delete_ticket_price" ,
                        _id : _id,
                    },
                    success:function(result){
                        location.reload();
                    }
                });
            }
        });
        $(".btn-agent-fee-delete").click(function(e){
            var _id = $(this).attr("data-id");
            if(confirm("Bạn có chắc chắn muốn xóa?")){
                $.ajax({
                    method: "POST",
                    url:"/cassiopeia/ajax",
                    data:{
                        cmd : "delete_agent_fee" ,
                        _id : _id,
                    },
                    success:function(result){
                        location.reload();
                    }
                });
            }
        });
        $(".btn-ticket-price-edit").click(function(e){
            var _id = $(this).attr("data-id");
            $.ajax({
                method: "POST",
                url:"/cassiopeia/ajax",
                data:{
                    cmd : "get_agent_fee_detail" ,
                    _id : _id,
                },
                success:function(result){
                    $("#cassiopeia-agent-price-add-form select[name='agent']").val(result.response.agent_id);
                    $("#cassiopeia-agent-price-add-form select[name='agent']").trigger("chosen:updated");
                    $("#cassiopeia-agent-price-add-form #edit-airline").val(result.response.airline);
                    $("#cassiopeia-agent-price-add-form #edit-region").val(result.response.region);
                    $("#cassiopeia-agent-price-add-form input[name='price']").val(result.response.value);
                    $("#modal_create_region").css("display","flex");
                    $("#modal_create_region").css("align-items","center");
                    $("#modal_create_region").modal("show");
                }
            });
        });
    });
})(jQuery);