<?php
drupal_add_js(drupal_get_path("module","cassiopeia")."/js/node-hotel-detail.js");
drupal_add_js("https://code.jquery.com/ui/1.13.2/jquery-ui.js");
drupal_add_css("https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css");
$node = $variables['node'];
$ratings = cassiopeia_room_hotel_rating_load($node->nid);
$_ratings = $ratings['ratings'];
$tx_area = !empty($node->field_tx_area['und'][0]['tid'])?taxonomy_term_load($node->field_tx_area['und'][0]['tid']):null;
$_SESSION['hotel-search']['check-in'] = !empty($_SESSION['hotel-search']['check-in'])?$_SESSION['hotel-search']['check-in']:REQUEST_TIME+86400;
$_SESSION['hotel-search']['check-in'] = !empty($_REQUEST['check-in'])?strtotime(str_replace("/","-",$_REQUEST['check-in'])):$_SESSION['hotel-search']['check-in'];

$_SESSION['hotel-search']['check-out'] = !empty($_SESSION['hotel-search']['check-out'])?$_SESSION['hotel-search']['check-out']:REQUEST_TIME+2*86400;
$_SESSION['hotel-search']['check-out'] = !empty($_REQUEST['check-out'])?strtotime(str_replace("/","-",$_REQUEST['check-out'])):$_SESSION['hotel-search']['check-out'];

$_SESSION['hotel-search']['room'] = !empty($_SESSION['hotel-search']['room'])?$_SESSION['hotel-search']['room']:1;
$_SESSION['hotel-search']['room'] = !empty($_REQUEST['room'])?$_REQUEST['room']:$_SESSION['hotel-search']['room'];

$_SESSION['hotel-search']['adult'] = !empty($_SESSION['hotel-search']['adult'])?$_SESSION['hotel-search']['adult']:2;
$_SESSION['hotel-search']['adult'] = !empty($_REQUEST['adult'])?$_REQUEST['adult']:$_SESSION['hotel-search']['adult'];

$_SESSION['hotel-search']['children'] = !empty($_SESSION['hotel-search']['children'])?$_SESSION['hotel-search']['children']:0;
$_SESSION['hotel-search']['children'] = !empty($_REQUEST['room'])?$_REQUEST['children']:$_SESSION['hotel-search']['children'];
$check_in = $_SESSION['hotel-search']['check-in'];
$check_out = $_SESSION['hotel-search']['check-out'];
$date1=date_create(date("Y-m-d",$check_in));
$date2=date_create(date("Y-m-d",$check_out));
$diff=date_diff($date1,$date2);
$nights = $diff->format("%a");


