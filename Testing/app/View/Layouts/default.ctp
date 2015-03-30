<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

// $cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
// $cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $this->fetch('title'); ?></title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('fe/bootstrap.min.css'); 
		echo $this->Html->css('fe/font-awesome.css');
	?>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<?php
		echo $this->Html->css('fe/animated');
		echo $this->Html->css('fe/style'); 
		echo $this->Html->css('fe/responsive'); 
		echo $this->Html->css('custome');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');		
	?>
                
	<!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
</head>
<body>
	<div id="container">
		<div class="header"  id="section-1">
			<?php echo $this->element('fe/header'); ?>
			<?php echo $this->element('fe/navbar'); ?>
                        <?php if(($this->params->controller=='home') and ($this->params->action=='index' or $this->params->action=='specification')){?>
                            <?php echo $this->element('fe/harimau_header'); ?>
                        <?php }else{?>
                            <?php echo $this->element('fe/breadcrumb'); ?>
                        <?php }?>
                        
		</div>
	
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>			
		</div>
		
		<?php echo $this->element('fe/footer'); ?>
	  
		
		<script src="/fe/js/main.js" type="text/javascript"></script>
		<script src="/fe/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="/fe/js/bootstrap-select.js" type="text/javascript"></script>
		<script src="/fe/js/jquery.nav.js" type="text/javascript"></script>
		<script src="/fe/js/wow.js" type="text/javascript"></script>
		<script src="/fe/js/animated.js" type="text/javascript"></script>
		<script src="/fe/js/jquery.parallax-1.1.3.js" type="text/javascript"></script>
		<script src="/fe/js/custom.js" type="text/javascript"></script>

	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
