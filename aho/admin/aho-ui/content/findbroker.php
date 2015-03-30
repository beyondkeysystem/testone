<header><center>
    <h3><br>FIND AN Broker</h3></center>
</header>
<hr>

 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      
   </script>  
<?php

$Find_ID = $_POST['broker'];


$sql = "SELECT * FROM AHO_User WHERE Type=2 AND b_id = '0' AND (Email_1 LIKE '%$Find_ID%'  OR Name LIKE '%$Find_ID%' )   "; 
$sql_result = mysql_query($sql);

while ($row = mysql_fetch_array($sql_result)) {
		
	$AID = $row["id"];
		
	$metadata = $row["resources"];
	print "<div style='float:left;width:auto;border-style:solid;border-color:#cdcdcd;border-width:1px;padding:10px;margin:10px;'>";
	$Email_1 = substr($row['Email_1'], 0 , 35);
	print "
	<ul>
	<li><span style='font-size:16px; color:#036;'>$Email_1</span></li>
        
	<li><a href='index.php?Page=brokers&ID={$row['id']}' data-role='button'  data-mini='true' class='button binactive' style='font-size:12px;' data-ajax='false'>Edit</a>
             <a href='index.php?Page=Agents&BR_ID={$row['id']}' data-role='button'  data-mini='true' class='button binactive bsmall' style='font-size:12px;' data-ajax='false'>Agents</a>
	<a href='aho-ui/content/pops/remove_broker.php?ID={$row['id']}' class='various fancybox.iframe button bactive bsmall' style='font-size:12px;'>Remove</a></li></ul>
	</div>";

}
if($AID==''){ print "Add an agent or yourself to get started."; }


?>

<div style="clear:both"></div>