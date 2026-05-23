<?php
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/flight-search.js', ['weight' => 1000]);
//print_r($_SESSION['booking']);
//print_r($_SESSION);
$_search = $_SESSION['search_data'];
//print_r($_search);
if(!empty($_REQUEST)){
//    print_r($_REQUEST);
}
?>
<div class="page-booking page-flight-search ">
    <div class="page-top-block">
        <div class="step">
            <div class="active">
                <i class="fa fa-plane"></i> <?php print(t("Choose a flight")); ?>
            </div>
            <div class="active">
                <img src="/sites/all/themes/cassiopeia_theme/img/icons/chair.png" alt="">&nbsp;<?php print(t("Booking")); ?>
            </div>
            <div>
                <?php print(t("Finish")); ?>
            </div>
        </div>
    </div>
    <div class="container page-booking-container">
        <div class="page-booking-container-inner">
            <div class="page-booking-top">
                <div class="page-booking-top-title">
                    <h2>Chuyến bay của bạn đã lựa chọn</h2>
                </div>
                <div class="page-booking-top-items flights" id="list-of-flight">
                    <?php if(!empty($_SESSION['booking'])): ?>
                        <?php foreach($_SESSION['booking'] as $key => $value): ?>
                            <?php
                                $item = $value['data'];
                                $Session = $value['Session'];
                            ?>
                            <div data-item='' class="item" data-startdate="<?php print(strtotime($item->ListFlight[0]->StartDate)); ?>" data-idata="<?php if(!empty($airline)) print($airline->iata); ?>" data-class="<?php print($item->ListFlight[0]->GroupClass); ?>" data-price="<?php print($item->FeeAdt); ?>">
                                <?php
                                $airline = cassiopeia_get_airline($item->Airline);
                                ?>
                                <div class="logo">
                                    <?php cassiopeia_render_airline_logo($airline->iata); ?>
                                </div>
                                <div class="airline">
                                    <?php if(!empty($airline)) print($airline->name); ?>
                                </div>
                                <div class="startpoint">
                                    <div>
                                        <?php  print(date("H:i",strtotime($item->ListFlight[0]->StartDate))); ?>
                                    </div>
                                    <div>
                                        <?php
                                        $startpoint = cassiopeia_get_airport($item->ListFlight[0]->StartPoint);
                                        if(!empty($startpoint)) print($startpoint->city); print("(".$item->ListFlight[0]->StartPoint.")");
                                        ?>
                                    </div>
                                </div>
                                <div class="between">
                                    <?php if(count($item->ListFlight[0]->ListSegment)<2): ?>
                                        <div>Bay thẳng</div>
                                        <div></div>
                                    <?php else: ?>

                                    <?php endif; ?>
                                </div>
                                <div class="endpoint">
                                    <div>
                                        <?php  print(date("H:i",strtotime($item->ListFlight[0]->EndDate))); ?>
                                    </div>
                                    <div>
                                        <?php
                                        $endpoint = cassiopeia_get_airport($item->ListFlight[0]->EndPoint);
                                        if(!empty($endpoint)) print($endpoint->city); print("(".$item->ListFlight[0]->EndPoint.")");
                                        ?>
                                    </div>
                                </div>
                                <div class="view-detail" >
                                    <span data-Session="<?php print($Session); ?>" data-FareDataId="<?php print($item->FareDataId); ?>" data-FlightValue="<?php print($item->ListFlight[0]->FlightValue); ?>" class="btn-view-detail"><?php print(t("Xem chi tiết")); ?></span>
                                </div>
                                <div class="price">
                                    <?php print(number_format($item->FeeAdt,0,",",".")); ?> đ
                                </div>
                                <div class="detail">
                                    <div class="block-container">
                                        <div>
                                            <div class="airline-icon">

                                            </div>
                                            <div class="airline-class">
                                                <div>Hãng bay: <?php if(!empty($airline)) print($airline->iata); ?> </div>
                                                <div>Loại vé: <?php print($item->ListFlight[0]->GroupClass); ?></div>
                                            </div>
                                            <div class="detail-start-point">
                                                <div><?php if(!empty($startpoint)) print($startpoint->city); print("(".$item->ListFlight[0]->StartPoint.")"); ?></div>
                                                <div><img src="/sites/all/themes/cassiopeia_theme/img/icons/clock-1.png" alt=""> <?php  print(date("H:i, d/m/Y",strtotime($item->ListFlight[0]->StartDate))); ?></div>
                                                <div><img src="/sites/all/themes/cassiopeia_theme/img/icons/plane-1.png" alt=""></div>
                                            </div>
                                            <div class="detail-fly-time">
                                                <div>
                                                    <?php
                                                    $datetime1 = new DateTime(date("Y-m-d H:i:s",strtotime($item->ListFlight[0]->EndDate)));
                                                    $datetime2 = new DateTime(date("Y-m-d H:i:s",strtotime($item->ListFlight[0]->StartDate)));
                                                    $interval = $datetime1->diff($datetime2);
                                                    $elapsed = $interval->format('%h:%i ');
                                                    echo $elapsed;
                                                    ?>
                                                </div>
                                                <div><img src="/sites/all/themes/cassiopeia_theme/img/icons/plane-1.png" alt=""></div>
                                            </div>
                                            <div class="detail-end-point">
                                                <div><?php if(!empty($endpoint)) print($endpoint->city); print("(".$item->ListFlight[0]->EndPoint.")"); ?></div>
                                                <div><img src="/sites/all/themes/cassiopeia_theme/img/icons/clock-1.png" alt=""> <?php  print(date("H:i, d/m/Y",strtotime($item->ListFlight[0]->EndDate))); ?></div>
                                                <div><img src="/sites/all/themes/cassiopeia_theme/img/icons/plane-1.png" alt=""></div>
                                            </div>
                                        </div>
                                        <div class="fare-rules">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="page-booking-content">
                <form action="#" method="post" class="form-page-booking-1">
                    <div class="row page-booking-content-inner">
                        <div class="col-md-9 page-booking-content-left">
                            <form action="" method="post">
                                <div class="page-booking-content-left-container">
                                    <div class="page-booking-content-left-information">
                                        <h2 class="form-page-booking-1-title">Thông tin liên hệ</h2>
                                        <div class="page-booking-content-left-content">
                                            <div data-type="Adt" class=" form-group page-booking-content-left-items">
