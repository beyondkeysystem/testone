<link href="<?php echo base_url(); ?>css/jquery.simple-dtpicker.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>js/jquery.simple-dtpicker.js"></script>

<?php $this->load->view('home/breadcrumb');
if(isset($_GET['m'])){
$message='User already exist please try other user name';	
}
?>
<!--Main Body-->
<div class="wrapper">
	<div class="register">
    	<div class="reg-left">
        	<h3><?=$this->lang->line('create_your_acccount_with')?> <span class="col-g"><?=$this->lang->line('myviko_title')?></span><span class="col-b"><?=$this->lang->line('home_title')?></span> </h3>
            <div class="reg-form">
            	<?php
		    //form data
		$attributes = array('class' => 'form-horizontal', 'id' => '');
		$options_pay= array('' => "Select", 'paypal' => "Paypal", 'paypal2' => "Paypal2");
		$options_roles = array('' => "Select");
		foreach ($roles as $row)
		{
		  $options_roles[$row['charges']] = $row['roles'];
		}
        $payment_method = array('' => "Select", 'paypal'=> "Paypal", 'bank'=> "Bank");
        foreach ($roles as $row)
        {
          $options_roles[$row['charges']] = $row['roles'];
        }
		echo validation_errors();
		if(isset($message)){
		// echo '<span style="color:red; font-size:15px; position:relative; bottom:0px;">'.$message.'</span>';
	   ?>
        <script> 
            $(".close").hide(); 
            $(".alert-error").css({"border":"1px solid #ccc","margin":"5px"});
            $(".alert-error:first").before('<div class="alert alert-error" style="border: 1px solid rgb(204, 204, 204);color:red; margin: 5px;"><strong>Validation Error.</strong></div>');
        </script>
        
        <?php	
		}
                 echo form_open('account', $attributes);
                 ?>
                 <br/>
                <div class="reg-form-row">
                	<div class="row-col1">
                    	<label><?=$this->lang->line('first_name')?></label>
                        <input type="text" name="fname" value="<?php echo set_value('fname'); ?>">
                    </div>
                    <div class="row-col1">
                    	<label><?=$this->lang->line('last_name')?></label>
                        <input type="text" name="lname"  value="<?php echo set_value('lname'); ?>">
                    </div>
                </div>
                <div class="reg-form-row">
                	<div class="row-col1">
                    	<label><?=$this->lang->line('ic_number')?></label>
                        <input type="text" name="ic_number" value="<?php echo set_value('ic_number'); ?>">
                    </div>
                    <div class="row-col1">
                    	<label><?=$this->lang->line('hp_number')?> (0123456789)</label>
                        <input type="text" name="phone" value="<?php echo set_value('phone'); ?>">
                    </div>
                </div>
                <div class="reg-form-row">
                	<div class="row-col1">
                    	<label><?=$this->lang->line('address')?></label>
                        <textarea name="address"><?php echo set_value('address'); ?></textarea>
                    </div>
                    <div class="postcode-city">
                    <div class="row-col1">
                    	<label><?=$this->lang->line('post_code')?></label>
                        <input type="text" name="postalcode" value="<?php echo set_value('postalcode'); ?>">
                    </div>
                    <div class="row-col1">
                    	<label><?=$this->lang->line('city')?></label>
                        <input type="text" name="city" value="<?php echo set_value('city'); ?>">
                    </div>
                    </div>
                </div>	
                <div class="reg-form-row">
                	<div class="row-col1">
                    	<label><?=$this->lang->line('state')?></label>
                        <input type="text" name="state" value="<?php echo set_value('state'); ?>">
                    </div>
                    <div class="row-col1">
                    	<label><?=$this->lang->line('country')?></label>
                        <input type="text" name="country" value="<?php echo set_value('country'); ?>">                        
                    </div>
                </div>
                <div class="reg-form-row">
                	<div class="row-col1">
                    	<label><?=$this->lang->line('occupation')?></label>
                        <input type="text" name="occupation" value="<?php echo set_value('occupation'); ?>">
                    </div>
                    <div class="row-col1">
                    	<label><?=$this->lang->line('email')?></label>
                        <input type="text" name="email" value="<?php echo set_value('email'); ?>">
                    </div>
                </div>
                <div class="reg-form-row">
                	<div class="row-col1">
                    	<label><?=$this->lang->line('login_attr_username')?></label>
                        <input type="text" name="username" value="<?php echo set_value('username'); ?>">
                    </div>
                    <div class="row-col1">
                    	<label><?=$this->lang->line('login_attr_password')?></label>
                        <input type="password" name="password" value="<?php echo set_value('password'); ?>">
                    </div>
                </div>
                <div class="reg-form-row">
                	<div class="row-col1">
                    	<label><?=$this->lang->line('roles')?></label>
                        <?php echo form_dropdown('roles', $options_roles, set_value('roles'), 'style="width: 250px;" id="selection" onchange="fnpaymothd(payment_method.value,this.value )" '); ?>
                    </div>
                    <div class="row-col1">
                    	<label><?=$this->lang->line('income_range')?></label>
                       <input type="text" class="income-range ir1" name="income" value="<?php echo set_value('income'); ?>">
                       <span id="dash"></span><input type="text" class="income-range" name="range" value="<?php echo set_value('range'); ?>">
                    </div>
                </div>
                <div class="reg-form-row">
                    <div class="row-col1" style="display:none" id="payment_method_div">
                        <label><?=$this->lang->line('menu_payment')?></label>
                        <?php echo form_dropdown('payment_method', $payment_method, set_value('payment_method'), 'style="width: 250px;" id="payment_method" onchange="fnpaymothd(this.value,roles.value )"'); ?>
                    </div>
                    <div class="row-col1">
                       <input type="hidden" name="payment_type" id="payment_type" value="paypal">
                       <!--  <label>Income Range</label>
                       <input type="text" class="income-range ir1" name="income" value="<?php echo set_value('income'); ?>">
                       <span id="dash"></span><input type="text" class="income-range" name="range" value="<?php echo set_value('range'); ?>"> -->
                    </div>
                </div>
                <div class="reg-form-row" class="hidedetails" id="bank_div1" style="display: none;">
                    <div class="row-col1" >
                        <label><?=$this->lang->line('payment_time')?></label>
                        <input type="text" name="datetime" id="datetime" readonly class="date9" placeholder="<?=$this->lang->line('payment_time')?>" >
                        <script type="text/javascript">
                                $(function(){
                                        $('.date9').appendDtpicker({
                                                "closeOnSelected": true
                                        });
                                });
                        </script>
                    </div>
                    <div class="row-col1">
                       <label><?=$this->lang->line('bank_name')?></label>
                       <input type="text" name="bank_name" id="bank_name" placeholder="<?=$this->lang->line('bank_name')?>" value="<?php echo set_value('bank_name'); ?>">
                    </div>
                </div> 
                <div class="reg-form-row" class="hidedetails" id="bank_div2" style="display: none;">
                    <div class="row-col1" >
                        <label><?=$this->lang->line('bank_account_no')?></label>
                        <input type="text" name="account_no" id="account_no" placeholder="<?=$this->lang->line('bank_account_no')?>" value="<?php echo set_value('account_no'); ?>">
                    </div>
                    <div class="row-col1">
                       <label><?=$this->lang->line('payment_location')?></label>
                       <input type="text" name="location" id="location" placeholder="<?=$this->lang->line('payment_location')?>" value="<?php echo set_value('location'); ?>">
                    </div>
                </div>
                <!-- -->
                    
			<?php 
			
			 echo '<input type="hidden" name="cmd" value="_xclick" />';
			 echo '<input type="hidden" name="upload" value="1">';
			 echo '<input name="no_note" type="hidden" value="1" />';
			 echo ' <input name="lc" type="hidden" value="USD" />';
			 echo ' <input name="currency_code" type="hidden" value="USD" />';
			 echo ' <input name="bn" type="hidden" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />';
			 echo ' <input name="payer_email" type="hidden" value="nitin.s@cisinlabs.com" />';
			 echo '<input type="hidden" name="rm" value="2">';
			 echo '<input type="hidden" name="src" value="1">';
			 echo ' <input type="hidden" name="sra" value="1">';
			 echo ' <input type="hidden" name="on0" id="membership_type" value="">';
			
			 echo '<input id="item" type="hidden" name="item_name_1" value="Platinum" />';
   			echo '<input  id="amount" type="hidden" name="amount_1" value="$100" />';
		   	?>
                       
        
                <div class="check">
                	<input type="checkbox" name="terms" value="check"> <?=$this->lang->line('i_agree')?> <a href="javascript:void(0);" class="big-link" data-reveal-id="termsModal" data-animation="fade"><?=$this->lang->line('term_header')?></a> <?=$this->lang->line('and')?> <a href="javascript:void(0);" class="big-link" data-reveal-id="privacyModal" data-animation="fade"><?=$this->lang->line('privacy_header')?></a> <?=$this->lang->line('of_myvikohome')?>
                </div>
                <div class="search_btn"><input type="submit" value="<?=$this->lang->line('header_register')?>" name="register"></div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <div class="reg-right">
        	<?=$this->lang->line('register_left_content'); ?>
           
            <!--<div class="building"><img src="images/building.png"></div>-->
        </div>
        <div class="clear"></div>
    </div>
</div>
<!--/.Main Body-->
<?php $this->load->view('home/blue_bar'); ?>
<script>
function fnpaymothd(payment_method,roles){
    if(payment_method == 'bank' && roles > 0) {
        $('#bank_div1').show();
        $('#bank_div2').show();
        $('#payment_type').val('bank');
    }else{
        $('#bank_div1').hide();
        $('#bank_div2').hide();
        $('#account_no').val('');
        $('#bank_name').val('');
        $('#payment_type').val('paypal');
    }
}

$("#selection").change(function(){
    var role = $("#selection option:selected").text()
    if(role == 'Normal' || role == 'Select'){
        $('#payment_method_div').hide();
    }else{
        $('#payment_method_div').show();      
    }
});

</script>