<div class="row">
    <div class="col-md-2">
        <?php echo drupal_render($form['code']); ?>
    </div>
    <div class="col-md-10">
        <div class="">
            <label for="">&nbsp;</label>
            <div>
                <?php echo drupal_render($form['open-pnr']); ?>
            </div>
        </div>
    </div>
</div>
<?php if(!empty($form['#open-pnr-result'])): ?>
    <div class="ticket-review-result">
        <?php echo(str_replace("\n","<br>",$form['#open-pnr-result']->Data->PNRContent)); ?>
    </div>
    <div class="task">
        <div class="block-head">
            <?php echo drupal_render($form['task']); ?>
        </div>
        <table class="table table-hover table-stripped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Số hiệu</th>
                    <th>Hạng</th>
                    <th>Ngày</th>
                    <th>Hành trình</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($form['#Itineraries'] as $itinerary): $index=1;?>
                    <tr>
                        <td><?php echo $index; ?></td>
                        <td><?php echo $itinerary['FLightNumber']; ?></td>
                        <td><?php echo $itinerary['Class']; ?></td>
                        <td><?php echo $itinerary['Date']; ?></td>
                        <td><?php echo $itinerary['Itinerary']; ?></td>
                    </tr>
                <?php $index++; endforeach; ?>
            </tbody>
        </table>
        <div class="tab-content">
            <div id="tab1" class="tab-pane fade <?php if($form['task']['#value']==1) echo "in active"; ?>">
                <div class="search-flight-form">
                    <div class="row">
                        <div class="col-md-4">
                            <?php echo drupal_render($form['start_point']); ?>
                        </div>
                        <div class="col-md-4">
                            <?php echo drupal_render($form['end_point']); ?>
                        </div>
                        <div class="col-md-2">
                            <?php echo drupal_render($form['start_date']); ?>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div>
                                    <div class="form-buttons form-group">
                                        <label for="">&nbsp;</label>
                                        <div><?php echo drupal_render($form['search']); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if(!empty($form['#search_result'])): ?>
                        <?php
                        $DepartureFlights = $form['#search_result']->Data->DepartureFlights;
                        $DataSession = $form['#search_result']->Data->DataSession;
                        $TotalPrice = 0;
                        ?>
                        <table class="table table-hovered table-stripped flights <?php if(!empty($form['#ChoseFlightSession'])) echo "chose"; ?> mt-15">
                            <tbody>
                            <?php foreach($DepartureFlights as $FlightSession => $departureFlight): ?>
                                <?php
                                $StartPoint = cassiopeia_get_airport($departureFlight->StartPoint);
                                $EndPoint = cassiopeia_get_airport($departureFlight->EndPoint);
                                $key = $DataSession."-".$FlightSession;
                                $FareOption = cassiopeia_meta_FareOptionSession_load($departureFlight,$form['Flight'][$key]['FareOption']['#value']);
                                $AdultPrice = $FareOption->PriceAdult+$FareOption->FeeAdult+$FareOption->TaxAdult;
                                $ChildrenPrice = $FareOption->PriceChild+$FareOption->FeeChild+$FareOption->TaxChild;
                                $InfantPrice = $FareOption->PriceInfant+$FareOption->FeeInfant+$FareOption->TaxInfant;
                                ?>
                                <tr class="flight <?php if(!empty($form['#ChoseFlightSession'])&&$form['#ChoseFlightSession']==$FlightSession) echo "active"; ?>" >
                                    <td class="">
                                        <?php cassiopeia_render_airline_logo($departureFlight->AirlineCode); ?>
                                        <div class="airline">
                                            <?php if(!empty($airline)) print($airline->name); ?>
                                        </div>
                                    </td>
                                    <td>
                                        <?php if(!empty($StartPoint)) print($StartPoint->code); ?>
                                        <b><?php  print(date("H:i",strtotime($departureFlight->StartDate))); ?></b>
                                    </td>
                                    <td>
                                        <?php echo $departureFlight->FlightNumber; ?> <span class="btn-view-detail" data-FlightSession="<?php echo $FlightSession; ?>">Chi tiết</span>
                                    </td>
                                    <td>
                                        <?php if(!empty($EndPoint)) print($EndPoint->code); ?>
                                        <b><?php  print(date("H:i",strtotime($departureFlight->EndDate))); ?></b>
                                    </td>
                                    <td class="classes">
                                        <?php
                                        echo drupal_render($form['Flight'][$key]['FareOption']);
                                        ?>
                                    </td>
                                    <td width="120px">
                                        <?php
                                        if(!empty($form['Flight'][$key]['choose'])) echo drupal_render($form['Flight'][$key]['choose']);
                                        if(!empty($form['Flight'][$key]['un_choose'])) echo drupal_render($form['Flight'][$key]['un_choose']);
                                        ?>
                                    </td>
                                </tr>
                                <tr class="detail-row" data-FlightSession="<?php echo $FlightSession; ?>">
                                    <td colspan="6">
                                        <?php echo drupal_render($form['Flight'][$key]['detail']); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php if(!empty($form['#ChoseFlightSession'])): ?>
                            <table class="table table-hover">
                                <tr>
                                    <td colspan="5">Tổng tiền thanh toán: <span class="color-orange"><b><?php echo number_format($TotalPrice,0,",","."); ?></b></span> VNĐ</td>
                                    <td width="120px"><?php echo drupal_render($form['add_segment']); ?></td>
                                </tr>
                            </table>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div id="tab2" class="tab-pane fade <?php if($form['task']['#value']==2) echo "in active"; ?>">
                <table class="table">
                    <tbody>
                        <tr>
                            <td></td>
                            <td width="120px"><?php echo drupal_render($form['cancel_booking']); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="tab3" class="tab-pane fade <?php if($form['task']['#value']==3) echo "in active"; ?>">
                <table class="table">
                    <tbody>
                        <tr>
                            <td><?php echo drupal_render($form['mail']); ?></td>
                            <td width="120px">
                                <div class="form-group">
                                    <label for="">&nbsp;</label>
                                    <div>
                                        <?php echo drupal_render($form['send_mail']); ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php
echo drupal_render_children($form);
?>