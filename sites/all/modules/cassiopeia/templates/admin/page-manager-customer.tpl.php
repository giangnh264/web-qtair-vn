
<?php

    global $user;
    try{
//        print(date("d/m/Y H:i",1591192098));

        $query = db_select("tbl_booking","tbl_booking");
        $query -> fields("tbl_booking");
//        $query->condition("booking_code","VE1594693224");
        $bookings = $query->execute()->fetchAll();
        print(count($bookings));
//    print_r($bookings);
//        die;
       $query = db_select("tbl_airlines","tbl_airlines");
       $query -> fields("tbl_airlines");
       $query -> condition("iata","JQ");
       $result = $query -> execute() -> fetchAssoc();
//       print_r($result);
//        db_delete("tbl_region")->execute();
    }catch (Exception $e){
        print_r($e);
    }

    $_conditions = array();
    if(!empty($_REQUEST['data'])){
        $_conditions = $_REQUEST['data'];
    }
   try{ $query = db_select("tbl_booking","tbl_booking");
       $query -> fields("tbl_booking");
       $query -> join("tbl_customer","tbl_customer","tbl_booking.booking_code = tbl_customer.booking_code");
       $query -> fields("tbl_customer");
       $query -> addExpression('COUNT(tbl_customer.Phone)', 'booking_total');
       $query -> groupBy("tbl_customer.Phone");
        if(!empty($_conditions['search_key'])){
            $query->where('CONCAT(tbl_customer.Phone,tbl_customer.Email,tbl_customer.FullName) LIKE :string', array(':string'=>'%'.$_conditions['search_key'].'%'));
        }
       if(!empty($_REQUEST['data']['from_date']) && !empty($_REQUEST['data']['to_date'])){
           $query -> condition("tbl_booking.created",array(strtotime($_REQUEST['data']['from_date']),strtotime($_REQUEST['data']['to_date'])+86400),"BETWEEN");
       }
       // đặt giữ chỗ
       $fail_query = db_select("tbl_booking","tbl_booking");
       $fail_query -> fields("tbl_booking");
       $fail_query -> join("tbl_customer","tbl_customer","tbl_booking.booking_code = tbl_customer.booking_code");
       $fail_query -> addExpression('COUNT(tbl_customer.Phone)', 'booking_ok');
       $fail_query -> groupBy("tbl_customer.Phone");
       $fail_query -> condition("tbl_booking.status","OK","=");
       $query -> leftJoin($fail_query,"tbl_ok","tbl_ok.booking_code = tbl_booking.booking_code");
       $query -> addField("tbl_ok","booking_ok","ok_count");
//
//       // đặt chỗ lỗi
       $fail_query = db_select("tbl_booking","tbl_booking");
       $fail_query -> fields("tbl_booking");
       $fail_query -> join("tbl_customer","tbl_customer","tbl_booking.booking_code = tbl_customer.booking_code");
       $fail_query -> addExpression('COUNT(tbl_customer.Phone)', 'booking_fail');
       $fail_query -> groupBy("tbl_customer.Phone");
       $fail_query -> condition("tbl_booking.status","FAIL","=");
       $query -> leftJoin($fail_query,"tbl_fail","tbl_fail.booking_code = tbl_booking.booking_code");
       $query -> addField("tbl_fail","booking_fail","fail_count");
//
//       // đã thanh toán
       $fail_query = db_select("tbl_booking","tbl_booking");
       $fail_query -> fields("tbl_booking");
       $fail_query -> join("tbl_customer","tbl_customer","tbl_booking.booking_code = tbl_customer.booking_code");
       $fail_query -> addExpression('COUNT(tbl_customer.Phone)', 'booking_paid');
       $fail_query -> groupBy("tbl_customer.Phone");
       $fail_query -> condition("tbl_booking.status","PAID","=");
       $query -> leftJoin($fail_query,"tbl_paid","tbl_paid.booking_code = tbl_booking.booking_code");
       $query -> addField("tbl_paid","booking_paid","paid_count");

//
//       // chờ xuất vé
       $fail_query = db_select("tbl_booking","tbl_booking");
       $fail_query -> fields("tbl_booking");
       $fail_query -> join("tbl_customer","tbl_customer","tbl_booking.booking_code = tbl_customer.booking_code");
       $fail_query -> addExpression('COUNT(tbl_customer.Phone)', 'booking_hold');
       $fail_query -> groupBy("tbl_customer.Phone");
       $fail_query -> condition("tbl_booking.status","HOLD","=");
       $query -> leftJoin($fail_query,"tbl_hold","tbl_hold.booking_code = tbl_booking.booking_code");
       $query -> addField("tbl_hold","booking_hold","hold_count");

//       // xuất vé
       $fail_query = db_select("tbl_booking","tbl_booking");
       $fail_query -> fields("tbl_booking");
       $fail_query -> join("tbl_customer","tbl_customer","tbl_booking.booking_code = tbl_customer.booking_code");
       $fail_query -> addExpression('COUNT(tbl_customer.Phone)', 'booking_ticketed');
       $fail_query -> groupBy("tbl_customer.Phone");
       $fail_query -> condition("tbl_booking.status","TICKETED","=");
       $query -> leftJoin($fail_query,"tbl_ticketed","tbl_ticketed.booking_code = tbl_booking.booking_code");
       $query -> addField("tbl_ticketed","booking_ticketed","ticketed_count");
//
//       // hủy đặt chỗ
       $fail_query = db_select("tbl_booking","tbl_booking");
       $fail_query -> fields("tbl_booking");
       $fail_query -> join("tbl_customer","tbl_customer","tbl_booking.booking_code = tbl_customer.booking_code");
       $fail_query -> addExpression('COUNT(tbl_customer.Phone)', 'booking_canceled');
       $fail_query -> groupBy("tbl_customer.Phone");
       $fail_query -> condition("tbl_booking.status","CANCELED","=");
       $query -> leftJoin($fail_query,"tbl_canceled","tbl_canceled.booking_code = tbl_booking.booking_code");
       $query -> addField("tbl_canceled","booking_canceled","canceled_count");
//
//       // ngày đặt gần nhất

       $created_query = db_select("tbl_booking","tbl_booking");
       $created_query -> fields("tbl_booking");
       $created_query -> join("tbl_customer","tbl_customer","tbl_booking.booking_code = tbl_customer.booking_code");
       $created_query -> addExpression('MAX(tbl_booking.created)', 'last_created');
       $created_query -> orderBy("tbl_booking.created","DESC");
       $created_query -> groupBy("tbl_customer.Phone");
       $query -> leftJoin($created_query,"tbl_created","tbl_created.booking_code = tbl_booking.booking_code");
       $query -> addField("tbl_created","tbl_created.last_created","last_created");
       //
       //       // tổng giá
       $fail_query = db_select("tbl_booking","tbl_booking");
       $fail_query -> fields("tbl_booking");
       $fail_query -> join("tbl_customer","tbl_customer","tbl_booking.booking_code = tbl_customer.booking_code");
       $fail_query -> addExpression('SUM(tbl_booking.price)', 'total_price');
       $fail_query -> groupBy("tbl_customer.Phone");
       $query -> leftJoin($fail_query,"tbl_total_price","tbl_total_price.booking_code = tbl_booking.booking_code");
       $query -> addField("tbl_total_price","total_price","total_price");
        if(!user_has_role(3,$user)){
            if(user_has_role(5)){
                $sub_query = db_select("users","tbl_user");
                $sub_query->fields("tbl_user");

                $sub_query->join("field_data_field_account_code","field_account_code","field_account_code.entity_id = tbl_user.uid");
//                $sub_query->fields("field_account_code");
                $sub_query->join("field_data_field_account_sale","field_account_sale","field_account_sale.entity_id = tbl_user.uid");
                $sub_query->addField("field_account_sale","field_account_sale_target_id","sale_id");
//                $_result = $sub_query->execute()->fetchAll();
//                print_r($_result);
                $query->join($sub_query,"tbl_user","tbl_user.uid = tbl_booking.uid");
                $query->condition("tbl_user.sale_id",$user->uid);
                $query->fields("tbl_user");
            }elseif(!user_has_role(7)){
                $query->condition("tbl_customer.agent",$user->uid);
            }

        }
       $result = $query -> execute() -> fetchAll();
//       print_r($result);
   }catch (Exception $e){
       print_r($e);
   }
