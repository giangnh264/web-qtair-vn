<?php if(!empty($result)): ?>
    <?php foreach($result as $item): ?>
        <tr>
            <td style="white-space: nowrap"><?php echo $item->name; ?></td>
            <td style="white-space: nowrap"><?php echo $item->tel; ?></td>
            <td>
                <?php if(!empty($item->VN)): ?>
                    <div style="white-space: nowrap">VN: <?php echo $item->VN ?></div>
                <?php endif; ?>
                <?php if(!empty($item->QH)): ?>
                    <div style="white-space: nowrap">QH: <?php echo $item->QH ?></div>
                <?php endif; ?>
            </td>
            <td>
                <?php echo !empty($item->note)?$item->note:""; ?>
            </td>
            <?php if(user_has_role(3) && $type=="other"): ?>
                <td>
                    <?php
                    $agent = user_load($item->uid);
                    if(!empty($agent)) echo $agent->field_account_code['und'][0]['value'];
                    ?>
                </td>
            <?php endif; ?>
            <td class="table-actions">
                <button class="btn btn-primary btn-edit" data-id="<?php echo $item->id; ?>"><i class="fa fa-edit"></i></button>
                <!--                                --><?php //if(!user_has_role(8)): ?>
                <button class="btn btn-danger btn-delete" data-id="<?php echo $item->id; ?>"><i class="fa fa-trash"></i></button>
                <!--                                --><?php //endif; ?>
            </td>

        </tr>
    <?php endforeach; ?>
<?php endif; ?>