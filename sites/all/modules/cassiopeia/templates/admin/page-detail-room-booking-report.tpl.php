<?php
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/detail-report.js', ['weight' => 1000]);
$arg = arg();
if(empty($arg[3])){
    if(user_has_role(8)){
        $arg[3] = 'theo-hang';
    }else{
        $arg[3] = 'tong-ket';
    }
}
?>
<div class="page-detail-report">
    <div class="page-container">
        <div class="block-menu">
            <ul>
                <?php if(user_has_role(3) || user_has_role(7)|| user_has_role(9)): ?>
                    <li class="<?php if(empty($arg[3]) || $arg[3]=='tong-ket') echo("active"); ?>">
                        <a href="/admin/manager/bao-cao-tong-hop-dat-phong/tong-ket">Tổng kết</a>
                    </li>
                <?php endif; ?>
                <?php if(user_has_role(3) || user_has_role(7)|| user_has_role(8)|| user_has_role(9)): ?>
<!--                    <li class="--><?php //if($arg[3]=='theo-hang') echo("active"); ?><!--">-->
<!--                        <a href="/admin/manager/bao-cao-tong-hop-dat-phong/theo-hang">Theo hãng</a>-->
<!--                    </li>-->
                <?php endif; ?>
                <li class="<?php if($arg[3]=='theo-AG') echo("active"); ?>">
                    <a href="/admin/manager/bao-cao-tong-hop-dat-phong/theo-AG">Theo AG</a>
                </li>
                <?php if(user_has_role(3) || user_has_role(7)|| user_has_role(5)|| user_has_role(9)): ?>
                    <li class="<?php if($arg[3]=='theo-sale') echo("active"); ?>">
                        <a href="/admin/manager/bao-cao-tong-hop-dat-phong/theo-sale">Theo Sale</a>
                    </li>
                <?php endif; ?>
                <?php if(user_has_role(3) || user_has_role(7)|| user_has_role(8)|| user_has_role(9)): ?>
                    <li class="<?php if($arg[3]=='theo-booker') echo("active"); ?>">
                        <a href="/admin/manager/bao-cao-tong-hop-dat-phong/theo-booker">Theo Booker</a>
                    </li>
                <?php endif; ?>
                <?php if(user_has_role(3) || user_has_role(7)|| user_has_role(5)|| user_has_role(9)): ?>
<!--                    <li class="--><?php //if($arg[3]=='theo-dai-ly') echo("active"); ?><!--">-->
<!--                        <a href="/admin/manager/bao-cao-tong-hop-dat-phong/theo-dai-ly">Báo cáo đại lý</a>-->
<!--                    </li>-->
                <?php endif; ?>
                <?php if(user_has_role(3) || user_has_role(7)|| user_has_role(9)): ?>
<!--                    <li class="--><?php //if($arg[3]=='tong-hop-thanh-toan') echo("active"); ?><!--">-->
<!--                        <a href="/admin/manager/bao-cao-tong-hop-dat-phong/tong-hop-thanh-toan">Tổng hợp thanh toán</a>-->
<!--                    </li>-->
                <?php endif; ?>
            </ul>
        </div>
        <div class="block-inner">
            <?php
            //            if(!empty($arg[3])){
            switch ($arg[3]){
                case  "tong-ket" :
                    print(_cassiopeia_render_theme("module","cassiopeia","templates/parts/room-booking/detail-report-tab-1.tpl.php"));
                    break;
                case  "theo-hang" :
                    print(_cassiopeia_render_theme("module","cassiopeia","templates/parts/room-booking/detail-report-tab-2.tpl.php"));
                    break;
                case  "theo-AG" :
                    print(_cassiopeia_render_theme("module","cassiopeia","templates/parts/room-booking/detail-report-tab-3.tpl.php"));
                    break;
                case  "theo-sale" :
                    print(_cassiopeia_render_theme("module","cassiopeia","templates/parts/room-booking/detail-report-tab-4.tpl.php"));
                    break;
                case  "theo-booker" :
                    print(_cassiopeia_render_theme("module","cassiopeia","templates/parts/room-booking/detail-report-tab-5.tpl.php"));
                    break;
                case  "theo-dai-ly" :
                    print(_cassiopeia_render_theme("module","cassiopeia","templates/parts/room-booking/detail-report-tab-6.tpl.php"));
                    break;
                case  "tong-hop-thanh-toan" :
                    print(_cassiopeia_render_theme("module","cassiopeia","templates/parts/room-booking/detail-report-tab-7.tpl.php"));
                    break;
                default:
                    print(_cassiopeia_render_theme("module","cassiopeia","templates/parts/room-booking/detail-report-tab-1.tpl.php"));
                    break;
            }
            ?>
        </div>
    </div>
</div>