?>
<div class="page-manager-customer">
    <div class="filter-form">
        <?php
        $cassiopeia_booking_filter_form  = drupal_get_form("cassiopeia_customer_filter_form",$_conditions);
        if(!empty($cassiopeia_booking_filter_form)){
            $cassiopeia_booking_filter_form = drupal_render($cassiopeia_booking_filter_form);
            print($cassiopeia_booking_filter_form);
        }
        ?>
    </div>

    <div class="page-container">
        <table class="table table-hovered table-striped" >
            <thead>
                <tr>
                    <th>Tác vụ</th>
                    <th>Điện thoại</th>
                    <th class="hidden-xs">Ngày đặt gần nhất</th>
                    <th>Đặt giữ chỗ</th>
                    <th class="hidden-xs">Đặt chỗ lỗi</th>
                    <th class="hidden-xs">Đã thanh toán</th>
                    <th class="hidden-xs" >Chờ xuất vé</th>
                    <th>Xuất vé</th>
                    <th class="hidden-xs">Hủy đặt chỗ</th>
                    <th class="hidden-xs">Tổng đơn</th>
                    <th class="hidden-xs">Tổng giá</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($result)): ?>
                    <?php foreach($result as $item): ?>
                        <tr>
                            <td><a href="/<?php if(user_has_role(4,$user) || user_has_role(6,$user)) {print("user/manager/booking");}else{print("admin/manager/booking");} ?>?tel=<?php print($item->Phone); ?>">Chi tiết</a></td>
                            <td><?php print($item->Phone); ?></td>
                            <td class="hidden-xs"><?php print(date("d/m/Y H:i",$item->last_created)); ?></td>
                            <td class="hidden-xs"><?php print(!empty($item->ok_count)?$item->ok_count:0); ?></td>
                            <td><?php print(!empty($item->fail_count)?$item->fail_count:0); ?></td>
                            <td class="hidden-xs"><?php print(!empty($item->paid_count)?$item->paid_count:0); ?></td>
                            <td class="hidden-xs"><?php print(!empty($item->hold_count)?$item->hold_count:0); ?></td>
                            <td><?php print(!empty($item->ticketed_count)?$item->ticketed_count:0); ?></td>
                            <td class="hidden-xs"><?php print(!empty($item->canceled_count)?$item->canceled_count:0); ?></td>
                            <td class="hidden-xs"><?php print(!empty($item->booking_total)?$item->booking_total:0); ?></td>
                            <td class="hidden-xs"><?php print(!empty($item->total_price)?number_format($item->total_price,0,",","."):0); ?></td>
                        </tr>
                        <tr class="hidden"></tr>

                        <tr class="footable-detail-row visible-xs">
                            <td colspan="4">
                                <table class="footable-details table table-bordered datatable booking-table ">
                                    <tbody>
                                    <tr class="odd new-booking">
                                        <th>Tác vụ</th>
                                        <td style="display: table-cell;">
                                            <a href="/<?php if(user_has_role(4,$user) || user_has_role(6,$user)) {print("user/manager/booking");}else{print("admin/manager/booking");} ?>?tel=<?php print($item->Phone); ?>">Chi tiết</a>
                                        </td>
                                    </tr>
                                    <tr class="odd new-booking">
                                        <th>Điện thoại</th>
                                        <td style="display: table-cell;">
                                            <?php print($item->Phone); ?>
                                        </td>
                                    </tr>
                                    <tr class="odd new-booking">
                                        <th>Ngày đặt gần nhất</th>
                                        <td style="display: table-cell;">
                                            <?php print(date("d/m/Y H:i",$item->last_created)); ?>
                                        </td>
                                    </tr>
                                    <tr class="odd new-booking">
                                        <th>Đặt giữ chỗ	</th>
                                        <td style="display: table-cell;">
                                            <?php print(!empty($item->ok_count)?$item->ok_count:0); ?>
                                        </td>
                                    </tr>
                                    <tr class="odd new-booking">
                                        <th>Đặt chỗ lỗi</th>
                                        <td style="display: table-cell;">
                                            <?php print(!empty($item->fail_count)?$item->fail_count:0); ?>
                                        </td>
                                    </tr>
                                    <tr class="odd new-booking">
                                        <th>Đã thanh toán</th>
                                        <td style="display: table-cell;">
                                            <?php print(!empty($item->paid_count)?$item->paid_count:0); ?>
                                        </td>
                                    </tr>
                                    <tr class="odd new-booking">
                                        <th>Chờ xuất vé</th>
                                        <td style="display: table-cell;">
                                            <?php print(!empty($item->hold_count)?$item->hold_count:0); ?>
                                        </td>
                                    </tr>
                                    <tr class="odd new-booking">
                                        <th>Xuất vé</th>
                                        <td style="display: table-cell;">
                                            <?php print(!empty($item->ticketed_count)?$item->ticketed_count:0); ?>
                                        </td>
                                    </tr>
                                    <tr class="odd new-booking">
                                        <th>Huỷ đặt chỗ</th>
                                        <td style="display: table-cell;">
                                            <?php print(!empty($item->canceled_count)?$item->canceled_count:0); ?>                                        </td>
                                    </tr>
                                    <tr class="odd new-booking">
                                        <th>Tổng đơn</th>
                                        <td style="display: table-cell;">
                                            <?php print(!empty($item->booking_total)?$item->booking_total:0); ?>
                                        </td>
                                    </tr>
                                    <tr class="odd new-booking">
                                        <th>Tổng giá</th>
                                        <td style="display: table-cell;">
                                            <?php print(!empty($item->total_price)?number_format($item->total_price,0,",","."):0); ?>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>


                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>


<!--<div id="modal_create_region" class="modal fade" role="dialog">-->
<!--    <div class="modal-dialog">-->
<!---->
<!--        <!-- Modal content-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <button type="button" class="close" data-dismiss="modal">&times;</button>-->
<!--                <h4>Thêm mới khu vực : <span class="booking-code"></span></h4>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                --><?php
//                    $cassiopeia_region_add_form = drupal_get_form("cassiopeia_region_add_form");
//                    if(!empty($cassiopeia_region_add_form)){
//                        $cassiopeia_region_add_form = drupal_render($cassiopeia_region_add_form);
//                        print($cassiopeia_region_add_form);
//                    }
//                ?>
<!--            </div>-->
<!--        </div>-->
<!---->
<!--    </div>-->
<!--</div>-->