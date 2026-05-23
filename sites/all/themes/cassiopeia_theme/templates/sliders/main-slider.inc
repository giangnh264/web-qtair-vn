<?php
/**
 * Created by PhpStorm.
 * User: VDP
 * Date: 18/04/2017
 * Time: 2:17 PM
 */
?>

<?php

global $language;
$lang_name = $language->language;
$term = taxonomy_term_load(1);


if ( module_exists ('i18n')) {
	$translated_term = i18n_taxonomy_term_get_translation($term, $lang_name);

}else {
	$translated_term = $term;
}
$search_data = null;
if(!empty($_SESSION['search_data'])){
    $search_data = ($_SESSION['search_data']);
}
$_mail_slider = cassiopeia_adv_view_adv($translated_term->tid);
?>
<?php //if (!empty($_mail_slider)): ?>
<!--  --><?php //drupal_add_js(drupal_get_path('theme', 'cassiopeia_theme') . '/js/slider-main.js', array('weight' => 1000)); ?>
<!--    <div id="main-slider">-->
<!--        <div class="swiper-container">-->
<!--            --><?php //print($_mail_slider); ?>
<!--        </div>-->
<!--        --><?php //print(_cassiopeia_render_theme("module","cassiopeia","templates/forms/search-fly-form-type-1.tpl.php",array("data"=>$search_data))); ?>
<!--        <div class="main-slider-text">-->
<!--            <div class="container main-slider-text-container">-->
<!--                <h2>Ai cũng có thể bán vé máy bay</h2>-->
<!--                <h4>Đăng ký bán vé ngay chiết khấu lên tới 800.000 vnđ</h4>-->
<!--                <a href="">Đăng ký ngay</a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<?php //endif; ?>
<div class="banner">
        <div id="main-slider">
            <?php print($_mail_slider); ?>
        </div>
    <div class="search-bar-on-banner">
        <div class="container">
            <?php print(_cassiopeia_render_theme("module", "cassiopeia", "templates/forms/search-fly-form-type-1.tpl.php", array("data" => $search_data))); ?>
        </div>
    </div>
</div>
