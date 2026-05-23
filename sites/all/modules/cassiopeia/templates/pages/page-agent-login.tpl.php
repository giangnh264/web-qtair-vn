<?php
global $logo;
$config = node_load(12);
?>
<div class="page page-re-log">
    <div class="page-container">
        <div class="page-inner">
            <div class="qt-form-user">
                <div class="qt-form-user-container">
                    <?php
                    $cassiopeia_partner_register_form = drupal_get_form("cassiopeia_custom_user_login_form");
                    if(!empty($cassiopeia_partner_register_form)){
                        $cassiopeia_partner_register_form = drupal_render($cassiopeia_partner_register_form);
                        print($cassiopeia_partner_register_form);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>