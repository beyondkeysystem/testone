<?php 
if(!empty($_POST)){
    
}else{
    $this->request->data = $custdata;
}
//pr($custdata);
?>        
<div class="section account-bg">
            <div class="container">
                <div class="account-detail">
                    <div role="tabpanel">
                        <!-- Nav tabs -->
                        <?php echo $this->element('fe/account_tab');?>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="profile">

                                <div class="personal-info clearfix">
                                    <div class="personal-info-left">
                                        
                                        <?php if(isset($custdata['Customer']['profile_pic']) and $custdata['Customer']['profile_pic'] !=''){?>
                                            <?php echo $this->Html->image('../profile_pic/'.$custdata['Customer']['profile_pic'],array('width'=>'75'));?>
                                        <?php }else{?>
                                            <?php echo $this->Html->image('../css/images/pic19.jpg');?>
                                        <?php }?>
                                        <h2><?php echo __('Personal info'); ?></h2>
                                        <div class="account-security-main-top-right">
                                            <a class="change-btn" href="javascript:void(0)" id="change3"><?php echo __('Change'); ?> </a>
                                        </div>
                                    </div>
                                </div>


                                <div class="account-security-main clearfix">
                                    <div class="account-security-main-top clearfix">
                                        <div class="account-security-main-top-left">
                                            <div class="account-security-main-top-left-icon"> <i class="fa fa-user"></i> </div>
                                            <div class="account-security-main-top-left-txt account-security-main-top-left-txt-big">
                                                <h2><?php echo __('Name'); ?> : </h2>
                                            </div>
                                            <div class="txt-marcus"><?php if(isset($custdata['Customer']['fullname'])) echo $custdata['Customer']['fullname'];?></div>
                                        </div>
                                    </div>
                                </div>


                                <div class="account-security-main clearfix">
                                    <div class="account-security-main-top clearfix">
                                        <div class="account-security-main-top-left">
                                            <div class="account-security-main-top-left-icon"> <i class="fa fa-birthday-cake"></i> </div>
                                            <div class="account-security-main-top-left-txt account-security-main-top-left-txt-big">
                                                <h2><?php echo __('Birthday'); ?> : </h2>
                                            </div>
                                            <div class="txt-marcus">
                                                <?php if(isset($custdata['Customer']['dob'])) echo date('d M Y',strtotime($custdata['Customer']['dob']));?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="account-security-main clearfix">
                                    <div class="account-security-main-top clearfix">
                                        <div class="account-security-main-top-left">
                                            <div class="account-security-main-top-left-icon"> <i class="fa  fa-venus-mars"></i> </div>
                                            <div class="account-security-main-top-left-txt account-security-main-top-left-txt-big">
                                                <h2><?php echo __('Gender'); ?> :  </h2>
                                            </div>
                                            <div class="txt-marcus"><?php if(isset($custdata['Customer']['gender'])) echo $custdata['Customer']['gender'];?></div>
                                        </div>
                                    </div>
                                </div>


                                <div class="account-security-main clearfix">
                                    <div class="account-security-main-top clearfix">
                                        <div class="account-security-main-top-left">
                                            <div class="account-security-main-top-left-icon"> <i class="fa fa-mobile"></i> </div>
                                            <div class="account-security-main-top-left-txt account-security-main-top-left-txt-big">
                                                <h2><?php echo __('Mobile No'); ?> :  </h2>
                                            </div>
                                            <div class="txt-marcus"><?php if(isset($customerdata['User']['phone'])) echo $customerdata['User']['phone'];?></div>
                                        </div>
                                    </div>
                                </div>


                                <div class="account-security-main clearfix">
                                    <div class="account-security-main-top clearfix">
                                        <div class="account-security-main-top-left">
                                            <div class="account-security-main-top-left-icon"> <i class="fa fa-envelope"></i> </div>
                                            <div class="account-security-main-top-left-txt account-security-main-top-left-txt-big">
                                                <h2>  <?php echo __('Email'); ?> :  </h2>
                                            </div>
                                            <div class="txt-marcus"><?php if(isset($customerdata['User']['username'])) echo $customerdata['User']['username'];?></div>
                                        </div>
                                    </div>


                                    <div id="change3-open" class="account-security-main-bottom top-margin clearfix" > 
                                        <h2><?php echo __('Edit personal info'); ?> <a id="close3" href="javascript:void(0)" class="close-arrow"> <i class="fa fa-close"></i> </a> </h2> 
                                        <div class="field-area clearfix">
                                            <?php echo $this->Form->create('Customer',array('type'=>'file'));?>
                                            <ul class="pro-info clearfix">
                                                <li>
                                                    <div class="pro-info-left"><?php echo __('Name'); ?></div>
                                                    <div class="pro-info-right">
                                                        <?php echo $this->Form->text('fullname',array('class'=>"field-area-field",'placeholder'=>'Name','required'=>false));?>
                                                        <?php echo $this->Form->error('Customer.fullname');?>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="pro-info-left"><?php echo __('Birthday'); ?></div>
                                                    <div class="pro-info-right">
                                                        <?php echo $this->Form->text('dob',array('class'=>"field-area-field",'placeholder'=>'Data of Birth','required'=>false));?>
                                                        <a class="select-date" href="javascript:void(0)"> <i class="fa fa-calendar"></i> </a> 
                                                        <?php echo $this->Form->error('Customer.dob');?>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="pro-info-left"><?php echo __('Gender'); ?></div>
                                                    <div class="pro-info-right lablecls"> 
