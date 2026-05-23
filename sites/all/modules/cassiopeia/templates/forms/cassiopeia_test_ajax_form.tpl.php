<?php
$daily_items = $form['#daily_items'];
$date_filter = $form['#date_filter'];
_print_r($form['sort_by']['#value']);
?>
<?php
echo drupal_render_children($form);
?>
<table class="table table-hover table-stripped">
    <thead>
    <tr>
        <th class="<?php if(!empty($form['sort_by']['#value'])&&$form['sort_by']['#value']=="date") echo $form['sort_direction']['#value']; ?>">Ngày</th>
        <th class="<?php if(!empty($form['sort_by']['#value'])&&$form['sort_by']['#value']=="total_partner_price") echo $form['sort_direction']['#value']; ?>">Doanh thu</th>
        <th class="<?php if(!empty($form['sort_by']['#value'])&&$form['sort_by']['#value']=="total_price") echo $form['sort_direction']['#value']; ?>">Giá vốn</th>
        <th class="<?php if(!empty($form['sort_by']['#value'])&&$form['sort_by']['#value']=="total_revenue") echo $form['sort_direction']['#value']; ?>">Lợi nhuận</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($daily_items as $key => $daily_item): ?>
        <tr>
            <td><?php echo $key; ?></td>
            <td><?php echo !empty($daily_item)?number_format($daily_item->total_partner_price,0,",","."):0; ?></td>
            <td><?php echo !empty($daily_item)?number_format($daily_item->total_price,0,",","."):0; ?></td>
            <td><?php echo !empty($daily_item)?number_format($daily_item->total_revenue,0,",","."):0; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
