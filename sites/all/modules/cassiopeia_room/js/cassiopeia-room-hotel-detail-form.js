
if (typeof (window.cassiopeia_tagifies) == 'undefined') {
    window.cassiopeia_tagifies = {};
}
(function ($) {
    Drupal.behaviors.cassiopeia_room_hotel_detail_form = {
        attach: function (context, settings) {
            $('.cassiopeia-room-hotel-detail-form', context).once('cassiopeia-room-hotel-detail-form',function () {
                let str = "<div class=\"loading-block active\">\n" +
                    "    <div class=\"loading-block-container\">\n" +
                    "        <div class=\"lds-css ng-scope\">\n" +
                    "            <div class=\"lds-spin\" style=\"width:100%;height:100%\"><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div></div>\n" +
                    "        </div>\n" +
                    "    </div>\n" +
                    "</div>";
                Drupal.ajax[$('.btn-ajax').attr("id")].options.beforeSubmit = function(){
                    $(".cassiopeia-room-hotel-detail-form").append(str);
                };
                $(".search-customer-quantity").click(function(e) {
                    e.stopPropagation();
                    $(this).find(".extend-block").toggleClass("active");
                });
                $("input[name='night_count']").change(function (e) {
                    var _value = $(this).val();
                    var _start = jQuery("input[name='check-in']").val();
                    var splitter = _start.split("/");
                    var new_start = splitter[1] + "/" + splitter[0] + "/" + splitter[2];
                    start = new Date(new_start);
                    start.setDate(start.getDate() + parseInt(_value));
                    var dd = start.getDate();
                    var mm = start.getMonth() + 1;
                    var y = start.getFullYear();
                    if (parseInt(dd) < 10) {
                        dd = "0" + dd;
                    }
                    if (parseInt(mm) < 10) {
                        mm = "0" + mm;
                    }
                    var someFormattedDate = dd + "/" + mm + "/" + y;
                    $("input[name='check-out']").val(someFormattedDate);
                    console.log(someFormattedDate);
                });

                $(".quantity-change .fa-minus").click(function (e) {
                    e.stopPropagation();
                    let _this = $(this);
                    let _parent = $(".quantity-change").has(_this);
                    let min = _parent.attr("data-min");
                    let _input = _parent.find("input");
                    let val = parseInt(_input.val());
                    if(val>parseInt(min)){
                        val--;
                        _input.val(val);
                        _input.trigger('change');
                    }
                    if(_input.hasClass("room-quantity")){
                        let night = _input.attr("data-night");
                        let price = _input.attr("data-price");
                        let original_price = _input.attr("data-original-price");
                        let new_price = parseInt(price)*parseInt(val);
                        let new_original_price = parseInt(original_price)*parseInt(val);
                        let _right = $(".node-price-right").has(_this);
                        _right.find(".original-price").text(formatNumber(new_original_price.toString())+" VNĐ");
                        _right.find(".price span").text(formatNumber(new_price.toString())+" VNĐ");
                        _right.find(".room-unit").text("/"+val+"phòng/"+night+"đêm");
                    }
                });
                $(".quantity-change .fa-plus").click(function (e) {
                    e.stopPropagation();
                    let _this = $(this);
                    let _parent = $(".quantity-change").has(_this);
                    let _input = _parent.find("input");
                    let val = parseInt(_input.val());
                    val++;
                    _input.val(val);
                    _input.trigger('change');
                    if(_input.hasClass("room-quantity")){
                        let night = _input.attr("data-night");
                        let price = _input.attr("data-price");
                        let original_price = _input.attr("data-original-price");
                        let new_price = parseInt(price)*parseInt(val);
                        let new_original_price = parseInt(original_price)*parseInt(val);
                        let _right = $(".node-price-right").has(_this);
                        _right.find(".original-price").text(formatNumber(new_original_price.toString())+" VNĐ");
                        _right.find(".price span").text(formatNumber(new_price.toString())+" VNĐ");
                        _right.find(".room-unit").text("/"+val+"phòng/"+night+"đêm");
                    }
                });
                $("body").on("click",".btn-book",function (e) {
                    e.stopPropagation();
                    let _parent = $(".node-price-right").has($(this));
                    let _quantity = _parent.find("input.input-qty").val();

                    if(parseInt(_quantity)<1){
                        let a = $.confirm({
                            title: '',
                            content: 'Bạn chưa chọn số lượng phòng!',
                            buttons: {
                                cancel: {
                                    text: 'OK',
                                    btnClass: 'btn-default',
                                    action: function () {
                                        // a.close();
                                    }
                                },
                            }
                        });
                    }else{
                        let _data = $(".cassiopeia-room-hotel-detail-form").serializeArray();
                        let _room = {};
                        _room.name = "nid";
                        _room.value = $(this).attr("data-room");
                        _data.push(_room);

                        let params = "";
                        $.each(_data, function(i, field){
                            if(i===0){
                                $i = "?";
                            }else{
                                $i = "&";
                            }
                            params+=$i+field.name+"="+field.value;
                        });
                        location.href="/dat-phong"+params+"&quantity="+_quantity;
                    }
                    return false;
                });
                var dateFormat = "dd/mm/yy";
                function setNightCount(){
                    let _check_in = $.datepicker.parseDate( dateFormat, $( "input[name='check-in']" ).val() );;
                    let _check_out = $.datepicker.parseDate( dateFormat, $( "input[name='check-out']" ).val() );;
                    var diff = _check_out.getTime() - _check_in.getTime();
                    var daydiff = diff / (1000 * 60 * 60 * 24);
                    $("input[name='night_count']").val(daydiff);
                }
                function getDate( element ) {
                    var date;
                    try {
                        date = $.datepicker.parseDate( dateFormat, element.value );
                    } catch( error ) {
                        date = null;
                    }
                    let date2 = new Date();
                    date2.setDate(date.getDate()+1);
                    return date2;
                }
                let check_in = $( "input[name='check-in']" ).datepicker({
                    dateFormat: dateFormat,
                    minDate: 0,
                    numberOfMonths: 2,
                    showButtonPanel: false,

                })
                    .on( "change", function() {
                        check_out.datepicker( "option", "minDate", getDate( this ));
                        setNightCount();
                    });
                let check_out = $( "input[name='check-out']" ).datepicker({
                    dateFormat: dateFormat,
                    minDate: 0,
                    numberOfMonths: 2,
                    showButtonPanel: false,
                }).on( "change", function() {
                    // check_in.datepicker( "option", "maxDate", getDate( this ));
                    setNightCount();
                });
                $(".search-customer-quantity input").change(function (e) {
                    let guest_count = parseInt($("input[name='adult']").val())+parseInt($("input[name='children']").val());
                    $(".search-customer-quantity .text .guest-count").text(guest_count);
                });
            });
        },
        detach: function(context, settings, trigger) {
            $('.cassiopeia-room-hotel-detail-form', context).removeOnce('cassiopeia-room-hotel-detail-form', function() {});
        }
    };
})(jQuery);