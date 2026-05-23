<div class="home-introduction">
    <div class="container home-introduction-container">
        <div class="row home-introduction-container-inner">
            <div class="col-md-6 home-introduction-left">
                <div class="home-introduction-left-content">
                    <?php
                        $_fid = variable_get("cassiopeia_config_home_introduction_left_image");
                        if(!empty(file_load($_fid))){
                            $left_image = file_load($_fid);
                        }
                    ?>
                    <?php
                    if (!empty($left_image)) {
                        $node_img = (array) $left_image;
                        $node_img['style_name'] = "style_555x533";
                        $node_img['path'] = $node_img['uri'];
                        $node_img = theme('image_style', $node_img);
                        print($node_img);
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-6 home-introduction-right">
                <div class="home-introduction-right-items">
                    <div class="home-introduction-right-item-container">
                        <div class="home-introduction-right-item">
                            <div class="home-introduction-right-item-icon">
                                <?php
                                $_fid = variable_get("cassiopeia_config_home_introduction_group_1_icon");
                                if(!empty(file_load($_fid))){
                                    $cassiopeia_config_home_introduction_group_1_icon = file_load($_fid);
                                }
                                ?>
                                <?php
                                if (!empty($cassiopeia_config_home_introduction_group_1_icon)) {
                                    $node_img = (array) $cassiopeia_config_home_introduction_group_1_icon;
                                    $node_img['style_name'] = "style_106x106";
                                    $node_img['path'] = $node_img['uri'];
                                    $node_img = theme('image_style', $node_img);
                                    print($node_img);
                                }
                                ?>
                            </div>
                            <div class="home-introduction-right-item-group">
                                <div class="home-introduction-right-item-title">
                                    <span><?php print(variable_get("cassiopeia_config_home_introduction_group_1_title")); ?></span>
                                </div>
                                <div class="home-introduction-right-item-content">
                                    <?php print(variable_get("cassiopeia_config_home_introduction_group_1_des")); ?>
                                </div>
                            </div>
                        </div>
                        <div class="home-introduction-right-item">
                            <div class="home-introduction-right-item-icon">
                                <?php
                                $_fid = variable_get("cassiopeia_config_home_introduction_group_2_icon");
                                if(!empty(file_load($_fid))){
                                    $cassiopeia_config_home_introduction_group_2_icon = file_load($_fid);
                                }
                                ?>
                                <?php
                                if (!empty($cassiopeia_config_home_introduction_group_2_icon)) {
                                    $node_img = (array) $cassiopeia_config_home_introduction_group_2_icon;
                                    $node_img['style_name'] = "style_106x106";
                                    $node_img['path'] = $node_img['uri'];
                                    $node_img = theme('image_style', $node_img);
                                    print($node_img);
                                }
                                ?>
                            </div>
                            <div class="home-introduction-right-item-group">
                                <div class="home-introduction-right-item-title">
                                    <span><?php print(variable_get("cassiopeia_config_home_introduction_group_2_title")); ?></span>
                                </div>
                                <div class="home-introduction-right-item-content">
                                    <?php print(variable_get("cassiopeia_config_home_introduction_group_2_des")); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>