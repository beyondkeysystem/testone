<?php echo $this->Html->css(array('bootstrap-editable.css'), 'stylesheet', array('inline' => false)); ?>

<?php echo $this->Html->script(array('bootstrap-editable.js'), array('inline' => false)); ?>

<script>
$(document).ready(function() {

	$('.description').editable({
		type: 'textarea',
		name: 'description',
		url: '/admin/products/editable',
		title: 'Description',
		placement: 'right',
	});

	$('.generic_description').editable({
		type: 'textarea',
		name: 'generic_description',
		url: '/admin/products/editable',
		title: 'Generic Description',
		placement: 'top',
	});

	$('.serving_suggestions').editable({
		type: 'textarea',
		name: 'serving_suggestions',
		url: '/admin/products/editable',
		title: 'Serving Suggestions',
		placement: 'left',
	});

	$('.price').editable({
		type: 'text',
		name: 'price',
		url: '/admin/products/editable',
		title: 'Price',
		placement: 'left',
	});

	$('.price_wholesale').editable({
		type: 'text',
		name: 'price_wholesale',
		url: '/admin/products/editable',
		title: 'Wholesale Price',
		placement: 'right',
	});

	$('.brand').editable({
		type: 'select',
		name: 'brand_id',
		url: '/admin/products/editable',
		title: 'Brand',
		source: <?php echo json_encode($brands); ?>,
		placement: 'left',
	});

	$('.displaygroup').editable({
		type: 'select',
		name: 'displaygroup',
		url: '/admin/products/editable',
		title: 'Display Group',
		source: <?php echo json_encode($displaygroups); ?>,
		placement: 'right',
	});

	$('.ustradition').editable({
		type: 'select',
		name: 'ustradition_id',
		url: '/admin/products/editable',
		title: 'Domestic Tradition',
		source: <?php echo json_encode($ustraditions); ?>,
		placement: 'left',
	});

	$('.country').editable({
		type: 'select',
		name: 'country',
		url: '/admin/products/editable',
		title: 'Country',
		source: <?php echo json_encode($countries); ?>,
		placement: 'left',
	});

	$('.height').editable({
		type: 'text',
		name: 'height',
		url: '/admin/products/editable',
		title: 'Height',
		placement: 'left',
	});

	$('.width').editable({
		type: 'text',
		name: 'width',
		url: '/admin/products/editable',
		title: 'Weight',
		placement: 'left',
	});
	
	$('.length').editable({
		type: 'text',
		name: 'length',
		url: '/admin/products/editable',
		title: 'Length',
		placement: 'left',
	});

	$('.shipping_weight').editable({
		type: 'text',
		name: 'shipping_weight',
		url: '/admin/products/editable',
		title: 'Shipping Weight',
		placement: 'left',
	});

});
</script>


<h2>Products</h2>

<div class="row">

	<?php echo $this->Form->create('Product', array()); ?>
	<?php echo $this->Form->hidden('search', array('value' => 1)); ?>

	<div class="span2">
		<?php echo $this->Form->input('user_id', array('label' => false, 'class' => 'span2', 'empty' => 'Vendor', 'selected' => $all['user_id'])); ?>
	</div>

	<div class="span2">
		<?php echo $this->Form->input('brand_id', array('label' => false, 'class' => 'span2', 'empty' => 'Brand', 'selected' => $all['brand_id'])); ?>
	</div>

	<div class="span2">
		<?php echo $this->Form->input('filter', array(
			'label' => false,
			'class' => 'span2',
			'options' => array(
				'name' => 'Name',
				'id' => 'Product Id',
				'category_id' => 'Category Id',
				'subcategory_id' => 'Sub Category Id',
				'subsubcategory_id' => 'Sub Sub Category Id',
				'price' => 'Price',
				'price_wholesale' => 'Wholesale Price',
				'country' => 'Country',
				'active' => 'Active',
			),
			'selected' => $all['filter']
		)); ?>

	</div>

	<div class="span2">
		<?php echo $this->Form->input('name', array(
		'label' => false,
		'id' => false,
		'class' => 'span2',
		'required'=> false,
		'value' => $all['name'])); ?>

	</div>

	<div class="span4">
		<?php echo $this->Form->button('Search', array('class' => 'btn')); ?>
		&nbsp; &nbsp;
		<?php echo $this->Html->link('Reset Search', array('controller' => 'products', 'action' => 'reset', 'admin' => true), array('class' => 'btn')); ?>

	</div>

	<?php echo $this->Form->end(); ?>

