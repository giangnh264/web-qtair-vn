<?php
$info = $variables['info'];
$data = $variables['data'];
//print_r(($data));
?>
<!--<pre>-->
<!--    --><?php //print_r($data); ?>
<!--</pre>-->
<?php
$_DepartDate = $info->lightFlight[0]->DepartDate;
$_ReturnDate = $info->lightFlight[1]->DepartDate;
$__day = substr($_DepartDate,0,2);
$__month = substr($_DepartDate,2,2);
$__year = substr($_DepartDate,4);
$__Departure = $__year."-".$__month."-".$__day;

$__day = substr($_ReturnDate,0,2);
$__month = substr($_ReturnDate,2,2);
$__year = substr($_ReturnDate,4);
$__ReturnDate = $__year."-".$__month."-".$__day;
$departures = array();
$returns = array();
foreach($data->ListFareData as $item){
    if($item->Leg==0){
        $departures[] = $item;
    }else{
        $returns[] = $item;
    }
}
?>
<input type="hidden" id="flight_type" value="<?php print(!empty($returns)?2:1); ?>">
<?php if(!empty($data)): ?>
    <div class="departure-block flight-blocks domestic-search">
        <?php
        $flight = $data->ListFareData[0];
        $startpoint = cassiopeia_get_airport($info->lightFlight[0]->StartPoint);
        $endpoint = cassiopeia_get_airport($info->lightFlight[0]->EndPoint);
        $departure_date = $info->lightFlight[0]->DepartDate;
        $_day = substr($departure_date,0,2);
        $_month = substr($departure_date,2,2);
        $_year = substr($departure_date,4,4);
        $_date = $_day."-".$_month."-".$_year;
        $search_date =  $_year."-".$_month."-".$_day;
        $leg1_Date = $search_date;
        $airlines = array();
        $groupClass = array();
        $airlines['all'] = "Hãng hàng không";
        $groupClass['all'] = "Hạng đặt chỗ";
        foreach($data->ListFareData as $item){
            $airlines[$item->ListFlight[0]->Airline] = cassiopeia_get_airline($item->ListFlight[0]->Airline)->name;
            $groupClass[$item->ListFlight[0]->GroupClass] = $item->ListFlight[0]->GroupClass;
        }
        $caches['airlines'] = $airlines;
        $caches['groupClass'] = $groupClass;
        ?>

        <div id="list-of-flight" class="list-of-flight">
            <?php $item_index=1; ?>
            <?php foreach($departures as $item): if($item->Leg==1) break; ?>

                <?php
                $airline = cassiopeia_get_airline($item->Airline);
                ?>
                <div class="flight-item item" data-item-index="<?php print($item_index); ?>"  data-session="<?php print($data->Session); ?>" data-item='<?php print(json_encode($item)); ?>' data-startdate="<?php print(strtotime($item->ListFlight[0]->StartDate)); ?>" data-idata="<?php if(!empty($airline)) print($airline->iata); ?>" data-class="<?php print($item->ListFlight[0]->GroupClass); ?>" data-price="<?php print($item->FeeAdt); ?>">
                    <input type="hidden" class="flight-value" value="<?php print($item->ListFlight[0]->FlightValue); ?>">
                    <div class="logo">
                        <?php cassiopeia_render_airline_logo($airline->iata); ?>
                        <div class="airline">
                            <?php if(!empty($airline)) print($airline->name); ?>
                        </div>
                    </div>
                    <div class="startpoint">
                        <div>
                            <?php  print(date("H:i",strtotime($item->ListFlight[0]->StartDate))); ?>
                        </div>
                        <div>
                            <?php
                            $startpoint = cassiopeia_get_airport($item->ListFlight[0]->StartPoint);
                            if(!empty($startpoint)) print($startpoint->city);
                            //                            print_r($startpoint);
                            //                            print("(".$item->ListFlight[0]->StartPoint.")");
                            ?>
                        </div>
                    </div>
                    <div class="between">
                        <?php if(count($item->ListFlight[0]->ListSegment)<2): ?>
                            <!--                            <div>Bay thẳng</div>-->
                            <div class="flight-number">
                                <?php print($item->ListFlight[0]->FlightNumber); ?>
                            </div>
                            <div class="segment-type"></div>
                            <div><span data-index="<?php print($item_index); ?>" data-Session="<?php print($data->Session); ?>" data-FareDataId="<?php print($item->FareDataId); ?>" data-FlightValue="<?php print($item->ListFlight[0]->FlightValue); ?>" class="btn-view-detail"><?php print(t("Chi tiết")); ?></span></div>
                        <?php else: ?>

                        <?php endif; ?>
                    </div>
                    <div class="endpoint">
                        <div>
                            <?php  print(date("H:i",strtotime($item->ListFlight[0]->EndDate))); ?>
                        </div>
                        <div>
                            <?php
                            $endpoint = cassiopeia_get_airport($item->ListFlight[0]->EndPoint);
                            if(!empty($endpoint)) print($endpoint->city);
                            //                            print("(".$item->ListFlight[0]->EndPoint.")");
                            ?>
                        </div>
                    </div>
                    <div class="price">
                        <?php
                        if($endpoint->country_code=="VN"){
                            $region_code = "DO";
                        }else{
                            $region_code = $endpoint->region_code;
                        }
                        $region_fee = cassiopeia_get_fee_by_airline_and_region($airline->iata,$region_code);
                        $raw_fee = $item->FareAdt;
                        $show_fee = $item->FeeAdt + $item->TaxAdt + $item->FareAdt;
                        if(!empty($region_fee)){
                            $show_fee+=$region_fee['value'];
                        }
                        ?>
                        <span class="tax-fee">
                            <?php print(number_format($show_fee,0,",",".")); ?> đ
                        </span>
                        <span class="non-tax-fee">
                            <?php print(number_format($raw_fee,0,",",".")); ?> đ
                        </span>
                    </div>
                    <div class="choose">
                        <span class="btn-choose" data-chosen="0" data-item-index="<?php print($item_index); ?>">
                            <?php print(t("Chọn vé")); ?>
                        </span>
                    </div>
                    <div class="detail" data-index="<?php print($item_index); ?>">
                        <div class="block-container">
                            <div>
                                <div class="airline-icon">

                                </div>
                                <div class="airline-class">
                                    <div>Hãng bay: <?php if(!empty($airline)) print($airline->iata); ?> </div>
                                    <div>Loại vé: <?php print($item->ListFlight[0]->GroupClass); ?></div>
                                </div>
                                <div class="detail-start-point">
                                    <div><?php if(!empty($startpoint)) print($startpoint->city); print("(".$item->ListFlight[0]->StartPoint.")"); ?></div>
                                    <div><img src="/sites/all/themes/cassiopeia_theme/img/icons/clock-1.png" alt=""> <?php  print(date("H:i, d/m/Y",strtotime($item->ListFlight[0]->StartDate))); ?></div>
                                    <div><img src="/sites/all/themes/cassiopeia_theme/img/icons/plane-1.png" alt=""></div>
                                </div>
                                <div class="detail-fly-time">
                                    <div>
                                        <?php
                                        $datetime1 = new DateTime(date("Y-m-d H:i:s",strtotime($item->ListFlight[0]->EndDate)));
                                        $datetime2 = new DateTime(date("Y-m-d H:i:s",strtotime($item->ListFlight[0]->StartDate)));
                                        $interval = $datetime1->diff($datetime2);
                                        $elapsed = $interval->format('%h:%i ');
                                        echo $elapsed;
                                        ?>
                                    </div>
                                    <div><img src="/sites/all/themes/cassiopeia_theme/img/icons/plane-1.png" alt=""></div>
                                </div>
                                <div class="detail-end-point">
                                    <div><?php if(!empty($endpoint)) print($endpoint->city); print("(".$item->ListFlight[0]->EndPoint.")"); ?></div>
                                    <div><img src="/sites/all/themes/cassiopeia_theme/img/icons/clock-1.png" alt=""> <?php  print(date("H:i, d/m/Y",strtotime($item->ListFlight[0]->EndDate))); ?></div>
                                    <div><img src="/sites/all/themes/cassiopeia_theme/img/icons/plane-1.png" alt=""></div>
                                </div>
                            </div>
                            <div class="fare-rules">

                            </div>
                        </div>
                    </div>
                </div>
                <?php $item_index++; ?>
            <?php endforeach; ?>
        </div>
    </div>

