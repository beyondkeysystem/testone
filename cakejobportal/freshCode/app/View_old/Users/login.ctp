<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php 
echo $this->Html->css('login_style');
echo $this->fetch('css');?>
</head>
<body>
<div style="padding:0;font-size: 11px;" class="formBox">
  <?php echo $this->Form->create('User'); ?>
  <div style="font-family:none;padding:0;"><p class="loginLogo" align="center">RecruitYoung</p></div>
      <div id="box_middle">
      <?php echo $this->Session->Flash();?>   
      <div style="padding:0;margin-buttom:0;" >
      <?php echo $this->Form->input('email', array('label' => 'Email Address ','class'=>array('loginFont')));?>
      <?php echo $this->Form->input('password',array('label'=>'Password ','class'=>array('loginFont')));?> 
      </div>
      <div style="padding:0;"class="pass_box">
      <input id="btnSave" name="btnSave"  class="blue" value="Login" type="submit">  <a class="forgot" href="reset">forgot password ?</a>&nbsp;&nbsp;&nbsp<a class="forgot"href="signup">signup...</a> <br>
      </div>
    </div>
  <?php echo $this->Form->end(); ?> 
</div>
