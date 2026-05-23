<?php
global $user;
$page           = !empty($variables['page'])?$variables['page']:1;
$itinerary      = $variables['itinerary'];
$items          = $variables['items'];
$info           = $variables['info'];
$customFee = str_replace(".","",$info->customFee);
$_SESSION['custom_fee'] = $customFee;
$limit          = 50;
$start          = ($page-1)*$limit;

?>
<!--fffff-->
<?php if(!empty($items)): ?>
    <?php $key=1; ?>
    <?php foreach($items as $FlightSession => $FlightItem): ?>
        <?php        
        if(empty($startpoint)){
            $startpoint = cassiopeia_get_airport($FlightItem->StartPoint);
        }
        if(empty($endpoint)){
            $endpoint = cassiopeia_get_airport($FlightItem->EndPoint);
        }

        $AirlineCode = $FlightItem->AirlineCode;
        $airline        = cassiopeia_get_airline($AirlineCode);
        $show_fee = 0;
        $MostCheapFlight = cassiopeia_meta_get_most_cheap_flight($FlightItem->FareOptions);
        $raw_fee = $MostCheapFlight->PriceAdult;
        $show_fee = cassiopeia_qt_price_fix($MostCheapFlight->FeeAdult) + cassiopeia_qt_price_fix($MostCheapFlight->TaxAdult) + cassiopeia_qt_price_fix($MostCheapFlight->PriceAdult);
        $agent_fee = cassiopeia_user_agent_fee_load_by_class($FlightItem->AirlineCode,$FlightItem->ListSegment[0]->Class);
        $service_fee = cassiopeia_user_service_fee_load_by_class($FlightItem->AirlineCode,$FlightItem->ListSegment[0]->Class);
//        _print_r($MostCheapFlight);
//        _print_r($agent_fee);
//        _print_r($service_fee);
        $show_fee+=$agent_fee['fee'];
//        if(empty($user->uid)){
            $show_fee+=$service_fee['fee'];
//        }
        $raw_fee = cassiopeia_qt_price_fix($raw_fee);
        $show_fee = cassiopeia_qt_price_fix($show_fee);
        if(!empty($MostCheapFlight->SeatsAvailable)){
            $SeatsRemaining = "(".$MostCheapFlight->SeatsAvailable.")";
        }
        ?>
        <div data-FareOptionSession="<?php echo $MostCheapFlight->FareOptionSession; ?>" data-duration="<?php echo $FlightItem->Duration; ?>" data-enddate="<?php print(strtotime($FlightItem->EndDate)); ?>" data-FlightSession="<?php echo $FlightItem->FlightSession; ?>" data-startdate="<?php print(strtotime($FlightItem->StartDate)); ?>" data-full-price="<?php print($show_fee); ?>" data-Itinerary="<?php print($itinerary); ?>" data-FlightNumber="<?php print($FlightItem->FlightNumber); ?>" data-Airline="<?php print($AirlineCode); ?>" class="flight-item item">
            <div class="logo">
                <?php
                $num = $FlightItem->FlightNumber;
                if (strpos($num, 'VN') !== false) {
                    $new_num = str_replace("VN","",$num);
                    $_length = strlen($new_num);
                    if($_length==4 && (strpos((string)$num,"VN4")!==false || strpos((string)$num,"VN6")!==false)){
                        ?>
                        <img style="" src="/sites/all/themes/cassiopeia_theme/img/icons/logo-pacific-airlines.jpg" alt="">
                        <?php
                    }else{
                        if($_length==4 && (strpos((string)$num,"VN8")!==false)){
                            ?>
                            <img style="" src="/sites/all/themes/cassiopeia_theme/img/icons/vasco_logo_1.jpg" alt="">
                            <?php
                        }else{
                            cassiopeia_render_airline_logo($AirlineCode);
                        }
                    }

                }else{
                    cassiopeia_render_airline_logo($AirlineCode);
                }
                ?>
<!--                <div class="airline">-->
<!--                    --><?php //if(!empty($airline)) print($airline->name); ?>
<!--                </div>-->
            </div>
            <div class="startpoint">
                <div>
                    <?php  print(date("H:i",strtotime($FlightItem->StartDate))); ?>
                </div>
<!--                <div>
                    <?php
//                    if(!empty($startpoint)) print($startpoint->city);
                    ?>
                </div>-->
            </div>
            <div class="between">-</div>
            <div class="endpoint">
                <div>
                    <?php  print(date("H:i",strtotime($FlightItem->EndDate))); ?>
                </div>
<!--                <div>
                    <?php
//                    if(!empty($endpoint)) print($endpoint->city);
                    ?>
                </div>-->
            </div>
            <div class="flight-no">
                <div class="flight-number <?php if($FlightItem->Stops>=1) print("multiple-segment"); ?>">
                    <?php print($FlightItem->FlightNumber); ?>
                </div>
            </div>
            
            
            <div class="price">
                <?php
                $num = $FlightItem->FlightNumber;
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
                    if($_length==4 && (strpos((string)$num,"VN8")!==false)){
                        ?>
                        <span class="Promo-Ticket">!</span>
                        <div class="promo-alert">
                            Khai thác bởi VASCO
                        </div>
                        <?php
                    }
                }
                ?>
               <span class="tax-fee">
                    <span class="active" data-airline="<?php echo $AirlineCode ?>" data-ListSegment='<?php echo json_encode($FlightItem->ListSegment); ?>' data-FlightSession="<?php echo $FlightItem->FlightSession; ?>">
                        <?php echo number_format($show_fee,0,",",".")." <strong>đ</strong>&nbsp;" . $SeatsRemaining; ?>
                    </span>
                   <?php if(!empty($user->uid)): ?>
                       <ul>

                        </ul>
                   <?php endif; ?>
                </span>
                <span class="non-tax-fee">
                    <span class="active" data-airline="<?php echo $AirlineCode ?>" data-ListSegment='<?php echo json_encode($FlightItem->ListSegment); ?>' data-FlightSession="<?php echo $FlightItem->FlightSession; ?>">
                        <?php echo number_format($raw_fee,0,",",".")." <strong>đ</strong>"; ?>
                    </span>
                    <?php if(!empty($user->uid)): ?>
                        <ul></ul>
                    <?php endif; ?>
                </span>
            </div>
            <div class="details">
                <div><span data-index="<?php print($key); ?>" data-ListSegment='<?php echo json_encode($FlightItem->ListSegment); ?>' class="btn-view-detail" data-airline="<?php print($AirlineCode); ?>">
                        <span class="detail-text"><?php print(t("Chi tiết")); ?></span>
                        &nbsp;
                        <i class="fa-solid fa-chevron-down"></i>
                    </span>
                </div>
            </div>
            <div class="choose">
                <span class="btn-choose" data-chosen="0" data-custom-fee="<?php echo $customFee ?>">
                    <?php print(t("Chọn vé")); ?>
                </span>
            </div>

            <div class="detail" data-index="<?php print($key); ?>">
            </div>
            <?php
            $num = $FlightItem->FlightNumber;
            if (strpos($num, 'VN') !== false) {
                $new_num = str_replace("VN","",$num);
                $_length = strlen($new_num);
                if($_length==4 && (strpos((string)$num,"VN4")!==false || strpos((string)$num,"VN6")!==false)){
                    ?>
                    <div class="promo-alert visible-xs">
                        Khai thác bởi Pacific Airlines
                    </div>
                    <?php
                }
                if($_length==4 && (strpos((string)$num,"VN8")!==false)){
                    ?>
                    <div class="promo-alert visible-xs">
                        Khai thác bởi VASCO Airlines
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

