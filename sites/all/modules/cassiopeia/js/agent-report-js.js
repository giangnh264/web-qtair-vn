(function ($) {
    $("document").ready(function(e){

        let val =  $("select[name='date_filter']").val();
        if(val=="other"){
            $(".date-filter-group").addClass("active");
        }
        $("select[name='date_filter']").change(function (e) {
            let _this = $(this);
            let val = _this.val();
            if(val=="other"){
                $(".date-filter-group").addClass("active");
            }else{
                $(".date-filter-group").removeClass("active");
                $("#cassiopeia-user-agent-filter-form").submit();
            }
        });
        $(".page-agent-report table th").click(function(e){
            var data_sort = $(this).attr("data-sort");
            var order_direction = $("select[name='direction']").val();
            var order_by = $("select[name='order_by']").val();
            if(data_sort==="" || data_sort===undefined){
                return false;
            }
            // console.log(data_sort);
            // return false;
            if(order_by=="none"){
                $("select[name='order_by']").val(data_sort);
                $("#cassiopeia-agent-report-filter-form").submit();
            }else{
                if(order_direction=='ASC'){
                    $("#cassiopeia-agent-report-filter-form select[name='direction']").val("DESC");
                }else{
                    $("#cassiopeia-agent-report-filter-form select[name='direction']").val("ASC");
                }
                $("select[name='order_by']").val(data_sort);
                $("#cassiopeia-agent-report-filter-form").submit();
            }
        });
        $(".btn-excel-export").click(function (e) {
            $("input[name='export']").val(1);
            var code     = $("#cassiopeia-agent-report-filter-form input[name='code']").val();
            var name     = $("#cassiopeia-agent-report-filter-form input[name='name']").val();
            var tel      = $("#cassiopeia-agent-report-filter-form input[name='tel']").val();
            var mail     = $("#cassiopeia-agent-report-filter-form input[name='mail']").val();
            var sale     = $("#cassiopeia-agent-report-filter-form select[name='sale']").val();
            var status   = $("#cassiopeia-agent-report-filter-form input[name='status']").val();

            var _data = {};
            _data['code'] = code;
            _data['name'] = name;
            _data['tel'] = tel;
            _data['mail'] = mail;
            _data['sale'] = sale;
            _data['status'] = status;
            location.href = "/admin/manager/bao-cao-so-du/export?data="+JSON.stringify(_data);
        });
        $(".agent_code").click(function (e) {
            let agentcode = $(this).attr("data-agent-code");
           var data = {"tran_kind":"all","PNR":"","agent":agentcode,"tran_user":"all","content":"","date_filter":"today","from_date":"","to_date":"","page":1,"export":"0"}
           $.ajax({
            method:"POST",
            url:"/cassiopeia/ajax",
            data:{
                cmd:"redirect-link-with-data",
                _data:JSON.stringify(data),
                loadDataFromOtherLink:true
            }
            });
            window.location.href = "/admin/manager/bao-cao-thanh-toan";
        });
    });
})(jQuery);