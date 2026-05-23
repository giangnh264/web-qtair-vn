<?php

?>


<?php //if ($form['#permissiontype'] == 'f1') : ?>
<div class="table-wrapper">
    <div class="table-responsive">
        <table class="table table-custom">
            <thead>
            <tr>
                <th width="70px">
                    <div class="checkbox">
                        <label class="control-label checkbox-checkcontainer" for="check-all">
                            <input type="checkbox" id="check-all" name="check-all" value="2" class="form-checkbox"><span class="title"></span>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </th>
                <th>Quyền</th>
                <th>Mô tả</th>
<!--                --><?php //if (!empty($form['#user']->field_account_position['und'])): ?>
<!--                    --><?php //foreach ($form['#user']->field_account_position['und'] as $_key_ => $_value_): ?>
<!--                        <th>-->
<!--                            --><?php //echo kenfox_user_user_position_load($_value_['value'])->name; ?>
<!--                        </th>-->
<!--                    --><?php //endforeach; ?>
<!--                --><?php //endif; ?>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($form['#permissions'] as $key => $permission) :?>
                <tr>
                    <td><?php print(drupal_render($form[$key]['check'])); ?></td>
                    <td><?php print(drupal_render($form[$key]['title'])); ?></td>
                    <td><?php print(drupal_render($form[$key]['description'])); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="table-footer">
        <div class="table-multi-actions">
            <?php print(drupal_render($form['submit'])); ?>
        </div>
    </div>
</div>
<?php //endif; ?>



<?php
print (drupal_render_children($form));
?>
