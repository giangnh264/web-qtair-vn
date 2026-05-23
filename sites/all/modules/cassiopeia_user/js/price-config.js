(function ($) {
    $("document").ready(function(e){
        $(".btn-rs-international-config").click(function (e) {
            if(confirm("Bạn có muốn khôi phục mặc định cho cấu hình phí quốc tế?")){
                $.ajax({
                    method: "post",
                    url:"/cassiopeia/ajax",
                    data: {
                        cmd         : "resetInternationalPriceConfig",
                    },
                    success:function(result){
                        location.reload();
                    }
                });
            }
            return false;
        });
        $(".btn-rs-config").click(function (e) {
            if(confirm("Bạn có muốn khôi phục mặc định?")){
                $.ajax({
                    method: "post",
                    url:"/cassiopeia/ajax",
                    data: {
                        cmd         : "resetPriceConfig",
                    },
                    success:function(result){
                        location.reload();
                    }
                });
            }
            return false;
        });
        $(".block-user-setup .fa-minus").click(function (e) {
            let element = $(this).parent();
            let input = element.find("input");
            let currrentVal = input.val();
            let cleanVal = currrentVal.replace(".","");
            let newVal = cleanVal-25000;
            if(newVal<0){
                newVal=0;
            }
            input.val(formatNumber(newVal.toString()));
            input.trigger("change");
        });
        $(".block-user-setup .fa-plus").click(function (e) {
            let element = $(this).parent();
            let input = element.find("input");
            let currrentVal = input.val();
            let cleanVal = currrentVal.replace(".","");
            let newVal = parseInt(cleanVal)+25000;
            input.val(formatNumber(newVal.toString()));
            input.trigger("change");
        });
        $(".block-user-setup input[type=text]").change(function (e) {
            let _this = $(this);
            let parent = $(".input-parent").has($(this));
            let checkbox = $("input[name='"+parent.attr('data-class')+"']");
            let _form = $("form").has(parent);
            console.log(parent.attr('data-class'));
            if(checkbox.is(":checked")){
                let currentVal = _this.val();
                _form.find(".input-parent[data-class='"+parent.attr('data-class')+"'] input").val(currentVal);
                console.log("checked");
            }
        });
    });
})(jQuery);