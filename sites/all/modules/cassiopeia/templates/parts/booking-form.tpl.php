<?php
$_search = $variables['search_info'];
$kind = !empty($variables['kind'])?$variables['kind']:"";
if(!empty($_search)){
    $start_date = $_search->DepartureDate;
    $end_date = $_search->ReturnDate;
    if(!empty($_search->ReturnDate)){
        $checkDate = $end_date;
    }else{
        $checkDate = $start_date;
    }
    $start_date = str_replace('/', '-', $start_date);
}
global $user;
$_user = user_load($user->uid);
?>
<?php
$airlines = array();
if(!empty($_SESSION['booking'])){
    foreach($_SESSION['booking'] as $Itinerary => $item){
        $Flight = $item['Flight'];
        $AirlineCode = $Flight->AirlineCode;
        $airlines[$AirlineCode] = $AirlineCode;
        $baggages[$Itinerary]['value'] = cassiopeia_get_baggage_by_airline($AirlineCode);
        $baggages[$Itinerary]['StartPoint'] = $Flight->StartPoint;
        $baggages[$Itinerary]['EndPoint'] = $Flight->EndPoint;
        $baggages[$Itinerary]['Airline'] = $AirlineCode;
        $baggages[$Itinerary]['Itinerary'] = $Itinerary;
    }
}
if(!empty($kind)){ // tạm ẩn đặt hành lý cho các chuyến quốc tế
    $baggages = array();
}

    ?>
    <form action="#" method="post" class="form-page-booking-1 <?php ?>">
        <div class="row page-booking-content-inner">
            <div class="col-md-12 page-booking-content-left">
                <form action="" method="post">
                    <div class="page-booking-content-left-container">
                        <div class="page-booking-content-left-information">
                            <h2 class="form-page-booking-1-title">Thông tin hành khách</h2>
                            <div class="page-booking-content-left-content">
                                <?php $stt=1;?>
                                <?php if(!empty($_search)): ?>
                                    <?php for($i=0;$i<$_search->Adult;$i++): ?>
                                        <div data-type="Adt" class="block-adults form-group page-booking-content-left-items">
                                            <label>Hành khách <?php print($stt); ?> (Người lớn)</label>
                                            <div class="_item">
                                                <div class="full-name form-item page-booking-content-left-item">
                                                    <input class="full_name required noVnmese" type="text" placeholder="Họ và tên (vd: Nguyen Minh An)*">
                                                    <?php if (!empty($user->uid)) : ?>
                                                        <img class="active" src="/sites/all/themes/cassiopeia_theme/img/icons/icon-contact.png" alt="">
                                                        <div class="contacts ">
                                                            <input type="hidden" name="cid">
                                                            <div>
                                                                <div class="block-title">
                                                                    <h4>Danh sách khách hàng</h4>
                                                                </div>
                                                                <div class="block-container">

                                                                </div>
                                                                <div class="block-footer">
                                                                    <button class="btn btn-primary btn-add-contact">Thêm mới</button>
                                                                    <button class="btn btn-default btn-close">Đóng</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="khtx">
                                                            <?php if (in_array("VN", $airlines)) : ?>
<!--                                                                <div class="VN"><input type="text" name="khtx_VN" class="form-control" placeholder="Thẻ KHTX VN"></div>-->
                                                            <?php endif; ?>
<!--                                                            --><?php //if (in_array("VJ", $airlines)) : ?>
<!--                                                                <div class="VJ"><input disabled readonly type="text" name="khtx_VJ" class="form-control" placeholder="Mã KHTX VJ"></div>-->
<!--                                                            --><?php //endif; ?>
<!--                                                            --><?php //if (in_array("VU", $airlines)) : ?>
<!--                                                                <div class="VJ"><input disabled readonly type="text" name="khtx_VJ" class="form-control" placeholder="Mã KHTX VJ"></div>-->
<!--                                                            --><?php //endif; ?>
                                                            <?php if(in_array("QH",$airlines)):?>
