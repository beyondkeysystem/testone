<?php session_start();
  
	require_once("../classes/db_class.php");
	$obj_Db= new db();
	$sqluser= "select * from job_user where `user_name` = '".addslashes($_POST['user_name'])."' and `user_password`='".addslashes($_POST['user_password'])."' and `user_status`=1";
    
	$resultuser = $obj_Db->ExecuteQuery($sqluser);
 	$num=mysql_num_rows($resultuser);
	if($num ==1)
	{			
		$rsuser = mysql_fetch_object($resultuser);		
		$_SESSION["user_id"] = $rsuser->user_id; 
		$_SESSION["user_name"] = $rsuser->user_name;
		//exit("Name");
		header("location:http://alpha.cisinlabs.com:81/cakejobportal/admin/admin_home.php");			
	}
	else
	{
		//exit("recruit");
		header("location:http://alpha.cisinlabs.com:81/cakejobportal/admin/index.php?id=fail");			
	}

?>