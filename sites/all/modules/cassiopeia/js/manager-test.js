(function ($) {
    function cassiopeia_loading_payment_report(){
        $(".loading-block").addClass("active");
        var page = $("#current-page").attr('data-page');
        var _tran_kind  = $(".filter-form select[name='tran_kind']").val();
        var _PNR        = $(".filter-form input[name='code']").val();
        var _agent      = $(".filter-form select[name='agent']").val();
        var tran_user      = $(".filter-form select[name='tran_user']").val();
        var _content    = $(".filter-form input[name='content']").val();
        var from_date    = $(".filter-form input[name='from_date']").val();
        var to_date    = $(".filter-form input[name='to_date']").val();
        var _date_filter    = $(".filter-form select[name='date_filter']").val();

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
        $.ajax({
            method:"POST",
            url:"/cassiopeia/ajax",
            data:{
                cmd:"load-test-report",
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
            cassiopeia_loading_payment_report();
            return false;
        })
    });
})(jQuery);