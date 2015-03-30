220 BulletProof FTP Server ready ...
empty($Random)) { ?>
        <?php echo $this->Form->create('User', array('action' => 'reset')); ?>
        <fieldset>
            <legend><?php echo __('Please enter your email address '); ?></legend>
            <?php echo $this->Session->Flash(); ?>
            <?php
            echo $this->Form->input('email', array('label' => 'Email Address'));
            echo $this->Form->end(__('Reset'));
            ?>
        </fieldset>
        
    <?php } else { ?>
        <?php echo $this->Form->create('User', array('action' => 'resetpassword')); ?>
        <fieldset>
            <legend><?php echo __('Please enter new password '); ?></legend>
            <?php
            echo $this->Form->input('password', array('label' => 'New Password', 'id' => 'pwd'));
            echo $this->Form->input('user_id', array('type' => 'hidden', 'value' => $random_data['ResetPassword']['user_id']));
            echo $this->Form->input('reset_id', array('type' => 'hidden', 'value' => $random_data['ResetPassword']['id']));
            echo $this->Form->end(__('Reset'));
            ?>
        </fieldset>
        
  
    <?php } ?>
</div>