<?php cassiopeia_set_view_log(); ?>
<div class="wrapper page">
  <?php include('header.inc'); ?>
    <div id="main-container">
        <!-- Content Header (Page header) -->
<!--        <section class="container cassiopeia-container content-header">-->
<!--          <div id="breadcrumb">-->
<!--            --><?php //if (!empty($breadcrumb)): ?>
<!--              --><?php //print $breadcrumb; ?>
<!--            --><?php //endif; ?>
<!--          </div>-->
<!--        </section>-->
        <!-- Main content -->
        <section class="content  cassiopeia-container">
            <div id="content" class="clearfix">
              <?php if ($messages): ?>
                  <div id="console" class="clearfix"><?php print $messages; ?></div>
              <?php endif; ?>
              <?php if ($action_links): ?>
                  <!-- <ul class="action-links"><?php print render($action_links); ?></ul> -->
              <?php endif; ?>
              <?php if ($tabs): ?>
                  <div class="tabs">
                    <?php print render($tabs); ?>
                  </div>
              <?php endif; ?>
              <?php print render($page['content']); ?>
            </div>
        </section>
        <!-- /.content -->
    </div>
  <?php include('footer.inc'); ?>
</div>

