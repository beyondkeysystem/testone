<h1>Login</h1>
<br />
<?php echo $this->Form->create('User', array('action' => 'login')); ?>
<?php echo $this->Form->input('username', array('autofocus'=>'autofocus')); ?>
<br />
<?php echo $this->Form->input('password'); ?>
<br />
<?php echo $this->Form->button('Login', array('class' => 'btn')); ?>
<?php echo $this->Form->end(); ?>
<br />

<?php

    echo $this->Form->input('auto_login', array('type'=>'checkbox', 'label'=>__('Remember on this computer')));

?>