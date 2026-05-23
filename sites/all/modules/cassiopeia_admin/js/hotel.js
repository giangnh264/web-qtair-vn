function getHotels(page){
    jQuery(".loading-block").addClass("active");
    var code = jQuery(".page-manager-hotel input.code").val().trim();
    var title = jQuery(".page-manager-hotel input.title").val().trim();
    var ranking = jQuery(".page-manager-hotel input.ranking").val().trim();
    var user = jQuery(".page-manager-hotel select.user").val();
    var changed = jQuery(".page-manager-hotel input.changed").val().trim();
    var status = jQuery(".page-manager-hotel select.status").val();
    var tx_area = jQuery(".page-manager-hotel select[name='tx_area']").val();
    // var weight = jQuery(".page-manager-hotel input.weight").val().trim();
    var data = {};
    data['tx_area'] = tx_area;
    data['code'] = code;
    data['title'] = title;
    data['ranking'] = ranking;
    data['user'] = user;
    data['changed'] = changed;
    data['status'] = status;
    // data['weight'] = weight;
    data['page'] = page;
    console.log(data);
    jQuery.ajax({
        method:"post",
        url:"/cassiopeia_admin/ajax",
        data:{
            cmd:"adminGetHotels",
            data:JSON.stringify(data),
        },
        success:function(result){
            jQuery(".page-manager-hotel .result").html(result.html);
            jQuery(".loading-block").removeClass("active");
        }
    });
}

(function ($) {
    $(document).ready(function () {
        $("body").on("change","input.hotel_status",function (e) {
            var status = 0;
            var hid = $(this).val();
            if($(this).is(":checked")){
                status = 1;
            }
            jQuery(".loading-block").addClass("active");
            jQuery.ajax({
                method:"post",
                url:"/cassiopeia_admin/ajax",
                data:{
                    cmd:"changeHotelStatus",
                    status:status,
                    hid:hid,
                },
                success:function(result){
                    jQuery(".loading-block").removeClass("active");
                }
            });
        });
        $("body").on("click",".ajax-item",function(e){
            $("#current-page").attr('data-page',$(this).attr("data-page"));
            var page = $("#current-page").attr('data-page');
            getHotels(page);
            return false;
        })
        getHotels();
        $(".date-picker").datetimepicker({
            format:'d/m/Y',
            timepicker:false,
        });
    });
    Drupal.behaviors.manager_hotel = {
        attach: function () {
            var typingTimer;
            var doneTypingInterval = 150;
            $(".page-manager-hotel select").change(function(e){
                getHotels();
            });
            $(".page-manager-hotel input.changed").change(function(e){
                var _this = $(this);
                var key = _this.val().trim();
                if(key.trim()!=""){
                    clearTimeout(typingTimer);
                    typingTimer = setTimeout(getHotels, doneTypingInterval);
                    e.stopPropagation();
                }
            });
            $(".page-manager-hotel input").keyup(function(e){
                var _this = $(this);
                var key = _this.val().trim();
                clearTimeout(typingTimer);
                typingTimer = setTimeout(getHotels, doneTypingInterval);
                e.stopPropagation();
            });
            $(".page-manager-hotel input").on('keydown', function () {
                clearTimeout(typingTimer);
            });

        }
    };
})(jQuery);