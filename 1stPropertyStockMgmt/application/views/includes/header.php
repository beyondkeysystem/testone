<!DOCTYPE html> 
<html lang="en-US">
<head>
  <title>Myviko Admin Panel</title>
  <meta charset="utf-8">
  <link href="<?php echo base_url(); ?>assets/css/admin/global.css" rel="stylesheet" type="text/css">
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/font-awesome.min.css">
	   <!-- Le styles -->
        
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!--[if IE 7]>
        <link rel="stylesheet" href="css/font-awesome-ie7.min.css">
        <![endif]-->
      <!--  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.css">-->
       
	<?php
        	/*Code Specific for Ticket section */
        $url = uri_string();
		//echo "<br/><br/><br/><br/><br/>".$url;
        if($url == "admin/tickets" || $url == "admin/tickets/index/answered" || $url == "admin/tickets/index/closed" || $url == "admin/tickets/index/open" || $url == "admin/tickets/index/customer reply" ||  $url == "admin/tickets/index/in progress"){
        ?>
			 <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
			 <!--<link rel="stylesheet" href="<?php echo base_url(); ?>css/theme.bootstrap.css"> -->
			<script src="<?php echo base_url(); ?>js/jquery.tablesorter.js"></script>
			<script src="<?php echo base_url(); ?>js/jquery.tablesorter.widgets.js"></script>
			<script src="<?php echo base_url(); ?>js/tablesorter1.js"></script>
			<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.tablesorter.pager.css">
			<script src="<?php echo base_url(); ?>js/jquery.tablesorter.pager.js"></script>
        <?php
        	}
        ?>
        <link href="<?php echo base_url(); ?>css/bootstrap-responsive.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/select2.css">
        <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>js/jquery-1.8.3.min.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
		<link href="<?php echo base_url(); ?>assets/css/admin/global.css" rel="stylesheet" type="text/css">

    <script>
		/* jQuery( document ).ready(function() {
			   jQuery(".property_initial_price").one('keypress', function () {

    	    	jQuery(".property_initial_price").val('$');

        });
   
	    jQuery(".property_current_price").one('keypress', function () {

            jQuery(".property_current_price").val('$');

        });
    

     });*/
  </script>

