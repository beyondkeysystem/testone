<?php

$db = mysql_connect("localhost", 'ahomain', ',O8bOcL6JUXK') or die(); // original

//$db = mysql_connect("127.0.0.1", 'root', '') or die();
//$db = mysql_connect("127.0.0.1", 'cakejobportal', 'yeTunMpvLPtdeGZ5') or die(); 
mysql_select_db('ahomain_las_rc',$db); // original

if(isset($_REQUEST['Email_Verification']) && $_REQUEST['Email_Verification']==1)
	{
    	$consumer_id = $_REQUEST['Request_ID'];
    	if(!empty($consumer_id)){
    		$sql = "select * from AHO_Request where ID=$consumer_id";
        	$query = mysql_query($sql) or die(mysql_error());
        	if($query && mysql_num_rows($query)>0){
            	$request = mysql_fetch_object($query);
            	// echo print_r($request);die;
            	// code if not already verified
            	if($request->is_expired!=1){
					/* start here */
					//check if the user has already contacted the same agent
					
					$Email_ID = $request->Email;
                	$Full_Name = $request->Name;
                	$Registration_Date = strtotime($request->Date_Time);
                	$Phone_No = str_replace('(','',$request->Phone); 
                	$Comment = $request->Comment;
                	$IP_Clean = $request->IP_Clean;
                	$Agent_ID = $request->Agent_ID;
                	$Property = $request->Property;

					$sql_result_date = "SELECT Date_Time FROM AHO_Request WHERE Email='{$Email_ID}' AND IP_Clean = '{$IP_Clean}' AND Agent_ID='{$Agent_ID}'";
					$sql_result_date = mysql_query($sql_result_date,$db);
					$row_date = mysql_fetch_array($sql_result_date);
				       
					//$day30 = date("YmdHis", mktime(0, 0, 0, date("m"), date("d")-15,  date("Y")));
					$day30 = date("YmdHis", mktime(0, 0, 0, date("m"), date("d")+30,  date("Y")));
						       
					// code for checking expired requests and update credit added on 3 June14
				       
					$sqla = "SELECT * FROM AHO_Request WHERE Date_Time < $day30 AND Email='{$Email_ID}' AND IP_Clean = '{$IP_Clean}' AND Agent_ID = {$Agent_ID} AND is_expired=0";
					$sql_resulta = mysql_query($sqla,$db);
					$rowa = mysql_fetch_object($sql_resulta);
					if($rowa)
					{
						// update the expired record
						 //take credits
						$sql = "SELECT * FROM subscription_periods WHERE type = '15 day' AND time_period = '2' limit 1";
						$sql_result = mysql_query($sql);
						$row = mysql_fetch_array($sql_result);
						$credit_deduct  = $row['no_of_credits']; 
						$query = "UPDATE AHO_User SET credits = credits - {$credit_deduct} WHERE id = '{$Agent_ID}'";
						$run = mysql_query($query);
						$sql = "UPDATE AHO_Request SET is_expired=1 WHERE id='".$rowa->id."'";
						$query = mysql_query($sql) or die(mysql_error());
					}
					$Phone = $Phone_No;
					$Phone = str_replace('+','',$Phone);
					$Phone = str_replace('(','',$Phone);
					$Phone = str_replace(')','',$Phone);
					$Phone = str_replace('-','',$Phone);
					
				}else{
			        
					   // echo 'already exists'; die;
               	?>
		               <script>
			                window.location="http://www.americanhomesonline.com/index.php?success=2";
		               </script>
                <?php    
				}
				/* end here */
				
				$sql = "SELECT * FROM AHO_User WHERE id = '{$Agent_ID}' ";
				$sql_result = mysql_query($sql,$db);
				$row = mysql_fetch_array($sql_result);

				$AEmail = $row["Email_1"];
				$AName = $row["Name"];
				$APhone = $row["Phone_1"];
				$B_ID = $row['B_ID'];
				// agent email starts
				
				// new code for mail
				require 'mail/PHPMailerAutoload.php';
				
				
				// code for agent mail to be sent later
				
				
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
				$mail->Subject = 'AHO Contact Form from '.$Email_ID;
				//Read an HTML message body from an external file, convert referenced images to embedded,
				//convert HTML into a basic plain-text alternative body
				$mail->msgHTML('<html><head><title>American Homes Online</title></head>
						  <body>
						  
							<b>Consumer Information</b><br>
							Name: '.addslashes($Full_Name).'<br>
							Phone: '.addslashes($Phone_No).'<br>
							Email: '.addslashes($Email_ID).'<br>
							Comment: '.addslashes($Comment).'
						  
						  </body></html>');
				   
				//Replace the plain text body with one created manually
				$mail->AltBody = 'This is a plain-text message body';
				//Attach an image file
				  //$mail->addAttachment('images/phpmailer_mini.png');
				//send the message, check for errors
				$send = $mail->send();
				// Agent email ends



				$email = $Email_ID;
				
				// Consumer email starts

				$mail = new PHPMailer();
				// Set PHPMailer to use the sendmail transport
				$mail->isSendmail();
				//Set who the message is to be sent from
				$mail->setFrom('support@americanhomesonline.com', 'American Homes Online');
				//Set an alternative reply-to address
				$mail->addReplyTo('sameer.chourasia@cisinlabs.com', 'Sameer Chaurasia');
				//Set who the message is to be sent to
				$mail->addAddress($email, $Full_Name);
				//Set the subject line
				$mail->Subject = 'AHO Contact Form from '.$Email_ID;
				//Read an HTML message body from an external file, convert referenced images to embedded,
				//convert HTML into a basic plain-text alternative body
				   //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
				$phone = $APhone;
				$find = array("(",")","+","-");
				$replace = '';
				$phone = str_replace($find,$replace,$phone);
				if(strlen($phone)==13){
					$phone_no = substr($phone,0,3).'+('.substr($phone,3,3).')'.substr($phone,6,3).'-'.substr($phone,9,4);  
				}
				elseif(strlen($phone)==12){
					$phone_no = substr($phone,0,2).'+('.substr($phone,2,3).')'.substr($phone,5,3).'-'.substr($phone,8,4);  
				}
				elseif(strlen($phone)==11){
					$phone_no = substr($phone,0,1).'+('.substr($phone,1,3).')'.substr($phone,4,3).'-'.substr($phone,7,4);  
				}
				elseif(strlen($phone)==10){
					$phone_no = '('.substr($phone,0,3).')'.substr($phone,3,3).'-'.substr($phone,6,4);  
				}
				$mail->msgHTML("<html><head><title>American Homes Online</title></head>
						  <body>
						  
						       <b>Your Agent's Information Is:</b><br>
						       Name: ".addslashes($AName)."<br>
						       Phone: ".addslashes($phone_no)."<br>
						       Email: ".addslashes($AEmail)."<br>
						  </body>
						  </html>");
				//Click <a href='".$_REQUEST['AHO_AS']."&AID=".$AID."&Request=".$request_id."' style='font-weight:bold;color:#ff0000'>here</a> to see Agents Profile.
				//Replace the plain text body with one created manually
				$mail->AltBody = 'This is a plain-text message body';
				//Attach an image file
				  //$mail->addAttachment('images/phpmailer_mini.png');
				//send the message, check for errors
				$send = $mail->send();
				if(!$send){
				?>
				<script>
					// $(function(){
					// 	var overlay = $('<div id="overlay"></div>');
					// 	overlay.show();
					// 	overlay.appendTo(document.body);
					// });
				</script>
				<!-- <div class="error_message" id="popup_msg">
					<div class="messageheading">Error Message: <?php echo $mail->ErrorInfo?></div> 
					<p class="message_content">Consumer Mail error: </p>
					<center><a href="<?php echo $request_id;?>" class="ok" >Ok</a></center>
				</div> -->
				<?php
				}
				
				// consumer email ends

				// TAKE CREDIT FROM AGENT //
					$AIDdelete = $_REQUEST['AID'];
					//$day30 = date("YmdHis", mktime(0, 0, 0, date("m"), date("d")-15,  date("Y")));
					$day30 = date("YmdHis", mktime(0, 0, 0, date("m"), date("d")-7,  date("Y")));
					
				// END TAKE CREDIT //
					
				require('tw/Services/Twilio.php');

				$account_sid = 'AC7728951e7d8b3b31c7275adb4e4002e5';
				$auth_token = '8e592234882788ddfac3a4336cfba000';
				$client = new Services_Twilio($account_sid, $auth_token);
				$find = array("(",")","+","-");
				$replace = '';
				$APhone = str_replace($find,$replace,$APhone); 

				if(strlen($APhone) == 10)
				{
					$APhone = "1$APhone";
				}


				$client->account->messages->create(array(
						'To' => "+$APhone",
						'From' => "+17024255249",
						'Body' => "Consumer Information\nName\n".addslashes($Full_Name)."\nPhone\n".addslashes($phone_no)."\nEmail\n".addslashes($Email_ID)."\nComment\n".addslashes($Comment)."\n".addslashes("Regards\nAmerican Homes Online")

				));
				$client = new Services_Twilio($account_sid, $auth_token);
						
				// Start sam
				$phone_clean = addslashes($phone_no);
				$find = array("(",")","+","-");

				$replace = '';
				$phone_clean = str_replace($find,$replace,$phone_clean);
			        if(strlen($phone_clean) == 10)
				{
					$phone_clean = "1$phone_clean";
				}
				$client = new Services_Twilio($account_sid, $auth_token);

				$client->account->messages->create(array(
						'To' => "+$phone_clean",
						'From' => "+17024255249",
						'Body' => "Your Agent's Information Is\nAgent Name\n$AName\nPhone\n$APhone\nEmail\n$AEmail\n".addslashes("Regards\nAmerican Homes Online")

				));
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
				?>
				<span class='agenth2'><?php echo $count ?> Closest Agents</span>  
				<div class='agentbox'><!-- agents box starts -->
					<?php
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
								$IMG = "../admin/aho-ui/content/userfiles/$IMGF";
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
								$IMG = 'images/dpic.jpg';
							}
							if(strlen($IMG)<=0 || !file_exists($IMG)){
								$IMG = 'images/dpic.jpg';
							}
							//$day30 = date("YmdHis", mktime(0, 0, 0, date("m"), date("d")-15,  date("Y")));
							$day30 = date("YmdHis", mktime(0, 0, 0, date("m"), date("d")-7,  date("Y")));
							$sqla = "SELECT * FROM AHO_Request WHERE Date_Time > $day30 AND IP_Clean = '{$_SERVER['REMOTE_ADDR']}' AND Agent_ID = '$ID' LIMIT 1 ";
							$sql_resulta = mysql_query($sqla,$db);
							$rowa = mysql_fetch_array($sql_resulta);
							$Check_ID = $rowa["Agent_ID"];
							$status = $rowa['is_expired'];
							$LB = $row['B_ID'];
							$sqlb = "SELECT * FROM AHO_User WHERE id = $LB 	$Middle ";
							$sql_resultb = mysql_query($sqlb,$db);
							$rowb = mysql_fetch_array($sql_resultb);
							$Broker_Name = $rowb["Name"];
							?>
							<div class='agentbox1'><!--agentbox1 starts-->
								<div class='cewleft'>
									<div class='cewleft-inner'>
										<img src='<?php echo $IMG;?>' width='120' height='140'>
									</div>
								</div>
								<div class='cewright'>
									<span class='bluespan'>
										<h1><?php echo $Name;?></h1>
									</span>
									<span class='red'>
										<b><?php echo $Miles?> miles away</b>
									</span>
									<p>Contact me today for all your real estate needs!</p>
								</div>
								<div class="clearfix"></div>
									<?php
									if($Check_ID == $ID && $status == 1){
						
										if(strlen($row['Phone_1'])>0 && $status == 1){
											$phone = $row['Phone_1'];
											$find = array("(",")","+","-");
											$replace = '';
											$phone = str_replace($find,$replace,$phone);
											if(strlen($phone)==13){
												$phone_no = substr($phone,0,3).'+('.substr($phone,3,3).')'.substr($phone,6,3).'-'.substr($phone,9,4);  
											}
											elseif(strlen($phone)==12){
												$phone_no = substr($phone,0,2).'+('.substr($phone,2,3).')'.substr($phone,5,3).'-'.substr($phone,8,4);  
											}
											elseif(strlen($phone)==11){
												$phone_no = substr($phone,0,1).'+('.substr($phone,1,3).')'.substr($phone,4,3).'-'.substr($phone,7,4);  
											}
											elseif(strlen($phone)==10){
												$phone_no = '('.substr($phone,0,3).')'.substr($phone,3,3).'-'.substr($phone,6,4);  
											}
										}
										else{
											$phone='';
										}
										?>
								<div class='cewbtn'>
									<!--<a href='aho.php' class='AHO_Call' id='<?php echo  $ID;?>'>-->
									<!--<div class="AHO_Call" id="<?php echo  $ID;?>">
										<div style='background-color: #ffffff;color: #000000;font-size: 15px;font-weight: bolder;height: 23px;margin: -3px;'><a href="javascript:void(0)"><?php echo $phone_no;?></a></div>
									</div>-->
									<div class="AHO_Call1" id="<?php echo  $ID;?>">
										<div style='background-color: #ffffff;color: #000000;font-size: 15px;font-weight: bolder;height: 23px;margin: -3px;'><a href="javascript:" onclick="call_agent(<?php echo $row['Phone_1'];?>);"><?php echo $phone_no;?></a></div>
									</div>
									
									<!--</a>-->	
								
									<!--<a href='aho.php' class='AHO_Email' id='<?php echo  $ID;?>'> -->
									<div class='AHO_Email1' id='<?php echo  $ID;?>'> 
										<!--<div style='background-color: #ffffff;color: #000000;font-size: 15px;font-weight: bolder;height: 23px;margin: -3px;'><a href="javascript:void(0)"><?php echo $row['Email_1'];?></a></div>-->
										<div style='background-color: #ffffff;color: #000000;font-size: 15px;font-weight: bolder;height: 23px;margin: -3px;'><a href="mailto:<?php echo $row['Email_1'];?>?Subject=Consumer%20Mail%20from%20American%20Homes%20Online" target="_parent"><?php echo $row['Email_1'];?></a></div>		
									</div>
									<!--</a>-->
								</div>		<?php
									}
									else{
										?>
								<div class='cewbtn'>   
									<a href='aho.php' class='AHO_Call'  id='<?php echo $ID;?>'>  
										<img src='aho/32-iphone-icon.png' style='vertical-align:middle;'> Call
									</a> 
									<a href='aho.php' class='AHO_Email' id='<?php echo $ID;?>'>
										<img src='aho/18-envelope-icon.png' style='vertical-align:middle;'>
										<span >Email</span>  
									</a>
								</div>
									
										<?php
									}	?>
								<div style='clear:both'></div>
							</div><?php
								
								//agentbox1 ends
							
						}
						if($count == 0){
									
							?>
							<!--<div style='width:300px;-moz-border-radius: 5px;-webkit-border-radius: 5px;border-radius: 5px;-khtml-border-radius: 5px;border-color:#1982d1;border-width:5px;border-style:solid;overflow: hidden;background-color:#ffffff;margin-bottom:5px;font-family:Arial, Helvetica, sans-serif;font-size:12px;margin-right:auto;margin-left:auto;height:160px;line-height:18px;'>
								<h1>It looks like we don't have an agent in your area quite yet.</h1>
							</div> -->
					<?php
						}
					}
					else{
						if($Name == ''){
				
							?>
							<!--<div style='width:300px;-moz-border-radius: 5px;-webkit-border-radius: 5px;border-radius: 5px;-khtml-border-radius: 5px;border-color:#1982d1;border-width:5px;border-style:solid;overflow: hidden;background-color:$Color1;margin-bottom:5px;font-family:Arial, Helvetica, sans-serif;font-size:12px;margin-right:auto;margin-left:auto;height:160px;line-height:18px;'>
								<h1>It looks like we don't have an agent in your area quite yet.</h1>
							</div> -->

							<?php
						}
					}	
					
				
				    // code to send mail to the searched agents ends
        		    header("location:http://www.americanhomesonline.com/index.php?success=1");
					echo '<script>window.location = "http://www.americanhomesonline.com/index.php?success=1";</script>';

        	  
					}else{
			            header("location:http://www.americanhomesonline.com/index.php?success=0");
						echo '<script>window.location = "http://www.americanhomesonline.com/index.php?success=0";</script>';

			        }
				}
				?>	  
			</div><?php // agents box ends
			// code to send mail to the searched agents ends
			// header("location:http://www.americanhomesonline.com/index.php?success=1");
			// echo '<script>window.location = "http://www.americanhomesonline.com/index.php?success=1";</script>';

	}
