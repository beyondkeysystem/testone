<div data-role="content">
	<h3>Forgot your password?</h3>
	
	<br><br>
<?php
require '../aho/mail/PHPMailerAutoload.php';
if($For == '1'){ 

		$Username = addslashes($_REQUEST["Username"]);

		//$sql = "SELECT * FROM AHO_User WHERE Email_1 = '$Username' AND Type = '$Type' LIMIT 1 ";
		$sql = "SELECT * FROM AHO_User WHERE Email_1 = '$Username' AND Type = '3' LIMIT 1 ";
		$sql_result = mysql_query($sql);
		$row = mysql_fetch_array($sql_result);

		$Password = $row["Password"];
		
		if($Password != ''){
			$message="Your password is: $Password";
			$subject='Password Request for AHO';
			print "<b>Your password has been sent.</b>";
			$mail = new PHPMailer();
				// Set PHPMailer to use the sendmail transport
			$mail->isSendmail();
			//Set who the message is to be sent from
			$mail->setFrom('support@americanhomesonline.com', 'American Homes Online');
			//Set an alternative reply-to address
			$mail->addReplyTo('sameer.chourasia@cisinlabs.com', 'Sameer Chaurasia');
			//Set who the message is to be sent to
			$mail->addAddress($Username, 'Agent');
			//Set the subject line
			$mail->Subject = $subject;
			// Mail it
			$mail->msgHTML($message);
	   
			//Replace the plain text body with one created manually
			$mail->AltBody = 'This is a plain-text message body';
			//Attach an image file
			  //$mail->addAttachment('images/phpmailer_mini.png');
			//send the message, check for errors
			$flag = $mail->send();
		}
		
		
}else{
?>


<form action="index.php?Page=Forgot&For=1" method="post" data-ajax="false">

<label for="basic">Email:</label>
<input type="text" name="Username" id="basic" data-mini="true" />

<!--<label for="basic">Type:</label>
<select  name="Type" id="basic" data-mini="true" class="user_type"> // commented on 29 sep 2014
    <option value="">Select Type</option>
    <option value="2">Broker</option>
    <option value="3">Agent</option>
</select>-->

<input type="hidden" name="For" id="basic" data-mini="true" value='1' />

<input type="Submit" name="Submit" data-theme="b" value="Request Password" class="binactive margin-top">

</form>


<?php
}
?>

</div>