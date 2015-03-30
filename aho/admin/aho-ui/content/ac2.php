<h3>Agents</h3>

  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      
   </script>   
<br>
<?php


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
	Web='$Web'
	
	
	
	WHERE id = '$Update_Hidden' AND b_id = '$B_ID' ");
	
	
	
    $uploadfile = basename($_FILES['file']['name']);

	if(eregi("jpg|png|gif|jpeg",$_FILES['file']['name'])==1){
	
		$uploadfile = '/home/ahomain/www/admin/aho-ui/content/userfiles/'.ereg_replace(" ","",$_FILES['file']['name']);
		
		
		$FCon = file_get_contents($_FILES['file']['tmp_name']);
		
		file_put_contents($uploadfile,$FCon);
		
		
    		    		
    			mysql_query("UPDATE AHO_User SET 
	
				Image_File = '{$_FILES['file']['name']}'
		
				WHERE id = '$Update_Hidden' AND b_id = '$B_ID' ");

	
	}

}

if($UpdateD != ''){
	
	print "<h4><font color='green'>Name Updated</font></h4>";
	
	mysql_query("UPDATE AHO_User SET 
	
	Name = '$Display_Name'

	WHERE  id = '$B_ID' ");

}


if($Add_Agent != ''){


	$TP = md5(date('YMDHis'));
	
	$Temp_Password = substr($TP,0,5);
	
	mysql_query("INSERT INTO AHO_User (Email_1,B_ID,Password) VALUES ('$Add_Agent','$B_ID','$Temp_Password') ");

	mail("$Add_Agent","Your AHO Account has been Created",
"
Please login to 

http://nv.americanhomesonline.com/aho/admin/

with username & password

u: $Add_Agent
 
p: $Temp_Password
"

,'From:support@americanhomesonline.com'

);

}

if($ID == ''){

?>

<?php
if($Branch > 1){
?>

<b>Add New Agent</b>
<hr>
<form action="index.php?Page=Accounts" method="post" data-ajax="false" data-mini='true'>
	<div data-role="fieldcontain" class="ui-hide-label" data-mini='true'>
		<label for="aAdd_MLS">Add Agent Email:</label>
		<input type="text" name="Add_Agent" id="Add_Agent" data-mini="true" placeholder="Add Agent Email:"/>
	</div>
	<input type="hidden" name="Add_Hidden" id="basic" data-mini="true" value='1'/>
	<input type="Submit" name="Add" value="Add" data-mini='true' data-theme="b" class="button scrolly"/>
</form>
<br>
<b>Your Agents</b>
<hr>

<?php
}
?>

<?php
if($Branch > 1){
$sql = "SELECT * FROM AHO_User WHERE b_id = '$B_ID' ";
}else{
$sql = "SELECT * FROM AHO_User WHERE id = '$User_ID' AND  b_id = '$B_ID'";
}

$sql_result = mysql_query($sql);
while ($row = mysql_fetch_array($sql_result)) {
		
	$AID = $row["id"];
		
	$metadata = $row["resources"];
	
	print "<div style='float:left;width:350px;border-style:solid;border-color:#cdcdcd;border-width:1px;padding:20px;margin:10px;'>";
	

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
		
		

?>



    <script type="text/javascript">
  
      google.setOnLoadCallback(drawChart);
      
      
      function drawChart() {
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
    
    <div id="chart_div<?php print $row['id'] ?>" style="width: 100%; height: 300px;"></div>

	<?php
	$Email_1 = substr($row['Email_1'], 0 , 20);

if($Branch > 1){

	print "
	<ul>
	<li>$Email_1...</li>
	<li><a href='index.php?Page=Accounts&ID={$row['id']}' data-role='button'  data-mini='true' class='button scrolly' data-ajax='false'>Edit</a></li>
	<li><a href='aho-ui/content/pops/remove.php?ID={$row['id']}' class='various fancybox.iframe' >Remove Account</a></li></ul>
	</div>";
	
}else{

	print "
	<ul>
	<li>$Email_1...</li>
	<li><a href='index.php?Page=Accounts&ID={$row['id']}' data-role='button'  data-mini='true' class='button scrolly' data-ajax='false'>Edit</a></li>

	</ul>
	</div>";

}

}

if($AID==''){

print "Add an agent or yourself to get started.";

}


?>
<div style="clear:both"></div>
<br><br>
<?php
if($Branch > 1){
?>

<br>
Display Name
<hr>
<form>

	<div data-role="fieldcontain" class="ui-hide-label" data-mini='true'>
		
		<input type="text" name="Display_Name" id="Display_Name" data-mini="true" placeholder="Update Display Name:"/>
	</div>
	<input type="hidden" name="UDD_Hidden" id="basic" data-mini="true" value='1'/>
	<input type="Submit" name="UpdateD" value="Update" data-mini='true' data-theme="b" class="button scrolly"/>

</form>
<br>
Site Code
<hr>

<textarea style='width:100%;height:200px'>

<script src='http://code.jquery.com/jquery-1.10.2.js'></script>
<script id='AHO-JS' src='http://nv.americanhomesonline.com/aho/aho.js?APP_ID=<?php print $Branch ?>'></script>
<div id='AHO-Remote-Load' style='float:right;position:fixed;right:10px;z-index:1000'></div>
<div style='clear:both'></div>

</textarea>





<?php
}
}else{

if($Branch > 1){
$sql = "SELECT * FROM AHO_User WHERE b_id = '$B_ID' AND id = '$ID' ";
}else{
$sql = "SELECT * FROM AHO_User WHERE b_id = '$B_ID' AND id = '$User_ID' ";
}

$sql_result = mysql_query($sql);
$row = mysql_fetch_array($sql_result);

if($row["id"] != ''){
?>
<div style="float:left;margin-right:10px;border-style:solid;border-width:1px;padding:20px">
<form action="index.php?Page=Accounts" method="post" data-ajax="false" data-mini="true" enctype="multipart/form-data">
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
		<input type="text" name="GEO_Lat" id="GEO_Lat" data-mini="true" placeholder="" value="<?php print $row["GEO_Lat"] ?>"/>
	</div>		
	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="aVersion">Longitude: (optional) </label>
		<input type="text" name="GEO_Long" id="GEO_Long" data-mini="true" placeholder="" value="<?php print $row["GEO_Long"] ?>"/>
	</div>		
	
	<b>Images</b>
	<hr>
	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="aVersion">Image URL: </label>
		<input type="text" name="Image" id="Image" data-mini="true" placeholder="Image URL" value="<?php print $row["Image"] ?>"/>
	</div>	
	OR
	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="aVersion">Image Upload: </label>
		<input type="file" name="file" id="file" style="width:300px"/>
		<br>current file: <?php print $row["Image_File"] ?>
		
	</div>	
	
	
	
	
	<b>Areas</b>
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


	
	
<br><br>
	<input type="hidden" name="Update_Hidden" id="basic" data-mini="true" value='<?php print $row['id'] ?>'/>
	<input type="Submit" name="Update" value="Update" data-mini='true' data-theme="b" class="button scrolly" />
</form>
<a href='index.php?Page=Accounts' data-role='button' data-mini='true' data-ajax='false' >Back</a>
</div>

<div style="float:right;margin-right:10px;width:280px">
<h2>Requests</h2>
<?php

		     

			$sqla = "SELECT * FROM AHO_Request WHERE IP_More = '' ORDER BY id DESC";
			$sql_resulta = mysql_query($sqla);
			while($rowa = mysql_fetch_array($sql_resulta)){
			
				$IPs = $rowa[IP_Clean];
			
				 $Data = file_get_contents("http://www.iptolatlng.com?ip=$IPs");
			
				mysql_query("UPDATE AHO_Request SET IP_More = '$Data' WHERE IP_Clean = '$IPs' ");
			}
	
			$sqla = "SELECT * FROM AHO_Request WHERE Agent_ID = '{$row[id]}'  ORDER BY id DESC";
			$sql_resulta = mysql_query($sqla);
			while($rowa = mysql_fetch_array($sql_resulta)){
			
			
			$DATE = date("m-d-Y h:i:s a", strtotime($rowa[Date_Time].'-7 hours')); 

			$IP_A = json_decode($rowa[IP_More]);
			
			

			$IPC = 	$IP_A->city;
			$IPS = 	$IP_A->state;
			$IPCO =  $IP_A->country;


			print "<hr>";
			print "<b>$DATE</b><br>
			Name: {$rowa[Name]}<br>
			Phone: {$rowa[Phone]}<br>
			Email: {$rowa[Email]}<br>
			Prop: <a href='{$rowa[Property]}' target='_blank'>Interested In</a><br>
			IP: {$rowa[IP_Clean]}<br>
			IP Details: $IPC $IPS, $IPCO			
			<br><br>
			
			Note: {$rowa[Comment]}";
			
			
			
			}
			
?>

</div>
<div style='clear:both'></div>

<?php
}else{
print "Sorry this MLS doesn't exsist.";
}

}
?>