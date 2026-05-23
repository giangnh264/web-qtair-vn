<?php
global $user;
$_search = $variables['search_info'];
$start_date = $_search->DepartureDate;
$end_date = $_search->ReturnDate;
$_search = $_SESSION['data-search'];
$_user = user_load($user->uid);
$booking = $_SESSION['booking'];
?>
<form action="#" method="post" class="form-page-booking-1">
    <div class="row page-booking-content-inner">
        <div class="col-md-12 page-booking-content-left">
            <form action="" method="post">
                <div class="page-booking-content-left-container">
                    <div class="page-booking-content-left-information">
                        <h2 class="form-page-booking-1-title">Thông tin hành khách</h2>
                        <div class="page-booking-content-left-content">
                            <?php $stt=1;?>
                            <?php for($i=0;$i<$_search['Adults'];$i++): ?>
                                <div data-type="Adt" class="block-adults form-group page-booking-content-left-items">
                                    <label>Hành khách <?php print($stt); ?> (Người lớn)</label>
                                    <div class="_item">
                                        <div class="full-name form-item page-booking-content-left-item">
                                            <input  class="full_name required" type="text" placeholder="Họ và tên (vd: NGUYEN MINH AN)*">
                                            <!--                                                <input  class="last_name required"  type="text" placeholder="Tên Đệm & Tên (vd: Minh An)*">-->
                                        </div>
                                        <?php if(!empty($baggages)): ?>
                                            <?php foreach($baggages as $key => $baggage): $baggage = json_decode($baggage);?>
                                                <?php if(!empty($baggage->ListBaggage)): ?>
                                                    <?php
                                                    $flight = $_SESSION['booking'][$key]['data'];
                                                    $startpoint = cassiopeia_get_airport($flight->ListFlight[0]->StartPoint);
                                                    $endpoint = cassiopeia_get_airport($flight->ListFlight[0]->EndPoint);
                                                    ?>
                                                    <div class="baggage-item">
                                                        <div>Hành lý ký gửi: <?php print($startpoint->city); ?> <i class="fa fa-long-arrow-right"></i> <?php print($endpoint->city); ?></div>
                                                        <div>
                                                            <select data-FareDataId = <?php print($_SESSION['booking'][$key]['data']->FareDataId); ?> data-session = <?php print( $_SESSION['booking'][$key]['Session']); ?> data-flight-value="<?php print($key); ?>" name="select-baggage" id="" class="form-control">
                                                            <option value="0">Chọn hành lý ký gửi</option>
                                                            <?php foreach($baggage->ListBaggage as $value): ?>
                                                                <option data-price="<?php print($value->Price); ?>" value="<?php print($value->Value) ?>">Gói <?php print($value->Value); ?>kg: <?php print(number_format($value->Price,0,",",".")); ?> đ</option>
                                                            <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        <div class="unisex form-item ">
                                            <label class="unisex-container">
                                                <input value="1" type="radio" checked="checked" name="gender_adt_<?php print($stt); ?>">
                                                <span class="checkmark">Nam</span>
                                            </label>
                                            <label class="unisex-container">
                                                <input value="0" type="radio" name="gender_adt_<?php print($stt); ?>">
                                                <span class="checkmark">Nữ</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <?php $stt++; ?>
                            <?php endfor; ?>
                            <?php if(!empty($_search['Childrens'])): ?>
                                <?php for($i=0;$i<$_search['Childrens'];$i++): ?>
                                    <div data-type="Chd" class="block-children form-group page-booking-content-left-items">
                                        <label>Hành khách <?php print($stt); ?> (Trẻ em)</label>
                                        <div class="full-name form-item page-booking-content-left-item">
                                            <input class="full_name required noVnmese" type="text" placeholder="Họ và tên (vd: Nguyen Minh An)*">
                                            <!--                                                <input class="last_name required"  type="text" placeholder="Tên Đệm & Tên (vd: Van A)*">-->
                                        </div>
                                        <div class="date-of-birth form-item page-booking-content-left-item">
                                            <div class="date-of-birth-left">
                                                <span class="icon"></span>
                                            </div>
                                            <div class="date-of-birth-right">
                                                <input type="text" class="dateTimePicker children" placeholder="NGÀY SINH" value="<?php print(date('d/m/Y', strtotime(str_replace("/","-",$start_date). ' -11 years')+86400)); ?>">
                                            </div>
                                        </div>
                                        <?php if(!empty($baggages)): ?>
                                            <?php foreach($baggages as $key => $baggage): $baggage = json_decode($baggage);?>
                                                <?php if(!empty($baggage->ListBaggage)): ?>
                                                    <?php
                                                    $flight = $_SESSION['booking'][$key]['data'];
                                                    $startpoint = cassiopeia_get_airport($flight->ListFlight[0]->StartPoint);
                                                    $endpoint = cassiopeia_get_airport($flight->ListFlight[0]->EndPoint);
                                                    ?>
                                                    <div class="baggage-item">
                                                        <div>Hành lý ký gửi: <?php print($startpoint->city); ?> <i class="fa fa-long-arrow-right"></i> <?php print($endpoint->city); ?></div>
                                                        <div>
                                                            <select data-FareDataId = <?php print($_SESSION['booking'][$key]['data']->FareDataId); ?> data-session = <?php print( $_SESSION['booking'][$key]['Session']); ?> data-flight-value="<?php print($key); ?>" name="select-baggage" id="" class="form-control">
                                                            <option value="0">Chọn hành lý ký gửi</option>
                                                            <?php foreach($baggage->ListBaggage as $value): ?>
                                                                <option value="<?php print($value->Value) ?>">Gói <?php print($value->Value); ?>kg: <?php print(number_format($value->Price,0,",",".")); ?> đ</option>
                                                            <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        <div class="unisex form-item ">
                                            <label class="unisex-container">
                                                <input value="1" type="radio" checked="checked" name="gender_chd_<?php print($stt); ?>">
                                                <span class="checkmark">Nam</span>
                                            </label>
                                            <label class="unisex-container">
                                                <input value="0" type="radio" name="gender_chd_<?php print($stt); ?>">
                                                <span class="checkmark">Nữ</span>
                                            </label>
                                        </div>
                                    </div>
                                    <?php $stt++; ?>
                                <?php endfor; ?>
                            <?php endif; ?>
                            <?php if(!empty($_search['Infants'])): ?>
                                <?php for($i=0;$i<$_search['Infants'];$i++): ?>
                                    <div data-type="Inf" class="block-infants form-group page-booking-content-left-items">
                                        <label>Hành khách <?php print($stt); ?> (Em bé)</label>
                                        <div class="full-name form-item page-booking-content-left-item">
                                            <input class="full_name required noVnmese" type="text" placeholder="Họ và tên (vd: Nguyen Minh An)*">
                                        </div>
                                        <div class="date-of-birth form-item page-booking-content-left-item">
                                            <div class="date-of-birth-left">
                                                <span class="icon"></span>
                                            </div>
                                            <div class="date-of-birth-right">
                                                <input type="text" class="dateTimePicker infant" placeholder="NGÀY SINH" value="<?php print(date('d/m/Y', strtotime(str_replace("/","-",$start_date). ' -1 year')+86400)); ?>">
                                            </div>
                                        </div>
                                        <div class="unisex form-item ">
                                            <label class="unisex-container">
                                                <input value="1" type="radio" checked="checked" name="gender_inf_<?php print($stt); ?>">
                                                <span class="checkmark">Nam</span>
                                            </label>
                                            <label class="unisex-container">
                                                <input value="0" type="radio"  name="gender_inf_<?php print($stt); ?>">
                                                <span class="checkmark">Nữ</span>
                                            </label>
                                        </div>
                                    </div>
                                    <?php $stt++; ?>
                                <?php endfor; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="page-booking-content-left-information">
                        <h2 class="form-page-booking-1-title">Thông tin liên hệ</h2>
                        <div class="page-booking-content-left-content">
                            <div data-type="Adt" class=" form-group page-booking-content-left-items">
                                <!--                                                <label>Thông tin liên hệ</label>-->
                                <div class="_item">
                                    <div class="contact-full-name form-item page-booking-content-left-item">
                                        <input value="<?php if(!empty($_user->field_account_full_name['und'][0]['value'])) print($_user->field_account_full_name['und'][0]['value']); ?>" class="required" name="" type="text" placeholder="Họ (vd: Nguyen)*">
                                    </div>
                                    <div class="contact-tel form-item page-booking-content-left-item">
                                        <input value="<?php if(!empty($_user->name)) print($_user->name); ?>" class="required" name="" type="text" placeholder="Số điện thoại *">
                                    </div>
                                    <div class="contact-email form-item page-booking-content-left-item">
                                        <input value="<?php if(!empty($_user->mail)) print($_user->mail); ?>" class="required" name="" type="text" placeholder="Email *">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-booking-content-left-payment">
                    <h2 class="form-page-booking-1-title">Phương thức thanh toán</h2>
                    <div class="page-booking-content-left-payment-container mb-24">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-payment="1" data-toggle="tab" href="#payment-tab-1">Đặt giữ chỗ</a></li>
                            <!--                                <li class=""><a data-payment="2" data-toggle="tab" href="#payment-tab-2">Tài khoản đại lý</a></li>-->
                            <!--                                <li class=""><a data-payment="3" data-toggle="tab" href="#payment-tab-3">Thanh toán online</a></li>-->
                            <!--                                <li class=""><a data-payment="4" data-toggle="tab" href="#payment-tab-4">Xuất hóa đơn</a></li>-->
                        </ul>
                        <div class="tab-content">
                            <div id="payment-tab-1" class="tab-pane fade in active">
                                <?php
                                //                                    $_banking = variable_get('bank_info', array(
                                //                                        'value' => '',
                                //                                        'format' => 'full_html'
                                //                                    ));
                                //                                    if(!empty($_banking['value'])) print($_banking['value']);
                                //                                    ?>
                            </div>
                            <div id="payment-tab-2" class="tab-pane fade">
                            </div>
                            <div id="payment-tab-3" class="tab-pane fade">
                            </div>
                            <div id="payment-tab-4" class="tab-pane fade">
                            </div>
                        </div>
                    </div>
                    <div class="page-booking-content-left-payment-item-node">
                        <button class="btn-reset mr-24">Quay lại</button>
                        <button class="btn-payment" type="button">Tiếp tục</button>
                    </div>
                    <input type="hidden" class="payment" name="payment" value="1">
                </div>
        </div>
</form>
<span hidden class="children-min-date"><?php print(date('Y-m-d',strtotime(date("Y-m-d", REQUEST_TIME) . " - 12 years"))); ?></span>
<span hidden class="infant-min-date"><?php print(date('Y-m-d',strtotime(date("Y-m-d", REQUEST_TIME) . " - 2 years"))); ?></span>
<script>
    jQuery(document).ready(function(e){
        var minChildrenDate = jQuery(".children-min-date").text();
        var minInfantDate = jQuery(".infant-min-date").text();
        console.log(minInfantDate);
        jQuery("input.dateTimePicker.children").datepicker({
            changeMonth: true,
            yearRange: "1950:3000",
            changeYear: true,
            minDate: new Date(minChildrenDate),
            maxDate: new Date(minInfantDate),
            dateFormat: 'dd/mm/yy'

            // minDate: new Date('2001-12-5')
        });
        jQuery("input.dateTimePicker.infant").datepicker({
            changeMonth: true,
            yearRange: "1950:3000",
            changeYear: true,
            minDate: new Date(minInfantDate),
            maxDate: new Date(),
            dateFormat: 'dd/mm/yy'

            // minDate: new Date('2001-12-5')
        });
    });
</script>
