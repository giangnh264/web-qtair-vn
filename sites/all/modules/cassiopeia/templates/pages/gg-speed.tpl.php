<!--<h1>Agridoctor.vn</h1>-->

<?php

/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or
 *   'rtl'.
 * - $html_attributes:  String of attributes for the html element. It can be
 *   manipulated through the variable $html_attributes_array from preprocess
 *   functions.
 * - $html_attributes_array: An array of attribute values for the HTML element.
 *   It is flattened into a string within the variable $html_attributes.
 * - $body_attributes:  String of attributes for the BODY element. It can be
 *   manipulated through the variable $body_attributes_array from preprocess
 *   functions.
 * - $body_attributes_array: An array of attribute values for the BODY element.
 *   It is flattened into a string within the variable $body_attributes.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see bootstrap_preprocess_html()
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 *
 * @ingroup templates
 */
global $user;
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="profile" href="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="google-site-verification" content="yEoXiOfj9iD-qteXL9z4GLTE87iReowieXkK51YmpfM" />

<!--    --><?php //print $head; ?>
    <title><?php echo drupal_is_front_page()?variable_get("site_name"):drupal_get_title(); ?></title>
<!--    --><?php //print $styles; ?>
    <!-- HTML5 element support for IE6-8 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>
    <![endif]-->
<!--    --><?php //print $scripts; ?>
    <?php
//    $_header_script = variable_get('header_script');
//    if (!empty($_header_script)) {
//        print($_header_script);
//    }

    ?>

    <meta name="google-site-verification" content="1_TOZFt5hn8-dKDb2Cv7pwhRfRUoqmY3u46PVrNFwrQ" />

</head>
<body>
<?php
$body_script = variable_get('body_script');
//if (!empty($body_script)) {
//    print($body_script);
//}
//
//?>
<div class="visible-xs">
    <img width="100%" height="100%" src="/sites/all/themes/cassiopeia_theme/img/mobile-shot.jpg" alt="" style="width:100%;">
</div>
<div class="hidden-xs">
    <img width="100%" height="100%" src="/sites/all/themes/cassiopeia_theme/img/desktop-shot.jpg" alt="" style="width:100%;">
</div>
<?php //if(!empty($user->uid)):
?>
<?php //print $page_top; ?>
<?php //print $page; ?>
<?php //print $page_bottom; ?>
<?php //else:
?>
<!--   <div class="page-maintenance-custom" style="display: flex;-->
<!--    justify-content: center;-->
<!--    text-align: center;-->
<!--    text-transform: unset;-->
<!--    align-items: center;">-->
<!--       <div>-->
<!--           <img src="/sites/all/themes/cassiopeia_theme/img/maintenance.jpg" alt="">-->
<!--           <h1>Site đang trong chế độ bảo trì, vui lòng quay lại sau!</h1>-->
<!--       </div>-->
<!--   </div>-->
<?php //endif;
?>


<?php
//$_footer_script = variable_get('footer_script');
//if (!empty($_footer_script)) {
//    print($_footer_script);
//}

?>

<!--<script type="text/javascript">-->
<!--    (function($) {-->
<!--        $(document).ready(function() {-->
<!--            var message_model = $('#message-model');-->
<!--            if (message_model.length) {-->
<!--                message_model.modal('show');-->
<!--            }-->
<!--        });-->
<!--    })(jQuery);-->
<!--</script>-->

</body>

</html>