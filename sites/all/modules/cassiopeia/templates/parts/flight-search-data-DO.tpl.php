<?php
global $user;
$departures     = array();
$returns        = array();
$page           = !empty($variables['page'])?$variables['page']:1;
$itinerary      = $variables['itinerary'];
$Airline        = $variables['Airline'];
$airline        = cassiopeia_get_airline($Airline);
$items          = $variables['items'];
$info           = $variables['info'];
$customFee = str_replace(".","",$info->customFee);
//_print_r($customFee);
$_SESSION['custom_fee'] = $customFee;
$limit          = 50;
$start          = ($page-1)*$limit;
//_print_r($items);
?>
<!--fffff-->
<?php if(!empty($items)): ?>
    <?php $key=1; ?>
    <?php foreach($items as $FlightNumber => $ListFlights): ?>
        <?php
        $Flight = cassiopeia_get_most_cheap_flight($ListFlights);
        if(empty($startpoint)){
            $startpoint = cassiopeia_get_airport($Flight['StartPoint']);
        }
        if(empty($endpoint)){
//            _print_r(cassiopeia_get_airport($Flight['EndPoint']));
            $endpoint = cassiopeia_get_airport($Flight['EndPoint']);
        }
        $region_fee = null;
        $show_fee = 0;
        if($endpoint->country_code=="VN"){
            $region_code = "DO";
        }else{
            $region_code = $endpoint->region_code;
        }
        _print_r($region_code);
        $region_fee = cassiopeia_get_fee_by_airline_and_region($airline->iata,$region_code);
        _print_r($region_fee);
        $raw_fee = $Flight['PriceAdult'];
        $show_fee = $Flight['FeeAdult'] + $Flight['TaxAdult'] + $Flight['PriceAdult'];

        if(!empty($region_fee)){
            $show_fee+=$region_fee['value'];
        }
        _print_r($show_fee);
        $show_fee+=$customFee;
        $show_fee+=$_SESSION['silver_rank_fee'];
        ?>
        <div SelectValue="<?php echo $Flight['SelectValue']; ?>" data-startdate="<?php print(strtotime($Flight['StartDate'])); ?>" data-full-price="<?php print($show_fee); ?>" data-Itinerary="<?php print($itinerary); ?>" data-FlightNumber="<?php print($FlightNumber); ?>" data-Airline="<?php print($Airline); ?>" class="flight-item item">
            <div class="logo">
                <?php cassiopeia_render_airline_logo($airline->iata); ?>
                <div class="airline">
                    <?php if(!empty($airline)) print($airline->name); ?>
                </div>
            </div>
            <div class="startpoint">
                <div>
                    <?php  print(date("H:i",strtotime($Flight['StartDate']))); ?>
                </div>
                <div>
                    <?php
                    if(!empty($startpoint)) print($startpoint->city);
                    ?>
                </div>
            </div>
            <div class="between">
                <div class="flight-number <?php if(count($Flight['Stops'])>=1) print("multiple-segment"); ?>">
                    <?php print($Flight['ListAvailFlights']['AvailFlight']['FlightNumber']); ?>
                </div>
                <div class="segment-type"></div>
                <div><span data-index="<?php print($key); ?>" data='<?php echo json_encode($ListFlights); ?>' class="btn-view-detail" data-airline="<?php print($Airline); ?>" data-class="<?php print($Flight['ListAvailFlights']['AvailFlight']['Class']); ?>" ><?php print(t("Chi tiết")); ?></span></div>
            </div>
            <div class="endpoint">
                <div>
                    <?php  print(date("H:i",strtotime($Flight['EndDate']))); ?>
                </div>
                <div>
                    <?php
                    if(!empty($endpoint)) print($endpoint->city);
                    ?>
                </div>
            </div>
            <div class="price">
                <?php if($Flight['ListAvailFlights']['AvailFlight']['Class']=="Promo" && $Airline=="VJ"): ?>
                    <span class="Promo-Ticket">!</span>
                    <div class="promo-alert">
                        <?php print(variable_get("cassiopeia_config_booking_promo_alert")); ?>
                    </div>
                <?php else: ?>

                <?php endif; ?>
                <?php
                $num = $FlightNumber;
                if (strpos($num, 'VN') !== false) {
                    $new_num = str_replace("VN","",$num);
                    $_length = strlen($new_num);
                    if($_length==4 && (strpos((string)$num,"VN4")!==false || strpos((string)$num,"VN6")!==false)){
                        ?>
                        <span class="Promo-Ticket">!</span>
                        <div class="promo-alert">
                            Khai thác bởi Pacific Airlines
                        </div>
                        <?php
                    }
                }
                ?>
               <span class="tax-fee">
                    <span class="active" airline="<?php echo $Airline ?>" data='<?php echo json_encode($ListFlights); ?>' SelectValue="<?php echo $Flight['SelectValue']; ?>">
                        <?php echo number_format($show_fee,0,",",".")." <strong>đ</strong>"; ?>
                    </span>
                   <?php if(!empty($user->uid)): ?>
                       <ul>

                        </ul>
                   <?php endif; ?>
                </span>
                <span class="non-tax-fee">
                    <span class="active" airline="<?php echo $Airline ?>" data='<?php echo json_encode($ListFlights); ?>' SelectValue="<?php echo $Flight['SelectValue']; ?>">
                        <?php echo number_format($raw_fee,0,",",".")." <strong>đ</strong>"; ?>
                    </span>
                    <?php if(!empty($user->uid)): ?>
                        <ul></ul>
                    <?php endif; ?>
                </span>
            </div>
            <div class="choose">
                <span class="btn-choose" data-chosen="0" data-custom-fee="<?php echo $customFee ?>">
                    <?php print(t("Chọn vé")); ?>
                </span>
            </div>

            <div class="detail" data-index="<?php print($key); ?>">
