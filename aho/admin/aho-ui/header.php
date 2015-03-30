<!DOCTYPE HTML>
<html>
      <head>
	    <title>AHO - Agent Management</title>
	    <script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-40391912-1', 'auto');
		  ga('send', 'pageview');

		</script>
		
	    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	    <meta name="description" content="" />
	    <meta name="keywords" content="" />
	    <!--<meta name="google-translate-customization" content="9875324f121f3c97-37a2a8541064224b-g87497cbd56fd9527-c"></meta>-->
	    <!--[if lte IE 8]><script src="../css/ie/html5shiv.js"></script><![endif]-->
	    <script src="../js/jquery.min.js"></script>
	    <script src="../js/jquery.poptrox.min.js"></script>
	    <script src="../js/skel.min.js"></script>
	    <script src="../js/init.js"></script>
	    <noscript>
		    <link rel="stylesheet" href="../css/skel-noscript.css" />
		    <link rel="stylesheet" href="../css/style.css" />		    
	    </noscript>
<link rel="stylesheet" type="text/css" href="../css/responsive.css" />
	    <!--[if lte IE 8]><link rel="stylesheet" href="../css/ie/v8.css" /><![endif]-->
	    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600" rel="stylesheet" type="text/css" />
	    
	    <!-- Add fancyBox -->
	    <link rel="stylesheet" href="extra/js/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	    <script type="text/javascript" src="extra/js/jquery.fancybox.pack.js?v=2.1.5"></script>
	    <script type="text/javascript" src="extra/js/jquery.fancybox-media.js?v=1.0.6"></script>

	    <script type="text/javascript">
		  $(document).ready(function() {
			  $(".various").fancybox({
				  maxWidth	: 800,
				  maxHeight	: 600,
				  fitToView	: false,
				  width		: '70%',
				  height		: '70%',
				  autoSize	: false,
				  closeClick	: false,
				  openEffect	: 'none',
				  closeEffect	: 'none'
			  });
		  });
		  
		  $(document).ready(function() {
			  $(".fancybox").fancybox({
				  openEffect	: 'none',
				  closeEffect	: 'none'
			  });
		  });
	    </script>
      </head>
      <body >
	    <header id="header">
		  <div class="container">
			<a id="logoid" href="http://americanhomesonline.com/"><img width="inherit" height="inherit" src="../images/ahologo.png" name="logoid" title=""></a>
		      <!-- Nav -->
			<nav id="nav">
			      <?php 

			      $sql = "SELECT * FROM AHO_User WHERE id = '$User_ID' ";
			      $sql_result = mysql_query($sql);
			      $row = mysql_fetch_array($sql_result);
		      	      $User_Name = $row["Name"];
			
			      ?>
			      <ul>
				    <?php
				    if($Check_Admin == 1){
				    
				    ?>
					  <li><span style="color:#53abe0;">Welcome: <?php print $User_Name ?></span></li>
				    <?php
				    }
				    ?>
				    <!--<li><a href="http://americanhomesonline.com/">AHO Site</a></li>-->
				    <?php
				    
				    if($Check_Admin == 1){
				    
				    ?>
					  <li><a href="?Page=Accounts">Accounts</a></li>
				    <?php
					  if($Broker == 1){
					  ?>
						<li><a href="?Agents=">Agents</a></li>
					  <?php
					  }
					  ?>
						<!-----------starts here-------------->
					  <?php
					  
					  if($type == 1){
					   ?>
      
						<!--<li><a href="?Page=brokers">Brokers</a></li>-->
						<li><a href="?Page=Accounts&ID=<?php echo $User_ID;?>">Edit Profile</a></li>
						<li><a href="?Page=AllAgents">Agents</a></li>
						<li><a href="?Page=Subscription">Credits</a></li>
						<li><a href="?Page=Video">Video</a></li>
						<li><a href="?Page=Consumers">Consumers</a></li>
						<li><a href="?Page=Leads">Leads</a></li>
						      <!--1-05-2014-->																		
					  <?php
					  }
					  if($type==3){
						
						$iPod = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
						$iPhone = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
						$iPad = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
						$Android= stripos($_SERVER['HTTP_USER_AGENT'],"Android");
						$webOS= stripos($_SERVER['HTTP_USER_AGENT'],"webOS");
						
						//do something with this information
						if( $iPod || $iPhone || $iPad || $Android ){
							 ?>
							 <li><a href="?Page=AgentLeadsMobile">Agent Leads</a></li>
							 <?php
						}
						else{
							?>
							 <li><a href="?Page=AgentLeads">Agent Leads</a></li>
							<?php
						}
						
					  ?>
					  
					       
					  <?php
					  }
					  ?>
	    
					  <!------------ends here---------------->
					  <?php
				    }
				    if($Check_Admin != 1){
				    ?>
					  <li>
						<a href="http://americanhomesonline.com/admin/index.php?Page=Registration">Agents Register</a>
					  </li>
					  <li><a href="?Page=Login">Login</a></li>
					  <?php
				    }
				    else{
				    ?>
					  <li><a href="?Logout=1">Logout</a></li>
				    <?php
				    } 
				    ?>
				    <li id="hire"><a href="http://americanhomesonline.com/admin/index.php?Page=Registration"><img src="../images/hiring.png"></a></li>						
			      </ul>
			</nav>
		  </div>
	    </header>
	    <!-- Intro -->
	    <section>
		  <div class="content container small" style="color:#444;">
