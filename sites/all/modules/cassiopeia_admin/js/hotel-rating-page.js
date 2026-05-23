(function ($) {
    $("document").ready(function(e){
        $(".btn-view-comment").click(function (e) {
           let comment = $(this).attr("data-comment");
            $.dialog({
                title: null,
                content: comment
            });
        });
        $("input[name='all']").change(function (e) {
           let _this = $(this);
           if(_this.is(":checked")){
               $("input:checkbox[name=rating-id]").prop("checked",true);
           }else{
               $("input:checkbox[name=rating-id]").prop("checked",false);
           }
        });
        $(".btn-change-status-all").click(function (e) {
            e.stopPropagation();
            var array = [];
            $("input:checkbox[name=rating-id]:checked").each(function() {
                array.push($(this).val());
            });
            if(array.length>0){
                let a = $.confirm({
                    title: '',
                    content: 'Bạn có muốn duyệt tất cả các đánh giá đã chọn?',
                    buttons: {
                        accept: {
                            text: 'OK',
                            btnClass: 'btn-default',
                            action: function () {
                                jQuery.ajax({
                                    method:"post",
                                    url:"/cassiopeia_admin/ajax",
                                    data:{
                                        cmd:"hotel-ratings-status-change",
                                        ids:JSON.stringify(array),
                                    },
                                    success:function(result){
                                        let a = $.confirm({
                                            title: '',
                                            content: result.message,
                                            buttons: {
                                                cancel: {
                                                    text: 'OK',
                                                    btnClass: 'btn-default',
                                                    action: function () {
                                                        location.reload();
                                                    }
                                                },
                                            }
                                        });
                                    }
                                });
                            }
                        },
                        cancel: {
                            text: 'Hủy',
                            btnClass: 'btn-default',
                            action: function () {
                                // a.close();
                            }
                        },
                    }
                });
            }else{
                $.dialog({
                    title: null,
                    content: "Bạn chưa chọn mục nào!"
                });
            }
            return false;
        });
        $("select[name='rating-status']").change(function (e) {
            let id = $(this).attr("data-id");
            let status = $(this).val();
            jQuery.ajax({
                method:"post",
                url:"/cassiopeia_admin/ajax",
                data:{
                    cmd:"hotel-rating-status-change",
                    id:id,
                    status:status,
                },
                success:function(result){
                    $.dialog({
                        title: null,
                        content: result.response
                    });
                }
            });
        });
    });
})(jQuery);