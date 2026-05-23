<?php $home_setting = node_load(1954); ?>
<div class="home-partner">
    <div class="container home-partner-container">
        <div class="row home-partner-type-1">
            <div class="col-md-6">
                <div class="home-partner-type-1-img">
                    <?php
                    if (!empty($home_setting->field_video_embed['und'][0]['value']) && !empty($home_setting->field_show_video['und'][0]['value'])) {
                        echo $home_setting->field_video_embed['und'][0]['value'];
                    } else {
                        if (!empty($home_setting->field_image['und'][0])) {
                            $node_img = (array) $home_setting->field_image['und'][0];
                            $node_img['style_name'] = "style_555x371";
                            $node_img['path'] = $node_img['uri'];
                            $node_img = theme('image_style', $node_img);
                            print($node_img);
                        }
                    }
                    ?>
                    <button class="play-video play-button" data-src="https://www.youtube.com/embed/1fu6mA8LfCg" title="YouTube video player">
                        <span class="icon">
                            <i class="fa fa-play" aria-hidden="true"></i>
                        </span>
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="home-partner-type-1-group">
                    <div class="home-partner-type-1-title">
                        <h3><?php if (!empty($home_setting->field_title_1['und'])) echo $home_setting->field_title_1['und'][0]['value']; ?></h3>
                    </div>
                    <div class="home-partner-type-1-summary">
                        <?php if (!empty($home_setting->field_description_1['und'])) echo $home_setting->field_description_1['und'][0]['value']; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="home-partner-text">
                    <div class="home-partner-text-title">
                        <h3><?php if (!empty($home_setting->field_title_2['und'])) echo $home_setting->field_title_2['und'][0]['value']; ?></h3>
                    </div>
                    <div class="home-partner-text-summary">
                        <?php if (!empty($home_setting->field_description_2['und'])) echo $home_setting->field_description_2['und'][0]['value']; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="home-partner-logo-items">
                    <?php if (!empty($home_setting->field_logos['und'])) : ?>
                        <?php foreach ($home_setting->field_logos['und'] as $image) : ?>
                            <div class="home-partner-logo-item">
                                <?php
                                if (!empty($image)) {
                                    $node_img = (array) $image;
                                    $node_img['style_name'] = "original";
                                    $node_img['path'] = $node_img['uri'];
                                    $node_img = theme('image_style', $node_img);
                                    print($node_img);
                                }
                                ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>