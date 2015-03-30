<?php


$AHO_AS =  $_REQUEST[AHO_AS];
$AHO_AS = explode("homes-for-sale-details",$AHO_AS);

$AHO_AS = explode("/",$AHO_AS[1]);

$AHO_AS = ereg_replace("_|-"," ",$AHO_AS[1]);


if($AHO_AS == ''){
exit();
}

$Address_String = $AHO_AS;

mysql_query("INSERT INTO AHO_GEO (Address_String,B_ID) VALUES ('$AHO_AS',{$_REQUEST['APPid']}) ");


	$sql = "SELECT * FROM AHO_GEO WHERE GEO_Lat < 5 ";
	$sql_result = mysql_query($sql,$db);
	while($row = mysql_fetch_array($sql_result)){
	
	
		$Address_String = $row[Address_String];
		$G_ID = $row[id];
		
		$xml = simplexml_load_file("http://maps.google.com/maps/api/geocode/xml?address=$Address_String&sensor=false");

		$Over = $xml->status;

		$Long = $xml->result->geometry->location->lng;
		$Lat = $xml->result->geometry->location->lat;

		mysql_query("UPDATE AHO_GEO SET GEO_Lat = '$Lat', GEO_Long = '$Long' WHERE id = '$G_ID' ");
	
	}

	$sql = "SELECT * FROM AHO_GEO WHERE Address_String = '$AHO_AS' AND B_ID = {$_REQUEST['APPid']}";
	$sql_result = mysql_query($sql,$db);
	$row = mysql_fetch_array($sql_result);
	
	$Lat = $row[GEO_Lat];
	$Long = $row[GEO_Long];

	if($Lat == ''){
		$Lat = '36.0800';
		$Long = '-115.1522';
	}

$Address_String = $AHO_AS;
	
?>