<!--                                                                <div class="QH"><input type="text" name="khtx_QH" class="form-control" placeholder="Thẻ KHTX QH"></div>-->
                                                            <?php endif;?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <?php if (!in_array("VN", $airlines)) : ?>
                                              <div class="date-of-birth form-item page-booking-content-left-item">
                                                <div class="date-of-birth-left">
                                                  <span class="icon"></span>
                                                </div>
                                                <div class="date-of-birth-right">
                                          <!--         <input readonly="readonly" type="text" class="dateTimePicker adult" placeholder="NGÀY SINH" value="<?php print(date('d/m/Y', strtotime('-12 years', strtotime(str_replace("/","-",$checkDate))+86400)-86400)); ?>"> -->                                               
                                                <input readonly="readonly" type="text" class="dateTimePicker required adult" placeholder="NGÀY SINH" value=""> 
                                                </div>
                                              </div>
                                              <?php endif; ?>
                                                <?php if (in_array("VN", $airlines)) : ?>
                                                    <div class="row vn-adult-fields">
                                                        <div class="col-md-6 date-of-birth form-item page-booking-content-left-item">
                                                            <div class="date-of-birth-left">
                                                                <span class="icon"></span>
                                                            </div>
                                                            <div class="date-of-birth-right">
                                                                <input readonly="readonly" type="text" class="dateTimePicker required adult" placeholder="NGÀY SINH *" value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 cccd-number form-item page-booking-content-left-item">
                                                            <input class="cccd-number required" type="text" inputmode="numeric" pattern="[0-9]{1,12}" maxlength="12" placeholder="Số CCCD *">
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if(!empty($baggages)): ?>
                                                    <?php foreach($baggages as $Itinerary => $baggage): ?>
                                                        <?php
                                                        $startpoint = cassiopeia_get_airport($baggage['StartPoint']);
                                                        $endpoint = cassiopeia_get_airport($baggage['EndPoint']);
                                                        ?>
                                                        <div class="baggage-item">
                                                            <div>Hành lý ký gửi: <?php print($startpoint->city); ?> <i class="fa fa-long-arrow-right"></i> <?php print($endpoint->city); ?></div>
                                                            <div>
                                                                <?php cassiopeia_render_airline_logo($baggage['Airline']); ?>
                                                                <select data-Itinerary="<?php print($baggage['Itinerary']); ?>" name="select-baggage" id="" class="form-control">
                                                                    <option value="0">Chọn hành lý ký gửi</option>
                                                                    <?php foreach($baggage['value'] as $value): ?>
                                                                        <option data-price="<?php print($value->amount); ?>" value="<?php print($value->id) ?>">Gói <?php print($value->weight); ?>kg: <?php print(number_format($value->amount,0,",",".")); ?> đ</option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
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
                                    <?php if(!empty($_search->Children)): ?>
                                        <?php for($i=0;$i<$_search->Children;$i++): ?>
                                            <div data-type="Chd" class="block-children form-group page-booking-content-left-items">
                                                <label>Hành khách <?php print($stt); ?> (Trẻ em)</label>
                                                <div class="full-name form-item page-booking-content-left-item">
                                                    <input class="full_name required noVnmese" type="text" placeholder="Họ và tên (vd: Nguyen Minh An)*">
                                                    <!--                                                <input class="last_name required"  type="text" placeholder="Tên Đệm & Tên (vd: Van A)*">-->
                                                </div>
                                                <?php //if (!in_array("VN", $airlines)) : ?>

                                                <div class="date-of-birth form-item page-booking-content-left-item">
                                                    <div class="date-of-birth-left">
                                                        <span class="icon"></span>
                                                    </div>
                                                    <div class="date-of-birth-right">
                                                    <!--    <input readonly="readonly" type="text" class="dateTimePicker children" placeholder="NGÀY SINH" value="<?php print(date('d/m/Y', strtotime('-12 years', strtotime(str_replace("/","-",$checkDate))+86400))); ?>"> -->                                                 
                                                    <input readonly="readonly" type="text" class="dateTimePicker required children" placeholder="NGÀY SINH" value="">
                                                    </div>
                                                </div>
                                                <?php //endif; ?>
                                                <?php if(!empty($baggages)): ?>
                                                    <?php foreach($baggages as $SelectValue => $baggage): ?>
                                                        <?php
                                                        $startpoint = cassiopeia_get_airport($baggage['StartPoint']);
                                                        $endpoint = cassiopeia_get_airport($baggage['EndPoint']);
                                                        ?>
                                                        <div class="baggage-item">
                                                            <div>Hành lý ký gửi: <?php print($startpoint->city); ?> <i class="fa fa-long-arrow-right"></i> <?php print($endpoint->city); ?></div>
                                                            <div>
                                                                <?php cassiopeia_render_airline_logo($baggage['Airline']); ?>
                                                                <select data-Itinerary="<?php print($baggage['Itinerary']); ?>" name="select-baggage" id="" class="form-control">
                                                                    <option value="0">Chọn hành lý ký gửi</option>
                                                                    <?php foreach($baggage['value'] as $value): ?>
                                                                        <option data-price="<?php print($value->amount); ?>" value="<?php print($value->id) ?>">Gói <?php print($value->weight); ?>kg: <?php print(number_format($value->amount,0,",",".")); ?> đ</option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
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
                                    <?php if(!empty($_search->Infant)): ?>
                                        <?php for($i=0;$i<$_search->Infant;$i++): ?>
                                            <div data-type="Inf" class="block-infants form-group page-booking-content-left-items">
                                                <label>Hành khách <?php print($stt); ?> (Em bé)</label>
                                                <div class="full-name form-item page-booking-content-left-item">
                                                    <input class="full_name required noVnmese" type="text" placeholder="Họ và tên (vd: Nguyen Minh An)*">
                                                </div>
                                                <?php //if (!in_array("VN", $airlines)) : ?>
                                                <div class="date-of-birth form-item page-booking-content-left-item">
                                                    <div class="date-of-birth-left">
                                                        <span class="icon"></span>
                                                    </div>
                                                    <div class="date-of-birth-right">
                                                    <!--    <input type="text" readonly="readonly" class="dateTimePicker infant" placeholder="NGÀY SINH" value="<?php print(date('d/m/Y', strtotime('-2 years', strtotime(str_replace("/","-",$checkDate))+86400))); ?>"> -->                                                   
                                                        <input type="text" readonly="readonly" class="dateTimePicker required infant" placeholder="NGÀY SINH" value="">
                                                    </div>
                                                </div>
                                                <?php //endif; ?>
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
                                        <div class="note">
                                            <input type="checkbox" class="note" id="note"> <label for="note">Ghi chú</label>
                                            <div>
                                                <textarea name="note" id="" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                        <div class="bill">
                                            <input type="checkbox" class="bill" id="bill"> <label for="bill">Viết hóa đơn</label>
                                            <div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="">Tên công ty:</label><input name="company_name" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">Mã số thuế:</label><input name="tax_number" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">Địa chỉ đăng ký kinh doanh:</label><input name="company_address" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">Email nhận hóa đơn:</label><input name="company_mail" type="text" class="form-control">
                                                        <div>Hóa đơn điện tử sẽ được gửi đến Email của Quý khách</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-booking-content-left-payment">
                        <div class="page-booking-content-left-payment-item-node">
                            <button class="btn-payment-method" type="button">Tiếp tục</button>
                        </div>
                        <input type="hidden" class="payment" name="payment" value="1">
                    </div>
            </div>
    </form>
    </div>
    </div>
    </form>
