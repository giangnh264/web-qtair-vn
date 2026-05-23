
(function ($) {
    Drupal.behaviors.cassiopeia_qt_search_flight_form = {
        attach: function (context, settings) {
            $('.cassiopeia-qt-search-flight-form', context).once('cassiopeia-qt-search-flight-form',function () {
                $('.select-2').select2();
                let str = "<div class=\"loading-block active\">\n" +
                    "    <div class=\"loading-block-container\">\n" +
                    "        <div class=\"lds-css ng-scope\">\n" +
                    "            <div class=\"lds-spin\" style=\"width:100%;height:100%\"><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div></div>\n" +
                    "        </div>\n" +
                    "    </div>\n" +
                    "</div>";
                Drupal.ajax[$(".btn-search-flight").attr("id")].options.beforeSubmit = function(){
                    $(".cassiopeia-qt-search-flight-form").append(str);
                };
                if($(".btn-add-segment").length){
                    Drupal.ajax[$(".btn-add-segment").attr("id")].options.beforeSubmit = function(){
                        $(".cassiopeia-qt-search-flight-form").append(str);
                    };
                }
                $(".flight .btn-view-detail").click(function (e) {
                    console.log("data-FlightSession");
                    let FlightSession = $(this).attr("data-FlightSession");
                    $(".detail-row[data-FlightSession='"+FlightSession+"']").toggleClass("active");
                });
            });
        },
        detach: function(context, settings, trigger) {
            $('.cassiopeia-qt-search-flight-form', context).removeOnce('cassiopeia-qt-search-flight-form', function() {});
        }
    };
})(jQuery);
