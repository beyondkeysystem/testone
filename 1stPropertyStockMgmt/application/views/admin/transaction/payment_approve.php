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
                          <h3>Pending Withdraw</h3>
                      </div>
                      <br />
                      <?php echo validation_errors(); ?>
                      <div id="paypal" class="hidepayment">
                          <form action="" method="post">
                              <input type="hidden" id="payment_type" value="Cash" />
                              <div>Withdraw Method </div>
                              <div class="form-row">
                                  <select name="withdraw_method" onchange="fnwithmethod(this)" id="withdraw_method">
                                      <option value="Cash">Cash</option>
                                      <option value="Cheque">Cheque</option>
                                  </select>
                              </div>

                              <div style="display:none;" id="_bank">
                                  <div>Bank Name </div>
                                  <div class="form-row">
                                      <input type="text" name="bank_name" id="bank_name" style="height: 32px;" />
                                  </div>
                              </div>

                              <div style="display:none;" id="_cheque">
                                  <div>Cheque No.</div>
                                  <div class="form-row">
                                      <input type="text" name="cheque_no" id="cheque_no" style="height: 32px;">
                                  </div>
                              </div>

                              <div class="search_btn"> 
                                  <input type="submit" class="btn btn-info" name="approved" value="Approved" />
                                  <input type="submit" class="btn btn-danger" name="cancelled" value="Cancelled" />
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