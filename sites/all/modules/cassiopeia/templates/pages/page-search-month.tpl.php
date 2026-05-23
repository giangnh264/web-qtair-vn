<?php
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/search-month.js', ['weight' => 10000000]);
?>
<style>

</style>
<span class="flight-info"
      data-radio = "<?php print(!empty($_REQUEST['TripType'])?($_REQUEST['TripType']):""); ?>"
      data-StartPoint = "<?php print(!empty($_REQUEST['DepartureCode-0'])?($_REQUEST['DepartureCode-0']):""); ?>"
      data-EndPoint   = "<?php print(!empty($_REQUEST['DestinationCode-0'])?($_REQUEST['DestinationCode-0']):""); ?>"
      data-DepartureDate = "<?php print(!empty($_REQUEST['DepartureDate-0'])?date("Y-m-d",strtotime(str_replace("/","-",$_REQUEST['DepartureDate-0']))):date("Y-m-d",REQUEST_TIME)); ?>"
      data-ReturnDate = "<?php print(!empty($_REQUEST['ReturnDate-0'])?date("Y-m-d",strtotime(str_replace("/","-",$_REQUEST['ReturnDate-0']))):date("Y-m-d",REQUEST_TIME)); ?>"
      data-ItineraryType = "<?php print(!empty($_REQUEST['ReturnDate-0'])?2:1); ?>"
></span>
<?php
//global $language;
//$startpoint = cassiopeia_get_airport($_REQUEST['DepartureCode-0']);
//$endpoint = cassiopeia_get_airport($_REQUEST['DestinationCode-0']);
//$departure_date = (str_replace("/","-",$_REQUEST['DepartureDate-0']));
//if(!empty($_REQUEST['ReturnDate-0'])){
//    $return_date = str_replace("/","-",$_REQUEST['ReturnDate-0']);
//}
//die;
?>
<div class="calendar-month">
    <div class="block-container container">
        <?php print(_cassiopeia_render_theme("module","cassiopeia","templates/forms/search-fly-form-type-1.tpl.php",array("data"=>$_REQUEST))); ?>
        <form action="flight-search" method="get">
            <input type="hidden" name="DepartureCode-0" value="<?php print(!empty($_REQUEST['DepartureCode-0'])?($_REQUEST['DepartureCode-0']):""); ?>">
            <input type="hidden" name="DestinationCode-0" value="<?php print(!empty($_REQUEST['DestinationCode-0'])?($_REQUEST['DestinationCode-0']):""); ?>">
            <input type="hidden" name="Adults" value="<?php print(!empty($_REQUEST['Adults'])?($_REQUEST['Adults']):""); ?>">
            <input type="hidden" name="Childrens" value="<?php print(!empty($_REQUEST['Childrens'])?($_REQUEST['Childrens']):""); ?>">
            <input type="hidden" name="Infants" value="<?php print(!empty($_REQUEST['Infants'])?($_REQUEST['Infants']):""); ?>">
            <input type="hidden" name="TripType" value="<?php print(!empty($_REQUEST['TripType'])?($_REQUEST['TripType']):""); ?>">
            <div class="result">

            </div>
            <div class="choose-flights">
                <button type="submit">Chọn chuyến bay <i class="fa fa-angle-right"></i></button>
            </div>
        </form>
    </div>
</div>