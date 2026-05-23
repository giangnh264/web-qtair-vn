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
drupal_add_js(array(
    'language' => $language,
), 'setting');
drupal_add_library('system', 'ui.datepicker');

drupal_add_css(drupal_get_path('theme', 'cassiopeia_theme') . '/js/lib/datetimepicker/jquery.datepicker.custom.css');

drupal_add_js(drupal_get_path('theme', 'cassiopeia_theme') . '/js/lib/datetimepicker/jquery-ui-1.10.3.custom.js');
drupal_add_js(drupal_get_path('theme', 'cassiopeia_theme') . '/js/lib/datetimepicker/jquery.ui.datepicker-vi.min.js');
drupal_add_js(drupal_get_path('theme', 'cassiopeia_theme') . '/js/lib/datetimepicker/jquery.datepicker.lunar.js');
drupal_add_js(drupal_get_path('theme', 'cassiopeia_theme') . '/js/lib/datetimepicker/AriDatePicker.js');
//drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/search-fly-form.js');
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/templates/admin/search-fly-form.js');
?>
<div class="add-booking-form">
    <div class="block-container">
        <div class="block-content">
            <div class="itinerary-block">
                <div class="block-title">
                    Thông tin hành trình
                </div>
                <div class="itinerary-type">
                    <input type="radio" id="itinerary-RT" value="RT"> <label for="itinerary-RT">Khứ hồi</label>
                    <input type="radio" id="itinerary-OW" value="OW"> <label for="itinerary-OW">Một chiều</label>
                </div>
                <div class="itinerary-block departure-block" itinerary="0">
                    <div class="block-title">
                        Chuyến đi
                    </div>
                    <div class="block-content">
                        <div class="row">
                            <div class="col-md-2"><span data-value="" id="departure-1" class="form-control open-destination" placeholder="Điểm đi">Điểm đi</span></div>
                            <div class="col-md-2"><input id="DepartureDate-0" autocomplete="off" type="text" class="form-control date-time-picker" placeholder="Cất cánh"></div>
                            <div class="col-md-2"><span data-value="" id="departure-2" class="form-control open-destination" placeholder="Điểm đến">Điểm đến</span></div>
                            <div class="col-md-2"><input id="ReturnDate-0" autocomplete="off" type="text" class="form-control date-time-picker" placeholder="Hạ cánh"></div>
                            <div class="col-md-2"><span id="airline-0" data-code="" class="form-control span-airline" placeholder="Hãng">Hãng</span></div>
                            <div class="col-md-1"><input type="text" class="form-control" placeholder="Số hiệu"></div>
                            <div class="col-md-1"><input type="text" class="form-control" placeholder="PNR"></div>
                        </div>
                    </div>
                </div>
                <div class="itinerary-block return-block" itinerary="1">
                    <div class="block-title">
                        Chuyến về
                    </div>
                    <div class="block-content">
                        <div class="row">
                            <div class="col-md-2"><span data-value="" id="return-1" class="form-control open-destination" placeholder="Điểm đi">Điểm đi</span></div>
                            <div class="col-md-2"><input id="DepartureDate-1" autocomplete="off" type="text" class="form-control date-time-picker" placeholder="Cất cánh"></div>
                            <div class="col-md-2"><span data-value="" id="return-2" class="form-control open-destination" placeholder="Điểm đến">Điểm đến</span></div>
                            <div class="col-md-2"><input id="ReturnDate-1" autocomplete="off" type="text" class="form-control data-time-picker" placeholder="Hạ cánh"></div>
                            <div class="col-md-2"><span id="airline-1" data-code="" class="form-control span-airline" placeholder="Hãng">Hãng</span></div>
                            <div class="col-md-1"><input type="text" class="form-control" placeholder="Số hiệu"></div>
                            <div class="col-md-1"><input type="text" class="form-control" placeholder="PNR"></div>
                        </div>
                    </div>
                </div>
                <div class="total-price">
                    <label for="">Tổng giá</label>
                    <div>
                        <span>$</span> <input type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="customer-block">
                <div class="block-title">Thông tin hành khách</div>
                <div class="block-content">
                    <div class="row">
                        <div class="col-md-4">
                            <select name="ADT" id="" class="form-control">
                                <option value="0">ADT</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="CHD" id="" class="form-control">
                                <option value="0">CHD</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="INF" id="" class="form-control">
                                <option value="0">INF</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="customer-info">

                </div>
            </div>
            <div class="contact-block">
                <div class="block-title">
                    Thông tin liên hệ
                </div>
                <div class="block-content">
                    <div class="row">
                        <div class="col-md-3">
                            <select name="contact-gender" id="" class="contact-gender form-control">
                                <option value="0">Quý ông</option>
                                <option value="1">Quý bà</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="text" name="contact-name" placeholder="Họ tên">
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="text" name="contact-tel" placeholder="Số điện thoại">
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="text" name="contact-email" placeholder="Email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <textarea class="form-control" name="contact-note" id="" cols="30" rows="10" placeholder="Yêu cầu khác"></textarea>
                        </div>
                    </div>
                    <div>
                        <input type="checkbox" name="invoice" id="invoice"> <label for="invoice">Cần xuất hóa đơn</label>
                    </div>
                    <div class="button">
                        <button class="btn btn-primary btn-add-booking">Tạo booking</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="modal_destination" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Sân bay</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="input_id" value="">
                <div id="sub-departure-0" class="sub-search">
                    <div class="sub-search-content">
                        <div class="domestic-col">
                            <ul>
                                <li class="title"><i class="icon icon-formsearch-sub-location"></i><?php print(t($GLOBALS['string_constant'][92]))?></li>
                                <li><a airportcode="HAN"><b>Ha Noi </b><span>(HAN)</span> </a></li>
                                <li><a airportcode="HPH"><b>Hai Phong </b> <span>(HPH)</span> </a></li>
                                <li><a airportcode="DIN"><b>Dien Bien </b> <span>(DIN)</span> </a></li>
                                <li><a airportcode="THD"><b>Thanh Hoa </b> <span>(THD)</span> </a></li>
                                <li><a airportcode="VDO"><b>Quang Ninh </b> <span>(VDO)</span> </a></li>
                            </ul>
                            <ul>
                                <li class="title"><i class="icon icon-formsearch-sub-location"></i><?php print(t($GLOBALS['string_constant'][94]))?></li>
                                <li><a airportcode="VII"><b>Vinh </b> <span>(VII)</span> </a></li>
                                <li><a airportcode="HUI"><b>Hue </b> <span>(HUI)</span> </a></li>
                                <li><a airportcode="VDH"><b>Dong Hoi </b> <span>(VDH)</span> </a></li>
                                <li><a airportcode="DAD"><b>Da Nang </b> <span>(DAD)</span> </a></li>
                                <li><a airportcode="PXU"><b>Pleiku </b> <span>(PXU)</span> </a></li>
                                <li><a airportcode="TBB"><b>Tuy Hoa </b> <span>(TBB)</span> </a></li>
                            </ul>
                        </div>
                        <div class="domestic-col">
                            <ul>
                                <li class="title"><i class="icon icon-formsearch-sub-location"></i><?php print(t($GLOBALS['string_constant'][93]))?></li>
                                <li><a airportcode="SGN"><b>Ho Chi Minh </b><span>(SGN)</span> </a></li>
                                <li><a airportcode="CXR"><b>Nha Trang </b> <span>(CXR)</span> </a></li>
                                <li><a airportcode="DLI"><b>Da Lat </b> <span>(DLI)</span> </a></li>
                                <li><a airportcode="PQC"><b>Phu Quoc </b> <span>(PQC)</span> </a></li>
                                <li><a airportcode="VCL"><b>Tam Ky </b> <span>(VCL)</span> </a></li>
                                <li><a airportcode="UIH"><b>Qui Nhon </b> <span>(UIH)</span> </a></li>
                                <li><a airportcode="VCA"><b>Can Tho </b> <span>(VCA)</span> </a></li>
                                <li><a airportcode="VCS"><b>Con Dao </b> <span>(VCS)</span> </a></li>
                                <li><a airportcode="BMV"><b>Ban Me Thuot </b> <span>(BMV)</span> </a></li>
                                <li><a airportcode="VKG"><b>Rach Gia </b> <span>(VKG)</span> </a></li>
                                <li><a airportcode="CAH"><b>Ca Mau </b> <span>(CAH)</span> </a></li>
                            </ul>
                        </div>
                        <div class="domestic-col foreign">
                            <ul>
                                <li class="title"><i class="icon icon-formsearch-sub-location"></i><?php print(t($GLOBALS['string_constant'][95]))?> </li>
                                <li><a airportcode="BKK"><b>Bangkok </b><span> (BKK)</span> </a></li>
                                <li><a airportcode="SIN"><b>Singapore </b> <span>(SIN)</span> </a></li>
                                <li><a airportcode="KUL"><b>Kuala Lumpur </b> <span>(KUL)</span> </a></li>
                                <li><a airportcode="CGK"><b>Jakarta </b> <span>(CGK)</span> </a></li>
                            </ul>
                            <ul>
                                <li class="title"><i class="icon icon-formsearch-sub-location"></i><?php print(t($GLOBALS['string_constant'][96]))?></li>
                                <li><a airportcode="NRT"><b>Tokyo </b> <span>(NRT)</span> </a></li>
                                <li><a airportcode="PEK"><b>Beijing </b> <span>(PEK)</span> </a></li>
                                <li><a airportcode="CAN"><b>Guangzhou </b> <span>(CAN)</span> </a></li>
                                <li><a airportcode="ICN"><b>Seoul </b> <span>(ICN)</span> </a></li>
                                <li><a airportcode="HKG"><b>Hong Kong </b> <span>(HKG)</span> </a></li>
                            </ul>
                        </div>
                        <div class="domestic-col foreign">
                            <ul>
                                <li class="title"><i class="icon icon-formsearch-sub-location"></i><?php print(t($GLOBALS['string_constant'][97]))?> </li>
                                <li><a airportcode="FRA"><b>Frankfurt </b><span> (FRA)</span> </a></li>
                                <li><a airportcode="CDG"><b>Paris </b> <span>(CDG)</span> </a></li>
                            </ul>
                        </div>
                        <div class="domestic-col foreign">
                            <ul>
                                <li class="title"><i class="icon icon-formsearch-sub-location"></i><?php print(t($GLOBALS['string_constant'][98]))?> </li>
                                <li><a airportcode="SYD"><b>Sydney </b> <span>(SYD)</span> </a></li>
                                <li><a airportcode="MEL"><b>Melbourne </b> <span>(MEL)</span> </a></li>
                            </ul>
                        </div>
                        <div class="domestic-col domestic-col-lg">
                            <ul>
                                <li class="title"><i class="icon icon-formsearch-sub-location"></i><?php print(t($GLOBALS['string_constant'][90])) ?><p class="desc"><?php print(t($GLOBALS['string_constant'][91])) ?></p></li>
                            </ul>
                            <input class="form-control sub-search-suggest departure" type="text" id="search-departure-0" onkeyup="search_departure_keyup(this,event)">
                            <div class="loading" style="display: none;">
                                <img src="/sites/all/themes/cassiopeia_theme/img/loading.gif">
                            </div>
                            <ul class="result departure" style="max-height: 220px"></ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
$query = db_select("tbl_airlines","tbl_airlines");
$query -> fields("tbl_airlines");
$result = $query -> execute() -> fetchAll();
?>
<div id="modal_airline" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Airline</h4>
            </div>
            <div class="modal-body">
                <div>
                    <label for="airline">Mã hãng hàng không</label> <input type="text" autocomplete="off" id="airline" class="form-control">
                </div>
                <div class="list-of-airine">
                    <ul>
                        <?php if(!empty($result)): ?>
                            <?php foreach($result as $value): ?>
                                <li class="name-active" data-iata="<?php print($value->iata); ?>"><?php print($value->name); ?></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>