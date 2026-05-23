(function ($) {
    function cassiopeia_get_detail_report_tab(){
        $(".loading-block").addClass("active");
        var tab_id = $("#tab-id").attr("data-id");
        var date_filter = $("select[name='date_filter']").val();
        var agent = $("select[name='agent']").val();
        $.ajax({
            method:"POST",
            url:"/cassiopeia/ajax",
            data:{
                cmd:"get-detail-report-tab",
                tab_id:tab_id,
                date_filter:date_filter,
                agent:agent,
            },success:function(result){
                $(".loading-block").removeClass("active");
               $(".result").html(result.html);
            }
        });
    }
    $("document").ready(function(e){
        var date_filter = $("select[name='date_filter']").val();
        if(date_filter!="other"){
            $("#detail-report-tab-7-form .date-picker").hide();
        }else{
            $("#detail-report-tab-7-form .date-picker").show();
        }
        $("select[name='date_filter']").change(function (e) {
            if($(this).val()=="other"){
                $("#detail-report-tab-7-form .date-picker").show();
            }else{
                $("#detail-report-tab-7-form").submit();
            }
        });
        $("#detail-report-tab-7-form .date-picker input").change(function(e){
            var ready = 1;
            $("#detail-report-tab-7-form .date-picker input").each(function (e) {
               if($(this).val()==""){
                   ready=0;
               }
            });
            if(ready==1){
                $("#detail-report-tab-7-form").submit();
            }
        });
        $("div.from-date input").datetimepicker({
            timepicker:false,
            format:'d-m-Y'
        });
        $("div.to-date input").datetimepicker({
            timepicker:false,
            format:'d-m-Y'
        });
        $(".page-detail-report table th").click(function(e){
            var data_sort = $(this).attr("data-sort");
            var order_direction = $("select[name='direction']").val();
            var order_by = $("select[name='order_by']").val();

            console.log(order_by);
            console.log(order_direction);
            console.log(data_sort);
            // return false;
            if(data_sort===""){
                return false;
            }
            if(order_by=="none"){
                $("select[name='order_by']").val(data_sort);
                $("form.filter_form").submit();
            }else{
                if(data_sort==order_by){
                    if(order_direction=='ASC'){
                        $("form.filter_form select[name='direction']").val("DESC");
                    }else{
                        $("form.filter_form select[name='direction']").val("ASC");
                    }
                }else{
                    $("select[name='order_by']").val(data_sort);
                }
                $("form.filter_form").submit();
            }
        });
    });
})(jQuery);