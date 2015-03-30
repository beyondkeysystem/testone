<script>
	function check_value(){
		var qty = parseInt(document.getElementById('qty').value.trim());
		var return_value = document.getElementById('return').value;
		if (qty %2==0) {
			//var deduct_amount = parseFloat(document.getElementById('amount').value.trim());
			//deduct_amount = parseFloat(qty*deduct_amount);
			//document.getElementById('amount').value = deduct_amount;
			return_value = return_value+qty;
			document.getElementById('return').value=return_value;
			return true;
		}
		else{
			alert('You can buy credits in multiple of 2.');
			return false;
		}
		
	}
</script>
<header><center>
    <h3><br>AGENT CREDITS</h3></center>
</header>
<hr>
	
<?php
//echo "<pre>";print_r($_REQUEST);exit;
//After payment process for credits
$sql2 = "SELECT * FROM subscription_periods WHERE type = 'credit'";
$sql_result2 = mysql_query($sql2);
$row2 = mysql_fetch_array($sql_result2);
$no_of_credits = $row2['no_of_credits'];
$deduct_amount = $row2['deduct_amount'];
$creditVal = $deduct_amount/$no_of_credits;

if(isset($_REQUEST['txn_id'])){
	if($_REQUEST['payment_status'] == 'Completed'){
		//Update credits in user table
		
		$sql = "SELECT * FROM AHO_User WHERE id =".$_REQUEST['ID'];
		$sql_result = mysql_query($sql);
		$row = mysql_fetch_array($sql_result);
		$prvCredits = $row['credits'];
		$newCredits = $prvCredits + $_REQUEST['quantity'];
		mysql_query("UPDATE AHO_User SET credits = ".$newCredits." WHERE id =".$_REQUEST['ID']);
		
		$Date = date('YmdHis');

		mysql_query("INSERT INTO payment_log (trans_id,user_id,sub_id,payer_id,amount,pay_time)
VALUES ('".addslashes($_REQUEST['txn_id'])."','".addslashes($_REQUEST['ID'])."','".addslashes($_REQUEST['receiver_id'])."','".addslashes($_REQUEST['payer_id'])."','".addslashes($_REQUEST['payment_gross'])."','$Date')");
		unset($_REQUEST['txn_id']);
		print "<h4><font color='green'>Credits Updated</font></h4>";
	}
}
if(isset($_POST['add_credits']))
{
	if($_POST['quantity']>0)
	{
		$sql = "SELECT * FROM AHO_User WHERE id =".$_REQUEST['ID'];
		$sql_result = mysql_query($sql);
		$row = mysql_fetch_array($sql_result);
		$prvCredits = $row['credits'];
		$newCredits = $prvCredits + $_REQUEST['quantity'];
		mysql_query("UPDATE AHO_User SET credits = ".$newCredits." WHERE id =".$_REQUEST['ID']);
		print "<h4><font color='green'>Credits Updated</font></h4>";
		
	}
	else
	{
		print "<h4><font color='red'>You have added 0 Credits.</font></h4>";
	}
}
if(isset($_POST['free'])){
	//if($_REQUEST['payment_status'] == 'Completed'){
		//Update credits in user table
		
		$sql = "SELECT * FROM AHO_User WHERE id =".$_REQUEST['ID'];
		$sql_result = mysql_query($sql);
		$row = mysql_fetch_array($sql_result);
		$prvCredits = $row['credits'];
		$newCredits = $prvCredits + $_REQUEST['quantity'];
		mysql_query("UPDATE AHO_User SET credits = ".$newCredits." WHERE id =".$_REQUEST['ID']);
		
		/*$Date = date('YmdHis');

		mysql_query("INSERT INTO payment_log (trans_id,user_id,sub_id,payer_id,amount,pay_time)
VALUES ('".addslashes($_REQUEST['txn_id'])."','".addslashes($_REQUEST['ID'])."','".addslashes($_REQUEST['receiver_id'])."','".addslashes($_REQUEST['payer_id'])."','".addslashes($_REQUEST['payment_gross'])."','$Date')");
		unset($_REQUEST['txn_id']);*/
		print "<h4><font color='green'>Credits Updated</font></h4>";
	//}
}

if($Update != ''){
	
	print "<h4><font color='green'>Agent Updated</font></h4>";
	
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
        Type = '3'
		
	WHERE id = '$Update_Hidden' ");
		
        $uploadfile = basename($_FILES['file']['name']);

	if(eregi("jpg|png|gif|jpeg",$_FILES['file']['name'])==1){
	
		$uploadfile = '/home/ahomain/www/admin/aho-ui/content/userfiles/'.ereg_replace(" ","",$_FILES['file']['name']);
		
		
		$FCon = file_get_contents($_FILES['file']['tmp_name']);
		
		file_put_contents($uploadfile,$FCon);
		

    			mysql_query("UPDATE AHO_User SET 
	
				Image_File = '".ereg_replace(" ","",$_FILES['file']['name'])."'
		
				WHERE id = '$Update_Hidden'");

	}

}
if($AgentID == ""){
 $Find_ID = $_REQUEST['ID'];

 $sql = "SELECT * FROM AHO_User WHERE id = '$Find_ID'";

 $sql_result = mysql_query($sql);

 while ($row = mysql_fetch_array($sql_result)) {
		
	$AID = $row["id"];
	$total = $row["credits"];
        $metadata = $row["resources"];
        print "<div style='float:left;width:210px;border-style:solid;border-color:#cdcdcd;border-width:1px;padding:10px;margin:10px;'>";
?>
    

	<?php
	$Email_1 = substr($row['Email_1'], 0 , 50);

	print "
	<ul>	
	<li><span style='font-size:16px; color:#036;'>$Email_1</span></li>
	<li><a href='index.php?Page=credits&AgentID={$row['id']}' data-role='button'  data-mini='true' class='button binactive' style='font-size:12px;' data-ajax='false'>Edit</a>
	<a href='index.php?Page=AgentContacts&ID={$row['id']}' data-role='button'  data-mini='true' class='button binactive bsmall' style='font-size:12px;' data-ajax='false'>Contacts</a>
	<a href='aho-ui/content/pops/remove_agent.php?ID={$row['id']}' class='various fancybox.iframe button bactive bsmall' style='font-size:12px;'>Remove</a></li></ul>
	</div>";
	
}?>
    <div id='agentbox'>
    <div style="float:left;">    <br>


<span style='font-size:32px; font-weight:bold; color:<?php echo ($total < 15) ? '#f00' : '#036'; ?>'>Credits Remaining: <?php echo $total; ?></span><br>

	<?php
	
	if($type==1)
	{
		?>		
		<br>
		<!--<form action="http://alpha.cisinlabs.com:81/americanhomesonline/ahoCore/admin/index.php?Page=credits&ID=<?php echo $AID;?>" method="post">-->
		<form action="index.php?Page=credits&ID=<?php echo $AID;?>" method="post">
			      <input name="quantity" id="qty" placeholder="Enter Quantity" type="text" /><br />
			      <input name="add_credits" type="submit" class='button binactive bsmall'  id="submit" value="Add Credits" style=" cursor:pointer;" />
		</form>
		<?php
	}
	else if(($row2['amount_status'] != 1))
	{ 
		
		echo "<br>";
		if(isset($_REQUEST['lead_message']) && $_REQUEST['lead_message']==1){
			echo "<p style='color:#ff0000'>You must have 2 Credits in your account to accept Lead.</p>";
		}
		echo "1 Credit = $".$row2['deduct_amount']."<br>";
		$sql = "SELECT * FROM subscription_periods WHERE type = 'lead'";
		$sql_result = mysql_query($sql);
		while ($row = mysql_fetch_array($sql_result))
		{ 
			echo $row['no_of_credits']." Credit(s) Needed For ".$row['no_of_leads']." lead<br>";
			echo "You can buy Credits in multiple of 2";
			
		}
		?>
		<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
			<b>Purchase Additional Credits</b>
			<input name="quantity" id="qty" placeholder="Enter Quantity" type="text"  /><br />
			<input name="amount" id="amount" placeholder="Enter Quantity" type="hidden" value="<?=$deduct_amount?>" /><br />
			<input type="hidden" name="cmd" value="_ext-enter" />
			<input type="hidden" name="redirect_cmd" value="_xclick" />
			<!--input type="hidden" name="business" value="burt@americanhomesonline.com" /-->
			<input type="hidden" name="business" value="sudhanshu.s_biz@cisinlabs.com" />
			<input type="hidden" name="item_name" value="AHO Credits - <?php echo $Email_1; ?> " />
			<input type="hidden" name="currency_code" value="USD" />
			<input type="hidden" name="no_note" value="1" />
			<input type="hidden" name="no_shipping" value="1" />
		
			<input type="hidden" name="rm" value="2" />
			<input type="hidden" name="src" value="1" />
			<input type="hidden" name="sra" value="1" />
		
			<input type="hidden" name="custom" value="<?php echo $AID; ?>" />
			<input type="hidden" name="return" id="return" value="http://www.americanhomesonline.com/admin/index.php?Page=credits&ID=<?php echo $AID;?>&payment_status=Completed&quantity=" />
			<input type="hidden" name="cancel_return" value="http://www.americanhomesonline.com/admin/index.php?Page=cancel" />
			<input type="hidden" name="email" value="<?php echo $Email_1; ?>" />
			<input name="submit" type="submit" class='button binactive bsmall'  id="submit" value="MAKE PAYMENT VIA PAYPAL" style=" cursor:pointer;" onclick=" return check_value();" />
			</label>
		</form>
  <?php }
	else
	{ ?>
		<br>
		<form action="http://www.americanhomesonline/admin/index.php?Page=credits&ID=<?php echo $AID;?>" method="post">
			      <input name="quantity" id="qty" placeholder="Enter Quantity" type="text" /><br />
			      <input name="free" type="submit" class='button binactive bsmall'  id="submit" value="Add Credits" style=" cursor:pointer;" />
		</form>
  <?php }?>
</div>
</div>

<?php }else{
$sql        = "SELECT * FROM AHO_User WHERE Type = '3' AND id = '$AgentID' ";
$sql_result = mysql_query($sql);
$row        = mysql_fetch_array($sql_result);

if($row["id"] != ''){
?>

<b>Account Info</b>
<hr>
<form action="index.php?Page=credits&ID=<?php echo $row['id']?>" method="post" data-ajax="false" data-mini="true" enctype="multipart/form-data" class="adminforms">
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
		
		<input type="checkbox" name="Buy" value="1" <?php print $Buy_Check ?>>Buying<br>
		<input type="checkbox" name="Rent" value="1" <?php print $Rent_Check ?>>Renting<br> 
		<input type="checkbox" name="Sell" value="1" <?php print $Sell_Check ?>>Selling<br> 

	</div>
	
	<br>
	<input type="hidden" name="Update_Hidden" id="basic" data-mini="true" value='<?php print $row['id'] ?>'/>
	<input type="Submit" name="Update" value="Update" data-mini='true' data-theme="b" class="button binactive" />
</form><br>
<a href='index.php?Page=credits&ID=<?php echo $row['id']?>' data-role='button' data-mini='true' data-ajax='false'  style='color:#036;'>Back</a>

<div style='clear:both'></div>
   <?php  
}}?>
<div style="clear:both"></div>
