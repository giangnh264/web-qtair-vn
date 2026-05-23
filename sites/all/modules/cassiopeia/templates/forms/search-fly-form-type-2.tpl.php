<?php
/**
 * Created by PhpStorm.
 * User: VDP
 * Date: 02/04/2019
 * Time: 10:53 AM
 */
global $language;
if(!empty($variables['cache'])){
    $caches = $variables['cache'];
//    print_r($caches);
}
$_data = null;
if(!empty($variables['data'])){
    $_data = $variables['data'];
    $_SESSION['search_data'] = $_data;
}

drupal_add_js(array(
    'language' => $language,
), 'setting');
drupal_add_library('system', 'ui.datepicker');

drupal_add_css(drupal_get_path('theme', 'cassiopeia_theme') . '/js/lib/datetimepicker/jquery.datepicker.custom.css');

drupal_add_js(drupal_get_path('theme', 'cassiopeia_theme') . '/js/lib/datetimepicker/jquery-ui-1.10.3.custom.js');
drupal_add_js(drupal_get_path('theme', 'cassiopeia_theme') . '/js/lib/datetimepicker/jquery.ui.datepicker-vi.min.js');
drupal_add_js(drupal_get_path('theme', 'cassiopeia_theme') . '/js/lib/datetimepicker/jquery.datepicker.lunar.js');
drupal_add_js(drupal_get_path('theme', 'cassiopeia_theme') . '/js/lib/datetimepicker/AriDatePicker.js');
drupal_add_js("https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js", ['weight' => 1000]);
drupal_add_css("https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css", ['weight' => 1000]);

drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/search-fly-form.js');
$adult = $children = $infant = $room = 0;
$action = !empty($variables['action'])?$variables['action']:"";
$search = isset($_SESSION['search_data'])?$_SESSION['search_data']:null;
$text = "1 phòng, 1 người lớn";
if(!empty($search['guest'])){
    foreach($search['guest'] as $guest){
        $adult+=$guest['adult'];
        $children+=$guest['children'];
        $infant+=$guest['infant'];
        $room++;
    }
    $text = $room." phòng, ".$adult." người lớn, ".$children." trẻ em, ".$infant." em bé";
}
?>

