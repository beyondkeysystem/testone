<!-- Footer -->
<style type="text/css">
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
z-index: 103 !important;
display: none;
}
.popup{
width: 50%;
margin: 0 auto;
display: none;
position: fixed;
z-index: 2147483647;
top:10%;
left:23%;
right:34%;
border: 1px solid #000;
box-shadow: 0 2px 5px #000;
}
/*.content{
min-width: 600px;
width: 600px;
min-height: 150px;
margin: 100px auto;
background: #f3f3f3;
position: relative;
z-index: 103;
padding: 10px;
border-radius: 5px;
box-shadow: 0 2px 5px #000;
}*/
.content p{
clear: both;
color: #555555;
text-align: justify;
}
.content p a{
color: #d91900;
font-weight: bold;
}
.content .x{
float: right;
height: 35px;
left: 22px;
position: relative;
top: -25px;
width: 34px;
}
.content .x:hover{
cursor: pointer;
}
.contact_us{background-color:#fff;}
.close_btn{position: absolute;right: -20px;top:-17px;}
.close_btn a{color:#ff0000 !important;}
.close_btn img{height:40px;width:40px;}
</style>
<footer id="footer"> 
  
  <!--
				     Social Icons
				     
				     Use anything from here: http://fortawesome.github.io/Font-Awesome/cheatsheet/)
				-->
  
  <div class="container">
    <div class="footertxt"> <span>The best way to find a reliable realtor</span>
     <p>Every day, thousands of people depend on American Homes Online trusted system to take the worry out of finding professional local agents &amp; reliable information.</p> </div>
    <div class="footerlogo">
    <div class="f_logos"><a class="button new-login" href="javascript:" onclick="show_contactUs();">Contact Us</a> <img src="http://americanhomesonline.com/images/equal_housing.png" alt="" /> <img src="http://americanhomesonline.com/images/patent_logo.png" alt="" /></div>
    <ul class="actions">
      <li><a href="https://www.facebook.com/AmericanHomesOnlineInc" class="fa solo fa-facebook"><span>Facebook</span></a></li>
      <li><a href="https://twitter.com/HomesOfAmerica" class="fa solo fa-twitter"><span>Twitter</span></a></li>
      <li><a href="https://plus.google.com/108179059460224000338/posts?hl=en" class="fa solo fa-google-plus"><span>Google+</span></a></li>
      <li><a href="#" class="fa solo fa-youtube"><span>YouTube</span></a></li>
    </ul>
    
    </div>
    <div class="divider"></div>
    <ul class="menu">
      <li><a href="http://americanhomesonline.com/home-for-sale.php">Buy and Sale Home </a></li>
      <li><a href="http://americanhomesonline.com/about.php">About</a></li>
      <li><a href="http://americanhomesonline.com/terms.php">Terms And Conditions</a></li>
      <li><a href="http://americanhomesonline.com/privacy.php">Privacy Policy</a></li>
      <li><a href="http://americanhomesonline.com/admin/index.php?Page=Registration">We Are Hiring!</a></li>
    </ul>
    <div class="copy"> &copy; 2011-<?php echo date(Y); ?> American Homes Online Inc | All Rights Reserved </div>
  </div>
  
</footer>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/contact_us.css" />
<div class='popup contact_us'>
  <div class="container-contact clearfix ">
    <span class="close_btn"><a href='javascript:' class='close' onclick="close_me();"><img src="http://www.americanhomesonline.com/images/close.png" alt="X"/></a></span>
<div class="contact-form clearfix">
  <div class="contact-us clearfix"><h1>Contact Us</h1></div>
				<!--<div class="Email-us clearfix"><p>Email Us</p>
				<a href="#">support@AmericanHomesOline.com</a>
				</div>
				<div class="call-us clearfix"><p>Call Us</p>
				<a href="#">(888) 246-2928</a>
				</div>-->
				<div class="main-form clearfix">
					<form method="post" action="http://www.americanhomesonline.com/aho/contact_us.php" id="contact_frm">
					  <span style="color:red">*</span>First Name:<input type="text" id="ConsumerName" name="ConsumerName" class="former"/>
					  <span style="color:red">*</span>Phone:<input type="text" value="" id="ConsumerPhone" name="ConsumerPhone"  class="former" placeholder="Country Code + (555)555-5555"/>
					  <span style="color:red">*</span>Email:<input type="text" value="" id="ConsumerEmail" name="ConsumerEmail" class="former" name="Email"/>
					  Comments or Suggestions?
					  <textarea name="ConsumerComment" id="ConsumerComment"></textarea>
					  
					  
					  <b>Fill out the form completely.</b>
					  
					  <div class="cont-button clearfix">
					  <!--<a href="#" class="red-button">Back</a>-->
					  <!--<a href="#" class="blue-button">Send</a>-->
					  <input type="submit" name="send_contact" id="send_contact" value="Send" class="blue-button" onclick="return validate_contact_form()"/>
					  </div>
					</form>
				</div>
				

		</div>

</div>
</div>

<script>
  function show_contactUs() {
    //$('#contact_us').show();
    var overlay = $('<div id="overlay"></div>');
    var body = document.body,html = document.documentElement;
    var body_height = Math.max( body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight );
    overlay.show();
    overlay.appendTo(document.body);
    var popup_height = parseFloat(20*body_height/100);
   // $('.popup').css('height',popup_height);
    $('.popup').show();
    return false;
  }
  
   function close_me(){
      $('.popup').hide();
	$('#overlay').remove();
      return false;
    }
    /*$('.x').click(function(){
      $('.popup').hide();
      overlay.appendTo(document.body).remove();
      return false;
    });*/
    /*$('.click').click(function(){
      overlay.show();
      overlay.appendTo(document.body);
      $('.popup').show();
      return false;
    });*/
  
  
  $(document).ready(function(){
	  
	  $("#ConsumerPhone").blur(function(e){
		 
		  if (e.which==8) {
			  return true;
		  }
		  else if((e.which==43)){
			  return false;
		  }
		  else if((e.which==44)){
			  return false;
		  }
		  else if((e.which)>=97 &&(e.which)<=122){
				  return false;
		  }
		  else if ((e.which)>=65 &&(e.which)<=90) {
				  return false;
		  }
		  var cell_no = $("#ConsumerPhone").val().trim();
		  
		  // code for 3 digit country code
		  if(cell_no.length==13){
			  
			  var country_code = '';
			  var first_part = '';
			  var second_part = '';
			  var third_part = '';
			  var country_code=cell_no.substring(0, 3);
			  first_part=cell_no.substring(3, 6);
			  second_part=cell_no.substring(6, 9);
			  third_part=cell_no.substring(9, 13);
			  var phone_format = country_code+'+('+first_part+')'+second_part+'-'+third_part;
			  $('#ConsumerPhone').val(phone_format);
				  
		  }// code for 12 digit country code
		  else if(cell_no.length==12){
			  
			  var myStrings='';
			  var country_code = '';
			  var first_part = '';
			  var second_part = '';
			  var third_part = '';
			  country_code=cell_no.substring(0, 2);
			  first_part=cell_no.substring(2, 5);
			  second_part=cell_no.substring(5, 8);
			  third_part=cell_no.substring(8, 12);
			  
			  var phone_format = country_code+'+('+first_part+')'+second_part+'-'+third_part;
			  $('#ConsumerPhone').val(phone_format);
		  }// code for 11 digit country code
		  else if(cell_no.length==11){
			  var myStrings='';
			  var country_code = '';
			  var first_part = '';
			  var second_part = '';
			  var third_part = '';
			  country_code=cell_no.substring(0, 1);
			  first_part=cell_no.substring(1, 4);
			  second_part=cell_no.substring(4, 7);
			  third_part=cell_no.substring(7, 11);
			  var phone_format = country_code+'+('+first_part+')'+second_part+'-'+third_part;
			  $('#ConsumerPhone').val(phone_format);
		  }
		  else if(cell_no.length==10){
			  var myStrings='';
			  var country_code = '';
			  var first_part = '';
			  var second_part = '';
			  var third_part = '';
			  //alert('test');
			  first_part=cell_no.substring(0, 3);
			  second_part=cell_no.substring(3, 6);
			  third_part=cell_no.substring(6, 10);
			  var phone_format = '('+first_part+')'+second_part+'-'+third_part;
			  $('#ConsumerPhone').val(phone_format);
		  }
		  if (cell_no.length>13) {
			  //$("#Phone").val(myStrings);
			  if(e.which<=13 || e.which>=11){

					  return true;
			  }
			  else{
					  return false;
			  }
		  }
		  
		  if (cell_no.length>13) {
				  if(e.which==15 || e.which==0){
						  return true;
				  }
				  else{
						  return false;
				  }
		  }


	  });	
  });
  $('#send_contact').click(function(){
          
	  if ($('#ConsumerName').val().length<=0) {
		  alert('Enter the Name.');
		  $('#ConsumerName').focus();
		  return false;
	  }
	  else if ($('#ConsumerPhone').val().length<13) {
		  alert('Enter Valid Phone No.');
		  $('#ConsumerPhone').focus();
		  return false;
	  }
	  else if (($('#ConsumerEmail').val().length<=0)|| !checkEmail($('#ConsumerEmail').val())) {
		  alert('Enter the Valid Email Id.');
		  $('#ConsumerEmail').focus();
		  return false;
	  }
  });
  function checkEmail(email)
  {
	      var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	      if (!filter.test(email)) {
			      return false;
	      }
	      else{
			      return true;
	      }
  }
 // $(document).ready(function(){
//if ($('.language').length>0) {
//alert("Test");
$('.goog-te-menu-value').click(function(){
//alert("test");
      $('.goog-te-menu-frame').css('z-index','90000000!important');
});
//}
//});
</script>
