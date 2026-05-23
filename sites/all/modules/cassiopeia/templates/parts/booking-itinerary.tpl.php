<?php
/**
 * Created by PhpStorm.
 * User: huutr
 * Date: 2/10/2020
 * Time: 4:03 PM
 */
//print_r($_SESSION['booking']);
$item = $_SESSION['booking']['1M_VN266SGNHAN202002121800']['data'];
?>
<?php if(!empty($_SESSION['booking'])): ?>
    <?php foreach($_SESSION['booking'] as $value): $item = $value['data']; ?>
        <?php if(!empty($item)): ?>
            <?php
            $airline = cassiopeia_get_airline($item->Airline);
            ?>
            <div class="item">
                <div class="logo">

                </div>
                <div class="airline">
                    <?php if(!empty($airline)) print($airline->name); ?>
                </div>
                <div class="startpoint">
                    <div>
                        <?php  print(date("H:i",strtotime($item->ListFlight[0]->StartDate))); ?>
                    </div>
                    <div>
                        <?php
                        $startpoint = cassiopeia_get_airport($item->ListFlight[0]->StartPoint);
                        if(!empty($startpoint)) print($startpoint->city); print("(".$item->ListFlight[0]->StartPoint.")");
                        ?>
                    </div>
                </div>
                <div class="between">
                    <?php if(count($item->ListFlight[0]->ListSegment)<2): ?>
                        <div>Bay thẳng</div>
                        <div></div>
                    <?php else: ?>

                    <?php endif; ?>
                </div>
                <div class="endpoint">
                    <div>
                        <?php  print(date("H:i",strtotime($item->ListFlight[0]->EndDate))); ?>
                    </div>
                    <div>
                        <?php
                        $endpoint = cassiopeia_get_airport($item->ListFlight[0]->EndPoint);
                        if(!empty($endpoint)) print($endpoint->city); print("(".$item->ListFlight[0]->EndPoint.")");
                        ?>
                    </div>
                </div>
                <div class="view-detail" >
                </div>
                <div class="price">
                    <?php print(number_format($item->FeeAdt,0,",",".")); ?> đ
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>
