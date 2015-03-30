<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $title_for_layout; ?></title>
<?php echo $this->Html->css(array('bootstrap.css')); ?>
<?php echo $this->Html->css(array('vendor.css')); ?>

<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<!--<link href="http://fonts.googleapis.com/css?family=Mako" rel="stylesheet" type="text/css">-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<?php echo $this->Html->script(array('bootstrap.min.js', 'vendor.js')); ?>
<?php echo $this->fetch('css'); ?>
<?php echo $this->fetch('script'); ?>

<!------ CSS for Brands ------>    
<style>
.btn-gb {
	
	<?php echo $user['User']['awning_css']; ?>
}
</style>    

</head>
<body>

	<div class="navbar navbar-static-top">
		<div class="navbar-inner">
			<div class="container-fluid">

			<a class="brand" href="/vendor/">GB VENDOR</a>

			<div class="nav-collapse">
				<ul class="nav">
					<li><?php echo $this->Html->link('Products', array('controller' => 'products', 'action' => 'index', 'vendor' => true)); ?></li>
					<li><?php echo $this->Html->link('Orders', '#'); ?></li>
					<li><?php echo $this->Html->link('Profile View', array('controller' => 'users', 'action' => 'profile', 'vendor' => true)); ?></li>
					<li><?php echo $this->Html->link('Profile Edit', array('controller' => 'users', 'action' => 'edit', 'vendor' => true)); ?></li>
				</ul>
			</div>

			<div class="btn-group pull-right">
				<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
				<i class="icon-user"></i> <?php echo $authUser['name']; ?>
				<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
				<li class="divider"></li>
				<li><?php echo $this->Html->link('<i class=\'icon-off\'></i> Logout', array('controller' => 'users', 'action' => 'logout', 'vendor' => false), array('escape' => false)); ?></li>
				</ul>
			</div>

			</div>
		</div>
	</div>

	<div class="container-fluid content">

	<?php echo $this->Session->flash(); ?>
	<?php echo $this->fetch('content'); ?>

	<br />
	<hr>
	<br />

	<?php echo $this->element('sql_dump'); ?>

	<br />
	<br />

	<footer>
		<p>&copy; <?php echo date('Y'); ?> <?php echo env('HTTP_HOST'); ?></p>
	</footer>

	</div>

</body>
</html>
