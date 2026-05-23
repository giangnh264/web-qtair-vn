
if (typeof (window.cassiopeia_tagifies) == 'undefined') {
    window.cassiopeia_tagifies = {};
}
(function ($) {
    Drupal.behaviors.cassiopeia_room_room_booking_form = {
        attach: function (context, settings) {
            $('.cassiopeia-room-room-booking-form', context).once('cassiopeia-room-room-booking-form',function () {
                let str = "<div class=\"loading-block active\">\n" +
                    "    <div class=\"loading-block-container\">\n" +
                    "        <div class=\"lds-css ng-scope\">\n" +
                    "            <div class=\"lds-spin\" style=\"width:100%;height:100%\"><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div></div>\n" +
                    "        </div>\n" +
                    "    </div>\n" +
                    "</div>";
                // Drupal.ajax[$('.btn-ajax').attr("id")].options.beforeSubmit = function(){
                //     $(".cassiopeia-room-room-booking-form").append(str);
                // };
                // console.log("$('button').attr(\"id\")",$('.btn-ajax').attr("id"));
                $("button.form-submit").click(function (e) {
                        $(".cassiopeia-room-room-booking-form").append(str);
                })
            });
        },
        detach: function(context, settings, trigger) {
            $('.cassiopeia-room-room-booking-form', context).removeOnce('cassiopeia-room-room-booking-form', function() {});
        }
    };
})(jQuery);