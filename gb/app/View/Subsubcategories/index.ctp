<div class="subsubcategories index">
	<h2><?php echo __('Subsubcategories'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('subcategory_id'); ?></th>
			<th><?php echo $this->Paginator->sort('subcategory_name'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('slug'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions">Actions</th>
	</tr>
	<?php foreach ($subsubcategories as $subsubcategory): ?>
	<tr>
		<td><?php echo h($subsubcategory['Subsubcategory']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($subsubcategory['Subcategory']['name'], array('controller' => 'subcategories', 'action' => 'view', $subsubcategory['Subcategory']['id'])); ?>
		</td>
		<td><?php echo h($subsubcategory['Subsubcategory']['subcategory_name']); ?>&nbsp;</td>
		<td><?php echo h($subsubcategory['Subsubcategory']['name']); ?>&nbsp;</td>
		<td><?php echo h($subsubcategory['Subsubcategory']['slug']); ?>&nbsp;</td>
		<td><?php echo h($subsubcategory['Subsubcategory']['created']); ?>&nbsp;</td>
		<td><?php echo h($subsubcategory['Subsubcategory']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link('View', array('action' => 'view', $subsubcategory['Subsubcategory']['id'])); ?>
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $subsubcategory['Subsubcategory']['id'])); ?>
			<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $subsubcategory['Subsubcategory']['id']), null, __('Are you sure you want to delete # %s?', $subsubcategory['Subsubcategory']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3>Actions</h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Subsubcategory'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Subcategories'), array('controller' => 'subcategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subcategory'), array('controller' => 'subcategories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
