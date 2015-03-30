
<div class="resetDiv login-box">
    <?php if (empty($Random)) { ?>
        <?php echo $this->Form->create('User', array('action' => 'reset',"name"=>"myFormreset","onsubmit"=>"return process_formreset(this);")); ?>
        <fieldset class="form-group">
            <legend><?php echo __('Please enter your email address '); ?></legend>
            <?php echo $this->Session->Flash(); ?>
            <?php
            echo $this->Form->input('email', array('label' => 'Email Address', 'class'=>"field-area", 'required' => 'true'));
            ?>
            <br>
            <button class="btn btn-primary" name="submit" type="submit">Reset</button>
        <?php echo $this->Form->end(); ?>
        </fieldset>
        
    <?php } else { ?>
        <?php echo $this->Form->create('User', array('action' => 'resetpassword')); ?>
        <fieldset class="form-group">
            <legend><?php echo __('Please enter new password '); ?></legend>
            <?php
            echo $this->Form->input('password', array('label' => 'New Password', 'id' => 'pwd', 'class'=>"field-area"));
            echo $this->Form->input('user_id', array('type' => 'hidden', 'value' => $random_data['ResetPassword']['user_id']));
            echo $this->Form->input('reset_id', array('type' => 'hidden', 'value' => $random_data['ResetPassword']['id']));
            ?>
            <button class="btn btn-primary" name="submit" type="submit">Reset</button>
        <?php echo $this->Form->end(); ?>
        </fieldset>
    <?php } ?>
</div>
	<script>
		function process_formreset(obj){
				var x=document.forms["myFormreset"]["email"].value;
				var atpos=x.indexOf("@");
				var dotpos=x.lastIndexOf(".");
				if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
				  {
				  alert("Not a valid e-mail address");
				  
				  return false;
				  }
		}
	</script>	