<?php $this->load->view('home/breadcrumb');
if(isset($_GET['m'])){
$message='User already exist please try other user name';	
}
?>
<!--Main Body-->
<div class="wrapper">
	<div class="register">
    	<div class="reg-left">
        	<h3>Create your acccount with <span class="col-g">MyViko</span><span class="col-b">Home</span> </h3>
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
		echo validation_errors();
		if(isset($message)){
		echo $message;
			
		}
                 echo form_open('account', $attributes);
                 ?>
                <div class="reg-form-row">
                	<div class="row-col1">
                    	<label>First Name</label>
                        <input type="text" name="fname" value="<?php echo set_value('fname'); ?>">
                    </div>
                    <div class="row-col1">
                    	<label>Last Name</label>
                        <input type="text" name="lname"  value="<?php echo set_value('lname'); ?>">
                    </div>
                </div>
                <div class="reg-form-row">
                	<div class="row-col1">
                    	<label>IC Number</label>
                        <input type="text" name="ic_number" value="<?php echo set_value('ic_number'); ?>">
                    </div>
                    <div class="row-col1">
                    	<label>Phone Number / HP Number</label>
                        <input type="text" name="phone" value="<?php echo set_value('phone'); ?>">
                    </div>
                </div>
                <div class="reg-form-row">
                	<div class="row-col1">
                    	<label>Address</label>
                        <textarea name="address"><?php echo set_value('address'); ?></textarea>
                    </div>
                    <div class="postcode-city">
                    <div class="row-col1">
                    	<label>Post Code</label>
                        <input type="text" name="postalcode" value="<?php echo set_value('postalcode'); ?>">
                    </div>
                    <div class="row-col1">
                    	<label>City</label>
                        <input type="text" name="city" value="<?php echo set_value('city'); ?>">
                    </div>
                    </div>
                </div>	
                <div class="reg-form-row">
                	<div class="row-col1">
                    	<label>State</label>
                        <input type="text" name="state" value="<?php echo set_value('state'); ?>">
                    </div>
                    <div class="row-col1">
                    	<label>Country</label>
                        <input type="text" name="country" value="<?php echo set_value('country'); ?>">                        
                    </div>
                </div>
                <div class="reg-form-row">
                	<div class="row-col1">
                    	<label>Occupation</label>
                        <input type="text" name="occupation" value="<?php echo set_value('occupation'); ?>">
                    </div>
                    <div class="row-col1">
                    	<label>Email</label>
                        <input type="text" name="email" value="<?php echo set_value('email'); ?>">
                    </div>
                </div>
                <div class="reg-form-row">
                	<div class="row-col1">
                    	<label>Username</label>
                        <input type="text" name="username" value="<?php echo set_value('username'); ?>">
                    </div>
                    <div class="row-col1">
                    	<label>Password</label>
                        <input type="password" name="password" value="<?php echo set_value('password'); ?>">
                    </div>
                </div>
                <div class="reg-form-row">
                	<div class="row-col1">
                    	<label>Roles</label>
			<?php echo form_dropdown('roles', $options_roles, set_value('roles'), 'style="width: 250px;" id="selection"'); ?>
                    </div>
                    <div class="row-col1">
                    	<label>Income Range</label>
                       <input type="text" class="income-range ir1" name="income" value="<?php echo set_value('income'); ?>">
                       <span id="dash">-</span><input type="text" class="income-range" name="range" value="<?php echo set_value('range'); ?>">
                    </div>
                </div>
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
                	<input type="checkbox" name="terms" value="<?php echo set_value('terms'); ?>"> I agree to the <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a> of MyVikoHome.
                </div>
                <div class="search_btn"><input type="submit" value="Register" name="register"></div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <div class="reg-right">
        	
            <h4>Your Property Search Begins and Ends with Us</h4>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            <ul>
            	<li><span><i class="fa fa-star"></i></span><div class="icotxt"><strong>Shortlist your Favourite Properties</strong><p>Save, view or compare your favourite properties anytime</p></div></li>
                <li><span><i class="fa fa-dollar"></i></span><div class="icotxt"><strong>Sell Your Property</strong><p>Post an ad listing and sell your property for a minimum fee</p></div></li>
                <li><span><i class="fa fa-bell"></i></span><div class="icotxt"><strong>Get Property Alerts </strong><p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur</p></div></li>
                <li><span><i class="fa fa-building"></i></span><div class="icotxt"><strong>Post Property Wanted Requests</strong><p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit.</p></div></li>
            </ul>
           
            <!--<div class="building"><img src="images/building.png"></div>-->
        </div>
        <div class="clear"></div>
    </div>
</div>
<!--/.Main Body-->
<?php $this->load->view('home/blue_bar'); ?>