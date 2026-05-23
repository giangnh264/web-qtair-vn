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
        <div class="form-buttons">
            <label for="">&nbsp;</label>
            <div><?php echo drupal_render($form['submit']); ?></div>
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
                    <table class="table table-hovered">
                        <tr>
                            <td></td>
                            <td><?php echo $StartPoint->city; ?></td>
                            <td><?php echo "Chuyến bay: ".$departureFlight->FlightNumber; ?></td>
                            <td><?php echo $EndPoint->city; ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><?php cassiopeia_render_airline_logo($departureFlight->AirlineCode); ?></td>
                            <td><?php echo $StartPoint->name; ?></td>
                            <td><i class="fa fa-long-arrow-right"></i></td>
                            <td><?php echo $EndPoint->name; ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><?php echo date("H:i d/m/Y",strtotime($departureFlight->StartDate)); ?></td>
                            <td><?php echo (floor($departureFlight->Duration / 60) . "h " . ($departureFlight->Duration % 60) . "p"); ?></td>
                            <td><?php echo date("H:i d/m/Y",strtotime($departureFlight->EndDate)); ?></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                    <?php
                    $Adult = $_SESSION[strtoupper(trim($form['#PNR'])).'-count_adult'];
                    $Children = $_SESSION[strtoupper(trim($form['#PNR'])).'-count_children'];
                    $Infant = $_SESSION[strtoupper(trim($form['#PNR'])).'-count_infant'];
                    $Total = $Adult*$AdultPrice+$Children*$ChildrenPrice+$Infant*$InfantPrice;
                    if(!empty($form['#ChoseFlightSession'])&&$form['#ChoseFlightSession']==$FlightSession) $TotalPrice = $Total;
                    ?>
                    <table class="table table-hovered">
                        <thead>
                            <tr>
                                <th>Hành khách</th>
                                <th>Số người</th>
                                <th>Giá vé</th>
                                <th>Tổng giá vé</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Người lớn</td>
                                <td><?php echo $Adult; ?></td>
                                <td><span class="color-orange"><?php echo number_format($AdultPrice,0,",","."); ?></span> VNĐ</td>
                                <td><span class="color-orange"><?php echo number_format($Adult*$AdultPrice,0,",","."); ?></span> VNĐ</td>
                            </tr>
                            <?php if(!empty($Children)): ?>
                                <tr>
                                    <td>Trẻ em</td>
                                    <td><?php echo $Children; ?></td>
                                    <td><span class="color-orange"><?php echo number_format($ChildrenPrice,0,",","."); ?></span> VNĐ</td>
                                    <td><span class="color-orange"><?php echo number_format($Children*$ChildrenPrice,0,",","."); ?></span> VNĐ</td>
                                </tr>
                            <?php endif; ?>
                            <?php if(!empty($Infant)): ?>
                                <tr>
                                    <td>Em bé</td>
                                    <td><?php echo $Infant; ?></td>
                                    <td><span class="color-orange"><?php echo number_format($InfantPrice,0,",","."); ?></span> VNĐ</td>
                                    <td><span class="color-orange"><?php echo number_format($Infant*$InfantPrice,0,",","."); ?></span> VNĐ</td>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <td>Tổng tiền</td>
                                <td></td>
                                <td></td>
                                <td><b><span class="color-orange"><?php echo number_format($Total,0,",","."); ?></span> VNĐ</b></td>
                            </tr>
                        </tbody>
                    </table>
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
<?php echo drupal_render_children($form); ?>