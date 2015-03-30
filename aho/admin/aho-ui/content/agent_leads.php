<style type="text/css">
.sTable th {
   
    border-left: 1px solid #CBCBCB;
    color: #878787;
    font-size: 11px;
    font-weight: normal;
    padding: 3px 8px 2px;
}


.sTable  td {
    border-left: 1px solid #CBCBCB;
    padding: 8px 12px;
    vertical-align: middle;
}
table, th, td
{
border: 1px solid #CBCBCB;
}
.hide{
    display:none;
}
.show{
    display: block;
}
td{text-align: center; vertical-align:middle;}
label{padding:5px;font-weight: bold;}
table a{text-decoration: none;}
th{font-weight:bold;font-size:16px;}
.container{width:95% !important;}
form{width:70% !important;}
form label{text-align: left;}
#consumer_info{background-color: rgb(255, 255, 204);height: auto;left: 24%;
    position: fixed;
    top: 30%;
    width: 50%;
    z-index: 99999;
    border: 1px solid #888888;
    display: none;
    box-shadow: 10px 10px 5px #888888;
    }
.close_btn img {height: 40px;width: 40px;}
.close_btn {position: absolute;right:-20px; top:-7px !important;}
#consumer_information{float: left;height: inherit;width:98%;padding-bottom: 10px;padding-left: 10px;padding-right: 10px;padding-top: 10px;}
#consumer_information table{text-align: left;}
#consumer_information table td{text-align: left;}
.field_name{font-weight: bold}
#consumer_heading{
    background-color: rgb(100, 164, 255);
    font-weight: bold;
    padding-bottom: 5px;
    padding-top: 5px;
    text-align: center;
    color:#ffffff;}
.rtd{ border: 1px solid #777777}
.page{padding: 5px; color: #000000;}
#Page_div{background-color:#258dc8}
@media (max-width: 800px) {
 #consumer_info{
  width:90%;
  left:5%;   
}
}
@media (max-width: 640px) {
   #consumer_info{
 overflow:scroll;
 height:90%;
 top:0;   
}  
.close_btn{right:0 !important; top:0 !important;}

    
    }
</style>
<header>
	<center> <h3><br>Leads</h3></center>
</header>

