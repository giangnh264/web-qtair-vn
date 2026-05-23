<textarea name="clipboard" id="clipboard" cols="30" rows="10" class="hidden"></textarea>
<div class="booking-payment">
    <div class="page-top-block container">
        <div class="step">
            <div class="step-1 ">
                1. Tìm kiếm
            </div>
            <div class="step-2">
                2. Thông tin khách hàng
            </div>
            <div class="step-3 active">
                3. Thanh toán
            </div>
        </div>
    </div>
    <div style="display: block;">
        <?php
        global $user;
        if(empty($_SESSION['booking'])){
            drupal_set_message("Phiên làm việc đã hết hạn!");
            drupal_goto("/");
        }
        $_user = user_load($user->uid);
        if (!empty($variables['baggages'])) {
            $baggages = $variables['baggages'];
        }
        $weight = 0;
        $baggage_price = 0;
        $total_price = 0;
        $total_AG_price = 0;
        $adt_price = 0;
        $chd_price = 0;
        $inf_price = 0;
        $adt = $_SESSION['SearchInfo']->Adult;
        $chd = $_SESSION['SearchInfo']->Children;
        $inf = $_SESSION['SearchInfo']->Infant;

        $total_AG_price = 0;
        $total_NET_price = 0;
        ?>
        <?php if (!empty($_SESSION['booking'])) : ?>
            <?php foreach ($_SESSION['booking'] as $Itinerary => $Booking) : ?>
                <?php if (!empty($Booking)) : ?>
                    <?php
                    $_fee = 0;
                    $Flight = $Booking['Flight'];
                    $FlightSession = $Flight->FlightSession;
                    $FlightDetail = $Flight->FlightDetail;
                    $AvailFlight = $Flight->ListSegment[0];
                    $AirlineCode = $Flight->AirlineCode;
                    $raw_adult_fee = $FlightDetail->PriceAdult + $FlightDetail->FeeAdult + $FlightDetail->TaxAdult;
                    $raw_chd_fee = $FlightDetail->PriceChild + $FlightDetail->FeeChild + $FlightDetail->TaxChild;
                    $adt_price += $FlightDetail->PriceAdult + $FlightDetail->FeeAdult + $FlightDetail->TaxAdult;
                    //                    $serviceFee = cassiopeia_get_agent_fee($AirlineCode, $FlightDetail->Class);
                    $AgentFee = $FlightDetail->AgentFee;
                    $ServiceFee = 0;
//                    if(empty($user->uid)){
                        $ServiceFee = $FlightDetail->ServiceFee;
//                    }
                    if ($chd > 0) {
                        $chd_price += $FlightDetail->PriceChild + $FlightDetail->FeeChild + $FlightDetail->TaxChild;
                    }
                    if ($inf > 0) {
                        $inf_price += $FlightDetail->PriceInfant + $FlightDetail->FeeInfant + $FlightDetail->TaxInfant;
                    }
                    $total_AG_price += ($raw_adult_fee+$ServiceFee) * $adt + ($raw_chd_fee+$ServiceFee) * $chd + ($FlightDetail->ServiceInfantFee+$inf_price) * $inf;
                    $total_NET_price += ($raw_adult_fee) * $adt + ($raw_chd_fee) * $chd + $inf_price * $inf;
                    $adt_price += $AgentFee;
                    $adt_price += $ServiceFee;
                    //                    $adt_price += $serviceFee;
                    $chd_price += $AgentFee;
                    $chd_price += $ServiceFee;

                    $inf_price += $FlightDetail->AgentInfantFee;
                    $inf_price += $FlightDetail->ServiceInfantFee;
                    $adt_price = cassiopeia_qt_price_fix($adt_price);
                    $chd_price = cassiopeia_qt_price_fix($chd_price);
                    $inf_price = cassiopeia_qt_price_fix($inf_price);
                    //                    $chd_price += $serviceFee;
//                    print_r($AgentFee);
                    ?>
                <?php endif; ?>
                <?php foreach ($_SESSION['booking_payment']['adt'] as $__adt) : ?>
                    <?php
                    if (!empty($__adt->baggages->$Itinerary->id)) {
                        $baggage = null;
                        $baggage = cassiopeia_get_baggage_by_id($__adt->baggages->$Itinerary->id);
                        if (!empty($baggage)) {
                            $weight += $baggage->weight;
                            $baggage_price += $baggage->amount;
                        }
                    }
                    ?>
                <?php endforeach; ?>
                <?php foreach ($_SESSION['booking_payment']['chd'] as $__chd) : ?>
                    <?php
                    if (!empty($__chd->baggages->$Itinerary->id)) {
                        $baggage = null;
                        $baggage = cassiopeia_get_baggage_by_id($__chd->baggages->$Itinerary->id);
                        if (!empty($baggage)) {
                            $weight += $baggage->weight;
                            $baggage_price += $baggage->amount;
                        }
                    }
                    ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
            <?php
            $total_price += $adt_price *
                $adt +
                $chd_price *
                $chd +
                $inf_price *
                $inf;

            ?>
        <?php endif; ?>
    </div>
    <div class="page-container container">
        <!-- EDIT INTERFACE -->
        <div class="payment-wrap">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-7 payment-method">
                    <div class="payment-method-wrap">
                        <form action="" class="form-payment-method">
                            <div class="page-booking-content-left-payment">
                                <div class="form-order-info-item">
                                    <!--                                    <h2>Hình thức thanh toán</h2>-->
                                    <div class="form-order-info-item-content pd-r-large">
                                        <?php echo drupal_render($form['payment']['method']); ?>
                                    </div>
                                </div>
                                <div class="page-booking-content-left-payment-item-node">
