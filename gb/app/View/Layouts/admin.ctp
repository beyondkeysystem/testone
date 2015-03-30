<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $title_for_layout; ?></title>
<?php echo $this->Html->css(array('bootstrap.css')); ?>
<?php echo $this->Html->css(array('admin.css')); ?>

<link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>


<?php echo $this->Html->script(array('bootstrap.min.js', 'admin.js')); ?>
<?php echo $this->fetch('css,http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css'); ?>
<?php echo $this->fetch('script'); ?>
</head>
<body>

	<div class="navbar navbar-inverse navbar-static-top">
		<div class="navbar-inner">
			<div class="container-fluid">

			<a class="brand" href="/admin/">GB ADMIN</a>

			<div class="nav-collapse">
				<ul class="nav">

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Users<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index', 'admin' => true)); ?></li>
							<li><?php echo $this->Html->link('Add User', array('controller' => 'users', 'action' => 'add', 'admin' => true)); ?></li>
							<li><?php echo $this->Html->link('All User Images', array('controller' => 'users', 'action' => 'images', 'admin' => true), array('target' => '_blank')); ?></li>
							<li><?php echo $this->Html->link('All User Awnings', array('controller' => 'users', 'action' => 'awnings', 'admin' => true)); ?></li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('Categories', array('controller' => 'categories', 'action' => 'index', 'admin' => true)); ?></li>
							<li><?php echo $this->Html->link('Sub Categories', array('controller' => 'subcategories', 'action' => 'index', 'admin' => true)); ?></li>
							<li><?php echo $this->Html->link('Sub Sub Categories', array('controller' => 'subsubcategories', 'action' => 'index', 'admin' => true)); ?></li>
							<li><?php echo $this->Html->link('Add Category', array('controller' => 'categories', 'action' => 'add', 'admin' => true)); ?></li>
							<li><?php echo $this->Html->link('Add Sub Category', array('controller' => 'subcategories', 'action' => 'add', 'admin' => true)); ?></li>
							<li><?php echo $this->Html->link('Add Sub Sub Category', array('controller' => 'subsubcategories', 'action' => 'add', 'admin' => true)); ?></li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Products<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('Products', array('controller' => 'products', 'action' => 'index', 'admin' => true)); ?></li>
							<li><?php echo $this->Html->link('Add Product', array('controller' => 'products', 'action' => 'add', 'admin' => true)); ?></li>
							<li><?php echo $this->Html->link('Products CSV Export', array('controller' => 'products', 'action' => 'csv', 'admin' => true)); ?></li>
						</ul>
					</li>
                    
                    
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Brands<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('Brands', array('controller' => 'brands', 'action' => 'index', 'admin' => true)); ?></li>
							<li><?php echo $this->Html->link('Add Brands', array('controller' => 'brands', 'action' => 'add', 'admin' => true)); ?></li>
						</ul>
					</li>
                    
                    
                    

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Recipes<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('Recipes', array('controller' => 'recipes', 'action' => 'index', 'admin' => true)); ?></li>
							<li><?php echo $this->Html->link('Add Recipe', array('controller' => 'recipes', 'action' => 'add', 'admin' => true)); ?></li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Articles<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('Articles', array('controller' => 'articles', 'action' => 'index', 'admin' => true)); ?></li>
							<li><?php echo $this->Html->link('Add Article', array('controller' => 'articles', 'action' => 'add', 'admin' => true)); ?></li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Notes<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('Notes', array('controller' => 'notes', 'action' => 'index', 'admin' => true)); ?></li>
                            <li><?php echo $this->Html->link('Notes to Discuss', array('controller' => 'notes', 'action' => 'discuss', 'admin' => true)); ?></li>
                            <li><?php echo $this->Html->link('Notes Addressed', array('controller' => 'notes', 'action' => 'addressed', 'admin' => true)); ?></li>
							<li><?php echo $this->Html->link('Add Note', array('controller' => 'notes', 'action' => 'add', 'admin' => true)); ?></li>
                            
						</ul>
					</li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Orders<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('Orders', array('controller' => 'orders', 'action' => 'index', 'admin' => true)); ?></li>
							<li><?php echo $this->Html->link('Order Users', array('controller' => 'order_users', 'action' => 'index', 'admin' => true)); ?></li>
							<li><?php echo $this->Html->link('Order Items', array('controller' => 'order_items', 'action' => 'index', 'admin' => true)); ?></li>
							<li><?php echo $this->Html->link('Order Histories', array('controller' => 'order_histories', 'action' => 'index', 'admin' => true)); ?></li>
							<li><?php echo $this->Html->link('Order Statuses', array('controller' => 'order_statuses', 'action' => 'index', 'admin' => true)); ?></li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Utils<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('Shopping Carts', array('controller' => 'carts', 'action' => 'index', 'admin' => true)); ?></li>
							<li><?php echo $this->Html->link('Traditions', array('controller' => 'traditions', 'action' => 'index', 'admin' => true)); ?></li>
							<li><?php echo $this->Html->link('US Traditions', array('controller' => 'ustraditions', 'action' => 'index', 'admin' => true)); ?></li>                           
							<li><?php echo $this->Html->link('Recipes Categories', array('controller' => 'recipescategories', 'action' => 'index', 'admin' => true)); ?></li>
							<li><?php echo $this->Html->link('Contents', array('controller' => 'contents', 'action' => 'index', 'admin' => true)); ?></li>
							<li><?php echo $this->Html->link('Blocks', array('controller' => 'blocks', 'action' => 'index', 'admin' => true)); ?></li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Visitors<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('Visitors', array('controller' => 'visitors', 'action' => 'index')); ?></li>
						</ul>
					</li>
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Vendor Tracking<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('Clients', array('controller' => 'projects', 'action' => 'index', 'admin' => true)); ?></li>
							<li><?php echo $this->Html->link('Add Client', array('controller' => 'projects', 'action' => 'add', 'admin' => true)); ?></li>
						</ul>
					</li>
					
					
					
					
					
				</ul>
			</div>

			<div class="btn-group pull-right">
				<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
				<i class="icon-user"></i> Admin
				<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
				<li><a href="/mail" target="_blank"><i class="icon-envelope"></i> Email</a></li>
				<li><a href="http://www.google.com/analytics/" target="_blank"><i class="icon-align-left"></i> Analytics</a></li>
				<li class="divider"></li>
				<li><?php echo $this->Html->link('<i class=\'icon-off\'></i> Logout', array('controller' => 'users', 'action' => 'logout', 'admin' => false), array('escape' => false)); ?></li>
				</ul>
			</div>

			</div>
		</div>
	</div>

	<div class="container-fluid content">

	<br />

	<?php echo $this->Session->flash(); ?>
	<?php echo $this->fetch('content'); ?>

	<br />
	<hr>
	<br />

	<?php //echo $this->element('sql_dump'); ?>

	<br />
	<br />

	<footer>
		<p>&copy; <?php echo date('Y'); ?> <?php echo env('HTTP_HOST'); ?></p>
	</footer>

	</div>

</body>
</html>
