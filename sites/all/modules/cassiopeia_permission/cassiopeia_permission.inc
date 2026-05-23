<?php
drupal_session_start();
function cassiopeia_manager_modules_page_callback(){
    return _cassiopeia_render_theme("module","cassiopeia_permission","templates/pages/modules.tpl.php");
}