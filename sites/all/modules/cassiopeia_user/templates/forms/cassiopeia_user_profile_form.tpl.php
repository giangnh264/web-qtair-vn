<?php
/**
 * Created by PhpStorm.
 * User: VDP
 * Date: 18/09/2018
 * Time: 2:41 PM
 */
global $user;
$_user = user_load($user->uid);
$arg = arg();
//print_r($form);
?>
<div class="row">
    <div class="col-md-7">
        <div class="form-item row top-block">
            <div class="col-md-6 profile-avatar">
                <div class="avatar">
                    <?php
                    if (!empty($_user->picture)) {
                        $node_img = (array) $_user->picture;
                        $node_img['style_name'] = "style_150x150";
                        $node_img['path'] = $node_img['uri'];
                        $node_img = theme('image_style', $node_img);
                        print($node_img);
                    }
                    ?>
                </div>
                <label class="btn btn-primary" for="edit-picture-upload">
                    <i class="fa fa-camera"></i> Đổi ảnh đại diện
                </label>
            </div>
            <div class="col-md-6">
                <div class="change-password">
                    <a class="btn btn-danger" href="/user/<?php print($user->uid); ?>/change-password">Thay đổi mật khẩu</a>
                </div>
            </div>
        </div>
        <div class="form-item row">
            <div class="col-md-6">
                <?php print drupal_render($form['field_gender']); ?>
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="form-item row">
            <div class="col-md-6 transaction-name">
                <?php print drupal_render($form['field_account_transaction_name']); ?>
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="form-item row">
            <div class="col-md-6 agent-code">
                <label for="">Mã đại lý:</label>
                <span><?php print(!empty($_user->field_account_code['und'][0]['value'])?$_user->field_account_code['und'][0]['value']:""); ?></span>
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="form-item row">
            <div class="col-md-6">
                <?php print drupal_render($form['field_account_full_name']); ?>
            </div>
            <div class="col-md-6">
                <?php print drupal_render($form['field_birthday']); ?>
            </div>
        </div>
        <div class="form-item row ">
            <div class="col-md-6 user-name">
                <label for="">Số điện thoại ( Tên đăng nhập ) </label>
                <div><?php print($user->name); ?></div>
            </div>
            <div class="col-md-6">
                <?php print drupal_render($form['account']['mail']); ?>
            </div>
        </div>
        <?php if (isset($form['field_agent_ticket_pdf'])): ?>
            <div class="form-item row agent-ticket-pdf-option">
                <div class="col-xs-12">
                    <?php print drupal_render($form['field_agent_ticket_pdf']); ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="form-item row">
            <div class="col-md-8">
                <?php print drupal_render($form['field_address']); ?>
            </div>
            <div class="col-md-4">
                <?php print drupal_render($form['field_account_province']); ?>
            </div>
        </div>
        <div class="form-item row">
            <div class="col-xs-12">
                <?php print drupal_render($form['field_tx_job']); ?>
            </div>
        </div>
    </div>
</div>
<!--<div class="row">-->
<!--    <div class="col-md-7">-->
<!---->
<!---->
<!--        --><?php //print drupal_render($form['account']['name']); ?>
<!--        --><?php //print drupal_render($form['account']['current_pass']); ?>
<!--        --><?php //print drupal_render($form['account']['pass']); ?>
<!--        --><?php //print drupal_render($form['account']['mail']); ?>
<!--        --><?php //print drupal_render($form['field_account_transaction_name']); ?>
<!--        --><?php //print drupal_render($form['field_account_tel']); ?>
<!--        --><?php //print drupal_render($form['group_address']); ?>
<!--    </div>-->
<!--    <div class="col-md-6">-->
<!--        --><?php //print drupal_render($form['group_bank']); ?>
<!--        --><?php //print drupal_render($form['group_cmnd']); ?>
<!--        --><?php //print drupal_render($form['group_authentication']); ?>
<!--    </div>-->
<!--</div>-->

<!--<div style="width: 0px; height: 0px; overflow: hidden; opacity: 0;">-->
    <?php print drupal_render_children($form); ?>
<!--</div>-->


