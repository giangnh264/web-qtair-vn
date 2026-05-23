
(function ($) {
    Drupal.behaviors.cassiopeia_qt_search_flight_form = {
        attach: function (context, settings) {
            $('.cassiopeia-ticket-flight-search-form', context).once('cassiopeia-ticket-flight-search-form',function () {
                $('.select-2').select2();
                let str = "<div class=\"loading-block active\">\n" +
                    "    <div class=\"loading-block-container\">\n" +
                    "        <div class=\"lds-css ng-scope\">\n" +
                    "            <div class=\"lds-spin\" style=\"width:100%;height:100%\"><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div></div>\n" +
                    "        </div>\n" +
                    "    </div>\n" +
                    "</div>";
                if($(".btn-ajax").length){
                    $(".btn-ajax").each(function (e) {
                        let _this = $(this);
                        Drupal.ajax[_this.attr("id")].options.beforeSubmit = function(){
                            $(".cassiopeia-ticket-flight-search-form").append(str);
                        };
                    });
                }
                // if($("input[type=radio]").length){
                //     $("input[type=radio]").each(function (e) {
                //        let _this = $(this);
                //         Drupal.ajax[_this.attr("id")].options.beforeSubmit = function(){
                //             $(".cassiopeia-ticket-flight-search-form").append(str);
                //         };
                //     });
                // }
                $(".btn-view-detail").click(function (e) {
                    let flightItem = $(".flight-item").has($(this));
                    flightItem.find(".detail").toggleClass("active");
                });
                $(document).ready(function () {
                    $("input[type=radio]").each(function (e) {
                        let _this = $(this);
                        if(_this.is(":checked")){
                            $(".form-item-task").has(_this).addClass("active");
                        };
                    });
                })
            });
        },
        detach: function(context, settings, trigger) {
            $('.cassiopeia-ticket-flight-search-form', context).removeOnce('cassiopeia-ticket-flight-search-form', function() {});
        }
    };
})(jQuery);
