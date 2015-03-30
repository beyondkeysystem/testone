<div class="header">
    <div class="container clearfix">
        <div class="logo">
            <?php echo $this->Html->link($this->Html->image('../css/login/images/logo-big.png'),'/',array('escape'=>false));?>
        </div>
        <div class="header-right">
            <div class="forgot-pass">
                <?php echo $this->Html->link('Forgot your password ?','/users/forgotpass');?>
            </div>
            <?php echo $this->Form->create('User',array(''));?>
            <?php echo $this->Form->hidden('User.login',array('value'=>"login"));?>
            <ul class="login-form">
                <li>
                    <div class="login-field-div">
                        <i class="fa fa-user"></i>
                        <?php echo $this->Form->text('username',array('required'=>false,'class'=>"field-input",'placeholder'=>'Email / Phone no:'));?>
                        <span class="qr-code">
                            <?php echo $this->Html->image('../css/login/images/code.png'); ?>
                        </span>
                    </div>
                </li>
                <li>
                    <div class="login-field-div">
                        <i class="fa fa-lock"></i>
                        <?php echo $this->Form->password('password',array('required'=>false,'class'=>"field-input",'placeholder'=>'Password'));?>
                    </div>
                </li>
                <li>
                    <input type="submit" value="Sign in" class="sign-btn">
                </li>
            </ul>
            <?php echo $this->Form->end();?>
        </div>
    </div>
    <?php echo $this->Session->flash(); ?>
</div>



<div class="section">	
    <div class="container">
        <div class="login-page">
            <h1><?php echo __('Sign Up to Your HaRiMau Account'); ?></h1>
            <div class="login-main">
                <?php echo $this->Form->create('User',array(''));?>
                <div class="form-container clearfix">
                    <div class="select-drop clearfix">
                        <?php echo $this->Form->select('country_id',$country,array('class'=>"selectpicker",'empty'=>false));?>
                        <?php echo $this->Form->hidden('User.login',array('value'=>"signup"));?>
                    </div>


                    <ul class="form-field clearfix">
                        <li>
                            <div class="form-field-label"><?php echo __('Enter Mobile Number'); ?> </div>
                            <div class="form-field-input">
                                <?php echo $this->Form->text('User.phone',array('class'=>"input-field validate-txt"));?>
                            </div>
                            <?php 
                                $error = $this->Form->error('User.phone');
                            if(isset($error)){?>
                            <div class="error-message">   
                                <!--<i class="fa fa-info-circle"></i>--> <?php echo $this->Form->error('User.phone');?> 
                            </div>
                            <?php }?>
                        </li>

                        <li>
                            <div class="row">
                                <div class="col-md-6">
                                    <?php 
                                        echo $this->Form->text('User.captcha',array('autocomplete'=>'off','label'=>false,'class'=>'input-field','required'=>false,'placeholder'=>'Image Verification'));
                                        echo $this->Form->error('User.captcha');
                                    ?>
                                    
                                </div>
                                <div class="col-md-6 captcha-pic">
                                    <div  class="clearfix input">
                                        <?php 
                                            echo $this->Html->image($this->Html->url(array('controller'=>'users', 'action'=>'captcha'), true),array('vspace'=>2,'id'=>'img-captcha'));//echo '&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" id="a-reload">Reload</a><br />';
                                            //echo '<br />';
                                            //echo '<p>Enter security code shown above:<span>*</span></p>';
                                        ?>
                                    </div> 
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="by-clicking"> 

                                By clicking "<a href="javascript:void(0)"><?php echo __('Create an account'); ?>"</a>, <?php echo __('you agree to HaRiMau Globaltech Sdn Bhd');?> 
                                <a href="javascript:void(0)"><?php echo __('User Agreement'); ?></a> <?php echo __('and'); ?> <a href="javascript:void(0)"><?php echo __('Privacy Policy'); ?></a>

                            </div>
                        </li>
                        <li>
                            <input type="submit" class="create-acc full Fleft" value="Create Account">
                            <input type="button" onclick="window.location.href='/users/login'" class="login-btn full Fright" value="Register using an email address">
                        </li>
                    </ul>
                </div>
                <?php echo $this->Form->end();?>
            </div>
        </div>			
    </div>			
</div>


<div class="footer">
    <div class="container clearfix">
        <div class="footer-left"><?php echo __('Copyright 2015 @HaRiMau Globaltech Sdn Bhd') ?> |<a href="javascript:void(0)"> <?php echo __('All Right Reserved')?></a></div>
        <ul class="footer-right">
            <li><?php echo $this->Html->link('Malaysia', array('language'=>'may'),array('id'=>'malaysia_link')); ?></li>
            <li>|</li>
            <li><?php echo $this->Html->link('繁体', array('language'=>'chi'),array('id'=>'china_link')); ?></li>
            <li>|</li>
            <li><?php echo $this->Html->link('English', array('language'=>'eng'),array('id'=>'emglish_link')); ?></li>
            <li>|</li>
            <li><a href="/shipping_faq"><?php echo __('FAQ');?> </a></li>
        </ul>
    </div>

</div>
<script>
   /* $(document).ready(function(){
        $('#a-reload').click(function() {
            var $captcha = $("#img-captcha");
            $captcha.attr('src', $captcha.attr('src')+'?'+Math.random());
            return false;
        });
});*/
</script>