</head>
<body>
	<div class="navbar navbar-fixed-top">
	  <div class="navbar-inner">
	    <div class="container">
	      <a class="brand">MyVikoHome</a>
	      <ul class="nav">
	      	<li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">General <b class="caret"></b></a>
                <ul class="dropdown-menu">
                      <li><a href="<?php echo base_url(); ?>admin/roles">Role Updates</a></li>
                      <li><a href="<?php echo base_url(); ?>admin/news">News Updates</a></li>
                      <li><a href="<?php echo base_url(); ?>admin/property_type">Property Types</a></li>
                      <li><a href="<?php echo base_url(); ?>admin/transaction_fees">Transaction Fees</a></li>
                </ul>
            </li>
            
            <li <?php if($this->uri->segment(2) == 'property'){echo 'class="active"';}?>>
	        	<a href="<?php echo base_url(); ?>admin/property">Property</a>
	        </li>
	        <!-- <li <?php if($this->uri->segment(2) == 'user'){echo 'class="active"';}?>>
	        	<a href="<?php echo base_url(); ?>admin/user">User</a>
	        </li> -->
			<li class="dropdown">
	            <a data-toggle="dropdown" class="dropdown-toggle" href="#">User <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li <?php if($this->uri->segment(2) == 'user'){echo 'class="active"';}?>>
			        	<a href="<?php echo base_url(); ?>admin/user">Active User</a>
			        </li>
                    <li>
                    	<a href="<?php echo base_url(); ?>admin/pending_user">Pending User</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">Transaction (<span id="notification_total">0</span>) <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>transaction/pending_deposit">Pending Deposit Request (<span id="notification_pending_deposit"><?=$this->session->userdata('notification_pending_deposit')?></span>) </a></li>
                    <li><a href="<?php echo base_url(); ?>transaction/pending_withdraw">Pending Withdraw Request (<span id="notification_pending_withraw"><?=$this->session->userdata('notification_pending_withraw')?></span>) </a></li>
                    <li><a href="<?php echo base_url(); ?>transaction/success_deposit">Successful Deposit</a></li>
                    <li><a href="<?php echo base_url(); ?>transaction/success_withdraw">Successful Withdraw</a></li>
                    <li><a href="<?php echo base_url(); ?>transaction/fundlog">User Transaction Logs</a></li>
                    <li><a href="<?php echo base_url(); ?>transaction/transaction_autotrack_log">Transaction Autotrack Logs</a></li>
                </ul>
	       </li>
	        
            
	<!--	<li <?php if($this->uri->segment(2) == 'credit_price'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/credit_price">Credit Price</a>
	        </li>-->
			<li <?php if($this->uri->segment(2) == 'user_credit'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/user_credit">User Fund</a>
	        </li>
			<!-- <li <?php if($this->uri->segment(2) == 'share_limit'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/share_limit">User Share Limit</a>
	        </li> -->
		    
		 <!--  <li <?php if($this->uri->segment(2) == 'roles'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/roles">Roles</a>
	        </li>-->
		<!--  <li <?php if($this->uri->segment(2) == 'user_property'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/user_property">User Property</a>
	        </li>-->
	        <!-- by Mayank Pawar
			** Date: 26.11.14
	         -->
	        
	        <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">Profit and Loss <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>admin/profit_and_loss_logs">Profit and Loss Records</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/profit_and_loss_fund_manage">Manage Profit/Loss Fund </a></li>
                </ul>
	       </li>
	        <!-- <li class="dropdown">
	          <a data-toggle="dropdown" class="dropdown-toggle" href="#">Profit and Loss Logs <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	             <li>
				    <a href="<?php echo base_url(); ?>admin/profit_and_loss_logs">Profit and Loss Allotment</a>
				</li>
				 <li>
				    <a href="<?php echo base_url(); ?>admin/profit_and_loss_fund_manage">Profit and Loss Fund Management</a>
				</li>
			 -->	
				<!-- <li>
				    <a href="<?php echo base_url(); ?>index.php/admin/departments">Tickets Departments</a>
				</li>-->
	          <!-- </ul> -->
<!--	        </li>
		 <li <?php if($this->uri->segment(2) == 'property_type'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/property_type">Property type</a>
	        </li>-->
		
		
			<!-- <li <?php if($this->uri->segment(2) == 'userinvestment'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/userinvestment">Real Estate Investment</a>
	        </li> -->
		
	<!--	Code By Me Start-->
		
		<!-- <li class="dropdown">
	          <a data-toggle="dropdown" class="dropdown-toggle" href="#">Withdraw <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	             <li>
		    <a href="<?php echo base_url(); ?>admin/withdraw">Withdraw Request</a>
		</li>
		 <li>
		    <a href="<?php echo base_url(); ?>admin/withdrawadmin">Withdraw Admin (30 days refund)</a> <!--Mayank Pawar Date 26.11.14-->
		<!-- </li> -->
		
		<!-- <li>
		    <a href="<?php echo base_url(); ?>index.php/admin/departments">Tickets Departments</a>
		</li>-->
	    <!--       </ul>
	        </li>
		 -->
		<!--Code By Me End-->
	
		<li class="dropdown">
	          <a data-toggle="dropdown" class="dropdown-toggle" href="#">Tickets (<span><?=$this->session->userdata('notification_open_ticket')?></span>) <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	             <li>
		    <a href="<?php echo base_url(); ?>index.php/admin/index">Tickets Home</a>
		</li>
		 <li>
		    <a href="<?php echo base_url(); ?>index.php/admin/tickets">Tickets</a>
		</li>
	      
	      
		<li>
		    <a href="<?php echo base_url(); ?>index.php/admin/settings">Tickets Settings</a>
		</li>
		
		<!-- <li>
		    <a href="<?php echo base_url(); ?>index.php/admin/departments">Tickets Departments</a>
		</li>-->
	          </ul>
	        </li>
	       </li>
		    <li <?php if($this->uri->segment(2) == 'logout'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/logout">Logout</a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</div>	

<script>
var val1 = $("#notification_pending_deposit").text();
var val2 = $("#notification_pending_withraw").text();
var total = parseInt(val1)+parseInt(val2);
$("#notification_total").text(total);
</script>