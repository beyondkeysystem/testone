<h2>Admin Edit User Password</h2>

Username : <?php echo $this->Form->value('User.username'); ?>

<br />

<?php echo $this->Form->create('User');?>
<?php echo $this->Form->input('id'); ?>
<?php echo $this->Form->input('password', array('value' => '')); ?>
<?php echo $this->Form->input('password_clear', array()); ?>
<br />
<?php echo $this->Form->button('Submit', array('class' => 'btn'));?>
<?php echo $this->Form->end();?>

