<h2>Brands</h2>

<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('slug'); ?></th>
		<th><?php echo $this->Paginator->sort('description'); ?></th>
		<th><?php echo $this->Paginator->sort('summary'); ?></th>
		<th><?php echo $this->Paginator->sort('article'); ?></th>
		<th><?php echo $this->Paginator->sort('image'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('modified'); ?></th>
		<th class="actions">Actions</th>
	</tr>
	<?php foreach ($brands as $brand): ?>
	<tr>
		<td><?php echo h($brand['Brand']['id']); ?></td>
		<td><?php echo h($brand['Brand']['name']); ?></td>
		<td><?php echo h($brand['Brand']['slug']); ?></td>
		<td><?php echo ($brand['Brand']['description']); ?></td>
		<td><?php echo ($brand['Brand']['summary']); ?></td>
		<td><?php echo ($brand['Brand']['article']); ?></td>
		<td><?php echo h($brand['Brand']['image']); ?></td>
		<td><?php echo h($brand['Brand']['created']); ?></td>
		<td><?php echo h($brand['Brand']['modified']); ?></td>
		<td class="actions">
			<?php echo $this->Html->link('View', array('action' => 'view', $brand['Brand']['id'])); ?>
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

