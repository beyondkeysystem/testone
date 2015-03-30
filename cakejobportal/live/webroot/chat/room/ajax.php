<?php
 require_once("../../classes/db_class.php");
 $obj_Db = new db();
 $r="0";
 if($_REQUEST['username'] != ''){
 $sql= "select * from users where name='".$_REQUEST['username']."'";
 $result = $obj_Db->ExecuteQuery($sql);
 $numrows = mysql_num_rows($result);
 //mysql_fetch_object($result);
 $i=0;
 
 if($_REQUEST['username'] != ''){
 while($rows = mysql_fetch_assoc($result)){
  if($_REQUEST['username'] == $rows['name']){
   $r="1";
  }
  $i++;
 }
 }
 }
  echo $r;
?>