<?php
require('../aho/tw/Services/Twilio.php');
$account_sid = 'AC7728951e7d8b3b31c7275adb4e4002e5';
$auth_token = '8e592234882788ddfac3a4336cfba000';
require '../aho/mail/PHPMailerAutoload.php';
setlocale(LC_MONETARY, 'en_US');
function get_lead_status($Consumer_ID,$uid)
{
    $sql = "select * from AHO_Agent_Leads where Is_Accepted=1 and Consumer_ID='".$Consumer_ID."'";
    $query = mysql_query($sql) or die(mysql_error());
    if($query && mysql_num_rows($query)>0){
	$row = mysql_fetch_object($query);
	   
	    if($row->Agent_ID==$uid){
		return 1;
	    }
	    else{
		return 2;
	    }
    }
    else{
	$sql = "select credits from AHO_User where id=$uid";
	$q = mysql_query($sql) or die(mysql_error());
	if($q && mysql_num_rows($q)>0){
	    $row = mysql_fetch_object($q);
	    $available_creidts = $row->credits;
	    if($available_creidts>=1){
		return 3;
	    }else{
		return 4;
	    }
	}
	
	
    }
}
if(isset($_REQUEST['Accept']) &&  $_REQUEST['ID']!= '' && $_REQUEST['Consumer_ID']!= '')
{
    
    $sql = "select * from AHO_User where id=$User_ID"; 
    $query = mysql_query($sql) or die(mysql_error());
    $Agent_Name='Agent';
    $Agent_Email="sameer@mailinator.com";
    if($query && mysql_num_rows($query)>0){
	$row = mysql_fetch_object($query);
	$Agent_Name=  $row->Name;
	$Agent_Email = $row->Email_1;
	$Agent_Phone = $row->Phone_1;
	$credits_available = $row->credits; 
	$new_credits =  floatval($credits_available-1); 
	if(floatval($credits_available)>=1){
	    
	    $sql = "UPDATE AHO_User SET 
	    credits = $new_credits
	    WHERE id = $User_ID";
	    $q1 = mysql_query($sql) or die(mysql_error());
	    if($q1){
			$sql = "UPDATE AHO_Agent_Leads SET 
			Is_Accepted =1
			WHERE ID = '".$_REQUEST["ID"]."' and Agent_ID = $User_ID";
			$q2 = mysql_query($sql) or die(mysql_error());
		
			$sql = "UPDATE AHO_Consumers SET 
			Lead_ID ='".$_REQUEST['ID']."',
			Agent_ID =$User_ID 
			WHERE ID = '".$_REQUEST["Consumer_ID"]."'";
			$q3 = mysql_query($sql) or die(mysql_error());
			
			// code to send mail and sms
			
			$subject = 'Lead Accepted on American Homes Online';
		
		
		
			// requested property info
			$sql = "select * from AHO_Consumers where ID=".$_REQUEST['Consumer_ID']; 
			$q4 = mysql_query($sql) or die(mysql_error());
			$request = mysql_fetch_object($q4);
			$Property_Description = unserialize($request->Property_Description);
			$Email_ID = $request->Email_ID;
			$Full_Name = $request->Full_Name;
			$Receive_Option = $request->Receive_Option;
			$Registration_Date = $request->Registration_Date;
			$Phone_No = $request->Phone_No;
					
			$find = array("(",")","+","-");
			$replace = '';
			$phone = str_replace($find,$replace,$Phone_No);
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
			$Comment = $request->Comment;
			$Request_Type = $request->Request_Type;
			
			$request_type = 'Property Search for Buy';
			if($Request_Type==1){
			    $request_type = 'Property Search for Buy';
			}
			elseif($Request_Type==2){
			    $request_type = 'Property Search for Rent';
			}
			elseif($Request_Type==3){
			    $request_type = 'Property for Sell';
			}    
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
			
			if($Receive_Option==1){
			    $Receive_Option='Mail';
			}
			elseif($Receive_Option==2){
			    $Receive_Option='Text';
			}
			elseif($Receive_Option==3){
			    $Receive_Option='Mail & Text';
			}
		        
		
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
			      <table>
			        <tr>
				    <td style="font-weight:bold;width:30%;"><strong>Call Your New Lead:</strong></td><td>'.$_REQUEST["ID"].'</td>
				</tr>
			        <tr>
				    <td style="font-weight:bold;width:30%;"><strong>Name:</strong></td><td>'.$Full_Name.'</td>
			        </tr>
			        <tr>
				    <td style="font-weight:bold;width:30%;"><strong>Phone:</strong></td><td>'.$phone_no.'</td>
				</tr>
				<tr>
				    <td style="font-weight:bold;width:30%;"><strong>Email:</strong></td><td>'.$Email_ID.'</td>
				</tr>
				<tr>
				    <td style="font-weight:bold;width:30%;"><strong>Location:</strong></td><td>'.$Property_Location.'</td>
				</tr>
				<tr>
				    <td style="font-weight:bold;width:30%;"><strong>Property Type:</strong></td><td>'.$Property_Type.'</td>
				</tr>';
				if($Request_Type==1||$Request_Type==2){
				    $message.='
				<tr>
				    <td style="font-weight:bold;width:30%;"><strong>Price:</strong></td><td>$'.$Min_Price.' To $'.$Max_Price.'</td>
				</tr>
				<tr>
				    <td style="font-weight:bold;width:30%;"><strong>Min. Square Feet:</strong></td><td>'.$Area.'</td>
				</tr>
				';
				}
				$message.='
				<tr>
				    <td style="font-weight:bold;width:30%;"><strong>Bedrooms:</strong></td><td>'.$Bedrooms.'</td>
				</tr>
				<tr>
				    <td style="font-weight:bold;width:30%;"><strong>Bathrooms:</strong></td><td>'.$Bathrooms.'</td>
				</tr>
				';
                        
				if($Request_Type==1){
				    $message.=
				'
				<tr>
				    <td style="font-weight:bold;width:30%;"><strong>Lot_Size:</strong></td><td>'.$Lot_Size.' Sq. Feet</td>
				</tr>
				<tr>
				    <td style="font-weight:bold;width:30%;"><strong>Year Built:</strong></td><td>'.$Year_Built.'</td>
				</tr>
				';
				}
				if($Request_Type==2){
				    $message.=
				'
				<tr>
				    <td style="font-weight:bold;width:30%;"><strong>Pets:</strong></td><td>'.$Pets.'</td>
				</tr>
				<tr>
				    <td style="font-weight:bold;width:30%;"><strong>Timeframe:</strong></td><td>'.$Time_Frame.'</td>
				</tr>
				';
				}   
				$message.='
				<tr>
				    <td style="font-weight:bold;width:30%;"><strong>Summarize:</strong></td><td>'.$Comment.'</td>
				</tr>
				<tr>
				    <td style="font-weight:bold;width:30%;"><strong>Leads Remaining:</strong></th><td>'.$new_credits.'</td>
				</tr>
				<tr>
				    <td colspan="2">You can check your Lead by Login on <a href="http://americanhomesonline.com/admin/index.php">Login</a>. </td>
				</tr>
				<tr>
				    <td colspan="2">Regards<br><a href="http://www.americanhomesonline.com">American Homes Online</a></td>
				</tr>
			      </table>
			    </body>
			    </html>
			    ';
			// Mail it
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
			$mail->Subject = $subject;
			// Mail it
			$mail->msgHTML($message);
           
			//Replace the plain text body with one created manually
			$mail->AltBody = 'This is a plain-text message body';
			//Attach an image file
			  //$mail->addAttachment('images/phpmailer_mini.png');
			//send the message, check for errors
			$flag = $mail->send();
		      
			// code to send html mail ends
			// code to send message to agent
			    if($Request_Type==1||$Request_Type==2){
				$message='Price: $'.$Min_Price.' To $'.$Max_Price.' \n';
				$message.='Min. Square Feet: '.$Area;
			    }
			    $message.=' Bedrooms:'.$Bedrooms.' Bathrooms:'.$Bathrooms;
			    
			    if($Request_Type==1){
				$message.=' Lot_Size:'.$Lot_Size.' Sq. Feet Year Built '.$Year_Built;
			    }
			    if($Request_Type==2){
				$message.=' Pets:'.$Pets.' Timeframe : '.$Time_Frame;
			    }      
			//$Agent_Phone = '+919755832755';
			$find = array("(",")","+","-");
			$replace = '';
			$Agent_Phone = str_replace($find,$replace,$Agent_Phone); 
			
			if(strlen($Agent_Phone) == 10)
			{
				$Agent_Phone = "1$Agent_Phone";
			}
			//if(strlen($Agent_Phone)>0){
			//     // code to send sms starts
			//	$client = new Services_Twilio($account_sid, $auth_token);
			//	$client->account->messages->create(array(
			//	'To' => "+$Agent_Phone",
			//	'From' => "+17024255249",
			//	'Body' => "
			//	    Hello ".$Agent_Name."
			//	    You have successfully accepted lead on American Homes Online.
			//	    Call Your New Lead:</th><td>".$_REQUEST["ID"].".
			//	    Your lead information is as follows:
			//	    Name: '.$Full_Name.'
			//	    Phone: '.$phone_no.'
			//	    Email: '.$Email_ID.'
			//	    Location: ".$Property_Location."
			//	    Property Type: ".$Property_Type.$message."
			//	    Summarize:".$Comment."
			//	    Regards American Homes Online
			//	    "
			//	));
			//    // code to send sms ends
			//}
			if(strlen($Agent_Phone)>0){
			     // code to send sms starts
				$client = new Services_Twilio($account_sid, $auth_token);
				$client->account->messages->create(array(
				'To' => "+$Agent_Phone",
				'From' => "+17024255249",
				'Body' => "Hello ".$Agent_Name."\nConsumer Name \n".$Full_Name."\nPhone \n".$phone_no."\nEmail \n".$Email_ID
				));
				$client = new Services_Twilio($account_sid, $auth_token);
				$client->account->messages->create(array(
				    'To' => "+$Agent_Phone",
				    'From' => "+17024255249",
				    'Body' => "Location \n".$Property_Location." \nProperty Type \n".$Property_Type.' \n'.$message." \n Summarize \n".$Comment." \n Leads Remaining :".$new_credits." \n Regards \n American Homes Online"
				));
			    // code to send sms ends
			}
			
			// code to send mail and sms to consumer
			
			$Phone_No = $request->Phone_No;
					
			$find = array("(",")","+","-");
			$replace = '';
			$phone = str_replace($find,$replace,$Agent_Phone);
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
			     <p>Your Lead for "'.$request_type.'" has been accepted on <a href="http://www.americanhomesonline.com">American Homes Online</a> on '.$sending_time.' (PDT) by Agent '.$Agent_Name.'</p>
			     
			     <table>
			       <caption>Lead & Consumer Information</caption>
			       <tr>
				    <td style="font-weight:bold;width:30%;"><strong>Lead Reference ID</strong></td><td>'.$_REQUEST["ID"].'</td>
			       </tr>
			      
				<tr>
				 <td style="font-weight:bold;width:30%;"><strong>Agent Name</strong></td><td>'.$Agent_Name.'</td>
			       </tr>
			       <tr>
				 <td style="font-weight:bold;width:30%;"><strong>Email ID</strong></td><td>'.$Agent_Email.'</td>
			       </tr>
			       <tr>
				 <td style="font-weight:bold;width:30%;"><strong>Cell No</strong></td><td>'.$phone_no.'</td>
			       </tr>
			       <tr>
				    <td colspan="2">This agent will contact with you for further process. </td>
				</tr>
				<tr>
				    <td colspan="2">Regards<br><a href="http://www.americanhomesonline.com">American Homes Online</a></td>
				</tr>
			       
			      </table>
			     
			      
			   </body>
			   </html>
			';
			
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
			$mail->Subject = $subject;
			// Mail it
			$mail->msgHTML($message);
           
			//Replace the plain text body with one created manually
			$mail->AltBody = 'This is a plain-text message body';
			//Attach an image file
			  //$mail->addAttachment('images/phpmailer_mini.png');
			//send the message, check for errors
			$flag = $mail->send();
		      
			// code to send html mail ends
			  
			//$Phone_No = '+919755832755';
			$find = array("(",")","+","-");
			$replace = '';
			$Phone_No = str_replace($find,$replace,$Phone_No); 
			
			if(strlen($Phone_No) == 10)
			{
				$Phone_No = "1$Phone_No";
			}
			if(strlen($Phone_No)>0){
			     // code to send sms starts
				$client = new Services_Twilio($account_sid, $auth_token);
				$client->account->messages->create(array(
				'To' => "+$Phone_No",
				'From' => "+17024255249",
				'Body' => "Hello ".$Full_Name."\nYour Agent's Name\n".$Agent_Name."\nPhone\n".$phone_no."\nEmail\n".$Agent_Email."\nRegards\nAmerican Homes Online"
				));
			    // code to send sms ends
			}   
			
			
			
	    }
	    else{
		    header('location:http://www.americanhomesonline.com/admin');
	    }
	}
	else{ 
	    header('location:http://www.americanhomesonline.com/admin');
	}
	    
	    
	    
	    
	    
	    
    }
    else{ 
	    ?>
	    <script type="text/javascript">
		window.location="http://www.americanhomesonline.com/admin/index.php?Page=credits&ID=<?php echo $User_ID;?>&lead_message=1";
	    </script>
	    <?php
	    
    }
}
    
   
    
    

