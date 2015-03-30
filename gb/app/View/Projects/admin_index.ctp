<h2>Prospective Vendor Tracking</h2>

<table class="table table-striped table-bordered table-condensed table-hover">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('projectcategory_id'); ?></th>
		<th style="width:100px"><?php echo $this->Paginator->sort('business_name'); ?></th>
		<th><?php echo $this->Paginator->sort('source'); ?></th>
		<th><?php echo $this->Paginator->sort('body'); ?></th>
		<th><?php echo $this->Paginator->sort('active'); ?></th>
		<!--<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('modified'); ?></th>-->
		<th class="actions">Actions</th>
	</tr>
	<?php foreach ($Projects as $Project): ?>
	<tr>
		<td><?php echo h($Project['Project']['id']); ?></td>
		<td><?php echo h($Project['Projectcategory']['name']); ?></td>
		<td><?php echo h($Project['Project']['business_name']); ?></td>
		<td><?php echo h($Project['Project']['source']); ?></td>
		<td><?php echo h($Project['Project']['body']); ?></td>
		<td><a href="/admin/Projects/switch/active/<?php echo $Project['Project']['id']; ?>" class="status"><img src="/img/icon_<?php echo $Project['Project']['active']; ?>.png" alt="" /></a></td>
		<!--<td><?php echo h($Project['Project']['created']); ?></td>
		<td><?php echo h($Project['Project']['modified']); ?></td>-->
		<td class="actions">
		<?php echo $this->Html->link('View', array('action' => 'view', $Project['Project']['id']), array('class' => 'btn btn-mini')); ?>&nbsp;
		<?php echo $this->Html->link('Edit', array('action' => 'edit', $Project['Project']['id']), array('class' => 'btn btn-mini')); ?>&nbsp;
		<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $Project['Project']['id']), array('class' => 'btn btn-mini') , __('Are you sure you want to delete # %s?', $Project['Project']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<br />
<br />

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