<?php endif; ?>
<?php if(!empty($returns)): ?>
    <div class="return-block flight-blocks domestic-search">
        <?php
        $flight = $returns[0];
        $startpoint = cassiopeia_get_airport($info->lightFlight[1]->StartPoint);
        $endpoint = cassiopeia_get_airport($info->lightFlight[1]->EndPoint);
        $departure_date = $info->lightFlight[1]->DepartDate;
        $_day = substr($departure_date,0,2);
        $_month = substr($departure_date,2,2);
        $_year = substr($departure_date,4,4);
        $_date = $_day."-".$_month."-".$_year;
        $search_date =  $_year."-".$_month."-".$_day;
        $airlines = array();
        $groupClass = array();
        $airlines['all'] = "Hãng hàng không";
        $groupClass['all'] = "Hạng đặt chỗ";
        foreach($data->ListFareData as $item){
            $airlines[$item->ListFlight[0]->Airline] = cassiopeia_get_airline($item->ListFlight[0]->Airline)->name;
            $groupClass[$item->ListFlight[0]->GroupClass] = $item->ListFlight[0]->GroupClass;
        }
        $caches['airlines'] = $airlines;
        $caches['groupClass'] = $groupClass;
        ?>
        <div class="flight-block-1">
            <div class="block-container">
                <div class="left-block">
                    <img src="/sites/all/themes/cassiopeia_theme/img/icons/flight-icon-1.png" alt="">
                    <div>
                        <div>Chiều về</div>
                        <div><span><?php print($startpoint->city); ?> </span> (<?php print($info->lightFlight[0]->StartPoint); ?>) đi <span><?php print($endpoint->city); ?></span> (<?php print($info->lightFlight[0]->EndPoint); ?>) - <?php print(_cassiopeia_get_day_off_week(strtotime($_year."-".$_month."-".$_day))); ?>, <?php print($_day."/".$_month."/".$_year); ?></div>
                    </div>
                </div>
                <div class="right-block">
                    <div><?php print(count($departures)); ?> kết quả</div>
                    <div>Giá vé đã bao gồm thuế và phụ phí</div>
                </div>
            </div>
        </div>

        <div class="flight-block-3 calendar-block">
            <?php
            $today = getdate();
            $month = $today['mon'];
            $day = $today['mday'];
            $year = $today['year'];

            $_date = date("d-m-Y",strtotime($search_date));
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
                    <div class="<?php if(strtotime($search_date ." -3 days")<strtotime($leg1_Date)) print("invalid-date"); if($_ReturnDate==date("dmY",strtotime($search_date ." -3 days"))) print("active"); if(strtotime($search_date ." -3 days")< strtotime(date("dmY"))) print("inactive"); ?>" data-date="<?php print(date("dmY",strtotime($search_date ." -3 days"))); ?>">
                        <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_date ." -3 days"))))); ?></span>
                        <span><?php print(date("d/m",strtotime($search_date ." -3 days"))); ?></span>
                    </div >
                    <div class="<?php if($_ReturnDate==date("dmY",strtotime($search_date ." -2 days"))) print("active"); if(strtotime($search_date ." -3 days")< strtotime(date("dmY"))) print("inactive");?>" data-date="<?php print(date("dmY",strtotime($search_date ." -2 days"))); ?>">
                        <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_date ." -2 days"))))); ?></span>
                        <span><?php print(date("d/m",strtotime($search_date ." -2 days"))); ?></span>
                    </div>
                    <div class="<?php if($_ReturnDate==date("dmY",strtotime($search_date ." -1 days"))) print("active"); if(strtotime($search_date ." -3 days")< strtotime(date("dmY"))) print("inactive");?>" data-date="<?php print(date("dmY",strtotime($search_date ." -1 days"))); ?>">
                        <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_date ." -1 days"))))); ?></span>
                        <span><?php print(date("d/m",strtotime($search_date ." -1 days"))); ?></span>
                    </div>
                    <div class="<?php if($_ReturnDate==date("dmY",strtotime($search_date ))) print("active");if(strtotime($search_date ." -3 days")< strtotime(date("dmY"))) print("inactive"); ?>" data-date="<?php print(date("dmY",strtotime($search_date ))); ?>">
                        <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_date ))))); ?></span>
                        <span><?php print(date("d/m",strtotime($search_date ))); ?></span>
                    </div>
                    <div class="<?php if($_ReturnDate==date("dmY",strtotime($search_date ." +1 days"))) print("active"); if(strtotime($search_date ." -3 days")< strtotime(date("dmY"))) print("inactive");?>" data-date="<?php print(date("dmY",strtotime($search_date ." +1 days"))); ?>">
                        <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_date ." +1 days"))))); ?></span>
                        <span><?php print(date("d-m",strtotime($search_date ." +1 days"))); ?></span>
                    </div>
                    <div class="<?php if($_ReturnDate==date("dmY",strtotime($search_date ." +2 days"))) print("active"); if(strtotime($search_date ." -3 days")< strtotime(date("dmY"))) print("inactive");?>" data-date="<?php print(date("dmY",strtotime($search_date ." +2 days"))); ?>">
                        <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_date ." +2 days"))))); ?></span>
                        <span><?php print(date("d/m",strtotime($search_date ." +2 days"))); ?></span>
                    </div>
                    <div class="<?php if($_ReturnDate==date("dmY",strtotime($search_date ." +3 days"))) print("active");if(strtotime($search_date ." -3 days")< strtotime(date("dmY"))) print("inactive"); ?>" data-date="<?php print(date("dmY",strtotime($search_date ." +3 days"))); ?>">
                        <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_date ." +3 days"))))); ?></span>
                        <span><?php print(date("d/m",strtotime($search_date ." +3 days"))); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="filter-block flight-block-2">
            <!--        --><?php
            //        $cassiopeia_flight_search_filter_form = drupal_get_form("cassiopeia_flight_search_filter_form",$caches);
            //        if(!empty($cassiopeia_flight_search_filter_form)){
            //            $cassiopeia_flight_search_filter_form = drupal_render($cassiopeia_flight_search_filter_form);
            //            print($cassiopeia_flight_search_filter_form);
            //        }
            //        ?>
            <div>
                <label for="">Bộ lọc: </label>
                <select data-block="return-block" name="airlines" id="">
                    <?php if(!empty($airlines)): ?>
                        <?php foreach($airlines as $key => $airline): ?>
                            <option value="<?php print($key); ?>"><?php print($airline); ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <select data-block="return-block" name="groupClass" id="">
                    <?php if(!empty($groupClass)): ?>
                        <?php foreach($groupClass as $key => $airline): ?>
                            <option value="<?php print($key); ?>"><?php print($airline); ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
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
        <div id="list-of-flight"  class="list-of-flight">