<!--                                                <label>Thông tin liên hệ</label>-->
                                                <div class="_item">
                                                    <div class="contact-gender unisex form-item ">
                                                        <label class="unisex-container">
                                                            <input value="1" type="radio" checked="checked" name="contact_gender">
                                                            <span class="checkmark">Nam</span>
                                                        </label>
                                                        <label class="unisex-container">
                                                            <input value="0" type="radio" name="contact_gender">
                                                            <span class="checkmark">Nữ</span>
                                                        </label>
                                                    </div>
                                                    <div class="contact-first-name form-item page-booking-content-left-item">
                                                        <input class="required" name="" type="text" placeholder="Họ (vd: Nguyen)*">
                                                    </div>
                                                    <div class="contact-last-name form-item page-booking-content-left-item">
                                                        <input class="required" name="" type="text" placeholder="Tên Đệm & Tên (vd: Van A)*">
                                                    </div>
                                                    <div class="contact-tel form-item page-booking-content-left-item">
                                                        <input class="required" name="" type="text" placeholder="Số điện thoại *">
                                                    </div>
                                                    <div class="contact-email form-item page-booking-content-left-item">
                                                        <input class="required" name="" type="text" placeholder="Email *">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="page-booking-content-left-information">
                                        <h2 class="form-page-booking-1-title">Thông tin khách hàng</h2>
                                        <div class="page-booking-content-left-content">
                                            <?php $stt=1;?>
                                            <?php for($i=0;$i<$_search->Adt;$i++): ?>
                                                <div data-type="Adt" class="block-adults form-group page-booking-content-left-items">
                                                    <label>Khánh hàng <?php print($stt); ?> (Người lớn)</label>
                                                    <div class="_item">
                                                        <div class="full-name form-item page-booking-content-left-item">
                                                            <input  class="first_name required" type="text" placeholder="Họ (vd: Nguyen)*">
                                                            <input  class="last_name required"  type="text" placeholder="Tên Đệm & Tên (vd: Van A)*">
                                                        </div>
                                                        <div class="date-of-birth form-item page-booking-content-left-item">
                                                            <div class="date-of-birth-left">
                                                                <span class="icon"></span>
                                                            </div>
                                                            <div class="date-of-birth-right">
                                                                <select class="class-day" name="birth_day_adt_<?php print($stt); ?>">
                                                                    <?php for($j=1;$j<=31;$j++): ?>
                                                                        <option value="<?php print($j); ?>"><?php print($j<10?"".$j:$j); ?></option>
                                                                    <?php endfor; ?>
                                                                </select>
                                                                <select class="class-month" name="birth_month_adt_<?php print($stt); ?>">
                                                                    <?php for($j=1;$j<=12;$j++): ?>
                                                                        <option value="<?php print($j); ?>"><?php print($j<10?"".$j:$j); ?></option>
                                                                    <?php endfor; ?>
                                                                </select>
                                                                <select class="class-year" name="birth_year_adt_<?php print($stt); ?>">
                                                                    <?php for($j=date("Y",REQUEST_TIME)-12;$j>=1920;$j--): ?>
                                                                        <option value="<?php print($j); ?>"><?php print($j<10?"".$j:$j); ?></option>
                                                                    <?php endfor; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="detail form-item page-booking-content-left-item">
                                                            <input name="baggage_adt_<?php print($stt); ?>" type="text" placeholder="Không thêm hành lý chiều đi">
                                                        </div>
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
                                            <?php if(!empty($_search->Chd)): ?>
                                                <?php for($i=0;$i<$_search->Chd;$i++): ?>
                                                    <div data-type="Chd" class="block-children form-group page-booking-content-left-items">
                                                        <label>Khánh hàng <?php print($stt); ?> (Trẻ em)</label>
                                                        <div class="full-name form-item page-booking-content-left-item">
                                                            <input class="first_name required" type="text" placeholder="Họ (vd: Nguyen)*">
                                                            <input class="last_name required"  type="text" placeholder="Tên Đệm & Tên (vd: Van A)*">
                                                        </div>
                                                        <div class="date-of-birth form-item page-booking-content-left-item">
                                                            <div class="date-of-birth-left">
                                                                <span class="icon"></span>
                                                            </div>
                                                            <div class="date-of-birth-right">
                                                                <select class="class-day" name="birth_day_chd_<?php print($stt); ?>">
                                                                    <?php for($j=1;$j<=31;$j++): ?>
                                                                        <option value="<?php print($j); ?>"><?php print($j<10?"".$j:$j); ?></option>
                                                                    <?php endfor; ?>
                                                                </select>
                                                                <select class="class-month" name="birth_month_chd_<?php print($stt); ?>">
                                                                    <?php for($j=1;$j<=12;$j++): ?>
                                                                        <option value="<?php print($j); ?>"><?php print($j<10?"".$j:$j); ?></option>
                                                                    <?php endfor; ?>
                                                                </select>
                                                                <select  class="class-year" name="birth_year_chd_<?php print($stt); ?>">
                                                                    <?php for($j=date("Y",REQUEST_TIME);$j>=date("Y",REQUEST_TIME)-12;$j--): ?>
                                                                        <option value="<?php print($j); ?>"><?php print($j<10?"".$j:$j); ?></option>
                                                                    <?php endfor; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="detail form-item page-booking-content-left-item">
                                                            <input name="baggage_chd_<?php print($stt); ?>" type="text" placeholder="Không thêm hành lý chiều đi">
                                                        </div>
                                                        <div class="unisex form-item ">
                                                            <label class="unisex-container">
                                                                <input type="radio" checked="checked" name="gender_chd_<?php print($stt); ?>">
                                                                <span class="checkmark">Nam</span>
                                                            </label>
                                                            <label class="unisex-container">
                                                                <input type="radio" name="gender_chd_<?php print($stt); ?>">
                                                                <span class="checkmark">Nữ</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <?php $stt++; ?>
                                                <?php endfor; ?>
                                            <?php endif; ?>
                                            <?php if(!empty($_search->Inf)): ?>
                                                <?php for($i=0;$i<$_search->Inf;$i++): ?>
                                                    <div data-type="Inf" class="block-infants form-group page-booking-content-left-items">
                                                        <label>Khánh hàng <?php print($stt); ?> (Em bé)</label>
                                                        <div class="full-name form-item page-booking-content-left-item">
                                                            <input class="first_name required" type="text" placeholder="Họ (vd: Nguyen)*">
                                                            <input class="last_name required"  type="text" placeholder="Tên Đệm & Tên (vd: Van A)*">
                                                        </div>
                                                        <div class="date-of-birth form-item page-booking-content-left-item">
                                                            <div class="date-of-birth-left">
                                                                <span class="icon"></span>
                                                            </div>
                                                            <div class="date-of-birth-right">
                                                                <select class="class-day" name="birth_day_inf_<?php print($stt); ?>">
                                                                    <?php for($j=1;$j<=31;$j++): ?>
                                                                        <option value="<?php print($j); ?>"><?php print($j<10?"".$j:$j); ?></option>
                                                                    <?php endfor; ?>
                                                                </select>
                                                                <select class="class-month" name="birth_month_inf_<?php print($stt); ?>">
                                                                    <?php for($j=1;$j<=12;$j++): ?>
                                                                        <option value="<?php print($j); ?>"><?php print($j<10?"".$j:$j); ?></option>
                                                                    <?php endfor; ?>
                                                                </select>
                                                                <select class="class-year" name="birth_year_inf_<?php print($stt); ?>">
                                                                    <?php for($j=date("Y",REQUEST_TIME);$j>=date("Y",REQUEST_TIME)-2;$j--): ?>
                                                                        <option value="<?php print($j); ?>"><?php print($j<10?"".$j:$j); ?></option>
                                                                    <?php endfor; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="detail form-item page-booking-content-left-item">
                                                            <input name="baggage_inf_<?php print($stt); ?>" type="text" placeholder="Không thêm hành lý chiều đi">
                                                        </div>
                                                        <div class="unisex form-item ">
                                                            <label class="unisex-container">
                                                                <input type="radio" checked="checked" name="gender_inf_<?php print($stt); ?>">
                                                                <span class="checkmark">Nam</span>
                                                            </label>
                                                            <label class="unisex-container">
                                                                <input type="radio"  name="gender_inf_<?php print($stt); ?>">
                                                                <span class="checkmark">Nữ</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <?php $stt++; ?>
                                                <?php endfor; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="page-booking-content-left-payment">
                                        <h2 class="form-page-booking-1-title">Phương thức thanh toán</h2>
                                        <div class="page-booking-content-left-payment-container">
                                            <div class="page-booking-content-left-payment-item">
                                                <div class="page-booking-content-left-payment-item-title">
                                                    <span class="fa fa-check-circle"></span>
                                                    <span>Tài khoản của CTV</span>
                                                </div>
                                                <div class="page-booking-content-left-payment-item-content">
                                                    <div class="page-booking-content-left-payment-item-line">
                                                        <h4>Chủ tài khoản</h4>
                                                        <div class="text">
                                                            <span>Nguyễn Văn C</span>
                                                        </div>
                                                    </div>
                                                    <div class="page-booking-content-left-payment-item-line">
                                                        <h4>Địa chỉ Email</h4>
                                                        <div class="text">
                                                            <span>NguyenvanC@gmail.com</span>
                                                        </div>
                                                    </div>
                                                    <div class="page-booking-content-left-payment-item-line">
                                                        <h4>Giá trị đơn hàng</h4>
                                                        <div class="text">
                                                            <span>1.606.000 ₫</span>
                                                        </div>
                                                    </div>
                                                    <div class="page-booking-content-left-payment-item-line">
                                                        <h4>Số dư khả dụng</h4>
                                                        <div class="text">
                                                            <span>100.606.000 ₫</span>
                                                        </div>
                                                    </div>
                                                    <div class="page-booking-content-left-payment-item-node">
                                                        <button class="btn-payment" type="button">Đồng ý thanh toán</button>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="page-booking-content-left-payment-item">
                                                <div class="page-booking-content-left-payment-item-title">
                                                    <span class="fa fa-check-circle"></span>
                                                    <span>Chuyển khoản</span>
                                                </div>
                                                <div class="page-booking-content-left-payment-item-content">
                                                    <div class="page-booking-content-left-payment-item-line">
                                                        <h4>Chủ tài khoản</h4>
                                                        <div class="text">
                                                            <span>Nguyễn Văn C</span>
                                                        </div>
                                                    </div>
                                                    <div class="page-booking-content-left-payment-item-line">
                                                        <h4>Địa chỉ Email</h4>
                                                        <div class="text">
                                                            <span>NguyenvanC@gmail.com</span>
                                                        </div>
                                                    </div>
                                                    <div class="page-booking-content-left-payment-item-line">
                                                        <h4>Giá trị đơn hàng</h4>
                                                        <div class="text">
                                                            <span>1.606.000 ₫</span>
                                                        </div>
                                                    </div>
                                                    <div class="page-booking-content-left-payment-item-line">
                                                        <h4>Số dư khả dụng</h4>
                                                        <div class="text">
                                                            <span>100.606.000 ₫</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="page-booking-content-left-payment-item">
                                                <div class="page-booking-content-left-payment-item-title">
                                                    <span class="fa fa-check-circle"></span>
                                                    <span>Thanh toán online</span>
                                                </div>
                                                <div class="page-booking-content-left-payment-item-content">
                                                    <div class="page-booking-content-left-payment-item-line">
                                                        <h4>Chủ tài khoản</h4>
                                                        <div class="text">
                                                            <span>Nguyễn Văn C</span>
                                                        </div>
                                                    </div>
                                                    <div class="page-booking-content-left-payment-item-line">
                                                        <h4>Địa chỉ Email</h4>
                                                        <div class="text">
                                                            <span>NguyenvanC@gmail.com</span>
                                                        </div>
                                                    </div>
                                                    <div class="page-booking-content-left-payment-item-line">
                                                        <h4>Giá trị đơn hàng</h4>
                                                        <div class="text">
                                                            <span>1.606.000 ₫</span>
                                                        </div>
                                                    </div>
                                                    <div class="page-booking-content-left-payment-item-line">
                                                        <h4>Số dư khả dụng</h4>
                                                        <div class="text">
                                                            <span>100.606.000 ₫</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                            </div>
                        </div>
                        <div class="col-md-3 page-booking-content-right">
                            <div class="page-booking-content-right-container">
                                <?php if(!empty($_SESSION['booking'])): ?>
                                    <?php foreach($_SESSION['booking'] as $key => $value): ?>
                                        <?php
                                        $item = $value['data'];
                                        $Session = $value['Session'];
