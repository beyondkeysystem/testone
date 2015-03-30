<header><center>
    <h3><br>Contacts</h3></center>
</header>
<?php

if($Branch > 1){
$sql = "SELECT * FROM AHO_User WHERE b_id = '$B_ID' AND id = '$ID' ";
}else{
$sql = "SELECT * FROM AHO_User WHERE b_id = '$B_ID' AND id = '$User_ID' ";
}

$sql_result = mysql_query($sql);
$row = mysql_fetch_array($sql_result);

if($row["id"] != ''){
?>

<?php

			$sqla = "SELECT * FROM AHO_Request WHERE IP_More = '' ORDER BY id DESC LIMIT 50";
			$sql_resulta = mysql_query($sqla);
			while($rowa = mysql_fetch_array($sql_resulta)){
			
				$IPs = $rowa[IP_Clean];
			
				 $Data = file_get_contents("http://www.iptolatlng.com?ip=$IPs");
			
				mysql_query("UPDATE AHO_Request SET IP_More = '$Data' WHERE IP_Clean = '$IPs' ");
			}
	
			$sqla = "SELECT * FROM AHO_Request WHERE Agent_ID = '{$row[id]}'  ORDER BY id DESC";
			$sql_resulta = mysql_query($sqla);
			print "<div class='contacts-table'>";
			while($rowa = mysql_fetch_array($sql_resulta)){
			
			
			$DATE = date("m-d-Y h:i:s a", strtotime($rowa[Date_Time].'-7 hours')); 

			$IP_A = json_decode($rowa[IP_More]);
			
			

			$IPC = 	$IP_A->city;
			$IPS = 	$IP_A->state;
			$IPCO =  $IP_A->country;

			print "
			<div class='table-boxes'>";
			//if($rowa['is_expired']){echo "<span style='float:right;color:#AA0000;font-weight: bold;'>Expired</span>";} else {echo "<span style='color: rgb(57, 132, 0);float: right;font-weight: bold;'>Active</span>";}
			print"
			<b class='b-tag  left'>Date:</b> $DATE<br>
			<b class='b-tag  left'>Name:</b> {$rowa[Name]}<br>
			<b class='b-tag'>Phone:</b> {$rowa[Phone]}<br>
			<b class='b-tag'>Email:</b> {$rowa[Email]}<br>
			<b class='b-tag'>IP:</b> {$rowa[IP_Clean]}<br>
			<b class='b-tag'>IP Details:</b> $IPC $IPS, $IPCO	<br>
			<b class='b-tag'>Note:</b> ".ereg_replace("[%]"," ",$rowa[Comment])."<br>";
// AMERICAN HOMES ONLINE - NO PROPERTY CONNECTION // 
			print "  </div>";
// REALTY WITH PROPERTY CONNECTION // 
	//		print " <center><a href='{$rowa[Property]}' target='_blank' style='color:#036;'><b>View Property Interested In</b></a></center> </div>";			
			
			
			
			}
			print "</div>";
?>

<div style='clear:both'></div>

<?php
}else{
print "Sorry this MLS doesn't exsist.";
}

?>