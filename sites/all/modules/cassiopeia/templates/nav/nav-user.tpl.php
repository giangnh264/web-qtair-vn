<?php
global $user;
$arg = arg();
$menuItems = array(
    'payment-qr' => array(
        "url" => "user/manager/payment-qr",
        "anchor" => '<i class="fa fa-qrcode"></i>Tạo QR thu tiền',
        "activeSign" => "payment-qr",
    ),
    0 => array(
        "url"       => "user/manager/create-booking",
        "anchor"    => "<i class=\"fa fa-plus-square-o\"></i>Đặt chỗ",
        "activeSign"=> "create-booking",
    ),
    2 => array(
        "url"       => "user/manager/booking",
        "anchor"    => "<span class=\"glyphicon glyphicon-list-alt\"></span>Đơn hàng",
        "activeSign"=> "booking",
    ),
    3 => array(
        "url"       => "user/manager/ticketIssue",
        "anchor"    => "<span class=\"glyphicon glyphicon-flash\"></span>Xuất vé",
        "activeSign"=> "ticketIssue",
    ),
    4 => array(
        "url"       => "admin/manager/ticketVoid",
        "anchor"    => "<span class=\"glyphicon glyphicon-flash\"></span>Void vé",
        "activeSign"=> "ticketVoid",
    ),
    5 => array(
        "url"       => "user/manager/bao-cao-xuat-ve",
        "anchor"    => "<span class=\"fa fa-list-alt\"></span>Báo cáo xuất vé",
        "activeSign"=> "bao-cao-xuat-ve",
    ),
    17 => array(
        "url"       => "user/manager/bao-cao-tich-diem",
        "anchor"    => "<span class=\"fa fa-list-alt\"></span>Báo cáo tích điểm",
        "activeSign"=> "bao-cao-tich-diem",
    ),
    6 => array(
        "url"       => "user/manager/bao-cao-doanh-thu",
        "anchor"    => "<span class=\"fa fa-list-alt\"></span>Báo cáo doanh thu",
        "activeSign"=> "bao-cao-doanh-thu",
    ),
    7 => array(
        "url"       => "user/manager/bao-cao-dai-ly",
        "anchor"    => "<span class=\"fa fa-list-alt\"></span>Báo cáo Đại lý",
        "activeSign"=> "bao-cao-dai-ly",
    ),
    8 => array(
        "url"       => "admin/manager/partners",
        "anchor"    => "<span class=\"glyphicon glyphicon-list-alt\"></span>Danh sách đại lý",
        "activeSign"=> "partners",
    ),
    9 => array(
        "url"       => "user/manager/customer",
        "anchor"    => "<span class=\"glyphicon glyphicon-list-alt\"></span>Danh sách khách hàng",
        "activeSign"=> "customer",
    ),

    11 => array(
        "url"       => "admin/manager/top-up-request",
        "anchor"    => "<span class=\"glyphicon glyphicon-list-alt\"></span>Yêu cầu top up",
        "activeSign"=> "top-up-request",
    ),
    12 => array(
        "url"       => "admin/manager/top-up",
        "anchor"    => "<i class=\"fa fa-plus-square-o\"></i>Nạp tiền đại lý",
        "activeSign"=> "top-up",
    ),
    13 => array(
        "url"       => "admin/manager/tru-tien",
        "anchor"    => "<i class=\"fa fa-minus-square-o\"></i>Trừ tiền đại lý",
        "activeSign"=> "tru-tien",
    ),
    14 => array(
        "url"       => "user/manager/top-up",
        "anchor"    => "<i class=\"fa fa-plus-square-o\"></i>Nạp tiền",
        "activeSign"=> "top-up",
    ),
    15 => array(
        "url"       => "user/manager/tich-diem-doi-qua",
        "anchor"    => "<span class=\"glyphicon glyphicon-gift\"></span>Tích điểm & đổi quà",
        "activeSign"=> "top-up",
    ),
    16 => array(
        "url"       => "user/manager/lich-su-top-up",
        "anchor"    => "<i class=\"fa fa-arrow-circle-o-up\"></i> Lịch sử top up",
        "activeSign"=> "ilch-sutop-up",
    ),

)
?>
<div class="user-navigator nav-user">
    <ul>
        <?php foreach($menuItems as $menuItem): ?>
            <?php $menu_item = menu_get_item($menuItem['url']); ?>
            <?php if(!empty($menu_item) && !empty($menu_item['access'])):?>
                <li class="<?php if(!empty($arg[2])&&$arg[2]==$menuItem['activeSign']) echo "active"; ?>">
                    <a href="/<?php echo $menuItem['url'] ?>"><?php echo $menuItem['anchor'] ?></a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
    <?php if(user_has_role(4) && !empty($variables['showPoint'])): ?>
        <?php
        $_user = user_load($user->uid);
        $totalPoint = !empty($_user->field_point['und'][0]['value'])?$_user->field_point['und'][0]['value']:0;
        $usedPoint = !empty($_user->field_used_point['und'][0]['value'])?$_user->field_used_point['und'][0]['value']:0;
        $availablePoint = $totalPoint - $usedPoint;
        if(!empty($_user->field_debt['und'][0]['nid'])){
            $debt = node_load($_user->field_debt['und'][0]['nid']);
        }else{
            $debt = null;
        }
        ?>
        <div class="balance-info">
            <ul>
                <li><img src="/sites/all/themes/cassiopeia_theme/img/icons/account/cash.png" alt="">Số dư hiện tại : <?php if(!empty($_user->field_account_balance['und'][0]['value'])) print(number_format($_user->field_account_balance['und'][0]['value'],0,",",".")); ?> đ</li>
                <li><img src="/sites/all/themes/cassiopeia_theme/img/icons/account/cash.png" alt="">Hạn mức công nợ:  <?php if(!empty($debt)) print(number_format($debt->title,0,",",".")); ?> đ</li>
                <li><img src="/sites/all/themes/cassiopeia_theme/img/icons/account/cash.png" alt="">Điểm tích lũy:  <?php print($availablePoint); ?></li>
            </ul>
        </div>
    <?php endif; ?>
    <div class="log-out">
        <a href="/user/logout"><i class="fa fa-sign-out"></i> Đăng xuất</a>
    </div>
    <div class="mb-close-nav d-sm">
        <span></span>
    </div>
</div>