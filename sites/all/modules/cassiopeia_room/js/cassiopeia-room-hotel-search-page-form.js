
if (typeof (window.cassiopeia_tagifies) == 'undefined') {
    window.cassiopeia_tagifies = {};
}
(function ($) {
    Drupal.behaviors.cassiopeia_room_hotel_search_page_form = {
        attach: function (context, settings) {
            $('.cassiopeia-room-hotel-search-page-form', context).once('cassiopeia-room-hotel-search-page-form',function () {
                //
                $(".hotel-search-mb").click(function () {
                    $(".filter-form.hotel-search-form").addClass("_show");
                });
                $(".filter-hotel-mb").on("click", function () {
                    $(".hotel-filter .left-block").addClass("_show");
                });
                $(".close-filter-hotel-mb").on("click", function () {
                    $(".hotel-filter .left-block").removeClass("_show");
                });
                
                $(".btn-pre-export-excel").click(function (e) {
                    e.stopPropagation();
                    let a = $.confirm({ 
                        title: '',
                        content: 'Đồng ý tải xuống?',
                        buttons: {
                            formSubmit: {
                                text: 'Xác nhận',
                                btnClass: 'btn-success',
                                action: function () {
                                    $(".btn-export-excel").trigger("mousedown");
                                }
                            },
                            cancel: {
                                text: 'Hủy',
                                btnClass: 'btn-default',
                                action: function () {
                                    // a.close();
                                }
                            },
                        }
                    });
                    return false;
                });

                var typingTimer;
                function formatNumber(n) {
                    // format number 1000000 to 1,234,567
                    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                }
                $("input.currency_format").keyup(function(e){
                    var _this = $(this);
                    var Price = _this.val();
                    Price = Price.replace(".", "");
                    _this.val(formatNumber(Price));
                });
                var _page = $("input[name='page']");
                let str = "<div class=\"loading-block active\">\n" +
                    "    <div class=\"loading-block-container\">\n" +
                    "        <div class=\"lds-css ng-scope\">\n" +
                    "            <div class=\"lds-spin\" style=\"width:100%;height:100%\"><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div></div>\n" +
                    "        </div>\n" +
                    "    </div>\n" +
                    "</div>";
                $(".sort").click(function (e) {
                    let _this = $(this);
                    let data_sort = _this.attr("data-sort");
                    let data_direction = _this.attr("data-direction");
                    if(data_direction=="ASC"){
                        data_direction = "DESC";
                    }else{
                        data_direction = "ASC";
                    }
                    $("select[name='sort_direction']").val(data_direction);
                    $("select[name='sort_direction']").trigger("change");
                    $("select[name='sort_by']").val(data_sort);
                    $("select[name='sort_by']").trigger("change");
                    $(".cassiopeia-room-hotel-search-form").append(str);
                });

                $(".ajax-item").click(function (e) {
                    let page = $(this).attr("data-page");
                    _page.val(page);
                    console.log("_page",_page);
                    _page.trigger("blur");
                });
                var minPrice = 0;
                var maxPrice = 10000000;
                let fromPrice ;
                let toPrice ;
                if($("input.fromPrice").length){
                    minPrice = parseInt($("input.fromPrice").attr("data-min-price").replaceAll(".",""));
                    fromPrice = parseInt($("input.fromPrice").val().replaceAll(".",""));
                }
                if($("input.toPrice").length){
                    maxPrice = parseInt($("input.toPrice").attr("data-max-price").replaceAll(".",""));
                    toPrice = parseInt($("input.toPrice").val().replaceAll(".",""));
                }
                $("#priceRange").slider({
                    min: minPrice,
                    max: maxPrice,
                    step: 50000,
                    values: [fromPrice, toPrice],
                    slide: function(event, ui) {
                        for (var i = 0; i < ui.values.length; ++i) {
                            $("input.sliderValue[data-index=" + i + "]").val(addCommas(ui.values[i]));
                        }
                        $("input[name='from_price']").val(ui.values[0]);
                        // console.log("ui.values",ui.values);
                        $("input[name='to_price']").val(ui.values[1]);
                    },
                    change: function( event, ui ) {
                        _page.trigger("blur");
                    }
                });

            });
        },
        detach: function(context, settings, trigger) {
            $('.cassiopeia-room-hotel-search-page-form', context).removeOnce('cassiopeia-room-hotel-search-page-form', function() {});
        }
    };
})(jQuery);