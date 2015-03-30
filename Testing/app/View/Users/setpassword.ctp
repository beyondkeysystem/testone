<div class="header">
    <div class="container clearfix">
        <div class="logo">
            <?php echo $this->Html->image('../css/login/images/logo-big.png'); ?>
        </div>
        <div class="header-right">
            <div class="forgot-pass"><a href="javascript:void(0)"><?php echo __('Forgot your password ?'); ?></a></div>
            
            <?php echo $this->Form->create('User',array('url'=>'/users/login'));?>
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
            <h1><?php echo __('Set your password');?></h1>
            <div class="login-main">
                <?php echo $this->Form->create('User',array(''));?>
                <div class="form-container clearfix">
                    


                    <ul class="form-field clearfix">
                        <li>
                            <div class="form-field-label"><?php echo __('Password');?> </div>
                            <div class="form-field-input">
                                <?php echo $this->Form->password('User.npassword',array('class'=>"input-field validate-txt",'placeholder'=>'Password','required'=>false));?>
                            </div>
                            <?php echo $this->Form->error('User.npassword');?>
                            
                        </li>
                        <li>
                            <div class="form-field-label"><?php echo __('Confirm password');?></div>
                            <div class="form-field-input">
                                <?php echo $this->Form->password('User.cpassword',array('class'=>"input-field validate-txt",'placeholder'=>'Confirm Password','required'=>false));?>
                            </div>
                                <?php echo $this->Form->error('User.cpassword');?>
                            
                        </li>
                        <li>
                            <input type="submit" class="create-acc full Fleft" value="Create Account">
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