<?php
$rules = ($variables['rules']);

?>
<?php if(!empty(($rules))): ?>
    <span>Điều kiện vé</span>
    <div>
        <?php foreach($rules as $value): ?>
            <div class="block-content">
                <?php if(!empty($value->body['und'][0]['value'])) print($value->body['und'][0]['value']); ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>



