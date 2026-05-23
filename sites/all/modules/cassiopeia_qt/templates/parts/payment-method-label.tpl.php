<?php if($payment_method==INTERNATIONAL_CARD): ?>
    <div class = "icon-payments">
        <img src="/sites/all/themes/cassiopeia_theme/img/icons/option-pay-2.svg" alt="">
    </div>
    <span>Thẻ quốc tế (Visa - Mastercard - JCB - AMEX)</span>
    <?php if(!empty($note)): ?>
        <div><?php echo $note; ?></div>
    <?php endif; ?>
<?php endif; ?>

<?php if($payment_method==DOMESTIC_CARD): ?>
    <div class = "icon-payments">
        <img src="/sites/all/themes/cassiopeia_theme/img/icons/option-pay-3.svg" alt="">
    </div>
    <span>Thẻ nội địa</span>
    <?php if(!empty($note)): ?>
        <div><?php echo $note; ?></div>
    <?php endif; ?>
<?php endif; ?>

<?php if($payment_method==INTERNET_BANKING): ?>
    <div class = "icon-payments">
        <img src="/sites/all/themes/cassiopeia_theme/img/icons/option-pay-4.svg" alt="">
    </div>
    <span>Chuyển khoản nhận ngay 24/7</span>
    <?php if(!empty($note)): ?>
        <div><?php echo $note; ?></div>
    <?php endif; ?>
<?php endif; ?>

<?php if($payment_method==QR_PAY): ?>
    <div class = "icon-payments">
        <img src="/sites/all/themes/cassiopeia_theme/img/icons/option-pay-5.png" alt="">
    </div>
    <span>QR PAY</span>
    <?php if(!empty($note)): ?>
        <div><?php echo $note; ?></div>
    <?php endif; ?>
<?php endif; ?>
<?php if($payment_method==PAYMENT_HOLD): ?>
    <div class = "icon-payments">
        <img src="/sites/all/themes/cassiopeia_theme/img/icons/option-pay-6.svg" alt="">
    </div>
    <span>Giữ chỗ</span>
<?php endif; ?>

<?php if($payment_method==QT_CREDIT): ?>
    <div class = "icon-payments">
        <img src="/sites/all/themes/cassiopeia_theme/img/icons/option-pay-1.png" alt="">
    </div>
    <span>Quang Trang Credit</span>
    <div class="node-payments-op-1 mt-1">
        <div>Số dư tài khoản:
            <span><?php echo number_format($balance,0,",","."); ?> đồng</span>
            <a href="#" data-toggle="modal" data-target="#modalTopup">Nạp tiền</a>
        </div>
    <?php if(!empty($note)): ?>
        <?php echo $note; ?>
    <?php endif; ?>
    </div>
<?php endif; ?>
