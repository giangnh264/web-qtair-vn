function loadCustomer(){
    let name = jQuery("input[name='name']").val().trim();
    // let tel = jQuery("input[name='tel']").val().trim();
    // let code = jQuery("input[name='code']").val().trim();
    // let note = jQuery("input[name='note']").val().trim();
    // let type = jQuery("input[name='type']").val().trim();
    let data = {};
    data['name'] = name;
    // data['tel'] = tel;
    // data['code'] = code;
    // data['note'] = note;
    data['type'] = type;
    jQuery.ajax({
        method:"POST",
        url:"/cassiopeia/ajax",
        data:{
            cmd:"load-customer",
            data:JSON.stringify(data)
        },success:function(result){
            jQuery(".result").html(result.html);
        }
    });
}
(function ($) {
    $(document).ready(function(e){
        loadCustomer();
        var typingTimer;
        var doneTypingInterval = 500;
        $("input[type=text]").keyup(function(e){
            var _this = $(this);
            var key = _this.val().trim();
            clearTimeout(typingTimer);
            typingTimer = setTimeout(loadCustomer(), doneTypingInterval);
            e.stopPropagation();
        });
        $("input[type=text]").on('keydown', function () {
            clearTimeout(typingTimer);
        });
        $("body").on("click",".btn-delete",function (e) {
            if(confirm("Bạn có muốn xóa khách hàng này?")){
                let id = $(this).attr("data-id");
                $.ajax({
                    method:"POST",
                    url:"/cassiopeia/ajax",
                    data:{
                        cmd:"delete_customer",
                        id:id,
                    },success:function(result){
                        alert(result.message);
                        location.reload();
                    }
                });
            }
        });
        $(".btn-add").click(function (e) {
            $("#myModal").modal("show");
            $("#myModal .modal-title").text("Thêm mới khách hàng");
            $("#myModal input[name='id']").val("");
            $("#myModal input[name='FullName']").val("");
            $("#myModal input[name='Email']").val('');
            $("#myModal input[name='Phone']").val("");
            $("#myModal input[name='VN']").val("");
            $("#myModal input[name='VJ']").val("");
            $("#myModal input[name='QH']").val("");
            $("#myModal input[name='VU']").val("");
            $(".form-buttons").show();
        });
        $("body").on("click",".btn-edit",function (e) {
            $(".loading-block").addClass("active");
            let id = $(this).attr("data-id");
            $.ajax({
                method:"POST",
                url:"/cassiopeia/ajax",
                data:{
                    cmd:"get-customer-detail",
                    id:id,
                },success:function(result){
                    $(".loading-block").removeClass("active");
                    $("#myModal").modal("show");
                    $("#myModal .modal-title").text("Chỉnh sửa khách hàng");
                    $("#myModal input[name='id']").val(result.response.id);
                    if(result.response.FullName!==""){
                        $("#myModal input[name='FullName']").val(result.response.name);
                    }
                    if(result.response.Email!==""){
                        $("#myModal input[name='Email']").val(result.response.mail);
                    }
                    if(result.response.Phone!==""){
                        $("#myModal input[name='Phone']").val(result.response.tel);
                    }
                    if(result.response.VN!==""){
                        $("#myModal input[name='VN']").val(result.response.VN);
                    }
                    if(result.response.VJ!==""){
                        $("#myModal input[name='VJ']").val(result.response.VJ);
                    }
                    if(result.response.QH!==""){
                        $("#myModal input[name='QH']").val(result.response.QH);
                    }
                    if(result.response.VU!==""){
                        $("#myModal input[name='VU']").val(result.response.VU);
                    }
                    if(result.response.birthday!==""){
                        $("#myModal .birthday input").val(result.response.birthday);
                    }else{
                        $("#myModal .birthday input").val("");
                    }
                    if(result.response.note!==""){
                        $("#myModal textarea[name='note']").val(result.response.note);
                    }
                    $("#myModal select[name='gender']").val(result.response.gender);
                    if(result.access==true){
                        // $(".form-buttons").show();
                    }else{
                        // $(".form-buttons").hide();
                    }
                    console.log(result);
                }
            });
        });
    });
})(jQuery);