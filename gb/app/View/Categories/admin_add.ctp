<h2>Admin Add Category</h2>

<br />
<br />

<?php echo $this->Form->create('Category'); ?>
<?php
echo $this->Form->input('name');
echo $this->Form->input('slug');
echo $this->Form->input('article');
echo $this->Form->input('summary');
echo $this->Form->input('image');
echo $this->Form->input('image_1');
echo $this->Form->input('image_2');
echo $this->Form->input('image_3');
echo $this->Form->input('image_4');
echo $this->Form->input('image_5');
?>
<?php echo $this->Form->button('Submit', array('class' => 'btn')); ?>
<?php echo $this->Form->end(); ?>

<br />
<br />

