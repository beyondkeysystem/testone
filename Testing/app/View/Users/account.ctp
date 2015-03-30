<?php
   // pr($customerdata);
    $total = 0;
    if(isset($customerdata['User']['password']) and $customerdata['User']['password'] !=''){
        $total = $total+1;
    }
    if(isset($customerdata['User']['phone']) and $customerdata['User']['phone'] !=''){
        $total = $total+1;
    }
    if(isset($customerdata['User']['username']) and $customerdata['User']['username'] !=''){
        $total = $total+1;
    }
    if(isset($customerdata['User']['question']) and $customerdata['User']['question'] !=''){
        $total = $total+1;
    }
   // echo $total;
    $risks = 4-$total;
    $point = $total*25;
?>

<div class="section account-bg">
    <div class="container">
        <div class="account-detail">
            <div role="tabpanel">
                <!-- Nav tabs -->
                <?php echo $this->element('fe/account_tab'); ?>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                        <div class="security-resion clearfix">
                            <div class="col-md-3 security-resion-left">
                                <?php echo __('Security Ranking'); ?>
                            </div>
                            <div class="col-md-9 security-resion-right">
                                <div class="top-txt clearfix">
                                    <div class="top-txt-left"><span><?php echo $point;?></span> <?php echo __('Points'); ?></div>
                                    <div class="top-txt-right"><span><?php echo $risks;?></span> <?php echo __('risks detected'); ?></div>
                                </div>
                                <div class="progress-main">
                                    <div class="progress progress-striped active">
                                        <div style="width: <?php echo $point;?>%;" class="progress-bar progress-bar-danger six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="50"> </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <?php echo $this->Session->flash(); ?>
                        <div class="account-security-main clearfix">
                            <div class="account-security-main-top clearfix">
                                <div class="account-security-main-top-left">
                                    <div class="account-security-main-top-left-icon"> <i class="fa fa-lock"></i> </div>
                                    <div class="account-security-main-top-left-txt">
                                        <h2><?php echo __('Account password'); ?></h2>
                                        <p><?php echo __('Protect your HaRiMau Account'); ?> </p>
                                    </div>
                                </div>
                                <div class="account-security-main-top-right">
                                    <a href="javascript:void(0)" class="change-btn" id="change1"><?php echo __('Change'); ?> </a>
                                </div>
                            </div>
                        </div>
                        <div class="account-security-main-bottom clearfix" id="change1-open"> 
                            <h2><?php echo __('Change password'); ?> <a class="close-arrow" href="javascript:void(0)" id="close1"> <i class="fa fa-close"></i> </a> </h2> 
                            <?php echo $this->Form->create('User',array('id'=>'passwordform')); ?>
                            <div class="field-area clearfix"><br />
                                <div class="main-row clearfix">
                                    <p><?php echo __('Current password'); ?> </p>
                                    <?php echo $this->Form->password('oldpassword', array('class' => "field-area-left", 'placeholder' => "Enter Password",'value'=>'','required'=>false)); ?>
                                    <?php echo $this->Form->error('oldpassword'); ?>
                                    <?php echo $this->Form->hidden('password_field',array('value'=>'pass')); ?>
                                </div>
                                <div class="main-row clearfix">
                                    <p><?php echo __('New password'); ?> </p>
                                    <?php echo $this->Form->password('newpassword', array('class' => "field-area-left", 'placeholder' => "Enter new Password",'required'=>false)); ?>
                                    <?php echo $this->Form->error('newpassword'); ?>
                                </div>
                                <div class="main-row clearfix">
                                    <p><?php echo __('Confirm password'); ?> </p>
                                    <?php echo $this->Form->password('repassword', array('class' => "field-area-left", 'placeholder' => "Enter Confirm Password",'required'=>false)); ?>
                                    <?php echo $this->Form->error('repassword'); ?>
                                </div>
                                <div class="submit-row">
                                    <input type="submit" value="Submit" name="password" class="subnit-btn">
                                </div>
                            </div>
                            <?php $this->Form->end(); ?>
                        </div>
                        <div class="account-security-main clearfix">
                            <div class="account-security-main-top clearfix">
                                <div class="account-security-main-top-left">
                                    <div class="account-security-main-top-left-icon"> <i class="fa fa-envelope"></i> </div>
                                    <div class="account-security-main-top-left-txt">
                                        <?php if(isset($customerdata['User']['username']) and $customerdata['User']['username'] !=''){?>
                                            <h2><?php echo __('Secure email'); ?>: 
                                            <?php
                                                $expl = explode('@',$customerdata['User']['username']);
                                                //pr($expl);
                                                 $first= substr($expl[0],0,2);
                                                 $last= substr($expl[0],-1,2);
                                                 $first1= substr($expl[1],0,1);
                                                 $last1= substr($expl[1],-4);
                                                 echo $first.'*********'.$last.'@'.$first1."****".$last1;
                                            ?> 
                                                <i class="fa fa-exclamation-circle"></i> </h2>
                                            <p class="red-txt1"> <?php echo __('Use this email address to sign into your Harimau Account, reset your password, or change your security preferences');?></p>
                                        <?php }else{?>
                                            <h2<?php echo __('>Secure email'); ?>: <?php echo __('（None ）'); ?> <i class="fa fa-exclamation-circle"></i> </h2>
                                            <p class="red-txt1"> <?php echo __('Choose an email address to link with this account'); ?>  </p>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="account-security-main-top-right">
                                    <?php if(isset($customerdata['User']['username']) and $customerdata['User']['username'] !=''){?>
                                    <a href="javascript:void(0)" class="change-btn" onclick="fngetemailverify();" id="change3"><?php echo __('Change'); ?> </a>
                                    <?php }else{?>
                                        <a href="javascript:void(0)" class="change-btn" onclick="fngetemailverify();" id="change3"><?php echo __('Add'); ?> </a>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                            <div class="account-security-main-bottom clearfix" id="change3-open">
                                <div id="emailbody">
                                    <?php echo $this->Form->create('Emailmodel',array('id'=>'emailform'));?>
                                    <h2><?php echo __('Account verification'); ?> <a class="close-arrow" href="javascript:void(0)" id="close3"> <i class="fa fa-close"></i> </a> </h2> 
                                    <div class="number-phone">
                                        <?php if(isset($customerdata['User']['phone']) and $customerdata['User']['phone'] !=''){?>
                                            <?php
                                                 //$expl = explode('@',$customerdata['User']['phone']);
                                                 $mfirst= substr($customerdata['User']['phone'],0,3);
                                                 $mlast= substr($customerdata['User']['phone'],-4);

                                            ?>
                                            <?php echo __('Use the phone'); ?> (<?php echo $mfirst.'******'.$mlast?>) <?php echo __('associated with your account to get a verification code'); ?>.
                                        <?php }else{?>
                                            <?php echo __('Use the email'); ?> (<?php echo $first.'*********'.$last.'@'.$first1."****".$last1;?>) <?php echo __('associated with your account to get a verification code.'); ?>
                                        <?php }?>

                                    </div>
                                    <div class="field-area clearfix">
                                        <div class="main-row clearfix">
                                            <?php echo $this->Form->text('Emailmodel.email_val',array('class'=>"field-area-left", 'placeholder'=>"Enter Code",'required'=>false))?>
                                            
                                            <?php //echo $this->Form->hidden('Emailmodel.email_code',array('value'=>'email','required'=>false));?>
                                            <input type="button" value="Resend" onclick="fngetemailverify();" class="field-area-right">
                                        </div>		
                                        <div id="email_error"></div>
                                        <div class="submit-row">
                                            <input type="button" onclick="return emailverification();" value="Submit" name="email" class="subnit-btn">
                                            <p> <a href="javascript:void(0)">	<i class="fa fa-question-circle"></i>   <?php echo __('Did not receive a code?'); ?>  </a> </p>
                                            <p> <?php echo __('Not working'); ?> ?  <a href="javascript:void(0)"> <?php echo __('Try this instead'); ?> </a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo $this->Form->end();?>

                        <div class="account-security-main clearfix">
                            <div class="account-security-main-top clearfix">
                                <div class="account-security-main-top-left">
                                    <div class="account-security-main-top-left-icon"> <i class="fa fa-tablet"></i> </div>
                                    <div class="account-security-main-top-left-txt">
                                        <h2>Secure mobile number: 
                                            <?php if(isset($customerdata['User']['phone']) and $customerdata['User']['phone'] !=''){?>
                                                <?php echo $mfirst.'******'.$mlast?> 
                                            <?php }else{?>
                                                (None)
                                            <?php }?>
                                        </h2>
                                            
                                        <p><?php echo __('Use your trusted devices to sign in to your account, reset your password, or change other security settings.'); ?></p>
                                    </div>
                                </div>
                                <div class="account-security-main-top-right">
                                    <?php if(isset($customerdata['User']['phone']) and $customerdata['User']['phone'] !=''){?>
                                    <a href="javascript:void(0)" class="change-btn" onclick="fngetemailverify();" id="change2"><?php echo __('Change'); ?> </a>
                                    <?php }else{?>
                                        <a href="javascript:void(0)" class="change-btn" onclick="fngetemailverify();" id="change2"><?php echo __('Add'); ?> </a>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="account-security-main-bottom clearfix" id="change2-open"> 
                                <div id="emailbody1">
                                <h2><?php echo __('Account verification'); ?> <a class="close-arrow" href="javascript:void(0)" id="close2"> <i class="fa fa-close"></i> </a> </h2> 
                                <div class="number-phone">
                                    <?php if(isset($customerdata['User']['phone']) and $customerdata['User']['phone'] !=''){?>
                                        <?php
                                             //$expl = explode('@',$customerdata['User']['phone']);
                                             $mfirst= substr($customerdata['User']['phone'],0,3);
                                             $mlast= substr($customerdata['User']['phone'],-4);

                                        ?>
                                        <?php echo __('Use the phone'); ?> (<?php echo $mfirst.'******'.$mlast?>) <?php echo __('associated with your account to get a verification code.'); ?>
                                    <?php }else{?>
                                        <?php echo __('Use the email'); ?> (<?php echo $first.'*********'.$last.'@'.$first1."****".$last1;?>) <?php echo __('associated with your account to get a verification code.'); ?>
                                    <?php }?>

                                </div>
                                <div class="field-area clearfix">
                                    <div class="main-row clearfix">
                                        <input type="text" value="" id="mobileverification" name="mobileverification" class="field-area-left" placeholder="Enter Code">
                                        <input type="button" value="Resend" onclick="fngetemailverify();" class="field-area-right">
                                    </div>	
                                    <div id="email_error1"></div>
                                    <div class="submit-row">
                                        <input type="button" value="Submit" onclick="return phoneverification();" class="subnit-btn">
                                        <p> <a href="javascript:void(0)">	<i class="fa fa-question-circle"></i>   <?php echo __('Did not receive a code?'); ?>  </a> </p>
                                        <p> <?php echo __('Not working ?'); ?>  <a href="javascript:void(0)"> <?php echo __('Try this instead'); ?> </a></p>
                                    </div>
                                </div>
                            </div>
                         </div>
                        <div class="account-security-main clearfix">
                            <div class="account-security-main-top clearfix">
                                <div class="account-security-main-top-left">
                                    <div class="account-security-main-top-left-icon"> <i class="fa fa-file-text"></i> </div>
                                    <div class="account-security-main-top-left-txt">
                                        <h2><?php echo __('Security question'); ?>  <i class="fa fa-exclamation-circle"></i>  </h2>
                                        <p class="red-txt1"> <?php echo __('Don\'t get locked out of your account! Set a security question now.'); ?>  </p>
                                    </div>
                                </div>
                                <div class="account-security-main-top-right">
                                    <?php if(isset($customerdata['User']['question']) and $customerdata['User']['question'] !=''){?>
                                    <a href="javascript:void(0)" class="change-btn" onclick="fngetemailverify();" id="change4"><?php echo __('Change'); ?> </a>
                                    <?php }else{?>
                                        <a href="javascript:void(0)" class="change-btn" onclick="fngetemailverify();" id="change4"><?php echo __('Add'); ?> </a>
                                    <?php }?>
                                </div>
                            </div>

                            <div class="account-security-main-bottom clearfix" id="change4-open"> 
                                <div id="emailbody2">
                                    <h2><?php echo __('Account verification'); ?> <a class="close-arrow" href="javascript:void(0)" id="close4"> <i class="fa fa-close"></i> </a> </h2> 
                                    <div class="number-phone"><?php echo __('Use the phone (+91******4014) associated with your account to get a verification code.'); ?></div>
                                    <div class="field-area clearfix">
                                        <div class="main-row clearfix">
                                            <input type="text" value="" name="question" id="question" class="field-area-left" placeholder="Enter Code">
                                            <input type="button" value="Resend" onclick="fngetemailverify();" class="field-area-right">
                                        </div>
                                        <div id="email_error2"></div>
                                        <div class="submit-row">
                                            <input type="button" value="Submit" onclick="return questionrification();" class="subnit-btn">
                                            <p> <a href="javascript:void(0)">	<i class="fa fa-question-circle"></i>   <?php echo __('Did not receive a code?'); ?>  </a> </p>
                                            <p> <?php echo __('Not working ?'); ?>  <a href="javascript:void(0)"> <?php echo __('Try this instead'); ?> </a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="account-detail-two">
                            <h3>
                                <?php echo __('Recommended'); ?>
                            </h3>
                            <div class="account-security-main clearfix">
                                <div class="account-security-main-top clearfix">
                                    <div class="account-security-main-top-left">
                                        <div class="account-security-main-top-left-icon"> <i class="fa fa-shield"></i> </div>
                                        <div class="account-security-main-top-left-txt">
                                            <h2><?php echo __('HaRiMau Security Token'); ?> </h2>
                                            <p><?php echo __('Require 2-step verification when you sign in on a device that isn\'t trusted.'); ?>  </p>
                                        </div>
                                    </div>
                                    <div class="account-security-main-top-right">
                                        <?php if(isset($customerdata['User']['enable_token']) and $customerdata['User']['enable_token'] =='1'){?>
                                            <a class="change-btn" href="javascript:void(0)" id="change5"><?php echo __('Disable'); ?> </a>
                                        <?php }else{?>
                                            <a class="change-btn" href="javascript:void(0)" id="change5"><?php echo __('Enable'); ?> </a>
                                        <?php }?>
                                        
                                    </div>
                                </div>
                                <div class="account-security-main-bottom clearfix" id="change5-open">
                                    <div id="enable_active">
                                        <h2><?php echo __('Enable 2-step verification'); ?> <a class="close-arrow" href="javascript:void(0)" id="close5"> <i class="fa fa-close"></i> </a> </h2> 
                                        <div class="number-phone"><?php echo __('Only allow trusted devices to sign in to your account. You need to complete 2-step verification to sign in using this device.'); ?></div>
                                        <div class="field-area clearfix">
                                            <div class="main-row clearfix">
                                                <div class="lapy-pic">
                                                    <?php echo $this->Html->image('../css/images/paly.png'); ?>
                                                </div>
                                            </div>		
                                            <div class="submit-row">
                                                <?php if(isset($customerdata['User']['enable_token']) and $customerdata['User']['enable_token'] =='1'){?>
                                                    <input type="button" onclick="fnactiveate();" value="Deactivate" class="subnit-btn">
                                                <?php }else{?>
                                                    <input type="button" onclick="fnactiveate();" value="Activate" class="subnit-btn">
                                                <?php }?>
                                                

                                                <p>  <a href="javascript:void(0)"> <?php echo __('After you activate secure-sign in'); ?>  </a></p>
                                            </div>	
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php if(isset($this->data['User']['password_field']) and $this->data['User']['password_field'] =='pass'){ ?>
    <script>
      $(document).ready(function(){
        $('#change1').trigger('click');
      });

    </script>
<?php } ?> 
    
<script>
    function fnactiveate(){
        $.ajax({
            type: "POST",
            url: "/users/sendverifycode",
            data: { }
            })
            .done(function( msg ) {
                //alert( "Data Saved: " + msg );
        $('#enable_active').html(msg);
                
            });
        }
    
    function fngetemailverify(){
        $.ajax({
        type: "POST",
        url: "/users/sendmessage",
        data: { }
        })
        .done(function( msg ) {
        //alert( "Data Saved: " + msg );
        });
    }
    function emailverification(){
        //$(emailform).serialize()
        var val = $('#EmailmodelEmailVal').val();
        $.ajax({
        type: "POST",
        url: "/users/emailverification",
        data: {code:val}
        })
        .done(function( msg ) {
            //alert( "Data Saved: " + msg );
            if(msg=='0'){
                $('#email_error').html('Please enter verification code');
            }else if(msg=='1'){
                $('#email_error').html('Verification code does not valid');
            }else{
                $('#emailbody').html(msg);
            }
        });
    }
    function fnchange_phone(){
        //$(emailform).serialize()
        //var val = $('#EmailmodelEmailVal').val();
        $.ajax({
        type: "POST",
        url: "/users/change_phone",
        data: $('#phoneform').serialize(),
        })
        .done(function( msg ) {
            if(msg == '1'){
                window.location.href = '/users/account';
            }
            var obj = jQuery.parseJSON(msg);
            if(obj.phone != ""){
                $('#Error_EmailmodelEmailVal').html(obj.phone);
            }else{
                $('#Error_EmailmodelEmailVal').html('');
            }
            if(obj.captcha != ""){
                $('#Error_UserCaptcha').html(obj.captcha);
            }else{
                $('#Error_UserCaptcha').html('');
            }
            //$('#emailbody').html(msg);
        });
    }
    
     function fnchange_email(){
        //$(emailform).serialize()
        //var val = $('#EmailmodelEmailVal').val();
        $.ajax({
        type: "POST",
        url: "/users/change_email",
        data: $('#emailform').serialize(),
        })
        .done(function( msg ) {
            if(msg == '1'){
                window.location.href = '/users/account';
            }
            var obj = jQuery.parseJSON(msg);
            if(obj.email != ""){
                $('#Error_EmailmodelEmailVal').html(obj.email);
            }else{
                $('#Error_EmailmodelEmailVal').html('');
            }
            if(obj.captcha != ""){
                $('#Error_UserCaptcha').html(obj.captcha);
            }else{
                $('#Error_UserCaptcha').html('');
            }
            //$('#emailbody').html(msg);
        });
    }
    
    
    function phoneverification(){
        //$(emailform).serialize()
        var val = $('#mobileverification').val();
        $.ajax({
        type: "POST",
        url: "/users/phoneverification",
        data: {code:val}
        })
        .done(function( msg ) {
            //alert( "Data Saved: " + msg );
            if(msg=='0'){
                $('#email_error1').html('Please enter verification code');
            }else if(msg=='1'){
                $('#email_error1').html('Verification code does not valid');
            }else{
                $('#emailbody1').html(msg);
            }
        });
    }
    
    function questionrification(){
        //$(emailform).serialize()
        var val = $('#question').val();
        $.ajax({
        type: "POST",
        url: "/users/questionverification",
        data: {code:val}
        })
        .done(function( msg ) {
            //alert( "Data Saved: " + msg );
            if(msg=='0'){
                $('#email_error2').html('Please enter verification code');
            }else if(msg=='1'){
                $('#email_error2').html('Verification code does not valid');
            }else{
                $('#emailbody2').html(msg);
            }
        });
    }
    
    
    function fnchange_question(){
        //$(emailform).serialize()
        //var val = $('#EmailmodelEmailVal').val();
        $.ajax({
        type: "POST",
        url: "/users/change_question",
        data: $('#questionform').serialize(),
        })
        .done(function( msg ) {
            if(msg == '1'){
                window.location.href = '/users/account';
            }
            var obj = jQuery.parseJSON(msg);
            if(obj.question != ""){
                $('#Error_question').html(obj.question);
            }else{
                $('#Error_question').html('');
            }
            if(obj.answer != ""){
                $('#Error_answer').html(obj.answer);
            }else{
                $('#Error_answer').html('');
            }
            //$('#emailbody').html(msg);
        });
    }
    
    
    //questionrification
    function fnadd2steplogin(){
        var val = $('#Emailmodel2steplogin').val();
        $.ajax({
        type: "POST",
        url: "/users/add2steplogin",
        data: {code:val}
        })
        .done(function( msg ) {
            //alert( "Data Saved: " + msg );
            if(msg=='0'){
                $('#email_error2').html('Please enter verification code');
            }else if(msg=='1'){
                $('#email_error2').html('Verification code does not valid');
            }else{
                window.location.href = '/users/account';
            }
        });
    }
    
</script>