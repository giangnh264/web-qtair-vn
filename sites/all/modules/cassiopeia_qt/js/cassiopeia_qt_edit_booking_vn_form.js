
(function ($) {
    Drupal.behaviors.cassiopeia_qt_search_flight_form = {
        attach: function (context, settings) {
            $('.cassiopeia-edit-booking-vn-form', context).once('cassiopeia-edit-booking-vn-form',function () {
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
                            $(".cassiopeia-edit-booking-vn-form").append(str);
                        };
                    });
                }
                // if($("input[type=radio]").length){
                //     $("input[type=radio]").each(function (e) {
                //        let _this = $(this);
                //         Drupal.ajax[_this.attr("id")].options.beforeSubmit = function(){
                //             $(".cassiopeia-edit-booking-vn-form").append(str);
                //         };
                //     });
                // }
                $(".flight .btn-view-detail").click(function (e) {
                    console.log("data-FlightSession");
                    let FlightSession = $(this).attr("data-FlightSession");
                    $(".detail-row[data-FlightSession='"+FlightSession+"']").toggleClass("active");
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
            $('.cassiopeia-edit-booking-vn-form', context).removeOnce('cassiopeia-edit-booking-vn-form', function() {});
        }
    };
})(jQuery);