?>

<style>
	.noagent{
		font-family: caption;
		padding-bottom: 10%;
		padding-left: 10%;
		padding-right: 10%;
		padding-top: 10%;
	}
	
</style>
<?php
// NV FILE //
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
	/* original
	$sql = "SELECT *,
	SQRT(POW((69.1 * (GEO_Lat - $Lat)) , 2 ) +
	POW((53 * (GEO_Long - $Long)), 2)) AS distance
	FROM AHO_User WHERE Availability LIKE('%$today%') AND B_ID LIKE '$APPid'
	" . (($exclude) ? "AND credits>=1 AND Type=3 AND B_ID NOT IN $excludes" : "") . "

	$Middle
	
	". "ORDER BY distance ASC Limit 3";
	*/
	$sql = "SELECT *,
	SQRT(POW((69.1 * (GEO_Lat - $Lat)) , 2 ) +
	POW((53 * (GEO_Long - $Long)), 2)) AS distance
	FROM AHO_User WHERE Availability LIKE('%$today%') AND credits>=2 AND Type=3 $Middle ORDER BY distance ASC Limit 3";
	
	
					
	$sql_result = mysql_query($sql,$db);
	$num_rows = mysql_num_rows($sql_result);
	$count = 0;
	while($row = mysql_fetch_array($sql_result)){
			
		$MilesR = $row['distance'];
		if($MilesR > 25){
					    
		    $Name= '';
		    break;

		}else{
		      $count++;
		    
		}
	}
	if($count>1){
	      $txt = "Agents";
	}
	else{
	      $txt = "Agent";
	}
	?>
	<span class='agenth2'><?php echo $count ." Closest ".$txt;?></span>
	<div class='agentbox'>
		<?php
		// agents box start
		if($num_rows > 0){
			$today = date('w');
			
			/* original
			$sql = "SELECT *,
			SQRT(POW((69.1 * (GEO_Lat - $Lat)) , 2 ) +
			POW((53 * (GEO_Long - $Long)), 2)) AS distance
			FROM AHO_User WHERE  Availability LIKE('%$today%') AND B_ID LIKE '$APPid'
			" . (($exclude) ? "AND credits>=1 AND Type=3 AND B_ID NOT IN $excludes" : "") . "
			$Middle " . " ORDER BY distance ASC Limit 3";
			
			*/
			
			
			$sql = "SELECT *,
			SQRT(POW((69.1 * (GEO_Lat - $Lat)) , 2 ) +
			POW((53 * (GEO_Long - $Long)), 2)) AS distance
			FROM AHO_User WHERE  Availability LIKE('%$today%') AND credits>=2 AND Type=3 $Middle  ORDER BY distance ASC Limit 3";
			
			
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
					$IMG = 'images/dpic.jpg';
				}
				
				$MilesR = $row['distance'];
				/* start here */
				if($MilesR <= 25){
					$Miles = number_format($row['distance'],2);
					$Web = $row["Web"];
					if($Web != ''){
						$Website_Name = 'Website';
					}
					else{
						$Website_Name = 'No Website</a>';
					}
					//$day30 = date("YmdHis", mktime(0, 0, 0, date("m"), date("d")-15,  date("Y")));
					$day30 = date("YmdHis", mktime(0, 0, 0, date("m"), date("d")-7,  date("Y"))); //Date frequency of 7 days
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
					$status = $rowa['is_expired'];
					
					?>
					<div class='agentbox1'> <!--agentbox1 starts -->
						<div class='cewleft'>
							<div class='cewleft-inner'>
								<img src='<?php echo $IMG;?>' width='120' height='140'>
							</div>
						</div>
						<div class='cewright'>
							<span class='bluespan'>
								<h1><?php echo $Name;?></h1>
							</span>
							<span class='red'>
								<b><?php echo $Miles?> miles away</b>
							</span>
							<p>Contact me today for all your real estate needs!</p>
						</div>
						<div class="clearfix"></div>
							<?php
							if($Check_ID == $ID && $status == 1){
				
								if(strlen($row['Phone_1'])>0){
									$phone = $row['Phone_1'];
									$find = array("(",")","+","-");
									$replace = '';
									$phone = str_replace($find,$replace,$phone);
									if(strlen($phone)==13){
										$phone_no = substr($phone,0,3).'+('.substr($phone,3,3).')'.substr($phone,6,3).'-'.substr($phone,9,4);  
									}
									elseif(strlen($phone)==12){
										$phone_no = substr($phone,0,2).'+('.substr($phone,2,3).')'.substr($phone,5,3).'-'.substr($phone,8,4);  
									}
									elseif(strlen($phone)==11){
										$phone_no = substr($phone,0,1).'+('.substr($phone,1,3).')'.substr($phone,4,3).'-'.substr($phone,7,4);  
									}
									elseif(strlen($phone)==10){
										$phone_no = '('.substr($phone,0,3).')'.substr($phone,3,3).'-'.substr($phone,6,4);  
									}
								}
								else{
									$phone='';
								}
								?>
						<div class='cewbtn'>
							<!--<a href='aho.php' class='AHO_Call' id='<?php echo  $ID;?>'>
								<div style='background-color: #ffffff;color: #000000;font-size: 15px;font-weight: bolder;height: 23px;margin: -3px;'><?php echo $phone_no;?></div>
							</a>-->
							<!--<a href='aho.php' class='AHO_Email' id='<?php echo  $ID;?>'>
								<div style='background-color: #ffffff;color: #000000;font-size: 15px;font-weight: bolder;height: 23px;margin: -3px;'><?php echo $row['Email_1'];?></div>
							</a>--> 
							<!--<div class="AHO_Call" id="<?php echo  $ID;?>">
								<div style='background-color: #ffffff;color: #000000;font-size: 15px;font-weight: bolder;height: 23px;margin: -3px;'><a href="javascript:void(0)"><?php echo $phone_no;?></a></div>
							</div>	-->
							<div class="AHO_Call1" id="<?php echo  $ID;?>">
								<div style='background-color: #ffffff;color: #000000;font-size: 15px;font-weight: bolder;height: 23px;margin: -3px;'><a href="javascript:" onclick="call_agent(<?php echo $row['Phone_1'];?>);"><?php echo $phone_no;?></a></div>
							</div>
							
							<div class='AHO_Email1' id='<?php echo  $ID;?>'> 
								<!--<div style='background-color: #ffffff;color: #000000;font-size: 15px;font-weight: bolder;height: 23px;margin: -3px;'><a href="javascript:void(0)"><?php echo $row['Email_1'];?></a></div>-->
								<div style='background-color: #ffffff;color: #000000;font-size: 15px;font-weight: bolder;height: 23px;margin: -3px;'><a href="mailto:<?php echo $row['Email_1'];?>?Subject=Consumer%20Mail%20from%20American%20Homes%20Online"  target="_parent"><?php echo $row['Email_1'];?></a></div>
							</div>
							
						</div>		<?php
							}
							else{
							?>
						
						<div class='cewbtn'>   
							<a href='aho.php' class='AHO_Call'  id='<?php echo $ID;?>'>  
								<img src='aho/32-iphone-icon.png' style='vertical-align:middle;'> Call
							</a> 
							<a href='aho.php' class='AHO_Email' id='<?php echo $ID;?>'>
								<img src='aho/18-envelope-icon.png' style='vertical-align:middle;'>
								<span >Email</span>  
							</a>
						</div>
							
								<?php
							}	?>
						<div style='clear:both'></div>
					</div><?php
						
						//agentbox1 ends
				} 
			}
			if($count == 0){
				?>
				<div style='width:300px;-moz-border-radius: 5px;-webkit-border-radius: 5px;border-radius: 5px;-khtml-border-radius: 5px;border-color:#1982d1;border-width:5px;border-style:solid;overflow: hidden;margin-bottom:5px;font-family:Arial, Helvetica, sans-serif;font-size:12px;margin-right:auto;margin-left:auto;height:160px;line-height:18px;background-color: #ffffff;'>
					<h1 class="noagent">  It looks like we don't have an agent in your area quite yet. <br/><br/> Call (888) 246-2928 Ext. 101 </h1>
				</div>
				<?php
			}
		}
		else {

	    ?>
		   
		    <div style='width:300px;-moz-border-radius: 5px;-webkit-border-radius: 5px;border-radius: 5px;-khtml-border-radius: 5px;border-color:#1982d1;border-width:5px;border-style:solid;overflow: hidden;background-color:#ffffff;margin-bottom:5px;font-family:Arial, Helvetica, sans-serif;font-size:12px;margin-right:auto;margin-left:auto;height:160px;line-height:18px;'>
			<h1 class="noagent">  It looks like we don't have an agent in your area quite yet. <br/><br/> Call (888) 246-2928 Ext. 101 </h1>
		    </div>
	   <?php
		}?>
	</div> <!-- agents box ends-->
		<?php
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
		$IMG = 'images/dpic.jpg';
	}
	?> 
	<div class='agentbox'>
		<div class='agentbox1'>
			<div class='cewleft'>
				<div class='cewleft-inner'>
					<img src='<?php echo $IMG;?>' width='120' height='140'>
				</div>
			</div>
			<div class='cewright'>
				<span class='bluespan'>
					<h1><?php echo $Name;?></h1>
				</span>
				<span class='red'>
					<b><?php echo $Miles;?> miles away</b>
				</span>
				<span class='red'>
					<p>Please fill in the form & receive agent's info.</p>
				</span>
		
			</div>
			<div style='clear:both'> </div>
			<div class='closest-form'>
				<div>
					<span style='color:red'>*</span>First Name:<input type='text' value='<?php echo $_SESSION["form_name"];?>' style='width: 95%;' id='Name' class='former' name='Name'>
					<span style='color:red'>*</span>Cell Phone:<input placeholder="Country Code + (555)555-5555" Name='Phone' class='former' id='Phone' type='text' style='width:95%' value='<?php echo $_SESSION['form_phone'];?>'>
					<span style='color:red'>*</span>Email:<input 	Name='Email' class='former' id='Email' type='text' style='width:95%' value='<?php echo $_SESSION['form_email'];?>'>
					Comments or Suggestions?
					<textarea style='width:95%;height:60px;' id='Comment' name='Comment'></textarea>
					<input 	type='hidden' ame='AID' id='AID' value='<?php echo $_REQUEST['AID'];?>'>
					<input 	type='hidden' name='AHO_AS' id='AHO_AS' value='<?php echo $_REQUEST['AHO_AS'];?>'>
					<b>Fill out the form completely.</b>
					<div style='display:block' id='regs'>
						<input type='submit' value='Send' id='Send' class='closest-submitbtn'>
					</div>
				</div>	
		
			</form>
			<p class='back-btn'><a href='aho.php' class='AHO_Back'  id='$ID'><< back</a>	</p>
		</div>
	</div>
	<?php
	
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
	
