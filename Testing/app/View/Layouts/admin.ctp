<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) CIS India 
 * @link          http://cisin.com CakePHP(tm) Project
 * @package       custom pakage
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
<head>


    	<?php echo $this->Html->charset(); 
		echo $this->Html->meta('icon');	
		
        echo $this->fetch('meta');
	  	echo $this->fetch('css');
	  	echo $this->fetch('script');  
        ?>
        <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script> <script src="//code.jquery.com/jquery.min.js"></script>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>        
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" /> 
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script> -->
        
       

        <?
            // echo $this->Html->css('bootstrap-datetimepicker'); 
            echo $this->Html->css('jquery-ui'); 
            echo $this->Html->script('jquery-1.10.2');
            echo $this->Html->script('jquery-ui');
            echo $this->Html->css('font-awesome'); 
            echo $this->Html->css('style'); 
            echo $this->Html->css('stylesheet'); 
            echo $this->Html->css('summernote');
            echo $this->Html->css('admin_custom'); 
        ?>
        
        <?php
            echo $this->Html->script('datepicker/foundation-datepicker');
            echo $this->Html->css('datepicker/foundation-datepicker');
        ?>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">     


<title><?php echo $this->fetch('title'); ?></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
</head>
<body>
<div id="container">
<?php echo $this->element('header'); ?>
<!-- left sidebar  -->
<?php echo $this->element('sidebar'); ?>
<!-- left sidebar  -->

<div id="content">        
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>    
</div>
    <footer id="footer">
        CIS India
    </footer>
    

    <?php
            /*echo $this->Html->script('jquery-2');*/
            echo $this->Html->script('custom.js');               
            echo $this->Html->script('bootstrap');
            echo $this->Html->script('less-1');
            echo $this->Html->script('summernote');
            echo $this->Html->script('moment');
            echo $this->Html->script('common');
    ?>

        
</div>
</body>
</html>
