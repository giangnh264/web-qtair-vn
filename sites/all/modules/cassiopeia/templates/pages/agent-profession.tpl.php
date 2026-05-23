<?php
$nodes = cassiopeia_get_nodes_by_category("agent_profession");
?>
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

<div class="page page-agent-profession">
    <div class="page-container container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-8">
                    <div class="box-list-agent-profession">
                        <?php if(!empty($nodes)): ?>
                            <?php foreach($nodes as $node): ?>
                                <?php $counter = cassiopeia_qt_node_counter($node); ?>
                                <div class="list-agent-profession">
                                    <a href="/<?php echo drupal_get_path_alias("node/".$node->nid); ?>" class="d-flex alg-center">
                                        <div class="icon-file-line">
                                            <img src="http://qt.3sgroup.vn/sites/all/themes/cassiopeia_theme/img/icons/icon-file-lines.png" alt="">
                                        </div>
                                        <div class="txt-list-agent-profession ml-1">
                                            <div class="title-agent-profession">
                                                <span><?php echo $node->title; ?></span>
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
                                                    <span><?php echo date("d/m/Y",$node->created); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
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

