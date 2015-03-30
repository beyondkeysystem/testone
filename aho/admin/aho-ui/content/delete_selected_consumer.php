<?php
  if(!empty($_POST['consumerid'])){
    $count = 1;
    foreach($_POST['consumerid'] as $consumer_id){
	   	$sql = "DELETE from AHO_Consumers WHERE ID = '".$consumer_id."'"; 
	    $sql_result = mysql_query($sql) or die(mysql_error());
	    $sql = "DELETE from AHO_Agent_Leads WHERE Consumer_ID = '".consumer_id."'"; 
	    $sql_result = mysql_query($sql) or die(mysql_error());
      	$count++;
    }
    echo  $count." Consumer Deleted";
  }
?>