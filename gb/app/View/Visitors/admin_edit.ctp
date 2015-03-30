<div class="visitors form">
<?php echo $this->Form->create('Visitor'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Visitor'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('host');
		echo $this->Form->input('url');
		echo $this->Form->input('referrer');
		echo $this->Form->input('keyword');
		echo $this->Form->input('ip');
		echo $this->Form->input('remotehost');
		echo $this->Form->input('useragent');
		echo $this->Form->input('country_code');
		echo $this->Form->input('region');
		echo $this->Form->input('city');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit'); ?>
</div>
<div class="actions">
	<h3>Actions</h3>
	<ul>

		<li><?php echo $this->Form->postLink('Delete', array('action' => 'delete', $this->Form->value('Visitor.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Visitor.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Visitors'), array('action' => 'index')); ?></li>
	</ul>
</div>
