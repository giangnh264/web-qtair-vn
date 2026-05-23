<?php
$account = $variables['account'];
$type = !empty($_REQUEST['type'])?$_REQUEST['type']:'f1';
$permissions = array();
$permissions_list = unserialize(USER_PERMISSIONS_LIST);
?>
<!---->
<!--<div class="box box-solid ">-->
<!--  <div class="box-body">-->
<div class="application-user-permissions-page">
    <div class="application-user-permissions-page-container">
        <div class="application-user-permissions-page-header navbar navbar-default">
            <ul class="nav navbar-nav">
                <?php foreach($permissions_list as $key => $value): ?>
                    <li><a class="<?php if ($type==$key){print('active');} ?>" href="<?php print('/admin/manager/'.('user/'.$account->uid).'/permissions?type='.$key); ?>"><?php echo strtoupper($key); ?>. <?php echo $value['title']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="application-user-permissions-page-body">
            <div class="box box-solid">
                <div class="box-body" style="padding: 10px;">
                    <?php
                    $cassiopeia_user_permissions_form = drupal_get_form('cassiopeia_user_permissions_form', array('user'=>$account, 'type'=>$type));
                    $cassiopeia_user_permissions_form = drupal_render($cassiopeia_user_permissions_form);
                    print ($cassiopeia_user_permissions_form);
                    ?>
                </div>
            </div>
        </div>

    </div>
</div>
<!--  </div>-->
<!--</div>-->
