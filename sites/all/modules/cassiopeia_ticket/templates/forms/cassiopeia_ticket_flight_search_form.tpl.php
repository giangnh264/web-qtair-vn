<?php
global $user;
$custom_fee = $form['#data']->custom_fee;
$startpoint = cassiopeia_get_airport($form['#data']->StartPoint);
$endpoint = !empty($form['#data']->EndPoint)?cassiopeia_get_airport($form['#data']->EndPoint):null;
?>
<div class="page-flight-search">
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
    <div class="page-container container">
        <div>
            <div class="flights">
                <div class="block-items col-md-8">
                    <div class="  domestic-search">
                        <div class="flight-blocks flight-block-1 departure-flight-block">
                            <div class="block-container">
                                <div class="block-title">
                                    <div class="left-block">
                                        <span class="fa fa-plane"></span>
                                        <div>
                                            <div>Chiều đi</div>
                                            <div><span><?php print($startpoint->city); ?></span> (<?php print($startpoint->code); ?>) <span>đi</span><span class="text">-</span> <span><?php print($endpoint->city); ?></span> (<?php print($endpoint->code); ?>) <span>-</span> <span class="time"><?php print(_cassiopeia_get_day_off_week(strtotime(str_replace("/","-",$_REQUEST['DepartureDate-0'])))); ?>, <?php print(date("d/m/Y",strtotime(str_replace("/","-",$_REQUEST['DepartureDate-0'])))); ?></span></div>
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
                                <div class="departure-block flight-blocks domestic-search">
                                    <div id="list-of-flight" class="list-of-flight">
                                        <div class="block-result">
                                            <?php if(!empty($form['#search_result'])): ?>
                                                <?php
                                                $DepartureFlights = $form['#search_result']->Data->DepartureFlights;
                                                $DataSession = $form['#search_result']->Data->DataSession;
                                                $TotalPrice = 0;
                                                ?>
                                                <?php foreach($DepartureFlights as $FlightSession => $departureFlight): ?>
                                                    <?php $key = $DataSession."-".$FlightSession; ?>
                                                    <?php if(!empty($form['DepartureFlight'][$key])): ?>
                                                        <?php
                                                        $StartPoint = cassiopeia_get_airport($departureFlight->StartPoint);
                                                        $EndPoint = cassiopeia_get_airport($departureFlight->EndPoint);
                                                        $FareOption = $form['#FareOption'][$key];
                                                        $AdultPrice = $FareOption->PriceAdult+$FareOption->FeeAdult+$FareOption->TaxAdult;
                                                        $ChildrenPrice = $FareOption->PriceChild+$FareOption->FeeChild+$FareOption->TaxChild;
                                                        $InfantPrice = $FareOption->PriceInfant+$FareOption->FeeInfant+$FareOption->TaxInfant;
                                                        $AirlineCode = $departureFlight->AirlineCode;
                                                        $airline        = cassiopeia_get_airline($AirlineCode);
                                                        $raw_fee = $FareOption->PriceAdult;
                                                        $show_fee = $FareOption->FeeAdult + $FareOption->TaxAdult + $FareOption->PriceAdult +$custom_fee;
                                                        $show_fee+=$customFee;
                                                        ?>
                                                        <div class="flight-item item">
                                                            <div class="logo">
                                                                <?php cassiopeia_render_airline_logo($AirlineCode); ?>
                                                                <div class="airline">
                                                                    <?php if(!empty($airline)) print($airline->name); ?>
                                                                </div>
                                                            </div>
                                                            <div class="startpoint">
                                                                <div>
                                                                    <?php  print(date("H:i",strtotime($departureFlight->StartDate))); ?>
                                                                </div>
                                                                <div>
                                                                    <?php
                                                                    if(!empty($startpoint)) print($startpoint->city);
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <div class="between">
                                                                <div class="flight-number <?php if($departureFlight->Stops>=1) print("multiple-segment"); ?>">
                                                                    <?php print($departureFlight->FlightNumber); ?>
                                                                </div>
                                                                <div class="segment-type"></div>
                                                                <div><span  class="btn-view-detail"><?php print(t("Chi tiết")); ?></span></div>
                                                            </div>
                                                            <div class="endpoint">
                                                                <div>
                                                                    <?php  print(date("H:i",strtotime($departureFlight->EndDate))); ?>
                                                                </div>
                                                                <div>
                                                                    <?php
                                                                    if(!empty($endpoint)) print($endpoint->city);
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <div class="price">
                                                                <?php
                                                                if($AirlineCode == "BL"){
                                                                    ?>
                                                                    <span class="Promo-Ticket">!</span>
                                                                    <div class="promo-alert">
                                                                        Khai thác bởi Pacific Airlines
                                                                    </div>
                                                                    <?php
                                                                }
                                                                ?>
                                                                <span class="tax-fee">
                                                                <span class="active">
                                                                    <?php echo number_format($show_fee,0,",",".")." <strong>đ</strong>"; ?>
                                                                </span>
                                                                    <?php if(!empty($user->uid)): ?>
                                                                        <ul>

                                                                    </ul>
                                                                    <?php endif; ?>
                                                                </span>
                                                                <span class="non-tax-fee">
                                                                    <span class="active">
                                                                        <?php echo number_format($raw_fee,0,",",".")." <strong>đ</strong>"; ?>
                                                                    </span>
                                                                    <?php if(!empty($user->uid)): ?>
                                                                        <ul></ul>
                                                                    <?php endif; ?>
                                                                </span>
                                                            </div>
                                                            <div class="choose">
                                                                <?php
                                                                if(!empty($form['DepartureFlight'][$key]['choose'])) echo drupal_render($form['DepartureFlight'][$key]['choose']);
                                                                if(!empty($form['DepartureFlight'][$key]['un_choose'])) echo drupal_render($form['DepartureFlight'][$key]['un_choose']);
                                                                ?>
                                                            </div>

                                                            <div class="detail">
                                                                <?php echo drupal_render($form['DepartureFlight'][$key]['detail']); ?>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
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
                                            <span class="fa fa-plane"></span>
                                            <div>
                                                <div>Chiều về</div>
                                                <div><span><?php print($endpoint->city); ?></span> (<?php print($endpoint->code); ?>) <span>đi</span> <span class="text">-</span><span><?php print($startpoint->city); ?></span> (<?php print($startpoint->code); ?>) <span>-</span> <span class="time"><?php print(_cassiopeia_get_day_off_week(strtotime(str_replace("/","-",$_REQUEST['ReturnDate-0'])))); ?>, <?php print(date("d/m/Y",strtotime(str_replace("/","-",$_REQUEST['ReturnDate-0'])))); ?></span></div>
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
                                            <label for="">Sắp xếp: </label>
                                            <div class="sort-price">
                                                <span>Giá vé</span>
                                                <div>
                                                    <i data-block="return-block" class="fa fa-caret-up" title="Giá tăng dần"></i>
                                                    <i data-block="return-block" class="fa fa-caret-down" title="Giá giảm dần"></i>
                                                </div>
                                            </div>
                                            <div class="sort-time">
                                                <span>Thời gian khởi hành</span>
                                                <div>
                                                    <i data-block="return-block" class="fa fa-caret-up" title=""></i>
                                                    <i data-block="return-block" class="fa fa-caret-down" title=""></i>
                                                </div>
                                            </div>
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
                        <?php echo drupal_render($form['RightDetail']); ?>
                    </div>
                    <?php print(_cassiopeia_render_theme("module","cassiopeia","templates/forms/search-fly-form-type-1.tpl.php",array("cache"=>$_REQUEST,"data"=>$_REQUEST))); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo drupal_render($form['search']); ?>
<div class="hidden">
    <?php echo drupal_render_children($form); ?>
</div>