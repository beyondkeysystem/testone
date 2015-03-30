<?php //include dirname(dirname(dirname(dirname(__FILE__)))).'/captcha/simple-php-captcha.php';
    
    $captcha_d = $this->session->userdata('captcha');
    //pr($captcha_d);

?>
<div class="container main-cnt">
  <form action="" method="post">
    <div class="form-title">
      <h3 class="cmn-heading"><span>Sign up</span></h3>
      <p>Please fill up the form below in order to get notificaiton as soon as our beta version is online.</p>
    </div>
    <div class="sign-form">
      
      <div class="sig-up-right">
        <div class="no-margin-right-md"> 
            <a href="<?php echo $loginUrl?>" class="pure-button pr-btn-1"><i class="fa fa-facebook"></i> Login with facebook</a> 
<!--            <a href="#" class="pure-button pr-btn-2"><i class="fa fa-google"></i> Login with google</a>
            <a href="#" class="pure-button pr-btn-3"><i class="fa fa-twitter"></i> Login with twitter </a>-->
        </div>
      </div>
<div class="sig-up-left" >
           <span class="or-txt">or</span>
            <div class="form-group">
            <span class="error-msg-sign"><?php echo form_error('users[firstname]'); ?></span>
              <div class="input-group">
                  <input type="text" name="users[firstname]" value="<?php echo set_value('users[firstname]'); ?>" class="form-control" placeholder="First name">
              </div>
            </div>
            <div class="form-group">
                <span class="error-msg-sign"><?php echo form_error('users[lastname]'); ?></span>
              <div class="input-group">
                  <input type="text" name="users[lastname]" value="<?php echo set_value('users[lastname]'); ?>" class="form-control" placeholder=" Last Name">
              </div>
            </div>
            <div class="form-group">
                <span class="error-msg-sign"><?php echo form_error('users[email]'); ?></span>
              <div class="input-group">
                  <input type="text" name="users[email]" value="<?php echo set_value('users[email]'); ?>" class="form-control" placeholder="E-mail" >
              </div>
            </div>
            <div class="form-group">
                <span class="error-msg-sign"><?php echo form_error('users[username]'); ?></span>
              <div class="input-group">
                  <input type="text" name="users[username]" value="<?php echo set_value('users[username]'); ?>" class="form-control" placeholder="Username" >
              </div>
            </div>
            <div class="form-group">
                <span class="error-msg-sign"><?php echo form_error('users[password]'); ?></span>
              <div class="input-group">
                  <input type="password" name="users[password]" class="form-control" placeholder="Password" autocomplete="off">
              </div>
            </div>
            <div class="form-group">
                <span class="error-msg-sign"><?php echo form_error('cpassword'); ?></span>
              <div class="input-group">
                  <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" autocomplete="off">
              </div>
            </div>
            
            <div class="form-group">
                <span class="error-msg-sign"><?php echo form_error('users[dob]'); ?></span>
              <div class="input-group dob-txt">
              <span class="cal-1"><a href="Javascript:;"><i class="fa fa-calendar"></i></a></span>
              <input type="text" name="users[dob]" readonly value="<?php if(set_value('users[dob]')) {echo set_value('users[dob]');}else{ ?>1900-01-01<?php }?>" class="form-control datepicker" placeholder="Date Of birth" autocomplete="off" >
              </div>
            </div>
            <div class="form-group">
                <span class="error-msg-sign"><?php echo form_error('users[mobile]'); ?></span>
              <div class="input-group">
                  <input type="text" name="users[mobile]" value="<?php echo set_value('users[mobile]'); ?>" class="form-control" placeholder="Mobile">
              </div>
            </div>
            <div class="form-group gender-txt">Gender <span class="gender-1">
                    <span class="error-msg-sign"><?php echo form_error('users[gender]'); ?></span>
                    <input type="radio" <?php if(isset($_POST['users']['gender']) and $_POST['users']['gender'] =='Male') {?> checked <?php }?> class="css-checkbox" value="Male" id="radio11" name="users[gender]">
                          <label class="css-label radGroup1" for="radio11">Male</label>
              </span> <span class="gender-1">
               <input type="radio" class="css-checkbox" <?php if(isset($_POST['users']['gender']) and $_POST['users']['gender'] =='Female') {?> checked <?php }?> value="Female" id="radio12" name="users[gender]">
                          <label class="css-label radGroup1" for="radio12">Female</label>
              </span> </div>
            <div class="form-group">
                <span class="error-msg-sign"><?php echo form_error('captcha'); ?></span>
              <div class="input-group">
                <div class="captcha-pic">
                    <input type="text" name="captcha" class="captch-inp" name="">
<!--                  <img src="/assets/front/images/captcha-img.jpg" alt="" />-->
                    <?php echo '<img height = "49px;" src="' . $captcha_d['image_src'] . '" alt="CAPTCHA code">';?>
                </div>
              </div>
            </div>
            <div class="form-group btnbox">
              <button type="submit" class="btn btn-primary btn-login">Sign Me Up! </button>
            </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </form>
</div>
<script>
    jQuery(function(){
            jQuery('.datepicker').datepicker({
                dateFormat: "yy-mm-dd",
                changeYear:true, 
                changeMonth:true,
                yearRange:"1900:<?php echo date('Y')?>"});
            $('#textboxname').datepicker('setDate', '2013');

    })
</script>