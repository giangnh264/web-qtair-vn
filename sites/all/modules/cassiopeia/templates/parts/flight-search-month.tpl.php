<div class="departure-block">
    <?php
//    _print_r($info);
//    _print_r($data);
    $Departures = $data['DepartureFlights']['Days']['DayInMonth'];
    $returns = $data['ReturnFlights']['Days']['DayInMonth'];
    $StartPoint = cassiopeia_get_airport($info->DepartureAirportCode);
    $EndPoint = cassiopeia_get_airport($info->DestinationAirportCode);
    $departure_date = $info->DepartureDate;
    $return_date = $info->ReturnDate;
    $numnber_days = date("d",strtotime(date("Y-m-t", strtotime($departure_date))));
    $start_date = date("01-m-Y",strtotime($departure_date));
//    _print_r($start_date);
    $start_date = _cassiopeia_get_day_of_week(strtotime($start_date));
//    _print_r($start_date);
//    $departure_result = json_decode(cassiopeia_search_month($data));
//    _print_r($departure_result);
    if(!empty($departure_result)){
        $index = 1;
//                    _print_r($departure_result);
        foreach($departure_result->ListMinPrice as $value){
            $departures[$index] = $value;
            $index++;
        }
    }
    $currentDay = date("d",REQUEST_TIME);
    $Departures_values = array();
    if(!empty($Departures)){
        foreach($Departures as $departure){
            $Departures_values[$departure['Day']] = $departure['Fares'];
        }
    }
    $returns_values = array();
    if(!empty($returns)){
        foreach($returns as $departure){
            $returns_values[$departure['Day']] = $departure['Fares'];
        }
    }
    _print_r($Departures_values);
    ?>
    <?php if(!empty($Departures)): ?>
        <?php if(date("m",strtotime($departure_date))!=date("m",REQUEST_TIME)) $currentDay = 0; ?>
        <div class="block-title">
            <div>Chiều đi tháng <?php print(date("m/Y",strtotime($departure_date))); ?></div>
            <div><?php if(!empty($StartPoint)) print($StartPoint->city); ?> (<?php print($StartPoint->city_code) ?>) - <?php if(!empty($EndPoint)) print($EndPoint->city); ?> (<?php print($EndPoint->city_code) ?>)</div>
        </div>
        <div class="calendar-table">
            <div class="table-head">
                <div>Chủ Nhật</div>
                <div>Thứ Hai</div>
                <div>Thứ Ba</div>
                <div>Thứ Tư</div>
                <div>Thứ Năm</div>
                <div>Thứ Sáu</div>
                <div>Thứ Bảy</div>
            </div>
            <div class="table-body">
                <?php for($i=0;$i<$start_date['index'];$i++): ?>
                    <div><input type="text" disabled="disabled" readonly></div>
                <?php endfor; ?>
                <?php for($i=1;$i<=$currentDay;$i++): ?>
                    <div><span><?php echo $i; ?></span></div>
                <?php endfor; ?>
                <?php $listMinPrices = [];
                $superMin = [];?>
                <?php for($i=$currentDay+1;$i<=$numnber_days;$i++): ?>
                    <?php $j = $i; $min_price = 0; ?>
                    <?php
                    $min_price = 0;
                    ?>
                    <div style="display: none;">

                        <?php if(!empty($Departures_values[$j])): ?>
                            <?php $FareByAirline = !empty($Departures_values[$j]['FareByAirline'])?$Departures_values[$j]['FareByAirline']:array(); ?>
                            <div class="list-of-flights">
                                <?php
                                if(empty($FareByAirline[0])){
                                    $FareByAirline = array($FareByAirline);
                                }
                                ?>
                                <?php $t=1; foreach($FareByAirline as $flight): ?>
                                    <?php