<form  id="search-fly-form" class="search-fly-form .search-fly-form-horizontal search-fly-form-horizontal-one" novalidate="novalidate" action="/flight-search" method="get">
    <div class="search-fly-form-container">
        <!--            <div class="search-fly-form-header">-->
        <!--                <span>--><?php //print(t($GLOBALS['string_constant'][34])) ?><!--</span>-->
        <!--            </div>-->
        <!----------------html----------------------->

        <div class="search-fly-form-title-add">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#search-tab-1"><img src="/sites/all/themes/cassiopeia_theme/img/icon--1.png" alt=""><span>Vé máy bay</span></a></li>
                <li><a data-toggle="tab" href="#search-tab-2"><img src="/sites/all/themes/cassiopeia_theme/img/icon--2.png" alt="">Đặt phòng</li>
                <li><a data-toggle="tab" href="#search-tab-3"><img src="/sites/all/themes/cassiopeia_theme/img/icon--3.png" alt=""><a href="https://autravel.vn/" target="_blank">Tour du lịch</a></li>
            </ul>
        </div>

        <!----------------html----------------------->
        <div class="search-fly-form-body">
            <div class="tab-content">
                <div id="search-tab-1" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-xs-12 search-fly-form-itinerary clearfix">
                            <div class="radio">
                                <?php if(!empty($_data['TripType'])): ?>
                                    <input <?php if($_data['TripType'] == "RT") print("checked");   ?> id="round-trip" name="TripType" type="radio" value="RT">
                                <?php else: ?>
                                    <input checked="true" id="round-trip" name="TripType" type="radio" value="RT">
                                <?php endif; ?>
                                <label for="round-trip"><?php print(t($GLOBALS['string_constant'][24])) ?></label>
                                <?php if(!empty($_data['TripType'])): ?>
                                    <input  <?php if($_data['TripType'] == "OW") print("checked");   ?> id="one-way" name="TripType" type="radio" value="OW">
                                <?php else: ?>
                                    <input id="one-way" name="TripType" type="radio" value="OW">
                                <?php endif; ?>
                                <label for="one-way"><?php print(t($GLOBALS['string_constant'][25])) ?></label>

                                <!--                            <input id="MOST_CHEAP" type="radio" name="TripType" value="MOST_CHEAP">-->
                                <!--                            <label for="MOST_CHEAP">Vé rẻ trong ngày</label>-->
                            </div>
                            <div class="search-month">
                                <!--                            <input type="checkbox" id="search-month" class="search-month">-->
                                <!--                            <label for="search-month">Tìm vé rẻ trong tháng</label>-->
                                <label class="search-month-content" for="search-month">Vé rẻ trong tháng
                                    <input <?php if(!empty($_data['search_month']) && $_data['search_month']==1) print("checked"); ?> type="checkbox" id="search-month" class="search-month" >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                        <div id="itinerarys">
                            <div class="row clearfix itinerary" itinerary="0">
                                <div class="col-md-5 search-fly-form-departure-destination clearfix">
                                    <div class="col-xs-6 gutter">
                                        <div class="search-fly-form-departure search-destination-choose" itinerary="0">
                                            <div class="input-fn">
                                                <!--                                            <span class="name-field">--><?php //print(t($GLOBALS['string_constant'][26])) ?><!--</span>-->
                                                <!--                                        <div class="form-control fake-input-text" id="fake-departure-0"  readonly="True" onclick="fake_departure_click(this)" onmouseup="sub_search_mouseup(this)">-->
                                                <!--                                            <div>-->
                                                <!--                                                --><?php //if(!empty($_data['DepartureCode-0'])): ?>
                                                <!--                                                    --><?php
                                                //                                                    $startpoint = cassiopeia_get_airport($_data['DepartureCode-0']);
                                                //                                                    print($startpoint->city_code);
                                                //                                                    ?>
                                                <!--                                                --><?php //  else: ?>
                                                <!--                                                    Điểm đi-->
                                                <!--                                                --><?php //endif; ?>
                                                <!--                                            </div>-->
                                                <!--                                        </div>-->
                                                <?php
                                                $inputValue = "";
                                                if(!empty($_data['DepartureCode-0'])){
                                                    $startPoint = cassiopeia_get_airport($_data['DepartureCode-0']);
                                                    $inputValue = $startPoint->city." (".$startPoint->code.")";
                                                }
                                                ?>
                                                <input class="form-control fake-input" id="" name="" autocomplete="off" type="text"  value="<?php print($inputValue); ?>" placeholder="Điểm đi">
                                                <input class="form-control real-input" id="departure-0" name="DepartureCode-0"  type="hidden" value="<?php if(!empty($startPoint)) print(($startPoint->code)); ?>">
                                                <ul class="select-departure">
                                                    <li><a airportcode="HAN"><b>Hà Nội</b><span>(HAN)</span> </a></li>
                                                    <li><a airportcode="HPH"><b>Hải Phòng</b> <span>(HPH)</span> </a></li>
                                                    <li><a airportcode="DIN"><b>Điện Biên</b> <span>(DIN)</span> </a></li>
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
                                                <i class="icon-add-location"></i>
                                                <i class="icon-select-location"></i>
                                            </div>
                                            <div id="sub-departure-0" class="sub-search" style="display: none;">
                                                <?php print(_cassiopeia_render_theme("module","cassiopeia","templates/parts/search-destination.tpl.php",array("departure"=>1))); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 gutter">
                                        <div class="search-fly-form-destination search-destination-choose" itinerary="1">
                                            <div class="input-fn">
                                                <!--                                            <span class="name-field">--><?php //print(t($GLOBALS['string_constant'][27])) ?><!--</span>-->
                                                <!--                                        <div class="form-control fake-input-text" id="fake-destination-0" readonly="True" onclick="fake_destination_click(this)" onmouseup="sub_search_mouseup(this)">-->
                                                <!--                                            <div>-->
                                                <!--                                                --><?php //if(!empty($_data['DestinationCode-0'])): ?>
                                                <!--                                                    --><?php
                                                //                                                    $endpoint = cassiopeia_get_airport($_data['DestinationCode-0']);
                                                //                                                    print($endpoint->code);
                                                //                                                    ?>
                                                <!--                                                --><?php //else: ?>
                                                <!--                                                    Điểm đến-->
                                                <!--                                                --><?php //endif; ?>
                                                <!--                                            </div>-->
                                                <!--                                        </div>-->
                                                <?php
                                                $inputValue = "";
                                                if(!empty($_data['DestinationCode-0'])){
                                                    $endPoint = cassiopeia_get_airport($_data['DestinationCode-0']);
                                                    $inputValue = $endPoint->city." (".$endPoint->code.")";
                                                }
                                                ?>
                                                <input class="form-control valid fake-input" id="" name="" type="text" value="<?php print($inputValue); ?>" placeholder="Điểm đến" autocomplete="off">
                                                <input class="form-control real-input" id="destination-0" name="DestinationCode-0"  type="hidden" value="<?php if(!empty($endPoint)) print($endPoint->code); ?>">
                                                <ul class="select-departure">
                                                    <li><a airportcode="HAN"><b>Hà Nội</b><span>(HAN)</span> </a></li>
                                                    <li><a airportcode="HPH"><b>Hải Phòng</b> <span>(HPH)</span> </a></li>
                                                    <li><a airportcode="DIN"><b>Điện Biên</b> <span>(DIN)</span> </a></li>
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
                                                <i class="icon-add-location"></i>
                                                <i class="icon-select-location"></i>
                                            </div>
                                            <div id="sub-destination-0" class="sub-search dpn"  style="display: none;">
                                                <?php print(_cassiopeia_render_theme("module","cassiopeia","templates/parts/search-destination.tpl.php",array("departure"=>0))); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 search-fly-form-date clearfix">

                                    <div class="search-fly-form-departure-date">
                                        <div class="input-fn">
                                            <input id="DepartureDate-0" name="DepartureDate-0"  readonly="true" type="text" class="Input-DepartureDate form-control" value="<?php if(!empty($_data['DepartureDate-0'])){print($_data['DepartureDate-0']);}else{print(date("d/m/Y",REQUEST_TIME));}  ?>" placeholder="Ngày đi" >
                                            <i class="fa fa-calendar icon-calendar"></i>
                                        </div>
                                    </div>
                                    <div class=" search-fly-form-return-date">
                                        <div class="input-fn">
                                            <input data-val="true" id="ReturnDate-0" name="ReturnDate-0" type="text"  readonly="true" value="<?php if(!empty($_data['ReturnDate-0'])){print($_data['ReturnDate-0']);}else{print(date("d/m/Y",REQUEST_TIME));}  ?>" class="Input-ReturnDate form-control" placeholder="Ngày về">
                                            <i class="fa fa-calendar icon-calendar"></i>
                                        </div>
                                    </div>

                                    <div class="col-xs-6 search-fly-form-add-more" style="display: none;">
                                        <div class="input-fn">
                                            <div class="search-fly-form-add-more-control">
                                                <button type="button"  class="search-fly-form-add-more-control-button-remove">
                                                    <i class="fa fa-minus-square-o" aria-hidden="true"></i>
                                                    <span> Xóa</span>
                                                </button>
                                                <button type="button"  class=" search-fly-form-add-more-control-button-add">
                                                    <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                                    <span> Thêm</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $customer_count = 0;
                                if(!empty($_data['Adults'] )){
                                    $customer_count += $_data['Adults'] ;
                                }
                                if( !empty($_data['Childrens'] )){
                                    $customer_count +=  $_data['Childrens'] ;
                                }
                                if($customer_count==0){
                                    $customer_count=1;
                                }
                                ?>
                                <div class="col-md-2 gutter search-fly-guest">
                                    <div class="text">
                                        <span class="fa fa-user"></span> <span class="guest-count"><?php print($customer_count); ?></span> Khách
                                    </div>
                                    <div class="search-fly-form-passenger clearfix">
                                        <div class="select-fn">
                                            <div class="select-fn-left">
                                                <span class="name-field"><?php print(t($GLOBALS['string_constant'][30])) ?></span>
                                            </div>
                                            <div class="select-fn-right">
                                                <div class="quantity">
                                                    <p>
                                                    <span class="quantity-down">
                                                        <i class="fa fa-minus-circle"></i>
                                                    </span>
                                                        <input min="0" max="9" name="Adults" type="text" class="quantity-text" value="<?php print(!empty($_data['Adults'])?$_data['Adults']:1); ?>">
                                                        <span class="quantity-up">
                                                        <i class="fa fa-plus-circle"></i>
                                                    </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="select-fn">
                                            <div class="select-fn-left">
                                                <span class="name-field">Trẻ em (2 - 11)</span>
                                            </div>
                                            <div class="select-fn-right">
                                                <div class="quantity">
                                                    <p>
                                                    <span class="quantity-down">
                                                        <i class="fa fa-minus-circle"></i>
                                                    </span>
                                                        <input name="Childrens" type="text" class="quantity-text" value="<?php print(!empty($_data['Childrens'])?$_data['Childrens']:0); ?>">
                                                        <span class="quantity-up">
                                                        <i class="fa fa-plus-circle"></i>
                                                    </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="select-fn">
                                            <div class="select-fn-left">
                                                <span class="name-field">Em bé (< 2)</span>
                                            </div>
                                            <div class="select-fn-right">
                                                <div class="quantity">
                                                    <p>
                                                    <span class="quantity-down">
                                                        <i class="fa fa-minus-circle"></i>
                                                    </span>
                                                        <input name="Infants" type="text" class="quantity-text" value="<?php print(!empty($_data['Infants'])?$_data['Infants']:0); ?>">
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
                                    <button type="submit" class="btn btn-default"><span class="fa fa-search"></span> <?php print(t($GLOBALS['string_constant'][33])) ?></button><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="search-tab-2" class="tab-pane fade <?php if($arg[0]=="hotel") print("in active"); ?>">
                    <?php print(_cassiopeia_render_theme("module","cassiopeia","templates/forms/hotel-search-form.tpl.php")); ?>
                </div>
                <div id="search-tab-3" class="tab-pane fade">
                    <h3>Menu 2</h3>
                    <p>Some content in menu 2.</p>
                </div>
            </div>
        </div>
    </div>
</form>