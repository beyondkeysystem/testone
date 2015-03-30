<?php
if(isset($_REQUEST['send_contact']) && ($_REQUEST['send_contact']=='Send' || $_REQUEST['send_contact']=='Go')){
	if($_REQUEST['ConsumerName']!='' && $_REQUEST['ConsumerPhone']!='' && $_REQUEST['ConsumerEmail']!=''){
				$Name = $_REQUEST['ConsumerName'];
				$Phone = $_REQUEST['ConsumerPhone'];
				$Email = $_REQUEST['ConsumerEmail'];
				$Comment =$_REQUEST['ConsumerComment'];
				$AdminEmail ='support@americanhomesonline.com';
				//$AdminEmail = 'sameer@mailinator.com';
				require 'mail/PHPMailerAutoload.php';
				// Admin mail
				//Create a new PHPMailer instance
				$mail = new PHPMailer();
				// Set PHPMailer to use the sendmail transport
				$mail->isSendmail();
				//Set who the message is to be sent from
				$mail->setFrom('support@americanhomesonline.com', 'American Homes Online');
				//Set an alternative reply-to address
				//$mail->addReplyTo('sameer.chourasia@cisinlabs.com', 'Sameer Chaurasia');
				//Set who the message is to be sent to
				$mail->addAddress($AdminEmail, 'Admin');
				//Set the subject line
				$mail->Subject = 'User Contact Form from '.$Email;
				//Read an HTML message body from an external file, convert referenced images to embedded,
				//convert HTML into a basic plain-text alternative body
				   //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
				$mail->msgHTML('<html><head><title>American Homes Online</title></head>
						  <body>						  
							<strong>User Information</strong><br>
							Name: '.addslashes($Name).'<br>
							Phone: '.addslashes($Phone).'<br>
							Email: '.addslashes($Email).'<br>
							Comment: '.addslashes($Comment).'<br>
							Regards<br>
							American Homes Online	
						  </body></html>');
				   
				//Replace the plain text body with one created manually
				$mail->AltBody = 'This is a plain-text message body';
				//Attach an image file
				  //$mail->addAttachment('images/phpmailer_mini.png');
				//send the message, check for errors
				$send = $mail->send();
				
				// admin sms
				
				
				require('tw/Services/Twilio.php');

				$account_sid = 'AC7728951e7d8b3b31c7275adb4e4002e5';
				$auth_token = '8e592234882788ddfac3a4336cfba000';
				$client = new Services_Twilio($account_sid, $auth_token);
				$find = array("(",")","+","-");
				$replace = '';
				$AdminPhone ='8882462928';
				//$AdminPhone ='919589771791';
				$AdminPhone = str_replace($find,$replace,$AdminPhone); 
			
				if(strlen($AdminPhone) == 10){
					$AdminPhone = "1$AdminPhone";
				}
			
			
				$client->account->messages->create(array(
						'To' => "+$AdminPhone",
						'From' => "+17024255249",
						'Body' => "User Information\nName\n".addslashes($Name)."\nPhone\n".addslashes($Phone)."\nEmail\n".addslashes($Email)."\nComment\n".addslashes($Comment)."\n".addslashes("Regards\nAmerican Homes Online")
			
				));
				
				// User mail
				
				
				$mail = new PHPMailer();
				// Set PHPMailer to use the sendmail transport
				$mail->isSendmail();
				//Set who the message is to be sent from
				$mail->setFrom('support@americanhomesonline.com', 'American Homes Online');
				//Set an alternative reply-to address
				//$mail->addReplyTo('sameer.chourasia@cisinlabs.com', 'Sameer Chaurasia');
				//Set who the message is to be sent to
				$mail->addAddress($Email, $Name);
				//Set the subject line
				$mail->Subject = 'Query Success Mail '.$Email;
				//Read an HTML message body from an external file, convert referenced images to embedded,
				//convert HTML into a basic plain-text alternative body
				   //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
				$mail->msgHTML('<html><head><title>American Homes Online</title></head>
						  <body>						  
							<b>Your query is successfully sent to American Homes Online.</b><br>
							You can email us at support@americanhomesonline.com<br>
							or Call Us on (888) 246-2928.<br>
							Our support team will contact you shortly.<br>
							Regards<br>
							American Homes Online
						  </body></html>');
				   
				//Replace the plain text body with one created manually
				$mail->AltBody = 'This is a plain-text message body';
				//Attach an image file
				  //$mail->addAttachment('images/phpmailer_mini.png');
				//send the message, check for errors
				$send = $mail->send();
				
				
				//User sms
				/*$client = new Services_Twilio($account_sid, $auth_token);
				$find = array("(",")","+","-");
				$replace = '';
				//$AdminPhone ='8882462928';
				
				$Phone = str_replace($find,$replace,$Phone); 
			
				if(strlen($Phone) == 10){
					$Phone = "1$Phone";
				}
				$client->account->messages->create(array(
						'To' => "+$Phone",
						'From' => "+17024255249",
						'Body' => "Your query has been sent successfully to our support team. We will contact you shortly.\nRegards\nAmerican Homes Online"
			
				));*/
				if($send){
								header("location:http://americanhomesonline.com");
				}
				else{
								echo 'Please try again later. <a href="http://americanhomesonline.com">Back</a>';
				}
	}
}				
	
exit;	
?>
