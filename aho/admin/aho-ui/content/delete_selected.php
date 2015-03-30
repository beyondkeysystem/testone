<?php
  if(!empty($_POST['mail_id'])){
    $count = 1;
    foreach($_POST['mail_id'] as $Email_1){
      echo $Email_1;
      $sql_result = mysql_query('DELETE FROM AHO_User WHERE Email_1 = "'.$Email_1.'"') or die(mysql_error());
      $count++;
    }
    echo  $count." Users Deleted";
  }
?>