/*New Code Date 29.11.14*/

	require 'mail/PHPMailerAutoload.php';
	// if(isset($_POST['send_request']) && $_POST['send_request']=='Submit'){
	    
	    $find = array("(",")","+","-");
	    $replace = '';
	    $Phone_No = str_replace($find,$replace,$_REQUEST['Phone']);
	    $Email_ID = $_REQUEST['Email'];
	    $Full_Name = $_REQUEST['Name'];
	    $Comment = $_REQUEST['Comment'];
		$AID = $_REQUEST['AID'];
		$AHO_AS_string = urldecode($AHO_AS);

    	$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
        $output= json_decode($geocode);
        $lat = $output->results[0]->geometry->location->lat;
        $long = $output->results[0]->geometry->location->lng;
		$Date = date('YmdHis');
		
    	
	    
	    // $sql = "insert into AHO_Consumers (Phone_No,Full_Name,Email_ID,Comment,Property_Description,GEO_Lat,GEO_Long,Agent_ID) VALUES('$Phone_No','$Full_Name','$Email_ID','$Comment','$AHO_AS_string','$lat','$long','$AID')";
	    $sql = "insert into AHO_Request (Name, Phone, Email,Agent_ID,Date_Time,IP_Address,Property,Comment,IP_Clean,is_expired) 
	    		VALUES('$Full_Name','$Phone_No','$Email_ID',$AID,'$Date','".addslashes($_REQUEST['IPaddress'])."','".addslashes($_REQUEST['AHO_AS'])."','$Comment','$IP_Clean','0')";
	    $query = mysql_query($sql) or die(mysql_error());
	    if($query){
	    
	        // code for email varification starts
	        $consumer_id = mysql_insert_id();
	              
	        $mail = new PHPMailer();
	        // Set PHPMailer to use the sendmail transport
	        $mail->isSendmail();
	        //Set who the message is to be sent from
	        $mail->setFrom('support@americanhomesonline.com', 'American Homes Online');
	        //Set an alternative reply-to address
	        $mail->addReplyTo('sameer.chourasia@cisinlabs.com', 'Sameer Chaurasia');
	        //Set who the message is to be sent to
	        $mail->addAddress($Email_ID, $Full_Name);
	        //Set the subject line
	        $mail->Subject = 'Email ID & Property Request Verification';
	        //Read an HTML message body from an external file, convert referenced images to embedded,
	        //convert HTML into a basic plain-text alternative body
	           //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
	        
		$phone = $Phone_No;
		$find = array("(",")","+","-");
		$replace = '';
		$phone = str_replace($find,$replace,$phone);
		if(strlen($phone)==13){
			$phone_no = substr($phone,0,3).'+('.substr($phone,3,3).')'.substr($phone,6,3).'-'.substr($phone,9,4);  
		}
		elseif(strlen($phone)==12){
			$phone_no = substr($phone,0,2).'+('.substr($phone,2,3).')'.substr($phone,5,3).'-'.substr($phone,8,4);  
		}
		elseif(strlen($phone)==11){
			$phone_no = substr($phone,0,1).'+('.substr($phone,1,3).')'.substr($phone,4,3).'-'.substr($phone,7,4);  
		}
		elseif(strlen($phone)==10){
			$phone_no = '('.substr($phone,0,3).')'.substr($phone,3,3).'-'.substr($phone,6,4);  
		}
	        else{
	            $phone_no='';
	        }
	        
	      
	        date_default_timezone_set('America/Los_Angeles');
	        $sending_time = date('d-M-Y h:i:s');
	        $message='
	        <html>
	        <head><title>American Homes Online</title></head>
	        <body>
	                          
	            <p>Hello '.$Full_Name.'</p>
	            <p>Please click <a href="http://www.americanhomesonline.com/aho/aho.php?Email_Verification=1&Request_ID='.$consumer_id.'&AID='.$AID.'" style="color:#ff0000;font-weight:bold;">here</a> to Verify Your Email ID.</p>
	            <table style="width:100%;">
	            <tr>
	              <td style="font-weight:bold;width:30%;"><strong>Email ID</strong></td><td>'.$Email_ID.'</td>
	            </tr>
	            <tr>
	              <td style="font-weight:bold;"><strong>Cell No</strong></td><td>'.$phone_no.'</td>
	            </tr>
	            <tr>
	              <td style="font-weight:bold;"><strong>Location:</strong></td><td>'.$AHO_AS_string.'</td>
	            </tr>
	            ';
	            $message.='
	            <tr>
	                <td style="font-weight:bold;"><strong>Summarize:</strong></td><td>'.$Comment.'</td>
	            </tr>
	            <tr>
	                <td colspan="2">You have requested for the property on <a href="http://www.americanhomesonline.com">American Homes Online</a> on '.$sending_time.' (PDT). </td>
	            </tr>
	            <tr>
	              <td colspan="2">Regards<br><a href="http://www.americanhomesonline.com">American Homes Online</a></td>
	            </tr>
	            </table>
	        </body>
	        </html>';   
	        $mail->msgHTML($message);
	           
	        //Replace the plain text body with one created manually
	        $mail->AltBody = 'This is a plain-text message body';
	        //Attach an image file
	          //$mail->addAttachment('images/phpmailer_mini.png');
	        //send the message, check for errors
	        $flag = $mail->send();
	       
	        if(!$flag){
				?>
				<script>
					$(function(){
						var overlay = $('<div id="overlay"></div>');
						overlay.show();
						overlay.appendTo(document.body);
					});
					/*getHighestZ();
					$('#popup_msg').click(function(){
					   if (highest_z_index > $(this).css('z-index')){
							$(this).css('z-index',++highest_z_index);
					   }
					});
					startModal('popup_msg');*/
					
				</script>
				<div class="error_message" id="popup_msg">
					<div class="messageheading">Error Message: <?php echo $mail->ErrorInfo?></div> 
					<p class="message_content">Consumer Mail error: </p>
					<center><a href="<?php echo $_REQUEST['AHO_AS'];?>" class="ok" >Ok</a></center>
				</div>
				<?php
				}
				else{
					?>
				<script>
					$(function(){
						var overlay = $('<div id="overlay"></div>');
						overlay.show();
						overlay.appendTo(document.body);
			                        $( "#popup_msg" ).insertBefore( "#overlay" );
					});
					/*getHighestZ();*/
					/*$('#popup_msg').click(function(){
					   if (highest_z_index > $(this).css('z-index')){
							$(this).css('z-index',++highest_z_index);
					   }
					});*/
					//startModal('popup_msg');
					
				</script>
				
				<div class="success_message" id="popup_msg">
					<div class="messageheading" >Success Message</div>
					<p class="message_content">Please check your email and click <b><font  style="color:#ff0000"><u>link</u></font></b> to confirm you are not a robot.<br>(Check Spam If You Do Not Receive Email)</p>
					<center><a href="<?php echo $_REQUEST['AHO_AS'];?>" class="ok" >Ok</a></center>
				</div>
				<?php
				}

	        // code to sent text message
    		$account_sid = 'AC7728951e7d8b3b31c7275adb4e4002e5';
			$auth_token = '8e592234882788ddfac3a4336cfba000';
			
			require('tw/Services/Twilio.php');
	        $client = new Services_Twilio($account_sid, $auth_token);
		$find = array("(",")","+","-");
		$replace = '';
		$cPhone = str_replace($find,$replace,$phone_no); 

		if(strlen($cPhone) == 10)
		{
			$cPhone = "1$cPhone";
		}

	            if($Request_Type==1||$Request_Type==2){
	                $message=' Price: $'.$Min_Price.' To $'.$Max_Price.' Min. Square Feet:'.$Area;
	            }
	            $message.=' Bedrooms:'.$Bedrooms.' Bathrooms:'.$Bathrooms;
	            
	            if($Request_Type==1){
	                $message.=' Lot_Size:'.$Lot_Size.' Sq. Feet Year Built:'.$Year_Built;
	            }
	            if($Request_Type==2){
	                $message.=' Pets:'.$Pets.' Timeframe:'.$Time_Frame;
	            }      
		/*$client->account->messages->create(array(
				'To' => "+$cPhone",
				'From' => "+17024255249",
				'Body' => "Hello '.$Full_Name.' Please Click Please click http://www.americanhomesonline.com/aho/send_request.php?Email_Verification=1&Request_ID=".$consumer_id." to Verify Your Email ID. Email ID ".$Email_ID." 	Cell No ".$phone_no." Location: ".$Property_Location." Property Type: ".$Property_Type.$message." Summarize:".$Comment." You have requested for the '".$request_type."' on http://www.americanhomesonline.com on ".$sending_time." (PDT). Regards American Homes Online"
	                        ));*/
	     //   echo $cPhone;
	     
	        $client->account->messages->create(array(
				'To' => "+$cPhone",
				'From' => "+17024255249",
				'Body' => "Hello \n".$Full_Name."\nEmail ID \n".$Email_ID." \nCell No \n".$phone_no." \nPlease Click http://www.americanhomesonline.com/aho/send_request.php?Email_Verification=1&Request_ID=".$consumer_id."&AID=".$AID." to Verify Your Email ID. \nYou have requested for the '".$request_type."' on \nhttp://www.americanhomesonline.com on ".$sending_time." (PDT). \nRegards \nAmerican Homes Online"
	                        ));
	        
	        //Please Click http://www.americanhomesonline.com/aho/send_request.php?Email_Verification=1&Request_ID=".$consumer_id." to Verify Your Email ID. \n
	        if($flag){
	            header("location:http://www.americanhomesonline.com/index.php?RequestMessage=1");
	        }
	        else{
	            header("location:http://www.americanhomesonline.com/index.php?RequestMessage=0");
	        }
	        // code to send html mail ends
	        
	        // code for email varification ends
	    }
	    else{
	        header("location:http://www.americanhomesonline.com/index.php?RequestMessage=0");
	    }
	// }
