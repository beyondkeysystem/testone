
<?php echo $this->Html->script(array('jquery.flexslider-min.js', 'product_view.js'), array('inline' => false)); ?>

<br />
<br />

<div class="row">

	<div class="span3">
		<?php if(!empty($user)) : ?>
			<h5><?php echo $user['User']['name']; ?></h5>

			<p><?php echo $user['User']['shop_quote']; ?></p>

				<?php if(!empty($usercategories)) : ?>

					<br />
					<h6>Our Categories</h6>

					<?php foreach ($usercategories as $usercategory): ?>
						<?php echo $this->Html->link($usercategory['Category']['name'], array('controller' => 'products', 'action' => 'category', 'slug' => $usercategory['Category']['slug'])); ?>
					<br />
					<?php endforeach; ?>
					<br />
				<?php endif; ?>

		<?php endif; ?>
	</div>

	<div class="span9">

		<div class="row">
			<div class="span9">

				<ul class="breadcrumb">
					<li><?php echo $this->Html->link($user['User']['name'], '/'); ?> <span class="divider">/</span></li>
					<li><?php echo $this->Html->link($product['Category']['name'], array('controller' => 'products', 'action' => 'category', 'slug' => $product['Category']['slug'])); ?> <span class="divider">/</span></li>
					<li><?php echo $this->Html->link($product['Subcategory']['name'], array('controller' => 'products', 'action' => 'subcategory', 'slug' => $product['Subcategory']['id'])); ?> <span class="divider">/</span></li>
					<li><?php echo $this->Html->link($product['Subsubcategory']['name'], array('controller' => 'products', 'action' => 'subsubcategory', 'slug' => $product['Subsubcategory']['id'])); ?> <span class="divider">/</span></li>
					<li class="active"><?php echo $product['Product']['name']; ?></li>
				</ul>

			</div>
		</div>

		<div class="row products">

			<div class="span4">

					<div id="slider" class="flexslider">
						<ul class="slides">

						<?php if(!empty($product['Product']['image'])) : ?>
							<li><?php echo $this->Html->image('products/image/' .$product['Product']['image']); ?></li>
						<?php endif ; ?>

						<?php if(!empty($product['Product']['image_1'])) : ?>
							<li><?php echo $this->Html->image('products/image_1/' .$product['Product']['image_1']); ?></li>
						<?php endif ; ?>

						<?php if(!empty($product['Product']['image_2'])) : ?>
							<li><?php echo $this->Html->image('products/image_2/' .$product['Product']['image_2']); ?></li>
						<?php endif ; ?>

						<?php if(!empty($product['Product']['image_3'])) : ?>
							<li><?php echo $this->Html->image('products/image_3/' .$product['Product']['image_3']); ?></li>
						<?php endif ; ?>

						<?php if(!empty($product['Product']['image_4'])) : ?>
							<li><?php echo $this->Html->image('products/image_4/' .$product['Product']['image_4']); ?></li>
						<?php endif ; ?>

						<?php if(!empty($product['Product']['image_5'])) : ?>
							<li><?php echo $this->Html->image('products/image_5/' .$product['Product']['image_5']); ?></li>
						<?php endif ; ?>

					  </ul>

					</div>

					<div id="carousel" class="flexslider">
						<ul class="slides">
							<?php if(!empty($product['Product']['image'])) : ?>
								<li><?php echo $this->Html->image('products/image/' .$product['Product']['image'], array('class' => 'pic-thumbnail')); ?></li>
							<?php endif ; ?>

							<?php if(!empty($product['Product']['image_1'])) : ?>
								<li><?php echo $this->Html->image('products/image_1/' .$product['Product']['image_1'], array('class' => 'pic-thumbnail')); ?></li>
							<?php endif ; ?>

							<?php if(!empty($product['Product']['image_2'])) : ?>
								<li><?php echo $this->Html->image('products/image_2/' .$product['Product']['image_2'], array('class' => 'pic-thumbnail')); ?></li>
							<?php endif ; ?>

							<?php if(!empty($product['Product']['image_3'])) : ?>
								<li><?php echo $this->Html->image('products/image_3/' .$product['Product']['image_3'], array('class' => 'pic-thumbnail')); ?></li>
							<?php endif ; ?>

							<?php if(!empty($product['Product']['image_4'])) : ?>
								<li><?php echo $this->Html->image('products/image_4/' .$product['Product']['image_4'], array('class' => 'pic-thumbnail')); ?></li>
							<?php endif ; ?>

							<?php if(!empty($product['Product']['image_5'])) : ?>
								<li><?php echo $this->Html->image('products/image_5/' .$product['Product']['image_5'], array('class' => 'pic-thumbnail')); ?></li>
							<?php endif ; ?>
						</ul>

					</div>

				<?php if(!empty($product['Product']['generic_description'])) : ?>

					<div class="pop"><a href="#" class="btn" rel="pop_generic" data-placement="top" data-original-title="Here's something cool to know..."  data-content="<?php echo h($product['Product']['generic_description']);?>">Click for  more info!</a>
					</div>

				<?php endif ?>

				<br />

				<?php if(!empty($product['Product']['serving_suggestions'])) : ?>
					<h3>Serving Suggestions:</h3>

					<p><?php echo $product['Product']['serving_suggestions']; ?></p>
				<?php endif ?>

				<br />
				<br />

				<?php if(!empty($product['Product']['recipes'])) : ?>
					<h3>Here's a recipe:</h3>
					<p><?php echo $product['Product']['recipes']; ?></p>
				<?php endif ?>

				<?php if(!empty($product['Product']['attribution'])) : ?>
					<h4>Sources:</h4>
					<p><?php echo $product['Product']['attribution']; ?></p>
				<?php endif ?>

			</div>

			<div class="span5 product-description">

				<?php if(!empty($product['Product']['brand_description'])) : ?>

				<!--<a href="#" class="btn" rel="pop_brand" data-placement="bottom" data-original-title="Some info about the brand:"  data-content="<?php //echo $product['Product']['brand_description'];?>">xxxx</a>-->

					<h4><a href="#" class="btn btn-custom" rel="pop_brand" data-placement="bottom" data-original-title="Some info about the brand:"  data-content="<?php echo h($product['Product']['brand_description']);?>"><?php echo $product['Product']['brand']; ?></a></h4>

					<?php else	 : ?>
						<a class="btn btn-custom"><?php echo $product['Product']['brand']; ?></a>
				<?php endif; ?>

				<h3><?php echo $product['Product']['name']; ?></h3>

				<p><?php echo $product['Product']['description']; ?></p>

				<p><?php echo $product['Product']['long_description']; ?></p>


				<?php if(!empty($product['Product']['ingredients'])) : ?>
					<p>Ingredients: <?php echo $product['Product']['ingredients']; ?></p>
				<?php endif; ?>
				<br />

				$<?php echo $product['Product']['price']; ?>

				<br />
				<br />

				<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shops', 'action' => 'add'))); ?>
				<?php echo $this->Form->input('id', array('type' => 'hidden', 'value' => $product['Product']['id'])); ?>
				<?php echo $this->Form->button('<i class="icon-shopping-cart icon-white"></i> Add to Cart', array('class' => 'btn btn-primary', 'escape' => false));?>
				<?php echo $this->Form->end(); ?>

			</div>
		</div>


