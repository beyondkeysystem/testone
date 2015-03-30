<h2>Admin Edit Subcategory</h2>

<br />
<br />

<?php echo $this->Form->create('Subcategory'); ?>
<?php
echo $this->Form->input('id');
echo $this->Form->input('category_id');
echo $this->Form->input('name');
echo $this->Form->input('slug');
?>
<?php echo $this->Form->button('Submit', array('class' => 'btn')); ?>
<?php echo $this->Form->end(); ?>


<br />
<br />

<h3>Actions</h3>

<br />
<br />

<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $this->Form->value('Subcategory.id')), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $this->Form->value('Subcategory.id'))); ?>

<br />
<br />