/*Code Date 29.11.14 End */
	
}


?>

<script>
	$(document).ready(function(){
		$("#Phone").blur(function(e){
			
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
			var cell_no = $("#Phone").val().trim();
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
				var 
				country_code=cell_no.substring(0, 3);
				first_part=cell_no.substring(3, 6);
				second_part=cell_no.substring(6, 9);
				third_part=cell_no.substring(9, 13);
				var phone_format = country_code+'+('+first_part+')'+second_part+'-'+third_part;
				$('#Phone').val(phone_format);
					
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
				$('#Phone').val(phone_format);
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
				$('#Phone').val(phone_format);
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
				$('#Phone').val(phone_format);
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
	$('#Send').click(function(){
		if ($('#Name').val().length<=0) {
			alert('Enter the Name.');
			$('#Name').focus();
			return false;
		}
		else if ($('#Phone').val().length<13) {
			alert('Enter Valid Phone No.');
			$('#Phone').focus();
			return false;
		}
		else if (($('#Email').val().length<=0)|| !checkEmail($('#Email').val())) {
			alert('Enter the Valid Email Id.');
			$('#Email').focus();
			return false;
		}
	});
</script>
<script>
	
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

function call_agent(phone_no){
	
	var browser =  navigator.userAgent.toLowerCase();
	var link = "";
	
	if (phone_no.length==10) {
		phone_no=1+phone_no;
	}
	link="tel:"+phone_no;
	
	
	window.location.href = link;
	/*if (browser.search(/iPhone|iPod|iPad|Android|BlackBerry|moz/) > -1){
		link="tel:"+phone_no;
		window.location.href = link;
	}
	else{
		alert('Your device does not support Calling.');
		return false;
		
	}*/
	
	
	
	
   

}
</script>