
<?php
$google_map = variable_get("contact_map");
$contact_title = variable_get("contact_title");
//    $lienhe
$lienhe = variable_get('contact_content', array(
    'value' => '',
    'format' => 'full_html'
));
?>

<div class="page page-contact">
    <div class="page-container container">
        <div class="page-inner">
            <h2
                    class="heading heading-secondary clr-black text-uppercase mb-3"
            >
                Liên hệ
            </h2>
            <div class="qt-contact">
                <div class="row">
                    <div class="col-md-6">
                        <div class="qt-contact-map">
                            <?php if(!empty($google_map)){
                                print($google_map);
                            } ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="qt-contact-form">
                            <h3
                                    class="text-uppercase heading heading-tertiary clr-dark"
                            >
                                <?php if(!empty($contact_title)) echo($contact_title); ?>
                            </h3>

                            <ul class="custom-nav mt-2 address-nav">
                                <li>
                                    <p>
<!--                                        <i class="fa-regular fa-location-dot mr-1"></i>-->
                                        Cơ sở 1:
                                        <b>Số 20, Thạnh Lộc, Quận 12, TP. Hồ Chí Minh</b>
                                    </p>
                                </li>
                                <li>
                                    <p>
<!--                                        <i class="fa-regular fa-location-dot mr-1"></i>-->
                                        Cơ sở 2:
                                        <b> Số 44, Nguyễn Sỹ Sách, TP. Vinh, Nghệ An </b>
                                    </p>
                                </li>
                                <li>
                                    <p>
<!--                                        <i class="fa-regular fa-location-dot mr-1"></i>-->
                                        Cơ sở 3:
                                        <b
                                        >Số 232, Quốc lộ 46, xã Hưng Chính, TP. Vinh, Nghệ
                                            An</b
                                        >
                                    </p>
                                </li>
                            </ul>

                            <div class="mt-3">
                                <?php
                                $contact_form = drupal_get_form("cassiopeia_contact_form");
                                if(!empty($contact_form)){
                                    $contact_form = drupal_render($contact_form);
                                    print($contact_form);
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>