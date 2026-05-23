<?php
$cassiopeia_site_name = variable_get('site_name');
$logo = theme_get_setting('logo');
?>
<div class="qt-form-logo">
    <a href="/">
        <img  width="110px" class="img-responsive" src="/sites/all/themes/cassiopeia_theme/img/logo-large.png" alt="<?php print($cassiopeia_site_name); ?>" />
    </a>
</div>
<div class="qt-form-title">
    <h3 class="heading">Đăng nhập</h3>
</div>
<div class="qt-from-content">
<!--    <div class="form-group">-->
<!--        <label>Mã đại lý</label>-->
<!--        <input-->
<!--            type="text"-->
<!--            class="form-control"-->
<!--            placeholder="Nhập đại lý của bạn"-->
<!--        />-->
<!--    </div>-->
    <?php echo drupal_render($form['agent_code']); ?>
    <?php echo drupal_render($form['username']); ?>
    <?php echo drupal_render($form['password']); ?>


    <div class="save-pass">
        <?php echo drupal_render($form['remember_me']); ?>

        <a href="/user/password" class="clr-dark text-underline ff-bold"
        >Quên mật khẩu</a
        >
    </div>

    <div class="form-action">
        <?php echo drupal_render($form['submit']); ?>
    </div>

    <div class="has-account">
        <p>
            Bạn chưa có tài khoản?
            <a href="/user/register"
            >Đăng ký ngay</a
            >
        </p>
    </div>
</div>