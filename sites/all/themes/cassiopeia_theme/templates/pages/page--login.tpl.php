<?php
$site_name = variable_get('site_name');
?>
<?php include('header.inc'); ?>
<div class="wrapper page-login">
    <div id="main-container">
        <div class="col-lg-8 col-sm-10 container login-index">
            <div class="row">
                <div class="block-login clearfix">
                    <div class="region region-content">
                        <div class="col-sm-12 col-xs-12">
                            <h3>Đăng nhập</h3>
                        </div>
                        <div class="col-sm-12 col-xs-12">
                            <?php print render($page['content']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>