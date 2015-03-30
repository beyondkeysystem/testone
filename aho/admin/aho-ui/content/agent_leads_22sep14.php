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
</style>
<header>
	<center> <h3><br>Leads</h3></center>
</header>

<?php
/*if(isset($_POST['update_consumer']) &&  $_POST['ID']!= ''){
	
    $Property_ID = $_POST['Property_ID'];
    $Agent_ID = $_POST['Agent_ID'];
   
    if($Property_ID<=0){
       echo "<h4><font color='red'>Enter the Valid Property ID</font></h4>";
    }
    else if($Agent_ID<=0){
       echo "<h4><font color='red'>Enter the Valid Agent ID</font></h4>";
    }
    else{
	print "<h4><font color='green'>Lead Info Updated</font></h4>";
       
	$sql = "UPDATE AHO_Consumers SET 
	    Property_ID ='".$Property_ID."',
	    Agent_ID ='".$Agent_ID."'
	    WHERE ID = '".$_POST["ID"]."'";
	
	$query = mysql_query($sql) or die(mysql_error());
       
    }
	
	
}*/
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
	    if($available_creidts>=2){
		return 3;
	    }else{
		return 4;
	    }
	}
	
	
    }
}
if(isset($_REQUEST['Accept']) &&  $_REQUEST['ID']!= '' && $_REQUEST['Consumer_ID']!= ''){
    
    $sql = "select * from AHO_User where id=$User_ID"; 
    $query = mysql_query($sql) or die(mysql_error());
    $Agent_Name='Agent';
    $Agent_Email="sameer@mailinator.com";
    if($query && mysql_num_rows($query)>0){
	$row = mysql_fetch_object($query);
	$Agent_Name=  $row->Name;
	$Agent_Email = $row->Email_1;
	$credits_available = $row->credits; 
	$new_credits =  floatval($credits_available-1); 
	if(floatval($credits_available)>=2){
	    
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
		$to = $Agent_Email;
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
		$Comment = $request->Comment;
		
		
		$Property_Location = $Property_Description['Property_Location'];
		$Property_Type = $Property_Description['Property_Type'];
		$Min_Price = $Property_Description['Min_Price'];
		$Max_Price = $Property_Description['Max_Price'];
		$Area = $Property_Description['Area'];
		$Bedrooms = $Property_Description['Bedrooms'];
		$Bathrooms = $Property_Description['Bathrooms'];
		$Lot_Size = $Property_Description['Lot_Size'];
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
                     <p>You have received a Lead for "Property Search for Buy" on <a href="http://www.americanhomesonline.com">American Homes Online</a> on '.date('d-M-Y h:i:s').'. </p>
                     
                     <table>
                       <caption>Lead & Consumer Information</caption>
                       <tr>
                            <th>Lead Reference ID</th><td>'.$_REQUEST["ID"].'</td>
                        </tr>
                       <tr>
                         <th>Lead ID</th><td>'.$_REQUEST['Consumer_ID'].'</td>
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
                            <td colspan="2">You can check your Lead by Login on <a href="http://americanhomesonline.com/admin/index.php">Login</a>. </td>
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
            mail($to, $subject, $message, $headers);
          
            // code to send html mail ends
              /*
	       *$Phone_No = '+919755832755';
            if(strlen($Phone_No)>0){
                 // code to send sms starts
                    $client = new Services_Twilio($account_sid, $auth_token);
                    $client->account->messages->create(array(
                    'To' => "$Phone_No",
                    'From' => "+17024255249",
                    'Body' => "
                        Hello ".$Agent_Name."
                        You have successfully accepted lead on American Homes Online."
                    ));
                // code to send sms ends */
            }
		
		
		
		
	    }
	    else{ 
		header('location:http://www.americanhomesonline.com/admin');
	    }
	    
	    
	    
	    
	    
	    
	}
	else{ //$str = "http://www.americanhomesonline.com/admin/index.php?Page=credits&ID=".$User_ID."&lead_message=1"; 
	    //echo "<h4><font color='red'>You must have atleast 3 Credits in your account to accept lead.</font></h4>";
	   // header("location:$str");
	    //exit();
	    ?>
	    <script type="text/javascript">
		window.location="http://www.americanhomesonline.com/admin/index.php?Page=credits&ID=<?php echo $User_ID;?>&lead_message=1";
	    </script>
	    <?php
	    
	}
    }
    else{
	echo 5;
	header('location:http://www.americanhomesonline.com/admin');
    }
   
    
    
}
if(isset($_REQUEST['Remove']) && !empty($_REQUEST["ID"])){
    $sql = "DELETE from AHO_AHO_Leads WHERE ID = '".$_REQUEST["ID"]."'"; 
    $sql_result = mysql_query($sql); 
    header('location:index.php?Page=AgentLeads');
}
//$sql = "SELECT * FROM AHO_Consumers where Property_ID>0 AND Agent_ID>0";
$sql = "SELECT AL.ID AS Lead_ID, AL.Property_ID,AL.Consumer_ID,C.Email_ID as Consumer_Email,AL.Received_Date,AL.Is_Accepted FROM AHO_Consumers C,AHO_Agent_Leads AL where AL.Agent_ID='".$User_ID."'and C.ID = AL.Consumer_ID order by AL.Received_Date desc";
$sql_result = mysql_query($sql) or die(mysql_error());
if($sql_result && mysql_num_rows($sql_result))
{
    ?><br>
    <p>You must have 2 Credits in your account to accept a Lead. 1 Credit will be deducted from your account on accepting a Lead. </p>
    <br>
	    <table>
		<tr>
		    <th>S.No.</th>
		    <th>Lead Reference ID</th> 
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
			    <tr>
				<td><?php echo ++$i;?></td>
				<td><?php echo $row->Lead_ID;?></td>
				<!--<td><?php echo $row->Consumer_ID;?></td>
				<td><?php echo $row->Consumer_Email;?></td>
				<td><?php if($row->Property_ID){echo $row->Property_ID;}else{echo "Not Available";}?></td>-->
				<td>
				<?php
				    $status = get_lead_status($row->Consumer_ID,$User_ID);
				    if($status==1){
					echo 'Accepted';
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
					<a href="index.php?Page=credits&ID=<?php echo $User_ID;?>">Buy Credits</a>
					<?php
				    }
				?>
				</td>
				<td><?php echo date('d-M-Y H:i:s',strtotime($row->Received_Date));?></td>
				<td>
				    <!--<a href="index.php?Page=AgentLeads&Update=1&ID=<?php echo $row->Lead_ID;?>">Update</a> |-->
				    <a href="index.php?Page=AgentLeads&Remove=1&ID=<?php echo $row->Lead_ID;?>" onclick="return confirm('Do you really want to delete this record?');">Delete</a>
				</td>
			    </tr>
			<?php
		    }
		?>
	    </table>
    <?php
}
else
{
    echo "<h4><font color='red'>No Record Found</font></h4>";
}
?>

