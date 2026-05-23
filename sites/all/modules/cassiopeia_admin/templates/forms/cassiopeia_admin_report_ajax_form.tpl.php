<?php echo drupal_render_children($form);
drupal_add_js(drupal_get_path("module","cassiopeia_admin")."/templates/js/sort.js");
drupal_add_js(drupal_get_path("module","cassiopeia_admin")."/templates/js/pagination.js");
    $cache = $form['#cache'];
    $cache['page'] = $form['page'];
    $cache['sort_by'] = $form['sort_by']['#value'];
    $cache['sort_direction'] = $form['sort_direction']['#value'];
    switch ($form['#cache']['form_part']){
        case "general_revenue" : echo _cassiopeia_render_theme("module","cassiopeia_admin","templates/form-parts/general-revenue.tpl.php",array("cache"=>$cache)); break;
        case "general_sale" : echo _cassiopeia_render_theme("module","cassiopeia_admin","templates/form-parts/general-sale.tpl.php",array("cache"=>$cache)); break;
        case "general_agent" : echo _cassiopeia_render_theme("module","cassiopeia_admin","templates/form-parts/general-agent.tpl.php",array("cache"=>$cache)); break;
        case "ticket_revenue" : echo _cassiopeia_render_theme("module","cassiopeia_admin","templates/form-parts/ticket-revenue.tpl.php",array("cache"=>$cache)); break;
        case "ticket_airline" : echo _cassiopeia_render_theme("module","cassiopeia_admin","templates/form-parts/ticket-airline.tpl.php",array("cache"=>$cache)); break;
        case "ticket_AG" : echo _cassiopeia_render_theme("module","cassiopeia_admin","templates/form-parts/ticket-AG.tpl.php",array("cache"=>$cache)); break;
        case "ticket_sale" : echo _cassiopeia_render_theme("module","cassiopeia_admin","templates/form-parts/ticket-sale.tpl.php",array("cache"=>$cache)); break;
        case "ticket_booker" : echo _cassiopeia_render_theme("module","cassiopeia_admin","templates/form-parts/ticket-booker.tpl.php",array("cache"=>$cache)); break;
        case "room_revenue" : echo _cassiopeia_render_theme("module","cassiopeia_admin","templates/form-parts/room-revenue.tpl.php",array("cache"=>$cache)); break;
        case "room_hotel" : echo _cassiopeia_render_theme("module","cassiopeia_admin","templates/form-parts/room-hotel.tpl.php",array("cache"=>$cache)); break;
        case "room_AG" : echo _cassiopeia_render_theme("module","cassiopeia_admin","templates/form-parts/room-AG.tpl.php",array("cache"=>$cache)); break;
        case "room_sale" : echo _cassiopeia_render_theme("module","cassiopeia_admin","templates/form-parts/room-sale.tpl.php",array("cache"=>$cache)); break;
        case "room_booker" : echo _cassiopeia_render_theme("module","cassiopeia_admin","templates/form-parts/room-booker.tpl.php",array("cache"=>$cache)); break;
    }
?>
