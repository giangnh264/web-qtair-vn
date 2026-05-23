<?php drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/flight-search.js', ['weight' => 10000000]); ?>
<?php
global $user;
$_SESSION['QT-CLIENT-IP'] = !empty($_SESSION['QT-CLIENT-IP'])?$_SESSION['QT-CLIENT-IP']: get_client_ip();
?>
<?php //if(!empty($user->uid)): ?>
    <?php
    if(empty($_REQUEST['DepartureCode-0'])){
        drupal_goto("/");
    }
    $silver_rank_fee = 0;
    $_SESSION['silver_rank_fee'] = $silver_rank_fee;
    $customFee = isset($_REQUEST['custom_fee'])?$_REQUEST['custom_fee']:130000;
    $customFee = str_replace(".","",$customFee);
    if(empty($user->uid)){
        //$silver_rank_fee = variable_get("silver_rank_fee");
        $customFee = 130000;
    }else{
        $issue_query = db_select("tbl_issue_report","tbl_issue_report");
        $issue_query->fields("tbl_issue_report",array("created","partner_price","agent"));

        $room_query = db_select("tbl_room_booking_report","tbl_room_booking_report");
        $room_query->fields("tbl_room_booking_report",array("created"));
        $room_query->addField("tbl_room_booking_report","partner_price","partner_price");
        $room_query->addField("tbl_room_booking_report","agent","agent");

        $quer1y = Database::getConnection()
            ->select($issue_query->union($room_query))
            ->fields(NULL, array("created","partner_price","agent"))
            ->orderBy("created","DESC");
        $quer1y->condition("created",array(strtotime(date("01-01-Y",REQUEST_TIME)),strtotime(date("31-12-Y",REQUEST_TIME))),"BETWEEN");
        $quer1y->addExpression("SUM(partner_price)","total_price");
        $quer1y->groupBy("agent");
        $quer1y->condition("agent",$user->uid);
        $_rank  = $quer1y -> execute() -> fetchObject();
        if(empty($_rank)||$_rank->total_price/1000000<1000){
        }
            $_SESSION['silver_rank_fee'] = $silver_rank_fee;
    }
    db_delete("tbl_session")->condition("client_ip",$_SESSION['QT-CLIENT-IP'])->execute(); // clear session
    db_delete("tbl_airline_session")->condition("client_ip",$_SESSION['QT-CLIENT-IP'])->execute(); // clear session
    $_SESSION['booking'] = null;
    $_SESSION['DOMESTIC_FLIGHTS'] = null;
    $_SESSION['TotalPrice'] = null;
    $_SESSION['TotalAgentRate'] = null;
    $startpoint = cassiopeia_get_airport($_REQUEST['DepartureCode-0']);
    $endpoint = cassiopeia_get_airport($_REQUEST['DestinationCode-0']);
    $search_date = date("d-m-Y",strtotime(str_replace("/","-",$_REQUEST['DepartureDate-0'])));
    if(!empty($_REQUEST['ReturnDate-0'])){
        $search_return_date = date("d-m-Y",strtotime(str_replace("/","-",$_REQUEST['ReturnDate-0'])));
    }
    $DO = true;
    if($startpoint->country_code!="VN" || $endpoint->country_code!="VN"){
        $DO = false;
    }
    $key = $_REQUEST['TripType'].$_REQUEST['DepartureCode-0'].$_REQUEST['DestinationCode-0'].str_replace("/","",$_REQUEST['DepartureDate-0']).str_replace("/","",$_REQUEST['ReturnDate-0']).$_REQUEST['Adults'].$_REQUEST['Childrens'].$_REQUEST['Infants'];
    $search_datas = array();
    $search_datas['TripType'] = $_REQUEST['TripType'];
    $search_datas['DepartureCode-0'] = $_REQUEST['DepartureCode-0'];
    $search_datas['DestinationCode-0'] = $_REQUEST['DestinationCode-0'];
    $search_datas['DepartureDate-0'] = str_replace("/","",$_REQUEST['DepartureDate-0']);
    $search_datas['ReturnDate-0'] = str_replace("/","",$_REQUEST['ReturnDate-0']);
    $search_datas['Adults'] = $_REQUEST['Adults'];
    $search_datas['Childrens'] = $_REQUEST['Childrens'];
    $search_datas['Infants'] = $_REQUEST['Infants'];
    $search_datas['custom_fee'] = $customFee;
    $_SESSION['data-search'] = $search_datas;
    $query = db_select("tbl_session","tbl_session");
    $query -> fields("tbl_session");
    $query -> condition("id",$key,"=");
    $query -> condition("created",REQUEST_TIME-86400,">");
    $session_api = $query -> execute()->fetchAll();
