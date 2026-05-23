<div class="form--item">
    <label for="" class="mg-0">Tất cả</label> <?php echo drupal_render($form['feeContainer'][0]['percent']); ?> + <?php echo drupal_render($form['feeContainer'][0]['amount']); ?>
</div>
<div class="mb-10">
    <?php echo drupal_render($form['by_star']); ?>
</div>
<?php if(!empty($form['#by_star'])): ?>
    <?php for($i=1;$i<=5;$i++): ?>
        <div class="form--item">
            <label for=""><?php for($j=1;$j<=$i;$j++) echo "<i class='fa fa-star'></i>"; ?></label> <?php echo drupal_render($form['feeContainer'][$i]['percent']); ?> + <?php echo drupal_render($form['feeContainer'][$i]['amount']); ?>
        </div>
    <?php endfor; ?>
<?php endif; ?>
<div class="mb-10">
    <?php echo drupal_render($form['submit']); ?>
</div>
<div class="hidden">
    <?php echo drupal_render_children($form); ?>
</div>