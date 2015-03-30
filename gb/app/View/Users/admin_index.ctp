<?php echo $this->Html->css(array('bootstrap-editable.css'), 'stylesheet', array('inline' => false)); ?>

<?php echo $this->Html->script(array('bootstrap-editable.js'), array('inline' => false)); ?>

<script>
$(document).ready(function() {

	$('.level').editable({
		type:  'select',
		source: {"admin": "admin", "vendor": "vendor"},
		name:  'level',
		url:   '/admin/users/editable',
		title: 'Level',
		placement: 'right',
	});

	$('.email').editable({
		type:  'text',
		name: 'email',
		url:   '/admin/users/editable',
		title: 'Email',
		placement: 'right',
//		validate: function(value) {
//			if($.trim(value) < 1900 || $.trim(value) > 2013) {
//				return 'Invalid Data';
//			}
//		}
	});

});
</script>

<h2>Users</h2>

<div class="row">

	<?php echo $this->Form->create('User', array()); ?>
	<?php echo $this->Form->hidden('search', array('value' => 1)); ?>

	<div class="span2">
		<?php echo $this->Form->input('active', array('label' => false, 'class' => 'span2', 'empty' => 'All Status', 'options' => array(1 => 'Active', 0 => 'Inactive'), 'selected' => $all['active'])); ?>
	</div>

	<div class="span2">
		<?php echo $this->Form->input('filter', array(
			'label' => false,
			'class' => 'span2',
			'options' => array(
				'name' => 'Name',
				'username' => 'Username',
			),
			'selected' => $all['filter']
		)); ?>

	</div>

	<div class="span2">
		<?php echo $this->Form->input('name', array(
		'label' => false,
		'id' => false,
		'class' => 'span2',
		'required'=> false,
		'value' => $all['name'])); ?>

	</div>

	<div class="span4">
		<?php echo $this->Form->button('Search', array('class' => 'btn')); ?>
		&nbsp; &nbsp;
		<?php echo $this->Html->link('Reset Search', array('controller' => 'users', 'action' => 'reset', 'admin' => true), array('class' => 'btn')); ?>

	</div>

	<?php echo $this->Form->end(); ?>

</div>

<br />

<table class="table table-striped table-bordered table-condensed table-hover">
	<tr>
		<th class="actions">Actions</th>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('active'); ?></th>
		<th><?php echo $this->Paginator->sort('level'); ?></th>
		<th><?php echo $this->Paginator->sort('username'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('slug'); ?></th>
		<th><?php echo $this->Paginator->sort('business_name'); ?></th>
		<th><?php echo $this->Paginator->sort('email'); ?></th>
		<th><?php echo $this->Paginator->sort('image'); ?></th>
		<th><?php echo $this->Paginator->sort('address'); ?></th>
		<th><?php echo $this->Paginator->sort('address2'); ?></th>
		<th><?php echo $this->Paginator->sort('city'); ?></th>
		<th><?php echo $this->Paginator->sort('state'); ?></th>
		<th><?php echo $this->Paginator->sort('zip'); ?></th>
		<th><?php echo $this->Paginator->sort('product_count'); ?></th>
	</tr>
	<?php foreach ($users as $user): ?>
	<tr>
		<td class="actions">
			<?php echo $this->Html->link('View', array('action' => 'view', $user['User']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link('Change Password', array('action' => 'password', $user['User']['id']), array('class' => 'btn btn-mini')); ?>
		</td>
		<td><?php echo $user['User']['id']; ?></td>
		<td><a href="/admin/users/switch/active/<?php echo $user['User']['id']; ?>" class="status"><img src="/img/icon_<?php echo $user['User']['active']; ?>.png" alt="" /></a></td>
		<td><span class="level" data-value="<?php echo $user['User']['level']; ?>" data-pk="<?php echo $user['User']['id']; ?>"><?php echo $user['User']['level']; ?></span></td>
		<td><?php echo h($user['User']['username']); ?></td>
		<td><?php echo h($user['User']['name']); ?></td>
		<td><?php echo h($user['User']['slug']); ?></td>
		<td><?php echo h($user['User']['business_name']); ?></td>
		<td><span class="email" data-value="<?php echo $user['User']['email']; ?>" data-pk="<?php echo $user['User']['id']; ?>"><?php echo h($user['User']['email']); ?></span></td>
		<td class="constrain"><?php echo $this->Html->image('users/image/' . $user['User']['image']); ?></td>
		<td><?php echo h($user['User']['address']); ?></td>
		<td><?php echo h($user['User']['address2']); ?></td>
		<td><?php echo h($user['User']['city']); ?></td>
		<td><?php echo h($user['User']['state']); ?></td>
		<td><?php echo h($user['User']['zip']); ?></td>
		<td><?php echo $this->Html->link($user['User']['product_count'], array('controller' => 'products', 'action' => 'filter', '?' => array('field' => 'user_id', 'id' => $user['User']['id']))); ?></td>
	</tr>
	<?php endforeach; ?>
</table>

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />
<br />

