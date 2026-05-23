<?php global $user;?>
<div class="review-block">
    <div class="d-flex align-end gap-15">
        <div class="w-20"><?php echo drupal_render($form['review-group']['airline']); ?></div>
        <div class="w-20"><?php echo drupal_render($form['review-group']['code']); ?></div>
        <div class="w-20"><?php echo drupal_render($form['review-group']['review']); ?></div>
    </div>
</div>

<div class="ticket-review mt-30 mb-30">
    <?php
      $pnr_content = '';
      if (!empty($form['#review-result']) && is_object($form['#review-result']) && isset($form['#review-result']->Data) && is_object($form['#review-result']->Data) && isset($form['#review-result']->Data->PNRContent)) {
        $pnr_content = $form['#review-result']->Data->PNRContent;
      }
      if ($pnr_content !== '') {
        print(str_replace("\n", "<br>", $pnr_content));
      }
    ?>
    <?php if(!empty($form['#TotalPrice'])): ?>
        <?php $Partner_Price = $form['#TotalPrice']; ?>
        <table class="table table-hover table-stripped mt-15">
<!--            <tr>-->
<!--                <td><b>Giá vé:</b></td>-->
<!--                <td class="text-right"><b class="color-red">--><?php //echo number_format($form['#TotalPrice'],0,",","."); ?><!-- VNĐ</b></td>-->
<!--            </tr>-->
            <?php
            $booking = cassiopeia_qt_ticket_booking_load_by_PNR($form['review-group']['code']['#value']);
            $total_service_fee = 0;
            if(!empty($booking)){
                $tickets = $booking->tickets;
                $count_ticket = 0;
                $total_agent_fee = 0;
                foreach ($tickets as $ticket) {
                    if($ticket->pnr_code==$form['review-group']['code']['#value']){
                        $total_service_fee+=$ticket->service_fee*($booking->adt+$booking->chd);
                        $total_service_fee+=$ticket->service_infant_fee*$booking->inf;
                    }
                }
            }
            if($user->uid==1){
                $total_service_fee = 0;
            }
            ?>
<!--            --><?php //if(!empty($total_service_fee)): ?>
<!--                <tr>-->
<!--                    <td>&nbsp;</td>-->
<!--                    <td class="text-right"><i style="color:red">Phí dịch vụ xuất vé: --><?php //echo number_format($total_service_fee,0,",",".") ?><!-- VNĐ</i></td>-->
<!--                </tr>-->
<!--            --><?php //endif; ?>
            <tr>
                <td><b>Tổng giá:</b></td>
                <td class="text-right"><b class="color-red"><?php echo number_format($Partner_Price+$total_service_fee,0,",","."); ?> VNĐ</b></td>
            </tr>
        </table>
    <?php endif; ?>
</div>
<div class="issue-block">
    <div class="d-flex align-end gap-15">
        <?php if(!empty($form['issue-group']['agent'])): ?>
            <div class="w-20"><?php echo drupal_render($form['issue-group']['agent']); ?></div>
        <?php endif; ?>
        <div class="w-20"><?php echo drupal_render($form['issue-group']['code']); ?></div>
        <?php if(!empty($form['#TotalPrice'])): ?>
            <div class="w-20"><button type="button" class="btn-ajax btn-red btn-filter btn-pre-issue  btn btn-warning form-submit icon-before ajax-processed">Xuất vé</button></div>
        <?php endif; ?>
    </div>
</div>
<?php echo drupal_render_children($form); ?>
<?php
  if ($pnr_content !== '') {
    $_SESSION['str'] = $pnr_content;
  }
?>
