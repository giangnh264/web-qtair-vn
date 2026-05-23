<?php
global $user;
drupal_add_js(drupal_get_path('module', 'cassiopeia') . '/js/partner.js', ['weight' => 1000]);
drupal_add_js(drupal_get_path('module', 'cassiopeia_user') . '/js/price-config.js', ['weight' => 1000]);

?>
<div class="page-manager-ticket">
    <div class="page-container">
        <div class="block-nav">
            <?php
            $vocal = taxonomy_vocabulary_machine_name_load("tx_agent_rank");
            $tx_ranks = (array)taxonomy_get_tree($vocal->vid,0,1);
            ?>
            <form action="">
                <select name="tx" id="" class="form-control" onchange="this.form.submit()">
                    <option value="0">Khách thường</option>
                    <?php foreach($tx_ranks as $tx_rank): if($tx_rank->tid==18 || $tx_rank->tid==19) continue; ?>
                        <option <?php if(isset($_REQUEST['tx'])&&$_REQUEST['tx']==$tx_rank->tid) echo "selected"; ?> value="<?php echo $tx_rank->tid ?>"><?php echo $tx_rank->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </form>
        </div>
        <div class="block-user-setup">
            <div class="block-user-setup-content">
                <div class="setup-item local-address">
                    <?php
                    $uid = user_has_role(3)?0:$user->uid;
                    $_rank = !empty($_user->field_tx_rank['und'][0]['tid'])?$_user->field_tx_rank['und'][0]['tid']:0;
                    $rank = isset($_REQUEST['tx'])?$_REQUEST['tx']:$_rank;
                    $agent_fee_config = null;
                    $service_fee_config = null;
                    try{
                        $query = db_select("tbl_agent_fee_config","tbl_agent_fee_config");
                        $query -> fields("tbl_agent_fee_config");
                        $query->condition("tid",$rank);
                        $query->condition("uid",$uid);
                        $agent_fee_config = $query -> execute() -> fetchObject();
//                        print_r($uid);
                        if(empty($agent_fee_config)){
                            $query = db_select("tbl_agent_fee_config","tbl_agent_fee_config");
                            $query -> fields("tbl_agent_fee_config");
                            $query->condition("tid",$rank);
                            $query->condition("uid",0);
                            $agent_fee_config = $query -> execute() -> fetchObject();
                        }
//                        print_r($agent_fee_config);
                    }catch ( Exception $e){
                        print_r($e);
                    }
                    try{
                        $query = db_select("tbl_service_fee_config","tbl_service_fee_config");
                        $query -> fields("tbl_service_fee_config");
                        $query->condition("tid",$rank);
                        $query->condition("uid",$uid);
                        $service_fee_config = $query -> execute() -> fetchObject();
//                        _print_r($service_fee_config);
                        if(empty($service_fee_config)){
                            $query = db_select("tbl_service_fee_config","tbl_service_fee_config");
                            $query -> fields("tbl_service_fee_config");
                            $query->condition("tid",$rank);
                            $query->condition("uid",0);
                            $service_fee_config = $query -> execute() -> fetchObject();
                        }
                    }catch ( Exception $e){
                        print_r($e);
                    }
                    $cassiopeia_user_price_config_form = drupal_get_form("cassiopeia_admin_fee_config_form",array("agent_fee"=>$agent_fee_config,"service_fee"=>$service_fee_config));
                    $cassiopeia_user_price_config_form = drupal_render($cassiopeia_user_price_config_form);
                    echo $cassiopeia_user_price_config_form;
                    ?>
                </div>

            </div>
        </div>
        <div class="agent-profile-form">
        </div>
    </div>
</div>
