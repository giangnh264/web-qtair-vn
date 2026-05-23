<?php drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/agent-login.js', ['weight' => 10000000]); ?>
<?php
global $user;
$arg = arg();
?>
<?php if ($messages): ?>
    <div id="console" class="clearfix"><?php print $messages; ?></div>
<?php endif; ?>
<?php include('header.inc'); ?>
    <div class="qt-user-cover page-logined">
        <!-- main-sidebar: sty can be found in sass component sidebar.scss -->
        <?php echo _cassiopeia_render_theme("module","cassiopeia_user","nav/nav-user.tpl.php"); ?>


        <div class="main-content" style="min-height: 600px;">
            <div class="box">
                <div class="box-body">
                    <?php echo drupal_render($page['content']); ?>
                </div>
            </div>
        </div>
    </div>
<?php include('footer.inc'); ?>