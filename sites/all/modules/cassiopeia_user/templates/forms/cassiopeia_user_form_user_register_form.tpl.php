<div class="qt-form-logo">
    <a href="/">
        <img width="110px" class="img-responsive" src="/sites/all/themes/cassiopeia_theme/img/logo-large.png" alt="<?php print(variable_get("site_name")); ?>" />
    </a>
</div>
<div class="qt-form-title">
    <h3 class="heading">Đăng ký</h3>
</div>
<?php print(drupal_render($form['field_account_full_name'])); ?>
<?php print(drupal_render($form['account'])); ?>
<!--<div class="form-actions">-->
    <?php print(drupal_render($form['submit'])); ?>
<!--</div>-->
<?php print drupal_render_children($form); ?>