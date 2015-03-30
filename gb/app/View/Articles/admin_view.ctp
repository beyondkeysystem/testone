<h2>Article</h2>

<table class="table-striped table-bordered table-condensed table-hover">
    <tr>
        <td>Id</td>
        <td><?php echo $article['Article']['id']; ?></td>
    </tr>
    <tr>
        <td>Name</td>
        <td><?php echo $article['Article']['name']; ?></td>
    </tr>
    <tr>
        <td>Slug</td>
        <td><?php echo $article['Article']['slug']; ?></td>
    </tr>
    <tr>
        <td>Body</td>
        <td><?php echo $article['Article']['body']; ?></td>
    </tr>
    <tr>
        <td>Active</td>
        <td><?php echo $article['Article']['active']; ?></td>
    </tr>
    <tr>
        <td>Created</td>
        <td><?php echo $article['Article']['created']; ?></td>
    </tr>
    <tr>
        <td>Modified</td>
        <td><?php echo $article['Article']['modified']; ?></td>
    </tr>
</table>

<br />
<br />

<?php echo $this->Html->image('articles/image_1/' . $article['Article']['image_1']); ?>

<br />
<br />

<?php echo $this->Html->image('articles/image_2/' . $article['Article']['image_2']); ?>

<br />
<br />

<?php echo $this->Html->image('articles/image_3/' . $article['Article']['image_3']); ?>

<br />
<br />

<span class="label label-warning">
 &nbsp; Image : no watermark, square image size </span>

<br />
<br />

<?php echo $this->Form->create('Article', array('type' => 'file', 'url' => array('controller' => 'articles', 'action' => 'view', 'admin' => true)));?>
<?php echo $this->Form->hidden('id', array('value' => $article['Article']['id'])); ?>
<?php echo $this->Form->hidden('slug', array('value' => $article['Article']['slug'])); ?>
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
				'image_1' => 'image 1',
				'image_2' => 'image 2',
				'image_3' => 'image 3',
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

<h3>Actions</h3>

<br />

<?php echo $this->Html->link('Edit Article', array('action' => 'edit', $article['Article']['id']), array('class' => 'btn')); ?>

<br />
<br />

<?php echo $this->Form->postLink('Delete Article', array('action' => 'delete', $article['Article']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $article['Article']['id'])); ?>

<br />
<br />
