<?php global $user; ?>
<?php
$_user = user_load($user->uid);
$totalPoint = !empty($_user->field_point['und'][0]['value']) ? $_user->field_point['und'][0]['value'] : 0;
$usedPoint = !empty($_user->field_used_point['und'][0]['value']) ? $_user->field_used_point['und'][0]['value'] : 0;
$availablePoint = $totalPoint - $usedPoint;
?>
<aside class="main-sidebar">
    <nav class="main-sidebar-content">
        <div class="sidebar-nav">
            <ul class="custom-nav">
                <?php if (cassiopeia_user_manager_access()): ?>
                    <li>
                        <?php echo l("<span class=\"icon\"><i class=\"fa-light fa-grid-2\"></i></span><span>Trang quản trị</span>", "admin/cassiopeia/dashboard", array("html" => TRUE)); ?>
                    </li>
                <?php else: ?>
                    <li>
                        <?php echo l("<span class=\"icon\"><i class=\"fa-light fa-grid-2\"></i></span><span>Trang chủ</span>", "user/manager/dashboard", array("html" => TRUE)); ?>
                    </li>
                    <li>
                        <?php echo l("<span class=\"icon\"><i class=\"fa-light fa-chair-office\"></i></span><span>Danh sách đặt chỗ</span>", "user/manager/booking", array("html" => TRUE)); ?>
                    </li>
                    <?php $menu_item = menu_get_item("user/manager/bao-cao-xuat-ve"); ?>
                    <?php if (!empty($menu_item) && !empty($menu_item['access'])): ?>
                        <li>
                            <?php echo l("<span class=\"icon\"><i class=\"fa-light fa-clipboard-list\"></i></span><span>Báo cáo xuất vé</span>", "user/manager/bao-cao-xuat-ve", array("html" => TRUE)); ?>
                        </li>
                    <?php endif; ?>

                    <?php $menu_item = menu_get_item("user/manager/bao-cao-tich-diem"); ?>
                    <?php if (!empty($menu_item) && !empty($menu_item['access'])): ?>
                        <li>
                            <?php echo l("<span class=\"icon\"><i class=\"fa-light fa-clipboard-list\"></i></span><span>Báo cáo tích điểm</span>", "user/manager/bao-cao-tich-diem", array("html" => TRUE)); ?>
                        </li>
                    <?php endif; ?>

                    <!--                    <li>-->
                    <!--                        --><?php //echo l("<span class=\"icon\"><i class=\"fa-light fa-clipboard-list\"></i></span><span>Báo cáo doanh thu</span>","user/manager/report",array("html"=>TRUE)); ?>
                    <!--                    </li>-->
                    <?php $menu_item = menu_get_item("user/manager/ticketIssue"); ?>
                    <?php if (!empty($menu_item) && !empty($menu_item['access'])): ?>
                        <li>
                            <?php echo l("<span class=\"icon\"><i class=\"fa-light fa-ticket-airline\"></i></span><span>Xuất vé</span>", "user/manager/ticketIssue", array("html" => TRUE)); ?>
                        </li>
                    <?php endif; ?>
                    <?php $menu_item = menu_get_item("user/manager/ticketReview"); ?>
                    <?php if (!empty($menu_item) && !empty($menu_item['access'])): ?>
                        <li>
                            <?php echo l("<span class=\"icon\"><i class=\"fa-light fa-file-pdf\"></i></span><span>Mở mặt vé</span>", "user/manager/ticketReview", array("html" => TRUE)); ?>
                        </li>
                    <?php endif; ?>
                    <?php $menu_item = menu_get_item("admin/manager/ticketVoid"); ?>
                    <?php /*if (!empty($menu_item) && !empty($menu_item['access'])): */?>
                        <li>
                            <?php //echo l("<span class=\"icon\"><i class=\"fa-light fa-ticket-airline\"></i></span><span>Void vé VN</span>", "admin/manager/ticketVoid", array("html" => TRUE)); ?>
                        </li>
                    <?php //endif; ?>
                    <?php $menu_item = menu_get_item("admin/manager/edit-booking-vn"); ?>
                    <?php if (!empty($menu_item) && !empty($menu_item['access'])): ?>
                        <li>
                            <?php echo l("<span class=\"icon\"><i class=\"fa-light fa-ticket-airline\"></i></span><span>Nghiệp vụ đặt chỗ VN</span>", "admin/manager/edit-booking-vn", array("html" => TRUE)); ?>
                        </li>
                    <?php endif; ?>

                    <li>
                        <?php echo l("<span class=\"icon\"><i class=\"fa-light fa-money-check-dollar\"></i></span><span>Thiết lập giá</span>", "user/manager/create-booking", array("html" => TRUE)); ?>
                    </li>

                    <li>
                        <?php echo l("<span class=\"icon\"><i class=\"fa-light fa-clipboard-list-check\"></i></span><span>Danh sách khách hàng</span>", "user/manager/customer", array("html" => TRUE)); ?>
                    </li>

                    <li>
                        <?php echo l("<span class=\"icon\"><i class=\"fa-light fa-user\"></i></span><span>Thông tin tài khoản</span>", "user/" . $user->uid . "/edit", array("html" => TRUE)); ?>
                    </li>
                    <li>
                        <?php echo l("<span class=\"icon\"><i class='fa-light fa-money-bill'></i></span><span>Nạp tiền</span>", "user/" . $user->uid . "/add-topup", array("html" => TRUE)); ?>
                    </li>
<!--                    <li>-->
<!--                        --><?php //echo l("<span class=\"icon\"><i class='fa-light fa-money-bill'></i></span><span>Lịch sử nạp tiền</span>", "user/" . $user->uid . "/topup", array("html" => TRUE)); ?>
<!--                    </li>-->

                    <li class="balance">
                        <a href="#">
                        <span class="icon"
                        ><img src="/sites/all/themes/cassiopeia_theme/img/icons/sb-icon-2.svg" alt=""
                            /></span>
                            <p>
                          <span class="d-block clr-gray-light"
                          >Số dư tài khoản</span
                          >
                                <b class="ff-bold"><?php echo !empty($_user->field_account_balance['und'][0]['value']) ? number_format($_user->field_account_balance['und'][0]['value'], 0, ",", ".") : 0; ?>
                                    đ</b>
                            </p>
                        </a>

                        <!--                        <a href="#">-->
                        <!--                        <span class="icon"-->
                        <!--                        ><img src="/sites/all/themes/cassiopeia_theme/img/icons/sb-icon-1.svg" alt=""-->
                        <!--                            /></span>-->
                        <!--                            <p>-->
                        <!--                          <span class="d-block clr-gray-light"-->
                        <!--                          >Điểm tích lũy</span-->
                        <!--                          >-->
                        <!--                                <b class="ff-bold">-->
                        <?php //echo number_format($availablePoint,0,",","."); ?><!--</b>-->
                        <!--                            </p>-->
                        <!--                        </a>-->
                    </li>
                <?php endif; ?>
                <li>
                    <a href="/user/logout">
                        <span class="icon"
                        ><i class="fa-light fa-arrow-right-from-bracket"></i
                            ></span>
                        <span class="clr-danger">Đăng xuất </span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</aside>
