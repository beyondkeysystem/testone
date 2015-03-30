<h2>US Tradition</h2>
<?php echo $this->Form->create('Ustradition'); ?>

<table class="table-striped table-bordered table-condensed table-hover">
<tr>
<td>Id</td>
<td><?php echo h($ustradition['Ustradition']['id']); ?></td>
</tr>
<tr>
<td>Name</td>
<td><?php echo h($ustradition['Ustradition']['name']); ?></td>
</tr>
<tr>
<td>Main Image</td>
<td><?php echo h($ustradition['Ustradition']['main_image']); ?><?php echo $this->Form->input('main_image_desc',array('label' => 'Description')); ?></td>

</tr>
<tr>
<td>Image 1</td>
<td><?php echo h($ustradition['Ustradition']['image_1']); ?><?php echo $this->Form->input('image_1_desc',array('label' => 'Description')); ?></td>
</tr>
<tr>
<td>Image 2</td>
<td><?php echo h($ustradition['Ustradition']['image_2']); ?><?php echo $this->Form->input('image_2_desc',array('label' => 'Description')); ?></td>
</tr>
<tr>
<td>Image 3</td>
<td><?php echo h($ustradition['Ustradition']['image_3']); ?><?php echo $this->Form->input('image_3_desc',array('label' => 'Description')); ?></td>
</tr>
<tr>
<td>Image 4</td>
<td><?php echo h($ustradition['Ustradition']['image_4']); ?><?php echo $this->Form->input('image_4_desc',array('label' => 'Description')); ?></td>
</tr>
<tr>
<td>Image 5</td>
<td><?php echo h($ustradition['Ustradition']['image_5']); ?><?php echo $this->Form->input('image_5_desc',array('label' => 'Description')); ?></td>
</tr>
<tr>
<td>Image 6</td>
<td><?php echo h($ustradition['Ustradition']['image_6']); ?><?php echo $this->Form->input('image_6_desc',array('label' => 'Description')); ?></td>
</tr>
<tr>
<td>Created</td>
<td><?php echo h($ustradition['Ustradition']['created']); ?></td>
</tr>
<tr>
<td>Modified</td>
<td><?php echo h($ustradition['Ustradition']['modified']); ?></td>
</tr>
</table>

<br />
<br />

<h3>Actions</h3>
<?php echo $this->Form->button('Submit', array('class' => 'btn')); ?>
<?php echo $this->Form->end(); ?>

<br />

<?php echo $this->Html->link('Edit US Tradition', array('action' => 'edit', $ustradition['Ustradition']['id']), array('class' => 'btn')); ?>

<br />
<br />

<?php echo $this->Form->postLink('Delete US Tradition', array('action' => 'delete', $ustradition['Ustradition']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $ustradition['Ustradition']['id'])); ?>

<br />
<br />

