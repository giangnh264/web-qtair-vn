<?php
function get_airport_info($airport_code)
{
    return cassiopeia_get_airport($airport_code);
}

function format_date_common($date)
{
    return date("Y-m-d", strtotime(str_replace("/", "-", $date)));
}

function calculate_region_code($point_1, $point_2)
{
    if ($point_2->country_code != "VN" && $point_1->country_code != "VN") {
        return "SOTO";
    } elseif ($point_2->country_code == "VN") {
        return $point_1->region_code;
    } else {
        return $point_2->region_code;
    }
}

function calculate_fees($flight, $is_return = false)
{
    $agent_fee = cassiopeia_user_agent_fee_load_by_class($flight->AirlineCode, $flight->ListSegment[0]->Class);
    $service_fee = cassiopeia_user_service_fee_load_by_class($flight->AirlineCode, $flight->ListSegment[0]->Class);
    $total_fee = $agent_fee['international_fee'] + $service_fee['international_fee'];

    if ($is_return) {
        return $total_fee;
    }

    return $total_fee;
}

global $language;
$Domestic_airlines = unserialize(DOMESTIC_AIRLINES);
$info = $variables['info'];
$customFee = str_replace(".", "", $info->customFee);
$data = $variables['data'];
$FlightGroups = $data->Data->FlightGroups;
$point_1 = get_airport_info($info->StartPoint);
$point_2 = get_airport_info($info->EndPoint);
$__Departure = format_date_common($info->DepartureDate);
$__ReturnDate = format_date_common($info->ReturnDate);

$departures = array();
$returns = array();
$airports = array();
$airlines = array();
$region_fee = 0;
$region_feeDP = 0;
$region_feeRT = 0;
$dataReturnFlights = "";

$page = !empty($variables['page']) ? $variables['page'] : 1;
$itinerary = !empty($variables['itinerary']) ? $variables['itinerary'] : null;
$Airline = !empty($variables['Airline']) ? $variables['Airline'] : "";
$airline = cassiopeia_get_airline("VJ");
$items = !empty($variables['items']) ? $variables['items'] : null;
$info = !empty($variables['info']) ? $variables['info'] : array();
$limit = 50;
$start = ($page - 1) * $limit;
$DepartureDate = str_replace("/", "-", $info->DepartureDate);
$ReturnDate = str_replace("/", "-", $info->ReturnDate);

