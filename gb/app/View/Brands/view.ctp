<<<<<<< HEAD
<div class="brands view">
<h2><?php  echo __('Brand'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($brand['Brand']['id']); ?>
			&nbsp;
		</dd>
		<dt>Name</dt>
		<dd>
			<?php echo h($brand['Brand']['name']); ?>
			&nbsp;
		</dd>
		<dt>Slug</dt>
		<dd>
			<?php echo h($brand['Brand']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo ($brand['Brand']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Summary'); ?></dt>
		<dd>
			<?php echo ($brand['Brand']['summary']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Article'); ?></dt>
		<dd>
			<?php echo h($brand['Brand']['article']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($brand['Brand']['image']); ?>
			&nbsp;
		</dd>
		<dt>Created</dt>
		<dd>
			<?php echo h($brand['Brand']['created']); ?>
			&nbsp;
		</dd>
		<dt>Modified</dt>
		<dd>
			<?php echo h($brand['Brand']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3>Actions</h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Brand'), array('action' => 'edit', $brand['Brand']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Brand'), array('action' => 'delete', $brand['Brand']['id']), null, __('Are you sure you want to delete # %s?', $brand['Brand']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Brands'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Products'); ?></h3>
	<?php if (!empty($brand['Product'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th>Name</th>
		<th>Slug</th>
		<th>Description</th>
		<th>Summary</th>
		<th>Article</th>
		<th>Created</th>
		<th>Modified</th>
		<th class="actions">Actions</th>
	</tr>
	<?php
		$i = 0;
		foreach ($brand['Product'] as $product): ?>
		<tr>
			<td><?php echo $product['id']; ?></td>
			
			<td><?php echo $product['name']; ?></td>
			
			<td><?php echo $product['slug']; ?></td>
			<td><?php echo $product['description']; ?></td>
			<td><?php echo $product['summary']; ?></td>
            <td><?php echo $product['article']; ?></td>
			<td><?php echo $product['created']; ?></td>
			<td><?php echo $product['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link('View', array('controller' => 'products', 'action' => 'view', $product['id'])); ?>
				<?php echo $this->Html->link('Edit', array('controller' => 'products', 'action' => 'edit', $product['id'])); ?>
				<?php echo $this->Form->postLink('Delete', array('controller' => 'products', 'action' => 'delete', $product['id']), null, __('Are you sure you want to delete # %s?', $product['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
=======
<h2>Brand</h2>

<table>
	<tr>
		<td>Id</td>
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
</table>
>>>>>>> 0dca09ff19234c87c274cad77ae6ee58b13ca441
