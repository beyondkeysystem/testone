<h2>Category</h2>

<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<td>Id</td>
		<td><?php echo h($category['Category']['id']); ?></td>
	</tr>
	<tr>
		<td>Name</td>
		<td><?php echo h($category['Category']['name']); ?></td>
	</tr>
	<tr>
		<td>Slug</td>
		<td><?php echo h($category['Category']['slug']); ?></td>
	</tr>
	<tr>
		<td>Article</td>
		<td><?php echo $category['Category']['article']; ?></td>
	</tr>
	<tr>
		<td>Summary</td>
		<td><?php echo $category['Category']['summary']; ?></td>
	</tr>
	<tr>
		<td>Image</td>
		<td>
			<?php echo h($category['Category']['image']); ?>
			<br />
			<br />
			<?php echo $this->Html->image('categories/image/' . $category['Category']['image']); ?>
		</td>
	</tr>
	<tr>
		<td>Image 1</td>
		<td><?php echo h($category['Category']['image_1']); ?></td>
	</tr>
	<tr>
		<td>Image 2</td>
		<td><?php echo h($category['Category']['image_2']); ?></td>
	</tr>
	<tr>
		<td>Image 3</td>
		<td><?php echo h($category['Category']['image_3']); ?></td>
	</tr>
	<tr>
		<td>Image 4</td>
		<td><?php echo h($category['Category']['image_4']); ?></td>
	</tr>
	<tr>
		<td>Image 5</td>
		<td><?php echo h($category['Category']['image_5']); ?></td>
	</tr>
	<tr>
		<td>Subcategory Count</td>
		<td><?php echo h($category['Category']['subcategory_count']); ?></td>
	</tr>
	<tr>
		<td>Product Count</td>
		<td><?php echo $category['Category']['product_count']; ?></td>
	</tr>
	<tr>
		<td>Created</td>
		<td><?php echo h($category['Category']['created']); ?></td>
	</tr>
	<tr>
		<td>Modified</td>
		<td><?php echo h($category['Category']['modified']); ?></td>
	</tr>
</table>

<br />
<br />

<br />
<br />

<span class="label label-warning">
 &nbsp; Image : no watermark, square image size </span>

<br />
<br />

<?php echo $this->Form->create('Category', array('type' => 'file', 'url' => array('controller' => 'categories', 'action' => 'view', 'admin' => true)));?>
<?php echo $this->Form->hidden('id', array('value' => $category['Category']['id'])); ?>
<?php echo $this->Form->hidden('slug', array('value' => $category['Category']['slug'])); ?>
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
				'image' => 'Main',
				'image_1' => 'image 1',
				'image_2' => 'image 2',
				'image_3' => 'image 3',
				'image_4' => 'image 4',
				'image_5' => 'image 5',
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

<?php echo $this->Html->image('categories/image/'. $category['Category']['image'] . '?date=' . time(), array('class' => 'gb')); ?>
<br />
<a href="/admin/images/crop?src_dir=categories/image&src_file=<?php echo $category['Category']['image']; ?>&dst_dir=categories/image&dst_file=<?php echo $category['Category']['image']; ?>&width=300&height=300" class="btn">crop 300 x 300 image</a>

<br />
<br />
<br />
<br />

<?php echo $this->Html->image('categories/image_1/'. $category['Category']['image_1'] . '?date=' . time(), array('class' => 'gb')); ?>
<br />
<a href="/admin/images/crop?src_dir=categories/image_1&src_file=<?php echo $category['Category']['image_1']; ?>&dst_dir=categories/image_1&dst_file=<?php echo $category['Category']['image_1']; ?>&width=300&height=300" class="btn">crop image</a>

<br />
<br />

<br />
<br />


<h3>Actions</h3>

<?php echo $this->Html->link('Edit Category', array('action' => 'edit', $category['Category']['id']), array('class' => 'btn')); ?>

<br />
<br />

<?php echo $this->Form->postLink('Delete Category', array('action' => 'delete', $category['Category']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?>

<br />
<br />

<br />
<br />

<h3>Related Subcategories</h3>

<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<th>id</th>
		<th>name</th>
		<th>slug</th>
		<th>subsubcategory_count</th>
		<th>product_count</th>
		<th>created</th>
		<th>modified</th>
		<th class="actions">Actions</th>
	</tr>
	<?php foreach ($subcategories as $subcategory): ?>
	<tr>
		<td><?php echo $subcategory['Subcategory']['id']; ?></td>
		<td><?php echo $subcategory['Subcategory']['name']; ?></td>
		<td><?php echo $subcategory['Subcategory']['slug']; ?></td>
		<td><?php echo $subcategory['Subcategory']['subsubcategory_count']; ?></td>
		<td><?php echo $this->Html->link($subcategory['Subcategory']['product_count'], array('controller' => 'products', 'action' => 'filter', '?' => array('field' => 'subcategory_id', 'id' => $subcategory['Subcategory']['id']))); ?></td>
		<td><?php echo $subcategory['Subcategory']['created']; ?></td>
		<td><?php echo $subcategory['Subcategory']['modified']; ?></td>
		<td class="actions">
			<?php echo $this->Html->link('View', array('controller' => 'subcategories', 'action' => 'view', $subcategory['Subcategory']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link('Edit', array('controller' => 'subcategories', 'action' => 'edit', $subcategory['Subcategory']['id']), array('class' => 'btn btn-mini')); ?>
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

