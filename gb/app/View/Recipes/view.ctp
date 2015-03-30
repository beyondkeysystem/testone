<div class="row">
	<div class="span3">
 <div class="vendor-logo">
    <a href="/">
    	<?php echo $this->Html->image('users/image/' . $user['User']['image'], array('class' => 'img-polaroid','width' =>'210px')); ?>
    </a>
</div>
   
   <br />
    <h4>Our Recipes</h4>
  <br />   
		
		<?php
			echo "<br>";
			foreach($recipelist as $recipekey)
			{
				echo '<div class="recipe-button btn-gb">';
				echo '<a class="" href="http://' . $recipekey['User']['slug'] . '.' . Configure::read('Settings.DOMAIN') . '/recipe/' . $recipekey['Recipe']['slug'] . '">';
				echo $recipekey['Recipe']['name'];
				echo '</a>';
				echo "</div>";
			}
		?>
	</div>

	<div class="span6">
		<h2 class="recipe-name"><?php echo $recipe['Recipe']['name']; ?></h2>
		<!-- <? //echo $recipe['Recipe']['slug']?>-1.jpg"  /> -->
		<p class="recipe-description"> <?php echo $recipe['Recipe']['description']; ?> </p>
		<h4>Ingredients</h4>
		
			<?php echo $recipe['Recipe']['ingredients']; ?>
		<br />
		<h4>Directions</h4>
		<p><?php echo $recipe['Recipe']['preparation']; ?></p>
		<br />
        <h4>Comments</h4>
        <p><?php echo $recipe['Recipe']['comment']; ?></p>
		<br />
        <h4>Tags</h4>
         <p><?php echo $recipe['Recipe']['tags']; ?></p>
		
		<br />
        <br />
        <h4>Attribution</h4>
         <p><?php echo $recipe['Recipe']['attribution']; ?></p>
	</div>

	<div class="span3">
		<img class="recipe-pic border" src="/img/recipes/image_1/<? echo $recipe['Recipe']['image_1']?>"  />
		<br />
		<br />
		<?php if(!empty($recipe['Recipe']['image_2'])) : ?>
			<img class="recipe-pic border" src="/img/recipes/image_2/<? echo $recipe['Recipe']['image_2'] ?>" />
		<?php endif ; ?>
		<!--<?php //echo $this->Html->image('/img/recipes/thumb-' . $recipe['Recipe']['slug'] . '-2.jpg'); ?>-->
		<br />
		<?php if(!empty($recipe['Recipe']['image_3'])) : ?>
			<img class="recipe-pic border" src="/img/recipes/image_3/<? echo $recipe['Recipe']['image_3']?>"  />
		<?php endif ; ?>
		<br />
		
	</div>

</div>

