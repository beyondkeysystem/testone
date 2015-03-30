<?php echo $this->Html->css(array('bootstrap-editable.css'), 'stylesheet', array('inline' => false)); ?>

<?php echo $this->Html->script(array('bootstrap-editable.js'), array('inline' => false)); ?>

<script>
$(document).ready(function() {

	$('.category').editable({
		type: 'select',
		name: 'category_id',
		url: '/admin/subcategories/editable',
		title: 'Category',
		source: <?php echo json_encode($categories); ?>,
		placement: 'right',
	});

});
</script>

<h2>Subcategories</h2>

<br />
<br />

<table class="table table-striped table-bordered table-condensed table-hover">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<!--
		<th><?php echo $this->Paginator->sort('category_id'); ?></th>
		-->
		<th><?php echo $this->Paginator->sort('category_id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('slug'); ?></th>
		<th><?php echo $this->Paginator->sort('subsubcategory_count'); ?></th>
		<th><?php echo $this->Paginator->sort('product_count'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('modified'); ?></th>
		<th class="actions">Actions</th>
	</tr>
	<?php foreach ($subcategories as $subcategory): ?>
	<tr>
		<td><?php echo $subcategory['Subcategory']['id']; ?></td>
		<!--
		<td><?php echo $this->Html->link($subcategory['Category']['name'], array('controller' => 'categories', 'action' => 'view', $subcategory['Category']['id'])); ?></td>
		-->
		<td><span class="category" data-value="<?php echo $subcategory['Subcategory']['category_id']; ?>" data-pk="<?php echo $subcategory['Subcategory']['id']; ?>"><?php echo $subcategory['Category']['name']; ?></span></td>
		<td><?php echo $subcategory['Subcategory']['name']; ?></td>
		<td><?php echo $subcategory['Subcategory']['slug']; ?></td>
		<td><?php echo $subcategory['Subcategory']['subsubcategory_count']; ?></td>
		<td><?php echo $this->Html->link($subcategory['Subcategory']['product_count'], array('controller' => 'products', 'action' => 'filter', '?' => array('field' => 'subcategory_id', 'id' => $subcategory['Subcategory']['id']))); ?></td>
		<td><?php echo $subcategory['Subcategory']['created']; ?></td>
		<td><?php echo $subcategory['Subcategory']['modified']; ?></td>
		<td class="actions">
			<?php echo $this->Html->link('View', array('action' => 'view', $subcategory['Subcategory']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $subcategory['Subcategory']['id']), array('class' => 'btn btn-mini')); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />
<br />

