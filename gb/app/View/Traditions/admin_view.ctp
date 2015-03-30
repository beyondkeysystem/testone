<h2>Tradition</h2>

<br />

<table class="table-striped table-bordered table-condensed table-hover">
<tr>
<td>Id</td>
<td><?php echo h($tradition['Tradition']['id']); ?></td>
</tr>
<tr>
<td>Name</td>
<td><?php echo h($tradition['Tradition']['name']); ?></td>
</tr>
<tr>
<td>Slug</td>
<td><?php echo h($tradition['Tradition']['slug']); ?></td>
</tr>
<tr>
<td>Countries</td>
<td><?php echo $tradition['Tradition']['countries']; ?></td>
</tr>
<tr>
<td>Summary</td>
<td><?php echo $tradition['Tradition']['summary']; ?></td>
</tr>
<tr>
<td>Article</td>
<td><?php echo $tradition['Tradition']['article']; ?></td>
</tr>
<tr>
<td>Image</td>
<td><?php echo h($tradition['Tradition']['image']); ?></td>
</tr>
<tr>
<td>Image 1</td>
<td><?php echo h($tradition['Tradition']['image_1']); ?></td>
</tr>
<tr>
<td>Image 2</td>
<td><?php echo h($tradition['Tradition']['image_2']); ?></td>
</tr>
<tr>
<td>Image 3</td>
<td><?php echo h($tradition['Tradition']['image_3']); ?></td>
</tr>
<tr>
<td>Image 4</td>
<td><?php echo h($tradition['Tradition']['image_4']); ?></td>
</tr>
<tr>
<td>Image 5</td>
<td><?php echo h($tradition['Tradition']['image_5']); ?></td>
</tr>
<tr>
<td>Image 6</td>
<td><?php echo h($tradition['Tradition']['image_6']); ?></td>
</tr>
<tr>
<td>Created</td>
<td><?php echo h($tradition['Tradition']['created']); ?></td>
</tr>
<tr>
<td>Modified</td>
<td><?php echo h($tradition['Tradition']['modified']); ?></td>
</tr>
</table>

<br />
<br />

<h3>Actions</h3>

<br />

<?php echo $this->Html->link('Edit Tradition', array('action' => 'edit', $tradition['Tradition']['id']), array('class' => 'btn')); ?>

<br />
<br />

<?php echo $this->Form->postLink('Delete Tradition', array('action' => 'delete', $tradition['Tradition']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $tradition['Tradition']['id'])); ?>

<br />
<br />

<style>

	#awning1 {
		<?php echo $tradition['Tradition']['awning_css']; ?>
	}

</style>

<img id="awning1" src="/img/awning/awning.png">

<br />
<br />

<?php echo $this->Html->link('Edit Awning', array('action' => 'awning', $tradition['Tradition']['id']), array('class' => 'btn')); ?>
<br />
<br />

<span class="label label-warning">
 &nbsp; Image : no watermark, square image size </span>

<br />
<br />

<?php echo $this->Form->create('Tradition', array('type' => 'file', 'url' => array('controller' => 'traditions', 'action' => 'view', 'admin' => true)));?>
<?php echo $this->Form->hidden('id', array('value' => $tradition['Tradition']['id'])); ?>
<?php echo $this->Form->hidden('slug', array('value' => $tradition['Tradition']['slug'])); ?>
<table class="table-striped table-bordered table-condensed">
	<tbody>
		<tr>
			<td>Upload Image</td>
			<td><?php echo $this->Form->file('image'); ?></td>
		</tr>
		<tr>
			<td>Image Type</td>
			<td>

			<?php echo $this->Form->input('image_type', array('type' => 'select', 'label' => false, 'options' => array(
				'image' => 'Main',
				'image_1' => 'image 1',
				'image_2' => 'image 2',
				'image_3' => 'image 3',
				'image_4' => 'image 4',
				'image_5' => 'image 5',
				'image_6' => 'image 6',
			))); ?>

			</td>
		</tr>
		<tr>
			<td></td>
			<td><?php echo $this->Form->button('Submit', array('class' => 'btn'));?></td>
		</tr>
	</tbody>
</table>
<?php echo $this->Form->end(); ?>

<br />
<br />

<?php echo $this->Html->image('traditions/image/'. $tradition['Tradition']['image'] . '?date=' . time(), array('class' => 'gb')); ?>
<br />
<a href="/admin/images/crop?src_dir=traditions/image&src_file=<?php echo $tradition['Tradition']['image']; ?>&dst_dir=traditions/image&dst_file=<?php echo $tradition['Tradition']['image']; ?>&width=300&height=100" class="btn">crop 300 x 100 image</a>

<br />
<br />
<br />
<br />

<?php echo $this->Html->image('traditions/image_1/'. $tradition['Tradition']['image_1'] . '?date=' . time(), array('class' => 'gb')); ?>
<br />
<a href="/admin/images/crop?src_dir=traditions/image_1&src_file=<?php echo $tradition['Tradition']['image_1']; ?>&dst_dir=traditions/image_1&dst_file=<?php echo $tradition['Tradition']['image_1']; ?>&width=300&height=300" class="btn">crop image</a>

<br />
<br />

<?php echo $this->Html->image('traditions/image_2/'. $tradition['Tradition']['image_2'] . '?date=' . time(), array('class' => 'gb')); ?>
<br />
<a href="/admin/images/crop?src_dir=traditions/image_2&src_file=<?php echo $tradition['Tradition']['image_2']; ?>&dst_dir=traditions/image_2&dst_file=<?php echo $tradition['Tradition']['image_2']; ?>&width=300&height=300" class="btn">crop image</a>

<br />
<br />

<?php echo $this->Html->image('traditions/image_3/'. $tradition['Tradition']['image_3'] . '?date=' . time(), array('class' => 'gb')); ?>
<br />
<a href="/admin/images/crop?src_dir=traditions/image_3&src_file=<?php echo $tradition['Tradition']['image_3']; ?>&dst_dir=traditions/image_3&dst_file=<?php echo $tradition['Tradition']['image_3']; ?>&width=300&height=300" class="btn">crop image</a>

<br />
<br />

<?php echo $this->Html->image('traditions/image_4/'. $tradition['Tradition']['image_4'] . '?date=' . time(), array('class' => 'gb')); ?>
<br />
<a href="/admin/images/crop?src_dir=traditions/image_4&src_file=<?php echo $tradition['Tradition']['image_4']; ?>&dst_dir=traditions/image_4&dst_file=<?php echo $tradition['Tradition']['image_4']; ?>&width=300&height=300" class="btn">crop image</a>


<br />
<br />

<?php echo $this->Html->image('traditions/image_5/'. $tradition['Tradition']['image_5'] . '?date=' . time(), array('class' => 'gb')); ?>
<br />
<a href="/admin/images/crop?src_dir=traditions/image_4&src_file=<?php echo $tradition['Tradition']['image_5']; ?>&dst_dir=traditions/image_4&dst_file=<?php echo $tradition['Tradition']['image_5']; ?>&width=300&height=300" class="btn">crop image</a>


<br />
<br />

<?php echo $this->Html->image('traditions/image_6/'. $tradition['Tradition']['image_6'] . '?date=' . time(), array('class' => 'gb')); ?>
<br />
<a href="/admin/images/crop?src_dir=traditions/image_4&src_file=<?php echo $tradition['Tradition']['image_6']; ?>&dst_dir=traditions/image_4&dst_file=<?php echo $tradition['Tradition']['image_6']; ?>&width=300&height=300" class="btn">crop image</a>


<br />
<br />



