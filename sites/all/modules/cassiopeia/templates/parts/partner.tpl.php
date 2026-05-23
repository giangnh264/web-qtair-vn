<?php
global $user;
$_partner = $variables['partner'];

?>
<?php if(cassiopeia_check_permission("cassiopeia_user_permission_partner","p_edit")): ?>
    <td>
        <a href="/user/<?php print($_partner->uid); ?>/edit"><i class="fa fa-pencil-square-o"></i></a>
    </td>
<?php endif; ?>
<td><?php if(!empty($_partner->field_account_code['und'][0]['value'])) print($_partner->field_account_code['und'][0]['value']); ?></td>
<td><?php if(!empty($_partner->field_account_transaction_name['und'][0]['value'])) print(strtoupper($_partner->field_account_transaction_name['und'][0]['value'])); ?></td>
<td><?php if(!empty($_partner->field_account_full_name['und'][0]['value'])) print(strtoupper($_partner->field_account_full_name['und'][0]['value'])); ?></td>
<td><?php print(date("d/m/Y",$_partner->created)); ?></td>
<td><?php if(!empty($_partner->name)) print($_partner->name); ?></td>
<td><?php print(strtolower($_partner->mail)); ?></td>
<td>
    <?php
    if(!empty($_partner->field_account_sale['und'])){
        $sale = user_load($_partner->field_account_sale['und'][0]['target_id']);
        if(!empty($sale->field_account_transaction_name['und'])) print($sale->field_account_transaction_name['und'][0]['value']);
    };
    ?>
</td>
<td class="td-partner-status bold">
    <?php if($_partner->field_account_status['und'][0]['tid']==14 ||  $_partner->field_account_status['und'][0]['tid']==10 || user_has_role(3,$user)): //đăng ký ?>
        <?php if((empty($_partner->field_account_sale['und']) || $_partner->field_account_sale['und'][0]['target_id'] == $user->uid ) && cassiopeia_partner_edit_access()): ?>
            <?php
            $vocal = taxonomy_vocabulary_machine_name_load("user_status");
            $tx_status = taxonomy_get_tree($vocal->vid,0,1);
            ?>
            <div>
                <span class="text-partner-status partner-status-<?php print($_partner->field_account_status['und'][0]['tid']); ?>"><?php print(taxonomy_term_load($_partner->field_account_status['und'][0]['tid'])->name); ?></span>
                <ul>
                    <?php if(!empty($tx_status)): ?>
                        <?php foreach($tx_status as $status): ?>
                            <li data-partner-id="<?php print($_partner->uid); ?>" class=" <?php if($_partner->field_account_status['und'][0]['tid']==$status->tid) print("active"); ?>" data-status-tid="<?php print($status->tid); ?>"><?php print($status->name); ?></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        <?php else: ?>
            <?php
            $query = db_select("tbl_issue_report","tbl_issue_report");
            $query->fields("tbl_issue_report");
            $query->condition("agent",$_partner->uid);
            $query->range(0,1);
            $ticket_online = $query->execute()->fetchObject();
            $query = db_select("tbl_room_booking_report","tbl_room_booking_report");
            $query->fields("tbl_room_booking_report");
            $query->condition("agent",$_partner->uid);
            $query->range(0,1);
            $hotel_online = $query->execute()->fetchObject();
            ?>
            <?php if(!empty($ticket_online)): ?>
                <i class="fa fa-ticket partner-status-13"></i>
            <?php endif; ?>
            <?php if(!empty($hotel_online)): ?>
                <i class="fa fa-building-o partner-status-13"></i>
            <?php endif; ?>
            <!--                                <span class="text-partner-status partner-status---><?php //print($_partner->field_account_status['und'][0]['tid']); ?><!--">--><?php //print(taxonomy_term_load($_partner->field_account_status['und'][0]['tid'])->name); ?><!--</span>-->
        <?php endif; ?>
    <?php else: ?>
        <span class="text-partner-status partner-status-<?php print($_partner->field_account_status['und'][0]['tid']); ?>"><?php print(taxonomy_term_load($_partner->field_account_status['und'][0]['tid'])->name); ?></span>
    <?php endif; ?>
</td>