<?php
session_start();
require_once("../../classes/db_class.php");
$obj_Db = new db();
      
$sql= "select * from users";
$result = $obj_Db->ExecuteQuery($sql);
$numrows = mysql_num_rows($result);
//mysql_fetch_object($result);
$i=0;
 while($rows = mysql_fetch_assoc($result)){
   $row['id'][$i] = $rows['id'];
   $row['name'][$i] = $rows['name'];
   $row['email'][$i] = $rows['email'];
   $i++;
 }
 
/*echo "<pre>";
print_r($row);
exit;*/
//echo '<pre>';
//print_r($_SESSION);
$ure = explode('/chat' , $_SERVER['REQUEST_URI']);
$cookie_name='pun_cookie_d957a7';

if(isset($_COOKIE['CakeCookie'][$cookie_name])){
   $matches = explode("|",$_COOKIE['CakeCookie'][$cookie_name]);
   $fluxuser_id = $matches[0];


require_once dirname(__FILE__)."/../src/phpfreechat.class.php";
$params["serverid"] = md5(__FILE__); // calculate a unique id for this chat
//echo "<pre>";print_r($params);exit;
$chat = new phpFreeChat($params);
$a = 'http://alpha.cisinlabs.com:81';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
       "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
   
<meta charset="UTF-8">
<title>Chat Room</title>
 	<!-- Bootstrap -->
    <link href="/../../../<?php echo $ure[0]; ?>/css/design/bootstrap.css" rel="stylesheet">
    <!--<link href="css/bootstrap-theme.css" rel="stylesheet">-->
    <link href="/../../../<?php echo $ure[0]; ?>/css/design/font-awesome.css" rel="stylesheet" type="text/css" />
     <!--[if lt IE 9]>
	<script type="text/javascript" src="/../../../<?php echo $ure[0]; ?>/js/designs/html5.js"></script>
	<![endif]-->
	    <!-- style theme -->
    <link href="/../../../<?php echo $ure[0]; ?>/css/design/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/../../../<?php echo $ure[0]; ?>/css/design/lightbox.css" media="screen" />
    <link type="text/css" rel="stylesheet" href="/../../../<?php echo $ure[0]; ?>/css/design/responsive-tabs.css" />
    <link href="/../../../<?php echo $ure[0]; ?>/css/design/responsive.css" rel="stylesheet">    
</head>

<body>
  
  <header class="header">
    <section class="top-wrap">
    <section class="container">
    <div class="row">
    <aside class="col-md-7 pull-right clearfix">
    <ul id="horizontalmenu" class="top-buttons pull-right">
      <?php if($fluxuser_id == 0){?>  
    <li class="sub-menu">    
      <a href="#"><i class="fa fa-lock"></i></a><a href="/cakejobportal/users/signup">Sign Up</a>        
    </li>
    <li>
      <a href="/cakejobportal/users/login"><i class="fa fa-power-off"></i>Log in</a>    </li>
    <?php }else{ ?>
    <li class="sub-menu">
    <a href="#"><i class="fa fa-power-off"></i></a><a href="/cakejobportal/users/logout">Logout</a>        
    </li>
    <?php }?>
    </ul>
    </aside>
	</div>
    </section>
    
    </section>
    
    <section class="container">
    <div class="row search">
    <aside class="col-sm-6 brand">
    <a><img src="/../../../<?php echo $ure[0]; ?>/css/images/logo.png" alt="" /></a>
    </aside>
    <aside class="col-sm-6">
    <div class="search-box"> 
    <form class="form-search">
    <input type="text" placeholder="What are you looking for?" />
    <button type="submit" class="btn"><i class="fa fa-search"></i>Search</button>
    </form>
    </div>
    </aside>
    </div>
    </section>
    
    <section  class="nav-wrap">
      <div class="container">
      <div class="row">
      <!-- Start: Navigation wrapper -->
      
      <nav role="navigation" class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?=$a?><?php echo $ure[0]; ?>/">Home</a></li>
            <li><a href="#">Daily Deals</a></li>
            <li><a href="#">Help / Report Abuse</a></li>
            <li><a href="#">Knowledge Room</a></li>
            <li><a href="<?=$a?><?php echo $ure[0]; ?>/employer/profile/">Employer</a></li>
            <li><a href="<?=$a?><?php echo $ure[0]; ?>/candidate/candidate_profile/">Candidates</a></li>
            <li><a href="<?=$a?><?php echo $ure[0]; ?>/contact/">Contact Us</a></li>
          </ul>
          
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
      
      </div>
    </div>
    </section>
    </header>
    
    <section class="container container_1">
    <div class="row">
    <div class="MainContent">
<div class="main_ctnr_middle main_left">
        <section class="profile_main"> 
						
  
    <?php $chat->printChat(); ?>
</section>
</div> 
 <div class="Sidebar-Right">
        <div class="box right-box">
          <img src="/../../../<?php echo $ure[0]; ?>/css/images/pic-ads1.jpg" alt="" />
        </div>
        <!--<div class="box right-box">
          <img alt="" src="/../../../<?php echo $ure[0]; ?>/css/images/pic-ads1.jpg">
        </div>-->
        <div class="box right-box">
          <img src="/../../../<?php echo $ure[0]; ?>/css/images/pic-ads2.jpg" alt="" />
        </div>
      </div>
 <div class="clearfix"></div>
    </div>
  </div>
</section>
<?php
  // print the current file
  //echo "<h2>The source code</h2>";
  //$filename = __FILE__;
 // echo "<p><code>".$filename."</code></p>";
 // echo "<pre style=\"margin: 0 50px 0 50px; padding: 10px; background-color: #DDD;\">";
  //$content = file_get_contents($filename);
  //highlight_string($content);
 // echo "</pre>";
?>
    <footer class="footer">
    <div class="container">
    <div class="row">
    <aside class="col-sm-3">
    <h3>Features</h3>
    <ul>
    <li><a href="#">Home</a></li>
	<li><a href="#">About us</a></li>
    <li><a href="#">Why us</a></li>
    <li><a href="#">Blog</a></li>
    <li><a href="#">Training</a></li>
    <li><a href="#">Our Partners</a></li>
    <li><a href="#">Request a Speaker</a></li>
    </ul>
    </aside>   
    <aside class="col-sm-3">
    <h3>Company</h3>
    <ul>
    <li><a href="#">Get Help</a></li>
	<li><a href="#">Newsletter</a></li>
    <li><a href="#">Get Involved</a></li>
    <li><a href="#">Upcoming Events</a></li>
    <li><a href="#">Other Ways To Help</a></li>
    </ul>
    </aside>
    <aside class="col-sm-3">
    <h3>Connect</h3>
    <ul>
    <li><a href="#">Twitter</a></li>
    <li><a href="#">Facebook</a></li>
    <li><a href="#">Google+</a></li>
    <li><a href="#">Email Us</a></li>
    <li><a href="#">Insights</a></li>
    </ul>
    </aside>
    <aside class="col-sm-3">
    <h3>Share</h3>
    <ul class="share">
    <li><a class="twitter" href="#"><i class="fa  fa-twitter"></i>Tweet</a></li>
	<li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i>Share</a></li>
    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i>Share</a></li>
    <li><a class="google" href="#"><i class="fa fa-google-plus"></i>plus 1</a></li>
    </ul>
    </aside> 
    </div>
    <div class="copyright">
    <p class="pull-left">Copyright© 2014 RecruitYoung  |  All Right Reserved </p>
    <div class="pull-right">
    <ul class="foot-links">
    <li><a href="#">Contact</a></li>
    <li><a href="#">Terms of uses</a></li>
    <li><a href="#">Privacy Policy</a></li>
    </ul>
    </div>
    <div class="clearfix"></div>
    </div>
    </div>
    </footer>
    

<?php echo $ure[0]; ?>    <script type="text/javascript" src="/../../../<?php echo $ure[0]; ?>/js/design/bootstrap.js"></script>


    <script type="text/javascript" src="/../../../<?php echo $ure[0]; ?>/js/design/jquery.responsiveTabs.js"></script>
    <script type="text/javascript" src="/../../../<?php echo $ure[0]; ?>/js/design/respond.min.js"></script>
    <script type="text/javascript" src="/../../../<?php echo $ure[0]; ?>/js/design/respond.src.js"></script>

</body>
</html>
<?php
}
else{
   $fluxuser_id=0;
   header('Location: http://alpha.cisinlabs.com:81/cakejobportal/users/login');
}
?>
