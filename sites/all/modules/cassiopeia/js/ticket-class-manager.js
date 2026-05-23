(function ($) {
    $("document").ready(function(e){
       $(".btn-add-ticket-class").click(function(e){
           $("#modal_add_ticket_class .modal-title").text("Thêm hạng vé");
            $("#modal_add_ticket_class").modal("show");
       });
    });
})(jQuery);