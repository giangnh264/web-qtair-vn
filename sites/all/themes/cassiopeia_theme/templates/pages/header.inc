<?php
/**
 * Created by PhpStorm.
 * User: VDP
 * Date: 18/04/2017
 * Time: 10:01 AM
 */

global $user;
global $language;
global $base_url;

if (!empty($user->uid)) {
  $_user = user_load($user->uid);
}

$cassiopeia_site_name = variable_get('site_name');
$cassiopeia_hotline = variable_get('hotline');

?>
<header class="header header-fixed" id="header">
    <div class="header-container container">
        <div class="header-inner">
            <div class="toggle-menu d-xs">
                <span></span>
            </div>
            <div class="header-logo">
                <div class="header-logo-content">
                    <h1>
                        <?php if(!empty($logo)): ?>
                            <a href="/"><img width="151px" src="<?php print($logo); ?>"></a>
                        <?php endif; ?>
                    </h1>
                </div>
            </div>

            <div class="header-main">
                <div class="header-main-content">
                    <div class="header-navigator">
                        <?php
                        $main_menu = menu_tree_all_data("main-menu");
                        $main_menu = menu_tree_output($main_menu);
                        $main_menu = render($main_menu);
                        print($main_menu);
                        ?>
                    </div>
                    <div class="header-user">
                        <?php print(_cassiopeia_render_theme("module","cassiopeia","templates/parts/block-login.tpl.php")); ?>
                    </div>
                    <div id="google_translate_element"></div>
                </div>
            </div>
        </div>
    </div>
</header>
