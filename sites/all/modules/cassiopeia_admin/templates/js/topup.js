(function($) {
    $(document).ready(function() {
        $("#btnRejectTopup").click(function (e) {            
            $(".loading-block").addClass("active");
            let id =  $("#inpDataIdRejectToup").val();
            let resonReject = $("#FormControlTextareaRejectTopup").val();
            let btnReprocess = document.getElementById('inpDataIdReprocess').checked == true;
            $.ajax({
                method:"POST",
                url:"/cassiopeia/ajax",
                data:{
                    cmd:"get-reject-topup-form",
                    id:id,
                    detail: resonReject,
                    btnReprocess: btnReprocess
                },success:function(result){
                    $("#modalRejectTopup").modal("toggle");            
                    $("#inpDataIdRejectToup").val(null);
                    $("#FormControlTextareaRejectTopup").val(null);
                    document.getElementById('inpDataIdReprocess').checked = false;   
                    let arrayIDs = id.split(';');
                    arrayIDs.forEach(item => {                        
                        $("tr[data-id='"+item+"']").find(".status").addClass("topup-status-2");
                        $("tr[data-id='"+item+"']").find(".status").text("Từ chối");
                        $("tr[data-id='"+item+"']").find(".tran_user").html(result.tran_user);
                        $("input.cbxItem[data-id='"+item+"']").prop("checked", false);
                    })                    
                    $(".loading-block").removeClass("active");
                    alert(result.message);
                },error: function () {
                    $("#modalRejectTopup").modal("toggle");            
                    $("#inpDataIdRejectToup").val(null);
                    $("#FormControlTextareaRejectTopup").val(null);
                    document.getElementById('inpDataIdReprocess').checked = false;  
                    $(".loading-block").removeClass("active");
                    alert("Có lỗi phát sinh trong quá trình thao tác, vui lòng thử lại");
                }
            });
        });
        $(".btn-reject-topup").click(function (e) {
            $("#inpDataIdRejectToup").val($(this).attr("data-id"));
            $("#modalRejectTopup").modal("toggle");
            document.getElementById('inpDataIdReprocess').checked = true;
        });
        $("select[name='status']").change(function (e) {
            let _this = $(this);
            let status = _this.val();
            let id = _this.attr("data-id");
            let original_value = _this.attr("data-original-value");
            if(status === 1 || status === "1"){
                
                if(confirm("Bạn có muốn cập nhật yêu cầu này?")){
                    $.ajax({
                        method:"POST",
                        url:"/cassiopeia/ajax",
                        data:{
                                cmd:"update-topup-status",
                            id:id,
                            status:status,

                        },success:function(result){
                            alert(result.message);
                            $("tr[data-id='"+id+"']").find(".status").text("Đã duyệt");
                            $("tr[data-id='"+id+"']").find(".actions").html("");
                            $("tr[data-id='"+id+"']").find(".tran_user").html(result.tran_user);
                        }
                    });
                }else{
                    $("select[name='status']").val(original_value);
                }
            }else if(status === 2 || status === "2"){
                $("#inpDataIdRejectToup").val(id);
                $("#modalRejectTopup").modal("toggle");
            }else{}
        });
        $("#modalRejectTopup .close").click(function (e) {
            let id =  $("#inpDataIdRejectToup").val();           
            $("#inpDataIdRejectToup").val(null);
            $("tr[data-id='"+id+"'] .status select").val(0);
            document.getElementById('inpDataIdReprocess').checked = false;   
        });
        $("#inpcbxAllItems.cbxAllItems").change(function (e) {
            if($("#inpcbxAllItems").prop("checked")){
                $(".cbxItem").prop("checked", true);
            }else{
                $(".cbxItem").prop("checked", false);
            }
        });
        $("#actRejectList").click(function (e) {
            let checkboxes = document.querySelectorAll('input.cbxItem:checked');
            let arrayListID = [];
            checkboxes.forEach(item => arrayListID.push($(item).attr("data-id")));
            $("#inpDataIdRejectToup").val(arrayListID.join(';'));
            $("#modalRejectTopup").modal("toggle");
        });
    });
})(jQuery);