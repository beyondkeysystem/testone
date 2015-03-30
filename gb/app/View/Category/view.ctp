<br />

<ul class="breadcrumb">

	<?php if(!empty($category)) : ?>
	<li>
		<?php //echo $this->Html->link($user['User']['name'], '/'); ?>
		<span class="divider">/</span></li>
	<li><?php echo $this->Html->link($category['Category']['name'], array('controller' => 'products', 'action' => 'category', 'slug' => $category['Category']['slug'])); ?> <span class="divider">/</span></li>
	<?php endif; ?>
	<?php if(!empty($subcategory)) : ?>
	<li><?php echo $this->Html->link($subcategory['Subcategory']['name'], array('controller' => 'products', 'action' => 'subcategory', 'slug' => $subcategory['Subcategory']['id'])); ?> <span class="divider">/</span></li>
	<?php endif; ?>
	<?php if(!empty($subsubcategory)) : ?>
	<li><?php echo $this->Html->link($subsubcategory['Subsubcategory']['name'], array('controller' => 'products', 'action' => 'subsubcategory', 'slug' => $subsubcategory['Subsubcategory']['id'])); ?> <span class="divider">/</span></li>
	<?php endif; ?>
	<li class="active">
		<?php //echo $product['Product']['name']; ?>
	</li>
</ul>


<div class="row">

	<div class="span3">

		<?php foreach ($subcategories as $subcategory): ?>
			<?php echo $this->Html->link($subcategory['Subcategory']['name'], array('controller' => 'products', 'action' => 'subcategory', 'slug' => $subcategory['Subcategory']['id'])); ?> <br />
			<?php foreach ($subcategory['Subsubcategory'] as $subsubcategory          ): ?>
			-- <?php echo $subsubcategory['name']; ?><br />
			<?php endforeach; ?>

		<?php endforeach; ?>

	</div>



<div class="span9">


	<div class="top-product-block">

		<br />


		<div class="summary"><?php echo $category['Category']['summary']; ?></div>



		<div class="row">
			<?php
				$i = 0;
				foreach ($products as $product):
				$i++;
				?>

			<div class="span2">

				<div class="content-product">

					<div class="content-img">


						<?php echo $this->Html->image('products/image/' . $product['Product']['image'], array('url' => array('subdomain' => $product['User']['slug'], 'controller' => 'products', 'action' => 'view', 'id' => $product['Product']['id'], 'slug' => $product['Product']['slug']), 'alt' => $product['Product']['name'], 'class' => 'img-polaroid img180')); ?>

						<div class="product-name">
							<a href="/product/<?php echo ($product['Product']['id'].'-'.$product['Product']['slug']);?>">
								<?php echo $this->Text->truncate(
									$product['Product']['name'],40,	array('ellipsis' => '...','exact' => 'false')); ?>
							</a>
						</div>

					</div>


					<div class="price">$<?php echo $product['Product']['price']; ?></div>

					<div class="brand"><?php echo $this->Html->link($product['User']['name'], array('subdomain' => $product['User']['slug'], 'controller' => 'products', 'action' => 'index')); ?></div>


				</div>

			</div>




		<?php if (($i % 4) == 0) : ?>

	</div>


	<div class="row">

		<?php endif; ?>
		<?php endforeach; ?>

	</div>

</div>

</div>

<br />
<br />

<h2><?php echo h($category['Category']['name']); ?></h2>
<table class="table table-striped table-bordered table-condensed table-hover">
	<tr>
		<td>Id</td>
		<td><?php echo h($category['Category']['id']); ?></td>
	<tr> </tr>

		<td>Name</td>
		<td><?php echo h($category['Category']['name']); ?></td>
	<tr> </tr>

		<td>Slug</td>
		<td><?php echo h($category['Category']['slug']); ?></td>
	<tr> </tr>

		<td>Article</td>
		<td><?php echo $category['Category']['article']; ?></td>
	<tr> </tr>

		<td>Summary</td>
		<td><?php echo $category['Category']['summary']; ?></td>
	<tr> </tr>

		<td>Image</td>
		<td><?php if(!empty($category['Category']['image'])) :
			echo h($category['Category']['image']);
	  endif ?></td>
	<tr> </tr>

		<td>Image 1</td>
		<td><?php if(!empty($category['Category']['image'])) :
			echo h($category['Category']['image']);
	  endif ?></td>
	<tr> </tr>

		<td>Image 2</td>
		<td><?php if(!empty($category['Category']['image'])) :
			echo h($category['Category']['image']);
	  endif ?></td>
	<tr> </tr>

		<td>Image 3</td>
		<td><?php if(!empty($category['Category']['image_1'])) :
			echo h($category['Category']['image_1']);
	  endif ?></td>
	<tr> </tr>

		<td>Image 4</td>
		<td><?php if(!empty($category['Category']['image_2'])) :
			echo h($category['Category']['image']);
	  endif ?></td>
	<tr> </tr>

		<td>Image 5</td>
		<td><?php if(!empty($category['Category']['image_3'])) :
			echo h($category['Category']['image_3']);
	  endif ?></td>
	<tr> </tr>

		<td>Created</td>
		<td><?php if(!empty($category['Category']['image_4'])) :
			echo h($category['Category']['image_4']);
	  endif ?></td>
	<tr> </tr>

		<td>Modified</td>
		<td><?php if(!empty($category['Category']['image_5'])) :
			echo h($category['Category']['image_5']);
	  endif ?></td>
	</tr>
</table>
<br />
