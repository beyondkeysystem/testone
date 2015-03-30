<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	require_once("../../classes/pagination.php");	
	require_once("../../includes/functions.php");	
	$objDb = new db();
	
	
	$data = array();
	if(isset($_GET["id"]) && $_GET["id"]!="")
	{
		$objDb->DeleteData("job_jobseeker","seeker_id",$_GET["id"]);
	}
	else
	{
		for($i=0;$i<count($_POST['chk']);$i++)
		{
			$objDb->DeleteData("job_jobseeker","seeker_id",$_POST['chk'][$i]);
		}
	}
	$q_str="";
	if(isset($_GET["seeker_status"]) && $_GET["seeker_status"]!="")
	{
		$q_str="seeker_status=".$_GET["seeker_status"];
	}
	if(isset($_GET["cPage"]) && $_GET["cPage"]!="")
	{
		if($q_str!="")
		{
			$q_str.="&cPage=".$_GET["cPage"];
		}
		else
		{
			$q_str="cPage=".$_GET["cPage"];
		}
	}
	if($q_str!="")
	{
		header("location:seeker_list.php?".$q_str); 	
	}
	else
	{
		header("location:seeker_list.php");
	}
?>

