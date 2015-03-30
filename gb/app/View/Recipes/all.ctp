<h2>All Gourmet Basket Recipes</h2>

<script>
$(document).ready(function() {
	$('#recipescategories').change(function() {
		location.href = 'http://<?php echo Configure::read('Settings.DOMAIN'); ?>/recipes/all/category:' + $(this).val();
	});
	$('#vendors').change(function() {
		location.href = 'http://<?php echo Configure::read('Settings.DOMAIN'); ?>/recipes/all/vendor:' + $(this).val();
	});
});
</script>

<div class="row">
	<div class="span3">
		<?php echo $this->Form->input('recipescategories', array('options' => $recipescategories, 'label' => 'Recipe Categories','empty' => array('all' => 'All Recipes'), 'default' => $recipescategory_selected)); ?>
	</div>
	<div class="span3">
		<?php echo $this->Form->input('vendors', array('options' => $vendors, 'empty' => array('all' => 'All Vendors'), 'default' => $vendor_selected)); ?>
	</div>
</div>



<?php /*?><table cellpadding="5" cellspacing="5">
	<tr>
		<th><?php echo $this->Paginator->sort('name');?></th>
		<th><?php echo $this->Paginator->sort('user_id');?></th>
		<th><?php echo $this->Paginator->sort('recipescategory_name');?></th>
	</tr>
<?php foreach ($recipes as $recipe): ?>
	<tr>
		<td><?php echo $this->Html->link($recipe['Recipe']['name'], array('action' => 'view', 'short_name' => $recipe['User']['slug'], 'slug' => $recipe['Recipe']['slug'])); ?></td>
		<td><?php echo $recipe['User']['name']; ?></td>
		<td><?php echo $recipe['Category']['name']; ?></td>
	</tr>
<?php endforeach; ?>
</table>
<?php */?>


<br />
<br />


<div class="row">

	<?php
	$i = 0;
	foreach ($recipes as $recipe):
		$i++;
		if (($i % 4) == 0) { echo "\n<div class=\"row\">\n\n";}
	?>
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
        
	<?php
	if (($i % 4) == 0) { echo "\n</div>\n\n";}
	endforeach;
	?>
</div>

<br />
<br />

<?php $this->Paginator->options(array('url' => $this->passedArgs)); ?>

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />
