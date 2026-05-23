(function ($) {
    $("document").ready(function(e){
        $(".btn-edit-airline").click(function(e){
            var code = $(this).attr("data-iata");
            $.ajax({
                method:"POST",
                url:"/cassiopeia/ajax",
                data:{
                    cmd:"get_airline_by_code",
                    code : code,
                },
                success:function(result){
                    $("#editModal input[name='code']").val(result.airline.iata);
                    $("#editModal input[name='name']").val(result.airline.name);
                    $("#editModal input[name='type']").val(result.airline.type);
                    $("#editModal .modal-title").text("Cập nhật sân bay");
                    $("#editModal button.btn-update").html("Cập nhật");
                    $("#editModal").modal("show");
                }
            })
        });
        $("#editModal button.btn-update").click(function (e) {
            var code = $("#editModal input[name='code']").val();
            var name = $("#editModal input[name='name']").val();
            var type = $("#editModal input[name='type']").val();
            $.ajax({
                method:"POST",
                url:"/cassiopeia/ajax",
                data:{
                    cmd:"update_airline",
                    code : code,
                    name : name,
                    type : type,
                },
                success:function(result){
                    if(result.response=="OK"){
                        location.reload();
                    }
                    alert(result.message);
                }
            })
        });
        $(".btn-delete-airline").click(function (fe) {
            var code = $(this).attr("data-iata");
            if(confirm("Bạn có muốn xóa hãng này?")){
                $.ajax({
                    method:"POST",
                    url:"/cassiopeia/ajax",
                    data:{
                        cmd:"delete_airline",
                        code : code,
                    },
                    success:function(result){
                        if(result.response=="OK"){
                            location.href = "/admin/manager/test";
                        }
                        alert(result.message);
                    }
                })
            }
        });
        $(".btn-airline-insert").click(function(e){
            $("#editModal .modal-title").text("Thêm mới sân bay");
            $("#editModal button.btn-update").html("Thêm mới");
            $("#editModal").modal("show");
        });
    });
})(jQuery);