<div class="row">
	<div class="span9">

				<?php $attributes = array("allergen_free",
					  "gluten",
					  "vegan",
					  "fat_free",
					  "sugar",
					  "msg",
					  "lactose",
					  "low_carb",
					  "nut",
					  "heart_smart",
					  "no_preservatives",
					  "organic",
					  "kosher",
					  "halal",
					  "fair_traded",
					  "give_back"
					  );
				?>

				<div>
					<?php foreach ($attributes as $attribute):?>
						<?php if(isset($product['Product'][$attribute])) : ?>
							<?php if($product['Product'][$attribute] == 1):?>

								<div class="attr-icon-set">

									<div class="attr-icons">
										<img src="/img/attributes/<?php print $attribute;?>.png" width="50" height="50" />
									</div>

									<div class="attr-icon-caption"><?php print str_replace('_', ' ', $attribute); ?></div>

								</div>

							<?php endif;?>
						<?php endif;?>
					<?php endforeach;?>

				</div>

			</div>

			<?php
				if(!empty($product['Product']['related_products'])):
					$related_products = unserialize($product['Product']['related_products']);
					$sql = "SELECT product_name, product_id, description, image FROM products WHERE product_id IN (".join(",",array_keys($related_products)).")";
					$result = mysql_query($sql);
			?>

			<h2>PAIRINGS & RELATED PRODUCTS</h2>

			<div id="carousel-image-and-text" class="touchcarousel grey-blue">

				<ul class="touchcarousel-container">

					<?php while ($row = mysql_fetch_object($result)):?>

						<li class="touchcarousel-item">
							<a class="item-block" href="/product/<?php echo $row->product_id;?>"> <img src="/administration/images/product/<?php echo $row->image; ?>"/>

						<h5><?php echo $row->product_name; ?></h5>

						<p> <?php echo (!empty($related_products[$row->product_id]['description']) ? $related_products[$row->product_id]['description'] : $row->description) ; ?> </p>
							</a>
						</li>

					<?php endwhile;?>

				</ul>
			</div>

			<?php endif;?>

			<div class="clear"></div>


	</div>

	</div>

</div>

<br />
<br />

<!--Facebook -->
<div id="fb-root">
</div>
<script type="text/javascript">(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=214123048679188";
		fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
</script>

<div class="fb-comment">
	<div class="fb-comments" data-href="http://gourmet-basket.com" data-num-posts="3" data-width="440"></div>
</div>
<!--Facebook -->

<br />
<br />

