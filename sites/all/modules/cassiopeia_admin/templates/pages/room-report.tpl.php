<?php
$cache = !empty($_REQUEST['data'])?$_REQUEST['data']:array();
$date_filter = !empty($cache['date_filter'])?$cache['date_filter']:date("m-Y",REQUEST_TIME);
$cache['date_filter'] = $date_filter;

$arg = arg();

$childMenuArray = array(
    "admin/manager/report/room/revenue"       => "Doanh thu",
    "admin/manager/report/room/hotel"       => "Theo Khách sạn",
    "admin/manager/report/room/AG"            => "Theo AG",
    "admin/manager/report/room/sale"          => "Theo BD",
    "admin/manager/report/room/booker"        => "Theo Booker",
//    "admin/manager/report/room/agent"         => "Báo cáo đại lý",
);
$option = !empty($arg[4])?$arg[4]:"revenue";
?>
<div class="page-report">
    <ul class="nav-1">
        <li class="<?php if(!empty($arg[3])&&$arg[3]=="general") echo "active"; ?>"><a href="/admin/manager/report/general">Tổng hợp</a></li>
        <li class="<?php if(empty($arg[3])||$arg[3]=="ticket") echo "active"; ?>"><a href="/admin/manager/report/ticket">Vé máy bay</a></li>
        <li class="<?php if(!empty($arg[3])&&$arg[3]=="room") echo "active"; ?>"><a href="/admin/manager/report/room">Đặt phòng</a></li>
    </ul>
    <ul class="nav-2">
        <?php if(!empty($childMenuArray)): $index=1; ?>
            <?php foreach($childMenuArray as $key => $value): ?>
                <?php $class=""; if(empty($arg[4])&&$index==1) $class="active"; ?>
                <li><?php echo l($value,$key,array("attributes"=>array("class"=>array($class)))); ?></li>
                <?php $index++; endforeach; ?>
        <?php endif; ?>
    </ul>

    <div class="page-body">
        <?php
        switch ($option){
            case  "revenue" :
                echo(_cassiopeia_render_theme("module","cassiopeia_admin","templates/parts/report/room/revenue.tpl.php"));
                break;
            case "hotel" :
                echo(_cassiopeia_render_theme("module","cassiopeia_admin","templates/parts/report/room/hotel.tpl.php"));
                break;
            case "AG" :
                echo(_cassiopeia_render_theme("module","cassiopeia_admin","templates/parts/report/room/AG.tpl.php"));
                break;
            case "sale" :
                echo(_cassiopeia_render_theme("module","cassiopeia_admin","templates/parts/report/room/sale.tpl.php"));
                break;
            case "booker" :
                echo(_cassiopeia_render_theme("module","cassiopeia_admin","templates/parts/report/room/booker.tpl.php"));
                break;
            case "agent" :
                echo(_cassiopeia_render_theme("module","cassiopeia_admin","templates/parts/report/room/agent.tpl.php"));
                break;
            default:
                echo(_cassiopeia_render_theme("module","cassiopeia_admin","templates/parts/report/room/revenue.tpl.php"));
                break;
        }
        ?>
    </div>
</div>