if(isset($_REQUEST['Remove']) && !empty($_REQUEST["ID"])){
    $sql = "DELETE from AHO_Agent_Leads WHERE ID = '".$_REQUEST["ID"]."'"; 
    $sql_result = mysql_query($sql); 
    header('location:index.php?Page=AgentLeads');
}
//$sql = "SELECT * FROM AHO_Consumers where Property_ID>0 AND Agent_ID>0";
$sql = "SELECT AL.ID AS Lead_ID,C.Request_Type, AL.Property_ID,AL.Consumer_ID,C.Email_ID as Consumer_Email,AL.Received_Date,AL.Is_Accepted FROM AHO_Consumers C,AHO_Agent_Leads AL where AL.Agent_ID='".$User_ID."'and C.ID = AL.Consumer_ID order by AL.Received_Date desc";
$sql_result = mysql_query($sql) or die(mysql_error());
if($sql_result && mysql_num_rows($sql_result))
{
    ?>
    <!--<p>1 Lead will be deducted from your account on accepting a Lead. </p>-->
   <div class="outer-table">
	    <table class="table-field">
		<tr class="tr-heading">
		    <th>S.No.</th>
		    <th>Lead Reference ID</th>
		    <th>Lead Type</th> 
		    <!--<th>Consumer ID</th>
		    <th>Consumer Email ID</th>
		    <th>Property ID</th>-->
		    <th>Lead Status</th>
		    <th>Reg. Date</th>
		    <th>Action</th>
		</tr>
		
		<?php
		    $i=0;
		    while($row = mysql_fetch_object($sql_result))
		    {
			?>
			    <tr class="record">
				<td><?php echo ++$i;?></td>
				<td><?php echo $row->Lead_ID;?></td>
				<td>
				    <?php
					if($row->Request_Type==1){
					    echo 'Buy';
					}
					elseif($row->Request_Type==2){
					    echo 'Rent';
					}
					elseif($row->Request_Type==3){
					    echo 'Sell';
					}
					
				    ?>
				</td>
				<!--<td><?php echo $row->Consumer_ID;?></td>
				<td><?php echo $row->Consumer_Email;?></td>
				<td><?php if($row->Property_ID){echo $row->Property_ID;}else{echo "Not Available";}?></td>-->
				<td>
				<?php
				    $status = get_lead_status($row->Consumer_ID,$User_ID);
				    if($status==1){
					echo '<a href="javascript:" onclick="show_lead_details('.$row->Lead_ID.','.$row->Consumer_ID.',event)">View Accepted Lead</a>';
				    }
				    else if($status==2){
					echo 'Accepted by Other Agent';
				    }
				    else if($status==3){
					?>
					<a href="index.php?Page=AgentLeads&Accept=1&ID=<?php echo $row->Lead_ID;?>&Consumer_ID=<?php echo $row->Consumer_ID;?>">Accept</a>
					<?php
				    }
				    else if($status==4){
					?>
					<a href="index.php?Page=credits&ID=<?php echo $User_ID;?>">Buy Leads</a>
					<?php
				    }
				?>
				</td>
				<td><?php echo date('d-M-Y H:i:s',strtotime($row->Received_Date));?> (PST)</td>
				<td>
				    <a href="index.php?Page=AgentLeads&Remove=1&ID=<?php echo $row->Lead_ID;?>" onclick="return confirm('Do you really want to delete this record?');">Delete</a>
				</td>
			    </tr>
			<?php
		    }
		?>
		<tr><td colspan="6"><div id="Page_div" ></div></td></tr>
	    </table>
		</div>
    <?php
}
else
{
    echo "<h4><font color='red'>No Record Found</font></h4>";
}
?>

