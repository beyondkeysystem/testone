<?php
$actionarr = array('register','signin');
$action = $this->uri->segment(2);

if(!in_array($action,$actionarr)){
    include dirname(dirname(dirname(dirname(__FILE__)))).'/fb/src/facebook.php';
    $facebook = new Facebook(array(
        'appId'  => appId,
        'secret' => secret,
      ));
    $fb_users = $facebook->getUser();
    if(isset($fb_users) and $fb_users !=''){
        $user_id = $this->session->userdata('id');
        if(isset($user_id) and $user_id !=''){
            
        }else{
            if(isset($fb_users) and $fb_users !='')
                redirect('/users/signin');
        }
    }else{
        
    }
    $loginUrl   = $facebook->getLoginUrl(
        array(
            'scope' => 'publish_actions'
        )
        );
      
}?>
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
      <button type="button" class="btn btn-default" data-dismiss="modal">X</button>
    <div class="modal-content">
      <div class="login-head"><i class="fa fa-lock"></i> login</div>
      <form class="col-md-12" id="loginform" action="<?php echo base_url()?>users/login" method="post">
          <?php include dirname(dirname(dirname(dirname(__FILE__)))).'/captcha/simple-php-captcha.php';
            //ob_start();
                //session_start();
                //$_SESSION = array();
                //$_SESSION['captcha'] = simple_php_captcha();
                $captcha = array('captcha'=>simple_php_captcha());
                $this->session->set_userdata($captcha);
                $captcha_d = $this->session->userdata('captcha');
                 //pr($captcha_d);
                 
          ?>
        
        <div class="login-left">
          <div class="form-group">
              <div class="form-control"> 
                <span class="error-msg error_message" style="display: none" id="error_username">Please enter your username</span> 
                <span class="error-msg error_message" style="display: none" id="error_login_fail"></span> 
                <span><i class="fa fa-user"></i></span>
                <input type="text" id="username" name="username" class="input-lg" placeholder="Username">
            </div>
          </div>
          <div class="form-group">
            <div class="form-control">
                <span class="error-msg error_message" style="display: none" id="error_password">Please enter your password</span> 
                <span><i class="fa fa-key"></i></span>
                <input type="password" name="password" id="password" class="input-lg" placeholder="Password">
                
            </div>
          </div>
          <div class="form-group">
            <input type="checkbox" name="checkboxG4" id="checkboxG4" class="css-checkbox" />
            <label for="checkboxG4" class="css-label">Remember me</label>
            <a href="/users/forgotpassword" class="forgot-link">Forgot Password?</a> </div>
          <div class="form-group captcha_test">
              <span class="error-msg error_message" style="display: none;" id="error_captcha">Please enter captcha</span> 
              <input name="captcha" id="captcha" type="text" class="captch-inp">
            <a href="#" class="captcha-box">
<!--                <img src="/assets/front/images/captcha-img.jpg" alt="img">-->
                <?php echo '<img height = "49px;" src="' . $captcha_d['image_src'] . '" alt="CAPTCHA code">';?>
            </a> 
              <input type="hidden" value="<?php echo $captcha_d['code']?>" id="captcha_code" />
          </div>
          <div class="form-group">
              <button type="button" onclick="fnlogin();" class="btn_n4">Login</button>
          </div>
        </div>
          <div class="sig-up-right">
            <div class="no-margin-right-md"> 
                <a class="pure-button pr-btn-1" style="font-size: 15px;" href="<?php echo $loginUrl;?>"><i style="background: #4e70aa;" class="fa fa-facebook"></i> Login with facebook</a> 
            </div>
         </div>
<!--        <ul class="loginlst">
          <li><a href="#"><img src="/assets/front/images/login-icon1.png" alt="icon"> weibo.com</a></li>
          <li><a href="#"><img src="/assets/front/images/login-icon2.png" alt="icon"> tencent QQ</a></li>
          <li><a href="#"><img src="/assets/front/images/login-icon3.png" alt="icon"> we chat</a></li>
        </ul>-->
      </form>
    </div>
  </div>
</div>
<script>
    
    $('#error-msg').show();
    function fnlogin(){
        $('.error_message').hide();
        var username = $('#username').val();
        var password = $('#password').val();
        var captcha = $('#captcha').val();
        var captcha_code = $('#captcha_code').val();
        var flag = 1;
        if(username ==''){
            flag = 0;
            $('#error_username').show();
        }else{
            flag = 1;
            $('#error_username').hide();
        }
        if(password ==''){
            flag = 0;
            $('#error_password').show();
        }else{
            flag = 1;
            $('#error_password').hide();
        }
        if(captcha ==''){
            flag = 0;
            $('#error_captcha').show();
        }else{
            flag = 1;
            $('#error_captcha').hide();
        }
        if(flag == '1'){
            $.ajax({
            type: "POST",
            url: "/users/login",
            data: { username: username, password: password,captcha:captcha,captcha_code:captcha_code }
            })
            .done(function( msg ) {
                $('.error_message').hide();
                if(msg=='1'){
                    window.location.href = '/';
                }else if(msg == '2'){
                    window.location.href = '/admin';
                }else if(msg == '0'){
                    $('#error_login_fail').show();
                    $('#error_login_fail').html('Incorrect username or password');
                }else if(msg == '3'){
                    $('#error_login_fail').show();
                    $('#error_login_fail').html('Your account has been deactived');
                }else if(msg == '4'){
                    $('#error_login_fail').show();
                    $('#error_login_fail').html('Invalid captcha');
                }
            });
        }
    }
</script>