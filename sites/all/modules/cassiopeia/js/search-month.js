(function ($) {
function get_search_month(){
    $(".loading-block").addClass("active");
    var data = {};
    data['DepartureAirportCode']  = $("span.flight-info").attr("data-StartPoint");;
    data['DestinationAirportCode']    = $("span.flight-info").attr("data-EndPoint");;
    data['DepartureDate']       = $("span.flight-info").attr("data-DepartureDate");;
    data['ReturnDate']        = $("span.flight-info").attr("data-ReturnDate").replaceAll(" ","");;
    data['ItineraryType']        = $("span.flight-info").attr("data-ItineraryType");;
    console.log("data",data);
    $.ajax({
        method: "post",
        url:"/cassiopeia/ajax",
        data: {
            cmd : "get_search_month",
            data : JSON.stringify(data),
        },
        success:function(result){
            $(".result").html(result.html);
            $(".page-flight-search .block-filter").html(result.block_filter);
            $(".loading-block").removeClass("active");
            $(".page-flight-search #search-fly-form").addClass("active");
        }
    });
}
$(document).ready(function(e) {
    // alert("Hệ thống đang nâng cấp, vui lòng quay lại sau!");
    // location.href="/";
    get_search_month();
    $("body").on("click",".calendar-table .table-body>div",function (e) {

        $(this).find("input[type=radio]").prop("checked",true);
        $(this).find("input[type=radio]").change();
        var _departure_date = "";
        var _return_date = "";
        $(".calendar-table .table-body>div input[name='DepartureDate-0']").each(function(e){
            if($(this).is(":checked")){
                _departure_date = $(this).val();
            }
        });
        if($(".calendar-table .table-body>div input[name='ReturnDate-0']").length){
            $(".calendar-table .table-body>div input[name='ReturnDate-0']").each(function(e){
                if($(this).is(":checked")){
                    _return_date = $(this).val();
                }
            });
        }
        console.log(_return_date);
        console.log(_departure_date);
        var _triptype = $("span.flight-info").attr("data-radio");
        if(_triptype=="RT"){
            if(_return_date!="" && _departure_date!=""){
                $(".choose-flights").addClass("active");
            }
        }else{
            $(".choose-flights").addClass("active");
        }
    });
});
})(jQuery);