<!--                                    <button class="btn-payment" type="button">Tiếp tục</button>-->
                                    <?php echo drupal_render($form['submit']); ?>
                                </div>
                                <!--                                <input type="hidden" class="payment" name="payment" value="1">-->
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-5 flight">
                    <div class="flight-ticket">
                        <div class="flight-ticket-title">
                            <span class="icon"><img src="/sites/all/themes/cassiopeia_theme/img/icons/flight.png" alt=""></span>
                            <span>Chuyến bay của bạn</span>
                        </div>
                        <div class="flight-ticket-content">
                            <ul>
                                <?php foreach ($_SESSION['booking'] as $key => $value) : ?>
                                    <?php
                                    $Flight = $value['Flight'];
                                    $AirlineCode = $Flight->AirlineCode;
                                    //
                                    ?>
                                    <li>
                                        <?php
                                        echo _cassiopeia_render_theme("module", "cassiopeia", "templates/parts/payment-booking-item.tpl.php", array("node" => $Flight, "brand" => $AirlineCode));
                                        ?>
                                    </li>
                                    <!--                                --><?php //endif;
                                    ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="ticket-cost">
                            <h4>Giá vé:</h4>
                            <div class="customer-price">
                                <?php if (!empty($_SESSION['booking_payment']['adt'])) : ?>
                                    <?php foreach ($_SESSION['booking_payment']['adt'] as $adt) : ?>

                                        <div class="customer-price-item">
                                            <span><?php echo $adt->full_name; ?></span>
                                            <span><?php print(number_format($adt_price, 0, ",", ".")); ?> đ</span>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                <?php if (!empty($_SESSION['booking_payment']['chd'])) : ?>
                                    <?php foreach ($_SESSION['booking_payment']['chd'] as $chd) : ?>
                                        <div class="customer-price-item">
                                            <span><?php echo $chd->full_name; ?></span>
                                            <span><?php print(number_format($chd_price, 0, ",", ".")); ?> đ</span>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                <?php if (!empty($_SESSION['booking_payment']['inf'])) : ?>
                                    <?php foreach ($_SESSION['booking_payment']['inf'] as $inf) : ?>
                                        <div class="customer-price-item">
                                            <span><?php echo $inf->full_name; ?></span>
                                            <span><?php print(number_format($inf_price, 0, ",", ".")); ?> đ</span>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($weight)) : ?>
                                <div class="baggage">
                                    <h4>Hành lý ký gửi:</h4>
                                    <div colspan="2"><?php print($weight); ?> kg</div>
                                    <div><?php print(number_format($baggage_price, 0, ",", ".")); ?> đ</div>
                                </div>
                            <?php endif; ?>
                            <?php if(!empty($form['#alefee'])): ?>
                                <div class="d-flex justify-between font-bold pd-0-12">
                                    <span>Phí thanh toán:</span>
                                    <b><?php print(number_format($form['#alefee'], 0, ",", ".")); ?>đ</b>
                                </div>
                            <?php endif; ?>
                            <div class="total-price">
                                <div>
                                    <span>Tổng tiền:</span>
                                    <span>
                                        <strong class="sigma">&#8721;</strong><?php print(number_format($total_price + $baggage_price+$form['#alefee'], 0, ",", ".")); ?> đ
                                    </span>
                                </div>
                            </div>
                            <?php if (!empty($user->uid) && (user_has_role(4) || user_has_role(8))) : ?>
                                <div class="total-price">
                                    <div>
                                        <span>Tổng giá AG:</span>
                                        <span>
                                            <strong class="sigma">&#8721;</strong><?php print(number_format($total_AG_price + $baggage_price, 0, ",", ".")); ?> đ
                                        </span>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($user->uid) && user_has_role(8)) : ?>
                                <div class="total-price">
                                    <div>
                                        <span>Tổng giá NET:</span>
                                        <span>
                                            <?php print(number_format($total_NET_price + $baggage_price, 0, ",", ".")); ?> đ
                                        </span>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- EDIT INTERFACE -->
    </div>
</div>
<?php $_SESSION['total_ag_price'] = $total_AG_price + $baggage_price; ?>
<?php $_SESSION['total_net_price'] = $total_NET_price + $baggage_price; ?>
<?php //_print_r($_SESSION['TotalPrice']); ?>
<div id="modalTopup" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Nạp tiền vào ví Quang Trang</h4>
            </div>
            <div class="modal-body">
                <div>
                    <?php echo drupal_render($form['bank']); ?>
                </div>
                <div class="d-flex justify-center">
                    <?php echo drupal_render($form['topup']); ?>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="hidden">
    <?php echo drupal_render_children($form); ?>
</div>