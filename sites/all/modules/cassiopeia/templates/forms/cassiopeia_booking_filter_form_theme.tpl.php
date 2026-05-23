<?php if (!empty($form['date_filter'])): ?>
    <div class="form-item col-xs-6 col-md-2">
        <?php print(drupal_render($form['date_filter'])); ?>
    </div>
<?php endif; ?>
<?php if (!empty($form['from_date'])): ?>
    <div class="form-item col-xs-6 col-md-2">
        <?php print(drupal_render($form['from_date'])); ?>
    </div>
<?php endif; ?>

<?php if (!empty($form['to_date'])): ?>
    <div class="form-item col-xs-6 col-md-2">
        <?php print(drupal_render($form['to_date'])); ?>
    </div>
<?php endif; ?>
<?php if (!empty($form['booking_code'])): ?>
    <div class="form-item col-xs-6 col-md-2">
        <?php print(drupal_render($form['booking_code'])); ?>
    </div>
<?php endif; ?>
<?php if (!empty($form['pnr_code'])): ?>
    <div class="form-item col-xs-6 col-md-2">
        <?php print(drupal_render($form['pnr_code'])); ?>
    </div>
<?php endif; ?>
<?php if (!empty($form['itinerary'])): ?>
    <div class="form-item col-xs-6 col-md-2">
        <?php print(drupal_render($form['itinerary'])); ?>
    </div>
<?php endif; ?>
<?php if (!empty($form['status'])): ?>
    <div class="form-item col-xs-6 col-md-2">
        <?php print(drupal_render($form['status'])); ?>
    </div>
<?php endif; ?>
<?php if (!empty($form['agent'])): ?>
    <div class="form-item col-xs-6 col-md-2">
        <?php print(drupal_render($form['agent'])); ?>
    </div>
<?php endif; ?>
<?php if (!empty($form['airline'])): ?>
    <div class="form-item col-xs-6 col-md-2">
        <?php print(drupal_render($form['airline'])); ?>
    </div>
<?php endif; ?>
<?php if (!empty($form['start_point'])): ?>
    <div class="form-item col-xs-6 col-md-2">
        <?php print(drupal_render($form['start_point'])); ?>
    </div>
<?php endif; ?>
<?php if (!empty($form['end_point'])): ?>
    <div class="form-item col-xs-6 col-md-2">
        <?php print(drupal_render($form['end_point'])); ?>
    </div>
<?php endif; ?>
<?php if (!empty($form['departure_date'])): ?>
    <div class="form-item col-xs-6 col-md-2">
        <?php print(drupal_render($form['departure_date'])); ?>
    </div>
<?php endif; ?>
<?php if (!empty($form['full_name'])): ?>
    <div class="form-item col-xs-6 col-md-2">
        <?php print(drupal_render($form['full_name'])); ?>
    </div>
<?php endif; ?>
<?php if (!empty($form['email'])): ?>
    <div class="form-item col-xs-6 col-md-2">
        <?php print(drupal_render($form['email'])); ?>
    </div>
<?php endif; ?>
<?php if (!empty($form['tel'])): ?>
    <div class="form-item col-xs-6 col-md-2">
        <?php print(drupal_render($form['tel'])); ?>
    </div>
<?php endif; ?>

<?php if (!empty($form['uncheck'])): ?>
    <div class="form-item col-md-12 form-button">
        <div class="hidden">
            <?php print(drupal_render($form['uncheck'])); ?>
            <?php print(drupal_render($form['submit'])); ?>
        </div>
        <div class="">
            <?php print(drupal_render($form['item_per_page'])); ?>
        </div>
    </div>
<?php endif; ?>
<?php print drupal_render_children($form); ?>