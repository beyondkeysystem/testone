<?php echo $this->Html->script('/tiny_mce/tiny_mce.js'); ?>

<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		skin: "thebigreason",
		plugins : "inlinepopups",
		plugins : "paste",
		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,|,link,unlink,|,bullist,numlist,|,pastetext,pasteword,selectall,|,cleanup,removeformat,code",
		theme_advanced_resizing : true,
	});
</script>
		
<div class="row">
	<div class="span6">
		<h2>Add Recipe</h2>
	</div>	

</div>

<div class="row">

	<div class="span6">
		
		<?php echo $this->Form->create('Recipe'); ?>
		<?php
		echo $this->Form->input('user_id', array('default' => 'General Library'));
		echo $this->Form->input('recipescategory_id');
		echo $this->Form->input('name');
		echo $this->Form->input('slug');
		echo $this->Form->input('traditions', array('empty' => '--', 'label' => 'International Traditions'));
		echo $this->Form->input('ustraditions', array('empty' => '--', 'label' => 'US Traditions'));
		echo $this->Form->input('attribution',array( 'class' => 'input-gb-large'));
		echo $this->Form->input('description', array('rows' => 10, 'class' => 'input-gb-large'));
		echo $this->Form->input('comment', array('rows' => 10, 'class' => 'input-gb-large'));
		echo $this->Form->input('tags',array('class' => 'input-gb-large'));
		//echo $this->Form->input('image_1');
//		echo $this->Form->input('image_2');
//		echo $this->Form->input('image_3');
//		echo $this->Form->input('image_caption_1');
//		echo $this->Form->input('image_caption_2');
//		echo $this->Form->input('image_caption_3');
		?>
		<br />
		<?php echo $this->Form->input('active', array('type' => 'checkbox', 'label' => 'Active')); ?>
		<br />
		
		<br />
		<br />
		<?php echo $this->Form->button('Submit', array('class' => 'btn')); ?>

	</div>
	
	<div class="span6">
	
		<?php
		echo $this->Form->input('ingredients', array('rows' => 15, 'class' => 'input-gb-large'));
		echo $this->Form->input('preparation', array('rows' => 15, 'class' => 'input-gb-large')); ?>
	</div>
</div>

	<?php echo $this->Form->end(); ?>