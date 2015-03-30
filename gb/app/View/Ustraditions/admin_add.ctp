<h2>Admin Add US Tradition</h2>

<br />

<?php echo $this->Form->create('Ustradition'); ?>
<?php
echo $this->Form->input('name');
echo $this->Form->input('slug');
echo $this->Form->input('states');
echo $this->Form->input('summary');
echo $this->Form->input('article');
echo $this->Form->input('main_image');
echo $this->Form->input('image_1');
echo $this->Form->input('image_2');
echo $this->Form->input('image_3');
echo $this->Form->input('image_4');
echo $this->Form->input('image_5');
echo $this->Form->input('image_6');
?>
<br />
<?php echo $this->Form->button('Submit', array('class' => 'btn')); ?>
<?php echo $this->Form->end(); ?>

<br />
<br />