<!--                <div class="block-container">-->
<!--                    --><?php //foreach($Flight['ListAvailFlights'] as $AvailFlight): ?>
<!--                        --><?php
//                        $_startpoint = cassiopeia_get_airport($AvailFlight['StartPoint']);
//                        $_endpoint = cassiopeia_get_airport($AvailFlight['EndPoint']);
//                        ?>
<!--                        <div class="row">-->
<!--                            <div class="airline-icon col-md-3">-->
<!--                                --><?php //cassiopeia_render_airline_logo($airline->iata); ?>
<!--                            </div>-->
<!--                            <div class="detail-departure col-md-3">-->
<!--                                <div>--><?php //if(!empty($_startpoint)) print($_startpoint->city); print("(".$AvailFlight['StartPoint'].")"); ?><!--</div>-->
<!--                                <div>--><?php //cassiopeia_render_airport_name($_startpoint);  ?><!--</div>-->
<!--                                <div>Cất cánh: --><?php //print(date("H:i",strtotime($AvailFlight['StartDate']))); ?><!-- </div>-->
<!--                                <div>Ngày: --><?php //print(date("d/m/Y",strtotime($AvailFlight['StartDate']))); ?><!-- </div>-->
<!--                            </div>-->
<!--                            <div class="detail-return col-md-3">-->
<!--                                <div>--><?php //if(!empty($_endpoint)) print($_endpoint->city); print("(".$AvailFlight['EndPoint'].")"); ?><!--</div>-->
<!--                                <div>--><?php //cassiopeia_render_airport_name($_endpoint);  ?><!--</div>-->
<!--                                <div>Hạ cánh: --><?php //print(date("H:i",strtotime($AvailFlight['EndDate']))); ?><!-- </div>-->
<!--                                <div>Ngày: --><?php //print(date("d/m/Y",strtotime($AvailFlight['EndDate']))); ?><!-- </div>-->
<!--                            </div>-->
<!--                            <div class="detail-end-point col-md-3">-->
<!--                                <div>Chuyến bay: --><?php //print($AvailFlight['FlightNumber']) ?><!--</div>-->
<!--                                <div>Thời gian bay: --><?php // print(floor($AvailFlight['Duration']/60)."h ".($AvailFlight['Duration']%60)."p"); ?><!--</div>-->
<!--                                --><?php //if($Flight->Airline=="VN"): ?>
<!--                                    <div>Hạng chỗ: --><?php //print($AvailFlight['Class']); ?><!--</div>-->
<!--                                --><?php //else: ?>
<!--                                    <div>Hạng chỗ: --><?php //print($AvailFlight['Class']); ?><!--</div>-->
<!--                                --><?php //endif; ?>
<!--                                <div>Máy bay: --><?php //print($AvailFlight['FlightNumber']); ?><!--</div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    --><?php //endforeach; ?>
<!--                    <div class="fare-rules">-->
<!---->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

