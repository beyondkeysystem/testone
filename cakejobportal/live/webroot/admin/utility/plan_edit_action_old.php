<?   session_start();
	 if(!isset($_SESSION["user_id"]))
	 {
		header("location: ../index.php"); exit();
	 }

	require_once("../../classes/db_class.php");
	$objDb = new db();
	
	if(isset($_POST["plan_name"]))
	{
		$array["plan_name"] =$_POST["plan_name"];
	}
	if(isset($_POST["unlimited_job_ads"]))
	{
		$array["unlimited_job_ads"] =$_POST["unlimited_job_ads"];
	}
	else
	{
		$array["unlimited_job_ads"]=0;
	}
	
	if(isset($_POST["system_shortlisting"]))
	{
		$array["system_shortlisting"] =$_POST["system_shortlisting"];
	}
	else
	{
		$array["system_shortlisting"]=0;
	}
	if(isset($_POST["regret_function"]))
	{
		$array["regret_function"] =$_POST["regret_function"];
	}
	else
	{
		$array["regret_function"]=0;
	}
	
	if(isset($_POST["client_talent"]))
	{
		$array["client_talent"] =$_POST["client_talent"];
	}
	else
	{
		$array["client_talent"]=0;
	}
	if(isset($_POST["full_access_jobseekers"]))
	{
		$array["full_access_jobseekers"] =$_POST["full_access_jobseekers"];
	}
	else
	{
		$array["full_access_jobseekers"]=0;
	}
	if(isset($_POST["client_logo"]))
	{
		$array["client_logo"] =$_POST["client_logo"];
	}
	else
	{
		$array["client_logo"]=0;
	}
	
	if(isset($_POST["intercompany_ad"]))
	{
		$array["intercompany_ad"] =$_POST["intercompany_ad"];
	}
	else
	{
		$array["intercompany_ad"]=0;
	}
	if(isset($_GET["type"]) && $_GET["type"]=="rec")
	{
		if(isset($_POST["rate"]))
		{
			$array["rate"] =$_POST["rate"];
		}
		if(isset($_POST["positions"]))
		{
			$array["positions"] =$_POST["positions"];
		}
		$array["type"]="rec";
	}
	else
	{
		if(isset($_POST["subscription"]))
		{
			if($_POST["subscription"]=="paid")
			{
				if(isset($_POST["rate"]))
				{
					$array["rate"] =$_POST["rate"];
				}
				if(isset($_POST["positions"]))
				{
					$array["positions"] =$_POST["positions"];
				}
			
			}
			else
			{
				$array["positions"]=0;
				$array["rate"]=0;
			}
		}
		$array["type"]="emp";
	}
	
	if(isset($_POST["rate_per_position"]))
	{
		$array["rate_per_position"] =$_POST["rate_per_position"];
	}
	$objDb->UpdateData("job_rec_payment_plans",$array,"plan_id",$_GET["pid"]);
	header("location:plan_list.php?msg=edit");

?>
	