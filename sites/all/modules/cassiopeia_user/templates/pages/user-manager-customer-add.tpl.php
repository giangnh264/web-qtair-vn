<div class="user-manager-customer-add">
    <div class="qt-user-title mb-3">
        <h2 class="heading caption text-uppercase clr-dark">
            Thêm mới khách hàng
        </h2>
    </div>
    <?php
    $cassiopeia_user_customer_form = drupal_get_form("cassiopeia_user_customer_form");
    if(!empty($cassiopeia_user_customer_form)){
        $cassiopeia_user_customer_form = drupal_render($cassiopeia_user_customer_form);
        echo $cassiopeia_user_customer_form;
    }
    ?>
</div>