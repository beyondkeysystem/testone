<?php foreach ($users as $user): ?>

<style>
#awning-<?php echo $user['User']['id']; ?> {
<?php echo $user['User']['awning_css']; ?>
}
</style>

<strong><?php echo $user['User']['name']; ?></strong> &nbsp; <?php echo $this->Html->link('Edit Awning', array('action' => 'awning', $user['User']['id']), array('class' => 'btn btn-mini')); ?>

<br />
<br />

<img id="awning-<?php echo $user['User']['id']; ?>" src="/img/users/awning/default.png">

<hr>
<?php endforeach; ?>

