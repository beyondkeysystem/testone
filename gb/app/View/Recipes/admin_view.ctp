<h2>Recipe</h2>

<table class="table-striped table-bordered table-condensed">
<tr>
<td>Id</td>
<td><?php echo h($recipe['Recipe']['id']); ?></td>
</tr>
<tr>
<td>User</td>
<td><?php echo $this->Html->link($recipe['User']['name'], array('controller' => 'users', 'action' => 'view', $recipe['User']['id'])); ?></td>
</tr>
<tr>
<td>Recipescategory</td>
<td><?php echo $this->Html->link($recipe['Recipescategory']['name'], array('controller' => 'recipescategories', 'action' => 'view', $recipe['Recipescategory']['id'])); ?></td>
</tr>
<tr>
<td>Name</td>
<td><?php echo $recipe['Recipe']['name']; ?></td>
</tr>
<tr>
<td>Slug</td>
<td><?php echo $recipe['Recipe']['slug']; ?></td>
</tr>
<tr>
<td>Description</td>
<td><?php echo $recipe['Recipe']['description']; ?></td>
</tr>
<tr>
<td>Tags</td>
<td><?php echo $recipe['Recipe']['tags']; ?></td>
</tr>
<tr>
<td>Ingredients</td>
<td><?php echo $recipe['Recipe']['ingredients']; ?></td>
</tr>
<tr>
<td>Preparation</td>
<td><?php echo $recipe['Recipe']['preparation']; ?></td>
</tr>
<tr>
<td>Comment</td>
<td><?php echo $recipe['Recipe']['comment']; ?></td>
</tr>
<tr>
<td>Image 1</td>
<td><?php echo h($recipe['Recipe']['image_1']); ?></td>
</tr>
<tr>
<td>Image 2</td>
<td><?php echo h($recipe['Recipe']['image_2']); ?></td>
</tr>
<tr>
<td>Image 3</td>
<td><?php echo h($recipe['Recipe']['image_3']); ?></td>
</tr>
<tr>
<td>Image Caption 1</td>
<td><?php echo h($recipe['Recipe']['image_caption_1']); ?></td>
</tr>
<tr>
<td>Image Caption 2</td>
<td><?php echo h($recipe['Recipe']['image_caption_2']); ?></td>
</tr>
<tr>
<td>Image Caption 3</td>
<td><?php echo h($recipe['Recipe']['image_caption_3']); ?></td>
</tr>
<tr>
<td>Active</td>
<td><?php echo h($recipe['Recipe']['active']); ?></td>
</tr>
<tr>
<td>Created</td>
<td><?php echo h($recipe['Recipe']['created']); ?></td>
</tr>
<tr>
<td>Modified</td>
<td><?php echo h($recipe['Recipe']['modified']); ?></td>
</tr>
</table>


<br />
<br />

<?php echo $this->Html->image('recipes/image_1/' . $recipe['Recipe']['image_1']); ?>

<br />
<br />

<?php echo $this->Html->image('recipes/image_2/' . $recipe['Recipe']['image_2']); ?>

<br />
<br />

<?php echo $this->Html->image('recipes/image_3/' . $recipe['Recipe']['image_3']); ?>

<br />
<br />

<span class="label label-warning">
 &nbsp; Image : no watermark, square image size </span>

<br />
<br />

<?php echo $this->Form->create('Recipe', array('type' => 'file', 'url' => array('controller' => 'recipes', 'action' => 'view', 'admin' => true)));?>
<?php echo $this->Form->hidden('id', array('value' => $recipe['Recipe']['id'])); ?>
<?php echo $this->Form->hidden('slug', array('value' => $recipe['Recipe']['slug'])); ?>
<table class="table-striped table-bordered table-condensed">
	<tbody>
		<tr>
			<td>Upload Image</td>
			<td><?php echo $this->Form->file('image'); ?></td>
		</tr>
		<tr>
			<td>Image Type</td>
			<td>

			<?php echo $this->Form->input('image_type', array('type' => 'select', 'label' => false, 'options' => array(
				'image_1' => 'image 1',
				'image_2' => 'image 2',
				'image_3' => 'image 3',
			))); ?>

			</td>
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

<h3>Actions</h3>

<?php echo $this->Html->link('Edit Recipe', array('action' => 'edit', $recipe['Recipe']['id']), array('class' => 'btn')); ?>

<br />
<br />

<?php echo $this->Form->postLink('Delete Recipe', array('action' => 'delete', $recipe['Recipe']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $recipe['Recipe']['id'])); ?>

<br />
<br />

