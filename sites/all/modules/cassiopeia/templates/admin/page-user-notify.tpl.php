<?php
global $user;
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/agent.js', ['weight' => 1000]);
$query = db_select("tbl_notify","tbl_notify");
$query->fields("tbl_notify");
$query->orderBy("created","DESC");
$result = $query->execute()->fetchAll();
$notifies = cassiopeia_get_nodes_by_category("notify");
$limit = 12;
$page = pager_default_initialize(count($result), $limit, 0);
$offset = $limit * $page;
if(!empty($notifies)){
    $notifies = array_slice($notifies, $offset, $limit);
}else{
    $notifies=null;
}
?>
<div class="page-user-notify">
    <div class="block-title">
        <span>Thông báo nội bộ</span>
    </div>
    <?php if(!empty($notifies)): ?>
        <div class="items">
            <?php foreach($notifies as $notify): ?>
                <?php
//                print_r($notify);
                $read = false;
                $agents = !empty($notify->field_read['und'])?$notify->field_read['und']:null;
                if(!empty($agents)){
                    foreach($agents as $item){
                        if($item['value'] == $user->uid){
                            $read = true;
                        }
                    }
                }
                ?>
                <div class="item <?php print($read==true?"read":"unread"); ?>" data-id="<?php print($notify->nid); ?>">
                    <div class="item-title">
                        <span class="bold"><?php print($notify->title); ?></span>
                        <div class="item-created"><?php print(date("d/m/Y H:i",$notify->created)); ?></div>
                    </div>
                    <div class="item-content">
                        <?php print($notify->body['und'][0]['value']); ?>
                        <?php if(!empty($notify->field_url['und'][0]['value'])): ?>
                            <div class="view-detail">
                                <a href="<?php print($notify->field_url['und'][0]['value']); ?>">Xem chi tiết <i class="fa fa-angle-right"></i></a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <img src="/sites/default/files/new.png" alt="">

                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <!-- paging-->
    <div class="page">
        <div class="cassiopeia-pagination">
            <div class="cassiopeia-pagination-container">
                <?php print (theme('pager',  array('tags' => array('«','‹','','›','»'))));?>
            </div>
        </div>
    </div>
    <!--e: paging-->
</div>
