<div data-role="content">
	<div class="clearfix note-2">
	<h3 class="register-new">Register</h3>
	<div class="free-banner"><img src="images/free.png" alt="free"/></div>
	</div>	
<?php
if(isset($User_ID)){
	?>
	<script>window.location="index.php?Page=Accounts";</script>
	<?php
}
if($Reg == '1'){
        if($Check_Registration == '3'){
		print "<br>Username is already in use or passwords do not match please <a href='index.php?Page=Registration' data-ajax='false'>try again.</a>";
        }else if($Check_Registration == 4){
            print "<br>Select a broker for the agent. <a href='index.php?Page=Registration' data-ajax='false'>try again.</a>";
        }else{
		print "<br>Thank you for registering. <a href='index.php?Page=Accounts'  data-ajax='false'>Get started now.</a>";
	}
}else{
?>
<style>
	.error_message{color:#FF0000;display:none;}
</style>

<form action="index.php?Page=Registration&Reg=1" method="post" data-ajax="false">

<label for="basic">Email ID:</label>
<input type="text" name="Username" id="email_address" data-mini="true" /><br>

<label for="basic">Password:</label>
<input type="password" name="Password" id="password" data-mini="true" /><br>

<label for="basic">Type Password again:</label>
<input type="password" name="Password2" id="cpassword" data-mini="true" /><br>

<!--<label for="basic">Type:</label>-->
<input type="hidden" name="Type" value="3"/>
<!--<select class="custom-select user_type" name="Type" id="basic" data-mini="true">
		<option value="2">Broker</option>
        <option value="3" selected>Agent</option>
</select>--> 



<br>
<!-- commented on 16 may14
<div id ="brker_list" style="display:none">
<label for="basic">Broker:</label>

<select  name="Broker" id="basic" data-mini="true" >
    <option value="">Select Broker</option>
<?php $sql = "SELECT * FROM AHO_User WHERE b_id = '0' AND Type = '2'";
      $sql_result = mysql_query($sql);
      while ($row = mysql_fetch_array($sql_result)) {?>
          <option value="<?php echo  $row['id']?>"><?php echo $row['Email_1']?></option>
<?php } ?>
</select>
<br>
</div>
-->
<!--<label for="basic">Website: ("http://www.test.com") <span id="web_error" class="error_message">Invalid URL!</span></label>
<input type="text" name="Web" id="Web" data-mini="true" /><br>
<!--<div id="availability">
	<label for="basic">Available On:</label>
	<?php
	$timestamp = strtotime('next Sunday');
	for($i=0;$i<7;$i++)
	{
		?>
		<input type="checkbox" name="Availability[<?php echo $i;?>]" id="Availability[<?php echo $i;?>]" value="<?php echo $i;?>" data-mini="true" /><?php echo strftime('%a', $timestamp);?>
		<?php
		 $timestamp = strtotime('+1 day', $timestamp);
	}
	?>
</div>-->
<br>
<input type="hidden" name="Reg" id="basic" data-mini="true" value='1' />

<input type="Submit" name="Submit" data-theme="b" value="Register" onclick="return validate_form();">

</form>


<?php
}
?>

</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
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
    })
</script>
<script>
    
     $(".user_type").change(function(){
        if($(".user_type").val() == 3){
            $("#availability").css('display','');
        }else{
             $("#availability").css('display','none');
        }
        
    });
     /* commented on 16 may14
     $(".user_type").keypress(function(){
        if($(".user_type").val() == 3){
            $("#brker_list").css('display','');
        }else{
             $("#brker_list").css('display','none');
        }
        
    });
    */
    
    function validate_form()
    {
	
	/*var Web = $('#Web').val();
	if(Web.length<=0 || !isUrl(Web)) {
		$('#web_error').show();
		$('#Web').focus();
		return false;
	}*/
	var email_address = $('#email_address').val().trim();
	var password =  $('#password').val().trim(); 
	var cpassword =  $('#cpassword').val().trim();
	if (email_address<=0) {
		alert('Enter the Email ID.');
		$('#email_address').focus();
		return false;
	}
	else if (password.length<=0) {
		alert('Enter the Password.');
		$('#password').focus();
		return false;
	}
	else if (cpassword.length<=0) {
		alert('Enter the Confirm Password.');
		$('#cpassword').focus();
		return false;
	}
	else if (cpassword!=password) {
		alert('Confirm Password Mismatched.');
		$('#cpassword').focus();
		return false;
	}
	else{
		if (checkEmail(email_address)) {
				return true;
		}
		else{
				alert('Enter your Valid Email Address.');
				$('#email_address').focus();
				return false;
		}
	}
	
    }
    function isUrl(s)
    {
	var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
	return regexp.test(s);
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
