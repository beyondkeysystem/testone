<?php echo $this->Html->script(array('jquery.chained.js'), array('inline' => false)); ?>

<?php echo $this->Html->script('/tiny_mce/tiny_mce.js', array('inline' => false)); ?>

<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		skin: "thebigreason",
		plugins : "inlinepopups",
		plugins : "paste",
		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,|,link,unlink,|,bullist,numlist,|,pastetext,pasteword,selectall,||,cleanup,removeformat,code",
		theme_advanced_resizing : true,
		
		
		
		
	
		
		
		
	});
</script>

<script type="text/javascript">

$(document).ready(function(){

	$("#ProductSubcategoryId").chained("#ProductCategoryId");
	$("#ProductSubsubcategoryId").chained("#ProductSubcategoryId");

});

</script>

<script>
	$(function() {
		$( "#datepicker" ).datepicker();
		$( "#datepicker" ).datepicker({ changeYear: true });
		// getter
		var changeYear = $( ".selector" ).datepicker( "option", "changeYear" );
		// setter
		$( "#datepicker" ).datepicker( "option", "changeYear", true );
		$( "#datepicker" ).datepicker({ gotoCurrent: true });
		// getter
		var gotoCurrent = $( ".selector" ).datepicker( "option", "gotoCurrent" );
		// setter
		$( "#datepicker" ).datepicker( "option", "gotoCurrent", true );
	});
  </script>



<h2>Admin Edit Product</h2>

<?php echo $this->Form->create('Product'); ?>
<?php echo $this->Form->input('id'); ?>


<div class="row">

	<div class="span3">
		<?php echo $this->Form->input('user_id'); ?>
	</div>
    
    <div class="span3 offset3">
			<?php echo $this->Form->input('active', array('type' => 'checkbox', 'label' => 'Active')); ?>
		</div>

	<div class="span3 offset6 ">

		<?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>

	</div>


</div>

<div class="row">

		<div class="span3">
			<?php echo $this->Form->input('name'); ?>
		</div>
		<div class="span3">
			<?php echo $this->Form->input('category_id', array('empty' => '-')); ?>
		</div>
		<div class="span3">
			<?php echo $this->Form->input('subcategory_id', array('empty' => '-')); ?>
		</div>
		<div class="span3">
			<?php echo $this->Form->input('subsubcategory_id', array('empty' => '-')); ?>
		</div>

</div>

<div class="row">

	<div class="span3">
		<?php echo $this->Form->input('slug'); ?>
	</div>

	<div class="span3">
		<?php echo $this->Form->input('brand_id', array('empty' => '--')); ?>
	</div>

	<div class="span3">
		<?php echo $this->Form->input('upc'); ?>
	</div>

	<div class="span3">
		<?php echo $this->Form->input('vendor_sku'); ?>
	</div>

</div>

<br />
<br />

<div class="row">

	<div class="span2">
		<?php echo $this->Form->input('displaygroup', array('label' => 'Display Group Priority','empty' => '--')); ?>
	</div>


</div>

<br />
<br />

<div class="row">

	<div class="span5">
		<?php echo $this->Form->input('description', array('rows' => 10, 'class' => 'field span5')); ?>
	</div>

	<div class="span5">
		<?php // echo $this->Form->input('brand_description', array('rows' => 10, 'cols' => 10)); ?>
	</div>

	<div class="span2">
		<?php echo $this->Form->input('tags', array('class' => '4span')); ?>
		<br />
		<?php echo $this->Form->input('featured_product', array('type' => 'checkbox', 'label' => 'Featured Product'));?>
		<?php echo $this->Form->input('gift_product', array('type' => 'checkbox', 'label' => 'Gift Product'));?>
	</div>

</div>

<br />
<br />

