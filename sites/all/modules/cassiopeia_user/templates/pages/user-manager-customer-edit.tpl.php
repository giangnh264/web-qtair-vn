<?php
$customer = $variables['customer'];
?>
<div class="user-manager-customer-edit">
    <div class="qt-user-title mb-3">
        <h2 class="heading caption text-uppercase clr-dark">
            Cập nhật khách hàng
        </h2>
    </div>
    <?php
    $cassiopeia_user_customer_form = drupal_get_form("cassiopeia_user_customer_form",$customer);
    if(!empty($cassiopeia_user_customer_form)){
        $cassiopeia_user_customer_form = drupal_render($cassiopeia_user_customer_form);
        echo $cassiopeia_user_customer_form;
    }
    ?>
</div>
