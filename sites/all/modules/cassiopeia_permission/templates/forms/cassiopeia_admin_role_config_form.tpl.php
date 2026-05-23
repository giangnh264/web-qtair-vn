<div class="s-block">
    <div class="block-title">
        <h2><label for="">Vai trò: </label><?php echo $form['#role']->name ?></h2>
    </div>
    <table class="table table-hover table-stripped">
        <thead>
        <tr>
            <th>Module</th>
            <th>Xem</th>
            <th>Thêm</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($form['#modules'] as $module):?>
            <tr>
                <td><?php echo $module->title; ?></td>
                <td><?php echo drupal_render($form['module-group']['module-group-'.$module->id]['view_'.$module->id]) ?></td>
                <td><?php echo drupal_render($form['module-group']['module-group-'.$module->id]['add_'.$module->id]) ?></td>
                <td><?php echo drupal_render($form['module-group']['module-group-'.$module->id]['edit_'.$module->id]) ?></td>
                <td><?php echo drupal_render($form['module-group']['module-group-'.$module->id]['delete_'.$module->id]) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="form-actions">
        <?php echo drupal_render($form['submit']); ?>
    </div>
</div>
<div class="hidden">
    <?php echo drupal_render_children($form); ?>
</div>