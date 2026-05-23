(function ($) {
    $("document").ready(function(e){
        $(".btn-airport-update").click(function(e){
            $("#modal_import_airports").modal("show");
        });
        $(".btn-create").click(function(){
            $("#cassiopeia-ticket-price-add-form input[name='id']").val("");
            $("#cassiopeia-ticket-price-add-form select[name='airline']").prop('selectedIndex', 0)
            $("#cassiopeia-ticket-price-add-form select[name='region']").prop('selectedIndex', 0)
            $("#cassiopeia-ticket-price-add-form input[name='price']").val('');
            $("#modal_create_region").css("display","flex");
            $("#modal_create_region").css("align-items","center");
            $("#modal_create_region").modal("show");
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
        $(".btn-ticket-price-edit").click(function(e){
            var _id = $(this).attr("data-id");
            $.ajax({
                method: "POST",
                url:"/cassiopeia/ajax",
                data:{
                    cmd : "get_ticket_price_detail" ,
                    _id : _id,
                },
                success:function(result){
                    $("#cassiopeia-ticket-price-add-form input[name='id']").val(result.response.id);
                    $("#cassiopeia-ticket-price-add-form select[name='airline']").val(result.response.airline);
                    $("#cassiopeia-ticket-price-add-form select[name='region']").val(result.response.region);
                    $("#cassiopeia-ticket-price-add-form input[name='price']").val(result.response.value);
                    $("#modal_create_region").css("display","flex");
                    $("#modal_create_region").css("align-items","center");
                    $("#modal_create_region").modal("show");
                }
            });
        });
    });
})(jQuery);