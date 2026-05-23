<?php $combos = (array)cassiopeia_get_nodes_by_category("combo"); ?>
<div class="page-combo">
    <div class="page-combo-container container">
        <div class="page-combo-inner">
            <div class="search-combo">
                <div class="search-combo-container">
                    <div class="search-combo-inner">
                        <div class="search-combo-group">
                            <span class="icon"><img src="./img/icons/icon-12.png" alt=""></span>
                            <select name="" id="">
                                <option value="">Địa điểm</option>
                            </select>
                        </div>

                        <div class="search-combo-group">
                            <span class="icon"><img src="./img/icons/icon-13.png" alt=""></span>
                            <select name="" id="">
                                <option value="">Khoảng giá</option>
                            </select>
                        </div>

                        <div class="search-combo-group">
                            <span class="icon"><img src="./img/icons/icon-14.png" alt=""></span>
                            <select name="" id="">
                                <option value="">Thời gian tuor</option>
                            </select>
                        </div>

                        <div class="search-combo-group">
                            <span class="icon"><img src="./img/icons/icon-15.png" alt=""></span>
                            <select name="" id="">
                                <option value="">Loại lưu trú</option>
                            </select>
                        </div>

                        <div class="search-combo-group">
                            <span class="icon"><img src="./img/icons/icon-16.png" alt=""></span>
                            <select name="" id="">
                                <option value="">Số sao</option>
                            </select>
                        </div>

                        <div class="search-combo-group">
                            <span class="icon"><img src="./img/icons/icon-17.png" alt=""></span>
                            <select name="" id="">
                                <option value="">Hãng hàng không</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach($combos as $combo): ?>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="box-combo">
                            <div class="box-combo-img">
                                <?php
                                if (!empty($combo->field_image['und'][0])) {
                                    $node_img = (array) $combo->field_image['und'][0];
                                    $node_img['style_name'] = "style_199x256";
                                    $node_img['path'] = $node_img['uri'];
                                    $node_img = theme('image_style', $node_img);
                                    echo(l($node_img, 'node/'.$combo->nid, array('html'=>TRUE)));
                                }
                                ?>
                            </div>
                            <div class="box-combo-info">
                                <div class="box-combo-title">
                                    <?php echo(l($combo->title, 'node/'.$combo->nid, array('html'=>TRUE))); ?>
                                </div>
                                <div class="box-combo-schedule">
                                    <div class="box-combo-schedule-1">
                                        <span class="icon"><img src="./img/icons/icon-9.png" alt=""></span>
                                        <span><?php if(!empty($node->field_tx_duration['und'])) echo !empty(taxonomy_term_load($node->field_tx_duration['und'][0]['tid']))?taxonomy_term_load($node->field_tx_duration['und'][0]['tid'])->name:""; ?></span>
                                    </div>
                                    <div class="box-combo-schedule-2">
                                        <span class="icon"><img src="./img/icons/icon-10.png" alt=""></span>
                                        <span>Hãng hàng không: bamboo</span>
                                    </div>
                                    <div class="box-combo-schedule-3">
                                        <span class="icon"><img src="./img/icons/icon-11.png" alt=""></span>
                                        <span><?php echo !empty($node->field_schedule_detail_title['und'][0]['value'])?$node->field_schedule_detail_title['und'][0]['value']:""; ?></span>
                                    </div>
                                </div>
                                <div class="box-combo-time">
                                    <ul>
                                        <li>
                                            <?php echo !empty($node->field_schedule_detail['und'][0]['value'])?$node->field_schedule_detail['und'][0]['value']:""; ?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="box-combo-pay">
                                    <div><?php echo number_format($combo->field_price['und'][0]['value'],0,",",".") ?>đ<span>/người</span></div>
                                    <a href="<?php echo drupal_get_path_alias("node/".$combo->nid); ?>" class="btn btn--orange">
                                        <span>Xem chi tiết</span>
                                        <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>


            </div>
        </div>
    </div>
</div>