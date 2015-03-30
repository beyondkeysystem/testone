<!DOCTYPE HTML>
<html>
		<head>
				<title>American Homes Online</title>
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
				<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
				<script src="js/jquery.min.js"></script>
				<script type="text/javascript">
						$(document).ready(function() {
							    $('input[type="button"]').click(function(e) {
								e.preventDefault();
								$('.button.bactive').removeClass('beactive').addClass('binactive');
								$(this).removeClass('binactive').addClass('bactive');
								if ($(this).val() == 'Sell')
								{
									$('.formswap h2').text('Sell Your Home');
								}
								else if ($(this).val() == 'Buy')
								{
									$('.formswap h2').text('Buy A Home');
								}
								else
								{
									$('.formswap h2').text('Rent A Home');	
								}
								$('#search_var').attr('name', $(this).val());
								$('#search_var').val($(this).val());
							    });
						});
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
						<?php  error_reporting(0); //, "house2.jpg"
						$images = array("house1.jpg", "house3.jpg", "house4.jpg", "house5.jpg");
						$rand = array_rand($images);
						?>
						#intro {
								background:url('images/<?php print $images[$rand] ?>');
								background-size:cover;
								background-attachment:fixed;
								background-position:top center;
								background-repeat:no-repeat;
						}
						#AHO-Remote-Load a { color: #000; }
						/*.black_cover{background-color: rgb(0, 0, 0);height: 100%;opacity: 0.8;position: absolute;width: 100%;z-index:1;}*/
	 					.black_cover{background-color: rgb(0, 0, 0);height: 100%;opacity: 0.8;position: absolute;width: 100%;z-index: 12;}

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
						} 
						.ok{
						   background-color: #ff0000;border:1px solid #000000;padding: 0px 5px 0px 5px;
						}
						#popup_msg{
						   position:fixed;top:50%;left:33%;width:34%;z-index: 1;
					        }
						.message_content{
						   padding-bottom: 10px;
						   padding-left: 10px;
						   padding-right: 10px;
						   padding-top: 10px;
						   text-align: center;
						}
						#overlay {
								position: fixed;
								top: 0;
								left: 0;
								width: 100%;
								height: 100%;
								background-color: #000;
								filter:alpha(opacity=70);
								-moz-opacity:0.7;
								-khtml-opacity: 0.7;
								opacity: 0.7;
								z-index: 100;
								display: none;
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
				<script src="http://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
				<script>
						// This example displays an address form, using the autocomplete feature
						// of the Google Places API to help users fill in the information.
						
						var placeSearch, autocomplete;
						var componentForm = {
						  street_number: 'short_name',
						  route: 'long_name',
						  locality: 'long_name',
						  administrative_area_level_1: 'short_name',
						  country: 'long_name',
						  postal_code: 'short_name'
						};
		    
						function initialize() {
						  // Create the autocomplete object, restricting the search
						  // to geographical location types.
						  autocomplete = new google.maps.places.Autocomplete(
						      /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
						      { types: ['geocode'] });
						  // When the user selects an address from the dropdown,
						  // populate the address fields in the form.
						  google.maps.event.addListener(autocomplete, 'place_changed', function() {
						    fillInAddress();
						  });
						}
		    
						// [START region_fillform]
						function fillInAddress() {
						  // Get the place details from the autocomplete object.
						  var place = autocomplete.getPlace();
						
						  for (var component in componentForm) {
						    document.getElementById(component).value = '';
						    document.getElementById(component).disabled = false;
						  }
						
						  // Get each component of the address from the place details
						  // and fill the corresponding field on the form.
						  for (var i = 0; i < place.address_components.length; i++) {
						    var addressType = place.address_components[i].types[0];
						    if (componentForm[addressType]) {
						      var val = place.address_components[i][componentForm[addressType]];
						      document.getElementById(addressType).value = val;
						    }
						  }
						}
						// [END region_fillform]
						
						// [START region_geolocation]
						// Bias the autocomplete object to the user's geographical location,
						// as supplied by the browser's 'navigator.geolocation' object.
						function geolocate() {
						  if (navigator.geolocation) {
						    navigator.geolocation.getCurrentPosition(function(position) {
						      var geolocation = new google.maps.LatLng(
							  position.coords.latitude, position.coords.longitude);
						      autocomplete.setBounds(new google.maps.LatLngBounds(geolocation,
							  geolocation));
						    });
						  }
						}
						// [END region_geolocation]
		    
				</script>
		</head>
		<body  onload="initialize()">
				 <?php
					 if($_REQUEST['success']!="" || $_REQUEST['RequestMessage']!=""){
					    echo'<div class="black_cover">&nbsp;</div>';
					 }  
			      ?>
				<!-- Header -->
				<?php include('header.php'); ?>
				<style>
						.language{display: none;}
				</style>
				<!-- Intro -->
				<!--<div class="black_cover"></div>-->
				<section id="intro" class="main style1 dark fullscreen cabox">
						<div class="content container  " style="opacity: 1;" id="cabox">
								<?php
								if(isset($_REQUEST['Request']) && $_REQUEST['address']!=''){ ?>
										<div> 
												<script src="http://code.jquery.com/jquery-1.10.2.js"></script> 
												<script id='AHO-JS' src="aho/aho.js?APP_ID=1&Request=<?php echo $_REQUEST['Request'];?>"></script>
												<div id='AHO-Remote-Load' style='color:#000'></div>
										</div>
										<?php
								}
								else if($_REQUEST['address']!='') {	?>
										<div> 
											  <script src="http://code.jquery.com/jquery-1.10.2.js"></script> 
											  <script id='AHO-JS' src="aho/aho.js?APP_ID=1"></script>
											  <div id='AHO-Remote-Load' style='color:#000'></div>
										</div>
										<?php
								}
								else { ?>
										<div id="buy" style="display: inline;" class="formswap"> 
												<h2>Find Closest  Agent</h2>
												<div class="homeform">
														<form>
															<div class="search_box">
																<input type='text' name='address' id="autocomplete" onFocus="geolocate()" placeholder="Enter Address, Neighborhood, City, Town or Zip" />
																<input type='submit' name='Search' value='Search' class='button binactive' />
															</div>
															<div class="search_btns">
																	<input type="hidden" name="Buy" value="Buy" id="search_var" />
																	<input type='button' name='Buy_button' value='Buy' class='button binactive' />
																	<input type='button' name='Rent_button' value='Rent' class='button binactive scrolly' />
																	<input type='button' name='Sell_button' value='Sell' class='button binactive scrolly' />
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
						<a class="agent-sign-up" href="admin" >Sign Up As An Agent</a>
						<div id="clear"></div>
					</div>
					<div id="clear"></div>
					<div class="content container small" >
						<div id="subc">
								<div id="subtitles">
								    <span class="subch1">
										<b>W</b>e Are <br>
										Professionals!
								    </span>
								</div>
								<div id="subcimg">
										<img src="images/user.png">
								</div>
								<div id="subctxt">
										<b>ONLY</b> local agents can provide accurate data on "ALL" properties. Get the professional guidance you deserve!
								</div>
						</div>
						<div id="subc">
						<div id="subtitles">
								<span class="subch1"><b>W</b>e Are <br>Your Neighbors!</span>
						</div>
						<div id="subcimg"><img src="images/chat.png"></div>
						<div id="subctxt">
								Since our agents live in the neighborhood, they have little travel time and can show you the property on a moment's notice.
						</div>
					</div>
					<div id="subc">
						<div id="subtitles"><span class="subch1"><b>W</b>e Live <br>in Your Community</span></div>
						<div id="subcimg"><img src="images/communities.png"></div>
						<div id="subctxt">Your Local agent will provide you with the most accurate information about the community &amp; neighborhood.</div>
					</div>
					<div id="clear"></div>
					</div>
				</section>
				<?php include("how_it_works.php");?>
				<section id="work2" class="main style3 primary bg" >
						<div class="content container small" >
								<div id="subc">
										<div id="subcimg"><img src="images/sellers.png"></div>
										<div id="subctxt">
												<span class="subch1"><b>Sellers</b></span>
												Insert your full home address to see the 3 closest agents. They will provide accurate information on similar properties sold in your area.
										</div>
								</div>
								<div id="subc">
										<div id="subcimg"><img src="images/buyersrenters.png"></div>
										<div id="subctxt">
												<span class="subch1"><b>Buyers/Renters</b></span>
												Once you insert your desired location, contact any agent via email or phone &amp; browse their website for the most accurate property data.
										</div>
								</div>
								<div id="subc">
										<div id="subcimg"><img src="images/rightagent.png"></div>
										<div id="subctxt">
												<span class="subch1"><b>The Right Agent</b></span>
												Every time you select an area of preference you are offered services by experts of the community.  Make your choice the best choice. Call us today!
										</div>
								</div>
						</div>
				</section>
				<?php
			      if(isset($_REQUEST['success']) && $_REQUEST['success']==1) {
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
<script>
		
		$(document).ready(function(){
				if ($('.language').css('display')=='none') {
				      $('header').removeClass('lag-heaer');
				}

				if ( $(window).width() <= 640) {
					$(window).load(function(){
						$("#autocomplete [name='address']").focus();
						// $('html, body').scrollTo("#cabox");
						$('html, body').animate({ scrollTop: $('#intro').offset().top}, 1000);
					});
				}
				
		});

		
</script>