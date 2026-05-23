<?php //_print_r($form); ?>
<div>
    <div class="form-group-info-room">
        <div class="form-group-info-room-content">
            <div class="form-group-title info-room-title">
                <span>Hạng phòng</span>
            </div>
            <div class="form-group-wrap">
<!--                --><?php //echo(drupal_render()) ?>

                <div class="form-group">
                    <span>Số phòng</span>
                    <input type="text" value="1 phòng">
                </div>

                <div class="form-group form-group-sm">
                    <span>Ngày check in</span>
                    <div class="form-group-input">
                        <span><img src="./img/icons/icon-16.png" class="img-responsive" alt=""></span>
                        <input class="date-picker" type="text" value="19/01/2021">
                    </div>
                </div>

                <div class="form-group form-group-sm">
                    <span>Ngày check out</span>
                    <div class="form-group-input">
                        <span><img src="./img/icons/icon-16.png" class="img-responsive" alt=""></span>
                        <input class="date-picker" type="text" value="21/01/2021">
                    </div>
                </div>

                <div class="form-group form-group-sm">
                    <span>Số đêm</span>
                    <div class="form-group-input">
                        <span><img src="./img/icons/icon-17.png" class="img-responsive" alt=""></span>
                        <input type="text" value="02 đêm">
                    </div>
                </div>

                <div class="form-group form-group-sm">
                    <span>Số người lớn</span>
                    <div class="form-group-input">
                        <span><img src="./img/icons/icon-4.png" class="img-responsive" alt=""></span>
                        <input type="text" value="05 người lớn">
                    </div>
                </div>

                <div class="form-group form-group-sm">
                    <span>Số trẻ em</span>
                    <div class="form-group-input">
                        <span><img src="./img/icons/icon-18.png" class="img-responsive" alt=""></span>
                        <input type="text" value="04">
                    </div>
                </div>

                <div class="form-group form-group-sm">
                    <span>Tuổi của các bé</span>
                    <div class="form-group-input">
                        <span><img src="./img/icons/icon-18.png" class="img-responsive" alt=""></span>
                        <input type="text" value="10">
                    </div>
                </div>

            </div>
            <div class="form-group-info-room-warning">
                <span>Không được chọn phép chọn quá TỔNG SỐ LƯỢNG NGƯỜI cho phép của hạng phòng. Tối đa là 3 người.</span>
            </div>
        </div>
        <div class="form-btn-add-new-room">
            <button class="btn-oranges btn-add-form">
                <span><img src="./img/icons/icon-19.png" class="img-responsive" alt=""></span>
                <span>Thêm hạng phòng</span>
            </button>
        </div>
    </div>

    <div class="form-group-info-agency">
        <div class="form-group-info-agency-content">
            <div class="form-group-title info-agency-title">
                <span>Thông tin đại lý đặt phòng</span>
            </div>
            <div class="form-group-wrap">
                <div class="form-group form-group-sm">
                    <span>Họ và tên</span>
                    <input type="text" value="Nguyễn Lan Hương">
                </div>
                <div class="form-group form-group-sm">
                    <span>Số điện thoại</span>
                    <input type="text" value="0945 330 559">
                </div>
                <div class="form-group form-group-sm">
                    <span>Email</span>
                    <input type="text" value="nguyenhuong.23.designer@gmail.com">
                </div>
            </div>
        </div>
    </div>

    <div class="form-group-info-order">
        <div class="form-group-info-order-content">
            <div class="form-group-title info-order-title">
                <span>Thông tin đơn hàng</span>
            </div>
            <div class="form-group-wrap">
                <div class="form-group-checkbox">
                    <label>Giá phòng
                        <input type="checkbox" checked>
                        <span class="checkbox-mask"></span>
                    </label>
                    <span>5.000.000đ</span>
                </div>
                <div class="form-group-checkbox">
                    <label>Phụ thu lễ tết
                        <input type="checkbox" checked>
                        <span class="checkbox-mask"></span>
                    </label>
                    <span>200.000đ</span>
                </div>
                <div class="form-group-checkbox">
                    <label>Phụ thu trẻ em
                        <input type="checkbox" checked>
                        <span class="checkbox-mask"></span>
                    </label>
                    <span>100.000đ</span>
                </div>
                <div class="form-group-checkbox">
                    <label>Tôi muốn kê thêm giường phụ
                        <input type="checkbox">
                        <span class="checkbox-mask"></span>
                    </label>
                    <span>500.000đ</span>
                </div>
                <div class="form-group-checkbox">
                    <label>Tôi muốn lấy hoá đơn VAT
                        <input type="checkbox">
                        <span class="checkbox-mask"></span>
                    </label>
                    <span>50.000đ</span>
                </div>
            </div>
            <div class="form-group-info-order-total-price">
                <span><img src="./img/icons/icon-20.png" class="img-responsive" alt=""></span>
                <span>5.850.000đ</span>
            </div>
            <div class="form-group-info-order-request-other">
                <textarea class="request-other" placeholder="Yêu cầu của bạn"></textarea>
            </div>
        </div>
    </div>

    <div class="form-group-submit">
        <div class="form-group-submit-content">
            <div class="form-group-submit-left">
                <div class="summnary-info-order">
                    <h3>Khách sạn Mường Thanh Luxury Phú Quốc</h3>
                    <span>hạng phòng standand, check in 19/01 - check out ngày 22/01/2020 2 người lớn, 1 trẻ em</span>
                </div>
            </div>
            <div class="form-group-submit-right">
                <button type="submit" class="btn-oranges btn-submit-form">Gửi yêu cầu</button>
            </div>
        </div>
    </div>

</div>