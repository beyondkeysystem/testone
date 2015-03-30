<h2>Client</h2>

<br />
<br />

<table class="table-striped table-bordered table-condensed">
	<tr>
		<td>Id</td>
		<td><?php echo $Project['Project']['id']; ?></td>
	</tr>
	<tr>
		<td>Status</td>
		<td><?php echo $Project['Project']['projectcategory_id']; ?></td>
	</tr>
	<tr>
		<td>Content</td>
		<td><?php echo $Project['Project']['body']; ?></td>
	</tr>
	<tr>
		<td>Active</td>
		<td><?php echo $Project['Project']['active']; ?></td>
	</tr>
	<tr>
		<td>Created</td>
		<td><?php echo $Project['Project']['created']; ?></td>
	</tr>
	<tr>
		<td>Modified</td>
		<td><?php echo $Project['Project']['modified']; ?></td>
	</tr>
</table>

<br />
<br />

<h3>Actions</h3>

<br />

<?php echo $this->Html->link('Edit Client', array('action' => 'edit', $Project['Project']['id']), array('class' => 'btn')); ?>

<br />
<br />

<?php echo $this->Form->postLink('Delete Client', array('action' => 'delete', $Project['Project']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $Project['Project']['id'])); ?><br />

<br />
<br />

