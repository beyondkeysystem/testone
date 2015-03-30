<div class="header">
    <div class="container clearfix">
        <div class="logo">
            <?php echo $this->Html->image('../css/login/images/logo-big.png'); ?>
        </div>
    </div>
</div>
<div class="section">	
    <div class="container">
        <div class="login-page">
            <h1><?php echo __('Harimau Account verification'); ?></h1>
            <div class="login-main">
                <?php echo $this->Form->create('User',array(''));?>
                <div class="form-container clearfix">
                    <ul class="form-field clearfix">
                        <li>
                            <div class="by-clicking">
                                <b><?php echo __('Please click here to send a email to verify'); ?></b><br />
                                <?php //pr($userdata);?>
                                <?php echo substr($userdata['User']['username'],0,-12);?>..
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
                            <input type="submit" class="create-acc full Fleft" value="Confirm">
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