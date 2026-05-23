function getHotelRooms(page){
    jQuery(".loading-block").addClass("active");
    // var code = jQuery(".page-manager-hotel-room input.code").val().trim();
    // var title = jQuery(".page-manager-hotel-room input.title").val().trim();
    // var ranking = jQuery(".page-manager-hotel-room input.ranking").val().trim();
    // var user = jQuery(".page-manager-hotel-room select.user").val();
    // var changed = jQuery(".page-manager-hotel-room input.changed").val().trim();
    // var status = jQuery(".page-manager-hotel-room select.status").val();
    // var weight = jQuery(".page-manager-hotel-room input.weight").val().trim();
    var data = {};
    // data['code'] = code;
    // data['title'] = title;
    // data['ranking'] = ranking;
    // data['user'] = user;
    // data['changed'] = changed;
    // data['status'] = status;
    // data['weight'] = weight;
    data['page'] = page;
    console.log(data);
    jQuery.ajax({
        method:"post",
        url:"/cassiopeia/ajax",
        data:{
            cmd:"adminGetHotelRooms",
            data:JSON.stringify(data),
        },
        success:function(result){
            jQuery(".page-manager-hotel-room .result").html(result.html);
            jQuery(".loading-block").removeClass("active");
        }
    });
}

(function ($) {
    $(document).ready(function () {
        $("body").on("click",".ajax-item",function(e){
            $("#current-page").attr('data-page',$(this).attr("data-page"));
            var page = $("#current-page").attr('data-page');
            getHotelRooms(page);
            return false;
        })
        getHotelRooms();
        $(".date-picker").datetimepicker({
            format:'d/m/Y',
            timepicker:false,
        });
    });
    Drupal.behaviors.manager_hotel = {
        attach: function () {
            var typingTimer;
            var doneTypingInterval = 150;
            $(".page-manager-hotel-room select").change(function(e){
                getHotelRooms();
            });
            $(".page-manager-hotel-room input.changed").change(function(e){
                var _this = $(this);
                var key = _this.val().trim();
                if(key.trim()!=""){
                    clearTimeout(typingTimer);
                    typingTimer = setTimeout(getHotelRooms, doneTypingInterval);
                    e.stopPropagation();
                }
            });
            $(".page-manager-hotel-room input").keyup(function(e){
                var _this = $(this);
                var key = _this.val().trim();
                clearTimeout(typingTimer);
                typingTimer = setTimeout(getHotelRooms, doneTypingInterval);
                e.stopPropagation();
            });
            $(".page-manager-hotel-room input").on('keydown', function () {
                clearTimeout(typingTimer);
            });

        }
    };
})(jQuery);