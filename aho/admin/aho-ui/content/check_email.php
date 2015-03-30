<?php
if( $_REQUEST["email_id"] )
{
    $email_id = $_REQUEST["email_id"];
 
    $user="ahomain";

    $pass=",O8bOcL6JUXK";

    $database="ahomain_las_rc";

    $con=mysql_connect("localhost", $user, $pass) or die ('Couldnt connect to server');

    mysql_select_db($database,$con) or die('could not connect to db');
    
    $sql = "SELECT * FROM AHO_User WHERE Email_1 = '$email_id' limit 1 ";
    
    $sql_result = mysql_query($sql);
    
    $row = mysql_fetch_array($sql_result);
      
    $user_id = $row["id"];
    
    $actual_user_id =  $_REQUEST["user_id"];
 
   if($actual_user_id  == $user_id){
 
                return "false";
 
   }

    if(!empty($user_id)){

        echo "Email Id Already Exist Please Try Another Mail Id";

    }else{

        return "false";

    }

}
?>