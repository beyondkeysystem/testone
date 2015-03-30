<div class="header">
    <div class="container clearfix">
        <div class="logo">
            <?php echo $this->Html->link($this->Html->image('../css/login/images/logo-big.png'),'/',array('escape'=>false));?>
        </div>
    </div>
</div>
<div class="section">	
    <div class="container">
        <div class="login-page">
            <h1>Reset password </h1>
            <div class="login-main">
                <?php echo $this->Form->create('User',array(''));?>
                <div class="form-container clearfix">
                    <ul class="form-field clearfix">
                        <li>
                            <div class="by-clicking">
                                <?php echo $this->Session->flash();?>
                                To reset your password, enter the email address, phone number, or Harimau Account ID you use to sign in.
                            </div>
                        </li>
                        <li>
                            <div class="form-field-input">
                                <?php echo $this->Form->text('User.resetpass',array('class'=>"input-field validate-txt",'placeholder'=>'Email/Phone/Harimau Account ID','required'=>false));?>
                            </div>
                            <?php 
                                $error = $this->Form->error('User.resetpass');
                                if(isset($error)){?>
                                <!--<i class="fa fa-info-circle"></i>--> <?php echo $this->Form->error('User.resetpass');?> 
                            <?php }?>
                        </li>
                        <li>
                            <input type="submit" class="create-acc full Fleft" value="Submit">
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
        <div class="footer-left">Copyright 2015 @HaRiMau Globaltech Sdn Bhd |<a href="javascript:void(0)"> All Right Reserved</a></div>
        <ul class="footer-right">
            <li><a href="javascript:void(0)">Malaysia </a></li>
            <li>|</li>
            <li><a href="javascript:void(0)">繁体 </a></li>
            <li>|</li>
            <li><a href="javascript:void(0)">English </a></li>
            <li>|</li>
            <li><a href="javascript:void(0)">FAQ </a></li>
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