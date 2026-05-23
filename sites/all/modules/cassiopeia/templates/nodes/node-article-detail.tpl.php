<?php
$node = $variables['node'];
$term = !empty(taxonomy_term_load($node->field_tx_article['und'][0]['tid']))?taxonomy_term_load($node->field_tx_article['und'][0]['tid']):null;
?>
<div class="custom-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <?php echo l($term->name,"taxonomy/term/".$term->tid,array("html"=>TRUE)); ?>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php echo $node->title; ?>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="page page-detail">
    <div class="page-container container">
        <div class="page-inner">
            <div class="qt-news-detail mt-3">
                <div class="row">
                    <div class="col-md-8">
                        <div class="detail-block">
                            <h1 class="heading heading-tertiary clr-gray ff-black">
                                <?php echo $node->title; ?>
                            </h1>
                            <div class="detail-block-utils mt-2">
                                <div class="calendar clr-primary">
                                    <img
                                        src="/sites/all/themes/cassiopeia_theme/img/icons/calendar.svg"
                                        class="img-responsive"
                                        alt=""
                                    />
                                    <span><?php echo date("d/m/Y",$node->created); ?></span>
                                </div>
                            </div>

                            <div class="h-line mt-2 mb-2"></div>

                            <div class="detail-block-content paragraph">
                                <?php echo !empty($node->body['und'][0]['value'])?$node->body['und'][0]['value']:""; ?>
                            </div>
                            <div class="share mt-2">

                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                <div class="addthis_inline_share_toolbox"></div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <?php echo _cassiopeia_render_theme("module","cassiopeia","templates/nav/most-viewed-article.tpl.php"); ?>
                    </div>
                </div>
            </div>
            <?php
            $conditions = array();
            $conditions['status'] = array(
                "type" => "propertyCondition",
                "value" => 1,
                "condition" => "=",
            );
            $conditions['nid'] = array(
                "type" => "propertyCondition",
                "value" => $node->nid,
                "condition" => "<>",
            );
            $conditions['created'] = array(
                "type" => "propertyOrderBy",
                "direction" => "DESC",
            );
            $conditions['range'] = array(
                "type" => "range",
                "start" => 0,
                "limit" => 8,
            );
            if(!empty($term)){
                $conditions['field_tx_article'] = array(
                    "type" => "fieldCondition",
                    "key" => "tid",
                    "value" => $term->tid,
                    "condition" => "=",
                );
            }
            $featured_nodes = cassiopeia_get_items_by_conditions($conditions,"article","node");
            ?>
            <?php if(!empty($featured_nodes)): ?>
                <div class="qt-block-other mt-6">
                    <div class="qt-block-other-title mb-3">
                        <h3
                            class="heading heading-tertiary text-uppercase clr-dark"
                        >
                            Tin tức liên quan
                        </h3>
                    </div>

                    <div class="qt-block-other-content">
                        <div class="slider-cover">
                            <div class="shadow-slider">
                                <div class="owl-carousel owl-theme other-slider">
                                    <?php foreach($featured_nodes as $featured_node): ?>
                                        <div class="item">
                                            <?php echo _cassiopeia_render_theme("module","cassiopeia","templates/parts/article-type-3.tpl.php",array("node"=>$featured_node,"image_style"=>"style_263x175")) ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>