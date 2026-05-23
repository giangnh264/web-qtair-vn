
<div class="">
    <table class="table setup-table table-hover table-stripped config-price-table">
        <tbody>
        <tr class="tip">
            <td colspan="3"><h2 class="mg-t-30"><?php echo user_has_role(4)?"Thiết lập giá":"Phí hoa hồng"; ?></h2></td>
        </tr>
        <tr>
            <th colspan="3" class="text-center">
                <?php echo drupal_render($form['infant']); ?>
            </th>
        </tr>
        <tr>
            <td colspan="3"><b>Phí nội địa</b></td>
        </tr>
        <tr class="mb-flex">
            <td scope="col" class="text-left brand">Hãng</td>
            <td scope="col">
                <div class="d-flex a-center j-center">
                    <?php echo drupal_render($form['ECO_SYNC']); ?> ECO
                </div>
            </td>
            <td scope="col">
                <div class="d-flex a-center j-center">
                    <?php echo drupal_render($form['BUSINESS_SYNC']); ?> Business
                </div>
            </td>
        </tr>
        <tr class="mb-flex">
            <td class="text-left">VN</td>
            <td>
                <div data-class="ECO_SYNC"  class="input-parent">
                    <span class="fa fa-minus"></span>
                    <?php echo drupal_render($form['VN_ECO']); ?>
                    <span class="fa fa-plus"></span>
                </div>
            </td>
            <td>
                <div data-class="BUSINESS_SYNC" class="input-parent">
                    <span class="fa fa-minus"></span>
                    <?php echo drupal_render($form['VN_OTHER']); ?>
                    <span class="fa fa-plus"></span>
                </div>
            </td>
        </tr>
        <tr class="mb-flex">
            <td class="text-left">QH</td>
            <td>
                <div data-class="ECO_SYNC" class="input-parent">
                    <span class="fa fa-minus"></span>
                    <?php echo drupal_render($form['QH_ECO']); ?>
                    <span class="fa fa-plus"></span>
                </div>
            </td>
            <td>
                <div data-class="BUSINESS_SYNC" class="input-parent">
                    <span class="fa fa-minus"></span>
                    <?php echo drupal_render($form['QH_OTHER']); ?>
                    <span class="fa fa-plus"></span>
                </div>
            </td>
        </tr>
        <tr class="mb-flex">
            <td class="text-left">VJ</td>
            <td>
                <div data-class="ECO_SYNC" class="input-parent">
                    <span class="fa fa-minus"></span>
                    <?php echo drupal_render($form['VJ_ECO']); ?>
                    <span class="fa fa-plus"></span>
                </div>
            </td>
            <td>
                <div data-class="BUSINESS_SYNC" class="input-parent">
                    <span class="fa fa-minus"></span>
                    <?php echo drupal_render($form['VJ_OTHER']); ?>
                    <span class="fa fa-plus"></span>
                </div>
            </td>
        </tr>
        <tr class="mb-flex">
            <td class="text-left">VU</td>
            <td>
                <div data-class="ECO_SYNC" class="input-parent">
                    <span class="fa fa-minus"></span>
                    <?php echo drupal_render($form['VT_ECO']); ?>
                    <span class="fa fa-plus"></span>
                </div>
            </td>
            <td>
                <div data-class="BUSINESS_SYNC" class="input-parent">
                    <span class="fa fa-minus"></span>
                    <?php echo drupal_render($form['VT_OTHER']); ?>
                    <span class="fa fa-plus"></span>
                </div>
            </td>
        </tr>
        <tr class="mb-flex">
            <td class="text-left">SPA</td>
            <td>
                <div data-class="ECO_SYNC" class="input-parent">
                    <span class="fa fa-minus"></span>
                    <?php echo drupal_render($form['SPA_ECO']); ?>
                    <span class="fa fa-plus"></span>
                </div>
            </td>
            <td>
                <div data-class="BUSINESS_SYNC" class="input-parent">
                    <span class="fa fa-minus"></span>
                    <?php echo drupal_render($form['SPA_OTHER']); ?>
                    <span class="fa fa-plus"></span>
                </div>
            </td>
        </tr>
        <tr class="international">
            <td colspan="3"><b>Phí quốc tế</b></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <div class="cost">
                    <span class="text-left">Phí cộng thêm</span>
                    <div data-class="" class="input-parent">
                        <span class="fa fa-minus"></span>
                        <?php echo drupal_render($form['amount']); ?>
                        <span class="fa fa-plus"></span>
                    </div>
                </div>
            </td>
<!--            <td>-->
<!--                <div class="percent">-->
<!--                    <span class="text-left">% Giá vé</span>-->
<!--                    <div>-->
<!--                        <div data-class="" class="input-parent">-->
<!--                            --><?php //echo drupal_render($form['percent']); ?>
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </td>-->
        </tr>

        </tbody>
    </table>
</div>
<div class="form-action">
    <?php print(drupal_render($form['submit'])); ?>
    <button class="btn btn-default btn-rs-config">Khôi phục</button>
</div>
<div class="hidden">
    <?php print drupal_render_children($form); ?>
</div>
