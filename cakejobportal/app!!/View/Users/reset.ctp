
<div class="resetDiv">
    <?php if (empty($Random)) { ?>
        <?php echo $this->Form->create('User', array('action' => 'reset')); ?>
        <fieldset>
            <legend><?php echo __('Please enter your email address '); ?></legend>
            <?php echo $this->Session->Flash(); ?>
            <?php
            echo $this->Form->input('email', array('label' => 'Email Address', 'class'=>"field-area"));
            ?>
            <br>
            <input class="field-submit" style="float:left;" name="submit" value="Reset" type="submit">
        <?php echo $this->Form->end(); ?>
        </fieldset>
        
    <?php } else { ?>
        <?php echo $this->Form->create('User', array('action' => 'resetpassword')); ?>
        <fieldset>
            <legend><?php echo __('Please enter new password '); ?></legend>
            <?php
            echo $this->Form->input('password', array('label' => 'New Password', 'id' => 'pwd', 'class'=>"field-area"));
            echo $this->Form->input('user_id', array('type' => 'hidden', 'value' => $random_data['ResetPassword']['user_id']));
            echo $this->Form->input('reset_id', array('type' => 'hidden', 'value' => $random_data['ResetPassword']['id']));
            ?>
            <input class="field-submit" name="submit" value="Reset" type="submit">
        <?php echo $this->Form->end(); ?>
        </fieldset>
    <?php } ?>
</div>