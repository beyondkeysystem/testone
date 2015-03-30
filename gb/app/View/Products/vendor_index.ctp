<h2>Products</h2>

<br />

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />

<table class="table table-striped table-bordered table-condensed table-hover">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('user_id'); ?></th>
		<th><?php echo $this->Paginator->sort('category_id'); ?></th>
		<th><?php echo $this->Paginator->sort('subcategory_id'); ?></th>
		<th><?php echo $this->Paginator->sort('subsubcategory_id'); ?></th>
		<th><?php echo $this->Paginator->sort('vendor_sku'); ?></th>
		<th><?php echo $this->Paginator->sort('brand'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('slug'); ?></th>
		<th><?php echo $this->Paginator->sort('image'); ?></th>
		<th><?php echo $this->Paginator->sort('price'); ?></th>
		<th><?php echo $this->Paginator->sort('price_wholesale'); ?></th>
		<th><?php echo $this->Paginator->sort('description'); ?></th>
		<th><?php echo $this->Paginator->sort('generic_description'); ?></th>
		<th><?php echo $this->Paginator->sort('serving_suggestions'); ?></th>
		<th><?php echo $this->Paginator->sort('traditions'); ?></th>
		<th><?php echo $this->Paginator->sort('ustradition_id'); ?></th>
		<th><?php echo $this->Paginator->sort('weight_unit'); ?></th>
		<th><?php echo $this->Paginator->sort('weight'); ?></th>
		<th><?php echo $this->Paginator->sort('shipping_weight'); ?></th>
		<th><?php echo $this->Paginator->sort('country'); ?></th>
		<th><?php echo $this->Paginator->sort('active'); ?></th>
	</tr>
	<?php foreach ($products as $product): ?>
	<tr>
		<td class="actions">
			<?php echo h($product['Product']['id']); ?>
			<br />
			<?php //echo $this->Html->link('View', array('action' => 'view', $product['Product']['id']), array('class' => 'btn btn-mini')); ?>
			<br />
			<?php //echo $this->Html->link('Edit', array('action' => 'edit', $product['Product']['id']), array('class' => 'btn btn-mini')); ?>
			<br />
			<?php //echo $this->Form->postLink('Delete', array('action' => 'delete', $product['Product']['id']), array('class' => 'btn btn-danger btn-mini') , __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>
		</td>
		<td>
			<?php echo $product['User']['name']; ?>
			<br />
			<?php echo $product['User']['level']; ?>
		</td>
		<td><?php echo $product['Category']['name']; ?></td>
		<td><?php echo $product['Subcategory']['name']; ?></td>
		<td><?php echo $product['Subsubcategory']['name']; ?></td>
		<td><?php echo h($product['Product']['vendor_sku']); ?></td>
		<td><?php echo h($product['Product']['brand']); ?></td>
		<td><?php echo h($product['Product']['name']); ?></td>
		<td><?php echo h($product['Product']['slug']); ?></td>
		<td><?php echo $this->Html->image('products/image/' . $product['Product']['image'], array('class' => 'img100')); ?></td>
		<td><span class="price" data-value="<?php echo $product['Product']['price']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo h($product['Product']['price']); ?></span></td>
		<td><span class="price_wholesale" data-value="<?php echo $product['Product']['price_wholesale']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo h($product['Product']['price_wholesale']); ?></span></td>
		<td><div><span class="description" data-value="<?php echo $product['Product']['description']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo h($product['Product']['description']); ?></span></div></td>
		<td><div><span class="generic_description" data-value="<?php echo $product['Product']['generic_description']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo h($product['Product']['generic_description']); ?></span></div></td>
		<td><div><span class="serving_suggestions" data-value="<?php echo $product['Product']['serving_suggestions']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo h($product['Product']['serving_suggestions']); ?></span></div></td>
		<td><?php echo h($product['Product']['traditions']); ?></td>
		<td><span class="ustradition" data-value="<?php echo $product['Ustradition']['id']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo h($product['Ustradition']['name']); ?></span></td>
		<td><span class="weight_unit" data-value="<?php echo $product['Product']['weight_unit']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo h($product['Product']['weight_unit']); ?></span></td>
		<td><span class="weight" data-value="<?php echo $product['Product']['weight']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo h($product['Product']['weight']); ?></span></td>
		<td><span class="shipping_weight" data-value="<?php echo $product['Product']['shipping_weight']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo h($product['Product']['shipping_weight']); ?></span></td>
		<td><span class="country" data-value="<?php echo $product['Product']['country']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo h($product['Product']['country']); ?></span></td>
		<td><img src="/img/icon_<?php echo $product['Product']['active']; ?>.png" alt="" /></td>
	</tr>
	<?php endforeach; ?>
</table>

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />
<br />

