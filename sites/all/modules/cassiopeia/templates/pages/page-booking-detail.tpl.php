<?php
if(!empty($_REQUEST['booking_code'])){
    $booking_code = $_REQUEST['booking_code'];
}
?>

<div class="page-booking-detail">
    <div class="button-block">
        <form action="">
            <input type="text" value="" placeholder="PNR khác"> <span class="fa fa-search"></span>
        </form>
    </div>
    <div class="page-inner">
        <div class="left-block">
            <div>
                <label for="">Mã giao dịch:</label>
                <span></span>
            </div>
            <div>
                <label for="">Mã CTV:</label>
                <span></span>
            </div>
            <div>
                <label for="">Họ tên CTV:</label>
                <span></span>
            </div>
            <div>
                <label for="">Số điện thoại:</label>
                <span></span>
            </div>
            <div>
                <label for="">Email:</label>
                <span></span>
            </div>
            <div>
                <label for="">Ghi chú:</label>
                <span></span>
            </div>
        </div>
        <div class="right-block">
            <div>
                <label for="">PNR:</label>
                <span></span>
            </div>
            <div>
                <label for="">Ticket Number:</label>
                <span></span>
            </div>
            <div>
                <label for="">Trạng thái vé:</label>
                <span></span>
            </div>
            <div>
                <label for="">Ngày Book:</label>
                <span></span>
            </div>
            <div>
                <label for="">Ngày hết hạn:</label>
                <span></span>
            </div>
            <div>
                <label for="">Ngày xuất vé:</label>
                <span></span>
            </div>
            <div>
                <label for="">Booker:</label>
                <span></span>
            </div>
        </div>
    </div>
</div>