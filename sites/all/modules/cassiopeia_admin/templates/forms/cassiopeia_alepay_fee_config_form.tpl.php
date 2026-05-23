<div class="form--item">
    <label for="" class="mg-0">Thẻ quốc tế</label> <?php echo drupal_render($form['feeContainer'][INTERNATIONAL_CARD]['percent']); ?> + <?php echo drupal_render($form['feeContainer'][INTERNATIONAL_CARD]['amount']); ?>
</div>
<div class="form--item">
    <label for="" class="mg-0">Thẻ nội địa</label> <?php echo drupal_render($form['feeContainer'][DOMESTIC_CARD]['percent']); ?> + <?php echo drupal_render($form['feeContainer'][DOMESTIC_CARD]['amount']); ?>
</div>
<div class="form--item">
    <label for="" class="mg-0">Chuyển khoản 24/7</label> <?php echo drupal_render($form['feeContainer'][INTERNET_BANKING]['percent']); ?> + <?php echo drupal_render($form['feeContainer'][INTERNET_BANKING]['amount']); ?>
</div>
<div class="form--item">
    <label for="" class="mg-0">QR Pay</label> <?php echo drupal_render($form['feeContainer'][QR_PAY]['percent']); ?> + <?php echo drupal_render($form['feeContainer'][QR_PAY]['amount']); ?>
</div>
<div class="mb-10">
    <?php echo drupal_render($form['submit']); ?>
</div>
<div class="hidden">
    <?php echo drupal_render_children($form); ?>
</div>