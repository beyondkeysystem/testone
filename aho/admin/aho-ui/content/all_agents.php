<?php
if(isset($_POST['send_mail'])){
      require 'mail/PHPMailerAutoload.php';
       $email_arr = $_POST['email_id'];
       $recipients = explode(',' , $email_arr);
	$recipients  = array_filter($recipients);

        try { $mail = new PHPMailer(true);
	// Set PHPMailer to use the sendmail transport
	$mail->isSendmail();
	//Set who the message is to be sent from
	$mail->setFrom('support@americanhomesonline.com', 'American Homes Online');
	//Set an alternative reply-to address
	$mail->addReplyTo('sameer.chourasia@cisinlabs.com', 'Sameer Chaurasia');
	//Set who the message is to be sent to
	foreach($recipients as $email)
	{
        	//$mail->addAddress($email);
		$mail->AddBCC($email);
	}
	//Set the subject line
	$mail->Subject = $_REQUEST['subject'];
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	   //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
	$mail->msgHTML("<html><head><title>American Homes Online</title></head>
			  <body>
			       ".addslashes($_REQUEST['message'])."<br>
			  </body>
			  </html>");
	//Click <a href='".$_REQUEST['AHO_AS']."&AID=".$AID."&Request=".$request_id."' style='font-weight:bold;color:#ff0000'>here</a> to see Agents Profile.
	//Replace the plain text body with one created manually
	$mail->AltBody = 'This is a plain-text message body';
	//Attach an image file
	  //$mail->addAttachment('images/phpmailer_mini.png');
	//send the message, check for errors
	$send = $mail->send();
        
	  $msg_status = "Mail Send Successfully.";
    } catch (phpmailerException $e) {
      $msg_status = $e->errorMessage(); //Pretty error messages from PHPMailer
    } catch (Exception $e) {
      $msg_status = $e->getMessage(); //Boring error messages from anything else!
    }
	
	
         
}
?>
<header>
    <center> <h3><br><?php if(isset($ID)){echo 'Agents Profile';} else {echo "Agents";}?></h3></center>
    <?php if($msg_status != ''){ ?>
	<br>
	    <center><?=$msg_status?></center>
    <?php } ?>
</header>
<style>
    .error_message{color:#FF0000;display:none;}
    .steps{color: rgb(40, 135, 255);float: left;font-size: 20px;text-align: right;width: 240px;}
    .currentstep{color:rgb(0, 51, 102) !important;}
    .stepsdescription{font-size: 18px;}
    .agent_image_info{float:left;width:50%;}
    .agent_image_info img{width:70px;height:90px;}
    .file_div{float:left;width:90%;padding-bottom:50px;}
    .required{color:#ff0000 !important;}
    .right-align{text-align: right;}
    .scroll-y{height:1000px; overflow-y: scroll}
    .btnsize{ width:50px;height:20px;padding-top:0px;padding-bottom:25px;width:20% !important;}
    .tdwidth{ width: 30%;}
    .counterwidth{ width: 100px;}
    .leftspan{
	display: block;
	float:left;
	
      }
      
      .rightspan{
	display: block;
	float:right;
	
      }
    @media screen and (max-width:1024px){
	.btnsize {
	    font-size: 10px !important;
	    height: 20px;
	    padding-bottom: 25px;
	    padding-top: 0;
	    text-align: center;
	    width: 18% !important;
	}
    }
    @media screen and (max-width:768px){
	.btnsize {
	    font-size: 10px !important;
	    height: 20px;
	    padding-bottom: 25px;
	    padding-top: 0;
	    text-align: center;
	    width: 19% !important;
	}
	.tdwidth{ width: 40%;}
    }

</style>
<?php
if(isset($_REQUEST['remove_agent']) && !empty($_REQUEST['remove_agent'])){
    
    $status = remove_agent($_REQUEST['remove_agent']);
    ?>
    <script >
	window.location = 'http://www.americanhomesonline.com/admin/index.php?Page=AllAgents';
    </script>
    <?php
}
?>
<?php

if($Update != ''){
	if(isset($_REQUEST['Availability'])){
		$Availability = implode(',',$_REQUEST['Availability']); 
	}else{
		$Availability='';
	}
	print "<h4><font color='green'>Agent Updated</font></h4>";
	//die("this block");

		//echo "http://maps.google.com/maps/api/geocode/xml?address=$Address,+$City,+$State,+$Zip&sensor=false";
		$xml = simplexml_load_file("http://maps.google.com/maps/api/geocode/xml?address=$Address,+$City,+$State,+$Zip&sensor=false");
		
		//print_r($xml);
		
		$Over = $xml->status;
		
		if($Over == "OVER_QUERY_LIMIT"){
			print "Over Limit";
			exit;
			break;
		}
		
		$Long = $xml->result->geometry->location->lng;
		$Lat = $xml->result->geometry->location->lat;

		// Check if other agent names occured in between 100 miles range
		$sql_result = mysql_query('SELECT id,
			(((acos(sin(("'.$Lat.'"*pi()/180)) * sin((`GEO_Lat`*pi()/180))+cos(("'.$Lat.'"*pi()/180)) * cos((`GEO_Lat`*pi()/180)) * cos((("'.$Long.'"- `GEO_Long`)*pi()/180))))*180/pi())*60*1.1515) AS distance FROM `AHO_User` WHERE Name = "'.$Name.'" AND id <> "'.$_REQUEST['userid'].'" Having distance <= "100"');

		$num_rows_miles = mysql_num_rows($sql_result);

		if($num_rows_miles >= 1){
			$msg_status_update = "<h4><font color='red'>Name already used in 100 Miles area</font></h4>";
			header("location:index.php?Page=AllAgents&ID=$Update_Hidden&MSG=$msg_status_update");
		
			echo '<script type="text/javascript">
			    window.location="index.php?Page=AllAgents&ID='.$Update_Hidden.'&MSG='.$msg_status_update.'";
			</script>';
		
		}else{		   

		    mysql_query("UPDATE AHO_User SET 
		    
		    Name = '$Name',
		    Business ='$Business',
		    
		    Phone_1 = '$Phone',
		    Email_1 = '$Email',
	    
		    Address = '$Address',
		    City = '$City',
		    State = '$State',
		    Zip = '$Zip',
		    Image = '$Image',
		    Password = '$Password',
		    GEO_Lat = '$GEO_Lat',
		    GEO_Long = '$GEO_Long',
		    Buy = '$Buy',
		    Sell = '$Sell',
		    Rent = '$Rent',
		    Web='$Web',
		    Type='3',
		    Availability='$Availability' 
			    
		    WHERE id = '$Update_Hidden'");
			    
		    $uploadfile = basename($_FILES['file']['name']);
	    
		    if(eregi("jpg|png|gif|jpeg",$_FILES['file']['name'])==1){
		    
			    $uploadfile = '/home/ahomain/www/admin/aho-ui/content/userfiles/'.ereg_replace(" ","",$_FILES['file']['name']);
				    
			    $FCon = file_get_contents($_FILES['file']['tmp_name']);
			    
			    file_put_contents($uploadfile,$FCon);
			    
	    
				    mysql_query("UPDATE AHO_User SET 
		    
					    Image_File = '".ereg_replace(" ","",$_FILES['file']['name'])."'
			    
					    WHERE id = '$Update_Hidden'");
	    
		    }
	    
		    mysql_query("UPDATE AHO_User SET GEO_Lat = '$Lat', GEO_Long = '$Long' WHERE id = '$Update_Hidden' ");
		
		//    $msg_status_update = "<h4><font color='green'>Agent Updated</font></h4>";
		
		}
		/*	header("location:index.php?Page=AllAgents&ID=$Update_Hidden&MSG=$msg_status_update");
		
			echo '<script type="text/javascript">
			    window.location="index.php?Page=AllAgents&ID='.$Update_Hidden.'&MSG='.$msg_status_update.'";
			</script>';
		*/
	    ?>
		
	    <?php	

}

if($UpdateD != ''){
	
	print "<h4><font color='green'>Name Updated</font></h4>";
	
	mysql_query("UPDATE AHO_User SET 
	
	Name = '$Display_Name'

	WHERE  id = '$B_ID' ");

}


if($Add_Agent != ''){

    $sql = "SELECT * FROM AHO_User WHERE Email_1 = '$Add_Agent' AND Type = '3' limit 1 ";
    $sql_result = mysql_query($sql);
    $row = mysql_fetch_array($sql_result);

    $user_id = $row["id"];

    if($user_id != ""){
       // print "<h4><font color='red'>Username already taken with same role</font></h4>";
	print "<h4><font color='red'>Username already taken.</font></h4>";

    }else{
       /* if($Broker == ""){
            print "<h4><font color='red'>Please select broker for agent</font></h4>";
        }
        else{    commented on 17may14*/
            print "<h4><font color='green'>Agent Successfully added</font></h4>";
            $TP = md5(date('YMDHis'));

            $Temp_Password = substr($TP,0,5);

           // mysql_query("INSERT INTO AHO_User (Email_1,B_ID,Password,Type) VALUES ('$Add_Agent','$Broker','$Temp_Password','3') ");	commented on 17may14
	    mysql_query("INSERT INTO AHO_User (Email_1,B_ID,B_Code,Password,Type) VALUES ('$Add_Agent','0','0','$Temp_Password','3') ");
                mail("$Add_Agent","Your AHO Account has been Created",
        "
        Please login to 

        http://americanhomesonline.com/admin/

        with username & password

        Username: $Add_Agent

        Password: $Temp_Password
        "

        ,'From:support@americanhomesonline.com'

        );
       // }

}
}

//file_get_contents("http://americanhomesonline.com/aho/geo.php");



if($ID == ''){

?>
<b>Add New Agent</b>
<hr>
<div style="float:left; width:450px;">
<form action="index.php?Page=AllAgents" method="post" data-ajax="false" data-mini='true'>
	<div data-role="fieldcontain" class="ui-hide-label" data-mini='true' >
		<label for="aAdd_MLS" style='padding:4px;'>Add Agent Email:</label>
		<input type="text"name="Add_Agent" id="Add_Agent" data-mini="true" placeholder="Add Agent Email:"/>
        <!-- commented on 17may14<div id ="brker_list" style="display:none">
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
        </div> -->
	<input type="hidden" name="Add_Hidden" id="basic" data-mini="true" value='1'/>
	<input type="Submit" name="Add" value="Add Agent" data-mini='true' data-theme="b" class="button binactive"/>
</div>
</div>
</form>
<div style="float:left; width:350px; margin-left:5px;">
<form action="index.php?Page=FindAllAgents" method="post" data-ajax="false" data-mini='true'>
<div data-role="fieldcontain" class="ui-hide-label" data-mini='true' >
<label for="aAdd_MLS" style='padding:4px;'>Find an Agent</label>
<input type="text" name="agent" id="agent" placeholder="Find Agent">
<input type="Submit" name="Find" value="Find Agent" data-mini='true' data-theme="b" class="button binactive"/>
</form>
</div>
</div>

<?php

$sql = "SELECT * FROM AHO_User WHERE id = '$B_ID' ";
$sql_result = mysql_query($sql);
while ($row = mysql_fetch_array($sql_result)) { 
$total = $row['credits']; 
}
    $sql = "SELECT * FROM AHO_User WHERE Type = '3' ORDER BY id DESC";
    $sql_result = mysql_query($sql);
    $sno = 1;
    $count = mysql_num_rows($sql_result);
?>
<div style="clear:both"></div><br/>
<div>
    <span class="leftspan">Count: <input type="text" disabled class="counterwidth" value="<?=$count?>"/></span>
    <span class="rightspan"><input type="checkbox" class="selectall" id="selectall" name="selectall" value="selectall"/> Select all</span>
</div>
<div style="clear:both"></div><br/>

<div class="outer-table scroll-y">
    <table class="table-field">
	<tr class="tr-heading">
	    <th>S.No.</th>
	    <th>Select</th>
	    <th>Name</th> 
	    <th>Email ID</th>
	    <th>Reg. Date</th>
	    <th>Action</th>
	</tr>
<?php
    while ($row = mysql_fetch_array($sql_result)) {
	$AID = $row["id"];
	$metadata = $row["resources"];
        $Email_1 = substr($row['Email_1'], 0 , 20);
	$exp_reg_date = explode(' ',$row['Regdate']);
	$reg_date = $exp_reg_date[0];
        echo '<tr>';
	    echo '<td><center>'.$sno.'</center></td>';
	    echo "<td class='tdwidth'><a href='index.php?Page=AllAgents&ID={$row['id']}' data-role='button'  data-mini='true' class='button binactive btnsize' style='font-size:12px;' data-ajax='false'>Edit</a>
		<a href='index.php?Page=credits&ID={$row['id']}' data-role='button'  data-mini='true' class='button binactive bsmall btnsize' style='font-size:12px;' data-ajax='false'>Credits</a> 
		<a href='http://www.americanhomesonline.com/admin/index.php?Page=AllAgents&remove_agent=".$row['id']."' data-role='button'  data-mini='true' class='button binactive bsmall btnsize' style='font-size:12px;' data-ajax='false' onclick='return confirm(\"Do you really want to delete this agent?\")'>Remove</a>
		<a href='?Page=Leads&LID=".$row['id']."' data-role='button'  data-mini='true' class='button binactive bsmall btnsize' style='font-size:12px;' data-ajax='false'>Lead</a> ";
	    echo "</td>";
	    echo '<td>'.$row['Name'].'</td>';
	    echo '<td title="'.$row['Email_1'].'">'.$Email_1.'</td>';
	    echo '<td>'.$reg_date.'</td>';
	    echo '<td><center><input class="sendmail_checkbox checkbox1" type="checkbox" value="'.$row['Email_1'].'" name="selectsendmail"></center></td>';
	echo '</tr>';
	$sno++;
    }
?>
    </table>
</div>
<div style="clear:both"></div><br/>
<div class="right-align">
	<a class="button new-login"  name="delete_select" id="delete_select" class="target drop_width" >Delete</a>
	<a class="button new-login"  name="send" id="send_mail" class="target drop_width" >Send Mail</a>
</div>
<div style="clear:both"></div>
<?php
}else{

$sql = "SELECT * FROM AHO_User WHERE  id = '$ID' ";
$sql_result = mysql_query($sql);
$row = mysql_fetch_array($sql_result);

if($row["id"] != ''){
?>

<!--<b>Account Info</b>
<hr>
<form action="index.php?Page=AllAgents" method="post" data-ajax="false" data-mini="true" enctype="multipart/form-data" class="adminforms">
	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="aName">Agent Name:</label>
		<input type="text" name="Name" id="Name" data-mini="true" placeholder="Name:" value="<?php print $row["Name"] ?>"/>
	</div><br>
	<b>Agent Info</b>
	<hr>

	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="aUsername">Phone: [add area code (i.e. 111-222-3333)]</label>
		<input type="text" name="Phone" id="Phone" data-mini="true" placeholder="Phone:" value="<?php print $row["Phone_1"] ?>"/>
	</div>
	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="aPassword">Email:</label>
		<input type="text" name="Email" id="Email" data-mini="true" placeholder="Email:" value="<?php print $row["Email_1"] ?>"/>
	</div>
	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="aPassword">Website:</label>
		<input type="text" name="Web" id="Web" data-mini="true" placeholder="Website:" value="<?php print $row["Web"] ?>"/>
	</div>
	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="aUser_Agent">Address:  </label>
		<input type="text" name="Address" id="Address" data-mini="true" placeholder="Address:" value="<?php print $row["Address"] ?>"/>
	</div>
	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="aUser_Agent_Password">City:</label>
		<input type="text" name="City" id="City" data-mini="true" placeholder="City:" value="<?php print $row["City"] ?>"/>
	</div>
	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="aVersion">State: </label>
		<input type="text" name="State" id="State" data-mini="true" placeholder="State" value="<?php print $row["State"] ?>"/>
	</div>
	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="aVersion">Zip: </label>
		<input type="text" name="Zip" id="Zip" data-mini="true" placeholder="Zip" value="<?php print $row["Zip"] ?>"/>
	</div>	

	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="aVersion">Password: </label>
		<input type="text" name="Password" id="Password" data-mini="true" placeholder="Password" value="<?php print $row["Password"] ?>"/>
	</div>	
	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="aVersion">Latitude: (optional)</label>
		<input type="text" name="GEO_Lat" id="GEO_Lat" data-mini="true" placeholder="" value="<?php print $row['GEO_Lat'] ?>" onclick="changetext(this.value);" />
	</div>		
	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="aVersion">Longitude: (optional) </label>
		<input type="text" name="GEO_Long" id="GEO_Long" data-mini="true" placeholder="" value="<?php print $row['GEO_Long'] ?>" onclick="changetext(this.value);" />
	</div>		
	<br>
	<b>Images</b>
	<hr>
	<?php
	if($f==1){
	?>
	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="aVersion">Image URL: </label>
		<input type="text" name="Image" id="Image" data-mini="true" placeholder="Image URL" value="<?php print $row["Image"] ?>"/>
	</div>	
	OR
	
	<?php
	}
	?>
	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="aVersion">Image Upload: (max size is 1mb) <br><br>current file: <b> [<?php print $row["Image_File"] ?> ]<br><br></label>
		</b>
		<input type="file" name="file" id="file" style="width:300px"/>
		
		
	</div>	
	<br>

	<b>Leads</b>
	<hr>
	<div data-role="fieldcontain" class="ui-hide-label">
		
		<?php
		
		$Buy_Check = $row["Buy"];
		
		if($Buy_Check == 1){
			$Buy_Check = 'checked';
		}
		$Rent_Check = $row["Rent"];
		
		if($Rent_Check == 1){
			$Rent_Check = 'checked';
		}
		$Sell_Check = $row["Sell"];
		
		if($Sell_Check == 1){
			$Sell_Check = 'checked';
		}
		?>
		
		<!--<input type="checkbox" name="Buy" value="1" <?php print $Buy_Check ?>>Buying<br>
		<input type="checkbox" name="Rent" value="1" <?php print $Rent_Check ?>>Renting<br> 
		<input type="checkbox" name="Sell" value="1" <?php print $Sell_Check ?>>Selling<br> 

	</div>
	
	<br>
	<input type="hidden" name="Update_Hidden" id="basic" data-mini="true" value='<?php print $row['id'] ?>'/>
	<input type="Submit" name="Update" value="Update" data-mini='true' data-theme="b" class="button binactive" />
</form><br>
--> 
<div id="step1">
	<form action="index.php?Page=AllAgents" method="post" data-ajax="false" data-mini="true" enctype="multipart/form-data" class="adminforms">
		<?php
		    if(isset($_REQUEST['MSG'])){
			    echo "<center>".$_REQUEST['MSG']."</center>";
		    }
		?>
		<b>Agent Info</b>
		<hr>
		<div data-role="fieldcontain" class="ui-hide-label">
			<label for="aName">Agent Name:</label>
			<input type="text" name="Name" id="Name" data-mini="true" placeholder="Name:" value="<?php print $row["Name"] ?>"/>
		</div>
		<div data-role="fieldcontain" class="ui-hide-label">
			<label for="aUsername">Cell Phone: </label>
			<?php
			$find = array("(",")","+","-");
			$replace = '';
			$phone = str_replace($find,$replace,$row["Phone_1"]);
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
			
			
			?>
			<input type="text" name="Phone" id="Phone" data-mini="true" placeholder="Phone (Example:  Country Code + (555)555-5555 )" value="<?php echo $phone_no; ?>"/>
		</div>
		<div data-role="fieldcontain" class="ui-hide-label">
			<label for="aPassword">Email:</label>
			
			<span id="email_span"><input type="text" name="Email" id="Email" data-mini="true" placeholder="Email:" value="<?php print $row["Email_1"] ?>"/></span>
			<span class="email_err_msg" style="color:red"></span>
			<input type="hidden" name="userid" value="<?=$ID?>" id="userid"/>
		</div>
		<div data-role="fieldcontain" class="ui-hide-label">
			<label for="aPassword">Website: ("http://www.example.com") <span id="web_error" class="error_message">Invalid URL!</span></label>
			<input type="text" name="Web" id="Web" data-mini="true" placeholder="Website:" value="<?php print $row["Web"] ?>"/>
		</div>
		<div data-role="fieldcontain" class="ui-hide-label">
			<label for="aUser_Agent">Home Address:  </label>
			<input type="text" name="Address" id="Address" data-mini="true" placeholder="Address:" value="<?php print $row["Address"] ?>"/>
		</div>
		<div data-role="fieldcontain" class="ui-hide-label">
			<label for="aUser_Agent_Password">City:</label>
			<input type="text" name="City" id="City" data-mini="true" placeholder="City:" value="<?php print $row["City"] ?>"/>
		</div>
		<div data-role="fieldcontain" class="ui-hide-label">
			<label for="aVersion">State: </label>
			<input type="text" name="State" id="State" data-mini="true" placeholder="State" value="<?php print $row["State"] ?>"/>
		</div>
		<div data-role="fieldcontain" class="ui-hide-label">
			<label for="aVersion">Zip: </label>
			<input type="text" name="Zip" id="Zip" data-mini="true" placeholder="Zip" value="<?php print $row["Zip"] ?>"/>
		</div>	
		<div data-role="fieldcontain" class="ui-hide-label">
			<label for="aVersion">Password: </label>
			<input type="text" name="Password" id="Password" data-mini="true" placeholder="Password" value="<?php print $row["Password"] ?>"/>
		</div>	
		<div data-role="fieldcontain" class="ui-hide-label">
			<label for="aVersion">Latitude: (optional)</label>
			<input type="text" name="GEO_Lat" id="GEO_Lat" data-mini="true" placeholder="" value="<?php print $row['GEO_Lat'] ?>" onclick="changetext(this.value);" />
		</div>		
		<div data-role="fieldcontain" class="ui-hide-label">
			<label for="aVersion">Longitude: (optional) </label>
			<input type="text" name="GEO_Long" id="GEO_Long" data-mini="true" placeholder="" value="<?php print $row['GEO_Long'] ?>" onclick="changetext(this.value);" />
		</div>		
		<br>
		<label for="Availability">Availability</label>
		<hr>
		<div data-role="fieldcontain" class="ui-hide-label">
			<label for="Availability" class="required">* Please check the days you are available to work</label>
			<?php
			if(strlen($row['Availability'])>0){
				$Availability = explode(',',$row['Availability']);
			}else{
				$Availability=array();
			}
			$timestamp = strtotime('next Sunday');
			for($i=0;$i<7;$i++)
			{
				?>
				<input type="checkbox" class="available" name="Availability[<?php echo $i;?>]" id="Availability<?php echo $i;?>" value="<?php echo $i;?>" data-mini="true" <?php if(in_array($i,$Availability)){echo 'checked';}?> /><?php echo strftime('%a', $timestamp);?>
				<?php
				 $timestamp = strtotime('+1 day', $timestamp);
			}
			?>
		</div>
		<br>
		<label for="Availability">Leads</label>
		<hr>
		<label for="Buy" class="required">* Please Check The Type Of Leads You Prefer.</label>
		<!--<hr>-->
		<div data-role="fieldcontain" class="ui-hide-label">
		
			<?php
			$Buy_Check = $row["Buy"];
			if($Buy_Check == 1){
				$Buy_Check = 'checked';
			}
			$Rent_Check = $row["Rent"];
			if($Rent_Check == 1){
				$Rent_Check = 'checked';
			}
			$Sell_Check = $row["Sell"];
			if($Sell_Check == 1){
				$Sell_Check = 'checked';
			}
			
			?>
			<input type="checkbox" class="available_for" name="Buy" value="1" <?php print $Buy_Check ?>>Buying<br>
			<input type="checkbox" class="available_for" name="Rent" value="1" <?php print $Rent_Check ?>>Renting<br> 
			<input type="checkbox" class="available_for" name="Sell" value="1" <?php print $Sell_Check ?>>Selling<br> 
		</div>
		<br>	
		<label for="Image">Images</label>
		<hr>
		<?php
		if($f==1){
		?>
			<div data-role="fieldcontain" class="ui-hide-label">
				<label for="aVersion">Image URL: </label>
				<input type="text" name="Image" id="Image" data-mini="true" placeholder="Image URL" value="<?php print $row["Image"] ?>"/>
			</div>	
			OR
		<?php
		}
		?>
		<div data-role="fieldcontain" class="ui-hide-label">
			<label for="aVersion">
				<div class="agent_image_info">
					<div>Photo Upload: (max size is 1mb) </div>
					<div>current file: <b>[<?php print $row["Image_File"] ?> ]</b></div>
				</div>
				
				<?php
					if(isset($row["Image_File"]) && !empty($row["Image_File"])){
						$IMG = "aho-ui/content/userfiles/".$row["Image_File"];
						if(!file_exists($IMG)){
							$IMG = 'images/dpic.jpg';
						}
					}
					else{
						$IMG = 'images/dpic.jpg';
					}
				?>
				<div class="agent_image_info">
					<img src="<?php echo $IMG;?>" id="profile_image"/>
				</div>
				<div class="file_div">
					<input type="file" name="file" id="file" />
				</div>
			</label>
			
		
		</div>
		
		<div style="clear: both"></div>
		<br>
		<input type="hidden" name="Update_Hidden" id="basic" data-mini="true" value='<?php print $row['id'] ?>'/>
		<input type="Submit" name="Update" value="Update" data-mini='true' data-theme="b" class="button binactive" onclick="return validate_form();" id="update_acc"/>
		<!--<a class="button binactive" href="index.php?Page=Accounts&ID=<?php echo $ID?>&Step=2" data-role="button" data-mini="true"data-ajax="false">Next</a>-->
	</form>
	<br>
</div>
<a href='index.php?Page=AllAgents' data-role='button' data-mini='true' data-ajax='false'  style='color:#036;'>Back</a>

<div style='clear:both'></div>

<?php
}else{
print "Sorry this MLS doesn't exsist.";
}

}
?>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
<script>
    function isUrl(s)
    {
	var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
	return regexp.test(s);
    }
    function validate_form()
    {
	var Web = $('#Web').val();
	var cell_no = $('#Phone').val().trim();
	var agent_name = $('#Name').val().trim();
	var contact_no = cell_no.split('-');
	var Email = $('#Email').val();
	var available = check_availability();
	var av_for = available_for();
	contact_no=contact_no.join('');
	contact_no=contact_no.split('(');
	contact_no=contact_no.join('');
	contact_no=contact_no.split(')');
	contact_no=contact_no.join('');
	contact_no=contact_no.split('+');
	contact_no=contact_no.join('');
	$('#Phone').val(contact_no);
	
	if (agent_name.length<=0) {
	    alert('Enter Agent Name.');
	    $('html, body').animate({
		scrollTop: $("#step1").offset().top
	    }, 100);
	    $('#Name').focus();
	    return false;	
	}
	else if (cell_no.length<=0) {
	    alert('Enter Agent Phone No.');
	    $('html, body').animate({
		scrollTop: $("#step1").offset().top
	    }, 100);
	    $('#Phone').focus();
	    return false;
	}
	else if(Web.length<=0 || !isUrl(Web)) {
		alert('Enter Valid Web Address.');
		$('html, body').animate({
				scrollTop: $("#Phone").offset().top
		}, 100);
	    
		$('#Web').focus();
		return false;
	}
	else{
		var flag=1;
		if (!checkEmail(Email)) {
			flag=0;
			alert('Enter Valid Email Address.');
			$('html, body').animate({
						scrollTop: $("#Name").offset().top
				}, 100);
			$('#Email').focus();
			return false;		
		}
		else if(!available){
			flag=0;
			alert('Please check the days Agent is available to work.');
			$('html, body').animate({
						scrollTop: $("#GEO_Long").offset().top
				}, 100);
			
			return false;		
		}
		else if (!av_for) {
			flag=0;
			alert('Please Check The Type Of Leads Agent Prefer.');
			$('html, body').animate({
						scrollTop: $("#Availability0").offset().top
				}, 100);
			
			return false;	
		}
		if (flag==1) {
			return true;
			
		}
		else{
			return false;
		}
	}
	    
	    
	    
    }
    function changetext(longi)
    {
	if(longi){
	    jQuery('.ui-hide-label #GEO_Lat').attr("disabled","disabled") ;
	    jQuery('.ui-hide-label #GEO_Long').attr("disabled","disabled") ;
	}
    }

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
    function check_availability()
    {
	    var flag=0;
	    $('.available').each(function(){
		    if ($(this).prop('checked')==true){ 
        	        flag=1;
		    }
		    
	    });
		    
	    
	    
	    if(flag){
		    return true;
	    }
	    else{
		    return false;
	    }
	    
    }
    function available_for(){
	    
	    var flag=0;
	    $('.available_for').each(function(){
		    if ($(this).prop('checked')==true){ 
			    flag=1;
		    }
	    });
		    
		    
	    
	    if(flag){
		    return true;
	    }
	    else{
		    return false;
	    }
    }

    	$("span#email_span").focusout(function(){
		var email = $('#Email').val();
		var userid = $('#userid').val();
		$.post(
			"aho-ui/content/check_email_admin.php",
			{email_id: email,
			user_id: userid},
			function (data) {
				if (data=="false") {
					$(".email_err_msg").empty();
				}else{
					$(".email_err_msg").html(data);
				}
			}
		);
	});
	
	$("#update_acc").click(function(){
		if($(".email_err_msg").html()  === ''){
			$("#update_reg").submit();
		}else{
			$("#Name").focus();
			
			return false;
		}	
	});
	
	$(document).ready(function() {
	    $('#selectall').click(function(event) {  //on click
		if(this.checked) { // check select status
		    $('.checkbox1').each(function() { //loop through each checkbox
			this.checked = true;  //select all checkboxes with class "checkbox1"              
		    });
		}else{
		    $('.checkbox1').each(function() { //loop through each checkbox
			this.checked = false; //deselect all checkboxes with class "checkbox1"                      
		    });        
		}
	    });
	   
	    $("#delete_select").click(function(){
	    	var arr = [];
            var val_arr = [];        
            $('.sendmail_checkbox:checked').each(function(i){
                arr[i]= $(this).val();
            });
            $.each(unique(arr), function(i, value){
                val_arr[i] = value;
            });
            $.post(
            	"?Page=DeleteSelected",
            	{'mail_id':val_arr},
    	    	function(data){
    	    		window.location="http://americanhomesonline.com/admin/index.php?Page=AllAgents";
            	}
            );
	    });

	});
</script>
<?php
include("send_mail_popup.php");
?>
