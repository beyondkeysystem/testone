<style>
	.error_message{color:#FF0000;display:none;}
	.steps{color: rgb(40, 135, 255);float: left;font-size: 20px;text-align: right;width: 240px;}
	.currentstep{color:rgb(0, 51, 102) !important;}
	.stepsdescription{font-size: 18px;}
</style>
<header>
	<center>
		<h3>
		<?php /*1-05-2014*/ 
		if($type == 2){
		    echo "Broker : Agents Listing";
		}else if($type == 3 ){
		    echo "Agents";
		}
		/*1-05-2014*/
		?>
		</h3>
	</center>
</header>
	
<?php
//echo "<pre>";print_r($_REQUEST);exit;
//After payment process for credits
$sql2 = "SELECT * FROM subscription_periods WHERE type = 'credit'";
$sql_result2 = mysql_query($sql2);
$row2 = mysql_fetch_array($sql_result2);
$no_of_credits = $row2['no_of_credits'];
$deduct_amount = $row2['deduct_amount'];
$creditVal = $deduct_amount/$no_of_credits;
	
if(isset($_POST['free'])){
	//if($_REQUEST['payment_status'] == 'Completed'){
		//Update credits in user table
		
		$sql = "SELECT * FROM AHO_User WHERE id =".$_REQUEST['bid'];
		$sql_result = mysql_query($sql);
		$row = mysql_fetch_array($sql_result);
		$prvCredits = $row['credits'];
		$newCredits = $prvCredits + $_REQUEST['quantity'];
		mysql_query("UPDATE AHO_User SET credits = ".$newCredits." WHERE id =".$_REQUEST['bid']);
		
		/*$Date = date('YmdHis');

		mysql_query("INSERT INTO payment_log (trans_id,user_id,sub_id,payer_id,amount,pay_time)
VALUES ('".addslashes($_REQUEST['txn_id'])."','".addslashes($_REQUEST['ID'])."','".addslashes($_REQUEST['receiver_id'])."','".addslashes($_REQUEST['payer_id'])."','".addslashes($_REQUEST['payment_gross'])."','$Date')");
		unset($_REQUEST['txn_id']);*/
		print "<h4><font color='green'>Credits Updated</font></h4>";
	//}
}
	
if($Update != '')
{
	/*1-05-2014*/
	if(isset($_REQUEST['Availability'])){
		$Availability = implode(',',$_REQUEST['Availability']); 
	}else{
		$Availability='';
	}
	if($type ==1){
		print "<h4><font color='green'>Your account Updated</font></h4>";
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
	}
	else{
		
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
		Availability='$Availability',
		Type='3'
		WHERE id = '$Update_Hidden' ");
		$uploadfile = basename($_FILES['file']['name']);
		if(eregi("jpg|png|gif|jpeg",$_FILES['file']['name'])==1){
			$uploadfile = '/home/ahomain/www/admin/aho-ui/content/userfiles/'.ereg_replace(" ","",$_FILES['file']['name']); 
			$FCon = file_get_contents($_FILES['file']['tmp_name']);
			file_put_contents($uploadfile,$FCon);
			mysql_query("UPDATE AHO_User SET 
			Image_File = '".ereg_replace(" ","",$_FILES['file']['name'])."'
			WHERE id = '$Update_Hidden' AND b_id = '$B_ID' ");
		}
		header("location:index.php?Page=Accounts&ID=$Update_Hidden&Step=2");
		?> 
		<script type="text/javascript">
			window.location="index.php?Page=Accounts&ID=<?php echo $Update_Hidden?>&Step=2";
		</script>
		<?php
		print "<h4><font color='green'>Agent Updated</font></h4>";
	}
	/*1-05-2014*/
}
if(!empty($ID) && isset($_REQUEST['send'])&& $_REQUEST['send']==1)
{
		// send mail code start
	send_mail_document();
	
	header("location:index.php?Page=Accounts&ID=$ID&Step=3");		
	?>
	<script type="text/javascript">
		window.location="index.php?Page=Accounts&ID=<?php echo $Update_Hidden?>&Step=3";
	</script>
	<?php
			
			// send mail code ends
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
		print "<h4><font color='red'>Username already taken with same role</font></h4>";
	}
	else{
		print "<h4><font color='green'>Agent Successfully added</font></h4>";
		$TP = md5(date('YMDHis'));
		$Temp_Password = substr($TP,0,5);
		mysql_query("INSERT INTO AHO_User (Email_1,B_ID,Password,Type) VALUES ('$Add_Agent','$B_ID','$Temp_Password','3') ");	
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
	    
	}
}
file_get_contents("http://americanhomesonline.com/aho/geo.php");
if($ID == '')
{
	if($Branch > 1){
	?>
		<b>Add New Agent</b>
		<hr>
		<div style="float:left; width:450px;">
			<form action="index.php?Page=Accounts" method="post" data-ajax="false" data-mini='true'>
				<div data-role="fieldcontain" class="ui-hide-label" data-mini='true' >
					<label for="aAdd_MLS" style='padding:4px;'>Add Agent Email:</label>
					<input type="text"name="Add_Agent" id="Add_Agent" data-mini="true" placeholder="Add Agent Email:"/>
					<input type="hidden" name="Add_Hidden" id="basic" data-mini="true" value='1'/>
					<input type="Submit" name="Add" value="Add Agent" data-mini='true' data-theme="b" class="button binactive"/>
				</div>
			</form>
		</div>
		<div style="float:left; width:350px; margin-left:5px;">
			<form action="index.php?Page=FindAgent" method="post" data-ajax="false" data-mini='true'>
				<div data-role="fieldcontain" class="ui-hide-label" data-mini='true' >
					<label for="aAdd_MLS" style='padding:4px;'>Find an Agent</label>
					<input type="text" name="agent" id="agent" placeholder="Find Agent">
					<input type="Submit" name="Find" value="Find Agent" data-mini='true' data-theme="b" class="button binactive"/>
				</div>
			</form>
		</div>
		<?php
		$sql = "SELECT * FROM AHO_User WHERE id = '$B_ID' ";
		$sql_result = mysql_query($sql);
		while ($row = mysql_fetch_array($sql_result)) { 
			$total = $row['credits']; 
		}
		?>
		<div style='clear:both'>&nbsp;<br></div>
		<span style='float: left;font-size:24px; font-weight:bold; color:<?php echo ($total < 15) ? '#f00' : '#036'; ?>'>Credits Remaining: <?php echo $total; ?></span>
		<br>
		<div style="float: left;">
		<?php
		if($row2['amount_status'] != 1) { 
			if($row2['no_of_credits']==0){
				echo "1 Credit = $".$row2['deduct_amount']."<br>";
			}else{
				echo $row2['no_of_credits']." Credit = $".$row2['deduct_amount']."<br>";
			}
			$sql = "SELECT * FROM subscription_periods WHERE type = 'lead'";
			$sql_result = mysql_query($sql);
			while ($row = mysql_fetch_array($sql_result)) { 
				echo $row['no_of_credits']." Credits Needed For ".$row['no_of_leads']." lead<br>";
			}
			?>
			<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
				<b>Purchase Additional Credits</b>  
				<input name="amount" id="amount" placeholder="Enter Quantity" type="text" />          
				<input type="hidden" name="cmd" value="_ext-enter" />
				<input type="hidden" name="redirect_cmd" value="_xclick" />
				<input type="hidden" name="business" value="sudhanshu.s_biz@cisinlabs.com" />
				<input type="hidden" name="item_name" value="AHO Credits - Broker: <?php echo $B_ID; ?> " />
				<input type="hidden" name="currency_code" value="USD" />
				<input type="hidden" name="no_note" value="1" />
				<input type="hidden" name="no_shipping" value="1" />
				<input type="hidden" name="rm" value="2" />
				<input type="hidden" name="src" value="1" />
				<input type="hidden" name="sra" value="1" />
				<input type="hidden" name="custom" value="<?php echo $B_ID; ?>" />
				<input type="hidden" name="notify_url" value="http://americanhomesonline.com/admin/index.php?Account=10" />
				<input type="hidden" name="return" value="http://americanhomesonline.com/admin/index.php?Account=10" />
				<input type="hidden" name="cancel_return" value="http://americanhomesonline.com/admin/index.php?Page=cancel" />
				<input type="hidden" name="email" value="<?php echo $Email_1; ?>" />
				<input type="hidden" name="bid" value="<?php echo $B_ID; ?>" />&nbsp;<input name="submit" type="submit" class='button binactive bsmall'  id="submit" value="BUY" style=" cursor:pointer;" />
			</form>
		<?php
		}else{
		?>
			<form action="http://americanhomesonline.com/admin/index.php?Page=Accounts&credit=true" method="post">
				<input name="quantity" id="qty" placeholder="Enter Quantity" type="text" />
				<input type="hidden" name="bid" value="<?php echo $B_ID; ?>" />
				<input name="free" type="submit" class='button binactive bsmall'  id="submit" value="Add Credits" style=" cursor:pointer;" />
			</form>
		<?php
		}?>
		<!--start here  -->
		<div style='clear:both'>&nbsp;<br><br></div>
		<b>Request to Agents </b>
		<hr>
		<table>
		 <?php 
		/*1-05-2014*/
		$query_time= "SELECT U.Name,U.id,COUNT(*) AS TotalRequest
			FROM AHO_Request AS R
			INNER JOIN AHO_User AS U ON U.id = R.Agent_ID
			WHERE U.B_ID = '{$B_ID}'
			GROUP BY U.Name";
		$sql_result_time = mysql_query($query_time);
		echo "<tr><td style='font-weight: bolder; font-size: 22px; color: black;'>Agent Name</td><td style='font-weight: bolder; font-size: 22px; color: black;'>Total Request</td>";
		while($row_time = mysql_fetch_array($sql_result_time)){
			echo "<tr><td>".$row_time['Name']."</td>";
			echo "<td>"."<a href = \"index.php?Page=AgentContacts&ID=".$row_time['id']."\">".$row_time['TotalRequest']."</a></td></tr>";
		}
	        $query_total_time= "SELECT U.Name,COUNT(*) AS TotalRequest
			FROM AHO_Request AS R
			INNER JOIN AHO_User AS U ON U.id = R.Agent_ID
			WHERE U.B_ID = '{$B_ID}'";
		$sql_result_total_time = mysql_query($query_total_time); $row_total_time = mysql_fetch_array($sql_result_total_time) ;
		echo "<tr><td style='font-weight: bolder; font-size: 22px; color: black;'>Total No Request</td>
		       <td style='font-weight: bolder; font-size: 22px; color: black;'>".$row_total_time['TotalRequest'] ."</td></tr>";
		/*1-05-2014*/
		?>	
		</table>
		<!--end here -->
		<div style='clear:both'></div>
		<b>Your Agents</b>
		<hr>
	<?php
	}else{
	?>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
		    google.load("visualization", "1", {packages:["corechart"]});
		</script>  
	<?php
	}
	if($Branch > 1){
	$sql = "SELECT * FROM AHO_User WHERE b_id = '$B_ID' ";
	}else{
	$sql = "SELECT * FROM AHO_User WHERE id = '$User_ID' AND  b_id = '$B_ID'";
	}
	$sql_result = mysql_query($sql);
	while ($row = mysql_fetch_array($sql_result)){
		$AID = $row["id"];
		$metadata = $row["resources"];
		if($type == 1){
			print "<div style=' width:220px; margin:auto; border-style:solid;border-color:#cdcdcd;border-width:1px;padding:10px;'>";
		}
		if($Branch > 1){	
			print "<div style='float:left;width:auto;border-style:solid;border-color:#cdcdcd;border-width:1px;padding:10px;margin:10px;'>";
		}else if($Branch < 1 && $type == 3){
			print "<div style=' width:400px; margin:auto; border-style:solid;border-color:#cdcdcd;border-width:1px;padding:10px;'>";
			$day1 = date("Ymd", mktime(0, 0, 0, date("m"), date("d"),  date("Y")));
			$day2 = date("Ymd", mktime(0, 0, 0, date("m"), date("d")-1,  date("Y")));
			$day3 = date("Ymd", mktime(0, 0, 0, date("m"), date("d")-2,  date("Y")));
			$day4 = date("Ymd", mktime(0, 0, 0, date("m"), date("d")-3,  date("Y")));
			$day5 = date("Ymd", mktime(0, 0, 0, date("m"), date("d")-4,  date("Y")));
			$day6 = date("Ymd", mktime(0, 0, 0, date("m"), date("d")-5,  date("Y")));						
			$day7 = date("Ymd", mktime(0, 0, 0, date("m"), date("d")-6,  date("Y")));						
			$sqla = "SELECT count(id) as Sum FROM AHO_Request WHERE Agent_ID = '$AID' AND Date_Time LIKE '$day1%' ORDER BY id DESC";
			$sql_resulta = mysql_query($sqla);
			$rowa = mysql_fetch_array($sql_resulta);
			$Logger1 = $rowa["Sum"];
			$sqla = "SELECT count(id) as Sum FROM AHO_Request WHERE Agent_ID = '$AID' AND Date_Time LIKE '$day2%' ORDER BY id DESC";
			$sql_resulta = mysql_query($sqla);
			$rowa = mysql_fetch_array($sql_resulta);
			$Logger2 = $rowa["Sum"];
			$sqla = "SELECT count(id) as Sum FROM AHO_Request WHERE Agent_ID = '$AID' AND Date_Time LIKE '$day3%' ORDER BY id DESC";
			$sql_resulta = mysql_query($sqla);
			$rowa = mysql_fetch_array($sql_resulta);
			$Logger3 = $rowa["Sum"];
			$sqla = "SELECT count(id) as Sum FROM AHO_Request WHERE Agent_ID = '$AID' AND Date_Time LIKE '$day4%' ORDER BY id DESC";
			$sql_resulta = mysql_query($sqla);
			$rowa = mysql_fetch_array($sql_resulta);
			$Logger4 = $rowa["Sum"];	
			$sqla = "SELECT count(id) as Sum FROM AHO_Request WHERE Agent_ID = '$AID' AND Date_Time LIKE '$day5%' ORDER BY id DESC";
			$sql_resulta = mysql_query($sqla);
			$rowa = mysql_fetch_array($sql_resulta);
			$Logger5 = $rowa["Sum"];		
			$sqla = "SELECT count(id) as Sum FROM AHO_Request WHERE Agent_ID = '$AID' AND Date_Time LIKE '$day6%' ORDER BY id DESC";
			$sql_resulta = mysql_query($sqla);
			$rowa = mysql_fetch_array($sql_resulta);
			$Logger6 = $rowa["Sum"];
			$sqla = "SELECT count(id) as Sum FROM AHO_Request WHERE Agent_ID = '$AID' AND Date_Time LIKE '$day7%' ORDER BY id DESC";
			$sql_resulta = mysql_query($sqla);
			$rowa = mysql_fetch_array($sql_resulta);
			$Logger7 = $rowa["Sum"];
		}
		if($Branch > 1){
		}else if($Branch < 1 && $type == 3){
		?>
			<script type="text/javascript">
				google.setOnLoadCallback(drawChart);
				function drawChart(){
					var data = google.visualization.arrayToDataTable([
						['Day', 'Records'],
						['|',  <?php print $Logger7+0 ?>],
						['|',   <?php print $Logger6+0 ?>],
						['|',   <?php print $Logger5+0 ?>],
						['|',   <?php print $Logger4+0 ?>],
						['|',   <?php print $Logger3+0 ?>],
						['|',   <?php print $Logger2+0 ?>],
						['|',   <?php print $Logger1+0 ?>]
					]);
					var options = {
						title: 'Past 7 Days',
						hAxis: {title: 'Day',  titleTextStyle: {color: '#333'}},
						vAxis: {minValue: 0}
					};
					var chart = new google.visualization.AreaChart(document.getElementById('chart_div<?php print $row['id'] ?>'));
					chart.draw(data, options);
				}
			</script>
			<div id="chart_div<?php print $row['id'] ?>" style="width: 100%; height: 200px;"></div>
		<?php
		}
		$Email_1 = substr($row['Email_1'], 0 , 35);
		if($Branch > 1){
			?>
			<div>
				<ul>
					<li><span style='font-size:16px; color:#036;'><?php echo $Email_1 ?></span></li>
					<li><a href='index.php?Page=Accounts&ID=<?php echo $row['id']?>' data-role='button'  data-mini='true' class='button binactive' style='font-size:12px;' data-ajax='false'>Edit</a>
					<a href='index.php?Page=Contacts&ID=<?php echo $row['id']?>' data-role='button'  data-mini='true' class='button binactive bsmall' style='font-size:12px;' data-ajax='false'>Contacts</a>
					<a href='aho-ui/content/pops/remove.php?ID=<?php echo $row['id']?>' class='various  button bactive bsmall' onclick='return confirm("Do you really want to delete this agent? ");' style='font-size:12px;'>Remove</a></li>
				</ul>
			</div>
			<?php
		}else{
			?>
			<div>
				<ul>
					<li><span style='font-size:16px;'><?php echo $Email_1 ?></span></li>
					<li>
						<a href='index.php?Page=Accounts&ID=<?php echo $row['id']?>' data-role='button'  data-mini='true' class='button binactive' style='font-size:12px;'  data-ajax='false'>Edit</a> 
						<?php	
						if($type != 1){
						?>
							<a href='index.php?Page=Contacts&ID=<?php echo $row['id']?>' data-role='button'  data-mini='true' class='button binactive bsmall' style='font-size:12px;' data-ajax='false'>Contacts</a>
							<a href='index.php?Page=credits&ID=<?php echo $row['id']?>' data-role='button'  data-mini='true' class='button binactive bsmall' style='font-size:12px;' data-ajax='false'>Credits</a>
						<?php
						}
						?>
					</li>
				</ul>
			</div>
		<?php
		}
	
	}
	if($AID==''){
		print "Add an agent or yourself to get started.";
	
	}
	?>
	<div style="clear:both"></div>
	<?php
	if($Branch > 1){
	?>
		<b>Display Name</b>
		<form>
			<div data-role="fieldcontain" class="ui-hide-label" data-mini='true'>
				<input type="text" name="Display_Name" id="Display_Name" data-mini="true" placeholder="Update Display Name:"/>
			</div>
			<input type="hidden" name="UDD_Hidden" id="basic" data-mini="true" value='1'/>
			<input type="Submit" name="UpdateD" value="Update" data-mini='true' data-theme="b" class="button binactive"/>
		</form>
		<br><b>Site Code</b><hr>
		<textarea style='width:100%;height:200px'>
			<script src='http://code.jquery.com/jquery-1.10.2.js'></script>
			<script id='AHO-JS' src='../aho/aho.js?APP_ID=<?php print $Branch ?>'></script>
			<div id='AHO-Remote-Load' style='float:right;position:fixed;right:10px;z-index:1000'></div>
			<div style='clear:both'></div>
		</textarea>
	
<?php
	}
}
else
{
	
	if($Branch > 1){
	$sql = "SELECT * FROM AHO_User WHERE b_id = '$B_ID' AND id = '$ID' ";
	}else{
	$sql = "SELECT * FROM AHO_User WHERE b_id = '$B_ID' AND id = '$User_ID' ";
	}
	$sql_result = mysql_query($sql);
	$row = mysql_fetch_array($sql_result);
	if($row["id"] != '')
	{
		if(!isset($_REQUEST['Step']) || $_REQUEST['Step']==1)
		{
	?>
			<h3 class="steps currentstep">Step 1 <span class="stepsdescription"> > Edit Account</span></h3><h3 class="steps"><a href="index.php?Page=Accounts&ID=<?php echo $ID?>&Step=2">Step 2 <span class="stepsdescription"> > Send Mail</span></a> </h3><h3 class="steps"><a href="index.php?Page=credits&ID=<?php echo $ID?>">Step 3 <span class="stepsdescription"> > Buy Credits</span></a></h3>
			<br><br>
			<h3 class="steps currentstep" style="text-align: left !important">Account Info</h3><br>
			<div id="step1">
				<form action="index.php?Page=Accounts" method="post" data-ajax="false" data-mini="true" enctype="multipart/form-data" class="adminforms">
					<b>Agent Info</b>
					<hr>
					<div data-role="fieldcontain" class="ui-hide-label">
						<label for="aName">Agent Name:</label>
						<input type="text" name="Name" id="Name" data-mini="true" placeholder="Name:" value="<?php print $row["Name"] ?>"/>
					</div>
					<div data-role="fieldcontain" class="ui-hide-label">
						<label for="aUsername">Phone: [add area code (i.e. 111-222-3333)]</label>
						<input type="text" name="Phone" id="Phone" data-mini="true" placeholder="Phone:" value="<?php print $row["Phone_1"] ?>"/>
					</div>
					<div data-role="fieldcontain" class="ui-hide-label">
						<label for="aPassword">Email:</label>
						<input type="text" name="Email" id="Email" data-mini="true" placeholder="Email:" value="<?php print $row["Email_1"] ?>"/>
					</div>
					<div data-role="fieldcontain" class="ui-hide-label">
						<label for="aPassword">Website: <span id="web_error" class="error_message">Invalid URL!</span></label>
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
					<div data-role="fieldcontain" class="ui-hide-label">
						<label for="Availability">Available On:</label>
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
							<input type="checkbox" name="Availability[<?php echo $i;?>]" id="Availability[<?php echo $i;?>]" value="<?php echo $i;?>" data-mini="true" <?php if(in_array($i,$Availability)){echo 'checked';}?> /><?php echo strftime('%a', $timestamp);?>
							<?php
							 $timestamp = strtotime('+1 day', $timestamp);
						}
						?>
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
					<input type="Submit" name="Update" value="Update" data-mini='true' data-theme="b" class="button binactive" onclick="return validate_form();" />
					<a class="button binactive" href="index.php?Page=Accounts&ID=<?php echo $ID?>&Step=2" data-role="button" data-mini="true"data-ajax="false">Next</a>
				</form>
				<br>
			</div>
		<?php
		}
		else if($_REQUEST['Step']==2 && !isset($_REQUEST['send'])){
		?>
			<h3 class="steps"><a href="index.php?Page=Accounts&ID=<?php echo $ID?>&Step=1">Step 1 <span class="stepsdescription"> > Edit Account</span></a></h3><h3 class="steps currentstep">Step 2 <span class="stepsdescription"> > Send Mail</span></h3><h3 class="steps"><a href="index.php?Page=credits&ID=<?php echo $ID?>">Step 3 <span class="stepsdescription"> > Buy Credits</span></a></h3>
			<br><br>
			<div id="step2" style="min-height: 216px;margin-left: 40px;">
				<div>
					<input type="checkbox" id="send_mail"/>
					<a href="javascript:void(0)" data-role="button" data-mini="true"  data-ajax="false" style="text-decoration: none;color:rgb(0, 51, 102) !important" onclick="return confirm_mail()">Send Mail to your Email ID</a>
				</div><br>
				<div>
					<a class="button binactive" href="index.php?Page=Accounts&ID=<?php echo $ID?>&Step=1" data-role="button" data-mini="true"  data-ajax="false">Back</a>
					<a class="button binactive " href="index.php?Page=Accounts&ID=<?php echo $ID?>&Step=3" data-role="button" data-mini="true"  data-ajax="false">Next</a>
				</div>
			</div>
			
		<?php
		}
		else if($_REQUEST['Step']==3){
		?>
			<h3 class="steps"><a href="index.php?Page=Accounts&ID=<?php echo $ID?>&Step=1">Step 1 <span class="stepsdescription"> > Edit Account</span></a></h3><h3 class="steps"><a href="index.php?Page=Accounts&ID=<?php echo $ID?>&Step=2">Step 2 <span class="stepsdescription"> > Send Mail</span></a></h3><h3 class="steps currentstep">Step 3 <span class="stepsdescription"> > Buy Credits</span></h3>
			<br><br>
			<div id="step3" style="min-height: 216px;margin-left: 40px;">
				
				<div>
					<p>Buy Your Credits from here. 
					
						<a class="button binactive bsmall" data-ajax="false" data-mini="true" data-role="button" href="index.php?Page=credits&ID=<?php echo $ID;?>">Credits</a>
					</p>
				</div>
				<div>
					<a class="button binactive" href="index.php?Page=Accounts&ID=<?php echo $ID?>&Step=2" data-role="button" data-mini="true"  data-ajax="false">Back</a>
				</div>
			</div>
		<?php
		}	
		?>
		<div style='clear:both'></div>
	<?php	
	}else{
		print "Sorry this MLS doesn't exsist.";
	}
	
}
?>
	
<script>
	function changetext(longi)
	{
		if(longi){
			jQuery('.ui-hide-label #GEO_Lat').attr("disabled","disabled") ;
			jQuery('.ui-hide-label #GEO_Long').attr("disabled","disabled") ;
		}
	}
	function validate_form()
	{
		var Web = $('#Web').val();
		if(Web.length<=0 || !isUrl(Web)) {
			$('#web_error').show();
			$('#Web').focus();
			return false;
		}
	}
	function isUrl(s)
	{
		var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
		return regexp.test(s);
	}
	function confirm_mail()
	{
		$(document).ready(function(){
			if ($('#send_mail').prop('checked') == true) {
				window.location = "index.php?Page=Accounts&ID=<?php echo $ID?>&Step=2&send=1";
			}
			else
			{
				alert('Select the Checkbox and then Click Here.');
				return false;
			}
		});
	}
</script>