<!--                                                        <label class="label-field"> 
                                                            <input name="data[Customer][gender]" id="CustomerGender0" value="Male" type="radio"> Male
                                                        </label> 
                                                        <label class="label-field"> 
                                                            <input name="data[Customer][gender]" id="CustomerGender1" value="Female"  type="radio"> Female
                                                        </label> -->
                                                        
                                                        <?php echo $this->Form->radio('gender',array('Male'=>'Male','Female'=>'Female'),array('legend' => false,'required'=>false));?>
                                                        <?php echo $this->Form->error('Customer.gender');?>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="pro-info-left"><?php echo __('Image'); ?></div>
                                                    <div class="pro-info-right">
                                                        <?php echo $this->Form->file('Customer.profile_pic',array('onchange'=>'readImageURL(this)','required'=>false));?>
                                                        <?php echo $this->Form->error('Customer.profile_pic');?>
                                                    </div>
                                                    <div id="preview"></div>
                                                </li>

<!--                                                <li>
                                                    <div class="pro-info-left">Mobile No</div>
                                                    <div class="pro-info-right"> <input type="text" value="+60 9165660788" class="field-area-field"> </div>
                                                </li>

                                                <li>
                                                    <div class="pro-info-left">Email</div>
                                                    <div class="pro-info-right"> <input type="text" value="marcusdoe2006@yahoo.com" class="field-area-field"> </div>
                                                </li>-->

                                                <li class="top-padd-last">
                                                    <div class="pro-info-left">&nbsp;</div>
                                                    <div class="pro-info-right"> <input type="submit" value="Save" id="submitbtn" class="save-btn"> 
                                                        <input type="button" value="Cancel" class="cancel-btn" onclick="window.location.href = '/users/personal'"> 
                                                    </div>
                                                </li>
                                            </ul>
                                        <?php echo $this->Form->end();?>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php if(!empty($_POST)){
    //pr($_POST);
    ?>
<script>
    $(document).ready(function(){
        $('#change3').trigger('click'); 
        $('html, body').animate({ scrollTop: $("#CustomerFullname").offset().top }, 2000);
    });     
</script>
<?php }?>
<script>
    $(document).ready(function(){
        $('#CustomerDob').datepicker({
                dateFormat: "yy-mm-dd",
                changeYear:true, 
                changeMonth:true,
                yearRange:"1900:<?php echo date('Y')?>"});
        //$( "#submitbtn" ).scrollTop();
       // $('html, body').animate({ scrollTop: $("#CustomerName").offset().top }, 1000);
         
    });   
    
    
    var _URL = window.URL || window.webkitURL;
    function readImageURL(input) {
        if (input.files && input.files[0]) {
            var img = new Image();
            img.onload = function () {
             $('#preview').html('');
                 var img = $('<img id="dynamic" width="100">'); //Equivalent: $(document.createElement('img'))
                    img.attr('src', this.src);
                    img.appendTo('#preview');
              
            };   
            img.src = _URL.createObjectURL(input.files[0]);
        }
    }
</script>
<style>
    .lablecls label{
        color: #696969;
    font-size: 15px;
    font-weight: 400;
    padding-right: 30px;
    padding-top: 10px;
    }
</style>

        