<div class="block-benefits">
    <div class="block-container container">
        <div class="block-content">
            <div class="block-items row">
                <div class="block-item col-md-3">
                    <div class="block-inner">
                        <div class="item-icon">
                            <?php
                                if(!empty(variable_get("cassiopeia_config_benefits_group_1_icon"))){
                                    $fid_1 = variable_get("cassiopeia_config_benefits_group_1_icon");
                                    $file_1 = file_load($fid_1);
                                    if(!empty($file_1)){
                                        $node_img = (array) $file_1;
                                        $node_img['style_name'] = "style_120x170";
                                        $node_img['path'] = $node_img['uri'];
                                        $node_img = theme('image_style', $node_img);
                                        print($node_img);
                                    }
                                }
                            ?>
                        </div>
                        <div class="item-title">
                            <?php if(!empty(variable_get("cassiopeia_config_benefits_group_1_title"))) print(variable_get("cassiopeia_config_benefits_group_1_title")); ?>
                        </div>
                        <div class="item-description">
                            <?php if(!empty(variable_get("cassiopeia_config_benefits_group_1_des"))) print(variable_get("cassiopeia_config_benefits_group_1_des")); ?>
                        </div>
                    </div>
                </div>
                <div class="block-item col-md-3">
                    <div class="block-inner">
                        <div class="item-icon">
                            <?php
                            if(!empty(variable_get("cassiopeia_config_benefits_group_2_icon"))){
                                $fid_2 = variable_get("cassiopeia_config_benefits_group_2_icon");
                                $file_2 = file_load($fid_2);
                                if(!empty($file_2)){
                                    $node_img = (array) $file_2;
                                    $node_img['style_name'] = "style_120x170";
                                    $node_img['path'] = $node_img['uri'];
                                    $node_img = theme('image_style', $node_img);
                                    print($node_img);
                                }
                            }
                            ?>
                        </div>
                        <div class="item-title">
                            <?php if(!empty(variable_get("cassiopeia_config_benefits_group_2_title"))) print(variable_get("cassiopeia_config_benefits_group_2_title")); ?>
                        </div>
                        <div class="item-description">
                            <?php if(!empty(variable_get("cassiopeia_config_benefits_group_2_des"))) print(variable_get("cassiopeia_config_benefits_group_2_des")); ?>
                        </div>
                    </div>
                </div>
                <div class="block-item col-md-3">
                    <div class="block-inner">
                        <div class="item-icon">
                            <?php
                            if(!empty(variable_get("cassiopeia_config_benefits_group_3_icon"))){
                                $fid_3 = variable_get("cassiopeia_config_benefits_group_3_icon");
                                $file_3 = file_load($fid_3);
                                if(!empty($file_3)){
                                    $node_img = (array) $file_3;
                                    $node_img['style_name'] = "style_120x170";
                                    $node_img['path'] = $node_img['uri'];
                                    $node_img = theme('image_style', $node_img);
                                    print($node_img);
                                }
                            }
                            ?>
                        </div>
                        <div class="item-title">
                            <?php if(!empty(variable_get("cassiopeia_config_benefits_group_3_title"))) print(variable_get("cassiopeia_config_benefits_group_3_title")); ?>
                        </div>
                        <div class="item-description">
                            <?php if(!empty(variable_get("cassiopeia_config_benefits_group_3_des"))) print(variable_get("cassiopeia_config_benefits_group_3_des")); ?>
                        </div>
                    </div>
                </div>
                <div class="block-item col-md-3">
                    <div class="block-inner">
                        <div class="item-icon">
                            <?php
                            if(!empty(variable_get("cassiopeia_config_benefits_group_4_icon"))){
                                $fid_4 = variable_get("cassiopeia_config_benefits_group_4_icon");
                                $file_4 = file_load($fid_4);
                                if(!empty($file_4)){
                                    $node_img = (array) $file_4;
                                    $node_img['style_name'] = "style_120x170";
                                    $node_img['path'] = $node_img['uri'];
                                    $node_img = theme('image_style', $node_img);
                                    print($node_img);
                                }
                            }
                            ?>
                        </div>
                        <div class="item-title">
                            <?php if(!empty(variable_get("cassiopeia_config_benefits_group_4_title"))) print(variable_get("cassiopeia_config_benefits_group_4_title")); ?>
                        </div>
                        <div class="item-description">
                            <?php if(!empty(variable_get("cassiopeia_config_benefits_group_4_des"))) print(variable_get("cassiopeia_config_benefits_group_4_des")); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>