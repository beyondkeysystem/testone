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
		$objDb->DeleteData("job_recruiter","rec_id",$_GET["id"]);
	}
	else
	{
		for($i=0;$i<count($_POST['chk']);$i++)
		{
			$objDb->DeleteData("job_recruiter","rec_id",$_POST['chk'][$i]);
		}
	}
	$q_str="";
	if(isset($_GET["rec_status"]) && $_GET["rec_status"]!="")
	{
		$q_str="rec_status=".$_GET["rec_status"];
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
	header("location:employers_list.php?".$q_str); 	
?>

