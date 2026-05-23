<?php
try{
    if(!empty($form['filter']['from_price']['#value'])){
        $from_price = $form['filter']['from_price']['#value'];
    }
    if(!empty($form['filter']['to_price']['#value'])){
        $to_price = $form['filter']['to_price']['#value'];
    }
    $check_in = $_SESSION['hotel-search']['check-in'];
    $check_out = $_SESSION['hotel-search']['check-out'];
//    _print_r($_SESSION['hotel-search']);
    $limit = 10;
    $page = $form['page']['#value'];
    $start = ($page-1)*$limit;

    $min_price = 0;
    $max_price = 5000000;
    if($min_price===$max_price){
        $max_price = $min_price+1000000;
    }
    $from_price = !empty($from_price)?$from_price:$min_price;
    $to_price = !empty($to_price)?$to_price:$max_price;

    $conditions = array();
    $conditions['start'] = $start;
    $conditions['limit'] = $limit;
    $conditions['from_price'] = $from_price;
    $conditions['to_price'] = $to_price;
    $conditions['check_in'] = $check_in;
    $conditions['check_out'] = $check_out;
    $conditions['sort'] = $form['sort']['#value'];
    $conditions['rating'] = $form['filter']['rating']['#value'];
    $conditions['tx_hotel'] = $form['filter']['tx_hotel']['#value'];
    $conditions['tx_area'] = $form['#tx_area']->tid;
    $conditions['adult'] = $_SESSION['hotel-search']['adult'];

    $conditions['convenient'] = $form['filter']['convenient']['#value'];

    $results = cassiopeia_room_hotels_load($conditions);
    _print_r($conditions);
    $total_items = $results['total_result']->total_count;
    $page_count = ceil($total_items/$limit);

    $result = $results['result'];





}catch (Exception $e){
    _print_r($e);
}
//                        _print_r($count_result);
?>
<div class="hotel-filter">
    <div class="container">
        <div class="row">
            <!-- filter -->
            <div class="col-md-3 left-block">
                <div class="block-container">
                    <div class="close-filter-hotel-mb">
                        <i class="fa fa-times"></i>
                    </div>
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
                                    <input type="text" class="sliderValue fromPrice" data-index="0" data-min-price="<?php echo $min_price; ?>" value="<?php echo number_format($from_price,0,",",".") ?>"  />
                                    - &nbsp;&nbsp;&nbsp;
                                    <input type="text" class="sliderValue toPrice" data-index="1"  data-max-price="<?php echo $max_price; ?>"  value="<?php echo number_format($to_price,0,",",".") ?>"  />
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
                                <span class="total-hotel"></span> Khách sạn
                            <?php else: ?>

                            <?php endif; ?>
                        </div>
                        <div class="block-sort-content">
                            <?php echo drupal_render($form['sort']); ?>
                        </div>
                    </div>
                    <div class="block-result">

                        <?php if(!empty($result)): ?>
                            <?php foreach($result as $item): ?>
                                <?php
                                $hotel = node_load($item->hotel_nid);
                                $ratings = cassiopeia_room_hotel_rating_load($hotel->nid);
                                $_ratings = $ratings['ratings'];
                                $price = $item->price;
                                $original_price = $item->original_price;
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
                                                            <?php for($i=1;$i<=$hotel->field_hotel_ranking['und'][0]['value'];$i++): ?>
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
                                                                    <img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-check-black.png" alt="">
                                                                    <span><?php echo $convenient->title; ?></span>
                                                                </div>
                                                            <?php endforeach; ?>
                                                            <?php if(!empty($other)): ?>
                                                                <span>
                                                                     +<?php echo(count($other)); ?>
                                                                </span>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="node-price-right">
                                                    <?php if($price!=$original_price): ?>
                                                        <div class="discount">
                                                            <span>-<?php echo !empty($original_price)?round(((($original_price-$price)/$original_price))*100):0; ?>%</span>
                                                            <span><?php echo number_format($original_price,0,",","."); ?> VNĐ</span>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="price">
                                                        <span><?php echo number_format($price,0,",","."); ?> VNĐ</span>
                                                    </div>
                                                    <span>* Chưa bao gồm thuế VAT</span>
                                                    <div class="">
                                                        <?php echo(l("Xem phòng","node/".$hotel->nid,array("html"=>TRUE,'attributes'=>array('class'=>array('btn bg-secondary clr-white ff-bold radius-36'))))); ?>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hidden">
    <?php echo drupal_render_children($form); ?>
</div>