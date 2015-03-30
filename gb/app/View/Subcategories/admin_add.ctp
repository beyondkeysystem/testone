<h2>Admin Add Subcategory</h2>

<br />
<br />

<?php echo $this->Form->create('Subcategory'); ?>
<?php
echo $this->Form->input('category_id');
echo $this->Form->input('name');
echo $this->Form->input('slug');
?>
<br />
<?php echo $this->Form->button('Submit', array('class' => 'btn')); ?>
<?php echo $this->Form->end(); ?>

<br />
<br />

