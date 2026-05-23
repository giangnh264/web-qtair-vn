<?php if(cassiopeia_agent_register_report_accept()): ?>
    <div id="tab-6" class=" <?php if(!empty($arg[3]) && $arg[3]=="tab-6") print("in active"); ?>">
        <div class="filter-block">
            <?php
            if(!empty($_REQUEST['data'])) {
                $cache = $_REQUEST['data'];
            }
            $cache['redirect'] = "admin/manager/report/general/agent";
            $cassiopeia_detail_report_tab_6_filter_form = drupal_get_form("cassiopeia_general_report_filter_form",$cache);
            if(!empty($cassiopeia_detail_report_tab_6_filter_form)){
                $cassiopeia_detail_report_tab_6_filter_form = drupal_render($cassiopeia_detail_report_tab_6_filter_form);
                print($cassiopeia_detail_report_tab_6_filter_form);
            }
            ?>
        </div>
        <?php
        $cache['sort_by'] = "total_hoatdong";
        $cache['direction'] = "DESC";
        $cache['sort_options'] = array(
            'sale'                  => "Sale",
            'total_dangky'        => "Đăng ký",
            'total_tiemnang'   => "Tiềm năng",
            'total_daban'           => "Đã bán",
            'total_nghiban'         => "Nghỉ bán",
            'total_hoatdong'         => "Hoạt động",
        );
        $cache['form_part'] = "general_agent";
        $cassiopeia_admin_report_ajax_form = drupal_get_form("cassiopeia_admin_report_ajax_form",$cache);
        echo drupal_render($cassiopeia_admin_report_ajax_form);
        ?>
    </div>
<?php endif; ?>