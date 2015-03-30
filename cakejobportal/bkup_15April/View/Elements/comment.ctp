<?php echo $this->Session->Flash();?>   
<div class="contact-form">
    <?php //echo $this->Form->create(array('inputDefaults' => array('label' => false)
            //            ,'action' => ''  , 'class' => 'form form-horizontal','id'=>'form_comment','enctype' => 'multipart/form-data')  ); ?>
    <form action="" method="post" name="form_comment" id="form_comment">   
        <ul class="contact-form-field">
                <?php if(!isset($login_user)) { ?>
                <li>
                        <span class="field-txt">Name</span>
                        <input class="field-area" name="cname" type="text">
                </li>
                
                <li>
                        <span class="field-txt">Email Address</span>
                        <input class="field-area" name="cemail" required="required"  type="email">
                </li>
                <?php } ?>
                <li>
                        <span class="field-txt">Comment Messages</span>
                        <textarea cols="" name="cmsg" id="cmsg" required="required" class="field-message"></textarea>
                <input type="hidden" name="userid" id="userid" value="<?php if(isset($user_data)) { echo $user_data['id']; } ?>">
                <input type="hidden" name="type" id="type" value="<?php if(isset($user_data)) { echo $user_data['type']; } ?>"> 
                </li>
                
                <li>
                        <input class="field-submit" name="submit" value="Submit" type="submit">
                </li>
        
        </ul>
    <?php echo $this->Form->end(); ?>
</div>

<script type="text/javascript">
    $(document).ready(function() {

	// process the form
	$('#form_comment').submit(function(event) {
        alert('test');
        var formData = {
			'name' : $('input[name=cname]').val(),
			'email': $('input[name=cemail]').val(),
			'cmsg' : $('textarea[name=cmsg]').val(),
                        'userid' : $('input[name=userid]').val(),
                        'type' : $('input[name=type]').val(),
                        
		};
        $.ajax({
		type : 'POST',
                url  : '<?php echo $this->webroot; ?>users/save_comment',
                data :  formData,
                datatype: 'json',
        });
        event.preventDefault();    
        });
    });
            
 
</script>