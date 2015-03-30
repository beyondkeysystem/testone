<h2>Brand</h2>

<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<td>ID</td>
		<td><?php echo h($brand['Brand']['id']); ?></td>
	</tr>
	<tr>
		<td>Name</td>
		<td><?php echo h($brand['Brand']['name']); ?></td>
	</tr>
	<tr>
		<td>Slug</td>
		<td><?php echo h($brand['Brand']['slug']); ?></td>
	</tr>
	<tr>
		<td>Description</td>
		<td><?php echo h($brand['Brand']['description']); ?></td>
	</tr>
	<tr>
		<td>Summary</td>
		<td><?php echo h($brand['Brand']['summary']); ?></td>
	</tr>
	<tr>
		<td>Article</td>
		<td><?php echo h($brand['Brand']['article']); ?></td>
	</tr>
	<tr>
		<td>Image</td>
		<td><?php echo h($brand['Brand']['image']); ?></td>
	</tr>
	<tr>
		<td>Created</td>
		<td><?php echo h($brand['Brand']['created']); ?></td>
	</tr>
	<tr>
		<td>Modified</td>
		<td><?php echo h($brand['Brand']['modified']); ?></td>
	</tr>
	<tr>
</table>

<br />
<br />

<h3>Actions</h3>

<br />

<?php echo $this->Html->link('Edit Brand', array('action' => 'edit', $brand['Brand']['id']), array('class' => 'btn')); ?> </li>

<br />
<br />

<?php echo $this->Form->postLink('Delete Brand', array('action' => 'delete', $brand['Brand']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $brand['Brand']['id'])); ?>

<br />
<br />

<?php echo $this->Html->image('brands/image/' . $brand['Brand']['image']); ?>

<br />

<span class="label label-warning"> &nbsp; Image : no watermark, square image size </span>

<br />
<br />

<?php echo $this->Form->create('Brand', array('type' => 'file', 'url' => array('controller' => 'brands', 'action' => 'view', 'admin' => true)));?>
<?php echo $this->Form->hidden('id', array('value' => $brand['Brand']['id'])); ?>
<?php echo $this->Form->hidden('slug', array('value' => $brand['Brand']['slug'])); ?>
<table class="table-striped table-bordered table-condensed">
	<tbody>
		<tr>
			<td>Upload Image</td>
			<td><?php echo $this->Form->file('image'); ?></td>
		</tr>
		<tr>
			<td>Image Type</td>
			<td><?php echo $this->Form->input('image_type', array('type' => 'select', 'label' => false, 'options' => array(
				'image' => 'image',
			))); ?></td>
		</tr>
		<tr>
			<td></td>
			<td><?php echo $this->Form->button('Submit', array('class' => 'btn'));?></td>
		</tr>
	</tbody>
</table>
<?php echo $this->Form->end(); ?>

<br />
<br />
