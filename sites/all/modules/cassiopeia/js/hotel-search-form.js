(function($) {
    $(document).ready(function(e) {
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
                let room = $("input[name='room']").val();
                let adult = $("input[name='adult']").val();
                let children = $("input[name='children']").val();
                if(children>0){
                    $(".form-search-room-count span.text").text(room+" phòng, "+adult+" người lớn"+", "+children+" trẻ em");
                }else{
                    $(".form-search-room-count span.text").text(room+" phòng, "+adult+" người lớn");
                }
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
            let room = $("input[name='room']").val();
            let adult = $("input[name='adult']").val();
            let children = $("input[name='children']").val();
            if(children>0){
                $(".form-search-room-count span.text").text(room+" phòng, "+adult+" người lớn"+", "+children+" trẻ em");
            }else{
                $(".form-search-room-count span.text").text(room+" phòng, "+adult+" người lớn");
            }
        });
        var dateFormat = "dd/mm/yy";
        function setNightCount(){
            let _check_in = $.datepicker.parseDate( dateFormat, $( "input[name='check-in']" ).val() );;
            let _check_out = $.datepicker.parseDate( dateFormat, $( "input[name='check-out']" ).val() );;
            var diff = _check_out.getTime() - _check_in.getTime();
            var daydiff = diff / (1000 * 60 * 60 * 24);
            // $("input[name='night_count']").val(daydiff);
        }
        $(".hotel-search-form .form-button button").click(function(e) {
            var tx_area = $("input[name='tx_area']").val();
            var key = $(".form-search-key input").val();
            var hotel = $("input[name='hotel']").val();
            var check_in = $(".hotel-search-form input[name='check-in']").val();
            var check_out = $(".hotel-search-form input[name='check-out']").val();
            var room = $(".hotel-search-form input[name='room']").val();
            var adult = $(".hotel-search-form input[name='adult']").val();
            var children = $(".hotel-search-form input[name='children']").val();
            location.href = "/hotel/search?khu-vuc=" + tx_area + "&key=" + key + "&check-in=" + check_in+ "&check-out=" + check_out + "&room=" + room + "&adult=" + adult + "&children=" + children;
            console.log(123);
            return false;
        });
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
    });
})(jQuery);