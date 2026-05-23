<?php
$config = node_load(12);
?>

    <div class="page-login-content">
        <div class="container page-login-content-container">
            <div class="page-login-content-container-inner">
                <div class="page-login-right-container">
                    <h3><?php print(t("Khôi phục mật khẩu")); ?></h3>
                    <div class="page-login-right-content">
                        <?php
                        $cassiopeia_partner_register_form = drupal_get_form("cassiopeia_user_password_reset_form");
                        if(!empty($cassiopeia_partner_register_form)){
                            $cassiopeia_partner_register_form = drupal_render($cassiopeia_partner_register_form);
                            print($cassiopeia_partner_register_form);
                        }
                        ?>
                        <div class="block-responsive-DK">
                            <a href="/agent/login">Đăng nhập</a> (<a href="/user/register">Đăng ký</a>)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>