//    _print_r($DO);
    ?>
    <input type="hidden" id="session_key" value="<?php print($key); ?>">
    <?php if(!empty($startpoint) && !empty($endpoint)): ?>
        <span class="flight-info"
              data-radio = "<?php print(!empty($_REQUEST['TripType'])?($_REQUEST['TripType']):""); ?>"
              data-StartPoint = "<?php print(!empty($_REQUEST['DepartureCode-0'])?($_REQUEST['DepartureCode-0']):""); ?>"
              data-EndPoint   = "<?php print(!empty($_REQUEST['DestinationCode-0'])?($_REQUEST['DestinationCode-0']):""); ?>"
              data-DepartDate = "<?php print(!empty($_REQUEST['DepartureDate-0'])?$_REQUEST['DepartureDate-0']:""); ?>"
              data-Airline = ""
              data-Adt = "<?php print(!empty($_REQUEST['Adults'])?($_REQUEST['Adults']):0); ?>"
              data-Chd = "<?php print(!empty($_REQUEST['Childrens'])?($_REQUEST['Childrens']):0); ?>"
              data-Inf = "<?php print(!empty($_REQUEST['Infants'])?($_REQUEST['Infants']):0); ?>"
              data-ReturnDate = "<?php print(!empty($_REQUEST['ReturnDate-0'])?$_REQUEST['ReturnDate-0']:""); ?>"
              data-customFee = "<?php print(!empty($customFee)?$customFee:""); ?>"
        ></span>
        <?php if($DO): ?>
            <?php drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/DO-flight-search.js', ['weight' => 10000000]); ?>
            <input type="hidden" id="flight_type" value="<?php print(!empty($_REQUEST['ReturnDate-0'])?2:1); ?>">
            <div class="page-flight-search">
                <div class="container">
                    <div class="page-top-block">
                        <div class="step">
                            <div class="step-1 active">
                                <i class="fa fa-plane"></i> <?php print(t("Choose a flight")); ?>
                            </div>
                            <div class="step-2">
                                <?php print(t("Booking")); ?>
                            </div>
                            <div class="step-3">
                                <?php print(t("Finish")); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="visible-xs">
                    <div class="d-flex justify-between  quick-buttons">
                        <div class="quick-button-search-flight-sort">
                            <i class="fa fa-filter"></i> Lọc chuyến bay
                        </div>
                        <div class="quick-button-search-form ">
                            <i class="fa fa-search"></i> Tìm chuyến bay
                        </div>
                    </div>
                </div>
                <div class="page-search-form">
                    <div class="close btn-close">&times;</div>
                    <div class="container">
                        <?php print(_cassiopeia_render_theme("module","cassiopeia","templates/forms/search-fly-form-type-1.tpl.php",array("data"=>$_REQUEST))); ?>
                    </div>
                </div>
                <div class="page-container container">
                    <div>
                        <div class="flights">
                            <div class="block-items col-md-8">
                                <div class="  domestic-search">
                                    <div class="flight-blocks flight-block-1 departure-flight-block">
                                        <div class="block-container">
                                            <div class="block-title">
                                                <div class="left-block">
                                                    <div>
                                                        <div>Chiều đi</div>
                                                        <div><span><?php print($startpoint->city); ?></span> (<?php print($startpoint->code); ?>) <span></span><span class="text">&nbsp;-&nbsp;</span> <span><?php print($endpoint->city); ?></span> (<?php print($endpoint->code); ?>) <span>&nbsp;-&nbsp;</span> <span class="time"><?php print(_cassiopeia_get_day_off_week(strtotime(str_replace("/","-",$_REQUEST['DepartureDate-0'])))); ?>, <?php print(date("d/m/Y",strtotime(str_replace("/","-",$_REQUEST['DepartureDate-0'])))); ?></span></div>
                                                    </div>
                                                </div>
                                                <div class="right-block">
                                                    <div>
                                                        &nbsp;
                                                    </div>
                                                    <div>Giá vé đã bao gồm thuế và phụ phí</div>
                                                </div>
                                            </div>
                                            <div class="flight-block-3 calendar-block">
                                                <?php
                                                $today = getdate();
                                                $month = $today['mon'];
                                                $day = $today['mday'];
                                                $year = $today['year'];
                                                $_date = date("d-m-Y",strtotime($year."-".$month."-".$day));
                                                if(!empty($_REQUEST['_date'])){
                                                    $_date = $_REQUEST['_date'];
                                                }
                                                if(!empty($_REQUEST['_key'])){
                                                    switch($_REQUEST['_key']){
                                                        case "next" :
                                                            $_date = date("d-m-Y",strtotime($_date ." +1 month"));
                                                            break;
                                                        case "prev" :
                                                            $_date = date("d-m-Y",strtotime($_date ." -1 month"));
                                                            break;
                                                        case "today" :
                                                            $_date = date("d-m-Y",REQUEST_TIME);
                                                            break;
                                                    }
                                                }
                                                $number_of_days = (int)(date("t",strtotime($_date)));
                                                $number_of_days_of_last_month = (int)(date("t",strtotime($_date." -1 month")));
                                                $weekday = date("D",strtotime("01-".date("m",strtotime($_date))."-".date("Y",strtotime($_date))));
                                                $_count = (int)getdate(strtotime("01-".date("m",strtotime($_date))."-".date("Y",strtotime($_date))))['wday'];
                                                $arr = array();
                                                for($i=$number_of_days_of_last_month-$_count+1;$i<=$number_of_days_of_last_month;$i++){
                                                    $arr[] = $i;
                                                }
                                                ?>
                                                <div class="block-content">
                                                    <div class="block-body">
                                                        <div class="<?php if($search_date==date("d-m-Y",strtotime($search_date ." -3 days"))) print("active"); if(strtotime($search_date ." -3 days")< strtotime(date("dmY"))) print("inactive"); ?>" data-date="<?php print(date("d/m/Y",strtotime($search_date ." -3 days"))); ?>">
                                                            <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_date ." -3 days"))))); ?></span>
                                                            <span><?php print(date("d/m",strtotime($search_date ." -3 days"))); ?></span>
                                                        </div >
                                                        <div class="<?php if($search_date==date("d-m-Y",strtotime($search_date ." -2 days"))) print("active"); if(strtotime($search_date ." -3 days")< strtotime(date("dmY"))) print("inactive");?>" data-date="<?php print(date("d/m/Y",strtotime($search_date ." -2 days"))); ?>">
                                                            <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_date ." -2 days"))))); ?></span>
                                                            <span><?php print(date("d/m",strtotime($search_date ." -2 days"))); ?></span>
                                                        </div>
                                                        <div class="<?php if($search_date==date("d-m-Y",strtotime($search_date ." -1 days"))) print("active"); if(strtotime($search_date ." -3 days")< strtotime(date("dmY"))) print("inactive");?>" data-date="<?php print(date("d/m/Y",strtotime($search_date ." -1 days"))); ?>">
                                                            <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_date ." -1 days"))))); ?></span>
                                                            <span><?php print(date("d/m",strtotime($search_date ." -1 days"))); ?></span>
                                                        </div>
                                                        <div class="<?php if($search_date==date("d-m-Y",strtotime($search_date ))) print("active");if(strtotime($search_date ." -3 days")< strtotime(date("dmY"))) print("inactive"); ?>" data-date="<?php print(date("d/m/Y",strtotime($search_date ))); ?>">
                                                            <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_date ))))); ?></span>
                                                            <span><?php print(date("d/m",strtotime($search_date ))); ?></span>
                                                        </div>
                                                        <div class="<?php if($search_date==date("d-m-Y",strtotime($search_date ." +1 days"))) print("active"); if(strtotime($search_date ." -3 days")< strtotime(date("dmY"))) print("inactive");?>" data-date="<?php print(date("d/m/Y",strtotime($search_date ." +1 days"))); ?>">
                                                            <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_date ." +1 days"))))); ?></span>
                                                            <span><?php print(date("d/m",strtotime($search_date ." +1 days"))); ?></span>
                                                        </div>
                                                        <div class="<?php if($search_date==date("d-m-Y",strtotime($search_date ." +2 days"))) print("active"); if(strtotime($search_date ." -3 days")< strtotime(date("dmY"))) print("inactive");?>" data-date="<?php print(date("d/m/Y",strtotime($search_date ." +2 days"))); ?>">
                                                            <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_date ." +2 days"))))); ?></span>
                                                            <span><?php print(date("d/m",strtotime($search_date ." +2 days"))); ?></span>
                                                        </div>
                                                        <div class="<?php if($search_date==date("d-m-Y",strtotime($search_date ." +3 days"))) print("active"); if(strtotime($search_date ." -3 days")< strtotime(date("dmY"))) print("inactive");?>" data-date="<?php print(date("d/m/Y",strtotime($search_date ." +3 days"))); ?>">
                                                            <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_date ." +3 days"))))); ?></span>
                                                            <span><?php print(date("d/m",strtotime($search_date ." +3 days"))); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="filter-block flight-block-2">
                                                <div>
													<label style="margin-top: 3px">Sắp xếp: </label>
                                                    <div data-block="departure-flight-block" data-sort="airline" data-direction="DESC"><b>HÃNG</B></div>
                                                    <div data-block="departure-flight-block" data-sort="start-time" data-direction="DESC"><b>GIỜ KHỞI HÀNH</b></div>
                                                    <div data-block="departure-flight-block" data-sort="duration" data-direction="DESC"><b>THỜI GIAN BAY</b></div>
                                                    <div data-block="departure-flight-block" data-sort="end-time" data-direction="DESC"><b>GIỜ HẠ CÁNH</b></div>
                                                    <div class="active" data-block="departure-flight-block" data-sort="price" data-direction="DESC"><b>GIÁ</b></div>
                                                </div>
                                            </div>
                                            <div class="departure-block flight-blocks domestic-search">
                                                <div id="list-of-flight" class="list-of-flight">
                                                    <div class="block-result">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if(!empty($_REQUEST['TripType']) && $_REQUEST['TripType']=="RT"): ?>
                                        <div class="flight-blocks flight-block-1 return-flight-block">
                                            <div class="block-container">
                                                <div class="block-title">
                                                    <div class="left-block">