<div class="row">

	<div class="span5">
		<div><?php echo $this->Form->input('long_description', array('rows' => 20, 'class' => '4span')); ?></div>
		<div><?php echo $this->Form->input('generic_description', array('rows' => 20, 'class' => '4span')); ?></div>
	</div>

	<div class="span3">
    <h3>Traditions</h3>
		<?php echo $this->Form->input('traditions', array('type' => 'select', 'multiple' => 'checkbox', 'options' => $traditions, 'selected' => $traditionsselected, 'label' => 'International Traditions')); ?>
		<br />
		<br />
		<?php echo $this->Form->input('ustradition_id', array('label' => 'US Traditions','empty' => '--')); ?>
		<?php echo $this->Form->input('country'); ?>
		<?php echo $this->Form->input('creation'); ?>
	</div>

	<div class="span2">
    <h3>Attributes</h3>
	<?php
		echo $this->Form->input('attr_allergen_free', array('type' => 'checkbox','label' => 'Allergen Free'));
		echo $this->Form->input('attr_gluten_free', array('type' => 'checkbox','label' => 'Gluten Free'));
		echo $this->Form->input('attr_vegetarian', array('type' => 'checkbox','label' => 'Vegetarian'));
		echo $this->Form->input('attr_low_fat', array('type' => 'checkbox','label' => 'Low Fat'));
		echo $this->Form->input('attr_sugar_free', array('type' => 'checkbox','label' => 'Sugar Free'));
		echo $this->Form->input('attr_no_msg', array('type' => 'checkbox','label' => 'No MSG'));
		echo $this->Form->input('attr_lactose_free', array('type' => 'checkbox','label' => 'Lactose Free'));
		echo $this->Form->input('attr_low_carb', array('type' => 'checkbox','label' => 'Low Carb'));
		echo $this->Form->input('attr_nut_free', array('type' => 'checkbox','label' => 'Nut Free'));
		echo $this->Form->input('attr_heart_smart', array('type' => 'checkbox','label' => 'Heart Smart'));
		echo $this->Form->input('attr_no_preservatives', array('type' => 'checkbox','label' => 'No Artificial Preservatives'));
		echo $this->Form->input('attr_organic', array('type' => 'checkbox','label' => 'Organic'));
		echo $this->Form->input('attr_kosher', array('type' => 'checkbox','label' => 'Kosher'));
		echo $this->Form->input('attr_halal', array('type' => 'checkbox','label' => 'Halal'));
		echo $this->Form->input('attr_fair_traded', array('type' => 'checkbox','label' => 'Fair Traded'));
		echo $this->Form->input('attr_give_back', array('type' => 'checkbox','label' => 'Give Back'));
		echo $this->Form->input('attr_heat_sensitivity', array('type' => 'checkbox','label' => 'Not Heat Sensitive'));
		echo $this->Form->input('attr_all_natural', array('type' => 'checkbox','label' => 'All Natural'));
		echo $this->Form->input('attr_award_winning', array('type' => 'checkbox','label' => 'Award Winning'));
	?>
	</div>

</div>

<br />
<br />

<div class="row">

	<div class="span5">
		<?php echo $this->Form->input('ingredients', array('rows' => 10, 'class' => '4span')); ?>
		<?php echo $this->Form->input('nutrition', array('rows' => 10, 'class' => '4span')); ?>
		<?php echo $this->Form->input('recipes', array('rows' => 10, 'class' => '4span')); ?>
		<div><?php echo $this->Form->input('serving_suggestions', array('rows' => 10, 'class' => '4span')); ?></div>
		<?php echo $this->Form->input('attribution', array('rows' => 4, 'class' => '4span')); ?>
	</div>

	<div class="span3">
		<div class="emphasize">Commission: <?php echo h($product['User']['commission']); ?>%</div>
		<?php echo $this->Form->input('price_wholesale', array('class' => 'span1'));?>
		<?php //echo $this->Form->input('price_list', array('class' => 'span1'));?>
		<div class="emphasize">Markup: <?php echo h($product['Product']['markup']); ?>%</div>
		<?php echo $this->Form->input('price', array('class' => 'span1'));?>
		<?php echo $this->Form->input('taxable', array('type' => 'checkbox'));?><br />
		<?php //echo $this->Form->input('measurement');?>
		<?php //echo $this->Form->input('weight_unit');?>
		<?php //echo $this->Form->input('weight', array('class' => 'span1'));?>
		<?php echo $this->Form->input('shipping_weight', array('class' => 'span1'));?>
		<?php //echo $this->Form->input('volume', array('class' => 'span1'));?>
		<?php //echo $this->Form->input('volume_unit', array('class' => 'span1'));?>
		<?php //echo $this->Form->input('dimension_unit', array('class' => 'span1'));?>
		<?php echo $this->Form->input('height', array('class' => 'span1'));?>
        <?php echo $this->Form->input('width', array('class' => 'span1','label' => 'Width / Diameter'));?>
        <?php echo $this->Form->input('length', array('class' => 'span1','label' => 'Depth / Diameter'));?>
		<br />
		<br />
        <h4>Current Stock : <?php echo h($product['Product']['stock']); ?></h4>
        <?php echo $this->Form->input('seasonal_stock', array('type' => 'checkbox','label' => 'Seasonal Stock Item')); ?>
        <?php echo $this->Form->input('seasonal_stock_date', array('id' => 'datepicker', 'label' => 'Projected date back in Stock','class' => 'mceNoEditor')); ?>
 		<br />
		<br />       
		<?php echo $this->Form->input('related_products'); ?>
	</div>

</div>

<br />
<br />