//                                _print_r($flight);
                                    if($t==1){
                                        $min_price = $flight;
                                    }else{
                                        if($flight['TotalFare']<$min_price['TotalFare']) {
                                            $min_price = $flight;
                                        }
                                    }
                                    ?>
                                    <div class="item">
                                        <?php cassiopeia_render_airline_logo($flight['AirlineCode']); ?>
                                        <span><?php print(number_format($flight['TotalFare'],0,",",".")); ?> đ</span>
                                    </div>
                                    <?php $t++; endforeach; ?>
                                <?php
                                if($i==$currentDay+1){
                                    $superMin = $min_price;
                                    $superMin['check'] = true;
                                }else{
                                    if($min_price['TotalFare'] = $superMin['TotalFare']){
                                        $superMin['check'] = false;
                                    }
                                }
                                ?>
                                <?php $listMinPrices[$i] = $min_price; ?>
                            </div>
                            <input type="radio" name="DepartureDate-0" value="<?php print($i<10?"0".$i:$i);echo("-".date("m-Y",strtotime($departure_date))); ?>">
                        <?php else: ?>
                            <input type="radio">
                        <?php endif; ?>
                        <span><?php print($i); ?></span>
                        <?php if(!empty($min_price)): ?>
                            <span class="min-price hidden-xs">
                                <?php if($superMin['TotalFare'] == $min_price['TotalFare'] && $superMin['check']===true): ?>
                                    <b><?php print(number_format($min_price['TotalFare'],0,",",".")); ?> đ</b>
                                <?php else: ?>
                                    <?php print(number_format($min_price['TotalFare'],0,",",".")); ?> đ
                                <?php endif; ?>
                            </span>
                            <span class="min-price visible-xs">
                                  <?php if($superMin['TotalFare'] == $min_price['TotalFare'] && $superMin['check']===true): ?>
                                      <b><?php print(number_format($min_price['TotalFare']/1000,0,",",".")); ?> đ</b>
                                  <?php else: ?>
                                      <?php print(number_format($min_price['TotalFare']/1000,0,",",".")); ?> đ
                                  <?php endif; ?>
                            </span>
                        <?php else: ?>
                            <span> </span>
                        <?php endif; ?>
                    </div>
                <?php endfor; ?>
                <?php for($i=$currentDay+1;$i<=$numnber_days;$i++): ?>
                    <div>
                        <?php if(!empty($Departures_values[$j])): ?>
                            <?php $FareByAirline = !empty($Departures_values[$j]['FareByAirline'])?$Departures_values[$j]['FareByAirline']:array(); ?>
                            <div class="list-of-flights">
                                <?php
                                if(empty($FareByAirline[0])){
                                    $FareByAirline = array($FareByAirline);
                                }
                                ?>
                                <?php $t=1; foreach($FareByAirline as $flight): ?>
                                    <?php
                                    if($t==1){
                                        $min_price = $flight;
                                    }else{
                                        if($flight['TotalFare']<$min_price['TotalFare']) {
                                            $min_price = $flight;
                                        }
                                    }
                                    ?>
                                    <div class="item">
                                        <?php cassiopeia_render_airline_logo($flight['AirlineCode']); ?>
                                        <span><?php print(number_format($flight['TotalFare'],0,",",".")); ?> đ</span>
                                    </div>
                                    <?php $t++; endforeach; ?>
                            </div>
                            <input type="radio" name="DepartureDate-0" value="<?php print($i<10?"0".$i:$i);echo("-".date("m-Y",strtotime($departure_date))); ?>">
                        <?php else: ?>
                            <input type="radio">
                        <?php endif; ?>
                        <span><?php print($i); ?></span>
                        <?php if(!empty($min_price)):  ?>
                            <span class="min-price hidden-xs">
                                <?php if($superMin['TotalFare'] == $min_price['TotalFare'] && $superMin['check']==true): _print_r($superMin);?>
                                    <b><?php print(number_format($min_price['TotalFare'],0,",",".")); ?> đ</b>
                                <?php else: ?>
                                    <?php print(number_format($min_price['TotalFare'],0,",",".")); ?> đ
                                <?php endif; ?>
                            </span>
                            <span class="min-price visible-xs">
                                  <?php if($superMin['TotalFare'] == $min_price['TotalFare'] && $superMin['check']===true): ?>
                                      <b><?php print(number_format($min_price['TotalFare']/1000,0,",",".")); ?> đ</b>
                                  <?php else: ?>
                                      <?php print(number_format($min_price['TotalFare']/1000,0,",",".")); ?> đ
                                  <?php endif; ?>
                            </span>
                        <?php else: ?>
                            <span> </span>
                        <?php endif; ?>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    <?php else: ?>
        <div><b>Không tìm thấy chuyến bay!</b></div>
    <?php endif; ?>

