<?php
drupal_add_js(drupal_get_path("module","cassiopeia_admin")."/js/hotel-rating-page.js");
$cache = !empty($_REQUEST['data'])?$_REQUEST['data']:null;
if(empty($cache['from_date'])){
    $cache['from_date'] = date("Y-m-01 H:i:s",REQUEST_TIME);
}
if(empty($cache['to_date'])){
    $cache['to_date'] = date("Y-m-t H:i:s",REQUEST_TIME);
}
try{
    $query = db_select("cassiopeia_room_hotel_rating","cassiopeia_room_hotel_rating");
    $query->fields("cassiopeia_room_hotel_rating");
    $query->orderBy("cassiopeia_room_hotel_rating.created","DESC");
    $query->join("node","tbl_hotel","tbl_hotel.nid=cassiopeia_room_hotel_rating.nid");
    $query->addField("tbl_hotel","title","hotel_title");
    if(!empty($cache['from_date'])){
        $query->condition("cassiopeia_room_hotel_rating.created",strtotime($cache['from_date']),">=");
    }
    if(!empty($cache['to_date'])){
        $query->condition("cassiopeia_room_hotel_rating.created",strtotime($cache['to_date']),"<=");
    }
    if(isset($cache['point'])&&$cache['point']!="all"){
        $query->condition("cassiopeia_room_hotel_rating.point",$cache['point']);
    }
    if(isset($cache['status'])&&$cache['status']!="all"){
        $query->condition("cassiopeia_room_hotel_rating.status",$cache['status']);
    }
    if(isset($cache['hotel'])&&$cache['hotel']!="all"){
        $query->condition("cassiopeia_room_hotel_rating.nid",$cache['hotel']);
    }


    $result = $query->execute()->fetchAll();
//    _print_r($result);
}catch (Exception $e){

}
?>
<div class="hotel-rating-page">
    <div class="">
        <?php
            $cassiopeia_admin_hotel_rating_filter_form = drupal_get_form("cassiopeia_admin_hotel_rating_filter_form",$cache);
            if(!empty($cassiopeia_admin_hotel_rating_filter_form)){
                $cassiopeia_admin_hotel_rating_filter_form = drupal_render($cassiopeia_admin_hotel_rating_filter_form);
                echo $cassiopeia_admin_hotel_rating_filter_form;
            }
        ?>
    </div>
    <table class="table table-hover table-stripped">
        <thead>
            <tr>
                <th><input type="checkbox" value="all" name="all"></th>
                <th>Ngày tạo</th>
                <th>Khách sạn</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Điểm</th>
                <th width="500px">Comment</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($result)): ?>
                <?php foreach($result as $item): ?>
                    <tr>
                        <td width="50px"><input name="rating-id" type="checkbox" value="<?php echo $item->id; ?>"></td>
                        <td><?php echo date("d/m/Y",$item->created); ?></td>
                        <td><?php echo $item->hotel_title; ?></td>
                        <td><?php echo $item->full_name; ?></td>
                        <td><?php echo $item->email; ?></td>
                        <td>
                            <?php echo $item->point; ?>
                        </td>
                        <td>
                            <?php echo $item->comment; ?>
                        </td>
                        <td width="200px">
                           <div class="d-flex gap-15">
                               <select name="rating-status" id="" class="form-control" data-id="<?php echo $item->id; ?>">
                                   <option <?php if($item->status==0) echo "selected"; ?> value="0" hidden>Chưa duyệt</option>
                                   <option <?php if($item->status==1) echo "selected"; ?> value="1">Đã duyệt</option>
                                   <option <?php if($item->status==2) echo "selected"; ?> value="2">Hủy</option>
                               </select>
<!--                               <button data-comment="--><?php //echo $item->comment; ?><!--" class="btn btn-primary btn-view-comment" title="Xem nội dung comment"><i class="fa fa-eye"></i></button>-->
                           </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>