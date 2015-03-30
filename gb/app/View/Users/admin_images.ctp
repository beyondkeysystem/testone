<style>
	table {
		background-color: #fff;
		border: 0px solid #AAA;
		clear: both;
		color: #333;
		border-collapse:collapse;
		padding:0px;
		border-spacing: 0px;
	}
	td {
		border: 1px #999 solid;
	}
</style>

<h2>Vendor Images</h2>

<table>
	<?php foreach ($users as $user): ?>
	<tr>
		<td>
			<?php echo $user['User']['id']; ?>
			<br />
			<?php echo h($user['User']['username']); ?>
			<br />
			<?php echo h($user['User']['name']); ?>
			<br />
			<?php echo $this->Html->link('View', array('action' => 'view', $user['User']['id'])); ?>
		</td>
		<td><?php echo $this->Html->image('users/image/'. $user['User']['image'] . '?date=' . time()); ?></td>
		<td><?php echo $this->Html->image('users/image_1/'. $user['User']['image_1'] . '?date=' . time()); ?></td>
		<td><?php echo $this->Html->image('users/image_2/'. $user['User']['image_2'] . '?date=' . time()); ?></td>
		<td><?php echo $this->Html->image('users/image_3/'. $user['User']['image_3'] . '?date=' . time()); ?></td>
		<td><?php echo $this->Html->image('users/image_4/'. $user['User']['image_4'] . '?date=' . time()); ?></td>
		<td><?php echo $this->Html->image('users/image_5/'. $user['User']['image_5'] . '?date=' . time()); ?></td>
		<td><?php echo $this->Html->image('users/image_6/'. $user['User']['image_6'] . '?date=' . time()); ?></td>
	</tr>
	<?php endforeach; ?>
</table>

<br />
<br />

