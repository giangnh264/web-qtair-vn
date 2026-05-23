<?php
$header = $_SERVER['HTTP_USER_AGENT'];
if (strpos($header,"Lighthouse") >0 ){
    echo _cassiopeia_render_theme('module', 'cassiopeia', 'templates/pages/gg-speed.tpl.php');
    exit();
};?>
<?php
/**
 * Created by PhpStorm.
 * User: VDP
 * Date: 16/05/2017
 * Time: 2:10 PM
 */
print render($page['content']['metatags']);
try {
    db_delete("tbl_log")->condition("created", REQUEST_TIME - 86400 * 3, "<=")->execute();
    db_delete("tbl_airline_session")->condition("created", REQUEST_TIME - 86400 * 3, "<=")->execute();
    db_delete("tbl_session")->condition("created", REQUEST_TIME - 86400 * 3, "<=")->execute();
} catch (Exception $e) {
}
$search_data = null;
if (!empty($_SESSION['search_data'])) {
    $search_data = ($_SESSION['search_data']);
}
$home_config = node_load(2623);
?>

<?php if (!empty($messages)) : ?>
    <div id="console" class="clearfix"><?php print $messages; ?></div>
<?php endif; ?>

<?php include('header.inc'); ?>

<?php include(drupal_get_path('theme', 'cassiopeia_theme') . '/templates/sliders/main-slider.inc'); ?>
<div class="page page-home">
    <div class="page-container">
        <div class="page-inner">
            <!-- sec introduce -->
            <section class="sec sec-introduce">
                <div class="sec-container container">
                    <div class="inner">
                        <div class="row">
                            <div class="col-xs-12 col-sm-5 col-md-4">
                                <div class="qt-img-cover">
                                    <?php
                                    $image = cassiopeia_image_load($home_config->field_block_1_left_img['und'][0], "style_360x532");
                                    echo !empty($image) ? $image : "";
                                    ?>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-7 col-md-8">
                                <div class="qt-introduce">
                                    <p class="heading sub-heading text-uppercase clr-gray">
                                        Hợp tác cùng quang trang
                                    </p>
                                    <h2 class="heading heading-secondary clr-dark text-uppercase">
                                        KINH DOANH VÉ MÁY BAY
                                    </h2>
                                    <div class="qt-grid mt-4">
                                        <?php $items = !empty($home_config->field_block_1_item['und']) ? _cassiopeia_load_collections($home_config->field_block_1_item['und']) : array(); ?>
                                        <?php if (!empty($items)) : ?>
                                            <?php foreach ($items as $item) : ?>
                                                <div class="qt-grid-item">
                                                    <span class="icon">
                                                        <?php
                                                        $image = cassiopeia_image_load($item->field_icon['und'][0], "style_38x38");
                                                        echo !empty($image) ? $image : "";
                                                        ?>
                                                    </span>
                                                    <h3 class="heading heading-tertiary text-uppercase clr-black mt-2">
                                                        <?php echo !empty($item->field_title['und'][0]['value']) ? $item->field_title['und'][0]['value'] : ""; ?>
                                                    </h3>
                                                    <div class="paragraph mt-1">
                                                        <?php echo !empty($item->field_content['und'][0]['value']) ? $item->field_content['und'][0]['value'] : ""; ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <a href="/agent/login" class="btn bg-secondary clr-white text ff-bold radius-36 mt-4">Trở thành partner</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.sec introduce -->

            <!-- sec solution -->
            <section class="sec sec-solution">
                <div class="sec-container container">
                    <div class="inner">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="qt-solution">
                                    <h2 class="heading heading-secondary clr-black text-uppercase">
                                        <?php echo !empty($home_config->field_title['und'][0]['value']) ? $home_config->field_title['und'][0]['value'] : ""; ?>
                                    </h2>
                                    <div class="paragraph mt-2">
                                        <?php echo !empty($home_config->field_content['und'][0]['value']) ? $home_config->field_content['und'][0]['value'] : ""; ?>
                                    </div>
                                    <a href="/gioi-thieu" class="btn bg-secondary clr-white radius-36 mt-3 text">Tìm hiểu thêm</a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="qt-img-cover">
                                    <?php
                                    $image = cassiopeia_image_load($home_config->field_image['und'][0], "style_550x390");
                                    echo !empty($image) ? $image : "";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.sec solution -->

            <!-- sec target -->
            <section class="sec sec-target pd-0">
                <div class="sec-container">
                    <div class="inner">
                        <div class="qt-target text-center">
                            <h2 class="heading heading-secondary clr-white text-uppercase">
                                <?php echo !empty($home_config->field_text['und'][0]['value']) ? $home_config->field_text['und'][0]['value'] : ""; ?>
                            </h2>
                            <div class="paragraph mt-2 clr-white">
                                <?php echo !empty($home_config->body['und'][0]['value']) ? $home_config->body['und'][0]['value'] : ""; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.sec target -->

            <!-- sec partner -->
            <section class="sec sec-partner">
                <div class="sec-container container">
                    <div class="inner">
                        <h2 class="heading heading-secondary clr-black text-uppercase text-center">
                            Đối tác hàng không
                        </h2>

                        <p class="text clr-dark mt-1 text-center">
                            Đại lý cấp 1 của hơn
                            <span class="clr-secondary ff-bold">50+</span> hãng hàng
                            không trong nước và Quốc tế
                        </p>

                        <div class="qt-partner mt-4">
                            <?php if (!empty($home_config->field_images['und'])) : ?>
                                <?php foreach ($home_config->field_images['und'] as $image) : ?>
                                    <div class="qt-partner-item">
                                        <?php
                                        $image = cassiopeia_image_load($image, "style_165x58");
                                        echo !empty($image) ? $image : "";
                                        ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.sec partner -->

            <!-- sec comment -->
            <section class="sec sec-comment">
                <div class="sec-container container">
                    <div class="inner">
                        <h2 class="heading heading-secondary clr-black text-uppercase text-center">
                            Thành công của cộng tác viên và đại lý <br />
                            là sự tự hào của chúng tôi
                        </h2>

                        <div class="qt-comment mt-4">
                            <div class="slider-cover">
                                <div class="owl-carousel owl-theme customer-comment">
                                    <?php $items = !empty($home_config->field_block_5_item['und']) ? _cassiopeia_load_collections($home_config->field_block_5_item['und']) : array(); ?>
                                    <?php if (!empty($items)) : ?>
                                        <?php foreach ($items as $item) : ?>
                                            <div class="item">
                                                <div class="box box-infoz">
                                                    <div class="box-body">
                                                        <div class="paragraph mb-4">
                                                            <span class="icon"><img src="/sites/all/themes/cassiopeia_theme/img/icons/comma.svg" class="img-responsive" alt="" /></span> <?php echo !empty($item->field_content['und'][0]['value']) ? $item->field_content['und'][0]['value'] : ""; ?>

                                                        </div>
                                                        <div class="box-infoz-header">
                                                            <div class="circle-icon small">
                                                                <?php
                                                                $image = cassiopeia_image_load($item->field_image['und'][0], "style_60x60");
                                                                echo !empty($image) ? $image : "";
                                                                ?>
                                                            </div>
                                                            <div class="infoz-text">
                                                                <h3 class="heading clr-primary title ff-bold">
                                                                    <?php echo !empty($item->field_title['und'][0]['value']) ? $item->field_title['und'][0]['value'] : ""; ?>
                                                                </h3>
                                                                <p class="ff-light clr-gray-light">
                                                                    <?php echo !empty($item->field_address['und'][0]['value']) ? $item->field_address['und'][0]['value'] : ""; ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.sec comment -->
            <?php
            $conditions = array();
            $conditions['weight'] = array(
                "type"      => "propertyOrderBy",
                "direction" => "DESC"
            );
            $conditions['field_sih'] = array(
                'type'      => "fieldCondition",
                "key"       => "value",
                "value"     => 1,
                "condition" => "="
            );
            $terms = cassiopeia_get_items_by_conditions($conditions, "tx_article", "taxonomy_term");
            ?>
            <?php if (!empty($terms)) : ?>
                <?php foreach ($terms as $term) : ?>
                    <?php $nodes = cassiopeia_get_nodes_by_category("article", $term, 12); ?>
                    <!-- sec news -->
                    <section class="sec sec-news">
                        <div class="sec-container container">
                            <div class="inner">
                                <h2 class="heading heading-secondary clr-black text-uppercase text-center">
                                    <?php echo l($term->name, "taxonomy/term/" . $term->tid, array("html" => TRUE)); ?>
                                </h2>

                                <div class="qt-news mt-4">
                                    <div class="slider-cover">
                                        <?php if (!empty($nodes)) : ?>
                                            <div class="owl-carousel owl-theme blog-slider">
                                                <?php foreach ($nodes as $node) : ?>
                                                    <div class="item">
                                                        <?php echo _cassiopeia_render_theme("module", "cassiopeia", "templates/parts/article-type-3.tpl.php", array("node" => $node, "image_style" => "style_360x240")); ?>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- /.sec news -->
                <?php endforeach; ?>
            <?php endif; ?>

            <!-- sec about -->
            <section class="sec sec-about">
                <div class="sec-container container">
                    <div class="inner">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="qt-about">
                                    <h2 class="heading heading-secondary clr-black text-uppercase">
                                        <?php echo !empty($home_config->field_url['und'][0]['value']) ? $home_config->field_url['und'][0]['value'] : ""; ?>
                                    </h2>
                                    <div class="paragraph mt-2">
                                        <?php echo !empty($home_config->field_content_1['und'][0]['value']) ? $home_config->field_content_1['und'][0]['value'] : ""; ?>
                                    </div>
                                    <a href="/user/register" class="btn bg-secondary clr-white radius-36 mt-3 text">Tham gia ngay</a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="qt-img-cover">
                                    <?php
                                    $image = cassiopeia_image_load($home_config->field_icon['und'][0], "style_555x387");
                                    echo !empty($image) ? $image : "";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.sec about -->
        </div>
    </div>
