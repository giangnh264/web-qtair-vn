<?php
global $user;
$id = $variables['id'];
$query = db_select("tbl_payment_report","tbl_payment_report");
$query -> fields("tbl_payment_report");
$query -> condition("id",$id);
$data = $query->execute()->fetchObject();
$amount = str_replace(".","",$data->amount);
?>
<tr data-key="<?php print($data->tran_code);?>" class="desktop-detail-row tr-issue-tran-kind-<?php print($data->tran_kind); ?>">
    <td class="visible-xs"><span class="fa fa-plus"></span></td>
    <?php if(user_has_role(3)): ?>
        <td  class="hidden-xs"><?php print($data->tran_code); ?></td>
    <?php endif; ?>
    <!--                <td  class="hidden-xs">--><?php //print($stt); ?><!--</td>-->
    <td  class="hidden-xs"><?php print(date("d/m/Y H:i",$data->created)); ?></td>
    <td  class=""><?php print(date("d/m/Y H:i",$data->date)); ?></td>
    <td class="">
        <?php
        $tran_kind = cassiopeia_get_tran_kind_by_id($data->tran_kind);
        print($tran_kind['name']);
        ?>
    </td>
    <td class="">
<!--        --><?php //print($data->PNR!=$data->created?$data->PNR:""); ?>
    </td>
    <td class="<?php print($tran_kind['type']==1?"plus":"minus"); ?> text-right">
        <?php if($tran_kind['type']==1): ?>
            <?php print(number_format(abs($data->amount),0,",",".")); ?>
        <?php else: ?>
            <?php print(number_format(-abs($data->amount),0,",",".")); ?>
        <?php endif; ?>
    </td>
    <td class="hidden-xs">
        <?php
        $agent = user_load($data->agent);
        if(!empty($agent)){
            print($agent->field_account_code['und'][0]['value']);
            if(!empty($agent->field_account_transaction_name['und'][0]['value'])){
                print(" - ");
                print($agent->field_account_transaction_name['und'][0]['value']);
            }
        }
        //                        ?>
    </td>
    <td class="hidden-xs">
        <?php
        $tran_user = user_load($data->tran_user);
        if(!empty($tran_user)){
            print(!empty($tran_user->field_account_transaction_name['und'][0]['value'])?$tran_user->field_account_transaction_name['und'][0]['value']:$tran_user->name);
        }
        //                        ?>
    </td>
    <td class="hidden-xs"><?php print($data->content); ?></td>
    <?php if(user_has_role(3) || user_has_role(8)|| user_has_role(7)): ?>
        <td class="hidden-xs"><?php print(number_format($data->balance,0,",",".")); ?></td>
    <?php endif; ?>
    <?php if(user_has_role(3)): ?>
        <td class="hidden-xs"><span data-tran-code="<?php print($data->tran_code); ?>" class="btn btn-danger fa fa-trash btn-delete-report"></span></td>
    <?php endif; ?>
</tr>