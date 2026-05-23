
(function ($) {
    var today = new Date();
    var startDate = $("#dateRange").attr("start");
    var endDate = $("#dateRange").attr("end");
    // var endDate = (today.getDate())+'/'+(today.getMonth()+1)+'/'+today.getFullYear();
    // var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
    // var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
    // console.log("firstDay",firstDay);
    $('input.date-range-custom').daterangepicker({
        "autoApply": true,
        "startDate": startDate,
        "endDate": endDate,
        locale: {
            format: 'DD/MM/YYYY'
        }
    }, function(start, end, label) {


    });
    $(document).ready(function () {
        $('input.date-range-custom').each(function (e) {
            let _this = $(this);
            let _date_range = _this.val();
            let _id = _this.attr("id");
            $.ajax({
                method:"post",
                url:"/cassiopeia/ajax",
                data:{
                    cmd:"getDashboardReport",
                    date : _date_range,
                    option:_id,
                },
                success:function(result){
                    $(".item").has(_this).find(".block-chart").html(result.html);
                }
            });
        });

        $('input.date-range-custom').change(function (e) {
            let _this = $(this);
            $(".item").has(_this).find(".block-chart").addClass("loading");
            let _date_range = _this.val();
            let _id = _this.attr("id");
            $.ajax({
                method:"post",
                url:"/cassiopeia/ajax",
                data:{
                    cmd:"getDashboardReport",
                    date : _date_range,
                    option:_id,
                },
                success:function(result){
                    $(".item").has(_this).find(".block-chart").removeClass("loading");
                    $(".item").has(_this).find(".block-chart").html(result.html);
                }
            });
        })
    });
})(jQuery);