</div>
<?php if(!empty($returns)): ?>
    <?php if(date("m",strtotime($return_date))!=date("m",REQUEST_TIME)) $currentDay = 0; ?>
    <div class="return-block">
        <?php
        $start_date = date("01-m-Y",strtotime($return_date));
        $start_date = _cassiopeia_get_day_of_week(strtotime($start_date));
//        _print_r($start_date);
//        if($start_date['index']<$currentDay){
//            $start_date['index'] = $currentDay+1;
//        }
        ?>
        <div class="block-title">
            <div>Chiều về tháng <?php print(date("m/Y",strtotime($return_date))); ?></div>
            <div><?php if(!empty($EndPoint)) print($EndPoint->city); ?> (<?php print($EndPoint->city_code) ?>) - <?php if(!empty($StartPoint)) print($StartPoint->city); ?> (<?php print($StartPoint->city_code) ?>)</div>
        </div>
        <div class="calendar-table">
            <div class="table-head">
                <div>Chủ Nhật</div>
                <div>Thứ Hai</div>
                <div>Thứ Ba</div>
                <div>Thứ Tư</div>
                <div>Thứ Năm</div>
                <div>Thứ Sáu</div>
                <div>Thứ Bảy</div>
            </div>
            <div class="table-body">
                <?php for($i=0;$i<$start_date['index'];$i++): ?>
                    <div><input type="text" disabled="disabled" readonly></div>
                <?php endfor; ?>
                <?php for($i=1;$i<=$currentDay;$i++): ?>
                    <div><span><?php echo $i; ?></span></div>
                <?php endfor; ?>
                <?php $listMinPrices = [];
                $superMin = [];?>
                <?php for($i=$currentDay+1;$i<=$numnber_days;$i++): ?>
                    <?php $j = $i-1; $min_price = 0; ?>
                    <?php
                    $min_price = 0;
                    ?>
                    <div style="display: none;">

                        <?php if(!empty($returns_values[$j])): ?>
                            <?php $FareByAirline = !empty($returns_values[$j]['FareByAirline'])?$returns_values[$j]['FareByAirline']:array();  ?>
                            <div class="list-of-flights">
                                <?php
                                if(empty($FareByAirline[0])){
                                    $FareByAirline = array($FareByAirline);
                                }
                                ?>
                                <?php $t=1; foreach($FareByAirline as $flight): ?>
                                    <?php
                                    if($t==1){
                                        $min_price = $flight;
                                    }else{
                                        if($flight['TotalFare']<$min_price['TotalFare']) {
                                            $min_price = $flight;
                                        }
                                    }
                                    ?>
                                    <div class="item">
                                        <?php cassiopeia_render_airline_logo($flight['AirlineCode']); ?>
                                        <span><?php print(number_format($flight['TotalFare'],0,",",".")); ?> đ</span>
                                    </div>
                                <?php $t++; endforeach; ?>
                                <?php
                                    if($i==$currentDay+1){
                                        $superMin = $min_price;
                                        $superMin['check'] = true;
                                    }else{
                                        if($min_price['TotalFare'] = $superMin['TotalFare']){
                                            $superMin['check'] = false;
                                        }
                                    }
                                ?>
                                <?php $listMinPrices[$i] = $min_price; ?>
                            </div>
                            <input type="radio" name="ReturnDate-0" value="<?php print($i<10?"0".$i:$i);echo("-".date("m-Y",strtotime($departure_date))); ?>">
                        <?php else: ?>
                            <input type="radio">
                        <?php endif; ?>
                        <span><?php print($i); ?></span>
                        <?php if(!empty($min_price)): ?>
                            <span class="min-price hidden-xs">
                                <?php if($superMin['TotalFare'] == $min_price['TotalFare'] && $superMin['check']===true): ?>
                                    <b><?php print(number_format($min_price['TotalFare'],0,",",".")); ?> đ</b>
                                <?php else: ?>
                                    <?php print(number_format($min_price['TotalFare'],0,",",".")); ?> đ
                                <?php endif; ?>
                            </span>
                            <span class="min-price visible-xs">
                                  <?php if($superMin['TotalFare'] == $min_price['TotalFare'] && $superMin['check']===true): ?>
                                      <b><?php print(number_format($min_price['TotalFare']/1000,0,",",".")); ?> đ</b>
                                  <?php else: ?>
                                      <?php print(number_format($min_price['TotalFare']/1000,0,",",".")); ?> đ
                                  <?php endif; ?>
                            </span>
                        <?php else: ?>
                            <span> </span>
                        <?php endif; ?>
                    </div>
                <?php endfor; ?>
                <?php for($i=$currentDay+1;$i<=$numnber_days;$i++): ?>
                    <?php $j = $i; $min_price = 0; ?>
                    <div>
                        <?php if(!empty($returns_values[$j])): ?>
                            <?php $FareByAirline = !empty($returns_values[$j]['FareByAirline'])?$returns_values[$j]['FareByAirline']:array(); ?>
                            <div class="list-of-flights">
                                <?php
                                if(empty($FareByAirline[0])){
                                    $FareByAirline = array($FareByAirline);
                                }
                                ?>
                                <?php $t=1; foreach($FareByAirline as $flight): ?>
                                    <?php
                                    if($t==1){
                                        $min_price = $flight;
                                    }else{
                                        if($flight['TotalFare']<$min_price['TotalFare']) {
                                            $min_price = $flight;
                                        }
                                    }
                                    ?>
                                    <div class="item">
                                        <?php cassiopeia_render_airline_logo($flight['AirlineCode']); ?>
                                        <span><?php print(number_format($flight['TotalFare'],0,",",".")); ?> đ</span>
                                    </div>
                                    <?php $t++; endforeach; ?>
                            </div>
                            <input type="radio" name="ReturnDate-0" value="<?php print($i<10?"0".$i:$i);echo("-".date("m-Y",strtotime($departure_date))); ?>">
                        <?php else: ?>
                            <input type="radio">
                        <?php endif; ?>
                        <span><?php print($i); ?></span>
                        <?php if(!empty($min_price)): ?>
                            <span class="min-price hidden-xs">
                                <?php if($superMin['TotalFare'] == $min_price['TotalFare'] && $superMin['check']==true): _print_r($superMin);?>
                                asdf ??
                                    <b><?php print(number_format($min_price['TotalFare'],0,",",".")); ?> đ</b>
                                <?php else: ?>
                                    <?php print(number_format($min_price['TotalFare'],0,",",".")); ?> đ
                                <?php endif; ?>
                            </span>
                            <span class="min-price visible-xs">
                                  <?php if($superMin['TotalFare'] == $min_price['TotalFare'] && $superMin['check']===true): ?>
                                      <b><?php print(number_format($min_price['TotalFare']/1000,0,",",".")); ?> đ</b>
                                  <?php else: ?>
                                      <?php print(number_format($min_price['TotalFare']/1000,0,",",".")); ?> đ
                                  <?php endif; ?>
                            </span>
                        <?php else: ?>
                            <span> </span>
                        <?php endif; ?>
                    </div>
                <?php endfor; ?>
<!--                --><?php //_print_r($listMinPrices); ?>
<!--                --><?php //_print_r($superMin); ?>
            </div>
        </div>
    </div>
<?php endif; ?>