//                                        print_r($item);
                                        ?>
                                        <div class="page-booking-content-right-block">
                                            <div class="page-booking-content-right-block-title">
                                                <h3><?php if(!empty($startpoint)) print($startpoint->city); print("(".$item->ListFlight[0]->StartPoint.")"); ?> đến <?php  if(!empty($endpoint)) print($endpoint->city); print("(".$item->ListFlight[0]->EndPoint.")"); ?></h3>
                                            </div>
                                            <div class="page-booking-content-right-block-item item-1">
                                                <div class="icon">
                                                    <img src="public/img/icon-002.png" alt="">
                                                </div>
                                                <div class="text">
                                                    <span><?php if(!empty($airline)) print($airline->name); ?></span>
                                                    <span>Loại vé: <?php print($item->ListFlight[0]->GroupClass); ?></span>
                                                </div>
                                            </div>
                                            <div class="page-booking-content-right-block-item">
                                                <div class="date-time">
                                                    <span class="time"><?php  print(date("H:i",strtotime($item->ListFlight[0]->StartDate))); ?></span>,
                                                    <span class="date"><?php  print(date("d/m/Y",strtotime($item->ListFlight[0]->StartDate))); ?></span>
                                                </div>
                                                <div class="name">
                                                    <span>Sân bay Hà Nội</span>
                                                </div>
                                            </div>
                                            <div class="page-booking-content-right-block-item">
                                                <div class="date-time">
                                                    <span class="time"><?php  print(date("H:i",strtotime($item->ListFlight[0]->EndDate))); ?></span>
                                                    <span class="date"><?php  print(date(" d/m/Y",strtotime($item->ListFlight[0]->EndDate))); ?></span>
                                                </div>
                                                <div class="name">
                                                    <span>Sân bay Hồ Chí Minh</span>
                                                </div>
                                            </div>
                                            <div class="page-booking-content-right-block-item">
                                                <span>Giá vé: 380.000đ</span>
                                            </div>
                                            <div class="page-booking-content-right-block-item">
                                                <span>Số lượng: 03</span>
                                            </div>
                                            <div class="page-booking-content-right-block-item">
                                                <span>Thuế và phụ phí: 1.226.000 ₫</span>
                                            </div>
                                            <div class="page-booking-content-right-block-item">
                                                <span>Hành lý: 0 ₫</span>
                                            </div>
                                            <div class="page-booking-content-right-block-item-total">
                                                <span>Tổng cộng:</span>
                                                <span class="price">1.000.000 ₫</span>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>