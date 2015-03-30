<div id="upper">
	<div class="ticker-wrap">

		<!-- <marquee loop="3" behavior="slide" direction="left" width="1400"><h2>START Lorem ipsum dolor sit amet END</h2></marquee> -->

		<ul id="ticker01">
			<li><img src="img/homepage/ticker/international.png" width="1366" height="52" alt=""/></li>
			<li><img src="img/homepage/ticker/regional.png"  width="1543" height="52" alt=""/></li>
			<li><img src="img/homepage/ticker/chefs-tips.png"  width="1021" height="52" alt=""/></li>
			<li><img src="img/homepage/ticker/recipes.png"  width="909" height="52" alt=""/></li>
			<li><img src="img/homepage/ticker/articles.png"  width="1021" height="52" alt=""/></li>
			<li><img src="img/homepage/ticker/pairings.png"  width="975" height="52" alt=""/></li>
		</ul>
	</div>

	<div id="upper-content">
		<div id="headlines" class="row">
			<div class="headline-1 span6">
				<div> <a href=""> Gift Assortments & Baskets </a>
					</h2>
				</div>
			</div>

			<div class="headline-2 span6">
				<div>
					<h2> <a href="http://gourmetdev.com/blog/2012/07/11/beverage-trends-2012"> News on Trends! </a> </h2>
				</div>
				<div></div>
			</div>

			<div class="headline-3 span6">
				<div>
					<h2> <a href=""> Tips from Chefs! </a> </h2>
				</div>
			</div>

			<div class="headline-4 span6">
				<div>
					<h2> <a href=""> Pairing Ideas! </a> </h2>
				</div>
			</div>

			<div class="front-page-pic-link"> <img src="/img/homepage/lil-star.png" width="36" height= "23" style="float:left" />
				<div class="pic-link-title"><a href="">Sriracha Flying Rooster Chocolate Truffles - $9.85-$24.95</a></div>
				<img src="/img/homepage/lil-star.png" width="36" height="23" style="float:left" />
				<div class="shop-now submit_button" ><a href="">SHOP NOW</a></div>
			</div>

		</div>
	</div>

</div>

<div id="lower">
	<!--<div id="star-band"></div>
-->
	<div id="myCarousel" class="carousel slide">

		<div class="carousel-inner">
		<?php $active = 'active'; ?>
		<?php foreach($contents as $content) : ?>

			<div class="item <?php echo $active; ?>">

				<?php echo $this->Html->image('homepage/' . $content['Content']['image']); ?>

				<div class="carousel-caption">
					<h1><?php echo $this->Html->link($content['Content']['name'], $content['Content']['link']); ?></h1>
					<?php echo $content['Content']['body']; ?>
					<br />

				</div>
			</div>
		<?php $active = ''; ?>
		<?php endforeach; ?>

		</div>

		<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
	</div>



	<?php //debug($blocks); ?>

	<div class="row-fluid">
  

		<?php
		$i = 0;
		foreach($blocks as $block) :
		$i++;
		//if (($i % 4) == 0) { echo "\n<div class=\"row\">\n\n";}
		?>

		<div class="span4 gb-box-front">

		
			<div class="img-box">
				<?php echo $this->Html->image('homepage/' . $block['Block']['image']); ?>
				
				<strong><?php echo $block['Block']['name']; ?></strong>
				
				<?php echo $block['Block']['subtitle']; ?>
			</div>


		</div>

		<?php if (($i % 3) == 0) { echo "</div>\n\n\t\t<div class=\"row-fluid\">\n\n";} ?>

		<?php endforeach; ?>

	</div>

</div>
