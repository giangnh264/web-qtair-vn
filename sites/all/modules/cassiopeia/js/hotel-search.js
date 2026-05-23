function removeAccents(str) {
    var AccentsMap = [
        "aàảãáạăằẳẵắặâầẩẫấậ",
        "AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬ",
        "dđ", "DĐ",
        "eèẻẽéẹêềểễếệ",
        "EÈẺẼÉẸÊỀỂỄẾỆ",
        "iìỉĩíị",
        "IÌỈĨÍỊ",
        "oòỏõóọôồổỗốộơờởỡớợ",
        "OÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢ",
        "uùủũúụưừửữứự",
        "UÙỦŨÚỤƯỪỬỮỨỰ",
        "yỳỷỹýỵ",
        "YỲỶỸÝỴ"
    ];
    for (var i = 0; i < AccentsMap.length; i++) {
        var re = new RegExp('[' + AccentsMap[i].substr(1) + ']', 'g');
        var char = AccentsMap[i][0];
        str = str.replace(re, char);
    }
    return str;
}

function loadHotels(page = 1) {
    return ;
    var date_range = jQuery(".hotel-search-form .item input.date-range").val();
    var fromPrice = parseInt(jQuery("input.fromPrice").val().replaceAll(".",""));
    var toPrice = parseInt(jQuery("input.toPrice").val().replaceAll(".",""));
    var _name = jQuery("input[name='hotel-name']").val();
    var tx_area = jQuery("input[name='tx_area']").val();
    var _ranking = [];
    var _tx_hotel = [];
    var _convenient = [];
    var _data = {};
    jQuery(".search-by-hotel-ranking input").each(function(e) {
        var _this = jQuery(this);
        if (_this.is(":checked")) {
            _ranking.push(_this.val());
        }
    });
    jQuery(".search-by-tx-hotel input").each(function(e) {
        var _this = jQuery(this);
        if (_this.is(":checked")) {
            _tx_hotel.push(_this.val());
        }
    });
    jQuery(".search-by-convenient input").each(function(e) {
        var _this = jQuery(this);
        if (_this.is(":checked")) {
            _convenient.push(_this.val());
        }
    });
    var sort = jQuery("input[name='sort']:checked").val();
    var sort_direction = jQuery("input[name='sort_direction']:checked").val();
    if(jQuery("input[name='sort_direction']").is(":checked")){
        sort_direction = "DESC";
    }else{
        sort_direction = "ASC";
    }
    let cmd;
    if(jQuery(".page-tx-area").length){
         cmd = "get_hotels_by_tx_area";
    }else{
         cmd = "getHotels";
    }
    _data['sort_direction'] = sort_direction;
    _data['date_range'] = date_range;
    _data['fromPrice'] = fromPrice;
    _data['toPrice'] = toPrice;
    _data['sort'] = sort;
    _data['name'] = _name;
    _data['ranking'] = _ranking;
    _data['tx_area'] = tx_area;
    _data['tx_hotel'] = _tx_hotel;
    _data['convenient'] = _convenient;
    _data['page'] = page;
    jQuery(".loading-block").addClass("active");
    jQuery.ajax({
        method: "post",
        url: "/cassiopeia/ajax",
        data: {
            cmd: cmd,
            data: JSON.stringify(_data),
        },
        success: function(result) {
            jQuery(".page-hotel-search .block-result").html(result.html);
            jQuery(".loading-block").removeClass("active");
            jQuery(".result-count .total-hotel").text(result.Total);
        }
    });
}
function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
}
(function($) {
    $(document).ready(function(e) {
        var minPrice = 0;
        var maxPrice = 10000000;
        if($("input.fromPrice").length){
             minPrice = parseInt($("input.fromPrice").val().replaceAll(".",""));
        }
        if($("input.toPrice").length){
             maxPrice = parseInt($("input.toPrice").val().replaceAll(".",""));
        }

        $("#priceRange").slider({
            min: minPrice,
            max: maxPrice,
            step: 50000,
            values: [minPrice, maxPrice],
            slide: function(event, ui) {
                for (var i = 0; i < ui.values.length; ++i) {
                    $("input.sliderValue[data-index=" + i + "]").val(addCommas(ui.values[i]));
                }
                setTimeout(function(e) {
                    loadHotels();
                }, 500)
            }
        });

        $(".page-hotel-search .block-sort input").change(function(e) {
            loadHotels();
        });
        $("body").on("click", ".ajax-item", function(e) {
            $("#current-page").attr('data-page', $(this).attr("data-page"));
            var page = $("#current-page").attr('data-page');
            loadHotels(page);
            return false;
        })
        $("body").click(function(e) {
            $(".hotel-search-form .block-suggest").removeClass("active");
            $(this).find(".form-room-count").removeClass("active");
        });
        $(".form-search-room-count").click(function(e) {
            e.stopPropagation();
            $(this).find(".form-room-count").toggleClass("active");
        });
        $(".hotel-search-form .form-search-key input").click(function(e) {
            e.stopPropagation();
            $(".hotel-search-form .block-suggest").addClass("active");
        });
        $(".page-hotel-search .search-group input").change(function(e) {
            // if($(this).attr("name")==="hotel-name"){
            //     $("input[name='tx_area']").val("");
            //     $(".form-search-key input").val("");
            // }
            loadHotels();
        });
        if($(".page-hotel-search").length){
            loadHotels();
        }
        // $(".hotel-search-form .form-button button").click(function(e) {
        //     var tx_area = $("input[name='tx_area']").val();
        //     var key = $(".form-search-key input").val();
        //     var hotel = $("input[name='hotel']").val();
        //     var _date = $(".hotel-search-form input.date-range").val();
        //     var room = $(".hotel-search-form .form-room-count .item.room span").text();
        //     var adult = $(".hotel-search-form .form-room-count .item.adult span").text();
        //     var children = $(".hotel-search-form .form-room-count .item.children span").text();
        //     location.href = "/hotel/search?khu-vuc=" + tx_area + "&key=" + key + "&date=" + _date + "&room=" + room + "&adult=" + adult + "&children=" + children;
        //     console.log(123);
        //     return false;
        // });
        // $(".hotel-search-form .form-room-count .item div i.fa-plus").click(function(e) {
        //     e.stopPropagation();
        //     var _parent = $(".hotel-search-form .form-room-count .item").has($(this));
        //     var _elment = _parent.find(".count");
        //     var _value = parseInt(_elment.text());
        //     _elment.text(_value + 1);
        //     var _room = $(".hotel-search-form .form-room-count .item.room span").text();
        //     var _adult = $(".hotel-search-form .form-room-count .item.adult span").text();
        //     var _children = $(".hotel-search-form .form-room-count .item.children span").text();
        //     $(".hotel-search-form .form-search-room-count>.item span").text(_room + " phòng, " + _adult + " người lớn");
        // });
        // $(".hotel-search-form .form-room-count .item div i.fa-minus").click(function(e) {
        //     var _parent = $(".hotel-search-form .form-room-count .item").has($(this));
        //     var _elment = _parent.find(".count");
        //     var _value = parseInt(_elment.text());
        //     if (_parent.hasClass("children")) {
        //         if (_value > 0) {
        //             _elment.text(_value - 1);
        //         }
        //     } else {
        //         if (_value > 1) {
        //             _elment.text(_value - 1);
        //         }
        //     }
        //     $(".hotel-search-form .form-search-room-count>.item span").text(_room + " phòng, " + _adult + " người lớn");
        // });

        $('input.date-range').daterangepicker({
            opens: 'left',
            autoApply: true,
            locale: {
                format: 'DD/MM/Y'
            }
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
        $(".hotel-search-form .block-suggest .item").click(function(e) {
            var _tid = $(this).attr("data-tid");
            var _text = $(this).find(".text").text();
            $(".hotel-search-form .form-item.form-search-key input").val(_text);
            $("input[name='tx_area']").val(_tid);
            $("input[name='hotel']").val("");
            $(".hotel-search-form .block-suggest").removeClass("active");
        });
        // $("input[name='hotel-name']").change(function(e) {
        //     $("input[name='tx_area']").val("");
        //     $(".form-search-key input").val("");
        // });
        var typingTimer;
        var doneTypingInterval = 150;
        $(".hotel-search-form .form-item.form-search-key>input").keyup(function(e) {
            var _this = $(this);
            var key = _this.val().trim();
            if (key.length >= 2) {
                clearTimeout(typingTimer);
                typingTimer = setTimeout(doneTyping, doneTypingInterval);
                e.stopPropagation();
            }
        });
        $(".hotel-search-form .form-item.form-search-key>input").on('keydown', function() {
            clearTimeout(typingTimer);
        });
        $(".block-suggest-hotel li").click(function(e) {
            var _text = $(this).find("span").text();
            var _nid = $(this).attr("data-nid");
            $(".hotel-search-form .form-item.form-search-key>input").val(_text);
            $("input[name='tx_area']").val("");
            $("input[name='hotel']").val(_nid);
            $(".hotel-search-form .block-suggest-hotel").removeClass("active");
            $(".hotel-search-form .block-suggest").removeClass("active");
        });

        function doneTyping() {
            $(".hotel-search-form .block-suggest-hotel").addClass("active");
            var _value = removeAccents($(".hotel-search-form .form-item.form-search-key>input").val()).toLowerCase().trim();
            if (_value.length < 1) {
                $(".hotel-search-form .block-suggest-hotel").removeClass("active");
                $(".hotel-search-form .block-suggest").addClass("active");
            }
            $(".block-suggest-hotel li").removeClass("active");
            $(".block-suggest-hotel li").each(function(e) {
                var _this = $(this);
                var _text = removeAccents($(this).html()).toLowerCase();
                console.log(_text);
                if (_text.indexOf(_value) >= 0) {
                    _this.addClass("active");
                } else {
                    console.log("fff");
                }
            });
        }

    });
})(jQuery);