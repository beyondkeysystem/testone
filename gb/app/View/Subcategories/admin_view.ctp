<h2>Subcategory</h2>

<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<td>Id</td>
		<td><?php echo $subcategory['Subcategory']['id']; ?></td>
	</tr>
	<tr>
		<td>Parent Category</td>
		<td><?php echo $this->Html->link($subcategory['Category']['name'], array('controller' => 'categories', 'action' => 'view', $subcategory['Category']['id'])); ?></td>
	</tr>
	<tr>
		<td>Name</td>
		<td><?php echo $subcategory['Subcategory']['name']; ?></td>
	</tr>
	<tr>
		<td>Slug</td>
		<td><?php echo $subcategory['Subcategory']['slug']; ?></td>
	</tr>
	<tr>
		<td>Subsubcategory Count</td>
		<td><?php echo $subcategory['Subcategory']['subsubcategory_count']; ?></td>
	</tr>
	<tr>
		<td>Product Count</td>
		<td><?php echo $subcategory['Subcategory']['product_count']; ?></td>
	</tr>
	<tr>
		<td>Created</td>
		<td><?php echo $subcategory['Subcategory']['created']; ?></td>
	</tr>
	<tr>
		<td>Modified</td>
		<td><?php echo $subcategory['Subcategory']['modified']; ?></td>
	</tr>
</table>

<br />

<h3>Actions</h3>

<?php echo $this->Html->link('Edit Subcategory', array('action' => 'edit', $subcategory['Subcategory']['id']), array('class' => 'btn')); ?>

<br />
<br />

<?php echo $this->Form->postLink('Delete Subcategory', array('action' => 'delete', $subcategory['Subcategory']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $subcategory['Subcategory']['id'])); ?>

<br />
<br />

<br />
<br />

<h3>Related Subsubcategories</h3>

<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<th>id</th>
		<th>name</th>
		<th>slug</th>
		<th>product_count</th>
		<th>created</th>
		<th>modified</th>
		<th class="actions">Actions</th>
	</tr>
	<?php foreach ($subsubcategories as $subsubcategory): ?>
	<tr>
		<td><?php echo $subsubcategory['Subsubcategory']['id']; ?></td>
		<td><?php echo $subsubcategory['Subsubcategory']['name']; ?></td>
		<td><?php echo $subsubcategory['Subsubcategory']['slug']; ?></td>
		<td><?php echo $this->Html->link($subsubcategory['Subsubcategory']['product_count'], array('controller' => 'products', 'action' => 'filter', '?' => array('field' => 'subsubcategory_id', 'id' => $subsubcategory['Subsubcategory']['id']))); ?></td>
		<td><?php echo $subsubcategory['Subsubcategory']['created']; ?></td>
		<td><?php echo $subsubcategory['Subsubcategory']['modified']; ?></td>
		<td class="actions">
			<?php echo $this->Html->link('View', array('controller' => 'subsubcategories', 'action' => 'view', $subsubcategory['Subsubcategory']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link('Edit', array('controller' => 'subsubcategories', 'action' => 'edit', $subsubcategory['Subsubcategory']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Form->postLink('Delete', array('controller' => 'subsubcategories', 'action' => 'delete', $subsubcategory['Subsubcategory']['id']), array('class' => 'btn btn-mini btn-danger'), __('Are you sure you want to delete # %s?', $subsubcategory['Subsubcategory']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<br />
<br />

<h3>Related Products</h3>

<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<th>id</th>
		<th>user_id</th>
		<th>category_id</th>
		<th>subcategory_id</th>
		<th>subsubcategory_id</th>
		<th>vendor_sku</th>
		<th>brand</th>
		<th>name</th>
		<th>slug</th>
		<th>image</th>
		<th>price_wholesale</th>
		<th>markup</th>
		<th>price</th>
		<th>description</th>
		<th>generic_description</th>
		<th>traditions</th>
		<th>weight</th>
		<th>shipping_weight</th>
		<th>country</th>
		<th>active</th>
	</tr>
	<?php foreach ($products as $product): ?>
	<tr>
		<td class="actions">
			<?php echo h($product['Product']['id']); ?>
			<br />
			<?php echo $this->Html->link('View', array('controller' => 'products', 'action' => 'view', $product['Product']['id']), array('class' => 'btn btn-mini')); ?>
			<br />
			<?php echo $this->Html->link('Edit', array('controller' => 'products', 'action' => 'edit', $product['Product']['id']), array('class' => 'btn btn-mini')); ?>
			<br />
			<?php echo $this->Form->postLink('Delete', array('controller' => 'products', 'action' => 'delete', $product['Product']['id']), array('class' => 'btn btn-danger btn-mini') , __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($product['User']['name'], array('controller' => 'users', 'action' => 'view', $product['User']['id'])); ?>
			<br />
			<?php echo $product['User']['level']; ?>
		</td>
		<td><?php echo $this->Html->link($product['Category']['name'], array('controller' => 'categories', 'action' => 'view', $product['Category']['id'])); ?></td>
		<td><?php echo $this->Html->link($product['Subcategory']['name'], array('controller' => 'subcategories', 'action' => 'view', $product['Subcategory']['id'])); ?></td>
		<td><?php echo $this->Html->link($product['Subsubcategory']['name'], array('controller' => 'subsubcategories', 'action' => 'view', $product['Subsubcategory']['id'])); ?></td>
		<td><?php echo h($product['Product']['vendor_sku']); ?></td>
		<td><?php echo h($product['Product']['brand']); ?></td>
		<td><?php echo h($product['Product']['name']); ?></td>
		<td><?php echo h($product['Product']['slug']); ?></td>
		<td><?php echo $this->Html->image('products/image/' . $product['Product']['image'], array('class' => 'img100')); ?></td>
		<td><span class="price_wholesale" data-value="<?php echo $product['Product']['price_wholesale']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo h($product['Product']['price_wholesale']); ?></span></td>
		<td><?php echo h($product['Product']['markup']); ?>%</td>
		<td><span class="price" data-value="<?php echo $product['Product']['price']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo h($product['Product']['price']); ?></span></td>
		<td><div><span class="description" data-value="<?php echo $product['Product']['description']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo h($product['Product']['description']); ?></span></div></td>
		<td><div><span class="generic_description" data-value="<?php echo $product['Product']['generic_description']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo h($product['Product']['generic_description']); ?></span></div></td>
		<td><?php echo h($product['Product']['traditions']); ?></td>
		<td><span class="weight" data-value="<?php echo $product['Product']['weight']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo h($product['Product']['weight']); ?></span></td>
		<td><span class="shipping_weight" data-value="<?php echo $product['Product']['shipping_weight']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo h($product['Product']['shipping_weight']); ?></span></td>
		<td><span class="country" data-value="<?php echo $product['Product']['country']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo h($product['Product']['country']); ?></span></td>
		<td><a href="/admin/products/switch/active/<?php echo $product['Product']['id']; ?>" class="status"><img src="/img/icon_<?php echo $product['Product']['active']; ?>.png" alt="" /></a></td>
	</tr>
	<?php endforeach; ?>
</table>

<br />
<br />

