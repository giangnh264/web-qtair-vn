<?php
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/page-gift.js', ['weight' => 1000]);
global $user;
$_user =  user_load($user->uid);
$gifts = cassiopeia_get_nodes_by_category("gift");
$point = !empty($_user->field_point['und'][0]['value'])?$_user->field_point['und'][0]['value']:0;
$used_point = !empty($_user->field_used_point['und'][0]['value'])?$_user->field_used_point['und'][0]['value']:0;
$AvailablePoints = $point - $used_point;
$rank = cassiopeia_get_agent_rank($user);
?>

<div class="page-gift">
    <div class="page-container">
        <div class="note">
            <a href="/chuong-trinh-dai-ly-than-thiet-autic-family" style="font-weight: bold;
    margin-bottom: 10px;
    display: flex;">Cập nhật thông tin về chương trình tại đây !</a>
        </div>
        <ul class="nav">
            <li class="active"><a data-toggle="tab" href="#gift-tab-1"><i class="fa fa-gift"></i> Tích điểm & quà tặng</a></li>
            <li><a data-toggle="tab" href="#gift-tab-2"><i class="fa fa-list-alt"></i> Lịch sử đổi quà</a></li>
        </ul>
        <div class="tab-content">
            <div id="gift-tab-1" class="tab-pane fade in active">
                <div class="block-1">
                    <div class="block-title">Thông tin Đại lý</div>
                    <div class="block-info">
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <label for="">Mã đại lý: </label><span><?php print($_user->field_account_code['und'][0]['value']); ?></span>
                                </div>
                                <div>
                                    <label for="">Tích điểm: </label><span><?php print($point-$used_point); ?> điểm</span>
                                </div>
                                <div>
                                    <label for="">Hạng: </label><span><?php print($rank); ?></span> (Năm: <?php echo date("Y",REQUEST_TIME); ?>)
                                </div>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-1">
                    <div class="block-title">Quà tặng</div>
                    <div class="block-info">
                        <?php if(!empty($gifts)): ?>
                            <div class="row">
                                <?php foreach($gifts as $gift): ?>
                                    <div class="item col-xs-6 col-md-3">
                                        <div class="gift-type-1" data-nid="<?php print($gift->nid); ?>">
                                            <div class="node-image">
                                                <?php
                                                if (!empty($gift->field_image['und'][0])) {
                                                    $node_img = (array) $gift->field_image['und'][0];
                                                    $node_img['style_name'] = "style_371x251";
                                                    $node_img['path'] = $node_img['uri'];
                                                    $node_img = theme('image_style', $node_img);
                                                    print($node_img);
                                                }
                                                ?>
                                            </div>
                                            <div class="node-info">
                                                <div class="node-title">
                                                    <?php print($gift->title); ?>
                                                </div>
                                                <div class="node-point">
                                                    <span><?php print($gift->field_gift_point['und'][0]['value']); ?></span> điểm
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div id="gift-tab-2" class="tab-pane fade">
                <?php
                $query = db_select("tbl_point","tbl_point");
                $query->fields("tbl_point");
                $query->condition("uid",$user->uid);
                $result = $query->execute()->fetchAll();
                ?>
                <table class="table table-hover table-stripped">
                    <thead>
                    <th>STT</th>
                    <th>Quà tặng</th>
                    <th>Điểm</th>
                    <th class="text-right">Tiền quy đổi (đ)</th>
                    <th>Số lượng</th>
                    <th>Tình trạng</th>
                    </thead>
                    <tbody>
                    <?php if(!empty($result)): $stt=1; ?>
                        <?php foreach($result as $item): ?>
                            <tr>
                                <td><?php echo($stt); ?></td>
                                <td><?php echo(!empty(node_load($item->nid))?node_load($item->nid)->title:""); ?></td>
                                <td><?php echo($item->point); ?></td>
                                <td class="text-right"><?php echo(number_format($item->amount,0,",",".")); ?></td>
                                <td><?php echo($item->quantity); ?></td>
                                <td>
                                    <?php
                                    switch ($item->status){
                                        case 0 :
                                            echo("Chưa xử lý");
                                            break;
                                        case 1 : echo("Đã xử lý");break;
                                        case 2 : echo("Đã hủy");break;
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php $stt++; endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="getGiftModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>