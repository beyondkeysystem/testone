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
                              foreach ($user_details as $user_detail){
                                $user_name = $user_detail['user_name'];
                                $first_name = $user_detail['first_name'];
                                $last_name = $user_detail['last_name'];
                                $user_id = $user_detail['id'];
                                $hand_phone = $user_detail['telephone'];
                                $role = $user_detail['role'];
                                
                              }
                              foreach ($user_o_payment as $user_o_payment){
                                $payment_datetime = $user_o_payment['created'];
                                $transaction_status = $user_o_payment['transaction_status'];
                                $payment_location = $user_o_payment['location'];
                                $bank_name = $user_o_payment['bank_name'];
                                $account_no = $user_o_payment['account_no'];
                                $o_payment_id = $user_o_payment['id'];
                                $transaction_id = $user_o_payment['transaction_id'];
                              }
                            ?>
                            <h3>User Registration Fund Transfer Details </h3><hr/>
 
                              <table class="table table-striped table-bordered table-condensed">
                                <tr><th>User Id </th><td><?=$user_id?></td></tr>
                                <tr><th>User Name </th><td><?=$user_name?></td></tr>
                                <tr><th>Name </th><td><?=ucfirst($first_name).' '.ucfirst($last_name)?></td></tr>
                                <tr><th>Hand Phone Number </th><td><?=$hand_phone?></td></tr>
                                <tr><th>User Type </th><td><?=$role?></td></tr>
                                <tr><th>Transaction Status </th><td><?php echo $transaction_status=='Pending' ? '<span style="color:red"><b>'.$transaction_status.'</b></span>': '<span style="color:blue"><b>'.$transaction_status.'</b><span>' ?></td></tr>
                                <?php
                                if($role != 'Normal' && $transaction_id == ''){
                                ?>
                                  <tr><th>Payment Via</th><td>Bank</td></tr>
                                  <tr><th>Bank Name</th><td><?=$bank_name?></td></tr>
                                  <tr><th>Account No </th><td><?=$account_no?></td></tr>
                                  <tr><th>Payment Location </th><td><?=$payment_location?></td></tr>
                                  <tr><th>Payment Date </th><td><?=$payment_datetime?></td></tr>
                                <?php
                                }else if($role != 'Normal' && $transaction_id != ''){
                                ?>
                                  <tr><th>Payment Via</th><td>Paypal</td></tr>
                                  <tr><th>Transaction_id</th><td><?=$transaction_id?></td></tr>
                                  
                                <?php
                                }
                                ?>
                              </table>
                              <span class="label label-inverse">Note: If Approve the User Transaction then user can login to their Account Successfully.</span>
                          <form action="" method="post">
                                  <input type="hidden" name="o_payments_id" value="<?=$o_payment_id?>" />
                                  <input type="hidden" name="user_id" value="<?=$user_id?>" />
                                  <input type="submit" class="btn btn-info" name="approved" value="Approved" />
                                  <input type="submit" onclick="javascript:parent.jQuery.fancybox.close();" class="btn btn-danger" name="cancelled" value="Cancelled" />
                          </form>
                        </div>
                        </div>
                      </div>

                         
                      </div>
                  </div>
        <div class="clear"></div>
    </div>
</div>


<style>
.table-bordered {   
  font-size: 12px;
}
</style>