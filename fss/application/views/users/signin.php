<?php //include dirname(dirname(dirname(dirname(__FILE__)))).'/captcha/simple-php-captcha.php';
    
    $captcha_d = $this->session->userdata('captcha');
    //pr($captcha_d);

?>
<div class="container main-cnt">
    <div class="form-title">
      <h3 class="cmn-heading"><span>Login</span></h3>
    </div>
    <form action="" method="post">
    <div class="sign-form">
      <div class="sig-up-right">
        <div class="no-margin-right-md"> 
            <a href="<?php echo $loginUrl;?>" class="pure-button pr-btn-1"><i class="fa fa-facebook"></i> Login with facebook</a> 
<!--            <a href="/users/signin/t" class="pure-button pr-btn-2"><i class="fa fa-google"></i> Login with google</a>
            <a href="#" class="pure-button pr-btn-3"><i class="fa fa-twitter"></i> Login with twitter </a>-->
        </div>
      </div>
      <div class="sig-up-left login-in"><span class="or-txt">or</span>
          <div class="form-group"> 
            <span class="error-msg-sign"><?php echo $this->session->flashdata('msg');?></span>
        </div>
        <div class="form-group"> 
            <span class="error-msg-sign"><?php echo form_error('username'); ?></span>
          <div class="input-group">
            <p>User Name:</p>
            <input type="text" name="username" value="<?php echo set_value('username'); ?>" class="form-control" placeholder="Username" autocomplete="off">
          </div>
        </div>
        <div class="form-group">
            <span class="error-msg-sign"><?php echo form_error('password'); ?></span>
          <div class="input-group">
            <p>Password:</p>
            <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off">
          </div>
        </div>
        <div class="form-group">
            <span class="error-msg-sign"><?php echo form_error('captcha'); ?></span>
          <div class="input-group">
            <div class="captcha-pic">
              <input type="text" class="captch-inp" name="captcha">
              <!--                  <img src="/assets/front/images/captcha-img.jpg" alt="" />-->
                    <?php echo '<img height = "49px;" src="' . $captcha_d['image_src'] . '" alt="CAPTCHA code">';?>
            
            </div>
          </div>
        </div>
        <div class="form-group btnbox">
          <button type="submit" class="btn btn-primary btn-login">Login </button>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
</form>
  </div>