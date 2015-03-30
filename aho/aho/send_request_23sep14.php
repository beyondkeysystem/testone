<?php
$db = mysql_connect("localhost", 'ahomain', ',O8bOcL6JUXK') or die(); // original
mysql_select_db('ahomain_las_rc',$db); // original
// file included for sms
require('tw/Services/Twilio.php');

$account_sid = 'AC7728951e7d8b3b31c7275adb4e4002e5';
$auth_token = '8e592234882788ddfac3a4336cfba000';
// sms file ends
if(isset($_POST['send_request']) && $_POST['send_request']=='Submit'){
   
    $First_Name = $_POST['first_name'];
    $Last_Name=$_POST[last_name];
    $Phone_No = $_POST[cell_no];
    $Email_ID = $_POST[email_address];
    $Property_Location = $_POST[property_location];
    $Property_Type = $_POST[property_type];
    $Min_Price = $_POST[min_price];
    $Max_Price = $_POST[max_price];
    $Area = $_POST[area];
    $Bedrooms = $_POST[bedrooms];
    $Bathrooms = $_POST[bathrooms];
    $Lot_Size = $_POST[lot_size];
    $Comment = $_POST[comment];
    $Receive_Option = $_POST['Receive_Option'];
    $Property_Description = array(
        'Property_Location'=>$Property_Location,
        'Property_Type'=>$Property_Type,
        'Min_Price'=>$Min_Price,
        'Max_Price'=>$Max_Price,
        'Area'=>$Area,
        'Bedrooms'=>$Bedrooms,
        'Bathrooms'=>$Bathrooms,
        'Lot_Size'=>$Lot_Size
    );
    $Full_Name = trim($First_Name.' '.$Last_Name);
    $Property_Description = serialize($Property_Description);
    $sql = "insert into AHO_Consumers (Phone_No,Full_Name,Email_ID,Comment,Property_Description,Receive_Option) VALUES('$Phone_No','$Full_Name','$Email_ID','$Comment','$Property_Description','$Receive_Option')";
    $query = mysql_query($sql) or die(mysql_error());
    if($query){
    
        // code for email varification starts
        $consumer_id = mysql_insert_id();
        // code to send html mail starts
        // multiple recipients
       
        //  $to  = 'aidan@example.com' . ', '; // note the comma
        //  $to .= 'wez@example.com';
       
        // single Recipient
        $to = $Email_ID;
       
        // subject
        $subject = 'Email ID & Property Request Verification';
        
        // message
        $message = '
        <html>
        <head>
          <title>American Homes Online</title>
          <style>
            th{text-align:left}
          </style>
        </head>
        <body>
          <p>Hello '.$Full_Name.'</p>
          <p>You have requested for the "Property Search for Buy" on <a href="http://www.americanhomesonline.com">American Homes Online</a> on '.date('d-M-Y h:i:s').'. </p>
          <p>Register to receive 100% accurate listings and service from one of our local agents</p>
          <table>
            <caption>Your Personlal Information</caption>
            <tr>
              <th>Email ID</th><td>'.$Email_ID.'</td>
            </tr>
            <tr>
              <th>Cell No</th><td>'.$Phone_No.'</td>
            </tr>
            <tr>
              <td colspan="2">Please click <a href="http://www.americanhomesonline.com/aho/send_request.php?Email_Verification=1&Request_ID='.$consumer_id.'">here</a> to Verify Your Email ID.</td>
            </tr>
            <tr>
              <td colspan="2">Regards<br><a href="http://www.americanhomesonline.com">American Homes Online</a></td>
            </tr>
          </table>
        </body>
        </html>
        ';
        
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        
        // Additional headers
        $headers .= 'To: '.$Full_Name.' <'.$to.'>'."\r\n";
        $headers .= 'From: American Homes Online<support@americanhomesonline.com>' . "\r\n";
        // $headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
        // $headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
        // Mail it
        $flag= mail($to, $subject, $message, $headers);
        $Phone_No = '+919755832755';
        if(strlen($Phone_No)>0){
             // code to send sms starts
                $client = new Services_Twilio($account_sid, $auth_token);
                $client->account->messages->create(array(
                'To' => "$Phone_No",
                'From' => "+17024255249",
                'Body' => "
                    Hello ".$Full_Name."
                    You have requested for the 'Property Search for Buy' on 'American homes Online' on ".date('d-M-Y')."
                    Register to receive 100% accurate listings and service from one of our local agents.
                    Regards American Homes Online"
                ));
            // code to send sms ends
        }
        if($flag){
            header("location:http://www.americanhomesonline.com/index.php?RquestMessage=1");
        }
        else{
            header("location:http://www.americanhomesonline.com/index.php?RquestMessage=0");
        }
        // code to send html mail ends
        
        // code for email varification ends
    }
    else{
        header("location:http://www.americanhomesonline.com/index.php?RquestMessage=0");
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
            $Property_Description = unserialize($request->Property_Description);
            $Property_Location=$Property_Description['Property_Location'];
            $Email_ID = $request->Email_ID;
            $Full_Name = $request->Full_Name;
            $Receive_Option = $request->Receive_Option;
            $Registration_Date = $request->Registration_Date;
            $Phone_No = $request->Phone_No;
            $Comment = $request->Comment;
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
            
            // code to send html mail starts
        
            // multiple recipients
           
            //  $to  = 'aidan@example.com' . ', '; // note the comma
            //  $to .= 'wez@example.com';
           
            // single Recipient
            $to = $Email_ID;
           
            // subject
            $subject = 'Email ID Verification Success Message';
            
            // message
            $message = '
            <html>
            <head>
              <title>American Homes Online</title>
              <style>
                th{text-align:left}
              </style>
            </head>
            <body>
              <p>Hello '.$Full_Name.'</p>
              <p>You have successfully registered for the "Property Search for Buy" on <a href="http://www.americanhomesonline.com">American Homes Online</a> on '.$Registration_Date.'. </p>
              <p>Thanks for registering on American Homes Online</p>
              <table>
                <caption>Your Personlal Information</caption>
                <tr>
                  <th>Email ID</th><td>'.$Email_ID.'</td>
                </tr>
                <tr>
                  <th>Cell No</th><td>'.$Phone_No.'</td>
                </tr>
                <tr>
                  <th>Receive Property Via</th><td>'.$Receive_Option.'</td>
                </tr>
                <tr>
                  <td colspan="2"> You will receive 100% accurate listings and service from one of our local agents via '.$Receive_Option.' shortly.</td>
                </tr>
                <tr>
                  <td colspan="2">Regards<br><a href="http://www.americanhomesonline.com">American Homes Online</a></td>
                </tr>
              </table>
            </body>
            </html>
            ';
            
            // To send HTML mail, the Content-type header must be set
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            
            // Additional headers
            $headers .= 'To: '.$Full_Name.' <'.$to.'>'."\r\n";
            $headers .= 'From: American Homes Online<support@americanhomesonline.com>' . "\r\n";
           // $headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
           // $headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
            
            // Mail it
            mail($to, $subject, $message, $headers);
            
            // code to send html mail ends
            $Phone_No = '+919755832755';
            if(strlen($Phone_No)>0){
                 // code to send sms starts
                    $client = new Services_Twilio($account_sid, $auth_token);
                    $client->account->messages->create(array(
                    'To' => "$Phone_No",
                    'From' => "+17024255249",
                    'Body' => "
                        Hello ".$Full_Name."
                        You have successfully registered for the 'Property Search for Buy' on ".date('d-M-Y')."
                        You will receive 100% accurate listings and service from one of our local agents via '.$Receive_Option.' shortly.
                        Regards American Homes Online"
                    ));
                // code to send sms ends
            }
            
            
            // code to send success message to consumer ends
            
            
            
         // code to find latitude and longitude of property start
            $prepAddr = str_replace(' ','+',$Property_Location);
            $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
            $output= json_decode($geocode);
            $lat = $output->results[0]->geometry->location->lat;
            $long = $output->results[0]->geometry->location->lng;
            // code to find latitude and longitude of property end
            
            // code to find 7 nearest agents starts
            
            /*$sql = "SELECT *,
				SQRT(POW((69.1 * (GEO_Lat - $lat)) , 2 ) +
				POW((53 * (GEO_Long - $long)), 2)) AS distance
				FROM AHO_User WHERE credits>=2 AND Type=3 
				ORDER BY distance ASC Limit 7";*/
           
            $APPid=0;
            $sql = "SELECT *,
				SQRT(POW((69.1 * (GEO_Lat - $lat)) , 2 ) +
				POW((53 * (GEO_Long - $long)), 2)) AS distance
				FROM AHO_User WHERE B_ID =$APPid AND Type=3 
				ORDER BY distance ASC Limit 7";
	    $query_result = mysql_query($sql);
            $Agents='';
            if($query_result && mysql_num_rows($query_result)>0){
                
                while($row = mysql_fetch_object($query_result)){
                    $MilesR = $row->distance;
                    if($MilesR <= 3000){
                        $Agents[]=array('Name'=>$row->Name,'id'=>$row->id,'Email'=>$row->Email_1,'Phone'=>$row->Phone_1);
                    }
                    
                }
            }
           
            // code to find 7 nearest agents ends
            // code to send mail to the searched agents starts
            $Property_Location = $Property_Description['Property_Location'];
            $Property_Type = $Property_Description['Property_Type'];
            $Min_Price = $Property_Description['Min_Price'];
            $Max_Price = $Property_Description['Max_Price'];
            $Area = $Property_Description['Area'];
            $Bedrooms = $Property_Description['Bedrooms'];
            $Bathrooms = $Property_Description['Bathrooms'];
            $Lot_Size = $Property_Description['Lot_Size'];
            if(is_array($Agents) && count($Agents)>0){
                
                
                for($i=0;$i<count($Agents);$i++){
                    
                    $Agent_ID =   $Agents[$i]['id'];
                    $Agent_Email = $Agents[$i]['Email'];
                    $Agent_PhoneNo = $Agents[$i]['Phone'];
                    $Agent_Name = $Agents[$i]['Name'];
                    $sql2 = "Insert into AHO_Agent_Leads (Agent_ID,Consumer_ID) values('".$Agent_ID."','".$consumer_id."')";
                    mysql_query($sql2) or die(mysql_error());
                    $lead_id = mysql_insert_id(); 
                    
                    
                   // code to send html mail starts
                   
                   // multiple recipients
                  
                   //  $to  = 'aidan@example.com' . ', '; // note the comma
                   //  $to .= 'wez@example.com';
                  
                   // single Recipient
                   $to = $Agent_Email;
                  // $to = "sameer@mailinator.com";
                   // subject
                   $subject = 'Lead Received From American Homes Online';
                   
                   // message
                   /*$message = '
                   <html>
                   <head>
                     <title>American Homes Online</title>
                     <style>
                        th{text-align:left}
                     </style>
                   </head>
                   <body>
                     <p>Hello '.$Agent_Name.'</p>
                     <p>You have received a Lead for "Property Search for Buy" on <a href="http://www.americanhomesonline.com">American Homes Online</a> on '.date('d-M-Y h:i:s').'. </p>
                     
                     <table>
                       <caption>Lead & Consumer Information</caption>
                       <tr>
                            <th>Lead Reference ID</th><td>'.$lead_id.'</td>
                        </tr>
                       <tr>
                         <th>Lead ID</th><td>'.$consumer_id.'</td>
                       </tr>
                        <tr>
                         <th>Full Name</th><td>'.$Full_Name.'</td>
                       </tr>
                       <tr>
                         <th>Email ID</th><td>'.$Email_ID.'</td>
                       </tr>
                       <tr>
                         <th>Cell No</th><td>'.$Phone_No.'</td>
                       </tr>
                       <tr>
                         <th>Comment</th><td>'.$Comment.'</td>
                       </tr>
                       <tr>
                      </table>
                      <br>
                      <table>
                        <caption>Property Description</caption>
                        <tr>
                            <th>Property Location</th><td>'.$Property_Location.'</td>
                        </tr>
                        <tr>
                            <th>Property Type</th><td>'.$Property_Type.'</td>
                        </tr>
                        <tr>
                            <th>Min_Price</th><td>'.$Min_Price.' USD</td>
                        </tr>
                        <tr>
                            <th>Max_Price</th><td>'.$Max_Price.' USD</td>
                        </tr>
                        <tr>
                            <th>Area</th><td>'.$Area.' Sq. Feet</td>
                        </tr>
                        <tr>
                            <th>Bedrooms</th><td>'.$Bedrooms.'</td>
                        </tr>
                        <tr>
                            <th>Bathrooms</th><td>'.$Bathrooms.'</td>
                        </tr>
                        <tr>
                            <th>Lot_Size</th><td>'.$Lot_Size.' Sq. Feet</td>
                        </tr>
                        <tr>
                            <td colspan="2">You can check and accept your Lead on <a href="http://americanhomesonline.com/admin/index.php?Page=AgentLeads">Agent Leads</a> after Login. </td>
                        </tr>
                        <tr>
                            <td colspan="2">Regards<br><a href="http://www.americanhomesonline.com">American Homes Online</a></td>
                        </tr>
                     </table>
                   </body>
                   </html>
                   ';*/
                   $message = '
                   <html>
                   <head>
                     <title>American Homes Online</title>
                     <style>
                        th{text-align:left}
                     </style>
                   </head>
                   <body>
                     <p>Hello '.$Agent_Name.'</p>
                     <p>You have received a Lead for "Property Search for Buy" on <a href="http://www.americanhomesonline.com">American Homes Online</a> on '.date('d-M-Y h:i:s').'. </p>
                                        
                     <table>
                        <caption>Property Description</caption>
                        <tr>
                            <th>Lead Reference ID</th><td>'.$lead_id.'</td>
                        </tr>
                        <tr>
                            <th>Property Location</th><td>'.$Property_Location.'</td>
                        </tr>
                        <tr>
                            <th>Property Type</th><td>'.$Property_Type.'</td>
                        </tr>
                        <tr>
                            <th>Min_Price</th><td>'.$Min_Price.' USD</td>
                        </tr>
                        <tr>
                            <th>Max_Price</th><td>'.$Max_Price.' USD</td>
                        </tr>
                        <tr>
                            <th>Area</th><td>'.$Area.' Sq. Feet</td>
                        </tr>
                        <tr>
                            <th>Bedrooms</th><td>'.$Bedrooms.'</td>
                        </tr>
                        <tr>
                            <th>Bathrooms</th><td>'.$Bathrooms.'</td>
                        </tr>
                        <tr>
                            <th>Lot_Size</th><td>'.$Lot_Size.' Sq. Feet</td>
                        </tr>
                        <tr>
                            <td colspan="2">You can check and accept your Lead by Login on <a href="http://www.americanhomesonline.com/admin/index.php">Login</a>. </td>
                        </tr>
                        <tr>
                            <td colspan="2">Regards<br><a href="http://www.americanhomesonline.com">American Homes Online</a></td>
                        </tr>
                     </table>
                   </body>
                   </html>
                   ';   
                   
                   // To send HTML mail, the Content-type header must be set
                   $headers  = 'MIME-Version: 1.0' . "\r\n";
                   $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                   
                   // Additional headers
                   $headers .= 'To: '.$Agent_Name.' <'.$to.'>'."\r\n";
                   $headers .= 'From: American Homes Online<support@americanhomesonline.com>' . "\r\n";
                  // $headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
                  // $headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
                   
                   // Mail it
                   if(mail($to, $subject, $message, $headers)){
                      // header("location:http://www.americanhomesonline.com");
                   }
                   else{
                      // header("location:http://www.americanhomesonline.com");
                   }
                   // code to send html mail ends
                   // code to send sms starts
                    $Agent_PhoneNo = '+919977755537';
                    if($Agent_PhoneNo){
                        
                        
                        $client = new Services_Twilio($account_sid, $auth_token);
                        $client->account->messages->create(array(
		        'To' => "$Agent_PhoneNo",
			'From' => "+17024255249",
			'Body' => "
                            Hello ".$Agent_Name."
                            You have received a Lead for 'Property Search for Buy' on 'American Homes Online'  on ".date('d-M-Y')."
                            You can check and accept your Lead on www.americanhomesonline.com/admin/index.php?Page=AgentLeads after Login.
                            Regards American Homes Online"
                        ));
                        // code to send sms ends
                    }    
                       
                       
                }
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