<div style="clear:both"></div>
<div id="consumer_info" class='c_info'>
    <div id="consumer_heading">
	<span class="consumer_menu">Lead Reference ID : <span id="lead_id"></span></span>
	<span class="close_btn">
	    <a onclick="close_box();" href="javascript:"><img width="inherit" height="inherit" alt="X" src="http://www.americanhomesonline.com/images/close.png" title=""></a>
	</span>
    </div>
    
    <div id="consumer_information"></div>
</div>
<!--<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js'></script>-->
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js?ver=1.4.2'></script>
<script>
    function show_lead_details(lead_id,consumer_id,e)
    {
	
	e.preventDefault();
	var overlay = $('<div id="overlay"></div>');
	var body = document.body,html = document.documentElement;
	//var body_height = Math.max( body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight );
	overlay.show();
	overlay.appendTo(document.body);
	
	
	$(document).ready(function(){
	    $.ajax({
		url:'aho-ui/content/show_lead_info.php',   
		method:'POST',
		data:'lead_id='+lead_id+'&consumer_id='+consumer_id+'&show=lead_details',
		success:function(result){
		    $('#consumer_information').html(result);
		    $('#lead_id').text(lead_id);
		    $('#consumer_info').show();
		},
		
	    });
	});	
	//return false;
    }
    function close_box()
    {
	
      /*$(document).ready(function(){
	$('.c_info').css('display','none !important');
	$('#overlay').remove();
      });*/
      $('#overlay').remove();
      $('#consumer_info').hide();
      //return false;
    }
    
    // code for pagination
    
    $(document).ready(function(){
             if($('.record').length)
             {
               
               var total_records = $('.record').length;
	       var page_size = 10;
               var pages = total_records/page_size;
               pages = new String(pages);
               var p =pages.split('.');
               pages = parseInt(p[0]);
               if(p[1])
               {
                pages++;
               }
               var i=0;
               $('.record').each( function(){
                
                     if(i>= page_size)
                     {
                        $(this).css('display','none');
                     }
                     i++;
                    }
                );
               
               pages = parseInt(pages);
               var c;
               $('#Page_div').append('<div>Total Records : '+total_records+'</div><div>');
               if(pages>1)
               {
                $('#Page_div').append('<span><a href="javascript:" onClick="show_previous()">Previous</a></span>');
               }
               for(var i=1;i<=pages;i++)
               {
                 if(i==1)
                 {
                    c='#ff0000';
                 }
                 else
                 {
                    c='#000000';
                 }
                 $('#Page_div').append('<a href="javascript:" id="p'+i+'" class="page" style="color:'+c+'" onClick="show_page('+i+')">'+i+'</a>');
               }
               if(pages>1)
               {
                $('#Page_div').append('<span><a href="javascript:" onClick="show_next()">Next</a></span>');
               }
               $('#Page_div').append('</div>');
             }
            });
            function show_page(page)
            {
                var page_size =10;
                var first_rec = (page-1) *page_size+1;
                var last_rec = first_rec+page_size-1;
                var i=0;
                $('.record').each( function(){
                
                     if(i>= (first_rec-1) && i< last_rec)
                     {
                        $(this).show();
                     }
                     else
                     {
                        $(this).css('display','none');
                     }
                     i++;
                    }
                );
                $('.page').each( function(){
                        $(this).css('color','#000000');
                    }
                );
                $('#p'+page).css('color','#ff0000');
                
            }
            function show_previous()
            {
                var cp;
                $('.page').each( function(){
                       if( $(this).css('color')=='rgb(255, 0, 0)')
                       {cp = $(this).attr('id');}
                    }
                );
                var p = cp.split('p');
                var current = parseInt(p[1]);
                var prev = --current;
                var set_page = 'p'+prev;
                if($('#'+set_page).length)
                {
                    $('#'+set_page).css('color','rgb(255, 0, 0)');
                    $('#'+cp).css('color','rgb(0, 0, 0)');
                    show_page(prev);
                }
                
            }
            function show_next()
            {
                var cp;
                $('.page').each( function(){
                        if( $(this).css('color')=='rgb(255, 0, 0)')
                       {cp = $(this).attr('id');}
                    }
                );
                var p = cp.split('p');
                var current = p[1];
                var next = ++current;
                var set_page = 'p'+next;
                if($('#'+set_page).length)
                {
                    $('#'+set_page).css('color','rgb(255, 0, 0)');
                    $('#'+cp).css('color','rgb(0, 0, 0)');
                    show_page(next);
                }
                
            }
    
</script>
