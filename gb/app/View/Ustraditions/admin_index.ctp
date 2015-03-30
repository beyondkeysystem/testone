<h2>US Traditions</h2>

<table class="table table-striped table-bordered table-condensed table-hover">
	<tr>
    	<th class="actions">Actions</th>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('slug'); ?></th>
		<th><?php echo $this->Paginator->sort('states'); ?></th>
		<th><?php echo $this->Paginator->sort('summary'); ?></th>
		<th><?php echo $this->Paginator->sort('article'); ?></th>
		<th><?php echo $this->Paginator->sort('main_image'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('modified'); ?></th>
		
	</tr>
	<?php foreach ($ustraditions as $ustradition): ?>
	<tr>
    <td class="actions">
			<?php echo $this->Html->link('View', array('action' => 'view', $ustradition['Ustradition']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $ustradition['Ustradition']['id']), array('class' => 'btn btn-mini')); ?>
		</td>
		<td><?php echo h($ustradition['Ustradition']['id']); ?></td>
		<td><?php echo h($ustradition['Ustradition']['name']); ?></td>
		<td><?php echo h($ustradition['Ustradition']['slug']); ?></td>
		<td><?php echo h($ustradition['Ustradition']['states']); ?></td>
		<td><div class="limit"><?php echo ($ustradition['Ustradition']['summary']); ?></div></td>
		<td><div class="limit"><?php echo ($ustradition['Ustradition']['article']); ?></div></td>
		<td><?php echo h($ustradition['Ustradition']['main_image']); ?></td>
		<td><?php echo h($ustradition['Ustradition']['created']); ?></td>
		<td><?php echo h($ustradition['Ustradition']['modified']); ?></td>
		
	</tr>
	<?php endforeach; ?>
</table>

<br />

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />
<br />

<h3>Actions</h3>

<?php echo $this->Html->link('New US Tradition', array('action' => 'add'), array('class' => 'btn')); ?>

<br />
<br />

