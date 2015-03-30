<?php echo $this->Html->script(array('jquery.flexslider-min.js', 'product_view.js'), array('inline' => false)); ?>

<div class="row">

	<div class="span3">
		<?php if(!empty($user)) : ?>
        <a href="/">
        <?php echo $this->Html->image('users/image/' . $user['User']['image'], array('class' => 'img-polaroid', 'width' =>'226px')); ?>
        </a>
			<h5><?php echo $user['User']['name']; ?></h5>

			<p><?php echo $user['User']['shop_quote']; ?></p>

				<?php if(!empty($usercategories)) : ?>

					<br />
					<h6>Food Categories</h6>

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

				<ul class="breadcrumb btn-gb">
					<li><?php echo $this->Html->link($user['User']['name'], '/'); ?> <span class="divider">/</span></li>
					<li><?php echo $this->Html->link($product['Category']['name'], array('controller' => 'products', 'action' => 'category', 'slug' => $product['Category']['slug'])); ?> <span class="divider">/</span></li>
					<li><?php echo $this->Html->link($product['Subcategory']['name'], array('controller' => 'products', 'action' => 'subcategory', 'slug' => $product['Subcategory']['id'])); ?> <span class="divider">/</span></li>
					<?php if(!empty($subsubcategories)) : ?>
					<li><?php echo $this->Html->link($product['Subsubcategory']['name'], array('controller' => 'products', 'action' => 'subsubcategory', 'slug' => $product['Subsubcategory']['id'])); ?> <span class="divider">/</span></li>
					<?php endif; ?>
					<li class="active"><?php echo $product['Product']['name']; ?></li>
				</ul>

			</div>
		</div>

		<div class="row products">

			<div class="span4 gb-col2">

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

				<?php
					$description = 'unloaded';
					$serv = 'unloaded';
					$recipes = 'unloaded';
					$nutrition = 'unloaded';

					if(!empty($product['Product']['generic_description'])) :
						$description = 'loaded';
					endif;

					if(!empty($product['Product']['serving_suggestions'])) :
						$serv = 'loaded';
					endif;

					if(!empty($product['Product']['recipes'])) :
						$recipes = 'loaded';
					endif;

					if ($nuts) :
						$nutrition = 'loaded';
					endif;


					//print_r($description); ?><br /><?php
					//print_r($serv); ?><br /><?php
					//print_r($recipes); ?><br /><?php
					//print_r($nutrition);
				?>

				<ul class="nav <?php if (($description == 'loaded') || ($serv == 'loaded') || ($recipes == 'loaded') || ($nutrition == 'loaded')) : ?>nav-tabs"<?php endif; ?>"id="myTab">


					<?php if(!empty($product['Product']['generic_description'])) : ?>
					<li class="active"><a href="#more" data-toggle="tab">More...</a></li>
					<?php $description = 'loaded';
					endif;?>


					<?php if(!empty($product['Product']['serving_suggestions'])) :
							if ($description == 'loaded') : ?>
					<li><a href="#serving" data-toggle="tab">Serving Ideas</a></li>
							<?php else : ?>
					<li class="active"><a href="#serving" data-toggle="tab">Serving Ideas</a></li>
							<?php endif;?>
					<?php $serv = 'loaded';
					endif;?>


					<?php if(!empty($product['Product']['recipes'])) :
							if ($serv == 'loaded' || $description == 'loaded') : ?>
					<li><a href="#recipes" data-toggle="tab">Recipes</a></li>
							<?php else : ?>
					<li class="active"><a href="#recipes" data-toggle="tab">Recipes</a></li>
							<?php endif;?>
					<?php $recipes = 'loaded';
					endif;?>


					<?php if(!empty($nuts)) :
						if ($serv == 'loaded' || $description == 'loaded' || $recipes == 'loaded') : ?>
					<li><a href="#nutrition" data-toggle="tab">Nutrition</a></li>
							<?php else : ?>
					<li class="active"><a href="#nutrition" data-toggle="tab">Nutrition</a></li>
							<?php endif;?>
					<?php $nutrition = 'loaded';
					endif;?>

				</ul>

				<?php
					$value = '';
					$value2 = '';
					$value3 = '';
				?>

				<div class="tab-content">

					<?php if(!empty($product['Product']['generic_description'])) : ?>
						<div class="tab-pane active" id="more">
					<?php	echo ($product['Product']['generic_description']); ?>
						</div>
					<?php endif; ?>

					<?php if (($description == 'unloaded') && ($serv == 'loaded')) :
										$value = 'active';
								endif; ?>




					<?php if(!empty($product['Product']['serving_suggestions'])) : ?>
						<div class="tab-pane <?php echo $value; ?>" id="serving">
					<?php echo ($product['Product']['serving_suggestions']) ; ?>
						</div>
					<?php endif; ?>

					<?php if (($description == 'unloaded') && ($serv == 'unloaded') && ($recipes == 'loaded')) :
										$value2 = 'active';
								endif; ?>




					<?php if(!empty($product['Product']['recipes'])) : ?>
						<div class="tab-pane <?php echo $value2; ?>" id="recipes">
					<?php echo $product['Product']['recipes']; ?>
						</div>
					<?php endif; ?>

					<?php if (($description == 'unloaded') && ($serv == 'unloaded') && ($recipes == 'unloaded') &&  ($recipes == 'unloaded') && ($nutrition == 'loaded')) :
									$value3 = 'active';
								endif; ?>



					<?php if ( !empty($nuts) //&& $product['Product']['vitamin_a_p'] !== ''
					//&& $product['Product']['vitamin_c_p'] !== ''
					//&& $product['Product']['calcium_p'] !== ''
					//&& $product['Product']['iron_p'] !== ''
					) : ?>
                    <?php //debug($nuts); ?>
						<div class="tab-pane <?php echo $value3; ?>" id="nutrition">
							<table class="NutritionFacts">
								<tr>
									<td>
										<table class="" cellpadding="0" cellspacing="0" width="100%" style="float:left">
											<tr>
												<td class="nf_Center nf_PaddingB5 nf_Header" colspan="2">Nutrition Facts</td>
											</tr>
											<tr>
												<td class="nf_BorderT10" colspan="2"><b class="nf_TextSmall nf_Bold">Amount Per Serving</b></td>
											</tr>
											<tr>
												<td class="nf_Right nf_PaddingT5 nf_BorderT5" colspan="2"><b class="nf_TextSmall nf_Bold">% Daily Value*</b>						</td>
											</tr>
											<?php foreach($nuts as $nkey => $nvalue): ?>

												<?php $nkey = str_replace('_p', '_%', $nkey); ?>
											<tr>
												<td class="nf_Cell nf_Text">
													<?php echo (str_replace('_', ' ', $nkey)); ?> |<?php
													if (($nkey == 'vitamin_a'  || $nkey == 'vitamin_c' || $nkey == 'calcium' || $nkey == 'iron' )) {
														echo ('');

														?>

														<div style="display:inline;float:right;">

														<?php

														if ($nkey == 'vitamin_a') {
															echo $product['Product']['vitamin_a_p'];
														}

														if ($nkey == 'vitamin_c') {
															echo $product['Product']['vitamin_c_p'];
														}

														if ($nkey == 'calcium') {
															echo $product['Product']['calcium_p'];
														}

														if ($nkey == 'iron') {
															echo $product['Product']['iron_p'];
														}
													}
													else {
															echo $nvalue . 'g'; ?><div style="display:inline;float:right;">
                                                    <?php } ?>


                                                    <?php
														//print_r ($nkey);
														//echo 'yes';

														if ($nkey == 'calories') {
															echo $product['Product']['total_fat_p'];
														}

														if ($nkey == 'saturated_fat') {
															echo $product['Product']['saturated_fat_p'];
														}

														if ($nkey == 'sodium') {
															echo $product['Product']['sodium_p'];
														}

														if ($nkey == 'carbs') {
															echo $product['Product']['carbs_p'];
														}

														if ($nkey == 'fiber') {
															echo $product['Product']['fiber_p'];
														}

														if ($nkey == 'sugar') {
															echo $product['Product']['sugar_p'];
														}

														if ($nkey == 'protein') {
															echo $product['Product']['protein_p'];
														}


														?>

                                                %</div></td>
												<!--<td class="nf_Cell nf_Right nf_Text">%</td>-->
											</tr>
											<?php endforeach;?>

										</table>


									</td>
								</tr>
							</table>
						</div>
					<?php endif; ?>

				</div>




					<?php if(!empty($product['Product']['attribution'])) : ?>
						<h4>Sources:</h4>
						<p><?php echo $product['Product']['attribution']; ?></p>
					<?php endif ?>

			</div>

			<div class="span5 product-description">
            
           
				<?php if(!empty($product['Brand']['description'])) : ?>
					
					<a href="#" class="btn btn-gb" rel="pop_brand" data-placement="bottom" data-original-title="Some info about the brand:"  data-content="<?php echo ($product['Brand']['description']);?>"><?php echo $product['Brand']['name'];?></a>

				<span><img class="hand" src="/img/global/hand.png"/></span>
				<?php elseif(empty($product['Brand']['name'])) : ?>
					<a class="btn btn-gb"><?php echo $user['User']['name']; ?></a>
				<?php else : ?>
					<a class="btn btn-gb"><?php echo $product['Brand']['name']; ?></a>
				<?php endif; ?>



				<h2 class="product-name"><?php echo $product['Product']['name']; ?></h2>

				<p><?php echo $product['Product']['description']; ?></p>

				<p><?php echo $product['Product']['long_description']; ?></p>


				<?php if(!empty($product['Product']['ingredients'])) : ?>
					<p>Ingredients: <?php echo $product['Product']['ingredients']; ?></p>
				<?php endif; ?>
				
				<br />
				<br />
				
				<?php if(!empty($product['Product']['country'])) : ?>
				Made in&nbsp;<?php echo $product['Product']['country']; ?>
				<?php endif; ?>
				
				<br />
				<br />
				
				Stock: <?php echo $product['Product']['stock']; ?>

				<br />
				<br />

				$<?php echo $product['Product']['price']; ?>

				<br />

				<?php if($product['Product']['stock'] > 0 || $product['Product']['user_id'] != 11): ?>
					<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shops', 'action' => 'add'))); ?>
					<?php echo $this->Form->input('id', array('type' => 'hidden', 'value' => $product['Product']['id'])); ?>
					<?php echo $this->Form->button('<i class="icon-shopping-cart icon-white"></i> Add to Cart', array('class' => 'btn btn-gb', 'escape' => false));?>
					<?php echo $this->Form->end(); ?>
				<?php else: ?>
					<?php echo $this->Form->button('<i class="icon-exclamation-sign icon-white"></i> Out of Stock', array('class' => 'btn btn-warning', 'escape' => false));?>
				<?php endif; ?>
				</div>
			</div>


	<div class="row">
		<div class="span9">

			<br />

			<div>
				<?php if(!empty($attributes)) : ?>
					<?php foreach($attributes as $akey => $avalue): ?>
						<div class="attr-icon-set">
							<div class="attr-icons">
								<img src="/img/attributes/<?php echo $akey;?>.jpg" width="50" height="50" />
							</div>
							<div class="attr-icon-caption"><?php echo str_replace('_', ' ', $akey); ?></div>
						</div>
					<?php endforeach;?>
				<?php endif; ?>

			</div>

			<br />
			<br />
			<br />

			<?php if(!empty($related_products)) : ?>

				<h2>PAIRINGS & RELATED PRODUCTS</h2>

				<div id="carousel-image-and-text" class="touchcarousel grey-blue">

					<ul class="touchcarousel-container">

						<?php foreach($related_products as $rproduct): ?>

							<?php echo $rproduct['Product']['name']; ?>
							<br />

						<?php endforeach; ?>
					</ul>

				</div>

			<?php endif; ?>

			<br />


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
            <div class="disclaimer"> Disclaimer:  Every effort has been made to ensure the data presented on this page is accurate.  It is provided to you for reference only.  We assume no liability for inaccuracies due to typographical errors or packaging changes.  Please carefully read the actual package before consuming.  </div>
			<br />

		</div>
	</div>

</div>
</div>