<p>Dear <?php echo $user['User']['name']; ?>,</p>
<p>Your Profile in Recruit Young has been created by <?php echo $user['User']['name']; ?> for the property at</p>
<p>Your login credentials is given below.</p>

<p>Login URL: <?php echo $this->Html->link('Recruit Young', array('admin' => false, 'controller' => 'users', 'action' => 'login', 'full_base' => true)); ?></p>
<p>Username: <?php echo $user['User']['email']; ?></p>
<p>Pasword: <?php echo $user['User']['password']; ?></p>
<p>Thanks and have a nice day!</p>
<p>--<br/>
<p>RecruitYoung&trade; Team</p>