?>
<input type="hidden" id="flight_type" value="<?php print(!empty($returns) ? 2 : 1); ?>">
<?php if (!empty($FlightGroups)) : ?>
    <?php foreach ($FlightGroups as $GroupSession => $FlightGroup) : ?>
        <?php
        $region_code = calculate_region_code($point_1, $point_2);
        $DepartureFlight = array_values((array)$FlightGroup->DepartureFlights)[0];
        $ReturnFlight = !empty($FlightGroup->ReturnFlights) ? array_values((array)$FlightGroup->ReturnFlights)[0] : null;
        $region_fee = 0;

        if ($ReturnFlight) {
            $region_fee += calculate_fees($DepartureFlight);
            $region_fee += calculate_fees($ReturnFlight, true);
            $__airline = $DepartureFlight->AirlineCode . $ReturnFlight->AirlineCode;
        } else {
            $region_fee += calculate_fees($DepartureFlight);
            $__airline = $DepartureFlight->AirlineCode;
        }
        //                _print_r($agent_fee);
        //                _print_r($service_fee);
        $__Airline = "";
        ?>
        <?php foreach ($FlightGroup->DepartureFlights as $FlightSession => $Flight) : ?>

            <div class="flight-item" data-Stops="" data-full-price="<?php print($FlightGroup->TotalPrice); ?>" data-idata="<?php echo $__airline; ?>">
                <div class="flights">
                    <div class="item">
                        <?php $stt = 1; ?>
                        <?php
                        $Flight = (object)$Flight;
                        $startpoint = cassiopeia_get_airport($Flight->StartPoint);
                        $endpoint = cassiopeia_get_airport($Flight->EndPoint);
                        $airline = cassiopeia_get_airline($Flight->AirlineCode);
                        $__Airline = $Flight->AirlineCode;
                        ?>
                        <div class="item-body <?= $stt == 1 ? "chosen" : ""; ?>" data-Stops="<?= $Flight->Stops; ?>" data-item='<?= json_encode($Flight); ?>'>
                            <div class="journey">
                                <div class="logo">
                                    <?php if (!empty($airline)) : ?>
                                        <?php cassiopeia_render_airline_logo($airline->iata); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="startpoint">
                                    <div><?= date("H:i", strtotime($Flight->StartDate)); ?></div>
                                    <div><?= !empty($startpoint) ? "{$startpoint->city} ({$startpoint->code})" : ""; ?></div>
                                </div>
                                <div class="between">
                                    <div class="stop-num">
                                        <span class="fa fa-plane"></span>
                                        <?= !empty($Flight->Stops) && $Flight->Stops > 0 ? "{$Flight->Stops} điểm dừng" : "Bay thẳng"; ?>
                                    </div>
                                    <div class="segment-type"></div>
                                    <div><span class="btn-view-detail"><?= t("Chi tiết"); ?></span></div>
                                </div>
                                <div class="endpoint">
                                    <div><?= !empty($Flight->EndDate) ? date("H:i", strtotime($Flight->EndDate)) : ""; ?></div>
                                    <div><?= !empty($endpoint) ? "{$endpoint->city} ({$endpoint->code})" : ""; ?></div>
                                </div>
                                <div class="bottom-block">
                                    <div class="TotalPriceDiv">
                                        <div class="total-price price" region-fee="<?php print($region_fee); ?>">
                                            <span class="tax-fee">
                                                <?php print(number_format($FlightGroup->PriceAdult + $region_fee, 0, ",", ".")); ?> VND
                                            </span>
                                            <span class="non-tax-fee">
                                                <?php print(number_format($FlightGroup->PriceAdult, 0, ",", ".")); ?> VND
                                            </span>
                                        </div>
                                        <?php if ($domesticAirline) { ?>
                                            <span class="Promo-Ticket">! <span class="tooltiptext">Vé được khai thác bởi hãng nội địa. Đại lý có thể tự xuất</span></span>
                                        <?php } ?>

                                        <div class="btn-choose" data-chosen="0" data-GroupSession="<?php echo $GroupSession ?>" data-custom-fee="<?php echo $customFee ?>">
                                            Chọn vé
                                        </div>
                                    </div>
                                    <div class="Details">
                                        <div class="rules btn-get-rules">
                                            <i class="fa fa-list-alt"></i> Điều kiện vé
                                        </div>
                                        <div class="btn-price-detail">
                                            <span class="fa fa-eye"></span> Chi tiết giá vé
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="detail">
                                <div class="block-title">
                                    <span class="fa fa-info"></span> Chi tiết chuyến bay
                                </div>
                                <?php foreach ($Flight->ListSegment as $Segment) : ?>
                                    <?php
                                    $Segment_startpoint = cassiopeia_get_airport($Segment->StartPoint);
                                    $Segment_endpoint = cassiopeia_get_airport($Segment->EndPoint);
                                    $Segment_airline = cassiopeia_get_airline($Segment->AirlineCode);
                                    ?>
                                    <div class="block-container">
                                        <div class="col-md-3">
                                            <?php if (!empty($Segment_airline)) : ?>
                                                <?php cassiopeia_render_airline_logo($Segment_airline->iata); ?>
                                                <div class="airline"><?= $Segment_airline->name; ?></div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-3">
                                            <div>
                                                <?= !empty($Segment_startpoint) ? "{$Segment_startpoint->city_vi} - {$Segment_startpoint->code}" : ""; ?>
                                            </div>
                                            <div><?= !empty($Segment_startpoint) ? $Segment_startpoint->name_vi : ""; ?></div>
                                            <div>Cất cánh: <?= date("H:i", strtotime($Segment->StartDate)); ?></div>
                                            <div>Ngày: <?= date("d/m/Y", strtotime($Segment->StartDate)); ?></div>
                                        </div>
                                        <div class="col-md-3">
                                            <div>
                                                <?= !empty($Segment_endpoint) ? "{$Segment_endpoint->city_vi} - {$Segment_endpoint->code}" : ""; ?>
                                            </div>
                                            <div><?= !empty($Segment_endpoint) ? $Segment_endpoint->name_vi : ""; ?></div>
                                            <div>Hạ cánh: <?= !empty($Segment->EndDate) ? date("H:i", strtotime($Segment->EndDate)) : ""; ?></div>
                                            <div>Ngày: <?= !empty($Segment->EndDate) ? date("d/m/Y", strtotime($Segment->EndDate)) : ""; ?></div>
                                        </div>
                                        <div class="col-md-3">
                                            <div>Chuyến bay: <?= $Segment->FlightNumber; ?></div>
                                            <div>Thời gian bay: <?= floor($Segment->FlightTime / 60) . "h " . ($Segment->FlightTime % 60) . "p"; ?></div>
                                            <div>Hạng chỗ: <?= $Segment->ClassAdult; ?></div>
                                            <div>Máy bay: <?= $Segment->Plane; ?></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php $stt++; ?>
                    </div>
                </div>
                <?php if (count((array)$FlightGroup->ReturnFlights) > 0) : ?>
                    <div class="flights">
                        <div class="item">
                            <?php $stt = 1; ?>
                            <?php foreach ($FlightGroup->ReturnFlights as $FlightSession => $Flight) : ?>
                                <?php
                                $Flight = (object)$Flight;
                                $startpoint = cassiopeia_get_airport($Flight->StartPoint);
                                $endpoint   = cassiopeia_get_airport($Flight->EndPoint);
                                $airline    = cassiopeia_get_airline($Flight->AirlineCode);
                                ?>
                                <div class="item-body <?php print($stt == 1 ? "chosen" : ""); ?>" data-Stops="<?php print($Flight->Stops); ?>" data-item='<?php print(json_encode($Flight)); ?>' data-session="<?php print($data->Session) ?>">
                                    <div class="journey">
                                        <div class="logo">
                                            <?php if (!empty($airline)) : ?>
                                                <?php cassiopeia_render_airline_logo($airline->iata); ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="startpoint">
                                            <div>
                                                <?php print(date("H:i", strtotime($Flight->StartDate))); ?>
                                            </div>
                                            <div>
                                                <?php if (!empty($startpoint)) print($startpoint->city); ?>
                                            </div>
                                        </div>
                                        <div class="between">
                                            <div class="stop-num">
                                                <span class="fa fa-plane"></span>
                                                <?php if (!empty($Flight->Stops) && $Flight->Stops > 0) : ?>
                                                    <?php print($Flight->Stops); ?> điểm dừng
                                                <?php else : ?>
                                                    Bay thẳng
                                                <?php endif; ?>
                                            </div>
                                            <div class="segment-type"></div>
                                            <!--                                        --><?php //_print_r($Flight); 
                                                                                            ?>
                                            <div><span class="btn-view-detail"><?php print(t("Chi tiết")); ?></span></div>
                                        </div>
                                        <div class="endpoint">
                                            <div>
                                                <?php if (!empty($Flight->EndDate)) print(date("H:i", strtotime($Flight->EndDate))); ?>
                                            </div>
                                            <div>
                                                <?php if (!empty($endpoint)) print($endpoint->city); ?>
                                            </div>
                                        </div>
                                        <div class="check">
                                            <input <?php print($stt == 1 ? "checked" : ""); ?> type="radio" name="radio-return-flight-<?php print($GroupSession); ?>" class="radio-return-flight " value="" data-FlightSession="<?php echo $FlightSession; ?>">
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <div class="block-title">
                                            <span class="fa fa-info"></span> Chi tiết chuyến bay
                                        </div>
                                        <?php foreach ($Flight->ListSegment as $Segment) : ?>
                                            <?php
                                            $Segment_startpoint    = cassiopeia_get_airport($Segment->StartPoint);
                                            $Segment_endpoint      = cassiopeia_get_airport($Segment->EndPoint);
                                            $Segment_airline           = cassiopeia_get_airline($Segment->AirlineCode);
                                            ?>
                                            <div class="block-container">
                                                <div class="col-md-3">
                                                    <?php if (!empty($airline)) : ?>
                                                        <?php cassiopeia_render_airline_logo($airline->iata); ?>
                                                        <div class="airline">
                                                            <?php if (!empty($airline)) print($airline->name); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <div>
                                                        <?php if ($language->language == "vi") : ?>
                                                            <?php if (!empty($Segment_startpoint)) print(!empty($Segment_startpoint->city_vi) ? $Segment_startpoint->city_vi : $Segment_startpoint->city); ?> - <?php if (!empty($Segment_startpoint)) print($Segment_startpoint->code); ?>
                                                        <?php else : ?>
                                                            <?php if (!empty($Segment_startpoint)) print(!empty($Segment_startpoint->city_vi) ? $Segment_startpoint->city_vi : $Segment_startpoint->city); ?> - <?php if (!empty($Segment_startpoint)) print($Segment_startpoint->code); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div>
                                                        <?php if ($language->language == "vi") : ?>
                                                            <?php if (!empty($Segment_startpoint)) print(!empty($Segment_startpoint->name_vi) ? $Segment_startpoint->name_vi : $Segment_startpoint->name); ?>
                                                        <?php else : ?>
                                                            <?php if (!empty($Segment_startpoint)) print(!empty($Segment_startpoint->name_vi) ? $Segment_startpoint->name_vi : $Segment_startpoint->name); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div>
                                                        Cất cánh: <?php print(date("H:i", strtotime($Segment->StartDate))); ?>
                                                    </div>
                                                    <div>
                                                        Ngày: <?php print(date("d/m/Y", strtotime($Segment->StartDate))); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div>
                                                        <?php if ($language->language == "vi") : ?>
                                                            <?php if (!empty($Segment_endpoint)) print(!empty($Segment_endpoint->city_vi) ? $Segment_endpoint->city_vi : $Segment_endpoint->city); ?> - <?php if (!empty($Segment_endpoint)) print($Segment_endpoint->code); ?>
                                                        <?php else : ?>
                                                            <?php if (!empty($Segment_endpoint)) print(!empty($Segment_endpoint->city_vi) ? $Segment_endpoint->city_vi : $Segment_endpoint->city); ?> - <?php if (!empty($Segment_endpoint)) print($Segment_endpoint->code); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div>
                                                        <?php if ($language->language == "vi") : ?>
                                                            <?php if (!empty($Segment_endpoint)) print(!empty($Segment_endpoint->name_vi) ? $Segment_endpoint->name_vi : $Segment_endpoint->name); ?>
                                                        <?php else : ?>
                                                            <?php if (!empty($Segment_endpoint)) print(!empty($Segment_endpoint->name_vi) ? $Segment_endpoint->name_vi : $Segment_endpoint->name); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div>
                                                        Hạ cánh: <?php if (!empty($Segment->EndDate)) print(date("H:i", strtotime($Segment->EndDate))); ?>
                                                    </div>
                                                    <div>
                                                        Ngày: <?php if (!empty($Segment->EndDate)) print(date("d/m/Y", strtotime($Segment->EndDate))); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div>Chuyến bay: <?php if (!empty($Segment->FlightNumber)) print($Segment->FlightNumber); ?></div>
                                                    <div>Thời gian bay: <?php if (!empty($Segment->FlightTime)) print(floor($Segment->FlightTime / 60)); ?>h <?php print(($Segment->FlightTime % 60)); ?>p </div>
                                                    <div>Hạng chỗ: <?php if (!empty($Segment->ClassAdult)) print($Segment->ClassAdult); ?></div>
                                                    <div>Máy bay: <?php if (!empty($Segment->Plane)) print($Segment->Plane); ?></div>
                                                </div>
                                            </div>

                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <!--                            --><?php //$Flight_index++; 
                                                                    ?>
                                <?php $stt++; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="price-detail">
                    <div class="block-title">
                        <span class="fa fa-eye"></span> Chi tiết giá vé
                    </div>
                    <div class="block-body">
                        <table class="table table-hovered">
                            <thead>
                                <tr>
                                    <th>Hành khách</th>
                                    <th>Số lượng</th>
                                    <th>Giá vé</th>
                                    <!--                            <th>Thuế và phí</th>-->
                                    <th>Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    if ($__Airline == "QH" || $__Airline == "VJ") {
                                        $total_Adt_price = ($FlightGroup->PriceAdult + $region_fee) * $data->Data->Adult;
                                    } else {
                                        $total_Adt_price = ($FlightGroup->PriceAdult + $region_fee) * $data->Data->Adult;
                                    }
                                    ?>
                                    <td>Người lớn</td>
                                    <td><?php print($data->Data->Adult); ?></td>
                                    <td><?php print(number_format($data->Data->Adult > 0 ? $FlightGroup->PriceAdult + $region_fee : 0, 0, ",", ".")); ?></td>
                                    <!--                            <td>--><?php //print(number_format(($item->TaxAdt+$item->FeeAdt+$region_fee),0,",",".")); 
                                                                            ?><!--</td>-->
                                    <td><?php print(number_format($total_Adt_price, 0, ",", ".")); ?></td>
                                </tr>
                                <tr>
                                    <?php
                                    $total_Chd_price = ($FlightGroup->PriceChild + $region_fee) * $data->Data->Children;
                                    ?>
                                    <td>Trẻ em</td>
                                    <td><?php print($data->Data->Children); ?></td>
                                    <td><?php print(number_format($data->Data->Children > 0 ? $FlightGroup->PriceChild + $region_fee : 0, 0, ",", ".")); ?></td>
                                    <!--                            <td>--><?php //print(number_format(($item->TaxChd+$item->FeeChd+$region_fee)*$item->Chd,0,",",".")); 
                                                                            ?><!--</td>-->
                                    <td><?php print(number_format($total_Chd_price, 0, ",", ".")); ?></td>
                                </tr>
                                <!--                                --><?php //if(!empty($item['Infant'])): 
                                                                        ?>
                                <!---->
                                <!--                                --><?php //endif; 
                                                                        ?>
                                <tr>
                                    <?php
                                    $total_Inf_price = ($FlightGroup->PriceChild) * $data->Data->Infant;
                                    ?>
                                    <td>Em bé</td>
                                    <td><?php print($data->Data->Infant); ?></td>
                                    <td><?php print(number_format($data->Data->Infant > 0 ? $FlightGroup->Infant : 0, 0, ",", ".")); ?></td>
                                    <!--                            <td>--><?php //print(number_format(($item->TaxInf+$item->FeeInf+$region_fee)*$item->Inf,0,",",".")); 
                                                                            ?><!--</td>-->
                                    <td><?php print(number_format($total_Inf_price, 0, ",", ".")); ?></td>
                                </tr>
                                <tr class="tr-total-price">
                                    <td colspan="3">Tổng chi phí ( VND ):</td>
                                    <td><?php print(number_format($total_Adt_price + $total_Chd_price + $total_Inf_price, 0, ",", ".")); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    <?php endforeach; ?>
<?php endif; ?>