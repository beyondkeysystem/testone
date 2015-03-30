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


<div class= "row">
	<div class= "span4">
		<h2>Admin Edit Recipe</h2>
	</div>
</div>

<div class= "row">
	<div class= "span4">

		<?php echo $this->Form->create('Recipe'); ?>
		<?php echo $this->Form->input('id',array(
			'readonly' => 'readonly')); ?>


		<?php echo $this->Form->input('user_id', array('label' => 'Vendor')); ?>
		<?php echo $this->Form->input('recipescategory_id',array('label' => 'Recipe Category')); ?>
		<?php echo $this->Form->input('name'); ?>
		<?php echo $this->Form->input('slug'); ?>
		<?php echo $this->Form->input('attribution',array('class' => 'input-gb-large')); ?>
		<?php echo $this->Form->input('description', array('rows' => 20, 'class' => 'input-gb-large')); ?>
		<?php echo $this->Form->input('ingredients', array('rows' => 20, 'class' => 'input-gb-large')); ?>
		<?php echo $this->Form->input('preparation', array('rows' => 20, 'class' => 'input-gb-large')); ?>
		<?php echo $this->Form->input('comment', array('rows' => 20, 'class' => 'input-gb-large')); ?>
		<?php echo $this->Form->input('tags'); ?>
		<?php echo $this->Form->input('tradition_id', array('empty' => '--')); ?>
		<?php echo $this->Form->input('ustradition_id', array('empty' => '--')); ?>
		?>
		<br />
		<?php echo $this->Form->input('active', array('type' => 'checkbox', 'label' => 'Active')); ?>
		<br />
		<?php echo $this->Form->button('Submit', array('class' => 'btn')); ?>
		<?php echo $this->Form->end(); ?>


		<br />
		<br />

		<h3>Actions</h3>

		<?php echo $this->Html->link('View', array('action' => 'view', $this->Form->value('Recipe.id')), array('class' => 'btn')); ?>

		<br />
		<br />

		<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $this->Form->value('Recipe.id')), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $this->Form->value('Recipe.id'))); ?>


		<br />
		<br />

		</div>
</div>


