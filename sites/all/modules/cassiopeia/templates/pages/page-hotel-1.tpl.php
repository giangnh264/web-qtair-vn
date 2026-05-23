<?php
global $language;
$lang_name = $language->language;
$term = taxonomy_term_load(54);


if ( module_exists ('i18n')) {
    $translated_term = i18n_taxonomy_term_get_translation($term, $lang_name);

}else {
    $translated_term = $term;
}
$search_data = null;
if(!empty($_SESSION['search_data'])){
    $search_data = ($_SESSION['search_data']);
}
$_mail_slider = cassiopeia_adv_view_adv($translated_term->tid);
?>
<?php if (!empty($_mail_slider)): ?>
    <?php drupal_add_js(drupal_get_path('theme', 'cassiopeia_theme') . '/js/slider-main.js', array('weight' => 1000)); ?>
    <div id="main-slider">
        <div class="swiper-container">
            <?php print($_mail_slider); ?>
        </div>
        <div class="container">
            <?php print(_cassiopeia_render_theme("module","cassiopeia","templates/forms/search-fly-form-type-1.tpl.php",array("data"=>$search_data))); ?>
        </div>
    </div>
<?php endif; ?>
<div class="container">
    <div class="block-promotion">
        <div class="block-title">
            <h2>Ưu đãi - Khuyến mãi</h2>
        </div>
        <div class="block-content">
            <?php $featured_hotels = cassiopeia_featured_nodes("hotel",6); ?>
            <?php if(!empty($featured_hotels)): ?>
                <div class="promotion-hotel-slider owl-theme owl-carousel">
                    <?php foreach($featured_hotels as $featured_hotel): ?>
                        <div class="item">
                            <?php print(_cassiopeia_render_theme("module","cassiopeia","templates/parts/hotel-type-2.tpl.php",array("node"=>$featured_hotel,"image_style"=>"style360x240"))); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="featured-area">
        <div class="block-title">
            <h2>Địa điểm nổi bật</h2>
        </div>
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
        <?php if(!empty($featured_tx_areas)): ?>
            <div class="group-item">
            <?php foreach(array_chunk($featured_tx_areas,4) as $group_item): ?>

                    <?php foreach($group_item as $item): ?>
                        <div class="item">
                            <div class="item-image">
                                <?php
                               $count =  cassiopeia_count_hotel_form_area($item->tid);
                                if (!empty($item->field_image['und'][0])) {
                                    $node_img = (array) $item->field_image['und'][0];
                                    $node_img['style_name'] = "tx_area_style_".$index;
                                    $node_img['path'] = $node_img['uri'];
                                    $node_img = theme('image_style', $node_img);
                                    echo l($node_img,"taxonomy/term/".$item->tid,array("html"=>TRUE));
                                    ?>
<!--                                    <a href="/hotel/search?khu-vuc=--><?php //print($item->tid); ?><!--&date=--><?php //print(date("d/m/Y",REQUEST_TIME)) ?><!-----><?php //print(date("d/m/Y",REQUEST_TIME+86400)) ?><!--">--><?php //echo($node_img); ?><!--</a>-->
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="item-info">
                                <div class="item-name"><?php echo($item->name); ?></div>
                                <div class="item hotel-count"><?php echo($count); ?> khách sạn</div>
                            </div>
                        </div>
                    <?php $index++; endforeach; ?>

            <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="register-block">
        <div class="block-title">
            <h2>Khám phá, trải nghiệm và tiết kiệm</h2>
        </div>
        <div class="block-container">
            <?php
            if (!empty(file_load(variable_get("cassiopeia_trai_nghiem_va_tiet_kiem_form_background")))) {
                $node_img = (array) file_load(variable_get("cassiopeia_trai_nghiem_va_tiet_kiem_form_background"));
                $node_img['style_name'] = "style_1440x300";
                $node_img['path'] = $node_img['uri'];
                $node_img = theme('image_style', $node_img);
                print($node_img);
            }
            ?>
            <div class="block-child">
                <div class="child-title">
                    <?php echo(!empty(variable_get("cassiopeia_trai_nghiem_va_tiet_kiem_form_title"))?variable_get("cassiopeia_trai_nghiem_va_tiet_kiem_form_title"):""); ?>
                </div>
                <div class="child-des">
                    <?php echo(!empty(variable_get("cassiopeia_trai_nghiem_va_tiet_kiem_form_des"))?variable_get("cassiopeia_trai_nghiem_va_tiet_kiem_form_des"):""); ?>
                </div>
                <div class="child-button">
                    <a href="/agent/login">Đăng nhập / </a>
                    <a href="/user/register">Đăng ký</a>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- banner -->
<div class="banner">
    <div id="main-slider">
        <div id="slide-content-1">
            <div class="slider-wrapper theme-default">
                <div id="slider-2701-desktop" class="cassiopeia-swiper cassiopeia-swiper-desktop no-tablet-mobile swiperSlide">
                    <div class="swiper-container swiper-container-fade swiper-container-horizontal">
                        <div class="swiper-wrapper" style="transition-duration: 1200ms;">
                            <div class="swiper-slide swiper-slide-prev" style="width: 1903px; opacity: 0; transform: translate3d(0px, 0px, 0px); transition-duration: 1200ms;">
                                <a href="https://qtair.vn/vi/uu-dai-chao-he-bay-ngay-con-dao-voi-ve-re-tu-bamboo-airways" class="swiper-slide-link">
                                    <img src="https://qtair.vn/sites/default/files/styles/original/public/05052023-uu-dai-chao-he-bay-con-dao-ngay.jpg?itok=ObiXa1c9" alt="">
                                </a>
                            </div>
                            <div class="swiper-slide swiper-slide-active" style="width: 1903px; opacity: 1; transform: translate3d(-1903px, 0px, 0px); transition-duration: 1200ms;">
                                <a href="https://qtair.vn/vi/doi-ban-cung-bay-nhan-ngay-uu-dai-tu-vietnamairline" class="swiper-slide-link">
                                    <img src="https://qtair.vn/sites/default/files/styles/original/public/05052023-uu-dai-nhom-01.jpg?itok=ZdlGhxkt" alt="">
                                </a>
                            </div>
                            <div class="swiper-slide swiper-slide-next" style="width: 1903px; opacity: 0; transform: translate3d(-3806px, 0px, 0px); transition-duration: 1200ms;">
                                <a href="https://qtair.vn/vi/chuyen-phat-hang-khong" class="swiper-slide-link">
                                    <img src="https://qtair.vn/sites/default/files/styles/original/public/05052023-chuyen-phat-hang-khong.jpg?itok=LaZj9JPg" alt="">
                                </a>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="swiper-control">
                            <div class="swiper-nav">
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="search-bar-on-banner">
        <div class="container">
            <form id="search-fly-form" class="search-fly-form search-fly-form-horizontal search-fly-form-horizontal-one" novalidate="novalidate" action="/flight-search" method="get">
                <div class="search-fly-form-container">
                    <div class="search-fly-form-title-add">
                        <ul class="nav nav-tabs">
                            <li>
                                <a data-toggle="tab" href="#search-tab-1">
                                    <span class="icon">
                                        <img src="/sites/all/themes/cassiopeia_theme/img/icons/plane-up.svg" class="img-responsive" alt="">
                                    </span>
                                    <span>Vé máy bay</span>
                                </a>
                            </li>
                            <li class="active" >
                                <a data-toggle="tab" href="#search-tab-2">
                                    <span class="icon">
                                        <img src="/sites/all/themes/cassiopeia_theme/img/icons/hotel.svg" class="img-responsive" alt="">
                                    </span>
                                    <span>Khách sạn</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!----------------html----------------------->
                    <div class="search-fly-form-body">
                        <div class="tab-content">
                            <!-- search-tab-1 -->
                            <div id="search-tab-1" class="tab-pane fade">
                                <div class="padding-horizontal">
                                    <div class="row">
                                        <div class=" search-fly-form-itinerary ">
                                            <div>
                                                <div class="radio">
                                                    <input checked="" id="one-way" name="TripType" type="radio" value="OW">
                                                    <label for="one-way">Một chiều</label>
                                                    <input id="round-trip" name="TripType" type="radio" value="RT">
                                                    <label for="round-trip">Khứ hồi</label>
                                                </div>
                                                <div class="search-month" style="">
                                                    <label class="search-month-content hidden" for="search-month">Vé rẻ trong tháng
                                                        <input type="checkbox" id="search-month" class="search-month">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="itinerarys" class="padding-horizontal">
                                            <div class="row clearfix itinerary" itinerary="0">
                                                <div class="col-md-5 search-fly-form-departure-destination clearfix">
                                                    <div class="col-xs-6 gutter">
                                                        <div class="search-fly-form-departure search-destination-choose" itinerary="0">
                                                            <div class="input-fn">
                                                                <label for="">Điểm đi</label>
                                                                <span class="icon"><img src="/sites/all/themes/cassiopeia_theme/img/icons/plane-up.svg" class="img-responsive" alt=""></span>
                                                                <input class="form-control fake-input" id="" name="" autocomplete="off" type="text" value="Ha Noi (HAN)" placeholder="Điểm đi">
                                                                <input class="form-control real-input" id="departure-0" name="DepartureCode-0" type="hidden" value="HAN">
                                                                <ul class="select-departure">
                                                                </ul>
                                                                <i class="icon-add-location"></i>
                                                                <i class="icon-select-location"></i>
                                                            </div>
                                                            <div id="sub-departure-0" class="sub-search" style="display: none;">
                                                                <div class="sub-search-content departure-choose">
                                                                    <div class="suggest-airport-title">
                                                                        <div class="c-primary">
                                                                            <i class="fa fa-map-marker" aria-hidden="true"></i>Chọn điểm đi</div>
                                                                        <button type="button" class="btn-close suggest-close"><i class="fa fa-times"></i></button>
                                                                    </div>

                                                                    <div class="suggest-airport-input">
                                                                        <input autocomplete="off" class="form-control sub-search-suggest departure" type="text" id="search-departure-0" placeholder="Gõ tên thành phố hoặc mã sân bay" onkeyup="search_departure_keyup(this,event)">
                                                                        <ul class="result departure select-departure" style="max-height: 220px"></ul>
                                                                    </div>

                                                                    <div class="suggest-airport-links">
                                                                        <ul class="nav nav-tabs" id="departure-choose" role="tablist">
                                                                            <li class="nav-item active">
                                                                                <a class="nav-link" data-toggle="tab" href="#departure-choose-domestic" role="tab" aria-controls="home" aria-selected="true">Việt Nam</a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link" data-toggle="tab" href="#departure-choose-foreign-95" role="tab" aria-controls="profile" aria-selected="false">Đông Nam Á</a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link" data-toggle="tab" href="#departure-choose-foreign-96" role="tab" aria-controls="contact" aria-selected="false">Đông Bắc Á</a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link" data-toggle="tab" href="#departure-choose-foreign-97" role="tab" aria-controls="contact" aria-selected="false">Châu Âu</a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link" data-toggle="tab" href="#departure-choose-foreign-98" role="tab" aria-controls="contact" aria-selected="false">Châu Úc</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>

                                                                    <div class="suggest-airport-list">
                                                                        <div class="tab-content" id="suggest-airport-content">
                                                                            <div class="tab-pane fade active in" id="departure-choose-domestic" role="tabpanel" aria-labelledby="domestic-tab">
                                                                                <div class="airport">
                                                                                    <ul>
                                                                                        <li><a airportcode="HAN"><b>Hà Nội </b><span>(HAN)</span> </a></li>
                                                                                        <li><a airportcode="HPH"><b>Hải Phòng </b> <span>(HPH)</span> </a></li>
                                                                                        <li><a airportcode="DIN"><b>Điện Biên </b> <span>(DIN)</span> </a></li>
                                                                                        <li><a airportcode="VDO"><b>Vân Đồn </b> <span>(VDO)</span> </a></li>
                                                                                        <li><a airportcode="SGN"><b>Hồ Chí Minh </b><span>(SGN)</span> </a></li>
                                                                                        <li><a airportcode="PQC"><b>Phú Quốc </b> <span>(PQC)</span> </a></li>
                                                                                        <li><a airportcode="VCS"><b>Côn Đảo </b> <span>(VCS)</span> </a></li>
                                                                                        <li><a airportcode="VCA"><b>Cần Thơ </b> <span>(VCA)</span> </a></li>
                                                                                        <li><a airportcode="CAH"><b>Cà Mau </b> <span>(CAH)</span> </a></li>
                                                                                        <li><a airportcode="VKG"><b>Rạch Giá </b> <span>(VKG)</span> </a></li>
                                                                                        <li><a airportcode="DAD"><b>Đà Nẵng</b> <span>(DAD)</span> </a></li>
                                                                                        <li><a airportcode="CXR"><b>Nha Trang </b> <span>(CXR)</span> </a></li>
                                                                                        <li><a airportcode="DLI"><b>Đà Lạt</b> <span>(DLI)</span> </a></li>
                                                                                        <li><a airportcode="VII"><b>Vinh </b> <span>(VII)</span> </a></li>
                                                                                        <li><a airportcode="HUI"><b>Huế</b> <span>(HUI)</span> </a></li>
                                                                                        <li><a airportcode="THD"><b>Thanh Hóa</b> <span>(THD)</span> </a></li>
                                                                                        <li><a airportcode="BMV"><b>Buôn Ma Thuột</b> <span>(BMV)</span> </a></li>
                                                                                        <li><a airportcode="PXU"><b>Pleiku </b> <span>(PXU)</span> </a></li>
                                                                                        <li><a airportcode="UIH"><b>Quy Nhơn </b> <span>(UIH)</span> </a></li>
                                                                                        <li><a airportcode="VDH"><b>Đồng Hới </b> <span>(VDH)</span> </a></li>
                                                                                        <li><a airportcode="TBB"><b>Tuy Hòa</b> <span>(TBB)</span> </a></li>
                                                                                        <li><a airportcode="VCL"><b>Chu Lai</b> <span>(VCL)</span> </a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade" id="departure-choose-foreign-95" role="tabpanel" aria-labelledby="profile-tab">
                                                                                <div class="airport">
                                                                                    <ul>
                                                                                        <li><a airportcode="BKK"><b>Bangkok </b><span> (BKK)</span> </a></li>
                                                                                        <li><a airportcode="SIN"><b>Singapore </b> <span>(SIN)</span> </a></li>
                                                                                        <li><a airportcode="KUL"><b>Kuala Lumpur </b> <span>(KUL)</span> </a></li>
                                                                                        <li><a airportcode="DPS"><b>Bali </b> <span>(DPS)</span> </a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade" id="departure-choose-foreign-96" role="tabpanel" aria-labelledby="contact-tab">
                                                                                <div class="airport">
                                                                                    <ul>
                                                                                        <li><a airportcode="NRT"><b>Tokyo </b> <span>(NRT)</span> </a></li>
                                                                                        <li><a airportcode="PEK"><b>Beijing </b> <span>(PEK)</span> </a></li>
                                                                                        <li><a airportcode="CAN"><b>Guangzhou </b> <span>(CAN)</span> </a></li>
                                                                                        <li><a airportcode="ICN"><b>Seoul </b> <span>(ICN)</span> </a></li>
                                                                                        <li><a airportcode="HKG"><b>Hong Kong </b> <span>(HKG)</span> </a></li>
                                                                                        <li><a airportcode="TPE"><b>Taoyuan </b> <span>(TPE)</span> </a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade" id="departure-choose-foreign-97" role="tabpanel" aria-labelledby="contact-tab">
                                                                                <div class="airport">
                                                                                    <ul>
                                                                                        <li><a airportcode="FRA"><b>Frankfurt </b><span> (FRA)</span> </a></li>
                                                                                        <li><a airportcode="CDG"><b>Paris </b> <span>(CDG)</span> </a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade" id="departure-choose-foreign-98" role="tabpanel" aria-labelledby="contact-tab">
                                                                                <div class="airport">
                                                                                    <ul>
                                                                                        <li><a airportcode="SYD"><b>Sydney </b> <span>(SYD)</span> </a></li>
                                                                                        <li><a airportcode="MEL"><b>Melbourne </b> <span>(MEL)</span> </a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>    
                                                            </div>
                                                        </div>
                                                    </div>                                      
                                                    <button class="btn-swap"><i class="fa fa-exchange" aria-hidden="true"></i></button>
                                                    <div class="col-xs-6 gutter">
                                                        <div class="search-fly-form-destination search-destination-choose" itinerary="1">
                                                            <div class="input-fn">
                                                                <label for="">Điểm đến</label>
                                                                <span class="icon"><img src="/sites/all/themes/cassiopeia_theme/img/icons/plane-down.svg" class="img-responsive" alt=""></span>
                                                                <input class="form-control valid fake-input" id="" name="" type="text" value="Ho Chi Minh (SGN)" placeholder="Điểm đến" autocomplete="off">
                                                                <input class="form-control real-input" id="destination-0" name="DestinationCode-0" type="hidden" value="SGN">
                                                                <ul class="select-departure">
                                                                </ul>
                                                                <i class="icon-add-location"></i>
                                                                <i class="icon-select-location"></i>
                                                            </div>
                                                            <div id="sub-destination-0" class="sub-search dpn" style="display: none;">
                                                                <div class="sub-search-content return-choose">
                                                                    <div class="suggest-airport-title">
                                                                        <div class="c-primary">
                                                                            <i class="fa fa-map-marker" aria-hidden="true"></i>Chọn điểm đến        </div>
                                                                        <button type="button" class="btn-close suggest-close"><i class="fa fa-times"></i></button>
                                                                    </div>

                                                                    <div class="suggest-airport-input">
                                                                        <input autocomplete="off" class="form-control sub-search-suggest departure" type="text" id="search-departure-0" placeholder="Gõ tên thành phố hoặc mã sân bay" onkeyup="search_departure_keyup(this,event)">
                                                                        <ul class="result departure select-departure" style="max-height: 220px"></ul>
                                                                    </div>

                                                                    <div class="suggest-airport-links">
                                                                        <ul class="nav nav-tabs" id="return-choose" role="tablist">
                                                                            <li class="nav-item active">
                                                                                <a class="nav-link" data-toggle="tab" href="#return-choose-domestic" role="tab" aria-controls="home" aria-selected="true">
                                                                                    Việt Nam
                                                                                </a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link" data-toggle="tab" href="#return-choose-foreign-95" role="tab" aria-controls="profile" aria-selected="false">
                                                                                    Đông Nam Á                </a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link" data-toggle="tab" href="#return-choose-foreign-96" role="tab" aria-controls="contact" aria-selected="false">
                                                                                    Đông Bắc Á                </a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link" data-toggle="tab" href="#return-choose-foreign-97" role="tab" aria-controls="contact" aria-selected="false">
                                                                                    Châu Âu                </a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link" data-toggle="tab" href="#return-choose-foreign-98" role="tab" aria-controls="contact" aria-selected="false">
                                                                                    Châu Úc                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>

                                                                    <div class="suggest-airport-list">
                                                                        <div class="tab-content" id="suggest-airport-content">
                                                                            <div class="tab-pane fade active in" id="return-choose-domestic" role="tabpanel" aria-labelledby="domestic-tab">
                                                                                <div class="airport">
                                                                                    <ul>
                                                                                        <li><a airportcode="HAN"><b>Hà Nội </b><span>(HAN)</span> </a></li>
                                                                                        <li><a airportcode="HPH"><b>Hải Phòng </b> <span>(HPH)</span> </a></li>
                                                                                        <li><a airportcode="DIN"><b>Điện Biên </b> <span>(DIN)</span> </a></li>
                                                                                        <li><a airportcode="VDO"><b>Vân Đồn </b> <span>(VDO)</span> </a></li>
                                                                                        <li><a airportcode="SGN"><b>Hồ Chí Minh </b><span>(SGN)</span> </a></li>
                                                                                        <li><a airportcode="PQC"><b>Phú Quốc </b> <span>(PQC)</span> </a></li>
                                                                                        <li><a airportcode="VCS"><b>Côn Đảo </b> <span>(VCS)</span> </a></li>
                                                                                        <li><a airportcode="VCA"><b>Cần Thơ </b> <span>(VCA)</span> </a></li>
                                                                                        <li><a airportcode="CAH"><b>Cà Mau </b> <span>(CAH)</span> </a></li>
                                                                                        <li><a airportcode="VKG"><b>Rạch Giá </b> <span>(VKG)</span> </a></li>
                                                                                        <li><a airportcode="DAD"><b>Đà Nẵng</b> <span>(DAD)</span> </a></li>
                                                                                        <li><a airportcode="CXR"><b>Nha Trang </b> <span>(CXR)</span> </a></li>
                                                                                        <li><a airportcode="DLI"><b>Đà Lạt</b> <span>(DLI)</span> </a></li>
                                                                                        <li><a airportcode="VII"><b>Vinh </b> <span>(VII)</span> </a></li>
                                                                                        <li><a airportcode="HUI"><b>Huế</b> <span>(HUI)</span> </a></li>
                                                                                        <li><a airportcode="THD"><b>Thanh Hóa</b> <span>(THD)</span> </a></li>
                                                                                        <li><a airportcode="BMV"><b>Buôn Ma Thuột</b> <span>(BMV)</span> </a></li>
                                                                                        <li><a airportcode="PXU"><b>Pleiku </b> <span>(PXU)</span> </a></li>
                                                                                        <li><a airportcode="UIH"><b>Quy Nhơn </b> <span>(UIH)</span> </a></li>
                                                                                        <li><a airportcode="VDH"><b>Đồng Hới </b> <span>(VDH)</span> </a></li>
                                                                                        <li><a airportcode="TBB"><b>Tuy Hòa</b> <span>(TBB)</span> </a></li>
                                                                                        <li><a airportcode="VCL"><b>Chu Lai</b> <span>(VCL)</span> </a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade" id="return-choose-foreign-95" role="tabpanel" aria-labelledby="profile-tab">
                                                                                <div class="airport">
                                                                                    <ul>
                                                                                        <li><a airportcode="BKK"><b>Bangkok </b><span> (BKK)</span> </a></li>
                                                                                        <li><a airportcode="SIN"><b>Singapore </b> <span>(SIN)</span> </a></li>
                                                                                        <li><a airportcode="KUL"><b>Kuala Lumpur </b> <span>(KUL)</span> </a></li>
                                                                                        <li><a airportcode="DPS"><b>Bali </b> <span>(DPS)</span> </a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade" id="return-choose-foreign-96" role="tabpanel" aria-labelledby="contact-tab">
                                                                                <div class="airport">
                                                                                    <ul>
                                                                                        <li><a airportcode="NRT"><b>Tokyo </b> <span>(NRT)</span> </a></li>
                                                                                        <li><a airportcode="PEK"><b>Beijing </b> <span>(PEK)</span> </a></li>
                                                                                        <li><a airportcode="CAN"><b>Guangzhou </b> <span>(CAN)</span> </a></li>
                                                                                        <li><a airportcode="ICN"><b>Seoul </b> <span>(ICN)</span> </a></li>
                                                                                        <li><a airportcode="HKG"><b>Hong Kong </b> <span>(HKG)</span> </a></li>
                                                                                        <li><a airportcode="TPE"><b>Taoyuan </b> <span>(TPE)</span> </a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade" id="return-choose-foreign-97" role="tabpanel" aria-labelledby="contact-tab">
                                                                                <div class="airport">
                                                                                    <ul>
                                                                                        <li><a airportcode="FRA"><b>Frankfurt </b><span> (FRA)</span> </a></li>
                                                                                        <li><a airportcode="CDG"><b>Paris </b> <span>(CDG)</span> </a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade" id="return-choose-foreign-98" role="tabpanel" aria-labelledby="contact-tab">
                                                                                <div class="airport">
                                                                                    <ul>
                                                                                        <li><a airportcode="SYD"><b>Sydney </b> <span>(SYD)</span> </a></li>
                                                                                        <li><a airportcode="MEL"><b>Melbourne </b> <span>(MEL)</span> </a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 search-fly-form-date clearfix">
                                                    <div class="search-fly-form-departure-date">
                                                        <div class="input-fn">
                                                            <label for="">Ngày đi</label>
                                                            <input id="DepartureDate-0" name="DepartureDate-0" readonly="true" type="text" class="Input-DepartureDate form-control hasDatepicker" value="05/05/2023" placeholder="Ngày đi">
                                                            <i class="fa-light fa-calendar-lines"></i>
                                                        </div>
                                                    </div>
                                                    <div class="search-fly-form-return-date disable">
                                                        <div class="input-fn">
                                                            <label for="">Ngày về</label>
                                                            <input data-val="true" id="ReturnDate-0" name="ReturnDate-0" type="text" readonly="true" value="05/05/2023" class="Input-ReturnDate form-control hasDatepicker" placeholder="Ngày về">
                                                            <i class="fa-light fa-calendar-lines"></i>
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-6 search-fly-form-add-more" style="display: none;">
                                                        <div class="input-fn">
                                                            <div class="search-fly-form-add-more-control">
                                                                <button type="button" class="search-fly-form-add-more-control-button-remove">
                                                                    <i class="fa fa-minus-square-o" aria-hidden="true"></i>
                                                                    <span> Xóa</span>
                                                                </button>
                                                                <button type="button" class=" search-fly-form-add-more-control-button-add">
                                                                    <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                                                    <span> Thêm</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                                                    <div class="col-md-2 gutter search-fly-guest">
                                                    <label for="">Hành khách</label>
                                                    <div class="text">
                                                        <span class="fa fa-user"></span> <span class="guest-count">1</span> Khách
                                                    </div>
                                                    <div class="search-fly-form-passenger clearfix">
                                                        <div class="select-fn">
                                                            <div class="select-fn-left">
                                                                <span class="name-field">Người lớn</span>
                                                            </div>
                                                            <div class="select-fn-right">
                                                                <div class="quantity">
                                                                    <p>
                                                                    <span class="quantity-down">
                                                                        <i class="fa fa-minus-circle"></i>
                                                                    </span>
                                                                        <input min="0" max="9" name="Adults" type="text" class="quantity-text" value="1">
                                                                        <span class="quantity-up">
                                                                        <i class="fa fa-plus-circle"></i>
                                                                    </span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="select-fn">
                                                            <div class="select-fn-left">
                                                                <span class="name-field">Trẻ em (2 - 11 tuổi)</span>
                                                            </div>
                                                            <div class="select-fn-right">
                                                                <div class="quantity">
                                                                    <p>
                                                                    <span class="quantity-down">
                                                                        <i class="fa fa-minus-circle"></i>
                                                                    </span>
                                                                        <input name="Childrens" type="text" class="quantity-text" value="0">
                                                                        <span class="quantity-up">
                                                                        <i class="fa fa-plus-circle"></i>
                                                                    </span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="select-fn">
                                                            <div class="select-fn-left">
                                                                <span class="name-field">Em bé (&lt; 2 tuổi)</span>
                                                            </div>
                                                            <div class="select-fn-right">
                                                                <div class="quantity">
                                                                    <p>
                                                                    <span class="quantity-down">
                                                                        <i class="fa fa-minus-circle"></i>
                                                                    </span>
                                                                        <input name="Infants" type="text" class="quantity-text" value="0">
                                                                        <span class="quantity-up">
                                                                        <i class="fa fa-plus-circle"></i>
                                                                    </span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="close-search-form">
                                                            <button class="btn-close">Hoàn tất</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 gutter search-fly-form-actions clearfix">
                                                    <button type="submit" class="btn btn-default">Tìm chuyến ngay</button><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- search-tab-2 -->
                            <div id="search-tab-2" class="tab-pane fade in active">
                                <div class="hotel-search-form">
                                    <div class="row">
                                        <div id="itinerarys" class="padding-horizontal">
                                            <div class="row clearfix itinerary" itinerary="0">
                                                <div class="col-md-4 clearfix form-search-key">
                                                    <div class="gutter">
                                                        <div class="search-fly-form-destination search-destination-choose" itinerary="1">
                                                            <div class="input-fn">
                                                                <label for="">Điểm đến</label>
                                                                <span class="icon"><img src="/sites/all/themes/cassiopeia_theme/img/icons/car.svg" class="img-responsive" alt=""></span>
                                                                <input class="form-control valid fake-input" id="" name="" type="text" value="Ho Chi Minh (SGN)" placeholder="Điểm đến" autocomplete="off">
                                                                <input class="form-control real-input" id="destination-0" name="DestinationCode-0" type="hidden" value="SGN">
                                                                <ul class="select-departure">
                                                                </ul>
                                                                <i class="icon-add-location"></i>
                                                                <i class="icon-select-location"></i>
                                                            </div>
                                                            <div id="sub-destination-0" class="sub-search dpn" style="display: none;">
                                                                <div class="sub-search-content return-choose">
                                                                    <div class="suggest-airport-title">
                                                                        <div class="c-primary">
                                                                            <i class="fa fa-map-marker" aria-hidden="true"></i>Chọn điểm đến</div>
                                                                        <button type="button" class="btn-close suggest-close"><i class="fa fa-times"></i></button>
                                                                    </div>

                                                                    <div class="suggest-airport-input">
                                                                        <input autocomplete="off" class="form-control sub-search-suggest departure" type="text" id="search-departure-0" placeholder="Gõ tên thành phố hoặc mã sân bay" onkeyup="search_departure_keyup(this,event)">
                                                                        <ul class="result departure select-departure" style="max-height: 220px"></ul>
                                                                    </div>

                                                                    <div class="suggest-airport-links">
                                                                        <ul class="nav nav-tabs" id="return-choose" role="tablist">
                                                                            <li class="nav-item active">
                                                                                <a class="nav-link" data-toggle="tab" href="#return-choose-domestic" role="tab" aria-controls="home" aria-selected="true">
                                                                                    Việt Nam
                                                                                </a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link" data-toggle="tab" href="#return-choose-foreign-95" role="tab" aria-controls="profile" aria-selected="false">
                                                                                    Đông Nam Á                </a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link" data-toggle="tab" href="#return-choose-foreign-96" role="tab" aria-controls="contact" aria-selected="false">
                                                                                    Đông Bắc Á                </a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link" data-toggle="tab" href="#return-choose-foreign-97" role="tab" aria-controls="contact" aria-selected="false">
                                                                                    Châu Âu                </a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link" data-toggle="tab" href="#return-choose-foreign-98" role="tab" aria-controls="contact" aria-selected="false">
                                                                                    Châu Úc                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>

                                                                    <div class="suggest-airport-list">
                                                                        <div class="tab-content" id="suggest-airport-content">
                                                                            <div class="tab-pane fade active in" id="return-choose-domestic" role="tabpanel" aria-labelledby="domestic-tab">
                                                                                <div class="airport">
                                                                                    <ul>
                                                                                        <li><a airportcode="HAN"><b>Hà Nội </b><span>(HAN)</span> </a></li>
                                                                                        <li><a airportcode="HPH"><b>Hải Phòng </b> <span>(HPH)</span> </a></li>
                                                                                        <li><a airportcode="DIN"><b>Điện Biên </b> <span>(DIN)</span> </a></li>
                                                                                        <li><a airportcode="VDO"><b>Vân Đồn </b> <span>(VDO)</span> </a></li>
                                                                                        <li><a airportcode="SGN"><b>Hồ Chí Minh </b><span>(SGN)</span> </a></li>
                                                                                        <li><a airportcode="PQC"><b>Phú Quốc </b> <span>(PQC)</span> </a></li>
                                                                                        <li><a airportcode="VCS"><b>Côn Đảo </b> <span>(VCS)</span> </a></li>
                                                                                        <li><a airportcode="VCA"><b>Cần Thơ </b> <span>(VCA)</span> </a></li>
                                                                                        <li><a airportcode="CAH"><b>Cà Mau </b> <span>(CAH)</span> </a></li>
                                                                                        <li><a airportcode="VKG"><b>Rạch Giá </b> <span>(VKG)</span> </a></li>
                                                                                        <li><a airportcode="DAD"><b>Đà Nẵng</b> <span>(DAD)</span> </a></li>
                                                                                        <li><a airportcode="CXR"><b>Nha Trang </b> <span>(CXR)</span> </a></li>
                                                                                        <li><a airportcode="DLI"><b>Đà Lạt</b> <span>(DLI)</span> </a></li>
                                                                                        <li><a airportcode="VII"><b>Vinh </b> <span>(VII)</span> </a></li>
                                                                                        <li><a airportcode="HUI"><b>Huế</b> <span>(HUI)</span> </a></li>
                                                                                        <li><a airportcode="THD"><b>Thanh Hóa</b> <span>(THD)</span> </a></li>
                                                                                        <li><a airportcode="BMV"><b>Buôn Ma Thuột</b> <span>(BMV)</span> </a></li>
                                                                                        <li><a airportcode="PXU"><b>Pleiku </b> <span>(PXU)</span> </a></li>
                                                                                        <li><a airportcode="UIH"><b>Quy Nhơn </b> <span>(UIH)</span> </a></li>
                                                                                        <li><a airportcode="VDH"><b>Đồng Hới </b> <span>(VDH)</span> </a></li>
                                                                                        <li><a airportcode="TBB"><b>Tuy Hòa</b> <span>(TBB)</span> </a></li>
                                                                                        <li><a airportcode="VCL"><b>Chu Lai</b> <span>(VCL)</span> </a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade" id="return-choose-foreign-95" role="tabpanel" aria-labelledby="profile-tab">
                                                                                <div class="airport">
                                                                                    <ul>
                                                                                        <li><a airportcode="BKK"><b>Bangkok </b><span> (BKK)</span> </a></li>
                                                                                        <li><a airportcode="SIN"><b>Singapore </b> <span>(SIN)</span> </a></li>
                                                                                        <li><a airportcode="KUL"><b>Kuala Lumpur </b> <span>(KUL)</span> </a></li>
                                                                                        <li><a airportcode="DPS"><b>Bali </b> <span>(DPS)</span> </a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade" id="return-choose-foreign-96" role="tabpanel" aria-labelledby="contact-tab">
                                                                                <div class="airport">
                                                                                    <ul>
                                                                                        <li><a airportcode="NRT"><b>Tokyo </b> <span>(NRT)</span> </a></li>
                                                                                        <li><a airportcode="PEK"><b>Beijing </b> <span>(PEK)</span> </a></li>
                                                                                        <li><a airportcode="CAN"><b>Guangzhou </b> <span>(CAN)</span> </a></li>
                                                                                        <li><a airportcode="ICN"><b>Seoul </b> <span>(ICN)</span> </a></li>
                                                                                        <li><a airportcode="HKG"><b>Hong Kong </b> <span>(HKG)</span> </a></li>
                                                                                        <li><a airportcode="TPE"><b>Taoyuan </b> <span>(TPE)</span> </a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade" id="return-choose-foreign-97" role="tabpanel" aria-labelledby="contact-tab">
                                                                                <div class="airport">
                                                                                    <ul>
                                                                                        <li><a airportcode="FRA"><b>Frankfurt </b><span> (FRA)</span> </a></li>
                                                                                        <li><a airportcode="CDG"><b>Paris </b> <span>(CDG)</span> </a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade" id="return-choose-foreign-98" role="tabpanel" aria-labelledby="contact-tab">
                                                                                <div class="airport">
                                                                                    <ul>
                                                                                        <li><a airportcode="SYD"><b>Sydney </b> <span>(SYD)</span> </a></li>
                                                                                        <li><a airportcode="MEL"><b>Melbourne </b> <span>(MEL)</span> </a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 search-fly-form-date clearfix">
                                                    <div class="search-fly-form-departure-date">
                                                        <div class="input-fn">
                                                            <label for="">Nhận phòng</label>
                                                            <input id="DepartureDate-0" name="DepartureDate-0" readonly="true" type="text" class="Input-DepartureDate form-control hasDatepicker" value="05/05/2023" placeholder="Ngày đi">
                                                            <i class="fa-light fa-calendar-lines"></i>
                                                        </div>
                                                    </div>
                                                    <div class="search-fly-form-return-date">
                                                        <div class="input-fn">
                                                            <label for="">Trả phòng</label>
                                                            <input id="DepartureDate-0" name="DepartureDate-0" readonly="true" type="text" class="Input-DepartureDate form-control hasDatepicker" value="05/05/2023" placeholder="Ngày đi">
                                                            <i class="fa-light fa-calendar-lines"></i>
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-6 search-fly-form-add-more" style="display: none;">
                                                        <div class="input-fn">
                                                            <div class="search-fly-form-add-more-control">
                                                                <button type="button" class="search-fly-form-add-more-control-button-remove">
                                                                    <i class="fa fa-minus-square-o" aria-hidden="true"></i>
                                                                    <span> Xóa</span>
                                                                </button>
                                                                <button type="button" class=" search-fly-form-add-more-control-button-add">
                                                                    <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                                                    <span> Thêm</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 gutter search-fly-guest-hotel">
                                                    <label for="">Hành khách</label>
                                                    <div class="text">
                                                        <span class="fa fa-user"></span> <span class="guest-count">1</span> Khách
                                                    </div>
                                                    <div class="search-fly-form-passenger clearfix">
                                                        <div class="select-fn">
                                                            <div class="select-fn-left">
                                                                <span class="name-field">Người lớn</span>
                                                            </div>
                                                            <div class="select-fn-right">
                                                                <div class="quantity">
                                                                    <p>
                                                                    <span class="quantity-down">
                                                                        <i class="fa fa-minus-circle"></i>
                                                                    </span>
                                                                        <input min="0" max="9" name="Adults" type="text" class="quantity-text" value="1">
                                                                        <span class="quantity-up">
                                                                        <i class="fa fa-plus-circle"></i>
                                                                    </span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="select-fn">
                                                            <div class="select-fn-left">
                                                                <span class="name-field">Trẻ em (2 - 11 tuổi)</span>
                                                            </div>
                                                            <div class="select-fn-right">
                                                                <div class="quantity">
                                                                    <p>
                                                                    <span class="quantity-down">
                                                                        <i class="fa fa-minus-circle"></i>
                                                                    </span>
                                                                        <input name="Childrens" type="text" class="quantity-text" value="0">
                                                                        <span class="quantity-up">
                                                                        <i class="fa fa-plus-circle"></i>
                                                                    </span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="select-fn">
                                                            <div class="select-fn-left">
                                                                <span class="name-field">Em bé (&lt; 2 tuổi)</span>
                                                            </div>
                                                            <div class="select-fn-right">
                                                                <div class="quantity">
                                                                    <p>
                                                                    <span class="quantity-down">
                                                                        <i class="fa fa-minus-circle"></i>
                                                                    </span>
                                                                        <input name="Infants" type="text" class="quantity-text" value="0">
                                                                        <span class="quantity-up">
                                                                        <i class="fa fa-plus-circle"></i>
                                                                    </span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="close-search-form">
                                                            <button class="btn-close">Hoàn tất</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 gutter search-fly-form-actions clearfix">
                                                    <button type="submit" class="btn btn-default">Tìm chuyến ngay</button><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-suggest">
                                        <div class="block-area">
                                            <div class="block-title">
                                                <h3>Địa điểm đang HOT nhất</h3>
                                            </div>
                                            <div class="block-items">
                                                <div class="item" data-tid="58">
                                                    <img typeof="foaf:Image" class="img-responsive" src="https://autic.vn/sites/default/files/styles/style_106x106/public/da_lat.jpg?itok=ogbUkn5k" width="106" height="106" alt="" title="">
                                                    <div>
                                                        <div class="text">Đà Lạt</div>
                                                        <div>36 KS</div>
                                                    </div>
                                                </div>
                                                <div class="item" data-tid="58">
                                                    <img typeof="foaf:Image" class="img-responsive" src="https://autic.vn/sites/default/files/styles/style_106x106/public/da_lat.jpg?itok=ogbUkn5k" width="106" height="106" alt="" title="">
                                                    <div>
                                                        <div class="text">Đà Lạt</div>
                                                        <div>36 KS</div>
                                                    </div>
                                                </div>
                                                <div class="item" data-tid="58">
                                                    <img typeof="foaf:Image" class="img-responsive" src="https://autic.vn/sites/default/files/styles/style_106x106/public/da_lat.jpg?itok=ogbUkn5k" width="106" height="106" alt="" title="">
                                                    <div>
                                                        <div class="text">Đà Lạt</div>
                                                        <div>36 KS</div>
                                                    </div>
                                                </div>
                                                <div class="item" data-tid="58">
                                                    <img typeof="foaf:Image" class="img-responsive" src="https://autic.vn/sites/default/files/styles/style_106x106/public/da_lat.jpg?itok=ogbUkn5k" width="106" height="106" alt="" title="">
                                                    <div>
                                                        <div class="text">Đà Lạt</div>
                                                        <div>36 KS</div>
                                                    </div>
                                                </div>

                                                <div class="item" data-tid="58">
                                                    <img typeof="foaf:Image" class="img-responsive" src="https://autic.vn/sites/default/files/styles/style_106x106/public/da_lat.jpg?itok=ogbUkn5k" width="106" height="106" alt="" title="">
                                                    <div>
                                                        <div class="text">Đà Lạt</div>
                                                        <div>36 KS</div>
                                                    </div>
                                                </div>
                                                <div class="item" data-tid="58">
                                                    <img typeof="foaf:Image" class="img-responsive" src="https://autic.vn/sites/default/files/styles/style_106x106/public/da_lat.jpg?itok=ogbUkn5k" width="106" height="106" alt="" title="">
                                                    <div>
                                                        <div class="text">Đà Lạt</div>
                                                        <div>36 KS</div>
                                                    </div>
                                                </div>
                                                <div class="item" data-tid="58">
                                                    <img typeof="foaf:Image" class="img-responsive" src="https://autic.vn/sites/default/files/styles/style_106x106/public/da_lat.jpg?itok=ogbUkn5k" width="106" height="106" alt="" title="">
                                                    <div>
                                                        <div class="text">Đà Lạt</div>
                                                        <div>36 KS</div>
                                                    </div>
                                                </div>
                                                <div class="item" data-tid="58">
                                                    <img typeof="foaf:Image" class="img-responsive" src="https://autic.vn/sites/default/files/styles/style_106x106/public/da_lat.jpg?itok=ogbUkn5k" width="106" height="106" alt="" title="">
                                                    <div>
                                                        <div class="text">Đà Lạt</div>
                                                        <div>36 KS</div>
                                                    </div>
                                                </div>
                                                <div class="item" data-tid="58">
                                                    <img typeof="foaf:Image" class="img-responsive" src="https://autic.vn/sites/default/files/styles/style_106x106/public/da_lat.jpg?itok=ogbUkn5k" width="106" height="106" alt="" title="">
                                                    <div>
                                                        <div class="text">Đà Lạt</div>
                                                        <div>36 KS</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>        
        </div>
    </div>
</div>