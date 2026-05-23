<div class="container">
    <div class="row align-center pt-10">
        <form action="" class="col-md-3 mb-10 ">
            <div class="d-flex align-center">
                <div class="mr-30">
                    <div>
                        <input onchange="this.form.submit()" type="checkbox" id="hidden-price" name="hidden-price" <?php if(isset($_REQUEST['hidden-price'])) echo "checked"; ?>> <label for="hidden-price">Ẩn giá tiền</label>
                    </div>
                    <div>
                        <input onchange="this.form.submit()" type="checkbox" id="hidden-time-limit" name="hidden-time-limit" <?php if(isset($_REQUEST['hidden-time-limit'])) echo "checked"; ?>> <label for="hidden-time-limit">Hiện thời gian giữ chỗ</label>
                    </div>
                </div>
            </div>
        </form>
        <div class="col-xs-6 col-md-3 mb-10 d-flex">
            <?php
            $block_language = module_invoke('locale', 'block_view', 'language');
            print $block_language['content'];
            ?>
        </div>
        <div class="col-xs-6 col-md-3 mb-10">
           <button class="btn-print btn"><i class="fa fa-print"></i> Print</button>
        </div>
    </div>
    <?php
    $booking_code = $variables['booking_code'];
    $query = db_select("tbl_booking","tbl_booking");
    $query -> fields("tbl_booking");
    $query -> condition("booking_code",$booking_code,"=");
    $booking = $query->execute()->fetchAssoc();
    global $user;
    if($user->uid==1){
        if($booking['DO']==1){
            echo _cassiopeia_render_theme("module", "cassiopeia", "templates/mail/booking-mail-ver-3.tpl.php", array("booking_code" => $booking_code));
        }else{
            echo _cassiopeia_render_theme("module", "cassiopeia", "templates/mail/booking-mail-international.tpl.php", array("booking_code" => $booking_code));
        }
    }else{
        if($booking['DO']==1){
            echo _cassiopeia_render_theme("module", "cassiopeia", "templates/mail/booking-mail-ver-3.tpl.php", array("booking_code" => $booking_code));
        }else{
            echo _cassiopeia_render_theme("module", "cassiopeia", "templates/mail/booking-mail-international.tpl.php", array("booking_code" => $booking_code));
        }
    }
    ?>
</div>