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
		var cell_no = $('#cell_no').val().trim();
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
		else if (cell_no.length<=0) {
				alert('Enter your Cell No.');
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
            <td><h1>Register</h1></td>
            <td><img src="images/border-style.png" /></td>
        </tr>
    </table>
    <p>Register to receive 100% accurate listings and immediate service from the closest agent.</p>
    </div>
    <!---->
    <!--<form method="post" name="buy_form" id="buy_form">-->
    <div class="buy-form"><form method="post" name="buy_form" id="buy_form" action="aho/send_request.php">
      <div class="form-row detail-field">
        <label><span>*</span>Email</label>
        <input type="email" placeholder="Enter Your Email" id="" name="" />
      </div>
      
      <div class="form-row detail-field">
        <label><span>*</span>Password</label>
        <input type="password" placeholder="Enter Your Password" id="" name="" />
      </div>
      
      <div class="form-row detail-field">
        <label><span>*</span>Confirm Password</label>
        <input type="password" placeholder="Confirm Password" id="" name="" />
      </div>
      
      <div class="form-row full detail-field">
        <label><span>*</span>Type</label>
        <select class="custom-select" id="" name="" >
          <option value="Agent">Agent</option>
          <option value="Broker">Broker</option>
        </select>
        <div class="clear"></div>
      </div>
      
      <div class="form-row detail-field">
        <label><span>*</span>Website: ("http://www.test.com")</label>
        <input type="text" placeholder="Enter Your Website" id="" name="" />
      </div>
      
      <div class="form-row detail-field">
        <label>Available On</label>
    <label class="radio"><input type="checkbox"  id="Receive_Option1" name="Receive_Option" value="1"  checked="checked" />Sun</label>
	<label class="radio"><input type="checkbox"  id="Receive_Option2" name="Receive_Option" value="2"   />Mon</label>
	<label class="radio"><input type="checkbox"  id="Receive_Option3" name="Receive_Option" value="3"   />Tue</label>
	<label class="radio"><input type="checkbox"  id="Receive_Option3" name="Receive_Option" value="3"   />Wed</label>
    <label class="radio"><input type="checkbox"  id="Receive_Option3" name="Receive_Option" value="3"   />Thu</label>
    <label class="radio"><input type="checkbox"  id="Receive_Option3" name="Receive_Option" value="3"   />Fri</label>
    <label class="radio"><input type="checkbox"  id="Receive_Option3" name="Receive_Option" value="3"   />Sat</label>
      </div>
      <div class="form-row">
        <div class="submit-btn">
	   <input type="hidden" name="property_location" value="<?php echo $_POST['property_location'];?>"/>
	   <input type="hidden" name="property_type" value="<?php echo $_POST['property_type'];?>"/>
	   <input type="hidden" name="min_price" value="<?php echo $_POST['min_price'];?>"/>
	   <input type="hidden" name="max_price" value="<?php echo $_POST['max_price'];?>"/>
	   <input type="hidden" name="area" value="<?php echo $_POST['area'];?>"/>
	   <input type="hidden" name="bedrooms" value="<?php echo $_POST['bedrooms'];?>"/>
	   <input type="hidden" name="bathrooms" value="<?php echo $_POST['bathrooms'];?>"/>
	   <input type="hidden" name="lot_size" value="<?php echo $_POST['lot_size'];?>"/>
	   <input type="hidden" name="comment" value="<?php echo $_POST['comment'];?>"/>
           <input type="submit" value="Register" onclick="return check_form()" name="send_request" />
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