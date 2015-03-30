<style>
	.error_message{color:#FF0000;display:none;}
	.steps{color: rgb(40, 135, 255);float: left;font-size: 20px;text-align: right;width: 240px;}
	.currentstep{color:rgb(0, 51, 102) !important;}
	.stepsdescription{font-size: 18px;}
	.agent_image_info{float:left;width:50%;}
	.agent_image_info img{width:70px;height:90px;}
	.file_div{float:left;width:90%;padding-bottom:50px;}
	.required{color:#ff0000 !important;}
</style>
<header>
	<center>
		<h3>
		<?php
		
		if($type == 3 ){
			
			if(isset($_REQUEST['ID'])){
					
				if($type==1){
					echo "Edit Profile";
				}
				else{
					echo "Agent Profile";
				}
				
			}
			else{
				echo "Agent Profile";
			}
			
		}
		/*1-05-2014*/
		?>
		</h3>
	</center>
</header>
<?php
if($Update != '')
{
	/*1-05-2014*/
	if(isset($_REQUEST['Availability'])){
		$Availability = implode(',',$_REQUEST['Availability']); 
	}else{
		$Availability='';
	}
	if($type ==1){
		print "<h4 style='text-align:center'><font color='green'>Your account Updated</font></h4>";
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
		$xml = simplexml_load_file("http://maps.google.com/maps/api/geocode/xml?address=$Address,+$City,+$State,+$Zip&sensor=false");
		$Over = $xml->status;
		if($Over == "OVER_QUERY_LIMIT"){
			print "Over Limit"; exit;
			break;
		}
		$Long = $xml->result->geometry->location->lng;
		$Lat = $xml->result->geometry->location->lat;
		
		// Check if other agent names occured in between 100 miles range
		$sql_result = mysql_query('SELECT id,
			(((acos(sin(("'.$Lat.'"*pi()/180)) * sin((`GEO_Lat`*pi()/180))+cos(("'.$Lat.'"*pi()/180)) * cos((`GEO_Lat`*pi()/180)) * cos((("'.$Long.'"- `GEO_Long`)*pi()/180))))*180/pi())*60*1.1515) AS distance FROM `AHO_User` WHERE Name = "'.$Name.'" AND id <> "'.$User_ID.'" Having distance <= "100"');
		
		$num_rows_miles = mysql_num_rows($sql_result);
		
		if($num_rows_miles >= 1){
			$msg_status_update = "<h4><font color='red'>Name already used in 100 Miles area</font></h4>";
		}
		else{
		// Update code
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
		
			/*$db = mysql_connect("localhost", 'ahomain', ',O8bOcL6JUXK') or die();
			mysql_select_db('ahomain_las_rc',$db);*/
			/*$sql = "SELECT * FROM AHO_User WHERE Address != '' AND id='".$Update_Hidden."'"; 
			$sql_result = mysql_query($sql,$db);*/
			/*while($row = mysql_fetch_array($sql_result)){
	
	
			$Address = $row[Address];
			$City = $row[City];
			$State = $row[State];
			$Zip = $row[Zip];
			$id = $row[id];*/
			
			mysql_query("UPDATE AHO_User SET GEO_Lat = '$Lat', GEO_Long = '$Long' WHERE id = '$Update_Hidden' ");
			$msg_status_update = "<h4><font color='green'>Agent Updated</font></h4>";
		}
	/*}*/
	//exit;
		header("location:index.php?Page=Accounts&ID=$Update_Hidden&MSG=$msg_status_update");
		?> 
		<script type="text/javascript">
			window.location="index.php?Page=Accounts&ID=<?php echo $Update_Hidden?>&MSG=<?php echo $msg_status_update?>";
		</script>
		<?php
		print $msg_status_update;
	}
	/*1-05-2014*/
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
//file_get_contents("http://americanhomesonline.com/aho/geo.php");
//print_r($data); die;

if($ID == '')
{
	if($Branch > 1){
	?>
		<b>Add New Agent</b>
		<hr>
		<div class="graph-image" >
			<form action="index.php?Page=Accounts" method="post" data-ajax="false" data-mini='true'>
				<div data-role="fieldcontain" class="ui-hide-label" data-mini='true' >
					<label for="aAdd_MLS" style='padding:4px;'>Add Agent Email:</label>
					<input type="text"name="Add_Agent" id="Add_Agent" data-mini="true" placeholder="Add Agent Email:"/>
					<input type="hidden" name="Add_Hidden" id="basic" data-mini="true" value='1'/>
					<input type="Submit" name="Add" value="Add Agent" data-mini='true' data-theme="b" class="button binactive"/>
				</div>
			</form>
		</div>
		<div class="graph-image-2">
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
		<span style='float: left;font-size:24px; font-weight:bold; color:<?php echo ($total < 15) ? '#f00' : '#036'; ?>'>Leads Remaining: <?php echo $total; ?></span>
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
			print "<div style=' width:100%; margin:auto; border-style:solid;border-color:#cdcdcd;border-width:1px;padding:10px;'>";
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
							$iPod = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
						$iPhone = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
						$iPad = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
						$Android= stripos($_SERVER['HTTP_USER_AGENT'],"Android");
						$webOS= stripos($_SERVER['HTTP_USER_AGENT'],"webOS");
						
						//do something with this information
						if( $iPod || $iPhone || $iPad || $Android ){
							 ?>
							 <a href="?Page=AgentLeadsMobile" data-role='button'  data-mini='true' class='button binactive bsmall' style='font-size:12px;' data-ajax='false'>Leads</a>
							 <?php
						}
						else{
							?>
							 <a href="?Page=AgentLeads" data-role='button'  data-mini='true' class='button binactive bsmall' style='font-size:12px;' data-ajax='false'>Leads</a>
							<?php
						}
						?>
							<!--<a href='index.php?Page=Contacts&ID=<?php echo $row['id']?>' data-role='button'  data-mini='true' class='button binactive bsmall' style='font-size:12px;' data-ajax='false'>Leads</a>-->
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
	if(isset($_REQUEST['MSG'])){
		echo "<center>".$_REQUEST['MSG']."</center>";
	}

	if($Branch > 1){
	$sql = "SELECT * FROM AHO_User WHERE b_id = '$B_ID' AND id = '$ID' ";
	}else{
	$sql = "SELECT * FROM AHO_User WHERE b_id = '$B_ID' AND id = '$User_ID' ";
	}
	$sql_result = mysql_query($sql);
	$row = mysql_fetch_array($sql_result);
	if($row["id"] != '')
	{
		//if(!isset($_REQUEST['Step']) || $_REQUEST['Step']==1)
		//{
	?>		<!--<div class="clearfix">
				<h3 class="steps currentstep">Step 1 <span class="stepsdescription">Account Info</span></h3>
				<!--<h3 class="steps"><a href="index.php?Page=Accounts&ID=<?php echo $ID?>&Step=2">Step 2 <span class="stepsdescription">Send Mail</span></a> </h3>-->
				<!--<h3 class="steps"><a href="index.php?Page=credits&ID=<?php echo $ID?>">Step 2 <span class="stepsdescription">Buy Leads</span></a></h3>
			</div>

			<br><br>-->
			
		<div id="step1">
<!--			<form action="index.php?Page=Accounts" method="post" data-ajax="false" data-mini="true" enctype="multipart/form-data" class="adminforms">-->
			<form action="index.php?Page=Accounts" method="post" data-ajax="false" data-mini="true" enctype="multipart/form-data" class="adminforms" id="update_reg">
				<b><?php if($type==1){echo 'Edit Profile';} else {echo 'Agent Info';}?></b>
				<hr>
				<div data-role="fieldcontain" class="ui-hide-label">
					<label for="aName"><?php if($type==1){echo 'Name';} else {echo 'Agent Name:';}?></label>
					<input type="text" name="Name" id="Name" data-mini="true" placeholder="Name:" value="<?php print $row["Name"] ?>"/>
				</div>
				<?php
			
				if($type != 1){
					?>
					<div data-role="fieldcontain" class="ui-hide-label">
						<label for="aUsername">Cell Phone: [add area code (i.e. 1+(222)555-1212)]</label>
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
						<input type="text" name="Phone" id="Phone" data-mini="true" placeholder="Cell Number (Example:  Country Code + (555)555-5555 )" value="<?php print($phone_no); ?>"/>
					</div>
					<?php
				}
				?>
				
				<div data-role="fieldcontain" class="ui-hide-label">
					<label for="aPassword">Email:</label>
					<span id="email_span"><input type="text" name="Email" id="Email" data-mini="true" placeholder="Email:" value="<?php print $row["Email_1"] ?>"/></span>
					<span class="email_err_msg" style="color:red"></span>
					<input type="hidden" name="userid" value="<?=$User_ID?>" id="userid"/>
				</div>
				<?php if($type != 1){
					?>
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
				<?php } ?>
				<div data-role="fieldcontain" class="ui-hide-label">
					<label for="aVersion">Password: </label>
					<input type="text" name="Password" id="Password" data-mini="true" placeholder="Password" value="<?php print $row["Password"] ?>"/>
				</div>
				<?php if($type != 1){
					?>
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
					<input type="checkbox" class="available_for" name="Buy" value="1" <?php print $Buy_Check ?>>Buying
					<input type="checkbox" class="available_for" name="Rent" value="1" <?php print $Rent_Check ?>>Renting
					<input type="checkbox" class="available_for" name="Sell" value="1" <?php print $Sell_Check ?>>Selling
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
				<?php } ?>
				<div style="clear: both"></div>
				<br>
				<input type="hidden" name="Update_Hidden" id="basic" data-mini="true" value='<?php print $row['id'] ?>'/>
				<input type="submit" name="Update" value="Update" data-mini='true' data-theme="b" class="button binactive" onclick="return validate_form();" id="update_acc"/>
				<!--<a class="button binactive" href="index.php?Page=Accounts&ID=<?php echo $ID?>&Step=2" data-role="button" data-mini="true"data-ajax="false">Next</a>-->
			</form>
			<br>
		</div>
		<?php
		//}
		/*else if($_REQUEST['Step']==2 && !isset($_REQUEST['send'])){
		?>
			<div class="clearfix">
				<h3 class="steps"><a href="index.php?Page=Accounts&ID=<?php echo $ID?>&Step=1">Step 1 <span class="stepsdescription">Account Info</span></a></h3>
				<h3 class="steps currentstep">Step 2 <span class="stepsdescription">Send Mail</span></h3>
				<h3 class="steps"><a href="index.php?Page=credits&ID=<?php echo $ID?>">Step 3 <span class="stepsdescription">Buy Credits</span></a></h3>
			</div>
			<br><br>
			<div id="step2" style="min-height: 216px;margin-left: 40px;">
				<div style="width:90%;float:left;padding-top:10px;padding-bottom:10px;">
					<input type="checkbox" id="send_mail"/>
					<a href="javascript:void(0);" data-role="button" data-mini="true"  data-ajax="false" style="text-decoration: none;color:rgb(0, 51, 102) !important" onclick="return confirm_mail()">Send Mail to your Email ID</a>
				</div><br>
				<div>
					<a class="button binactive" href="index.php?Page=Accounts&ID=<?php echo $ID?>&Step=1" data-role="button" data-mini="true"  data-ajax="false">Back</a>
					<a class="button binactive " href="index.php?Page=Accounts&ID=<?php echo $ID?>&Step=3" data-role="button" data-mini="true"  data-ajax="false">Next</a>
				</div>
			</div>
			
		<?php
		}
		else if($_REQUEST['Step']==2){
		?>
			<div class="clearfix">
				<h3 class="steps"><a href="index.php?Page=Accounts&ID=<?php echo $ID?>&Step=1">Step 1 <span class="stepsdescription">Account Info</span></a></h3>
				<!--<h3 class="steps"><a href="index.php?Page=Accounts&ID=<?php echo $ID?>&Step=2">Step 2 <span class="stepsdescription">Send Mail</span></a></h3>-->
				<h3 class="steps currentstep">Step 2 <span class="stepsdescription">Buy Leads</span></h3>
			</div>
			<br><br>
			<div id="step3" style="min-height: 216px;margin-left: 40px;">
				
				<div>
					<p>Buy Your Leads from here. 
					
						<a class="button binactive bsmall" data-ajax="false" data-mini="true" data-role="button" href="index.php?Page=credits&ID=<?php echo $ID;?>">Leads</a>
					</p>
				</div>
				<div>
					<a class="button binactive" href="index.php?Page=Accounts&ID=<?php echo $ID?>&Step=1" data-role="button" data-mini="true"  data-ajax="false">Back</a>
				</div>
			</div>
		<?php
		}*/	
		?>
		<div style='clear:both'></div>
	<?php	
	}else{
		print "Sorry this MLS doesn't exsist.";
	}
	
}
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
	
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
		var cell_no = $('#Phone').val().trim();
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
		
		
		if(Web.length<=0 || !isUrl(Web)) {
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
				alert('Please check the days you are available to work.');
				$('html, body').animate({
							scrollTop: $("#GEO_Long").offset().top
					}, 100);
				$('#Availability0').focus();
				return false;		
			}
			else if (!av_for) {
				flag=0;
				alert('Please Check The Type Of Leads You Prefer.');
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
	function isUrl(s)
	{
		var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
		return regexp.test(s);
	}
	function confirm_mail()
	{
		/*if(get_browser_info()==1)
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
		}*/
		//else if (get_browser_info()==2) {
			if (document.getElementById('send_mail').checked) {
				window.location = "index.php?Page=Accounts&ID=<?php echo $ID?>&Step=2&send=1";
			}
			else{
				alert('Select the Checkbox and then Click Here.');
				return false;
			}
			
		//}
		
	}
	function get_browser_info()
	{
		var nVer = navigator.appVersion;
		var nAgt = navigator.userAgent;
		var browserName  = navigator.appName;
		var fullVersion  = ''+parseFloat(navigator.appVersion); 
		var majorVersion = parseInt(navigator.appVersion,10);
		var nameOffset,verOffset,ix;
		
		// In Opera, the true version is after "Opera" or after "Version"
		if ((verOffset=nAgt.indexOf("Opera"))!=-1) {
		 browserName = "Opera";
		 fullVersion = nAgt.substring(verOffset+6);
		 if ((verOffset=nAgt.indexOf("Version"))!=-1) 
		   fullVersion = nAgt.substring(verOffset+8);
		}
		// In MSIE, the true version is after "MSIE" in userAgent
		else if ((verOffset=nAgt.indexOf("MSIE"))!=-1) {
		 browserName = "Microsoft Internet Explorer";
		 fullVersion = nAgt.substring(verOffset+5);
		}
		// In Chrome, the true version is after "Chrome" 
		else if ((verOffset=nAgt.indexOf("Chrome"))!=-1) {
		 browserName = "Chrome";
		 fullVersion = nAgt.substring(verOffset+7);
		}
		// In Safari, the true version is after "Safari" or after "Version" 
		else if ((verOffset=nAgt.indexOf("Safari"))!=-1) {
		 browserName = "Safari";
		 fullVersion = nAgt.substring(verOffset+7);
		 if ((verOffset=nAgt.indexOf("Version"))!=-1) 
		   fullVersion = nAgt.substring(verOffset+8);
		}
		// In Firefox, the true version is after "Firefox" 
		else if ((verOffset=nAgt.indexOf("Firefox"))!=-1) {
		 browserName = "Firefox";
		 fullVersion = nAgt.substring(verOffset+8);
		}
		// In most other browsers, "name/version" is at the end of userAgent 
		else if ( (nameOffset=nAgt.lastIndexOf(' ')+1) < 
			  (verOffset=nAgt.lastIndexOf('/')) ) 
		{
		 browserName = nAgt.substring(nameOffset,verOffset);
		 fullVersion = nAgt.substring(verOffset+1);
		 if (browserName.toLowerCase()==browserName.toUpperCase()) {
		  browserName = navigator.appName;
		 }
		}
		// trim the fullVersion string at semicolon/space if present
		if ((ix=fullVersion.indexOf(";"))!=-1)
		   fullVersion=fullVersion.substring(0,ix);
		if ((ix=fullVersion.indexOf(" "))!=-1)
		   fullVersion=fullVersion.substring(0,ix);
		
		majorVersion = parseInt(''+fullVersion,10);
		if (isNaN(majorVersion)) {
		 fullVersion  = ''+parseFloat(navigator.appVersion); 
		 majorVersion = parseInt(navigator.appVersion,10);
		}
		var UserAgent = navigator.userAgent;
		UserAgent = UserAgent.split('/');
		
		if(UserAgent[2].indexOf("Chrome") >=0)
		{
			return 2;
		}
		else
		{
			return 1;
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
			if ($(this).prop('checked')==true) {
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
			if ($(this).prop('checked')==true) {
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
			"aho-ui/content/check_email.php",
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
						
</script>
