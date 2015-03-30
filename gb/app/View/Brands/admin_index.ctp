<h2>Brands</h2>

<div class="row">

	<?php echo $this->Form->create('Brand', array()); ?>
	<?php echo $this->Form->hidden('search', array('value' => 1)); ?>

	<div class="span2">
		<?php echo $this->Form->input('filter', array(
			'label' => false,
			'class' => 'span2',
			'options' => array(
				'name' => 'Name',
				'description' => 'Description',
				'summary' => 'Summary',
			),
			'selected' => $all['filter']
		)); ?>

	</div>

	<div class="span2">
		<?php echo $this->Form->input('name', array('label' => false, 'id' => false, 'class' => 'span2', 'value' => $all['name'])); ?>

	</div>

	<div class="span4">
		<?php echo $this->Form->button('Search', array('class' => 'btn')); ?>
		&nbsp; &nbsp;
		<?php echo $this->Html->link('Reset Search', array('controller' => 'brands', 'action' => 'reset', 'admin' => true), array('class' => 'btn')); ?>

	</div>

	<?php echo $this->Form->end(); ?>

</div>

<br />

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />

<table class="table-striped table-bordered table-condensed table-hover">
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
		<th class="actions"><Actions</th>
	</tr>
	<?php foreach ($brands as $brand): ?>
	<tr>
		<td><?php echo h($brand['Brand']['id']); ?>&nbsp;</td>
		<td><?php echo h($brand['Brand']['name']); ?>&nbsp;</td>
		<td><?php echo h($brand['Brand']['slug']); ?>&nbsp;</td>
		<td><div class="limit"><?php echo ($brand['Brand']['description']); ?></div></td>
		<td><?php echo ($brand['Brand']['summary']); ?>&nbsp;</td>
		<td><div class="limit"><?php echo ($brand['Brand']['article']); ?></div></td>
		<td><?php echo h($brand['Brand']['image']); ?>&nbsp;</td>
		<td><?php echo h($brand['Brand']['created']); ?>&nbsp;</td>
		<td><?php echo h($brand['Brand']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link('View', array('action' => 'view', $brand['Brand']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $brand['Brand']['id']), array('class' => 'btn btn-mini')); ?>
			<?php //echo $this->Form->postLink('Delete', array('action' => 'delete', $brand['Brand']['id']), null, __('Are you sure you want to delete # %s?', $brand['Brand']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<br />

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />
<br />