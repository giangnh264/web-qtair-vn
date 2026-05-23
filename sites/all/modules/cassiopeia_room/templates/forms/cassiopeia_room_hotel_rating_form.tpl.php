<div class="inp-check-user text-center">
    <p>Đánh giá mức độ hài lòng</p>
    <?php echo drupal_render($form['point']); ?>
</div>
<div class="inp-comment">
    <div class="row">
        <div class="col-md-6">
            <?php echo drupal_render($form['name']); ?>
        </div>
        <div class="col-md-6">
            <?php echo drupal_render($form['mail']); ?>
        </div>
        <div class="col-md-12">
            <?php echo drupal_render($form['comment']); ?>
        </div>
    </div>
</div>
<div class="btn-booking  d-flex jsc-center mt-3">
    <?php echo drupal_render($form['submit']); ?>
</div>
<?php echo drupal_render_children($form); ?>