<!--                                                        <span class="fa fa-plane"></span>-->
                                                        <div>
                                                            <div>Chiều về</div>
                                                            <div><span><?php print($endpoint->city); ?></span> (<?php print($endpoint->code); ?>) <span></span> <span class="text">&nbsp;-&nbsp;</span><span><?php print($startpoint->city); ?></span> (<?php print($startpoint->code); ?>) <span>&nbsp;-&nbsp;</span> <span class="time"><?php print(_cassiopeia_get_day_off_week(strtotime(str_replace("/","-",$_REQUEST['ReturnDate-0'])))); ?>, <?php print(date("d/m/Y",strtotime(str_replace("/","-",$_REQUEST['ReturnDate-0'])))); ?></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="right-block">
                                                        <div>
                                                            &nbsp;
                                                        </div>
                                                        <div>Giá vé đã bao gồm thuế và phụ phí</div>
                                                    </div>
                                                </div>
                                                <div class="flight-block-3 calendar-block">
                                                    <?php
                                                    $today = getdate();
                                                    $month = $today['mon'];
                                                    $day = $today['mday'];
                                                    $year = $today['year'];
                                                    $_date = date("d-m-Y",strtotime($year."-".$month."-".$day));
                                                    if(!empty($_REQUEST['_date'])){
                                                        $_date = $_REQUEST['_date'];
                                                    }
                                                    if(!empty($_REQUEST['_key'])){
                                                        switch($_REQUEST['_key']){
                                                            case "next" :
                                                                $_date = date("d-m-Y",strtotime($_date ." +1 month"));
                                                                break;
                                                            case "prev" :
                                                                $_date = date("d-m-Y",strtotime($_date ." -1 month"));
                                                                break;
                                                            case "today" :
                                                                $_date = date("d-m-Y",REQUEST_TIME);
                                                                break;
                                                        }
                                                    }
                                                    $number_of_days = (int)(date("t",strtotime($_date)));
                                                    $number_of_days_of_last_month = (int)(date("t",strtotime($_date." -1 month")));
                                                    $weekday = date("D",strtotime("01-".date("m",strtotime($_date))."-".date("Y",strtotime($_date))));
                                                    $_count = (int)getdate(strtotime("01-".date("m",strtotime($_date))."-".date("Y",strtotime($_date))))['wday'];
                                                    $arr = array();
                                                    for($i=$number_of_days_of_last_month-$_count+1;$i<=$number_of_days_of_last_month;$i++){
                                                        $arr[] = $i;
                                                    }
                                                    ?>
                                                    <div class="block-content">
                                                        <div class="block-body">
                                                            <div class="<?php if(strtotime($search_return_date ." -3 days")<strtotime($search_date)) print("invalid-date"); if($search_return_date==date("d-m-Y",strtotime($search_return_date ." -3 days"))) print("active"); if(strtotime($search_return_date ." -3 days")< strtotime(date("dmY"))) print("inactive"); ?>" data-date="<?php print(date("d/m/Y",strtotime($search_return_date ." -3 days"))); ?>">
                                                                <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_return_date ." -3 days"))))); ?></span>
                                                                <span><?php print(date("d/m",strtotime($search_return_date ." -3 days"))); ?></span>
                                                            </div >
                                                            <div class="<?php if(strtotime($search_return_date ." -2 days")<strtotime($search_date)) print("invalid-date"); if($search_return_date==date("d-m-Y",strtotime($search_return_date ." -2 days"))) print("active"); if(strtotime($search_return_date ." -3 days")< strtotime(date("dmY"))) print("inactive");?>" data-date="<?php print(date("d/m/Y",strtotime($search_return_date ." -2 days"))); ?>">
                                                                <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_return_date ." -2 days"))))); ?></span>
                                                                <span><?php print(date("d/m",strtotime($search_return_date ." -2 days"))); ?></span>
                                                            </div>
                                                            <div class="<?php if(strtotime($search_return_date ." -1 days")<strtotime($search_date)) print("invalid-date"); if($search_return_date==date("d-m-Y",strtotime($search_return_date ." -1 days"))) print("active"); if(strtotime($search_return_date ." -3 days")< strtotime(date("dmY"))) print("inactive");?>" data-date="<?php print(date("d/m/Y",strtotime($search_return_date ." -1 days"))); ?>">
                                                                <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_return_date ." -1 days"))))); ?></span>
                                                                <span><?php print(date("d/m",strtotime($search_return_date ." -1 days"))); ?></span>
                                                            </div>
                                                            <div class="<?php  if($search_return_date==date("d-m-Y",strtotime($search_return_date ))) print("active");if(strtotime($search_return_date ." -3 days")< strtotime(date("dmY"))) print("inactive"); ?>" data-date="<?php print(date("d/m/Y",strtotime($search_return_date ))); ?>">
                                                                <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_return_date ))))); ?></span>
                                                                <span><?php print(date("d/m",strtotime($search_return_date ))); ?></span>
                                                            </div>
                                                            <div class="<?php if($search_return_date==date("d-m-Y",strtotime($search_return_date ." +1 days"))) print("active"); if(strtotime($search_return_date ." -3 days")< strtotime(date("dmY"))) print("inactive");?>" data-date="<?php print(date("d/m/Y",strtotime($search_return_date ." +1 days"))); ?>">
                                                                <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_return_date ." +1 days"))))); ?></span>
                                                                <span><?php print(date("d/m",strtotime($search_return_date ." +1 days"))); ?></span>
                                                            </div>
                                                            <div class="<?php if($search_return_date==date("d-m-Y",strtotime($search_return_date ." +2 days"))) print("active"); if(strtotime($search_return_date ." -3 days")< strtotime(date("dmY"))) print("inactive");?>" data-date="<?php print(date("d/m/Y",strtotime($search_return_date ." +2 days"))); ?>">
                                                                <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_return_date ." +2 days"))))); ?></span>
                                                                <span><?php print(date("d/m",strtotime($search_return_date ." +2 days"))); ?></span>
                                                            </div>
                                                            <div class="<?php if($search_return_date==date("d-m-Y",strtotime($search_return_date ." +3 days"))) print("active"); if(strtotime($search_return_date ." -3 days")< strtotime(date("dmY"))) print("inactive");?>" data-date="<?php print(date("d/m/Y",strtotime($search_return_date ." +3 days"))); ?>">
                                                                <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_return_date ." +3 days"))))); ?></span>
                                                                <span><?php print(date("d/m",strtotime($search_return_date ." +3 days"))); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="filter-block flight-block-2">
                                                    <div>
                                                        <div data-block="return-flight-block" data-sort="airline" data-direction="DESC">Hàng không</div>
                                                        <div data-block="return-flight-block" data-sort="start-time" data-direction="DESC">Giờ khởi hành</div>
                                                        <div data-block="return-flight-block" data-sort="duration" data-direction="DESC">Thời gian bay</div>
                                                        <div data-block="return-flight-block" data-sort="end-time" data-direction="DESC">Giờ hạ cánh</div>
                                                        <div class="active" data-block="return-flight-block" data-sort="price" data-direction="DESC">Giá chuyến bay</div>
                                                    </div>
                                                </div>
                                                <div class="return-block flight-blocks domestic-search">
                                                    <div id="list-of-flight" class="list-of-flight">
                                                        <div class="block-result">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="visible-xs itinerary-info">
                                        <div class="search-flight-block-filter your-flight">
                                            <div class="block-title">
                                                <i class="fa fa-filter"></i> Chuyến bay của bạn
                                            </div>
                                            <div class="block-items">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="itinerary">
                                        <div class="itinerary-container">

                                        </div>
                                    </div>
                                    <div class="visible-xs">
