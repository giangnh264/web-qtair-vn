(function ($) {
    $("document").ready(function(e){
       $(".btn-add-baggage").click(function(e){
           $("#modal_baggage .modal-title").text("Thêm mới hành lý");
           $("#modal_baggage button[type=submit]").text("Thêm mới");
            $("#modal_baggage").modal("show");
       });
       $(".btn-edit-baggage").click(function (e) {
          var id = $(this).attr("data-id");
          var airline = $(this).attr("data-airline");
          var price = $(this).attr("data-price");
          var weight = $(this).attr("data-weight");
          $("#modal_baggage select[name='airline']").val(airline);
          $("#modal_baggage input[name='price']").val(price);
          $("#modal_baggage input[name='weight']").val(weight);
          $("#modal_baggage input[name='id']").val(id);
          $("#modal_baggage button[type=submit]").text("Cập nhật");
           $("#modal_baggage .modal-title").text("Cập nhật hành lý");
           $("#modal_baggage").modal("show");
       });
        $(".btn-delete-baggage").click(function(e){
            var _id = $(this).attr("data-id");
            if(confirm("Bạn có chắc chắn muốn xóa?")){
                $.ajax({
                    method: "POST",
                    url:"/cassiopeia/ajax",
                    data:{
                        cmd : "delete_baggage" ,
                        _id : _id,
                    },
                    success:function(result){
                        location.reload();
                    }
                });
            }
        });
    });
})(jQuery);