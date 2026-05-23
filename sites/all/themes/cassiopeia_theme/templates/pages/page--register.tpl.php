<?php
$config = node_load(12);
?>
<?php if ($messages): ?>
    <div id="console" class="clearfix"><?php print $messages; ?></div>
<?php endif; ?>
<?php include('header.inc'); ?>
<div class="page page-re-log">
    <div class="page-container">
        <div class="page-inner">
            <div class="qt-form-user">
                <div class="qt-form-user-container">
                    <?php print render($page['content']); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.inc'); ?>