</div>
<?php include('footer.inc'); ?>

<?php
$logo_home = file_load(variable_get("cassiopeia_config_img_popup"));
$stt_popup = "ON";
if (!empty($_SESSION["popup_stt"])) {
    $stt_popup = $_SESSION["popup_stt"];
}

if (!empty($logo_home) && !empty(variable_get("link_popup")) && $stt_popup !== "OFF") {

    $url_popup = '123';
    if (!empty($logo_home)) {
        $node_img = (array) $logo_home;
        $url_popup = $node_img['uri'];
    }
?>
    <div id="modal_popup">
        <div>
            <div class="autic-popup autic-modal__transition-enter-done">
                <div class="autic-popup__overlay"></div>
                <div class="autic-popup__container">
                    <a class="FF7zTk" href="<?php echo (variable_get("link_popup")); ?>">
                        <picture class="_3va1kl">
                            <img src="<?php echo str_replace("public://", "https://autic.vn/sites/default/files/", $url_popup); ?>" class="_1R5f5Z" alt="home_popup_banner <?php echo $stt_popup; ?>">
                        </picture>
                    </a>
                    <div class="autic-popup__close-btn">
                        <svg enable-background="new 0 0 11 11" viewBox="0 0 11 11" x="0" y="0" class="autic-svg-icon ">
                            <path d="m10.7 9.2-3.8-3.8 3.8-3.7c.4-.4.4-1 0-1.4-.4-.4-1-.4-1.4 0l-3.8 3.7-3.8-3.7c-.4-.4-1-.4-1.4 0-.4.4-.4 1 0 1.4l3.8 3.7-3.8 3.8c-.4.4-.4 1 0 1.4.2.2.5.3.7.3.3 0 .5-.1.7-.3l3.8-3.8 3.8 3.8c.2.2.4.3.7.3s.5-.1.7-.3c.4-.4.4-1 0-1.4z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
}
?>