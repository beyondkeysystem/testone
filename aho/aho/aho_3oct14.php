﻿	<?php   // NV FILE //
	// header('Access-Control-Allow-Origin: *');
	
	error_reporting(1);
	//ini_set('display_errors', '1');
	
	// SET TO FALSE FOR A SPECIFIC BROKER
	$exclude = true;
	// SEPARATE ID of BROKERS WITH 'ID', INSIDE PARENTHESIS IF EXCLUDE = TRUE
	$excludes = "('234')";
	
	//$db = mysql_connect("localhost", 'las_rc_user', 'V69h3119TgHe25z') or die();
	
	$db = mysql_connect("localhost", 'ahomain', ',O8bOcL6JUXK') or die(); // original
	
	//$db = mysql_connect("127.0.0.1", 'root', '') or die();
	//$db = mysql_connect("127.0.0.1", 'cakejobportal', 'yeTunMpvLPtdeGZ5') or die(); 
	mysql_select_db('ahomain_las_rc',$db); // original
	//mysql_select_db('cakejobportal',$db);
	
	if($Color1 == ''){
		$Color1 = '#F0F0F0';
	}
	
	$sql = "SELECT * FROM subscription_periods WHERE type = 'lead' limit 1";
	$sql_result = mysql_query($sql);
	$row = mysql_fetch_array($sql_result);
	$credits = $row['no_of_credits'];
	
	$sql = "SELECT * FROM AHO_User WHERE B_Code = '{$_REQUEST['APPid']}'";
	$sql_result = mysql_query($sql,$db);
	$row = mysql_fetch_array($sql_result);
	
	/*$APPid = $row["id"];
	if($APPid == ''){
		$APPid = '%';
	
	}*/
	$APPid=0;
	$AHO_AS =  $_REQUEST['AHO_AS'];
	include("code_.php");
	if($LP != 1){
	include("code_{$_REQUEST['APPid']}.php");
	
	} 
	if($Buying == 1){
	
		$Middle = ' AND Buy = 1 ';
	
	}
	
	if($Renting == 1){
	
		$Middle = ' AND Rent = 1 ';
	
	}
	
	if($Selling == 1){
	
		$Middle = ' AND Sell = 1 ';
	
	}
	
	
	if($_REQUEST['AID']==''){ 
		
		$sql = "
			SELECT id
			FROM AHO_User
			WHERE B_ID = 0
			AND credits >= ".$credits."
		";
		//echo $sql ;
		$result = mysql_query($sql,$db);
		$broker_array = array();
		while ($row = mysql_fetch_array($result))
		{
			$broker_array[] = $row['id'];
		}
		date_default_timezone_set('US/Central');
		$today = date('w'); 
		$sql = "SELECT *,
				SQRT(POW((69.1 * (GEO_Lat - $Lat)) , 2 ) +
				POW((53 * (GEO_Long - $Long)), 2)) AS distance
					FROM AHO_User WHERE Availability LIKE('%$today%') AND B_ID LIKE '$APPid'
					" . (($exclude) ? "AND credits>=1 AND Type=3 AND B_ID NOT IN $excludes" : "") . "
	
					$Middle
					
					". "ORDER BY distance ASC Limit 3";
					
					//echo $sql ;exit;
		$sql_result = mysql_query($sql,$db);
		//print_r($sql_result); exit;
		/* start here */
		 $num_rows = mysql_num_rows($sql_result);
		
		/* end here */
 
		$count = 0;
		//exit("Fail ankit");
		while($row = mysql_fetch_array($sql_result)){
				//exit("Fail ankit");
                $MilesR = $row['distance'];
			    if($MilesR > 3000){
							//exit("Fail");
				$Name= '';
				break;
	
			    }else{
				  $count++;
				
			    }
		  }
		  if($count>1)
		  {
			$txt = "Agents";
		  }
		  else
		  {
			$txt = "Agent";
		  }
        
        
		print "<span class='agenth2'>".$count ." Closest ".$txt. "</span>
		<div class='agentbox'>"; // agents box start
			if($num_rows > 0){
				$today = date('w'); 
				$sql = "SELECT *,
				SQRT(POW((69.1 * (GEO_Lat - $Lat)) , 2 ) +
				POW((53 * (GEO_Long - $Long)), 2)) AS distance
				FROM AHO_User WHERE  Availability LIKE('%$today%') AND B_ID LIKE '$APPid'
				" . (($exclude) ? "AND credits>=1 AND Type=3 AND B_ID NOT IN $excludes" : "") . "

				$Middle
				
				" .  "
				
				ORDER BY distance ASC Limit 3";
					
				$sql_result = mysql_query($sql,$db); 
				while($row = mysql_fetch_array($sql_result)){ 
		
					$Name = $row['Name'];
					$ID = $row['id'];
					$IMG = $row['Image'];
					$IMGF = $row['Image_File']; 
	
					if($IMGF != ''){
			
						$IMG = "../admin/aho-ui/content/userfiles/$IMGF";
						if(!file_exists($IMG)){
							$IMG = 'images/dpic.jpg';
						}
					}
					else if($IMG ==""){
						$IMG = 'aho/1367934593.svg';
					}
					
					$MilesR = $row['distance'];
					/* start here */
					if($MilesR <= 3000){
						$Miles = number_format($row['distance'],2);
						$Web = $row["Web"];
						if($Web != ''){
							$Website_Name = 'Website';
						}
						else{
							$Website_Name = 'No Website</a>';
						}
						/*if($IMG == ''){
							$IMG = 'aho/1367934593.svg';
						}
						if(strlen($IMG)<=0 || !file_exists($IMG)){
							$IMG = 'images/dpic.jpg';
						}*/
						$day30 = date("YmdHis", mktime(0, 0, 0, date("m"), date("d")-30,  date("Y")));
						$sqla = "SELECT * FROM AHO_Request WHERE Date_Time > $day30 AND IP_Clean = '{$_SERVER['REMOTE_ADDR']}' AND Agent_ID = '$ID' LIMIT 1 ";
						//echo $sqla;
						$sql_resulta = mysql_query($sqla,$db);
						$rowa = mysql_fetch_array($sql_resulta);
						$Check_ID = $rowa["Agent_ID"];
						$LB = $row['B_ID'];
						$sqlb = "SELECT * FROM AHO_User WHERE id = $LB  ";
						$sql_resultb = mysql_query($sqlb,$db);
						$rowb = mysql_fetch_array($sql_resultb);
						$Broker_Name = $rowb["Name"];
						print  "
						<div class='agentbox1'>";// ../ added in image path on 31may14 agentbox1 starts
						
						print  "
							<div class='cewleft'>
								<div class='cewleft-inner'>
									<img src='$IMG' width='120' height='140'>
								</div>
							</div>
							<div class='cewright'>
								<span class='bluespan'>
									<h1>$Name</h1>
								</span>
								$Broker_Name
								<span class='red'>
									<b>$Miles miles away</b>
								</span>
								<p>Contact me today for all your real estate needs!</p>";
								if($Check_ID == $ID){
					
									if(strlen($row['Phone_1'])>0){
										$phone = str_replace('+','',$row['Phone_1']);
										$phone_no = '('.substr($phone,0,3).')'.substr($phone,3,3).'-'.substr($phone,6,4);
									}
									else{
										$phone='';
									}
								print "
								<div class='cewbtn'>
									<img src='aho/32-iphone-icon.png' style='vertical-align:middle;'>
									<span style='font-weight:bolder;color:#1982d1;font-size:15px;'>
										{$phone_no}
									</span>
								</div>
								<a href='aho.php' class='AHO_Email' id='$ID'>
									<img src='aho/18-envelope-icon.png' style='vertical-align:middle;'>
									<span style=''>Email</span>
								</a>
							</div>";
			
					                        }
								else{
								print "
							</div>
							<div class='cewbtn'>
								<a href='aho.php' class='AHO_Call'  id='$ID'>
									<img src='aho/32-iphone-icon.png' style='vertical-align:middle;'> Call
								</a>
								<a href='aho.php' class='AHO_Email' id='$ID'>
									<img src='aho/18-envelope-icon.png' style='vertical-align:middle;'>
									<span >Email</span>
								</a>
							</div>";
								// <a href='aho.ph' class='AHO_Email' id='$ID'>  $Website_Name</a>
								}
	
								print "
							<div style='clear:both'></div>
						</div>"; //agentbox1 ends
			
							//echo $Name ."-----------------";
					} 
				}
				if($count == 0){
					print "
					<div style='width:300px;-moz-border-radius: 5px;-webkit-border-radius: 5px;border-radius: 5px;-khtml-border-radius: 5px;border-color:#1982d1;border-width:5px;border-style:solid;overflow: hidden;background-color:$Color1;margin-bottom:5px;font-family:Arial, Helvetica, sans-serif;font-size:12px;margin-right:auto;margin-left:auto;height:160px;line-height:18px;'>
						<h1>
							It looks like we don't have an agent in your area quite yet.
						</h1>
					</div>";
				}
			}
			else {
	
		    
			    print "
			    <div style='width:300px;-moz-border-radius: 5px;-webkit-border-radius: 5px;border-radius: 5px;-khtml-border-radius: 5px;border-color:#1982d1;border-width:5px;border-style:solid;overflow: hidden;background-color:$Color1;margin-bottom:5px;font-family:Arial, Helvetica, sans-serif;font-size:12px;margin-right:auto;margin-left:auto;height:160px;line-height:18px;'>
				<h1>  It looks like we don't have an agent in your area quite yet. </h1>
			    </div>";
		   
			}
		
		print "
		</div>"; // agents box ends
	}
	else if(isset($_REQUEST['AID']) && $_REQUEST['AID']!='' && $_REQUEST['Form_Send']!='1'){ 
		$sql = "SELECT *,
		SQRT(POW((69.1 * (GEO_Lat - $Lat)) , 2 ) +
		POW((53 * (GEO_Long - $Long)), 2)) AS distance
		FROM AHO_User WHERE id={$_REQUEST['AID']}
		ORDER BY distance ASC";
		$sql_result = mysql_query($sql,$db);
		$row = mysql_fetch_array($sql_result);
	
		$Name = $row['Name'];
		$ID = $row['id'];
		$IMG = $row['Image'];
		$Miles = number_format($row['distance'],2);
	
		$IMGF = $row['Image_File'];
		if($IMGF != '' ){
			$IMG = "../admin/aho-ui/content/userfiles/$IMGF";
			if(!file_exists($IMG)){
				$IMG = 'images/dpic.jpg';
			}
		}
		else if($IMG == ''){
			$IMG = 'aho/1367934593.svg';
		}
		print "
		<div class='agentbox'>
			<div class='agentbox1'>
				<div class='cewleft'>
					<div class='cewleft-inner'>
						<img src='$IMG' width='120' height='140'>
					</div>
				</div>
				<div class='cewright'>
					<span class='bluespan'>
						<h1>$Name</h1>
					</span>
					<span class='red'>
						<b>$Miles miles away</b>
					</span>
					<span class='red'>
						<p>Please fill in the form & receive agent's info.</p>
					</span>
			
				</div>
				<div style='clear:both'> </div>
				<div class='closest-form'>
					<div>
						<span style='color:red'>*</span>First Name:<input type='text' value='" . $_SESSION['form_name'] . "' style='width: 95%;' id='Name' class='former' name='Name'>
						<span style='color:red'>*</span>Phone:<input 	Name='Phone' class='former' id='Phone' type='text' style='width:95%' value='" . $_SESSION['form_phone'] . "'>
						<span style='color:red'>*</span>Email:<input 	Name='Email' class='former' id='Email' type='text' style='width:95%' value='" . $_SESSION['form_email'] . "'>
						Comments or Suggestions?
						<textarea style='width:95%;height:60px;' id='Comment' name='Comment'></textarea>
						<input 	type='hidden' ame='AID' id='AID' value='{$_REQUEST['AID']}'>
						<input 	type='hidden' name='AHO_AS' id='AHO_AS' value='{$_REQUEST['AHO_AS']}'>
						<b>Fill out the form completely.</b>
						<div style='display:block' id='regs'>
							<input type='submit' value='Send' id='Send' class='closest-submitbtn'>
						</div>
					</div>	
			
				</form>
				<p class='back-btn'><a href='aho.php' class='AHO_Back'  id='$ID'><< back</a>	</p>
			</div>
		</div>";
	
	}
	
	if(isset($_REQUEST['Form_Send']) && $_REQUEST['Form_Send']=='1'){ 
		
		$_SESSION['form_name'] = $_REQUEST['Name'];
		$_SESSION['form_phone'] = $_REQUEST['Phone'];
		$_SESSION['form_email'] = $_REQUEST['Email'];
		$_SESSION['Comment'] = $_REQUEST['Comment'];
		$Date = date('YmdHis');
	
		//print_r($_REQUEST);
		//print "INSERT INTO AHO_Request (Name,Phone,Email,Agent_ID,Date_Time,Property,Comment) VALUES ('".addslashes($_REQUEST['Name'])."','".addslashes($_REQUEST['Phone'])."','".addslashes($_REQUEST['Email'])."','".addslashes($_REQUEST['AID'])."','$Date','".addslashes($_REQUEST['AHO_AS'])."','".addslashes($_REQUEST['Comment'])."')";
	
		$IP_Clean = explode("||",$_REQUEST['IPaddress']);
	
		$IP_Clean = $IP_Clean[0];
		$request_id='';
		/* start here */
		if($_REQUEST['Name']!='' && $_REQUEST['Phone']!='' && $_REQUEST['Email']!='')
	        {
			//check if the user has already contacted the same agent
			$sql_result_date = "SELECT Date_Time FROM AHO_Request WHERE Email='{$_REQUEST['Email']}' AND IP_Clean = '{$_SERVER['REMOTE_ADDR']}' AND Agent_ID='{$_REQUEST['AID']}'";
			$sql_result_date = mysql_query($sql_result_date,$db);
			$row_date = mysql_fetch_array($sql_result_date);
		       
			$day30 = date("YmdHis", mktime(0, 0, 0, date("m"), date("d")-30,  date("Y")));
		       		       
		        // code for checking expired requests and update credit added on 3 June14
		       
			$sqla = "SELECT * FROM AHO_Request WHERE Date_Time < $day30 AND Email='{$_REQUEST['Email']}' AND IP_Clean = '{$_SERVER['REMOTE_ADDR']}' AND Agent_ID = {$_REQUEST['AID']} AND is_expired=0";
			$sql_resulta = mysql_query($sqla,$db);
			$rowa = mysql_fetch_object($sql_resulta);
			if($rowa)
			{
				// update the expired record
				 //take credits
				$sql = "SELECT * FROM subscription_periods WHERE type = '31 day' AND time_period = '2' limit 1";
				$sql_result = mysql_query($sql);
				$row = mysql_fetch_array($sql_result);
				$credit_deduct  = $row['no_of_credits']; 
				$query = "UPDATE AHO_User SET credits = credits - {$credit_deduct} WHERE id = '{$_REQUEST['AID']}'";
				$run = mysql_query($query);
				$sql = "UPDATE AHO_Request SET is_expired=1 WHERE id='".$rowa->id."'";
				$query = mysql_query($sql) or die(mysql_error());
			}
			$Phone = $_REQUEST['Phone'];
			$Phone = str_replace('+','',$Phone);
			$Phone = str_replace('(','',$Phone);
			$Phone = str_replace(')','',$Phone);
			$Phone = str_replace('-','',$Phone);
			
			mysql_query("INSERT INTO AHO_Request (Name,Phone,Email,Agent_ID,Date_Time,Property,Comment,IP_Address,IP_Clean) VALUES ('".addslashes($_REQUEST['Name'])."','".addslashes($Phone)."','".addslashes($_REQUEST['Email'])."','".addslashes($_REQUEST['AID'])."','$Date','".addslashes($_REQUEST['AHO_AS'])."','".addslashes($_REQUEST['Comment'])."','".addslashes($_REQUEST['IPaddress'])."','$IP_Clean')"); // added on 3june14
			$request_id = mysql_insert_id();
		}
		/* end here */
		
		$sql = "SELECT * FROM AHO_User WHERE id = '{$_REQUEST['AID']}' ";
		$sql_result = mysql_query($sql,$db);
		$row = mysql_fetch_array($sql_result);
	
		$AEmail = $row["Email_1"];
		$AName = $row["Name"];
		$APhone = $row["Phone_1"];
		$B_ID = $row['B_ID'];
		$AID=$_REQUEST['AID'];
		// agent email starts
		
		// new code for mail
		require 'mail/PHPMailerAutoload.php';
		
		
		// code for agent mail to be sent later
		/*
		
		//Create a new PHPMailer instance
		$mail = new PHPMailer();
		// Set PHPMailer to use the sendmail transport
		$mail->isSendmail();
		//Set who the message is to be sent from
		$mail->setFrom('support@americanhomesonline.com', 'American Homes Online');
		//Set an alternative reply-to address
		$mail->addReplyTo('sameer.chourasia@cisinlabs.com', 'Sameer Chaurasia');
		//Set who the message is to be sent to
		$mail->addAddress($AEmail, $AName);
		//Set the subject line
		$mail->Subject = 'AHO Contact Form from '.$_REQUEST['Email'];
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		   //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
		$mail->msgHTML('<html><head><title>American Homes Online</title></head>
				  <body>
				  
					<b>Consumer Information</b><br>
					Name: '.addslashes($_REQUEST['Name']).'<br>
					Phone: '.addslashes($_REQUEST['Phone']).'<br>
					Email: '.addslashes($_REQUEST['Email']).'<br>
					Comment: '.addslashes($_REQUEST['Comment']).'
				  
				  </body></html>');
		   
		//Replace the plain text body with one created manually
		$mail->AltBody = 'This is a plain-text message body';
		//Attach an image file
		  //$mail->addAttachment('images/phpmailer_mini.png');
		//send the message, check for errors
		$send = $mail->send();
	
		if(!$send){
		  // echo '<center><h3 style="color:#FF3300;">Agent Mail error: </h3></center>'.$mail->ErrorInfo;
		    echo '<center><h3 style="color:#FF3300;">Agent Mail error: </h3></center>';
		}
		else{
			    //echo '<center><h3 style="color:#009933;">Mail sent successfully</h3></center>';        
		}
		// Agent email ends
		
		*/
		$email = $_REQUEST['Email'];
		
		// Consumer email starts
		
		$mail = new PHPMailer();
		// Set PHPMailer to use the sendmail transport
		$mail->isSendmail();
		//Set who the message is to be sent from
		$mail->setFrom('support@americanhomesonline.com', 'American Homes Online');
		//Set an alternative reply-to address
		$mail->addReplyTo('sameer.chourasia@cisinlabs.com', 'Sameer Chaurasia');
		//Set who the message is to be sent to
		$mail->addAddress($email, $_REQUEST['Name']);
		//Set the subject line
		$mail->Subject = 'AHO Contact Form from '.$_REQUEST['Email'];
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		   //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
		  
		$mail->msgHTML("<html><head><title>American Homes Online</title></head>
				  <body>
				  
					<b>Your agent's info</b><br>
					Name: ".addslashes($AName)."<br>
				       Phone: ".addslashes($APhone)."<br>
				       Email: ".addslashes($AEmail)."<br>
				       Click <a href='".$_REQUEST['AHO_AS']."&AID=".$AID."&Request=".$request_id."'>here</a> to see Agents Profile.
				       
				  
				  </body></html>");
		   
		//Replace the plain text body with one created manually
		$mail->AltBody = 'This is a plain-text message body';
		//Attach an image file
		  //$mail->addAttachment('images/phpmailer_mini.png');
		//send the message, check for errors
		$send = $mail->send();
		if(!$send){
		echo '<center><h3 style="color:#FF3300;">Consumer Mail error: </h3></center>'.$mail->ErrorInfo;
		}
		else{
			
			    echo "<center><h4 style='color:#00ff00;'>Please go to your email to confirm that you are not a robot. (If you do not see email, check your spam)</h4></center>";
			    //header("location:index.php?address=".$_REQUEST['address']."&Search=Search&Buy=Buy");
		}
		// consumer email ends
	
		// TAKE CREDIT FROM AGENT //
			$AIDdelete = $_REQUEST['AID'];
			$day30 = date("YmdHis", mktime(0, 0, 0, date("m"), date("d")-30,  date("Y")));
			
		// END TAKE CREDIT //
			
		/*require('tw/Services/Twilio.php');
	
		$account_sid = 'AC7728951e7d8b3b31c7275adb4e4002e5';
		$auth_token = '8e592234882788ddfac3a4336cfba000';
		$client = new Services_Twilio($account_sid, $auth_token);
		$find = array("(",")","+","-");
		$replace = '';
		$APhone = str_replace($find,$replace,$APhone);
		
		$client->account->messages->create(array(
				'To' => "$APhone",
				'From' => "+17024255249",
				'Body' => "
				Client would like a call
				Name: ".addslashes($_REQUEST['Name'])."
				Phone: ".addslashes($_REQUEST['Phone'])."
				Email: ".addslashes($_REQUEST['Email']),
	
		));*/
		/*$client = new Services_Twilio($account_sid, $auth_token);
				
		// Start sam
		$phone_clean = addslashes($_REQUEST['Phone']);
		$find = array("(",")","+","-");
		$replace = '';
		$phone_clean = str_replace($find,$replace,$phone_clean);
		$client = new Services_Twilio($account_sid, $auth_token);
	
		$client->account->messages->create(array(
				'To' => "$phone_clean",
				'From' => "+17024255249",
				'Body' => "
				Your agent's info
				Agent Name: $AName
				Phone: $APhone
				Email: $AEmail",
	
		));*/
		//	End sam
	
	
		$sql = "
			SELECT
					id
			FROM AHO_User
			WHERE B_ID = 0
				AND credits >= {$credits}
		";
		$result = mysql_query($sql,$db);
		$broker_array = array();
		while ($row = mysql_fetch_array($result))
		{
			$broker_array[] = $row['id'];
		}
		$sql = "SELECT *,
				SQRT(POW((69.1 * (GEO_Lat - $Lat)) , 2 ) +
				POW((53 * (GEO_Long - $Long)), 2)) AS distance
					FROM AHO_User WHERE B_ID LIKE '$APPid'
					" . (($exclude) ? "AND credits>=1 AND Type=3 AND B_ID NOT IN $excludes": "") ."
	
					$Middle
					
					". "ORDER BY distance ASC Limit 3";
					
		$sql_result = mysql_query($sql,$db);
		$num_rows = mysql_num_rows($sql_result);
		
		$count = 0;
		if($num_rows >= 1){
			while($row = mysql_fetch_array($sql_result)){
					//print_r($row); exit("Success");
			    $MilesR = $row['distance'];
				    if($MilesR > 3000){
					$Name= '';
					break;
		
				    }else{
					$count++;
				    }
			  }
		}
		print"
		<span class='agenth2'>".$count ." Closest Agents</span>  
		<div class='agentbox'>"; // agents box starts
			if($num_rows > 0){
				$sql = "SELECT *,
				SQRT(POW((69.1 * (GEO_Lat - $Lat)) , 2 ) +
				POW((53 * (GEO_Long - $Long)), 2)) AS distance
				FROM AHO_User WHERE B_ID LIKE '$APPid'
				" . (($exclude) ? "AND credits>=1 AND Type=3 AND B_ID NOT IN $excludes": "") . "
				$Middle
				". "ORDER BY distance ASC Limit 3";
				$sql_result = mysql_query($sql,$db);
				while($row = mysql_fetch_array($sql_result)){
					$Name = $row['Name'];
					$ID = $row['id'];
					$IMG = $row['Image'];
					$MilesR = $row['distance'];
					$Miles = number_format($row['distance'],2);
					$IMGF = $row['Image_File'];
					if($IMGF != '' && $IMG == ''){
						$IMG = "admin/aho-ui/content/userfiles/$IMGF";
					}
					if($MilesR > 3000){
						$Name= '';
						break;
					}
					else{
						$count++;
					}	
					$Web = $row["Web"];
					if($Web != ''){
						$Website_Name = 'Website';
					}
					else{
						$Website_Name = 'No Website';
					}
					if($IMG == ''){
						$IMG = 'http://openclipart.org/people/thekua/1367934593.svg';
					}
					if(strlen($IMG)<=0 || !file_exists($IMG)){
						$IMG = 'images/dpic.jpg';
					}
					$day30 = date("YmdHis", mktime(0, 0, 0, date("m"), date("d")-30,  date("Y")));
					$sqla = "SELECT * FROM AHO_Request WHERE Date_Time > $day30 AND IP_Clean = '{$_SERVER['REMOTE_ADDR']}' AND Agent_ID = '$ID' LIMIT 1 ";
					$sql_resulta = mysql_query($sqla,$db);
					$rowa = mysql_fetch_array($sql_resulta);
					$Check_ID = $rowa["Agent_ID"];
					$LB = $row['B_ID'];
					$sqlb = "SELECT * FROM AHO_User WHERE id = $LB 	$Middle ";
					$sql_resultb = mysql_query($sqlb,$db);
					$rowb = mysql_fetch_array($sql_resultb);
					$Broker_Name = $rowb["Name"];
					print "
					<div class='agentbox1'>
						<div style='width:100px;height:125px;float:left;'>
							<div style='width:100px;height:150px;background-image:url($IMG);background-size: 150px;background-position:center top; '> 
							</div>
						</div>
						<div style='width:170px;float:left;padding:15px;padding-top:8px;text-align:left'>
							<span style='color:#1982d1;font-weight:bolder;font-size:15px;'>
								<h1>$Name</h1>
							</span>
							$Broker_Name
							<br>
							<span class='red'>
							<b>$Miles miles away</b>
							</span>
							<br>";
							if($Check_ID == $ID){
							print "
								<br>
								<div class='cewbtn'>
								<img src='aho/32-iphone-icon.png' style='vertical-align:middle;'>
								<span style='font-weight:bolder;color:#1982d1;font-size:15px;'>
									{$row[Phone_1]}
								</span>
								</div>
								<br>
								<a href='aho.php' class='AHO_Email' id='$ID'>
									<img src='aho/18-envelope-icon.png' style='vertical-align:middle;'>
									<span style=' '>Email</span>
								</a>
								&nbsp;&nbsp;&nbsp;
								<a href='$Web' target='_blank' id='$ID'>
									<img src='aho/iconmonstr-home-icon-16.png' style='vertical-align:middle;'>
									<span style='f'>$Website_Name</span>
								</a>";
		
							}
							else
							{
								print "
								<br>
								<a href='aho.ph' class='AHO_Call'  id='$ID'>
									<img src='aho/32-iphone-icon.png' style='vertical-align:middle;'> Call
								</a>
								<br>
								<a href='aho.ph' class='AHO_Email' id='$ID'>
									<img src='aho/18-envelope-icon.png' style='vertical-align:middle;'> Email
								</a>
								&nbsp;&nbsp;&nbsp;
								<a href='aho.ph' class='AHO_Email' id='$ID'>
									<img src='aho/iconmonstr-home-icon-16.png' style='vertical-align:middle;'>
									$Website_Name
								</a>";
							}
	
							print "
						</div>
						<div style='clear:both'></div>
					</div>";
				}
				if($count == 0){
							
					print "
					<div style='width:300px;-moz-border-radius: 5px;-webkit-border-radius: 5px;border-radius: 5px;-khtml-border-radius: 5px;border-color:#1982d1;border-width:5px;border-style:solid;overflow: hidden;background-color:$Color1;margin-bottom:5px;font-family:Arial, Helvetica, sans-serif;font-size:12px;margin-right:auto;margin-left:auto;height:160px;line-height:18px;'>
						<h1>It looks like we don't have an agent in your area quite yet.</h1>
					</div>";
				}
			}
			else{
				if($Name == ''){
		
					print "
					<div style='width:300px;-moz-border-radius: 5px;-webkit-border-radius: 5px;border-radius: 5px;-khtml-border-radius: 5px;border-color:#1982d1;border-width:5px;border-style:solid;overflow: hidden;background-color:$Color1;margin-bottom:5px;font-family:Arial, Helvetica, sans-serif;font-size:12px;margin-right:auto;margin-left:auto;height:160px;line-height:18px;'>
						<h1>It looks like we don't have an agent in your area quite yet.</h1>
					</div>";
				}
			}	
			print "
		</div>"; // agents box ends
			  
			  
		
	
	}
	?>
<script>
	$(document).ready(function(){
		$("#Phone").keypress(function(e){
			
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
			var cell_no = $("#Phone").val();
			if (cell_no.length==1) {
					cell_no='('+cell_no;
					$("#Phone").val(cell_no);
			}
			else if(cell_no.length==4) {
					cell_no=cell_no+')';
					$("#Phone").val(cell_no);
			}
			else if(cell_no.length==8) {
					cell_no=cell_no+'-';
					$("#Phone").val(cell_no);
			}
			if (cell_no.length>12) {
					if(e.which==13 ||e.which==0){
							return true;
					}
					else{
							return false;
					}
			}
		});	
	});
</script>