$conditions = array();
$conditions['start'] = $start;
$conditions['limit'] = $limit;
$conditions['check_in'] = $_SESSION['hotel-search']['check-in'];
$conditions['check_out'] = $_SESSION['hotel-search']['check-out'];
$conditions['hotels'] = array($node->nid);
$results = cassiopeia_room_hotels_load($conditions);
$price = $original_price = 0;
if(!empty($results['result'])){
    $price = $results['result'][0]->price;   
    $original_price = $results['result'][0]->original_price;   
}
?>
<input type="hidden" id="hotel" value="<?php echo($node->nid); ?>">
<div class="page-detail-hotel">
    <div class="page-detail-hotel-container container">
        <div class="page-detail-hotel-inner">
            <div class="breadcrumb-container">
                <div class="page-top-block">
                    <div class="step">
                        <div class="step-1 active">
                            Trang chủ
                        </div>
                        <div class="step-2">
                            <?php echo l($tx_area->name,"taxonomy/term/".$tx_area->tid,array("html"=>TRUE)); ?>
                        </div>
                        <div class="step-3">
                            <?php echo $node->title; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-detail-hotel">
                <div class="block-detail-hotel-content">
                    <div class="detail-hotel-header">
                        <div class="detail-hotel-header-left">
                            <div class="detail-hotel-header-left-content">
                                <div>
                                    <h2 class="heading-hotel heading-secondary mb-1"><?php echo($node->title) ?></h2>
                                    <div class="box-evaluate d-flex alg-center mb-1">
                                        <span class="hotel-rate node-ranking">
                                            <?php for($i=1;$i<=$node->field_hotel_ranking['und'][0]['value'];$i++): ?>
                                                <i class="fa fa-star"></i>
                                            <?php endfor; ?>
                                        </span>
                                        <div class="number-evaluate">
                                            <span><?php echo $ratings['total_result']->total; ?> đánh giá</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <span><img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-location.svg" alt=""></span>
                                    <span><?php echo(!empty($node->field_address['und'][0]['value'])?$node->field_address['und'][0]['value']:""); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="detail-hotel-header-right">
                            <div class="detail-hotel-header-right-content">
                                <div class="node-price-right">
                                    <?php if(!empty($price)&&$price!=$original_price&&$original_price>0): ?>
                                        <div class="box-price-detail">
                                            <div class="discount">
                                                <span>-<?php echo round(((($original_price-$price)/$original_price))*100) ?>%</span>
                                                <span><?php echo number_format($original_price,0,",","."); ?> VNĐ</span>
                                            </div>
                                            <div class="price">
                                                <span><?php echo number_format($price,0,",","."); ?> VNĐ</span>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="price">
                                            <span><?php echo number_format($price,0,",","."); ?> VNĐ</span>
                                        </div>
                                    <?php endif; ?>
                                    <div class="buttons">
                                        <a href="#room-hotel">Đặt ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="detail-hotel-main mt-4">
                        <div class="detail-hotel-main-content">
                            <div class="block-detail-hotel-image">
                                <div class="block-detail-hotel-image-content">
                                    <div class="hotel-img">
                                         <?php if(!empty($node->field_images['und'])): $index=1;?>
                                            <?php foreach($node->field_images['und'] as $image): ?>
                                                <div class="hotel-img-item">
                                                    <?php
                                                        if (!empty($image)) {
                                                            $node_img = (array) $image;
                                                            $node_img['style_name'] = "hotel_image_style_".$index;
                                                            $image_url = image_style_url("original",$image['uri']);
                                                            $node_img['path'] = $node_img['uri'];
                                                            $node_img = theme('image_style', $node_img);
                                                        }
                                                    ?>
                                                    <a class="fancy-<?php print($node->nid); ?>" href="<?php print($image_url); ?>" data-fancybox="images" rel="group-<?php print($node->nid); ?>">
                                                        <?php print($node_img); ?>
                                                    </a>
                                                    <?php if($index==4 && count($node->field_images['und'])>4): ?>
                                                        <span class="no-point-event view-all-hotel-image">Xem tất cả <?php echo(count($node->field_images['und'])); ?> ảnh</span>
                                                    <?php endif; ?>
                                                </div>
                                            <?php if($index==4) break; $index++; endforeach; ?>
                                        <?php endif; ?>
                                        <?php
                                        $images = !empty($node->field_images['und'])?$node->field_images['und']:array();
                                        if(!empty($images) && count($images)>4){
                                            $index=1;
                                            foreach($images as $image){
                                                if($index<=4){
                                                    $index++;
                                                    continue;
                                                    ?>
                                                    <a class="fancy-<?php print($node->nid); ?>" href="<?php print($image_url); ?>" data-fancybox="images" rel="group-<?php print($node->nid); ?>">
                                                    </a>
                                                    <?php
                                                }else{
                                                    $image_url = image_style_url("original",$image['uri']);
                                                    ?>
                                                    <a class="fancy-<?php print($node->nid); ?>" href="<?php print($image_url); ?>" data-fancybox="images" rel="group-<?php print($node->nid); ?>">
                                                    </a>
                                                    <?php
                                                }
                                                $index++;
                                            }
                                        }
                                        ?>
                                        <script>
                                            jQuery(document).ready(function(){
                                                jQuery('a.fancy-<?php print($node->nid); ?>').fancybox({
                                                    margin : [44,0,22,0],
                                                    thumbs : {
                                                        autoStart : true,
                                                        axis      : 'x'
                                                    },
                                                    helpers : {
                                                        overlay : {closeClick: false}
                                                    },
                                                    hideOnOverlayClick: false,
                                                    autoResize: false
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>

                            <div class="block-detail-hotel-wrap">
                                <div class="block-detail-hotel-wrap-content">
                                    <!-- hotel-view-links -->
                                    <div class="hotel-view-links">
                                        <ul id="hotel-links" class="custom-nav nav-inline">
                                            <li>
                                                <a href="#intro-hotel" class="active">Giới thiệu</a>
                                            </li>
                                            <li>
                                                <a href="#room-hotel">Phòng</a>
                                            </li>
                                            <li>
                                                <a href="#regulations-hotel">Chính sách nơi nghỉ</a>
                                            </li>
                                            <li>
                                                <a href="#evaluate-hotel">Đánh giá</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="descriptions hotel-descriptions ">
                                        <!-- intro-hotel -->
                                        <div class="description-item" id="intro-hotel">
                                            <div class="description-item-title">
                                                <div class="d-flex alg-center">
                                                    <span class="heading heading-tertiary"></span>
                                                </div>
                                            </div>
                                            <div class="description-item-content row">
                                                <div class="introduce-hotel">
                                                    <div class="introduce-hotel-text col-md-8">
                                                        <?php echo !empty($node->body['und'][0]['value'])?$node->body['und'][0]['value']:""; ?>
                                                    </div>
                                                    <div class="hotel-utilities col-md-4">
                                                        <div class="img-map mb-2">
                                                            <?php echo(!empty($node->field_map_embed['und'][0]['value'])?$node->field_map_embed['und'][0]['value']:""); ?>
                                                        </div>
                                                        <div class="hotel-utilities-content">
                                                            <div class="hotel-utilities-title">
                                                                <span>Tiện ích khách sạn</span>
                                                            </div>
                                                            <div class="hotel-utilities-detail">
                                                                <ul>
                                                                    <?php if(!empty($node->field_convenient['und'])): ?>
                                                                        <?php foreach($node->field_convenient['und'] as $item): $convenient = node_load($item['nid']); ?>
                                                                            <li>
                                                                                <span>
                                                                                    <img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-check-black.png" alt="">
                                                                                </span>
                                                                                <span><?php echo($convenient->title); ?></span>
                                                                            </li>
                                                                        <?php endforeach; ?>
                                                                    <?php endif; ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- room-hotel -->
                                        <div class="description-item" id="room-hotel">
                                            <div class="description-item-title">
                                                <div class="d-flex alg-center">
                                                    <span class="heading heading-tertiary">Chọn ngày xem giá phòng tại <?php echo $node->title; ?></span>
                                                </div>
                                            </div>
                                            <div class="description-item-content">
                                                <?php
                                                $cassiopeia_room_room_detail_form = drupal_get_form("cassiopeia_room_hotel_detail_form",array("hotel"=>$node));
                                                if(!empty($cassiopeia_room_room_detail_form)){
                                                    $cassiopeia_room_room_detail_form = drupal_render($cassiopeia_room_room_detail_form);
                                                    echo $cassiopeia_room_room_detail_form;
                                                }
                                                ?>
                                            </div>
                                        </div>  
                                        <!-- regulations-hotel -->
                                        <div class="description-item" id="regulations-hotel">
                                            <div class="description-item-title">
                                                <div class="d-flex alg-center">
                                                    <span class="heading heading-tertiary">Chính sách tại <?php echo $node->title; ?></span>
                                                </div>
                                            </div>
                                            <div class="description-item-content">
                                                <div class="regulations mt-2">
                                                    <!--  -->
                                                    <div class="regulations-item">
                                                        <div class="regulations-title">
                                                            <span>Quy định nhận & trả phòng:</span>
                                                        </div>
                                                        <div class="regulations-content">
                                                            <?php echo(!empty($node->field_policy_check_in_check_out['und'][0]['value'])?$node->field_policy_check_in_check_out['und'][0]['value']:""); ?>
                                                        </div>
                                                    </div>
                                                    <!--  -->
                                                    <div class="regulations-item">
                                                        <div class="regulations-title">
                                                            <span>Quy định hủy/đổi đặt phòng:</span>
                                                        </div>
                                                        <div class="regulations-content">
                                                            <?php echo(!empty($node->field_policy_cancel_change_room['und'][0]['value'])?$node->field_policy_cancel_change_room['und'][0]['value']:""); ?>
                                                        </div>
                                                    </div>
                                                    <!--  -->
                                                    <div class="regulations-item">
                                                        <div class="regulations-title">
                                                            <span>Trẻ em và giường phụ:</span>
                                                        </div>
                                                        <div class="regulations-content">
                                                            <?php echo(!empty($node->field_policy_children_extrabed['und'][0]['value'])?$node->field_policy_children_extrabed['und'][0]['value']:""); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

<!--                                         evaluate-hotel-->
                                        <div class="description-item" id="evaluate-hotel">
                                            <div class="description-item-title">
                                                <div class="d-flex alg-center">
                                                    <span class="heading heading-tertiary">Đánh giá của khách hàng </span>
                                                </div>
                                            </div>
                                            <div class="description-item-content">
                                                <div class="evaluate">
                                                    <div class="evaluate-top">
                                                        <div class="evaluate-total">
                                                            <span><?php echo !empty($ratings['total_result'])?round($ratings['total_result']->point,1):0; ?>
                                                                <i class="fa-solid fa-star"></i>
                                                            </span>
                                                            <span><?php echo $ratings['total_result']->total; ?> đánh giá</span>
                                                        </div>
                                                        <div class="evaluate-star">
                                                            <?php for($i=5;$i>=1;$i--): ?>
                                                                <div class="evaluate-star-item d-flex">
                                                                    <div class="node-ranking no-before">
                                                                        <?php for($j=1;$j<=$i;$j++): ?>
                                                                            <i class="fa-solid fa-star"></i>
                                                                        <?php endfor; ?>
                                                                        <?php for($k=0;$k<=5-$j;$k++): ?>
                                                                            <i class="fa-regular fa-star"></i>
                                                                        <?php endfor; ?>
                                                                    </div>
                                                                    <span>(<?php echo !empty($_ratings[$i]->count)?$_ratings[$i]->count:0; ?> đánh giá) </span>
                                                                </div>
                                                            <?php endfor; ?>
                                                        </div>
                                                        <div class="evaluate-btn-write">
                                                            <a href="javascript:;" type="button" class="btn bg-secondary" data-toggle="modal" data-target="#commentModal">
                                                                <span>
                                                                    <i class="fa-light fa-clipboard-list-check"></i>
                                                                </span>
                                                                <span>Viết đánh giá</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <?php if(!empty($ratings)): ?>
                                                        <div class="evaluate-comment">
                                                            <?php foreach($ratings['result'] as $key => $rating): ?>
                                                                <?php if(is_numeric($key)): ?>
                                                                    <?php $_user = user_load($rating->uid); ?>
                                                                    <div class="item-comment d-flex">
                                                                        <div class="comment-ava">
                                                                            <?php
                                                                            if (!empty($_user->picture)) {
                                                                                $node_img = (array) $_user->picture;
                                                                                $node_img['style_name'] = "style_44x44";
                                                                                $node_img['path'] = $node_img['uri'];
                                                                                $node_img = theme('image_style', $node_img);
                                                                                echo $node_img;
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                        <div class="comment-content">
                                                                            <div class="comment-name d-flex">
                                                                                <span><?php echo !empty($_user->field_account_full_name['und'][0]['value'])?$_user->field_account_full_name['und'][0]['value']:$_user->name; ?></span>
                                                                                <div class="node-ranking no-before no-before">
                                                                                    <?php for($j=1;$j<=$rating->point;$j++): ?>
                                                                                        <i class="fa-solid fa-star"></i>
                                                                                    <?php endfor; ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="comment-date mb-1">
                                                                                <span><?php echo date("d/m/Y",$rating->created); ?></span>
                                                                            </div>
                                                                            <div class="comment-txt">
                                                                                <span><?php echo !empty($rating->comment)?$rating->comment:""; ?></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </div>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if(!empty($node->field_other_hotel['und'])): ?>
                                            <div class="other-hotels">
                                                <div class="description-item-title mb-3">
                                                    <div class="d-flex alg-center">
                                                        <span class="heading heading-tertiary">Khách sạn tương tự</span>
                                                    </div>
                                                </div>
                                                <div class="block-body">
                                                    <div class="owl-theme owl-carousel owl-custom" data-item="3">
                                                        <?php foreach($node->field_other_hotel['und'] as $item): ?>
                                                            <?php
                                                            $hotel = node_load($item['nid']);
                                                            $conditions = array();
                                                            $conditions['check_in'] = $_SESSION['hotel-search']['check-in'];
                                                            $conditions['check_out'] = $_SESSION['hotel-search']['check-out'];
                                                            $conditions['hotels'] = array($hotel->nid);

                                                            $results = cassiopeia_room_room_price_load($conditions);

                                                            $_item = !empty($results['result'])?$results['result'][0]:array();
                                                            $room_price = getMinPriceByHotelRoomByDate(date("d-m-Y",$_SESSION['hotel-search']['check-in']),date("d-m-Y",$_SESSION['hotel-search']['check-out']),$_item->room_nid,$_item->hotel_nid);
//                                            _print_r($room_price);
                                                            $ratings = cassiopeia_room_hotel_rating_load($hotel->nid);
                                                            $_ratings = $ratings['ratings'];
                                                            ?>
                                                            <div class="item">
                                                                <div class="card card-type-hotel">
                                                                    <div class="card-img">
                                                                        <?php
                                                                        if (!empty($hotel->field_image['und'][0])) {
                                                                            $node_img = (array) $hotel->field_image['und'][0];
                                                                            $node_img['style_name'] = "style_210x164";
                                                                            $node_img['path'] = $node_img['uri'];
                                                                            $node_img = theme('image_style', $node_img);
                                                                            echo(l($node_img,"node/".$hotel->nid,array("html"=>TRUE)));
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                    <div class="card-info">
                                                                        <h3 class="card-title">
                                                                            <?php echo(l($hotel->title,"node/".$hotel->nid,array("html"=>TRUE,'attributes'=>array('class'=>array('title ff-semibold clr-black'))))); ?>
                                                                        </h3>
                                                                        <div class="box-evaluate d-flex alg-center mt-1">
                                                                            <div class="node-ranking">
                                                                                <?php for($i=1;$i<=$hotel->field_hotel_ranking['und'][0]['value'];$i++): ?>
                                                                                    <i class="fa fa-star"></i>
                                                                                <?php endfor; ?>
                                                                            </div>
                                                                            <div class="number-evaluate">
                                                                                <span><?php echo $ratings['total_result']->total; ?> đánh giá</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="convenients">
                                                                            <div class="item-convenients">
                                                                                <img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-location.svg" alt="">
                                                                                <span><?php echo !empty($hotel->field_address['und'][0]['value'])?$hotel->field_address['und'][0]['value']:""; ?></span>
                                                                            </div>
                                                                            <?php if(!empty($hotel->field_convenient['und'])): ?>
                                                                                <?php
                                                                                $show = array_slice($hotel->field_convenient['und'],0,3);
                                                                                $other = array_slice($hotel->field_convenient['und'],3);
                                                                                ?>
                                                                                <?php foreach($show as $_convenient): ?>
                                                                                    <?php $convenient = node_load($_convenient['nid']); ?>
                                                                                    <div class="item-convenients">
                                                                                        <img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-check-black.png" alt="">
                                                                                        <span><?php echo $convenient->title; ?></span>
                                                                                    </div>
                                                                                <?php endforeach; ?>
                                                                                <?php if(!empty($other)): ?>
                                                                                    <span>
                                                                     +<?php echo(count($other)); ?>
                                                                </span>
                                                                                <?php endif; ?>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                        <div class="node-price">
                                                                            <div class="price">
                                                                                Chỉ từ <span><?php echo number_format($price,0,",","."); ?> VNĐ</span>
                                                                            </div>
                                                                            <div class="">
                                                                                <?php echo(l("Đặt ngay","node/".$hotel->nid,array("html"=>TRUE,'attributes'=>array('class'=>array('btn bg-secondary clr-white  ff-bold radius-36'))))); ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal center-modal map-large" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="mapModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header d-flex alg-center jsc-between">
				<h4 class="modal-title">Đánh giá</h4>
				<button type="button" class="close-modal" data-dismiss="modal" aria-label="Close">
					<i class="fa-light fa-xmark"></i>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-commentModal">
                    <?php
                        $cassiopeia_room_hotel_rating_form = drupal_get_form("cassiopeia_room_hotel_rating_form",array("nid"=>$node->nid));
                        if(!empty($cassiopeia_room_hotel_rating_form)){
                            $cassiopeia_room_hotel_rating_form = drupal_render($cassiopeia_room_hotel_rating_form);
                            echo $cassiopeia_room_hotel_rating_form;
                        }
                    ?>
                </div>
			</div>
		</div>
	</div>
</div>
<?php //echo(l("Đặt phòng","node/".$node->nid."/booking",array("html"=>TRUE))); ?>
