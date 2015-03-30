<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts.Emails.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
	<title><?php echo $title_for_layout;?></title>

	<style type="text/css">
		body {
			width: 100% !important;
			margin: 5px;
			font-family: Verdana, Arial;
			font-size: 12px;
			color: #444444;
		}
		table {
			background-color: #FFFFFF;
			border: 0px solid #AAAAAA;
			clear: both;
			color: #333333;
			border-collapse: collapse;
			padding: 0px;
			border-spacing: 0px;
		}
		table th {
			background-color: #BBBBBB;
			border-collapse: collapse;
			padding: 2px;
			font-size: 100%;
			border: 1px solid #AAAAAA;
		}
		table td {
			background-color: #FFFFFF;
			border-collapse: collapse;
			padding: 2px;
			font-size: 100%;
			border: 1px solid #AAAAAA;
		}
	</style>

</head>
<body>
	<?php echo $this->fetch('content');?>
</body>
</html>
