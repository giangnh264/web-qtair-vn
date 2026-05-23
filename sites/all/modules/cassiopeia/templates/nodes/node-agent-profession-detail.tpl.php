<!--todo--> 
<div class="banner page-slider">
    <div class="swiper swiper-container-fade swiper-container-horizontal">
        <div class="swiper-wrapper" style="transition-duration: 0ms;">
            <div class="swiper-slide swiper-slide-active" style="width: 1903px; opacity: 1; transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                <img typeof="foaf:Image" class="img-responsive" src="http://qt.3sgroup.vn/sites/all/themes/cassiopeia_theme/img/banner-agent-profession.png">
            </div>
        </div>
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
    </div>
    <div class="slide-text">
        <div class="tpl-1">
            <h3>NGHIỆP VỤ ĐẠI LÝ</h3>
            <ul>
                <li>
                    <a href="/">Trang chủ</a>
                </li>
                <li>
                    <span>/</span>
                </li>
                <li>
                    <a href="#">Nghiệp vụ đại lý</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="page page-agent-profession-detail">
    <div class="page-container container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-8">
                    <div class="agent-profession-detail">
                        <div class="title-agent-profession-detail">
                            <span><?php echo $node->title; ?></span>
                        </div>
                        <div class="share-post d-flex alg-center">
                            <div class="icon-share d-flex alg-center">
                                <span>Chia sẻ:</span>
                                <div class="box-list-icon-share ml-1">
                                    <div class="list-icon-share">
                                        <i class="fa-brands fa-linkedin-in"></i>
                                    </div>
                                    <div class="list-icon-share">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </div>
                                    <div class="list-icon-share">
                                        <i class="fa-brands fa-instagram"></i>
                                    </div>
                                    <div class="list-icon-share">
                                        <i class="fa-brands fa-youtube"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="date-submitted">
                                <span>
                                    <i class="fa-light fa-calendar-lines"></i>
                                </span>
                                <span><?php echo date("d/m/Y",$node->created); ?></span>
                            </div>
                        </div>
                        <div class="content-post-detail mt-3">
                          <?php echo !empty($node->body['und'][0]['value'])?$node->body['und'][0]['value']:""; ?>
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
                        "limit" => 4,
                    );
                    $other_nodes = cassiopeia_get_items_by_conditions($conditions,"agent_profession","node");
                    ?>
                    <?php if(!empty($other_nodes)): ?>
                        <div class="related-posts mt-4">
                            <div class="title-related-posts mb-3">
                                <span>BÀI VIẾT LIÊN QUAN</span>
                            </div>
                            <div class="box-list-agent-profession">
                                <?php foreach($other_nodes as $other_node): ?>
                                    <?php $counter = cassiopeia_qt_node_counter($other_node); ?>
                                    <div class="list-agent-profession">
                                        <a href="/<?php echo drupal_get_path_alias("node/".$other_node->nid); ?>" class="d-flex alg-center">
                                            <div class="icon-file-line">
                                                <img src="http://qt.3sgroup.vn/sites/all/themes/cassiopeia_theme/img/icons/icon-file-lines.png" alt="">
                                            </div>
                                            <div class="txt-list-agent-profession ml-1">
                                                <div class="title-agent-profession">
                                                    <span><?php echo $other_node->title; ?></span>
                                                </div>
                                                <div class="note-agent-profession d-flex">
                                                    <div class="icon-view">
                                            <span>
                                                <i class="fa-light fa-eye"></i>
                                            </span>
                                                        <span><?php echo $counter->totalcount; ?> lượt xem</span>
                                                    </div>
                                                    <div class="date-submitted">
                                            <span>
                                                <i class="fa-light fa-calendar-lines"></i>
                                            </span>
                                                        <span><?php echo date("d/m/Y",$other_node->created); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <?php $featured_nodes = cassiopeia_featured_nodes("agent_profession",6); ?>
                <?php if(!empty($featured_nodes)): ?>
                    <div class="col-md-4 sticky-top">
                        <div class="popular-posts">
                            <div class="title-popular-posts">
                                <span>BÀI VIẾT PHỔ BIẾN</span>
                            </div>
                            <div class="box-popular-posts">
                                <?php foreach($featured_nodes as $featured_node): ?>
                                    <div class="list-popular-posts d-flex">
                                        <div class="mini-icon-file">
                                            <img src="http://qt.3sgroup.vn/sites/all/themes/cassiopeia_theme/img/icons/mini-icon-file-lines.png" alt="">
                                        </div>
                                        <div class="text-popular-posts ml-1">
                                            <?php echo l($featured_node->title,"node/".$featured_node->nid,array("html"=>TRUE)); ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>