</div>

<br />

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />

<table class="table table-striped table-bordered table-condensed table-hover">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('user_id'); ?></th>
		<th><?php echo $this->Paginator->sort('active'); ?></th>
        <th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('slug'); ?></th>
        <th><?php echo $this->Paginator->sort('image'); ?></th>
        <th><?php echo $this->Paginator->sort('displaygroup'); ?></th>
		<th><?php echo $this->Paginator->sort('stock'); ?></th>
		<th><?php echo $this->Paginator->sort('vendor_sku'); ?></th>
        <th><?php echo $this->Paginator->sort('height'); ?></th>
        <th><?php echo $this->Paginator->sort('length'); ?></th>
        <th><?php echo $this->Paginator->sort('width'); ?></th>
		<th><?php echo $this->Paginator->sort('brand_id'); ?></th>
		<th><?php echo $this->Paginator->sort('price_wholesale'); ?></th>
		<th><?php echo $this->Paginator->sort('markup'); ?></th>
		<th><?php echo $this->Paginator->sort('price'); ?></th>
<?php /*?>		<th><?php echo $this->Paginator->sort('description'); ?></th>
		<th><?php echo $this->Paginator->sort('generic_description'); ?></th>
		<th><?php echo $this->Paginator->sort('serving_suggestions'); ?></th>
<?php */?>
		<th><?php echo $this->Paginator->sort('shipping_weight'); ?></th>

	</tr>
	<?php foreach ($products as $product): ?>
	<tr>
		<td class="actions">
			<?php echo h($product['Product']['id']); ?>
			<br />
			<?php echo $this->Html->link('View', array('action' => 'view', $product['Product']['id']), array('class' => 'btn btn-mini')); ?>
			<br />
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $product['Product']['id']), array('class' => 'btn btn-mini')); ?>
			<br />
			<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $product['Product']['id']), array('class' => 'btn btn-danger btn-mini') , __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($product['User']['name'], array('controller' => 'users', 'action' => 'view', $product['User']['id'])); ?>
			<br />
			<img src="/img/icon_<?php echo $product['User']['active']; ?>.png" alt="" />
		</td>
		<td><a href="/admin/products/switch/active/<?php echo $product['Product']['id']; ?>" class="status"><img src="/img/icon_<?php echo $product['Product']['active']; ?>.png" alt="" /></a></td>
        <td><?php echo $this->Html->image('products/image/' . $product['Product']['image'], array('class' => 'img100')); ?></td>
        <td><?php echo ($product['Product']['name']); ?></td>
		<td><?php echo ($product['Product']['slug']); ?></td>
        <td><span class="displaygroup" data-value="<?php echo $product['Product']['displaygroup']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo h($product['Product']['displaygroup']); ?></span></td>
        
		<td><?php echo ($product['Product']['stock']); ?></td>
		<td><?php echo ($product['Product']['vendor_sku']); ?></td>
        <td><span class="height" data-value="<?php echo $product['Product']['height']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo h($product['Product']['height']); ?></span></td>
        <td><span class="length" data-value="<?php echo $product['Product']['length']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo h($product['Product']['length']); ?></span></td>
        <td><span class="width" data-value="<?php echo $product['Product']['width']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo h($product['Product']['width']); ?></span></td>
		<td><span class="brand" data-value="<?php echo $product['Brand']['id']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo h($product['Brand']['name']); ?></span></td>
		<td><span class="price_wholesale" data-value="<?php echo $product['Product']['price_wholesale']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo ($product['Product']['price_wholesale']); ?></span></td>
		<td><?php echo ($product['Product']['markup']); ?>%</td>
		<td><span class="price" data-value="<?php echo $product['Product']['price']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo h($product['Product']['price']); ?></span></td>
		<td><span class="shipping_weight" data-value="<?php echo $product['Product']['shipping_weight']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo ($product['Product']['shipping_weight']); ?></span></td>
	</tr>
	<?php endforeach; ?>
</table>

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />
<br />

