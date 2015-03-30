<link href="<?php echo base_url(); ?>assets/css/admin/global.css" rel="stylesheet" type="text/css">
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/font-awesome.min.css">
	   <!-- Le styles -->
        <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/bootstrap-responsive.css" rel="stylesheet">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!--[if IE 7]>
        <link rel="stylesheet" href="css/font-awesome-ie7.min.css">
        <![endif]-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/select2.css">
        <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>js/jquery-1.8.3.min.js"></script>
        

        <!--<script src="<?php echo base_url(); ?>js/bootstrap.js"></script>-->
        
          <link href="<?php echo base_url(); ?>assets/css/admin/global.css" rel="stylesheet" type="text/css">         
          
          <div class="map content">
              <div class="">
                  <div class="">
                      <div class="title">
                      </div>
                      <br />
                      <?php echo validation_errors(); ?>
                      <div class="container">
                        <div class="row" id="login-container">
                          <div class="span8 ">
                            <?php
                              // echo "<pre>";print_r($user_profit_details);die;
                              foreach ($property_details as $property_detail){
                                $property_name = $property_detail['property_name'];
                                $current_value = $property_detail['property_current_price'];
                              }
                              // foreach ($profit_and_loss as $profit_and_loss){
                              //   $total_profit_loss = $profit_and_loss['diff'];
                              // }
                            ?>
                            <h3>Property Share Fund Release</h3><hr/>

                            <strong><p>Property ID: <?= $id ?></p> 
                            <p>Property Name: <?= ucfirst($property_name) ?> </p> 
                            <p>Current Value: RM <?= $current_value ?></p> </strong>
                        </div>
                        </div>
                      </div>

                          <form action="" method="post">
                              <table class="table table-striped table-bordered table-condensed">
                                <thead>
                                  <tr class="header"><th>User</th><th>Shares</th><th>Shares Value</th><th>Transaction Charges</th></tr>
                                </thead>
                                <tbody>
                                  <?php
                                    foreach($user_trans_details as $user_trans_detail){
                                      $share_val = $user_trans_detail['total_share'] * $current_value / 100;
                                      // echo  $share_val*$user_trans_detail['percentage']/100;
                                      $user_transaction = $share_val * $user_trans_detail['percentage'] / 100;
                                      $user_final_amt = $share_val + $user_transaction;
                                  ?>
                                  <tr><td><?=ucfirst($user_trans_detail['first_name'])." ".ucfirst($user_trans_detail['last_name'])?></td>
                                      <td><?=$user_trans_detail['total_share']?> % 
                                          <input type="hidden" name="user_property_id[<?=$user_trans_detail['user_id']?>]" value="<?=$id?>" />
                                          <input type="hidden" name="user_property_name[<?=$user_trans_detail['user_id']?>]" value="<?=$property_name?>" />
                                          <input type="hidden" name="user_share[<?=$user_trans_detail['user_id']?>]" value="<?=$user_trans_detail['total_share']?>" />
                                      </td>
                                      <td>RM <?=$share_val?>
                                        <input type="hidden" name="share_val[<?=$user_trans_detail['user_id']?>]" value="<?=$share_val?>" />
                                      </td>
                                      <td>RM <?=$user_transaction?>
                                        <input type="hidden" name="user_transaction[<?=$user_trans_detail['user_id']?>]" value="<?=$user_transaction?>" />
                                        <input type="hidden" name="user_amount[<?=$user_trans_detail['user_id']?>]" value="<?=$user_final_amt?>" />
                                      </td>
                                  </tr>
                                  <?php
                                    }
                                  ?>
                                  
                                </tbody>
                              </table>

                              <div class="search_btn"> 
                                  <input type="submit" class="btn btn-info" name="approved" value="Approved" />
                                  <input type="submit" onclick="javascript:parent.jQuery.fancybox.close();" class="btn btn-danger" name="cancelled" value="Cancelled" />
                              </div>
                              <div class="clear"></div>
                          </form>
                      </div>
                  </div>
        <div class="clear"></div>
    </div>
</div>

<script>
    function fnwithmethod(obj){
        var val = obj.value;
        document.getElementById('_bank').style.display = 'none';
        document.getElementById('_cheque').style.display = 'none';
        if(val == 'Cash'){
            document.getElementById('payment_type').value = val;
            document.getElementById('bank_name').value = '';
            document.getElementById('cheque_no').value = '';
        }else if(val == 'Cheque'){
            document.getElementById('_bank').style.display = '';
            document.getElementById('_cheque').style.display = '';
            document.getElementById('payment_type').value = val;
        }
    }
</script>
<style>
.table-bordered {   
  font-size: 12px;
}
.span12, .container{
  width:100%;
}
</style>