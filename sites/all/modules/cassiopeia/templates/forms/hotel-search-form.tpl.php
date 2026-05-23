<?php
drupal_add_js(drupal_get_path("module","cassiopeia")."/js/hotel-search-form.js");
if(!empty($_REQUEST['khu-vuc'])){
    $area = taxonomy_term_load($_REQUEST['khu-vuc']);
}
if(!empty($variables['term'])){
    $area = $variables['term'];
}
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

?>

<form action="">

    <input type="hidden" name="tx_area" value="<?php echo(!empty($_SESSION['booking_room']['tx_area'])?$_SESSION['booking_room']['tx_area']->tid:""); ?>">
<!--    <input type="hidden" name="hotel">-->

    <div class="filter-form hotel-search-form">
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    <div class="form-item form-search-key col-md-4">
                        <label for="">Chọn địa điểm</label>
                        <div class="item">
                            <img src="/sites/all/themes/cassiopeia_theme/img/hotel/icon-location.jpg" alt=""> <input type="text" value="<?php echo(!empty($_SESSION['booking_room']['tx_area'])?$_SESSION['booking_room']['tx_area']->name:""); ?>" placeholder="Bạn muốn đi đâu">
                        </div>
                    </div>
                    <div class="form-item col-md-2">
                        <label for="">Nhận phòng</label>
                        <div class="item">
                            <img src="/sites/all/themes/cassiopeia_theme/img/hotel/icon-search-calendar.png" alt="">
                            <input readonly="readonly" type="text" class="" value="<?php echo date("d/m/Y",$_SESSION['hotel-search']['check-in']) ?>" name="check-in">
                        </div>
                    </div>
                    <div class="form-item col-md-2">
                        <label for="">Trả phòng</label>
                        <div class="item">
                            <img src="/sites/all/themes/cassiopeia_theme/img/hotel/icon-search-calendar.png" alt="">
                            <input readonly="readonly" type="text" class="" value="<?php echo date("d/m/Y",$_SESSION['hotel-search']['check-out']) ?>" name="check-out">
                        </div>
                    </div>
                    <div class="form-item col-md-4 form-search-room-count">
                        <label for="">Số phòng, số khách</label>
                        <div class="item">
                            <img src="/sites/all/themes/cassiopeia_theme/img/hotel/icon-search-people.png" alt=""> <span class="text"><?php echo $_SESSION['hotel-search']['room']; ?> phòng, <?php echo $_SESSION['hotel-search']['adult']; ?> người lớn<?php if(!empty($_SESSION['hotel-search']['children'])): ?>, <?php echo $_SESSION['hotel-search']['children'] ?> trẻ em <?php endif; ?></span>
                        </div>
                        <div class="form-room-count">
                            <div class="room item quantity-change" data-min="1">
                                <div><input type="text" class="count" value="<?php echo $_SESSION['hotel-search']['room']; ?>" name="room"> Phòng </div><div><i class="fa fa-minus"></i><i class="fa fa-plus"></i></div>
                            </div>
                            <div class="adult item quantity-change" data-min="1">
                                <div><input type="text" name="adult" value="<?php echo $_SESSION['hotel-search']['adult']; ?>"> Người lớn </div><div><i class="fa fa-minus"></i><i class="fa fa-plus"></i></div>
                            </div>
                            <div class="children item quantity-change" data-min="0">
                                <div><input type="text" name="children" value="<?php echo $_SESSION['hotel-search']['children']; ?>"> Trẻ em </div><div><i class="fa fa-minus"></i><i class="fa fa-plus"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-item form-button no-padding">
                    <button ><i class="fa fa-search"></i> Tìm ngay</button>
                </div>
            </div>
        </div>

        <div class="block-suggest">
            <div class="block-area">
                <?php
                $vocal = taxonomy_vocabulary_machine_name_load("tx_area");
                $_tx_areas = taxonomy_get_tree($vocal->vid,0,1);
                ?>
                <div class="block-title">
                    <h3>Địa điểm đang HOT nhất</h3>
                </div>
                <div class="box-list-suggest">
                    <div class="block-items row">
                        <?php foreach($_tx_areas as $_tx_area): $_tx_area = taxonomy_term_load($_tx_area->tid);?>
                            <div class="col-md-4 item" data-tid="<?php echo($_tx_area->tid); ?>">
                                <?php
                                if (!empty($_tx_area->field_image['und'][0])) {
                                    $node_img = (array) $_tx_area->field_image['und'][0];
                                    $node_img['style_name'] = "style_106x106";
                                    $node_img['path'] = $node_img['uri'];
                                    $node_img = theme('image_style', $node_img);
                                    print($node_img);
                                }
                                ?>
                                <div>
                                    <div class="text"><?php echo($_tx_area->name); ?></div>
                                    <div><?php echo(cassiopeia_count_hotel_form_area($_tx_area->tid)); ?> KS</div>
                                </div>
                            </div>
                        <?php endforeach;; ?>
                    </div>
                </div>
            </div>
        </div>
        <!--            <div class="block-suggest-hotel">-->
        <!--                --><?php //$hotels = cassiopeia_get_nodes_by_category("hotel"); ?>
        <!--                <div class="block-items">-->
        <!--                    <div class="block-title">-->
        <!--                        <h3>Khách sạn</h3>-->
        <!--                    </div>-->
        <!--                    --><?php //if(!empty($hotels)): ?>
        <!--                        <ul>-->
        <!--                            --><?php //foreach($hotels as $_hotel): ?>
        <!--                                <li data-nid="--><?php //echo($_hotel->nid); ?><!--">-->
        <!--                                    <i class="fa fa-building-o"></i>-->
        <!--                                    <span>--><?php //echo($_hotel->title); ?><!--</span>-->
        <!--                                </li>-->
        <!--                            --><?php //endforeach; ?>
        <!--                        </ul>-->
        <!--                    --><?php //endif; ?>
        <!--                </div>-->
        <!--            </div>-->
    </div>
</form>