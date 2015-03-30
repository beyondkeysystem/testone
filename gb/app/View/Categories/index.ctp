<h3 class="cat-title">Welcome to our Well Stocked Pantry, filled with the finest culinary treasures from far and wide. Click to start exploring.</h3>



<div id="pantry-container">
	<div id="left-door-inside"></div>
	<div id="left-door-outside"></div>


	<div id="right-door-inside"></div>
	<div id="right-door-outside"></div>

	<div class="well-stocked-pantry">The Well Stocked Pantry</div>

	<div class="row pantry-row">

	<?php
	$i = 0;
	foreach ($categories as $category):
	$i++;
	?>
		<div class="span2 pantry">
			<?php echo $this->Html->image('categories/image/' . $category['Category']['image'], array('class' => 'img-pantry', 'url' => array('controller' => 'categories', 'action' => 'view', $category['Category']['slug']))); ?><br />
			<div class="cat-name"><?php echo $this->Html->link($category['Category']['name'], array('action' => 'view', $category['Category']['slug'])); ?></div>
			<br />
		</div>

	<?php if (($i % 7) == 0) : ?>
	</div>
	<div class="row pantry-row">">
	<?php endif; ?>

	<?php endforeach; ?>

	</div>

	<br />
	<br />

</div>
