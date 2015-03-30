<style>
.recipescontainer {
	overflow: hidden;
	background: #FFFFFF;
	margin: 0 auto;
	color: #444;
}
.recipes {
	display: inline-block;
	width: 160px;
	padding: 5px;
	margin: 5px;
	vertical-align: top;
}
.recipes img {
	margin-top: 5px;
	margin-bottom: 5px;
	border: 1px #CCC solid;
}
</style>


<div class="vendor-logo">
            <a href="/">
                <?php echo $this->Html->image('users/image/' . $user['User']['image'], array('class' => 'img-polaroid','width' =>'210px')); ?>
            </a>
        </div>


<h4>Our Recipes</h4>

<br />

<div class="recipescontainer">
	<?php foreach ($recipes as $recipe): ?>

    
<div class="span3">
        
            <div class="content-recipe">
    
               
                
				<?php echo '<a href="http://' . $recipe['User']['slug'] . '.' . Configure::read('Settings.DOMAIN') . '/recipe/' . $recipe['Recipe']['slug'] . '">'; ?>
					<div class="small"><?php echo $recipe['Recipescategory']['name']; ?>
					</div>
                    
                    <div class="content-img">
                        <?php echo $this->Html->image('/img/recipes/image_1/' . $recipe['Recipe']['image_1'] , array('width' => 200, 'height' => 200, 'alt' => $recipe['Recipe']['name'], 'class' => 'img-polaroid')); ?>
                    
                    
						<?php /*?><?php echo $this->Html->image('products/image/' . $product['Product']['image'], array('url' => array('subdomain' => $product['User']['slug'], 'controller' => 'products', 'action' => 'view', 'id' => $product['Product']['id'], 'slug' => $product['Product']['slug']), 'alt' => $product['Product']['name'], 'class' => 'img-polaroid img180')); ?><?php */?>
                    
                        <div class="recipe-name">
                            <?php echo $recipe['Recipe']['name']; ?>
                        
                        
                            <?php /*?><!--<a href="/product/<?php echo ($product['Product']['id'].'-'.$product['Product']['slug']);?>"> <?php echo $this->Text->truncate($product['Product']['name'], 40, array('ellipsis' => '...', 'exact' => 'false')); ?>
                            </a>--><?php */?>
                        </div>
                        
                    </div>
                    
                   </a> 
                
                  
            </div>
    
        </div>

            <?php endforeach; ?>
    
        </div>

</div>

<br />
<br />

<?php $this->Paginator->options(array('url' => $this->passedArgs)); ?>

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />
