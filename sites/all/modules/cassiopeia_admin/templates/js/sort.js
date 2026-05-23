(function($) {
    $(document).ready(function() {
        if($("#cassiopeia-general-revenue-report-filter-form").length){
            $("#cassiopeia-general-revenue-report-filter-form select[name='year']").change(function (e) {
                $("#cassiopeia-general-revenue-report-filter-form select[name='month']").val("all");
               $("#cassiopeia-general-revenue-report-filter-form").submit();
            });
        }
        $("body").on("click",".sort_able",function (e) {
            $("form").has($(this)).append("<div class=\"loading-block active\">\n" +
                "    <div class=\"loading-block-container\">\n" +
                "        <div class=\"lds-css ng-scope\">\n" +
                "            <div class=\"lds-spin\" style=\"width:100%;height:100%\"><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div></div>\n" +
                "        </div>\n" +
                "    </div>\n" +
                "</div>");
            let sort = $(this).attr("data-sort");
            let direction = $(this).attr("data-direction");
            if(direction==""){
                direction = "ASC";
            }else{
                if(direction=="ASC"){
                    direction = "DESC";
                }else{
                    direction = "ASC";
                }
            }
            console.log("sort",sort);
            console.log("direction",direction);
            $("input[name='sort_by'][value='"+sort+"']").prop("checked",true);
            $("input[name='sort_direction'][value='"+direction+"']").prop("checked",true);
            $("input[name='sort_by'][value='"+sort+"']").trigger("change");
        });
    });
})(jQuery);