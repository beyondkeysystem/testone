<?php
 header('Access-Control-Allow-Origin: *');  
//$content =  file_get_contents("http://www.geobytes.com/IpLocator.htm?GetLocation&template=xml.txt&IpAddress={$_SERVER['REMOTE_ADDR']}");

//$xml = simplexml_load_string($content);



//print $xml->IP.' - '.$xml->city.' - '.$xml->region.' - '.$xml->country;


print "{$_SERVER['REMOTE_ADDR']}||<a href='http://www.geobytes.com/IpLocator.htm?GetLocation&IpAddress={$_SERVER['REMOTE_ADDR']}' target='_blank'>More Details</a>";

?>