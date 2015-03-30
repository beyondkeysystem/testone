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


<h2>Traditions</h2>

<table class="table table-striped table-bordered table-condensed table-hover">
	<tr>
   		<th class="actions">Actions</th>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('slug'); ?></th>
		<th><?php echo $this->Paginator->sort('countries'); ?></th>
		<th><?php echo $this->Paginator->sort('summary'); ?></th>
		<th><?php echo $this->Paginator->sort('article'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('modified'); ?></th>
		
	</tr>
	<?php foreach ($traditions as $tradition): ?>
	<tr>
    	<td class="actions">
			<?php echo $this->Html->link('View', array('action' => 'view', $tradition['Tradition']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $tradition['Tradition']['id']), array('class' => 'btn btn-mini')); ?>
		</td>
		<td><?php echo h($tradition['Tradition']['id']); ?></td>
		<td><?php echo h($tradition['Tradition']['name']); ?></td>
		<td><?php echo h($tradition['Tradition']['slug']); ?></td>
		<td><?php echo h($tradition['Tradition']['countries']); ?></td>
		<td><div class="limit"><?php echo ($tradition['Tradition']['summary']); ?></div></td>
		<td><?php //echo h($tradition['Tradition']['article']); ?></td>
		<td><?php echo h($tradition['Tradition']['created']); ?></td>
		<td><?php echo h($tradition['Tradition']['modified']); ?></td>
		
	</tr>
	<?php endforeach; ?>
</table>

<br />
<br />

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />
<br />

<h3>Actions</h3>

<?php echo $this->Html->link('New Tradition', array('action' => 'add'), array('class' => 'btn')); ?>

<br />
<br />
