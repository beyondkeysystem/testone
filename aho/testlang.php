<!DOCTYPE HTML>
<html>
   <head>
      <title>American Homes Online</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <meta name="description" content="" />
      <meta name="keywords" content="" />

      <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
      <script src="js/jquery.min.js"></script>
      <script type="text/javascript">
	 $(window).load(function() {
		 if ($(this).width() < 850)
		 {
			 $('input[type="submit"]').val('Go');
			 $('#logoid').attr('src', 'images/ahologosmall.png');
		 }
	 });
      </script>
      <script src="js/jquery.poptrox.min.js"></script>
      <script src="js/skel.min.js"></script>
      <script src="js/init.js"></script>
      <noscript>
	 <link rel="stylesheet" href="css/skel-noscript.css" />
	 <link rel="stylesheet" href="css/style.css" />
      </noscript>
      <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->

      <style>
	 <?php
	    error_reporting(0);
	    $images = array("house1.jpg", "house4.jpg", "house3.jpg", "house4.jpg", "house5.jpg");
	    $rand = array_rand($images);
	 ?>
	 #intro {
	    background:url('images/<?php print $images[$rand] ?>');
	    /*background-size:100%;*/
	    background-attachment:fixed;
	    /*background-position:bottom center; */
	    background-position:center center;
	    background-repeat:no-repeat;
	    background-size:cover;
	 }
	 #AHO-Remote-Load a { color: #000; }
	 .black_cover{background-color: rgb(0, 0, 0);height: 100%;opacity: 0.8;position: absolute;width: 100%;z-index: 1;}
	 .success_message{
	    color: rgb(0, 0, 0);
	    font-size: 20px;
	    font-weight: bold;
	    text-align: center;
	    background-color: #ffffff;
	    box-shadow: 2px 5px 3px rgb(119, 119, 119); 
	    z-index: 1;
	    text-align: justify;
	    border-radius: 1px;
	    padding-bottom:10px;
	 } 
	 .error_message{
	   color: rgb(0, 0, 0);
	    font-size: 20px;
	    font-weight: bold;
	    text-align: center;
	    background-color: #ffffff;
	    box-shadow: 2px 5px 3px rgb(119, 119, 119); 
	    z-index: 1;
	    text-align: justify;
	    border-radius: 1px;
	    padding-bottom:10px;
	 }
	 .messageheading{
	    background-clip: border-box;
	    background-color: rgba(0, 0, 0, 0);
	    background-image: linear-gradient(to bottom, rgb(81, 157, 198) 0%, rgb(103, 165, 198) 0%, rgb(37, 141, 200) 100%);color: rgb(255, 255, 255);padding: 5px;
	    text-align: left;
	 } 
	 .ok{
	    background-color: #ff0000;border:1px solid #000000;padding: 0px 5px 0px 5px;
	 }
	 #popup_msg{
	    position:fixed;top:50% !important;left:35%;width:30%
	 }
	 .message_content{
	    padding-bottom: 10px;
	    padding-left: 10px;
	    padding-right: 10px;
	    padding-top: 10px;
	    text-align: center;
	 }
	 .button{
	    background-color:#f63d3d;border-radius: 5px !important;line-height: 43px;width:23%;
	 }
	 .button:hover{
	    background-color:#2f90c7; border-radius: 3px;
	 }
	 
	 
      </style>
      <script>
         var highest_z_index = 0;
         function getHighestZ (){
            var $divs = $('div');
            $.each($divs,function(){
	       if (this.css('z-index') > highest_z_index){
	         highest_z_index = this.css('z-index');
	       }
	    });
	 }
	 getHighestZ();
	 $('#popup_msg').click(function(){
	    if (highest_z_index > $(this).css('z-index')){
	       $(this).css('z-index',++highest_z_index);
	    }
	 });
      </script>
   </head>
   <body >
      <?php
	 if($_REQUEST['success']!="" || $_REQUEST['RequestMessage']!=""){
	    echo'<div class="black_cover">&nbsp;</div>';
	 }  
      ?>
      <!-- Header -->
      <?php include('headertestlang.php'); ?>
      <!-- Intro -->
      <section id="intro" class="main style1 dark fullscreen">
         <div class="content container small" style="opacity: 1;">
	    <?php
	    if($_REQUEST['address']!='') {	?>
	       <div> 
		  <script src="http://code.jquery.com/jquery-1.10.2.js"></script> 
		  <script id='AHO-JS' src="aho/aho.js?APP_ID=1"></script>
		  <div id='AHO-Remote-Load' style='color:#000'></div>
	       </div>
	       <?php
	    }
	    else {
	       ?>
	       <div id="buy" style="display: inline;" class="formswap">
		  <h2 style="font-size: 40px;">100% Reliable Property Data & Services !</h2>
		  <div class="homeform">
		     <form>
			<div class="search_btns">
			   <a href="http://americanhomesonline.com/buy.php" class='button '>Buy</a>
			   <a href="http://americanhomesonline.com/rental_properties.php" class='button '>Rent</a>
			   <a href="http://americanhomesonline.com/sell.php" class='button '>Sell</a>
			</div>
			<div class="clear"></div>
		     </form>
		  </div>
	       </div>
	       <?php
	    }  ?>
	 </div>
      </section>
      <!-- Work -->
      <section id="work" class="main style3 primary">
         <div class="sign_up_bar">
	    <img src="images/house.png" alt="" />
	    <span>We Help Great Realtors Succeed.</span>
	    <a class="agent-sign-up" href="admin/index.php?Page=Registration" >Sign Up As An Agent</a>
	    <div id="clear"></div>
	 </div>
         <div id="clear"></div>
         <div class="content container small" >
	    <div id="subc">
	       <div id="subtitles">
		  <span class="subch1">
		     We Are <br>Professionals!
		  </span>
	       </div>
	       <div id="subcimg"><img src="images/user.png"></div>
	       <div id="subctxt">
		  <b>ONLY</b> local agents can provide accurate data on "ALL" properties. Get the professional guidance you deserve!
	       </div>
	    </div>
	    <div id="subc">
	       <div id="subtitles">
		  <span class="subch1">We Are <br>Your Neighbors!</span>
	       </div>
	       <div id="subcimg"><img src="images/chat.png"></div>
	       <div id="subctxt">
		  Since our agents live in the neighborhood, they have little travel time and can show you the property on a moment's notice.
	       </div>
	    </div>
	    <div id="subc">
	       <div id="subtitles"><span class="subch1">We Live <br>in Your Community</span></div>
	       <div id="subcimg"><img src="images/communities.png"></div>
	       <div id="subctxt">Your Local agent will provide you with the most accurate information about the community &amp; neighborhood.</div>
	    </div>
	    <div id="clear"></div>
	    <br>
	 </div>
      </section>
      <?php include("how_it_works.php");?>
      <section id="work2" class="main style3 primary bg">
	 <div class="content container small" >
	    <div id="subc">
	       <div id="subcimg"><img src="images/sellers.png"></div>
	       <div id="subctxt">
		  <span class="subch1">
		      <b>Sellers</b>
		  </span>
		  Insert your full home address and receive 100% accurate sold properties, similar to <a href="#" class="yourlink">your</a> property from our local <strong>"Personal Intelligent Agents"</strong>.
	       </div>
	    </div>
	    <div id="subc">
	       <div id="subcimg"><img src="images/buyersrenters.png"></div>
	       <div id="subctxt">
		  <span class="subch1">
		     <b>Buyers/Renters</b>
		  </span>
		  Fill out the form and receive 100% accurate properties, based on your requirements from the closest <strong>"Personal Intelligent Agents"</strong>.
	       </div>
	    </div>
	    <div id="subc">
	       <div id="subcimg"><img src="images/family.png"></div>
	       <div id="subctxt">
		   <span class="subch1">
		      <b>The Right Agent</b>
		   </span>
		   Every time you select an area of preference you are offered services by experts of the community.  Make your choice the best choice. Call us today!
	       </div>
	    </div>
	 </div>
      </section>
      <?php
      if(isset($_REQUEST['RequestMessage']) && $_REQUEST['RequestMessage']==1) {
	    ?>
	    <div class="success_message" id="popup_msg">
	       <div class="messageheading" >Success Message</div>
	       <p class="message_content">Please check your email and click <b><font  style="color:#ff0000"><u>link</u></font></b> to confirm you are not a robot.<br>(Check Spam If You Do Not Receive Email)</p>
	       <center><a href="http://www.americanhomesonline.com" class="ok" >Ok</a></center>
	    </div>
	    <?php
      }
      else if(isset($_REQUEST['RequestMessage']) && $_REQUEST['RequestMessage']==0){
	    ?>
	    
	    <div class="error_message" id="popup_msg">
	       <div class="messageheading">Error Message</div>
	       <p class="message_content">Request Registration Failed. Please Try Again Later.</p>
	       <center><a href="http://www.americanhomesonline.com" class="ok" >Ok</a></center>
	    </div>
	    <?php
      }
      else if(isset($_REQUEST['success']) && $_REQUEST['success']==1) {
	    ?>
	    
	    <div class="success_message" id="popup_msg">
	       <div class="messageheading">Success Message</div>
	       <p class="message_content">Your Request has been registered successfully.<br>You will receive 100% accurate listings and service from one of our local agents.</p>
	       <center><a href="http://www.americanhomesonline.com" class="ok"  >Ok</a></center>
	    </div>
	    <?php
      }
      else if(isset($_REQUEST['success']) && $_REQUEST['success']==0){
	    ?>
	    <div class="error_message" id="popup_msg">
	       <div class="messageheading">Error Message</div>
	       <p class="message_content">Request Registration Failed. Please Try Again Later.</p>
	       <center><a href="http://www.americanhomesonline.com" class="ok"  >Ok</a></center>
	    </div>
	    <?php
      }
      else if(isset($_REQUEST['success']) && $_REQUEST['success']==2){ 
	    ?>
	    <div class="error_message" id="popup_msg">
	       <div class="messageheading">Attention</div>
	       <p class="message_content">You have already registered for this lead!</p>
	       <center><a href="http://www.americanhomesonline.com" class="ok"  >Ok</a></center>
	    </div>
	    <?php
      }
      ?>
      <?php include('footer.php'); ?>
   </body>
</html>
