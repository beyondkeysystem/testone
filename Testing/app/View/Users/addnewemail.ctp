<?php echo $this->Form->create('Emailmodel', array('url' => '/users/change_email', 'id' => 'emailform')); ?>
<h2>Account verification <a class="close-arrow" href="javascript:void(0)" id="close3"> <i class="fa fa-close"></i> </a> </h2> 
<div class="number-phone">
    Enter your email address
</div>

<div class="field-area clearfix">
    <div class="main-row clearfix">
        <?php echo $this->Form->text('Emailmodel.email_val', array('class' => "field-area-left", 'placeholder' => "Email", 'required' => false)) ?>
    </div>
    <div id="Error_EmailmodelEmailVal"></div>
    <div class="verifiycls clearfix">
        <div class="row clearfix">
        <div class="col-md-6">
            <?php echo $this->Form->text('User.captcha', array('autocomplete' => 'off', 'label' => false, 'class' => 'field-area-left', 'required' => false, 'placeholder' => 'Image Verification')); ?>
        </div>
        <div class="col-md-3 captcha-pic">
            <div  class="clearfix input">
                <?php echo $this->Html->image($this->Html->url(array('controller' => 'users', 'action' => 'captcha'), true), array('vspace' => 2, 'id' => 'img-captcha')); ?>
            </div> 
        </div>
        </div>    
    </div>
    <div id="Error_UserCaptcha"></div>
</div>
<div class="submit-row">
    <input type="button" onclick="return fnchange_email();" value="Submit" name="email" class="subnit-btn">
    <p> <a href="javascript:void(0)">	<i class="fa fa-question-circle"></i>   Did not receive a code?  </a> </p>
    <p> Not working ?  <a href="javascript:void(0)"> Try this instead </a></p>
</div>
</div>

<script>

    $(document).ready(function() {
        $('#a-reload').click(function() {
            var $captcha = $("#img-captcha");
            $captcha.attr('src', $captcha.attr('src') + '?' + Math.random());
            return false;
        });
    });
</script>