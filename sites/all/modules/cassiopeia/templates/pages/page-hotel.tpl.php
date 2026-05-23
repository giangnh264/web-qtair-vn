<?php include(drupal_get_path('theme', 'cassiopeia_theme') . '/templates/sliders/main-slider.inc'); ?>
<?php
$conditions = array();
$conditions['start'] = 0;
$conditions['limit'] = 6;
$conditions['check_in'] = $_SESSION['hotel-search']['check-in'];
$conditions['check_out'] = $_SESSION['hotel-search']['check-out'];
$conditions['featured'] = true;
$results = cassiopeia_room_hotels_load($conditions);
?>
<!-- page-hotel -->
<div class="page page-hotel">
    <div class="page-container">
        <div class="page-inner">
            <!-- hotel-price -->
            <section class="sec sec-hotel-price">
                <div class="sec-container container">
                    <div class="inner">
                        <h2 class="heading heading-secondary clr-black">Khách sạn giá tốt nhất</h2>
                        <p class="text clr-dark mt-1">Yên tâm nghỉ dưỡng không lo về giá!!!</p>
                        <div class="qt-hotel-price mt-4">
                            <div class="slider-cover">
                                <div class="owl-carousel owl-theme slider-hotel-price">
                                    <?php if(!empty($results)): ?>
                                        <?php foreach($results['result'] as $item): ?>
                                            <?php
                                            $hotel = node_load($item->hotel_nid);
                                            $price = $item->price;
                                            $ratings = cassiopeia_room_hotel_rating_load($hotel->nid);
                                            $_ratings = $ratings['ratings'];
                                            ?>
                                            <div class="item">
                                                <div class="card card-type-hotel">
                                                    <div class="card-img">
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
                                                    <div class="card-info">
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
                                                        <div class="convenients">
                                                            <div class="item-convenients">
                                                                <img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-location.svg" alt="">
                                                                <span><?php echo !empty($hotel->field_address['und'][0]['value'])?$hotel->field_address['und'][0]['value']:""; ?></span>
                                                            </div>
                                                            <?php if(!empty($hotel->field_convenient['und'])): ?>
                                                                <?php
                                                                $show = array_slice($hotel->field_convenient['und'],0,2);
                                                                $other = array_slice($hotel->field_convenient['und'],2);
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
                                                        <div class="node-price">
                                                            <div class="price">
                                                                Chỉ từ <span><?php echo number_format($price,0,",","."); ?> VNĐ</span>
                                                            </div>
                                                            <div class="">
                                                                <?php echo(l("Đặt ngay","node/".$hotel->nid,array("html"=>TRUE,'attributes'=>array('class'=>array('btn bg-secondary clr-white  ff-bold radius-36'))))); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.hotel-price -->
            <?php
                try{
                    $conditions = array();
                    $conditions['field_featured'] = array(
                        "type"      => "fieldCondition",
                        "key"     => "value",
                        "value"     => 1,
                        "condition" => "=",
                    );
                    $conditions['range'] = array(
                        "type"      => "range",
                        "start"     => 0,
                        "limit"     => 8,
                    );
                    $conditions['weight'] = array(
                        "type"   => "propertyOrderBy",
                        "direction"  => "ASC",
                    );
                    $featured_tx_areas = cassiopeia_get_items_by_conditions($conditions,"tx_area","taxonomy_term");
                }catch (Exception $e){
                    _print_r($e);
                }
                $index=1;
            ?>
            <!-- featured-area -->
            <section class="sec sec-featured-area">
                <div class="sec-container container">
                    <div class="inner">
                        <h2 class="heading heading-secondary clr-black">Điểm đến yêu thích</h2>
                        <p class="text clr-dark mt-1">Cơ hội đặt phòng khách sạn tại những điểm đến trong nước nổi bật, được nhiều du khách lựa chọn với giá tốt nhất.</p>

                            <?php if(!empty($featured_tx_areas)): ?>
                                <?php foreach(array_chunk($featured_tx_areas,6) as $group_item): $index=1;?>
                                    <div class="group-item mt-4">
                                        <?php foreach($group_item as $featured_tx_area): ?>
                                            <div class="item">
                                                <div class="item-image">
                                                    <?php
                                                    $count =  cassiopeia_count_hotel_form_area($featured_tx_area->tid);
                                                    if (!empty($featured_tx_area->field_image['und'][0])) {
                                                        $node_img = (array) $featured_tx_area->field_image['und'][0];
                                                        $node_img['style_name'] = "tx_area_style_".$index;
                                                        $node_img['path'] = $node_img['uri'];
                                                        $node_img = theme('image_style', $node_img);
                                                        echo l($node_img,"taxonomy/term/".$featured_tx_area->tid,array("html"=>TRUE));
                                                    }
                                                    ?>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-name"><?php echo $featured_tx_area->name; ?></div>
                                                    <div class="item hotel-count"><?php echo $count; ?> khách sạn</div>
                                                </div>
                                            </div>
                                        <?php $index++; endforeach; ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                    </div>
                </div>
            </section>
            <!-- /.featured-area -->
            <?php $hotel_partner = node_load(2716); ?>
            <!-- hotel-partner -->
            <?php if(!empty($hotel_partner)): ?>
                <section class="sec sec-hotel-partner">
                    <div class="sec-container container">
                        <div class="inner">
                            <div class="hotel-partner-inner">
                                <div class="home-partner-text">
                                    <h2 class="heading heading-secondary clr-black"><?php echo $hotel_partner->title; ?></h2>
                                    <p class="text clr-dark mt-1"><?php echo !empty($hotel_partner->body['und'][0]['value'])?$hotel_partner->body['und'][0]['value']:""; ?></p>
                                </div>
                                <div class="home-partner-logo-items">
                                    <?php if(!empty($hotel_partner->field_logos['und'])): ?>
                                        <?php foreach($hotel_partner->field_logos['und'] as $image): ?>
                                            <div class="home-partner-logo-item">
                                                <?php
                                                $node_img = (array) $image;
                                                $node_img['style_name'] = "original";
                                                $node_img['path'] = $node_img['uri'];
                                                $node_img = theme('image_style', $node_img);
                                                echo $node_img;
                                                ?>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <!-- /.hotel-partner -->
            <?php
            $term = taxonomy_term_load(104);
            $nodes = cassiopeia_get_nodes_by_category("article",$term,6);
            ?>
            <!-- promotion -->
            <section class="sec sec-block-promotion">
                <div class="sec-container container">
                    <div class="inner">
                    <h2 class="heading heading-secondary clr-black"><?php echo $term->name; ?></h2>
                        <p class="text clr-dark mt-1"><?php echo !empty($term->description)?$term->description:""; ?></p>
                    </div>
                    <div class="qt-promotion mt-4">
                        <div class="slider-cover">
                            <div class="owl-carousel owl-theme slider-promotion">
                                <?php if(!empty($nodes)): ?>
                                    <?php foreach($nodes as $node): ?>
                                        <div class="item">
                                            <div class="card card-type-3 no-shadow">
                                                <div class="card-img">
                                                    <?php
                                                    if(!empty($node->field_image['und'][0])){
                                                        $node_img = (array) $node->field_image['und'][0];
                                                        $node_img['style_name'] = "style_360x240";
                                                        $node_img['path'] = $node_img['uri'];
                                                        $node_img = theme('image_style', $node_img);
                                                        echo l($node_img,"node/".$node->nid,array("html"=>TRUE));
                                                    }
                                                    ?>
                                                </div>
                                                <div class="card-info">
                                                    <h3 class="card-title">
                                                        <?php echo l($node->title,"node/".$node->nid,array("html"=>TRUE,'attributes'=>array("class"=>array("title ff-semibold clr-black")))); ?>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- promotion -->

            <!-- register-block -->
            <section class="sec sec-register-block">
                <div class="sec-container">
                    <div class="inner">
                        <div class="register-block">
                            <h3>Dễ dàng nhận thông tin ưu đãi khi trở thành thành viên QTair</h3>
                            <a href="/user/register">Đăng ký ngay</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.register-block -->
        </div>
    </div>
</div>
