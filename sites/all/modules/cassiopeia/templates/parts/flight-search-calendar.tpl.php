<?php
$_date = $variables['date'];
$search_date = substr($_date,0,2)."-".substr($_date,2,2)."-".substr($_date,4);
$today = getdate();
$month = $today['mon'];
$day = $today['mday'];
$year = $today['year'];
$_date = date("d-m-Y",strtotime($year."-".$month."-".$day));
if(!empty($_REQUEST['_date'])){
    $_date = $_REQUEST['_date'];
}
if(!empty($_REQUEST['_key'])){
    switch($_REQUEST['_key']){
        case "next" :
            $_date = date("d-m-Y",strtotime($_date ." +1 month"));
            break;
        case "prev" :
            $_date = date("d-m-Y",strtotime($_date ." -1 month"));
            break;
        case "today" :
            $_date = date("d-m-Y",REQUEST_TIME);
            break;
    }
}
$number_of_days = (int)(date("t",strtotime($_date)));
$number_of_days_of_last_month = (int)(date("t",strtotime($_date." -1 month")));
$weekday = date("D",strtotime("01-".date("m",strtotime($_date))."-".date("Y",strtotime($_date))));
$_count = (int)getdate(strtotime("01-".date("m",strtotime($_date))."-".date("Y",strtotime($_date))))['wday'];
$arr = array();
for($i=$number_of_days_of_last_month-$_count+1;$i<=$number_of_days_of_last_month;$i++){
    $arr[] = $i;
}
?>
<div class="block-content">
    <div class="block-body">
        <div class="<?php if($search_date==date("d-m-Y",strtotime($search_date ." -3 days"))) print("active"); if(strtotime($search_date ." -3 days")< strtotime(date("dmY"))) print("inactive"); ?>" data-date="<?php print(date("dmY",strtotime($search_date ." -3 days"))); ?>">
            <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_date ." -3 days"))))); ?></span>
            <span><?php print(date("d/m",strtotime($search_date ." -3 days"))); ?></span>
        </div >
        <div class="<?php if($search_date==date("d-m-Y",strtotime($search_date ." -2 days"))) print("active"); if(strtotime($search_date ." -3 days")< strtotime(date("dmY"))) print("inactive");?>" data-date="<?php print(date("dmY",strtotime($search_date ." -2 days"))); ?>">
            <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_date ." -2 days"))))); ?></span>
            <span><?php print(date("d/m",strtotime($search_date ." -2 days"))); ?></span>
        </div>
        <div class="<?php if($search_date==date("d-m-Y",strtotime($search_date ." -1 days"))) print("active"); if(strtotime($search_date ." -3 days")< strtotime(date("dmY"))) print("inactive");?>" data-date="<?php print(date("dmY",strtotime($search_date ." -1 days"))); ?>">
            <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_date ." -1 days"))))); ?></span>
            <span><?php print(date("d/m",strtotime($search_date ." -1 days"))); ?></span>
        </div>
        <div class="<?php if($search_date==date("d-m-Y",strtotime($search_date ))) print("active");if(strtotime($search_date ." -3 days")< strtotime(date("dmY"))) print("inactive"); ?>" data-date="<?php print(date("dmY",strtotime($search_date ))); ?>">
            <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_date ))))); ?></span>
            <span><?php print(date("d/m",strtotime($search_date ))); ?></span>
        </div>
        <div class="<?php if($search_date==date("d-m-Y",strtotime($search_date ." +1 days"))) print("active"); if(strtotime($search_date ." -3 days")< strtotime(date("dmY"))) print("inactive");?>" data-date="<?php print(date("dmY",strtotime($search_date ." +1 days"))); ?>">
            <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_date ." +1 days"))))); ?></span>
            <span><?php print(date("d/m",strtotime($search_date ." +1 days"))); ?></span>
        </div>
        <div class="<?php if($search_date==date("d-m-Y",strtotime($search_date ." +2 days"))) print("active"); if(strtotime($search_date ." -3 days")< strtotime(date("dmY"))) print("inactive");?>" data-date="<?php print(date("dmY",strtotime($search_date ." +2 days"))); ?>">
            <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_date ." +2 days"))))); ?></span>
            <span><?php print(date("d/m",strtotime($search_date ." +2 days"))); ?></span>
        </div>
        <div class="<?php if($search_date==date("d-m-Y",strtotime($search_date ." +3 days"))) print("active"); if(strtotime($search_date ." -3 days")< strtotime(date("dmY"))) print("inactive");?>" data-date="<?php print(date("dmY",strtotime($search_date ." +3 days"))); ?>">
            <span><?php print(_cassiopeia_get_day_off_week(strtotime(date("D",strtotime($search_date ." +3 days"))))); ?></span>
            <span><?php print(date("d/m",strtotime($search_date ." +3 days"))); ?></span>
        </div>
    </div>
</div>