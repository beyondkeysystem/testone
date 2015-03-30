<?php
$db = mysql_connect("localhost", 'ahomain', ',O8bOcL6JUXK') or die(); // original
mysql_select_db('ahomain_las_rc',$db); // original
setlocale(LC_MONETARY, 'en_US');
// file included for sms
require('tw/Services/Twilio.php');

$account_sid = 'AC7728951e7d8b3b31c7275adb4e4002e5';
$auth_token = '8e592234882788ddfac3a4336cfba000';
// sms file ends
require 'mail/PHPMailerAutoload.php';
if(isset($_POST['send_request']) && $_POST['send_request']=='Submit'){
    
    $First_Name = $_POST['first_name'];
    $Last_Name=$_POST[last_name];
    $find = array("(",")","+","-");
    $replace = '';
    $Phone_No = str_replace($find,$replace,$_POST[cell_no]);
    $Email_ID = $_POST[email_address];
    $Property_Location = $_POST[property_location];
    $Property_Type = $_POST[property_type];
    $find = array("(",")","+","-","$");
    $replace = '';
    $Min_Price = str_replace($find,$replace,$_POST[min_price]);
    $Max_Price = str_replace($find,$replace,$_POST[max_price]);
    $Area = $_POST[area];
    $Bedrooms = $_POST[bedrooms];
    $Bathrooms = $_POST[bathrooms];
    $Request_Type = $_POST[request_type];
    $Year_Built=$_POST[year_built];
    $Time_Frame = $_REQUEST[time_frame];
    if(strlen($Time_Frame)<=0){
        $Time_Frame=' Any Time';
    }
    $Pets = $_POST[pets];
    if(strlen($Pets)<=0 || $Pets==0 ){
        $Pets='No';
    }
    else{
        $Pets='Yes';
    }
    $Lot_Size = $_POST[lot_size];
    $Comment = $_POST[comment];
    $Receive_Option = $_POST['Receive_Option'];
    $request_type='Property Search for Buy';
    if($Request_Type==1){
        $Property_Description = array(
        'Property_Location'=>$Property_Location,
        'Property_Type'=>$Property_Type,
        'Min_Price'=>$Min_Price,
        'Max_Price'=>$Max_Price,
        'Area'=>$Area,
        'Bedrooms'=>$Bedrooms,
        'Bathrooms'=>$Bathrooms,
        'Lot_Size'=>$Lot_Size,
        'Year_Built'=>$Year_Built
        );
       $request_type='Property Search for Buy';
    }
    else if($Request_Type==2){
        $Property_Description = array(
        'Property_Location'=>$Property_Location,
        'Property_Type'=>$Property_Type,
        'Min_Price'=>$Min_Price,
        'Max_Price'=>$Max_Price,
        'Area'=>$Area,
        'Bedrooms'=>$Bedrooms,
        'Bathrooms'=>$Bathrooms,
        'Pets'=>$Pets,
        'Time_Frame'=>$Time_Frame
        );
        $request_type='Property Search for Rent';
        
    }
    else if($Request_Type==3){
        $Property_Description = array(
        'Property_Location'=>$Property_Location,
        'Property_Type'=>$Property_Type,
        'Bedrooms'=>$Bedrooms,
        'Bathrooms'=>$Bathrooms,
        );
        $request_type='Property for Sell';
        
    }
    
    $Full_Name = trim($First_Name.' '.$Last_Name);
    $Property_Description = serialize($Property_Description);
    // code to find latitude and longitude
    $prepAddr = str_replace(' ','+',$Property_Location); 
    $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
    /*if(strstr($geocode,'error_message')>=0){
        // latitude and logitude of Las Vegas , NV 89135 by default
        $lat=36.110043;
        $long=-115.366722;
//Sending too many requests per day.
    }
    else{*/
        $output= json_decode($geocode);
        $lat = $output->results[0]->geometry->location->lat;
        $long = $output->results[0]->geometry->location->lng;
    //}
    
    
    $sql = "insert into AHO_Consumers (Phone_No,Full_Name,Email_ID,Comment,Property_Description,GEO_Lat,GEO_Long,Receive_Option,Request_Type) VALUES('$Phone_No','$Full_Name','$Email_ID','$Comment','$Property_Description','$lat','$long','$Receive_Option','$Request_Type')";
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
            <p>Please click <a href="http://www.americanhomesonline.com/aho/send_request.php?Email_Verification=1&Request_ID='.$consumer_id.'" style="color:#ff0000;font-weight:bold;">here</a> to Verify Your Email ID.</p>
            <table style="width:100%;">
            <tr>
              <td style="font-weight:bold;width:30%;"><strong>Email ID</strong></td><td>'.$Email_ID.'</td>
            </tr>
            <tr>
              <td style="font-weight:bold;"><strong>Cell No</strong></td><td>'.$phone_no.'</td>
            </tr>
            <tr>
              <td style="font-weight:bold;"><strong>Location:</strong></td><td>'.$Property_Location.'</td>
            </tr>
            <tr>
              <td style="font-weight:bold;"><strong>Property Type:</strong></td><td>'.$Property_Type.'</td>
            </tr>';
            if($Request_Type==1||$Request_Type==2){
                $message.='
            <tr>
                <td style="font-weight:bold;"><strong>Price:</strong></td><td>$'.$Min_Price.' To $'.$Max_Price.'</td>
            </tr>
            <tr>
                <td style="font-weight:bold;"><strong>Min. Square Feet:</strong></td><td>'.$Area.'</td>
            </tr>
            
            ';
            }
            $message.='
            <tr>
                <td style="font-weight:bold;"><strong>Bedrooms:</strong></td><td>'.$Bedrooms.'</td>
            </tr>
            <tr>
                <td style="font-weight:bold;"><strong>Bathrooms:</strong></td><td>'.$Bathrooms.'</td>
            </tr>
            ';
            
            if($Request_Type==1){
                $message.=
            '
            <tr>
                <td style="font-weight:bold;"><strong>Lot_Size:</strong></td><td>'.$Lot_Size.' Sq. Feet</td>
            </tr>
            <tr>
                <td style="font-weight:bold;"><strong>Year Built:</strong></td><td>'.$Year_Built.'</td>
            </tr>
            ';
            }
            if($Request_Type==2){
                $message.=
            '
            <tr>
                <td style="font-weight:bold;"><strong>Pets:</strong></td><td>'.$Pets.'</td>
            </tr>
            <tr>
                <td style="font-weight:bold;"><strong>Timeframe:</strong></td><td>'.$Time_Frame.'</td>
            </tr>
            ';
            }   
            $message.='
            <tr>
                <td style="font-weight:bold;"><strong>Summarize:</strong></td><td>'.$Comment.'</td>
            </tr>
            <tr>
                <td colspan="2">You have requested for the "'.$request_type.'" on <a href="http://www.americanhomesonline.com">American Homes Online</a> on '.$sending_time.' (PDT). </td>
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
       
        // code to sent text message
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
			'Body' => "Hello \n".$Full_Name."\nEmail ID \n".$Email_ID." \nCell No \n".$phone_no." \nPlease Click http://www.americanhomesonline.com/aho/send_request.php?Email_Verification=1&Request_ID=".$consumer_id." to Verify Your Email ID. \nYou have requested for the '".$request_type."' on \nhttp://www.americanhomesonline.com on ".$sending_time." (PDT). \nRegards \nAmerican Homes Online"
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
}