<!--                                        --><?php //print(_cassiopeia_render_theme("module","cassiopeia","templates/forms/search-fly-form-type-1.tpl.php",array("cache"=>$_REQUEST,"data"=>$_REQUEST))); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="block-filter"> 
                                    
                                </div>
<!--                                --><?php //print(_cassiopeia_render_theme("module","cassiopeia","templates/forms/search-fly-form-type-1.tpl.php",array("cache"=>$_REQUEST,"data"=>$_REQUEST))); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <input type="hidden" id="flight_type" value="<?php print(!empty($_REQUEST['ReturnDate-0'])?2:1); ?>">
            <?php drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/international-flight-search.js', ['weight' => 10000000]); ?>

            <div class="page-flight-search">
                <div class="container">
                    <div class="page-top-block">
                        <div class="step">
                            <div class="step-1 active">
                                <i class="fa fa-plane"></i> <?php print(t("Choose a flight")); ?>
                            </div>
                            <div class="step-2">
                                <?php print(t("Booking")); ?>
                            </div>
                            <div class="step-3">
                                <?php print(t("Finish")); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="visible-xs">
                    <div class="d-flex justify-between  quick-buttons">
                        <div class="quick-button-search-flight-sort">
                            <i class="fa fa-filter"></i> Lọc chuyến bay
                        </div>
                        <div class="quick-button-search-form ">
                            <i class="fa fa-search"></i> Tìm chuyến bay
                        </div>
                    </div>
                </div>
                <div class="page-search-form">
                    <div class="close btn-close">&times;</div>
                    <div class="container">
                        <?php print(_cassiopeia_render_theme("module","cassiopeia","templates/forms/search-fly-form-type-1.tpl.php",array("data"=>$_REQUEST))); ?>
                    </div>
                </div>
                <div class="page-container container">
                    <div>
                        <div class="flights">
                            <div class="block-items col-md-8">
                                <div class="international-search">
                                    <div class=" flight-block-1 RT-flight-block">
                                        <div class="block-container">
                                            <div class="block-title">
                                                <div class="left-block">
                                                    <span class="fa fa-plane"></span>
                                                    <div>
                                                        <div>
                                                            <?php print($startpoint->city); ?> (<?php print($startpoint->code); ?>)
                                                            <?php if(!empty($search_return_date)): ?>
                                                                <i class="fa fa-arrows-h"></i>
                                                            <?php else: ?>
                                                                <i class="fa fa-long-arrow-right"></i>
                                                            <?php endif; ?>
                                                            <?php print($endpoint->city); ?> (<?php print($endpoint->code); ?>)
                                                        </div>
                                                        <div>Ngày đi : <?php print(_cassiopeia_get_day_off_week(strtotime(str_replace("/","-",$_REQUEST['DepartureDate-0'])))); ?>, <?php print(date("d/m/Y",strtotime(str_replace("/","-",$_REQUEST['DepartureDate-0'])))); ?>
                                                            <?php if(!empty($search_return_date)): ?>
                                                                <i class="fa fa-arrows-h"></i> Ngày về : <?php print(_cassiopeia_get_day_off_week(strtotime(str_replace("/","-",$_REQUEST['ReturnDate-0'])))); ?>, <?php print(date("d/m/Y",strtotime(str_replace("/","-",$_REQUEST['ReturnDate-0'])))); ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flight-block-3 calendar-block">
                                                <?php
                                                $today = getdate();
                                                $month = $today['mon'];
                                                $day = $today['mday'];
                                                $year = $today['year'];
                                                $_date = date("d-m-Y",strtotime($year."-".$month."-".$day));
                                                if(!empty($_REQUEST['_date'])){
                                                    $_date = $_REQUEST['_date'];
                                                }
                                                if(!empty($_REQUEST['_key'])){
                                                    switch($_REQUEST['_key']){
                                                        case "next" :
                                                            $_date = date("d-m-Y",strtotime($_date ." +1 month"));
                                                            break;
                                                        case "prev" :
                                                            $_date = date("d-m-Y",strtotime($_date ." -1 month"));
                                                            break;
                                                        case "today" :
                                                            $_date = date("d-m-Y",REQUEST_TIME);
                                                            break;
                                                    }
                                                }
                                                $number_of_days = (int)(date("t",strtotime($_date)));
                                                $number_of_days_of_last_month = (int)(date("t",strtotime($_date." -1 month")));
                                                $weekday = date("D",strtotime("01-".date("m",strtotime($_date))."-".date("Y",strtotime($_date))));
                                                $_count = (int)getdate(strtotime("01-".date("m",strtotime($_date))."-".date("Y",strtotime($_date))))['wday'];
                                                $arr = array();
                                                for($i=$number_of_days_of_last_month-$_count+1;$i<=$number_of_days_of_last_month;$i++){
                                                    $arr[] = $i;
                                                }
                                                ?>
                                                <div class="block-content">
                                                    <div class="block-body">
                                                        <div class="<?php if($search_date==date("d-m-Y",strtotime($search_date ." -3 days"))) print("active"); if(strtotime($search_date ." -3 days")< strtotime(date("dmY"))) print("inactive"); ?>" data-date="<?php print(date("d/m/Y",strtotime($search_date ." -3 days"))); ?>">
                                                            <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_date ." -3 days"))))); ?></span>
                                                            <span><?php print(date("d/m",strtotime($search_date ." -3 days"))); ?></span>
                                                        </div >
                                                        <div class="<?php if($search_date==date("d-m-Y",strtotime($search_date ." -2 days"))) print("active"); if(strtotime($search_date ." -3 days")< strtotime(date("dmY"))) print("inactive");?>" data-date="<?php print(date("d/m/Y",strtotime($search_date ." -2 days"))); ?>">
                                                            <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_date ." -2 days"))))); ?></span>
                                                            <span><?php print(date("d/m",strtotime($search_date ." -2 days"))); ?></span>
                                                        </div>
                                                        <div class="<?php if($search_date==date("d-m-Y",strtotime($search_date ." -1 days"))) print("active"); if(strtotime($search_date ." -3 days")< strtotime(date("dmY"))) print("inactive");?>" data-date="<?php print(date("d/m/Y",strtotime($search_date ." -1 days"))); ?>">
                                                            <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_date ." -1 days"))))); ?></span>
                                                            <span><?php print(date("d/m",strtotime($search_date ." -1 days"))); ?></span>
                                                        </div>
                                                        <div class="<?php if($search_date==date("d-m-Y",strtotime($search_date ))) print("active");if(strtotime($search_date ." -3 days")< strtotime(date("dmY"))) print("inactive"); ?>" data-date="<?php print(date("d/m/Y",strtotime($search_date ))); ?>">
                                                            <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_date ))))); ?></span>
                                                            <span><?php print(date("d/m",strtotime($search_date ))); ?></span>
                                                        </div>
                                                        <div class="<?php if($search_date==date("d-m-Y",strtotime($search_date ." +1 days"))) print("active"); if(strtotime($search_date ." -3 days")< strtotime(date("dmY"))) print("inactive");?>" data-date="<?php print(date("d/m/Y",strtotime($search_date ." +1 days"))); ?>">
                                                            <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_date ." +1 days"))))); ?></span>
                                                            <span><?php print(date("d/m",strtotime($search_date ." +1 days"))); ?></span>
                                                        </div>
                                                        <div class="<?php if($search_date==date("d-m-Y",strtotime($search_date ." +2 days"))) print("active"); if(strtotime($search_date ." -3 days")< strtotime(date("dmY"))) print("inactive");?>" data-date="<?php print(date("d/m/Y",strtotime($search_date ." +2 days"))); ?>">
                                                            <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_date ." +2 days"))))); ?></span>
                                                            <span><?php print(date("d/m",strtotime($search_date ." +2 days"))); ?></span>
                                                        </div>
                                                        <div class="<?php if($search_date==date("d-m-Y",strtotime($search_date ." +3 days"))) print("active"); if(strtotime($search_date ." -3 days")< strtotime(date("dmY"))) print("inactive");?>" data-date="<?php print(date("d/m/Y",strtotime($search_date ." +3 days"))); ?>">
                                                            <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_date ." +3 days"))))); ?></span>
                                                            <span><?php print(date("d/m",strtotime($search_date ." +3 days"))); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="filter-block flight-block-2">
                                                <div>
                                                    <label for="">Sắp xếp: </label>
                                                    <div class="sort-price">
                                                        <span>Giá vé</span>
                                                        <div>
                                                            <i data-block="departure-flight-block" class="fa fa-caret-up" title="Giá tăng dần"></i>
                                                            <i data-block="departure-flight-block" class="fa fa-caret-down" title="Giá giảm dần"></i>
                                                        </div>
                                                    </div>
                                                    <div class="sort-time">
                                                        <span>Thời gian khởi hành</span>
                                                        <div>
                                                            <i data-block="departure-flight-block" class="fa fa-caret-up" title=""></i>
                                                            <i data-block="departure-flight-block" class="fa fa-caret-down" title=""></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="departure-flight-block flight-blocks international-search">
                                                <div id="list-of-flight" class="list-of-flight">
                                                    <div class="block-DO">
                                                        <div class="block-DO-result-departure-head">

                                                        </div>
                                                        <div class="block-DO-result">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="return-flight-block flight-blocks international-search">
                                                <div id="list-of-flight" class="list-of-flight">
                                                    <div class="block-DO">
                                                        <div class="block-DO-result-return-head">

                                                        </div>
                                                        <div class="block-DO-result">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="departure-flight-block flight-blocks international-search">
                                                <div id="list-of-flight" class="list-of-flight">
                                                    <div class="block-result">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="itinerary">
                                        <div class="itinerary-container">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="block-filter">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


    <?php endif; ?>
<?php //else: ?>
<!--    <div id="modal_custom_login" class="check_login active">-->
<!--        <div class="modal_content">-->
<!--            <div class="modal_header">-->
<!--                Đăng nhập-->
<!--                <span class="close">&times;</span>-->
<!--            </div>-->
<!--            <div class="modal_body">-->
<!--                --><?php
//                $cassiopeia_partner_register_form = drupal_get_form("cassiopeia_custom_user_login_form");
//                if(!empty($cassiopeia_partner_register_form)){
//                    $cassiopeia_partner_register_form = drupal_render($cassiopeia_partner_register_form);
//                    print($cassiopeia_partner_register_form);
//                }
//                ?>
<!--                <div class="register">-->
<!--                    <a href="/user/register">Đăng ký tại đây</a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<?php //endif; ?>

<div class="expired-searching">
    <div class="block-container">
        <div>
            Bạn đã không thao tác gì trong một thời gian, dữ liệu chuyến bay có thể đã thay đổi, vui lòng thực hiện tìm kiếm lại!
        </div>
        <div>
            <button>Tìm kiếm lại</button>
            <a href="/">Về trang chủ</a>
        </div>
    </div>
</div>