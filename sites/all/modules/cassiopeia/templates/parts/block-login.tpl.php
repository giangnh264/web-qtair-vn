<?php
global $user;
if (!empty($user)) {
    $_user = user_load($user->uid);
}
//if(!empty($variables['user'])){
//    $_user = user_load($variables['user']);
//}
$_user = user_load($user->uid);
$totalPoint = !empty($_user->field_point['und'][0]['value']) ? $_user->field_point['und'][0]['value'] : 0;
$usedPoint = !empty($_user->field_used_point['und'][0]['value']) ? $_user->field_used_point['und'][0]['value'] : 0;
$availablePoint = $totalPoint - $usedPoint;
?>
<?php global $language; ?>
<div class="header-login">
    <?php if (!empty($user->uid)) : ?>
        <div class="header-login-icon-responsive">
            <a href="/user/<?php print($user->uid); ?>/edit""><img src=" /sites/all/themes/cassiopeia_theme/img/avatar.jpg" alt=""></a>
        </div>
    <?php else : ?>
        <div class="header-login-icon-responsive">
            <a href="/agent/login"><span class="fa fa-user"></span></a>
        </div>
    <?php endif; ?>
    <div class="block-login">
        <?php if (!empty($user->uid)) : ?>
            <div class="notify">
                <?php
                $notifies = cassiopeia_get_items_by_conditions(array(), "notify", "node");
                $query = db_select("node", "tbl_node");
                $query->fields("tbl_node");
                $query->join("field_data_field_read", "field_read", "field_read.entity_id=tbl_node.nid");
                $query->condition("field_read.field_read_value", $user->uid, "=");
                $query->groupBy("tbl_node.nid");
                $result = $query->execute()->fetchAll();
                $notes = count($notifies) - count($result);
                ?>
                <a href="/user/manager/notify"><span class="fa fa-bell-o"></span>
                    <?php if (!empty($notes)) : ?>
                        <span class="count"><?php print($notes); ?></span>
                    <?php endif; ?>
                </a>
            </div>
            <div class="header-user">
                <div class="avatar">
                    <?php

                    if (!empty($_user->picture)) :
                        $node_img = (array) $_user->picture;
                        $node_img['style_name'] = "style_60x60";
                        $node_img['path'] = $node_img['uri'];
                        $node_img = theme('image_style', $node_img);
                        if (user_has_role(4)) {
                            print(l($node_img, '/user/manager/dashboard', array('html' => TRUE)));
                        } else {
                            print(l($node_img, '/user/' . $user->uid . "/edit", array('html' => TRUE)));
                        }
                    else :
                    ?>
                        <?php if (user_has_role(4, $user)) : ?>
                            <a href="/user/manager/dashboard"><img src="/sites/all/themes/cassiopeia_theme/img/avatar.jpg" alt=""></a>
                        <?php else : ?>
                            <a href="/user/<?php print($user->uid); ?>/edit"><img src="/sites/all/themes/cassiopeia_theme/img/avatar.jpg" alt=""></a>
                        <?php endif; ?>
                    <?php
                    endif;
                    ?>
                </div>
                <?php if (user_has_role(4, $user)) : ?>
                    <a href="/user/manager/dashboard"><?php print($user->name); ?></a>
                <?php else : ?>
                    <a href="/user/<?php print($user->uid); ?>/edit"><?php print($user->name); ?></a>
                <?php endif; ?>

                <div class="arrow-down"><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                <div class="header-user-menu">
                    <div class="header-user-menu-content">
                        <div class="left-menu">
                            <div class="menu-user-info">
                                <?php echo _cassiopeia_render_theme("module", "cassiopeia_user", "nav/nav-user.tpl.php"); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <a class="item-login" href="/agent/login">Đăng nhập</a> <a href="/user/register">Đăng ký</a>
            <?php endif; ?>
            </div>
    </div>
</div>