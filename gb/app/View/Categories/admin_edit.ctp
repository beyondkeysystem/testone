<?php echo $this->Html->script('/tiny_mce/tiny_mce.js', array('inline' => false)); ?>

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


<h2>Admin Edit Category</h2>

<br />
<br />

<div class="row-fluid">
	<div class="span6">
		<?php echo $this->Form->create('Category'); ?>
	
		<?php echo $this->Form->input('id'); ?>
	
		<?php echo $this->Form->input('name'); ?>
	
		<?php echo $this->Form->input('slug'); ?>
	
		<?php echo $this->Form->input('article', array('rows' => 20, 'class' => '4span')); ?>
	
	
		<?php echo $this->Form->input('summary'); ?>
			
	<br />
	<?php echo $this->Form->button('Submit', array('class' => 'btn')); ?>
	<?php echo $this->Form->end(); ?>
	
	<br />
	<br />
	
	<h3>Actions</h3>
	
	<br />
	<br />
	
	<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $this->Form->value('Category.id')), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $this->Form->value('Category.id'))); ?>
	
	<br />
	<br />
	
	</div>
</div>

