			<link rel="stylesheet" type="text/css" href="css/responsive.css" />
			<?php
				$iPod = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
				$iPhone = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
				$iPad = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
				$Android= stripos($_SERVER['HTTP_USER_AGENT'],"Android");
				$webOS= stripos($_SERVER['HTTP_USER_AGENT'],"webOS");
				//do something with this information
				if( $iPod || $iPhone || $iPad || $Android ){
			 ?>
					<script type="text/javascript">
						function googleTranslateElementInit() {
						  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}, 'google_translate_element');
						}
					</script>
			<?php
				}
				else{
			?>
					<script type="text/javascript">
						function googleTranslateElementInit() {
						  new google.translate.TranslateElement({pageLanguage: 'en',layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
						}
					</script>

			<?php
				}
			?>
			<!--<script type="text/javascript">
				function googleTranslateElementInit() {
				  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
				}
				

			</script>
		-->	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>		
			<style>
					.language{float:left;height:25px !important;}
					#google_translate_element{height:25px !important;}
					.goog-te-gadget{height:25px !important;}
					.goog-te-gadget-simple{height: 25px; border:1px solid #dedede; padding:0;}
					.goog-te-gadget img {vertical-align: top !important;}
					.goog-te-gadget-simple span{/*vertical-align: top !important;*/ font-size: 11px;}
					.goog-te-menu-value{/*margin-top:-70px!important;*/padding-left:5px;float:right; margin:0;}
					.goog-logo-link {display:none !important;} 
					.goog-te-gadget{color: transparent !important; font-size: 0px;}
					
			</style>
			<header id="header">
<div class="container">
				<!-- Logo -->
				<a id="logoid" href="index.php"><img name="logoid" src="images/ahologo.png"></a>
				
				<!-- Nav -->
				
                    <nav id="nav">
						<ul>
						      <li><a href="index.php">Home</a></li>
						      <li><a href="about.php">About</a></li>

						      <li><a href="#" onclick="scroll_me()">How it works</a></li>
						      <li class="red_btn"><a href="closest_agent.php">Find closest agent</a></li>
						      <li><div class="language"><div id="google_translate_element"></div></div></li>
						      
						      <?php
						      	$pageURL = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
						      	$parsed = parse_url($pageURL);
								$path = $parsed['path'];
								$path_parts = explode('/', $path);
								$url_notallow = $path_parts[1];
								if($url_notallow != "sell.php" && $url_notallow != "buy.php" && $url_notallow != "rental_properties.php"){
						      ?>
						      <li class="blue_btn"><a href="admin/index.php?Page=Registration">Agents Register</a></li>
						      <li ><a href="admin/index.php?Page=Login">Login</a></li>
						      <?php
						      	}
						      ?>
						      <?php
						      	if($url_notallow != "sell.php" && $url_notallow != "buy.php" && $url_notallow != "rental_properties.php"){
						      ?>
						      		<li id="hire"><a href="http://americanhomesonline.com/admin/index.php?Page=Registration"><img src="images/hiring.png"></a></li>	
						      <?php
						  		}
						      ?>
						</ul>
					</nav> 
                  
</div>
			</header>
<script>$(window).load(function() {
// insert code here

   // code here
$('.goog-te-menu-value span:first').html("English");

});

function scroll_me(){
      
      $('html, body').animate({
	    scrollTop: $(".how-works").offset().top
      }, 300);
}
$(document).ready(function(){
//if ($('.language').length>0) {
      $('.goog-te-menu-frame').css('z-index','90000000!important');
//}
});

</script>
            
