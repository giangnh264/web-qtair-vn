<?php

// For admins
function cassiopeia_manager_admin_issue_the_ticket () {
    return _cassiopeia_render_theme("module","cassiopeia_manager","templates/pages/admin/page_issue_the_ticket.tpl.php");
}


function cassiopeia_manager_admin_pay() {
    return _cassiopeia_render_theme("module","cassiopeia_manager","templates/pages/admin/page_pay.tpl.php");
}


// For users

function cassiopeia_manager_user_issue_the_ticket () {
    return _cassiopeia_render_theme("module","cassiopeia_manager","templates/pages/user/page_issue_the_ticket.tpl.php");
}

function cassiopeia_manager_user_pay() {
    return _cassiopeia_render_theme("module","cassiopeia_manager","templates/pages/user/page_pay.tpl.php");
}

