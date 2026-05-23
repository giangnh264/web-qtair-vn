
<?php if(!empty($result)): ?>
    <?php foreach($result as $hotel): ?>
        <div class="item">
            <?php print(_cassiopeia_render_theme("module","cassiopeia","templates/parts/hotel-type-1.tpl.php",array("hotel"=>$hotel,"image_style"=>"style_370x238"))); ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<div class="ajax-pagination">
    <div class="ajax-pagination-container">
        <ul>
            <?php if($page_count<=3): ?>
                <?php for($i=1;$i<=$page_count;$i++): ?>
                    <li><span class="ajax-item <?php if($page==$i) print("active"); ?>" data-page="<?php print($i); ?>"><?php print($i); ?></span></li>
                <?php endfor; ?>
            <?php else: ?>
                <?php if($page<=2): ?>
                    <?php for($i=1;$i<=3;$i++): ?>
                        <li><span class="ajax-item <?php if($page==$i) print("active"); ?>" data-page="<?php print($i); ?>"><?php print($i); ?></span></li>
                    <?php endfor; ?>
                    <li><span class="">...</span></li>
                    <li><span class="ajax-item fa fa-angle-right" data-page="<?php print($page+1); ?>"></span></li>
                    <li><span class="ajax-item fa fa-angle-double-right" data-page="<?php print($page_count); ?>"></span></li>
                <?php else: ?>
                    <?php if($page>=$page_count-1): ?>
                        <li><span class="ajax-item fa fa-angle-double-left" data-page="<?php print(1); ?>"></span></li>
                        <li><span class="ajax-item fa fa-angle-left" data-page="<?php print($page-1); ?>"></span></li>
                        <li><span class="">...</span></li>
                        <?php for($i=$page_count-2;$i<=$page_count;$i++): ?>
                            <li><span class="ajax-item <?php if($page==$i) print("active"); ?>" data-page="<?php print($i); ?>"><?php print($i); ?></span></li>
                        <?php endfor; ?>
                    <?php else: ?>
                        <li><span class="ajax-item fa fa-angle-double-left" data-page="<?php print(1); ?>"></span></li>
                        <li><span class="ajax-item fa fa-angle-left" data-page="<?php print($page-1); ?>"></span></li>
                        <li><span class="">...</span></li>
                        <?php for($i=$page-1;$i<=$page+1;$i++): ?>
                            <li><span class="ajax-item <?php if($page==$i) print("active"); ?>" data-page="<?php print($i); ?>"><?php print($i); ?></span></li>
                        <?php endfor; ?>
                        <li><span class="">...</span></li>
                        <li><span class="ajax-item fa fa-angle-right" data-page="<?php print($page+1); ?>"></span></li>
                        <li><span class="ajax-item fa fa-angle-double-right" data-page="<?php print($page_count); ?>"></span></li>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
        </ul>
    </div>
</div>

