<h2>Note</h2>

<br />
<br />

<table class="table-striped table-bordered table-condensed">
	<tr>
		<td>Id</td>
		<td><?php echo $note['Note']['id']; ?></td>
	</tr>
	<tr>
		<td>Name</td>
		<td><?php echo $note['Note']['name']; ?></td>
	</tr>
	<tr>
		<td>Note</td>
		<td><?php echo $note['Note']['note']; ?></td>
	</tr>
	<tr>
		<td>Active</td>
		<td><?php echo $note['Note']['active']; ?></td>
	</tr>
	<tr>
		<td>Created</td>
		<td><?php echo $note['Note']['created']; ?></td>
	</tr>
	<tr>
		<td>Modified</td>
		<td><?php echo $note['Note']['modified']; ?></td>
	</tr>
</table>

<br />
<br />

<h3>Actions</h3>

<br />

<?php echo $this->Html->link('Edit Note', array('action' => 'edit', $note['Note']['id']), array('class' => 'btn')); ?>

<br />
<br />

<?php echo $this->Form->postLink('Delete Note', array('action' => 'delete', $note['Note']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $note['Note']['id'])); ?><br />

<br />
<br />

