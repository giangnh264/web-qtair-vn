<?php
global $user;
if (!empty($variables['session_key'])) {
    $session_key = $variables['session_key'];
}
$query = db_select("tbl_airline_session", "tbl_airline_session");
$query->fields("tbl_airline_session");
$query->condition("id", $session_key);
$query->condition("client_ip", $_SESSION['QT-CLIENT-IP']);
$query->condition("leg", 0);
$departure_airlines = $query->execute()->fetchAll();
//_print_r($departure_airlines);
$query = db_select("tbl_airline_session", "tbl_airline_session");
$query->fields("tbl_airline_session");
$query->condition("id", $session_key);
$query->condition("leg", 1);
$query->condition("client_ip", $_SESSION['QT-CLIENT-IP']);
$return_airlines = $query->execute()->fetchAll();
?>
<div class="search-flight-block-filter your-flight">
    <div class="block-title">
        <i class="fa fa-filter"></i> Chuyến bay của bạn
    </div>
    <div class="block-items">

    </div>
</div>
<div class="search-flight-block-filter active">
    <div class="block-title">
        <i class="fa-regular fa-eye"></i> Hiển thị giá vé
    </div>
    <div class="block-items tax-fee">
        <div>
            <input id="tax-fee" checked type="radio" name="tax-fee" value="tax-fee">
            <label for="tax-fee"><span class="fake-input"></span>Đã bao gồm thuế phí</label>
        </div>
        <div>
            <input id="non-tax-fee" type="radio" name="tax-fee" value="non-tax-fee">
            <label for="non-tax-fee"><span class="fake-input"></span>Chưa thuế phí</label>
        </div>
    </div>
</div>
<div class="search-flight-block-filter search-flight-sort">
    <div class="close-form-sort d-xs">
        <span class="close"></span>
    </div>
    <div class="block-title">
        <i class="fa fa-filter"></i> Lọc chuyến bay
    </div>
    <div class="departure-block">
        <div class="block-description">
            <div class="d-flex block-items Airlines">
                <input id="departure-airline-all" checked type="checkbox" value="all">
                <label class="pd-0" for="departure-airline-all"><span class="fake-input"></span></label>
                <span>Chọn hãng <?php print(!empty($airlines_return) ? "chiều đi" : "hàng không"); ?></span>
            </div>
            <span class="fa fa-plane"></span>
        </div>
        <div class="block-items Airlines">
            <?php if (!empty($departure_airlines)) : ?>
                <?php foreach ($departure_airlines as $key => $airline) : ?>
                    <div class="block-item" data-airline="<?php print($airline->airline); ?>">
                        <input id="departure-airline-<?php print($airline->airline); ?>" checked type="checkbox" value="<?php print($airline->airline); ?>">
                        <label for="departure-airline-<?php print($airline->airline); ?>"><span class="fake-input"></span><?php print(cassiopeia_get_airline($airline->airline)->name); ?></label>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="return-block">
        <?php if (!empty($return_airlines)) : ?>
            <div class="block-description">
                <div class="d-flex block-items Airlines">
                    <input id="return-airline-all" checked type="checkbox" value="all">
                    <label class="pd-0" for="return-airline-all"><span class="fake-input"></span></label>
                    <span>Chọn hãng chiều về</span>
                </div>
                <span class="fa fa-plane"></span>
            </div>
            <div class="block-items Airlines">
                <?php foreach ($return_airlines as $key => $airline) : ?>
                    <?php if (!empty($airline)) : ?>
                        <div class="block-item" data-airline="<?php print($airline->airline); ?>">
                            <input id="return-airline-<?php print($airline->airline); ?>" checked type="checkbox" value="<?php print($airline->airline); ?>">
                            <label for="return-airline-<?php print($airline->airline); ?>"><span class="fake-input"></span><?php print(cassiopeia_get_airline($airline->airline)->name); ?></label>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
    <?php if (!empty($stop_nums)) : ?>
        <div class="departure-block">
            <div class="block-description">
                <span>Số điểm dừng</span> <i class="fa fa-map-marker"></i>
            </div>
            <div class="block-items StopNum">
                <?php if (!empty($stop_nums)) : ?>
                    <?php foreach ($stop_nums as $key => $airline) : ?>
                        <div class="block-item">
                            <input id="stop-num-<?php print($airline); ?>" checked type="checkbox" value="<?php print($key); ?>">
                            <label for="stop-num-<?php print($airline); ?>"><span class="fake-input"></span><?php print($airline); ?></label>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</div>