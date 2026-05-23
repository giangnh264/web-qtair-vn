<?php
$booking_code = $variables['booking_code'];

try{
    $query = db_select("tbl_room_booking","tbl_room_booking");
    $query->fields("tbl_room_booking");
    $query->condition("tbl_room_booking.code",$booking_code);
    $query->join("node","tbl_hotel","tbl_hotel.nid=tbl_room_booking.hotel");
    $query->addField("tbl_hotel","title","hotel_title");
    $query->join("field_data_field_address","field_address","field_address.entity_id=tbl_hotel.nid");
    $query->addField("field_address","field_address_value","hotel_address");
    $result = $query->execute()->fetchObject();
//    _print_r($result);
    $query = db_select("tbl_room_booking_detail","tbl_room_booking_detail");
    $query->fields("tbl_room_booking_detail");
    $query->condition("tbl_room_booking_detail.code",$booking_code);
    $result_details = $query->execute()->fetchAll();
//    _print_r($result_details);
}catch (Exception $e){
//    _print_r($e);
}
if(!empty($result)){
    $data = new stdClass();
    $data->start_date = date("d-m-Y",$result->from_date);
    $data->end_date = date("d-m-Y",$result->to_date);
    $data->hotel = $result->hotel;
    $rooms = array();
    $index=0;
    if(!empty($result_details)){
        foreach($result_details as $detail){
            $rooms[$detail->room] = $detail->number_of_room;
            $data->room[$index]['nid'] = $detail->room;
            $data->room[$index]['quantity'] = $detail->number_of_room;
            $data->room[$index]['adult'] = $detail->adult;
            $data->room[$index]['children'] = $detail->children;
            $data->room[$index]['from_date'] = date("Y-m-d",$detail->from_date);
            $data->room[$index]['to_date'] = date("Y-m-d",$detail->to_date);
            $data->room[$index]['extraBed'] = $detail->extraBed;
            if(!empty($detail->children_age)){
                $temp = explode(",",$detail->children_age);
                for($i=1;$i<count($temp);$i++){
                    $data->room[$index]['children_age'][] = $temp[$i];
                }
            }
            $index++;
        }
    }
    $data->booking_code = $booking_code;
    $data->orderCustomerFullName = $result->customer_name;
    $data->orderContactFullName = $result->contactName;
    $data->orderContactTel = $result->contactTel;
    $data->orderContactEmail = $result->contactEmail;
    $data->VAT = $result->VAT;
    $data->extraBed = $result->extraBed;
    $data->surcharge_children = $result->surcharge_children;
    $data->surcharge_adult = $result->surcharge_adult;
    $data->surcharge_weekend = $result->surcharge_weekend;
    $data->partner_price = !empty($result->partner_price)?$result->partner_price:0;
    $data->room_code = !empty($result->room_code)?$result->room_code:"";
    $data->net_price = !empty($result->net_price)?$result->net_price:0;
    $data->note = !empty($result->note)?$result->note:"";
}
?>
<?php if(!empty($result)): ?>
    <div style="width:1024px;margin:auto">
        <div>
            <label for="" style="font-weight: bold;">Kính gửi quý khách: </label>
            <span style="text-transform: uppercase;font-weight: bold;"><?php echo $data->orderCustomerFullName; ?></span>
        </div>
        <div style="text-align: center;">
            AUTIC.vn xin được gửi lời chào đến quý khách. <br>
            Chúng tôi xin được xác nhận thông tin đặt khách sạn của quý khách như sau: <br>
            Quý khách vui lòng xuất trình xác nhận đặt khách sạn này cho lễ tân trước khi nhận phòng.
        </div>
        <div style="text-align: center;   text-transform: uppercase;   color: #ee3b3b;   font-weight: bold;   margin: 20px 0px;">
            <?php if($result->status==3): ?>
                Xác nhận đặt phòng
            <?php else: ?>
                Báo giá đặt phòng
            <?php endif; ?>
        </div>
        <div>
            <div>
                <span style="font-weight: bold;margin-bottom: 10px;">Mã đơn hàng:</span>
                <span><?php echo $data->booking_code; ?></span>
            </div>
            <div>
                <span style="font-weight: bold;margin-bottom: 10px;">Tình trạng:</span>
                <span>
                <?php
                switch ($result->status){
                    case 1: echo "Đặt chỗ" ;break;
                    case 2: echo "Báo giá" ;break;
                    case 3: echo "Hoàn thành" ;break;
                    case 4: echo "Thất bại" ;break;
                }
                ?>
            </span>
            </div>
            <?php if($result->status!=3): ?>
                <div style="font-style: italic;">
                    Quý khách vui lòng thanh toán trong vòng 01 tiếng để phòng được giữ cho quý khách bởi vì tình trạng phòng có thể thay đổi bất kỳ lúc nào
                </div>
            <?php endif; ?>
        </div>
        <div style="text-align: center;   text-transform: uppercase;   color: #ee3b3b;   font-weight: bold;   margin: 20px 0px;">Chi tiết đặt phòng</div>
        <div>
            <div style="    border-bottom: solid thin #80808057;padding-bottom: 5px;margin-bottom: 5px;">
                <span>Khách sạn:</span>
                <b><?php echo $result->hotel_title; ?></b>
            </div>
            <div style="    border-bottom: solid thin #80808057;padding-bottom: 5px;margin-bottom: 5px;">
                <span>Địa chỉ:</span>
                <span><?php echo $result->hotel_address; ?></span>
            </div>
            <div style="    border-bottom: solid thin #80808057;padding-bottom: 5px;margin-bottom: 5px;">
                <span>Mã booking:</span>
                <b><?php echo $data->room_code; ?></b>
            </div>
            <div style="    border-bottom: solid thin #80808057;padding-bottom: 5px;margin-bottom: 5px;">
                <span>Tên khách hàng:</span>
                <b><?php echo $data->orderCustomerFullName; ?></b>
            </div>
            <div style="   padding-bottom: 5px;margin-bottom: 5px;">
                <span>Số điện thoại:</span>
                <b><?php echo $data->orderContactTel; ?></b>
            </div>
        </div>
        <?php foreach($result_details as $room): ?>
            <?php $node = node_load($room->room); ?>
            <table border="1" style="width:100%;margin-bottom: 20px;">
                <tr>
                    <td style="padding: 10px;font-weight: bold;" colspan="2"><?php echo $node->title; ?></td>
                </tr>
                <tr>
                    <td style="padding:10px">Check in</td>
                    <td style="padding:10px"><?php echo date("d-m-Y",$room->from_date); ?></td>
                </tr>
                <tr>
                    <td style="padding:10px">Check out</td>
                    <td style="padding:10px"><?php echo date("d-m-Y",$room->to_date); ?></td>
                </tr>
                <tr>
                    <td style="padding:10px">Số người lớn</td>
                    <td style="padding:10px"><?php echo $room->adult; ?></td>
                </tr>
                <tr>
                    <td style="padding:10px">Số trẻ em</td>
                    <td style="padding:10px"><?php echo $room->children ?></td>
                </tr>
            </table>
        <?php endforeach; ?>
        <div>
            Lưu ý: Thời gian nhận phòng là 14:00( hoặc 15:00 với một số khách sạn) và trả phòng là 12:00(trưa). <br>
            Khách sạn có thể yêu cầu tiền cọc cho các chi phí phát sinh 1,000,000VND - 2,000,000VND/đêm, ngay khi nhận phòng và sẽ hoàn trả sau khi trả phòng<br>
            Autic.vn trân trọng cảm ơn quý khách hàng đã sử dụng dịch vụ, hân hạnh được phục vụ quý khách <br>
            trong các hành trình tiếp theo
        </div>
        <div style="text-align: center;   text-transform: uppercase;   color: #ee3b3b;   font-weight: bold;   margin: 20px 0px;">Thông tin thanh toán</div>
        <table>
            <tr>
                <td width="250px">Giá phòng:</td>
                <td><?php echo number_format($result->room_price,0,",","."); ?>đ</td>
            </tr>
            <tr>
                <td style="font-style: italic;">Phụ thu người lớn:</td>
                <td><?php echo number_format($result->surcharge_adult,0,",","."); ?>đ</td>
            </tr>
            <tr>
                <td style="font-style: italic;">Phụ thu trẻ em:</td>
                <td><?php echo number_format($result->surcharge_children,0,",","."); ?>đ</td>
            </tr>
            <tr>
                <td style="font-style: italic;">Giường phụ:</td>
                <td><?php echo number_format($result->extraBed,0,",","."); ?>đ</td>
            </tr>
            <tr>
                <td style="font-style: italic;">Giảm giá:</td>
                <td>0đ</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Tổng đơn hàng:</td>
                <td style="font-weight:bold;"><?php echo number_format($result->total_price,0,",","."); ?>đ</td>
            </tr>
            <tr style="font-weight: bold;">
                <td>Nội dung thanh toán:</td>
                <td>THANH TOÁN BOOKING MÃ <?php echo $result->code; ?></td>
            </tr>
        </table>
        <?php if($result->status!=3): ?>
            <div>
                <div style="border-bottom: solid thin #80808038;margin-top: 20px;padding-bottom: 5px;margin-bottom: 5px;">
                    TÀI KHOẢN CÁ NHÂN (Nếu Quý khách không lấy hóa đơn):
                </div>
                <div style="    background: #8080801f;
    padding: 5px;
    margin-bottom: 20px;
    font-style: italic;">
                    "TECHCOMBANK – Ngân hàng Kĩ thương Việt Nam - CN Văn Quán<br>
                    Số tài khoản: 19031675749888<br>
                    Chủ tài khoản: Ông TRẦN ĐÌNH THƯỢNG"<br>
                </div>

                <div style="border-bottom: solid thin #80808038;
    padding-bottom: 5px;
    margin-bottom: 5px;">
                    TÀI KHOẢN DOANH NGHIỆP (Nếu quý khách lấy hóa đơn)
                </div>
                <div style="    background: #8080801f;
    padding: 5px;
    margin-bottom: 20px;
    font-style: italic;">
                    "TECHCOMBANK – Ngân hàng Kĩ Thương Việt Nam – Chi nhánh Hà Tây<br>
                    Số tài khoản: 19132764141010<br>
                    Chủ tài khoản: CÔNG TY TNHH AUGROUP VIỆT NAM"<br>
                </div>
            </div>
        <?php endif; ?>

        <div style="    text-align: center;border-top: solid thin #8080802b;margin-top: 30px;padding-top: 10px;">
            Autic.vn kính chúc quý khách hàng có một chuyến đi tuyệt vời. <br>
            Chúng tôi luôn sẵn sàng phục vụ quý khách. <br>

            CÔNG TY TNHH AUGROUP VIỆT NAM <br>
            Tầng 6, Tòa nhà Asuva, Số 9A Thanh Liệt, Thanh Trì, Hà Nội <br>
            1900.888.660 - cskh@autic.vn
        </div>
    </div>
<?php endif; ?>