<div style="clear:both"></div>
<br>
<?php
  /*  if(isset($_REQUEST['Update']) && !empty($_REQUEST['ID'])){
	$ID = $_REQUEST['ID'];
	$sql = "select * from AHO_Consumers where ID=$ID";
	$query = mysql_query($sql) or die(mysql_error());
	if($query && mysql_num_rows($query) ){
	    $row = mysql_fetch_object($query);
	    $Property_ID = $row->Property_ID;
	    $Agent_ID = $row->Agent_ID;
	}
	?>
	<center>
	<form action="index.php?Page=Leads" method="post" enctype="multipart/form-data">
	    <div >
		<label>Property ID</label>
		<input type="hidden" name="ID" value="<?php echo $ID;?>"/>
		<input type="text" name="Property_ID" id="Property_ID" value="<?php echo $Property_ID;?>" />
	    </div>
	    <br>
	    <div>
		<label>Agent ID.</label>
		<input type="text" name="Agent_ID" id="Agent_ID" value="<?php echo $Agent_ID;?>" />
	    </div>
	    <br>
	    <center><input type="submit" id="update_consumer" class="button" name="update_consumer" Value="Update" onclick="return check_data();"/></center>
	     
	</form>
	</center>
	<?php
    }*/

?>
<script>
   /* function check_data(){
	
	var Property_ID = $('#Property_ID').val().trim();
	var Agent_ID = $('#Agent_ID').val().trim();
	if (parseInt(Property_ID)<=0) {
	    alert('Enter the Valid Property ID');
	    $('#Property_ID').focus();
	    return false;
	}
	else if (parseInt(Agent_ID)<=0) {
	    alert('Enter the Valid Agent ID.');
	    $('#Agent_ID').focus();
	    return false;
	}
	else{
	    return true;
	}
    }
    function checkEmail(emailAddress) {
	var sQtext = '[^\\x0d\\x22\\x5c\\x80-\\xff]';
	var sDtext = '[^\\x0d\\x5b-\\x5d\\x80-\\xff]';
	var sAtom = '[^\\x00-\\x20\\x22\\x28\\x29\\x2c\\x2e\\x3a-\\x3c\\x3e\\x40\\x5b-\\x5d\\x7f-\\xff]+';
	var sQuotedPair = '\\x5c[\\x00-\\x7f]';
	var sDomainLiteral = '\\x5b(' + sDtext + '|' + sQuotedPair + ')*\\x5d';
	var sQuotedString = '\\x22(' + sQtext + '|' + sQuotedPair + ')*\\x22';
	var sDomain_ref = sAtom;
	var sSubDomain = '(' + sDomain_ref + '|' + sDomainLiteral + ')';
	var sWord = '(' + sAtom + '|' + sQuotedString + ')';
	var sDomain = sSubDomain + '(\\x2e' + sSubDomain + ')*';
	var sLocalPart = sWord + '(\\x2e' + sWord + ')*';
	var sAddrSpec = sLocalPart + '\\x40' + sDomain; // complete RFC822 email address spec
	var sValidEmail = '^' + sAddrSpec + '$'; // as whole string
      
	var reValidEmail = new RegExp(sValidEmail);
      
	if (reValidEmail.test(emailAddress)) {
	  return true;
	}
      
	return false;
    }*/
 </script>