<!--            --><?php //$item_index=1; ?>
            <?php foreach($returns as $item):  ?>
                <?php
                $airline = cassiopeia_get_airline($item->Airline);
                ?>
                <div class="flight-item item" data-item-index="<?php print($item_index); ?>" data-session="<?php print($data->Session); ?>" data-item='<?php print(json_encode($item)); ?>'  data-startdate="<?php print(strtotime($item->ListFlight[0]->StartDate)); ?>" data-idata="<?php if(!empty($airline)) print($airline->iata); ?>" data-class="<?php print($item->ListFlight[0]->GroupClass); ?>" data-price="<?php print($item->FeeAdt); ?>">
                    <div class="logo">
                        <?php cassiopeia_render_airline_logo($airline->iata); ?>
                        <div class="airline">
                            <?php if(!empty($airline)) print($airline->name); ?>
                        </div>
                    </div>
                    <div class="startpoint">
                        <div>
                            <?php  print(date("H:i",strtotime($item->ListFlight[0]->StartDate))); ?>
                        </div>
                        <div>
                            <?php
                            $startpoint = cassiopeia_get_airport($item->ListFlight[0]->StartPoint);
                            if(!empty($startpoint)) print($startpoint->city);
                            ?>
                        </div>
                    </div>
                    <div class="between">
                        <?php if(count($item->ListFlight[0]->ListSegment)<2): ?>
                            <div class="flight-number">
                                <?php print($item->ListFlight[0]->FlightNumber); ?>
                            </div>
                            <div class="segment-type"></div>
                            <div><span data-index="<?php print($item_index); ?>" data-Session="<?php print($data->Session); ?>" data-FareDataId="<?php print($item->FareDataId); ?>" data-FlightValue="<?php print($item->ListFlight[0]->FlightValue); ?>" class="btn-view-detail"><?php print(t("Chi tiết")); ?></span></div>
                        <?php else: ?>

                        <?php endif; ?>
                    </div>
                    <div class="endpoint">
                        <div>
                            <?php  print(date("H:i",strtotime($item->ListFlight[0]->EndDate))); ?>
                        </div>
                        <div>
                            <?php
                            $endpoint = cassiopeia_get_airport($item->ListFlight[0]->EndPoint);
                            if(!empty($endpoint)) print($endpoint->city);
                            ?>
                        </div>
                    </div>
                    <div class="price">
                        <?php
                        if($endpoint->country_code=="VN"){
                            $region_code = "DO";
                        }else{
                            $region_code = $endpoint->region_code;
                        }
                        $region_fee = cassiopeia_get_fee_by_airline_and_region($airline->iata,$region_code);
                        $show_fee = $item->FeeAdt + $item->TaxAdt + $item->FareAdt;
                        if(!empty($region_fee)){
                            $show_fee+=$region_fee['value'];
                        }
                        $raw_fee = $item->FareAdt;
                        ?>
                        <span class="tax-fee">
                            <?php print(number_format($show_fee,0,",",".")); ?> đ
                        </span>
                        <span class="non-tax-fee">
                            <?php print(number_format($raw_fee,0,",",".")); ?> đ
                        </span>
                    </div>
                    <div class="choose">
                        <span class="btn-choose" data-chosen="0" data-item-index="<?php print($item_index); ?>">
                            <?php print(t("Chọn vé")); ?>
                        </span>
                    </div>
                    <div class="detail" data-index="<?php print($item_index); ?>">
                        <div class="block-container">
                            <div>
                                <div class="airline-icon">

                                </div>
                                <div class="airline-class">
                                    <div>Hãng bay: <?php if(!empty($airline)) print($airline->iata); ?> </div>
                                    <div>Loại vé: <?php print($item->ListFlight[0]->GroupClass); ?></div>
                                </div>
                                <div class="detail-start-point">
                                    <div><?php if(!empty($startpoint)) print($startpoint->city); print("(".$item->ListFlight[0]->StartPoint.")"); ?></div>
                                    <div><img src="/sites/all/themes/cassiopeia_theme/img/icons/clock-1.png" alt=""> <?php  print(date("H:i, d/m/Y",strtotime($item->ListFlight[0]->StartDate))); ?></div>
                                    <div><img src="/sites/all/themes/cassiopeia_theme/img/icons/plane-1.png" alt=""></div>
                                </div>
                                <div class="detail-fly-time">
                                    <div>
                                        <?php
                                        $datetime1 = new DateTime(date("Y-m-d H:i:s",strtotime($item->ListFlight[0]->EndDate)));
                                        $datetime2 = new DateTime(date("Y-m-d H:i:s",strtotime($item->ListFlight[0]->StartDate)));
                                        $interval = $datetime1->diff($datetime2);
                                        $elapsed = $interval->format('%h:%i ');
                                        echo $elapsed;
                                        ?>
                                    </div>
                                    <div><img src="/sites/all/themes/cassiopeia_theme/img/icons/plane-1.png" alt=""></div>
                                </div>
                                <div class="detail-end-point">
                                    <div><?php if(!empty($endpoint)) print($endpoint->city); print("(".$item->ListFlight[0]->EndPoint.")"); ?></div>
                                    <div><img src="/sites/all/themes/cassiopeia_theme/img/icons/clock-1.png" alt=""> <?php  print(date("H:i, d/m/Y",strtotime($item->ListFlight[0]->EndDate))); ?></div>
                                    <div><img src="/sites/all/themes/cassiopeia_theme/img/icons/plane-1.png" alt=""></div>
                                </div>
                            </div>
                            <div class="fare-rules">

                            </div>
                        </div>
                    </div>
                </div>
                <?php $item_index++; ?>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
<div class="itinerary">
    <div class="itinerary-container">

    </div>
</div>
