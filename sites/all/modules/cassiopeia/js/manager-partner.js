(function($) {
    $(document).ready(function(e) {
        $("select[name='sale']").change(function (e) {
            let _this = $(this);
            let default_value = _this.attr("data-default");
            if(confirm("Bạn có muốn thay đổi sale cho đại lý này?")){
                let uid = $(this).attr("data-uid");
                let sale = $(this).val();
                $.ajax({
                    method: "post",
                    url: "/cassiopeia/ajax",
                    data: {
                        cmd: "manager-change-sale",
                        uid:uid,
                        sale:sale,
                    },
                    success: function(result) {
                        _this.attr("data-default",sale);
                        alert(result.message);
                    }
                });
            }else{
                _this.val(default_value);
                return;
            }
        });
    });
})(jQuery);