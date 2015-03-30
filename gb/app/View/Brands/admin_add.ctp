<h2>Admin Add Brand</h2>

<?php echo $this->Form->create('Brand'); ?>
<?php
echo $this->Form->input('name');
echo $this->Form->input('slug');
echo $this->Form->input('description');
echo $this->Form->input('summary');
echo $this->Form->input('article');
?>
<br />
<?php echo $this->Form->button('Submit', array('class' => 'btn')); ?>
<?php echo $this->Form->end(); ?>

<br />
<br />

