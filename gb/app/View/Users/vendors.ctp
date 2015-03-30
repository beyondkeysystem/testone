<h1>Vendors</h1>

<br />

<?php foreach($users as $user) : ?>
<?php echo $this->Html->image('users/image/' . $user['User']['image'], array('url' => array('subdomain' => $user['User']['slug'], 'controller' => 'products', 'action' => 'index'), 'alt' => $user['User']['name'])); ?>

<br />
<br />
<?php echo $this->Html->link($user['User']['name'], array('subdomain' => $user['User']['slug'], 'controller' => 'products', 'action' => 'index')); ?>

<br />
<br />
<hr>

<?php endforeach; ?>