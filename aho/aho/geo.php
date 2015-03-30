<?php

//$db = mysql_connect("localhost", 'las_rc_user', 'V69h3119TgHe25z') or die();
//mysql_select_db('las_rc',$db);

/*$db = mysql_connect("localhost", 'ahomain', ',O8bOcL6JUXK') or die();
mysql_select_db('ahomain_las_rc',$db);

//$db = mysql_connect("127.0.0.1", 'cakejobportal', 'yeTunMpvLPtdeGZ5') or die();
//mysql_select_db('cakejobportal',$db); 
	
	$sql = "SELECT * FROM AHO_User WHERE GEO_Lat < 5 AND Address != ''";
	$sql_result = mysql_query($sql,$db);
	while($row = mysql_fetch_array($sql_result)){
	
	
		$Address = $row[Address];
		$City = $row[City];
		$State = $row[State];
		$Zip = $row[Zip];
		$id = $row[id];
		
		$xml = simplexml_load_file("http://maps.google.com/maps/api/geocode/xml?address=$Address,+$City,+$State,+$Zip&sensor=false");

		//print_r($xml);

		print $Over = $xml->status;

		if($Over == "OVER_QUERY_LIMIT"){
			print "Over Limit";
			break;
		}

		print $Long = $xml->result->geometry->location->lng;
		print $Lat = $xml->result->geometry->location->lat;

		mysql_query("UPDATE AHO_User SET GEO_Lat = '$Lat', GEO_Long = '$Long' WHERE id = '$id' ");
	
	}
*/
?>