if(isset($_REQUEST['Email_Verification']) && $_REQUEST['Email_Verification']==1)
{
    $consumer_id = $_REQUEST['Request_ID'];
    if(!empty($consumer_id)){
        $sql = "select * from AHO_Consumers where ID=$consumer_id";
        $query = mysql_query($sql) or die(mysql_error());
        if($query && mysql_num_rows($query)>0){
            $request = mysql_fetch_object($query);
            // code if not already verified
            if($request->Verification_Status!=1){
                $Property_Description = unserialize($request->Property_Description);
                $Property_Location=$Property_Description['Property_Location'];
                $Email_ID = $request->Email_ID;
                $Full_Name = $request->Full_Name;
                $Receive_Option = $request->Receive_Option;
                $Registration_Date = $request->Registration_Date;
                $Phone_No = str_replace('(','',$request->Phone_No); 
                $Comment = $request->Comment;
                $lat = trim($request->GEO_Lat);
                $long = trim($request->GEO_Long); 
                $Request_Type = $request->Request_Type;
                $request_type = 'Property Search for Buy';
                if($Request_Type==1){
                    $request_type = 'Property Search for Buy';
                    $Middle = ' AND Buy = 1 ';
                }
                elseif($Request_Type==2){
                    $request_type = 'Property Search for Rent';
                    $Middle = ' AND Rent = 1 ';
                }
                elseif($Request_Type==3){
                    $request_type = 'Property for Sell';
                    $Middle = ' AND Sell = 1 ';
                }
          
                if($Receive_Option==1){
                    $Receive_Option='Mail';
                }
                elseif($Receive_Option==2){
                    $Receive_Option='Text';
                }
                elseif($Receive_Option==3){
                    $Receive_Option='Mail & Text';
                }
                $sql1 = "update AHO_Consumers set Verification_Status=1 where ID=$consumer_id";
                $query_result = mysql_query($sql1) or die(mysql_error());
                
                // code to send success message to consumer starts
                
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
                $mail->Subject = 'Email ID Verification Success Message';
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
                $mail->msgHTML('<html><head><title>American Homes Online</title></head>
                                  <body>
                                  
                                        <p>Hello '.$Full_Name.'</p>
                                        <p>You have successfully registered for the "'.$request_type.'" on <a href="http://www.americanhomesonline.com">American Homes Online</a> on '.$Registration_Date.'. </p>
                                        <p>Thanks for registering on American Homes Online</p>
                                        <table>
                                          <caption>Your Personal Information</caption>
                                          <tr>
                                            <td style="font-weight:bold;"><strong>Email ID</strong></td><td>'.$Email_ID.'</td>
                                          </tr>
                                          <tr>
                                            <td style="font-weight:bold;"><strong>Cell No</strong></td><td>'.$phone_no.'</td>
                                          </tr>
                                          <tr>
                                            <td style="font-weight:bold;"><strong>Receive Property Via</strong></td><td>'.$Receive_Option.'</td>
                                          </tr>
                                          <tr>
                                            <td colspan="2"> You will receive 100% accurate listings and service from one of our local agents via '.$Receive_Option.' shortly.</td>
                                          </tr>
                                          <tr>
                                            <td colspan="2">Regards<br><a href="http://www.americanhomesonline.com">American Homes Online</a></td>
                                          </tr>
                                        </table>
                                  
                                  </body></html>');
                   
                //Replace the plain text body with one created manually
                $mail->AltBody = 'This is a plain-text message body';
                //Attach an image file
                //$mail->addAttachment('images/phpmailer_mini.png');
                //send the message, check for errors
                $flag = $mail->send();
                
                
                $find = array("(",")","+","-");
                $replace = '';
                $cPhone = str_replace($find,$replace,$Phone_No); 
        
                if(strlen($cPhone) == 10)
                {
                        $cPhone = "1$cPhone";
                }
           
                date_default_timezone_set('America/Los_Angeles');
                $sending_time = date('M-d-Y h:i:s');
                if(strlen($cPhone)>0){
                     // code to send sms starts
                        $client = new Services_Twilio($account_sid, $auth_token);
                        $client->account->messages->create(array(
                        'To' => "+$cPhone",
                        'From' => "+17024255249",
                        'Body' => "Hello ".$Full_Name."\nYou have successfully registered for the '".$request_type."' on ".$sending_time." (PDT).\nYou will receive 100% accurate listings and service from one of our local agents via '.$Receive_Option.' shortly. \n Regards \n American Homes Online"
                        ));
                    // code to send sms ends
                }
            
            
                // code to send success message to consumer ends
            
            
            
                if(!is_numeric($lat)){
                    $lat=0;
                }
                if(!is_numeric($long)){ 
                    $long=0;
                }
                
                date_default_timezone_set('US/Central');
                $today = date('w');
                
                // code to find latitude and longitude of property end
                
                // code to find 7 nearest agents starts
            
                $APPid=0;
                $sql = "SELECT *,
                                    SQRT(POW((69.1 * (GEO_Lat - $lat)) , 2 ) +
                                    POW((53 * (GEO_Long - $long)), 2)) AS distance
                                    FROM AHO_User WHERE Availability LIKE('%$today%') AND Type=3 $Middle
                                    ORDER BY distance ASC Limit 7"; 
                $query_result = mysql_query($sql); 
                $Agents='';
                if($query_result && mysql_num_rows($query_result)>0){
                    
                    while($row = mysql_fetch_object($query_result)){
                        $MilesR = $row->distance;
                        if($MilesR <= 25){
                            $Agents[]=array('Name'=>$row->Name,'id'=>$row->id,'Email'=>$row->Email_1,'Phone'=>$row->Phone_1);
                        }
                        
                    }
                }
                // code to find 7 nearest agents ends
                // code to send mail to the searched agents starts
                $Property_Location = $Property_Description['Property_Location'];
                $Property_Type = $Property_Description['Property_Type'];
                $Bedrooms = $Property_Description['Bedrooms'];
                $Bathrooms = $Property_Description['Bathrooms'];
                
                $Min_Price = $Property_Description['Min_Price'];
                $Max_Price = $Property_Description['Max_Price'];
                $Area = $Property_Description['Area'];
                
                
                
                $Lot_Size = $Property_Description['Lot_Size'];
                $Year_Built=$Property_Description['Year_Built'];
                
                
                $Pets = $Property_Description['Pets'];
                $Time_Frame = $Property_Description['Time_Frame'];
            
                if(is_array($Agents) && count($Agents)>0){
                    
                    
                    for($i=0;$i<count($Agents);$i++){
                        
                        $Agent_ID =   $Agents[$i]['id'];
                        $Agent_Email = $Agents[$i]['Email'];
                        $Agent_PhoneNo = $Agents[$i]['Phone'];
                        $Agent_Name = $Agents[$i]['Name'];
                        $sql2 = "Insert into AHO_Agent_Leads (Agent_ID,Consumer_ID) values('".$Agent_ID."','".$consumer_id."')";
                        mysql_query($sql2) or die(mysql_error());
                        $lead_id = mysql_insert_id(); 
                        
                        $mail = new PHPMailer();
                        // Set PHPMailer to use the sendmail transport
                        $mail->isSendmail();
                        //Set who the message is to be sent from
                        $mail->setFrom('support@americanhomesonline.com', 'American Homes Online');
                        //Set an alternative reply-to address
                        $mail->addReplyTo('sameer.chourasia@cisinlabs.com', 'Sameer Chaurasia');
                        //Set who the message is to be sent to
                        $mail->addAddress($Agent_Email, $Agent_Name);
                        //Set the subject line
                        $mail->Subject = 'Lead Received From American Homes Online';
                        //Read an HTML message body from an external file, convert referenced images to embedded,
                        //convert HTML into a basic plain-text alternative body
                           //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
                        $message = '
                       <html>
                       <head>
                         <title>American Homes Online</title>
                         <style>
                            table{text-align:left}
                         </style>
                       </head>
                       <body>
                         <p>Hello '.$Agent_Name.'</p>
                         <table>
                            <tr>
                                <th>Call Your New Lead:</th><td>'.$lead_id.'</td>
                            </tr>
                            <tr>
                                <th>Location:</th><td>'.$Property_Location.'</td>
                            </tr>
                            <tr>
                                <th>Property Type:</th><td>'.$Property_Type.'</td>
                            </tr>';
                            if($Request_Type==1||$Request_Type==2){
                                $message.='
                                <tr>
                                    <th>Price:</th><td>$'.$Min_Price.' To $'.$Max_Price.'</td>
                                </tr>
                                <tr>
                                    <th>Min. Square Feet:</th><td>'.$Area.'</td>
                                </tr>
                                
                                ';
                            }
                            $message.='
                            <tr>
                                <th>Bedrooms:</th><td>'.$Bedrooms.'</td>
                            </tr>
                            <tr>
                                <th>Bathrooms:</th><td>'.$Bathrooms.'</td>
                            </tr>
                            ';
                            
                            if($Request_Type==1){
                                $message.=
                            '
                                <tr>
                                    <th>Lot_Size:</th><td>'.$Lot_Size.' Sq. Feet</td>
                                </tr>
                                <tr>
                                    <th>Year Built:</th><td>'.$Year_Built.'</td>
                                </tr>
                                ';
                            }
                            if($Request_Type==2){
                                $message.=
                            '
                                <tr>
                                    <th>Pets:</th><td>'.$Pets.'</td>
                                </tr>
                                <tr>
                                    <th>Timeframe:</th><td>'.$Time_Frame.'</td>
                                </tr>
                                ';
                            }   
                            $message.='
                            <tr>
                                    <th>Summarize:</th><td>'.$Comment.'</td>
                            </tr>
                            <tr>
                                    <td colspan="2">You can check and accept your Lead by Login on <a href="http://www.americanhomesonline.com/admin/index.php?AcceptLead=1" style="color:#ff0000;font-weight:bold">Login</a>. </td>
                            </tr>
                            <tr>
                                <td colspan="2">Regards<br><a href="http://www.americanhomesonline.com">American Homes Online</a></td>
                            </tr>
                         </table>
                       </body>
                       </html>
                       ';     
                           
                           
                           
                           
                        $mail->msgHTML($message);
                   
                        //Replace the plain text body with one created manually
                        $mail->AltBody = 'This is a plain-text message body';
                        //Attach an image file
                        //$mail->addAttachment('images/phpmailer_mini.png');
                        //send the message, check for errors
                        $flag = $mail->send();
                        
                        
                        
                        // new code ends
                        
                       // code to send sms starts
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
                       // $Agent_PhoneNo = '+919977755537';
                        $find = array("(",")","+","-");
                        $replace = '';
                        $Agent_PhoneNo = str_replace($find,$replace,$Agent_PhoneNo); 
                
                        if(strlen($Agent_PhoneNo) == 10)
                        {
                                $Agent_PhoneNo = "1$Agent_PhoneNo";
                        }
                       if($Agent_PhoneNo){
                            
                            date_default_timezone_set('America/Los_Angeles');
                            $sending_time = date('M-d-Y h:i:s');
                            $client = new Services_Twilio($account_sid, $auth_token);
                            $client->account->messages->create(array(
                            'To' => "+$Agent_PhoneNo",
                            'From' => "+17024255249",
                            'Body' => " Hello ".$Agent_Name."\nNew Lead From American Homes Online'  on ".$sending_time." (PDT).\nClick\n               http://www.americanhomesonline.com/admin/index.php?AcceptLead=1\n to login to your account and accept lead."
                            ));
                            // code to send sms ends
                        }    
                           
                       
                        
                        
                        
                        
                    }
                }
                
            }// code for already varified here
            else{
               // echo 'already exists'; die;
               ?>
               <script>
                window.location="http://www.americanhomesonline.com/index.php?success=2";
               </script>
                <?php
            }
            
            
            
            
            
            
            
            // code to send mail to the searched agents ends
            header("location:http://www.americanhomesonline.com/index.php?success=1");
        }
        else{
            header("location:http://www.americanhomesonline.com/index.php?success=0");
        }
    }
    else{
       header("location:http://www.americanhomesonline.com/index.php?success=0");
    }
}
