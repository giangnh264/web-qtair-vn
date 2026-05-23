<?php drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/ticket-void.js', ['weight' => 1000]); 
?>
<div class="page-manager-ticket-void">
    <?php
    $cassiopeia_api_void_form = drupal_get_form("cassiopeia_api_void_form");
    echo drupal_render($cassiopeia_api_void_form);
    ?>
    <?php if(!empty($_REQUEST['data']['code'])):     
        $dataRequest = new stdClass();
        $dataRequest-> PNRCode = $_REQUEST['data']['code'];
        $dataRequest-> AirlineCode = "VN";
        $dataPNR = cassiopeia_meta_api_GetPNRData($dataRequest);
        $dataTicket = $dataPNR;
        ?>
        <?php if(!empty($dataPNR) && $dataPNR->Code =="0") :?>
            <div class="ticket-review-result">
                <?php print(str_replace("\n","<br>",$dataPNR->Data->Display)); ?>
            </div>
            <?php if(!empty($dataPNR->Data->TicketNumbers)):?>
                <div class="ticket-list-tickets-result">
                    <p class="text-red"> Vui lòng lựa chọn số vé để thực hiện void.</p>
                    <table class="table table-hover table-stripped">
                        <tbody>
                            <?php foreach($dataPNR->Data->TicketNumbers as $TicketNumber): 
                                $avilableStatus = $TicketNumber->Status =="OK" ? "": "disabled";
                                ?>
                                <tr class="<?php print($avilableStatus);?>">
                                    <?php if($TicketNumber->Status =="OK"):?>
                                        <td><input type="checkbox" class="cbxItemTickets" data-index="<?php print($TicketNumber->TicketRPH);?>" data-id="<?php print($TicketNumber->TicketNumber);?>" data-price="<?php print($TicketNumber->TotalVND);?>"></td>
                                    <?php else:?>
                                        <td><input type="checkbox" class="cbxItemTicketDisable" disabled></td>
                                    <?php endif;?>
                                    <td><?php print($TicketNumber->TicketType); ?></td>
                                    <td><?php print($TicketNumber->TicketNumber); ?></td>
                                    <td><?php print($TicketNumber->Display); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="item">
                    <input disabled readonly name="pnr_code" type="text" placeholder="Mã đặt chỗ" class="form-control" value="<?php if(!empty($dataPNR->Data->PNRCode)) echo(strtoupper(trim($dataPNR->Data->PNRCode))); ?>">
                </div>
                <div class="buttons">
                    <button type="button" class="btn btn-danger btn-ticket-void">Void vé</button>
                </div>
            <?php else :?>
            <div class="ticket-list-tickets-result text-red">
                <p class="text-red"> Hiện chưa có số vé nào trong Mã đặt chỗ này có thể thực hiện void.</p>
            </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
</div>