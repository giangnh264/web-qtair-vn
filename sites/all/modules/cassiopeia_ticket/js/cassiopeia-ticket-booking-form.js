if (typeof (window.cassiopeia_tagifies) == 'undefined') {
    window.cassiopeia_tagifies = {};
}
(function ($) {
    Drupal.behaviors.cassiopeia_ticket_booking_form = {
        attach: function (context, settings) {
            $('.cassiopeia-ticket-booking-form', context).once('cassiopeia-ticket-booking-form',function () {
                let str = "<div class=\"loading-block active\">\n" +
                    "    <div class=\"loading-block-container\">\n" +
                    "        <div class=\"lds-css ng-scope\">\n" +
                    "            <div class=\"lds-spin\" style=\"width:100%;height:100%\"><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div></div>\n" +
                    "        </div>\n" +
                    "    </div>\n" +
                    "</div>";
                Drupal.ajax[$('.btn-ajax').attr("id")].options.beforeSubmit = function(){
                    $(".cassiopeia-ticket-booking-form").append(str);
                };
            });
        },
        detach: function(context, settings, trigger) {
            $('.cassiopeia-ticket-booking-form', context).removeOnce('cassiopeia-ticket-booking-form', function() {});
        }
    };
})(jQuery);