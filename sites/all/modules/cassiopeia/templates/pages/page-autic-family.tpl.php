<?php
global $user;
$node = $variables['node'];
?>
<div class="page-autic-family">
    <div class="page-banner">
        <?php
        if (!empty($node->field_banner['und'][0])) {
            $node_img = (array)$node->field_banner['und'][0];
            $node_img['style_name'] = "style_1440x500";
            $node_img['path'] = $node_img['uri'];
            $node_img = theme('image_style', $node_img);
            print($node_img);
        }
        ?>
        <div class="banner-text">
            <h2>
                <?php print(!empty($node->field_text['und'][0]['value'])?$node->field_text['und'][0]['value']:""); ?>
            </h2>
            <div class="banner-button">
                <button>Đăng ký ngay</button>
            </div>
        </div>

    </div>
    <?php include(drupal_get_path('theme', 'cassiopeia_theme') . '/templates/home-parts/benefit-icon.inc'); ?>
    <div class="slider">
        <div class="au-slider owl-theme owl-carousel">
            <?php if(!empty($node->field_af_slider['und'])): ?>
                <?php $sliders = _cassiopeia_load_collections($node->field_af_slider['und']); ?>
                <?php foreach($sliders as $slider): ?>
                    <div class="item">
                        <div class="item-image">
                            <?php
                            $url = !empty($slider->field_link['und'][0]['value'])?$slider->field_link['und'][0]['value']:"#";
                            if (!empty($slider->field_image['und'][0])) {
                                $node_img = (array) $slider->field_image['und'][0];
                                $node_img['style_name'] = "style_1440x450";
                                $node_img['path'] = $node_img['uri'];
                                $node_img = theme('image_style', $node_img);
                                print(l($node_img, $url, array('html'=>TRUE)));
                            }
                            ?>
                        </div>
                        <div class="item-info">
                            <div class="item-title">
                                <?php print(!empty($slider->field_af_slider_title['und'][0]['value'])?$slider->field_af_slider_title['und'][0]['value']:""); ?>
                            </div>
                            <div class="item-des">
                                <?php print(!empty($slider->field_af_slider_des['und'][0]['value'])?$slider->field_af_slider_des['und'][0]['value']:""); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="steps">
        <div class="block-container container">
           <div class="block-inner">
               <div class="left-block">
                   <?php
                   if (!empty($node->field_af_step_image['und'][0])) {
                       $node_img = (array)$node->field_af_step_image['und'][0];
                       $node_img['style_name'] = "style_389x726";
                       $node_img['path'] = $node_img['uri'];
                       $node_img = theme('image_style', $node_img);
                       print($node_img);
                   }
                   ?>
               </div>
               <div class="right-block">
                   <div class="block-title">
                       <h2>3 bước để trở thành đại lý vé máy bay & du lịch tại nhà</h2>
                   </div>
                   <div class="block-items">
                       <?php if(!empty($node->field_af_step['und'])): ?>
                           <?php $steps = _cassiopeia_load_collections($node->field_af_step['und']); $index=1; ?>
                           <?php foreach($steps as $step): ?>
                               <div class="item">
                                   <div class="index">
                                       <span><?php print($index); ?></span>
                                   </div>
                                   <div>
                                       <div class="item-title">
                                           <?php print(!empty($step->field_af_step_title['und'][0]['value'])?$step->field_af_step_title['und'][0]['value']:""); ?>
                                       </div>
                                       <div class="item-des">
                                           <?php print(!empty($step->field_af_step_des['und'][0]['value'])?$step->field_af_step_des['und'][0]['value']:""); ?>
                                       </div>
                                   </div>
                               </div>
                               <?php $index++; endforeach; ?>
                       <?php endif; ?>
                   </div>
               </div>
           </div>
        </div>
    </div>
    <?php include(drupal_get_path('theme', 'cassiopeia_theme') . '/templates/home-parts/article.inc'); ?>
    <?php include(drupal_get_path('theme', 'cassiopeia_theme') . '/templates/home-parts/partner.inc'); ?>    <?php include(drupal_get_path('theme', 'cassiopeia_theme') . '/templates/home-parts/benefit-family.inc'); ?>
    <?php
    if(!empty($node->field_tx_article['und'])){
        $tx_articles = $node->field_tx_article['und'];
    }
    ?>
    <?php if(!empty($tx_articles)): ?>
        <div class="block-article">
            <div class="block-container container">
                <div class="block-items row">
                    <?php foreach($tx_articles as $tx_article): $tx_article = taxonomy_term_load($tx_article['tid']);?>
                        <?php if(empty($tx_article)) continue; ?>
                       <div class="item col-xs-12 col-md-6">
                           <div class="article-type-4 article-type-6">
                               <div class="article-type-4-container">
                                   <div class="article-image">
                                       <?php
                                       if (!empty($tx_article->field_image['und'][0])) {
                                           $node_img = (array) $tx_article->field_image['und'][0];
                                           $node_img['style_name'] = "style_570x452";
                                           $node_img['path'] = $node_img['uri'];
                                           $node_img = theme('image_style', $node_img);
                                           print(l($node_img, 'taxonomy/term/'.$tx_article->tid, array('html'=>TRUE)));
                                       }
                                       ?>
                                   </div>
                                   <div class="article-info">
                                       <div class="article-title">
                                           <?php print(l($tx_article->name,"taxonomy/term/".$tx_article->tid,array("html"=>TRUE))); ?>
                                       </div>
                                       <div class="article-des">
                                           <?php print(!empty($tx_article->description)?$tx_article->description:""); ?>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="featured-customer-comment">
        <div class="block-container">
            <div class="block-title">
                <h2>Hơn 3500 đại lý đã có thu nhập cùng Autic</h2>
            </div>
            <div class="block-items">
                <?php  $featured_comment = cassiopeia_get_featured_nodes("customer_comment",1); $featured_comment = array_values($featured_comment)[0];?>
                <div class="slider-item">
                    <div class="comment-group">

                        <div class="comment-content">
                            <div>
                                <?php if(!empty($featured_comment->body['und'][0]['value'])) print($featured_comment->body['und'][0]['value']); ?>
                            </div>
                        </div>
                        <div class="comment-title">
                            <?php print($featured_comment->title); ?>
                        </div>
                    </div>

                    <div class="comment-image">
                        <?php
                        if (!empty($featured_comment->field_image['und'][0])) {
                            $node_img = (array) $featured_comment->field_image['und'][0];
                            $node_img['style_name'] = "style_250x250";
                            $node_img['path'] = $node_img['uri'];
                            $node_img = theme('image_style', $node_img);
                            print($node_img);
                        }
                        ?>
                    </div>
                    <!--                        <div class="comment-rating">-->
                    <!--                            --><?php //for($i=0;$i<$comment->field_rating_score['und'][0]['value'];$i++): ?>
                    <!--                                <span class="fa fa-star"></span>-->
                    <!--                            --><?php //endfor; ?>
                    <!--                            --><?php //if($comment->field_rating_score['und'][0]['value'] < 5): ?>
                    <!--                                --><?php //for($i=0;$i<5-$comment->field_rating_score['und'][0]['value'];$i++): ?>
                    <!--                                    <span class="fa fa-star-o"></span>-->
                    <!--                                --><?php //endfor; ?>
                    <!--                            --><?php //endif; ?>
                    <!--                        </div>-->
                </div>
            </div>
        </div>
    </div>
    <?php include(drupal_get_path('theme', 'cassiopeia_theme') . '/templates/home-parts/customer-comment.inc'); ?>
    <?php if(empty($user->uid)): ?>
        <div class="register-block">
            <div class="block-container container">
                <div class="block-form">
                    <div>
                        <div class="block-title">
                            <h2>Đăng ký cộng tác ngay</h2>
                        </div>
                        <?php
                        $register_form = drupal_get_form("user_register_form");
                        if(!empty($register_form)){
                            $register_form = drupal_render($register_form);
                            print($register_form);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>