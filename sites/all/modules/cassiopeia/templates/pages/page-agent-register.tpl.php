<?php
$config = node_load(12);
?>
<?php //include('header.inc'); ?>

    <div class="page-login-banner">
        <div class="page-login-banner-img">
            <img src="/sites/all/themes/cassiopeia_theme/img/user/img-001.png" alt="">
        </div>
        <div class="page-login-banner-text">
            <div class="container page-login-banner-text-container">
                <div class="page-login-banner-text-container-inner">
                    <h2><?php print($config->title); ?></h2>
                    <span>
                    <?php print($config->field_short_des['und'][0]['value']); ?>
                </span>
                </div>
            </div>
        </div>
    </div>
    <div class="page-login-content">
        <div class="container page-login-content-container">
            <div class="row page-login-content-container-inner">
                <div class="col-md-8 page-login-left">
                    <div class="page-login-left-container">
                        <div class="page-login-left-block-1">
                            <h3>Ưu đãi chỉ dành riêng cho cộng tác viên Autic.vn</h3>
                            <div class="page-login-left-block-1-items">
                                <?php
                                if(!empty($config->field_benefits['und'])){
                                    $benefits = _cassiopeia_load_collections($config->field_benefits['und']);
                                }
                                ?>
                                <?php if(!empty($benefits)): ?>
                                    <?php foreach($benefits as $benefit): ?>
                                        <div class="page-login-left-block-1-item">
                                            <div class="page-login-left-block-1-item-icon">
                                                <?php
                                                if (!empty($benefit->field_icon['und'][0])) {
                                                    $node_img = (array) $benefit->field_icon['und'][0];
                                                    $node_img['style_name'] = "style_66x66";
                                                    $node_img['path'] = $node_img['uri'];
                                                    $node_img = theme('image_style', $node_img);
                                                    print($node_img);
                                                }
                                                ?>
                                            </div>
                                            <div class="page-login-left-block-1-item-group">
                                                <div class="page-login-left-block-1-item-title">
                                                    <h3><?php print($benefit->field_title['und'][0]['value']); ?></h3>
                                                </div>
                                                <div class="page-login-left-block-1-item-summary">
                                                    <?php print($benefit->field_description['und'][0]['value']); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="page-login-left-block-2">
                            <?php
                            if(!empty($config->field_introductions['und'])){
                                $introductions = _cassiopeia_load_collections($config->field_introductions['und']);
                            }
                            ?>
                            <?php if(!empty($introductions)): ?>
                                <?php foreach($introductions as $introduction): ?>
                                    <div class="page-login-left-block-short">
                                        <div class="page-login-left-block-short-title">
                                            <span><?php print($introduction->field_title['und'][0]['value']); ?></span>
                                        </div>
                                        <div class="page-login-left-block-short-content">
                                            <?php print($introduction->field_content['und'][0]['value']); ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 page-login-right">
                    <div class="page-login-right-container">
                        <h3>Đăng ký thành viên Autic.vn</h3>
                        <div class="page-login-right-content">
                              <?php
                                    $cassiopeia_partner_register_form = drupal_get_form("cassiopeia_partner_register_form");
                                    if(!empty($cassiopeia_partner_register_form)){
                                        $cassiopeia_partner_register_form = drupal_render($cassiopeia_partner_register_form);
                                        print($cassiopeia_partner_register_form);
                                    }
                              ?>
                        </div>
                    </div>
                    <div class="page-article-block">
                        <div class="block-handbook">
                            <div class="block-title">
                                <h3>Cẩm nang</h3>
                            </div>
                            <div class="block-inner">
                                <?php if(!empty($config->field_hand_book['und'])): ?>
                                    <?php foreach($config->field_hand_book['und'] as $item): $article = node_load($item['nid']);?>
                                        <?php print(_cassiopeia_render_theme("module","cassiopeia","templates/parts/article-type-3.tpl.php",array("node"=>$article,"image_style"=>"style_120x76"))); ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="block-promotion">
                            <div class="block-title">
                                <h3>Khuyến mại</h3>
                            </div>
                            <div class="block-inner">
                                <?php if(!empty($config->field_promotion['und'])): ?>
                                    <?php foreach($config->field_promotion['und'] as $item): $article = node_load($item['nid']);?>
                                        <?php print(_cassiopeia_render_theme("module","cassiopeia","templates/parts/article-type-3.tpl.php",array("node"=>$article,"image_style"=>"style_120x76"))); ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php //include('footer.inc'); ?>