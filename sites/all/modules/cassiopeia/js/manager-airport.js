(function ($) {
    $("document").ready(function(e){
        $(".btn-edit-airport").click(function(e){
            var code = $(this).attr("data-code");
            $.ajax({
                method:"POST",
                url:"/cassiopeia/ajax",
                data:{
                    cmd:"get_airport_by_code",
                    code : code,
                },
                success:function(result){
                    $("#cassiopeia-airport-add-form input[name='code']").val(result.airport.code);
                    $("#cassiopeia-airport-add-form input[name='name']").val(result.airport.name);
                    $("#cassiopeia-airport-add-form input[name='city']").val(result.airport.city);
                    $("#cassiopeia-airport-add-form input[name='city_code']").val(result.airport.code);
                    $("#cassiopeia-airport-add-form input[name='country']").val(result.airport.country);
                    $("#cassiopeia-airport-add-form input[name='country_code']").val(result.airport.country_code);
                    $("#cassiopeia-airport-add-form select[name='region']").val(result.airport.region);
                    $("#modal_insert_airports .modal-title").text("Cập nhật sân bay");
                    $("#modal_insert_airports button[type=submit]").html("Cập nhật");
                    $("#modal_insert_airports").modal("show");
                }
            })
        });
        $(".btn-airport-update").click(function(e){
            $("#modal_import_airports").modal("show");
        });
        $(".btn-airport-insert").click(function(e){

        });
    });
})(jQuery);