<div class="row">

	<div class="span2 nutrition">
		<?php echo $this->Form->input('nut_serv_size', array('class' => 'span1','label' => 'Serving Size')); ?>
	</div>
    	<div class="span2 nutrition">
		<?php echo $this->Form->input('nut_serv_per_container', array('class' => 'span1','label' => 'Servings per Container')); ?>
	</div>

	
</div>

<div class="row">

	<div class="span1 nutrition">
		<?php echo $this->Form->input('nut_calories', array('class' => 'span1','label' => 'Calories')); ?>
	</div>
	<div class="span2 nutrition">
		<?php echo $this->Form->input('nut_calories_from_fat', array('class' => 'span1','label' => 'Cal from Fat')); ?>
	</div>
	<div class="span1 nutrition">
		<?php echo $this->Form->input('nut_total_fat', array('class' => 'span1','label' => 'Total Fat')); ?>
	</div>
    	<div class="span2 nutrition">
		<?php echo $this->Form->input('nut_total_fat_p', array('class' => 'span1','label' => '% Total Fat')); ?>
	</div>
	<div class="span1 nutrition">
		<?php echo $this->Form->input('nut_saturated_fat', array('class' => 'span1','label' => 'Sat Fat')); ?>
	</div>
    <div class="span2 nutrition">
		<?php echo $this->Form->input('nut_saturated_fat_p', array('class' => 'span1','label' => '% Sat Fat')); ?>
	</div>
	<div class="span1 nutrition">
		<?php echo $this->Form->input('nut_cholesterol', array('class' => 'span1','label' => 'Cholesterol')); ?>
	</div>

</div>

<div class="row">

	<div class="span1 nutrition">
		<?php echo $this->Form->input('nut_sodium', array('class' => 'span1','label' => 'Sodium')); ?>
	</div>
	<div class="span2 nutrition">
		<?php echo $this->Form->input('nut_sodium_p', array('class' => 'span1','label' => 'Daily %')); ?>
	</div>
	<div class="span1 nutrition">
		<?php echo $this->Form->input('nut_carbs', array('class' => 'span1','label' => 'Total Carb')); ?>
	</div>
	<div class="span2 nutrition">
		<?php echo $this->Form->input('nut_carbs_p', array('class' => 'span1','label' => 'Daily %')); ?>
	</div>
	<div class="span1 nutrition">
		<?php echo $this->Form->input('nut_fiber', array('class' => 'span1','label' => 'Fiber')); ?>
	</div>
		<div class="span1 nutrition">
		<?php echo $this->Form->input('nut_fiber_p', array('class' => 'span1','label' => 'Daily %')); ?>
	</div>

</div>


<div class="row">

	<div class="span1 nutrition">
		<?php echo $this->Form->input('nut_sugar', array('class' => 'span1','label' => 'Sugar')); ?>
	</div>
	<div class="span1 nutrition">
		<?php echo $this->Form->input('nut_protein', array('class' => 'span1','label' => 'Protein')); ?>
	</div>

    
</div>

<div class="row">
	<!--<div class="span1 nutrition">
		<?php //echo $this->Form->input('nut_vitamin_a', array('class' => 'span1','label' => 'Vit A')); ?>
	</div>-->
    <div class="span1 nutrition">
		<?php echo $this->Form->input('vitamin_a_p', array('class' => 'span1','label' => '% Vit A')); ?>
	</div>

<!--    <div class="span1 nutrition">
		<?php //echo $this->Form->input('nut_vitamin_c', array('class' => 'span1','label' => 'Vit C')); ?>
	</div>
-->    <div class="span1 nutrition">
		<?php echo $this->Form->input('vitamin_c_p', array('class' => 'span1','label' => '% Vit C')); ?>
	</div>

<!--	<div class="span1 nutrition">
		<?php //echo $this->Form->input('nut_calcium', array('class' => 'span1','label' => 'Calc')); ?>
	</div>
-->	<div class="span1 nutrition">
		<?php echo $this->Form->input('calcium_p', array('class' => 'span1','label' => '% Calc')); ?>
	</div>

<!--	<div class="span1 nutrition">
		<?php //echo $this->Form->input('nut_iron', array('class' => 'span1','label' => 'Iron')); ?>
	</div>
-->	<div class="span1 nutrition">
		<?php echo $this->Form->input('iron_p', array('class' => 'span1','label' => '% Iron')); ?>
	</div>
</div>




<br />
<br />

<div class="row">

	<div class="span4">
		
		<?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
		<?php echo $this->Form->end(); ?>

	</div>

</div>

<br />
<br />

<h3>Actions</h3>

<br />

<?php echo $this->Html->link('View', array('action' => 'view', $product['Product']['id']), array('class' => 'btn')); ?>

<br />
<br />

<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $this->Form->value('Product.id')), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $this->Form->value('Product.id'))); ?>

<br />
<br />
