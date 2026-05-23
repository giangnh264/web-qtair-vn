(function($) {
    $(document).ready(function() {
        console.log("pagination");
        $("body").on("click",".ajax-item",function (e) {
            $("form").has($(this)).append("<div class=\"loading-block active\">\n" +
                "    <div class=\"loading-block-container\">\n" +
                "        <div class=\"lds-css ng-scope\">\n" +
                "            <div class=\"lds-spin\" style=\"width:100%;height:100%\"><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div></div>\n" +
                "        </div>\n" +
                "    </div>\n" +
                "</div>");
            let page = $(this).attr("data-page");
            $("input[name='page']").val(page);
            $("input[name='page']").trigger("blur");
        });
        $("body").on("change","input[name='page']",function (e) {
            console.log("123");
        });
    });
})(jQuery);