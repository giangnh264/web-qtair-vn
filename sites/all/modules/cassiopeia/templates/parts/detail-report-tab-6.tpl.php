<?php if(cassiopeia_agent_register_report_accept()): ?>
    <div id="tab-6" class=" <?php if(!empty($arg[3]) && $arg[3]=="tab-6") print("in active"); ?>">
        <div class="filter-block">
            <?php
            $date_filter = !empty($_REQUEST['date_filter'])?$_REQUEST['date_filter']:date("m-Y",REQUEST_TIME);
            $cache['date_filter'] = $date_filter;
            $cassiopeia_detail_report_tab_6_filter_form = drupal_get_form("cassiopeia_select_month_form",$cache);
            if(!empty($cassiopeia_detail_report_tab_6_filter_form)){
                $cassiopeia_detail_report_tab_6_filter_form = drupal_render($cassiopeia_detail_report_tab_6_filter_form);
                print($cassiopeia_detail_report_tab_6_filter_form);
            }
            ?>
            <?php
            $_sales = array();

            $query = db_select("users","tbl_user");
            $query -> join("users_roles","tbl_role","tbl_role.uid = tbl_user.uid");
            $query -> condition("tbl_role.rid",4);
            $query -> leftJoin("field_data_field_account_status","field_account_status","field_account_status.entity_id = tbl_user.uid");
            $query -> leftJoin("field_data_field_account_sale","tbl_sale","tbl_sale.entity_id = tbl_user.uid");
            $query->fields("tbl_user");
            $query->fields("tbl_sale");
            $query->orderBy("tbl_user.created","DESC");
            $query->condition("field_account_status.field_account_status_tid",10);
            if(!empty($date_filter && $date_filter!="all")){
                $first_day_of_moth = strtotime(date('Y-m-01 00:00',strtotime("01-".$date_filter)));
                $last_day_of_moth = strtotime(date("Y-m-t 23:59",strtotime("01-".$date_filter)));
                $query->condition("tbl_user.created",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
            }
            $dangky = $query -> execute() -> fetchAll();

            try{
                $query = db_select("users","tbl_user");
                $query->addField("tbl_user","uid","agent_id");
                $query -> join("users_roles","tbl_role","tbl_role.uid = tbl_user.uid");
                $query -> condition("tbl_role.rid",4);
                $query -> leftJoin("field_data_field_account_status","field_account_status","field_account_status.entity_id = tbl_user.uid");
                $query->fields("field_account_status");
                $query -> join("field_data_field_account_sale","tbl_sale","tbl_sale.entity_id = tbl_user.uid");
                $query->fields("tbl_sale");
                $query->fields("tbl_user");
                $query->orderBy("tbl_user.created","DESC");
                $query->condition("field_account_status.field_account_status_tid",22);
                if(!empty($date_filter && $date_filter!="all")){
                    $first_day_of_moth = strtotime(date('Y-m-01 00:00',strtotime("01-".$date_filter)));
                    $last_day_of_moth = strtotime(date("Y-m-t 23:59",strtotime("01-".$date_filter)));
                    $query->condition("tbl_user.created",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
                }
                $tong_tiemnang = $query -> execute() -> fetchAll();
            }catch (Exception $e){
                print_r($e);
            }
            if(!empty($tong_tiemnang)){
                foreach($tong_tiemnang as $value){
                    $_sales[$value->field_account_sale_target_id]['tiem-nang'][] = $value->agent_id;
                }
            }

            try{
                $query = db_select("users","tbl_user");
                $query->addField("tbl_user","uid","agent_id");
                $query->join("users_roles","tbl_role","tbl_role.uid = tbl_user.uid");
                $query->condition("tbl_role.rid",4);
                $query->leftJoin("field_data_field_account_status","field_account_status","field_account_status.entity_id = tbl_user.uid");
                $query->leftJoin("field_data_field_account_updated_date","field_account_updated_date","field_account_updated_date.entity_id = tbl_user.uid");
//                $query->addField("field_account_updated_date","field_account_updated_date_value","updated_date");
                $query->fields("field_account_updated_date");
                $query->fields("field_account_status");
                $query->join("field_data_field_account_sale","tbl_sale","tbl_sale.entity_id = tbl_user.uid");
                $query->fields("tbl_sale");
                $query->fields("tbl_user");
                $query->orderBy("field_account_updated_date.field_account_updated_date_value","DESC");
                $query->condition("field_account_status.field_account_status_tid",13);
                if(!empty($date_filter && $date_filter!="all")){
                    $first_day_of_moth = strtotime(date('Y-m-01 00:00',strtotime("01-".$date_filter)));
                    $last_day_of_moth = strtotime(date("Y-m-t 23:59",strtotime("01-".$date_filter)));
                    $query->condition("field_account_updated_date.field_account_updated_date_value",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
                }
                $tong_daban = $query -> execute() -> fetchAll();
//                _print_r($tong_daban);
            }catch (Exception $e){
                print_r($e);
            }
            if(!empty($tong_daban)){
                foreach($tong_daban as $value){
                    $_sales[$value->field_account_sale_target_id]['da-ban'][] = $value->agent_id;
                }
            }

            try{
                $query = db_select("users","tbl_user");
                $query->addField("tbl_user","uid","agent_id");
                $query -> join("users_roles","tbl_role","tbl_role.uid = tbl_user.uid");
                $query -> condition("tbl_role.rid",4);
                $query -> leftJoin("field_data_field_account_status","field_account_status","field_account_status.entity_id = tbl_user.uid");
                $query->fields("field_account_status");
                $query -> join("field_data_field_account_sale","tbl_sale","tbl_sale.entity_id = tbl_user.uid");
                $query->fields("tbl_sale");
                $query->fields("tbl_user");
                $query->orderBy("tbl_user.created","DESC");
                if(!empty($date_filter && $date_filter!="all")){
                    $first_day_of_moth = strtotime(date('Y-m-01 00:00',strtotime("01-".$date_filter)));
                    $last_day_of_moth = strtotime(date("Y-m-t 23:59",strtotime("01-".$date_filter)));
                    $query->condition("tbl_user.created",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
                }
                $query->condition("field_account_status.field_account_status_tid",14);
                $tong_nghiban = $query -> execute() -> fetchAll();
            }catch (Exception $e){
                print_r($e);
            }
            if(!empty($tong_nghiban)){
                foreach($tong_nghiban as $value){
                    $_sales[$value->field_account_sale_target_id]['nghi-ban'][] = $value->agent_id;
                }
            }
            try{
                $query = db_select("users","tbl_user");
                $query->addField("tbl_user","uid","agent_id");
                $query -> join("users_roles","tbl_role","tbl_role.uid = tbl_user.uid");
                $query -> condition("tbl_role.rid",4);
//                $query -> leftJoin("field_data_field_account_status","field_account_status","field_account_status.entity_id = tbl_user.uid");
//                $query->fields("field_account_status");
                $query -> join("field_data_field_account_sale","tbl_sale","tbl_sale.entity_id = tbl_user.uid");
                $query->fields("tbl_sale");
                $query->fields("tbl_user");
                $query->join("tbl_issue_report","tbl_issue_report","tbl_issue_report.agent=tbl_user.uid");
                $query->groupBy("tbl_issue_report.agent");
                $query->orderBy("tbl_user.created","DESC");
                if(!empty($date_filter && $date_filter!="all")){
                    $first_day_of_moth = strtotime(date('Y-m-01 00:00',strtotime("01-".$date_filter)));
                    $last_day_of_moth = strtotime(date("Y-m-t 23:59",strtotime("01-".$date_filter)));
                    $query->condition("tbl_issue_report.date",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
                }
                $tong_hoatdong = $query -> execute() -> fetchAll();
//                _print_r($tong_hoatdong);
            }catch (Exception $e){
                print_r($e);
            }
            if(!empty($tong_hoatdong)){
                foreach($tong_hoatdong as $value){
                    $_sales[$value->field_account_sale_target_id]['hoat-dong'][$value->agent_id] = $value->agent_id;
                }
            }
//            $query = db_select("users","tbl_user");
//            $query->addField("tbl_user","uid","agent_id");
//            $query -> join("users_roles","tbl_role","tbl_role.uid = tbl_user.uid");
//            $query -> condition("tbl_role.rid",4);
//            //                $query -> leftJoin("field_data_field_account_status","field_account_status","field_account_status.entity_id = tbl_user.uid");
//            //                $query->fields("field_account_status");
//            $query -> join("field_data_field_account_sale","tbl_sale","tbl_sale.entity_id = tbl_user.uid");
//            $query->fields("tbl_sale");
//            $query->fields("tbl_user");
//            $query->join("tbl_payment_report","tbl_payment_report","tbl_payment_report.agent=tbl_user.uid");
//            $query->groupBy("tbl_payment_report.agent");
//            $query->orderBy("tbl_user.created","DESC");
//            if(!empty($date_filter && $date_filter!="all")){
//                $first_day_of_moth = strtotime(date('Y-m-01 00:00',strtotime("01-".$date_filter)));
//                $last_day_of_moth = strtotime(date("Y-m-t 23:59",strtotime("01-".$date_filter)));
//                $query->condition("tbl_user.created",array($first_day_of_moth,$last_day_of_moth),"BETWEEN");
//            }
//            $tong_hoatdong = $query -> execute() -> fetchAll();
//            if(!empty($tong_hoatdong)){
//                foreach($tong_hoatdong as $value){
//                    $_sales[$value->field_account_sale_target_id]['hoat-dong'][$value->agent_id] = $value->agent_id;
//                }
//            }
//            _print_r( $_sales[$value->field_account_sale_target_id]['hoat-dong']);
            ?>
        </div>
       <div class="table-responsive">
           <table class="table table-hover">
               <thead>
               <tr>
                   <th>SALE</th>
                   <th>Đăng kí</th>
                   <th>Tiềm năng</th>
                   <th>Đã bán</th>
                   <th>Nghỉ bán</th>
                   <th>Hoạt động</th>
               </tr>
               <tr>
                   <th>Tổng</th>
                   <th><?php print(number_format(count($dangky),0,",",",")); ?></th>
                   <th><?php print(number_format(count($tong_tiemnang),0,",",",")); ?></th>
                   <th><?php print(number_format(count($tong_daban),0,",",",")); ?></th>
                   <th><?php print(number_format(count($tong_nghiban),0,",",",")); ?></th>
                   <th><?php print(number_format(count($tong_hoatdong),0,",",",")); ?></th>
               </tr>
               </thead>
               <tbody>
               <?php if(!empty($_sales)): ?>
                   <?php foreach($_sales as $uid => $value):  $sale = user_load($uid);?>
                       <!--                    --><?php //_print_r($value['hoat-dong    ']); ?>
                       <tr>
                           <td colspan="2">
                               <?php print(!empty($sale->field_account_transaction_name['und'][0]['value'])?$sale->field_account_transaction_name['und'][0]['value']:"");?>
                           </td>
                           <!--                                    <td>--><?php //print(!empty($dangky)?count($dangky):0); ?><!--</td>-->
                           <td><a href="/admin/manager/partners/<?php print($sale->uid); ?>/22/<?php echo($date_filter); ?>"><?php print(!empty($value['tiem-nang'])?count($value['tiem-nang']):0); ?></a></td>
                           <td><a href="/admin/manager/partners/<?php print($sale->uid); ?>/13/<?php echo($date_filter); ?>"><?php print(!empty($value['da-ban'])?count($value['da-ban']):0); ?></a></td>
                           <td><a href="/admin/manager/partners/<?php print($sale->uid); ?>/14/<?php echo($date_filter); ?>"><?php print(!empty($value['nghi-ban'])?count($value['nghi-ban']):0); ?></a></td>
                           <td><?php print(!empty($value['hoat-dong'])?count($value['hoat-dong']):0); ?></td>
                           <!--                                <td>--><?php //print(!empty($daban)?count($daban):0); ?><!--</td>-->
                           <!--                                <td>--><?php //print(!empty($nghiban)?count($nghiban):0); ?><!--</td>-->
                       </tr>
                   <?php endforeach; ?>
               <?php endif; ?>
               </tbody>
           </table>
       </div>
    </div>
<?php endif; ?>