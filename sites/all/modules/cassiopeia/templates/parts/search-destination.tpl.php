<?php
$departure = $variables['departure'];
?>
<div class="sub-search-content <?php print($departure==1?"departure-choose":"return-choose"); ?>">
    <div class="suggest-airport-title">
        <div class="c-primary">
            <i class="fa fa-map-marker" aria-hidden="true"></i><?php print($departure==1?"Chọn điểm đi":"Chọn điểm đến"); ?>
        </div>
        <button type="button" class="btn-close suggest-close"><i class="fa fa-times"></i></button>
    </div>

    <div class="suggest-airport-input">
        <input 
            autocomplete="off" 
            class="form-control sub-search-suggest departure" 
            type="text" id="search-departure-0"
            placeholder="<?php print(t($GLOBALS['string_constant'][91])) ?>"
            onkeyup="search_departure_keyup(this,event)"
        >
        <ul class="result departure select-departure" style="max-height: 220px"></ul>
    </div>

    <div class="suggest-airport-links">
        <ul class="nav nav-tabs" id="<?php print($departure==1?"departure-choose":"return-choose"); ?>" role="tablist">
            <li class="nav-item active">
                <a 
                    class="nav-link" 
                    data-toggle="tab" 
                    href="<?php print($departure==1?"#departure-choose-domestic":"#return-choose-domestic"); ?>" 
                    role="tab" aria-controls="home" 
                    aria-selected="true"
                >
                    Việt Nam
                </a>
            </li>
            <li class="nav-item">
                <a 
                    class="nav-link" 
                    data-toggle="tab" 
                    href="<?php print($departure==1?"#departure-choose-foreign-95":"#return-choose-foreign-95"); ?>" 
                    role="tab" 
                    aria-controls="profile" 
                    aria-selected="false"
                >
                    <?php print(t($GLOBALS['string_constant'][95]))?>
                </a>
            </li>
            <li class="nav-item">
                <a 
                    class="nav-link" 
                    data-toggle="tab" 
                    href="<?php print($departure==1?"#departure-choose-foreign-96":"#return-choose-foreign-96"); ?>" 
                    role="tab" 
                    aria-controls="contact" 
                    aria-selected="false"
                >
                    <?php print(t($GLOBALS['string_constant'][96]))?>
                </a>
            </li>
            <li class="nav-item">
                <a 
                    class="nav-link" 
                    data-toggle="tab" 
                    href="<?php print($departure==1?"#departure-choose-foreign-97":"#return-choose-foreign-97"); ?>" 
                    role="tab" 
                    aria-controls="contact" 
                    aria-selected="false"
                >
                    <?php print(t($GLOBALS['string_constant'][97]))?>
                </a>
            </li>
            <li class="nav-item">
                <a 
                    class="nav-link" 
                    data-toggle="tab" 
                    href="<?php print($departure==1?"#departure-choose-foreign-98":"#return-choose-foreign-98"); ?>" 
                    role="tab" 
                    aria-controls="contact" 
                    aria-selected="false"
                >
                    <?php print(t($GLOBALS['string_constant'][98]))?>
                </a>
            </li>
        </ul>
    </div>

    <div class="suggest-airport-list">
        <div class="tab-content" id="suggest-airport-content">
            <div class="tab-pane fade active in" id="<?php print($departure==1?"departure-choose-domestic":"return-choose-domestic"); ?>" role="tabpanel" aria-labelledby="domestic-tab">
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
            <div class="tab-pane fade" id="<?php print($departure==1?"departure-choose-foreign-95":"return-choose-foreign-95"); ?>" role="tabpanel" aria-labelledby="profile-tab">
                <div class="airport">
                    <ul>
                        <li><a airportcode="BKK"><b>Bangkok </b><span> (BKK)</span> </a></li>
                        <li><a airportcode="SIN"><b>Singapore </b> <span>(SIN)</span> </a></li>
                        <li><a airportcode="KUL"><b>Kuala Lumpur </b> <span>(KUL)</span> </a></li>
                        <li><a airportcode="DPS"><b>Bali </b> <span>(DPS)</span> </a></li>
                        <li><a airportcode="SAI"><b>Siem Reap </b> <span>(SAI)</span> </a></li>
                    </ul>
                </div>
            </div>
            <div class="tab-pane fade" id="<?php print($departure==1?"departure-choose-foreign-96":"return-choose-foreign-96"); ?>" role="tabpanel" aria-labelledby="contact-tab">
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
            <div class="tab-pane fade" id="<?php print($departure==1?"departure-choose-foreign-97":"return-choose-foreign-97"); ?>" role="tabpanel" aria-labelledby="contact-tab">
                <div class="airport">
                    <ul>
                        <li><a airportcode="FRA"><b>Frankfurt </b><span> (FRA)</span> </a></li>
                        <li><a airportcode="CDG"><b>Paris </b> <span>(CDG)</span> </a></li>
                    </ul>
                </div>
            </div>
            <div class="tab-pane fade" id="<?php print($departure==1?"departure-choose-foreign-98":"return-choose-foreign-98"); ?>" role="tabpanel" aria-labelledby="contact-tab">
                <div class="airport">
                    <ul>
                        <li><a airportcode="SYD"><b>Sydney </b> <span>(SYD)</span> </a></li>
                        <li><a airportcode="MEL"><b>Melbourne </b> <span>(MEL)</span> </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="domestic-col">
        <ul>
            <li class="title"><i class="icon icon-formsearch-sub-location"></i><?php print(t($GLOBALS['string_constant'][92]))?></li>
            <li><a airportcode="HAN"><b>Hà Nội </b><span>(HAN)</span> </a></li>
            <li><a airportcode="HPH"><b>Hải Phòng </b> <span>(HPH)</span> </a></li>
            <li><a airportcode="DIN"><b>Điện Biên </b> <span>(DIN)</span> </a></li>
            <li><a airportcode="VDO"><b>Vân Đồn </b> <span>(VDO)</span> </a></li>
        </ul>
        <ul>
            <li class="title"><i class="icon icon-formsearch-sub-location"></i><?php print(t($GLOBALS['string_constant'][93]))?></li>
            <li><a airportcode="SGN"><b>Hồ Chí Minh </b><span>(SGN)</span> </a></li>
            <li><a airportcode="PQC"><b>Phú Quốc </b> <span>(PQC)</span> </a></li>
            <li><a airportcode="VCS"><b>Côn Đảo </b> <span>(VCS)</span> </a></li>
            <li><a airportcode="VCA"><b>Cần Thơ </b> <span>(VCA)</span> </a></li>
            <li><a airportcode="CAH"><b>Cà Mau </b> <span>(CAH)</span> </a></li>
            <li><a airportcode="VKG"><b>Rạch Giá </b> <span>(VKG)</span> </a></li>
        </ul>
    </div>
    <div class="domestic-col">
        <ul>
            <li class="title"><i class="icon icon-formsearch-sub-location"></i><?php print(t($GLOBALS['string_constant'][94]))?></li>
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
    <div class="domestic-col foreign">
        <ul>
            <li class="title"><i class="icon icon-formsearch-sub-location"></i><?php print(t($GLOBALS['string_constant'][95]))?> </li>
            <li><a airportcode="BKK"><b>Bangkok </b><span> (BKK)</span> </a></li>
            <li><a airportcode="SIN"><b>Singapore </b> <span>(SIN)</span> </a></li>
            <li><a airportcode="KUL"><b>Kuala Lumpur </b> <span>(KUL)</span> </a></li>
            <li><a airportcode="DPS"><b>Bali </b> <span>(DPS)</span> </a></li>
        </ul>
        <ul>
            <li class="title"><i class="icon icon-formsearch-sub-location"></i><?php print(t($GLOBALS['string_constant'][96]))?></li>
            <li><a airportcode="NRT"><b>Tokyo </b> <span>(NRT)</span> </a></li>
            <li><a airportcode="PEK"><b>Beijing </b> <span>(PEK)</span> </a></li>
            <li><a airportcode="CAN"><b>Guangzhou </b> <span>(CAN)</span> </a></li>
            <li><a airportcode="ICN"><b>Seoul </b> <span>(ICN)</span> </a></li>
            <li><a airportcode="HKG"><b>Hong Kong </b> <span>(HKG)</span> </a></li>
            <li><a airportcode="TPE"><b>Taoyuan </b> <span>(TPE)</span> </a></li>
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
        <input autocomplete="off" class="form-control sub-search-suggest departure" type="text" id="search-departure-0" onkeyup="search_departure_keyup(this,event)">
        <div class="loading" style="display: none;">
            <img src="/sites/all/themes/cassiopeia_theme/img/loading.gif">
        </div>
        <ul class="result departure select-departure" style="max-height: 220px"></ul>
    </div>
    <div class="clearfix"></div> -->
</div>