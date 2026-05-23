<div class="booking-payment">
    
    
    <div class="page-container container">
        <!-- EDIT INTERFACE -->
        <div class="payment-wrap">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-7 payment-method">
                    <div class="payment-method-wrap">
                        <form action="" class="form-payment-method">
                            <div class="page-booking-content-left-payment">
                                <div class="form-order-info-item">
                                    <div class="form-order-info-item-content pd-r-large">
                                        <?php echo drupal_render($form['payment']['method']); ?>
                                    </div>
                                </div>
                                <div class="page-booking-content-left-payment-item-node">
                                    <?php echo drupal_render($form['submit']); ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- EDIT INTERFACE -->
    </div>
</div>


<div class="hidden">
    <?php echo drupal_render_children($form); ?>
</div>