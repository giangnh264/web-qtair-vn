<?php
global $user;
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/ticket-review.js', ['weight' => 1000]);
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/ticket-issue.js', ['weight' => 1000]);
drupal_add_js("https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js", ['weight' => 1000]);
drupal_add_css("https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css", ['weight' => 1000]);
$caches = !empty($_REQUEST['data'])?$_REQUEST['data']:null;
$caches['redirect'] = "admin/manager/add-segment";
$caches['isReview'] = false;
$flagVN = true;
$_total_price = 0;
$_SESSION[strtoupper(trim($_REQUEST['data']['code'])).'-count_leg'] = null;
$_SESSION[strtoupper(trim($_REQUEST['data']['code'])).'-count_adult'] = null;
$_SESSION[strtoupper(trim($_REQUEST['data']['code'])).'-total_price'] = null;
$_SESSION[strtoupper(trim($_REQUEST['data']['code'])).'-Airline'] = null;
$_SESSION[strtoupper(trim($_REQUEST['data']['code'])).'-PNR'] = null;
?>
<style type="text/css">
    button#edit-submit span {
        display: none;
    }
</style>
<div class="manager-links-tabs">
    <div class="manager-links-tabs-content">
        <ul class="nav">
            <li class="ticket-booking active">
                <a href="javascript:;">
                    <span>Thêm hành trình</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="page-manager-ticket-review">
    <div class="pnr-form">
        <div class="note" style="color: red;
font-weight: bold;
margin-bottom: 10px;">
            Vui lòng xem lại thông tin vé trước khi xuất!
        </div>
        <?php
        $cassiopeia_open_pnr_form = drupal_get_form("cassiopeia_open_pnr_form",$caches);
        if(!empty($cassiopeia_open_pnr_form)){
            $cassiopeia_open_pnr_form = drupal_render($cassiopeia_open_pnr_form);
            print($cassiopeia_open_pnr_form);
        }
        ?>
    </div>
    <div class="ticket-review-result" style="display: none;">
        <?php if(!empty($_REQUEST['data'])): ?>
            <?php
            $_data = new stdClass();
            $_data->PNRCode = strtoupper(trim($_REQUEST['data']['code']));
            $_data->AirlineCode = $_REQUEST['data']['airline'];
            $result = cassiopeia_meta_api_open_pnr($_data);
            if($_REQUEST['data']['airline']=="VN"){
                $TotalPrice = cassiopeia_meta_api_DOMAirPrice($_data);
            }
            ?>
            <?php if($_REQUEST['data']['airline']=="VN"): ?>
                <?php if(!empty($result)) print(str_replace("\n","<br>",$result->Data->PNRContent)); ?>
                <?php
                if($TotalPrice->Code==0){
                    $_booking = cassiopeia_get_booking_by_pnr($_REQUEST['data']['code']);
                    $_total_price = $TotalPrice->Data->Amount;
                    if(!empty($_booking)){
                        $_total_price+=$_booking->silverFee;
                    }
                    $str = str_replace("\n","<br>",$result->Data->PNRContent);
                    $array1 = explode(strtoupper($_data->PNRCode),$str);
                    if(!empty($array1[1])){
                        $array2 = explode("1 VN",$array1[1]);
                        $array4 = explode("TKT/TIME LIMIT",$array2[1]);
                        $count_leg = (substr_count($array4[0],"VN"))+1;
                        $newstr = $array2[0];
                        $words = preg_replace('/\d+/u', '', $newstr);
//                        _print_r($words);
                        $array3 = explode(".I",$words);
                        $count_infant = count($array3)-1;
                        $str_adult = $array3[0];
                        $count_guest = (substr_count($str_adult,"."));
                        $count_children = (substr_count($str_adult,"MSTR"));
                        $count_adult = $count_guest-$count_children;
                        $_SESSION[strtoupper(trim($_data->PNRCode)).'-count_leg'] = $count_leg;
                        $_SESSION[strtoupper(trim($_data->PNRCode)).'-count_adult'] = $count_adult;
                        $_SESSION[strtoupper(trim($_data->PNRCode)).'-count_children'] = $count_children;
                        $_SESSION[strtoupper(trim($_data->PNRCode)).'-count_infant'] = $count_infant;
                        $_SESSION[strtoupper(trim($_data->PNRCode)).'-total_price'] = $_total_price;
                        $_SESSION[strtoupper(trim($_data->PNRCode)).'-Airline'] = $_REQUEST['data']['airline'];
                        $_SESSION[strtoupper(trim($_data->PNRCode)).'-PNR'] = $_REQUEST['data']['code'];
//                        _print_r($_SESSION);
//                        die;
                        $flagVN = true;
                    }else{
                        $flagVN = false;
                    }
                }
//                ?>
                <table class="table">
                    <tbody>
                    <tr>
                        <td style="width:150px;"><b>Tổng cộng</b></td>
                        <td  class="text-left">
                            <span style="font-weight: bold;font-size: 14px;" class="color-red "><?php print(number_format($_total_price,0,',','.'));?> VNĐ</span></td>
                    </tr>
                    </tbody>
                </table>
            <?php else: ?>
                <?php if(!empty($result)) print(htmlspecialchars_decode($result->Data->PNRContent)); ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <?php if(!empty($_REQUEST['data'])): ?>
        <div class="ticket-info" data-pnr="<?php print($_REQUEST['data']['code']); ?>" data-airline="<?php print($_REQUEST['data']['airline']); ?>"></div>
    <?php endif; ?>
</div>
<?php if(!empty($_REQUEST['data'])): ?>
    <div class="search-flight-form">
        <?php
        $cassiopeia_qt_search_flight_form = drupal_get_form("cassiopeia_qt_search_flight_form",strtoupper(trim($_REQUEST['data']['code'])));
        if(!empty($cassiopeia_qt_search_flight_form )){
            $cassiopeia_qt_search_flight_form = drupal_render($cassiopeia_qt_search_flight_form);
            echo $cassiopeia_qt_search_flight_form;
        }
        ?>
    </div>

<?php endif; ?>