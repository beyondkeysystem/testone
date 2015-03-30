<?php
	
	
?>
<!DOCTYPE HTML>
<html>
		<head>
		<title>American Homes Online</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script type="text/javascript">
    $(document).ready(function(){
        $(".custom-select").each(function(){
            $(this).wrap("<span class='select-wrapper'></span>");
            $(this).after("<span class='holder'></span>");
        });
        $(".custom-select").change(function(){
            var selectedOption = $(this).find(":selected").text();
            $(this).next(".holder").text(selectedOption);
        }).trigger('change');
	
	

    });
    function check_form() 
    {
		var first_name = $('#first_name').val().trim(); 
		var last_name = $('#last_name').val().trim();
		var email_address = $('#email_address').val().trim();
		var cell_no = $('#cell_no').val();
		var contact_no=cell_no.split('(');
		contact_no=contact_no.join('');
		contact_no=contact_no.split('-');
		contact_no=contact_no.join('');
		contact_no=contact_no.split(')');
		contact_no=contact_no.join('');
		contact_no=contact_no.split('+');
		contact_no=contact_no.join('');
		
		var confirm_email =  $('#confirm_email').val().trim(); 
		if (first_name.length<=0) {
				//$('#property_location').addClass('error');
				alert('Enter your First Name.');
				$('html, body').animate({
						scrollTop: $("#first_name").offset().top
				}, 100);
				$('#first_name').focus();
				return false;
		}
		else if (last_name.length<=0) {
				//$('#property_type').addClass('error');
				alert('Enter your Last Name.');
				$('html, body').animate({
						scrollTop: $("#first_name").offset().top
				}, 100);
				$('#last_name').focus();
				return false;
		}
		else if (contact_no.length<10) {
				alert('Enter your Valid Cell No.');
				$('html, body').animate({
						scrollTop: $("#first_name").offset().top
				}, 100);
				$('#cell_no').focus();
				return false;
		}
		else if (email_address.length<=0) {
				alert('Enter your Email Address.');
				$('html, body').animate({
						scrollTop: $("#email_address").offset().top
				}, 100);
				$('#email_address').focus();
				return false;
		}
		else if (confirm_email.length<=0 || email_address!=confirm_email) {
				alert('Enter the same Email Address to Confirm.');
				$('html, body').animate({
						scrollTop: $("#confirm_email").offset().top
				}, 100);
				$('#confirm_email').focus();
				return false;
		}
		else{
				$('#cell_no').val(contact_no);
				if (checkEmail(email_address)) {
						return true;
				}
				else{
						alert('Enter your Valid Email Address.');
						$('html, body').animate({
								scrollTop: $("#cell_no").offset().top
						}, 100);
						$('#email_address').focus();
						return false;
				}
		}
    }
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
    $(document).ready(function(){
		$("#cell_no").blur(function(e){
			
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
			var cell_no = $("#cell_no").val().trim();
			var pattern = /-/;
			var exists = pattern.test(cell_no);
			if (exists) {
				cell_no = cell_no.replace(/\-/g,'');
			}
			
			// code for 3 digit country code
			if(cell_no.length==13){
				
				var country_code = '';
				var first_part = '';
				var second_part = '';
				var third_part = '';
				
				country_code=cell_no.substring(0, 3);
				first_part=cell_no.substring(3, 6);
				second_part=cell_no.substring(6, 9);
				third_part=cell_no.substring(9, 13);
				var phone_format = country_code+'+('+first_part+')'+second_part+'-'+third_part;
				$('#cell_no').val(phone_format);
					
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
				$('#cell_no').val(phone_format);
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
				$('#cell_no').val(phone_format);
			}
			else if(cell_no.length==10){
				var myStrings='';
				var country_code = '';
				var first_part = '';
				var second_part = '';
				var third_part = '';
				
				first_part=cell_no.substring(0, 3);
				second_part=cell_no.substring(3, 6);
				third_part=cell_no.substring(6, 10);
				var phone_format = country_code+'('+first_part+')'+second_part+'-'+third_part;
				$('#cell_no').val(phone_format);
			}
			if (cell_no.length>13) {
				//$("#cell_no").val(myStrings);
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
    
    
</script>
		<script src="js/jquery.poptrox.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
		<!--<noscript>-->
        <!--<link rel="stylesheet" href="css/skel-noscript.css" />-->
        <link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/buy_style.css" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,600italic,700' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <!--</noscript>-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->

		<style>
<?php  error_reporting(0);
 $images = array("house1.jpg", "house2.jpg", "house3.jpg", "house4.jpg", "house5.jpg");
 $rand = array_rand($images);
 ?>  #intro {
 background:url('images/<?php print $images[$rand] ?>');
 background-size:100%;
 background-attachment:fixed;
 background-position:bottom center;
 background-repeat:no-repeat;
}
#AHO-Remote-Load a { color: #000; }

</style>
</head><body  >
<!-- Header -->
<?php include('header.php'); ?>
<style>
	.goog-te-menu-value{margin-top:-50px !important;padding-left:5px;float:right;}
	#nav ul li#hire a {bottom: 8px;}
	.radio{float:left;padding-right:10px}
	.language{display:none !important}
	/*.success_message{color:green;font-size: 20px;}
	.error_message{color:red;font-size: 20px;}*/
</style>
<div class="container">
    <!-- Header -->

  <div class="inner-wrap">
	
    <div class="form-title">
    <table>
		
				<?php
						/*if(isset($_REQUEST['RquestMessage']) && $_REQUEST['RquestMessage']==1) {
								echo '<caption class="success_message">Please check your email and click link to confirm you are not a robot.</caption>';
						}
						else if(isset($_REQUEST['RquestMessage']) && $_REQUEST['RquestMessage']==0){
								echo '<caption class="error_message">Please Try Again Later.</caption>';
						}*/
				?>
		
    	<tr>
        	<td><img src="images/border-style.png" /></td>
            <td><h1>Personal Details</h1></td>
            <td><img src="images/border-style.png" /></td>
        </tr>
    </table>
    <p>Register to receive 100% accurate listings and immediate service from the closest agent.</p>
    </div>
    <!---->
    <!--<form method="post" name="buy_form" id="buy_form">-->
    <div class="buy-form"><form method="post" name="buy_form" id="buy_form" action="aho/send_request.php">
      <div class="form-row detail-field">
        <label><span>*</span>First Name</label>
        <input type="text" placeholder="Enter Your First Name" id="first_name" name="first_name" />
      </div>
      
      <div class="form-row detail-field">
        <label><span>*</span>Last Name</label>
        <input type="text" placeholder="Enter Your Last Name " id="last_name" name="last_name" />
      </div>
      
      <div class="form-row detail-field">
        <label><span>*</span>Cell Number</label>
        <input type="text" placeholder="Enter Your Cell Number (Example:  Country Code + (555)555-5555 )" id="cell_no" name="cell_no" />
      </div>
      
      <div class="form-row detail-field">
        <label><span>*</span>Email Address</label>
        <input type="text" placeholder="Enter Your Email Address" id="email_address" name="email_address" />
      </div>
      
      <div class="form-row detail-field">
        <label><span>*</span>Confirm Email Address</label>
        <input type="text" placeholder="Confirm Your Email Address" id="confirm_email" name="confirm_email" />
      </div>
     <!-- <div class="form-row detail-field"> 
        <label>Receive Property Via</label>
        <label class="radio"><input type="radio"  id="Receive_Option1" name="Receive_Option" value="1"  checked="checked" />Mail</label>
	<label class="radio"><input type="radio"  id="Receive_Option2" name="Receive_Option" value="2"   />Text</label>
	<label class="radio"><input type="radio"  id="Receive_Option3" name="Receive_Option" value="3"   />Both</label>
      </div>-->
      <div class="form-row">
        <div class="submit-btn">
	   <input type="hidden" name="property_location" value="<?php echo $_POST['property_location'];?>"/>
	   <input type="hidden" name="property_type" value="<?php echo $_POST['property_type'];?>"/>
	   <input type="hidden" name="min_price" value="<?php echo $_POST['min_price'];?>"/>
	   <input type="hidden" name="max_price" value="<?php echo $_POST['max_price'];?>"/>
	    <input type="hidden" name="request_type" value="<?php echo $_POST['request_type'];?>"/>
	   <input type="hidden" name="area" value="<?php echo $_POST['min_sqft'];?>"/>
	   <input type="hidden" name="bedrooms" value="<?php echo $_POST['bedrooms'];?>"/>
	   <input type="hidden" name="bathrooms" value="<?php echo $_POST['bathrooms'];?>"/>
	   <input type="hidden" name="lot_size" value="<?php echo $_POST['lot_size'];?>"/>
	   <input type="hidden" name="pets" value="<?php echo $_POST['pets'];?>"/>
	   <input type="hidden" name="year_built" value="<?php echo $_POST['year_built'];?>"/>
	   <input type="hidden" name="time_frame" value="<?php echo $_POST['time_frame'];?>"/>
	   <input type="hidden"  id="Receive_Option" name="Receive_Option" value="3"   />
	   <input type="hidden" name="comment" value="<?php echo $_POST['comment'];?>"/>
       <input type="submit" value="Submit" onclick="return check_form()" name="send_request" />
        </div>
        <div class="clear"></div>
      </div> </form>
    </div>
    <!---->
  
  </div>
</div>
<?php include('footer.php'); ?>
</body>
</html>