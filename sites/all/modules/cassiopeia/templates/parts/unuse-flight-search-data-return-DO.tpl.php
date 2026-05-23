<?php
$info = $variables['info'];
$data = $variables['data'];

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
<?php if(!empty($returns)): ?>
    <?php if(!empty($data)): ?>
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
        <?php $item_index=1; ?>
        <?php foreach($returns as $item):  ?>
            <?php
            $airline = cassiopeia_get_airline($item->Airline);
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
            <div class="flight-item item" data-item-index="return-<?php print($item->ListFlight[0]->FlightValue); ?>"  data-session="<?php print($data->Session); ?>" data-item='<?php print(json_encode($item)); ?>' data-startdate="<?php print(strtotime($item->ListFlight[0]->StartDate)); ?>" data-idata="<?php if(!empty($airline)) print($airline->iata); ?>" data-class="<?php print($item->ListFlight[0]->GroupClass); ?>" data-price="<?php print($item->FareAdt); ?>" data-full-price="<?php print($show_fee); ?>">
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
                        ?>
                    </div>
                </div>
                <div class="between">
                    <div class="flight-number">
                        <?php print($item->ListFlight[0]->FlightNumber); ?> <?php if(count($item->ListFlight[0]->ListSegment)>=2) print("(".count($item->ListFlight[0]->ListSegment)." điểm dừng)"); ?>
                    </div>
                    <div class="segment-type"></div>
                    <div><span data-index="<?php print($item_index); ?>" data-Session="<?php print($data->Session); ?>" data-FareDataId="<?php print($item->FareDataId); ?>" data-FlightValue="<?php print($item->ListFlight[0]->FlightValue); ?>" class="btn-view-detail"><?php print(t("Chi tiết")); ?></span></div>
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
                    <span class="tax-fee">
                    <?php print(number_format($show_fee,0,",",".")); ?> đ
                </span>
                    <span class="non-tax-fee">
                    <?php print(number_format($raw_fee,0,",",".")); ?> đ
                </span>
                </div>
                <div class="choose">
                <span class="btn-choose" data-chosen="0" data-item-index="return-<?php print($item->ListFlight[0]->FlightValue); ?>">
                    <?php print(t("Chọn vé")); ?>
                </span>
                </div>
                <div class="detail" data-index="<?php print($item_index); ?>">
                    <div class="block-container">
                        <div class="row">
                            <div class="airline-icon col-md-3">
                                <?php cassiopeia_render_airline_logo($airline->iata); ?>
                            </div>
                            <div class="detail-departure col-md-3">
                                <div><?php if(!empty($startpoint)) print($startpoint->city); print("(".$item->ListFlight[0]->StartPoint.")"); ?></div>
                                <div><?php cassiopeia_render_airport_name($startpoint);  ?></div>
                                <div>Cất cánh: <?php print(date("H:i",strtotime($item->ListFlight[0]->StartDate))); ?> </div>
                                <div>Ngày: <?php print(date("d/m/Y",strtotime($item->ListFlight[0]->StartDate))); ?> </div>
                            </div>
                            <div class="detail-return col-md-3">
                                <div><?php if(!empty($endpoint)) print($endpoint->city); print("(".$item->ListFlight[0]->EndPoint.")"); ?></div>
                                <div><?php cassiopeia_render_airport_name($endpoint);  ?></div>
                                <div>Hạ cánh: <?php print(date("H:i",strtotime($item->ListFlight[0]->EndDate))); ?> </div>
                                <div>Ngày: <?php print(date("d/m/Y",strtotime($item->ListFlight[0]->EndDate))); ?> </div>
                            </div>
                            <div class="detail-end-point col-md-3">
                                <div>Chuyến bay: <?php print($item->ListFlight[0]->FlightNumber) ?></div>
                                <div>Thời gian bay: <?php cassiopeia_render_flight_duration($item->ListFlight[0]); ?></div>
                                <div>Hạng chỗ: <?php print($item->ListFlight[0]->FareClass); ?></div>
                                <div>Máy bay: <?php print($item->ListFlight[0]->ListSegment[0]->Plane); ?></div>
                                <div>Hành lí xách tay: <?php print($item->ListFlight[0]->ListSegment[0]->HandBaggage); ?></div>
                                <?php if(!empty($item->ListFlight[0]->ListSegment[0]->AllowanceBaggage)): ?>
                                    <div>Hành lí ký gửi: <?php print($item->ListFlight[0]->ListSegment[0]->AllowanceBaggage); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="fare-rules">

                        </div>
                    </div>
                </div>
            </div>
            <?php $item_index++; ?>
        <?php endforeach; ?>
    <?php endif; ?>
<?php endif; ?>