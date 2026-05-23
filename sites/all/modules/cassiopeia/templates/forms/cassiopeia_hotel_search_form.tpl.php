<div class="hotel-filter">
    <div class="container">
        <div class="row">
            <!-- filter -->
            <div class="col-md-3 left-block">
                <div class="block-container">
                    <h1 class="title-box-filter">
                                <span>
                                    <i class="fa-regular fa-filter"></i>
                                </span>
                        <span>Chọn lọc theo</span>
                    </h1>
                    <!-- star -->
                    <div class="search-by-hotel-ranking">
                        <div class="block-title">
                            <h3>Hạng sao</h3>
                        </div>
                        <div class="search-group">
                            <div class="search-item d-flex alg-center">
                                <?php echo drupal_render($form['filter']['rating']); ?>
                            </div>
                        </div>
                    </div>
                    <!-- price-filter -->
                    <div class="price-filter">
                        <div class="block-title">
                            <h3>Ngân sách</h3>
                        </div>
                        <div class="search-group">
                            <div class="search-item">
                                <label for="">Giá phòng</label>
                                <div id="priceRange" class="mt-2"></div>
                                <div class="d-flex mt-2">
                                    <input type="text" class="sliderValue fromPrice" data-index="0" value="<?php echo number_format(100000,0,",",".") ?>"  />
                                    - &nbsp;&nbsp;&nbsp;
                                    <input type="text" class="sliderValue toPrice" data-index="1" value="<?php echo number_format(5000000,0,",",".") ?>"  />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- search-hotel -->
                    <div class="search-by-tx-hotel">
                        <div class="block-title">
                            <h3>Loại hình nơi ở</h3>
                        </div>
                        <div class="search-group">
                            <?php echo drupal_render($form['filter']['tx_hotel']); ?>
                        </div>
                    </div>
                    <!-- search-convenient  -->
                    <div class="search-by-convenient">
                        <div class="block-title">
                            <h3>Tiện ích</h3>
                        </div>
                        <div class="search-group">
                            <?php echo drupal_render($form['filter']['convenient']); ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- list-hotel -->
            <div class="col-md-9">
                <div class="block-container ">
                    <div class="block-sort d-flex alg-center">
                        <div class="result-count mr-3">
                            <?php if(!empty($area)): ?>
                                <span class="total-hotel"></span> khách sạn
                            <?php else: ?>

                            <?php endif; ?>
                        </div>
                        <div class="block-sort-content">
                            <?php echo drupal_render($form['sort']); ?>
                        </div>
                    </div>
                    <div class="block-result">
                        <?php
                        $limit = 10;
                        $start = ($page-1)*$limit;
                        try{
                            $cassiopeia_room_room_price_query = db_select("cassiopeia_room_room_price","cassiopeia_room_room_price");
                            $cassiopeia_room_room_price_query->addField("cassiopeia_room_room_price","nid","room_nid");
                            $cassiopeia_room_room_price_query->orderBy("cassiopeia_room_room_price.price","ASC");
                            $cassiopeia_room_room_price_query->addExpression("MIN(cassiopeia_room_room_price.price)","min_price");
                            $cassiopeia_room_room_price_query->groupBy("nid");

                            $cassiopeia_room_room_price_query_2 = db_select("cassiopeia_room_room_price","cassiopeia_room_room_price");
                            $cassiopeia_room_room_price_query_2->fields("cassiopeia_room_room_price");
                            $cassiopeia_room_room_price_query_2->join($cassiopeia_room_room_price_query,"tbl_1","tbl_1.room_nid=cassiopeia_room_room_price.nid");
                            $cassiopeia_room_room_price_query_2->where("cassiopeia_room_room_price.price=tbl_1.min_price");

                            $room_query = db_select("node","tbl_node");
                            $room_query->condition("tbl_node.type","room");
                            $room_query->join($cassiopeia_room_room_price_query_2,"cassiopeia_room_room_price","cassiopeia_room_room_price.nid=tbl_node.nid");
                            $room_query->fields("cassiopeia_room_room_price");
                            $room_query->join("field_data_field_hotel","field_hotel","field_hotel.entity_id=tbl_node.nid");
                            $room_query->addField("field_hotel","field_hotel_nid","hotel_nid");

                            $query = db_select("node","tbl_node");
//                            $query->fields("tbl_node");
                            $query->condition("tbl_node.status",1);
                            $query->condition("tbl_node.type","hotel");
                            $query->join($room_query,"tbl_room","tbl_room.hotel_nid=tbl_node.nid");
                            $query->fields("tbl_room");


                            $count_query = db_select($query,"tbl_count");
                            $count_query->addExpression("COUNT(hotel_nid)","total_count");
                            $count_result = $count_query->execute()->fetchObject();

                            $total_items = $count_result->total_count;
                            $page_count = ceil($total_items/$limit);
                            $limit = 1;
                            $page = $form['page']['#value'];
                            $start = ($page-1)*$limit;
                            $result = $query->execute()->fetchAll();
                        }catch (Exception $e){
                            _print_r($e);
                        }
                        _print_r($result);
                        ?>
                        <?php if(!empty($result)): ?>
                            <?php foreach($result as $item): ?>
                                <?php $hotel = node_load($item->hotel_nid);
                                $ratings = cassiopeia_room_hotel_rating_load($hotel->nid);
                                $_ratings = $ratings['ratings'];
                                ?>
                                <div class="item">
                                    <div class="hotel-type-1">
                                        <div class="node-container d-flex">
                                            <div class="node-image">
                                                <?php
                                                if (!empty($hotel->field_image['und'][0])) {
                                                    $node_img = (array) $hotel->field_image['und'][0];
                                                    $node_img['style_name'] = "style_210x164";
                                                    $node_img['path'] = $node_img['uri'];
                                                    $node_img = theme('image_style', $node_img);
                                                    echo(l($node_img,"node/".$hotel->nid,array("html"=>TRUE)));
                                                }
                                                ?>
                                            </div>
                                            <div class="node-info">
                                                <div class="box-info">
                                                    <h3 class="card-title">
                                                        <?php echo(l($hotel->title,"node/".$hotel->nid,array("html"=>TRUE,'attributes'=>array('class'=>array('title ff-semibold clr-black'))))); ?>
                                                    </h3>
                                                    <div class="box-evaluate d-flex alg-center mt-1">
                                                        <div class="node-ranking">
                                                            <?php for($i=1;$i<=$node->field_hotel_ranking['und'][0]['value'];$i++): ?>
                                                                <i class="fa fa-star"></i>
                                                            <?php endfor; ?>
                                                        </div>
                                                        <div class="number-evaluate">
                                                            <span><?php echo $ratings['total_result']->total; ?> đánh giá</span>
                                                        </div>
                                                    </div>
                                                    <div class="item-address mt-12">
                                                        <img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-location.svg" alt="">
                                                        <span><?php echo !empty($hotel->field_address['und'][0]['value'])?$hotel->field_address['und'][0]['value']:""; ?></span>
                                                    </div>
                                                    <div class="convenients">
                                                        <?php if(!empty($hotel->field_convenient['und'])): ?>
                                                            <?php
                                                            $show = array_slice($hotel->field_convenient['und'],0,3);
                                                            $other = array_slice($hotel->field_convenient['und'],3);
                                                            ?>
                                                            <?php foreach($show as $_convenient): ?>
                                                                <?php $convenient = node_load($_convenient['nid']); ?>
                                                                <div class="item-convenients">
                                                                    <?php
                                                                    if (!empty($convenient->field_icon['und'][0])) {
                                                                        $node_img = (array) $convenient->field_icon['und'][0];
                                                                        $node_img['style_name'] = "style_12x12";
                                                                        $node_img['path'] = $node_img['uri'];
                                                                        $node_img = theme('image_style', $node_img);
                                                                        echo($node_img);
                                                                    }
                                                                    ?>
                                                                    <span><?php echo $convenient->title; ?></span>
                                                                </div>
                                                            <?php endforeach; ?>
                                                            <?php if(!empty($other)): ?>
                                                                <span>
                                                                     +<?php echo(count($other)); ?> tiện ích
                                                                </span>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="node-price-right">
                                                    <div class="discount">
                                                        <span>-<?php echo round(((($item->original_price-$item->price)/$item->original_price))*100) ?>%</span>
                                                        <span><?php echo number_format($item->original_price,0,",","."); ?> VNĐ</span>
                                                    </div>
                                                    <div class="price">
                                                        <span><?php echo number_format($item->price,0,",","."); ?> VNĐ</span>
                                                    </div>
                                                    <span>* Chưa bao gồm thuế VAT</span>
                                                    <div class="">
                                                        <?php echo(l("Xem phòng","node/".$hotel->nid,array("html"=>TRUE,'attributes'=>array('class'=>array('btn bg-secondary clr-white text ff-bold radius-36'))))); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <div class="ajax-pagination">
                            <div class="ajax-pagination-container">
                                <ul>
                                    <?php if($page_count<=3): ?>
                                        <?php for($i=1;$i<=$page_count;$i++): ?>
                                            <li><span class="ajax-item <?php if($page==$i) print("active"); ?>" data-page="<?php print($i); ?>"><?php print($i); ?></span></li>
                                        <?php endfor; ?>
                                    <?php else: ?>
                                        <?php if($page<=2): ?>
                                            <?php for($i=1;$i<=3;$i++): ?>
                                                <li><span class="ajax-item <?php if($page==$i) print("active"); ?>" data-page="<?php print($i); ?>"><?php print($i); ?></span></li>
                                            <?php endfor; ?>
                                            <li><span class="">...</span></li>
                                            <li><span class="ajax-item fa fa-angle-right" data-page="<?php print($page+1); ?>"></span></li>
                                            <li><span class="ajax-item fa fa-angle-double-right" data-page="<?php print($page_count); ?>"></span></li>
                                        <?php else: ?>
                                            <?php if($page>=$page_count-1): ?>
                                                <li><span class="ajax-item fa fa-angle-double-left" data-page="<?php print(1); ?>"></span></li>
                                                <li><span class="ajax-item fa fa-angle-left" data-page="<?php print($page-1); ?>"></span></li>
                                                <li><span class="">...</span></li>
                                                <?php for($i=$page_count-2;$i<=$page_count;$i++): ?>
                                                    <li><span class="ajax-item <?php if($page==$i) print("active"); ?>" data-page="<?php print($i); ?>"><?php print($i); ?></span></li>
                                                <?php endfor; ?>
                                            <?php else: ?>
                                                <li><span class="ajax-item fa fa-angle-double-left" data-page="<?php print(1); ?>"></span></li>
                                                <li><span class="ajax-item fa fa-angle-left" data-page="<?php print($page-1); ?>"></span></li>
                                                <li><span class="">...</span></li>
                                                <?php for($i=$page-1;$i<=$page+1;$i++): ?>
                                                    <li><span class="ajax-item <?php if($page==$i) print("active"); ?>" data-page="<?php print($i); ?>"><?php print($i); ?></span></li>
                                                <?php endfor; ?>
                                                <li><span class="">...</span></li>
                                                <li><span class="ajax-item fa fa-angle-right" data-page="<?php print($page+1); ?>"></span></li>
                                                <li><span class="ajax-item fa fa-angle-double-right" data-page="<?php print($page_count); ?>"></span></li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="ajax-pagination">
                            <div class="ajax-pagination-container">
                                <ul>
                                    <li><span class="ajax-item active" data-page="1">1</span></li>
                                    <li><span class="ajax-item " data-page="2">2</span></li>
                                    <li><span class="ajax-item " data-page="3">3</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>