<?php $log = $variables['log']; ?>
<pre>
    <?php print_r(json_encode(unserialize($log->data))); ?>
</pre>
<pre>
    <?php print_r(unserialize($log->response)); ?>
</pre>
<?php _print_r($log) ?>
