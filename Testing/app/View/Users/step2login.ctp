<div class="header">
    <div class="container clearfix">
        <div class="logo">
            <?php echo $this->Html->link($this->Html->image('../css/login/images/logo-big.png'),'/',array('escape'=>false));?>
            <?php //echo $this->Html->image('../css/login/images/logo-big.png'); ?>
        </div>
    </div>
</div>
<?php //pr($this->Session->read())?>
<div class="section">	
    <div class="container">
        <div class="login-page">
            <h1><?php echo __('Second Step Code'); ?></h1>
            <div class="login-main">
                <?php echo $this->Form->create('User',array(''));?>
                <div class="form-container clearfix">

                    <ul class="form-field clearfix">
                        <li>
                            <div class="form-field-label"><?php echo __('Second step code');?></div>
                            <div class="form-field-input">
                                <?php echo $this->Form->text('User.secondstepcode',array('class'=>"input-field validate-txt",'placeholder'=>'Second step code','required'=>false));?>
                            </div>
                            <?php echo $this->Form->error('User.secondstepcode');?> 
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