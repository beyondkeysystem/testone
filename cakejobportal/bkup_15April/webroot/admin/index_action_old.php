<? session_start();

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
		header("location:admin_home.php");			
	}
	else
	{
		header("location:index.php?id=fail");			
	}

?>