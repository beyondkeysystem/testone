<?php echo $this->Html->css(array('bootstrap-editable.css'), 'stylesheet', array('inline' => false)); ?>

<?php echo $this->Html->script(array('bootstrap-editable.js'), array('inline' => false)); ?>

<script>
$(document).ready(function() {

	$('.subcategory').editable({
		type: 'select',
		name: 'subcategory_id',
		url: '/admin/subsubcategories/editable',
		title: 'SubCategory',
		source: <?php echo json_encode($subcategories); ?>,
		placement: 'right',
	});

});
</script>

<h2>Subsubcategories</h2>

<table class="table table-striped table-bordered table-condensed table-hover">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('subcategory_id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('slug'); ?></th>
		<th><?php echo $this->Paginator->sort('product_count'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('modified'); ?></th>
		<th class="actions">Actions</th>
	</tr>
	<?php foreach ($subsubcategories as $subsubcategory): ?>
	<tr>
		<td><?php echo $subsubcategory['Subsubcategory']['id']; ?></td>
		<td><span class="subcategory" data-value="<?php echo $subsubcategory['Subsubcategory']['subcategory_id']; ?>" data-pk="<?php echo $subsubcategory['Subsubcategory']['id']; ?>"><?php echo $subsubcategory['Subcategory']['name']; ?></span></td>
		<td><?php echo $subsubcategory['Subsubcategory']['name']; ?></td>
		<td><?php echo $subsubcategory['Subsubcategory']['slug']; ?></td>
		<td><?php echo $this->Html->link($subsubcategory['Subsubcategory']['product_count'], array('controller' => 'products', 'action' => 'filter', '?' => array('field' => 'subsubcategory_id', 'id' => $subsubcategory['Subsubcategory']['id']))); ?></td>
		<td><?php echo $subsubcategory['Subsubcategory']['created']; ?></td>
		<td><?php echo $subsubcategory['Subsubcategory']['modified']; ?></td>
		<td class="actions">
			<?php echo $this->Html->link('View', array('action' => 'view', $subsubcategory['Subsubcategory']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $subsubcategory['Subsubcategory']['id']), array('class' => 'btn btn-mini')); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />
<br />

