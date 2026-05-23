(function ($) {
    function cassiopeia_loading_payment_report(page=1){
        $(".loading-block").addClass("active");
        var _tran_kind  = $(".filter-form select[name='tran_kind']").val();
        var _PNR        = $(".filter-form input[name='code']").val();
        var _agent      = $(".filter-form select[name='agent']").val();
        var tran_user      = $(".filter-form select[name='tran_user']").val();
        var _content    = $(".filter-form input[name='content']").val();
        var from_date    = $(".filter-form input[name='from_date']").val();
        var to_date    = $(".filter-form input[name='to_date']").val();
        var _date_filter    = $(".filter-form select[name='date_filter']").val();
        var _export = $("input[name='export']").val();
        var _data = {};
        _data['tran_kind'] = _tran_kind;
        _data['PNR'] = _PNR;
        _data['agent'] = _agent;
        _data['tran_user'] = tran_user;
        _data['content'] = _content;
        _data['date_filter'] = _date_filter;
        _data['from_date'] = from_date;
        _data['to_date'] = to_date;
        _data['page'] = page;
        _data['export'] = _export;
        $.ajax({
            method:"POST",
            url:"/cassiopeia/ajax",
            data:{
                cmd:"load-payment-report",
                _data:JSON.stringify(_data),
            },success:function(result){
                $(".loading-block").removeClass("active");
                $(".page-payment-report .block-items").html(result.html);
            }
        });
    }
    function cassiopeia_add_issue_report(){
        var _html = $(".page-payment-report .block-items tbody").html();
        // return false;
        var tran_kind       = $(".add-form select[name='tran_kind']").val();
        var amount           = $(".add-form input[name='amount']").val();
        var agent           = $(".add-form select[name='agent']").val();
        var content         = $(".add-form input[name='content']").val();
        var date         = $(".add-form input[name='date']").val();
        if(amount.trim()===""){
            alert("Bạn chưa nhập số tiền");
            $(".add-form input[name='amount']").focus();
            return false;
        }
        if(agent=="all"){
            alert("Bạn chưa chọn đại lý");
            $(".add-form select[name='agent']").click();
            return false;
        }
        $(".loading-block").addClass("active");
        var _data = {};
        _data['tran_kind'] = tran_kind;
        _data['agent'] = agent;
        _data['content'] = content;
        _data['amount'] = amount;
        _data['date'] = date;
        $.ajax({
            method:"POST",
            url:"/cassiopeia/ajax",
            data:{
                cmd:"add-paymnent-report",
                _data:JSON.stringify(_data),
            },success:function(result){
                $(".loading-block").removeClass("active");
                $(".add-form input[name='amount']").val('');
                $(".add-form select[name='agent']").val();
                $(".add-form input[name='content']").val('');
                $(".page-payment-report .block-items tbody").prepend(result.html);
                // $(".page-payment-report .block-items").html(result.html);
            }
        });
    }
    $("document").ready(function(e){
        $(".btn-add-report").click(function (e) {
            $(".add-block").toggleClass("active");
            if($(".btn-add-report i").hasClass("fa-plus")){
                $(".btn-add-report i").addClass("fa-minus").removeClass("fa-plus");
            }else{
                $(".btn-add-report i").removeClass("fa-minus").addClass("fa-plus");
            }
            return false;
        });
        $(".btn-excel-export").click(function (e) {

            $("input[name='export']").val(1);
            var _tran_kind  = $(".filter-form select[name='tran_kind']").val();
            var _PNR        = $(".filter-form input[name='code']").val();
            var _agent      = $(".filter-form select[name='agent']").val();
            var tran_user      = $(".filter-form select[name='tran_user']").val();
            var _content    = $(".filter-form input[name='content']").val();
            var from_date    = $(".filter-form input[name='from_date']").val();
            var to_date    = $(".filter-form input[name='to_date']").val();
            var _date_filter    = $(".filter-form select[name='date_filter']").val();
            var _export = $("input[name='export']").val();
            var _data = {};
            _data['tran_kind'] = _tran_kind;
            _data['PNR'] = _PNR;
            _data['agent'] = _agent;
            _data['tran_user'] = tran_user;
            _data['content'] = _content;
            _data['date_filter'] = _date_filter;
            _data['from_date'] = from_date;
            _data['to_date'] = to_date;
            _data['page'] = page;
            _data['export'] = _export;
            location.href = "/admin/manager/payment/export?data="+JSON.stringify(_data);
        });
        $(".btn-update-report").click(function (e) {
            $("#modalUpdateReport").addClass("active");
        });
        $("#modalUpdateReport .block-dialog .block-header .close").click(function (e) {
            $("#modalUpdateReport").removeClass("active");
        });
        $("#modalUpdateReport button").click(function(e){

            var agent = $("#modalUpdateReport select[name='agent']").val();
            var tran_code = $("#modalUpdateReport input[name='tran_code']").val();
            if(agent==="all"){
                alert("Vui lòng chọn Đại lý!");
                return false;
            }
            $(".loading-block").addClass("active");
            $.ajax({
                method:"POST",
                url:"/cassiopeia/ajax",
                data:{
                    cmd:"update-report",
                    tran_code:tran_code,
                    agent:agent,
                },success:function(result){
                    $(".loading-block").removeClass("active");
                    $(".btn-filter-payment-report").click();
                }
            });
        });
        $("body").on("click",".btn-delete-report",function(e){
            var _this = $(this);
            var tran_code = $(this).attr("data-tran-code");
            if(confirm("Bạn có muốn xóa dữ liệu này, không thể hoàn tác sau khi thực hiện!")){
                $(".loading-block").addClass("active");
                $.ajax({
                    method:"POST",
                    url:"/cassiopeia/ajax",
                    data:{
                        cmd:"delete-report",
                        tran_code:tran_code,
                    },success:function(result){
                        $(".loading-block").removeClass("active");
                        if(result.response=="OK"){
                            $(".report-items tr").has(_this).hide();
                        }
                    }
                });
            }
        });
        $(".page-payment-report div.from-date input").datetimepicker({
            timepicker:false,
            format:'d-m-Y'
        });
        $(".page-payment-report div.to-date input").datetimepicker({
            timepicker:false,
            format:'d-m-Y'
        });
        $(".page-payment-report .add-form .date input").datetimepicker({
            timepicker:false,
            format:'d-m-Y',
            minDate:'-1970/01/31',
        });
        // $(".page-payment-report div.from-date input").change(function(e){
        //     cassiopeia_loading_payment_report();
        // });
        // $(".page-payment-report div.to-date").datepicker();
        cassiopeia_loading_payment_report();
        $(".btn-add-payment-report").click(function(e){
            cassiopeia_add_issue_report();
        });
        // $(".filter-form select").change(function(e){
        //     cassiopeia_loading_payment_report();
        // });
        $(".filter-form select[name='date_filter']").change(function(e){
            var val = $(this).val();
            if(val=="other"){
                $(".page-payment-report div.from-date").addClass("active");
                $(".page-payment-report div.to-date").addClass("active");
                return false;
            }else{
                $(".page-payment-report div.from-date").removeClass("active");
                $(".page-payment-report div.to-date").removeClass("active");
            }
            cassiopeia_loading_payment_report();
        });
        $(".filter-form select[name='agent']").change(function(e){
            cassiopeia_loading_payment_report();
        });
        $(".filter-form select[name='tran_user']").change(function(e){
            cassiopeia_loading_payment_report();
        });
        $(".filter-form select[name='tran_kind']").change(function(e){
            cassiopeia_loading_payment_report();
        });
        $(".filter-form input").keypress(function(event) {
            if (event.keyCode == 13) {
                cassiopeia_loading_payment_report();
            }
        });
        $(".btn-filter-payment-report").click(function(e){
            cassiopeia_loading_payment_report();
        });
        $("body").on("click",".ajax-item",function(e){
            $("#current-page").attr('data-page',$(this).attr("data-page"));
            var page = $("#current-page").attr('data-page');
            cassiopeia_loading_payment_report(page);
            return false;
        })
    });
})(jQuery);