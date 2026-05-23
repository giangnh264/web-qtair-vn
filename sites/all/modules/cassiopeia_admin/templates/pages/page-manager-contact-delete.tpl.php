<?php
$contact = $variables['contact'];
$cassiopeia_contact_delete_form = drupal_get_form('cassiopeia_contact_delete_form', $contact );
$cassiopeia_contact_delete_form = drupal_render($cassiopeia_contact_delete_form);


?>

<div class="page-trademark-delete">
    <?php print($cassiopeia_contact_delete_form); ?>
</div>


