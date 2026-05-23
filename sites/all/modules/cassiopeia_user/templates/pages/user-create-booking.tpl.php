<?php
global $user;
$_user = user_load($user->uid);
$search_data = null;
if(!empty($_SESSION['search_data'])){
    $search_data = ($_SESSION['search_data']);
}
$tx = isset($_REQUEST['tx'])?$_REQUEST['tx']:0;
if(isset($_REQUEST['tx'])){
    $tx = $_REQUEST['tx'];
}else{
    $tx = !empty($_user->field_tx_rank['und'][0]['tid'])?$_user->field_tx_rank['und'][0]['tid']:18;
}
?>
<div class="page-user-create-booking">
    <?php print(_cassiopeia_render_theme("module","cassiopeia","templates/forms/search-fly-form-type-1.tpl.php",array("data"=>$search_data))); ?>
</div>
<?php drupal_add_js(drupal_get_path('module', 'cassiopeia_user') . '/js/price-config.js', ['weight' => 1000]); ?>
<div class="block-user-setup">
<!--    --><?php //if(user_has_role(3) || user_has_role(8)): ?>
<!--        <div class="block-nav" style="margin-bottom: 30px;">-->
<!--            --><?php
//            $vocal = taxonomy_vocabulary_machine_name_load("tx_agent_rank");
//            $tx_ranks = (array)taxonomy_get_tree($vocal->vid,0,1);
//            ?>
<!--            <form action="">-->
<!--                <select name="tx" id="" class="form-control" onchange="this.form.submit()">-->
<!--                    --><?php //foreach($tx_ranks as $tx_rank): ?>
<!--                        <option --><?php //if($tx==$tx_rank->tid) echo "selected"; ?><!-- value="--><?php //echo $tx_rank->tid ?><!--">--><?php //echo $tx_rank->name; ?><!--</option>-->
<!--                    --><?php //endforeach; ?>
<!--                </select>-->
<!--            </form>-->
<!--        </div>-->
<!--    --><?php //endif ?>
    <div class="block-user-setup-content">
        <div class="setup-item local-address">
            <?php
            $uid = user_has_role(3)?0:$user->uid;
            $_rank = !empty($_user->field_tx_rank['und'][0]['tid'])?$_user->field_tx_rank['und'][0]['tid']:0;
            $rank = isset($_REQUEST['tx'])?$_REQUEST['tx']:$_rank;
            $config = null;
            try{
                $query = db_select("tbl_agent_fee_config","tbl_agent_fee_config");
                $query -> fields("tbl_agent_fee_config");
                $query->condition("tid",$rank);
                $query->condition("uid",$uid);
                $config = $query -> execute() -> fetchObject();
                if(empty($config)){
                    $query = db_select("tbl_agent_fee_config","tbl_agent_fee_config");
                    $query -> fields("tbl_agent_fee_config");
                    $query->condition("tid",$rank);
                    $query->condition("uid",0);
                    $config = $query -> execute() -> fetchObject();
                }
            }catch ( Exception $e){
                print_r($e);
            }
            $cassiopeia_agent_fee_config_form = drupal_get_form("cassiopeia_agent_fee_config_form",$config);
            $cassiopeia_agent_fee_config_form = drupal_render($cassiopeia_agent_fee_config_form);
            echo $cassiopeia_agent_fee_config_form;
            ?>
        </div>
    </div>
</div>