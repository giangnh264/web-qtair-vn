(function ($) {
    function cassiopeia_loading_issue_report(page=1){
        $(".loading-block").addClass("active");
        var date_filter     = $("#cassiopeia-isue-report-filter-form select[name='date_filter']").val();
        var from_date       = $("#cassiopeia-isue-report-filter-form input[name='from_date[date]']").val();
        var to_date         = $("#cassiopeia-isue-report-filter-form input[name='to_date[date]']").val();
        var airline         = $("#cassiopeia-isue-report-filter-form select[name='airline']").val();
        var tran_kind       = $("#cassiopeia-isue-report-filter-form select[name='tran_kind']").val();
        var PNR             = $("#cassiopeia-isue-report-filter-form input[name='code']").val();
        var content             = $("#cassiopeia-isue-report-filter-form input[name='content']").val();
        var tran_user       = $("#cassiopeia-isue-report-filter-form select[name='tran_user']").val();
        var profit_filter       = $("#cassiopeia-isue-report-filter-form select[name='profit_filter']").val();
        var agent       = $("#cassiopeia-isue-report-filter-form select[name='agent']").val();

        var _data = {};
        _data['date_filter'] = date_filter;
        _data['from_date'] = from_date;
        _data['to_date'] = to_date;
        _data['airline'] = airline;
        _data['tran_kind'] = tran_kind;
        _data['profit_filter'] = profit_filter;
        _data['PNR'] = PNR;
        _data['tran_user'] = tran_user;
        _data['agent'] = agent;
        _data['page'] = page;
        _data['content'] = content;

        $.ajax({
            method:"POST",
            url:"/cassiopeia/ajax",
            data:{
                cmd:"load-issue-report",
                _data:JSON.stringify(_data),
            },success:function(result){
                $(".loading-block").removeClass("active");
                $(".page-issue-report .block-items").html(result.html);
            }
        });
    }
    function cassiopeia_add_issue_report(){
        var airline         = $("#cassiopeia-issue-report-add-form select[name='airline']").val();
        var tran_kind       = $("#cassiopeia-issue-report-add-form select[name='tran_kind']").val();
        var PNR             = $("#cassiopeia-issue-report-add-form input[name='code']").val();
        var quantity        = $("#cassiopeia-issue-report-add-form input[name='quantity']").val();
        var partner_price   = $("#cassiopeia-issue-report-add-form input[name='partner_price']").val();
        var price           = $("#cassiopeia-issue-report-add-form input[name='price']").val();
        var agent           = $("#cassiopeia-issue-report-add-form select[name='agent']").val();
        var content         = $("#cassiopeia-issue-report-add-form input[name='content']").val();
        var date            = $("#cassiopeia-issue-report-add-form input[name='tran_date[date]']").val();
        if(PNR.trim()===""){
            alert("Bạn chưa nhập code");
            $(".add-form input[name='code']").focus();
            return false;
        }
        if(agent=="all"){
            alert("Bạn chưa chọn đại lý");
            $(".add-form select[name='agent']").click();
            return false;
        }
        $(".loading-block").addClass("active");
        var _data = {};
        _data['airline'] = airline;
        _data['tran_kind'] = tran_kind;
        _data['PNR'] = PNR;
        _data['quantity'] = quantity;
        _data['partner_price'] = partner_price;
        _data['price'] = price;
        _data['date'] = date;
        _data['agent'] = agent;
        _data['content'] = content;
        $.ajax({
            method:"POST",
            url:"/cassiopeia/ajax",
            data:{
                cmd:"add-issue-report",
                _data:JSON.stringify(_data),
            },success:function(result){
                $(".loading-block").removeClass("active");
                // $(".add-form input[name='PNR']").val('');
                // $(".add-form input[name='quantity']").val(0);
                // $(".add-form input[name='partner_price']").val(0);
                // $(".add-form select[name='agent']").val();
                // $(".add-form input[name='content']").val('');
                // $(".page-issue-report .block-items").html(result.html);
                cassiopeia_loading_issue_report();
            }
        });
    }
    $("document").ready(function(e){
        $("#cassiopeia-issue-report-add-form select[name='agent']").select2();
        $("#cassiopeia-isue-report-filter-form button.btn-filter").click(function (e) {
            cassiopeia_loading_issue_report();
            return false;
        });
        $("#cassiopeia-isue-report-filter-form button.btn-export-1").click(function (e) {
            let _data = $("#cassiopeia-isue-report-filter-form").serialize();
            location.href = "/admin/manager/bao-cao-xuat-ve/export?"+_data;
            return false;
        });
        $("#cassiopeia-isue-report-filter-form select[name='date_filter']").change(function (e) {
            let val = $(this).val();
            console.log("val",val);
            if(val=="other"){
                $(".date-filter-group").addClass("active");
            }else{
                $(".date-filter-group").removeClass("active");
            }
        });

        cassiopeia_loading_issue_report();
        if($(".page-issue-report div.from-date input").length){
            $(".page-issue-report div.from-date input").datetimepicker({
                timepicker:false,
                format:'d-m-Y'
            });
            $(".page-issue-report div.to-date input").datetimepicker({
                timepicker:false,
                format:'d-m-Y'
            });
        }

        $("body").on("click",".page-payment-report table.report-items th",function(e){
            var data_sort = $(this).attr("data-sort");
            var sort_by =  $(".filter-form input[name='sort_by']").val();
            if(sort_by=='none'){
                $(".filter-form input[name='sort_by']").val(data_sort);
            }else{
                $(".filter-form input[name='sort_by']").val(data_sort);
                var sort_direction =  $(".filter-form select[name='sort_direction']").val();
                if(sort_direction=="DESC"){
                    $(".filter-form select[name='sort_direction']").val("ASC");
                }else{
                    $(".filter-form select[name='sort_direction']").val("DESC");
                }
            }
            cassiopeia_loading_issue_report();
        });
        $("body").on("click",".report-items tbody > tr",function(e){
             var _key = $(this).attr("data-key");
             if( $(".report-items tbody tr.footable-detail-row[data-key='"+_key+"']").hasClass("active")){
                 $(".report-items tbody tr.footable-detail-row[data-key='"+_key+"']").removeClass("active");
             }else{
                 $(".report-items tbody tr.footable-detail-row").removeClass("active");
                 $(".report-items tbody tr.footable-detail-row[data-key='"+_key+"']").addClass("active");
             }
        });
        $(".add-form .quantity input").keyup(function(e){
           var _val = $(this).val();
           var _this = $(this);
            console.log(_val);
           if(parseInt(_val)>20){
               alert("Vui lòng nhập tối đa 20 vé");
               _this.focus();
               _this.val(1);
           }
        });
        var typingTimer;
        $(".filter-form input").keyup(function(e){
            if(e.keyCode==13){
                cassiopeia_loading_issue_report();
            }
            var _this = $(this);
            clearTimeout(typingTimer);
            typingTimer = setTimeout(function () {
                var key = null;
                if (e.which != null) {
                    key = e.which;
                } else {
                    key = e.keyCode;
                }
                if (key != 40 && key != 39 && key != 38 && key != 37 ) {
                    var _text = _this.val();
                    cassiopeia_loading_issue_report();
                }
            }, 1000);
            e.stopPropagation();
        });
        $(".add-form input").keyup(function(e){
            if(e.keyCode==13){
                cassiopeia_add_issue_report();
            }
        });
        $(".btn-excel-export").click(function (e) {
            $("input[name='export']").val(1);
            var date_filter     = $("#cassiopeia-isue-report-filter-form select[name='date_filter']").val();
            var from_date       = $("#cassiopeia-isue-report-filter-form input[name='from_date[date]']").val();
            var to_date         = $("#cassiopeia-isue-report-filter-form input[name='to_date[date]']").val();
            var airline         = $("#cassiopeia-isue-report-filter-form select[name='airline']").val();
            var tran_kind       = $("#cassiopeia-isue-report-filter-form select[name='tran_kind']").val();
            var PNR             = $("#cassiopeia-isue-report-filter-form input[name='code']").val();
            var tran_user       = $("#cassiopeia-isue-report-filter-form select[name='tran_user']").val();
            var agent       = $("#cassiopeia-isue-report-filter-form select[name='agent']").val();

            var _data = {};
            _data['date_filter'] = date_filter;
            _data['from_date'] = from_date;
            _data['to_date'] = to_date;
            _data['airline'] = airline;
            _data['tran_kind'] = tran_kind;
            _data['PNR'] = PNR;
            _data['tran_user'] = tran_user;
            _data['agent'] = agent;
            _data['page'] = page;
            location.href = "/admin/manager/issue/export?data="+JSON.stringify(_data);
        });
        if( $(".page-payment-report .add-form .date input").length){
            $(".page-payment-report .add-form .date input").datetimepicker({
                timepicker:false,
                format:'d-m-Y',
                minDate:'-1970/01/31',
            });
        }

        $(".filter-form input").keydown(function(e){
            clearTimeout(typingTimer);
        });

        $(".btn-filter-issue-report").click(function(e){
            cassiopeia_loading_issue_report();
        });
        $(".filter-form select").change(function(e){
            cassiopeia_loading_issue_report();
        });
        $("#cassiopeia-issue-report-add-form button").click(function(e){
            cassiopeia_add_issue_report();
            return false;
        });
        $("body").on("click",".ajax-item",function(e){
            $("#current-page").attr('data-page',$(this).attr("data-page"));
            var page = $("#current-page").attr('data-page');
            cassiopeia_loading_issue_report(page);
            return false;
        })
    });
})(jQuery);