<?php //endif; ?>
<span hidden class="adult-max-date"><?php print(date('Y-m-d', strtotime('-12 years', strtotime(str_replace("/","-",$checkDate))+86400)-86400)); ?></span>
<span hidden class="children-min-date"><?php print(date('Y-m-d', strtotime('-12 years', strtotime(str_replace("/","-",$checkDate))+86400))); ?></span>
<span hidden class="infant-min-date"><?php print(date('Y-m-d', strtotime('-2 years', strtotime(str_replace("/","-",$checkDate))+86400))); ?></span>
<script>
    jQuery(document).ready(function(e){
        var maxAdultDate = jQuery(".adult-max-date").text();
        var minChildrenDate = jQuery(".children-min-date").text();
        var minInfantDate = jQuery(".infant-min-date").text();
        console.log(minInfantDate);
        jQuery("input.dateTimePicker.adult").datepicker({
            changeMonth: true,
            yearRange: "1930:3000",
            changeYear: true,
            // minDate: new Date(minAdultDate),
            maxDate: new Date(maxAdultDate),
            dateFormat: 'dd/mm/yy'


            // minDate: new Date('2001-12-5')
        });
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

<div id="modalCustomer" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm mới khách hàng</h4>
            </div>
            <div class="modal-body">
                <?php
                $manager_customer_form = drupal_get_form("cassiopeia_user_customer_form");
                echo drupal_render($manager_customer_form);
                ?>
            </div>
        </div>

    </div>
</div>
