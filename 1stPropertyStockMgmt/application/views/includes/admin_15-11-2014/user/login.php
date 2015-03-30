<?php $this->load->view('home/breadcrumb');
?>
<!--Main Body-->
<div class="wrapper">
	<div class="register">
    	<div class="reg-left">
        	<h3>Create your acccount with <span class="col-g">MyViko</span><span class="col-b">Home</span> </h3>
            <div class="reg-form">
                	<?php if(isset($message)){
		echo $message;
			
		} ?>
            	 <div>
                    <h3>Signin with your account</h3>
                  
                    <div class="clear"></div>
                   <?php echo form_open('user/validate_credentials_user'); ?>
                    <div class="reg-form-row">
                      <div class="row-col1">
                        <label>Username</label>
                        <input type="text" name="user_name">
                      </div>
                      <div class="row-col1">
                        <label>Password</label>
                        <input type="password" name="password">
                      </div>
                    </div>
                    <div class="remember">
                        <!--<div class="check"><input type="checkbox"> Remember me on this computer</div>-->
                        <a href="<?php echo site_url('forget'); ?>">Forgot Password</a>
                    </div>
                    <div class="search_btn"><input type="submit" value="Signin"></div>
                    <div class="signupnew">Not A Member ?   <a href="<?php echo site_url('register'); ?>"> Sign up Now!</a></div>
                    <?php echo form_close(); ?>
                  </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<!--/.Main Body-->
<?php $this->load->view('home/blue_bar'); ?>