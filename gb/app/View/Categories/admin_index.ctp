<h2>Categories</h2>

<table class="table table-striped table-bordered table-condensed table-hover">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('slug'); ?></th>
		<th><?php echo $this->Paginator->sort('image'); ?></th>
		<th><?php echo $this->Paginator->sort('image_1'); ?></th>
		<th><?php echo $this->Paginator->sort('image_2'); ?></th>
		<th><?php echo $this->Paginator->sort('image_3'); ?></th>
		<th><?php echo $this->Paginator->sort('image_4'); ?></th>
		<th><?php echo $this->Paginator->sort('image_5'); ?></th>
		<th><?php echo $this->Paginator->sort('subcategory_count'); ?></th>
		<th><?php echo $this->Paginator->sort('product_count'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('modified'); ?></th>
		<th class="actions">Actions</th>
	</tr>
	<?php foreach ($categories as $category): ?>
	<tr>
		<td><?php echo h($category['Category']['id']); ?></td>
		<td><?php echo h($category['Category']['name']); ?></td>
		<td><?php echo h($category['Category']['slug']); ?></td>
		<td><?php echo $this->Html->image('categories/image/' . $category['Category']['image']); ?></td>
		<td><?php echo h($category['Category']['image_1']); ?></td>
		<td><?php echo h($category['Category']['image_2']); ?></td>
		<td><?php echo h($category['Category']['image_3']); ?></td>
		<td><?php echo h($category['Category']['image_4']); ?></td>
		<td><?php echo h($category['Category']['image_5']); ?></td>
		<td><?php echo h($category['Category']['subcategory_count']); ?></td>
		<td><?php echo $this->Html->link($category['Category']['product_count'], array('controller' => 'products', 'action' => 'filter', '?' => array('field' => 'category_id', 'id' => $category['Category']['id']))); ?></td>
		<td><?php echo h($category['Category']['created']); ?></td>
		<td><?php echo h($category['Category']['modified']); ?></td>
		<td class="actions">
			<?php echo $this->Html->link('View', array('action' => 'view', $category['Category']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $category['Category']['id']), array('class' => 'btn btn-mini')); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<br />
<br />

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />
<br />

