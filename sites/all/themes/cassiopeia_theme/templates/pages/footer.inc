<?php
/**
 * Created by PhpStorm.
 * User: VDP
 * Date: 18/04/2017
 * Time: 2:19 PM
 */
global $user;
?>
<div class="loading-block">
    <div class="loading-block-container">
        <div class="lds-css ng-scope">
            <div class="lds-spin" style="width:100%;height:100%"><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div></div>
        </div>
    </div>
</div>
<footer class="footer" id="footer">
    <div class="footer-container container">
        <div class="footer-inner">
            <div class="footer-main">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-5">
                        <div class="footer-item footer-item-contact">
                            <div class="footer-item-logo mb-3">
                                <a href="#">
                                    <img
                                            src="/sites/all/themes/cassiopeia_theme/img/footer-logo.png"
                                            class="img-responsive"
                                            alt=""
                                    />
                                </a>
                            </div>
                            <ul class="custom-nav">
                                <li>
                                    <p>
                                        <i class="fa-regular fa-location-dot mr-1"></i>
                                        Cơ sở 1:
                                        <b><?php echo variable_get("brach_address_1"); ?></b>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa-regular fa-location-dot mr-1"></i>
                                        Cơ sở 2:
                                        <b><?php echo variable_get("brach_address_2"); ?></b>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa-regular fa-location-dot mr-1"></i>
                                        Cơ sở 3:
                                        <b
                                        ><?php echo variable_get("brach_address_3"); ?></b
                                        >
                                    </p>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="footer-item footer-menu quick-links">
                            <?php
                            $main_menu = menu_tree_all_data("menu-footer");
                            $main_menu = menu_tree_output($main_menu);
                            $main_menu = render($main_menu);
                            print($main_menu);
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-sub mt-3">
                <ul class="custom-nav">
                    <li>
                        <a href="#">
                  <span class="icon"
                  ><img src="/sites/all/themes/cassiopeia_theme/img/icons/head-phone.svg" alt=""
                      /></span>
                            <p>
                                Hỗ trợ khách hàng
                                <b><?php echo variable_get("hotline"); ?></b>
                            </p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                  <span class="icon"
                  ><img src="/sites/all/themes/cassiopeia_theme/img/icons/head-phone.svg" alt=""
                      /></span>
                            <p>
                                Email hỗ trợ
                                <b><?php echo variable_get("site_mail"); ?></b>
                            </p>
                        </a>
                    </li>
                </ul>

                <div class="footer-utils">
                    <a href="#">
                        <img src="/sites/all/themes/cassiopeia_theme/img/image.png" class="img-responsive" alt="" />
                    </a>
                    <ul
                            class="nav-sci"
                            style="--color: #ffffff99; --border-color: #ffffff99"
                    >
                        <?php $instagram_url = variable_get("instagram_url", ""); if(!empty($instagram_url)): ?>
                            <li>
                                <a href="<?php echo variable_get("instagram_url"); ?>" rel="nofollow ">
                                    <i class="fab fa-instagram fa-fw"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php $facebook_url = variable_get("facebook_url", ""); if(!empty($facebook_url)): ?>
                            <li>
                                <a href="<?php echo variable_get("facebook_url"); ?>" rel="nofollow ">
                                    <i class="fab fa-facebook-f fa-fw"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php $youtobe_url = variable_get("youtobe_url", ""); if(!empty($youtobe_url)): ?>
                            <li>
                                <a href="<?php echo variable_get("youtobe_url"); ?>" rel="nofollow ">
                                    <i class="fab fa-youtube fa-fw"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

            <div class="h-line mt-3 mb-3"></div>

            <div class="copy-right">
                <p>© 2022. All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>
