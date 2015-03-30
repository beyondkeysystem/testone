<div class="products view">
<h2><?php  echo __('Product'); ?></h2>

<dl>

<dt>Name</dt>
<dd>
<h3><?php echo h($product['Product']['name']); ?></h3>
</dd>

</dl>


<?php echo $this->Html->image('products/image/' . $product['Product']['image'] . '?date=' . time()); ?>

<br />
<br />

<a href="/admin/images/crop?src_dir=products/image/&src_file=<?php echo $product['Product']['image']; ?>&dst_dir=products/image/&dst_file=<?php echo $product['Product']['image']; ?>&width=300&height=300" class="btn">crop 300 x 300 image</a>

<br />
<br />

<div class="row">
<div class="span5">

<span class="label label-warning">
  Image : no watermark, square image size
</span>

<br />
<br />

<?php echo $this->Form->create('Product', array('type' => 'file', 'url' => array('controller' => 'products', 'action' => 'view', 'admin' => true)));?>
<?php echo $this->Form->hidden('id', array('value' => $product['Product']['id'])); ?>

<table class="table table-striped table-bordered table-condensed">
	<tbody>
		<tr>
			<td>Upload Image</td>
			<td><?php echo $this->Form->file('image'); ?></td>
		</tr>
		<tr>
			<td>Image Type</td>
			<td>

			<?php echo $this->Form->input('image_type', array('type' => 'select', 'label' => false, 'options' => array(
				'image' => 'Main Image',
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
</div>
</div>

<br />
<br />

<?php echo $this->Html->image('products/image/'. $product['Product']['image'] . '?date=' . time(), array('class' => 'gb')); ?>
<br />
<a href="/admin/images/crop?src_dir=products/image&src_file=<?php echo $product['Product']['image']; ?>&dst_dir=products/image&dst_file=<?php echo $product['Product']['image']; ?>&width=300&height=300" class="btn">crop 300 x 300</a>

<br />
<br />
<br />
<br />

<?php echo $this->Html->image('products/image_1/'. $product['Product']['image_1'] . '?date=' . time(), array('class' => 'gb')); ?>
<br />
<a href="/admin/images/crop?src_dir=products/image_1&src_file=<?php echo $product['Product']['image_1']; ?>&dst_dir=products/image_1&dst_file=<?php echo $product['Product']['image_1']; ?>&width=300&height=300" class="btn">crop 300 x 300</a>

<br />
<br />

<?php echo $this->Html->image('products/image_2/'. $product['Product']['image_2'] . '?date=' . time(), array('class' => 'gb')); ?>
<br />
<a href="/admin/images/crop?src_dir=products/image_2&src_file=<?php echo $product['Product']['image_2']; ?>&dst_dir=products/image_2&dst_file=<?php echo $product['Product']['image_2']; ?>&width=300&height=300" class="btn">crop 300 x 300</a>

<br />
<br />

<?php echo $this->Html->image('products/image_3/'. $product['Product']['image_3'] . '?date=' . time(), array('class' => 'gb')); ?>
<br />
<a href="/admin/images/crop?src_dir=products/image_3&src_file=<?php echo $product['Product']['image_3']; ?>&dst_dir=products/image_3&dst_file=<?php echo $product['Product']['image_3']; ?>&width=300&height=300" class="btn">crop 300 x 300</a>

<br />
<br />

<?php echo $this->Html->image('products/image_4/'. $product['Product']['image_4'] . '?date=' . time(), array('class' => 'gb')); ?>
<br />
<a href="/admin/images/crop?src_dir=products/image_4&src_file=<?php echo $product['Product']['image_4']; ?>&dst_dir=products/image_4&dst_file=<?php echo $product['Product']['image_4']; ?>&width=300&height=300" class="btn">crop 300 x 300</a>

<br />
<br />

<?php echo $this->Html->image('products/image_5/'. $product['Product']['image_5'] . '?date=' . time(), array('class' => 'gb')); ?>
<br />
<a href="/admin/images/crop?src_dir=products/image_5&src_file=<?php echo $product['Product']['image_5']; ?>&dst_dir=products/image_5&dst_file=<?php echo $product['Product']['image_5']; ?>&width=300&height=300" class="btn">crop 300 x 300</a>

<br />
<br />

<?php echo $this->Form->end(); ?>
</div>
</div>

<br />
<br />






<dl>
<dt><?php echo __('Id'); ?></dt>
<dd>
<?php echo h($product['Product']['id']); ?>
</dd>
<dt><?php echo __('User'); ?></dt>
<dd>
<?php echo $this->Html->link($product['User']['name'], array('controller' => 'users', 'action' => 'view', $product['User']['id'])); ?>
</dd>
<dt><?php echo __('Category'); ?></dt>
<dd>
<?php echo $this->Html->link($product['Category']['name'], array('controller' => 'categories', 'action' => 'view', $product['Category']['id'])); ?>
</dd>
<dt><?php echo __('Subcategory'); ?></dt>
<dd>
<?php echo $this->Html->link($product['Subcategory']['name'], array('controller' => 'subcategories', 'action' => 'view', $product['Subcategory']['id'])); ?>
</dd>
<dt><?php echo __('Subsubcategory'); ?></dt>
<dd>
<?php echo $this->Html->link($product['Subsubcategory']['name'], array('controller' => 'subsubcategories', 'action' => 'view', $product['Subsubcategory']['id'])); ?>
</dd>
<dt><?php echo __('Upc'); ?></dt>
<dd>
<?php echo h($product['Product']['upc']); ?>
</dd>
<dt><?php echo __('Vendor Sku'); ?></dt>
<dd>
<?php echo h($product['Product']['vendor_sku']); ?>
</dd>
<dt><?php echo __('Brand'); ?></dt>
<dd>
<?php echo h($product['Product']['brand']); ?>
</dd>
<dt>Slug</dt>
<dd>
<?php echo h($product['Product']['slug']); ?>
</dd>
<dt><?php echo __('Description'); ?></dt>
<dd>
<?php echo h($product['Product']['description']); ?>
</dd>
<dt><?php echo __('Long Description'); ?></dt>
<dd>
<?php echo h($product['Product']['long_description']); ?>
</dd>
<dt><?php echo __('Tags'); ?></dt>
<dd>
<?php echo h($product['Product']['tags']); ?>
</dd>

</dl>

</div>

<br />
<br />

<h3>Actions</h3>
<?php echo $this->Html->link('Edit Product', array('action' => 'edit', $product['Product']['id']), array('class' => 'btn')); ?>
<br />
<br />
<?php echo $this->Form->postLink('Delete Product', array('action' => 'delete', $product['Product']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>
<br />

<br />
<br />

<div class="related">
	<h3><?php echo __('Related Tags'); ?></h3>
	<?php if (!empty($product['Tag'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th>Name</th>
		<th>Created</th>
		<th>Modified</th>
		<th class="actions">Actions</th>
	</tr>
	<?php
		$i = 0;
		foreach ($product['Tag'] as $tag): ?>
		<tr>
			<td><?php echo $tag['id']; ?></td>
			<td><?php echo $tag['name']; ?></td>
			<td><?php echo $tag['created']; ?></td>
			<td><?php echo $tag['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link('View', array('controller' => 'tags', 'action' => 'view', $tag['id'])); ?>
				<?php echo $this->Html->link('Edit', array('controller' => 'tags', 'action' => 'edit', $tag['id'])); ?>
				<?php echo $this->Form->postLink('Delete', array('controller' => 'tags', 'action' => 'delete', $tag['id']), null, __('Are you sure you want to delete # %s?', $tag['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<br />
<br />

<hr>

<br />
<br />

