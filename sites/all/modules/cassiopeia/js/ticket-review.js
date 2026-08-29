(function ($) {
    $("document").ready(function(e){
        $("#cassiopeia-open-pnr-form button:not(.btn-download-ticket-pdf)").click(function(e){
            $(".loading-block").addClass("active");
        })
        var last_row;
        var airline = $(".ticket-info").attr("data-airline");
        var code = $(".ticket-info").attr("data-pnr");
        var html = $(".ticket-review-result").html();
        if(code!==undefined){
            code = code.trim();
        }
        // console.log(html);
        if(html!=="" && html!= undefined){
            // $(".loading-block").addClass("active");
            if(airline=="VJ"){
                let tableArr = [];
                let count = 0;
                $(".ticket-review-result>table").each(function(e){
                    last_row = $(this).html();
                    tableArr[count] = last_row;
                    count++;
                });
                $(".ticket-review-result").html("");
                console.log("tableArr",tableArr);
                $.ajax({
                    method:"POST",
                    url:"/cassiopeia/ajax",
                    data:{
                        cmd:"get-ticket-VJ-review",
                        airline:airline,
                        code:code,
                        itinerary_row:tableArr[tableArr.length-2],
                        tableArr:JSON.stringify(tableArr),
                        last_row:last_row,
                        html:html,
                    },success:function(result){
                        $(".loading-block").removeClass("active");
                        $(".ticket-review-result").show();
                        $(".ticket-review-result").html(result.html);
                        $(".page-manager-ticket-issue").addClass("active");
                        $(".ticket-review-result table").addClass("table");
                        $(".ticket-review-result table").wrap('<div class="table-responsive"></div>');
                    }
                });
            }else if(airline=="QH"){
                let tableArr = [];
                var html = $(".ticket-review-result").html();
                let last_row;
                let count = 0;
                $(".ticket-review-result>div>table").each(function(e){
                    last_row = $(this).html();
                    tableArr[count] = last_row;
                    count++;
                });
                console.log("tableArr",tableArr);
                let flights = [];
                $(".flights .flight").each(function (e) {
                    flights.push($(this).html());
                });
                var flight = $(".flights").html();
                var first_row = $(".ticket-review-result table#guestTable").html();
                // var last_row = $(".ticket-review-result table:last-child").html();
                let TotalAdult = 0;
                let TotalLeg = $(".flights").attr("data-length");
                $(".ADULT").each(function (e) {
                    TotalAdult++;
                })
                // $(".flights table tbody>tr").each(function (e) {
                //     TotalLeg++;
                // })
                // console.log(first_row);
                $.ajax({
                    method:"POST",
                    url:"/cassiopeia/ajax",
                    data:{
                        cmd:"get-ticket-QH",
                        html:html,
                        code:code,
                        flight:flight,
                        flights:flights,
                        first_row:first_row,
                        last_row:last_row,
                        TotalAdult:TotalAdult,
                        TotalLeg:TotalLeg,
                    },success:function(result){
                        $(".loading-block").removeClass("active");
                        $(".ticket-review-result").show();
                        $(".ticket-review-result").html(result.html);
                        if(result.TotalPrice>0){
                            $(".page-manager-ticket-issue").addClass("active");
                            $(".ticket-review-result table").addClass("table");
                            $(".ticket-review-result table").wrap('<div class="table-responsive"></div>');
                        }else{
                            $(".page-manager-ticket-issue").html("");
                        }

                    }
                });
            }else if(airline==="VN"){
                $.ajax({
                    method:"POST",
                    url:"/cassiopeia/ajax",
                    data:{
                        cmd:"get-ticket-VN",
                        code:code,
                    },success:function(result){
                        $(".loading-block").removeClass("active");
                        $(".ticket-review-result").show();
                        $(".ticket-review-result").append(result.html);
                        $(".page-manager-ticket-issue").addClass("active");
                    }
                });
            }else if(airline==="VU"){
                let tableArr = [];
                let count = 0;
                $(".ticket-review-result>div>table").each(function(e){
                    last_row = $(this).html();
                    tableArr[count] = last_row;
                    count++;
                });
                var flights = $(".ticket-review-result .flights table").html();
                $(".ticket-review-result").html("");
                console.log("flights",flights);
                $.ajax({
                    method:"POST",
                    url:"/cassiopeia/ajax",
                    data:{
                        cmd:"get-ticket-VU-review",
                        airline:airline,
                        code:code,
                        last_row:last_row,
                        html:html,
                        flights:flights,
                    },success:function(result){
                        $(".loading-block").removeClass("active");
                        $(".ticket-review-result").show();
                        $(".ticket-review-result").html(result.html);
                        $(".page-manager-ticket-issue").addClass("active");
                    }
                });
            }
        }


        // var last_row = $(".ticket-review-result table:last-child").html();
        console.log(airline);
        console.log(last_row);
        // $("form button").click(function(e){
        //     var airline = $("form select[name='airline']").val();
        //     var code = $("form input[name='code']").val();
        //     $.ajax({
        //         method:"POST",
        //         url:"/cassiopeia/ajax",
        //         data:{
        //             cmd:"get-ticket-review",
        //             airline:airline,
        //             code:code,
        //         },success:function(result){
        //             $(".loading-block").removeClass("active");
        //             $(".ticket-review-result").html(result.html);
        //         }
        //     });
        //     return false;
        // });
    });
})(jQuery);
